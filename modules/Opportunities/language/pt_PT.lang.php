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
  'LBL_LEADS_SUBPANEL_TITLE' => 'Leads',
  'LBL_MODULE_NAME' => 'Oportunidades',
  'LBL_MODULE_TITLE' => 'Oportunidades: Ecrã Principal',
  'LBL_SEARCH_FORM_TITLE' => 'Pesquisar Oportunidades',
  'LBL_VIEW_FORM_TITLE' => 'Visualizar Oportunidades',
  'LBL_LIST_FORM_TITLE' => 'Lista de Oportunidades',
  'LBL_OPPORTUNITY_NAME' => 'Nome da Oportunidade',
  'LBL_OPPORTUNITY' => 'Oportunidade:',
  'LBL_NAME' => 'Nome da Oportunidade',
  'LBL_INVITEE' => 'Contactos',
  'LBL_CURRENCIES' => 'Moedas',
  'LBL_LIST_OPPORTUNITY_NAME' => 'Oportunidade',
  'LBL_LIST_ACCOUNT_NAME' => 'Nome da Entidade',
  'LBL_LIST_AMOUNT' => 'Valor da Oportunidade',
  'LBL_LIST_AMOUNT_USDOLLAR' => 'Valor',
  'LBL_LIST_DATE_CLOSED' => 'Data Prevista',
  'LBL_LIST_SALES_STAGE' => 'Fase da Venda',
  'LBL_ACCOUNT_ID' => 'ID da Entidade',
  'LBL_CURRENCY_ID' => 'ID da Moeda',
  'LBL_CURRENCY_NAME' => 'Nome da Moeda',
  'LBL_CURRENCY_SYMBOL' => 'Símbolo da Moeda',
  'LBL_TEAM_ID' => 'ID da Equipa',
  'UPDATE' => 'Oportunidade - Actualizar Moeda',
  'UPDATE_DOLLARAMOUNTS' => 'Actualizar Valores em U.S. Dollar',
  'UPDATE_VERIFY' => 'Verificar Valores',
  'UPDATE_VERIFY_TXT' => 'Verifica se os valores nas oportunidades são válidos com apenas dados numéricos (0-9) e ponto decimal (.)',
  'UPDATE_FIX' => 'Corrigir Valores',
  'UPDATE_FIX_TXT' => 'Tenta corrigir qualquer valor inválido criando um valor com casas decimais a partir do valor actual. Será feito o backup de qualquer valor alterado na base de dados. Caso execute este procedimento e receba uma mensagem de problemas, não execute novamente antes de restaurar o backup, pois de outra forma o backup pode ser sobrescrito com dados inválidos.',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'Actualiza os valores em U.S. Dollar nas oportunidades baseado na taxa de cotação actual. Este valor será utilizado para calcular os Gráficos e Listas com Valores de Cotações.',
  'UPDATE_CREATE_CURRENCY' => 'A criar Nova Moeda',
  'UPDATE_VERIFY_FAIL' => 'Verificação de Registos Falhou',
  'UPDATE_VERIFY_CURAMOUNT' => 'Valor Actual',
  'UPDATE_VERIFY_FIX' => 'Executar Correcções pode trazer',
  'UPDATE_INCLUDE_CLOSE' => 'Incluir Registos Fechados',
  'UPDATE_VERIFY_NEWAMOUNT' => 'Novo Valor',
  'UPDATE_VERIFY_NEWCURRENCY' => 'Nova Moeda',
  'UPDATE_DONE' => 'Completo',
  'UPDATE_BUG_COUNT' => 'Encontrados Bugs e Tentativas de Resolver',
  'UPDATE_BUGFOUND_COUNT' => 'Bugs Encontrados',
  'UPDATE_COUNT' => 'Registos Actualizados',
  'UPDATE_RESTORE_COUNT' => 'Valores de Registos Restaurados',
  'UPDATE_RESTORE' => 'Restaurar Valores',
  'UPDATE_RESTORE_TXT' => 'Restaurar valores a partir do backup criado durante a Resolução.',
  'UPDATE_FAIL' => 'Impossível actualizar -',
  'UPDATE_NULL_VALUE' => 'Valor é NULO definindo como 0 -',
  'UPDATE_MERGE' => 'Fundir Moedas',
  'UPDATE_MERGE_TXT' => 'Fundir múltiplas moedas numa moeda única. Caso seja informado de que existem múltiplos registos de moedas para a mesma moeda, você pode optar por fundi-los. Isto também ira fundir moedas para todos os outros módulos.',
  'LBL_ACCOUNT_NAME' => 'Nome da Entidade',
  'LBL_AMOUNT' => 'Valor da Oportunidade',
  'LBL_AMOUNT_USDOLLAR' => 'Valor USD',
  'LBL_CURRENCY' => 'Moeda',
  'LBL_DATE_CLOSED' => 'Data Prevista',
  'LBL_TYPE' => 'Tipo',
  'LBL_CAMPAIGN' => 'Campanha',
  'LBL_NEXT_STEP' => 'Próximo Passo',
  'LBL_LEAD_SOURCE' => 'Origem da Lead',
  'LBL_SALES_STAGE' => 'Fase da Venda',
  'LBL_PROBABILITY' => 'Probabilidade (%)',
  'LBL_DESCRIPTION' => 'Descrição',
  'LBL_DUPLICATE' => 'Possível Oportunidade Duplicada',
  'MSG_DUPLICATE' => 'Ao criar esta oportunidade pode duplicar uma oportunidade. Você pode seleccionar uma oportunidade da lista abaixo ou clicar em Nova Oportunidade para continuar a criar com os dados entrados previamente.',
  'LBL_NEW_FORM_TITLE' => 'Nova Oportunidade',
  'LNK_NEW_OPPORTUNITY' => 'Nova Oportunidade',
  'LNK_OPPORTUNITY_REPORTS' => 'Relatório de Oportunidades',
  'LNK_OPPORTUNITY_LIST' => 'Oportunidades',
  'ERR_DELETE_RECORD' => 'Um número de registo deve ser especificado para eliminar a oportunidade.',
  'LBL_TOP_OPPORTUNITIES' => 'As Minhas Melhores Oportunidades',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'Tem certeza de que pretende eliminar este contacto desta oportunidade?',
  'OPPORTUNITY_REMOVE_PROJECT_CONFIRM' => 'Tem certeza que deseja remover essa oportunidade deste projecto?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Oportunidades',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Actividades',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Histórico',
  'LBL_RAW_AMOUNT' => 'Valor Bruto',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Contactos',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Cotações',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Documentos',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projectos',
  'LBL_ASSIGNED_TO_NAME' => 'Atribuído a',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Utilizador',
  'LBL_CONTRACTS' => 'Contratos',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Contratos',
  'LBL_MY_CLOSED_OPPORTUNITIES' => 'As Minhas Oportunidades Fechadas',
  'LBL_TOTAL_OPPORTUNITIES' => 'Oportunidades Totais',
  'LBL_CLOSED_WON_OPPORTUNITIES' => 'Oportunidades Fechadas Ganhas',
  'LBL_ASSIGNED_TO_ID' => 'Atribuído a',
  'LBL_CREATED_ID' => 'ID Criado Por',
  'LBL_MODIFIED_ID' => 'Modificado por',
  'LBL_MODIFIED_NAME' => 'Modificado pelo Nome do Utilizador',
  'LBL_CREATED_USER' => 'Utilizador Criado',
  'LBL_MODIFIED_USER' => 'Utilizador Modificado',
  'LBL_CAMPAIGN_OPPORTUNITY' => 'Campanha',
  'LBL_PROJECT_SUBPANEL_TITLE' => 'Projectos',
  'LABEL_PANEL_ASSIGNMENT' => 'Atribuição',
  'LNK_IMPORT_OPPORTUNITIES' => 'Importar Oportunidades',
  'LBL_EXPORT_CAMPAIGN_ID' => 'ID da Campanha',
  'LBL_OPPORTUNITY_TYPE' => 'Tipo de Oportunidade',
  'LBL_EXPORT_ASSIGNED_USER_NAME' => 'Nome de Utilizador Atribuído',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'ID de Utilizador Atribuído',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'ID do Utilizador que Modificou',
  'LBL_EXPORT_CREATED_BY' => 'ID do Utilizador que Criou',
  'LBL_EXPORT_NAME' => 'Nome',
  'LBL_CONTACT_HISTORY_SUBPANEL_TITLE' => 'Emails dos Contactos Relacionados',
);

