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
 * Expression parser
 * @api
 */
class Parser {
	/**
	 * Evaluates an expression.
	 *
	 * @param string	the expression to evaluate
     *
	 */
	static function evaluate($expr, $context = false)
	{
		// the function map
		static $FUNCTION_MAP = array();

		// trim spaces, left and right, and remove newlines
		$expr = str_replace("\n", "", trim($expr));

		// check if its a constant and return a constant expression
		$const = Parser::toConstant($expr);
		if ( isset($const) )	return $const;

        if (preg_match('/^\$[a-zA-Z0-9_\-]+$/', $expr))
        {
            require_once( "include/Expressions/Expression/Generic/SugarFieldExpression.php");
            $var = substr($expr, 1);
            $ret = new SugarFieldExpression($var);
            if ($context) $ret->context = $context;
            return $ret;
        }
        //Related field shorthand
        if (preg_match('/^\$[a-zA-Z0-9_\-]+\.[a-zA-Z0-9_\-]+$/', $expr))
        {
            require_once( "include/Expressions/Expression/Generic/SugarFieldExpression.php");
            require_once( "include/Expressions/Expression/Generic/RelatedFieldExpression.php");
            $link = substr($expr, 1, strpos($expr, ".") - 1);
            $related = substr($expr, strpos($expr, ".") + 1);
            $linkField = new SugarFieldExpression($link);
            if ($context) $linkField->context = $context;
            return new RelatedFieldExpression(array(
                $linkField, Parser::toConstant('"' . $related . '"'))
            );

        }


		// VALIDATE: expression format
		if ( ! preg_match('/^[a-zA-Z0-9_\-$]+\(.*\)$/', $expr) ) {
			throw new Exception("Attempted to evaluate expression with an invalid format: $expr");
			return;
		}

		// EXTRACT: Function
		$open_paren_loc = strpos($expr, '(');

		// if no open-paren '(' found
		if ( $open_paren_loc < 0 )	{
            throw new Exception("Attempted to evaluate expression with a Syntax Error (No opening paranthesis found): $expr");
            return;
        }

		// get the function
		$func   = substr( $expr , 0 ,  $open_paren_loc);

		// handle if function is not valid
		if(empty($FUNCTION_MAP)) {
			if (!file_exists(sugar_cached('Expressions/functionmap.php'))) {
				$GLOBALS['updateSilent'] = true;
				include("include/Expressions/updatecache.php");
			}
			require_once( sugar_cached('Expressions/functionmap.php'));
		}


		if ( !isset($FUNCTION_MAP[$func]) )	{
            throw new Exception("Attempted to evaluate expression with an invalid function '$func': $expr");
            return;
        }

		// EXTRACT: Parameters
		$params = substr( $expr , $open_paren_loc + 1, -1);

		// now parse the individual parameters recursively
		$level  = 0;
		$length = strlen($params);
		$argument = "";
		$args = array();

		// flags
		$char 			= null;
		$lastCharRead	= null;
		$justReadString	= false;		// did i just read in a string
		$isInQuotes 	= false;		// am i currently reading in a string
		$isPrevCharBK 	= false;		// is my previous character a backslash
        $isInVariable 	= false;		// is my previous character a backslash

		for ( $i = 0 ; $i <= $length ; $i++ ) {
			// store the last character read
			$lastCharRead = $char;

			// the last parameter
			if ( $i == $length ) {
                if ($argument != "") {
				    $subExp = Parser::evaluate($argument, $context);
                    $subExp->context = $context;
                    $args[] = $subExp;
                }
				break;
			}

			// set isprevcharbk
			$isPrevCharBK = $lastCharRead == '\\';

			// get the charAt index $i
			$char = $params{$i};

			// if i am in quotes, then keep reading
			if ( $isInQuotes && $char != '"' && !$isPrevCharBK ) {
				$argument .= $char;
				continue;
			}

			// check for quotes
			if ( $char == '"' && !$isPrevCharBK && $level == 0 )
			{
				// if i am ending a quote, then make sure nothing follows
				if ( $isInQuotes ) {
					// only spaces may follow the end of a string
					$temp = substr($params, $i+1, strpos($params, ",", $i) - $i - 1 );
					if ( !preg_match( '/^(\s*|\s*\))$/', $temp ) ) {
			            throw new Exception("Syntax Error:Improperly Terminated String '$temp' in formula: $expr");
			            return;
			        }
				}

				// negate if i am in quotes
				$isInQuotes = !$isInQuotes;
			}

            if( $char == '$' && !$isInQuotes && !$isPrevCharBK)
            {
                if($isInVariable) {
                    throw new Exception ("Syntax Error: Invalid variable name in formula: $expr");
                }
            }

			// check parantheses open/close
			if ( $char == '(' ) {
				$level++;
			} else if ( $char == ')' ) {
				$level--;
			}
			// argument splitting
			else if ( $char == ',' && $level == 0 ) {
				$subExp = Parser::evaluate($argument, $context);
                $subExp->context = $context;
                $args[] = $subExp;
				$argument = "";
				continue;
			}

			// construct the next argument
			$argument .= $char;
		}


		// now check to make sure all the parantheses opened were closed
		if ( $level != 0 )	{
            throw new Exception("Syntax Error (Incorrectly Matched Parantheses) in formula: $expr");
            return;
        }

		// now check to make sure all the quotes opened were closed
		if ( $isInQuotes )	if ( $level != 0 ) {
            throw new Exception("Syntax Error (Unterminated String Literal) in formula: $expr");
            return;
        }

		// require and return the appropriate expression object
		require_once( $FUNCTION_MAP[$func]['src'] );
        $expObject = new $FUNCTION_MAP[$func]['class']($args);
        if ($context) {
            $expObject->context = $context;
        }
		return $expObject;
	}

	/**
	 * Takes in a string and returns a ConstantExpression if the
	 * string can be converted to a constant.
	 */
	static function toConstant($expr) {
		require_once( "include/Expressions/Expression/Numeric/ConstantExpression.php");

		// a raw numeric constant
		if ( preg_match('/^(\-)?[0-9]+(\.[0-9]+)?$/', $expr) ) {
			return new ConstantExpression($expr);
		}

		// a pre defined numeric constant
		require( "include/Expressions/Expression/Numeric/constants.php");
		if (isset($NUMERIC_CONSTANTS[$expr]))
		{
			return new ConstantExpression($NUMERIC_CONSTANTS[$expr]);
		}

		// a constant string literal
		if ( preg_match('/^".*"$/', $expr) ) {
			$expr = substr($expr, 1, -1);		// remove start/end quotes
			require_once( "include/Expressions/Expression/String/StringLiteralExpression.php");
			return new StringLiteralExpression( $expr );
		}

		// a boolean
		if ( $expr == "true" ) {
			require_once( "include/Expressions/Expression/Boolean/TrueExpression.php");
			return new TrueExpression();
			/*require_once( "include/Expressions/Expression/Expression.php");
			return AbstractExpression::$TRUE;*/
		} else if ( $expr == "false" ) {
			require_once( "include/Expressions/Expression/Boolean/FalseExpression.php");
			return new FalseExpression();
			/*require_once( "include/Expressions/Expression/Expression.php");
			return AbstractExpression::$FALSE;*/
		}

		// a date
		if ( preg_match('/^(0[0-9]|1[0-2])\/([0-2][0-9]|3[0-1])\/[0-3][0-9]{3,3}$/', $expr) ) {
			$day   = floatval(substr($expr, 0, 2));
			$month = floatval(substr($expr, 3, 2));
			$year  = floatval(substr($expr, 6, 4));
			require_once( "include/Expressions/Expression/String/StringLiteralExpression.php");
			require_once('include/Expressions/Expression/Date/DefineDateExpression.php');
			//return new DefineDateExpression(array($day, $month, $year));
			return new DefineDateExpression(new StringLiteralExpression( $expr ));
		}

		// a time
		if ( preg_match('/^([0-1][0-9]|2[0-4]):[0-5][0-9]:[0-5][0-9]$/', $expr) ) {
			$hour   = floatval(substr($expr, 0, 2));
			$minute = floatval(substr($expr, 3, 2));
			$second = floatval(substr($expr, 6, 2));
			require_once( "include/Expressions/Expression/String/StringLiteralExpression.php");
			require_once('include/Expressions/Expression/Time/DefineTimeExpression.php');
			//return new DefineTimeExpression(array($hour, $minute, $second));
			return new DefineDateExpression($expr);
		}

		// neither
		return null;
	}

	/**
	 * Throws a custom exception with a predefined prefix and message.
	 */
	static function throwException($function, $type, $message) {
		throw new Exception("$function : $type ($message)");
	}

	/**
     * @deprecated
	 * returns the expression with the variables replaced with the values in target.
	 *
	 * @param string $expr
	 * @param Array/SugarBean $target
	 */
	static function replaceVariables($expr, $target) {
		$target->load_relationships();
        $variables = Parser::getFieldsFromExpression($expr);
		$ret = $expr;
		foreach($variables as $field) {
			if (is_array($target))
			{
				if (isset($target[$field])) {
					$val = Parser::getFormatedValue($target[$field], $field);
					$ret = str_replace("$$field", $val, $ret);
				} else {
				    continue;
                    //throw new Exception("Unknown variable $$field in formula: $expr");
                    //return;
				}
			} else
			{
				//Special case for link fields
                if (isset($target->field_defs[$field]) && $target->field_defs[$field]['type'] == "link")
                {
                    $val = "link(\"$field\")";
                    $ret = str_replace("$$field", $val, $ret);
                }
                else if (isset ($target->$field)) {

                        $val = Parser::getFormatedValue($target->$field, $field);
                        $ret = str_replace("$$field", $val, $ret);
                    } else  {
                        continue;
                       // throw new Exception("Unknown variable $$field in formula: $expr");
                       // return;
                    }
                }
			}
		return $ret;
	}

	private static function getFormatedValue($val, $fieldName) {
		//Boolean values
		if ($val === true) {
			return AbstractExpression::$TRUE;
		} else if ($val === false) {
			return AbstractExpression::$FALSE;
		}

		//Number values will be stripped of commas
		if (preg_match('/^(\-)?[0-9,]+(\.[0-9]+)?$/', $val)) {
			$val = str_replace(',', '', $val);
		}
		//Strings should be quoted
		else {
			$val = '"' . $val . '"';
		}

		return $val;
	}

    /**
     * @static
     * @param $expr
     * @param SugarBean $context
     * @return array
     */
    static function getFieldsFromExpression($expr, $fieldDefs = false) {
    	$matches = array();
    	preg_match_all('/\$(\w+)/', $expr, $matches);
    	$fields = array_values($matches[1]);
        if ($fieldDefs){
            //Now attempt to map the relate field to the link
            foreach($fieldDefs as $name => $def)
            {
                if (isset($def['type']) && $def['type'] == 'relate' && !empty($def['link']) && in_array($def['link'], $fields) && !empty($def['id_name']))
                {
                    $fields[] = $def['id_name'];
                }
            }
        }
        return $fields;
    }
}
?>