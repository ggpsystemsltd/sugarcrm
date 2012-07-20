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

class tracker_queries_monitor extends Monitor implements Trackable {

    var $cached_data = array();
    
    /**
     * constructor
     */
    function tracker_queries_monitor($name='', $monitorId='', $metadata='', $store='') {
        parent::Monitor($name, $monitorId, $metadata, $store);
    }
   
    /**
     * save
     * This method retrieves the Store instances associated with monitor and calls
     * the flush method passing with the montior ($this) instance.
     * 
     */
    public function save($flush=true) {
    
    	if(!$flush) {
    		$this->cached_data[] = $this->toArray();
    	} else {
	    	if(empty($GLOBALS['tracker_' . $this->table_name]) && !empty($this->cached_data)) {
 				require_once('modules/Trackers/TrackerUtility.php');
	    		$write_entries = array();
	    		
				foreach($this->cached_data as $entry) {
					$query = str_replace(array("\r", "\n", "\r\n", "\t"), ' ', $entry['text']);
			        $query = preg_replace("/\s{2,}/", ' ', $query);
			        $query = TrackerUtility::getGenericSQL($query);
			        $entry['text'] = $query;
			        
			        $md5 = md5($query);	

			        if(!isset($write_entries[$md5])) {
			           
			           $entry['query_hash'] = $md5;
			           $result = $GLOBALS['db']->query("SELECT * FROM tracker_queries WHERE query_hash = '{$md5}'");
			           
					   if ($row = $GLOBALS['db']->fetchByAssoc($result)) {	  
				            $entry['query_id'] = $row['query_id'];
				            $entry['run_count'] = $row['run_count'] + 1;
				            $entry['sec_total'] = $row['sec_total'] + $entry['sec_total'];
				            $entry['sec_avg'] =  ($entry['sec_total'] / $entry['run_count']);
				        } else {
				            $entry['query_id'] = create_guid();
				            $entry['run_count'] = 1;
				            $entry['sec_total'] = $entry['sec_total'];
				            $entry['sec_avg'] = $entry['sec_total'];
				        }			           
			            $write_entries[$md5] = $entry;
			        } else {
			        	$write_entries[$md5]['run_count'] = $write_entries[$md5]['run_count']++;
			        	$write_entries[$md5]['sec_total'] = $write_entries[$md5]['sec_total'] + $entry['sec_total'];
			        	$write_entries[$md5]['sec_avg'] = ($write_entries[$md5]['sec_total'] / $write_entries[$md5]['run_count']);
			        } //if-else				   		
				} //foreach
				
				
				$trackerManager = TrackerManager::getInstance();
	    		
	            if($monitor2 = $trackerManager->getMonitor('tracker_tracker_queries')){ 
		            $trackerManager->pause();
			    	//Loop through the stored cached data entries
			    	foreach($write_entries as $write_e) {
			    		//Set the values from the cached data entries
			    		foreach($write_e as $name=>$value) {
			    			$this->$name = $value;    		
			    		} //foreach
			    			
		                //Write to the tracker_tracker_monitor monitor              		
			    		$monitor2->setValue('monitor_id', $this->monitor_id);        
	       				$monitor2->setValue('date_modified', $this->date_modified);	
	                    $monitor2->setValue('query_id', $this->query_id);
		               	$monitor2->save($flush); // <--- save to tracker_tracker_monitor
	                   	
	                   	foreach($this->stores as $s) {
			    			$store = $this->getStore($s);
			    			//Flush to the store
			    			$store->flush($this);
	                    }
	                    //Clear the monitor
			    		$this->clear();
			    	} //foreach
	                $trackerManager->unPause();	
				}
	    	} //if
            unset($this->cached_data);
    	} //if-else
   } //save
}
?>
