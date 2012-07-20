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
















	
$app_list_strings = array (
   'language_pack_name' => 'Japanese',
  'moduleList' =>
  array (
    'Home' => 'ホーム',
    'Bugs' => 'バグトラッカー',
    'Cases' => 'ケース',
    'Notes' => 'メモ',
    'Newsletters' => 'ニュースレター',
    'Teams' => 'チーム',
    'Users' => 'ユーザ',
    'KBDocuments' => 'ナレッジベース',
    'FAQ' => 'FAQ', 
        ),
  'moduleListSingular' =>
  array (
    'Home' => 'Home',
    'Bugs' => 'Bug',
    'Cases' => 'Case',
    'Notes' => 'Note',
    'Teams' => 'Team',
    'Users' => 'User'
        ),        

  'checkbox_dom'=> array(
  	''=>'',
  	'1'=>'はい',
  	'2'=>'いいえ',
  ),
          
  'account_type_dom' =>
  array (
    '' => '',
    'Analyst' => 'アナリスト',
    'Competitor' => '競合企業',
    'Customer' => '顧客',
    'Integrator' => 'インテグレータ',
    'Investor' => '投資家',
    'Partner' => 'パートナー',
    'Press' => '報道関係者',
    'Prospect' => '見込顧客',
    'Reseller' => 'リセラー',
    'Other' => 'その他',
  ),

  'industry_dom' =>
  array (
    '' => '',
    'Apparel' => 'アパレル',
    'Banking' => '銀行',
    'Biotechnology' => 'バイオテクノロジー',
    'Chemicals' => '化学',
    'Communications' => '通信',
    'Construction' => '建設',
    'Consulting' => 'コンサルティング',
    'Education' => '教育',
    'Electronics' => '電気',
    'Energy' => 'エネルギー',
    'Engineering' => 'エンジニアリング',
    'Entertainment' => '娯楽',
    'Environmental' => '環境',
    'Finance' => '金融',
    'Government' => '政府機関',
    'Healthcare' => '医療',
    'Hospitality' => 'サービス',
    'Insurance' => '保険',
    'Machinery' => '機械',
    'Manufacturing' => '製造',
    'Media' => 'メディア',
    'Not For Profit' => '非営利',
    'Recreation' => 'レジャー',
    'Retail' => '小売',
    'Shipping' => '配送',
    'Technology' => 'テクノロジー',
    'Telecommunications' => '電話',
    'Transportation' => '輸送',
    'Utilities' => '公共',
    'Other' => 'その他',
  ),
  'lead_source_default_key' => 'Self Generated',
  'lead_source_dom' =>
  array (
    '' => '',
    'Cold Call' => '勧誘電話',
    'Existing Customer' => '既存顧客',
    'Self Generated' => '自動発生',
    'Employee' => '社員',
    'Partner' => 'パートナー',
    'Public Relations' => '広報活動',
    'Direct Mail' => 'ダイレクトメール',
    'Conference' => 'カンファレンス',
    'Trade Show' => '展示会',
    'Web Site' => 'Webサイト',
    'Word of mouth' => '口コミ',
    'Email' => '電子メール',
    'Other' => 'その他',
  ),
  'opportunity_type_dom' =>
  array (
    '' => '',
    'Existing Business' => '既存ビジネス',
    'New Business' => '新規ビジネス',
  ),
  //Note:  do not translate opportunity_relationship_type_default_key
//       it is the key for the default opportunity_relationship_type_dom value
  'opportunity_relationship_type_default_key' => 'Primary Decision Maker',
  'opportunity_relationship_type_dom' =>
  array (
    '' => '',
    'Primary Decision Maker' => '主要意思決定者',
    'Business Decision Maker' => '事業意思決定者',
    'Business Evaluator' => '事業評価担当者',
    'Technical Decision Maker' => '技術職意思決定者',
    'Technical Evaluator' => '技術評価担当者',
    'Executive Sponsor' => '役員',
    'Influencer' => '影響力あり',
    'Other' => 'その他',
  ),
  //Note:  do not translate case_relationship_type_default_key
//       it is the key for the default case_relationship_type_dom value
  'case_relationship_type_default_key' => 'Primary Contact',
  'case_relationship_type_dom' =>
  array (
    '' => '',
    'Primary Contact' => '取引先責任者',
    'Alternate Contact' => '取引先担当者',
  ),
  'payment_terms' =>
  array (
  	'' => '', 
	'Net 15' => '15日以内',
	'Net 30' => '30日以内',
    'Next' => '翌月末',
    'NextNext' => '翌々月末',
  ),  
  'sales_stage_default_key' => 'Prospecting',
  'sales_stage_dom' =>
  array (
    'Prospecting' => '引き合い',
    'Qualification' => '見込み',
    'Needs Analysis' => 'ニーズ分析',
    'Value Proposition' => '提案中',
    'Id. Decision Makers' => '意思決定者確認中',
    'Perception Analysis' => '顧客評価中',
    'Proposal/Price Quote' => '最終提案/見積中',
    'Negotiation/Review' => '交渉/確認中',
    'Closed Won' => '受注',
    'Closed Lost' => '失注',
  ),
  'sales_probability_dom' => // keys must be the same as sales_stage_dom
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
    'Closed Lost' => '0',
  ),
  'activity_dom' =>
  array (
    'Call' => '電話',
    'Meeting' => '会議',
    'Task' => 'タスク',
    'Email' => '電子メール',
    'Note' => 'メモ',
  ),
  'salutation_dom' =>
  array (
     '' => '',
    'Mr.' => '様',
    'Ms.' => 'Ms.',
    'Mrs.' => 'Mrs.',
    'Dr.' => '先生',
    'Prof.' => '教授',
  ),
  //time is in seconds; the greater the time the longer it takes;
  'reminder_max_time'=>3600,
  'reminder_time_options' => array( 60=> '1分前',
  								  300=> '5分前',
  								  600=> '10分前',
  								  900=> '15分前',
  								  1800=> '30分前',
  								  3600=> '1時間前',
								 ),

  'task_priority_default' => 'Medium',
  'task_priority_dom' =>
  array (
    'High' => '高',
    'Medium' => '中',
    'Low' => '低',
  ),
  'task_status_default' => 'Not Started',
  'task_status_dom' =>
  array (
    'Not Started' => '未開始',
    'In Progress' => '進行中',
    'Completed' => '完了',
    'Pending Input' => '保留',
    'Deferred' => '延期',
  ),
  'meeting_status_default' => 'Planned',
  'meeting_status_dom' =>
  array (
    'Planned' => '計画済み',
    'Held' => '完了',
    'Not Held' => '未実施',
  ),
  'call_status_default' => 'Planned',
  'call_status_dom' =>
  array (
    'Planned' => '計画済み',
    'Held' => '完了',
    'Not Held' => '未実施',
  ),
  'call_direction_default' => 'Outbound',
  'call_direction_dom' =>
  array (
    'Inbound' => '受信',
    'Outbound' => '送信',
  ),
  'lead_status_dom' =>
  array (
    '' => '',
    'New' => '新規',
    'Assigned' => 'アサイン済み',
    'In Process' => '進行中',
    'Converted' => 'コンバート済み',
    'Recycled' => '戻し',
    'Dead' => 'デッド',
  ),
  'lead_status_noblank_dom' =>
  array (
    'New' => '新規',
    'Assigned' => 'アサイン済み',
    'In Process' => '進行中',
    'Converted' => 'コンバート済',
    'Recycled' => '戻し',
    'Dead' => 'デッド',
  ),
  //Note:  do not translate case_status_default_key
//       it is the key for the default case_status_dom value
  'case_status_default_key' => 'New',
  'case_status_dom' =>
  array (
    'New' => '新規',
    'Assigned' => 'アサイン済み',
    'Closed' => '完了',
    'Pending Input' => '保留',
    'Rejected' => '拒否',
    'Duplicate' => '重複',
  ),
  'case_priority_default_key' => 'P2',
  'case_priority_dom' =>
  array (
    'P1' => '高',
    'P2' => '中',
    'P3' => '低',
  ),
  'user_status_dom' =>
  array (
    'Active' => 'アクティブ',
    'Inactive' => '非アクティブ',
  ),
  'employee_status_dom' =>
  array (
    'Active' => 'アクティブ',
    'Terminated' => '退職',
    'Leave of Absence' => '休職',
  ),
  'messenger_type_dom' =>
  array (
    '' => '',
    'MSN' => 'MSN',
    'Yahoo!' => 'Yahoo!',
    'AOL' => 'AOL',
  ),

	'project_task_priority_options' => array (
		'High' => '高',
		'Medium' => '中',
		'Low' => '低',
	),
	'project_task_status_options' => array (
		'Not Started' => '未開始',
		'In Progress' => '進行中',
		'Completed' => '完了',
		'Pending Input' => '保留',
		'Deferred' => '延期',
	),
	'project_task_utilization_options' => array (
		'0' => 'なし',
		'25' => '25',
		'50' => '50',
		'75' => '75',
		'100' => '100',
	),
  //Note:  do not translate record_type_default_key
//       it is the key for the default record_type_module value
  'record_type_default_key' => 'Accounts',
  'record_type_display' =>
  array (
    '' => '',
    'Accounts' => '取引先',
    'Opportunities' => '商談',
    'Cases' => 'ケース',
    'Leads' => 'リード',
    'Contacts' => '取引先担当者', // cn (11/22/2005) added to support Emails
    'ProductTemplates' => '商品',
    'Quotes' => '見積',
    'Bugs' => 'バグトラッカー',
    'Project' => 'プロジェクト',
    'ProjectTask' => 'プロジェクトタスク',
    'Tasks' => 'タスク',
    '' => '',  // OSC追加
  ),

  'record_type_display_notes' =>
  array (
    'Accounts' => '取引先',
	'Contacts' => '取引先担当者',
    'Opportunities' => '商談',
    'Cases' => 'ケース',
    'Leads' => 'リード',
    'ProductTemplates' => '商品',
    'Quotes' => '見積',
    'Products' => '商品',
    'Contracts' => '契約',
    'Bugs' => 'バグトラッカー',
    'Emails' => '電子メール',
    'Project' => 'プロジェクト',
    'ProjectTask' => 'プロジェクトタスク',
    'Meetings' => '会議',
    'Calls' => '電話'
  ),

  'product_status_default_key' => 'Ship',
  'product_status_quote_key' => 'Quotes',
  'product_status_dom' =>
  array (
    'Quotes' => '見積完了',
    'Orders' => '注文完了',
    'Ship' => '出荷完了',
  ),


  'pricing_formula_default_key' => 'Fixed',
  'pricing_formula_dom' =>
  array (
    'Fixed' => '固定価格',
    'ProfitMargin' => '利益率',
    'PercentageMarkup' => '積み上げ率',
    'PercentageDiscount' => '値下げ率',
    'IsList' => '表示価格と同じ',
  ),
  'product_template_status_dom' =>
  array (
    'Available' => '在庫あり',
    'Unavailable' => '在庫切れ',
  ),
  'tax_class_dom' =>
  array (
    'Taxable' => '課税',
    'Non-Taxable' => '非課税',
  ),
  'support_term_dom' =>
  array (
    '+6 months' => '6ヵ月',
    '+1 year' => '1年',
    '+2 years' => '2年',
  ),
	
  'quote_type_dom' =>
  array (
    'Quotes' => '見積',
    'Orders' => '注文',
  ),
  'default_quote_stage_key' => 'Draft',
  'quote_stage_dom' =>
  array (
    'Draft' => 'ドラフト',
    'Negotiation' => '交渉中',
    'Delivered' => '出荷済み',
    'On Hold' => '保留中',
    'Confirmed' => '確認済み',
    'Closed Accepted' => '完了',
    'Closed Lost' => '失注',
    'Closed Dead' => '非商談',
  ),
  'default_order_stage_key' => 'Pending',
  'order_stage_dom' =>
  array (
    'Pending' => '処理中',
    'Confirmed' => '確認済み',
    'On Hold' => '保留中',
    'Shipped' => '出荷済み',
    'Cancelled' => 'キャンセル',
  ),

//Note:  do not translate quote_relationship_type_default_key
//       it is the key for the default quote_relationship_type_dom value
  'quote_relationship_type_default_key' => 'Primary Decision Maker',
  'quote_relationship_type_dom' =>
  array (
    '' => '',
    'Primary Decision Maker' => '主要意思決定者',
    'Business Decision Maker' => '事業意思決定者',
    'Business Evaluator' => '事業評価担当者',
    'Technical Decision Maker' => '技術職意思決定者',
    'Technical Evaluator' => '技術評価担当者',
    'Executive Sponsor' => '役員',
    'Influencer' => 'インフルエンサ',
    'Other' => 'その他',
  ),
  'layouts_dom' =>
  array (
    'Standard' => '見積書',
    'Invoice' => '請求書',
    'Terms' => '支払条件'
  ),

  'bug_priority_default_key' => 'Medium',
  'bug_priority_dom' =>
  array (
    'Urgent' => '緊急',
    'High' => '高',
    'Medium' => '中',
    'Low' => '低',
  ),
   'bug_resolution_default_key' => '',
  'bug_resolution_dom' =>
  array (
  	'' => '',
  	'Accepted' => '承諾',
    'Duplicate' => '重複',
    'Fixed' => '修正済み',
    'Out of Date' => '期限切れ',
    'Invalid' => '無効',
    'Later' => '後回し',
  ),
  'bug_status_default_key' => 'New',
  'bug_status_dom' =>
  array (
    'New' => '新規',
    'Assigned' => 'アサイン済み',
    'Closed' => '完了',
    'Pending' => '保留',
    'Rejected' => '拒否',
  ),
   'bug_type_default_key' => 'Bug',
  'bug_type_dom' =>
  array (
    'Defect' => '不具合',
    'Feature' => '仕様',
  ),

  'source_default_key' => '',
  'source_dom' =>
  array (
	'' => '',
  	'Internal' => '内部',
  	'Forum' => 'フォーラム',
  	'Web' => 'Web',
  	'InboundEmail' => '電子メール',
  ),

  'product_category_default_key' => '',
  'product_category_dom' =>
  array (
	'' => '',
  	'Accounts' => '取引先',
  	'Activities' => '活動',
  	'Bug Tracker' => 'バグトラッカー',
  	'Calendar' => 'カレンダー',
  	'Calls' => '電話',
  	'Campaigns' => 'キャンペーン',  	
  	'Cases' => 'ケース',
  	'Contacts' => '取引先担当者',
  	'Currencies' => '通貨',
  	'Dashboard' => 'ダッシュボード',
  	'Documents' => 'ドキュメント',
  	'Emails' => '電子メール',
  	'Feeds' => 'RSSフィード',
  	'Forecasts' => '予算',  	
  	'Help' => 'ヘルプ',
  	'Home' => 'ホーム',
  	'Leads' => 'リード',
  	'Meetings' => '会議',
  	'Notes' => 'メモ',
  	'Opportunities' => '商談',
  	'Outlook Plugin' => 'Outlookプラグイン',
  	'Product Catalog' => '商品カタログ',  	
  	'Products' => '商品',  	
  	'Projects' => 'プロジェクト',  	
  	'Quotes' => '見積',
  	'Releases' => 'リリース',
  	'RSS' => 'RSSフィード',
  	'Studio' => 'スタジオ',
  	'Upgrade' => 'アップグレード',
  	'Users' => 'ユーザ',
  ),

  /*Added entries 'Queued' and 'Sending' for 4.0 release..*/
  'campaign_status_dom' =>
  array (
    	'' => '',
        'Planning' => '計画中',
        'Active' => 'アクティブ',
        'Inactive' => '非アクティブ',
        'Complete' => '完了',
        'In Queue' => 'キュー待ち',
        'Sending'=> '送信中',
  ),
  'campaign_type_dom' =>
  array (
        '' => '',
        'Telesales' => '電話営業',
        'Mail' => 'ダイレクトメール',
        'Email' => '電子メール',
        'Print' => '印刷',
        'Web' => 'Web',
        'Radio' => 'ラジオ',
        'Television' => 'テレビ',
        ),



  'notifymail_sendtype' =>
  array (
    'SMTP' => 'SMTP',
  ),
  'dom_timezones' => array('-12'=>'(GMT - 12) 日付変更線西側',
  							'-11'=>'(GMT - 11) サモア ミッドウェー島',
  							'-10'=>'(GMT - 10) ハワイ',
  							'-9'=>'(GMT - 9) アラスカ',
  							'-8'=>'(GMT - 8) サンフランシスコ',
  							'-7'=>'(GMT - 7) フェニックス',
  							'-6'=>'(GMT - 6) サスカチェワン',
  							'-5'=>'(GMT - 5) ニューヨーク',
  							'-4'=>'(GMT - 4) サンチャゴ',
  							'-3'=>'(GMT - 3) ブエノスアイレス',
  							'-2'=>'(GMT - 2) 中央大西洋',
  							'-1'=>'(GMT - 1) アゾレス諸島',
  							'0'=>'(GMT)',
  							'1'=>'(GMT + 1) マドリッド',
  							'2'=>'(GMT + 2) アテネ',
  							'3'=>'(GMT + 3) モスクワ',
  							'4'=>'(GMT + 4) カブール',
  							'5'=>'(GMT + 5) エカチェリンブルグ',
  							'6'=>'(GMT + 6) アスタナ',
  							'7'=>'(GMT + 7) バンコク',
  							'8'=>'(GMT + 8) パース',
  							'9'=>'(GMT + 9) 日本',
  							'10'=>'(GMT + 10) ブリスベン',
  							'11'=>'(GMT + 11) ソロモン諸島',
  							'12'=>'(GMT + 12) オークランド',
  							),
      'dom_cal_month_long'=>array(
                '0'=>"",
                '1'=>"1月",
                '2'=>"2月",
                '3'=>"3月",
                '4'=>"4月",
                '5'=>"5月",
                '6'=>"6月",
                '7'=>"7月",
                '8'=>"8月",
                '9'=>"9月",
                '10'=>"10月",
                '11'=>"11月",
                '12'=>"12月",
        ),

        'dom_report_types'=>array(
                'tabular'=>'表形式レポート',
                'summary'=>'集計レポート',
                'detailed_summary'=>'詳細集計レポート',

        ),
	'dom_email_types'=> array(
		'out'		=> '送信済み',
		'archived'	=> '保存済み',
		'draft'		=> 'ドラフト',
		'inbound'	=> 'インバウンド',
	),
	'dom_email_status' => array (
		'archived'	=> '保存済み',
		'closed'	=> '完了',
		'draft'		=> 'ドラフト',
		'read'		=> '既読',
		'replied'	=> '返信済み',
		'sent'		=> '送信済み',
		'send_error'=> '送信エラー',
		'unread'	=> '未読',
	),
		
	'dom_email_server_type' => array(	''			=> '--なし--',
										'imap'		=> 'IMAP',
										'pop3'		=> 'POP3',
	),
	'dom_mailbox_type'		=> array(/*''			=> '--None Specified--',*/
									 'pick'		=> '作成[任意]',
									 'bug'		=> 'バグ作成',
					 				 'support'	=> 'ケース作成',
					 				 'contact'  => '取引先担当者作成',
					 				 'sales'	=> 'リード作成',
					 				 'task'		=> 'タスク作成',
					 				 'bounce'	=> 'バウンス処理',
	),
	'dom_email_distribution'=> array(''				=> '--なし--',
									 'direct'		=> 'ユーザを直接アサイン',
									 'roundRobin'	=> 'ユーザを均等にアサイン',
									 'leastBusy'	=> '稼働率の低いユーザにアサイン',
	),
	'dom_email_errors'		=> array(1 => '直接アサインの場合はユーザは1人のみ選択',
									 2 => '直接アサインの場合はチェックされたアイテムのみアサイン',
	),
	'dom_email_bool'		=> array('bool_true' => 'はい',
								 	 'bool_false' => 'いいえ',
	),
	'dom_int_bool'			=> array(1 => 'はい',
								 	 0 => 'いいえ',
	),
	'dom_switch_bool'		=> array ('on' => 'はい',
										'off' => 'いいえ',
										'' => 'いいえ', ),
	'dom_email_link_type'	=> array(	''			=> 'システムデフォルトのメールクライアント',
										'sugar'		=> 'SugarCRMメールクライアント',
										'mailto'	=> '外部メールクライアント'),

	'dom_email_editor_option'=> array(	''			=> 'デフォルトメールフォーマット',
										'html'		=> 'HTMLメール',
										'plain'		=> 'プレーンテキストメール'),

	
	'schedulers_times_dom'	=> array(	'not run'		=> '実行時間を経過、未実施',
										'ready'			=> '準備完了',
										'in progress'	=> '処理中',
										'failed'		=> '失敗',
										'completed'		=> '完了',
										'no curl'		=> '実行不可: cURLライブラリがありません',
	),

	'forecast_schedule_status_dom' =>
  	array (
    'Active' => 'アクティブ',
    'Inactive' => '非アクティブ',
  ),
	'forecast_type_dom' =>
  	array (
    'Direct' => 'ダイレクト',
    'Rollup' => 'ロールアップ',
  ),  
	
	'document_category_dom' =>
  	array (
  	'' => '',
    'Marketing' => 'マーケティング',
    'Knowledege Base' => 'ナレッジベース',
    'Sales' => '営業',    
  ),  

	'document_subcategory_dom' =>
  	array (
  	'' => '',
    'Marketing Collateral' => 'マーケティング資料',
    'Product Brochures' => '製品パンフレット',
	'FAQ' => 'FAQ',
  ),  
  
	'document_status_dom' =>
  	array (
    'Active' => 'アクティブ',
    'Draft' => 'ドラフト',
	'FAQ' => 'FAQ',
	'Expired' => '期限切れ',
	'Under Review' => 'レビュー中',
	'Pending' => '待機',
  ),
  'document_template_type_dom' =>
  array(
  	''=>'',
  	'mailmerge'=>'メールマージ',
  	'eula'=>'EULA',
  	'nda'=>'NDA',
  	'license'=>'ライセンス契約',
  ),
	'dom_meeting_accept_options' =>
  	array (
	'accept' => '承諾',
	'decline' => '拒否',
	'tentative' => '仮',
  ),
	'dom_meeting_accept_status' =>
  	array (
	'accept' => '承諾',
	'decline' => '拒否',
	'tentative' => '仮',
	'none'		=> 'なし',
  ),
  'query_calc_oper_dom' =>
      array (
	'+' => '(+) 足す',
	'-' => '(-) 引く',
	'*' => '(X) 掛ける',
	'/' => '(/) 割る',
  ), 
  'wflow_type_dom' =>
        array (
    'Normal' => 'レコード保存時',
	'Time' => '時間経過後',
  ),
  'mselect_type_dom' =>
        array (
   'Equals' => '同じ',
	'in' => '含まれる',
  ),
   'cselect_type_dom' =>
        array (
    'Equals' => '等しい',
	'Does not Equal' => '等しくない' ,
  ),
   'dselect_type_dom' =>
        array (
    'Equals' => '等しい',
	'Less Than' => '未満',
	'More Than' => '以上' ,
	'Does not Equal' => '等しくない',
  ),
   'bselect_type_dom' =>
        array (
    'bool_true' => 'はい',
	'bool_false' => 'いいえ',
  ),
    'bopselect_type_dom' =>
        array (
    'Equals' => '等しい',
  ),
    'tselect_type_dom' =>
        array (
    '0'		=>	'0時間',    
    '14440' => '4時間',
    '28800' => '8時間',
    '43200' => '12時間',
    '86400' => '1日',
    '172800' => '2日',
    '259200' => '3日',
    '345600' => '4日',
    '432000' => '5日',
    '604800' => '1週間',
    '1209600' => '2週間',
    '1814400' => '3週間',
    '2592000' => '30日',
    '5184000' => '60日',
    '7776000' => '90日',
    '10368000' => '120日',
    '12960000' => '150日',
    '15552000' => '180日',
  ),
      'dtselect_type_dom' =>
        array (
    'More Than' => '以上',
    'Less Than' => '未満',
  ),
        'wflow_alert_type_dom' =>
        array (
    'Email' => '電子メール' ,
    'Invite' => '招待',
  ),
        'wflow_source_type_dom' =>
        array (
    'Normal Message' => '通常メッセージ',
    'Custom Template' => 'カスタムテンプレート',
    'System Default' => 'システムデフォルト',
  ),
          'wflow_user_type_dom' =>
        array (
    'current_user' => '現在のユーザ',
    'rel_user' => '関連ユーザ',
    'rel_user_custom' => '関連カスタムユーザ',
    'specific_team' => '特定チーム',
    'specific_role' => '特定役割',
    'specific_user' => '特定ユーザ',
  ),
          'wflow_array_type_dom' =>
        array (
    'future' => '新しい値',
    'past' => '以前の値',
  ),
          'wflow_relate_type_dom' =>
        array (
    'Self' => 'アサイン先',
    'Manager' => "ユーザの上司",
  ),
    'wflow_address_type_dom' =>
        array (
    'to' => 'To:',
    'cc' => 'CC:',
    'bcc' => 'BCC:',
  ),
     'wflow_address_type_invite_dom' =>
        array (
    'to' => 'To:',
    'cc' => 'CC:',
    'bcc' => 'BCC:',
    'invite_only' => '(招待のみ)',
  ),
     'wflow_address_type_to_only_dom' =>
        array (
    'to' => 'To:',
  ),  
    'wflow_action_type_dom' =>
        array (
    'update' => 'レコードをアップデート',
    'update_rel' => '関連レコードをアップデート',
    'new' => '新規レコード',
  ), 
  'wflow_action_datetime_type_dom' =>
        array (
    'Triggered Date' => 'トリガー日',
    'Existing Value' => '既存値',
  ),
  'wflow_set_type_dom' =>
        array (
    'Basic' => '基本オプション',
    'Advanced' => '拡張オプション' ,
  ),   
  'wflow_adv_user_type_dom' =>
  		array (
    'assigned_user_id' => 'トリガーレコードにアサインされたユーザ' ,
    'modified_user_id' => 'トリガーレコードを最後に編集したユーザ' ,
    'created_by' => 'トリガーレコードを作成したユーザ' ,
    'current_user' => 'ログインユーザ' ,    
  ),
  'wflow_adv_team_type_dom' =>
        array (
    'team_id' => 'トリガーレコードの現在のチーム',    
    'current_team' => 'ログインユーザのチーム',
  ), 
  'wflow_adv_enum_type_dom' =>
        array (
    'retreat' => '後に移動',    
    'advance' => '前に移動',
  ), 
  'wflow_record_type_dom' =>
        array (
    'All' => '新規/既存レコード',    
    'New' => '新規レコードのみ',
    'Update' => '既存レコードのみ',
  ),
  'wflow_rel_type_dom' =>
  		array (
	'all' => '関連すべて',
	//'first' => 'The first related',
	'filter' => 'フィルタに関連',
  		),
  'wflow_relfilter_type_dom' =>
  		array (
	'all' => 'すべてに関連',
	'any' => 'どれかに関連',
  		),  
  	//I added the PST, CST, MST, EST denotations here	
  'dom_timezones_extra' => array('-12'=>'(GMT-12) 日付変更線西側',
  							'-11'=>'(GMT-11) サモア ミッドウェー島',
  							'-10'=>'(GMT-10) ハワイ',
  							'-9'=>'(GMT-9) アラスカ',
  							'-8'=>'(GMT-8) (PST)',
  							'-7'=>'(GMT-7) (MST)',
  							'-6'=>'(GMT-6) (CST)',
  							'-5'=>'(GMT-5) (EST)',
  							'-4'=>'(GMT-4) サンチャゴ',
  							'-3'=>'(GMT-3) ブエノスアイレス',
  							'-2'=>'(GMT-2) 中央大西洋',
  							'-1'=>'(GMT-1) アゾレス諸島',
  							'0'=>'(GMT)',
  							'1'=>'(GMT+1) マドリッド',
  							'2'=>'(GMT+2) アテネ',
  							'3'=>'(GMT+3) モスクワ',
  							'4'=>'(GMT+4) カブール',
  							'5'=>'(GMT+5) エカチェリンブルグ',
  							'6'=>'(GMT+6) アスタナ',
  							'7'=>'(GMT+7) バンコク',
  							'8'=>'(GMT+8) パース',
  							'9'=>'(GMT+9) 日本',
  							'10'=>'(GMT+10) ブリスベン',
  							'11'=>'(GMT+11) ソロモン諸島',
  							'12'=>'(GMT+12) オークランド',
  							),
  							
  	'duration_intervals' => array('0'=>'00',
  									'15'=>'15',
  									'30'=>'30',
  									'45'=>'45'),						
  	 	'wflow_fire_order_dom' => array('alerts_actions'=>'通知後実行',
  									'actions_alerts'=>'実行後通知'),

  									
  									
// deferred
/*// QUEUES MODULE DOMs
'queue_type_dom' => array(
	'Users' => 'Users',
	'Teams' => 'Teams',
	'Mailbox' => 'Mailbox',
),		   
*/

//prospect list type dom
  'prospect_list_type_dom' =>
  array (
    'default' => 'デフォルト',
    'seed' => 'シード',
    'exempt_domain' => '禁止リスト - ドメイン順',
    'exempt_address' => '禁止リスト - 電子メールアドレス順',
    'exempt' => '禁止リスト - ID順',
    'test' => 'テスト',
  ),
  
  'email_marketing_status_dom' => 
  array (
  	'' => '',
  	'active'=>'アクティブ',
  	'inactive'=>'非アクティブ',
  ),

  'campainglog_activity_type_dom' =>
  array (
  	''=>'',
    'targeted' => '送付済み/試行回数',
    'send error'=>'送信エラー: 他',
    'invalid email'=>'送信エラー: 不正アドレス',
    'link'=>'リンクからクリック',
    'viewed'=>'閲覧済み',
    'removed' => '脱退済み',
    'lead'=>'リード作成済み',
    'contact'=>'取引先担当者作成済み',        
  ),

  'campainglog_target_type_dom' =>
  array (
    'Contacts' => '取引先担当者',
    'Users'=>'ユーザ',
    'Prospects'=>'ターゲット',
    'Leads'=>'リード',
  ),


	// Contracts module enums

	'contract_status_dom' => array (
		'notstarted' => '未開始',
		'inprogress' => '進行中',
		'signed' => 'サイン済み',
	),

	'contract_payment_frequency_dom' => array (
		'monthly' => '毎月',
		'quarterly' => '毎四半期',
		'halfyearly' => '毎半期',
		'yearly' => '毎年',
	),

	'contract_expiration_notice_dom' => array (
		'1' => '1日',
		'3' => '3日',
		'5' => '5日',
		'7' => '1週間',
		'14' => '2週間',
		'21' => '3週間',
		'31' => '1ヶ月',
	),

);

$app_strings = array (
	'LBL_LIST_TEAM' => 'チーム',
	'LBL_TEAM' => 'チーム:',
	'LBL_TEAM_ID'=>'チーム:',
	

	'ERR_CREATING_FIELDS' => '追加詳細フィールドに入力する際にエラーがありました: ',
	'ERR_CREATING_TABLE' => 'テーブルを作成する際にエラーがありました: ',
	'ERR_DELETE_RECORD' => '取引先担当者を削除するにはレコード番号を指定する必要があります。',
	'ERR_EXPORT_DISABLED' => 'エクスポートを無効',
	'ERR_EXPORT_TYPE' => 'エクスポート中にエラー ',
	'ERR_INVALID_AMOUNT' => '有効な数字を入れてください',
	'ERR_INVALID_DATE_FORMAT' => '有効日付フォーマット: ',
	'ERR_INVALID_DATE' => '有効な日を入れてください',
	'ERR_INVALID_DAY' => '有効な曜日を入れてください',
	'ERR_INVALID_EMAIL_ADDRESS' => '無効な電子メールアドレスです',
	'ERR_INVALID_HOUR' => '有効な時間を入れてください',
	'ERR_INVALID_MONTH' => '有効な月を入れてください',
	'ERR_INVALID_TIME' => '有効な日時を入れてください',
	'ERR_INVALID_YEAR' => '有効な年を4桁で入れてください',
	'ERR_NEED_ACTIVE_SESSION' => 'コンテンツのエクスポートにはアクティブなセションが必要です。',
	'ERR_MISSING_REQUIRED_FIELDS' => '必要なフィールドが見つかりません:',
    'ERR_INVALID_REQUIRED_FIELDS' => '必須フィールドが不正です。',
	'ERR_INVALID_VALUE' => '不正な値:',
	'ERR_NOTHING_SELECTED' => '実行する前に選択してください。',
	'ERR_OPPORTUNITY_NAME_DUPE' => ' %s の名前の商談は既に存在します。別の名前を使用してください。',
	'ERR_OPPORTUNITY_NAME_MISSING' => '商談名が入力されていません。商談名を入力してください。',
	'ERR_SELF_REPORTING' => '自分自身にレポートできません',
	'ERR_SQS_NO_MATCH_FIELD' => 'フィールドにマッチしません: ',
	'ERR_SQS_NO_MATCH' => 'マッチしません',
	'ERR_PORTAL_LOGIN_FAILED' => 'ポータルログインセションの作成に失敗しました。管理者にお問い合わせ下さい。',
	'ERR_RESOURCE_MANAGEMENT_INFO' => '<a href="index.php">ホーム</a>に戻る',
		
	'LBL_ACCOUNT'=>'取引先',
	'LBL_ACCOUNTS'=>'取引先',
	'LBL_ACCUMULATED_HISTORY_BUTTON_KEY' => 'H',
	'LBL_ACCUMULATED_HISTORY_BUTTON_LABEL' => 'サマリ表示',
	'LBL_ACCUMULATED_HISTORY_BUTTON_TITLE' => 'サマリ表示 [Alt+H]',
	'LBL_ADD_BUTTON_KEY' => 'A',
	'LBL_ADD_BUTTON_TITLE' => '追加 [Alt+A]',
	'LBL_ADD_BUTTON' => '追加',
	'LBL_ADD_DOCUMENT' => 'ドキュメント追加',
	'LBL_ADD_TO_PROSPECT_LIST_BUTTON_KEY' => 'L',
	'LBL_ADD_TO_PROSPECT_LIST_BUTTON_LABEL' => 'ターゲットリストに追加',
	'LBL_ADD_TO_PROSPECT_LIST_BUTTON_TITLE' => 'ターゲットリストに追加',
	'LBL_ADDITIONAL_DETAILS_CLOSE_TITLE' => 'クリックして閉じる',
	'LBL_ADDITIONAL_DETAILS_CLOSE' => '完了',
	'LBL_ADDITIONAL_DETAILS' => '追加詳細',
	'LBL_ADMIN' => '管理',
	'LBL_ALT_HOT_KEY' => 'Alt+',
	'LBL_ARCHIVE' => '保存',
	'LBL_ASSIGNED_TO_USER'=>'アサイン先ユーザ',
	'LBL_ASSIGNED_TO' => 'アサイン先:',
	'LBL_BACK' => '戻る',
	'LBL_BILL_TO_ACCOUNT'=>'取引先に請求',
	'LBL_BILL_TO_CONTACT'=>'取引先担当者に請求',
	'LBL_BROWSER_TITLE' => 'SugarCRM - オープンソースCRM',
	'LBL_BUGS'=>'バグトラッカー',
	'LBL_BY' => 'by',
	'LBL_CALLS'=>'電話',
	'LBL_CAMPAIGNS_SEND_QUEUED' => 'キューに従ってキャンペーンメールを送信',
	'LBL_CANCEL_BUTTON_KEY' => 'X',
	'LBL_CANCEL_BUTTON_LABEL' => 'キャンセル',
	'LBL_CANCEL_BUTTON_TITLE' => 'キャンセル [Alt+X]',
	'LBL_CASE'=>'ケース',
	'LBL_CASES'=>'ケース',
	'LBL_CHANGE_BUTTON_KEY' => 'G',
	'LBL_CHANGE_BUTTON_LABEL' => '変更',
	'LBL_CHANGE_BUTTON_TITLE' => '変更 [Alt+G]',
	'LBL_CHARSET' => 'UTF-8',
	'LBL_CHECKALL' => 'すべてチェック',
	'LBL_CLEAR_BUTTON_KEY' => 'C',
	'LBL_CLEAR_BUTTON_LABEL' => 'クリア',
	'LBL_CLEAR_BUTTON_TITLE' => 'クリア [Alt+C]',
	'LBL_CLEARALL' => 'すべてクリア',
	'LBL_CLOSE_WINDOW'=>'ウィンドウを閉じる',
	'LBL_CLOSEALL_BUTTON_KEY' => 'Q',
	'LBL_CLOSEALL_BUTTON_LABEL' => 'すべて閉じる',
	'LBL_CLOSEALL_BUTTON_TITLE' => 'すべて閉じる [Alt+I]',
	'LBL_COMPOSE_EMAIL_BUTTON_KEY' => 'L',
	'LBL_COMPOSE_EMAIL_BUTTON_LABEL' => '電子メール作成',
	'LBL_COMPOSE_EMAIL_BUTTON_TITLE' => '電子メール作成 [Alt+L]',
	'LBL_CONTACT_LIST' => '取引先担当者一覧',
	'LBL_CONTACT'=>'取引先担当者',
	'LBL_CONTACTS'=>'取引先担当者',
	'LBL_CREATE_BUTTON_LABEL' => '作成',
	'LBL_CREATED_BY_USER'=>'作成ユーザ',
	'LBL_CREATED' => '作成者',
	'LBL_CURRENT_USER_FILTER' => '自分のアイテムのみ:',
	'LBL_DATE_ENTERED' => '入力日:',
	'LBL_DATE_MODIFIED' => '最終更新日:',
	'LBL_DELETE_BUTTON_KEY' => 'D',
	'LBL_DELETE_BUTTON_LABEL' => '削除',
	'LBL_DELETE_BUTTON_TITLE' => '削除 [Alt+D]',
	'LBL_DELETE_BUTTON' => '削除',
	'LBL_DELETE' => '削除',
	'LBL_DELETED'=>'削除済み',
	'LBL_DIRECT_REPORTS'=>'直属の部下',
	'LBL_DONE_BUTTON_KEY' => 'X',
	'LBL_DONE_BUTTON_LABEL' => '完了',
	'LBL_DONE_BUTTON_TITLE' => '完了 [Alt+X]',
	'LBL_DST_NEEDS_FIXIN' => 'アプリケーションはサマータイム設定を必要としています。 管理画面の<a href="index.php?module=Administration&action=DstFix">リペア</a>を選択し、サマータイム設定を行ってください。',
	'LBL_DUPLICATE_BUTTON_KEY' => 'U',
	'LBL_DUPLICATE_BUTTON_LABEL' => '複製',
	'LBL_DUPLICATE_BUTTON_TITLE' => '複製 [Alt+U]',
	'LBL_DUPLICATE_BUTTON' => '複製',
	'LBL_EDIT_BUTTON_KEY' => 'E',
	'LBL_EDIT_BUTTON_LABEL' => '編集',
	'LBL_EDIT_BUTTON_TITLE' => '編集 [Alt+E]',
	'LBL_EDIT_BUTTON' => '編集',
	'LBL_VIEW_BUTTON_KEY' => 'V',
	'LBL_VIEW_BUTTON_LABEL' => '閲覧',
	'LBL_VIEW_BUTTON_TITLE' => '閲覧[Alt+V]',
	'LBL_VIEW_BUTTON' => '閲覧',
	'LBL_EMAIL_PDF_BUTTON_KEY' => 'M',
	'LBL_EMAIL_PDF_BUTTON_LABEL' => 'PDFをメール送信',
	'LBL_EMAIL_PDF_BUTTON_TITLE' => 'PDFをメール送信 [Alt+M]',
	'LBL_EMAILS'=>'電子メール',
	'LBL_EMPLOYEES' => '従業員',
	'LBL_ENTER_DATE' => '入力日',
	'LBL_EXPORT_ALL' => 'すべてエクスポート',
	'LBL_EXPORT' => 'エクスポート',
	'LBL_HIDE'=>'非表示',
	'LBL_ID'=>'ID',
	'LBL_IMPORT_PROSPECTS'=>'ターゲットのインポート',
	'LBL_IMPORT' => 'インポート',
	'LBL_LAST_VIEWED' => '参照履歴',
	'LBL_LEADS'=>'リード',
	
	'LBL_LIST_ACCOUNT_NAME' => '取引先',
	'LBL_LIST_ASSIGNED_USER' => 'アサイン先',
	'LBL_LIST_CONTACT_NAME' => '取引先担当者',
	'LBL_LIST_CONTACT_ROLE' => '取引先担当者役割',
	'LBL_LIST_EMAIL' => '電子メール',
	'LBL_LIST_NAME' => '名前',
	'LBL_LIST_OF' => 'の',
	'LBL_LIST_PHONE' => '電話',
	'LBL_LIST_USER_NAME' => 'ユーザ名',
	'LBL_LISTVIEW_MASS_UPDATE_CONFIRM' => 'すべてのリストを更新しても良いですか？',
	'LBL_LISTVIEW_NO_SELECTED' => '少なくとも一つのレコードを選択してください。',
	'LBL_LISTVIEW_OPTION_CURRENT' => 'このページ',
	'LBL_LISTVIEW_OPTION_ENTIRE' => 'すべてのレコード',
	'LBL_LISTVIEW_OPTION_SELECTED' => '選択されたレコード',
	'LBL_LISTVIEW_SELECTED_OBJECTS' => '選択済み: ',
	
	'LBL_LOCALE_NAME_EXAMPLE_FIRST' => '名',
	'LBL_LOCALE_NAME_EXAMPLE_LAST' => '姓',
	'LBL_LOCALE_NAME_EXAMPLE_SALUTATION' => '様',
	'LBL_LOGOUT' => 'ログアウト',
	'LBL_MAILMERGE_KEY' => 'M',
	'LBL_MAILMERGE' => 'メールマージ',
	'LBL_MASS_UPDATE' => '一括更新',
	'LBL_MEETINGS'=>'会議',
	'LBL_MEMBERS'=>'メンバー一覧',
	'LBL_MODIFIED_BY_USER' => '編集ユーザ',
	'LBL_MODIFIED' => '更新者',
	'LBL_MY_ACCOUNT' => 'ユーザ設定',
	'LBL_NAME' => '名前',
	'LBL_NEW_BUTTON_KEY' => 'N',
	'LBL_NEW_BUTTON_LABEL' => '作成',
	'LBL_NEW_BUTTON_TITLE' => '新規 [Alt+N]',
	'LBL_NEXT_BUTTON_LABEL' => '次へ',
	'LBL_NONE' => '--なし--',
	'LBL_NOTES'=>'メモ',
	'LBL_OPENALL_BUTTON_KEY' => 'O',
	'LBL_OPENALL_BUTTON_LABEL' => 'すべて開く',
	'LBL_OPENALL_BUTTON_TITLE' => 'すべて開く [Alt+O]',
	'LBL_OPENTO_BUTTON_KEY' => 'T',
	'LBL_OPENTO_BUTTON_LABEL' => '開く先: ',
	'LBL_OPENTO_BUTTON_TITLE' => '開く先: [Alt+T]',
	'LBL_OPPORTUNITIES'=>'商談',
	'LBL_OPPORTUNITY_NAME' => '商談名',
	'LBL_OPPORTUNITY'=>'商談',
	'LBL_OR' => 'または',
	'LBL_PERCENTAGE_SYMBOL' => '%',
	'LBL_PRODUCT_BUNDLES'=>'商品バンドル',
	'LBL_PRODUCT_BUNDLES'=>'商品バンドル',
	'LBL_PRODUCTS'=>'商品',
	'LBL_PROJECT_TASKS'=>'プロジェクトタスク',
	'LBL_PROJECTS'=>'プロジェクト',
	'LBL_PROJECTS'=>'プロジェクト',
	'LBL_QUOTE_TO_OPPORTUNITY_KEY' => 'O',
	'LBL_QUOTE_TO_OPPORTUNITY_LABEL' => '見積から商談を作成',
	'LBL_QUOTE_TO_OPPORTUNITY_TITLE' => '見積から商談を作成 [Alt+O]',
	'LBL_QUOTES_SHIP_TO'=>'見積の出荷先',
	'LBL_QUOTES'=>'見積',
	'LBL_RELATED_RECORDS' => '関連レコード',
	'LBL_REMOVE' => '削除',
	'LBL_REQUIRED_SYMBOL' => '*',
	'LBL_SAVE_BUTTON_KEY' => 'S',
	'LBL_SAVE_BUTTON_LABEL' => '保存',
	'LBL_SAVE_BUTTON_TITLE' => '保存 [Alt+S]',
    'LBL_FULL_FORM_BUTTON_KEY' => 'F',
    'LBL_FULL_FORM_BUTTON_LABEL' => 'フルフォーム',
    'LBL_FULL_FORM_BUTTON_TITLE' => 'フルフォーム[Alt+F]',
	'LBL_SAVE_NEW_BUTTON_KEY' => 'V',
	'LBL_SAVE_NEW_BUTTON_LABEL' => '保存後新規作成',
	'LBL_SAVE_NEW_BUTTON_TITLE' => '保存後新規作成 [Alt+V]',
	'LBL_SEARCH_BUTTON_KEY' => 'Q',
	'LBL_SEARCH_BUTTON_LABEL' => '検索',
	'LBL_SEARCH_BUTTON_TITLE' => '検索 [Alt+Q]',
	'LBL_SEARCH' => '検索',
	'LBL_SELECT_BUTTON_KEY' => 'T',
	'LBL_SELECT_BUTTON_LABEL' => '選択',
	'LBL_SELECT_BUTTON_TITLE' => '選択 [Alt+T]',
	'LBL_SELECT_CONTACT_BUTTON_KEY' => 'T',
	'LBL_SELECT_CONTACT_BUTTON_LABEL' => '取引先担当者選択',
	'LBL_SELECT_CONTACT_BUTTON_TITLE' => '取引先担当者選択 [Alt+T]',
	'LBL_SELECT_REPORTS_BUTTON_LABEL' => 'レポートから選択',
	'LBL_SELECT_REPORTS_BUTTON_TITLE' => 'レポート選択',
	'LBL_SELECT_USER_BUTTON_KEY' => 'U',
	'LBL_SELECT_USER_BUTTON_LABEL' => 'ユーザ選択',
	'LBL_SELECT_USER_BUTTON_TITLE' => 'ユーザ選択 [Alt+U]',
	'LBL_SERVER_RESPONSE_RESOURCES' => 'このページを構成するリソース (クエリ、ファイル)',
	'LBL_SERVER_RESPONSE_TIME_SECONDS' => '秒',
	'LBL_SERVER_RESPONSE_TIME' => 'サーバ応答時間:',
	'LBL_SHIP_TO_ACCOUNT'=>'取引先に出荷',
	'LBL_SHIP_TO_CONTACT'=>'取引先担当者に出荷',
	'LBL_SHORTCUTS' => 'ショートカット',
	'LBL_SHOW'=>'表示',
	'LBL_SQS_INDICATOR' => '',
	'LBL_STATUS_UPDATED'=>'当イベントのステータスが更新されました!',
	'LBL_STATUS'=>'ステータス:',
	'LBL_SUBJECT' => '件名',
	'LBL_SYNC' => '同期',
	'LBL_SYNC' => '同期',
	'LBL_TASKS'=>'タスク',
	'LBL_TEAMS_LINK'=>'チーム',
	'LBL_THOUSANDS_SYMBOL' => 'K',
	'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
	'LBL_TRACK_EMAIL_BUTTON_LABEL' => '電子メール作成・保存',
	'LBL_TRACK_EMAIL_BUTTON_TITLE' => '電子メール作成・保存 [Alt+K]',
	'LBL_UNAUTH_ADMIN' => '管理者機能へアクセスする権限がありません',
	'LBL_UNDELETE_BUTTON_LABEL' => '削除取消',
	'LBL_UNDELETE_BUTTON_TITLE' => '削除取消 [Alt+D]',
	'LBL_UNDELETE_BUTTON' => '削除取消',
	'LBL_UNDELETE' => '削除取消',
	'LBL_UNSYNC' => '同期取消',
	'LBL_UPDATE' => '更新',
	'LBL_USER_LIST' => 'ユーザ一覧',
	'LBL_USERS_SYNC'=>'ユーザの同期',
	'LBL_USERS'=>'ユーザ',
	'LBL_VIEW_PDF_BUTTON_KEY' => 'P',
	'LBL_VIEW_PDF_BUTTON_LABEL' => 'PDFを印刷',
	'LBL_VIEW_PDF_BUTTON_TITLE' => 'PDFを印刷 [Alt+P]',
	
	'LNK_ABOUT' => '製品について',
	'LNK_ADVANCED_SEARCH' => '詳細検索',
	'LNK_BASIC_SEARCH' => '基本検索',
	'LNK_DELETE_ALL' => 'すべて削除', 
	'LNK_DELETE' => '削除',
	'LNK_EDIT' => '編集',
	'LNK_GET_LATEST'=>'最新を取得',
	'LNK_GET_LATEST_TOOLTIP'=>'最新と入れ替え',
	'LNK_HELP' => 'ヘルプ',
	'LNK_LIST_END' => '最後',
	'LNK_LIST_NEXT' => '次へ',
	'LNK_LIST_PREVIOUS' => '前へ',
	'LNK_LIST_RETURN' => '一覧へ戻る',
	'LNK_LIST_START' => '最初',
	'LNK_LOAD_SIGNED'=>'サイン',
	'LNK_LOAD_SIGNED_TOOLTIP'=>'サイン済みと入れ替え',
	'LNK_PRINT' => '印刷',
	'LNK_REMOVE' => 'はずす',
	'LNK_RESUME' => '戻す',
	'LNK_VIEW_CHANGE_LOG' => '変更履歴表示',
	
	'NTC_CLICK_BACK' => 'エラーを修正するにはブラウザの戻るボタンをクリックしてください',
	'NTC_DATE_FORMAT' => '(yyyy-mm-dd)',
	'NTC_DATE_TIME_FORMAT' => '(yyyy-mm-dd 24:00)',
	'NTC_DELETE_CONFIRMATION_MULTIPLE' => '本当にこのレコードを削除してよいですか?',
	'NTC_DELETE_CONFIRMATION' => '本当にこのレコードを削除してよいですか?',
	'NTC_LOGIN_MESSAGE' => 'ユーザ名とパスワードを入力してください。:',
	'NTC_NO_ITEMS_DISPLAY' => 'なし',
	'NTC_REMOVE_CONFIRMATION' => '本当にこのリレーションを削除して良いですか？',
	'NTC_REQUIRED' => '必須項目',
	'NTC_SUPPORT_SUGARCRM' => 'SugarCRMのオープンソースプロジェクトをPayPalを通じサポートしてください。-　速くて、無料で安心です！',
	'NTC_TIME_FORMAT' => '(24:00)',
	'NTC_WELCOME' => 'ようこそ',
	'NTC_YEAR_FORMAT' => '(yyyy)',
	'LOGIN_LOGO_ERROR'=> 'SugarCRMロゴを入れ替えてください。',
	'ERROR_FULLY_EXPIRED'=> "SugarCRMのライセンス期限が切れてから30日以上を経過しています。ライセンスを更新してください。管理者のみがログインできます。",
	'ERROR_LICENSE_EXPIRED'=> "SugarCRMのライセンスを更新する必要があります。管理者のみがログインできます。",
	'ERROR_NO_RECORD' => 'レコードの検索中にエラー。このレコードは削除されているか、閲覧する権限がありません。',
	'LBL_DUP_MERGE'=>'重複を検出',
	// Ajax status strings
	'LBL_LOADING' => 'ロード中....',
	'LBL_SAVING_LAYOUT' => 'レイアウトを保存中....',
    'LBL_SAVED_LAYOUT' => 'レイアウトは保存されました。',
    'LBL_SAVED' => '保存済み',
    'LBL_SAVING' => '保存中',
    'LBL_DISPLAY_COLUMNS' => '列を表示',
    'LBL_HIDE_COLUMNS' => '列を非表示',
    'LBL_SEARCH_CRITERIA' => '検索条件',
    'LBL_SAVED_VIEWS' => '保存済みビュー',
    
    'LBL_NO_RECORDS_FOUND' => '- レコードが見つかりません -',
    'LBL_LOGIN_SESSION_EXCEEDED' => 'サーバーがビジー状態です。 しばらく待って、後でもう一度アクセスしてください。',
    'LBL_CHANGE_PASSWORD' => 'パスワード変更',
    'LBL_LOGIN_TO_ACCESS' => 'このエリアにアクセスするにはサインインしてください。',	
);
