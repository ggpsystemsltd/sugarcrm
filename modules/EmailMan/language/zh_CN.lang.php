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
  'LBL_CONFIGURE_CAMPAIGN_EMAIL_SETTINGS' => '配置市场活动电子邮件设置',
  'LBL_OUTGOING_SECTION_HELP' => '为电子邮件通知和工作流警告配置默认的邮件发送服务器。',
  'LBL_ALLOW_DEFAULT_SELECTION' => '允许用户使用此帐户发送电子邮件：',
  'LBL_ALLOW_DEFAULT_SELECTION_HELP' => '选中这个选项时，所有用户将能够使用相同的发送电子邮件帐户发送系统通知和警报。如果选项未选中，用户仍然可以使用自己的账户信息设置自己的邮件发送服务器。',
  'LBL_FROM_ADDRESS_HELP' => '当启用时，用户指定的名字和电子邮件地址将被包括在电子邮件发件人中。如果SMTP服务器不允许从一个比服务器帐户不同的电子邮件帐户发送邮件，此功能可能无法正常使用。',
  'LBL_YAHOOMAIL_SMTPUSER' => 'Yahoo! Mail ID',
  'LBL_SEND_DATE_TIME' => '发送日期',
  'LBL_IN_QUEUE' => '在队列中?',
  'LBL_IN_QUEUE_DATE' => '排队日期',
  'ERR_INT_ONLY_EMAIL_PER_RUN' => '每一批发送过的电子邮件数量只可以是整数',
  'LBL_ATTACHMENT_AUDIT' => '被发送。它未重复占用当前机器的磁盘。',
  'LBL_CONFIGURE_SETTINGS' => '配置',
  'LBL_CUSTOM_LOCATION' => '已定义用户',
  'LBL_DEFAULT_LOCATION' => '默认',
  'LBL_DISCLOSURE_TITLE' => '附录对每封邮件显示的消息',
  'LBL_DISCLOSURE_TEXT_TITLE' => '显示的内容',
  'LBL_DISCLOSURE_TEXT_SAMPLE' => '注意: 这封邮件消息是为唯一的受件人用户并可能含有机密或保密信息. 任何未授权的检查, 使用, 泄露, 或者分配都是被禁止的. 如果您没有打算接受, 请销毁原始信息的所有副本并通告发送者以便我们的地址记录能够被改正。谢谢.',
  'LBL_EMAIL_DEFAULT_CHARSET' => '用这种字符集撰写电子邮件',
  'LBL_EMAIL_DEFAULT_EDITOR' => '用这种客户端撰写电子邮件',
  'LBL_EMAIL_DEFAULT_DELETE_ATTACHMENTS' => '删除电子邮件的同时也删除相关的备忘录和附件',
  'LBL_EMAIL_GMAIL_DEFAULTS' => '添入Gmail的默认',
  'LBL_EMAIL_PER_RUN_REQ' => '每一批发送电子邮件的数量:',
  'LBL_EMAIL_SMTP_SSL' => '使SMTP在SSL之上有效',
  'LBL_EMAIL_USER_TITLE' => '用户默认电子邮件',
  'LBL_EMAIL_OUTBOUND_CONFIGURATION' => '外发邮件配置',
  'LBL_EMAILS_PER_RUN' => '每一批发送电子邮件的数量:',
  'LBL_ID' => '编号',
  'LBL_LIST_CAMPAIGN' => '市场活动',
  'LBL_LIST_FORM_PROCESSED_TITLE' => '已处理的',
  'LBL_LIST_FORM_TITLE' => '队列',
  'LBL_LIST_FROM_EMAIL' => '发件人电子邮件',
  'LBL_LIST_FROM_NAME' => '发件人姓名',
  'LBL_LIST_IN_QUEUE' => '处理中',
  'LBL_LIST_MESSAGE_NAME' => '营销信息',
  'LBL_LIST_RECIPIENT_EMAIL' => '收件人电子邮件',
  'LBL_LIST_RECIPIENT_NAME' => '收件人姓名',
  'LBL_LIST_SEND_ATTEMPTS' => '试图发送',
  'LBL_LIST_SEND_DATE_TIME' => '发送于',
  'LBL_LIST_USER_NAME' => '用户名',
  'LBL_LOCATION_ONLY' => '地点',
  'LBL_LOCATION_TRACK' => '市场活动追踪文件的位置(像campaign_tracker.php)',
  'LBL_CAMP_MESSAGE_COPY' => '保留市场活动信息的备份:',
  'LBL_CAMP_MESSAGE_COPY_DESC' => '您是否希望存储在所有市场活动中发送的每一封电子邮件的消息副本?我们建议且系统默认不会这样做.选择否仅存储发送的模板和创建消息所需的变量.',
  'LBL_MAIL_SENDTYPE' => '邮件传送代理:',
  'LBL_MAIL_SMTPAUTH_REQ' => '使用SMTP认证?',
  'LBL_MAIL_SMTPPASS' => 'SMTP密码:',
  'LBL_MAIL_SMTPPORT' => 'SMTP端口:',
  'LBL_MAIL_SMTPSERVER' => 'SMTP服务器地址:',
  'LBL_MAIL_SMTPUSER' => 'SMTP用户名:',
  'LBL_CHOOSE_EMAIL_PROVIDER' => '请选择邮件提供商',
  'LBL_YAHOOMAIL_SMTPPASS' => 'Yahoo! Mail 密码',
  'LBL_GMAIL_SMTPPASS' => 'Gmail 密码',
  'LBL_GMAIL_SMTPUSER' => 'Gmail 邮箱地址',
  'LBL_EXCHANGE_SMTPPASS' => 'Exchange 密码',
  'LBL_EXCHANGE_SMTPUSER' => 'Exchange 用户名',
  'LBL_EXCHANGE_SMTPPORT' => 'Exchange 服务器端口',
  'LBL_EXCHANGE_SMTPSERVER' => 'Exchange 服务器',
  'LBL_EMAIL_LINK_TYPE' => '电子邮件客户端',
  'LBL_EMAIL_LINK_TYPE_HELP' => '<b>SugarCRM邮件客户端 :</b> 该客户端在Sugar的电子邮件模块中.
<b>外部邮件客户端 :</b> 其他邮件客户端, 例如Microsoft Outlook.',
  'LBL_MARKETING_ID' => '营销编号',
  'LBL_MODULE_ID' => '邮递员',
  'LBL_MODULE_NAME' => '电子邮件设置',
  'LBL_MODULE_TITLE' => '发件箱电子邮件队列管理',
  'LBL_NOTIFICATION_ON_DESC' => '当有记录被指派的时候，发送通知邮件。',
  'LBL_NOTIFY_FROMADDRESS' => '“发件人”地址:',
  'LBL_NOTIFY_FROMNAME' => '“发件人”姓名:',
  'LBL_NOTIFY_ON' => '打开通知邮件?',
  'LBL_NOTIFY_SEND_BY_DEFAULT' => '为新用户发送默认通知邮件?',
  'LBL_NOTIFY_TITLE' => '电子邮件通知选项',
  'LBL_OLD_ID' => '旧编号',
  'LBL_OUTBOUND_EMAIL_TITLE' => '发件箱电子邮件选项',
  'LBL_RELATED_ID' => '相关编号',
  'LBL_RELATED_TYPE' => '相关类型',
  'LBL_SAVE_OUTBOUND_RAW' => '保存发件箱中的原始电子邮件。',
  'LBL_SEARCH_FORM_PROCESSED_TITLE' => '查找已处理的',
  'LBL_SEARCH_FORM_TITLE' => '查找队列',
  'LBL_VIEW_PROCESSED_EMAILS' => '查看已处理的电子邮件',
  'LBL_VIEW_QUEUED_EMAILS' => '查看队列电子邮件',
  'TRACKING_ENTRIES_LOCATION_DEFAULT_VALUE' => 'config.php中变量site_url的值',
  'TXT_REMOVE_ME_ALT' => '要把自己从这个邮件列表中移除，请去',
  'TXT_REMOVE_ME_CLICK' => '点击这儿',
  'TXT_REMOVE_ME' => '把自己从电子邮件列表中移除',
  'LBL_NOTIFY_SEND_FROM_ASSIGNING_USER' => '从负责人的电子邮件地址发送通知?',
  'LBL_SECURITY_TITLE' => '电子邮件安全设置',
  'LBL_SECURITY_DESC' => '不允许进入收件箱，或者不允许显示电子邮件模块。',
  'LBL_SECURITY_APPLET' => '小应用程序标签',
  'LBL_SECURITY_BASE' => '基本标签',
  'LBL_SECURITY_EMBED' => '嵌入标签',
  'LBL_SECURITY_FORM' => '表单标签',
  'LBL_SECURITY_FRAME' => '结构标签',
  'LBL_SECURITY_FRAMESET' => '框架标签',
  'LBL_SECURITY_IFRAME' => 'Iframe标签',
  'LBL_SECURITY_IMPORT' => '导入标签',
  'LBL_SECURITY_LAYER' => '层次标签',
  'LBL_SECURITY_LINK' => '链接标签',
  'LBL_SECURITY_OBJECT' => '对象标签',
  'LBL_SECURITY_OUTLOOK_DEFAULTS' => '选择Outlook默认最低安全防范(错误在正确的一边显示)。',
  'LBL_SECURITY_SCRIPT' => '脚本标签',
  'LBL_SECURITY_STYLE' => '风格标签',
  'LBL_SECURITY_TOGGLE_ALL' => '选中所有的选项',
  'LBL_SECURITY_XMP' => 'Xmp标签',
  'LBL_YES' => '是',
  'LBL_NO' => '否',
  'LBL_PREPEND_TEST' => '[测试]:',
  'LBL_SEND_ATTEMPTS' => '尝试发送',
);

