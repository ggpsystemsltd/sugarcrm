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
  'LBL_FILE_UPLOAD' => 'Plik:',
  'LBL_EXTERNAL_DOCUMENT_NOTE' => 'Lista 20 pierwszych ostatnio modyfikowanych plików jest wyświetlana w kolejności malejącej w liście poniżej. Używaj wyszukiwarki, aby znaleźć inne pliki.',
  'LBL_LIST_EXT_DOCUMENT_NAME' => 'Nazwa pliku',
  'LBL_STATUS' => 'Status',
  'LBL_DOC_STATUS' => 'Status:',
  'LBL_LIST_STATUS' => 'Status',
  'LBL_MODULE_NAME' => 'Dokumenty',
  'LBL_MODULE_TITLE' => 'Dokumenty: Strona główna',
  'LNK_NEW_DOCUMENT' => 'Utwórz dokument',
  'LNK_DOCUMENT_LIST' => 'Lista dokumentów',
  'LBL_DOC_REV_HEADER' => 'Wersja dokumentu',
  'LBL_SEARCH_FORM_TITLE' => 'Szukanie dokumentów',
  'LBL_DOCUMENT_ID' => 'ID dokumentu',
  'LBL_NAME' => 'Nazwa dokumentu',
  'LBL_DESCRIPTION' => 'Opis',
  'LBL_CATEGORY' => 'Kategoria',
  'LBL_SUBCATEGORY' => 'Podkategoria',
  'LBL_CREATED_BY' => 'Utworzony przez',
  'LBL_DATE_ENTERED' => 'Data wprowadzenia',
  'LBL_DATE_MODIFIED' => 'Data modyfikacji',
  'LBL_DELETED' => 'Usunięty',
  'LBL_MODIFIED' => 'Zmodyfikowany przez ID',
  'LBL_MODIFIED_USER' => 'Zmodyfikowany przez',
  'LBL_CREATED' => 'Utworzony przez',
  'LBL_REVISIONS' => 'Wersje',
  'LBL_RELATED_DOCUMENT_ID' => 'ID dokumentów połączonych',
  'LBL_RELATED_DOCUMENT_REVISION_ID' => 'ID wersji dokumentów połączonych',
  'LBL_IS_TEMPLATE' => 'Jest szablonem',
  'LBL_TEMPLATE_TYPE' => 'Typ dokumentu',
  'LBL_ASSIGNED_TO_NAME' => 'Przydzielone do:',
  'LBL_REVISION_NAME' => 'Numer wersji',
  'LBL_MIME' => 'Typ mime',
  'LBL_REVISION' => 'Wersja',
  'LBL_DOCUMENT' => 'Połączone dokumenty',
  'LBL_LATEST_REVISION' => 'Najnowsza wersja',
  'LBL_CHANGE_LOG' => 'Dziennik zmian',
  'LBL_ACTIVE_DATE' => 'Data publikacji',
  'LBL_EXPIRATION_DATE' => 'Data wyganiecia',
  'LBL_FILE_EXTENSION' => 'Rozszerzenie pliku',
  'LBL_LAST_REV_MIME_TYPE' => 'Ostatnia wersja typu MIME',
  'LBL_CAT_OR_SUBCAT_UNSPEC' => 'Niesprecyzowany',
  'LBL_HOMEPAGE_TITLE' => 'Moje dokumenty',
  'LBL_NEW_FORM_TITLE' => 'Nowy dokument',
  'LBL_DOC_NAME' => 'Nazwa dokumentu:',
  'LBL_FILENAME' => 'Nazwa pliku:',
  'LBL_LIST_FILENAME' => 'Nazwa pliku',
  'LBL_DOC_VERSION' => 'Wersja:',
  'LBL_CATEGORY_VALUE' => 'Kategoria:',
  'LBL_LIST_CATEGORY' => 'Kategoria',
  'LBL_SUBCATEGORY_VALUE' => 'Podkategoria:',
  'LBL_LAST_REV_CREATOR' => 'Wersja utworzona przez:',
  'LBL_LASTEST_REVISION_NAME' => 'Nazwa ostatniej wersji:',
  'LBL_SELECTED_REVISION_NAME' => 'Nazwa wybranej wersji:',
  'LBL_CONTRACT_STATUS' => 'Status kontraktu:',
  'LBL_CONTRACT_NAME' => 'Nazwa kontraktu:',
  'LBL_LAST_REV_DATE' => 'Data wersji:',
  'LBL_DOWNNLOAD_FILE' => 'Ściągnij plik:',
  'LBL_DET_RELATED_DOCUMENT' => 'Dokumenty połączone:',
  'LBL_DET_RELATED_DOCUMENT_VERSION' => 'Wersja dokumentów połaczonych:',
  'LBL_DET_IS_TEMPLATE' => 'Szkic? :',
  'LBL_DET_TEMPLATE_TYPE' => 'Typ dokumentu:',
  'LBL_TEAM' => 'Zespół:',
  'LBL_DOC_DESCRIPTION' => 'Opis:',
  'LBL_DOC_ACTIVE_DATE' => 'Data publikacji:',
  'LBL_DOC_EXP_DATE' => 'Data wygaśnięcia:',
  'LBL_LIST_FORM_TITLE' => 'Lista dokumentów',
  'LBL_LIST_DOCUMENT' => 'Dokument',
  'LBL_LIST_SUBCATEGORY' => 'Podkategoria',
  'LBL_LIST_REVISION' => 'Wersja',
  'LBL_LIST_LAST_REV_CREATOR' => 'Opublikowany przez',
  'LBL_LIST_LAST_REV_DATE' => 'Data wersji',
  'LBL_LIST_VIEW_DOCUMENT' => 'Podgląd',
  'LBL_LIST_DOWNLOAD' => 'Pobierz',
  'LBL_LIST_ACTIVE_DATE' => 'Data publikacji',
  'LBL_LIST_EXP_DATE' => 'Data wygaśnięcia',
  'LBL_LINKED_ID' => 'ID połączone',
  'LBL_SELECTED_REVISION_ID' => 'ID wybranej wersji',
  'LBL_LATEST_REVISION_ID' => 'ID ostatniej wersji',
  'LBL_SELECTED_REVISION_FILENAME' => 'Nazwa pliku wybranej wersji',
  'LBL_FILE_URL' => 'URL pliku',
  'LBL_REVISIONS_PANEL' => 'Szczegóły wersji',
  'LBL_REVISIONS_SUBPANEL' => 'Wersje',
  'LBL_SF_DOCUMENT' => 'Nazwa dokumentu:',
  'LBL_SF_CATEGORY' => 'Kategoria:',
  'LBL_SF_SUBCATEGORY' => 'Podkategoria:',
  'LBL_SF_ACTIVE_DATE' => 'Data publikacji:',
  'LBL_SF_EXP_DATE' => 'Data wygaśnięcia:',
  'DEF_CREATE_LOG' => 'Dokument utworzony przez',
  'ERR_DOC_NAME' => 'Nazwa dokumentu',
  'ERR_DOC_ACTIVE_DATE' => 'Data publikacji',
  'ERR_DOC_EXP_DATE' => 'Data wygaśniecia',
  'ERR_FILENAME' => 'Nazwa pliku',
  'ERR_DOC_VERSION' => 'Wersja dokumentu',
  'ERR_DELETE_CONFIRM' => 'Czy chcesz usunąć tę wersję dokumentu?',
  'ERR_DELETE_LATEST_VERSION' => 'Nie jesteś uprawiony do usunięcia najnowszej wersji dokumentu.',
  'LNK_NEW_MAIL_MERGE' => 'Scalanie poczty',
  'LBL_MAIL_MERGE_DOCUMENT' => 'Szablon scalania poczty:',
  'LBL_TREE_TITLE' => 'Dokumenty',
  'LBL_LIST_DOCUMENT_NAME' => 'Nazwa dokument',
  'LBL_LIST_IS_TEMPLATE' => 'Szkic?',
  'LBL_LIST_TEMPLATE_TYPE' => 'Typ dokumentu',
  'LBL_LIST_SELECTED_REVISION' => 'Wybrane wersje',
  'LBL_LIST_LATEST_REVISION' => 'Najnowsze wydanie',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Połączone kontrakty',
  'LBL_LAST_REV_CREATE_DATE' => 'Data utworzenia ostatniego wydania',
  'LBL_CONTRACTS' => 'Kontrakty',
  'LBL_CREATED_USER' => 'Użytkownik tworzący',
  'LBL_THEREVISIONS_SUBPANEL_TITLE' => 'Rewersje',
  'LBL_DOCUMENT_INFORMATION' => 'Przegląd dokumentu',
  'LBL_DOC_ID' => 'ID źródła dokumentu',
  'LBL_DOC_TYPE' => 'Źródło',
  'LBL_LIST_DOC_TYPE' => 'Źródło',
  'LBL_DOC_TYPE_POPUP' => 'Wybierz źródło, do którego ten dokument zostanie załadowany i, z którego będzie dostępny.',
  'LBL_DOC_URL' => 'URL źródła dokumentu',
  'LBL_SEARCH_EXTERNAL_DOCUMENT' => 'Nazwa dokumentu',
  'LBL_ACCOUNTS_SUBPANEL_TITLE' => 'Klienci',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakty',
  'LBL_OPPORTUNITIES_SUBPANEL_TITLE' => 'Okazje',
  'LBL_CASES_SUBPANEL_TITLE' => 'Sprawy',
  'LBL_BUGS_SUBPANEL_TITLE' => 'Błędy',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Kalkulacje',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Produkty',
);

