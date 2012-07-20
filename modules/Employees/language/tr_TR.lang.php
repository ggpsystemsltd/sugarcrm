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
  'LBL_NEW_EMPLOYEE_BUTTON_KEY' => 'N',
  'LBL_CREATE_USER_BUTTON_KEY' => 'N',
  'LBL_MODULE_NAME' => 'Çalışanlar',
  'LBL_MODULE_TITLE' => 'Çalışanlar: Ana Sayfa',
  'LBL_SEARCH_FORM_TITLE' => 'Çalışan Arama',
  'LBL_LIST_FORM_TITLE' => 'Çalışanlar',
  'LBL_NEW_FORM_TITLE' => 'Yeni Çalışan',
  'LBL_EMPLOYEE' => 'Çalışanlar:',
  'LBL_LOGIN' => 'Oturum Aç',
  'LBL_RESET_PREFERENCES' => 'Varsayılan Ayarları Geri Yükle',
  'LBL_TIME_FORMAT' => 'Zaman Formatı:',
  'LBL_DATE_FORMAT' => 'Tarih Formatı:',
  'LBL_TIMEZONE' => 'Geçerli Saat:',
  'LBL_CURRENCY' => 'Para Birimi:',
  'LBL_LIST_NAME' => 'İsim',
  'LBL_LIST_LAST_NAME' => 'Soyadı',
  'LBL_LIST_EMPLOYEE_NAME' => 'Çalışan Adı',
  'LBL_LIST_DEPARTMENT' => 'Departman',
  'LBL_LIST_REPORTS_TO_NAME' => 'Rapor Edilen Kişi',
  'LBL_LIST_EMAIL' => 'E-Posta',
  'LBL_LIST_PRIMARY_PHONE' => 'Asıl Telefon',
  'LBL_LIST_USER_NAME' => 'Kullanıcı Adı',
  'LBL_LIST_ADMIN' => 'Yönetici',
  'LBL_NEW_EMPLOYEE_BUTTON_TITLE' => 'Yeni Çalışan [Alt+N]',
  'LBL_NEW_EMPLOYEE_BUTTON_LABEL' => 'Yeni Çalışan',
  'LBL_ERROR' => 'Hata:',
  'LBL_PASSWORD' => 'Şifre:',
  'LBL_EMPLOYEE_NAME' => 'Çalışan Adı:',
  'LBL_USER_NAME' => 'Kullanıcı Adı:',
  'LBL_FIRST_NAME' => 'İlk Adı:',
  'LBL_LAST_NAME' => 'Soyadı:',
  'LBL_EMPLOYEE_SETTINGS' => 'Çalışan Ayarları',
  'LBL_THEME' => 'Tema:',
  'LBL_LANGUAGE' => 'Dil:',
  'LBL_ADMIN' => 'Yönetici:',
  'LBL_EMPLOYEE_INFORMATION' => 'Çalışan Bilgileri',
  'LBL_OFFICE_PHONE' => 'Ofis Telefonu:',
  'LBL_REPORTS_TO' => 'Rapor Edilen Kişi ID:',
  'LBL_REPORTS_TO_NAME' => 'Rapor Edilen Kişi',
  'LBL_OTHER_PHONE' => 'Diğer Telefon:',
  'LBL_OTHER_EMAIL' => 'Diğer E-Posta:',
  'LBL_NOTES' => 'Notlar:',
  'LBL_DEPARTMENT' => 'Departman:',
  'LBL_TITLE' => 'Ünvan:',
  'LBL_ANY_ADDRESS' => 'Adres:',
  'LBL_ANY_PHONE' => 'Diğer Telefon:',
  'LBL_ANY_EMAIL' => 'Diğer E-Posta:',
  'LBL_ADDRESS' => 'Addres:',
  'LBL_CITY' => 'Şehir:',
  'LBL_STATE' => 'Eyalet:',
  'LBL_POSTAL_CODE' => 'Posta Kodu:',
  'LBL_COUNTRY' => 'Ülke:',
  'LBL_NAME' => 'İsim:',
  'LBL_MOBILE_PHONE' => 'Cep Telefonu:',
  'LBL_OTHER' => 'Diğer Telefon:',
  'LBL_FAX' => 'Faks:',
  'LBL_EMAIL' => 'E-Posta Adresi:',
  'LBL_HOME_PHONE' => 'Ev Telefonu:',
  'LBL_WORK_PHONE' => 'İş Telefonu:',
  'LBL_ADDRESS_INFORMATION' => 'Adres Bilgisi',
  'LBL_EMPLOYEE_STATUS' => 'İş Durumu:',
  'LBL_PRIMARY_ADDRESS' => 'Asıl Adres:',
  'LBL_SAVED_SEARCH' => 'Yerleşim Opsiyonları',
  'LBL_CREATE_USER_BUTTON_TITLE' => 'Kullanıcı Oluştur [Alt+N]',
  'LBL_CREATE_USER_BUTTON_LABEL' => 'Kullanıcı Oluştur',
  'LBL_FAVORITE_COLOR' => 'Favori Renk:',
  'LBL_MESSENGER_ID' => 'IM Adı:',
  'LBL_MESSENGER_TYPE' => 'IM Tipi:',
  'ERR_EMPLOYEE_NAME_EXISTS_1' => 'Çalışan adı',
  'ERR_EMPLOYEE_NAME_EXISTS_2' => 'zaten mevcut. Aynı isme sahip birden fazla çalışana izin verilmiyor. Yeni bir çalışan ismi veriniz.',
  'ERR_LAST_ADMIN_1' => 'Çalışan adı "',
  'ERR_LAST_ADMIN_2' => '" sistem yönetimi erişimine sahip son kullanıcı. En azından bir çalışan sistem yöneticisi olmalıdır.',
  'LNK_NEW_EMPLOYEE' => 'Çalışan Oluştur',
  'LNK_EMPLOYEE_LIST' => 'Çalışanlar',
  'ERR_DELETE_RECORD' => 'Müşteriyi silmek için bir kayıt no\'su girmelisiniz.',
  'LBL_DEFAULT_TEAM' => 'Varsayılan Takım:',
  'LBL_DEFAULT_TEAM_TEXT' => 'Yeni kayıtlar için varsayılan takımı seçer',
  'LBL_MY_TEAMS' => 'Takımlarım',
  'LBL_LIST_DESCRIPTION' => 'Tanım',
  'LNK_EDIT_TABS' => 'Sekmeleri Düzenle',
  'NTC_REMOVE_TEAM_MEMBER_CONFIRMATION' => 'Bu çalışanın üyeliğini kaldırmak istediğinizden emin misiniz?',
  'LBL_LIST_EMPLOYEE_STATUS' => 'Çalışan Durumu',
  'LBL_SUGAR_LOGIN' => 'Sugar Kullanıcısı',
  'LBL_RECEIVE_NOTIFICATIONS' => 'Atamada haberdar et',
  'LBL_IS_ADMIN' => 'Sistem Yöneticisi',
  'LBL_GROUP' => 'Grup Kullanıcısı',
  'LBL_PORTAL_ONLY' => 'Yalnızca Portal Erişimi Olan Kullanıcı',
  'LBL_PHOTO' => 'Resim',
  'LBL_DELETE_USER_CONFIRM' => 'Bu Çalışan aynı zamanda bir kullanıcıdır. Çalışanın kaydı silindiği taktirde Kullanıcı kaydı da silinecektir ve Kullanıcı uygulumaya bir daha erişemeyecektir.Bu kaydı silerek devam etmek istiyor musunuz?',
  'LBL_DELETE_EMPLOYEE_CONFIRM' => 'Bu çalışanı silmek istediğinizden emin misiniz?',
);

