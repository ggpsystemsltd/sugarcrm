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
  'LBL_CRONTAB_SERVER_TIME_PRE' => 'Caietul de sarcini cron rula pe server-ul de  fus orar',
  'LBL_CRONTAB_SERVER_TIME_POST' => 'Vă rugăm să specificaţi timpul de executie planificator în consecinţă',
  'LBL_MINS' => 'min',
  'LBL_INTERVAL' => 'Interval',
  'LBL_OOTB_WORKFLOW' => 'Prelucrati activitatile Workflow',
  'LBL_OOTB_REPORTS' => 'Activati Raportul de Sarcini programat',
  'LBL_OOTB_IE' => 'Verificati casutele postale Inbound',
  'LBL_OOTB_BOUNCE' => 'Activati procesul Nightly pt email-urile returnate companiei',
  'LBL_OOTB_CAMPAIGN' => 'Derulati campania Nightly Mass email',
  'LBL_OOTB_PRUNE' => 'Baza de date Prune la data de 1 a lunii',
  'LBL_OOTB_TRACKER' => 'tabele Prune Tracker',
  'LBL_UPDATE_TRACKER_SESSIONS' => 'Update tabel sesiuni tracker',
  'LBL_LIST_JOB_INTERVAL' => 'interval',
  'LBL_LIST_LIST_ORDER' => 'Programatori',
  'LBL_LIST_NAME' => 'Progamator',
  'LBL_LIST_RANGE' => 'Specrtu:',
  'LBL_LIST_REMOVE' => 'Inlatura:',
  'LBL_LIST_STATUS' => 'Statut',
  'LBL_LIST_TITLE' => 'Lista programari',
  'LBL_LIST_EXECUTE_TIME' => 'Va rula la:',
  'LBL_SUN' => 'Duminica',
  'LBL_MON' => 'Luni',
  'LBL_TUE' => 'Marti',
  'LBL_WED' => 'Miercuri',
  'LBL_THU' => 'Joi',
  'LBL_FRI' => 'Vineri',
  'LBL_SAT' => 'Sambata',
  'LBL_ALL' => 'In fiecare zi',
  'LBL_EVERY_DAY' => 'In fiecare zi',
  'LBL_AT_THE' => 'La',
  'LBL_EVERY' => 'In fiecare',
  'LBL_FROM' => 'de la',
  'LBL_ON_THE' => 'in',
  'LBL_RANGE' => 'catre',
  'LBL_AT' => 'la',
  'LBL_IN' => 'in',
  'LBL_AND' => 'si',
  'LBL_MINUTES' => 'minute',
  'LBL_HOUR' => 'ore',
  'LBL_HOUR_SING' => 'ora',
  'LBL_MONTH' => 'Luna',
  'LBL_OFTEN' => 'Cat se poate de des.',
  'LBL_MIN_MARK' => 'Marca minute',
  'LBL_HOURS' => 'ore',
  'LBL_DAY_OF_MONTH' => 'data',
  'LBL_MONTHS' => 'luni',
  'LBL_DAY_OF_WEEK' => 'zi',
  'LBL_CRONTAB_EXAMPLES' => 'Cele de mai sus folosesc notatia crontab standard.',
  'LBL_ALWAYS' => 'Intotdeauna',
  'LBL_CATCH_UP' => 'Activati in cazul in care sunt pierdute',
  'LBL_CATCH_UP_WARNING' => 'Debifaţi daca aceasta functie poate dura mai mult decât o clipă pentru a rula.',
  'LBL_DATE_TIME_END' => 'Data si timpul expirarii',
  'LBL_DATE_TIME_START' => 'Data si timpul de start',
  'LBL_JOB' => 'Slujba',
  'LBL_LAST_RUN' => 'Ultima rulare cu succes',
  'LBL_MODULE_NAME' => 'Programator Sugar',
  'LBL_MODULE_TITLE' => 'Programatori',
  'LBL_NAME' => 'Nume slujba',
  'LBL_NEVER' => 'Niciodata',
  'LBL_NEW_FORM_TITLE' => 'Programare noua',
  'LBL_PERENNIAL' => 'perpetuu',
  'LBL_SEARCH_FORM_TITLE' => 'Cautare programare',
  'LBL_SCHEDULER' => 'Programare:',
  'LBL_STATUS' => 'Statut',
  'LBL_TIME_FROM' => 'Activ de la',
  'LBL_TIME_TO' => 'Activ pana la',
  'LBL_WARN_CURL_TITLE' => 'Avertisment cURL"',
  'LBL_WARN_CURL' => 'Avertisment',
  'LBL_WARN_NO_CURL' => 'Acest sistem nu are biblioteci cURL activat / compilată în modulul PHP (- with-curl = / calea / catre / curl_library). Vă rugăm să contactaţi administratorul dvs. pentru a rezolva această problemă. Fără funcţionalitatea cURL, Scheduler nu poate arata functiile.',
  'LBL_BASIC_OPTIONS' => 'Setari de baza',
  'LBL_ADV_OPTIONS' => 'Optiune avansate',
  'LBL_TOGGLE_ADV' => 'Arata optiunile avansate',
  'LBL_TOGGLE_BASIC' => 'Arata optiunile de baza',
  'LNK_LIST_SCHEDULER' => 'Programatori',
  'LNK_NEW_SCHEDULER' => 'Creati',
  'LNK_LIST_SCHEDULED' => 'Functii programate',
  'SOCK_GREETING' => 'Aceasta este interfaţa pentru SugarCRM Programatoare Service. [Disponibil comenzi daemon: start | restart | shutdown | starea] Pentru a ieşi, de tip "renunta". Pentru a shutdown "shutdown" de serviciu.',
  'ERR_DELETE_RECORD' => 'Trebuie sa specifici un numar de inregistrare pentru a sterge programarea',
  'ERR_CRON_SYNTAX' => 'Sintaxa Cron invalida',
  'NTC_DELETE_CONFIRMATION' => 'Esti sigur ca vrei sa stergi aceasta inregistrare?',
  'NTC_STATUS' => 'Setare Starea Inactiv pentru a elimina acest producător din lista abandonata',
  'NTC_LIST_ORDER' => 'Setaţi ordinea în care acest tip vor fi afişate în listele de tip marfuri abandonate',
  'LBL_CRON_INSTRUCTIONS_WINDOWS' => 'Pt a seta Windows Scheduler',
  'LBL_CRON_INSTRUCTIONS_LINUX' => 'Pt a seta Crontab',
  'LBL_CRON_LINUX_DESC' => 'Notă: Pentru a rula Sugar Programatoare, adăugaţi următoarea linie în fişierul crontab',
  'LBL_CRON_WINDOWS_DESC' => 'Notă: Pentru a rula Programatoare Sugar, a crea un fişier batch pentru a rula folosind Windows Scheduled Tasks. Fişier batch ar trebui să includă următoarele comenzi:',
  'LBL_NO_PHP_CLI' => 'În cazul în care gazda dvs. nu are PHP disponibil binar, puteţi folosi wget sau inversati functiile  pentru a lansa dumneavoastră.<br />pentru wget: * * * * * wget -> http://translate.sugarcrm.com/latest/cron.php non-verbose / dev / null 2> & 1 - quiet<br />pentru curl: * * * * * curl -> http://translate.sugarcrm.com/latest/cron.php tăcut / dev / null 2> & 1',
  'LBL_JOBS_SUBPANEL_TITLE' => 'Jurnal',
  'LBL_EXECUTE_TIME' => 'Executa Timpul',
  'LBL_REFRESHJOBS' => 'Locuri de munca actualizate',
  'LBL_POLLMONITOREDINBOXES' => 'Verificaţi Conturi Inbound Mail',
  'LBL_RUNMASSEMAILCAMPAIGN' => 'Derulati campania Nightly Mass',
  'LBL_POLLMONITOREDINBOXESFORBOUNCEDCAMPAIGNEMAILS' => 'Activati procesul Nightly pt email-urile returnate companiei',
  'LBL_PRUNEDATABASE' => 'Baza de date Prune la data de 1 a lunii',
  'LBL_TRIMTRACKER' => 'Tabele Prune Tracker',
  'LBL_PROCESSWORKFLOW' => 'Prelucrati activitati Workflow',
  'LBL_PROCESSQUEUE' => 'Activati raportul de sarcini programat',
  'LBL_UPDATETRACKERSESSIONS' => 'Update tabele tracker session',
);

