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

$dashletData['MyAccountsDashlet']['searchFields'] = array('date_entered'     => array('default' => ''),
                                                          'account_type'    => array('default' => ''),
 														  'industry'    => array('default' => ''),
														  'billing_address_country' => array('default'=>''),
                                                          'team_id'          => array('default' => '', 'label'=>'LBL_TEAMS'),
                                                          'assigned_user_id' => array('type'    => 'assigned_user_name', 
                                                                                      'default' => $current_user->name,
																					  'label' => 'LBL_ASSIGNED_TO'));
$dashletData['MyAccountsDashlet']['columns'] =  array('name' => array('width'   => '40', 
                                                                      'label'   => 'LBL_LIST_ACCOUNT_NAME',
                                                                      'link'    => true,
                                                                      'default' => true),
                                                      'website' => array('width' => '8',
                                                                         'label' => 'LBL_WEBSITE',
																		 'default' => true), 
                                                      'phone_office' => array('width'   => '15', 
                                                                              'label'   => 'LBL_LIST_PHONE',
                                                                              'default' => true),
                                                      'phone_fax' => array('width' => '8',
                                                                          'label' => 'LBL_PHONE_FAX'),
                                                      'phone_alternate' => array('width' => '8',
                                                                                 'label' => 'LBL_OTHER_PHONE'),
                                                      'billing_address_city' => array('width' => '8',
                                                                                      'label' => 'LBL_BILLING_ADDRESS_CITY'),
                                                      'billing_address_street' => array('width' => '8',
                                                                                        'label' => 'LBL_BILLING_ADDRESS_STREET'),
                                                      'billing_address_state' => array('width' => '8',
                                                                                       'label' => 'LBL_BILLING_ADDRESS_STATE'),
                                                      'billing_address_postalcode' => array('width' => '8',
                                                                                            'label' => 'LBL_BILLING_ADDRESS_POSTALCODE'),
                                                      'billing_address_country' => array('width' => '8',
                                                                                         'label' => 'LBL_BILLING_ADDRESS_COUNTRY',
																					     'default' => true),
                                                      'shipping_address_city' => array('width' => '8',
                                                                                       'label' => 'LBL_SHIPPING_ADDRESS_CITY'),
                                                      'shipping_address_street' => array('width' => '8',
                                                                                        'label' => 'LBL_SHIPPING_ADDRESS_STREET'),
                                                      'shipping_address_state' => array('width' => '8',
                                                                                        'label' => 'LBL_SHIPPING_ADDRESS_STATE'),
                                                      'shipping_address_postalcode' => array('width' => '8',
                                                                                             'label' => 'LBL_SHIPPING_ADDRESS_POSTALCODE'),
                                                      'shipping_address_country' => array('width' => '8',
                                                                                          'label' => 'LBL_SHIPPING_ADDRESS_COUNTRY'),
                                                      'email1' => array('width' => '8',
                                                                        'label' => 'LBL_EMAIL_ADDRESS_PRIMARY'),
                                                      'parent_name' => array('width'    => '15',
                                                                              'label'    => 'LBL_MEMBER_OF',
                                                                              'sortable' => false),
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
                                               );
?>
