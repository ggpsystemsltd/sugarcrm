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
  'LBL_LAST_REV_MIME_TYPE' => '最終リビジョンのMIMEタイプ',
  'LBL_HOMEPAGE_TITLE' => '私のドキュメント',
  'LBL_LIST_FILENAME' => 'ファイル：',
  'LBL_FILE_UPLOAD' => 'ファイル：',
  'LBL_DOC_ID' => 'ドキュメントソースID',
  'LBL_DOC_TYPE' => 'ソース',
  'LBL_LIST_DOC_TYPE' => 'ソース',
  'LBL_DOC_TYPE_POPUP' => 'このドキュメントのアップロード先のソースを選択してください。',
  'LBL_DOC_URL' => 'ドキュメントソースURL',
  'LBL_SEARCH_EXTERNAL_DOCUMENT' => 'ファイル名',
  'LBL_EXTERNAL_DOCUMENT_NOTE' => '一覧には最も直近に更新された20のファイルが降順に表示されます。他のファイルは検索してください。',
  'LBL_LIST_EXT_DOCUMENT_NAME' => 'ファイル名',
  'LBL_ACCOUNTS_SUBPANEL_TITLE' => '取引先',
  'LBL_CONTACTS_SUBPANEL_TITLE' => '取引先担当者',
  'LBL_OPPORTUNITIES_SUBPANEL_TITLE' => '商談',
  'LBL_CASES_SUBPANEL_TITLE' => 'ケース',
  'LBL_BUGS_SUBPANEL_TITLE' => 'バグトラッカー',
  'LBL_QUOTES_SUBPANEL_TITLE' => '見積',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => '商品',
  'LBL_MODULE_NAME' => 'ドキュメント',
  'LBL_MODULE_TITLE' => 'ドキュメント: ホーム',
  'LNK_NEW_DOCUMENT' => 'ドキュメント作成',
  'LNK_DOCUMENT_LIST' => 'ドキュメント',
  'LBL_DOC_REV_HEADER' => 'ドキュメント版数',
  'LBL_SEARCH_FORM_TITLE' => 'ドキュメント検索',
  'LBL_DOCUMENT_ID' => 'ドキュメントID',
  'LBL_NAME' => 'ドキュメント名',
  'LBL_DESCRIPTION' => '詳細',
  'LBL_CATEGORY' => 'カテゴリ',
  'LBL_SUBCATEGORY' => 'サブカテゴリ',
  'LBL_STATUS' => 'ステータス',
  'LBL_CREATED_BY' => '作成者',
  'LBL_DATE_ENTERED' => '入力日',
  'LBL_DATE_MODIFIED' => '更新日',
  'LBL_DELETED' => '削除済み',
  'LBL_MODIFIED' => '更新者ID',
  'LBL_MODIFIED_USER' => '更新者',
  'LBL_CREATED' => '作成者',
  'LBL_REVISIONS' => 'リビジョン',
  'LBL_RELATED_DOCUMENT_ID' => '関連ドキュメントID',
  'LBL_RELATED_DOCUMENT_REVISION_ID' => '関連ドキュメント版数ID',
  'LBL_IS_TEMPLATE' => 'テンプレート',
  'LBL_TEMPLATE_TYPE' => 'ドキュメントタイプ',
  'LBL_ASSIGNED_TO_NAME' => 'アサイン先:',
  'LBL_REVISION_NAME' => '版数番号',
  'LBL_MIME' => 'Mimeタイプ',
  'LBL_REVISION' => '版数',
  'LBL_DOCUMENT' => '関連ドキュメント',
  'LBL_LATEST_REVISION' => '最新版数',
  'LBL_CHANGE_LOG' => '履歴:',
  'LBL_ACTIVE_DATE' => '発行日',
  'LBL_EXPIRATION_DATE' => '有効期限',
  'LBL_FILE_EXTENSION' => 'ファイル拡張子',
  'LBL_CAT_OR_SUBCAT_UNSPEC' => '未指定',
  'LBL_NEW_FORM_TITLE' => 'ドキュメント作成',
  'LBL_DOC_NAME' => 'ドキュメント名:',
  'LBL_FILENAME' => 'ファイル名:',
  'LBL_DOC_VERSION' => '版数:',
  'LBL_CATEGORY_VALUE' => 'カテゴリ:',
  'LBL_LIST_CATEGORY' => 'カテゴリ',
  'LBL_SUBCATEGORY_VALUE' => 'サブカテゴリ:',
  'LBL_DOC_STATUS' => 'ステータス:',
  'LBL_LAST_REV_CREATOR' => '版数作成者:',
  'LBL_LASTEST_REVISION_NAME' => '最終版数名：',
  'LBL_SELECTED_REVISION_NAME' => '選択版数名：',
  'LBL_CONTRACT_STATUS' => '契約ステータス：',
  'LBL_CONTRACT_NAME' => '契約名:',
  'LBL_LAST_REV_DATE' => '改版日:',
  'LBL_DOWNNLOAD_FILE' => 'ファイルダウンロード:',
  'LBL_DET_RELATED_DOCUMENT' => '関連ドキュメント:',
  'LBL_DET_RELATED_DOCUMENT_VERSION' => '関連ドキュメントのリビジョン:',
  'LBL_DET_IS_TEMPLATE' => 'テンプレート？ :',
  'LBL_DET_TEMPLATE_TYPE' => 'ドキュメントタイプ:',
  'LBL_TEAM' => 'チーム:',
  'LBL_DOC_DESCRIPTION' => '詳細:',
  'LBL_DOC_ACTIVE_DATE' => '発行日：',
  'LBL_DOC_EXP_DATE' => '有効期限：',
  'LBL_LIST_FORM_TITLE' => 'ドキュメント一覧',
  'LBL_LIST_DOCUMENT' => 'ドキュメント',
  'LBL_LIST_SUBCATEGORY' => 'サブカテゴリ',
  'LBL_LIST_REVISION' => '版数',
  'LBL_LIST_LAST_REV_CREATOR' => '発行者',
  'LBL_LIST_LAST_REV_DATE' => '改版日',
  'LBL_LIST_VIEW_DOCUMENT' => '閲覧',
  'LBL_LIST_DOWNLOAD' => 'ダウンロード',
  'LBL_LIST_ACTIVE_DATE' => '発行日',
  'LBL_LIST_EXP_DATE' => '有効期限',
  'LBL_LIST_STATUS' => 'ステータス',
  'LBL_LINKED_ID' => 'リンクID',
  'LBL_SELECTED_REVISION_ID' => '選択版数ID',
  'LBL_LATEST_REVISION_ID' => '最終版数ID',
  'LBL_SELECTED_REVISION_FILENAME' => '選択版数ファイル名',
  'LBL_FILE_URL' => 'ファイルURL',
  'LBL_REVISIONS_PANEL' => '版数詳細',
  'LBL_REVISIONS_SUBPANEL' => '版数',
  'LBL_SF_DOCUMENT' => 'ドキュメント名:',
  'LBL_SF_CATEGORY' => 'カテゴリ:',
  'LBL_SF_SUBCATEGORY' => 'サブカテゴリ:',
  'LBL_SF_ACTIVE_DATE' => '発行日:',
  'LBL_SF_EXP_DATE' => '有効期限:',
  'DEF_CREATE_LOG' => 'ドキュメント作成日',
  'ERR_DOC_NAME' => 'ドキュメント名',
  'ERR_DOC_ACTIVE_DATE' => '発行日',
  'ERR_DOC_EXP_DATE' => '有効期限',
  'ERR_FILENAME' => 'ファイル名',
  'ERR_DOC_VERSION' => '版数',
  'ERR_DELETE_CONFIRM' => 'この版を削除して良いですか？',
  'ERR_DELETE_LATEST_VERSION' => '最新版を削除することを許可されていません。',
  'LNK_NEW_MAIL_MERGE' => 'メールマージ',
  'LBL_MAIL_MERGE_DOCUMENT' => 'メールマージテンプレート:',
  'LBL_TREE_TITLE' => 'ドキュメント',
  'LBL_LIST_DOCUMENT_NAME' => 'ドキュメント名',
  'LBL_LIST_IS_TEMPLATE' => 'テンプレート？',
  'LBL_LIST_TEMPLATE_TYPE' => 'ドキュメントタイプ',
  'LBL_LIST_SELECTED_REVISION' => '選択された版数',
  'LBL_LIST_LATEST_REVISION' => '最新版数',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => '契約',
  'LBL_LAST_REV_CREATE_DATE' => '最終リビジョンの作成日',
  'LBL_CONTRACTS' => '契約',
  'LBL_CREATED_USER' => '作成者',
  'LBL_THEREVISIONS_SUBPANEL_TITLE' => 'リビジョン',
  'LBL_DOCUMENT_INFORMATION' => 'ドキュメント概要',
);

