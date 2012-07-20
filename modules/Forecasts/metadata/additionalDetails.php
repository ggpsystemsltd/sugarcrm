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


function additionaldetailsforecastopportunities($fields) {
    global $current_language, $app_list_strings;
    $mod_strings = return_module_language($current_language, 'Opportunities');
    $overlib_string = '';
    
    if(!empty($fields['ACCOUNT_NAME'])) $overlib_string .= '<b>'. $mod_strings['LBL_ACCOUNT_NAME'] . '</b> ' . $fields['ACCOUNT_NAME'] . '<br>';
    if(!empty($fields['PROBABILITY'])) $overlib_string .= '<b>'. $mod_strings['LBL_PROBABILITY'] . '</b> ' . $fields['PROBABILITY'] . '<br>';
    if(!empty($fields['NEXT_STEP'])) $overlib_string .= '<b>'. $mod_strings['LBL_NEXT_STEP'] . '</b> ' . $fields['NEXT_STEP'] . '<br>';
    if(!empty($fields['OPPORTUNITY_TYPE'])) $overlib_string .= '<b>'. $mod_strings['LBL_TYPE'] . '</b> ' . $app_list_strings['opportunity_type_dom'][$fields['OPPORTUNITY_TYPE']] . '<br>';

    if(!empty($fields['DESCRIPTION'])) {
        $overlib_string .= '<b>'. $mod_strings['LBL_DESCRIPTION'] . '</b> ';
        $overlib_string .= substr($fields['DESCRIPTION'], 0, 300);
        if(strlen($fields['DESCRIPTION']) > 300) $overlib_string .= '...';
    }   
    return array('fieldToAddTo' => 'NAME', 
                 'string' => $overlib_string, 
                 'editLink' => "index.php?action=EditView&module=Opportunities&return_module=Forecasts&return_action=index&record={$fields['ID']}", 
                 'viewLink' => "index.php?action=DetailView&module=Opportunities&return_module=Forecasts&return_action=index&record={$fields['ID']}");
}
 
function additionaldetailsforecastdirectreports($fields) {

    global $current_language;
    $mod_strings = return_module_language($current_language, 'Forecasts');
    $overlib_string = '';

    if(isset($fields['OPP_COUNT'])) $overlib_string .= '<b>'. $mod_strings['LBL_FDR_OPPORTUNITIES'] . '</b> ' . $fields['OPP_COUNT'] . '<br>';
    if(isset($fields['OPP_WEIGH_VALUE'])) $overlib_string .= '<b>'. $mod_strings['LBL_FDR_WEIGH'] . '</b> ' . $fields['OPP_WEIGH_VALUE'] . '<br>';
    if(isset($fields['DATE_ENTERED'])) $overlib_string .= '<b>'. $mod_strings['LBL_FDR_DATE_COMMIT'] . '</b> ' . $fields['DATE_ENTERED'] . '<br>';

    return array('fieldToAddTo' => 'USER_NAME', 
                 'string' => $overlib_string, 
                 'editLink' => false, 
                 'viewLink' => false);
}
 
 ?>
 
