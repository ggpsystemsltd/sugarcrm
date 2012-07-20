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
  'LBL_ASSIGNED_TO_ID' => 'アサイン先ID',
  'LBL_ASSIGNED_TO_NAME' => 'アサイン先',
  'LBL_ID' => 'ID',
  'LBL_DATE_ENTERED' => '作成日',
  'LBL_DATE_MODIFIED' => '更新日',
  'LBL_MODIFIED' => '更新者',
  'LBL_MODIFIED_ID' => '更新者ID',
  'LBL_MODIFIED_NAME' => '更新者名',
  'LBL_CREATED' => '作成者',
  'LBL_CREATED_ID' => '作成者ID',
  'LBL_DESCRIPTION' => '詳細',
  'LBL_DELETED' => '削除済み',
  'LBL_NAME' => '名前',
  'LBL_CREATED_USER' => '作成ユーザ',
  'LBL_MODIFIED_USER' => '更新ユーザ',
  'LBL_LIST_NAME' => '名前',
  'LBL_TEAM' => 'チーム',
  'LBL_TEAMS' => 'チーム',
  'LBL_TEAM_ID' => 'チームID',
  'LBL_LIST_FORM_TITLE' => '外部アカウント一覧',
  'LBL_MODULE_NAME' => '外部アカウント',
  'LBL_MODULE_TITLE' => '外部アカウント',
  'LBL_HOMEPAGE_TITLE' => '私のアカウント',
  'LNK_NEW_RECORD' => '外部アカウントの作成',
  'LNK_LIST' => '外部アカウントの閲覧',
  'LNK_IMPORT_SUGAR_EAPM' => '外部アカウントのインポート',
  'LBL_SEARCH_FORM_TITLE' => '外部ソースの検索',
  'LBL_HISTORY_SUBPANEL_TITLE' => '履歴',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => '活動',
  'LBL_SUGAR_EAPM_SUBPANEL_TITLE' => '外部アカウント',
  'LBL_NEW_FORM_TITLE' => '外部アカウントの作成',
  'LBL_PASSWORD' => 'パスワード',
  'LBL_USER_NAME' => 'ユーザ名',
  'LBL_URL' => 'URL',
  'LBL_APPLICATION' => 'アプリケーション',
  'LBL_API_DATA' => 'APIデータ',
  'LBL_API_TYPE' => 'ログインタイプ',
  'LBL_API_CONSKEY' => 'Consumer Key',
  'LBL_API_CONSSECRET' => 'Consumer Secret',
  'LBL_API_OAUTHTOKEN' => 'OAuthトークン',
  'LBL_AUTH_UNSUPPORTED' => 'この認証方法はアプリケーションがサポートしていません。',
  'LBL_AUTH_ERROR' => 'このアカウントへの接続が失敗しました。',
  'LBL_VALIDATED' => '接続',
  'LBL_ACTIVE' => 'アクティブ',
  'LBL_OAUTH_NAME' => '%s',
  'LBL_SUGAR_USER_NAME' => 'Sugarユーザ',
  'LBL_DISPLAY_PROPERTIES' => '属性の表示',
  'LBL_CONNECT_BUTTON_TITLE' => '接続',
  'LBL_NOTE' => 'メモ',
  'LBL_CONNECTED' => '接続済み',
  'LBL_DISCONNECTED' => '未接続',
  'LBL_ERR_NO_AUTHINFO' => 'このアカウントの認証情報がありません。',
  'LBL_ERR_NO_TOKEN' => 'このアカウントのログイントークンがありません。',
  'LBL_ERR_FAILED_QUICKCHECK' => '{0} アカウントには接続していません。OKを押下するとアカウントに接続して接続を再度アクティブにします。',
  'LBL_MEET_NOW_BUTTON' => 'すぐ会議',
  'LBL_VIEW_LOTUS_LIVE_MEETINGS' => '直近のLotusLive™ Meetingsを見る',
  'LBL_TITLE_LOTUS_LIVE_MEETINGS' => '直近のLotusLive™ Meetings',
  'LBL_VIEW_LOTUS_LIVE_DOCUMENTS' => 'LotusLive™ファイルを見る',
  'LBL_TITLE_LOTUS_LIVE_DOCUMENTS' => 'LotusLive™ファイル',
  'LBL_REAUTHENTICATE_LABEL' => '再認証',
  'LBL_REAUTHENTICATE_KEY' => 'a',
  'LBL_APPLICATION_FOUND_NOTICE' => 'このアプリケーションのアカウントは既に存在します。既存のアカウントに戻しました。',
  'LBL_OMIT_URL' => '（http://またはhttps://は不要）',
  'LBL_OAUTH_SAVE_NOTICE' => '接続を押下すると、Sugarからアカウントにアクセスする情報を入力する画面に移動します。接続するとSugarに戻ります。',
  'LBL_BASIC_SAVE_NOTICE' => '接続を押下してこのアカウントをSugarに接続してください。',
  'LBL_ERR_FACEBOOK' => 'Facebookがエラーを返しました。フィードは表示されません。',
  'LBL_ERR_NO_RESPONSE' => 'このアカウントに接続する際にエラーが発生しました。',
  'LBL_ERR_TWITTER' => 'Twitterがエラーを返しました。フィードは表示されません。',
  'LBL_ERR_POPUPS_DISABLED' => 'ブラウザのポップアップを許可するようにしてください。もしくは、"{0}" サイトを例外として追加して接続してください。',
);

