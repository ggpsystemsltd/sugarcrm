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
  'LBL_LIST_NAME' => 'Name',
  'LBL_TEAMS' => 'Teams',
  'LBL_URL' => 'URL',
  'LBL_API_OAUTHTOKEN' => 'OAuth Token',
  'LBL_OAUTH_NAME' => '%s',
  'LBL_SUGAR_USER_NAME' => 'Sugar User',
  'LBL_REAUTHENTICATE_KEY' => 'a',
  'LBL_ASSIGNED_TO_ID' => 'Zugewiesene BenutzerID',
  'LBL_ASSIGNED_TO_NAME' => 'zugeordnet zu',
  'LBL_DATE_ENTERED' => 'Erstellt am',
  'LBL_DATE_MODIFIED' => 'Geändert am',
  'LBL_MODIFIED' => 'Geändert von',
  'LBL_MODIFIED_ID' => 'Geändert von ID',
  'LBL_MODIFIED_NAME' => 'Geändert von Name',
  'LBL_CREATED' => 'Erstellt von',
  'LBL_CREATED_ID' => 'Erstellt von ID',
  'LBL_DESCRIPTION' => 'Beschreibung',
  'LBL_DELETED' => 'Gelöscht',
  'LBL_NAME' => 'Anweundung User Name',
  'LBL_CREATED_USER' => 'Erstellter Benutzer',
  'LBL_MODIFIED_USER' => 'Geändert von',
  'LBL_TEAM' => 'Team',
  'LBL_TEAM_ID' => 'Team ID',
  'LBL_LIST_FORM_TITLE' => 'Externe Kontenliste',
  'LBL_MODULE_NAME' => 'Externe Konten',
  'LBL_MODULE_TITLE' => 'Externe Konten',
  'LBL_HOMEPAGE_TITLE' => 'Meine externe Konten',
  'LNK_NEW_RECORD' => 'Externe Konten erstellen',
  'LNK_LIST' => 'Externe Konten anschauen',
  'LNK_IMPORT_SUGAR_EAPM' => 'Externe Konten importieren',
  'LBL_SEARCH_FORM_TITLE' => 'Suche externe Konten',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Verlauf ansehen',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Aktivitäten',
  'LBL_SUGAR_EAPM_SUBPANEL_TITLE' => 'Externe Konten',
  'LBL_NEW_FORM_TITLE' => 'Neue externe Konten',
  'LBL_PASSWORD' => 'Passwort',
  'LBL_USER_NAME' => 'Benutzername',
  'LBL_APPLICATION' => 'Anwendung',
  'LBL_API_DATA' => 'API Daten',
  'LBL_API_TYPE' => 'Logintyp',
  'LBL_API_CONSKEY' => 'Kunden Schlüssel ( defined in ./modules/Connectors/connectors/sources/ext/rest/twitter/language/de_DE.lang.php )',
  'LBL_API_CONSSECRET' => 'Kunden Kennwort ( defined in ./modules/Connectors/connectors/sources/ext/rest/twitter/language/de_DE.lang.php )',
  'LBL_AUTH_UNSUPPORTED' => 'Diese Authentifizierungsmethode ist von der Anwendung nicht unterstützt.',
  'LBL_AUTH_ERROR' => 'Die Verbindung mit diesem Konto war nicht erfolgreich',
  'LBL_VALIDATED' => 'Verbunden',
  'LBL_ACTIVE' => 'Aktiv',
  'LBL_DISPLAY_PROPERTIES' => 'Anzeigeeigenschaften',
  'LBL_CONNECT_BUTTON_TITLE' => 'Verbinden',
  'LBL_NOTE' => 'Hinweis: ( defined in ./modules/Notes/language/de_DE.lang.php )',
  'LBL_CONNECTED' => 'Verbunden',
  'LBL_DISCONNECTED' => 'Nicht verbunden',
  'LBL_ERR_NO_AUTHINFO' => 'Es gibt keine Zugangsdaten für dieses Konto',
  'LBL_ERR_NO_TOKEN' => 'Es gibt keine gültigen Tokens für dieses Konto.',
  'LBL_ERR_FAILED_QUICKCHECK' => 'Sie sind momentan mit Ihrem Konto verbunden. Bitte OK, um die Verbindung herzustellen.',
  'LBL_MEET_NOW_BUTTON' => 'Meeting jetzt',
  'LBL_VIEW_LOTUS_LIVE_MEETINGS' => 'Geplante LotusLive&trade; Meetings anschauen',
  'LBL_TITLE_LOTUS_LIVE_MEETINGS' => 'Geplante LotusLive&trade; Meetings',
  'LBL_VIEW_LOTUS_LIVE_DOCUMENTS' => 'LotusLive&trade; Dateien anschauen',
  'LBL_TITLE_LOTUS_LIVE_DOCUMENTS' => 'LotusLive&trade; Dateien',
  'LBL_REAUTHENTICATE_LABEL' => 'Revalidieren',
  'LBL_APPLICATION_FOUND_NOTICE' => 'Ein Konto für diese Anwendung existiert bereits. Das existierende Konto ist wieder aktiviert.',
  'LBL_OMIT_URL' => '( http:// or https:// weglassen)',
  'LBL_OAUTH_SAVE_NOTICE' => 'Verbinden auswählen, um Ihre Kontodaten über die Verifizierungsseite aus Sugar zu verifizieren. Nachdem Sie verbunden sind, werden Sie nach Sugar zurückgeschickt',
  'LBL_BASIC_SAVE_NOTICE' => 'Verbinden auswählen, um mit diesem Konto mit Sugar zu verbinden',
  'LBL_ERR_FACEBOOK' => 'Facebook hat einen Fehler gemeldet, deshalb kann der Feed nicht angezeigt werden.',
  'LBL_ERR_NO_RESPONSE' => 'Ein Fehler ist bei der Verbindung mit diesem Konto aufgetreten',
  'LBL_ERR_TWITTER' => 'Twitter hat einen Fehler gemeldet, deshalb kann der Feed nicht angezeigt werden.',
  'LBL_ERR_POPUPS_DISABLED' => 'Bitte Browser Popups erlauben oder eine Ausnahme für diese Webseite erlauben, um eine Verbindung aufzubauen.',
);

