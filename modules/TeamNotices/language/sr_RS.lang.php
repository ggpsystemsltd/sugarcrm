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
  'LBL_MODULE_NAME' => 'Timska obaveštenja',
  'LBL_MODULE_TITLE' => 'Timska obaveštenja: Početna strana',
  'LBL_SEARCH_FORM_TITLE' => 'Pretraga Timskih obaveštenja',
  'LBL_LIST_FORM_TITLE' => 'Lista Timskih obaveštenja',
  'LBL_PRODUCTTYPE' => 'Timsko obaveštenje',
  'LBL_NOTICES' => 'Timska obaveštenja',
  'LBL_LIST_NAME' => 'Naslov',
  'LBL_URL_TITLE' => 'Naslov URL adrese',
  'LBL_LIST_DESCRIPTION' => 'Opis',
  'LBL_NAME' => 'Naslov',
  'LBL_DESCRIPTION' => 'Opis',
  'LBL_LIST_LIST_ORDER' => 'Redosled',
  'LBL_LIST_ORDER' => 'Redosled',
  'LBL_DATE_START' => 'Datum početka',
  'LBL_DATE_END' => 'Datum završetka',
  'LNK_NEW_TEAM' => 'Kreiraj tim',
  'LNK_NEW_TEAM_NOTICE' => 'Kreiraj Timsko obaveštenje',
  'LNK_LIST_TEAM' => 'Timovi',
  'LNK_LIST_TEAMNOTICE' => 'Timska obaveštenja',
  'LNK_PRODUCT_LIST' => 'Cenovnik proizvoda',
  'LNK_NEW_PRODUCT' => 'Kreiraj proizvod',
  'LNK_NEW_MANUFACTURER' => 'Proizvođači',
  'LNK_NEW_SHIPPER' => 'Dostavljači',
  'LNK_NEW_PRODUCT_CATEGORY' => 'Kategorije proizvoda',
  'LNK_NEW_PRODUCT_TYPE' => 'Lista tipova proizvoda',
  'NTC_DELETE_CONFIRMATION' => 'Da li ste sigurni da želite da obrišete ovaj zapis?',
  'ERR_DELETE_RECORD' => 'Morate navesti broj zapisa da bi obrisali tip proizvoda.',
  'NTC_LIST_ORDER' => 'Postavi redosled po kome će se ovaj tip prikazati u padajućoj listi tipova proizvoda',
  'LBL_TEAM_NOTICE_FEATURES' => 'Funkcije: * Poboljšano korisničko okruženje i novi Čarobnjak kombinuju jednostavan i intuitivan dizajn sa vođenim procesom koji vodi korisnika kroz kreiranje izveštaja. * Skup kompleksnog izveštavanja pruža mogućnost korisnicima da kreiraju izveštaje koristeći kompleksnu logiku kroz više modula. * Matrični Izveštaji pružaju mogućnost grupisanja više atributa u fleksibilnom mrežnom rasporedu. Korisnici mogu da kreiraju kompleksne pivot tabele sa mogućnošću prikazivanja operacija kao što su Sum, Average, Count and Percentage. * Izvršni filteri dozvoljavaju korisnicima da promene atribute izveštaja u stvarnom vremenu.',
  'LBL_TEAM_NOTICE_WIRELESS' => 'Novi izgled za mobilne uređaje SugarCRM aplikacije stvara kompromis između upotrebljivosti i mobilnosti. Funkcionalnosti: * Poboljšano korisničko okruženje pruža korisnicma uvid u pregled za izmenu, detalje, pregled u vidu listi, i povezanim zapisima, kao i mogućnost pristupa adresaru zaposlenih, čuvanju podešavanja , i pregleda skorašnjih stavki. * Nezavisnost od uređaja dozvoljava korisnicima da vide podatke iz SugarCRM-a sa bilo kog PDA uređaja ili pametnog telefona, uključujući Blackberry i iPhone. * Bogat HTML klijent obezbeđuje čistu prezentaciju SugarCRM podatacima kroz standardni program za čitanje Web strana. * Nove mogućnosti pretrage omogućuju korisnicima da brzo pronađu informacije.',
  'LBL_TEAM_NOTICE_DATA_IMPORT' => 'Poboljšanje uvoza podataka je olakšalo prenos podataka iz aplikacija ako sto su Excel, Act!, Microsoft Outlook, i Salesforce.com u SugarCRM aplikaciju. Poboljšanja: * Poboljšano korisničko okruženje za mapiranje omogućava više opcija koje osiguravaju da se prenos podataka izvrši lako i precizno u SugarCRM. * Kontrola kvaliteta podataka dozvoljava administratorima to odrede da li uvoz podataka treba da kreira nove zapise ili da ažurira postojeće zapise, smanjujući duplirane informacije. * Uvoz podataka u sve module pruža mogućnost da se uvezu informacije iz drugih CRM aplikacija u bilo koji modul, smanjujući ponavljanje unosa podataka.',
  'LBL_TEAM_NOTICE_MODULE_BUILDER' => 'Kreator modula dozvoljava Vam da poboljšate SugarCRM na nove i inovativne načine. Poboljšanja: * Nove veze dozvoljavaju novim i postojećim modulima da se povežu na novi način. * Praćenje promena pruža uvid u kompletnu istoriju kreiranja i modifikacije modula u cilju praćenja prilagođavanja. * Podrška za dašlete omogućava da se funkcionalnost prilagođenih objekata i modula prikaže u AJAX kontejnerima na početnoj strani. * Novi šabloni pružaju način za lako praćenje fajlova i informacija o prodajnim prilikama.',
  'LBL_TEAM_NOTICE_TRACKER' => 'Sistem za praćenje sada pruža prošireni uvid u korišćenje SugarCRM aplikacije i performanse. Funkcionalnosti: * Izveštaji sistema za praćenje pružaju uvid u korišćenje sistema u cilju povećanja prihvatanja korisnika i preglednosti korišćenja CRM-a. Korisnici mogu da vide izveštaje nedeljnih aktivnosti u CRM sistemu, pregledane zapise i module, celokupno vreme pristupa sistemu i status na mreži ostalih članova tima. * Sistem za praćenje pruža administratorima informacije o korišćenju sistema i potencijalnim kritičnim tačkima aplikacije.',
  'dom_status' => 
  array (
    'Visible' => 'Vidljiv',
    'Hidden' => 'Sakriven',
  ),
);

