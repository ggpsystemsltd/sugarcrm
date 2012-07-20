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
  'LBL_FORECAST_ID' => 'ID',
  'LBL_QC_COMMIT_BUTTON' => 'Commit',
  'LB_FS_KEY' => 'ID',
  'LBL_FMT_ROLLUP_FORECAST' => '(Rollup)',
  'LBL_MODULE_NAME' => 'Tahminler',
  'LNK_NEW_OPPORTUNITY' => 'Fırsat Oluştur',
  'LBL_MODULE_TITLE' => 'Tahminler',
  'LBL_LIST_FORM_TITLE' => 'Commit Edilen Tahminler',
  'LNK_UPD_FORECAST' => 'Tahmin Çalışma Sayfası',
  'LNK_QUOTA' => 'Kotaları Görüntüle',
  'LNK_FORECAST_LIST' => 'Tahmin Tarihçesini Görüntüle',
  'LBL_FORECAST_HISTORY' => 'Tahminler: Tarihçe',
  'LBL_FORECAST_HISTORY_TITLE' => 'Tarihçe',
  'LBL_TIMEPERIOD_NAME' => 'Zaman Aralığı:',
  'LBL_USER_NAME' => 'Kullanıcı Adı',
  'LBL_REPORTS_TO_USER_NAME' => 'Rapor Edilen Kişi:',
  'LBL_FORECAST_TIME_ID' => 'Zaman Aralığı ID',
  'LBL_FORECAST_TYPE' => 'Tahmin Tipi',
  'LBL_FORECAST_OPP_COUNT' => 'Fırsatlar',
  'LBL_FORECAST_OPP_WEIGH' => 'Ağırlıklı Miktar',
  'LBL_FORECAST_OPP_COMMIT' => 'Olası Durum',
  'LBL_FORECAST_OPP_BEST_CASE' => 'En İyi Durum',
  'LBL_FORECAST_OPP_WORST' => 'En Kötü Durum',
  'LBL_FORECAST_USER' => 'Kullanıcı',
  'LBL_DATE_COMMITTED' => 'Commit Edilen Tarih',
  'LBL_DATE_ENTERED' => 'Oluşturulma Tarihi',
  'LBL_DATE_MODIFIED' => 'Değiştirilme Tarihi',
  'LBL_CREATED_BY' => 'Oluşturan:',
  'LBL_DELETED' => 'Silindi',
  'LBL_MODIFIED_USER_ID' => 'Değiştiren:',
  'LBL_QC_TIME_PERIOD' => 'Zaman Aralığı:',
  'LBL_QC_OPPORTUNITY_COUNT' => 'Fırsat Sayısı:',
  'LBL_QC_WEIGHT_VALUE' => 'Ağırlıklı Miktar:',
  'LBL_QC_COMMIT_VALUE' => 'Commit Miktarı:',
  'LBL_QC_WORKSHEET_BUTTON' => 'Çalışma Sayfası',
  'LBL_QC_ROLL_COMMIT_VALUE' => 'Rollup Commit Miktarı:',
  'LBL_QC_DIRECT_FORECAST' => 'Doğrudan Tahminim:',
  'LBL_QC_ROLLUP_FORECAST' => 'Grubumun Tahmini:',
  'LBL_QC_UPCOMING_FORECASTS' => 'Tahminlerim',
  'LBL_QC_LAST_DATE_COMMITTED' => 'Son Commit Verisi:',
  'LBL_QC_LAST_COMMIT_VALUE' => 'Son Commit Miktarı:',
  'LBL_QC_HEADER_DELIM' => 'Kime',
  'LBL_OW_OPPORTUNITIES' => 'Fırsat',
  'LBL_OW_ACCOUNTNAME' => 'Müşteri',
  'LBL_OW_REVENUE' => 'Tutar',
  'LBL_OW_WEIGHTED' => 'Ağırlıklı Tutar',
  'LBL_OW_MODULE_TITLE' => 'Fırsat Çalışma Sayfası',
  'LBL_OW_PROBABILITY' => 'Olasılık',
  'LBL_OW_NEXT_STEP' => 'Bir Sonraki Adım:',
  'LBL_OW_DESCRIPTION' => 'Tanım',
  'LBL_OW_TYPE' => 'Tipi',
  'LNK_NEW_TIMEPERIOD' => 'Zaman Aralığı Oluştur',
  'LNK_TIMEPERIOD_LIST' => 'Zaman Aralıklarını Görüntüle',
  'LBL_SVFS_FORECASTDATE' => 'Planlama Başlangıç Tarihi',
  'LBL_SVFS_STATUS' => 'Durum',
  'LBL_SVFS_USER' => 'Kim İçin',
  'LBL_SVFS_CASCADE' => 'Raporlara basamaklandırılsın mı?',
  'LBL_SVFS_HEADER' => 'Tahmin Planlama:',
  'LBL_FS_TIMEPERIOD_ID' => 'Zaman Aralığı ID',
  'LBL_FS_USER_ID' => 'Kullanıcı ID',
  'LBL_FS_TIMEPERIOD' => 'Zaman Aralığı',
  'LBL_FS_START_DATE' => 'Başlangıç Tarihi',
  'LBL_FS_END_DATE' => 'Bitiş Tarihi',
  'LBL_FS_FORECAST_START_DATE' => 'Tahmin Başlangıç Tarihi',
  'LBL_FS_STATUS' => 'Durum',
  'LBL_FS_FORECAST_FOR' => 'Planlanacak Kişi:',
  'LBL_FS_CASCADE' => 'Basamaklandır?',
  'LBL_FS_MODULE_NAME' => 'Tahmin Planlaması',
  'LBL_FS_CREATED_BY' => 'Oluşturan',
  'LBL_FS_DATE_ENTERED' => 'Oluşturulma Tarihi',
  'LBL_FS_DATE_MODIFIED' => 'Değiştirilme Tarihi',
  'LBL_FS_DELETED' => 'Silindi',
  'LBL_FDR_USER_NAME' => 'Doğrudan Rapor',
  'LBL_FDR_OPPORTUNITIES' => 'Tahmindeki olasılıklar:',
  'LBL_FDR_WEIGH' => 'Fırsatların ağırlıklı miktarı:',
  'LBL_FDR_COMMIT' => 'Commit Miktarı',
  'LBL_FDR_DATE_COMMIT' => 'Commit Tarihi',
  'LBL_DV_HEADER' => 'Tahminler:Çalışma Sayfası',
  'LBL_DV_MY_FORECASTS' => 'Tahminlerim',
  'LBL_DV_MY_TEAM' => 'Takımımın Tahminleri',
  'LBL_DV_TIMEPERIODS' => 'Zaman Aralıkları:',
  'LBL_DV_FORECAST_PERIOD' => 'Zaman Aralığı Tahmini',
  'LBL_DV_FORECAST_OPPORTUNITY' => 'Tahmin Fırsatları',
  'LBL_SEARCH' => 'Seç',
  'LBL_SEARCH_LABEL' => 'Seç',
  'LBL_COMMIT_HEADER' => 'Tahmin Commit',
  'LBL_DV_LAST_COMMIT_DATE' => 'Son Commit Tarihi:',
  'LBL_DV_LAST_COMMIT_AMOUNT' => 'Son Commit Miktarı:',
  'LBL_DV_FORECAST_ROLLUP' => 'Tahmin Rollup',
  'LBL_DV_TIMEPERIOD' => 'Zaman Aralığı:',
  'LBL_DV_TIMPERIOD_DATES' => 'Tarih Alanı:',
  'LBL_LV_TIMPERIOD' => 'Zaman aralığı',
  'LBL_LV_TIMPERIOD_START_DATE' => 'Başlangıç Tarihi',
  'LBL_LV_TIMPERIOD_END_DATE' => 'Bitiş Tarihi',
  'LBL_LV_TYPE' => 'Tahmin Türü',
  'LBL_LV_COMMIT_DATE' => 'Commit Edilen Tarih',
  'LBL_LV_OPPORTUNITIES' => 'Fırsatlar',
  'LBL_LV_WEIGH' => 'Ağırlıklı Miktar',
  'LBL_LV_COMMIT' => 'Commit Edilen Miktarı',
  'LBL_COMMIT_NOTE' => 'Seçili Zaman Periyodu için Commit edilecek miktarları girin:',
  'LBL_COMMIT_MESSAGE' => 'Bu tutarı commit etmek ister misiniz?',
  'ERR_FORECAST_AMOUNT' => 'Commit Miktarı gereklidir ve sayı olmalıdır.',
  'LBL_FC_START_DATE' => 'Başlangıç Tarihi',
  'LBL_FC_USER' => 'Planlanacak Kişi:',
  'LBL_NO_ACTIVE_TIMEPERIOD' => 'Tahminleme için Etkin zaman periodu yoktur.',
  'LBL_FDR_ADJ_AMOUNT' => 'Ayarlanmış Miktar',
  'LBL_SAVE_WOKSHEET' => 'Çalışma Sayfasını Kaydet',
  'LBL_RESET_WOKSHEET' => 'Çalışma Sayfasını Sıfırla',
  'LBL_SHOW_CHART' => 'Grafiği Görüntüle',
  'LBL_RESET_CHECK' => 'Seçilen zaman periyodu ve giriş yapmış kullanıcının tüm çalışma sayfası verileri silinecektir. Devam etmek ister misiniz?',
  'LB_FS_LIKELY_CASE' => 'Olası Durum',
  'LB_FS_WORST_CASE' => 'En Kötü Durum',
  'LB_FS_BEST_CASE' => 'En İyi Durum',
  'LBL_FDR_WK_LIKELY_CASE' => 'Tahmini Olası Durum',
  'LBL_FDR_WK_BEST_CASE' => 'Tahmini En İyi Durum',
  'LBL_FDR_WK_WORST_CASE' => 'Tahmini En Kötü Durum',
  'LBL_BEST_CASE' => 'En İyi Durum:',
  'LBL_LIKELY_CASE' => 'Olası Durum:',
  'LBL_WORST_CASE' => 'En Kötü Durum:',
  'LBL_FDR_C_BEST_CASE' => 'En İyi Durum',
  'LBL_FDR_C_WORST_CASE' => 'En Kötü Durum',
  'LBL_FDR_C_LIKELY_CASE' => 'Olası Durum',
  'LBL_QC_LAST_BEST_CASE' => 'En Son Commit Miktarı (En İyi Durum):',
  'LBL_QC_LAST_LIKELY_CASE' => 'En Son Commit Miktarı (Olası Durum):',
  'LBL_QC_LAST_WORST_CASE' => 'En Son Commit Miktarı (En Kötü Durum):',
  'LBL_QC_ROLL_BEST_VALUE' => 'Rollup Commit Miktarı (En İyi Durum):',
  'LBL_QC_ROLL_LIKELY_VALUE' => 'Rollup Commit Miktarı (Olası Durum):',
  'LBL_QC_ROLL_WORST_VALUE' => 'Rollup Commit Miktarı (En Kötü Durum):',
  'LBL_QC_COMMIT_BEST_CASE' => 'Commit Miktarı (En İyi Durum):',
  'LBL_QC_COMMIT_LIKELY_CASE' => 'Commit Miktarı (Olası Durum):',
  'LBL_QC_COMMIT_WORST_CASE' => 'Commit Miktarı (En Kötü Durum):',
  'LBL_FORECAST_FOR' => 'Tahmin Çalışma Sayfası:',
  'LBL_FMT_DIRECT_FORECAST' => '(Doğrudan)',
  'LBL_GRAPH_TITLE' => 'Tahmin Tarihçesi',
  'LBL_GRAPH_QUOTA_ALTTEXT' => '%s için kota',
  'LBL_GRAPH_COMMIT_ALTTEXT' => '%s için Commit Miktarı',
  'LBL_GRAPH_OPPS_ALTTEXT' => '%s de(da) kapanan fırsatların değeri',
  'LBL_GRAPH_QUOTA_LEGEND' => 'Kota',
  'LBL_GRAPH_COMMIT_LEGEND' => 'Commit Edilen Tahmin',
  'LBL_GRAPH_OPPS_LEGEND' => 'Kapanan Fırsatlar',
  'LBL_TP_QUOTA' => 'Kota:',
  'LBL_CHART_FOOTER' => 'Tahmin Tarihçesi<br />"Kota - Tahmin Edilmiş Miktar - Kapanmış Fırsat Değeri" Karşılaştırması',
  'LBL_TOTAL_VALUE' => 'Toplamlar:',
  'LBL_COPY_AMOUNT' => 'Toplam miktar',
  'LBL_COPY_WEIGH_AMOUNT' => 'Toplam ağırlık',
  'LBL_WORKSHEET_AMOUNT' => 'Tahmini toplam Tutar:',
  'LBL_COPY' => 'Değerleri Kopyala',
  'LBL_COMMIT_AMOUNT' => 'Commit Edilen değerler toplamı.',
  'LBL_COPY_FROM' => 'Değer kopyalanacak yer:',
  'LBL_CHART_TITLE' => '"Kota - Committed - Gerçek" Karşılaştırması',
);

