<?php

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
  'LBL_LIST_AMOUNT_USDOLLAR' => '金额',
  'LABEL_PANEL_ASSIGNMENT' => '分配',
  'LNK_IMPORT_OPPORTUNITIES' => '导入商业机会',
  
  
  
  
  'LBL_MODULE_NAME' => '商业机会',
  'LBL_MODULE_TITLE' => '商业机会:首页',
  'LBL_SEARCH_FORM_TITLE' => '查找商业机会',
  'LBL_VIEW_FORM_TITLE' => '商业机会视图',
  'LBL_LIST_FORM_TITLE' => '商业机会列表',
  'LBL_OPPORTUNITY_NAME' => '商业机会名称:',
  'LBL_OPPORTUNITY' => '商业机会:',
  'LBL_NAME' => '商业机会名称',
  'LBL_INVITEE' => '联系人',
  'LBL_CURRENCIES' => '货币',
  'LBL_LIST_OPPORTUNITY_NAME' => '商业机会',
  'LBL_LIST_ACCOUNT_NAME' => '客户名称',
  'LBL_LIST_AMOUNT' => '金额',
  'LBL_LIST_DATE_CLOSED' => '关闭',
  'LBL_LIST_SALES_STAGE' => '销售阶段',
  'LBL_ACCOUNT_ID' => '客户编号',
  'LBL_CURRENCY_ID' => '货币编号',
  'LBL_CURRENCY_NAME' => '货币名称',
  'LBL_CURRENCY_SYMBOL' => '货币符号',
  'LBL_TEAM_ID' => '团队编号',
  'UPDATE' => '商业机会-货币更新',
  'UPDATE_DOLLARAMOUNTS' => '更新美元金额',
  'UPDATE_VERIFY' => '确认金额',
  'UPDATE_VERIFY_TXT' => '确认商业机会中的金额字段都是数字与小数点的组合。',
  'UPDATE_FIX' => '修改金额',
  'UPDATE_FIX_TXT' => '尝试从目前的金额新增正确的数字来修改任何错误的金额，原有的资料会备份到amount_backup字段，如果您执行过程中发现任何错误，记得在重新执行前先将备份的数值还原，避免备份的数值也跟着出錯。',
  'UPDATE_DOLLARAMOUNTS_TXT' => '通过目前的汇率來更新商业机会的美元金额，这个数值用來计算图片与货币金额浏览列表',
  'UPDATE_CREATE_CURRENCY' => '新增货币:',
  'UPDATE_VERIFY_FAIL' => '确认错误的记录:',
  'UPDATE_VERIFY_CURAMOUNT' => '目前金额:',
  'UPDATE_VERIFY_FIX' => '执行修正将会变成',
  'UPDATE_INCLUDE_CLOSE' => '包含停用的记录',
  'UPDATE_VERIFY_NEWAMOUNT' => '新的金额:',
  'UPDATE_VERIFY_NEWCURRENCY' => '新的货币:',
  'UPDATE_DONE' => '完成',
  'UPDATE_BUG_COUNT' => '发现缺陷并且尝试解决:',
  'UPDATE_BUGFOUND_COUNT' => '发现缺陷:',
  'UPDATE_COUNT' => '记录更新笔数:',
  'UPDATE_RESTORE_COUNT' => '记录金额还原:',
  'UPDATE_RESTORE' => '还原金额',
  'UPDATE_RESTORE_TXT' => '通过修正期间新增的备份來还原金额数值。',
  'UPDATE_FAIL' => '无法更新-',
  'UPDATE_NULL_VALUE' => '沒有输入金额的项目会设置为0-',
  'UPDATE_MERGE' => '合并货币',
  'UPDATE_MERGE_TXT' => '合并多种货币成为单一货币，如果您发现同样的货币有多条记录，您可以将他们合并。这将会合并所有模组的货币记录。',
  'LBL_ACCOUNT_NAME' => '客户名称:',
  'LBL_AMOUNT' => '金额:',
  'LBL_AMOUNT_USDOLLAR' => '金额 USD:',
  'LBL_CURRENCY' => '货币:',
  'LBL_DATE_CLOSED' => '完成日期:',
  'LBL_TYPE' => '类型:',
  'LBL_CAMPAIGN' => '市场活动:',
  'LBL_NEXT_STEP' => '下个步驟:',
  'LBL_LEAD_SOURCE' => '潜在客户来源:',
  'LBL_SALES_STAGE' => '销售阶段:',
  'LBL_PROBABILITY' => '成交概率(%):',
  'LBL_DESCRIPTION' => '说明:',
  'LBL_DUPLICATE' => '可能重复的商业机会',
  'MSG_DUPLICATE' => '新增这条记录可能造成重复，您可以从下面列表选择或是点击新增來继续透过旧有记录建立新商业机会',
  'LBL_NEW_FORM_TITLE' => '新增商业机会',
  'LNK_NEW_OPPORTUNITY' => '新增商业机会',
  'LNK_OPPORTUNITY_REPORTS' => '商业机会报表',
  'LNK_OPPORTUNITY_LIST' => '商业机会',
  'ERR_DELETE_RECORD' => '必须指定记录编号才能删除商业机会。',
  'LBL_TOP_OPPORTUNITIES' => '我的重要商业机会',
  'NTC_REMOVE_OPP_CONFIRMATION' => '您确定要从这个商业机会移除这个联系人?',
  'OPPORTUNITY_REMOVE_PROJECT_CONFIRM' => '您确定要从这个项目移除商业机会?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => '商业机会',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => '活动',
  'LBL_HISTORY_SUBPANEL_TITLE' => '历史记录',
  'LBL_RAW_AMOUNT' => '毛数量',
  'LBL_LEADS_SUBPANEL_TITLE' => '潜在客户',
  'LBL_CONTACTS_SUBPANEL_TITLE' => '联系人',
  'LBL_QUOTES_SUBPANEL_TITLE' => '报价',
  'LBL_PROJECTS_SUBPANEL_TITLE' => '项目',
  'LBL_ASSIGNED_TO_NAME' => '负责人用户姓名:',
  'LBL_LIST_ASSIGNED_TO_NAME' => '负责人',
  'LBL_CONTRACTS' => '合同',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => '合同',
  'LBL_MY_CLOSED_OPPORTUNITIES' => '我的关闭的商业机会',
  'LBL_TOTAL_OPPORTUNITIES' => '商业机会总数',
  'LBL_CLOSED_WON_OPPORTUNITIES' => '已关闭的成功的商业机会',
  'LBL_ASSIGNED_TO_ID' => '分配用户编号',
  'LBL_CREATED_ID' => '创建人编号',
  'LBL_MODIFIED_ID' => '修改人编号',
  'LBL_MODIFIED_NAME' => '修改人姓名',
  'LBL_CREATED_USER' => '创建人',
  'LBL_MODIFIED_USER' => '修改人',
  'LBL_CAMPAIGN_OPPORTUNITY' => '营销活动',
  'LBL_PROJECT_SUBPANEL_TITLE' => '项目',
);

