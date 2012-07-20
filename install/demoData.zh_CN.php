 nb//<?php

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



global $sugar_demodata;
$sugar_demodata['users'][0] = array(
  'id' => 'seed_jim_id',	
  'last_name' => '金',
  'first_name' => '丽',
  'user_name' => 'jim',
  'title'	=> '销售副总',
  'is_admin' => false,
  'reports_to' => null,
  'reports_to_name' => null,
  'email' => 'jim@example.com'
);

$sugar_demodata['users'][] = array(
  'id' => 'seed_sarah_id',	
  'last_name' => '韩',
  'first_name' => '云',
  'user_name' => 'sarah',
  'title'	=> '西区销售经理',
  'is_admin' => false,
  'reports_to' => 'seed_jim_id',
  'reports_to_name' => '金, 丽',
  'email' => 'sarah@example.com'
);

$sugar_demodata['users'][] = array(
  'id' => 'seed_sally_id',	
  'last_name' => '王',
  'first_name' => '欣',
  'user_name' => 'sally',
  'title'	=> '资深销售代表',
  'is_admin' => false,
  'reports_to' => 'seed_sarah_id',
  'reports_to_name' => '韩, 云',
  'email' => 'sally@example.com'
);

$sugar_demodata['users'][] = array(
  'id' => 'seed_max_id',	
  'last_name' => '马',
  'first_name' => '建军',
  'user_name' => 'max',
  'title'	=> '资深销售代表',
  'is_admin' => false,
  'reports_to' => 'seed_sarah_id',
  'reports_to_name' => '韩, 云',
  'email' => 'tom@example.com'
);

$sugar_demodata['users'][] = array(
  'id' => 'seed_will_id',	
  'last_name' => '王',
  'first_name' => '伟',
  'user_name' => 'will',
  'title'	=> '东区销售经理',
  'is_admin' => false,
  'reports_to' => 'seed_jim_id',
  'reports_to_name' => '金, 丽',
  'email' => 'will@example.com'
);

$sugar_demodata['users'][] = array(
  'id' => 'seed_chris_id',	
  'last_name' => '徐',
  'first_name' => '健',
  'user_name' => 'chris',
  'title'	=> '资深销售代表',
  'is_admin' => false,
  'reports_to' => 'seed_will_id',
  'reports_to_name' => '王, 伟',
  'email' => 'chris@example.com'
);

$sugar_demodata['teams'][] = array(
  'name' => '东区',	
  'description' => '东区团队',
  'team_id' => 'East',
);

$sugar_demodata['teams'][] = array(
  'name' => '西区',	
  'description' => '西区团队',
  'team_id' => 'West',
);

$sugar_demodata['last_name_array'] = array(
	"李",
	"王",
	"张",
	"刘",
	"陈",
	"杨",
	"赵",
	"黄",
	"周",
	"吴",
	"徐",
	"孙",
	"胡",
	"朱",
	"高",
	"林",
	"何",
	"郭",
	"马",
	"罗",
	"梁",
	"宋",
	"郑",
	"谢",
	"韩",
	"唐",
	"冯",
	"于",
	"董",
	"肖",
	"程",
	"曹",
	"袁",
	"邓",
	"许",
	"傅",
	"沈",
	"曾",
	"彭",
	"吕",
	"苏",
	"卢",
	"蒋",
	"蔡",
	"贾",
	"丁",
	"魏",
	"薛",
	"叶",
	"阎",
	"余",
	"潘",
	"杜",
	"戴",
	"夏",
	"钟",
	"田",
	"任",
	"姜",
	"范",
	"方",
	"石",
	"姚",
	"谭",
	"廖",
	"邹",
	"熊",
	"金",
	"陆",
	"郝",
	"孔",
	"白",
	"崔",
	"康",
	"毛",
	"邱",
	"秦",
	"江",
	"史",
	"顾",
	"邵",
	"候",
	"孟",
	"龙",
	"万",
	"段",
	"雷",
	"钱",
	"汤",
	"尹",
	"黎",
	"易",
	"武",
	"乔",
	"贺",
	"赖",
	"龚",
	"文",
);

$sugar_demodata['first_name_array'] = array(
	"伟",
	"刚",
	"勇",
	"毅",
	"俊",
	"峰",
	"强",
	"军",
	"平",
	"保",
	"东",
	"文",
	"辉",
	"力",
	"明",
	"永",
	"健",
	"世",
	"广",
	"志",
	"义",
	"兴",
	"良",
	"海",
	"山",
	"仁",
	"波",
	"宁",
	"贵",
	"福",
	"生",
	"龙",
	"元",
	"全",
	"国",
	"胜",
	"学",
	"祥",
	"才",
	"发",
	"武",
	"新",
	"利",
	"清",
	"飞",
	"彬",
	"富",
	"顺",
	"信",
	"子",
	"杰",
	"涛",
	"昌",
	"成",
	"康",
	"星",
	"光",
	"天",
	"达",
	"安",
	"岩",
	"中",
	"茂",
	"进",
	"林",
	"有",
	"坚",
	"和",
	"彪",
	"博",
	"诚",
	"先",
	"敬",
	"震",
	"振",
	"壮",
	"会",
	"思",
	"群",
	"豪",
	"心",
	"邦",
	"承",
	"乐",
	"绍",
	"功",
	"松",
	"善",
	"厚",
	"庆",
	"磊",
	"民",
	"友",
	"裕",
	"河",
	"哲",
	"江",
	"超",
	"浩",
	"亮",
	"政",
	"谦",
	"亨",
	"奇",
	"固",
	"之",
	"轮",
	"翰",
	"朗",
	"伯",
	"宏",
	"言",
	"若",
	"鸣",
	"朋",
	"斌",
	"梁",
	"栋",
	"维",
	"启",
	"克",
	"伦",
	"翔",
	"旭",
	"鹏",
	"泽",
	"晨",
	"辰",
	"士",
	"以",
	"建",
	"家",
	"致",
	"树",
	"炎",
	"德",
	"行",
	"时",
	"泰",
	"盛",
	"雄",
	"琛",
	"钧",
	"冠",
	"策",
	"腾",
	"楠",
	"榕",
	"风",
	"航",
	"弘",
	"秀",
	"娟",
	"英",
	"华",
	"慧",
	"巧",
	"美",
	"娜",
	"静",
	"淑",
	"惠",
	"珠",
	"翠",
	"雅",
	"芝",
	"玉",
	"萍",
	"红",
	"娥",
	"玲",
	"芬",
	"芳",
	"燕",
	"彩",
	"春",
	"菊",
	"兰",
	"凤",
	"洁",
	"梅",
	"琳",
	"素",
	"云",
	"莲",
	"真",
	"环",
	"雪",
	"荣",
	"爱",
	"妹",
	"霞",
	"香",
	"月",
	"莺",
	"媛",
	"艳",
	"瑞",
	"凡",
	"佳",
	"嘉",
	"琼",
	"勤",
	"珍",
	"贞",
	"莉",
	"桂",
	"娣",
	"叶",
	"璧",
	"璐",
	"娅",
	"琦",
	"晶",
	"妍",
	"茜",
	"秋",
	"珊",
	"莎",
	"锦",
	"黛",
	"青",
	"倩",
	"婷",
	"姣",
	"婉",
	"娴",
	"瑾",
	"颖",
	"露",
	"瑶",
	"怡",
	"婵",
	"雁",
	"蓓",
	"纨",
	"仪",
	"荷",
	"丹",
	"蓉",
	"眉",
	"君",
	"琴",
	"蕊",
	"薇",
	"菁",
	"梦",
	"岚",
	"苑",
	"婕",
	"馨",
	"瑗",
	"琰",
	"韵",
	"融",
	"园",
	"艺",
	"咏",
	"卿",
	"聪",
	"澜",
	"纯",
	"毓",
	"悦",
	"昭",
	"冰",
	"爽",
	"琬",
	"茗",
	"羽",
	"希",
	"宁",
	"欣",
	"飘",
	"育",
	"滢",
	"馥",
	"筠",
	"柔",
	"竹",
	"霭",
	"凝",
	"晓",
	"欢",
	"霄",
	"枫",
	"芸",
	"菲",
	"寒",
	"伊",
	"亚",
	"宜",
	"可",
	"姬",
	"舒",
	"影",
	"荔",
	"枝",
	"思",
	"丽 ",
);

$sugar_demodata['company_name_array'] = array(
	"华新书局",
	"北京阳光友谊商城",
	"国际华侨大厦",
	"上海联合汽车",
	"出口信贷保险公司",
	"中青宾馆",
	"中国联合影业公司",
	"中国糖果银行",
	"世格软件",
	"山东通用机械厂",
	"青岛造船厂",
	"东方科学仪器公司",
	"海青航运公司",
	"联合石油公司",
	"长江集装箱海运公司",
);

$sugar_demodata['street_address_array'] = array(
	"中山路75号",
	"中山环路345号",
	"湖南路99号",
	"南京东路234号",
	"淮海西路22号",
	"居里路865号",
	"北京东路789号",
	"太平路827号",
	"五棵松路324号",
	"长寿路545",
	"和平路659",
	"永福路975",
	"一德路3号2-5",
	"珠江路54号6楼F",
	"上海路46号7楼",
	"中山二路1454号",
	"连胜路47号8楼",
	"文园路647号",
);

$sugar_demodata['city_array'] = array(
	"上海",
	"北京",
	"西安",
	"南昌",
	"苏州",
	"杭州",
	"南京",
	"天津",
	"海口",
	"青岛",
	"大连",
	"广州",
	"济南",
	"太原",
	"长沙",
	"武汉",
	"厦门",
);

$sugar_demodata['case_seed_names'] = array(
	'集成的问题',
	'系统太快了',
	'很多地方需要定制',
	'我要购买序列号',
	'用Firefox时错误的消息提示'
);

$sugar_demodata['bug_seed_names'] = array(
	'Error occurs while running count query',
	'Warning is displayed in file after exporting',
	'Fatal error during installation',
	'Broken image appears in home page',
	'Syntax error appears when running old reports'
);

$sugar_demodata['note_seed_names_and_Descriptions'] = array(
	array('更多客户信息','300多个潜在客户'),
	array('电话信息','我们有个电话，看上去不错'),
	array('生日信息','出生于10月'),
	array('节日礼物','节日礼物非常棒，放在列表中以备以后选择')
);

$sugar_demodata['call_seed_data_names'] = array(
	'获得更多的信息',
	'留个口信',
	'感觉不好，继续联系',
	'讨论工作流程'
);

$sugar_demodata['titles'] = array(
	"董事长",
	"业务副总裁",
	"销售副总裁",
	"业务总监",
	"销售总监",
	"业务经理",
	"软件开发工程师",
);

$sugar_demodata['task_seed_data_names'] = array(
	'整理产品目录', 
	'安排行程', 
	'发送邮件', 
	'发送合同', 
	'传真', 
	'发送跟踪邮件', 
	'发送资料', 
	'投标', 
	'发送报价', 
	'安排会议', 
	'评估', 
	'获得样品反馈', 
	'安排介绍', 
	'提供技术支持', 
	'结束技术支持', 
	'海运产品', 
	'安排培训', 
	'发送本地用户组信息', 
	'添加至邮件列表',
);

$sugar_demodata['meeting_seed_data_names'] = array(
	'报价的后续行动', 
	'初次讨论', 
	'审查需求', 
	'讨论报价', 
	'演示', 
	'介绍成员', 
);
$sugar_demodata['meeting_seed_data_descriptions'] = '讨论项目的计划以及罗列实施的细节';

$sugar_demodata['email_seed_data_subjects'] = array(
	'报价的后续行动', 
	'初次讨论', 
	'审查需求', 
	'讨论报价', 
	'演示', 
	'介绍成员', 
);
$sugar_demodata['email_seed_data_descriptions'] = '讨论项目的计划以及罗列实施的细节';

$sugar_demodata['primary_address_state'] = '上海';
$sugar_demodata['billing_address_state']['east'] = '上海';
$sugar_demodata['billing_address_state']['west'] = '昆明';
$sugar_demodata['primary_address_country'] = '中国';

$sugar_demodata['manufacturer_seed_data_names'] = array(
	'塔奇克玩具有限公司',
	'华仪配件制造有限公司',
);

$sugar_demodata['shipper_seed_data_names'] = array(
	'FedEx', 
	'USPS Ground'
);

$sugar_demodata['category_ext_name'] = '氏系列产品';
$sugar_demodata['product_ext_name'] = '氏小配件';

$sugar_demodata['productcategory_seed_data_names'] = array(
	'台式机', 
	'笔记本', 
	'紧固件', 
	'其他配件'
);

$sugar_demodata['producttype_seed_data_names']= array(
	'其他配件', 
	'硬件', 
	'技术支持合同'
);

$sugar_demodata['taxrate_seed_data'][] = array(
	'name' => '增值税',
	'value' => '17',
);

$sugar_demodata['currency_seed_data'][] = array(
	'name' => 'USD',
	'conversion_rate' => 0.146,
	'iso4217' => 'USD',
	'symbol' => '$',
);

$sugar_demodata['producttemplate_seed_data'][] = array(
	'name' => 'TK 1000 台式机',
	'tax_class' => 'Taxable',
	'cost_price' => 500.00,
	'cost_usdollar' => 500.00,
	'list_price' => 800.00,
	'list_usdollar' => 800.00,
	'discount_price' => 800.00,
	'discount_usdollar' => 800.00,
	'pricing_formula' => 'IsList',
	'mft_part_num' => 'XYZ7890122222',
	'pricing_factor' => '1',
	'status' => 'Available',
	'weight' => 20.0,
	'date_available' => '2004-10-15',
	'qty_in_stock' => '72',
); 

$sugar_demodata['producttemplate_seed_data'][] = array(
	'name' => 'TK 1000 台式机',
	'tax_class' => 'Taxable',
	'cost_price' => 600.00,
	'cost_usdollar' => 600.00,
	'list_price' => 900.00,
	'list_usdollar' => 900.00,
	'discount_price' => 900.00,
	'discount_usdollar' => 900.00,
	'pricing_formula' => 'IsList',
	'mft_part_num' => 'XYZ7890123456',
	'pricing_factor' => '1',
	'status' => 'Available',
	'weight' => 20.0,
	'date_available' => '2004-10-15',
	'qty_in_stock' => '65',
); 

$sugar_demodata['producttemplate_seed_data'][] = array(
	'name' => 'TK m30 台式机',
	'tax_class' => 'Taxable',
	'cost_price' => 1300.00,
	'cost_usdollar' => 1300.00,
	'list_price' => 1700.00,
	'list_usdollar' => 1700.00,
	'discount_price' => 1625.00,
	'discount_usdollar' => 1625.00,
	'pricing_formula' => 'ProfitMargin',
	'mft_part_num' => 'ABCD123456890',
	'pricing_factor' => '20',
	'status' => 'Available',
	'weight' => 5.0,
	'date_available' => '2004-10-15',
	'qty_in_stock' => '12',
); 

$sugar_demodata['producttemplate_seed_data'][] = array(
	'name' => '反射镜组件',
	'tax_class' => 'Taxable',
	'cost_price' => 200.00,
	'cost_usdollar' => 200.00,
	'list_price' => 325.00,
	'list_usdollar' => 325.00,
	'discount_price' => 266.50,
	'discount_usdollar' => 266.50,
	'pricing_formula' => 'PercentageDiscount',
	'mft_part_num' => '2.0',
	'pricing_factor' => '20',
	'status' => 'Available',
	'weight' => 20.0,
	'date_available' => '2004-10-15',
	'qty_in_stock' => '65',
); 

$sugar_demodata['kbdocument_seed_data_kbtags'] = array(
    'OS and Interface',
    'Hardware',
    'WiFi, Bluetooth, and Networking',
    'Tools',
    'Basic Usage',
    );

$sugar_demodata['kbdocument_seed_data'][] = array(
    'name' => 'Connecting to the Internet',
    'start_date' => '2010-01-01',
    'exp_date' => '2010-12-31',
    'body' => '<p>To connect your device to the Internet, use any application that accesses the Internet. You can connect using either Wi-Fi or Bluetooth.</p>',
    'tags' => array(
        'WiFi, Bluetooth, and Networking',
        ),
    );

$sugar_demodata['kbdocument_seed_data'][] = array(
    'name' => 'Charging the battery',
    'start_date' => '2010-01-01',
    'exp_date' => '2010-12-31',
    'body' => '<p>To charge the battery, try the following:</p>
   <ul><li>Connect device to a power outlet using the included cable and the USB power adapter.</li>
    <li>Connect to a high-power USB 2.0 port using the included cable.</li></ul>',
    'tags' => array(
        'Basic Usage',
        'Hardware',
        ),
    );

$sugar_demodata['kbdocument_seed_data'][] = array(
    'name' => 'How to print',
    'start_date' => '2010-01-01',
    'exp_date' => '2010-12-31',
    'body' => '<p>In order to print, you first need to send your file to your computer. Access and print the file from your computer.</p>',
    'tags' => array(
        'Basic Usage',
        'Tools',
        ),
    );

$sugar_demodata['kbdocument_seed_data'][] = array(
    'name' => 'How to change the language',
    'start_date' => '2010-01-01',
    'exp_date' => '2010-12-31',
    'body' => '<p>If your device is not set to your preferred language, please make sure you have completed the setup. In the Settings screen, select Languages. Select the language you prefer.</p>',
    'tags' => array(
        'Basic Usage',
        'OS and Interface',
        ),
    );

$sugar_demodata['kbdocument_seed_data'][] = array(
    'name' => 'Resetting the device',
    'start_date' => '2010-01-01',
    'exp_date' => '2010-12-31',
    'body' => '<p>When things are not working as expected, try resetting the device. Hold the Start button until the dialog box displays.  Select the Reset option.</p>',
    'tags' => array(
        'Basic Usage',
        'Hardware',
        ),
); 

$sugar_demodata['contract_seed_data'][] = array(
	'name' => '给月球基地的IT技术支持',
	'reference_code' => 'EMP-9802',
	'total_contract_value' => '500600.01',
	'start_date' => '2010-05-15',
	'end_date' => '2020-05-15',
	'company_signed_date' => '2010-03-15',
	'customer_signed_date' => '2010-03-16',
	'description' => '在月球基地上进行的秘密项目',
); 

$sugar_demodata['contract_seed_data'][] = array(
	'name' => '离子发动机',
	'reference_code' => 'EMP-7277',
	'total_contract_value' => '333444.34',
	'start_date' => '2010-05-15',
	'end_date' => '2020-05-15',
	'company_signed_date' => '2010-03-15',
	'customer_signed_date' => '2010-03-16',
	'description' => '应用于深空973号探测器',
); 

$sugar_demodata['project_seed_data']['audit'] = array(
	'name' => '为审计所创建的项目',
	'description' => '六月份的年审',
	'estimated_start_date' => '2010-11-01',
	'estimated_end_date' => '2010-12-31',
	'status' => 'Draft',
	'priority' => 'medium',
);

$sugar_demodata['project_seed_data']['audit']['project_tasks'][] = array(
	'name' => '和股东进行沟通',
	'date_start' => '2010-11-1',
	'date_finish' => '2010-11-8',
	'description' => '与马东和刘伟单独会面',
	'duration' => '6',
	'duration_unit' => 'Days',
	'percent_complete' => 100,
);

$sugar_demodata['project_seed_data']['audit']['project_tasks'][] = array(
	'name' => '创建计划草案',
	'date_start' => '2010-11-5',
	'date_finish' => '2010-11-20',
	'description' => '与马东和刘伟单独会面',
	'duration' => '12',
	'duration_unit' => 'Days',
	'percent_complete' => 38,
);

$sugar_demodata['project_seed_data']['audit']['project_tasks'][] = array(
	'name' => '外勤工作收集数据',
	'date_start' => '2010-11-5',
	'date_finish' => '2010-11-13',
	'description' => '我们需要获得股东的支持',
	'duration' => '17',
	'duration_unit' => 'Days',
	'percent_complete' => 75,
);

$sugar_demodata['project_seed_data']['audit']['project_tasks'][] = array(
	'name' => '创建计划草案',
	'date_start' => '2010-11-12',
	'date_finish' => '2010-11-19',
	'description' => 'Schedule the meeting with the head of business units to solicit help.',
	'duration' => '6',
	'duration_unit' => 'Days',
	'percent_complete' => 0,
);

$sugar_demodata['project_seed_data']['audit']['project_tasks'][] = array(
	'name' => '收集会议资料',
	'date_start' => '2010-11-20',
	'date_finish' => '2010-11-20',
	'description' => '收集组织会议资料并归档',
	'duration' => '1',
	'duration_unit' => 'Days',
	'percent_complete' => 0,
);

$sugar_demodata['quotes_seed_data']['quotes'][0] = array(
	'name' => 'Computers for [account name]',
	'quote_stage' => 'Draft',
	'date_quote_expected_closed' => '04/30/2012',
    'description' => '',
    'purcahse_order_num' => '6011842',
    'payment_terms' => 'Net 30',

    'bundle_data' => array(
		0 => array (
		    'bundle_name' => 'Computers',
		    'bundle_stage' => 'Draft',
		    'comment' => 'TK Desktop Computers',
		    'products' => array (
				1 => array('name'=>'TK 1000 Desktop', 'quantity'=>'1'),
				2 => array('name'=>'TK m30 Desktop', 'quantity'=>'2'),
			),
		),
	),
);


$sugar_demodata['quotes_seed_data']['quotes'][1] = array(
	'name' => 'Mirrors for [account name]',
	'quote_stage' => 'Negotiation',
	'date_quote_expected_closed' => '04/30/2012',
    'description' => '',
 	'purcahse_order_num' => '3940021',
    'payment_terms' => 'Net 15',
         

    'bundle_data' => array(
		0 => array (
		    'bundle_name' => 'Mirrors',
		    'bundle_stage' => 'Draft',
		    'comment' => 'Reflective Mirrors',
		    'products' => array (
				1 => array('name'=>'Reflective Mirror Widget', 'quantity'=>'2'),
			),
		),
	),
);
