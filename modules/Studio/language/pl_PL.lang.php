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
  'LBL_TAB_GROUP_LANGUAGE_HELP' => 'Wybierz dostępny język, edytuj etykiety grupy i kliknij Zapisz i Udostępnij, aby zastosować etykiety w wybranym języku.',
  'LBL_MODULE_TITLE' => 'Studio',
  'LBL_LABEL' => 'Label',
  'LBL_SW_SUGARPORTAL' => 'Sugar Portal',
  'LBL_EDIT_LAYOUT' => 'Edytuj wygląd',
  'LBL_EDIT_ROWS' => 'Edytuj wiersze',
  'LBL_EDIT_COLUMNS' => 'Edytuj kolumny',
  'LBL_EDIT_LABELS' => 'Edytuj etykiety',
  'LBL_EDIT_FIELDS' => 'Edytuj własne pola',
  'LBL_ADD_FIELDS' => 'Dodaj własne pola',
  'LBL_DISPLAY_HTML' => 'Wyświetl kod HTML',
  'LBL_SELECT_FILE' => 'Wybierz plik',
  'LBL_SAVE_LAYOUT' => 'Zapisz widok',
  'LBL_SELECT_A_SUBPANEL' => 'Wybierz subpanel',
  'LBL_SELECT_SUBPANEL' => 'Wybierz subpanel',
  'LBL_TOOLBOX' => 'Narzędzia',
  'LBL_STAGING_AREA' => 'Obszar roboczy (przeciągnij i upuść elementy tutaj)',
  'LBL_SUGAR_FIELDS_STAGE' => 'Pola Sugar (kliknij element aby dodać do Obszaru Roboczego)',
  'LBL_SUGAR_BIN_STAGE' => 'Skrzynka Sugar (kliknij element aby dodać do Obszaru Roboczego)',
  'LBL_VIEW_SUGAR_FIELDS' => 'Obejrzyj pola Sugar',
  'LBL_VIEW_SUGAR_BIN' => 'Obejrzyj skrzynkę Sugar',
  'LBL_FAILED_TO_SAVE' => 'Zapisywanie nie powiodło się.',
  'LBL_CONFIRM_UNSAVE' => 'Wszystkie zmiany nie zostały zapisane. Czy na pewno chcesz kontynuować?',
  'LBL_PUBLISHING' => 'Publikuję ...',
  'LBL_PUBLISHED' => 'Opublikowano',
  'LBL_FAILED_PUBLISHED' => 'Publikowanie nie powiodło się',
  'LBL_DROP_HERE' => '[Upuść tutaj]',
  'LBL_NAME' => 'Nazwa',
  'LBL_MASS_UPDATE' => 'Masowa aktualizacja',
  'LBL_AUDITED' => 'Audyt',
  'LBL_CUSTOM_MODULE' => 'Moduł',
  'LBL_DEFAULT_VALUE' => 'Wartość domyślna',
  'LBL_REQUIRED' => 'Wymagane',
  'LBL_DATA_TYPE' => 'Typ',
  'LBL_HISTORY' => 'Historia',
  'LBL_SW_WELCOME' => '<h2>Witamy w Studio!</h2><br> Co chciałbyś dziś zrobić?<br><b> Wybierz opcje poniżej.</b>',
  'LBL_SW_EDIT_MODULE' => 'Edytuj moduł',
  'LBL_SW_EDIT_DROPDOWNS' => 'Edytuj listy rozwijalne',
  'LBL_SW_EDIT_TABS' => 'Konfiguruj zakładki',
  'LBL_SW_RENAME_TABS' => 'Zmień nazwy zakładek',
  'LBL_SW_EDIT_GROUPTABS' => 'Konfiguruj grupy zakładek',
  'LBL_SW_EDIT_PORTAL' => 'Edytuj Portal',
  'LBL_SW_EDIT_WORKFLOW' => 'Edytuj prace do wykonania',
  'LBL_SW_REPAIR_CUSTOMFIELDS' => 'Napraw własne pola',
  'LBL_SW_MIGRATE_CUSTOMFIELDS' => 'Migruj własne pola',
  'LBL_SMW_WELCOME' => '<h2>Witamy w Studio!</h2><br><b> Wybierz moduł z listy poniżej.',
  'LBL_SMA_WELCOME' => '<h2>Edytuj moduł</h2>Co chciałbyś zrobić z tym modułem?<br> Wybierz, jakie działanie chcesz podjąć.',
  'LBL_SMA_EDIT_CUSTOMFIELDS' => 'Edtuj własne pola',
  'LBL_SMA_EDIT_LAYOUT' => 'Edtuj wyglad',
  'LBL_SMA_EDIT_LABELS' => 'Edtuj etykiety',
  'LBL_MB_PREVIEW' => 'Podgląd',
  'LBL_MB_RESTORE' => 'Przywróć',
  'LBL_MB_DELETE' => 'Usuń',
  'LBL_MB_COMPARE' => 'Porównaj',
  'LBL_MB_WELCOME' => '<h2>Historia</h2><br> Historia pozwala Ci na odejrzenie poprzedniej wersji edytowanego pliku, który obecnie edytujesz. Możesz porównać i przywrócić poprzednią wersję. Jeżeli przywrócisz poprzednią wersje, stanie się ona twoim edytowanym plikiem. Muszisz opublikować to, aby mogło być widziane przez wszystkich innych.<br> Co chcesz dzisiaj zrobić?<br><b> Wybierz jedną z opcji poniżej.</b>',
  'LBL_ED_CREATE_DROPDOWN' => 'Utwórz listę rozwijalną',
  'LBL_ED_WELCOME' => '<h2>Edytor listy rozwijalnej</h2><br><b>Możesz edytować istniejące Listy rozwijalne, lub utworzyć nowe.',
  'LBL_DROPDOWN_NAME' => 'Nazwa listy rozwijalnej:',
  'LBL_DROPDOWN_LANGUAGE' => 'Język listy rozwijalnej:',
  'LBL_TABGROUP_LANGUAGE' => 'Język:',
  'LBL_EC_WELCOME' => '<h2>Edytor własnych pól</h2><br><b>Możesz oglądać i edytować istniejące własne pola, tworzyć nowe, lub wyczyścić cache..',
  'LBL_EC_VIEW_CUSTOMFIELDS' => 'Zobacz własne pola',
  'LBL_EC_CREATE_CUSTOMFIELD' => 'Utwórz własne pole',
  'LBL_EC_CLEAR_CACHE' => 'Wyczyść cache',
  'LBL_SM_WELCOME' => '<h2>Historia</h2><br><b>Wybierz plik, który chcesz obejrzeć.</b>',
  'LBL_DD_DISPALYVALUE' => 'Wyświetl wartość',
  'LBL_DD_DATABASEVALUE' => 'Baza danych wartości',
  'LBL_DD_ALL' => 'Wszystko',
  'LBL_BTN_SAVE' => 'Zapisz',
  'LBL_BTN_SAVEPUBLISH' => 'Zapisz i publikuj',
  'LBL_BTN_HISTORY' => 'Historia',
  'LBL_BTN_NEXT' => 'Następny',
  'LBL_BTN_BACK' => 'Wróć',
  'LBL_BTN_ADDCOLS' => 'Dodaj kolumnę',
  'LBL_BTN_ADDROWS' => 'Dodaj wiersz',
  'LBL_BTN_UNDO' => 'Cofnij',
  'LBL_BTN_REDO' => 'Przywróć',
  'LBL_BTN_ADDCUSTOMFIELD' => 'Dodaj własne pole',
  'LBL_BTN_TABINDEX' => 'Edytuj kolejność zakładek',
  'LBL_TAB_SUBTABS' => 'Podzakładki',
  'LBL_MODULES' => 'Moduły',
  'LBL_MODULE_NAME' => 'Administracja',
  'LBL_CONFIGURE_GROUP_TABS' => 'Konfiguruj grupy zakładek',
  'LBL_GROUP_TAB_WELCOME' => 'Grupa zakładek wyglądu utworzona poniżej będzie używana, gdy użytkownik wybierze pogrupowane zakładki, zamiast zwykle używanego modułu zakładek w Moje konto >> Opcje wyglądu.',
  'LBL_RENAME_TAB_WELCOME' => 'Aby zmienić nazwę zakładki, kliknij na dowolną zakładkę, wyświetlisz jej zawartość w tabelce poniżej.',
  'LBL_DELETE_MODULE' => '&nbsp;Usuń&nbsp;Moduł',
  'LBL_DISPLAY_OTHER_TAB_HELP' => 'Wybierz, aby wyświetlić kartę \'Inny\' w pasku nawigacyjnym. Domyślnie, karta \'Inny\' wyświetla moduły nieuwzględnione w innych grupach.',
  'LBL_ADD_GROUP' => 'Dodaj grupę',
  'LBL_NEW_GROUP' => 'Nowa grupa',
  'LBL_RENAME_TABS' => 'Zmień nazwy zakładek',
  'LBL_DISPLAY_OTHER_TAB' => 'Wyświetl kartę \'Inny\'',
  'LBL_DEFAULT' => 'Domyślnie',
  'LBL_ADDITIONAL' => 'Dodatek',
  'LBL_AVAILABLE' => 'Dostępne',
  'LBL_LISTVIEW_DESCRIPTION' => 'Poniżej są wyświetlone trzy kolumny. Domyślna kolumna zawiera pola, które są domyślnie w widoku listy. Następna kolumna zawiera pola, które użytkownik może użyć do stworzenia własnego widoku, dostępne kolumny są kolumnami dostępnymi dla Ciebie, jako administratora, zarówno do dodania do domyślych, lub jako dodatkowe kolumny, dostępne dla Użytkowników - nie używane obecnie.',
  'LBL_LISTVIEW_EDIT' => 'Edytor widoku listy',
  'ERROR_ALREADY_EXISTS' => 'Pole już istnieje',
  'ERROR_INVALID_KEY_VALUE' => 'Błąd: Nieprawidłowa wartość klucza: [\']',
  'LBL_SMP_WELCOME' => 'Wybierz moduł, który chcesz edytować z listy poniżej',
  'LBL_SP_WELCOME' => 'Witamy w  Studio Portalu Sugar. Możesz albo wybrać moduł do edycji tutaj, albo zsynchronizować z inną instalacją.<br> Wybierz z listy poniżej.',
  'LBL_SP_SYNC' => 'Synchronizacja Portalu',
  'LBL_SYNCP_WELCOME' => 'Wprowadź adres URL do instalacji portalu, który chcesz uaktualnić i kliknij przycisk <b>Dalej</b>.<br> Zostaniesz przeniesiony do strony, na której podasz swój login i hasło.<br> Wprowadź swoje dane logowania do Sugar i naciśnij przycisk rozpocznij synchronizację.',
  'LBL_LISTVIEWP_DESCRIPTION' => 'Poniżej są dwie kolumny: Domyślna, która zawiera pola, które będą wyświetlone, oraz Dostępna , która zawiera pola, które nie będą wyświetlone, ale są dostępne do wyświetlenia. Przeciągnij pola pomiędzy obiema kolumnami. Możesz również zmienić kolejność elementów w kolumnie, korzystając z przeciągania.',
  'LBL_SP_STYLESHEET' => 'Przeładuj arkusz stylów',
  'LBL_SP_UPLOADSTYLE' => 'Kliknij na klawiszu przeglądania i wybierz arkusz stylów do załadowania z twojego komputera.<br> Przy następnej synchronizacji portalu arkusz stylów zostanie załadowany jednocześnie.',
  'LBL_SP_UPLOADED' => 'Załadowano',
  'ERROR_SP_UPLOADED' => 'Upewnij się, że załadowano arkusz stylów CSS.',
  'LBL_SP_PREVIEW' => 'Poniżej pokazano jak bedzie wyglądał Twój arkusz stylów',
);

