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
  'LBL_NEW_FILTER_BUTTON_KEY' => 'F',
  'LBL_NEW_TRIGGER_BUTTON_KEY' => 'T',
  'LBL_MODULE_NAME' => 'Koşullar',
  'LBL_MODULE_TITLE' => 'İş Akışı Tetikleyicileri: Ana Sayfa',
  'LBL_MODULE_SECTION_TITLE' => 'Belirtilen koşullar sağlandığında',
  'LBL_SEARCH_FORM_TITLE' => 'İş Akışı Tetikleyicisi',
  'LBL_LIST_FORM_TITLE' => 'Tetikleyici Listesi',
  'LBL_NEW_FORM_TITLE' => 'Tetikleyici Oluştur',
  'LBL_LIST_NAME' => 'Tanım:',
  'LBL_LIST_VALUE' => 'Değer:',
  'LBL_LIST_TYPE' => 'Tipi:',
  'LBL_LIST_EVAL' => 'Değerlendirme:',
  'LBL_LIST_FIELD' => 'Alan:',
  'LBL_NAME' => 'Tetikleyici İsmi:',
  'LBL_TYPE' => 'Tipi:',
  'LBL_EVAL' => 'Tetikleyici Değerlendirmesi:',
  'LBL_SHOW_PAST' => 'Eski Değeri Değiştir:',
  'LBL_SHOW' => 'Göster',
  'LNK_NEW_TRIGGER' => 'Tetikleyici Oluştur',
  'LNK_TRIGGER' => 'İş Akışı Tetikleyicileri',
  'LBL_LIST_STATEMEMT' => 'Aşağıdakine dayanarak olay tetikle:',
  'LBL_FILTER_LIST_STATEMEMT' => 'Aşağıdakine dayanarak nesneleri filtrele:',
  'NTC_REMOVE_TRIGGER' => 'Bu tetikleyiciyi kaldırmaktan emin misiniz?',
  'LNK_NEW_WORKFLOW' => 'İş Akışı Oluştur',
  'LNK_WORKFLOW' => 'İş Akışı Nesneleri',
  'LBL_ALERT_TEMPLATES' => 'Kalıpları İkaz Et',
  'LBL_TRIGGER' => '-',
  'LBL_FIELD' => 'alanını belirle',
  'LBL_VALUE' => 'değeri belirle',
  'LBL_RECORD' => 'Modülün',
  'LBL_COMPARE_SPECIFIC_TITLE' => 'Hedef modüldeki alan belli bir değer ile veya belli bir değerden başka bir değere değiştirildiğinde',
  'LBL_COMPARE_SPECIFIC_PART' => 'değiştiğinde ya da belli bir değeri aldığında',
  'LBL_COMPARE_SPECIFIC_PART_TIME' => 'LBL_COMPARE_SPECIFIC_PART_TIME',
  'LBL_COMPARE_CHANGE_TITLE' => 'Hedef modüldeki bir alan değiştiğinde',
  'LBL_COMPARE_CHANGE_PART' => 'değiştiğinde',
  'LBL_COMPARE_COUNT_TITLE' => 'Belirtilen',
  'LBL_COMPARE_ANY_TIME_TITLE' => 'Belirlenmiş süre içerisinde değişmeyen alan',
  'LBL_COMPARE_ANY_TIME_PART2' => 'bunun için değişmez',
  'LBL_COMPARE_ANY_TIME_PART3' => 'belirtilmiş zaman süresince',
  'LBL_FILTER_FIELD_TITLE' => 'Hedef modüldeki bir alan belirtilmiş bir değer içerdiğinde',
  'LBL_FILTER_FIELD_PART1' => '-',
  'LBL_FILTER_REL_FIELD_TITLE' => 'Hedef modül değiştiğinde ve ilişkili modüldeki bir alan belli bir değer içerdiğinde',
  'LBL_FILTER_REL_FIELD_PART1' => 'İlgili olan',
  'LBL_TRIGGER_RECORD_CHANGE_TITLE' => 'Hedef modül değiştiğinde',
  'LBL_FUTURE_TRIGGER' => 'Yeni',
  'LBL_PAST_TRIGGER' => 'Eski',
  'LBL_COUNT_TRIGGER1' => 'Toplam',
  'LBL_COUNT_TRIGGER1_2' => 'bu miktarla karşılaştır',
  'LBL_MODULE' => 'modül',
  'LBL_COUNT_TRIGGER2' => 'ilgili olanla filtrele',
  'LBL_COUNT_TRIGGER2_2' => 'sadece',
  'LBL_COUNT_TRIGGER3' => 'belirli filtrelemeye göre',
  'LBL_COUNT_TRIGGER4' => 'saniyeye göre filtrele',
  'LBL_NEW_FILTER_BUTTON_TITLE' => 'Filtre Oluştur [Alt+F]',
  'LBL_NEW_FILTER_BUTTON_LABEL' => 'Filtre Oluştur',
  'LBL_NEW_TRIGGER_BUTTON_TITLE' => 'Tetikleyici Oluştur[Alt+T]',
  'LBL_NEW_TRIGGER_BUTTON_LABEL' => 'Tetikleyici Oluştur',
  'LBL_LIST_FRAME_SEC' => 'Filtre:',
  'LBL_LIST_FRAME_PRI' => 'Tetikleyici:',
  'LBL_TRIGGER_FILTER_TITLE' => 'Tetikleyici Filtreleri',
  'LBL_TRIGGER_FORM_TITLE' => 'İş Akışı Yerine Getirme Koşulu Tanımla',
  'LBL_FILTER_FORM_TITLE' => 'İş Akış Koşulu Tanımla',
  'LBL_SPECIFIC_FIELD' => 'modülündeki belirtilmiş alanı filtrele',
  'LBL_APOSTROPHE_S' => 'modülü',
  'LBL_WHEN_VALUE1' => 'Alan değeri belirtilmiş alana eşit olduğu zaman:',
  'LBL_WHEN_VALUE2' => 'Alan değeri:',
  'LBL_SELECT_OPTION' => 'Lütfen bir tercih yapın.',
  'LBL_SELECT_TARGET_FIELD' => 'Lütfen hedeflenen bir alan seçin.',
  'LBL_SELECT_TARGET_MOD' => 'Lütfen ilişkili modül ile ilgisi olan bir hedef seçin.',
  'LBL_SPECIFIC_FIELD_LNK' => 'belirtilmiş alanı',
  'LBL_MUST_SELECT_VALUE' => 'Bu alan için bir değer seçmelisiniz',
  'LBL_SELECT_AMOUNT' => 'Miktarı seçmelisiniz',
  'LBL_SELECT_1ST_FILTER' => 'Geçerli birinci filtre alanını seçmelisiniz',
  'LBL_SELECT_2ND_FILTER' => 'Geçerli ikinci filtre alanını seçmelisiniz',
);

