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
  'LBL_URL' => 'URL',
  'LBL_MODULE_NAME' => 'Takım Bildirimleri',
  'LBL_MODULE_TITLE' => 'Takım Bildirimleri: Ana Sayfa',
  'LBL_SEARCH_FORM_TITLE' => 'Takım Bildirim Arama',
  'LBL_LIST_FORM_TITLE' => 'Takım Bildirim Listesi',
  'LBL_PRODUCTTYPE' => 'Takım Bildirimi',
  'LBL_NOTICES' => 'Takım Bildirimleri',
  'LBL_LIST_NAME' => 'Başlık',
  'LBL_URL_TITLE' => 'URL Başlığı',
  'LBL_LIST_DESCRIPTION' => 'Tanım',
  'LBL_NAME' => 'Başlık',
  'LBL_DESCRIPTION' => 'Tanım',
  'LBL_LIST_LIST_ORDER' => 'Sıra',
  'LBL_LIST_ORDER' => 'Sıra',
  'LBL_DATE_START' => 'Başlama Tarihi',
  'LBL_DATE_END' => 'Bitiş Tarihi',
  'LBL_STATUS' => 'Durum',
  'LNK_NEW_TEAM' => 'Takım Oluştur',
  'LNK_NEW_TEAM_NOTICE' => 'Takım Bildirimi Oluştur',
  'LNK_LIST_TEAM' => 'Takımlar',
  'LNK_LIST_TEAMNOTICE' => 'Takım Bildirimleri',
  'LNK_PRODUCT_LIST' => 'Ürün Fiyat Listesi',
  'LNK_NEW_PRODUCT' => 'Ürün Yarat',
  'LNK_NEW_MANUFACTURER' => 'Üreticiler',
  'LNK_NEW_SHIPPER' => 'Nakliyat Sağlayıcıları',
  'LNK_NEW_PRODUCT_CATEGORY' => 'Ürün Kategorileri',
  'LNK_NEW_PRODUCT_TYPE' => 'Ürün Çeşit Listesi',
  'NTC_DELETE_CONFIRMATION' => 'Bu kaydı silmek istediğinizden emin misiniz?',
  'ERR_DELETE_RECORD' => 'Ürün tipini silmek için kayıt numarasını belirtmeniz gerekmektedir.',
  'NTC_LIST_ORDER' => 'Bu ürün tipinin, Ürün Tipi açılan listesinde görünmesini istediğiniz sırayı belirleyin',
  'LBL_TEAM_NOTICE_FEATURES' => 'Özellikler: * Gelişmiş Kullanıcı arayüzü ve Sihirbaz sayesinde, Rapor yaratmak çok daha kolay ve gelişmiş özelliklere sahip. * Komplike Raporlama Kümeleri sayesinde kullanıcılar modüller arası çok fazla detay içeren raporlar hazırlayabiliyor. * Matris Raporları sayesinde birçok özelliği esnek bir görünümde gruplayabilirsiniz. Pivot tabloları oluşturarak, Toplama, Ortalama, Sayı ve Yüzde gibi fonksiyonlar kullanılabilir. Çalışma sırasındaki filtreler, kullanıcıların gerçek zamanda özelliklerde değişiklik yapabilmelerine izin verir.',
  'LBL_TEAM_NOTICE_WIRELESS' => 'SugarCRM uygulamasının yeni mobil görünümü kullanışlılık ve taşınabilirlik arasında getiri götürüyü farkını yok eder. * Geliştirilmiş kullanıcı arayüzü sayesinde değiştirme, detay, liste görünümleri ve ilgili kayıtlar görüntülenebilir, hatta personel klasörlerine, mağaza tercihleri,  ve son öğeler de görüntülenebilir. * Çihaz Bağımsızlığı, kullanıcının SugarCRM verilerine herhangi bir PDA yada akıllı telefon (IPhone ve Blackberry dahil) aracılığı ile ulaşmasını sağlar. * Zengin HTML İstemcisi, standart bir web tarayıcısı üzerinden SugarCRM verilerin temiz sunumu sağlar. * Yeni Arama Yetenekler kullanıcılar bilgileri hızlı bir şekilde bulmasını sağlar.',
  'LBL_TEAM_NOTICE_DATA_IMPORT' => 'Veri Aktarma Yenilikleri ile artık Excel, Act!, MS Outlook ve Salesforce.com gibi uygulamalardan SugarCRM\'e veri aktarımı çok daha kolay. Yenilikler: * Geliştirilmiş Arayüz, kullanıcılara veri eşlemelerinde büyük kolaylıklar yaratıyor ve verinin doğru bir biçimde aktarılmasını sağlar. * Veri Kalite Kontrolü sayesinde, sistem yöneticileri, aktarılan verilerden yeni kayıtlar oluşturması, veya var olan kayıtları güncellenmesini sağlayarak, veri kirliliği engellenebilir. Tüm Modüllere aktarma sayesinde diğer CRM uygulamalarından herhangi bir modüle veri aktarımı yapılabilir, böylece tekrar veri girişi engellenmiş olur.',
  'LBL_TEAM_NOTICE_MODULE_BUILDER' => 'Modül Yaratıcı sayesinde mevcut SugarCRM modüllerinize yaratıcı yeni modüller ekleyebilirsiniz. Yenilikler: Yeni İlişkiler sayesinde, yeni ve eski modüller arasında farklı şekillerde ilişkiler kurulabilir. * Denetlemeler sayesinde modül yaratma ve değişikliklerin tarihçesi tutulur ve böylece yapılan değişiklikler takip edilebilir. * Gösterge Panoları Destekleri sayesinde özel nesne ve modül işlevselliklerinin AJAX ile görüntülenmesine olanak sağlar. * Yeni Şablonlar sayesinde dosyalar ve yeni fırsat bilgileri kolaylıkla takip edilebilir.',
  'LBL_TEAM_NOTICE_TRACKER' => 'Takipçi sayesinde SugarCRM\'in kullanım ve performansı hakkında geniş bir bilgiye erişilebilir. Yenilikler: * Takipçi Raporlar sistem kullanımı içine anlık görüntüler sağlayarak, kullanıcı adaptasyonunu ve CRM\'den faydalanmak için görünürlüğü arttırır. Kullanıcılar haftalık raporlar alarak, aktiviteleri, kayıtları, görüntülenen modülleri, kümülatif sistemde geçirdikleri süre ve diğer takım arkadaşlarının bilgilerine ulaşabilirler. * Sistem monitörleri sayesinde Sistem Yöneticileri uygulamanın nasıl kullanıldığını ve farklı stres noktalarını belirleyebilirler.',
  'dom_status' => 
  array (
    'Visible' => 'Görünür',
    'Hidden' => 'Gizli',
  ),
);

