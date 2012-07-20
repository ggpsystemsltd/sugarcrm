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
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Dokumenter',
  'LBL_MODULE_NAME' => 'Opportunities',
  'LBL_OPPORTUNITY' => 'Opportunity:',
  'LBL_TYPE' => 'Type:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Opportunities',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Leads',
  'LBL_MODULE_TITLE' => 'Opportunities: Hjem',
  'LBL_SEARCH_FORM_TITLE' => 'Opportunity søk',
  'LBL_VIEW_FORM_TITLE' => 'Opportunity visning',
  'LBL_LIST_FORM_TITLE' => 'Opportunity liste',
  'LBL_OPPORTUNITY_NAME' => 'Opportunity navn:',
  'LBL_NAME' => 'Opportunity navn',
  'LBL_INVITEE' => 'Kontakter',
  'LBL_CURRENCIES' => 'Valuta',
  'LBL_LIST_OPPORTUNITY_NAME' => 'Navn',
  'LBL_LIST_ACCOUNT_NAME' => 'Bedriftnavn',
  'LBL_LIST_AMOUNT' => 'Mengde',
  'LBL_LIST_AMOUNT_USDOLLAR' => 'Beløp USD:',
  'LBL_LIST_DATE_CLOSED' => 'Lukk',
  'LBL_LIST_SALES_STAGE' => 'Salgsnivå',
  'LBL_ACCOUNT_ID' => 'Bedrift-ID',
  'LBL_CURRENCY_ID' => 'Valuta-ID',
  'LBL_CURRENCY_NAME' => 'Valuta-navn',
  'LBL_CURRENCY_SYMBOL' => 'Valuta-symbol',
  'LBL_TEAM_ID' => 'Gruppe-ID',
  'UPDATE' => 'Opportunity - valutaoppdatering',
  'UPDATE_DOLLARAMOUNTS' => 'Oppdatér U.S. Dollar-beløp',
  'UPDATE_VERIFY' => 'Bekreft beløp',
  'UPDATE_VERIFY_TXT' => 'Bekrefter att verdien i Opportunities er gyldige desimaltall som kun inneholder numeriske tegn (0-9) og desimaler (.)',
  'UPDATE_FIX' => 'Ordne beløp',
  'UPDATE_FIX_TXT' => 'Prøver å ordne det slik at ugyldige beløp blir gitt en gyldig desimal fra den nåværende beløp. Alle endrede beløp får oppbakking via mengde_backup databasefeltet. Hvis du utfører denne handlingen og oppdager feil, vennligst ikke prøv igjen før du har gjenopprettet ved hjelp av backupen. Hvis ikke kan backup-dataene overskrives med nye ugyldige data.',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'Oppdatér U.S. Dollar-beløpet for Opportunities basert på den nåværende valutakursen. Denne verdien brukes for å kalkulere Grafer og Listevisning av Valutabeløp.',
  'UPDATE_CREATE_CURRENCY' => 'Oppretter ny valuta:',
  'UPDATE_VERIFY_FAIL' => 'Registerkontrollen mislyktes:',
  'UPDATE_VERIFY_CURAMOUNT' => 'Nåværende beløp:',
  'UPDATE_VERIFY_FIX' => 'Å kjøre ordningen ville gitt',
  'UPDATE_INCLUDE_CLOSE' => 'Inkluderer lukkede registre',
  'UPDATE_VERIFY_NEWAMOUNT' => 'Nytt beløp:',
  'UPDATE_VERIFY_NEWCURRENCY' => 'Ny valuta:',
  'UPDATE_DONE' => 'Ferdig',
  'UPDATE_BUG_COUNT' => 'Bug ble funnet og prøvd løst:',
  'UPDATE_BUGFOUND_COUNT' => 'Bug funnet:',
  'UPDATE_COUNT' => 'Registre ble oppdatert:',
  'UPDATE_RESTORE_COUNT' => 'Registermengder ble gjenopprettet:',
  'UPDATE_RESTORE' => 'Gjenopprett beløp',
  'UPDATE_RESTORE_TXT' => 'Gjenopprett beløp fra backup som ble til ved opprettingen.',
  'UPDATE_FAIL' => 'Kunne ikke oppdatere -',
  'UPDATE_NULL_VALUE' => 'Mengden er NULL som gir 0 -',
  'UPDATE_MERGE' => 'Fusjonér valutaer',
  'UPDATE_MERGE_TXT' => 'Fusjonér multiplume valutaer til en enkelt valuta. Hvis det finnes flere oppføringer for samme valuta, kan du slå de sammen til én. Dette vil også slå sammen valutaene for alle andre moduler.',
  'LBL_ACCOUNT_NAME' => 'Bedriftnavn:',
  'LBL_AMOUNT' => 'Opportunity beløp:',
  'LBL_AMOUNT_USDOLLAR' => 'Beløp USD:',
  'LBL_CURRENCY' => 'Valuta:',
  'LBL_DATE_CLOSED' => 'Forventet avslutningsdato:',
  'LBL_CAMPAIGN' => 'Kampanje:',
  'LBL_NEXT_STEP' => 'Neste skritt:',
  'LBL_LEAD_SOURCE' => 'Lead-kilder:',
  'LBL_SALES_STAGE' => 'Salgssteg:',
  'LBL_PROBABILITY' => 'Sannsynlighet (%):',
  'LBL_DESCRIPTION' => 'Beskrivelse:',
  'LBL_DUPLICATE' => 'Mulig dobbeltOpportunity',
  'MSG_DUPLICATE' => 'Denne Opportunity oppføringen som du er iferd med å opprette kan være en kopi av en Opportunity som allerede finnes. Opportunity oppføringer med lignende navn listes nedenfor.<br>Klikk på lagre for å fortsette med opprettelsen av denne Opportunity, eller klikk på Avbryt for å gå tilbake uten å opprette en ny Opportunity.',
  'LBL_NEW_FORM_TITLE' => 'Opprett Opportunity',
  'LNK_NEW_OPPORTUNITY' => 'Opprett Opportunity',
  'LNK_OPPORTUNITY_REPORTS' => 'Vis Opportunity rapporter',
  'LNK_OPPORTUNITY_LIST' => 'Vis Opportunities',
  'ERR_DELETE_RECORD' => 'Et registernummer må oppgis for å slette denne Opportunity.',
  'LBL_TOP_OPPORTUNITIES' => 'Mine topp ti Opportunities',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'Er du sikker på at du vil fjerne denne Kontakten fra den valgte Opportunity?',
  'OPPORTUNITY_REMOVE_PROJECT_CONFIRM' => 'Er du sikker på at du vil fjerne denne Opportunity fra det valgte prosjektet?',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Handlinger',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Historie',
  'LBL_RAW_AMOUNT' => 'Råmengde',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontaker',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Tilbud',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Prosjekter',
  'LBL_ASSIGNED_TO_NAME' => 'Tildelt:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Tildelt bruker',
  'LBL_CONTRACTS' => 'Kontrakter',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Kontrakter',
  'LBL_MY_CLOSED_OPPORTUNITIES' => 'Mine lukkede Opportunities',
  'LBL_TOTAL_OPPORTUNITIES' => 'Totalt antall Opportunities',
  'LBL_CLOSED_WON_OPPORTUNITIES' => 'Lukkede vunne Opportunities',
  'LBL_ASSIGNED_TO_ID' => 'Tildelt ID',
  'LBL_CREATED_ID' => 'Opprettet av ID',
  'LBL_MODIFIED_ID' => 'Endret av ID',
  'LBL_MODIFIED_NAME' => 'Endret av brukernavn',
  'LBL_CREATED_USER' => 'Opprettet bruker',
  'LBL_MODIFIED_USER' => 'Endret bruker',
  'LBL_CAMPAIGN_OPPORTUNITY' => 'Kampanjer',
  'LBL_PROJECT_SUBPANEL_TITLE' => 'Prosjekter',
  'LABEL_PANEL_ASSIGNMENT' => 'Tildeling',
  'LNK_IMPORT_OPPORTUNITIES' => 'Importer Opportunities',
);

