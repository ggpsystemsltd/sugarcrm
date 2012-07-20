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
		'ShowActiveUsers'										=> 'Voir les utilisateurs actifs',
	'ShowLastModifiedRecords'								=> '10 derniers enregistrements modifiés',
	'ShowTopUser'											=> 'Top Utilisateur',
	'ShowMyModuleUsage'										=> 'Mes utilisateurs par module',
	'ShowMyWeeklyActivities'								=> 'Mes activités par semaines',
	'ShowTop3ModulesUsed'									=> 'Mon Top 3 des modules utilisés',
	'ShowLoggedInUserCount'									=> 'Nombre d&#39;utilisateur actif',
	'ShowMyCumulativeLoggedInTime'							=> 'Mon temps de login cumulé (Cette semaine)',
	'ShowUsersCumulativeLoggedInTime'						=> 'Temps de login cumulé pour tous les utilisateurs (Cette semaine)',

		'action'												=> 'Action',
	'active_users'											=> 'Nombre d&#39;utilisateur actif',
	'date_modified'											=> 'Date de la dernière Action',
	'different_modules_accessed'							=> 'Nombde de module accédé',
	'first_name'											=> 'Prénom',
	'item_id'												=> 'ID',
	'item_summary'											=> 'Nom',
	'last_action'											=> 'Dernière action Date/Heure',
	'last_name'												=> 'Prénom',
	'module_name'											=> 'Nom du module',
	'records_modified'										=> 'Nombre total d&#39;enregistrement modifié',
	'top_module'											=> 'Top Module accédé',
	'total_count'											=> 'Total Page Vues',
	'total_login_time'										=> 'Heure (hh:mm:ss)',
	'user_name'												=> 'Nom utilisateur',
	'users'													=> 'Utilisateurs',

		'LBL_ENABLE'											=> 'Activé',
	'LBL_MODULE_NAME_TITLE'									=> 'Suivi',
	'LBL_MODULE_NAME'										=> 'Suivi',
	'LBL_TRACKER_SETTINGS'									=> 'Paramètres du Suivi',
	'LBL_TRACKER_QUERIES_DESC'								=> 'Suivi des Requêtes',
	'LBL_TRACKER_QUERIES_HELP'								=> 'Suivi des requêtes lorsque dump_slow_queries est activé et que le temps d&#39;exécution est supérieur au paramètre slow_query_time_msec présent dans config.php.',
	'LBL_TRACKER_PERF_DESC'									=> 'Suivi des performances',
	'LBL_TRACKER_QUERIES_HELP'								=> 'Trace les états SQL quand "Logger les requêtes trop longues" est activé et que le paramètre "Seuil pour les requêtes trop longues" est dépassé',
	'LBL_TRACKER_PERF_HELP'									=> 'Suivi du roundtrips de base de donné, des fichiers accédés et de l&#39;utilisation de la mémoire',
	'LBL_TRACKER_SESSIONS_DESC'								=> 'Suivi des Sessions',
	'LBL_TRACKER_SESSIONS_HELP'								=> 'Suivi des utilisateurs actifs et des informations de sessions des utilisateurs',
	'LBL_TRACKER_DESC'										=> 'Suivi des Actions',
	'LBL_TRACKER_HELP'										=> 'Suivi des pages vues par les utilisateurs (enregistrements et modules accédés) et des enregistrements sauvegardés',
	'LBL_TRACKER_PRUNE_INTERVAL'							=> 'Nombre de jours durant lesquels les données de Suivi sont sauvegardées avant d&#39;être purgé par le planificateur de tâches.',
	'LBL_TRACKER_PRUNE_RANGE'								=> 'Nombre de jours',
);
?>