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

 * Description:  Defines the English language pack for the base application.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

require_once('modules/UpgradeWizard/SugarMerge/ListViewMerge.php');
/**
 * SearchMerge is a class for merging search meta data together. This search meta-data has a listing of fields similar to ListViews
 *
 */
class SearchMerge extends ListViewMerge{
	protected $varName = 'searchdefs';
	protected $viewDefs = 'Search';
	protected $panelName = 'layout';
	
	/**
	 * Loads the meta data of the original, new, and custom file into the variables originalData, newData, and customData respectively it then transforms them into a structure that EditView Merge would understand
	 *
	 * @param STRING $module - name of the module's files that are to be merged
	 * @param STRING $original_file - path to the file that originally shipped with sugar
	 * @param STRING $new_file - path to the new file that is shipping with the patch 
	 * @param STRING $custom_file - path to the custom file
	 */
	protected function loadData($module, $original_file, $new_file, $custom_file){
		EditViewMerge::loadData($module, $original_file, $new_file, $custom_file);
		$this->originalData = array($module=>array( $this->viewDefs=>$this->originalData[$module]));
		$this->customData = array($module=>array( $this->viewDefs=>$this->customData[$module]));
		$this->newData = array($module=>array( $this->viewDefs=>$this->newData[$module]));
	
	}
	/**
	 * This takes in a  list of panels and returns an associative array of field names to the meta-data of the field as well as the locations of that field
	 * Since searchdefs have the concept of basic and advanced those act as panels for merging
	 * @param ARRAY $panels - this is the 'panel' section of the meta-data for list views all the meta data is one panel since it is just a list of fields
	 * @return ARRAY $fields - an associate array of fields and their meta-data as well as their location
	 */
	
	protected function getFields(&$panels, $multiple = true){
		$fields = array();
		if(!$multiple)$panels = array($panels);
		
		foreach($panels as $panel_id=>$panel){
				foreach($panel as $col_id=>$col){
					if(is_array($col)){
						$field_name = $col['name'];
					}else{
						$field_name = $col;
					}
					$fields[$field_name . $panel_id] = array('data'=>$col, 'loc'=>array('row'=>$col_id, 'panel'=>$panel_id));
				}
			}
			
			return $fields;
		}
	
	/**
	 * This builds the array of fields from the merged fields in the right order
	 * when building the panels for a list view the most important thing is order 
	 * so we ensure the fields that came from the custom file keep 
	 * their order then we add any new fields at the end
	 *
	 * @return ARRAY
	 */
	protected function buildPanels(){
		$panels  = array();
		
		//first only deal with ones that have their location coming from the custom source
		foreach($this->mergedFields as $id =>$field){
			if($field['loc']['source'] == 'custom'){
				$panels[$field['loc']['panel']][] = $field['data'];
				unset($this->mergedFields[$id]);
			}
		}

		return $panels;
	}
	
	/**
	 * Sets the panel section for the meta-data after it has been merged
	 *
	 */
	protected function setPanels(){
		$this->newData[$this->module][$this->viewDefs][$this->panelName] = $this->buildPanels();
		$this->newData[$this->module] = $this->newData[$this->module][$this->viewDefs];
		
	}
	public function save($to){
		return write_array_to_file("$this->varName['$this->module']", $this->newData[$this->module], $to);
	}
	
	/**
	 * public function that will merge meta data from an original sugar file that shipped with the product, a customized file, and a new file shipped with an upgrade
	 *
	 * @param STRING $module - name of the module's files that are to be merged
	 * @param STRING $original_file - path to the file that originally shipped with sugar
	 * @param STRING $new_file - path to the new file that is shipping with the patch 
	 * @param STRING $custom_file - path to the custom file
	 * @param BOOLEAN $save - boolean on if it should save the results to the custom file or not
	 * @return BOOLEAN - if the merged file was saved if false is passed in for the save parameter it always returns true
	 */
	public function merge($module, $original_file, $new_file, $custom_file=false, $save=true){
		//Bug 37207
		if($module == 'Connectors') {
		   return false;
		}			
		
		$this->clear();
		$this->log("\n\n". 'Starting a merge in ' . get_class($this));
		$this->log('merging the following files');
		$this->log('original file:'  . $original_file);
		$this->log('new file:'  . $new_file);
		$this->log('custom file:'  . $custom_file);	
		if(empty($custom_file) && $save){
			return true;
		}else{			
			$this->loadData($module, $original_file, $new_file, $custom_file);
						
			if(!isset($this->originalData[$module])) {
			   return false;
			}
			
			$this->mergeMetaData();
			if($save && !empty($this->newData) && !empty($custom_file)){
				//backup the file
				copy($custom_file, $custom_file . '.suback.php');
				return $this->save($custom_file);
			}
		}
		if(!$save)return true;
		return false;
	}	
	
	protected function mergeTemplateMeta()
	{
	    if( isset($this->customData[$this->module][$this->viewDefs][$this->templateMetaName]) )
	    {
	       $this->newData[$this->module][$this->viewDefs][$this->templateMetaName] = $this->customData[$this->module][$this->viewDefs][$this->templateMetaName];
	    }
	    
	    if(!isset($this->newData[$this->module][$this->viewDefs][$this->templateMetaName]['maxColumnsBasic']) && isset($this->newData[$this->module][$this->viewDefs][$this->templateMetaName]['maxColumns']))
	    {
	    	$this->newData[$this->module][$this->viewDefs][$this->templateMetaName]['maxColumnsBasic'] = $this->newData[$this->module][$this->viewDefs][$this->templateMetaName]['maxColumns'];
	    }
	}	
	
}
?>