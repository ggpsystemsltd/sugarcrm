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


require_once('modules/Trackers/monitor/Monitor.php');
require_once('modules/Trackers/Metric.php');
require_once('modules/Trackers/Trackable.php');

class BlankMonitor extends Monitor implements Trackable {
    
    /**
     * BlankMonitor constructor
     */
    function BlankMonitor() {

    }
    
    /**
     * setValue
     * Sets the value defined in the monitor's metrics for the given name
     * @param $name String value of metric name
     * @param $value Mixed value 
     * @throws Exception Thrown if metric name is not configured for monitor instance
     */
    function setValue($name, $value) {

    }
    
    /**
     * getStores
     * Returns Array of store names defined for monitor instance
     * @return Array of store names defined for monitor instance
     */
    function getStores() {
        return null;	
    }
    
    /**
     * getMetrics
     * Returns Array of metric instances defined for monitor instance
     * @return Array of metric instances defined for monitor instance
     */
    function getMetrics() {
    	return null;
    }
    
    /**
     * save
     * This method retrieves the Store instances associated with monitor and calls
     * the flush method passing with the montior ($this) instance.
     * 
     */
    public function save() {
 	
    }


	/**
	 * getStore
	 * This method checks if the Store implementation has already been instantiated and
	 * will return the one stored; otherwise it will create the Store implementation and
	 * save it to the Array of Stores.
	 * @param $store The name of the store as defined in the 'modules/Trackers/config.php' settings
	 * @return An instance of a Store implementation
	 * @throws Exception Thrown if $store class cannot be loaded
	 */
	protected function getStore($store) {
		return null;
	}

    
	/**
	 * clear
	 * This function clears the metrics data in the monitor instance
	 */
	public function clear() {

	}
}

?>