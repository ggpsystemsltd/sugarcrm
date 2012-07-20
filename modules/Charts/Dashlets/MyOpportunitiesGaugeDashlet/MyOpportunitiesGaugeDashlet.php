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

class MyOpportunitiesGaugeDashlet extends DashletGenericChart 
{
    /**
     * @see DashletGenericChart::$_seedName
     */
    protected $_seedName = 'Opportunities';
    
    /**
     * @see Dashlet::$isConfigPanelClearShown
     */
    public $isConfigPanelClearShown = false;
    
    /**
     * @see DashletGenericChart::__construct()
     */
    public function __construct(
        $id, 
        array $options = null
        ) 
    {
        if (empty($options['title'])) 
            $options['title'] = translate('LBL_MY_CLOSED_OPPORTUNITIES_GAUGE', 'Home');
        
        parent::__construct($id,$options);
    }
    
    /**
     * @see DashletGenericChart::display()
     */
    public function display() 
    {
        require('modules/Charts/chartdefs.php');
        $chartDef = $chartDefs['opportunities_this_quarter'];
		
        require_once('include/SugarCharts/SugarChartFactory.php');
        $sugarChart = SugarChartFactory::getInstance();
        $sugarChart->setProperties('', translate('LBL_NUMBER_OF_OPPS', 'Charts'), $chartDef['chartType']);
        $sugarChart->base_url = $chartDef['base_url'];
        $sugarChart->group_by = $chartDef['groupBy'];
        $sugarChart->url_params = array();
        
        // get gauge target
        $qry = "SELECT * from opportunities WHERE assigned_user_id = '" . $GLOBALS['current_user']->id . "' AND deleted=0";
        $result = $this->getSeedBean()->db->query($this->getSeedBean()->create_list_count_query($qry));	
        $row = $this->getSeedBean()->db->fetchByAssoc($result);
        $sugarChart->setDisplayProperty('gaugeTarget', $row['c']);
        
        $sugarChart->getData($this->constructQuery());
        
        $xmlFile = $sugarChart->getXMLFileName($this->id);
        $sugarChart->saveXMLFile($xmlFile, $sugarChart->generateXML());
        
        return $this->getTitle('<div align="center"></div>') . '<div align="center">' .$sugarChart->display($this->id, $xmlFile, '100%', '480', false) . '</div><br />'. $this->processAutoRefresh();
    }  
    
    /**
     * @see DashletGenericChart::constructQuery()
     */
    protected function constructQuery() 
    {
		return "SELECT count(*) AS num " . 
				 "FROM opportunities " .
				 "WHERE assigned_user_id = '{$GLOBALS['current_user']->id}' " .
                    "AND sales_stage = 'Closed Won' AND deleted=0" ;
    }
    
    /**
     * @see DashletGenericChart::constructGroupBy()
     */
    protected function constructGroupBy()
    {
    	return array( 'sales_stage', 'user_name', );
    }
}