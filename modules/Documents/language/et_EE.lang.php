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
  'LBL_HOMEPAGE_TITLE' => 'Minu dokumendid',
  'LBL_LIST_FILENAME' => 'Faili nimi',
  'LBL_DOC_ID' => 'Dokumendi allika ID',
  'LBL_DOC_TYPE' => 'Allikas',
  'LBL_LIST_DOC_TYPE' => 'Allikas',
  'LBL_DOC_TYPE_POPUP' => 'Select a source to which this document will be uploaded<br />and from which it will be available.',
  'LBL_DOC_URL' => 'Dokumendi allika URL',
  'LBL_SEARCH_EXTERNAL_DOCUMENT' => 'Dokumendi nimi',
  'LBL_ACCOUNTS_SUBPANEL_TITLE' => 'Ettevõtted',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontaktid',
  'LBL_OPPORTUNITIES_SUBPANEL_TITLE' => 'Müügivõimalused',
  'LBL_CASES_SUBPANEL_TITLE' => 'Juhtumid',
  'LBL_BUGS_SUBPANEL_TITLE' => 'Bugid',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Pakkumised',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Artiklid',
  'LBL_MIME' => 'Mime Type',
  'LBL_MODULE_NAME' => 'Dokumendid',
  'LBL_MODULE_TITLE' => 'Dokumendid: Avaleht',
  'LNK_NEW_DOCUMENT' => 'Loo dokument',
  'LNK_DOCUMENT_LIST' => 'Vaata dokumente',
  'LBL_DOC_REV_HEADER' => 'Dokumendi revisjonid',
  'LBL_SEARCH_FORM_TITLE' => 'Dokumendi otsing',
  'LBL_DOCUMENT_ID' => 'Dokumendi ID',
  'LBL_NAME' => 'Dokumendi nimi',
  'LBL_DESCRIPTION' => 'Kirjeldus',
  'LBL_CATEGORY' => 'Kategooria',
  'LBL_SUBCATEGORY' => 'Alamkategooria',
  'LBL_STATUS' => 'Olek',
  'LBL_CREATED_BY' => 'Looja:',
  'LBL_DATE_ENTERED' => 'Sisestamiskuupäev',
  'LBL_DATE_MODIFIED' => 'Muutmiskuupäev',
  'LBL_DELETED' => 'Kustutatud',
  'LBL_MODIFIED' => 'Muutja ID',
  'LBL_MODIFIED_USER' => 'Muutja',
  'LBL_CREATED' => 'Looja',
  'LBL_REVISIONS' => 'Revisjonid',
  'LBL_RELATED_DOCUMENT_ID' => 'Seotud dokumendi ID',
  'LBL_RELATED_DOCUMENT_REVISION_ID' => 'Seotud dokumendi revisjoni ID',
  'LBL_IS_TEMPLATE' => 'On mall',
  'LBL_TEMPLATE_TYPE' => 'Dokumendi tüüp',
  'LBL_ASSIGNED_TO_NAME' => 'Vastutaja:',
  'LBL_REVISION_NAME' => 'Revisjoni number',
  'LBL_REVISION' => 'Revisjon',
  'LBL_DOCUMENT' => 'Seotud dokument',
  'LBL_LATEST_REVISION' => 'Viimane revisjon',
  'LBL_CHANGE_LOG' => 'Muuda logi',
  'LBL_ACTIVE_DATE' => 'Avaldamiskuupäev',
  'LBL_EXPIRATION_DATE' => 'Aegumiskuupäev',
  'LBL_FILE_EXTENSION' => 'Faili laiendus',
  'LBL_LAST_REV_MIME_TYPE' => 'Viimase revsjoni MIME tüüp',
  'LBL_CAT_OR_SUBCAT_UNSPEC' => 'Määramata',
  'LBL_NEW_FORM_TITLE' => 'Uus dokument',
  'LBL_DOC_NAME' => 'Dokumendi nimi:',
  'LBL_FILENAME' => 'Faili nimi:',
  'LBL_DOC_VERSION' => 'Revisjon:',
  'LBL_CATEGORY_VALUE' => 'Kategooria:',
  'LBL_LIST_CATEGORY' => 'Kategooria',
  'LBL_SUBCATEGORY_VALUE' => 'Alamkategooria:',
  'LBL_DOC_STATUS' => 'Olek:',
  'LBL_LAST_REV_CREATOR' => 'Loodud läbivaatus:',
  'LBL_LASTEST_REVISION_NAME' => 'Viimase revisjoni nimi:',
  'LBL_SELECTED_REVISION_NAME' => 'Vali revisjoni nimi',
  'LBL_CONTRACT_STATUS' => 'Lepingu olek:',
  'LBL_CONTRACT_NAME' => 'Lepingu nimi:',
  'LBL_LAST_REV_DATE' => 'Revisjoni kuupäev:',
  'LBL_DOWNNLOAD_FILE' => 'Allalaetud fail:',
  'LBL_DET_RELATED_DOCUMENT' => 'Seotud dokument:',
  'LBL_DET_RELATED_DOCUMENT_VERSION' => 'Seotud dokumendi revision:',
  'LBL_DET_IS_TEMPLATE' => 'Mall?:',
  'LBL_DET_TEMPLATE_TYPE' => 'Dokumendi tüüp:',
  'LBL_TEAM' => 'Meeskond:',
  'LBL_DOC_DESCRIPTION' => 'Kirjeldus:',
  'LBL_DOC_ACTIVE_DATE' => 'Avaldamiskuupäev:',
  'LBL_DOC_EXP_DATE' => 'Aegumiskuupäev:',
  'LBL_LIST_FORM_TITLE' => 'Dokumendi loend',
  'LBL_LIST_DOCUMENT' => 'Dokument',
  'LBL_LIST_SUBCATEGORY' => 'Alamkategooria',
  'LBL_LIST_REVISION' => 'Revisjon',
  'LBL_LIST_LAST_REV_CREATOR' => 'Avaldatud',
  'LBL_LIST_LAST_REV_DATE' => 'Revisjoni kuupäev',
  'LBL_LIST_VIEW_DOCUMENT' => 'Vaade',
  'LBL_LIST_DOWNLOAD' => 'Lae alla',
  'LBL_LIST_ACTIVE_DATE' => 'Avaldamiskuupäev',
  'LBL_LIST_EXP_DATE' => 'Aegumiskuupäev',
  'LBL_LIST_STATUS' => 'Olek',
  'LBL_LINKED_ID' => 'Lingitud Is',
  'LBL_SELECTED_REVISION_ID' => 'Valitud revisjoni id',
  'LBL_LATEST_REVISION_ID' => 'Viimase revisjon id',
  'LBL_SELECTED_REVISION_FILENAME' => 'Valitud revisjoni failinimi',
  'LBL_FILE_URL' => 'Faili url',
  'LBL_REVISIONS_PANEL' => 'Revisjoni detailid',
  'LBL_REVISIONS_SUBPANEL' => 'Revisjonid',
  'LBL_SF_DOCUMENT' => 'Dokumendi nimi:',
  'LBL_SF_CATEGORY' => 'Kategooria:',
  'LBL_SF_SUBCATEGORY' => 'Alamkategooria:',
  'LBL_SF_ACTIVE_DATE' => 'Avaldamiskuupäev:',
  'LBL_SF_EXP_DATE' => 'Aegumiskuupäev:',
  'DEF_CREATE_LOG' => 'Dokument on loodud',
  'ERR_DOC_NAME' => 'Dokumendi nimi:',
  'ERR_DOC_ACTIVE_DATE' => 'Avaldamiskuupäev',
  'ERR_DOC_EXP_DATE' => 'Aegumiskuupäev',
  'ERR_FILENAME' => 'Faili nimi:',
  'ERR_DOC_VERSION' => 'Dokumendi versioon',
  'ERR_DELETE_CONFIRM' => 'Kas soovid selle dokumendi revisjoni kustutada?',
  'ERR_DELETE_LATEST_VERSION' => 'Sul pole lubatud kustutada viimast dokumendi versiooni.',
  'LNK_NEW_MAIL_MERGE' => 'Kirja mestimine',
  'LBL_MAIL_MERGE_DOCUMENT' => 'Kirja mestimise mall:',
  'LBL_TREE_TITLE' => 'Dokumendid',
  'LBL_LIST_DOCUMENT_NAME' => 'Dokumendi nimi:',
  'LBL_LIST_IS_TEMPLATE' => 'Mall?',
  'LBL_LIST_TEMPLATE_TYPE' => 'Dokumendi tüüp',
  'LBL_LIST_SELECTED_REVISION' => 'Valitud revisjon',
  'LBL_LIST_LATEST_REVISION' => 'Viimane revisjon',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Seotud lepingud',
  'LBL_LAST_REV_CREATE_DATE' => 'Viimase revisjoni loomiskuupäev',
  'LBL_CONTRACTS' => 'Lepingud',
  'LBL_CREATED_USER' => 'Loodud kasutaja',
  'LBL_THEREVISIONS_SUBPANEL_TITLE' => 'Revisjonid',
  'LBL_DOCUMENT_INFORMATION' => 'Dokumendi ülevaade',
);

