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


/**
 * Get the query that produces emails related to certain object via link to certain other object
 * E.g. having Account fetch Contacts related to it and then get all emails that have some address as one of these contacts
 * @param array $params 'link' is the relation name to use
 * @return array Array representing the query
 */
function get_unlinked_email_query_via_link($params)
{
    $relation = $params['link'];
	$bean = $GLOBALS['app']->controller->bean;
    if(empty($bean->$relation)) {
        $bean->load_relationship($relation);
    }
    if(empty($bean->$relation)) {
        $GLOBALS['log']->error("Bad relation '$relation' for bean '{$bean->object_name}' id '{$bean->id}'");
        return array();
    }
    $rel_module = $bean->$relation->getRelatedModuleName();
    $rel_join = $bean->$relation->getJoin(array(
    	'join_table_alias' => 'link_bean',
    	'join_table_link_alias' => 'linkt',
    ));
    $return_array['select']='SELECT DISTINCT emails.id';
    $return_array['from']='FROM emails ';
	$return_array['join'] = " JOIN emails_email_addr_rel eear ON eear.email_id = emails.id AND eear.deleted=0
		    	JOIN email_addr_bean_rel eabr ON eabr.email_address_id=eear.email_address_id AND eabr.bean_module = '$rel_module' AND eabr.deleted=0
				$rel_join AND link_bean.id = eabr.bean_id
				LEFT JOIN emails_beans direct_link ON direct_link.bean_id = '{$bean->id}' AND direct_link.email_id = emails.id
";
// 				JOIN (select '{$bean->id}' as id) {$bean->table_name}

    $return_array['join'] = str_replace($bean->table_name.".id", "'{$bean->id}'", $return_array['join']);
    // exclude directly linked emails
    $return_array['where']="WHERE direct_link.bean_id IS NULL";
	// Special case for Case - match only proper case number
    if($bean->object_name == "Case" && !empty($bean->case_number)) {
        $where = str_replace("%1", $bean->case_number, 	$bean->getEmailSubjectMacro());
	    $return_array["where"] .= " AND emails.name LIKE '%$where%'";
    }
    $return_array['join_tables'][0] = '';
	return $return_array;
}

/**
 * Get query fetching all objects that have same email address as current email object,
 * excluding those that are connected to this email explicitly by direct relation
 * The email is specified by current controller's bean object
 * @param array $module_dir 'module' has required module dir name
 * @return array
 */
function get_beans_by_email_addr($module_dir)
{
    $bean = $GLOBALS['app']->controller->bean;
    $module_dir = $module_dir['module'];
    $module = get_module_info($module_dir);
    $return_array['select'] = "SELECT DISTINCT {$module->table_name}.id ";
    $return_array['from'] = "FROM {$module->table_name} ";
    $return_array['join'] = " JOIN emails_email_addr_rel eear ON eear.email_id = '$bean->id' AND eear.deleted=0
		    	JOIN email_addr_bean_rel eabr ON eabr.email_address_id=eear.email_address_id AND eabr.bean_id = {$module->table_name}.id AND eabr.bean_module = '$module_dir' AND eabr.deleted=0
				LEFT JOIN emails_beans direct_link ON direct_link.bean_id = '{$bean->id}' AND direct_link.email_id = {$module->table_name}.id
";
    // exclude directly linked emails
    $return_array['where']="WHERE direct_link.bean_id IS NULL";
    $return_array['join_tables'][0] = '';
    return $return_array;
} // fn
