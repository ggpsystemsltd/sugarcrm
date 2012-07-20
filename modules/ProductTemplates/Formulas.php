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

/*********************************************************************************

 * Description:  
 ********************************************************************************/



// We suggest that if you wish to modify an existing formula, copy & paste the existing formula file to a new file
// this will prevent conflicts with future upgrades.

// To add a new formula, you will need to register the new file below and in the pricing_formula_dom array 
// in modules/ProductTemplates/language/<lang>.lang.php
// FG - No more need to change local file. Added inclusion of custom/modules/ProductTemplates/formulas/*.php 
//global $price_formulas;

$GLOBALS['price_formulas'] = array(
	//$discount_price manually entered by admin
	'Fixed'=>'modules/ProductTemplates/formulas/price_fixed.php'

	//Profit Margin: $discount_price = $cost_price * 100 /(100 - $factor) 
	,'ProfitMargin'=>'modules/ProductTemplates/formulas/price_profit_margin.php'

	//Percentage Markup: $discount_price = $cost_price x (1 + $percentage) 
	,'PercentageMarkup'=>'modules/ProductTemplates/formulas/price_cost_markup.php'

	//Percentage Discount: $discount_price = $list_price x (1 - $percentage) 
	,'PercentageDiscount'=>'modules/ProductTemplates/formulas/price_list_discount.php'

	//List: $discount_price = $list_price  
	,'IsList'=>'modules/ProductTemplates/formulas/price_list.php'
	);

// FG - Bug 44515 - Added inclusion of all .php formula files in custom/modules/ProductTemplates/formulas (if exists).
//                  Every file must contain a class whose name must equals the file name (without extension) all lowercase except the first letter, uppercase.
//                  Here devs can add classes for custom formulas - The Upgrade Safe Way
if (sugar_is_dir("custom/modules/ProductTemplates/formulas"))
{
    $_files = glob("custom/modules/ProductTemplates/formulas/*.php");
    foreach ($_files as $filename) 
    {
        $_formulaId = ucfirst(basename(strtolower($filename), ".php"));
        $GLOBALS['price_formulas'][$_formulaId] = $filename;
    }
}

function get_formula_details($pricing_factor) {
	global $price_formulas;
	foreach ($price_formulas as $formula=>$file) {
		require_once($file);
		$focus = new $formula;
		$readonly = $focus->is_readonly();
		$edit_html = $focus->get_edit_html($pricing_factor);
		$formula_js = $focus->get_formula_js();
		$output[$formula] = array('readonly'=>$readonly,'edit_html'=>$edit_html,'formula_js'=>$formula_js);
	}
	return $output;
}

function get_edit($formulas, $formula) {
	$the_script = '';	
	//begin by creating all the divs for each formula's price factor
	foreach ($formulas as $name=>$content) {
		if ($name == $formula) {
			$the_script  .= "<div align='center' id='edit_$name' style='display:inline'> ${content['edit_html']}</div> \n";
		}
		else {
			$the_script  .= "<div align='center' id='edit_$name' style='display:none'> ${content['edit_html']}</div> \n";
		}
	}
	$the_script .= "<script type='text/javascript' language='Javascript'> \n";
	$the_script .= "<!--  to hide script contents from old browsers \n\n";
	$the_script .= "function show_factor() { \n";
	//first turn off all pricing factor divs
	foreach ($formulas as $name=>$content) {
		$the_script .= "	this.document.getElementById('edit_$name').style.display='none'; \n";
	}
	
	//then turn on a new pricing factor div based on the selected formula 
	$the_script .= "	switch(this.document.forms.EditView.pricing_formula.value) { \n";
	foreach ($formulas as $name=>$content) {
		$the_script .= "		case '$name': \n"; 
		$the_script .= "			this.document.getElementById('edit_$name').style.display='inline'; \n";
		$the_script .= "		  	return true; \n"; 
	}
	$the_script .= "		} \n";
	$the_script .= "} \n";

	$the_script .= "function set_discount_price(form) { \n";
	$the_script .= "	switch(form.pricing_formula.value) { \n";
	foreach ($formulas as $name=>$content) {
		$the_script .= "		case '$name': \n";
		$the_script .= "			${content['formula_js']} \n";
		$the_script .= "			form.pricing_factor.value = form.pricing_factor_$name.value; \n";
		$the_script .= "		  	return true; \n"; 
}
	$the_script .= "		} \n";
	$the_script .= "} \n";
    $the_script .= "if ( typeof document.forms.EditView != 'undefined' ) { set_discount_price(document.forms.EditView); }\n";

	$the_script .= "//  End -->\n</script> \n\n";
	
	return $the_script;
}  

function get_detail($formula, $factor) {
	global $mod_strings, $price_formulas;
	if (isset($price_formulas[$formula])) 
	{
		require_once($price_formulas[$formula]);
		$focus = new $formula;
		return $focus->get_detail_html($formula, $factor);
	}
	else
	{
		return '';
	}
}

?>
