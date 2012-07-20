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
  'LBL_MODULE_NAME' => 'Eladás',
  'LBL_MODULE_TITLE' => 'Eladás: Főoldal',
  'LBL_SEARCH_FORM_TITLE' => 'Keresés az eladásban',
  'LBL_VIEW_FORM_TITLE' => 'Eladás nézet',
  'LBL_LIST_FORM_TITLE' => 'Eladás lista',
  'LBL_SALE_NAME' => 'Eladás neve:',
  'LBL_SALE' => 'Eladás:',
  'LBL_NAME' => 'Eladás neve',
  'LBL_LIST_SALE_NAME' => 'Név',
  'LBL_LIST_ACCOUNT_NAME' => 'Kliens neve:',
  'LBL_LIST_AMOUNT' => 'Összeg',
  'LBL_LIST_DATE_CLOSED' => 'Zárás',
  'LBL_LIST_SALE_STAGE' => 'Eladási szint',
  'LBL_ACCOUNT_ID' => 'Kliens azonosító',
  'LBL_CURRENCY_ID' => 'Pénznem azonosító',
  'LBL_TEAM_ID' => 'Csoport azonosító',
  
  
  
  
  'UPDATE' => 'Eladás - Pénznem frissítése',
  'UPDATE_DOLLARAMOUNTS' => 'USA dollár összegek frissítése',
  'UPDATE_VERIFY' => 'Összeg ellenőrzése',
  'UPDATE_VERIFY_TXT' => 'Ellenőrzi, hogy az összegek érvényes decimális(.) vagy numerikus(0-9) karakterek-e.',
  'UPDATE_FIX' => 'Összegek aktualizálása',
  'UPDATE_FIX_TXT' => 'Megkísérli kijavítani az érvénytelen értékeket valós decimális értékekre. Minden módosított biztonsági mentés adatbázisban tárolódik. Ha futás közben hibát észlel, ne futtassa újra helyreállítás nélkül a biztonsági mentést, mert a régit felül fogja írni az új érvénytelen adattal. ',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'Frissíti az USA dollár összegeket a beállított napi árfolyamok alapján. Ezen érték felhasználható a Grafikonok és a Lista Nézet Pénznem Értékek menüpontban.',
  'UPDATE_CREATE_CURRENCY' => 'Új pénznem létrehozás:',
  'UPDATE_VERIFY_FAIL' => 'Hibás rekord ellenőrzése:',
  'UPDATE_VERIFY_CURAMOUNT' => 'Jelenlegi összeg:',
  'UPDATE_VERIFY_FIX' => 'Az aktualizálás végrehajtása',
  'UPDATE_INCLUDE_CLOSE' => 'Zárt rekordokkal együtt',
  'UPDATE_VERIFY_NEWAMOUNT' => 'Új összeg:',
  'UPDATE_VERIFY_NEWCURRENCY' => 'Új pénznem:',
  'UPDATE_DONE' => 'Kész',
  'UPDATE_BUG_COUNT' => 'Hibákat talált, és megkísérelte javítani:',
  'UPDATE_BUGFOUND_COUNT' => 'Hibák talált:',
  'UPDATE_COUNT' => 'Rekordok frissítve:',
  'UPDATE_RESTORE_COUNT' => 'Rekord összegek helyreállítva:',
  'UPDATE_RESTORE' => 'Összegek helyreállítása',
  'UPDATE_RESTORE_TXT' => 'Az összeg értékeinek helyreállítása biztonsági mentéssel.',
  'UPDATE_FAIL' => 'Nem sikerült frissíteni -',
  'UPDATE_NULL_VALUE' => 'Összeg NULL beállítása 0-ra',
  'UPDATE_MERGE' => 'Pénznemek egyesítése',
  'UPDATE_MERGE_TXT' => 'Több pénznem egyesítése egy pénznemre. Ha több pénznem tartozik ugyanahhoz a pénznemhez, egyesíthetjük őket. Ezeknek az pénznemeknek az egyesítését az összes másik modulban is elvégezheti.',
  'LBL_ACCOUNT_NAME' => 'Kliens név:',
  'LBL_AMOUNT' => 'Összeg:',
  'LBL_AMOUNT_USDOLLAR' => 'Összeg USD:
',
  'LBL_CURRENCY' => 'Pénznem:',
  'LBL_DATE_CLOSED' => 'Várható lezárása dátuma:
',
  'LBL_TYPE' => 'Típus:',
  'LBL_CAMPAIGN' => 'Kampány:',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Ajánlások',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projektek',
  'LBL_NEXT_STEP' => 'Következő lépés:',
  'LBL_LEAD_SOURCE' => 'Ajánlás forrás:',
  'LBL_SALES_STAGE' => 'Eladási szint:',
  'LBL_PROBABILITY' => 'Valószínűség (%):',
  'LBL_DESCRIPTION' => 'Leírás:',
  'LBL_DUPLICATE' => 'Lehet, hogy duplikált eladás ',
  'MSG_DUPLICATE' => 'Az eladás rekordja, amelyet duplikált, már létezik. Az alábbi eladás rekordok ugyanazzal a névvel szerepelnek. Folytatáshoz kattintson a Mentés gombra egy új eladási szint létrehozásához vagy a Mégsem gombra a modul visszatéréséhez az eladási szint létrehozása nélkül.',
  'LBL_NEW_FORM_TITLE' => 'Új eladás',
  'LNK_NEW_SALE' => 'Új eladás',
  'LNK_SALE_LIST' => 'Eladás',
  'ERR_DELETE_RECORD' => 'Adjon meg egy azonosítót az eladás rekordjának törléséhez!',
  'LBL_TOP_SALES' => 'Nyitott, Top eladásaim',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'Biztos törölni akarja ezt a kapcsolatot ebből az eladásból?',
  'SALE_REMOVE_PROJECT_CONFIRM' => 'Biztos törölni akarja ezt az eladást a projektből?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Eladás',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Tevékenységek',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Előzmény',
  'LBL_RAW_AMOUNT' => 'Nyers összeg',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kapcsolatok',
  'LBL_ASSIGNED_TO_NAME' => 'Felhasználó:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Hozzárendelt felhasználó',
  'LBL_MY_CLOSED_SALES' => 'Lezárt eladásaim',
  'LBL_TOTAL_SALES' => 'Összes eladás',
  'LBL_CLOSED_WON_SALES' => 'Lezárt, megnyert eladások',
  'LBL_ASSIGNED_TO_ID' => 'Hozzárendelt azonosító',
  'LBL_CREATED_ID' => 'Létrehozta (azonosító)',
  'LBL_MODIFIED_ID' => 'Módosította (azonosító)',
  'LBL_MODIFIED_NAME' => 'Módosító felhasználó neve',
  'LBL_SALE_INFORMATION' => 'Eladás információ',
  'LBL_CURRENCY_NAME' => 'Pénznem',
  'LBL_CURRENCY_SYMBOL' => 'Pénznem szimbóluma',
);

