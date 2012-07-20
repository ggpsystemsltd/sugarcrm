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
  'LBL_MODULE_NAME' => 'Documents',
  'LBL_DESCRIPTION' => 'Description',
  'LBL_DOC_DESCRIPTION' => 'Description:',
  'LBL_LIST_DOCUMENT' => 'Document',
  'LBL_LINKED_ID' => 'Linked id',
  'LBL_TREE_TITLE' => 'Documents',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Contacts',
  'LBL_BUGS_SUBPANEL_TITLE' => 'Bugs',
  'LBL_MODULE_TITLE' => 'Documents',
  'LNK_NEW_DOCUMENT' => 'Créer Document',
  'LNK_DOCUMENT_LIST' => 'Liste des Documents',
  'LBL_DOC_REV_HEADER' => 'Versions de Document',
  'LBL_SEARCH_FORM_TITLE' => 'Rechercher un Document',
  'LBL_DOCUMENT_ID' => 'Ref Document',
  'LBL_NAME' => 'Nom Document',
  'LBL_CATEGORY' => 'Catégorie',
  'LBL_SUBCATEGORY' => 'Sous Catégorie',
  'LBL_STATUS' => 'Statut',
  'LBL_CREATED_BY' => 'Créé par',
  'LBL_DATE_ENTERED' => 'Date de création',
  'LBL_DATE_MODIFIED' => 'Date de modification',
  'LBL_DELETED' => 'Supprimé',
  'LBL_MODIFIED' => 'Modifié par (ID)',
  'LBL_MODIFIED_USER' => 'Modifié par',
  'LBL_CREATED' => 'Créé par',
  'LBL_REVISIONS' => 'Révisions',
  'LBL_RELATED_DOCUMENT_ID' => 'ID du document lié',
  'LBL_RELATED_DOCUMENT_REVISION_ID' => 'ID de la version du document lié',
  'LBL_IS_TEMPLATE' => 'Est un Modèle',
  'LBL_TEMPLATE_TYPE' => 'Type de Document',
  'LBL_ASSIGNED_TO_NAME' => 'Assigné à :',
  'LBL_REVISION_NAME' => 'Numéro de version',
  'LBL_MIME' => 'Type Mime',
  'LBL_REVISION' => 'Version',
  'LBL_DOCUMENT' => 'Document relatif',
  'LBL_LATEST_REVISION' => 'Derniére version',
  'LBL_CHANGE_LOG' => 'Description des modifications:',
  'LBL_ACTIVE_DATE' => 'Date de mise à disposition',
  'LBL_EXPIRATION_DATE' => 'Date expiration',
  'LBL_FILE_EXTENSION' => 'Extension du fichier',
  'LBL_LAST_REV_MIME_TYPE' => 'Dernière révision Type Mime',
  'LBL_CAT_OR_SUBCAT_UNSPEC' => 'Non-spécifié',
  'LBL_HOMEPAGE_TITLE' => 'Mes documents',
  'LBL_NEW_FORM_TITLE' => 'Nouveau Document',
  'LBL_DOC_NAME' => 'Nom du Document:',
  'LBL_FILENAME' => 'Nom du Fichier:',
  'LBL_LIST_FILENAME' => 'Nom du fichier',
  'LBL_DOC_VERSION' => 'Version:',
  'LBL_FILE_UPLOAD' => 'Fichier :',
  'LBL_CATEGORY_VALUE' => 'Catégorie',
  'LBL_LIST_CATEGORY' => 'Catégorie',
  'LBL_SUBCATEGORY_VALUE' => 'Sous Catégorie:',
  'LBL_DOC_STATUS' => 'Statut:',
  'LBL_LAST_REV_CREATOR' => 'Version initialisée par:',
  'LBL_LASTEST_REVISION_NAME' => 'Nom de la dernière révision:',
  'LBL_SELECTED_REVISION_NAME' => 'Nom de la révision sélectionné:',
  'LBL_CONTRACT_STATUS' => 'Statut Contrat:',
  'LBL_CONTRACT_NAME' => 'Nom du Contrat:',
  'LBL_LAST_REV_DATE' => 'Date version:',
  'LBL_DOWNNLOAD_FILE' => 'Fichier Téléchargeable:',
  'LBL_DET_RELATED_DOCUMENT' => 'Document relatif:',
  'LBL_DET_RELATED_DOCUMENT_VERSION' => 'Version du Document lié:',
  'LBL_DET_IS_TEMPLATE' => 'Modèle ? :',
  'LBL_DET_TEMPLATE_TYPE' => 'Type de Document:',
  'LBL_TEAM' => 'Equipe:',
  'LBL_DOC_ACTIVE_DATE' => 'Date de publication:',
  'LBL_DOC_EXP_DATE' => 'Date expiration:',
  'LBL_LIST_FORM_TITLE' => 'Liste des documents',
  'LBL_LIST_SUBCATEGORY' => 'Sous Catégorie',
  'LBL_LIST_REVISION' => 'Version',
  'LBL_LIST_LAST_REV_CREATOR' => 'Publié par',
  'LBL_LIST_LAST_REV_DATE' => 'Date version',
  'LBL_LIST_VIEW_DOCUMENT' => 'Afficher',
  'LBL_LIST_DOWNLOAD' => 'Téléchargement',
  'LBL_LIST_ACTIVE_DATE' => 'Date de mise à disposition',
  'LBL_LIST_EXP_DATE' => 'Date expiration',
  'LBL_LIST_STATUS' => 'Statut',
  'LBL_SELECTED_REVISION_ID' => 'ID de la révision sélectionné',
  'LBL_LATEST_REVISION_ID' => 'ID de la dernière révision',
  'LBL_SELECTED_REVISION_FILENAME' => 'Nom du fichier de la révision sélectionné',
  'LBL_FILE_URL' => 'URL Fichier',
  'LBL_REVISIONS_PANEL' => 'Détails Révisions',
  'LBL_REVISIONS_SUBPANEL' => 'Révisions',
  'LBL_SF_DOCUMENT' => 'Nom du Document:',
  'LBL_SF_CATEGORY' => 'Catégorie',
  'LBL_SF_SUBCATEGORY' => 'Sous Catégorie:',
  'LBL_SF_ACTIVE_DATE' => 'Date de publication:',
  'LBL_SF_EXP_DATE' => 'Date expiration:',
  'DEF_CREATE_LOG' => 'Document créé',
  'ERR_DOC_NAME' => 'Nom Document',
  'ERR_DOC_ACTIVE_DATE' => 'Date de mise à disposition',
  'ERR_DOC_EXP_DATE' => 'Date expiration',
  'ERR_FILENAME' => 'Nom Fichier',
  'ERR_DOC_VERSION' => 'Version du Document',
  'ERR_DELETE_CONFIRM' => 'Voulez vous effacer cette version du document?',
  'ERR_DELETE_LATEST_VERSION' => 'Vous n&#39;êtes pas autorisé à effacer la dernière version d&#39;un document.',
  'LNK_NEW_MAIL_MERGE' => 'Publipostage',
  'LBL_MAIL_MERGE_DOCUMENT' => 'Modèle utilisable dans un publipostage:',
  'LBL_LIST_DOCUMENT_NAME' => 'Nom Document',
  'LBL_LIST_IS_TEMPLATE' => 'Modèle ?',
  'LBL_LIST_TEMPLATE_TYPE' => 'Type de Document',
  'LBL_LIST_SELECTED_REVISION' => 'Version sélectionnée',
  'LBL_LIST_LATEST_REVISION' => 'Derniére version',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Contrats relatifs',
  'LBL_LAST_REV_CREATE_DATE' => 'Date de dernière Révision Créée',
  'LBL_CONTRACTS' => 'Contrats',
  'LBL_CREATED_USER' => 'Créé par',
  'LBL_THEREVISIONS_SUBPANEL_TITLE' => 'Révisions',
  'LBL_DOCUMENT_INFORMATION' => 'Informations Document',
  'LBL_DOC_ID' => 'ID du document orignal',
  'LBL_DOC_TYPE' => 'Origine',
  'LBL_LIST_DOC_TYPE' => 'Origine',
  'LBL_DOC_TYPE_POPUP' => 'Sélectionner la source vers laquelle ce document sera envoyé et à partir de laquelle il sera disponible',
  'LBL_DOC_URL' => 'URL du document orignal',
  'LBL_SEARCH_EXTERNAL_DOCUMENT' => 'Nom du document',
  'LBL_EXTERNAL_DOCUMENT_NOTE' => 'Les 20 premiers fichiers les plus récemment modifiés sont affichés dans l&#39;ordre décroissant ci-dessous. Utilisez la recherche pour trouver d&#39;autres fichiers.',
  'LBL_LIST_EXT_DOCUMENT_NAME' => 'Nom du fichier',
  'LBL_ACCOUNTS_SUBPANEL_TITLE' => 'Comptes',
  'LBL_OPPORTUNITIES_SUBPANEL_TITLE' => 'Affaires',
  'LBL_CASES_SUBPANEL_TITLE' => 'Tickets',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Devis',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Produits',
);

