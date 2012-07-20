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
 * AddressRule.php
 * 
 * This is a utility base class to provide further refinement when converting 
 * pre 5.x files to the new meta-data rules.  Address fields defined in the
 * address panel will be removed as the new metadata definition will be merged later.
 * If the address fields are outside the address panel, we will keep them as is, but
 * ensure that they are not defined as Arrays.
 * @author Collin Lee
 */
 
require_once('include/SugarFields/Parsers/Rules/BaseRule.php');
 
class AddressRule extends BaseRule {

function AddressRule() {
  
}

function parsePanels($panels, $view) {
   $searchedAddressPanel = array();
   
   foreach($panels as $name=>$panel) {
   	
   	  $isAddressPanel = $name == 'lbl_address_information';
   	  
   	  foreach($panel as $rowCount=>$row) {
   	  	 foreach($row as $key=>$column) {

   	  	 	if($this->matches($column, '/_address_(city|state|country|postalcode)$/si')) {
   	  	 	   if($view == 'DetailView' && !is_array($column)) { 
   	  	 	   	  $panels[$name][$rowCount][$key] = '';
   	  	 	   } else if($view == 'DetailView' && $this->matches($column, '/_address_country$/') && is_array($column)) {
   	  	 	      $match = $this->getMatch($column, '/(.*?)_address_country$/');
                  $panels[$name][$rowCount][$key]['name'] = $match[1] . '_address_street';
                  $panels[$name][$rowCount][$key]['label'] = 'LBL_' . strtoupper($match[1]) . '_ADDRESS';
   	  	 	   } else if($view == 'EditView' && $isAddressPanel) {
	  
	              $field = is_array($column) ? $column['name'] : $column;
	              preg_match('/^(.*?)_address_/si', $field, $matches);
	               
   	  	 	   	  if(empty($searchedAddressPanel[$matches[1]])) {    
   	  	 	   	     $intact = $this->hasAddressFieldsIntact($panel, $matches[1]);
   	  	 	   	     
   	  	 	   	     //now we actually have to go back in and replace the street field
   	  	 	   	     if(!$intact) {
   	  	 	   	     	$panels = $this->removeStreetFieldOverride($panels, $matches[1]);
   	  	 	   	     }
   	  	 	   	     
   	  	 	   	     $addressFieldsIntact[$matches[1]] = $intact;
   	  	 	   	     $searchedAddressPanel[$matches[1]] = true;
   	  	 	   	  }
   	  	 	   	  
   	  	 	   	  //Only remove in address panel if the street field is in there by itself
   	  	 	   	  if($addressFieldsIntact[$matches[1]]) {
   	  	 	   	  	 $panels[$name][$rowCount][$key] = '';
   	  	 	   	  }
   	  	 	   }
   	  	 	} else if($this->matches($column, '/^push_.*?_(shipping|billing)$/si')) {
   	  	 	   $panels[$name][$rowCount][$key] = '';
   	  	 	} 
   	  	 } //foreach
   	  } //foreach
   } //foreach
   return $panels;
}

/**
 * hasAddressFieldsIntact
 * This function checks to see if the address fields for the given street key is
 * intact.  This means that all five fields (street, city, state, country and postalcode)
 * have not been moved from the address panel
 * 
 * @param $addressPanel Array of address panel contents
 * @param $suffix The address suffix (billing, shipping, primary, alternate) to check for
 * @return boolean
 */
function hasAddressFieldsIntact($addressPanel, $suffix) {
   $expression = '/^' . $suffix . '_address_(street|city|state|country|postalcode)$/si';
   $count = 0;
   foreach($addressPanel as $rowCount=>$row) {
   	  foreach($row as $key=>$column) {
   	     if($this->matches($column, $expression)) {
   	        $count++;	
   	     }
   	  }
   }
   return $count == 5;
}


/**
 * removeStreetFieldOverride
 * This function scans the panels and locates the street address field for the given key
 * and replaces the Array definition (from the merging process) with a String value.
 * @param $panels Array of the view's panels
 * @param $street String key value of the street to search for
 * @returns $panels Array of view's panels with street value substituted
 */
function removeStreetFieldOverride($panels, $street) {
   $expression = '/^' . $street . '_address_street$/si';
   foreach($panels as $name=>$panel) {
   	foreach($panel as $rowCount=>$row) {
   	  foreach($row as $key=>$column) {
   	     if($this->matches($column, $expression)) {
   	     	 $panels[$name][$rowCount][$key] = $street . '_address_street';
   	     }
   	  }
   	}
   }
   return $panels;
}

}

?>
