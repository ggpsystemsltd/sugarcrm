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
  'LBL_DUNS' => 'DUNS',
  'hoovers_wsdl' => 'WSDL URL',
  'LBL_LICENSING_INFO' => '<table border="0" cellspacing="1"><tr><td valign="top" width="35%" class="dataLabel"><image src="modules/Connectors/connectors/sources/ext/soap/hoovers/images/hooversLogo.gif" border="0"></td><td width="65%" valign="top" class="dataLabel">Hoovers&#169;pruža besplatne ažurirane informacije o kompanijama korisnicima SugarCRM proizvoda. Da biste dobili više informacija i izveštaje o kompanijama, industrijama, i rukovodiocima idite na <a href="http://www.hoovers.com" target="_blank">http://www.hoovers.com</a>.</td></tr></table>',
  'LBL_ID' => 'ID broj',
  'LBL_NAME' => 'Naziv kompanije',
  'LBL_PARENT_DUNS' => 'Matični DUNS',
  'LBL_STREET' => 'Ulica',
  'LBL_ADDRESS_STREET1' => 'Ulica1',
  'LBL_ADDRESS_STREET2' => 'Ulica2',
  'LBL_CITY' => 'Grad',
  'LBL_STATE' => 'Opština',
  'LBL_COUNTRY' => 'Država',
  'LBL_ZIP' => 'Poštanski broj',
  'LBL_FINSALES' => 'Godišnja prodaja',
  'LBL_HQPHONE' => 'Poslovni telefon',
  'LBL_TOTAL_EMPLOYEES' => 'Ukupno zaposlenih',
  'LBL_PRIMARY_URL' => 'Primarni URL',
  'LBL_DESCRIPTION' => 'Opis',
  'LBL_SYNOPSIS' => 'Sinopsis',
  'LBL_LOCATION_TYPE' => 'Tip lokacije',
  'LBL_COMPANY_TYPE' => 'Tip kompanije',
  'ERROR_NULL_CLIENT' => 'Nije moguće kreirati SoapClient-a za konekciju sa Hoovers. Servis je možda nedostupan ili Vam je istekla licenca ili ste dostigli dnevni limit korišćenja.',
  'ERROR_MISSING_SOAP_LIBRARIES' => 'Greška: Nije moguće učitati SOAP biblioteke (SoapClient, SoapHeader).',
  'hoovers_endpoint' => 'Krajnji URL',
  'hoovers_api_key' => 'API Ključ',
);

