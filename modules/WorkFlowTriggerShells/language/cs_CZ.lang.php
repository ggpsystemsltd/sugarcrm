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
  'LBL_LIST_EVAL' => 'Vyhodnocení:',
  'LBL_COMPARE_SPECIFIC_PART_TIME' => 'Porovnat specifický časový úsek',
  'LBL_NEW_FILTER_BUTTON_KEY' => 'F',
  'LBL_NEW_TRIGGER_BUTTON_KEY' => 'T',
  'LBL_MODULE_NAME' => 'Podmínky',
  'LBL_MODULE_TITLE' => 'Aktivace workflow: Domů',
  'LBL_MODULE_SECTION_TITLE' => 'Jsou-li tyto podmínky splněny',
  'LBL_SEARCH_FORM_TITLE' => 'Vyhledávání v aktivacích workflow',
  'LBL_LIST_FORM_TITLE' => 'Přehled aktivací',
  'LBL_NEW_FORM_TITLE' => 'Vytvořit aktivaci',
  'LBL_LIST_NAME' => 'Popis:',
  'LBL_LIST_VALUE' => 'Hodnota:',
  'LBL_LIST_TYPE' => 'Typ:',
  'LBL_LIST_FIELD' => 'Pole:',
  'LBL_NAME' => 'Název aktivace:',
  'LBL_TYPE' => 'Typ:',
  'LBL_EVAL' => 'Hodnocení spouštěče:',
  'LBL_SHOW_PAST' => 'Modifikuj předchozí hodnoty:',
  'LBL_SHOW' => 'ukaž',
  'LNK_NEW_TRIGGER' => 'Vytvoř spouštěč',
  'LNK_TRIGGER' => 'Workflow spouštěče',
  'LBL_LIST_STATEMEMT' => 'Trigger události vázené na následející proces:',
  'LBL_FILTER_LIST_STATEMEMT' => 'Filtruj události vázané na následující proces:',
  'NTC_REMOVE_TRIGGER' => 'Jste si jist že chcete smazat tento spouštěč?',
  'LNK_NEW_WORKFLOW' => 'Vytvoření Workflow',
  'LNK_WORKFLOW' => 'Workflow objekty',
  'LBL_ALERT_TEMPLATES' => 'Upozorňovací templaty',
  'LBL_TRIGGER' => 'Když',
  'LBL_FIELD' => 'pole',
  'LBL_VALUE' => 'hodnota',
  'LBL_RECORD' => 'moduly',
  'LBL_COMPARE_SPECIFIC_TITLE' => 'Když se polle v cílovýém modulu změní nebo od stanovené hodnoty',
  'LBL_COMPARE_SPECIFIC_PART' => 'změny nebo od zadané hodnoty',
  'LBL_COMPARE_CHANGE_TITLE' => 'Když se pole v cílovém modulu změní',
  'LBL_COMPARE_CHANGE_PART' => 'změny',
  'LBL_COMPARE_COUNT_TITLE' => 'Spouštěč na konkrétní počet',
  'LBL_COMPARE_ANY_TIME_TITLE' => 'Pole se nemění na určitou dobu',
  'LBL_COMPARE_ANY_TIME_PART2' => 'nezmění se',
  'LBL_COMPARE_ANY_TIME_PART3' => 'specifikovaný čas',
  'LBL_FILTER_FIELD_TITLE' => 'Když pole v cílovém modulu obsahuje nejakou specifickou hodnotu',
  'LBL_FILTER_FIELD_PART1' => 'Filtruj podle',
  'LBL_FILTER_REL_FIELD_TITLE' => 'Když se změní cíl modulu a pole v souvisloslem modulu obsahuje určitou hodnotu',
  'LBL_FILTER_REL_FIELD_PART1' => 'Specifická provázanost',
  'LBL_TRIGGER_RECORD_CHANGE_TITLE' => 'Když se změní cílový modul',
  'LBL_FUTURE_TRIGGER' => 'Specifikuj nový',
  'LBL_PAST_TRIGGER' => 'Specifikuj starý',
  'LBL_COUNT_TRIGGER1' => 'Dohromady',
  'LBL_COUNT_TRIGGER1_2' => 'Porovnej s touto hodnotou',
  'LBL_MODULE' => 'modul',
  'LBL_COUNT_TRIGGER2' => 'filtruj podle vztahu',
  'LBL_COUNT_TRIGGER2_2' => 'pouze',
  'LBL_COUNT_TRIGGER3' => 'fitr podle spec.nastaveni',
  'LBL_COUNT_TRIGGER4' => 'filter po vteřině',
  'LBL_NEW_FILTER_BUTTON_TITLE' => 'Vytvoř filtr [Alt+F]',
  'LBL_NEW_FILTER_BUTTON_LABEL' => 'Vytvoř filtr',
  'LBL_NEW_TRIGGER_BUTTON_TITLE' => 'Vytvoř spouštěč [Alt+T]',
  'LBL_NEW_TRIGGER_BUTTON_LABEL' => 'Vytvoř spouštěč',
  'LBL_LIST_FRAME_SEC' => 'Filtr:',
  'LBL_LIST_FRAME_PRI' => 'Spouštěč:',
  'LBL_TRIGGER_FILTER_TITLE' => 'Trigger filtr',
  'LBL_TRIGGER_FORM_TITLE' => 'Definuj podmínky pro provedení workflow',
  'LBL_FILTER_FORM_TITLE' => 'Definuj workflow podmínky',
  'LBL_SPECIFIC_FIELD' => 'specifického pole',
  'LBL_APOSTROPHE_S' => '\'s',
  'LBL_WHEN_VALUE1' => 'Když hodnota pole je',
  'LBL_WHEN_VALUE2' => 'Když hodnote je',
  'LBL_SELECT_OPTION' => 'Prosím vyberte možnost.',
  'LBL_SELECT_TARGET_FIELD' => 'Prosím vyberte cílové pole.',
  'LBL_SELECT_TARGET_MOD' => 'Prosím vyberte cílový vztažný modul.',
  'LBL_SPECIFIC_FIELD_LNK' => 'specifické pole',
  'LBL_MUST_SELECT_VALUE' => 'Musíte udat hodnotu tohoto pole',
  'LBL_SELECT_AMOUNT' => 'Musíte zvolit objem',
  'LBL_SELECT_1ST_FILTER' => 'Musíte vybrat správny filtr na první pole',
  'LBL_SELECT_2ND_FILTER' => 'Musíte vybrat správny filtr na druhé pole',
);

