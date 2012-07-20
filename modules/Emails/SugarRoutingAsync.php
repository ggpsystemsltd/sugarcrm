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

 * Description:
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc. All Rights
 * Reserved. Contributor(s): ______________________________________..
 *********************************************************************************/
require_once("include/SugarRouting/SugarRouting.php");

$ie = new InboundEmail();
$json = getJSONobj();
$rules = new SugarRouting($ie, $current_user);

switch($_REQUEST['routingAction']) {
	case "setRuleStatus":
		$rules->setRuleStatus($_REQUEST['rule_id'], $_REQUEST['status']);
	break;
	
	case "saveRule":
		$rules->save($_REQUEST);
	break;
	
	case "deleteRule":
		$rules->deleteRule($_REQUEST['rule_id']);
	break;
	
	/* returns metadata to construct actions */
	case "getActions":
		require_once("include/SugarDependentDropdown/SugarDependentDropdown.php");
		
		$sdd = new SugarDependentDropdown();
		$sdd->init("include/SugarDependentDropdown/metadata/dependentDropdown.php");
		$out = $json->encode($sdd->metadata, true);
		echo $out;
	break;
	
	/* returns metadata to construct a rule */
	case "getRule":
		$ret = '';
		if(isset($_REQUEST['rule_id']) && !empty($_REQUEST['rule_id']) && isset($_REQUEST['bean']) && !empty($_REQUEST['bean'])) {
			if(!isset($beanList))
				include("include/modules.php");
			
			$class = $beanList[$_REQUEST['bean']];
			//$beanList['Groups'] = 'Group';
			if(isset($beanList[$_REQUEST['bean']])) {
				require_once("modules/{$_REQUEST['bean']}/{$class}.php");
				$bean = new $class();
				
				$rule = $rules->getRule($_REQUEST['rule_id'], $bean);
				
				$ret = array(
					'bean' => $_REQUEST['bean'],
					'rule' => $rule
				);
			}
		} else {
			$bean = new SugarBean();
			$rule = $rules->getRule('', $bean);
			
			$ret = array(
				'bean' => $_REQUEST['bean'],
				'rule' => $rule
			);
		}
		
		//_ppd($ret);
		
		$out = $json->encode($ret, true);
		echo $out;
	break;
	
	case "getStrings":
		$ret = $rules->getStrings();
		$out = $json->encode($ret, true);
		echo $out;
	break;

	
	default:
		echo "NOOP";
}