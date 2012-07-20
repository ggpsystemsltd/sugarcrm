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






$focus = new Product();

$focus->retrieve($_REQUEST['record']);
	if(!$focus->ACLAccess('Save')){
		ACLController::displayNoAccess(true);
		sugar_cleanup(true);
	}
$the_product_template_id = $focus->product_template_id;

require_once('include/formbase.php');
$focus = populateFromPost('', $focus);

if (!empty($_REQUEST['product_template_id']) && $_REQUEST['product_template_id'] != $the_product_template_id ) {
	global $beanFiles;
	require_once($beanFiles['ProductTemplate']);
	$template = new ProductTemplate();	
	$template->retrieve($_REQUEST['product_template_id']);
	foreach($focus->template_fields as $field)
	{
		if(isset($template->$field))
		{
			$GLOBALS['log']->debug("$field is ".$template->$field);
			$focus->$field = $template->$field;
			
		}
	}
}

if ($_REQUEST['discount_select']) {
    $focus->deal_calc= $_REQUEST['discount_amount']/100*$_REQUEST['discount_price'];
}
else {
    $focus->deal_calc= $_REQUEST['discount_amount'];
}

if (!empty($focus->pricing_formula)
	|| !empty($focus->cost_price)
	|| !empty($focus->list_price)
	|| !empty($focus->discount_price)
	|| !empty($focus->pricing_factor)
	|| !empty($focus->discount_amount)
	|| !empty($focus->discount_select)) {
	require_once('modules/ProductTemplates/Formulas.php');
	global $price_formulas;
	if (isset($price_formulas[$focus->pricing_formula])) 
	{
		include_once ($price_formulas[$focus->pricing_formula]);
		$formula = new $focus->pricing_formula;
		$focus->discount_price = $formula->calculate_price($focus->cost_price,$focus->list_price,$focus->discount_price,$focus->pricing_factor);
	}
}

$focus->unformat_all_fields();
$focus->save();

$return_id = $focus->id;

if(isset($_REQUEST['return_module']) && $_REQUEST['return_module'] != "") $return_module = $_REQUEST['return_module'];
else $return_module = "Products";
if(isset($_REQUEST['return_action']) && $_REQUEST['return_action'] != "") $return_action = $_REQUEST['return_action'];
else $return_action = "DetailView";
if(isset($_REQUEST['return_id']) && $_REQUEST['return_id'] != "") $return_id = $_REQUEST['return_id'];

$GLOBALS['log']->debug("Saved record with id of ".$return_id);

header("Location: index.php?action=$return_action&module=$return_module&record=$return_id");
?>