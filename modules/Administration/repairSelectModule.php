<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');
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

		
		global $mod_strings;
		global $current_language;
		$smarty = new Sugar_Smarty();
			$temp_bean_list = $beanList;
			asort($temp_bean_list);
			$values= array_values($temp_bean_list);
			$output= array_keys($temp_bean_list);  
			$output_local = array();
			if($current_language != 'en_us') {
				foreach($output as $temp_out) {
					$output_local[] = translate($temp_out);
				}
			} else {
				$output_local = $output;
			}
			//sort($output);
			//sort($values);
			$values=array_merge(array($mod_strings['LBL_ALL_MODULES']), $values);
			$output= array_merge(array($mod_strings['LBL_ALL_MODULES']),$output_local);
			$checkbox_values=array(
									 'clearTpls',
									 'clearJsFiles',
									 'clearVardefs', 
									 'clearJsLangFiles',
									 'clearDashlets',
									 'clearSugarFeedCache',
									 'clearThemeCache',
									 'rebuildAuditTables',
									 'rebuildExtensions',
									 'clearLangFiles',
                                     'clearSearchCache',
			                         'clearPDFFontCache',
			                         //'repairDatabase'
									 );
			$checkbox_output = array(   $mod_strings['LBL_QR_CBOX_CLEARTPL'], 
                                        $mod_strings['LBL_QR_CBOX_CLEARJS'],
                                        $mod_strings['LBL_QR_CBOX_CLEARVARDEFS'],
                                        $mod_strings['LBL_QR_CBOX_CLEARJSLANG'],
                                        $mod_strings['LBL_QR_CBOX_CLEARDASHLET'],
                                        $mod_strings['LBL_QR_CBOX_CLEARSUGARFEEDCACHE'],
                                        $mod_strings['LBL_QR_CBOX_CLEARTHEMECACHE'],
                                        $mod_strings['LBL_QR_CBOX_REBUILDAUDIT'],
                                        $mod_strings['LBL_QR_CBOX_REBUILDEXT'],
                                        $mod_strings['LBL_QR_CBOX_CLEARLANG'],
                                        $mod_strings['LBL_QR_CBOX_CLEARSEARCH'],
                                        $mod_strings['LBL_QR_CBOX_CLEARPDFFONT'],
                                        //$mod_strings['LBL_QR_CBOX_DATAB'],
									 );
			$smarty->assign('checkbox_values', $checkbox_values);
			$smarty->assign('values', $values);
			$smarty->assign('output', $output);
			$smarty->assign('MOD', $mod_strings);
			$smarty->assign('checkbox_output', $checkbox_output);
			$smarty->assign('checkbox_values', $checkbox_values);
			$smarty->display("modules/Administration/templates/QuickRepairAndRebuild.tpl");			
			
			
?>
