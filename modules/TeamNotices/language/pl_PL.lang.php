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
  'LBL_TEAM_NOTICE_MODULE_BUILDER' => 'Kreator modułów pozwala poszerzać nowymi i innowacyjnymi sposobami zakres SugarCRM. Usprawnienia: * Nowe związki pozwalają na powiązanie nowymi sposobami nowych i istniejących modułów. * Audytowanie oferuje kompletną historię tworzenia modułów i modyfikacji, aby śledzić indywidualizacje. * Wsparcie narzędzi pozwala na wyświetlanie niestandardowych obiektów i funkcjonalności modułów w kontenerach AJAX na stronie głównej. * Nowe szablony oferują możliwość łatwego znajdywania plików i informacji okazji.',
  'LBL_TEAM_NOTICE_TRACKER' => 'Tropiciel oferuje teraz rozszerzony widok na użytkowanie i wydajność SugarCRM. Właściwości: * Raporty tropiciela dostarczają migawkę użytkowania systemu w celu zwiększenia adaptacji użytkownika i widoczności utylizacji CRM. Użytkownicy mogą zobaczyć raporty o tygodniowych działaniach CRM, rekordach i oglądanych modułach, łącznym czasie logowania i statusach online członków innych zespołów. * Monitoring systemu dostarcza administratorom informacji w jaki sposób system jest używany i odnośnie potencjalnych potrzeb dla aplikacji.',
  'LBL_URL' => 'URL',
  'LBL_STATUS' => 'Status',
  'LBL_MODULE_NAME' => 'Powiadomienia dla zespołów',
  'LBL_MODULE_TITLE' => 'Powiadomienia dla zespołów: Strona główna',
  'LBL_SEARCH_FORM_TITLE' => 'Wyszukiwanie powiadomień dla zespołów',
  'LBL_LIST_FORM_TITLE' => 'Lista powiadomień dla zespołów',
  'LBL_PRODUCTTYPE' => 'Powiadomienie dla zespołu',
  'LBL_NOTICES' => 'Powiadomienia dla zespołów',
  'LBL_LIST_NAME' => 'Tytuł',
  'LBL_URL_TITLE' => 'Tytuł URL',
  'LBL_LIST_DESCRIPTION' => 'Opis',
  'LBL_NAME' => 'Tytuł',
  'LBL_DESCRIPTION' => 'Opis',
  'LBL_LIST_LIST_ORDER' => 'Kolejność',
  'LBL_LIST_ORDER' => 'Kolejność',
  'LBL_DATE_START' => 'Data rozpoczęcia',
  'LBL_DATE_END' => 'Data zakończenia',
  'LNK_NEW_TEAM' => 'Utwórz zespół',
  'LNK_NEW_TEAM_NOTICE' => 'Utwórz powiadomienie dla zespołu',
  'LNK_LIST_TEAM' => 'Zespoły',
  'LNK_LIST_TEAMNOTICE' => 'Powiadomienia dla zespołów',
  'LNK_PRODUCT_LIST' => 'Produkty z cennika',
  'LNK_NEW_PRODUCT' => 'Utwórz produkt',
  'LNK_NEW_MANUFACTURER' => 'Producenci',
  'LNK_NEW_SHIPPER' => 'Dostawcy transportu',
  'LNK_NEW_PRODUCT_CATEGORY' => 'Kategorie produktów',
  'LNK_NEW_PRODUCT_TYPE' => 'Lista typów produktów',
  'NTC_DELETE_CONFIRMATION' => 'Czy na pewno chcesz usunąć ten rekord?',
  'ERR_DELETE_RECORD' => 'Musisz określić numer rekordu, aby usunąć ten typ produktu.',
  'NTC_LIST_ORDER' => 'Ustaw kolejność, w której ten typ pojawi się w rozwijanej liście typów produktów',
  'LBL_TEAM_NOTICE_FEATURES' => 'Właściwości:* Udoskonalony interfejs użytkownika i nowy kreator łączą prostą, intuicyjną konstrukcję razem z przewodnikiem mającym na celu przeprowadzenie użytkownika przez proces tworzenia raportów.* Kompleksowe zestawy raportowania pozwalają użytkownikom, używając kompleksowej logiki, tworzyć raporty z wielu modułów.* Raporty matrycowe oferują możliwość grupowania według kilku atrybutów w elastycznym układzie siatki. Użytkownicy mogą utworzyć złożone tabele przestawne z możliwością wyświetlenia operacji, takich jak: suma, średnia, ilość i procenty.* Filtry w czasie wykonywania procesu pozwalają użytkownikom zmieniać atrybuty  raportu w czasie rzeczywistym',
  'LBL_TEAM_NOTICE_WIRELESS' => 'Nowy mobilny widok dla aplikacji SugarCRM łamie kompromis między użytecznością i mobilnością. Cechy: * Ulepszony interfejs użytkownika zapewnia użytkownikom wgląd w edycję, szczegóły, widoki list, i powiązane rekordy, a także możliwość dostępu do katalogu pracowników, przechowywania preferencji i przeglądania ostatnich pozycji. * Device Independence pozwala użytkownikom przeglądać danych  SugarCRM z dowolnego PDA lub smartphona, w tym BlackBerry i iPhone. * Bogaty HTML Client zapewnia przejrzystą prezentację danych SugarCRM poprzez standardową przeglądarkę internetową. * Nowe możliwości wyszukiwania pozwalają użytkownikom na szybkie znajdowanie informacji.',
  'LBL_TEAM_NOTICE_DATA_IMPORT' => 'Usprawnienia importowania danych ułatwiają przenoszenie danych z takich aplikacji jak Excel, Act!, Microsoft Outlook i Salesforce.com do aplikacji SugarCRM. Usprawnienia: * Udoskonalony interfejs użytkownika do mapowania oferuje więcej opcji do zapewnienia, że transfer danych do SugarCRM jest wykonany płynnie i precyzyjnie. * Kontrola jakości danych pozwala administratorom określać czy importowanie danych powinno prowadzić do utworzenia nowych rekordów czy aktualizacji już istniejących rekordów, redukując tym samym duplikację informacji. * Importowanie do wszystkich modułów oferuje możliwość to przeniesienia informacji z innej aplikacji CRM do jakiegokolwiek modułu, redukując tym samym ponowne wprowadzania danych.',
  'dom_status' => 
  array (
    'Visible' => 'Widoczne',
    'Hidden' => 'Ukryte',
  ),
);

