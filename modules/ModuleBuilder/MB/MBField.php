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

class MBField{
	var $type = 'varchar';
	var $name = false;
	var $label = false;
	var $vname = false;
	var $options = false;
	var $length = false;
	var $error = '';
	var $required = false;
	var $reportable = true;
	var $default = 'MSI1';
	var $comment = '';
	
	
	
	function getFieldVardef(){
		if(empty($this->name)){
			$this->error = 'A name is required to create a field';
			return false;
		}		
		if(empty($this->label))$this->label = $this->name;
		$this->name = strtolower($this->getDBName($this->name));
		$vardef = array();
		$vardef['name']=$this->name;
		if(empty($this->vname))$this->vname = 'LBL_' . strtoupper($this->name);
		$vardef['vname'] = $this->addLabel();
		if(!empty($this->required))$vardef['required'] = $this->required;
		if(empty($this->reportable))$vardef['reportable'] = false;
		if(!empty($this->comment))$vardef['comment'] = $this->comment;
		if($this->default !== 'MSI1')$vardef['default'] = $this->default;
		switch($this->type){
			case 'date':
			case 'datetime':
			case 'float':
			case 'int':
				$vardef['type']=$this->type;
				return $vardef;
			case 'bool':
				$vardef['type'] = 'bool';
				$vardef['default'] = (empty($vardef['default']))?0:1;
				return $vardef;
			case 'enum':
				$vardef['type']='enum';
				if(empty($this->options)){
					$this->options = $this->name . '_list';
				}
				$vardef['options'] = $this->addDropdown();
				return $vardef;
			default:
				$vardef['type']='varchar';
				return $vardef;
			
		}
	}
	
	function addDropDown(){
		return $this->options;
	}
	
	function addLabel(){
		return $this->vname;
	}
	
}
?>