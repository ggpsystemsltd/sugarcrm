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

require_once('Expression/Parser/Parser.php');


if ( !empty($_GET['expression']) ) {
	$expr = $_GET['expression'];
	try {
		echo Parser::evaluate($expr)->evaluate();
	} catch (Exception $e) {
		echo $e;
	}
	die();
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<title>SUGAR Arithmetic Engine (JS)</title>


<!-- yui js -->
<script type="text/javascript" src="http://yui.yahooapis.com/2.5.2/build/yahoo-dom-event/yahoo-dom-event.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.5.2/build/container/container_core-min.js"></script>

<!--  sugar expressions js -->
<!--script language="javascript" src="./sugar_expressions.php"></script-->

<!-- custom js -->
<script language="javascript">
YAHOO.util.Event.onDOMReady( function() {
	var container = new YAHOO.widget.Overlay("container", {fixedcenter:true, visible:true, width:"400px"});
	container.render();
});

function checkEnter(e) {
	var characterCode; // literal character code will be stored in this variable

	characterCode = e.keyCode;

	if ( characterCode == 13 ) {
		evalExpression();
		document.getElementById('expression').select();
		return false;
	} else {
		return true;
	}
}

var i = 0;
var expression = "";
function evalExpression()
{
	var parser = new SUGAR.ExpressionParser();
	var output = document.getElementById('results');
	expression = document.getElementById('expression').value;

	if ( expression == 'clear' ) {
		output.innerHTML = "";
		return;
	}

	var sUrl = "index.php?expr=" + escape(expression);
	var request = YAHOO.util.Connect.asyncRequest('GET', sUrl, { success: populate } );
}


function populate(o)
{
	var output = document.getElementById('results');

	var out = "";
	out += '<div class="expression">' + expression + ':</div>';
	out += '<div class="result">' + o.responseText() + "</div>";
	out += "<div class='clearer'></div>";

	var x = (i++%2);

	output.innerHTML = "<div class='casing" + x + "'>" + out + "</div>" + output.innerHTML;
}

</script>


<style type="text/css">

BODY {
	background: #BFBFBF;
	font-family: Trebuchet MS;
}

.expression {
	font-size:  10pt;
	float: left;
}

.casing0 {
	padding: 5px;
	background: #E4E4E4;
}

.casing1 {
	padding: 5px;
	background: #f4f4f4;
}

.result {
	font-family: Verdana;
	font-size: 10pt;
	font-weight: bold;
	float: right;
}

.clearer {
	clear: both;
}

#results {
	margin: 0 auto;
	width: 350px;
	height: 350px;
	border: 1px solid #cccccc;
	overflow:auto;
	padding: 10px;
	background: #ffffff;
}


#container {
	width: 400px;
	margin: 0 auto;
	height: 400px;
	background: #ffffff;
	background: #EFEFEF;
	border: 1px solid #000;
	padding: 30px;
}


#input {
	text-align: center;
	height: 50px;
	margin: 0 auto;
}

#input INPUT[type=text] {
	font-family: Courier New;
}

</style>

</head>

<body>

<!-- div id="overlay" style="width: 100%; height: 100%;position: absolute; left: 0px; top: 0px; background: #BFBFBF; z-index: -10;"></div -->


<div id="container">

	<div id="results">
	</div>

	<div id="input">
		<input type="text" id="expression" style="width: 288px" onkeypress="checkEnter(event)">
		<input type="button" value="Evaluate" onclick="evalExpression()">
	</div>

</div>

</body>

</html>




<?php

/*
echo "<u>Testing Expressions</u>";
echo "<p>";
$expressions = array(
					"add(10, 10)",
					"subtract(100.5, 10)",
					"multiply(9, 17)",
					"divide(100, 5)",
					"divide(100, 6)",
					"abs(-100)",
					"abs(101.5)",
					"negate(add(10, 10, 100, multiply(10, 400), 10, multiply(10, 10)))",
					"ceil(-100.5)",
					"floor(-100.5)",
					"log(1)",
					"strlen(\"Hello World,\")",
					"strlen(\"(flawed)add(10, 10), internal execution,\")",
					"concat(\"first\",      \" second\")",
					"strlen(concat(\"first\", \" second\"))",
					"not(contains(\"abcdefg\", \"abc\"))",
					"and(contains(\"abcdefg\", \"abc\"), contains(\"house\", \"ouse\"))",
					"and(contains(\"abcdefg\", \"abc\"), not(contains(\"house\", \"ouse\")))",
					"or(contains(\"abcdefg\", \"abc\"), not(contains(\"house\", \"ouse\")))",
					"value_at(0, enum(false, \"string\", 12, 123))",
					/*"date(9,7,2008)",
					"dayofweek(date(9,7,2008))",
					"time(3, 29, 45)",
					"hourofday(time(3, 29, 45))",
					"monthofyear(date(9, 7, 2008))",
					"strlen(string(monthofyear(date(9, 7, 2008))))",
					"isInEnum(10, enum(\"hello\", false, 10, -115))",
				);

foreach ( $expressions as $expr )
	echo "<b>EVALUATE</b> <i>$expr</i> = <u>" . Parser::evaluate($expr)->evaluate() . "</u><br>";

echo "</p>";


echo "<u>Testing Errors</u>";
echo "<p>";

$expressions = array(
					"add()",							// no params for add
					"add(10, 10",						// no closing paren
					"random_func(100.5, 10)",			// unrecognized function
					"multiply 9, 17)",					// no open paren
					"divide(100)",						// single divide
					"divide(100, 6, 10)",				// more than two divide
					"abs(-100, -3.141592653589723)",	// multiple abs
					"abs()",							// no abs
					"negate add(10, 10, 100, multiply(10, 400), 10, multiply(10, 10)))",
					"ceil()",							// no params ceil
					"ceil(1, 2)",						// two params ceil
					"floor(-100.5, 871)",				// multiple floor
					"log(1, 10)",						// multiple log
				);

foreach ( $expressions as $expr )  {
	try {
		echo "<b>EVALUATE</b> <i>$expr</i> = ";
		echo "<u>" . $p->evaluate($expr)->evaluate() . "</u><br>";
	} catch (Exception $e) {
		echo "<p>" . $e . "</p>";
	}
}

echo "</p>";*/
?>