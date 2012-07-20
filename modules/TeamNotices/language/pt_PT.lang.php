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
  'LBL_MORE_DETAIL' => 'Mais Detalhe',
  'LBL_URL' => 'URL',
  'LBL_MODULE_NAME' => 'Notícias das Equipas',
  'LBL_MODULE_TITLE' => 'Notícias das Equipas: Ecrã Principal',
  'LBL_SEARCH_FORM_TITLE' => 'Pesquisa de Notícias da Equipas',
  'LBL_LIST_FORM_TITLE' => 'Lista de Notícias da Equipas',
  'LBL_PRODUCTTYPE' => 'Notícias da Equipa',
  'LBL_NOTICES' => 'Notícias da Equipas',
  'LBL_LIST_NAME' => 'Título',
  'LBL_URL_TITLE' => 'Título do URL',
  'LBL_LIST_DESCRIPTION' => 'Descrição',
  'LBL_NAME' => 'Título',
  'LBL_DESCRIPTION' => 'Descrição',
  'LBL_LIST_LIST_ORDER' => 'Ordem',
  'LBL_LIST_ORDER' => 'Ordem',
  'LBL_DATE_START' => 'Data de Início',
  'LBL_DATE_END' => 'Data de Fim',
  'LBL_STATUS' => 'Estado',
  'LNK_NEW_TEAM' => 'Criar Equipa',
  'LNK_NEW_TEAM_NOTICE' => 'Criar Notícia de Equipa',
  'LNK_LIST_TEAM' => 'Equipas',
  'LNK_LIST_TEAMNOTICE' => 'Notícias de Equipa',
  'LNK_PRODUCT_LIST' => 'Lista de Preços de Produtos',
  'LNK_NEW_PRODUCT' => 'Criar Produto',
  'LNK_NEW_MANUFACTURER' => 'Fornecedores',
  'LNK_NEW_SHIPPER' => 'Transportadores',
  'LNK_NEW_PRODUCT_CATEGORY' => 'Categorias de Produtos',
  'LNK_NEW_PRODUCT_TYPE' => 'Lista de Tipos de Produtos',
  'NTC_DELETE_CONFIRMATION' => 'Tem a certeza de que pretende eliminar este registo?',
  'ERR_DELETE_RECORD' => 'Um número de registo tem de ser especificado para eliminar este tipo de produto',
  'NTC_LIST_ORDER' => 'Indique a ordem pela qual este tipo irá aparecer na lista de entradas possíveis do campo Tipo de Produto',
  'LBL_TEAM_NOTICE_FEATURES' => 'Funcionalidades: * A melhoria da Interface do Utilizador e um novo Assistente combinam um novo design simples e intuitivo, conduzindo o utilizador passo-a-passo pela criação de relatórios. * Conjuntos Complexos de Relatórios permitem aos utilizadores criar relatórios em vários módulos usando lógica complexa. * Relatórios Matriz oferecem a capacidade de agrupar por vários atributos num layout de grelha flexível. Os utilizadores podem criar tabelas pivô complexas com a capacidade de exibir operações como Soma, Média, Contagem e Percentagem. * Filtros Run-Time permitem aos utilizadores alterar os atributos de um relatório em tempo real.',
  'LBL_TEAM_NOTICE_WIRELESS' => 'Nova visualização móvel para a aplicação SugarCRM integra da melhor maneira a usabilidade e mobilidade. Funcionalidades: * A melhoria da Interface do Utilizador fornece aos utilizadores visualizações de edição, detalhe, de lista e registos relacionados, bem como a capacidade de acesso ao directório do colaborador, preferências de armazenamento e visualização de itens recentes. * A Independência do Dispositivo permite aos utilizadores visualizar os dados do SugarCRM a partir de qualquer PDA ou smart phone, incluindo Blackberry e iPhone. * Cliente Rico HTML fornece uma apresentação clara dos dados do SugarCRM através de um Web browser padrão. * Novas Capacidades de Pesquisa permitem aos utilizadores localizar rapidamente informações.',
  'LBL_TEAM_NOTICE_DATA_IMPORT' => 'As inovações na Importação de Dados tornam ainda mais fácil mover dados a partir de aplicações como Excel, Act!, Microsoft Outlook e Salesforce.com para o SugarCRM. Inovações: * Melhoria da Interface de Utilizador para mapeamento fornece mais opções para assegurar que a transferência de dados é executada de forma harmoniosa e precisa para o SugarCRM. * Controlos de Dados de Qualidade permite aos administradores especificar se as importações de dados devem criar novos registos ou actualizar os registos existentes, reduzindo a duplicação de informações. * Importação para Todos os Módulos fornece a capacidade de captar informações de outras aplicações de CRM para qualquer módulo, reduzindo a reentrada de dados.',
  'LBL_TEAM_NOTICE_MODULE_BUILDER' => 'O Module Builder permite-lhe estender o SugarCRM em novas e inovadoras formas. Inovações: * Novos Relacionamentos permitem aos novos e actuais módulos relacionarem-se de novas maneiras. * Auditoria fornece um histórico completo da criação de módulo e modificações para acompanhar as personalizações. * Suporte Dashlet permite aos objectos personalizados e funcionalidades de módulos serem exibidos em terminais AJAX na página principal. * Novos Modelos oferecem uma maneira fácil de monitorizar arquivos e informações de oportunidades.',
  'LBL_TEAM_NOTICE_TRACKER' => 'O Tracker oferece agora uma visão alargada do uso e desempenho do SugarCRM. Funcionalidades: * Relatórios Tracker fornecem um panorama da utilização do sistema, a fim de aumentar a adopção e a visibilidade do utilizador em CRM. Os utilizadores podem visualizar os relatórios semanais sobre actividades de CRM, registos e módulos visualizados, tempo de login cumulativo e estado online de outros membros da equipa. * Monitorização do Sistema fornece aos administradores informação sobre como o sistema está a ser utilizador e identifica pontos de stress potenciais para a aplicação.',
  'dom_status' => 
  array (
    'Visible' => 'Visível',
    'Hidden' => 'Escondido',
  ),
);

