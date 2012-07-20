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
  'LBL_COLON' => ':',
  'LBL_NEW_TASK_BUTTON_KEY' => 'N',
  'LBL_SCHEDULE_MEETING_BUTTON_KEY' => 'M',
  'LBL_SCHEDULE_CALL_BUTTON_KEY' => 'C',
  'LBL_NEW_NOTE_BUTTON_KEY' => 'T',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_LIST_STATUS' => 'Status',
  'LBL_MODULE_NAME' => 'Historik',
  'LBL_MODULE_TITLE' => 'Historik: Startside',
  'LBL_SEARCH_FORM_TITLE' => 'Søg efter historik',
  'LBL_LIST_FORM_TITLE' => 'Historik',
  'LBL_LIST_SUBJECT' => 'Emne',
  'LBL_LIST_CONTACT' => 'Kontakt',
  'LBL_LIST_RELATED_TO' => 'Relateret til',
  'LBL_LIST_DATE' => 'Dato',
  'LBL_LIST_TIME' => 'Starttidspunkt',
  'LBL_LIST_CLOSE' => 'Luk',
  'LBL_SUBJECT' => 'Emne:',
  'LBL_LOCATION' => 'Placering:',
  'LBL_DATE_TIME' => 'Startdato og -klokkeslæt:',
  'LBL_DATE' => 'Startdato:',
  'LBL_TIME' => 'Starttidspunkt:',
  'LBL_DURATION' => 'Varighed:',
  'LBL_HOURS_MINS' => '"timer/minutter"',
  'LBL_CONTACT_NAME' => 'Kontaktnavn:',
  'LBL_MEETING' => 'Møde:',
  'LBL_DESCRIPTION_INFORMATION' => 'Beskrivelsesoplysninger',
  'LBL_DESCRIPTION' => 'Beskrivelse:',
  'LBL_DEFAULT_STATUS' => 'Planlagt',
  'LNK_NEW_CALL' => 'Planlæg opkald',
  'LNK_NEW_MEETING' => 'Planlæg møde',
  'LNK_NEW_TASK' => 'Opret opgave',
  'LNK_NEW_NOTE' => 'Opret note eller vedhæftet fil',
  'LNK_NEW_EMAIL' => 'Arkivér e-mail',
  'LNK_CALL_LIST' => 'Opkald',
  'LNK_MEETING_LIST' => 'Møder',
  'LNK_TASK_LIST' => 'Opgaver',
  'LNK_NOTE_LIST' => 'Noter',
  'LNK_EMAIL_LIST' => 'E-mails',
  'ERR_DELETE_RECORD' => 'Der skal angives et postnummer for at slette virksomheden.',
  'NTC_REMOVE_INVITEE' => 'Er du sikker på, at du vil fjerne denne inviterede fra mødet?',
  'LBL_INVITEE' => 'Inviterede',
  'LBL_LIST_DIRECTION' => 'Retning',
  'LBL_DIRECTION' => 'Retning',
  'LNK_NEW_APPOINTMENT' => 'Ny aftale',
  'LNK_VIEW_CALENDAR' => 'I dag',
  'LBL_OPEN_ACTIVITIES' => 'Åbne aktiviteter',
  'LBL_HISTORY' => 'Historik',
  'LBL_UPCOMING' => 'Mine kommende aftaler',
  'LBL_TODAY' => 'gennem',
  'LBL_NEW_TASK_BUTTON_TITLE' => 'Opret opgave [Alt+N]',
  'LBL_NEW_TASK_BUTTON_LABEL' => 'Opret opgave',
  'LBL_SCHEDULE_MEETING_BUTTON_TITLE' => 'Planlæg møde [Alt+M]',
  'LBL_SCHEDULE_MEETING_BUTTON_LABEL' => 'Planlæg møde',
  'LBL_SCHEDULE_CALL_BUTTON_TITLE' => 'Planlæg opkald [Alt+C]',
  'LBL_SCHEDULE_CALL_BUTTON_LABEL' => 'Planlæg opkald',
  'LBL_NEW_NOTE_BUTTON_TITLE' => 'Opret note eller vedhæftet fil [Alt+T]',
  'LBL_NEW_NOTE_BUTTON_LABEL' => 'Opret note eller vedhæftet fil',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'Arkivér e-mail [Alt+K]',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'Arkivér e-mail',
  'LBL_LIST_DUE_DATE' => 'Forfaldsdato',
  'LBL_LIST_LAST_MODIFIED' => 'Sidst ændret:',
  'NTC_NONE_SCHEDULED' => 'Ingen planlagt.',
  'LNK_IMPORT_NOTES' => 'Importér noter',
  'NTC_NONE' => 'Ingen',
  'LBL_ACCEPT_THIS' => 'Acceptér?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Historik',
  'appointment_filter_dom' => 
  array (
    'today' => 'i dag',
    'tomorrow' => 'i morgen',
    'this Saturday' => 'denne uge',
    'next Saturday' => 'næste uge',
    'last this_month' => 'denne måned',
    'last next_month' => 'næste måned',
  ),
);

