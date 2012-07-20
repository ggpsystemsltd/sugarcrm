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

class ViewFunctiondetail extends SugarView
{
	function ViewFunctionDetail(){
		$this->options['show_footer'] = false;
		$this->options['show_header'] = false;
 		parent::SugarView();

 	}

 	function display(){
 		global $app_strings, $current_user, $mod_strings, $theme, $beanList, $beanFiles;
 		if (!is_file($cachefile = sugar_cached('Expressions/functionmap.php'))) {
        	$GLOBALS['updateSilent'] = true;
            include ('include/Expressions/updatecache.php');
        }
 		include $cachefile;
 		require_once('include/JSON.php');
 		$desc = "";
 		if (!empty($_REQUEST['function']) && !empty($FUNCTION_MAP[$_REQUEST['function']])){
 			$func_def =  $FUNCTION_MAP[$_REQUEST['function']];
			require_once($func_def['src']);
			$class = new ReflectionClass($func_def['class']);
			$doc = $class->getDocComment();
			if (!empty($doc)) {
				//Remove the javadoc style comment *'s
				$desc = preg_replace("/((\/\*+)|(\*+\/)|(\n\s*\*)[^\/])/", "", $doc);
			} else if (isset($mod_strings['func_descriptions'][$_REQUEST['function']]))
			{
				$desc = $mod_strings['func_descriptions'][$_REQUEST['function']];
			}
			else
			{
				$seed = $func_def['class'];
				$count = call_user_func(array($seed, "getParamCount"));
				$type = call_user_func(array($seed, "getParameterTypes"));
				$desc = $_REQUEST['function'] . "(";
				if ($count == -1)
				{
					$desc .=  $type . ", ...";
				} else {
					for ($i = 0; $i < $count; $i++) {
						if ($i != 0) $desc .= ", ";
						if (is_array($type))
							$desc .=  $type[$i] . ($i+1);
						else
							$desc .=  $type . ($i+1);
					}
				}
				$desc .= ")";
			}
		}
		else {
			$desc = "function not found";
		}
		echo json_encode(array(
			"func" => empty($_REQUEST['function']) ? "" : $_REQUEST['function'],
			"desc" => $desc,
		));
 	}
}
?>