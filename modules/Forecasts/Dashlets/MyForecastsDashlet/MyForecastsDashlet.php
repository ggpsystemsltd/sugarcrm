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


require_once('include/Dashlets/Dashlet.php');

require_once('modules/Forecasts/Common.php');
require_once ('modules/Forecasts/ForecastDirectReports.php');





class MyForecastsDashlet extends Dashlet {
    var $id;
    var $current_timeperiod;


    /**
     * Constructor 
     * 
     * @global string current language
     * @param guid $id id for the current dashlet (assigned from Home module)
     * @param array $def options saved for this dashlet
     */
    function MyForecastsDashlet($id, $def) {
        $this->loadLanguage('MyForecastsDashlet', 'modules/Forecasts/Dashlets/'); // load the language strings here

        parent::Dashlet($id); // call parent constructor
        $this->hasScript = true;  // dashlet has javascript attached to it

        $this->$id = $id;

        if(empty($def['title'])) $this->title = $this->dashletStrings['LBL_TITLE'];
        else $this->title = $def['title'];
        
        if(isset($def['autoRefresh'])) $this->autoRefresh = $def['autoRefresh'];
        
        if(!empty($def['timeperiod_id']))  // load default text is none is defined
            $this->current_timeperiod = $def['timeperiod_id'];
    }

    /**
     * Displays the dashlet
     * 
     * @return string html to display dashlet
     */
    function display() 
    {
        $ss = new Sugar_Smarty();
        $ss->assign('id', $this->id);

        if(!ACLController::checkAccess('Forecasts', 'edit', true)){
            ACLController::displayNoAccess(false);
        }
        else
        {
            global $mod_strings;   //array of localizable string associated with this module.
            global $app_strings;   //arary of localizable strings associated with the application.
            global $app_list_strings;
            global $current_user;  //current logged in user, instance of the user object.
            global $odd_bg,$even_bg;
            
            //get current language for the forecasts module and load the module strings for that language
            global $current_language;
            $current_module_strings = return_module_language($current_language, 'Forecasts');
            
            //intialize instance of the class that manages reporting hierarchies.
            $comm = new Common();
            $comm->set_current_user($current_user->id);
            $comm->setup();
            
            //get a list of timeperiods the logged in user needs to submit forecasts for.
            $comm->get_my_timeperiods();
            
            //add the header
            if (count($comm->my_timeperiods) > 0) {
                if (empty($this->current_timeperiod)) {
                    reset($comm->my_timeperiods); //reset the array pointer to the first element.
                    $this->current_timeperiod=key($comm->my_timeperiods);
                }
            
                $select_list='';
                foreach ($comm->my_timeperiods as $key=>$value) {
                    if ($key == $this->current_timeperiod)
                    $select_list .= "<OPTION VALUE='$key' SELECTED>$value </OPTION> ";
                    else
                    $select_list .= "<OPTION VALUE='$key'>$value </OPTION>";
                }
            
                
                $comm->get_timeperiod_start_end_date($this->current_timeperiod);
                
                $ss->assign("FILTER_START", $comm->start_date);
                $ss->assign("FILTER_END", $comm->end_date);
                $ss->assign("select_list", $select_list);
                
                
                $ss->assign("MOD", $current_module_strings);
            
                //Get opportunity forecast
                $Oppforecast = new ForecastOpportunities();
                $Oppforecast->current_user_id = $current_user->id;
                $Oppforecast->current_timeperiod_id= $this->current_timeperiod;
            
                //assign direct opportunity forecast to the template.
                $tps = $Oppforecast->get_opportunity_summary();
                $ss->assign("DATA",$tps);
            
                //get last committed opportunity forecast and associate with the template.
                $lastdirect=$Oppforecast->get_last_committed_direct_forecast();
                $ss->assign("LASTDIRECT",$lastdirect);
                $ss->assign("ODD_BG",$odd_bg);
                $ss->assign("EVEN_BG",$even_bg);
                
                $process_direct = true;
                $process_rollup = true;
            
                //if the logged in user is a manager then show the group/rollup forecast
                if ($comm->is_user_manager()) {
            
                    $DirReportsFocus = new ForecastDirectReports();
                    $DirReportsFocus->current_user_id=$current_user->id;
                    $DirReportsFocus->current_timeperiod_id=$this->current_timeperiod;
            
                    //create where clause....
                    $where_clause  = " users.deleted=0 ";
                    $where_clause .= " AND (users.id = '$current_user->id'";    
                    $where_clause .= " or users.reports_to_id = '$current_user->id')";
            
                    // Now get the forecasts created by the direct reports.
                    $DirReportsFocus->compute_rollup_totals('',$where_clause);
                    $ss->assign("ROLLUPOPPORTUNITYCOUNT",$DirReportsFocus->total_opp_count);
                    $ss->assign("ROLLUPWEIGHTEDVALUENUMBER",$DirReportsFocus->total_weigh_value_number);
                    $ss->assign("ROLLUPWEIGHTEDVALUE",$DirReportsFocus->total_weigh_value_number);
                    
                    $ss->assign("ROLLCOMMITVALUEBEST",$DirReportsFocus->total_best_case_number);
                    $ss->assign("ROLLCOMMITVALUELIKELY",$DirReportsFocus->total_likely_case_number);
                    $ss->assign("ROLLCOMMITVALUEWORST",$DirReportsFocus->total_worst_case_number);
            
                    //get last committed opportunity forecast
                    $lastroll=$DirReportsFocus->get_last_committed_forecast("Rollup");
                    $ss->assign("LASTROLL",$lastroll);
            
                } else {
                    //hide rollup section.
                    $process_rollup = false;
                }
                $ss->assign("PROCESS_ROLLUP", $process_rollup);
                $ss->assign("PROCESS_DIRECT", $process_direct);
            }
        }
        $str = $ss->fetch('modules/Forecasts/Dashlets/MyForecastsDashlet/MyForecastsDashlet.tpl');
//        $additionalTitle = "<select name='timeperiod_filter' language='JavaScript' onchange='Forecast.updateTimeperiod(\"$id\", this.value);'>$select_list</select>  ({$comm->start_date} {$current_module_strings['LBL_QC_HEADER_DELIM']} {$comm->end_date})";
        
     
        return parent::display() . $str; // return parent::display for title and such
    }
    /**
     * Displays the javascript for the dashlet
     * 
     * @return string javascript to use with this dashlet
     */
    function displayScript() {
        $ss = new Sugar_Smarty();
        $ss->assign('saving', $this->dashletStrings['LBL_SAVING']);
        $ss->assign('saved', $this->dashletStrings['LBL_SAVED']);
        $ss->assign('titleLbl', $this->dashletStrings['LBL_CONFIGURE_TITLE']);
        $ss->assign('id', $this->id);
        //get current language for the forecasts module and load the module strings for that language
        global $current_language;
        $current_module_strings = return_module_language($current_language, 'Forecasts');        
        $ss->assign('MOD',$current_module_strings);        
        $str = $ss->fetch('modules/Forecasts/Dashlets/MyForecastsDashlet/MyForecastsDashletScript.tpl');     
        return $str; // return parent::display for title and such
    }
        
    /**
     * Displays the configuration form for the dashlet
     * 
     * @return string html to display form
     */
    function displayOptions() 
    {
        global $app_strings;
        
        $ss = new Sugar_Smarty();
        $this->dashletStrings['LBL_SAVE'] = $app_strings['LBL_SAVE_BUTTON_LABEL'];
        $ss->assign('lang', $this->dashletStrings);
        $ss->assign('id', $this->id);
        $ss->assign('title', $this->title);
        if($this->isAutoRefreshable()) {
       		$ss->assign('isRefreshable', true);
			$ss->assign('autoRefresh', $GLOBALS['app_strings']['LBL_DASHLET_CONFIGURE_AUTOREFRESH']);
			$ss->assign('autoRefreshOptions', $this->getAutoRefreshOptions());
			$ss->assign('autoRefreshSelect', $this->autoRefresh);
		}
       
        $str = $ss->fetch('modules/Forecasts/Dashlets/MyForecastsDashlet/MyForecastsDashletOptions.tpl');  
        return parent::displayOptions() . $str;
    }  

    /**
     * called to filter out $_REQUEST object when the user submits the configure dropdown
     * 
     * @param array $req $_REQUEST
     * @return array filtered options to save
     */  
    function saveOptions($req) 
    {
        $options = array();
        $options['title'] = $req['title'];
        $options['autoRefresh'] = empty($req['autoRefresh']) ? '0' : $req['autoRefresh'];
        
        return $options;
    }

    /**
     * Used to save text on textarea blur. Accessed via Home/CallMethodDashlet.php
     * This is an example of how to to call a custom method via ajax
     */    
    function saveText() {
        if ((isset($_REQUEST['commit_forecast'])) && ($_REQUEST['commit_forecast'] =='1')) {
            $focus = new Forecast();
            $focus->best_case=(isset($_REQUEST['best_case']) ? $_REQUEST['best_case'] : 0);
            $focus->worst_case=(isset($_REQUEST['worst_case']) ? $_REQUEST['worst_case'] : 0);
            $focus->likely_case=(isset($_REQUEST['likely_case']) ? $_REQUEST['likely_case'] : 0);   
            $focus->opp_count=(isset($_REQUEST['opp_count']) ? $_REQUEST['opp_count'] : 0);   
            $focus->opp_weigh_value=(isset($_REQUEST['weight_value']) ? $_REQUEST['weight_value'] : 0);
            $focus->timeperiod_id = (isset($_REQUEST['timeperiod_id']) ? $_REQUEST['timeperiod_id'] : 0);  
            $focus->user_id = (isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : 0);   
           
            if ($_REQUEST['forecast_type'] == "Direct") {
                $focus->forecast_type="Direct";                      
            }
            if ($_REQUEST['forecast_type'] == "Rollup") {
                $focus->forecast_type="Rollup";
            }
            //unformat currency and number.
            $focus->opp_weigh_value=unformat_number($focus->opp_weigh_value);
            $focus->best_case=unformat_number($focus->best_case);
            $focus->worst_case=unformat_number($focus->worst_case);
            $focus->likely_case=unformat_number($focus->likely_case);
        
            //convert values from preferred currency to base currency.
            global $current_user;
            $currency = new Currency();
            $currency->retrieve($current_user->getPreference('currency'));
        
            $focus->opp_weigh_value=$currency->convertToDollar($focus->opp_weigh_value);
            $focus->best_case=$currency->convertToDollar($focus->best_case);
            $focus->worst_case=$currency->convertToDollar($focus->worst_case);
            $focus->likely_case=$currency->convertToDollar($focus->likely_case);
            
           
            $focus->process_save_dates=false;
            $focus->save();

            if(!empty($_REQUEST['timeperiod_id'])) {
                $optionsArray['timeperiod_id'] = $_REQUEST['timeperiod_id'];                
            }
            else
            {
                $optionsArray['timeperiod_id'] = '';
            }
        }
        if ((isset($_REQUEST['update_timeperiod'])) && ($_REQUEST['update_timeperiod'] =='1')) {
            if(!empty($_REQUEST['timeperiod_id'])) {
                $optionsArray = $this->loadOptions();
                $optionsArray['timeperiod_id'] = $_REQUEST['timeperiod_id'];
                $this->storeOptions($optionsArray);
    
            }
            else {
                $optionsArray['timeperiod_id'] = '';
            }            
        }
        $json = getJSONobj();
        echo 'result = ' . $json->encode(array('id' => $_REQUEST['id'], 
                                       'current_timeperiod' => $optionsArray['timeperiod_id']));           
    }
    
}

?>