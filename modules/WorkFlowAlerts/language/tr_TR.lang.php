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
  'LBL_ADDRESS_CC' => 'cc:',
  'LBL_BLANK' => '',
  'LBL_MODULE_NAME' => 'Alıcı Listesini Uyar',
  'LBL_MODULE_TITLE' => 'Alıcılar: Ana Sayfa',
  'LBL_SEARCH_FORM_TITLE' => 'İş Akışı Alıcısı Ara:',
  'LBL_LIST_FORM_TITLE' => 'Alıcı Listesi',
  'LBL_NEW_FORM_TITLE' => 'İş Akış Alıcısı Oluştur',
  'LBL_LIST_USER_TYPE' => 'Kullanıcı Tipi',
  'LBL_LIST_ARRAY_TYPE' => 'Aksiyon Tipi',
  'LBL_LIST_RELATE_TYPE' => 'İlişki Tipi',
  'LBL_LIST_ADDRESS_TYPE' => 'Adres Tipi',
  'LBL_LIST_FIELD_VALUE' => 'Kullanıcı',
  'LBL_LIST_REL_MODULE1' => 'İlgili Modül',
  'LBL_LIST_REL_MODULE2' => 'İlgili Modül ile İlişkili',
  'LBL_LIST_WHERE_FILTER' => 'Durum',
  'LBL_USER_TYPE' => 'Kullanıcı Tipi:',
  'LBL_ARRAY_TYPE' => 'Aksiyon Tipi:',
  'LBL_RELATE_TYPE' => 'İlişki Tipi:',
  'LBL_WHERE_FILTER' => 'Durum:',
  'LBL_FIELD_VALUE' => 'Seçilmiş Kullanıcı:',
  'LBL_REL_MODULE1' => 'İlgili Modül:',
  'LBL_REL_MODULE2' => 'İlgili Modül ile İlişkili:',
  'LBL_CUSTOM_USER' => 'Kullanıcı:',
  'LNK_NEW_WORKFLOW' => 'İş Akışı Oluştur',
  'LNK_WORKFLOW' => 'İş Akışı Nesneleri',
  'LBL_LIST_STATEMENT' => 'Alıcıları Uyar:',
  'LBL_LIST_STATEMENT_CONTENT' => 'Aşağıdaki alıcıya uyarı gönder:',
  'LBL_ALERT_CURRENT_USER' => 'Hedef ile ilişkilendirilmiş kullanıcı',
  'LBL_ALERT_CURRENT_USER_TITLE' => 'Hedef modül ile ilişkilendirilmiş kullanıcı',
  'LBL_ALERT_REL_USER' => 'İlgili ile ilişkilendirilmiş kullanıcı',
  'LBL_ALERT_REL_USER_TITLE' => 'İlgili modül ile ilişkilendirilmiş kullanıcı',
  'LBL_ALERT_REL_USER_CUSTOM' => 'İlgili ile ilişkilendirilmiş alıcı',
  'LBL_ALERT_REL_USER_CUSTOM_TITLE' => 'İlgili modül ile ilişkilendirilmiş alıcı',
  'LBL_ALERT_TRIG_USER_CUSTOM' => 'Hedef modül ile ilişkilendirilmiş alıcı',
  'LBL_ALERT_TRIG_USER_CUSTOM_TITLE' => 'Hedef modül ile ilişkilendirilmiş alıcı',
  'LBL_ALERT_SPECIFIC_USER' => 'Belirtilen',
  'LBL_ALERT_SPECIFIC_USER_TITLE' => 'Belirtilen bir kullanıcı',
  'LBL_ALERT_SPECIFIC_TEAM' => 'Belirtilen tüm kullanıcılar',
  'LBL_ALERT_SPECIFIC_TEAM_TITLE' => 'Belirtilen takımdaki tüm kullanıcılar',
  'LBL_ALERT_SPECIFIC_ROLE' => 'Belirtilen tüm kullanıcılar',
  'LBL_ALERT_SPECIFIC_ROLE_TITLE' => 'Belirtilen görevdeki tüm kullanıcılar',
  'LBL_ALERT_SPECIFIC_TEAM_TARGET_TITLE' => 'Hedef modül ile ilgili takım üyeleri',
  'LBL_ALERT_SPECIFIC_TEAM_TARGET' => 'Hedef modül ile ilgili takım(lara)a bağlı olan kullanıcılar',
  'LBL_ALERT_LOGIN_USER_TITLE' => 'Çalıştırma sırasında oturum açmış kullanıcı',
  'LBL_RECORD' => 'Modül',
  'LBL_TEAM' => 'Takım',
  'LBL_USER' => 'Kullanıcı',
  'LBL_USER_MANAGER' => 'kullanıcının yöneticisi',
  'LBL_ROLE' => 'görev',
  'LBL_SEND_EMAIL' => 'e-posta gönder:',
  'LBL_USER1' => 'kaydı oluşturan',
  'LBL_USER2' => 'kaydı en son değiştiren',
  'LBL_USER3' => 'Şimdiki',
  'LBL_USER3b' => 'sisteminin.',
  'LBL_USER4' => 'kaydı atanmış',
  'LBL_USER5' => 'kayda atanan kişi',
  'LBL_ADDRESS_TO' => 'kime:',
  'LBL_ADDRESS_BCC' => 'gizli:',
  'LBL_ADDRESS_TYPE' => 'kullanan adres',
  'LBL_ADDRESS_TYPE_TARGET' => 'tipi',
  'LBL_ALERT_REL1' => 'İlgili Modül:',
  'LBL_ALERT_REL2' => 'İlgili Modül ile İlişkili:',
  'LBL_NEXT_BUTTON' => 'İleri',
  'LBL_PREVIOUS_BUTTON' => 'Önceki',
  'NTC_REMOVE_ALERT_USER' => 'Bu alarm alıcısını kaldırmak istediğinizden emin misiniz?',
  'LBL_REL_CUSTOM_STRING' => 'Özel e-posta ve isim alanlarını seç',
  'LBL_REL_CUSTOM' => 'Özel E-posta Alanı Seç:',
  'LBL_REL_CUSTOM2' => 'Alan',
  'LBL_AND' => 've Alan İsmi:',
  'LBL_REL_CUSTOM3' => 'Alan',
  'LBL_FILTER_CUSTOM' => '(İlave Filtre) İlgili modülü detaylara göre filtrele',
  'LBL_FIELD' => 'Alan',
  'LBL_SPECIFIC_FIELD' => 'alan',
  'LBL_FILTER_BY' => '(İlave Filtre) İlgili modülü filtrele',
  'LBL_MODULE_NAME_INVITE' => 'Davetli Listesi',
  'LBL_LIST_STATEMENT_INVITE' => 'Toplantı/Arama Davetlileri:',
  'LBL_SELECT_VALUE' => 'Geçerli bir değer seçmelisiniz.',
  'LBL_SELECT_NAME' => 'Özel alan ismi seçmelisiniz',
  'LBL_SELECT_EMAIL' => 'Özel e-posta alanı seçmelisiniz',
  'LBL_SELECT_FILTER' => 'Filtrelemek için alan seçmelisiniz',
  'LBL_SELECT_NAME_EMAIL' => 'İsim ve e-posta alanlarını seçmelisiniz.',
  'LBL_PLEASE_SELECT' => 'Lütfen Seçiniz',
);

