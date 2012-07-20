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













class FieldsMetaData extends SugarBean {
	// database table columns
	var $id;
	var $name;
	var $vname;
  	var $custom_module;
  	var $type;
  	var $len;
  	var $required;
  	var $default_value;
  	var $deleted;
  	var $ext1;
  	var $ext2;
  	var $ext3;
	var $audited;
    var $duplicate_merge;
    var $reportable;
	var $required_fields =  array("name"=>1, "date_start"=>2, "time_start"=>3,);

	var $table_name = 'fields_meta_data';
	var $object_name = 'FieldsMetaData';
	var $module_dir = 'DynamicFields';
	var $column_fields = array(
		'id',
		'name',
		'vname',
		'custom_module',
		'type',
		'len',
		'required',
		'default_value',
		'deleted',
		'ext1',
		'ext2',
		'ext3',
		'audited',
		'massupdate',
        'duplicate_merge',
        'reportable',
	);

	var $list_fields = array(
		'id',
		'name',
		'vname',
		'type',
		'len',
		'required',
		'default_value',
		'audited',
		'massupdate',
        'duplicate_merge',
        'reportable',
	);

	var $field_name_map;
	var $new_schema = true;

	//////////////////////////////////////////////////////////////////
	// METHODS
	//////////////////////////////////////////////////////////////////

	function FieldsMetaData()
	{
		parent::SugarBean();
		$this->disable_row_level_security = true;
	}
	
	function mark_deleted($id)
	{
		$query = "DELETE FROM $this->table_name WHERE  id='$id'";
		$this->db->query($query, true,"Error deleting record: ");
		$this->mark_relationships_deleted($id);

	}
	
	function get_list_view_data(){
	    $data = parent::get_list_view_data();
	    $data['VNAME'] = translate($this->vname, $this->custom_module);
	    $data['NAMELINK'] = '<input class="checkbox" type="checkbox" name="remove[]" value="' . $this->id . '">&nbsp;&nbsp;<a href="index.php?module=Studio&action=wizard&wizard=EditCustomFieldsWizard&option=EditCustomField&record=' . $this->id . '" >';
	    return $data;
	}


	function get_summary_text()
	{
		return $this->name;
	}
}
?>
