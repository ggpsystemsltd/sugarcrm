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
  'LBL_ENABLE_EXTERNAL_CONNECTORS' => '<i>Note: To enable users to view Facebook and Twitter feeds, go to the Connectors settings to configure the Facebook and Twitter connectors.</i>',
  'LBL_ID' => 'ID',
  'LBL_TEAM' => 'Komanda',
  'LBL_TEAM_ID' => 'Komandos Id',
  'LBL_ASSIGNED_TO_ID' => 'Atsakingo Id',
  'LBL_ASSIGNED_TO_NAME' => 'Atsakingas',
  'LBL_DATE_ENTERED' => 'Sukūrimo data',
  'LBL_DATE_MODIFIED' => 'Redagavimo data',
  'LBL_MODIFIED' => 'Redagavo',
  'LBL_MODIFIED_ID' => 'Redaguotojo Id',
  'LBL_MODIFIED_NAME' => 'Redaguotojo vardas',
  'LBL_CREATED' => 'Sukūrė',
  'LBL_CREATED_ID' => 'Kūrėjo Id',
  'LBL_DESCRIPTION' => 'Aprašymas',
  'LBL_DELETED' => 'Ištrintas',
  'LBL_NAME' => 'Pavadinimas',
  'LBL_SAVING' => 'Saugo...',
  'LBL_SAVED' => 'Išsaugotas',
  'LBL_CREATED_USER' => 'Sukūrė vartotojas',
  'LBL_MODIFIED_USER' => 'Redagavo vartotojas',
  'LBL_LIST_FORM_TITLE' => 'Sugar naujienų sąrašas',
  'LBL_MODULE_NAME' => 'Sugar naujienos',
  'LBL_MODULE_TITLE' => 'Sugar naujienos',
  'LBL_DASHLET_DISABLED' => 'Perspėjimas: Sugar naujienos išjungtos, nauji įrašai nebus rodomi, kol naujienos nebus aktyvuotos.',
  'LBL_ADMIN_SETTINGS' => 'Sugar naujienų nustatymai',
  'LBL_RECORDS_DELETED' => 'Ankstesnės Sugar naujienos buvo ištrintos. Jei įjungtos Sugar naujienos, nauji įrašai atsiras automatiškai.',
  'LBL_CONFIRM_DELETE_RECORDS' => 'Ar Jūs tikrai norite ištrinti visus Sugar naujienų įrašus?',
  'LBL_FLUSH_RECORDS' => 'Ištrinti naujienų įrašus',
  'LBL_ENABLE_FEED' => 'Įjungti Sugar naujienas',
  'LBL_ENABLE_MODULE_LIST' => 'Aktyvuoti naujienas',
  'LBL_HOMEPAGE_TITLE' => 'Mano naujienos',
  'LNK_NEW_RECORD' => 'Sukurti naujienas',
  'LNK_LIST' => 'Sugar naujienos',
  'LBL_SEARCH_FORM_TITLE' => 'Ieškoti naujieną',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Peržiūros istorija',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Priminimai',
  'LBL_SUGAR_FEED_SUBPANEL_TITLE' => 'Sugar naujiena',
  'LBL_NEW_FORM_TITLE' => 'Nauja Sugar naujiena',
  'LBL_ALL' => 'Visi',
  'LBL_USER_FEED' => 'Vartotojo naujienos',
  'LBL_ENABLE_USER_FEED' => 'Įjungti vartotojo naujienas',
  'LBL_TO' => 'Siųsti komandai',
  'LBL_IS' => 'yra',
  'LBL_DONE' => 'Užbaigta',
  'LBL_TITLE' => 'Pavadinimas',
  'LBL_ROWS' => 'Eilutės',
  'LBL_MY_FAVORITES_ONLY' => 'Tik mano mėgstamiausi',
  'LBL_CATEGORIES' => 'Moduliai',
  'LBL_TIME_LAST_WEEK' => 'Praėjusią savaitę',
  'LBL_TIME_WEEKS' => 'Savaitės',
  'LBL_TIME_DAYS' => 'Dienos',
  'LBL_TIME_YESTERDAY' => 'Vakar',
  'LBL_TIME_HOURS' => 'Valandos',
  'LBL_TIME_HOUR' => 'Valanda',
  'LBL_TIME_MINUTES' => 'Minutės',
  'LBL_TIME_MINUTE' => 'Minutė',
  'LBL_TIME_SECONDS' => 'Sekundės',
  'LBL_TIME_SECOND' => 'Sekundė',
  'LBL_TIME_AGO' => 'prieš',
  'CREATED_CONTACT' => 'sukūrė <b>NAUJĄ</b> kontaktą',
  'CREATED_OPPORTUNITY' => 'sukūrė <b>NAUJĄ</b> pardavimą',
  'CREATED_CASE' => 'sukūrė <b>NAUJĄ</b> aptarnavimą',
  'CREATED_LEAD' => 'sukūrė <b>NAUJĄ</b> potencialų kontaktą',
  'FOR' => 'klientui',
  'CLOSED_CASE' => '<b>UŽDARĖ</b> aptarnavimą',
  'CONVERTED_LEAD' => '<b>KONVERTAVO</b> potencialų kontaktą',
  'WON_OPPORTUNITY' => '<b>SĖKMINGAI</b> užbaigė pardavimą',
  'WITH' => 'klientui',
  'LBL_LINK_TYPE_Link' => 'Nuoroda',
  'LBL_LINK_TYPE_Image' => 'Paveikslėlis',
  'LBL_LINK_TYPE_YouTube' => 'YouTube',
  'LBL_SELECT' => 'Pasirinkti',
  'LBL_POST' => 'Patalpinti',
  'LBL_EXTERNAL_PREFIX' => 'Išorinis:',
  'LBL_EXTERNAL_WARNING' => 'Išoriniams elementams reikalingi <a href="?module=EAPM">išoriniai prisijungimai</a>.',
  'LBL_AUTHENTICATE' => 'Identifikacija',
  'LBL_AUTHENTICATION_PENDING' => 'Ne visi pasirinkti išoriniai elementai buvo autentifikuoti. Paspauskite &#39;Atšaukti&#39; norėdami grįžti ir autentifikuoti išorinius prisijungimus arba paspauskite &#39;Gerai&#39; ir tęskite.',
);

