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


/*
 ARGS:

 $_REQUEST['module'] : the module associated with this Bean instance (will be used to get the class name)
 $_REQUEST['prospect_lists'] : the id of the prospect list
 $_REQUEST['uids'] : the ids of the records to be added to the prospect list, separated by ','

 */

require_once 'include/formbase.php';

global $beanFiles,$beanList;
$bean_name = $beanList[$_REQUEST['module']];
require_once($beanFiles[$bean_name]);
$focus = new $bean_name();

$uids = array();
if($_REQUEST['select_entire_list'] == '1'){
	$order_by = '';

	require_once('include/MassUpdate.php');
	$mass = new MassUpdate();
	$mass->generateSearchWhere($_REQUEST['module'], $_REQUEST['current_query_by_page']);
	$ret_array = create_export_query_relate_link_patch($_REQUEST['module'], $mass->searchFields, $mass->where_clauses);
	$query = $focus->create_export_query($order_by, $ret_array['where'], $ret_array['join']);
	$result = $GLOBALS['db']->query($query,true);
	$uids = array();
	while($val = $GLOBALS['db']->fetchByAssoc($result,false))
	{
		array_push($uids, $val['id']);
	}
}
else{
	$uids = explode ( ',', $_POST['uids'] );
}

// find the relationship to use
$relationship = '';
foreach($focus->get_linked_fields() as $field => $def) {
    if ($focus->load_relationship($field)) {
        if ( $focus->$field->getRelatedModuleName() == 'ProspectLists' ) {
            $relationship = $field;
            break;
        }
    }
}

if ( $relationship != '' ) {
    foreach ( $uids as $id) {
        $focus->retrieve($id);
        $focus->load_relationship($relationship);
        $focus->prospect_lists->add( $_REQUEST['prospect_list'] );
    }
}
handleRedirect();
exit;
?>
