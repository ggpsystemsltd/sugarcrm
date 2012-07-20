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

	

$connector_strings = array (
  'LBL_LICENSING_INFO' => '<table border="0" cellspacing="1"><tr><td valign="top" width="35%" class="dataLabel"><image src="modules/Connectors/connectors/sources/ext/soap/hoovers/images/hooversLogo.gif" border="0"></td><td width="65%" valign="top" class="dataLabel">Hoovers&#169; levere gratis up-to-date information om virksomheder for brugere af SugarCRM prodkter. For at få mere uddybende information og rapporter på virksomheder, industrier og ledere gå til <a href="http://www.hoovers.com" target="_blank">http://www.hoovers.com</a>.</td></tr></table>',
  'LBL_DUNS' => 'DUNS',
  'LBL_SYNOPSIS' => 'Synopsis',
  'hoovers_wsdl' => 'WSDL URL',
  'LBL_ID' => 'Id',
  'LBL_NAME' => 'Firmanavn',
  'LBL_PARENT_DUNS' => 'Overordnet DUNS',
  'LBL_STREET' => 'Gade',
  'LBL_ADDRESS_STREET1' => 'Vej adresse 1',
  'LBL_ADDRESS_STREET2' => 'Vej adresse 2',
  'LBL_CITY' => 'By',
  'LBL_STATE' => 'Stat',
  'LBL_COUNTRY' => 'Land',
  'LBL_ZIP' => 'Postnummer',
  'LBL_FINSALES' => 'Årligt salg',
  'LBL_HQPHONE' => 'Telefon "arbejde":',
  'LBL_TOTAL_EMPLOYEES' => 'Total antal medarbejdere',
  'LBL_PRIMARY_URL' => 'Primær URL',
  'LBL_DESCRIPTION' => 'Beskrivelse',
  'LBL_LOCATION_TYPE' => 'Location type',
  'LBL_COMPANY_TYPE' => 'Virksomhedstype',
  'ERROR_NULL_CLIENT' => 'Kunne ikke få SoapClient til at oprette forbindelse til Hoovers. Denne service kan være utilgængelig, eller din licensnøgle kan være udløbet eller har nået en daglig brugsgrænse.',
  'ERROR_MISSING_SOAP_LIBRARIES' => 'Fejl: Kunne ikke indlæse SOAP bibliotekerne (SoapClient, SoapHeader).',
  'hoovers_endpoint' => 'Slut URL',
  'hoovers_api_key' => 'API nøgle',
);

