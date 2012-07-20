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
  'LBL_STATUS' => 'Status',
  'LBL_REVISION' => 'Revision',
  'LBL_DOC_VERSION' => 'Revision:',
  'LBL_DOC_STATUS' => 'Status:',
  'LBL_TEAM' => 'Team:',
  'LBL_LIST_REVISION' => 'Revision',
  'LBL_LIST_DOWNLOAD' => 'Download',
  'LBL_LIST_STATUS' => 'Status',
  'LBL_MODULE_NAME' => 'Dokumenter',
  'LBL_MODULE_TITLE' => 'Dokumenter: Startside',
  'LNK_NEW_DOCUMENT' => 'Opret dokument',
  'LNK_DOCUMENT_LIST' => 'Dokumentliste',
  'LBL_DOC_REV_HEADER' => 'Dokumentrevisioner',
  'LBL_SEARCH_FORM_TITLE' => 'Søg efter dokument',
  'LBL_DOCUMENT_ID' => 'Dokument-id',
  'LBL_NAME' => 'Dokumentnavn',
  'LBL_DESCRIPTION' => 'Beskrivelse',
  'LBL_CATEGORY' => 'Kategori',
  'LBL_SUBCATEGORY' => 'Underkategori',
  'LBL_CREATED_BY' => 'Oprettet af',
  'LBL_DATE_ENTERED' => 'Oprettet den',
  'LBL_DATE_MODIFIED' => 'Ændret den',
  'LBL_DELETED' => 'Slettet',
  'LBL_MODIFIED' => 'Ændret af id',
  'LBL_MODIFIED_USER' => 'Ændret af',
  'LBL_CREATED' => 'Oprettet af',
  'LBL_REVISIONS' => 'Revisioner',
  'LBL_RELATED_DOCUMENT_ID' => 'Relateret dokument-id',
  'LBL_RELATED_DOCUMENT_REVISION_ID' => 'Relateret dokumentrevisions-id',
  'LBL_IS_TEMPLATE' => 'Er en skabelon',
  'LBL_TEMPLATE_TYPE' => 'Dokumenttype',
  'LBL_ASSIGNED_TO_NAME' => 'Tildelt til:',
  'LBL_REVISION_NAME' => 'Revisionsnummer',
  'LBL_MIME' => 'Mime-type',
  'LBL_DOCUMENT' => 'Relateret dokument',
  'LBL_LATEST_REVISION' => 'Seneste revision',
  'LBL_CHANGE_LOG' => 'Ændringslog',
  'LBL_ACTIVE_DATE' => 'Udgivelsesdato',
  'LBL_EXPIRATION_DATE' => 'Udløbsdato',
  'LBL_FILE_EXTENSION' => 'Filtype',
  'LBL_LAST_REV_MIME_TYPE' => 'Sidste reviderede MIME type',
  'LBL_CAT_OR_SUBCAT_UNSPEC' => 'Uspecificeret',
  'LBL_HOMEPAGE_TITLE' => 'Mine dokumenter',
  'LBL_NEW_FORM_TITLE' => 'Nyt dokument',
  'LBL_DOC_NAME' => 'Dokumentnavn:',
  'LBL_FILENAME' => 'Filnavn:',
  'LBL_LIST_FILENAME' => 'Filnavn',
  'LBL_FILE_UPLOAD' => 'Fil:',
  'LBL_CATEGORY_VALUE' => 'Kategori:',
  'LBL_LIST_CATEGORY' => 'Kategori',
  'LBL_SUBCATEGORY_VALUE' => 'Underkategori:',
  'LBL_LAST_REV_CREATOR' => 'Revision oprettet af:',
  'LBL_LASTEST_REVISION_NAME' => 'Sidste revisionsnavn:',
  'LBL_SELECTED_REVISION_NAME' => 'Navn på valgt revision',
  'LBL_CONTRACT_STATUS' => 'Kontrakt status:',
  'LBL_CONTRACT_NAME' => 'Kontraktnavn:',
  'LBL_LAST_REV_DATE' => 'Revisionsdato:',
  'LBL_DOWNNLOAD_FILE' => 'Download fil:',
  'LBL_DET_RELATED_DOCUMENT' => 'Relateret dokument:',
  'LBL_DET_RELATED_DOCUMENT_VERSION' => 'Relateret dokumentrevision:',
  'LBL_DET_IS_TEMPLATE' => 'Skabelon? :',
  'LBL_DET_TEMPLATE_TYPE' => 'Dokumenttype:',
  'LBL_DOC_DESCRIPTION' => 'Beskrivelse:',
  'LBL_DOC_ACTIVE_DATE' => 'Udgivelsesdato:',
  'LBL_DOC_EXP_DATE' => 'Udløbsdato:',
  'LBL_LIST_FORM_TITLE' => 'Dokumentliste',
  'LBL_LIST_DOCUMENT' => 'Dokument',
  'LBL_LIST_SUBCATEGORY' => 'Underkategori',
  'LBL_LIST_LAST_REV_CREATOR' => 'Udgivet af',
  'LBL_LIST_LAST_REV_DATE' => 'Revisionsdato',
  'LBL_LIST_VIEW_DOCUMENT' => 'Vis',
  'LBL_LIST_ACTIVE_DATE' => 'Udgivelsesdato',
  'LBL_LIST_EXP_DATE' => 'Udløbsdato',
  'LBL_LINKED_ID' => 'Linket id',
  'LBL_SELECTED_REVISION_ID' => 'Vælg revision id',
  'LBL_LATEST_REVISION_ID' => 'Sidste revision id',
  'LBL_SELECTED_REVISION_FILENAME' => 'Valgt revision filnavn',
  'LBL_FILE_URL' => 'Fil-URL',
  'LBL_REVISIONS_PANEL' => 'Revision detaljer',
  'LBL_REVISIONS_SUBPANEL' => 'Revisioner',
  'LBL_SF_DOCUMENT' => 'Dokumentnavn:',
  'LBL_SF_CATEGORY' => 'Kategori:',
  'LBL_SF_SUBCATEGORY' => 'Underkategori:',
  'LBL_SF_ACTIVE_DATE' => 'Udgivelsesdato:',
  'LBL_SF_EXP_DATE' => 'Udløbsdato:',
  'DEF_CREATE_LOG' => 'Dokument oprettet',
  'ERR_DOC_NAME' => 'Dokumentnavn',
  'ERR_DOC_ACTIVE_DATE' => 'Udgivelsesdato',
  'ERR_DOC_EXP_DATE' => 'Udløbsdato',
  'ERR_FILENAME' => 'Filnavn',
  'ERR_DOC_VERSION' => 'Dokumentversion',
  'ERR_DELETE_CONFIRM' => 'Vil du slette denne dokumentrevision?',
  'ERR_DELETE_LATEST_VERSION' => 'Du har ikke tilladelse til at slette den seneste revision af et dokument.',
  'LNK_NEW_MAIL_MERGE' => 'Brevfletning',
  'LBL_MAIL_MERGE_DOCUMENT' => 'Brevfletningsskabelon:',
  'LBL_TREE_TITLE' => 'Dokumenter',
  'LBL_LIST_DOCUMENT_NAME' => 'Dokumentnavn',
  'LBL_LIST_IS_TEMPLATE' => 'Skabelon?',
  'LBL_LIST_TEMPLATE_TYPE' => 'Dokumenttype',
  'LBL_LIST_SELECTED_REVISION' => 'Valgt revision',
  'LBL_LIST_LATEST_REVISION' => 'Seneste revision',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Relaterede kontrakter',
  'LBL_LAST_REV_CREATE_DATE' => 'Seneste revisions oprettelsesdato',
  'LBL_CONTRACTS' => 'Kontrakter',
  'LBL_CREATED_USER' => 'Oprettet bruger',
  'LBL_THEREVISIONS_SUBPANEL_TITLE' => 'Genindlæsninger',
  'LBL_DOCUMENT_INFORMATION' => 'Dokument oversigt',
  'LBL_DOC_ID' => 'Dokument kilde id',
  'LBL_DOC_TYPE' => 'Kilde',
  'LBL_LIST_DOC_TYPE' => 'Kilde',
  'LBL_DOC_TYPE_POPUP' => 'Vælg en kilde, som dette dokument vil blive uploadet fra,<br />og hvorfra det vil være til rådighed.',
  'LBL_DOC_URL' => 'Dokument kilde URL',
  'LBL_SEARCH_EXTERNAL_DOCUMENT' => 'Dokumentnavn',
  'LBL_EXTERNAL_DOCUMENT_NOTE' => 'De 20 sidst modificeret filer i aftagende orden i listen nedenfor. Brug Søg for at finde andre filer.',
  'LBL_LIST_EXT_DOCUMENT_NAME' => 'Filnavn',
  'LBL_ACCOUNTS_SUBPANEL_TITLE' => 'Virksomheder',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakter',
  'LBL_OPPORTUNITIES_SUBPANEL_TITLE' => 'Salgsmuligheder',
  'LBL_CASES_SUBPANEL_TITLE' => 'Sager',
  'LBL_BUGS_SUBPANEL_TITLE' => 'Fejl',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Tilbud',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Produkter',
);

