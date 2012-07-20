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






class SugarWidgetFieldName extends SugarWidgetFieldVarchar
{

    function SugarWidgetFieldName(&$layout_manager) {
        parent::SugarWidgetFieldVarchar($layout_manager);
        $this->reporter = $this->layout_manager->getAttribute('reporter');
    }

	function displayList(&$layout_def)
	{
		if(empty($layout_def['column_key']))
		{
			return $this->displayListPlain($layout_def);
		}

		$module = $this->reporter->all_fields[$layout_def['column_key']]['module'];
		$name = $layout_def['name'];
		$layout_def['name'] = 'id';
		$key = $this->_get_column_alias($layout_def);
		$key = strtoupper($key);

		if(empty($layout_def['fields'][$key]))
		{
		  $layout_def['name'] = $name;
			return $this->displayListPlain($layout_def);
		}

		$record = $layout_def['fields'][$key];
		$layout_def['name'] = $name;
		global $current_user;
		if ($module == 'Users' && !is_admin($current_user))
        	$module = 'Employees';
		$str = "<a target='_blank' href=\"index.php?action=DetailView&module=$module&record=$record\">";
		$str .= $this->displayListPlain($layout_def);
		$str .= "</a>";
       global $beanList;
       $tempBean = new $beanList[$module]();
        //only present edit link if user has save access
       if($tempBean->ACLAccess('Save')){
            //if the module is employee or users, make an additional check to make sure current user is an admin
            if(!(($module == 'Users' || $module == 'Employees') && !is_admin($current_user))){
               $str .= " <a href=\"#\" data-record=$record data-module=$module class=\"quickEdit\"' ><img border=\"0\" src=\"themes/Sugar/images/edit_inline.png\"></a>";

             }
       }



        global $sugar_config;
        if (isset ($sugar_config['enable_inline_reports_edit']) && $sugar_config['enable_inline_reports_edit'] && !empty($record)) {
            $div_id = "$module&$record&$name";
            $str = "<div id='$div_id'><a target='_blank' href=\"index.php?action=DetailView&module=$module&record=$record\">";
            $value = $this->displayListPlain($layout_def);
            $str .= $value;
            $field_name = $layout_def['name'];
            $field_type = $field_def['type'];
            $str .= "</a>";
            if ($field_name == 'name')
                $str .= "&nbsp;" .SugarThemeRegistry::current()->getImage("edit_inline","border='0' alt='Edit Layout' align='bottom' onClick='SUGAR.reportsInlineEdit.inlineEdit(\"$div_id\",\"$value\",\"$module\",\"$record\",\"$field_name\",\"$field_type\");'");
            $str .= "</div>";
        }
		return $str;
	}

	function _get_normal_column_select($layout_def)
	{
        if ( isset($this->reporter->all_fields) ) {
            $field_def = $this->reporter->all_fields[$layout_def['column_key']];
        } else {
            $field_def = array();
        }

		if (empty($field_def['fields']) || empty($field_def['fields'][0]) || empty($field_def['fields'][1]))
		{
			return parent::_get_column_select($layout_def);
		}

		//	 'fields' are the two fields to concat to create the name
		if ( ! empty($layout_def['table_alias'])) {
		    $alias = $this->reporter->db->concat($layout_def['table_alias'], $field_def['fields']);
		} elseif (! empty($layout_def['name'])) {
			$alias = $layout_def['name'];
		} else {
			$alias = "*";
		}

		return $alias;
	}

	function _get_column_select($layout_def)
	{
		global $locale, $current_user;

        if ( isset($this->reporter->all_fields) ) {
            $field_def = $this->reporter->all_fields[$layout_def['column_key']];
        } else {
            $field_def = array();
        }

        //	 'fields' are the two fields to concat to create the name
        if(!isset($field_def['fields']))
        {
			return $this->_get_normal_column_select($layout_def);
        }
		$localeNameFormat = $locale->getLocaleFormatMacro($current_user);
		$localeNameFormat = trim(preg_replace('/s/i', '', $localeNameFormat));

		if (empty($field_def['fields']) || empty($field_def['fields'][0]) || empty($field_def['fields'][1])) {
			return parent::_get_column_select($layout_def);
		}

		if ( ! empty($layout_def['table_alias'])) {
		    $comps = preg_split("/([fl])/", $localeNameFormat, null, PREG_SPLIT_DELIM_CAPTURE);
		    $name = array();
		    foreach($comps as $val) {
		        if($val == 'f') {
		            $name[] = $this->reporter->db->convert($layout_def['table_alias'].".".$field_def['fields'][0], 'IFNULL', array("''"));
		        } elseif($val == 'l') {
		            $name[] = $this->reporter->db->convert($layout_def['table_alias'].".".$field_def['fields'][1], 'IFNULL', array("''"));
		        } else {
		            if(!empty($val)) {
		                $name[] = $this->reporter->db->quoted($val);
		            }
		        }
		    }
		    $alias = $this->reporter->db->convert($name, "CONCAT");
		} elseif (! empty($layout_def['name']))	{
			$alias = $layout_def['name'];
		} else {
			$alias = "*";
		}

		return $alias;
	}

	function queryFilterIs($layout_def)
	{

		$layout_def['name'] = 'id';
		$layout_def['type'] = 'id';
		$input_name0 = $layout_def['input_name0'];

		if ( is_array($layout_def['input_name0']))
		{
			$input_name0 = $layout_def['input_name0'][0];
		}
		if ($input_name0 == 'Current User') {
			global $current_user;
			$input_name0 = $current_user->id;
		}

		return SugarWidgetFieldid::_get_column_select($layout_def)."="
			.$this->reporter->db->quoted($input_name0)."\n";
	}

	function queryFilteris_not($layout_def)
	{

		$layout_def['name'] = 'id';
		$layout_def['type'] = 'id';
		$input_name0 = $layout_def['input_name0'];

		if ( is_array($layout_def['input_name0']))
		{
			$input_name0 = $layout_def['input_name0'][0];
		}
		if ($input_name0 == 'Current User') {
			global $current_user;
			$input_name0 = $current_user->id;
		}

		return SugarWidgetFieldid::_get_column_select($layout_def)."<>"
			.$this->reporter->db->quoted($input_name0)."\n";
	}

    // $rename_columns, if true then you're coming from reports
	function queryFilterone_of($layout_def, $rename_columns = true)
	{

        if($rename_columns) { // this was a hack to get reports working, sugarwidgets should not be renaming $name!
    		$layout_def['name'] = 'id';
    		$layout_def['type'] = 'id';
        }
		$arr = array();

		foreach($layout_def['input_name0'] as $value)
		{
			if ($value == 'Current User') {
				global $current_user;
				array_push($arr,$this->reporter->db->quoted($current_user->id));
			}
			else
				array_push($arr,$this->reporter->db->quoted($value));
		}

		$str = implode(",",$arr);

		return SugarWidgetFieldid::_get_column_select($layout_def)." IN (".$str.")\n";
	}
    // $rename_columns, if true then you're coming from reports
	function queryFilternot_one_of($layout_def, $rename_columns = true)
	{

        if($rename_columns) { // this was a hack to get reports working, sugarwidgets should not be renaming $name!
    		$layout_def['name'] = 'id';
    		$layout_def['type'] = 'id';
        }
		$arr = array();

		foreach($layout_def['input_name0'] as $value)
		{
			if ($value == 'Current User') {
				global $current_user;
				array_push($arr,$this->reporter->db->quoted($current_user->id));
			}
			else
				array_push($arr,$this->reporter->db->quoted($value));
		}

		$str = implode(",",$arr);

		return SugarWidgetFieldid::_get_column_select($layout_def)." NOT IN (".$str.")\n";
	}

	function &queryGroupBy($layout_def)
	{
        if($layout_def['name'] == 'full_name') {
             $layout_def['name'] = 'id';
             $layout_def['type'] = 'id';

             $group_by =  SugarWidgetFieldid::_get_column_select($layout_def)."\n";
        } else {
            // group by clause for user name passes through here.
             $group_by = $this->_get_column_select($layout_def)."\n";
        }
        return $group_by;
	}
}

?>
