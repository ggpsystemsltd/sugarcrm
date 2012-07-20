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
  'LBL_AUTOREPLY_HELP' => 'Vält ett automatiserat leveranssvar att skickas till epost avsändare.',
  'LBL_EMAIL_BOUNCE_OPTIONS' => 'Studs hanterings operationer',
  'LBL_CREATE_CASE_REPLY_TEMPLATE_HELP' => 'Välj ett automatiserat svar till avsändaren att ett ärende har skapats. Epost meddelandet innehåller ärendenummer i rubrikfältet vilket är kopplat till makrohanteringen för ärenden. Detta svar skickas bara när det första epost meddelandet mottages.',
  'LBL_PERSONAL_MODULE_NAME' => 'Personligt epost konto',
  'LBL_CREATE_CASE' => 'Skapa ärende från epost',
  'LBL_CREATE_CASE_HELP' => 'Välj att automatiskt skapa ärende poster i Sugar från inkommande epost.',
  'LBL_BOUNCE_MODULE_NAME' => 'Brevlåda för studsade epost meddelanden',
  'LNK_LIST_CREATE_NEW_GROUP' => 'Nytt grupp epost konto',
  'LNK_LIST_CREATE_NEW_BOUNCE' => 'Nytt konto för studsade meddelanden',
  'LBL_ALLOW_OUTBOUND_GROUP_USAGE' => 'Tillåt användare att skicka epost genom att använda "Från" namnet och adressen som svara till adress.',
  'LBL_ALLOW_OUTBOUND_GROUP_USAGE_DESC' => 'När denna option är vald kommer från namnet och "från epost adress" som är associerad med grupp epost kontot att vara valbar i "Från" fältet när man skapar nya epost meddelanden, (för de användare som har access till grupp epost kontot).',
  'LBL_ENABLE_AUTO_IMPORT' => 'Importera epost automatiskt',
  'LBL_WARNING_CHANGING_AUTO_IMPORT' => 'Varning: Du har ändrat dina automatiska import inställningar vilket kan resultera i förlust av data.',
  'LBL_WARNING_CHANGING_AUTO_IMPORT_WITH_CREATE_CASE' => 'Varning: Automatisk import måste tillåtas om automatiska ärenden ska skapas.',
  'LBL_RE' => 'RE:',
  'LBL_FIND_OPTIMUM_KEY' => 'f',
  'LBL_MAILBOX_DEFAULT' => 'INBOX',
  'LBL_STATUS' => 'Status',
  'LBL_TEST_BUTTON_KEY' => 't',
  'LBL_TEST_BUTTON_TITLE' => 'Test [Alt+T]',
  'LBL_ASSIGN_TEAM' => 'Tilldela till team',
  'ERR_BAD_LOGIN_PASSWORD' => 'Felaktigt användarnamn eller lösenord',
  'ERR_BODY_TOO_LONG' => '\\rMeddelandetexten för lång för att kunna spara hela meddelandet.  Har trimmats',
  'ERR_INI_ZLIB' => 'Kunde inte stänga av Zlib kompressionen temporärt. "Testa inställningar" kan misslyckas.',
  'ERR_MAILBOX_FAIL' => 'Kunde inte hämta något epostkonto.',
  'ERR_NO_IMAP' => 'Inget IMAP bibliotek hittades. Var god lös detta innan ni fortsätter med inkommande epost',
  'ERR_NO_OPTS_SAVED' => 'Inga otimums sparades med ditt inkommande epostkonto. Vänligen gå igenom inställningarna',
  'ERR_TEST_MAILBOX' => 'Var god kontrollera dina inställningar och försök igen.',
  'LBL_APPLY_OPTIMUMS' => 'Ange optimums',
  'LBL_ASSIGN_TO_USER' => 'Tilldela till användare',
  'LBL_AUTOREPLY_OPTIONS' => 'Auto-svar alternativ',
  'LBL_AUTOREPLY' => 'Auto-svar mall',
  'LBL_BASIC' => 'Enkla inställningar',
  'LBL_CASE_MACRO' => 'Ärende macro',
  'LBL_CASE_MACRO_DESC' => 'Sätt macrot som kommer användas för att länka importerade epostmeddelanden till ärenden.',
  'LBL_CASE_MACRO_DESC2' => 'Sätt detta till ett värde, men bevara <b>"%1"</b>.',
  'LBL_CERT_DESC' => 'Tvingande validering av mail serverns Säkerhetscertifikat - använd inte self-signing.',
  'LBL_CERT' => 'Validera certifikat',
  'LBL_CLOSE_POPUP' => 'Stäng fönster',
  'LBL_CREATE_NEW_GROUP' => '--Skapa grupp vid spara--',
  'LBL_CREATE_TEMPLATE' => 'Skapa',
  'LBL_SUBSCRIBE_FOLDERS' => 'Subscribe-mappar',
  'LBL_DEFAULT_FROM_ADDR' => 'Standard:',
  'LBL_DEFAULT_FROM_NAME' => 'Standard:',
  'LBL_DELETE_SEEN' => 'Radera lästa epostmeddelanden efter import',
  'LBL_EDIT_TEMPLATE' => 'Redigera',
  'LBL_EMAIL_OPTIONS' => 'Alternativ för eposthantering',
  'LBL_FILTER_DOMAIN_DESC' => 'Skicka inte auto-svar till den här domänen.',
  'LBL_ASSIGN_TO_GROUP_FOLDER_DESC' => 'Tilldela ett mailkonto till gruppmappen aktiverar automatisk import av emails.',
  'LBL_POSSIBLE_ACTION_DESC' => 'För Skapa Case-valet, måste en gruppmapp vara vald',
  'LBL_FILTER_DOMAIN' => 'Inget auto-svar till domänen',
  'LBL_FIND_OPTIMUM_MSG' => '<br>Letar efter optimum connection variabler.',
  'LBL_FIND_OPTIMUM_TITLE' => 'Hitta optimum konfiguration',
  'LBL_FIND_SSL_WARN' => '<br>Testning av SSL kan ta lång tid. Var god vänta.<br>',
  'LBL_FORCE_DESC' => 'Några IMAP/POP3 servrar kräver speciella switchar. Kontrollera för att tvinga en negativ switch vid uppkoppling (ex. /notis)',
  'LBL_FORCE' => 'Tvinga negativ',
  'LBL_FOUND_MAILBOXES' => 'Hittade följande användbara katalog.<br>Klicka för att välja en:',
  'LBL_FOUND_OPTIMUM_MSG' => '<br>Hittade optimum inställingar.  Klicka på knappen nedan för att använda dem på ditt epostkonto.',
  'LBL_FROM_ADDR' => '"Avsändar" adress',
  'LBL_FROM_NAME_ADDR' => 'Avsändar namn/epost',
  'LBL_FROM_NAME' => '"Avsändar" namn',
  'LBL_GROUP_QUEUE' => 'Tilldela till grupp',
  'LBL_HOME' => 'Hem',
  'LBL_LIST_MAILBOX_TYPE' => 'Användning av epostkonto',
  'LBL_LIST_NAME' => 'Namn:',
  'LBL_LIST_GLOBAL_PERSONAL' => 'Grupp/Personlig',
  'LBL_LIST_SERVER_URL' => 'Epostserver:',
  'LBL_LIST_STATUS' => 'Status:',
  'LBL_LOGIN' => 'Användarnamn',
  'LBL_MAILBOX_SSL_DESC' => 'Använd SSL vid kommunikation. Om detta inte fungerar kontrollera din PHP installation inkluderad "--With-imap-ssl" i konfigurationen.',
  'LBL_MAILBOX_SSL' => 'Använd SSL',
  'LBL_MAILBOX_TYPE' => 'Möjliga åtgärder',
  'LBL_DISTRIBUTION_METHOD' => 'Distibutionsmetod',
  'LBL_CREATE_CASE_REPLY_TEMPLATE' => 'Skapa ett Case Svar Template',
  'LBL_MAILBOX' => 'Övervakad katalog',
  'LBL_TRASH_FOLDER' => 'Papperskorgsmapp',
  'LBL_GET_TRASH_FOLDER' => 'Hämta Papperskorgsmapp',
  'LBL_SENT_FOLDER' => 'Skickatmapp',
  'LBL_GET_SENT_FOLDER' => 'Hämta Skickatmapp',
  'LBL_SELECT' => 'Merkera',
  'LBL_MARK_READ_DESC' => 'Markera meddelanden som lästa på epostservern vid import; radera inte.',
  'LBL_MARK_READ_NO' => 'Epost markerade som raderade efter import',
  'LBL_MARK_READ_YES' => 'Epost lämnade på server efter import',
  'LBL_MARK_READ' => 'Lämna meddelanden på servern',
  'LBL_MAX_AUTO_REPLIES' => 'Antal auto-svar',
  'LBL_MAX_AUTO_REPLIES_DESC' => 'Sätt maximalt antal auto-svar som skickas till en unik adress under en period om 24 timmar.',
  'LBL_MODULE_NAME' => 'Inställningar för inkommande epost',
  'LBL_MODULE_TITLE' => 'Inkommande epost',
  'LBL_NAME' => 'Namn',
  'LBL_NONE' => 'Ingen',
  'LBL_NO_OPTIMUMS' => 'Kunde inte hitta optimums. Vänligen kontrollera dina inställningar och försök igen.',
  'LBL_ONLY_SINCE_DESC' => 'Om du använder POP3, så kan inte PHP filtrera efter Nya/Olästa meddelanden.  Den här flaggan gör det möjligt för förfrågan att kontrollera efter nya meddelanden sedan kontot senast tömdes. Det här kommer att öka prestandan avsevärt om din mailserver inte stödjer IMAP.',
  'LBL_ONLY_SINCE_NO' => 'Nej. kontrollera mot alla epostmeddelanden på epostservern.',
  'LBL_ONLY_SINCE_YES' => 'Ja.',
  'LBL_ONLY_SINCE' => 'Importera endast sedan senaste kontrollen:',
  'LBL_OUTBOUND_SERVER' => 'Utgående epostserver',
  'LBL_PASSWORD_CHECK' => 'Lösenordskontroll',
  'LBL_PASSWORD' => 'Lösenord',
  'LBL_POP3_SUCCESS' => 'Lyckat test av POP3 uppkopplingen.',
  'LBL_POPUP_FAILURE' => 'Test av uppkopplingen misslyckades. Felmeddelandet visas nedan.',
  'LBL_POPUP_SUCCESS' => 'Test av uppkopplingen lyckades. Dina inställningar fungerar.',
  'LBL_POPUP_TITLE' => 'Testa inställningarna',
  'LBL_GETTING_FOLDERS_LIST' => 'Hämta mapplista',
  'LBL_SELECT_SUBSCRIBED_FOLDERS' => 'Välj Subscribedmapp(ar)',
  'LBL_SELECT_TRASH_FOLDERS' => 'Välj papperskorgsmapp',
  'LBL_SELECT_SENT_FOLDERS' => 'Välj skickatmapp',
  'LBL_DELETED_FOLDERS_LIST' => 'Följande mapp(ar) %s antingen finns inte eller har blivit borttagna från servern',
  'LBL_PORT' => 'Epostserver port',
  'LBL_QUEUE' => 'Epostkonto kö',
  'LBL_REPLY_NAME_ADDR' => 'Svarsnamn/epost',
  'LBL_REPLY_TO_NAME' => '"Svara-till" namn',
  'LBL_REPLY_TO_ADDR' => '"Svara-till" adress',
  'LBL_SAME_AS_ABOVE' => 'Använd Från namn/adress',
  'LBL_SAVE_RAW' => 'Visa källkod',
  'LBL_SAVE_RAW_DESC_1' => 'Välj "Ja" om du önskar bevara källkoden för varje importerat epostmeddelande.',
  'LBL_SAVE_RAW_DESC_2' => 'Stora bilagor kan orsaka problem med konservativt eller felaktigt konfigurerade databaser.',
  'LBL_SERVER_OPTIONS' => 'Avancerade inställningar',
  'LBL_SERVER_TYPE' => 'Epostserver protokoll',
  'LBL_SERVER_URL' => 'Epostserver adress',
  'LBL_SSL_DESC' => 'Om din mailserver stödjer secure socket connections, kommer detta att tvinga systemet att använda SSL connections vid import av epost.',
  'LBL_ASSIGN_TO_TEAM_DESC' => 'Välj teamet som har tillgång till mailkontot. Om en gruppmapp är markerad, så tar det tillägnade teamet över det valda teamet.',
  'LBL_SSL' => 'Använd SSL',
  'LBL_SYSTEM_DEFAULT' => 'Systemstandard',
  'LBL_TEST_SETTINGS' => 'Testa inställningar',
  'LBL_TEST_SUCCESSFUL' => 'Uppkopplingen slutfördes korrekt.',
  'LBL_TEST_WAIT_MESSAGE' => 'Ett ögonblick...',
  'LBL_TLS_DESC' => 'Använd Transport Layer Security när du kommunicerar med mailservern - använd endast detta om din mailserver hanterar detta protokoll.',
  'LBL_TLS' => 'Använd TLS',
  'LBL_WARN_IMAP_TITLE' => 'Ingående epost inaktiverad',
  'LBL_WARN_IMAP' => 'Varningar:',
  'LBL_WARN_NO_IMAP' => 'Inkommande epost fungerar <b>inte</b> utan IMAP c-client biblioteken aktiverade/kompilerade med PHP modulen. Var god kontakta din administratör för att lösa problemet.',
  'LNK_CREATE_GROUP' => 'Skapa ny grupp',
  'LNK_LIST_MAILBOXES' => 'Alla epostkonton',
  'LNK_LIST_QUEUES' => 'Alla köer',
  'LNK_LIST_SCHEDULER' => 'Schemaläggare',
  'LNK_LIST_TEST_IMPORT' => 'Test epostimport',
  'LNK_NEW_QUEUES' => 'Skapa ny kö',
  'LNK_SEED_QUEUES' => 'Skicka köer från team',
  'LBL_IS_PERSONAL' => 'Personligt epostkonto',
  'LBL_GROUPFOLDER_ID' => 'Gruppkatalog Id',
  'LBL_ASSIGN_TO_GROUP_FOLDER' => 'Tilldela till gruppkatalog',
  'LBL_STATUS_ACTIVE' => 'Aktiv',
  'LBL_STATUS_INACTIVE' => 'Inaktiv',
  'LBL_IS_GROUP' => 'grupp',
);

