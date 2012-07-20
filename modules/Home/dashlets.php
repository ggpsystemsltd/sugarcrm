<?php
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

 * Description:
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc. All Rights
 * Reserved. Contributor(s): ______________________________________..
 *********************************************************************************/
$defaultDashlets = array(
						'MyCallsDashlet'=>'Calls', 
						'MyMeetingsDashlet'=>'Meetings',
						'MyOpportunitiesDashlet'=>'Opportunities',
						'MyAccountsDashlet'=>'Accounts', 
						'MyLeadsDashlet'=>'Leads',
						 );
						 
$defaultSalesChartDashlets = array( translate('DEFAULT_REPORT_TITLE_6', 'Reports') => 'Opportunities',
	                     );    

$defaultSalesDashlets = array('MyPipelineBySalesStageDashlet'=>'Opportunities', 
							  'MyOpportunitiesGaugeDashlet'=>'Opportunities', 
							  'MyOpportunitiesDashlet'=>'Opportunities',
                              'MyClosedOpportunitiesDashlet'=>'Opportunities',		  
						 );   								  
						 
//Split up because of default ordering (35430)						 
$defaultSalesDashlets2 = array('MyForecastingChartDashlet'=>'Forecasts');						 
						 
$defaultMarketingChartDashlets = array( translate('DEFAULT_REPORT_TITLE_18', 'Reports')=>'Leads', // Leads By Lead Source
									  );
									  
$defaultMarketingDashlets = array(  'CampaignROIChartDashlet' => 'Campaigns',
                                    'MyLeadsDashlet'=>'Leads',  
									'TopCampaignsDashlet' => 'Campaigns');
									  
$defaultSupportDashlets = array( 'MyCasesDashlet'=>'Cases',
								 'MyBugsDashlet' =>'Bugs', 
								  );

$defaultSupportChartDashlets = array(   //translate('DEFAULT_REPORT_TITLE_10', 'Reports')=>'Cases', // New Cases By Month
										translate('DEFAULT_REPORT_TITLE_7', 'Reports')=>'Cases', // Open Cases By User By Status
										translate('DEFAULT_REPORT_TITLE_8', 'Reports')=>'Cases', // Open Cases By Month By User
										//translate('DEFAULT_REPORT_TITLE_9', 'Reports')=>'Cases', // Open Cases By Priority By User
									  );								  
								  
$defaultTrackingDashlets = array('TrackerDashlet'=>'Trackers', 
								 'MyModulesUsedChartDashlet'=>'Trackers', 
								 'MyTeamModulesUsedChartDashlet'=>'Trackers',
							    );
							    
$defaultTrackingReportDashlets =  array(translate('DEFAULT_REPORT_TITLE_27', 'Reports')=>'Trackers');


											


if (is_file('custom/modules/Home/dashlets.php')) include_once('custom/modules/Home/dashlets.php');
?>