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

require_once("include/Expressions/Trigger.php");
require_once("include/Expressions/Dependency.php");
require_once("include/Expressions/Expression/Parser/Parser.php");
require_once("include/Expressions/Expression/AbstractExpression.php");

/**
 * Base action class
 * @api
 */
abstract class AbstractAction {
	protected $targetField = array();
    protected $params = array();

	/**
	 * Actions are expressions which modify data or layouts.
	 *
	 * @param Array $params A set of parameters to use in this action.
	 * @return AbstractAction
	 */
	function AbstractAction($params) {
		$this->params = $params;
		if (is_array($params) && isset($params['target'])) {
			$this->targetField = $params['target'];
		} else {
			$this->targetField = $params;
		}
	}

	/**
	 * Returns the javascript class equavalent to this php class
	 *
	 * @return string javascript.
	 */
	abstract static function getJavascriptClass() ;

	/**
	 * Returns the javascript code to create a new action of this type
	 * and execute the action.
	 *
	 * @return string javascript.
	 */
	abstract function getJavascriptFire();

	/**
	 * Applies the Action to the target.
	 *
	 * @param SugarBeam $target
	 */
	abstract function fire(&$target);

	/**
	 * Returns the definition of this action in array format.
	 *
	 */
	function getDefinition() {
		return array(
			"action" => $this->getActionName(),
	        "params" => $this->params,
	    );
	}

	abstract static function getActionName();

}

function handleExpressionError($errno, $errstr, $errfile, $errline, array $errcontext)
{
    $GLOBALS['log']->fatal("Error evaluating expression: {$errstr}\nLine {$errline} of file {$errfile}");
}