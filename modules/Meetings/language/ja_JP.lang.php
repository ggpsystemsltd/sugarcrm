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
  'LBL_TYPE' => '会議タイプ',
  'LBL_PASSWORD' => '会議パスワード',
  'LBL_URL' => '会議の開始／参加',
  'LBL_CREATOR' => '会議の作成者',
  'LBL_EXTERNALID' => '外部アプリID',
  'LBL_LIST_JOIN_MEETING' => '会議に参加',
  'LBL_JOIN_EXT_MEETING' => '会議に参加',
  'LBL_HOST_EXT_MEETING' => '会議を開始',
  'LBL_EXTNOT_HEADER' => 'エラー：参加していません。',
  'LBL_EXTNOT_MAIN' => 'あなたは招待されていないのでこの会議に参加できません。',
  'LBL_EXTNOT_RECORD_LINK' => '会議を閲覧',
  'LBL_EXTNOT_GO_BACK' => '前のレコードに戻る',
  'LBL_EXTNOSTART_HEADER' => 'エラー：会議を開始できません。',
  'LBL_EXTNOSTART_MAIN' => 'あなたはこの会議の管理者でもなく会議の所有者でもないので、会議を開始できません。',
  'LBL_COLON' => ':',
  'LBL_OUTLOOK_ID' => 'Outlook ID',
  'LBL_SEND_BUTTON_KEY' => 'I',
  'ERR_DELETE_RECORD' => '会議を削除するにはレコード番号を指定する必要があります。',
  'LBL_ACCEPT_THIS' => '承諾？',
  'LBL_ADD_BUTTON' => '追加',
  'LBL_ADD_INVITEE' => '参加者追加',
  'LBL_CONTACT_NAME' => '取引先担当者:',
  'LBL_CONTACTS_SUBPANEL_TITLE' => '取引先担当者',
  'LBL_CREATED_BY' => '作成者',
  'LBL_DATE_END' => '終了日',
  'LBL_DATE_TIME' => '開始日時:',
  'LBL_DATE' => '開始日:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => '会議',
  'LBL_DEL' => '削除',
  'LBL_DESCRIPTION_INFORMATION' => '詳細情報',
  'LBL_DESCRIPTION' => '詳細:',
  'LBL_DURATION_HOURS' => '時間:',
  'LBL_DURATION_MINUTES' => '分:',
  'LBL_DURATION' => '時間:',
  'LBL_EMAIL' => '電子メール',
  'LBL_FIRST_NAME' => '名',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'メモ',
  'LBL_HOURS_ABBREV' => '時間',
  'LBL_HOURS_MINS' => '(時/分)',
  'LBL_INVITEE' => '参加者一覧',
  'LBL_LAST_NAME' => '姓',
  'LBL_ASSIGNED_TO_NAME' => 'アサイン先:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'アサイン先ユーザ',
  'LBL_LIST_CLOSE' => '完了',
  'LBL_LIST_CONTACT' => '取引先担当者',
  'LBL_LIST_DATE_MODIFIED' => '更新日',
  'LBL_LIST_DATE' => '実施日',
  'LBL_LIST_DIRECTION' => '方向',
  'LBL_LIST_DUE_DATE' => '期限日',
  'LBL_LIST_FORM_TITLE' => '会議一覧',
  'LBL_LIST_MY_MEETINGS' => '私の会議',
  'LBL_LIST_RELATED_TO' => '関連先',
  'LBL_LIST_STATUS' => 'ステータス',
  'LBL_LIST_SUBJECT' => '件名',
  'LBL_LIST_TIME' => '開始時間',
  'LBL_LEADS_SUBPANEL_TITLE' => 'リード',
  'LBL_LOCATION' => '場所:',
  'LBL_MEETING' => '会議:',
  'LBL_MINSS_ABBREV' => '分',
  'LBL_MODIFIED_BY' => '更新者',
  'LBL_MODULE_NAME' => '会議',
  'LBL_MODULE_TITLE' => '会議: ホーム',
  'LBL_NAME' => '名前',
  'LBL_NEW_FORM_TITLE' => 'アポイント作成',
  'LBL_PHONE' => '会社電話:',
  'LBL_REMINDER_TIME' => 'リマインダ時間',
  'LBL_REMINDER' => 'リマインダ:',
  'LBL_REMOVE' => '削除',
  'LBL_SCHEDULING_FORM_TITLE' => 'スケジューリング',
  'LBL_SEARCH_BUTTON' => '検索',
  'LBL_SEARCH_FORM_TITLE' => '会議検索',
  'LBL_SEND_BUTTON_LABEL' => '招待送信',
  'LBL_SEND_BUTTON_TITLE' => '招待送信 [Alt+I]',
  'LBL_STATUS' => 'ステータス:',
  'LBL_SUBJECT' => '件名:',
  'LBL_TIME' => '開始時間:',
  'LBL_USERS_SUBPANEL_TITLE' => 'ユーザ',
  'LBL_ACTIVITIES_REPORTS' => '活動レポート',
  'LNK_MEETING_LIST' => '会議の閲覧',
  'LNK_NEW_APPOINTMENT' => 'アポイントの作成',
  'LNK_NEW_MEETING' => '会議のスケジュール',
  'LNK_IMPORT_MEETINGS' => '会議のインポート',
  'NTC_REMOVE_INVITEE' => '本当にこの参加者を会議から削除して良いですか？',
  'LBL_CREATED_USER' => '作成者',
  'LBL_MODIFIED_USER' => '更新者',
  'NOTICE_DURATION_TIME' => '時間は0以上である必要があります。',
  'LBL_MEETING_INFORMATION' => '会議の概要',
);

