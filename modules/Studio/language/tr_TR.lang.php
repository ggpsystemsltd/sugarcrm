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
  'LBL_SW_SUGARPORTAL' => 'Sugar Portal',
  'LBL_EDIT_LAYOUT' => 'Plan Düzenle',
  'LBL_EDIT_ROWS' => 'Satırları Düzenle',
  'LBL_EDIT_COLUMNS' => 'Kolonları Düzenle',
  'LBL_EDIT_LABELS' => 'Etiketleri Düzenle',
  'LBL_EDIT_FIELDS' => 'Özel Alanları Düzenle',
  'LBL_ADD_FIELDS' => 'Özel Alan Ekle',
  'LBL_DISPLAY_HTML' => 'HTML Kodunu Görüntüle',
  'LBL_SELECT_FILE' => 'Dosya Seçin:',
  'LBL_SAVE_LAYOUT' => 'Planı kaydet',
  'LBL_SELECT_A_SUBPANEL' => 'Bir altpanel seç',
  'LBL_SELECT_SUBPANEL' => 'Altpanel seç',
  'LBL_MODULE_TITLE' => 'Stüdyo',
  'LBL_TOOLBOX' => 'Araçkutusu',
  'LBL_STAGING_AREA' => 'Hazırlanma Alanı (öğeleri buraya sürükle bırak)',
  'LBL_SUGAR_FIELDS_STAGE' => 'Sugar Alanları (hazırlanma alanına eklemek için öğelere tıkla)',
  'LBL_SUGAR_BIN_STAGE' => 'Sugar Deposu (hazırlanma alanına eklemek için öğelere tıklayın)',
  'LBL_VIEW_SUGAR_FIELDS' => 'Sugar Alanlarını Görüntüle',
  'LBL_VIEW_SUGAR_BIN' => 'Sugar Deposunu Görüntüle',
  'LBL_FAILED_TO_SAVE' => 'Kaydetme işlemi başarısız oldu',
  'LBL_CONFIRM_UNSAVE' => 'Yaptığınız hiçbir değişiklik kaydedilmeyecek. Devam etmek istediğinizden emin misiniz?',
  'LBL_PUBLISHING' => 'Yayınlanıyor...',
  'LBL_PUBLISHED' => 'Yayınlandı',
  'LBL_FAILED_PUBLISHED' => 'Yayınlama işlemi başarısız oldu',
  'LBL_DROP_HERE' => 'Buraya bırak',
  'LBL_NAME' => 'İsim',
  'LBL_LABEL' => 'Etiket',
  'LBL_MASS_UPDATE' => 'Miktar Güncelleme',
  'LBL_AUDITED' => 'Denetleme',
  'LBL_CUSTOM_MODULE' => 'Modül',
  'LBL_DEFAULT_VALUE' => 'Varsayılan Değer',
  'LBL_REQUIRED' => 'Gerekli',
  'LBL_DATA_TYPE' => 'Cinsi',
  'LBL_HISTORY' => 'Tarihçe',
  'LBL_SW_WELCOME' => 'Bugün ne yapmak istersiniz?<br />Lütfen aşağıdaki seçeneklerden seçiminizi yapınız.',
  'LBL_SW_EDIT_MODULE' => 'Bir Modülü Düzenle',
  'LBL_SW_EDIT_DROPDOWNS' => 'Açılan Listeleri Düzenle',
  'LBL_SW_EDIT_TABS' => 'Sekmeleri Yapılandır',
  'LBL_SW_RENAME_TABS' => 'Sekmeleri Yeniden Adlandır',
  'LBL_SW_EDIT_GROUPTABS' => 'Grup Sekmelerini Yapılandır',
  'LBL_SW_EDIT_PORTAL' => 'Portalı Düzenle',
  'LBL_SW_EDIT_WORKFLOW' => 'İş Akışlarını Düzenle',
  'LBL_SW_REPAIR_CUSTOMFIELDS' => 'Özel Alanları Onar',
  'LBL_SW_MIGRATE_CUSTOMFIELDS' => 'Özel Alanları Taşı',
  'LBL_SMW_WELCOME' => 'Aşağıdan bir modül seçiniz.',
  'LBL_SMA_WELCOME' => 'İlgili modül ile ne yapmak istersiniz?<br />Lütfen almak istediğiniz aksiyonu seçiniz.',
  'LBL_SMA_EDIT_CUSTOMFIELDS' => 'Özel Alanları Düzenle',
  'LBL_SMA_EDIT_LAYOUT' => 'Plan Düzenle',
  'LBL_SMA_EDIT_LABELS' => 'Etiketleri Düzenle',
  'LBL_MB_PREVIEW' => 'Önizleme',
  'LBL_MB_RESTORE' => 'Geri Yükle',
  'LBL_MB_DELETE' => 'Sil',
  'LBL_MB_COMPARE' => 'Karşılaştır',
  'LBL_MB_WELCOME' => 'Tarihçe üzerinde çalıştığınız dosyada daha önce konumlandırılmış değişiklikleri görüntüleyebilmenizi sağlar. Önceki versiyonları karşılaştırabilir ve geri yükleyebilirsiniz. Eğer bir dosyayı geri yüklerseniz ilgili dosya çalışma dosyası olacaktır. Herkes için görünebilir olmadan önce ilgili dosyayı konumlandırmalısınız.<br />Bu gün ne yapmak istersiniz?<br />LÜtfen aşağıdaki seçeneklerden seçiminizi yapınız.',
  'LBL_ED_CREATE_DROPDOWN' => 'Bir Açılan Liste Oluştur',
  'LBL_ED_WELCOME' => 'Mevcuttaki açılan listeyi düzenleyebilir veya yeni bir açılan liste oluşturabilirsiniz.',
  'LBL_DROPDOWN_NAME' => 'Açılan Liste İsmi:',
  'LBL_DROPDOWN_LANGUAGE' => 'Açılan Liste Dili',
  'LBL_TABGROUP_LANGUAGE' => 'Dil',
  'LBL_EC_WELCOME' => 'Mevcuttaki özel alanı görüntüler, düzenler ve yeni bir özel alan yaratır veya özel alan önbelleğini temizleyebilirsiniz.',
  'LBL_EC_VIEW_CUSTOMFIELDS' => 'Özel Alanları Görüntüle',
  'LBL_EC_CREATE_CUSTOMFIELD' => 'Özel Alan Oluştur',
  'LBL_EC_CLEAR_CACHE' => 'Önbelleği Temizle',
  'LBL_SM_WELCOME' => 'Görütülemek istediğiniz dosyayı seçiniz.',
  'LBL_DD_DISPALYVALUE' => 'Değeri Görüntüle',
  'LBL_DD_DATABASEVALUE' => 'Veritabanı Değeri',
  'LBL_DD_ALL' => 'Tümü',
  'LBL_BTN_SAVE' => 'Kaydet',
  'LBL_BTN_SAVEPUBLISH' => 'Kaydet & Yaygınlaştır',
  'LBL_BTN_HISTORY' => 'Tarihçe',
  'LBL_BTN_NEXT' => 'Sonraki',
  'LBL_BTN_BACK' => 'Geri',
  'LBL_BTN_ADDCOLS' => 'Kolonlar Ekle',
  'LBL_BTN_ADDROWS' => 'Satırlar Ekle',
  'LBL_BTN_UNDO' => 'Geri Al',
  'LBL_BTN_REDO' => 'İleri Al',
  'LBL_BTN_ADDCUSTOMFIELD' => 'Özel Alan Ekle',
  'LBL_BTN_TABINDEX' => 'Sekme Emrini Düzenle',
  'LBL_TAB_SUBTABS' => 'Alt Sekmeler',
  'LBL_MODULES' => 'Modüller',
  'LBL_MODULE_NAME' => 'Yönetim',
  'LBL_CONFIGURE_GROUP_TABS' => 'Gruplanmış Modülleri Yapılandır',
  'LBL_GROUP_TAB_WELCOME' => 'Aşağıdaki gruplar Gruplanmış Modülleri görüntülemeyi seçen kullanıcılar için navigasyon barında gösterilecek. Modülleri ileriye geriye sürükleyerek ve bırakarak grupların altında hangi modüllerin yer alacağını yapılandırabilirsiniz.<br />Not: Boş gruplar navigasyon barda görüntülenmeyecektir.',
  'LBL_RENAME_TAB_WELCOME' => 'Sekmeyi yeniden adlandırmak için aşağıdaki tabloda yer alan Değeri Görüntüle sekmesini tıklayınız.',
  'LBL_DELETE_MODULE' => 'Modülleri ortadan kaldır<br />Gruptan',
  'LBL_DISPLAY_OTHER_TAB_HELP' => 'Navigasyon bardaki "Diğer" sekmesini görüntülemeyi seçiniz."Diğer" sekmesi diğer gruplarda henüz var olmayan modülleri gösterir.',
  'LBL_TAB_GROUP_LANGUAGE_HELP' => 'Uygun bir dil seçiniz, Grup etiketlerini düzenleyiniz ve Kaydet & Yaygınlaştır\'a tıklayarak seçilen dili etiketlere uygulayınız.',
  'LBL_ADD_GROUP' => 'Grup Ekle',
  'LBL_NEW_GROUP' => 'Yeni Grup',
  'LBL_RENAME_TABS' => 'Sekmeleri Yeniden Adlandır',
  'LBL_DISPLAY_OTHER_TAB' => '"Diğer" Sekmesini Görüntüle',
  'LBL_DEFAULT' => 'Varsayılan',
  'LBL_ADDITIONAL' => 'İlave',
  'LBL_AVAILABLE' => 'Kullanılabilir',
  'LBL_LISTVIEW_DESCRIPTION' => 'Aşağıda 3 kolon görünmektedir. Varsayılan kolon bir liste görünümünde belirtilen alanlar içermektedir. İlave edilen kolon bir kullanıcının özel bir görünüm yaratmak için seçebileceği alanları içermektedir. Kullanılacak olan kolon kullanıcılara bir admin gibi varsayılan veya ilave edilen kolonlara ekleyebilceğiniz alanları gösterir.',
  'LBL_LISTVIEW_EDIT' => 'Liste Görünümü Düzenleyici',
  'ERROR_ALREADY_EXISTS' => 'Hata: Alan zaten mevcut.',
  'ERROR_INVALID_KEY_VALUE' => 'Hata: Geçersiz değer [\']',
  'LBL_SMP_WELCOME' => 'Aşağıdaki listeden düzenlemek istediğiniz modülü seçiniz.',
  'LBL_SP_WELCOME' => 'Sugar Portal için Stüdyo\'ya hoşgeldiniz. İsterseniz modulleri buradan düzenleyebilirsiniz veya portal instance\'a senkronize edebilirsiniz. Lütfen aşağıdaki listeden seçiniz.',
  'LBL_SP_SYNC' => 'Portal Senkronizasyon',
  'LBL_SYNCP_WELCOME' => 'Lütfen güncellemek istediğiniz portal örneğine URL giriniz ve "Git" düğmesine basınız. <br />Bu işlem kullanıcı adınızın ve şifrenizin bilgi istemini ortaya çıkaracaktır.<br />Lütfen Sugar Kullanıcı Adınızı ve Şifrenizi giriniz ve "Senkronizasyona Başla" düğmesine basınız.',
  'LBL_LISTVIEWP_DESCRIPTION' => 'Aşağıda iki kolon yer almaktadır: Varsayılan alanlar görüntülenebilen ve Kullanılabilir alanlar ise görüntülenemeyen ama kullanılması ve görüntülenmesi mümkün olan alanları içermektedir. Sadece alanları iki kolon arasında sürükleyiniz. İlgili alanları sürükleyerek ve bırakarak aynı zamanda öğeleri kolon içinde yeniden düzenleyebilirsiniz.',
  'LBL_SP_STYLESHEET' => 'Bir Style Sheet yükle',
  'LBL_SP_UPLOADSTYLE' => 'Bilgisayarınızdan tarama düğmesine tıklayın ve yüklenecek bir style sheet seçiniz.<br />Bir dahaki senkronizasyon gerçekleştirme işleminde style sheet portal ile birlikte getirilecektir.',
  'LBL_SP_UPLOADED' => 'Yüklendi',
  'ERROR_SP_UPLOADED' => 'Lütfen bir css style sheet yüklediğinizden emin olunuz.',
  'LBL_SP_PREVIEW' => 'Burada style sheet\'in neye benzeyeceğinin bir önizlemesi yer almaktadır.',
);

