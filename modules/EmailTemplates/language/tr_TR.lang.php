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
  'LBL_COLON' => ':',
  'LBL_ADD_ANOTHER_FILE' => 'Başka Bir Dosya Daha Ekle',
  'LBL_ADD_DOCUMENT' => 'Sugar Dokümanı Ekle',
  'LBL_ADD_FILE' => 'Bir dosya ekle',
  'LBL_ATTACHMENTS' => 'Ekler',
  'LBL_BODY' => 'Gövde:',
  'LBL_CLOSE' => 'Kapat:',
  'LBL_CONTACT_AND_OTHERS' => 'Kontak/Potansiyel/Hedef Müşteri',
  'LBL_DESCRIPTION' => 'Tanım:',
  'LBL_EDIT_ALT_TEXT' => 'Düz Metin Düzenle',
  'LBL_EMAIL_ATTACHMENT' => 'E-Posta Eki',
  'LBL_HTML_BODY' => 'HTML İçeriği',
  'LBL_INSERT_VARIABLE' => 'Değişken Ekle:',
  'LBL_INSERT_URL_REF' => 'URL Referansı Ekle',
  'LBL_INSERT_TRACKER_URL' => 'İzleme İçin URL Ekle:',
  'LBL_INSERT' => 'Ekle',
  'LBL_LIST_DATE_MODIFIED' => 'Değiştirilme Tarihi',
  'LBL_LIST_DESCRIPTION' => 'Tanım',
  'LBL_LIST_FORM_TITLE' => 'E-Posta Şablon Listesi',
  'LBL_LIST_NAME' => 'İsim',
  'LBL_MODULE_NAME' => 'E-Posta Şablonları',
  'LBL_MODULE_TITLE' => 'E-Posta Şablonları: Ana Sayfa',
  'LBL_NAME' => 'İsim:',
  'LBL_NEW_FORM_TITLE' => 'E-Posta Şablonu Oluştur',
  'LBL_PUBLISH' => 'Yayınla:',
  'LBL_RELATED_TO' => 'İlgili Olarak:',
  'LBL_SEARCH_FORM_TITLE' => 'E-Posta Şablon Arama',
  'LBL_SHOW_ALT_TEXT' => 'Düz Metin Göster',
  'LBL_SUBJECT' => 'Konu:',
  'LBL_SUGAR_DOCUMENT' => 'Sugar Dokümanı',
  'LBL_TEAMS' => 'Takımlar:',
  'LBL_TEAMS_LINK' => 'Takımlar',
  'LBL_TEXT_BODY' => 'Metin İçeriği',
  'LBL_USERS' => 'Kullanıcılar',
  'LNK_ALL_EMAIL_LIST' => 'Tüm E-Postalar',
  'LNK_ARCHIVED_EMAIL_LIST' => 'Arşivlenmiş E-Postalar',
  'LNK_CHECK_EMAIL' => 'E-Posta Kontrol Et',
  'LNK_DRAFTS_EMAIL_LIST' => 'Bütün Taslaklar',
  'LNK_EMAIL_TEMPLATE_LIST' => 'E-Posta Şablonlarını Görüntüle',
  'LNK_IMPORT_NOTES' => 'Not Verilerini Yükle',
  'LNK_NEW_ARCHIVE_EMAIL' => 'Arşivlenmiş E-Posta Oluştur',
  'LNK_NEW_EMAIL_TEMPLATE' => 'E-Posta Şablonu Oluştur',
  'LNK_NEW_EMAIL' => 'E-Posta Arşivle',
  'LNK_NEW_SEND_EMAIL' => 'E-Posta Oluştur',
  'LNK_SENT_EMAIL_LIST' => 'Gönderilen E-Postalar',
  'LNK_VIEW_CALENDAR' => 'Bugün',
  'LBL_NEW' => 'Yeni',
  'LNK_CHECK_MY_INBOX' => 'E-Postalarımı Kontrol Et',
  'LNK_GROUP_INBOX' => 'Grup Gelen Kutusu',
  'LNK_MY_ARCHIVED_LIST' => 'Arşivlerim',
  'LNK_MY_DRAFTS' => 'Taslaklarım',
  'LNK_MY_INBOX' => 'E-Postam',
  'LBL_LIST_BASE_MODULE' => 'Temel Modül:',
  'LBL_MODULE_NAME_WORKFLOW' => 'İş Akışı E-Posta Şablonları',
  'LBL_TEXT_ONLY' => 'Sadece Metin',
  'LBL_SEND_AS_TEXT' => 'Sadece Metin Gönder',
  'LBL_ACCOUNT' => 'Müşteri',
  'LBL_BASE_MODULE' => 'Temel Modül',
  'LBL_FROM_NAME' => '"Kimden" İsmi',
  'LBL_PLAIN_TEXT' => 'Düz Metin',
  'LBL_CREATED_BY' => 'Oluşturan:',
  'LBL_FROM_ADDRESS' => '"Kimden" Adresi',
  'LBL_PUBLISHED' => 'Yayınlandı',
  'LBL_ACTIVITIES_REPORTS' => 'Aktivite Raporu',
  'LNK_VIEW_MY_INBOX' => 'E-Postalarımı görüntüle',
  'LBL_ASSIGNED_TO_ID' => 'Atanan Kişi:',
);

