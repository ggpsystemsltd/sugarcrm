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
  'LBL_TYPE' => 'Type:',
  'LBL_MODULE_NAME' => 'Salgsmuligheder',
  'LBL_MODULE_TITLE' => 'Salgsmuligheder: Startside',
  'LBL_SEARCH_FORM_TITLE' => 'Søg efter salgsmulighed',
  'LBL_VIEW_FORM_TITLE' => 'Vis salgsmulighed',
  'LBL_LIST_FORM_TITLE' => 'Salgsmulighedsliste',
  'LBL_OPPORTUNITY_NAME' => 'Salgsmulighedsnavn:',
  'LBL_OPPORTUNITY' => 'Salgsmulighed:',
  'LBL_NAME' => 'Salgsmulighedsnavn',
  'LBL_INVITEE' => 'Kontakter',
  'LBL_CURRENCIES' => 'Valutaer',
  'LBL_LIST_OPPORTUNITY_NAME' => 'Navn',
  'LBL_LIST_ACCOUNT_NAME' => 'Virksomhedsnavn',
  'LBL_LIST_AMOUNT' => 'Beløb',
  'LBL_LIST_AMOUNT_USDOLLAR' => 'Beløb',
  'LBL_LIST_DATE_CLOSED' => 'Luk',
  'LBL_LIST_SALES_STAGE' => 'Salgsfase',
  'LBL_ACCOUNT_ID' => 'Virksomheds-id',
  'LBL_CURRENCY_ID' => 'Valuta-id',
  'LBL_CURRENCY_NAME' => 'Valutanavn',
  'LBL_CURRENCY_SYMBOL' => 'Valutasymbol',
  'LBL_TEAM_ID' => 'Team-id',
  'UPDATE' => 'Salgsmulighed - valutaopdatering',
  'UPDATE_DOLLARAMOUNTS' => 'Opdater USD-beløb',
  'UPDATE_VERIFY' => 'Bekræft beløb',
  'UPDATE_VERIFY_TXT' => 'Kontrollerer, at beløbsværdierne i salgsmuligheder er gyldige decimaltal med kun numeriske tegn "0-9" og decimaler "."',
  'UPDATE_FIX' => 'Ret beløb',
  'UPDATE_FIX_TXT' => 'Forsøg på at rette ugyldige beløb ved at oprette en gyldig decimal ud fra det nuværende beløb. Ændrede beløb sikkerhedskopieres i databasefeltet amount_backup. Hvis du kører denne og får fejl, skal du ikke køre den igen uden at gendanne sikkerhedskopien, da det kan overskrive sikkerhedskopien med nye ugyldige data.',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'Opdater USD-beløb for salgsmuligheder baseret på de aktuelle valutakurser. Denne værdi bruges til at beregne diagrammer og vise valutabeløb.',
  'UPDATE_CREATE_CURRENCY' => 'Opretter ny valuta:',
  'UPDATE_VERIFY_FAIL' => 'Registrer mislykket verifikation:',
  'UPDATE_VERIFY_CURAMOUNT' => 'Aktuelt beløb:',
  'UPDATE_VERIFY_FIX' => 'Kørsel af rettelse vil give',
  'UPDATE_INCLUDE_CLOSE' => 'Medtag lukkede poster',
  'UPDATE_VERIFY_NEWAMOUNT' => 'Nyt beløb:',
  'UPDATE_VERIFY_NEWCURRENCY' => 'Ny valuta:',
  'UPDATE_DONE' => 'Udført',
  'UPDATE_BUG_COUNT' => 'Der blev fundet fejl og gjort forsøg på at løse dem:',
  'UPDATE_BUGFOUND_COUNT' => 'Der blev fundet fejl:',
  'UPDATE_COUNT' => 'Poster opdateret:',
  'UPDATE_RESTORE_COUNT' => 'Postbeløb gendannet:',
  'UPDATE_RESTORE' => 'Gendan beløb',
  'UPDATE_RESTORE_TXT' => 'Gendanner beløbsværdier ud fra de sikkerhedskopier, der blev oprettet under rettelsen.',
  'UPDATE_FAIL' => 'Kunne ikke opdatere -',
  'UPDATE_NULL_VALUE' => 'Beløbet er NULL. Angiver det til 0 -',
  'UPDATE_MERGE' => 'Flet valutaer',
  'UPDATE_MERGE_TXT' => 'Fletter flere valutaer til en fælles valuta. Hvis der er flere valutaposter for samme valuta, skal du flette dem. Derved flettes også valutaerne for alle andre moduler.',
  'LBL_ACCOUNT_NAME' => 'Virksomhedsnavn:',
  'LBL_AMOUNT' => 'Beløb:',
  'LBL_AMOUNT_USDOLLAR' => 'Beløb i USD:',
  'LBL_CURRENCY' => 'Valuta:',
  'LBL_DATE_CLOSED' => 'Forventet lukkedato:',
  'LBL_CAMPAIGN' => 'Kampagne:',
  'LBL_NEXT_STEP' => 'Næste trin:',
  'LBL_LEAD_SOURCE' => 'Kilde til kundeemne:',
  'LBL_SALES_STAGE' => 'Salgsfase:',
  'LBL_PROBABILITY' => 'Sandsynlighed "%":',
  'LBL_DESCRIPTION' => 'Beskrivelse:',
  'LBL_DUPLICATE' => 'Mulig identisk salgsmulighed',
  'MSG_DUPLICATE' => 'Den salgsmulighedspost, du er ved at oprette, kan være en dublet af en salgsmulighedspost, der allerede findes. Salgsmulighedsposter, der indeholder lignende navne, er angivet nedenfor.<br>Klik på Gem for at fortsætte med at oprette denne nye salgsmulighed, eller klik på Annuller for at vende tilbage til modulet uden at oprette salgsmuligheden.',
  'LBL_NEW_FORM_TITLE' => 'Opret salgsmulighed',
  'LNK_NEW_OPPORTUNITY' => 'Opret salgsmulighed',
  'LNK_OPPORTUNITY_REPORTS' => 'Salgsmulighedsrapporter',
  'LNK_OPPORTUNITY_LIST' => 'Salgsmuligheder',
  'ERR_DELETE_RECORD' => 'Der skal angives et postnummer for at slette salgsmuligheden.',
  'LBL_TOP_OPPORTUNITIES' => 'Mine bedste åbne salgsmuligheder',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'Er du sikker på, at du vil fjerne denne kontakt fra salgsmuligheden?',
  'OPPORTUNITY_REMOVE_PROJECT_CONFIRM' => 'Er du sikker på, at du vil fjerne denne salgsmulighed fra projektet?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Salgsmuligheder',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Aktiviteter',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Historik',
  'LBL_RAW_AMOUNT' => 'Bruttobeløb',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Kundeemner',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakter',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Tilbud',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Dokumenter',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projekter',
  'LBL_ASSIGNED_TO_NAME' => 'Tildelt til:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Tildelt bruger',
  'LBL_CONTRACTS' => 'Kontrakter',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Kontrakter',
  'LBL_MY_CLOSED_OPPORTUNITIES' => 'Mine lukkede salgsmuligheder',
  'LBL_TOTAL_OPPORTUNITIES' => 'Samlede salgsmuligheder',
  'LBL_CLOSED_WON_OPPORTUNITIES' => 'Lukkede vundne salgsmuligheder',
  'LBL_ASSIGNED_TO_ID' => 'Tildelt til id',
  'LBL_CREATED_ID' => 'Oprettet af id',
  'LBL_MODIFIED_ID' => 'Ændret af id',
  'LBL_MODIFIED_NAME' => 'Ændret af brugernavn',
  'LBL_CREATED_USER' => 'Oprettet bruger',
  'LBL_MODIFIED_USER' => 'Ændret bruger',
  'LBL_CAMPAIGN_OPPORTUNITY' => 'Kampagner',
  'LBL_PROJECT_SUBPANEL_TITLE' => 'Projekter',
  'LABEL_PANEL_ASSIGNMENT' => 'Tildeling',
  'LNK_IMPORT_OPPORTUNITIES' => 'Importér salgsmuligheder',
);

