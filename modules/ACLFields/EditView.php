<?php
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


class ACLFieldsEditView{
	function getView($module, $role_id){
		$fields = ACLField::getFields( $module, '', $role_id);
		$sugar_smarty = new Sugar_Smarty();
		if(substr($module, 0, 2)=='KB'){
        	$sugar_smarty->assign('LBL_MODULE', 'KBDocuments');
        }
        else{
        	$sugar_smarty->assign('LBL_MODULE', $module);
        }
		$sugar_smarty->assign('MOD', $GLOBALS['mod_strings']);
		$sugar_smarty->assign('APP', $GLOBALS['app_strings']);
		$sugar_smarty->assign('FLC_MODULE', $module);
		$sugar_smarty->assign('APP_LIST', $GLOBALS['app_list_strings']);
		$sugar_smarty->assign('FIELDS', $fields);
		foreach($GLOBALS['aclFieldOptions'] as $key=>$option){
			$GLOBALS['aclFieldOptions'][$key] = translate($option, 'ACLFields');
		}
		$sugar_smarty->assign('OPTIONS',  $GLOBALS['aclFieldOptions']);
		$req_options = $GLOBALS['aclFieldOptions'];
		unset($req_options[-99]);
		$sugar_smarty->assign('OPTIONS_REQUIRED',  $req_options);
		return  $sugar_smarty->fetch('modules/ACLFields/EditView.tpl');
	}
}
?>