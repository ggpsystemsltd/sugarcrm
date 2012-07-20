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
  'LBL_EDIT_LAYOUT' => 'Editer la mise en page',
  'LBL_FORECAST_ID' => 'ID',
  'LBL_OW_DESCRIPTION' => 'Description',
  'LBL_OW_TYPE' => 'Type',
  'LB_FS_KEY' => 'ID',
  'LBL_MODULE_NAME' => 'Prévisions',
  'LNK_NEW_OPPORTUNITY' => 'Créer une Affaire',
  'LBL_MODULE_TITLE' => 'Prévisions',
  'LBL_LIST_FORM_TITLE' => 'Prévisions validés',
  'LNK_UPD_FORECAST' => 'Tableau des Prévisions',
  'LNK_QUOTA' => 'Objectifs',
  'LNK_FORECAST_LIST' => 'Historique Prévisions',
  'LBL_FORECAST_HISTORY' => 'Prévisions: Historique',
  'LBL_FORECAST_HISTORY_TITLE' => 'Prévisions: Historique',
  'LBL_TIMEPERIOD_NAME' => 'Période',
  'LBL_USER_NAME' => 'Nom Utilisateur',
  'LBL_REPORTS_TO_USER_NAME' => 'Rend compte à',
  'LBL_FORECAST_TIME_ID' => 'ID Période',
  'LBL_FORECAST_TYPE' => 'Type de prévision',
  'LBL_FORECAST_OPP_COUNT' => 'Affaires',
  'LBL_FORECAST_OPP_WEIGH' => 'Montant pondéré',
  'LBL_FORECAST_OPP_COMMIT' => 'Cas probable',
  'LBL_FORECAST_OPP_BEST_CASE' => 'Au mieux',
  'LBL_FORECAST_OPP_WORST' => 'Au pire',
  'LBL_FORECAST_USER' => 'Utilisateur',
  'LBL_DATE_COMMITTED' => 'Date de soumission',
  'LBL_DATE_ENTERED' => 'Date de saisi',
  'LBL_DATE_MODIFIED' => 'Date de modification',
  'LBL_CREATED_BY' => 'Créé par',
  'LBL_DELETED' => 'Supprimer',
  'LBL_QC_TIME_PERIOD' => 'Période:',
  'LBL_QC_OPPORTUNITY_COUNT' => 'Nombre d&#39;Affaire:',
  'LBL_QC_WEIGHT_VALUE' => 'Montant pondéré:',
  'LBL_QC_COMMIT_VALUE' => 'Montant soumis:',
  'LBL_QC_COMMIT_BUTTON' => 'Soumettre',
  'LBL_QC_WORKSHEET_BUTTON' => 'Tableau',
  'LBL_QC_ROLL_COMMIT_VALUE' => 'Agréger le montant validé:',
  'LBL_QC_DIRECT_FORECAST' => 'Mes Prévisions directes:',
  'LBL_QC_ROLLUP_FORECAST' => 'Mon Groupe de Prévision:',
  'LBL_QC_UPCOMING_FORECASTS' => 'Mes Prévisions',
  'LBL_QC_LAST_DATE_COMMITTED' => 'Date de dernière soumission:',
  'LBL_QC_LAST_COMMIT_VALUE' => 'Dernier montant soumis:',
  'LBL_QC_HEADER_DELIM' => 'A',
  'LBL_OW_OPPORTUNITIES' => 'Affaire',
  'LBL_OW_ACCOUNTNAME' => 'Compte',
  'LBL_OW_REVENUE' => 'Montant',
  'LBL_OW_WEIGHTED' => 'Montant pondéré',
  'LBL_OW_MODULE_TITLE' => 'Tableau Affaire',
  'LBL_OW_PROBABILITY' => 'Probabilité',
  'LBL_OW_NEXT_STEP' => 'Etape suivante',
  'LNK_NEW_TIMEPERIOD' => 'Créer une Période',
  'LNK_TIMEPERIOD_LIST' => 'Périodes',
  'LBL_SVFS_FORECASTDATE' => 'Planifier Date de début',
  'LBL_SVFS_STATUS' => 'Statut',
  'LBL_SVFS_USER' => 'Pour',
  'LBL_SVFS_CASCADE' => 'Basculer vers les Rapports ?',
  'LBL_SVFS_HEADER' => 'Prévision planifiée:',
  'LBL_FS_TIMEPERIOD_ID' => 'ID Période',
  'LBL_FS_USER_ID' => 'ID Utilisateur',
  'LBL_FS_TIMEPERIOD' => 'Période',
  'LBL_FS_START_DATE' => 'Date de début',
  'LBL_FS_END_DATE' => 'Date de fin',
  'LBL_FS_FORECAST_START_DATE' => 'Date de début Prévision',
  'LBL_FS_STATUS' => 'Statut',
  'LBL_FS_FORECAST_FOR' => 'Planifié pour:',
  'LBL_FS_CASCADE' => 'Basculer?',
  'LBL_FS_MODULE_NAME' => 'Prévision planifiée',
  'LBL_FS_CREATED_BY' => 'Créé par',
  'LBL_FS_DATE_ENTERED' => 'Date de création',
  'LBL_FS_DATE_MODIFIED' => 'Date de modification',
  'LBL_FS_DELETED' => 'Supprimé',
  'LBL_FDR_USER_NAME' => 'Rapport direct',
  'LBL_FDR_OPPORTUNITIES' => 'Affaires dans les Prévisions:',
  'LBL_FDR_WEIGH' => 'Montant pondéré des affaires:',
  'LBL_FDR_COMMIT' => 'Montant soumis',
  'LBL_FDR_DATE_COMMIT' => 'Date de soumission',
  'LBL_DV_HEADER' => 'Prévisions:Tableau',
  'LBL_DV_MY_FORECASTS' => 'Mes Prévisions',
  'LBL_DV_MY_TEAM' => 'Mes Prévisions d&#39;équipe',
  'LBL_DV_TIMEPERIODS' => 'Périodes:',
  'LBL_DV_FORECAST_PERIOD' => 'Période de la Prévision',
  'LBL_DV_FORECAST_OPPORTUNITY' => 'Affaires de la Prévision',
  'LBL_SEARCH' => 'Selectionner',
  'LBL_SEARCH_LABEL' => 'Selectionner',
  'LBL_COMMIT_HEADER' => 'Prévision soumise',
  'LBL_DV_LAST_COMMIT_DATE' => 'Dernière date de soumission:',
  'LBL_DV_LAST_COMMIT_AMOUNT' => 'Derniers montants soumis:',
  'LBL_DV_FORECAST_ROLLUP' => 'Agréger Prévision',
  'LBL_DV_TIMEPERIOD' => 'Période:',
  'LBL_DV_TIMPERIOD_DATES' => 'Plage de date :',
  'LBL_LV_TIMPERIOD' => 'Période',
  'LBL_LV_TIMPERIOD_START_DATE' => 'Date de début',
  'LBL_LV_TIMPERIOD_END_DATE' => 'Date de fin',
  'LBL_LV_TYPE' => 'Type de prévision',
  'LBL_LV_COMMIT_DATE' => 'Date de soumission',
  'LBL_LV_OPPORTUNITIES' => 'Affaires',
  'LBL_LV_WEIGH' => 'Montant pondéré',
  'LBL_LV_COMMIT' => 'Montant soumis',
  'LBL_COMMIT_NOTE' => 'Entrer les montants que vous souhaitez soumettre pour la période selectionnée:',
  'LBL_COMMIT_MESSAGE' => 'Voulez-vous soumettre ces montants',
  'ERR_FORECAST_AMOUNT' => 'Un montant à soumettre est requis et doit être un nombre.',
  'LBL_FC_START_DATE' => 'Date de début',
  'LBL_FC_USER' => 'Planification pour',
  'LBL_NO_ACTIVE_TIMEPERIOD' => 'Pas de périodes actives pour la prévision.',
  'LBL_FDR_ADJ_AMOUNT' => 'Montant ajusté',
  'LBL_SAVE_WOKSHEET' => 'Sauvegarder le Tableau',
  'LBL_RESET_WOKSHEET' => 'Réinitialiser le Tableau',
  'LBL_RESET_CHECK' => 'Tous les tableaux de données pour la période selectionnée et pour cet utilisateur vont être supprimés, poursuivre ?',
  'LB_FS_LIKELY_CASE' => 'Cas probable',
  'LB_FS_WORST_CASE' => 'Au pire',
  'LB_FS_BEST_CASE' => 'Au mieux',
  'LBL_FDR_WK_LIKELY_CASE' => 'Estim.<br>Cas probable',
  'LBL_FDR_WK_BEST_CASE' => 'Estim.<br>Au mieux',
  'LBL_FDR_WK_WORST_CASE' => 'Estim.<br>Au pire',
  'LBL_BEST_CASE' => 'Au mieux:',
  'LBL_LIKELY_CASE' => 'Cas probable:',
  'LBL_WORST_CASE' => 'Au pire:',
  'LBL_FDR_C_BEST_CASE' => 'Au mieux',
  'LBL_FDR_C_WORST_CASE' => 'Au pire',
  'LBL_FDR_C_LIKELY_CASE' => 'Cas probable',
  'LBL_QC_LAST_BEST_CASE' => 'Dernier montant soumis (Au mieux):',
  'LBL_QC_LAST_LIKELY_CASE' => 'Dernier montant soumis (Cas probable):',
  'LBL_QC_LAST_WORST_CASE' => 'Dernier montant soumis (Au pire):',
  'LBL_QC_ROLL_BEST_VALUE' => 'Agréger Montant soumis (Au mieux):',
  'LBL_QC_ROLL_LIKELY_VALUE' => 'Agréger Montant soumis (Cas probable):',
  'LBL_QC_ROLL_WORST_VALUE' => 'Agréger Montant soumis (Au pire):',
  'LBL_QC_COMMIT_BEST_CASE' => 'Montant soumis (Au mieux):',
  'LBL_QC_COMMIT_LIKELY_CASE' => 'Montant soumis (Cas probable):',
  'LBL_QC_COMMIT_WORST_CASE' => 'Montant soumis (Au pire):',
);

