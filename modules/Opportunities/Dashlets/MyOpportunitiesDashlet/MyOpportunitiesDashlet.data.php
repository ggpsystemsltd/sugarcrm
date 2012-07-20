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

$dashletData['MyOpportunitiesDashlet']['searchFields'] = array('date_entered'     => array('default' => ''),
                                                               'opportunity_type' => array('default' => ''),
                                                               'team_id'          => array('default' => '', 'label'=>'LBL_TEAMS'),
                                                               'sales_stage'      => array('default' => 
                                                                    array('Prospecting', 'Qualification', 'Needs Analysis', 'Value Proposition', 'Id. Decision Makers', 'Perception Analysis', 'Proposal/Price Quote', 'Negotiation/Review')),
                                                               'assigned_user_id' => array('type'    => 'assigned_user_name',
                                                                     					   'label'   => 'LBL_ASSIGNED_TO', 
                                                                                           'default' => $current_user->name));
                                                                                           
$dashletData['MyOpportunitiesDashlet']['columns'] = array('name' => array('width'   => '35', 
                                                                          'label'   => 'LBL_OPPORTUNITY_NAME',
                                                                          'link'    => true,
                                                                          'default' => true 
                                                                          ), 
                                                          'account_name' => array('width'  => '35', 
                                                                                  'label'   => 'LBL_ACCOUNT_NAME',
                                                                                  'default' => true,
                                                                                  'link' => false,
                                                                                  'id' => 'account_id',
                                                                                  'ACLTag' => 'ACCOUNT'),
                                                          'amount_usdollar' => array('width'   => '15', 
                                                                            'label'   => 'LBL_AMOUNT_USDOLLAR',
                                                                            'default' => true,
                                                                            'currency_format' => true),
                                                          'date_closed' => array('width'   => '15', 
                                                                                 'label'   => 'LBL_DATE_CLOSED',
                                                                                 'default'        => true,
                                                                                 'defaultOrderColumn' => array('sortOrder' => 'ASC')),  
                                                          'opportunity_type' => array('width'   => '15', 
                                                                                      'label'   => 'LBL_TYPE'),
                                                          'lead_source' => array('width'   => '15', 
                                                                                 'label'   => 'LBL_LEAD_SOURCE'),
                                                          'sales_stage' => array('width'   => '15', 
                                                                                 'label'   => 'LBL_SALES_STAGE'),
                                                          'probability' => array('width'   => '15', 
                                                                                  'label'   => 'LBL_PROBABILITY'),
                                                          'date_entered' => array('width'   => '15', 
                                                                                  'label'   => 'LBL_DATE_ENTERED'),
                                                          'date_modified' => array('width'   => '15', 
                                                                                   'label'   => 'LBL_DATE_MODIFIED'),    
                                                          'created_by' => array('width'   => '8', 
                                                                                'label'   => 'LBL_CREATED'),
                                                          'assigned_user_name' => array('width'   => '8', 
                                                                                        'label'   => 'LBL_LIST_ASSIGNED_USER'),
														  'next_step' => array('width' => '10', 
														        'label' => 'LBL_NEXT_STEP'),                                                                         
                                                          'team_name' => array('width'   => '15', 
                                                                               'label'   => 'LBL_LIST_TEAM'),
                                                           );
?>
