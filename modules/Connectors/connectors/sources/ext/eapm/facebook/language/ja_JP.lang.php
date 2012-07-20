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
  'LBL_LICENSING_INFO' => 'Facebook©でSugarインスタンスを新規アプリケーションとして登録し、ＡＰＩキーとシークレットを取得してください。<br /><br />登録方法は下記の通りです。<br /><br />1. http://www.facebook.com/developers/createapp.phpを訪問し、アプリケーションを生成してください。<br />2. アプリケーションを生成するアカウントでサインインしてください。<br />3. アプリケーションの生成ページでアプリケーションの名前を入力してください。これは、Sugar内部でFacebook©アカウントを認証する際にユーザが認識する名前です。<br />4. Facebook©利用規約に同意してください。<br />5. アプリの生成をクリックしてください。<br />6. セキュリティワードを入力してください。<br />7. 登録ページでWebサイトに進み、SugarインスタンスのURLを入力してください。<br />8. 更新を保存してください。<br />9. 左側メニューのFacebookインテグレーションのページに進み、APIキーとシークレットを確認してください。アプリケーションIDとシークレットを下記に入力してください。',
  'oauth_consumer_key' => 'APIキー',
  'oauth_consumer_secret' => 'アプリシークレット',
);

