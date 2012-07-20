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
  'LBL_EDIT_LAYOUT' => 'Editar Layout',
  'LBL_FORECAST_ID' => 'ID',
  'LBL_MODULE_NAME' => 'Previsões',
  'LNK_NEW_OPPORTUNITY' => 'Criar Oportunidade',
  'LBL_MODULE_TITLE' => 'Previsões',
  'LBL_LIST_FORM_TITLE' => 'Previsões Registadas',
  'LNK_UPD_FORECAST' => 'Folha de Registo das Previsões',
  'LNK_QUOTA' => 'Objectivos',
  'LNK_FORECAST_LIST' => 'Histórico de Previsões',
  'LBL_FORECAST_HISTORY' => 'Previsões: Histórico',
  'LBL_FORECAST_HISTORY_TITLE' => 'Previsões: Histórico',
  'LBL_TIMEPERIOD_NAME' => 'Período Temporal',
  'LBL_USER_NAME' => 'Nome do Utilizador',
  'LBL_REPORTS_TO_USER_NAME' => 'Reporta a',
  'LBL_FORECAST_TIME_ID' => 'Id do Período Temporal',
  'LBL_FORECAST_TYPE' => 'Tipo de Previsão',
  'LBL_FORECAST_OPP_COUNT' => 'Oportunidades',
  'LBL_FORECAST_OPP_WEIGH' => 'Valor Ponderado',
  'LBL_FORECAST_OPP_COMMIT' => 'Cenário Mais Provável',
  'LBL_FORECAST_OPP_BEST_CASE' => 'Melhor Cenário',
  'LBL_FORECAST_OPP_WORST' => 'Pior Cenário',
  'LBL_FORECAST_USER' => 'Utilizador',
  'LBL_DATE_COMMITTED' => 'Data Registada',
  'LBL_DATE_ENTERED' => 'Data Introduzida',
  'LBL_DATE_MODIFIED' => 'Data Modificada',
  'LBL_CREATED_BY' => 'Criado por',
  'LBL_DELETED' => 'Eliminado',
  'LBL_QC_TIME_PERIOD' => 'Período Temporal:',
  'LBL_QC_OPPORTUNITY_COUNT' => 'Contador de Oportunidades:',
  'LBL_QC_WEIGHT_VALUE' => 'Valor Ponderado:',
  'LBL_QC_COMMIT_VALUE' => 'Valor Registado:',
  'LBL_QC_COMMIT_BUTTON' => 'Registado:',
  'LBL_QC_WORKSHEET_BUTTON' => 'Folha de Trabalho',
  'LBL_QC_ROLL_COMMIT_VALUE' => 'Valor Registado Revisto',
  'LBL_QC_DIRECT_FORECAST' => 'As Minhas Previsões Directas',
  'LBL_QC_ROLLUP_FORECAST' => 'Os Meus Grupos de Previsão',
  'LBL_QC_UPCOMING_FORECASTS' => 'As Minhas Previsões',
  'LBL_QC_LAST_DATE_COMMITTED' => 'Data do Último Registo:',
  'LBL_QC_LAST_COMMIT_VALUE' => 'Valor do Último Registo:',
  'LBL_QC_HEADER_DELIM' => 'Para',
  'LBL_OW_OPPORTUNITIES' => 'Oportunidade',
  'LBL_OW_ACCOUNTNAME' => 'Entidade',
  'LBL_OW_REVENUE' => 'Valor',
  'LBL_OW_WEIGHTED' => 'Valor Ponderado',
  'LBL_OW_MODULE_TITLE' => 'Folha de Registo de Oportunidades',
  'LBL_OW_PROBABILITY' => 'Probabilidade',
  'LBL_OW_NEXT_STEP' => 'Próximo Passo',
  'LBL_OW_DESCRIPTION' => 'Descrição',
  'LBL_OW_TYPE' => 'Tipo',
  'LNK_NEW_TIMEPERIOD' => 'Criar Período Temporal',
  'LNK_TIMEPERIOD_LIST' => 'Períodos Temporais',
  'LBL_SVFS_FORECASTDATE' => 'Calendarizar Data de Início',
  'LBL_SVFS_STATUS' => 'Estado',
  'LBL_SVFS_USER' => 'Para',
  'LBL_SVFS_CASCADE' => 'Relatórios em Cascata?',
  'LBL_SVFS_HEADER' => 'Calendarização da Previsão',
  'LB_FS_KEY' => 'Id',
  'LBL_FS_TIMEPERIOD_ID' => 'Id Período Temporal',
  'LBL_FS_USER_ID' => 'Id Utilizador',
  'LBL_FS_TIMEPERIOD' => 'Período Temporal',
  'LBL_FS_START_DATE' => 'Data de Início',
  'LBL_FS_END_DATE' => 'Data de Fim',
  'LBL_FS_FORECAST_START_DATE' => 'Data de Início da Previsão',
  'LBL_FS_STATUS' => 'Estado',
  'LBL_FS_FORECAST_FOR' => 'Calendarizado para:',
  'LBL_FS_CASCADE' => 'Cascata?',
  'LBL_FS_MODULE_NAME' => 'Calendarização de Previsão',
  'LBL_FS_CREATED_BY' => 'Criado por',
  'LBL_FS_DATE_ENTERED' => 'Data de Introdução',
  'LBL_FS_DATE_MODIFIED' => 'Data de Modificação',
  'LBL_FS_DELETED' => 'Eliminado',
  'LBL_FDR_USER_NAME' => 'Relatório Directo',
  'LBL_FDR_OPPORTUNITIES' => 'Oportunidades na Previsão:',
  'LBL_FDR_WEIGH' => 'Valores Ponderados das Oportunidades:',
  'LBL_FDR_COMMIT' => 'Valor Registado',
  'LBL_FDR_DATE_COMMIT' => 'Data Registada',
  'LBL_DV_HEADER' => 'Previsões: Folha de Trabalho',
  'LBL_DV_MY_FORECASTS' => 'As Minhas Previsões',
  'LBL_DV_MY_TEAM' => 'A Previsão das Minhas Equipas',
  'LBL_DV_TIMEPERIODS' => 'Períodos Temporais:',
  'LBL_DV_FORECAST_PERIOD' => 'Período Temporal da Previsão',
  'LBL_DV_FORECAST_OPPORTUNITY' => 'Oportunidades da Previsão',
  'LBL_SEARCH' => 'Seleccionar',
  'LBL_SEARCH_LABEL' => 'Seleccionar',
  'LBL_COMMIT_HEADER' => 'Registar Previsão',
  'LBL_DV_LAST_COMMIT_DATE' => 'Última Data de Registo:',
  'LBL_DV_LAST_COMMIT_AMOUNT' => 'Último Valor de Registo:',
  'LBL_DV_FORECAST_ROLLUP' => 'Revisão da Previsão',
  'LBL_DV_TIMEPERIOD' => 'Períodos Temporais',
  'LBL_DV_TIMPERIOD_DATES' => 'Intervalos de Datas:',
  'LBL_LV_TIMPERIOD' => 'Período Temporal',
  'LBL_LV_TIMPERIOD_START_DATE' => 'Data de Início',
  'LBL_LV_TIMPERIOD_END_DATE' => 'Data Final',
  'LBL_LV_TYPE' => 'Tipo de Previsão',
  'LBL_LV_COMMIT_DATE' => 'Data de Registo',
  'LBL_LV_OPPORTUNITIES' => 'Oportunidades',
  'LBL_LV_WEIGH' => 'Valor Ponderado',
  'LBL_LV_COMMIT' => 'Valor Registado',
  'LBL_COMMIT_NOTE' => 'Introduza os valores que pretende registados para o Período Temporal seleccionado',
  'LBL_COMMIT_MESSAGE' => 'Tem a certeza de que pretende registar estes valores',
  'ERR_FORECAST_AMOUNT' => 'Registar um valor é obrigatório e necessita de ser um número',
  'LBL_FC_START_DATE' => 'Data de Início',
  'LBL_FC_USER' => 'Calendarizar para',
  'LBL_NO_ACTIVE_TIMEPERIOD' => 'Não existem Períodos Temporais activos para a Previsão.',
  'LBL_FDR_ADJ_AMOUNT' => 'Valor Ajustado',
  'LBL_SAVE_WOKSHEET' => 'Gravar Folha de Trabalho',
  'LBL_RESET_WOKSHEET' => 'Reiniciar a Folha de Trabalho',
  'LBL_RESET_CHECK' => 'Todas as Folhas de Trabalho para os Períodos Temporais seleccionados e utilizadores autenticados serão removidos, continuar?',
  'LB_FS_LIKELY_CASE' => 'Cenário Mais Provável',
  'LB_FS_WORST_CASE' => 'Pior Cenário',
  'LB_FS_BEST_CASE' => 'Melhor Cenário',
  'LBL_FDR_WK_LIKELY_CASE' => 'Cenário Mais Provável Estimado',
  'LBL_FDR_WK_BEST_CASE' => 'Melhor Cenário Estimado',
  'LBL_FDR_WK_WORST_CASE' => 'Pior Cenário Estimado',
  'LBL_BEST_CASE' => 'Melhor Cenário:',
  'LBL_LIKELY_CASE' => 'Cenário Mais Provável:',
  'LBL_WORST_CASE' => 'Pior Cenário:',
  'LBL_FDR_C_BEST_CASE' => 'Melhor Cenário',
  'LBL_FDR_C_WORST_CASE' => 'Pior Cenário',
  'LBL_FDR_C_LIKELY_CASE' => 'Cenário Mais Provável',
  'LBL_QC_LAST_BEST_CASE' => 'Último valor registado (Melhor Cenário)',
  'LBL_QC_LAST_LIKELY_CASE' => 'Último valor registado (Cenário Mais Provável)',
  'LBL_QC_LAST_WORST_CASE' => 'Último valor registado (Pior Cenário)',
  'LBL_QC_ROLL_BEST_VALUE' => 'Revisão do valor registado (Melhor Cenário)',
  'LBL_QC_ROLL_LIKELY_VALUE' => 'Revisão do valor registado (Cenário Mais Provável)',
  'LBL_QC_ROLL_WORST_VALUE' => 'Revisão do valor registado (Pior Cenário)',
  'LBL_QC_COMMIT_BEST_CASE' => 'Valor Registado (Melhor Cenário)',
  'LBL_QC_COMMIT_LIKELY_CASE' => 'Valor Registado (Cenário Mais Provável)',
  'LBL_QC_COMMIT_WORST_CASE' => 'Valor Registado (Pior Cenário)',
);

