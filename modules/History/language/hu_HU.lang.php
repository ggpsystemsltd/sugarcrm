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
  'LBL_MODULE_NAME' => 'Előzmény',
  'LBL_MODULE_TITLE' => 'Előzmény: Főoldal',
  'LBL_SEARCH_FORM_TITLE' => 'Keresés az előzményekben',
  'LBL_LIST_FORM_TITLE' => 'Előzmény',
  'LBL_LIST_SUBJECT' => 'Tárgy',
  'LBL_LIST_CONTACT' => 'Kapcsolat',
  'LBL_LIST_RELATED_TO' => 'Kapcsolódó kliens',
  'LBL_LIST_DATE' => 'Dátum',
  'LBL_LIST_TIME' => 'Kezdési idő',
  'LBL_LIST_CLOSE' => 'Zárás',
  'LBL_SUBJECT' => 'Tárgy:',
  'LBL_STATUS' => 'Állapot:',
  'LBL_LOCATION' => 'Helyszín:',
  'LBL_DATE_TIME' => 'Kezdő dátum és idő:',
  'LBL_DATE' => 'Kezdés dátuma:',
  'LBL_TIME' => 'Kezdés időpontja:',
  'LBL_DURATION' => 'Időtartam:',
  'LBL_HOURS_MINS' => '(Óra / perc)',
  'LBL_CONTACT_NAME' => 'Kapcsolattartó neve:',
  'LBL_MEETING' => 'Találkozó:',
  'LBL_DESCRIPTION_INFORMATION' => 'Információ részletezése',
  'LBL_DESCRIPTION' => 'Leírás:',
  'LBL_DEFAULT_STATUS' => 'Tervezett',
  'LNK_NEW_CALL' => 'Hívás naplózása',
  'LNK_NEW_MEETING' => 'Találkozó ütemezése',
  'LNK_NEW_TASK' => 'Feladat létrehozása',
  'LNK_NEW_NOTE' => 'Feljegyzés vagy csatolmány létrehozása',
  'LNK_NEW_EMAIL' => 'Email archiválása',
  'LNK_CALL_LIST' => 'Hívások',
  'LNK_MEETING_LIST' => 'Találkozók',
  'LNK_TASK_LIST' => 'Feladatok',
  'LNK_NOTE_LIST' => 'Feljegyzések',
  'LNK_EMAIL_LIST' => 'Emailek',
  'ERR_DELETE_RECORD' => 'Adjon meg egy azonosítót a kliens törléséhez.',
  'NTC_REMOVE_INVITEE' => 'Biztosan el akarja távolítani ezt a meghívottat a találkozóból?',
  'LBL_INVITEE' => 'Meghívottak',
  'LBL_LIST_DIRECTION' => 'Irány',
  'LBL_DIRECTION' => 'Irány',
  'LNK_NEW_APPOINTMENT' => 'Új megbeszélés',
  'LNK_VIEW_CALENDAR' => 'Ma',
  'LBL_OPEN_ACTIVITIES' => 'Nyitott tevékenységek',
  'LBL_HISTORY' => 'Előzmények',
  'LBL_UPCOMING' => 'Következő megbeszéléseim',
  'LBL_TODAY' => 'keresztül',
  'LBL_NEW_TASK_BUTTON_TITLE' => 'Feladat létrehozás [Alt+N]',
  'LBL_NEW_TASK_BUTTON_LABEL' => 'Feladat létrehozása',
  'LBL_SCHEDULE_MEETING_BUTTON_TITLE' => 'Találkozó ütemezése [Alt+M]',
  'LBL_SCHEDULE_MEETING_BUTTON_LABEL' => 'Találkozó ütemezése',
  'LBL_SCHEDULE_CALL_BUTTON_TITLE' => 'Hívás naplózása [Alt+C]',
  'LBL_SCHEDULE_CALL_BUTTON_LABEL' => 'Hívás naplózása',
  'LBL_NEW_NOTE_BUTTON_TITLE' => 'Feljegyzés vagy csatolmány létrehozása [Alt+T]',
  'LBL_NEW_NOTE_BUTTON_LABEL' => 'Feljegyzés vagy csatolmány létrehozása',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'Email archiválás [Alt+K]',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'Email archiválás',
  'LBL_LIST_STATUS' => 'Állapot',
  'LBL_LIST_DUE_DATE' => 'Esedékesség dátuma',
  'LBL_LIST_LAST_MODIFIED' => 'Utolsó módosítás',
  'NTC_NONE_SCHEDULED' => 'Nincs ütemezés.',
  'LNK_IMPORT_NOTES' => 'Feljegyzések importálása',
  'NTC_NONE' => 'Egyik sem',
  'LBL_ACCEPT_THIS' => 'Elfogadja?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Előzmények',
  'appointment_filter_dom' => 
  array (
    'today' => 'ma',
    'tomorrow' => 'holnap',
    'this Saturday' => 'ez a hét',
    'next Saturday' => 'következő hét',
    'last this_month' => 'ez a hónap',
    'last next_month' => 'következő hónap',
  ),
);

