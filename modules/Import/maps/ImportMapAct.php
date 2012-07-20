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

/*********************************************************************************

 * Description: Holds import setting for ACT! files
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 ********************************************************************************/

require_once('modules/Import/maps/ImportMapOther.php');

class ImportMapAct extends ImportMapOther
{
    /**
     * String identifier for this import
     */
    public $name = 'act';
	/**
     * Field delimiter
     */
    public $delimiter = ',';
    /**
     * Field enclosure
     */
    public $enclosure = '"';
	/**
     * Do we have a header?
     */
    public $has_header = true;

    /**
     * Gets the default mapping for a module
     *
     * @param  string $module
     * @return array field mappings
     */
	public function getMapping(
        $module
        )
    {
        $return_array = parent::getMapping($module);
        switch ($module) {
        case 'Contacts':
        case 'Leads':
            return $return_array + array(
                "Web Site"=>"website",
                "Company"=>"account_name",
                "Name Suffix"=>"salutation",
                "Address 1"=>"primary_address_street",
                "Address 2"=>"primary_address_street_2",
                "Address 3"=>"primary_address_street_3",
                "City"=>"primary_address_city",
                "State"=>"primary_address_state",
                "Zip"=>"primary_address_postalcode",
                "Country"=>"primary_address_country",
                "Phone"=>"phone_work",
                "Phone Ext-"=>"phone_work_ext",
                "Mobile Phone"=>"phone_mobile",
                "Alt Phone"=>"phone_other",
                "Fax"=>"phone_fax",
                "E-mail Login"=>"email1",
                "E-mail"=>"email1",
                "Assistant"=>"assistant",
                "Asst. Phone"=>"assistant_phone",
                "Home Address 1"=>"alt_address_street",
                "Home Address 2"=>"alt_address_street_2",
                "Home Address 3"=>"alt_address_street_3",
                "Home Zip"=>"alt_address_postalcode",
                "Home Country"=>"alt_address_country",
                "Home Phone"=>"phone_home",
                );
            break;
        case 'Accounts':
            return $return_array + array(
                "Revenue"=>"annual_revenue",
                "Number of Employees"=>"employees",
                "Address 1"=>"billing_address_street",
                "City"=>"billing_address_city",
                "State"=>"billing_address_state",
                "Zip Code"=>"billing_address_postalcode",
                "Country"=>"billing_address_country",
                "Phone"=>"phone_office",
                "Fax Phone"=>"phone_fax",
                "Ticker Symbol"=>"ticker_symbol",
                );
            break;
        default:
            return $return_array;
        }
    }
}


?>
