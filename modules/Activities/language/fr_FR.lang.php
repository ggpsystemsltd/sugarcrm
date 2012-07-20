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
  'LBL_ACCEPT' => 'Accepter',
  'LBL_LIST_CONTACT' => 'Contact',
  'LBL_LIST_DATE' => 'Date',
  'LBL_DESCRIPTION' => 'Description:',
  'LBL_COLON' => ':',
  'LBL_NEW_TASK_BUTTON_KEY' => 'N',
  'LBL_SCHEDULE_MEETING_BUTTON_KEY' => 'M',
  'LBL_SCHEDULE_CALL_BUTTON_KEY' => 'C',
  'LBL_NEW_NOTE_BUTTON_KEY' => 'T',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LNK_IMPORT_NOTES' => 'Import Notes',
  'LBL_MODULE_NAME' => 'Activités',
  'LBL_MODULE_TITLE' => 'Activités',
  'LBL_SEARCH_FORM_TITLE' => 'Rechercher une Activité',
  'LBL_LIST_FORM_TITLE' => 'Liste Activités',
  'LBL_LIST_SUBJECT' => 'Sujet',
  'LBL_LIST_RELATED_TO' => 'Relatif à',
  'LBL_LIST_TIME' => 'Heure début',
  'LBL_LIST_CLOSE' => 'Fermer',
  'LBL_SUBJECT' => 'Sujet:',
  'LBL_STATUS' => 'Statut:',
  'LBL_LOCATION' => 'Localisation:',
  'LBL_DATE_TIME' => 'Date et Heure début:',
  'LBL_DATE' => 'Date de début:',
  'LBL_TIME' => 'Heure de début:',
  'LBL_DURATION' => 'Durée:',
  'LBL_DURATION_MINUTES' => 'Durée en minutes :',
  'LBL_HOURS_MINS' => '(heures/minutes)',
  'LBL_CONTACT_NAME' => 'Nom Contact:',
  'LBL_MEETING' => 'Réunion:',
  'LBL_DESCRIPTION_INFORMATION' => 'Description',
  'LNK_NEW_CALL' => 'Planifier Appel',
  'LNK_NEW_MEETING' => 'Planifier Réunion',
  'LNK_NEW_TASK' => 'Créer Tâche',
  'LNK_NEW_NOTE' => 'Créer Note',
  'LNK_NEW_EMAIL' => 'Créer Email Archivé',
  'LNK_CALL_LIST' => 'Appels',
  'LNK_MEETING_LIST' => 'Réunions',
  'LNK_TASK_LIST' => 'Tâches',
  'LNK_NOTE_LIST' => 'Notes',
  'LNK_EMAIL_LIST' => 'Emails',
  'ERR_DELETE_RECORD' => 'Un numéro d&#39;enregistrement doit être spécifié pour toute suppression.',
  'NTC_REMOVE_INVITEE' => 'Etes-vous sûr(e) sur de vouloir supprimer ce participant de la réunion ?',
  'LBL_INVITEE' => 'Participants',
  'LBL_LIST_DIRECTION' => 'Type',
  'LBL_DIRECTION' => 'Type',
  'LNK_NEW_APPOINTMENT' => 'Nouveau Rendez-vous',
  'LNK_VIEW_CALENDAR' => 'Aujourd&#39;hui',
  'LBL_OPEN_ACTIVITIES' => 'Activités à Réaliser',
  'LBL_HISTORY' => 'Historique et Activités terminées',
  'LBL_UPCOMING' => 'Mes prochaines Activités',
  'LBL_TODAY' => 'jusqu&#39;à',
  'LBL_NEW_TASK_BUTTON_TITLE' => 'Créer une Tâche [Alt+N]',
  'LBL_NEW_TASK_BUTTON_LABEL' => 'Créer Tâche',
  'LBL_SCHEDULE_MEETING_BUTTON_TITLE' => 'Planifier une Réunion [Alt+M]',
  'LBL_SCHEDULE_MEETING_BUTTON_LABEL' => 'Planifier Réunion',
  'LBL_SCHEDULE_CALL_BUTTON_TITLE' => 'Planifier un Appel [Alt+C]',
  'LBL_SCHEDULE_CALL_BUTTON_LABEL' => 'Planifier Appel',
  'LBL_NEW_NOTE_BUTTON_TITLE' => 'Ajouter une Note dans historique [Alt+T]',
  'LBL_NEW_NOTE_BUTTON_LABEL' => 'Créer Note',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'Archiver Email [Alt+K]',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'Archiver Email',
  'LBL_LIST_STATUS' => 'Statut',
  'LBL_LIST_DUE_DATE' => 'Date prévue',
  'LBL_LIST_LAST_MODIFIED' => 'Date de modification',
  'NTC_NONE_SCHEDULED' => 'Non planifié',
  'LNK_IMPORT_CALLS' => 'Import Appels',
  'LNK_IMPORT_MEETINGS' => 'Import Réunions',
  'LNK_IMPORT_TASKS' => 'Import Tâches',
  'NTC_NONE' => 'Indéfini',
  'LBL_ACCEPT_THIS' => 'Accepter ?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Activités à Réaliser',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Assigné à',
  'appointment_filter_dom' => 
  array (
    'today' => 'ce jour',
    'tomorrow' => 'demain',
    'this Saturday' => 'cette semaine',
    'next Saturday' => 'semaine prochaine',
    'last this_month' => 'ce mois-ci',
    'last next_month' => 'mois prochain',
  ),
);

