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
  'LBL_TEAM_ID' => 'Team ID',
  'LBL_TYPE' => 'Type:',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Leads',
  'LBL_MODULE_NAME' => 'Verkoop',
  'LBL_MODULE_TITLE' => 'Verkoop: Start',
  'LBL_SEARCH_FORM_TITLE' => 'Verkoop: Zoeken',
  'LBL_VIEW_FORM_TITLE' => 'Verkoop: Bekijken',
  'LBL_LIST_FORM_TITLE' => 'Verkoop: Lijst',
  'LBL_SALE_NAME' => 'Verkoopnaam:',
  'LBL_SALE' => 'Verkoop:',
  'LBL_NAME' => 'Verkoopnaam',
  'LBL_LIST_SALE_NAME' => 'Naam',
  'LBL_LIST_ACCOUNT_NAME' => 'Organisatienaam',
  'LBL_LIST_AMOUNT' => 'Bedrag',
  'LBL_LIST_DATE_CLOSED' => 'Sluiten',
  'LBL_LIST_SALE_STAGE' => 'Verkoopstadium',
  'LBL_ACCOUNT_ID' => 'Organisatie ID',
  'LBL_CURRENCY_ID' => 'Valuta ID',
  'UPDATE' => 'Verkoop - Valuta Update',
  'UPDATE_DOLLARAMOUNTS' => 'Update U.S. Dollar Bedragen',
  'UPDATE_VERIFY' => 'Controleer Bedragen',
  'UPDATE_VERIFY_TXT' => 'Verifieert dat de bedragen in verkoop geldige decimale getallen zijn met alleen numerieke tekens (0-9) en decimalen (.)',
  'UPDATE_FIX' => 'Herstel Bedragen',
  'UPDATE_FIX_TXT' => 'Poging tot het vaststellen van ongeldige bedragen door het creëren van een geldig decimaal getal van het huidige bedrag. Alle gewijzigde bedragen worden als een back-up in de amount_backup database veld gezet. Als u dit toepast en fouten constateert, dient u eerst de backup te restoren alvorens het nogmaals uit te voeren, anders overschrijft u de backup met ongeldige data.',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'Update van de US Dollar bedragen voor de verkoop op basis van de huidige wisselkoersen. Deze waarde wordt gebruikt om grafieken en lijstweergave valuta bedragen te berekenen.',
  'UPDATE_CREATE_CURRENCY' => 'Nieuwe valuta aanmaken:',
  'UPDATE_VERIFY_FAIL' => 'Record mislukt Verificatie:',
  'UPDATE_VERIFY_CURAMOUNT' => 'Huidig Bedrag:',
  'UPDATE_VERIFY_FIX' => 'Draaien Herstellen zou geven',
  'UPDATE_INCLUDE_CLOSE' => 'Inclusied Afgesloten Records',
  'UPDATE_VERIFY_NEWAMOUNT' => 'Nieuw bedrag:',
  'UPDATE_VERIFY_NEWCURRENCY' => 'Nieuwe valuta:',
  'UPDATE_DONE' => 'Klaar',
  'UPDATE_BUG_COUNT' => 'Fouten gevonden en gepoogd op te lossen:',
  'UPDATE_BUGFOUND_COUNT' => 'Fouten gevonden:',
  'UPDATE_COUNT' => 'Records Aangepast:',
  'UPDATE_RESTORE_COUNT' => 'Record Bedragen Hersteld:',
  'UPDATE_RESTORE' => 'Bedragen Herstellen:',
  'UPDATE_RESTORE_TXT' => 'Herstelt de gebackupte bedragen die zijn aangemaakt tijdens de herstelpoging.',
  'UPDATE_FAIL' => 'Kon niet updaten -',
  'UPDATE_NULL_VALUE' => 'Bedrag is NULL instelling op 0 -',
  'UPDATE_MERGE' => 'Valuta&#39;s samenvoegen',
  'UPDATE_MERGE_TXT' => 'Samenvoegen van meerdere valuta&#39;s in 1 valuta. Als er meerdere valutarecords voor 1 valuta aanwezig zijn kunt u deze samenvoegen. Dit geldt dan ook voor de andere modules.',
  'LBL_ACCOUNT_NAME' => 'Organisatienaam:',
  'LBL_AMOUNT' => 'Bedrag:',
  'LBL_AMOUNT_USDOLLAR' => 'Bedrag USD:',
  'LBL_CURRENCY' => 'Valuta:',
  'LBL_DATE_CLOSED' => 'Verwachte afsluitdatum:',
  'LBL_CAMPAIGN' => 'Campagne:',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projecten',
  'LBL_NEXT_STEP' => 'Volgende stap:',
  'LBL_LEAD_SOURCE' => 'Bron voor Lead:',
  'LBL_SALES_STAGE' => 'Verkoopstadium:',
  'LBL_PROBABILITY' => 'Waarschijnlijkheid (%):',
  'LBL_DESCRIPTION' => 'Beschrijving:',
  'LBL_DUPLICATE' => 'Mogelijke dubbele verkoop',
  'MSG_DUPLICATE' => 'Dit record is misschien een duplicaat van een verkooprecord dat al bestaat. Verkooprecords met vergelijkbare namen worden hieronder vermeld. <br> Klik op Opslaan om verder te gaan met het maken van deze nieuwe verkoop, of klik op Annuleren om naar de module terug te keren.',
  'LBL_NEW_FORM_TITLE' => 'Nieuwe Verkoop',
  'LNK_NEW_SALE' => 'Nieuwe Verkoop',
  'LNK_SALE_LIST' => 'Verkoop',
  'ERR_DELETE_RECORD' => 'Een recordnummer moet ingegeven worden om de verkoop te kunnen verwijderen.',
  'LBL_TOP_SALES' => 'Mijn Top Openstaande Verkopen',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'Ben je zeker dat je deze contactpersoon wil verwijderen uit de verkoop?',
  'SALE_REMOVE_PROJECT_CONFIRM' => 'Ben je zeker dat je deze verkoop wil verwijderen uit het project?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Verkoop',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Activiteiten',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Historie',
  'LBL_RAW_AMOUNT' => 'Ruw Bedrag',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Personen',
  'LBL_ASSIGNED_TO_NAME' => 'Toegewezen aan:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Toegewezen Gebruiker',
  'LBL_MY_CLOSED_SALES' => 'Mijn gewonnen verkopen',
  'LBL_TOTAL_SALES' => 'Totale Verkopen',
  'LBL_CLOSED_WON_SALES' => 'Gewonnen Verkopen',
  'LBL_ASSIGNED_TO_ID' => 'Toegewezen aan ID',
  'LBL_CREATED_ID' => 'Aangemaakt door ID',
  'LBL_MODIFIED_ID' => 'Gewijzigd door ID',
  'LBL_MODIFIED_NAME' => 'Gewijzigd door Gebruiker',
  'LBL_SALE_INFORMATION' => 'Verkoopinformatie',
  'LBL_CURRENCY_NAME' => 'Valutanaam',
  'LBL_CURRENCY_SYMBOL' => 'Valuta symbool',
);

