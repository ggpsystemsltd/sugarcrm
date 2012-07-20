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

	

$connector_strings = array (
  'LBL_LICENSING_INFO' => 'Twitter©でSugarインスタンスを新規アプリケーションとして登録し、Consumer KeyとSecretを取得してください。<br /><br />登録方法は下記の通りです。<br /><br />1. Twitter©ディベロッパーサイト（http://dev.twitter.com/apps/new）を訪問します。<br />2. アプリケーションを登録するアカウントでサインインします。<br />3. 登録フォームにアプリケーション名を入力します。これは、Sugar内部からTwitterを認証する際にユーザが識別する名前になります。<br />4. 備考を入力します。<br />5. アプリケーションのURLを入力します。<br />6. アプリケーションタイプとしてブラウザを選択します。<br />7. コールバックURLを入力します。（Sugarは認証の際にここをバイパスするので、何でも構いません）<br />8. セキュリティワードを入力します。<br />9. アプリケーションの登録をクリックします。<br />10. Twitter APIの利用規約に同意します。<br />11. アプリケーションページでConsumer KeyとConsumer Secretを確認し、以下に入力します。',
  'oauth_consumer_key' => 'Consumer Key',
  'oauth_consumer_secret' => 'Consumer Secret',
  'company_url' => 'URL',
  'LBL_NAME' => 'ツイッター・ユーザ名',
  'LBL_ID' => 'ツイッター・ユーザ名',
);

