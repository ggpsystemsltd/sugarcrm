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
 * vCard implementation
 * @api
 */
class vCard
{
	protected $properties = array();

	protected $name = 'no_name';

	public function clear()
	{
		$this->properties = array();
	}

	function loadContact($contactid, $module='Contacts') {
		global $app_list_strings;

		require_once($GLOBALS['beanFiles'][$GLOBALS['beanList'][$module]]);
		$contact = new $GLOBALS['beanList'][$module]();
		$contact->retrieve($contactid);
		// Bug 21824 - Filter fields exported to a vCard by ACLField permissions.
		$contact->ACLFilterFields();
		// cn: bug 8504 - CF/LB break Outlook's vCard import
		$bad = array("\n", "\r");
		$good = array("=0A", "=0D");
		$encoding = '';
		if(strpos($contact->primary_address_street, "\n") || strpos($contact->primary_address_street, "\r")) {
			$contact->primary_address_street = str_replace($bad, $good, $contact->primary_address_street);
			$encoding = 'QUOTED-PRINTABLE';
		}

		$this->setName(from_html($contact->first_name), from_html($contact->last_name), $app_list_strings['salutation_dom'][from_html($contact->salutation)]);
		if ( isset($contact->birthdate) )
            $this->setBirthDate(from_html($contact->birthdate));
		$this->setPhoneNumber(from_html($contact->phone_fax), 'FAX');
		$this->setPhoneNumber(from_html($contact->phone_home), 'HOME');
		$this->setPhoneNumber(from_html($contact->phone_mobile), 'CELL');
		$this->setPhoneNumber(from_html($contact->phone_work), 'WORK');
		$this->setEmail(from_html($contact->email1));
		$this->setAddress(from_html($contact->primary_address_street), from_html($contact->primary_address_city), from_html($contact->primary_address_state), from_html($contact->primary_address_postalcode), from_html($contact->primary_address_country), 'WORK', $encoding);
		if ( isset($contact->account_name) )
            $this->setORG(from_html($contact->account_name), from_html($contact->department));
        else
            $this->setORG('', from_html($contact->department));
		$this->setTitle($contact->title);
	}

	function setTitle($title){
		$this->setProperty("TITLE",$title );
	}
	function setORG($org, $dep){
		$this->setProperty("ORG","$org;$dep" );
	}
	function setAddress($address, $city, $state,$postal, $country, $type, $encoding=''){
		if(!empty($encoding)) {
			$encoding = ";ENCODING={$encoding}";
		}
		$this->setProperty("ADR;$type$encoding",";;$address;$city;$state;$postal;$country" );
	}

	function setName($first_name, $last_name, $prefix){
		$this->name = strtr($first_name.'_'.$last_name, ' ' , '_');
		$this->setProperty('N',$last_name.';'.$first_name.';;'.$prefix );
		$this->setProperty('FN',"$prefix $first_name $last_name");
	}

	function setEmail($address){
		$this->setProperty('EMAIL;INTERNET', $address);
	}

	function setPhoneNumber( $number, $type)
	{
		if($type != 'FAX') {
		    $this->setProperty("TEL;$type", $number);
		}
		else {
		    $this->setProperty("TEL;WORK;$type", $number);
		}
	}
	function setBirthDate($date){
			$this->setProperty('BDAY',$date);
	}
	function getProperty($name){
		if(isset($this->properties[$name]))
			return $this->properties[$name];
		return null;
	}

	function setProperty($name, $value){
		$this->properties[$name] = $value;
	}

	function toString(){
	    global $locale;
		$temp = "BEGIN:VCARD\n";
		foreach($this->properties as $key=>$value){
		    if(!empty($value)) {
			    $temp .= $key. ';CHARSET='.strtolower($locale->getExportCharset()).':'.$value."\n";
		    } else {
		        $temp .= $key. ':'.$value."\n";
		    }
		}
		$temp.= "END:VCARD\n";


		return $temp;
	}

	function saveVCard(){
		global $locale;
		$content = $this->toString();
		if ( !defined('SUGAR_PHPUNIT_RUNNER') ) {
            header("Content-Disposition: attachment; filename={$this->name}.vcf");
            header("Content-Type: text/x-vcard; charset=".$locale->getExportCharset());
            header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
            header("Last-Modified: " . TimeDate::httpTime() );
            header("Cache-Control: max-age=0");
            header("Pragma: public");
            //bug45856 IIS Doesn't like this to be set and it causes the vCard to not get saved
            if (preg_match('/iis/i', $_SERVER['SERVER_SOFTWARE']) === 0) {
                header("Content-Length: ".strlen($content));
            }
        }

		print $locale->translateCharset($content, 'UTF-8', $locale->getExportCharset());
	}

	function importVCard($filename, $module='Contacts'){
		global $current_user;
		$lines =	file($filename);
		$start = false;
		$contact = loadBean($module);

		$contact->title = 'imported';
		$contact->assigned_user_id = $current_user->id;
		$fullname = '';
        $email_suffix = 1;

		for($index = 0; $index < sizeof($lines); $index++){
			$line = $lines[$index];

            // check the encoding and change it if needed
            $locale = new Localization();
            $encoding = $locale->detectCharset($line);
            if ( $encoding != $GLOBALS['sugar_config']['default_charset'] ) {
                $line = $locale->translateCharset($line,$encoding);
            }
			$line = trim($line);
			if($start){
				//VCARD is done
				if(substr_count(strtoupper($line), 'END:VCARD')){
					if(!isset($contact->last_name)){
						$contact->last_name = $fullname;
					}
                    break;
				}
				$keyvalue = explode(':',$line);
				if(sizeof($keyvalue)==2){
					$value = $keyvalue[1];
					for($newindex= $index + 1;  $newindex < sizeof($lines), substr_count($lines[$newindex], ':') == 0; $newindex++){
							$value .= $lines[$newindex];
							$index = $newindex;
					}
					$values = explode(';',$value );
					$key = strtoupper($keyvalue[0]);
					$key = strtr($key, '=', '');
					$key = strtr($key, ',',';');
					$keys = explode(';' ,$key);

					if($keys[0] == 'TEL'){
						if(substr_count($key, 'WORK') > 0){
								if(substr_count($key, 'FAX') > 0){
										if(!isset($contact->phone_fax)){
											$contact->phone_fax = $value;
										}
								}else{
									if(!isset($contact->phone_work)){
											$contact->phone_work = $value;
									}
								}
						}
						if(substr_count($key, 'HOME') > 0){
								if(substr_count($key, 'FAX') > 0){
										if(!isset($contact->phone_fax)){
											$contact->phone_fax = $value;
										}
								}else{
									if(!isset($contact->phone_home)){
											$contact->phone_home = $value;
									}
								}
						}
						if(substr_count($key, 'CELL') > 0){
								if(!isset($contact->phone_mobile)){
										$contact->phone_mobile = $value;
								}

						}
						if(substr_count($key, 'FAX') > 0){
										if(!isset($contact->phone_fax)){
											$contact->phone_fax = $value;
						}

						}

					}
					if($keys[0] == 'N'){
						if(sizeof($values) > 0)
							$contact->last_name = $values[0];
						if(sizeof($values) > 1)
							$contact->first_name = $values[1];
						if(sizeof($values) > 2)
							$contact->salutation = $values[2];



					}
					if($keys[0] == 'FN'){
						$fullname = $value;


					}

                }
					if($keys[0] == 'ADR'){
						if(substr_count($key, 'WORK') > 0 && (substr_count($key, 'POSTAL') > 0|| substr_count($key, 'PARCEL') == 0)){

								if(!isset($contact->primary_address_street) && sizeof($values) > 2){
                                        $textBreaks = array("\n", "\r");
                                        $vcardBreaks = array("=0A", "=0D");
										$contact->primary_address_street = str_replace($vcardBreaks, $textBreaks, $values[2]);
								}
								if(!isset($contact->primary_address_city) && sizeof($values) > 3){
										$contact->primary_address_city = $values[3];
								}
								if(!isset($contact->primary_address_state) && sizeof($values) > 4){
										$contact->primary_address_state = $values[4];
								}
								if(!isset($contact->primary_address_postalcode) && sizeof($values) > 5){
										$contact->primary_address_postalcode = $values[5];
								}
								if(!isset($contact->primary_address_country) && sizeof($values) > 6){
										$contact->primary_address_country = $values[6];
								}
						}
					}

					if($keys[0] == 'TITLE'){
						$contact->title = $value;

					}
					if($keys[0] == 'EMAIL'){
                        $field = 'email' . $email_suffix;
						if(!isset($contact->$field)) {
						   $contact->$field = $value;
						}

						if($email_suffix == 1) {
						   $_REQUEST['email1'] = $value;
						}

						$email_suffix++;
					}

					if($keys[0] == 'ORG'){
                        $GLOBALS['log']->debug('I found a company name');
						if(!empty($value)){
                            $GLOBALS['log']->debug('I found a company name (fer real)');
                            if ( is_a($contact,"Contact") || is_a($contact,"Lead") ) {
                                $GLOBALS['log']->debug('And Im dealing with a person!');
                                $accountBean = loadBean('Accounts');
                                // It's a contact, we better try and match up an account
								$full_company_name = trim($values[0]);
                                // Do we have a full company name match?
                                $result = $accountBean->retrieve_by_string_fields(array('name' => $full_company_name, 'deleted' => 0));
                                if ( ! isset($result->id) ) {
                                    // Try to trim the full company name down, see if we get some other matches
                                    $vCardTrimStrings = array('/ltd\.*/i'=>'',
                                                              '/llc\.*/i'=>'',
                                                              '/gmbh\.*/i'=>'',
                                                              '/inc\.*/i'=>'',
                                                              '/\.com/i'=>'',
                                        );
                                    // Allow users to override the trimming strings
                                    if ( file_exists('custom/include/vCardTrimStrings.php') ) {
                                        require_once('custom/include/vCardTrimStrings.php');
                                    }
                                    $short_company_name = trim(preg_replace(array_keys($vCardTrimStrings),$vCardTrimStrings,$full_company_name)," ,.");

                                    $GLOBALS['log']->debug('Trying an extended search for: '.$short_company_name);
                                    $result = $accountBean->retrieve_by_string_fields(array('name' => $short_company_name, 'deleted' => 0));
                                }

                                if (  is_a($contact,"Lead") || ! isset($result->id) ) {
                                    // We could not find a parent account, or this is a lead so only copy the name, no linking
                                    $GLOBALS['log']->debug("Did not find a matching company ($full_company_name)");
                                    $contact->account_id = '';
                                    $contact->account_name = $full_company_name;
                                } else {
                                    $GLOBALS['log']->debug("Found a matching company: ".$result->name);
                                    $contact->account_id = $result->id;
                                    $contact->account_name = $result->name;
                                }
                                $contact->department = $values[1];
                            } else{
								$contact->department = $value;
                            }
						}

					}

				}




			//FOUND THE BEGINING OF THE VCARD
			if(!$start && substr_count(strtoupper($line), 'BEGIN:VCARD')){
				$start = true;
			}

		}

        if ( is_a($contact, "Contact") && empty($contact->account_id) && !empty($contact->account_name) ) {
            $GLOBALS['log']->debug("Look ma! I'm creating a new account: ".$contact->account_name);
            // We need to create a new account
            $accountBean = loadBean('Accounts');
            // Populate the newly created account with all of the contact information
            foreach ( $contact->field_defs as $field_name => $field_def ) {
                if ( !empty($contact->$field_name) ) {
                    $accountBean->$field_name = $contact->$field_name;
                }
            }
            $accountBean->name = $contact->account_name;
            $accountBean->save();
            $contact->account_id = $accountBean->id;
        }

        $contactId = $contact->save();
        return $contactId;
	}
	}








?>
