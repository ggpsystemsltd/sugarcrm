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





require_once('include/Dashlets/DashletGenericChart.php');

class MyPipelineBySalesStageDashlet extends DashletGenericChart
{
    public $mypbss_date_start;
    public $mypbss_date_end;
    public $mypbss_sales_stages = array();
    public $mypbss_chart_type = 'fun';

    protected $_seedName = 'Opportunities';

    /**
     * @see DashletGenericChart::__construct()
     */
    public function __construct(
        $id,
        array $options = null
        )
    {
        global $timedate;

        if(empty($options['mypbss_date_start']))
            $options['mypbss_date_start'] = $timedate->nowDbDate();
        if(empty($options['mypbss_date_end']))
            $options['mypbss_date_end'] = $timedate->asDbDate($timedate->getNow()->modify("+6 months"));
        if(empty($options['title']))
            $options['title'] = translate('LBL_MY_PIPELINE_FORM_TITLE', 'Home');

        parent::__construct($id,$options);
    }

    /**
     * @see DashletGenericChart::displayOptions()
     */
    public function displayOptions()
    {
        global $app_list_strings;

        $selected_datax = array();
        if (count($this->mypbss_sales_stages) > 0)
            foreach ($this->mypbss_sales_stages as $key)
                $selected_datax[] = $key;
        else
            $selected_datax = array_keys($app_list_strings['sales_stage_dom']);

        $this->_searchFields['mypbss_sales_stages']['options'] = $app_list_strings['sales_stage_dom'];
        $this->_searchFields['mypbss_sales_stages']['input_name0'] = $selected_datax;
        $this->_searchFields['mypbss_chart_type']['options'] = $app_list_strings['pipeline_chart_dom'];

        return parent::displayOptions();
    }

    /**
     * @see DashletGenericChart::display()
     */
    public function display()
    {
		global $sugar_config, $current_user;

        require_once('include/SugarCharts/SugarChartFactory.php');
		$sugarChart = SugarChartFactory::getInstance();
		$sugarChart->base_url = array( 	'module' => 'Opportunities',
								'action' => 'index',
								'query' => 'true',
								'searchFormTab' => 'advanced_search',
							 );
        $sugarChart->url_params = array( 'assigned_user_id' => $current_user->id );
        $sugarChart->group_by = $this->constructGroupBy();

        $currency_symbol = $sugar_config['default_currency_symbol'];
		if ($current_user->getPreference('currency')){

            $currency = new Currency();
            $currency->retrieve($current_user->getPreference('currency'));
            $currency_symbol = $currency->symbol;
        }

        $sugarChart->is_currency = true;
        $sugarChart->thousands_symbol = translate('LBL_OPP_THOUSANDS', 'Charts');

        $subtitle = translate('LBL_OPP_SIZE', 'Charts') . " " . $currency_symbol . "1" . translate('LBL_OPP_THOUSANDS', 'Charts');

        $query = $this->constructQuery();
		if ($this->mypbss_chart_type == 'hbar'){
			$dataset = $this->constructCEChartData($this->getChartData($query));
			$sugarChart->setData($dataset);
			$total = format_number($this->getHorizBarTotal($dataset), 0, 0, array('convert'=>true));
			$pipeline_total_string = translate('LBL_TOTAL_PIPELINE', 'Charts') . $sugarChart->currency_symbol . $total . $sugarChart->thousands_symbol;
			$sugarChart->setProperties($pipeline_total_string, $subtitle, 'horizontal bar chart');
		}
		else{
			$sugarChart->setData($this->getChartData($query));
			$total = format_number($sugarChart->getTotal(), 0, 0, array('convert'=>true));
			$pipeline_total_string = translate('LBL_TOTAL_PIPELINE', 'Charts') . $sugarChart->currency_symbol . $total . $sugarChart->thousands_symbol;
			$sugarChart->setProperties($pipeline_total_string, $subtitle, 'funnel chart 3D');
		}

        $xmlFile = $sugarChart->getXMLFileName($this->id);
        $sugarChart->saveXMLFile($xmlFile, $sugarChart->generateXML());

        return $this->getTitle('') .
            '<div align="center">' .$sugarChart->display($this->id, $xmlFile, '100%', '480', false) . '</div><br />'. $this->processAutoRefresh();
    }

	/**
     * awu: Bug 16794 - this function is a hack to get the correct sales stage order
     * until i can clean it up later
     *
     * @param  $query string
     * @return array
     */
    private function getChartData(
        $query
        )
    {
    	global $app_list_strings, $db;

    	$data = array();
    	$temp_data = array();
    	$selected_datax = array();

    	$user_sales_stage = $this->mypbss_sales_stages;
        $tempx = $user_sales_stage;

        //set $datax using selected sales stage keys
        if (count($tempx) > 0) {
            foreach ($tempx as $key) {
                $datax[$key] = $app_list_strings['sales_stage_dom'][$key];
                array_push($selected_datax, $key);
            }
        }
        else {
            $datax = $app_list_strings['sales_stage_dom'];
            $selected_datax = array_keys($app_list_strings['sales_stage_dom']);
        }

        $result = $db->query($query);
        $row = $db->fetchByAssoc($result, false);

        while($row != null){
        	$temp_data[] = $row;
        	$row = $db->fetchByAssoc($result, false);
        }

		// reorder and set the array based on the order of selected_datax
        foreach($selected_datax as $sales_stage){
        	foreach($temp_data as $key => $value){
        		if ($value['sales_stage'] == $sales_stage){
        			$value['sales_stage'] = $app_list_strings['sales_stage_dom'][$value['sales_stage']];
        			$value['key'] = $sales_stage;
        			$value['value'] = $value['sales_stage'];
        			$data[] = $value;
        			unset($temp_data[$key]);
        		}
        	}
        }
        return $data;
    }

    /**
     * @param  $dataset array
     * @return int
     */
    private function getHorizBarTotal(
        $dataset
        )
    {
    	$total = 0;
    	foreach($dataset as $value){
    		$total += $value;
    	}

    	return $total;
    }

    /**
     * @param  $dataset array
     * @return array
     */
    private function constructCEChartData(
        $dataset
        )
    {
    	$newData = array();
    	foreach($dataset as $key=>$value){
    		$newData[$value['sales_stage']] = $value['total'];
    	}
    	return $newData;
    }

	/**
     * @see DashletGenericChart::constructQuery()
     */
    protected function constructQuery()
    {
        $query = "SELECT opportunities.sales_stage,
                        users.user_name,
                        opportunities.assigned_user_id,
                        count(*) AS opp_count,
                        sum(amount_usdollar/1000) AS total
                    FROM users,opportunities  ";
        $this->getSeedBean()->add_team_security_where_clause($query);
        $query .= " WHERE opportunities.assigned_user_id IN ('{$GLOBALS['current_user']->id}') " .
                        " AND opportunities.date_closed >= ". db_convert("'".$this->mypbss_date_start."'",'date').
                        " AND opportunities.date_closed <= ".db_convert("'".$this->mypbss_date_end."'",'date') .
                        " AND opportunities.assigned_user_id = users.id  AND opportunities.deleted=0 ";
        if ( count($this->mypbss_sales_stages) > 0 )
            $query .= " AND opportunities.sales_stage IN ('" . implode("','",$this->mypbss_sales_stages) . "') ";
        $query .= " GROUP BY opportunities.sales_stage ,users.user_name,opportunities.assigned_user_id";

        return $query;
    }

    /**
     * @see DashletGenericChart::constructGroupBy()
     */
    protected function constructGroupBy()
    {
    	$groupBy = array('sales_stage');

    	if ($this->mypbss_chart_type == 'hbar'){
    		array_push($groupBy, 'user_name');
    	}
    	return $groupBy;
    }
}

?>
