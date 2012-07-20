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
  'LBL_DUNS' => 'DUNS',
  'LBL_ADD_MODULE' => 'Ekle',
  'LBL_ADDRCITY' => 'Şehir',
  'LBL_ADDRCOUNTRY' => 'Ülke',
  'LBL_ADDRCOUNTRY_ID' => 'Ülke ID',
  'LBL_ADDRSTATEPROV' => 'Eyalet',
  'LBL_ADMINISTRATION' => 'Konnektör Yönetimi',
  'LBL_ADMINISTRATION_MAIN' => 'Konnektör Ayarları',
  'LBL_AVAILABLE' => 'Kullanılabilir',
  'LBL_BACK' => '< Önceki',
  'LBL_COMPANY_ID' => 'Şirket ID',
  'LBL_CONFIRM_CONTINUE_SAVE' => 'Bazı gerekli alanlar boş bırakıldı. Değişiklikler kaydedilsin mi?',
  'LBL_CONNECTOR' => 'Konnektör',
  'LBL_CONNECTOR_FIELDS' => 'Konnektör Alanları',
  'LBL_DATA' => 'Veri',
  'LBL_DEFAULT' => 'Varsayılan',
  'LBL_DELETE_MAPPING_ENTRY' => 'Bu girdiyi silmek istediğinizden emin misiniz?',
  'LBL_DISABLED' => 'Devre dışı',
  'LBL_EMPTY_BEANS' => 'Arama kriterinize göre bir sonuç bulunamadı.',
  'LBL_ENABLED' => 'Etkin',
  'LBL_FINSALES' => 'Yıllık Satış Miktarı',
  'LBL_MARKET_CAP' => 'Piyasa Değeri',
  'LBL_MERGE' => 'Birleştir',
  'LBL_MODIFY_DISPLAY_TITLE' => 'Konnektörleri Etkinleştir',
  'LBL_MODIFY_DISPLAY_DESC' => 'Her bir konnektör için hangi modüllerin etkinleştirilmiş olduğunu seçer.',
  'LBL_MODIFY_DISPLAY_PAGE_TITLE' => 'Konnektör Ayarları: Konnektörleri Etkinleştir',
  'LBL_MODULE_FIELDS' => 'Modül Alanları',
  'LBL_MODIFY_MAPPING_TITLE' => 'Konnektör Alanlarını Eşleştir',
  'LBL_MODIFY_MAPPING_DESC' => 'Hangi konnektör verisinin görüneceği ve modül kayıtlarıyla birleşeceğine karar vermek için modül alanları ile konnektör alanları eşleştirir.',
  'LBL_MODIFY_MAPPING_PAGE_TITLE' => 'Konnektör Ayarları: Konnektör Alanlarını Eşleştir',
  'LBL_MODIFY_PROPERTIES_TITLE' => 'Konnektör Özelliklerini Ayarla',
  'LBL_MODIFY_PROPERTIES_DESC' => 'Her bir konnektör için URL\'ler ve API anahtarları dahil olmak üzere özelliklerini ayarlar.',
  'LBL_MODIFY_PROPERTIES_PAGE_TITLE' => 'Konnektör Ayarları: Konnektör Özelliklerini Ayarla',
  'LBL_MODIFY_SEARCH_TITLE' => 'Konnektör Aramayı Yönet',
  'LBL_MODIFY_SEARCH' => 'Ara',
  'LBL_MODIFY_SEARCH_DESC' => 'Her bir modül için veri aramak amacıyla konnektör alanları seçer',
  'LBL_MODIFY_SEARCH_PAGE_TITLE' => 'Konnektör Ayarları: Konnektör Aramayı Yönet',
  'LBL_MODULE_NAME' => 'Konnektörler',
  'LBL_NO_PROPERTIES' => 'Bu konnektör için ayarlanabilecek özellik bulunmamaktadır.',
  'LBL_PARENT_DUNS' => 'Ana DUNS',
  'LBL_PREVIOUS' => '< Önceki',
  'LBL_QUOTE' => 'Teklif',
  'LBL_RECNAME' => 'Şirket Adı',
  'LBL_RESET_TO_DEFAULT' => 'Varsayılanlara Sıfırla',
  'LBL_RESET_TO_DEFAULT_CONFIRM' => 'Varsayılan ayarlara sıfırlamaya emin misiniz?',
  'LBL_RESET_BUTTON_TITLE' => 'Sıfırla [Alt+R]',
  'LBL_RESULT_LIST' => 'Veri Listesi',
  'LBL_RUN_WIZARD' => 'Sihirbazı Çalıştır',
  'LBL_SAVE' => 'Kaydet',
  'LBL_SEARCHING_BUTTON_LABEL' => 'Arıyor...',
  'LBL_SHOW_IN_LISTVIEW' => 'Birleşmiş Liste görünümünde Göster',
  'LBL_SMART_COPY' => 'Akıllı Kopyalama',
  'LBL_SUMMARY' => 'Özet',
  'LBL_STEP1' => 'Ara ve Veriyi Gör',
  'LBL_STEP2' => 'Kayıtlar Birleştir:',
  'LBL_TEST_SOURCE' => 'Konnektörü Test Et',
  'LBL_TEST_SOURCE_FAILED' => 'Test Başarısız',
  'LBL_TEST_SOURCE_RUNNING' => 'Test gerçekleştiriliyor...',
  'LBL_TEST_SOURCE_SUCCESS' => 'Test Başarılı',
  'LBL_TITLE' => 'Veri Birleştirme',
  'LBL_ULTIMATE_PARENT_DUNS' => 'Esas Ana DUNS',
  'ERROR_RECORD_NOT_SELECTED' => 'Hata: Lütfen devam etmeden önce listeden bir kayıt seçin.',
  'ERROR_EMPTY_WRAPPER' => 'Hata: Kaynak için [{$source_id}] wrapper örneği alınamıyor',
  'ERROR_EMPTY_SOURCE_ID' => 'Hata: Kaynak ID belirtilmemiş veya boş.',
  'ERROR_EMPTY_RECORD_ID' => 'Hata: Kayıt ID belirtilmemiş veya boş.',
  'ERROR_NO_ADDITIONAL_DETAIL' => 'Hata: Kayıt için ilave detaylar bulunmadı.',
  'ERROR_NO_SEARCHDEFS_DEFINED' => 'Bu konnektör için her hangi bir modül etkinleştirilmemiş. Konnektör Etkinleştir sayfasında bu konnektör için modül seçin.',
  'ERROR_NO_SEARCHDEFS_MAPPED' => 'Hata: Arama alanları tanımlı herhangi etkin bir konnektör bulunmamaktadır.',
  'ERROR_NO_SOURCEDEFS_FILE' => 'Hata: sourcedefs.php dosyası bulunamadı.',
  'ERROR_NO_SOURCEDEFS_SPECIFIED' => 'Hata: Veriyi alacak her hangi bir kaynak belirtilmedi.',
  'ERROR_NO_CONNECTOR_DISPLAY_CONFIG_FILE' => 'Hata: Bu modüle eşlenmiş konnektör bulunmamaktadır.',
  'ERROR_NO_SEARCHDEFS_MAPPING' => 'Hata: Modül ve konnektör için herhangi bir arama alanı tanımlanmamış. Lütfen sistem yöneticisine başvurun.',
  'ERROR_NO_FIELDS_MAPPED' => 'Hata: Her bir modül girdisi için en azından bir tane Konnektör alanını modül alanı ile eşlemelisiniz.',
  'ERROR_NO_DISPLAYABLE_MAPPED_FIELDS' => 'Hata: Sonuçlarda gözükmesi için herhangi bir modül alanı belirtilmemiş. Lütfen sistem yöneticisine başvurun.',
);

