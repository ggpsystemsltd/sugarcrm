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
  'LBL_AM' => 'AM',
  'LBL_PM' => 'PM',
  'LBL_HOURS_ABBREV' => 'h',
  'LBL_MINS_ABBREV' => 'm',
  'LBL_INFO_DESC' => 'Description',
  'LBL_MODULE_NAME' => 'Calendrier',
  'LBL_MODULE_TITLE' => 'Calendrier',
  'LNK_NEW_CALL' => 'Planifier Appel',
  'LNK_NEW_MEETING' => 'Planifier Réunion',
  'LNK_NEW_APPOINTMENT' => 'Planifier Rendez-vous',
  'LNK_NEW_TASK' => 'Créer Tâche',
  'LNK_CALL_LIST' => 'Appels',
  'LNK_MEETING_LIST' => 'Réunions',
  'LNK_TASK_LIST' => 'Tâches',
  'LNK_VIEW_CALENDAR' => 'Aujourd&#39;hui',
  'LNK_IMPORT_CALLS' => 'Import des Appels',
  'LNK_IMPORT_MEETINGS' => 'Import des Réunions',
  'LNK_IMPORT_TASKS' => 'Import des Tâches',
  'LBL_MONTH' => 'Mois',
  'LBL_DAY' => 'Jour',
  'LBL_YEAR' => 'Année',
  'LBL_WEEK' => 'Semaine',
  'LBL_PREVIOUS_MONTH' => 'Mois Précédent',
  'LBL_PREVIOUS_DAY' => 'Jour Précédent',
  'LBL_PREVIOUS_YEAR' => 'Année Précédente',
  'LBL_PREVIOUS_WEEK' => 'Sem. précédente',
  'LBL_NEXT_MONTH' => 'Mois Suivant',
  'LBL_NEXT_DAY' => 'Jour Suivant',
  'LBL_NEXT_YEAR' => 'Année Suivante',
  'LBL_NEXT_WEEK' => 'Sem. suivante',
  'LBL_SCHEDULED' => 'Planifié',
  'LBL_BUSY' => 'Occupé',
  'LBL_CONFLICT' => 'Conflit',
  'LBL_USER_CALENDARS' => 'Calendriers des utilisateurs',
  'LBL_SHARED' => 'Partagé',
  'LBL_PREVIOUS_SHARED' => 'Précédent',
  'LBL_NEXT_SHARED' => 'Suivant',
  'LBL_SHARED_CAL_TITLE' => 'Calendrier partagé',
  'LBL_USERS' => 'Assigné à',
  'LBL_REFRESH' => 'Rafraîchir',
  'LBL_EDIT_USERLIST' => 'Liste des Utilisateurs',
  'LBL_SELECT_USERS' => 'Selectionner les utilisateurs à afficher sur le calendrier',
  'LBL_FILTER_BY_TEAM' => 'Filtrer la liste des utilisateurs par Equipe:',
  'LBL_ASSIGNED_TO_NAME' => 'Assigné à',
  'LBL_DATE' => 'Date et Heure de début',
  'LBL_CREATE_MEETING' => 'Planifier Réunion',
  'LBL_CREATE_CALL' => 'Planifier Appel',
  'LBL_YES' => 'Oui',
  'LBL_NO' => 'Non',
  'LBL_SETTINGS' => 'Paramètres',
  'LBL_CREATE_NEW_RECORD' => 'Créer une activité',
  'LBL_LOADING' => 'Chargement .....',
  'LBL_SAVING' => 'Sauvegarde .....',
  'LBL_CONFIRM_REMOVE' => 'Etes vous sûr de vouloir supprimer cet enregistrement ?',
  'LBL_EDIT_RECORD' => 'Editer activité',
  'LBL_ERROR_SAVING' => 'Erreur lors de la sauvegarde',
  'LBL_ERROR_LOADING' => 'Erreur lors du chargement',
  'LBL_GOTO_DATE' => 'Aller à la date',
  'NOTICE_DURATION_TIME' => 'La durée doit être supérieure à 0',
  'LBL_STYLE_BASIC' => 'Basique',
  'LBL_STYLE_ADVANCED' => 'Avancée',
  'LBL_INFO_TITLE' => 'Informations complémentaires',
  'LBL_INFO_START_DT' => 'Date de début',
  'LBL_INFO_DUE_DT' => 'Date d&#39;échéance',
  'LBL_INFO_DURATION' => 'Durée',
  'LBL_INFO_NAME' => 'Sujet',
  'LBL_INFO_RELATED_TO' => 'Relatif à',
  'LBL_NO_USER' => 'Aucune correspondance pour le champ : Assigné à',
  'LBL_SUBJECT' => 'Sujet',
  'LBL_DURATION' => 'Durée',
  'LBL_STATUS' => 'Statut',
  'LBL_DATE_TIME' => 'Date et Heure',
  'LBL_SETTINGS_TITLE' => 'Paramètres',
  'LBL_SETTINGS_TIME_STARTS' => 'Heure début :',
  'LBL_SETTINGS_TIME_ENDS' => 'Heure fin :',
  'LBL_SETTINGS_CALENDAR_STYLE' => 'Style du Calendrier :',
  'LBL_SETTINGS_CALLS_SHOW' => 'Voir les appels :',
  'LBL_SETTINGS_TASKS_SHOW' => 'Voir les tâches :',
  'LBL_SAVE_BUTTON' => 'Sauvegarder',
  'LBL_DELETE_BUTTON' => 'Supprimer',
  'LBL_APPLY_BUTTON' => 'Appliquer',
  'LBL_SEND_INVITES' => 'Envoyer Invitations',
  'LBL_CANCEL_BUTTON' => 'Annuler',
  'LBL_CLOSE_BUTTON' => 'Clôturer',
  'LBL_GENERAL_TAB' => 'Détails',
  'LBL_PARTICIPANTS_TAB' => 'Participants',
);

