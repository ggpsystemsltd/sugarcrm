<?php
//FILE SUGARCRM flav=pro
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


require_once('include/connectors/filters/default/filter.php');

class ext_rest_zoominfoperson_filter extends default_filter {	
	
public function getList($args, $module) {
	if(empty($args)) {
	   return null;	
	}

	$list = $this->_component->getSource()->getList($args, $module);
	if(empty($list) && isset($args['companyName'])) {
	   if(preg_match('/^(.*?)([\,|\s]+.*?)$/', $args['companyName'], $matches)) {
	   	 $GLOBALS['log']->info("ext_rest_zoominfoperson_filter, change companyName search term");
	   	 $args['companyName'] = $matches[1];
	     $list = $this->_component->getSource()->getList($args, $module);
	   }
	} 		
	
	//If count was 0 and state and/or country value was used, we try to improve searching
	if(empty($list) && isset($args['EmailAddress']) && isset($args['lastName'])) {
	   $GLOBALS['log']->info("ext_rest_zoominfoperson_filter, unset lastName search term");
	   unset($args['lastName']);	
	   $list = $this->_component->getSource()->getList($args, $module);
	}	
	
	if(empty($list) && isset($args['EmailAddress']) && isset($args['firstName'])) {
	   $GLOBALS['log']->info("ext_rest_zoominfoperson_filter, unset firstName search term");
	   unset($args['firstName']);	
	   $list = $this->_component->getSource()->getList($args, $module);
	} 
	
	if(empty($list) && isset($args['EmailAddress']) && isset($args['companyName'])) {
	   unset($args['companyName']);
	   $GLOBALS['log']->info("ext_rest_zoominfoperson_filter, unset companyName search term");
	   $list = $this->_component->getSource()->getList($args, $module);
	} 		
	return $list;
}
	
}

?>