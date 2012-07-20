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
 * The DashletManager is a way for searching for Dashlets installed on the current system as well as providing a method for accessing
 * a specific Dashlets information. It also allows for instantiating an instance of a Dashlet.
 * @author mitani
 * @api
 */
class DashletManager
{
	private static $dashletCache = array();
	private static $dashDefs = array();

	/**
	 * All methods should be called statically prevent instantiation of this class
	 */
	private function __construct()
	{
	}

	/**
	 * Allows for searching for a specific dashlet available on the installation to add to a given layout. Search may filter on name, category and type
	 * Returns an array in the format
	 * array(
	 * 	'dashlet1-id'=>array('icon'=>icon-image-path ,'name'=>name of dashlet,  'description'=>description of dashlet),
	 *	'dashlet2-id'=>array('icon'=>icon-image-path ,'name'=>name of dashlet,  'description'=>description of dashlet),
	 *	'dashlet3-id'=>array('icon'=>icon-image-path ,'name'=>name of dashlet,  'description'=>description of dashlet),
	 *	...
	 * );
	 * @param string $name - name to search for by default it searches returns all dashlets
	 * @param string $module - module of dashlet to search in by default it searches all modules
	 * @param string $category - the category that the dashlet falls into. Acceptable values: module, portal, charts, tools, misc
	 * @param string $type - type of dashlet to search for Standard, FocusBean by default it searches for both. Acceptable values: standard, bean, both
	 * @static
	 * @return Associative Array containing search results keyed by dashlet id
	 *
	 */
	public static function search(
	    $name = null,
	    $module = null,
	    $category = null,
	    $type = null)
	{
	}

	/**
	 * Provides information for a given dashlet in the form of
	 * array(
	 * 		'name'=> dashlet name
	 * 		'type'=> dashlet type
	 * 		'category'=> dashlet category
	 * 		'description'=> description
	 *		'author'=> author
	 *		'version'=>version
	 *		'date_published'=>date published
	 *		...
	 * ),
	 * @param GUID $dashletID - ID of the dashlet you wish to get information on
	 * @static
	 * @return Associative Array containg all meta-data about a given dashlet
	 */
	public static function info(
	    $dashletID
	    )
	{
	}

	/**
	 * Returns an instance of a Dashlet based on the provided DashletID
	 * @param GUID $dashletID - ID of Dashlet to be instantiated
	 * @param GUID $subpanelDefID - ID from the definiiton
	 * @param Object $focusBean - the bean used to generate the dashlet (optional)
	 * @return Dashlet
	 */

	public static function getDashlet(
	    $dashletID,
	    $options = array(),
	    $focusBean = null
	    )
	{
	    DashletManager::_loadCache();
	    require_once(DashletManager::$dashletCache[$dashletID]['file']);
        if(empty($options)){
            $options = (isset(DashletManager::$dashletCache[$dashletID]['options'])) ? DashletManager::$dashletCache[$dashletID]['options'] : array();
        }
        $dashlet = DashletManager::$dashletCache[$dashletID]['class'](rand(0,100000),$options);

        return $dashlet;
	}


	public static function getDashletFromSubDef(
	    $subdefID,
	    $focusBean
	    )
	{
        if(empty(DashletManager::$dashDefs[$focusBean->module_dir])){
            $dashletdefs = array();
            $filePath = 'modules/' . $focusBean->module_dir . '/metadata/subdashdefs.php';
            if(file_exists('custom/' . $filePath)){
                include('custom/' . $filePath);
            }else if(file_exists($filePath)){
                include($filePath);
            }
            if(!empty($dashletdefs)){
                DashletManager::$dashDefs[$focusBean->module_dir] = $dashletdefs;
            }
        }

        if(isset($_SESSION['dlets'][$subdefID]))$subdefID = $_SESSION['dlets'][$subdefID];
        if(isset(DashletManager::$dashDefs[$focusBean->module_dir]['dashlets'][$subdefID])){
            $dashID = DashletManager::$dashDefs[$focusBean->module_dir]['dashlets'][$subdefID]['type'];
            $options = !empty(DashletManager::$dashDefs[$focusBean->module_dir]['dashlets'][$subdefID]['options'])? DashletManager::$dashDefs[$focusBean->module_dir]['dashlets'][$subdefID]['options']:array();
            $dashlet =  DashletManager::getDashlet($dashID, $options);
            $_SESSION['dlets'][$dashlet->id] = $subdefID;
            return $dashlet;
        }else{
            throw new Exception('Dashlet Not Found : ' . $subdefID, '4002');
        }
	}


	private static function _loadCache(
	    $refresh = false
	    )
	{
		if($refresh || !is_file(sugar_cached('dashlets/dashlets.php'))) {
            require_once('include/Dashlets/DashletCacheBuilder.php');
            $dc = new DashletCacheBuilder();
            $dc->buildCache();
		}

		$dashletsFiles = array();
		require_once(sugar_cached('dashlets/dashlets.php'));
		DashletManager::$dashletCache = $dashletsFiles;

	}
}