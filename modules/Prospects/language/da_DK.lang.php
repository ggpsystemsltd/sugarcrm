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
  'db_last_name' => 'LBL_LIST_LAST_NAME',
  'db_first_name' => 'LBL_LIST_FIRST_NAME',
  'db_title' => 'LBL_LIST_TITLE',
  'db_email1' => 'LBL_LIST_EMAIL_ADDRESS',
  'db_email2' => 'LBL_LIST_OTHER_EMAIL_ADDRESS',
  'LBL_FAX_PHONE' => 'Fax:',
  'LBL_CONVERT_BUTTON_KEY' => 'V',
  'LBL_MODULE_NAME' => 'Mål',
  'LBL_MODULE_ID' => 'Mål',
  'LBL_INVITEE' => 'Direkte rapporter',
  'LBL_MODULE_TITLE' => 'Mål: Startside',
  'LBL_SEARCH_FORM_TITLE' => 'Søg efter Mål',
  'LBL_LIST_FORM_TITLE' => 'Målgruppeliste',
  'LBL_NEW_FORM_TITLE' => 'Nyt Mål',
  'LBL_PROSPECT' => 'Mål:',
  'LBL_BUSINESSCARD' => 'Visitkort',
  'LBL_LIST_NAME' => 'Navn',
  'LBL_LIST_LAST_NAME' => 'Efternavn',
  'LBL_LIST_PROSPECT_NAME' => 'Målnavn',
  'LBL_LIST_TITLE' => 'Titel',
  'LBL_LIST_EMAIL_ADDRESS' => 'E-mail',
  'LBL_LIST_OTHER_EMAIL_ADDRESS' => 'Anden e-mail',
  'LBL_LIST_PHONE' => 'Telefon',
  'LBL_LIST_PROSPECT_ROLE' => 'Rolle',
  'LBL_LIST_FIRST_NAME' => 'Fornavn',
  'LBL_ASSIGNED_TO_NAME' => 'Tildelt til',
  'LBL_ASSIGNED_TO_ID' => 'Tildelt til:',
  'LBL_CAMPAIGN_ID' => 'Kampagne-id',
  'LBL_EXISTING_PROSPECT' => 'Brugt en eksisterende kontakt',
  'LBL_CREATED_PROSPECT' => 'Oprettet en ny kontakt',
  'LBL_EXISTING_ACCOUNT' => 'Brugt en eksisterende virksomhed',
  'LBL_CREATED_ACCOUNT' => 'Oprettet en ny virksomhed',
  'LBL_CREATED_CALL' => 'Oprettet et nyt opkald',
  'LBL_CREATED_MEETING' => 'Oprettet et nyt møde',
  'LBL_ADDMORE_BUSINESSCARD' => 'Tilføj et nyt visitkort',
  'LBL_ADD_BUSINESSCARD' => 'Angiv visitkort',
  'LBL_NAME' => 'Navn:',
  'LBL_FULL_NAME' => 'Navn',
  'LBL_PROSPECT_NAME' => 'Målnavn:',
  'LBL_PROSPECT_INFORMATION' => 'Måloplysninger',
  'LBL_MORE_INFORMATION' => 'Flere oplysninger',
  'LBL_FIRST_NAME' => 'Fornavn:',
  'LBL_OFFICE_PHONE' => 'Telefon "arbejde":',
  'LBL_ANY_PHONE' => 'Telefon:',
  'LBL_PHONE' => 'Telefon:',
  'LBL_LAST_NAME' => 'Efternavn:',
  'LBL_MOBILE_PHONE' => 'Mobiltelefon:',
  'LBL_HOME_PHONE' => 'Startside:',
  'LBL_OTHER_PHONE' => 'Anden telefon:',
  'LBL_PRIMARY_ADDRESS_STREET' => 'Primær adresse, gade:',
  'LBL_PRIMARY_ADDRESS_CITY' => 'Primær adresse, by:',
  'LBL_PRIMARY_ADDRESS_COUNTRY' => 'Primær adresse, land:',
  'LBL_PRIMARY_ADDRESS_STATE' => 'Primær adresse, stat:',
  'LBL_PRIMARY_ADDRESS_POSTALCODE' => 'Primær adresse, postnummer:',
  'LBL_ALT_ADDRESS_STREET' => 'Alternativ adresse, gade:',
  'LBL_ALT_ADDRESS_CITY' => 'Alternativ adresse, by:',
  'LBL_ALT_ADDRESS_COUNTRY' => 'Alternativ adresse, land:',
  'LBL_ALT_ADDRESS_STATE' => 'Alternativ adresse, stat:',
  'LBL_ALT_ADDRESS_POSTALCODE' => 'Alternativ adresse, postnummer:',
  'LBL_TITLE' => 'Titel:',
  'LBL_DEPARTMENT' => 'Afdeling:',
  'LBL_BIRTHDATE' => 'Fødselsdato:',
  'LBL_EMAIL_ADDRESS' => 'E-mail-adresse:',
  'LBL_OTHER_EMAIL_ADDRESS' => 'Anden e-mail:',
  'LBL_ANY_EMAIL' => 'E-mail:',
  'LBL_ASSISTANT' => 'Assistent:',
  'LBL_ASSISTANT_PHONE' => 'Assistents telefon:',
  'LBL_DO_NOT_CALL' => 'Ring ikke:',
  'LBL_EMAIL_OPT_OUT' => 'Fravælg e-mail:',
  'LBL_PRIMARY_ADDRESS' => 'Primær adresse:',
  'LBL_ALTERNATE_ADDRESS' => 'Anden adresse:',
  'LBL_ANY_ADDRESS' => 'Adresse:',
  'LBL_CITY' => 'By:',
  'LBL_STATE' => 'Tilstand:',
  'LBL_POSTAL_CODE' => 'Postnummer:',
  'LBL_COUNTRY' => 'Land:',
  'LBL_DESCRIPTION_INFORMATION' => 'Beskrivelsesoplysninger',
  'LBL_ADDRESS_INFORMATION' => 'Adresseoplysninger',
  'LBL_DESCRIPTION' => 'Beskrivelse:',
  'LBL_PROSPECT_ROLE' => 'Rolle:',
  'LBL_OPP_NAME' => 'Salgsmuligheds navn:',
  'LBL_IMPORT_VCARD' => 'Importér vCard',
  'LBL_IMPORT_VCARDTEXT' => 'Opret automatisk en ny kontakt ved at importere et vCard fra filsystemet.',
  'LBL_DUPLICATE' => 'Mulige identiske mål',
  'MSG_SHOW_DUPLICATES' => 'Det målpost, du er ved at oprette, kan være en dublet af en målepost, der allerede findes. Målposter, som indeholder lignende navne og/eller e-mail-adresser, er angivet nedenfor.<br>Klik på Gem for at fortsætte med at oprette denne nye mål, eller klik på Annuller for at vende tilbage til modulet uden at oprette mål.',
  'MSG_DUPLICATE' => 'Den målpost, du er ved at oprette, kan være en dublet af en målpost, der allerede findes. Målposter, som indeholder lignende navne og/eller e-mail-adresser, er angivet nedenfor.<br>Klik på Gem for at fortsætte med at oprette denne nye mål, eller klik på Annuller for at vende tilbage til modulet uden at oprette mål.',
  'LNK_IMPORT_VCARD' => 'Opret fra vCard',
  'LNK_NEW_ACCOUNT' => 'Opret virksomhed',
  'LNK_NEW_OPPORTUNITY' => 'Opret salgsmulighed',
  'LNK_NEW_CASE' => 'Opret sag',
  'LNK_NEW_NOTE' => 'Opret note eller vedhæftet fil',
  'LNK_NEW_CALL' => 'Planlæg opkald',
  'LNK_NEW_EMAIL' => 'Arkivér e-mail',
  'LNK_NEW_MEETING' => 'Planlæg møde',
  'LNK_NEW_TASK' => 'Opret opgave',
  'LNK_NEW_APPOINTMENT' => 'Opret aftale',
  'LNK_IMPORT_PROSPECTS' => 'Importér mål',
  'NTC_DELETE_CONFIRMATION' => 'Er du sikker på, at du vil slette denne post?',
  'NTC_REMOVE_CONFIRMATION' => 'Er du sikker på, at du vil fjerne denne kontakt fra sagen?',
  'NTC_REMOVE_DIRECT_REPORT_CONFIRMATION' => 'Er du sikker på, at du vil fjerne denne post som en direkte rapport?',
  'ERR_DELETE_RECORD' => 'Der skal angives et postnummer for at slette kontakten.',
  'NTC_COPY_PRIMARY_ADDRESS' => 'Kopiér primær adresse til alternativ adresse',
  'NTC_COPY_ALTERNATE_ADDRESS' => 'Kopiér alternativ adresse til primær adresse',
  'LBL_SALUTATION' => 'Tiltaleform',
  'LBL_SAVE_PROSPECT' => 'Gem mål',
  'LBL_CREATED_OPPORTUNITY' => 'Oprettet en ny salgsmulighed',
  'NTC_OPPORTUNITY_REQUIRES_ACCOUNT' => 'Oprettelse af en salgsmulighed kræver en virksomhed.\\n Opret en ny virksomhed, eller vælg en eksisterende.',
  'LNK_SELECT_ACCOUNT' => 'Vælg virksomhed',
  'LNK_NEW_PROSPECT' => 'Opret Mål',
  'LNK_PROSPECT_LIST' => 'Se Mål',
  'LNK_NEW_CAMPAIGN' => 'Opret kampagne',
  'LNK_CAMPAIGN_LIST' => 'Kampagner',
  'LNK_NEW_PROSPECT_LIST' => 'Opret målgruppeliste',
  'LNK_PROSPECT_LIST_LIST' => 'Målgruppelister',
  'LNK_IMPORT_PROSPECT' => 'Importér mål',
  'LBL_SELECT_CHECKED_BUTTON_LABEL' => 'Vælg kontrollerede mål',
  'LBL_SELECT_CHECKED_BUTTON_TITLE' => 'Vælg kontrollerede mål',
  'LBL_INVALID_EMAIL' => 'Ugyldig e-mail:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Mål',
  'LBL_PROSPECT_LIST' => 'Liste over potentielle kunder',
  'LBL_CONVERT_BUTTON_TITLE' => 'Konverter mål',
  'LBL_CONVERT_BUTTON_LABEL' => 'Konverter mål',
  'LBL_CONVERTPROSPECT' => 'Konverter mål',
  'LNK_NEW_CONTACT' => 'Ny kontakt',
  'LBL_CREATED_CONTACT' => 'Oprettet en ny kontakt',
  'LBL_BACKTO_PROSPECTS' => 'Tilbage til Mål',
  'LBL_CAMPAIGNS' => 'Kampagner',
  'LBL_CAMPAIGN_LIST_SUBPANEL_TITLE' => 'Kampagnelog',
  'LBL_TRACKER_KEY' => 'Sporingsnøgle',
  'LBL_LEAD_ID' => 'Kundeemne-id',
  'LBL_CONVERTED_LEAD' => 'Konverteret kundeemne',
  'LBL_ACCOUNT_NAME' => 'virksomhedsnavn',
  'LBL_EDIT_ACCOUNT_NAME' => 'virksomhedsnavn:',
  'LBL_CREATED_USER' => 'Oprettet bruger',
  'LBL_MODIFIED_USER' => 'Ændret bruger',
  'LBL_CAMPAIGNS_SUBPANEL_TITLE' => 'Kampagner',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Historik',
);

