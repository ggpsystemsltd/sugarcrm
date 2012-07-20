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


	
$connector_strings = array (
  'LBL_ID' => 'ID',
  'LBL_LICENSING_INFO' => '<table border="0" cellspacing="1"><tr><td valign="top" width="35%" class="dataLabel"><image src="' . getWebPath('modules/Connectors/connectors/sources/ext/rest/zoominfoperson/images/zoominfo.gif') . '" border="0"></td><td width="65%" valign="top" class="dataLabel">' .
                          'ZoomInfo© 5 milyon şirket üzerinde çalışan 45 milyon iş adamı hakkında detaylı bilgi sağlar. Daha fazlası için <a target="_blank" href="http://www.zoominfo.com/about">http://www.zoominfo.com/about</a></td></tr></table>',
  
  'LBL_SEARCH_FIELDS_INFO' => 'Aşağıdaki alanlar Zoominfo© Şirketi; API: Şirket İsmi, Şehir, Eyalet ve Posta Kodu tarafından desteklenmektedir.',
  'LBL_EMAIL' => 'E-Posta Adresi',
  'LBL_FIRST_NAME' => 'Adı',
  'LBL_LAST_NAME' => 'Soyadı',
  'LBL_JOB_TITLE' => 'İş Ünvanı',
  'LBL_IMAGE_URL' => 'Resim URL\'i',
  'LBL_SUMMARY_URL' => 'Özet URL\'i',
  'LBL_COMPANY_NAME' => 'Şirket Adı',
  'LBL_ZOOMPERSON_URL' => 'Zoominfo Kişi URL',
  'LBL_DIRECT_PHONE' => 'Ana Telefon',
  'LBL_COMPANY_PHONE' => 'Şirket Telefonu',
  'LBL_FAX' => 'Faks',
  'LBL_CURRENT_JOB_TITLE' => 'Mevcut İş Ünvanı',
  'LBL_CURRENT_JOB_START_DATE' => 'Mevcut İş Başlama Tarihi',
  'LBL_CURRENT_JOB_COMPANY_NAME' => 'Mevcut İş Şirket Adı',
  'LBL_CURRENT_JOB_COMPANY_STREET' => 'Mevcut İş Sokak Adresi',
  'LBL_CURRENT_JOB_COMPANY_CITY' => 'Mevcut İş Şehir Adresi',
  'LBL_CURRENT_JOB_COMPANY_STATE' => 'Mevcut İş Bölge Adresi',
  'LBL_CURRENT_JOB_COMPANY_ZIP' => 'Mevcut İş Posta Kodu',
  'LBL_CURRENT_JOB_COMPANY_COUNTRY_CODE' => 'Mevcut İş Ülke Kodu',
  'LBL_CURRENT_INDUSTRY' => 'Mevcut İş Endüstri',
  'LBL_BIOGRAPHY' => 'Biyografi',
  'LBL_EDUCATION_SCHOOL' => 'Kolej/Üniversite',
  'LBL_AFFILIATION_TITLE' => 'İlişkili İş Ünvanı',
  'LBL_AFFILIATION_COMPANY_PHONE' => 'İlişkili Şirket Telefonu',
  'LBL_AFFILIATION_COMPANY_NAME' => 'İlişkili Şirket Adı',
  'LBL_AFFILIATION_COMPANY_WEBSITE' => 'İlişkili Şirket Websitesi',
  'person_search_url' => 'Kişi Arama Sorgu URL\'i',
  'person_detail_url' => 'Kişi Detay Sorgu URL\'i',
  'partner_code' => 'Ortak API Kodu',
  'api_key' => 'API Anahtarı',
  'ERROR_LBL_CONNECTION_PROBLEM' => 'Hata: Zoominfo - Şirket bağlantısı için sunucuya bağlanılamıyor.',
);




