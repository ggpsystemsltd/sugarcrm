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


require_once('include/DashletContainer/Containers/DCAbstract.php');

/**
 * The Dashlet Container Factory (DCF) provides a facility for loading the appropriate Dashlet Container.
 * It will make the decision based on what container is requested as well as system and user settings.
 * @author mitani
 * @api
 */
class DCFactory
{
	static $defaultContainer = 'DCList';

	/**
	 * Prevent Instantiation of DCFactory it should only be used statically
	 *
	 */
	private function __construct()
	{
	}

	/**
	 * This function will make the decision for which container to load.
	 *
	 * If container is not specified
	 * 1. check if user has a default container they prefer load
	 *
	 * @param string $dashletMetaDataFile - file path to the meta-data specificying the Dashlets used in this container
	 * @param string $container  - name of the Dashlet Container to use if not specified it will use the system default
	 * @static
	 * @return DashletContainer
	 */
	public static function getContainer(
	    $dashletMetaDataFile,
	    $container = null
	    )
	{
		if($container == null)
			$container = self::$defaultContainer;

		$path = 'include/DashletContainer/Containers/' . $container .'.php';
		if(file_exists('custom/'. $path))
			require_once('custom/'. $path);
		elseif(file_exists($path))
			require_once($path);
		else
		    return false;

		$class = (class_exists('Custom' . $container))? 'Custom' . $container : $container;

		if ( !class_exists($class) )
		    return false;

        return new $class($dashletMetaDataFile);
	}
}