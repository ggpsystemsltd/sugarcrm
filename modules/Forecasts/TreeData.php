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

require_once('modules/Forecasts/Common.php');
require_once('include/ytree/Node.php');

require_once('modules/Forecasts/ForecastUtils.php');


//create dummy bean so vardefs are loaded during ajax call with new entrypoint
$fcst = new Forecast();

//function returns an array of objects of Node type.
function get_node_data($params,$get_array=false) {
	$_empty=null;
	$ret=array();
	$depth=$params['TREE']['depth'];
	
	$focus = new Common();	
	$focus->set_current_user($params['NODES'][$depth]['id']);
	$focus->setup();
	
	$nodes=add_downline($focus,$_empty);;
	foreach ($nodes as $node) {
		$ret['nodes'][]=$node->get_definition();
	}
	$json = new JSON(JSON_LOOSE_TYPE);
	$str=$json->encode($ret);
	return $str;
}


//this function constructs the worksheet sheet page for the user. 
//input required: user id and forecast type. valid values for forecast_type are direct and rollup.
function get_worksheet($params) {

	$depth=$params['TREE']['depth'];
	
	//parse input for these  
	$user_id=$params['NODES'][$depth]['id'];
	$forecast_type=$params['NODES'][$depth]['forecasttype'];
	$timeperiod_id=$params['TREE']['timeperiod'];
	$commit=false;
	if (isset($params['NODES'][$depth]['commit'])) {
		$commit=$params['NODES'][$depth]['commit'];
	}
	get_worksheet_defintion($user_id, $forecast_type,$timeperiod_id,$commit);
}

function commit_forecast($params) {
	$saveforecast = new Forecast();

	//save forecast.
	foreach ($saveforecast->column_fields as $akey=>$avalue) {
		if (isset($params['REQUEST'][$avalue])) {
			$saveforecast->$avalue = $params['REQUEST'][$avalue];				
		}
	}
    //unformat currency and number.
    $saveforecast->opp_weigh_value=unformat_number($saveforecast->opp_weigh_value);
    $saveforecast->best_case=unformat_number($saveforecast->best_case);
    $saveforecast->worst_case=unformat_number($saveforecast->worst_case);
    $saveforecast->likely_case=unformat_number($saveforecast->likely_case);

    //convert values from preferred currency to base currency.
    global $current_user;
    $currency = new Currency();
    $currency->retrieve($current_user->getPreference('currency'));

    $saveforecast->opp_weigh_value=$currency->convertToDollar($saveforecast->opp_weigh_value);
    $saveforecast->best_case=$currency->convertToDollar($saveforecast->best_case);
    $saveforecast->worst_case=$currency->convertToDollar($saveforecast->worst_case);
    $saveforecast->likely_case=$currency->convertToDollar($saveforecast->likely_case);

    $saveforecast->opp_weigh_value = floor($saveforecast->opp_weigh_value);
    $saveforecast->best_case=floor($saveforecast->best_case);
    $saveforecast->worst_case=floor($saveforecast->worst_case);
    $saveforecast->likely_case=floor($saveforecast->likely_case);
    
	$saveforecast->process_save_dates = false;
	$saveforecast->save();

	//get updated worksheet.
	get_worksheet_defintion($params['REQUEST']['user_id'], $params['REQUEST']['forecast_type'],$params['REQUEST']['timeperiod_id'],true);
}

//save worksheet data for the user.
//works with user who owns the forecast.
//user selected by the owner user.
function save_worksheet($params) {
	$request_params=$params['REQUEST'];
	$owner_id=$request_params['user_id'];
	$timeperiod_id=$request_params['timeperiod_id'];	
	$forecast_type=$request_params['forecast_type'];
	
	//forecast type of records whose adjusted value is being set.
	$wk_related_type='users';
	//filter params.
	$saved_params=array();
	foreach ($request_params as $key=>$value) {
		if (strstr($key,'WK_BEST_CASE_') !== false) {
			$saved_params[substr($key,13)]['wk_best_case']=$value;					
		} else {
			if (strstr($key,'WK_LIKELY_CASE_') !== false) {
				$saved_params[substr($key,15)]['wk_likely_case']=$value;					
			}  else {
				if (strstr($key,'WK_WORST_CASE_') !== false) {
					$saved_params[substr($key,14)]['wk_worst_case']=$value;					
				}  else {								
					if (strstr($key,'FORECAST_TYPE_') !== false) {
						$saved_params[substr($key,14)]['forecast_type']=$value;					
					}
				}
			}
		}
	}

	foreach ($saved_params as $wk_related_id=>$wk_details) {
		//this is true only for opportunity forecasts.
		if (!isset($saved_params[$wk_related_id]['forecast_type'])) {
			$saved_params[$wk_related_id]['forecast_type']='';
			$wk_related_type='opportunities';
		}
		upsert_worksheet_record($owner_id, $timeperiod_id, $forecast_type,
								$wk_related_id,$saved_params[$wk_related_id]['forecast_type'],
								$saved_params[$wk_related_id]['wk_best_case'],
								$saved_params[$wk_related_id]['wk_likely_case'],
								$saved_params[$wk_related_id]['wk_worst_case'],
                                true  //convert values to base currency.
								);
	}

	//update forecasts for user selected user reports too, this will be done up the 
	//reporting hierarchy till we reach the logged in user.
	//once a change has been made the adjusted values in this hiererachy will be based
	//on the commit values. any ad-hoc adjustments made by the committers will be lost.
	
	//if forecast type direct update selected user's rolup forecsat if exists.
	//if firecsast type null , update direct forecast, then update rollup forecast if exists.
	//if rollup forecast exists roll that up else roll up the direct forcast.
	//find manager, create worksheet entry for the selected user. compute new commit value for the manager
	//based on the new adjust value for selected user and all other downl`
	$sel_user_id=$request_params['sel_user_id'];
	$sel_timeperiod_id=$request_params['sel_timeperiod_id'];	
	$sel_forecast_type=$request_params['sel_forecast_type'];
	
	if ($owner_id != $sel_user_id or ($owner_id == $sel_user_id && $sel_forecast_type='Direct')) {

		//we are dealing with opportunities create a forecast entry for user's direct forecast
 	   //except for when selected user is the logged in user and is not a manager.
		if ($wk_related_type=='opportunities') {  
			$sel_user_is_manager=false;
			$query="select id from users where reports_to_id='$sel_user_id' and status='Active'";
			$resource=$GLOBALS['db']->query($query);
			$row=$GLOBALS['db']->fetchByAssoc($resource);
			if (!empty($row)) {
				$sel_user_is_manager=true;
			}
		
			if (!(!$sel_user_is_manager && $owner_id == $sel_user_id)) {
		
				//_pp('direct processing');
				$forecast = new ForecastOpportunities();
				$forecast->current_user_id=$sel_user_id;
				$forecast->current_timeperiod_id=$sel_timeperiod_id;

				$forecast->fo_user_id=$owner_id;
				$forecast->fo_timeperiod_id=$timeperiod_id;
				$forecast->fo_forecast_type=$forecast_type;
						
				$opp_summary=$forecast->get_opportunity_summary(false);  //get amounts is usdollars.

				//save forecast for the user.
				upsert_worksheet_record($owner_id, $timeperiod_id, $forecast_type,$sel_user_id,'Direct'
									,$opp_summary['TOTAL_WK_BEST_CASE']
									,$opp_summary['TOTAL_WK_LIKELY_CASE']
									,$opp_summary['TOTAL_WK_WORST_CASE']	
                                    , false   //no conversion to base currencny.		
									);
			}
			//if selected user is a manager create a worksheet entry for users's  rollup forecast
			//except when the selected user is logged in user.
			if ($owner_id != $sel_user_id) {
				if ($sel_user_is_manager) {
					$forecast = new ForecastDirectReports();
					$forecast->current_user_id=$sel_user_id;
					$forecast->current_timeperiod_id=$sel_timeperiod_id;
	
					$forecast->fo_user_id=$owner_id;
					$forecast->fo_timeperiod_id=$timeperiod_id;
					$forecast->fo_forecast_type=$forecast_type;
				
					$where  = " users.deleted=0 ";
					$where .= " AND (users.id = '$sel_user_id'";	
					$where .= " or users.reports_to_id = '$sel_user_id')";
	
					$forecast->compute_rollup_totals('',$where, false);  //get all amounts in base currency.
	
					upsert_worksheet_record($owner_id, $timeperiod_id, $forecast_type,$sel_user_id,'Rollup'
											,$forecast->total_wk_best_case_number
											,$forecast->total_wk_likely_case_number
											,$forecast->total_wk_worst_case_number	
                                            , false   //no conversion to base currency required.										
											);
				
				}
			}			

		}
		
		if ($sel_user_id != $owner_id) {
			//find all my managers and update their rollup forecast.
			$helper = new Common();
			$helper->set_current_user($sel_user_id);
			$helper->setup();
			if (count($helper->my_managers) > 0) {
				foreach ($helper->my_managers as $manager_id) {
					if ($manager_id == $owner_id){
						break;
					}
						
					$forecast = new ForecastDirectReports();
					$forecast->current_user_id=$manager_id;
					$forecast->current_timeperiod_id=$sel_timeperiod_id;
	
					$forecast->fo_user_id=$owner_id;
					$forecast->fo_timeperiod_id=$timeperiod_id;
					$forecast->fo_forecast_type=$forecast_type;
			
					$where  = " users.deleted=0 ";
					$where .= " AND (users.id = '$manager_id'";	
					$where .= " or users.reports_to_id = '$manager_id')";
	
					$forecast->compute_rollup_totals('',$where,false);
	
					upsert_worksheet_record($owner_id, $timeperiod_id, $forecast_type,$manager_id,'Rollup'
											,$forecast->total_wk_best_case_number
											,$forecast->total_wk_likely_case_number
											,$forecast->total_wk_worst_case_number	
                                            , false   //no conversion to base currency required.                                        
											);										
	
						
				}
			}
		}
	}
    $owner_id=$request_params['sel_user_id'];
    $timeperiod_id=$request_params['sel_timeperiod_id'];    
    $forecast_type=$request_params['sel_forecast_type'];
    
    if ($request_params['forecast_type'] == 'Direct') {
    	get_worksheet_defintion($owner_id, $forecast_type,$timeperiod_id,true);
   	} else {
   		get_worksheet_defintion($owner_id, $forecast_type,$timeperiod_id,false);
   	} 
}

function list_nav($params) {
//	_pp($params);
	$request_params=$params['REQUEST'];
	$owner_id=$request_params['sel_user_id'];
	$timeperiod_id=$request_params['sel_timeperiod_id'];	
	$forecast_type=$request_params['sel_forecast_type'];

	get_worksheet_defintion($owner_id, $forecast_type,$timeperiod_id,true);

}
/**
 * Delete  all worksheet data.
 **/
function reset_worksheet($params) {
	$request_params=$params['REQUEST'];
	$owner_id=$request_params['user_id'];
	$timeperiod_id=$request_params['sel_timeperiod_id'];	
	$forecast_type=$request_params['forecast_type'];
	
	$query="delete from worksheet where user_id='$owner_id' and timeperiod_id='$timeperiod_id' and forecast_type='$forecast_type' ";
	$GLOBALS['db']->query($query);	
	
	get_worksheet_defintion($owner_id, $forecast_type,$timeperiod_id,true);
}

function get_chart($params){
    $timeperiod_id=$params['REQUEST']['sel_timeperiod_id'];
    echo get_chart_for_user(null,$params['REQUEST']['sel_user_id'],$params['REQUEST']['sel_forecast_type']);
}

?>
