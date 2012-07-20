<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Master Subscription
 * Agreement ("License") which can be viewed at
 * http://www.sugarcrm.com/crm/master-subscription-agreement
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * among other things: 1) sublicense, resell, rent, lease, redistribute, assign
 * or otherwise transfer Your rights to the Software, and 2) use the Software
 * for timesharing or service bureau purposes such as hosting the Software for
 * commercial gain and/or for the benefit of a third party.  Use of the Software
 * may be subject to applicable fees and any use of the Software without first
 * paying applicable fees is strictly prohibited.  You do not have the right to
 * remove SugarCRM copyrights from the source code or user interface.
 *
 * All copies of the Covered Code must include on each user interface screen:
 *  (i) the "Powered by SugarCRM" logo and
 *  (ii) the SugarCRM copyright notice
 * in the same form as they appear in the distribution.  See full license for
 * requirements.
 *
 * Your Warranty, Limitations of liability and Indemnity are expressly stated
 * in the License.  Please refer to the License for the specific language
 * governing these rights and limitations under the License.  Portions created
 * by SugarCRM are Copyright (C) 2004-2012 SugarCRM, Inc.; All Rights Reserved.
 ********************************************************************************/

require_once('modules/Reports/templates/templates_group_chooser.php');
require_once('modules/Reports/templates/templates_reports_functions_js.php');
require_once('modules/Reports/templates/templates_list_view.php');
require_once('modules/Reports/templates/templates_modules_def_js.php');
require_once('modules/Reports/templates/templates_reports_request_js.php');

require_once('modules/Reports/config.php');
require_once('modules/Reports/schedule/ReportSchedule.php');






//////////////////////////////////////////////
// TEMPLATE:
//////////////////////////////////////////////
function template_reports_index(&$args)
{

	global $mod_strings, $module_map;
	if ( empty($_REQUEST['view']))
	{
		$_REQUEST['view'] = 'all';
	}

	$args['view'] = $_REQUEST['view'];
	if ($_REQUEST['view'] == 'my' )
	{
			$args['type'] = 'my';
			$args['module'] = 'All';
			$args['show_button'] = true;
			template_reports_saved($args);
	}
	elseif (!empty($_REQUEST['view']) && $_REQUEST['view'] != 'all')
	{
		$args['type'] = 'my';
		$args['module'] = $module_map[$_REQUEST['view']];
		$args['show_button'] = true;
		template_reports_saved($args);
		$args['show_button'] = false;
		$args['type'] = 'published';
		template_reports_saved($args);
	}
	else
	{
		$args['type'] = 'my';
		$args['module'] = 'All';
		$args['show_button'] = true;
		template_reports_saved($args);
		$args['show_button'] = false;
		$args['type'] = 'published';
		$args['module'] = 'All';
		template_reports_saved($args);

	}



	
global $published_report_titles;
global $my_report_titles;
global $current_user;
global $modules_report;


// grab information for tab access to show only reports relative to modules a user has access to
if(isset($current_user))
{
	require_once('modules/MySettings/TabController.php');
	$tabs = new TabController();
	$tabArray = $tabs->get_user_tabs($current_user);
	
	$user_where = "";

	foreach($tabArray as $user_module){
	
		$user_where .= "module ='$user_module' OR ";
	
	}
	
	if( array_key_exists("Calendar", $tabArray) || array_key_exists("Activities", $tabArray) ){
		//also include reports that are in the following modules
		$user_where .= "module ='Tasks' OR module ='Calls' OR module ='Meetings' OR module ='Notes'";
	}

}
	

$saved_reports_seed = new SavedReport();

//determine the where query for the published reports
	if (isset($_REQUEST['view']) && $_REQUEST['view']!="all"){
		$where = "($user_where) AND is_published ='yes' AND module = '".$module_map[$_REQUEST['view']]."'";
		$my_where = "assigned_user_id='$current_user->id' AND is_published ='no' AND module = '".$module_map[$_REQUEST['view']]."'";
	}else {
		$where = "($user_where) AND is_published ='yes'";
		$my_where = "assigned_user_id='$current_user->id' AND is_published ='no'";
	}

//determine the report title
	if (isset($_REQUEST['view']) && $_REQUEST['view']=="all"){
		$header_title = $mod_strings['LBL_ALL_PUBLISHED_REPORTS'];
		$my_header_title = $mod_strings['LBL_MY_SAVED_REPORTS'];
	} else {
		$header_title = $published_report_titles[$module_map[$_REQUEST['view']]];
		$my_header_title = $my_report_titles[$module_map[$_REQUEST['view']]];
	}

	//show create custom button
		$module_value = "";
		if ( isset($_REQUEST['view']) && $_REQUEST['view'] != "all") {
			$module_value = 'value="'.$modules_report[$module_map[$_REQUEST['view']]].'"';
		}	
		echo '<form action="index.php"><input type=hidden name="module" value="Reports"/><input type=hidden name="report_module" '.$module_value.'/><input type=hidden name="action" value="index"/><input type=hidden name="page" value="report"/><input type=submit class=button name=\'Create Custom Report\' value=\''.$mod_strings['LBL_CREATE_CUSTOM_REPORT'].'\'></form>';
		//echo get_form_header($my_header_title, $button_form, false);

//my reports list	
$ListView = new ListView();

$ListView->initNewXTemplate( 'modules/Reports/ListView.html',$mod_strings);
$ListView->setHeaderTitle($my_header_title);
$ListView->show_export_button = false;
$ListView->setQuery($my_where, "", "name", "MY_SAVED_REPORT");
$ListView->processListView($saved_reports_seed, "my_main", "MY_SAVED_REPORT");		
		
		
///all published reports list		
$ListView = new ListView();

$ListView->initNewXTemplate( 'modules/Reports/ListView.html',$mod_strings);
$ListView->setHeaderTitle($header_title);
$ListView->show_export_button = false;
$ListView->setQuery($where, "", "name", "SAVED_REPORT");
$ListView->processListView($saved_reports_seed, "main", "SAVED_REPORT");	


}


//////////////////////////////////////////////
// TEMPLATE:
//////////////////////////////////////////////
function template_reports_saved(&$args)
{
global $current_user, $modules_report, $mod_strings, $modListHeader,
       $my_report_titles, $published_report_titles,$app_list_strings;
$module_value = '';

// grab information for tab access to show only reports relative to modules a user has access to
if(isset($current_user))
{
	require_once('modules/MySettings/TabController.php');
	$tabs = new TabController();
	$tabArray = $tabs->get_user_tabs($current_user);
}

if ( $args['type'] == 'my')
{
	$title = $mod_strings['LBL_MY_SAVED_REPORTS'];
	$query_arr = array('assigned_user_id'=>$current_user->id,'is_published'=>'no');
	$order_by = 'module,report_type,name';
	if ( isset($args['module']) && $args['module'] != 'All')
	{
		$module_value = 'value="'.$modules_report[$args['module']].'"';
		$title = $my_report_titles[$args['module']];
		$query_arr['module'] = $args['module'];
	}
}
else
{
	$title = $mod_strings['LBL_ALL_PUBLISHED_REPORTS'];
	$query_arr = array('is_published'=>'yes');
	$order_by = '';
	if ( isset($args['module']) && $args['module'] != 'All')
	{
		$module_value = 'value="'.$modules_report[$args['module']].'"';
		$title = $published_report_titles[$args['module']];
		$query_arr['module'] = $args['module'];
	}
}
if (  isset($args['show_button']) && $args['show_button'] )
{
	$button_form = '<form action="index.php"><input type=hidden name="module" value="Reports"/><input type=hidden name="report_module" '.$module_value.'/><input type=hidden name="action" value="index"/><input type=hidden name="page" value="report"/><input type=submit class=button name=\'Create Custom Report\' value=\''.$mod_strings['LBL_CREATE_CUSTOM_REPORT'].'\'></form>';

}
else
{
	$button_form = '';
}
?>
<?php echo get_form_header($title, $button_form, false); ?>

<script>
function schedulePOPUP(id){
			window.open("index.php?module=Reports&action=add_schedule&to_pdf=true&id=" + id ,"test","width=400,height=120,resizable=1,scrollbars=1")
}
</script>
<p>
<table width="100%" border="0" cellspacing=0 cellpadding="0" class="list view">
<tr height="20">
	<td width="40%"  NOWRAP><?php echo $mod_strings['LBL_REPORT_NAME']; ?></td>
	<td width="20%"  NOWRAP><?php echo $mod_strings['LBL_MODULE_NAME_SAVED']; ?></td>
	<td width="20%"  NOWRAP><?php echo $mod_strings['LBL_REPORT_TYPE']; ?></td>
	<td width="5%"  NOWRAP><?php echo $mod_strings['LBL_SCHEDULE_REPORT']; ?></td>
	<td width="5%"  NOWRAP>&nbsp;</td>
	<td width="5%"  NOWRAP>&nbsp;</td>
	<td width="5%"  NOWRAP>&nbsp;</td>
</tr>

<?php

$saved_reports_seed = new SavedReport();

$custom_reports_arr = $saved_reports_seed->retrieve_all_by_string_fields($query_arr,$order_by);
$shownRows = false;
$displayedNone = true;
if ( count($custom_reports_arr) )
{
$oddRow = true;
        foreach ( $custom_reports_arr as $report)
        {
		$report->content;
		if ($report->deleted == 1)
		{
			continue;
		}

if($oddRow)
	{
		$row_class = 'oddListRowS1';
	} else
	{
		$row_class = 'evenListRowS1';
	}
	if ( ! isset( $app_list_strings['dom_report_types'][$report->report_type]))
	{
		$report_type = '';	
	}
	else
	{
		$report_type = $app_list_strings['dom_report_types'][$report->report_type];
	}
$rs = new ReportSchedule();
$schedule = $rs->get_users_schedule();
global $timedate;
	
	$subModuleCheck = 0;
	$subModuleCheckArray = array("Tasks", "Calls", "Meetings", "Notes");
	
	$subModuleProjectArray = array("ProjectTask");
	 
	if(in_array($report->module, $subModuleCheckArray) && (array_key_exists("Calendar", $tabArray) || array_key_exists("Activities", $tabArray)))
		$subModuleCheck = 1;
		
	if(in_array($report->module, $subModuleProjectArray) && array_key_exists("Project", $tabArray))
		$subModuleCheck = 1;
		
	if(array_key_exists($report->module, $tabArray) || $subModuleCheck)
	{
		// actually display the row if the user has access to the tab/module
		$oddRow = !$oddRow;
		$shownRows = true;
?>
<tr class="<?php echo $row_class; ?>" height="20"  onmouseover="setPointer(this, '<?php echo $report->id; ?>', 'over', '<?php echo $bg_color; ?>', '<?php echo $hilite_bg; ?>', '<?php echo $click_bg; ?>');" onmouseout="setPointer(this, '{<?php echo $report->id; ?>}', 'out', '<?php echo $bg_color; ?>', '<?php echo $hilite_bg; ?>', '<?php echo $click_bg; ?>');" onmousedown="setPointer(this, '{<?php echo $report->id; ?>}', 'click', '<?php echo $bg_color; ?>', '<?php echo $hilite_bg; ?>', '<?php echo $click_bg; ?>');">

<td nowrap="nowrap"><a href="index.php?module=Reports&action=index&page=report&id=<?php echo $report->id; ?>"  ><?php echo $report->name; ?></a></td>
<td nowrap="nowrap"><?php echo $app_list_strings['moduleList'][$report->module]; ?></a></td>
<td nowrap="nowrap"><?php echo $report_type; ?></a></td>
<?php if(isset($schedule[$report->id]) && $schedule[$report->id]['active'] == 1){?>
<td nowrap="nowrap"><a  href="#" onclick="schedulePOPUP('<?php echo $report->id; ?>')"  class="listViewTdToolsS1"><?php echo SugarThemeRegistry::current()->getImage('scheduled_inline','border="0" align="absmiddle"',null,null,'.gif',$mod_strings['LBL_SCHEDULE_EMAIL']);?>&nbsp;<?php echo $timedate->to_display_date_time($schedule[$report->id]['next_run']) ?></a></td>
<?php }else{ ?>
<td nowrap="nowrap"><a  href="#" onclick="schedulePOPUP('<?php echo $report->id; ?>')"  class="listViewTdToolsS1"><?php echo SugarThemeRegistry::current()->getImage('unscheduled_inline','border="0" align="absmiddle"',null,null,'.gif',$mod_strings['LBL_SCHEDULE_EMAIL']);?>&nbsp;<?php echo $mod_strings['LBL_NONE'] ?></a></td>
<?php } ?>
<td nowrap="nowrap"><a href="index.php?module=Reports&action=index&page=report&id=<?php echo $report->id; ?>"  class="listViewTdToolsS1"><?php echo SugarThemeRegistry::current()->getImage('view_inline','border="0" align="absmiddle"',null,null,'.gif',$mod_strings['LBL_VIEW']);?></a>&nbsp;<a href="index.php?module=Reports&action=index&page=report&id=<?php echo $report->id; ?>"  class="listViewTdToolsS1"><?php echo $mod_strings['LBL_VIEW']; ?></a></td>
<?php
if ( ( $args['type'] =='published' && is_admin($current_user) )
  ||
( $args['type'] == 'my') )
{ ?>
<td nowrap="nowrap"><a href="index.php?module=Reports&action=index&view=<?php echo $args['view']; ?>&delete_report_id=<?php echo $report->id; ?>" class="listViewTdToolsS1"><?php echo SugarThemeRegistry::current()->getImage('delete_inline','border="0" align="absmiddle"',null,null,'.gif',$mod_strings['LBL_DELETE']);?></a>&nbsp;<a href="index.php?module=Reports&action=index&view=<?php echo $args['view']; ?>&delete_report_id=<?php echo $report->id; ?>" class="listViewTdToolsS1"><?php echo $mod_strings['LBL_DELETE']; ?></a></td>
<?php } else { ?>
<td><?php echo SugarThemeRegistry::current()->getImage(blank, "", 1, 1, ".gif", ""); ?></td>
<?php } ?>
<?php if ( is_admin($current_user) && $args['type'] == 'published') { ?>
<td><nobr><a href="index.php?module=Reports&action=index&view=<?php echo $args['view']; ?>&publish=no&publish_report_id=<?php echo $report->id; ?>" class="listViewTdToolsS1"><?php echo SugarThemeRegistry::current()->getImage('unpublish_inline','border="0" align="absmiddle"',null,null,'.gif',$mod_strings['LBL_UN_PUBLISH']);?></a>&nbsp;<a href="index.php?module=Reports&action=index&view=<?php echo $args['view']; ?>&publish=no&publish_report_id=<?php echo $report->id; ?>" class="listViewTdToolsS1"><?php echo $mod_strings['LBL_UN_PUBLISH']; ?></a></nobr></td>
<?php
}
else if ( is_admin($current_user) && $args['type'] == 'my')
{
?>
<td><nobr><a href="index.php?module=Reports&action=index&view=<?php echo $args['view']; ?>&publish=yes&publish_report_id=<?php echo $report->id; ?>" class="listViewTdToolsS1"><?php echo SugarThemeRegistry::current()->getImage('publish_inline','border="0" align="absmiddle"',null,null,'.gif',$mod_strings['LBL_PUBLISH']);?></a>&nbsp;<a href="index.php?module=Reports&action=index&view=<?php echo $args['view']; ?>&publish=yes&publish_report_id=<?php echo $report->id; ?>" class="listViewTdToolsS1"><?php echo $mod_strings['LBL_PUBLISH']; ?></a></nobr></td>
<?php } else { ?>
<td><?php echo SugarThemeRegistry::current()->getImage(blank, "", 1, 1, ".gif", ""); ?></td>
<?php } ?>
</tr>
<?php
        }
   }
}
else
{
	$displayedNone = true;
	if ($args['type'] == 'my')
	{
?>
<tr class="oddListRowS1"><td colspan="10"><?php echo $mod_strings['LBL_YOU_HAVE_NO_SAVED_REPORTS.']; ?></td></tr>
<?php
	}
	else
	{
?>
<tr class="oddListRowS1"><td colspan="10"><?php echo $mod_strings['LBL_THERE_ARE_NO_REPORTS_OF_THIS_TYPE']; ?></td></tr>
<?php
	}
}
if(!$shownRows && !$displayedNone)
{
	if ($args['type'] == 'my')
	{
?>
<tr class="oddListRowS1"><td colspan="10"><?php echo $mod_strings['LBL_YOU_HAVE_NO_SAVED_REPORTS.']; ?></td></tr>
<?php
	}
	else
	{
?>
<tr class="oddListRowS1"><td colspan="10"><?php echo $mod_strings['LBL_THERE_ARE_NO_REPORTS_OF_THIS_TYPE']; ?></td></tr>
<?php
	}
}
?>


</table>
</p>
<?php
}

?>
