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

	

$mod_strings = array (
  'LBL_MODULE_ID' => 'Targets',
  'LBL_INVITEE' => 'Direct Reports',
  'LBL_PROSPECT' => 'Target:',
  'db_last_name' => 'LBL_LIST_LAST_NAME',
  'db_first_name' => 'LBL_LIST_FIRST_NAME',
  'db_title' => 'LBL_LIST_TITLE',
  'db_email1' => 'LBL_LIST_EMAIL_ADDRESS',
  'db_email2' => 'LBL_LIST_OTHER_EMAIL_ADDRESS',
  'LBL_FAX_PHONE' => 'Fax:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Targets',
  'LBL_CONVERT_BUTTON_KEY' => 'V',
  'LBL_MODULE_NAME' => 'Target',
  'LBL_MODULE_TITLE' => 'Targetlijst: Start',
  'LBL_SEARCH_FORM_TITLE' => 'Targetlijst: Zoeken',
  'LBL_LIST_FORM_TITLE' => 'Targetlijst',
  'LBL_NEW_FORM_TITLE' => 'Nieuwe Targetlijst',
  'LBL_BUSINESSCARD' => 'Visitekaartje',
  'LBL_LIST_NAME' => 'Naam',
  'LBL_LIST_LAST_NAME' => 'Achternaam',
  'LBL_LIST_PROSPECT_NAME' => 'Naam Targetlijst',
  'LBL_LIST_TITLE' => 'Titel',
  'LBL_LIST_EMAIL_ADDRESS' => 'E-mail',
  'LBL_LIST_OTHER_EMAIL_ADDRESS' => 'Andere E-mail',
  'LBL_LIST_PHONE' => 'Telefoon',
  'LBL_LIST_PROSPECT_ROLE' => 'Rol',
  'LBL_LIST_FIRST_NAME' => 'Voornaam',
  'LBL_ASSIGNED_TO_NAME' => 'Toegewezen aan Naam',
  'LBL_ASSIGNED_TO_ID' => 'Toegewezen aan',
  'LBL_CAMPAIGN_ID' => 'Campagne ID',
  'LBL_EXISTING_PROSPECT' => 'Bestaande Persoon gebruikt',
  'LBL_CREATED_PROSPECT' => 'Nieuwe Persoon aangemaakt',
  'LBL_EXISTING_ACCOUNT' => 'Bestaande Organisatie gebruikt',
  'LBL_CREATED_ACCOUNT' => 'Nieuwe Organisatie aangemaakt',
  'LBL_CREATED_CALL' => 'Nieuw telefoongesprek aangemaakt',
  'LBL_CREATED_MEETING' => 'Nieuwe afspraak aangemaakt',
  'LBL_ADDMORE_BUSINESSCARD' => 'Nog een visitekaartje toevoegen',
  'LBL_ADD_BUSINESSCARD' => 'Visitekaartje invoeren',
  'LBL_NAME' => 'Naam:',
  'LBL_FULL_NAME' => 'Naam',
  'LBL_PROSPECT_NAME' => 'Naam Targetlijstt:',
  'LBL_PROSPECT_INFORMATION' => 'Targetlijst Informatie',
  'LBL_MORE_INFORMATION' => 'Meer Informatie',
  'LBL_FIRST_NAME' => 'Voornaam:',
  'LBL_OFFICE_PHONE' => 'Telefoon (kantoor):',
  'LBL_ANY_PHONE' => '(Deel van) telefoonnummer',
  'LBL_PHONE' => 'Telefoon:',
  'LBL_LAST_NAME' => 'Achternaam:',
  'LBL_MOBILE_PHONE' => 'Mobiel:',
  'LBL_HOME_PHONE' => 'Priv',
  'LBL_OTHER_PHONE' => 'Bgg:',
  'LBL_PRIMARY_ADDRESS_STREET' => 'Straat + Huisnummer:',
  'LBL_PRIMARY_ADDRESS_CITY' => 'Plaats:',
  'LBL_PRIMARY_ADDRESS_COUNTRY' => 'Land:',
  'LBL_PRIMARY_ADDRESS_STATE' => 'Provincie:',
  'LBL_PRIMARY_ADDRESS_POSTALCODE' => 'Postcode:',
  'LBL_ALT_ADDRESS_STREET' => 'Straat:',
  'LBL_ALT_ADDRESS_CITY' => 'Plaats:',
  'LBL_ALT_ADDRESS_COUNTRY' => 'Land:',
  'LBL_ALT_ADDRESS_STATE' => 'Provincie:',
  'LBL_ALT_ADDRESS_POSTALCODE' => 'Postcode:',
  'LBL_TITLE' => 'Titel:',
  'LBL_DEPARTMENT' => 'Afdeling:',
  'LBL_BIRTHDATE' => 'Verjaardag:',
  'LBL_EMAIL_ADDRESS' => 'E-mail:',
  'LBL_OTHER_EMAIL_ADDRESS' => 'Alternatief E-mailadres:',
  'LBL_ANY_EMAIL' => 'Willekeurige E-mail:',
  'LBL_ASSISTANT' => 'Assistent:',
  'LBL_ASSISTANT_PHONE' => 'Telefoonnr assistent',
  'LBL_DO_NOT_CALL' => 'Niet bellen:',
  'LBL_EMAIL_OPT_OUT' => 'E-mail Opt Out:',
  'LBL_PRIMARY_ADDRESS' => 'Primair Adres:',
  'LBL_ALTERNATE_ADDRESS' => 'Alt. Adres:',
  'LBL_ANY_ADDRESS' => '(Deel van) adres:',
  'LBL_CITY' => 'Plaats:',
  'LBL_STATE' => 'Provincie:',
  'LBL_POSTAL_CODE' => 'Postcode:',
  'LBL_COUNTRY' => 'Land:',
  'LBL_DESCRIPTION_INFORMATION' => 'Beschrijving',
  'LBL_ADDRESS_INFORMATION' => 'Adresgegevens',
  'LBL_DESCRIPTION' => 'Beschrijving:',
  'LBL_PROSPECT_ROLE' => 'Rol:',
  'LBL_OPP_NAME' => 'Kansnaam:',
  'LBL_IMPORT_VCARD' => 'Importeer vCard',
  'LBL_IMPORT_VCARDTEXT' => 'Maak automatisch een nieuwe Persoon aan door een vCard van uw computer te importeren.',
  'LBL_DUPLICATE' => 'Mogelijk Dubbele Items',
  'MSG_SHOW_DUPLICATES' => 'Door het aanmaken van deze Persoon maak je mogelijk een duplicaat record. Je kunt op Maak Item klikken om door te gaan of afbreken door op Cancel te klikken.',
  'MSG_DUPLICATE' => 'Door het aanmaken van deze Persoon maak je mogelijk een duplicaat record. Je kunt een Persoon uit de onderstaande lijst selecteren of op Maak Item klikken om door te gaan met de zojuist ingevoerde data.',
  'LNK_IMPORT_VCARD' => 'Aanmaken vanaf vCard',
  'LNK_NEW_ACCOUNT' => 'Nieuwe Organisatie',
  'LNK_NEW_OPPORTUNITY' => 'Nieuwe Kans',
  'LNK_NEW_CASE' => 'Nieuwe Case',
  'LNK_NEW_NOTE' => 'Nieuwe Notitie of Bijlage',
  'LNK_NEW_CALL' => 'Nieuw Telefoongesprek',
  'LNK_NEW_EMAIL' => 'E-mail archiveren',
  'LNK_NEW_MEETING' => 'Nieuwe Afspraak',
  'LNK_NEW_TASK' => 'Nieuwe Taak',
  'LNK_NEW_APPOINTMENT' => 'Nieuwe Afspraak',
  'LNK_IMPORT_PROSPECTS' => 'Importeer Prospects',
  'NTC_DELETE_CONFIRMATION' => 'Weet u zeker dat u dit record wilt verwijderen?',
  'NTC_REMOVE_CONFIRMATION' => 'Weet u zeker dat u deze Persoon wilt verwijderen van deze Case?',
  'NTC_REMOVE_DIRECT_REPORT_CONFIRMATION' => 'Weet u zeker dat u dit record wilt verwijderen als &#39;direct report&#39;?',
  'ERR_DELETE_RECORD' => 'Er moet een record nummer zijn gespecificeerd om deze RSS Nieuwsfeed te verwijderen',
  'NTC_COPY_PRIMARY_ADDRESS' => 'Kopieer Primair Adres naar alt. adres',
  'NTC_COPY_ALTERNATE_ADDRESS' => 'Kopieer alt. adres naar Primair Adres',
  'LBL_SALUTATION' => 'Aanhef',
  'LBL_SAVE_PROSPECT' => 'Bewaar Targetlijst',
  'LBL_CREATED_OPPORTUNITY' => 'Nieuwe kans aangemaakt',
  'NTC_OPPORTUNITY_REQUIRES_ACCOUNT' => 'Voor het aanmaken van een kans is een Organisatie nodig. Maak een nieuwe Organisatie aan of kies een bestaande Organisatie waaraan u deze kans wilt koppelen.',
  'LNK_SELECT_ACCOUNT' => 'Kies een Organisatie',
  'LNK_NEW_PROSPECT' => 'Nieuw Target',
  'LNK_PROSPECT_LIST' => 'Targets',
  'LNK_NEW_CAMPAIGN' => 'Ontwerp Campagne',
  'LNK_CAMPAIGN_LIST' => 'Campagnes',
  'LNK_NEW_PROSPECT_LIST' => 'Ontwerp Target Lijst',
  'LNK_PROSPECT_LIST_LIST' => 'Target Lijsten',
  'LNK_IMPORT_PROSPECT' => 'Importeer Targetlijst',
  'LBL_SELECT_CHECKED_BUTTON_LABEL' => 'Selecteer Gekozen Items',
  'LBL_SELECT_CHECKED_BUTTON_TITLE' => 'Selecteer Gekozen Items',
  'LBL_INVALID_EMAIL' => 'Ongeldige E-mail:',
  'LBL_PROSPECT_LIST' => 'Prospect Lijst',
  'LBL_CONVERT_BUTTON_TITLE' => 'Converteer Items',
  'LBL_CONVERT_BUTTON_LABEL' => 'Converteer Items',
  'LBL_CONVERTPROSPECT' => 'Converteer Items',
  'LNK_NEW_CONTACT' => 'Nieuw Persoon',
  'LBL_CREATED_CONTACT' => 'Nieuwe Persoon aangemaakt',
  'LBL_BACKTO_PROSPECTS' => 'Terug naar Items',
  'LBL_CAMPAIGNS' => 'Campagnes',
  'LBL_CAMPAIGN_LIST_SUBPANEL_TITLE' => 'Campage Log',
  'LBL_TRACKER_KEY' => 'Tracker Sleutel',
  'LBL_LEAD_ID' => 'Lead ID',
  'LBL_CONVERTED_LEAD' => 'Geconverteerde Lead',
  'LBL_ACCOUNT_NAME' => 'Organisatienaam',
  'LBL_EDIT_ACCOUNT_NAME' => 'Organisatienaam:',
  'LBL_CREATED_USER' => 'Aangemaakte Gebruiker',
  'LBL_MODIFIED_USER' => 'Gewijzigde Gebruiker',
  'LBL_CAMPAIGNS_SUBPANEL_TITLE' => 'Campagnes',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Historie',
);

