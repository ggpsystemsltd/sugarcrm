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

 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/


require_once('include/Dashlets/DashletGenericChart.php');

class MyTeamModulesUsedChartDashlet extends DashletGenericChart
{
    /**
     * @see Dashlet::$isConfigurable
     */
    public $isConfigurable = true;
    
    /**
     * @see DashletGenericChart::$_seedName
     */
    protected $_seedName = 'Trackers';
    
    /**
     * @see Dashlet::$isConfigPanelClearShown
     */
    public $isConfigPanelClearShown = false;
    
    /**
     * @see DashletGenericChart::display()
     */
    public function display() 
    {
        global $db;

        require("modules/Charts/chartdefs.php");
        $chartDef = $chartDefs['my_team_modules_used_last_30_days'];

        require_once('include/SugarCharts/SugarChartFactory.php');
        $sugarChart = SugarChartFactory::getInstance();
        $sugarChart->forceHideDataGroupLink = true;
        $sugarChart->setProperties('', $chartDef['chartUnits'], $chartDef['chartType']);
        $sugarChart->group_by = $chartDef['groupBy'];
        $sugarChart->url_params = array();

        $result = $db->query($this->constructQuery());
        $dataset = array();
        while(($row = $db->fetchByAssoc($result)))
            $dataset[] = array('user_name'=>$row['user_name'], 'module_name'=>$row['module_name'], 'total'=>$row['count']);

        $sugarChart->setData($dataset);

        $xmlFile = $sugarChart->getXMLFileName($this->id);
        $sugarChart->saveXMLFile($xmlFile, $sugarChart->generateXML());
	
        return $this->getTitle('<div align="center"></div>') . 
            '<div align="center">' . $sugarChart->display($this->id, $xmlFile, '100%', '480', false) . '</div>'. $this->processAutoRefresh();
	}

    /**
     * @see Dashlet::hasAccess()
     */
    public function hasAccess()
    {
    	return ACLController::checkAccess('Trackers', 'view', false, 'Tracker');
    }	
	
    /**
     * @see DashletGenericChart::constructQuery()
     */
    protected function constructQuery() 
    {
		return "SELECT l1.user_name, tracker.module_name, count(*) count " .
                    "FROM tracker INNER JOIN users l1 ON l1.id = tracker.user_id and l1.deleted = 0 " .
                    "WHERE tracker.deleted = 0 AND tracker.date_modified > ".db_convert("'".$GLOBALS['timedate']->getNow()->modify("-30 days")->asDb()."'" ,"datetime")." " .
                        "AND tracker.user_id in (Select id from users where reports_to_id = '{$GLOBALS['current_user']->id}') " .
                    "GROUP BY l1.user_name, tracker.module_name " .
                    "ORDER BY l1.user_name ASC";
	}
}