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

require_once('include/SugarFields/Parsers/Rules/BaseRule.php');

class CampaignsParseRule extends BaseRule {

function CampaignsParseRule() {
	
}

function preParse($panels, $view) {
	if($view == 'EditView') {
	    $frequencyAdded = false;
		foreach($panels as $name=>$panel) {
		   	foreach($panel as $rowCount=>$row) {
		   	  	 foreach($row as $key=>$column) {
		   	  	 	 if(empty($column) && !$frequencyAdded) {
		   	  	 	 	//Add the frequency label
		   	  	 	    $panels[$name][$rowCount][$key] = 'frequency';
		   	  	 	    $frequencyAdded = true;
		   	  	 	 } else if($this->matches($column, '/^deleted$/')) {
		   	  	 	 	//This is to fix the error where the Created By field
		   	  	 	 	//in Campaigns EditView.html actually references the deleted field
		   	  	 	 	//We will just remove the field since you shouldn't be able to edit this information anyway
		   	  	 	 	$panels[$name][$rowCount][$key] = '';
		   	  	 	 }
		   	  	 } //foreach 
		   	} //foreach
		} //foreach
		
		//If all the row/columns were taken up, then add frequency as a last row
		if(!$frequencyAdded) {
		   $panels['default'][][] = 'frequency';
		}
	}
	return $panels;	
}
	
}
?>