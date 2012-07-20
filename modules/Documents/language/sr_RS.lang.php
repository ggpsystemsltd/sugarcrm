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
  'LBL_DOC_STATUS' => 'Status:',
  'LBL_LIST_STATUS' => 'Status',
  'LBL_MODULE_NAME' => 'Dokumenta',
  'LBL_MODULE_TITLE' => 'Dokumenta: Početna strana',
  'LNK_NEW_DOCUMENT' => 'Kreiraj dokument',
  'LNK_DOCUMENT_LIST' => 'Prikaži dokumente',
  'LBL_DOC_REV_HEADER' => 'Revizije dokumenta',
  'LBL_SEARCH_FORM_TITLE' => 'Pretraga dokumenata',
  'LBL_DOCUMENT_ID' => 'ID broj dokumenta',
  'LBL_NAME' => 'Naziv dokumenta',
  'LBL_DESCRIPTION' => 'Opis',
  'LBL_CATEGORY' => 'Kategorija',
  'LBL_SUBCATEGORY' => 'Podkategorija',
  'LBL_CREATED_BY' => 'Autor',
  'LBL_DATE_ENTERED' => 'Datum kreiranja',
  'LBL_DATE_MODIFIED' => 'Datum izmene',
  'LBL_DELETED' => 'Obrisan',
  'LBL_MODIFIED' => 'ID broj korisnika koji je promenio',
  'LBL_MODIFIED_USER' => 'Promenio',
  'LBL_CREATED' => 'Autor',
  'LBL_REVISIONS' => 'Revizije',
  'LBL_RELATED_DOCUMENT_ID' => 'ID broj povezanog dokumenta',
  'LBL_RELATED_DOCUMENT_REVISION_ID' => 'ID broj revizije povezanog dokumenta',
  'LBL_IS_TEMPLATE' => 'Je šablon',
  'LBL_TEMPLATE_TYPE' => 'Tip dokumenta',
  'LBL_ASSIGNED_TO_NAME' => 'Dodeljeno:',
  'LBL_REVISION_NAME' => 'Broj revizije',
  'LBL_MIME' => 'MIME tip',
  'LBL_REVISION' => 'Revizija',
  'LBL_DOCUMENT' => 'Povezani dokument',
  'LBL_LATEST_REVISION' => 'Poslednja revizija',
  'LBL_CHANGE_LOG' => 'Dnevnik promena',
  'LBL_ACTIVE_DATE' => 'Datum objave',
  'LBL_EXPIRATION_DATE' => 'Datum isteka',
  'LBL_FILE_EXTENSION' => 'Ekstenzija fajla',
  'LBL_LAST_REV_MIME_TYPE' => 'MIME tip poslednje revizije',
  'LBL_CAT_OR_SUBCAT_UNSPEC' => 'Neodređena',
  'LBL_HOMEPAGE_TITLE' => 'Moja dokumenta',
  'LBL_NEW_FORM_TITLE' => 'Novi dokument',
  'LBL_DOC_NAME' => 'Naziv dokumenta:',
  'LBL_FILENAME' => 'Naziv fajla:',
  'LBL_LIST_FILENAME' => 'Fajl:',
  'LBL_DOC_VERSION' => 'Revizija:',
  'LBL_FILE_UPLOAD' => 'Fajl:',
  'LBL_CATEGORY_VALUE' => 'Kategorija:',
  'LBL_LIST_CATEGORY' => 'Kategorija',
  'LBL_SUBCATEGORY_VALUE' => 'Podkategorija:',
  'LBL_LAST_REV_CREATOR' => 'Autor revizije:',
  'LBL_LASTEST_REVISION_NAME' => 'Naziv poslednje revizije:',
  'LBL_SELECTED_REVISION_NAME' => 'Naziv odabrane revizije',
  'LBL_CONTRACT_STATUS' => 'Status ugovora:',
  'LBL_CONTRACT_NAME' => 'Naziv ugovora:',
  'LBL_LAST_REV_DATE' => 'Datum revizije:',
  'LBL_DOWNNLOAD_FILE' => 'Preuzmi fajl:',
  'LBL_DET_RELATED_DOCUMENT' => 'Povezani dokument:',
  'LBL_DET_RELATED_DOCUMENT_VERSION' => 'Revizija povezanog dokumenta:',
  'LBL_DET_IS_TEMPLATE' => 'Šablon? :',
  'LBL_DET_TEMPLATE_TYPE' => 'Tip dokumenta:',
  'LBL_TEAM' => 'Tim:',
  'LBL_DOC_DESCRIPTION' => 'Opis:',
  'LBL_DOC_ACTIVE_DATE' => 'Datum objave:',
  'LBL_DOC_EXP_DATE' => 'Datum isteka:',
  'LBL_LIST_FORM_TITLE' => 'Lista dokumenata',
  'LBL_LIST_DOCUMENT' => 'Dokument',
  'LBL_LIST_SUBCATEGORY' => 'Podkategorija',
  'LBL_LIST_REVISION' => 'Revizija',
  'LBL_LIST_LAST_REV_CREATOR' => 'Objavio',
  'LBL_LIST_LAST_REV_DATE' => 'Datum revizije',
  'LBL_LIST_VIEW_DOCUMENT' => 'Pregled',
  'LBL_LIST_DOWNLOAD' => 'Preuzmi',
  'LBL_LIST_ACTIVE_DATE' => 'Datum objave',
  'LBL_LIST_EXP_DATE' => 'Datum isteka',
  'LBL_LINKED_ID' => 'Id povezanog',
  'LBL_SELECTED_REVISION_ID' => 'Id izabrane revizije',
  'LBL_LATEST_REVISION_ID' => 'Id poslednje revizije',
  'LBL_SELECTED_REVISION_FILENAME' => 'Fajl izabrane revizije',
  'LBL_FILE_URL' => 'URL fajla',
  'LBL_REVISIONS_PANEL' => 'Detalji revizije',
  'LBL_REVISIONS_SUBPANEL' => 'Revizije',
  'LBL_SF_DOCUMENT' => 'Naziv dokumenta:',
  'LBL_SF_CATEGORY' => 'Kategorija:',
  'LBL_SF_SUBCATEGORY' => 'Podkategorija:',
  'LBL_SF_ACTIVE_DATE' => 'Datum objave:',
  'LBL_SF_EXP_DATE' => 'Datum isteka:',
  'DEF_CREATE_LOG' => 'Dokument kreiran',
  'ERR_DOC_NAME' => 'Naziv dokumenta',
  'ERR_DOC_ACTIVE_DATE' => 'Datum objave',
  'ERR_DOC_EXP_DATE' => 'Datum isteka',
  'ERR_FILENAME' => 'Naziv fajla',
  'ERR_DOC_VERSION' => 'Verzija dokumenta',
  'ERR_DELETE_CONFIRM' => 'Da li želite da obrišete ovu reviziju dokumenta?',
  'ERR_DELETE_LATEST_VERSION' => 'Niste ovlašćeni za brisanje poslednje revizije dokumenta.',
  'LNK_NEW_MAIL_MERGE' => 'Spajanje Email-ova',
  'LBL_MAIL_MERGE_DOCUMENT' => 'Šablon za spajanje pošte:',
  'LBL_TREE_TITLE' => 'Dokumenta',
  'LBL_LIST_DOCUMENT_NAME' => 'Naziv',
  'LBL_LIST_IS_TEMPLATE' => 'Šablon?',
  'LBL_LIST_TEMPLATE_TYPE' => 'Tip dokumenta',
  'LBL_LIST_SELECTED_REVISION' => 'Izabrana revizija',
  'LBL_LIST_LATEST_REVISION' => 'Poslednja revizija',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Povezani ugovori',
  'LBL_LAST_REV_CREATE_DATE' => 'Datum kreiranja poslednje revizije',
  'LBL_CONTRACTS' => 'Ugovori',
  'LBL_CREATED_USER' => 'Kreirao',
  'LBL_THEREVISIONS_SUBPANEL_TITLE' => 'Reviyije',
  'LBL_DOCUMENT_INFORMATION' => 'Pregled dokumenta',
  'LBL_DOC_ID' => 'ID broj izvora dokumenta',
  'LBL_DOC_TYPE' => 'Izvor',
  'LBL_LIST_DOC_TYPE' => 'Izvor',
  'LBL_DOC_TYPE_POPUP' => 'Izaberite izvor na koji će ovaj dokument biti poslat<br>i sa kod će biti dostupan.',
  'LBL_DOC_URL' => 'URL izvora dokumenta',
  'LBL_SEARCH_EXTERNAL_DOCUMENT' => 'Naziv fajla',
  'LBL_EXTERNAL_DOCUMENT_NOTE' => 'Prvih 20 najskorije izmenjenih fajlova se prikazuju u opadajućem redosledu na listi ispod. Koristite Pretragu za pronalaženje drugih fajlova.',
  'LBL_LIST_EXT_DOCUMENT_NAME' => 'Naziv fajla',
  'LBL_ACCOUNTS_SUBPANEL_TITLE' => 'Kompanije',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakti',
  'LBL_OPPORTUNITIES_SUBPANEL_TITLE' => 'Prodajne prilike',
  'LBL_CASES_SUBPANEL_TITLE' => 'Slučajevi',
  'LBL_BUGS_SUBPANEL_TITLE' => 'Defekti',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Ponude',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Proizvodi',
);

