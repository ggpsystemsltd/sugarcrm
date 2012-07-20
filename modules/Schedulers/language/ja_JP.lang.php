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
  'LBL_CRONTAB_SERVER_TIME_PRE' => 'cronでの指定はサーバのタイムゾーンに応じて実行されます。',
  'LBL_CRONTAB_SERVER_TIME_POST' => 'スケジューラーの実行時間もそれに沿って設定してください。',
  'LBL_AT_THE' => 'At the',
  'LBL_AT' => 'at',
  'LBL_IN' => 'in',
  'LBL_OOTB_WORKFLOW' => 'ワークフロータスクを実行',
  'LBL_OOTB_REPORTS' => 'レポート生成タスクを実行',
  'LBL_OOTB_IE' => 'インバウンド電子メール受信箱を確認',
  'LBL_OOTB_BOUNCE' => 'バウンスしたキャンペーン電子メールの処理を夜間に実行',
  'LBL_OOTB_CAMPAIGN' => 'キャンペーン電子メール送信を夜間に実行',
  'LBL_OOTB_PRUNE' => '月初め（1日）にデータベースを最適化',
  'LBL_OOTB_TRACKER' => '月初め（1日）にユーザ履歴を最適化',
  'LBL_UPDATE_TRACKER_SESSIONS' => 'tracker_sessions テーブルを更新',
  'LBL_LIST_JOB_INTERVAL' => '間隔',
  'LBL_LIST_LIST_ORDER' => 'スケジューラー',
  'LBL_LIST_NAME' => 'スケジューラー',
  'LBL_LIST_RANGE' => '期間',
  'LBL_LIST_REMOVE' => '削除',
  'LBL_LIST_STATUS' => 'ステータス',
  'LBL_LIST_TITLE' => 'スケジュール一覧',
  'LBL_LIST_EXECUTE_TIME' => '開始予定時刻',
  'LBL_SUN' => '日曜日',
  'LBL_MON' => '月曜日',
  'LBL_TUE' => '火曜日',
  'LBL_WED' => '水曜日',
  'LBL_THU' => '木曜日',
  'LBL_FRI' => '金曜日',
  'LBL_SAT' => '土曜日',
  'LBL_ALL' => '毎日',
  'LBL_EVERY_DAY' => '毎日',
  'LBL_EVERY' => '毎',
  'LBL_FROM' => '開始',
  'LBL_ON_THE' => '毎正',
  'LBL_RANGE' => '終了',
  'LBL_AND' => 'と',
  'LBL_MINUTES' => '分',
  'LBL_HOUR' => '時',
  'LBL_HOUR_SING' => '時',
  'LBL_MONTH' => '月',
  'LBL_OFTEN' => 'できるだけ頻繁に実行',
  'LBL_MIN_MARK' => '分',
  'LBL_MINS' => '分',
  'LBL_HOURS' => '時',
  'LBL_DAY_OF_MONTH' => '日',
  'LBL_MONTHS' => '月',
  'LBL_DAY_OF_WEEK' => '曜日',
  'LBL_CRONTAB_EXAMPLES' => '上記は標準のcrontab表記を用いています。',
  'LBL_ALWAYS' => '常に',
  'LBL_CATCH_UP' => '実行していなければ実行:',
  'LBL_CATCH_UP_WARNING' => 'このジョブの実行に時間がかかる場合はチェックをはずしてください。',
  'LBL_DATE_TIME_END' => '終了日時：',
  'LBL_DATE_TIME_START' => '開始日時：',
  'LBL_INTERVAL' => '間隔：',
  'LBL_JOB' => 'ジョブ：',
  'LBL_LAST_RUN' => '前回の実行',
  'LBL_MODULE_NAME' => 'Sugarスケジューラー',
  'LBL_MODULE_TITLE' => 'スケジューラー',
  'LBL_NAME' => 'ジョブ名：',
  'LBL_NEVER' => 'なし',
  'LBL_NEW_FORM_TITLE' => 'スケジューラー作成',
  'LBL_PERENNIAL' => '無期限',
  'LBL_SEARCH_FORM_TITLE' => 'スケジューラー検索',
  'LBL_SCHEDULER' => 'スケジューラー：',
  'LBL_STATUS' => 'ステータス',
  'LBL_TIME_FROM' => '開始時間：',
  'LBL_TIME_TO' => '終了時間：',
  'LBL_WARN_CURL_TITLE' => 'cURL警告：',
  'LBL_WARN_CURL' => '警告：',
  'LBL_WARN_NO_CURL' => 'このシステムはcURLライブラリが有効になっていないか、PHPモジュールにコンパイルされていません(--with-curl=/path/to/curl_library)。この問題を解決するためにはシステム管理者に連絡してください。cURLライブラリがなければスケジューラーがジョブを実行できません。',
  'LBL_BASIC_OPTIONS' => '基本オプション',
  'LBL_ADV_OPTIONS' => '拡張オプション',
  'LBL_TOGGLE_ADV' => '拡張オプション',
  'LBL_TOGGLE_BASIC' => '基本オプション',
  'LNK_LIST_SCHEDULER' => 'スケジューラー',
  'LNK_NEW_SCHEDULER' => 'スケジューラー作成',
  'LNK_LIST_SCHEDULED' => 'スケジュール済みジョブ',
  'SOCK_GREETING' => 'これはSugarCRMスケジューラーのインターフェースです。<br />[ 使用可能なデーモンコマンド: start|restart|shutdown|status ]<br />終了するには「quit」を、サービスをシャットダウンするには「shutdown」を入力してください。',
  'ERR_DELETE_RECORD' => 'スケジュールを削除する場合はレコード番号を指定してください。',
  'ERR_CRON_SYNTAX' => '不正なcron文法',
  'NTC_DELETE_CONFIRMATION' => '本当にこのレコードを削除してよいですか？',
  'NTC_STATUS' => 'スケジューラーのドロップダウンから削除する場合はステータスを非アクティブにしてください。',
  'NTC_LIST_ORDER' => 'このスケジュールがスケジューラードロップダウンで表示される順番を指定してください。',
  'LBL_CRON_INSTRUCTIONS_WINDOWS' => 'Windowsのスケジューラーを設定するには',
  'LBL_CRON_INSTRUCTIONS_LINUX' => 'Crontab設定方法',
  'LBL_CRON_LINUX_DESC' => '以下を参考にcron.phpを実行する行をcrontabに追加：',
  'LBL_CRON_WINDOWS_DESC' => '以下の例を参考にcron.phpを実行するバッチファイルを作って下さい：',
  'LBL_NO_PHP_CLI' => 'ホスト環境でPHPバイナリが使用できない場合、wgetかcurlを利用してジョブを実行させることができます。<br>wget用: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;wget --quiet --non-verbose /cron.php > /dev/null 2>&1</b><br>curl用: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;curl --silent /cron.php > /dev/null 2>&1',
  'LBL_JOBS_SUBPANEL_TITLE' => 'アクティブなジョブ',
  'LBL_EXECUTE_TIME' => '実行時間',
  'LBL_REFRESHJOBS' => 'ジョブを更新',
  'LBL_POLLMONITOREDINBOXES' => 'インバウンドメールのアカウントを確認',
  'LBL_RUNMASSEMAILCAMPAIGN' => '毎夜間にキャンペーンの一括メール送信を実行',
  'LBL_POLLMONITOREDINBOXESFORBOUNCEDCAMPAIGNEMAILS' => '毎夜間にキャンペーンのバウンスメールを処理',
  'LBL_PRUNEDATABASE' => '月次の第一日にデータベースを圧縮',
  'LBL_TRIMTRACKER' => 'トラッカーテーブルを圧縮',
  'LBL_PROCESSWORKFLOW' => 'ワークフロータスクを実行',
  'LBL_PROCESSQUEUE' => 'スケジュ－ルされたレポートを作成',
  'LBL_UPDATETRACKERSESSIONS' => 'トラッカーセションテーブルを更新',
);

