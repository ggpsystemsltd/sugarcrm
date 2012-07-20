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
  'LBL_OPPORTUNITY' => 'Opportunity:',
  'LBL_TEAM_ID' => 'Team ID',
  'LBL_TYPE' => 'Type:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Opportunities',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Leads',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Quotes',
  'LBL_MODULE_NAME' => 'Opportunity',
  'LBL_MODULE_TITLE' => 'Opportunities: Start',
  'LBL_SEARCH_FORM_TITLE' => 'Opportunity zoeken',
  'LBL_VIEW_FORM_TITLE' => 'Opportunity overzicht',
  'LBL_LIST_FORM_TITLE' => 'Opportunities',
  'LBL_OPPORTUNITY_NAME' => 'Opportunitynaam:',
  'LBL_NAME' => 'Opportunitynaam',
  'LBL_INVITEE' => 'Personen',
  'LBL_CURRENCIES' => 'Valutas',
  'LBL_LIST_OPPORTUNITY_NAME' => 'Opportunity',
  'LBL_LIST_ACCOUNT_NAME' => 'Organisatienaam',
  'LBL_LIST_AMOUNT' => 'Bedrag',
  'LBL_LIST_AMOUNT_USDOLLAR' => 'Bedrag:',
  'LBL_LIST_DATE_CLOSED' => 'Gesloten',
  'LBL_LIST_SALES_STAGE' => 'Verkoopstadium',
  'LBL_ACCOUNT_ID' => 'Organisatie ID',
  'LBL_CURRENCY_ID' => 'Valuta ID',
  'LBL_CURRENCY_NAME' => 'Valutanaam',
  'LBL_CURRENCY_SYMBOL' => 'Valuta symbool',
  'UPDATE' => 'Opportunity - Valuta update',
  'UPDATE_DOLLARAMOUNTS' => 'Update U.S. Dollar bedragen',
  'UPDATE_VERIFY' => 'Controleer bedragen',
  'UPDATE_VERIFY_TXT' => 'Controleert of de bedragen in Opportunities geldige numerieke waarden bevatten.',
  'UPDATE_FIX' => 'Herstel bedragen',
  'UPDATE_FIX_TXT' => 'Probeert ongeldige decimale waarden te herstellen. De originele waarden worden gebackup-ed in het database veld &#39;bedrag backup&#39;. Wanneer u deze functie gebruikt en u stuit op fouten, start de actie dan pas op nieuw nadat u de backup terug hebt gezet.',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'Update de U.S. Dollar bedragen voor Opportunities gebaseerd op de huidige set van wisselkoersen. Deze waarde wordt gebruikt voor de berekening van grafieken en valuta lijsten.',
  'UPDATE_CREATE_CURRENCY' => 'Nieuwe Valuta:',
  'UPDATE_VERIFY_FAIL' => 'Controle van record mislukt:',
  'UPDATE_VERIFY_CURAMOUNT' => 'Huidig bedrag:',
  'UPDATE_VERIFY_FIX' => 'Na herstel wordt dit',
  'UPDATE_INCLUDE_CLOSE' => 'Inclusief gesloten records',
  'UPDATE_VERIFY_NEWAMOUNT' => 'Nieuw bedrag:',
  'UPDATE_VERIFY_NEWCURRENCY' => 'Nieuwe Valuta:',
  'UPDATE_DONE' => 'Gereed',
  'UPDATE_BUG_COUNT' => 'Fouten gevonden en geprobeerd op te lossen:',
  'UPDATE_BUGFOUND_COUNT' => 'Gevonden fouten:',
  'UPDATE_COUNT' => 'Bijgewerkte records:',
  'UPDATE_RESTORE_COUNT' => 'Records waarvan bedragen zijn teruggezet:',
  'UPDATE_RESTORE' => 'Bedragen terugzetten',
  'UPDATE_RESTORE_TXT' => 'Zet bedragen terug uit de backup die is gemaakt gedurende het herstel.',
  'UPDATE_FAIL' => 'Kon niet bijwerken -',
  'UPDATE_NULL_VALUE' => 'Bedrag is NULL zet het op 0 -',
  'UPDATE_MERGE' => 'Valuta samenvoegen',
  'UPDATE_MERGE_TXT' => 'Merge multiple currencies into a single currency. If you notice that there are multiple currency records for the same currency, you may choose to merge them together. This will also merge the currencies for all other modules.',
  'LBL_ACCOUNT_NAME' => 'Organisatienaam:',
  'LBL_AMOUNT' => 'Bedrag:',
  'LBL_AMOUNT_USDOLLAR' => 'Bedrag USD:',
  'LBL_CURRENCY' => 'Valuta:',
  'LBL_DATE_CLOSED' => 'Verwachte afsluitdatum:',
  'LBL_CAMPAIGN' => 'Campagne:',
  'LBL_NEXT_STEP' => 'Volgende stap:',
  'LBL_LEAD_SOURCE' => 'Bron voor lead:',
  'LBL_SALES_STAGE' => 'Verkoopstadium:',
  'LBL_PROBABILITY' => 'Waarschijnlijkheid (%):',
  'LBL_DESCRIPTION' => 'Beschrijving:',
  'LBL_DUPLICATE' => 'Mogelijk dubbele Opportunity',
  'MSG_DUPLICATE' => 'Creating this opportunity may potentialy create a duplicate opportunity. You may either select an opportunity from the list below or you may click on Create New Opportunity to continue creating a new opportunity with the previously entered data.',
  'LBL_NEW_FORM_TITLE' => 'Nieuwe Opportunity',
  'LNK_NEW_OPPORTUNITY' => 'Nieuwe Opportunity',
  'LNK_OPPORTUNITY_REPORTS' => 'Opportunity Rapporten',
  'LNK_OPPORTUNITY_LIST' => 'Opportunities',
  'ERR_DELETE_RECORD' => 'Er moet een record nummer zijn gespecificeerd om deze Opportunity te verwijderen.',
  'LBL_TOP_OPPORTUNITIES' => 'Mijn openstaande top Opportunities',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'Weet u zeker dat u deze contactpersoon wilt verwijderen bij deze Opportunity?',
  'OPPORTUNITY_REMOVE_PROJECT_CONFIRM' => 'Weet je zeker dat je deze Opportunity uit het project wilt verwijderen?',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Activiteiten',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Historie',
  'LBL_RAW_AMOUNT' => 'Ruw Bedrag',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Personen',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Documenten',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projecten',
  'LBL_ASSIGNED_TO_NAME' => 'Toegewezen Gebruikersnaam:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Toegewezen Gebruiker',
  'LBL_CONTRACTS' => 'Contracten',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Contracten',
  'LBL_MY_CLOSED_OPPORTUNITIES' => 'Mijn Gewonnen Opportunities',
  'LBL_TOTAL_OPPORTUNITIES' => 'Totaal Opportunities',
  'LBL_CLOSED_WON_OPPORTUNITIES' => 'Gewonnen Opportunities',
  'LBL_ASSIGNED_TO_ID' => 'Toegewezen aan ID',
  'LBL_CREATED_ID' => 'Aangemaakt door ID',
  'LBL_MODIFIED_ID' => 'Gewijzigd door ID',
  'LBL_MODIFIED_NAME' => 'Gewijzigd door Gebruikersnaam',
  'LBL_CREATED_USER' => 'Aangemaakt Gebruiker',
  'LBL_MODIFIED_USER' => 'Gewijzigd Gebruiker',
  'LBL_CAMPAIGN_OPPORTUNITY' => 'Campagnes',
  'LBL_PROJECT_SUBPANEL_TITLE' => 'Projecten',
  'LABEL_PANEL_ASSIGNMENT' => 'Taak',
  'LNK_IMPORT_OPPORTUNITIES' => 'Importeer Opportunities',
);

