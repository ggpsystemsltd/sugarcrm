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




global $current_user;

$dashletData['MyTasksDashlet']['searchFields'] = array('name'           => array('default' => ''),
													   'priority'       => array('default' => ''),
                                                       'status'         => array('default' => array('Not Started', 'In Progress', 'Pending Input')),
                                                       'date_entered'   => array('default' => ''),
                                                       'date_start'       => array('default' => ''),                                                          
                                                       'date_due'       => array('default' => ''),
                                                       'team_id'          => array('default' => '', 'label' => 'LBL_TEAMS'),
                                                       'assigned_user_id' => array('type'    => 'assigned_user_name',
																				   'label'   => 'LBL_ASSIGNED_TO', 
                                                                                   'default' => $current_user->name));
$dashletData['MyTasksDashlet']['columns'] = array('set_complete' => array('width'    => '1', 
                                                                          'label'    => 'LBL_LIST_CLOSE',
                                                                          'default'  => true,
                                                                          'sortable' => false),
                                                   'name' => array('width'   => '40', 
                                                                   'label'   => 'LBL_SUBJECT',
                                                                   'link'    => true,
                                                                   'default' => true),
                                                  'parent_name' => array('width' => '30', 
                                                                         'label' => 'LBL_LIST_RELATED_TO',
                                                                         'sortable' => false,
                                                                         'dynamic_module' => 'PARENT_TYPE',
                                                                         'link' => true,
                                                                         'id' => 'PARENT_ID',
                                                                         'ACLTag' => 'PARENT',
                                                                         'related_fields' => array('parent_id', 'parent_type'),
																		 'default' => true,
																		),
                                                   'priority' => array('width'   => '10',
                                                                       'label'   => 'LBL_PRIORITY',
                                                                       'default' => true),
													'status' => array('width'   => '8', 
                                                                     'label'   => 'LBL_STATUS',
																	 'default' => true),                                                               
                                                   'date_start' => array('width'   => '15', 
                                                                         'label'   => 'LBL_START_DATE',
                                                                         'default' => true),                                                                                                       
                                                   'time_start' => array('width'   => '15', 
                                                                         'label'   => 'LBL_START_TIME',
                                                                         'default' => false),
                                                   'date_due' => array('width'   => '15', 
                                                                       'label'   => 'LBL_DUE_DATE',
                                                                       'default' => true),                               
                                                                     
                                                   'date_entered' => array('width'   => '15', 
                                                                           'label'   => 'LBL_DATE_ENTERED'),
                                                   'date_modified' => array('width'   => '15', 
                                                                           'label'   => 'LBL_DATE_MODIFIED'),    
                                                   'created_by' => array('width'   => '8', 
                                                                         'label'   => $GLOBALS['app_strings']['LBL_CREATED'],
                                                                         'sortable' => false),
                                                   'assigned_user_name' => array('width'   => '8', 
                                                                                 'label'   => 'LBL_LIST_ASSIGNED_USER'),
                                                   'contact_name' => array('width'   => '8', 
                                                                           'label'   => 'LBL_LIST_CONTACT',
																		    'link' =>  true,
																		    'id' => 'CONTACT_ID',//bug # 38712 it gave error on clicking on contacts from
        																    'module' => 'Contacts',//my open tasks dashlet because some of the parameters were not set
        																    'ACLTag' => 'CONTACT',// like id, link etc.
        																    'related_fields' => array('contact_id')),
                                                   'team_name' => array('width'   => '15', 
                                                                        'label'   => 'LBL_LIST_TEAM', 
                                                                        'sortable' => false),
                                                                         );


?>
