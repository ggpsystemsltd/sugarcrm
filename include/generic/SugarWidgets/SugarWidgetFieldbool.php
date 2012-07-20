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


class SugarWidgetFieldBool extends SugarWidgetReportField
{

 function queryFilterEquals(&$layout_def)
 {

		$bool_val = $layout_def['input_name0'][0];
		if ($bool_val == 'yes' || $bool_val == '1')
		{
			return "(".$this->_get_column_select($layout_def)." LIKE 'on' OR ".$this->_get_column_select($layout_def)."='1')\n";
		} else {
			//return "(".$this->_get_column_select($layout_def)." is null OR ".$this->_get_column_select($layout_def)."='0' OR ".$this->_get_column_select($layout_def)."='off')\n";
            return "(".$this->_get_column_select($layout_def)." is null OR ". $this->_get_column_select($layout_def)."='0')\n";            
		}
 }

    function displayListPlain($layout_def)
    {
        $value = $this->_get_list_value($layout_def);
        $module = $this->reporter->all_fields[$layout_def['column_key']]['module'];
        $name = $layout_def['name'];
        $layout_def['name'] = 'id';
        $key = $this->_get_column_alias($layout_def);
        $key = strtoupper($key);
        
        if(empty($layout_def['fields'][$key]))
        {
            $layout_def['name'] = $name;
            global $app_list_strings;
            if (empty($value)) {
                $value = $app_list_strings['dom_switch_bool']['off'];
            }   
            else {
                $value = $app_list_strings['dom_switch_bool']['on'];
            } 
            return $value;
        }

        $on_or_off = 'CHECKED';
        if ( empty($value) ||  $value == 'off')
        {
            $on_or_off = '';
        }
        $cell = "<input name='checkbox_display' class='checkbox' type='checkbox' disabled $on_or_off>";
        return  $cell;
    }
    
 function queryFilterStarts_With(&$layout_def)
 {
    return $this->queryFilterEquals($layout_def);
 }    
 
    function displayInput(&$layout_def) 
    {
        global $app_strings;
        
        $yes = $no = $default = '';
        if (isset($layout_def['input_name0']) && $layout_def['input_name0'] == 1) {
            $yes = ' selected="selected"';
        }
        elseif (isset($layout_def['input_name0']) && $layout_def['input_name0'] == 'off') {
            $no = ' selected="selected"';
        }
        else {
            $default = ' selected="selected"';
        }
        
        $str = <<<EOHTML
<select id="{$layout_def['name']}" name="{$layout_def['name']}">
 <option value="" {$default}></option>
 <option value = "off" {$no}> {$app_strings['LBL_SEARCH_DROPDOWN_NO']}</option>
 <option value = "1" {$yes}> {$app_strings['LBL_SEARCH_DROPDOWN_YES']}</option>
</select>
EOHTML;
        
        return $str;
    }
    

}

?>
