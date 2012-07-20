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
  'LBL_ID' => 'ID',
  'LBL_DESCRIPTION' => 'Description',
  'LBL_CATEGORIES' => 'Modules',
  'LBL_TIME_MINUTES' => 'Minutes',
  'LBL_TIME_MINUTE' => 'Minute',
  'LBL_LINK_TYPE_Image' => 'Image',
  'LBL_LINK_TYPE_YouTube' => 'YouTube&#153;',
  'LBL_TEAM' => 'Equipe',
  'LBL_TEAM_ID' => 'Equipe (ID)',
  'LBL_ASSIGNED_TO_ID' => 'Assigné à (ID)',
  'LBL_ASSIGNED_TO_NAME' => 'Assigné à',
  'LBL_DATE_ENTERED' => 'Date de Création',
  'LBL_DATE_MODIFIED' => 'Date de Modification',
  'LBL_MODIFIED' => 'Modifié par',
  'LBL_MODIFIED_ID' => 'Modifié par (ID)',
  'LBL_MODIFIED_NAME' => 'Modifié par',
  'LBL_CREATED' => 'Créé par',
  'LBL_CREATED_ID' => 'Créé par (ID)',
  'LBL_DELETED' => 'Supprimé',
  'LBL_NAME' => 'Nom',
  'LBL_SAVING' => 'Sauvegarde...',
  'LBL_SAVED' => 'Sauvé',
  'LBL_CREATED_USER' => 'Créé par l&#39;Utilisateur',
  'LBL_MODIFIED_USER' => 'Modifié par l&#39;Utilisateur',
  'LBL_LIST_FORM_TITLE' => 'Liste des Flux d&#39;activités internes',
  'LBL_MODULE_NAME' => 'Flux d&#39;activités internes',
  'LBL_MODULE_TITLE' => 'Flux d&#39;activités internes',
  'LBL_DASHLET_DISABLED' => 'Attention : Le module de Flux d&#39;activtés internes est désactivé, aucun nouveau flux ne peut être ajouté tant qu&#39;il n&#39;a pas été re-actvivé',
  'LBL_ADMIN_SETTINGS' => 'Paramètres du Flux d&#39;activités internes',
  'LBL_RECORDS_DELETED' => 'Toutes les entrées du Flux d&#39;activités internes ont été supprimées, si le Module de Flux d&#39;activités interne est activé, de nouvelles entrées seront ajoutées automatiquement.',
  'LBL_CONFIRM_DELETE_RECORDS' => 'Etes-vous sur de vouloir supprimer toutes les entrées du Flux d\\&#39;activités internes ?',
  'LBL_FLUSH_RECORDS' => 'Vider les entrées du Flux d&#39;activités internes',
  'LBL_ENABLE_FEED' => 'Activer les Flux d&#39;activités internes',
  'LBL_ENABLE_MODULE_LIST' => 'Flux d&#39;activités internes pour',
  'LBL_HOMEPAGE_TITLE' => 'Mon Flux d&#39;activités internes',
  'LNK_NEW_RECORD' => 'Créer un Flux d&#39;activités internes',
  'LNK_LIST' => 'Flux d&#39;activités internes',
  'LBL_SEARCH_FORM_TITLE' => 'Rechercher dans les Flux d&#39;activés internes',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Voir l&#39;Historique',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Activités',
  'LBL_SUGAR_FEED_SUBPANEL_TITLE' => 'Flux d&#39;activités internes',
  'LBL_NEW_FORM_TITLE' => 'Nouveau Flux d&#39;activités internes',
  'LBL_ALL' => 'Tous',
  'LBL_USER_FEED' => 'Flux Utilisateur',
  'LBL_ENABLE_USER_FEED' => 'Activer le Flux Utilisateur',
  'LBL_TO' => 'Envoyer à l&#39;équipe',
  'LBL_IS' => 'est',
  'LBL_DONE' => 'fait',
  'LBL_TITLE' => 'Titre',
  'LBL_ROWS' => 'Enregistrements',
  'LBL_MY_FAVORITES_ONLY' => 'Liés à mes favoris',
  'LBL_ENABLE_EXTERNAL_CONNECTORS' => '<i>Note: Afin de permettre à vos utilisateurs de voir les flux Facebook et Twitter, aller dans l&#39;écran de paramétrage des connecteurs afin des les activer.</i>',
  'LBL_TIME_LAST_WEEK' => 'Dernière Semaine',
  'LBL_TIME_WEEKS' => 'Semaines',
  'LBL_TIME_DAYS' => 'Jours',
  'LBL_TIME_YESTERDAY' => 'Hier',
  'LBL_TIME_HOURS' => 'Heures',
  'LBL_TIME_HOUR' => 'Heure',
  'LBL_TIME_SECONDS' => 'Secondes',
  'LBL_TIME_SECOND' => 'Seconde',
  'LBL_TIME_AGO' => 'plus tôt',
  'CREATED_CONTACT' => 'a créé un <b>NOUVEAU</b> contact',
  'CREATED_OPPORTUNITY' => 'a créé une <b>NOUVELLE</b> affaire',
  'CREATED_CASE' => 'a créé un <b>NOUVEAU</b> ticket',
  'CREATED_LEAD' => 'a créé un <b>NOUVEAU</b> lead',
  'FOR' => 'pour',
  'CLOSED_CASE' => 'a <b>CLOTURÉ</b> un Ticket',
  'CONVERTED_LEAD' => 'a <b>CONVERTI</b> un Lead',
  'WON_OPPORTUNITY' => 'a <b>GAGNÉ</b> l&#39;Affaire',
  'WITH' => 'lié à',
  'LBL_LINK_TYPE_Link' => 'Lien',
  'LBL_SELECT' => 'Sélectionner',
  'LBL_POST' => 'Poster',
  'LBL_EXTERNAL_PREFIX' => 'Externe :',
  'LBL_EXTERNAL_WARNING' => 'Les liens marqués comme "externe" requièrent un <a href="?module=EAPM">lien externe</a>.',
  'LBL_AUTHENTICATE' => 'Authentifier',
  'LBL_AUTHENTICATION_PENDING' => 'Certains des liens externes que vous avez sélectionné n&#39;ont pas été authentifiés. Cliquez sur &#39;Annuler&#39; pour revenir à la fenêtre Options afin d&#39;authentifier ces liens externes, ou cliquez sur &#39;OK&#39; pour continuer sans authentification.',
  'LBL_ADVANCED_SEARCH' => 'Recherche avancée',
  'LBL_BASICSEARCH' => 'Recherche rapide',
  'LBL_SHOW_MORE_OPTIONS' => 'Voir plus d&#39;options',
  'LBL_HIDE_OPTIONS' => 'Masquer options',
  'LBL_VIEW' => 'Affficher',
  'LBL_POST_TITLE' => 'Poster les mises à jour de statut pour',
  'LBL_URL_LINK_TITLE' => 'Lien URL à utiliser',
  'LBL_TEAM_VISIBILITY_TITLE' => 'Equipe pouvant voir ce post',
);

