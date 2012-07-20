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
  'LBL_LICENSING_INFO' => '<img src="http://translate.sugarcrm.com/latest/modules/Connectors/connectors/sources/ext/rest/zoominfoperson/images/zoominfo.gif"> ZoomInfo© provides deep information on over 45 million business people at over 5 million companies. Learn more. http://www.zoominfo.com/about',
  'LBL_SEARCH_FIELDS_INFO' => 'Följande fält stöds av Zoominfo© Person; API: Förnamn, Efternamn och epostadress.',
  'LBL_ID' => 'ID',
  'LBL_EMAIL' => 'Epostadress',
  'LBL_FIRST_NAME' => 'Förnamn',
  'LBL_LAST_NAME' => 'Efternamn',
  'LBL_JOB_TITLE' => 'Jobbtitel',
  'LBL_IMAGE_URL' => 'Bild URL',
  'LBL_SUMMARY_URL' => 'Summering URL',
  'LBL_COMPANY_NAME' => 'Företagsnamn',
  'LBL_ZOOMPERSON_URL' => 'Zoominfo person URL',
  'LBL_DIRECT_PHONE' => 'Direkttelefon',
  'LBL_COMPANY_PHONE' => 'Företagstelefon',
  'LBL_FAX' => 'Fax',
  'LBL_CURRENT_JOB_TITLE' => 'Nuvarande jobbtitel',
  'LBL_CURRENT_JOB_START_DATE' => 'Startdatum för nuvarande arbete',
  'LBL_CURRENT_JOB_COMPANY_NAME' => 'Namn på nuvarande arbetsgivare',
  'LBL_CURRENT_JOB_COMPANY_STREET' => 'Nuvarande arbetsgivares gatuadress',
  'LBL_CURRENT_JOB_COMPANY_CITY' => 'Nuvarande arbetsgivares postadress',
  'LBL_CURRENT_JOB_COMPANY_STATE' => 'Nuvarande arbetsgivares region',
  'LBL_CURRENT_JOB_COMPANY_ZIP' => 'Nuvarande arbetsgivares postnummer',
  'LBL_CURRENT_JOB_COMPANY_COUNTRY_CODE' => 'Nuvarande arbetsgivares landskod',
  'LBL_CURRENT_INDUSTRY' => 'Nuvarande arbetsgivares bransch',
  'LBL_BIOGRAPHY' => 'Biografi',
  'LBL_EDUCATION_SCHOOL' => 'Gymnasie/Universitet',
  'LBL_AFFILIATION_TITLE' => 'Anslutande arbets titel',
  'LBL_AFFILIATION_COMPANY_PHONE' => 'Anslutande företags telefon',
  'LBL_AFFILIATION_COMPANY_NAME' => 'Anslutande företagsnamn',
  'LBL_AFFILIATION_COMPANY_WEBSITE' => 'Anslutande företags hemsida',
  'person_search_url' => 'Person sökfråga URL',
  'person_detail_url' => 'Person detaljerade fråga URL',
  'partner_code' => 'Partner API kod',
  'api_key' => 'API nyckel',
  'ERROR_LBL_CONNECTION_PROBLEM' => 'Fel: Kan ej kontakta Zoominfo servern - "Person connector".',
);

