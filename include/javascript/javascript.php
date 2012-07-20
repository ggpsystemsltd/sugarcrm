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

 * Description:  Creates the runtime database connection.
 ********************************************************************************/
class javascript{
	var $formname = 'form';
	var $script = '';
	var $sugarbean = null;
	function setFormName($name){
		$this->formname = $name;
	}

	function javascript(){
		global $app_strings, $current_user, $sugar_config;

        // Bug 24730 - default initialize the bean object in case we never set it to the current bean object
		$this->sugarbean = new stdClass;
		$this->sugarbean->field_name_map = array();
		$this->sugarbean->module_dir = '';
	}

	function setSugarBean($sugar){
		$this->sugarbean = $sugar;
	}

	function addRequiredFields($prefix=''){
			if(isset($this->sugarbean->required_fields)){
				foreach($this->sugarbean->required_fields as $field=>$value){
					$this->addField($field,'true', $prefix);
				}
			}
	}

    function addSpecialField($dispField, $realField, $type, $required, $prefix = '') {
       if (isset($this->sugarbean->field_name_map[$realField]['vname'])) {
    	$this->addFieldGeneric($dispField, 'date', $this->sugarbean->field_name_map[$realField]['vname'], $required, $prefix );
       }
    }

	function addField($field,$required, $prefix='', $displayField='', $translate = false){
		if ($field == "id") return;
        if(isset($this->sugarbean->field_name_map[$field]['vname'])){
            $vname = $this->sugarbean->field_name_map[$field]['vname'];
            if ( $translate )
                $vname = $this->buildStringToTranslateInSmarty($this->sugarbean->field_name_map[$field]['vname']);
			if(empty($required)){
				if(isset($this->sugarbean->field_name_map[$field]['required']) && $this->sugarbean->field_name_map[$field]['required']){
					$required = 'true';
				}else{
					$required = 'false';
				}
				if(isset($this->sugarbean->required_fields[$field]) && $this->sugarbean->required_fields[$field]){
					$required = 'true';
				}
				if($field == 'id'){
					$required = 'false';
				}

			}
			if(isset($this->sugarbean->field_name_map[$field]['validation'])){
				switch($this->sugarbean->field_name_map[$field]['validation']['type']){
					case 'range':
						$min = 0;
						$max = 100;
						if(isset($this->sugarbean->field_name_map[$field]['validation']['min'])){
							$min = $this->sugarbean->field_name_map[$field]['validation']['min'];
						}
						if(isset($this->sugarbean->field_name_map[$field]['validation']['max'])){
							$max = $this->sugarbean->field_name_map[$field]['validation']['max'];
						}
						if($min > $max){
							$max = $min;
						}
						if(!empty($displayField)){
							$dispField = $displayField;
						}
						else{
							$dispField = $field;
						}
						$this->addFieldRange($dispField,$this->sugarbean->field_name_map[$field]['type'],$vname,$required,$prefix, $min, $max );
						break;
					case 'isbefore':
						$compareTo = $this->sugarbean->field_name_map[$field]['validation']['compareto'];
						if(!empty($displayField)){
							$dispField = $displayField;
						}
						else{
							$dispField = $field;
						}
						if(!empty($this->sugarbean->field_name_map[$field]['validation']['blank']) && $this->sugarbean->field_name_map[$field]['validation']['blank'])
						$this->addFieldDateBeforeAllowBlank($dispField,$this->sugarbean->field_name_map[$field]['type'],$vname,$required,$prefix, $compareTo );
						else $this->addFieldDateBefore($dispField,$this->sugarbean->field_name_map[$field]['type'],$vname,$required,$prefix, $compareTo );
						break;
                    // Bug #47961 Adding new type of validation: through callback function
                    case 'callback' :
                        $dispField = $displayField ? $displayField : $field;
                        $this->addFieldCallback($dispField, $this->sugarbean->field_name_map[$field]['type'], $vname, $required, $prefix, $this->sugarbean->field_name_map[$field]['validation']['callback']);
                        break;
					default:
						if(!empty($displayField)){
							$dispField = $displayField;
						}
						else{
							$dispField = $field;
						}

						$type = (!empty($this->sugarbean->field_name_map[$field]['custom_type']))?$this->sugarbean->field_name_map[$field]['custom_type']:$this->sugarbean->field_name_map[$field]['type'];

						$this->addFieldGeneric($dispField,$type,$vname,$required,$prefix );
						break;
				}
			}else{
				if(!empty($displayField)){
							$dispField = $displayField;
						}
						else{
							$dispField = $field;
						}
					$type = (!empty($this->sugarbean->field_name_map[$field]['custom_type']))?$this->sugarbean->field_name_map[$field]['custom_type']:$this->sugarbean->field_name_map[$field]['type'];
					if(!empty($this->sugarbean->field_name_map[$dispField]['isMultiSelect']))$dispField .='[]';
					$this->addFieldGeneric($dispField,$type,$vname,$required,$prefix );
			}
		}else{
			$GLOBALS['log']->debug('No VarDef Label For ' . $field . ' in module ' . $this->sugarbean->module_dir );
		}

	}


	function stripEndColon($modString)
	{
		if(substr($modString, -1, 1) == ":")
			$modString = substr($modString, 0, (strlen($modString) - 1));
		if(substr($modString, -2, 2) == ": ")
			$modString = substr($modString, 0, (strlen($modString) - 2));
		return $modString;

	}

	function addFieldGeneric($field, $type,$displayName, $required, $prefix=''){
		$this->script .= "addToValidate('".$this->formname."', '".$prefix.$field."', '".$type . "', {$this->getRequiredString($required)},'"
                       . $this->stripEndColon(translate($displayName,$this->sugarbean->module_dir)) . "' );\n";
	}

    // Bug #47961 Generator of callback validator
    function addFieldCallback($field, $type, $displayName, $required, $prefix, $callback)
    {
        $this->script .= 'addToValidateCallback("'
            . $this->formname . '", "'
            . $prefix.$field . '", "'
            . $type . '", '
            . $this->getRequiredString($required) . ', "'
            . $this->stripEndColon(translate($displayName, $this->sugarbean->module_dir)).'", '
            .$callback
        .');'."\n";
    }

	function addFieldRange($field, $type,$displayName, $required, $prefix='',$min, $max){
		$this->script .= "addToValidateRange('".$this->formname."', '".$prefix.$field."', '".$type . "', {$this->getRequiredString($required)},'"
                       . $this->stripEndColon(translate($displayName,$this->sugarbean->module_dir)) . "', $min, $max );\n";
	}

	function addFieldIsValidDate($field, $type, $displayName, $msg, $required, $prefix='') {
		$name = $prefix.$field;
		$req = $this->getRequiredString($required);
		$this->script .= "addToValidateIsValidDate('{$this->formname}', '{$name}', '{$type}', {$req}, '{$msg}');\n";
	}

	function addFieldIsValidTime($field, $type, $displayName, $msg, $required, $prefix='') {
		$name = $prefix.$field;
		$req = $this->getRequiredString($required);
		$this->script .= "addToValidateIsValidTime('{$this->formname}', '{$name}', '{$type}', {$req}, '{$msg}');\n";
	}

	function addFieldDateBefore($field, $type,$displayName, $required, $prefix='',$compareTo){
		$this->script .= "addToValidateDateBefore('".$this->formname."', '".$prefix.$field."', '".$type . "', {$this->getRequiredString($required)},'"
                       . $this->stripEndColon(translate($displayName,$this->sugarbean->module_dir)) . "', '$compareTo' );\n";
	}

	function addFieldDateBeforeAllowBlank($field, $type, $displayName, $required, $prefix='', $compareTo, $allowBlank='true'){
		$this->script .= "addToValidateDateBeforeAllowBlank('".$this->formname."', '".$prefix.$field."', '".$type . "', {$this->getRequiredString($required)},'"
                       . $this->stripEndColon(translate($displayName,$this->sugarbean->module_dir)) . "', '$compareTo', '$allowBlank' );\n";
	}

	function addToValidateBinaryDependency($field, $type, $displayName, $required, $prefix='',$compareTo){
		$this->script .= "addToValidateBinaryDependency('".$this->formname."', '".$prefix.$field."', '".$type . "', {$this->getRequiredString($required)},'"
                       . $this->stripEndColon(translate($displayName,$this->sugarbean->module_dir)) . "', '$compareTo' );\n";
	}

    function addToValidateComparison($field, $type, $displayName, $required, $prefix='',$compareTo){
        $this->script .= "addToValidateComparison('".$this->formname."', '".$prefix.$field."', '".$type . "', {$this->getRequiredString($required)},'"
                       . $this->stripEndColon(translate($displayName,$this->sugarbean->module_dir)) . "', '$compareTo' );\n";
    }

    function addFieldIsInArray($field, $type, $displayName, $required, $prefix, $arr, $operator){
    	$name = $prefix.$field;
		$req = $this->getRequiredString($required);
		$json = getJSONobj();
		$arr = $json->encode($arr);
		$this->script .= "addToValidateIsInArray('{$this->formname}', '{$name}', '{$type}', {$req}, '".$this->stripEndColon(translate($displayName,$this->sugarbean->module_dir))."', '{$arr}', '{$operator}');\n";
    }

	function addAllFields($prefix,$skip_fields=null, $translate = false){
		if (!isset($skip_fields))
		{
			$skip_fields = array();
		}
		foreach($this->sugarbean->field_name_map as $field=>$value){
			if (!isset($skip_fields[$field]))
			{
			    if(isset($value['type']) && ($value['type'] == 'datetimecombo' || $value['type'] == 'datetime')) {
			    	$isRequired = (isset($value['required']) && $value['required']) ? 'true' : 'false';
			        $this->addSpecialField($value['name'] . '_date', $value['name'], 'datetime', $isRequired);
                    if ($value['type'] != 'link'  && isset($this->sugarbean->field_name_map[$field]['validation'])) {
                        //datetime should also support the isbefore or other type of validate
                        $this->addField($field, '', $prefix,'',$translate);
                    }
			    } else if (isset($value['type'])) {
					if ($value['type'] != 'link') {
			  			$this->addField($field, '', $prefix,'',$translate);
					}
				}
			}
		}
	}

	function getScript($showScriptTag = true, $clearValidateFields = true){
		$tempScript = $this->script;
		$this->script = "";
		if($showScriptTag){
			$this->script = "<script type=\"text/javascript\">\n";
		}

        if($clearValidateFields){
            $this->script .= "addForm('{$this->formname}');";
        }
  
		$this->script .= $tempScript;

		if($showScriptTag){
			$this->script .= "</script>";
		}
		return $this->script;
	}

    function buildStringToTranslateInSmarty(
        $string
        )
    {
        if ( is_array($string) ) {
            $returnstring = '';
            foreach ( $string as $astring )
                $returnstring .= $this->buildStringToTranslateInSmarty($astring);
            return $returnstring;
        }
        return "{/literal}{sugar_translate label='$string' module='{$this->sugarbean->module_dir}' for_js=true}{literal}";
    }

    protected function getRequiredString($required)
    {
        if (is_string($required) && strtolower($required) == "false")
        {
            return "false";
        }
        return empty($required) ? "false" : "true";
    }
}
?>
