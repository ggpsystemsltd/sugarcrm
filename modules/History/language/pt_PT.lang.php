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
  'LBL_COLON' => ':',
  'LBL_NEW_TASK_BUTTON_KEY' => 'N',
  'LBL_SCHEDULE_MEETING_BUTTON_KEY' => 'M',
  'LBL_SCHEDULE_CALL_BUTTON_KEY' => 'C',
  'LBL_NEW_NOTE_BUTTON_KEY' => 'T',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_MODULE_NAME' => 'Histórico',
  'LBL_MODULE_TITLE' => 'Histórico: Principal',
  'LBL_SEARCH_FORM_TITLE' => 'Pesquisar Histórico',
  'LBL_LIST_FORM_TITLE' => 'Histórico',
  'LBL_LIST_SUBJECT' => 'Assunto',
  'LBL_LIST_CONTACT' => 'Contacto',
  'LBL_LIST_RELATED_TO' => 'Relacionado com',
  'LBL_LIST_DATE' => 'Data',
  'LBL_LIST_TIME' => 'Hora de Início',
  'LBL_LIST_CLOSE' => 'Fechar',
  'LBL_SUBJECT' => 'Assunto:',
  'LBL_STATUS' => 'Estado:',
  'LBL_LOCATION' => 'Localização:',
  'LBL_DATE_TIME' => 'Data & Hora de Início:',
  'LBL_DATE' => 'Data de Início:',
  'LBL_TIME' => 'Hora de Início:',
  'LBL_DURATION' => 'Duração:',
  'LBL_HOURS_MINS' => '(horas/minutos)',
  'LBL_CONTACT_NAME' => 'Nome do Contacto:',
  'LBL_MEETING' => 'Reunião:',
  'LBL_DESCRIPTION_INFORMATION' => 'Informação da Descrição',
  'LBL_DESCRIPTION' => 'Descrição:',
  'LBL_DEFAULT_STATUS' => 'Planeado',
  'LNK_NEW_CALL' => 'Criar Nova Chamada Telefónica',
  'LNK_NEW_MEETING' => 'Criar Nova Reunião',
  'LNK_NEW_TASK' => 'Criar Nova Tarefa',
  'LNK_NEW_NOTE' => 'Criar Nova Nota',
  'LNK_NEW_EMAIL' => 'Arquivar E-mail',
  'LNK_CALL_LIST' => 'Chamadas Telefónicas',
  'LNK_MEETING_LIST' => 'Reuniões',
  'LNK_TASK_LIST' => 'Tarefas',
  'LNK_NOTE_LIST' => 'Notas ou Anexos',
  'LNK_EMAIL_LIST' => 'E-mails',
  'ERR_DELETE_RECORD' => 'Um número de registo deve ser especificado para eliminar a entidade.',
  'NTC_REMOVE_INVITEE' => 'Tem a certeza que quer remover este convidado da reunião?',
  'LBL_INVITEE' => 'Convidados',
  'LBL_LIST_DIRECTION' => 'Direcção',
  'LBL_DIRECTION' => 'Direcção',
  'LNK_NEW_APPOINTMENT' => 'Novo Compromisso',
  'LNK_VIEW_CALENDAR' => 'Hoje',
  'LBL_OPEN_ACTIVITIES' => 'Actividades em Aberto',
  'LBL_HISTORY' => 'Histórico',
  'LBL_UPCOMING' => 'Os Meus Próximos Compromissos',
  'LBL_TODAY' => 'Até',
  'LBL_NEW_TASK_BUTTON_TITLE' => 'Criar Nova Tarefa [Alt+N]',
  'LBL_NEW_TASK_BUTTON_LABEL' => 'Criar Nova Tarefa',
  'LBL_SCHEDULE_MEETING_BUTTON_TITLE' => 'Criar Nova Reunião [Alt+M]',
  'LBL_SCHEDULE_MEETING_BUTTON_LABEL' => 'Criar Nova Reunião',
  'LBL_SCHEDULE_CALL_BUTTON_TITLE' => 'Criar Nova Chamada Telefónica [Alt+C]',
  'LBL_SCHEDULE_CALL_BUTTON_LABEL' => 'Criar Nova Chamada Telefónica',
  'LBL_NEW_NOTE_BUTTON_TITLE' => 'Criar Nova Nota ou Anexo [Alt+T]',
  'LBL_NEW_NOTE_BUTTON_LABEL' => 'Criar Nova Nota ou Anexo',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'Arquivar E-mail [Alt+K]',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'Arquivar E-mail',
  'LBL_LIST_STATUS' => 'Estado',
  'LBL_LIST_DUE_DATE' => 'Data Limite',
  'LBL_LIST_LAST_MODIFIED' => 'Última Alteração',
  'NTC_NONE_SCHEDULED' => 'Nada Calendarizado.',
  'LNK_IMPORT_NOTES' => 'Importar Notas ou Anexos',
  'NTC_NONE' => 'Nenhum',
  'LBL_ACCEPT_THIS' => 'Aceitar?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Histórico',
  'appointment_filter_dom' => 
  array (
    'today' => 'hoje',
    'tomorrow' => 'amanhã',
    'this Saturday' => 'esta semana',
    'next Saturday' => 'próxima semana',
    'last this_month' => 'este mês',
    'last next_month' => 'próximo mês',
  ),
);

