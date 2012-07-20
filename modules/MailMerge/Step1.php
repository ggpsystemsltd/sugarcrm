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
 * Created on Oct 4, 2005
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */




require_once('modules/MailMerge/modules_array.php');


require_once('include/json_config.php');
$json_config = new json_config();

global $app_strings;
global $app_list_strings;
global $mod_strings;
global $current_user;
global  $beanList, $beanFiles;
global $sugar_version, $sugar_config, $db;

$xtpl = new XTemplate('modules/MailMerge/Step1.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);
$xtpl->assign('JSON_CONFIG_JAVASCRIPT', $json_config->get_static_json_server(false, true));

if($_SESSION['MAILMERGE_MODULE'] == 'Campaigns' || $_SESSION['MAILMERGE_MODULE'] == 'CampaignProspects'){
	$modules_array['Campaigns'] = 'Campaigns';
}
$module_list = $modules_array;

if(isset($_REQUEST['reset']) && $_REQUEST['reset'])
{
	$_SESSION['MAILMERGE_MODULE'] = null;
	$_SESSION['MAILMERGE_DOCUMENT_ID'] = null;
	$_SESSION['SELECTED_OBJECTS_DEF'] = null;
	$_SESSION['MAILMERGE_SKIP_REL'] = null;
	$_SESSION['MAILMERGE_RECORD'] = null;
	$_SESSION['MAILMERGE_RECORDS'] = null;
	$_SESSION['MAILMERGE_CONTAINS_CONTACT_INFO'] = null;
}
$fromListView = false;
if(!empty($_REQUEST['record']))
{
	$_SESSION['MAILMERGE_RECORD'] = $_REQUEST['record'];
}
else if(isset($_REQUEST['uid'])) {
	$_SESSION['MAILMERGE_RECORD'] = explode(',', $_REQUEST['uid']);

}
else if(isset($_REQUEST['entire']) && $_REQUEST['entire'] == 'true') {
	// do entire list
	$focus = 0;

	$bean = $beanList[ $_SESSION['MAILMERGE_MODULE']];
	require_once($beanFiles[$bean]);
	$focus = new $bean;

	if(isset($_SESSION['export_where']) && !empty($_SESSION['export_where'])) { // bug 4679
		$where = $_SESSION['export_where'];
	} else {
		$where = '';
	}
    $beginWhere = substr(trim($where), 0, 5);
    if ($beginWhere == "where")
        $where = substr(trim($where), 5, strlen($where));
    $orderBy = '';
	$query = $focus->create_export_query($orderBy,$where);

	$result = $db->query($query,true,"Error mail merging {$_SESSION['MAILMERGE_MODULE']}: "."<BR>$query");

	$new_arr = array();
	while($val = $db->fetchByAssoc($result,false))
	{
		array_push($new_arr, $val['id']);
	}
	$_SESSION['MAILMERGE_RECORD'] = $new_arr;
}
else if(isset($_SESSION['MAILMERGE_RECORDS']))
{

	$fromListView = true;
	$_SESSION['MAILMERGE_RECORD'] = $_SESSION['MAILMERGE_RECORDS'];
	$_SESSION['MAILMERGE_RECORDS'] = null;
}
$rModule = '';
if(isset($_SESSION['MAILMERGE_RECORD']))
{
	if(!empty($_POST['return_module']) && $_POST['return_module'] != "MailMerge")
	{
		$rModule = $_POST['return_module'];
	}
	else if($fromListView)
	{
		$rModule = 	$_SESSION['MAILMERGE_MODULE_FROM_LISTVIEW'];
		$_SESSION['MAILMERGE_MODULE_FROM_LISTVIEW'] = null;
	}
	else
	{
		$rModule = $_SESSION['MAILMERGE_MODULE'];
	}
	if($rModule == 'CampaignProspects'){
    	$rModule = 'Campaigns';
	}

	$_SESSION['MAILMERGE_MODULE'] = $rModule;
	if(!empty($rModule) && $rModule != "MailMerge")
	{
	   $class_name = $beanList[$rModule];
	   $includedir = $beanFiles[$class_name];
	   require_once($includedir);
	   $seed = new $class_name();

	   $selected_objects = '';
    	foreach($_SESSION['MAILMERGE_RECORD'] as $record_id)
    	{
    		if($rModule == 'Campaigns'){

    			$prospect = new Prospect();
    			$prospect_module_list = array('leads', 'contacts', 'prospects', 'users');
    			foreach($prospect_module_list as $mname){
	    			$pList = $prospect->retrieveTargetList("campaigns.id = '$record_id' AND related_type = #$mname#", array('id', 'first_name', 'last_name'));

	    			foreach($pList['list'] as $bean){
	    				$selected_objects .= $bean->id.'='.str_replace("&", "##", $bean->name).'&';
	    			}
    			}
    		}else{
    	   		$seed->retrieve($record_id);
    	   		$selected_objects .= $record_id.'='.str_replace("&", "##", $seed->name).'&';
    		}
    	}


    	if($rModule != 'Contacts'
    	   && $rModule != 'Leads' && $rModule != 'Products' && $rModule != 'Campaigns' && $rModule != 'Projects'
    	   )
    	{
    		$_SESSION['MAILMERGE_SKIP_REL'] = false;
    		$xtpl->assign("STEP", "2");
    		$xtpl->assign("SELECTED_OBJECTS", $selected_objects);
    		$_SESSION['SELECTED_OBJECTS_DEF'] = $selected_objects;
    	}
    	else
    	{
    		$_SESSION['MAILMERGE_SKIP_REL'] = true;
    		$xtpl->assign("STEP", "2");
    		$_SESSION['SELECTED_OBJECTS_DEF'] = $selected_objects;
    	}
    }
    else
    {
    	$xtpl->assign("STEP", "2");
    }

}
else
{
	$xtpl->assign("STEP", "2");
}
$modules = $module_list;
$func = "";
if($rModule == 'Campaigns'){
	$func = "disableModuleDropDown();";
}
$xtpl->assign("MAILMERGE_DISABLE_DROP_DOWN", $func);
$xtpl->assign("MAILMERGE_MODULE_OPTIONS", get_select_options_with_id($modules, $_SESSION['MAILMERGE_MODULE']));
$xtpl->assign("MAILMERGE_TEMPLATES", get_select_options_with_id(getDocumentRevisions(), '0'));

if(isset($_SESSION['MAILMERGE_MODULE'])){
	$module_select_text = $mod_strings['LBL_MAILMERGE_SELECTED_MODULE'];
	$xtpl->assign("MAILMERGE_NUM_SELECTED_OBJECTS",count($_SESSION['MAILMERGE_RECORD'])." ".$_SESSION['MAILMERGE_MODULE']." Selected");
}
else{
	$module_select_text = $mod_strings['LBL_MAILMERGE_MODULE'];
}
$xtpl->assign("MODULE_SELECT", $module_select_text);
if($_SESSION['MAILMERGE_MODULE'] == 'Campaigns'){
    $_SESSION['MAILMERGE_MODULE'] = 'CampaignProspects';
}

$admin = new Administration();
$admin->retrieveSettings();
$user_merge = $current_user->getPreference('mailmerge_on');
if ($user_merge != 'on' || !isset($admin->settings['system_mailmerge_on']) || !$admin->settings['system_mailmerge_on']){
	$xtpl->assign("ADDIN_NOTICE", $mod_strings['LBL_ADDIN_NOTICE']);
	$xtpl->assign("DISABLE_NEXT_BUTTON", "disabled");
}


$xtpl->parse("main");
$xtpl->out("main");

/*function get_user_module_list($user){
	global $app_list_strings, $current_language;
	$app_list_strings = return_app_list_strings_language($current_language);
	$modules = query_module_access_list($user);
	global $modInvisList;

	return $modules;
}*/

function getDocumentRevisions()
{
	$document = new Document();

	$currentDate = $document->db->now();
	$empty_date = $document->db->emptyValue("date");

			$query = "SELECT revision, document_name, document_revisions.id FROM document_revisions
LEFT JOIN documents on documents.id = document_revisions.document_id
WHERE ((active_date <= $currentDate AND exp_date > $currentDate)
	OR (active_date is NULL) or (active_date = ".$empty_date.")
	OR (active_date <= $currentDate AND ((exp_date = $empty_date OR (exp_date is NULL)))))
AND is_template = 1 AND template_type = 'mailmerge' AND documents.deleted = 0 ORDER BY document_name";

			$result = $document->db->query($query,true,"Error retrieving $document->object_name list: ");

                        $list = Array();
                        $list['None'] = 'None';
                        while(($row = $document->db->fetchByAssoc($result)) != null)
                            {
                                $revision = null;
                                $docName = $row['document_name'];
                                $revision = $row['revision'];
                                if(!empty($revision));
                                {
                                        $docName .= " (rev. ".$revision.")";
                                }
                                $list[$row['id']] = $docName;
                            }
                        return $list;

}
?>
