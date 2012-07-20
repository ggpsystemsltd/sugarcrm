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
  'LBL_TEAM_NOTICE_DATA_IMPORT' => 'Data Import förbättringar gör det ännu enklare att flytta från data från program som Excel, Act!, Microsoft Outlook och Salesforce.com in till SugarCRM. Förbättringar: * Förbättrat användargränssnitt för kartläggning ger fler alternativ för att säkerställa dataöverföring utförs smidigt och exakt i SugarCRM. * Data Kvalitetskontroller tillåter administratörer att ange om data importer bör skapa nya poster eller uppdatera befintliga poster, vilket minskar duplicerad information. * Import till Alla Moduler ger möjlighet att hämta in information från andra CRM-program till moduler och på så vis minska datainföring.',
  'LBL_URL' => 'URL',
  'LBL_STATUS' => 'Status',
  'LBL_MODULE_NAME' => 'Team notiser',
  'LBL_MODULE_TITLE' => 'Team notiser: Hem',
  'LBL_SEARCH_FORM_TITLE' => 'Sök team notis',
  'LBL_LIST_FORM_TITLE' => 'Lista team notiser',
  'LBL_PRODUCTTYPE' => 'Team notis',
  'LBL_NOTICES' => 'Team notiser',
  'LBL_LIST_NAME' => 'Titel',
  'LBL_URL_TITLE' => 'URL titel',
  'LBL_LIST_DESCRIPTION' => 'Beskrivning',
  'LBL_NAME' => 'Titel',
  'LBL_DESCRIPTION' => 'Beskrivning',
  'LBL_LIST_LIST_ORDER' => 'Ordning',
  'LBL_LIST_ORDER' => 'Ordning',
  'LBL_DATE_START' => 'Startdatum',
  'LBL_DATE_END' => 'Slutdatum',
  'LNK_NEW_TEAM' => 'Skapa team',
  'LNK_NEW_TEAM_NOTICE' => 'Skapa team notis',
  'LNK_LIST_TEAM' => 'Team',
  'LNK_LIST_TEAMNOTICE' => 'Team notiser',
  'LNK_PRODUCT_LIST' => 'Produkter i prislistan',
  'LNK_NEW_PRODUCT' => 'Skapa produkt',
  'LNK_NEW_MANUFACTURER' => 'Tillverkare',
  'LNK_NEW_SHIPPER' => 'Leverantörer',
  'LNK_NEW_PRODUCT_CATEGORY' => 'Produktkategorier',
  'LNK_NEW_PRODUCT_TYPE' => 'Lista produkttyper',
  'NTC_DELETE_CONFIRMATION' => 'Är du säker på att du vill radera posten?',
  'ERR_DELETE_RECORD' => 'Ett objektnummer måste specificeras för att radera produkttypen.',
  'NTC_LIST_ORDER' => 'Sätt ordningen för hur typen ska visas i dropdown menyn över produkttyper',
  'LBL_TEAM_NOTICE_FEATURES' => 'Funktioner: * förbättrat användargränssnitt och ny guide kombinerar en enkel, intuitiv design med en guidad process för att stega användaren genom skapande av rapporter. * Komplexa rapportuppsättningarna möjligör för användarna att skapa rapporter i flera moduler med komplex logik. * Matris Rapporter erbjuder möjligheten att gruppering av flera attribut i en flexibel rutnätlayout. Användare kan skapa komplexa pivottabeller med möjligheter att visa uträkningar som summa, medelvärde, antal och procent. * Run-Time filter tillåter användare att ändra attributen för en rapport i realtid ..',
  'LBL_TEAM_NOTICE_WIRELESS' => 'Funktioner: * förbättrat användargränssnitt och ny guide kombinerar en enkel, intuitiv design med en guidad process för att stega användaren genom skapande av rapporter. * Komplexa rapportuppsättningarna möjligör för användarna att skapa rapporter i flera moduler med komplex logik. * Matris Rapporter erbjuder möjligheten att gruppering av flera attribut i en flexibel rutnätlayout. Användare kan skapa komplexa pivottabeller med möjligheter att visa uträkningar som summa, medelvärde, antal och procent. * Run-Time filter tillåter användare att ändra attributen för en rapport i realtid ..',
  'LBL_TEAM_NOTICE_MODULE_BUILDER' => 'Modul Builder ger dig möjlighet att utöka SugarCRM på nya och innovativa sätt. Förbättringar: * nya relationer ger möjlighet för nya och befintliga moduler att vara relaterade på nya sätt. * Revision ger en fullständig historik över modulskapande och ändringar för att hålla reda på alla anpassningar. * Dashlet stöd tillåter anpassade objekt och modul funktionalitet att visas i AJAX kontroller på hemsidan. * Nya Mallar ger dig ett enkelt sätt spåra filer och information om affärsmöjligheter.',
  'LBL_TEAM_NOTICE_TRACKER' => 'Tracker ger nu en utökad inblick i SugarCRM användning och prestanda. Funktioner: * Trackerrapporter ger en ögonblicksbild i systemanvändning för att öka användarnas antagandet och insyn i CRM utnyttjande. Användare kan se veckorapporter för CRM-aktiviteter, visade register och moduler, kumulativ login tid och onlinestatus för andra gruppmedlemmar. * Systemövervakning ger administratörer information om hur systemet används och möjliga problem i applikationen.',
  'dom_status' => 
  array (
    'Visible' => 'Synlig',
    'Hidden' => 'Dold',
  ),
);

