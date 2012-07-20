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
  'LBL_MODULE_NAME' => 'Dokumentumok',
  'LBL_MODULE_TITLE' => 'Dokumentumok: Főoldal',
  'LNK_NEW_DOCUMENT' => 'Dokumentum létrehozása',
  'LNK_DOCUMENT_LIST' => 'Dokumentumok megtekintése',
  'LBL_DOC_REV_HEADER' => 'Dokumentum felülvizsgálata',
  'LBL_SEARCH_FORM_TITLE' => 'Dokumentum keresése',
  'LBL_DOCUMENT_ID' => 'Dokumentum azonosító',
  'LBL_NAME' => 'Dokumentum neve',
  'LBL_DESCRIPTION' => 'Leírás',
  'LBL_CATEGORY' => 'Kategória',
  'LBL_SUBCATEGORY' => 'Alkategória',
  'LBL_STATUS' => 'Állapot',
  'LBL_CREATED_BY' => 'Létrehozta',
  'LBL_DATE_ENTERED' => 'Dátum rögzítve',
  'LBL_DATE_MODIFIED' => 'Dátum módosítva',
  'LBL_DELETED' => 'Törölve',
  'LBL_MODIFIED' => 'Módosító azonosítója',
  'LBL_MODIFIED_USER' => 'Módosította',
  'LBL_CREATED' => 'Létrehozta',
  'LBL_REVISIONS' => 'Módosítások',
  'LBL_RELATED_DOCUMENT_ID' => 'Kapcsolódó dokumentum azonosítója',
  'LBL_RELATED_DOCUMENT_REVISION_ID' => 'Kapcsolódó dokumentum módosítás azonosítója',
  'LBL_IS_TEMPLATE' => 'Ez egy sablon',
  'LBL_TEMPLATE_TYPE' => 'Dokumentum típus',
  'LBL_ASSIGNED_TO_NAME' => 'Felelős:',
  'LBL_REVISION_NAME' => 'Felülvizsgálat száma',
  'LBL_MIME' => 'Mime típus',
  'LBL_REVISION' => 'Módosítás',
  'LBL_DOCUMENT' => 'Kapcsolódó dokumentum',
  'LBL_LATEST_REVISION' => 'Utolsó módosítás',
  'LBL_CHANGE_LOG' => 'Változásnapló',
  'LBL_ACTIVE_DATE' => 'Közzététel dátuma',
  'LBL_EXPIRATION_DATE' => 'Lejárat dátuma',
  'LBL_FILE_EXTENSION' => 'Fájl kiterjesztése',
  'LBL_LAST_REV_MIME_TYPE' => 'Utolsó módosítás MIME típusa',
  'LBL_CAT_OR_SUBCAT_UNSPEC' => 'Nincs részletezve',
  'LBL_HOMEPAGE_TITLE' => 'Dokumentumaim',
  'LBL_NEW_FORM_TITLE' => 'Új dokumentum',
  'LBL_DOC_NAME' => 'Dokumentum neve:',
  'LBL_FILENAME' => 'Fájlnév:',
  'LBL_LIST_FILENAME' => 'Fájlnév',
  'LBL_DOC_VERSION' => 'Módosítás:',
  'LBL_CATEGORY_VALUE' => 'Kategória:',
  'LBL_LIST_CATEGORY' => 'Kategória',
  'LBL_SUBCATEGORY_VALUE' => 'Alkategória:',
  'LBL_DOC_STATUS' => 'Állapot:',
  'LBL_LAST_REV_CREATOR' => 'A módosítást készítette:',
  'LBL_LASTEST_REVISION_NAME' => 'Utolsó módosítás neve:',
  'LBL_SELECTED_REVISION_NAME' => 'Kiválasztott módosítás neve:',
  'LBL_CONTRACT_STATUS' => 'Szerződés státusz:',
  'LBL_CONTRACT_NAME' => 'Szeződés neve:',
  'LBL_LAST_REV_DATE' => 'Módosítás dátuma:',
  'LBL_DOWNNLOAD_FILE' => 'Fájl letöltés:',
  'LBL_DET_RELATED_DOCUMENT' => 'Kapcsolódó dokumentum:',
  'LBL_DET_RELATED_DOCUMENT_VERSION' => 'Kapcsolódó dokumentum módosítása:',
  'LBL_DET_IS_TEMPLATE' => 'Sablon?:',
  'LBL_DET_TEMPLATE_TYPE' => 'Dokumentum típusa:',
  'LBL_TEAM' => 'Csoport:',
  'LBL_DOC_DESCRIPTION' => 'Leírás:',
  'LBL_DOC_ACTIVE_DATE' => 'Közzététel dátuma:',
  'LBL_DOC_EXP_DATE' => 'Lejárat dátuma:',
  'LBL_LIST_FORM_TITLE' => 'Dokumentum lista',
  'LBL_LIST_DOCUMENT' => 'Dokumentum',
  'LBL_LIST_SUBCATEGORY' => 'Alkategória',
  'LBL_LIST_REVISION' => 'Módosítás',
  'LBL_LIST_LAST_REV_CREATOR' => 'Közzétette',
  'LBL_LIST_LAST_REV_DATE' => 'Módosítás dátuma',
  'LBL_LIST_VIEW_DOCUMENT' => 'Mutat',
  'LBL_LIST_DOWNLOAD' => 'Letöltés',
  'LBL_LIST_ACTIVE_DATE' => 'Közzététel dátuma',
  'LBL_LIST_EXP_DATE' => 'Lejárat dátuma',
  'LBL_LIST_STATUS' => 'Állapot',
  'LBL_LINKED_ID' => 'Kapcsolódás azonosító',
  'LBL_SELECTED_REVISION_ID' => 'Kiválasztott módosítás azonosítója',
  'LBL_LATEST_REVISION_ID' => 'Legutóbbi módosítás azonosítója',
  'LBL_SELECTED_REVISION_FILENAME' => 'Kiválasztott módosítás fájlneve',
  'LBL_FILE_URL' => 'Fájl URL',
  'LBL_REVISIONS_PANEL' => 'Módosítás részletei',
  'LBL_REVISIONS_SUBPANEL' => 'Módosítások',
  'LBL_SF_DOCUMENT' => 'Dokumentum neve:',
  'LBL_SF_CATEGORY' => 'Kategória:',
  'LBL_SF_SUBCATEGORY' => 'Alkategória',
  'LBL_SF_ACTIVE_DATE' => 'Közzététel dátuma:',
  'LBL_SF_EXP_DATE' => 'Lejárat dátuma:',
  'DEF_CREATE_LOG' => 'Dokumentum létrehozva',
  'ERR_DOC_NAME' => 'Dokumentum neve',
  'ERR_DOC_ACTIVE_DATE' => 'Közzététel dátuma',
  'ERR_DOC_EXP_DATE' => 'Lejárat dátuma',
  'ERR_FILENAME' => 'Fájlnév',
  'ERR_DOC_VERSION' => 'Dokumentum verziója',
  'ERR_DELETE_CONFIRM' => 'Biztos, hogy törölni akarja ezt a dokumentum módosítást?',
  'ERR_DELETE_LATEST_VERSION' => 'Nincs jogosultsága törölni a dokumentum utolsó módosítását.',
  'LNK_NEW_MAIL_MERGE' => 'Körlevél',
  'LBL_MAIL_MERGE_DOCUMENT' => 'Körlevél Sablon:',
  'LBL_TREE_TITLE' => 'Dokumentumok',
  'LBL_LIST_DOCUMENT_NAME' => 'Dokumentum neve',
  'LBL_LIST_IS_TEMPLATE' => 'Sablon?',
  'LBL_LIST_TEMPLATE_TYPE' => 'Dokumentum típus',
  'LBL_LIST_SELECTED_REVISION' => 'Kiválasztott módosítás',
  'LBL_LIST_LATEST_REVISION' => 'Utolsó módosítás',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Kapcsolódó szerződések',
  'LBL_LAST_REV_CREATE_DATE' => 'Utolsó módosítás létrehozásának dátuma',
  'LBL_CONTRACTS' => 'Szerződések',
  'LBL_CREATED_USER' => 'Létrehozott felhasználó',
  'LBL_THEREVISIONS_SUBPANEL_TITLE' => 'Visszaállítások',
  'LBL_DOCUMENT_INFORMATION' => 'Dokumentum áttekintése',
  'LBL_DOC_ID' => 'Dokumentum Forrás azonosító',
  'LBL_DOC_TYPE' => 'Forrás:',
  'LBL_LIST_DOC_TYPE' => 'Forrás:',
  'LBL_DOC_TYPE_POPUP' => 'Válassza ki a forrást ahonnan feltölti a dokumentumot, és ahonnan elérhető lesz.',
  'LBL_DOC_URL' => 'Dokumentum forrás URL',
  'LBL_SEARCH_EXTERNAL_DOCUMENT' => 'Dokumentum neve:',
  'LBL_EXTERNAL_DOCUMENT_NOTE' => 'Az alábbi listában az első 20 legutóbb módosított fájl található csökkenő sorrendben. Használja a Keresés gombot egyéb fájlok megtalálásához.',
  'LBL_LIST_EXT_DOCUMENT_NAME' => 'Fájlnév',
  'LBL_ACCOUNTS_SUBPANEL_TITLE' => 'Ügyfelek',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kapcsolatok',
  'LBL_OPPORTUNITIES_SUBPANEL_TITLE' => 'Lehetőségek',
  'LBL_CASES_SUBPANEL_TITLE' => 'Esetek',
  'LBL_BUGS_SUBPANEL_TITLE' => 'Hibák',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Árajánlatok',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Termékek',
);

