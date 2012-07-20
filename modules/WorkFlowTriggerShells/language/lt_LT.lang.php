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
  'LBL_LIST_EVAL' => 'Eval:',
  'LBL_NEW_FILTER_BUTTON_KEY' => 'F',
  'LBL_NEW_TRIGGER_BUTTON_KEY' => 'T',
  'LBL_MODULE_NAME' => 'Sąlygos',
  'LBL_MODULE_TITLE' => 'Darbo sekos trigeriai: Pradžia',
  'LBL_MODULE_SECTION_TITLE' => 'Kai šios sąlygos yra patenkintos',
  'LBL_SEARCH_FORM_TITLE' => 'Darbo sekos trigerių paieška',
  'LBL_LIST_FORM_TITLE' => 'Trigerių sąrašas',
  'LBL_NEW_FORM_TITLE' => 'Sukurti trigerį',
  'LBL_LIST_NAME' => 'Pavadinimas',
  'LBL_LIST_VALUE' => 'Reikšmė',
  'LBL_LIST_TYPE' => 'Tipas:',
  'LBL_LIST_FIELD' => 'Laukas:',
  'LBL_NAME' => 'Trigerio pavadinimas:',
  'LBL_TYPE' => 'Tipas',
  'LBL_EVAL' => 'Trigerio vertinimas:',
  'LBL_SHOW_PAST' => 'Redaguoti seną reikšmę:',
  'LBL_SHOW' => 'Rodyti',
  'LNK_NEW_TRIGGER' => 'Sukurti trigerį',
  'LNK_TRIGGER' => 'Darbų sekos trigeriai',
  'LBL_LIST_STATEMEMT' => 'Aktyvuoti įvykį grindžiamą:',
  'LBL_FILTER_LIST_STATEMEMT' => 'Filtruoti objektus grindžiamus:',
  'NTC_REMOVE_TRIGGER' => 'Ar Jūs tikrai norite išimti šį trigerį?',
  'LNK_NEW_WORKFLOW' => 'Sukurti darbo seką',
  'LNK_WORKFLOW' => 'Darbo sekos objektai',
  'LBL_ALERT_TEMPLATES' => 'Įspėjimų šablonai',
  'LBL_TRIGGER' => 'Kai',
  'LBL_FIELD' => 'laukas',
  'LBL_VALUE' => 'reikšmė',
  'LBL_RECORD' => 'modulio',
  'LBL_COMPARE_SPECIFIC_TITLE' => 'Kai laukas tiksliniame modulyje pasikeičia į arba iš nurodytos reikšmės',
  'LBL_COMPARE_SPECIFIC_PART' => 'pakeičia į arba iš nurodytą reikšmę',
  'LBL_COMPARE_SPECIFIC_PART_TIME' => '.',
  'LBL_COMPARE_CHANGE_TITLE' => 'Kai tikslinio modulio laukas pasikeičia',
  'LBL_COMPARE_CHANGE_PART' => 'pasikeičia',
  'LBL_COMPARE_COUNT_TITLE' => 'Aktyvuoti ant tam tikro skaičiaus',
  'LBL_COMPARE_ANY_TIME_TITLE' => 'Laukas nesikeičia nurodytą kartų skaičių',
  'LBL_COMPARE_ANY_TIME_PART2' => 'nesikeičia',
  'LBL_COMPARE_ANY_TIME_PART3' => 'nurodytą kartų skaičių',
  'LBL_FILTER_FIELD_TITLE' => 'Kai laukas tiksliniame modulyje turi nurodytą reikšmę',
  'LBL_FILTER_FIELD_PART1' => 'Filtruoti pagal',
  'LBL_FILTER_REL_FIELD_TITLE' => 'Kai tikslinis modulis pasikeičia ir laukas susijusiame modulyje turi nurodytą reikšmę',
  'LBL_FILTER_REL_FIELD_PART1' => 'Nurodyti susijusį',
  'LBL_TRIGGER_RECORD_CHANGE_TITLE' => 'Kai tikslinis modulis pasikeičia',
  'LBL_FUTURE_TRIGGER' => 'Nurodyti naują',
  'LBL_PAST_TRIGGER' => 'Nurodyti seną',
  'LBL_COUNT_TRIGGER1' => 'Viso',
  'LBL_COUNT_TRIGGER1_2' => 'sulygina su šia suma',
  'LBL_MODULE' => 'modulis',
  'LBL_COUNT_TRIGGER2' => 'filtruoti pagal susijusį',
  'LBL_COUNT_TRIGGER2_2' => 'tik',
  'LBL_COUNT_TRIGGER3' => 'filtruoti pagal',
  'LBL_COUNT_TRIGGER4' => 'filtruoti pagal antrą',
  'LBL_NEW_FILTER_BUTTON_TITLE' => 'Sukurti filtrą [Alt+F]',
  'LBL_NEW_FILTER_BUTTON_LABEL' => 'Sukurti filtrą',
  'LBL_NEW_TRIGGER_BUTTON_TITLE' => 'Sukurti trigerį [Alt+T]',
  'LBL_NEW_TRIGGER_BUTTON_LABEL' => 'Sukurti trigerį',
  'LBL_LIST_FRAME_SEC' => 'Filtrai:',
  'LBL_LIST_FRAME_PRI' => 'Trigeris:',
  'LBL_TRIGGER_FILTER_TITLE' => 'Trigerių filtrai',
  'LBL_TRIGGER_FORM_TITLE' => 'Nurodykite darbo sekos vykdymo sąlygą',
  'LBL_FILTER_FORM_TITLE' => 'Nurodykite darbo sekos sąlygą',
  'LBL_SPECIFIC_FIELD' => 'laukas',
  'LBL_APOSTROPHE_S' => '\'',
  'LBL_WHEN_VALUE1' => 'Kai lauko reikšmė yra',
  'LBL_WHEN_VALUE2' => 'Kai reikšmė',
  'LBL_SELECT_OPTION' => 'Prašome pasirinkti.',
  'LBL_SELECT_TARGET_FIELD' => 'Prašome pasirinkti tikslinį lauką.',
  'LBL_SELECT_TARGET_MOD' => 'Prašome pasirinkti tikslinį susijusį modulį.',
  'LBL_SPECIFIC_FIELD_LNK' => 'specifinis laukas',
  'LBL_MUST_SELECT_VALUE' => 'Prašome pasirinkti šiam laukui reikšmę',
  'LBL_SELECT_AMOUNT' => 'Prašome pasirinkti sumą',
  'LBL_SELECT_1ST_FILTER' => 'Prašome pasirinkti pirmą teisingą filtro lauką',
  'LBL_SELECT_2ND_FILTER' => 'Prašome pasirinkti antrą teisingą filtro lauką',
);

