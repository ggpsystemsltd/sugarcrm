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
  'LBL_CURRENCY_NAME' => 'Nazwa waluty',
  'LBL_CURRENCY_SYMBOL' => 'Symbol waluty',
  'LBL_MODULE_NAME' => 'Sprzedaż',
  'LBL_MODULE_TITLE' => 'Sprzedaż: Strona główna',
  'LBL_SEARCH_FORM_TITLE' => 'Wyszukiwanie w sprzedaży',
  'LBL_VIEW_FORM_TITLE' => 'Widok sprzedaży',
  'LBL_LIST_FORM_TITLE' => 'Lista sprzedaży',
  'LBL_SALE_NAME' => 'Nazwa sprzedaży:',
  'LBL_SALE' => 'Sprzedaż:',
  'LBL_NAME' => 'Nazwa sprzedaży:',
  'LBL_LIST_SALE_NAME' => 'Nazwa',
  'LBL_LIST_ACCOUNT_NAME' => 'Nazwa klienta',
  'LBL_LIST_AMOUNT' => 'Kwota',
  'LBL_LIST_DATE_CLOSED' => 'Zamknięty',
  'LBL_LIST_SALE_STAGE' => 'Etap sprzedaży',
  'LBL_ACCOUNT_ID' => 'ID Klienta',
  'LBL_CURRENCY_ID' => 'ID Waluty',
  'LBL_TEAM_ID' => 'ID Zespołu',
  'UPDATE' => 'Sprzedaż - aktualizacja waluty',
  'UPDATE_DOLLARAMOUNTS' => 'Aktualizacja kwoty w Dolarach amerykańskich',
  'UPDATE_VERIFY' => 'Zweryfikuj kwoty',
  'UPDATE_VERIFY_TXT' => 'Sprawdza, czy wartości kwot w module sprzedaży są wyrażeniami dziesiętnymi, złożonymi wyłącznie ze znaków numerycznych (0-9) i dziesiętnych(.)',
  'UPDATE_FIX' => 'Popraw kwotowania',
  'UPDATE_FIX_TXT' => 'Przeprowadza próbę naprawy niewłaściwych kwot przez stworzenie prawidłowych wyrażeń dziesiętnych. Każda modyfikacja kwoty jest zachowana w bazie, w polu amount_backup. Jeśli wykonasz tę operację i pojawi się błąd, nie uruchamiaj jej ponownie, zanim nie zostaną przywrócone poprzednie wartości. Inaczej można spowodować nadpisanie danych błędnymi wartościami.',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'Uaktualnia kwoty w dolarach amerykańskich dla sprzedaży, na podstawie ustawionych obecnie kursów waluty. Ta wartość jest używana do wykreślania wykresow i Widoku listy kwot waluty.',
  'UPDATE_CREATE_CURRENCY' => 'Tworzę nową walutę:',
  'UPDATE_VERIFY_FAIL' => 'Rekord nie przeszedł weryfikacji:',
  'UPDATE_VERIFY_CURAMOUNT' => 'Bieżąca kwota:',
  'UPDATE_VERIFY_FIX' => 'Wykonanie naprawy powinno dać',
  'UPDATE_INCLUDE_CLOSE' => 'Również zamknięte rekordy',
  'UPDATE_VERIFY_NEWAMOUNT' => 'Nowa kwota:',
  'UPDATE_VERIFY_NEWCURRENCY' => 'Nowa waluta:',
  'UPDATE_DONE' => 'Wykonano',
  'UPDATE_BUG_COUNT' => 'Znaleziono błąd i podjęto próbę naprawy:',
  'UPDATE_BUGFOUND_COUNT' => 'Znaleziono błąd:',
  'UPDATE_COUNT' => 'Zaktualizowane rekordy:',
  'UPDATE_RESTORE_COUNT' => 'Przywrócono kwoty rekordów:',
  'UPDATE_RESTORE' => 'Przywróć kwoty',
  'UPDATE_RESTORE_TXT' => 'Przywróć wartości kwot z backupu podczas naprawy.',
  'UPDATE_FAIL' => 'Nie można zaktualizować -',
  'UPDATE_NULL_VALUE' => 'Jeśli kwota ma równać się 0, ustaw  NULL -',
  'UPDATE_MERGE' => 'Połącz waluty',
  'UPDATE_MERGE_TXT' => 'Łączenie różnych walut w jedną. Jeśli istnieją rózne rekordy dla tej samej waluty, możesz połączyć je razem. To spowoduje również połączenie tych walut w innych modułach.',
  'LBL_ACCOUNT_NAME' => 'Nazwa klienta:',
  'LBL_AMOUNT' => 'Kwota:',
  'LBL_AMOUNT_USDOLLAR' => 'Kwota w USD:',
  'LBL_CURRENCY' => 'Waluta:',
  'LBL_DATE_CLOSED' => 'Spodziewana data zakończenia:',
  'LBL_TYPE' => 'Typ:',
  'LBL_CAMPAIGN' => 'Kampania:',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Wizytówki',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projekty',
  'LBL_NEXT_STEP' => 'Następny krok:',
  'LBL_LEAD_SOURCE' => 'Źródła kontaktu:',
  'LBL_SALES_STAGE' => 'Etap sprzedaży:',
  'LBL_PROBABILITY' => 'Prawdopodobieństwo (%):',
  'LBL_DESCRIPTION' => 'Opis:',
  'LBL_DUPLICATE' => 'Możliwość duplikacji sprzedaży',
  'MSG_DUPLICATE' => 'Rekordy sprzedaży, które zamierzasz utworzyć mogą spowodować duplikację rekordów, które już istnieją. Rekordy sprzedaży, które zawierają podobne nazwy są wymienione poniżej.<br>kliknij Zachowaj, aby kontynuować tworzenie tej sprzedaży, lub klinij Skasuj, aby powrócić do modułu bez tworzenia sprzedaży.',
  'LBL_NEW_FORM_TITLE' => 'Utwórz nową sprzedaż',
  'LNK_NEW_SALE' => 'Utwórz sprzedaż',
  'LNK_SALE_LIST' => 'Sprzedaż',
  'ERR_DELETE_RECORD' => 'Musi być określony numer rekordu, aby usunąć tę sprzedaż.',
  'LBL_TOP_SALES' => 'Moje najlepsze otwarte sprzedaże',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'Czy na pewno chcesz usunąć ten kontakt ze sprzedaży?',
  'SALE_REMOVE_PROJECT_CONFIRM' => 'Czy na pewno chcesz usunąć tę sprzedaż z projektu?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Sprzedaż',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Działania',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Historia',
  'LBL_RAW_AMOUNT' => 'Wstępna Kwota',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakty',
  'LBL_ASSIGNED_TO_NAME' => 'Przydzielone do:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Użytkownik przydzielony',
  'LBL_MY_CLOSED_SALES' => 'Moje zamknięte sprzedaże',
  'LBL_TOTAL_SALES' => 'Wszystkie Sprzedaże',
  'LBL_CLOSED_WON_SALES' => 'Sprzedaże zakończone wygraną',
  'LBL_ASSIGNED_TO_ID' => 'Przydzielone do (ID)',
  'LBL_CREATED_ID' => 'Stworzone przez (ID)',
  'LBL_MODIFIED_ID' => 'Zmodyfikowane (ID)',
  'LBL_MODIFIED_NAME' => 'Nazwa użytkownika modyfikującego',
  'LBL_SALE_INFORMATION' => 'Informacje o sprzedaży',
);

