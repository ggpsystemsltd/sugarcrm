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
  'LBL_FILE_UPLOAD' => 'Ficheiro:',
  'LBL_EXTERNAL_DOCUMENT_NOTE' => 'Os 20 ficheiros mais recentemente modificados são exibidos em ordem descendente na lista abaixo. Utilize a Pesquisa para encontrar outros ficheiros',
  'LBL_LIST_EXT_DOCUMENT_NAME' => 'Nome do Ficheiro ( defined in ./include/SugarObjects/templates/file/language/pt_PT.lang.php )',
  'LBL_MIME' => 'Mime Type',
  'LBL_LIST_DOWNLOAD' => 'Download',
  'LNK_NEW_MAIL_MERGE' => 'Mail Merge',
  'LBL_BUGS_SUBPANEL_TITLE' => 'Bugs',
  'LBL_MODULE_NAME' => 'Documentos',
  'LBL_MODULE_TITLE' => 'Documentos: Ecrã Principal',
  'LNK_NEW_DOCUMENT' => 'Novo Documento',
  'LNK_DOCUMENT_LIST' => 'Lista de Documentos',
  'LBL_DOC_REV_HEADER' => 'Revisões do Documento',
  'LBL_SEARCH_FORM_TITLE' => 'Pesquisar Documentos',
  'LBL_DOCUMENT_ID' => 'Documento',
  'LBL_NAME' => 'Nome do Documento',
  'LBL_DESCRIPTION' => 'Descrição',
  'LBL_CATEGORY' => 'Categoria',
  'LBL_SUBCATEGORY' => 'Subcategoria',
  'LBL_STATUS' => 'Estado',
  'LBL_CREATED_BY' => 'Criado por',
  'LBL_DATE_ENTERED' => 'Data de Registo',
  'LBL_DATE_MODIFIED' => 'Data de Alteração',
  'LBL_DELETED' => 'Eliminado',
  'LBL_MODIFIED' => 'ID Alterado por',
  'LBL_MODIFIED_USER' => 'Modificado por',
  'LBL_CREATED' => 'Criado por',
  'LBL_REVISIONS' => 'Revisões',
  'LBL_RELATED_DOCUMENT_ID' => 'ID do Documento Relacionado',
  'LBL_RELATED_DOCUMENT_REVISION_ID' => 'ID da Revisão do Documento Relacionado',
  'LBL_IS_TEMPLATE' => 'É um Modelo',
  'LBL_TEMPLATE_TYPE' => 'Tipo de Documento',
  'LBL_ASSIGNED_TO_NAME' => 'Atribuído a:',
  'LBL_REVISION_NAME' => 'Número de Revisão',
  'LBL_REVISION' => 'Revisão',
  'LBL_DOCUMENT' => 'Documento Relacionado',
  'LBL_LATEST_REVISION' => 'Última Revisão',
  'LBL_CHANGE_LOG' => 'Registo de Alterações:',
  'LBL_ACTIVE_DATE' => 'Data de Publicação',
  'LBL_EXPIRATION_DATE' => 'Data de Expiração',
  'LBL_FILE_EXTENSION' => 'Extensão do Ficheiro',
  'LBL_LAST_REV_MIME_TYPE' => 'MIME type da última revisão',
  'LBL_CAT_OR_SUBCAT_UNSPEC' => 'Não Especificado',
  'LBL_HOMEPAGE_TITLE' => 'Os Meus Documentos',
  'LBL_NEW_FORM_TITLE' => 'Novo Documento',
  'LBL_DOC_NAME' => 'Nome Documento:',
  'LBL_FILENAME' => 'Nome Ficheiro:',
  'LBL_LIST_FILENAME' => 'Nome do Ficheiro',
  'LBL_DOC_VERSION' => 'Revisão:',
  'LBL_CATEGORY_VALUE' => 'Categoria:',
  'LBL_LIST_CATEGORY' => 'Categoria',
  'LBL_SUBCATEGORY_VALUE' => 'Subcategoria:',
  'LBL_DOC_STATUS' => 'Estado:',
  'LBL_LAST_REV_CREATOR' => 'Revisão Criada por:',
  'LBL_LASTEST_REVISION_NAME' => 'Nome da última revisão',
  'LBL_SELECTED_REVISION_NAME' => 'Nome da Revisão Seleccionada',
  'LBL_CONTRACT_STATUS' => 'Estado do Contracto:',
  'LBL_CONTRACT_NAME' => 'Nome do Contacto',
  'LBL_LAST_REV_DATE' => 'Data da Revisão:',
  'LBL_DOWNNLOAD_FILE' => 'Transferir Ficheiro:',
  'LBL_DET_RELATED_DOCUMENT' => 'Documento Relacionado:',
  'LBL_DET_RELATED_DOCUMENT_VERSION' => 'Revisão do Documento Relacionado:',
  'LBL_DET_IS_TEMPLATE' => 'Modelo? :',
  'LBL_DET_TEMPLATE_TYPE' => 'Tipo de Documento:',
  'LBL_TEAM' => 'Equipa:',
  'LBL_DOC_DESCRIPTION' => 'Descrição:',
  'LBL_DOC_ACTIVE_DATE' => 'Data de Publicação:',
  'LBL_DOC_EXP_DATE' => 'Data de Expiração:',
  'LBL_LIST_FORM_TITLE' => 'Lista de Documentos',
  'LBL_LIST_DOCUMENT' => 'Documento',
  'LBL_LIST_SUBCATEGORY' => 'Subcategoria',
  'LBL_LIST_REVISION' => 'Revisão',
  'LBL_LIST_LAST_REV_CREATOR' => 'Publicado por',
  'LBL_LIST_LAST_REV_DATE' => 'Data da Revisão',
  'LBL_LIST_VIEW_DOCUMENT' => 'Exibir',
  'LBL_LIST_ACTIVE_DATE' => 'Data de Publicação',
  'LBL_LIST_EXP_DATE' => 'Data de Expiração',
  'LBL_LIST_STATUS' => 'Estado',
  'LBL_LINKED_ID' => 'Id ligado',
  'LBL_SELECTED_REVISION_ID' => 'Id da revisão seleccionada',
  'LBL_LATEST_REVISION_ID' => 'Id da última revisão',
  'LBL_SELECTED_REVISION_FILENAME' => 'Nome da revisão seleccionada',
  'LBL_FILE_URL' => 'URL do Ficheiro',
  'LBL_REVISIONS_PANEL' => 'Detalhes da Revisão',
  'LBL_REVISIONS_SUBPANEL' => 'Revisões',
  'LBL_SF_DOCUMENT' => 'Documento:',
  'LBL_SF_CATEGORY' => 'Categoria:',
  'LBL_SF_SUBCATEGORY' => 'Subcategoria:',
  'LBL_SF_ACTIVE_DATE' => 'Data de Publicação:',
  'LBL_SF_EXP_DATE' => 'Data de Expiração:',
  'DEF_CREATE_LOG' => 'Documento Criado',
  'ERR_DOC_NAME' => 'Nome do Documento',
  'ERR_DOC_ACTIVE_DATE' => 'Data de Publicação',
  'ERR_DOC_EXP_DATE' => 'Data de Expiração',
  'ERR_FILENAME' => 'Nome do Ficheiro',
  'ERR_DOC_VERSION' => 'Versão do Documento',
  'ERR_DELETE_CONFIRM' => 'Tem a certeza que deseja eliminar esta revisão do documento?',
  'ERR_DELETE_LATEST_VERSION' => 'Não tem permissão para eliminar a última revisão do documento.',
  'LBL_MAIL_MERGE_DOCUMENT' => 'Modelo de Mail Merge:',
  'LBL_TREE_TITLE' => 'Documentos',
  'LBL_LIST_DOCUMENT_NAME' => 'Nome do Documento',
  'LBL_LIST_IS_TEMPLATE' => 'Modelo?',
  'LBL_LIST_TEMPLATE_TYPE' => 'Tipo de Documento',
  'LBL_LIST_SELECTED_REVISION' => 'Revisão Seleccionada',
  'LBL_LIST_LATEST_REVISION' => 'Última Revisão',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Contratos Relacionados',
  'LBL_LAST_REV_CREATE_DATE' => 'Data da Criação da Última Revisão',
  'LBL_CONTRACTS' => 'Contratos',
  'LBL_CREATED_USER' => 'Utilizador Criado',
  'LBL_THEREVISIONS_SUBPANEL_TITLE' => 'Reversões',
  'LBL_DOCUMENT_INFORMATION' => 'Informação do documento',
  'LBL_DOC_ID' => 'ID do Documento Fonte',
  'LBL_DOC_TYPE' => 'Origem',
  'LBL_LIST_DOC_TYPE' => 'Origem',
  'LBL_DOC_TYPE_POPUP' => 'Seleccionar uma fonte para o qual este documento irá ser carregado e de onde estará disponível.',
  'LBL_DOC_URL' => 'URL do Documento Fonte',
  'LBL_SEARCH_EXTERNAL_DOCUMENT' => 'Nome do Documento',
  'LBL_ACCOUNTS_SUBPANEL_TITLE' => 'Entidades',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Contactos',
  'LBL_OPPORTUNITIES_SUBPANEL_TITLE' => 'Oportunidades',
  'LBL_CASES_SUBPANEL_TITLE' => 'Ocorrências',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Cotações',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Produtos',
);

