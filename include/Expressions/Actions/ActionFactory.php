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

/**
 * SugarLogic action factory
 * @api
 */
class ActionFactory {
	static $exclude_files = array("ActionFactory.php", "AbstractAction.php");
	static $action_directory = "include/Expressions/Actions";
	static $loaded_actions = array();

	static function loadFunctionList() {
	    $cachefile = sugar_cached("Expressions/actions_cache.php");
		if (!is_file($cachefile))
		{
		    ActionFactory::buildActionCache();
		} else
		{
			include $cachefile;
			ActionFactory::$loaded_actions = $actions;
		}
	}

	static function buildActionCache($silent = true) {
		if (!is_dir(ActionFactory::$action_directory))
            return false;

        // First get a list of all the files in this directory.
        $entries = array();
        $actions = array();
		$javascript = "";
		foreach(array("", "custom/") as $prefix) {
			if (!is_dir($prefix . ActionFactory::$action_directory)) continue;
			$directory = opendir($prefix . ActionFactory::$action_directory);
            if ( !$directory )  continue;
			while( $entry = readdir($directory) )
	        {
	            if (strtolower(substr($entry, -4)) != ".php" || in_array($entry, ActionFactory::$exclude_files))
	                continue;

	            $path = $prefix . ActionFactory::$action_directory . "/" . $entry;
	            require_once($path);

				$className = substr($entry, 0, strlen($entry) - 4);
	            $actionName = call_user_func(array($className, "getActionName"));
	            $actions[$actionName] = array('class' => $className, 'file' => $path);
				$javascript .= call_user_func(array($className, "getJavascriptClass"));
				if (!$silent) echo "added action $actionName <br/>";
	        }
		}

		if (empty($actions)) return "";

		create_cache_directory("Expressions/actions_cache.php");
		write_array_to_file('actions', $actions, sugar_cached('Expressions/actions_cache.php'));

		ActionFactory::$loaded_actions = $actions;

		return $javascript;

	}

	static function getNewAction($name, $params) {
		if (empty(ActionFactory::$loaded_actions))
			ActionFactory::loadFunctionList();
		if (isset(ActionFactory::$loaded_actions[$name]))
		{
			require_once(ActionFactory::$loaded_actions[$name]['file']);
			$class = ActionFactory::$loaded_actions[$name]['class'];
			return new $class($params);
		}

		return false;
	}
}
?>