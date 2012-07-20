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
  'LBL_RECORD' => 'Module',
  'LBL_ADDRESS_TO' => 'to:',
  'LBL_ADDRESS_CC' => 'cc:',
  'LBL_ADDRESS_BCC' => 'bcc:',
  'LBL_ADDRESS_TYPE_TARGET' => 'type',
  'LBL_BLANK' => '',
  'LBL_MODULE_NAME' => 'Liste des Destinataires d&#39;Alerte',
  'LBL_MODULE_TITLE' => 'Destinataires',
  'LBL_SEARCH_FORM_TITLE' => 'Recherche Destinataire du Workflow',
  'LBL_LIST_FORM_TITLE' => 'Liste des Destinataires',
  'LBL_NEW_FORM_TITLE' => 'Créer un Destinataire de Workflow',
  'LBL_LIST_USER_TYPE' => 'Type Utilisateur',
  'LBL_LIST_ARRAY_TYPE' => 'Type d&#39;Action',
  'LBL_LIST_RELATE_TYPE' => 'Type de Liaison',
  'LBL_LIST_ADDRESS_TYPE' => 'Type d&#39;Adresse',
  'LBL_LIST_FIELD_VALUE' => 'Assigné à',
  'LBL_LIST_REL_MODULE1' => 'Module Associé',
  'LBL_LIST_REL_MODULE2' => 'Module Associé au module Associé',
  'LBL_LIST_WHERE_FILTER' => 'Statut',
  'LBL_USER_TYPE' => 'Type d&#39;Utilisateur:',
  'LBL_ARRAY_TYPE' => 'Type d&#39;Action:',
  'LBL_RELATE_TYPE' => 'Type de Relation:',
  'LBL_WHERE_FILTER' => 'Statut:',
  'LBL_FIELD_VALUE' => 'Utilisateur selectionné:',
  'LBL_REL_MODULE1' => 'Module Associé:',
  'LBL_REL_MODULE2' => 'Module Associé au module Associé:',
  'LBL_CUSTOM_USER' => 'Utilisateur personnalisé:',
  'LNK_NEW_WORKFLOW' => 'Créer un Workflow',
  'LNK_WORKFLOW' => 'Objets du Workflow',
  'LBL_LIST_STATEMENT' => 'Destinataires de l&#39;Alerte:',
  'LBL_LIST_STATEMENT_CONTENT' => 'Envoyer l&#39;Alerte au Destinataire suivant:',
  'LBL_ALERT_CURRENT_USER' => 'Un Utilisateur rattaché à la cible',
  'LBL_ALERT_CURRENT_USER_TITLE' => 'un Utilisateur rattaché au module cible',
  'LBL_ALERT_REL_USER' => 'Un Utilisateur rattaché à une association',
  'LBL_ALERT_REL_USER_TITLE' => 'Un Utilisateur rattaché à un module associé',
  'LBL_ALERT_REL_USER_CUSTOM' => 'Destinataire rattaché à une association',
  'LBL_ALERT_REL_USER_CUSTOM_TITLE' => 'Destinataire rattaché au module associé',
  'LBL_ALERT_TRIG_USER_CUSTOM' => 'Destinataire rattaché au module cible',
  'LBL_ALERT_TRIG_USER_CUSTOM_TITLE' => 'Destinataire rattaché au module cible',
  'LBL_ALERT_SPECIFIC_USER' => 'Un champ spécifique',
  'LBL_ALERT_SPECIFIC_USER_TITLE' => 'Un Utilisateur spécifié',
  'LBL_ALERT_SPECIFIC_TEAM' => 'Tous les Utilisateurs dans un champ spécifié',
  'LBL_ALERT_SPECIFIC_TEAM_TITLE' => 'Tous les Utilisateurs d&#39;une équipe spécifiée',
  'LBL_ALERT_SPECIFIC_ROLE' => 'Tous les Utilisateurs dans un champ spécifié',
  'LBL_ALERT_SPECIFIC_ROLE_TITLE' => 'Tous les Utilisateurs ayant un rôle spécifié',
  'LBL_ALERT_SPECIFIC_TEAM_TARGET_TITLE' => 'Utilisateurs de l&#39;Equipe rattachée au module cible',
  'LBL_ALERT_SPECIFIC_TEAM_TARGET' => 'Tous les Utilisateurs de (des) l&#39;Equipe(s) rattachée(s) au module cible',
  'LBL_ALERT_LOGIN_USER_TITLE' => 'Utilisateur loggué au moment de l&#39;execution',
  'LBL_TEAM' => 'Equipe',
  'LBL_USER' => 'Assigné à',
  'LBL_USER_MANAGER' => 'Responsable de l&#39;utilisateur',
  'LBL_ROLE' => 'Role',
  'LBL_SEND_EMAIL' => 'Envoyer un email à:',
  'LBL_USER1' => 'qui a créé l&#39;enregistrement',
  'LBL_USER2' => 'qui a modifié pour la dernière fois l&#39;enregistrement',
  'LBL_USER3' => 'Actuel',
  'LBL_USER3b' => 'du système.',
  'LBL_USER4' => 'qui est assigné à l&#39;enregistrement',
  'LBL_USER5' => 'qui était assigné à l&#39;enregistrement',
  'LBL_ADDRESS_TYPE' => 'étant destinataire dans',
  'LBL_ALERT_REL1' => 'Module Associé:',
  'LBL_ALERT_REL2' => 'Module Associé au module Associé:',
  'LBL_NEXT_BUTTON' => 'Suivant',
  'LBL_PREVIOUS_BUTTON' => 'Précédent',
  'NTC_REMOVE_ALERT_USER' => 'Etes vous sûr de vouloir supprimer le Destinataire de l&#39;Alerte?',
  'LBL_REL_CUSTOM_STRING' => 'Sélectionner le champ pour l&#39;Email et le champ pour le Nom',
  'LBL_REL_CUSTOM' => 'Sélectionner le champ pour l&#39;Email:',
  'LBL_REL_CUSTOM2' => 'Champ',
  'LBL_AND' => 'et le champ utilisé pour le Nom:',
  'LBL_REL_CUSTOM3' => 'Champ',
  'LBL_FILTER_CUSTOM' => '(Filtre additionnel) Filtrer le module Associé par donnée spécifiée:',
  'LBL_FIELD' => 'Champ',
  'LBL_SPECIFIC_FIELD' => 'champ',
  'LBL_FILTER_BY' => '(Filtre additionnel) Filtrer le module Associé par',
  'LBL_MODULE_NAME_INVITE' => 'Liste d&#39;invités',
  'LBL_LIST_STATEMENT_INVITE' => 'Invités pour la Réunion/Appel:',
  'LBL_SELECT_VALUE' => 'Vous devez sélectionner une valeur valide.',
  'LBL_SELECT_NAME' => 'Vous devez choisir un champ personnalisé',
  'LBL_SELECT_EMAIL' => 'Vous devez choisir un champ Email personnalisé',
  'LBL_SELECT_FILTER' => 'Vous devez choisir un champ comme critère de filtre',
  'LBL_SELECT_NAME_EMAIL' => 'Vous devez choisir les champs nom et Email',
  'LBL_PLEASE_SELECT' => 'Veuillez faire votre sélection',
);

