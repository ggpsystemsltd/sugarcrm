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







	
$connector_strings = array (
  'LBL_ID' => 'ID',
  'LBL_DUNS' => 'DUNS',
  'hoovers_wsdl' => 'WSDL URL',
  'LBL_LICENSING_INFO' => '<table border="0" cellspacing="1"><tr><td valign="top" width="35%" class="dataLabel"><image src="' . getWebPath('modules/Connectors/connectors/sources/ext/soap/hoovers/images/hooversLogo.gif') . '" border="0"></td><td width="65%" valign="top" class="dataLabel">' .
  			  'Hoovers©, şirketler hakkındaki güncel bilgileri SugarCRM ürünlerini kullanan kullanıcılarla ücretsiz sağlar. Daha fazla bilgi ve şirketler hakkındaki raporlar için <a href="http://www.hoovers.com" target="_blank">http://www.hoovers.com</a>.</td></tr></table>',
  
  'LBL_NAME' => 'Şirket Adı',
  'LBL_PARENT_DUNS' => 'Ana DUNS',
  'LBL_STREET' => 'Sokak',
  'LBL_ADDRESS_STREET1' => '1.Adres',
  'LBL_ADDRESS_STREET2' => '2.Adres',
  'LBL_CITY' => 'Şehir',
  'LBL_STATE' => 'Eyalet',
  'LBL_COUNTRY' => 'Ülke',
  'LBL_ZIP' => 'Posta Kodu',
  'LBL_FINSALES' => 'Yıllık Satış Miktarı',
  'LBL_HQPHONE' => 'Ofis Telefonu',
  'LBL_TOTAL_EMPLOYEES' => 'Toplam Çalışan',
  'LBL_PRIMARY_URL' => 'Esas URL',
  'LBL_DESCRIPTION' => 'Tanım',
  'LBL_SYNOPSIS' => 'Özet',
  'LBL_LOCATION_TYPE' => 'Konum Tipi',
  'LBL_COMPANY_TYPE' => 'Şirket Tipi',
  'ERROR_NULL_CLIENT' => 'Hoovers\'a bağlanmak için SoapClient oluşturulamadı. Servis kullanım dışı veya lisans anahtarınızın süresi doldu veya günlük kullanım limitine ulaştınız.',
  'ERROR_MISSING_SOAP_LIBRARIES' => 'Hata: SOAP kütüphaneleri yüklenemiyor (SoapClient, SoapHeader).',
  'hoovers_endpoint' => 'Bitiş Noktası URL',
  'hoovers_api_key' => 'API Anahtarı',
);


