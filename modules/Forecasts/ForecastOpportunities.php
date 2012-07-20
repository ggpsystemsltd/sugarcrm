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
class ForecastOpportunities extends SugarBean {

    var $id;
    var $name;
    var $revenue;
    var $probability;
    var $account_name;
    var $weighted_value;
    var $current_user_id;
    var $start_date;
    var $end_date;

    var $currency;
    var $currencysymbol;
    var $currency_id;

    var $current_timeperiod_id;

    var $object_name = 'ForecastOpportunities';
    var $module_dir = 'Forecasts';

    var $table_name = 'opportunities';
    var $disable_custom_fields = true;

    var $encodeFields = array();

    // This is used to retrieve related fields from form posts.
    var $additional_column_fields = array();

    var $fo_user_id;
    var $fo_timeperiod_id;
    var $fo_forecast_type;

    var $new_schema = true;

    function ForecastOpportunities() {
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
        return "$this->name";
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
        $this->account_name = $this->get_opportunity_account_name($this->id);

        //get adjustment amount for the opportunity.
    }

    function get_list_view_data(){

        /* amounts here are in base currency we need to convert them to user default
         * currency.
         */

        $temp_array = $this->get_list_view_array();

        $temp_array['ACCOUNT_NAME'] =  $this->account_name;
        if (empty($temp_array['PROBABILITY'])) $temp_array['PROBABILITY']=0;
        if (empty($temp_array['WEIGHTED_VALUE'])) $temp_array['WEIGHTED_VALUE']=0;
        if (empty($temp_array['REVENUE'])) $temp_array['REVENUE']=0;

        //convert amount from base current to user's preferred currency
        $temp_array['WEIGHTED_VALUE']=$this->currency->convertFromDollar( $temp_array['WEIGHTED_VALUE'],0);
        $temp_array['REVENUE']=$this->currency->convertFromDollar( $temp_array['REVENUE'],0);

        if (empty($temp_array['WORKSHEET_ID'])) {
            $temp_array['WK_LIKELY_CASE']=$temp_array['WEIGHTED_VALUE'];
            $temp_array['WK_WORST_CASE']=$temp_array['WEIGHTED_VALUE'];
            $temp_array['WK_BEST_CASE']=$temp_array['WEIGHTED_VALUE'];
        } else {
            $temp_array['WK_LIKELY_CASE']=$this->currency->convertFromDollar($this->likely_case);
            $temp_array['WK_WORST_CASE']=$this->currency->convertFromDollar($this->worst_case);
            $temp_array['WK_BEST_CASE']=$this->currency->convertFromDollar($this->best_case);
        }

        //format numbers and add currency symbols.
        $temp_array['WEIGHTED_VALUE']=$this->currency->symbol. format_number($temp_array['WEIGHTED_VALUE'],0,0);
        $temp_array['REVENUE']=$this->currency->symbol. format_number($temp_array['REVENUE'],0,0);

        return $temp_array;
    }

    function list_view_parse_additional_sections(&$list_form, $xTemplateSection){
        return $list_form;
    }

    function create_export_query($order_by, $where)
    {
        $custom_join = $this->custom_fields->getJOIN();
        //$custom_join='';

        $query = "SELECT ";
        $query .= " opportunities.id, opportunities.name , amount_usdollar as revenue,  ((amount_usdollar * probability)/100) as weighted_value, probability";

        if($custom_join){
            $query .= $custom_join['select'];
        }

        $query .= " FROM opportunities, timeperiods ";

        if($custom_join){
            $query .= $custom_join['join'];
        }

        if($where != "")
            $query .= "where $where ";

        if($order_by != "")
            $query .= " ORDER BY $order_by";
        else
            $query .= " ORDER BY $this->table_name.name";


        return $query;

    }
    function create_new_list_query($order_by, $where,$filter=array(),$params=array(), $show_deleted = 0,$join_type='', $return_array = false,$parentbean){
//        _pp(func_get_args());
        // Workaround due to fix for Bug 14232. date_entered is ambiguous in this case, so we specify it if it is the default sort
        if(strpos($order_by, 'date_entered') !== false){
            $order_by = str_replace('date_entered', 'opportunities.date_entered', $order_by);
        }
        $ret_array=array();
        $ret_array['select'] = "SELECT  opportunities.id, opportunities.name ,opportunities.assigned_user_id opportunity_owner, opportunities.amount_usdollar as revenue,  ((opportunities.amount_usdollar * opportunities.probability)/100) as weighted_value, opportunities.probability,opportunities.description, opportunities.next_step,opportunities.opportunity_type";
        $ret_array['select'] .=" ,worksheet.id worksheet_id, best_case,likely_case,worst_case ";
        $ret_array['from'] = " FROM opportunities  ";
        $ret_array['where']  = " INNER JOIN timeperiods on 1=1 LEFT JOIN worksheet on opportunities.id = worksheet.related_id and worksheet.user_id='{$this->fo_user_id}' and worksheet.timeperiod_id='{$this->fo_timeperiod_id}' and worksheet.forecast_type='{$this->fo_forecast_type}'";
        $ret_array['where'] .= ' WHERE '. $where;
        $ret_array['order_by'] = !empty($order_by) ? ' ORDER BY '. $order_by : ' ORDER BY opportunities.name ';
        return $ret_array;
    }

    //get oppotunity forecast summary
    function get_opportunity_summary($currency_format=true) {

        $abc = array();
        $amount_usdollar = $this->db->convert("amount_usdollar", "IFNULL", array(0));
        $probability = $this->db->convert("probability", "IFNULL", array(0));
        $query1 = "SELECT count(*) as opportunitycount, sum(amount_usdollar) as total_amount,
        	sum((amount_usdollar * probability)/100) as weightedvalue,
        	sum(".$this->db->convert("best_case","IFNULL", array("(($amount_usdollar * $probability)/100)")).") total_best_case,
        	sum(".$this->db->convert("likely_case","IFNULL", array("(($amount_usdollar * $probability)/100)")).") total_likely_case,
        	sum(".$this->db->convert("worst_case","IFNULL", array("(($amount_usdollar * $probability)/100)")).") total_worst_case";

        $query1 .= " FROM timeperiods, opportunities ";
        $query1 .= " LEFT JOIN worksheet on opportunities.id = worksheet.related_id and worksheet.user_id='{$this->fo_user_id}' and worksheet.timeperiod_id='{$this->fo_timeperiod_id}' and worksheet.forecast_type='{$this->fo_forecast_type}'";
        $query1 .= " WHERE date_closed >= timeperiods.start_date";
        $query1 .= " AND date_closed <= timeperiods.end_date";
        $query1 .= " AND assigned_user_id = '$this->current_user_id'";
        $query1 .= " AND opportunities.deleted = 0";
        $query1 .= " AND timeperiods.id = '$this->current_timeperiod_id'";
        $query1 .= " AND opportunities.sales_stage != 'Closed Lost'";
        $result1 = $this->db->query($query1,true,"Error filling in opportunity details: ");
        $row1 = $this->db->fetchByAssoc($result1);
        if ($row1 == null) {
            $abc['OPPORTUNITYCOUNT'] = 0;
            $abc['WEIGHTEDVALUE'] = 0;
            $abc['COMMITVALUE'] = 0;
            $abc['WEIGHTEDVALUENUMBER'] = 0;
            $abc['TIMEPERIOD_ID'] = $this->current_timeperiod_id;
            $abc['USER_ID'] = $this->current_user_id;
            $abc['TOTAL_AMOUNT'] =  0;
            $abc['TOTAL_WK_BEST_CASE']=0;
            $abc['TOTAL_WK_LIKELY_CASE']=0;
            $abc['TOTAL_WK_WORST_CASE']=0;
        } else {
            //make sure that worksheet records were created.

            $abc['OPPORTUNITYCOUNT'] = $row1['opportunitycount'];
            $abc['WEIGHTEDVALUE'] = empty($row1['weightedvalue']) ? 0 : $row1['weightedvalue'] ;
            $abc['WEIGHTEDVALUENUMBER'] = empty($row1['weightedvalue']) ? 0 : $row1['weightedvalue'];
            $abc['TIMEPERIOD_ID'] = $this->current_timeperiod_id;
            $abc['USER_ID'] = $this->current_user_id;
            $abc['TOTAL_AMOUNT'] = (empty($row1['total_amount']) ? 0 : $row1['total_amount']);
            $abc['TOTAL_WK_BEST_CASE']=(empty($row1['total_best_case']) ? 0 : $row1['total_best_case']);
            $abc['TOTAL_WK_LIKELY_CASE']=(empty($row1['total_likely_case'])?0:$row1['total_likely_case']);
            $abc['TOTAL_WK_WORST_CASE']=(empty($row1['total_worst_case']) ? 0 :$row1['total_worst_case'] );
        }
        if ($currency_format) {
            //convert to preferred currency and format for $ and ,
            $abc['WEIGHTEDVALUE'] = $this->currency->convertFromDollar($abc['WEIGHTEDVALUE'],0);
            $abc['TOTAL_AMOUNT'] =  $this->currency->convertFromDollar($abc['TOTAL_AMOUNT'],0);
            $abc['TOTAL_WK_BEST_CASE']= $this->currency->convertFromDollar($abc['TOTAL_WK_BEST_CASE'],0);
            $abc['TOTAL_WK_LIKELY_CASE']= $this->currency->convertFromDollar($abc['TOTAL_WK_LIKELY_CASE'],0);
            $abc['TOTAL_WK_WORST_CASE']= $this->currency->convertFromDollar($abc['TOTAL_WK_WORST_CASE'],0);

            //format currency and number selectively
            $abc['WEIGHTEDVALUE'] = $this->currency->symbol. format_number($abc['WEIGHTEDVALUE'],0,0);
            $abc['TOTAL_AMOUNT'] =  $this->currency->symbol. format_number($abc['TOTAL_AMOUNT'],0,0);
        }

        return $abc;
    }


    //get name of the account associated with the opportunity.
    //since there is a many to many relationhsip first account fetched
    //will be returned, the accounts_opportunities table should at least
    //have an date entered.
    function get_opportunity_account_name ($opportunity_id) {

        $query = "SELECT name from accounts, accounts_opportunities";
        $query .= " WHERE accounts.id  = accounts_opportunities.account_id";
        $query .= " AND  accounts_opportunities.opportunity_id = '$opportunity_id' AND accounts_opportunities.deleted=0";

        $result = $this->db->query($query,true,"Error fetching account for an opportunity:");

        if ($result != null)
        {
            $row = $this->db->fetchByAssoc($result);
            if ($row != null) {
                return $row['name'];
            }
        }

        return "";
    }

    function get_last_committed_direct_forecast() {
        $last_committed="";
        global $timedate;

        $query = "SELECT ";
        $query .= " forecasts.best_case, likely_case, worst_case, forecasts.date_entered ";
        $query .= " FROM forecasts";
        $query .= " WHERE forecasts.timeperiod_id = '$this->current_timeperiod_id'";
        $query .= " AND forecasts.forecast_type = 'Direct'";
        $query .= " AND forecasts.user_id = '$this->current_user_id'";
        $query .= " ORDER BY forecasts.date_entered desc" ;

        $result = $this->db->query($query,true,"Error fetching last committed forecast:");
        if (($row = $this->db->fetchByAssoc($result)) != null) {
            $last_committed["BEST_CASE"]=$this->currency->symbol . format_number($this->currency->convertFromDollar($row["best_case"]),0,0);
            $last_committed["WORST_CASE"]=$this->currency->symbol . format_number($this->currency->convertFromDollar($row["worst_case"]),0,0);
            $last_committed["LIKELY_CASE"]=$this->currency->symbol . format_number($this->currency->convertFromDollar($row["likely_case"]),0,0);
            $last_committed["DATE_ENTERED"]=$timedate->to_display_date_time($this->db->fromConvert($row["date_entered"], 'datetime'));
        } else {
            $last_committed["BEST_CASE"]='';
            $last_committed["WORST_CASE"]='';
            $last_committed["LIKELY_CASE"]='';
            $last_committed["DATE_ENTERED"]='';
        }

        return $last_committed;
    }

    function listviewACLHelper(){
        $array_assign = parent::listviewACLHelper();
        $is_owner = false;
        if(!empty($this->name)){

            if(!empty($this->opportunity_owner)){
                global $current_user;
                $is_owner = $current_user->id == $this->opportunity_owner;
            }
        }
            if( ACLController::checkAccess('Opportunities', 'view', $is_owner)){
                $array_assign['OPPORTUNITY'] = 'a';
            }else{
                $array_assign['OPPORTUNITY'] = 'span';
            }


        return $array_assign;
    }

    /**
     * Returns quota amount given the user id and timeperiod id. Will return the Direct quota value.
     */
    function get_quota() {

        $query="select amount_base_currency from quotas where deleted=0 and user_id='$this->current_user_id' and quota_type='Direct' and timeperiod_id='$this->current_timeperiod_id'";
        $result = $this->db->query($query,true,"Error fetching quota");
        $row=$this->db->fetchByAssoc($result);
        if (!empty($row)) {
            return $this->currency->symbol .  format_number($this->currency->convertFromDollar($row['amount_base_currency'],0),0,0);
        }
        return null;
    }
}
?>
