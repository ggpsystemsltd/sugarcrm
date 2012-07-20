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
  'LBL_NEW_TASK_BUTTON_KEY' => 'N',
  'LBL_SCHEDULE_MEETING_BUTTON_KEY' => 'M',
  'LBL_SCHEDULE_CALL_BUTTON_KEY' => 'C',
  'LBL_NEW_NOTE_BUTTON_KEY' => 'T',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_MODULE_NAME' => 'Aktiviteler',
  'LBL_MODULE_TITLE' => 'Aktiviteler:Ana Sayfa',
  'LBL_SEARCH_FORM_TITLE' => 'Aktiviteler Arama',
  'LBL_LIST_FORM_TITLE' => 'Aktiviteler Listesi',
  'LBL_LIST_SUBJECT' => 'Konu',
  'LBL_LIST_CONTACT' => 'Kontak',
  'LBL_LIST_RELATED_TO' => 'İlişkili',
  'LBL_LIST_DATE' => 'Tarih',
  'LBL_LIST_TIME' => 'Başlangıç Saati',
  'LBL_LIST_CLOSE' => 'Kapat',
  'LBL_SUBJECT' => 'Konu:',
  'LBL_STATUS' => 'Durum:',
  'LBL_LOCATION' => 'Yer:',
  'LBL_DATE_TIME' => 'Başlangıç Tarihi & Zamanı:',
  'LBL_DATE' => 'Başlangıç Tarihi:',
  'LBL_TIME' => 'Başlangıç Saati:',
  'LBL_DURATION' => 'Süre:',
  'LBL_DURATION_MINUTES' => 'Süre (dakika):',
  'LBL_HOURS_MINS' => '(saat/dakika)',
  'LBL_CONTACT_NAME' => 'Kontak Adı:',
  'LBL_MEETING' => 'Toplantı:',
  'LBL_DESCRIPTION_INFORMATION' => 'Tanımlama Bilgisi',
  'LBL_DESCRIPTION' => 'Tanım:',
  'LBL_DEFAULT_STATUS' => 'Planlanmış',
  'LNK_NEW_CALL' => 'Tel.Araması Planlama',
  'LNK_NEW_MEETING' => 'Toplantı Planlama',
  'LNK_NEW_TASK' => 'Görev Oluştur',
  'LNK_NEW_NOTE' => 'Not veya Ek oluştur',
  'LNK_NEW_EMAIL' => 'Arşivlenmiş E-Posta oluştur',
  'LNK_CALL_LIST' => 'Tel.Aramaları Görüntüle',
  'LNK_MEETING_LIST' => 'Toplantıları Görüntüle',
  'LNK_TASK_LIST' => 'Görevleri Görüntüle',
  'LNK_NOTE_LIST' => 'Notları Görüntüle',
  'LNK_EMAIL_LIST' => 'E-Postaları Görüntüle',
  'ERR_DELETE_RECORD' => 'Müşteriyi silmek için bir kayıt nosu girmelisiniz.',
  'NTC_REMOVE_INVITEE' => 'Toplantıdan bu davetliyi kaldırmak istediğinizden emin misiniz?',
  'LBL_INVITEE' => 'Davetliler',
  'LBL_LIST_DIRECTION' => 'Yön',
  'LBL_DIRECTION' => 'Yön',
  'LNK_NEW_APPOINTMENT' => 'Yeni Randevu',
  'LNK_VIEW_CALENDAR' => 'Takvimi Görüntüle',
  'LBL_OPEN_ACTIVITIES' => 'Aktiviteleri Aç',
  'LBL_HISTORY' => 'Tarihçe',
  'LBL_UPCOMING' => 'Tarihi Yaklaşan Randevularım',
  'LBL_TODAY' => 'boyunca',
  'LBL_NEW_TASK_BUTTON_TITLE' => 'Görev Oluştur [Alt+N]',
  'LBL_NEW_TASK_BUTTON_LABEL' => 'Görev Oluştur',
  'LBL_SCHEDULE_MEETING_BUTTON_TITLE' => 'Toplantı Zamanla [Alt+M]',
  'LBL_SCHEDULE_MEETING_BUTTON_LABEL' => 'Toplantı Planlama',
  'LBL_SCHEDULE_CALL_BUTTON_TITLE' => 'Tel.Arama Kayıtları [Alt+C]',
  'LBL_SCHEDULE_CALL_BUTTON_LABEL' => 'Tel.Araması Planla',
  'LBL_NEW_NOTE_BUTTON_TITLE' => 'Not yada Ek oluştur [Alt+T]',
  'LBL_NEW_NOTE_BUTTON_LABEL' => 'Not yada Ek oluştur',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'E-Posta Arşivle [Alt+K]',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'E-Posta Arşivle',
  'LBL_LIST_STATUS' => 'Durum',
  'LBL_LIST_DUE_DATE' => 'Son Bitirme Tarihi',
  'LBL_LIST_LAST_MODIFIED' => 'Son Değiştirilme Tarihi',
  'NTC_NONE_SCHEDULED' => 'Planlanmamış.',
  'LNK_IMPORT_CALLS' => 'Sisteme Arama Aktar',
  'LNK_IMPORT_MEETINGS' => 'Sisteme Toplantı Aktar',
  'LNK_IMPORT_TASKS' => 'Sisteme Görev Aktar',
  'LNK_IMPORT_NOTES' => 'Sisteme Not Al',
  'NTC_NONE' => 'Boş',
  'LBL_ACCEPT_THIS' => 'Kabul ediyor musunuz?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Aktiviteleri Aç',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Atanan Kullanıcı',
  'appointment_filter_dom' => 
  array (
    'today' => 'bugün',
    'tomorrow' => 'yarın',
    'this Saturday' => 'bu hafta',
    'next Saturday' => 'sonraki hafta',
    'last this_month' => 'bu ay',
    'last next_month' => 'sonraki ay',
  ),
);

