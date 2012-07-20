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


	
$app_list_strings = array (
  'checkbox_dom' => 
  array (
    '' => '',
    1 => 'Evet',
    2 => 'Hayır',
  ),
  'account_type_dom' => 
  array (
    '' => '',
    'Analyst' => 'Analist',
    'Competitor' => 'Rakip',
    'Customer' => 'Müşteri',
    'Integrator' => 'Entegratör',
    'Investor' => 'Yatırımcı',
    'Partner' => 'İş Ortağı',
    'Press' => 'Basın',
    'Prospect' => 'Potansiyel Müşteri',
    'Reseller' => 'Bayii',
    'Other' => 'Diğer',
  ),
  'industry_dom' => 
  array (
    '' => '',
    'Apparel' => 'Tekstil',
    'Banking' => 'Bankacılık',
    'Biotechnology' => 'Biyoteknoloji',
    'Chemicals' => 'Kimyasal',
    'Communications' => 'İletişim',
    'Construction' => 'İnşaat',
    'Consulting' => 'Danışmanlık',
    'Education' => 'Eğitim',
    'Electronics' => 'Elektronik',
    'Energy' => 'Enerji',
    'Engineering' => 'Mühendislik',
    'Entertainment' => 'Eğlence',
    'Environmental' => 'Çevresel',
    'Finance' => 'Finans',
    'Government' => 'Kamu',
    'Healthcare' => 'Sağlık',
    'Hospitality' => 'Konukseverlik',
    'Insurance' => 'Sigorta',
    'Machinery' => 'Makine',
    'Manufacturing' => 'Üretim',
    'Media' => 'Medya',
    'Not For Profit' => 'Sivil Toplum Kuruluşu',
    'Recreation' => 'Rekreasyon',
    'Retail' => 'Perakende',
    'Shipping' => 'Nakliyat',
    'Technology' => 'Teknoloji',
    'Telecommunications' => 'Telekomünikasyon',
    'Transportation' => 'Ulaşım',
    'Utilities' => 'Alt Yapı',
    'Other' => 'Diğer',
  ),
  'lead_source_dom' => 
  array (
    '' => '',
    'Cold Call' => 'Beklenmeyen Arama',
    'Existing Customer' => 'Mevcut Müşteri',
    'Self Generated' => 'Kendi İnsiyatifiyle',
    'Employee' => 'Çalışan',
    'Partner' => 'İş Ortağı',
    'Public Relations' => 'Halkla İlişkiler',
    'Direct Mail' => 'Posta',
    'Conference' => 'Konferans',
    'Trade Show' => 'Ticari Etkinlik',
    'Web Site' => 'Web Sitesi',
    'Word of mouth' => 'Tavsiyeyle',
    'Email' => 'E-Posta',
    'Other' => 'Diğer',
  ),
  'opportunity_type_dom' => 
  array (
    '' => '',
    'Existing Business' => 'Mevcut Firma',
    'New Business' => 'Yeni Firma',
  ),
  'opportunity_relationship_type_dom' => 
  array (
    '' => '',
    'Primary Decision Maker' => 'Karar Verici',
    'Business Decision Maker' => 'Ticari Karar Verici',
    'Business Evaluator' => 'Ticari Değerlendirici',
    'Technical Decision Maker' => 'Teknik Karar Verici',
    'Technical Evaluator' => 'Teknik Değerlendirici',
    'Executive Sponsor' => 'Yönetici Sponsor',
    'Influencer' => 'Kararı Etkileyici',
    'Other' => 'Diğer',
  ),
  'case_relationship_type_dom' => 
  array (
    '' => '',
    'Primary Contact' => 'Ana Kontak',
    'Alternate Contact' => 'Alternatif Kontak',
  ),
  'payment_terms' => 
  array (
    '' => '',
    'Net 15' => 'Net 15',
    'Net 30' => 'Net 30',
  ),
  'sales_probability_dom' => 
  array (
    'Prospecting' => '10',
    'Qualification' => '20',
    'Needs Analysis' => '25',
    'Value Proposition' => '30',
    'Id. Decision Makers' => '40',
    'Perception Analysis' => '50',
    'Proposal/Price Quote' => '65',
    'Negotiation/Review' => '80',
    'Closed Won' => '100',
    'Closed Lost' => '',
  ),
  'salutation_dom' => 
  array (
    '' => '',
    'Mr.' => 'Bay.',
    'Ms.' => 'Bayan.',
    'Mrs.' => 'Bayan.',
    'Dr.' => 'Doktor.',
    'Prof.' => 'Profesör.',
  ),
  'lead_status_dom' => 
  array (
    '' => '',
    'New' => 'Yeni',
    'Assigned' => 'Atanmış',
    'In Process' => 'İşlemde',
    'Converted' => 'Dönüştü',
    'Recycled' => 'Geri Kazanıldı',
    'Dead' => 'Ölü',
  ),
  'messenger_type_dom' => 
  array (
    '' => '',
    'MSN' => 'MSN',
    'Yahoo!' => 'Yahoo!',
    'AOL' => 'AOL',
  ),
  'project_task_utilization_options' => 
  array (
    25 => '25',
    50 => '50',
    75 => '75',
    100 => '100',
  ),
  'quote_relationship_type_dom' => 
  array (
    '' => '',
    'Primary Decision Maker' => 'Karar Verici',
    'Business Decision Maker' => 'Ticari Karar Verici',
    'Business Evaluator' => 'Ticari Değerlendirici',
    'Technical Decision Maker' => 'Teknik Karar Verici',
    'Technical Evaluator' => 'Teknik Değerlendirici',
    'Executive Sponsor' => 'Yönetici Sponsor',
    'Influencer' => 'Kararı Etkileyici',
    'Other' => 'Diğer',
  ),
  'bug_resolution_dom' => 
  array (
    '' => '',
    'Accepted' => 'Kabul edildi',
    'Duplicate' => 'Çoğalt',
    'Fixed' => 'Sabit',
    'Out of Date' => 'Geçerliliğini Yitirmiş',
    'Invalid' => 'Geçersiz',
    'Later' => 'Sonra',
  ),
  'source_dom' => 
  array (
    '' => '',
    'Forum' => 'Forum',
    'Web' => 'Web',
    'Internal' => 'Dahili',
    'InboundEmail' => 'E-Posta',
  ),
  'product_category_dom' => 
  array (
    '' => '',
    'Accounts' => 'Hesaplar',
    'Activities' => 'Aktiviteler',
    'Bug Tracker' => 'Hata İzleyici',
    'Calendar' => 'Takvim',
    'Calls' => 'Tel.Aramaları',
    'Campaigns' => 'Kampanyalar',
    'Cases' => 'Talepler',
    'Contacts' => 'Kontaklar',
    'Currencies' => 'Para Birimleri',
    'Dashboard' => 'Gösterge Panosu',
    'Documents' => 'Dokümanlar',
    'Emails' => 'E-Postalar',
    'Feeds' => 'Beslemeler',
    'Forecasts' => 'Tahminler',
    'Help' => 'Yardım',
    'Home' => 'Ana Sayfa',
    'Leads' => 'Potansiyeller',
    'Meetings' => 'Toplantılar',
    'Notes' => 'Notlar',
    'Opportunities' => 'Fırsatlar',
    'Outlook Plugin' => 'Outlook Eki',
    'Product Catalog' => 'Ürün Listesi',
    'Products' => 'Ürünler',
    'Projects' => 'Projeler',
    'Quotes' => 'Teklifler',
    'Releases' => 'Sürümler',
    'RSS' => 'Bilgi Beslemesi',
    'Studio' => 'Stüdyo',
    'Upgrade' => 'Versiyon Yükseltme',
    'Users' => 'Kullanıcılar',
  ),
  'campaign_status_dom' => 
  array (
    '' => '',
    'Planning' => 'Planlama',
    'Active' => 'Aktif',
    'Inactive' => 'İnaktif',
    'Complete' => 'Tamamlandı',
    'In Queue' => 'Kuyrukta',
    'Sending' => 'Gönderiliyor',
  ),
  'campaign_type_dom' => 
  array (
    '' => '',
    'Web' => 'Web',
    'Telesales' => 'Tele Satış',
    'Mail' => 'Posta',
    'Email' => 'E-Posta',
    'Print' => 'Baskı',
    'Radio' => 'Radyo',
    'Television' => 'Televizyon',
  ),
  'notifymail_sendtype' => 
  array (
    'SMTP' => 'SMTP',
  ),
  'dom_timezones' => 
  array (
    -9 => '(GMT - 9) Alaska',
    -8 => '(GMT - 8) San Francisco',
    -7 => '(GMT - 7) Phoenix',
    -6 => '(GMT - 6) Saskatchewan',
    -5 => '(GMT - 5) New York',
    -4 => '(GMT - 4) Santiago',
    -3 => '(GMT - 3) Buenos Aires',
    1 => '(GMT + 1) Madrid',
    5 => '(GMT + 5) Ekaterinburg',
    6 => '(GMT + 6) Astana',
    7 => '(GMT + 7) Bangkok',
    8 => '(GMT + 8) Perth',
    10 => '(GMT + 10) Brisbane',
    12 => '(GMT + 12) Auckland',
    -12 => '(GMT - 12) Uluslararası Tarih Çizgisi Batı',
    -11 => '(GMT - 11) Midway Adası, Samoa',
    -10 => '(GMT - 10) Hawai',
    -2 => '(GMT - 2) Orta-Atlantik',
    -1 => '(GMT - 1) Azorlar',
    2 => '(GMT + 2) Atina',
    3 => '(GMT + 3) Moskova',
    4 => '(GMT + 4) Kabil',
    9 => '(GMT + 9) Seul',
    11 => '(GMT + 11) Solomon Adaları',
  ),
  'dom_email_server_type' => 
  array (
    'imap' => 'IMAP',
    'pop3' => 'POP3',
    '' => '--Boş--',
  ),
  'document_category_dom' => 
  array (
    '' => '',
    'Marketing' => 'Pazarlama',
    'Knowledege Base' => 'Bilgi Tabanı',
    'Sales' => 'Satışlar',
  ),
  'document_subcategory_dom' => 
  array (
    '' => '',
    'Marketing Collateral' => 'Pazarlama Teminatı',
    'Product Brochures' => 'Ürün Broşürleri',
    'FAQ' => 'SSS',
  ),
  'document_template_type_dom' => 
  array (
    '' => '',
    'eula' => 'EULA',
    'nda' => 'NDA',
    'mailmerge' => 'Posta Birleştir',
    'license' => 'Lisans Sözleşmesi',
  ),
  'wflow_address_type_dom' => 
  array (
    'cc' => 'CC:',
    'to' => 'Kime:',
    'bcc' => 'Gizli:',
  ),
  'wflow_address_type_invite_dom' => 
  array (
    'cc' => 'CC:',
    'to' => 'Kime:',
    'bcc' => 'Gizli:',
    'invite_only' => '(Yalnızca Davet Et)',
  ),
  'dom_timezones_extra' => 
  array (
    -9 => '(GMT-9) Alaska',
    -8 => '(GMT-8) (PST)',
    -7 => '(GMT-7) (MST)',
    -6 => '(GMT-6) (CST)',
    -5 => '(GMT-5) (EST)',
    -4 => '(GMT-4) Santiago',
    -3 => '(GMT-3) Buenos Aires',
    1 => '(GMT+1) Madrid',
    5 => '(GMT+5) Ekaterinburg',
    6 => '(GMT+6) Astana',
    7 => '(GMT+7) Bangkok',
    8 => '(GMT+8) Perth',
    10 => '(GMT+10) Brisbane',
    12 => '(GMT+12) Auckland',
    -12 => '(GMT - 12) Uluslararası Tarih Çizgisi Batı',
    -11 => '(GMT-11) Midway Adası, Samoa',
    -10 => '(GMT-10) Hawai',
    -2 => '(GMT-2) Orta-Atlantik',
    -1 => '(GMT-1) Azorlar',
    2 => '(GMT+2) Atina',
    3 => '(GMT+3) Moskova',
    4 => '(GMT+4) Kabil',
    9 => '(GMT+9) Seul',
    11 => '(GMT+11) Solomon Adaları',
  ),
  'duration_intervals' => 
  array (
    15 => '15',
    30 => '30',
    45 => '45',
  ),
  'prospect_list_type_dom' => 
  array (
    'test' => 'Test',
    'default' => 'Varsayılan',
    'seed' => 'Kaynak',
    'exempt_domain' => 'Domain\'e Göre Engelleme Listesi',
    'exempt_address' => 'E-Posta\'ya Göre Engelleme Listesi',
    'exempt' => 'Id\'ye Göre Engelleme Listesi',
  ),
  'email_marketing_status_dom' => 
  array (
    '' => '',
    'active' => 'Aktif',
    'inactive' => 'İnaktif',
  ),
  'campainglog_activity_type_dom' => 
  array (
    '' => '',
    'targeted' => 'Mesaj Gönderildi/Denendi',
    'send error' => 'Geri Gelen Mesajlar,Diğerleri',
    'invalid email' => 'Geri Gelen Mesajlar,Geçersiz E-Posta',
    'link' => 'Tıklanma Linki',
    'viewed' => 'Görüntülenmiş Mesaj',
    'removed' => 'Liste Dışına Çıkan',
    'lead' => 'Oluşturulan Potansiyeller',
    'contact' => 'Oluşturulan Kontaklar',
  ),
  'language_pack_name' => 'Turkçesi (TR)',
  'reminder_max_time' => '3600',
  'product_status_quote_key' => 'Teklifler',
  'moduleList' => 
  array (
    'Home' => 'Ana Sayfa',
    'Bugs' => 'Hata İzleyici',
    'Cases' => 'Talepler',
    'Notes' => 'Notlar',
    'Newsletters' => 'Bültenler',
    'Teams' => 'Takımlar',
    'Users' => 'Kullanıcılar',
    'KBDocuments' => 'Bilgi Tabanı',
    'FAQ' => 'SSS',
  ),
  'moduleListSingular' => 
  array (
    'Home' => 'Ana Sayfa',
    'Bugs' => 'Hata',
    'Cases' => 'Talepler',
    'Notes' => 'Notlar',
    'Teams' => 'Takım',
    'Users' => 'Kullanıcı',
  ),
  'sales_stage_dom' => 
  array (
    'Prospecting' => 'İnceleme',
    'Qualification' => 'Kalifikasyon',
    'Needs Analysis' => 'İhtiyaç Analizi',
    'Value Proposition' => 'Değer Önerisi',
    'Id. Decision Makers' => 'Karar Verenlerin Belirlenmesi',
    'Perception Analysis' => 'Persepsiyon Analizi',
    'Proposal/Price Quote' => 'Teklif/Fiyat Verme',
    'Negotiation/Review' => 'Anlaşma/İnceleme',
    'Closed Won' => 'Başarıyla Kapandı',
    'Closed Lost' => 'Başarısızlıkla Kapandı',
  ),
  'activity_dom' => 
  array (
    'Call' => 'Tel.Araması',
    'Meeting' => 'Toplantı',
    'Task' => 'Görev',
    'Email' => 'E-Posta',
    'Note' => 'Not',
  ),
  'reminder_time_options' => 
  array (
    60 => '1 dakika önce',
    300 => '5 dakika önce',
    600 => '10 dakika önce',
    900 => '15 dakika önce',
    1800 => '30 dakika önce',
    3600 => '1 saat önce',
  ),
  'task_priority_dom' => 
  array (
    'High' => 'Yüksek',
    'Medium' => 'Orta',
    'Low' => 'Düşük',
  ),
  'task_status_dom' => 
  array (
    'Not Started' => 'Başlamadı',
    'In Progress' => 'İşlemde',
    'Completed' => 'Tamamlandı',
    'Pending Input' => 'Cevap Bekleniyor',
    'Deferred' => 'Ertelendi',
  ),
  'meeting_status_dom' => 
  array (
    'Planned' => 'Planlandı',
    'Held' => 'Askıda',
    'Not Held' => 'Yapılmadı',
  ),
  'call_status_dom' => 
  array (
    'Planned' => 'Planlandı',
    'Held' => 'Askıda',
    'Not Held' => 'Yapılmadı',
  ),
  'call_direction_dom' => 
  array (
    'Inbound' => 'Gelen',
    'Outbound' => 'Giden',
  ),
  'lead_status_noblank_dom' => 
  array (
    'New' => 'Yeni',
    'Assigned' => 'Atanmış',
    'In Process' => 'İşlemde',
    'Converted' => 'Dönüştü',
    'Recycled' => 'Geri Kazanıldı',
    'Dead' => 'Ölü',
  ),
  'case_status_dom' => 
  array (
    'New' => 'Yeni',
    'Assigned' => 'Atanmış',
    'Closed' => 'Kapalı',
    'Pending Input' => 'Bekleyen Girdi',
    'Rejected' => 'Reddedildi',
    'Duplicate' => 'Çoğalt',
  ),
  'case_priority_dom' => 
  array (
    'P1' => 'Yüksek',
    'P2' => 'Orta',
    'P3' => 'Düşük',
  ),
  'user_status_dom' => 
  array (
    'Active' => 'Aktif',
    'Inactive' => 'İnaktif',
  ),
  'employee_status_dom' => 
  array (
    'Active' => 'Aktif',
    'Terminated' => 'Sonlandırıldı',
    'Leave of Absence' => 'İzin',
  ),
  'project_task_priority_options' => 
  array (
    'High' => 'Yüksek',
    'Medium' => 'Orta',
    'Low' => 'Düşük',
  ),
  'project_task_status_options' => 
  array (
    'Not Started' => 'Başlamadı',
    'In Progress' => 'İşlemde',
    'Completed' => 'Tamamlandı',
    'Pending Input' => 'Bekleyen Girdi',
    'Deferred' => 'Ertelendi',
  ),
  'record_type_display' => 
  array (
    'Accounts' => 'Hesaplar',
    'Opportunities' => 'Fırsatlar',
    'Cases' => 'Talepler',
    'Leads' => 'Potansiyeller',
    'Contacts' => 'Kontaklar',
    'ProductTemplates' => 'Ürün',
    'Quotes' => 'Teklifler',
    'Bugs' => 'Hata',
    'Project' => 'Proje',
    'ProjectTask' => 'Proje Görevi',
    'Tasks' => 'Görev',
  ),
  'record_type_display_notes' => 
  array (
    'Accounts' => 'Hesap',
    'Contacts' => 'Kontak',
    'Opportunities' => 'Fırsat',
    'Cases' => 'Talep',
    'Leads' => 'Potansiyel',
    'ProductTemplates' => 'Ürün',
    'Quotes' => 'Teklif',
    'Products' => 'Ürünler',
    'Contracts' => 'Kontrat',
    'Bugs' => 'Hata',
    'Emails' => 'E-Posta',
    'Project' => 'Proje',
    'ProjectTask' => 'Proje Görevi',
    'Meetings' => 'Toplantı',
    'Calls' => 'Tel.Araması',
  ),
  'product_status_dom' => 
  array (
    'Quotes' => 'Teklif Edilmiş',
    'Orders' => 'Sipariş Edilmiş',
    'Ship' => 'Yollanmış',
  ),
  'pricing_formula_dom' => 
  array (
    'Fixed' => 'Sabit Fiyat',
    'ProfitMargin' => 'Kar Payı',
    'PercentageMarkup' => 'Maliyet üzerinden Fiyat Artışı',
    'PercentageDiscount' => 'Listeden indirim',
    'IsList' => 'Liste ile aynı',
  ),
  'product_template_status_dom' => 
  array (
    'Available' => 'Stokta',
    'Unavailable' => 'Stokta Yok',
  ),
  'tax_class_dom' => 
  array (
    'Taxable' => 'Vergilendirilebilir',
    'Non-Taxable' => 'Vergilendirilemez',
  ),
  'support_term_dom' => 
  array (
    '+6 months' => 'Altı Ay',
    '+1 year' => 'Bir Yıl',
    '+2 years' => 'İki yıl',
  ),
  'quote_type_dom' => 
  array (
    'Quotes' => 'Teklif',
    'Orders' => 'Sipariş',
  ),
  'quote_stage_dom' => 
  array (
    'Draft' => 'Taslak',
    'Negotiation' => 'Pazarlık',
    'Delivered' => 'Teslim Edildi',
    'On Hold' => 'Askıda',
    'Confirmed' => 'Onaylandı',
    'Closed Accepted' => 'Kabul Edilerek Kapandı',
    'Closed Lost' => 'Başarısızlıkla Kapandı',
    'Closed Dead' => 'Çıkmaza Girdi',
  ),
  'order_stage_dom' => 
  array (
    'Pending' => 'Askıda',
    'Confirmed' => 'Onaylandı',
    'On Hold' => 'Beklemede',
    'Shipped' => 'Teslim edildi',
    'Cancelled' => 'İptal',
  ),
  'layouts_dom' => 
  array (
    'Standard' => 'Teklif',
    'Invoice' => 'Fatura',
    'Terms' => 'Ödeme Koşulları',
  ),
  'bug_priority_dom' => 
  array (
    'Urgent' => 'Acil',
    'High' => 'Yüksek',
    'Medium' => 'Orta',
    'Low' => 'Düşük',
  ),
  'bug_status_dom' => 
  array (
    'New' => 'Yeni',
    'Assigned' => 'Atanmış',
    'Closed' => 'Kapalı',
    'Pending' => 'Askıda',
    'Rejected' => 'Reddedilmiş',
  ),
  'bug_type_dom' => 
  array (
    'Defect' => 'Kusur',
    'Feature' => 'Özellik',
  ),
  'dom_cal_month_long' => 
  array (
    1 => 'Ocak',
    2 => 'Şubat',
    3 => 'Mart',
    4 => 'Nisan',
    5 => 'Mayıs',
    6 => 'Haziran',
    7 => 'Temmuz',
    8 => 'Ağustos',
    9 => 'Eylül',
    10 => 'Ekim',
    11 => 'Kasım',
    12 => 'Aralık',
  ),
  'dom_report_types' => 
  array (
    'tabular' => 'Satırlar ve Sütunlar',
    'summary' => 'Toplam',
    'detailed_summary' => 'Detaylı Toplam',
  ),
  'dom_email_types' => 
  array (
    'out' => 'Gönderildi',
    'archived' => 'Arşivlendi',
    'draft' => 'Taslak',
    'inbound' => 'Gelen',
  ),
  'dom_email_status' => 
  array (
    'archived' => 'Arşivlendi',
    'closed' => 'Kapandı',
    'draft' => 'Taslakta',
    'read' => 'Okundu',
    'replied' => 'Yanıtlandı',
    'sent' => 'Gönderildi',
    'send_error' => 'Gönderim Hatası',
    'unread' => 'Okunmadı',
  ),
  'dom_mailbox_type' => 
  array (
    'pick' => 'Oluştur [Herhangi]',
    'bug' => 'Hata Oluştur',
    'support' => 'Talep Oluştur',
    'contact' => 'Kontak Oluştur',
    'sales' => 'Potansiyel Oluştur',
    'task' => 'Görev Oluştur',
    'bounce' => 'Ulaşmayan E-Posta Yönetimi',
  ),
  'dom_email_distribution' => 
  array (
    '' => '--Boş--',
    'direct' => 'Doğrudan Atama',
    'roundRobin' => 'Sırayla',
    'leastBusy' => 'En Az Meşgul',
  ),
  'dom_email_errors' => 
  array (
    1 => 'Doğrudan atama yaparken sadece bir kullanıcı seçin.',
    2 => 'Doğrudan atama yaparken sadece işaretli öğeleri atayabilirsiniz.',
  ),
  'dom_email_bool' => 
  array (
    'bool_true' => 'Evet',
    'bool_false' => 'Hayır',
  ),
  'dom_int_bool' => 
  array (
    1 => 'Evet',
  ),
  'dom_switch_bool' => 
  array (
    'on' => 'Evet',
    'off' => 'Hayır',
    '' => 'Hayır',
  ),
  'dom_email_link_type' => 
  array (
    '' => 'Sistem Varsayılan Posta İstemcisi',
    'sugar' => 'SugarCRM Posta İstemcisi',
    'mailto' => 'Harici Posta İstemcisi',
  ),
  'dom_email_editor_option' => 
  array (
    '' => 'Varsayılan E-Posta Formatı',
    'html' => 'HTML E-Posta',
    'plain' => 'Düz Metin E-Posta',
  ),
  'schedulers_times_dom' => 
  array (
    'not run' => 'Önceki İşlem Zamanı, Çalışmadı',
    'ready' => 'Hazır',
    'in progress' => 'İşlemde',
    'failed' => 'Başarısız',
    'completed' => 'Tamamlandı',
    'no curl' => 'Çalışmıyor: cURL mevcut değil',
  ),
  'forecast_schedule_status_dom' => 
  array (
    'Active' => 'Aktif',
    'Inactive' => 'İnaktif',
  ),
  'forecast_type_dom' => 
  array (
    'Direct' => 'Doğrudan',
    'Rollup' => 'Arttırmak',
  ),
  'document_status_dom' => 
  array (
    'Active' => 'Aktif',
    'Draft' => 'Taslak',
    'FAQ' => 'SSS',
    'Expired' => 'Süresi Geçmiş',
    'Under Review' => 'İncelemede',
    'Pending' => 'Askıda',
  ),
  'dom_meeting_accept_options' => 
  array (
    'accept' => 'Kabul',
    'decline' => 'Red',
    'tentative' => 'Kesin Değil',
  ),
  'dom_meeting_accept_status' => 
  array (
    'accept' => 'Kabul Edildi',
    'decline' => 'Reddedildi',
    'tentative' => 'Kesin Değil',
    'none' => 'Boş',
  ),
  'query_calc_oper_dom' => 
  array (
    '+' => '(+) Artı',
    '-' => '(-) Eksi',
    '*' => '(X) Çarpım',
    '/' => '(/) Böl',
  ),
  'wflow_type_dom' => 
  array (
    'Normal' => 'Kayıtlar kaydedildiği zaman',
    'Time' => 'Zaman geçtikten sonra',
  ),
  'mselect_type_dom' => 
  array (
    'Equals' => 'Eşittir',
    'in' => 'Ondan',
  ),
  'cselect_type_dom' => 
  array (
    'Equals' => 'Eşittir',
    'Does not Equal' => 'Eşit Değil',
  ),
  'dselect_type_dom' => 
  array (
    'Equals' => 'Eşittir',
    'Less Than' => 'Daha Az',
    'More Than' => 'Daha Fazla',
    'Does not Equal' => 'Eşit Değil',
  ),
  'bselect_type_dom' => 
  array (
    'bool_true' => 'Evet',
    'bool_false' => 'Hayır',
  ),
  'bopselect_type_dom' => 
  array (
    'Equals' => 'Eşittir',
  ),
  'tselect_type_dom' => 
  array (
    14440 => '4 saat',
    28800 => '8 saat',
    43200 => '12 saat',
    86400 => '1 gün',
    172800 => '2 gün',
    259200 => '3 gün',
    345600 => '4 gün',
    432000 => '5 gün',
    604800 => '1 hafta',
    1209600 => '2 hafta',
    1814400 => '3 hafta',
    2592000 => '30 gün',
    5184000 => '60 gün',
    7776000 => '90 gün',
    10368000 => '120 gün',
    12960000 => '150 gün',
    15552000 => '180 gün',
  ),
  'dtselect_type_dom' => 
  array (
    'More Than' => 'daha fazlaydı',
    'Less Than' => 'daha az',
  ),
  'wflow_alert_type_dom' => 
  array (
    'Email' => 'E-Posta',
    'Invite' => 'Davetiye',
  ),
  'wflow_source_type_dom' => 
  array (
    'Normal Message' => 'Normal Mesaj',
    'Custom Template' => 'Özel Şablon',
    'System Default' => 'Sistem Varsayılan Değerleri',
  ),
  'wflow_user_type_dom' => 
  array (
    'current_user' => 'Oturum Açmış Kullanıcılar',
    'rel_user' => 'İlgili Kullanıcılar',
    'rel_user_custom' => 'İlgili Özel Kullanıcı',
    'specific_team' => 'Belirli Takım',
    'specific_role' => 'Belirli Rol',
    'specific_user' => 'Belirli Kullanıcı',
  ),
  'wflow_array_type_dom' => 
  array (
    'future' => 'Yeni Değer',
    'past' => 'Eski Değer',
  ),
  'wflow_relate_type_dom' => 
  array (
    'Self' => 'Kullanıcı',
    'Manager' => 'Kullanıcının Yöneticisi',
  ),
  'wflow_address_type_to_only_dom' => 
  array (
    'to' => 'Kime:',
  ),
  'wflow_action_type_dom' => 
  array (
    'update' => 'Kayıdı Güncelle',
    'update_rel' => 'İlgili Kayıdı Güncelle',
    'new' => 'Yeni Kayıt',
  ),
  'wflow_action_datetime_type_dom' => 
  array (
    'Triggered Date' => 'Tetiklenen Tarih',
    'Existing Value' => 'Varolan Değer',
  ),
  'wflow_set_type_dom' => 
  array (
    'Basic' => 'Temel Seçenekler',
    'Advanced' => 'Gelişmiş Seçenekler',
  ),
  'wflow_adv_user_type_dom' => 
  array (
    'assigned_user_id' => 'Tetiklenmiş kayıda atanmış kullanıcı',
    'modified_user_id' => 'Tetiklenmiş kayıdı en son değiştiren kullanıcı',
    'created_by' => 'Tetiklenmiş kayıdı oluşturan kullanıcı',
    'current_user' => 'Oturum Açmış Kullanıcılar',
  ),
  'wflow_adv_team_type_dom' => 
  array (
    'team_id' => 'Tetiklenmiş Kaydın Takımı',
    'current_team' => 'Oturum Açmış Kullanıcının Takımı',
  ),
  'wflow_adv_enum_type_dom' => 
  array (
    'retreat' => 'Açılan listeyi geri taşı',
    'advance' => 'Açılan listeyi ileri taşı',
  ),
  'wflow_record_type_dom' => 
  array (
    'All' => 'Yeni ve Varolan Kayıtlar',
    'New' => 'Sadece Yeni Kayıtlar',
    'Update' => 'Sadece Varolan Kayıtlar',
  ),
  'wflow_rel_type_dom' => 
  array (
    'all' => 'Tümü',
    'filter' => 'Filtreleme ile ilgili',
  ),
  'wflow_relfilter_type_dom' => 
  array (
    'all' => 'tümü',
    'any' => 'ilgili herhangi',
  ),
  'wflow_fire_order_dom' => 
  array (
    'alerts_actions' => 'Alarmlar sonra Aksiyonlar',
    'actions_alerts' => 'Aksiyonlar sonra Alarmlar',
  ),
  'campainglog_target_type_dom' => 
  array (
    'Contacts' => 'Kontaklar',
    'Users' => 'Kullanıcılar',
    'Prospects' => 'Hedefler',
    'Leads' => 'Potansiyeller',
  ),
  'contract_status_dom' => 
  array (
    'notstarted' => 'Başlamadı',
    'inprogress' => 'İşlemde',
    'signed' => 'İmzalı',
  ),
  'contract_payment_frequency_dom' => 
  array (
    'monthly' => 'Aylık',
    'quarterly' => 'Çeyrek',
    'halfyearly' => 'Yarım yıllık',
    'yearly' => 'Yıllık',
  ),
  'contract_expiration_notice_dom' => 
  array (
    1 => '1 Gün',
    3 => '3 Gün',
    5 => '5 Gün',
    7 => '1 Hafta',
    14 => '2 Hafta',
    21 => '3 Hafta',
    31 => '1 Ay',
  ),
);

$app_strings = array (
  'LBL_ACCUMULATED_HISTORY_BUTTON_KEY' => 'H',
  'LBL_ADD_BUTTON_KEY' => 'A',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_KEY' => 'L',
  'LBL_ALT_HOT_KEY' => 'Alt+',
  'LBL_CANCEL_BUTTON_KEY' => 'X',
  'LBL_CHANGE_BUTTON_KEY' => 'G',
  'LBL_CHARSET' => 'UTF-8',
  'LBL_CLEAR_BUTTON_KEY' => 'C',
  'LBL_CLOSEALL_BUTTON_KEY' => 'Q',
  'LBL_COMPOSE_EMAIL_BUTTON_KEY' => 'L',
  'LBL_DELETE_BUTTON_KEY' => 'D',
  'LBL_DONE_BUTTON_KEY' => 'X',
  'LBL_DUPLICATE_BUTTON_KEY' => 'U',
  'LBL_EDIT_BUTTON_KEY' => 'E',
  'LBL_VIEW_BUTTON_KEY' => 'V',
  'LBL_EMAIL_PDF_BUTTON_KEY' => 'M',
  'LBL_ID' => 'ID',
  'LBL_MAILMERGE_KEY' => 'M',
  'LBL_NEW_BUTTON_KEY' => 'N',
  'LBL_OPENALL_BUTTON_KEY' => 'O',
  'LBL_OPENTO_BUTTON_KEY' => 'T',
  'LBL_PERCENTAGE_SYMBOL' => '%',
  'LBL_QUOTE_TO_OPPORTUNITY_KEY' => 'O',
  'LBL_REQUIRED_SYMBOL' => '*',
  'LBL_SAVE_BUTTON_KEY' => 'S',
  'LBL_FULL_FORM_BUTTON_KEY' => 'F',
  'LBL_SAVE_NEW_BUTTON_KEY' => 'V',
  'LBL_SEARCH_BUTTON_KEY' => 'Q',
  'LBL_SELECT_BUTTON_KEY' => 'T',
  'LBL_SELECT_CONTACT_BUTTON_KEY' => 'T',
  'LBL_SELECT_USER_BUTTON_KEY' => 'U',
  'LBL_SQS_INDICATOR' => '',
  'LBL_THOUSANDS_SYMBOL' => 'K',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_VIEW_PDF_BUTTON_KEY' => 'P',
  'NTC_TIME_FORMAT' => '(24:00)',
  'NTC_YEAR_FORMAT' => '(yyyy)',
  'LBL_LIST_TEAM' => 'Takım',
  'LBL_TEAM' => 'Takımlar:',
  'LBL_TEAM_ID' => 'Takım ID:',
  'ERR_CREATING_FIELDS' => 'Ek detay alanlarını doldururken hata:',
  'ERR_CREATING_TABLE' => 'Tablo oluştururken hata:',
  'ERR_DELETE_RECORD' => 'Kontak bilgisini silmek için bir kayıt no\'su belirtmelisiniz.',
  'ERR_EXPORT_DISABLED' => 'Veri Aktarma Etkisizleştirildi.',
  'ERR_EXPORT_TYPE' => 'Veri Yüklemede Hata',
  'ERR_INVALID_AMOUNT' => 'Lütfen geçerli bir tutar girin.',
  'ERR_INVALID_DATE_FORMAT' => 'Tarih formatı bu şekilde olmak zorundadır:',
  'ERR_INVALID_DATE' => 'Lütfen geçerli bir tarih girin.',
  'ERR_INVALID_DAY' => 'Lütfen geçerli bir gün girin.',
  'ERR_INVALID_EMAIL_ADDRESS' => 'geçersiz e-posta.',
  'ERR_INVALID_HOUR' => 'Lütfen geçerli bir saat girin.',
  'ERR_INVALID_MONTH' => 'Lütfen geçerli bir ay girin.',
  'ERR_INVALID_TIME' => 'Lütfen geçerli bir zaman girin.',
  'ERR_INVALID_YEAR' => 'Lütfen geçerli bir 4 basamaklı yıl girin.',
  'ERR_NEED_ACTIVE_SESSION' => 'İçeriğin aktarılabilmesi için aktif bir oturum gerekmektedir.',
  'ERR_MISSING_REQUIRED_FIELDS' => 'Doldurulması zorunlu alanlar eksik:',
  'ERR_INVALID_REQUIRED_FIELDS' => 'Zorunlu alanda geçersiz değer:',
  'ERR_INVALID_VALUE' => 'Geçersiz Değer:',
  'ERR_NOTHING_SELECTED' => 'Lütfen başlamadan önce bir seçim yapınız.',
  'ERR_OPPORTUNITY_NAME_DUPE' => '%s isminde bir Fırsat zaten var.  Lütfen aşağıda farklı bir isim girin.',
  'ERR_OPPORTUNITY_NAME_MISSING' => 'Fırsat adı girilmemiş. Lütfen aşağıda bir isim girin.',
  'ERR_SELF_REPORTING' => 'Kullanıcı kendi kendisine raporlayamaz.',
  'ERR_SQS_NO_MATCH_FIELD' => 'Alan için eşleşme yok:',
  'ERR_SQS_NO_MATCH' => 'Eşleşme yok',
  'ERR_PORTAL_LOGIN_FAILED' => 'Portal oturum girişi yaratılamıyor. Lütfen sistem yöneticisiyle bağlantı kurun.',
  'ERR_RESOURCE_MANAGEMENT_INFO' => '<a href="index.php">Ana Sayfaya</a> Dön',
  'LBL_ACCOUNT' => 'Hesap',
  'LBL_ACCOUNTS' => 'Hesaplar',
  'LBL_ACCUMULATED_HISTORY_BUTTON_LABEL' => 'Özet Göster',
  'LBL_ACCUMULATED_HISTORY_BUTTON_TITLE' => 'Özet Göster [Alt+H]',
  'LBL_ADD_BUTTON_TITLE' => 'Ekle [Alt+A]',
  'LBL_ADD_BUTTON' => 'Ekle',
  'LBL_ADD_DOCUMENT' => 'Belge Ekle',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_LABEL' => 'Hedef Listeye Ekle',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_TITLE' => 'Hedef Listeye Ekle',
  'LBL_ADDITIONAL_DETAILS_CLOSE_TITLE' => 'Kapamak İçin Tıkla',
  'LBL_ADDITIONAL_DETAILS_CLOSE' => 'Kapat',
  'LBL_ADDITIONAL_DETAILS' => 'Ek Detaylar',
  'LBL_ADMIN' => 'Yönetici',
  'LBL_ARCHIVE' => 'Arşivle',
  'LBL_ASSIGNED_TO_USER' => 'Atanan Kullanıcı',
  'LBL_ASSIGNED_TO' => 'Atanan Kişi:',
  'LBL_BACK' => 'Geri',
  'LBL_BILL_TO_ACCOUNT' => 'Müşteriye Faturala',
  'LBL_BILL_TO_CONTACT' => 'İlgiliye Faturala',
  'LBL_BROWSER_TITLE' => 'SugarCRM - Ticari Açık Kodlu CRM',
  'LBL_BUGS' => 'Hatalar',
  'LBL_BY' => 'ile',
  'LBL_CALLS' => 'Çağrılar',
  'LBL_CAMPAIGNS_SEND_QUEUED' => 'Kuyruktaki Kampanya E-Postalarını Gönder',
  'LBL_CANCEL_BUTTON_LABEL' => 'İptal',
  'LBL_CANCEL_BUTTON_TITLE' => 'İptal [Alt+X]',
  'LBL_CASE' => 'Talep:',
  'LBL_CASES' => 'Talepler',
  'LBL_CHANGE_BUTTON_LABEL' => 'Değiştir',
  'LBL_CHANGE_BUTTON_TITLE' => 'Değiştir [Alt+G]',
  'LBL_CHECKALL' => 'Tümünü Seç',
  'LBL_CLEAR_BUTTON_LABEL' => 'Temizle',
  'LBL_CLEAR_BUTTON_TITLE' => 'Temizle [Alt+C]',
  'LBL_CLEARALL' => 'Tümünü Temizle',
  'LBL_CLOSE_WINDOW' => 'Pencereyi Kapat',
  'LBL_CLOSEALL_BUTTON_LABEL' => 'Tümünü Kapat',
  'LBL_CLOSEALL_BUTTON_TITLE' => 'Tümünü Kapat [Alt+I]',
  'LBL_COMPOSE_EMAIL_BUTTON_LABEL' => 'E-Posta Oluştur',
  'LBL_COMPOSE_EMAIL_BUTTON_TITLE' => 'E-Posta Oluştur [Alt+L]',
  'LBL_CONTACT_LIST' => 'Kontak Listesi',
  'LBL_CONTACT' => 'Kontak',
  'LBL_CONTACTS' => 'Kontaklar',
  'LBL_CREATE_BUTTON_LABEL' => 'Oluştur',
  'LBL_CREATED_BY_USER' => 'Oluşturan Kullanıcı',
  'LBL_CREATED' => 'Oluşturan',
  'LBL_CURRENT_USER_FILTER' => 'Bana Ait Olanlar:',
  'LBL_DATE_ENTERED' => 'Oluşturulma Tarihi:',
  'LBL_DATE_MODIFIED' => 'Değiştirilme Tarihi:',
  'LBL_DELETE_BUTTON_LABEL' => 'Sil',
  'LBL_DELETE_BUTTON_TITLE' => 'Sil [Alt+D]',
  'LBL_DELETE_BUTTON' => 'Sil',
  'LBL_DELETE' => 'Sil',
  'LBL_DELETED' => 'Silindi',
  'LBL_DIRECT_REPORTS' => 'Doğrudan Raporlar',
  'LBL_DONE_BUTTON_LABEL' => 'Tamamlandı',
  'LBL_DONE_BUTTON_TITLE' => 'Tamam [Alt+X]',
  'LBL_DST_NEEDS_FIXIN' => 'Yaz Saati düzenlemesi uygulama için gereklidir. Lütfen Yönetici konsolunda bulunan <a href=\\"index.php?module=Administration&action=DstFix\\">Repair</a> bağlantısına gidin ve Yaz Saati Düzenlemesini uygulayın.',
  'LBL_DUPLICATE_BUTTON_LABEL' => 'Aynı Kayıttan Oluştur',
  'LBL_DUPLICATE_BUTTON_TITLE' => 'Aynı Kayıttan Oluştur [Alt+U]',
  'LBL_DUPLICATE_BUTTON' => 'Aynı Kayıttan Oluştur',
  'LBL_EDIT_BUTTON_LABEL' => 'Düzenle',
  'LBL_EDIT_BUTTON_TITLE' => 'Düzenle [Alt+E]',
  'LBL_EDIT_BUTTON' => 'Düzenle',
  'LBL_VIEW_BUTTON_LABEL' => 'Görünüm',
  'LBL_VIEW_BUTTON_TITLE' => 'Göster [Alt+V]',
  'LBL_VIEW_BUTTON' => 'Görünüm',
  'LBL_EMAIL_PDF_BUTTON_LABEL' => 'PDF olarak postala',
  'LBL_EMAIL_PDF_BUTTON_TITLE' => 'PDF olarak postala [Alt+M]',
  'LBL_EMAILS' => 'E-Postalar',
  'LBL_EMPLOYEES' => 'Çalışanlar',
  'LBL_ENTER_DATE' => 'Oluşturulma Tarihi',
  'LBL_EXPORT_ALL' => 'Tüm Veriyi Aktar',
  'LBL_EXPORT' => 'Veri Aktar',
  'LBL_HIDE' => 'Gizle',
  'LBL_IMPORT_PROSPECTS' => 'Hedef Verilerini Yükle',
  'LBL_IMPORT' => 'Veri Yükle',
  'LBL_LAST_VIEWED' => 'Son Görüntülenenler',
  'LBL_LEADS' => 'Potansiyeller',
  'LBL_LIST_ACCOUNT_NAME' => 'Hesap Adı',
  'LBL_LIST_ASSIGNED_USER' => 'Kullanıcı',
  'LBL_LIST_CONTACT_NAME' => 'Kontak Adı',
  'LBL_LIST_CONTACT_ROLE' => 'Kontak Rolü',
  'LBL_LIST_EMAIL' => 'E-Posta',
  'LBL_LIST_NAME' => 'İsim',
  'LBL_LIST_OF' => '/',
  'LBL_LIST_PHONE' => 'Telefon',
  'LBL_LIST_USER_NAME' => 'Kullanıcı Adı',
  'LBL_LISTVIEW_MASS_UPDATE_CONFIRM' => 'Tüm listeyi güncellemek istediğinizden emin misiniz?',
  'LBL_LISTVIEW_NO_SELECTED' => 'Lütfen işlem için en az bir kayıt seçin.',
  'LBL_LISTVIEW_OPTION_CURRENT' => 'Bu Sayfa',
  'LBL_LISTVIEW_OPTION_ENTIRE' => 'Tüm Kayıtlar',
  'LBL_LISTVIEW_OPTION_SELECTED' => 'Seçili Kayıtlar',
  'LBL_LISTVIEW_SELECTED_OBJECTS' => 'Seçilenler:',
  'LBL_LOCALE_NAME_EXAMPLE_FIRST' => 'Mehmet',
  'LBL_LOCALE_NAME_EXAMPLE_LAST' => 'Ersöz',
  'LBL_LOCALE_NAME_EXAMPLE_SALUTATION' => 'Bay',
  'LBL_LOGOUT' => 'Çıkış',
  'LBL_MAILMERGE' => 'Posta Birleştir',
  'LBL_MASS_UPDATE' => 'Toplu Güncelleme',
  'LBL_MEETINGS' => 'Toplantılar',
  'LBL_MEMBERS' => 'Üyeler',
  'LBL_MODIFIED_BY_USER' => 'Değiştiren Kullanıcı',
  'LBL_MODIFIED' => 'Düzenleyen',
  'LBL_MY_ACCOUNT' => 'Hesabım',
  'LBL_NAME' => 'İsim',
  'LBL_NEW_BUTTON_LABEL' => 'Oluştur',
  'LBL_NEW_BUTTON_TITLE' => 'Oluştur [Alt+N]',
  'LBL_NEXT_BUTTON_LABEL' => 'İleri',
  'LBL_NONE' => '--Boş--',
  'LBL_NOTES' => 'Notlar',
  'LBL_OPENALL_BUTTON_LABEL' => 'Tümünü Aç',
  'LBL_OPENALL_BUTTON_TITLE' => 'Tümünü Aç [Alt+O]',
  'LBL_OPENTO_BUTTON_LABEL' => 'Kişiye Aç:',
  'LBL_OPENTO_BUTTON_TITLE' => 'Kişiye Aç: [Alt+T]',
  'LBL_OPPORTUNITIES' => 'Fırsatlar',
  'LBL_OPPORTUNITY_NAME' => 'Fırsat Adı',
  'LBL_OPPORTUNITY' => 'Fırsat',
  'LBL_OR' => 'VEYA',
  'LBL_PRODUCT_BUNDLES' => 'Ürün Paketleri',
  'LBL_PRODUCTS' => 'Ürünler',
  'LBL_PROJECT_TASKS' => 'Proje Görevleri',
  'LBL_PROJECTS' => 'Projeler',
  'LBL_QUOTE_TO_OPPORTUNITY_LABEL' => 'Tekliften Fırsat Oluştur',
  'LBL_QUOTE_TO_OPPORTUNITY_TITLE' => 'Tekliften Fırsat Oluştur [Alt+O]',
  'LBL_QUOTES_SHIP_TO' => 'Teklif Alıcısı',
  'LBL_QUOTES' => 'Teklifler',
  'LBL_RELATED_RECORDS' => 'İlişkili Kayıtlar',
  'LBL_REMOVE' => 'Kaldır',
  'LBL_SAVE_BUTTON_LABEL' => 'Kaydet',
  'LBL_SAVE_BUTTON_TITLE' => 'Kaydet [Alt+S]',
  'LBL_FULL_FORM_BUTTON_LABEL' => 'Tam Form',
  'LBL_FULL_FORM_BUTTON_TITLE' => 'Tam Form [Alt+F]',
  'LBL_SAVE_NEW_BUTTON_LABEL' => 'Kaydet & Yeni Oluştur',
  'LBL_SAVE_NEW_BUTTON_TITLE' => 'Kaydet & Yeni Oluştur [Alt+V]',
  'LBL_SEARCH_BUTTON_LABEL' => 'Ara',
  'LBL_SEARCH_BUTTON_TITLE' => 'Ara [Alt+Q]',
  'LBL_SEARCH' => 'Ara',
  'LBL_SELECT_BUTTON_LABEL' => 'Seç',
  'LBL_SELECT_BUTTON_TITLE' => 'Seç[Alt+T]',
  'LBL_SELECT_CONTACT_BUTTON_LABEL' => 'İlgili Seç',
  'LBL_SELECT_CONTACT_BUTTON_TITLE' => 'İlgili Seç [Alt+T]',
  'LBL_SELECT_REPORTS_BUTTON_LABEL' => 'Raporlardan Seç',
  'LBL_SELECT_REPORTS_BUTTON_TITLE' => 'Raporları Seç',
  'LBL_SELECT_USER_BUTTON_LABEL' => 'Kullanıcı Seç',
  'LBL_SELECT_USER_BUTTON_TITLE' => 'Kullanıcı Seç [Alt+U]',
  'LBL_SERVER_RESPONSE_RESOURCES' => 'Bu sayfanın oluşumu için kullanılan gerekli kaynaklar (sorgular, dosyalar)',
  'LBL_SERVER_RESPONSE_TIME_SECONDS' => 'saniye.',
  'LBL_SERVER_RESPONSE_TIME' => 'Sunucu yanıt zamanı:',
  'LBL_SHIP_TO_ACCOUNT' => 'Gönderilecek Müşteri',
  'LBL_SHIP_TO_CONTACT' => 'Gönderilecek İlgili',
  'LBL_SHORTCUTS' => 'Kısayollar',
  'LBL_SHOW' => 'Göster',
  'LBL_STATUS_UPDATED' => 'Bu Etkinlik için durumunuz güncellendi!',
  'LBL_STATUS' => 'Durum:',
  'LBL_SUBJECT' => 'Konu',
  'LBL_SYNC' => 'Senkronizasyon',
  'LBL_TASKS' => 'Görevler',
  'LBL_TEAMS_LINK' => 'Takım',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'E-Posta Arşivle',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'E-Posta Arşivle [Alt+K]',
  'LBL_UNAUTH_ADMIN' => 'Sistem Yönetimi Fonksiyonlarına izinsiz erişim',
  'LBL_UNDELETE_BUTTON_LABEL' => 'Silinenleri Geri Al',
  'LBL_UNDELETE_BUTTON_TITLE' => 'Silinenleri Geri Al [Alt+D]',
  'LBL_UNDELETE_BUTTON' => 'Silinenleri Geri Al',
  'LBL_UNDELETE' => 'Silinenleri Geri Al',
  'LBL_UNSYNC' => 'Senkronizasyonu Kaldır',
  'LBL_UPDATE' => 'Güncelle',
  'LBL_USER_LIST' => 'Kullanıcı Listesi',
  'LBL_USERS_SYNC' => 'Kullanıcıları Senkronize Et',
  'LBL_USERS' => 'Kullanıcılar',
  'LBL_VIEW_PDF_BUTTON_LABEL' => 'PDF Olarak Yazdır',
  'LBL_VIEW_PDF_BUTTON_TITLE' => 'PDF Olarak Yazdır [Alt+P]',
  'LNK_ABOUT' => 'Hakkında',
  'LNK_ADVANCED_SEARCH' => 'Gelişmiş',
  'LNK_BASIC_SEARCH' => 'Temel',
  'LNK_DELETE_ALL' => 'tümünü sil',
  'LNK_DELETE' => 'sil',
  'LNK_EDIT' => 'düzenle',
  'LNK_GET_LATEST' => 'En sonuncuyu al',
  'LNK_GET_LATEST_TOOLTIP' => 'En son sürümle değiştir',
  'LNK_HELP' => 'Yardım',
  'LNK_LIST_END' => 'Son',
  'LNK_LIST_NEXT' => 'Sonraki',
  'LNK_LIST_PREVIOUS' => 'Önceki',
  'LNK_LIST_RETURN' => 'Listeye Geri Dön',
  'LNK_LIST_START' => 'Başla',
  'LNK_LOAD_SIGNED' => 'İmzala',
  'LNK_LOAD_SIGNED_TOOLTIP' => 'İmzalı belge ile değiştir',
  'LNK_PRINT' => 'Yazdır',
  'LNK_REMOVE' => 'sil',
  'LNK_RESUME' => 'Yeniden Başla',
  'LNK_VIEW_CHANGE_LOG' => 'Değişiklik Tarihçesini Göster',
  'NTC_CLICK_BACK' => 'Lütfen web tarayıcısının "geri" tuşuna basın ve hatayı düzeltin.',
  'NTC_DATE_FORMAT' => '(yyyy-aa-gg)',
  'NTC_DATE_TIME_FORMAT' => '(yyyy-aa-gg 24:00)',
  'NTC_DELETE_CONFIRMATION_MULTIPLE' => 'Seçili kayıt(ları) silmek istediğinizden emin misiniz?',
  'NTC_DELETE_CONFIRMATION' => 'Bu kaydı silmek istediğinizden emin misiniz?',
  'NTC_LOGIN_MESSAGE' => 'Lütfen kullanıcı adı ve şifrenizi giriniz.',
  'NTC_NO_ITEMS_DISPLAY' => 'boş',
  'NTC_REMOVE_CONFIRMATION' => 'Bu ilişkiyi kaldırmak istediğinizden emin misiniz?',
  'NTC_REQUIRED' => 'Zorunlu alanı gösterir',
  'NTC_SUPPORT_SUGARCRM' => 'PayPal ile bağış yaparak SugarCRM Projesini destekleyin- Ücretsiz, hızlı ve güvenli!',
  'NTC_WELCOME' => 'Hoşgeldiniz',
  'LOGIN_LOGO_ERROR' => 'Lütfen SugarCRM logolarını değiştirin.',
  'ERROR_FULLY_EXPIRED' => 'Şirketinize ait SugarCRM lisansının geçerliliği 30 günden önce sona ermiş ve güncellenmesi gerekir. Sadece Yöneticilerin giriş yapmasına izin verilmektedir.',
  'ERROR_LICENSE_EXPIRED' => 'Şirketinize ait SugarCRM lisansınızın güncellenmesi gerekmekte. Sadece Yöneticilerin giriş yapmasına izin verilmektedir.',
  'ERROR_NO_RECORD' => 'Kayıt almada hata. Bu kayıt silinmiş olabilir veya görüntülemek için izniniz yok.',
  'LBL_DUP_MERGE' => 'Aynı Kayıtları Bul',
  'LBL_LOADING' => 'Yükleniyor...',
  'LBL_SAVING_LAYOUT' => 'Sayfa Düzeni Kaydediliyor ...',
  'LBL_SAVED_LAYOUT' => 'Sayfa Düzeni kaydedildi.',
  'LBL_SAVED' => 'Kaydedildi',
  'LBL_SAVING' => 'Kaydediliyor',
  'LBL_DISPLAY_COLUMNS' => 'Kolonları Göster',
  'LBL_HIDE_COLUMNS' => 'Kolonları Gizle',
  'LBL_SEARCH_CRITERIA' => 'Arama Kriteri',
  'LBL_SAVED_VIEWS' => 'Kaydedilmiş Görünümler',
  'LBL_NO_RECORDS_FOUND' => '- 0 Kayıt Bulundu -',
  'LBL_LOGIN_SESSION_EXCEEDED' => 'Sunucu çok yoğun. Lütfen sonra tekrar deneyin.',
  'LBL_CHANGE_PASSWORD' => 'Üretilen Şifreyi Değiştir',
  'LBL_LOGIN_TO_ACCESS' => 'Lütfen bu alana erişim için oturum açınız.',
);

