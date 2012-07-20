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


class TemplateURL extends TemplateText{

    var $supports_unified_search = true;

	function __construct()
	{
		$this->vardef_map['ext4'] = 'link_target';
		$this->vardef_map['link_target'] = 'ext4';
	}
	
	var $type='url';
    function get_html_edit(){
        $this->prepare();
        return "<input type='text' name='". $this->name. "' id='".$this->name."' size='".$this->size."' title='{" . strtoupper($this->name) ."_HELP}' value='{". strtoupper($this->name). "}'>";
    }
    
    function get_html_detail(){ 
        $xtpl_var = strtoupper($this->name);
        return "<a href='{" . $xtpl_var . "}' target='_blank'>{" . $xtpl_var . "}</a>";
    }
    
    function get_xtpl_detail(){
        $value = parent::get_xtpl_detail();
        if(!empty($value) && substr_count($value, '://') == 0 && substr($value ,0,8) != 'index.php'){
            $value = 'http://' . $value;
        }
        return $value;
    }

	function get_field_def(){
		$def = parent::get_field_def();
		//$def['options'] = !empty($this->options) ? $this->options : $this->ext1;
		$def['default'] = !empty($this->default) ? $this->default : $this->default_value;
		$def['len'] = $this->len;
		$def['dbType'] = 'varchar';
		$def['gen'] = !empty($this->gen) ? $this->gen : $this->ext3;
        $def['link_target'] = !empty($this->link_target) ? $this->link_target : $this->ext4;
		return $def;	
	} 

}
?>
