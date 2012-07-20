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
  'LBL_ID' => 'Id:',
  'LBL_MODULE_NAME' => 'Tasques de Projecte',
  'LBL_MODULE_TITLE' => 'Tasques de Projecte: Inici',
  'LBL_SEARCH_FORM_TITLE' => 'Recerca de Tasques de Projecte',
  'LBL_LIST_FORM_TITLE' => 'Llista de Tasques de Projecte',
  'LBL_EDIT_TASK_IN_GRID_TITLE' => 'Editar Tasca en Reixeta',
  'LBL_PROJECT_TASK_ID' => 'Id Tasca de Projecte:',
  'LBL_PROJECT_ID' => 'Id Projecte',
  'LBL_DATE_ENTERED' => 'Data Creació:',
  'LBL_DATE_MODIFIED' => 'Data Modificació:',
  'LBL_ASSIGNED_USER_ID' => 'Assignat a:',
  'LBL_MODIFIED_USER_ID' => 'Modificat per:',
  'LBL_CREATED_BY' => 'Creat per:',
  'LBL_TEAM_ID' => 'Equip:',
  'LBL_NAME' => 'Nom:',
  'LBL_STATUS' => 'Estat:',
  'LBL_DATE_DUE' => 'Data Venciment:',
  'LBL_TIME_DUE' => 'Hora Venciment:',
  'LBL_RESOURCE' => 'Recurs:',
  'LBL_PREDECESSORS' => 'Predecesors:',
  'LBL_DATE_START' => 'Data Inici:',
  'LBL_DATE_FINISH' => 'Data Fi:',
  'LBL_TIME_START' => 'Hora Inici:',
  'LBL_TIME_FINISH' => 'Hora Fi:',
  'LBL_DURATION' => 'Durada:',
  'LBL_DURATION_UNIT' => 'Unitat de Durada:',
  'LBL_ACTUAL_DURATION' => 'Durada Real:',
  'LBL_PARENT_ID' => 'Projecte:',
  'LBL_PARENT_TASK_ID' => 'Id Tasca Padre:',
  'LBL_PERCENT_COMPLETE' => 'Porcentatge Completat (%):',
  'LBL_PRIORITY' => 'Prioritat:',
  'LBL_DESCRIPTION' => 'Descripció:',
  'LBL_ORDER_NUMBER' => 'Ordre:',
  'LBL_TASK_NUMBER' => 'Número de Tasca:',
  'LBL_TASK_ID' => 'Id Tasca:',
  'LBL_DEPENDS_ON_ID' => 'Depen de:',
  'LBL_MILESTONE_FLAG' => 'Hito:',
  'LBL_ESTIMATED_EFFORT' => 'Treball Estimat (h):',
  'LBL_ACTUAL_EFFORT' => 'Treball Real (h):',
  'LBL_UTILIZATION' => 'Ocupació (%):',
  'LBL_DELETED' => 'Esborrada:',
  'LBL_LIST_ORDER_NUMBER' => 'Ordre',
  'LBL_LIST_NAME' => 'Nom',
  'LBL_LIST_DAYS' => 'dies',
  'LBL_LIST_PARENT_NAME' => 'Projecte',
  'LBL_LIST_PERCENT_COMPLETE' => 'Porcentatge Completat (%)',
  'LBL_LIST_STATUS' => 'Estat',
  'LBL_LIST_DURATION' => 'Durada',
  'LBL_LIST_ACTUAL_DURATION' => 'Durada Real',
  'LBL_LIST_ASSIGNED_USER_ID' => 'Assignada a',
  'LBL_LIST_DATE_DUE' => 'Data Venciment',
  'LBL_LIST_DATE_START' => 'Data Inici',
  'LBL_LIST_DATE_FINISH' => 'Data Fi',
  'LBL_LIST_PRIORITY' => 'Prioritat',
  'LBL_LIST_CLOSE' => 'Tancar',
  'LBL_PROJECT_NAME' => 'Nom Projecte',
  'LNK_NEW_PROJECT' => 'Crear Projecte',
  'LNK_PROJECT_LIST' => 'Llista de Projectes',
  'LNK_NEW_PROJECT_TASK' => 'Crear Tasca de Projecte',
  'LNK_PROJECT_TASK_LIST' => 'Tasques de Projecte',
  'LBL_LIST_MY_PROJECT_TASKS' => 'Les Meves Tasques de Projecte',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Tasques de Projecte',
  'LBL_NEW_FORM_TITLE' => 'Nova Tasca de Projecte',
  'LBL_ACTIVITIES_TITLE' => 'Activitats',
  'LBL_HISTORY_TITLE' => 'Històrial',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Activitats',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Històrial',
  'DATE_JS_ERROR' => 'Si us plau, posi una data que correspongui a l´hora introduïda',
  'LBL_ASSIGNED_USER_NAME' => 'Assignat a',
  'LBL_PARENT_NAME' => 'Nom de Projecte',
  'LBL_LIST_PROJECT_NAME' => 'Projectes',
  'LBL_EDITLAYOUT' => 'Editar disseny',
);

