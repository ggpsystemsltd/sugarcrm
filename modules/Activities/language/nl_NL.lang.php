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
  'LBL_ACCEPT' => 'Accepteer',
  'LBL_STATUS' => 'Status:',
  'LBL_COLON' => ':',
  'LBL_NEW_TASK_BUTTON_KEY' => 'N',
  'LBL_SCHEDULE_MEETING_BUTTON_KEY' => 'M',
  'LBL_SCHEDULE_CALL_BUTTON_KEY' => 'C',
  'LBL_NEW_NOTE_BUTTON_KEY' => 'T',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_LIST_STATUS' => 'Status',
  'LBL_MODULE_NAME' => 'Activiteiten',
  'LBL_MODULE_TITLE' => 'Activiteiten: Start',
  'LBL_SEARCH_FORM_TITLE' => 'Activiteiten zoeken',
  'LBL_LIST_FORM_TITLE' => 'Activiteiten',
  'LBL_LIST_SUBJECT' => 'Onderwerp',
  'LBL_LIST_CONTACT' => 'Persoon',
  'LBL_LIST_RELATED_TO' => 'Gerelateerd aan',
  'LBL_LIST_DATE' => 'Datum',
  'LBL_LIST_TIME' => 'Aanvangstijd',
  'LBL_LIST_CLOSE' => 'Sluit',
  'LBL_SUBJECT' => 'Onderwerp:',
  'LBL_LOCATION' => 'Locatie:',
  'LBL_DATE_TIME' => 'Begindatum & tijd:',
  'LBL_DATE' => 'Begindatum:',
  'LBL_TIME' => 'Aanvangstijd:',
  'LBL_DURATION' => 'Gespreksduur:',
  'LBL_DURATION_MINUTES' => 'Duur (minuten):',
  'LBL_HOURS_MINS' => '(uren/minuten)',
  'LBL_CONTACT_NAME' => 'Naam Persoon:',
  'LBL_MEETING' => 'Afspraak:',
  'LBL_DESCRIPTION_INFORMATION' => 'Beschrijving',
  'LBL_DESCRIPTION' => 'Beschrijving:',
  'LNK_NEW_CALL' => 'Nieuw Telefoongesprek',
  'LNK_NEW_MEETING' => 'Nieuwe Afspraak',
  'LNK_NEW_TASK' => 'Nieuwe Taak',
  'LNK_NEW_NOTE' => 'Nieuwe Notitie of Bijlage',
  'LNK_NEW_EMAIL' => 'Nieuwe gearchiveerde e-mail',
  'LNK_CALL_LIST' => 'Bekijk Telefoongesprekken',
  'LNK_MEETING_LIST' => 'Bekijk Afspraken',
  'LNK_TASK_LIST' => 'Bekijk Taken',
  'LNK_NOTE_LIST' => 'Bekijk Notities',
  'LNK_EMAIL_LIST' => 'Bekijk E-mails',
  'ERR_DELETE_RECORD' => 'Specificeer een recordnummer om dit bedrijf te verwijderen.',
  'NTC_REMOVE_INVITEE' => 'Weet u zeker dat u deze genodigde voor deze afspraak wilt verwijderen?',
  'LBL_INVITEE' => 'Genodigden',
  'LBL_LIST_DIRECTION' => 'Richting',
  'LBL_DIRECTION' => 'Richting',
  'LNK_NEW_APPOINTMENT' => 'Nieuwe Afspraak',
  'LNK_VIEW_CALENDAR' => 'Bekijk Kalender',
  'LBL_OPEN_ACTIVITIES' => 'Openstaande Activiteiten',
  'LBL_HISTORY' => 'Historie',
  'LBL_UPCOMING' => 'Mijn toekomstige activiteiten',
  'LBL_TODAY' => 'tot',
  'LBL_NEW_TASK_BUTTON_TITLE' => 'Nieuwe Taak [Alt+N]',
  'LBL_NEW_TASK_BUTTON_LABEL' => 'Nieuwe Taak',
  'LBL_SCHEDULE_MEETING_BUTTON_TITLE' => 'Plan een afspraak [Alt+M]',
  'LBL_SCHEDULE_MEETING_BUTTON_LABEL' => 'Nieuwe Afspraak',
  'LBL_SCHEDULE_CALL_BUTTON_TITLE' => 'Plan een telefoongesprek [Alt+C]',
  'LBL_SCHEDULE_CALL_BUTTON_LABEL' => 'Nieuw Telefoongesprek',
  'LBL_NEW_NOTE_BUTTON_TITLE' => 'Nieuwe Notitie of Bijlage [Alt+T]',
  'LBL_NEW_NOTE_BUTTON_LABEL' => 'Nieuwe Notitie of Bijlage',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'E-mail archiveren [Alt+K]',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'E-mail archiveren',
  'LBL_LIST_DUE_DATE' => 'Vervaldatum',
  'LBL_LIST_LAST_MODIFIED' => 'Laatste wijziging',
  'NTC_NONE_SCHEDULED' => 'Er zijn geen activiteiten gepland.',
  'LNK_IMPORT_CALLS' => 'Importeer Gesprekken',
  'LNK_IMPORT_MEETINGS' => 'Importeer Afspraken',
  'LNK_IMPORT_TASKS' => 'Importeer Taken',
  'LNK_IMPORT_NOTES' => 'Importeer Notities',
  'NTC_NONE' => 'geen',
  'LBL_ACCEPT_THIS' => 'Accepteren?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Openstaande activiteiten',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Toegewezen aan gebruiker',
  'appointment_filter_dom' => 
  array (
    'today' => 'vandaag',
    'tomorrow' => 'morgen',
    'this Saturday' => 'deze week',
    'next Saturday' => 'volgende week',
    'last this_month' => 'deze maand',
    'last next_month' => 'volgende maand',
  ),
);

