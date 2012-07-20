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

require_once("include/Expressions/Expression/Numeric/NumericExpression.php");
/**
 * <b>median(Number n, ...)</b><br/>
 * Returns the median of the supplied numbers.
 * ex: <i>median(4, 5, 5, 6, 7)</i> = 5
 */
class MedianExpression extends NumericExpression {
	/**
	 * Returns itself when evaluating.
	 */
	function evaluate() {
		$values = array();
		
		foreach ( $this->getParameters() as $expr )
			$values[] = $expr->evaluate();
		
		sort($values);
		if (sizeof($values) % 2 == 0) 
		{
			return ($values[sizeof($values)/2] + $values[sizeof($values)/2 - 1]) / 2;
		}
		
		return $values[floor(sizeof($values)/2)];
	}
	
	/**
	 * Returns the JS Equivalent of the evaluate function.
	 */
	static function getJSEvaluate() {
		return <<<EOQ
			var params = this.getParameters();
			var values = new Array();
			
			for ( var i = 0; i < params.length; i++ )
				values[values.length] = parseFloat(params[i].evaluate()); 
			
			// sort numerically
			values.sort(function(a, b) {return a - b;});
			
			if (values.length % 2 == 0) 
			{
				return (values[values.length/2] + values[values.length/2 - 1]) / 2;
			}
			
			return values[ Math.round(values.length/2) - 1 ];
EOQ;
	}
	
	/**
	 * Returns the opreation name that this Expression should be
	 * called by.
	 */
	static function getOperationName() {
		return "median";
	}
	
	/**
	 * Returns the String representation of this Expression.
	 */
	function toString() {
		//pass
	}
}
?>