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
  'LBL_WEB' => 'Web',
  'LBL_SUGAR_COMMUNITY_EDITION' => 'Sugar Community Edition',
  'LBL_SUGAR_PROFESSIONAL' => 'Sugar Professional',
  'LBL_SUGAR_ENTERPRISE' => 'Sugar Enterprise',
  'LBL_WIKI' => 'Wiki',
  'dashlet_categories_dom' => 
  array (
    'Portal' => 'Portal',
    'Module Views' => 'Modül Görünümleri',
    'Charts' => 'Grafikler',
    'Tools' => 'Araçlar',
    'Miscellaneous' => 'Diğerleri',
  ),
  'LBL_MODULE_NAME' => 'Ana Sayfa',
  'LBL_MODULES_TO_SEARCH' => 'Aranacak Modüller',
  'LBL_NEW_FORM_TITLE' => 'Yeni Kontak',
  'LBL_FIRST_NAME' => 'Adı:',
  'LBL_LAST_NAME' => 'Soyadı:',
  'LBL_LIST_LAST_NAME' => 'Soyadı',
  'LBL_PHONE' => 'Telefon:',
  'LBL_EMAIL_ADDRESS' => 'E-Posta Adresi:',
  'LBL_MY_PIPELINE_FORM_TITLE' => 'Pipeline\'ım',
  'LBL_PIPELINE_FORM_TITLE' => 'Satış Aşamalarına Göre Pipeline\'ım',
  'LBL_CAMPAIGN_ROI_FORM_TITLE' => 'Kampanya Yatırım Dönüşüm Oranı (ROI)',
  'LBL_MY_CLOSED_OPPORTUNITIES_GAUGE' => 'Kazanılarak Kapanan Fırsatlarım Ölçüsü',
  'LNK_NEW_CONTACT' => 'Kontak Oluştur',
  'LNK_NEW_ACCOUNT' => 'Müşteri Oluştur',
  'LNK_NEW_OPPORTUNITY' => 'Fırsat Oluştur',
  'LNK_NEW_QUOTE' => 'Fiyat Teklifi Oluştur',
  'LNK_NEW_LEAD' => 'Potansiyel Oluştur',
  'LNK_NEW_CASE' => 'Talep Oluştur',
  'LNK_NEW_NOTE' => 'Not veya Ek Oluştur',
  'LNK_NEW_CALL' => 'Tel.Araması Planla',
  'LNK_NEW_EMAIL' => 'E-Posta Arşivle',
  'LNK_COMPOSE_EMAIL' => 'E-Posta Oluştur',
  'LNK_NEW_MEETING' => 'Toplantı Planla',
  'LNK_NEW_TASK' => 'Görev Oluştur',
  'LNK_NEW_BUG' => 'Kusur Raporla',
  'LBL_ADD_BUSINESSCARD' => 'Kartvizit Girişi Yap',
  'ERR_ONE_CHAR' => 'Aramanız için lütfen en az bir karakter veya numara giriniz ...',
  'LBL_OPEN_TASKS' => 'Açık Kalan Görevlerim',
  'LBL_SEARCH_RESULTS' => 'Arama Sonuçları',
  'LBL_SEARCH_RESULTS_IN' => 'içinde',
  'LNK_NEW_SEND_EMAIL' => 'E-Posta Oluştur',
  'LBL_NO_ACCESS' => 'Bu bölüme erişim izniniz yok. Erişim elde etmek için lütfen site yöneticiniz ile temasa geçin.',
  'LBL_NO_RESULTS_IN_MODULE' => '-- Sonuç yok --',
  'LBL_NO_RESULTS' => 'Sonuç bulunamadı. Lütfen tekrar arayın.',
  'LBL_NO_RESULTS_TIPS' => 'Arama İpuçları:<br />Uygun kategoriyi yukarıda seçtiğinizden emin olun.<br />Arama kriterini genişletin.<br />Hala sonuç dönmüyorsa, gelişmiş arama kriterlerini kullanın.',
  'LBL_RELOAD_PAGE' => 'Lütfen bu Sugar Dashlet\'ini kullanmak için <a href="javascript: window.location.reload()">sayfayı tekrar yükleyin</a>.',
  'LBL_ADD_DASHLETS' => 'Sugar Dashlet Ekle',
  'LBL_ADD_PAGE' => 'Sayfa Ekle',
  'LBL_DEL_PAGE' => 'Sayfayı Sil',
  'LBL_WEBSITE_TITLE' => 'Web Sitesi',
  'LBL_RSS_TITLE' => 'Haber Beslemesi',
  'LBL_DELETE_PAGE' => 'Sayfayı Sil',
  'LBL_CHANGE_LAYOUT' => 'Yerleşimi Değiştir',
  'LBL_RENAME_PAGE' => 'Sayfayı Yeniden Adlandır',
  'LBL_CLOSE_DASHLETS' => 'Kapat',
  'LBL_CLOSE_SITEMAP' => 'Kapat',
  'LBL_OPTIONS' => 'Seçenekler',
  'LBL_TODAY' => 'Bugün',
  'LBL_YESTERDAY' => 'Dün',
  'LBL_TOMORROW' => 'Yarın',
  'LBL_LAST_WEEK' => 'Geçen Hafta',
  'LBL_NEXT_WEEK' => 'Önümüzdeki Hafta',
  'LBL_LAST_7_DAYS' => 'Son 7 Gün',
  'LBL_NEXT_7_DAYS' => 'Önümüzdeki 7 Gün',
  'LBL_LAST_MONTH' => 'Geçen Ay',
  'LBL_NEXT_MONTH' => 'Gelecek Ay',
  'LBL_LAST_QUARTER' => 'Son Çeyrek',
  'LBL_THIS_QUARTER' => 'Bu Çeyrek',
  'LBL_LAST_YEAR' => 'Önceki Yıl',
  'LBL_NEXT_YEAR' => 'Gelecek Yıl',
  'LBL_LAST_30_DAYS' => 'Son 30 Gün',
  'LBL_NEXT_30_DAYS' => 'Gelecek 30 Gün',
  'LBL_THIS_MONTH' => 'Bu Ay',
  'LBL_THIS_YEAR' => 'Bu Yıl',
  'LBL_MODULES' => 'Modüller',
  'LBL_CHARTS' => 'Grafikler',
  'LBL_TOOLS' => 'Araçlar',
  'LBL_MAX_DASHLETS_REACHED' => 'Sistem yöneticisinin izin verdiği maksimum sayıda Sugar Dashlet\'e ulaştınız. Yeni bir Sugar Dashlet eklemek için, lütfen eski bir tane siliniz.',
  'LBL_ADDING_DASHLET' => 'Sugar Dashlet Ekleniyor ...',
  'LBL_ADDED_DASHLET' => 'Sugar Dashlet Eklendi',
  'LBL_REMOVE_DASHLET_CONFIRM' => 'Bu Sugar Dashlet\'i kaldırmak istediğinizden emin misiniz?',
  'LBL_REMOVING_DASHLET' => 'Sugar Dashlet Kaldırılıyor ...',
  'LBL_REMOVED_DASHLET' => 'Sugar Dashlet Kaldırıldı',
  'LBL_DASHLET_CONFIGURE_GENERAL' => 'Genel',
  'LBL_DASHLET_CONFIGURE_FILTERS' => 'Filtreler',
  'LBL_DASHLET_CONFIGURE_MY_ITEMS_ONLY' => 'Yalnızca Benim Kalemlerim',
  'LBL_DASHLET_CONFIGURE_TITLE' => 'Ünvan',
  'LBL_DASHLET_CONFIGURE_DISPLAY_ROWS' => 'Satırları Göster',
  'LBL_DASHLET_DELETE' => 'Sugar Dashlet Sil',
  'LBL_DASHLET_REFRESH' => 'Sugar Dashlet Yeniden Yükle',
  'LBL_DASHLET_EDIT' => 'Sugar Dashlet Düzenle',
  'LBL_TRAINING_TITLE' => 'Eğitim',
  'LBL_CREATING_NEW_PAGE' => 'Yeni Sayfa Oluşturuluyor...',
  'LBL_NEW_PAGE_FEEDBACK' => 'Yeni bir sayfa oluşturdunuz. Sugar Dashlet Ekle ile yeni içerik ekleyebilirsiniz.',
  'LBL_DELETE_PAGE_CONFIRM' => 'Bu sayfayı silmek istediğinizden emin misiniz?',
  'LBL_SAVING_PAGE_TITLE' => 'Sayfa Başlığı Kaydediliyor...',
  'LBL_RETRIEVING_PAGE' => 'Sayfa Getiriliyor...',
  'LBL_HOME_PAGE_1_NAME' => 'Benim Sugar\'ım',
  'LBL_HOME_PAGE_2_NAME' => 'Satışlar',
  'LBL_HOME_PAGE_3_NAME' => 'Destek',
  'LBL_HOME_PAGE_6_NAME' => 'Pazarlama',
  'LBL_HOME_PAGE_4_NAME' => 'Performans İzleyicisi',
  'LBL_SEARCH' => 'Ara',
  'LBL_CLEAR' => 'Temizle',
  'LBL_BASIC_CHARTS' => 'Temel Grafikler',
  'LBL_REPORT_CHARTS' => 'Rapor Grafikleri',
  'LBL_MY_FAVORITE_REPORT_CHARTS' => 'Favori Raporlarım',
  'LBL_GLOBAL_REPORT_CHARTS' => 'Global Takım Raporları',
  'LBL_MY_TEAM_REPORT_CHARTS' => 'Takımımın Raporları',
  'LBL_MY_SAVED_REPORT_CHARTS' => 'Kaydedilmiş Raporlarım',
  'LBL_DASHLET_SEARCH' => 'Sugar Dashlet Arama',
  'LBL_VERSION' => 'Versiyon',
  'LBL_BUILD' => 'Kur',
  'LBL_AND' => 've',
  'LBL_ARE' => 'lar',
  'LBL_TRADEMARKS' => 'ticari markalar',
  'LBL_OF' => '/',
  'LBL_FOUNDERS' => 'Kurucular',
  'LBL_JOIN_SUGAR_COMMUNITY' => 'Sugar Community\'e Katıl',
  'LBL_DETAILS_SUGARFORGE' => 'Sugar kapsamını geliştir ve birlikte çalış',
  'LBL_DETAILS_SUGAREXCHANGE' => 'Sertifikalı Sugar uzantıları satın ve satın alın',
  'LBL_TRAINING' => 'Eğitim',
  'LBL_DETAILS_TRAINING' => 'Sugar\'ı çevrimiçi ve interaktif eğitim içeriğinden öğren.',
  'LBL_FORUMS' => 'Forumlar',
  'LBL_DETAILS_FORUMS' => 'Uzman grup kullanıcıları ve uygulama geliştiriciler ile Sugar ile ilgili konuları tartışın',
  'LBL_DETAILS_WIKI' => 'Kullanıcı ve Uygulama Geliştirici konularını Bilgi Bankasından araştırın',
  'LBL_DEVSITE' => 'Uygulama Geliştirici Sitesi',
  'LBL_DETAILS_DEVSITE' => 'Sugar geliştirmelerini hızlandırmak için kaynakları, pratik dokümanları, ve faydalı link\'leri keşfedin',
  'LBL_GET_SUGARCRM_RSS' => 'SugarCRM RSS al',
  'LBL_SUGARCRM_NEWS' => 'SugarCRM Haberleri',
  'LBL_SUGARCRM_TRAINING_NEWS' => 'SugarCRM Eğitim Haberleri',
  'LBL_SUGARCRM_FORUMS' => 'SugarCRM Forumları',
  'LBL_SUGARFORGE_NEWS' => 'SugarForge Haberleri',
  'LBL_ALL_NEWS' => 'Bütün Haberler',
  'LBL_LINK_CURRENT_CONTRIBUTORS' => 'Sugar geliştiricileri listesine ulaşmak için bu link\'e tıklayınız!',
  'LBL_SOURCE_CODE' => 'Kaynak Kod',
  'LBL_SOURCE_SUGAR' => 'Sugar - Dünyanın en popüler Satış Gücü Otomasyonu uygulaması olup SugarCRM Inc. tarafından yaratılmıştır.',
  'LBL_SOURCE_XTEMPLATE' => 'XTemplate - Barnabás Debreceni tarafından yaratılan PHP şablon motoru.',
  'LBL_SOURCE_NUSOAP' => 'NuSOAP - NuSphere Corporation ve Dietrich Ayala tarafından, web service oluşturmak ve kullanmak için oluşturulmuş PHP nesneleri.',
  'LBL_SOURCE_JSCALENDAR' => 'JS Calendar - Mihai Bazon tarafından tarihleri girmek için oluşturulmuş takvim.',
  'LBL_SOURCE_PHPPDF' => 'PHP PDF - Wayne Munro tarafından PDF dokümanları yaratabilmek için oluşturulmuş kod kütüphanesi.',
  'LBL_SOURCE_JSONPHP' => 'JSON.php - JSON formatından ve JSON formatına çeviri için Michal Migurski tarafından hazırlanmış PHP script.',
  'LBL_SOURCE_JSON' => 'JSON.js - JavaScript ile yazılmış JSON yorumlayıcı ve JSON stringifier.',
  'LBL_SOURCE_HTTP_WEBDAV_SERVER' => 'HTTP_WebDAV_Server - PHP ile WebDAV Server Uyarlaması.',
  'LBL_SOURCE_JS_O_LAIT' => 'JavaScript O Lait - Javascript\'in güçlendirilmesi için Jan-Klaas Kollhof tarafından geliştirilmiş kod kütüphanesi.',
  'LBL_SOURCE_PCLZIP' => 'PclZip - Vincent Blavet tarafından geliştirilmiş, Zip formatındaki arşivler için sıkıştırma ve açma kod kütüphanesi.',
  'LBL_SOURCE_SMARTY' => 'Smarty - PHP işin şablon motoru.',
  'LBL_SOURCE_OVERLIBMWS' => 'Overlibmws - İstemci-tarafında pencere yönetimi için kullanılan JavaScript kod kütüphanesi.',
  'LBL_SOURCE_YAHOO_UI_LIB' => 'Yahoo! User Interface Library - Zengin istemci özellikleri sağlamak için kullanılan UI Destek Kütüphanesi.',
  'LBL_SOURCE_PHPMAILER' => 'PHPMailer - PHP için tüm yetenekleri barındıran e-posta nesnesi',
  'LBL_SOURCE_CRYPT_BLOWFISH' => 'Crypt_Blowfish - MCrypt PHP ekine gerek kalmadan, iki yönlü blowfish şifreleme sağlamaktadır.',
  'LBL_SOURCE_HTML_SAFE' => 'HTML_Safe - HTML içindeki bütün tehlikeli içeriği yok eden yorumlayıcı.',
  'LBL_SOURCE_XML_HTMLSAX3' => 'XML_HTMLSax3 - HTML ve diğer kötü formatlanmış XML dosyaları için SAX yorumlayıcı',
  'LBL_SOURCE_YAHOO_UI_LIB_EXT' => 'Yahoo! UI Extensions Library - Jack Slocum tarafından hazırlanmış, Yahoo! User Interface Kütüphanesine ek.',
  'LBL_SOURCE_JSMIN' => 'JSMin - JavaScript dosyalarından açıklama ve gereksiz boşluk karakterlerini çıkaran filtre.',
  'LBL_SOURCE_SWFOBJECT' => 'SWFObject - Javascript Flash Player olup olmadığını bulan script.',
  'LBL_SOURCE_TINYMCE' => 'TinyMCE - Web Browserları için WYSIWYG editor olup, kullanıcıların HTML içeriğini değiştirebilmelerine izin vermektedir.',
  'LBL_SOURCE_EXT' => 'Ext - Uygulama geliştirebilmek için İstemci tarafı JavaScript framework.',
  'LBL_SOURCE_RECAPTCHA' => 'reCAPTCHA sitenizin kötü niyetli ataklara karşı (örneğin fikir beyanı spam\'leri veya gerçek dışı kayıt yaratılması gibi) CAPTCHA aracılığı ile insan müdahalesini gerektirerek korumayı sağlar.',
  'LBL_SOURCE_TCPDF' => 'TCPDF - PDF dokümanları oluşturabilmek için PHP nesnesi.',
  'LBL_DASHLET_TITLE' => 'Sitelerim',
  'LBL_DASHLET_OPT_TITLE' => 'Başlık',
  'LBL_DASHLET_OPT_URL' => 'Web Sitesinin yeri',
  'LBL_DASHLET_OPT_HEIGHT' => 'Dashlet Yüksekliği (pixel bazında)',
  'LBL_DASHLET_SUGAR_NEWS' => 'Sugar Haberleri',
  'LBL_DASHLET_DISCOVER_SUGAR_PRO' => 'Sugarı keşfedin',
);

