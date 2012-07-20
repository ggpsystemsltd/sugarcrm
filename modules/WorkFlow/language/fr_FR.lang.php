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
  'LBL_UP' => 'Haut',
  'LBL_DOWN' => 'Bas',
  'LBL_EDITLAYOUT' => 'Editer la mise en page',
  'LBL_MODULE_ID' => 'WorkFlow',
  'LBL_DESCRIPTION' => 'Description:',
  'LBL_MODULE_NAME' => 'Définitions du Workflow:',
  'LBL_MODULE_TITLE' => 'Workflow',
  'LBL_SEARCH_FORM_TITLE' => 'Recherche Workflow',
  'LBL_LIST_FORM_TITLE' => 'Liste de Workflow',
  'LBL_NEW_FORM_TITLE' => 'Créer un Workflow',
  'LBL_LIST_NAME' => 'Nom',
  'LBL_LIST_TYPE' => 'L&#39;Exécution se fait:',
  'LBL_LIST_BASE_MODULE' => 'Module cible:',
  'LBL_LIST_STATUS' => 'Statut',
  'LBL_NAME' => 'Nom:',
  'LBL_TYPE' => 'Actions effectuées:',
  'LBL_STATUS' => 'Statut:',
  'LBL_BASE_MODULE' => 'Module cible:',
  'LBL_LIST_ORDER' => 'Ordre d&#39;exécution:',
  'LBL_FROM_NAME' => '"From" Nom:',
  'LBL_FROM_ADDRESS' => '"From" Email:',
  'LNK_NEW_WORKFLOW' => 'Créer un Workflow',
  'LNK_WORKFLOW' => 'Liste des Workflows',
  'LBL_ALERT_TEMPLATES' => 'Modèles d&#39;Alerte',
  'LBL_CREATE_ALERT_TEMPLATE' => 'Créer un modèle d&#39;Alerte:',
  'LBL_SUBJECT' => 'Sujet:',
  'LBL_RECORD_TYPE' => 'S&#39;applique aux:',
  'LBL_RELATED_MODULE' => 'Module Associé:',
  'LBL_PROCESS_LIST' => 'Ordonnancement du Workflow',
  'LNK_ALERT_TEMPLATES' => 'Modèles d&#39;Alerte email',
  'LNK_PROCESS_VIEW' => 'Ordonnancement des Workflows',
  'LBL_PROCESS_SELECT' => 'Veuillez sélectionner un module:',
  'LBL_LACK_OF_TRIGGER_ALERT' => 'Attention: Vous devez créer un déclencheur pour que ce Workflow fonctionne',
  'LBL_LACK_OF_NOTIFICATIONS_ON' => 'Attention: Vous devez activer les Notifications dans le panneau d&#39;administration et paramétrer l&#39;envoi des mails système > Paramètres Emails pour envoyer des Alertes',
  'LBL_FIRE_ORDER' => 'Ordre du Process:',
  'LBL_RECIPIENTS' => 'Destinataires',
  'LBL_INVITEES' => 'Participants',
  'LBL_INVITEE_NOTICE' => 'Attention, vous devez sélectionner au moins un invité pour créer ce',
  'NTC_REMOVE_ALERT' => 'Etes-vous sûr(e) de vouloir supprimer ce Workflow?',
  'LBL_EDIT_ALT_TEXT' => 'Texte Alternatif',
  'LBL_INSERT' => 'Insérer',
  'LBL_SELECT_OPTION' => 'Merci de choisir une option.',
  'LBL_SELECT_VALUE' => 'Vous devez choisir une valeur.',
  'LBL_SELECT_MODULE' => 'Merci de sélectionner un module lié.',
  'LBL_SELECT_FILTER' => 'Vous devez choisir un champ pour filtrer le module lié.',
  'LBL_LIST_UP' => 'monter',
  'LBL_LIST_DN' => 'descendre',
  'LBL_SET' => 'Positionner',
  'LBL_AS' => 'à',
  'LBL_SHOW' => 'Voir',
  'LBL_HIDE' => 'Masquer',
  'LBL_SPECIFIC_FIELD' => 'champ spécifique',
  'LBL_ANY_FIELD' => 'tous les champs',
  'LBL_LINK_RECORD' => 'Liée à un enregistrement',
  'LBL_INVITE_LINK' => 'Réunion/Lien pour inviter à la discussion',
  'LBL_PLEASE_SELECT' => 'Sélectionnez',
  'LBL_BODY' => 'Corps :',
  'LBL__S' => 'informations de',
  'LBL_ALERT_SUBJECT' => 'ALERTE WORKFLOW',
  'LBL_ACTION_ERROR' => 'Cette action ne peut pas être exécutée. Editer cette action afin que chacun des champs et des valeurs de champ soient valides.',
  'LBL_ACTION_ERRORS' => 'Remarque : au moins une des actions suivantes contient des erreurs.',
  'LBL_ALERT_ERROR' => 'Cette alerte ne peut pas être exécutée. Editer cette alerte afin de vérifier les différents paramètres.',
  'LBL_ALERT_ERRORS' => 'Remarque : au moins une des alertes suivantes contient des erreurs.',
  'LBL_TRIGGER_ERROR' => 'Remarque : ce déclencheur contient des données invalides et ne sera pas déclenché.',
  'LBL_TRIGGER_ERRORS' => 'Remarque : au moins un des déclencheurs suivants contient des erreurs.',
);

