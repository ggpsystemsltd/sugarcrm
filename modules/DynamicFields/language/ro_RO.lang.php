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
  'LBL_DEPENDENT' => 'Dependent',
  'LBL_VISIBLE_IF' => 'Vizibil in cazul în care',
  'LBL_ENFORCED' => 'Fortat',
  'COLUMN_TITLE_HTML_CONTENT' => 'HTML',
  'LBL_DEPENDENT_CHECKBOX' => 'Dependent',
  'LBL_FORMULA' => 'Formula',
  'LBL_DYNAMIC_VALUES_CHECKBOX' => 'Dependent',
  'LNK_NEW_CALL' => 'jurnal apeluri',
  'LNK_NEW_MEETING' => 'orar intalniri',
  'LNK_NEW_TASK' => 'Creaza sarcina',
  'LNK_NEW_NOTE' => 'creaza nota sau atasament',
  'LNK_NEW_EMAIL' => 'arhiva email',
  'LNK_CALL_LIST' => 'Apeluri',
  'LNK_MEETING_LIST' => 'Intalniri',
  'LNK_TASK_LIST' => 'vezi lista sarcini',
  'LNK_NOTE_LIST' => 'Note',
  'LNK_EMAIL_LIST' => 'Email-uri',
  'LBL_ADD_FIELD' => 'Adauga domeniu',
  'LBL_MODULE_SELECT' => 'Editare modul',
  'LBL_SEARCH_FORM_TITLE' => 'Cauta Angajat',
  'COLUMN_TITLE_NAME' => 'Nume camp',
  'COLUMN_TITLE_DISPLAY_LABEL' => 'Arata Eticheta',
  'COLUMN_TITLE_LABEL_VALUE' => 'Valoare Eticheta',
  'COLUMN_TITLE_LABEL' => 'Eticheta Sistem',
  'COLUMN_TITLE_DATA_TYPE' => 'Tip de date',
  'COLUMN_TITLE_MAX_SIZE' => 'Dimensiune maxima',
  'COLUMN_TITLE_HELP_TEXT' => 'Ajutor',
  'COLUMN_TITLE_COMMENT_TEXT' => 'Comenteaza Text',
  'COLUMN_TITLE_REQUIRED_OPTION' => 'Camp obligatoriu',
  'COLUMN_TITLE_DEFAULT_VALUE' => 'Valoare implicita',
  'COLUMN_TITLE_DEFAULT_EMAIL' => 'Valoare implicita',
  'COLUMN_TITLE_EXT1' => 'Camp Extra Meta 1',
  'COLUMN_TITLE_EXT2' => 'Camp Extra Meta 2',
  'COLUMN_TITLE_EXT3' => 'Camp Extra Meta 3',
  'COLUMN_TITLE_FRAME_HEIGHT' => 'Inaltime ICadru',
  'COLUMN_TITLE_URL' => 'URL-ul prestabilit',
  'COLUMN_TITLE_AUDIT' => 'Bilant',
  'COLUMN_TITLE_REPORTABLE' => 'Raportabil',
  'COLUMN_TITLE_MIN_VALUE' => 'Valoare minima',
  'COLUMN_TITLE_MAX_VALUE' => 'Valoare maxima',
  'COLUMN_TITLE_LABEL_ROWS' => 'Randuri',
  'COLUMN_TITLE_LABEL_COLS' => 'Coloane',
  'COLUMN_TITLE_DISPLAYED_ITEM_COUNT' => 'Elemente afisate',
  'COLUMN_TITLE_AUTOINC_NEXT' => 'Creste automatic urmatoarea valuare',
  'COLUMN_DISABLE_NUMBER_FORMAT' => 'Dezactiveaza formatare',
  'COLUMN_TITLE_ENABLE_RANGE_SEARCH' => 'Activare Range Search',
  'LBL_DROP_DOWN_LIST' => 'Abandoneaza Lista',
  'LBL_RADIO_FIELDS' => 'Domenii radio',
  'LBL_MULTI_SELECT_LIST' => 'Selectati lista',
  'COLUMN_TITLE_PRECISION' => 'Precizie, exactitate',
  'MSG_DELETE_CONFIRM' => 'Esti sigur ca vrei sa stergi acest element?',
  'POPUP_INSERT_HEADER_TITLE' => 'Adauga campuri clienti',
  'POPUP_EDIT_HEADER_TITLE' => 'Modificati camp',
  'LNK_SELECT_CUSTOM_FIELD' => 'Selectati camp',
  'LNK_REPAIR_CUSTOM_FIELD' => 'Refaceti camp',
  'LBL_MODULE' => 'modul',
  'COLUMN_TITLE_MASS_UPDATE' => 'Actualizare in masa',
  'COLUMN_TITLE_IMPORTABLE' => 'Importabil',
  'COLUMN_TITLE_DUPLICATE_MERGE' => 'Duplica Imbinarea',
  'LBL_LABEL' => 'Eticheta',
  'LBL_DATA_TYPE' => 'Tip date',
  'LBL_DEFAULT_VALUE' => 'Valoare implicita',
  'LBL_AUDITED' => 'Verificat',
  'LBL_REPORTABLE' => 'Raportabil',
  'ERR_RESERVED_FIELD_NAME' => 'Cuvant cheie rezervat',
  'ERR_SELECT_FIELD_TYPE' => 'Va rugam selectati campul',
  'ERR_FIELD_NAME_ALREADY_EXISTS' => 'Nume camp există deja',
  'LBL_BTN_ADD' => 'Adauga',
  'LBL_BTN_EDIT' => 'Editeaza',
  'LBL_GENERATE_URL' => 'Geneareaza URL',
  'LBL_DEPENDENT_TRIGGER' => 'Declanseaza',
  'LBL_CALCULATED' => 'Calculat',
  'LBL_BTN_EDIT_VISIBILITY' => 'Modifica Vizibiliate',
  'LBL_LINK_TARGET' => 'Link deschis in',
  'LBL_IMAGE_WIDTH' => 'Latime',
  'LBL_IMAGE_HEIGHT' => 'Inaltime',
  'LBL_IMAGE_BORDER' => 'Margine',
  'COLUMN_TITLE_VALIDATE_US_FORMAT' => 'Format U.S',
);

