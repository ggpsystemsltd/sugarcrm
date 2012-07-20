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


$popupMeta = array (
    'moduleMain' => 'Lead',
    'varName' => 'LEAD',
    'orderBy' => 'last_name, first_name',
    'whereClauses' => array (
		'first_name' => 'leads.first_name',
		'last_name' => 'leads.last_name',
		'lead_source' => 'leads.lead_source',
		'status' => 'leads.status',
		'account_name' => 'leads.account_name',
		'assigned_user_id' => 'leads.assigned_user_id',
	),
    'searchInputs' => array (
	  0 => 'first_name',
	  1 => 'last_name',
	  2 => 'lead_source',
	  3 => 'status',
	  4 => 'account_name',
	  5 => 'assigned_user_id',
	),
    'searchdefs' => array (
	  'first_name' => 
	  array (
	    'name' => 'first_name',
	    'width' => '10%',
	  ),
	  'last_name' => 
	  array (
	    'name' => 'last_name',
	    'width' => '10%',
	  ),
	  'email',
	  'account_name' => 
	  array (
	    'type' => 'varchar',
	    'label' => 'LBL_ACCOUNT_NAME',
	    'width' => '10%',
	    'name' => 'account_name',
	  ),
	  'lead_source' => 
	  array (
	    'name' => 'lead_source',
	    'width' => '10%',
	  ),
	  'status' => 
	  array (
	    'name' => 'status',
	    'width' => '10%',
	  ),
	  'assigned_user_id' => 
	  array (
	    'name' => 'assigned_user_id',
	    'type' => 'enum',
	    'label' => 'LBL_ASSIGNED_TO',
	    'function' => 
	    array (
	      'name' => 'get_user_array',
	      'params' => 
	      array (
	        0 => false,
	      ),
	    ),
	    'width' => '10%',
	  ),
	),
    'listviewdefs' => array (
	  'NAME' => 
	  array (
	    'width' => '30%',
	    'label' => 'LBL_LIST_NAME',
	    'link' => true,
	    'default' => true,
	    'related_fields' => 
	    array (
	      0 => 'first_name',
	      1 => 'last_name',
	      2 => 'salutation',
	    ),
	    'name' => 'name',
	  ),
	  'ACCOUNT_NAME' => 
	  array (
	    'type' => 'varchar',
	    'label' => 'LBL_ACCOUNT_NAME',
	    'width' => '10%',
	    'default' => true,
	    'name' => 'account_name',
	  ),
	  'STATUS' => 
	  array (
	    'width' => '10%',
	    'label' => 'LBL_LIST_STATUS',
	    'default' => true,
	    'name' => 'status',
	  ),
	  'LEAD_SOURCE' => 
	  array (
	    'width' => '10%',
	    'label' => 'LBL_LEAD_SOURCE',
	    'default' => true,
	    'name' => 'lead_source',
	  ),
	  'ASSIGNED_USER_NAME' => 
	  array (
	    'width' => '10%',
	    'label' => 'LBL_LIST_ASSIGNED_USER',
	    'default' => true,
	    'name' => 'assigned_user_name',
	  ),
	),
);
