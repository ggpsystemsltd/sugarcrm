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
  'LBL_CURRENCIES' => 'Valutor',
  'LBL_LIST_AMOUNT_USDOLLAR' => 'Belopp',
  'LBL_CREATED_USER' => 'Skapad användare',
  'LBL_MODIFIED_USER' => 'Ändrad användare',
  'LBL_CAMPAIGN_OPPORTUNITY' => 'Kampanjer',
  'LBL_PROJECT_SUBPANEL_TITLE' => 'Projekt',
  'LABEL_PANEL_ASSIGNMENT' => 'Tilldelning',
  'LNK_IMPORT_OPPORTUNITIES' => 'Importera affärsmöjligheter',
  'LBL_TEAM_ID' => 'Team ID',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Leads',
  'LBL_MODULE_NAME' => 'Affärsmöjligheter',
  'LBL_MODULE_TITLE' => 'Affärsmöjligheter: Hem',
  'LBL_SEARCH_FORM_TITLE' => 'Sök affärsmöjligheter',
  'LBL_VIEW_FORM_TITLE' => 'Visa affärsmöjlighet',
  'LBL_LIST_FORM_TITLE' => 'Lista affärsmöjligheter',
  'LBL_OPPORTUNITY_NAME' => 'Namn på affärsmöjlighet:',
  'LBL_OPPORTUNITY' => 'Affärsmöjlighet:',
  'LBL_NAME' => 'Namn på affärsmöjlighet:',
  'LBL_INVITEE' => 'Kontakter',
  'LBL_LIST_OPPORTUNITY_NAME' => 'Namn',
  'LBL_LIST_ACCOUNT_NAME' => 'Organisationsnamn',
  'LBL_LIST_AMOUNT' => 'Summa',
  'LBL_LIST_DATE_CLOSED' => 'Stäng',
  'LBL_LIST_SALES_STAGE' => 'Säljnivå',
  'LBL_ACCOUNT_ID' => 'Organisations ID',
  'LBL_CURRENCY_ID' => 'Valuta ID',
  'LBL_CURRENCY_NAME' => 'Valutanamn',
  'LBL_CURRENCY_SYMBOL' => 'Valutasymbol',
  'UPDATE' => 'Affärsmöjlighet - Valuta uppdatering',
  'UPDATE_DOLLARAMOUNTS' => 'Uppdatera summor',
  'UPDATE_VERIFY' => 'Verifiera summor',
  'UPDATE_VERIFY_TXT' => 'Verifierar att summans värde i affärsmöjligheterna har giltiga decimalsiffror, endast numeriska tecken (0-9) och decimaler (.)',
  'UPDATE_FIX' => 'Fixa summor',
  'UPDATE_FIX_TXT' => 'Försöker fixa ogiltiga summor genom att skapa ett giltigt decimaltal baserat på den aktuella valutan. Alla modifierade summor backupas till databasfältet amount_backup. Om du kör den här funktionen och noterar någon bugg, kör i så fall inte om funktionen innan du återställt data från backupen, eftersom du annars riskerar att skriva över backupen med ny ogiltig data.',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'Uppdatera beloppet som angivits i US Dollar för de aktuella affärsmöjligheterna med den nya valutakonverteringsfaktorn. Detta värde används för att skapa grafer och lista summor.',
  'UPDATE_CREATE_CURRENCY' => 'Skapa ny valuta:',
  'UPDATE_VERIFY_FAIL' => 'Objektet misslyckades vid verifieringen:',
  'UPDATE_VERIFY_CURAMOUNT' => 'Aktuell summa:',
  'UPDATE_VERIFY_FIX' => 'Genomför fix skulle ge',
  'UPDATE_INCLUDE_CLOSE' => 'Inkludera stängda poster',
  'UPDATE_VERIFY_NEWAMOUNT' => 'Ny summa:',
  'UPDATE_VERIFY_NEWCURRENCY' => 'Ny valuta:',
  'UPDATE_DONE' => 'Klar',
  'UPDATE_BUG_COUNT' => 'Buggar hittades och en lösning håller på att tas fram:',
  'UPDATE_BUGFOUND_COUNT' => 'Hittade buggar:',
  'UPDATE_COUNT' => 'Uppdaterade poster:',
  'UPDATE_RESTORE_COUNT' => 'Objektets summa återställd:',
  'UPDATE_RESTORE' => 'Återställ summor',
  'UPDATE_RESTORE_TXT' => 'Återställer summorna från backuperna som skapdes under fixen.',
  'UPDATE_FAIL' => 'Kunde inte uppdatera -',
  'UPDATE_NULL_VALUE' => 'Summan är NULL sätter det till 0 -',
  'UPDATE_MERGE' => 'Slå samman valutor',
  'UPDATE_MERGE_TXT' => 'Slå samman flera valutor till en valuta. Om det finns flera valutaposter angivna för samma valuta slås de samman. Denna funktion slår även samman valutorna för alla andra moduler.',
  'LBL_ACCOUNT_NAME' => 'Organisationsnamn:',
  'LBL_AMOUNT' => 'Summa:',
  'LBL_AMOUNT_USDOLLAR' => 'Summa USD:',
  'LBL_CURRENCY' => 'Valuta:',
  'LBL_DATE_CLOSED' => 'Förväntat avslutsdatum:',
  'LBL_TYPE' => 'Typ:',
  'LBL_CAMPAIGN' => 'Kampanj:',
  'LBL_NEXT_STEP' => 'Nästa steg:',
  'LBL_LEAD_SOURCE' => 'Lead källa:',
  'LBL_SALES_STAGE' => 'Säljnivå:',
  'LBL_PROBABILITY' => 'Möjlighet (%):',
  'LBL_DESCRIPTION' => 'Beskrivning:',
  'LBL_DUPLICATE' => 'Möjlig kopia av affärsmöjligheten',
  'MSG_DUPLICATE' => 'Den affärsmöjlighet du försöker skapa kan vara en kopia på en existerande affärsmöjlighet. Affärsmöjligheter med liknande namn listas nedan.<br> Klicka på Spara för att ändå spara den nya affärsmöjligheten eller klicka Avbryt för att återvända till modulen utan att skapa affärsmöjligheten.',
  'LBL_NEW_FORM_TITLE' => 'Skapa affärsmöjlighet',
  'LNK_NEW_OPPORTUNITY' => 'Skapa affärsmöjlighet',
  'LNK_OPPORTUNITY_REPORTS' => 'Affärsmöjlighet rapporter',
  'LNK_OPPORTUNITY_LIST' => 'Affärsmöjligheter',
  'ERR_DELETE_RECORD' => 'Ett objektnummer måste specificeras för att kunna radera affärsmöjligheten.',
  'LBL_TOP_OPPORTUNITIES' => 'Mina mest intressanta affärsmöjligheter',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'Är du säker på att du vill ta bort kontakten från affärsmöjligheten?',
  'OPPORTUNITY_REMOVE_PROJECT_CONFIRM' => 'Är du säker på att du vill ta bort affärsmöjligheten från projektet?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Affärsmöjligheter',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Aktiviteter',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Historik',
  'LBL_RAW_AMOUNT' => 'Belopp',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakter',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Offerter',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projekt',
  'LBL_ASSIGNED_TO_NAME' => 'Tilldelad till:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Tilldelad användare',
  'LBL_CONTRACTS' => 'Kontrakt',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Kontrakt',
  'LBL_MY_CLOSED_OPPORTUNITIES' => 'Mina stängda affärsmöjligheter',
  'LBL_TOTAL_OPPORTUNITIES' => 'Alla affärsmöjligheter',
  'LBL_CLOSED_WON_OPPORTUNITIES' => 'Stängda vunna affärsmöjligheter',
  'LBL_ASSIGNED_TO_ID' => 'Tilldelad till ID',
  'LBL_CREATED_ID' => 'Skapad av ID',
  'LBL_MODIFIED_ID' => 'Redigerad av ID',
  'LBL_MODIFIED_NAME' => 'Redigerad av användarnamn',
);

