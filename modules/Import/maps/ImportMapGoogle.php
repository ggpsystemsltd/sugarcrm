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



require_once('modules/Import/maps/ImportMapOther.php');

class ImportMapGoogle extends ImportMapOther
{
	/**
     * String identifier for this import
     */
    public $name = 'google';
    
    /**
     * Gets the default mapping for a module
     *
     * @param  string $module
     * @return array field mappings
     */
	public function getMapping($module)
    {
         $return_array = array(
             'first_name' => array('sugar_key' => 'first_name', 'sugar_label' => '', 'default_label' => 'Given Name'),
             'last_name' => array('sugar_key' => 'last_name', 'sugar_label' => '', 'default_label' => 'Family Name'),
             'birthday' => array('sugar_key' => 'birthdate', 'sugar_label' => '', 'default_label' => 'Birthday'),
             'title' => array('sugar_key' => 'title', 'sugar_label' => '', 'default_label' => 'Title'),
             'notes' => array('sugar_key' => 'description', 'sugar_label' => '', 'default_label' => 'Notes'),

             'alt_address_street' => array('sugar_key' => 'alt_address_street', 'sugar_label' => '', 'default_label' => 'Home Street'),
             'alt_address_postcode' => array('sugar_key' => 'alt_address_postalcode', 'sugar_label' => '', 'default_label' => 'Home Postcode'),
             'alt_address_city' => array('sugar_key' => 'alt_address_city', 'sugar_label' => '', 'default_label' => 'Home City'),
             'alt_address_state' => array('sugar_key' => 'alt_address_state', 'sugar_label' => '', 'default_label' => 'Home State'),
             'alt_address_country' => array('sugar_key' => 'alt_address_country', 'sugar_label' => '', 'default_label' => 'Home Country'),

             'primary_address_street' => array('sugar_key' => 'primary_address_street', 'sugar_label' => '', 'default_label' => 'Work Street'),
             'primary_address_postcode' => array('sugar_key' => 'primary_address_postalcode', 'sugar_label' => '', 'default_label' => 'Work Postcode'),
             'primary_address_city' => array('sugar_key' => 'primary_address_city', 'sugar_label' => '', 'default_label' => 'Work City'),
             'primary_address_state' => array('sugar_key' => 'primary_address_state', 'sugar_label' => '', 'default_label' => 'Work State'),
             'primary_address_country' => array('sugar_key' => 'primary_address_country', 'sugar_label' => '', 'default_label' => 'Work Country'),

             'phone_main' => array('sugar_key' => 'phone_other', 'sugar_label' => '', 'default_label' => 'Main Phone'),
             'phone_mobile' => array('sugar_key' => 'phone_mobile', 'sugar_label' => '', 'default_label' => 'Mobile Phone'),
             'phone_home' => array('sugar_key' => 'phone_home', 'sugar_label' => '', 'default_label' => 'Home phone'),
             'phone_work' => array('sugar_key' => 'phone_work', 'sugar_label' => '', 'default_label' => 'Work phone'),
             'phone_fax' => array('sugar_key' => 'phone_fax', 'sugar_label' => '', 'default_label' => 'Fax phone'),

             'email1' => array('sugar_key' => 'email1', 'sugar_label' => 'LBL_EMAIL_ADDRESS', 'default_label' => 'Email Address'),
             'email2' => array('sugar_key' => 'email2', 'sugar_label' => 'LBL_OTHER_EMAIL_ADDRESS', 'default_label' => 'Other Email'),

             'assigned_user_name' => array('sugar_key' => 'assigned_user_name', 'sugar_help_key' => 'LBL_EXTERNAL_ASSIGNED_TOOLTIP', 'sugar_label' => 'LBL_ASSIGNED_TO_NAME', 'default_label' => 'Assigned To'),
             'team_name' => array('sugar_key' => 'team_name', 'sugar_help_key' => 'LBL_EXTERNAL_TEAM_TOOLTIP','sugar_label' => 'LBL_TEAMS', 'default_label' => 'Teams'),
            );

        if($module == 'Users')
        {
            $return_array['status'] =  array('sugar_key' => 'status', 'sugar_label' => '', 'default_label' => 'Status');
            $return_array['full_name'] =  array('sugar_key' => 'user_name', 'sugar_label' => '', 'default_label' => 'Full Name');
        }
        return $return_array;
    }
}


?>
