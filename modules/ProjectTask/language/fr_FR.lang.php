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
  'LBL_EDITLAYOUT' => 'Editer la mise en page',
  'LBL_DESCRIPTION' => 'Description:',
  'LBL_MODULE_NAME' => 'Tâches Projet',
  'LBL_MODULE_TITLE' => 'Tâches Projet',
  'LBL_SEARCH_FORM_TITLE' => 'Rechercher une Tâche Projet',
  'LBL_LIST_FORM_TITLE' => 'Liste des Tâches Projet',
  'LBL_EDIT_TASK_IN_GRID_TITLE' => 'Editer la Tâche dans la Grille',
  'LBL_ID' => 'ID:',
  'LBL_PROJECT_TASK_ID' => 'Tâches Projet (ID):',
  'LBL_PROJECT_ID' => 'Projet (ID):',
  'LBL_DATE_ENTERED' => 'Date de création:',
  'LBL_DATE_MODIFIED' => 'Date de modification:',
  'LBL_ASSIGNED_USER_ID' => 'Affecté à (ID):',
  'LBL_MODIFIED_USER_ID' => 'Modifié par (ID):',
  'LBL_CREATED_BY' => 'Créé par:',
  'LBL_TEAM_ID' => 'Equipe (ID):',
  'LBL_NAME' => 'Nom:',
  'LBL_STATUS' => 'Statut:',
  'LBL_DATE_DUE' => 'Date échéance:',
  'LBL_TIME_DUE' => 'Heure échéance:',
  'LBL_RESOURCE' => 'Ressource:',
  'LBL_PREDECESSORS' => 'Prédécesseurs:',
  'LBL_DATE_START' => 'Date de début:',
  'LBL_DATE_FINISH' => 'Date de Fin:',
  'LBL_TIME_START' => 'Heure de début:',
  'LBL_TIME_FINISH' => 'Heure de Fin:',
  'LBL_DURATION' => 'Durée:',
  'LBL_DURATION_UNIT' => 'Unité des durées:',
  'LBL_ACTUAL_DURATION' => 'Durée en cours:',
  'LBL_PARENT_ID' => 'Projet (ID):',
  'LBL_PARENT_TASK_ID' => 'Tâche Parent (ID):',
  'LBL_PERCENT_COMPLETE' => 'Progression (%):',
  'LBL_PRIORITY' => 'Priorité:',
  'LBL_ORDER_NUMBER' => 'Tri:',
  'LBL_TASK_NUMBER' => 'Numéro de tâche:',
  'LBL_TASK_ID' => 'Tâche Projet (ID):',
  'LBL_DEPENDS_ON_ID' => 'Dépend de:',
  'LBL_MILESTONE_FLAG' => 'Etape importante:',
  'LBL_ESTIMATED_EFFORT' => 'Effort estimé (hrs):',
  'LBL_ACTUAL_EFFORT' => 'Effort actuel (hrs):',
  'LBL_UTILIZATION' => 'Avancement (%):',
  'LBL_DELETED' => 'Supprimé:',
  'LBL_LIST_ORDER_NUMBER' => 'Tri',
  'LBL_LIST_NAME' => 'Nom',
  'LBL_LIST_DAYS' => 'jours',
  'LBL_LIST_PARENT_NAME' => 'Projet',
  'LBL_LIST_PERCENT_COMPLETE' => 'Progression (%)',
  'LBL_LIST_STATUS' => 'Statut',
  'LBL_LIST_DURATION' => 'Durée',
  'LBL_LIST_ACTUAL_DURATION' => 'Durée en cours',
  'LBL_LIST_ASSIGNED_USER_ID' => 'Assigné à (ID)',
  'LBL_LIST_DATE_DUE' => 'Date d&#39;échéance:',
  'LBL_LIST_DATE_START' => 'Date de début',
  'LBL_LIST_DATE_FINISH' => 'Date de Fin',
  'LBL_LIST_PRIORITY' => 'Priorité',
  'LBL_LIST_CLOSE' => 'Fermer',
  'LBL_PROJECT_NAME' => 'Projet',
  'LNK_NEW_PROJECT' => 'Créer Projet',
  'LNK_PROJECT_LIST' => 'Liste des Projets',
  'LNK_NEW_PROJECT_TASK' => 'Créer Tâche Projet',
  'LNK_PROJECT_TASK_LIST' => 'Tâches Projet',
  'LBL_LIST_MY_PROJECT_TASKS' => 'Mes Tâches Projet',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Tâches Projet',
  'LBL_NEW_FORM_TITLE' => 'Nouvelle Tâche Projet',
  'LBL_ACTIVITIES_TITLE' => 'Activités',
  'LBL_HISTORY_TITLE' => 'Historique',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Activités à Réaliser',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Historique et Activités terminées',
  'DATE_JS_ERROR' => 'Veuillez entrer une date correspondant à cette heure',
  'LBL_ASSIGNED_USER_NAME' => 'Assigné à:',
  'LBL_PARENT_NAME' => 'Projet',
  'LBL_LIST_PROJECT_NAME' => 'Projets',
);

