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

/**
 * Chart factory
 * @api
 */
class SugarChartFactory
{
    /**
	 * Returns a reference to the ChartEngine object for instance $chartEngine, or the default
     * instance if one is not specified
     *
     * @param string $chartEngine optional, name of the chart engine from $sugar_config['chartEngine']
     * @param string $module optional, name of module extension for chart engine (see JitReports or SugarFlashReports)
     * @return object ChartEngine instance
     */
	public static function getInstance(
        $chartEngine = '',
        $module = ''
        )
    {
        global $sugar_config;
		$defaultEngine = "Jit";
        //fall back to the default Js Engine if config is not defined
        if(empty($sugar_config['chartEngine'])){
        	$sugar_config['chartEngine'] = $defaultEngine;
        }

        if(empty($chartEngine)){
        	$chartEngine = $sugar_config['chartEngine'];
        }

        $file = "include/SugarCharts/".$chartEngine."/".$chartEngine.$module.".php";

        if(file_exists('custom/' . $file))
        {
          require_once('custom/' . $file);
        } else if(file_exists($file)) {
          require_once($file);
        } else {
          $GLOBALS['log']->debug("using default engine include/SugarCharts/".$defaultEngine."/".$defaultEngine.$module.".php");
          require_once("include/SugarCharts/".$defaultEngine."/".$defaultEngine.$module.".php");
          $chartEngine = $defaultEngine;
        }

        $className = $chartEngine.$module;
        return new $className();

    }

}

?>
