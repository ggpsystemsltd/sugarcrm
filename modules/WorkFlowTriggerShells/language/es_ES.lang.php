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
  'LBL_MODULE_NAME' => 'Condiciones',
  'LBL_MODULE_TITLE' => 'Disparadores de Workflow: Inicio',
  'LBL_MODULE_SECTION_TITLE' => 'Cuando se cumplan estas condiciones',
  'LBL_SEARCH_FORM_TITLE' => 'Lista de Disparadores de Workflow',
  'LBL_LIST_FORM_TITLE' => 'Lista de Disparadores',
  'LBL_NEW_FORM_TITLE' => 'Nuevo Disparador',
  'LBL_LIST_NAME' => 'Descripción:',
  'LBL_LIST_VALUE' => 'Valor:',
  'LBL_LIST_TYPE' => 'Tipo:',
  'LBL_LIST_EVAL' => 'Eval:',
  'LBL_LIST_FIELD' => 'Campo:',
  'LBL_NAME' => 'Nombre del Disparador:',
  'LBL_TYPE' => 'Tipo:',
  'LBL_EVAL' => 'Evaluación del Disparador:',
  'LBL_SHOW_PAST' => 'Modificar Valor Anterior:',
  'LBL_SHOW' => 'Mostrar',
  'LNK_NEW_TRIGGER' => 'Crear Disparador',
  'LNK_TRIGGER' => 'Disparadores de Workflow',
  'LBL_LIST_STATEMEMT' => 'Disparar un evento basándose en lo siguiente: ',
  'LBL_FILTER_LIST_STATEMEMT' => 'Filtar objetos basándose en lo siguiente: ',
  'NTC_REMOVE_TRIGGER' => '¿Está seguro de que desea quitar este trigger?',
  'LNK_NEW_WORKFLOW' => 'Crear Workflow',
  'LNK_WORKFLOW' => 'Objetos de Workflow',
  'LBL_ALERT_TEMPLATES' => 'Plantillas de Alerta',
  'LBL_TRIGGER' => 'Cuando',
  'LBL_FIELD' => 'campo',
  'LBL_VALUE' => 'valor',
  'LBL_RECORD' => 'del módulo',
  'LBL_COMPARE_SPECIFIC_TITLE' => 'Cuando un campo en el módulo objetivo cambia a o de un valor especificado',
  'LBL_COMPARE_SPECIFIC_PART' => 'cambia a o de un valor especificado',
  'LBL_COMPARE_SPECIFIC_PART_TIME' => ' ',
  'LBL_COMPARE_CHANGE_TITLE' => 'Cuando un campo en el módulo objetivo cambia',
  'LBL_COMPARE_CHANGE_PART' => 'cambia',
  'LBL_COMPARE_COUNT_TITLE' => 'Disparar al alcanzar una cuenta específica',
  'LBL_COMPARE_ANY_TIME_TITLE' => 'El campo no cambia durante un período determinado de tiempo',
  'LBL_COMPARE_ANY_TIME_PART2' => 'no cambia durante ',
  'LBL_COMPARE_ANY_TIME_PART3' => 'período especificado de tiempo',
  'LBL_FILTER_FIELD_TITLE' => 'Cuando un campo en el módulo objetivo contiene un valor especificado',
  'LBL_FILTER_FIELD_PART1' => 'Filtrar por ',
  'LBL_FILTER_REL_FIELD_TITLE' => 'Cuando el módulo objetivo cambia y un campo en el módulo relacionado contiene un valor específico',
  'LBL_FILTER_REL_FIELD_PART1' => 'Especificar relacionado',
  'LBL_TRIGGER_RECORD_CHANGE_TITLE' => 'Cuando el módulo objetivo cambia',
  'LBL_FUTURE_TRIGGER' => 'Especificar nuevo',
  'LBL_PAST_TRIGGER' => 'Especificar viejo',
  'LBL_COUNT_TRIGGER1' => 'Total',
  'LBL_COUNT_TRIGGER1_2' => 'se compara a esta cantidad',
  'LBL_MODULE' => 'módulo',
  'LBL_COUNT_TRIGGER2' => 'filtrar por relacionado',
  'LBL_COUNT_TRIGGER2_2' => 'sólo',
  'LBL_COUNT_TRIGGER3' => 'filtrar específicamente por',
  'LBL_COUNT_TRIGGER4' => 'filtrar por un segundo',
  'LBL_NEW_FILTER_BUTTON_KEY' => 'F',
  'LBL_NEW_FILTER_BUTTON_TITLE' => 'Crear Filtro [Alt+F]',
  'LBL_NEW_FILTER_BUTTON_LABEL' => 'Crear Filtro',
  'LBL_NEW_TRIGGER_BUTTON_KEY' => 'T',
  'LBL_NEW_TRIGGER_BUTTON_TITLE' => 'Crear Disparador [Alt+T]',
  'LBL_NEW_TRIGGER_BUTTON_LABEL' => 'Crear Disparador',
  'LBL_LIST_FRAME_SEC' => 'Filtro: ',
  'LBL_LIST_FRAME_PRI' => 'Disparador: ',
  'LBL_TRIGGER_FILTER_TITLE' => 'Filtros de Disparador',
  'LBL_TRIGGER_FORM_TITLE' => 'Definir una condición para la ejecución del workflow',
  'LBL_FILTER_FORM_TITLE' => 'Definir una condición del workflow',
  'LBL_SPECIFIC_FIELD'=>"'s campo específico",   'LBL_APOSTROPHE_S'=>"'s ",   'LBL_WHEN_VALUE1'=>"Cuando el valor del campo es ",
  'LBL_WHEN_VALUE2'=>"Cuando el valor de ",
  'LBL_SELECT_OPTION' => 'Por favor, seleccione una opción.',
  'LBL_SELECT_TARGET_FIELD' => 'Por favor, seleccione un campo de destino.',
  'LBL_SELECT_TARGET_MOD' => 'Por favor, seleccione un módulo relacionado de destino.',
  'LBL_SPECIFIC_FIELD_LNK' => 'campo especificado',
  'LBL_MUST_SELECT_VALUE' => 'Debe seleccionar un valor para este campo',
	
  'LBL_SELECT_AMOUNT' => 'Debe seleccionar la cantidad',
  'LBL_SELECT_1ST_FILTER' => 'Debe seleccionar un campo válido como 1er filtro',
  'LBL_SELECT_2ND_FILTER' => 'Debe seleccionar un campo válido como 2º filtro',
);

$mod_process_order_strings = array(
	'compare_specific' => array('1','2','3'),
	'compare_change' => array('1','2','3'),
	'compare_count' => array('1','2','3')
);

?>