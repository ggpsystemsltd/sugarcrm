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
  'LBL_URL' => 'URL',
  'LBL_STATUS' => 'Status',
  'LBL_MODULE_NAME' => 'Teammeddelelser',
  'LBL_MODULE_TITLE' => 'Teammeddelelser: Startside',
  'LBL_SEARCH_FORM_TITLE' => 'Søg efter teammeddelelse',
  'LBL_LIST_FORM_TITLE' => 'Teammeddelelsesliste',
  'LBL_PRODUCTTYPE' => 'Teammeddelelse',
  'LBL_NOTICES' => 'Teammeddelelser',
  'LBL_LIST_NAME' => 'Titel',
  'LBL_URL_TITLE' => 'URL-titel',
  'LBL_LIST_DESCRIPTION' => 'Beskrivelse',
  'LBL_NAME' => 'Titel',
  'LBL_DESCRIPTION' => 'Beskrivelse',
  'LBL_LIST_LIST_ORDER' => 'Rækkefølge',
  'LBL_LIST_ORDER' => 'Rækkefølge',
  'LBL_DATE_START' => 'Startdato',
  'LBL_DATE_END' => 'Slutdato',
  'LNK_NEW_TEAM' => 'Opret team',
  'LNK_NEW_TEAM_NOTICE' => 'Opret teammeddelelse',
  'LNK_LIST_TEAM' => 'Team',
  'LNK_LIST_TEAMNOTICE' => 'Teammeddelelser',
  'LNK_PRODUCT_LIST' => 'Prislisteprodukter',
  'LNK_NEW_PRODUCT' => 'Opret produkt',
  'LNK_NEW_MANUFACTURER' => 'Producenter',
  'LNK_NEW_SHIPPER' => 'Speditører',
  'LNK_NEW_PRODUCT_CATEGORY' => 'Produktkategorier',
  'LNK_NEW_PRODUCT_TYPE' => 'Produkttypeliste',
  'NTC_DELETE_CONFIRMATION' => 'Er du sikker på, at du vil slette denne post?',
  'ERR_DELETE_RECORD' => 'Du skal angive et postnummer for at slette produkttypen.',
  'NTC_LIST_ORDER' => 'Angiv den rækkefølge, som denne type vises i på rullelisterne med produkttype',
  'LBL_TEAM_NOTICE_FEATURES' => 'Funktioner: * En forbedret brugergrænseflade og en ny guide kombinerer et enkelt, intuitivt design med en proces, der fører brugeren gennem oprettelsen af rapporter. * Komplekse rapporteringssæt giver brugerne mulighed for at oprette rapporter på tværs af flere moduler ved hjælp af en kompleks logik. * Matrixrapporter gør det muligt at gruppere efter flere attributter i et fleksibelt gitterlayout. Brugerne kan oprette komplekse pivottabeller med mulighed for at få vist handlinger som sum, gennemsnit, antal og procentdel. * Kørselsfiltre giver brugerne mulighed for at ændre attributterne i en rapport i realtid.',
  'LBL_TEAM_NOTICE_WIRELESS' => 'Den nye mobile visning til SugarCRM-programmet gør afvejningen mellem brugervenlighed og mobilitet overflødig. Funktioner: * Den forbedrede brugergrænseflade giver brugerne mulighed for at se visningerne Rediger, Detalje og Liste samt relaterede poster og giver dem mulighed for at få adgang til medarbejdermappen, lagringsindstillinger og til at få vist de seneste poster. * Enhedsuafhængighed giver brugerne mulighed for at få vist SugarCRM-data fra enhver PDA eller smartphone, herunder Blackberry og iPhone. * Den formaterede HTML-klient giver en ren præsentation af SugarCRM-data med en standardwebbrowser. * De nye søgefunktioner giver brugerne mulighed for hurtigt at finde oplysninger.',
  'LBL_TEAM_NOTICE_DATA_IMPORT' => 'Forbedret dataimport gør det nemmere at flytte data fra programmer som Excel, Act!, Microsoft Outlook og Salesforce.com til SugarCRM. Forbedringer: * Den forbedrede brugergrænseflade i forbindelse med tilknytning indeholder flere indstillinger til at sikre, at dataoverførslen til SugarCRM udføres nemt og nøjagtigt. * Datakvalitetskontrollerne giver administratorer mulighed for at angive, om en dataimport skal oprette nye poster eller opdatere eksisterende poster og dermed reducere mængden af identiske oplysninger. * Import til alle moduler giver mulighed for at få oplysninger fra et andet CRM-program ind i ethvert modul og dermed reducere genindtastningen af data.',
  'LBL_TEAM_NOTICE_MODULE_BUILDER' => 'Med Modulgenerator kan du udvide SugarCRM på nye og innovative måder. Forbedringer: * De nye relationer giver mulighed for, at nye og eksisterende moduler kan relateres på nye måder. * Revision indeholder en komplet historik over oprettelsen og redigeringerne af moduler, så du kan holde styr på tilpasningerne. * Understøttelse af dashlet giver mulighed for at vise brugerdefineret objekt- og modulfunktionalitet i AJAX-objektbeholdere på startsiden. * De nye skabeloner er en nem måde at spore filer og oplysninger om salgsmuligheder på.',
  'LBL_TEAM_NOTICE_TRACKER' => 'Sporing indeholder nu en udvidet visning af brugen og ydeevnen af SugarCRM. Funktioner: * Sporingsrapporter giver et øjebliksbillede af systembrugen med henblik på at øge brugernes indføring og synlighed i CRM-brug. Brugerne kan få vist rapporter om ugentlige CRM-aktiviteter, læste poster og moduler og andre teammedlemmers akkumulerede tid logged på og onlinestatus. * Systemovervågning giver administratorer oplysninger om, hvordan systemet bruges, og om potentielle stresspunkter i programmet.',
  'dom_status' => 
  array (
    'Visible' => 'Synlig',
    'Hidden' => 'Skjult',
  ),
);

