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
  'LBL_DEPENDENT' => 'Függő',
  'LBL_VISIBLE_IF' => 'Látható ha',
  'LBL_ENFORCED' => 'Kikényszerített',
  'COLUMN_TITLE_HTML_CONTENT' => 'HTML',
  'LNK_NEW_CALL' => 'Hívás napló',
  'LNK_NEW_MEETING' => 'Találkozó ütemezés',
  'LNK_NEW_TASK' => 'Új feladat létrehozása',
  'LNK_NEW_NOTE' => 'Feljegyzés vagy csatolmány létrehozása',
  'LNK_NEW_EMAIL' => 'Email archiválás',
  'LNK_CALL_LIST' => 'Hívások',
  'LNK_MEETING_LIST' => 'Találkozók',
  'LNK_TASK_LIST' => 'Feladatok',
  'LNK_NOTE_LIST' => 'Feljegyzések',
  'LNK_EMAIL_LIST' => 'Emailek',
  'LBL_ADD_FIELD' => 'Mező hozzáadása:',
  'LBL_MODULE_SELECT' => 'Modul választása szerkeszhez',
  'LBL_SEARCH_FORM_TITLE' => 'Modul keresés',
  'COLUMN_TITLE_NAME' => 'Mező neve',
  'COLUMN_TITLE_DISPLAY_LABEL' => 'Címke megjelenítése',
  'COLUMN_TITLE_LABEL_VALUE' => 'Címke érték',
  'COLUMN_TITLE_LABEL' => 'Rendszer címke',
  'COLUMN_TITLE_DATA_TYPE' => 'Adattípus',
  'COLUMN_TITLE_MAX_SIZE' => 'Maximális méret',
  'COLUMN_TITLE_HELP_TEXT' => 'Súgószöveg',
  'COLUMN_TITLE_COMMENT_TEXT' => 'Hozzászólás szöveg',
  'COLUMN_TITLE_REQUIRED_OPTION' => 'Kötelező mező',
  'COLUMN_TITLE_DEFAULT_VALUE' => 'Alapértelmezett érték',
  'COLUMN_TITLE_DEFAULT_EMAIL' => 'Alapértelmezett érték',
  'COLUMN_TITLE_EXT1' => 'Extra Meta mező 1',
  'COLUMN_TITLE_EXT2' => 'Extra Meta mező 2',
  'COLUMN_TITLE_EXT3' => 'Extra Meta mező 3',
  'COLUMN_TITLE_FRAME_HEIGHT' => 'iFrame magasság',
  'COLUMN_TITLE_URL' => 'Alapértelmezett URL',
  'COLUMN_TITLE_AUDIT' => 'Ellenőrzés',
  'COLUMN_TITLE_REPORTABLE' => 'Megjeleníthető',
  'COLUMN_TITLE_MIN_VALUE' => 'Minimum érték',
  'COLUMN_TITLE_MAX_VALUE' => 'Maximum érték',
  'COLUMN_TITLE_LABEL_ROWS' => 'Sorok',
  'COLUMN_TITLE_LABEL_COLS' => 'Oszlopok',
  'COLUMN_TITLE_DISPLAYED_ITEM_COUNT' => '# db tétel megjelenítve',
  'COLUMN_TITLE_AUTOINC_NEXT' => 'Automatikus növekmény a következő értékre',
  'COLUMN_DISABLE_NUMBER_FORMAT' => 'Formátum letiltása',
  'COLUMN_TITLE_ENABLE_RANGE_SEARCH' => 'Engedélyezni a tartományra keresést',
  'LBL_DROP_DOWN_LIST' => 'Legördülő listából',
  'LBL_RADIO_FIELDS' => 'Rádió-gombok',
  'LBL_MULTI_SELECT_LIST' => 'Többszörösen választható lista',
  'COLUMN_TITLE_PRECISION' => 'Pontosság',
  'MSG_DELETE_CONFIRM' => 'Biztosan törölni akarja ezt a tételt?',
  'POPUP_INSERT_HEADER_TITLE' => 'Egyedi mezőt hozzáad',
  'POPUP_EDIT_HEADER_TITLE' => 'Egyedi mező szerkesztése',
  'LNK_SELECT_CUSTOM_FIELD' => 'Válasszon egyedi mezőt',
  'LNK_REPAIR_CUSTOM_FIELD' => 'Egyéni mezők javítása',
  'LBL_MODULE' => 'Modul',
  'COLUMN_TITLE_MASS_UPDATE' => 'Tömeges frissítés',
  'COLUMN_TITLE_IMPORTABLE' => 'Importálható',
  'COLUMN_TITLE_DUPLICATE_MERGE' => 'Duplikált tételek egyesítése',
  'LBL_LABEL' => 'Címke',
  'LBL_DATA_TYPE' => 'Adattípus',
  'LBL_DEFAULT_VALUE' => 'Alapértelmezett érték',
  'LBL_AUDITED' => 'Ellenőrzés',
  'LBL_REPORTABLE' => 'Megjeleníthető',
  'ERR_RESERVED_FIELD_NAME' => 'Foglalt kulcsszó',
  'ERR_SELECT_FIELD_TYPE' => 'Kérem, válasszon egy mezőtípust',
  'ERR_FIELD_NAME_ALREADY_EXISTS' => 'Mezőnév már létezik',
  'LBL_BTN_ADD' => 'Hozzáadás',
  'LBL_BTN_EDIT' => 'Szerkesztés',
  'LBL_GENERATE_URL' => 'URL létrehozása',
  'LBL_DEPENDENT_CHECKBOX' => 'Függő',
  'LBL_DEPENDENT_TRIGGER' => 'Indító',
  'LBL_CALCULATED' => 'Számított érték',
  'LBL_FORMULA' => 'Szabály',
  'LBL_DYNAMIC_VALUES_CHECKBOX' => 'Függő',
  'LBL_BTN_EDIT_VISIBILITY' => 'Láthatóság szerkesztése',
  'LBL_LINK_TARGET' => 'Nyissa meg a linket a',
  'LBL_IMAGE_WIDTH' => 'Szélesség',
  'LBL_IMAGE_HEIGHT' => 'Magasság',
  'LBL_IMAGE_BORDER' => 'Keret',
  'COLUMN_TITLE_VALIDATE_US_FORMAT' => 'Amerikai formátum',
);

