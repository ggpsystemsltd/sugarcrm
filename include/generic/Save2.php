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
ARGS:
 $_REQUEST['method']; : options: 'SaveRelationship','Save','DeleteRelationship','Delete'
 $_REQUEST['module']; : the module associated with this Bean instance (will be used to get the class name)
 $_REQUEST['record']; : the id of the Bean instance
// $_REQUEST['related_field']; : the field name on the Bean instance that contains the relationship
// $_REQUEST['related_record']; : the id of the related record
// $_REQUEST['related_']; : the
// $_REQUEST['return_url']; : the URL to redirect to
//$_REQUEST['return_type']; : when set the results of a report will be linked with the parent.
*/


require_once('include/formbase.php');

function add_prospects_to_prospect_list($query,$parent_module,$parent_type,$parent_id,$child_id,$link_attribute,$link_type) {

	$GLOBALS['log']->debug('add_prospects_to_prospect_list:parameters:'.$query);
	$GLOBALS['log']->debug('add_prospects_to_prospect_list:parameters:'.$parent_module);
	$GLOBALS['log']->debug('add_prospects_to_prospect_list:parameters:'.$parent_type);
	$GLOBALS['log']->debug('add_prospects_to_prospect_list:parameters:'.$parent_id);
	$GLOBALS['log']->debug('add_prospects_to_prospect_list:parameters:'.$child_id);
	$GLOBALS['log']->debug('add_prospects_to_prospect_list:parameters:'.$link_attribute);
	$GLOBALS['log']->debug('add_prospects_to_prospect_list:parameters:'.$link_type);


	if (!class_exists($parent_type)) {
		require_once('modules/'.$parent_module.'/'.$parent_type.'.php');
	}
	$focus = new $parent_type();
	$focus->retrieve($parent_id);

	//if link_type is default then load relationship once and add all the child ids.
	$relationship_attribute=$link_attribute;

	//find all prospects based on the query
	$db = DBManagerFactory::getInstance();
	$result=$db->query($query);
	while(($row=$db->fetchByAssoc($result)) != null) {

		$GLOBALS['log']->debug('target_id'.$row[$child_id]);

		if ($link_type != 'default') {
			$relationship_attribute=strtolower($row[$link_attribute]);
		}

		$GLOBALS['log']->debug('add_prospects_to_prospect_list:relationship_attribute:'.$relationship_attribute);

		//load relationship for the first time or on change of relationship atribute.
		if (empty($focus->$relationship_attribute)) {
			$focus->load_relationship($relationship_attribute);
		}
		//add
		$focus->$relationship_attribute->add($row[$child_id]);
	}
}

//Link rows returned by a report to parent record.
function save_from_report($report_id,$parent_id, $module_name, $relationship_attr_name) {
	global $beanFiles;
	global $beanList;

	$GLOBALS['log']->debug("Save2: Linking with report output");
	$GLOBALS['log']->debug("Save2:Report ID=".$report_id);
	$GLOBALS['log']->debug("Save2:Parent ID=".$parent_id);
	$GLOBALS['log']->debug("Save2:Module Name=".$module_name);
	$GLOBALS['log']->debug("Save2:Relationship Attribute Name=".$relationship_attr_name);

 	$bean_name = $beanList[$module_name];
	$GLOBALS['log']->debug("Save2:Bean Name=".$bean_name);
	require_once($beanFiles[$bean_name]);
 	$focus = new $bean_name();

	$focus->retrieve($parent_id);
	$focus->load_relationship($relationship_attr_name);

	//fetch report definition.
global $current_language, $report_modules, $modules_report;

$mod_strings = return_module_language($current_language,"Reports");


	$saved = new SavedReport();
	$saved->disable_row_level_security = true;
	$saved->retrieve($report_id, false);

	//initiailize reports engine with the report definition.
	require_once('modules/Reports/SubpanelFromReports.php');
	$report = new SubpanelFromReports($saved);
	$report->run_query();

	$sql = $report->query_list[0];
	$GLOBALS['log']->debug("Save2:Report Query=".$sql);
	$result = $report->db->query($sql);
	while($row = $report->db->fetchByAssoc($result))
	{
		$focus->$relationship_attr_name->add($row['primaryid']);
	}
}

$refreshsubpanel=true;
if (isset($_REQUEST['return_type'])  && $_REQUEST['return_type'] == 'report') {
	save_from_report($_REQUEST['subpanel_id'] //report_id
					 ,$_REQUEST['record'] //parent_id
					 ,$_REQUEST['module'] //module_name
					 ,$_REQUEST['subpanel_field_name'] //link attribute name
	);
} else if (isset($_REQUEST['return_type'])  && $_REQUEST['return_type'] == 'addtoprospectlist') {

	$GLOBALS['log']->debug(print_r($_REQUEST,true));
	add_prospects_to_prospect_list(urldecode($_REQUEST['query']),$_REQUEST['parent_module'],$_REQUEST['parent_type'],$_REQUEST['subpanel_id'],
			$_REQUEST['child_id'],$_REQUEST['link_attribute'],$_REQUEST['link_type']);

	$refreshsubpanel=false;
}else if (isset($_REQUEST['return_type'])  && $_REQUEST['return_type'] == 'addcampaignlog') {
    //if param is set to "addcampaignlog", then we need to create a campaign log entry
    //for each campaign id passed in.

    //get list of campaign's selected'
    if (isset($_REQUEST['subpanel_id'])  && !empty($_REQUEST['subpanel_id'])) {
        $campaign_ids = $_REQUEST['subpanel_id'];
        global $beanFiles;
        global $beanList;
        //retrieve current bean
        $bean_name = $beanList[$_REQUEST['module']];
        require_once($beanFiles[$bean_name]);
        $focus = new $bean_name();
        $focus->retrieve($_REQUEST['record']);

        require_once('modules/Campaigns/utils.php');
        //call util function to create the campaign log entry
        foreach($campaign_ids as $id){
            create_campaign_log_entry($id, $focus, $focus->module_dir,$focus, $focus->id);
        }
        $refreshsubpanel=true;
    }
}
else {

	global $beanFiles,$beanList;
 	$bean_name = $beanList[$_REQUEST['module']];
 	require_once($beanFiles[$bean_name]);
 	$focus = new $bean_name();

 	$focus->retrieve($_REQUEST['record']);

 	// If the user selected "All records" from the selection menu, we pull up the list
 	// based on the query they used on that popup to relate them to the parent record
 	if(!empty($_REQUEST['select_entire_list']) &&  $_REQUEST['select_entire_list'] != 'undefined' && isset($_REQUEST['current_query_by_page'])){
		$order_by = '';
		$current_query_by_page = $_REQUEST['current_query_by_page'];
 		$current_query_by_page_array = unserialize(base64_decode($current_query_by_page));

        $module = $current_query_by_page_array['module'];
 		$seed = loadBean($module);
 		$where_clauses = '';
 		require_once('include/SearchForm/SearchForm2.php');

 		if(file_exists('custom/modules/'.$module.'/metadata/metafiles.php')){
            require('custom/modules/'.$module.'/metadata/metafiles.php');
        }elseif(file_exists('modules/'.$module.'/metadata/metafiles.php')){
            require('modules/'.$module.'/metadata/metafiles.php');
        }

        if (file_exists('custom/modules/'.$module.'/metadata/searchdefs.php'))
        {
        	require_once('custom/modules/'.$module.'/metadata/searchdefs.php');
        }
        elseif (!empty($metafiles[$module]['searchdefs']))
        {
        	require_once($metafiles[$module]['searchdefs']);
        }
        elseif (file_exists('modules/'.$module.'/metadata/searchdefs.php'))
        {
        	require_once('modules/'.$module.'/metadata/searchdefs.php');
        }

        if(!empty($metafiles[$module]['searchfields'])){
        	require_once($metafiles[$module]['searchfields']);
        }
        elseif(file_exists('modules/'.$module.'/metadata/SearchFields.php')){
        	require_once('modules/'.$module.'/metadata/SearchFields.php');
        }
        if(!empty($searchdefs) && !empty($searchFields)) {
        	$searchForm = new SearchForm($seed, $module);
	        $searchForm->setup($searchdefs, $searchFields, 'SearchFormGeneric.tpl');
	        $searchForm->populateFromArray($current_query_by_page_array, 'advanced');
	        $where_clauses_arr = $searchForm->generateSearchWhere(true, $module);
	        if (count($where_clauses_arr) > 0 ) {
	            $where_clauses = '('. implode(' ) AND ( ', $where_clauses_arr) . ')';
	        }
        }

		$ret_array = create_export_query_relate_link_patch($module, $searchFields, $where_clauses);
		$query = $seed->create_export_query($order_by, $ret_array['where'], $ret_array['join']);
		$result = $GLOBALS['db']->query($query,true);
		$uids = array();
		while($val = $GLOBALS['db']->fetchByAssoc($result,false))
		{
			array_push($uids, $val['id']);
		}
		$_REQUEST['subpanel_id'] = $uids;
 	}

 	if($bean_name == 'Team'){
 		$subpanel_id = $_REQUEST['subpanel_id'];
 		if(is_array($subpanel_id)){
 			foreach($subpanel_id as $id){
 				$focus->add_user_to_team($id);
 			}
 		}
 		else{
 			$focus->add_user_to_team($subpanel_id);
 		}
 	} else{
 		//find request paramters with with prefix of REL_ATTRIBUTE_
 		//convert them into an array of name value pairs add pass them as
 		//parameters to the add metod.
 		$add_values =array();
 		foreach ($_REQUEST as $key=>$value) {
 			if (strpos($key,"REL_ATTRIBUTE_") !== false) {
 				$add_values[substr($key,14)]=$value;
 			}
 		}
 		$focus->load_relationship($_REQUEST['subpanel_field_name']);
 		$focus->$_REQUEST['subpanel_field_name']->add($_REQUEST['subpanel_id'],$add_values);
        $focus->save();
 	}
}

if ($refreshsubpanel) {
	//refresh contents of the sub-panel.
	$GLOBALS['log']->debug("Location: index.php?sugar_body_only=1&module=".$_REQUEST['module']."&subpanel=".$_REQUEST['subpanel_module_name']."&action=SubPanelViewer&inline=1&record=".$_REQUEST['record']);
	if( empty($_REQUEST['refresh_page']) || $_REQUEST['refresh_page'] != 1){
		$inline = isset($_REQUEST['inline'])?$_REQUEST['inline']: $inline;
		header("Location: index.php?sugar_body_only=1&module=".$_REQUEST['module']."&subpanel=".$_REQUEST['subpanel_module_name']."&action=SubPanelViewer&inline=$inline&record=".$_REQUEST['record']);
	}
}
exit;
?>
