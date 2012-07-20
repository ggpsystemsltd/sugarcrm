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
   'language_pack_name' => 'Turkish (TR)' ,
   'moduleList' => 
   array (
      'Home' => 'Ana Sayfa<sub><i> Home</i></sub>' ,
      'Dashboard' => 'Gösterge Panosu<sub><i> Dashboard</i></sub>' ,
      'Contacts' => 'İlgililer<sub><i> Contacts</i></sub>' ,
      'Accounts' => 'Müşteriler<sub><i> Accounts</i></sub>' ,
      'Opportunities' => 'Fırsatlar<sub><i> Opportunities</i></sub>' ,
      'Cases' => 'Talepler<sub><i> Cases</i></sub>' ,
      'Notes' => 'Notlar<sub><i> Notes</i></sub>' ,
      'Calls' => 'Tel.Aramaları<sub><i> Calls</i></sub>' ,
      'Emails' => 'E-Postalar<sub><i> Emails</i></sub>' ,
      'Meetings' => 'Toplantılar<sub><i> Meetings</i></sub>' ,
      'Tasks' => 'Görevler<sub><i> Tasks</i></sub>' ,
      'Calendar' => 'Takvim<sub><i> Calendar</i></sub>' ,
      'Leads' => 'Potansiyeller<sub><i> Leads</i></sub>' ,
    'Currencies' => 'Para Birimleri<sub><i> Currencies</i></sub>',

      'Activities' => 'Aktiviteler<sub><i> Activities</i></sub>' ,
      'Bugs' => 'Kusur İzleme<sub><i> Bug Tracker</i></sub>' ,
      'Feeds' => 'RSS<sub><i> RSS</i></sub>' ,
      'iFrames' => 'Portalım<sub><i> My Sites</i></sub>' ,
      'TimePeriods' => 'Zaman Aralıkları<sub><i> Time Periods</i></sub>' ,
      'Project' => 'Projeler<sub><i> Projects</i></sub>' ,
      'ProjectTask' => 'Proje Görevleri<sub><i> Project Tasks</i></sub>' ,
      'Campaigns' => 'Kampanyalar<sub><i> Campaigns</i></sub>' ,
    'CampaignLog'=>'Kampanya Tarihçesi<sub><i> Campaign Log</i></sub>',
      'Documents' => 'Dökümanlar<sub><i> Documents</i></sub>' ,
      'Sync' => 'Senkronizasyon<sub><i> Sync</i></sub>' ,

      'Users' => 'Kullanıcılar<sub><i> Users</i></sub>' ,
      'Releases' => 'Yayımlar<sub><i> Releases</i></sub>' ,
      'Prospects' => 'Hedefler<sub><i> Targets</i></sub>' ,
      'Queues' => 'Kuyruklar<sub><i> Queues</i></sub>' ,
      'EmailMarketing' => 'E-Posta Pazarlama<sub><i> Email Marketing</i></sub>' ,
      'EmailTemplates' => 'E-Posta Şablonları<sub><i> Email Templates</i></sub>' ,
      'ProspectLists' => 'Hedef Listeleri<sub><i> Target Lists</i></sub>' ,
      'SavedSearch' => 'Kayıtlı Aramalar<sub><i> Saved Searches</i></sub>' ,
    'Trackers' => 'Sistem İzleyicileri<sub><i> Trackers</i></sub>',
    'TrackerPerfs' => 'Sistem İzleyici Performansı<sub><i> Tracker Performance</i></sub>',
    'TrackerSessions' => 'Sistem İzleyici Oturumları<sub><i> Tracker Sessions</i></sub>',
    'TrackerQueries' => 'Sistem İzleyici Sorguları<sub><i> Tracker Queries</i></sub>',
    'FAQ' => 'SSS<sub><i> FAQ</i></sub>',
    'Newsletters' => 'Haber Bülteni<sub><i> Newsletters</i></sub>',
    'SugarFeed'=>'Sugar Bilgi Beslemeleri<sub><i> Sugar Feed</i></sub>',
        ),
   'moduleListSingular' => 
   array (
      'Home' => 'Ana Sayfa' ,
      'Dashboard' => 'Gösterge Panosu' ,
      'Contacts' => 'İlgili ' ,
      'Accounts' => 'Müşteri' ,
      'Opportunities' => 'Fırsat' ,
      'Cases' => 'Talep' ,
      'Notes' => 'Not' ,
      'Calls' => 'Tel.Araması' ,
      'Emails' => 'E-Posta' ,
      'Meetings' => 'Toplantı' ,
      'Tasks' => 'Görev' ,
      'Calendar' => 'Takvim' ,
      'Leads' => 'Potansiyel' ,

      'Activities' => 'Aktivite' ,
      'Bugs' => 'Kusur İzleme' ,
      'Feeds' => 'Bilgi Beslemesi' ,
      'iFrames' => 'Portalım' ,
      'TimePeriods' => 'Zaman Periyodu' ,
      'Project' => 'Projeler' ,
      'ProjectTask' => 'Proje Görevi' ,
      'Campaigns' => 'Kampanya' ,
      'Documents' => 'Döküman' ,
      'Sync' => 'Senkronizasyon' ,

      'Users' => 'Kullanıcı'   
        ),

   'checkbox_dom' => array (
      '' => '' ,
      '1' => 'Evet' ,
      '2' => 'Hayır',
  ),

     'account_type_dom' => 
  array (
      '' => '' ,
      'Analyst' => 'Analist' ,
      'Competitor' => 'Rakip' ,
      'Customer' => 'Müşteri' ,
      'Integrator' => 'Entegrator' ,
      'Investor' => 'Yatırımcı' ,
      'Partner' => 'İş Ortağı' ,
      'Press' => 'Basın' ,
      'Prospect' => 'Aday Müşteri' ,
      'Reseller' => 'Bayii' ,
      'Other' => 'Diğer'   
  ),
     'industry_dom' => 
  array (
      '' => '' ,
      'Apparel' => 'Giyim' ,
      'Banking' => 'Bankacılık' ,
      'Biotechnology' => 'Bioteknoloji' ,
      'Chemicals' => 'Kimya' ,
      'Communications' => 'İletişim' ,
      'Construction' => 'İnşaat' ,
      'Consulting' => 'Danışmanlık' ,
      'Education' => 'Eğitim' ,
      'Electronics' => 'Elektronik' ,
      'Energy' => 'Enerji' ,
      'Engineering' => 'Mühendislik' ,
      'Entertainment' => 'Eğlence' ,
      'Environmental' => 'Çevre' ,
      'Finance' => 'Finans' ,
      'Government' => 'Kamu' ,
      'Healthcare' => 'Sağlık' ,
      'Hospitality' => 'Hastane' ,
      'Insurance' => 'Sigorta' ,
      'Machinery' => 'Makina' ,
      'Manufacturing' => 'Üretim' ,
      'Media' => 'Medya' ,
      'Not For Profit' => 'Sivil Toplum Kuruluşu' ,
      'Recreation' => 'Rekreasyon' ,
      'Retail' => 'Toptancı' ,
      'Shipping' => 'Taşıma' ,
      'Technology' => 'Teknoloji' ,
      'Telecommunications' => 'Telekomünikasyon' ,
      'Transportation' => 'Taşıma' ,
      'Utilities' => 'Alt Yapı' ,
      'Other' => 'Diğer',
  ),
  
   'lead_source_dom' => 
  array (
      '' => '' ,
      'Cold Call' => 'Soğuk Arama' ,
      'Existing Customer' => 'Mevcut Müşteri' ,
      'Self Generated' => 'Kendi İnsiyatifiyle' ,
      'Employee' => 'Çalışan' ,
      'Partner' => 'iş Ortağı' ,
      'Public Relations' => 'Halkla İlişkiler' ,
      'Direct Mail' => 'Doğrudan Posta' ,
      'Conference' => 'Konferans' ,
      'Trade Show' => 'Ticari Etkinlik' ,
      'Web Site' => 'Web Sitesi' ,
      'Word of mouth' => 'Tavsiyeyle' ,
      'Email' => 'E-Posta' ,
      'Campaign' => 'Kampanya' ,
      'Other' => 'Diğer'   
  ),
   'opportunity_type_dom' => 
  array (
      '' => '' ,
      'Existing Business' => 'Mevcut Firma' ,
      'New Business' => 'Yeni Firma'   
  ),
   'roi_type_dom' => 
    array (
      'Revenue' => 'Ciro' ,
      'Investment' => 'Yatırım' ,
      'Expected_Revenue' => 'Beklenen Gelir' ,
      'Budget' => 'Bütçe'   

  ),
     
   'opportunity_relationship_type_dom' => 
  array (
      '' => '' ,
      'Primary Decision Maker' => 'Karar Verici' ,
      'Business Decision Maker' => 'Ticari Karar Verici' ,
      'Business Evaluator' => 'Ticari Değerlendirici' ,
      'Technical Decision Maker' => 'Teknik Karar Verici' ,
      'Technical Evaluator' => 'Teknik Değerlendirici' ,
      'Executive Sponsor' => 'Yönetici Sponsor' ,
      'Influencer' => 'Etkileyici' ,
      'Other' => 'Diğer'   
  ),
     
   'case_relationship_type_dom' => 
  array (
      '' => '' ,
      'Primary Contact' => 'Asıl İlgili ' ,
      'Alternate Contact' => 'Alternatif ilgili',   
  ),
   'payment_terms' => 
  array (
      '' => '' ,
      'Net 15' => 'Net 15' ,
      'Net 30' => 'Net 30'   
  ),
   
   'sales_stage_dom' => 
  array (
      'Prospecting' => 'Adaylık' ,
      'Qualification' => 'Eleme' ,
      'Needs Analysis' => 'Analiz İhtiyacı' ,
      'Value Proposition' => 'Teklif Değerleme' ,
      'Id. Decision Makers' => 'Id. Karar Vericiler' ,
      'Perception Analysis' => 'Analiz' ,
      'Proposal/Price Quote' => 'Teklif/Fiyat Teklifi' ,
      'Negotiation/Review' => 'Pazarlık/Gözden Geçirme' ,
      'Closed Won' => 'Kapandı-Başarılı' ,
      'Closed Lost' => 'Kapandı-Başarısız'   
  ),
  'in_total_group_stages' => array (
    'Draft' => 'Taslak',
    'Negotiation' => 'Pazarlık',
    'Delivered' => 'Teslim Edildi',
    'On Hold' => 'Durduruldu',
    'Confirmed' => 'Onaylandı',
    'Closed Accepted' => 'Kabul Edilerek Kapandı',
    'Closed Lost' => 'Kaybedilerek Kapandı',
    'Closed Dead' => 'Ölü Olarak Kapandı',
  ),
   'sales_probability_dom' =>   array (
      'Prospecting' => '10' ,
      'Qualification' => '20' ,
      'Needs Analysis' => '25' ,
      'Value Proposition' => '30' ,
      'Id. Decision Makers' => '40' ,
      'Perception Analysis' => '50' ,
      'Proposal/Price Quote' => '65' ,
      'Negotiation/Review' => '80' ,
      'Closed Won' => '100' ,
      'Closed Lost' => '0'   
  ),
   'activity_dom' => 
  array (
      'Call' => 'Tel.Araması' ,
      'Meeting' => 'Toplantı' ,
      'Task' => 'Görev' ,
      'Email' => 'E-Posta' ,
      'Note' => 'Not'   
  ),
   'salutation_dom' => 
      array (
      '' => '' ,
      'Mr.' => 'Bay' ,
      'Ms.' => 'Bayan' ,
      'Mrs.' => 'Bayan' ,
      'Dr.' => 'Dr.' ,
      'Prof.' => 'Prof.'   
   ),
   'reminder_max_time' => '3600' ,
   'reminder_time_options' => array ( '60' => '1 dk. önce' ,
      '300' => '5 dk. önce' ,
      '600' => '10 dk. önce' ,
      '900' => '15 dk. önce' ,
      '1800' => '30 dk. önce' ,
      '3600' => '1 saat önce'   
),

   
   'task_priority_dom' => 
  array (
      'High' => 'Yüksek' ,
      'Medium' => 'Orta' ,
      'Low' => 'Düşük'   
  ),
   
   'task_status_dom' => 
  array (
      'Not Started' => 'Başlamadı' ,
      'In Progress' => 'İşlemde' ,
      'Completed' => 'Tamamlandı' ,
      'Pending Input' => 'Cevap Bekleniyor' ,
      'Deferred' => 'Ertelendi',
  ),
   
   'meeting_status_dom' => 
  array (
      'Planned' => 'Planlandı' ,
      'Held' => 'Askıda' ,
      'Not Held' => 'Yapılmadı',
  ),
   
   'call_status_dom' => 
  array (
      'Planned' => 'Planlandı' ,
      'Held' => 'Askıda' ,
      'Not Held' => 'Yapılmadı',
  ),
   
   'call_direction_dom' => 
  array (
      'Inbound' => 'Gelen' ,
      'Outbound' => 'Giden',
  ),
   'lead_status_dom' => 
  array (
      '' => '' ,
      'New' => 'Yeni' ,
      'Assigned' => 'Atanmış' ,
      'In Process' => 'İşlemde' ,
      'Converted' => 'Dönüştü' ,
      'Recycled' => 'Geri Dönüşüm' ,
      'Dead' => 'Öldü',   
  ),
   'gender_list' => 
  array (
      'male' => 'Bay' ,
      'female' => 'Bayan',
  ),
     
   'case_status_dom' => 
  array (
      'New' => 'Yeni' ,
      'Assigned' => 'Atanmış' ,
      'Closed' => 'Kapandı' ,
      'Pending Input' => 'Cevap Bekleniyor' ,
      'Rejected' => 'Reddedildi' ,
      'Duplicate' => 'Aynı Kayıt Var',
  ),
   
   'case_priority_dom' => 
  array (
      'P1' => 'Yüksek' ,
     'P2' => 'Orta' ,
      'P3' => 'Düşük',   
   ),
   'user_status_dom' => 
   array (
      'Active' => 'Aktif' ,
      'Inactive' => 'Aktif Değil', 
  ),
   'employee_status_dom' => 
  array (
      'Active' => 'Aktif' ,
      'Terminated' => 'Sonlandırıldı' ,
      'Leave of Absence' => 'Yok'   
   ),
   'messenger_type_dom' => 
  array (
      '' => '' ,
      'MSN' => 'MSN' ,
      'Yahoo!' => 'Yahoo!' ,
      'AOL' => 'AOL'   
   ),

   'project_task_priority_options' => array (
      'High' => 'Yüksek' ,
      'Medium' => 'Orta' ,
      'Low' => 'Düşük',
    ),
   

   'project_task_status_options' => array (
      'Not Started' => 'Başlamadı' ,
      'In Progress' => 'İşlemde' ,
      'Completed' => 'Tamamlandı' ,
      'Pending Input' => 'Cevap Bekleniyor' ,
      'Deferred' => 'Ertelendi',
    ),
   'project_task_utilization_options' => array (
      '0' => 'boş' ,
      '25' => '25' ,
      '50' => '50' ,
      '75' => '75' ,
      '100' => '100',
    ),

   'project_status_dom' => array (
      'Draft' => 'Taslak' ,
      'In Review' => 'İncelemede' ,
      'Published' => 'Yayınlandı',
    ),
   

   'project_duration_units_dom' => array (
      'Days' => 'Gün' ,
      'Hours' => 'Saat',
    ),

   'project_priority_options' => array (
      'High' => 'Yüksek' ,
      'Medium' => 'Orta' ,
      'Low' => 'Düşük',
    ),
   

     
   'record_type_display' => 
  array (
      '' => '' ,
      'Accounts' => 'Müşteri' ,
      'Opportunities' => 'Fırsat' ,
      'Cases' => 'Talep' ,
      'Leads' => 'Potansiyel' ,
      'Contacts' => 'İlgililer' ,




      'Bugs' => 'Kusur' ,
      'Project' => 'Proje' ,



      'ProjectTask' => 'Proje Görevi' ,
      'Tasks' => 'Görev' ,
      'Prospects' => 'Aday Müşteri',
  ),

   'record_type_display_notes' => 
  array (

      'Accounts' => 'Müşteri' ,
      'Contacts' => 'İlgili' ,
      'Opportunities' => 'Fırsat' ,
      'Cases' => 'Talep' ,
      'Leads' => 'Potansiyel' ,






      'Bugs' => 'Kusur' ,
      'Emails' => 'E-Posta' ,
      'Project' => 'Proje' ,
      'ProjectTask' => 'Proje Görevi' ,
      'Meetings' => 'Toplantı' ,
      'Calls' => 'Tel.Araması'   
  ),

   'parent_type_display' => 
  array (

      'Accounts' => 'Müşteri' ,
      'Bugs' => 'Kusur İzleme' ,
      'Cases' => 'Talep' ,
      'Contacts' => 'İlgili ' ,
      'Leads' => 'Potansiyel' ,
      'Opportunities' => 'Fırsat' ,

      'Project' => 'Proje' ,
      'ProjectTask' => 'Proje Görevi' ,
      'Prospects' => 'Aday Müşteri' ,

      'Tasks' => 'Görev',

  ),
   'quote_type_dom' => 
  array (
      'Quotes' => 'Teklif' ,
      'Orders' => 'Sipariş',
  ),
   
   'quote_stage_dom' => 
  array (
      'Draft' => 'Taslak' ,
      'Negotiation' => 'Pazarlık' ,
      'Delivered' => 'Teslim Edildi' ,
      'On Hold' => 'Askıda' ,
      'Confirmed' => 'Onaylandı' ,
      'Closed Accepted' => 'Kabul Edilerek Kapandı' ,
      'Closed Lost' => 'Başarısızlıkla Kapandı' ,
      'Closed Dead' => 'Ölü Kapandı',
  ),
   
   'order_stage_dom' => 
  array (
      'Pending' => 'Askıda' ,
      'Confirmed' => 'Onaylandı' ,
      'On Hold' => 'Askıda' ,
      'Shipped' => 'Teslim edildi' ,
      'Cancelled' => 'İptal',
  ),

   
   'quote_relationship_type_dom' => 
  array (
      '' => '' ,
      'Primary Decision Maker' => 'Karar Verici' ,
      'Business Decision Maker' => 'Ticari Karar Verici' ,
      'Business Evaluator' => 'Ticari Değerlendirici' ,
      'Technical Decision Maker' => 'Teknik Karar Verici' ,
      'Technical Evaluator' => 'Teknik Değerlendirici' ,
      'Executive Sponsor' => 'Yönetici Sponsor' ,
      'Influencer' => 'Kararı Etkileyici' ,
      'Other' => 'Diğer',
  ),
   'layouts_dom' => 
  array (
      'Standard' => 'Teklif' ,
      'Invoice' => 'Fatura' ,
      'Terms' => 'Ödeme Tarihleri',
  ),

   
   'issue_priority_dom' => 
  array (
      'Urgent' => 'Acil' ,
      'High' => 'Yüksek' ,
      'Medium' => 'Orta' ,
      'Low' => 'Düşük',
  ),
   
   'issue_resolution_dom' => 
  array (
      '' => '' ,
      'Accepted' => 'Kabul' ,
      'Duplicate' => 'Aynı Kayıt Var' ,
      'Closed' => 'Kapandı' ,
      'Out of Date' => 'Tarihi Geçmiş' ,
      'Invalid' => 'Geçersiz',
  ),

   
   'issue_status_dom' => 
  array (
      'New' => 'Yeni' ,
      'Assigned' => 'Atanmış' ,
      'Closed' => 'Kapandı' ,
      'Pending' => 'Askıda' ,
      'Rejected' => 'Reddedildi',
  ),

   
   'bug_priority_dom' => 
  array (
      'Urgent' => 'Acil' ,
      'High' => 'Yüksek' ,
      'Medium' => 'Orta' ,
      'Low' => 'Düşük',
  ),
   
   'bug_resolution_dom' => 
  array (
      '' => '' ,
      'Accepted' => 'Kabul' ,
      'Duplicate' => 'Aynı Kayıt Var' ,
      'Fixed' => 'Sabit' ,
      'Out of Date' => 'Geçersiz' ,
      'Invalid' => 'Geçersiz' ,
      'Later' => 'Daha Sonra',
  ),
   
   'bug_status_dom' => 
  array (
      'New' => 'Yeni' ,
      'Assigned' => 'Atanmış' ,
      'Closed' => 'Kapandı' ,
      'Pending' => 'Askıda' ,
      'Rejected' => 'Reddedildi',
  ),
   
   'bug_type_dom' => 
  array (
      'Defect' => 'Kusurlı' ,
      'Feature' => 'Özellik',
  ),
   'case_type_dom' => 
  array (
      'Administration' => 'Yönetim' ,
      'Product' => 'Ürün' ,
      'User' => 'Kullanıcı',
  ),

  
   'source_dom' => 
  array (
      '' => '' ,
      'Internal' => 'Dahili' ,
      'Forum' => 'Forum' ,
      'Web' => 'Web' ,
      'InboundEmail' => 'E-Posta',
  ),

   
   'product_category_dom' => 
  array (
      '' => '' ,
      'Accounts' => 'Müşteriler' ,
      'Activities' => 'Aktiviteler' ,
      'Bug Tracker' => 'Kusur İzleme' ,
      'Calendar' => 'Takvim' ,
      'Calls' => 'Tel.Aramaları' ,
      'Campaigns' => 'Kampanyalar' ,
      'Cases' => 'Talepler' ,
      'Contacts' => 'İlgililer' ,
      'Currencies' => 'Para Birimleri' ,
      'Dashboard' => 'Gösterge Panosu' ,
      'Documents' => 'Dökümanlar' ,
      'Emails' => 'E-Postalar' ,
      'Feeds' => 'Beslemeler' ,
      'Forecasts' => 'Öngörüler' ,
      'Help' => 'Yardım' ,
      'Home' => 'Ana Sayfa' ,
      'Leads' => 'Talepler' ,
      'Meetings' => 'Toplantılar' ,
      'Notes' => 'Notlar' ,
      'Opportunities' => 'Fırsatlar' ,
      'Outlook Plugin' => 'Outlook Eki' ,
      'Product Catalog' => 'Ürün Kataloğu' ,
      'Products' => 'Ürünler' ,
      'Projects' => 'Projeler' ,
      'Quotes' => 'Teklifler' ,
      'Releases' => 'Yayımlar' ,
      'RSS' => 'Bilgi Beslemesi' ,
      'Studio' => 'Stüdyo' ,
      'Upgrade' => 'Versiyon Yükseltme' ,
      'Users' => 'Kullanıcılar',
  ),

  
   'campaign_status_dom' => 
  array (
      '' => '' ,
      'Planning' => 'Planlama' ,
      'Active' => 'Aktif' ,
      'Inactive' => 'Aktif Değil' ,
      'Complete' => 'Tamamlandı' ,
      'In Queue' => 'Kuyrukta' ,
      'Sending'=> 'Gönderiliyor'   
  ),
   'campaign_type_dom' => 
  array (
      '' => '' ,
      'Telesales' => 'Tele Satış' ,
      'Mail' => 'Posta' ,
      'Email' => 'E-Posta' ,
      'Print' => 'Yazdır' ,
      'Web' => 'Web' ,
      'Radio' => 'Radyo' ,
      'Television' => 'TV' ,
      'NewsLetter' => 'Haber Bülteni'   
        ),

   'newsletter_frequency_dom' => 
  array (
      '' => '' ,
      'Weekly' => 'Haftalık' ,
      'Monthly' => 'Aylık' ,
      'Quarterly' => 'Çeyrek' ,
      'Annually' => 'Yıllık',
),


   'notifymail_sendtype' => 
  array (


      'sendmail' => 'sendmail' ,


      'SMTP' => 'SMTP',   
  ),
   'dom_timezones' => array ('-12' => '(GMT - 12) Uluslararası Batı Tarih Çizgisi' ,
      '-11' => '(GMT - 11) Midway Adaları, Samoa' ,
      '-10' => '(GMT - 10) Havai Adaları' ,
      '-9' => '(GMT - 9) Alaska, ABD' ,
      '-8' => '(GMT - 8) San Fransisko, ABD' ,
      '-7' => '(GMT - 7) Phoenix, ABD' ,
      '-6' => '(GMT - 6) Saskatchewan, Kanada' ,
      '-5' => '(GMT - 5) New York, ABD' ,
      '-4' => '(GMT - 4) Santiago, Şili' ,
      '-3' => '(GMT - 3) Buenos Aires, Arjantin' ,
      '-2' => '(GMT - 2) Orta-Atlantik' ,
      '-1' => '(GMT - 1) Azores, Portekiz' ,
      '0' => '(GMT)' ,
      '1' => '(GMT + 1) Madrid, İspanya' ,
      '2' => '(GMT + 2) İstanbul, Türkiye' ,
      '3' => '(GMT + 3) Moskova, Rusya' ,
      '4' => '(GMT + 4) Kabil, Afganistan' ,
      '5' => '(GMT + 5) Yekaterinburg, Rusya' ,
      '6' => '(GMT + 6) Astana, Kazakistan' ,
      '7' => '(GMT + 7) Bangok, Tayland' ,
      '8' => '(GMT + 8) Perth, Avustralya' ,
      '9' => '(GMT + 9) Seul, Güney Kore' ,
      '10' => '(GMT + 10) Brisbane, Avustralya' ,
      '11' => '(GMT + 11) Solomon Adaları' ,
      '12' => '(GMT + 12) Auckland, Yeni Zelanda',
         ),
   'dom_cal_month_long' => array (
      '0' => '' ,
      '1' => 'Ocak' ,
      '2' => 'Şubat' ,
      '3' => 'Mart' ,
      '4' => 'Nisan' ,
      '5' => 'Mayıs' ,
      '6' => 'Haziran' ,
      '7' => 'Temmuz' ,
      '8' => 'Ağustos' ,
      '9' => 'Eylül' ,
      '10' => 'Ekim' ,
      '11' => 'Kasım' ,
      '12' => 'Aralık',
      ),
        'dom_cal_month_short'=>array(
                '0'=>"",
                '1'=>"Oca",
                '2'=>"Şub",
                '3'=>"Mar",
                '4'=>"Nis",
                '5'=>"May",
                '6'=>"Haz",
                '7'=>"Tem",
                '8'=>"Ağu",
                '9'=>"Eyl",
                '10'=>"Eki",
                '11'=>"Kas",
                '12'=>"Ara",
                ),
        'dom_cal_day_long'=>array(
                '0'=>"",
                '1'=>"Pazar",
                '2'=>"Pazartesi",
                '3'=>"Salı",
                '4'=>"Çarşamba",
                '5'=>"Perşembe",
                '6'=>"Cuma",
                '7'=>"Cumartesi",
                ),
        'dom_cal_day_short'=>array(
                '0'=>"",
                '1'=>"Paz",
                '2'=>"Pzt",
                '3'=>"Sal",
                '4'=>"Çar",
                '5'=>"Per",
                '6'=>"Cum",
                '7'=>"Cmt",
        ),
   'dom_meridiem_lowercase' => array (
      'am' => "öö" ,
      'pm' => "ös"   
        ),
   'dom_meridiem_uppercase' => array (
      'AM' => 'ÖÖ' ,
      'PM' => 'ÖS'   
        ),
   'dom_report_types' => array (
      'tabular' => 'Satırlar ve Sütunlar' ,
      'summary' => 'Toplam' ,
      'detailed_summary' => 'Detaylı Toplam',
                'Matrix' => 'Matriks',
   ),
   'dom_email_types' => array (
      'out' => 'Gönderildi' ,
      'archived' => 'Arşivlendi' ,
      'draft' => 'Taslak' ,
      'inbound' => 'Gelen' ,
      'campaign' => 'Kampanya',
  ),
   'dom_email_status' => array (
      'archived' => 'Arşivlendi' ,
      'closed' => 'Kapandı' ,
      'draft' => 'Tasarımda' ,
      'read' => 'Okundu' ,
      'replied' => 'Yanıtlandı' ,
      'sent' => 'Gönderildi' ,
      'send_error' => 'Gönderide hata' ,
      'unread' => 'Okunmadı',
   ),
   'dom_email_archived_status' => array (
      'archived' => 'Arşivlendi'   
   ),

   'dom_email_server_type' => array (      '' => '--boş--' ,
      'imap' => 'IMAP' ,
      'pop3' => 'POP3'   
),
   'dom_mailbox_type' => array (
                                     'pick' => 'Oluştur [herhangi]' ,
                                     'createcase'  => 'Talep Oluştur',
                                     'bounce' => 'Ulaşmayan E-Posta Yönetimi'   
    ),
   'dom_email_distribution' => array (      '' => '--boş--' ,
      'direct' => 'Doğrudan atama' ,
      'roundRobin' => 'Sırayla' ,
      'leastBusy' => 'En Az Meşgul'   
    ),
    'dom_email_distribution_for_auto_create'=> array('roundRobin'   => 'Sırayla',
                                                     'leastBusy'    => 'En Az Meşgul',
    ),
   'dom_email_errors' => array (1 => 'Kalemleri Direkt Atarken yalnızca bir kullanıcı seçiniz.' ,
      2 => 'Yalnızca İşaretlenmiş Kalepleri Direkt Olarak Atamalısınız.'   
    ),
   'dom_email_bool' => array (      'bool_true' => 'Evet' ,
      'bool_false' => 'Hayır'   
    ),
   'dom_int_bool' => array (      1 => 'Evet' ,
      0 => 'Hayır'   
    ),
   'dom_switch_bool' => array (      'on' => 'Evet' ,
      'off' => 'Hayır' ,
      '' => 'Hayır'   ),
   'dom_email_link_type' => array (      '' => 'Sistem Varsayılan Posta İstemcisi' ,
      'sugar' => 'SugarCRM Posta İstemcisi' ,
      'mailto' => 'Harici Posta İstemcisi'   ),

   'dom_email_editor_option' => array (      '' => 'Varsayılan E-Posta Format' ,
      'html' => 'HTML E-Posta' ,
      'plain' => 'Düz Metin E-Posta'   ),


   'schedulers_times_dom' => array (      'not run' => 'Önceki İşlem Zamanı, Çalışmadı' ,
      'ready' => 'Hazır' ,
      'in progress' => 'İşlemde' ,
      'failed' => 'Kusurlı' ,
      'completed' => 'Tamamlandı' ,
      'no curl' => 'Çalışmıyor: cURL mevcut değil',
),

   'scheduler_status_dom' => 
    array (
      'Active' => 'Aktif' ,
      'Inactive' => 'Aktif Değil',
      ),

   'scheduler_period_dom' => 
    array (
      'min' => 'Dakika' ,
      'hour' => 'Saat',
   ),

   'forecast_schedule_status_dom' => 
    array (
      'Active' => 'Aktif' ,
      'Inactive' => 'Aktif Değil',
   ),
   'forecast_type_dom' => 
    array (
      'Direct' => 'Doğrudan' ,
      'Rollup' => 'Arttırmak',
   ),

   'document_category_dom' => 
   array (
      '' => '' ,
      'Marketing' => 'Pazarlama' ,
      'Knowledege Base' => 'Bilgi Tabanı' ,
      'Sales' => 'Satış',
  ),

   'document_subcategory_dom' => 
   array (
      '' => '' ,
      'Marketing Collateral' => 'Pazarlama Dökümanı' ,
      'Product Brochures' => 'Ürün Broşürleri' ,
      'FAQ' => 'SSS',
  ),

   'document_status_dom' => 
   array (
      'Active' => 'Aktif' ,
      'Draft' => 'Taslak' ,
      'FAQ' => 'SSS' ,
      'Expired' => 'Süresi Geçmiş' ,
      'Under Review' => 'İncelemede' ,
      'Pending' => 'Askıda',
  ),
   'document_template_type_dom' => 
  array (
      '' => '' ,
      'mailmerge' => 'Posta Birleştir' ,
      'eula' => 'EULA' ,
      'nda' => 'NDA' ,
      'license' => 'Lisans Sözleşmesi',
  ),
   'dom_meeting_accept_options' => 
   array (
      'accept' => 'Kabul' ,
      'decline' => 'Reddedildi' ,
      'tentative' => 'Kesin Değil',
  ),
   'dom_meeting_accept_status' => 
  array (
      'accept' => 'Kabul' ,
      'decline' => 'Reddedildi' ,
      'tentative' => 'Kesin Değil' ,
      'none' => 'boş',
  ),





















































































































































































































































































































































































































   'duration_intervals' => array (      '0' => '00' ,
      '15' => '15' ,
      '30' => '30' ,
      '45' => '45'   ),




   'prospect_list_type_dom' => 
  array (
      'default' => 'Varsayılan' ,
      'seed' => 'Kampanyayı Onaylayacaklar' ,
      'exempt_domain' => 'Engelleme Listesi- Domain Adına Göre' ,
      'exempt_address' => 'Engelleme List - E-Posta Adresine Göre' ,
      'exempt' => 'Engelleme Listesi - Id Göre' ,
      'test' => 'Test',
  ),

   'email_marketing_status_dom' => 
   array (
      '' => '' ,
      'active' => 'Aktif' ,
      'inactive' => 'Aktif Değil',
  ),

   'campainglog_activity_type_dom' => 
  array (
      '' => '' ,
      'targeted' => 'Mesaj Gönderildi/Denendi' ,
      'send error' => 'Geri Gelen Mesajlar,Diğerleri' ,
      'invalid email' => 'Geri Gelen Mesajlar,Geçersiz E-Posta' ,
      'link' => 'Tıklanma Linki' ,
      'viewed' => 'Görüntülenmiş Mesaj' ,
      'removed' => 'Liste Dışına Çıktı' ,
      'lead' => 'Talepler Oluşturuldu' ,
      'contact' => 'İlgililer Oluşturuldu' ,
      'blocked' => 'Adres veya Domain Adı Nedeniyle Engellendi',
  ),

   'campainglog_target_type_dom' => 
  array (
      'Contacts' => 'İlgililer' ,
      'Users' => 'Kullanıcılar' ,
      'Prospects' => 'Hedefler' ,
      'Leads' => 'Potansiyeller',
      'Accounts'=>'Müşteriler',
),

   'merge_operators_dom' => array (
      'like' => 'İçeriyor' ,
      'exact' => 'Tam' ,
      'start' => 'Başlangıç'   
  ),

  'custom_fields_importable_dom' => array (
    'true'=>'Evet',
    'false'=>'Hayır',
    'required'=>'Zorunlu',
  ),

   'custom_fields_merge_dup_dom' => array (
      0 => 'Aktif Değil' ,
      1 => 'Aktif',





  ),

   'navigation_paradigms' => array (
      'm' => 'Modüller' ,
      'gm' => 'Gruplanmış Modüller'   
  ),





































   'projects_priority_options' => array (
      'high' => 'Yüksek' ,
      'medium' => 'Orta' ,
      'low' => 'Düşük',
    ),

   'projects_status_options' => array (
      'notstarted' => 'Başlamadı' ,
      'inprogress' => 'İşlemde' ,
      'completed' => 'Tamamlandı',
    ),

       'chart_strings' => array (
      'expandlegend' => 'Açıklamaları Aç' ,
      'collapselegend' => 'Açıklamaları Kapat' ,
      'clickfordrilldown' => 'Detaylar İçin Tıkla' ,
      'drilldownoptions' => 'Detaylar İçin Seçenekler' ,
      'detailview' => 'Detay Görüntüleme...' ,
      'piechart' => 'Dairesel Grafik' ,
      'groupchart' => 'Grup Grafik' ,
      'stackedchart' => 'Üst Üste Grafik' ,
        'barchart'			=> 'Bar Grafik',
      'horizontalbarchart' => 'Yatay Grafik' ,
      'linechart' => 'Çizgi Grafik' ,
      'noData' => 'Veri Mevcut Değil' ,
        'print'				=> 'Baskı',
        'pieWedgeName'      => 'bölümler',  
),










































































































    'release_status_dom' =>
    array (
        'Active' => 'Aktif',
        'Inactive' => 'Aktif Değil',
    ),
    'email_settings_for_ssl' =>
    array (
        '0' => '',
        '1' => 'SSL',
        '2' => 'TLS',
    ),
);

$app_strings = array ( 
    'LBL_SORT'                              => 'Sırala',
   'LBL_OUTBOUND_EMAIL_ADD_SERVER' => 'Sunucu Ekle...' ,
	'LBL_EMAIL_SMTP_SSL_OR_TLS'					=> 'SSL veya TLS üzerinden SMTP Aktifle',

   'LBL_ROUTING_ADD_RULE' => 'Kural Ekle' ,
   'LBL_ROUTING_ALL' => 'En Azından' ,
   'LBL_ROUTING_ANY' => 'Herhangi Biri' ,
   'LBL_ROUTING_BREAK' => '-' ,
   'LBL_ROUTING_BUTTON_CANCEL' => 'Vazgeç' ,
   'LBL_ROUTING_BUTTON_SAVE' => 'Kuralı Kaydet' ,

   'LBL_ROUTING_ACTIONS_COPY_MAIL' => 'Posta Kopyala' ,
   'LBL_ROUTING_ACTIONS_DELETE_BEAN' => 'Sugar Objesi Sil' ,
   'LBL_ROUTING_ACTIONS_DELETE_FILE' => 'Dosya Sil' ,
   'LBL_ROUTING_ACTIONS_DELETE_MAIL' => 'E-Posta Sil' ,
   'LBL_ROUTING_ACTIONS_FORWARD' => 'E-Posta İlet' ,
   'LBL_ROUTING_ACTIONS_MARK_FLAGGED' => 'E-Posta İşaretle' ,
   'LBL_ROUTING_ACTIONS_MARK_READ' => 'Okunmuş Olarak İşaretle' ,
   'LBL_ROUTING_ACTIONS_MARK_UNREAD' => 'Okunmamış Olarak İşaretle' ,
   'LBL_ROUTING_ACTIONS_MOVE_MAIL' => 'E-Posta Taşı' ,
   'LBL_ROUTING_ACTIONS_PEFORM' => 'Aşağıdaki aksiyonları yerine getirin' ,
   'LBL_ROUTING_ACTIONS_REPLY' => 'E-Postayı Yanıtla' ,

   'LBL_ROUTING_CHECK_RULE' => 'Bir hata tespit edildi.' ,
   'LBL_ROUTING_CHECK_RULE_DESC' => 'Lütfen işaretli alanları kontrol edin.' ,
   'LBL_ROUTING_CONFIRM_DELETE' => 'Bu kuralı silmek istediğinizden emin misiniz?' ,

   'LBL_ROUTING_FLAGGED' => 'işaret koy' ,
   'LBL_ROUTING_FORM_DESC' => 'Kaydedilmiş Kurallar hemen aktif hale geçer.' ,
   'LBL_ROUTING_FW' => 'İlet: ' ,
   'LBL_ROUTING_LIST_TITLE' => 'Kurallar' ,
   'LBL_ROUTING_MATCH' => 'Eğer' ,
   'LBL_ROUTING_MATCH_2' => 'ait aşağıdaki kurallar gerçekleşti:' ,

   'LBL_ROUTING_MATCH_CC_ADDR' => 'Bilgi' ,
   'LBL_ROUTING_MATCH_DESCRIPTION' => 'Metin İçeriği' ,
   'LBL_ROUTING_MATCH_FROM_ADDR' => 'Gönderen' ,
   'LBL_ROUTING_MATCH_NAME' => 'Konu' ,
   'LBL_ROUTING_MATCH_PRIORITY_HIGH' => 'Yüksek Öncelikli' ,
   'LBL_ROUTING_MATCH_PRIORITY_NORMAL' => 'Normal Öncelikli' ,
   'LBL_ROUTING_MATCH_PRIORITY_LOW' => 'Az Öncelikli' ,
   'LBL_ROUTING_MATCH_TO_ADDR' => 'Kime' ,
   'LBL_ROUTING_MATCH_TYPE_MATCH' => 'İçeren' ,
   'LBL_ROUTING_MATCH_TYPE_NOT_MATCH' => 'İçermeyen' ,

   'LBL_ROUTING_NAME' => 'Kural Adı' ,
   'LBL_ROUTING_NEW_NAME' => 'Yeni Kural' ,
   'LBL_ROUTING_ONE_MOMENT' => 'Bir dakika lütfen...' ,
   'LBL_ROUTING_ORIGINAL_MESSAGE_FOLLOWS' => 'Ardından orjinal mesaj.' ,
   'LBL_ROUTING_RE' => 'CVP: ' ,
   'LBL_ROUTING_SAVING_RULE' => 'Kural Kaydediliyor' ,
   'LBL_ROUTING_SUB_DESC' => 'İşaretlenmiş kurallar etkindir.Düzenlemek için adına tıklayınız.' ,
   'LBL_ROUTING_TO' => 'Kime' ,
   'LBL_ROUTING_TO_ADDRESS' => 'Kime adresi' ,
   'LBL_ROUTING_WITH_TEMPLATE' => 'Şablon ile' ,

   'NTC_OVERWRITE_ADDRESS_PHONE_CONFIRM' => 'Telefon ve Adres alanları için formunuzda değer var. Seçmiş olduğunuz Müşteri kaydından telefon/adres bilgileriyle ezmek için, "OK" tuşuna basınız. Şu anki değerleri korumak için, "Cancel" tuşuna basınız.',
   'LBL_DROP_HERE' => '[Buraya Bırak]',
   'LBL_EMAIL_ACCOUNTS_EDIT' => 'Değiştir' ,
   'LBL_EMAIL_ACCOUNTS_GMAIL_DEFAULTS' => 'Gmail Varsayılanlarını Kullan' ,
   'LBL_EMAIL_ACCOUNTS_NAME' => 'İsim' ,
   'LBL_EMAIL_ACCOUNTS_OUTBOUND' => 'Giden Posta Sunucusu' ,
   'LBL_EMAIL_ACCOUNTS_SENDTYPE' => 'Posta transfer Uygulaması' ,
   'LBL_EMAIL_ACCOUNTS_SMTPAUTH_REQ' => 'SMTP Otorizasyonu Kullan?' ,
   'LBL_EMAIL_ACCOUNTS_SMTPPASS' => 'SMTP Şifresi' ,
   'LBL_EMAIL_ACCOUNTS_SMTPPORT' => 'SMTP Portu' ,
   'LBL_EMAIL_ACCOUNTS_SMTPSERVER' => 'SMTP Sunucusu' ,
   'LBL_EMAIL_ACCOUNTS_SMTPSSL' => 'Bağlanırken SSL kullan' ,
   'LBL_EMAIL_ACCOUNTS_SMTPUSER' => 'SMTP Kullanıcı Adı' ,
   'LBL_EMAIL_ACCOUNTS_TITLE' => 'Posta Hesabı Yönetimi' ,
    'LBL_EMAIL_POP3_REMOVE_MESSAGE'			=> 'Posta Sunucusu Protokolü POP3 bir sonraki versiyonda desteklenmeyecek. Yalnızca IMAP desteklenecek.',

   'LBL_EMAIL_ADD' => 'Adres Ekle' ,

   'LBL_EMAIL_ADDRESS_BOOK_ADD' => 'Ekle' ,
   'LBL_EMAIL_ADDRESS_BOOK_ADD_LIST' => 'Yeni Liste' ,
   'LBL_EMAIL_ADDRESS_BOOK_EMAIL_ADDR' => 'E-Posta Adresi' ,
   'LBL_EMAIL_ADDRESS_BOOK_ERR_NOT_CONTACT' => 'Yalnızca İlgili değişikliği şu anda desteklenmektedir.' ,
   'LBL_EMAIL_ADDRESS_BOOK_FILTER' => 'Süzgeç' ,
   'LBL_EMAIL_ADDRESS_BOOK_FIRST_NAME' => 'Adı' ,
   'LBL_EMAIL_ADDRESS_BOOK_LAST_NAME' => 'Soyadı' ,
   'LBL_EMAIL_ADDRESS_BOOK_MY_CONTACTS' => 'İlgililerim' ,
   'LBL_EMAIL_ADDRESS_BOOK_MY_LISTS' => 'Posta Listelelerim' ,
   'LBL_EMAIL_ADDRESS_BOOK_NAME' => 'İsim' ,
   'LBL_EMAIL_ADDRESS_BOOK_NOT_FOUND' => 'Adres Bulunamadı' ,
   'LBL_EMAIL_ADDRESS_BOOK_SAVE_AND_ADD' => 'Kaydet ve Adres Defterine Ekle' ,
   'LBL_EMAIL_ADDRESS_BOOK_SEARCH' => 'Ara' ,
   'LBL_EMAIL_ADDRESS_BOOK_SELECT_TITLE' => 'Adres Defteri Girişlerini Seç' ,
   'LBL_EMAIL_ADDRESS_BOOK_TITLE' => 'Adres Defteri' ,
   'LBL_EMAIL_REPORTS_TITLE' => 'Raporlar' ,
    'LBL_EMAIL_ADDRESS_BOOK_TITLE_ICON'     => '<img src='.SugarThemeRegistry::current()->getImageURL('icon_email_addressbook.gif').' align=absmiddle border=0> Adres Defteri',
    'LBL_EMAIL_ADDRESS_BOOK_TITLE_ICON_SHORT'     => '<img width=14 height=14 src='.SugarThemeRegistry::current()->getImageURL('icon_email_addressbook.gif').' align=absmiddle border=0>',

   'LBL_EMAIL_ADDRESSES' => 'E-Posta' ,
   'LBL_EMAIL_ADDRESS_PRIMARY' => 'E-Posta Adresi' ,
   'LBL_EMAIL_ADDRESSES_TITLE' => 'E-Posta Adresleri' ,
   'LBL_EMAIL_ARCHIVE_TO_SUGAR' => 'Sugar Uygulamasına Veri Yükle' ,
    'LBL_EMAIL_ASSIGNMENT'                  => 'Atama',
   'LBL_EMAIL_ATTACH_FILE_TO_EMAIL' => 'Ekle' ,
   'LBL_EMAIL_ATTACHMENT' => 'Ekle' ,
   'LBL_EMAIL_ATTACHMENTS' => 'Lokal Sistemden' ,
   'LBL_EMAIL_ATTACHMENTS2' => 'Sugar Dökümanlarından' ,
   'LBL_EMAIL_ATTACHMENTS3' => 'Şablon Ekleri' ,
    'LBL_EMAIL_ATTACHMENTS_FILE'            => 'Dosya',
    'LBL_EMAIL_ATTACHMENTS_DOCUMENT'        => 'Döküman',
    'LBL_EMAIL_ATTACHMENTS_EMBEDED'         => 'Gömülmüş',
   'LBL_EMAIL_BCC' => 'GizliBilgi' ,
   'LBL_EMAIL_CANCEL' => 'Vazgeç' ,
   'LBL_EMAIL_CC' => 'Bilgi' ,
   'LBL_EMAIL_CHARSET' => 'Karakter Seti' ,
   'LBL_EMAIL_CHECK' => 'Posta Kontrol Et' ,
   'LBL_EMAIL_CHECKING_NEW' => 'Yeni E-Postaları Kontrol Ediyor' ,
   'LBL_EMAIL_CHECKING_DESC' => 'Yeni E-Postaları Kontrol Ediyor. <br><br>Posta hesabı için ilk kontol ise biraz daha zaman alabilir.' ,
   'LBL_EMAIL_CLOSE' => 'Kapat' ,
   'LBL_EMAIL_COFFEE_BREAK' => 'Yeni E-Postaları Kontrol Ediyor. <br><br>Büyük posta hesapların işlenmesi uzun zaman alabilir. ' ,
   'LBL_EMAIL_COMMON' => 'Ortak' ,

   'LBL_EMAIL_COMPOSE' => 'E-Posta' ,
   'LBL_EMAIL_COMPOSE_ERR_NO_RECIPIENTS' => 'Lütfen bu e-posta için alıcı(ları) girin' ,
   'LBL_EMAIL_COMPOSE_LINK_TO' => 'İlişkili olarak' ,
   'LBL_EMAIL_COMPOSE_NO_BODY' => 'Mesaj içeriği boş.  Yine de gönderilsin mi?' ,
   'LBL_EMAIL_COMPOSE_NO_SUBJECT' => 'Bu e-posta konu satırı içermiyor. Yine de gönderilsin mi?' ,
   'LBL_EMAIL_COMPOSE_NO_SUBJECT_LITERAL' => '(konu yok)' ,
   'LBL_EMAIL_COMPOSE_READ' => 'Oku & Yeni E-Posta Oluştur' ,
   'LBL_EMAIL_COMPOSE_SEND_FROM' => 'Posta Hesabından Gönder' ,
   'LBL_EMAIL_COMPOSE_OPTIONS' => 'Seçenekler' ,
   'LBL_EMAIL_COMPOSE_INVALID_ADDRESS' => 'Kime, Bilgi ve GizliBilgi alanları için geçerli e-posta adresi giriniz' ,

   'LBL_EMAIL_CONFIRM_CLOSE' => 'Bu e-postayı dikkate alma?' ,
   'LBL_EMAIL_CONFIRM_DELETE' => 'Adres defterinizden bu girişler kaldırılsın mı?' ,
    'LBL_EMAIL_CONFIRM_DELETE_SIGNATURE'    => 'Bu imzayı silmeye emin misiniz?',

   'LBL_EMAIL_CREATE_NEW' => '--Kayıt Sırasında Oluştur--' ,

    'LBL_EMAIL_DATE_SENT_BY_SENDER'         => 'Gönderen Tarafından Gönderim Tarihi',
   'LBL_EMAIL_DATE_RECEIVED' => 'Geliş Tarihi' ,
   'LBL_EMAIL_ASSIGNED_TO_USER' => 'Kullanıcıya Atandı' ,
   'LBL_EMAIL_DATE_TODAY' => 'Bugün' ,
   'LBL_EMAIL_DATE_YESTERDAY' => 'Dün' ,
   'LBL_EMAIL_DD_TEXT' => 'E-Posta(lar) seçildi.' ,
   'LBL_EMAIL_DEFAULTS' => 'Varsayılanlar' ,
   'LBL_EMAIL_DELETE' => 'Sil' ,
   'LBL_EMAIL_DELETE_CONFIRM' => 'Seçili mesajlar silinsin mi?' ,
   'LBL_EMAIL_DELETE_SUCCESS' => 'E-Posta başarı ile silindi.' ,
   'LBL_EMAIL_DELETING_MESSAGE' => 'Mesajlar siliniyor' ,
   'LBL_EMAIL_DETAILS' => 'Detaylar' ,
   'LBL_EMAIL_DISPLAY_MSG' => 'E-Posta(ları) gösteriyor. Toplam {2} adetin {0} - {1} aralığı' ,
    'LBL_EMAIL_ADDR_DISPLAY_MSG'            => 'E-Posta adresini(lerini) gösteriyor. Toplam {2} adetin {0} - {1} aralığı',

   'LBL_EMAIL_EDIT_CONTACT' => 'İlgili Değiştir' ,
   'LBL_EMAIL_EDIT_CONTACT_WARN' => 'İlgililer ile çalışırken sadece Asıl Adres kullanılır.' ,
   'LBL_EMAIL_EDIT_MAILING_LIST' => 'Posta Listesi Değiştir' ,

   'LBL_EMAIL_EMPTYING_TRASH' => 'Çöp Kutusu Boşaltılıyor' ,
    'LBL_EMAIL_DELETING_OUTBOUND'           => 'Gönderim İçin Kullanılan Sunucu Siliniyor',
    'LBL_EMAIL_CLEARING_CACHE_FILES'        => 'Ön Bellek Dosyaları Temizleniyor',
   'LBL_EMAIL_EMPTY_MSG' => 'Gösterilecek e-posta yok.' ,
    'LBL_EMAIL_EMPTY_ADDR_MSG'              => 'Gösterilecek e-posta adresleri yok.',

   'LBL_EMAIL_ERROR_ADD_GROUP_FOLDER' => 'Dizin adı tekil olmalıdır ve boşluk olamaz. Lütfen tekrar deneyin.' ,
    'LBL_EMAIL_ERROR_DELETE_GROUP_FOLDER'   => 'Dizin silinemiyor. Dizin veya alt dizini ilişkilendirilmiş bir posta kutusuna sahip.',
    'LBL_EMAIL_ERROR_CANNOT_FIND_NODE'      => 'Amaçlanan dizini içerikten bulamadı.  Tekrar deneyin.',
   'LBL_EMAIL_ERROR_CHECK_IE_SETTINGS' => 'Lütfen ayarlarınızı kontrol edin.' ,
   'LBL_EMAIL_ERROR_CONTACT_NAME' => 'Soyadı girdiğinizden emin olun.' ,
   'LBL_EMAIL_ERROR_DESC' => 'Tespit edilen Kusurlar:' ,
    'LBL_EMAIL_DELETE_ERROR_DESC'           => 'Bu bölüme ulaşma hakkınız yok. Ulaşım hakkı için Sistem Yöneticiniz ile temasa geçiniz.',
    'LBL_EMAIL_ERROR_DUPE_FOLDER_NAME'      => 'Sugar Folder isimleri tekil olmalıdır.',
   'LBL_EMAIL_ERROR_EMPTY' => 'Lütfen arama kriteri giriniz.' ,
   'LBL_EMAIL_ERROR_GENERAL_TITLE' => 'Bir hata oluştu' ,
   'LBL_EMAIL_ERROR_LIST_NAME' => 'Bu isimli e-posta listesi zaten mevcut' ,
   'LBL_EMAIL_ERROR_MESSAGE_DELETED' => 'Mesaj Sunucudan Silindi' ,
    'LBL_EMAIL_ERROR_IMAP_MESSAGE_DELETED'  => 'Mesaj Sunucudan Silindi veya başka bir dizine taşındı',
    'LBL_EMAIL_ERROR_MAILSERVERCONNECTION'  => 'Posta Sunucusuna bağlantı hata aldı. Lütfen Sistem Yöneticisi ile görüşünüz.',
   'LBL_EMAIL_ERROR_MOVE' => 'E-Posta, sunucular arasında taşınıyor ve/veya posta hesabı şu anda desteklenmiyor.' ,
   'LBL_EMAIL_ERROR_MOVE_TITLE' => 'Taşıma hatası' ,
   'LBL_EMAIL_ERROR_NAME' => 'Bir isim gerekli' ,
   'LBL_EMAIL_ERROR_FROM_ADDRESS' => 'Gönderen Adres zorunlu.' ,
   'LBL_EMAIL_ERROR_NO_FILE' => 'Lütfen bir dosya sağlayın.' ,
    'LBL_EMAIL_ERROR_NO_IMAP_FOLDER_RENAME' => 'IMAP dizin isim değişikliği şu anda desteklenmiyor.',
   'LBL_EMAIL_ERROR_SERVER' => 'Bir Posta Sunucusu adresi gerekiyor.' ,
   'LBL_EMAIL_ERROR_SAVE_ACCOUNT' => 'Posta hesabı kaydedilmemiş olabilir.' ,
    'LBL_EMAIL_ERROR_TIMEOUT'               => 'Posta Sunucusu ile iletişim sırasında bir hata oluştu.',
    'LBL_EMAIL_ERROR_USER'                  => 'Bağlantı ismi gerekli.',
    'LBL_EMAIL_ERROR_PASSWORD'              => 'Şifre gerekli.',
    'LBL_EMAIL_ERROR_PORT'                  => 'Posta Sunucusu Portu gerekli.',
    'LBL_EMAIL_ERROR_PROTOCOL'              => 'Sunucu Protokolü gerekli.',
    'LBL_EMAIL_ERROR_MONITORED_FOLDER'      => 'İzlenen Dizin gerekli.',
    'LBL_EMAIL_ERROR_TRASH_FOLDER'          => 'Silinenler Dizini gerekli.',
    'LBL_EMAIL_ERROR_VIEW_RAW_SOURCE'       => 'Bu bilgi yok',

    'LBL_EMAIL_FOLDERS'                     => '<img src='.SugarThemeRegistry::current()->getImageURL('icon_email_folder.gif').' align=absmiddle border=0> Dizinler',
    'LBL_EMAIL_FOLDERS_SHORT'               => '<img width=14 height=14 src='.SugarThemeRegistry::current()->getImageURL('icon_email_folder.gif').' align=absmiddle border=0>',
    'LBL_EMAIL_FOLDERS_ACTIONS'             => 'Taşı',
   'LBL_EMAIL_FOLDERS_ADD' 		    => 'Ekle' ,
    'LBL_EMAIL_FOLDERS_ADD_DIALOG_TITLE'    => 'Yeni Dizin Ekle',
    'LBL_EMAIL_FOLDERS_RENAME_DIALOG_TITLE' => 'Dizin İsmini Değiştir',
    'LBL_EMAIL_FOLDERS_ADD_NEW_FOLDER'      => 'Sakla',
    'LBL_EMAIL_FOLDERS_ADD_THIS_TO'         => 'Bu dizini ekle:',
    'LBL_EMAIL_FOLDERS_CHANGE_HOME'         => 'Bu dizin değiştirilemez',
    'LBL_EMAIL_FOLDERS_DELETE_CONFIRM'      => 'Bu dizini silmek istediğinizden emin misiniz?\nBu işlem geri döndürülemez.\nDizin silme bütün alt dizilere de uygulanacak.',
    'LBL_EMAIL_FOLDERS_NEW_FOLDER'          => 'Yeni Dizin Adı',
    'LBL_EMAIL_FOLDERS_NO_VALID_NODE'       => 'Lütfen bu aksiyonu yerine getirmeden önce dizin seçiniz.',
    'LBL_EMAIL_FOLDERS_TITLE'               => 'Sugar Dizin Yönetimi',
   'LBL_EMAIL_FOLDERS_USING_GROUP_USER'     => 'Grup Kullanıyor' ,




   'LBL_EMAIL_FORWARD' => 'İlet' ,
   'LBL_EMAIL_DELIMITER' => '::;::' ,
    'LBL_EMAIL_DOWNLOAD_STATUS'             => 'Toplam [[total]] e-postanın [[count]] adedini İndirdi',
   'LBL_EMAIL_FOUND' => 'Bulundu' ,
   'LBL_EMAIL_FROM' => 'Gönderen' ,
   'LBL_EMAIL_GROUP' => 'grup' ,
   'LBL_EMAIL_UPPER_CASE_GROUP'            => 'Grup',
   'LBL_EMAIL_HOME_FOLDER' => 'Ana Sayfa' ,
   'LBL_EMAIL_HTML_RTF' => 'HTML Gönder' ,
   'LBL_EMAIL_IE_DELETE' => 'Posta Hesabı Siliniyor' ,
   'LBL_EMAIL_IE_DELETE_SIGNATURE'         => 'İmza siliniyor',
   'LBL_EMAIL_IE_DELETE_CONFIRM' => 'Bu posta hesabını silmek istediğinizden emin misiniz? ' ,
   'LBL_EMAIL_IE_DELETE_SUCCESSFUL' => 'Silme başarı ile gerçekleşti' ,
   'LBL_EMAIL_IE_SAVE' => 'Posta hesabı bilgisi kaydediliyor' ,
   'LBL_EMAIL_IMPORTING_EMAIL' => 'E-Posta içeri alınıyor' ,
   'LBL_EMAIL_IMPORT_EMAIL' => 'Sugar Uygulamasına Aktar' ,
   'LBL_EMAIL_IMPORT_SETTINGS'                => 'Ayaları Yükle',
   'LBL_EMAIL_INVALID' => 'Geçersiz' ,





   'LBL_EMAIL_LOADING' => 'Yükleniyor...' ,
   'LBL_EMAIL_MARK' => 'İşaretle' ,
   'LBL_EMAIL_MARK_FLAGGED' => 'İşaretlendi' ,
   'LBL_EMAIL_MARK_READ' => 'Okundu' ,
   'LBL_EMAIL_MARK_UNFLAGGED' => 'İşaretlenmedi' ,
   'LBL_EMAIL_MARK_UNREAD' => 'Okunmadı' ,
   'LBL_EMAIL_ASSIGN_TO' => 'Atandı' ,

   'LBL_EMAIL_MENU_ADD_FOLDER' => 'Dizin oluştur' ,
   'LBL_EMAIL_MENU_COMPOSE' => 'Oluştur' ,
   'LBL_EMAIL_MENU_DELETE_FOLDER' => 'Dizin Sil' ,
   'LBL_EMAIL_MENU_EDIT' => 'Değiştir' ,
   'LBL_EMAIL_MENU_EMPTY_TRASH' => 'Silinenleri Boşalt' ,
   'LBL_EMAIL_MENU_SYNCHRONIZE' => 'Senkronize' ,
    'LBL_EMAIL_MENU_CLEAR_CACHE'            => 'Ön Bellek dosyalarını temizle',
   'LBL_EMAIL_MENU_REMOVE' => 'Sil' ,
    'LBL_EMAIL_MENU_RENAME'                 => 'Yeniden Adlandır',
   'LBL_EMAIL_MENU_RENAME_FOLDER'          => 'Dizini Yeniden Adlandır',
    'LBL_EMAIL_MENU_RENAMING_FOLDER'        => 'Dizini Yeniden Adlandırıyor',
   'LBL_EMAIL_MENU_MAKE_SELECTION' => 'Bu işlemi tekrar etmeden önce lütfen bir seçim yapın.' ,

   'LBL_EMAIL_MENU_HELP_ADD_FOLDER' => 'Dizin oluştur (uzak veya Sugar sisteminde)' ,
   'LBL_EMAIL_MENU_HELP_ARCHIVE' => 'Bu e-posta(ları) SugarCRM sistemine arşivle' ,
   'LBL_EMAIL_MENU_HELP_COMPOSE_TO_LIST' => 'Seçili Posta Listelerine E-Posta Gönder' ,
   'LBL_EMAIL_MENU_HELP_CONTACT_COMPOSE' => 'Bu İlgiliye E-Posta Gönder' ,
   'LBL_EMAIL_MENU_HELP_CONTACT_REMOVE' => 'İlgiliyi Kaldır' ,
   'LBL_EMAIL_MENU_HELP_DELETE' => 'Bu E-Posta(ları) sil' ,
   'LBL_EMAIL_MENU_HELP_DELETE_FOLDER' => 'Bir Dizin Sil (uzak veya Sugar sisteminde)' ,
   'LBL_EMAIL_MENU_HELP_EDIT_CONTACT' => 'İlgili Değiştir' ,
   'LBL_EMAIL_MENU_HELP_EDIT_LIST' => 'Posta Listesi Değiştir' ,
    'LBL_EMAIL_MENU_HELP_EMPTY_TRASH'       => 'Bütün Posta Kutunuzdaki Silinmiş dizinlerini temizler',
   'LBL_EMAIL_MENU_HELP_MARK_FLAGGED' => 'E-Posta(ları) İşaretlenmiş olarak işaretle' ,
   'LBL_EMAIL_MENU_HELP_MARK_READ' => 'E-Posta(ları) Okunmuş olarak işaretle' ,
   'LBL_EMAIL_MENU_HELP_MARK_UNFLAGGED' => 'E-Posta(ları) İşaretlenmemiş olarak işaretle' ,
   'LBL_EMAIL_MENU_HELP_MARK_UNREAD' => 'E-Posta(ları) Okunmamış olarak işaretle' ,
   'LBL_EMAIL_MENU_HELP_REMOVE_LIST' => 'Posta Listelerini Siler' ,
    'LBL_EMAIL_MENU_HELP_RENAME_FOLDER'     => 'Bir Dizinin İsmini Değiştir (uzak veya Sugar sisteminde)',
   'LBL_EMAIL_MENU_HELP_REPLY' => 'Bu E-Postaları Yanıtlandır' ,
   'LBL_EMAIL_MENU_HELP_REPLY_ALL' => 'E-Postaların Tüm Alıcılarına Yanıt Gönder' ,

   'LBL_EMAIL_MESSAGES' => 'mesajlar' ,

   'LBL_EMAIL_ML_NAME' => 'Liste Adı' ,
   'LBL_EMAIL_ML_ADDRESSES_1' => 'Seçilmiş Liste Adresleri' ,
   'LBL_EMAIL_ML_ADDRESSES_2' => 'Mevcut Liste Adresleri' ,

   'LBL_EMAIL_MULTISELECT' => 'Birden fazla seçmek için <b>Ctrl-Tıkla</b><br />(Mac kullanıcıları <b>CMD-Tıkla</b> kullanın)' ,

   'LBL_EMAIL_NO' => 'Hayır' ,
    'LBL_EMAIL_NOT_SENT'                    => 'Sistem talebinizi yerine getiremiyor. Lütfen Sistem Yöneticisi ile irtibata geçiniz.',

   'LBL_EMAIL_OK' => 'Tamam' ,
   'LBL_EMAIL_ONE_MOMENT' => 'Bir dakika lütfen...' ,
   'LBL_EMAIL_OPEN_ALL' => 'Birden Fazla Mesaj Aç' ,
   'LBL_EMAIL_OPTIONS' => 'Seçenekler' ,
   'LBL_EMAIL_OPT_OUT' => 'Liste Dışı' ,
   'LBL_EMAIL_PAGE_AFTER' => '{0} adetin' ,
   'LBL_EMAIL_PAGE_BEFORE' => 'Sayfa' ,
   'LBL_EMAIL_PERFORMING_TASK' => 'Adımı Gerçekleştiriyor' ,
   'LBL_EMAIL_PRIMARY' => 'Asıl' ,
   'LBL_EMAIL_PRINT' => 'Yazdır' ,

   'LBL_EMAIL_QC_BUGS' => 'Kusur' ,
   'LBL_EMAIL_QC_CASES' => 'Talep' ,
   'LBL_EMAIL_QC_LEADS' => 'Potansiyel' ,
   'LBL_EMAIL_QC_CONTACTS' => 'İlgili' ,
   'LBL_EMAIL_QC_TASKS' => 'Görev' ,
   'LBL_EMAIL_QUICK_CREATE' => 'Hızlı Oluştur' ,

    'LBL_EMAIL_REBUILDING_FOLDERS'          => 'Dizinleri Tekrar Oluşturuyor',
   'LBL_EMAIL_RELATE_TO' => 'İlişkilendir' ,
    'LBL_EMAIL_VIEW_RELATIONSHIPS'          => 'İlişkileri İncele',
    'LBL_EMAIL_RECORD'          			=> 'E-Posta Kaydı',
   'LBL_EMAIL_REMOVE' => 'Sil' ,
   'LBL_EMAIL_REPLY' => 'Yanıtla' ,
   'LBL_EMAIL_REPLY_ALL' => 'Tümünü Yanıtla' ,
   'LBL_EMAIL_REPLY_TO' => 'Yanıt' ,
   'LBL_EMAIL_RETRIEVING_LIST' => 'E-Posta Listesi Getiriliyor' ,
   'LBL_EMAIL_RETRIEVING_MESSAGE' => 'Mesaj Getiriliyor' ,
    'LBL_EMAIL_RETRIEVING_RECORD'           => 'E-Posta Kaydını Getiriyor',
    'LBL_EMAIL_SELECT_ONE_RECORD'           => 'Lütfen yalnızca bir e-posta seçiniz',
   'LBL_EMAIL_RETURN_TO_VIEW' => 'Bir önceki modüle dönmek istiyor musunuz?' ,
   'LBL_EMAIL_REVERT' => 'Geri Al' ,
    'LBL_EMAIL_RELATE_EMAIL'                => 'E-Posta İlişkilendir',

   'LBL_EMAIL_RULES_TITLE' => 'Kural Yönetimi' ,

   'LBL_EMAIL_SAVE' => 'Kaydet' ,
   'LBL_EMAIL_SAVE_AND_REPLY' => 'Kaydet & Yanıtla' ,
   'LBL_EMAIL_SAVE_DRAFT' => 'Taslak Kaydet' ,

   'LBL_EMAIL_SEARCHING' => 'Arama Başlatıyor' ,
    'LBL_EMAIL_SEARCH'                      => '<img src='.SugarThemeRegistry::current()->getImageURL('Search.gif').' align=absmiddle border=0> Ara',
    'LBL_EMAIL_SEARCH_SHORT'                => '<img width=14 height=14 src='.SugarThemeRegistry::current()->getImageURL('Search.gif').' align=absmiddle border=0>',
   'LBL_EMAIL_SEARCH_ADVANCED' => 'Detaylı Arama' ,
   'LBL_EMAIL_SEARCH_DATE_FROM' => 'Başlangıç Tarihi' ,
   'LBL_EMAIL_SEARCH_DATE_UNTIL' => 'Bitiş Tarihi' ,
   'LBL_EMAIL_SEARCH_FULL_TEXT' => 'E-Posta İçi Metin' ,
   'LBL_EMAIL_SEARCH_NO_RESULTS' => 'Arama Kriterinizle Eşleşen Kayıt Bulunamadı.' ,
   'LBL_EMAIL_SEARCH_RESULTS_TITLE' => 'Arama Sonuçları' ,
   'LBL_EMAIL_SEARCH_TITLE' => 'Basit Arama' ,
   'LBL_EMAIL_SEARCH__FROM_ACCOUNTS' => 'E-Posta Hesabı Arama' ,

   'LBL_EMAIL_SELECT' => 'Seç' ,

   'LBL_EMAIL_SEND' => 'Gönder' ,
   'LBL_EMAIL_SENDING_EMAIL' => 'E-Posta Gönderiliyor' ,

   'LBL_EMAIL_SETTINGS' => 'Ayarlar' ,
   'LBL_EMAIL_SETTINGS_2_ROWS' => '2 Satır' ,
   'LBL_EMAIL_SETTINGS_3_COLS' => '3 Kolon' ,
   'LBL_EMAIL_SETTINGS_LAYOUT' => 'Sayfa Düzeni Stili' ,
   'LBL_EMAIL_SETTINGS_ACCOUNTS' => 'Posta Hesapları' ,
   'LBL_EMAIL_SETTINGS_ADD_ACCOUNT' => 'Formu Temizle' ,
   'LBL_EMAIL_SETTINGS_AUTO_IMPORT' => 'Görüntülemek İçin E-Posta Yükle' ,
   'LBL_EMAIL_SETTINGS_CHECK_INTERVAL' => 'Yeni E-Posta Kontrol Et' ,
   'LBL_EMAIL_SETTINGS_COMPOSE_INLINE' => 'Ön İzleme Panelini Kullan' ,
   'LBL_EMAIL_SETTINGS_COMPOSE_POPUP' => 'Açılır Pencere Kullan' ,
   'LBL_EMAIL_SETTINGS_DISPLAY_NUM' => 'Sayfa başına e-posta sayısı' ,
   'LBL_EMAIL_SETTINGS_EDIT_ACCOUNT' => 'Posta Hesabı Düzenle' ,
   'LBL_EMAIL_SETTINGS_FOLDERS' => 'Dizinler' ,
   'LBL_EMAIL_SETTINGS_FROM_ADDR' => 'Gönderen Adres' ,
   'LBL_EMAIL_SETTINGS_FROM_NAME' => 'Gönderen İsim' ,
   'LBL_EMAIL_SETTINGS_FULL_SCREEN' => 'Tam Ekran' ,
   'LBL_EMAIL_SETTINGS_FULL_SYNC' => 'Bütün Posta Hesaplarını Senkronize Et' ,
   'LBL_EMAIL_SETTINGS_FULL_SYNC_DESC' => 'Bu aksiyon posta hesaplarını ve içeriklerini senkronize edecek.' ,
   'LBL_EMAIL_SETTINGS_FULL_SYNC_WARN' => 'Tam Senkronizasyon İstiyor musunuz?\\nBüyük posta hesapları birkaç dakika alabilir.' ,
    'LBL_EMAIL_SUBSCRIPTION_FOLDER_HELP'    => 'Birden fazla dizin seçmek için Shift tuşuna veya Ctrl tuşuna basınız.',
   'LBL_EMAIL_SETTINGS_GENERAL' => 'Genel' ,
    'LBL_EMAIL_SETTINGS_GROUP_FOLDERS'      => 'Mevcut Grup Dizinleri',
   'LBL_EMAIL_SETTINGS_GROUP_FOLDERS_CREATE' => 'Grup Dizinleri Oluştur' ,
    'LBL_EMAIL_SETTINGS_GROUP_FOLDERS_Save' => 'Grup Dizinlerini Kaydediyor',
    'LBL_EMAIL_SETTINGS_RETRIEVING_GROUP'   => 'Grup Dizinini Getiriyor',

   'LBL_EMAIL_SETTINGS_GROUP_FOLDERS_EDIT' => 'Grup Dizini Düzenle' ,

   'LBL_EMAIL_SETTINGS_NAME' => 'İsim' ,
   'LBL_EMAIL_SETTINGS_REQUIRE_REFRESH' => 'Bu ayarların aktif hale gelmesi için sayfanın yeniden yüklenmesi gerekebilir.' ,
   'LBL_EMAIL_SETTINGS_RETRIEVING_ACCOUNT' => 'Posta Hesabını Getiriyor' ,
   'LBL_EMAIL_SETTINGS_RULES' => 'Kurallar' ,
   'LBL_EMAIL_SETTINGS_SAVED' => 'Ayarlar saklandı.\\n\\nYeni ayarların etkisini görmek için sayfayı yükleyiniz.' ,
   'LBL_EMAIL_SETTINGS_SAVE_OUTBOUND' => 'Gönderilen E-Postalara Kopyala' ,
   'LBL_EMAIL_SETTINGS_SEND_EMAIL_AS' => 'Düz Metin Olarak E-Posta Gönder' ,
   'LBL_EMAIL_SETTINGS_SHOW_IN_FOLDERS' => 'Aktif' ,
   'LBL_EMAIL_SETTINGS_SHOW_NUM_IN_LIST' => 'Sayfa Başına E-Posta Sayısı',
   'LBL_EMAIL_SETTINGS_TAB_POS' => 'Sekmeleri alt kısma yerleştir' ,
   'LBL_EMAIL_SETTINGS_TITLE_LAYOUT' => 'Sayfa Düzeni Ayarları' ,
   'LBL_EMAIL_SETTINGS_TITLE_PREFERENCES' => 'Tercihler' ,
   'LBL_EMAIL_SETTINGS_TOGGLE_ADV' => 'Gelişmiş Ayarları Göster' ,
    'LBL_EMAIL_SETTINGS_USER_FOLDERS'       => 'Mevcut Kullanıcı Dizinleri',

   'LBL_EMAIL_SHOW_READ' => 'Tümünü Göster' ,
   'LBL_EMAIL_SHOW_UNREAD_ONLY' => 'Sadece okunmamışları göster' ,
   'LBL_EMAIL_SIGNATURES' => 'İmzalar' ,
   'LBL_EMAIL_SIGNATURE_CREATE' => 'İmza Oluştur' ,
   'LBL_EMAIL_SIGNATURE_NAME' => 'İmza Adı' ,
   'LBL_EMAIL_SIGNATURE_TEXT' => 'İmza İçeriği' ,
    'LBL_EMAIL_SPACER_MAIL_SERVER'          => '[ Uzaktaki Dizinler ]',
    'LBL_EMAIL_SPACER_LOCAL_FOLDER'         => '[ Sugar Dizinleri ]',
   'LBL_EMAIL_SUBJECT' => 'Konu' ,
    'LBL_EMAIL_TO'                     		=> 'Kime',
   'LBL_EMAIL_SUCCESS' => 'Başarılı' ,
    'LBL_EMAIL_SUGAR_FOLDER'                => 'SugarDizini',



    'LBL_EMAIL_TEMPLATE_EDIT_PLAIN_TEXT'    => 'E-Posta Şablon içeriği boş',
   'LBL_EMAIL_TEMPLATES' => 'Şablonlar' ,
   'LBL_EMAIL_TEXT_FIRST' => 'İlk Sayfa' ,
   'LBL_EMAIL_TEXT_PREV' => 'Önceki Sayfa' ,
   'LBL_EMAIL_TEXT_NEXT' => 'Sonraki sayfa' ,
   'LBL_EMAIL_TEXT_LAST' => 'Son Sayfa' ,
   'LBL_EMAIL_TEXT_REFRESH' => 'Yenile' ,
   'LBL_EMAIL_TO' => 'Kime' ,
   'LBL_EMAIL_TOGGLE_LIST' => 'Listeyi Aç/Kapa' ,
   'LBL_EMAIL_VIEW' => 'Görünüm' ,
   'LBL_EMAIL_VIEWS' => 'Görünümler' ,
   'LBL_EMAIL_VIEW_HEADERS' => 'Başlıkları Göster' ,
   'LBL_EMAIL_VIEW_PRINTABLE' => 'Yazdırılabilir Hali' ,
   'LBL_EMAIL_VIEW_RAW' => 'İşlenmemiş E-Posta Göster' ,
   'LBL_EMAIL_VIEW_UNSUPPORTED' => 'POP3 ile kullanıldığında, bu özellik desteklenmez.' ,
    'LBL_DEFAULT_LINK_TEXT'                 => 'Varsayılan link metni.',
   'LBL_EMAIL_YES' => 'Evet' ,

   'LBL_EMAIL_CHECK_INTERVAL_DOM' => array (
      '-1' => 'El ile' ,
      '5' => 'Her 5 dak.' ,
      '15' => 'Her 15 dak.' ,
      '30' => 'Her 30 dak.' ,
      '60' => 'Her Saat Başı'  
 ),
   'LBL_EMAIL_SETTING_NUM_DOM' => array (
      '10' => '10' ,
      '20' => '20' ,
      '50' => '50'   
  ),

    'LBL_EMAIL_MESSAGE_NO'                  => 'Mesaj No',
    'LBL_EMAIL_IMPORT_SUCCESS'              => 'Veri Yükleme Başarılı',
    'LBL_EMAIL_IMPORT_FAIL'                 => 'Veri Yükleme Başarısız, mesaj zaten yüklenmiş veya sunucudan silinmiş olabilir',

   'LBL_LINK_NONE' => 'Boş' ,
   'LBL_LINK_ALL' => 'Tümü' ,
   'LBL_LINK_RECORDS' => 'Kayıtlar' ,
   'LBL_LINK_SELECT' => 'Seç' ,























   'ERR_CREATING_FIELDS' => 'Ek detay alanlarını doldururken hata: ' ,
   'ERR_CREATING_TABLE' => 'Tablo oluştururken hata:' ,
   'ERR_DECIMAL_SEP_EQ_THOUSANDS_SEP' => 'Ondalık ayıracı karakteri Binlik ayıracı ile aynı olamaz.\\n\\n  Lütfen değerleri değiştiriniz.' ,
   'ERR_DELETE_RECORD' => 'İlgiliyi silmek için bir kayıt nosu belirtmek zorunludur.' ,
   'ERR_EXPORT_DISABLED' => 'Veri Aktarma Etkisizleştirildi.' ,
   'ERR_EXPORT_TYPE' => 'Veri Yüklemede Kusur' ,
   'ERR_INVALID_AMOUNT' => 'Lütfen geçerli bir tutar girin.' ,
   'ERR_INVALID_DATE_FORMAT' => 'Tarih formatı bu şekilde olmak zorundadır:' ,
   'ERR_INVALID_DATE' => 'Lütfen geçerli bir tarih girin.' ,
   'ERR_INVALID_DAY' => 'Lütfen geçerli bir gün girin.' ,
   'ERR_INVALID_EMAIL_ADDRESS' => 'Geçersiz E-Posta ' ,
   'ERR_INVALID_FILE_REFERENCE' => 'Geçersiz Dosya Referansı' ,
   'ERR_INVALID_HOUR' => 'Lütfen geçerli bir saat girin.' ,
   'ERR_INVALID_MONTH' => 'Lütfen geçerli bir ay girin.' ,
   'ERR_INVALID_TIME' => 'Lütfen geçerli bir zaman girin.' ,
   'ERR_INVALID_YEAR' => 'Lütfen geçerli bir 4 basamaklı yıl girin.' ,
   'ERR_NEED_ACTIVE_SESSION' => 'İçeriğin aktarılabilmesi için aktif bir oturum gerekmektedir.' ,
   'ERR_NO_HEADER_ID' => 'Bu özellik bu temada geçersizdir. ' ,
   'ERR_NOT_ADMIN' => 'Sistem Yönetimi Fonksiyonlarına izin verilmemiş erişim.' ,
   'ERR_MISSING_REQUIRED_FIELDS' => 'Doldurulması zorunlu alan:' ,
    'ERR_INVALID_REQUIRED_FIELDS' => 'Zorunlu alanda geçersiz değer:',
    'ERR_INVALID_VALUE' => 'Geçersiz değer:',
   'ERR_NO_SUCH_FILE' => 'Dosya sistemde mevcut değil' ,
   'ERR_NO_SINGLE_QUOTE' => 'Tek tırnak işareti bu amaçla kullanılamaz: ' ,
   'ERR_NOTHING_SELECTED' => 'Lütfen başalamadan önce bir seçim yapınız.' ,
   'ERR_OPPORTUNITY_NAME_DUPE' => '%s isminde bir Fırsat zaten var.  Lütfen aşağıda farklı bir isim girin.' ,
   'ERR_OPPORTUNITY_NAME_MISSING' => 'Fırsat adı girilmemiş.  Lütfen aşağıda bir isim girin.' ,
   'ERR_POTENTIAL_SEGFAULT' => 'Potansiyel "Apache Segmentation Fault" hatası fark edildi.  Lütfen Sistem Yöneticisine problemi bildirin ve SugarCRM firmasına iletmesini isteyin.' ,
   'ERR_SELF_REPORTING' => 'Kullanıcısı kendi kendisine raporlayamaz' ,
   'ERR_SINGLE_QUOTE' => 'Bu alan için tek tırnak işaretinin kullanımı desteklememektedir.  Lütfen değeri değiştirin.' ,
   'ERR_SQS_NO_MATCH_FIELD' => 'Alan için eşleşme yok: ' ,
   'ERR_SQS_NO_MATCH' => 'Eşleşme yok' ,
   'ERR_ADDRESS_KEY_NOT_SPECIFIED' => 'Lütfen Meta-Data tanımı için displayParams parametresinde \'key\' endeksini belirtin' ,
    'ERR_EXISTING_PORTAL_USERNAME'=>'Kusur: Portal İsmi başka bir İlgiliye zaten atanmış.',
    'ERR_COMPATIBLE_PRECISION_VALUE' => 'Kesinlik değeri ile alan değeri uyumlu değil',

   'LBL_ACCOUNT' => 'Müşteri' ,
    'LBL_OLD_ACCOUNT_LINK'=>'Eski Müşteri',
   'LBL_ACCOUNTS' => 'Müşteriler' ,
    'LBL_ACTIVITIES_SUBPANEL_TITLE'=>'Aktiviteler',
   'LBL_ACCUMULATED_HISTORY_BUTTON_KEY' => 'H' ,
   'LBL_ACCUMULATED_HISTORY_BUTTON_LABEL' => 'Özet Göster' ,
   'LBL_ACCUMULATED_HISTORY_BUTTON_TITLE' => 'Özet Göster[Alt+H]' ,
   'LBL_ADD_BUTTON_KEY' => 'A' ,
   'LBL_ADD_BUTTON_TITLE' => 'Ekle [Alt+A]' ,
   'LBL_ADD_BUTTON' => 'Ekle' ,
   'LBL_ADD_DOCUMENT' => 'Belge Ekle' ,
   'LBL_REPLACE_BUTTON' => 'Yenisi İle Değiştir',
   'LBL_ADD_TO_PROSPECT_LIST_BUTTON_KEY' => 'L' ,
   'LBL_ADD_TO_PROSPECT_LIST_BUTTON_LABEL' => 'Hedef Listeye Ekle' ,
   'LBL_ADD_TO_PROSPECT_LIST_BUTTON_TITLE' => 'Hedef Listeye Ekle' ,
   'LBL_ADDITIONAL_DETAILS_CLOSE_TITLE' => 'Kapamak İçin Tıkla' ,
   'LBL_ADDITIONAL_DETAILS_CLOSE' => 'Kapat' ,
   'LBL_ADDITIONAL_DETAILS' => 'Ek Detaylar' ,
   'LBL_ADMIN' => 'Sistem Yönetimi' ,
   'LBL_ALT_HOT_KEY' => 'Alt+' ,
   'LBL_ARCHIVE' => 'Arşivle' ,
   'LBL_ASSIGNED_TO_USER' => 'Atanan Kullanıcı' ,
   'LBL_ASSIGNED_TO' => 'Atanan Kişi:' ,
   'LBL_BACK' => 'Geri' ,
   'LBL_BILL_TO_ACCOUNT' => 'Müşteriye Faturala' ,
   'LBL_BILL_TO_CONTACT' => 'İlgiliye Faturala' ,
   'LBL_BILLING_ADDRESS' => 'Fatura Adresi' ,




   'LBL_BROWSER_TITLE' => 'SugarCRM - Ticari Açık Kodlu CRM' ,

   'LBL_BUGS' => 'Kusurlar' ,
   'LBL_BY' => 'kullanıcı:' ,
   'LBL_CALLS' => 'Tel.Aramaları' ,
   'LBL_CALL' => 'Tel.Araması' ,
   'LBL_CAMPAIGNS_SEND_QUEUED' => 'Kuyruktaki Kampanya E-Postalarını Gönder' ,
   'LBL_CANCEL_BUTTON_KEY' => 'X' ,
   'LBL_CANCEL_BUTTON_LABEL' => 'İptal' ,
   'LBL_CANCEL_BUTTON_TITLE' => 'İptal[Alt+X]' ,
   'LBL_SUBMIT_BUTTON_LABEL' => 'Gönder' ,
   'LBL_CASE' => 'Talep' ,
   'LBL_CASES' => 'Talepler' ,
   'LBL_CHANGE_BUTTON_KEY' => 'G' ,
   'LBL_CHANGE_BUTTON_LABEL' => 'Değiştir' ,
   'LBL_CHANGE_BUTTON_TITLE' => 'Değiştir [Alt+G]' ,
   'LBL_CHARSET' => 'UTF-8' ,
   'LBL_CHECKALL' => 'Tümünü Seç' ,
   'LBL_CITY' => 'Şehir' ,
   'LBL_CLEAR_BUTTON_KEY' => 'C' ,
   'LBL_CLEAR_BUTTON_LABEL' => 'Temizle' ,
   'LBL_CLEAR_BUTTON_TITLE' => 'Temizle [Alt+C]' ,
   'LBL_CLEARALL' => 'Tümünü Temizle' ,
    'LBL_CLOSE_BUTTON_TITLE' =>'Kapat',
    'LBL_CLOSE_BUTTON_KEY'=>'Q',
   'LBL_CLOSE_WINDOW' => 'Pencereyi Kapat' ,
   'LBL_CLOSEALL_BUTTON_KEY' => 'Q' ,
   'LBL_CLOSEALL_BUTTON_LABEL' => 'Tümünü Kapat' ,
   'LBL_CLOSEALL_BUTTON_TITLE' => 'Tümünü Kapat[Alt+I]' ,
   'LBL_CLOSE_AND_CREATE_BUTTON_LABEL' => 'Kapat ve Yeni Oluştur' ,
   'LBL_CLOSE_AND_CREATE_BUTTON_TITLE' => 'Kapat ve Yeni Oluştur' ,
   'LBL_CLOSE_AND_CREATE_BUTTON_KEY' => 'C' ,
   'LBL_COMPOSE_EMAIL_BUTTON_KEY' => 'L' ,
   'LBL_COMPOSE_EMAIL_BUTTON_LABEL' => 'E-Posta Oluştur' ,
   'LBL_COMPOSE_EMAIL_BUTTON_TITLE' => 'E-Posta Oluştur [Alt+L]' ,
    'LBL_SEARCH_DROPDOWN_YES'=>'Evet',
    'LBL_SEARCH_DROPDOWN_NO'=>'Hayır',
   'LBL_CONTACT_LIST' => 'İlgililer Listesi' ,
   'LBL_CONTACT' => 'İlgili' ,
   'LBL_CONTACTS' => 'İlgililer' ,
    'LBL_CONTRACTS'=>'Kontratlar',
   'LBL_COUNTRY' => 'Ülke:' ,
   'LBL_CREATE_BUTTON_LABEL' => 'Oluştur' ,
   'LBL_CREATED_BY_USER' => 'Oluşturan Kullanıcı' ,
    'LBL_CREATED_USER'=>'Oluşturan Kullanıcı',
    'LBL_CREATED_ID' => 'Oluşturan Id',
   'LBL_CREATED' => 'Oluşturan:' ,
   'LBL_CURRENT_USER_FILTER' => 'Sadece bana ait olanlar:' ,
    'LBL_CURRENCY'=>'Para Birimi:',
    'LBL_DOCUMENTS'=>'Dökümanlar',
   'LBL_DATE_ENTERED' => 'Oluşturulma Tarihi:' ,
   'LBL_DATE_MODIFIED' => 'Değiştirilme Tarihi:' ,
   'LBL_DELETE_BUTTON_KEY' => 'D' ,
   'LBL_DELETE_BUTTON_LABEL' => 'Sil' ,
   'LBL_DELETE_BUTTON_TITLE' => 'Sil [Alt+D]' ,
   'LBL_DELETE_BUTTON' => 'Sil' ,
   'LBL_DELETE' => 'Sil' ,
   'LBL_DELETED' => 'Silindi' ,
   'LBL_DIRECT_REPORTS' => 'Doğrudan Raporlayanlar' ,
   'LBL_DONE_BUTTON_KEY' => 'X' ,
   'LBL_DONE_BUTTON_LABEL' => 'Tamam' ,
   'LBL_DONE_BUTTON_TITLE' => 'Tamam [Alt+X]' ,
   'LBL_DST_NEEDS_FIXIN' => 'The application requires a Daylight Saving Time fix to be applied.  Please go to the <a href=\"index.php?module=Administration&action=DstFix\">Repair</a> link in the Admin console and apply the Daylight Saving Time fix.' ,
   'LBL_DUPLICATE_BUTTON_KEY' => 'U' ,
   'LBL_DUPLICATE_BUTTON_LABEL' => 'Aynı Kayıttan Oluştur' ,
   'LBL_DUPLICATE_BUTTON_TITLE' => 'Aynı Kayıttan Oluştur [Alt+U]' ,
   'LBL_DUPLICATE_BUTTON' => 'Aynı Kayıttan Oluştur' ,
   'LBL_EDIT_BUTTON_KEY' => 'E' ,
   'LBL_EDIT_BUTTON_LABEL' => 'Değiştir' ,
   'LBL_EDIT_BUTTON_TITLE' => 'Değiştir [Alt+E]' ,
   'LBL_EDIT_BUTTON' => 'Değiştir' ,
    'LBL_EDIT_AS_NEW_BUTTON_LABEL' => 'Yeni olarak Değiştir',
    'LBL_EDIT_AS_NEW_BUTTON_TITLE' => 'Yeni olarak Değiştir',
    'LBL_VCARD' => 'vCard',
    'LBL_EMPTY_VCARD' => 'Lütfen bir vCard dosyası seçiniz',
    'LBL_IMPORT_VCARD' => 'vCard Verisini Yükle:',
    'LBL_IMPORT_VCARD_BUTTON_KEY' => 'I',
    'LBL_IMPORT_VCARD_BUTTON_LABEL' => 'vCard Verisini Yükle',
    'LBL_IMPORT_VCARD_BUTTON_TITLE' => 'vCard Verisini Yükle [Alt+I]',
   'LBL_VIEW_BUTTON_KEY' => 'V' ,
   'LBL_VIEW_BUTTON_LABEL' => 'Göster' ,
   'LBL_VIEW_BUTTON_TITLE' => 'Göster [Alt+V]' ,
   'LBL_VIEW_BUTTON' => 'Göster' ,
   'LBL_EMAIL_PDF_BUTTON_KEY' => 'M' ,
   'LBL_EMAIL_PDF_BUTTON_LABEL' => 'PDF olarak E-Postala' ,
   'LBL_EMAIL_PDF_BUTTON_TITLE' => 'PDF olarak E-Postala [Alt+M]' ,
   'LBL_EMAILS' => 'E-Postalar' ,
   'LBL_EMPLOYEES' => 'Çalışanlar' ,
   'LBL_ENTER_DATE' => 'Oluşturulma Tarihi' ,
   'LBL_EXPORT_ALL' => 'Tüm Veriyi Aktar' ,
   'LBL_EXPORT' => 'Veri Aktar' ,
   'LBL_GO_BUTTON_LABEL' => 'Git' ,
   'LBL_HIDE' => 'Gizle' ,
   'LBL_ID' => 'ID' ,
   'LBL_IMPORT_PROSPECTS' => 'Aday Müşteri Verilerini Yükle' ,
   'LBL_IMPORT' => 'Veri Yükle' ,
   'LBL_IMPORT_STARTED' => 'Veri Yükleme Başladı:' ,
   'LBL_MISSING_CUSTOM_DELIMITER' => 'Özel bir ayraç belirtilmesi gerekir.' ,
   'LBL_LAST_VIEWED' => 'Son Görüntülenenler' ,
    'LBL_TODAYS_ACTIVITIES' => 'Bugünün Aktiviteleri',
   'LBL_LEADS' => 'Talepler' ,
   'LBL_LESS' => 'daha az' ,
   'LBL_CAMPAIGN' => 'Kampanya:' ,
    'LBL_CAMPAIGNS' => 'Kampanyalar',
    'LBL_CAMPAIGNLOG' => 'KampanyaLogu',
    'LBL_CAMPAIGN_CONTACT'=>'Kampanyalar',
   'LBL_CAMPAIGN_ID' => 'Kampanya_id' ,
    'LBL_SITEMAP'=>'SiteHaritası',
    'LBL_THEME'=>'Tema:',
    'LBL_THEME_PICKER'=>'Sayfa Stili',
    'LBL_THEME_PICKER_IE6COMPAT_CHECK' => 'Warning: Internet Explorer 6 is not supported for the selected theme. Click OK to select it anyways or Cancel to select a different theme.',
    'LBL_FOUND_IN_RELEASE'=>'Bulunduğu Versiyon',
    'LBL_FIXED_IN_RELEASE'=>'Düzeltildiği Versiyon',
   'LBL_LIST_ACCOUNT_NAME' => 'Müşteri Adı' ,
   'LBL_LIST_ASSIGNED_USER' => 'Kullanıcı' ,
   'LBL_LIST_CONTACT_NAME' => 'İlgili Adı' ,
   'LBL_LIST_CONTACT_ROLE' => 'İlgili Rolü' ,
   'LBL_LIST_EMAIL' => 'E-Posta' ,
   'LBL_LIST_NAME' => 'İsim' ,
   'LBL_LIST_OF' => 'ait' ,
   'LBL_LIST_PHONE' => 'Telefon' ,
    'LBL_LIST_RELATED_TO' => 'İlgili Olarak',
   'LBL_LIST_USER_NAME' => 'Kullanıcı Adı' ,
   'LBL_LISTVIEW_MASS_UPDATE_CONFIRM' => 'Tüm listeyi güncellemek istediğinizden emin misiniz?' ,
   'LBL_LISTVIEW_NO_SELECTED' => 'Lütfen işlem için en azından bir kayıt seçin' ,
   'LBL_LISTVIEW_TWO_REQUIRED' => 'Lütfen işlem için en azından 2 kayıt seçin' ,
    'LBL_LISTVIEW_LESS_THAN_TEN_SELECT' => 'Lütfen devam etmek için 10 kayıttan daha az seçin.',
   'LBL_LISTVIEW_ALL' => 'Tümü' ,
   'LBL_LISTVIEW_NONE' => 'Boş' ,
   'LBL_LISTVIEW_OPTION_CURRENT' => 'Bu Sayfa' ,
   'LBL_LISTVIEW_OPTION_ENTIRE' => 'Tüm Kayıtlar' ,
   'LBL_LISTVIEW_OPTION_SELECTED' => 'Seçili Kayıtlar' ,
   'LBL_LISTVIEW_SELECTED_OBJECTS' => 'Seçilenler: ' ,

   'LBL_LOCALE_NAME_EXAMPLE_FIRST' => 'David' ,
   'LBL_LOCALE_NAME_EXAMPLE_LAST' => 'Livingstone' ,
   'LBL_LOCALE_NAME_EXAMPLE_SALUTATION' => 'Dr.' ,
   'LBL_LOCALE_NAME_EXAMPLE_TITLE' => 'Program Geliştirme Uzmanı' ,
    'LBL_LOGIN_TO_ACCESS' => 'Lütfen bu alana erişim için oturum açınız.',
   'LBL_LOGOUT' => 'Sistemden Çıkış' ,
   'LBL_MAILMERGE_KEY' => 'M' ,
   'LBL_MAILMERGE' => 'Posta Birleştir' ,
   'LBL_MASS_UPDATE' => 'Toplu Güncelleme' ,
    'LBL_OPT_OUT_FLAG_PRIMARY' => 'Asıl E-Postayı Listeden Çıkar',
   'LBL_MEETINGS' => 'Toplantılar' ,
   'LBL_MEETING' => 'Toplantı' ,
   'LBL_MEMBERS' => 'Üyeler' ,
    'LBL_MEMBER_OF'=>'Üyesi olduğu',
   'LBL_MODIFIED_BY_USER' => 'Değiştiren Kullanıcı' ,
    'LBL_MODIFIED_USER'=>'Değiştiren Kullanıcı',
   'LBL_MODIFIED' => 'Değiştiren' ,
    'LBL_MODIFIED_NAME'=>'Değiştiren Kişi',
    'LBL_MODIFIED_ID'=>'Değiştiren Id',
   'LBL_MORE' => 'daha fazla' ,
   'LBL_MY_ACCOUNT' => 'Hesabım' ,
   'LBL_NAME' => 'İsim' ,
   'LBL_NEW_BUTTON_KEY' => 'N' ,
   'LBL_NEW_BUTTON_LABEL' => 'Oluştur' ,
   'LBL_NEW_BUTTON_TITLE' => 'Oluştur [Alt+N]' ,
   'LBL_NEXT_BUTTON_LABEL' => 'Sonraki' ,
   'LBL_NONE' => '--boş--' ,
   'LBL_NOTES' => 'Notlar' ,
   'LBL_OPENALL_BUTTON_KEY' => 'O' ,
   'LBL_OPENALL_BUTTON_LABEL' => 'Tümünü Aç' ,
   'LBL_OPENALL_BUTTON_TITLE' => 'Tümünü Aç [Alt+O]' ,
   'LBL_OPENTO_BUTTON_KEY' => 'T' ,
   'LBL_OPENTO_BUTTON_LABEL' => 'Kişiye Aç: ' ,
   'LBL_OPENTO_BUTTON_TITLE' => 'Kişiye Aç: [Alt+T]' ,
   'LBL_OPPORTUNITIES' => 'Fırsatlar' ,
   'LBL_OPPORTUNITY_NAME' => 'Fırsat Adı' ,
   'LBL_OPPORTUNITY' => 'Fırsat' ,
   'LBL_OR' => 'VEYA' ,
    'LBL_LOWER_OR' => 'veya',
    'LBL_PARENT_TYPE' => 'Üst Kayıt Tipi',
   'LBL_PERCENTAGE_SYMBOL' => '%' ,
    'LBL_PHASE' => 'Faz',
   'LBL_POSTAL_CODE' => 'Posta Kodu:' ,
   'LBL_PRIMARY_ADDRESS_CITY' => 'Asıl Adresi Şehir:' ,
   'LBL_PRIMARY_ADDRESS_COUNTRY' => 'Asıl Adresi Ülke:' ,
   'LBL_PRIMARY_ADDRESS_POSTALCODE' => 'Asıl Adresi Posta Kodu:' ,
   'LBL_PRIMARY_ADDRESS_STATE' => 'Asıl Adresi Eyalet:' ,
   'LBL_PRIMARY_ADDRESS_STREET_2' => 'Asıl Adresi Sokak 2 :' ,
   'LBL_PRIMARY_ADDRESS_STREET_3' => 'Asıl Adresi Sokak 3' ,
   'LBL_PRIMARY_ADDRESS_STREET' => 'Asıl Adresi Sokak:' ,
   'LBL_PRIMARY_ADDRESS' => 'Asıl Adresi Adres:' ,
    'LBL_PRODUCT_BUNDLES'=>'Ürün Paketleri',
   'LBL_PRODUCT_BUNDLES' => 'Ürün Paketleri' ,
   'LBL_PRODUCTS' => 'Ürünler' ,
   'LBL_PROJECT_TASKS' => 'Proje Görevleri' ,
   'LBL_PROJECTS'=>'Projeler',
   'LBL_PROJECTS' => 'Projeler' ,
   'LBL_QUOTE_TO_OPPORTUNITY_KEY' => 'O' ,
   'LBL_QUOTE_TO_OPPORTUNITY_LABEL' => 'Tekliften Fırsat Oluştur' ,
   'LBL_QUOTE_TO_OPPORTUNITY_TITLE' => 'Tekliften Fırsat Oluştur [Alt+O]' ,
   'LBL_QUOTES_SHIP_TO' => 'Teklifler İçin Gönderi Lokasyonu' ,
   'LBL_QUOTES' => 'Teklifler' ,
    'LBL_RELATED' => 'İlişkili',
    'LBL_RELATED_INFORMATION' => 'İlişkili Bilgi',
   'LBL_RELATED_RECORDS' => 'İlişkili Kayıtlar' ,
   'LBL_REMOVE' => 'Sil' ,
    'LBL_REPORTS_TO' => 'Raporladığı Kişi:',
   'LBL_REQUIRED_SYMBOL' => '*' ,
   'LBL_SAVE_BUTTON_KEY' => 'S' ,
   'LBL_SAVE_BUTTON_LABEL' => 'Kaydet' ,
   'LBL_SAVE_BUTTON_TITLE' => 'Kaydet [Alt+S]' ,
   'LBL_SAVE_AS_BUTTON_KEY' => 'A' ,
   'LBL_SAVE_AS_BUTTON_LABEL' => 'Farklı Kaydet' ,
   'LBL_SAVE_AS_BUTTON_TITLE' => 'Farklı Kaydet [Alt+A]' ,
   'LBL_FULL_FORM_BUTTON_KEY' => 'F' ,
   'LBL_FULL_FORM_BUTTON_LABEL' => 'Tam Form' ,
   'LBL_FULL_FORM_BUTTON_TITLE' => 'Tam Form [Alt+F]' ,
   'LBL_SAVE_NEW_BUTTON_KEY' => 'V' ,
   'LBL_SAVE_NEW_BUTTON_LABEL' => 'Kaydet & Yeni Oluştur' ,
   'LBL_SAVE_NEW_BUTTON_TITLE' => 'Kaydet & Yeni Oluştur [Alt+V]' ,
   'LBL_SEARCH_BUTTON_KEY' => 'Q' ,
   'LBL_SEARCH_BUTTON_LABEL' => 'Ara' ,
   'LBL_SEARCH_BUTTON_TITLE' => 'Ara [Alt+Q]' ,
   'LBL_SEARCH' => 'Ara' ,
    'LBL_SEE_ALL' => 'Tamamını Gör',
   'LBL_SELECT_BUTTON_KEY' => 'T' ,
   'LBL_SELECT_BUTTON_LABEL' => 'Seç' ,
   'LBL_SELECT_BUTTON_TITLE' => 'Seç[Alt+T]' ,
    'LBL_SELECT_TEAMS_KEY' => 'Z',
    'LBL_SELECT_TEAMS_LABEL' => 'Takım(lar) Ekle',
    'LBL_SELECT_TEAMS_TITLE' => 'Takım(lar) Ekle [Alt+Z]',
    'LBL_BROWSE_DOCUMENTS_BUTTON_KEY' => 'B',
    'LBL_BROWSE_DOCUMENTS_BUTTON_LABEL' => 'Dökümanlara Gözat',
    'LBL_BROWSE_DOCUMENTS_BUTTON_TITLE' => 'Dökümanlara Gözat [Alt+B]',
   'LBL_SELECT_CONTACT_BUTTON_KEY' => 'T' ,
   'LBL_SELECT_CONTACT_BUTTON_LABEL' => 'İlgili Seç' ,
   'LBL_SELECT_CONTACT_BUTTON_TITLE' => 'İlgili Seç [Alt+T]' ,
   'LBL_GRID_SELECTED_FILE' => 'seçili dosya' ,
   'LBL_GRID_SELECTED_FILES' => 'seçili dosyalar' ,
   'LBL_SELECT_REPORTS_BUTTON_LABEL' => 'Raporlardan Seç' ,
   'LBL_SELECT_REPORTS_BUTTON_TITLE' => 'Raporları Seç' ,
   'LBL_SELECT_USER_BUTTON_KEY' => 'U' ,
   'LBL_SELECT_USER_BUTTON_LABEL' => 'Kullanıcı Seç' ,
   'LBL_SELECT_USER_BUTTON_TITLE' => 'Kullanıcı Seç [Alt+U]' ,
   'LBL_SERVER_RESPONSE_RESOURCES' => 'Resources used to construct this page (sorgular, dosyalar)' ,
   'LBL_SERVER_RESPONSE_TIME_SECONDS' => 'saniye.' ,
   'LBL_SERVER_RESPONSE_TIME' => 'Sunucu yanıt zamanı:' ,
   'LBL_SHIP_TO_ACCOUNT' => 'Gönderilecek Müşteri' ,
   'LBL_SHIP_TO_CONTACT' => 'Gönderilecek İlgili' ,
   'LBL_SHIPPING_ADDRESS' => 'Teslim Adresi' ,
   'LBL_SHORTCUTS' => 'Kısayollar' ,
   'LBL_SHOW' => 'Göster' ,
   'LBL_SQS_INDICATOR' => '' ,
   'LBL_STATE' => 'Eyalet:' ,
   'LBL_STATUS_UPDATED' => 'Bu Etkinlik için durumunuz güncellendi!' ,
   'LBL_STATUS' => 'Durum:' ,
   'LBL_SUBJECT' => 'Konu' ,

    
   'LBL_SUGAR_COPYRIGHT' => '© 2004-2007 SugarCRM Inc. Bu program BU HALİYLE, garanti verilmeden sunulmaktadır.  <a href=\"LICENSE.txt\" target=\"_blank\" class=\"copyRightLink\">GPLv3</a> başlığı altında Lisanslanmaktadır.' ,



    'LBL_SYNC' => 'Senkronizasyon' ,
    'LBL_SYNC' => 'Senkronizasyon',
   'LBL_TABGROUP_ALL' => 'Tümü<sub><i> All</i></sub>' ,
   'LBL_TABGROUP_ACTIVITIES' => 'Aktiviteler<sub><i> Activities</i></sub>' ,
   'LBL_TABGROUP_COLLABORATION' => 'Ekip Çalışması<sub><i> Collaboration</i></sub>' ,
   'LBL_TABGROUP_HOME' => 'Ana Sayfa<sub><i> Home</i></sub>' ,
   'LBL_TABGROUP_MARKETING' => 'Pazarlama<sub><i> Marketing</i></sub>' ,
   'LBL_TABGROUP_MY_PORTALS' => 'Sitelerim<sub><i> My Sites</i></sub>' ,
   'LBL_TABGROUP_OTHER' => 'Diğer<sub><i> Other</i></sub>' ,
   'LBL_TABGROUP_REPORTS' => 'Raporlar<sub><i> Reports</i></sub>' ,
   'LBL_TABGROUP_SALES' => 'Satışlar<sub><i> Sales</i></sub>' ,
   'LBL_TABGROUP_SUPPORT' => 'Destek<sub><i> Support</i></sub>' ,
   'LBL_TABGROUP_TOOLS' => 'Araçlar<sub><i> Tools</i></sub>' ,



   'LBL_TASKS' => 'Görevler' ,
   'LBL_TEAMS_LINK' => 'Takım' ,
    'LBL_THEME_COLOR'=>'Renk',
    'LBL_THEME_FONT'=>'Font',
   'LBL_THOUSANDS_SYMBOL' => 'K' ,
   'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K' ,
   'LBL_TRACK_EMAIL_BUTTON_LABEL' => 'E-Posta Arşivle' ,
   'LBL_TRACK_EMAIL_BUTTON_TITLE' => 'E-Posta Arşivle [Alt+K]' ,
   'LBL_UNAUTH_ADMIN' => 'Sistem Yönetimi Fonksiyonlarına izinsiz erişim' ,
   'LBL_UNDELETE_BUTTON_LABEL' => 'Silinenleri Geri Al' ,
   'LBL_UNDELETE_BUTTON_TITLE' => 'Silinenleri Geri Al [Alt+D]' ,
   'LBL_UNDELETE_BUTTON' => 'Silinenleri Geri Al' ,
   'LBL_UNDELETE' => 'Silinenleri Geri Al' ,
   'LBL_UNSYNC' => 'Senkronizasyonu Kaldır' ,
   'LBL_UPDATE' => 'Güncelle' ,
   'LBL_USER_LIST' => 'Kullanıcı Listesi' ,
   'LBL_USERS_SYNC' => 'Kullanıcıları Senkronize Et' ,
   'LBL_USERS' => 'Kullanıcılar' ,
    'LBL_VERIFY_EMAIL_ADDRESS'=>'E-Posyayı var olan kayıtlarda arıyor...',
    'LBL_VERIFY_PORTAL_NAME'=>'Portal ismini var olan kayıtlarda arıyor...',
   'LBL_VIEW_PDF_BUTTON_KEY' => 'P' ,
   'LBL_VIEW_PDF_BUTTON_LABEL' => 'PDF Olarak Yazdır' ,
   'LBL_VIEW_PDF_BUTTON_TITLE' => 'PDF Olarak Yazdır [Alt+P]' ,

   'LNK_ABOUT' => 'Hakkında' ,
   'LNK_ADVANCED_SEARCH' => 'Detaylı Arama' ,
   'LNK_BASIC_SEARCH' => 'Basit Arama' ,
   'LBL_MODIFY_CURRENT_SEARCH'=> 'Şu anki aramayı değiştir',
   'LNK_SAVED_VIEWS' => 'Sayfa Düzeni Opsiyonları' ,
   'LNK_DELETE_ALL' => 'tümünü sil' ,
   'LNK_DELETE' => 'sil' ,
   'LNK_EDIT' => 'değiştir' ,
   'LNK_GET_LATEST' => 'En sonuncuyu al' ,
   'LNK_GET_LATEST_TOOLTIP' => 'En son sürümle değiştir' ,
   'LNK_HELP' => 'Yardım' ,
   'LNK_LIST_END' => 'Son' ,
   'LNK_LIST_NEXT' => 'Sonraki' ,
   'LNK_LIST_PREVIOUS' => 'Önceki' ,
   'LNK_LIST_RETURN' => 'Listeye Geri Dön' ,
   'LNK_LIST_START' => 'Başla' ,
   'LNK_LOAD_SIGNED' => 'İmzala' ,
   'LNK_LOAD_SIGNED_TOOLTIP' => 'İmzalı belge ile değiştir' ,
   'LNK_PRINT' => 'Yazdır' ,
   'LNK_REMOVE' => 'sil' ,
   'LNK_RESUME' => 'Yeniden Başla' ,
   'LNK_VIEW_CHANGE_LOG' => 'Değişiklik Tarihçesini Göster' ,


   'NTC_CLICK_BACK' => 'Lütfen web tarayıcısının "geri" tuşuna basın ve hatayı düzeltin.' ,
   'NTC_DATE_FORMAT' => '(yyyy-mm-dd)' ,
   'NTC_DATE_TIME_FORMAT' => '(yyyy-mm-dd 24:00)' ,
   'NTC_DELETE_CONFIRMATION_MULTIPLE' => 'Seçili kayıt(ları) silmek istediğinizden emin misiniz?' ,
    'NTC_TEMPLATE_IS_USED' => 'Şablon en azından bir e-posta pazarlama kaydında kullanılmış. Silmek istediğinizden emin misiniz?',
    'NTC_TEMPLATES_IS_USED' => "Aşağıdaki Şablonlar e-posta pazarlama kayıtlarında kullanılmış. Silmek istediğinizden emin misiniz?\n",
   'NTC_DELETE_CONFIRMATION' => 'Bu kaydı silmek istediğinizden emin misiniz?' ,
   'NTC_DELETE_CONFIRMATION_NUM' => 'Bu kaydı silmek istediğinizden emin misiniz? ' ,
   'NTC_UPDATE_CONFIRMATION_NUM' => 'Güncellemek istediğinizden emin misiniz?' ,
   'NTC_DELETE_SELECTED_RECORDS' => ' seçili kayıt?' ,
   'NTC_LOGIN_MESSAGE' => 'Lütfen kullanıcı adı ve şifrenizi giriniz.' ,
   'NTC_NO_ITEMS_DISPLAY' => 'boş' ,
   'NTC_REMOVE_CONFIRMATION' => 'Bu ilişkiyi kaldırmak istediğinizden emin misiniz?' ,
   'NTC_REQUIRED' => 'Zorunlu alanı gösterir' ,
   'NTC_SUPPORT_SUGARCRM' => 'PayPal ile bağış yaparak SugarCRM Projesini destekleyin- Ücretsiz, hızlı ve güvenli!' ,
   'NTC_TIME_FORMAT' => '(24:00)' ,
   'NTC_WELCOME' => 'Hoşgeldiniz' ,
   'NTC_YEAR_FORMAT' => '(yyyy)' ,
   'LOGIN_LOGO_ERROR' => 'Lütfen SugarCRM logolarını değiştirin' ,
   'ERROR_FULLY_EXPIRED' => 'Şirketinize ait SugarCRM lisansının geçerliliği 30 günden önce sona ermiş ve  güncellenmesi gerekir.  Sadece Yöneticilerini giriş yapmasına izin verilmektedir.' ,
   'ERROR_LICENSE_EXPIRED' => 'Şirketinize ait SugarCRM lisansınızın güncellenmesi gerekmekte. Sadece Yöneticilerini giriş yapmasına izin verilmektedir.' ,
   'ERROR_LICENSE_VALIDATION' => 'Şirketinize ait SugarCRM lisansınızın doğrulanması gereklidir. Sadece Yöneticilerini giriş yapmasına izin verilmektedir.' ,
   'WARN_LICENSE_SEATS'=>  "Uyarı: Aktif kullanıcı sayısı izin verilen maksimum lisans sayısını aşıyor.",
   'WARN_LICENSE_SEATS_MAXED'=>  "Uyarı: Aktif kullanıcı sayısı izin verilen maksimum lisans sayısını aşıyor.",    
   'WARN_ONLY_ADMINS'=> "Yalnızca Sistem Yöneticileri sisteme bağlanabilir.",
   'ERROR_NO_RECORD' => 'Kayıt almada hata. Bu kayıt silinmiş olabilir veya görüntülemek için izniniz yok.' ,
    'ERROR_TYPE_NOT_VALID' => 'Kusur. Bu tip geçerli değil.',
   'LBL_DUP_MERGE' => 'Aynı Kayıtları Bul' ,
   'LBL_MANAGE_SUBSCRIPTIONS' => 'Abonelikleri Yönet' ,
   'LBL_MANAGE_SUBSCRIPTIONS_FOR' => 'Abonelik Yönetimi:' ,
   'LBL_SUBSCRIBE' => 'Abone Ol' ,
   'LBL_UNSUBSCRIBE' => 'Abonelikten Ayrıl' ,
       'LBL_LOADING' => 'Yükleniyor...' ,
    'LBL_SEARCHING' => 'Arıyor...',
   'LBL_SAVING_LAYOUT' => 'Sayfa Düzeni Kaydediliyor ...' ,
   'LBL_SAVED_LAYOUT' => 'Sayfa Düzeni kaydedildi.' ,
   'LBL_SAVED' => 'Kaydedildi' ,
   'LBL_SAVING' => 'Kaydediliyor' ,
   'LBL_FAILED' => 'Kusurlı!' ,
   'LBL_DISPLAY_COLUMNS' => 'Kolonları Göster' ,
   'LBL_HIDE_COLUMNS' => 'Kolonları Gizle' ,
   'LBL_SEARCH_CRITERIA' => 'Arama Kriteri' ,
   'LBL_SAVED_VIEWS' => 'Kaydedilmiş Görünümler' ,
   'LBL_PROCESSING_REQUEST' => 'İşleniyor...' ,
   'LBL_REQUEST_PROCESSED' => 'Tamamlandı' ,





   'LBL_MERGE_DUPLICATES' => 'Aynı Kayıtları Birleştir' ,
   'LBL_SAVED_SEARCH_SHORTCUT' => 'Kaydedilmiş Aramalar' ,
   'LBL_SEARCH_POPULATE_ONLY' => 'Yukarıdaki arama formunu kullanarak arama yap' ,
   'LBL_DETAILVIEW' => 'Detay Görünümü' ,
   'LBL_LISTVIEW' => 'Liste Görünümü' ,
   'LBL_EDITVIEW' => 'Değişikli Görünümü' ,
   'LBL_SEARCHFORM' => 'Arama Formu' ,
   'LBL_SAVED_SEARCH_ERROR' => 'Bu Görünüm için bir isim verin.' ,
   'LBL_DISPLAY_LOG' => 'Günlüğü Göster' ,
   'ERROR_JS_ALERT_SYSTEM_CLASS' => 'Sistem' ,
   'ERROR_JS_ALERT_TIMEOUT_TITLE' => 'Oturum Zaman Aşımı' ,
   'ERROR_JS_ALERT_TIMEOUT_MSG_1' => 'Oturumunuz yaklaşık 2 dak. sonra zaman aşımına uğrayacak, lütfen çalışmalarınızı kaydedin.' ,
   'ERROR_JS_ALERT_TIMEOUT_MSG_2' => 'Oturumunuz zaman aşımına uğradı.' ,
   'MSG_JS_ALERT_MTG_REMINDER_AGENDA' => 'Ajanda: ' ,
   'MSG_JS_ALERT_MTG_REMINDER_MEETING' => 'Toplantı' ,
   'MSG_JS_ALERT_MTG_REMINDER_CALL' => 'Tel.Araması' ,
   'MSG_JS_ALERT_MTG_REMINDER_TIME' => 'Saat: ' ,
   'MSG_JS_ALERT_MTG_REMINDER_LOC' => 'Yer: ' ,
   'MSG_JS_ALERT_MTG_REMINDER_DESC' => 'Tanım:' ,
   'MSG_JS_ALERT_MTG_REMINDER_MSG' => 'Bu toplantıyı görüntülemek için Tamam tuşuna veya mesajı silmek için İptal tuşuna tıklayın. ' ,
       'LBL_ADD_TO_FAVORITES' => 'Favorilerime ekle' ,
    'LBL_MARK_AS_FAVORITES' => 'Favori olarak işaretle',
   'LBL_CREATE_CONTACT' => 'İlgili Oluştur' ,
   'LBL_CREATE_CASE' => 'Talep Oluştur' ,
   'LBL_CREATE_NOTE' => 'Not Oluştur' ,
   'LBL_CREATE_OPPORTUNITY' => 'Fırsat Oluştur' ,
   'LBL_SCHEDULE_CALL' => 'Tel.Araması Planla' ,
   'LBL_SCHEDULE_MEETING' => 'Toplantı Planla' ,
   'LBL_CREATE_TASK' => 'Görev Oluştur' ,
   'LBL_REMOVE_FROM_FAVORITES' => 'Favorilerimden kaldır' ,
       'LBL_GENERATE_WEB_TO_LEAD_FORM' => 'Form Üret' ,
   'LBL_SAVE_WEB_TO_LEAD_FORM' => 'Web\'den Potansiyel Kaydet Formu' ,

   'LBL_PLEASE_SELECT' => 'Lütfen Seçin' ,
   'LBL_REDIRECT_URL' => 'Yönlendirme URL\'i' ,
   'LBL_RELATED_CAMPAIGN' => 'İlişkili kampanya' ,
   'LBL_ADD_ALL_LEAD_FIELDS' => 'Tüm Alanları Ekle' ,
   'LBL_REMOVE_ALL_LEAD_FIELDS' => 'Tüm Alanları Kaldır' ,
   'LBL_ONLY_IMAGE_ATTACHMENT' => 'Yalnızca Resim tipindeki ek kabul edilmektedir' ,
    'LBL_REMOVE' => 'Sil',
   'LBL_TRAINING' => 'Eğitim',
   'ERR_DATABASE_CONN_DROPPED' => 'Sorgu çalıştırmasında hata, veritabanınız bağlantıyı koparmış olabilir. Sayfayı yeniden yükleyin, web sunucunuzu yeniden başlatmanız gerekebilir. ',
   'ERR_MSSQL_DB_CONTEXT' => 'Veritabanı context\'i değiştirildi:' ,
   'ERR_MSSQL_WARNING' =>'Uyarı:',

       'ERR_MISSING_VARDEF_NAME' => 'Uyarı: alan [[field]] ,  [moduleDir] vardefs.php dosyasında bir giriş ile eşlenmemiş.' ,
   'ERR_CANNOT_CREATE_METADATA_FILE' => 'Kusur: Dosya [[file]] bulunamadı.  Karşılık gelen HTML dosyası olmadığı için yaratılamadı.' ,
	'ERR_CANNOT_FIND_MODULE' => 'Kusur: Modül [module] bulunamadı.',
   'LBL_ALT_ADDRESS' => 'Diğer Adres:' ,
   'ERR_SMARTY_UNEQUAL_RELATED_FIELD_PARAMETERS' => 'Kusur : There are an unequal number of arguments for the \\\'key\\\' and \'copy\' elements in the displayParams array.' ,
   'ERR_SMARTY_MISSING_DISPLAY_PARAMS' => 'displayParams Dizisinde eksik endeks: ' ,

    
    'LBL_DASHLET_CONFIGURE_GENERAL' => 'Genel' ,
   'LBL_DASHLET_CONFIGURE_FILTERS' => 'Filtreler' ,
   'LBL_DASHLET_CONFIGURE_MY_ITEMS_ONLY' => 'Yalnızca Bana Ait Olanlar' ,
   'LBL_DASHLET_CONFIGURE_TITLE' => 'Başlık' ,
   'LBL_DASHLET_CONFIGURE_DISPLAY_ROWS' => 'Satırları Göster' ,

       'LBL_CREATING_NEW_PAGE' => 'Yeni Sayfa Oluşturuluyor...' ,
   'LBL_NEW_PAGE_FEEDBACK' => 'Yeni bir sayfa oluşturdunuz. Dashlet Ekle menü adımı ile yeni içerik ekleyebilirsiniz.' ,
   'LBL_DELETE_PAGE_CONFIRM' => 'Bu sayfayı simek istediğinizden emin misiniz?' ,
   'LBL_SAVING_PAGE_TITLE' => 'Sayfa Başlığı Kaydediliyor...' ,
   'LBL_RETRIEVING_PAGE' => 'Sayfa Alınıyor...' ,
   'LBL_MAX_DASHLETS_REACHED' => 'Yöneticinin belirlemiş olduğu maksimum Sugar Dashlet sayısına eriştiniz. Yeni bir tane eklemek için varolanlardan birini kaldırmanız gerekir.' ,
   'LBL_ADDING_DASHLET' => 'Sugar Dashlet Ekleniyor' ,
   'LBL_ADDED_DASHLET' => 'Sugar Dashlet Eklendi' ,
   'LBL_REMOVE_DASHLET_CONFIRM' => 'Bu Sugar Dashleti kaldırmak istediğinizden emin misiniz?' ,
   'LBL_REMOVING_DASHLET' => 'Sugar Dashlet Siliniyor...' ,
   'LBL_REMOVED_DASHLET' => 'Sugar Dashlet Silindi.' ,

       'LBL_ADD_PAGE' => 'Sayfa Ekle' ,
   'LBL_DELETE_PAGE' => 'Sayfa Sil' ,
   'LBL_CHANGE_LAYOUT' => 'Sayfa Yerleşimini Değiştir' ,
   'LBL_RENAME_PAGE' => 'Sayfayı Yeniden Adlandır' ,

   'LBL_LOADING_PAGE' => 'Sayfa yükleniyor, lütfen bekleyin...' ,

   'LBL_RELOAD_PAGE' => 'Lütfen bu Dashlet\'i kullanmak için <a href=\"javascript: window.location.reload()\">penceriyi tekrar yükleyiniz</a>.' ,
   'LBL_ADD_DASHLETS' => 'Sugar Dashletleri Ekle' ,
   'LBL_CLOSE_DASHLETS' => 'Kapat' ,
   'LBL_OPTIONS' => 'Seçenekler' ,
   'LBL_NUMBER_OF_COLUMNS' => 'Kolon sayısını seçiniz' ,
   'LBL_1_COLUMN' => '1 Kolon' ,
   'LBL_2_COLUMN' => '2 Kolon' ,
   'LBL_3_COLUMN' => '3 Kolon' ,
   'LBL_PAGE_NAME' => 'Sayfa Adı' ,

   'LBL_SEARCH_RESULTS' => 'Arama Sonçları' ,
   'LBL_SEARCH_MODULES' => 'Modüller' ,
   'LBL_SEARCH_CHARTS' => 'Grafikler' ,
   'LBL_SEARCH_REPORT_CHARTS' => 'Rapor Grafikleri' ,
   'LBL_SEARCH_TOOLS' => 'Araçlar' ,
    'LBL_SEARCH_HELP_TITLE' => 'Birdenfazlaseçim ve Kaydedilmiş Aramalar ile çalışıyor',
    'LBL_SEARCH_HELP_CLOSE_TOOLTIP' => 'Kapat',

   'ERR_BLANK_PAGE_NAME' => 'Lütfen bir sayfa adı giriniz.' ,
    

   'LBL_NO_IMAGE' => 'Resim yok' ,

    'LBL_MODULE' => 'Modül',

       'LBL_COPY_ADDRESS_FROM_LEFT' => 'Adresi soldan kopyalayın:' ,
   'LBL_SAVE_AND_CONTINUE' => 'Kaydet ve Devam Et' ,

   'LBL_SEARCH_HELP_TEXT' => '<p><br /><strong>Multiselect controls</strong></p><ul><li>Click on the values to select an attribute.</li><li>Ctrl-click to select multiple. Mac users use CMD-click.</li><li>To select all values between two attributes,  click first value and then shift-click last value.</li></ul><p><strong>Advanced Search & Layout Options</strong><br><br>Using the <b>Saved Search & Layout</b> option, you can save a set of search parameters and/or a custom List View layout in order to quickly obtain the desired search results in the future. You can save an unlimited number of custom searches and layouts. All saved searches appear by name in the Saved Searches list, with the last loaded saved search appearing at the top of the list.<br><br>To customize the List View layout, use the Hide Columns and Display Columns boxes to select which fields to display in the search results. For example, you can view or hide details such as the record name, and assigned user, and assigned team in the search results. To add a column to List View, select the field from the Hide Columns list and use the left arrow to move it to the Display Columns list. To remove a column from List View, select it from the Display Columns list and use the right arrow to move it to the Hide Columns list.<br><br>If you save layout settings, you will be able to load them at any time to view the search results in the custom layout.<br><br>To save and update a search and/or layout:<ol><li>Enter a name for the search results in the <b>Save this search as</b> field and click <b>Save</b>.The name now displays in the Saved Searches list adjacent to the <b>Clear</b> button.</li><li>To view a saved search, select it from the Saved Searches list. The search results are displayed in the List View.</li><li>To update the properties of a saved search, select the saved search from the list, enter the new search criteria and/or layout options in the Advanced Search area, and click <b>Update</b> next to <b>Modify Current Search</b>.</li><li>To delete a saved search, select it in the Saved Searches list, click <b>Delete</b> next to <b>Modify Current Search</b>, and then click <b>OK</b> to confirm the deletion.</li></ol>' ,

        'ERR_QUERY_LIMIT' => 'Kusur: Sorgu limiti olan $limit, $module modülü için ulaşıldı.',
    'ERROR_NOTIFY_OVERRIDE' => 'Kusur: ResourceObserver->notify() tekrar yazılması gerekir.',

        'ERR_MONITOR_FILE_MISSING' => 'Kusur: metadata dosyasının boş olmasından veya dosyanın olmamasından dolayı monitor yaratamadı.',
    'ERR_MONITOR_NOT_CONFIGURED' => 'Kusur: Talep edilen isim için tanımlanmış monitor bulunamamaktadır',
    'ERR_UNDEFINED_METRIC' => 'Kusur: Tanımlı olmayan metrik için değer koyamıyor',
    'ERR_STORE_FILE_MISSING' => 'Kusur: Store uygulama dosyası bulunamadı',

    'LBL_MONITOR_ID' => 'Monitor Id',




    'LBL_USER_ID' => 'Kullanıcı Id',
    'LBL_MODULE_NAME' => 'Modül İsmi',
    'LBL_ITEM_ID' => 'Kalem Id',
    'LBL_ITEM_SUMMARY' => 'Kalem Özeti',
    'LBL_ACTION' => 'Aksiyon',
    'LBL_SESSION_ID' => 'Oturum Id',
    'LBL_VISIBLE' => 'Kayıt Görünebilir',
    'LBL_DATE_LAST_ACTION' => 'On Aksiyon Tarihi',







































        'MSG_IS_NOT_BEFORE' => 'daha önce değil:',
	'MSG_IS_MORE_THAN' => 'daha fazla:',
	'MSG_IS_LESS_THAN' => 'daha az:',
	'MSG_SHOULD_BE' => 'olması gereken ',
	'MSG_OR_GREATER' => 'veya daha büyük',

    'LBL_PORTAL_WELCOME_TITLE' => 'Sugar Portal 5.1.0\'e Hoş Geldiniz',
    'LBL_PORTAL_WELCOME_INFO' => 'Sugar Portal is a framework which provides real-time view of cases, bugs & newsletters etc to customers. This is an external facing interface to Sugar that can be deployed within any website.  Stay tuned for more customer self service features like Project Management and Forums in our future releases.',
    'LBL_LIST' => 'Liste',
    'LBL_CREATE_CASE' => 'Talep Oluştur',
    'LBL_CREATE_BUG' => 'Kusur Oluştur',
    'LBL_NO_RECORDS_FOUND' => '- 0 Kayıt Bulundu -',

    'DATA_TYPE_DUE' => 'Son Tarih:',
  	'DATA_TYPE_START' => 'Başlangıç:',
  	'DATA_TYPE_SENT' => 'Gönderildi:',
  	'DATA_TYPE_MODIFIED' => 'Değiştirildi:',


        'LBL_REPORT_NEWREPORT_COLUMNS_TAB_COUNT' => 'Sayı',
        'LBL_OBJECT_IMAGE' => 'object resmi',
        'LBL_MASSUPDATE_DATE' => 'Tarihi Seçin',

    'LBL_VALIDATE_RANGE' => 'kabul edilebilir aralıkta değil',

        'LBL_DROPDOWN_LIST_ALL' => 'Tümü',

    'LBL_OPERATOR_IN_TEXT' => 'şunlardan biri:',
    'LBL_OPERATOR_NOT_IN_TEXT' => 'şunlardan biri değil:',


	    'ERR_CONNECTOR_FILL_BEANS_SIZE_MISMATCH' => 'Kusur: bean parametresi Dizin sayısı, sonuçların Dizin sayısını tutmuyor.',
	'ERR_MISSING_MAPPING_ENTRY_FORM_MODULE' => 'Kusur: Modül için eşleşme hatası.',
	'ERROR_UNABLE_TO_RETRIEVE_DATA' => 'Kusur: Bağlayıcı {0} için veri alınamamaktadır.  Servis şu anda ulaşılamıyor veya konfigurasyon değeri hatalı olabilir.  Bağlayıcı Hata Mesajı: ({1}).',
	'LBL_MERGE_CONNECTORS' => 'Veriyi Al',
	'LBL_MERGE_CONNECTORS_BUTTON_KEY' => '[D]',
	'LBL_REMOVE_MODULE_ENTRY' => 'Bu modül için bağlayıcı tanımını etkisiz hale getirmek istediğinizden emin misiniz?',
    
        'LBL_FASTCGI_LOGGING'      => 'IIS/FastCGI sapi kullanırken en iyi performansı elde etmek için, fastcgi.logging değerini php.ini dosyasında 0 olarak belirtin.',
    
        'LBL_MASSUPDATE_DELETE_GLOBAL_TEAM'=> 'Üzgünüm, global takımı silemezsiniz. İptal ediliyor',
    'LBL_MASSUPDATE_DELETE_PRIVATE_TEAMS'=>'Üzgünüm, kişisel takım(ları) silemezsiniz. İptal ediliyor',
        'LBL_NO_FLASH_PLAYER' => 'Merhaba, Flash kapalı veya Adobe Flash Player\'ın eski bir sürümünü kullanıyorsunuz. Lütfen <a href="http://www.adobe.com/go/getflashplayer/">Flash Player en son versiyonunu indirin</a> veya flash\'ı açın.',
		'LBL_COLLECTION_NAME' => 'İsim',
	'LBL_COLLECTION_PRIMARY' => 'Asıl',
	'ERROR_MISSING_COLLECTION_SELECTION' => 'Zorunlu alan boş',
    'LBL_COLLECTION_EXACT' => 'Kesin',
    
        'LBL_FASTCGI_LOGGING'      => 'IIS/FastCGI sapi kullanımının optimal performansı için, php.ini dosyasında fastcgi.logging değerini 0 olarak belirtin.',
    );

$app_list_strings['moduleList']['Library'] = 'Kitaplık';
$app_list_strings['library_type'] = array ('Books' => 'Kitap' ,'Music' => 'Müzik' ,'DVD' => 'DVD' ,'Magazines' => 'Dergiler');
$app_list_strings['moduleList']['EmailAddresses'] = 'E-Posta Adresleri';

$app_list_strings['kbdocument_status_dom'] = 'Draft';
$app_list_strings['kbdocument_status_dom'] = array (
    'Draft' => 'Taslak',
    'In Review' => 'İncelemede',
    'Published' => 'Yayınlandı',
);

$app_list_strings['project_priority_default'] = 'Medium';
$app_list_strings['project_priority_options'] = array (
    'High' => 'Yüksek',
    'Medium' => 'Orta',
    'Low' => 'Düşük',
);


  $app_list_strings['kbdocument_status_dom'] =
    array (
    'Draft' => 'Taslak' ,
      'Expired' => 'Süresi Geçmiş' ,
      'In Review' => 'İncelemede' ,
      'Published' => 'Yayınlandı'  ,
  );

   $app_list_strings['kbadmin_actions_dom'] =
    array (
      '' => '--Yönetici Aksiyonları--' ,
      'Create New Tag' => 'Yeni Tag Oluştur' ,
      'Delete Tag'=> 'Tag Sil' ,
      'Rename Tag' => 'Tag İsmini Değiştir' ,
      'Move Selected Articles'=> 'Seçili Makaleleri Taşı' ,
      'Apply Tags On Articles' => 'Makalelere Tag Uygula' ,
      'Delete Selected Articles'=> 'Seçili Makaleleri Sil'   
  );


   $app_list_strings['kbdocument_attachment_option_dom'] =
     array (
      '' => '' ,
      'some' => 'Ekleri Var' ,
      'none' => 'Ek Yok' ,
      'mime' => 'Mime Tipi Belirtme' ,
      'name' => 'İsim Belirtme',
    );

  $app_list_strings['moduleList']['KBDocuments'] = 'Bilgi Tabanı';
  $app_strings['LBL_CREATE_KB_DOCUMENT'] = 'Makale Oluştur';
  $app_list_strings['kbdocument_viewing_frequency_dom'] =
  array(
    '' => '' ,
      'Top_5' => 'İlk 5' ,
      'Top_10' => 'İlk 10' ,
      'Top_20' => 'İlk 20' ,
      'Bot_5' => 'Son 5' ,
      'Bot_10' => 'Son10' ,
      'Bot_20' => 'Son 20',
  );

   $app_list_strings['kbdocument_canned_search'] =
    array(
      'all' => 'Tümü' ,
      'added' => 'Son 30 günde Eklenmiş' ,
      'pending' => 'Onayımı Bekliyor' ,
      'updated' => 'Son 30 gün için Güncellenmiş' ,
      'faqs' => 'SSS'   ,
    );
    $app_list_strings['kbdocument_date_filter_options'] =
        array(
      '' => '' ,
      'on' => 'Tarihinde' ,
      'before' => 'Önce' ,
      'after' => 'Sonra' ,
      'between_dates' => 'Arasında' ,
      'last_7_days' => 'Son  7 gün' ,
      'next_7_days' => 'Sonraki 7 gün' ,
      'last_month' => 'Son Ay' ,
      'this_month' => 'Bu Ay' ,
      'next_month' => 'Sonraki Ay' ,
      'last_30_days' => 'Son 30 gün' ,
      'next_30_days' => 'Sonraki 30 gün' ,
      'last_year' => 'Son Yıl' ,
      'this_year' => 'Bu Yıl' ,
      'next_year' => 'Sonraki Yıl' ,
      'isnull' => 'Boş'   ,
        );

    $app_list_strings['countries_dom'] = array(
      '' => '' ,
      'ABU DHABI' => 'ABU DABİ' ,
      'ADEN' => 'ADEN' ,
      'AFGHANISTAN' => 'AFGANİSTAN' ,
      'ALBANIA' => 'ARNAVUTLUK' ,
      'ALGERIA' => 'CEZAYİR' ,
      'AMERICAN SAMOA' => 'AMERİKAN SAMOA' ,
      'ANDORRA' => 'ANDORA' ,
      'ANGOLA' => 'ANGOLA' ,
      'ANTARCTICA' => 'ANTARTİKA' ,
      'ANTIGUA' => 'ANTIGUA' ,
      'ARGENTINA' => 'ARJANTİN' ,
      'ARMENIA' => 'ERMENİSTAN' ,
      'ARUBA' => 'ARUBA' ,
      'AUSTRALIA' => 'AVUSTRALYA' ,
      'AUSTRIA' => 'AVUSTURYA' ,
      'AZERBAIJAN' => 'AZERBAYCAN' ,
      'BAHAMAS' => 'BAHAMALAR' ,
      'BAHRAIN' => 'BAHREYN' ,
      'BANGLADESH' => 'BANGLADEŞ' ,
      'BARBADOS' => 'BARBADOS' ,
      'BELARUS' => 'BEYAZ RUSYA' ,
      'BELGIUM' => 'BELÇİKA' ,
      'BELIZE' => 'BELIZE' ,
      'BENIN' => 'BENIN' ,
      'BERMUDA' => 'BERMUDA' ,
      'BHUTAN' => 'BUTAH' ,
      'BOLIVIA' => 'BOLIVYA' ,
      'BOSNIA' => 'BOSNA' ,
      'BOTSWANA' => 'BOTSVANA' ,
      'BOUVET ISLAND' => 'BOUVET ADASI' ,
      'BRAZIL' => 'BREZİLYA' ,
      'BRITISH ANTARCTICA TERRITORY' => 'İNGİLİZ ANTARTİKA BÖLGESİ' ,
      'BRITISH INDIAN OCEAN TERRITORY' => 'İNGİLİZ HİNT OKYANUSU BÖLGESİ' ,
      'BRITISH VIRGIN ISLANDS' => 'İNGİLİZ VİRJİN ADALARI' ,
      'BRITISH WEST INDIES' => 'İNGİLİZ BATI HİNTLERİ' ,
      'BRUNEI' => 'BRUNEI' ,
      'BULGARIA' => 'BULGARİSTAN' ,
      'BURKINA FASO' => 'BURKINA FASO' ,
      'BURUNDI' => 'BURUNDI' ,
      'CAMBODIA' => 'KAMBOÇYA' ,
      'CAMEROON' => 'KAMERUN' ,
      'CANADA' => 'KANADA' ,
      'CANAL ZONE' => 'KANAL BÖLGESİ' ,
      'CANARY ISLAND' => 'KANARYA ADALARI' ,
      'CAPE VERDI ISLANDS' => 'CAPE VERDI ADALARI' ,
      'CAYMAN ISLANDS' => 'CAYMAN ADALARI' ,
      'CEVLON' => 'SEYLAN' ,
      'CHAD' => 'ÇAD' ,
      'CHANNEL ISLAND UK' => 'İNGİLİZ KANAL ADASI' ,
      'CHILE' => 'ŞİLİ' ,
      'CHINA' => 'ÇİN' ,
      'CHRISTMAS ISLAND' => 'CHRISTMAS ADALARI' ,
      'COCOS (KEELING) ISLAND' => 'COCOS ADASI' ,
      'COLOMBIA' => 'KOLOMBİYA' ,
      'COMORO ISLANDS' => 'COMORO ADALARI' ,
      'CONGO' => 'KONGO' ,
      'CONGO KINSHASA' => 'KONGO KINSHASA' ,
      'COOK ISLANDS' => 'COOK ADALARI' ,
      'COSTA RICA' => 'KOSTARİKA' ,
      'CROATIA' => 'HIRVATİSTAN' ,
      'CUBA' => 'KÜBA' ,
      'CURACAO' => 'CURACAO' ,
      'CYPRUS' => 'KKTC' ,
      'CZECH REPUBLIC' => 'ÇEK CUMHURİYETİ' ,
      'DAHOMEY' => 'DAHOMEY' ,
      'DENMARK' => 'DANİMARKA' ,
      'DJIBOUTI' => 'CİBUTİ' ,
      'DOMINICA' => 'DOMİNİK' ,
      'DOMINICAN REPUBLIC' => 'DOMİNİK CUMHURİYETİ' ,
      'DUBAI' => 'DUBAİ' ,
      'ECUADOR' => 'EKVATOR' ,
      'EGYPT' => 'MISIR' ,
      'EL SALVADOR' => 'EL SALVADOR' ,
      'EQUATORIAL GUINEA' => 'EKVATOR GİNESİ' ,
      'ESTONIA' => 'ESTONYA' ,
      'ETHIOPIA' => 'ETİYOPYA' ,
      'FAEROE ISLANDS' => 'FAROE ADALARI' ,
      'FALKLAND ISLANDS' => 'FALKLAND ADALARI' ,
      'FIJI' => 'FİJİ SAHİLLERİ' ,
      'FINLAND' => 'FİNLANDİYA' ,
      'FRANCE' => 'FRANSA' ,
      'FRENCH GUIANA' => 'FRANSIZ GUYANASI' ,
      'FRENCH POLYNESIA' => 'FRANSIZ POLONEZYASI' ,
      'GABON' => 'GABON' ,
      'GAMBIA' => 'GAMBIYA' ,
      'GEORGIA' => 'GÜRCİSTAN' ,
      'GERMANY' => 'ALMANYA' ,
      'GHANA' => 'GANA' ,
      'GIBRALTAR' => 'CEBELİTARIK' ,
      'GREECE' => 'YUNANİSTAN' ,
      'GREENLAND' => 'GREENLAND' ,
      'GUADELOUPE' => 'GUADELOUPE' ,
      'GUAM' => 'GUAM' ,
      'GUATEMALA' => 'GUATEMALA' ,
      'GUINEA' => 'YENİ GİNE' ,
      'GUYANA' => 'GUYANA' ,
      'HAITI' => 'HAİTİ' ,
      'HONDURAS' => 'HONDURAS' ,
      'HONG KONG' => 'HONG KONG' ,
      'HUNGARY' => 'MACARİSTAN' ,
      'ICELAND' => 'İZLANDA' ,
      'IFNI' => 'IFNI' ,
      'INDIA' => 'HİNDİSTAN' ,
      'INDONESIA' => 'ENDONEZYA' ,
      'IRAN' => 'İRAN' ,
      'IRAQ' => 'IRAK' ,
      'IRELAND' => 'İRLANDA' ,
      'ISRAEL' => 'İSRAİL' ,
      'ITALY' => 'İTALYA' ,
      'IVORY COAST' => 'FİLDİŞİ SAHİLLERİ' ,
      'JAMAICA' => 'JAMAİKA' ,
      'JAPAN' => 'JAPONYA' ,
      'JORDAN' => 'ÜRDÜN' ,
      'KAZAKHSTAN' => 'KAZAKİSTAN' ,
      'KENYA' => 'KENYA' ,
      'KOREA' => 'GÜNEY KORE' ,
      'KOREA, SOUTH' => 'GÜNEY KORE' ,
      'KUWAIT' => 'KUVEYT' ,
      'KYRGYZSTAN' => 'KIRGIZİSTAN' ,
      'LAOS' => 'LAGOS' ,
      'LATVIA' => 'LETONYA' ,
      'LEBANON' => 'LÜBNAN' ,
      'LEEWARD ISLANDS' => 'LEEWARD ADALARI' ,
      'LESOTHO' => 'LESOTHO' ,
      'LIBYA' => 'LİBYA' ,
      'LIECHTENSTEIN' => 'LIHTEŞTAYN' ,
      'LITHUANIA' => 'LİTVANYA' ,
      'LUXEMBOURG' => 'LÜXEMBURG' ,
      'MACAO' => 'MACAO' ,
      'MACEDONIA' => 'MAKEDONYA' ,
      'MADAGASCAR' => 'MADAGASKAR' ,
      'MALAWI' => 'MALAVI' ,
      'MALAYSIA' => 'MALEZYA' ,
      'MALDIVES' => 'MALDİVLER' ,
      'MALI' => 'MALİ' ,
      'MALTA' => 'MALTA' ,
      'MARTINIQUE' => 'MARTINIQUE' ,
      'MAURITANIA' => 'MORİTANYA' ,
      'MAURITIUS' => 'MAURITIUS' ,
      'MELANESIA' => 'MELANESIA' ,
      'MEXICO' => 'MEKSİKA' ,
      'MOLDOVIA' => 'MOLDOVA' ,
      'MONACO' => 'MONACO' ,
      'MONGOLIA' => 'MOĞOLİSTAN' ,
      'MOROCCO' => 'FAS' ,
      'MOZAMBIQUE' => 'MOZAMBİK' ,
      'MYANAMAR' => 'BRUNEİ' ,
      'NAMIBIA' => 'NAMİBYA' ,
      'NEPAL' => 'NEPAL' ,
      'NETHERLANDS' => 'HOLLANDA' ,
      'NETHERLANDS ANTILLES' => 'HOLLANDA ANTİLLERİ' ,
      'NETHERLANDS ANTILLES NEUTRAL ZONE' => 'HOLLANDA ANTİLLERİ TARAFSIZ BÖLGE' ,
      'NEW CALADONIA' => 'NEW CALADONIA' ,
      'NEW HEBRIDES' => 'YENİ HİBRİD' ,
      'NEW ZEALAND' => 'YENİ ZELANDA' ,
      'NICARAGUA' => 'NIKARAGUA' ,
      'NIGER' => 'NİJER' ,
      'NIGERIA' => 'NİJERYA' ,
      'NORFOLK ISLAND' => 'NORFOLK ADASI' ,
      'NORWAY' => 'NORVEÇ' ,
      'OMAN' => 'UMMAN' ,
      'OTHER' => 'DİĞER' ,
      'PACIFIC ISLAND' => 'PASİFİK ADALARI' ,
      'PAKISTAN' => 'PAKİSTAN' ,
      'PANAMA' => 'PANAMA' ,
      'PAPUA NEW GUINEA' => 'PAPUA YENİ GİNE' ,
      'PARAGUAY' => 'PARAGUAY' ,
      'PERU' => 'PERU' ,
      'PHILIPPINES' => 'FİLİPİNLER' ,
      'POLAND' => 'POLONYA' ,
      'PORTUGAL' => 'PORTEKİZ' ,
      'PORTUGUESE TIMOR' => 'TİMOR' ,
      'PUERTO RICO' => 'PORTO RİKO' ,
      'QATAR' => 'KATAR' ,
      'REPUBLIC OF BELARUS' => 'BELARUS' ,
      'REPUBLIC OF SOUTH AFRICA' => 'GÜNEY AFRİKA CUMHURİYETİ' ,
      'REUNION' => 'REUNION' ,
      'ROMANIA' => 'ROMANYA' ,
      'RUSSIA' => 'RUSYA' ,
      'RWANDA' => 'RWANRUANDADA' ,
      'RYUKYU ISLANDS' => 'RYUKYU ADALARI' ,
      'SABAH' => 'SABAH' ,
      'SAN MARINO' => 'SAN MARİNO' ,
      'SAUDI ARABIA' => 'SUUDİ ARABİSTAN' ,
      'SENEGAL' => 'SENEGAL' ,
      'SERBIA' => 'SIRBİSTAN' ,
      'SEYCHELLES' => 'ŞEYSEL ADALARI' ,
      'SIERRA LEONE' => 'SIERRA LEONE' ,
      'SINGAPORE' => 'SİNGAPUR' ,
      'SLOVAKIA' => 'SLOVAKYA' ,
      'SLOVENIA' => 'SLOVENYA' ,
      'SOMALILIAND' => 'SOMALI' ,
      'SOUTH AFRICA' => 'GÜNEY AFRİKA' ,
      'SOUTH YEMEN' => 'GÜNEY YEMEN' ,
      'SPAIN' => 'İSPANYA' ,
      'SPANISH SAHARA' => 'İSPANYOL SAHRASI' ,
      'SRI LANKA' => 'SRİLANKA' ,
      'ST. KITTS AND NEVIS' => 'SAINT KITTS VE NEVIS' ,
      'ST. LUCIA' => 'SAINT LUCIA' ,
      'SUDAN' => 'SUDAN' ,
      'SURINAM' => 'SURINAM' ,
      'SW AFRICA' => 'GÜNEY AFRİKA CUM.' ,
      'SWAZILAND' => 'SWAZILAND' ,
      'SWEDEN' => 'İŞVEÇ' ,
      'SWITZERLAND' => 'İŞVİÇRE' ,
      'SYRIA' => 'SURİYE' ,
      'TAIWAN' => 'TAYVAN' ,
      'TAJIKISTAN' => 'TACİKİSTAN' ,
      'TANZANIA' => 'TANZANYA' ,
      'THAILAND' => 'TAYLAND' ,
      'TONGA' => 'TONGO' ,
      'TRINIDAD' => 'TRINIDAD' ,
      'TUNISIA' => 'TUNUS' ,
      'TURKEY' => 'TÜRKİYE' ,
      'UGANDA' => 'UGANDA' ,
      'UKRAINE' => 'UKRAYNA' ,
      'UNITED ARAB EMIRATES' => 'BİRLEŞİK ARAP EMİRLİKLERİ' ,
      'UNITED KINGDOM' => 'BİRLEŞİK KRALLIK' ,
      'UPPER VOLTA' => 'AŞAĞI VOLTA' ,
      'URUGUAY' => 'URUGUAY' ,
      'US PACIFIC ISLAND' => 'ABD PASİFİK ADALARI' ,
      'US VIRGIN ISLANDS' => 'ABD VİRGİN ADALARI' ,
      'USA' => 'ABD' ,
      'UZBEKISTAN' => 'ÖZBEKİSTAN' ,
      'VANUATU' => 'VANUATU' ,
      'VATICAN CITY' => 'VATİKAN' ,
      'VENEZUELA' => 'VENEZUELA' ,
      'VIETNAM' => 'VIETNAM' ,
      'WAKE ISLAND' => 'WAKE ADASI' ,
      'WEST INDIES' => 'BATI HİNT' ,
      'WESTERN SAHARA' => 'BATI SAHRA' ,
      'YEMEN' => 'YEMEN' ,
      'ZAIRE' => 'ZAIRE' ,
      'ZAMBIA' => 'ZAMBIYA' ,
      'ZIMBABWE' => 'ZIMBABVE',
    );

  $app_list_strings['charset_dom'] = array(
    'BIG-5'     => 'BIG-5 (Tayvan ve Hong Kong)',
    
    
    'CP1251'    => 'CP1251 (MS Slav Alfabesi)',
    'CP1252'    => 'CP1252 (MS Batı Avrupa & ABD)',
    'EUC-CN'    => 'EUC-CN (Basitleştirilmiş Çince GB2312)',
    'EUC-JP'    => 'EUC-JP (Unix Japonca)',
    'EUC-KR'    => 'EUC-KR (Korece)',
    'EUC-TW'    => 'EUC-TW (Tayvan Dili)',
    'ISO-2022-JP' => 'ISO-2022-JP (Japonca)',
    'ISO-2022-KR' => 'ISO-2022-KR (Korece)',
    'ISO-8859-1'  => 'ISO-8859-1 (Batı Avrupa ve ABD)',
    'ISO-8859-2'  => 'ISO-8859-2 (Merkezi ve Doğu Avrupa)',
    'ISO-8859-3'  => 'ISO-8859-3 (Latin 3)',
    'ISO-8859-4'  => 'ISO-8859-4 (Latin 4)',
    'ISO-8859-5'  => 'ISO-8859-5 (Slav Alfabesi)',
    'ISO-8859-6'  => 'ISO-8859-6 (Arapça)',
    'ISO-8859-7'  => 'ISO-8859-7 (Yunanca)',
    'ISO-8859-8'  => 'ISO-8859-8 (Hibru)',
    'ISO-8859-9'  => 'ISO-8859-9 (Latin 5)',
    'ISO-8859-10' => 'ISO-8859-10 (Latin 6)',
    'ISO-8859-13' => 'ISO-8859-13 (Latin 7)',
    'ISO-8859-14' => 'ISO-8859-14 (Latin 8)',
    'ISO-8859-15' => 'ISO-8859-15 (Latin 9)',
    'KOI8-R'    => 'KOI8-R (Slav Alfabesi Rusça)',
    'KOI8-U'    => 'KOI8-U (Slav Alfabesi Ukrayna Dili)',
    'SJIS'      => 'SJIS (MS Japonca)',
    'UTF-8'     => 'UTF-8',
  );

  $app_list_strings['timezone_dom'] = array(

      'Africa/Algiers' => 'Africa/Algiers',
  'Africa/Luanda' => 'Africa/Luanda',
  'Africa/Porto-Novo' => 'Africa/Porto-Novo',
  'Africa/Gaborone' => 'Africa/Gaborone',
  'Africa/Ouagadougou' => 'Africa/Ouagadougou',
  'Africa/Bujumbura' => 'Africa/Bujumbura',
  'Africa/Douala' => 'Africa/Douala',
  'Atlantic/Cape_Verde' => 'Atlantic/Cape_Verde',
  'Africa/Bangui' => 'Africa/Bangui',
  'Africa/Ndjamena' => 'Africa/Ndjamena',
  'Indian/Comoro' => 'Indian/Comoro',
  'Africa/Kinshasa' => 'Africa/Kinshasa',
  'Africa/Lubumbashi' => 'Africa/Lubumbashi',
  'Africa/Brazzaville' => 'Africa/Brazzaville',
  'Africa/Abidjan' => 'Africa/Abidjan',
  'Africa/Djibouti' => 'Africa/Djibouti',
  'Africa/Cairo' => 'Africa/Cairo',
  'Africa/Malabo' => 'Africa/Malabo',
  'Africa/Asmera' => 'Africa/Asmera',
  'Africa/Addis_Ababa' => 'Africa/Addis_Ababa',
  'Africa/Libreville' => 'Africa/Libreville',
  'Africa/Banjul' => 'Africa/Banjul',
  'Africa/Accra' => 'Africa/Accra',
  'Africa/Conakry' => 'Africa/Conakry',
  'Africa/Bissau' => 'Africa/Bissau',
  'Africa/Nairobi' => 'Africa/Nairobi',
  'Africa/Maseru' => 'Africa/Maseru',
  'Africa/Monrovia' => 'Africa/Monrovia',
  'Africa/Tripoli' => 'Africa/Tripoli',
  'Indian/Antananarivo' => 'Indian/Antananarivo',
  'Africa/Blantyre' => 'Africa/Blantyre',
  'Africa/Bamako' => 'Africa/Bamako',
  'Africa/Nouakchott' => 'Africa/Nouakchott',
  'Indian/Mauritius' => 'Indian/Mauritius',
  'Indian/Mayotte' => 'Indian/Mayotte',
  'Africa/Casablanca' => 'Africa/Casablanca',
  'Africa/El_Aaiun' => 'Africa/El_Aaiun',
  'Africa/Maputo' => 'Africa/Maputo',
  'Africa/Windhoek' => 'Africa/Windhoek',
  'Africa/Niamey' => 'Africa/Niamey',
  'Africa/Lagos' => 'Africa/Lagos',
  'Indian/Reunion' => 'Indian/Reunion',
  'Africa/Kigali' => 'Africa/Kigali',
  'Atlantic/St_Helena' => 'Atlantic/St_Helena',
  'Africa/Sao_Tome' => 'Africa/Sao_Tome',
  'Africa/Dakar' => 'Africa/Dakar',
  'Indian/Mahe' => 'Indian/Mahe',
  'Africa/Freetown' => 'Africa/Freetown',
  'Africa/Mogadishu' => 'Africa/Mogadishu',
  'Africa/Johannesburg' => 'Africa/Johannesburg',
  'Africa/Khartoum' => 'Africa/Khartoum',
  'Africa/Mbabane' => 'Africa/Mbabane',
  'Africa/Dar_es_Salaam' => 'Africa/Dar_es_Salaam',
  'Africa/Lome' => 'Africa/Lome',
  'Africa/Tunis' => 'Africa/Tunis',
  'Africa/Kampala' => 'Africa/Kampala',
  'Africa/Lusaka' => 'Africa/Lusaka',
  'Africa/Harare' => 'Africa/Harare',
  'Antarctica/Casey' => 'Antarctica/Casey',
  'Antarctica/Davis' => 'Antarctica/Davis',
  'Antarctica/Mawson' => 'Antarctica/Mawson',
  'Indian/Kerguelen' => 'Indian/Kerguelen',
  'Antarctica/DumontDUrville' => 'Antarctica/DumontDUrville',
  'Antarctica/Syowa' => 'Antarctica/Syowa',
  'Antarctica/Vostok' => 'Antarctica/Vostok',
  'Antarctica/Rothera' => 'Antarctica/Rothera',
  'Antarctica/Palmer' => 'Antarctica/Palmer',
  'Antarctica/McMurdo' => 'Antarctica/McMurdo',
  'Asia/Kabul' => 'Asia/Kabul',
  'Asia/Yerevan' => 'Asia/Yerevan',
  'Asia/Baku' => 'Asia/Baku',
  'Asia/Bahrain' => 'Asia/Bahrain',
  'Asia/Dhaka' => 'Asia/Dhaka',
  'Asia/Thimphu' => 'Asia/Thimphu',
  'Indian/Chagos' => 'Indian/Chagos',
  'Asia/Brunei' => 'Asia/Brunei',
  'Asia/Rangoon' => 'Asia/Rangoon',
  'Asia/Phnom_Penh' => 'Asia/Phnom_Penh',
  'Asia/Beijing' => 'Asia/Beijing',
  'Asia/Harbin' => 'Asia/Harbin',
  'Asia/Shanghai' => 'Asia/Shanghai',
  'Asia/Chongqing' => 'Asia/Chongqing',
  'Asia/Urumqi' => 'Asia/Urumqi',
  'Asia/Kashgar' => 'Asia/Kashgar',
  'Asia/Hong_Kong' => 'Asia/Hong_Kong',
  'Asia/Taipei' => 'Asia/Taipei',
  'Asia/Macau' => 'Asia/Macau',
  'Asia/Nicosia' => 'Asia/Nicosia',
  'Asia/Tbilisi' => 'Asia/Tbilisi',
  'Asia/Dili' => 'Asia/Dili',
  'Asia/Calcutta' => 'Asia/Calcutta',
  'Asia/Jakarta' => 'Asia/Jakarta',
  'Asia/Pontianak' => 'Asia/Pontianak',
  'Asia/Makassar' => 'Asia/Makassar',
  'Asia/Jayapura' => 'Asia/Jayapura',
  'Asia/Tehran' => 'Asia/Tehran',
  'Asia/Baghdad' => 'Asia/Baghdad',
  'Asia/Jerusalem' => 'Asia/Jerusalem',
  'Asia/Tokyo' => 'Asia/Tokyo',
  'Asia/Amman' => 'Asia/Amman',
  'Asia/Almaty' => 'Asia/Almaty',
  'Asia/Qyzylorda' => 'Asia/Qyzylorda',
  'Asia/Aqtobe' => 'Asia/Aqtobe',
  'Asia/Aqtau' => 'Asia/Aqtau',
  'Asia/Oral' => 'Asia/Oral',
  'Asia/Bishkek' => 'Asia/Bishkek',
  'Asia/Seoul' => 'Asia/Seoul',
  'Asia/Pyongyang' => 'Asia/Pyongyang',
  'Asia/Kuwait' => 'Asia/Kuwait',
  'Asia/Vientiane' => 'Asia/Vientiane',
  'Asia/Beirut' => 'Asia/Beirut',
  'Asia/Kuala_Lumpur' => 'Asia/Kuala_Lumpur',
  'Asia/Kuching' => 'Asia/Kuching',
  'Indian/Maldives' => 'Indian/Maldives',
  'Asia/Hovd' => 'Asia/Hovd',
  'Asia/Ulaanbaatar' => 'Asia/Ulaanbaatar',
  'Asia/Choibalsan' => 'Asia/Choibalsan',
  'Asia/Katmandu' => 'Asia/Katmandu',
  'Asia/Muscat' => 'Asia/Muscat',
  'Asia/Karachi' => 'Asia/Karachi',
  'Asia/Gaza' => 'Asia/Gaza',
  'Asia/Manila' => 'Asia/Manila',
  'Asia/Qatar' => 'Asia/Qatar',
  'Asia/Riyadh' => 'Asia/Riyadh',
  'Asia/Singapore' => 'Asia/Singapore',
  'Asia/Colombo' => 'Asia/Colombo',
  'Asia/Damascus' => 'Asia/Damascus',
  'Asia/Dushanbe' => 'Asia/Dushanbe',
  'Asia/Bangkok' => 'Asia/Bangkok',
  'Asia/Ashgabat' => 'Asia/Ashgabat',
  'Asia/Dubai' => 'Asia/Dubai',
  'Asia/Samarkand' => 'Asia/Samarkand',
  'Asia/Tashkent' => 'Asia/Tashkent',
  'Asia/Saigon' => 'Asia/Saigon',
  'Asia/Aden' => 'Asia/Aden',
  'Australia/Darwin' => 'Australia/Darwin',
  'Australia/Perth' => 'Australia/Perth',
  'Australia/Brisbane' => 'Australia/Brisbane',
  'Australia/Lindeman' => 'Australia/Lindeman',
  'Australia/Adelaide' => 'Australia/Adelaide',
  'Australia/Hobart' => 'Australia/Hobart',
  'Australia/Currie' => 'Australia/Currie',
  'Australia/Melbourne' => 'Australia/Melbourne',
  'Australia/Sydney' => 'Australia/Sydney',
  'Australia/Broken_Hill' => 'Australia/Broken_Hill',
  'Indian/Christmas' => 'Indian/Christmas',
  'Pacific/Rarotonga' => 'Pacific/Rarotonga',
  'Indian/Cocos' => 'Indian/Cocos',
  'Pacific/Fiji' => 'Pacific/Fiji',
  'Pacific/Gambier' => 'Pacific/Gambier',
  'Pacific/Marquesas' => 'Pacific/Marquesas',
  'Pacific/Tahiti' => 'Pacific/Tahiti',
  'Pacific/Guam' => 'Pacific/Guam',
  'Pacific/Tarawa' => 'Pacific/Tarawa',
  'Pacific/Enderbury' => 'Pacific/Enderbury',
  'Pacific/Kiritimati' => 'Pacific/Kiritimati',
  'Pacific/Saipan' => 'Pacific/Saipan',
  'Pacific/Majuro' => 'Pacific/Majuro',
  'Pacific/Kwajalein' => 'Pacific/Kwajalein',
  'Pacific/Truk' => 'Pacific/Truk',
  'Pacific/Ponape' => 'Pacific/Ponape',
  'Pacific/Kosrae' => 'Pacific/Kosrae',
  'Pacific/Nauru' => 'Pacific/Nauru',
  'Pacific/Noumea' => 'Pacific/Noumea',
  'Pacific/Auckland' => 'Pacific/Auckland',
  'Pacific/Chatham' => 'Pacific/Chatham',
  'Pacific/Niue' => 'Pacific/Niue',
  'Pacific/Norfolk' => 'Pacific/Norfolk',
  'Pacific/Palau' => 'Pacific/Palau',
  'Pacific/Port_Moresby' => 'Pacific/Port_Moresby',
  'Pacific/Pitcairn' => 'Pacific/Pitcairn',
  'Pacific/Pago_Pago' => 'Pacific/Pago_Pago',
  'Pacific/Apia' => 'Pacific/Apia',
  'Pacific/Guadalcanal' => 'Pacific/Guadalcanal',
  'Pacific/Fakaofo' => 'Pacific/Fakaofo',
  'Pacific/Tongatapu' => 'Pacific/Tongatapu',
  'Pacific/Funafuti' => 'Pacific/Funafuti',
  'Pacific/Johnston' => 'Pacific/Johnston',
  'Pacific/Midway' => 'Pacific/Midway',
  'Pacific/Wake' => 'Pacific/Wake',
  'Pacific/Efate' => 'Pacific/Efate',
  'Pacific/Wallis' => 'Pacific/Wallis',
  'Europe/London' => 'Europe/London',
  'Europe/Dublin' => 'Europe/Dublin',
  'WET' => 'WET',
  'CET' => 'CET',
  'MET' => 'MET',
  'EET' => 'EET',
  'Europe/Tirane' => 'Europe/Tirane',
  'Europe/Andorra' => 'Europe/Andorra',
  'Europe/Vienna' => 'Europe/Vienna',
  'Europe/Minsk' => 'Europe/Minsk',
  'Europe/Brussels' => 'Europe/Brussels',
  'Europe/Sofia' => 'Europe/Sofia',
  'Europe/Prague' => 'Europe/Prague',
  'Europe/Copenhagen' => 'Europe/Copenhagen',
  'Atlantic/Faeroe' => 'Atlantic/Faeroe',
  'America/Danmarkshavn' => 'America/Danmarkshavn',
  'America/Scoresbysund' => 'America/Scoresbysund',
  'America/Godthab' => 'America/Godthab',
  'America/Thule' => 'America/Thule',
  'Europe/Tallinn' => 'Europe/Tallinn',
  'Europe/Helsinki' => 'Europe/Helsinki',
  'Europe/Paris' => 'Europe/Paris',
  'Europe/Berlin' => 'Europe/Berlin',
  'Europe/Gibraltar' => 'Europe/Gibraltar',
  'Europe/Athens' => 'Europe/Athens',
  'Europe/Budapest' => 'Europe/Budapest',
  'Atlantic/Reykjavik' => 'Atlantic/Reykjavik',
  'Europe/Rome' => 'Europe/Rome',
  'Europe/Riga' => 'Europe/Riga',
  'Europe/Vaduz' => 'Europe/Vaduz',
  'Europe/Vilnius' => 'Europe/Vilnius',
  'Europe/Luxembourg' => 'Europe/Luxembourg',
  'Europe/Malta' => 'Europe/Malta',
  'Europe/Chisinau' => 'Europe/Chisinau',
  'Europe/Monaco' => 'Europe/Monaco',
  'Europe/Amsterdam' => 'Europe/Amsterdam',
  'Europe/Oslo' => 'Europe/Oslo',
  'Europe/Warsaw' => 'Europe/Warsaw',
  'Europe/Lisbon' => 'Europe/Lisbon',
  'Atlantic/Azores' => 'Atlantic/Azores',
  'Atlantic/Madeira' => 'Atlantic/Madeira',
  'Europe/Bucharest' => 'Europe/Bucharest',
  'Europe/Kaliningrad' => 'Europe/Kaliningrad',
  'Europe/Moscow' => 'Europe/Moscow',
  'Europe/Samara' => 'Europe/Samara',
  'Asia/Yekaterinburg' => 'Asia/Yekaterinburg',
  'Asia/Omsk' => 'Asia/Omsk',
  'Asia/Novosibirsk' => 'Asia/Novosibirsk',
  'Asia/Krasnoyarsk' => 'Asia/Krasnoyarsk',
  'Asia/Irkutsk' => 'Asia/Irkutsk',
  'Asia/Yakutsk' => 'Asia/Yakutsk',
  'Asia/Vladivostok' => 'Asia/Vladivostok',
  'Asia/Sakhalin' => 'Asia/Sakhalin',
  'Asia/Magadan' => 'Asia/Magadan',
  'Asia/Kamchatka' => 'Asia/Kamchatka',
  'Asia/Anadyr' => 'Asia/Anadyr',
  'Europe/Belgrade' => 'Europe/Belgrade' ,
  'Europe/Madrid' =>'Europe/Madrid' ,
  'Africa/Ceuta' => 'Africa/Ceuta',
  'Atlantic/Canary' => 'Atlantic/Canary',
  'Europe/Stockholm' => 'Europe/Stockholm',
  'Europe/Zurich' => 'Europe/Zurich' ,
  'Europe/Istanbul' => 'Europe/Istanbul',
  'Europe/Kiev' => 'Europe/Kiev',
  'Europe/Uzhgorod' => 'Europe/Uzhgorod',
  'Europe/Zaporozhye' => 'Europe/Zaporozhye',
  'Europe/Simferopol' => 'Europe/Simferopol',
  'America/New_York' => 'America/New_York',
  'America/Chicago' =>'America/Chicago' ,
  'America/North_Dakota/Center' => 'America/North_Dakota/Center',
  'America/Denver' => 'America/Denver',
  'America/Los_Angeles' => 'America/Los_Angeles',
  'America/Juneau' => 'America/Juneau',
  'America/Yakutat' => 'America/Yakutat',
  'America/Anchorage' => 'America/Anchorage',
  'America/Nome' =>'America/Nome' ,
  'America/Adak' => 'America/Adak',
  'Pacific/Honolulu' => 'Pacific/Honolulu',
  'America/Phoenix' => 'America/Phoenix',
  'America/Boise' => 'America/Boise',
  'America/Indiana/Indianapolis' => 'America/Indiana/Indianapolis',
  'America/Indiana/Marengo' => 'America/Indiana/Marengo',
  'America/Indiana/Knox' =>  'America/Indiana/Knox',
  'America/Indiana/Vevay' => 'America/Indiana/Vevay',
  'America/Kentucky/Louisville' =>'America/Kentucky/Louisville'  ,
  'America/Kentucky/Monticello' =>  'America/Kentucky/Monticello' ,
  'America/Detroit' => 'America/Detroit',
  'America/Menominee' => 'America/Menominee',
  'America/St_Johns' => 'America/St_Johns',
  'America/Goose_Bay' => 'America/Goose_Bay' ,
  'America/Halifax' => 'America/Halifax',
  'America/Glace_Bay' =>'America/Glace_Bay' ,
  'America/Montreal' => 'America/Montreal',
  'America/Toronto' => 'America/Toronto',
  'America/Thunder_Bay' => 'America/Thunder_Bay' ,
  'America/Nipigon' => 'America/Nipigon',
  'America/Rainy_River' => 'America/Rainy_River',
  'America/Winnipeg' => 'America/Winnipeg',
  'America/Regina' => 'America/Regina',
  'America/Swift_Current' => 'America/Swift_Current',
  'America/Edmonton' =>  'America/Edmonton',
  'America/Vancouver' => 'America/Vancouver',
  'America/Dawson_Creek' => 'America/Dawson_Creek',
  'America/Pangnirtung' => 'America/Pangnirtung'  ,
  'America/Iqaluit' => 'America/Iqaluit' ,
  'America/Coral_Harbour' => 'America/Coral_Harbour' ,
  'America/Rankin_Inlet' => 'America/Rankin_Inlet',
  'America/Cambridge_Bay' => 'America/Cambridge_Bay',
  'America/Yellowknife' => 'America/Yellowknife',
  'America/Inuvik' =>'America/Inuvik' ,
  'America/Whitehorse' => 'America/Whitehorse' ,
  'America/Dawson' => 'America/Dawson',
  'America/Cancun' => 'America/Cancun',
  'America/Merida' => 'America/Merida',
  'America/Monterrey' => 'America/Monterrey',
  'America/Mexico_City' => 'America/Mexico_City',
  'America/Chihuahua' => 'America/Chihuahua',
  'America/Hermosillo' => 'America/Hermosillo',
  'America/Mazatlan' => 'America/Mazatlan',
  'America/Tijuana' => 'America/Tijuana',
  'America/Anguilla' => 'America/Anguilla',
  'America/Antigua' => 'America/Antigua',
  'America/Nassau' =>'America/Nassau' ,
  'America/Barbados' => 'America/Barbados',
  'America/Belize' => 'America/Belize',
  'Atlantic/Bermuda' => 'Atlantic/Bermuda',
  'America/Cayman' => 'America/Cayman',
  'America/Costa_Rica' => 'America/Costa_Rica',
  'America/Havana' => 'America/Havana',
  'America/Dominica' => 'America/Dominica',
  'America/Santo_Domingo' => 'America/Santo_Domingo',
  'America/El_Salvador' => 'America/El_Salvador',
  'America/Grenada' => 'America/Grenada',
  'America/Guadeloupe' => 'America/Guadeloupe',
  'America/Guatemala' => 'America/Guatemala',
  'America/Port-au-Prince' => 'America/Port-au-Prince',
  'America/Tegucigalpa' => 'America/Tegucigalpa',
  'America/Jamaica' => 'America/Jamaica',
  'America/Martinique' => 'America/Martinique',
  'America/Montserrat' => 'America/Montserrat',
  'America/Managua' => 'America/Managua',
  'America/Panama' => 'America/Panama',
  'America/Puerto_Rico' =>'America/Puerto_Rico' ,
  'America/St_Kitts' => 'America/St_Kitts',
  'America/St_Lucia' => 'America/St_Lucia',
  'America/Miquelon' => 'America/Miquelon',
  'America/St_Vincent' => 'America/St_Vincent',
  'America/Grand_Turk' => 'America/Grand_Turk',
  'America/Tortola' => 'America/Tortola',
  'America/St_Thomas' => 'America/St_Thomas',
  'America/Argentina/Buenos_Aires' => 'America/Argentina/Buenos_Aires',
  'America/Argentina/Cordoba' => 'America/Argentina/Cordoba',
  'America/Argentina/Tucuman' => 'America/Argentina/Tucuman',
  'America/Argentina/La_Rioja' => 'America/Argentina/La_Rioja',
  'America/Argentina/San_Juan' => 'America/Argentina/San_Juan',
  'America/Argentina/Jujuy' => 'America/Argentina/Jujuy',
  'America/Argentina/Catamarca' => 'America/Argentina/Catamarca',
  'America/Argentina/Mendoza' => 'America/Argentina/Mendoza',
  'America/Argentina/Rio_Gallegos' => 'America/Argentina/Rio_Gallegos',
  'America/Argentina/Ushuaia' =>  'America/Argentina/Ushuaia',
  'America/Aruba' => 'America/Aruba',
  'America/La_Paz' => 'America/La_Paz',
  'America/Noronha' => 'America/Noronha',
  'America/Belem' => 'America/Belem',
  'America/Fortaleza' => 'America/Fortaleza',
  'America/Recife' => 'America/Recife',
  'America/Araguaina' => 'America/Araguaina',
  'America/Maceio' => 'America/Maceio',
  'America/Bahia' => 'America/Bahia',
  'America/Sao_Paulo' => 'America/Sao_Paulo',
  'America/Campo_Grande' => 'America/Campo_Grande',
  'America/Cuiaba' => 'America/Cuiaba',
  'America/Porto_Velho' => 'America/Porto_Velho',
  'America/Boa_Vista' => 'America/Boa_Vista',
  'America/Manaus' => 'America/Manaus',
  'America/Eirunepe' => 'America/Eirunepe',
  'America/Rio_Branco' => 'America/Rio_Branco',
  'America/Santiago' => 'America/Santiago',
  'Pacific/Easter' => 'Pacific/Easter' ,
  'America/Bogota' => 'America/Bogota',
  'America/Curacao' => 'America/Curacao',
  'America/Guayaquil' => 'America/Guayaquil',
  'Pacific/Galapagos' => 'Pacific/Galapagos' ,
  'Atlantic/Stanley' => 'Atlantic/Stanley',
  'America/Cayenne' => 'America/Cayenne',
  'America/Guyana' => 'America/Guyana',
  'America/Asuncion' => 'America/Asuncion',
  'America/Lima' => 'America/Lima',
  'Atlantic/South_Georgia' => 'Atlantic/South_Georgia',
  'America/Paramaribo' => 'America/Paramaribo',
  'America/Port_of_Spain' => 'America/Port_of_Spain',
  'America/Montevideo' => 'America/Montevideo',
  'America/Caracas' => 'America/Caracas',
  );

?>




