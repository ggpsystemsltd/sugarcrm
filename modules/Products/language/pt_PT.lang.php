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
  'LBL_MODULE_NAME' => 'Produtos',
  'LBL_MODULE_TITLE' => 'Produtos: Ecrã Principal',
  'LBL_SEARCH_FORM_TITLE' => 'Pesquisar Produtos',
  'LBL_LIST_FORM_TITLE' => 'Lista de Produtos',
  'LBL_NEW_FORM_TITLE' => 'Novo Produto',
  'LBL_PRODUCT' => 'Produto',
  'LBL_RELATED_PRODUCTS' => 'Produtos Relacionados',
  'LBL_LIST_NAME' => 'Produto',
  'LBL_LIST_MANUFACTURER' => 'Fabricante',
  'LBL_LIST_LBL_MFT_PART_NUM' => 'Número do Fabricante',
  'LBL_LIST_QUANTITY' => 'Quantidade',
  'LBL_LIST_COST_PRICE' => 'Custo',
  'LBL_LIST_DISCOUNT_PRICE' => 'Preço',
  'LBL_LIST_LIST_PRICE' => 'Lista',
  'LBL_LIST_STATUS' => 'Estado',
  'LBL_LIST_ACCOUNT_NAME' => 'Nome da Entidade',
  'LBL_LIST_CONTACT_NAME' => 'Nome do Contacto',
  'LBL_LIST_QUOTE_NAME' => 'Nome da Cotação',
  'LBL_LIST_DATE_PURCHASED' => 'Comprado',
  'LBL_LIST_SUPPORT_EXPIRES' => 'Expira',
  'LBL_NAME' => 'Produto:',
  'LBL_URL' => 'URL do Produto:',
  'LBL_QUOTE_NAME' => 'Nome da Cotação:',
  'LBL_CONTACT_NAME' => 'Nome do Contacto:',
  'LBL_DATE_PURCHASED' => 'Comprado:',
  'LBL_DATE_SUPPORT_EXPIRES' => 'O Suporte expira em:',
  'LBL_DATE_SUPPORT_STARTS' => 'O Suporte expira em:',
  'LBL_COST_PRICE' => 'Custo:',
  'LBL_DISCOUNT_PRICE' => 'Preço unitário',
  'LBL_DEAL_TOT' => 'Desconto:',
  'LBL_DISCOUNT_RATE' => 'Taxa de Desconto',
  'LBL_DISCOUNT_RATE_USDOLLAR' => 'Taxa de Desconto (US Dollar)',
  'LBL_DISCOUNT_TOTAL' => 'Desconto Total',
  'LBL_DISCOUNT_TOTAL_USDOLLAR' => 'Desconto (US Dollar)',
  'LBL_SELECT_DISCOUNT' => 'Desconto em %',
  'LBL_LIST_PRICE' => 'Preço:',
  'LBL_VENDOR_PART_NUM' => 'Número do Fornecedor',
  'LBL_MFT_PART_NUM' => 'Número do Fabricante',
  'LBL_DISCOUNT_PRICE_DATE' => 'Data do Desconto:',
  'LBL_WEIGHT' => 'Peso:',
  'LBL_DESCRIPTION' => 'Descrição:',
  'LBL_TYPE' => 'Tipo:',
  'LBL_CATEGORY' => 'Categoria:',
  'LBL_QUANTITY' => 'Quantidade:',
  'LBL_STATUS' => 'Estado:',
  'LBL_TAX_CLASS' => 'Classificação Fiscal:',
  'LBL_MANUFACTURER' => 'Fabricante:',
  'LBL_SUPPORT_DESCRIPTION' => 'Descrição do Suporte',
  'LBL_SUPPORT_TERM' => 'Equipa de Suporte',
  'LBL_SUPPORT_NAME' => 'Título do Suporte',
  'LBL_SUPPORT_CONTACT' => 'Contacto do Suporte',
  'LBL_PRICING_FORMULA' => 'Fórmula do Preço',
  'LBL_ACCOUNT_NAME' => 'Nome da Entidade',
  'LNK_PRODUCT_LIST' => 'Produtos',
  'LNK_NEW_PRODUCT' => 'Novo Produto',
  'NTC_DELETE_CONFIRMATION' => 'Tem a certeza que pretende eliminar este registo?',
  'NTC_REMOVE_CONFIRMATION' => 'Tem a certeza que pretende eliminar a relação com este produto?',
  'ERR_DELETE_RECORD' => 'Um número de registo tem de ser especificado para eliminar este produto.',
  'LBL_CURRENCY' => 'Moeda:',
  'LBL_ASSET_NUMBER' => 'Número de Imobilizado:',
  'LBL_SERIAL_NUMBER' => 'Número de Série:',
  'LBL_BOOK_VALUE' => 'Valor Contabilístico:',
  'LBL_BOOK_VALUE_USDOLLAR' => 'Valor contabilístico (USD)',
  'LBL_BOOK_VALUE_DATE' => 'Data do Valor Contabilístico:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Produtos',
  'LBL_RELATED_PRODUCTS_TITLE' => 'Produtos relacionados',
  'LBL_WEBSITE' => 'Site de Internet',
  'LBL_COST_USDOLLAR' => 'Custo (em US Dollars)',
  'LBL_DISCOUNT_USDOLLAR' => 'Desconto (em US Dollars)',
  'LBL_LIST_USDOLLAR' => 'Preço (em US Dollars)',
  'LBL_PRICING_FACTOR' => 'Factor Preço',
  'LBL_ACCOUNT_ID' => 'Id da Entidade',
  'LBL_CONTACT_ID' => 'Id do Contacto',
  'LBL_CATEGORY_NAME' => 'Nome da Categoria:',
  'LBL_NOTES_SUBPANEL_TITLE' => 'Notas ou Anexos',
  'LBL_MEMBER_OF' => 'Membro de:',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projectos',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Documentos',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Contratos',
  'LBL_CONTRACTS' => 'Contratos',
  'LBL_PRODUCT_CATEGORIES' => 'Categorias de Produto',
  'LBL_PRODUCT_TYPES' => 'Tipos de Produto',
  'LBL_ASSIGNED_TO_NAME' => 'Atribuído a:',
  'LBL_PRODUCT_TEMPLATE_ID' => 'ID Modelo do Produto',
  'LBL_QUOTE_ID' => 'ID Cotação',
  'LBL_CREATED_USER' => 'Utilizador Criado',
  'LBL_MODIFIED_USER' => 'Utilizador Modificado',
  'LBL_QUOTE' => 'Cotação',
  'LBL_CONTACT' => 'Contacto',
  'LBL_DISCOUNT_AMOUNT' => 'Valor do Desconto',
  'LBL_CURRENCY_SYMBOL_NAME' => 'Nome do Símbolo da Moeda',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Produtos',
  'LNK_IMPORT_PRODUCTS' => 'Importar Produtos',
  'LBL_EXPORT_CURRENCY_ID' => 'ID da Moeda',
);

