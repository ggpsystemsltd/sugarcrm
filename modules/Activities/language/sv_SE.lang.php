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
  'LNK_IMPORT_CALLS' => 'Importera telefonsamtal',
  'LNK_IMPORT_MEETINGS' => 'Importera möten',
  'LNK_IMPORT_TASKS' => 'Importera uppgifter',
  'LBL_STATUS' => 'Status:',
  'LBL_COLON' => ':',
  'LBL_NEW_TASK_BUTTON_KEY' => 'N',
  'LBL_SCHEDULE_MEETING_BUTTON_KEY' => 'M',
  'LBL_SCHEDULE_CALL_BUTTON_KEY' => 'C',
  'LBL_NEW_NOTE_BUTTON_KEY' => 'T',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_LIST_STATUS' => 'Status',
  'LBL_MODULE_NAME' => 'Aktiviteter',
  'LBL_MODULE_TITLE' => 'Aktiviteter:Hem',
  'LBL_SEARCH_FORM_TITLE' => 'Sök aktivitet',
  'LBL_LIST_FORM_TITLE' => 'Lista aktiviteter',
  'LBL_LIST_SUBJECT' => 'Ämne',
  'LBL_LIST_CONTACT' => 'Kontakt',
  'LBL_LIST_RELATED_TO' => 'Relaterad till',
  'LBL_LIST_DATE' => 'Datum',
  'LBL_LIST_TIME' => 'Start tid',
  'LBL_LIST_CLOSE' => 'Stäng',
  'LBL_SUBJECT' => 'Ämne:',
  'LBL_LOCATION' => 'Plats:',
  'LBL_DATE_TIME' => 'Startdatum & tid',
  'LBL_DATE' => 'Startdatum:',
  'LBL_TIME' => 'Start tid:',
  'LBL_DURATION' => 'Varaktighet:',
  'LBL_DURATION_MINUTES' => 'Varaktighet minuter:',
  'LBL_HOURS_MINS' => '(timmar/minuter)',
  'LBL_CONTACT_NAME' => 'Kontakt namn:',
  'LBL_MEETING' => 'Möte',
  'LBL_DESCRIPTION_INFORMATION' => 'Beskrivande information',
  'LBL_DESCRIPTION' => 'Beskrivning',
  'LBL_DEFAULT_STATUS' => 'Planerat',
  'LNK_NEW_CALL' => 'Schemalägg telefonsamtal',
  'LNK_NEW_MEETING' => 'Schemalägg möte',
  'LNK_NEW_TASK' => 'Skapa uppgift',
  'LNK_NEW_NOTE' => 'Skapa anteckning eller bilaga',
  'LNK_NEW_EMAIL' => 'Skapa arkiverat mail',
  'LNK_CALL_LIST' => 'Telefonsamtal',
  'LNK_MEETING_LIST' => 'Möten',
  'LNK_TASK_LIST' => 'Uppgifter',
  'LNK_NOTE_LIST' => 'Anteckningar',
  'LNK_EMAIL_LIST' => 'Mail',
  'ERR_DELETE_RECORD' => 'Ett objektnummer måste specificeras för att kunna radera organisationen.',
  'NTC_REMOVE_INVITEE' => 'Är du säker på att du vill ta bort den inbjudna från mötet?',
  'LBL_INVITEE' => 'Inbjudna',
  'LBL_LIST_DIRECTION' => 'Riktning',
  'LBL_DIRECTION' => 'Riktning',
  'LNK_NEW_APPOINTMENT' => 'Ny aktivitet',
  'LNK_VIEW_CALENDAR' => 'Idag',
  'LBL_OPEN_ACTIVITIES' => 'Öppna aktiviteter',
  'LBL_HISTORY' => 'Historik',
  'LBL_UPCOMING' => 'Mina kommande aktiviteter',
  'LBL_TODAY' => 'genom',
  'LBL_NEW_TASK_BUTTON_TITLE' => 'Skapa uppgift [Alt+N]',
  'LBL_NEW_TASK_BUTTON_LABEL' => 'Skapa uppgift',
  'LBL_SCHEDULE_MEETING_BUTTON_TITLE' => 'Schemalägg möte [ALt+M]',
  'LBL_SCHEDULE_MEETING_BUTTON_LABEL' => 'Schemalägg möte',
  'LBL_SCHEDULE_CALL_BUTTON_TITLE' => 'Schemalägg telefonsamtal [Alt+C]',
  'LBL_SCHEDULE_CALL_BUTTON_LABEL' => 'Schemalägg telefonsamtal',
  'LBL_NEW_NOTE_BUTTON_TITLE' => 'Skapa anteckning eller bilaga [ALt+T]',
  'LBL_NEW_NOTE_BUTTON_LABEL' => 'Skapa anteckning eller bilaga',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'Arkivera e-post [Alt+K]',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'Arkivera e-post',
  'LBL_LIST_DUE_DATE' => 'Genomförandedatum',
  'LBL_LIST_LAST_MODIFIED' => 'Senast ändrad',
  'NTC_NONE_SCHEDULED' => 'Inget schemalagt.',
  'LNK_IMPORT_NOTES' => 'Importera anteckningar',
  'NTC_NONE' => 'Ingen',
  'LBL_ACCEPT_THIS' => 'Acceptera?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Öppna aktiviteter',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Tilldelad användare',
  'appointment_filter_dom' => 
  array (
    'today' => 'idag',
    'tomorrow' => 'imorgon',
    'this Saturday' => 'den här veckan',
    'next Saturday' => 'nästa vecka',
    'last this_month' => 'den här månaden',
    'last next_month' => 'nästa månad',
  ),
);

