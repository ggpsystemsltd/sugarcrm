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
  'LBL_CREATED_BY' => '作成者',
  'LBL_MODULE_NAME' => '通貨',
  'LBL_LIST_FORM_TITLE' => '通貨',
  'LBL_CURRENCY' => '通貨名',
  'LBL_ADD' => '追加',
  'LBL_MERGE' => '通貨統合',
  'LBL_MERGE_TXT' => '選択された通貨にマップしたい通貨を選んでください。これによってチェックマークのついた通貨は削除され、それらに連動していたデータは選択された通貨に連動されます。',
  'LBL_US_DOLLAR' => 'USドル',
  'LBL_DELETE' => '削除',
  'LBL_LIST_SYMBOL' => '通貨シンボル',
  'LBL_LIST_NAME' => '通貨名',
  'LBL_LIST_ISO4217' => 'ISO 4217コード',
  'LBL_LIST_ISO4217_HELP' => 'ISO 4217に準拠した3文字の通貨コードを入力してください。',
  'LBL_UPDATE' => '更新',
  'LBL_LIST_RATE' => '換算レート',
  'LBL_LIST_RATE_HELP' => 'デフォルト通貨が日本円で1USドル = 100円の時、USドルの換算レートは0.01(= 1/100)となります。',
  'LBL_LIST_STATUS' => 'ステータス',
  'LNK_NEW_CONTACT' => '取引先担当者作成',
  'LNK_NEW_ACCOUNT' => '取引先作成',
  'LNK_NEW_OPPORTUNITY' => '商談作成',
  'LNK_NEW_CASE' => 'ケース作成',
  'LNK_NEW_NOTE' => 'メモ作成',
  'LNK_NEW_CALL' => '電話作成',
  'LNK_NEW_EMAIL' => '電子メール作成',
  'LNK_NEW_MEETING' => '会議作成',
  'LNK_NEW_TASK' => 'タスク作成',
  'NTC_DELETE_CONFIRMATION' => 'このレコードを削除しても良いですか？ この通貨を用いていたデータはシステムデフォルトの通貨に変換されます。ステータスを非アクティブにする方法を推奨します。',
  'LBL_BELOW_MIN' => '菅さんレートは0以上である必要があります。',
  'currency_status_dom' => 
  array (
    'Active' => 'アクティブ',
    'Inactive' => '非アクティブ',
  ),
);

