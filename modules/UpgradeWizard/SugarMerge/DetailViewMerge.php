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
 
require_once('modules/UpgradeWizard/SugarMerge/EditViewMerge.php');
/**
 * This class extends the EditViewMerge - since the meta data is relatively the same the only thing that needs to be changed is the parameter for viewdefs
 *
 */
class DetailViewMerge extends EditViewMerge{
	/**
	 * Enter the name of the parameter used in the $varName for example in editviewdefs and detailviewdefs it is 'EditView' and 'DetailView' respectively - $viewdefs['EditView']
	 *
	 * @var STRING
	 */
	protected $viewDefs = 'DetailView';
		/**
	 * Determines if getFields should analyze panels to determine if it is a MultiPanel
	 *
	 * @var BOOLEAN
	 */
	protected $scanForMultiPanel = true;	/**
	 * Parses out the fields for each files meta data and then calls on mergeFields and setPanels
	 *
	 */
	protected function mergeMetaData(){
		$this->originalFields = $this->getFields($this->originalData[$this->module][$this->viewDefs][$this->panelName]);
		$this->originalPanelIds = $this->getPanelIds($this->originalData[$this->module][$this->viewDefs][$this->panelName]);
		$this->customFields = $this->getFields($this->customData[$this->module][$this->viewDefs][$this->panelName]);

		//Special handling to rename certain variables for DetailViews
		$rename_fields = array();
		foreach($this->customFields as $field_id=>$field){
		    //Check to see if we need to rename the field for special cases
			if(!empty($this->fieldConversionMapping[$this->module][$field_id])) {
			   $rename_fields[$field_id] = $this->fieldConversionMapping[$this->module][$field['data']['name']];
			   $this->customFields[$field_id]['data']['name'] = $this->fieldConversionMapping[$this->module][$field['data']['name']];
			}				
		}

		foreach($rename_fields as $original_index=>$new_index) {
			$this->customFields[$new_index] = $this->customFields[$original_index];
			unset($this->customFields[$original_index]);
		}
		
		$this->customPanelIds = $this->getPanelIds($this->customData[$this->module][$this->viewDefs][$this->panelName]);		
		$this->newFields = $this->getFields($this->newData[$this->module][$this->viewDefs][$this->panelName]);
		//echo var_export($this->newFields, true);
		$this->newPanelIds = $this->getPanelIds($this->newData[$this->module][$this->viewDefs][$this->panelName]);
		$this->mergeFields();
		$this->mergeTemplateMeta();
		$this->setPanels();
	}
		
}
?>