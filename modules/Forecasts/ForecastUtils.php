<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');
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


require_once ('modules/Forecasts/Common.php');

require_once ('modules/Forecasts/ForecastDirectReports.php');

require_once ('include/JSON.php');
global $theme, $mod_strings;


global $href_string;
$href_string = "javascript:node_click('activetimeperiods','activetimeperiodsworksheet','div','get_worksheet')";
//language strings:
$mod_strings = return_module_language($current_language, 'Forecasts');
$GLOBALS['displayListView'] = true;
function get_worksheet_defintion($user_id, $forecast_type, $timeperiod_id, $allow_commit = false) {
		//global variable references.
	global $current_user;
	global $current_language;
	global $app_strings;
	global $even_bg, $odd_bg;
    global $mod_strings;
    

    $sel_user = new User();
    $sel_user->retrieve($user_id);

	$json = new JSON(JSON_LOOSE_TYPE);

	//make list view happy.
	$_REQUEST['module'] = 'Forecasts';
	$_REQUEST['action'] = 'Index';


	//initialize hierarchy helper function.
	$hhelper = new Common();
	$hhelper->set_current_user($user_id);
	$hhelper->setup();

	$seedForecastOpportunities = new ForecastOpportunities();
	if (strtolower($forecast_type) == 'direct') {

		require_once ('include/ListView/ListViewXTPL.php');
		require_once ('include/ListView/ListViewSmarty.php');
		$lv = new ListViewSmarty();
        $lv->lvd->additionalDetailsAjax=false;
		$lv->showMassupdateFields = false;
		$where = "opportunities.deleted=0 ";
		$where .= " AND opportunities.assigned_user_id = '$user_id'";
		$where .= " AND opportunities.date_closed >= timeperiods.start_date";
		$where .= " AND opportunities.date_closed <= timeperiods.end_date";
        $where .= " AND opportunities.sales_stage != 'Closed Lost'";
		$where .= " AND timeperiods.id = '$timeperiod_id'";

		$hhelper->get_timeperiod_start_end_date($timeperiod_id);
		$seedForecastOpportunities->current_user_id = $user_id;
		$seedForecastOpportunities->current_timeperiod_id = $timeperiod_id;

		//set forecast owner details.
		$seedForecastOpportunities->fo_user_id = $current_user->id;
		$seedForecastOpportunities->fo_timeperiod_id = $timeperiod_id;
		//use the current users' forecsat type is allow commit is set.
		//this allows for seprate worksheets for same user on one page.
		if ($allow_commit) {
			$seedForecastOpportunities->fo_forecast_type = $forecast_type;
		} else {
			$seedForecastOpportunities->fo_forecast_type = 'Rollup';
		}

		$opp_summary = $seedForecastOpportunities->get_opportunity_summary();

		//build the summary information. do not show it if the logged in current view user is not the logged in
		//user.
		$directsummary = "";
		if ($allow_commit && $user_id == $current_user->id && ACLController :: checkAccess('Forecasts', 'edit', true)) {
			$lv->ss->assign("commit_allowed", 'true');
		}

        $lv->ss->assign("CURRENCY_SYMBOL", $seedForecastOpportunities->currency->symbol);

        $prev_commit = $seedForecastOpportunities->get_last_committed_direct_forecast();
        $lv->ss->assign("PREV_COMMIT_DATE", $prev_commit['DATE_ENTERED']);
        $lv->ss->assign("PREV_BEST_CASE", $prev_commit['BEST_CASE']);
        $lv->ss->assign("PREV_LIKELY_CASE", $prev_commit['LIKELY_CASE']);
        $lv->ss->assign("PREV_WORST_CASE", $prev_commit['WORST_CASE']);

		$totals = array ('NAME' => translate('LBL_TOTAL_VALUE', 'Forecasts'), 'REVENUE' => $opp_summary['TOTAL_AMOUNT'], 'PROBABILITY' => '&nbsp;', 'WEIGHTED_VALUE' => $opp_summary['WEIGHTEDVALUE'], 'WK_BEST_CASE' => $opp_summary['TOTAL_WK_BEST_CASE'], 'WK_LIKELY_CASE' => $opp_summary['TOTAL_WK_LIKELY_CASE'], 'WK_WORST_CASE' => $opp_summary['TOTAL_WK_WORST_CASE'],);
		$lv->ss->assign("totals", $totals);
        $lv->ss->assign("COPY_LINK",buildExportLink('direct'));
		$lv->ss->assign("USER_ID", $current_user->id);
		$lv->ss->assign("TIMEPERIOD_ID", $timeperiod_id);
		if ($allow_commit) {
			$lv->ss->assign("FORECASTTYPE", $forecast_type); //top level forecast type.
		} else {
			$lv->ss->assign("FORECASTTYPE", 'Rollup'); //top level forecast type.
		}

		//set current users forecast  details into the form.
		$lv->ss->assign("SEL_USER_ID", $user_id);
		$lv->ss->assign("SEL_TIMEPERIOD_ID", $timeperiod_id);
		$lv->ss->assign("SEL_FORECASTTYPE", $forecast_type);

        //assign opp count and total weighted amount.
        $lv->ss->assign("CURRENTOPPORTUNITYCOUNT", $opp_summary['OPPORTUNITYCOUNT']);
        $lv->ss->assign("CURRENTWEIGHTEDVALUENUMBER", $opp_summary['WEIGHTEDVALUENUMBER']);
        //assign the qota amount.
        $lv->ss->assign("QUOTA_VALUE", $seedForecastOpportunities->get_quota());
        global $listViewDefs;
		include ('modules/Forecasts/metadata/OpportunityForecastlistviewdefs.php');
		$lv->displayColumns = $listViewDefs['ForecastOpportunities'];

		//disable some features.
		$lv->multiSelect = false;
		$lv->export = false;
		$lv->delete = false;
		$lv->select = false;
		$lv->show_mass_update_form = false;
		$lv->setup($seedForecastOpportunities, 'modules/Forecasts/ListViewForecast.tpl', $where);
	} else {
		//create where clause....
        if (user_owns_opps($user_id,null)) {
            $where = " users.deleted=0 ";
            $where .= " AND (users.id = '$user_id'";
            $where .= " or users.reports_to_id = '$user_id')";
        }else  {
    		$where = " users.deleted=0 ";
		    $where .= " AND users.reports_to_id = '$user_id'";
        }

		$hhelper->get_timeperiod_start_end_date($timeperiod_id);

		//Get the forecasts created by the direct reports.
		$DirReportsFocus = new ForecastDirectReports();
		$DirReportsFocus->current_user_id = $user_id;
		$DirReportsFocus->current_timeperiod_id = $timeperiod_id;
		//list totals.
		$DirReportsFocus->compute_rollup_totals('', $where);
		//create totals array for all field in the list view.
		///user_name, opportunities, weighted amount, committed amount, Date committed, Adjusted amount
		$totals = array ('USER_NAME' => $mod_strings['LBL_TOTAL_VALUE'], 'BEST_CASE' => $DirReportsFocus->total_best_case_number, 'LIKELY_CASE' => $DirReportsFocus->total_likely_case_number, 'WORST_CASE' => $DirReportsFocus->total_worst_case_number, 'DATE_COMMITTED' => '&nbsp;', 'WK_BEST_CASE' => $DirReportsFocus->total_wk_best_case_number, 'WK_LIKELY_CASE' => $DirReportsFocus->total_wk_likely_case_number, 'WK_WORST_CASE' => $DirReportsFocus->total_wk_worst_case_number,);
		//build list view contents.
		if (ACLController :: checkAccess('Forecasts', 'list', true)) {
			require_once ('include/ListView/ListViewXTPL.php');
			require_once ('include/ListView/ListViewSmarty.php');
			$lv = new ListViewSmarty();
            $lv->lvd->additionalDetailsAjax=false;
            global $listViewDefs;
			include ('modules/Forecasts/metadata/listviewdefs.php');
			$lv->displayColumns = $listViewDefs['ForecastDirectReports'];
			//disable some features.
			$lv->multiSelect = false;
			$lv->delete = false;
			$lv->select = false;
			$lv->export = false;
			$lv->show_mass_update_form = false;

			$lv->setup($DirReportsFocus, 'modules/Forecasts/ListViewForecast.tpl', $where);

			//assign logged in user's forecast details.
			//this is for user who owns the forecast.
			$lv->ss->assign("USER_ID", $current_user->id);
			$lv->ss->assign("TIMEPERIOD_ID", $timeperiod_id);
			$lv->ss->assign("FORECASTTYPE", 'Rollup'); //top level forecast type.

			//set current users forecast  details into the form.
			$lv->ss->assign("SEL_USER_ID", $user_id);
			$lv->ss->assign("SEL_TIMEPERIOD_ID", $timeperiod_id);
			$lv->ss->assign("SEL_FORECASTTYPE", $forecast_type);

			//commit allowed for this user.
			if ($allow_commit && $user_id == $current_user->id && ACLController :: checkAccess('Forecasts', 'edit', true)) {
				$lv->ss->assign("commit_allowed", 'true');
                $lv->ss->assign("COPY_LINK",buildExportLink('rollup'));
			}
            $prev_commit = $DirReportsFocus->get_last_committed_forecast();
            $lv->ss->assign("PREV_COMMIT_DATE", $prev_commit['DATE_ENTERED']);
            $lv->ss->assign("PREV_BEST_CASE", $prev_commit['BEST_CASE']);
            $lv->ss->assign("PREV_LIKELY_CASE", $prev_commit['LIKELY_CASE']);
            $lv->ss->assign("PREV_WORST_CASE", $prev_commit['WORST_CASE']);

			$lv->ss->assign("totals", $totals);
		}

        $lv->ss->assign("CURRENCY_SYMBOL", $DirReportsFocus->currency->symbol);

        $lv->ss->assign("CURRENTOPPORTUNITYCOUNT", $DirReportsFocus->total_opp_count);
        $lv->ss->assign("CURRENTWEIGHTEDVALUENUMBER", $DirReportsFocus->total_weigh_value_number);


        //assign the qota amount.
        $lv->ss->assign("QUOTA_VALUE", $DirReportsFocus->get_quota());

	}

	//process page urls.
	if (isset ($lv->data['pageData']['urls']['endPage'])) {
		$lv->ss->assign("endPageJSON", processnavigation($lv->data['pageData']['urls']['endPage'], $json));
        $lv->data['pageData']['urls']['endPage'] = 'javascript:goToNav(3)';
	}
	if (isset ($lv->data['pageData']['urls']['startPage'])) {
		$lv->ss->assign("startPageJSON", processnavigation($lv->data['pageData']['urls']['startPage'], $json));
        $lv->data['pageData']['urls']['startPage'] = 'javascript:goToNav(0)';
	}
	if (isset ($lv->data['pageData']['urls']['nextPage'])) {
		$lv->ss->assign("nextPageJSON", processnavigation($lv->data['pageData']['urls']['nextPage'], $json));
        $lv->data['pageData']['urls']['nextPage'] = 'javascript:goToNav(2)';
	}
	if (isset ($lv->data['pageData']['urls']['prevPage'])) {
		$lv->ss->assign("prevPageJSON", processnavigation($lv->data['pageData']['urls']['prevPage'], $json));
        $lv->data['pageData']['urls']['prevPage'] = 'javascript:goToNav(1)';
	}

	//process display columns
	$orderby_array = processnavigation($lv->data['pageData']['urls']['orderBy']);
	//{$pageData.urls.orderBy}{$params.orderBy|default:$colHeader|lower}'
	foreach ($lv->displayColumns as $key => $values) {
		if (!empty ($values['orderBy'])) {
			$orderby_array[$lv->lvd->var_order_by] = strtolower($values['orderBy']);
		} else {
			if (!empty($values['tablename'])) {
			 $orderby_array[$lv->lvd->var_order_by]=$values['tablename'] . '.' . strtolower($key);
			} else {
    			$orderby_array[$lv->lvd->var_order_by] = strtolower($key);
            }
		}
		$lv->displayColumns[$key]['order_by_object'] = $json->encode($orderby_array);

	}
	$lv->ss->assign('displayColumns', $lv->displayColumns);

	//assign label values to the template.
	$lv->ss->assign("LBL_DV_LAST_COMMIT_DATE", $mod_strings['LBL_DV_LAST_COMMIT_DATE']);
	$lv->ss->assign("LBL_DV_LAST_COMMIT_AMOUNT", $mod_strings['LBL_DV_LAST_COMMIT_AMOUNT']);
	$lv->ss->assign("LBL_COMMIT_NOTE", $mod_strings['LBL_COMMIT_NOTE']);
	$lv->ss->assign("LBL_QC_COMMIT_BUTTON", $mod_strings['LBL_QC_COMMIT_BUTTON']);
	$lv->ss->assign("LBL_SAVE_WOKSHEET", $mod_strings['LBL_SAVE_WOKSHEET']);
	$lv->ss->assign("LBL_RESET_WOKSHEET", $mod_strings['LBL_RESET_WOKSHEET']);
	$lv->ss->assign("LBL_RESET_CHECK", $mod_strings['LBL_RESET_CHECK']);

	$lv->ss->assign("LBL_BEST_CASE", $mod_strings['LBL_BEST_CASE']);
	$lv->ss->assign("LBL_LIKELY_CASE", $mod_strings['LBL_LIKELY_CASE']);
	$lv->ss->assign("LBL_WORST_CASE", $mod_strings['LBL_WORST_CASE']);
	$lv->ss->assign("ERR_FORECAST_AMOUNT", $mod_strings['ERR_FORECAST_AMOUNT']);
	$lv->ss->assign("LBL_COMMIT_MESSAGE", $mod_strings['LBL_COMMIT_MESSAGE']);
    $lv->ss->assign("LBL_SHOW_CHART", $mod_strings['LBL_SHOW_CHART']);
    $lv->ss->assign("LBL_FORECAST_FOR", $mod_strings['LBL_FORECAST_FOR']);

    //
    $seps = get_number_seperators();
    $lv->ss->assign("NUM_GRP_SEP", $seps[0]);
    $lv->ss->assign("DEC_SEP", $seps[1]);

    $forecast_for=$sel_user->name . " ";
    if (strtolower($forecast_type) == 'direct') {
        $forecast_for.=$mod_strings['LBL_FMT_DIRECT_FORECAST'];
    } else {
        $forecast_for.=$mod_strings['LBL_FMT_ROLLUP_FORECAST'];
    }
    $lv->ss->assign("USER_FORECAST_TYPE", $forecast_for);
    $lv->ss->assign("LBL_TP_QUOTA", $mod_strings['LBL_TP_QUOTA']);

	$contents = $lv->display(false);
    echo $contents;
}

/**
 * @param Object user: object of type Forecasts/Common representing the user downline nodes will be created for.
 * @param object parent_node: object of type Node, codes created in this function will have this parent.
 * @version since 4.5
 * */
function add_downline($user, & $parent_node) {
	$ret = array ();
	$node = null;
	if (count($user->my_direct_reports) > 0) {
		//add node for manager's direct forecasts. NOT if the user preference for opportunity ownership is set to false.
		if (user_owns_opps($user->current_user, null)) {
			$node = create_node($user->current_user, true, false, true);
			if (!empty ($parent_node)) {
				$parent_node->add_node($node);
			}
			$ret[] = $node;
		}

		foreach ($user->my_direct_reports as $id => $name) {
			$node = create_node($id);
			if (!empty ($parent_node)) {
				$parent_node->add_node($node);
			}
			$ret[] = $node;
		}
	}
	return $ret;
}
/** create a new node for the tree widget
 * @param string user_id, primary key value of a valid sugar user.
 * @param string href script for the node.
 * @param boolean dynamic: allow dynamic loading of child node, defult is true
 * @param boolean force_direct:  force direct forecast for the node default false.
 * @param boolean top_level: is this the top level node, if yes add forecast type of node label, default false
 * @param boolean commit: commit of forecast is allowed from this node.
 */
function create_node($user_id, $href = true, $dynamic = true, $force_direct = false, $top_level = false, $commit = false) {
	global $href_string;
	global $mod_strings;

	$user = new Common();
	$user->set_current_user($user_id);
	$user->setup();

	$rollup = true;
	$node_name = $user->my_name;
	if ($force_direct or count($user->my_direct_reports) == 0) {
		$rollup = false;
	}
	if ($top_level) {
		if ($rollup)
			$node_name .= ' ' . $mod_strings['LBL_FMT_ROLLUP_FORECAST'];
		else
			$node_name .= ' ' . $mod_strings['LBL_FMT_DIRECT_FORECAST'];
	}
	$node = new Node($user_id, $node_name);
	if ($href)
		$node->set_property("href", $href_string);
	$node->expanded = !$dynamic;
	$node->dynamic_load = $dynamic;

	//if user has downline set the forecast type property.
	if (!$rollup) {
		$node->set_property('forecasttype', 'Direct', true);
		$node->dynamic_load = false;
	} else {
		$node->set_property('forecasttype', 'Rollup', true);
	}
	$node->set_property('commit', $commit, true);
	return $node;
}

/**used by save_worksheet method.
 *
 */
function upsert_worksheet_record($owner_id, $timeperiod_id, $forecast_type, $wk_related_id, $related_forecast_type, $best_case, $likely_case, $worst_case,$convert_to_basecurrency=true) {

    global $current_user;

    if ($convert_to_basecurrency) {
        
        $currency = new Currency();
        if (isset($current_user)) {
           $currency->retrieve($current_user->getPreference('currency'));
        }else{
           $currency->retrieve('-99');
        }
        $best_case = $currency->convertToDollar($best_case);
        $likely_case = $currency->convertToDollar($likely_case);
        $worst_case = $currency->convertToDollar($worst_case);
    }

	$query = "select id from worksheet where user_id='$owner_id' and timeperiod_id='$timeperiod_id' and forecast_type='$forecast_type' and related_id='$wk_related_id' ";
	if (!empty ($related_forecast_type)) {
		$query .= " and related_forecast_type='$related_forecast_type' ";
	}
	//	_pp($query);
	$resource = $GLOBALS['db']->query($query);
	$row = $GLOBALS['db']->fetchByAssoc($resource);
	if (empty ($row)) {
		//_pp('inserting');
		$wk = new Worksheet();

		$wk->user_id = $owner_id;
		$wk->timeperiod_id = $timeperiod_id;
		$wk->forecast_type = $forecast_type;
		$wk->related_id = $wk_related_id;
		$wk->related_forecast_type = $related_forecast_type;
		$wk->best_case = $best_case;
		$wk->worst_case = $worst_case;
		$wk->likely_case = $likely_case;

		$ret_id = $wk->save();
	} else {
		//		_pp('updating');
        $date_modified = TimeDate::getInstance()->nowDb();
		$query = "update worksheet set likely_case=$likely_case, best_case=$best_case, worst_case=$worst_case, modified_user_id='{$current_user->id}', date_modified='{$date_modified}' where id='{$row['id']}'";
        $resource = $GLOBALS['db']->query($query);
	}

}

function processnavigation($url_string, $json = null) {
	$ret = array ();
	$url_array = explode('?', $url_string);
	$url_nv_pairs = explode('&', $url_array[1]);
	foreach ($url_nv_pairs as $nv_name) {
		$nv_array = explode('=', $nv_name);
		$ret_array[$nv_array[0]] = $nv_array[1];
	}
	if (empty ($json)) {
		return $ret_array;
	} else {
		return $json->encode($ret_array);
	}
}
/* returns true if the passed user can own opportunities, this function should only be used for users
 * who are managers.
 */
function user_owns_opps($user_id = null, $user = null) {
	if (empty ($user)) {
		$user = new User();
		$user->retrieve($user_id);
	}
	$pref_no_opps = $user->getPreference('no_opps', 'global');
	if ($pref_no_opps == 'on') {
		return false;
	} else {
		return true;
	}
}
/**
 * Generate chart for current user's forecast history
 */
function get_chart_for_user($user=null,$user_id=null,$forecast_type='Direct') {

    if (empty($user)) {
        $user = new User();
        $user->retrieve($user_id);
    }
    require_once('modules/Forecasts/Charts.php');
    $chart= new forecast_charts();
    return $chart->forecast_history($user,TimeDate::getInstance()->nowDb(),$forecast_type,5);
}
/**
 * Display the export link
 * @return string export link html
 * @param echo Bool set true if you want it echo'd, set false to have contents returned
 */
function buildExportLink($forecast_type) {
    
    global $mod_strings;
    //id='$id'
    //SugarThemeRegistry::current()->getImage("export","border='0' align='absmiddle'", null,null,'.gif',$mod_strings['LBL_COPY'])."&nbsp;
    //$script = "<a onclick=\"return copyvalue_overlib('{$forecast_type}');\" href=\"#\" >".$mod_strings['LBL_COPY']."</a>";
    $script = "<input type=button onclick=\"return copyvalue_overlib('{$forecast_type}');\" class='button' value='".$mod_strings['LBL_COPY']."'>";
    return $script;
}

?>
