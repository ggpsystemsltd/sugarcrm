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
  'LBL_COLON' => '：',
  'LBL_NEW_TASK_BUTTON_KEY' => 'N',
  'LBL_SCHEDULE_MEETING_BUTTON_KEY' => 'M',
  'LBL_SCHEDULE_CALL_BUTTON_KEY' => 'C',
  'LBL_NEW_NOTE_BUTTON_KEY' => 'T',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_MODULE_NAME' => '活動',
  'LBL_MODULE_TITLE' => '活動: ホーム',
  'LBL_SEARCH_FORM_TITLE' => '活動検索',
  'LBL_LIST_FORM_TITLE' => '活動',
  'LBL_LIST_SUBJECT' => '件名',
  'LBL_LIST_CONTACT' => '取引先担当者',
  'LBL_LIST_RELATED_TO' => '関連先',
  'LBL_LIST_DATE' => '日付',
  'LBL_LIST_TIME' => '開始時間',
  'LBL_LIST_CLOSE' => '完了',
  'LBL_SUBJECT' => '件名:',
  'LBL_STATUS' => 'ステータス:',
  'LBL_LOCATION' => '場所:',
  'LBL_DATE_TIME' => '開始日時:',
  'LBL_DATE' => '開始日:',
  'LBL_TIME' => '開始時間:',
  'LBL_DURATION' => '時間:',
  'LBL_DURATION_MINUTES' => '分:',
  'LBL_HOURS_MINS' => '(時/分)',
  'LBL_CONTACT_NAME' => '取引先担当者:',
  'LBL_MEETING' => '会議:',
  'LBL_DESCRIPTION_INFORMATION' => '詳細情報',
  'LBL_DESCRIPTION' => '詳細:',
  'LNK_NEW_CALL' => '電話作成',
  'LNK_NEW_MEETING' => '会議作成',
  'LNK_NEW_TASK' => 'タスク作成',
  'LNK_NEW_NOTE' => 'メモ作成',
  'LNK_NEW_EMAIL' => '電子メール作成・保存',
  'LNK_CALL_LIST' => '電話',
  'LNK_MEETING_LIST' => '会議',
  'LNK_TASK_LIST' => 'タスク',
  'LNK_NOTE_LIST' => 'メモ',
  'LNK_EMAIL_LIST' => '電子メール',
  'ERR_DELETE_RECORD' => '取引先を削除するためにはレコード番号を指定する必要があります。',
  'NTC_REMOVE_INVITEE' => '本当にこの参加者を会議から削除して良いですか？',
  'LBL_INVITEE' => '参加者一覧',
  'LBL_LIST_DIRECTION' => '方向',
  'LBL_DIRECTION' => '方向',
  'LNK_NEW_APPOINTMENT' => 'アポイント作成',
  'LNK_VIEW_CALENDAR' => '今日',
  'LBL_OPEN_ACTIVITIES' => '未実施の活動',
  'LBL_HISTORY' => '履歴',
  'LBL_UPCOMING' => '一週間の予定',
  'LBL_TODAY' => '表示範囲',
  'LBL_NEW_TASK_BUTTON_TITLE' => 'タスク作成 [Alt+N]',
  'LBL_NEW_TASK_BUTTON_LABEL' => 'タスク作成',
  'LBL_SCHEDULE_MEETING_BUTTON_TITLE' => '会議作成 [Alt+M]',
  'LBL_SCHEDULE_MEETING_BUTTON_LABEL' => '会議作成',
  'LBL_SCHEDULE_CALL_BUTTON_TITLE' => '電話作成 [Alt+C]',
  'LBL_SCHEDULE_CALL_BUTTON_LABEL' => '電話作成',
  'LBL_NEW_NOTE_BUTTON_TITLE' => 'メモ作成 [Alt+T]',
  'LBL_NEW_NOTE_BUTTON_LABEL' => 'メモ作成',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => '電子メール作成・保存 [Alt+K]',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => '電子メール作成・保存',
  'LBL_LIST_STATUS' => 'ステータス',
  'LBL_LIST_DUE_DATE' => '期限日',
  'LBL_LIST_LAST_MODIFIED' => '最終更新日',
  'NTC_NONE_SCHEDULED' => '予定はありません',
  'LNK_IMPORT_CALLS' => '電話のインポート',
  'LNK_IMPORT_MEETINGS' => '会議のインポート',
  'LNK_IMPORT_TASKS' => 'タスクのインポート',
  'LNK_IMPORT_NOTES' => 'メモのインポート',
  'NTC_NONE' => 'なし',
  'LBL_ACCEPT_THIS' => '承諾？',
  'LBL_DEFAULT_SUBPANEL_TITLE' => '未実施の活動',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'アサイン先ユーザ',
  'appointment_filter_dom' => 
  array (
    'today' => '今日',
    'tomorrow' => '明日',
    'this Saturday' => '今週',
    'next Saturday' => '来週',
    'last this_month' => '今月',
    'last next_month' => '来月',
  ),
);

