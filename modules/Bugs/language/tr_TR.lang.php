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
  'LBL_MODULE_NAME' => 'Hatalar',
  'LBL_MODULE_TITLE' => 'Hata İzleme : Ana Sayfa',
  'LBL_MODULE_ID' => 'Hatalar',
  'LBL_SEARCH_FORM_TITLE' => 'Hata Arama',
  'LBL_LIST_FORM_TITLE' => 'Hata Listesi',
  'LBL_NEW_FORM_TITLE' => 'Yeni Hata',
  'LBL_CONTACT_BUG_TITLE' => 'Kontak - Hata:',
  'LBL_SUBJECT' => 'Konu:',
  'LBL_BUG' => 'Hata:',
  'LBL_BUG_NUMBER' => 'Hata Numarası:',
  'LBL_NUMBER' => 'Numara:',
  'LBL_STATUS' => 'Durum:',
  'LBL_PRIORITY' => 'Öncelik:',
  'LBL_DESCRIPTION' => 'Tanım:',
  'LBL_CONTACT_NAME' => 'Kontak Adı:',
  'LBL_BUG_SUBJECT' => 'Hata Konusu:',
  'LBL_CONTACT_ROLE' => 'Rol:',
  'LBL_LIST_NUMBER' => 'No.',
  'LBL_LIST_SUBJECT' => 'Konu',
  'LBL_LIST_STATUS' => 'Durum',
  'LBL_LIST_PRIORITY' => 'Öncelik',
  'LBL_LIST_RELEASE' => 'Sürüm',
  'LBL_LIST_RESOLUTION' => 'Çözüm',
  'LBL_LIST_LAST_MODIFIED' => 'Son Değiştirilme Tarihi',
  'LBL_INVITEE' => 'Kontaklar',
  'LBL_TYPE' => 'Tipi:',
  'LBL_LIST_TYPE' => 'Tipi',
  'LBL_RESOLUTION' => 'Çözüm:',
  'LBL_RELEASE' => 'Sürüm:',
  'LNK_NEW_BUG' => 'Hata Raporla',
  'LNK_BUG_LIST' => 'Hataları Görüntüle',
  'NTC_REMOVE_INVITEE' => 'Bu kontağı hatadan silmek istediğinizden emin misiniz?',
  'NTC_REMOVE_ACCOUNT_CONFIRMATION' => 'Bu Müşteriden, bu hatayı kaldırmak istediğinizden emin misiniz?',
  'ERR_DELETE_RECORD' => 'Bu hatayı silmek için bir kayıt numarası belirtmelisiniz.',
  'LBL_LIST_MY_BUGS' => 'Bana Atanmış Hatalar',
  'LNK_IMPORT_BUGS' => 'Hata Verilerini Al',
  'LBL_FOUND_IN_RELEASE' => 'Bulunduğu Sürüm:',
  'LBL_FIXED_IN_RELEASE' => 'Düzeltilen Sürüm:',
  'LBL_LIST_FIXED_IN_RELEASE' => 'Düzeltilen Sürüm',
  'LBL_WORK_LOG' => 'İş Tarihçesi:',
  'LBL_SOURCE' => 'Kaynak:',
  'LBL_PRODUCT_CATEGORY' => 'Kategori:',
  'LBL_CREATED_BY' => 'Oluşturan:',
  'LBL_DATE_CREATED' => 'Oluşturulma Tarihi:',
  'LBL_MODIFIED_BY' => 'Son Değiştiren:',
  'LBL_DATE_LAST_MODIFIED' => 'Değiştirilme Tarihi:',
  'LBL_LIST_EMAIL_ADDRESS' => 'E-Posta Adresi',
  'LBL_LIST_CONTACT_NAME' => 'Kontak Adı',
  'LBL_LIST_ACCOUNT_NAME' => 'Müşteri Adı',
  'LBL_LIST_PHONE' => 'Telefon',
  'NTC_DELETE_CONFIRMATION' => 'Kontağı bu hatadan silmek istediğinizden emin misiniz?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Hata İzleme',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Aktiviteler',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Tarihçe',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontaklar',
  'LBL_ACCOUNTS_SUBPANEL_TITLE' => 'Müşteriler',
  'LBL_CASES_SUBPANEL_TITLE' => 'Talepler',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projeler',
  'LBL_SYSTEM_ID' => 'Sistem ID',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Atanan Kullanıcı',
  'LBL_ASSIGNED_TO_NAME' => 'Atanan Kişi',
  'LNK_BUG_REPORTS' => 'Hata Raporlarını gör',
  'LBL_SHOW_IN_PORTAL' => 'Portal\'da göster',
  'LBL_BUG_INFORMATION' => 'Hata Genel Bakışı',
);

