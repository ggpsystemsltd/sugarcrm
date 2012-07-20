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
  'LBL_MODULE_NAME' => 'Pardavimas',
  'LBL_MODULE_TITLE' => 'Pardavimas: Pradžia',
  'LBL_SEARCH_FORM_TITLE' => 'Pardavimo paieška',
  'LBL_VIEW_FORM_TITLE' => 'Pardavimo informacija',
  'LBL_LIST_FORM_TITLE' => 'Pardavimų sąrašas',
  'LBL_SALE_NAME' => 'Pardavimo pavadinimas:',
  'LBL_SALE' => 'Pardavimas:',
  'LBL_NAME' => 'Pardavimo pavadinimas',
  'LBL_LIST_SALE_NAME' => 'Pavadinimas',
  'LBL_LIST_ACCOUNT_NAME' => 'Kliento pavadinimas',
  'LBL_LIST_AMOUNT' => 'Suma',
  'LBL_LIST_DATE_CLOSED' => 'Sandorio data',
  'LBL_LIST_SALE_STAGE' => 'Pardavimo etapas',
  'LBL_ACCOUNT_ID' => 'Kliento ID',
  'LBL_CURRENCY_ID' => 'Valiutos ID',
  'LBL_TEAM_ID' => 'Komandos ID',
  'UPDATE' => 'Pardavimas - Valiutos atnaujinimas',
  'UPDATE_DOLLARAMOUNTS' => 'Atnaujinti U.S. Dollar sumas',
  'UPDATE_VERIFY' => 'Patikrinti sumas',
  'UPDATE_VERIFY_TXT' => 'Patikrina ar pardavimų sumos yra skaitinės reikšmės susidedančios iš (0-9) ir dešimtainės skirtuko (,)',
  'UPDATE_FIX' => 'Pataisyti sumas',
  'UPDATE_FIX_TXT' => 'Bando pataisyti neteisingai įvestas sumas.',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'Atnaujinti pardavimų sumas litais, pagal įvestus valiutų kursus.',
  'UPDATE_CREATE_CURRENCY' => 'Kuria naują valiutą:',
  'UPDATE_VERIFY_FAIL' => 'Rasti neteisingi įrašai:',
  'UPDATE_VERIFY_CURAMOUNT' => 'Esama suma',
  'UPDATE_VERIFY_FIX' => 'Pataisius būtų',
  'UPDATE_INCLUDE_CLOSE' => 'Įtraukti užbaigtus įrašus',
  'UPDATE_VERIFY_NEWAMOUNT' => 'Nauja suma:',
  'UPDATE_VERIFY_NEWCURRENCY' => 'Nauja valiuta:',
  'UPDATE_DONE' => 'Užbaigta',
  'UPDATE_BUG_COUNT' => 'Rastos klaidos ir bandyta ištaisyti',
  'UPDATE_BUGFOUND_COUNT' => 'Rastos klaidos:',
  'UPDATE_COUNT' => 'Įrašai atnaujinti:',
  'UPDATE_RESTORE_COUNT' => 'Įrašų sumos atstatytos:',
  'UPDATE_RESTORE' => 'Atstatyti sumas',
  'UPDATE_RESTORE_TXT' => 'Atstato sumą į pradinę būseną',
  'UPDATE_FAIL' => 'Nepavyko atnaujinti -',
  'UPDATE_NULL_VALUE' => 'Suma yra NULL, tad priskiriamas jai 0 -',
  'UPDATE_MERGE' => 'Apjungti valiutas',
  'UPDATE_MERGE_TXT' => 'Apjungti keletą valiutų į vieną valiutą.',
  'LBL_ACCOUNT_NAME' => 'Kliento pavadinimas:',
  'LBL_AMOUNT' => 'Suma:',
  'LBL_AMOUNT_USDOLLAR' => 'Suma Lt:',
  'LBL_CURRENCY' => 'Valiuta',
  'LBL_DATE_CLOSED' => 'Pardavimo data:',
  'LBL_TYPE' => 'Tipas:',
  'LBL_CAMPAIGN' => 'Kampanija:',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Potencialūs kontaktai',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projektai',
  'LBL_NEXT_STEP' => 'Kitas žingsnis:',
  'LBL_LEAD_SOURCE' => 'Pritraukimo metodas:',
  'LBL_SALES_STAGE' => 'Pardavimo etapas:',
  'LBL_PROBABILITY' => 'Tikimybė (%):',
  'LBL_DESCRIPTION' => 'Aprašymas:',
  'LBL_DUPLICATE' => 'Galimas pardavimų dubliavimasis',
  'MSG_DUPLICATE' => 'Jūs dubliuojate pardavimą. Jei norite dubliuoti paspauskite Saugoti ir sukurti, kitu atveju spauskite Atšaukti ir sugrįšite į modulį nesukūrę pardavimo.',
  'LBL_NEW_FORM_TITLE' => 'Naujas pardavimas',
  'LNK_NEW_SALE' => 'Sukurti pardavimą',
  'LNK_SALE_LIST' => 'Pardavimas',
  'ERR_DELETE_RECORD' => 'Jūs turite nurodyti įrašo numerį, kad galėtumėte ištrinti pardavimus.',
  'LBL_TOP_SALES' => 'Mano stambiausi potencialūs pardavimai',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'Ar tikrai norite išimti šį kontaktą iš pardavimų?',
  'SALE_REMOVE_PROJECT_CONFIRM' => 'Ar tikrai norite išimti šį pardavimų iš projekto?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Pardavimas',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Priminimai',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Istorija',
  'LBL_RAW_AMOUNT' => 'Pradinė suma',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontaktai',
  'LBL_ASSIGNED_TO_NAME' => 'Atsakingas:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Atsakingas',
  'LBL_MY_CLOSED_SALES' => 'Mano užbaigti pardavimai',
  'LBL_TOTAL_SALES' => 'Viso pardavimų',
  'LBL_CLOSED_WON_SALES' => 'Sėkmingi pardavimai',
  'LBL_ASSIGNED_TO_ID' => 'Atsakingo ID',
  'LBL_CREATED_ID' => 'Kūrėjo ID',
  'LBL_MODIFIED_ID' => 'Redaguotojo ID',
  'LBL_MODIFIED_NAME' => 'Redaguotojo vardas',
  'LBL_SALE_INFORMATION' => 'Pardavimo informacija',
  'LBL_CURRENCY_NAME' => 'Valiutos pavadinimas',
  'LBL_CURRENCY_SYMBOL' => 'Valiutos simbolis',
);

