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


$dashletStrings['TrackerDashlet'] = array('LBL_TITLE'            => '追踪报告',
                                          'LBL_DESCRIPTION'      => '访问统计图',
                                          'LBL_SAVING'           => '正在查询 ...',
                                          'LBL_SAVED'            => '查询完成',
                                          'LBL_CLEAR'            => '清除',
                                          'LBL_CLEAR_TOOLTIP'    => '清除日期数据',
                                          'LBL_CONFIGURE_TITLE'  => '标题',
                                          'LBL_CONFIGURE_HEIGHT' => '高 (1 - 300)',
										  'LBL_SELECT_QUERY'     => '选择查询...',
										  'LBL_FILTER'              => '过滤器',
										  'LBL_FILTER_TOOLTIP'      => '按照所选日期筛选',
										  'LBL_SINCE'            => '自: ',
										  'LBL_CHOOSE_DATE_TOOLTIP' => '在已选的报告中，你可以指定一个日期过滤器。' .
										                               '输入的日期将会替换掉报告默认的日期值。' .
										                               '例如，"我的活动 (本周)" 报告中，' .
										                               '系统将显示过滤器指定日期之后的所有记录，' .
										                               '而默认是显示一周内的记录。',
);