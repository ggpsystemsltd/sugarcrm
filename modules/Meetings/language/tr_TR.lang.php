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
  'LBL_COLON' => ':',
  'LBL_SEND_BUTTON_KEY' => 'I',
  'ERR_DELETE_RECORD' => 'Toplantının silinebilmesi için bir kayıt numarası belirtilmelidir.',
  'LBL_ACCEPT_THIS' => 'Kabul?',
  'LBL_ADD_BUTTON' => 'Ekle',
  'LBL_ADD_INVITEE' => 'Davetlileri Ekle',
  'LBL_CONTACT_NAME' => 'Kontak:',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontaklar',
  'LBL_CREATED_BY' => 'Oluşturan',
  'LBL_DATE_END' => 'Bitiş Tarihi',
  'LBL_DATE_TIME' => 'Başlangıç Tarihi & Zamanı:',
  'LBL_DATE' => 'Başlangıç Tarihi:',
  'LBL_DEFAULT_STATUS' => 'Planlandı',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Toplantılar',
  'LBL_DEL' => 'Sil',
  'LBL_DESCRIPTION_INFORMATION' => 'Tanım Bilgisi',
  'LBL_DESCRIPTION' => 'Tanım:',
  'LBL_DURATION_HOURS' => 'Süre (saat):',
  'LBL_DURATION_MINUTES' => 'Süre (dakika):',
  'LBL_DURATION' => 'Süre:',
  'LBL_EMAIL' => 'E-Posta',
  'LBL_FIRST_NAME' => 'Adı',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Notlar',
  'LBL_HOURS_ABBREV' => 's',
  'LBL_HOURS_MINS' => '(saat/dakika)',
  'LBL_INVITEE' => 'Davetliler',
  'LBL_LAST_NAME' => 'Soyadı',
  'LBL_ASSIGNED_TO_NAME' => 'Atanan Kişi:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Atanan Kullanıcı',
  'LBL_LIST_CLOSE' => 'Kapat',
  'LBL_LIST_CONTACT' => 'Kontak',
  'LBL_LIST_DATE_MODIFIED' => 'Değiştirilme Tarihi',
  'LBL_LIST_DATE' => 'Başlangıç Tarihi',
  'LBL_LIST_DIRECTION' => 'Yönetim',
  'LBL_LIST_DUE_DATE' => 'Bitiş Tarihi',
  'LBL_LIST_FORM_TITLE' => 'Toplantı Listesi',
  'LBL_LIST_MY_MEETINGS' => 'Toplantılarım',
  'LBL_LIST_RELATED_TO' => 'İlişkili',
  'LBL_LIST_STATUS' => 'Durum',
  'LBL_LIST_SUBJECT' => 'Konu',
  'LBL_LIST_TIME' => 'Başlangıç Saati',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Potansiyeller',
  'LBL_LOCATION' => 'Yer:',
  'LBL_MEETING' => 'Toplantı:',
  'LBL_MINSS_ABBREV' => 'd',
  'LBL_MODIFIED_BY' => 'Değiştiren',
  'LBL_MODULE_NAME' => 'Toplantılar',
  'LBL_MODULE_TITLE' => 'Toplantılar: Ana Sayfa',
  'LBL_NAME' => 'İsim',
  'LBL_NEW_FORM_TITLE' => 'Randevu Oluştur',
  'LBL_OUTLOOK_ID' => 'Outlook ID\'si',
  'LBL_PHONE' => 'Ofis Telefonu:',
  'LBL_REMINDER_TIME' => 'Hatırlatma Saati',
  'LBL_REMINDER' => 'Hatırlatma:',
  'LBL_REMOVE' => 'Ortadan Kaldır',
  'LBL_SCHEDULING_FORM_TITLE' => 'Planlıyor',
  'LBL_SEARCH_BUTTON' => 'Ara',
  'LBL_SEARCH_FORM_TITLE' => 'Toplantı Arama',
  'LBL_SEND_BUTTON_LABEL' => 'Davet Gönder',
  'LBL_SEND_BUTTON_TITLE' => 'Davet Gönder [Alt+I]',
  'LBL_STATUS' => 'Durum:',
  'LBL_SUBJECT' => 'Konu:',
  'LBL_TIME' => 'Başlangıç Saati:',
  'LBL_USERS_SUBPANEL_TITLE' => 'Kullanıcılar',
  'LBL_ACTIVITIES_REPORTS' => 'Aktiviteler Raporu',
  'LNK_MEETING_LIST' => 'Toplantıları Göster',
  'LNK_NEW_APPOINTMENT' => 'Randevu Oluştur',
  'LNK_NEW_MEETING' => 'Toplantı Planla',
  'LNK_IMPORT_MEETINGS' => 'Toplantı Verilerini Yükle',
  'NTC_REMOVE_INVITEE' => 'Toplantıdan bu davetliyi çıkarmak istediğinizden emin misiniz?',
  'LBL_CREATED_USER' => 'Oluşturan Kullanıcı',
  'LBL_MODIFIED_USER' => 'Değiştiren Kullanıcı',
  'NOTICE_DURATION_TIME' => 'Süre 0\'dan büyük olmalıdır',
  'LBL_MEETING_INFORMATION' => 'Toplantıları Gözden Geçir',
);

