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



class SugarWidgetFieldDate extends SugarWidgetFieldDateTime
{
    function displayList($layout_def)
    {
        global $timedate;
        // i guess qualifier and column_function are the same..
        if (! empty($layout_def['column_function'])) {
            $func_name = 'displayList'.$layout_def['column_function'];
            if ( method_exists($this,$func_name)) {
                $display = $this->$func_name($layout_def);
                return $display;
            }
        }
        $content = $this->displayListPlain($layout_def);
		return $content;
    }

    function queryFilterBefore($layout_def)
    {
        return $this->queryDateOp($this->_get_column_select($layout_def), $layout_def['input_name0'], "<", "date");
    }

    function queryFilterAfter($layout_def)
    {
        return $this->queryDateOp($this->_get_column_select($layout_def), $layout_def['input_name0'], ">", "date");
    }

    function queryFilterNot_Equals_str($layout_def)
    {
        $column = $this->_get_column_select($layout_def);
        return "($column IS NULL OR ".$this->queryDateOp($column, $layout_def['input_name0'], '!=', "date").")\n";
    }

    function queryFilterOn($layout_def)
    {
        return $this->queryDateOp($this->_get_column_select($layout_def), $layout_def['input_name0'], "=", "date");
    }

    function queryFilterBetween_Dates(& $layout_def)
    {
        $begin = $layout_def['input_name0'];
        $end = $layout_def['input_name1'];
        $column = $this->_get_column_select($layout_def);

        return "(".$this->queryDateOp($column, $begin, ">=", "date")." AND ".
            $this->queryDateOp($column, $end, "<=", "date").")\n";
    }

	function queryFilterTP_yesterday($layout_def)
	{
		global $timedate;
        $layout_def['input_name0'] = $timedate->asDbDate($timedate->getNow(true)->get("-1 day"));
        return $this->queryFilterOn($layout_def);
	}

	function queryFilterTP_today($layout_def)
	{
		global $timedate;
        $layout_def['input_name0'] = $timedate->asDbDate($timedate->getNow(true));
        return $this->queryFilterOn($layout_def);
	}

	function queryFilterTP_tomorrow(& $layout_def)
	{
		global $timedate;
		$layout_def['input_name0'] = $timedate->asDbDate($timedate->getNow(true)->get("+1 day"));
        return $this->queryFilterOn($layout_def);
	}

}
