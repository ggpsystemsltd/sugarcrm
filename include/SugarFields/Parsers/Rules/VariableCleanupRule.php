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


/**
 * VariableCleanupRule.php
 * 
 * This is a utility base class to provide further refinement when converting 
 * pre 5.x files to the new meta-data rules.
 *
 * @author Collin Lee
 */
 
require_once('include/SugarFields/Parsers/Rules/BaseRule.php');
 
class VariableCleanupRule extends BaseRule {

function VariableCleanupRule() {
	
}

function parsePanels($panels, $view) {

   if($view == 'DetailView') {
		foreach($panels as $name=>$panel) {
	   	  foreach($panel as $rowCount=>$row) {
	   	  	 foreach($row as $key=>$column) {
	   	  	 	//This converts variable ended with "_c_checked" to just "_c" (for checkboxes in DetailView)
				if(!is_array($column) && isset($column) && preg_match('/(.*?)_c_checked$/s', $column, $matches)) {
	   	  	 	   if(count($matches) == 2) {
	   	  	 	      $panels[$name][$rowCount][$key] = $matches[1] . "_c";
	   	  	 	   }
	   	  	 	} else if($this->matches($column, '/^parent_id$/si')) {
	   	  	 		  $panels[$name][$rowCount][$key] = '';
				} else if($this->matches($column, '/^assigned_user_id$/si')) {
	   	  	 	   $panels[$name][$rowCount][$key] = '';	
	   	  	 	}
	   	  	 } //foreach 
	   	  } //foreach
	   } //foreach
	   
   } else if ($view == 'EditView') {
   	    
		foreach($panels as $name=>$panel) {
	   	  foreach($panel as $rowCount=>$row) {
	   	  	 foreach($row as $key=>$column) {
	   	  	 	if($this->matches($column, '/^(.*?)_c\[\]$/s')) {
	   	  	 	   //This converts multienum variables named with [] suffix back to normal and removes custom code
	   	  	 	   $val = $this->getMatch($column, '/^(.*?)_c\[\]$/s');
	   	  	 	   $panels[$name][$rowCount][$key] = $val[1] . '_c';
	   	  	 	} else if($this->matches($column, '/^parent_id$/si')) {
	   	  	 	   //Remove parent_id field (replaced with parent_name from master copy)
	   	  	 	   $panels[$name][$rowCount][$key] = '';	
	   	  	 	} else if($this->matches($column, '/^assigned_user_id$/si')) {
	   	  	 	   //Remove assigned_user_id field (replaced with assigned_user_name from master copy)
	   	  	 	   $panels[$name][$rowCount][$key] = '';	
	   	  	 	} else if($this->matches($column, '/^RADIOOPTIONS_/si')) {
	   	  	 	   //This converts radioenum variables
	   	  	 	   $val = $this->getMatch($column, '/^RADIOOPTIONS_(.*)?$/si');
	   	  	 	   $panels[$name][$rowCount][$key] = $val[1];
	   	  	 	}
	   	  	 } //foreach
	   	  } //foreach
	   } //foreach   	
   }
   
   return $panels;
}

}

?>
