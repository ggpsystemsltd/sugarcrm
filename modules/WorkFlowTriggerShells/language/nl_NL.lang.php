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
  'LBL_LIST_TYPE' => 'Type:',
  'LBL_LIST_EVAL' => 'Eval:',
  'LBL_TYPE' => 'Type:',
  'LNK_TRIGGER' => 'Workflow Triggers',
  'LBL_MODULE' => 'module',
  'LBL_NEW_FILTER_BUTTON_KEY' => 'F',
  'LBL_NEW_TRIGGER_BUTTON_KEY' => 'T',
  'LBL_TRIGGER_FILTER_TITLE' => 'Trigger Filters',
  'LBL_MODULE_NAME' => 'Voorwaarden',
  'LBL_MODULE_TITLE' => 'Workflow Triggers: Start',
  'LBL_MODULE_SECTION_TITLE' => 'Wanneer aan deze voorwaarden is voldaan',
  'LBL_SEARCH_FORM_TITLE' => 'Workflow Trigger Zoeken',
  'LBL_LIST_FORM_TITLE' => 'Trigger Lijst',
  'LBL_NEW_FORM_TITLE' => 'Nieuwe Trigger',
  'LBL_LIST_NAME' => 'Beschrijving:',
  'LBL_LIST_VALUE' => 'Waarde:',
  'LBL_LIST_FIELD' => 'Veld::',
  'LBL_NAME' => 'Trigger Naam:',
  'LBL_EVAL' => 'Trigger Evaluatie:',
  'LBL_SHOW_PAST' => 'Wijzig Vorige Waarde:',
  'LBL_SHOW' => 'Toon',
  'LNK_NEW_TRIGGER' => 'Nieuwe Trigger',
  'LBL_LIST_STATEMEMT' => 'Trigger een gebeurtenis gebaseerd op het volgende:',
  'LBL_FILTER_LIST_STATEMEMT' => 'Filter objecten gebaseerd op het volgende:',
  'NTC_REMOVE_TRIGGER' => 'Weet u zeker dat u deze trigger wil verwijderen?',
  'LNK_NEW_WORKFLOW' => 'Nieuwe Workflow',
  'LNK_WORKFLOW' => 'Workflow Objecten',
  'LBL_ALERT_TEMPLATES' => 'Waarschuwing sjablonen',
  'LBL_TRIGGER' => 'Als',
  'LBL_FIELD' => 'Veld',
  'LBL_VALUE' => 'waarde',
  'LBL_RECORD' => 'module&#39;s',
  'LBL_COMPARE_SPECIFIC_TITLE' => 'Als een veld in de doelmodule wijzigt van of naar een opgegeven waarde',
  'LBL_COMPARE_SPECIFIC_PART' => 'wijzigt van of naar bepaalde waarde',
  'LBL_COMPARE_CHANGE_TITLE' => 'Als een veld in de doelmodule wijzigt',
  'LBL_COMPARE_CHANGE_PART' => 'wijzigt',
  'LBL_COMPARE_COUNT_TITLE' => 'Trigger op een gespecificeerde telling',
  'LBL_COMPARE_ANY_TIME_TITLE' => 'Veld is niet gewijzigd in een bepaalde hoeveelheid tijd',
  'LBL_COMPARE_ANY_TIME_PART2' => 'verandert niet',
  'LBL_COMPARE_ANY_TIME_PART3' => 'in een bepaalde hoeveelheid tijd',
  'LBL_FILTER_FIELD_TITLE' => 'Wanneer het veld in de doelmodule een bepaalde waarde bevat.',
  'LBL_FILTER_FIELD_PART1' => 'Filter op',
  'LBL_FILTER_REL_FIELD_TITLE' => 'Als de doelmodule wijzigt en een veld in een gerelateerde module een bepaalde waarde bevat',
  'LBL_FILTER_REL_FIELD_PART1' => 'Bepaal gerelateerd',
  'LBL_TRIGGER_RECORD_CHANGE_TITLE' => 'Als de doelmodule wijzigt',
  'LBL_FUTURE_TRIGGER' => 'Specificeer nieuwe',
  'LBL_PAST_TRIGGER' => 'Specificeer oude',
  'LBL_COUNT_TRIGGER1' => 'Totaal',
  'LBL_COUNT_TRIGGER1_2' => 'vergeleken met dit bedrag',
  'LBL_COUNT_TRIGGER2' => 'filter de gerelateerde',
  'LBL_COUNT_TRIGGER2_2' => 'alleen',
  'LBL_COUNT_TRIGGER3' => 'filter specifiek op',
  'LBL_COUNT_TRIGGER4' => 'filter op de tweede',
  'LBL_NEW_FILTER_BUTTON_TITLE' => 'Nieuwe Filter [Alt+F]',
  'LBL_NEW_FILTER_BUTTON_LABEL' => 'Nieuwe Filter',
  'LBL_NEW_TRIGGER_BUTTON_TITLE' => 'NieuweTrigger [Alt+T]',
  'LBL_NEW_TRIGGER_BUTTON_LABEL' => 'Nieuwe Trigger',
  'LBL_LIST_FRAME_SEC' => 'Filter:',
  'LBL_LIST_FRAME_PRI' => 'Trigger:',
  'LBL_TRIGGER_FORM_TITLE' => 'Definieer voorwaarde voor de Workflow Uitvoering',
  'LBL_FILTER_FORM_TITLE' => 'Definieer een Workflow Voorwaarde',
  'LBL_SPECIFIC_FIELD' => 'een specifiek veld',
  'LBL_APOSTROPHE_S' => '&#39;s',
  'LBL_WHEN_VALUE1' => 'Als de waarde van het veld is',
  'LBL_WHEN_VALUE2' => 'Wanneer de waarde van',
  'LBL_SELECT_OPTION' => 'Kies een optie',
  'LBL_SELECT_TARGET_FIELD' => 'Kies het doel-veld',
  'LBL_SELECT_TARGET_MOD' => 'Kies een doel-gerelateerde-module',
  'LBL_SPECIFIC_FIELD_LNK' => 'specifiek eld',
  'LBL_MUST_SELECT_VALUE' => 'U moet een waarde kiezen voor dit veld',
  'LBL_SELECT_AMOUNT' => 'U moet een bedrag kiezen',
  'LBL_SELECT_1ST_FILTER' => 'U moet een geldig veld kiezen als 1e filter',
  'LBL_SELECT_2ND_FILTER' => 'U moet een geldig veld kiezen als 2e filter',
);

