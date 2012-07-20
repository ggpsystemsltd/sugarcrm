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
  'LBL_URL' => 'URL',
  'LBL_API_CONSKEY' => 'Consumer Key',
  'LBL_API_CONSSECRET' => 'Consumer Secret',
  'LBL_API_OAUTHTOKEN' => 'OAuth Token',
  'LBL_OAUTH_NAME' => '%s',
  'LBL_ASSIGNED_TO_ID' => 'Hozzárendelt felhasználói azonosító',
  'LBL_ASSIGNED_TO_NAME' => 'Felhasználó',
  'LBL_ID' => 'Azonosító',
  'LBL_DATE_ENTERED' => 'Dátum létrehozva',
  'LBL_DATE_MODIFIED' => 'Dátum módosítva',
  'LBL_MODIFIED' => 'Módosítva',
  'LBL_MODIFIED_ID' => 'Módosítva azonosító szerint',
  'LBL_MODIFIED_NAME' => 'Módosítva név szerint',
  'LBL_CREATED' => 'Létrehozva',
  'LBL_CREATED_ID' => 'Létrehozva azonosító szerint',
  'LBL_DESCRIPTION' => 'Leírás',
  'LBL_DELETED' => 'Törölve',
  'LBL_NAME' => 'Alkalmazás felhasználói neve',
  'LBL_CREATED_USER' => 'Létrehozva felhasználói név szerint',
  'LBL_MODIFIED_USER' => 'Módosítva felhasználói név szerint',
  'LBL_LIST_NAME' => 'Név',
  'LBL_TEAM' => 'Csoportok',
  'LBL_TEAMS' => 'Csoportok',
  'LBL_TEAM_ID' => 'Csoport azonosító',
  'LBL_LIST_FORM_TITLE' => 'Kiterjesztett Klienslista',
  'LBL_MODULE_NAME' => 'Klienslista',
  'LBL_MODULE_TITLE' => 'Klienslisták',
  'LBL_HOMEPAGE_TITLE' => 'Kiterjesztett Klienslistáim',
  'LNK_NEW_RECORD' => 'Kiterjesztett Klienslista Létrehozása',
  'LNK_LIST' => 'Kiterjesztett Klienslisták Megtekintése',
  'LNK_IMPORT_SUGAR_EAPM' => 'Kiterjesztett Klienslisták Importálása',
  'LBL_SEARCH_FORM_TITLE' => 'Kiterjesztett Klienslisták Keresése',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Előzmény Megtekintése',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Tevékenységek',
  'LBL_SUGAR_EAPM_SUBPANEL_TITLE' => 'Kiterjesztett Klienslisták',
  'LBL_NEW_FORM_TITLE' => 'Új Kiterjesztett Klienslista',
  'LBL_PASSWORD' => 'Alkalmazás Jelszó',
  'LBL_USER_NAME' => 'Alkalmazás Felhasználónév',
  'LBL_APPLICATION' => 'Alkalmazás',
  'LBL_API_DATA' => 'API Adat',
  'LBL_API_TYPE' => 'Bejelentkezési Típus',
  'LBL_AUTH_UNSUPPORTED' => 'Ez az azonosítás nincs támogatva az alkalmazás által',
  'LBL_AUTH_ERROR' => 'A Kiterjesztett Kliens azonosítása sikertelen.',
  'LBL_VALIDATED' => 'Hozzáférés érvényesítve',
  'LBL_ACTIVE' => 'Aktív',
  'LBL_SUGAR_USER_NAME' => 'Felhasználó',
  'LBL_DISPLAY_PROPERTIES' => 'Tulajdonságok megjelenítése',
  'LBL_ERR_NO_AUTHINFO' => 'Nincs azonosítási információ ehhez a Klienshez.',
  'LBL_ERR_NO_TOKEN' => 'Nincs érvényes token bejelentkezés ehhez a Klienshez.',
  'LBL_ERR_FAILED_QUICKCHECK' => 'Jelenleg nincs bejelentkezve. Kattintson az OK gombra a fiókjába való bejelentkezéshez és aktiválja a kiterjesztett Kliens rekordot.',
  'LBL_MEET_NOW_BUTTON' => 'Meeting most',
  'LBL_VIEW_LOTUS_LIVE_MEETINGS' => 'Aktuális LotusLive meetingek megtekintése',
  'LBL_TITLE_LOTUS_LIVE_MEETINGS' => 'Aktuális LotusLive meetingek',
  'LBL_VIEW_LOTUS_LIVE_DOCUMENTS' => 'LotusLive fájlok megtekintése',
  'LBL_TITLE_LOTUS_LIVE_DOCUMENTS' => 'LotusLive fájlok',
  'LBL_REAUTHENTICATE_LABEL' => 'Újraazonosítás',
  'LBL_REAUTHENTICATE_KEY' => 'a(z)',
  'LBL_APPLICATION_FOUND_NOTICE' => 'Ez a Kliens már létezik ebben az alkalmazásban.Visszahelyeztük.',
  'LBL_OMIT_URL' => '(http:// or https:// kihagyása)',
  'LBL_OAUTH_SAVE_NOTICE' => 'Kattintson a Save gombra egy kiterjesztett kliens rekord létrehozásához. Az alábbi oldalon adja meg a Sugar belépéséhez szükséges adatait. A belépést követően fiók információi elérhetőek is lesznek.',
  'LBL_BASIC_SAVE_NOTICE' => 'Kattintson a Save gombra egy kiterjesztett kliens rekord létrehozásához. Ezt követően Sugar adatai érvényesítve lesznek.',
  'LBL_ERR_FACEBOOK' => 'A Facebook-ban a lekérdezés során hiba lépett fel, a híreket nem tudja megjeleníteni.',
  'LBL_ERR_NO_RESPONSE' => 'Hiba történt a külső fióka történő mentés során.',
  'LBL_ERR_TWITTER' => 'A Twitter-ben a lekérdezés során hiba lépett fel, a híreket nem tudja megjeleníteni.',
);

