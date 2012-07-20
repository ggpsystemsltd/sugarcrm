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
  'LBL_SNIP_SUGAR_URL' => 'URL dieser Sugar Instanz',
  'LBL_SNIP_STATUS_ERROR_SUMMARY' => 'Diese Instanz hat eine gültige E-Mail Archivierungsserverlizenz, aber der Server hat die folgende Fehler gemeldet',
  'LBL_SNIP_STATUS_FAIL' => 'Der E.Mail Archiverungs Server kann nicht registriert werden',
  'LBL_SNIP_STATUS_FAIL_SUMMARY' => 'Der E-Mail Archivierungsdienst ist momentan nicht verfügbar. Entweder ist der Dienst momentan nicht verfügbar, oder die Verbindung zur Sugar Instanz ist fehlgeschlagen.',
  'LBL_SNIP_GENERIC_ERROR' => 'Der E-Mail Archivierungsdienst ist momentan nicht verfügbar. Entweder ist der Dienst momentan nicht verfügbar, oder die Verbindung zur Sugar Instanz ist fehlgeschlagen.',
  'LBL_SNIP_STATUS_RESET' => 'Noch nicht gelaufen',
  'LBL_SNIP_STATUS_PROBLEM' => 'Problem: %s',
  'LBL_SNIP_NEVER' => 'Nie',
  'LBL_SNIP_STATUS_SUMMARY' => 'Status E-Mail Archivierungsdienst',
  'LBL_SNIP_ACCOUNT' => 'E-Mail Archivierungskonto',
  'LBL_SNIP_STATUS' => 'Status',
  'LBL_SNIP_LAST_SUCCESS' => 'Zuletzt erfolgreich ausgeführt',
  'LBL_SNIP_DESCRIPTION' => 'Der E-Mail Archivierungsdienst ist ein automatisches E-Mail Archiverungsdienst',
  'LBL_SNIP_DESCRIPTION_SUMMARY' => 'Hiermit können gesendete E-Mails von Ihrem externen E-Mail Cleint gesehen werden, ohne die E-Mails manuell zu importieren.',
  'LBL_SNIP_PURCHASE_SUMMARY' => 'Um die E-Mail Archivierungsdienst zu verwenden, muß eine Lizenz für Ihr System erworben werden.',
  'LBL_SNIP_PURCHASE' => 'Bitte hier kaufen',
  'LBL_SNIP_EMAIL' => 'E-Mail Archivierungsadresse',
  'LBL_SNIP_AGREE' => 'Ich bin mit der folgenden Bedingungen und die <a href=&#39;http://www.sugarcrm.com/crm/TRUSTe/privacy.html&#39; target=&#39;_blank&#39;>Geheimhaltungs-Vereinbarung</a>.',
  'LBL_SNIP_PRIVACY' => 'Geheimhaltungs-Vereinbarung',
  'LBL_SNIP_STATUS_PINGBACK_FAIL' => 'Pingback fehlgeschlagen',
  'LBL_SNIP_STATUS_PINGBACK_FAIL_SUMMARY' => 'Der E-Mail Archiverungsserver kann keine Verbindung mit Ihrem Sugar System herstellen. Bitte später versuchen oder <a href="http://www.sugarcrm.com/crm/case-tracker/submit.html?lsd=supportportal&tmpl=" target="_blank">Sugar Support kontaktieren</a>.',
  'LBL_SNIP_BUTTON_ENABLE' => 'E-Mail Archiverung aktivieren',
  'LBL_SNIP_BUTTON_DISABLE' => 'E-Mail Archiverung deaktivieren',
  'LBL_SNIP_BUTTON_RETRY' => 'Nochmals Verbinden',
  'LBL_SNIP_ERROR_DISABLING' => 'Ein Fehler ist aufgetreten bei der Verbindung mit dem E-Mail Archvierungs-Server und der Dienst kann nicht deaktiviert werden.',
  'LBL_SNIP_ERROR_ENABLING' => 'Ein Fehler ist aufgetreten bei der Verbindung mit dem E-Mail Archvierungs-Server und der Dienst kann nicht aktiviert werden.',
  'LBL_CONTACT_SUPPORT' => 'Bitte später versuchen oder Sugar Support kontaktieren',
  'LBL_SNIP_SUPPORT' => 'Bitte Sugar Support für weitere Unterstützung',
  'ERROR_BAD_RESULT' => 'Der Dienst liefert  eine Fehlermeldung',
  'ERROR_NO_CURL' => 'cURL Erweiterung ist notwendig, ist aber nicht aktiviert',
  'ERROR_REQUEST_FAILED' => 'Der Server kann nicht erreicht werden',
  'LBL_CANCEL_BUTTON_TITLE' => 'Abbrechen',
  'LBL_SNIP_MOUSEOVER_STATUS' => 'Hier wird der Status der E-Mail Archivierungsdienst auf diesem System angezeigt. Der Status zeigt ob diesen Dienst gerade aktiv ist oder nicht.',
  'LBL_SNIP_MOUSEOVER_EMAIL' => 'Hier ist die E-Mail Archivierungs E-Mail Adresse was verwendet wird, um E-Mail in Sugar zu importieren.',
  'LBL_SNIP_MOUSEOVER_SERVICE_URL' => 'Hier ist der E-Mail Archiverungs Server URL. Alle Anfragen, z.B. um den Dienst zu aktivieren oder deaktivieren werden über diesen URL übertragen.',
  'LBL_SNIP_MOUSEOVER_INSTANCE_URL' => 'Hier ist der Webservice URL von Ihrer Sugar Instanz. Der E-Mail Archivierungsserver wird mit diesem URL verbunden',
  'LBL_SNIP_SUMMARY' => 'E-Mail Archivierung ist eine Importdienst, was Benutzer erlaubt E-Mails aus iregendeinen E-Mail Client zu importieren, Jedes Sugar System hat seine eigene eindeutige E-Mail Adresse. Um E-Mails zu importieren, senden die E-Mail entwerder über AN, CC, BCC mit der Archiverungs E-Mail Adresse. <br /><br />Der E-Mail Archiverungsdienst importiert diese E-Mail. Der Dienst importiert auch alle Anhänge, Bilder oder Kalendareinträge in diese E-Mail und hängt diese E-Mail bei alle passenden Sugar Objekte an.<br /><br />Bitte die Bedingungen unten akzeptieren, um diesen Dienst zu verwenden. Sie können jederzeit diesen Dienst deaktivieren, Wenn der Dienst aktiviert ist, dann wird die neue E-Mail Adresse gezeigt.',
  'LBL_REGISTER_SNIP_FAIL' => 'Zugriff auf E-Mail Archivierung Dienst fehgeschlagen: %s!<br>',
  'LBL_CONFIGURE_SNIP' => 'E-Mail archivierung',
  'LBL_DISABLE_SNIP' => 'Deaktivieren',
  'LBL_SNIP_APPLICATION_UNIQUE_KEY' => 'Anwendung EIndeutiger Key',
  'LBL_SNIP_USER' => 'E-Mail Archiverung Benutzer',
  'LBL_SNIP_PWD' => 'E-Mail Archiverung Kennwort',
  'LBL_SNIP_CALLBACK_URL' => 'E-Mail Archivierungsdienst URL',
  'LBL_SNIP_USER_DESC' => 'E-Mail Archiverung Benutzer',
  'LBL_SNIP_STATUS_OK' => 'Aktiviert',
  'LBL_SNIP_STATUS_OK_SUMMARY' => 'Diese Sugar Instanz ist mit dem E-Mal Archivierungsdienst verbunden',
  'LBL_SNIP_STATUS_ERROR' => 'Fehler:',
);

