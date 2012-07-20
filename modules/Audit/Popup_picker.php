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






require_once("include/upload_file.php");

require_once('include/utils/db_utils.php');
require_once('modules/Audit/Audit.php');

global $beanList, $beanFiles, $currentModule, $focus, $action, $app_strings, $app_list_strings, $current_language, $timedate, $mod_strings;
//we don't want the parent module's string file, but rather the string file specifc to this subpanel



$bean = $beanList[$_REQUEST['module_name']];
require_once($beanFiles[$bean]);
$focus = new $bean;

class Popup_Picker
{


	/*
	 *
	 */
	function Popup_Picker()
	{

	}

	/**
	 *
	 */
	function process_page()
	{
		global $theme;
		global $focus;
		global $mod_strings;
		global $app_strings;
		global $app_list_strings;
		global $currentModule;
		global $odd_bg;
 		global $even_bg;
 		
        global $audit;
        global $current_language;
		
		$audit_list =  Audit::get_audit_list();
        $xtpl=new XTemplate ('modules/Audit/Popup_picker.html');
		
		$xtpl->assign('MOD', $mod_strings);
		$xtpl->assign('APP', $app_strings);
		insert_popup_header($theme);

		//output header
		echo "<table width='100%' cellpadding='0' cellspacing='0'><tr><td>";
		$mod_strings = return_module_language($current_language, $focus->module_dir);
		
		$printImageURL = SugarThemeRegistry::current()->getImageURL('print.gif');
		$titleExtra = <<<EOHTML
<a href="javascript:void window.open('index.php?{$GLOBALS['request_string']}','printwin','menubar=1,status=0,resizable=1,scrollbars=1,toolbar=0,location=1')" class='utilsLink'>
<!--not_in_theme!--><img src="{$printImageURL}" alt="{$GLOBALS['app_strings']['LNK_PRINT']}"></a>
<a href="javascript:void window.open('index.php?{$GLOBALS['request_string']}','printwin','menubar=1,status=0,resizable=1,scrollbars=1,toolbar=0,location=1')" class='utilsLink'>
{$GLOBALS['app_strings']['LNK_PRINT']}
</a>
EOHTML;
		
		$params = array();
		$params[] = translate('LBL_MODULE_NAME', $focus->module_dir);
		$params[] = $focus->get_summary_text();
		$params[] = translate('LBL_CHANGE_LOG', 'Audit');
		echo str_replace('</div>',"<span class='utils'>$titleExtra</span></div>",getClassicModuleTitle($focus->module_dir, $params, false));
		
		$oddRow = true;
		$audited_fields = $focus->getAuditEnabledFieldDefinitions();
		asort($audited_fields);
		$fields = '';
		$field_count = count($audited_fields);
		$start_tag = "<table><tr><td >";
		$end_tag = "</td></tr></table>";
		
		if($field_count > 0)
		{
			$index = 0;
    		foreach($audited_fields as $key=>$value)
			{
				$index++;
				$vname = '';
				if(isset($value['vname']))
					$vname = $value['vname'];
				else if(isset($value['label']))
					$vname = $value['label'];
				$fields .= str_replace(':', '', translate($vname, $focus->module_dir));

    			if($index < $field_count)
    			{
    				$fields .= ", ";
    			}
    		}
    		
    		echo $start_tag.translate('LBL_AUDITED_FIELDS', 'Audit').$fields.$end_tag;
    	}
    	else
    	{
    		echo $start_tag.translate('LBL_AUDITED_FIELDS', 'Audit').$end_tag;
    	}

		foreach($audit_list as $audit)
		{
			if(empty($audit['before_value_string']) && empty($audit['after_value_string']))
			{
				$before_value = $audit['before_value_text'];
				$after_value = $audit['after_value_text'];
            }
            else {
				$before_value = $audit['before_value_string'];
				$after_value = $audit['after_value_string'];
			}

            // Let's run the audit data through the sugar field system
            if(isset($audit['data_type'])){
                require_once('include/SugarFields/SugarFieldHandler.php');
                $vardef = array('name'=>'audit_field','type'=>$audit['data_type']);
                $field = SugarFieldHandler::getSugarField($audit['data_type']);
                $before_value = $field->getChangeLogSmarty(array($vardef['name']=>$before_value), $vardef, array(), $vardef['name']);
                $after_value = $field->getChangeLogSmarty(array($vardef['name']=>$after_value), $vardef, array(), $vardef['name']);
            }

            $activity_fields = array(
                'ID' => $audit['id'],
			    'NAME' => $audit['field_name'],
                'BEFORE_VALUE' => $before_value,
                'AFTER_VALUE' => $after_value,
                'CREATED_BY' => $audit['created_by'],
                'DATE_CREATED' => $audit['date_created'],
			);

			$xtpl->assign("ACTIVITY", $activity_fields);

			if($oddRow)
   			{
        		//todo move to themes
				$xtpl->assign("ROW_COLOR", 'oddListRow');
				$xtpl->assign("BG_COLOR", $odd_bg);
    		}
    		else
    		{
        		//todo move to themes
				$xtpl->assign("ROW_COLOR", 'evenListRow');
				$xtpl->assign("BG_COLOR", $even_bg);
    		}
   			$oddRow = !$oddRow;

			$xtpl->parse("audit.row");
		// Put the rows in.
        }//end foreach

		$xtpl->parse("audit");
		$xtpl->out("audit");
		insert_popup_footer();
    }
} // end of class Popup_Picker
?>