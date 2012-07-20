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
  'LBL_ALLOW_OUTBOUND_GROUP_USAGE_DESC' => '当这个选项被选中发件人姓名和电邮地址与本组邮件帐户相关联，对组邮件账户又访问权限的用户在撰写电子邮件时将作为发件人的一个选项显示。',
  'LBL_ENABLE_AUTO_IMPORT' => '自动导入电子邮件',
  'LBL_WARNING_CHANGING_AUTO_IMPORT' => '警告：您正在修改您的自动导入设置可能导致数据丢失。',
  'LBL_WARNING_CHANGING_AUTO_IMPORT_WITH_CREATE_CASE' => '警告：自动创建客户反馈，必须启用自动导入。',
  'LBL_FIND_OPTIMUM_KEY' => 'f',
  'LBL_TEST_BUTTON_KEY' => 't',
  'LBL_ASSIGN_TEAM' => '指派给团队',
  'LBL_RE' => '答复:',
  'ERR_BAD_LOGIN_PASSWORD' => '用户名或者密码错误',
  'ERR_BODY_TOO_LONG' => '电子邮件正文太长。请调整。',
  'ERR_INI_ZLIB' => '暂时无法关闭Zlib压缩。“测试设置”可能失败。',
  'ERR_MAILBOX_FAIL' => '不能检索任何邮件箱。',
  'ERR_NO_IMAP' => '未发现IMAP类库。请在使用收件箱前解决这个问题。',
  'ERR_NO_OPTS_SAVED' => '没有最佳设置收件箱。请重新查看设置。',
  'ERR_TEST_MAILBOX' => '请检查您的设置，再重试。',
  'LBL_APPLY_OPTIMUMS' => '提交最佳设置',
  'LBL_ASSIGN_TO_USER' => '指派给用户',
  'LBL_AUTOREPLY_OPTIONS' => '自动回复选项',
  'LBL_AUTOREPLY' => '自动回复模板',
  'LBL_AUTOREPLY_HELP' => '选择一个自动回复告诉发件人他们的回复已经收到。',
  'LBL_BASIC' => '基本设置',
  'LBL_CASE_MACRO' => '用户反馈宏',
  'LBL_CASE_MACRO_DESC' => '设置宏，他可以解析和链接导入的电子邮件到用户反馈。',
  'LBL_CASE_MACRO_DESC2' => '设置它为任何值，但是保留<b>"%1"</b>。',
  'LBL_CERT_DESC' => '强制验证邮件服务器的安全证书–如果是自我签署，请不要使用',
  'LBL_CERT' => '证书验证',
  'LBL_CLOSE_POPUP' => '关闭窗口',
  'LBL_CREATE_NEW_GROUP' => '--保存时新增分组邮箱--',
  'LBL_CREATE_TEMPLATE' => '新增',
  'LBL_SUBSCRIBE_FOLDERS' => '订阅',
  'LBL_DEFAULT_FROM_ADDR' => '默认:',
  'LBL_DEFAULT_FROM_NAME' => '默认:',
  'LBL_DELETE_SEEN' => '在导入后删除已读的电子邮件',
  'LBL_EDIT_TEMPLATE' => '编辑',
  'LBL_EMAIL_OPTIONS' => '电子邮件处理选项',
  'LBL_EMAIL_BOUNCE_OPTIONS' => '退信处理选项',
  'LBL_FILTER_DOMAIN_DESC' => '不要发送自动回复的电子邮件到这个域。',
  'LBL_ASSIGN_TO_GROUP_FOLDER_DESC' => '对组文件夹指派邮件帐号将自动导入邮件.',
  'LBL_POSSIBLE_ACTION_DESC' => '若要创建客户反馈,必须选择组文件夹',
  'LBL_FILTER_DOMAIN' => '没有自动回复的域',
  'LBL_FIND_OPTIMUM_MSG' => '<br>寻找最佳连接变量。',
  'LBL_FIND_OPTIMUM_TITLE' => '寻找最佳配置',
  'LBL_FIND_SSL_WARN' => '<br>测试SSL可能会需要一段时间。请耐心等待。<br>',
  'LBL_FORCE_DESC' => '一些IMAP/POP3服务器需要特殊的交换机。当连接失败的时候，请检查交换机(像/notls)',
  'LBL_FORCE' => '强制否定',
  'LBL_FOUND_MAILBOXES' => '发现下面可使用的文件夹。<br>请选择其中一个:',
  'LBL_FOUND_OPTIMUM_MSG' => '<br>已找到最优设置。请点击下面的按钮以应用这些参数。',
  'LBL_FROM_ADDR' => '“发件人”地址',
  'LBL_FROM_NAME_ADDR' => '回复姓名/电子邮件',
  'LBL_FROM_NAME' => '“发件人”姓名',
  'LBL_GROUP_QUEUE' => '指派给组',
  'LBL_HOME' => '首页',
  'LBL_LIST_MAILBOX_TYPE' => '使用收件箱',
  'LBL_LIST_NAME' => '名称:',
  'LBL_LIST_GLOBAL_PERSONAL' => '组/个人',
  'LBL_LIST_SERVER_URL' => '邮件服务器:',
  'LBL_LIST_STATUS' => '状态:',
  'LBL_LOGIN' => '用户名',
  'LBL_MAILBOX_DEFAULT' => '收件箱',
  'LBL_MAILBOX_SSL_DESC' => '连接时使用SSL。如果不能连接，请检查您在安装PHP的时候，配置项中是否包含了“--with-imap-ssl”。',
  'LBL_MAILBOX_SSL' => '使用SSL',
  'LBL_MAILBOX_TYPE' => '可能的动作',
  'LBL_DISTRIBUTION_METHOD' => '分发方法',
  'LBL_CREATE_CASE_REPLY_TEMPLATE' => '新建客户反馈回复模板',
  'LBL_CREATE_CASE_REPLY_TEMPLATE_HELP' => '选择一个自动回复告诉发件人客户反馈已经被创建。邮件主题中包含客户反馈编号。该回复只在收到该收件人的第一封邮件后发送。',
  'LBL_MAILBOX' => '已监视的文件夹',
  'LBL_TRASH_FOLDER' => '垃圾邮件',
  'LBL_GET_TRASH_FOLDER' => '获取垃圾邮件',
  'LBL_SENT_FOLDER' => '已发送邮件',
  'LBL_GET_SENT_FOLDER' => '获取发送邮件',
  'LBL_SELECT' => '选择',
  'LBL_MARK_READ_DESC' => '导入后在此邮件服务器上标记信息已读；不删除。',
  'LBL_MARK_READ_NO' => '导入后删除标记过的电子邮件',
  'LBL_MARK_READ_YES' => '导入后在服务器上保留电子邮件',
  'LBL_MARK_READ' => '在服务器上备份',
  'LBL_MAX_AUTO_REPLIES' => '自动响应的数量',
  'LBL_MAX_AUTO_REPLIES_DESC' => '设置自动响应发送一个唯一邮件地址的最大数值在24小时内.',
  'LBL_PERSONAL_MODULE_NAME' => '个人邮件帐户',
  'LBL_CREATE_CASE' => '从电子邮件创建客户反馈',
  'LBL_CREATE_CASE_HELP' => '选择在Sugar中从收到的电子邮件中自动创建客户反馈。',
  'LBL_MODULE_NAME' => '设置收件箱',
  'LBL_BOUNCE_MODULE_NAME' => '退信处理邮箱',
  'LBL_MODULE_TITLE' => '收件箱',
  'LBL_NAME' => '名称',
  'LBL_NONE' => '无',
  'LBL_NO_OPTIMUMS' => '未找到最优参数．请检查您的设置，然后再试。',
  'LBL_ONLY_SINCE_DESC' => '当使用POP3时，PHP将不能过滤新信息或未读信息。此标签可以核对上次收件箱里的信息。如果您的邮件服务器不支持IMAP，它将对此有很大改进。',
  'LBL_ONLY_SINCE_NO' => '不。检查此邮件服务器上的所有邮件。',
  'LBL_ONLY_SINCE_YES' => '是。',
  'LBL_ONLY_SINCE' => '只导入最后确认:',
  'LBL_OUTBOUND_SERVER' => '外部响应邮件服务',
  'LBL_PASSWORD_CHECK' => '密码确认',
  'LBL_PASSWORD' => '密码',
  'LBL_POP3_SUCCESS' => 'POP3测试连接成功。',
  'LBL_POPUP_FAILURE' => '测试连接失败。错误显示在下面。',
  'LBL_POPUP_SUCCESS' => '测试连接成功。您的设置可以工作了。',
  'LBL_POPUP_TITLE' => '测试设置',
  'LBL_GETTING_FOLDERS_LIST' => '获取文件夹列表',
  'LBL_SELECT_SUBSCRIBED_FOLDERS' => '选择订阅',
  'LBL_SELECT_TRASH_FOLDERS' => '选择垃圾邮件',
  'LBL_SELECT_SENT_FOLDERS' => '选择已发送邮件',
  'LBL_DELETED_FOLDERS_LIST' => '以下目录 %s 不存在或已从服务器上删除',
  'LBL_PORT' => '邮件服务器端口',
  'LBL_QUEUE' => '邮件箱队列',
  'LBL_REPLY_NAME_ADDR' => '回复 名称/邮件',
  'LBL_REPLY_TO_NAME' => '"回复到" 名称',
  'LBL_REPLY_TO_ADDR' => '"回复到" 地址',
  'LBL_SAME_AS_ABOVE' => '使用从名称/地址',
  'LBL_SAVE_RAW' => '保存原始资料',
  'LBL_SAVE_RAW_DESC_1' => '如果您想为每一封导入的电子邮件保留原始资料的话，请选择“是”。',
  'LBL_SAVE_RAW_DESC_2' => '大的附件和错误的数据库配置能够引起错误。',
  'LBL_SERVER_OPTIONS' => '高级设置',
  'LBL_SERVER_TYPE' => '邮件服务器协议',
  'LBL_SERVER_URL' => '邮件服务器地址',
  'LBL_SSL_DESC' => '如有您的邮件服务器支持安全端口连接，在导入电子邮件的时候，请启用SLL连接。',
  'LBL_ASSIGN_TO_TEAM_DESC' => '所选团队拥有此邮件帐号权限. 如果选择组文件夹,指派给该文件夹的团队将覆盖所选团队.',
  'LBL_SSL' => '使用SSL',
  'LBL_STATUS' => '状态',
  'LBL_SYSTEM_DEFAULT' => '系统默认',
  'LBL_TEST_BUTTON_TITLE' => '测试[Alt+T]',
  'LBL_TEST_SETTINGS' => '测试设置',
  'LBL_TEST_SUCCESSFUL' => '连接完全成功。',
  'LBL_TEST_WAIT_MESSAGE' => '请稍后...',
  'LBL_TLS_DESC' => '连接邮件服务器时使用传输层安全协议–如果您的邮件服务器支持这此协议，请只使用这一个。',
  'LBL_TLS' => '使用TLS',
  'LBL_WARN_IMAP_TITLE' => '禁用收件箱',
  'LBL_WARN_IMAP' => '警告:',
  'LBL_WARN_NO_IMAP' => '收件箱功能<b>不能使用</b>如果在编译PHP的时候未打开IMAPc-client类库。请联系管理员来解决这个问题。',
  'LNK_CREATE_GROUP' => '新增组',
  'LNK_LIST_CREATE_NEW_GROUP' => '新建组邮件帐户',
  'LNK_LIST_CREATE_NEW_BOUNCE' => '新建退回处理账户',
  'LNK_LIST_MAILBOXES' => '所有邮件箱',
  'LNK_LIST_QUEUES' => '所有队列',
  'LNK_LIST_SCHEDULER' => '计划任务',
  'LNK_LIST_TEST_IMPORT' => '测试邮件导入',
  'LNK_NEW_QUEUES' => '新增队列',
  'LNK_SEED_QUEUES' => '团队的记录队列',
  'LBL_IS_PERSONAL' => '个人',
  'LBL_GROUPFOLDER_ID' => '组文件夹编号',
  'LBL_ASSIGN_TO_GROUP_FOLDER' => '负责人组文件夹',
  'LBL_ALLOW_OUTBOUND_GROUP_USAGE' => '允许用户使用发送电子邮件的“发件人”的名称和地址作为答复地址',
  'LBL_STATUS_ACTIVE' => '启用',
  'LBL_STATUS_INACTIVE' => '停用',
  'LBL_IS_GROUP' => ' 组 ',
);

