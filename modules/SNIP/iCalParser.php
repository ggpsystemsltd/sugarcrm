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
 * Stub class for the future of SugarEvents
 */
class Event{

	public $date_start;
	public $date_end;
	public $name;
	public $status;
	public $description;
	public $type = 'Event';
	public $date_created;
	public $date_modified;
	public $url;
	public $uid;
	public $sequence;
	public $location;
	public $attendees = array();
}

/**
 * Base class for all vObjects
 */
class vBasic{
	protected $properties = array();
	protected $stack = array();
	protected $parent = null;

	public function __construct()
	{
	    $this->event = new Event();
	}

	/**
	 * Takes in a vCalendar formatted date and generates a (Y-m-d H:i:s) formatted date string
	 * @param object $key - this is parsed to determine any timezone information
	 * @param object $date - the date in vCal format (Ymd\THis\Z)
	 * @return date formated string (Y-m-d H:i:s)
	 */
	function parseDate($key, $date){
		static $gmt = null;
		if(!$gmt)$gmt = new DateTimeZone('GMT');
		$keys = explode( ';', $key);
		$timezone = null;
		foreach($keys as $k){

			if(substr_count($k, 'TZID=')){
				$tz = explode('=', $k);
				$timezone = @timezone_open($tz[1]);
				if(!$timezone) {
				    $timezone = vTimeZone::guessTimezone($tz[1]);
				}
			}
		}
		if($timezone){
			$dt = new DateTime($date, $timezone);
			$dt->setTimezone($gmt);
		}else{
			$dt = new DateTime($date);
		}
		return $dt->format('Y-m-d H:i:s');
	}

	/**
	 * Takes in a Sugar Formatted date (Y-m-d H:i:s) and changes it to a VCal Formatted one (Ymd\THis\Z)
	 * @param STRING $date - date in (Y-m-d H:i:s)
	 * @return STRING date - vCal Formatted
	 */
	function toVCalDate($date){
		return date('Ymd\THis\Z', strtotime($date));
	}

	/**
	 * returns the stack of events/todos/journals/FreeBusy/alarms/timezones for the given object
	 * @return ARRAY of events
	 */
	public function getStack(){
		return $this->stack();
	}

	/**
	 * returns the properties for the given object
	 * @return ARRAY of properties
	 */
	public function  getProperties(){
		return $this->properties();
	}

	/**
	 * default process action is to just set the properties
	 * @param object $key
	 * @param object $value
	 *
	 */
	function process($key, $value){
		$this->properties[$key] = $value;
	}


	/**
	 * returns the VCal String for the given object
	 * @return STRING
	 */
	function generateVCal(){
		return '';
	}

}

/**
 *
 */
class vEvent extends vBasic{


	/**
	 * Generates the VCAL for the event
	 * @return
	 */
	function generateVCal(){
		$cal =  <<<VEVENT
BEGIN:VEVENT
STATUS:CONFIRMED
CLASS:PUBLIC
CATEGORIES:Sugar Event

VEVENT;
		foreach($this->properties as $k=>$v){
			$cal .= $k.':' . $v ."\n";
		}
		$cal .='END:VEVENT' ."\n";;
		return $cal;
	}

	/**
	 * converts a Sugar Event into a vEvent
	 * @param object $event
	 * @return
	 */
	function setEvent($event){
		$this->event = $event;
		$this->properties = array();
		$this->stack = array();
		$this->properties['CREATED'] = $this->toVCalDate($this->event->date_created);
		$this->properties['LAST-MODIFIED'] = $this->toVCalDate($this->event->date_modified);
		$this->properties['DTSTART'] = $this->toVCalDate($this->event->date_start);
		$this->properties['DTEND'] = $this->toVCalDate($this->event->date_end);
		$this->properties['SUMMARY'] = $this->event->name;
		$this->properties['STATUS'] = $this->event->status;
		$this->properties['UID'] = $this->event->uid;
		$this->properties['DESCRIPTION'] = $this->event->description;
		$this->properties['URL'] = $this->event->url;
		$this->properties['SEQUENCE'] = $this->event->sequence;
		$this->properties['LOCATION'] = $this->event->location;
	}

	/**
	 * Handles the parsing of the vCalendar
	 * @param object $key
	 * @param object $value
	 *
	 */
	function process($key, $value){
		$this->properties[$key] = $value;
		$keys = explode( ';', $key);
		switch($keys[0]){
			case 'BEGIN':
				$this->event = new Event();
				break;
			case 'END':
				return false;
			case 'CREATED':
				$this->event->date_created = $this->parseDate($key, $value);
				break;
			case 'LAST-MODIFIED':
				$this->event->date_modified = $this->parseDate($key, $value);
				break;
			case 'DTSTART':
				$this->event->date_start = $this->parseDate($key, $value);
				break;
			case 'DTEND':
				$this->event->date_end = $this->parseDate($key, $value);
				break;
			case 'UID':
				$this->event->uid = $value;
				break;
			case 'DESCRIPTION':
				$this->event->description = $value;
				break;
			case 'SUMMARY':
				$this->event->name = $value;
				break;
			case 'STATUS':
				$this->event->status = $value;
				break;
			case 'URL':
				$this->event->url = $value;
				break;
			case 'SEQUENCE':
				$this->event->sequence = $value;
				break;
			case 'LOCATION':
				$this->event->location = $value;
				break;
			case 'ATTENDEE':
				$this->event->attendees[] = $this->parseAttendee($key, $value);
				break;
			case 'ORGANIZER':
				$this->event->organizer = $this->parseAttendee($key, $value);
				break;

		}
	}

	/**
	 * Parse attendee string into key/value pairs
	 * @param string $key
	 * @param string $value
	 * @return array key/value pairs contanding attendee information
	 */
	function parseAttendee($key, $value){
		$attendee = array('email'=>str_replace( 'mailto:',  '', $value));
		$attributes = explode(';', $key);
		foreach($attributes as $k){
			if(substr_count($k, "=") > 0){
				$kv = explode("=", $k, 2);
				$attendee[$kv[0]] = trim($kv[1]);
			}

		}
		return $attendee;
	}

}

class vToDo extends vEvent{

}
class vJournal extends vEvent{

}

class vFreeBusy extends vEvent{

}

class vAlarm extends vBasic {

}

class vTimeZone extends vBasic{
	public static $timezones = array();
	protected $section = "";
	protected static $winZones = array();

	/**
	 * Guess custom timezone by name
	 * @param string $tz TZ name
	 * @return DateTimeZone
	 */
	static public function guessTimezone($tz)
	{
		if(empty(self::$winZones)) {
			require 'windowsZones.php';
			self::$winZones = $windowsZones;
		}
		if(isset(self::$winZones[$tz])) {
			return timezone_open(self::$winZones[$tz]);
		}
		// TODO: try to find right timezone?
		return null;
	}

	/**
	 * Process TimeZone tags
	 * @param string $key
	 * @param string $value
	 */
	function process($key, $value){
 		switch($key) {
			case "TZID":
				self::$timezones[$value] = $this;
				break;
			case "BEGIN":
				$this->section = $value;
				return;
			case "END":
				$this->section = "";
				return;
		}
		$this->properties[$this->section][$key] = $value;
	}
}


/**
 * Calendar events set class
 */
class vCalendar extends vBasic{
	public $stack = array();
	public $properties = array();
	protected $cur = null;

	/**
	 * add a SugarEvent to the vCalendar Object
	 * @param SugarEvent $event
	 */
	function addEvent($event){
		$ev = new vEvent();
		$ev->setEvent($event);
		$this->stack[] = $ev;
	}

	/**
	 * Generates the VCalendar format for this object
	 * @return STRING
	 */
	function generateVCal(){
		$cal = "BEGIN:VCALENDAR\n";
		if(!isset($this->properties['PRODID']))$this->properties['PRODID'] = '-//SUGARCRM Inc//SUGARCRM Calendar 6.5//EN';
		if(!isset($this->properties['VERSION']))$this->properties['VERSION'] = '2.0';
		if(!isset($this->properties['CALSCALE']))$this->properties['CALSCALE'] = 'GREGORIAN';
		foreach($this->properties as $k=>$v){
			$cal .= $k . ':'. $v ."\n";;
		}
		foreach($this->stack as $item){
			$cal .= $item->generateVCal();
		}
		$cal .= 'END:VCALENDAR' ."\n";;
		return $cal;
	}

	/**
	 * parses the vCalendar
	 * @param object $key
	 * @param object $value
	 * @return
	 */
	function process($key, $value){
		switch($key){
			case 'BEGIN':
				$parent = $this->cur;
				switch($value){
					case 'VEVENT':
						$this->cur = new vEvent();
						break;
					case 'VTIMEZONE':
						$this->cur = new vTimeZone();
						break;
					case 'VTODO':
						$this->cur = new vToDo();
						break;
					case 'VJOURNAL':
						$this->cur = new vJournal();
						break;
					case 'VALARM':
						$this->cur = new vAlarm();
						break;
					default:
						if($this->cur){
							$this->cur->process($key, $value);
							break;
						} else {
							throw new Exception('INVALID BEGIN TAG IN VCALENDAR - ' . $key . '=' . $value);
						}
				}
				$this->cur->parent = $parent;
				break;
			case 'END':
				switch($value){
					case 'VEVENT':
					case 'VTIMEZONE':
					case 'VTODO':
					case 'VJOURNAL':
					case 'VALARM':
						$this->stack[] = $this->cur;
						$parent = $this->cur->parent;
						$this->cur->parent = null;
						$this->cur = $parent;
						break;
					default;
						if($this->cur){
							$this->cur->process($key, $value);
						}else{
							throw new Exception('END TAG IN VCALENDAR WITHOUT BEGIN TAG - ' . $key . '=' . $value);
						}
				}
				break;
			default:
				if($this->cur){
					$this->cur->process($key, $value);
				}else{
					$this->properties[$key] = $value;
				}
		}
	}
}

class iCalendar {
	/**
	 * parses a STRING represeting an iCalendar (vCalendar 2)
	 * @param STRING $str - iCalendar formatted String
	 * @return
	 */
	function parse($str){

		$this->data = array();
		$lines = explode("\n", $str);
		$cur = null;

		for($i = 0; $i < count($lines); $i++){
			$line = trim($lines[$i]);
			while(!empty($lines[$i + 1]) && substr($lines[$i + 1],0, 1) == " "){
				$line .= trim(substr($lines[$i + 1], 1));
				$i++;
			}
			$kv = explode( ':', $line, 2);
			if(count($kv) == 1){
				continue;
			}
			$key =trim($kv[0]);
			$value = trim($kv[1]);
			switch($key){
				case 'END':
					switch($value){
						case 'VCALENDAR':
							if($cur){
								$this->data['calendar'][] = $cur;
								$cur = null;
							}
							break;
						default:
							if($cur){
								$cur->process($key, $value);
							}else{
								throw new Exception('Invalid END Tag - ' . $line);
							}
					}
					break;
				case 'BEGIN':
					switch($value){
						case 'VCALENDAR':
							$cur = new vCalendar();
							break;
						default:
							if($cur){
								$cur->process($key, $value);
							}else{
								throw new Exception('Invalid BEGIN Tag - ' . $line);
							}
					}
					break;

				default:
					if($cur){
						$cur->process($key, $value);
					}else{
						throw new Exception('Invalid Tag - ' . $line);
					}


			}
		}
	}

	/**
	 * Clean up email - uppercase and remove mailto: prefix
	 * @param string $var
	 */
	function cleanEmail($var)
	{
	    if(strncasecmp($var, "mailto:", 7) == 0) {
	        return strtoupper(substr($var, 7));
	    }
	    return strtoupper($var);
	}

	/**
	 * Create Sugar meetings from calendar events
	 * @param SugarBean $parent related object to associate with meetings
	 */
	function createSugarEvents($parent = NULL)
	{
		require_once('modules/Meetings/Meeting.php');
		foreach ($this->data['calendar'] as $calendar_key=>$calendar_val) {
			foreach ($calendar_val->stack as $key=>$val) {
				if(!$val instanceof vEvent) {
					continue;
				}

				$meeting = new Meeting();
				// Hack - we don't care about this bean's permissions
				$meeting->disable_row_level_security = true;
				$prev_seq = 0;
				$prev_exists = false;
				$prev_meeting = $meeting->retrieve_by_string_fields(array("outlook_id" => $val->event->uid));
				if (isset ($prev_meeting) && !empty ($prev_meeting->id)) {
					$prev_seq = (int) $prev_meeting->sequence;
					$prev_exists = true;
				}

				if(isset($val->event->status) && $val->event->status == 'CANCELLED' && !$prev_exists) {
				    // can't cancel non-existing event, skip
				    continue;
				}

				if (!$prev_exists || ($prev_exists && $val->event->sequence > $prev_seq)) {
					// insert if doesn't exist, otherwise overwrite it with newer data if current meeting's sequence is greater than prev. sequence

					if($parent) {
						$meeting->assigned_user_id = $parent->assigned_user_id;
						$meeting->team_set_id = $parent->team_set_id;
						$meeting->team_id = $parent->team_id;
						$meeting->parent_id = $parent->id;
						$meeting->parent_type = $parent->module_dir;
					}

					$meeting->date_start = $val->event->date_start;
					$meeting->date_end = $val->event->date_end;
					$meeting->name = $val->event->name;
					$meeting->date_entered = $val->event->date_created;
					$meeting->date_modified = $val->event->date_modified;
					$meeting->location = $val->event->location;
					$dateDiff = strtotime($val->event->date_end) - strtotime($val->event->date_start);
					$diffHours = floor(($dateDiff)/(60*60));
					$diffMinutes = ((($dateDiff)%(60*60))/(60*60)) * 60;
					$meeting->duration_hours = $diffHours;
					$meeting->duration_minutes = $diffMinutes;
					$meeting->outlook_id = $val->event->uid;
					$meeting->sequence = $val->event->sequence;

					if ($prev_exists && $val->event->status == 'CANCELLED') {
						$meeting->deleted = 1;
						$meeting->mark_deleted($meeting->id);
						continue;
					}

					$meeting_id = $meeting->save();

					// invite people
					$emails = array();
					foreach($val->event->attendees as $attendee) {
				        if(!empty($attendee['email'])) {
				            $emails[] = "ea.email_address_caps=".$meeting->db->quoted($this->cleanEmail($attendee['email']));
				        }
					}
					if(!empty($val->event->organizer) && !empty($val->event->organizer['email'])) {
					    $emails[] = "ea.email_address_caps=".$meeting->db->quoted($this->cleanEmail($val->event->organizer['email']));
					}
					if(!empty($emails)) {
					    $query = join(" OR ", $emails);
					    $invitees = $meeting->db->query("SELECT eabr.bean_id, eabr.bean_module FROM email_addr_bean_rel eabr
					    JOIN email_addresses ea ON eabr.email_address_id=ea.id
					    WHERE eabr.deleted=0 AND ea.deleted=0 AND eabr.bean_module IN ('Users','Contacts','Leads') AND ($query)
					    ");
					    $ids = array_flip($meeting->relationship_fields);
					    while($inv = $meeting->db->fetchByAssoc($invitees)) {
					        $module = strtolower($inv['bean_module']);
					        $relname = "meetings_$module";
                            $linkfields = VardefManager::getLinkFieldForRelationship("Meetings", "Meeting", $relname);

                            $bean = BeanFactory::getBean($inv['bean_module']);
                            if(empty($bean)) {
                                $GLOBALS['log']->info("createSugarEvents: Don't know how to create bean {$inv['bean_module']}");
                                continue;
                            }
                            // Hack - we don't care about this bean's permissions
                            $bean->disable_row_level_security = true;
                            $bean->retrieve($inv["bean_id"]);

                            $linkname = $linkfields['name'];
                            $meeting->load_relationship($linkname);
                            if(empty($meeting->$linkname)) {
                                $GLOBALS['log']->info("createSugarEvents: Unknown module $module with link $linkname encountered for id {$inv["bean_id"]}");
                                continue;
                            }
                            $GLOBALS['log']->info("Adding link for {$inv["bean_id"]} module $module relname $relname linkname $linkname");
                            $meeting->$linkname->add($bean);
					    }
					}
				}
			}
		}
	}
}
