<?php
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

// TODO: remove aliasing
/*
 * TODO:
 * 1) Remove aliasing (eliminate confusion)
 * 2) Group into a single class
 * 3) Clean up quick-hack approach to generating JS
 * 4) Minify JS after generation
 */

/**
 * Dependent Dropdowns & Calculated Fields
 * Takes the metadata in and generates the javascript code from it.
 */
function getJSFromDDMeta($data)
{

$map = array(
	'Dependency'=>'d',
	'StyleDependency'=>'s',
	'RequireDependency'=>'r',
	'createTrigger'=>'c',
);

	// variable declaration
	$dependencies = array();
	$triggers	  = array();
	$variables	  = array();

	// create the dependencies
	foreach ( $data['dependencies'] as $key=>$value ) {
		$field		= $value['field'];
		$expression = $value['expression'];

		// register variables from the expression
		$vars = getVarsFromExpression($expression);
		$variables[$field] = $field;
		foreach ( $vars as $var )	$variables[$var] = $var;

		// check the type
		if ( $value['type'] === 'style' ) {
			$dependencies[$key] = "var $key=new " . $map['StyleDependency']. "('$field',$expression);";
		}
		else if ( $value['type'] == 'require' ) {
			$label_id = $value['label_id'];
			$required = $value['require']==true ? 'true' : 'false';
			$dependencies[$key] = "var $key=new " . $map['RequireDependency']. "('$field',$required,'$label_id');";
		}
		else {
			$dependencies[$key] = "var $key=new " . $map['Dependency'] . "('$field','$expression');";
		}
	}

	// create the triggers
	foreach ( $data['triggers'] as $key=>$value )
	{
		$trigger_flds = $value['fields'];
		$trigger_cond = $value['condition'];
		$trigger_load = $value['triggeronload'];
		$trigger_deps = $value['dependencies'];

		$fields_array = "";
		$deps_array   = "";

		// default load item
		if ( empty($trigger_load) )	$trigger_load = "false";
		if ( empty($trigger_cond) )	$trigger_cond = "true";

		// register variables from the condition
		$vars = getVarsFromExpression($trigger_cond);
		foreach ( $vars as $var )	$variables[$var] = $var;

		// construct the fields array
		foreach ( $trigger_flds as $field ) {
			$fields_array .= "'$field',";
			$variables[$field] = $field;
		}
		$fields_array = substr($fields_array, 0, -1);
		$fields_array = "[" . $fields_array . "]";

		// the trigger javascript
		if ( isset($trigger_deps['met']) && isset($trigger_deps['unmet']) ) {
			// construct the met/unmet dependencies array
			foreach ( $trigger_deps['met'] as $key=>$value )	$met_deps_array .= "$key,";
			$met_deps_array = substr($met_deps_array, 0, -1);
			$met_deps_array = "[" . $met_deps_array . "]";

			foreach ( $trigger_deps['unmet'] as $key=>$value )	$unmet_deps_array .= "$key,";
			$unmet_deps_array = substr($unmet_deps_array, 0, -1);
			$unmet_deps_array = "[" . $unmet_deps_array . "]";

			$triggers[$key] = $map['createTrigger'] . "($fields_array,'$trigger_cond',{met: $met_deps_array,unmet: $unmet_deps_array}";
			if ( isset($trigger_load) )$triggers[$key] .= ',true';
			$triggers[$key] .= ');';
		} else {
			// construct the dependencies array
			foreach ( $trigger_deps as $key=>$value )	$deps_array .= "$key,";
			$deps_array = substr($deps_array, 0, -1);
			$deps_array = "[" . $deps_array . "]";
			$triggers[$key] = $map['createTrigger'] . "($fields_array,'$trigger_cond',$deps_array";
			if ( isset($trigger_load) )$triggers[$key] .= ',true';
			$triggers[$key] .= ');';
		}
	}

	// now compile the javascript into one
	$js_code = "";


	// variables
	$js_code .= <<<EOQ
var f=SUGAR.forms;
var h=f.AssignmentHandler;
var c=f.createTrigger;
var d=f.Dependency;
var s=f.StyleDependency;
var r=f.RequireDependency;
EOQ;

	// clear new lines
	//$js_code = str_replace('\n', '', $js_code);

	$js_code .= "h.register([";
	foreach ( $variables as $key=>$var ) {
		$js_code .= "'$var',";
	}
	$js_code = substr($js_code, 0, -1);
	$js_code .= "]);";

	// dependencies
	foreach ( $dependencies as $key=>$value ){
		$js_code .= $value;
	}

	// triggers
	foreach ( $triggers as $key=>$value ){
		$js_code .= $value;
	}

// remove new lines
$js_code = str_replace("\r\n", '', $js_code);
$js_code = str_replace("\n", '', $js_code);

	return $js_code;
}






/**
 * Form Validation
 * Takes the metadata in and generates the javascript code from it.
 */
function getJSFromValidationMeta($data)
{

$js_code = <<<EOQ
var X = SUGAR.forms;
var a = X.FormValidator;
var b = a.setRequired;

var z = a.add;
var y = a.alpha;
var x = a.numeric;
var w = a.alphanumeric;
var v = a.email;
var u = a.phone;
var t = a.date;
var s = a.time;
var r = a.binary;
var q = a.isbefore;
EOQ;


	$map = array(
		'setRequired'    => 'b',
	);

/*	// mapping of generic type to function
	$func_map = array(
		'generic' => 'SUGAR.forms.FormValidator.add',
		'alpha' => 'SUGAR.forms.FormValidator.alpha',
		'numeric' => 'SUGAR.forms.FormValidator.numeric',
		'alphanumeric' => 'SUGAR.forms.FormValidator.alphanumeric',
		'email' => 'SUGAR.forms.FormValidator.email',
		'phone' => 'SUGAR.forms.FormValidator.phone',
		'date' => 'SUGAR.forms.FormValidator.date',
		'time' => 'SUGAR.forms.FormValidator.time',
		'binary' => 'SUGAR.forms.FormValidator.binary',
		'isbefore' => 'SUGAR.forms.FormValidator.isbefore',
	);*/

	// mapping of generic type to function
	$func_map = array(
		'generic' => 'z',	// add(...)
		'alpha' => 'y',
		'numeric' => 'x',
		'alphanumeric' => 'w',
		'email' => 'v',
		'phone' => 'u',
		'date' => 't',
		'time' => 's',
		'binary' => 'r',
		'isbefore' => 'q',
	);

	// variable declaration
	$conditions = array();
	$variables	= array();

	// code
	$required_code = "";
	$conditions_code = "";

	// FORM level
	foreach ( $data as $form=>$fields )
	{
		// define the form variable
		$variables[$form] = array();

		// code
		$req_code = "";

		// FIELD level
		foreach ( $fields as $field_name=>$field )
		{
			// conditions code
			$code = "";

			// check get the properties
			$required   = $field['required'];
			$conditions = $field['conditions'];

			// if the field is required
			if ( !empty($required) )
				$req_code .= "'$field_name',";

			// parse the conditions
			foreach ( $conditions as $name=>$options )
			{
				// if a generic
				if ( !empty($func_map[$name]) )
				{
					// start declaration
					$code .= $func_map[$name]."('$form','$field_name'";

					// compile options
					$op_code = "";
					foreach ( $options as $option=>$value )
						$op_code .= "$option:'$value',";

					// check options
					if ( strlen($op_code) > 0 ) {
						$op_code = substr($op_code, 0, -1);		// remove trailing comma
						$op_code = "{".$op_code."}";				// enclose in braces
						$code .= ",$op_code";					// add to code
					}

					// close
					$code .= ");\n";
				} else {
					$condition = $options['condition'];
					$message   = $options['message'];
					if ( empty($condition) || empty($message) )	continue;

					// start declaration
					$code .= $func_map['generic']."('$form','$field_name','$condition','$message')";
				}

			}

			$conditions_code .= $code;
		}


		// add the required variables to the code
		if ( strlen($req_code) > 0 ) {
			$req_code = substr($req_code, 0, -1);
			$req_code = $map['setRequired']."('$form',[$req_code]);\n";
			$required_code .= $req_code;
		}
	}

$js_code = str_replace(' = ', '=', $js_code);
$js_code .= $conditions_code.$required_code;
$js_code = str_replace("\r\n", '', $js_code);
$js_code = str_replace("\n", '', $js_code);

	return $js_code;
	//return $registry_code;
}

















/**
 * Parses an expression and returns the variables from it.
 */
function getVarsFromExpression($params)
{
	// now parse the individual parameters recursively
	$length = strlen($params);
	$argument = "";

	// return code
	$variables = array();

	// flags
	$char 			= null;
	$lastCharRead	= null;
	$justReadString	= false;		// did i just read in a string
	$isInQuotes 	= false;		// am i currently reading in a string
	$isPrevCharBK 	= false;		// is my previous character a backslash
	$isInVar		= false;			// am i reading a variable

	for ( $i = 0 ; $i < $length ; $i++ ) {
		// store the last character read
		$lastCharRead = $char;

		// set isprevcharbk
		if ( $lastCharRead == '\\' )		$isPrevCharBK = true;
		else								$isPrevCharBK = false;


		// get the charAt index $i
		$char = $params{$i};

		// check for quotes and negate
		if ( $char == '"' && !$isPrevCharBK )
			$isInQuotes = !$isInQuotes;

		// if i am in quotes, then ignore
		if ( $isInQuotes && $char != '"' && !$isPrevCharBK ) continue;

		// now check if reading a variable
		if ( $isInVar ) {
			// check if the variable declaration ended
			if ( ! preg_match('/[a-zA-Z0-9\-_]/', $char) ) {
				$variables[] = $argument;
				//echo "Detected Variable $argument<br>";
				$argument = "";
				$isInVar = false;
			} else {
				// keep reading
				$argument .= $char;
			}
		}


		// check for $ sign and parse
		if ( $char == '$' ) {
			$isInVar = true;
			continue;
		}


	}

	return $variables;
}

?>
