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
  'LBL_TEAM_ID' => 'Team ID',
  'LBL_CURRENCY_NAME' => 'Valutanamn',
  'LBL_CURRENCY_SYMBOL' => 'Valutasymbol',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Leads',
  'LBL_MODULE_NAME' => 'Försäljning',
  'LBL_MODULE_TITLE' => 'Försäljning: Hem',
  'LBL_SEARCH_FORM_TITLE' => 'Sök försäljning',
  'LBL_VIEW_FORM_TITLE' => 'Försäljningsvy',
  'LBL_LIST_FORM_TITLE' => 'Försäljningslista',
  'LBL_SALE_NAME' => 'Försäljningsnamn:',
  'LBL_SALE' => 'Försäljning:',
  'LBL_NAME' => 'Försäljningsnamn',
  'LBL_LIST_SALE_NAME' => 'Namn',
  'LBL_LIST_ACCOUNT_NAME' => 'Organisationsnamn',
  'LBL_LIST_AMOUNT' => 'Summa',
  'LBL_LIST_DATE_CLOSED' => 'Stäng',
  'LBL_LIST_SALE_STAGE' => 'Försäljningsstage',
  'LBL_ACCOUNT_ID' => 'Organisations ID',
  'LBL_CURRENCY_ID' => 'Valuta ID',
  'UPDATE' => 'Försäljning - Valuta uppdatering',
  'UPDATE_DOLLARAMOUNTS' => 'Uppdatera summa U.S. Dollar',
  'UPDATE_VERIFY' => 'Verifiera summa',
  'UPDATE_VERIFY_TXT' => 'Verifiera att summan i försäljningen har giltiga decimaler med endast numeriska tecken (0-9) och av separerare (.)',
  'UPDATE_FIX' => 'Fixa summa',
  'UPDATE_FIX_TXT' => 'Försäker fixa ogiltiga summor genom att skapa en giltig decimal från den nuvarande summan. Ändrade summor är sparade i amount_backup databas-fältet. On du kör detta och hittar buggar, kör inte igen utan att först ha återskapat från backup eftersom det kan skriva över backuppen med felaktig data.',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'Uppdatera summan av U.S. Dollars för försäljning baserat på den nuvarande valutakursen. Detta värde används för att räkna ut grafer och ListVy valuta summan.',
  'UPDATE_CREATE_CURRENCY' => 'Skapa ny valuta:',
  'UPDATE_VERIFY_FAIL' => 'Misslyckad verifiering av post:',
  'UPDATE_VERIFY_CURAMOUNT' => 'Nuvarande summa:',
  'UPDATE_VERIFY_FIX' => 'Att köra fix skulle ge',
  'UPDATE_INCLUDE_CLOSE' => 'Inkludera stängda poster',
  'UPDATE_VERIFY_NEWAMOUNT' => 'Ny summa:',
  'UPDATE_VERIFY_NEWCURRENCY' => 'Ny valuta:',
  'UPDATE_DONE' => 'Klart',
  'UPDATE_BUG_COUNT' => 'Bugg funnen och försökt lösas:',
  'UPDATE_BUGFOUND_COUNT' => 'Hittade buggar:',
  'UPDATE_COUNT' => 'Poster uppdaterade:',
  'UPDATE_RESTORE_COUNT' => 'Summa av poster återskapade:',
  'UPDATE_RESTORE' => 'Återskapa summa',
  'UPDATE_RESTORE_TXT' => 'Återskapa summa från backup skapade under fixen.',
  'UPDATE_FAIL' => 'Kunde inte uppdatera -',
  'UPDATE_NULL_VALUE' => 'Summan är NULL sätter den till 0 -',
  'UPDATE_MERGE' => 'Slå ihop valutor',
  'UPDATE_MERGE_TXT' => 'Slå ihop multipla valutor till en valuta. Om det finns flera valuta-poster för samma valuta slår du ihop dom. Detta kommer också att slå ihop valutor för alla andra moduler.',
  'LBL_ACCOUNT_NAME' => 'Organisationsnamn:',
  'LBL_AMOUNT' => 'Summa:',
  'LBL_AMOUNT_USDOLLAR' => 'Summa USD:',
  'LBL_CURRENCY' => 'Valuta:',
  'LBL_DATE_CLOSED' => 'Förväntat slutdatum:',
  'LBL_TYPE' => 'Typ:',
  'LBL_CAMPAIGN' => 'Kampanj:',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projekt',
  'LBL_NEXT_STEP' => 'Nästa steg:',
  'LBL_LEAD_SOURCE' => 'Leadkälla:',
  'LBL_SALES_STAGE' => 'Försäljningsstage:',
  'LBL_PROBABILITY' => 'Trolighet (%):',
  'LBL_DESCRIPTION' => 'Beskrivning:',
  'LBL_DUPLICATE' => 'Möjlig duplicerad försäljning',
  'MSG_DUPLICATE' => 'Försäljningsposten du håller på att skapa kan vara en dublett av en redan existerande post. Försäljningar med liknande namn är listade nedan.<br>Klicka Spara för att fortsätta att skapa denna nya försäljning, eller klicka Avbryt för att återgå till modulen utan att skapa försäljningen.',
  'LBL_NEW_FORM_TITLE' => 'Skapa försäljning',
  'LNK_NEW_SALE' => 'Skapa försäljning',
  'LNK_SALE_LIST' => 'Försäljning',
  'ERR_DELETE_RECORD' => 'Ett postnummer måste vara specifierat för att ta bort denna försäljning.',
  'LBL_TOP_SALES' => 'Mina topp öpnna-försäljningar',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'Är du säker att du vill ta bort denna kontakt från försäljningen?',
  'SALE_REMOVE_PROJECT_CONFIRM' => 'Är du säker att du vill ta bort denna försäljning från detta projekt?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Försäljning',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Aktivitet',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Historia',
  'LBL_RAW_AMOUNT' => 'Rå summa',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakter',
  'LBL_ASSIGNED_TO_NAME' => 'Tilldelad till:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Tilldelad användare',
  'LBL_MY_CLOSED_SALES' => 'Mina stängda försäljningar',
  'LBL_TOTAL_SALES' => 'Total försäljning',
  'LBL_CLOSED_WON_SALES' => 'Stängda vunna försäljningar',
  'LBL_ASSIGNED_TO_ID' => 'Tilldelad till ID',
  'LBL_CREATED_ID' => 'Skapad av ID',
  'LBL_MODIFIED_ID' => 'Ändrad av ID',
  'LBL_MODIFIED_NAME' => 'Ändrad av användarnamn',
  'LBL_SALE_INFORMATION' => 'Försäljningsinformation',
);

