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
  'LBL_MODIFIED_BY_NAME_OWNER' => 'Modificado por (Name Owner)',
  'LBL_MODIFIED_BY_NAME_MOD' => 'Modificado por (Name Mod)',
  'LBL_CREATED_BY_NAME_OWNER' => 'Criado por (Name Owner)',
  'LBL_CREATED_BY_NAME_MOD' => 'Criado por (Name Mod)',
  'LBL_ASSIGNED_USER_NAME_OWNER' => 'Atribuído a (Name Owner)',
  'LBL_ASSIGNED_USER_NAME_MOD' => 'Atribuído a (Name Mod)',
  'LBL_TEAM_COUNT_OWNER' => 'Total de Equipas (Owner)',
  'LBL_TEAM_COUNT_MOD' => 'Total de Equipas (Mod)',
  'LBL_TEAM_NAME_OWNER' => 'Nome da Equipa (Owner)',
  'LBL_TEAM_NAME_MOD' => 'Nome da Equipa (Mod)',
  'LBL_ACCOUNT_NAME_OWNER' => 'Nome da Entidade (Owner)',
  'LBL_ACCOUNT_NAME_MOD' => 'Nome da Entidade (Mod)',
  'LBL_MODIFIED_USER_NAME' => 'Modificado por',
  'LBL_MODIFIED_USER_NAME_OWNER' => 'Modificado por (Owner)',
  'LBL_MODIFIED_USER_NAME_MOD' => 'Modificado por (Mod)',
  'LBL_PORTAL_VIEWABLE' => 'Visível no Portal',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'Atribuído a',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'Modificado por',
  'LBL_EXPORT_CREATED_BY' => 'Criado Por',
  'LBL_EXPORT_CREATED_BY_NAME' => 'Criado por',
  'LBL_EXPORT_ASSIGNED_USER_NAME' => 'Atribuído a',
  'LBL_EXPORT_TEAM_COUNT' => 'Total de Equipas',
  'LBL_CONTACT_HISTORY_SUBPANEL_TITLE' => 'Histórico de Contactos',
  'LBL_BUGS_SUBPANEL_TITLE' => 'Bugs',
  'ERR_DELETE_RECORD' => 'Um número de registo deve ser especificado para eliminar a entidade.',
  'LBL_ACCOUNT_ID' => 'ID da Entidade',
  'LBL_ACCOUNT_NAME' => 'Nome da Entidade:',
  'LBL_ACCOUNTS_SUBPANEL_TITLE' => 'Entidades',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Actividades',
  'LBL_ATTACH_NOTE' => 'Anexar Nota',
  'LBL_CASE_NUMBER' => 'Número da Ocorrência:',
  'LBL_CASE_SUBJECT' => 'Assunto da Ocorrência:',
  'LBL_CASE' => 'Ocorrência:',
  'LBL_CONTACT_CASE_TITLE' => 'Contacto-Ocorrência:',
  'LBL_CONTACT_NAME' => 'Nome do Contacto:',
  'LBL_CONTACT_ROLE' => 'Função:',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Contactos',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Ocorrências',
  'LBL_DESCRIPTION' => 'Descrição:',
  'LBL_FILENANE_ATTACHMENT' => 'Anexar Ficheiro',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Histórico',
  'LBL_INVITEE' => 'Contactos',
  'LBL_MEMBER_OF' => 'Entidade',
  'LBL_MODULE_NAME' => 'Ocorrências',
  'LBL_MODULE_TITLE' => 'Ocorrências: Ecrã Principal',
  'LBL_NEW_FORM_TITLE' => 'Nova Ocorrência',
  'LBL_NUMBER' => 'Número:',
  'LBL_PRIORITY' => 'Prioridade:',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projectos',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Documentos',
  'LBL_RESOLUTION' => 'Resolução:',
  'LBL_SEARCH_FORM_TITLE' => 'Pesquisar Ocorrências',
  'LBL_STATUS' => 'Situação:',
  'LBL_SUBJECT' => 'Assunto:',
  'LBL_SYSTEM_ID' => 'ID do Sistema',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Utilizador',
  'LBL_LIST_ACCOUNT_NAME' => 'Nome da Entidade',
  'LBL_LIST_ASSIGNED' => 'Atribuído a',
  'LBL_LIST_CLOSE' => 'Fechar',
  'LBL_LIST_FORM_TITLE' => 'Lista de Ocorrências',
  'LBL_LIST_LAST_MODIFIED' => 'Última Alteração',
  'LBL_LIST_MY_CASES' => 'As Minhas Ocorrências Abertas',
  'LBL_LIST_NUMBER' => 'Núm.',
  'LBL_LIST_PRIORITY' => 'Prioridade',
  'LBL_LIST_STATUS' => 'Estado',
  'LBL_LIST_SUBJECT' => 'Assunto',
  'LNK_CASE_LIST' => 'Ocorrências',
  'LNK_NEW_CASE' => 'Nova Ocorrência',
  'NTC_REMOVE_FROM_BUG_CONFIRMATION' => 'Tem certeza que quer remover esta ocorrência a partir deste bug?',
  'NTC_REMOVE_INVITEE' => 'Tem certeza que quer remover este contacto da ocorrência?',
  'LBL_LIST_DATE_CREATED' => 'Data de Criação',
  'LBL_ASSIGNED_TO_NAME' => 'Atribuído a',
  'LBL_TYPE' => 'Tipo',
  'LBL_WORK_LOG' => 'Registo de Trabalho',
  'LNK_IMPORT_CASES' => 'Importar Ocorrências',
  'LNK_CASE_REPORTS' => 'Relatórios de Ocorrências',
  'LBL_SHOW_IN_PORTAL' => 'Mostrar no Portal',
  'LBL_CREATE_KB_DOCUMENT' => 'Criar Artigo',
  'LBL_CREATED_USER' => 'Utilizador Criado',
  'LBL_MODIFIED_USER' => 'Utilizador Modificado',
  'LBL_PROJECT_SUBPANEL_TITLE' => 'Projectos',
  'LBL_CASE_INFORMATION' => 'Informação da Ocorrência',
);

