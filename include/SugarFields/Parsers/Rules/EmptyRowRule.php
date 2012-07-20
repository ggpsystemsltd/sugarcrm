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
 * EmptyRowRule.php
 * 
 * This is a utility base class to provide further refinement when converting 
 * pre 5.x files to the new meta-data rules.  This rule goes through the panels
 * and deletes rows for which there are no fields.
 *
 * @author Collin Lee
 */
 
require_once('include/SugarFields/Parsers/Rules/BaseRule.php');
 
class EmptyRowRule extends BaseRule {

function EmptyRowRule() {
	
}


function parsePanels($panels, $view) {

   foreach($panels as $name=>$panel) {

   	  foreach($panel as $rowCount=>$row) {
         $emptyCount = 0;

   	  	 foreach($row as $key=>$column) {
   	  	 	if(is_array($column) && (!isset($column['name']) || empty($column['name']))) {             
   	  	 	    $emptyCount++;
   	  	 	} else if(!is_array($column) && (!isset($column) || empty($column))) {
				$emptyCount++;
   	  	 	}
   	  	 } //foreach
   	  	 
	  	 // If we have unset everything, then just remove the whole row entirely
   	  	 if($emptyCount == count($row)) {
   	  	 	unset($panels[$name][$rowCount]);
   	  	 	continue;
   	  	 } else if(count($row) > 2) {
   	  	    foreach($row as $key=>$column) {
   	  	        if(empty($column) || $column == '') {
   	  	           unset($panels[$name][$rowCount][$key]);
   	  	        }	
   	  	    }
   	  	 }
   	  } //foreach  
   } //foreach
   
   return $panels;
}

}
?>
