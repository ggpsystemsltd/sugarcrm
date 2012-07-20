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
  'LBL_CRONTAB_SERVER_TIME_PRE' => 'As especificações de cron são executadas com base na zona horária (',
  'LBL_CRONTAB_SERVER_TIME_POST' => '). Por favor especifique a execução do calendarizador tendo isto em conta.',
  'LBL_MINS' => 'min',
  'LBL_HOURS' => 'hrs',
  'LBL_OOTB_WORKFLOW' => 'Processar Tarefas de Workflow',
  'LBL_OOTB_REPORTS' => 'Executar tarefas criadas de execução de relatórios',
  'LBL_OOTB_IE' => 'Verificar Caixa de Entrada de E-mails',
  'LBL_OOTB_BOUNCE' => 'Executar toda a noite o Processamento de E-mails Retornados de Campanhas',
  'LBL_OOTB_CAMPAIGN' => 'Executar toda a noite o Envio Massivo de E-mail de Campanha',
  'LBL_OOTB_PRUNE' => 'Remover Apagados da Base de Dados no primeiro dia do Mês',
  'LBL_OOTB_TRACKER' => 'Remover apagados das tabelas de trackers',
  'LBL_UPDATE_TRACKER_SESSIONS' => 'Actualizar tabela tracker_sessions',
  'LBL_LIST_JOB_INTERVAL' => 'Intervalo:',
  'LBL_LIST_LIST_ORDER' => 'Calendarizadores:',
  'LBL_LIST_NAME' => 'Calendarizador:',
  'LBL_LIST_RANGE' => 'Intervalo:',
  'LBL_LIST_REMOVE' => 'Remover:',
  'LBL_LIST_STATUS' => 'Estado:',
  'LBL_LIST_TITLE' => 'Lista de Tarefas Calendarizadas:',
  'LBL_LIST_EXECUTE_TIME' => 'Horário de Execução:',
  'LBL_SUN' => 'Domingo',
  'LBL_MON' => 'Segunda',
  'LBL_TUE' => 'Terça',
  'LBL_WED' => 'Quarta',
  'LBL_THU' => 'Quinta',
  'LBL_FRI' => 'Sexta',
  'LBL_SAT' => 'Sábado',
  'LBL_ALL' => 'Todos os Dias',
  'LBL_EVERY_DAY' => 'Todos os dias',
  'LBL_AT_THE' => 'às',
  'LBL_EVERY' => 'Todo(a)',
  'LBL_FROM' => 'De',
  'LBL_ON_THE' => 'No(a)',
  'LBL_RANGE' => 'a',
  'LBL_AT' => 'às',
  'LBL_IN' => 'em',
  'LBL_AND' => 'e',
  'LBL_MINUTES' => 'minutos',
  'LBL_HOUR' => 'horas',
  'LBL_HOUR_SING' => 'hora',
  'LBL_MONTH' => 'mês',
  'LBL_OFTEN' => 'Tão frequente quanto possível.',
  'LBL_MIN_MARK' => 'marca de minuto',
  'LBL_DAY_OF_MONTH' => 'data',
  'LBL_MONTHS' => 'meses',
  'LBL_DAY_OF_WEEK' => 'dia',
  'LBL_CRONTAB_EXAMPLES' => 'A lista acima usa notações crontab padrão.',
  'LBL_ALWAYS' => 'Sempre',
  'LBL_CATCH_UP' => 'Executar Se Falhar',
  'LBL_CATCH_UP_WARNING' => 'Desmarque se esta Tarefa levar mais do que um momento para se executada.',
  'LBL_DATE_TIME_END' => 'Data e Hora de Fim',
  'LBL_DATE_TIME_START' => 'Data e Hora de Início',
  'LBL_INTERVAL' => 'Intervalo',
  'LBL_JOB' => 'Tarefa',
  'LBL_LAST_RUN' => 'Última Execução com Sucesso',
  'LBL_MODULE_NAME' => 'Calendarizador Sugar',
  'LBL_MODULE_TITLE' => 'Calendarizadores',
  'LBL_NAME' => 'Nome da Tarefa',
  'LBL_NEVER' => 'Nunca',
  'LBL_NEW_FORM_TITLE' => 'Nova Tarefa Calendarizada',
  'LBL_PERENNIAL' => 'perpétua',
  'LBL_SEARCH_FORM_TITLE' => 'Pesquisar Calendarizador',
  'LBL_SCHEDULER' => 'Calendarizador:',
  'LBL_STATUS' => 'Estado',
  'LBL_TIME_FROM' => 'Activo Desde',
  'LBL_TIME_TO' => 'Activo Até',
  'LBL_WARN_CURL_TITLE' => 'Aviso cURL:',
  'LBL_WARN_CURL' => 'Aviso:',
  'LBL_WARN_NO_CURL' => 'Este sistema não possui as bibliotecas cURL habilitadas/compiladas no módulo PHP (--with-curl=/path/to/curl_library).  Por favor contacte o seu administrador de sistemas para resolver esta questão.  Sem a funcionalidade cURL, o Calendarizador não pode executar as suas tarefas.',
  'LBL_BASIC_OPTIONS' => 'Configuração Básica',
  'LBL_ADV_OPTIONS' => 'Opções Avançadas',
  'LBL_TOGGLE_ADV' => 'Opções Avançadas',
  'LBL_TOGGLE_BASIC' => 'Opções Básicas',
  'LNK_LIST_SCHEDULER' => 'Calendarizador',
  'LNK_NEW_SCHEDULER' => 'Nova Tarefa Calendarizada',
  'LNK_LIST_SCHEDULED' => 'Tarefas Calendarizadas',
  'SOCK_GREETING' => 'Esta é a interface para o Serviço de Calendarização do SugarCRM.',
  'ERR_DELETE_RECORD' => 'Um número de registo deve ser especificado para eliminar a calendarização.',
  'ERR_CRON_SYNTAX' => 'Sintaxe Cron inválida',
  'NTC_DELETE_CONFIRMATION' => 'Tem a certeza de que pretende eliminar este registo?',
  'NTC_STATUS' => 'Configure o estado como Inactivo para excluir esta Calendarização das listas de valores possíveis do Calendarizador',
  'NTC_LIST_ORDER' => 'Configure a ordem pela qual esta Calendarização aparecerá nas listas de valores possíveis do campo Calendarizador',
  'LBL_CRON_INSTRUCTIONS_WINDOWS' => 'Para configurar o Calendarizador do Windows',
  'LBL_CRON_INSTRUCTIONS_LINUX' => 'Para configurar o Crontab',
  'LBL_CRON_LINUX_DESC' => 'Adicione esta linha ao crontab:',
  'LBL_CRON_WINDOWS_DESC' => 'Crie um ficheiro batch com os seguintes comandos:',
  'LBL_NO_PHP_CLI' => 'Se o seu host não tiver o binário PHP disponível, poderá usar o wget ou o curl para lançar as suas Tarefas.<br>for wget: <b>*    *    *    *    *    wget --quiet --non-verbose /cron.php > /dev/null 2>&1</b><br>for curl: <b>*    *    *    *    *    curl --silent /cron.php > /dev/null 2>&1',
  'LBL_JOBS_SUBPANEL_TITLE' => 'Tarefas Activas',
  'LBL_EXECUTE_TIME' => 'Tempo de Execução',
  'LBL_REFRESHJOBS' => 'Actualizar Tarefas',
  'LBL_POLLMONITOREDINBOXES' => 'Verificar Contas de Entrada de E-mail',
  'LBL_RUNMASSEMAILCAMPAIGN' => 'Executar toda a noite campanhas de e-mail massivo',
  'LBL_POLLMONITOREDINBOXESFORBOUNCEDCAMPAIGNEMAILS' => 'Executar toda a noite o Processamento de E-mails Retornados de Campanhas',
  'LBL_PRUNEDATABASE' => 'Remover Apagados da Base de Dados no primeiro dia do Mês',
  'LBL_TRIMTRACKER' => 'Remover Apagados das Tabelas de Trackers',
  'LBL_PROCESSWORKFLOW' => 'Processar Tarefas de Workflow',
  'LBL_PROCESSQUEUE' => 'Executar tarefas criadas de execução de relatórios',
  'LBL_UPDATETRACKERSESSIONS' => 'Actualizar Tabelas de Sessões de Trackers',
);

