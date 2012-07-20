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

class ContactsParseRule extends BaseRule {

function ContactsParseRule() {
	
}


function preParse($panels, $view) {
	
	if($view == 'DetailView') {
		foreach($panels as $name=>$panel) {
		   	  foreach($panel as $rowCount=>$row) {
		   	  	 foreach($row as $key=>$column) {
		   	  	 	if($this->matches($column, '/^(last_)?name$/')) {
		   	  	 	   $panels[$name][$rowCount][$key] = 'full_name';
		   	  	 	}
				} //foreach 
		   	} //foreach
	    } //foreach
	}
	
	return $panels;		
}

function parsePanels(& $panels, $view) {

       if($view == 'EditView') {
		   foreach($panels as $name=>$panel) {
		   	  foreach($panel as $rowCount=>$row) {
		   	  	 foreach($row as $key=>$column) {
					if($this->matches($column, '/portal_password1/si')) {
		   	  	 	   $panels[$name][$rowCount][$key] = array('name'=>'portal_password1', 'type'=>'password', 'customCode'=>'<input id="portal_password1" name="portal_password1" type="password" size="32" maxlength="32" value="{$fields.portal_password.value}">', 'label'=>'LBL_PORTAL_PASSWORD');
					}
		   	  	 } //foreach 
		   	  } //foreach
		   } //foreach
       }
	   return $panels;	
}
	
}
?>
