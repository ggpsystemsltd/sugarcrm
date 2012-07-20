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
  'LBL_COMPARE_COUNT_TITLE' => 'Wyzwól po określonej ilosci',
  'LBL_COUNT_TRIGGER4' => 'filtruj według sekund',
  'LBL_NEW_FILTER_BUTTON_KEY' => 'F',
  'LBL_MODULE_NAME' => 'Warunki',
  'LBL_MODULE_TITLE' => 'Wyzwalacze Workflow: Strona główna',
  'LBL_MODULE_SECTION_TITLE' => 'Gdy te warunki są spełnione',
  'LBL_SEARCH_FORM_TITLE' => 'Wyszukiwanie wyzwalaczy Workflow',
  'LBL_LIST_FORM_TITLE' => 'Lista wyzwalaczy',
  'LBL_NEW_FORM_TITLE' => 'Utwórz wyzwalacz',
  'LBL_LIST_NAME' => 'Opis:',
  'LBL_LIST_VALUE' => 'Wartość:',
  'LBL_LIST_TYPE' => 'Typ:',
  'LBL_LIST_EVAL' => 'Ocena:',
  'LBL_LIST_FIELD' => 'Pole:',
  'LBL_NAME' => 'Nazwa wyzwalacza:',
  'LBL_TYPE' => 'Typ:',
  'LBL_EVAL' => 'Ocena wyzwalacza:',
  'LBL_SHOW_PAST' => 'Modyfikuj przeszłą wartość:',
  'LBL_SHOW' => 'Pokaż',
  'LNK_NEW_TRIGGER' => 'Utwórz wyzwalacz',
  'LNK_TRIGGER' => 'Wyzwalacze Workflow',
  'LBL_LIST_STATEMEMT' => 'Wyzwól wydarzenie na podstawie następujących:',
  'LBL_FILTER_LIST_STATEMEMT' => 'Filtruj obiekty na podstawie następujących:',
  'NTC_REMOVE_TRIGGER' => 'Czy na pewno chcesz usunąć ten wyzwalacz?',
  'LNK_NEW_WORKFLOW' => 'Utwórz Workflow',
  'LNK_WORKFLOW' => 'Obiekty Workflow',
  'LBL_ALERT_TEMPLATES' => 'Szablony alertów',
  'LBL_TRIGGER' => 'Gdy',
  'LBL_FIELD' => 'pole',
  'LBL_VALUE' => 'wartość:',
  'LBL_RECORD' => 'modułu',
  'LBL_COMPARE_SPECIFIC_TITLE' => 'Gdy pole w docelowym module zmienia się do lub z określonej wartości',
  'LBL_COMPARE_SPECIFIC_PART' => 'zmienia się do lub z określonej wartości',
  'LBL_COMPARE_CHANGE_TITLE' => 'Gdy pole w docelowym module zmienia się',
  'LBL_COMPARE_CHANGE_PART' => 'zmienia się',
  'LBL_COMPARE_ANY_TIME_TITLE' => 'Pole nie zmienia się dla określonej ilości czasu',
  'LBL_COMPARE_ANY_TIME_PART2' => 'nie zmienia się dla',
  'LBL_COMPARE_ANY_TIME_PART3' => 'określona ilość czasu',
  'LBL_FILTER_FIELD_TITLE' => 'Gdy pole w docelowym module zawiera określoną wartość',
  'LBL_FILTER_FIELD_PART1' => 'Filtruj według',
  'LBL_FILTER_REL_FIELD_TITLE' => 'Gdy docelowy moduł zmienia się i pole w powiązanym module zawiera określoną wartość',
  'LBL_FILTER_REL_FIELD_PART1' => 'Określ powiązane',
  'LBL_TRIGGER_RECORD_CHANGE_TITLE' => 'Gdy docelowy moduł zmienia się',
  'LBL_FUTURE_TRIGGER' => 'Określ nowy',
  'LBL_PAST_TRIGGER' => 'Określ stary',
  'LBL_COUNT_TRIGGER1' => 'Łączny',
  'LBL_COUNT_TRIGGER1_2' => 'porównuje do warości',
  'LBL_MODULE' => 'moduł',
  'LBL_COUNT_TRIGGER2' => 'filtruj według powiązanego',
  'LBL_COUNT_TRIGGER2_2' => 'tylko',
  'LBL_COUNT_TRIGGER3' => 'filtruj według',
  'LBL_NEW_FILTER_BUTTON_TITLE' => 'Utwórz filtr [Alt+F]',
  'LBL_NEW_FILTER_BUTTON_LABEL' => 'Utwórz filtr',
  'LBL_NEW_TRIGGER_BUTTON_KEY' => 'W',
  'LBL_NEW_TRIGGER_BUTTON_TITLE' => 'Utwórz wyzwalacz [Alt+T]',
  'LBL_NEW_TRIGGER_BUTTON_LABEL' => 'Utwórz wyzwalacz',
  'LBL_LIST_FRAME_SEC' => 'Filtr:',
  'LBL_LIST_FRAME_PRI' => 'Wyzwalacz:',
  'LBL_TRIGGER_FILTER_TITLE' => 'Filtry wyzwalacza',
  'LBL_TRIGGER_FORM_TITLE' => 'Zdefiniuj warunek dla realizacji Workflow',
  'LBL_FILTER_FORM_TITLE' => 'Zdefiniuj warunek Workflow',
  'LBL_SPECIFIC_FIELD' => 'określone pole',
  'LBL_WHEN_VALUE1' => 'gdy wartość pola jest',
  'LBL_WHEN_VALUE2' => 'Gdy wartość',
  'LBL_SELECT_OPTION' => 'Proszę wybierz opcję.',
  'LBL_SELECT_TARGET_FIELD' => 'Proszę wybierz pole docelowe.',
  'LBL_SELECT_TARGET_MOD' => 'Prosze wybrać moduł powiązany z celem.',
  'LBL_SPECIFIC_FIELD_LNK' => 'określone pole',
  'LBL_MUST_SELECT_VALUE' => 'Musisz wybrać wartość dla tego pola',
  'LBL_SELECT_AMOUNT' => 'Musisz wybrać wartość',
  'LBL_SELECT_1ST_FILTER' => 'Musisz wybrać pierwsze poprawne pole filtra',
  'LBL_SELECT_2ND_FILTER' => 'Musisz wybrać drugie poprawne pole filtra',
);

