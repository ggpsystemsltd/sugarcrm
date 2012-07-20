<?php

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





if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


	
$mod_strings = array (
  'COLUMN_TITLE_HTML_CONTENT' => 'HTML',
  'LNK_NEW_CALL' => 'Tel.Araması Planla',
  'LNK_NEW_MEETING' => 'Toplantı Planlama',
  'LNK_NEW_TASK' => 'Görev Oluştur',
  'LNK_NEW_NOTE' => 'Not veya Ek oluştur',
  'LNK_NEW_EMAIL' => 'E-Posta Arşivle',
  'LNK_CALL_LIST' => 'Tel.Aramaları',
  'LNK_MEETING_LIST' => 'Toplantılar',
  'LNK_TASK_LIST' => 'Görevler',
  'LNK_NOTE_LIST' => 'Notlar',
  'LNK_EMAIL_LIST' => 'E-Postalar',
  'LBL_ADD_FIELD' => 'Alan Ekle:',
  'LBL_MODULE_SELECT' => 'Düzenlenecek Modül',
  'LBL_SEARCH_FORM_TITLE' => 'Modül Arama',
  'COLUMN_TITLE_NAME' => 'Alan Adı',
  'COLUMN_TITLE_DISPLAY_LABEL' => 'Etiketi Görüntüle',
  'COLUMN_TITLE_LABEL_VALUE' => 'Etiket Değeri',
  'COLUMN_TITLE_LABEL' => 'Sistem Etiketi',
  'COLUMN_TITLE_DATA_TYPE' => 'Veri Tipi',
  'COLUMN_TITLE_MAX_SIZE' => 'Maks Boyut',
  'COLUMN_TITLE_HELP_TEXT' => 'Yardım Metni',
  'COLUMN_TITLE_COMMENT_TEXT' => 'Yorum Metni',
  'COLUMN_TITLE_REQUIRED_OPTION' => 'Gereken Alan',
  'COLUMN_TITLE_DEFAULT_VALUE' => 'Varsayılan Değer',
  'COLUMN_TITLE_DEFAULT_EMAIL' => 'Varsayılan Değer',
  'COLUMN_TITLE_EXT1' => 'Ekstra Meta Alanı 1',
  'COLUMN_TITLE_EXT2' => 'Ekstra Meta Alanı 2',
  'COLUMN_TITLE_EXT3' => 'Ekstra Meta Alanı 3',
  'COLUMN_TITLE_FRAME_HEIGHT' => 'IFrame Yüksekliği',
  'COLUMN_TITLE_URL' => 'Varsayılan URL',
  'COLUMN_TITLE_AUDIT' => 'Denetleme',
  'COLUMN_TITLE_REPORTABLE' => 'Raporlanabilir',
  'COLUMN_TITLE_MIN_VALUE' => 'Min Değer',
  'COLUMN_TITLE_MAX_VALUE' => 'Mak Değer',
  'COLUMN_TITLE_LABEL_ROWS' => 'Satırlar',
  'COLUMN_TITLE_LABEL_COLS' => 'Kolonlar',
  'COLUMN_TITLE_DISPLAYED_ITEM_COUNT' => '# Öğe görüntülendi',
  'COLUMN_TITLE_AUTOINC_NEXT' => 'Oto Arttırma Sonraki Değer',
  'COLUMN_DISABLE_NUMBER_FORMAT' => 'Biçimi Etkisizleştir',
  'LBL_DROP_DOWN_LIST' => 'Açılır Liste Öğeleri',
  'LBL_RADIO_FIELDS' => 'Radyo Alanları',
  'LBL_MULTI_SELECT_LIST' => 'Çoklu Seçim Listesi',
  'COLUMN_TITLE_PRECISION' => 'Doğruluk',
  'MSG_DELETE_CONFIRM' => 'Bu öğeyi silmek istediğinizden emin misiniz?',
  'POPUP_INSERT_HEADER_TITLE' => 'Özel Alan Ekle',
  'POPUP_EDIT_HEADER_TITLE' => 'Özel Alanı Düzenle',
  'LNK_SELECT_CUSTOM_FIELD' => 'Özel Alan Seç',
  'LNK_REPAIR_CUSTOM_FIELD' => 'Özel Alanları Onar',
  'LBL_MODULE' => 'Modül',
  'COLUMN_TITLE_MASS_UPDATE' => 'Toplu Güncelleme',
  'COLUMN_TITLE_IMPORTABLE' => 'Alınabilir',
  'COLUMN_TITLE_DUPLICATE_MERGE' => 'İkili Birleşim',
  'LBL_LABEL' => 'Etiket',
  'LBL_DATA_TYPE' => 'Cinsi',
  'LBL_DEFAULT_VALUE' => 'Varsayılan Değer',
  'LBL_AUDITED' => 'Denetlenmiş',
  'LBL_REPORTABLE' => 'Raporlanabilir',
  'ERR_RESERVED_FIELD_NAME' => 'Saklanmış Anahtar Kelime',
  'ERR_SELECT_FIELD_TYPE' => 'Lütfen Alan Tipi Seçin',
  'LBL_BTN_ADD' => 'Ekle',
  'LBL_BTN_EDIT' => 'Düzenle',
  'LBL_GENERATE_URL' => 'URL oluştur',
  'LBL_DEPENDENT_CHECKBOX' => 'Bağımlı',
  'LBL_DEPENDENT_TRIGGER' => 'Tetikleyici',
  'LBL_CALCULATED' => 'Hesaplanan Değer',
  'LBL_FORMULA' => 'Formül',
  'LBL_DYNAMIC_VALUES_CHECKBOX' => 'Bağımlı',
  'LBL_BTN_EDIT_VISIBILITY' => 'Görünürlüğü Düzenle',
  'LBL_LINK_TARGET' => 'Linkin açıldığı yer',
  'LBL_IMAGE_WIDTH' => 'Genişlik',
  'LBL_IMAGE_HEIGHT' => 'Yükseklik',
  'LBL_IMAGE_BORDER' => 'Sınır',
);

