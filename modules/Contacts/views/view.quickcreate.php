<?php
//FILE SUGARCRM flav=pro || flav=sales
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


require_once('include/MVC/View/views/view.quickcreate.php');

class ContactsViewQuickcreate extends ViewQuickcreate
{
    public function preDisplay() 
    {
    	parent::preDisplay();
    	if($this->_isDCForm) {
    		//XXX TODO 20110329 Frank Steegmans: Hack to make quick create fields populate when used through the DC menu
    		//          NOTE HOWEVER that sqs_objects form fields are not properly populated because of some other hacks
    		//          resulting in none of the fields properly populating when selecting an account
    		if(!empty($this->bean->phone_office))$_REQUEST['phone_work'] = $this->bean->phone_office;
    		if(!empty($this->bean->billing_address_street))$_REQUEST['primary_address_street'] = $this->bean->billing_address_street;
    		if(!empty($this->bean->billing_address_city))$_REQUEST['primary_address_city'] = $this->bean->billing_address_city;
    		if(!empty($this->bean->billing_address_state))$_REQUEST['primary_address_state'] = $this->bean->billing_address_state;
    		if(!empty($this->bean->billing_address_country))$_REQUEST['primary_address_country'] = $this->bean->billing_address_country;
    		if(!empty($this->bean->billing_address_postalcode))$_REQUEST['primary_address_postalcode'] = $this->bean->billing_address_postalcode;
	   	}
    }    
}