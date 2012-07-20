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
  'LBL_ID' => 'ID',
  'LBL_URL' => 'URL',
  'LBL_OMIT_URL' => '(Omit http:// or https://)',
  'LBL_ASSIGNED_TO_ID' => 'ID przydzielonego użytkownika',
  'LBL_ASSIGNED_TO_NAME' => 'Użytkownik Sugar',
  'LBL_DATE_ENTERED' => 'Data utworzenia',
  'LBL_DATE_MODIFIED' => 'Data modyfikacji',
  'LBL_MODIFIED' => 'Zmodyfikowane przez',
  'LBL_MODIFIED_ID' => 'Zmodyfikowane przez ID',
  'LBL_MODIFIED_NAME' => 'Zmodyfikowane przez użytkownika o nazwie',
  'LBL_CREATED' => 'Utworzone przez',
  'LBL_CREATED_ID' => 'Utworzone przez ID',
  'LBL_DESCRIPTION' => 'Opis',
  'LBL_DELETED' => 'Usunięte',
  'LBL_NAME' => 'Nazwa użytkownika aplikacji',
  'LBL_CREATED_USER' => 'Utworzone przez użytkownika',
  'LBL_MODIFIED_USER' => 'Zmodyfikowane przez użytkownika',
  'LBL_LIST_NAME' => 'Nazwa',
  'LBL_TEAM' => 'Zespoły',
  'LBL_TEAMS' => 'Zespoły',
  'LBL_TEAM_ID' => 'ID zespołu',
  'LBL_LIST_FORM_TITLE' => 'Lista kont zewnętrznych',
  'LBL_MODULE_NAME' => 'Konto zewnętrzne',
  'LBL_MODULE_TITLE' => 'Konta zewnętrzne',
  'LBL_HOMEPAGE_TITLE' => 'Moje konta zewnętrzne',
  'LNK_NEW_RECORD' => 'Utwórz konto zewnętrzne',
  'LNK_LIST' => 'Zobacz konta zewnętrzne',
  'LNK_IMPORT_SUGAR_EAPM' => 'Importuj konta zewnętrzne',
  'LBL_SEARCH_FORM_TITLE' => 'Szukaj zewnętrznego źródła',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Zobacz historię',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Działania',
  'LBL_SUGAR_EAPM_SUBPANEL_TITLE' => 'Konta zewnętrzne',
  'LBL_NEW_FORM_TITLE' => 'Nowe konto zewnętrzne',
  'LBL_PASSWORD' => 'Hasło aplikacji',
  'LBL_USER_NAME' => 'Nazwa użytkownika aplikacji',
  'LBL_APPLICATION' => 'Aplikacja',
  'LBL_API_DATA' => 'Dane API',
  'LBL_API_TYPE' => 'Typ loginu',
  'LBL_API_CONSKEY' => 'Klucz konsumenta',
  'LBL_API_CONSSECRET' => '"Secret" konsumenta',
  'LBL_API_OAUTHTOKEN' => '"OAuth Token"',
  'LBL_AUTH_UNSUPPORTED' => 'Ta metoda autoryzacji nie jest obsługiwana przez aplikację',
  'LBL_AUTH_ERROR' => 'Próba uwierzytelnienia konta zewnętrznego nie powiodła się.',
  'LBL_VALIDATED' => 'Dostęp zatwierdzony',
  'LBL_ACTIVE' => 'Aktywne',
  'LBL_OAUTH_NAME' => '%y',
  'LBL_SUGAR_USER_NAME' => 'Użytkownik Sugar',
  'LBL_DISPLAY_PROPERTIES' => 'Wyświetl właściwości',
  'LBL_CONNECT_BUTTON_TITLE' => 'Połącz',
  'LBL_NOTE' => 'Proszę zwrócić uwagę',
  'LBL_CONNECTED' => 'Połączono',
  'LBL_DISCONNECTED' => 'Nie połączono',
  'LBL_ERR_NO_AUTHINFO' => 'Brak informacji uwierzytelnienia dla tego konta.',
  'LBL_ERR_NO_TOKEN' => 'Brak prawidłowych tokenów logowania dla tego konta.',
  'LBL_ERR_FAILED_QUICKCHECK' => 'Nie jesteś aktualnie zalogowany na swoim {0} koncie. Kliknij OK, aby ponownie zalogować się na swoje konto i aktywować rekord zewnętrznego konta:',
  'LBL_MEET_NOW_BUTTON' => 'Spotkaj teraz',
  'LBL_VIEW_LOTUS_LIVE_MEETINGS' => 'Zobacz nadchodzące spotkania LotusLive™',
  'LBL_TITLE_LOTUS_LIVE_MEETINGS' => 'Nadchodzące spotkania LotusLive™',
  'LBL_VIEW_LOTUS_LIVE_DOCUMENTS' => 'Zobacz dokumenty LotusLive™',
  'LBL_TITLE_LOTUS_LIVE_DOCUMENTS' => 'Dokumenty LotusLive™',
  'LBL_REAUTHENTICATE_LABEL' => 'Ponowne uwierzytelnienie',
  'LBL_APPLICATION_FOUND_NOTICE' => 'Konto dla tej aplikacji już istnieje. Przywróciliśmy istniejące konto.',
  'LBL_OAUTH_SAVE_NOTICE' => 'Kliknij "Zapisz", aby utworzyć rekord zewnętrznego konta. Zostaniesz przekierowany do strony, na której wprowadź informacje twojego konta, aby autoryzować dostęp do aplikacji Sugar. Po wprowadzeniu informacji twojego konta, zostaniesz przekierowany z powrotem do aplikacji Sugar.',
  'LBL_BASIC_SAVE_NOTICE' => 'Kliknij "Zapisz", aby utworzyć rekord zewnętrznego konta. Sugar następnie potwierdzi twoje poświadczenia.',
  'LBL_ERR_FACEBOOK' => 'Facebook zwrócił błąd, i kanał nie może być wyświetlony.',
  'LBL_ERR_NO_RESPONSE' => 'Wystąpił błąd podczas próby zapisu konta zewnętrznego.',
  'LBL_ERR_TWITTER' => 'Twitter zwrócił błąd, i kanał nie może być wyświetlony.',
  'LBL_ERR_POPUPS_DISABLED' => 'Proszę włączyć opcję wyskakujacych okienek lub dodać wyjątek dla strony  "{0}" do listy wyjątków w celu połączenia.',
);

