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
  'LBL_BLANK' => '-vide-',
  'LBL_LIST_CONTACT' => 'Contact',
  'LBL_CONTACT_NAME' => 'Contact:',
  'LBL_DESCRIPTION' => 'Description:',
  'LBL_HOURS_ABBREV' => 'h',
  'LBL_MINSS_ABBREV' => 'm',
  'LBL_COLON' => ':',
  'LBL_EMAIL' => 'Email',
  'LBL_SEND_BUTTON_KEY' => 'I',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Leads',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Contacts',
  'LBL_OUTLOOK_ID' => 'Outlook ID',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Notes',
  'LBL_MODULE_NAME' => 'Appels',
  'LBL_MODULE_TITLE' => 'Appels',
  'LBL_SEARCH_FORM_TITLE' => 'Rechercher un Appel',
  'LBL_LIST_FORM_TITLE' => 'Liste des Appels',
  'LBL_NEW_FORM_TITLE' => 'Planifier Appel',
  'LBL_LIST_CLOSE' => 'Fermer',
  'LBL_LIST_SUBJECT' => 'Sujet',
  'LBL_LIST_RELATED_TO' => 'Relatif à',
  'LBL_LIST_RELATED_TO_ID' => 'Relatif à (ID)',
  'LBL_LIST_DATE' => 'Date de début',
  'LBL_LIST_TIME' => 'Heure début',
  'LBL_LIST_DURATION' => 'Durée',
  'LBL_LIST_DIRECTION' => 'Type',
  'LBL_SUBJECT' => 'Sujet:',
  'LBL_REMINDER' => 'Notification:',
  'LBL_DESCRIPTION_INFORMATION' => 'Description',
  'LBL_STATUS' => 'Statut:',
  'LBL_DIRECTION' => 'Type:',
  'LBL_DATE' => 'Date de début:',
  'LBL_DURATION' => 'Durée:',
  'LBL_DURATION_HOURS' => 'Durée en Heures:',
  'LBL_DURATION_MINUTES' => 'Durée en Minutes:',
  'LBL_HOURS_MINUTES' => '(heures/minutes)',
  'LBL_CALL' => 'Appel:',
  'LBL_DATE_TIME' => 'Date et Heure début:',
  'LBL_TIME' => 'Heure de début:',
  'LNK_NEW_CALL' => 'Planifier Appel',
  'LNK_NEW_MEETING' => 'Planifier Réunion',
  'LNK_CALL_LIST' => 'Appels',
  'LNK_IMPORT_CALLS' => 'Import Appels',
  'ERR_DELETE_RECORD' => 'Un enregistrement au moins doit être sélectionné pour réaliser une suppression.',
  'NTC_REMOVE_INVITEE' => 'Etes vous sûr de vouloir supprimer ce contact de cet appel ?',
  'LBL_INVITEE' => 'Participants',
  'LBL_RELATED_TO' => 'Lié à:',
  'LNK_NEW_APPOINTMENT' => 'Planifier Rendez-vous',
  'LBL_SCHEDULING_FORM_TITLE' => 'Planification',
  'LBL_ADD_INVITEE' => 'Ajouter des participants',
  'LBL_NAME' => 'Nom',
  'LBL_FIRST_NAME' => 'Prénom',
  'LBL_LAST_NAME' => 'Nom',
  'LBL_PHONE' => 'Téléphone',
  'LBL_SEND_BUTTON_TITLE' => 'Envoyer les invitations [Alt+I]',
  'LBL_SEND_BUTTON_LABEL' => 'Envoyer Invitations',
  'LBL_DATE_END' => 'Date de fin',
  'LBL_TIME_END' => 'Heure de fin',
  'LBL_REMINDER_TIME' => 'Heure de la notification',
  'LBL_SEARCH_BUTTON' => 'Rechercher',
  'LBL_ACTIVITIES_REPORTS' => 'Rapport d&#39;activités',
  'LBL_ADD_BUTTON' => 'Ajouter',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Appels',
  'LBL_LOG_CALL' => 'Log Appel',
  'LNK_SELECT_ACCOUNT' => 'Choisir un Compte',
  'LNK_NEW_ACCOUNT' => 'Nouveau Compte',
  'LNK_NEW_OPPORTUNITY' => 'Nouvelle Affaire',
  'LBL_DEL' => 'Sup',
  'LBL_USERS_SUBPANEL_TITLE' => 'Utilisateurs',
  'LBL_MEMBER_OF' => 'Membre de',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Assigné à',
  'LBL_LIST_MY_CALLS' => 'Mes Appels',
  'LBL_SELECT_FROM_DROPDOWN' => 'Merci de sélectionner en premier la liste déroulante Lié à.',
  'LBL_ASSIGNED_TO_NAME' => 'Assigné à',
  'LBL_ASSIGNED_TO_ID' => 'Utilisateur assigné',
  'NOTICE_DURATION_TIME' => 'La durée doit être supérieure à 0',
  'LBL_CALL_INFORMATION' => 'Informations Appel',
  'LBL_REMOVE' => 'Sup',
  'LBL_ACCEPT_STATUS' => 'Statut acceptation',
  'LBL_ACCEPT_LINK' => 'Lien acceptation',
  'LBL_PARENT_ID' => 'Parent (ID)',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'Modifié par (ID)',
  'LBL_EXPORT_CREATED_BY' => 'Créé par (ID)',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'Assigné à (ID)',
  'LBL_EXPORT_DATE_START' => 'Date et heure de début',
  'LBL_EXPORT_PARENT_TYPE' => 'Relatif à',
  'LBL_EXPORT_REMINDER_TIME' => 'Rappel (en minutes)',
);

