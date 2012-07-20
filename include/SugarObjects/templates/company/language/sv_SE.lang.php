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


	
$mod_strings = array (
  'LBL_EMAIL_ADDRESS' => 'Epost Adress(er)',
  'ERR_DELETE_RECORD' => 'A record number must be specified to delete the account.',
  'LBL_FAX' => 'Fax:',
  'LBL_PARENT_ACCOUNT_ID' => 'Parent Account ID',
  'LBL_TEAMS_LINK' => 'Teams',
  'LBL_TICKER_SYMBOL' => 'Ticker Symbol:',
  'ACCOUNT_REMOVE_PROJECT_CONFIRM' => 'Är du säker på att du vill ta bort den här organisationen från detta projekt?',
  'LBL_ACCOUNT_NAME' => 'Företagsnamn:',
  'LBL_ACCOUNT' => 'Företag:',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Aktiviteter',
  'LBL_ADDRESS_INFORMATION' => 'Adressinformation',
  'LBL_ANNUAL_REVENUE' => 'Årlig inkomst:',
  'LBL_ANY_ADDRESS' => 'Någon Adress:',
  'LBL_ANY_EMAIL' => 'Någon Epost:',
  'LBL_ANY_PHONE' => 'Något Telefonnummer:',
  'LBL_ASSIGNED_TO_NAME' => 'Tilldelad Användare:',
  'LBL_RATING' => 'Klassificering',
  'LBL_ASSIGNED_USER' => 'Tilldelad Användare:',
  'LBL_ASSIGNED_TO_ID' => 'Tilldelad Användare:',
  'LBL_BILLING_ADDRESS_CITY' => 'Primär Stad:',
  'LBL_BILLING_ADDRESS_COUNTRY' => 'Primärt Land:',
  'LBL_BILLING_ADDRESS_POSTALCODE' => 'Primärt Postnummer:',
  'LBL_BILLING_ADDRESS_STATE' => 'Primär Stat:',
  'LBL_BILLING_ADDRESS_STREET_2' => 'Primär Adress 2',
  'LBL_BILLING_ADDRESS_STREET_3' => 'Primär Adress 3',
  'LBL_BILLING_ADDRESS_STREET_4' => 'Primär Adress 4',
  'LBL_BILLING_ADDRESS_STREET' => 'Primär Adress:',
  'LBL_BILLING_ADDRESS' => 'Primär Adress:',
  'LBL_ACCOUNT_INFORMATION' => 'Företagsinformation',
  'LBL_CITY' => 'Stad:',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakter',
  'LBL_COUNTRY' => 'Land:',
  'LBL_DATE_ENTERED' => 'Skapad datum:',
  'LBL_DATE_MODIFIED' => 'Modifierad datum:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Organisationer',
  'LBL_DESCRIPTION_INFORMATION' => 'Beskrivande Information',
  'LBL_DESCRIPTION' => 'Beskrivning:',
  'LBL_DUPLICATE' => 'Möjligen Duplicerade Organisationer',
  'LBL_EMAIL' => 'Epost:',
  'LBL_EMPLOYEES' => 'Anställda:',
  'LBL_INDUSTRY' => 'Industri:',
  'LBL_LIST_ACCOUNT_NAME' => 'Organisationsnamn',
  'LBL_LIST_CITY' => 'Stad',
  'LBL_LIST_EMAIL_ADDRESS' => 'Epostadress',
  'LBL_LIST_PHONE' => 'Telefon',
  'LBL_LIST_STATE' => 'Stat',
  'LBL_LIST_WEBSITE' => 'Websida',
  'LBL_MEMBER_OF' => 'Medlem Av:',
  'LBL_MEMBER_ORG_FORM_TITLE' => 'Medlemsorganisationer',
  'LBL_MEMBER_ORG_SUBPANEL_TITLE' => 'Medlemsorganisationer',
  'LBL_NAME' => 'Namn:',
  'LBL_OTHER_EMAIL_ADDRESS' => 'Sekundär Epost:',
  'LBL_OTHER_PHONE' => 'Sekundär Telefon:',
  'LBL_OWNERSHIP' => 'Ägare:',
  'LBL_PHONE_ALT' => 'Sekundär Telefon:',
  'LBL_PHONE_FAX' => 'Fax:',
  'LBL_PHONE_OFFICE' => 'Telefon Kontor:',
  'LBL_PHONE' => 'Telefon:',
  'LBL_POSTAL_CODE' => 'Postnummer:',
  'LBL_PUSH_BILLING' => 'Kopiera Primär',
  'LBL_PUSH_SHIPPING' => 'Kopiera Sekundär',
  'LBL_SAVE_ACCOUNT' => 'Spara Organisation',
  'LBL_SHIPPING_ADDRESS_CITY' => 'Sekundär Stad:',
  'LBL_SHIPPING_ADDRESS_COUNTRY' => 'Sekundärt Land:',
  'LBL_SHIPPING_ADDRESS_POSTALCODE' => 'Sekundärt Postnummer:',
  'LBL_SHIPPING_ADDRESS_STATE' => 'Sekondär Stat:',
  'LBL_SHIPPING_ADDRESS_STREET_2' => 'Sekundär Adress 2',
  'LBL_SHIPPING_ADDRESS_STREET_3' => 'Sekundär Adress 3',
  'LBL_SHIPPING_ADDRESS_STREET_4' => 'Sekundär Adress 4',
  'LBL_SHIPPING_ADDRESS_STREET' => 'Sekundär Adress:',
  'LBL_SHIPPING_ADDRESS' => 'Sekundär Adress:',
  'LBL_STATE' => 'Stat:',
  'LBL_TYPE' => 'Typ:',
  'LBL_USERS_ASSIGNED_LINK' => 'Tilldelad Användare',
  'LBL_USERS_CREATED_LINK' => 'Skapad Av Användare',
  'LBL_USERS_MODIFIED_LINK' => 'Modifierade Användare',
  'LBL_VIEW_FORM_TITLE' => 'Organisationvy',
  'LBL_WEBSITE' => 'Websida:',
  'LNK_ACCOUNT_LIST' => 'Organisationer',
  'LNK_NEW_ACCOUNT' => 'Skapa Organisation',
  'MSG_DUPLICATE' => 'Att skapa denna organisation kan möjligen skapa en duplicerad organisation. Du kan antingen välja en organisation här nedanför eller klicka Spara och fortsätta skapa en ny organisation med den tidigare införda datan.',
  'MSG_SHOW_DUPLICATES' => 'Att skapa denna organisation kan möjligen skapa en duplicerad organisation. Du kan antingen klicka Spara och fortsätta skapa ny organisation eller klicka avbryt',
  'NTC_COPY_BILLING_ADDRESS' => 'Kopiera primär adress till sekundär adress',
  'NTC_COPY_BILLING_ADDRESS2' => 'Kopiera primär',
  'NTC_COPY_SHIPPING_ADDRESS' => 'Kopiera sekundär adress till primär adress',
  'NTC_COPY_SHIPPING_ADDRESS2' => 'Kopiera sekundär',
  'NTC_DELETE_CONFIRMATION' => 'Är du säker på att du vill ta bort den här posten?',
  'NTC_REMOVE_ACCOUNT_CONFIRMATION' => 'Är du säker på att du vill ta bort den här posten?',
  'NTC_REMOVE_MEMBER_ORG_CONFIRMATION' => 'Är du säker på att du vill ta bort den här medlemsorganisationen?',
);

