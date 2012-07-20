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
  'LBL_COLON' => ':',
  'LBL_NEW_TASK_BUTTON_KEY' => 'N',
  'LBL_SCHEDULE_MEETING_BUTTON_KEY' => 'M',
  'LBL_SCHEDULE_CALL_BUTTON_KEY' => 'C',
  'LBL_NEW_NOTE_BUTTON_KEY' => 'T',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_MODULE_NAME' => 'Priminimai',
  'LBL_MODULE_TITLE' => 'Priminimai: Pradžia',
  'LBL_SEARCH_FORM_TITLE' => 'Priminimų paieška',
  'LBL_LIST_FORM_TITLE' => 'Priminimų sąrašas',
  'LBL_LIST_SUBJECT' => 'Tema',
  'LBL_LIST_CONTACT' => 'Kontaktas',
  'LBL_LIST_RELATED_TO' => 'Susijęs su',
  'LBL_LIST_DATE' => 'Data',
  'LBL_LIST_TIME' => 'Pradžios laikas',
  'LBL_LIST_CLOSE' => 'Užbaigti',
  'LBL_SUBJECT' => 'Tema:',
  'LBL_STATUS' => 'Statusas:',
  'LBL_LOCATION' => 'Vieta:',
  'LBL_DATE_TIME' => 'Pradžios data ir laikas:',
  'LBL_DATE' => 'Pradžios data:',
  'LBL_TIME' => 'Pradžios laikas:',
  'LBL_DURATION' => 'Trukmė',
  'LBL_DURATION_MINUTES' => 'Trukmė minutėmis:',
  'LBL_HOURS_MINS' => '(valandos/minutės)',
  'LBL_CONTACT_NAME' => 'Kontakto vardas:',
  'LBL_MEETING' => 'Susitikimas:',
  'LBL_DESCRIPTION_INFORMATION' => 'Aprašymas',
  'LBL_DESCRIPTION' => 'Aprašymas:',
  'LNK_NEW_CALL' => 'Suplanuoti skambutį',
  'LNK_NEW_MEETING' => 'Suplanuoti susitikimą',
  'LNK_NEW_TASK' => 'Sukurti užduotį',
  'LNK_NEW_NOTE' => 'Sukurti užrašą',
  'LNK_NEW_EMAIL' => 'Archyvuoti laišką',
  'LNK_CALL_LIST' => 'Skambučiai',
  'LNK_MEETING_LIST' => 'Susitikimai',
  'LNK_TASK_LIST' => 'Užduotys',
  'LNK_NOTE_LIST' => 'Užrašai',
  'LNK_EMAIL_LIST' => 'El. paštas',
  'ERR_DELETE_RECORD' => 'Turite nurodyti įrašą, kad ištrintumėte klientą',
  'NTC_REMOVE_INVITEE' => 'Ar norite pašalinti šį dalyvį iš susitikimo?',
  'LBL_INVITEE' => 'Dalyviai',
  'LBL_LIST_DIRECTION' => 'Kryptis',
  'LBL_DIRECTION' => 'Kryptis',
  'LNK_NEW_APPOINTMENT' => 'Naujas susitikimas',
  'LNK_VIEW_CALENDAR' => 'Kalendorius',
  'LBL_OPEN_ACTIVITIES' => 'Atidaryti priminimus',
  'LBL_HISTORY' => 'Istorija',
  'LBL_UPCOMING' => 'Mano artimiausi susitikimai',
  'LBL_TODAY' => 'per',
  'LBL_NEW_TASK_BUTTON_TITLE' => 'Sukurti užduotį [Alt+N]',
  'LBL_NEW_TASK_BUTTON_LABEL' => 'Sukurti užduotį',
  'LBL_SCHEDULE_MEETING_BUTTON_TITLE' => 'Suplanuoti susitikimą [Alt+M]',
  'LBL_SCHEDULE_MEETING_BUTTON_LABEL' => 'Suplanuoti susitikimą',
  'LBL_SCHEDULE_CALL_BUTTON_TITLE' => 'Suplanuoti skambutį [Alt+C]',
  'LBL_SCHEDULE_CALL_BUTTON_LABEL' => 'Suplanuoti skambutį',
  'LBL_NEW_NOTE_BUTTON_TITLE' => 'Sukurti užduotį [Alt+T]',
  'LBL_NEW_NOTE_BUTTON_LABEL' => 'Sukurti užrašą',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'Archyvuoti laišką [Alt+K]',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'Archyvuoti laišką',
  'LBL_LIST_STATUS' => 'Statusas',
  'LBL_LIST_DUE_DATE' => 'Atlikimo data',
  'LBL_LIST_LAST_MODIFIED' => 'Redaguota',
  'NTC_NONE_SCHEDULED' => 'Nėra suplanuota.',
  'LNK_IMPORT_CALLS' => 'Importuoti skambučius',
  'LNK_IMPORT_MEETINGS' => 'Importuoti susitikimus',
  'LNK_IMPORT_TASKS' => 'Importuoti užduotis',
  'LNK_IMPORT_NOTES' => 'Importuoti užrašus',
  'NTC_NONE' => 'Joks',
  'LBL_ACCEPT_THIS' => 'patvirtinti?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Atidaryti priminimus',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Atsakingas',
  'appointment_filter_dom' => 
  array (
    'today' => 'Šiandien',
    'tomorrow' => 'Rytoj',
    'this Saturday' => 'Šią savaitę',
    'next Saturday' => 'Kitą savaitę',
    'last this_month' => 'Šį mėnesį',
    'last next_month' => 'Kitą mėnesį',
  ),
);

