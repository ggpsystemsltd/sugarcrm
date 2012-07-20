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
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'ドキュメント',
  'LBL_MODULE_NAME' => '商談',
  'LBL_MODULE_TITLE' => '商談: ホーム',
  'LBL_SEARCH_FORM_TITLE' => '商談検索',
  'LBL_VIEW_FORM_TITLE' => '商談ビュー',
  'LBL_LIST_FORM_TITLE' => '商談一覧',
  'LBL_OPPORTUNITY_NAME' => '商談名:',
  'LBL_OPPORTUNITY' => '商談名:',
  'LBL_NAME' => '商談名',
  'LBL_INVITEE' => '取引先担当者',
  'LBL_CURRENCIES' => '通貨',
  'LBL_LIST_OPPORTUNITY_NAME' => '名前',
  'LBL_LIST_ACCOUNT_NAME' => '取引先',
  'LBL_LIST_AMOUNT' => '商談金額',
  'LBL_LIST_AMOUNT_USDOLLAR' => '金額',
  'LBL_LIST_DATE_CLOSED' => '完了',
  'LBL_LIST_SALES_STAGE' => 'セールスステージ',
  'LBL_ACCOUNT_ID' => '取引先ID',
  'LBL_CURRENCY_ID' => '通貨ID',
  'LBL_CURRENCY_NAME' => '通貨名',
  'LBL_CURRENCY_SYMBOL' => '通貨シンボル',
  'LBL_TEAM_ID' => 'チーム:',
  'UPDATE' => '商談の通貨更新',
  'UPDATE_DOLLARAMOUNTS' => 'USドルの金額を更新',
  'UPDATE_VERIFY' => '金額を検証',
  'UPDATE_VERIFY_TXT' => '商談の金額が数字（0-9）と小数点（.）で正しく入力されているかどうかを検証します。',
  'UPDATE_FIX' => '金額を修正',
  'UPDATE_FIX_TXT' => '現在の金額から正しい区切り文字を使って不正な金額を修正します。修正された金額のバックアップはデータベースのamount_backupフィールドに保存されます。これを実行して問題が発生した場合、バックアップから以前の値を戻してください。さもないと、再度実行すると不正な値でバックアップ値が上書きされます',
  'UPDATE_DOLLARAMOUNTS_TXT' => '商談のUSドルの更新は設定されている通貨レートに基づきます。グラフとリストビューでの金額の値に反映されます。',
  'UPDATE_CREATE_CURRENCY' => '通貨作成:',
  'UPDATE_VERIFY_FAIL' => '確認に失敗しました:',
  'UPDATE_VERIFY_CURAMOUNT' => '現在の金額:',
  'UPDATE_VERIFY_FIX' => '修正は',
  'UPDATE_INCLUDE_CLOSE' => '完了したレコードを含む',
  'UPDATE_VERIFY_NEWAMOUNT' => '金額作成:',
  'UPDATE_VERIFY_NEWCURRENCY' => '通貨作成:',
  'UPDATE_DONE' => '完了',
  'UPDATE_BUG_COUNT' => '実行時に不具合が見つかりました:',
  'UPDATE_BUGFOUND_COUNT' => '不具合が見つかりました:',
  'UPDATE_COUNT' => 'レコードが更新されました:',
  'UPDATE_RESTORE_COUNT' => '金額がリストアされました:',
  'UPDATE_RESTORE' => '金額をリストア',
  'UPDATE_RESTORE_TXT' => '修復中にバックアップした内容をリストア',
  'UPDATE_FAIL' => '更新できません -',
  'UPDATE_NULL_VALUE' => '金額は空です。0に設定されました。  -',
  'UPDATE_MERGE' => '通貨を統合',
  'UPDATE_MERGE_TXT' => '複数の通貨を一つにまとめます。同じ通貨のレコードが複数ある場合、それらを一つにします。これは他のモジュールの通貨も統合します。',
  'LBL_ACCOUNT_NAME' => '取引先:',
  'LBL_AMOUNT' => '金額:',
  'LBL_AMOUNT_USDOLLAR' => '金額:',
  'LBL_CURRENCY' => '通貨:',
  'LBL_DATE_CLOSED' => '受注予定日:',
  'LBL_TYPE' => 'タイプ:',
  'LBL_CAMPAIGN' => 'キャンペーン:',
  'LBL_NEXT_STEP' => '次ステップ:',
  'LBL_LEAD_SOURCE' => 'リードソース:',
  'LBL_SALES_STAGE' => '商談ステージ:',
  'LBL_PROBABILITY' => '確度 (%):',
  'LBL_DESCRIPTION' => '詳細:',
  'LBL_DUPLICATE' => '重複の可能性がある商談',
  'MSG_DUPLICATE' => 'あなたが作成しようとしている商談は既存の商談と重複する可能性があります。類似の商談は下記に表示されています。保存をクリックすると新たに商談を作成します。キャンセルをクリックすると商談を作成せずにモジュールに戻ります。',
  'LBL_NEW_FORM_TITLE' => '商談作成',
  'LNK_NEW_OPPORTUNITY' => '商談作成',
  'LNK_OPPORTUNITY_REPORTS' => '商談レポート',
  'LNK_OPPORTUNITY_LIST' => '商談',
  'ERR_DELETE_RECORD' => '商談を削除するにはレコード番号を指定する必要があります。',
  'LBL_TOP_OPPORTUNITIES' => '私の商談ランキング',
  'NTC_REMOVE_OPP_CONFIRMATION' => '商談からこの取引先担当者を削除しても良いですか？',
  'OPPORTUNITY_REMOVE_PROJECT_CONFIRM' => 'プロジェクトからこの商談を削除しても良いですか？',
  'LBL_DEFAULT_SUBPANEL_TITLE' => '商談',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => '活動',
  'LBL_HISTORY_SUBPANEL_TITLE' => '履歴',
  'LBL_RAW_AMOUNT' => '金額',
  'LBL_LEADS_SUBPANEL_TITLE' => 'リード',
  'LBL_CONTACTS_SUBPANEL_TITLE' => '取引先担当者',
  'LBL_QUOTES_SUBPANEL_TITLE' => '見積',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'プロジェクト',
  'LBL_ASSIGNED_TO_NAME' => 'アサイン先:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'アサイン先ユーザ',
  'LBL_CONTRACTS' => '契約',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => '契約',
  'LBL_MY_CLOSED_OPPORTUNITIES' => '私のクローズ済み商談',
  'LBL_TOTAL_OPPORTUNITIES' => '商談総額',
  'LBL_CLOSED_WON_OPPORTUNITIES' => '受注済み商談',
  'LBL_ASSIGNED_TO_ID' => 'アサイン先:',
  'LBL_CREATED_ID' => '作成者ID',
  'LBL_MODIFIED_ID' => '更新者ID',
  'LBL_MODIFIED_NAME' => '更新者',
  'LBL_CREATED_USER' => '作成者',
  'LBL_MODIFIED_USER' => '更新者',
  'LBL_CAMPAIGN_OPPORTUNITY' => 'キャンペーン',
  'LBL_PROJECT_SUBPANEL_TITLE' => 'プロジェクト',
  'LABEL_PANEL_ASSIGNMENT' => '担当',
  'LNK_IMPORT_OPPORTUNITIES' => '商談のインポート',
);

