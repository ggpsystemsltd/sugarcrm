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

require_once("include/Expressions/Actions/AbstractAction.php");
require_once("include/Expressions/Expression/Date/DateExpression.php");

class SetValueAction extends AbstractAction{
	protected $expression =  "";

	function SetValueAction($params) {
		$this->targetField = $params['target'];
		$this->expression = str_replace("\n", "",$params['value']);
	}

	/**
	 * Returns the javascript class equavalent to this php class
	 *
	 * @return string javascript.
	 */
	static function getJavascriptClass() {
		return  "
		SUGAR.forms.SetValueAction = function(target, valExpr) {
			this.expr = valExpr;
			this.target = target;
		};
		SUGAR.util.extend(SUGAR.forms.SetValueAction, SUGAR.forms.AbstractAction, {
			exec : function(context)
			{
				if (typeof(context) == 'undefined')
				    context = this.context;

				try {
				    var val = this.evalExpression(this.expr, context);
				    context.setValue(this.target, val);
				} catch (e) {
			        context.setValue(this.target, '');
			    }
	       }
		});";
	}


	/**
	 * Returns the javascript code to generate this actions equivalent.
	 *
	 * @return string javascript.
	 */
	function getJavascriptFire() {
		return  "new SUGAR.forms.SetValueAction('{$this->targetField}','" . addslashes($this->expression) . "')";
	}




	/**
	 * Applies the Action to the target.
	 *
	 * @param SugarBean $target
	 */
	function fire(&$target) {
        set_error_handler('handleExpressionError');
        try {
            $result = Parser::evaluate($this->expression, $target)->evaluate();
        } catch(Exception $e){
            $GLOBALS['log']->fatal("Exception evaluating expression in SetValueAction, {$this->expression} : {$e->getMessage()}\n{$e->getTraceAsString()}");
            $result = "";
        }
        restore_error_handler();
        $field = $this->targetField;
        $def = array();
        if (!empty($target->field_defs[$field]))
            $def  = $target->field_defs[$field];
        if ($result instanceof DateTime)
        {
            global $timedate;
            if (isset($def['type']) && $def['type'] == "datetime")
            {
                $result = DateExpression::roundTime($result);
                $target->$field = $timedate->asDb($result);
            }
            else if (isset($def['type']) && $def['type'] == "date")
            {
                $result = DateExpression::roundTime($result);
                $target->$field = $timedate->asDbDate($result);
            } else {
                //If the target field isn't a date, convert it to a user formated string
                if (isset($result->isDate) && $result->isDate)
                    $target->$field = $timedate->asUserDate($result);
                else
                    $target->$field = $timedate->asUser($result);
            }
        }
        else if (isset($def['type']) && $def['type'] == "bool")
        {
            $target->$field = $result === true || $result === AbstractExpression::$TRUE;
        }
        else
        {
            $target->$field = $result;
        }
	}

	/**
	 * Returns the definition of this action in array format.
	 *
	 */
	function getDefinition() {
		return array(
			"action" => $this->getActionName(),
	        "target" => $this->targetField,
	        "value" => $this->expression,
	    );
	}

	static function getActionName() {
		return "SetValue";
	}
}