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
  'LBL_EDITLAYOUT' => 'Editar Layout',
  'LBL_ADDRESS_CC' => 'cc:',
  'LBL_ADDRESS_BCC' => 'bcc:',
  'LBL_BLANK' => '',
  'LBL_MODULE_NAME' => 'Lista de Destinatários dos Alertas',
  'LBL_MODULE_TITLE' => 'Destinatários: Ecrã Principal',
  'LBL_SEARCH_FORM_TITLE' => 'Pesquisa de Destinatários de Workflow',
  'LBL_LIST_FORM_TITLE' => 'Lista de Destinatários',
  'LBL_NEW_FORM_TITLE' => 'Criar Destinatários de Workflow',
  'LBL_LIST_USER_TYPE' => 'Tipo de Utilizador',
  'LBL_LIST_ARRAY_TYPE' => 'Tipo de Acção',
  'LBL_LIST_RELATE_TYPE' => 'Tipo de Relação',
  'LBL_LIST_ADDRESS_TYPE' => 'Tipo de Endereço',
  'LBL_LIST_FIELD_VALUE' => 'Utilizador',
  'LBL_LIST_REL_MODULE1' => 'Módulo Relacionado',
  'LBL_LIST_REL_MODULE2' => 'Módulo Relacionado Relacionado',
  'LBL_LIST_WHERE_FILTER' => 'Estado',
  'LBL_USER_TYPE' => 'Tipo de Utilizador:',
  'LBL_ARRAY_TYPE' => 'Tipo de Acção:',
  'LBL_RELATE_TYPE' => 'Tipo de Relacionamento:',
  'LBL_WHERE_FILTER' => 'Estado:',
  'LBL_FIELD_VALUE' => 'Utilizador Seleccionado:',
  'LBL_REL_MODULE1' => 'Módulo Relacionado:',
  'LBL_REL_MODULE2' => 'Módulo Relacionado Relacionado:',
  'LBL_CUSTOM_USER' => 'Utilizador à Medida:',
  'LNK_NEW_WORKFLOW' => 'Criar Workflow',
  'LNK_WORKFLOW' => 'Objectos de Workflow',
  'LBL_LIST_STATEMENT' => 'Destinatários de Alerta:',
  'LBL_LIST_STATEMENT_CONTENT' => 'Enviar Alertas para o seguintes Destinatários',
  'LBL_ALERT_CURRENT_USER' => 'Um Utilizador associado com o destino',
  'LBL_ALERT_CURRENT_USER_TITLE' => 'Um Utilizador associado com o módulo de destino',
  'LBL_ALERT_REL_USER' => 'Um Utilizador associado com um relacionado',
  'LBL_ALERT_REL_USER_TITLE' => 'Um Utilizador associado com um módulo relacionado',
  'LBL_ALERT_REL_USER_CUSTOM' => 'Destinatário associado com um relacionado',
  'LBL_ALERT_REL_USER_CUSTOM_TITLE' => 'Destinatário associado com um módulo relacionado',
  'LBL_ALERT_TRIG_USER_CUSTOM' => 'Destinatário associado com o módulo de destino',
  'LBL_ALERT_TRIG_USER_CUSTOM_TITLE' => 'Destinatário associado com o módulo de destino',
  'LBL_ALERT_SPECIFIC_USER' => 'Um especificado',
  'LBL_ALERT_SPECIFIC_USER_TITLE' => 'Um Utilizador especificado',
  'LBL_ALERT_SPECIFIC_TEAM' => 'Todos os Utilizadores numa especificada',
  'LBL_ALERT_SPECIFIC_TEAM_TITLE' => 'Todos os Utilizadores numa equipa especificada',
  'LBL_ALERT_SPECIFIC_ROLE' => 'Todos os Utilizadores numa especificada',
  'LBL_ALERT_SPECIFIC_ROLE_TITLE' => 'Todos os Utilizadores numa função especificada',
  'LBL_ALERT_SPECIFIC_TEAM_TARGET_TITLE' => 'Membros da equipa associada com o módulo de destino',
  'LBL_ALERT_SPECIFIC_TEAM_TARGET' => 'Todos os utilizadores que pertencem às equipas associadas com o módulo de destino',
  'LBL_ALERT_LOGIN_USER_TITLE' => 'Utilizador autenticado no momento da execução',
  'LBL_RECORD' => 'Módulo',
  'LBL_TEAM' => 'Equipa',
  'LBL_USER' => 'Utilizador',
  'LBL_USER_MANAGER' => 'Responsável do Utilizador',
  'LBL_ROLE' => 'função',
  'LBL_SEND_EMAIL' => 'Enviar um e-mail a:',
  'LBL_USER1' => 'quem criou o registo',
  'LBL_USER2' => 'quem modificou pela última vez o registo',
  'LBL_USER3' => 'Actual',
  'LBL_USER3b' => 'do sistema',
  'LBL_USER4' => 'a quem é associado o registo',
  'LBL_USER5' => 'a quem foi associado o registo',
  'LBL_ADDRESS_TO' => 'para:',
  'LBL_ADDRESS_TYPE' => 'a utilizar o endereço',
  'LBL_ADDRESS_TYPE_TARGET' => 'tipo',
  'LBL_ALERT_REL1' => 'Módulo Relacionado:',
  'LBL_ALERT_REL2' => 'Módulo Relacionado Relacionado:',
  'LBL_NEXT_BUTTON' => 'Próximo',
  'LBL_PREVIOUS_BUTTON' => 'Anterior',
  'NTC_REMOVE_ALERT_USER' => 'Tem a certeza de que pretende eliminar o destinatário deste alerta?',
  'LBL_REL_CUSTOM_STRING' => 'Seleccionar e-mails à medida e nomes de campos',
  'LBL_REL_CUSTOM' => 'Seleccionar Campos  de E-mail à Medida',
  'LBL_REL_CUSTOM2' => 'Campo',
  'LBL_AND' => 'e Nome de Campo:',
  'LBL_REL_CUSTOM3' => 'Campo',
  'LBL_FILTER_CUSTOM' => '(Filtro Adicional) Filtrar módulo relacionado por específico',
  'LBL_FIELD' => 'Campo',
  'LBL_SPECIFIC_FIELD' => 'campo',
  'LBL_FILTER_BY' => '(Filtro Adicional) Filtrar módulo relacionado por',
  'LBL_MODULE_NAME_INVITE' => 'Lista de Convidados',
  'LBL_LIST_STATEMENT_INVITE' => 'Convidados de Reuniões/ Chamadas Telefónicas',
  'LBL_SELECT_VALUE' => 'Deve seleccionar um valor válido.',
  'LBL_SELECT_NAME' => 'Deve seleccionar um campo de nome personalizado.',
  'LBL_SELECT_EMAIL' => 'Deve seleccionar um campo de e-mail personalizado.',
  'LBL_SELECT_FILTER' => 'Deve seleccionar um campo para filtrar',
  'LBL_SELECT_NAME_EMAIL' => 'Deve seleccionar os campos de nome e e-mail',
  'LBL_PLEASE_SELECT' => 'Por favor seleccione',
);

