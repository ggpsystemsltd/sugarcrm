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
  'LBL_ID' => 'ID',
  'LBL_TEAM' => 'Takım',
  'LBL_TEAM_ID' => 'Takım ID',
  'LBL_ASSIGNED_TO_ID' => 'Atanan Kullanıcı ID',
  'LBL_ASSIGNED_TO_NAME' => 'Atanan Kişi',
  'LBL_DATE_ENTERED' => 'Oluşturulma Tarihi',
  'LBL_DATE_MODIFIED' => 'Değişiklik Tarihi',
  'LBL_MODIFIED' => 'Değiştiren',
  'LBL_MODIFIED_ID' => 'Değiştiren ID',
  'LBL_MODIFIED_NAME' => 'Değiştiren Kişi',
  'LBL_CREATED' => 'Oluşturan',
  'LBL_CREATED_ID' => 'Oluşturan ID',
  'LBL_DESCRIPTION' => 'Tanım',
  'LBL_DELETED' => 'Silindi',
  'LBL_NAME' => 'İsim',
  'LBL_SAVING' => 'Kaydediyor...',
  'LBL_SAVED' => 'Kaydedildi',
  'LBL_CREATED_USER' => 'Oluşturan Kullanıcı',
  'LBL_MODIFIED_USER' => 'Değiştiren Kullanıcı',
  'LBL_LIST_FORM_TITLE' => 'Sugar Bilgi Besleme Listesi',
  'LBL_MODULE_NAME' => 'Sugar Bilgi Beslemesi',
  'LBL_MODULE_TITLE' => 'Sugar Bilgi Beslemesi',
  'LBL_DASHLET_DISABLED' => 'Uyari: Sugar Bilgi Besleme sistemi pasif hale getirildi, tekrar aktif edilene kadar yeni bir bilgi kaydı yollanmayacak',
  'LBL_ADMIN_SETTINGS' => 'Sugar Bilgi Besleme Ayarları',
  'LBL_RECORDS_DELETED' => 'Daha önceki bütün Sugar Bilgi Besleme kayıtları silindi. Eğer Sugar Bilgi Besleme sistemi aktive edilirse, yeni kayıtlar otomatik olarak oluşturulacak.',
  'LBL_CONFIRM_DELETE_RECORDS' => 'Bütün Sugar Bilgi Besleme kayıtlarını silmek istediğinizden emin misiniz?',
  'LBL_FLUSH_RECORDS' => 'Bilgi Besleme Kayıtlarını Sil',
  'LBL_ENABLE_FEED' => 'Sugar Bilgi Beslemesini Etkinleştir',
  'LBL_ENABLE_MODULE_LIST' => 'Bilgi Beslemelerinin Aktive Edilecegi Modüller',
  'LBL_HOMEPAGE_TITLE' => 'Sugar Bilgi Beslemesi',
  'LNK_NEW_RECORD' => 'Sugar Bilgi Beslemesi Oluştur',
  'LNK_LIST' => 'Sugar Bilgi Beslemesi',
  'LBL_SEARCH_FORM_TITLE' => 'Sugar Bilgi Beslemesini Ara',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Tarihçeyi Gör',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Aktiviteler',
  'LBL_SUGAR_FEED_SUBPANEL_TITLE' => 'Sugar Bilgi Beslemesi',
  'LBL_NEW_FORM_TITLE' => 'Yeni Sugar Bilgi Beslemesi',
  'LBL_ALL' => 'Hepsi',
  'LBL_USER_FEED' => 'Kullanıcı Bilgi Beslemesi',
  'LBL_ENABLE_USER_FEED' => 'Kullanıcı Bilgi Beslemesini Aktifleştir',
  'LBL_TO' => 'Takıma Gönderilecek',
  'LBL_DONE' => 'Tamamlandı',
  'LBL_TITLE' => 'Başlık',
  'LBL_ROWS' => 'Satırlar',
  'LBL_CATEGORIES' => 'Modüller',
  'LBL_TIME_LAST_WEEK' => 'Önceki Hafta',
  'LBL_TIME_WEEKS' => 'Haftalar',
  'LBL_TIME_DAYS' => 'Günler',
  'LBL_TIME_YESTERDAY' => 'Dün',
  'LBL_TIME_HOURS' => 'Saat',
  'LBL_TIME_HOUR' => 'Saat',
  'LBL_TIME_MINUTES' => 'Dakika',
  'LBL_TIME_MINUTE' => 'Dakika',
  'LBL_TIME_SECONDS' => 'Saniye',
  'LBL_TIME_SECOND' => 'Saniye',
  'LBL_TIME_AGO' => 'önce',
  'CREATED_CONTACT' => '<b>YENİ</b> bir kontak oluşturuldu',
  'CREATED_OPPORTUNITY' => '<b>YENİ</b> bir fırsat oluşturuldu',
  'CREATED_CASE' => '<b>YENİ</b> bir talep oluşturuldu',
  'CREATED_LEAD' => '<b>YENİ</b> bir potansiyel oluşturuldu',
  'FOR' => 'için',
  'CLOSED_CASE' => 'bir talep <b>KAPATILDI</b>',
  'CONVERTED_LEAD' => 'bir potansiyel <b>DÖNÜŞTÜRÜLDÜ</b>',
  'WON_OPPORTUNITY' => 'bir fırsat <b>KAZANILDI</b>',
  'WITH' => 'ile birlikte',
  'LBL_LINK_TYPE_Link' => 'Bağlantı',
  'LBL_LINK_TYPE_Image' => 'Resim',
  'LBL_LINK_TYPE_YouTube' => 'YouTube™',
  'LBL_SELECT' => 'Seç',
  'LBL_POST' => 'Yolla',
);

