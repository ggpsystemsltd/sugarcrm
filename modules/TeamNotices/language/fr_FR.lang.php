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
  'LBL_MORE_DETAIL' => 'Plus de détails',
  'LBL_URL' => 'URL',
  'LBL_LIST_DESCRIPTION' => 'Description',
  'LBL_DESCRIPTION' => 'Description',
  'dom_status' => 
  array (
    'Visible' => 'Visible',
    'Hidden' => 'Masqué',
  ),
  'LBL_MODULE_NAME' => 'Notification aux équipes',
  'LBL_MODULE_TITLE' => 'Notification aux équipes',
  'LBL_SEARCH_FORM_TITLE' => 'Rechercher une notification aux équipes',
  'LBL_LIST_FORM_TITLE' => 'Notifications aux équipes',
  'LBL_PRODUCTTYPE' => 'Notifications aux équipes:',
  'LBL_NOTICES' => 'Notifications aux équipes',
  'LBL_LIST_NAME' => 'Nom',
  'LBL_URL_TITLE' => 'Libéllé de l&#39;URL',
  'LBL_NAME' => 'Nom',
  'LBL_LIST_LIST_ORDER' => 'Ordre',
  'LBL_LIST_ORDER' => 'Ordre',
  'LBL_DATE_START' => 'Date de début',
  'LBL_DATE_END' => 'Date de fin',
  'LBL_STATUS' => 'Statut',
  'LNK_NEW_TEAM' => 'Nouvelle équipe',
  'LNK_NEW_TEAM_NOTICE' => 'Créer une notification aux équipes',
  'LNK_LIST_TEAM' => 'Equipes',
  'LNK_LIST_TEAMNOTICE' => 'Notification aux équipes',
  'LNK_PRODUCT_LIST' => 'Liste des Produits',
  'LNK_NEW_PRODUCT' => 'Nouveau Produit',
  'LNK_NEW_MANUFACTURER' => 'Fabricants',
  'LNK_NEW_SHIPPER' => 'Transporteurs',
  'LNK_NEW_PRODUCT_CATEGORY' => 'Catégories de produits',
  'LNK_NEW_PRODUCT_TYPE' => 'Types de produits',
  'NTC_DELETE_CONFIRMATION' => 'Etes-vous sûr(e) de vouloir supprimer cet enregistrement ?',
  'ERR_DELETE_RECORD' => 'Un numéro d&#39;enregistrement doit être spécifié pour toute suppression.',
  'NTC_LIST_ORDER' => 'Sélectionner l&#39;ordre dans lequel ce Type de Produit apparaîtra dans la liste de choix',
  'LBL_TEAM_NOTICE_FEATURES' => 'Fonctionnalités:<br />* Une nouvelle conception combinée à un assistant procurent une interface intuitive permettant de mieux guider l&#39;utilisateur tout au long de la création de rapports.<br />* Des ensembles de rapports complexes permettent aux utilisateurs de créer des rapports utilisant une logique avancée.<br />* Les rapports croisés dynamiques offre la possibilité de regrouper plusieurs attributs au sein d&#39;une mise en page modelable. Les utilisateurs peuvent créer des tables de pivot permettant d&#39;afficher des Sommes, Moyennes, Décompte et Pourcentage.<br />* Les filtres d&#39;environnement permettent aux utilisateurs de changer les attributs d&#39;un rapport en temps réel',
  'LBL_TEAM_NOTICE_WIRELESS' => 'La nouvelle vue Mobile pour SugarCRM met fin au dilemne entre mobilité et ergonomie<br />Fonctionnalités:<br />* Une meilleur interface fourni aux utilisateurs des vues édition, liste et enregistrements liés, couplé à la possibilité d&#39;accéder au répertoire Employé, enregistrer des préférences et voir les dernières action effectuées.<br />* L&#39;indépendance vis à vis de la platerforme permet aux utilisateurs d&#39;accéder à SugarCRM depuis n&#39;importe quel PDA ou Smartphone, y compris les Blackberry et Iphone.<br />* La technologie Client Riche permet une présentation élégante via un navigateur Internet classique.<br />* De nouvelles fonctionnalitées de recherche permettent de retrouver rapidement l&#39;information.',
  'LBL_TEAM_NOTICE_DATA_IMPORT' => 'Amélioration des imports facilitant les transferts de données entre SugarCRM et Excel, Act!, Miscrosoft Outlook, ou Salesforce.com.<br />Améliorations:<br />* Une meilleur interface de mapping propose plus d&#39;options pour améliorer l&#39;intégration des données externe au sein de SugarCRM.<br />* Des contrôles qualité permettent auc administrateurs de spécifier si l&#39;import doit créer de nouveaux enregistrements ou mettre à jour des enregistrements existants, réduisant ainsi le volume de données redondantes.<br />* Les imports dans tous les Modules offrent la possibilités d&#39;insérer l&#39;information d&#39;autres applications CRM dans n&#39;importe quel module.',
  'LBL_TEAM_NOTICE_MODULE_BUILDER' => 'Le Module Builder vous permet d&#39;adapter et développer SugarCRM de façon innovante.<br />Améliorations:<br />* Une nouvelle gestion des relations vous permet de relier les modules existant ou nouveaux.<br />* Les fonctions d&#39;audit permettent un historique complet de la création de modules afin de garder une trace des personnalisations.<br />* Les Dashlets permettent l&#39;affichage des modules personnalisés au sein de la page d&#39;accueil via AJAX.<br />* De nouveaux Templates permettent un suivi aisée de l&#39;information dans les fichiers.',
  'LBL_TEAM_NOTICE_TRACKER' => 'Le Suivi fournit maintenant une vue améliorée de l&#39;utilisation et des perfomances de SugarCRM.<br />Fonctionnalités:<br />* Les rapports du Suivi fournissent une photographie de l&#39;utilisation du système afin d&#39;améliorer la visibilité dans l&#39;utilisation du CRM. Les utilisateurs peuvent visualiser des rapports sur l&#39;activité Hebdomadaire, les enregistrements et les modules utilisés, les temps de Login cumulés et le status en ligne des membres des équipes.<br />* Le monitoring du système fournit aux administrateurs les informations concernant le système et les potentiels points critiques de l&#39;application',
);

