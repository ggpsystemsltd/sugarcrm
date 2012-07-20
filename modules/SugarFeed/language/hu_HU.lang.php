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
  'LBL_MY_FAVORITES_ONLY' => 'Kedvenceim',
  'LBL_ENABLE_EXTERNAL_CONNECTORS' => 'A Facebook és Twitter hírek megtekintésének engedélyezéséhez menjen az Összetevők menüpontba, ahol beállíthatja ezt az opciót.',
  'LBL_EXTERNAL_PREFIX' => 'Külső:',
  'LBL_EXTERNAL_WARNING' => 'A "külső" címkéjű elemhez egy külső fiókkal kell rendelkeznie.',
  'LBL_AUTHENTICATE' => 'Hitelesít',
  'LBL_AUTHENTICATION_PENDING' => 'Az Ön által kijelölt külső fiókok között van olyan, amely nem hitelesített. Kattintson a "Mégsem" gombra az Opciók ablakba a külső fiókok hitelesítéséhez, vagy az "OK" gombra a folytatáshoz hitelesítés nélkül.',
  'LBL_LINK_TYPE_Link' => 'Link',
  'LBL_TEAM' => 'Csoport',
  'LBL_TEAM_ID' => 'Csoport azonosító',
  'LBL_ASSIGNED_TO_ID' => 'Felelős felhasználó azonosító',
  'LBL_ASSIGNED_TO_NAME' => 'Hozzárendelve',
  'LBL_ID' => 'Azonosító',
  'LBL_DATE_ENTERED' => 'Létrehozás dátuma',
  'LBL_DATE_MODIFIED' => 'Módosítás dátuma',
  'LBL_MODIFIED' => 'Módosította',
  'LBL_MODIFIED_ID' => 'Módosította (azonosító szerint)',
  'LBL_MODIFIED_NAME' => 'Módosította (név szerint)',
  'LBL_CREATED' => 'Létrehozta',
  'LBL_CREATED_ID' => 'Létrehozta (azonosító szerint)',
  'LBL_DESCRIPTION' => 'Leírás',
  'LBL_DELETED' => 'Törölve',
  'LBL_NAME' => 'Név',
  'LBL_SAVING' => 'Mentés...',
  'LBL_SAVED' => 'Mentve',
  'LBL_CREATED_USER' => 'Felhasználó által létrehozva',
  'LBL_MODIFIED_USER' => 'Felhasználó által módosítva',
  'LBL_LIST_FORM_TITLE' => 'Sugar-hírcsatorna lista',
  'LBL_MODULE_NAME' => 'Sugar-hírcsatorna',
  'LBL_MODULE_TITLE' => 'Sugar-hírcsatorna',
  'LBL_DASHLET_DISABLED' => 'Figyelem: A Sugar-hírcsatorna rendszer tiltva van, új bejegyzés nem olvasható, amíg aktív.',
  'LBL_ADMIN_SETTINGS' => 'Sugar-hírcsatorna beállítások',
  'LBL_RECORDS_DELETED' => 'Minden korábbi Sugar-hírcsatorna bejegyzés eltávolításra került, ha engedélyezve van, az új bejegyzések automatikusan generálódnak.',
  'LBL_CONFIRM_DELETE_RECORDS' => 'Biztosan törölni akarja a Sugar-hírcsatorna bejegyzéseket?',
  'LBL_FLUSH_RECORDS' => 'Hírcsatorna bejegyzések törlése',
  'LBL_ENABLE_FEED' => 'Sugar-hírcsatorna engedélyezése',
  'LBL_ENABLE_MODULE_LIST' => 'Betöltés aktiválása a(z)',
  'LBL_HOMEPAGE_TITLE' => 'Sugar-hírcsatornáim',
  'LNK_NEW_RECORD' => 'Sugar-hírcsatorna létrehozása',
  'LNK_LIST' => 'Sugar-hírcsatorna',
  'LBL_SEARCH_FORM_TITLE' => 'Sugar-hírcsatorna keresés',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Előzmények megtekintése',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Tevékenységek',
  'LBL_SUGAR_FEED_SUBPANEL_TITLE' => 'Sugar-hírcsatorna',
  'LBL_NEW_FORM_TITLE' => 'Új Sugar-hírcsatorna',
  'LBL_ALL' => 'Mind',
  'LBL_USER_FEED' => 'Felhasználói hírcsatorna',
  'LBL_ENABLE_USER_FEED' => 'Felhasználói hírcsatorna aktiválása',
  'LBL_TO' => 'Küldés a csoportnak',
  'LBL_IS' => 'van',
  'LBL_DONE' => 'Kész',
  'LBL_TITLE' => 'Cím',
  'LBL_ROWS' => 'Sorok',
  'LBL_CATEGORIES' => 'Modulok',
  'LBL_TIME_LAST_WEEK' => 'Múlt hét',
  'LBL_TIME_WEEKS' => 'Hetek',
  'LBL_TIME_DAYS' => 'Napok',
  'LBL_TIME_YESTERDAY' => 'Tegnap',
  'LBL_TIME_HOURS' => 'Óra',
  'LBL_TIME_HOUR' => 'Óra',
  'LBL_TIME_MINUTES' => 'Perc',
  'LBL_TIME_MINUTE' => 'Perc',
  'LBL_TIME_SECONDS' => 'másodperc',
  'LBL_TIME_SECOND' => 'másodperc',
  'LBL_TIME_AGO' => 'előtt',
  'CREATED_CONTACT' => 'egy Új kapcsolat létrehozva',
  'CREATED_OPPORTUNITY' => 'egy ÚJ lehetőség létrehozva',
  'CREATED_CASE' => 'egy ÚJ eset létrehozva',
  'CREATED_LEAD' => 'egy ÚJ ajánlás létrehozva',
  'FOR' => 'részére',
  'CLOSED_CASE' => 'LEZÁRT eset',
  'CONVERTED_LEAD' => 'KONVERTÁLT ajánlás',
  'WON_OPPORTUNITY' => 'MEGNYERT lehetőség',
  'WITH' => '(-val)',
  'LBL_LINK_TYPE_Image' => 'Kép',
  'LBL_LINK_TYPE_YouTube' => 'YouTube™',
  'LBL_SELECT' => 'Válassza ki',
  'LBL_POST' => 'Hozzászólás',
);

