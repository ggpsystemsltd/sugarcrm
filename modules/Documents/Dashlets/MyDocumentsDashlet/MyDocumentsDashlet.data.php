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

$dashletData['MyDocumentsDashlet']['searchFields'] = array('date_entered'    => array('default' => ''),
                                                          'document_name'    => array('default' => ''),
                                                          'category_id'      => array('default' => ''),
 														  'doc_type'  => array('default' => ''),
 														  'status_id'     => array('default' => ''),
 														  'active_date'      => array('default' => ''),
                                                          'team_id'          => array('default' => '', 'label'=>'LBL_TEAMS'),

                                                          'assigned_user_id' => array('type'    => 'assigned_user_name', 
                                                                                      'default' => $current_user->name,
																					  'label' => 'LBL_ASSIGNED_TO'));



$dashletData['MyDocumentsDashlet']['columns'] =  array('document_name' => array('width'   => '40', 
                                                                      'label'   => 'LBL_NAME',
                                                                      'link'    => true,
                                                                      'default' => true),
                                                      'category_id' => array('width' => '8',
                                                                         'label' => 'LBL_CATEGORY',
																		 'default' => true), 
                                                      'subcategory_id' => array('width' => '8',
                                                                         'label' => 'LBL_SUBCATEGORY',
																		 'default' => false),
                                                      'template_type' => array('width' => '8',
                                                                         'label' => 'LBL_TEMPLATE_TYPE',
																		 'default' => true), 
                                                      'is_template' => array('width' => '8',
                                                                         'label' => 'LBL_IS_TEMPLATE',
																		 'default' => false), 
													  'status_id' => array('width' => '8',
                                                                         'label' => 'LBL_STATUS',
																		 'default' => true), 
													  'active_date' => array('width' => '8',
                                                                         'label' => 'LBL_ACTIVE_DATE',
																		 'default' => true),
													  'doc_type' => array('width' => '8',
                                                                         'label' => 'LBL_DOC_TYPE',
																		 'default' => false), 
													  'exp_date' => array('width' => '8',
                                                                         'label' => 'LBL_EXPIRATION_DATE',
																		 'default' => false), 
													  'date_entered' => array('width'   => '15', 
                                                                              'label'   => 'LBL_DATE_ENTERED'),
                                                      'date_modified' => array('width'   => '15', 
                                                                              'label'   => 'LBL_DATE_MODIFIED'),    
                                                      'created_by' => array('width'   => '8', 
                                                                            'label'   => 'LBL_CREATED'),
                                                      'assigned_user_name' => array('width'   => '8', 
                                                                                     'label'   => 'LBL_LIST_ASSIGNED_USER'),
                                                      'team_name' => array('width'   => '15', 
                                                                           'label'   => 'LBL_LIST_TEAM'),
                                                      'FILENAME' => array (
                                                                    'width' => '20%',
                                                                    'label' => 'LBL_FILENAME',
                                                                    'link' => true,
                                                                    'default' => false,
                                                                    'bold' => false,
                                                                    'displayParams' => array ( 'module' => 'Documents', ),
                                                                    'related_fields' =>
                                                                    array (
                                                                        0 => 'document_revision_id',
                                                                        1 => 'doc_id',
                                                                        2 => 'doc_type',
                                                                        3 => 'doc_url',
                                                                    ),
                                                                  ),
                                               );
?>