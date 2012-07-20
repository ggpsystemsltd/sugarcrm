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
  'LBL_MORE_INFORMATION' => 'Mer information',
  'LNK_IMPORT_PROSPECTS' => 'Importera prospekts',
  'LBL_PROSPECT_LIST' => 'Prospek lista',
  'LBL_CREATED_USER' => 'Skapad användare',
  'LBL_MODIFIED_USER' => 'Ändrad användare',
  'LBL_CAMPAIGNS_SUBPANEL_TITLE' => 'Kampanjer',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Historik',
  'LBL_PROSPECT' => 'Target:',
  'db_last_name' => 'LBL_LIST_LAST_NAME',
  'db_first_name' => 'LBL_LIST_FIRST_NAME',
  'db_title' => 'LBL_LIST_TITLE',
  'db_email1' => 'LBL_LIST_EMAIL_ADDRESS',
  'db_email2' => 'LBL_LIST_OTHER_EMAIL_ADDRESS',
  'LBL_FAX_PHONE' => 'Fax:',
  'LBL_CONVERT_BUTTON_KEY' => 'V',
  'LBL_MODULE_NAME' => 'Prospekts',
  'LBL_MODULE_ID' => 'Prospekts',
  'LBL_INVITEE' => 'Direktrapporter',
  'LBL_MODULE_TITLE' => 'Targets: Hem',
  'LBL_SEARCH_FORM_TITLE' => 'Sök targets',
  'LBL_LIST_FORM_TITLE' => 'Lista targets',
  'LBL_NEW_FORM_TITLE' => 'Ny target',
  'LBL_BUSINESSCARD' => 'Visitkort',
  'LBL_LIST_NAME' => 'Namn',
  'LBL_LIST_LAST_NAME' => 'Efternamn',
  'LBL_LIST_PROSPECT_NAME' => 'Namn på target',
  'LBL_LIST_TITLE' => 'Titel',
  'LBL_LIST_EMAIL_ADDRESS' => 'Epost',
  'LBL_LIST_OTHER_EMAIL_ADDRESS' => 'Annan epost',
  'LBL_LIST_PHONE' => 'Telefon',
  'LBL_LIST_PROSPECT_ROLE' => 'Roll',
  'LBL_LIST_FIRST_NAME' => 'Förnamn',
  'LBL_ASSIGNED_TO_NAME' => 'Tilldelad till',
  'LBL_ASSIGNED_TO_ID' => 'Tilldelad till:',
  'LBL_CAMPAIGN_ID' => 'Kampanj ID',
  'LBL_EXISTING_PROSPECT' => 'Använde en existerande kontakt',
  'LBL_CREATED_PROSPECT' => 'Skapade en ny kontakt',
  'LBL_EXISTING_ACCOUNT' => 'Använde en existerande organisation',
  'LBL_CREATED_ACCOUNT' => 'Skapade ny organisation',
  'LBL_CREATED_CALL' => 'Skapade nytt telefonsamtal',
  'LBL_CREATED_MEETING' => 'Skapade nytt möte',
  'LBL_ADDMORE_BUSINESSCARD' => 'Lägg till ytterligare visitkort',
  'LBL_ADD_BUSINESSCARD' => 'Lägg till visitkort',
  'LBL_NAME' => 'Namn:',
  'LBL_FULL_NAME' => 'Namn',
  'LBL_PROSPECT_NAME' => 'Namn på target:',
  'LBL_PROSPECT_INFORMATION' => 'Target information',
  'LBL_FIRST_NAME' => 'Förnamn:',
  'LBL_OFFICE_PHONE' => 'Kontorstelefon:',
  'LBL_ANY_PHONE' => 'Någon telefon:',
  'LBL_PHONE' => 'Telefon:',
  'LBL_LAST_NAME' => 'Efternamn:',
  'LBL_MOBILE_PHONE' => 'Mobil:',
  'LBL_HOME_PHONE' => 'Hemtelefon:',
  'LBL_OTHER_PHONE' => 'Annan telefon:',
  'LBL_PRIMARY_ADDRESS_STREET' => 'Primär adress gata:',
  'LBL_PRIMARY_ADDRESS_CITY' => 'Primär adress stad:',
  'LBL_PRIMARY_ADDRESS_COUNTRY' => 'Primär adress land:',
  'LBL_PRIMARY_ADDRESS_STATE' => 'Primär adress stat:',
  'LBL_PRIMARY_ADDRESS_POSTALCODE' => 'Primär adress postnummer:',
  'LBL_ALT_ADDRESS_STREET' => 'Alternativ adress gata:',
  'LBL_ALT_ADDRESS_CITY' => 'Alternativ adress stad:',
  'LBL_ALT_ADDRESS_COUNTRY' => 'Alternativ adress land:',
  'LBL_ALT_ADDRESS_STATE' => 'Alternativ adress stat:',
  'LBL_ALT_ADDRESS_POSTALCODE' => 'Alternativ adress postnummer:',
  'LBL_TITLE' => 'Titel:',
  'LBL_DEPARTMENT' => 'Avdelning:',
  'LBL_BIRTHDATE' => 'Födelsedag:',
  'LBL_EMAIL_ADDRESS' => 'Epost:',
  'LBL_OTHER_EMAIL_ADDRESS' => 'Annan epost:',
  'LBL_ANY_EMAIL' => 'Någon epost:',
  'LBL_ASSISTANT' => 'Assistent:',
  'LBL_ASSISTANT_PHONE' => 'Assistents telefon:',
  'LBL_DO_NOT_CALL' => 'Ring inte:',
  'LBL_EMAIL_OPT_OUT' => 'Önskar ej utskick:',
  'LBL_PRIMARY_ADDRESS' => 'Primär adress:',
  'LBL_ALTERNATE_ADDRESS' => 'Annan adress:',
  'LBL_ANY_ADDRESS' => 'Någon adress:',
  'LBL_CITY' => 'Stad:',
  'LBL_STATE' => 'Stat:',
  'LBL_POSTAL_CODE' => 'Postnummer:',
  'LBL_COUNTRY' => 'Land:',
  'LBL_DESCRIPTION_INFORMATION' => 'Beskrivande information',
  'LBL_ADDRESS_INFORMATION' => 'Adressinformation',
  'LBL_DESCRIPTION' => 'Beskrivning:',
  'LBL_PROSPECT_ROLE' => 'Roll:',
  'LBL_OPP_NAME' => 'Namn på affärsmöjlighet:',
  'LBL_IMPORT_VCARD' => 'Importera vCard',
  'LBL_IMPORT_VCARDTEXT' => 'Skapa en kontakt automatiskt vid import av vCard från ditt filsystem.',
  'LBL_DUPLICATE' => 'Möjlig kopia av targets',
  'MSG_SHOW_DUPLICATES' => 'Den target du är på väg att skapa kan vara en kopia av en target som redan finns. Targets som innehåller liknande namn och/eller epostadresser är listade nedan. <br>Klicka på Spara för att fortsätta skapa en ny target, eller klicka på Avbryt för att återgå till modulen utan att skapa targeten.',
  'MSG_DUPLICATE' => 'Den target du är på väg att skapa kan vara en kopia av en target som redan finns. Targets som innehåller liknande namn och/eller epostadresser är listade nedan. <br>Klicka på Spara för att fortsätta skapa en ny target, eller klicka på Avbryt för att återgå till modulen utan att skapa targeten.',
  'LNK_IMPORT_VCARD' => 'Skapa från vCard',
  'LNK_NEW_ACCOUNT' => 'Skapa organisation',
  'LNK_NEW_OPPORTUNITY' => 'Skapa affärsmöjlighet',
  'LNK_NEW_CASE' => 'Skapa ärende',
  'LNK_NEW_NOTE' => 'Skapa anteckning eller bilaga',
  'LNK_NEW_CALL' => 'Schemalägg telefonsamtal',
  'LNK_NEW_EMAIL' => 'Arkivera epost',
  'LNK_NEW_MEETING' => 'Schemalägg möte',
  'LNK_NEW_TASK' => 'Skapa uppgift',
  'LNK_NEW_APPOINTMENT' => 'Skapa händelse',
  'NTC_DELETE_CONFIRMATION' => 'Är du säker på att du vill radera posten?',
  'NTC_REMOVE_CONFIRMATION' => 'Är du säker på att du vill ta bort kontakten från ärendet?',
  'NTC_REMOVE_DIRECT_REPORT_CONFIRMATION' => 'Är du säker på att du vill ta bort det här objektet som en direkt rapport?',
  'ERR_DELETE_RECORD' => 'Ett objektnummer måste specificeras för att kunna radera kontakten.',
  'NTC_COPY_PRIMARY_ADDRESS' => 'Kopiera primär adress till alternativ adress',
  'NTC_COPY_ALTERNATE_ADDRESS' => 'Kopiera alternativ adress till primär adress',
  'LBL_SALUTATION' => 'Hälsning:',
  'LBL_SAVE_PROSPECT' => 'Spara target',
  'LBL_CREATED_OPPORTUNITY' => 'Skapade ny affärsmöjlighet',
  'NTC_OPPORTUNITY_REQUIRES_ACCOUNT' => 'För att skapa en affärsmöjlighet krävs en organisation.\\n Var god skapa antingen en ny organisation eller välj en en existerande.',
  'LNK_SELECT_ACCOUNT' => 'Välj organisation',
  'LNK_NEW_PROSPECT' => 'Skapa target',
  'LNK_PROSPECT_LIST' => 'Targets',
  'LNK_NEW_CAMPAIGN' => 'Skapa kampanj',
  'LNK_CAMPAIGN_LIST' => 'Kampanjer',
  'LNK_NEW_PROSPECT_LIST' => 'Skapa mållista',
  'LNK_PROSPECT_LIST_LIST' => 'Mållistor',
  'LNK_IMPORT_PROSPECT' => 'Importera targets',
  'LBL_SELECT_CHECKED_BUTTON_LABEL' => 'Välj markerade targets',
  'LBL_SELECT_CHECKED_BUTTON_TITLE' => 'Välj markerade targets',
  'LBL_INVALID_EMAIL' => 'Ogiltig e-postadress:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Targets:',
  'LBL_CONVERT_BUTTON_TITLE' => 'Konvertera target',
  'LBL_CONVERT_BUTTON_LABEL' => 'Konvertera target',
  'LBL_CONVERTPROSPECT' => 'Konvertera target',
  'LNK_NEW_CONTACT' => 'Ny kontakt',
  'LBL_CREATED_CONTACT' => 'Skapade ny kontakt',
  'LBL_BACKTO_PROSPECTS' => 'Tillbaka till targets',
  'LBL_CAMPAIGNS' => 'Kampanjer',
  'LBL_CAMPAIGN_LIST_SUBPANEL_TITLE' => 'Kampanjlogg',
  'LBL_TRACKER_KEY' => 'Tracker nyckel',
  'LBL_LEAD_ID' => 'Lead id',
  'LBL_CONVERTED_LEAD' => 'Konverterat lead',
  'LBL_ACCOUNT_NAME' => 'Organisationsnamn',
  'LBL_EDIT_ACCOUNT_NAME' => 'Organisationsnamn:',
);

