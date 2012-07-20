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
















	
$mod_strings = array (
		  //Labels for methods in the TrackerReporter.php file that are shown in TrackerDashlet
		  'ShowActiveUsers'      => 'アクティブユーザの表示',
		  'ShowLastModifiedRecords' => '最新10件の変更されたレコード',
		  'ShowTopUser' => 'トップユーザ',
		  'ShowMyModuleUsage' => '私のモジュール利用状況',
		  'ShowMyWeeklyActivities' => '私の今週の活動',
		  'ShowTop3ModulesUsed' => '私のトップ3利用モジュール',
		  'ShowLoggedInUserCount' => 'アクティブユーザ数',
		  'ShowMyCumulativeLoggedInTime' => '私の累積ログイン時間（今週）',
		  'ShowUsersCumulativeLoggedInTime' => 'ユーザの累積ログイン時間（今週）',
		  
		  //Column header mapping
		  'action' => 'アクション',
		  'active_users' => 'アクティブユーザ',
		  'date_modified' => '更新日',
		  'different_modules_accessed' => 'アクセスしたモジュール数',
		  'first_name' => '名',
		  'item_id' => 'ID',
		  'item_summary' => '名前',
		  'last_action' => '最後のアクション日時',
		  'last_name' => '姓',
		  'module_name' => 'モジュール名',
		  'records_modified' => '総変更モジュール',
		  'top_module' => '最もアクセスしたモジュール',
		  'total_count' => '総ページビュー',
		  'total_login_time' => '時間（hh:mm:ss）',
		  'user_name' => 'ユーザ名',
		  'users' => 'ユーザ',
		  
		  //Administration related labels
		  'LBL_ENABLE' => '有効',
		  'LBL_MODULE_NAME_TITLE' => 'トラッカー',
		  'LBL_MODULE_NAME' => 'トラッカー',
		  'LBL_TRACKER_SETTINGS' => 'トラッカー設定',
		  'LBL_TRACKER_QUERIES_DESC' => '検索文トラッカー',
		  'LBL_TRACKER_QUERIES_HELP' => 'dump_slow_queriesが有効な時、かつconfig.phpに定義されたslow_query_time_msecの値よりも検索文の実行時間が下回った時、SQL文をトラックする',
		  'LBL_TRACKER_PERF_DESC' => 'パフォーマンストラッカー',
		  'LBL_TRACKER_PERF_HELP' => 'データベースの行き来、ファイルアクセス、メモリー使用量をトラックする',
		  'LBL_TRACKER_SESSIONS_DESC' => 'セショントラッカー',
		  'LBL_TRACKER_SESSIONS_HELP' => 'アクティブなユーザとユーザのセション情報をトラックする',
		  'LBL_TRACKER_DESC' => 'アクショントラッカー',
		  'LBL_TRACKER_HELP' => 'ユーザのページビュー（アクセスしたモジュールとレコード）とレコードの保存をトラックする',
		  'LBL_TRACKER_PRUNE_INTERVAL' => 'スケジューラがテーブルを最適化する際に保存するトラッカーデータの日数',
		  'LBL_TRACKER_PRUNE_RANGE' => '日数',
);


