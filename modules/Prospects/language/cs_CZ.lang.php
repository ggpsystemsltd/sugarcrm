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
  'LBL_LIST_PROSPECT_ROLE' => 'Role',
  'db_last_name' => 'LBL_LIST_LAST_NAME',
  'db_first_name' => 'LBL_LIST_FIRST_NAME',
  'db_title' => 'LBL_LIST_TITLE',
  'db_email1' => 'LBL_LIST_EMAIL_ADDRESS',
  'db_email2' => 'LBL_LIST_OTHER_EMAIL_ADDRESS',
  'LBL_FAX_PHONE' => 'Fax:',
  'LBL_PROSPECT_ROLE' => 'Role:',
  'LBL_CONVERT_BUTTON_KEY' => 'V',
  'LBL_MODULE_NAME' => 'Seznam adresátů',
  'LBL_MODULE_ID' => 'Seznam adresátů',
  'LBL_INVITEE' => 'Přímé Reporty',
  'LBL_MODULE_TITLE' => 'Adresáti: Hlavní stránka',
  'LBL_SEARCH_FORM_TITLE' => 'Vyhledat adresáty',
  'LBL_LIST_FORM_TITLE' => 'Seznam adresátů',
  'LBL_NEW_FORM_TITLE' => 'Nový adresát',
  'LBL_PROSPECT' => 'Adresát:',
  'LBL_BUSINESSCARD' => 'Vizitka',
  'LBL_LIST_NAME' => 'Název',
  'LBL_LIST_LAST_NAME' => 'Příjmení',
  'LBL_LIST_PROSPECT_NAME' => 'Název adresáta',
  'LBL_LIST_TITLE' => 'Titul',
  'LBL_LIST_EMAIL_ADDRESS' => 'E-mail',
  'LBL_LIST_OTHER_EMAIL_ADDRESS' => 'Další email',
  'LBL_LIST_PHONE' => 'Telefon',
  'LBL_LIST_FIRST_NAME' => 'Jméno',
  'LBL_ASSIGNED_TO_NAME' => 'Přiřazeno (komu)',
  'LBL_ASSIGNED_TO_ID' => 'Přidělen:',
  'LBL_CAMPAIGN_ID' => 'ID kampaně',
  'LBL_EXISTING_PROSPECT' => 'Použit existující kontakt',
  'LBL_CREATED_PROSPECT' => 'Přidán nový kontakt',
  'LBL_EXISTING_ACCOUNT' => 'Použit existující účet',
  'LBL_CREATED_ACCOUNT' => 'Přidán nový účet',
  'LBL_CREATED_CALL' => 'Naplánován nový hovor',
  'LBL_CREATED_MEETING' => 'Naplánována nová schůzka',
  'LBL_ADDMORE_BUSINESSCARD' => 'Přidat další vizitku',
  'LBL_ADD_BUSINESSCARD' => 'Přidat vizitku',
  'LBL_NAME' => 'Název:',
  'LBL_FULL_NAME' => 'Název',
  'LBL_PROSPECT_NAME' => 'Název adresáta:',
  'LBL_PROSPECT_INFORMATION' => 'Informace o adresátovi',
  'LBL_MORE_INFORMATION' => 'Více informací',
  'LBL_FIRST_NAME' => 'Křestní jméno:',
  'LBL_OFFICE_PHONE' => 'Telefon do práce:',
  'LBL_ANY_PHONE' => 'Telefon:',
  'LBL_PHONE' => 'Telefon',
  'LBL_LAST_NAME' => 'Příjmení:',
  'LBL_MOBILE_PHONE' => 'Mobil:',
  'LBL_HOME_PHONE' => 'Domácí telefon:',
  'LBL_OTHER_PHONE' => 'Další telefon:',
  'LBL_PRIMARY_ADDRESS_STREET' => 'Ulice:',
  'LBL_PRIMARY_ADDRESS_CITY' => 'Město:',
  'LBL_PRIMARY_ADDRESS_COUNTRY' => 'Země:',
  'LBL_PRIMARY_ADDRESS_STATE' => 'Stát:',
  'LBL_PRIMARY_ADDRESS_POSTALCODE' => 'PSČ:',
  'LBL_ALT_ADDRESS_STREET' => 'Ulice:',
  'LBL_ALT_ADDRESS_CITY' => 'Město:',
  'LBL_ALT_ADDRESS_COUNTRY' => 'Země:',
  'LBL_ALT_ADDRESS_STATE' => 'Stát:',
  'LBL_ALT_ADDRESS_POSTALCODE' => 'PSČ:',
  'LBL_TITLE' => 'Titul:',
  'LBL_DEPARTMENT' => 'Oddělení:',
  'LBL_BIRTHDATE' => 'Datum narození:',
  'LBL_EMAIL_ADDRESS' => 'Email:',
  'LBL_OTHER_EMAIL_ADDRESS' => 'Další email:',
  'LBL_ANY_EMAIL' => 'Email:',
  'LBL_ASSISTANT' => 'Asistent:',
  'LBL_ASSISTANT_PHONE' => 'Assistent telefon:',
  'LBL_DO_NOT_CALL' => 'Nevolat:',
  'LBL_EMAIL_OPT_OUT' => 'Možno poslat email:',
  'LBL_PRIMARY_ADDRESS' => 'Hlavní adresa:',
  'LBL_ALTERNATE_ADDRESS' => 'Další adresa:',
  'LBL_ANY_ADDRESS' => 'Ostatní adresa:',
  'LBL_CITY' => 'Město:',
  'LBL_STATE' => 'Stát:',
  'LBL_POSTAL_CODE' => 'PSČ:',
  'LBL_COUNTRY' => 'Země:',
  'LBL_DESCRIPTION_INFORMATION' => 'Popis',
  'LBL_ADDRESS_INFORMATION' => 'Adresa',
  'LBL_DESCRIPTION' => 'Popis:',
  'LBL_OPP_NAME' => 'Název obchodu:',
  'LBL_IMPORT_VCARD' => 'Importovat vCard',
  'LBL_IMPORT_VCARDTEXT' => 'Automaticky přidat nový kontakt importováním vCard z vašeho souborového systému.',
  'LBL_DUPLICATE' => 'Možní duplicitní adresáti',
  'MSG_SHOW_DUPLICATES' => 'Přidáním tohoto kontaktu můžete vytvořit duplicitní kontakt. Pokud chcete opravdu přidat tento kontakt zvolte Uložit jinak zvolte Zrušit.',
  'MSG_DUPLICATE' => 'Přidáním tohoto kontaktu můžete vytvořit duplicitní kontakt. Pokud chcete opravdu přidat tento kontakt zvolte Uložit jinak zvolte Zrušit.',
  'LNK_IMPORT_VCARD' => 'Importovat vCard',
  'LNK_NEW_ACCOUNT' => 'Přidat společnost',
  'LNK_NEW_OPPORTUNITY' => 'Vytvořit obchod',
  'LNK_NEW_CASE' => 'Vytvořit případ',
  'LNK_NEW_NOTE' => 'Přidat poznámku nebo přílohu',
  'LNK_NEW_CALL' => 'Naplánovat hovor',
  'LNK_NEW_EMAIL' => 'Archivovat zprávu',
  'LNK_NEW_MEETING' => 'Naplánovat schůzku',
  'LNK_NEW_TASK' => 'Přidat úkol',
  'LNK_NEW_APPOINTMENT' => 'Naplánovat událost',
  'LNK_IMPORT_PROSPECTS' => 'Import prospekt',
  'NTC_DELETE_CONFIRMATION' => 'Opravdu chcete smazat tento záznam?',
  'NTC_REMOVE_CONFIRMATION' => 'Opravdu chcete kontakt vyjmout z případu?',
  'NTC_REMOVE_DIRECT_REPORT_CONFIRMATION' => 'Opravdu chcete odstranit tento záznam z Přímých reportů?',
  'ERR_DELETE_RECORD' => 'Pro smazání kontaktu musí být zadáno číslo záznamu.',
  'NTC_COPY_PRIMARY_ADDRESS' => 'Zkopírovat adresu do další adresy',
  'NTC_COPY_ALTERNATE_ADDRESS' => 'Zkopírovat další adresu do adresy',
  'LBL_SALUTATION' => 'Oslovení',
  'LBL_SAVE_PROSPECT' => 'Uložit adresáta',
  'LBL_CREATED_OPPORTUNITY' => 'Vytvořit nový obchod',
  'NTC_OPPORTUNITY_REQUIRES_ACCOUNT' => 'Pro vytvoření nového obchodu je třeba zadat účet. Prosím zvolte existující nebo přidejte nový.',
  'LNK_SELECT_ACCOUNT' => 'Zvolit účet',
  'LNK_NEW_PROSPECT' => 'Přidat adresáta',
  'LNK_PROSPECT_LIST' => 'Adresáti',
  'LNK_NEW_CAMPAIGN' => 'Přidat kampaň',
  'LNK_CAMPAIGN_LIST' => 'Kampaně',
  'LNK_NEW_PROSPECT_LIST' => 'Přidat seznam adresátů',
  'LNK_PROSPECT_LIST_LIST' => 'Seznam adresátů',
  'LNK_IMPORT_PROSPECT' => 'Importovat adresáty',
  'LBL_SELECT_CHECKED_BUTTON_LABEL' => 'Zvolit označené adresáty',
  'LBL_SELECT_CHECKED_BUTTON_TITLE' => 'Zvolit označené adresáty',
  'LBL_INVALID_EMAIL' => 'Neplatný email:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Adresáti',
  'LBL_PROSPECT_LIST' => 'Prospekt List',
  'LBL_CONVERT_BUTTON_TITLE' => 'Změnit cíl',
  'LBL_CONVERT_BUTTON_LABEL' => 'Změnit cíl',
  'LBL_CONVERTPROSPECT' => 'Změnit cíl',
  'LNK_NEW_CONTACT' => 'Přidat kontakt',
  'LBL_CREATED_CONTACT' => 'Přidán nový kontakt',
  'LBL_BACKTO_PROSPECTS' => 'Zpět k cílům',
  'LBL_CAMPAIGNS' => 'Kampaně',
  'LBL_CAMPAIGN_LIST_SUBPANEL_TITLE' => 'Log kampaně',
  'LBL_TRACKER_KEY' => 'Klíč stopaře',
  'LBL_LEAD_ID' => 'ID zájemce',
  'LBL_CONVERTED_LEAD' => 'Zkonvertovaní zájemci na příležitosti',
  'LBL_ACCOUNT_NAME' => 'Název společnosti',
  'LBL_EDIT_ACCOUNT_NAME' => 'Název společnosti:',
  'LBL_CREATED_USER' => 'Vytvořit uživatele',
  'LBL_MODIFIED_USER' => 'Změnit uživatele',
  'LBL_CAMPAIGNS_SUBPANEL_TITLE' => 'Kampaně',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Historie',
);

