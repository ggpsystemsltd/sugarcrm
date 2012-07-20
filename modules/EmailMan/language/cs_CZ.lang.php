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
  'LBL_EMAIL_GMAIL_DEFAULTS' => 'Předvyplněno výchozím Gmail™',
  'LBL_MAIL_SENDTYPE' => 'Mail transfer agent',
  'LBL_MODULE_ID' => 'EmailMan',
  'LBL_SEND_DATE_TIME' => 'Datum odeslání',
  'LBL_IN_QUEUE' => 'V procesu',
  'LBL_IN_QUEUE_DATE' => 'Datum fronta',
  'ERR_INT_ONLY_EMAIL_PER_RUN' => 'Jenom číslo je povoleno pro Počet emailú odeslaných v jedné dávce',
  'LBL_ATTACHMENT_AUDIT' => 'byl odeslán. Aby se ušetřilo místo na místním disku, nebyla uložena kopie.',
  'LBL_CONFIGURE_SETTINGS' => 'Pokračovat',
  'LBL_CUSTOM_LOCATION' => 'Uživatelsky definováno',
  'LBL_DEFAULT_LOCATION' => 'Standardní',
  'LBL_DISCLOSURE_TITLE' => 'Připojit Disclosure Message ke každému E-mailu',
  'LBL_DISCLOSURE_TEXT_TITLE' => 'Disclosure obsah',
  'LBL_DISCLOSURE_TEXT_SAMPLE' => 'UPOZORNĚNÍ: Tato e-mailová zpráva je pouze určena pro uvedené příjemce a může obsahovat důvěrné a privilegované informace. Jakékoli neoprávněné recenze, použití, zveřejnění nebo distribuce jsou zakázány. Pokud nejste příjemce, prosím, odstraňte všechny kopie původní zprávy a informuje o tom odesílatele tak, aby vaši adresu již nezahrnul do mail listu. Děkujeme vám.',
  'LBL_EMAIL_DEFAULT_CHARSET' => 'Vytvářet emaily v této znakové sadě',
  'LBL_EMAIL_DEFAULT_EDITOR' => 'Vytvořit emailovou zprávu použitím tohoto klienta',
  'LBL_EMAIL_DEFAULT_DELETE_ATTACHMENTS' => 'S vymazaným emailem vymazat i propojené poznámky a soubory',
  'LBL_EMAIL_PER_RUN_REQ' => 'Počet emailů, které mají být odeslány v jedné dávce:',
  'LBL_EMAIL_SMTP_SSL' => 'Zapnuté SMTP SSL?',
  'LBL_EMAIL_USER_TITLE' => 'Výchozí emailové nastavení uživatele',
  'LBL_EMAIL_OUTBOUND_CONFIGURATION' => 'Konfigurace odchozího mailu',
  'LBL_EMAILS_PER_RUN' => 'Počet emailů, které mají být odeslány v jedné dávce:',
  'LBL_ID' => 'ID',
  'LBL_LIST_CAMPAIGN' => 'Kampaň',
  'LBL_LIST_FORM_PROCESSED_TITLE' => 'Zpracovaný',
  'LBL_LIST_FORM_TITLE' => 'Fronta',
  'LBL_LIST_FROM_EMAIL' => 'Email odesílatele',
  'LBL_LIST_FROM_NAME' => 'Jméno odesílatele',
  'LBL_LIST_IN_QUEUE' => 'V procesu',
  'LBL_LIST_MESSAGE_NAME' => 'Marketingová zpráva',
  'LBL_LIST_RECIPIENT_EMAIL' => 'Adresa příjemce',
  'LBL_LIST_RECIPIENT_NAME' => 'Jméno příjemce',
  'LBL_LIST_SEND_ATTEMPTS' => 'Pokusů',
  'LBL_LIST_SEND_DATE_TIME' => 'Odesláno',
  'LBL_LIST_USER_NAME' => 'Uživatelské jméno',
  'LBL_LOCATION_ONLY' => 'Lokace',
  'LBL_LOCATION_TRACK' => 'Umístění souborů sledování kampaně (jako campaign_tracker.php)',
  'LBL_CAMP_MESSAGE_COPY' => 'Zachovat kopie zpráv kampaně:',
  'LBL_CAMP_MESSAGE_COPY_DESC' => 'Požadujete uložit kompletní kopii <bold> KAŽDÉ </ bold> e-mailové zprávy zaslané v průběhu všech kampaní? <bold> Doporučujeme výchozí stav ne </ bold>. Bude uložena pouze šablona, která je odeslána a potřebné proměnné lze obnovit z jednotlivých zpráv.',
  'LBL_MAIL_SMTPAUTH_REQ' => 'Použít SMTP autentifikaci?',
  'LBL_MAIL_SMTPPASS' => 'SMTP heslo:',
  'LBL_MAIL_SMTPPORT' => 'SMTP port:',
  'LBL_MAIL_SMTPSERVER' => 'SMTP Server:',
  'LBL_MAIL_SMTPUSER' => 'SMTP uživatelské jméno:',
  'LBL_CHOOSE_EMAIL_PROVIDER' => 'Vyberte svého mailového poskytovatele',
  'LBL_YAHOOMAIL_SMTPPASS' => 'Yahoo! Mail heslo',
  'LBL_YAHOOMAIL_SMTPUSER' => 'Yahoo! M-ail ID',
  'LBL_GMAIL_SMTPPASS' => 'Gmail heslo',
  'LBL_GMAIL_SMTPUSER' => 'Gmail emailová adresa',
  'LBL_EXCHANGE_SMTPPASS' => 'Exchange heslo',
  'LBL_EXCHANGE_SMTPUSER' => 'Exchange uživatelské jméno',
  'LBL_EXCHANGE_SMTPPORT' => 'Exchange server port',
  'LBL_EXCHANGE_SMTPSERVER' => 'Exchange server',
  'LBL_EMAIL_LINK_TYPE' => 'Emailový klient',
  'LBL_EMAIL_LINK_TYPE_HELP' => '<b> Sugar poštovní klient: </ b> Odeslat e-mail pomocí e-mailového klienta v aplikaci Sugar! <b> Externí poštovní klient:. </ b> Odeslat e-mail pomocí e-mailového klienta mimo aplikaci Sugar, jako je např. Microsoft Outlook.',
  'LBL_MARKETING_ID' => 'Marketing ID',
  'LBL_MODULE_NAME' => 'Emailové nastavení',
  'LBL_CONFIGURE_CAMPAIGN_EMAIL_SETTINGS' => 'Konfigurace kampaně - email',
  'LBL_MODULE_TITLE' => 'Správce odchozích emailů',
  'LBL_NOTIFICATION_ON_DESC' => 'Zasílá upozornění emailem při přidělení záznamů.',
  'LBL_NOTIFY_FROMADDRESS' => 'Emailová adresa:',
  'LBL_NOTIFY_FROMNAME' => 'Odesílatel:',
  'LBL_NOTIFY_ON' => 'Upozornění?',
  'LBL_NOTIFY_SEND_BY_DEFAULT' => 'Odesílat standartně upozornění novým uživatelům?',
  'LBL_NOTIFY_TITLE' => 'Možnosti odesílání upozornění emailem',
  'LBL_OLD_ID' => 'Staré ID',
  'LBL_OUTBOUND_EMAIL_TITLE' => 'Nastavení odchozích emailů',
  'LBL_RELATED_ID' => 'Související ID',
  'LBL_RELATED_TYPE' => 'Související typ',
  'LBL_SAVE_OUTBOUND_RAW' => 'Ukládat odesílané [hrubé - raw] emaily',
  'LBL_SEARCH_FORM_PROCESSED_TITLE' => 'Vyhledávání zpracovaných emailů',
  'LBL_SEARCH_FORM_TITLE' => 'Prohledávání fronty',
  'LBL_VIEW_PROCESSED_EMAILS' => 'Zobrazit zpracované emaily',
  'LBL_VIEW_QUEUED_EMAILS' => 'Zobrazit emaily ve frontě',
  'TRACKING_ENTRIES_LOCATION_DEFAULT_VALUE' => 'Nastavení hodnoty site_url v Config.php',
  'TXT_REMOVE_ME_ALT' => '<br clear="all" /> <div class="footer"></div> </div> <br clear="all" /><br><DIV id="subcontainer" style="font-size: 10px; text-align: left" >Tento e-mail je v souladu se zákony ČR a Evropské Unie. Nejedná se o "spam", ale o nabídku. Kontakt na Vás byl získán na veřejně přístupném serveru. V případě, že nechcete dále dostávat naše nabídky, klikněte prosím na link na konci věty a tímto se Vám omlouváme za nevyžádané sdělení.',
  'TXT_REMOVE_ME_CLICK' => 'Odhlásit',
  'TXT_REMOVE_ME' => '<br clear="all" /> <div class="footer"></div> </div> <br clear="all" /><br><DIV id="subcontainer" style="font-size: 10px; text-align: left" >Tento e-mail je v souladu se zákony ČR a Evropské Unie. Nejedná se o "spam", ale o nabídku. Kontakt na Vás byl získán na veřejně přístupném serveru. V případě, že nechcete dále dostávat naše nabídky, klikněte prosím na link na konci věty a tímto se Vám omlouváme za nevyžádané sdělení.',
  'LBL_NOTIFY_SEND_FROM_ASSIGNING_USER' => 'Odeslat potvrzení z emailu zodpovědného uživatele ?',
  'LBL_SECURITY_TITLE' => 'Bezpečnostní nastavení emailů.',
  'LBL_SECURITY_DESC' => 'Zaklikněte na této obrazovce to, co by NEMĚLO být povoleno pro příchozí poštu a zobrazování  v modulu emaily.',
  'LBL_SECURITY_APPLET' => 'Značka Applet',
  'LBL_SECURITY_BASE' => 'Značka Base',
  'LBL_SECURITY_EMBED' => 'Značka Embed - vložit',
  'LBL_SECURITY_FORM' => 'Značka Form - formulář',
  'LBL_SECURITY_FRAME' => 'Značka Frame - rám',
  'LBL_SECURITY_FRAMESET' => 'Značka Frameset - sada rámů',
  'LBL_SECURITY_IFRAME' => 'Značka iFrame',
  'LBL_SECURITY_IMPORT' => 'Značka Import',
  'LBL_SECURITY_LAYER' => 'Značka Layer - vrstva',
  'LBL_SECURITY_LINK' => 'Značka Link - odkaz',
  'LBL_SECURITY_OBJECT' => 'Značka Object',
  'LBL_SECURITY_OUTLOOK_DEFAULTS' => 'Zvolit výchozí minimální zabezpečení definované v Outlooku (chyby při zobrazování).',
  'LBL_SECURITY_SCRIPT' => 'Značka Script',
  'LBL_SECURITY_STYLE' => 'Značka Style',
  'LBL_SECURITY_TOGGLE_ALL' => 'Zapnout všechno',
  'LBL_SECURITY_XMP' => 'Značka Xmp',
  'LBL_YES' => 'Ano',
  'LBL_NO' => 'Ne',
  'LBL_PREPEND_TEST' => 'Test:',
  'LBL_SEND_ATTEMPTS' => 'Poslat pokusné emaily',
  'LBL_OUTGOING_SECTION_HELP' => 'Nastavit výchozí server odchozí pošty pro odesílání oznámení e-mailem, včetně upozornění workflow.',
  'LBL_ALLOW_DEFAULT_SELECTION' => 'Povolit uživatelům používat tento účet pro odchozí poštu:',
  'LBL_ALLOW_DEFAULT_SELECTION_HELP' => 'Pokud je tato možnost vybrána, budou všichni uživatelé moci posílat e-maily pomocí stejného účtu pro odchozí poštu, což slouží k zasílání upozornění a výstrah systému. Pokud tato možnost není vybrána, mohou uživatelé nadále používat server odchozí pošty nastavený v uživatelském účtu.',
  'LBL_FROM_ADDRESS_HELP' => 'Když je povolen, budou přiřazení uživatelé a jejich emailové adresy vloženi do pole Od. Toto nemusí pracovat správně spolu se SMTP servery, které neumožňují zasílání emailů z jiných emailových účtů, než které jsou na serveru.',
);

