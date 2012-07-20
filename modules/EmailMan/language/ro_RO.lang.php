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
















	
$mod_strings = array (
  'LBL_OUTGOING_SECTION_HELP' => 'Configureaza serverul implicit pentru email-urile de expediat pentru a trasmite notificari, inclusiv alerte pentru fluxul de lucru.',
  'LBL_ALLOW_DEFAULT_SELECTION' => 'Permite utilizatorilor sa foloseasca acest cont pentru email-uri de expediat:',
  'LBL_ALLOW_DEFAULT_SELECTION_HELP' => 'Cand aceasta optiune este selectata, toti utilizatorii vor fi in masura sa expedieze email-uri prin intermediul aceluiasi cont de email ca cel utilizat pentru transmiterea notificarilor si alertelor. Daca optiunea nu este selectata, utilizatorii pot totusi sa foloseasca serverul de email dupa ce furnizeaza informatiile referitoare la propriul cont.',
  'LBL_FROM_ADDRESS_HELP' => 'Cand este activata, numele utilizatorilor si adresele de email vor fi incluse in campul De la: al email-ului. Aceasta facilitate este posibil sa nu functioneze cu serverele SMTP care nu permit transmierea de pe un cont de email diferit de cel al contului de server.',
  'LBL_EXCHANGE_SMTPSERVER' => 'Exchange Server',
  'LBL_SEND_DATE_TIME' => 'Data Transmiterii',
  'LBL_IN_QUEUE' => 'In Proces',
  'LBL_IN_QUEUE_DATE' => 'Data la Rand',
  'ERR_INT_ONLY_EMAIL_PER_RUN' => 'Utilizati numai valori integrale pentru  a specifica numarul de emailuri transmis pe serie',
  'LBL_ATTACHMENT_AUDIT' => 'a fost transmis. Nu a fost duplicat local pentru pentru a economisi utilizarea discului.',
  'LBL_CONFIGURE_SETTINGS' => 'Configreaza Setarile de Email',
  'LBL_CUSTOM_LOCATION' => 'Definite de Utilizator',
  'LBL_DEFAULT_LOCATION' => 'Implicit',
  'LBL_DISCLOSURE_TITLE' => 'Anexeaza Mesaj de Dezvaluire fiecarui Email',
  'LBL_DISCLOSURE_TEXT_TITLE' => 'Continutul Dezvaluirii',
  'LBL_DISCLOSURE_TEXT_SAMPLE' => 'NOTA: Acest mesaj email este destinat utilizarii exclusive de catre destinatar si poate contine informatiii confidentiale si privilegiate. Orice examinare neautorizata, utilizare, dezvaluire sau distribuire a acestuia este interzisa. Daca nu suteti destinatarul acestui mesaj va rugam sa distrugeti toate copiile mesajului original si sa notificati expeditorul, astfel incat inregistrarea adresei dumneavoastra sa poata fi corectata. Va multumim.',
  'LBL_EMAIL_DEFAULT_CHARSET' => 'Compune mesaje email cu acest set de caractere',
  'LBL_EMAIL_DEFAULT_EDITOR' => 'Compune email utilizand acest client',
  'LBL_EMAIL_DEFAULT_DELETE_ATTACHMENTS' => 'Sterge notele & atasamentele asociate odata cu stergerea Email-urilor',
  'LBL_EMAIL_GMAIL_DEFAULTS' => 'Preincarca setariel implicite ale GmailTM ',
  'LBL_EMAIL_PER_RUN_REQ' => 'Numar de email-uri expediate pe serie:',
  'LBL_EMAIL_SMTP_SSL' => 'Activate SMTP pe SSL?',
  'LBL_EMAIL_USER_TITLE' => 'Setarile Email Implicite ale Utilizatorului',
  'LBL_EMAIL_OUTBOUND_CONFIGURATION' => 'Configurarea email-urilor de expediat',
  'LBL_EMAILS_PER_RUN' => 'Numar de email-uri expediate pe serie:',
  'LBL_ID' => 'Date de Identificare',
  'LBL_LIST_CAMPAIGN' => 'Campanie',
  'LBL_LIST_FORM_PROCESSED_TITLE' => 'Procesat',
  'LBL_LIST_FORM_TITLE' => 'Coada',
  'LBL_LIST_FROM_EMAIL' => 'Din Email',
  'LBL_LIST_FROM_NAME' => 'Din Nume:',
  'LBL_LIST_IN_QUEUE' => 'In Proces',
  'LBL_LIST_MESSAGE_NAME' => 'Mesaj de Marketing',
  'LBL_LIST_RECIPIENT_EMAIL' => 'Email Destinatar',
  'LBL_LIST_RECIPIENT_NAME' => 'Nume Destinatar',
  'LBL_LIST_SEND_ATTEMPTS' => 'Incercari de Expediere',
  'LBL_LIST_SEND_DATE_TIME' => 'Expediat la',
  'LBL_LIST_USER_NAME' => 'Nume Utilizator',
  'LBL_LOCATION_ONLY' => 'Localizare',
  'LBL_LOCATION_TRACK' => 'Localizarea fisierelor de urmarire a campaniei (tip campanie_urmaritor.php)',
  'LBL_CAMP_MESSAGE_COPY' => 'Pastreaza copii ale mesajelor campaniei:',
  'LBL_CAMP_MESSAGE_COPY_DESC' => 'Doriti sa pastrati copii complete ale FIECARUI mesaj email expediat pe timpul tuturor campaniilor? Va recomandam setarea implicita pe NU. Alegerea acestei setari va determina stocarea numai a sablonului de transmis si a variabilelor necesare recrearii mesajului individual.',
  'LBL_MAIL_SENDTYPE' => 'Agent Transfer Email:',
  'LBL_MAIL_SMTPAUTH_REQ' => 'Utilizeaza Autentificare SMTP:',
  'LBL_MAIL_SMTPPASS' => 'Parola:',
  'LBL_MAIL_SMTPPORT' => 'Port SMTP:',
  'LBL_MAIL_SMTPSERVER' => 'Server SMTP de Email',
  'LBL_MAIL_SMTPUSER' => 'Nume Utilizator:',
  'LBL_CHOOSE_EMAIL_PROVIDER' => 'Alegeti furnizorul dumneavoastra de Email',
  'LBL_YAHOOMAIL_SMTPPASS' => 'Parola Yahoo!Mail',
  'LBL_YAHOOMAIL_SMTPUSER' => 'ID Yahoo!Mail',
  'LBL_GMAIL_SMTPPASS' => 'Parola Gmail',
  'LBL_GMAIL_SMTPUSER' => 'Adresa Gmail de Email',
  'LBL_EXCHANGE_SMTPPASS' => 'Schimba Parola',
  'LBL_EXCHANGE_SMTPUSER' => 'Numele de Utilizator Exchange ',
  'LBL_EXCHANGE_SMTPPORT' => 'Portul Exchange Server',
  'LBL_EMAIL_LINK_TYPE' => 'Client Email',
  'LBL_EMAIL_LINK_TYPE_HELP' => 'Client Email Sugar: Expediaza email-uri utilizand clientul de email din cadrul aplicatiei Sugar.
Client Email Extern: Expediaza email-uri utilizand un client de email din afara aplicatie Sugar, precum Microsoft Outlook.',
  'LBL_MARKETING_ID' => 'ID Marketing',
  'LBL_MODULE_ID' => 'EmailPersoana',
  'LBL_MODULE_NAME' => 'Setari Email',
  'LBL_CONFIGURE_CAMPAIGN_EMAIL_SETTINGS' => 'Configureaza Setarile de Email ale Campaniei',
  'LBL_MODULE_TITLE' => 'Mangementul Cozii de Email-uri la Expediere',
  'LBL_NOTIFICATION_ON_DESC' => 'Cand este activata, email-urile sunt expediate la utilizatori atunci cand exista inregstrari alocate acestora.',
  'LBL_NOTIFY_FROMADDRESS' => '"De La " Adresa:',
  'LBL_NOTIFY_FROMNAME' => '"De La " Nume:',
  'LBL_NOTIFY_ON' => 'Notificari de Alocare',
  'LBL_NOTIFY_SEND_BY_DEFAULT' => 'Expediaza notificari noilor utilizatori',
  'LBL_NOTIFY_TITLE' => 'Optiuni de Email',
  'LBL_OLD_ID' => 'ID Vechi',
  'LBL_OUTBOUND_EMAIL_TITLE' => 'Optiuni pentru Email-urile de expediat',
  'LBL_RELATED_ID' => 'ID Asociat',
  'LBL_RELATED_TYPE' => 'Tip Asociere',
  'LBL_SAVE_OUTBOUND_RAW' => 'Salveaza Ciornele Email-urilor de Expediat',
  'LBL_SEARCH_FORM_PROCESSED_TITLE' => 'Cautare Procesata',
  'LBL_SEARCH_FORM_TITLE' => 'Coada de Cautari',
  'LBL_VIEW_PROCESSED_EMAILS' => 'Vizualizeaza Email-uri Procesate',
  'LBL_VIEW_QUEUED_EMAILS' => 'Vizualizeaza Email-uri in Coada',
  'TRACKING_ENTRIES_LOCATION_DEFAULT_VALUE' => 'Valoare a Config.php setare site_url',
  'TXT_REMOVE_ME_ALT' => 'Pentru a va inlatura din aceasta lista de email-uri mergeti la',
  'TXT_REMOVE_ME_CLICK' => 'dati click aici',
  'TXT_REMOVE_ME' => 'Pentru a va inlatura din aceasta lista de email-uri',
  'LBL_NOTIFY_SEND_FROM_ASSIGNING_USER' => 'Expediaza notificare din alocare adrese email pentru utilizatori',
  'LBL_SECURITY_TITLE' => 'Setari de Securitate Email',
  'LBL_SECURITY_DESC' => 'Verificati ca urmatoarelor sa NU li se permita accesul prin Email de Intrare sau sa fie afisate in modulul de Email-uri.',
  'LBL_SECURITY_APPLET' => 'Eticheta Aplicatie',
  'LBL_SECURITY_BASE' => 'Eticheta Baza',
  'LBL_SECURITY_EMBED' => 'Eticheta Incorporata',
  'LBL_SECURITY_FORM' => 'De la Eticheta ',
  'LBL_SECURITY_FRAME' => 'Eticheta Rama',
  'LBL_SECURITY_FRAMESET' => 'Eticheta Seturi de Rame',
  'LBL_SECURITY_IFRAME' => 'Eticheta iRama',
  'LBL_SECURITY_IMPORT' => 'Eticheta Import',
  'LBL_SECURITY_LAYER' => 'Eticheta Strat',
  'LBL_SECURITY_LINK' => 'Eticheta Legatura',
  'LBL_SECURITY_OBJECT' => 'Eticheta Obiect',
  'LBL_SECURITY_OUTLOOK_DEFAULTS' => 'Selectati setarile implicite de securitate minima ale Outlook (errs de partea afisarii corecte)',
  'LBL_SECURITY_SCRIPT' => 'Eticheta Scenariu',
  'LBL_SECURITY_STYLE' => 'Eticheta Stil',
  'LBL_SECURITY_TOGGLE_ALL' => 'Comuta Toate Optiunile',
  'LBL_SECURITY_XMP' => 'Eticheta Xmp',
  'LBL_YES' => 'Da',
  'LBL_NO' => 'Nu',
  'LBL_PREPEND_TEST' => '[Test]',
  'LBL_SEND_ATTEMPTS' => 'Incercari de Expediere',
);

