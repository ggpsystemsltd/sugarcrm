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
require_once("include/Expressions/Actions/AbstractAction.php");
require_once("include/Expressions/Actions/ReadOnlyAction.php");
require_once("include/Expressions/Actions/VisibilityAction.php");
require_once("include/Expressions/Expression/Parser/Parser.php");

/**
 * Generic dependency
 * @api
 */
class Dependency
{
	protected $trigger;
	protected $actions = array();
	protected $falseActions = array();
	protected $id = "";
	protected $fireOnLoad = false;

	function Dependency($id) {
		$this->id = $id;
		$this->trigger = new Trigger('true');
	}

	function setFireOnLoad($onLoad) {
		$this->fireOnLoad = $onLoad;
	}

	/**
	 * Sets the trigger expressions of this dependency or creates a new Trigger from the array if
	 * Trigger metadata is passed.
	 *
	 * @param Array/Action $action
	 */
	function setTrigger($trigger) {
		if (is_array($trigger)) {
			$this->trigger = new Trigger($trigger);
		} else {
			$this->trigger = $trigger;
		}
	}

	/**
	 * Adds a new action to this dependency or creates a new Action from the meta if
	 * Action metadata is passed.
	 *
	 * @param Array/Action $action
	 */
	function addAction($action) {
	if (empty($action)) {
	   return;
	}
	if (is_array($action)) {
			$this->actions[] = new Action($action);
		} else {
			$this->actions[] = $action;
		}
	}

	/**
	 * Adds a new action which will be fired when this dependency's trigger is false.
	 *
	 * @param Array/Action $action
	 */
	function addFalseAction($action) {
		if (is_array($action)) {
			$this->falseActions[] = new Action($action);
		} else {
			$this->falseActions[] = $action;
		}
	}

	/**
	 * Returns the javascript equivalent of this dependency.
	 */
	function getJavascript($form = "EditView") {
		if (empty($this->actions)) return "";

		$js = "var {$this->id}dep = new SUGAR.forms.Dependency(" .
			$this->trigger->getJavascript() . ", ";
		//Normal Actions
		$js .= "[";
		for ($i=0; $i < sizeOf($this->actions); $i++) {
			$js .= $this->actions[$i]->getJavascriptFire();
			if ($i < sizeOf($this->actions) - 1) {
				$js .= ",";
			}
		}
		$js .= "]";
		//False Actions
		$js .= ",[";
			for ($i=0; $i < sizeOf($this->falseActions); $i++) {
				$js .= $this->falseActions[$i]->getJavascriptFire();
				if ($i < sizeOf($this->falseActions) - 1) {
					$js .= ",";
				}
			}
		$js .= "]";
		if ($this->fireOnLoad) {
			$js .= ",true";
		} else {
            $js .= ",false";
        }

		$js .= ",'$form');\n";

		return $js;
	}

	/**
	 * Returns the definition of the dependency in array format.
	 */
	function getDefinition() {
		$def = array (
			"name" => $this->id,
	        "condition" => $this->trigger->getCondition(),
			"actions" => array(),
		);

		foreach($this->actions as $action) {
			$def['actions'][] = $action->getDefinition();
		}

		return  $def;
	}

	/**
	 * Runs the dependency on the target bean.
	 *
	 * @param SugarBean $target
	 */
	function fire(&$target) {
		try {
		  if ($this->trigger->evaluate($target) === true) {
			     $this->fireActions($target);
			} else {
				$this->fireActions($target, true);
			}
		} catch (Exception $e)
		{
			$GLOBALS['log']->fatal($e->getMessage());
			$GLOBALS['log']->fatal("Trigger was : {$this->trigger->conditionFunction}");
		}
	}

	/**
	 * Performs the actions in this dependency on the target.
	 *
	 * @param SugarBean $target
	 * @param boolean $useFalse
	 */
	private function fireActions(&$target, $useFalse = false) {
		$action = "";
		try {
			$actions = $this->actions;
			if ($useFalse)
				$actions = $this->falseActions;
			foreach ($actions as $action) {
				$action->fire($target);
			}
		} catch (Exception $e)
        {
            $GLOBALS['log']->fatal($e->getMessage());
            $GLOBALS['log']->fatal("Trigger was : {$this->trigger->conditionFunction}");
            $GLOBALS['log']->fatal("Target was : " . print_r($action, true));

        }
	}

	function getFireOnLoad()
	{
		return $this->fireOnLoad;
	}

}
?>