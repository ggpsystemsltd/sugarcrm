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
  'LBL_STATUS' => 'Status:',
  'LBL_MINSS_ABBREV' => 'm',
  'LBL_COLON' => ':',
  'LBL_EMAIL' => 'Email',
  'LBL_SEND_BUTTON_KEY' => 'I',
  'LBL_OUTLOOK_ID' => 'Outlook ID',
  'LBL_BLANK' => '-prazno-',
  'LBL_MODULE_NAME' => 'Pozivi',
  'LBL_MODULE_TITLE' => 'Pozivi: Početna strana',
  'LBL_SEARCH_FORM_TITLE' => 'Pretraga poziva',
  'LBL_LIST_FORM_TITLE' => 'Lista poziva',
  'LBL_NEW_FORM_TITLE' => 'Zakaži sastanak',
  'LBL_LIST_CLOSE' => 'Zatvori',
  'LBL_LIST_SUBJECT' => 'Naslov',
  'LBL_LIST_CONTACT' => 'Kontakt',
  'LBL_LIST_RELATED_TO' => 'Povezano sa',
  'LBL_LIST_RELATED_TO_ID' => 'ID broj povezanog',
  'LBL_LIST_DATE' => 'Datum početka',
  'LBL_LIST_TIME' => 'Vreme početka',
  'LBL_LIST_DURATION' => 'Trajanje',
  'LBL_LIST_DIRECTION' => 'Smer',
  'LBL_SUBJECT' => 'Naslov:',
  'LBL_REMINDER' => 'Podsetnik:',
  'LBL_CONTACT_NAME' => 'Kontakt:',
  'LBL_DESCRIPTION_INFORMATION' => 'Opisne informacije',
  'LBL_DESCRIPTION' => 'Opis:',
  'LBL_DIRECTION' => 'Smer:',
  'LBL_DATE' => 'Datum početka:',
  'LBL_DURATION' => 'Trajanje:',
  'LBL_DURATION_HOURS' => 'Trajanje u satima:',
  'LBL_DURATION_MINUTES' => 'Trajanje u minutima:',
  'LBL_HOURS_MINUTES' => '(sati/minuta)',
  'LBL_CALL' => 'Poziv:',
  'LBL_DATE_TIME' => 'Datum i vreme početka:',
  'LBL_TIME' => 'Početno vreme:',
  'LBL_HOURS_ABBREV' => 's',
  'LNK_NEW_CALL' => 'Evidentiraj poziv',
  'LNK_NEW_MEETING' => 'Zakaži sastanak',
  'LNK_CALL_LIST' => 'Pregledaj pozive',
  'LNK_IMPORT_CALLS' => 'Uvezi pozive',
  'ERR_DELETE_RECORD' => 'Broj zapisa mora biti naveden pri brisanju naloga.',
  'NTC_REMOVE_INVITEE' => 'Da li sigurno želite da uklonite ovog pozvanog iz ovog poziva?',
  'LBL_INVITEE' => 'Pozvani',
  'LBL_RELATED_TO' => 'Povezano sa:',
  'LNK_NEW_APPOINTMENT' => 'Zakaži sastanak',
  'LBL_SCHEDULING_FORM_TITLE' => 'Zakazivanje',
  'LBL_ADD_INVITEE' => 'Dodaj pozvane',
  'LBL_NAME' => 'Ime',
  'LBL_FIRST_NAME' => 'Ime',
  'LBL_LAST_NAME' => 'Prezime',
  'LBL_PHONE' => 'Telefon',
  'LBL_SEND_BUTTON_TITLE' => 'Pošalji pozvanima [Alt+I]',
  'LBL_SEND_BUTTON_LABEL' => 'Pošalji pozvanima',
  'LBL_DATE_END' => 'Datum završetka',
  'LBL_TIME_END' => 'Vreme završetka',
  'LBL_REMINDER_TIME' => 'Vreme podsetnika',
  'LBL_SEARCH_BUTTON' => 'Pretraga',
  'LBL_ACTIVITIES_REPORTS' => 'Izveštaj o Aktivnostima',
  'LBL_ADD_BUTTON' => 'Dodaj',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Pozivi',
  'LBL_LOG_CALL' => 'Dnevnik poziva',
  'LNK_SELECT_ACCOUNT' => 'Izaberi kompaniju',
  'LNK_NEW_ACCOUNT' => 'Nova kompanija',
  'LNK_NEW_OPPORTUNITY' => 'Nova prodajna prilika',
  'LBL_DEL' => 'Brisanje',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Potencijalni klijenti',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakti',
  'LBL_USERS_SUBPANEL_TITLE' => 'Korisnici',
  'LBL_MEMBER_OF' => 'Član:',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Beleške',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Dodeljeno',
  'LBL_LIST_MY_CALLS' => 'Moji pozivi',
  'LBL_SELECT_FROM_DROPDOWN' => 'Molim, prvo izaberite iz padajuće liste Povezani sa',
  'LBL_ASSIGNED_TO_NAME' => 'Dodeljeno',
  'LBL_ASSIGNED_TO_ID' => 'Dodeljeni korisnik',
  'NOTICE_DURATION_TIME' => 'Vreme trajanja mora biti veće od 0',
  'LBL_CALL_INFORMATION' => 'Pregled poziva',
  'LBL_REMOVE' => 'Ukloni',
);

