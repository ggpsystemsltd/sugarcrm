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

class QuotesParseRule extends BaseRule {

function QuotesParseRule() {
	
}

function preParse($panels, $view) {
	
	if($view == 'DetailView') {

		foreach($panels as $name=>$panel) {
		  if($name == 'default') {
		   	  foreach($panel as $rowCount=>$row) {
		   	  	 foreach($row as $key=>$column) {
		   	  	 	if($this->matches($column, '/billing_address_country/')) {
		   	  	 	   $column['label'] = 'LBL_BILL_TO';
		   	  	 	   $column['name'] = 'billing_address_street';
		   	  	 	   $panels[$name][$rowCount][$key] = $column;
		   	  	 	} else if($this->matches($column, '/shipping_address_country/')) {
		   	  	 	   $column['label'] = 'LBL_SHIP_TO';
		   	  	 	   $column['name'] = 'shipping_address_street';
		   	  	 	   $panels[$name][$rowCount][$key] = $column;		   	  	 		
		   	  	 	} else if($this->matches($column, '/^date_quote_closed$/')) {
		   	  	 	   $panels[$name][$rowCount][$key] = 'date_quote_expected_closed';
		   	  	 	} else if($this->matches($column, '/^tag\.opportunity$/')) {
                       $panels[$name][$rowCount][$key] = 'opportunity_name';
		   	  	 	}
				} //foreach 
		   	  } //foreach
		  } //if
	    } //foreach
	}
	
	if($view == 'EditView') {
		$processedBillToPanel = false;

		foreach($panels as $name=>$panel) {
			// This panel is an exception in that it has nested tables...
			if($name == 'lbl_bill_to' && !$processedBillToPanel) {
			   $billToPanel = $panel;
			   $newBillPanel = array();
			   foreach($billToPanel as $subpanel) {
			       $col = array();
			   	   foreach($subpanel as $rowCount=>$row) {
			   	   	   
			   	   	   if(!is_array($row)) {
			   	   	   		  if(!$this->matches($row, '/^(shipping|billing)_address_(street|city|state|country|postalcode)$/si')) {
					       	   	  $col[] = $row;
					       	  }			   	   	   	 
			   	   	   } else {
					       foreach($row as $key=>$column) {
					       	   if(is_array($column)) {
					       	   	  continue;
					       	   }
					       	   
					       	   if($this->matches($column, '/^(billing|shipping)_(account|contact)_name$/')) {
					       	      $match = $this->getMatch($column, '/^(billing|shipping)_(account|contact)_name$/');
					       	      $col[$match[0]] = $match[0];
					       	   } else if(!$this->matches($column, '/^(shipping|billing)_address_(street|city|state|country|postalcode)$/si')) {
					       	   	  $col[] = $column;
					       	   }
					       } //foreach
			   	   	   }
			       } //foreach
			       if(!empty($col)) {
			          $newBillPanel[] = $col;
			       }
			   } //foreach
               $panels['lbl_bill_to'] = $newBillPanel;
               $processedBillToPanel = true;
               continue;
			} //if
			
			foreach($panel as $rowCount=>$row) {
				foreach($row as $key=>$column) {
					//We are just going to clean up address fields since we have
					//to insert a new address panel anyway
	                if($this->matches($column, '/^(shipping|billing)_address_(street|city|state|country|postalcode)$/si')) {
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
