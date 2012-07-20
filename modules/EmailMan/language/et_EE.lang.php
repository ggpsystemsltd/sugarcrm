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
  'LBL_EMAIL_SMTP_SSL' => 'Enable SMTP over SSL?',
  'LBL_ID' => 'Id',
  'LBL_MAIL_SENDTYPE' => 'Mail Transfer Agent:',
  'LBL_MAIL_SMTPSERVER' => 'SMTP Mail Server:',
  'LBL_YAHOOMAIL_SMTPPASS' => 'Yahoo! Mail Password',
  'LBL_YAHOOMAIL_SMTPUSER' => 'Yahoo! Mail ID',
  'LBL_MODULE_ID' => 'EmailMan',
  'TRACKING_ENTRIES_LOCATION_DEFAULT_VALUE' => 'Value of Config.php setting site_url',
  'LBL_SECURITY_APPLET' => 'Applet tag',
  'LBL_SECURITY_BASE' => 'Base tag',
  'LBL_SECURITY_EMBED' => 'Embed tag',
  'LBL_SECURITY_FORM' => 'Form tag',
  'LBL_SECURITY_FRAMESET' => 'Frameset tag',
  'LBL_SECURITY_IFRAME' => 'iFrame tag',
  'LBL_SECURITY_LAYER' => 'Layer tag',
  'LBL_SECURITY_LINK' => 'Link tag',
  'LBL_SECURITY_OBJECT' => 'Object tag',
  'LBL_SECURITY_OUTLOOK_DEFAULTS' => 'Select Outlook default minimum security settings (errs on the side of correct display).',
  'LBL_SECURITY_SCRIPT' => 'Script tag',
  'LBL_SECURITY_STYLE' => 'Style tag',
  'LBL_SECURITY_TOGGLE_ALL' => 'Toggle All Options',
  'LBL_SECURITY_XMP' => 'Xmp tag',
  'LBL_SEND_ATTEMPTS' => 'Send Attempts',
  'LBL_OUTGOING_SECTION_HELP' => 'Configure the default outgoing mail server for sending email notifications, including workflow alerts.',
  'LBL_FROM_ADDRESS_HELP' => 'When enabled, the assigning user\\\'s name and email address will be included in the From field of the email. This feature might not work with SMTP servers that do not allow sending from a different email account than the server account.',
  'LBL_SEND_DATE_TIME' => 'Saatmiskuupäev:',
  'LBL_IN_QUEUE' => 'Töös',
  'LBL_IN_QUEUE_DATE' => 'Ootelepaneku kuupäev',
  'ERR_INT_ONLY_EMAIL_PER_RUN' => 'Saadetavate e-kirjade arvu täpsustamisel kasutage ainult täisarve',
  'LBL_ATTACHMENT_AUDIT' => 'saadetud. Seda ei dubleeritud lokaalselt, et säilitada kettamahtu.',
  'LBL_CONFIGURE_SETTINGS' => 'Konfigureeri e-posti sätteid',
  'LBL_CUSTOM_LOCATION' => 'Kasutaja on määratletud',
  'LBL_DEFAULT_LOCATION' => 'Vaikimisi',
  'LBL_DISCLOSURE_TITLE' => 'Lisa avalikustamisteade iga e-kirjaga',
  'LBL_DISCLOSURE_TEXT_TITLE' => 'Avalikustamise sisukord',
  'LBL_DISCLOSURE_TEXT_SAMPLE' => 'TEADE: Käesolev e-kiri on suunatud ainult kindlale saaja(te)le ja võib sisaldada konfidentsiaalset informatsiooni. Kõrvaliste isikutel on keelatud selle info vaatamine, kasutamine ning avaldamine. Kui te ei ole kirja adressaat, siis palun hävitage see e-kiri ning võimalikud koopiad ning teavitage saatjat, et saaksime aadressi parandada. Täname!',
  'LBL_EMAIL_DEFAULT_CHARSET' => 'Koostage e-kirju selles kooditabelis',
  'LBL_EMAIL_DEFAULT_EDITOR' => 'Koosta e-kiri selle kliendi põhjal',
  'LBL_EMAIL_DEFAULT_DELETE_ATTACHMENTS' => 'Koos kustutatud e-kirjadega kustuta ka seotud märkused ja manused',
  'LBL_EMAIL_GMAIL_DEFAULTS' => 'Täida Gmail™ vaikeseaded',
  'LBL_EMAIL_PER_RUN_REQ' => 'Saadetud e-kirju partii kohta:',
  'LBL_EMAIL_USER_TITLE' => 'Kasutaja e-posti vaikeseaded',
  'LBL_EMAIL_OUTBOUND_CONFIGURATION' => 'Väljaminevate e-kirjade konfiguratsioon',
  'LBL_EMAILS_PER_RUN' => 'Saadetud e-kirju partii kohta:',
  'LBL_LIST_CAMPAIGN' => 'Kampaania',
  'LBL_LIST_FORM_PROCESSED_TITLE' => 'Töödeldud',
  'LBL_LIST_FORM_TITLE' => 'Ootejärjekord',
  'LBL_LIST_FROM_EMAIL' => 'E-kirjast',
  'LBL_LIST_FROM_NAME' => 'Nime alt:',
  'LBL_LIST_IN_QUEUE' => 'Töötlemisel',
  'LBL_LIST_MESSAGE_NAME' => 'Turundussõnum',
  'LBL_LIST_RECIPIENT_EMAIL' => 'Saaja e-post',
  'LBL_LIST_RECIPIENT_NAME' => 'Saaja nimi',
  'LBL_LIST_SEND_ATTEMPTS' => 'Saada katsed',
  'LBL_LIST_SEND_DATE_TIME' => 'Saadetud',
  'LBL_LIST_USER_NAME' => 'Kasutajanimi',
  'LBL_LOCATION_ONLY' => 'Asukoht',
  'LBL_LOCATION_TRACK' => 'Kampaania jälgimise failide asukoht (nagu campaign_tracker.php)',
  'LBL_CAMP_MESSAGE_COPY' => 'Kampaania sõnumite koopiad hoia:',
  'LBL_CAMP_MESSAGE_COPY_DESC' => 'Kas soovite hoiustada täielikud koopiad kõigi e-kirjade kohta, mis on kampaaniate käigus edastatud? Soovitame mitte ja see on ka vaikimisi seadistus. Valides Ei hoiustatakse vaid saadetud sõnumi mall, mis on vajalik uue individuaalse sõnumi taasloomiseks.',
  'LBL_MAIL_SMTPAUTH_REQ' => 'Kasuta SMTP autentimist:',
  'LBL_MAIL_SMTPPASS' => 'Salasõna:',
  'LBL_MAIL_SMTPPORT' => 'SMTP Port:',
  'LBL_MAIL_SMTPUSER' => 'Kasutajanimi:',
  'LBL_CHOOSE_EMAIL_PROVIDER' => 'Vali oma e-posti teenusepakkuja',
  'LBL_GMAIL_SMTPPASS' => 'Gmaili salasõna',
  'LBL_GMAIL_SMTPUSER' => 'Gmaili e-posti aadress',
  'LBL_EXCHANGE_SMTPPASS' => 'Vaheta salasõna',
  'LBL_EXCHANGE_SMTPUSER' => 'Vaheta kasutajanime',
  'LBL_EXCHANGE_SMTPPORT' => 'Vaheta Server Port',
  'LBL_EXCHANGE_SMTPSERVER' => 'Vaheta server',
  'LBL_EMAIL_LINK_TYPE' => 'E-posti klient',
  'LBL_EMAIL_LINK_TYPE_HELP' => 'Sugar Mail klient: Saada e-kirju kasutades Sugarit<br />Väline Mail klient: Saada e-kirju kasutades muid rakendusi, näiteks Microsoft Outlook.',
  'LBL_MARKETING_ID' => 'Turundus Id',
  'LBL_MODULE_NAME' => 'E-kirja sätted',
  'LBL_CONFIGURE_CAMPAIGN_EMAIL_SETTINGS' => 'Konfigureeri kampaania e-kirja sätteid',
  'LBL_MODULE_TITLE' => 'Väljaminevate e-kirjade ootejärjekorra juhtimine',
  'LBL_NOTIFICATION_ON_DESC' => 'Kui lubatud, siis e-kirjad saadetakse kasutajatele kui kirjed on neile määratud',
  'LBL_NOTIFY_FROMADDRESS' => '"Kellelt" aadress',
  'LBL_NOTIFY_FROMNAME' => '"Kellelt" nimi:',
  'LBL_NOTIFY_ON' => 'Vastutamisteavitused',
  'LBL_NOTIFY_SEND_BY_DEFAULT' => 'Saada teavitused uutele kasutajatele',
  'LBL_NOTIFY_TITLE' => 'E-posti suvandid',
  'LBL_OLD_ID' => 'Vana Id',
  'LBL_OUTBOUND_EMAIL_TITLE' => 'Väljaminevate e-kirjade suvandid',
  'LBL_RELATED_ID' => 'Seotud Id',
  'LBL_RELATED_TYPE' => 'Seotud tüüp',
  'LBL_SAVE_OUTBOUND_RAW' => 'Salvesta väljaminevate e-kirjade rida',
  'LBL_SEARCH_FORM_PROCESSED_TITLE' => 'Töödeldud otsing',
  'LBL_SEARCH_FORM_TITLE' => 'Ootejärjekorra otsing',
  'LBL_VIEW_PROCESSED_EMAILS' => 'Vaata töödeldud e-kirju',
  'LBL_VIEW_QUEUED_EMAILS' => 'Vaata ootel e-kirju',
  'TXT_REMOVE_ME_ALT' => 'Enda eemaldamiseks sellest e-posti listist mine',
  'TXT_REMOVE_ME_CLICK' => 'kliki siia',
  'TXT_REMOVE_ME' => 'Enda eemaldamiseks sellest e-posti listist',
  'LBL_NOTIFY_SEND_FROM_ASSIGNING_USER' => 'Saada teavitus määratud kasutaja e-posti aadressilt',
  'LBL_SECURITY_TITLE' => 'E-posti turvasätted',
  'LBL_SECURITY_DESC' => 'Kontrolli järgnevalt, mis pole lubatud sissetuleva e-kirjas või kuvatud e-kirjade moodulis.',
  'LBL_SECURITY_FRAME' => 'Frame tag',
  'LBL_SECURITY_IMPORT' => 'Import tag',
  'LBL_YES' => 'Jah',
  'LBL_NO' => 'Ei',
  'LBL_PREPEND_TEST' => '[Test]:',
  'LBL_ALLOW_DEFAULT_SELECTION' => 'Luba kasutajatel seda kontot kasutada väljaminevate e-kirjade jaoks:',
  'LBL_ALLOW_DEFAULT_SELECTION_HELP' => 'When this option selected, all users will be able to send emails using the same outgoing<br />mail account used to send system notifications and alerts. If the option is not selected,<br />users can still use the outgoing mail server after providing their own account information.',
);

