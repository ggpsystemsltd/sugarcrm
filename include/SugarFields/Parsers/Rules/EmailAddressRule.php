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
 * EmailAddressRule.php
 * 
 * This is a utility base class to provide further refinement when converting 
 * pre 5.x files to the new meta-data rules.  We basically scan for email1 or
 * email2 defined outside of the email address panel and remove it.
 *
 * @author Collin Lee
 */
 
require_once('include/SugarFields/Parsers/Rules/BaseRule.php');
 
class EmailAddressRule extends BaseRule {

function EmailAddressRule() {
	
}

function parsePanels(& $panels, $view) {

   if($view == 'DetailView') {

		foreach($panels as $name=>$panel) {

	   	  if(preg_match('/lbl_email_addresses/si', $name)) {
	   	  	 continue;
	   	  }
			
	   	  foreach($panel as $rowCount=>$row) {
	   	  	 foreach($row as $key=>$column) {
	   	  	 	
                if($this->isCustomField($column)) {
                   continue;	
                } else if(is_array($column) && !empty($column['name']) && preg_match('/^email(s|2)$/si', $column['name']) && !isset($column['type'])) {             
		           $panels[$name][$rowCount][$key] = '';
                } else if($this->matches($column, '/^email[1]_link$/si')) {
                   $panels[$name][$rowCount][$key] = 'email1';
	   	  	 	} else if($this->matches($column, '/^email[2]_link$/si')) {
	   	  	 	   $panels[$name][$rowCount][$key] = '';
	   	  	 	} else if(!is_array($column) && !empty($column)) {
	   	  	 	   if(preg_match('/^email(s|2)$/si', $column) ||
	   	  	 	      preg_match('/^invalid_email$/si', $column) ||
	   	  	 	      preg_match('/^email_opt_out$/si', $column) ||
	   	  	 	      preg_match('/^primary_email$/si', $column)) {
	   	  	 	   	  $panels[$name][$rowCount][$key] = '';
	   	  	 	   }
	   	  	 	}

	   	  	 } //foreach
	   	  } //foreach
	   } //foreach
   
   } else if($view == 'EditView') {

		foreach($panels as $name=>$panel) {

	   	  if(preg_match('/lbl_email_addresses/si', $name)) {
	   	  	 continue;
	   	  }
	   	
	   	  foreach($panel as $rowCount=>$row) {
	   	  	 foreach($row as $key=>$column) {

                if($this->isCustomField($column)) {
                   continue;	
                }

                if($this->matches($column, '/email(s)*?([1|2])*?/si')) {
                   $panels[$name][$rowCount][$key] = '';
                }

	   	  	 } //foreach

	   	  } //foreach
	   } //foreach
   }
   

   return $panels;
}

}

?>
