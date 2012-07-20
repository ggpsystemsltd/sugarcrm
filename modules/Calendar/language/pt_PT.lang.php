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
  'LBL_EDIT_USERLIST' => 'Lista de Utilizadores',
  'LBL_CREATE_MEETING' => 'Agendar Nova Reunião',
  'LBL_CREATE_CALL' => 'Registo de Chamada Telefónica',
  'LBL_HOURS_ABBREV' => 'h',
  'LBL_MINS_ABBREV' => 'm',
  'LBL_YES' => 'Sim',
  'LBL_NO' => 'Não',
  'LBL_SETTINGS' => 'Configurações',
  'LBL_CREATE_NEW_RECORD' => 'Criar Actividade',
  'LBL_LOADING' => 'A carregar ...',
  'LBL_SAVING' => 'A Gravar...',
  'LBL_CONFIRM_REMOVE' => 'Tem a certeza que quer remover o registo?',
  'LBL_EDIT_RECORD' => 'Editar Actividade',
  'LBL_ERROR_SAVING' => 'Erro ao gravar',
  'LBL_ERROR_LOADING' => 'Erro ao carregar',
  'LBL_GOTO_DATE' => 'Ir para Data',
  'NOTICE_DURATION_TIME' => 'Tempo de duração deve ser maior que 0',
  'LBL_STYLE_BASIC' => 'Básica',
  'LBL_STYLE_ADVANCED' => 'Avançada',
  'LBL_INFO_TITLE' => 'Detalhes Adicionais',
  'LBL_INFO_DESC' => 'Descrição',
  'LBL_INFO_START_DT' => 'Data e Tempo de Início',
  'LBL_INFO_DUE_DT' => 'Data e Tempo de Fim',
  'LBL_INFO_DURATION' => 'Duração',
  'LBL_INFO_NAME' => 'Assunto',
  'LBL_INFO_RELATED_TO' => 'Relacionado a',
  'LBL_NO_USER' => 'Não há correspondências para o campo: Atribuído a',
  'LBL_SUBJECT' => 'Assunto',
  'LBL_DURATION' => 'Duração',
  'LBL_STATUS' => 'Estado',
  'LBL_DATE_TIME' => 'Data e Hora',
  'LBL_SETTINGS_TITLE' => 'Configurações',
  'LBL_SETTINGS_TIME_STARTS' => 'Hora de Início:',
  'LBL_SETTINGS_TIME_ENDS' => 'Hora de Fim:',
  'LBL_SETTINGS_CALENDAR_STYLE' => 'Estilo do Calendário',
  'LBL_SETTINGS_CALLS_SHOW' => 'Mostrar Chamadas:',
  'LBL_SETTINGS_TASKS_SHOW' => 'Mostrar Tarefas:',
  'LBL_SAVE_BUTTON' => 'Gravar',
  'LBL_DELETE_BUTTON' => 'Eliminar',
  'LBL_APPLY_BUTTON' => 'Aplica',
  'LBL_SEND_INVITES' => 'Enviar convites',
  'LBL_CANCEL_BUTTON' => 'Cancelar',
  'LBL_CLOSE_BUTTON' => 'Fechar',
  'LBL_GENERAL_TAB' => 'Detalhes',
  'LBL_PARTICIPANTS_TAB' => 'Convidados',
  'LBL_AM' => 'AM',
  'LBL_PM' => 'PM',
  'LBL_MODULE_NAME' => 'Calendário',
  'LBL_MODULE_TITLE' => 'Calendário',
  'LNK_NEW_CALL' => 'Criar Nova Chamada',
  'LNK_NEW_MEETING' => 'Criar Nova Reunião',
  'LNK_NEW_APPOINTMENT' => 'Criar Novo Compromisso',
  'LNK_NEW_TASK' => 'Criar Nova Tarefa',
  'LNK_CALL_LIST' => 'Chamadas Telefónicas',
  'LNK_MEETING_LIST' => 'Reuniões',
  'LNK_TASK_LIST' => 'Tarefas',
  'LNK_VIEW_CALENDAR' => 'Hoje',
  'LNK_IMPORT_CALLS' => 'Importar Chamadas Telefónicas',
  'LNK_IMPORT_MEETINGS' => 'Importar Reuniões',
  'LNK_IMPORT_TASKS' => 'Importar Tarefas',
  'LBL_MONTH' => 'Mês',
  'LBL_DAY' => 'Dia',
  'LBL_YEAR' => 'Ano',
  'LBL_WEEK' => 'Semana',
  'LBL_PREVIOUS_MONTH' => 'Mês Anterior',
  'LBL_PREVIOUS_DAY' => 'Dia Anterior',
  'LBL_PREVIOUS_YEAR' => 'Ano Anterior',
  'LBL_PREVIOUS_WEEK' => 'Semana Anterior',
  'LBL_NEXT_MONTH' => 'Próximo Mês',
  'LBL_NEXT_DAY' => 'Próximo Dia',
  'LBL_NEXT_YEAR' => 'Próximo Ano',
  'LBL_NEXT_WEEK' => 'Próxima Semana',
  'LBL_SCHEDULED' => 'Criado',
  'LBL_BUSY' => 'Ocupado',
  'LBL_CONFLICT' => 'Conflito',
  'LBL_USER_CALENDARS' => 'Calendários do Utilizador',
  'LBL_SHARED' => 'Partilhado',
  'LBL_PREVIOUS_SHARED' => 'Anterior',
  'LBL_NEXT_SHARED' => 'Próximo',
  'LBL_SHARED_CAL_TITLE' => 'Calendário Partilhado',
  'LBL_USERS' => 'Utilizador',
  'LBL_REFRESH' => 'Actualizar',
  'LBL_SELECT_USERS' => 'Seleccione utilizadores para exibir o calendário',
  'LBL_FILTER_BY_TEAM' => 'Filtrar lista de utilizadores por equipa:',
  'LBL_ASSIGNED_TO_NAME' => 'Atribuído a',
  'LBL_DATE' => 'Data e Hora de Início',
);

