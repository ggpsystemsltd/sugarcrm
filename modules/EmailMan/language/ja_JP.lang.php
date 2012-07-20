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
  'LBL_OUTGOING_SECTION_HELP' => 'ワークフローの通知を含む電子メールによる通知を送信するメールサーバの設定を行います。',
  'LBL_SEND_DATE_TIME' => '送信日',
  'LBL_IN_QUEUE' => 'キューイング中',
  'LBL_IN_QUEUE_DATE' => 'キューに入った日',
  'ERR_INT_ONLY_EMAIL_PER_RUN' => 'バッチごとの送信メール数の値は整数である必要があります',
  'LBL_ATTACHMENT_AUDIT' => 'は送信されました。ディスク使用を節約するため、ローカルでは複製されていません。',
  'LBL_CONFIGURE_SETTINGS' => '設定',
  'LBL_CUSTOM_LOCATION' => 'ユーザが設定',
  'LBL_DEFAULT_LOCATION' => 'デフォルト',
  'LBL_DISCLOSURE_TITLE' => '開示メッセージをすべてのメールに付加',
  'LBL_DISCLOSURE_TEXT_TITLE' => '開示内容',
  'LBL_DISCLOSURE_TEXT_SAMPLE' => '注意：この電子メールは意図された受信者だけが利用することができます。また、機密性を持ち権限許可が必要なメッセージである可能性があります。本電子メールを許可なく閲覧、利用、開示、配布することは禁じられています。あなたが意図された受信者でない場合、オリジナルの電子メールおよびそのコピーをすべて破棄し、送信者にアドレスを訂正すべき旨通知してください。',
  'LBL_EMAIL_DEFAULT_CHARSET' => '文字セット',
  'LBL_EMAIL_DEFAULT_EDITOR' => 'メールクライアント',
  'LBL_EMAIL_DEFAULT_DELETE_ATTACHMENTS' => '電子メールの削除の際に関連メモと添付ファイルを削除',
  'LBL_EMAIL_GMAIL_DEFAULTS' => 'Gmailのデフォルト設定を埋め込む',
  'LBL_EMAIL_PER_RUN_REQ' => '１回のバッチで送信されるメール数:',
  'LBL_EMAIL_SMTP_SSL' => 'SMTP over SSLを有効',
  'LBL_EMAIL_USER_TITLE' => 'メール作成の設定',
  'LBL_EMAIL_OUTBOUND_CONFIGURATION' => '電子メール送信の設定',
  'LBL_EMAILS_PER_RUN' => '１回のバッチで送信されるメール数:',
  'LBL_ID' => 'ID',
  'LBL_LIST_CAMPAIGN' => 'キャンペーン',
  'LBL_LIST_FORM_PROCESSED_TITLE' => '処理済みメール一覧',
  'LBL_LIST_FORM_TITLE' => 'メールキュー一覧',
  'LBL_LIST_FROM_EMAIL' => 'From(アドレス)',
  'LBL_LIST_FROM_NAME' => 'From（名前）',
  'LBL_LIST_IN_QUEUE' => '進行中',
  'LBL_LIST_MESSAGE_NAME' => 'マーケティングメッセージ',
  'LBL_LIST_RECIPIENT_EMAIL' => '受信者メールアドレス',
  'LBL_LIST_RECIPIENT_NAME' => '受信者氏名',
  'LBL_LIST_SEND_ATTEMPTS' => '送信回数',
  'LBL_LIST_SEND_DATE_TIME' => '送信日',
  'LBL_LIST_USER_NAME' => 'ユーザ名',
  'LBL_LOCATION_ONLY' => '場所',
  'LBL_LOCATION_TRACK' => 'キャンペーントラッキングファイルの場所（例: campaign_tracker.php）',
  'LBL_CAMP_MESSAGE_COPY' => 'キャンペーンメッセージのコピーを保存:',
  'LBL_CAMP_MESSAGE_COPY_DESC' => 'すべてのキャンペーンで送信した<bold>それぞれの</bold>電子メールメッセージの完全なコピーを保存しますか？  <bold>いいえを選ぶことをお勧めします。</bold>.  いいえを選ぶと送信したテンプレートのみを保存し、必要な変数は個々のメッセージで再生成されます。',
  'LBL_MAIL_SENDTYPE' => 'メール送信エージェント:',
  'LBL_MAIL_SMTPAUTH_REQ' => 'SMTP認証を利用',
  'LBL_MAIL_SMTPPASS' => 'SMTPパスワード:',
  'LBL_MAIL_SMTPPORT' => 'SMTPポート番号:',
  'LBL_MAIL_SMTPSERVER' => 'SMTPサーバ名:',
  'LBL_MAIL_SMTPUSER' => 'SMTPユーザ名:',
  'LBL_CHOOSE_EMAIL_PROVIDER' => '電子メールプロバイダを選択',
  'LBL_YAHOOMAIL_SMTPPASS' => 'Yahoo!メールパスワード',
  'LBL_YAHOOMAIL_SMTPUSER' => 'Yahoo!メールID',
  'LBL_GMAIL_SMTPPASS' => 'Gmailパスワード',
  'LBL_GMAIL_SMTPUSER' => 'Gmail電子メールアドレス',
  'LBL_EXCHANGE_SMTPPASS' => 'Exchangeパスワード',
  'LBL_EXCHANGE_SMTPUSER' => 'Exchangeユーザ名',
  'LBL_EXCHANGE_SMTPPORT' => 'Exchangeサーバポート',
  'LBL_EXCHANGE_SMTPSERVER' => 'Exchangeサーバ',
  'LBL_EMAIL_LINK_TYPE' => '電子メールクライアント',
  'LBL_EMAIL_LINK_TYPE_HELP' => '<b>Sugarメールクライアント：</b>SugarCRMのメールクライアントからメールを送信<br><b>外部メールクライアント：</b>Microsoft Outlookなど、SugarCRMの外部の電子メールクライアントよりメールを送信',
  'LBL_MARKETING_ID' => 'マーケティングID',
  'LBL_MODULE_ID' => '電子メールマネージャ',
  'LBL_MODULE_NAME' => 'メール設定',
  'LBL_CONFIGURE_CAMPAIGN_EMAIL_SETTINGS' => 'キャンペーンメールの設定',
  'LBL_MODULE_TITLE' => 'メールキューの管理',
  'LBL_NOTIFICATION_ON_DESC' => 'レコードがアサインされた際に通知を送信',
  'LBL_NOTIFY_FROMADDRESS' => 'From（アドレス）:',
  'LBL_NOTIFY_FROMNAME' => 'From(名前):',
  'LBL_NOTIFY_ON' => '通知を有効',
  'LBL_NOTIFY_SEND_BY_DEFAULT' => 'ユーザ作成時にデフォルトで通知の設定を有効',
  'LBL_NOTIFY_TITLE' => '電子メール通知の設定',
  'LBL_OLD_ID' => '旧ID',
  'LBL_OUTBOUND_EMAIL_TITLE' => 'アウトバウンドメールの設定',
  'LBL_RELATED_ID' => '関連ID',
  'LBL_RELATED_TYPE' => '関連タイプ',
  'LBL_SAVE_OUTBOUND_RAW' => 'メールを加工せずに保存',
  'LBL_SEARCH_FORM_PROCESSED_TITLE' => '処理済みメール検索',
  'LBL_SEARCH_FORM_TITLE' => 'メールキュー検索',
  'LBL_VIEW_PROCESSED_EMAILS' => '処理済みメール一覧',
  'LBL_VIEW_QUEUED_EMAILS' => 'メールキュー',
  'TRACKING_ENTRIES_LOCATION_DEFAULT_VALUE' => 'config.phpで設定されたサイトURL',
  'TXT_REMOVE_ME_ALT' => 'この電子メールリストからあなた自身を除外するにはこちら',
  'TXT_REMOVE_ME_CLICK' => 'ここをクリック',
  'TXT_REMOVE_ME' => 'この電子メールリストからあなた自身を除外するには',
  'LBL_NOTIFY_SEND_FROM_ASSIGNING_USER' => 'アサインしたユーザのメールアドレスで送信',
  'LBL_SECURITY_TITLE' => '電子メールのセキュリティ設定',
  'LBL_SECURITY_DESC' => '以下のタグのうち、メール表示時に無効にするものをチェックしてください。',
  'LBL_SECURITY_APPLET' => 'Appletタグ',
  'LBL_SECURITY_BASE' => 'Baseタグ',
  'LBL_SECURITY_EMBED' => 'Embedタグ',
  'LBL_SECURITY_FORM' => 'Formタグ',
  'LBL_SECURITY_FRAME' => 'Frameタグ',
  'LBL_SECURITY_FRAMESET' => 'Framesetタグ',
  'LBL_SECURITY_IFRAME' => 'iFrameタグ',
  'LBL_SECURITY_IMPORT' => 'Importタグ',
  'LBL_SECURITY_LAYER' => 'Layerタグ',
  'LBL_SECURITY_LINK' => 'Linkタグ',
  'LBL_SECURITY_OBJECT' => 'Objectタグ',
  'LBL_SECURITY_OUTLOOK_DEFAULTS' => 'Outlookで作成されたメールを正しく表示するための、必要最低限のセキュリティ設定を選択します。',
  'LBL_SECURITY_SCRIPT' => 'Scriptタグ',
  'LBL_SECURITY_STYLE' => 'Styleタグ',
  'LBL_SECURITY_TOGGLE_ALL' => 'すべてのタグを選択します。',
  'LBL_SECURITY_XMP' => 'Xmpタグ',
  'LBL_YES' => 'はい',
  'LBL_NO' => 'いいえ',
  'LBL_PREPEND_TEST' => '[テスト]:',
  'LBL_SEND_ATTEMPTS' => 'テスト送信',
  'LBL_ALLOW_DEFAULT_SELECTION' => 'ユーザがこのアカウントを送信用に利用可能とする:',
  'LBL_ALLOW_DEFAULT_SELECTION_HELP' => 'このオプションが選択された場合、すべてのユーザは同じ送信アカウントから<br>通知や通知を送信することが可能になります。このオプションを選択しない場合でも、<br>ユーザは自身の送信アカウントを設定することによって当該送信サーバから電子メールを送信できます。',
  'LBL_FROM_ADDRESS_HELP' => '有効の場合、アサイン先ユーザ名と電子メールアドレスがFromフィールドにセットされます。ただし、メールアカウントと異なるアドレスからメールを送信できないSMTPでは利用できません。',
);

