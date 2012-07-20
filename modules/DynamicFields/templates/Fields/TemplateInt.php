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

require_once('modules/DynamicFields/templates/Fields/TemplateRange.php');

class TemplateInt extends TemplateRange
{
	var $type = 'int';
    var $supports_unified_search = true;

	function __construct(){
		parent::__construct();
		$this->vardef_map['autoinc_next'] = 'autoinc_next';
		$this->vardef_map['autoinc_start'] = 'autoinc_start';
		$this->vardef_map['auto_increment'] = 'auto_increment';
	}

	function get_html_edit(){
		$this->prepare();
		return "<input type='text' name='". $this->name. "' id='".$this->name."' title='{" . strtoupper($this->name) ."_HELP}' size='".$this->size."' maxlength='".$this->len."' value='{". strtoupper($this->name). "}'>";
	}

	function populateFromPost(){
		parent::populateFromPost();
		if (isset($this->auto_increment))
		{
		    $this->auto_increment = $this->auto_increment == "true" || $this->auto_increment === true;
		}
	}

    function get_field_def(){
		$vardef = parent::get_field_def();
		$vardef['disable_num_format'] = isset($this->disable_num_format) ? $this->disable_num_format : $this->ext3;//40005
		if(!empty($this->ext2)){
		    $min = (!empty($this->ext1))?$this->ext1:0;
		    $max = $this->ext2;
		    $vardef['validation'] = array('type' => 'range', 'min' => $min, 'max' => $max);
		}
		if(!empty($this->auto_increment))
		{
			$vardef['auto_increment'] = $this->auto_increment;
			if ((empty($this->autoinc_next)) && isset($this->module) && isset($this->module->table_name))
			{
				global $db;
                $helper = $db->gethelper();
                $auto = $helper->getAutoIncrement($this->module->table_name, $this->name);
                $this->autoinc_next = $vardef['autoinc_next'] = $auto;
			}
		}
		return $vardef;
    }

    function save($df){
        $next = false;
		if (!empty($this->auto_increment) && (!empty($this->autoinc_next) || !empty($this->autoinc_start)) && isset($this->module))
        {
            if (!empty($this->autoinc_start) && $this->autoinc_start > $this->autoinc_next)
			{
				$this->autoinc_next = $this->autoinc_start;
			}
			if(isset($this->module->table_name)){
				global $db;
	            $helper = $db->gethelper();
	            //Check that the new value is greater than the old value
	            $oldNext = $helper->getAutoIncrement($this->module->table_name, $this->name);
	            if ($this->autoinc_next > $oldNext)
	            {
	                $helper->setAutoIncrementStart($this->module->table_name, $this->name, $this->autoinc_next);
				}
			}
			$next = $this->autoinc_next;
			$this->autoinc_next = false;
        }
		parent::save($df);
		if ($next)
		  $this->autoinc_next = $next;
    }
}


?>
