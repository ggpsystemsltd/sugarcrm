<?php
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




require_once("include/SugarCharts/Jit/Jit.php");

class JitReports extends Jit {
	
	private $processed_report_keys = array();
	
	function __construct() {
		parent::__construct();
	}
	
		function calculateReportGroupTotal($dataset){
		$total = 0;				
		foreach ($dataset as $value){
			$total += $value['numerical_value'];
		}
		
		return $total;
	}	
	
	function processReportData($dataset, $level=1, $first=false){
		$data = '';
		
		// rearrange $dataset to get the correct order for the first row
		if ($first){
			$temp_dataset = array();
			foreach ($this->super_set as $key){
				$temp_dataset[$key] = (isset($dataset[$key])) ? $dataset[$key] : array();
			}
			$dataset = $temp_dataset;			
		}
		
		foreach ($dataset as $key=>$value){
			if ($first && empty($value)){
				$data .= $this->processDataGroup(4, $key, 'NULL', '', '');
			}			
			else if (array_key_exists('numerical_value', $dataset)){
				$link = (isset($dataset['link'])) ? '#'.$dataset['link'] : '';
				$data .= $this->processDataGroup($level, $dataset['group_base_text'], $dataset['numerical_value'], $dataset['numerical_value'], $link);
				array_push($this->processed_report_keys, $dataset['group_base_text']);
				return $data;
			}
			else{
				$data .= $this->processReportData($value, $level+1);
			}
		}
		
		return $data;
	}
	
	function processReportGroup($dataset){
		$super_set = array();

        foreach($dataset as $groupBy => $groups){
            $prev_super_set = $super_set;
            if (count($groups) > count($super_set)){
	            $super_set = array_keys($groups);
                foreach($prev_super_set as $prev_group){
                    if (!in_array($prev_group, $groups)){
                        array_push($super_set, $prev_group);
                    }       
                }       
            }       
            else{ 
                foreach($groups as $group => $groupData){
                    if (!in_array($group, $super_set)){ 
                        array_push($super_set, $group);
                    }       
                }       
            }       
        }     
        $super_set = array_unique($super_set);

		return $super_set;
	}
	
	function xmlDataReportSingleValue(){
		$data = '';		
		foreach ($this->data_set as $key => $dataset){
			$total = $this->calculateReportGroupTotal($dataset);
			$this->checkYAxis($total);						

			$data .= $this->tab('<group>', 2);
			$data .= $this->tabValue('title',$key, 3);
			$data .= $this->tab('<subgroups>', 3);
			$data .= $this->tab('<group>',4);
			$data .= $this->tabValue('title',$total,5);
			$data .= $this->tabValue('value',$total,5);
			$data .= $this->tabValue('label',$key,5);
			$data .= $this->tab('<link></link>',5);
			$data .= $this->tab('</group>',4);
			$data .= $this->tab('</subgroups>', 3);				
			$data .= $this->tab('</group>', 2);			
		}
		return $data;
	}
	
	function xmlDataReportChart(){
		$data = '';
		// correctly process the first row
		$first = true;	
		foreach ($this->data_set as $key => $dataset){
			
			$total = $this->calculateReportGroupTotal($dataset);
			$this->checkYAxis($total);
			
			$data .= $this->tab('<group>', 2);
			$data .= $this->tabValue('title',$key, 3);
			$data .= $this->tabValue('value',$total, 3);
			$data .= $this->tabValue('label',$total, 3);				
			$data .= $this->tab('<subgroups>', 3);
			
			if ((isset($dataset[$total]) && $total != $dataset[$total]['numerical_value']) || !array_key_exists($key, $dataset)){
					$data .= $this->processReportData($dataset, 4, $first);
			}
			else if(count($this->data_set) == 1 && $first){
			    foreach ($dataset as $k=>$v){
			        if(isset($v['numerical_value'])) {
			            $data .= $this->processDataGroup(4, $k, $v['numerical_value'], $v['numerical_value'], '');
			        }
			    }
			}			

			if (!$first){											
				$not_processed = array_diff($this->super_set, $this->processed_report_keys);
				$processed_diff_count = count($this->super_set) - count($not_processed);

				if ($processed_diff_count != 0){
					foreach ($not_processed as $title){
						$data .= $this->processDataGroup(4, $title, 'NULL', '', '');
					}
				}
			}
			
			$data .= $this->tab('</subgroups>', 3);				
			$data .= $this->tab('</group>', 2);				
			$this->processed_report_keys = array();
			// we're done with the first row!
			//$first = false;
		}
		return $data;		
	}
	
	public function processXmlData(){
		$data = '';
		
		$this->super_set = $this->processReportGroup($this->data_set);
		$single_value = false;

		foreach ($this->data_set as $key => $dataset){
			if ((isset($dataset[$key]) && count($this->data_set[$key]) == 1)){
				$single_value = true;
			}
			else{
				$single_value = false;
			}
		}
		if ($this->chart_properties['type'] == 'line chart' && $single_value){
			$data .= $this->xmlDataReportSingleValue();
		}
		else{
			$data .= $this->xmlDataReportChart();
		}
		
		return $data;		
	}	
		
	/**
     * wrapper function to return the html code containing the chart in a div
	 * 
     * @param 	string $name 	name of the div
	 *			string $xmlFile	location of the XML file
	 *			string $style	optional additional styles for the div
     * @return	string returns the html code through smarty
     */					
	function display($name, $xmlFile, $width='320', $height='480', $reportChartDivStyle, $resize=false){
		if(empty($name)) {
			$name = "unsavedReport";	
		}
		
		parent::display($name, $xmlFile, $width, $height, $resize=false);			
		
		return $this->ss->fetch('include/SugarCharts/Jit/tpls/chart.tpl');	
	}
}

?>