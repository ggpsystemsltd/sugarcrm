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
  'LBL_EXCHANGE_SMTPPASS' => 'Zamień hasło',
  'LBL_EXCHANGE_SMTPUSER' => 'Zamień nazwę użytkownika',
  'LBL_EXCHANGE_SMTPPORT' => 'Zamień port serwera',
  'LBL_EXCHANGE_SMTPSERVER' => 'Zamień serwer',
  'LBL_EMAIL_LINK_TYPE_HELP' => 'Klient poczty Sugar: Wyślij wiadomości e-mail używając klienta e-mail w aplikacji Sugar.<br />Klient poczty zewnętrznej: Wyślij wiadomość e-mail używając klienta e-mail na zewnątrz aplikacji Sugar, takiego jak Microsoft Outlook.',
  'LBL_ID' => 'Id',
  'LBL_MARKETING_ID' => 'Marketing Id',
  'LBL_SEND_DATE_TIME' => 'Wyślij Datę',
  'LBL_IN_QUEUE' => 'W kolejce?',
  'LBL_IN_QUEUE_DATE' => 'Data kolejkowania',
  'ERR_INT_ONLY_EMAIL_PER_RUN' => 'Tylko wartości liczbowe są dowzolone dla oznaczenia liczby wiadomości wysłanych w jednej serii',
  'LBL_ATTACHMENT_AUDIT' => 'zostało wysłane.  Nie zostały zduplikowane lokalnie, by nie zajmować miejsca na dysku.',
  'LBL_CONFIGURE_SETTINGS' => 'Konfiguruj ustawienia e-mail',
  'LBL_CUSTOM_LOCATION' => 'Definiowane przez użytkownika',
  'LBL_DEFAULT_LOCATION' => 'Domyślna',
  'LBL_DISCLOSURE_TITLE' => 'Dodaje Stopkę o niejawności do każdej wiadomości',
  'LBL_DISCLOSURE_TEXT_TITLE' => 'Treść Stopki o niejawności',
  'LBL_DISCLOSURE_TEXT_SAMPLE' => 'Uwaga: Ta wiadomość jest skierowana wyłącznie do użytku określonych odbiorców i może zawierać treści przeznaczone tylko dla nich. Jakiekolwiek nieautoryzowane ujawnianie, używanie, lub dystrybuowanie tych treści jest zabronione. Jeśli nie jesteś adresatem tej wiadomości, usuń jej wszystkie kopie i powiadom nadawcę, aby poprawił swoją książkę adresową. Dziękujemy.',
  'LBL_EMAIL_DEFAULT_CHARSET' => 'Komponuj wiadomości e-mail w tym zestawie znaków',
  'LBL_EMAIL_DEFAULT_EDITOR' => 'Napisz wiadomość e-mail, korzystając z tego klienta poczty',
  'LBL_EMAIL_DEFAULT_DELETE_ATTACHMENTS' => 'Usuń powiązane notatki i załączniki z usuniętymi wiadomościami e-mail',
  'LBL_EMAIL_GMAIL_DEFAULTS' => 'Wypełnij domyślne ustawienia dla Gmail',
  'LBL_EMAIL_PER_RUN_REQ' => 'Liczba wiadomości wysłanych w serii:',
  'LBL_EMAIL_SMTP_SSL' => 'Włączyć SMTP przez SSL?',
  'LBL_EMAIL_USER_TITLE' => 'Użyj domyślnego adresu email',
  'LBL_EMAIL_OUTBOUND_CONFIGURATION' => 'Konfiguracja poczty wychodzącej',
  'LBL_EMAILS_PER_RUN' => 'Liczba wiadomości wysyłanych w serii:',
  'LBL_LIST_CAMPAIGN' => 'Kampania',
  'LBL_LIST_FORM_PROCESSED_TITLE' => 'Trwające',
  'LBL_LIST_FORM_TITLE' => 'Oczekujące',
  'LBL_LIST_FROM_EMAIL' => 'Od adres email',
  'LBL_LIST_FROM_NAME' => 'Od nazwa',
  'LBL_LIST_IN_QUEUE' => 'W trakcie',
  'LBL_LIST_MESSAGE_NAME' => 'Wiadomość marketingowa',
  'LBL_LIST_RECIPIENT_EMAIL' => 'Adres e-mail odbiorcy',
  'LBL_LIST_RECIPIENT_NAME' => 'Nazwa odbiorcy',
  'LBL_LIST_SEND_ATTEMPTS' => 'Próba wysłania',
  'LBL_LIST_SEND_DATE_TIME' => 'Wysłane',
  'LBL_LIST_USER_NAME' => 'Nazwa użytkownika',
  'LBL_LOCATION_ONLY' => 'Lokalizacja',
  'LBL_LOCATION_TRACK' => 'Lokalizacja pliku śledzenia trwania kampanii (jak campaign_tracker.php)',
  'LBL_CAMP_MESSAGE_COPY' => 'Zachowaj kopie wiadomości kampanii:',
  'LBL_CAMP_MESSAGE_COPY_DESC' => 'Czy chcesz zachować kompletną kopię wiadomości wysłanych podczas wszystkich kampanii?  Zaleca się pozostawienie opcji w domyślnym ustawieniu - Nie.  Wybierając Nie, zachowane zostaną wzory i niezbędne zmienne wiadomości, aby odtworzyć oryginalną wiadomość.',
  'LBL_MAIL_SENDTYPE' => 'Typ serwera poczty (MTA):',
  'LBL_MAIL_SMTPAUTH_REQ' => 'Użyj uwierzytelnienia SMTP?',
  'LBL_MAIL_SMTPPASS' => 'Hasło SMTP:',
  'LBL_MAIL_SMTPPORT' => 'Port SMTP:',
  'LBL_MAIL_SMTPSERVER' => 'Nazwa serwera SMTP:',
  'LBL_MAIL_SMTPUSER' => 'Nazwa użytkownika SMTP:',
  'LBL_CHOOSE_EMAIL_PROVIDER' => 'Wybierz dostawcę e-mail',
  'LBL_YAHOOMAIL_SMTPPASS' => 'Hasło Yahoo! Mail:',
  'LBL_YAHOOMAIL_SMTPUSER' => 'ID Yahoo! Mail:',
  'LBL_GMAIL_SMTPPASS' => 'Hasło Gmail',
  'LBL_GMAIL_SMTPUSER' => 'Adres e-mail Gmail',
  'LBL_EMAIL_LINK_TYPE' => 'Klient poczty',
  'LBL_MODULE_ID' => 'Zarządzanie pocztą',
  'LBL_MODULE_NAME' => 'Masowa wysyłka',
  'LBL_CONFIGURE_CAMPAIGN_EMAIL_SETTINGS' => 'Konfiguruj ustawienia kampanii e-mail',
  'LBL_MODULE_TITLE' => 'Zarządzanie kolejkowaniem masowej wysyłki',
  'LBL_NOTIFICATION_ON_DESC' => 'Wysyłaj powiadomienie emailem, gdy rekordy są przydzielone.',
  'LBL_NOTIFY_FROMADDRESS' => 'Adres "Od":',
  'LBL_NOTIFY_FROMNAME' => 'Nazwa "Od":',
  'LBL_NOTIFY_ON' => 'Powiadomienia włączone?',
  'LBL_NOTIFY_SEND_BY_DEFAULT' => 'Wysyła powiadomienia domyślnie dla nowych Użytkowników?',
  'LBL_NOTIFY_TITLE' => 'Opcje e-mail',
  'LBL_OLD_ID' => 'Dawne Id',
  'LBL_OUTBOUND_EMAIL_TITLE' => 'Opcje wiadomości wychodzących',
  'LBL_RELATED_ID' => 'Powiązane Id',
  'LBL_RELATED_TYPE' => 'Powiązany typ',
  'LBL_SAVE_OUTBOUND_RAW' => 'Zapisz źródło wiadomości wychodzących',
  'LBL_SEARCH_FORM_PROCESSED_TITLE' => 'Przeprowadzane wyszukiwanie',
  'LBL_SEARCH_FORM_TITLE' => 'Przeszukaj oczekujące',
  'LBL_VIEW_PROCESSED_EMAILS' => 'Zobacz przetwarzane wiadomości e-mail',
  'LBL_VIEW_QUEUED_EMAILS' => 'Zobacz oczekujące wiadomości e-mail',
  'TRACKING_ENTRIES_LOCATION_DEFAULT_VALUE' => 'Wartość zmiennej site_urlw pliku Config.php',
  'TXT_REMOVE_ME_ALT' => 'Aby usunąć siebie z listy wysyłkowej idź do',
  'TXT_REMOVE_ME_CLICK' => 'kliknij tutaj',
  'TXT_REMOVE_ME' => 'Aby usunąć siebie z tej listy wysyłkowej',
  'LBL_NOTIFY_SEND_FROM_ASSIGNING_USER' => 'Wyślij powiadomienie z przydzielonego do użytkownika adresu?',
  'LBL_SECURITY_TITLE' => 'Ustawienia zabezpieczeń wiadomości e-mail',
  'LBL_SECURITY_DESC' => 'Poniżej zaznacz elementy, które NIE powinny być dozwolone w poczcie przychodzącej, lub wyświetlane w Module Poczty.',
  'LBL_SECURITY_APPLET' => 'Tag apletu',
  'LBL_SECURITY_BASE' => 'Tag podstawowy',
  'LBL_SECURITY_EMBED' => 'Tag wbudowany',
  'LBL_SECURITY_FORM' => 'Tag formularza',
  'LBL_SECURITY_FRAME' => 'Tag ramki',
  'LBL_SECURITY_FRAMESET' => 'Tag zestawu ramek',
  'LBL_SECURITY_IFRAME' => 'Tag iFrame',
  'LBL_SECURITY_IMPORT' => 'Tag importu',
  'LBL_SECURITY_LAYER' => 'Tag warstwy',
  'LBL_SECURITY_LINK' => 'Tag linku',
  'LBL_SECURITY_OBJECT' => 'Tag obiektu',
  'LBL_SECURITY_OUTLOOK_DEFAULTS' => 'Wybierz domyślne minimalne środki bezpieczeństwa Outlooka (błędy na prawidłowo wyświetlonej stronie).',
  'LBL_SECURITY_SCRIPT' => 'Tag skryptu',
  'LBL_SECURITY_STYLE' => 'Tag stylu',
  'LBL_SECURITY_TOGGLE_ALL' => 'Zaznacz wszystkue opcje',
  'LBL_SECURITY_XMP' => 'Tag Xmp',
  'LBL_YES' => 'Tak',
  'LBL_NO' => 'Nie',
  'LBL_PREPEND_TEST' => '[Test]:',
  'LBL_SEND_ATTEMPTS' => 'Próby wysyłki',
  'LBL_OUTGOING_SECTION_HELP' => 'Konfiguruj domyślny serwer poczty wychodzącej dla wysyłania powiadomień e-mail, włączając alerty workflow.',
  'LBL_ALLOW_DEFAULT_SELECTION' => 'Pozwól użytkownikom korzystać z tego konta dla e-maili wychodzących:',
  'LBL_ALLOW_DEFAULT_SELECTION_HELP' => 'Po wybraniu tej opcji, użytkownicy będą mogli wysyłać e-maile przy użyciu tego samego konta poczty wychodzącej używanego do wysyłania powiadomień systemu i alertów. Jeśli opcja nie jest wybrana, użytkownicy nadal mogą korzystać z serwera poczty wychodzącej po podaniu swoich danych konta.',
  'LBL_FROM_ADDRESS_HELP' => 'Po włączeniu tej opcji, nazwa przydzielającego użytkownika i adres e-mail zostaną uwzględnione w polu "Od" wiadomości e-mail. Ta funkcja może nie działać z serwerami SMTP, które nie pozwalają na wysyłanie z innego konta e-mail niż konto serwera.',
);

