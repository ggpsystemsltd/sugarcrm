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
  'LNK_IMPORT_CALLS' => 'Importuj rozmowy tel.',
  'LNK_IMPORT_MEETINGS' => 'Importuj spotkania',
  'LNK_IMPORT_TASKS' => 'Importuj zadania',
  'LBL_STATUS' => 'Status:',
  'LBL_COLON' => ':',
  'LBL_NEW_TASK_BUTTON_KEY' => 'N',
  'LBL_SCHEDULE_MEETING_BUTTON_KEY' => 'M',
  'LBL_SCHEDULE_CALL_BUTTON_KEY' => 'C',
  'LBL_NEW_NOTE_BUTTON_KEY' => 'T',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_LIST_STATUS' => 'Status',
  'LBL_MODULE_NAME' => 'Działania',
  'LBL_MODULE_TITLE' => 'Działania: Strona główna',
  'LBL_SEARCH_FORM_TITLE' => 'Wyszukaj działania',
  'LBL_LIST_FORM_TITLE' => 'Lista działań',
  'LBL_LIST_SUBJECT' => 'Temat',
  'LBL_LIST_CONTACT' => 'Osoba kontaktowa',
  'LBL_LIST_RELATED_TO' => 'Powiązane z',
  'LBL_LIST_DATE' => 'Data',
  'LBL_LIST_TIME' => 'Czas rozp.',
  'LBL_LIST_CLOSE' => 'Zamknij',
  'LBL_SUBJECT' => 'Temat:',
  'LBL_LOCATION' => 'Lokalizacja:',
  'LBL_DATE_TIME' => 'Data i czas rozpoczęcia:',
  'LBL_DATE' => 'Data rozp.:',
  'LBL_TIME' => 'Czas rozp.:',
  'LBL_DURATION' => 'Czas trwania:',
  'LBL_DURATION_MINUTES' => 'Czas trwania (minuty):',
  'LBL_HOURS_MINS' => '(godziny/minuty)',
  'LBL_CONTACT_NAME' => 'Osoba kontaktowa:',
  'LBL_MEETING' => 'Spotkanie:',
  'LBL_DESCRIPTION_INFORMATION' => 'Informacje dodatkowe',
  'LBL_DESCRIPTION' => 'Opis:',
  'LNK_NEW_CALL' => 'Zaplanuj rozmowę tel.',
  'LNK_NEW_MEETING' => 'Zaplanuj spotkanie',
  'LNK_NEW_TASK' => 'Utwórz zadanie',
  'LNK_NEW_NOTE' => 'Utwórz notatkę lub załącznik',
  'LNK_NEW_EMAIL' => 'Zarchiwizuj e-mail',
  'LNK_CALL_LIST' => 'Rozmowy tel.',
  'LNK_MEETING_LIST' => 'Spotkania',
  'LNK_TASK_LIST' => 'Zadania',
  'LNK_NOTE_LIST' => 'Notatki',
  'LNK_EMAIL_LIST' => 'E-maile',
  'ERR_DELETE_RECORD' => 'Określ rekord, który chcesz usunąć.',
  'NTC_REMOVE_INVITEE' => 'Czy na pewno chcesz usunąć uczestnika spotkania?',
  'LBL_INVITEE' => 'Uczestnicy',
  'LBL_LIST_DIRECTION' => 'Kierunek',
  'LBL_DIRECTION' => 'Kierunek',
  'LNK_NEW_APPOINTMENT' => 'Nowy termin spotkania',
  'LNK_VIEW_CALENDAR' => 'Dzisiaj',
  'LBL_OPEN_ACTIVITIES' => 'Działania do zrealizowania',
  'LBL_HISTORY' => 'Historia',
  'LBL_UPCOMING' => 'Moje nadchodzące spotkania',
  'LBL_TODAY' => 'w dniu:',
  'LBL_NEW_TASK_BUTTON_TITLE' => 'Utwórz zadanie [Alt+N]',
  'LBL_NEW_TASK_BUTTON_LABEL' => 'Utwórz zadanie',
  'LBL_SCHEDULE_MEETING_BUTTON_TITLE' => 'Zaplanuj spotkanie [Alt+M]',
  'LBL_SCHEDULE_MEETING_BUTTON_LABEL' => 'Zaplanuj spotkanie',
  'LBL_SCHEDULE_CALL_BUTTON_TITLE' => 'Zaplanuj rozmowę tel. [Alt+C]',
  'LBL_SCHEDULE_CALL_BUTTON_LABEL' => 'Zaplanuj rozmowę tel.',
  'LBL_NEW_NOTE_BUTTON_TITLE' => 'Utwórz notatkę lub załącznik [Alt+T]',
  'LBL_NEW_NOTE_BUTTON_LABEL' => 'Utwórz notatkę lub załącznik',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'Zarchiwizuj e-mail [Alt+K]',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'Zarchiwizuj e-mail',
  'LBL_LIST_DUE_DATE' => 'Data wykonania',
  'LBL_LIST_LAST_MODIFIED' => 'Ostatnio modyfikowane',
  'NTC_NONE_SCHEDULED' => 'Nic nie zaplanowano.',
  'LNK_IMPORT_NOTES' => 'Import notatek',
  'NTC_NONE' => 'Nic',
  'LBL_ACCEPT_THIS' => 'Akceptujesz?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Działania do zrealizowania',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Przydzielony użytkownik',
  'appointment_filter_dom' => 
  array (
    'today' => 'dziś',
    'tomorrow' => 'jutro',
    'this Saturday' => 'w tym tygodniu',
    'next Saturday' => 'w przyszłym tygodniu',
    'last this_month' => 'w tym miesiącu',
    'last next_month' => 'w przyszłym miesiącu',
  ),
);

