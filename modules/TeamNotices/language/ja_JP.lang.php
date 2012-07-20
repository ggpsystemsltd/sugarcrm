<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


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

	

$mod_strings = array (
  'LBL_URL' => 'URL',
  'LBL_MODULE_NAME' => 'チームへの連絡',
  'LBL_MODULE_TITLE' => 'チームへの連絡: ホーム',
  'LBL_SEARCH_FORM_TITLE' => 'チームへの連絡検索',
  'LBL_LIST_FORM_TITLE' => 'チームへの連絡一覧',
  'LBL_PRODUCTTYPE' => 'チームへの連絡',
  'LBL_NOTICES' => 'チームへの連絡',
  'LBL_LIST_NAME' => 'タイトル',
  'LBL_URL' => 'URL',
  'LBL_URL_TITLE' => 'サイト名',
  'LBL_LIST_DESCRIPTION' => '詳細',
  'LBL_NAME' => 'タイトル',
  'LBL_DESCRIPTION' => '詳細',
  'LBL_LIST_LIST_ORDER' => '順番',
  'LBL_LIST_ORDER' => '順番',
  'LBL_DATE_START' => '開始日',
  'LBL_DATE_END' => '終了日',
  'LBL_STATUS' => 'ステータス',
  'LNK_NEW_TEAM' => 'チーム作成',
  'LNK_NEW_TEAM_NOTICE' => 'チームへの連絡作成',
  'LNK_LIST_TEAM' => 'チーム',
  'LNK_LIST_TEAMNOTICE' => 'チームへの連絡',
  'LNK_PRODUCT_LIST' => '商品',
  'LNK_NEW_PRODUCT' => '商品作成',
  'LNK_NEW_MANUFACTURER' => '製造元',
  'LNK_NEW_SHIPPER' => '運送会社',
  'LNK_NEW_PRODUCT_CATEGORY' => '商品カテゴリ',
  'LNK_NEW_PRODUCT_TYPE' => '商品タイプ',
  'NTC_DELETE_CONFIRMATION' => '本当にこのレコードを削除して良いですか？',
  'ERR_DELETE_RECORD' => '商品タイプを削除するためにはレコード番号を指定してください。',
  'NTC_LIST_ORDER' => 'このタイプが商品タイプドロップダウンで表示される順番を指定してください。',
  'LBL_TEAM_NOTICE_FEATURES' => '機能:<br />* ユーザインタフェースが改善され、新しいウィザードはユーザがレポートを作成するためにガイドつきの簡単でわかりやすいデザインになりました。<br />* ユーザが複雑なロジックを用いて複数のモジュールにまたがったレポートを作成することができます。<br />* マトリックスレポートは柔軟性のあるグリッドレイアウト上で複数の属性でグルーピングすることができます。ユーザは総和/平均/カウント/百分率といったオペレーションを行いつつ複雑なピボットテーブルを作成することができます。<br />* 実行時フィルターはリアルタイムにレポートの属性を変更することができます。',
  'LBL_TEAM_NOTICE_WIRELESS' => 'SugarCRMアプリケーションの新しいモバイルビューは便利性と機動性との間で妥協することがなくなりました。<br />機能:<br />* 編集/詳細/一覧/関連したレコードへのビューと共に、従業員一覧表示/お気に入りの保存/アイテムの履歴参照できるようになりました。<br />* BlackberryやiPhoneといった任意のPDA/スマートフォンからSugarCRMのデータを参照することができます。<br />* リッチなHTMLクライアントは標準のWebブラウザーによりSugarCRMのデータをきれいに表示します。<br />* 新しい検索機能により情報を素早く探すことができます。',
  'LBL_TEAM_NOTICE_DATA_IMPORT' => 'Excel/Act!/Microsoft Outlook/Salesforce.comといったアプリケーションからSugarCRMへのデータ移行がより簡単になりました。<br />機能強化:<br />* SugarCRMへの順調かつ正確なデータ転送を保証するために、マッピングの際により多くのオプションが用意されました。<br />* 管理者がインポートの際に新しいレコードを作成するか、重複した情報を削りつつ既存のレコードを更新するかを指定することができます。<br />* 他のCRMアプリケーションからの情報を任意のモジュールへ重複したエントリを削りつつインポートすることができます。',
  'LBL_TEAM_NOTICE_MODULE_BUILDER' => 'モジュールビルダーは新しくかつ刷新的な方法でSugarCRMを拡張します。<br />機能強化:<br />* 新規あるいは既存のモジュール間は新しい方法でリレーションシップが張られます。<br />* 監査機能はカスタマイズの変遷を把握するためにモジュールの作成や変更の完全な履歴を提供します。<br />* ダッシュレットはモジュールの機能をホーム画面においてAJAXコンテナ上に表現します。<br />* 新しいテンプレートはファイルや商談情報の追跡を容易にします。',
  'LBL_TEAM_NOTICE_TRACKER' => 'トラッカーはSugarCRMの利用度やパフォーマンスを提示します。<br />機能:<br />* トラッカーレポートはCRM利用時にユーザ導入と可視性を増やすためにスナップショットを提供します。ユーザは週単位のCRMの活動/参照されたレコードやモジュール/他のチームメンバーの累積ログイン時間やオンライン状況をレポートとして参照することができます。<br />* システムモニターはシステムがどのように利用されているか、またアプリケーションの潜在的なストレスの情報を管理者に提供します。',
  'dom_status' => 
  array (
    'Visible' => '表示',
    'Hidden' => '非表示',
  ),
);


