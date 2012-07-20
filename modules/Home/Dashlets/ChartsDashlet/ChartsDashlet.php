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


class ChartsDashlet extends Dashlet {
    var $width = '400';
    var $height = '480';
    var $report_id;

    /**
     * Constructor 
     * 
     * @global string current language
     * @param guid $id id for the current dashlet (assigned from Home module)
	 * @param report_id $report_id id of the saved report
     * @param array $def options saved for this dashlet
     */
    function ChartsDashlet($id, $report_id, $def) {
    	$this->report_id = $report_id;	
    	
        $this->loadLanguage('ChartsDashlet'); // load the language strings here

        parent::Dashlet($id); // call parent constructor

        $this->searchFields = array();
        $this->isConfigurable = true; // dashlet is configurable
        $this->hasScript = true;  // dashlet has javascript attached to it               
    }

    /**
     * Displays the dashlet
     * 
     * @return string html to display dashlet
     */
    function display() {
    	require_once("modules/Reports/Report.php");
			
	
//		ini_set('display_errors', 'false');
		
		$chartReport = new SavedReport();
		$chartExists = $chartReport->retrieve($this->report_id, false);
		
		if (!is_null($chartExists)){
	        $this->title = $chartReport->name;
				
			$reporter = new Report($chartReport->content);
			$reporter->is_saved_report = true;
			$reporter->saved_report_id = $chartReport->id;
            $reporter->get_total_header_row();
			$reporter->run_chart_queries();
			
			require_once("modules/Reports/templates/templates_chart.php");
	
			ob_start();	
			template_chart($reporter, true, true, $this->id);
			$str = ob_get_contents();	
			ob_end_clean();
			
			$xmlFile = get_cache_file_name($reporter);
			
			$html = parent::display() . "<div align='center'>" . $str . "</div>" . "<br />"; // return parent::display for title and such
	
			$ss = new Sugar_Smarty();
	        $ss->assign('chartName', $this->id);
	        $ss->assign('chartXMLFile', $xmlFile);
	        $script = $ss->fetch('modules/Home/Dashlets/ChartsDashlet/ChartsDashletScript.tpl');
			$json = getJSONobj();
			
	        return parent::display() . "<div align='center'>" . $str . "</div>" . "<br />"; // return parent::display for title and such
		}
    }
    
    /**
     * Displays the javascript for the dashlet
     * 
     * @return string javascript to use with this dashlet
     */
    function displayScript() {
    	require_once("modules/Reports/Report.php");
			
	
		$chartReport = new SavedReport();		
		$chartExists = $chartReport->retrieve($this->report_id, false);
		
		if (!is_null($chartExists)){
	        $this->title = $chartReport->name;
				
			require_once("modules/Reports/templates/templates_chart.php");
			require_once('include/SugarCharts/SugarChartFactory.php');

			$sugarChart = SugarChartFactory::getInstance();
		
		
			$reporter = new Report($chartReport->content);
			$reporter->is_saved_report = true;
			$reporter->saved_report_id = $chartReport->id;
			$xmlFile = get_cache_file_name($reporter);

	        $str = $sugarChart->getDashletScript($this->id,$xmlFile);
	        return $str;
		}
    }
        
    /**
     * Displays the configuration form for the dashlet
     * 
     * @return string html to display form
     */
    function displayOptions() {
    }  

    /**
     * called to filter out $_REQUEST object when the user submits the configure dropdown
     * 
     * @param array $req $_REQUEST
     * @return array filtered options to save
     */  
    function saveOptions($req) {
    }
    
    function setConfigureIcon(){
    	
    	
        if($this->isConfigurable) 
            $additionalTitle = '<td nowrap width="1%" style="padding-right: 0px;"><div class="dashletToolSet"><a href="index.php?module=Reports&record=' . $this->report_id . '&action=ReportCriteriaResults&page=report">'
                               . SugarThemeRegistry::current()->getImage('dashlet-header-edit','title="' . translate('LBL_DASHLET_EDIT', 'Home') . '" border="0"  align="absmiddle"', null,null,'.gif',translate('LBL_DASHLET_EDIT', 'Home')).'</a>'

                               . '';
        else 
            $additionalTitle = '<td nowrap width="1%" style="padding-right: 0px;"><div class="dashletToolSet">';    	
    	
    	return $additionalTitle;
    }    

    function setRefreshIcon(){
    	
    	
    	$additionalTitle = '';
        if($this->isRefreshable)
            $additionalTitle .= '<a href="#" onclick="SUGAR.mySugar.retrieveDashlet(\'' 
                                . $this->id . '\', \'chart\'); return false;"><!--not_in_theme!--><img border="0" align="absmiddle" title="' . translate('LBL_DASHLET_REFRESH', 'Home') . '" alt="' . translate('LBL_DASHLET_REFRESH', 'Home') . '" src="' 

                                . SugarThemeRegistry::current()->getImageURL('dashlet-header-refresh.png') .'" /></a>';	
        return $additionalTitle;
    }
    
}

?>