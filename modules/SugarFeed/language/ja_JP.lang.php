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
  'LBL_MY_FAVORITES_ONLY' => '私のお気に入りのみ',
  'LBL_ENABLE_EXTERNAL_CONNECTORS' => '注：FacebookやTwitterをユーザに連携させる場合は、コネクタ設定のページでそれぞれのコネクタを設定してください。',
  'LBL_EXTERNAL_PREFIX' => '外部：',
  'LBL_EXTERNAL_WARNING' => '「外部」と名付けられた項目は外部アカウントが必要です。',
  'LBL_AUTHENTICATE' => '認証',
  'LBL_AUTHENTICATION_PENDING' => '選択された外部アカウントの一部が認証されていません。キャンセルを押下してオプション画面の外部アカウントを認証するウィンドウに移り、OKを押下して認証無しで進めてください。',
  'LBL_ID' => 'ID',
  'LBL_LINK_TYPE_YouTube' => 'YouTube&#153;',
  'LBL_TEAM' => 'チーム',
  'LBL_TEAM_ID' => 'チームId',
  'LBL_ASSIGNED_TO_ID' => 'アサイン先ユーザId',
  'LBL_ASSIGNED_TO_NAME' => 'アサイン先',
  'LBL_DATE_ENTERED' => '作成日',
  'LBL_DATE_MODIFIED' => '更新日',
  'LBL_MODIFIED' => '更新者',
  'LBL_MODIFIED_ID' => '更新者Id',
  'LBL_MODIFIED_NAME' => '更新者',
  'LBL_CREATED' => '作成者',
  'LBL_CREATED_ID' => '作成者Id',
  'LBL_DESCRIPTION' => '詳細',
  'LBL_DELETED' => '削除',
  'LBL_NAME' => '名前',
  'LBL_SAVING' => '保存中...',
  'LBL_SAVED' => '保存',
  'LBL_CREATED_USER' => '作成者',
  'LBL_MODIFIED_USER' => '更新者',
  'LBL_LIST_FORM_TITLE' => 'Sugarフィード一覧',
  'LBL_MODULE_NAME' => 'Sugarフィード',
  'LBL_MODULE_TITLE' => 'Sugarフィード',
  'LBL_DASHLET_DISABLED' => '警告: Sugarフィードシステムが無効化されています。有効化するまで新しいフィードエントリはポストされません。',
  'LBL_ADMIN_SETTINGS' => 'Sugarフィード設定',
  'LBL_RECORDS_DELETED' => 'Sugarフィードシステムを有効化すると、すべての過去のSugarフィードエントリは削除されます。新しいエントリは自動的に生成されます。',
  'LBL_CONFIRM_DELETE_RECORDS' => 'Sugarフィードを削除してよろしいでしょうか？',
  'LBL_FLUSH_RECORDS' => 'フィードを削除',
  'LBL_ENABLE_FEED' => 'Sugarフィードを有効化',
  'LBL_ENABLE_MODULE_LIST' => 'フィードのアクティブ化',
  'LBL_HOMEPAGE_TITLE' => '私のSugarフィード',
  'LNK_NEW_RECORD' => 'Sugarフィードの作成',
  'LNK_LIST' => 'Sugarフィード',
  'LBL_SEARCH_FORM_TITLE' => 'Sugarフィード検索',
  'LBL_HISTORY_SUBPANEL_TITLE' => '履歴の表示',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'アクティブ化',
  'LBL_SUGAR_FEED_SUBPANEL_TITLE' => 'Sugarフィード',
  'LBL_NEW_FORM_TITLE' => '新規Sugarフィード',
  'LBL_ALL' => 'すべて',
  'LBL_USER_FEED' => 'ユーザーフィード',
  'LBL_ENABLE_USER_FEED' => 'ユーザフィードの有効化',
  'LBL_TO' => '送り先',
  'LBL_IS' => 'は',
  'LBL_DONE' => '完了',
  'LBL_TITLE' => 'タイトル',
  'LBL_ROWS' => '今日',
  'LBL_CATEGORIES' => 'モジュール',
  'LBL_TIME_LAST_WEEK' => '先週',
  'LBL_TIME_WEEKS' => '週間',
  'LBL_TIME_DAYS' => '日',
  'LBL_TIME_YESTERDAY' => '昨日',
  'LBL_TIME_HOURS' => '時間',
  'LBL_TIME_HOUR' => '時間',
  'LBL_TIME_MINUTES' => '分',
  'LBL_TIME_MINUTE' => '分',
  'LBL_TIME_SECONDS' => '秒',
  'LBL_TIME_SECOND' => '秒',
  'LBL_TIME_AGO' => '前',
  'CREATED_CONTACT' => 'は、<b>新規</b>取引先担当者を作成しました。',
  'CREATED_OPPORTUNITY' => 'は、<b>新規</b>商談を作成しました。',
  'CREATED_CASE' => 'は、<b>新規</b>ケースを作成しました。',
  'CREATED_LEAD' => 'は、<b>新規</b>リードを作成しました。',
  'FOR' => '金額',
  'CLOSED_CASE' => 'は、ケースを<b>クローズ</b>しました。',
  'CONVERTED_LEAD' => 'は、リードを<b>コンバート</b>しました。',
  'WON_OPPORTUNITY' => 'は、商談を<b>受注</b>しました。',
  'WITH' => '取引先',
  'LBL_LINK_TYPE_Link' => 'リンク',
  'LBL_LINK_TYPE_Image' => '画像',
  'LBL_SELECT' => '選択',
  'LBL_POST' => 'ポスト',
);

