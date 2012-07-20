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
  'LBL_ACCEPT_STATUS' => 'Estado de Aceitação',
  'LBL_ACCEPT_LINK' => 'Link de Aceitação',
  'LBL_HOURS_ABBREV' => 'h',
  'LBL_MINSS_ABBREV' => 'm',
  'LBL_COLON' => ':',
  'LBL_SEND_BUTTON_KEY' => 'I',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Leads',
  'LBL_OUTLOOK_ID' => 'Outlook ID',
  'LBL_BLANK' => '-Nenhuma-',
  'LBL_MODULE_NAME' => 'Chamadas Telefónicas',
  'LBL_MODULE_TITLE' => 'Chamadas Telefónicas: Ecrã Principal',
  'LBL_SEARCH_FORM_TITLE' => 'Pesquisar Chamadas Telefónicas',
  'LBL_LIST_FORM_TITLE' => 'Listar Chamadas Telefónicas',
  'LBL_NEW_FORM_TITLE' => 'Criar Compromisso',
  'LBL_LIST_CLOSE' => 'Fechar',
  'LBL_LIST_SUBJECT' => 'Assunto',
  'LBL_LIST_CONTACT' => 'Contacto',
  'LBL_LIST_RELATED_TO' => 'Referente a',
  'LBL_LIST_RELATED_TO_ID' => 'Referente ao ID',
  'LBL_LIST_DATE' => 'Data de Início',
  'LBL_LIST_TIME' => 'Hora de Início',
  'LBL_LIST_DURATION' => 'Duração',
  'LBL_LIST_DIRECTION' => 'Direcção',
  'LBL_SUBJECT' => 'Assunto:',
  'LBL_REMINDER' => 'Aviso:',
  'LBL_CONTACT_NAME' => 'Contacto:',
  'LBL_DESCRIPTION_INFORMATION' => 'Informações da Descrição',
  'LBL_DESCRIPTION' => 'Descrição',
  'LBL_STATUS' => 'Estado:',
  'LBL_DIRECTION' => 'Direcção:',
  'LBL_DATE' => 'Data de Início:',
  'LBL_DURATION' => 'Duração:',
  'LBL_DURATION_HOURS' => 'Duração (horas):',
  'LBL_DURATION_MINUTES' => 'Duração (minutos):',
  'LBL_HOURS_MINUTES' => '(horas/minutos)',
  'LBL_CALL' => 'Chamada Telefónica:',
  'LBL_DATE_TIME' => 'Data e Hora de Início:',
  'LBL_TIME' => 'Hora de Início:',
  'LNK_NEW_CALL' => 'Nova Chamada Telefónica',
  'LNK_NEW_MEETING' => 'Criar Reunião',
  'LNK_CALL_LIST' => 'Chamadas Telefónicas',
  'LNK_IMPORT_CALLS' => 'Importar Chamadas Telefónicas',
  'ERR_DELETE_RECORD' => 'Um número de registo deve ser especificado para eliminar a entidade',
  'NTC_REMOVE_INVITEE' => 'Tem certeza que deseja remover este convidado da Chamada Telefónica?',
  'LBL_INVITEE' => 'Convidados',
  'LBL_RELATED_TO' => 'Referente a:',
  'LNK_NEW_APPOINTMENT' => 'Criar Compromisso',
  'LBL_SCHEDULING_FORM_TITLE' => 'Calendarização',
  'LBL_ADD_INVITEE' => 'Adicionar convidados',
  'LBL_NAME' => 'Nome completo',
  'LBL_FIRST_NAME' => 'Nome',
  'LBL_LAST_NAME' => 'Último Nome',
  'LBL_EMAIL' => 'E-mail',
  'LBL_PHONE' => 'Telefone',
  'LBL_SEND_BUTTON_TITLE' => 'Enviar convites [Alt+I]',
  'LBL_SEND_BUTTON_LABEL' => 'Enviar convites',
  'LBL_DATE_END' => 'Data de conclusão',
  'LBL_TIME_END' => 'Hora de conclusão',
  'LBL_REMINDER_TIME' => 'Hora do aviso',
  'LBL_SEARCH_BUTTON' => 'Pesquisar',
  'LBL_ACTIVITIES_REPORTS' => 'Relatório de Actividades',
  'LBL_ADD_BUTTON' => 'Adicionar',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Chamadas Telefónicas',
  'LBL_LOG_CALL' => 'Registo de Chamada Telefónica',
  'LNK_SELECT_ACCOUNT' => 'Seleccionar Entidade',
  'LNK_NEW_ACCOUNT' => 'Nova Entidade',
  'LNK_NEW_OPPORTUNITY' => 'Nova Oportunidade',
  'LBL_DEL' => 'Elim',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Contactos',
  'LBL_USERS_SUBPANEL_TITLE' => 'Utilizadores',
  'LBL_MEMBER_OF' => 'Membro de',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Notas ou Anexos',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Atribuído a',
  'LBL_LIST_MY_CALLS' => 'As Minhas Chamadas Telefónicas',
  'LBL_SELECT_FROM_DROPDOWN' => 'Por favor faça primeiro uma selecção da lista Referente A',
  'LBL_ASSIGNED_TO_NAME' => 'Atribuído a',
  'LBL_ASSIGNED_TO_ID' => 'Atribuído a:',
  'NOTICE_DURATION_TIME' => 'Tempo de duração deve ser maior que 0',
  'LBL_CALL_INFORMATION' => 'Informação da Chamada',
  'LBL_REMOVE' => 'Remover',
  'LBL_PARENT_ID' => 'ID Pai',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'ID do Utilizador que Modificou',
  'LBL_EXPORT_CREATED_BY' => 'ID do Utilizador que Criou',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'ID de Utilizador Atribuído',
  'LBL_EXPORT_DATE_START' => 'Data e Hora de Inicio',
  'LBL_EXPORT_PARENT_TYPE' => 'Relacionado com o módulo',
  'LBL_EXPORT_REMINDER_TIME' => 'Tempo Restante (em minutos)',
);

