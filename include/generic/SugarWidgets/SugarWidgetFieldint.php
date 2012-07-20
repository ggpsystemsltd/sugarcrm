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



class SugarWidgetFieldInt extends SugarWidgetReportField
{
 function displayList($layout_def)
 {

 	return $this->displayListPlain($layout_def);
 }

 function queryFilterEquals(&$layout_def)
 {
                return $this->_get_column_select($layout_def)."= '".$GLOBALS['db']->quote($layout_def['input_name0'])."'\n";
 }

 function queryFilterNot_Equals(&$layout_def)
 {
                return $this->_get_column_select($layout_def)."!='".$GLOBALS['db']->quote($layout_def['input_name0'])."'\n";
 }

 function queryFilterGreater(&$layout_def)
 {
                return $this->_get_column_select($layout_def)." > '".$GLOBALS['db']->quote($layout_def['input_name0'])."'\n";
 }

 function queryFilterLess(&$layout_def)
 {
                return $this->_get_column_select($layout_def)." < '".$GLOBALS['db']->quote($layout_def['input_name0'])."'\n";
 }

 function queryFilterBetween(&$layout_def)
 {
 	             return $this->_get_column_select($layout_def)." BETWEEN '".$GLOBALS['db']->quote($layout_def['input_name0']). "' AND '" . $GLOBALS['db']->quote($layout_def['input_name1']) . "'\n";
 }

 function queryFilterStarts_With(&$layout_def)
 {
 	return $this->queryFilterEquals($layout_def);
 }

 function displayInput(&$layout_def)
 {
 	 return '<input type="text" size="20" value="' . $layout_def['input_name0'] . '" name="' . $layout_def['name'] . '">';

 }
 
 function display($layout_def)
 {
	   //Bug40995
	   if(isset($obj->layout_manager->defs['reporter']->focus->field_name_map[$layout_def['name']]['precision']))
	   {
		   $precision=$obj->layout_manager->defs['reporter']->focus->field_name_map[$layout_def['name']]['precision'];
		   $layout_def['precision']=$precision;
	   }
	   //Bug40995
       return parent::display($layout_def);
 } 

}

?>
