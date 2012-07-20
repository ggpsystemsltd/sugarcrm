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

/*
 Removes Relationships, input is a form POST

ARGS:
 $_REQUEST['module']; : the module associated with this Bean instance (will be used to get the class name)
 $_REQUEST['record']; : the id of the Bean instance
 $_REQUEST['linked_field']; : the linked field name of the Parent Bean
 $_REQUEST['linked_id']; : the id of the Related Bean instance to

 $_REQUEST['return_url']; : the URL to redirect to
  or use:
  1) $_REQUEST['return_id']; :
  2) $_REQUEST['return_module']; :
  3) $_REQUEST['return_action']; :
*/
//_ppd($_REQUEST);


require_once('include/formbase.php');

 global $beanFiles,$beanList;
 $bean_name = $beanList[$_REQUEST['module']];
 require_once($beanFiles[$bean_name]);
 $focus = new $bean_name();
 if (  empty($_REQUEST['linked_id']) || empty($_REQUEST['linked_field'])  || empty($_REQUEST['record']))
 {
	die("need linked_field, linked_id and record fields");
 }
 $linked_field = $_REQUEST['linked_field'];
 $record = $_REQUEST['record'];
 $linked_id = $_REQUEST['linked_id'];
 if($bean_name == 'Team')
 {
 	$focus->retrieve($record);
 	$focus->remove_user_from_team($linked_id);
 }
 else
 {
 	// cut it off:
 	$focus->load_relationship($linked_field);
 	if($focus->$linked_field->_relationship->relationship_name == 'quotes_contacts_shipto')
 		unset($focus->$linked_field->_relationship->relationship_role_column);
 	$focus->$linked_field->delete($record,$linked_id);
 }
 if ($bean_name == 'Campaign' and $linked_field=='prospectlists' ) {

 	$query="SELECT email_marketing_prospect_lists.id from email_marketing_prospect_lists ";
 	$query.=" left join email_marketing on email_marketing.id=email_marketing_prospect_lists.email_marketing_id";
	$query.=" where email_marketing.campaign_id='$record'";
 	$query.=" and email_marketing_prospect_lists.prospect_list_id='$linked_id'";

 	$result=$focus->db->query($query);
	while (($row=$focus->db->fetchByAssoc($result)) != null) {
			$del_query =" update email_marketing_prospect_lists set email_marketing_prospect_lists.deleted=1, email_marketing_prospect_lists.date_modified=".$focus->db->convert("'".TimeDate::getInstance()->nowDb()."'",'datetime');
 			$del_query.=" WHERE  email_marketing_prospect_lists.id='{$row['id']}'";
		 	$focus->db->query($del_query);
	}
 	$focus->db->query($query);
 }
if ($bean_name == "Meeting") {
    $focus->retrieve($record);
    $user = new User();
    $user->retrieve($linked_id);
    if (!empty($user->id)) {  //make sure that record exists. we may have a contact on our hands.

    	if($focus->update_vcal)
    	{
        	vCal::cache_sugar_vcal($user);
    	}
    }
}
if ($bean_name == "User" && $linked_field == 'eapm') {
    $eapm = new EAPM();
    $eapm->mark_deleted($linked_id);
}
require_once("data/Relationships/SugarRelationship.php");
SugarRelationship::resaveRelatedBeans();

if(!empty($_REQUEST['return_url'])){
	$_REQUEST['return_url'] =urldecode($_REQUEST['return_url']);
}
$GLOBALS['log']->debug("deleted relationship: bean: $bean_name, linked_field: $linked_field, linked_id:$linked_id" );
if(empty($_REQUEST['refresh_page'])){
	handleRedirect();
}


exit;
?>