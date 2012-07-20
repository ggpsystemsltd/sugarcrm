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
  'LBL_OOTB_WORKFLOW' => 'Süreç İşakışı Görevleri',
  'LBL_OOTB_REPORTS' => 'Rapor Üretimi Planlanmış Görevleri Çalıştır',
  'LBL_OOTB_IE' => 'Gelen Posta kutularını Kontrol et',
  'LBL_OOTB_BOUNCE' => 'Gecelik Çalışan Kampanya Geri Dönen E-postaları',
  'LBL_OOTB_CAMPAIGN' => 'Gecelik Çalışan Kitlesel E-posta Kampanyaları',
  'LBL_OOTB_PRUNE' => 'Ayın 1\'inde Veritabanındaki fazla kısımları at',
  'LBL_OOTB_TRACKER' => 'Takipçi Tabloları Kes',
  'LBL_UPDATE_TRACKER_SESSIONS' => 'takipçi_oturumlar Çizelgesini Güncelle',
  'LBL_LIST_JOB_INTERVAL' => 'Sıklık Derecesi:',
  'LBL_LIST_LIST_ORDER' => 'Planlayıcılar:',
  'LBL_LIST_NAME' => 'Planlayıcı:',
  'LBL_LIST_RANGE' => 'Aralık:',
  'LBL_LIST_REMOVE' => 'Kaldır:',
  'LBL_LIST_STATUS' => 'Durum:',
  'LBL_LIST_TITLE' => 'Planlayıcı Listesi:',
  'LBL_LIST_EXECUTE_TIME' => 'Burada Çalışacak:',
  'LBL_SUN' => 'Pazar',
  'LBL_MON' => 'Pazartesi',
  'LBL_TUE' => 'Salı',
  'LBL_WED' => 'Çarşamba',
  'LBL_THU' => 'Perşembe',
  'LBL_FRI' => 'Cuma',
  'LBL_SAT' => 'Cumartesi',
  'LBL_ALL' => 'Hergün',
  'LBL_EVERY_DAY' => 'Hergün',
  'LBL_AT_THE' => 'Burada',
  'LBL_EVERY' => 'Her',
  'LBL_FROM' => 'Kimden',
  'LBL_ON_THE' => 'Üstünde',
  'LBL_RANGE' => '-',
  'LBL_AT' => 'Burada',
  'LBL_IN' => 'içinde:',
  'LBL_AND' => 've',
  'LBL_MINUTES' => 'dakika',
  'LBL_HOUR' => 'saat',
  'LBL_HOUR_SING' => 'saat',
  'LBL_MONTH' => 'ay',
  'LBL_OFTEN' => 'Olabildiğince sık.',
  'LBL_MIN_MARK' => 'dakika işareti',
  'LBL_MINS' => 'dak',
  'LBL_HOURS' => 'sa',
  'LBL_DAY_OF_MONTH' => 'tarih',
  'LBL_MONTHS' => 'ay',
  'LBL_DAY_OF_WEEK' => 'gün',
  'LBL_CRONTAB_EXAMPLES' => 'Yukarısı standart crontab gösterimini kullanır.',
  'LBL_ALWAYS' => 'Her zaman',
  'LBL_CATCH_UP' => 'Vakti geçmiş ise çalıştır',
  'LBL_CATCH_UP_WARNING' => 'Eğer bu iş bir saniyeden daha fazla sürecek ise işareti kaldırın.',
  'LBL_DATE_TIME_END' => 'Tarih & Bitiş Zamanı',
  'LBL_DATE_TIME_START' => 'Tarih & Başlangıc Zamanı',
  'LBL_INTERVAL' => 'Sıklık Derecesi',
  'LBL_JOB' => 'Görev',
  'LBL_LAST_RUN' => 'Son Başarılı Çalışma',
  'LBL_MODULE_NAME' => 'Sugar Planlayıcı',
  'LBL_MODULE_TITLE' => 'Planlayıcılar',
  'LBL_NAME' => 'Görev Adı',
  'LBL_NEVER' => 'Hiç',
  'LBL_NEW_FORM_TITLE' => 'Yeni Plan',
  'LBL_PERENNIAL' => 'sürekli',
  'LBL_SEARCH_FORM_TITLE' => 'Planlayıcı Arama',
  'LBL_SCHEDULER' => 'Planlayıcı:',
  'LBL_STATUS' => 'Durum',
  'LBL_TIME_FROM' => 'Aktif Form',
  'LBL_TIME_TO' => 'Aktifleştirmel İçin',
  'LBL_WARN_CURL_TITLE' => 'cURL Uyarısı:',
  'LBL_WARN_CURL' => 'Uyarı:',
  'LBL_WARN_NO_CURL' => 'Bu sistem PHP modülü içerisine etkinleştirilmiş/derlenmiş cURL kütüphanelerine sahip değil. Planlayıcı cURL işlevselliği olmadan görevlerini gerçekleştiremez.',
  'LBL_BASIC_OPTIONS' => 'Basit Kurulum',
  'LBL_ADV_OPTIONS' => 'Gelişmiş Seçenekler',
  'LBL_TOGGLE_ADV' => 'Gelişmiş Seçenekleri Göster',
  'LBL_TOGGLE_BASIC' => 'Temel Seçenekleri Göster',
  'LNK_LIST_SCHEDULER' => 'Planlayıcılar',
  'LNK_NEW_SCHEDULER' => 'Planlayıcı Oluştur',
  'LNK_LIST_SCHEDULED' => 'Planlanmış İşler',
  'SOCK_GREETING' => 'Bu arayüz SugarCRM Planlayıcı Servisi içindir. [Mevcut daemon komutları: start|restart|shutdown|status] Çıkmak için \'quit\' yazın. Servisi kapatmak için \'shutdown\' yazın.',
  'ERR_DELETE_RECORD' => 'Bu planı silmek için bir kayıt numarası belirtmelisiniz.',
  'ERR_CRON_SYNTAX' => 'Geçersiz Cron söz dizimi',
  'NTC_DELETE_CONFIRMATION' => 'Bu kaydı silmek istediğinizden emin misiniz?',
  'NTC_STATUS' => 'Bu planlayıcının durumunu, İnaktif olarak belirleyerek Planlayıcı açılan listesinden kaldırın',
  'NTC_LIST_ORDER' => 'Bu planlayıcının, Planlayıcı açılan listesinde görünmesini istediğiniz sırayı belirleyin',
  'LBL_CRON_INSTRUCTIONS_WINDOWS' => 'Windows Planlayıcı Kurulumu için',
  'LBL_CRON_INSTRUCTIONS_LINUX' => 'Crontab Kurulumu için',
  'LBL_CRON_LINUX_DESC' => 'Not: Sugar Planlayıcısını çalıştırabilmek için şu satırları crontab dosyasına ekleyin:',
  'LBL_CRON_WINDOWS_DESC' => 'Not: Sugar Planlayıcısını çalıştırmak için batch dosyası oluşturup, Windows Planlanmış Görevleri kullanın. Batch dosyası şu komutları içermelidir:',
  'LBL_NO_PHP_CLI' => 'Eğer sunucunuzda PHP binary yoksa, İşleri çalıştırmak için wget veya curl kullanabilirsiniz.<br>wget için: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;wget --quiet --non-verbose $/cron.php > /dev/null 2>&1</b><br>curl için: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;curl --silent $/cron.php > /dev/null 2>&1',
  'LBL_JOBS_SUBPANEL_TITLE' => 'Görev Logu',
  'LBL_EXECUTE_TIME' => 'Çalıştırılma Zamanı',
  'LBL_REFRESHJOBS' => 'İşleri Yenile',
  'LBL_POLLMONITOREDINBOXES' => 'Kontrol Et',
  'LBL_RUNMASSEMAILCAMPAIGN' => 'Gecelik Çalışan Kitlesel E-Posta Kampanyaları',
  'LBL_POLLMONITOREDINBOXESFORBOUNCEDCAMPAIGNEMAILS' => 'Gecelik Çalışan Geri Dönen Kampanya E-Postaları',
  'LBL_PRUNEDATABASE' => 'Ayın 1\'inde Veritabanındaki fazla kısımları at',
  'LBL_TRIMTRACKER' => 'Takipçi Tabloları Kes',
  'LBL_PROCESSWORKFLOW' => 'Süreç İşakışı Görevleri',
  'LBL_PROCESSQUEUE' => 'Rapor Üretimi Planlanmış Görevleri Çalıştır',
  'LBL_UPDATETRACKERSESSIONS' => 'Takipçi Oturum Tablolarını Güncelle',
);

