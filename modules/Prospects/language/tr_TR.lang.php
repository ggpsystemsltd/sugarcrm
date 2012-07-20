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
  'db_last_name' => 'LBL_LIST_LAST_NAME',
  'db_first_name' => 'LBL_LIST_FIRST_NAME',
  'db_title' => 'LBL_LIST_TITLE',
  'db_email1' => 'LBL_LIST_EMAIL_ADDRESS',
  'db_email2' => 'LBL_LIST_OTHER_EMAIL_ADDRESS',
  'LBL_CONVERT_BUTTON_KEY' => 'V',
  'LBL_MODULE_NAME' => 'Hedefler',
  'LBL_MODULE_ID' => 'Hedefler',
  'LBL_INVITEE' => 'Doğrudan Raporlar',
  'LBL_MODULE_TITLE' => 'Hedefler: Ana Sayfa',
  'LBL_SEARCH_FORM_TITLE' => 'Hedef Arama',
  'LBL_LIST_FORM_TITLE' => 'Hedef Liste',
  'LBL_NEW_FORM_TITLE' => 'Yeni Hedef',
  'LBL_PROSPECT' => 'Hedef:',
  'LBL_BUSINESSCARD' => 'Kartvizit',
  'LBL_LIST_NAME' => 'İsim',
  'LBL_LIST_LAST_NAME' => 'Soyadı',
  'LBL_LIST_PROSPECT_NAME' => 'Hedef Adı',
  'LBL_LIST_TITLE' => 'Ünvan',
  'LBL_LIST_EMAIL_ADDRESS' => 'E-Posta',
  'LBL_LIST_OTHER_EMAIL_ADDRESS' => 'Diğer E-Posta',
  'LBL_LIST_PHONE' => 'Telefon',
  'LBL_LIST_PROSPECT_ROLE' => 'Rol',
  'LBL_LIST_FIRST_NAME' => 'Adı',
  'LBL_ASSIGNED_TO_NAME' => 'Atanan Kişi',
  'LBL_ASSIGNED_TO_ID' => 'Atanan Kullanıcı:',
  'LBL_CAMPAIGN_ID' => 'Kampanya ID',
  'LBL_EXISTING_PROSPECT' => 'Mevcut kontak kullanıldı',
  'LBL_CREATED_PROSPECT' => 'Yeni kontak oluşturuldu',
  'LBL_EXISTING_ACCOUNT' => 'Varolan bir müşteri kullanıldı',
  'LBL_CREATED_ACCOUNT' => 'Yeni bir müşteri oluşturuldu',
  'LBL_CREATED_CALL' => 'Yeni bir tel.araması oluşturuldu',
  'LBL_CREATED_MEETING' => 'Yeni bir toplantı oluşturuldu',
  'LBL_ADDMORE_BUSINESSCARD' => 'Başka bir kartvizit ekle',
  'LBL_ADD_BUSINESSCARD' => 'Kartvizit Gir',
  'LBL_NAME' => 'İsim:',
  'LBL_FULL_NAME' => 'İsim',
  'LBL_PROSPECT_NAME' => 'Hedef Adı:',
  'LBL_PROSPECT_INFORMATION' => 'Hedef Bilgisi',
  'LBL_MORE_INFORMATION' => 'Daha Fazla Bilgi',
  'LBL_FIRST_NAME' => 'Adı:',
  'LBL_OFFICE_PHONE' => 'Ofis Telefonu:',
  'LBL_ANY_PHONE' => 'Telefon:',
  'LBL_PHONE' => 'Telefon:',
  'LBL_LAST_NAME' => 'Soyadı:',
  'LBL_MOBILE_PHONE' => 'Cep Telefonu:',
  'LBL_HOME_PHONE' => 'Ana Sayfa:',
  'LBL_OTHER_PHONE' => 'Diğer Telefon:',
  'LBL_FAX_PHONE' => 'Faks:',
  'LBL_PRIMARY_ADDRESS_STREET' => 'Asıl Adres Sokak:',
  'LBL_PRIMARY_ADDRESS_CITY' => 'Asıl Adres Şehir:',
  'LBL_PRIMARY_ADDRESS_COUNTRY' => 'Asıl Adres Ülke:',
  'LBL_PRIMARY_ADDRESS_STATE' => 'Asıl Adres Eyalet:',
  'LBL_PRIMARY_ADDRESS_POSTALCODE' => 'Asıl Adres Posta Kodu:',
  'LBL_ALT_ADDRESS_STREET' => 'Alternatif Adres Sokak:',
  'LBL_ALT_ADDRESS_CITY' => 'Alternatif Adres Şehir:',
  'LBL_ALT_ADDRESS_COUNTRY' => 'Alternatif Adres Ülke:',
  'LBL_ALT_ADDRESS_STATE' => 'Alternatif Adres Eyalet:',
  'LBL_ALT_ADDRESS_POSTALCODE' => 'Alternatif Adres Posta Kodu:',
  'LBL_TITLE' => 'Ünvanı:',
  'LBL_DEPARTMENT' => 'Departman:',
  'LBL_BIRTHDATE' => 'Doğum Tarihi:',
  'LBL_EMAIL_ADDRESS' => 'E-Posta Adresi:',
  'LBL_OTHER_EMAIL_ADDRESS' => 'Diğer E-Posta:',
  'LBL_ANY_EMAIL' => 'E-Posta:',
  'LBL_ASSISTANT' => 'Asistan:',
  'LBL_ASSISTANT_PHONE' => 'Asistan Telefonu:',
  'LBL_DO_NOT_CALL' => 'Tel. İle Aramayın:',
  'LBL_EMAIL_OPT_OUT' => 'E-Posta Liste Dışı:',
  'LBL_PRIMARY_ADDRESS' => 'Asıl Adres:',
  'LBL_ALTERNATE_ADDRESS' => 'Diğer Adres:',
  'LBL_ANY_ADDRESS' => 'Adres:',
  'LBL_CITY' => 'Şehir:',
  'LBL_STATE' => 'Eyalet:',
  'LBL_POSTAL_CODE' => 'Posta Kodu:',
  'LBL_COUNTRY' => 'Ülke:',
  'LBL_DESCRIPTION_INFORMATION' => 'Tanım Bilgisi',
  'LBL_ADDRESS_INFORMATION' => 'Adres Bilgisi',
  'LBL_DESCRIPTION' => 'Tanım:',
  'LBL_PROSPECT_ROLE' => 'Rol:',
  'LBL_OPP_NAME' => 'Fırsat Adı:',
  'LBL_IMPORT_VCARD' => 'vCard Verisini Yükle',
  'LBL_IMPORT_VCARDTEXT' => 'Dosya sisteminizden vCard verisi yükleyerek otomatik olarak yeni kontak oluştur.',
  'LBL_DUPLICATE' => 'Muhtemel Çoklanacak Hedefler',
  'MSG_SHOW_DUPLICATES' => 'Oluşturduğunuz hedef kaydı, zaten varolan bir hedefin eşleniği olabilir. Benzer isim ve/veya E-Posta adresi olanlar aşağıda listelenmektedir.<br>Kaydet tuşuna basarak yeni bir hedef yaratmaya devam edebilir veya İptal tuşuna basarak hedef yaratmadan modüle dönüş yapabilirsiniz.',
  'MSG_DUPLICATE' => 'Oluşturduğunuz hedef kaydı, zaten varolan bir hedefin eşleniği olabilir. Benzer isim ve/veya E-Posta adresi olanlar aşağıda listelenmektedir.<br>Kaydet tuşuna basarak yeni bir hedef yaratmaya devam edebilir veya İptal tuşuna basarak hedef yaratmadan modüle dönüş yapabilirsiniz.',
  'LNK_IMPORT_VCARD' => 'vCard\'dan Oluştur',
  'LNK_NEW_ACCOUNT' => 'Müşteri Oluştur',
  'LNK_NEW_OPPORTUNITY' => 'Fırsat Oluştur',
  'LNK_NEW_CASE' => 'Talep Oluştur',
  'LNK_NEW_NOTE' => 'Not veya Ek Oluştur',
  'LNK_NEW_CALL' => 'Tel.Araması Planla',
  'LNK_NEW_EMAIL' => 'E-Posta Arşivle',
  'LNK_NEW_MEETING' => 'Toplantı Planla',
  'LNK_NEW_TASK' => 'Görev Oluştur',
  'LNK_NEW_APPOINTMENT' => 'Randevu Oluştur',
  'LNK_IMPORT_PROSPECTS' => 'Hedef Al',
  'NTC_DELETE_CONFIRMATION' => 'Bu kaydı silmek istediğinizden emin misiniz?',
  'NTC_REMOVE_CONFIRMATION' => 'Talepten bu kontağı silmek istediğinizden emin misiniz?',
  'NTC_REMOVE_DIRECT_REPORT_CONFIRMATION' => 'Doğrudan rapor olarak bu kaydı silmek istediğinizden emin misiniz?',
  'ERR_DELETE_RECORD' => 'Kontağı silmek için bir kayıt nosu belirtilmesi zorunludur.',
  'NTC_COPY_PRIMARY_ADDRESS' => 'Asıl adresi alternatif adrese kopyalayın',
  'NTC_COPY_ALTERNATE_ADDRESS' => 'Alternatif adresi asıl adrese kopyalayın',
  'LBL_SALUTATION' => 'Hitap',
  'LBL_SAVE_PROSPECT' => 'Hedef kaydet',
  'LBL_CREATED_OPPORTUNITY' => 'Yeni bir fırsat oluşturuldu',
  'NTC_OPPORTUNITY_REQUIRES_ACCOUNT' => 'Fırsat yaratılması için müşteri kaydının olması gerekir.\\n Lütfen yeni bir müşteri yaratın veya varolan müşterilerden birini seçin.',
  'LNK_SELECT_ACCOUNT' => 'Müşteri Seç',
  'LNK_NEW_PROSPECT' => 'Hedef Oluştur',
  'LNK_PROSPECT_LIST' => 'Hedefleri Görüntüle',
  'LNK_NEW_CAMPAIGN' => 'Kampanya Oluştur',
  'LNK_CAMPAIGN_LIST' => 'Kampanyalar',
  'LNK_NEW_PROSPECT_LIST' => 'Hedef Liste Oluştur',
  'LNK_PROSPECT_LIST_LIST' => 'Hedef Listeleri',
  'LNK_IMPORT_PROSPECT' => 'Hedef Verilerini Yükle',
  'LBL_SELECT_CHECKED_BUTTON_LABEL' => 'İşaretli Hedefleri Seç',
  'LBL_SELECT_CHECKED_BUTTON_TITLE' => 'İşaretli Hedefleri Seç',
  'LBL_INVALID_EMAIL' => 'Geçersiz E-Posta:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Hedefler',
  'LBL_PROSPECT_LIST' => 'Aday Müşteri Listesi',
  'LBL_CONVERT_BUTTON_TITLE' => 'Hedefi Dönüştür',
  'LBL_CONVERT_BUTTON_LABEL' => 'Hedefi Dönüştür',
  'LBL_CONVERTPROSPECT' => 'Hedefi Dönüştür',
  'LNK_NEW_CONTACT' => 'Yeni Kontak',
  'LBL_CREATED_CONTACT' => 'Yeni kontak oluşturuldu',
  'LBL_BACKTO_PROSPECTS' => 'Hedeflere Geri Dön',
  'LBL_CAMPAIGNS' => 'Kampanyalar',
  'LBL_CAMPAIGN_LIST_SUBPANEL_TITLE' => 'Kampanya Tarihçesi',
  'LBL_TRACKER_KEY' => 'Sistem İzleme Anahtarı',
  'LBL_LEAD_ID' => 'Potansiyel ID',
  'LBL_CONVERTED_LEAD' => 'Dönüştürülen Potansiyel',
  'LBL_ACCOUNT_NAME' => 'Müşteri Adı',
  'LBL_EDIT_ACCOUNT_NAME' => 'Müşteri Adı',
  'LBL_CREATED_USER' => 'Oluşturan Kullanıcı',
  'LBL_MODIFIED_USER' => 'Değiştiren Kullanıcı',
  'LBL_CAMPAIGNS_SUBPANEL_TITLE' => 'Kampanyalar',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Tarihçe',
);

