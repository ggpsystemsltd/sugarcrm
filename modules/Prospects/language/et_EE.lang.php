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
  'db_last_name' => 'LBL_LIST_LAST_NAME',
  'db_first_name' => 'LBL_LIST_FIRST_NAME',
  'db_title' => 'LBL_LIST_TITLE',
  'db_email1' => 'LBL_LIST_EMAIL_ADDRESS',
  'db_email2' => 'LBL_LIST_OTHER_EMAIL_ADDRESS',
  'LBL_FAX_PHONE' => 'Fax:',
  'LBL_EMAIL_OPT_OUT' => 'Email Opt Out:',
  'LBL_CONVERT_BUTTON_KEY' => 'V',
  'LBL_TRACKER_KEY' => 'Tracker Key',
  'LBL_MODULE_NAME' => 'Eesmärgid',
  'LBL_MODULE_ID' => 'Eesmärgid',
  'LBL_INVITEE' => 'Otsesed aruanded',
  'LBL_MODULE_TITLE' => 'Eesmärgid: Avaleht',
  'LBL_SEARCH_FORM_TITLE' => 'Eesmärgi otsing',
  'LBL_LIST_FORM_TITLE' => 'Eesmärgi loend',
  'LBL_NEW_FORM_TITLE' => 'Uus eesmärk',
  'LBL_PROSPECT' => 'Eesmärk:',
  'LBL_BUSINESSCARD' => 'Visiitkaart',
  'LBL_LIST_NAME' => 'Nimi',
  'LBL_LIST_LAST_NAME' => 'Perekonnanimi',
  'LBL_LIST_PROSPECT_NAME' => 'Eesmärgi nimi',
  'LBL_LIST_TITLE' => 'Tiitel',
  'LBL_LIST_EMAIL_ADDRESS' => 'E-post',
  'LBL_LIST_OTHER_EMAIL_ADDRESS' => 'Teine E-post:',
  'LBL_LIST_PHONE' => 'Tlf number',
  'LBL_LIST_PROSPECT_ROLE' => 'Roll',
  'LBL_LIST_FIRST_NAME' => 'Eesnimi',
  'LBL_ASSIGNED_TO_NAME' => 'Vastutaja',
  'LBL_ASSIGNED_TO_ID' => 'Vastutaja:',
  'LBL_CAMPAIGN_ID' => 'Kampaania ID',
  'LBL_EXISTING_PROSPECT' => 'Kasutatud olemasolevat kontakti',
  'LBL_CREATED_PROSPECT' => 'Loodud uus kontakt',
  'LBL_EXISTING_ACCOUNT' => 'Kasutatud olemasolevat kontakti',
  'LBL_CREATED_ACCOUNT' => 'Loodud uus kontakt',
  'LBL_CREATED_CALL' => 'Loodud uus kõne',
  'LBL_CREATED_MEETING' => 'Loodud uus kohtumine',
  'LBL_ADDMORE_BUSINESSCARD' => 'Lisa teine visiitkaart',
  'LBL_ADD_BUSINESSCARD' => 'Sisesta visiitkaart',
  'LBL_NAME' => 'Nimi:',
  'LBL_FULL_NAME' => 'Nimi',
  'LBL_PROSPECT_NAME' => 'Eesmärgi nimi:',
  'LBL_PROSPECT_INFORMATION' => 'Eesmärgi ülevaade:',
  'LBL_MORE_INFORMATION' => 'Rohkem infot',
  'LBL_FIRST_NAME' => 'Eesnimi:',
  'LBL_OFFICE_PHONE' => 'Töötelefon:',
  'LBL_ANY_PHONE' => 'Muu telefon:',
  'LBL_PHONE' => 'Tlf number',
  'LBL_LAST_NAME' => 'Perekonnanimi:',
  'LBL_MOBILE_PHONE' => 'Mobiil:',
  'LBL_HOME_PHONE' => 'Telefon kodus:',
  'LBL_OTHER_PHONE' => 'Teine telefon:',
  'LBL_PRIMARY_ADDRESS_STREET' => 'Esmane aadress tänav:',
  'LBL_PRIMARY_ADDRESS_CITY' => 'Esmane aadress linn:',
  'LBL_PRIMARY_ADDRESS_COUNTRY' => 'Esmane aadress riik:',
  'LBL_PRIMARY_ADDRESS_STATE' => 'Esmane aadress maakond:',
  'LBL_PRIMARY_ADDRESS_POSTALCODE' => 'Esmane aadress postiindeks:',
  'LBL_ALT_ADDRESS_STREET' => 'Alternatiivne aadress tänav:',
  'LBL_ALT_ADDRESS_CITY' => 'Alternatiivne aadress linn:',
  'LBL_ALT_ADDRESS_COUNTRY' => 'Alternatiivne aadress riik:',
  'LBL_ALT_ADDRESS_STATE' => 'Alternatiivne aadress maakond:',
  'LBL_ALT_ADDRESS_POSTALCODE' => 'Alternatiivne aadress postiindeks:',
  'LBL_TITLE' => 'Tiitel:',
  'LBL_DEPARTMENT' => 'Osakond:',
  'LBL_BIRTHDATE' => 'Sünnipäev:',
  'LBL_EMAIL_ADDRESS' => 'E-post:',
  'LBL_OTHER_EMAIL_ADDRESS' => 'Teine e-post:',
  'LBL_ANY_EMAIL' => 'Muu E-post:',
  'LBL_ASSISTANT' => 'Assistent',
  'LBL_ASSISTANT_PHONE' => 'Assistendi telefon:',
  'LBL_DO_NOT_CALL' => 'Mitte helistada:',
  'LBL_PRIMARY_ADDRESS' => 'Esmane aadress:',
  'LBL_ALTERNATE_ADDRESS' => 'Teine aadress:',
  'LBL_ANY_ADDRESS' => 'Muu aadress:',
  'LBL_CITY' => 'Linn:',
  'LBL_STATE' => 'Maakond:',
  'LBL_POSTAL_CODE' => 'Postiindeks:',
  'LBL_COUNTRY' => 'Riik:',
  'LBL_DESCRIPTION_INFORMATION' => 'Kirjelduse info',
  'LBL_ADDRESS_INFORMATION' => 'Aadressi info',
  'LBL_DESCRIPTION' => 'Kirjeldus:',
  'LBL_PROSPECT_ROLE' => 'Roll',
  'LBL_OPP_NAME' => 'Müügivõimaluse nimi:',
  'LBL_IMPORT_VCARD' => 'Impordi vCard',
  'LBL_IMPORT_VCARDTEXT' => 'Loo automaatselt uus kontakt importides vCardi sinu failisüsteemist.',
  'LBL_DUPLICATE' => 'Võimalikud topelteesmärgid',
  'MSG_SHOW_DUPLICATES' => 'Eesmärgi kirje, mida hetkel lood võib olla duplikaat juba olemasolevast eesmärgi kirjest. Eesmärgi kirjed, mis sisaldavad sarnaseid nimesid ja/või aadresse on väljatoodud allpool. Kliki Salvesta selle uue eesmärgi loomiseks või kliki Tühista moodulisse tagasiminemiseks eesmärki loomata.',
  'MSG_DUPLICATE' => 'Eesmärgi kirje, mida hetkel lood võib olla duplikaat juba olemasolevast eesmärgi kirjest. Eesmärgi kirjed, mis sisaldavad sarnaseid nimesid ja/või aadresse on väljatoodud allpool. Kliki Salvesta selle uue eesmärgi loomiseks või kliki Tühista moodulisse tagasiminemiseks eesmärki loomata.',
  'LNK_IMPORT_VCARD' => 'Loo  vCardist',
  'LNK_NEW_ACCOUNT' => 'Loo ettevõte',
  'LNK_NEW_OPPORTUNITY' => 'Loo müügivõimalus',
  'LNK_NEW_CASE' => 'Loo juhtum',
  'LNK_NEW_NOTE' => 'Loo märkus või manus',
  'LNK_NEW_CALL' => 'Kõne logi',
  'LNK_NEW_EMAIL' => 'Arhiveeri e-kiri',
  'LNK_NEW_MEETING' => 'Planeeri kohtumine',
  'LNK_NEW_TASK' => 'Loo ülesanne',
  'LNK_NEW_APPOINTMENT' => 'Loo kohtumine',
  'LNK_IMPORT_PROSPECTS' => 'Impordi potentsiaalsed kliendid',
  'NTC_DELETE_CONFIRMATION' => 'Kas oled kindel, et soovid seda kirjet kustutada?',
  'NTC_REMOVE_CONFIRMATION' => 'Oled kindel, et soovid selle kontakti juhtumist eemaldada?',
  'NTC_REMOVE_DIRECT_REPORT_CONFIRMATION' => 'Oled kindel, et soovid selle kirje eemaldada otsese aruandena?',
  'ERR_DELETE_RECORD' => 'Kontakti kustutamiseks täpsusta kirje numbrit.',
  'NTC_COPY_PRIMARY_ADDRESS' => 'Kopeeri esmane aadress alternatiivseks aadressiks',
  'NTC_COPY_ALTERNATE_ADDRESS' => 'Kopeeri alternatiivne aadress esmaseks aadressiks',
  'LBL_SALUTATION' => 'Tervitus',
  'LBL_SAVE_PROSPECT' => 'Salvesta eesmärk',
  'LBL_CREATED_OPPORTUNITY' => 'Loodud uus müügivõimalus',
  'NTC_OPPORTUNITY_REQUIRES_ACCOUNT' => 'Müügivõimaluse loomine eeldab ettevõtte kontot. \\n Palun loo kas uus ettevõte või vali olemasolev.',
  'LNK_SELECT_ACCOUNT' => 'Vali ettevõte',
  'LNK_NEW_PROSPECT' => 'Loo eesmärk',
  'LNK_PROSPECT_LIST' => 'Vaata eesmärke',
  'LNK_NEW_CAMPAIGN' => 'Loo kampaania',
  'LNK_CAMPAIGN_LIST' => 'Kampaaniad',
  'LNK_NEW_PROSPECT_LIST' => 'Loo eesmärkide loend',
  'LNK_PROSPECT_LIST_LIST' => 'Eesmärkide loend',
  'LNK_IMPORT_PROSPECT' => 'Impordi eesmärgid',
  'LBL_SELECT_CHECKED_BUTTON_LABEL' => 'Vali kontrollitud eesmärgid',
  'LBL_SELECT_CHECKED_BUTTON_TITLE' => 'Vali kontrollitud eesmärgid',
  'LBL_INVALID_EMAIL' => 'Kehtetu e-post:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Eesmärgid',
  'LBL_PROSPECT_LIST' => 'Potentsiaalsete klientide loend',
  'LBL_CONVERT_BUTTON_TITLE' => 'Konverteeri eesmärk',
  'LBL_CONVERT_BUTTON_LABEL' => 'Konverteeri eesmärk',
  'LBL_CONVERTPROSPECT' => 'Konverteeri eesmärk',
  'LNK_NEW_CONTACT' => 'Uus kontakt',
  'LBL_CREATED_CONTACT' => 'Loodud uus kontakt',
  'LBL_BACKTO_PROSPECTS' => 'Tagasi eesmärkide juurde',
  'LBL_CAMPAIGNS' => 'Kampaaniad',
  'LBL_CAMPAIGN_LIST_SUBPANEL_TITLE' => 'Kampaania logi',
  'LBL_LEAD_ID' => 'Müügivihje ID:',
  'LBL_CONVERTED_LEAD' => 'Konverteeri müügivihje',
  'LBL_ACCOUNT_NAME' => 'Ettevõtte nimi',
  'LBL_EDIT_ACCOUNT_NAME' => 'Ettevõtte nimi:',
  'LBL_CREATED_USER' => 'Loodud kasutaja',
  'LBL_MODIFIED_USER' => 'Muudetud kasutaja',
  'LBL_CAMPAIGNS_SUBPANEL_TITLE' => 'Kampaaniad',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Ajalugu',
);

