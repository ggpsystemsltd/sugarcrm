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

















if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');



$mod_strings = array (

    'LBL_MODULE_NAME' => '销售预测',
  'LNK_NEW_OPPORTUNITY' => '新增商业机会',
  'LBL_MODULE_TITLE' => '销售预测',
  'LBL_LIST_FORM_TITLE' => '提交销售预测',
  'LNK_UPD_FORECAST' => '销售预测工作单',
  'LNK_QUOTA' => '定额',
  'LNK_FORECAST_LIST' => '销售预测历史',
  'LBL_FORECAST_HISTORY' => '销售预测:历史',
  'LBL_FORECAST_HISTORY_TITLE' => '销售预测:历史',
  
    'LBL_TIMEPERIOD_NAME' => '时段',
  'LBL_USER_NAME' => '用户名',
  'LBL_REPORTS_TO_USER_NAME' => '经理',
  
    'LBL_FORECAST_ID' => '编号',
  'LBL_FORECAST_TIME_ID' => '时段编号',
  'LBL_FORECAST_TYPE' => '销售预测类型',
  'LBL_FORECAST_OPP_COUNT' => '商业机会',
  'LBL_FORECAST_OPP_WEIGH'=> '加权金额',
  'LBL_FORECAST_OPP_COMMIT' => '可能情形',
  'LBL_FORECAST_OPP_BEST_CASE'=> '最好情形',
  'LBL_FORECAST_OPP_WORST'=> '最坏情形',
  'LBL_FORECAST_USER' => '用户',
  'LBL_DATE_COMMITTED'=> '提交日期',
  'LBL_DATE_ENTERED' => '输入日期',
  'LBL_DATE_MODIFIED' => '修改日期',
  'LBL_CREATED_BY' => '创建人',
  'LBL_DELETED' => '已删除',
  
     'LBL_QC_TIME_PERIOD' => '时段:',
  'LBL_QC_OPPORTUNITY_COUNT' => '商业机会总数:',
  'LBL_QC_WEIGHT_VALUE' => '加权金额:',
  'LBL_QC_COMMIT_VALUE' => '提交金额:',
  'LBL_QC_COMMIT_BUTTON' => '提交',
  'LBL_QC_WORKSHEET_BUTTON' => '工作单',
  'LBL_QC_ROLL_COMMIT_VALUE' => '上滚提交金额:',
  'LBL_QC_DIRECT_FORECAST' => '我的直接销售预测:',
  'LBL_QC_ROLLUP_FORECAST' => '我的组销售预测:',
  'LBL_QC_UPCOMING_FORECASTS' => '我的销售预测:',
  'LBL_QC_LAST_DATE_COMMITTED' => '上次提交日期:',
  'LBL_QC_LAST_COMMIT_VALUE' => '上次提交金额:',
  'LBL_QC_HEADER_DELIM'=> '收件人',
  
    'LBL_OW_OPPORTUNITIES' => "商业机会",
  'LBL_OW_ACCOUNTNAME' => "客户",
  'LBL_OW_REVENUE' => "金额",
  'LBL_OW_WEIGHTED' => "加权金额",
  'LBL_OW_MODULE_TITLE'=> '商业机会工作单',
  'LBL_OW_PROBABILITY'=> '概率',
  'LBL_OW_NEXT_STEP'=> '下一步',
  'LBL_OW_DESCRIPTION'=> '说明',
  'LBL_OW_TYPE'=> '类型',

    'LNK_NEW_TIMEPERIOD' => '新增时段',
  'LNK_TIMEPERIOD_LIST' => '时段',
  
    'LBL_SVFS_FORECASTDATE' => '安排开始日期',
  'LBL_SVFS_STATUS' => '状态',
  'LBL_SVFS_USER' => '为',
  'LBL_SVFS_CASCADE' => '级联报告?',
  'LBL_SVFS_HEADER' => '销售预测安排:',
  
     'LB_FS_KEY' => '编号',
   'LBL_FS_TIMEPERIOD_ID' => '时段编号',
   'LBL_FS_USER_ID' => '用户编号',
   'LBL_FS_TIMEPERIOD' => '时段',   
   'LBL_FS_START_DATE' => '开始日期',
   'LBL_FS_END_DATE' => '结束日期',
   'LBL_FS_FORECAST_START_DATE' => "销售预测开始日期",
   'LBL_FS_STATUS' => '状态',
   'LBL_FS_FORECAST_FOR' => '安排为:',
   'LBL_FS_CASCADE' => '级联?',  
   'LBL_FS_MODULE_NAME' => '销售预测安排',
   'LBL_FS_CREATED_BY' => '创建人',
   'LBL_FS_DATE_ENTERED' => '输入日期',
   'LBL_FS_DATE_MODIFIED' => '修改日期',
   'LBL_FS_DELETED' => '已删除',
    
    'LBL_FDR_USER_NAME'=> '直接报告人',
  'LBL_FDR_OPPORTUNITIES'=> '销售预测中的商业机会:',
  'LBL_FDR_WEIGH'=> '加权商业机会金额:',
  'LBL_FDR_COMMIT'=> '已提交金额',
  'LBL_FDR_DATE_COMMIT'=> '提交日期',
  
    'LBL_DV_HEADER' => '销售预测:工作单',
  'LBL_DV_MY_FORECASTS' => '我的销售预测:',
  'LBL_DV_MY_TEAM' => "我的团队的销售预测" ,
  'LBL_DV_TIMEPERIODS' => '时段:',
  'LBL_DV_FORECAST_PERIOD' => '销售预测时段',
  'LBL_DV_FORECAST_OPPORTUNITY' => '预测商业机会',
  'LBL_SEARCH' => '选择',
  'LBL_SEARCH_LABEL' => '选择',
  'LBL_COMMIT_HEADER' => '销售预测提交',
  'LBL_DV_LAST_COMMIT_DATE' => '上次提交日期:',
  'LBL_DV_LAST_COMMIT_AMOUNT' => '上一次提交金额:',
  'LBL_DV_FORECAST_ROLLUP' => '销售预测上滚',
  'LBL_DV_TIMEPERIOD' => '时段:',
  'LBL_DV_TIMPERIOD_DATES' => '日期范围:',
  
    'LBL_LV_TIMPERIOD'=> '时段',
  'LBL_LV_TIMPERIOD_START_DATE'=> '开始日期',
  'LBL_LV_TIMPERIOD_END_DATE'=> '结束日期',
  'LBL_LV_TYPE'=> '销售预测类型',
  'LBL_LV_COMMIT_DATE'=> '提交日期',  
  'LBL_LV_OPPORTUNITIES'=> '商业机会',
  'LBL_LV_WEIGH'=> '加权金额',
  'LBL_LV_COMMIT'=> '已提交金额',
  
  'LBL_COMMIT_NOTE'=> '为选择的时段提交输入的金额:',
  
  'LBL_COMMIT_MESSAGE'=> '您要提交这些金额吗?',
  'ERR_FORECAST_AMOUNT' => '必须提交数字金额。',

    'LBL_FC_START_DATE' => '开始日期',
  'LBL_FC_USER' => '安排为',
  
  'LBL_NO_ACTIVE_TIMEPERIOD'=> '没有可用的销售预测时段。',
  'LBL_FDR_ADJ_AMOUNT'=> '调整后金额',
  'LBL_SAVE_WOKSHEET'=> '保存工作单',
  'LBL_RESET_WOKSHEET'=> '重设工作单',
  'LBL_RESET_CHECK'=> '所有选择时段中的工作单数据和登录的用户将被移除，继续?',
  
  'LB_FS_LIKELY_CASE'=> '可能情形',
  'LB_FS_WORST_CASE'=> '最坏情形',
  'LB_FS_BEST_CASE'=> '最好情形',
  'LBL_FDR_WK_LIKELY_CASE'=> '估计可能情形',
  'LBL_FDR_WK_BEST_CASE'=> '估计最好情形',
  'LBL_FDR_WK_WORST_CASE'=> '估计最坏情形',
  'LBL_BEST_CASE'=> '最好情形:',
  'LBL_LIKELY_CASE'=> '可能情形:',
  'LBL_WORST_CASE'=> '最坏情形:',
  'LBL_FDR_C_BEST_CASE'=> '最好情形',
  'LBL_FDR_C_WORST_CASE'=> '最坏情形',
  'LBL_FDR_C_LIKELY_CASE'=> '可能情形',
  'LBL_QC_LAST_BEST_CASE'=> '上次提交金额(最好情形):',
  'LBL_QC_LAST_LIKELY_CASE'=> '上次提交金额(可能情形):',
  'LBL_QC_LAST_WORST_CASE'=> '上次提交金额(最坏情形):',
  'LBL_QC_ROLL_BEST_VALUE'=> '上滚提交金额(最好情形):',
  'LBL_QC_ROLL_LIKELY_VALUE'=> '上滚提交金额(可能情形):',
  'LBL_QC_ROLL_WORST_VALUE'=> '上滚提交金额(最坏情形):',  
  'LBL_QC_COMMIT_BEST_CASE'=> '提交金额(最好情形):',
  'LBL_QC_COMMIT_LIKELY_CASE'=> '提交金额(可能情形):',
  'LBL_QC_COMMIT_WORST_CASE'=> '提交金额(最坏情形):',

);


?>
