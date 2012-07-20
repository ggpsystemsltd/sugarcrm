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
  'LBL_OPP_THOUSANDS' => 'K',
  'ERR_NO_OPPS' => 'Molim, kreirajte neke Prodajne prilike da bi mogli da vidite grafike Prodajnih prilika.',
  'LBL_ALL_OPPORTUNITIES' => 'Ukupan iznos prodajnih prilika je',
  'LBL_CHART_TYPE' => 'Tip dijagrama',
  'LBL_CREATED_ON' => 'Poslednji put pokrenut',
  'LBL_CLOSE_DATE_START' => 'Očekivani datum zatvaranja - Od:',
  'LBL_CLOSE_DATE_END' => 'Datum završetka:',
  'LBL_DATE_END' => 'Datum završetka',
  'LBL_DATE_RANGE_TO' => 'za',
  'LBL_DATE_RANGE' => 'Vremenski opseg je',
  'LBL_DATE_START' => 'Datum početka',
  'LBL_EDIT' => 'Izmeni',
  'LBL_LEAD_SOURCE_BY_OUTCOME_DESC' => 'Prikazuje za odabranog korisnika kumulativne iznose prodajnih prilika po odabranom izvoru informacija o potencijalnom klijentu po ishodu. Ishod se zasniva na tome da li je stanje prodaje završeno dobitkom, završeno gubitkom ili drugačije.',
  'LBL_LEAD_SOURCE_BY_OUTCOME' => 'Sve Prodajne prilike po izvoru informacija o potencijalnim klijentima po ishodu',
  'LBL_LEAD_SOURCE_FORM_DESC' => 'Prikazuje kumulativne iznose Prodajnih prilika po odabranom izvoru informacija o potencijalnom klijentu za odabrane korisnike.',
  'LBL_LEAD_SOURCE_FORM_TITLE' => 'Sve Prodajne prilike po izvoru informacije o potencijalnom klijentu',
  'LBL_LEAD_SOURCE_OTHER' => 'Ostalo',
  'LBL_LEAD_SOURCES' => 'Izvor potencijalnog klijenta:',
  'LBL_MODULE_NAME' => 'Kontrolna tabla',
  'LBL_MODULE_TITLE' => 'Kontrolna tabla: Početna strana',
  'LBL_MONTH_BY_OUTCOME_DESC' => 'Prikazuje kumulativne iznose Prodajne prilike po mesecu po ishodu za izabrane korisnike kod kojih je očekivani datum završetka u okviru navedenog opsega datuma. Ishod je zasnovan na tome da li je stanje prodaje završeno dobitkom, završeno gubitkom ili neka druga vrednost.',
  'LBL_NUMBER_OF_OPPS' => 'Broj Prodajnih prilika',
  'LBL_OPP_SIZE' => 'Veličina Prodajne prilike u',
  'LBL_OPPS_IN_LEAD_SOURCE' => 'prodajne prilike kod kojih je izvor informacija o potencijalnom klijentu',
  'LBL_OPPS_IN_STAGE' => 'gde je stanje prodaje',
  'LBL_OPPS_OUTCOME' => 'gde je ishod',
  'LBL_OPPS_WORTH' => 'prodajne prilike vrede',
  'LBL_PIPELINE_FORM_TITLE_DESC' => 'Prikazuje kumulativane iznose izabranih stanja prodaje za prodajne prilike kod kojih je očekivani datum završetka u okviru zadatog opsega datuma.',
  'LBL_CAMPAIGN_ROI_TITLE_DESC' => 'Prikazuje odziv kampanje po povratku investicije.',
  'LBL_REFRESH' => 'Osveži',
  'LBL_ROLLOVER_DETAILS' => 'Pređite mišem preko stubca za više detalja.',
  'LBL_ROLLOVER_WEDGE_DETAILS' => 'Pređite mišem preko klina za više detalja.',
  'LBL_SALES_STAGE_FORM_DESC' => 'Prikazuje kumulativne iznose prodajnih prilika po izabranoj fazi prodaje za izabranog korisnika kod kojih je očekivani datum završetka u okviru navedenog opsega datuma.',
  'LBL_SALES_STAGE_FORM_TITLE' => 'Prodajni levak po fazama prodaje',
  'LBL_SALES_STAGES' => 'Faze prodaje:',
  'LBL_TOTAL_PIPELINE' => 'Prodajni levak ukupno je',
  'LBL_USERS' => 'Korisnici:',
  'LBL_YEAR_BY_OUTCOME' => 'Prodajni levak po mesecu po prihodu',
  'LBL_YEAR' => 'Godina:',
  'LNK_NEW_ACCOUNT' => 'Kreiraj kompaniju',
  'LNK_NEW_CALL' => 'Evidentiraj poziv',
  'LNK_NEW_CASE' => 'Kreiraj slučaj',
  'LNK_NEW_CONTACT' => 'Kreiraj kontakt',
  'LNK_NEW_ISSUE' => 'Prijavi defekt',
  'LNK_NEW_LEAD' => 'Kreiraj potencijalnog klijenta',
  'LNK_NEW_MEETING' => 'Zakaži sastanak',
  'LNK_NEW_NOTE' => 'Kreiraj belešku ili prilog',
  'LNK_NEW_OPPORTUNITY' => 'Kreiraj Prodajnu priliku',
  'LNK_NEW_QUOTE' => 'Kreiraj ponudu',
  'LNK_NEW_TASK' => 'Kreiraj zadatak',
  'NTC_NO_LEGENDS' => 'Nijedna',
  'LBL_TITLE' => 'Naslov:',
  'LBL_MY_MODULES_USED_SIZE' => 'Broj pristupa',
);

