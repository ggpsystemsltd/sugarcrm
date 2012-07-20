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

/*********************************************************************************

 * Description:  TODO: To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/





require_once('include/JSON.php');

global $app_strings;
global $mod_strings;
global $app_list_strings;
global $current_language;
global $currentModule;
global $theme;

$json=new JSON(JSON_LOOSE_TYPE);

$current_module_strings = return_module_language($current_language, 'MergeRecords');

if (!isset($where)) $where = "";

$focus = new MergeRecord();

////////////////////////////////////////////////////////////
//get instance of master record and retrieve related record
//and items
////////////////////////////////////////////////////////////
$focus->merge_module = $_REQUEST['return_module'];
$focus->load_merge_bean($focus->merge_module, true, $_REQUEST['record']);


//get all available column fields
//TO DO: add custom field handling
$avail_fields=array();
$sel_fields=array();
$temp_field_array = $focus->merge_bean->field_defs;
$bean_data=array();
ACLField::listFilter($temp_field_array, $focus->merge_bean->module_dir, $GLOBALS['current_user']->id, false, true, 2, false, true);
foreach($temp_field_array as $field_array)
{
	if (isset($field_array['merge_filter']) 
	&& $field_array['acl'] > 0
	) {
		if (strtolower($field_array['merge_filter'])=='enabled' or strtolower($field_array['merge_filter'])=='selected') {
			$col_name = $field_array['name'];

                            
			if(!isset($focus->merge_bean_strings[$field_array['vname']])) {
				$col_label = $col_name;
			}
			else {
				$col_label = str_replace(':', '', $focus->merge_bean_strings[$field_array['vname']]);
			}
			
			if (strtolower($field_array['merge_filter'])=='selected') {
				$sel_fields[$col_name]=$col_label;
			} else {
                $avail_fields[$col_name] = $col_label;
            }
			
			$bean_data[$col_name]=$focus->merge_bean->$col_name;
		}
	}
}

/////////////////////////////////////////////////////////

//Print the master record header to the page
$params = array();
$params[] = "<a href='index.php?module={$focus->merge_bean->module_dir}&action=index'>{$GLOBALS['app_list_strings']['moduleList'][$focus->merge_bean->module_dir]}</a>";
$params[] = "<a href='index.php?module={$focus->merge_bean->module_dir}&action=DetailView&record={$focus->merge_bean->id}'>{$focus->merge_bean->name}</a>";
$params[] = $mod_strings['LBL_LBL_MERGE_RECORDS_STEP_1'];
echo getClassicModuleTitle($focus->merge_bean->module_dir, $params, true);

$xtpl = new XTemplate ('modules/MergeRecords/Step1.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);
$xtpl->assign("BEANDATA",$json->encode($bean_data));
//This is for the implemetation of finding all dupes for a module, not just
//dupes for a particular record
//commenting this out for now
//$choose_master_by_options = array('First Record Found', 'Most Recent Record', 'Oldest Record', 'Record Containing Most Data');
//$xtpl->assign("CHOOSE_MASTER_BY_OPTIONS", get_select_options_with_id($choose_master_by_options, 'First Record Found'));

$xtpl->assign("MERGE_MODULE", $focus->merge_module);
$xtpl->assign("ID", $focus->merge_bean->id);

$xtpl->assign("FIELD_AVAIL_OPTIONS", get_select_options_with_id($avail_fields,''));
$xtpl->assign("LBL_ADD_BUTTON", translate('LBL_ADD_BUTTON'));

if(isset($_REQUEST['return_id'])) $xtpl->assign("RETURN_ID", $_REQUEST['return_id']);
$xtpl->assign("RETURN_ACTION", $_REQUEST['return_action']);
$xtpl->assign("RETURN_MODULE", $_REQUEST['return_module']);

//set the url
$port=null;
if(isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80 && $_SERVER['SERVER_PORT'] != 443) {
    $port = $_SERVER['SERVER_PORT'];
}
$xtpl->assign("URL", appendPortToHost($sugar_config['site_url'], $port));
//set images
$xtpl->assign("RIGHTARROW_BIG_IMAGE", SugarThemeRegistry::current()->getImageURL('rightarrow_big.gif'));
$xtpl->assign("DELETE_INLINE_IMAGE", SugarThemeRegistry::current()->getImageURL('delete_inline.gif'));

//process preloaded filter.
$pre_loaded=null;
foreach ($sel_fields as $colName=>$colLabel) {
    $pre_loaded.=addFieldRow($colName,$colLabel,$bean_data[$colName]);
}
$xtpl->assign("PRE_LOADED_FIELDS",$pre_loaded);
$xtpl->assign("OPERATOR_OPTIONS",$json->encode($app_list_strings['merge_operators_dom']));


$xtpl->parse("main.field_select_block");

$xtpl->parse("main");
$xtpl->out("main");


/**
 * This function is equivalent of AddFieldRow in merge.js. is being used to
 * preload the filter criteria based on the vardef.
 * <span><table><tr><td></td><td></td><td></td></tr></table></span>
 */
function addFieldRow($colName,$colLabel,$colValue) {
    global $theme, $app_list_strings;
    
    static $operator_options;
    if (empty($operator_options)) {
        $operator_options= get_select_options_with_id($app_list_strings['merge_operators_dom'],'');
    }

    $LBL_REMOVE = translate('LBL_REMOVE');
    $deleteInlineImage = SugarThemeRegistry::current()->getImageURL('delete_inline.gif');
    $snippet=<<<EOQ
    <span id=filter_{$colName} style='visibility:visible' value="{$colLabel}" valueId="{$colName}">
        <table width='100%' border='0' cellpadding='0'>
            <tr>
                <td width='2%'><a class="listViewTdToolsS1" href="javascript:remove_filter('filter_{$colName}')"><!--not_in_theme!--><img src='{$deleteInlineImage}' align='absmiddle' alt='{$LBL_REMOVE}' border='0' height='12' width='12'>&nbsp;</a></td>
                <td width='20%'>{$colLabel}:&nbsp;</td>
                <td width='10%'><select name='{$colName}SearchType'>{$operator_options}</select></td>
                <td width='68%'><input value="{$colValue}" id="{$colName}SearchField" name="{$colName}SearchField" type="text"></td>                  
            </tr> 
        </table>
    </span>
EOQ;

    return $snippet;
}
