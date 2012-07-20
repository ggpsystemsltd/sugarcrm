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


class TemplateHTML extends TemplateField{
    var $data_type = 'html';
    var $type = 'html';
    
    function save($df){
		$this->ext3 = 'text';
		parent::save($df);
	}
	
	function set($values){
       parent::set($values);
       if(!empty($this->ext4)){
           $this->default_value = $this->ext4;
           $this->default = $this->ext4;
       }
        
    }
    
    function get_html_detail(){
      
        return '<div title="' . strtoupper($this->name . '_HELP'). '" >{'.strtoupper($this->name) . '}</div>';
    }
    
    function get_html_edit(){
        return $this->get_html_detail();
    }
    
    function get_html_list(){
        return $this->get_html_detail();
    }
    
    function get_html_search(){
        return $this->get_html_detail();
    }
    
    function get_xtpl_detail(){
        
        return from_html(nl2br($this->ext4));   
    }
    
    function get_xtpl_edit(){
       return  $this->get_xtpl_detail();
    }
    
    function get_xtpl_list(){
        return  $this->get_xtpl_detail();
    }
    function get_xtpl_search(){
        return  $this->get_xtpl_detail();
    }
    
    function get_db_add_alter_table($table){
        return '';
    }

    function get_db_modify_alter_table($table){
        return '';
    }
    

    function get_db_delete_alter_table($table)
    {
        return '' ;
    }
    
    function get_field_def() {
        $def = parent::get_field_def();
        if(!empty($this->ext4)){
       		$def['default_value'] = $this->ext4;
        	$def['default'] = $this->ext4;
        }
        $def['studio'] = 'visible';
        $def['source'] = 'non-db';
		$def['dbType'] = isset($this->ext3) ? $this->ext3 : 'text' ;
        return array_merge($def, $this->get_additional_defs());
    }
    
    
}


?>
