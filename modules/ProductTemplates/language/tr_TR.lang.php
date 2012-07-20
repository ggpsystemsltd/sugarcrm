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
  'ERR_DELETE_RECORD' => 'Ürünü silmek için bir kayıt numarası belirtmelisiniz.',
  'LBL_ACCOUNT_NAME' => 'Müşteri Adı:',
  'LBL_ASSIGNED_TO' => 'Atanan Kişi:',
  'LBL_ASSIGNED_TO_ID' => 'Atanan Kullanıcı ID:',
  'LBL_CATEGORY_NAME' => 'Kategori Adı:',
  'LBL_CATEGORY' => 'Kategori:',
  'LBL_CONTACT_NAME' => 'Kontak Adı:',
  'LBL_COST_PRICE' => 'Maliyet:',
  'LBL_COST_USDOLLAR' => 'Maliyet (Dolar):',
  'LBL_CURRENCY' => 'Para Birimi:',
  'LBL_CURRENCY_SYMBOL_NAME' => 'Para Birimi Sembolü:',
  'LBL_DATE_AVAILABLE' => 'Geçerli Tarih:',
  'LBL_DATE_COST_PRICE' => 'Tarih - Maliyet - Fiyat:',
  'LBL_DESCRIPTION' => 'Tanım:',
  'LBL_DISCOUNT_PRICE_DATE' => 'İndirimli Fİyat Tarihi:',
  'LBL_DISCOUNT_PRICE' => 'Birim Fiyatı:',
  'LBL_DISCOUNT_USDOLLAR' => 'İndirimli Fiyat (Dolar):',
  'LBL_LIST_CATEGORY' => 'Kategori:',
  'LBL_LIST_CATEGORY_ID' => 'Kategori ID:',
  'LBL_LIST_COST_PRICE' => 'Maliyet:',
  'LBL_LIST_DISCOUNT_PRICE' => 'Fiyat:',
  'LBL_LIST_FORM_TITLE' => 'Ürün Katalog Listesi',
  'LBL_LIST_LBL_MFT_PART_NUM' => 'Ürtc No',
  'LBL_LIST_LIST_PRICE' => 'Liste Fiyatı',
  'LBL_LIST_MANUFACTURER' => 'Üretici',
  'LBL_LIST_MANUFACTURER_ID' => 'Üretici ID:',
  'LBL_LIST_NAME' => 'İsim',
  'LBL_LIST_PRICE' => 'Liste Fiyatı:',
  'LBL_LIST_QTY_IN_STOCK' => 'Adet',
  'LBL_LIST_STATUS' => 'Elde Bulunma',
  'LBL_LIST_TYPE' => 'Cinsi:',
  'LBL_LIST_TYPE_ID' => 'Cinsi:',
  'LBL_LIST_USDOLLAR' => 'Liste Fiyatı (Dolar):',
  'LBL_MANUFACTURER_NAME' => 'Üretici Adı:',
  'LBL_MANUFACTURER' => 'Üretici:',
  'LBL_MFT_PART_NUM' => 'Ürtc Parça Numarası:',
  'LBL_MODULE_NAME' => 'Ürün Kataloğu',
  'LBL_MODULE_ID' => 'Ürün Şablonları',
  'LBL_MODULE_TITLE' => 'Ürün Kataloğu: Ana Sayfa',
  'LBL_NAME' => 'Ürün Adı:',
  'LBL_NEW_FORM_TITLE' => 'Öğe Oluştur',
  'LBL_PERCENTAGE' => 'Yüzde(%)',
  'LBL_POINTS' => 'Puanlar',
  'LBL_PRICING_FORMULA' => 'Varsayılan Fiyatlama Formülü:',
  'LBL_PRICING_FACTOR' => 'Fiyatlandırma Faktörü:',
  'LBL_PRODUCT' => 'Ürün:',
  'LBL_PRODUCT_ID' => 'Ürün ID:',
  'LBL_QUANTITY' => 'Stok Miktarı:',
  'LBL_RELATED_PRODUCTS' => 'İlişkili Ürün',
  'LBL_SEARCH_FORM_TITLE' => 'Ürün Kataloğu Ara',
  'LBL_STATUS' => 'Elde Bulunma',
  'LBL_SUPPORT_CONTACT' => 'Destek Veren Kontak:',
  'LBL_SUPPORT_DESCRIPTION' => 'Destek Tanımı:',
  'LBL_SUPPORT_NAME' => 'Destek Adı:',
  'LBL_SUPPORT_TERM' => 'Destek Süresi:',
  'LBL_TAX_CLASS' => 'Vergi Sınıfı:',
  'LBL_TYPE_NAME' => 'Tip Adı',
  'LBL_TYPE' => 'Tipi',
  'LBL_URL' => 'Ürün URL:',
  'LBL_VENDOR_PART_NUM' => 'Satıcı Parça Numarası:',
  'LBL_WEIGHT' => 'Ağırlık:',
  'LNK_IMPORT_PRODUCTS' => 'Ürünleri içeri al',
  'LNK_NEW_MANUFACTURER' => 'Üreticiler',
  'LNK_NEW_PRODUCT_CATEGORY' => 'Ürün Kategorileri',
  'LNK_NEW_PRODUCT_TYPE' => 'Ürün Tipleri',
  'LNK_NEW_PRODUCT' => 'Katalog için Ürün Oluştur',
  'LNK_NEW_SHIPPER' => 'Nakliyat Firmaları',
  'LNK_PRODUCT_LIST' => 'Ürün Kataloğunu Göster',
  'NTC_DELETE_CONFIRMATION' => 'Bu kaydı silmek istediğinizden emin misiniz?',
);

