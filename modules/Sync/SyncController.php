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

$sync_modules = array(
				array('name'=>'EditCustomFields', 'direction'=>'down','related'=>array(), 'exempt'=>true),
				array('name'=>'Teams', 'direction'=>'down', 'related'=>array() ,'exempt'=>true),
				array('name'=>'TeamMemberships', 'direction'=>'down', 'related'=>array()),
				array('name'=>'TeamSets', 'direction'=>'both', 'related'=>array('Teams')),
				array('name'=>'Roles', 'direction'=>'down', 'related'=>array()),
				array('name'=>'ACLActions', 'direction'=>'down', 'related'=>array(),'exempt'=>true),
				array('name'=>'ACLRoles', 'direction'=>'down', 'related'=>array('ACLActions', 'Users'), 'exempt'=>true) ,
				array('name'=>'ACLFields', 'direction'=>'down', 'related'=>array(), 'exempt'=>true) ,
				array('name'=>'Currencies', 'direction'=>'down', 'related'=>array()),
				array('name'=>'Versions', 'direction'=>'down', 'related'=>array()),
				 array('name'=>'Accounts', 'direction'=>'both','related'=>array('Accounts','Contacts', 'Leads', 'Opportunities', 'Products', 'Quotes', 'Notes','Tasks', 'Calls', 'Meetings', 'EmailAddresses')),
				 array('name'=>'Contacts', 'direction'=>'both', 'related'=>array('Contacts', 'Leads', 'Opportunities', 'Products', 'Quotes', 'Notes', 'Tasks', 'Calls', 'Meetings', 'EmailAddresses')),
				 array('name'=>'Leads', 'direction'=>'both', 'related'=>array('Tasks', 'Notes', 'Calls', 'Meetings', 'EmailAddresses')),
				 array('name'=>'Calls', 'direction'=>'both', 'related'=>array('Users')),
				 array('name'=>'Meetings', 'direction'=>'both', 'related'=>array('Users')),
				 array('name'=>'Tasks', 'direction'=>'both', 'related'=>array()),
				 array('name'=>'Quotes', 'direction'=>'both', 'related'=>array('Opportunities')),
				 array('name'=>'Opportunities', 'direction'=>'both', 'related'=>array()),
				 array('name'=>'Notes', 'direction'=>'both', 'related'=>array()),
				 array('name'=>'Products', 'direction'=>'both', 'related'=>array('Products')),
				 array('name'=>'ProductBundleNotes', 'direction'=>'both', 'related'=>array()),
				 array('name'=>'ProductTemplates', 'direction'=>'both', 'direction'=>'both', 'related'=>array()),
				 array('name'=>'ProductCategories', 'direction'=>'both', 'related'=>array()),
				 array('name'=>'ProductBundles', 'direction'=>'both', 'related'=>array('Quotes','Products','ProductBundleNotes' )),
				 array('name'=>'ProductTypes', 'direction'=>'both', 'related'=>array()),
				 array('name'=>'Manufacturers', 'direction'=>'both', 'related'=>array()),
				 array('name'=>'Shippers', 'direction'=>'down', 'related'=>array()),
				 array('name'=>'TaxRates', 'direction'=>'down', 'related'=>array()),
				array('name'=>'TimePeriods', 'direction'=>'both', 'related'=>array()),
				array('name'=>'Forecasts', 'direction'=>'both', 'related'=>array()),
				array('name'=>'ForecastSchedule', 'direction'=>'both', 'related'=>array()),
				array('name'=>'Quotas', 'direction'=>'both', 'related'=>array()),
				array('name'=>'Currencies', 'direction'=>'both', 'related'=>array()),
				array('name'=>'Contracts', 'direction'=>'both', 'related'=>array()),
				array('name'=>'Worksheet', 'direction'=>'both', 'related'=>array()),
				array('name'=>'EmailAddresses', 'direction'=>'both', 'related'=>array()),
				 // A Special Sync is done for users array('name'=>'Users', 'related'=>array()),
			);
			
$moduleList =  array(
			     'Home',
				 'Calendar',
				 'Meetings',
                 'Calls',
                 'Notes',
                 'Tasks',
				 'Accounts',
				 'Contacts',
				 'Leads',
				 'Opportunities',
				 'Quotes',
				 'Products',
				 'Forecasts'
				 
			);
			
$read_only_override = array(
	'Quotas',
	'Worksheet',
	'ProductBundles',
	'ProductBundleNotes',
	'TeamSets',
	'EmailAddresses',
);
global $soapclient, $soap_server;
$soap_server = $sugar_config['sync_site_url'] . '/soap.php';
require_once('include/nusoap/nusoap.php');  //must also have the nusoap code on the ClientSide.
$soapclient = new nusoapclient($soap_server);  //define the SOAP Client an			
$soapclient->response_timeout = 360;
if(!isset($_SESSION['soap_server_available'])){
	$_SESSION['soap_server_available'] = false;	
}
$soap_server_available  = $_SESSION['soap_server_available'];

if(!isset($global_control_links)){
 	$global_control_links = array();
	$sub_menu = array();
}

 




?>