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



//users demodata
//VP
global $sugar_demodata;
$sugar_demodata['users'][0] = array(
  'id' => 'seed_jim_id',
  'last_name' => '佐藤',
  'first_name' => '孝之',
  'user_name' => 'satoh',
  'title'	=> '西チーム営業部長',
  'is_admin' => false,
  'reports_to' => null,
  'reports_to_name' => null,
  'email' => 'satoh@example.com'
);

//west team
$sugar_demodata['users'][] = array(
  'id' => 'seed_sarah_id',
  'last_name' => '高橋',
  'first_name' => '紀子',
  'user_name' => 'takahashi',
  'title'	=> '西チーム営業課長',
  'is_admin' => false,
  'reports_to' => 'seed_satoh_id',
  'reports_to_name' => '佐藤 孝之',
  'email' => 'takahashi@example.com'
);

$sugar_demodata['users'][] = array(
  'id' => 'seed_sally_id',
  'last_name' => '田中',
  'first_name' => '三郎',
  'user_name' => 'tanaka',
  'title'	=> '顧客担当リーダー',
  'is_admin' => false,
  'reports_to' => 'seed_fukuda_id',
  'reports_to_name' => '福田 伸一',
  'email' => 'takahashi@example.com'
);

//east team
$sugar_demodata['users'][] = array(
  'id' => 'seed_max_id',
  'last_name' => '福田',
  'first_name' => '伸一',
  'user_name' => 'fukuda',
  'title'	=> '東チーム営業課長',
  'is_admin' => false,
  'reports_to' => 'seed_ogawa_id',
  'reports_to_name' => '小川 英恵',
  'email' => 'fukuda@example.com'
);

$sugar_demodata['users'][] = array(
  'id' => 'seed_will_id',
  'last_name' => '小川',
  'first_name' => '芳郎',
  'user_name' => 'ogawa',
  'title'	=> '東チーム顧客担当部長',
  'is_admin' => true,
  'reports_to' => null,
  'reports_to_name' => null,
  'email' => 'ogawa@example.com'
);

//teams demodata
$sugar_demodata['teams'][] = array(
  'name' => '東チーム',
  'description' => 'これは東地区のチームです。',
  'team_id' => 'East',
);

$sugar_demodata['teams'][] = array(
  'name' => '西チーム',
  'description' => 'これは西地区のチームです。 ',
  'team_id' => 'West',
);

//contacts accounts
$sugar_demodata['last_name_array'] = array(
	"速水",
	"田口",
	"中野",
	"谷村",
	"島野",
	"香坂",
	"青山",
	"田宮",
	"下里",
	"福田",
	"坂口",
	"上原",
	"伊藤",
	"吉田",
	"土見",
	"吉田",
	"天川",
	"小林",
	"平",
	"玉野",
	"石橋",
	"窪田",
	"真田",
	"徳川",
	"菊地",
	"谷山",
	"速瀬",
	"野島",
	"青木",
	"香月",
	"鳴海",
);

$sugar_demodata['first_name_array'] = array(
	"太郎",
	"健次",
	"学",
	"隆司",
	"紀子",
	"英恵",
	"典子",
	"忠志",
	"雄二",
	"由利子",
	"智治",
	"浩二",
	"礼子",
	"一樹",
	"哲司",
	"豊",
	"秀樹",
	"一郎",
	"二郎",
	"聡",
	"剛志",
	"孝之",
	"五郎",
	"徹",
	"勝昭",
	"昭",
	"正二",
	"健太",
	"俊夫",
);


$sugar_demodata['company_name_array'] = array(
	"株式会社新宿物産",
	"品川商事株式会社",
	"千葉電気株式会社",
	"東京石油株式会社",
	"株式会社西宮精機",
	"中央広告株式会社",
	"秋田電鉄株式会社",
	"東邦自動車株式会社",
	"西日本工業株式会社",
	"日本商事株式会社",
);


$sugar_demodata['street_address_array'] = array(
	"本町3-12-7",
	"中町5-21",
	"元浜町2-19",
	"寿町1-9-10",
	"霞ヶ丘8-10",
	"吉田町2-13-7",
	"山田町1-29",
	"八幡町4-12",
	"三番町1-2-5",
	"富士見が丘545",
	"北見通り659",
	"海岸通り975",
	"榎木町3-2-5",
	"金岡町54654",
	"小川町4678",
	"大洲5454",
	"新沢4789",
	"深沢647",
);


$sugar_demodata['city_array'] = array (
	"名古屋市中央区",
	"港区",
	"横浜市青葉区",
	"秋田市",
	"掛川市",
	"金沢市",
	"福岡市東区",
	"守口市",
	"大阪市旭区",
	"川崎市麻生区",
	"中央区",
	"京都市中京区",
	"松浦市",
	"大村市",
	"仙台市青葉区",
	"青森市",
	"新潟市",
);


//cases demo data
$sugar_demodata['case_seed_names'] = array(
	'サーバの料金体系について',
	'キャンペーン価格の適用について',
	'カスタマイズの支援について',
	'追加ライセンスの購入について',
	'ブラウザを使うとエラーが発生する件'
);
$sugar_demodata['note_seed_names_and_Descriptions'] = array(
	array('取引先情報の追加','3,000人の取引先にコンタクトすること'),
	array('コール情報','再コールにより電話。いい話になった。'),
	array('誕生日','担当者は10月生まれ'),
	array('お歳暮','お歳暮は歓迎される。来年のためにリスト化すること。')
);
$sugar_demodata['call_seed_data_names'] = array(
	'提案について詳細情報を得ること',
	'メッセージを残した',
	'都合が悪いとのこと。掛けなおし',
	'レビュープロセスの討議'
);
	

//titles
$sugar_demodata['titles'] = array(
	"代表取締役",
	"営業本部長",
	"業務本部長",
	"管理部長",
	"営業部長",
	"業務課長",
	"IT担当者",
"");

//tasks
$sugar_demodata['task_seed_data_names'] = array(
	'カタログ整理',
	'出張手配',
	'手紙送付', 
	'契約書送付',
	'FAX送付',
	'フォローアップの手紙送付',
	'パンフレット送付',
	'提案書送付',
	'見積書送付',
	'ミーティングの予定決めのための電話',
	'評価環境構築',
	'デモのフィードバックを得る',
	'紹介のアレンジ',
	'サポートリクエストのエスカレーション',
	'サポートリクエストをクローズする',
	'製品出荷',
	'問い合わせ電話のアレンジ',
	'トレーニングの予定決め',
	'ローカルのユーザグループの情報を送付',
	'メーリングリストへ追加',
);

//meetings
$sugar_demodata['meeting_seed_data_names'] = array(
	'提案のフォローアップ',
	'初期打合せ',
	'ニーズのレビュー',
	'価格の調整',
	'デモ',
	'関係者の紹介',
);
$sugar_demodata['meeting_seed_data_descriptions'] = 'プロジェクトプランの打合せと実装の詳細詰めのためのミーティング';

//emails
$sugar_demodata['email_seed_data_subjects'] = array(
	'提案のフォローアップ',
	'初期打合せ',
	'ニーズのレビュー',
	'価格の調整',
	'デモ',
	'関係者の紹介',
);
$sugar_demodata['email_seed_data_descriptions'] = 'プロジェクトプランの打合せと実装の詳細詰めのためのミーティング';

//leads
$sugar_demodata['primary_address_state'] = '東京都';
$sugar_demodata['billing_address_state']['east'] = '東京都';
$sugar_demodata['billing_address_state']['west'] = '大阪府';
$sugar_demodata['primary_address_country'] = '日本';

//manufacturers
$sugar_demodata['manufacturer_seed_data_names'] = array(
	'東方倉庫',
	'ワールド精密機器',
	'東京部品工業',
);

//Shippers
$sugar_demodata['shipper_seed_data_names'] = array(
	'日本郵便',
	'クロネコヤマト'
);

//productcategories
$sugar_demodata['category_ext_name'] = ' 小型機器';
$sugar_demodata['product_ext_name'] = ' 部品';
$sugar_demodata['productcategory_seed_data_names'] = array(
	'デスクトップPC',
	'ノートPC',
	'文房具',
	'その他の小型機器'
);

//producttype
$sugar_demodata['producttype_seed_data_names']= array(
	'小型機器',
	'ハードウェア',
	'サポート契約'
);

//taxrate
$sugar_demodata['taxrate_seed_data'][] = array(
	'name' => '5.0 - 日本',
	'value' => '5.0',
);
/*
$sugar_demodata['currency_seed_data'][] = array(
	'name' => 'Euro',
	'conversion_rate' => 0.9,
	'iso4217' => 'EUR',
	'symbol' => '竄ｬ',
);

$sugar_demodata['currency_seed_data'][] = array(
	'name' => 'Japanese Yen',
	'conversion_rate' => 100,
	'iso4217' => 'JPY',
	'symbol' => '￥',
);
*/
//producttemplate
$sugar_demodata['producttemplate_seed_data'][] = array(
	'name' => 'TK 1000 デスクトップ',
	'tax_class' => 'Taxable',
	'cost_price' => 50000.00,
	'cost_usdollar' => 500.00,
	'list_price' => 80000.00,
	'list_usdollar' => 800.00,
	'discount_price' => 80000.00,
	'discount_usdollar' => 800.00,
	'pricing_formula' => 'IsList',
	'mft_part_num' => 'XYZ7890122222',
	'pricing_factor' => '1',
	'status' => 'Available',
	'weight' => 20.0,
	'date_available' => '2004/10/15',
	'qty_in_stock' => '72',
); 

$sugar_demodata['producttemplate_seed_data'][] = array(
	'name' => 'TK 1000 デスクトップ',
	'tax_class' => 'Taxable',
	'cost_price' => 60000.00,
	'cost_usdollar' => 600.00,
	'list_price' => 90000.00,
	'list_usdollar' => 900.00,
	'discount_price' => 90000.00,
	'discount_usdollar' => 900.00,
	'pricing_formula' => 'IsList',
	'mft_part_num' => 'XYZ7890123456',
	'pricing_factor' => '1',
	'status' => 'Available',
	'weight' => 20.0,
	'date_available' => '2004/10/15',
	'qty_in_stock' => '65',
); 

$sugar_demodata['producttemplate_seed_data'][] = array(
	'name' => 'TK m30 デスクトップ',
	'tax_class' => 'Taxable',
	'cost_price' => 130000.00,
	'cost_usdollar' => 1300.00,
	'list_price' => 170000.00,
	'list_usdollar' => 1700.00,
	'discount_price' => 162500.00,
	'discount_usdollar' => 1625.00,
	'pricing_formula' => 'ProfitMargin',
	'mft_part_num' => 'ABCD123456890',
	'pricing_factor' => '20',
	'status' => 'Available',
	'weight' => 5.0,
	'date_available' => '2004/10/15',
	'qty_in_stock' => '12',
); 

$sugar_demodata['producttemplate_seed_data'][] = array(
	'name' => 'ラック',
	'tax_class' => 'Taxable',
	'cost_price' => 20000.00,
	'cost_usdollar' => 200.00,
	'list_price' => 32500.00,
	'list_usdollar' => 325.00,
	'discount_price' => 26600.50,
	'discount_usdollar' => 266.50,
	'pricing_formula' => 'PercentageDiscount',
	'mft_part_num' => '2.0',
	'pricing_factor' => '20',
	'status' => 'Available',
	'weight' => 20.0,
	'date_available' => '2004/10/15',
	'qty_in_stock' => '65',
); 

$sugar_demodata['contract_seed_data'][] = array(
	'name' => '基本ITサポート',
	'reference_code' => 'EMP-9802',
	'total_contract_value' => '500600.01',
	'start_date' => '2010/05/15',
	'end_date' => '2020/05/15',
	'company_signed_date' => '2006/03/15',
	'customer_signed_date' => '2006/03/16',
	'description' => '年間保守サービスと運用監視サービス',
); 

$sugar_demodata['contract_seed_data'][] = array(
	'name' => '年間利用契約',
	'reference_code' => 'EMP-7277',
	'total_contract_value' => '333444.34',
	'start_date' => '2010/05/15',
	'end_date' => '2020/05/15',
	'company_signed_date' => '2006/03/15',
	'customer_signed_date' => '2006/03/16',
	'description' => 'SaaSサービスの年間利用契約',
); 

$sugar_demodata['project_seed_data']['audit'] = array(
	'name' => '監査向け新規プロジェクトプランの作成',
	'description' => '次の月に来る年次監査',
	'estimated_start_date' => '2007/11/01',
	'estimated_end_date' => '2007/12/31',
	'status' => 'Draft',
	'priority' => 'medium',
);

$sugar_demodata['project_seed_data']['audit']['project_tasks'][] = array(
	'name' => '関係者との調整',
	'date_start' => '2007/11/1',
	'date_finish' => '2007/11/8',
	'description' => '田中さん、佐藤さん、鈴木さんとのミーティングをそれぞれ予定する',
	'duration' => '6',
	'duration_unit' => 'Days',
	'percent_complete' => 100,
);

$sugar_demodata['project_seed_data']['audit']['project_tasks'][] = array(
	'name' => 'プランのドラフト作成',
	'date_start' => '2007/11/5',
	'date_finish' => '2007/11/20',
	'description' => '田中さん、佐藤さん、鈴木さんとのミーティングをそれぞれ予定する',
	'duration' => '12',
	'duration_unit' => 'Days',
	'percent_complete' => 38,
);

$sugar_demodata['project_seed_data']['audit']['project_tasks'][] = array(
	'name' => 'データ収集のための現地調査',
	'date_start' => '2007/11/5',
	'date_finish' => '2007/11/13',
	'description' => 'このプランのすべての関係者の承認を取らなくてはいけない',
	'duration' => '17',
	'duration_unit' => 'Days',
	'percent_complete' => 75,
);

$sugar_demodata['project_seed_data']['audit']['project_tasks'][] = array(
	'name' => 'このプランのドラフト作成',
	'date_start' => '2007/11/12',
	'date_finish' => '2007/11/19',
	'description' => 'ビジネス部門に助力をお願いするミーティングの予定決め',
	'duration' => '6',
	'duration_unit' => 'Days',
	'percent_complete' => 0,
);

$sugar_demodata['project_seed_data']['audit']['project_tasks'][] = array(
	'name' => 'ミーティングでデータを集める',
	'date_start' => '2007/11/20',
	'date_finish' => '2007/11/20',
	'description' => 'データをまとめてスプレットシートに記載する必要あり',
	'duration' => '1',
	'duration_unit' => 'Days',
	'percent_complete' => 0,
);

// KBDocuments
$sugar_demodata['kbdocument_seed_data_kbtags'] = array(
    'OS',
    'ハードウェア',
    'ネットワーク',
    'ツール',
    '利用方法',
    );

$sugar_demodata['kbdocument_seed_data'][] = array(
    'name' => 'インターネット接続について',
    'start_date' => '2010-01-01',
    'exp_date' => '2012-12-31',
    'body' => '<p>ネットワークデバイスをインターネットに接続することで、どのようなアプリケーションもインターネットに接続できます。Wi-FiやBluetoothも利用可能です。</p>',
    'tags' => array(
        'ネットワーク',
        ),
    );

$sugar_demodata['kbdocument_seed_data'][] = array(
    'name' => 'バッテリーの交換について',
    'start_date' => '2010-01-01',
    'exp_date' => '2012-12-31',
    'body' => '<p>バッテリーのチャージ方法は以下の通りです:</p>
   <ul><li>付属のUSB電源アダプタとケーブルを用いて、デバイスを電源コンセントに接続してください。</li>
    <li>付属のケーブルを用いて、高出力USB 2.0ポートに接続してください。</li></ul>',
    'tags' => array(
        '利用方法',
        'ハードウェア',
        ),
    );

$sugar_demodata['kbdocument_seed_data'][] = array(
    'name' => '印刷方法について',
    'start_date' => '2010-01-01',
    'exp_date' => '2012-12-31',
    'body' => '<p>印刷するドキュメントをコンピュータに転送し、当該文書にアクセスしてください。</p>',
    'tags' => array(
        '利用方法',
        'ツール',
        ),
    );

$sugar_demodata['kbdocument_seed_data'][] = array(
    'name' => '言語の変更方法',
    'start_date' => '2010-01-01',
    'exp_date' => '2012-12-31',
    'body' => '<p>デバイスの言語が異なる場合、まずセットアップが完了していることを確認してください。設定画面で適切な言語を選択してください。</p>',
    'tags' => array(
        '利用方法',
        'OS',
        ),
    );

$sugar_demodata['kbdocument_seed_data'][] = array(
    'name' => 'デバイスのリセット方法',
    'start_date' => '2010-01-01',
    'exp_date' => '2012-12-31',
    'body' => '<p>デバイスが予期しない動作をする場合、デバイスをリセットすることができます。画面が表示されるまでスタートボタンを押下し続けてください。選択画面が表示されたらリセットを選択してください。</p>',
    'tags' => array(
        '利用方法',
        'ハードウェア',
        ),
); 

//BEGIN Quotes demo data
$sugar_demodata['quotes_seed_data']['quotes'][0] = array(
	'name' => '[account name]様向けコンピュータ一式',
	'quote_stage' => 'Draft',
	'date_quote_expected_closed' => '04/30/2012',
    'description' => '',
    'purcahse_order_num' => '6011842',
    'payment_terms' => 'Net 30',

    'bundle_data' => array(
		0 => array (
		    'bundle_name' => 'コンピュータ',
		    'bundle_stage' => 'Draft',
		    'comment' => 'TKデスクトップコンピュータ',
		    'products' => array (
				1 => array('name'=>'TK 1000 デスクトップ', 'quantity'=>'1'),
				2 => array('name'=>'TK m30 デスクトップ', 'quantity'=>'2'),
			),
		),
	),
);


$sugar_demodata['quotes_seed_data']['quotes'][1] = array(
	'name' => '[account name]様向け付属品',
	'quote_stage' => 'Negotiation',
	'date_quote_expected_closed' => '04/30/2012',
    'description' => '',
 	'purcahse_order_num' => '3940021',
    'payment_terms' => 'Net 15',
         

    'bundle_data' => array(
		0 => array (
		    'bundle_name' => '付属品',
		    'bundle_stage' => 'Draft',
		    'comment' => 'TKコンピュータ付属品',
		    'products' => array (
				1 => array('name'=>'ラック', 'quantity'=>'2'),
			),
		),
	),
);
//END Quotes demo data
//Bugs
// KBDocuments
$sugar_demodata['bug_seed_names'] = array(
    '電源不良について',
    'ディスプレイのちらつき',
    '初期化プログラムのリセット方法',
    '合計値について',
    '翻訳の間違い',
    );




