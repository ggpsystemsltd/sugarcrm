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
  'LBL_PARENT_TASK_ID' => 'Parent Task Id:',
  'LBL_MILESTONE_FLAG' => 'Milestone:',
  'LBL_MODULE_NAME' => 'Projekti ülesanded',
  'LBL_MODULE_TITLE' => 'Projekti ülesanne: Avaleht',
  'LBL_SEARCH_FORM_TITLE' => 'Projekti ülesande otsing',
  'LBL_LIST_FORM_TITLE' => 'Projekti ülesande loend',
  'LBL_EDIT_TASK_IN_GRID_TITLE' => 'Redigeeri ülesannet tabelis',
  'LBL_ID' => 'Id',
  'LBL_PROJECT_TASK_ID' => 'Projekti ülesande Id',
  'LBL_PROJECT_ID' => 'Projekti ID:',
  'LBL_DATE_ENTERED' => 'Loomiskuupäev:',
  'LBL_DATE_MODIFIED' => 'Muutmiskuupäev:',
  'LBL_ASSIGNED_USER_ID' => 'Vastutaja',
  'LBL_MODIFIED_USER_ID' => 'Muudetud kasutaja Id:',
  'LBL_CREATED_BY' => 'Looja:',
  'LBL_TEAM_ID' => 'Meeskond',
  'LBL_NAME' => 'Nimi:',
  'LBL_STATUS' => 'Olek:',
  'LBL_DATE_DUE' => 'Tähtaeg:',
  'LBL_TIME_DUE' => 'Aeg:',
  'LBL_RESOURCE' => 'Allikas:',
  'LBL_PREDECESSORS' => 'Eelkäijad:',
  'LBL_DATE_START' => 'Alguskuupäev',
  'LBL_DATE_FINISH' => 'Lõppkuupäev:',
  'LBL_TIME_START' => 'Algusaeg',
  'LBL_TIME_FINISH' => 'Lõppaeg:',
  'LBL_DURATION' => 'Kestus:',
  'LBL_DURATION_UNIT' => 'Kestusühik:',
  'LBL_ACTUAL_DURATION' => 'Tegelik kestus:',
  'LBL_PARENT_ID' => 'Projekt:',
  'LBL_PERCENT_COMPLETE' => '% teostatud:',
  'LBL_PRIORITY' => 'Tähtsus:',
  'LBL_DESCRIPTION' => 'Kirjeldus:',
  'LBL_ORDER_NUMBER' => 'Tellimus:',
  'LBL_TASK_NUMBER' => 'Ülesande number:',
  'LBL_TASK_ID' => 'Ülesande ID:',
  'LBL_DEPENDS_ON_ID' => 'Sõltub:',
  'LBL_ESTIMATED_EFFORT' => 'Hinnanguline ajakulu (tundides):',
  'LBL_ACTUAL_EFFORT' => 'Tegelik ajakulu (tundides):',
  'LBL_UTILIZATION' => 'Rakendamine (%)',
  'LBL_DELETED' => 'Kustutatud:',
  'LBL_LIST_ORDER_NUMBER' => 'Tellimus',
  'LBL_LIST_NAME' => 'Nimi',
  'LBL_LIST_DAYS' => 'päevi',
  'LBL_LIST_PARENT_NAME' => 'Projekt',
  'LBL_LIST_PERCENT_COMPLETE' => '% lõpetatud',
  'LBL_LIST_STATUS' => 'Olek',
  'LBL_LIST_DURATION' => 'Kestus',
  'LBL_LIST_ACTUAL_DURATION' => 'Tegelik kestus',
  'LBL_LIST_ASSIGNED_USER_ID' => 'Vastutaja',
  'LBL_LIST_DATE_DUE' => 'Tähtajal',
  'LBL_LIST_DATE_START' => 'Alguskuupäev',
  'LBL_LIST_DATE_FINISH' => 'Lõppkuupäev',
  'LBL_LIST_PRIORITY' => 'Tähtsus',
  'LBL_LIST_CLOSE' => 'Sulge',
  'LBL_PROJECT_NAME' => 'Projekti nimi',
  'LNK_NEW_PROJECT' => 'Loo projekt',
  'LNK_PROJECT_LIST' => 'Projekti loend',
  'LNK_NEW_PROJECT_TASK' => 'Loo projekti ülesanne',
  'LNK_PROJECT_TASK_LIST' => 'Projekti ülesanded',
  'LBL_LIST_MY_PROJECT_TASKS' => 'Minu projekti ülesanded',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Projekti ülesanded',
  'LBL_NEW_FORM_TITLE' => 'Uus projekti ülesanne',
  'LBL_ACTIVITIES_TITLE' => 'Tegevused',
  'LBL_HISTORY_TITLE' => 'Ajalugu',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Tegevused',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Ajalugu',
  'DATE_JS_ERROR' => 'Palun sisesta aeg, mis vastab sisestatud ajale',
  'LBL_ASSIGNED_USER_NAME' => 'Vastutaja',
  'LBL_PARENT_NAME' => 'Projekti nimi',
  'LBL_LIST_PROJECT_NAME' => 'Projektid',
);

