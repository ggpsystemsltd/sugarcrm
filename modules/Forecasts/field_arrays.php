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

 * Description:  Contains field arrays that are used for caching
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/
$fields_array['Forecast'] = array ('column_fields' => 
	array('id'
		,'timeperiod_id'
		,'user_id'
		,'forecast_type'
		,'opp_count'
		,'opp_weigh_value'
		,'date_entered'
		,'date_modified'
		,'best_case'
		,'likely_case'
		,'worst_case'
		),
        'list_fields' =>  array('id', 'timeperiod_id', 'user_id', 'cascade_hierarchy', 
								'forecast_start_date', 'status','user_name','cascade_hierarchy_checked',
								'best_case','likely_case','worst_case'),
);
$fields_array['ForecastOpportunities'] = array ('column_fields' => 
	array('id'
		,'name'
		,'probability'
		,'revenue'
		,'weighted_value'
		,'wk_likely_case'
		,'wk_best_case'
		,'wk_worst_case'
		, 'worksheet_id'
		),
        'list_fields' =>  array('id', 'name','revenue','date_entered', 'weighted_value', 
								'account_name','probability','wk_likely_case',
								'wk_best_case','wk_worst_case', 'worksheet_id'),
);
$fields_array['ForecastDirectReports'] = array ('column_fields' => 
	array('id'
		,'name'
		,'probability'
		,'revenue'
		,'weighted_value'
		,'user_id'
		,'commit_value'
		,'forecast_type'
		,'likely_case'
		,'best_case'
		,'worst_case'
		,'wk_likely_case'
		,'wk_best_case'
		,'wk_worst_case'				
		),
        'list_fields' =>  array('id', 'name','revenue','date_entered', 'weighted_value', 
								'account_name','probability','forecast_type','likely_case',
								'best_case','worst_case','wk_likely_case','wk_best_case','wk_worst_case'),
);
$fields_array['Worksheet'] = array ('column_fields' => array(
		'id'
		, 'user_id'
		,'timeperiod_d'
		,'forecast_type' 
		,'related_id'
		,'best_case_value'
		,'likely_value'
		,'worst_case_value'
		,'related_forecast_type'
        ,'date_modified'
        ,'modified_user_id'
		),
        'list_fields' =>  array('id','user_id','timeperiod_d','related_id','forecast_type',
								'best_case','likely_case','worst_case','related_forecast_type','date_modified','modified_user_id'),
);

?>