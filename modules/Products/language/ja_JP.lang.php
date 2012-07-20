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
  'LBL_MODULE_NAME' => '商品',
  'LBL_MODULE_TITLE' => '商品: ホーム',
  'LBL_SEARCH_FORM_TITLE' => '商品検索',
  'LBL_LIST_FORM_TITLE' => '商品一覧',
  'LBL_NEW_FORM_TITLE' => '商品作成',
  'LBL_PRODUCT' => '商品:',
  'LBL_RELATED_PRODUCTS' => '関連商品',
  'LBL_LIST_NAME' => '商品',
  'LBL_LIST_MANUFACTURER' => '製造元',
  'LBL_LIST_LBL_MFT_PART_NUM' => '製造元番号',
  'LBL_LIST_QUANTITY' => '数量',
  'LBL_LIST_COST_PRICE' => '原価',
  'LBL_LIST_DISCOUNT_PRICE' => '単価',
  'LBL_LIST_LIST_PRICE' => '表示価格',
  'LBL_LIST_STATUS' => 'ステータス',
  'LBL_LIST_ACCOUNT_NAME' => '取引先',
  'LBL_LIST_CONTACT_NAME' => '取引先担当者',
  'LBL_LIST_QUOTE_NAME' => '見積名',
  'LBL_LIST_DATE_PURCHASED' => '購買日',
  'LBL_LIST_SUPPORT_EXPIRES' => '期限切れ',
  'LBL_NAME' => '商品:',
  'LBL_URL' => '商品URL:',
  'LBL_QUOTE_NAME' => '見積名:',
  'LBL_CONTACT_NAME' => '取引先担当者:',
  'LBL_DATE_PURCHASED' => '購買日:',
  'LBL_DATE_SUPPORT_EXPIRES' => 'サポート終了日:',
  'LBL_DATE_SUPPORT_STARTS' => 'サポート開始日:',
  'LBL_COST_PRICE' => '原価:',
  'LBL_DISCOUNT_PRICE' => '単価:',
  'LBL_DEAL_TOT' => '値引:',
  'LBL_DISCOUNT_RATE' => '値引率',
  'LBL_DISCOUNT_RATE_USDOLLAR' => '値引率（USドル）',
  'LBL_DISCOUNT_TOTAL' => '総値引',
  'LBL_DISCOUNT_TOTAL_USDOLLAR' => '値引（USドル）',
  'LBL_SELECT_DISCOUNT' => '値引%',
  'LBL_LIST_PRICE' => '表示価格:',
  'LBL_VENDOR_PART_NUM' => '販売元パートナンバー:',
  'LBL_MFT_PART_NUM' => '製造元パートナンバー:',
  'LBL_DISCOUNT_PRICE_DATE' => '値引日:',
  'LBL_WEIGHT' => '重量:',
  'LBL_DESCRIPTION' => '詳細:',
  'LBL_TYPE' => 'タイプ:',
  'LBL_CATEGORY' => 'カテゴリ:',
  'LBL_QUANTITY' => '数量:',
  'LBL_STATUS' => 'ステータス:',
  'LBL_TAX_CLASS' => '税区分:',
  'LBL_MANUFACTURER' => '製造元',
  'LBL_SUPPORT_DESCRIPTION' => 'サポート詳細:',
  'LBL_SUPPORT_TERM' => 'サポート期間:',
  'LBL_SUPPORT_NAME' => 'サポート名:',
  'LBL_SUPPORT_CONTACT' => 'サポート問合せ先:',
  'LBL_PRICING_FORMULA' => '価格計算式:',
  'LBL_ACCOUNT_NAME' => '取引先:',
  'LNK_PRODUCT_LIST' => '商品',
  'LNK_NEW_PRODUCT' => '商品作成',
  'NTC_DELETE_CONFIRMATION' => '本当にこのレコードを削除して良いですか？',
  'NTC_REMOVE_CONFIRMATION' => '本当にこの商品の関連づけを削除して良いですか？',
  'ERR_DELETE_RECORD' => 'プロダクトを削除するにはレコード番号を指定する必要があります。',
  'LBL_CURRENCY' => '通貨:',
  'LBL_ASSET_NUMBER' => 'アセットナンバー:',
  'LBL_SERIAL_NUMBER' => 'シリアルナンバー:',
  'LBL_BOOK_VALUE' => '簿価設定:',
  'LBL_BOOK_VALUE_USDOLLAR' => '簿価（USドル）:',
  'LBL_BOOK_VALUE_DATE' => '簿価設定日:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => '商品',
  'LBL_RELATED_PRODUCTS_TITLE' => '関連商品',
  'LBL_WEBSITE' => 'Webサイト',
  'LBL_COST_USDOLLAR' => '原価（USドル）',
  'LBL_DISCOUNT_USDOLLAR' => '値引（USドル）',
  'LBL_LIST_USDOLLAR' => '表示価格（USドル）',
  'LBL_PRICING_FACTOR' => '価格設定要素',
  'LBL_ACCOUNT_ID' => '取引先ID',
  'LBL_CONTACT_ID' => '取引先担当者ID',
  'LBL_CATEGORY_NAME' => 'カテゴリ名:',
  'LBL_NOTES_SUBPANEL_TITLE' => 'メモ',
  'LBL_MEMBER_OF' => '親会社:',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'プロジェクト',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => '契約',
  'LBL_CONTRACTS' => '契約',
  'LBL_PRODUCT_CATEGORIES' => '商品カテゴリ',
  'LBL_PRODUCT_TYPES' => '商品タイプ',
  'LBL_ASSIGNED_TO_NAME' => 'アサイン先:',
  'LBL_PRODUCT_TEMPLATE_ID' => '商品テンプレートID:',
  'LBL_QUOTE_ID' => '見積ID',
  'LBL_CREATED_USER' => '作成者',
  'LBL_MODIFIED_USER' => '更新者',
  'LBL_QUOTE' => '見積',
  'LBL_CONTACT' => '取引先担当者',
  'LBL_DISCOUNT_AMOUNT' => '値引額',
  'LBL_CURRENCY_SYMBOL_NAME' => '通貨シンボル名',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => '商品',
  'LNK_IMPORT_PRODUCTS' => '商品のインポート',
);

