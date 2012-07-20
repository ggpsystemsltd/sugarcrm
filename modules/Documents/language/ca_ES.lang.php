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
  'LBL_DOC_ID' => 'ID origen document',
  'LBL_DOC_TYPE_POPUP' => 'Seleccioneu una font perquè es aquest document carregat <br> i de la qual estarà disponible.',
  'LBL_EXTERNAL_DOCUMENT_NOTE' => 'Els primers 20 arxius modificats més recentment es mostren en ordre descendent en la llista de baix. Utilitzeu la cerca per trobar altres arxius.',
  'LBL_MODULE_NAME' => 'Documents',
  'LBL_LIST_DOCUMENT' => 'Document',
  'LBL_TREE_TITLE' => 'Documents',
  'LBL_MODULE_TITLE' => 'Documents: Inici',
  'LNK_NEW_DOCUMENT' => 'Crear Document',
  'LNK_DOCUMENT_LIST' => 'Llista de Documents',
  'LBL_DOC_REV_HEADER' => 'Versions',
  'LBL_SEARCH_FORM_TITLE' => 'Recerca de Documents',
  'LBL_DOCUMENT_ID' => 'Id de Document',
  'LBL_NAME' => 'Nom de Document',
  'LBL_DESCRIPTION' => 'Descripció',
  'LBL_CATEGORY' => 'Categoria',
  'LBL_SUBCATEGORY' => 'Subcategoría',
  'LBL_STATUS' => 'Estat',
  'LBL_CREATED_BY' => 'Creat per',
  'LBL_DATE_ENTERED' => 'Data Creación',
  'LBL_DATE_MODIFIED' => 'Data Modificació',
  'LBL_DELETED' => 'Eliminat',
  'LBL_MODIFIED' => 'Modificat per ID',
  'LBL_MODIFIED_USER' => 'Modificat per',
  'LBL_CREATED' => 'Creat per',
  'LBL_REVISIONS' => 'Versions',
  'LBL_RELATED_DOCUMENT_ID' => 'ID de Document Relacionat',
  'LBL_RELATED_DOCUMENT_REVISION_ID' => 'ID de Versió de Document Relacionat',
  'LBL_IS_TEMPLATE' => 'Es una Plantilla',
  'LBL_TEMPLATE_TYPE' => 'Tipus de Document',
  'LBL_ASSIGNED_TO_NAME' => 'Assignat a:',
  'LBL_REVISION_NAME' => 'Número de Versió',
  'LBL_MIME' => 'Tipus MIME',
  'LBL_REVISION' => 'Versió',
  'LBL_DOCUMENT' => 'Document Relacionat',
  'LBL_LATEST_REVISION' => 'Última Versió',
  'LBL_CHANGE_LOG' => 'Històrial de Canvis:',
  'LBL_ACTIVE_DATE' => 'Data de Publicació',
  'LBL_EXPIRATION_DATE' => 'Data de Caducitat',
  'LBL_FILE_EXTENSION' => 'Extensió d´Arxiu',
  'LBL_LAST_REV_MIME_TYPE' => 'Tipus MIME de la última versió',
  'LBL_CAT_OR_SUBCAT_UNSPEC' => 'Sense especificar',
  'LBL_HOMEPAGE_TITLE' => 'Els Meus documents',
  'LBL_NEW_FORM_TITLE' => 'Nou Document',
  'LBL_DOC_NAME' => 'Nom de Document:',
  'LBL_FILENAME' => 'Nom d´Arxiu:',
  'LBL_LIST_FILENAME' => 'Arxiu:',
  'LBL_DOC_VERSION' => 'Versió:',
  'LBL_FILE_UPLOAD' => 'Arxiu:',
  'LBL_CATEGORY_VALUE' => 'Categoria:',
  'LBL_LIST_CATEGORY' => 'Categoría',
  'LBL_SUBCATEGORY_VALUE' => 'Subcategoría:',
  'LBL_DOC_STATUS' => 'Estat:',
  'LBL_LAST_REV_CREATOR' => 'Versió Creada Per:',
  'LBL_LASTEST_REVISION_NAME' => 'Nom de la última versió:',
  'LBL_SELECTED_REVISION_NAME' => 'Nom de la versió seleccionada:',
  'LBL_CONTRACT_STATUS' => 'Estat del contracte:',
  'LBL_CONTRACT_NAME' => 'Nom de Contracte:',
  'LBL_LAST_REV_DATE' => 'Data de Versió:',
  'LBL_DOWNNLOAD_FILE' => 'Arxiu de Descarrega:',
  'LBL_DET_RELATED_DOCUMENT' => 'Document Relacionat:',
  'LBL_DET_RELATED_DOCUMENT_VERSION' => 'Versió de Document Relacionat:',
  'LBL_DET_IS_TEMPLATE' => 'Plantilla? :',
  'LBL_DET_TEMPLATE_TYPE' => 'Tipus de Document:',
  'LBL_TEAM' => 'Equip:',
  'LBL_DOC_DESCRIPTION' => 'Descripció:',
  'LBL_DOC_ACTIVE_DATE' => 'Data de Publicació:',
  'LBL_DOC_EXP_DATE' => 'Data de Caducitat:',
  'LBL_LIST_FORM_TITLE' => 'Llista de Documents',
  'LBL_LIST_SUBCATEGORY' => 'Subcategoría',
  'LBL_LIST_REVISION' => 'Versió',
  'LBL_LIST_LAST_REV_CREATOR' => 'Publicat Per',
  'LBL_LIST_LAST_REV_DATE' => 'Data de Versió',
  'LBL_LIST_VIEW_DOCUMENT' => 'Veure',
  'LBL_LIST_DOWNLOAD' => 'Descarregar',
  'LBL_LIST_ACTIVE_DATE' => 'Data de Publicació',
  'LBL_LIST_EXP_DATE' => 'Data de Caducitat',
  'LBL_LIST_STATUS' => 'Estat',
  'LBL_LINKED_ID' => 'Id enllaç',
  'LBL_SELECTED_REVISION_ID' => 'Id de versió seleccionada',
  'LBL_LATEST_REVISION_ID' => 'Id d&#39;última versió',
  'LBL_SELECTED_REVISION_FILENAME' => 'Nom de l&#39;arxiu de versió seleccionada',
  'LBL_FILE_URL' => 'URL de l&#39;arxiu',
  'LBL_REVISIONS_PANEL' => 'Detell de la Versió',
  'LBL_REVISIONS_SUBPANEL' => 'Versions',
  'LBL_SF_DOCUMENT' => 'Nom de Document:',
  'LBL_SF_CATEGORY' => 'Categoría:',
  'LBL_SF_SUBCATEGORY' => 'Subcategoría:',
  'LBL_SF_ACTIVE_DATE' => 'Data de Publicació:',
  'LBL_SF_EXP_DATE' => 'Data de Caducitat:',
  'DEF_CREATE_LOG' => 'Document Creat',
  'ERR_DOC_NAME' => 'Nom de Document',
  'ERR_DOC_ACTIVE_DATE' => 'Data de Publicació',
  'ERR_DOC_EXP_DATE' => 'Data de Caducitat',
  'ERR_FILENAME' => 'Nom d´Arxiu',
  'ERR_DOC_VERSION' => 'Versió de Document',
  'ERR_DELETE_CONFIRM' => 'Desitja eliminar aquesta versió del document?',
  'ERR_DELETE_LATEST_VERSION' => 'No té permisos per eliminar l´última versió d´un document.',
  'LNK_NEW_MAIL_MERGE' => 'Combinar Correspondència',
  'LBL_MAIL_MERGE_DOCUMENT' => 'Plantilla per Combinar Correspondència:',
  'LBL_LIST_DOCUMENT_NAME' => 'Nom de Document',
  'LBL_LIST_IS_TEMPLATE' => 'Plantilla?',
  'LBL_LIST_TEMPLATE_TYPE' => 'Tipus de Document',
  'LBL_LIST_SELECTED_REVISION' => 'Versió Seleccionada',
  'LBL_LIST_LATEST_REVISION' => 'Última Versió',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Contractes Relacionats',
  'LBL_LAST_REV_CREATE_DATE' => 'Data de Creació de l´Última Versió',
  'LBL_CONTRACTS' => 'Contractes',
  'LBL_CREATED_USER' => 'Usuari Creat',
  'LBL_THEREVISIONS_SUBPANEL_TITLE' => 'Versions',
  'LBL_DOCUMENT_INFORMATION' => 'Visió General',
  'LBL_DOC_TYPE' => 'Font',
  'LBL_LIST_DOC_TYPE' => 'Font',
  'LBL_DOC_URL' => 'URL del document',
  'LBL_SEARCH_EXTERNAL_DOCUMENT' => 'Nom d´arxiu',
  'LBL_LIST_EXT_DOCUMENT_NAME' => 'Nom d´arxiu',
  'LBL_ACCOUNTS_SUBPANEL_TITLE' => 'Comptes',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Contactes',
  'LBL_OPPORTUNITIES_SUBPANEL_TITLE' => 'Oportunitats',
  'LBL_CASES_SUBPANEL_TITLE' => 'Casos',
  'LBL_BUGS_SUBPANEL_TITLE' => 'Incidències',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Pressuposts',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Productes',
);

