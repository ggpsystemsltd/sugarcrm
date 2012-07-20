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
  'ERR_NO_OPPS' => 'Lütfen, Fırsat grafiğini görmek için birkaç Fırsat oluşturun.',
  'LBL_ALL_OPPORTUNITIES' => 'Tüm fırsatların toplam miktarı',
  'LBL_CHART_TYPE' => 'Grafik Türü:',
  'LBL_CREATED_ON' => 'Son Çalışma',
  'LBL_CLOSE_DATE_START' => 'Tahmini Kapanış Tarihi - Kimden:',
  'LBL_CLOSE_DATE_END' => 'Tahmini Kapanış Tarihi - Kime:',
  'LBL_DATE_END' => 'Bitiş Tarihi:',
  'LBL_DATE_RANGE_TO' => 'ile',
  'LBL_DATE_RANGE' => 'Tarih aralığı',
  'LBL_DATE_START' => 'Başlangıç Tarihi:',
  'LBL_EDIT' => 'Düzenle',
  'LBL_LEAD_SOURCE_BY_OUTCOME_DESC' => 'Seçili Kaynak, Sonuç ve Kullanıcılara göre toplam fırsat miktarını gösterir. Sonuç, Kapandı-Kazanıldı, Kapandı-Kaybedildi ya da herhangi başka bir değer içeren satış aşamasına göredir.',
  'LBL_LEAD_SOURCE_BY_OUTCOME' => 'Potansiyel Kaynağına, Sonuçlara göre Tüm Fırsatlar',
  'LBL_LEAD_SOURCE_FORM_DESC' => 'Seçilen kullanıcılar için, seçilen potansiyel kaynağına göre fırsatlar miktarını gösterir.',
  'LBL_LEAD_SOURCE_FORM_TITLE' => 'Potansiyel Kaynaklarına göre Bütün Fırsatlar',
  'LBL_LEAD_SOURCE_OTHER' => 'Diğer',
  'LBL_LEAD_SOURCES' => 'Potansiyel Kaynaklar:',
  'LBL_MODULE_NAME' => 'Gösterge Panosu',
  'LBL_MODULE_TITLE' => 'Gösterge Panosu: Ana Sayfa',
  'LBL_MONTH_BY_OUTCOME_DESC' => 'Tahmini kapanış tarihi ile girilen tarih aralığında kalan aylara göre seçili kullanıcılara ve sonuç şekline göre toplam fırsat miktarını gösterir. Sonuç, Kapandı-Kazanıldı, Kapandı-Kaybedildi ya da herhangi başka bir değer içeren satış aşamasına göredir.',
  'LBL_NUMBER_OF_OPPS' => 'Fırsat Sayısı',
  'LBL_OPP_SIZE' => 'Fırsat büyüklüğü',
  'LBL_OPP_THOUSANDS' => 'Bin',
  'LBL_OPPS_IN_LEAD_SOURCE' => 'fırsatlar için Potansitel Kaynağı:',
  'LBL_OPPS_IN_STAGE' => 'satış aşaması şu olanlar:',
  'LBL_OPPS_OUTCOME' => 'çıktısı şu olanlar:',
  'LBL_OPPS_WORTH' => 'fırsatların değeri',
  'LBL_PIPELINE_FORM_TITLE_DESC' => 'Tahmini sonuçlanma tarihi belirtilen tarih aralığında kalan, seçili satış aşamalarına göre fırsatlarınızın toplamını gösterir.',
  'LBL_CAMPAIGN_ROI_TITLE_DESC' => 'ROI\'ye göre Kampanya Yanıtlarını gösterir.',
  'LBL_REFRESH' => 'Yenile',
  'LBL_ROLLOVER_DETAILS' => 'Detay görmek için bar çubuğu üzerine geliniz.',
  'LBL_ROLLOVER_WEDGE_DETAILS' => 'Detay görmek için üzerine geliniz.',
  'LBL_SALES_STAGE_FORM_DESC' => 'Tahmini sonuçlanma tarihi belirtilen tarih aralığında kalan, seçili kullanıcılar için satış aşamalarına göre fırsatların toplamını gösterir.',
  'LBL_SALES_STAGE_FORM_TITLE' => 'Satış Aşamalarına Göre Satış Olasılıkları',
  'LBL_SALES_STAGES' => 'Satış Aşamaları:',
  'LBL_TOTAL_PIPELINE' => 'Satış Olasılıkları toplamı',
  'LBL_USERS' => 'Kullanıcılar:',
  'LBL_YEAR_BY_OUTCOME' => 'Aylık Neticelenme Durumuna Göre Satış Olasılıkları',
  'LBL_YEAR' => 'Yıl:',
  'LNK_NEW_ACCOUNT' => 'Müşteri Oluştur',
  'LNK_NEW_CALL' => 'Tel.Araması Planla',
  'LNK_NEW_CASE' => 'Talep Oluştur',
  'LNK_NEW_CONTACT' => 'Kontak Oluştur',
  'LNK_NEW_ISSUE' => 'Kusur Raporla',
  'LNK_NEW_LEAD' => 'Talep Oluştur',
  'LNK_NEW_MEETING' => 'Toplantı Planla',
  'LNK_NEW_NOTE' => 'Not veya Ek oluştur',
  'LNK_NEW_OPPORTUNITY' => 'Fırsat Oluştur',
  'LNK_NEW_QUOTE' => 'Teklif Oluştur',
  'LNK_NEW_TASK' => 'Görev Oluştur',
  'NTC_NO_LEGENDS' => 'Boş',
  'LBL_TITLE' => 'Ünvan:',
  'LBL_MY_MODULES_USED_SIZE' => 'Erişim Sayısı',
);

