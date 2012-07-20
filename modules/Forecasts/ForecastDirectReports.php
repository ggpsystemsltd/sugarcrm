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

 * Description: TODO:  To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/





// User is used to store customer information.
class ForecastDirectReports extends SugarBean {

	var $user_id;
	var $reports_to_id;
	var $id;
	var $timeperiod_id;
	var $opp_count;
	var $opp_weigh_value;
	var $opp_commit_value;
	var $user_name;
	var $ref_user_id;
	var $ref_timeperiod_id;
	var $forecast_type;

	var $likely_case;
	var $total_likely_case;
	var $total_likely_case_number;
    var $total_wk_likely_case_number;

    var $best_case;
    var $total_best_case;
    var $total_best_case_number;
    var $total_wk_best_case_number;

    var $worst_case;
    var $total_worst_case;
    var $total_worst_case_number;
    var $total_wk_worst_case_number;


    var $total_opp_count;
    var $total_weigh_value;
    var $total_commit_value;

    var $total_opp_count_number;
    var $total_weigh_value_number;
    var $total_commit_value_number;

    var $current_user_id;
    var $current_timeperiod_id;
    var $currency;
    var $currencysymbol;
    var $currency_id;

    var $object_name = 'ForecastDirectReports';
    var $module_dir = 'Forecasts';
    var $disable_custom_fields = true;

    var $table_name = 'users';

    var $encodeFields = array();

    var $new_schema = true;

    function ForecastDirectReports() {
        global $current_user, $db;

        parent::SugarBean();
        $this->disable_row_level_security =true;


        $this->currency = new Currency();
        if (isset($current_user)) {
            $this->currency->retrieve($current_user->getPreference('currency'));
        }else{
            $this->currency->retrieve('-99');
        }
        $this->currencysymbol= $this->currency->symbol;

    }

    function save($check_notify = false){
        parent::save($check_notify);
    }

    function get_summary_text()
    {
        return "$this->user_name";
    }

    function retrieve($id, $encode=false, $deleted=true){
        $ret = parent::retrieve($id, $encode, $deleted);

        return $ret;
    }

    function is_authenticated()
    {
        return $this->authenticated;
    }

    function fill_in_additional_list_fields() {
        $this->fill_in_additional_detail_fields();
    }

    function fill_in_additional_detail_fields()
    {
        $this->get_forecasts();
    }


    //get forecasts submitted by the user.
    //if the user is a manager then select the rollup forecast.
    //			except for when the current user is the manager.
    //if the user is a sales person select the direct forecasts.
    //select the most recent forcast based on the date committed.
    function get_forecasts() {
        global $timedate;

        $comm1 = new Common();
        $comm1->set_current_user($this->id);
        $comm1->setup();

        //fetch rollup forecast for managers, but if the manager is the current user
        //fetch direct forecast.
        if ($comm1->is_user_manager() && $this->id != $this->current_user_id)
            $type='Rollup';
        else
            $type='Direct';

        $query = $this->create_forecast_query_for_user($this->id,$type,$this->current_user_id,'Rollup');
        $result = $this->db->query($query,true,"Error fetching forecasts:");
        $row = $this->db->fetchByAssoc($result);
        if ($row != null) {
            $this->opp_count=$row['opp_count'];
            $this->opp_best_case=$row['best_case'];
            $this->opp_worst_case=$row['worst_case'];
            $this->opp_likely_case=$row['likely_case'];
            $this->date_entered=$timedate->to_display_date_time($row['date_entered']);
            $this->date_committed=$timedate->to_display_date($row['date_entered']);

            $this->opp_weigh_value=$row['opp_weigh_value'];
            $this->forecast_type=$row['forecast_type'];

            if (empty($row['worksheet_id'])) {
                $this->wk_likely_case=$row['likely_case'];
                $this->wk_best_case=$row['best_case'];
                $this->wk_worst_case=$row['worst_case'];
            } else {
                $this->wk_likely_case=$row['wk_likely_case'];
                $this->wk_best_case=$row['wk_best_case'];
                $this->wk_worst_case=$row['wk_worst_case'];
            }
        } else {
            $this->opp_count=0;
            $this->opp_best_case=0;
            $this->opp_worst_case=0;
            $this->opp_likely_case=0;
            $this->wk_likely_case=0;
            $this->wk_best_case=0;
            $this->wk_worst_case=0;
            $this->date_entered='';
            $this->date_committed='';
            $this->opp_weigh_value=0;
            $this->forecast_type=$type;
        }

        //convert amounts to user's preferred currency.
        $this->opp_best_case=$this->currency->convertFromDollar($this->opp_best_case);
        $this->opp_worst_case=$this->currency->convertFromDollar($this->opp_worst_case);
        $this->opp_likely_case=$this->currency->convertFromDollar($this->opp_likely_case);
        $this->wk_likely_case=$this->currency->convertFromDollar($this->wk_likely_case);
        $this->wk_best_case=$this->currency->convertFromDollar($this->wk_best_case);
        $this->wk_worst_case=$this->currency->convertFromDollar($this->wk_worst_case);

    }

    //query returns the amount committed by the user and any override value specified by the
    //logged in user.
    //select forecasts in descending order. the system shows only the most recent forecast.
    //join with the worksheet table to get the overide created for that  user's commit amount
    function create_forecast_query_for_user($this_user,$type,$cur_user_id, $cur_user_forecast_type) {
    global $current_user;
        $query = "SELECT ";
        $query .= " forecasts.id, forecasts.opp_count, forecasts.opp_weigh_value, forecasts.best_case,forecasts.likely_case,forecasts.worst_case, forecasts.date_entered, '$type' as forecast_type ";
        $query .= " ,worksheet.id worksheet_id ,worksheet.best_case wk_best_case, worksheet.likely_case wk_likely_case, worksheet.worst_case wk_worst_case";
        $query .= " FROM forecasts";

        $query .= " LEFT JOIN worksheet on forecasts.user_id = worksheet.related_id and worksheet.user_id='{$current_user->id}' AND worksheet.forecast_type='$cur_user_forecast_type' AND worksheet.timeperiod_id='$this->current_timeperiod_id' AND related_forecast_type='$type'";

        $query .= " WHERE";

        $query .= "  forecasts.timeperiod_id = '$this->current_timeperiod_id'";
        $query .= " AND forecasts.forecast_type = '$type'";
        $query .= " AND forecasts.user_id = '$this_user'";

        $query .= " ORDER BY forecasts.date_entered desc" ;
        return $query;
    }


    function get_list_view_data(){
        global $locale;
        $forecast_fields = $this->get_list_view_array();

        $forecast_fields['ID'] = $this->id;
        $forecast_fields['OPP_COUNT'] = $this->opp_count;
        $forecast_fields['DATE_ENTERED'] = $this->date_entered;
        $forecast_fields['DATE_COMMITTED'] = $this->date_committed;

        $forecast_fields['OPP_WEIGH_VALUE'] = $this->currency->convertFromDollar($this->opp_weigh_value);

        $forecast_fields['REF_USER_ID'] = $this->current_user_id;
        $forecast_fields['REF_TIMEPERIOD_ID'] = $this->current_timeperiod_id;

        $forecast_fields['FORECAST_TYPE']= $this->forecast_type;

        $forecast_fields['USER_NAME']= $locale->getLocaleFormattedName($forecast_fields['FIRST_NAME'], $forecast_fields['LAST_NAME']);

        $forecast_fields['BEST_CASE'] =  $this->opp_best_case;
        $forecast_fields['WORST_CASE'] = $this->opp_worst_case;
        $forecast_fields['LIKELY_CASE'] = $this->opp_likely_case;

        $forecast_fields['WK_BEST_CASE'] = $this->wk_best_case;
        $forecast_fields['WK_WORST_CASE'] = $this->wk_worst_case;
        $forecast_fields['WK_LIKELY_CASE'] = $this->wk_likely_case;

        //currency conversions and formatting.
        $forecast_fields['OPP_WEIGH_VALUE'] = $this->currency->symbol. format_number( $forecast_fields['OPP_WEIGH_VALUE'],0,0);

        $forecast_fields['BEST_CASE'] = $this->currency->symbol. format_number( $forecast_fields['BEST_CASE'],0,0);
        $forecast_fields['WORST_CASE'] = $this->currency->symbol. format_number( $forecast_fields['WORST_CASE'],0,0);
        $forecast_fields['LIKELY_CASE'] = $this->currency->symbol. format_number( $forecast_fields['LIKELY_CASE'],0,0);

        return $forecast_fields;
    }

    function list_view_parse_additional_sections(&$list_form, $xTemplateSection){
        return $list_form;
    }

    function create_list_query($order_by, $where, $show_deleted = 0)
    {
        //build a list of users that report to this user, including this user
        //forecast details will be filled in later.
        $query = "SELECT id, users.first_name ,users.last_name, users.id as user_id";
        $query .= " FROM users ";


        if(empty($where)){
            $query .= " where users.status = 'Active'";
        }else{
            $query .= " where $where AND users.status = 'Active'";
        }

        if($order_by != "")
            $query .= " ORDER BY $order_by";
        else
            $query .= " ORDER BY users.first_name, users.last_name";

        return $query;

    }
    function create_new_list_query($order_by, $where,$filter=array(),$params=array(), $show_deleted = 0,$join_type='', $return_array = false,$parentbean=null, $singleSelect = false){
//        _pp(func_get_args());
        $ret_array=array();
        $ret_array['select'] = "SELECT id, users.first_name ,users.last_name, users.id as user_id";
        $ret_array['from'] = " FROM users  ";
        $ret_array['where'] = " where $where AND users.status = 'Active'";
        $ret_array['order_by'] = !empty($order_by) ? ' ORDER BY '. $order_by : '  ORDER BY users.last_name';
        if ( $return_array )
            return $ret_array;
        else
            return $ret_array['select'].$ret_array['from'].$ret_array['where'].$ret_array['order_by'];
    }

    //returns a sum of (opportunity count, weighted value and commit value) for the forecats
    //committed by the logged in user's downline. This also inludes the user's direct forecast.
    function compute_rollup_totals($order_by, $where,$currency_format=true) {

        $query = $this->create_new_list_query($order_by, $where);
        $result = $this->db->query($query,true,"Error fetching forecasts:");

        $this->total_opp_count=0;
        $this->total_weigh_value_number =0;
        $this->total_likely_case_number=0;
        $this->total_best_case_number=0;
        $this->total_worst_case_number=0;

        while(($row = $this->db->fetchByAssoc($result)) != null) {

            $comm1 = new Common();
            $comm1->set_current_user($row['user_id']);
            $comm1->setup();
            if ($comm1->is_user_manager() && $row['user_id'] != $this->current_user_id)
                $type='Rollup';
            else
                $type='Direct';


            $fquery = $this->create_forecast_query_for_user($row['user_id'],$type,$this->current_user_id,'Rollup');

            $fresult = $this->db->query($fquery,true,"Error fetching forecasts:");
            $frow = $this->db->fetchByAssoc($fresult);
            if ($frow != null) {
                $this->total_opp_count+=empty($frow['opp_count']) ? 0 : $frow['opp_count'];
                $this->total_weigh_value_number +=empty($frow['opp_weigh_value']) ? 0 : $frow['opp_weigh_value'] ;
                $this->total_likely_case_number +=empty($frow['likely_case']) ? 0 : $frow['likely_case'];
                $this->total_best_case_number +=empty($frow['best_case']) ? 0 : $frow['best_case'];
                $this->total_worst_case_number +=empty($frow['worst_case']) ? 0 : $frow['worst_case'];

                if (empty($frow['worksheet_id'])) {
                    $this->total_wk_likely_case_number +=empty($frow['likely_case'])? 0 :$frow['likely_case'];
                    $this->total_wk_best_case_number +=empty($frow['best_case']) ? 0 : $frow['best_case'];
                    $this->total_wk_worst_case_number +=empty($frow['worst_case'])?0:$frow['worst_case'];
                } else {
                    $this->total_wk_likely_case_number +=empty($frow['wk_likely_case'])?0:$frow['wk_likely_case'];
                    $this->total_wk_best_case_number +=empty($frow['wk_best_case'])?0:$frow['wk_best_case'];
                    $this->total_wk_worst_case_number +=empty($frow['wk_worst_case'])?0:$frow['wk_worst_case'];
                }
            }
        }
        if (empty($this->total_opp_count)) $this->total_opp_count=0;
        if (empty($this->total_commit_value_number)) $this->total_commit_value_number=0;
        if (empty($this->total_weigh_value_number)) $this->total_weigh_value_number=0;
        if (empty($this->total_likely_case_number)) $this->total_likely_case_number=0;
        if (empty($this->total_best_case_number)) $this->total_best_case_number=0;
        if (empty($this->total_worst_case_number)) $this->total_worst_case_number=0;
        if (empty($this->total_wk_likely_case_number)) $this->total_wk_likely_case_number=0;
        if (empty($this->total_wk_best_case_number)) $this->total_wk_best_case_number=0;
        if (empty($this->total_wk_worst_case_number)) $this->total_wk_worst_case_number=0;

        if ($currency_format) {
            //convert amounts to preferred currency
            $this->total_commit_value_number=  $this->currency->convertFromDollar($this->total_commit_value_number);
            $this->total_weigh_value_number=  $this->currency->convertFromDollar($this->total_weigh_value_number);
            $this->total_likely_case_number=  $this->currency->convertFromDollar($this->total_likely_case_number);
            $this->total_best_case_number=  $this->currency->convertFromDollar($this->total_best_case_number);
            $this->total_worst_case_number=  $this->currency->convertFromDollar($this->total_worst_case_number);
            $this->total_wk_likely_case_number=  $this->currency->convertFromDollar($this->total_wk_likely_case_number);
            $this->total_wk_best_case_number=  $this->currency->convertFromDollar($this->total_wk_best_case_number);
            $this->total_wk_worst_case_number=  $this->currency->convertFromDollar($this->total_wk_worst_case_number);

            //format number and currency.
            $this->total_commit_value_number= $this->currency->symbol. format_number($this->total_commit_value_number,0,0);
            $this->total_weigh_value_number= $this->currency->symbol. format_number($this->total_weigh_value_number,0,0);
            $this->total_likely_case_number= $this->currency->symbol. format_number($this->total_likely_case_number,0,0);
            $this->total_best_case_number= $this->currency->symbol. format_number($this->total_best_case_number,0,0);
            $this->total_worst_case_number= $this->currency->symbol. format_number($this->total_worst_case_number,0,0);
        }
    }


    function get_last_committed_forecast($this_forecast_type='Rollup') {

        $last_committed=array();
        global $timedate;

        $query = "SELECT ";
        $query .= " forecasts.best_case,forecasts.worst_case,forecasts.likely_case, forecasts.date_entered";
        $query .= " FROM forecasts";
        $query .= " WHERE forecasts.timeperiod_id = '$this->current_timeperiod_id'";
        $query .= " AND forecasts.forecast_type = '$this_forecast_type'";
        $query .= " AND forecasts.user_id = '$this->current_user_id'";
        $query .= " ORDER BY forecasts.date_entered desc" ;

        $result = $this->db->query($query,true,"Error fetching last committed forecast:");
        if (($row = $this->db->fetchByAssoc($result)) != null) {

            $last_committed["LIKELY_CASE"]=$row['likely_case'];
            $last_committed["BEST_CASE"]=$row['best_case'];
            $last_committed["WORST_CASE"]=$row['worst_case'];
            $last_committed["DATE_ENTERED"]=$timedate->to_display_date_time($row["date_entered"]);

        } else {
            $last_committed["LIKELY_CASE"]='';
            $last_committed["BEST_CASE"]='';
            $last_committed["WORST_CASE"]='';
            $last_committed["DATE_ENTERED"]='';
        }

        $last_committed["LIKELY_CASE"]=$this->currency->symbol. format_number($this->currency->convertFromDollar($last_committed["LIKELY_CASE"]),0,0);
        $last_committed["BEST_CASE"]=$this->currency->symbol. format_number($this->currency->convertFromDollar($last_committed["BEST_CASE"]),0,0);
        $last_committed["WORST_CASE"]=$this->currency->symbol. format_number($this->currency->convertFromDollar($last_committed["WORST_CASE"]),0,0);


        //print_r($last_committed);
        return $last_committed;

    }
    /**
     * Returns quota amount given the user id and timeperiod id. Will return the Direct quota value.
     */
    function get_quota() {

        $query="select amount_base_currency from quotas where deleted=0 and user_id='$this->current_user_id' and quota_type='Rollup' and timeperiod_id='$this->current_timeperiod_id'";
        $result = $this->db->query($query,true,"Error fetching quota");
        $row=$this->db->fetchByAssoc($result);
        if (!empty($row)) {
            return $this->currency->symbol. format_number($this->currency->convertFromDollar($row['amount_base_currency']),0,0);
        }
        return null;
    }

}
?>
