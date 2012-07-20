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
  'LBL_FOUND_IN_RELEASE_NAME' => 'Encontrado na Release com o Nome',
  'LBL_PORTAL_VIEWABLE' => 'Visível no Portal',
  'LBL_EXPORT_ASSIGNED_USER_NAME' => 'Nome de Utilizador Atribuído',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'ID de Utilizador Atribuído',
  'LBL_EXPORT_FIXED_IN_RELEASE_NAMR' => 'Corrigido na Release com o Nome',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'ID do Utilizador que Modificou',
  'LBL_EXPORT_CREATED_BY' => 'ID do Utilizador que Criou',
  'LBL_MODULE_ID' => 'Bugs',
  'LBL_BUG' => 'Bug:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Bug Tracker',
  'LBL_MODULE_NAME' => 'Bug Tracker',
  'LBL_MODULE_TITLE' => 'Bug Tracker: Ecrã Principal',
  'LBL_SEARCH_FORM_TITLE' => 'Pesquisar Bugs',
  'LBL_LIST_FORM_TITLE' => 'Listar Bugs',
  'LBL_NEW_FORM_TITLE' => 'Criar Bug',
  'LBL_CONTACT_BUG_TITLE' => 'Contacto-Bug:',
  'LBL_SUBJECT' => 'Assunto:',
  'LBL_BUG_NUMBER' => 'Número do Bug:',
  'LBL_NUMBER' => 'Número:',
  'LBL_STATUS' => 'Estado:',
  'LBL_PRIORITY' => 'Prioridade:',
  'LBL_DESCRIPTION' => 'Descrição:',
  'LBL_CONTACT_NAME' => 'Nome do Contacto:',
  'LBL_BUG_SUBJECT' => 'Assunto do Bug:',
  'LBL_CONTACT_ROLE' => 'Função:',
  'LBL_LIST_NUMBER' => 'Núm.',
  'LBL_LIST_SUBJECT' => 'Assunto',
  'LBL_LIST_STATUS' => 'Estado',
  'LBL_LIST_PRIORITY' => 'Prioridade',
  'LBL_LIST_RELEASE' => 'Versão',
  'LBL_LIST_RESOLUTION' => 'Resolução',
  'LBL_LIST_LAST_MODIFIED' => 'Última modificação',
  'LBL_INVITEE' => 'Contactos',
  'LBL_TYPE' => 'Tipo:',
  'LBL_LIST_TYPE' => 'Tipo',
  'LBL_RESOLUTION' => 'Resolução:',
  'LBL_RELEASE' => 'Versão:',
  'LNK_NEW_BUG' => 'Reportar Bug',
  'LNK_BUG_LIST' => 'Bugs',
  'NTC_REMOVE_INVITEE' => 'Tem a certeza de que pretende eliminar este contacto deste Bug?',
  'NTC_REMOVE_ACCOUNT_CONFIRMATION' => 'Tem a certeza de que pretende eliminar este Bug desta entidade?',
  'ERR_DELETE_RECORD' => 'Um número de registo necessita ser especificado para eliminar um Bug.',
  'LBL_LIST_MY_BUGS' => 'Os Meus Bugs',
  'LNK_IMPORT_BUGS' => 'Importar Bugs',
  'LBL_FOUND_IN_RELEASE' => 'Encontrado na versão:',
  'LBL_FIXED_IN_RELEASE' => 'Corrigido na versão:',
  'LBL_LIST_FIXED_IN_RELEASE' => 'Corrigido na versão',
  'LBL_WORK_LOG' => 'Log de trabalho:',
  'LBL_SOURCE' => 'Origem:',
  'LBL_PRODUCT_CATEGORY' => 'Categoria:',
  'LBL_CREATED_BY' => 'Criado por:',
  'LBL_DATE_CREATED' => 'Data de criação:',
  'LBL_MODIFIED_BY' => 'Modificado por:',
  'LBL_DATE_LAST_MODIFIED' => 'Data de modificação:',
  'LBL_LIST_EMAIL_ADDRESS' => 'Endereço de e-mail',
  'LBL_LIST_CONTACT_NAME' => 'Nome do Contacto',
  'LBL_LIST_ACCOUNT_NAME' => 'Nome da Entidade',
  'LBL_LIST_PHONE' => 'Telefone',
  'NTC_DELETE_CONFIRMATION' => 'Tem a certeza de que pretende eliminar este Contacto deste Bug?',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Actividades',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Histórico',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Contactos',
  'LBL_ACCOUNTS_SUBPANEL_TITLE' => 'Entidades',
  'LBL_CASES_SUBPANEL_TITLE' => 'Ocorrências',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projectos',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Documentos',
  'LBL_SYSTEM_ID' => 'ID do Sistema',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Utilizador',
  'LBL_ASSIGNED_TO_NAME' => 'Atribuído a',
  'LNK_BUG_REPORTS' => 'Relatórios de Bug',
  'LBL_SHOW_IN_PORTAL' => 'Mostrar no Portal',
  'LBL_BUG_INFORMATION' => 'Informação do Bug',
);

