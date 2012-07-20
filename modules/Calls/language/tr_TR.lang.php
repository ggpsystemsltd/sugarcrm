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
  'LBL_OUTLOOK_ID' => 'Outlook ID',
  'LBL_MODULE_NAME' => 'Tel.Aramaları',
  'LBL_MODULE_TITLE' => 'Tel.Aramaları: Ana Sayfa',
  'LBL_SEARCH_FORM_TITLE' => 'Tel.Aramaları Ara',
  'LBL_LIST_FORM_TITLE' => 'Tel.Aramaları Listesi',
  'LBL_NEW_FORM_TITLE' => 'Randevu Oluştur',
  'LBL_LIST_CLOSE' => 'Kapat',
  'LBL_LIST_SUBJECT' => 'Konu',
  'LBL_LIST_CONTACT' => 'İlgili',
  'LBL_LIST_RELATED_TO' => 'İlişkili',
  'LBL_LIST_RELATED_TO_ID' => 'İlişkili olduğu ID',
  'LBL_LIST_DATE' => 'Başlangıç Tarihi',
  'LBL_LIST_TIME' => 'Başlangıç Saati',
  'LBL_LIST_DURATION' => 'Süre',
  'LBL_LIST_DIRECTION' => 'Yön',
  'LBL_SUBJECT' => 'Konu:',
  'LBL_REMINDER' => 'Hatırlatıcı:',
  'LBL_CONTACT_NAME' => 'İlgili:',
  'LBL_DESCRIPTION_INFORMATION' => 'Tanım Bilgisi',
  'LBL_DESCRIPTION' => 'Tanım:',
  'LBL_STATUS' => 'Durum:',
  'LBL_DIRECTION' => 'Yön:',
  'LBL_DATE' => 'Başlangıç Tarihi:',
  'LBL_DURATION' => 'Süre:',
  'LBL_DURATION_HOURS' => 'Süre (Saat):',
  'LBL_DURATION_MINUTES' => 'Süre (Dakika):',
  'LBL_HOURS_MINUTES' => '(saat/dakika)',
  'LBL_CALL' => 'Tel.Araması:',
  'LBL_DATE_TIME' => 'Başlangıç Tarih & Zaman:',
  'LBL_TIME' => 'Başlangıç Saati:',
  'LBL_HOURS_ABBREV' => 's',
  'LBL_MINSS_ABBREV' => 'd',
  'LBL_DEFAULT_STATUS' => 'Planlanmış',
  'LNK_NEW_CALL' => 'Tel.Araması Planla',
  'LNK_NEW_MEETING' => 'Toplantı Planla',
  'LNK_CALL_LIST' => 'Tel.Aramalarını Gör',
  'LNK_IMPORT_CALLS' => 'Çağrı Verilerini Yükle',
  'ERR_DELETE_RECORD' => 'Müşteriyi silmek için bir kayıt numarası belirtilmelidir.',
  'NTC_REMOVE_INVITEE' => 'Arama kaydından bu davetliyi silmek istediğinize emin misiniz?',
  'LBL_INVITEE' => 'Davetliler',
  'LBL_RELATED_TO' => 'İlişkili:',
  'LNK_NEW_APPOINTMENT' => 'Randevu Oluştur',
  'LBL_SCHEDULING_FORM_TITLE' => 'Planlanıyor',
  'LBL_ADD_INVITEE' => 'Davetlileri Ekle',
  'LBL_NAME' => 'İsim',
  'LBL_FIRST_NAME' => 'Adı',
  'LBL_LAST_NAME' => 'Soyadı',
  'LBL_EMAIL' => 'E-Posta',
  'LBL_PHONE' => 'Telefon',
  'LBL_SEND_BUTTON_TITLE' => 'Davet Gönder  [Alt+I]',
  'LBL_SEND_BUTTON_LABEL' => 'Davet Gönder',
  'LBL_DATE_END' => 'Bitiş Tarihi',
  'LBL_TIME_END' => 'Bitiş Saati',
  'LBL_REMINDER_TIME' => 'Hatırlatma Saati',
  'LBL_SEARCH_BUTTON' => 'Ara',
  'LBL_ACTIVITIES_REPORTS' => 'Aktiviteler Raporu',
  'LBL_ADD_BUTTON' => 'Ekle',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Tel.Aramaları',
  'LBL_LOG_CALL' => 'Tel.Araması Planla',
  'LNK_SELECT_ACCOUNT' => 'Müşteri Seç',
  'LNK_NEW_ACCOUNT' => 'Yeni Müşteri',
  'LNK_NEW_OPPORTUNITY' => 'Yeni Fırsat',
  'LBL_DEL' => 'Sil',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Potansiyeller',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'İlgililer',
  'LBL_USERS_SUBPANEL_TITLE' => 'Kullanıcılar',
  'LBL_MEMBER_OF' => 'Üyeliği',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Notlar',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Atanan Kişi',
  'LBL_LIST_MY_CALLS' => 'Telefon Aramalarım',
  'LBL_SELECT_FROM_DROPDOWN' => 'Lütfen önce İlişkili açılan listesinden seçim yapınız.',
  'LBL_ASSIGNED_TO_NAME' => 'Atanan Kişi',
  'LBL_ASSIGNED_TO_ID' => 'Atanan Kullanıcı ID',
  'NOTICE_DURATION_TIME' => 'Süre 0\'dan büyük olmalıdır',
  'LBL_CALL_INFORMATION' => 'Çağrı Genel Bakış',
  'LBL_REMOVE' => 'sil',
);

