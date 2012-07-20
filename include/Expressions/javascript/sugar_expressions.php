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
 * STEP 1: This class compiles all the JavaScript functions and
 * utilities necessary for the expression parsing to work
 * on the JavaScript side into a single .js file.
 */


/**
 * TODO:
 * 1) Clean Comments out (minify js)
 * 2) Clean out liberal use of space
 * 3) Change the namespace for Expression and subclasses (eg. SUGAR.expressions.math.Expression)
 * 4) Prefix exceptions with function name (eg. 'add: All parameters must be of type "number"')
 * 5) Add caching for this file
 */


/**
 * First echo the basic Expression JavaScript object class.
 */
echo <<<EXPRESSIONJS
(function() {
/**
 * The current namespaces.
 */
if ( typeof(SUGAR) == 'undefined' ) SUGAR = {};
if ( typeof(SUGAR.expressions) == 'undefined' ) SUGAR.expressions = {};
if ( typeof(SUGAR.util) == 'undefined' ) SUGAR.util = {};

// to prevent from breaking old code
SUGAR.Expression = {
	TRUE: "true", FALSE: "false"
};

/**
 * A function that extends functionality from parent to child.
 */
SUGAR.util.extend = function(subc, superc, overrides) {
	subc.prototype = new superc;	// set the superclass
	// overrides
	if (overrides) {
	    for (var i = 0; i < overrides.length; i++)	subc.prototype[i] = overrides[i];
	}
};

/**
 * Constructs an Expression object given the parameters.
 */
SUGAR.expressions.Expression = function() {
};


/**
 * Designates an infinite number of parameters.
 */
SUGAR.expressions.Expression.INFINITY = -1;

/**
 * The various types supported by Expression.
 */
SUGAR.expressions.Expression.STRING_TYPE   	= "string";
SUGAR.expressions.Expression.NUMERIC_TYPE  	= "number";
SUGAR.expressions.Expression.DATE_TYPE 	 	= "date";
SUGAR.expressions.Expression.TIME_TYPE 	 	= "time";
SUGAR.expressions.Expression.BOOLEAN_TYPE 	= "boolean";
SUGAR.expressions.Expression.ENUM_TYPE 	 	= "enum";
SUGAR.expressions.Expression.GENERIC_TYPE  	= "generic";

/**
 * The two boolean values.
 */
SUGAR.expressions.Expression.TRUE  = "true";
SUGAR.expressions.Expression.FALSE = "false";


/**
 * Initializes the Expression object.
 */
SUGAR.expressions.Expression.prototype.init = function(params) {
	// check if the parameter is an array with only one value
	if ( params instanceof Array && params.length == 1 ) {
		this.params = params[0];
	}

	// if params is an array or just a constant
	else {
		this.params = params;
	}

	// validate the parameters
	this.validateParameters();
};

/**
 * Returns the parameter list for this Expression.
 */
SUGAR.expressions.Expression.prototype.getParameters = function() {
	return this.params;
};

/**
 * Validates the parameters and throws an Exception if invalid.
 */
SUGAR.expressions.Expression.prototype.validateParameters = function() {
	var params = this.getParameters();
	var count  = this.getParamCount();
	var types  = this.getParameterTypes();

	/* parameter and type validation */

	// make sure count is a number
	if ( typeof(count) != 'number' ) {
		throw ("Number of paramters required must be a number");
	}

	// make sure types is a array or a string
	if ( typeof(types) != 'string' && ! (types instanceof Array) ) {
		throw ("Parameter types must be valid and match the parameter count");
	}

	// make sure sizeof types is equal to parameter count
	if ( types instanceof Array && count != SUGAR.expressions.Expression.INFINITY && count != types.length ) {
		throw ("Parameter types must be valid and match the parameter count");
	}

	// make sure types is valid
	if ( typeof(types) == 'string' ) {
		if ( SUGAR.expressions.Expression.TYPE_MAP[types] == null ) {
			throw ("Invalid type requirement '" + types + "'");
		}
	} else {
		for ( var i = 0; i < types.length; i++ ) {
			if ( typeof( SUGAR.expressions.Expression.TYPE_MAP[types[i]]) == 'undefined' ) {
				throw ("Invalid type requirement '" + types[i] + "'");
			}
		}
	}

	/* parameter and count validation */

	// if we want 0 params and we got 0 params, forget it
	if ( count == 0 && typeof(params) == 'undefined' )	{	return; }

	// if we want a single param, validate that param
	if ( count == 1 && this.isProperType(params, types) ) {	return; }

	// we require multiple but params only has 1
	if ( count > 1 && ! (params instanceof Array) ) {
		throw ("Requires exactly " + count + " parameter(s)");
	}

	// we require only 1 and params has multiple
	if ( count == 1 && params instanceof Array ) {
		throw ("Requires exactly 1 parameter");
	}

	// check parameter count
	if ( count != SUGAR.expressions.Expression.INFINITY && params instanceof Array && params.length != count ) {
		throw ("Requires exactly " + count + " parameter(s)");
	}

	// if a generic type is specified
	if ( typeof(types) == 'string' ) {
		// only a single parameter
		if ( ! (params instanceof Array) ) {
			if ( this.isProperType( params, types ) ) {
				return;
			}
			throw ("Parameter must be of type '" + types + "'");
		}

		// multiple parameters
		for ( var i = 0 ; i < params.length ; i ++ ) {
			if ( ! this.isProperType( params[i], types ) ) {
				throw ("All parameters must be of type '" + types + "'");
			}
		}
	}

	// if strict type constraints are specified
	else {
		// only a single parameter
		if ( ! (params instanceof Array) ) {
			if ( this.isProperType( params, types[0] ) ) {
				return;
			}
			throw ("Parameter must be of type '" + types[0] + "'");
		}

		// improper type
		for ( var i = 0 ; i < types.length ; i++ ) {
			if ( ! this.isProperType( params[i], types[i] ) ) {
				throw ("The parameter at index " + i + " must be of type " + types[i] );
			}
		}
	}
};

/**
 * Returns the exact number of parameters needed.
 */
SUGAR.expressions.Expression.prototype.getParamCount = function() {
	return SUGAR.expressions.expressions.Expression.INFINITY;
};

/**
 * Enforces the parameter types.
 */
SUGAR.expressions.Expression.prototype.isProperType = function(variable, type) {
	if ( type instanceof Array ) {
		return false;
	}

	// retrieve the class
	var c = SUGAR.expressions.Expression.TYPE_MAP[type];

	// check if type is empty
	if ( typeof(c) == 'undefined' || c == null || c == '' ) {
		return false;
	}

	// check if it's an instance of type
	var isInstance = variable instanceof c;

	// now check for generics
	switch(type) {
		case SUGAR.expressions.Expression.STRING_TYPE:
			return ( isInstance || typeof(variable) == 'string' );
			break;
		case SUGAR.expressions.Expression.NUMERIC_TYPE:
			return ( isInstance || typeof(variable) == 'number' );
			break;
		case SUGAR.expressions.Expression.BOOLEAN_TYPE:
			if ( variable instanceof SUGAR.expressions.expressions.Expression ) {
				variable = variable.evaluate();
			}
			return ( isInstance || variable == SUGAR.expressions.Expression.TRUE || variable == SUGAR.expressions.Expression.FALSE );
			break;
	}

	// just return whether it is an instance or not
	return isInstance;
};

/** ABSTRACT METHODS **/

/**
 * Evaluates this expression and returns the resulting value.
 */
SUGAR.expressions.Expression.prototype.evaluate = function() {
	// does nothing .. needs to be overridden
	alert("Please override me 1!");
};


/**
 * Returns the type each parameter should be.
 */
SUGAR.expressions.Expression.prototype.getParameterTypes = function() {
	// does nothing .. needs to be overridden
	alert("Please override me 2!");
};



/** GENERIC TYPE EXPRESSIONS **/

/**
 * Construct a new NumericExpression.
 */
SUGAR.expressions.NumericExpression = function(params) {
	//this.init(params);
};
SUGAR.util.extend(SUGAR.expressions.NumericExpression, SUGAR.expressions.Expression, {
	/**
	 * All parameters have to be a number by default.
	 */
	getParameterTypes: function() {
		return SUGAR.expressions.Expression.NUMERIC_TYPE;
	}
});


/**
 * Construct a new StringExpression.
 */
SUGAR.expressions.StringExpression = function(params) {
	//this.init(params);
};
SUGAR.util.extend(SUGAR.expressions.StringExpression, SUGAR.expressions.Expression, {
	/**
	 * All parameters have to be a string by default.
	 */
	getParameterTypes: function() {
		return SUGAR.expressions.Expression.STRING_TYPE;
	}
});


/**
 * Construct a new BooleanExpression.
 */
SUGAR.expressions.BooleanExpression = function(params) {
	//this.init(params);
};
SUGAR.util.extend(SUGAR.expressions.BooleanExpression, SUGAR.expressions.Expression, {
	/**
	 * All parameters have to be a sugar-boolean by default.
	 */
	getParameterTypes: function() {
		return SUGAR.expressions.Expression.BOOLEAN_TYPE;
	}
});


/**
 * Construct a new EnumExpression.
 */
SUGAR.expressions.EnumExpression = function(params) {
	//this.init(params);
};
SUGAR.util.extend(SUGAR.expressions.EnumExpression, SUGAR.expressions.Expression, {
	/**
	 * All parameters have to be an enumeration by default.
	 */
	getParameterTypes: function() {
		return SUGAR.expressions.Expression.ENUM_TYPE;
	}
});


/**
 * Construct a new DateExpression.
 */
SUGAR.expressions.DateExpression = function(params) {
	//this.init(params);
};
SUGAR.util.extend(SUGAR.expressions.DateExpression, SUGAR.expressions.Expression, {
	/**
	 * All parameters have to be date by default.
	 */
	getParameterTypes: function() {
		return SUGAR.expressions.Expression.DATE_TYPE;
	}
});


/**
 * Construct a new TimeExpression.
 */
SUGAR.expressions.TimeExpression = function(params) {
	//this.init(params);
};
SUGAR.util.extend(SUGAR.expressions.TimeExpression, SUGAR.expressions.Expression, {
	/**
	 * All parameters have to be time by default.
	 */
	getParameterTypes: function() {
		return SUGAR.expressions.Expression.TIME_TYPE;
	}
});




/**
 * The type to object map for dynamic expression
 * creation and type validation.
 */
SUGAR.expressions.Expression.TYPE_MAP	= {
		"number" 	: SUGAR.expressions.NumericExpression,
		"string" 	: SUGAR.expressions.StringExpression,
		"date" 		: SUGAR.expressions.DateExpression,
		"time" 		: SUGAR.expressions.TimeExpression,
		"boolean" 	: SUGAR.expressions.BooleanExpression,
		"enum" 		: SUGAR.expressions.EnumExpression,
		"generic" 	: SUGAR.expressions.Expression
};


})();

EXPRESSIONJS;



/**
 * STEP 2: 	Compile the code for the available operations mostly
 * 			generated in the 'functions_cache_new.js' file.
 */
//echo "(function(){\n";

echo <<<EOQ
//(function(){

/**
 * Construct a new ConstantExpression.
 */
SUGAR.expressions.ConstantExpression = function(params) {
	this.init(params);
}

SUGAR.util.extend(SUGAR.expressions.ConstantExpression, SUGAR.expressions.NumericExpression, {
	evaluate: function() {
		return this.getParameters();
	},
	getParamCount: function() {
		return 1;
	}
});

/**
 * Construct a new StringLiteralExpression.
 */
SUGAR.expressions.StringLiteralExpression = function(params) {
	this.init(params);
}
SUGAR.util.extend(SUGAR.expressions.StringLiteralExpression, SUGAR.expressions.StringExpression, {
	evaluate: function() {
		return this.getParameters();
	},
	getParamCount: function() {
		return 1;
	}
});

/**
 * Construct a new FalseExpression.
 */
SUGAR.expressions.FalseExpression = function(params) {
	this.init(params);
}
SUGAR.util.extend(SUGAR.expressions.FalseExpression, SUGAR.expressions.BooleanExpression, {
	evaluate: function() {
		return SUGAR.expressions.Expression.FALSE;
	},
	getParamCount: function() {
		return 0;
	}
});

/**
 * Construct a new TrueExpression.
 */
SUGAR.expressions.TrueExpression = function(params) {
	this.init(params);
}
SUGAR.util.extend(SUGAR.expressions.TrueExpression, SUGAR.expressions.BooleanExpression, {
	evaluate: function() {
		return SUGAR.expressions.Expression.TRUE;
	},
	getParamCount: function() {
		return 0;
	}
});

EOQ;


// now include the cached list of functions
include('./functions_cache_new.js');
//include('./temp_cache.js');

// end the anonymous function
//echo "\n})();";



/**
 * STEP 3: 	Echo the ExpressionParser framework which manages
 * 			parsing and error handling.
 */


echo <<<EOQ
//(function(){

/**
 * The ExpressionParser object.
 */
SUGAR.expressions.ExpressionParser = function() {
	// nothing
};

/**
 * Evaluate a given string expression and return an Expression
 * object.
 */
SUGAR.expressions.ExpressionParser.prototype.evaluate = function(expr)
{
	// make sure it is only parsing strings
	if ( typeof(expr) != 'string' )	throw "ExpressionParser requires a string expression.";

	// trim spaces, left and right
	expr = expr.replace(/^\s+|\s+$/g,"");

		// check if its a constant and return a constant expression
	var fixed = this.toConstant(expr);
	if ( fixed != null && typeof(fixed) != 'undefined' )
		return fixed;

	// VALIDATE: expression format
	if ( (/^[a-zA-Z0-9_\-]+\(.*\)$/).exec(expr) == null )
		throw ("Syntax Error (Expression Format Incorrect '" + expr + "' )");

	// EXTRACT: Function
	var open_paren_loc = expr.indexOf('(');

	// if no open-paren '(' found
	if ( open_paren_loc < 0 )
		throw ("Syntax Error (No opening paranthesis found)");

	// get the function
	var func = expr.substring(0, open_paren_loc);

	if ( SUGAR.expressions.FunctionMap[func] == null )
		throw (func + ": No such function defined");

	// EXTRACT: Parameters
	var params = expr.substring(open_paren_loc + 1, expr.length-1);

	// now parse the individual parameters recursively
	var level  = 0;
	var length = params.length;
	var argument = "";
	var args = new Array();

	// flags
	var char 			= null;
	var lastCharRead	= null;
	var justReadString	= false;		// did i just read in a string
	var isInQuotes 		= false;		// am i currently reading in a string
	var isPrevCharBK 	= false;		// is my previous character a backslash

	for ( var i = 0 ; i <= length ; i++ ) {
		// store the last character read
		lastCharRead = char;

		// the last parameter
		if ( i == length ) {
			args[args.length] = this.evaluate(argument);
			break;
		}

		// set isprevcharbk
		isPrevCharBK = ( lastCharRead == '\\\\' );

		// get the charAt index i
		char = params.charAt(i);

		// if i am in quotes, then keep reading
		if ( isInQuotes && char != '"' && !isPrevCharBK ) {
			argument += char;
			continue;
		}

		// check for quotes
		if ( char == '"' && !isPrevCharBK && level == 0 )
		{
			// if i am ending a quote, then make sure nothing follows
			if ( isInQuotes ) {
				// only spaces may follow the end of a string
				var end_reg = params.indexOf(",", i);
				if ( end_reg < 0 )	end_reg = params.length-1;
				var start_reg = ( i < length - 1 ? i+1 : length - 1);

				var temp = params.substring(start_reg , end_reg );
				if ( (/^\s*$/).exec(temp) == null )
					throw (func + ": Syntax Error (Improperly Terminated String '" + temp + "')" + (start_reg) + " " + end_reg);
			}

			// negate if i am in quotes
			isInQuotes = !isInQuotes;
		}

		// check parantheses open/close
		if ( char == '(' ) {
			level++;
		} else if ( char == ')' ) {
			level--;
		}

		// argument splitting
		else if ( char == ',' && level == 0 ) {
			args[args.length] = this.evaluate(argument);
			argument = "";
			continue;
		}

		// construct the next argument
		argument += char;
	}

	// now check to make sure all the quotes opened were closed
	if ( isInQuotes )	throw ("Syntax Error (Unterminated String Literal)");

	// now check to make sure all the parantheses opened were closed
	if ( level != 0 )	throw ("Syntax Error (Incorrectly Matched Parantheses)");

	// require and return the appropriate expression object
	return new SUGAR.expressions.FunctionMap[func](args);
}



/**
 * Takes in a string and returns a ConstantExpression if the
 * string can be converted to a constant.
 */
SUGAR.expressions.ExpressionParser.prototype.toConstant = function(expr) {
	// a raw numeric constant
	if ( (/^(\-)?[0-9]+(\.[0-9]+)?$/).exec(expr) != null ) {
		return new SUGAR.expressions.ConstantExpression( parseFloat(expr) );
	}

	// a pre defined numeric constant
	var fixed = SUGAR.expressions.NumericConstants[expr];
	if ( fixed != null && typeof(fixed) != 'undefined' )
		return new SUGAR.expressions.ConstantExpression( parseFloat(fixed) );

	// a constant string literal
	if ( (/^".*"$/).exec(expr) != null ) {
		expr = expr.substring(1, expr.length-1);		// remove start/end quotes
		return new SUGAR.expressions.StringLiteralExpression( expr );
	}

	// a boolean
	if ( expr == "true" ) {
		return new SUGAR.expressions.TrueExpression();
	} else if ( expr == "false" ) {
		return new SUGAR.expressions.FalseExpression();
	}

	// a date
	if ( (/^(0[0-9]|1[0-2])\/([0-2][0-9]|3[0-1])\/[0-3][0-9]{3,3}$/).exec(expr) != null ) {
		var day   = parseFloat(expr.substring(0, 2));
		var month = parseFloat(expr.substring(3, 2));
		var year  = parseFloat(expr.substring(6, 4));
		return new SUGAR.expressions.DateExpression([day, month, year]);
	}

	// a time
	if ( (/^([0-1][0-9]|2[0-4]):[0-5][0-9]:[0-5][0-9]$/).exec(expr) != null ) {
		var hour   = parseFloat(expr.substring(0, 2));
		var minute = parseFloat(expr.substring(3, 2));
		var second = parseFloat(expr.substring(6, 2));
		return new SUGAR.expressions.TimeExpression([hour, minute, second]);
	}

	// neither
	return null;
}

//})();
EOQ;

?>