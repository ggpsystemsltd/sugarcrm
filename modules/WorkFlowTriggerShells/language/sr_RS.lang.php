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
  'LBL_NEW_FILTER_BUTTON_KEY' => 'F',
  'LBL_NEW_TRIGGER_BUTTON_KEY' => 'T',
  'LBL_MODULE_NAME' => 'Uslovi',
  'LBL_MODULE_TITLE' => 'Okidači radnog toka: Početna strana',
  'LBL_MODULE_SECTION_TITLE' => 'Kada se ovi uslovi ispune',
  'LBL_SEARCH_FORM_TITLE' => 'Pretraga okidača radnog toka',
  'LBL_LIST_FORM_TITLE' => 'Lista okidača',
  'LBL_NEW_FORM_TITLE' => 'Kreiraj okidač',
  'LBL_LIST_NAME' => 'Opis:',
  'LBL_LIST_VALUE' => 'Vrednost:',
  'LBL_LIST_TYPE' => 'Tip:',
  'LBL_LIST_EVAL' => 'Procena:',
  'LBL_LIST_FIELD' => 'Polje:',
  'LBL_NAME' => 'Naziv okidača:',
  'LBL_TYPE' => 'Tip:',
  'LBL_EVAL' => 'Procena okidača:',
  'LBL_SHOW_PAST' => 'Promeni predhodnu vrednost:',
  'LBL_SHOW' => 'Prikaži',
  'LNK_NEW_TRIGGER' => 'Kreiraj okidač',
  'LNK_TRIGGER' => 'Okidači radnog toka',
  'LBL_LIST_STATEMEMT' => 'Okidač i događaj zasnovan na sledećem:',
  'LBL_FILTER_LIST_STATEMEMT' => 'Filtriraj objekte zasnovane na sledećem:',
  'NTC_REMOVE_TRIGGER' => 'Da li ste sigurni da želite uklonite ovaj okidač:',
  'LNK_NEW_WORKFLOW' => 'Kreiraj radni tok',
  'LNK_WORKFLOW' => 'Objekti radnog toka',
  'LBL_ALERT_TEMPLATES' => 'Šabloni upozorenja',
  'LBL_TRIGGER' => 'Kada',
  'LBL_FIELD' => 'polje',
  'LBL_VALUE' => 'vrednost',
  'LBL_RECORD' => 'modula',
  'LBL_COMPARE_SPECIFIC_TITLE' => 'Kada se promeni zapis u ciljanom modulu ili formira specifičnu vrednost',
  'LBL_COMPARE_SPECIFIC_PART' => 'promeni ili formira specifičnu vrednost',
  'LBL_COMPARE_SPECIFIC_PART_TIME' => '-prazno-',
  'LBL_COMPARE_CHANGE_TITLE' => 'Kada se polje na ciljanom modulu promeni',
  'LBL_COMPARE_CHANGE_PART' => 'promeni',
  'LBL_COMPARE_COUNT_TITLE' => 'Okida na specifičan broj',
  'LBL_COMPARE_ANY_TIME_TITLE' => 'Polje se ne promeni za određeno vreme',
  'LBL_COMPARE_ANY_TIME_PART2' => 'se ne promeni za',
  'LBL_COMPARE_ANY_TIME_PART3' => 'određen iznos vremena',
  'LBL_FILTER_FIELD_TITLE' => 'Kada polje u ciljanom modulu sadrži određenu vrednost',
  'LBL_FILTER_FIELD_PART1' => 'Filtriraj po',
  'LBL_FILTER_REL_FIELD_TITLE' => 'Kada se ciljani modul promeni i polje u povezanom modulu sadrži određenu vrednost',
  'LBL_FILTER_REL_FIELD_PART1' => 'Odredi povezano',
  'LBL_TRIGGER_RECORD_CHANGE_TITLE' => 'Kada se ciljani modul promeni',
  'LBL_FUTURE_TRIGGER' => 'Odredi novo',
  'LBL_PAST_TRIGGER' => 'Odredi staro',
  'LBL_COUNT_TRIGGER1' => 'Ukupno',
  'LBL_COUNT_TRIGGER1_2' => 'poredi sa ovim iznosom',
  'LBL_MODULE' => 'modul',
  'LBL_COUNT_TRIGGER2' => 'filtriraj po povezanom',
  'LBL_COUNT_TRIGGER2_2' => 'samo',
  'LBL_COUNT_TRIGGER3' => 'filtriraj specifično po',
  'LBL_COUNT_TRIGGER4' => 'filtriraj po drugom',
  'LBL_NEW_FILTER_BUTTON_TITLE' => 'Kreiraj filter [Alt+F]',
  'LBL_NEW_FILTER_BUTTON_LABEL' => 'Kreiraj filter',
  'LBL_NEW_TRIGGER_BUTTON_TITLE' => 'Kreiraj okidač [Alt+T]',
  'LBL_NEW_TRIGGER_BUTTON_LABEL' => 'Kreiraj okidač',
  'LBL_LIST_FRAME_SEC' => 'Filter:',
  'LBL_LIST_FRAME_PRI' => 'Okidač:',
  'LBL_TRIGGER_FILTER_TITLE' => 'Filteri okidača',
  'LBL_TRIGGER_FORM_TITLE' => 'Definiši uslov za izvršenje radnog toka',
  'LBL_FILTER_FORM_TITLE' => 'Definiši uslov radnog toka',
  'LBL_SPECIFIC_FIELD' => '&#39;s specifično polje',
  'LBL_APOSTROPHE_S' => '&#39;s',
  'LBL_WHEN_VALUE1' => 'Kada je vrenost polja',
  'LBL_WHEN_VALUE2' => 'Kada je vrednost',
  'LBL_SELECT_OPTION' => 'Molim, izaberite opciju.',
  'LBL_SELECT_TARGET_FIELD' => 'Molim, izaberite ciljno polje.',
  'LBL_SELECT_TARGET_MOD' => 'Molim, izaberite cilj povezanog modula.',
  'LBL_SPECIFIC_FIELD_LNK' => 'specifično polje',
  'LBL_MUST_SELECT_VALUE' => 'Morate da odaberte vrednost za ovo polje',
  'LBL_SELECT_AMOUNT' => 'Morate da odaberete iznos',
  'LBL_SELECT_1ST_FILTER' => 'Morate da odaberete prvo validno filter polje',
  'LBL_SELECT_2ND_FILTER' => 'Morate da odaberete drugo validno filter polje',
);

