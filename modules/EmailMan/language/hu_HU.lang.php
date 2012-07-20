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
  'LBL_EXCHANGE_SMTPPORT' => 'Exchange Server Port',
  'LBL_EXCHANGE_SMTPSERVER' => 'Exchange Server',
  'LBL_MODULE_ID' => 'EmailMan',
  'LBL_SECURITY_APPLET' => 'Applet tag',
  'LBL_SECURITY_BASE' => 'Base tag',
  'LBL_SECURITY_EMBED' => 'Embed tag',
  'LBL_SECURITY_FRAME' => 'Frame tag',
  'LBL_SECURITY_FRAMESET' => 'Frameset tag',
  'LBL_SECURITY_IFRAME' => 'iFrame tag',
  'LBL_SECURITY_IMPORT' => 'Import tag',
  'LBL_SECURITY_LAYER' => 'Layer tag',
  'LBL_SECURITY_LINK' => 'Link tag',
  'LBL_SECURITY_OBJECT' => 'Object tag',
  'LBL_SECURITY_SCRIPT' => 'Script tag',
  'LBL_SECURITY_STYLE' => 'Style tag',
  'LBL_SECURITY_XMP' => 'Xmp tag',
  'LBL_SEND_DATE_TIME' => 'Küldés dátuma',
  'LBL_IN_QUEUE' => 'Feldolgozás alatt',
  'LBL_IN_QUEUE_DATE' => 'Sorba állítás dátuma',
  'ERR_INT_ONLY_EMAIL_PER_RUN' => 'Csak egész értékeket adja meg a küldendő Emailek számára',
  'LBL_ATTACHMENT_AUDIT' => 'elküldve. A tárhelyhasználat csökkentése érdekében nem készült helyi másolat.',
  'LBL_CONFIGURE_SETTINGS' => 'Email beállítások konfigurálása',
  'LBL_CUSTOM_LOCATION' => 'Felhasználó által definiált',
  'LBL_DEFAULT_LOCATION' => 'Alapértelmezett',
  'LBL_DISCLOSURE_TITLE' => 'Közlemény hozzáfűzése minden levélhez',
  'LBL_DISCLOSURE_TEXT_TITLE' => 'Közlemények tartalma',
  'LBL_DISCLOSURE_TEXT_SAMPLE' => 'FIGYELMEZTETÉS: Ez az e-mail üzenet kizárólagosa a címzett (ek) használatra íródott, és bizalmas és privát információ tartalmaz. A jogosulatlan felülvizsgálat, felhasználás, közlés, vagy terjesztés tilos. Ha nem Ön a címzett, kérjük a levél összes példányát semmisítse meg valamint az eredeti üzenetet is, és értesítse a feladót, hogy a címlistáját javítsa. Köszönöm.',
  'LBL_EMAIL_DEFAULT_CHARSET' => 'Email írása ezzel a karakterkészlettel',
  'LBL_EMAIL_DEFAULT_EDITOR' => 'Email írása ezen kliens használatával',
  'LBL_EMAIL_DEFAULT_DELETE_ATTACHMENTS' => 'A törölt Email-ekhez kapcsolódó megjegyzések és mellékletek törlése',
  'LBL_EMAIL_GMAIL_DEFAULTS' => 'Prefill Gmail ™ Alapértelmezett',
  'LBL_EMAIL_PER_RUN_REQ' => 'Elküldött email-ek száma egy kötegben:',
  'LBL_EMAIL_SMTP_SSL' => 'Engedélyezi az SMTP-SSL-t?',
  'LBL_EMAIL_USER_TITLE' => 'Felhasználói Email alapbeállítások',
  'LBL_EMAIL_OUTBOUND_CONFIGURATION' => 'Kimenő levelek beállítása',
  'LBL_EMAILS_PER_RUN' => 'Elküldött email-ek száma egy kötegben:',
  'LBL_ID' => 'Azonosító',
  'LBL_LIST_CAMPAIGN' => 'Kampány',
  'LBL_LIST_FORM_PROCESSED_TITLE' => 'Feldolgozott',
  'LBL_LIST_FORM_TITLE' => 'Sor',
  'LBL_LIST_FROM_EMAIL' => 'Email feladója',
  'LBL_LIST_FROM_NAME' => 'Feladó neve',
  'LBL_LIST_IN_QUEUE' => 'Folyamatban',
  'LBL_LIST_MESSAGE_NAME' => 'Marketing üzenet',
  'LBL_LIST_RECIPIENT_EMAIL' => 'Email címzettje',
  'LBL_LIST_RECIPIENT_NAME' => 'Címzett neve',
  'LBL_LIST_SEND_ATTEMPTS' => 'Küldés kísérletek',
  'LBL_LIST_SEND_DATE_TIME' => 'Továbbítás',
  'LBL_LIST_USER_NAME' => 'Felhasználó név',
  'LBL_LOCATION_ONLY' => 'Helyszín',
  'LBL_LOCATION_TRACK' => 'Kampány követő file-ok helye (mint a campaign_tracker.php)',
  'LBL_CAMP_MESSAGE_COPY' => 'Kampány üzenetek másolatainak megtartása:',
  'LBL_CAMP_MESSAGE_COPY_DESC' => 'Szeretné eltárolni a teljes másolatát minden egyes kampány alatt küldött email üzenetnek? Nyomatékosan ajánljuk hogy állítsa alapértelmezetten nem-re! Ha a nem-et választja, akkor csak a sablonok kerülnek eltárolásra a szükséges változókkal, amikből vissza lehet állítani minden egyes üzenet tartalmát.',
  'LBL_MAIL_SENDTYPE' => 'Mail Transfer Agent',
  'LBL_MAIL_SMTPAUTH_REQ' => 'SMTP hitelesítés:',
  'LBL_MAIL_SMTPPASS' => 'Jelszó:',
  'LBL_MAIL_SMTPSERVER' => 'SMTP Mail szerver:',
  'LBL_MAIL_SMTPUSER' => 'Felhasználónév:',
  'LBL_CHOOSE_EMAIL_PROVIDER' => 'Válassza ki az Email szolgáltatóját',
  'LBL_YAHOOMAIL_SMTPPASS' => 'Yahoo! Mail Jelszó',
  'LBL_YAHOOMAIL_SMTPUSER' => 'Yahoo! Mail azonosító',
  'LBL_GMAIL_SMTPPASS' => 'Gmail jelszó',
  'LBL_GMAIL_SMTPUSER' => 'Gmail Email -cím',
  'LBL_EXCHANGE_SMTPPASS' => 'Exchange jelszó',
  'LBL_EXCHANGE_SMTPUSER' => 'Exchange felhasználónév',
  'LBL_EMAIL_LINK_TYPE' => 'Email kliens',
  'LBL_EMAIL_LINK_TYPE_HELP' => 'Sugar Mail Client: Email küldés a Sugar email kliensével.<br />External Mail Client: Email küldés külső email kliensel, mint pl: Microsoft Outlook.',
  'LBL_MARKETING_ID' => 'Marketing azonosító',
  'LBL_MODULE_NAME' => 'Email beállítások',
  'LBL_CONFIGURE_CAMPAIGN_EMAIL_SETTINGS' => 'Kampány-mail beállítások konfigurálása',
  'LBL_MODULE_TITLE' => 'A kimenő Email sorkezelés',
  'LBL_NOTIFICATION_ON_DESC' => 'Ha engedélyezi, a felhasználók minden hozzájuk rendelt rekord-ról email értesítést kapnak.',
  'LBL_NOTIFY_FROMADDRESS' => '"Feladó" címe:',
  'LBL_NOTIFY_FROMNAME' => '"Feladó" neve:',
  'LBL_NOTIFY_ON' => 'Megbízás értesítések',
  'LBL_NOTIFY_SEND_BY_DEFAULT' => 'Értesítést küld az új felhasználók számára',
  'LBL_NOTIFY_TITLE' => 'Email beállítások',
  'LBL_OLD_ID' => 'Régi azonosító',
  'LBL_OUTBOUND_EMAIL_TITLE' => 'Kimenő Email beállítások',
  'LBL_RELATED_ID' => 'Kapcsolódó azonosító',
  'LBL_RELATED_TYPE' => 'Kapcsolódó típus',
  'LBL_SAVE_OUTBOUND_RAW' => 'Kimenő nyers email-ek mentése',
  'LBL_SEARCH_FORM_PROCESSED_TITLE' => 'Feldolgozott keresés',
  'LBL_SEARCH_FORM_TITLE' => 'Sor keresés',
  'LBL_VIEW_PROCESSED_EMAILS' => 'Feldolgozott Emailek megjelenítése',
  'LBL_VIEW_QUEUED_EMAILS' => 'Várakozó Emailek megjelenítése',
  'TRACKING_ENTRIES_LOCATION_DEFAULT_VALUE' => 'Config.php site_url beállításának értéke',
  'TXT_REMOVE_ME_ALT' => 'Ha el akarja távolítani magát erről az email listáról, lépjen tovább',
  'TXT_REMOVE_ME_CLICK' => 'Kattintson ide',
  'TXT_REMOVE_ME' => 'Ha el akarja távolítani magát erről az email listáról',
  'LBL_NOTIFY_SEND_FROM_ASSIGNING_USER' => 'Értesítés küldése a hozzárendelt felhasználók Email címéről',
  'LBL_SECURITY_TITLE' => 'Email biztonsági beállítások',
  'LBL_SECURITY_DESC' => 'Ellenőrizze a következőt, amit NEM kellene engedélyezni a Bejövő Email-eknél, illetve megjeleníteni az Email moduljában.',
  'LBL_SECURITY_FORM' => 'Űrlap címke',
  'LBL_SECURITY_OUTLOOK_DEFAULTS' => 'Outlook alapértelmezett minimális biztonsági beállításainak kiválasztása (hibák a helyes megjelenítés oldalán)',
  'LBL_SECURITY_TOGGLE_ALL' => 'Minden beállítás bekapcsolása',
  'LBL_YES' => 'Igen',
  'LBL_NO' => 'Nem',
  'LBL_PREPEND_TEST' => '[Teszt]:',
  'LBL_SEND_ATTEMPTS' => 'Küldés kísérletek',
  'LBL_OUTGOING_SECTION_HELP' => 'Az alapértelmezett kimenő mail szerver beállítása az értesítések és a riasztások küldésére.',
  'LBL_ALLOW_DEFAULT_SELECTION' => 'Engedélyezi a felhasználóknak a kimenő email-ek fiókjának az elérését:',
  'LBL_ALLOW_DEFAULT_SELECTION_HELP' => 'Ha ezt a beállítást választja, akkor minden felhasználó képes lesz email-eket küldeni ugyanazzal a kimenő email fiók hozzáféréssel, amin keresztül a rendszer értesítések és riasztások történnek.',
  'LBL_FROM_ADDRESS_HELP' => 'Ha engedélyezi, a hozzárendelt felhasználók neve és email címe is megjelenik az email From mezőjébe. Ez a funkció lehetséges hogy nem működik azokon az SMTP szervereken, amik nem engedélyeznek a szerverétől eltérő email fiók hozzáférést.',
);

