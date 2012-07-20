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
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc. All Rights
 * Reserved. Contributor(s): ______________________________________..
 *********************************************************************************/

/**
 * SugarRouting class
 *
 * Routing and Rules implementation, initially for Email 2.0.
 */
class SugarRouting {
	var $user; // user in focus
	var $bean; // bean in focus
	var $rules; // array containing rule sets
	var $rulesCache; // path to folder containing rules files
	var $actions = array( // array containing function names defined in baseActions.php
		//'delete_bean',
		//'delete_file',
		'move_mail',
		'copy_mail',
		'_break',
		'forward',
		'reply',
		'_break',
		'mark_read',
		'mark_unread',
		'mark_flagged',
		'_break',
		'delete_mail',
	);
	var $customActions;

	/**
	 * Sole constructor
	 */
	function SugarRouting($bean, $user) {
		if(!empty($bean)) {
			if($user == null) {
				global $current_user;
				$user = $current_user;
			}
			$this->user = $user;
			$this->bean = $bean;
			$this->loadRules();
		}
	}


	/**
	 * Saves a rule
	 * @param array $rules Passed $_REQUEST var
	 */
	function save($rules) {
		require_once('include/SugarDependentDropdown/SugarDependentDropdown.php');
		global $beanFiles;
		global $sugar_config;

		// get seed bean & load rules
		if(empty($beanFiles)) {
			include("include/modules.php");
		}

		if(isset($beanFiles[$rules['bean']])) {
			require_once($beanFiles[$rules['bean']]);
			$bean = new $rules['bean']();
		} else {
			$bean = new SugarBean();
		}

		$this->loadRules();

		// need $sdd->metadata
		$sdd = new SugarDependentDropdown("include/SugarDependentDropdown/metadata/dependentDropdown.php");

		$dd = $sdd->metadata;

		//
		$tmpRuleGroup = array();
		foreach($rules as $k => $v) {
			if(strpos($k, "::") !== false) {
				$exItem = explode("::", $k);

				if(!isset($tmpRuleGroup[$exItem[0]])) {
					$tmpRuleGroup[$exItem[0]] = array();
				}

				$tmpRuleGroup[$exItem[0]][$exItem[1]][$exItem[2]] = $v;
			}
		}

		// clean out index so it back to 0-index, 1 increment
		$ruleGroup = array();
		foreach($tmpRuleGroup as $item => $toClean) {
			$cleaned = array();

			foreach($toClean as $dirtyItem) {
				$cleaned[] = $dirtyItem;
			}

			$ruleGroup[$item] = $cleaned;
		}
		/* should now have something like:
		Array(
		    [criteriaGroup] => Array
			(
			    [0] => Array
				(
				    [crit0] => name
				    [crit1] => notmatch
				    [crit2] => /test/i
				)
			    [100] => Array
				(
				    [crit0] => from_addr
				    [crit1] => match
				    [crit2] => /chris@sugarcrm.com/i
				)
			)
		    [actionGroup] => Array
			(
			    [0] => Array
				(
				    [action0] => move_mail
				    [action1] => sugar::9e559ad1-a900-3c38-d846-464c931908be
				)
			    [100] => Array
				(
				    [action0] => move_mail
				    [action1] => remote::6694aa20-0036-ffa7-ea7f-464c936db8cf::INBOX::test
				)
			)
		)
		*/

		//_pp($ruleGroup);

		/* create the rule array */
		$criteria = array();
		foreach($ruleGroup['criteriaGroup'] as $index => $grouping) {
			$criteria[$index]['action'] = $grouping;
		}
		$actions = array();
		foreach($ruleGroup['actionGroup'] as $index => $grouping) {
			$actions[$index]['action'] = $grouping;
		}

		$guid = (empty($rules['id'])) ? create_guid() : $rules['id'];
		$all = ($rules['all'] == 1) ? true : false;
		$newrule = array(
			'id'		=> $guid,
			'name'		=> $rules['name'],
			'active'	=> true,
			'all'		=> $all,
			'criteria'	=> $criteria,
			'actions'	=> $actions,
		);
		//_pp($newrule);

		$new = true;
		if(isset($this->rules) && is_array($this->rules)) {
			foreach($this->rules as $k => $rule) {
				if($rule['id'] == $newrule['id']) {
					$this->rules[$k] = $newrule;
					$new = false;
					break;
				}
			}
		} else {
			// handle brand-new rulesets
			$this->rules = array();
		}

		if($new) {
			$this->rules[] = $newrule;
		}

		//_ppd($this->rules);
		$this->saveRulesToFile();
	}

	/**
	 * Enables/disables a rule
	 */
	function setRuleStatus($id, $status) {
		foreach($this->rules as $k => $rule) {
			if($rule['id'] == $id) {
				$rule['active'] = ($status == 'enable') ? true : false;
				$this->rules[$k] = $rule;
				$this->saveRulesToFile();
				return;
			}
		}

		$GLOBALS['log']->fatal("SUGARROUTING: Could not save rule status [ {$status} ] for user [ {$this->user->user_name} ] rule [ {$id} ]");
	}

	/**
	 * Deletes a rule
	 */
	function deleteRule($rule_id) {
		$this->loadRules();

		$rules = $this->rules;

		$newRules = array();
		foreach($rules as $k => $rule) {
			if($rule['id'] != $rule_id) {
				$newRules[$k] = $rule;
			}
		}

		$this->rules = $newRules;
		$this->saveRulesToFile();
	}

	/**
	 * Takes the values in $this->rules and writes it to the appropriate cache
	 * file
	 */
	function saveRulesToFile() {
		global $sugar_config;

		$file = $this->rulesCache."/{$this->user->id}.php";
		$GLOBALS['log']->info("SUGARROUTING: Saving rules file [ {$file} ]");
		write_array_to_file('routingRules', $this->rules, $file);
	}

	/**
	 * Tries to load a rule set based on passed bean
	 */
	function loadRules() {
		global $sugar_config;

		$this->preflightCache();

		$file = $this->rulesCache."/{$this->user->id}.php";

		$routingRules = array();

		if(file_exists($file))
			include($file); // force include locally

		$this->rules = $routingRules;
	}

	/**
	 * Prepares cache dir for a ruleset.
	 * Sets $this->rulesCache
	 */
	function preflightCache() {
		$moduleDir = (isset($this->bean->module_dir) && !empty($this->bean->module_dir)) ? $this->bean->module_dir : "General";
		$this->rulesCache = sugar_cached("routing/{$moduleDir}");

		if(!file_exists($this->rulesCache)) {
			mkdir_recursive($this->rulesCache);
		}
	}

	/**
	 * Takes a bean and a rule key as an argument and processes the bean according to the rule
	 * @param object $bean Focus bean
	 * @param string $ruleKey Key to the rules array
	 * @return bool
	 *
	 * rule format:
		$routingRules['1'] = array(
			0 => array(
				'id' => 'xxxxxxxxxxxxxxxx',
				'name' => 'Move Email to Sugar Folder [test]',
				'active' => true,
				'all'	=> true,
				'criteria' => array(
					array(
						'type' => 'match',
						'field' => 'name',
						'regex'	=> '/test/i',
						'action' => array(
							'crit0' => 'name',
							'crit1' => 'notmatch',
							'crit2' => '/test/i',
						),
					),
					array(
						'type' => 'match',
						'field' => 'from_addr',
						'regex' => '/chris@sugarcrm.com/i',
						'action' => array(
							'crit0' => 'from_addr',
							'crit1' => 'match',
							'crit2' => '/chris@sugarcrm.com/i',
						),
					),
				),

				'actions' => array(
					0	=> array(
						'function' => 'move_mail',
						'type' => 'move',
						'class' => 'mail',
						'action' => array(
							'action0' => 'move_mail',
							'action1' => 'sugar::9e559ad1-a900-3c38-d846-464c931908be',
						),
						'args' => array(
							'mailbox_id', // passed in sugarbean
							'uid', // temporarily assigned UID attribute
						),
					),
					1	=> array(
						'function' => 'move_mail',
						'type' => 'move',
						'class' => 'mail',
						'action' => array(
							'action0' => 'move_mail',
							'action1' => 'remote::6694aa20-0036-ffa7-ea7f-464c936db8cf::INBOX::test',
						),
						'args' => array(
							'mailbox_id', // passed in sugarbean
							'uid', // temporarily assigned UID attribute
						),
					),
				),
			),

			1 => array(
				'id' => 'yyyyyyyyyyyyyyyyyyy',
				'name' => 'Move Email to IMAP Folder [test]',
				'active' => false,
				'all'	=> true,
				'criteria' => array(
					array(
						'type' => 'match',
						'field' => 'name',
						'regex'	=> '/move/i',
					),
					array(
						'type' => 'match',
						'field' => 'from_addr',
						'regex' => '/chris@sugarcrm.com/i',
					),
				),

				'actions' => array(
					array(
						'function' => 'move_mail',
						'type' => 'move',
						'class' => 'mail',
						'action' => array(
							'action0' => 'move_mail',
							'action1' => 'remote::6694aa20-0036-ffa7-ea7f-464c936db8cf::INBOX::test',
						),
						'args' => array(
							'mailbox_id', // passed in sugarbean
							'uid', // temporarily assigned UID attribute
						),
					),
				),
			),
		);
	 *
	 */
	function processRule($bean, $focusRule, $args) {
		if($this->_checkCriteria($bean, $focusRule)) {
			$GLOBALS['log']->debug("********** SUGARROUTING: rule matched [ {$focusRule['name']} ] -  processing action");
			return $this->_executeAction($bean, $focusRule, $args);
		} else {
			$GLOBALS['log']->debug("********** SUGARROUTING: rule not matched, not processing action");
			return false;
		}
	}

	/**
	 * Iterates through all rulesets to apply them to a given message
	 * @param object $bean SugarBean to be manipulated
	 * @param mixed $args Extra arguments if needed
	 */
	function processRules($bean, $args=null) {
		if(empty($bean)) {
			$GLOBALS['log']->fatal("**** SUGARROUTING: processRules - invalid input object, returning false");
			return false;
		}

		$GLOBALS['log']->debug("**** SUGARROUTING: processing for [ {$bean->name} ]");

		// basic sandboxing
		if(!isset($this->rules) || empty($this->rules)) {
			$GLOBALS['log']->debug("**** SUGARROUTING: processRules - no rule defined, returning false");
			return false;
		}

		foreach($this->rules as $order => $focusRule) {
			if($focusRule['active']) {
				$result = $this->processRule($bean, $focusRule, $args);
				if($result) { // got a "true" back, rule applied, end loop
					return $result;
				}
			}
		}
	}


	function _executeAction($bean, $focusRule, $extraArgs) {
		if(!isset($focusRule['actions'])) {
			return false;
		}

		include_once("include/SugarRouting/baseActions.php");

		$ruleProcessed = false;

		foreach($focusRule['actions'] as $actionBox) {
			$action = $actionBox['action'];
			$function = $action['action0'];

			if(function_exists($function)) {
				/*
				 * The switch() statement below should define a series of
				 * arguments to pass to the user defined function.
				 */
				$args = '\$action';
				/* decide how to manipulate passed information based on action */
				switch($function) {
					case 'forward':
					case 'reply':
					// end forward/reply manipulations

					case "mark_unread":
					case "mark_read":
					case "mark_flagged":
					// end mail markup manipulations - uses same args as move/copy

					case "delete_mail":
					case "move_mail":
					case "copy_mail":
						$args .= ', \$bean';
						$args .= ', \$extraArgs'; // in this case it is the InboundEmail instance in focus
					break; // end move/copy email manipulation actions
				}

				$customCall = "return call_user_func('{$function}', {$args});";
				$GLOBALS['log']->debug("********** SUGARROUTING: action eval'd [ {$customCall} ]");

				$ruleProcessed = eval($customCall);
			} else {
				$GLOBALS['log']->fatal("********** SUGARROUTING: action not matched [ {$function} ] - not processing action");
			}
		}
		if($ruleProcessed)
			$GLOBALS['log']->debug("SUGARROUTING: returning TRUE from _executeAction()");
		else
			$GLOBALS['log']->debug("SUGARROUTING: returning FALSE from _executeAction()");

		return $ruleProcessed;
	}

	/**
	 * processes a rule's matching criteria, returns true on good match
	 * @param object $bean SugarBean to process
	 * @param array $focusRule Ruleset to use matching criteria
	 * @return bool
	 *
	 * ******************************************************************
	 * ******************************************************************
	 * DO NOT CHANGE THIS METHOD UNLESS CHRIS (OR CURRENT OWNER) IS FULLY
	 * AWARE.  THIS IS THE MOST DELICATE CALL IN THIS CLASS.
	 * ******************************************************************
	 * ******************************************************************
	 */
	function _checkCriteria(&$bean, &$focusRule) {
		//_ppl('bean name: '.$bean->name);
		//_ppl($focusRule);
		if(!isset($focusRule['criteria'])) {
			$GLOBALS['log']->debug("********** SUGARROUTING: focusCriteria['criteria'] empty");
			return false;
		}

		/**
		 * matches criteria
		 * We will force a return of TRUE if the "any" flag is checked and some criteria is satisfied.
		 * We will force a return of FALSE if the "all" flag is checked and some criteria is NOT satisfied (catch-all).
		 */
		$allCriteriaFilled = false;

		//_ppl("got [ {$bean->name} ] from [ {$bean->from_addr} ]");

		foreach($focusRule['criteria'] as $criteria) {
			if(is_array($criteria)) {
				$crit = $criteria['action'];

				switch($crit['crit0']) {
					case "priority_high":
					case "priority_normal":
					case "priority_low":
						$GLOBALS['log']->debug("********* SUGARROUTING: got priority criteria");
						$flagged = ($bean->flagged == 1) ? 'priority_high' : 'priority_normal';

						// no match
						if($flagged != $crit['crit0']) {
							if($focusRule['all'] == true) {
								$GLOBALS['log']->debug("********** SUGARROUTING: 'ALL' flag found and crit field not matched: [ {$crit['crit0']} for bean of type {$bean->module_dir} ]");
								return false;
							}
						} else {
							if($focusRule['all'] == false) { // matched at least 1 criteria
								return true;
							} else {
								$allCriteriaFilled = true;
							}
						}
					break; // end flag priority

					case "name":
					case "from_addr":
					case "to_addr":
					case "cc_addr":
					case "description":
						$GLOBALS['log']->debug("********* SUGARROUTING: got match-type criteria [ {$crit['crit1']} ]");
						$GLOBALS['log']->debug("********* SUGARROUTING: matching [ {$crit['crit2']} to {$bean->$crit['crit0']} ]");
						switch($crit['crit1']) {
							/**
							 * Criteria for "match" type
							 */
							case "match":
								// make sure rule crit exists
								if(isset($bean->$crit['crit0'])) {
									$regex = "/{$crit['crit2']}/i";
									$field = $bean->$crit['crit0'];

									if(!preg_match($regex, $field)) {
										if($focusRule['all'] == true) {
											$GLOBALS['log']->debug("********** SUGARROUTING: 'ALL' flag found and crit field not matched: [ {$crit['crit0']} -> {$crit['crit2']} for bean of type {$bean->module_dir} ]");
											$GLOBALS['log']->debug("********** SUGARROUTING: 'ALL' [ value: {$field} ] [ regex: {$regex} ]");
											return false;
										}
									} else {
										// got a match, return true if match 'any'
										if($focusRule['all'] == false) {
											return true;
										} else {
											$allCriteriaFilled = true;
										}
									}
								} else {
									$GLOBALS['log']->debug("********** SUGARROUTING: crit field not found: [ {$crit['crit0']} for bean of type {$bean->module_dir} ]");
								}
							break;

							/**
							 * Criteria for "does not match" type
							 */
							case "notmatch":
								if(isset($bean->$crit['crit0'])) {
									$regex = "/{$crit['crit2']}/i";
									$field = $bean->$crit['crit0'];

									if(preg_match($regex, $field)) {
										// got a match - we want to return a false flag
										if($focusRule['all'] == true) {
											$GLOBALS['log']->debug("********** SUGARROUTING: 'ALL' flag found and crit field not matched: [ {$crit['crit0']} -> {$crit['crit2']} for bean of type {$bean->module_dir} ]");
											$GLOBALS['log']->debug("********** SUGARROUTING: 'ALL' [ value: {$bean->$crit['crit0']} ] [ regex: {$regex} ]");
											return false;
										}
									} else {
										// got a match, return true if match 'any'
										if($focusRule['all'] == false) {
											return true;
										} else {
											$allCriteriaFilled = true;
										}
									}
								} else {
									$GLOBALS['log']->debug("********** SUGARROUTING: crit field not found: [ {$crit['crit0']} for bean of type {$bean->module_dir} ]");
								}

							break;

						}
					break; // end string matching

					/**
					 * Something went wrong...
					 */
					default:
						$GLOBALS['log']->debug("********** SUGARROUTING: criteria for rule does not match any rule definitions: [ {$crit['crit0']} ]");
						//_ppl($crit);
					break;
				}
			}
		}

		// match 'all' - if it gets this far, it has
		return $allCriteriaFilled;
	}




	///////////////////////////////////////////////////////////////////////////
	////	UI ELEMENTS
	/**
	 * Generates strings for Routing
	 */
	function getStrings() {
		global $app_strings;

		$ret = array(
			'strings' => array()
		);

		foreach($app_strings as $k => $v) {
			if(strpos($k, "LBL_ROUTING_") !== false) {
				$ret['strings'][$k] = $v;
			}
		}

		// matchDom
		$ret['matchDom'] = $this->getMatchDOM();

		// matchTypeDOM
		$ret['matchTypeDom'] = $this->getMatchTypeDOM();

		// get actions
		$ret['actions'] = $this->getActionsDOM();

		return $ret;
	}

	function getMatchTypeDOM() {
		global $app_strings;

		$ret = array(
			'match' => $app_strings['LBL_ROUTING_MATCH_TYPE_MATCH'],
			'notmatch' => $app_strings['LBL_ROUTING_MATCH_TYPE_NOT_MATCH'],
		);
		return $ret;
	}

	function getMatchDOM() {
		global $app_strings;

		$ret = array(
			'from_addr' => $app_strings['LBL_ROUTING_MATCH_FROM_ADDR'],
			'to_addr' => $app_strings['LBL_ROUTING_MATCH_TO_ADDR'],
			'cc_addr' => $app_strings['LBL_ROUTING_MATCH_CC_ADDR'],
			'-1' => $app_strings['LBL_ROUTING_BREAK'],
			'name' => $app_strings['LBL_ROUTING_MATCH_NAME'],
			'description' => $app_strings['LBL_ROUTING_MATCH_DESCRIPTION'],
			'-2' => $app_strings['LBL_ROUTING_BREAK'],
			'priority_high' => $app_strings['LBL_ROUTING_MATCH_PRIORITY_HIGH'],
			'priority_normal' => $app_strings['LBL_ROUTING_MATCH_PRIORITY_NORMAL'],
			//'priority_low' => $app_strings['LBL_ROUTING_MATCH_PRIORITY_LOW'], // no support in PHP_IMAP
		);

		return $ret;
	}

	function getActionsDOM() {
		global $app_strings;

		$this->customActions = sugar_cached("routing/customActions.php");
		if(file_exists($this->customActions)) {
			$customActions = array();
			include($this->customActions); // should provide custom actions
			$this->actions = array_merge($this->actions, $customActions);
		}

		$ret = array();
		$break = -1;
		foreach($this->actions as $k => $action) {
			if($action == "_break") {
				$action = $break;
				$break--;
				$lblKey = "LBL_ROUTING_BREAK";
			} else {
				$lblKey = "LBL_ROUTING_ACTIONS_" . strtoupper($action);
			}
			$ret[$action] = $app_strings[$lblKey];
		}

		return $ret;
	}


	/**
	 * Returns one rule's metadata
	 * @param string $id ID of rule
	 * @return array
	 */
	function getRule($id) {
		$this->loadRules();

		$rule = array(
			'id' => '',
			'name' => '',
			'active' => true,
			'criteria' => array(
				'all'	=> false,
			),

			'actions' => array(
				array(
					'function' => '',
					'type' => '',
					'class' => '',
					'action' => array(),
					'args' => array(),
				),
			),
		);

		if(!empty($id)) {
			foreach($this->rules as $rule) {
				if($rule['id'] == $id) {
					return $rule;
				}
			}
		}

		return $rule;
	}

	/**
	 * Renders the Rules List
	 * @return string HTML form insertable in a table cell or something similar
	 */
	function getRulesList() {
		global $app_strings;
		global $theme;

		$this->loadRules();
		$rulesDiv = $app_strings['LBL_NONE'];

		if(isset($this->rules)) {
			$focusRules = $this->rules;

			$rulesDiv = "<table cellpadding='0' cellspacing='0' border='0' height='100%'>";
			foreach($focusRules as $k => $rule) {
				$rulesDiv .= $this->renderRuleRow($rule);
			}
			$rulesDiv .= "</table>";
		}

		$smarty = new Sugar_Smarty();
		$smarty->assign('app_strings', $app_strings);
		$smarty->assign('theme', $theme);
		$smarty->assign('savedRules', $rulesDiv);
		$ret = $smarty->fetch("include/SugarRouting/templates/rulesList.tpl");

		return $ret;
	}

	/**
	 * provides HTML for 1 rule in the List
	 * @param array $rule Metadata for a rule
	 * @return string HTML
	 */
	function renderRuleRow($rule) {
		global $theme;
		$active = ($rule['active'] == true) ? " CHECKED" : "";
		$ret  = "<tr>";
		$ret .= "<td style='padding:2px;' id='cb{$rule['id']}'>";
		$ret .= "<input class='input' id='{$rule['id']}' onclick='SUGAR.routing.ui.setRuleStatus(this);' type='checkbox' name='activeRules[]' value='{$rule['id']}'{$active}>";
		$ret .= "</td>";
		$ret .= "<td style='padding:2px;' id='name{$rule['id']}'>";
		$ret .= "<a class='listViewThLinkS1' href='javascript:SUGAR.routing.editRule(\"{$rule['id']}\")'>{$rule['name']}</a>";
		$ret .= "</td>";
		$ret .= "<td style='padding:2px;' id='remove{$rule['id']}'>";
		$ret .= "<a class='listViewThLinkS1' href='javascript:SUGAR.routing.ui.deleteRule(\"{$rule['id']}\")'>";
		$ret .= SugarThemeRegistry::current()->getImage("minus", "class='img' border='0'", null, null, ".gif", $mod_strings['LBL_DELETE']);
		$ret .= "</td>";
		$ret .= "</tr>";

		return $ret;
	}
	////	END UI ELEMENTS
	///////////////////////////////////////////////////////////////////////////
}
