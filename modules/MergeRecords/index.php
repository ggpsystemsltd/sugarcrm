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

if (isset($_REQUEST['uid'])) {
	$merge_ids = explode(',',$_REQUEST['uid']);
	// Bug 18852 - Check to make sure we have ACL Edit privledges on both records involved in the merge before proceeding
	if ( ($bean1 = SugarModule::get($_REQUEST['action_module'])->loadBean()) !== false
    	    && ($bean2 = SugarModule::get($_REQUEST['action_module'])->loadBean()) !== false ) {
        $bean1->retrieve($merge_ids[0]);
        $bean2->retrieve($merge_ids[1]);
        if ( !$bean1->ACLAccess('edit') || !$bean2->ACLAccess('edit') ) {
            ACLController::displayNoAccess();
            sugar_die('');
        }
    }
	
	 //redirect to step3.
	$_REQUEST['record']=$merge_ids[0];
	$_REQUEST['merge_module']=$_REQUEST['action_module'];
	unset($merge_ids[0]);
	$_REQUEST['mass']=$merge_ids;
}
else {
	global $beanList;
	global $beanFiles;
	$merge_ids = array();
	$bean = $beanList[$_REQUEST['return_module']];
	require_once($beanFiles[$bean]);
	$focus = new $bean();
	
	if(isset($_SESSION['export_where']) && !empty($_SESSION['export_where'])) { // bug 4679
		$where = $_SESSION['export_where'];
		$whereArr = explode (" ", trim($where));
		if ($whereArr[0] == trim('where')) {
			$whereClean = array_shift($whereArr);
		}
		$where = implode(" ", $whereArr);
	}	
	else {
		$where = '';
	}
	if(empty($order_by))$order_by = '';
	$query = $focus->create_export_query($order_by,$where);
	$result = $focus->db->query($query,true);
	
	/*
	$query = 'select * from '.$focus->table_name.' where deleted=0';
	$result = $focus->db->query($query, true, "");   
	*/
	$row = $focus->db->fetchByAssoc($result);
	
	while ($row != null) {
	    //$beanObj = new $bean;
	    array_push($merge_ids, $row['id']);
	    $row = $focus->db->fetchByAssoc($result);    
	}
	$_REQUEST['record']=$merge_ids[0];
	$_REQUEST['action']='index.php';
	$_REQUEST['merge_module']=$_REQUEST['return_module'];
	unset($merge_ids[0]);
	$_REQUEST['mass']=$merge_ids;
}
require('modules/MergeRecords/Step3.php');
 
?>
