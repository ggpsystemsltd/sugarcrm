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
  'LBL_USER_TYPE' => 'Tipo de Utilizador',
  'LBL_EMAIL_LINK_TYPE' => 'Cliente de e-mail',
  'LBL_EMAIL_LINK_TYPE_HELP' => '<b>Cliente de E-mail SugarCRM</b> : Envia emails utilizando o cliente de email da aplicação Sugar.<br><b>Cliente de E-mail Externo</b> : Envia emails através de um cliente de email externo à aplicação Sugar, como o Microsoft Outlook.',
  'LBL_ONLY_ACTIVE' => 'Funcionários Activos',
  'LBL_SELECT' => 'Seleccionar',
  'LBL_FF_CLEAR' => 'Limpar',
  'LBL_AUTHENTICATE_ID' => 'ID Autenticação',
  'LBL_EXT_AUTHENTICATE' => 'Autenticação Externa',
  'LBL_GROUP_USER' => 'Utilizador do Grupo',
  'LBL_LIST_ACCEPT_STATUS' => 'Estado de Aceitação',
  'LBL_MODIFIED_BY' => 'Modificado Por',
  'LBL_MODIFIED_BY_ID' => 'Modificado Por Id',
  'LBL_CREATED_BY_NAME' => 'Criado por',
  'LBL_PORTAL_ONLY_USER' => 'Utilizador do Portal API',
  'LBL_PSW_MODIFIED' => 'Última palavra-chave alterada.',
  'LBL_SHOW_ON_EMPLOYEES' => 'Mostrar Registo do Funcionário',
  'LBL_USER_HASH' => 'Palavra-passe',
  'LBL_SYSTEM_GENERATED_PASSWORD' => 'Palavra-chave Gerada pelo Sistema',
  'LBL_PICTURE_FILE' => 'Fotografia',
  'LBL_DESCRIPTION' => 'Descrição',
  'LBL_FAX_PHONE' => 'Fax',
  'LBL_STATUS' => 'Estado',
  'LBL_ADDRESS_CITY' => 'Cidade',
  'LBL_ADDRESS_COUNTRY' => 'País',
  'LBL_ADDRESS_POSTALCODE' => 'Código Postal',
  'LBL_ADDRESS_STATE' => 'Estado',
  'LBL_ADDRESS_STREET' => 'Rua',
  'LBL_DATE_MODIFIED' => 'Data de Modificação',
  'LBL_DATE_ENTERED' => 'Data de Introdução',
  'LBL_DELETED' => 'Eliminado',
  'LBL_LOGIN' => 'Login',
  'LBL_LIST_ADMIN' => 'Admin',
  'LBL_NEW_EMPLOYEE_BUTTON_KEY' => 'N',
  'LBL_CREATE_USER_BUTTON_KEY' => 'N',
  'LBL_MODULE_NAME' => 'Funcionários',
  'LBL_MODULE_TITLE' => 'Funcionários: Ecrã Principal',
  'LBL_SEARCH_FORM_TITLE' => 'Pesquisar Funcionários',
  'LBL_LIST_FORM_TITLE' => 'Funcionários',
  'LBL_NEW_FORM_TITLE' => 'Criar Novo Funcionário',
  'LBL_EMPLOYEE' => 'Funcionários:',
  'LBL_RESET_PREFERENCES' => 'Voltar à configuração inicial do sistema',
  'LBL_TIME_FORMAT' => 'Formato da hora:',
  'LBL_DATE_FORMAT' => 'Formato da data:',
  'LBL_TIMEZONE' => 'Hora local:',
  'LBL_CURRENCY' => 'Moeda:',
  'LBL_LIST_NAME' => 'Nome',
  'LBL_LIST_LAST_NAME' => 'Último Nome:',
  'LBL_LIST_EMPLOYEE_NAME' => 'Nome do Funcionário',
  'LBL_LIST_DEPARTMENT' => 'Departamento',
  'LBL_LIST_REPORTS_TO_NAME' => 'Reporta a',
  'LBL_LIST_EMAIL' => 'E-mail',
  'LBL_LIST_PRIMARY_PHONE' => 'Telefone (principal)',
  'LBL_LIST_USER_NAME' => 'Nome do Utilizador',
  'LBL_NEW_EMPLOYEE_BUTTON_TITLE' => 'Criar Funcionário [Alt+N]',
  'LBL_NEW_EMPLOYEE_BUTTON_LABEL' => 'Criar Funcionário',
  'LBL_ERROR' => 'Erro:',
  'LBL_PASSWORD' => 'Palavra-passe:',
  'LBL_EMPLOYEE_NAME' => 'Nome do Funcionário:',
  'LBL_USER_NAME' => 'Nome do Utilizador:',
  'LBL_FIRST_NAME' => 'Primeiro Nome:',
  'LBL_LAST_NAME' => 'Último Nome:',
  'LBL_EMPLOYEE_SETTINGS' => 'Definições do Funcionário',
  'LBL_THEME' => 'Tema:',
  'LBL_LANGUAGE' => 'Idioma:',
  'LBL_ADMIN' => 'Administrador:',
  'LBL_EMPLOYEE_INFORMATION' => 'Dados do Funcionário',
  'LBL_OFFICE_PHONE' => 'Telefone Escritório:',
  'LBL_REPORTS_TO' => 'Reporta a Id:',
  'LBL_REPORTS_TO_NAME' => 'Reporta a:',
  'LBL_OTHER_PHONE' => 'Telefone (outro):',
  'LBL_OTHER_EMAIL' => 'E-mail (outro):',
  'LBL_NOTES' => 'Observações:',
  'LBL_DEPARTMENT' => 'Departamento:',
  'LBL_TITLE' => 'Título:',
  'LBL_ANY_ADDRESS' => 'Qualquer Endereço:',
  'LBL_ANY_PHONE' => 'Telefone alternativo:',
  'LBL_ANY_EMAIL' => 'E-mail alternativo:',
  'LBL_ADDRESS' => 'Endereço:',
  'LBL_CITY' => 'Cidade:',
  'LBL_STATE' => 'Estado:',
  'LBL_POSTAL_CODE' => 'Código Postal:',
  'LBL_COUNTRY' => 'País:',
  'LBL_NAME' => 'Nome:',
  'LBL_MOBILE_PHONE' => 'Telemóvel:',
  'LBL_OTHER' => 'Outro:',
  'LBL_FAX' => 'Fax:',
  'LBL_EMAIL' => 'E-mail:',
  'LBL_HOME_PHONE' => 'Telefone de Casa:',
  'LBL_WORK_PHONE' => 'Telefone do Emprego:',
  'LBL_ADDRESS_INFORMATION' => 'Dados de endereço',
  'LBL_EMPLOYEE_STATUS' => 'Estado do Funcionário:',
  'LBL_PRIMARY_ADDRESS' => 'Endereço (principal):',
  'LBL_SAVED_SEARCH' => 'Opções de Layout',
  'LBL_CREATE_USER_BUTTON_TITLE' => 'Criar Utilizador [Alt+N]',
  'LBL_CREATE_USER_BUTTON_LABEL' => 'Criar Utilizador',
  'LBL_FAVORITE_COLOR' => 'Cor preferida:',
  'LBL_MESSENGER_ID' => 'Nome IM:',
  'LBL_MESSENGER_TYPE' => 'Tipo de IM:',
  'ERR_EMPLOYEE_NAME_EXISTS_1' => 'Já existe um Funcionário com o mesmo nome',
  'ERR_EMPLOYEE_NAME_EXISTS_2' => 'já existe. Nomes de Funcionários repetidos não são permitidos. Altere o nome do Funcionário para que seja único.',
  'ERR_LAST_ADMIN_1' => 'O nome do funcionário"',
  'ERR_LAST_ADMIN_2' => '" é o último a ter direitos de Administrador. Pelo menos um Utilizador deve ter esses direitos.',
  'LNK_NEW_EMPLOYEE' => 'Criar Funcionário',
  'LNK_EMPLOYEE_LIST' => 'Ver Funcionários',
  'ERR_DELETE_RECORD' => 'Para excluir uma conta um número de registo deve ser especificado.',
  'LBL_DEFAULT_TEAM' => 'Equipa Padrão:',
  'LBL_DEFAULT_TEAM_TEXT' => 'Selecciona a equipa por defeito em registos novos',
  'LBL_MY_TEAMS' => 'As minhas Equipas',
  'LBL_LIST_DESCRIPTION' => 'Descrição',
  'LNK_EDIT_TABS' => 'Editar Tabuladores',
  'NTC_REMOVE_TEAM_MEMBER_CONFIRMATION' => 'Tem a certeza de que pretende eliminar a associação deste Funcionário?',
  'LBL_LIST_EMPLOYEE_STATUS' => 'Estado',
  'LBL_SUGAR_LOGIN' => 'É Utilizador Sugar',
  'LBL_RECEIVE_NOTIFICATIONS' => 'Notificar na Atribuição',
  'LBL_IS_ADMIN' => 'É Administrador',
  'LBL_GROUP' => 'Utilizador do Grupo',
  'LBL_PORTAL_ONLY' => 'Utilizador Apenas do Portal',
  'LBL_PHOTO' => 'Foto',
  'LBL_DELETE_USER_CONFIRM' => 'Este funcionário é também um utilizador. Apagar o registo do funcionário irá igualmente apagar o registo do utilizador, não sendo possível este aceder à aplicação. Deseja continuar com a eliminação deste registo?',
  'LBL_DELETE_EMPLOYEE_CONFIRM' => 'Tem a certeza que deseja eliminar este funcionário?',
);

