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


/**
 * ResourceManager.php
 * This class is responsible for resource management of SQL queries, file usage, etc.
 */
class ResourceManager {

private static $instance;
private $_observers = array();

/**
 * The constructor; declared as private
 */
private function ResourceManager() {
	
}

/**
 * getInstance
 * Singleton method to return static instance of ResourceManager
 * @return The static singleton ResourceManager instance
 */
static public function getInstance(){	
    if (!isset(self::$instance)) {
        self::$instance = new ResourceManager();
    } // if
    return self::$instance;
}

/**
 * setup
 * Handles determining the appropriate setup based on client type.
 * It will create a SoapResourceObserver instance if the $module parameter is set to 
 * 'Soap'; otherwise, it will try to create a WebResourceObserver instance.
 * @param $module The module value used to create the corresponding observer
 * @return boolean value indicating whether or not an observer was successfully setup
 */
public function setup($module) {
	//Check if config.php exists
	if(!file_exists('config.php') || empty($module)) {
	   return false;	
	}
    
    if($module == 'Soap') {
      require_once('include/resource/Observers/SoapResourceObserver.php');
      $observer = new SoapResourceObserver('Soap');      	
    } else {
      require_once('include/resource/Observers/WebResourceObserver.php');
      $observer = new WebResourceObserver($module);    	
    }
    
	//Load config
	if(!empty($observer->module)) {
		$limit = 0;
		
		if(isset($GLOBALS['sugar_config']['resource_management'])) {
			   $res = $GLOBALS['sugar_config']['resource_management'];
			if(!empty($res['special_query_modules']) && 
			   in_array($observer->module, $res['special_query_modules']) &&
			   !empty($res['special_query_limit']) &&
			   is_int($res['special_query_limit']) &&
			   $res['special_query_limit'] > 0) {
			   $limit = $res['special_query_limit'];
			} else if(!empty($res['default_limit']) && is_int($res['default_limit']) && $res['default_limit'] > 0) {
			   $limit = $res['default_limit'];
			}
		} //if
		
		if($limit) {
		   
		   $db = DBManagerFactory::getInstance();			
		   $db->setQueryLimit($limit);
		   $observer->setLimit($limit);
		   $this->_observers[] = $observer;
		}
		return true;
	} 
	
	return false;
}

/**
 * notifyObservers
 * This method notifies the registered observers with the provided message.
 * @param $msg Message from language file to notify observers with
 */
public function notifyObservers($msg) {
	
	if(empty($this->_observers)) {
	   return;	
	}

    //Notify observers limit has been reached
    if(empty($GLOBALS['app_strings'])) {
       $GLOBALS['app_strings'] = return_application_language($GLOBALS['current_language']);	
    }
    $limitMsg = $GLOBALS['app_strings'][$msg];
    foreach( $this->_observers as $observer) {
	    $limit = $observer->limit;
	    $module = $observer->module;
	    eval("\$limitMsg = \"$limitMsg\";");
	    $GLOBALS['log']->fatal($limitMsg);
	    $observer->notify($limitMsg);
    }		
}


/*
 * getObservers
 * Returns the observer instances that have been setup for the ResourceManager instance
 * @return Array of ResourceObserver(s)
 */
function getObservers() {
    return $this->_observers;
}
	
}
?>