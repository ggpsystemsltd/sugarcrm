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
  'LBL_MODULE_NAME' => 'Lehetőségek',
  'LBL_MODULE_TITLE' => 'Lehetőségek: Főoldal',
  'LBL_SEARCH_FORM_TITLE' => 'Lehetőségek keresése',
  'LBL_VIEW_FORM_TITLE' => 'Lehetőségek megtekintése',
  'LBL_LIST_FORM_TITLE' => 'Lehetőségek listája',
  'LBL_OPPORTUNITY_NAME' => 'Lehetőség neve:',
  'LBL_OPPORTUNITY' => 'Lehetőség:',
  'LBL_NAME' => 'Lehetőség neve',
  'LBL_INVITEE' => 'Kapcsolatok',
  'LBL_CURRENCIES' => 'Pénznemek',
  'LBL_LIST_OPPORTUNITY_NAME' => 'Név',
  'LBL_LIST_ACCOUNT_NAME' => 'Kliens neve',
  'LBL_LIST_AMOUNT' => 'Lehetőség összege',
  'LBL_LIST_AMOUNT_USDOLLAR' => 'Összeg',
  'LBL_LIST_DATE_CLOSED' => 'Zárás',
  'LBL_LIST_SALES_STAGE' => 'Eladási szint:',
  'LBL_ACCOUNT_ID' => 'Kliens azonosító',
  'LBL_CURRENCY_ID' => 'Pénznem azonosító',
  'LBL_CURRENCY_NAME' => 'Pénznem neve',
  'LBL_CURRENCY_SYMBOL' => 'Pénznem szimbólum',
  'LBL_TEAM_ID' => 'Csoport azonosító',
  'UPDATE' => 'Lehetőség - Pénznem frissítése',
  'UPDATE_DOLLARAMOUNTS' => 'USA dollár összegek frissítése',
  'UPDATE_VERIFY' => 'Összegek ellenőrzése',
  'UPDATE_VERIFY_TXT' => 'Ellenőrzi, hogy az összegek érvényes decimális(.) vagy numerikus(0-9) karakterek-e.',
  'UPDATE_FIX' => 'Megerősített összegek',
  'UPDATE_FIX_TXT' => 'Megkísérli kijavítani az érvénytelen értékeket valós decimális értékekre. Minden módosított biztonsági mentés adatbázisban tárolódik. Ha futás közben hibát észlel, ne futtassa újra helyreállítás nélkül a biztonsági mentést, mert a régit felül fogja írni az új érvénytelen adattal.',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'Frissíti az USA dollár összegeket a beállított napi árfolyamok alapján. Ezen érték felhasználható a Grafikonok és a Lista Nézet Pénznem Értékek menüpontban.',
  'UPDATE_CREATE_CURRENCY' => 'Új pénznem létrehozás:',
  'UPDATE_VERIFY_FAIL' => 'Hibás rekord ellenőrzése:',
  'UPDATE_VERIFY_CURAMOUNT' => 'Jelenlegi összeg:',
  'UPDATE_VERIFY_FIX' => 'A hibajavítás a következőt végzi el',
  'UPDATE_INCLUDE_CLOSE' => 'Zárt rekordokkal együtt',
  'UPDATE_VERIFY_NEWAMOUNT' => 'Új összeg:',
  'UPDATE_VERIFY_NEWCURRENCY' => 'Új pénznem:',
  'UPDATE_DONE' => 'Kész',
  'UPDATE_BUG_COUNT' => 'Hibákat talált, és megkísérelte megoldani:',
  'UPDATE_BUGFOUND_COUNT' => 'Hibák talált:',
  'UPDATE_COUNT' => 'Rekordok Frissítve:',
  'UPDATE_RESTORE_COUNT' => 'Rekord összegei helyreállítva:',
  'UPDATE_RESTORE' => 'Összegek helyreállítása',
  'UPDATE_RESTORE_TXT' => 'Az összeg értékeinek helyreállítása biztonsági mentéssel.',
  'UPDATE_FAIL' => 'Nem sikerült frissíteni -',
  'UPDATE_NULL_VALUE' => 'Összeg NULL beállítása 0-ra',
  'UPDATE_MERGE' => 'Pénznemek egyesítése',
  'UPDATE_MERGE_TXT' => 'Több pénznem egyesítése egy pénznemre. Ha több pénznem tartozik ugyanahhoz a pénznemhez, egyesíthetjük őket. Ezeket az pénznemeknek az egyesítését az összes másik modulban is elvégezheti.',
  'LBL_ACCOUNT_NAME' => 'Kliens neve:',
  'LBL_AMOUNT' => 'Lehetőség összege:',
  'LBL_AMOUNT_USDOLLAR' => 'Összeg:',
  'LBL_CURRENCY' => 'Pénznem:',
  'LBL_DATE_CLOSED' => 'Várható lezárása dátuma:',
  'LBL_TYPE' => 'Típus:',
  'LBL_CAMPAIGN' => 'Kampány:',
  'LBL_NEXT_STEP' => 'Következő lépés:',
  'LBL_LEAD_SOURCE' => 'Ajánlás forrása:',
  'LBL_SALES_STAGE' => 'Eladási szint:',
  'LBL_PROBABILITY' => 'Valószínűség (%):',
  'LBL_DESCRIPTION' => 'Leírás:',
  'LBL_DUPLICATE' => 'Lehet, hogy duplikált lehetőség',
  'MSG_DUPLICATE' => 'A lehetőség rekord, amelyet duplikált, már létezik. Az alábbi lehetőség rekordok ugyanazzal a névvel szerepelnek. Folytatáshoz kattintson a Mentés gombra egy új lehetőség létrehozásához vagy a Mégsem gombra a modul visszatéréséhez a lehetőség létrehozása nélkül.',
  'LBL_NEW_FORM_TITLE' => 'Lehetőség létrehozása',
  'LNK_NEW_OPPORTUNITY' => 'Lehetőség létrehozása',
  'LNK_OPPORTUNITY_REPORTS' => 'Lehetőségek jelentéseinek megtekintése',
  'LNK_OPPORTUNITY_LIST' => 'Lehetőségek megtekintése',
  'ERR_DELETE_RECORD' => 'Adjon meg egy azonosítót a lehetőség törléséhez!',
  'LBL_TOP_OPPORTUNITIES' => 'Legjobb nyitott lehetőségeim',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'Biztos törölni akarja ezt az klienst a lehetőségekből?',
  'OPPORTUNITY_REMOVE_PROJECT_CONFIRM' => 'Biztos törölni akarja ezt a lehetőséget a projektből?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Lehetőségek',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Tevékenységek',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Előzmények',
  'LBL_RAW_AMOUNT' => 'Nyers összeg',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Ajánlások',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kapcsolatok',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Árajánlatok',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Dokumentumok',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projektek',
  'LBL_ASSIGNED_TO_NAME' => 'Felelős:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Felelős felhasználó',
  'LBL_CONTRACTS' => 'Szerződések',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Szerződések',
  'LBL_MY_CLOSED_OPPORTUNITIES' => 'Lezárt lehetőségeim',
  'LBL_TOTAL_OPPORTUNITIES' => 'Lehetőségek összesen',
  'LBL_CLOSED_WON_OPPORTUNITIES' => 'Lezárt, megnyert lehetőségek',
  'LBL_ASSIGNED_TO_ID' => 'Hozzárendelt felhasználó:',
  'LBL_CREATED_ID' => 'Létrehozva azonosító alapján',
  'LBL_MODIFIED_ID' => 'Módosítva azonosító alapján',
  'LBL_MODIFIED_NAME' => 'Módosítva felhasználó neve szerint',
  'LBL_CREATED_USER' => 'Létrehozott felhasználó',
  'LBL_MODIFIED_USER' => 'Módosított felhasználó',
  'LBL_CAMPAIGN_OPPORTUNITY' => 'Kampányok',
  'LBL_PROJECT_SUBPANEL_TITLE' => 'Projektek',
  'LABEL_PANEL_ASSIGNMENT' => 'Feladat',
  'LNK_IMPORT_OPPORTUNITIES' => 'Lehetőségek importja',
);

