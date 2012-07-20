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
  'LBL_HOMEPAGE_TITLE' => 'Meine Dokumente',
  'LBL_LIST_FILENAME' => 'Anhang',
  'LBL_FILE_UPLOAD' => 'Anhang',
  'LBL_DOC_ID' => 'Dokument Quell-ID',
  'LBL_DOC_TYPE' => 'Quelle',
  'LBL_LIST_DOC_TYPE' => 'Quelle',
  'LBL_DOC_TYPE_POPUP' => 'Ein Quelle auswählen, woher das Dokument hochgeladen werden soll.',
  'LBL_DOC_URL' => 'Dokument Quell-URL',
  'LBL_SEARCH_EXTERNAL_DOCUMENT' => 'Dateiname',
  'LBL_EXTERNAL_DOCUMENT_NOTE' => 'Die letzte 20 veränderte Dateien werden absteigend aufgelistet. Bitte die Suchfunktion verwenden, um andere Dateien zu finden.',
  'LBL_LIST_EXT_DOCUMENT_NAME' => 'Dateiname',
  'LBL_ACCOUNTS_SUBPANEL_TITLE' => 'Firmen',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakte',
  'LBL_OPPORTUNITIES_SUBPANEL_TITLE' => 'Verkaufschancen',
  'LBL_CASES_SUBPANEL_TITLE' => 'Tickets',
  'LBL_BUGS_SUBPANEL_TITLE' => 'Fehler',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Angebote',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Produkte',
  'LBL_STATUS' => 'Status',
  'LBL_DOC_STATUS' => 'Status:',
  'LBL_TEAM' => 'Team:',
  'LBL_LIST_STATUS' => 'Status',
  'LBL_MODULE_NAME' => 'Dokumente',
  'LBL_MODULE_TITLE' => 'Dokumente: Home',
  'LNK_NEW_DOCUMENT' => 'Neues Dokument',
  'LNK_DOCUMENT_LIST' => 'Dokumente Liste',
  'LBL_DOC_REV_HEADER' => 'Dokument Versionen',
  'LBL_SEARCH_FORM_TITLE' => 'Dokumente Suche',
  'LBL_DOCUMENT_ID' => 'Dokument ID',
  'LBL_NAME' => 'Dokument Name',
  'LBL_DESCRIPTION' => 'Beschreibung',
  'LBL_CATEGORY' => 'Kategorie',
  'LBL_SUBCATEGORY' => 'Unterkategorie',
  'LBL_CREATED_BY' => 'Erstellt von:',
  'LBL_DATE_ENTERED' => 'Datum erstellt',
  'LBL_DATE_MODIFIED' => 'Geändert am',
  'LBL_DELETED' => 'Gelöscht',
  'LBL_MODIFIED' => 'Geändert von ID',
  'LBL_MODIFIED_USER' => 'Geändert von',
  'LBL_CREATED' => 'Erstellt von:',
  'LBL_REVISIONS' => 'Versionen',
  'LBL_RELATED_DOCUMENT_ID' => 'Verknüpfte Dokumenten ID',
  'LBL_RELATED_DOCUMENT_REVISION_ID' => 'Verknüpfte Dokumentversions ID',
  'LBL_IS_TEMPLATE' => 'Ist ein Template',
  'LBL_TEMPLATE_TYPE' => 'Dokumententyp',
  'LBL_ASSIGNED_TO_NAME' => 'Zugewiesen an:',
  'LBL_REVISION_NAME' => 'Versionsnummer',
  'LBL_MIME' => 'Mime-Typ',
  'LBL_REVISION' => 'Version',
  'LBL_DOCUMENT' => 'Verknüpftes Dokument',
  'LBL_LATEST_REVISION' => 'Letzte Version',
  'LBL_CHANGE_LOG' => 'Änderungs-Log:',
  'LBL_ACTIVE_DATE' => 'Veröffentlichungsdatum',
  'LBL_EXPIRATION_DATE' => 'Ablaufdatum',
  'LBL_FILE_EXTENSION' => 'Dateiendung',
  'LBL_LAST_REV_MIME_TYPE' => 'Letzte Revision - MIME Type',
  'LBL_CAT_OR_SUBCAT_UNSPEC' => 'Unspezifisch',
  'LBL_NEW_FORM_TITLE' => 'Neues Dokument',
  'LBL_DOC_NAME' => 'Dokument Name:',
  'LBL_FILENAME' => 'Dateiname:',
  'LBL_DOC_VERSION' => 'Version:',
  'LBL_CATEGORY_VALUE' => 'Kategorie',
  'LBL_LIST_CATEGORY' => 'Kategorie',
  'LBL_SUBCATEGORY_VALUE' => 'Unterkategorie:',
  'LBL_LAST_REV_CREATOR' => 'Version erstellt von:',
  'LBL_LASTEST_REVISION_NAME' => 'Letzter Revisionsname',
  'LBL_SELECTED_REVISION_NAME' => 'Ausgewählter Revisionsname',
  'LBL_CONTRACT_STATUS' => 'Vertragsstatus:',
  'LBL_CONTRACT_NAME' => 'Vertragsname:',
  'LBL_LAST_REV_DATE' => 'Versionsdatum:',
  'LBL_DOWNNLOAD_FILE' => 'Download Datei:',
  'LBL_DET_RELATED_DOCUMENT' => 'Verknüpftes Dokument:',
  'LBL_DET_RELATED_DOCUMENT_VERSION' => 'Verknüpfte Version dieses Dokuments:',
  'LBL_DET_IS_TEMPLATE' => 'Vorlage? :',
  'LBL_DET_TEMPLATE_TYPE' => 'Dokumenttyp:',
  'LBL_DOC_DESCRIPTION' => 'Beschreibung:',
  'LBL_DOC_ACTIVE_DATE' => 'Veröffentlichungsdatum:',
  'LBL_DOC_EXP_DATE' => 'Ablaufdatum:',
  'LBL_LIST_FORM_TITLE' => 'Dokumente Liste',
  'LBL_LIST_DOCUMENT' => 'Dokument',
  'LBL_LIST_SUBCATEGORY' => 'Unterkategorie',
  'LBL_LIST_REVISION' => 'Version',
  'LBL_LIST_LAST_REV_CREATOR' => 'Veröffentlicht von',
  'LBL_LIST_LAST_REV_DATE' => 'Versionsdatum',
  'LBL_LIST_VIEW_DOCUMENT' => 'Ansicht',
  'LBL_LIST_DOWNLOAD' => 'Herunterladen',
  'LBL_LIST_ACTIVE_DATE' => 'Veröffentlichungsdatum',
  'LBL_LIST_EXP_DATE' => 'Ablaufdatum',
  'LBL_LINKED_ID' => 'verlinkte ID',
  'LBL_SELECTED_REVISION_ID' => 'ausgewählte RevisionsID',
  'LBL_LATEST_REVISION_ID' => 'letzte RevisionsID',
  'LBL_SELECTED_REVISION_FILENAME' => 'Ausgewählter Revision Dateiname',
  'LBL_FILE_URL' => 'Datei URL',
  'LBL_REVISIONS_PANEL' => 'Revisions Details',
  'LBL_REVISIONS_SUBPANEL' => 'Versionen',
  'LBL_SF_DOCUMENT' => 'Dokument Name:',
  'LBL_SF_CATEGORY' => 'Kategorie',
  'LBL_SF_SUBCATEGORY' => 'Unterkategorie:',
  'LBL_SF_ACTIVE_DATE' => 'Veröffentlichungsdatum:',
  'LBL_SF_EXP_DATE' => 'Ablaufdatum:',
  'DEF_CREATE_LOG' => 'Dokument erstellt:',
  'ERR_DOC_NAME' => 'Dokument Name',
  'ERR_DOC_ACTIVE_DATE' => 'Veröffentlichungsdatum',
  'ERR_DOC_EXP_DATE' => 'Ablaufdatum',
  'ERR_FILENAME' => 'Dateiname',
  'ERR_DOC_VERSION' => 'Dokument-Version',
  'ERR_DELETE_CONFIRM' => 'Möchten Sie diese Dokumentversion löschen?',
  'ERR_DELETE_LATEST_VERSION' => 'Die letzte Version eines Dokuments kann nicht gelöscht werden.',
  'LNK_NEW_MAIL_MERGE' => 'Serienbrief',
  'LBL_MAIL_MERGE_DOCUMENT' => 'Serienbrief-Vorlage:',
  'LBL_TREE_TITLE' => 'Dokumente',
  'LBL_LIST_DOCUMENT_NAME' => 'Dokument Name',
  'LBL_LIST_IS_TEMPLATE' => 'Vorlage?',
  'LBL_LIST_TEMPLATE_TYPE' => 'Dokumententyp',
  'LBL_LIST_SELECTED_REVISION' => 'Gewählte Version',
  'LBL_LIST_LATEST_REVISION' => 'Letzte Version',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Verknüpfte Kontakte',
  'LBL_LAST_REV_CREATE_DATE' => 'Erstellungsdatum Letzte Version',
  'LBL_CONTRACTS' => 'Verträge',
  'LBL_CREATED_USER' => 'Erstellter Benutzer',
  'LBL_THEREVISIONS_SUBPANEL_TITLE' => 'Versionen',
  'LBL_DOCUMENT_INFORMATION' => 'Übersicht Dokumente',
);

