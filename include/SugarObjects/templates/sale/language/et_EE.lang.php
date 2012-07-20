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
  'UPDATE_RESTORE_TXT' => 'Restores amount values from the backups created during fix.',
  'UPDATE_FIX_TXT' => 'Attempts to fix any invalid amounts by creating a valid decimal from the current amount. Any modified amount is backed up in the amount_backup database field. If you run this and notice bugs, do not rerun it without restoring from the backup as it may overwrite the backup with new invalid data.',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'Update the U.S. Dollar amounts for sales based on the current set currency rates. This value is used to calculate Graphs and List View Currency Amounts.',
  'UPDATE_VERIFY_FIX' => 'Running Fix would give',
  'UPDATE_NULL_VALUE' => 'Amount is NULL setting it to 0 -',
  'LBL_MODULE_NAME' => 'Müük',
  'LBL_MODULE_TITLE' => 'Müük: Avaleht',
  'LBL_SEARCH_FORM_TITLE' => 'Müügi otsing',
  'LBL_VIEW_FORM_TITLE' => 'Müügi vaade',
  'LBL_LIST_FORM_TITLE' => 'Müügi loend',
  'LBL_SALE_NAME' => 'Müügi nimi:',
  'LBL_SALE' => 'Müük:',
  'LBL_NAME' => 'Müügi nimi',
  'LBL_LIST_SALE_NAME' => 'Nimi',
  'LBL_LIST_ACCOUNT_NAME' => 'Ettevõtte nimi',
  'LBL_LIST_AMOUNT' => 'Summa',
  'LBL_LIST_DATE_CLOSED' => 'Sulge',
  'LBL_LIST_SALE_STAGE' => 'Müügi staadium',
  'LBL_ACCOUNT_ID' => 'Ettevõtte Id',
  'LBL_CURRENCY_ID' => 'Valuuta ID',
  'LBL_TEAM_ID' => 'Meeskonna ID:',
  'UPDATE' => 'Müük - valuuta uuendamine',
  'UPDATE_DOLLARAMOUNTS' => 'Uuenda USD summasid',
  'UPDATE_VERIFY' => 'Kontrolli summasid',
  'UPDATE_VERIFY_TXT' => 'Kontrollib, et müügi koguväärtused on kehtivad kümnendmurdudes ainult numbrisümbolites (0-9) ja kümnendikes(.)',
  'UPDATE_FIX' => 'Fix summad',
  'UPDATE_CREATE_CURRENCY' => 'Uue valuuta loomine:',
  'UPDATE_VERIFY_FAIL' => 'Kirje ebaõnnestumise kontroll:',
  'UPDATE_VERIFY_CURAMOUNT' => 'Praegune summa:',
  'UPDATE_INCLUDE_CLOSE' => 'Lisa lõpetatud kirjed',
  'UPDATE_VERIFY_NEWAMOUNT' => 'Uus summa:',
  'UPDATE_VERIFY_NEWCURRENCY' => 'Uus valuuta:',
  'UPDATE_DONE' => 'Tehtud',
  'UPDATE_BUG_COUNT' => 'Bugid on leitud ja neid üritatakse lahendada:',
  'UPDATE_BUGFOUND_COUNT' => 'Leitud bugid:',
  'UPDATE_COUNT' => 'Uuendatud kirjed:',
  'UPDATE_RESTORE_COUNT' => 'Kirje summad taastatud:',
  'UPDATE_RESTORE' => 'Taasta summad',
  'UPDATE_FAIL' => 'Ei saa uuendada -',
  'UPDATE_MERGE' => 'Mesti valuutad',
  'UPDATE_MERGE_TXT' => 'Mesti erinevad valuutad üheks valuutaks. Kui on erinevaid valuutakirjeid ühe valuuta kohta, siis mesti need kokku. See mestib valuutad ka kõigi teiste moodulite jaoks.',
  'LBL_ACCOUNT_NAME' => 'Ettevõtte nimi:',
  'LBL_AMOUNT' => 'Summa:',
  'LBL_AMOUNT_USDOLLAR' => 'Summa USD:',
  'LBL_CURRENCY' => 'Valuuta:',
  'LBL_DATE_CLOSED' => 'Oodatav sulgemiskuupäev:',
  'LBL_TYPE' => 'Tüüp:',
  'LBL_CAMPAIGN' => 'Kampaania:',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Müügivihjed',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projektid',
  'LBL_NEXT_STEP' => 'Järgmine samm:',
  'LBL_LEAD_SOURCE' => 'Müügivihje allikas:',
  'LBL_SALES_STAGE' => 'Müügistaadium:',
  'LBL_PROBABILITY' => 'Tõenäosus (%)',
  'LBL_DESCRIPTION' => 'Kirjeldus',
  'LBL_DUPLICATE' => 'Võimalik topeltmüük',
  'MSG_DUPLICATE' => 'Loodav müügikirje võib olla juba eksisteeriv duplikaat müügikirje. Müügikirjed, mis sisaldavad sarnaseid nimesid on väljatoodud allpool. Kliki Salvesta selle uue müügi loomiseks või kliki Tühista moodulisse tagasisiirdumiseks ilma müüki loomata.',
  'LBL_NEW_FORM_TITLE' => 'Loo müük',
  'LNK_NEW_SALE' => 'Loo müük',
  'LNK_SALE_LIST' => 'Müük',
  'ERR_DELETE_RECORD' => 'Müügi kustutamiseks täpsusta kirje numbrit.',
  'LBL_TOP_SALES' => 'Minu TOP avatud müügid',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'Oled kindel, et soovid selle kontakti müügist eemaldada?',
  'SALE_REMOVE_PROJECT_CONFIRM' => 'Oled kindel, et soovid selle müügi projektist eemaldada?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Müük',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Tegevused',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Ajalugu',
  'LBL_RAW_AMOUNT' => 'Rea summa',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontaktid',
  'LBL_ASSIGNED_TO_NAME' => 'Kasutaja:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Määratud kasutaja',
  'LBL_MY_CLOSED_SALES' => 'Minu suletud müük',
  'LBL_TOTAL_SALES' => 'Müük kokku',
  'LBL_CLOSED_WON_SALES' => 'Suletud Võidetud müügid',
  'LBL_ASSIGNED_TO_ID' => 'Vastutaja ID:',
  'LBL_CREATED_ID' => 'Looja ID',
  'LBL_MODIFIED_ID' => 'Muutja ID',
  'LBL_MODIFIED_NAME' => 'Muutja nime järgi',
  'LBL_SALE_INFORMATION' => 'Müügiinfo',
  'LBL_CURRENCY_NAME' => 'Valuuta nimi',
  'LBL_CURRENCY_SYMBOL' => 'Valuuta sümbol',
);

