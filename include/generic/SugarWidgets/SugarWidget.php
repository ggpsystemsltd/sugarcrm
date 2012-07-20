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


//TODO move me out of generic



/**
 * Generic Sugar widget
 * @api
 */
class SugarWidget
{
	var $layout_manager = null;
	var $widget_id;

	function SugarWidget(&$layout_manager)
	{
		$this->layout_manager = $layout_manager;
	}
	function display(&$layout_def)
	{
		return 'display class undefined';
	}

	/**
	 * getSubpanelWidgetId
	 * This is a utility function to return a widget's unique id
	 * @return id String label of the widget's unique id
	 */
	public function getWidgetId() {
	   return $this->widget_id;
	}

	/**
	 * setSubpanelWidgetId
	 * This is a utility function to set the id for a widget
	 * @param id String value to set the widget's unique id
	 */
	public function setWidgetId($id='') {
		$this->widget_id = $id;
	}

   /**
    * getTruncatedColumnAlias
    * This function ensures that a column alias is no more than 28 characters.  Should the column_name
    * argument exceed 28 charcters, it creates an alias using the first 22 characters of the column_name
    * plus an md5 of the first 6 characters of the lowercased column_name value.
    *
    */
    protected function getTruncatedColumnAlias($column_name)
    {
	  	if(empty($column_name) || !is_string($column_name) || strlen($column_name) < 28)
	  	{
	  	   return $column_name;
	  	}
	    return strtoupper(substr($column_name,0,22) . substr(md5(strtolower($column_name)), 0, 6));
    }
}

?>