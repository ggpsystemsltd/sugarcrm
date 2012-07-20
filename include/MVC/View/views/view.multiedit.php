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

/*
 * Created on Apr 13, 2007
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once('include/EditView/EditView2.php');
 class ViewMultiedit extends SugarView{
 	var $type ='edit';
 	function ViewMultiedit(){
 		parent::SugarView();
 	}
 	
 	function display(){
		global $beanList, $beanFiles;
		if($this->action == 'AjaxFormSave'){
			echo "<a href='index.php?action=DetailView&module=".$this->module."&record=".$this->bean->id."'>".$this->bean->id."</a>";
		}else{
			if(!empty($_REQUEST['modules'])){
				$js_array = 'Array(';
				
				$count = count($_REQUEST['modules']);
				$index = 1;
				foreach($_REQUEST['modules'] as $module){
					$js_array .= "'form_".$module."'";
					if($index < $count)
						$js_array .= ',';
					$index++;
				}
				//$js_array = "Array(".implode(",", $js_array). ")";
				$js_array .= ');';
				echo "<script language='javascript'>var ajaxFormArray = new ".$js_array."</script>";
				if($count > 1)
					echo '<input type="button" class="button" value="Save All" id=\'ajaxsaveall\' onclick="return saveForms(\'Saving...\', \'Save Complete\');"/>';
				foreach($_REQUEST['modules'] as $module){
					$bean = $beanList[$module];
					require_once($beanFiles[$bean]);
					$GLOBALS['mod_strings'] = return_module_language($GLOBALS['current_language'], $module);
					$ev = new EditView($module);
					$ev->process();
					echo "<div id='multiedit_form_".$module."'>";
					echo $ev->display(true, true);
					echo "</div>";
				}
			}
		}
 	}
 }
?>
