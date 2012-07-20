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
  'LBL_ACCEPT' => 'Aceitar',
  'LBL_COLON' => ':',
  'LBL_NEW_TASK_BUTTON_KEY' => 'N',
  'LBL_MODULE_NAME' => 'Actividades',
  'LBL_MODULE_TITLE' => 'Actividades: Ecrã Principal',
  'LBL_SEARCH_FORM_TITLE' => 'Pesquisar Actividades',
  'LBL_LIST_FORM_TITLE' => 'Listar Actividades',
  'LBL_LIST_SUBJECT' => 'Assunto',
  'LBL_LIST_CONTACT' => 'Contacto',
  'LBL_LIST_RELATED_TO' => 'Referente a',
  'LBL_LIST_DATE' => 'Data',
  'LBL_LIST_TIME' => 'Hora de Iní­cio',
  'LBL_LIST_CLOSE' => 'Fechar',
  'LBL_SUBJECT' => 'Assunto:',
  'LBL_STATUS' => 'Estado:',
  'LBL_LOCATION' => 'Local:',
  'LBL_DATE_TIME' => 'Data e Hora de Iní­cio:',
  'LBL_DATE' => 'Data de iní­cio:',
  'LBL_TIME' => 'Hora de início:',
  'LBL_DURATION' => 'Duração:',
  'LBL_DURATION_MINUTES' => 'Minutos de Duração:',
  'LBL_HOURS_MINS' => '(horas/minutos)',
  'LBL_CONTACT_NAME' => 'Nome do Contacto:',
  'LBL_MEETING' => 'Reunião:',
  'LBL_DESCRIPTION_INFORMATION' => 'Informações da Descrição',
  'LBL_DESCRIPTION' => 'Descrição:',
  'LNK_NEW_CALL' => 'Nova Chamada Telefónica',
  'LNK_NEW_MEETING' => 'Nova Reunião',
  'LNK_NEW_TASK' => 'Nova Tarefa',
  'LNK_NEW_NOTE' => 'Nova Nota ou Anexo',
  'LNK_NEW_EMAIL' => 'Arquivar E-mail',
  'LNK_CALL_LIST' => 'Chamadas Telefónicas',
  'LNK_MEETING_LIST' => 'Reuniões',
  'LNK_TASK_LIST' => 'Tarefas',
  'LNK_NOTE_LIST' => 'Notas ou Anexos',
  'LNK_EMAIL_LIST' => 'E-mails',
  'ERR_DELETE_RECORD' => 'Para eliminar uma conta um número de registo deverá ser especificado.',
  'NTC_REMOVE_INVITEE' => 'Tem a certeza que deseja remover este convidado da Reunião?',
  'LBL_INVITEE' => 'Convidados',
  'LBL_LIST_DIRECTION' => 'Direcção',
  'LBL_DIRECTION' => 'Direcção',
  'LNK_NEW_APPOINTMENT' => 'Novo Compromisso',
  'LNK_VIEW_CALENDAR' => 'Hoje',
  'LBL_OPEN_ACTIVITIES' => 'Actividades em aberto',
  'LBL_HISTORY' => 'Histórico',
  'LBL_UPCOMING' => 'As Minhas Próximas Actividades',
  'LBL_TODAY' => 'até',
  'LBL_NEW_TASK_BUTTON_TITLE' => 'Nova Nova Tarefa [Alt+T]',
  'LBL_NEW_TASK_BUTTON_LABEL' => 'Nova Tarefa',
  'LBL_SCHEDULE_MEETING_BUTTON_TITLE' => 'Reunião [Alt+R]',
  'LBL_SCHEDULE_MEETING_BUTTON_KEY' => 'R',
  'LBL_SCHEDULE_MEETING_BUTTON_LABEL' => 'Reunião',
  'LBL_SCHEDULE_CALL_BUTTON_TITLE' => 'Chamada Telefónica [Alt+L]',
  'LBL_SCHEDULE_CALL_BUTTON_KEY' => 'L',
  'LBL_SCHEDULE_CALL_BUTTON_LABEL' => 'Chamada Telefónica',
  'LBL_NEW_NOTE_BUTTON_TITLE' => 'Nova Nota ou Anexo [Alt+A]',
  'LBL_NEW_NOTE_BUTTON_KEY' => 'A',
  'LBL_NEW_NOTE_BUTTON_LABEL' => 'Nova Nota ou Anexo',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'Arquivar E-mail [Alt+E]',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'E',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'Arquivar E-mail',
  'LBL_LIST_STATUS' => 'Estado',
  'LBL_LIST_DUE_DATE' => 'Prazo Limite',
  'LBL_LIST_LAST_MODIFIED' => 'Última Alteração',
  'NTC_NONE_SCHEDULED' => 'Nada planeado.',
  'LNK_IMPORT_CALLS' => 'Importar Chamadas Telefónicas',
  'LNK_IMPORT_MEETINGS' => 'Importar Reuniões',
  'LNK_IMPORT_TASKS' => 'Importar Tarefas',
  'LNK_IMPORT_NOTES' => 'Importar Notas ou Anexos',
  'NTC_NONE' => 'Nenhum',
  'LBL_ACCEPT_THIS' => 'Aceitar?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Actividade em aberto',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Utilizador',
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

