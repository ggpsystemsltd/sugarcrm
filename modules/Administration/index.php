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

 * Description: TODO:  To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

global $currentModule;
global $current_language;
global $current_user;
global $sugar_flavor;


if (!is_admin($current_user) && !is_admin_for_any_module($current_user))
{
   sugar_die("Unauthorized access to administration.");
}

echo getClassicModuleTitle(translate('LBL_MODULE_NAME','Administration'),
                      array(translate('LBL_MODULE_NAME','Administration')), false);

//get the module links..
require('modules/Administration/metadata/adminpaneldefs.php');
global $admin_group_header;  ///variable defined in the file above.


$tab = array();
$header_image = array();
$url = array();
$onclick = array();
$label_tab = array();
$id_tab = array();
$description = array();
$group = array();
$sugar_smarty = new Sugar_Smarty();
$values_3_tab = array();
$admin_group_header_tab = array();
$j=0;

foreach ($admin_group_header as $key=>$values) {
    $module_index = array_keys($values[3]);
    $addedHeaderGroups = array();
    foreach ($module_index as $mod_key=>$mod_val) {
        if(
        (in_array($mod_val, $access) || (is_admin($current_user) && ($mod_val=='Administration')) ||
        $mod_val=='studio'||($mod_val=='Forecasts' && in_array('ForecastSchedule', $access))) &&
        (!isset($addedHeaderGroups[$values[0]]))) {
            $admin_group_header_tab[]=$values;
            $group_header_value=get_form_header(translate($values[0],'Administration'),$values[1],$values[2]);
        	$group[$j][0] = '<table cellpadding="0" cellspacing="0" width="100%" class="h3Row"><tr ><td width="20%" valign="bottom"><h3>' . translate($values[0]) . '</h3></td></tr>';
        	$addedHeaderGroups[$values[0]] = 1;
        	if (isset($values[4]))
    	       $group[$j][1] = '<tr><td style="padding-top: 3px; padding-bottom: 5px;">' . translate($values[4]) . '</td></tr></table>';
    	    else
    	       $group[$j][2] = '</tr></table>';
            $colnum=0;
            $i=0;
            $fix = array_keys($values[3]);
            if(count($values[3])>1){
                if(!is_admin($current_user)&& isset($values[3]['Administration'])){
                    unset($values[3]['Administration']);
                }
                if(displayStudioForCurrentUser() == false) {
                    unset($values[3]['studio']);
                }
                if(displayWorkflowForCurrentUser() == false) {
                    unset($values[3]['any']['workflow_management']);
                }

                // Need this check because Quotes and Products share the header group
                if(!in_array('Quotes', $access)&& isset($values[3]['Quotes'])){
                    unset($values[3]['Quotes']);
                }
                if(!in_array('Products', $access)&& isset($values[3]['Products'])){
                    unset($values[3]['Products']);
                }
                // Need this check because Emails and Campaigns share the header group
                if(!in_array('Campaigns', $access)&& isset($values[3]['Campaigns'])){
                    unset($values[3]['Campaigns']);
                }

                //////////////////
                $tmp_array = $values[3];
                $return_array = array();
                foreach ($tmp_array as $mod => $value){
                    $keys = array_keys($value);
                    foreach ($keys as $key){
                        $return_array[$key] = $value[$key];
                    }
                }
                $values_3_tab[]= $return_array;
                $mod = $return_array;
            }
           else {
                $mod = $values[3][$fix[0]];
    	        $values_3_tab[]= $mod;
           }

            foreach ($mod as $link_idx =>$admin_option) {
                if(!empty($GLOBALS['admin_access_control_links']) && in_array($link_idx, $GLOBALS['admin_access_control_links'])){
                    continue;
                }
                $colnum+=1;
                $header_image[$j][$i]= SugarThemeRegistry::current()->getImage($admin_option[0],'border="0" align="absmiddle"',null,null,'.gif',translate($admin_option[1],'Administration'));
                $url[$j][$i] = $admin_option[3];
                if(!empty($admin_option[5])) {
                	$onclick[$j][$i] = $admin_option[5];
                }
                $label = translate($admin_option[1],'Administration');
                if(!empty($admin_option['additional_label']))$label.= ' '. $admin_option['additional_label'];
                if(!empty($admin_option[4])){
                	$label = ' <font color="red">'. $label . '</font>';
                }

                $label_tab[$j][$i]= $label;
                $id_tab[$j][$i] = $link_idx;
                
                $description[$j][$i]= translate($admin_option[2],'Administration');

                if (($colnum % 2) == 0) {
                    $tab[$j][$i]= ($colnum % 2);
                }
                else {
                    $tab[$j][$i]= 10;
                }
                $i+=1;
            }

        	//if the loop above ends with an odd entry add a blank column.
        	if (($colnum % 2) != 0) {
        	    $tab[$j][$i]= 10;
        	}
        $j+=1;
    }
  }
}

$sugar_smarty->assign("VALUES_3_TAB", $values_3_tab);
$sugar_smarty->assign("ADMIN_GROUP_HEADER", $admin_group_header_tab);
$sugar_smarty->assign("GROUP_HEADER", $group);
$sugar_smarty->assign("ITEM_HEADER_IMAGE", $header_image);
$sugar_smarty->assign("ITEM_URL", $url);
$sugar_smarty->assign("ITEM_ONCLICK", $onclick);
$sugar_smarty->assign("ITEM_HEADER_LABEL",$label_tab);
$sugar_smarty->assign("ITEM_DESCRIPTION", $description);
$sugar_smarty->assign("COLNUM", $tab);
$sugar_smarty->assign('ID_TAB', $id_tab);

echo $sugar_smarty->fetch('modules/Administration/index.tpl');
?>
