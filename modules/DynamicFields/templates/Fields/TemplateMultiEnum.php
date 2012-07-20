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

require_once('modules/DynamicFields/templates/Fields/TemplateEnum.php');
require_once('include/utils/array_utils.php');
class TemplateMultiEnum extends TemplateEnum{
	var $type = 'text';

	function get_html_edit(){
		$this->prepare();
		$xtpl_var = strtoupper( $this->name);
		// MFH BUG#13645
		return "<input type='hidden' name='". $this->name. "' value='0'><select name='". $this->name . "[]' size='5' title='{" . $xtpl_var ."_HELP}' MULTIPLE=true>{OPTIONS_".$xtpl_var. "}</select>";
	}

	function get_xtpl_edit(){
		$name = $this->name;
		$value = '';
		if(isset($this->bean->$name)){
			$value = $this->bean->$name;
		}else{
			if(empty($this->bean->id)){
				$value= $this->default_value;
			}
		}
		if(!empty($this->help)){
		    $returnXTPL[strtoupper($this->name . '_help')] = translate($this->help, $this->bean->module_dir);
		}

		global $app_list_strings;
		$returnXTPL = array();

		$returnXTPL[strtoupper($this->name)] = str_replace('^,^', ',', $value);
		if(empty($this->ext1)){
			$this->ext1 = $this->options;
		}
		$returnXTPL[strtoupper('options_'.$this->name)] = get_select_options_with_id($app_list_strings[$this->ext1], unencodeMultienum( $value));

		return $returnXTPL;


	}
	function prepSave(){

	}
	function get_xtpl_list(){
		return $this->get_xtpl_detail();

	}
	function get_xtpl_detail(){

		$name = $this->name;
		$value = '';
		if(isset($this->bean->$name)){
			$value = $this->bean->$name;
		}else{
			if(empty($this->bean->id)){
				$value= $this->default_value;
			}
		}
		$returnXTPL = array();
		if(empty($value)) return $returnXTPL;
		global $app_list_strings;

        $values = unencodeMultienum( $value);
        $translatedValues = array();

        foreach($values as $val){
            $translated = translate($this->options, '', $val);
            if(is_string($translated))$translatedValues[] = $translated;
        }

		$returnXTPL[strtoupper($this->name)] = implode(', ', $translatedValues);
		return $returnXTPL;




}

	function get_field_def(){
		$def = parent::get_field_def();
		if ( !empty ( $this->ext4 ) )
		{
			// turn off error reporting in case we are unpacking a value that hasn't been packed...
			// this is kludgy, but unserialize doesn't throw exceptions correctly
			if($this->ext4[0] == 'a' && $this->ext4[1] == ':') {
			    $unpacked = @unserialize ( $this->ext4 ) ;
			} else {
			    $unpacked = false;
			}

			// if we have a new error, then unserialize must have failed => we don't have a packed ext4
			// safe to assume that false means the unpack failed, as ext4 will either contain an imploded string of default values, or an array, not a boolean false value
			if ( $unpacked === false && !isset($this->no_default) ) {
				$def [ 'default' ] = $this->ext4 ;
			}
			else
			{
				// we have a packed representation containing one or both of default and dependency
                if ( isset ( $unpacked [ 'default' ] ) && !isset($this->no_default))
					$def [ 'default' ] = $unpacked [ 'default' ] ;
				if ( isset ( $unpacked [ 'dependency' ] ) )
					$def [ 'dependency' ] = $unpacked [ 'dependency' ] ;
			}
		}
		$def['isMultiSelect'] = true;
		unset($def['len']);
		return $def;
	}

	function get_db_default(){
    	return '';
	}

	function save($df) {
		if ( isset ( $this->default ) )
		{
			if ( is_array ( $this->default ) )
				$this->default = encodeMultienumValue($this->default);
			$this->ext4 = ( isset ( $this->dependency ) ) ? serialize ( array ( 'default' => $this->default , 'dependency' => html_entity_decode($this->dependency) ) )  : $this->default ;
		} else
		{
			if ( isset ( $this->dependency ) )
				$this->ext4 = serialize ( array ( 'dependency' => html_entity_decode($this->dependency) ) ) ;
		}
		parent::save($df);
	}
}


?>
