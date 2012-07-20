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


global $mod_strings;

$popupMeta = array('moduleMain' => 'Opportunity',
						'varName' => 'OPPORTUNITY',
						'orderBy' => 'name',
						'whereClauses' => 
							array('name' => 'opportunities.name', 
									'account_name' => 'accounts.name'),
						'searchInputs' =>
							array('name', 'account_name'),
						'listviewdefs' => array(
											'NAME' => array(
												'width'   => '30',  
												'label'   => 'LBL_LIST_OPPORTUNITY_NAME', 
												'link'    => true,
										        'default' => true),
											'ACCOUNT_NAME' => array(
												'width'   => '20', 
												'label'   => 'LBL_LIST_ACCOUNT_NAME', 
												'id'      => 'ACCOUNT_ID',
										        'module'  => 'Accounts',
										        'default' => true,
										        'sortable'=> true,
										        'ACLTag' => 'ACCOUNT'),
										    'OPPORTUNITY_TYPE' => array(
										        'width' => '15', 
										        'default' => true,
										        'label' => 'LBL_TYPE'),
											'SALES_STAGE' => array(
												'width'   => '10',  
												'label'   => 'LBL_LIST_SALES_STAGE',
										        'default' => true), 
										    'ASSIGNED_USER_NAME' => array(
												'width' => '5', 
												'label' => 'LBL_LIST_ASSIGNED_USER',
										        'default' => true),
											),
						'searchdefs'   => array(
										 	'name', 
											array('name' => 'account_name', 'displayParams' => array('hideButtons'=>'true', 'size'=>30, 'class'=>'sqsEnabled sqsNoAutofill')), 
											'opportunity_type',
											'sales_stage',
											array('name' => 'assigned_user_id', 'type' => 'enum', 'label' => 'LBL_ASSIGNED_TO', 'function' => array('name' => 'get_user_array', 'params' => array(false))),
										  )
						);


?>