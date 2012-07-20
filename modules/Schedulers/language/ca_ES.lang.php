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
  'LBL_CRONTAB_SERVER_TIME_PRE' => 'Les especificacions que cron s&#39;executi sobre la base de la zona horària del servidor (',
  'LBL_CRONTAB_SERVER_TIME_POST' => '). Si us plau, especifiqui el temps d&#39;execució del planificador en conseqüència',
  'LBL_LIST_JOB_INTERVAL' => 'Interval:',
  'LBL_MINS' => 'min',
  'LBL_HOURS' => 'hrs',
  'LBL_INTERVAL' => 'Interval',
  'LBL_OOTB_WORKFLOW' => 'Processar Tasques de Workflow',
  'LBL_OOTB_REPORTS' => 'Executar Tasques Programades de Generació d´Informes',
  'LBL_OOTB_IE' => 'Comprovar Safates d´Entrada',
  'LBL_OOTB_BOUNCE' => 'Executar Procés Nocturn de Correus de Campanya Rebotats',
  'LBL_OOTB_CAMPAIGN' => 'Executar Procés Nocturn de Campanyes de Correu Massiu',
  'LBL_OOTB_PRUNE' => 'Truncar Base de dades al Inici del Mes',
  'LBL_OOTB_TRACKER' => 'Truncar Històrial d´Usuari al Inici del Mes',
  'LBL_UPDATE_TRACKER_SESSIONS' => 'Actualitzar taula tracker_sessions',
  'LBL_LIST_LIST_ORDER' => 'Planificacions:',
  'LBL_LIST_NAME' => 'Planificador:',
  'LBL_LIST_RANGE' => 'Rang:',
  'LBL_LIST_REMOVE' => 'Treure:',
  'LBL_LIST_STATUS' => 'Estat:',
  'LBL_LIST_TITLE' => 'Llista de Planificació:',
  'LBL_LIST_EXECUTE_TIME' => 'Será executat en:',
  'LBL_SUN' => 'Diumenge',
  'LBL_MON' => 'Dilluns',
  'LBL_TUE' => 'Dimarts',
  'LBL_WED' => 'Dimecres',
  'LBL_THU' => 'Dijous',
  'LBL_FRI' => 'Divendres',
  'LBL_SAT' => 'Dissabte',
  'LBL_ALL' => 'Tots els dies',
  'LBL_EVERY_DAY' => 'Tots els dies',
  'LBL_AT_THE' => 'El',
  'LBL_EVERY' => 'Cada',
  'LBL_FROM' => 'Desde',
  'LBL_ON_THE' => 'En el',
  'LBL_RANGE' => 'a',
  'LBL_AT' => 'en',
  'LBL_IN' => 'en',
  'LBL_AND' => 'i',
  'LBL_MINUTES' => 'minuts',
  'LBL_HOUR' => 'hores',
  'LBL_HOUR_SING' => 'hora',
  'LBL_MONTH' => 'mes',
  'LBL_OFTEN' => 'Tan sovint com sigui possible.',
  'LBL_MIN_MARK' => 'marca per minut',
  'LBL_DAY_OF_MONTH' => 'data',
  'LBL_MONTHS' => 'mes',
  'LBL_DAY_OF_WEEK' => 'dia',
  'LBL_CRONTAB_EXAMPLES' => 'Lo a dalt mostrat utilitza notació estàndard de crontab.',
  'LBL_ALWAYS' => 'Sempre',
  'LBL_CATCH_UP' => 'Executar Si Falla',
  'LBL_CATCH_UP_WARNING' => 'Desmarqui si l´execució d´aquesta tasca pot durar més d´un moment.',
  'LBL_DATE_TIME_END' => 'Data i Hora de Fi',
  'LBL_DATE_TIME_START' => 'Data i Hora d´Inici',
  'LBL_JOB' => 'Tasca',
  'LBL_LAST_RUN' => 'Última Execució Exitosa',
  'LBL_MODULE_NAME' => 'Planificador Sugar',
  'LBL_MODULE_TITLE' => 'Planificacions',
  'LBL_NAME' => 'Nom de Tasca',
  'LBL_NEVER' => 'Mai',
  'LBL_NEW_FORM_TITLE' => 'Nova Planificació',
  'LBL_PERENNIAL' => 'continu',
  'LBL_SEARCH_FORM_TITLE' => 'Recerca de Planificació',
  'LBL_SCHEDULER' => 'Planificador:',
  'LBL_STATUS' => 'Estat',
  'LBL_TIME_FROM' => 'Actiu Desde',
  'LBL_TIME_TO' => 'Actiu Fins a',
  'LBL_WARN_CURL_TITLE' => 'Avís cURL:',
  'LBL_WARN_CURL' => 'Avís:',
  'LBL_WARN_NO_CURL' => 'Aquest sistema no té les llibreries cURL habilitades/compilades en el mòdul de PHP (--with-curl=/ruta/a/libreria_curl).  ﻿Si us plau, contacti amb el seu administrador per resoldre el problema. Sense la funcionalitat que proveeix cURL, el Planificador no pot utilitzar fils amb les seves tasques.',
  'LBL_BASIC_OPTIONS' => 'Configuració Bàsica',
  'LBL_ADV_OPTIONS' => 'Opcions Avançades',
  'LBL_TOGGLE_ADV' => 'Opcions Avançades',
  'LBL_TOGGLE_BASIC' => 'Opcions Bàsiques',
  'LNK_LIST_SCHEDULER' => 'Planificacions',
  'LNK_NEW_SCHEDULER' => 'Nou Planificador',
  'LNK_LIST_SCHEDULED' => 'Tasques Planificades',
  'SOCK_GREETING' => 'Aquest és l&#39;interfície d&#39;usuari per al Servei de Planificació de SugarCRM.  [ Comandos de dimoni disponibles: start|restart|shutdown|status ] Per sortir, escrigui &#39;quit&#39;.  Per parar el servei &#39;shutdown&#39;.',
  'ERR_DELETE_RECORD' => 'Ha d´especificar un número de registre per eliminar la planificació.',
  'ERR_CRON_SYNTAX' => 'Sintaxis de Cron invàlida',
  'NTC_DELETE_CONFIRMATION' => 'Està segur que desitja eliminar aquest registre?',
  'NTC_STATUS' => 'Estableixi l´estat a Inactiu per treure aquesta planificació de les llistes desplegables de selecció de Planificador',
  'NTC_LIST_ORDER' => 'Estableixi l´ordre en el qual aquesta planificació apareixerà en les llistes desplegables de selecció de Planificador',
  'LBL_CRON_INSTRUCTIONS_WINDOWS' => 'Per configurar el Planificador de Windows',
  'LBL_CRON_INSTRUCTIONS_LINUX' => 'Per configurar Crontab',
  'LBL_CRON_LINUX_DESC' => 'Afegeixi aquesta línia en el seu crontab:',
  'LBL_CRON_WINDOWS_DESC' => 'Crear un arxiu de procés per lots amb els següents comandos:',
  'LBL_NO_PHP_CLI' => 'Si el seu servidor no té disponibles els binaris PHP, pot utilitzar wget o curl per llançar les seves Tasques .<br>per wget: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;wget --quiet --non-verbose /cron.php > /dev/null 2>&1</b><br>per curl: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;curl --silent /cron.php > /dev/null 2>&1',
  'LBL_JOBS_SUBPANEL_TITLE' => 'Registre de Tasques',
  'LBL_EXECUTE_TIME' => 'Temps d´Execució',
  'LBL_REFRESHJOBS' => 'Actualitzar Treballs',
  'LBL_POLLMONITOREDINBOXES' => 'Comprovar Comptes de Correu Entrant',
  'LBL_RUNMASSEMAILCAMPAIGN' => 'Executar campanyes de Correu Massiu Nocturnes',
  'LBL_POLLMONITOREDINBOXESFORBOUNCEDCAMPAIGNEMAILS' => 'Executar Procés Nocturn de Correus Rebotats en Campanyes',
  'LBL_PRUNEDATABASE' => 'Truncar Base de Dades el 1º de cada Mes',
  'LBL_TRIMTRACKER' => 'Truncar Taules de Monitorització',
  'LBL_PROCESSWORKFLOW' => 'Processar Tasques de Workflow',
  'LBL_PROCESSQUEUE' => 'Executar Tasques Planificades de Generació d&#39;Informes',
  'LBL_UPDATETRACKERSESSIONS' => 'Actualitzar Taules de Sessió de Monitorització',
);

