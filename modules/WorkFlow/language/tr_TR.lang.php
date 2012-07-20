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
  'LBL_MODULE_NAME' => 'İş Akış Tanımları',
  'LBL_MODULE_ID' => 'İş Akışı',
  'LBL_MODULE_TITLE' => 'İş Akışı: Ana Sayfa',
  'LBL_SEARCH_FORM_TITLE' => 'İş Akışı Arama',
  'LBL_LIST_FORM_TITLE' => 'İş Akışı Listesi',
  'LBL_NEW_FORM_TITLE' => 'İş Akış Tanımı Oluştur',
  'LBL_LIST_NAME' => 'İsim',
  'LBL_LIST_TYPE' => 'Çalışma Zamanı:',
  'LBL_LIST_BASE_MODULE' => 'Temel Modül:',
  'LBL_LIST_STATUS' => 'Durum',
  'LBL_NAME' => 'İsim:',
  'LBL_DESCRIPTION' => 'Tanım:',
  'LBL_TYPE' => 'Çalışma Zamanı:',
  'LBL_STATUS' => 'Durum:',
  'LBL_BASE_MODULE' => 'Hedef Modül:',
  'LBL_LIST_ORDER' => 'İşlem Sırası:',
  'LBL_FROM_NAME' => '"Kimden" İsmi:',
  'LBL_FROM_ADDRESS' => '"Kimden" Adresi:',
  'LNK_NEW_WORKFLOW' => 'İş Akış Tanımı Oluştur',
  'LNK_WORKFLOW' => 'İş Akış Tanımlarını Listele',
  'LBL_ALERT_TEMPLATES' => 'Şablonları Uyar',
  'LBL_CREATE_ALERT_TEMPLATE' => 'Uyarı şablonu oluştur:',
  'LBL_SUBJECT' => 'Konu:',
  'LBL_RECORD_TYPE' => 'Uygulandığı Yer:',
  'LBL_RELATED_MODULE' => 'İlgili Modüller:',
  'LBL_PROCESS_LIST' => 'İş Akışı Sırası',
  'LNK_ALERT_TEMPLATES' => 'E-Posta Şablonlarını Uyar',
  'LNK_PROCESS_VIEW' => 'İş Akış Çalıştırma Sırası',
  'LBL_PROCESS_SELECT' => 'Lütfen bir modül seçiniz:',
  'LBL_LACK_OF_TRIGGER_ALERT' => 'Uyarı: Bu iş akış nesnesinin çalışması için tetikleyici oluşturmalısınız',
  'LBL_LACK_OF_NOTIFICATIONS_ON' => 'Uyarı: Uyarı gönderebilmek için Yönetici > E-Posta Ayarları\'ndan SMTP Sunucu bilgisini sağlayın.',
  'LBL_FIRE_ORDER' => 'İşlem Sırası:',
  'LBL_RECIPIENTS' => 'Alıcılar',
  'LBL_INVITEES' => 'Davetliler',
  'LBL_INVITEE_NOTICE' => 'Dikkat, bunu oluşturmak için en az bir davetli seçmelisiniz.',
  'NTC_REMOVE_ALERT' => 'Bu iş akışını silmek istediğinizden emin misiniz?',
  'LBL_EDIT_ALT_TEXT' => 'Düz Metin Değiştir',
  'LBL_INSERT' => 'Gir',
  'LBL_SELECT_OPTION' => 'Lütfen bir tercih yapın.',
  'LBL_SELECT_VALUE' => 'Geçerli bir değer seçmelisiniz.',
  'LBL_SELECT_MODULE' => 'Lütfen ilgili modülü seçin.',
  'LBL_SELECT_FILTER' => 'İlgili modülü filtrelemek için bir alanla birlikte seçmelisiniz.',
  'LBL_LIST_UP' => 'ykr',
  'LBL_LIST_DN' => 'aşğ',
  'LBL_SET' => 'Ayarla',
  'LBL_AS' => 'olarak',
  'LBL_SHOW' => 'Göster',
  'LBL_HIDE' => 'Gizle',
  'LBL_SPECIFIC_FIELD' => 'belirtilmiş alan',
  'LBL_ANY_FIELD' => 'herhangi alan',
  'LBL_LINK_RECORD' => 'Kayı etmek için Link',
  'LBL_INVITE_LINK' => 'Toplantı/Arama Davet Linki',
  'LBL_PLEASE_SELECT' => 'Lütfen Seçiniz',
  'LBL_BODY' => 'Gövde:',
  'LBL__S' => '',
  'LBL_ALERT_SUBJECT' => 'İŞ AKIŞ UYARISI',
  'LBL_ACTION_ERROR' => 'Bu aksiyon uygulanamaz. Aksiyonu değiştirerek tüm alanların ve alan değerlerinin geçerli olmasını sağlayın',
  'LBL_ACTION_ERRORS' => 'Uyarı: Aşağıdaki bir veya daha fazla aksiyon hata içermektedir.',
  'LBL_ALERT_ERROR' => 'Bu uyarı uygulanamaz. Uyarıyı değiştirerek tüm ayarların geçerli olmasını sağlayın.',
  'LBL_ALERT_ERRORS' => 'Uyarı: Aşağıda bulunan bir veya daha fazla uyarı hata içermektedir.',
  'LBL_TRIGGER_ERROR' => 'Uyarı: Bu tetikleyici geçersiz değer içermektedir ve tetiklenmeyecektir.',
  'LBL_TRIGGER_ERRORS' => 'Uyarı: Aşağıda bulunan bir veya daha fazla tetikleyici hata içermektedir.',
);

