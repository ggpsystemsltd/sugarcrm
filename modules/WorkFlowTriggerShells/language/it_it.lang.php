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
  'LBL_COMPARE_SPECIFIC_PART_TIME' => '',
  'LBL_NEW_FILTER_BUTTON_KEY' => 'F',
  'LBL_NEW_TRIGGER_BUTTON_KEY' => 'T',
  'LBL_LIST_FRAME_PRI' => 'Trigger:',
  'LBL_APOSTROPHE_S' => "'s ",
  'LBL_MODULE_NAME' => 'Condizioni',
  'LBL_MODULE_TITLE' => 'Workflow Trigger : Home',
  'LBL_MODULE_SECTION_TITLE' => 'Quando queste condizioni sono verificate',
  'LBL_SEARCH_FORM_TITLE' => 'Ricerca Trigger Workflow',
  'LBL_LIST_FORM_TITLE' => 'Elenco Trigger',
  'LBL_NEW_FORM_TITLE' => 'Crea Trigger',
  'LBL_LIST_NAME' => 'Descrizione:',
  'LBL_LIST_VALUE' => 'Valore:',
  'LBL_LIST_TYPE' => 'Tipo:',
  'LBL_LIST_EVAL' => 'Valore:',
  'LBL_LIST_FIELD' => 'Campo:',
  'LBL_NAME' => 'Nome Trigger:',
  'LBL_TYPE' => 'Tipo:',
  'LBL_EVAL' => 'Valore del Trigger:',
  'LBL_SHOW_PAST' => 'Modifica valore precedente:',
  'LBL_SHOW' => 'Mostra',
  'LNK_NEW_TRIGGER' => 'Crea Trigger',
  'LNK_TRIGGER' => 'Workflow Trigger',
  'LBL_LIST_STATEMEMT' => 'Innesca un evento basato su quanto segue:',
  'LBL_FILTER_LIST_STATEMEMT' => 'Filtra gli oggetti basati su quanto segue :',
  'NTC_REMOVE_TRIGGER' => 'Sicuro di voler rimuovere questo Trigger?',
  'LNK_NEW_WORKFLOW' => 'Crea workflow',
  'LNK_WORKFLOW' => 'Oggetto Workflow',
  'LBL_ALERT_TEMPLATES' => 'Modelli Avvisi',
  'LBL_TRIGGER' => 'Quando',
  'LBL_FIELD' => 'campo',
  'LBL_VALUE' => 'valore',
  'LBL_RECORD' => 'moduli',
  'LBL_COMPARE_SPECIFIC_TITLE' => 'quando un campo nel modulo obiettivo cambia a o da un valore specificato',
  'LBL_COMPARE_SPECIFIC_PART' => 'cambia a o da valore specificato',
  'LBL_COMPARE_CHANGE_TITLE' => 'quando un campo sul modulo obiettivo è cambiato',
  'LBL_COMPARE_CHANGE_PART' => 'cambia',
  'LBL_COMPARE_COUNT_TITLE' => 'trigger sul conteggio specifico',
  'LBL_COMPARE_ANY_TIME_TITLE' => 'il campo non cambia per un tempo specificato',
  'LBL_COMPARE_ANY_TIME_PART2' => 'non cambia per',
  'LBL_COMPARE_ANY_TIME_PART3' => 'tempo specificato',
  'LBL_FILTER_FIELD_TITLE' => 'quando un campo nel modulo obiettivo contiene un valore specificato',
  'LBL_FILTER_FIELD_PART1' => 'Filtra per',
  'LBL_FILTER_REL_FIELD_TITLE' => 'quando il modulo obiettivo cambia e un campo in un modulo relativo contiene un valore specificato',
  'LBL_FILTER_REL_FIELD_PART1' => 'specifica relativo',
  'LBL_TRIGGER_RECORD_CHANGE_TITLE' => 'quando il modulo obiettivo è cambiato',
  'LBL_FUTURE_TRIGGER' => 'Specifica nuova',
  'LBL_PAST_TRIGGER' => 'Specifica vecchia',
  'LBL_COUNT_TRIGGER1' => 'Totale',
  'LBL_COUNT_TRIGGER1_2' => 'Paragona a questo importo',
  'LBL_MODULE' => 'modulo',
  'LBL_COUNT_TRIGGER2' => 'filtra per relazioni',
  'LBL_COUNT_TRIGGER2_2' => 'solo',
  'LBL_COUNT_TRIGGER3' => 'filtro specificamente da',
  'LBL_COUNT_TRIGGER4' => 'filtra entro un secondo',
  'LBL_NEW_FILTER_BUTTON_TITLE' => 'Crea filtro [Alt+F]',
  'LBL_NEW_FILTER_BUTTON_LABEL' => 'Crea filtro',
  'LBL_NEW_TRIGGER_BUTTON_TITLE' => 'Crea Trigger [Alt+T]',
  'LBL_NEW_TRIGGER_BUTTON_LABEL' => 'Crea Trigger',
  'LBL_LIST_FRAME_SEC' => 'Filtra:',
  'LBL_TRIGGER_FILTER_TITLE' => 'Filtra Trigger',
  'LBL_TRIGGER_FORM_TITLE' => 'Definisci le condizioni per l´esecuzione del Workflow',
  'LBL_FILTER_FORM_TITLE' => 'Definisci le condizioni del Workflow',
  'LBL_SPECIFIC_FIELD' => 'campo specifico',
  'LBL_WHEN_VALUE1' => 'Quando il valore del campo è',
  'LBL_WHEN_VALUE2' => 'Quando il valore di',
  'LBL_SELECT_OPTION' => 'Si prega di selezionare un opzione.',
  'LBL_SELECT_TARGET_FIELD' => 'Si prega di selezionare un campo obiettivo.',
  'LBL_SELECT_TARGET_MOD' => 'Si prega di selezionare un modulo riferito all´obiettivo.',
  'LBL_SPECIFIC_FIELD_LNK' => 'campo specifico',
  'LBL_MUST_SELECT_VALUE' => 'Devi specificare un valore per questo campo',
  'LBL_SELECT_AMOUNT' => 'Devi specificare l´importo',
  'LBL_SELECT_1ST_FILTER' => 'Devi specificare un primo filtro valido per il campo',
  'LBL_SELECT_2ND_FILTER' => 'Devi specificare un secondo filtro per il campo valido',
  'LBL_COMPARE_SPECIFIC_PART_TIME' => ' ',
);



