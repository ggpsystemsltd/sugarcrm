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

/**
 * Base expression class
 * @api
 */
abstract class AbstractExpression
{
	// constants
	public static $INFINITY = -1;

	// type constants
	public static $STRING_TYPE   = "string";
	public static $NUMERIC_TYPE  = "number";
	public static $DATE_TYPE 	 = "date";
	public static $TIME_TYPE 	 = "time";
	public static $BOOLEAN_TYPE  = "boolean";
	public static $ENUM_TYPE 	 = "enum";
    public static $RELATE_TYPE   = "relate";
	public static $GENERIC_TYPE  = "generic";

	// booleans
	public static $TRUE  = "true";
	public static $FALSE = "false";

	// type to class map
	public static $TYPE_MAP		 = array(
											"number" 	=> "NumericExpression",
											"string" 	=> "StringExpression",
											"date" 		=> "DateExpression",
											"time" 		=> "TimeExpression",
											"boolean" 	=> "BooleanExpression",
											"enum" 		=> "EnumExpression",
                                            "relate"	=> "RelateExpression",
											"generic" 	=> "AbstractExpression",
										);

	// instance variables
	var $params;

	/**
	 * Constructs an Expression object given the parameters.
	 */
	function AbstractExpression($params=null) {
		// if the array contains only one value, then set params equal to that value
		if ( is_array($params) && sizeof($params) == 1 ) {
			$this->params = $params[0];
		}

		// if params is an array with more than or less than 1 value
		else {
			$this->params = $params;
		}

		// validate the parameters
		$this->validateParameters();
	}

	/**
	 * Returns the parameter list for this Expression.
	 */
	function getParameters() {
		return $this->params;
	}

	/**
	 * Evaluates this expression and returns the
	 * resulting value.
	 */
	abstract function evaluate();

	/**
	 * Returns the JavaScript equivalent for the evaluate
	 * function.
	 */
	abstract static function getJSEvaluate();

	/**
	 * Returns a string representation of this expression.
	 * TODO: Make this an abstract method.
	 */
	function toString() {}

	/**
	 * Defines the required types of each of the individual parameters.
	 */
	abstract static function getParameterTypes();

	/**
	 * Validates the parameters and throws an Exception if invalid.
	 */
	function validateParameters() {
		// retrieve the params, the param count, and the param types
		$params = $this->getParameters();
		$count  = $this->getParamCount();
		$types  = $this->getParameterTypes();

		// retrieve the operation name for throwing exceptions
		$op_name = call_user_func(array(get_class($this), "getOperationName"));

        /* parameter and type validation */

		// make sure count is a number
		if ( !is_numeric($count) )	throw new Exception($op_name . ": Number of paramters required must be a number");

		// make sure types is a array or a string
		if ( !is_string($types) && !is_array($types) )
			throw new Exception($op_name . ": Parameter types must be valid and match the parameter count");

		// make sure sizeof types is equal to parameter count
		if ( is_array($types) && $count != AbstractExpression::$INFINITY && $count != sizeof($types) )
			throw new Exception($op_name . ": Parameter types must be valid and match the parameter count");

		// make sure types is valid
		if ( is_string($types) ) {
			if ( ! isset( AbstractExpression::$TYPE_MAP[$types] ) )
				throw new Exception($op_name . ": Invalid type requirement '$types'");
		} else {
			foreach ( $types as $type )
				if ( ! isset(AbstractExpression::$TYPE_MAP[$type]) )
					throw new Exception($op_name . ": Invalid type requirement");
		}


		/* parameter and count validation */

		// if we want 0 params and we got 0 params, forget it
		if ( $count == 0 && !isset($params) )	return;

		// if we want a single param, validate that param
		if ( $count == 1 && $this->isProperType($params, $types) )	return;

		// we require multiple but params only has 1
		if ( $count > 1 && !is_array($params) )
            throw new Exception($op_name . ": Requires exactly $count parameter(s), only one passed in");
		// we require only 1 and params has multiple
		if ( $count == 1 && is_array($params) )
			throw new Exception($op_name . ": Requires exactly $count parameter(s), more than one passed in");

		// check parameter count
		if ( $count != AbstractExpression::$INFINITY && sizeof($params) != $count )
			throw new Exception($op_name . ": Requires exactly $count parameter(s)");

		// if a generic type is specified
		if ( is_string( $types ) ) {
			// only a single parameter
			if ( !is_array($params) ) {
				if ( $this->isProperType( $params, $types ) )	return;
				throw new Exception($op_name . ": All parameters must be of type '$types'");
			}

			// multiple parameters
			foreach ( $params as $param ) {
				if ( ! $this->isProperType( $param, $types ) )
					throw new Exception($op_name . ": All parameters must be of type '$types'");
			}
		}

		// if strict type constraints are specified
		else {
			// only a single parameter
			if ( !is_array($params) ) {
				if ( $this->isProperType( $params, $types[0] ) )	return;
				throw new Exception($op_name . ": Parameter must be of type '" . $types[0] . "'");
			}

			// improper type
			for ( $i = 0 ; $i < sizeof($types) ; $i++ ) {
				if ( ! $this->isProperType( $params[$i], $types[$i] ) )
					throw new Exception($op_name . ": the parameter at index $i must be of type " . $types[$i]);
			}
		}
	}

	/**
	 * Enforces the parameter types.
	 */
	function isProperType($variable, $type) {
		if ( is_array($type) )	return false;

		// retrieve the class
		$class = AbstractExpression::$TYPE_MAP[$type];

		// check if type is empty
		if ( !isset($class) )
            return false;

		// check if it's an instance of type
		if($variable instanceof $class);
            return true;

		// now check for generics
		switch($type) {
			case AbstractExpression::$STRING_TYPE:
				return (is_string($variable) || is_numeric($variable)
				    || $variable instanceof AbstractExpression::$TYPE_MAP[AbstractExpression::$NUMERIC_TYPE]);
				break;
			case AbstractExpression::$NUMERIC_TYPE:
				return (is_numeric($variable) );
				break;
			case AbstractExpression::$BOOLEAN_TYPE:
				if ( $variable instanceof Expression )	$variable = $variable->evaluate();
				return ($variable == AbstractExpression::$TRUE || $variable == AbstractExpression::$FALSE );
				break;
            case AbstractExpression::$DATE_TYPE:
            case AbstractExpression::$TIME_TYPE:
                if ( $variable instanceof Expression )	$variable = $variable->evaluate();
				return ((is_string($variable) && new DateTime($variable) !== false));
				break;
            case AbstractExpression::$RELATE_TYPE:
                return true;
		}

		// just return whether it is an instance or not
		return false;
	}

	/**
	 * Returns the exact number of parameters needed
	 * which is set as infinite by default.
	 */
	static function getParamCount() {
		return AbstractExpression::$INFINITY;
	}
}

?>