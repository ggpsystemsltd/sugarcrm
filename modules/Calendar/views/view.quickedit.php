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

require_once('include/MVC/View/views/view.ajax.php');
require_once('include/EditView/EditView2.php');


class CalendarViewQuickEdit extends SugarView {

	var $ev;
	protected $editable;	
	
	public function preDisplay(){
		global $beanFiles,$beanList;
		$module = $_REQUEST['current_module'];
		require_once($beanFiles[$beanList[$module]]);
		$this->bean = new $beanList[$module]();
		if(!empty($_REQUEST['record']))
			$this->bean->retrieve($_REQUEST['record']);
			
		if(!$this->bean->ACLAccess('DetailView')) {
			$json_arr = array(
				'success' => 'no',
			);
			echo json_encode($json_arr);
			die;	
		}

		if($this->bean->ACLAccess('Save')){
			$this->editable = 1;
		}else{
			$this->editable = 0;
		}		
    
	}
	
	public function display(){
		require_once("modules/Calendar/CalendarUtils.php");
		
		$module = $_REQUEST['current_module'];
		
		$_REQUEST['module'] = $module;
				
		$base = 'modules/' . $module . '/metadata/';
		$source = 'custom/'.$base.'quickcreatedefs.php';
		if (!file_exists($source)){
			$source = $base . 'quickcreatedefs.php';
			if (!file_exists($source)){
				$source = 'custom/' . $base . 'editviewdefs.php';
				if (!file_exists($source)){
					$source = $base . 'editviewdefs.php';
				}
			}
		}		

        $tpl = $this->getCustomFilePathIfExists('include/EditView/EditView.tpl');
		$this->ev = new EditView();
		$this->ev->view = "QuickCreate";
		$this->ev->ss = new Sugar_Smarty();
		$this->ev->formName = "CalendarEditView";
		$this->ev->setup($module,$this->bean,$source,$tpl);
		$this->ev->defs['templateMeta']['form']['headerTpl'] = "modules/Calendar/tpls/empty.tpl";
		$this->ev->defs['templateMeta']['form']['footerTpl'] = "modules/Calendar/tpls/empty.tpl";						
		$this->ev->process(false, "CalendarEditView");		
		
		if(!empty($this->bean->id)){
			require_once('include/json_config.php');
			global $json;
			$json = getJSONobj();
			$json_config = new json_config();
			$GRjavascript = $json_config->getFocusData($module, $this->bean->id);
        	}else{
        		$GRjavascript = "";
        	}	
	
		$json_arr = array(
				'success' => 'yes',
				'module_name' => $this->bean->module_dir,
				'record' => $this->bean->id,
				'edit' => $this->editable,
				'html'=> $this->ev->display(false, true),
				'gr' => $GRjavascript,
		);
			
		ob_clean();		
		echo json_encode($json_arr);
	}
}

?>
