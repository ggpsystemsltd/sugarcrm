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
  'LBL_MODULE_NAME' => 'Projekto užduotis',
  'LBL_MODULE_TITLE' => 'Projekto užduotis: Pradžia',
  'LBL_SEARCH_FORM_TITLE' => 'Projekto užduoties paieška',
  'LBL_LIST_FORM_TITLE' => 'Projekto užduočių sąrašas',
  'LBL_EDIT_TASK_IN_GRID_TITLE' => 'Redaguoti užduotį lentelėje',
  'LBL_PROJECT_TASK_ID' => 'Projekto užduoties Id:',
  'LBL_PROJECT_ID' => 'Projekto Id:',
  'LBL_DATE_ENTERED' => 'Sukurta:',
  'LBL_DATE_MODIFIED' => 'Redaguota:',
  'LBL_ASSIGNED_USER_ID' => 'Atsakingas:',
  'LBL_MODIFIED_USER_ID' => 'Redaguotojo Id:',
  'LBL_CREATED_BY' => 'Sukūrė:',
  'LBL_TEAM_ID' => 'Komanda:',
  'LBL_NAME' => 'Pavadinimas:',
  'LBL_STATUS' => 'Statusas:',
  'LBL_DATE_DUE' => 'Užbaigimo data:',
  'LBL_TIME_DUE' => 'Užbaigimo laikas:',
  'LBL_RESOURCE' => 'Resursai:',
  'LBL_PREDECESSORS' => 'Pirmtakas:',
  'LBL_DATE_START' => 'Pradžios data:',
  'LBL_DATE_FINISH' => 'Pabaigos data:',
  'LBL_TIME_START' => 'Pradžios laikas:',
  'LBL_TIME_FINISH' => 'Pabaigos laikas:',
  'LBL_DURATION' => 'Trukmė:',
  'LBL_DURATION_UNIT' => 'Trukmės vienetas:',
  'LBL_ACTUAL_DURATION' => 'Faktinė trukmė:',
  'LBL_PARENT_ID' => 'Projektas:',
  'LBL_PARENT_TASK_ID' => 'Pagrindinės užduoties Id:',
  'LBL_PERCENT_COMPLETE' => 'Užbaigta %:',
  'LBL_PRIORITY' => 'Svarba:',
  'LBL_DESCRIPTION' => 'Aprašymas:',
  'LBL_ORDER_NUMBER' => 'Seka:',
  'LBL_TASK_NUMBER' => 'Užduoties Nr:',
  'LBL_TASK_ID' => 'Užduoties ID:',
  'LBL_DEPENDS_ON_ID' => 'Priklauso nuo:',
  'LBL_MILESTONE_FLAG' => 'Esminis įvykis:',
  'LBL_ESTIMATED_EFFORT' => 'Prognozuotos pastangos (val):',
  'LBL_ACTUAL_EFFORT' => 'Faktinės pastangos (val):',
  'LBL_UTILIZATION' => 'Panaudojimas (%):',
  'LBL_DELETED' => 'Ištrintas:',
  'LBL_LIST_ORDER_NUMBER' => 'Seka',
  'LBL_LIST_NAME' => 'Pavadinimas',
  'LBL_LIST_DAYS' => 'dienos',
  'LBL_LIST_PARENT_NAME' => 'Projektas',
  'LBL_LIST_PERCENT_COMPLETE' => 'Užbaigta %',
  'LBL_LIST_STATUS' => 'Statusas',
  'LBL_LIST_DURATION' => 'Trukmė',
  'LBL_LIST_ACTUAL_DURATION' => 'Faktinė trukmė',
  'LBL_LIST_ASSIGNED_USER_ID' => 'Atsakingas',
  'LBL_LIST_DATE_DUE' => 'Užbaigimo data',
  'LBL_LIST_DATE_START' => 'Pradžios data',
  'LBL_LIST_DATE_FINISH' => 'Pabaigos data',
  'LBL_LIST_PRIORITY' => 'Svarba',
  'LBL_LIST_CLOSE' => 'Uždaryti',
  'LBL_PROJECT_NAME' => 'Projekto pavadinimas',
  'LNK_NEW_PROJECT' => 'Sukurti projektą',
  'LNK_PROJECT_LIST' => 'Projektai',
  'LNK_NEW_PROJECT_TASK' => 'Sukurti projekto užduotį',
  'LNK_PROJECT_TASK_LIST' => 'Projekto užduotys',
  'LBL_LIST_MY_PROJECT_TASKS' => 'Mano projekto užduotys',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Projekto užduotys',
  'LBL_NEW_FORM_TITLE' => 'Nauja projekto užduotis',
  'LBL_ACTIVITIES_TITLE' => 'Priminimai',
  'LBL_HISTORY_TITLE' => 'Istorija',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Priminimai',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Istorija',
  'DATE_JS_ERROR' => 'Prašome nurodyti datą atitinkamą įvestam laikui',
  'LBL_ASSIGNED_USER_NAME' => 'Atsakingas',
  'LBL_PARENT_NAME' => 'Projekto pavadinimas',
  'LBL_LIST_PROJECT_NAME' => 'Projektai',
);

