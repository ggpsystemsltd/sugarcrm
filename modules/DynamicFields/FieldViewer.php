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

class FieldViewer{
	function FieldViewer(){
		$this->ss = new Sugar_Smarty();
	}
	function getLayout($vardef){

		if(empty($vardef['type']))$vardef['type'] = 'varchar';
		$mod = return_module_language($GLOBALS['current_language'], 'DynamicFields');
		$this->ss->assign('vardef', $vardef);
		$this->ss->assign('MOD', $mod);
		$this->ss->assign('APP', $GLOBALS['app_strings']);
		//Only display range search option if in Studio, not ModuleBuilder
		$this->ss->assign('range_search_option_enabled', empty($_REQUEST['view_package']));
		
		$GLOBALS['log']->debug('FieldViewer.php->getLayout() = '.$vardef['type']);
		switch($vardef['type']){
			case 'address':
                return $this->ss->fetch('modules/DynamicFields/templates/Fields/Forms/address.tpl');
			case 'bool':
				return $this->ss->fetch('modules/DynamicFields/templates/Fields/Forms/bool.tpl');
			case 'int':
				return $this->ss->fetch('modules/DynamicFields/templates/Fields/Forms/int.tpl');
			case 'float':
				return $this->ss->fetch('modules/DynamicFields/templates/Fields/Forms/float.tpl');
			case 'decimal':
				return $this->ss->fetch('modules/DynamicFields/templates/Fields/Forms/float.tpl');
			case 'date':
			    require_once('modules/DynamicFields/templates/Fields/Forms/date.php');
				return get_body($this->ss, $vardef);
			case 'datetimecombo':
			case 'datetime':
			    require_once('modules/DynamicFields/templates/Fields/Forms/datetimecombo.php');
				return get_body($this->ss, $vardef);
			case 'enum':
				require_once('modules/DynamicFields/templates/Fields/Forms/enum2.php');
				return get_body($this->ss, $vardef);
			case 'multienum':
				require_once('modules/DynamicFields/templates/Fields/Forms/multienum.php');
				return get_body($this->ss, $vardef);
			case 'radioenum':
				require_once('modules/DynamicFields/templates/Fields/Forms/radioenum.php');
				return get_body($this->ss, $vardef);
			case 'html':
				require_once('modules/DynamicFields/templates/Fields/Forms/html.php');
				return get_body($this->ss, $vardef);
			case 'currency':
				return $this->ss->fetch('modules/DynamicFields/templates/Fields/Forms/currency.tpl');
			case 'relate':
				require_once('modules/DynamicFields/templates/Fields/Forms/relate.php');
				return get_body($this->ss, $vardef);
			case 'parent':
				require_once('modules/DynamicFields/templates/Fields/Forms/parent.php');
				return get_body($this->ss, $vardef);
			case 'text':
				return $this->ss->fetch('modules/DynamicFields/templates/Fields/Forms/text.tpl');
			case 'encrypt':
				require_once('modules/DynamicFields/templates/Fields/Forms/encrypt.php');
				return get_body($this->ss, $vardef);
			case 'iframe':
				require_once('modules/DynamicFields/templates/Fields/Forms/iframe.php');
				return get_body($this->ss, $vardef);
			case 'url':
				require_once('modules/DynamicFields/templates/Fields/Forms/url.php');
				return get_body($this->ss, $vardef);
			case 'phone:':
				require_once('modules/DynamicFields/templates/Fields/Forms/phone.php');
				return get_body($this->ss, $vardef);
			default:
				$file = false;
				if(file_exists('custom/modules/DynamicFields/templates/Fields/Forms/' . $vardef['type'] . '.php')){
					$file = 'custom/modules/DynamicFields/templates/Fields/Forms/' . $vardef['type'] . '.php';
				} elseif(file_exists('modules/DynamicFields/templates/Fields/Forms/' . $vardef['type'] . '.php')){
					$file = 'modules/DynamicFields/templates/Fields/Forms/' . $vardef['type'] . '.php';
				}
				if(!empty($file)){
					require_once($file);
					return get_body($this->ss, $vardef);
				}else{ 
					return $this->ss->fetch('modules/DynamicFields/templates/Fields/Forms/varchar.tpl');
				}
		}
	}

}