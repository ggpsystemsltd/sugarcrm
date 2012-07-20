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
  'LBL_COMPARE_SPECIFIC_PART_TIME' => 'LBL_COMPARE_SPECIFIC_PART_TIME',
  'LBL_LIST_EVAL' => 'Eval:',
  'LBL_COMPARE_COUNT_TITLE' => 'Trigger on specific count',
  'LBL_TRIGGER_RECORD_CHANGE_TITLE' => 'When the target module changes',
  'LBL_COUNT_TRIGGER1_2' => 'compares to this amount',
  'LBL_COUNT_TRIGGER2' => 'filter by related',
  'LBL_COUNT_TRIGGER2_2' => 'only',
  'LBL_COUNT_TRIGGER3' => 'filter specifically by',
  'LBL_COUNT_TRIGGER4' => 'filter by a second',
  'LBL_NEW_FILTER_BUTTON_KEY' => 'F',
  'LBL_NEW_TRIGGER_BUTTON_KEY' => 'T',
  'LBL_SPECIFIC_FIELD' => '\'s specific field',
  'LBL_MODULE_NAME' => 'Tingimused',
  'LBL_MODULE_TITLE' => 'Töövoo käivitajad: Avaleht',
  'LBL_MODULE_SECTION_TITLE' => 'Kui need tngimused on täidetud',
  'LBL_SEARCH_FORM_TITLE' => 'Töövoo käivitaja otsing',
  'LBL_LIST_FORM_TITLE' => 'Käivitaja loend',
  'LBL_NEW_FORM_TITLE' => 'Loo käivitaja',
  'LBL_LIST_NAME' => 'Kirjeldus:',
  'LBL_LIST_VALUE' => 'Väärtus:',
  'LBL_LIST_TYPE' => 'Tüüp:',
  'LBL_LIST_FIELD' => 'Väli:',
  'LBL_NAME' => 'Käivitaja nimi:',
  'LBL_TYPE' => 'Tüüp:',
  'LBL_EVAL' => 'Käivitaja hinnang:',
  'LBL_SHOW_PAST' => 'Muuda viimast väärtust:',
  'LBL_SHOW' => 'Näita',
  'LNK_NEW_TRIGGER' => 'Loo käivitaja',
  'LNK_TRIGGER' => 'Töövoo käivitajad',
  'LBL_LIST_STATEMEMT' => 'Käivitus põhineb järgneval:',
  'LBL_FILTER_LIST_STATEMEMT' => 'Filtri omadused baseeruvad järgneval:',
  'NTC_REMOVE_TRIGGER' => 'Kas oled kindel, et soovid selle käivitaja eemaldada?',
  'LNK_NEW_WORKFLOW' => 'Loo töövoog',
  'LNK_WORKFLOW' => 'Töövoo eesmärgid',
  'LBL_ALERT_TEMPLATES' => 'Teavituse mallid',
  'LBL_TRIGGER' => 'Millal',
  'LBL_FIELD' => 'väli',
  'LBL_VALUE' => 'väärtus',
  'LBL_RECORD' => 'moodulid',
  'LBL_COMPARE_SPECIFIC_TITLE' => 'Kui väli sihtmoodulis muutub määratud väärtuseks või väärtusest',
  'LBL_COMPARE_SPECIFIC_PART' => 'muutub väärtuseks või väärtuseks',
  'LBL_COMPARE_CHANGE_TITLE' => 'Kui väli sihtmoodulis muutub',
  'LBL_COMPARE_CHANGE_PART' => 'muudatused',
  'LBL_COMPARE_ANY_TIME_TITLE' => 'Väli ei muutu teatud aja jooksul',
  'LBL_COMPARE_ANY_TIME_PART2' => 'ei muutu',
  'LBL_COMPARE_ANY_TIME_PART3' => 'määratud aja jooksul',
  'LBL_FILTER_FIELD_TITLE' => 'Kui väli sihtmoodulis sisaldab täpsustatud väärtust',
  'LBL_FILTER_FIELD_PART1' => 'Filter',
  'LBL_FILTER_REL_FIELD_TITLE' => 'Kui sihtmoodul muutub ja väli seotud moodulis sisaldab täpsustatud väärtust',
  'LBL_FILTER_REL_FIELD_PART1' => 'täpsusta seotuid',
  'LBL_FUTURE_TRIGGER' => 'Täpsusta uus',
  'LBL_PAST_TRIGGER' => 'Täpsusta vana',
  'LBL_COUNT_TRIGGER1' => 'Kokku',
  'LBL_MODULE' => 'moodul',
  'LBL_NEW_FILTER_BUTTON_TITLE' => 'Loo filter [Alt+F]',
  'LBL_NEW_FILTER_BUTTON_LABEL' => 'Loo filter',
  'LBL_NEW_TRIGGER_BUTTON_TITLE' => 'Loo käivitaja [Alt+T]',
  'LBL_NEW_TRIGGER_BUTTON_LABEL' => 'Loo käivitaja',
  'LBL_LIST_FRAME_SEC' => 'Filter:',
  'LBL_LIST_FRAME_PRI' => 'Käivitaja:',
  'LBL_TRIGGER_FILTER_TITLE' => 'Käivitusfiltrid:',
  'LBL_TRIGGER_FORM_TITLE' => 'Defineeri töövoo täitmise tingimused',
  'LBL_FILTER_FORM_TITLE' => 'Defineeri töövoo tingimused',
  'LBL_APOSTROPHE_S' => '\'s',
  'LBL_WHEN_VALUE1' => 'Kui selle välja väärtus on',
  'LBL_WHEN_VALUE2' => 'Kui väärtus',
  'LBL_SELECT_OPTION' => 'Palun vali tehing.',
  'LBL_SELECT_TARGET_FIELD' => 'Palun vali sihtväli.',
  'LBL_SELECT_TARGET_MOD' => 'Palun vali eesmärgistatud moodul.',
  'LBL_SPECIFIC_FIELD_LNK' => 'täpsustatud väli',
  'LBL_MUST_SELECT_VALUE' => 'Pead valima selle välja jaoks väärtuse',
  'LBL_SELECT_AMOUNT' => 'Pead valima koguse',
  'LBL_SELECT_1ST_FILTER' => 'Pead valima esimese kehtiva filtri välja',
  'LBL_SELECT_2ND_FILTER' => 'Pead valima teise kehtiva filtri välja',
);

