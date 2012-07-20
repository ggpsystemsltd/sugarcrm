<?php

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





if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


	
$mod_strings = array (
  'LBL_LAST_REV_MIME_TYPE' => 'Senaste revideringen av MIME typ',
  'LBL_LASTEST_REVISION_NAME' => 'Senaste reviderings namn:',
  'LBL_SELECTED_REVISION_NAME' => 'Vald reviderings namn:',
  'LBL_CONTRACT_STATUS' => 'Kontrakt status:',
  'LBL_LINKED_ID' => 'Länkat id',
  'LBL_SELECTED_REVISION_ID' => 'Valt reviderings id',
  'LBL_LATEST_REVISION_ID' => 'Senaste reviderings id',
  'LBL_SELECTED_REVISION_FILENAME' => 'Valt reviderings filnamn',
  'LBL_FILE_URL' => 'Fil URL',
  'LBL_REVISIONS_PANEL' => 'Reviderings detaljer',
  'LBL_REVISIONS_SUBPANEL' => 'Revisioner',
  'LBL_CONTRACTS' => 'Kontrakt',
  'LBL_CREATED_USER' => 'Skapad användare',
  'LBL_THEREVISIONS_SUBPANEL_TITLE' => 'Revideringar',
  'LBL_DOCUMENT_INFORMATION' => 'Dokument översikt',
  'LBL_STATUS' => 'Status',
  'LBL_REVISION' => 'Revision',
  'LBL_DOC_VERSION' => 'Revision:',
  'LBL_DOC_STATUS' => 'Status:',
  'LBL_TEAM' => 'Team:',
  'LBL_LIST_REVISION' => 'Revision',
  'LBL_LIST_STATUS' => 'Status',
  'LBL_MODULE_NAME' => 'Dokument',
  'LBL_MODULE_TITLE' => 'Dokument: Hem',
  'LNK_NEW_DOCUMENT' => 'Skapa dokument',
  'LNK_DOCUMENT_LIST' => 'Lista dokument',
  'LBL_DOC_REV_HEADER' => 'Dokumentrevisioner',
  'LBL_SEARCH_FORM_TITLE' => 'Sök dokument',
  'LBL_DOCUMENT_ID' => 'Dokument Id',
  'LBL_NAME' => 'Namn på dokumentet',
  'LBL_DESCRIPTION' => 'Beskrivning',
  'LBL_CATEGORY' => 'Kategori',
  'LBL_SUBCATEGORY' => 'Subkategori',
  'LBL_CREATED_BY' => 'Skapad av',
  'LBL_DATE_ENTERED' => 'Skapat datum',
  'LBL_DATE_MODIFIED' => 'Redigeringsdatum',
  'LBL_DELETED' => 'Raderad',
  'LBL_MODIFIED' => 'Redigerad av id',
  'LBL_MODIFIED_USER' => 'Redigerad av',
  'LBL_CREATED' => 'Skapad av',
  'LBL_REVISIONS' => 'Revisioner',
  'LBL_RELATED_DOCUMENT_ID' => 'Relaterat dokument Id',
  'LBL_RELATED_DOCUMENT_REVISION_ID' => 'Relaterat revisionsdokument id',
  'LBL_IS_TEMPLATE' => 'Är en mall',
  'LBL_TEMPLATE_TYPE' => 'Dokument typ',
  'LBL_ASSIGNED_TO_NAME' => 'Tilldelad till:',
  'LBL_REVISION_NAME' => 'Revisionsnummer',
  'LBL_MIME' => 'Mime typ',
  'LBL_DOCUMENT' => 'Relaterat dokument',
  'LBL_LATEST_REVISION' => 'Senaste revisionen',
  'LBL_CHANGE_LOG' => 'Ändringslogg',
  'LBL_ACTIVE_DATE' => 'Publiceringsdatum',
  'LBL_EXPIRATION_DATE' => 'Utgångsdatum',
  'LBL_FILE_EXTENSION' => 'Filändelse',
  'LBL_CAT_OR_SUBCAT_UNSPEC' => 'Ospecificerat',
  'LBL_NEW_FORM_TITLE' => 'Nytt dokument',
  'LBL_DOC_NAME' => 'Namn på dokumentet:',
  'LBL_FILENAME' => 'Filnamn:',
  'LBL_CATEGORY_VALUE' => 'Kategori:',
  'LBL_SUBCATEGORY_VALUE' => 'Subkategori:',
  'LBL_LAST_REV_CREATOR' => 'Revision skapad av:',
  'LBL_CONTRACT_NAME' => 'Kontraktnamn:',
  'LBL_LAST_REV_DATE' => 'Revisionsdatum:',
  'LBL_DOWNNLOAD_FILE' => 'Ladda ner fil:',
  'LBL_DET_RELATED_DOCUMENT' => 'Relaterat dokument:',
  'LBL_DET_RELATED_DOCUMENT_VERSION' => 'Relaterat revisionsdokument:',
  'LBL_DET_IS_TEMPLATE' => 'Mall?:',
  'LBL_DET_TEMPLATE_TYPE' => 'Dokument typ:',
  'LBL_DOC_DESCRIPTION' => 'Beskrivning',
  'LBL_DOC_ACTIVE_DATE' => 'Publiceringsdatum:',
  'LBL_DOC_EXP_DATE' => 'Utgångsdatum:',
  'LBL_LIST_FORM_TITLE' => 'Lista dokument',
  'LBL_LIST_DOCUMENT' => 'Dokument',
  'LBL_LIST_CATEGORY' => 'Kategori',
  'LBL_LIST_SUBCATEGORY' => 'Subkategori',
  'LBL_LIST_LAST_REV_CREATOR' => 'Publicerad av',
  'LBL_LIST_LAST_REV_DATE' => 'Revisionsdatum',
  'LBL_LIST_VIEW_DOCUMENT' => 'Vy',
  'LBL_LIST_DOWNLOAD' => 'Ladda ner',
  'LBL_LIST_ACTIVE_DATE' => 'Publiceringsdatum',
  'LBL_LIST_EXP_DATE' => 'Utgångsdatum',
  'LBL_SF_DOCUMENT' => 'Namn på dokumentet:',
  'LBL_SF_CATEGORY' => 'Kategori:',
  'LBL_SF_SUBCATEGORY' => 'Subkategori:',
  'LBL_SF_ACTIVE_DATE' => 'Publiceringsdatum:',
  'LBL_SF_EXP_DATE' => 'Utgångsdatum:',
  'DEF_CREATE_LOG' => 'Dokument skapat',
  'ERR_DOC_NAME' => 'Namn på dokumentet',
  'ERR_DOC_ACTIVE_DATE' => 'Publiceringdatum',
  'ERR_DOC_EXP_DATE' => 'Utgångsdatum',
  'ERR_FILENAME' => 'Filnamn',
  'ERR_DOC_VERSION' => 'Dokumentversion',
  'ERR_DELETE_CONFIRM' => 'Önskar du radera dokumentets revision?',
  'ERR_DELETE_LATEST_VERSION' => 'Du saknar rättigheter för att radera den senaste revisionen av dokumentet.',
  'LNK_NEW_MAIL_MERGE' => 'Epost merge',
  'LBL_MAIL_MERGE_DOCUMENT' => 'Mall för epost merge',
  'LBL_TREE_TITLE' => 'Dokument',
  'LBL_LIST_DOCUMENT_NAME' => 'Namn på dokumentet',
  'LBL_LIST_IS_TEMPLATE' => 'Mall?',
  'LBL_LIST_TEMPLATE_TYPE' => 'Dokument typ',
  'LBL_LIST_SELECTED_REVISION' => 'Vald revision',
  'LBL_LIST_LATEST_REVISION' => 'Senaste revisionen',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Relaterade kontrakt',
  'LBL_LAST_REV_CREATE_DATE' => 'Senaste revisionens skapat datum',
);

