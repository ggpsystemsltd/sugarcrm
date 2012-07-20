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
  'LBL_FIND_OPTIMUM_KEY' => 'f',
  'LBL_TEST_BUTTON_KEY' => 't',
  'LBL_ASSIGN_TEAM' => 'Takıma Ata',
  'LBL_RE' => 'YNT:',
  'ERR_BAD_LOGIN_PASSWORD' => 'Kullanıcı Adı veya Şifre Hatalı',
  'ERR_BODY_TOO_LONG' => '\\rBÜTÜN e-posta\'nın alınması için, İçerik metni çok uzun. Kesildi.',
  'ERR_INI_ZLIB' => 'Zlib sıkıştırması geçici süre durdurulamadı.  "Test Ayarları" çalışmayabilir.',
  'ERR_MAILBOX_FAIL' => 'Herhangi bir posta hesabı getirilemedi.',
  'ERR_NO_IMAP' => 'IMAP kütüphanesi bulunamadı.  "Gelen Posta" ile devam etmeden önce, bu problemi çözün',
  'ERR_NO_OPTS_SAVED' => '"Gelen Post" hesabınız için optimum değerler kaydedilmedi.  Lütfen ayarlarınızı gözden geçirin',
  'ERR_TEST_MAILBOX' => 'Lütfen ayarlarınızı kontrol edip, tekrar deneyiniz.',
  'LBL_APPLY_OPTIMUMS' => 'Optimum değerleri uygula',
  'LBL_ASSIGN_TO_USER' => 'Kullanıcıya Ata',
  'LBL_AUTOREPLY_OPTIONS' => 'Otomatik Yanıt Opsiyonları',
  'LBL_AUTOREPLY' => 'Otomatik Yanıt Şablonu',
  'LBL_AUTOREPLY_HELP' => 'E-Posta gönderen kişilerin mesajlarının ulaştığını bildirmek için otomatik bir yanıt seçin.',
  'LBL_BASIC' => 'Posta Hesap Bilgisi',
  'LBL_CASE_MACRO' => 'Talep Makro\'su',
  'LBL_CASE_MACRO_DESC' => 'Yüklenen e-posta\'nın Talep ile ilişkilendirilmesi için yorumlanacak ve kullanılacak makro\'yu belirtin.',
  'LBL_CASE_MACRO_DESC2' => 'Herhangi bir değer belirtin, fakat <b>"%1"</b> değerini koruyun.',
  'LBL_CERT_DESC' => 'E-Posta sunucusunun Güvenlik Sertifikasının denetlenmesini zorla - "self-signing" ise kullanmayınız.',
  'LBL_CERT' => 'Sertifikayı Denetleyin',
  'LBL_CLOSE_POPUP' => 'Pencereyi Kapat',
  'LBL_CREATE_NEW_GROUP' => '--Kaydetme Sırasında Grup Oluştur--',
  'LBL_CREATE_TEMPLATE' => 'Oluştur',
  'LBL_SUBSCRIBE_FOLDERS' => 'Abonelik Dosyaları',
  'LBL_DEFAULT_FROM_ADDR' => 'Varsayılan:',
  'LBL_DEFAULT_FROM_NAME' => 'Varsayılan:',
  'LBL_DELETE_SEEN' => 'Veri Yükleme sonrasında, okunan E-Postaları Sil',
  'LBL_EDIT_TEMPLATE' => 'Düzenle',
  'LBL_EMAIL_OPTIONS' => 'E-Posta Yönetim Seçenekleri',
  'LBL_EMAIL_BOUNCE_OPTIONS' => 'Ulaşmayan E-Posta Yönetim Posta Kutusu',
  'LBL_FILTER_DOMAIN_DESC' => 'Otomatik yanıt gönderilmesini istemediğiniz domain belirtin.',
  'LBL_ASSIGN_TO_GROUP_FOLDER_DESC' => 'Sugar\'da gelen E-Postalardan otomatik olarak E-Posta kayıtları yaratmak için seçin.',
  'LBL_POSSIBLE_ACTION_DESC' => 'Talep Oluştur opsiyonu için, bir Grup Dizini seçilmelidir',
  'LBL_FILTER_DOMAIN' => 'Domain\'e Otomatik Yanıtlama Yok',
  'LBL_FIND_OPTIMUM_MSG' => 'Optimum bağlantı değişkenlerini bul',
  'LBL_FIND_OPTIMUM_TITLE' => 'Optimum Konfigürasyonu Bul',
  'LBL_FIND_SSL_WARN' => '<br>SSL Testi uzun sürebilir.  Lütfen sabırlı olun.<br>',
  'LBL_FORCE_DESC' => 'Bazı IMAP/POP3 sunucular için özel opsiyon ihtiyacı bulunmaktadır. Bağlanırken opsiyonun tersine zorlayın (örneğin, /notls)',
  'LBL_FORCE' => 'Tersine Zorla',
  'LBL_FOUND_MAILBOXES' => 'Aşağıdaki kullanılabilir dizinler bulundu.<br>Seçmek için birine tıklayınız:',
  'LBL_FOUND_OPTIMUM_MSG' => '<br>Optimum ayarlar bulundu.  Lütfen aşağıdaki tuşa basarak, posta hesabınıza uygulayınız.',
  'LBL_FROM_ADDR' => '"Kimden" Adresi',
  'LBL_FROM_NAME_ADDR' => 'Kimden İsim/E-Posta',
  'LBL_FROM_NAME' => '"Kimden" İsmi',
  'LBL_GROUP_QUEUE' => 'Gruba ata',
  'LBL_HOME' => 'Ana Sayfa',
  'LBL_LIST_MAILBOX_TYPE' => 'E-Posta Hesabı Kullanımı',
  'LBL_LIST_NAME' => 'İsim:',
  'LBL_LIST_GLOBAL_PERSONAL' => 'Tip',
  'LBL_LIST_SERVER_URL' => 'E-Posta Sunucusu',
  'LBL_LIST_STATUS' => 'Durum',
  'LBL_LOGIN' => 'Kullanıcı Adı',
  'LBL_MAILBOX_DEFAULT' => 'GELEN KUTUSU',
  'LBL_MAILBOX_SSL_DESC' => 'Bağlanırken SSL kullan. Eğer bu yöntem çalışmazsa, PHP kurulumu konfigurasyonunda "--with-imap-ssl" seçeneğinin olduğunu kontrol edin.',
  'LBL_MAILBOX_SSL' => 'SSL Kullan',
  'LBL_MAILBOX_TYPE' => 'Olası Aksiyonlar',
  'LBL_DISTRIBUTION_METHOD' => 'Dağıtım Metodu',
  'LBL_CREATE_CASE_REPLY_TEMPLATE' => 'Talep Yanıtı Şablonu Oluştur',
  'LBL_CREATE_CASE_REPLY_TEMPLATE_HELP' => 'E-Posta Gönderen kişilere, bir Talebin Oluşturulduğunu bildirmek için otomatik bir yanıt seçin. E-Postanın Konu kısmı Talep Numarası içerir ve bu Talep Makro ayarlarına yapıştırılır. Bu cevap sadece ilk mesaj alıcı tarafından gönderilmiş ise geçerlidir.',
  'LBL_MAILBOX' => 'İzlenen Dosyalar',
  'LBL_TRASH_FOLDER' => 'Silinen Dosya',
  'LBL_GET_TRASH_FOLDER' => 'Silinen Dosyayı Al',
  'LBL_SENT_FOLDER' => 'Gönderilen Dosya',
  'LBL_GET_SENT_FOLDER' => 'Gönderilen Dosyayı al',
  'LBL_SELECT' => 'Seç',
  'LBL_MARK_READ_DESC' => 'Yükleme sırasında E-Posta sunucusundaki mesajları okundu olarak işaretle; silme.',
  'LBL_MARK_READ_NO' => 'E-Posta içeri aktarmadan sonra silindi olarak işaretlendi',
  'LBL_MARK_READ_YES' => 'İçeri aktarmadan sonra sunucuda kalan e-posta',
  'LBL_MARK_READ' => 'Mesajları Sunucuda Bırak',
  'LBL_MAX_AUTO_REPLIES' => 'Otomatik Yanıtlama Sayısı',
  'LBL_MAX_AUTO_REPLIES_DESC' => '24 saatlik zaman diliminde, bir E-Posta adresine gönderilen otomatik yanıtların maksimum adedini belirtin.',
  'LBL_PERSONAL_MODULE_NAME' => 'Kişisel Posta Hesabı',
  'LBL_CREATE_CASE' => 'E-Postadan Talep Oluştur',
  'LBL_CREATE_CASE_HELP' => 'Sugarda gelen E-Postalardan otomatik olarak Talep yaratmak için seçin.',
  'LBL_MODULE_NAME' => 'Grup Posta Hesapları',
  'LBL_BOUNCE_MODULE_NAME' => 'Ulaşmayan E-Posta Yönetim Posta Kutusu',
  'LBL_MODULE_TITLE' => 'Gelen E-Posta',
  'LBL_NAME' => 'İsim',
  'LBL_NONE' => 'Boş',
  'LBL_NO_OPTIMUMS' => 'Optimum değerleri bulamıyor.  Lütfen ayarlarınızı kontrol edip tekrar deneyiniz.',
  'LBL_ONLY_SINCE_DESC' => 'POP3 kullanırken, PHP Yeni/Okunmamış mesajları filtreleyemez.  Bu seçenek posta hesabına son bağlantıdan sonra oluşan mesajların kontrolününe izin verir.  Bu sunucunuz IMAP kullanmıyorsa, performansın önemli ölçüde artmasını sağlayacaktır.',
  'LBL_ONLY_SINCE_NO' => 'Hayır. E-Posta sunucusundaki tüm E-Postaları kontrol et.',
  'LBL_ONLY_SINCE_YES' => 'Evet.',
  'LBL_ONLY_SINCE' => 'Yalnızca Son Kontrolden sonrasını Yükle:',
  'LBL_OUTBOUND_SERVER' => 'Giden E-Posta Sunucusu',
  'LBL_PASSWORD_CHECK' => 'Şifre Kontrol',
  'LBL_PASSWORD' => 'Şifre',
  'LBL_POP3_SUCCESS' => 'POP3 test bağlantınız başarılı.',
  'LBL_POPUP_FAILURE' => 'Test bağlantısı başarısız. Hata aşağıda gösterilmiştir.',
  'LBL_POPUP_SUCCESS' => 'Test bağlantısı başarılı. Ayarlarınız çalışıyor.',
  'LBL_POPUP_TITLE' => 'Ayarları Test Et',
  'LBL_GETTING_FOLDERS_LIST' => 'Dizin Listesini Alıyor',
  'LBL_SELECT_SUBSCRIBED_FOLDERS' => 'Üye Olunan Dizin(leri) seçiniz',
  'LBL_SELECT_TRASH_FOLDERS' => 'Silinen Dosyasını Seçin',
  'LBL_SELECT_SENT_FOLDERS' => 'Gönderilen Dosyayı Seçin',
  'LBL_DELETED_FOLDERS_LIST' => 'Şu dizinler mevcut değil veya sunucudan silindi: %s',
  'LBL_PORT' => 'E-Posta Sunucu Port\'u',
  'LBL_QUEUE' => 'Posta Hesabı Kuyruğu',
  'LBL_REPLY_NAME_ADDR' => 'Yanıt İsim/E-Posta',
  'LBL_REPLY_TO_NAME' => '"Kime" İsmi',
  'LBL_REPLY_TO_ADDR' => '"Kime" Adresi',
  'LBL_SAME_AS_ABOVE' => 'Kimden İsim/Adres bilgisini Kullanıyor',
  'LBL_SAVE_RAW' => 'İşlenmemiş Kaynağı Sakla',
  'LBL_SAVE_RAW_DESC_1' => 'Her yüklenen e-posta için işlenmemiş halini tutmak istiyorsanız "Evet" seçin.',
  'LBL_SAVE_RAW_DESC_2' => 'Büyük Dosya Ekleri, yanlış veya ihtiyatlı yaralmış veritabanlarında hataya neden olabilir.',
  'LBL_SERVER_OPTIONS' => 'Gelişmiş Kurulum',
  'LBL_SERVER_TYPE' => 'E-Posta Sunucu Protokolü',
  'LBL_SERVER_URL' => 'E-Posta Sunucu Adresi',
  'LBL_SSL_DESC' => 'Eğer E-Posta sunucusu güvenli soket bağlantısını destekliyorsa, bunun etkinleştirilmesi E-Postaların yüklenmesi sırasında SSL bağlantısına zorlayacaktır.',
  'LBL_ASSIGN_TO_TEAM_DESC' => 'Seçilen takımın posta hesabına ulaşımı var.',
  'LBL_SSL' => 'SSL Kullan',
  'LBL_STATUS' => 'Durum',
  'LBL_SYSTEM_DEFAULT' => 'Sistem Varsayılan Değerleri',
  'LBL_TEST_BUTTON_TITLE' => 'Test [Alt + T]',
  'LBL_TEST_SETTINGS' => 'Ayarları Test Et',
  'LBL_TEST_SUCCESSFUL' => 'Bağlantı başarıyla tamamlandı.',
  'LBL_TEST_WAIT_MESSAGE' => 'Bir dakika lütfen...',
  'LBL_TLS_DESC' => 'E-Posta sunucusuna bağlanırken "Transport Layer Security" kullanın - yalnızca E-Posta sunucunuz bu protokol desteğini sağlıyorsa kullanılabilir.',
  'LBL_TLS' => 'TLS Kullan',
  'LBL_WARN_IMAP_TITLE' => '"Gelen E-Posta" Etkin Değil',
  'LBL_WARN_IMAP' => 'Uyarılar:',
  'LBL_WARN_NO_IMAP' => 'IMAP c-client kütüphaneleri PHP modülü ile aktive edilmiş/compile edilmiş değilse, "Gelen E-Posta" fonksiyonları <b>çalışamaz</b> .  Lütfen bu problemin çözümü için sistem yöneticiniz ile görüşünüz.',
  'LNK_CREATE_GROUP' => 'Yeni Grup Oluştur',
  'LNK_LIST_CREATE_NEW_GROUP' => 'Yeni Grup E-Posta Hesabı',
  'LNK_LIST_CREATE_NEW_BOUNCE' => 'Yeni Ulaşmayan E-Posta Yönetim Hesabı',
  'LNK_LIST_MAILBOXES' => 'Tüm E-Posta Hesapları',
  'LNK_LIST_QUEUES' => 'Tüm Kuyruklar',
  'LNK_LIST_SCHEDULER' => 'Planlayıcılar',
  'LNK_LIST_TEST_IMPORT' => 'E-Posta Yükleme Testi',
  'LNK_NEW_QUEUES' => 'Yeni Kuyruk Oluştur',
  'LNK_SEED_QUEUES' => 'Takımlardan "Seed" Kuyrukları',
  'LBL_IS_PERSONAL' => 'kişisel',
  'LBL_GROUPFOLDER_ID' => 'Grup Dizini ID\'si',
  'LBL_ASSIGN_TO_GROUP_FOLDER' => 'Grup Dizinine Ata',
  'LBL_ALLOW_OUTBOUND_GROUP_USAGE' => 'Kullanıcıların, "Kimden" İsim ve Adresini kullanarak E-Posta cevaplamalarına izin ver',
  'LBL_ALLOW_OUTBOUND_GROUP_USAGE_DESC' => 'Bu seçenek seçili ise, grup E-Posta hesabına erişen kullanıcılar için E-Posta oluşturulurken, Grup ile ilişkili Kimden İsmi ve Adresi Kime alanında bir seçenek olarak çıkacaktır.',
  'LBL_STATUS_ACTIVE' => 'Aktif',
  'LBL_STATUS_INACTIVE' => 'İnaktif',
  'LBL_IS_GROUP' => 'grup',
  'LBL_ENABLE_AUTO_IMPORT' => 'E-Postaları Otomatik Al',
  'LBL_WARNING_CHANGING_AUTO_IMPORT' => 'Uyarı: Otomatik al ayarlarını değiştiriyorsunuz, bu işlem veri kaybına sebep olabilir.',
  'LBL_WARNING_CHANGING_AUTO_IMPORT_WITH_CREATE_CASE' => 'Uyarı: Otomatik talep yaratırken otomatik al ayarı seçili olmalı.',
);


