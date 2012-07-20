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
  'LBL_MODULE_NAME' => '团队通知',
  'LBL_MODULE_TITLE' => '团队通知:首页',
  'LBL_SEARCH_FORM_TITLE' => '查找团队通知',
  'LBL_LIST_FORM_TITLE' => '团队通知列表',
  'LBL_PRODUCTTYPE' => '团队通知',
  'LBL_NOTICES' => '团队通知',
  'LBL_LIST_NAME' => '职称',
  'LBL_URL' => '网址',
  'LBL_URL_TITLE' => '网址标题',
  'LBL_LIST_DESCRIPTION' => '说明',
  'LBL_NAME' => '职称',
  'LBL_DESCRIPTION' => '说明',
  'LBL_LIST_LIST_ORDER' => '排序',
  'LBL_LIST_ORDER' => '排序',
  'LBL_DATE_START' => '开始日期',
  'LBL_DATE_END' => '完成日期',
  'LBL_STATUS' => '状态',
  'LNK_NEW_TEAM' => '新增团队',
  'LNK_NEW_TEAM_NOTICE' => '新增团队通知',
  'LNK_LIST_TEAM' => '团队',
  'LNK_LIST_TEAMNOTICE' => '团队通知',
  'LNK_PRODUCT_LIST' => '产品价格列表',
  'LNK_NEW_PRODUCT' => '新增产品',
  'LNK_NEW_MANUFACTURER' => '制造商',
  'LNK_NEW_SHIPPER' => '运输供应商',
  'LNK_NEW_PRODUCT_CATEGORY' => '产品类别',
  'LNK_NEW_PRODUCT_TYPE' => '产品类型列表',
  'NTC_DELETE_CONFIRMATION' => '您确定要删除这条记录?',
  'ERR_DELETE_RECORD' => '必须指定记录编号才能删除产品类型。',
  'NTC_LIST_ORDER' => '设置产品类型在下拉列表中的顺序。',
  'dom_status' => 
  array (
    'Visible' => '显示',
    'Hidden' => '隐藏',
  ),
  'LBL_TEAM_NOTICE_FEATURES' => '特点:
* 改进了的用户界面和新的向导，加上一个简单、直观的引导性流程设计，引导用户创建报表。
* 复杂的报表集合。允许用户以复杂的逻辑创建跨模块的报表。
* 矩阵报表。提供在灵活的网格布局中以多个属性进行分组显示的功能。用户可以创建复杂的数据透视表，它能够显示诸如总和、平均数、数量和百分比。
* 运行时过滤器。允许用户实时改变报表的属性。',
  'LBL_TEAM_NOTICE_WIRELESS' => 'SugarCRM应用程序所提供的新的手机视图打破了使用和移动之间的壁垒。
特点:
*改进了的用户界面。它提供给用户编辑视图，详情视图，列表视图以及查看相关记录和访问员工目录，存储用户偏好和察看最近记录的功能。
* 设备无关性。允许用户通过任何PDA或者只能手机，包括Blackberry和iPhone，来访问SugarCRM的数据。
* 富HTML客户端可以将SugarCRM中的数据通过标准的web浏览器传递给用户。
* 新的查询功能。允许用户更快地查找信息。',
   'LBL_TEAM_NOTICE_DATA_IMPORT' => '数据导入增强特性使得将数据从Excel, Act!, Microsoft Outlook和Salesforce.com导入到SugarCRM变得简单.
增强特性:
* 提升用户界,提供更多映射选项以确保数据导入SugarCRM的流畅性和准确性.
* 数据质量控制允许管理员指定导入中是创建新记录还是更新已存在记录,减少重复信息.
* 导入到所有模块提供将信息从其他CRM系统导入到任何模块,降低数据重复输入.',
  'LBL_TEAM_NOTICE_MODULE_BUILDER' => '模块生成器使您能够创造性的扩展SugarCRM.
增强特性:
* 可以在新模块或者已存在模块之间建立关系.
* 审核机制提供完整的模块创建和修改的历史并且可以跟踪定制化细节.
* 统计图可以在首页中作为AJAX容器放置自定义对象和展现模块功能.
* 新模板可以方便的跟踪文件和商业机会信息.',
  'LBL_TEAM_NOTICE_TRACKER' => '跟踪器提供一种新的扩展视图来展现SugarCRM的使用情况和性能细节
特性:
* 报表跟踪器提供系统使用情况的快照来提高用户的接受度和CRM系统可视性.用户可以查看每周CRM系统的活动,记录,模块等使用情况,累计使用时间和其他团队成员的在线情况.
* 系统监测提供管理员系统正被如何使用的信息以及潜在的重要应用点.',

);


?>