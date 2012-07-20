<?php

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





if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


	
$connector_strings = array (
  'LBL_LICENSING_INFO' => '<img src="http://translate.sugarcrm.com/latest/modules/Connectors/connectors/sources/ext/soap/hoovers/images/hooversLogo.gif"> Hoovers© provides free up-to-date information on companies to users of SugarCRM products. To get more comprehensive information and reports on companies, industries, and executives go to http://www.hoovers.com.',
  'LBL_ID' => 'ID',
  'LBL_NAME' => 'Företagsnamn',
  'LBL_DUNS' => 'DUNS',
  'LBL_PARENT_DUNS' => 'Huvud DUNS',
  'LBL_STREET' => 'Gata',
  'LBL_ADDRESS_STREET1' => 'Gatuadress1',
  'LBL_ADDRESS_STREET2' => 'Gatuadress2',
  'LBL_CITY' => 'Stad',
  'LBL_STATE' => 'Region',
  'LBL_COUNTRY' => 'Land',
  'LBL_ZIP' => 'Postnummer',
  'LBL_FINSALES' => 'Årlig försäljning',
  'LBL_HQPHONE' => 'Kontorstelefon',
  'LBL_TOTAL_EMPLOYEES' => 'Totalt antal anställda',
  'LBL_PRIMARY_URL' => 'Primär URL',
  'LBL_DESCRIPTION' => 'Beskrivning',
  'LBL_SYNOPSIS' => 'Översikt',
  'LBL_LOCATION_TYPE' => 'Platstyp',
  'LBL_COMPANY_TYPE' => 'Företagstyp',
  'ERROR_NULL_CLIENT' => 'SoapClient kan ej koppla till Hoovers. Servicen är antingen inte tillgänglig eller så är din licens nyckel inte längre giltig eller har nått sin dagliga limit.',
  'ERROR_MISSING_SOAP_LIBRARIES' => 'Fel: Kunde ej ladda SOAP biblioteken (SoapClient, SoapHeader).',
  'hoovers_endpoint' => 'Ändpunkt URL',
  'hoovers_wsdl' => 'WSDL URL',
  'hoovers_api_key' => 'API nyckel',
);

