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
 * VariableSubstitutionRule.php
 * 
 * This is a utility base class to provide further refinement when converting 
 * pre 5.x files to the new meta-data rules.  This rule substitutes the current
 * definitions will the standard meta-data ones.
 *
 * @author Collin Lee
 */
 
require_once('include/SugarFields/Parsers/Rules/BaseRule.php');
 
class VariableSubstitutionRule extends BaseRule {

function VariableSubstitutionRule() {
	
}

function parsePanels($panels, $view) {
   if($view == 'DetailView') {
		foreach($panels as $name=>$panel) {
	   	  foreach($panel as $rowCount=>$row) {
	   	  	 foreach($row as $key=>$column) {
				if($this->matches($column, '/^date_entered$/') || $this->matches($column, '/^created_by$/')) {
                   $panels[$name][$rowCount][$key] = array (
	      													'name' => 'date_entered',
	      													'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
	      													'label' => 'LBL_DATE_ENTERED',
	    													);
	   	  	 	} else if($this->matches($column, '/^team.*?(_name)?$/s')) {
				  $panels[$name][$rowCount][$key] = 'team_name';
				} else if($this->matches($column, '/^date_modified$/') || $this->matches($column, '/^modified_by$/')) {
				  $panels[$name][$rowCount][$key] = array (
														    'name' => 'date_modified',
														    'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
														    'label' => 'LBL_DATE_MODIFIED',
	    													);
				} else if($this->matches($column, '/^assigned.*?(_to|_name|_link)$/s')) {
				  //Remove "assigned_to" variable... this will be replaced with "assigned_to"
			      $panels[$name][$rowCount][$key] = 'assigned_user_name';
				} else if($this->matches($column, '/^vcard_link$/')) {
				   $panels[$name][$rowCount][$key] = array (
														     'name' => 'full_name',
														     'customCode' => '{$fields.full_name.value}&nbsp;&nbsp;<input type="button" class="button" name="vCardButton" value="{$MOD.LBL_VCARD}" onClick="document.vcard.submit();">',
														     'label' => 'LBL_NAME',
	    													);
				} else if($this->matches($column, '/^parent_type$/si')) {
				   $panels[$name][$rowCount][$key] = 'parent_name';
				} else if($this->matches($column, '/^account_id$/')) {
				   $panels[$name][$rowCount][$key] = 'account_name';
				} else if($this->matches($column, '/^contact_id$/')) {
				   $panels[$name][$rowCount][$key] = 'contact_name';
				} else if($this->matches($column, '/^reports_to_id$/')) {
				   $panels[$name][$rowCount][$key] = 'report_to_name';	
				} else if($this->matches($column, '/^reminder_time$/')) {
				   $panels[$name][$rowCount][$key] = array(
									                       'name'=>'reminder_checked',
									                       'fields'=>array('reminder_checked', 'reminder_time')
									                       );
				} else if($this->matches($column, '/^currency(_name)*$/')) {
				   $panels[$name][$rowCount][$key] = 'currency_id';
				} else if($this->matches($column, '/^quote_id$/')) {
				   $panels[$name][$rowCount][$key] = 'quote_name';
				}
	   	  	 } //foreach 
	   	  } //foreach
	   } //foreach   
   } else if($view == 'EditView') {	
		foreach($panels as $name=>$panel) {
	   	  foreach($panel as $rowCount=>$row) {
	   	  	 foreach($row as $key=>$column) {
	   	  	 	
				if($this->matches($column, '/^salutation$/si') && is_array($column) && isset($column['fields']) && count($column['fields']) == 2) {
                   //Change salutation field to salutation + first_name'
                   $panels[$name][$rowCount][$key] = array (
        													'name' => 'first_name',
        													'customCode' => '{html_options name="salutation" options=$fields.salutation.options selected=$fields.salutation.value}&nbsp;<input name="first_name" size="25" maxlength="25" type="text" value="{$fields.first_name.value}">',
     													    ); 
				} else if($this->matches($column, '/^parent_type$/si')) {
				   $panels[$name][$rowCount][$key] = 'parent_name';
				} else if($this->matches($column, '/^currency(_name)$/')) {
				   $panels[$name][$rowCount][$key] = 'currency_id';
				} else if($this->matches($column, '/^quote_id$/')) {
				   $panels[$name][$rowCount][$key] = 'quote_name';
				} else if($this->matches($column, '/^account_id$/')) {
				   $panels[$name][$rowCount][$key] = 'account_name';
				} else if($this->matches($column, '/^contact_id$/')) {
				   $panels[$name][$rowCount][$key] = 'contact_name';
				}
	   	  	 } //foreach 
	   	  } //foreach
	   } //foreach   
   }
   
   return $panels;
}

}
?>