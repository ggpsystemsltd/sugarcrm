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
  'LBL_MAIL_SMTPPORT' => 'SMTP Port:',
  'LBL_MAIL_SMTPSERVER' => 'SMTP Mail Server:',
  'LBL_EXCHANGE_SMTPSERVER' => 'Exchange Server',
  'LBL_MARKETING_ID' => 'Marketing Id',
  'LBL_MODULE_ID' => 'EmailMan',
  'LBL_SEND_DATE_TIME' => 'Datum slanja',
  'LBL_IN_QUEUE' => 'U procesu',
  'LBL_IN_QUEUE_DATE' => 'Poslat na slanje',
  'ERR_INT_ONLY_EMAIL_PER_RUN' => 'Koristite samo celobrojne vrednosti da odredite broj poslatih email poruka po grupi',
  'LBL_ATTACHMENT_AUDIT' => 'je poslat. Nije dupliran lokalno da se smanjila iskorišćenost diska.',
  'LBL_CONFIGURE_SETTINGS' => 'Konfiguriši Email podešavanja',
  'LBL_CUSTOM_LOCATION' => 'Korisnički definisan',
  'LBL_DEFAULT_LOCATION' => 'Podrazumevano',
  'LBL_DISCLOSURE_TITLE' => 'Pridodaj poruku o poverljivosti na kraju svakog Email-a',
  'LBL_DISCLOSURE_TEXT_TITLE' => 'Sadržaj poruke o poverljivosti',
  'LBL_DISCLOSURE_TEXT_SAMPLE' => 'NAPOMENA: Ova poruka je isključivo namenjena primaocu(ima) i može sadržati poverljive i privilegovane informacije.  Svaki neovlašćeni pregled, upotreba, razotkrivanje, ili distribucija je zabranjeno. Ako niste navedeni kao primalac poruke, molimo Vas da uništite sve kopije originalne poruke i obavestite pošiljaoca kako bi naša baza adresa bila ispravljena. Hvala.',
  'LBL_EMAIL_DEFAULT_CHARSET' => 'Sastavi email poruke sa ovim skupom karaktera',
  'LBL_EMAIL_DEFAULT_EDITOR' => 'Sastavi email koristeći ovaj klijent',
  'LBL_EMAIL_DEFAULT_DELETE_ATTACHMENTS' => 'Sa obrisanim email porukama obriši povezane beleške i dodatke',
  'LBL_EMAIL_GMAIL_DEFAULTS' => 'Popunite podrazumevana podešavanja za Gmail™',
  'LBL_EMAIL_PER_RUN_REQ' => 'Broj email poruka poslat po grupi:',
  'LBL_EMAIL_SMTP_SSL' => 'Omogući SMTP preko SSL',
  'LBL_EMAIL_USER_TITLE' => 'Podrazumevani Email korisnika',
  'LBL_EMAIL_OUTBOUND_CONFIGURATION' => 'Konfiguracija odlazne Email pošte',
  'LBL_EMAILS_PER_RUN' => 'Broj email poruka poslat po grupi:',
  'LBL_ID' => 'ID',
  'LBL_LIST_CAMPAIGN' => 'Kampanja:',
  'LBL_LIST_FORM_PROCESSED_TITLE' => 'Obrađen',
  'LBL_LIST_FORM_TITLE' => 'Poruke za slanje',
  'LBL_LIST_FROM_EMAIL' => 'Email pošiljaoca',
  'LBL_LIST_FROM_NAME' => 'Ime pošiljaoca',
  'LBL_LIST_IN_QUEUE' => 'U obradi',
  'LBL_LIST_MESSAGE_NAME' => 'Marketinška poruka',
  'LBL_LIST_RECIPIENT_EMAIL' => 'Email primaoca',
  'LBL_LIST_RECIPIENT_NAME' => 'Ime primaoca',
  'LBL_LIST_SEND_ATTEMPTS' => 'Pokušaj slanja',
  'LBL_LIST_SEND_DATE_TIME' => 'Poslati na',
  'LBL_LIST_USER_NAME' => 'Korisničko ime',
  'LBL_LOCATION_ONLY' => 'Lokacija',
  'LBL_LOCATION_TRACK' => 'Lokacija fajlova za praćenje kampanje (kao što je campaign_tracker.php)',
  'LBL_CAMP_MESSAGE_COPY' => 'Sačuvaj kopije poruka kampanje:',
  'LBL_CAMP_MESSAGE_COPY_DESC' => 'Da li želite da sačuvate cele kopije SVAKE email poruke poslate za vreme kampanje? Mi Vam preporučujemo i postavljamo na podrazumeno na ne. Odabriom opcije ne biće sačuvani samo šablon koji je poslat i neophodne promenljive koje su potrebne da bi se ponovo kreirala pojedinačna poruka.',
  'LBL_MAIL_SENDTYPE' => 'Mail transfer agent:',
  'LBL_MAIL_SMTPAUTH_REQ' => 'Koristiti SMTP autentifikaciju:',
  'LBL_MAIL_SMTPPASS' => 'Lozinka:',
  'LBL_MAIL_SMTPUSER' => 'Korisničko ime:',
  'LBL_CHOOSE_EMAIL_PROVIDER' => 'Izaberite vašeg Email provajdera',
  'LBL_YAHOOMAIL_SMTPPASS' => 'Lozinka za Yahoo! email',
  'LBL_YAHOOMAIL_SMTPUSER' => 'ID za Yahoo! email',
  'LBL_GMAIL_SMTPPASS' => 'Lozinka za Gmail',
  'LBL_GMAIL_SMTPUSER' => 'Gmail Email adresa',
  'LBL_EXCHANGE_SMTPPASS' => 'Lozinka za Exchange',
  'LBL_EXCHANGE_SMTPUSER' => 'Korisničko ime za Exchange',
  'LBL_EXCHANGE_SMTPPORT' => 'Port Exchange Servera',
  'LBL_EMAIL_LINK_TYPE' => 'Email klijent',
  'LBL_EMAIL_LINK_TYPE_HELP' => '<b>Sugar Email klijent:</b>Šaljite Email-ove koristeći kljent u Sugar aplikaciji.<br><b>Eksterni Email klijent:</b>Šaljite Email-ove koristeći kljent van Sugar aplikacije, kao na primer Microsoft Outlook.',
  'LBL_MODULE_NAME' => 'Email podešavanja',
  'LBL_CONFIGURE_CAMPAIGN_EMAIL_SETTINGS' => 'Konfigurišite Email podešavanja za kampanje',
  'LBL_MODULE_TITLE' => 'Upravljanje porukama za slanje',
  'LBL_NOTIFICATION_ON_DESC' => 'Šalje korisnicima email poruku kao obaveštenje kada im je zapis dodeljen.',
  'LBL_NOTIFY_FROMADDRESS' => 'Adresa "Pošiljaoca":',
  'LBL_NOTIFY_FROMNAME' => 'Ime "Pošiljaoca":',
  'LBL_NOTIFY_ON' => 'Dodela obaveštenja',
  'LBL_NOTIFY_SEND_BY_DEFAULT' => 'Šalji obaveštenja novim korisnicima',
  'LBL_NOTIFY_TITLE' => 'Email opcije',
  'LBL_OLD_ID' => 'ID broj starog',
  'LBL_OUTBOUND_EMAIL_TITLE' => 'Opcije odlazne Email pošte',
  'LBL_RELATED_ID' => 'Id broj povezanog',
  'LBL_RELATED_TYPE' => 'Povezani tip',
  'LBL_SAVE_OUTBOUND_RAW' => 'Sačuvaj neobrađene odlazne elmail poruke',
  'LBL_SEARCH_FORM_PROCESSED_TITLE' => 'Pretraga obrađenih',
  'LBL_SEARCH_FORM_TITLE' => 'Pretraga odlaznih poruka',
  'LBL_VIEW_PROCESSED_EMAILS' => 'Pregledaj obrađene Email poruke',
  'LBL_VIEW_QUEUED_EMAILS' => 'Pregledaj Email poruke za slanje',
  'TRACKING_ENTRIES_LOCATION_DEFAULT_VALUE' => 'Vrednost podešavanja site_url u Config.php',
  'TXT_REMOVE_ME_ALT' => 'Da bi sebe ukloniti sa ove email liste idite na',
  'TXT_REMOVE_ME_CLICK' => 'kliknite ovde',
  'TXT_REMOVE_ME' => 'Da bi sebe ukloniti sa ove email liste',
  'LBL_NOTIFY_SEND_FROM_ASSIGNING_USER' => 'Pošalji obaveštenje sa email adrese dodeljenog korisnika',
  'LBL_SECURITY_TITLE' => 'Podešavanja sigurnosti za Email',
  'LBL_SECURITY_DESC' => 'Proverite sledeće što NE SME biti dozvoljeno kod dolazne Email pošte ili prikazano u Email modulu.',
  'LBL_SECURITY_APPLET' => 'Applet oznaka',
  'LBL_SECURITY_BASE' => 'Osnovna oznaka',
  'LBL_SECURITY_EMBED' => 'Utisnuta oznaka',
  'LBL_SECURITY_FORM' => 'Oznaka forme',
  'LBL_SECURITY_FRAME' => 'Oznaka okvira',
  'LBL_SECURITY_FRAMESET' => 'Oznaka postavke okvira',
  'LBL_SECURITY_IFRAME' => 'Oznaka za iFrame',
  'LBL_SECURITY_IMPORT' => 'Oznaka uvoza',
  'LBL_SECURITY_LAYER' => 'Oznaka sloja',
  'LBL_SECURITY_LINK' => 'Oznaka linka',
  'LBL_SECURITY_OBJECT' => 'Oznaka objekta',
  'LBL_SECURITY_OUTLOOK_DEFAULTS' => 'Izaberite podrazumevane minimalne mere predostrožnosti Outlook-a (greška sa strane u odnosu na tačan prikaz).',
  'LBL_SECURITY_SCRIPT' => 'Oznaka skripte',
  'LBL_SECURITY_STYLE' => 'Oznaka stila',
  'LBL_SECURITY_TOGGLE_ALL' => 'Promeni sve opcije',
  'LBL_SECURITY_XMP' => 'Xmp oznaka',
  'LBL_YES' => 'Da',
  'LBL_NO' => 'Ne',
  'LBL_PREPEND_TEST' => '[Test]:',
  'LBL_SEND_ATTEMPTS' => 'Pokušaj slanja',
  'LBL_OUTGOING_SECTION_HELP' => 'Konfigurišite podrazumevani server za odlaznu email poštu za slanje email obaveštenja, uključujući obaveštenja radnog toka.',
  'LBL_ALLOW_DEFAULT_SELECTION' => 'Dozvoli korisnicima da koriste ovaj nalog za odlazne email poruke:',
  'LBL_ALLOW_DEFAULT_SELECTION_HELP' => 'Kada je ova opcija odabrana, svi korisnici će biti u mogućnosti da šalju email poruke koristeći isti<br>nalog za odlazne email poruke koji se koristi za upozorenja i obaveštenja. Ako ova opcija nije odabrana,<br>korisnici mogu da koriste server za odlazne email poruke kada obezebede informacije o njihovom nalogu.',
  'LBL_FROM_ADDRESS_HELP' => 'Kada je omogućeno, korisničko ime i email adresa dodeljenog korisnika će biti dodati u polje "Od:" email-a. Ova funkcionalnost možda neće raditi sa SMTP serverima koji ne dozvoljavaju slanje sa drugog email naloga koji nije nalog servera.',
);

