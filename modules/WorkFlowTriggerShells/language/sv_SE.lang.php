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
  'LBL_COMPARE_SPECIFIC_PART_TIME' => 'Jämför deltid',
  'LBL_NEW_FILTER_BUTTON_KEY' => 'F',
  'LBL_NEW_TRIGGER_BUTTON_KEY' => 'T',
  'LBL_MODULE_NAME' => 'Villkor',
  'LBL_MODULE_TITLE' => 'Arbetsflöde Triggers: Home',
  'LBL_MODULE_SECTION_TITLE' => 'När följande villkor är uppfyllda',
  'LBL_SEARCH_FORM_TITLE' => 'Arbetsflöden Trigger Sök',
  'LBL_LIST_FORM_TITLE' => 'Lista Triggers',
  'LBL_NEW_FORM_TITLE' => 'Skapa Trigger',
  'LBL_LIST_NAME' => 'Beskrivning:',
  'LBL_LIST_VALUE' => 'Värde:',
  'LBL_LIST_TYPE' => 'Typ:',
  'LBL_LIST_EVAL' => 'Ut v:',
  'LBL_LIST_FIELD' => 'Fält:',
  'LBL_NAME' => 'Trigger Namn:',
  'LBL_TYPE' => 'Typ:',
  'LBL_EVAL' => 'Trigger Utvärdering:',
  'LBL_SHOW_PAST' => 'Redigera senaste värde:',
  'LBL_SHOW' => 'Visa',
  'LNK_NEW_TRIGGER' => 'Skapa Trigger',
  'LNK_TRIGGER' => 'Arbetsflöden Triggers',
  'LBL_LIST_STATEMEMT' => 'Trigga en händelse basserat på följande:',
  'LBL_FILTER_LIST_STATEMEMT' => 'Filtrera objekt basserat på följande:',
  'NTC_REMOVE_TRIGGER' => 'Är du säker på att du vill ta bort den här Triggern?',
  'LNK_NEW_WORKFLOW' => 'Skapa Arbetsflöde',
  'LNK_WORKFLOW' => 'Arbetsflödesobjekt',
  'LBL_ALERT_TEMPLATES' => 'Meddelandemallar',
  'LBL_TRIGGER' => 'När',
  'LBL_FIELD' => 'fält',
  'LBL_VALUE' => 'värde',
  'LBL_RECORD' => 'moduler',
  'LBL_COMPARE_SPECIFIC_TITLE' => 'När ett fält i målmodulen ändras till eller från ett specifikt värde',
  'LBL_COMPARE_SPECIFIC_PART' => 'ändras till eller från specifikt värde',
  'LBL_COMPARE_CHANGE_TITLE' => 'När ett fält i målmodulen ändras',
  'LBL_COMPARE_CHANGE_PART' => 'ändras',
  'LBL_COMPARE_COUNT_TITLE' => 'Trigga enligt specifikt nummer:',
  'LBL_COMPARE_ANY_TIME_TITLE' => 'Fält ändras inte under specificerad tidsperiod',
  'LBL_COMPARE_ANY_TIME_PART2' => 'ändras inte för',
  'LBL_COMPARE_ANY_TIME_PART3' => 'specifierad tid',
  'LBL_FILTER_FIELD_TITLE' => 'När ett fält i målmodulen innehåller ett specificerat värde',
  'LBL_FILTER_FIELD_PART1' => 'Filtrera efter',
  'LBL_FILTER_REL_FIELD_TITLE' => 'När målmodulen ändras och ett fält i en relaterad modul innehåller ett specificerat värde',
  'LBL_FILTER_REL_FIELD_PART1' => 'Specificera relaterad',
  'LBL_TRIGGER_RECORD_CHANGE_TITLE' => 'När målmodulen ändras',
  'LBL_FUTURE_TRIGGER' => 'Specificera ny',
  'LBL_PAST_TRIGGER' => 'Specificera gammal',
  'LBL_COUNT_TRIGGER1' => 'Totalt',
  'LBL_COUNT_TRIGGER1_2' => 'jämför mot denna summa',
  'LBL_MODULE' => 'modul',
  'LBL_COUNT_TRIGGER2' => 'filtrera efter relaterad',
  'LBL_COUNT_TRIGGER2_2' => 'endast',
  'LBL_COUNT_TRIGGER3' => 'filtrera specifikt efter',
  'LBL_COUNT_TRIGGER4' => 'filtrera efter en sekund',
  'LBL_NEW_FILTER_BUTTON_TITLE' => 'Skapa filter [Alt+F]',
  'LBL_NEW_FILTER_BUTTON_LABEL' => 'Skapa filter',
  'LBL_NEW_TRIGGER_BUTTON_TITLE' => 'Skapa Trigger [Alt + T]',
  'LBL_NEW_TRIGGER_BUTTON_LABEL' => 'Skapa Trigger',
  'LBL_LIST_FRAME_SEC' => 'Filter:',
  'LBL_LIST_FRAME_PRI' => 'Trigger:',
  'LBL_TRIGGER_FILTER_TITLE' => 'Trigga Filter',
  'LBL_TRIGGER_FORM_TITLE' => 'Definiera Omständigheter för Arbetsflödesexekvering',
  'LBL_FILTER_FORM_TITLE' => 'Definiera ett krav för Arbetsflöde',
  'LBL_SPECIFIC_FIELD' => 's specificerat fält',
  'LBL_APOSTROPHE_S' => 's',
  'LBL_WHEN_VALUE1' => 'När fältets värde är',
  'LBL_WHEN_VALUE2' => 'När värdet av',
  'LBL_SELECT_OPTION' => 'Vänligen välj ett alternativ.',
  'LBL_SELECT_TARGET_FIELD' => 'Vänligen välj ett  målfält.',
  'LBL_SELECT_TARGET_MOD' => 'Vänligen välj en målrelaterad modul.',
  'LBL_SPECIFIC_FIELD_LNK' => 'specifikt fält',
  'LBL_MUST_SELECT_VALUE' => 'Du måste välja ett värde för det här fältet',
  'LBL_SELECT_AMOUNT' => 'Du måste välja belopp',
  'LBL_SELECT_1ST_FILTER' => 'Du måste välja ett giltigt första filtrerings fält',
  'LBL_SELECT_2ND_FILTER' => 'Du måste välja ett giltigt andra filter fält',
);

