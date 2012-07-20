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
  'LBL_BLANK' => 'Pusty',
  'LBL_STATUS' => 'Status:',
  'LBL_HOURS_ABBREV' => 'h',
  'LBL_MINSS_ABBREV' => 'm',
  'LBL_COLON' => ':',
  'LBL_SEND_BUTTON_KEY' => 'I',
  'LBL_OUTLOOK_ID' => 'Outlook ID',
  'LBL_MODULE_NAME' => 'Rozmowy telefoniczne',
  'LBL_MODULE_TITLE' => 'Rozmowy telefoniczne: Strona główna',
  'LBL_SEARCH_FORM_TITLE' => 'Wyszukaj rozmowy tel.',
  'LBL_LIST_FORM_TITLE' => 'Lista rozmów tel.',
  'LBL_NEW_FORM_TITLE' => 'Utwórz termin',
  'LBL_LIST_CLOSE' => 'Zamknij',
  'LBL_LIST_SUBJECT' => 'Temat',
  'LBL_LIST_CONTACT' => 'Osoba kontaktowa',
  'LBL_LIST_RELATED_TO' => 'Powiązane z',
  'LBL_LIST_RELATED_TO_ID' => 'Powiązane z ID',
  'LBL_LIST_DATE' => 'Data rozp.',
  'LBL_LIST_TIME' => 'Czas rozp.',
  'LBL_LIST_DURATION' => 'Czas trwania',
  'LBL_LIST_DIRECTION' => 'Kierunek',
  'LBL_SUBJECT' => 'Temat:',
  'LBL_REMINDER' => 'Przypomnienie:',
  'LBL_CONTACT_NAME' => 'Kontakt:',
  'LBL_DESCRIPTION_INFORMATION' => 'Informacje',
  'LBL_DESCRIPTION' => 'Opis:',
  'LBL_DIRECTION' => 'Kierunek:',
  'LBL_DATE' => 'Data rozpoczęcia:',
  'LBL_DURATION' => 'Czas trwania:',
  'LBL_DURATION_HOURS' => 'Czas trwania (godzin):',
  'LBL_DURATION_MINUTES' => 'Czas trwania (minut):',
  'LBL_HOURS_MINUTES' => '(godz./min.)',
  'LBL_CALL' => 'Rozmowa tel:',
  'LBL_DATE_TIME' => 'Data i czas rozp.:',
  'LBL_TIME' => 'Czas rozp.:',
  'LNK_NEW_CALL' => 'Zaplanuj rozmowę tel.',
  'LNK_NEW_MEETING' => 'Zaplanuj spotkanie',
  'LNK_CALL_LIST' => 'Rozmowy tel.',
  'LNK_IMPORT_CALLS' => 'Importuj rozmowy tel.',
  'ERR_DELETE_RECORD' => 'Wskaż Klienta, którego chcesz usunąć.',
  'NTC_REMOVE_INVITEE' => 'Czy na pewno chcesz usunąć uczestnika rozmowy?',
  'LBL_INVITEE' => 'Uczestnicy',
  'LBL_RELATED_TO' => 'Powiązany z:',
  'LNK_NEW_APPOINTMENT' => 'Utwórz termin',
  'LBL_SCHEDULING_FORM_TITLE' => 'Planowanie',
  'LBL_ADD_INVITEE' => 'Dodaj uczestników',
  'LBL_NAME' => 'Nazwa',
  'LBL_FIRST_NAME' => 'Imię',
  'LBL_LAST_NAME' => 'Nazwisko',
  'LBL_EMAIL' => 'E-mail',
  'LBL_PHONE' => 'Telefon',
  'LBL_SEND_BUTTON_TITLE' => 'Wyślij zaproszenia [Alt+I]',
  'LBL_SEND_BUTTON_LABEL' => 'Wyślij zaproszenia',
  'LBL_DATE_END' => 'Data zakończenia',
  'LBL_TIME_END' => 'Czas zakończenia',
  'LBL_REMINDER_TIME' => 'Czas przypomnienia',
  'LBL_SEARCH_BUTTON' => 'Szukaj',
  'LBL_ACTIVITIES_REPORTS' => 'Raport działań',
  'LBL_ADD_BUTTON' => 'Dodaj',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Rozmowy tel.',
  'LBL_LOG_CALL' => 'Dziennik rozmów tel.',
  'LNK_SELECT_ACCOUNT' => 'Wybierz klienta',
  'LNK_NEW_ACCOUNT' => 'Nowy klient',
  'LNK_NEW_OPPORTUNITY' => 'Nowa szansa sprzedaży',
  'LBL_DEL' => 'Usuń',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Leady',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakty',
  'LBL_USERS_SUBPANEL_TITLE' => 'Użytkownicy',
  'LBL_MEMBER_OF' => 'Jest członkiem',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Notatki',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Przydzielone do',
  'LBL_LIST_MY_CALLS' => 'Moje rozmowy tel.',
  'LBL_SELECT_FROM_DROPDOWN' => 'Najpierw dokonaj wyboru z listy rozwijalnej "Połączonych z".',
  'LBL_ASSIGNED_TO_NAME' => 'Przydzielone do',
  'LBL_ASSIGNED_TO_ID' => 'Przydzielone do użytkownika',
  'NOTICE_DURATION_TIME' => 'Czas trwania musi być dłuższy, niż 0',
  'LBL_CALL_INFORMATION' => 'Przegląd rozmów tel.',
  'LBL_REMOVE' => 'usuń',
);

