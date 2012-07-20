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

 


function additionalDetailsQuote($fields) {
	static $mod_strings;
	if(empty($mod_strings)) {
		global $current_language;
		$mod_strings = return_module_language($current_language, 'Quotes');
	}
		
	$overlib_string = '';
	
	if(!empty($fields['PURCHASE_ORDER_NUM'])) $overlib_string .= '<b>'. $mod_strings['LBL_PURCHASE_ORDER_NUM'] . '</b> ' . $fields['PURCHASE_ORDER_NUM'] . '<br>';
	if(!empty($fields['ORIGINAL_PO_DATE'])) $overlib_string .= '<b>'. $mod_strings['LBL_ORIGINAL_PO_DATE'] . '</b> ' . $fields['ORIGINAL_PO_DATE'] . '<br>';
	
	if(!empty($fields['BILLING_ADDRESS_STREET']) || !empty($fields['BILLING_ADDRESS_CITY']) ||
		!empty($fields['BILLING_ADDRESS_STATE']) || !empty($fields['BILLING_ADDRESS_POSTALCODE']) ||
		!empty($fields['BILLING_ADDRESS_COUNTRY']))
			$overlib_string .= '<b>' . $mod_strings['LBL_BILLING_ADDRESS_STREET'] . '</b><br>';
	if(!empty($fields['BILLING_ADDRESS_STREET'])) $overlib_string .= $fields['BILLING_ADDRESS_STREET'] . '<br>';
	if(!empty($fields['BILLING_ADDRESS_CITY'])) $overlib_string .= $fields['BILLING_ADDRESS_CITY'] . ', ';
	if(!empty($fields['BILLING_ADDRESS_STATE'])) $overlib_string .= $fields['BILLING_ADDRESS_STATE'] . ' ';
	if(!empty($fields['BILLING_ADDRESS_POSTALCODE'])) $overlib_string .= $fields['BILLING_ADDRESS_POSTALCODE'] . ' ';
	if(!empty($fields['BILLING_ADDRESS_COUNTRY'])) $overlib_string .= $fields['BILLING_ADDRESS_COUNTRY'] . '<br>';
	if(strlen($overlib_string) > 0 && !(strrpos($overlib_string, '<br>') == strlen($overlib_string) - 4)) 
		$overlib_string .= '<br>';  
	
	if(!empty($fields['SHIPPING_ADDRESS_STREET']) || !empty($fields['SHIPPING_ADDRESS_CITY']) ||
		!empty($fields['SHIPPING_ADDRESS_STATE']) || !empty($fields['SHIPPING_ADDRESS_POSTALCODE']) ||
		!empty($fields['SHIPPING_ADDRESS_COUNTRY']))
			$overlib_string .= '<b>' . $mod_strings['LBL_SHIPPING_ADDRESS_STREET'] . '</b><br>';
	if(!empty($fields['SHIPPING_ADDRESS_STREET'])) $overlib_string .= $fields['SHIPPING_ADDRESS_STREET'] . '<br>';
	if(!empty($fields['SHIPPING_ADDRESS_CITY'])) $overlib_string .= $fields['SHIPPING_ADDRESS_CITY'] . ', ';
	if(!empty($fields['SHIPPING_ADDRESS_STATE'])) $overlib_string .= $fields['SHIPPING_ADDRESS_STATE'] . ' ';
	if(!empty($fields['SHIPPING_ADDRESS_POSTALCODE'])) $overlib_string .= $fields['SHIPPING_ADDRESS_POSTALCODE'] . ' ';
	if(!empty($fields['SHIPPING_ADDRESS_COUNTRY'])) $overlib_string .= $fields['SHIPPING_ADDRESS_COUNTRY'] . '<br>';
	if(strlen($overlib_string) > 0 && !(strrpos($overlib_string, '<br>') == strlen($overlib_string) - 4)) 
		$overlib_string .= '<br>';  
		
	$overlib_string .= '<table cellpadding=1 cellspacing=0 width=100%>';
	if(!empty($fields['SUBTOTAL'])) $overlib_string .= '<tr><td width=1%><b>'. $mod_strings['LBL_SUBTOTAL'] . '</b></td><td align=right>' . $fields['SUBTOTAL'] . '</td></tr>';
    if(!empty($fields['DISCOUNT'])) $overlib_string .= '<tr><td width=1%><b>'. $mod_strings['LBL_DISCOUNT_TOTAL'] . '</b></td><td align=right>' . $fields['DISCOUNT'] . '</td></tr>';	
    if(!empty($fields['NEW_SUBTOTAL'])) $overlib_string .= '<tr><td width=1%><b>'. $mod_strings['LBL_NEW_SUBTOTAL'] . '</b></td><td align=right>' . $fields['NEW_SUBTOTAL'] . '</td></tr>';   
    if(!empty($fields['TAX'])) $overlib_string .= '<tr><td width=1%><b>'. $mod_strings['LBL_TAX'] . '</b></td><td align=right>' . $fields['TAX'] . '</td></tr>';
	if(!empty($fields['SHIPPING'])) $overlib_string .= '<tr><td width=1%><b>'. $mod_strings['LBL_SHIPPING'] . '</b></td><td align=right>' . $fields['SHIPPING'] . '</td></tr>';
	if(!empty($fields['TOTAL'])) $overlib_string .= '<tr><td width=1%><b>'. $mod_strings['LBL_TOTAL'] . '</b></td><td align=right>' . $fields['TOTAL'] . '</td></tr><br>';
	$overlib_string .= '</table>';
		
	if(!empty($fields['DESCRIPTION'])) {
		$overlib_string .= '<b>'. $mod_strings['LBL_DESCRIPTION'] . '</b> ' . substr($fields['DESCRIPTION'], 0, 300);
		if(strlen($fields['DESCRIPTION']) > 300) $overlib_string .= '...';
	}	

	return array('fieldToAddTo' => 'NAME', 
				 'string' => $overlib_string, 
				 'editLink' => "index.php?action=EditView&module=Quotes&return_module=Quotes&record={$fields['ID']}", 
				 'viewLink' => "index.php?action=DetailView&module=Quotes&return_module=Quotes&record={$fields['ID']}");
}
 
 ?>
 
 