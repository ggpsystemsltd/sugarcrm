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
 * Hebrew vertion by:
 * Menahem Lurie Consultancy and IT Management,SugarCRM partner - Israel
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * *******************************************************************************/


$connector_strings = array (
    //licensing information shown in config screen
    'LBL_LICENSING_INFO' => '<table border="0" cellspacing="1"><tr><td valign="top" width="35%" class="dataLabel"><image src="' . getWebPath('modules/Connectors/connectors/sources/ext/soap/hoovers/images/hooversLogo.gif') . '" border="0"></td><td width="65%" valign="top" class="dataLabel">' .
                            'Hoovers&amp;#169; provides free up-to-date information on companies to users of SugarCRM products.  To get more comprehensive information and reports on companies, industries, and executives go to <a href="http://www.hoovers.com" target="_blank">http://www.hoovers.com</a>.</td></tr></table>',    
  
    //vardef labels
	'LBL_ID' => 'ID',
	'LBL_NAME' => 'שם חברה',
	'LBL_DUNS' => 'מספר דן אנד ברדסטריר',
	'LBL_PARENT_DUNS' => 'מספר אב דן אנד ברדסטריט ',
	'LBL_STREET' => 'רחוב',
	'LBL_ADDRESS_STREET1' => 'כתובת הרחוב',
    'LBL_ADDRESS_STREET2' => 'כתובת רחוב משנית',
	'LBL_CITY' => 'עיר',
	'LBL_STATE' => 'מדינה',
	'LBL_COUNTRY' => 'מחוז',
	'LBL_ZIP' => 'מיקוד',
	'LBL_FINSALES' => 'מכירות שנתי',
    'LBL_HQPHONE' => 'טלפון במשרד',
    'LBL_TOTAL_EMPLOYEES' => 'סך הכל עובדים',
	'LBL_PRIMARY_URL' => 'כתובת אתר אינטרנט',
	'LBL_DESCRIPTION' => 'תיאור',
	'LBL_SYNOPSIS' => 'תקציר',
	'LBL_LOCATION_TYPE' => 'סוג מיקום',
	'LBL_COMPANY_TYPE' => 'סוג חברה',
	
    //error messages
    'ERROR_NULL_CLIENT' => 'Unable to create SoapClient to connect to Hoovers.  The service may be unavailable or your license key may be expired or have reached a daily usage limit.',
    'ERROR_MISSING_SOAP_LIBRARIES' => 'Error: Unable to load the SOAP libraries (SoapClient, SoapHeader).',

	//Configuration labels
	'hoovers_endpoint' => 'כתובת אינטרנט לנחיתה',
	'hoovers_wsdl' => 'WSDL כתובת אינשט',
	'hoovers_api_key' => 'API מפתח',
);

?>

