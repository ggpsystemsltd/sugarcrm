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
  'LBL_CRONTAB_SERVER_TIME_PRE' => 'Las especificaciones del cron para que se ejecute es sobre la base de la zona horaria del servidor (',
  'LBL_CRONTAB_SERVER_TIME_POST' => '). Por favor, especifique el tiempo de ejecución del planificador en consecuencia.',
  'LBL_MINS' => 'min',
  'LBL_HOURS' => 'hrs',
  'LBL_OOTB_WORKFLOW' => 'Procesar Tareas de Workflow',
  'LBL_OOTB_REPORTS' => 'Ejecutar Tareas Programadas de Generación de Informes',
  'LBL_OOTB_IE' => 'Comprobar Bandejas de Entrada',
  'LBL_OOTB_BOUNCE' => 'Ejecutar Proceso Nocturno de Emails de Campaña Rebotados',
  'LBL_OOTB_CAMPAIGN' => 'Ejecutar Proceso Nocturno de Campañas de Email Masivo',
  'LBL_OOTB_PRUNE' => 'Truncar Base de datos al Inicio del Mes',
  'LBL_OOTB_TRACKER' => 'Truncar Tablas de Monitorización',
  'LBL_UPDATE_TRACKER_SESSIONS' => 'Actualizar Tabla tracker_sessions',
  'LBL_LIST_JOB_INTERVAL' => 'Intervalo:',
  'LBL_LIST_LIST_ORDER' => 'Planificadores:',
  'LBL_LIST_NAME' => 'Planificador:',
  'LBL_LIST_RANGE' => 'Rango:',
  'LBL_LIST_REMOVE' => 'Quitar:',
  'LBL_LIST_STATUS' => 'Estado:',
  'LBL_LIST_TITLE' => 'Lista de Planificación:',
  'LBL_LIST_EXECUTE_TIME' => 'Será ejecutado en:',
  'LBL_SUN' => 'Domingo',
  'LBL_MON' => 'Lunes',
  'LBL_TUE' => 'Martes',
  'LBL_WED' => 'Miércoles',
  'LBL_THU' => 'Jueves',
  'LBL_FRI' => 'Viernes',
  'LBL_SAT' => 'Sábado',
  'LBL_ALL' => 'Todos los días',
  'LBL_EVERY_DAY' => 'Todos los días',
  'LBL_AT_THE' => 'El',
  'LBL_EVERY' => 'Cada',
  'LBL_FROM' => 'Desde',
  'LBL_ON_THE' => 'En el',
  'LBL_RANGE' => 'a',
  'LBL_AT' => 'en',
  'LBL_IN' => 'en',
  'LBL_AND' => 'y',
  'LBL_MINUTES' => 'minutos',
  'LBL_HOUR' => 'horas',
  'LBL_HOUR_SING' => 'hora',
  'LBL_MONTH' => 'mes',
  'LBL_OFTEN' => 'Tan a menudo como sea posible.',
  'LBL_MIN_MARK' => 'marca por minuto',
  'LBL_DAY_OF_MONTH' => 'fecha',
  'LBL_MONTHS' => 'me',
  'LBL_DAY_OF_WEEK' => 'día',
  'LBL_CRONTAB_EXAMPLES' => 'Lo arriba mostrado utiliza notación estándar de crontab.',
  'LBL_ALWAYS' => 'Siempre',
  'LBL_CATCH_UP' => 'Ejecutar Si Falla',
  'LBL_CATCH_UP_WARNING' => 'Desmarque si la ejecución de esta tarea puede durar más de un momento.',
  'LBL_DATE_TIME_END' => 'Fecha y Hora de Fin',
  'LBL_DATE_TIME_START' => 'Fecha y Hora de Inicio',
  'LBL_INTERVAL' => 'Intervalo',
  'LBL_JOB' => 'Tarea',
  'LBL_LAST_RUN' => 'Última Ejecución Exitosa',
  'LBL_MODULE_NAME' => 'Planificador Sugar',
  'LBL_MODULE_TITLE' => 'Planificadores',
  'LBL_NAME' => 'Nombre de Tarea',
  'LBL_NEVER' => 'Nunca',
  'LBL_NEW_FORM_TITLE' => 'Nueva Planificación',
  'LBL_PERENNIAL' => 'continuo',
  'LBL_SEARCH_FORM_TITLE' => 'Búsqueda de Planificación',
  'LBL_SCHEDULER' => 'Planificador:',
  'LBL_STATUS' => 'Estado',
  'LBL_TIME_FROM' => 'Activo Desde',
  'LBL_TIME_TO' => 'Activo Hasta',
  'LBL_WARN_CURL_TITLE' => 'Aviso cURL:',
  'LBL_WARN_CURL' => 'Aviso:',
  'LBL_WARN_NO_CURL' => 'Este sistema no tiene las librerías cURL habilitadas/compiladas en el módulo de PHP (--with-curl=/ruta/a/libreria_curl).  Por favor, contacte con su administrador para resolver el problema.  Sin la funcionalidad que provee cURL, el Planificador no puede utilizar hilos con sus tareas.',
  'LBL_BASIC_OPTIONS' => 'Configuración Básica',
  'LBL_ADV_OPTIONS' => 'Opciones Avanzadas',
  'LBL_TOGGLE_ADV' => 'Mostrar Opciones Avanzadas',
  'LBL_TOGGLE_BASIC' => 'Mostrar Opciones Básicas',
  'LNK_LIST_SCHEDULER' => 'Planificadores',
  'LNK_NEW_SCHEDULER' => 'Nuevo Planificador',
  'LNK_LIST_SCHEDULED' => 'Tareas Planificadas',
  'SOCK_GREETING' => 'Este es el interfaz de usuario para el Servicio de Planificación de SugarCRM. <br />[ Comandos de demonio disponibles: start|restart|shutdown|status ]<br />Para salir, teclee &#39;quit&#39;.  Para detener el servicio &#39;shutdown&#39;.',
  'ERR_DELETE_RECORD' => 'Debe especificar un número de registro para eliminar la planificación.',
  'ERR_CRON_SYNTAX' => 'Sintaxis de Cron inválida',
  'NTC_DELETE_CONFIRMATION' => '¿Está seguro de que desea eliminar este registro?',
  'NTC_STATUS' => 'Establezca el estado a Inactivo para quitar esta planificación de las listas desplegables de selección de Planificador',
  'NTC_LIST_ORDER' => 'Establezca el orden en que esta planificación aparecerá en las listas desplegables de selección de Planificador',
  'LBL_CRON_INSTRUCTIONS_WINDOWS' => 'Para configurar el Planificador de Windows',
  'LBL_CRON_INSTRUCTIONS_LINUX' => 'Para configurar Crontab',
  'LBL_CRON_LINUX_DESC' => 'Nota: Para ejecutar los Planificadores de Sugar, añada la siguiente línea a su archivo crontab:',
  'LBL_CRON_WINDOWS_DESC' => 'Nota: Para ejecutar los planificadores de Sugar, cree un archivo de proceso por lotes a ejecutar utilizando las Tareas Programadas de Windows. El archivo de proceso por lotes debería contener los siguientes comandos:',
  'LBL_NO_PHP_CLI' => 'Si su servidor no tiene disponibles los binarios PHP, puede utilizar wget o curl para lanzar sus Tareas.<br>para wget: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;wget --quiet --non-verbose http://translate.sugarcrm.com/soon/latest/cron.php > /dev/null 2>&1</b><br>para curl: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;curl --silent http://translate.sugarcrm.com/soon/latest/cron.php > /dev/null 2>&1',
  'LBL_JOBS_SUBPANEL_TITLE' => 'Registro de Tareas',
  'LBL_EXECUTE_TIME' => 'Tiempo de Ejecución',
  'LBL_REFRESHJOBS' => 'Actualizar Trabajos',
  'LBL_POLLMONITOREDINBOXES' => 'Comprobar Cuentas de Correo Entrante',
  'LBL_RUNMASSEMAILCAMPAIGN' => 'Ejecutar Campañas de Correo Masivo Nocturnas',
  'LBL_POLLMONITOREDINBOXESFORBOUNCEDCAMPAIGNEMAILS' => 'Ejecutar Proceso Nocturno de Correos Rebotados en Campañas',
  'LBL_PRUNEDATABASE' => 'Truncar Base de Datos el 1º de cada Mes',
  'LBL_TRIMTRACKER' => 'Truncar Tablas de Monitorización',
  'LBL_PROCESSWORKFLOW' => 'Procesar Tareas de Workflow',
  'LBL_PROCESSQUEUE' => 'Ejecutar Tareas Planificadas de Generación de Informes',
  'LBL_UPDATETRACKERSESSIONS' => 'Actualizar Tablas de Sesión de Monitorización',
);

