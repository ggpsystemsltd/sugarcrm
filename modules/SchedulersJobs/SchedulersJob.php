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




class SchedulersJob extends SugarBean {
	// schema attributes
	var $id = '';
	var $deleted = '';
	var $date_entered = '';
	var $date_modified = '';
	var $scheduler_id = '';
	var $execute_time = '';
	var $status;
	// standard SugarBean child attrs
	var $table_name		= "schedulers_times";
	var $object_name		= "SchedulersJob";
	var $module_dir		= "SchedulersJobs";
	var $new_schema		= true;
	var $process_save_dates = true;
	// related fields
	var $job_name;	// the Scheduler's 'name' field
	var $job;		// the Scheduler's 'job' field
	// object specific attributes
	var $user; // User object
	var $scheduler; // Scheduler parent

	/**
	 * Sole constructor.
	 */
	function SchedulersJob($init=true) {
        parent::SugarBean();
        if($init) {
            $user = new User();
            //check is default admin exists
            $adminId = $this->db->getOne(
                'SELECT id FROM users WHERE id='.$this->db->quoted('1').' AND is_admin=1 AND deleted=0 AND status='.$this->db->quoted('Active'),
                true,
                'Error retrieving Admin account info'
            );
            if (false === $adminId) {//retrive other admin
                $adminId = $this->db->getOne(
                    'SELECT id FROM users WHERE is_admin=1 AND deleted=0 AND status='.$this->db->quoted('Active'),
                    true,
                    'Error retrieving Admin account info'
                );
                if ($adminId) {
                    $user->retrieve($adminId);
                } else {
                    $GLOBALS['log']->fatal('No Admin account found!');
                    return false;
                }
                
            } else {
                $user->retrieve('1'); // Scheduler jobs run as default Admin
            }
            $this->user = $user;
        }
        $this->disable_row_level_security = true;
    }
	

	///////////////////////////////////////////////////////////////////////////
	////	SCHEDULERSJOB HELPER FUNCTIONS

	function fireSelf($id) {

		$sched = new Scheduler();
		$sched->retrieve($id);

		$exJob = explode('::', $sched->job);

		if(is_array($exJob)) {
			$this->scheduler_id	= $sched->id;
			$this->scheduler		= $sched;
			$this->execute_time	= $this->handleDateFormat('now');
			$this->save();

			if($exJob[0] == 'function') {
				$GLOBALS['log']->debug('----->Scheduler found a job of type FUNCTION');
				require_once('modules/Schedulers/_AddJobsHere.php');

				$this->setJobFlag(1);

				$func = $exJob[1];
				$GLOBALS['log']->debug('----->SchedulersJob firing '.$func);

				$res = call_user_func($func);
				if($res) {
					$this->setJobFlag(2);
					$this->finishJob();
					return true;
				} else {
					$this->setJobFlag(3);
					return false;
				}
			} elseif($exJob[0] == 'url') {
				if(function_exists('curl_init')) {
					$GLOBALS['log']->debug('----->SchedulersJob found a job of type URL');
					$this->setJobFlag(1);

					$GLOBALS['log']->debug('----->SchedulersJob firing URL job: '.$exJob[1]);
					if($this->fireUrl($exJob[1])) {
						$this->setJobFlag(2);
						$this->finishJob();
						return true;
					} else {
						$this->setJobFlag(3);
						return false;
					}
				} else {
					$this->setJobFlag(4);
					return false;
				}
			}
		}
		return false;
	}

	/**
     * handleDateFormat
     *
	 * This function handles returning a datetime value.  It allows a user instance to be passed in, but will default to the
     * user member variable instance if none is found.
     *
	 * @param string $date String value of the date to calculate, defaults to 'now'
	 * @param object $user The User instance to use in calculating the time value, if empty, it will default to user member variable
	 * @param boolean $user_format Boolean indicating whether or not to convert to user's time format, defaults to false
     *
	 * @return string Formatted datetime value
	 */
	function handleDateFormat($date='now', $user=null, $user_format=false) {
		global $timedate;
		
		if(!isset($timedate) || empty($timedate))
        {
			$timedate = new TimeDate();
		}
		
		// get user for calculation
		$user = (empty($user)) ? $this->user : $user;

        if($date == 'now')
        {
            $dbTime = $timedate->asUser($timedate->getNow(), $user);
        } else {
            $dbTime = $timedate->asUser($timedate->fromString($date, $user), $user);
        }

        // if $user_format is set to true then just return as th user's time format, otherwise, return as database format
        return $user_format ? $dbTime : $timedate->fromUser($dbTime, $user)->asDb();
	}

	function setJobFlag($flag) {
		$trackerManager = TrackerManager::getInstance();
		$trackerManager->pause();
		$status = array (0 => 'ready', 1 => 'in progress', 2 => 'completed', 3 => 'failed', 4 => 'no curl');
		$statusScheduler = array (0 => 'Active', 1 => 'In Progress', 2 => 'Active', 3 => 'Active', 4 => 'Active');
		$GLOBALS['log']->info('-----> SchedulersJob setting Job flag: '.$status[$flag].' AND setting Scheduler status to: '.$statusScheduler[$flag]);

		$time = $this->handleDateFormat('now');
		$this->status = $status[$flag];
		$this->scheduler->retrieve($this->scheduler_id);
		$this->scheduler->status = $statusScheduler[$flag];
		$this->scheduler->save();
		$this->save();
		$this->retrieve($this->id);
		$trackerManager->unPause();
	}

	/**
	 * This function takes a job_id, and updates schedulers last_run as well as
	 * soft delete the job instance from schedulers_times
	 * @return	boolean		Success
	 */
	function finishJob() {
		$trackerManager = TrackerManager::getInstance();
		$trackerManager->pause();
		$GLOBALS['log']->debug('----->SchedulersJob updating Job Status and finishing Job execution.');
		$this->scheduler->retrieve($this->scheduler->id);
		$this->scheduler->last_run = gmdate($GLOBALS['timedate']->get_db_date_time_format());
		if($this->scheduler->last_run == gmdate($GLOBALS['timedate']->get_db_date_time_format(), strtotime('Jan 01 2000 00:00:00'))) {
			$this->scheduler->last_run = $this->handleDateFormat('now');
			$GLOBALS['log']->fatal('Scheduler applying bogus date for "Last Run": '.$this->scheduler->last_run);
		}
		$this->scheduler->save();
		$trackerManager->unPause();
	}

	/**
	 * This function takes a passed URL and cURLs it to fake multi-threading with another httpd instance
	 * @param	$job		String in URI-clean format
	 * @param	$timeout	Int value in secs for cURL to timeout. 30 default.
	 */
	//TODO: figure out what error is thrown when no more apache instances can be spun off
	function fireUrl($job, $timeout=30) {
		// cURL inits
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $job); // set url
		curl_setopt($ch, CURLOPT_FAILONERROR, true); // silent failure (code >300);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // do not follow location(); inits - we always use the current
		curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
		curl_setopt($ch, CURLOPT_DNS_USE_GLOBAL_CACHE, false);  // not thread-safe
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return into a variable to continue program execution
		curl_setopt($ch, CURLOPT_TIMEOUT, $timeout); // never times out - bad idea?
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); // 5 secs for connect timeout
		curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);  // open brand new conn
		curl_setopt($ch, CURLOPT_HEADER, true); // do not return header info with result
		curl_setopt($ch, CURLOPT_NOPROGRESS, true); // do not have progress bar
		$urlparts = parse_url($job);
		if(empty($urlparts['port'])) {
		    if($urlparts['scheme'] == 'https'){
				$urlparts['port'] = 443;
			} else {
				$urlparts['port'] = 80;
			}
		}
		curl_setopt($ch, CURLOPT_PORT, $urlparts['port']); // set port as reported by Server
		//TODO make the below configurable
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // most customers will not have Certificate Authority account
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // most customers will not have Certificate Authority account

		if(constant('PHP_VERSION') > '5.0.0') {
			curl_setopt($ch, CURLOPT_NOSIGNAL, true); // ignore any cURL signals to PHP (for multi-threading)
		}
		$result = curl_exec($ch);
		$cInfo = curl_getinfo($ch);	//url,content_type,header_size,request_size,filetime,http_code
									//ssl_verify_result,total_time,namelookup_time,connect_time
									//pretransfer_time,size_upload,size_download,speed_download,
									//speed_upload,download_content_length,upload_content_length
									//starttransfer_time,redirect_time
		curl_close($ch);

		if($result !== FALSE && $cInfo['http_code'] < 400) {
			$GLOBALS['log']->debug('----->Firing was successful: ('.$job.') at '.$this->handleDateFormat('now'));
			$GLOBALS['log']->debug('----->WTIH RESULT: '.strip_tags($result).' AND '.strip_tags(print_r($cInfo, true)));
			return true;
		} else {
			$GLOBALS['log']->fatal('Job errored: ('.$job.') at '.$this->handleDateFormat('now'));
			return false;
		}
	}
	////	END SCHEDULERSJOB HELPER FUNCTIONS
	///////////////////////////////////////////////////////////////////////////


	///////////////////////////////////////////////////////////////////////////
	////	STANDARD SUGARBEAN OVERRIDES
	/**
	 * This function gets DB data and preps it for ListViews
	 */
	function get_list_view_data(){
		global $mod_strings;

		$temp_array = $this->get_list_view_array();
		$temp_array['JOB_NAME'] = $this->job_name;
		$temp_array['JOB']		= $this->job;

    	return $temp_array;
	}

	/** method stub for future customization
	 *
	 */
	function fill_in_additional_list_fields() {
		$this->fill_in_additional_detail_fields();
	}

	function fill_in_additional_detail_fields() {
		// get the Job Name and Job fields from schedulers table
//		$q = "SELECT name, job FROM schedulers WHERE id = '".$this->job_id."'";
//		$result = $this->db->query($q);
//		$row = $this->db->fetchByAssoc($result);
//		$this->job_name = $row['name'];
//		$this->job = $row['job'];
//		$GLOBALS['log']->info('Assigned Name('.$this->job_name.') and Job('.$this->job.') to Job');
//
//		$this->created_by_name = get_assigned_user_name($this->created_by);
//		$this->modified_by_name = get_assigned_user_name($this->modified_user_id);

    }

	/**
	 * returns the bean name - overrides SugarBean's
	 */
	function get_summary_text() {
        if(isset($this->name))
		return $this->name;
	}

	/**
	 * function overrides the one in SugarBean.php
	 */

}  // end class Job
?>
