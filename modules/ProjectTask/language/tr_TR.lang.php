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
  'LBL_ID' => 'ID:',
  'LBL_MODULE_NAME' => 'Proje Görevleri',
  'LBL_MODULE_TITLE' => 'Proje Görevi: Ana Sayfa',
  'LBL_SEARCH_FORM_TITLE' => 'Proje Görevi Arama',
  'LBL_LIST_FORM_TITLE' => 'Proje Görevi Listesi',
  'LBL_EDIT_TASK_IN_GRID_TITLE' => 'Grid Üzerinde Görev Düzenle',
  'LBL_PROJECT_TASK_ID' => 'Proje Görev ID:',
  'LBL_PROJECT_ID' => 'Proje ID:',
  'LBL_DATE_ENTERED' => 'Oluşturulma Tarihi:',
  'LBL_DATE_MODIFIED' => 'Değiştirilme Tarihi:',
  'LBL_ASSIGNED_USER_ID' => 'Atanan Kişi:',
  'LBL_MODIFIED_USER_ID' => 'Değiştiren Kullanıcı ID:',
  'LBL_CREATED_BY' => 'Oluşturan:',
  'LBL_TEAM_ID' => 'Takım:',
  'LBL_NAME' => 'İsim:',
  'LBL_STATUS' => 'Durum:',
  'LBL_DATE_DUE' => 'Son Bitirme Tarihi:',
  'LBL_TIME_DUE' => 'Son Bitirme Tarihi:',
  'LBL_RESOURCE' => 'Kaynak:',
  'LBL_PREDECESSORS' => 'Önceki Görevler:',
  'LBL_DATE_START' => 'Başlangıç Tarihi:',
  'LBL_DATE_FINISH' => 'Bitiş Tarihi:',
  'LBL_TIME_START' => 'Başlangıç Saati:',
  'LBL_TIME_FINISH' => 'Bitiş Zamanı:',
  'LBL_DURATION' => 'Süre:',
  'LBL_DURATION_UNIT' => 'Süre Birimi:',
  'LBL_ACTUAL_DURATION' => 'Gerçek Süre:',
  'LBL_PARENT_ID' => 'Proje:',
  'LBL_PARENT_TASK_ID' => 'Üst Görev Id:',
  'LBL_PERCENT_COMPLETE' => 'Tamamlanma Oranı (%):',
  'LBL_PRIORITY' => 'Öncelik:',
  'LBL_DESCRIPTION' => 'Tanım:',
  'LBL_ORDER_NUMBER' => 'Sıra:',
  'LBL_TASK_NUMBER' => 'Görev Numarası:',
  'LBL_TASK_ID' => 'Görev ID:',
  'LBL_DEPENDS_ON_ID' => 'Bağımlı:',
  'LBL_MILESTONE_FLAG' => 'Kilometretaşı:',
  'LBL_ESTIMATED_EFFORT' => 'Tahmini Harcanacak Zaman (saat):',
  'LBL_ACTUAL_EFFORT' => 'Harcanan Zaman (saat):',
  'LBL_UTILIZATION' => 'Kaynak Kullanımı (%):',
  'LBL_DELETED' => 'Silindi:',
  'LBL_LIST_ORDER_NUMBER' => 'Sıra',
  'LBL_LIST_NAME' => 'İsim',
  'LBL_LIST_DAYS' => 'gün',
  'LBL_LIST_PARENT_NAME' => 'Proje',
  'LBL_LIST_PERCENT_COMPLETE' => 'Tamamlanma Oranı (%)',
  'LBL_LIST_STATUS' => 'Durum',
  'LBL_LIST_DURATION' => 'Süre',
  'LBL_LIST_ACTUAL_DURATION' => 'Gerçek Süre',
  'LBL_LIST_ASSIGNED_USER_ID' => 'Atanan Kişi',
  'LBL_LIST_DATE_DUE' => 'Son Bitirme Tarihi',
  'LBL_LIST_DATE_START' => 'Başlangıç Tarihi',
  'LBL_LIST_DATE_FINISH' => 'Bitiş Tarihi',
  'LBL_LIST_PRIORITY' => 'Öncelik',
  'LBL_LIST_CLOSE' => 'Kapat',
  'LBL_PROJECT_NAME' => 'Proje Adı',
  'LNK_NEW_PROJECT' => 'Proje Oluştur',
  'LNK_PROJECT_LIST' => 'Proje Listesi',
  'LNK_NEW_PROJECT_TASK' => 'Proje Görevi Oluştur',
  'LNK_PROJECT_TASK_LIST' => 'Proje Görevleri',
  'LBL_LIST_MY_PROJECT_TASKS' => 'Proje Görevlerim',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Proje Görevleri',
  'LBL_NEW_FORM_TITLE' => 'Yeni Proje Görevi',
  'LBL_ACTIVITIES_TITLE' => 'Aktiviteler',
  'LBL_HISTORY_TITLE' => 'Tarihçe',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Aktiviteler',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Tarihçe',
  'DATE_JS_ERROR' => 'Lütfen girilen zamana bağlı bir tarih giriniz',
  'LBL_ASSIGNED_USER_NAME' => 'Atanan Kişi',
  'LBL_PARENT_NAME' => 'Proje Adı',
  'LBL_LIST_PROJECT_NAME' => 'Projeler',
);

