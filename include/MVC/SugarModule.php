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


class SugarModule
{
    protected static $_instances = array();

    protected $_moduleName;

    public static function get(
        $moduleName
        )
    {
        if ( !isset(self::$_instances[$moduleName]) )
            self::$_instances[$moduleName] = new SugarModule($moduleName);

        return self::$_instances[$moduleName];
    }

    public function __construct(
        $moduleName
        )
    {
        $this->_moduleName = $moduleName;
    }

    /**
     * Returns true if the given module implements the indicated template
     *
     * @param  string $template
     * @return bool
     */
    public function moduleImplements(
        $template
        )
    {
        $focus = self::loadBean();

        if ( !$focus )
            return false;

        return is_a($focus,$template);
    }

    /**
     * Returns the bean object of the given module
     *
     * @return object
     */
    public function loadBean($beanList = null, $beanFiles = null, $returnObject = true)
    {
        // Populate these reference arrays
        if ( empty($beanList) ) {
            global $beanList;
        }
        if ( empty($beanFiles) ) {
            global $beanFiles;
        }
        if ( !isset($beanList) || !isset($beanFiles) ) {
            require('include/modules.php');
        }

        if ( isset($beanList[$this->_moduleName]) ) {
            $bean = $beanList[$this->_moduleName];
            if (isset($beanFiles[$bean])) {
                if ( !$returnObject ) {
                    return true;
                }
                if ( !sugar_is_file($beanFiles[$bean]) ) {
                    return false;
                }
                require_once($beanFiles[$bean]);
                $focus = new $bean;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }

        return $focus;
    }
}
