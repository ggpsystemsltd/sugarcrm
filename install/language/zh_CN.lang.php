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
  'REQUIRED_INSTALLTYPE_MSG' => '在系统执行检查，你可以选择典型或自定义安装。

对于这两种典型和自定义安装，你需要了解以下信息：
类型的数据库，将容纳Sugar数据
兼容的数据库类型：MySQL中，微软SQL服务器，Oracle。

在Web服务器或机器名（主机）上的数据库所在
这可能是本地主机如果数据库是在本地计算机上或在同一个Web服务器或文件作为Sugar文件。

数据库的名称，你想用Sugar来容纳数据
您可能已经有一个现有的数据库，你会喜欢用。如果您提供的现有数据库的名称，在数据库中的表将被删除时，在安装过程中Sugar数据库的架构定义。
如果你不已经有一个数据库，您提供的名称将用于新的数据库资源，对安装过程中创建的实例。

数据库管理员用户名和密码
数据库管理员应该能够创建表和用户写入数据库。
你可能需要联系此信息数据库，如果数据库管理员不位于您的本地计算机和/或如果您不是数据库管理员。

Sugar数据库用户名和密码
用户可能是数据库管理员，或者您可能提供的另一个现有的数据库用户名。
如果你想创建一个新的数据库用于此目的的用户，您将能够提供一个新的用户名和密码在安装过程中，用户将在安装时创建的。
对于自定义设置，您可能还需要了解以下信息：
网址将被用于访问Sugar安装后的实例。此网址应包括网络服务器或计算机名称或IP地址。

[可选]会话目录的路径，如果你想使用一个自定义会话Sugar信息目录，以防止在共享服务器脆弱的会话数据。

[可选]路径的自定义日志目录，如果你想覆盖用于Sugar日志的默认目录。

[可选]申请ID，如果你想覆盖自动生成的ID，即确保会议的一个Sugar实例不被其他一些情况。

字符集最常用的语言环境。

如需详细资料，请参阅安装指南',
  'LBL_OOTB_REPORTS' => '执行报表生成定时任务',
  'LBL_OOTB_PRUNE' => '每月1号精简数据库',
  'LBL_OOTB_TRACKER' => '删除用户历史表',
  'LBL_SYSOPTS_DB_TYPE' => '',
  'DEFAULT_CHARSET' => 'UTF-8',
  'LBL_CHECKSYS_FASTCGI' => 'FastCGI',
  'LBL_THREE' => '3',
  'LBL_DISABLED_HELP_LNK' => 'http://www.sugarcrm.com/forums/',
  'LBL_MSSQL' => 'SQL Server',
  'LBL_MYSQL' => 'MySQL',
  'LBL_ORACLE' => 'Oracle',
  'LBL_SYSOPTS_1' => '从下面的系统配置选项中选择。',
  'LBL_SYSOPTS_2' => '您将要安装的Sugar 实例使用的数据库类型是？',
  'LBL_SYSOPTS_CONFIG' => '系统配置',
  'LBL_SYSOPTS_DB' => '指定数据库类型',
  'LBL_SYSOPTS_DB_TITLE' => '数据库类型',
  'LBL_SYSOPTS_ERRS_TITLE' => '请在继续之前修正下面的错误:',
  'LBL_MAKE_DIRECTORY_WRITABLE' => '请确保下面的文件夹可写:',
  'LBL_SYSOPTS_DB_DIRECTIONS' => '如果你选择Oracle，你必须安装Oracle 客户端并配置。',
  'ERR_DB_LOGIN_FAILURE_OCI8' => '所提供的资料库主机，用户名和/或密码无效，以及对数据库连接不能建立。请输入一个有效的主机，用户名和密码',
  'ERR_DB_OCI8_CONNECT' => '所提供的资料库主机，用户名和/或密码无效，以及对数据库连接不能建立。请输入一个有效的主机，用户名和密码',
  'ERR_DB_OCI8_VERSION' => '你的Oracle版本不被Sugar支持。您将需要安装一个版本，是与Sugar的应用兼容。请参阅发行说明中的兼容性表以支持Oracle版本。',
  'LBL_DBCONFIG_MSG1' => '请提供您的数据库的名称。这将是默认的表空间分配给用户。',
  'LBL_Q' => '商业机会查询',
  'LBL_Q1_DESC' => '根据类型分类商业机会',
  'LBL_Q2_DESC' => '根据客户分类商业机会',
  'LBL_R1' => '6个月的销售管状图报表',
  'LBL_R1_DESC' => '按照月份与类型分类未来6个月的商业机会',
  'LBL_OPP' => '商业机会数据集',
  'LBL_OPP1_DESC' => '你可以修改自定义查询的界面与风格',
  'LBL_OPP2_DESC' => '此查询将会排列在此报表的第一个查询之下',
  'ERR_OC_PASSWORD' => '密码不能为空',
  'ERR_OC_SERVER_URL' => 'Sugar服务网址不能为空',
  'ERR_OC_USERNAME' => '用户名与服务器用户不能为空',
  'LBL_INSTALL_OC' => '安装offline客户端',
  'LBL_OC_ADMIN' => '请联系你的管理员解决此问题',
  'LBL_OC_SUCCESS' => 'Offline客户端安装完成。请点击按钮使用。',
  'LBL_OC_INSTALL_ADMIN_NAME' => '管理员用户名',
  'LBL_OC_INSTAL_DIRECTIONS' => '请输入下面详细说明，以便正确安装和同步您的离线客户端.',
  'LBL_OC_INSTALL_SERVER_URL' => 'Sugar服务器的网址',
  'LBL_OC_INSTALL_PASS' => '服务器的用户密码',
  'LBL_OC_INSTALL_TITLE' => '离线客户端安装',
  'LBL_OC_INSTALL_USERNAME_DETAILS' => '这是您将连接到您的服务器的用户名.',
  'LBL_OC_INSTALL_USERNAME' => '用户名',
  'LBL_PERFORM_OC_INSTALL' => '初始化离线客户端安装',
  'LBL_OC_INSTALL_DIRECTIONS' => '请输入下面详细说明，以便正确安装和同步您的离线客户端.',
  'ERR_ADMIN_USER_NAME_BLANK' => '提供Sugar管理员用户的用户名。',
  'ERR_ADMIN_PASS_BLANK' => '提供Sugar管理员用户的密码.',
  'ERR_CHECKSYS' => '兼容性检查已发现错误。为使您的SugarCRM的安装顺序正常工作，请采取适当的措施来解决下列问题，要么按复检按钮，或者尝试再次安装。',
  'ERR_CHECKSYS_CALL_TIME' => '允许通话时间开通过参考设置为打开（这应该是在php.ini中设置为关闭）',
  'ERR_CHECKSYS_CURL' => '找不到:Sugar调度程序仅有限功能可用.',
  'ERR_CHECKSYS_FASTCGI_LOGGING' => '为了得到使用IIS/FastCGI sapi的最佳体验，请在你的php.ini文件中设置fastcgi.logging为0。',
  'ERR_CHECKSYS_IMAP' => '找不到:站内电子邮件和影响活动(电子邮件)需要IMAP库，否则将不能正常工作.',
  'ERR_CHECKSYS_MSSQL_MQGPC' => '在使用MS SQL数据库时,智能报价GPC不能设置为"开启".',
  'ERR_CHECKSYS_MEM_LIMIT_0' => '警告:',
  'ERR_CHECKSYS_MEM_LIMIT_1' => '(设置此项到',
  'ERR_CHECKSYS_MEM_LIMIT_2' => 'M或者更大在你的php.ini文件)',
  'ERR_CHECKSYS_MYSQL_VERSION' => '最低版本4.1.2 - 发现:',
  'ERR_CHECKSYS_NO_SESSIONS' => '读取或写入进程变量失败.不能继续此次安装.',
  'ERR_CHECKSYS_NOT_VALID_DIR' => '不是一个有效的目录',
  'ERR_CHECKSYS_NOT_WRITABLE' => '警告：不可写',
  'ERR_CHECKSYS_PHP_INVALID_VER' => '你当前正使用的PHP版本不再被Sugar支持.你需要安装一个兼容当前Sugar的PHP版本.请参照发布说明中的PHP版本部分,得到支持的PHP版本信息.你的版本是',
  'ERR_CHECKSYS_IIS_INVALID_VER' => '您的IIS版本不被Sugar支持。您需要安装的一个与Sugar应用程序兼容的版本。请咨询支持的IIS版本的发行说明兼容性表。您的版本是',
  'ERR_CHECKSYS_FASTCGI' => '我们检测到您使用的不是的FastCGI的处理PHP程序。您需要安装/配置来与Sugar应用程序兼容。请向为支持版本的发行说明兼容性矩阵。详情请参阅http://www.iis.net/php/',
  'ERR_CHECKSYS_PHP_UNSUPPORTED' => '不支持的PHP版本安装:（版本',
  'LBL_DB_UNAVAILABLE' => '数据库不可用',
  'LBL_CHECKSYS_DB_SUPPORT_NOT_AVAILABLE' => '没有支持的数据库可用。请确保您有下列其中一项必要的驱动程序支持的数据库类型：MySQL和MS SQL Server或Oracle的。您可能需要取消注释在php.ini文件中的PHP扩展，或者重新编译正确的二进制文件，这取决于你的PHP版本。请参阅有关如何启用数据库信息，支持您的PHP手册。',
  'LBL_CHECKSYS_XML_NOT_AVAILABLE' => '使用XML解析器，它是由Sugar库相关应用程序所需的功能并没有发现。您可能需要取消注释在php.ini文件中的扩展名，或者重新编译二进制文件的权利，这取决于你的PHP版本。有关详细信息，请参阅您的PHP手册。',
  'ERR_CHECKSYS_MBSTRING' => '与多字节字符串PHP扩展（mbstring说明），它们被Sugar应用程序所需的相关的功能没有被发现。

一般情况下，PHP默认不启用mbstring，要激活了 可以使用参数- enable - mbstring,当PHP编译的时候。请参阅更多关于如何启用mbstring说明信息，支持您的PHP手册。',
  'ERR_CHECKSYS_SESSION_SAVE_PATH_NOT_SET' => '在php.ini中配置的session.save_path路径不是一个文件夹,或者路径不存在.你需要在php.ini中设置一个有效的save_path.',
  'ERR_CHECKSYS_SESSION_SAVE_PATH_NOT_WRITABLE' => '在你的PHP配置文件（php.ini）中session.save_path的设置被设置到一个文件夹这是不写。请采取必要的步骤，以使该文件夹可写。
您的操作系统而定，这可能需要更改运行搭配chmod 766的权限，或右键点击文件名来访问属性并取消只读选项。',
  'ERR_CHECKSYS_CONFIG_NOT_WRITABLE' => '这个配置文件存在，但无法写入。请采取必要的步骤，以使文件可写。您的操作系统而定，这可能需要更改运行命令chmod 766以添加权限，或右键点击文件名来访问属性并取消只读选项。',
  'ERR_CHECKSYS_CUSTOM_NOT_WRITABLE' => '自定义目录存在，但不写。您可能必须改变它它（运行命令chmod 766）或右击权限，并取消只读选项，具体取决于您的操作系统。请采取必要步骤，以使文件可写。',
  'ERR_CHECKSYS_FILES_NOT_WRITABLE' => '下面列出的文件或目录无法写入或丢失，无法创建。根据您的操作系统，纠正这可能需要更改的文件或文件的父目录（运行命令chmod 766）权限，或右键点击父目录和取消的\'只读\'选项并将其应用到所有子文件夹。',
  'ERR_CHECKSYS_SAFE_MODE' => '安全模式打开（您可能希望在php.ini中禁用）',
  'ERR_CHECKSYS_ZLIB' => '找不到:SugarCRM使用zlib压缩以便得到性能的提升',
  'ERR_DB_ADMIN' => '所提供的数据库管理员用户名和/或密码无效，以及对数据库连接不能建立。请输入有效的用户名和密码。 （错误：',
  'ERR_DB_ADMIN_MSSQL' => '所提供的数据库管理员用户名和/或密码无效，以及对数据库连接不能建立。请输入有效的用户名和密码。',
  'ERR_DB_EXISTS_NOT' => '指定的数据库不存在。',
  'ERR_DB_EXISTS_WITH_CONFIG' => '数据库已存在的配置数据。要运行与选定的数据库安装，请重新运行安装并选择：“删除并重新创建现有的SugarCRM表?”如需升级，请在管理控制台升级向导。请仔细阅读升级文档设在这里。',
  'ERR_DB_EXISTS' => '所提供的数据库名称已经存在 - 无法创建另一个具有相同的名称。',
  'ERR_DB_EXISTS_PROCEED' => '所提供的数据库名称已经存在。你可以
1.点击后退按钮，并选择一个新的数据库名称
2. 点击下一步并继续，但在这个数据库中的所有现有表将被删除。这意味着你的表和数据都将被不再存在。',
  'ERR_DB_HOSTNAME' => '主机名不能为空。',
  'ERR_DB_INVALID' => '无效的资料库类型的选择。',
  'ERR_DB_LOGIN_FAILURE_MYSQL' => '所提供的资料库主机，用户名和/或密码无效，以及对数据库连接不能建立。请输入一个有效的主机，用户名和密码',
  'ERR_DB_LOGIN_FAILURE_MSSQL' => '所提供的资料库主机，用户名和/或密码无效，以及对数据库连接不能建立。请输入一个有效的主机，用户名和密码',
  'ERR_DB_MYSQL_VERSION1' => '你的MySQL版本（',
  'ERR_DB_MYSQL_VERSION2' => ')不被Sugar支持.你需要安装一个与Sugar应用程序兼容的版本.请参照发布说明中的MySQL版本兼容说明部分.',
  'ERR_DB_NAME' => '数据库名称不能为空。',
  'ERR_DB_NAME2' => '数据库名称不能包含\'\\\'，\'/\'或\'.\'',
  'ERR_DB_MSSQL_DB_NAME_INVALID' => '数据库名称不能包含\'"\', "\'", \'*\', \'/\', \'\\\', \'?\', \':\', \'<\', \'>\', 或\'-\'',
  'ERR_DB_PASSWORD' => '密码不匹配.请输入与一致的密码.',
  'ERR_DB_PRIV_USER' => '请提供一个数据库管理员用户名.此用户用于初始化数据库连接.',
  'ERR_DB_USER_EXISTS' => '数据库用户名已存在--不能创建同名数据库用户.请输入一个新的用户名.',
  'ERR_DB_USER' => '输入Sugar数据库管理员的用户名。',
  'ERR_DBCONF_VALIDATION' => '请修复下列错误后继续:',
  'ERR_DBCONF_PASSWORD_MISMATCH' => '用于Sugar数据库用户提供的密码不匹配。请重新输入密码字段相同的密码',
  'ERR_ERROR_GENERAL' => '遇到以下错误:',
  'ERR_LANG_CANNOT_DELETE_FILE' => '无法删除文件:',
  'ERR_LANG_MISSING_FILE' => '找不到文件:',
  'ERR_LANG_NO_LANG_FILE' => '在include/language下,找不到语言补丁文件',
  'ERR_LANG_UPLOAD_1' => '你的上传有一个问题。请再试一次。',
  'ERR_LANG_UPLOAD_2' => '语言补丁文件必须是ZIP存档',
  'ERR_LANG_UPLOAD_3' => 'PHP不能移动临时文件到升级目录。',
  'ERR_LICENSE_MISSING' => '缺少必要的字段',
  'ERR_LICENSE_NOT_FOUND' => '找不到许可文件',
  'ERR_LOG_DIRECTORY_NOT_EXISTS' => '指定的日志目录不是有效目录',
  'ERR_LOG_DIRECTORY_NOT_WRITABLE' => '提供的日志目录不是一个有效的目录。',
  'ERR_LOG_DIRECTORY_REQUIRED' => '如果你希望设置自己的日志,日志目录必须存在且有效',
  'ERR_NO_DIRECT_SCRIPT' => '无法直接处理脚本。',
  'ERR_NO_SINGLE_QUOTE' => '不可以使用单引号',
  'ERR_PASSWORD_MISMATCH' => '密码不匹配。',
  'ERR_PERFORM_CONFIG_PHP_1' => '不能写入config.php文件。',
  'ERR_PERFORM_CONFIG_PHP_2' => '您可以继续通过手动创建的config.php文件，并粘贴到下面的config.php文件中的配置信息以继续安装。但是，您必须创建的config.php文件，然后再继续下一个步骤。',
  'ERR_PERFORM_CONFIG_PHP_3' => '你记得创建config.php文件？',
  'ERR_PERFORM_CONFIG_PHP_4' => '警告：无法写入config.php文件。请确保它的存在。',
  'ERR_PERFORM_HTACCESS_1' => '不能写入',
  'ERR_PERFORM_HTACCESS_2' => '文件。',
  'ERR_PERFORM_HTACCESS_3' => '如果你要保护被通过浏览器访问您的日志文件，在你的日志目录中创建一个.htaccess文件：
',
  'ERR_PERFORM_NO_TCPIP' => '我们无法检测到互联网连接。如果你有一个可用连接，请访问http://www.sugarcrm.com/home/index.php?option=com_extended_registration&task=register登记与SugarCRM。通过让我们了解您的公司使用SugarCRM的计划，我们可以确保我们始终为您的企业提供合适的应用需求。',
  'ERR_SESSION_DIRECTORY_NOT_EXISTS' => '你所提供的进程目录不是一个有效的目录',
  'ERR_SESSION_DIRECTORY' => '你所提供的进程目录不是一个可写的目录',
  'ERR_SESSION_PATH' => '会话的路径是必需的，如果你想指定你自己的。
',
  'ERR_SI_NO_CONFIG' => '你没有包含在文档根config_si.php，或您没有在config.php 中定义sugar_config_si
',
  'ERR_SITE_GUID' => '如果你想设置一个自己独有的,需要一个应用程序ID.',
  'ERR_UPLOAD_MAX_FILESIZE' => '警告：你的PHP的配置应改为允许至少6MB的文件被上传。
',
  'LBL_UPLOAD_MAX_FILESIZE_TITLE' => '上传文件大小',
  'ERR_URL_BLANK' => '请提供了Sugar实例的基URL。
',
  'ERR_UW_NO_UPDATE_RECORD' => '不能定位安装记录',
  'ERROR_FLAVOR_INCOMPATIBLE' => '上传的文件和Sugar Suite的版本(开源版，专业版，企业版)不兼容:',
  'ERROR_LICENSE_EXPIRED' => '错误：您的许可过期 ',
  'ERROR_LICENSE_EXPIRED2' => ' 天数已过.  请到 <a href=\'index.php?action=LicenseSettings&module=Administration\'>\'"许可管理"</a>  在管理员屏幕输入您的新许可关键字. 如果您在您的许可关键字到期30天内不输入新许可关键字，您将不能在登陆到这个应用中.',
  'ERROR_MANIFEST_TYPE' => '名单文件必须指定程序包类型。',
  'ERROR_PACKAGE_TYPE' => '名单文件指定了一个不能识别的程序包类型。',
  'ERROR_VALIDATION_EXPIRED' => '错误：您验证的关键字过期 ',
  'ERROR_VALIDATION_EXPIRED2' => ' 天数已过.  请到 <a href=\'index.php?action=LicenseSettings&module=Administration\'>\'"许可管理"</a> 在管理员界面输入您新的验证关键字.  如果您不在30天关键字验证有效期内输入新验证关键字, 您将不再能登陆这个应用.',
  'ERROR_VERSION_INCOMPATIBLE' => '上传的文件和当前版本的Sugar Suite不兼容:',
  'LBL_BACK' => '后退',
  'LBL_CANCEL' => '取消',
  'LBL_ACCEPT' => '我接受',
  'LBL_CHECKSYS_1' => '为了使您的安装SugarCRM的正常工作，请确保该系统检查下面列出的是绿色的所有项目。如果有任何红色，请采取必要的步骤来解决这些问题。

有关这些系统检查帮助，请访问Sugar的Wiki。',
  'LBL_CHECKSYS_CACHE' => '可写的缓存次级目录',
  'LBL_DROP_DB_CONFIRM' => '所提供的数据库名称已经存在。
您可以：
1。点击取消按钮，然后选择一个新的数据库名称，或
2。点击接受按钮，然后继续。在数据库中的所有现有表将被删除。这意味着，该表和预先存在的数据都将被清除。',
  'LBL_CHECKSYS_CALL_TIME' => 'PHP的"Allow Call Time Pass Reference"设置为Off
',
  'LBL_CHECKSYS_COMPONENT' => '组件',
  'LBL_CHECKSYS_COMPONENT_OPTIONAL' => '可选组件',
  'LBL_CHECKSYS_CONFIG' => '可写的SugarCRM配置文件(config.php)',
  'LBL_CHECKSYS_CURL' => 'CURL模式',
  'LBL_CHECKSYS_SESSION_SAVE_PATH' => '进程保存目录设置',
  'LBL_CHECKSYS_CUSTOM' => '可写自定义目录',
  'LBL_CHECKSYS_DATA' => '可写数据子目录',
  'LBL_CHECKSYS_IMAP' => 'IMAP模式',
  'LBL_CHECKSYS_MQGPC' => '智能报价GPC',
  'LBL_CHECKSYS_MBSTRING' => 'MB Strings模块',
  'LBL_CHECKSYS_MEM_OK' => '是(无限制)',
  'LBL_CHECKSYS_MEM_UNLIMITED' => '是(无限制)',
  'LBL_CHECKSYS_MEM' => 'PHP的内存限制',
  'LBL_CHECKSYS_MODULE' => '可写的模块次级目录与文件',
  'LBL_CHECKSYS_MYSQL_VERSION' => 'MySQL的版本',
  'LBL_CHECKSYS_NOT_AVAILABLE' => '无效',
  'LBL_CHECKSYS_OK' => '确定',
  'LBL_CHECKSYS_PHP_INI' => '你的PHP配置文件的位置（php.ini中）：
',
  'LBL_CHECKSYS_PHP_OK' => 'OK(ver',
  'LBL_CHECKSYS_PHPVER' => 'PHP的版本',
  'LBL_CHECKSYS_IISVER' => 'IIS版本',
  'LBL_CHECKSYS_RECHECK' => '再次检查',
  'LBL_CHECKSYS_SAFE_MODE' => 'PHP安全模式关闭',
  'LBL_CHECKSYS_SESSION' => '可写的进程保存路径(',
  'LBL_CHECKSYS_STATUS' => '状态',
  'LBL_CHECKSYS_TITLE' => '系统检查验收
',
  'LBL_CHECKSYS_VER' => '找到: (ver',
  'LBL_CHECKSYS_XML' => 'XML解析',
  'LBL_CHECKSYS_ZLIB' => 'ZLIB 压缩模块',
  'LBL_CHECKSYS_FIX_FILES' => '请修正下列文件或继续之前的目录：
',
  'LBL_CHECKSYS_FIX_MODULE_FILES' => '请修正然后继续下面的模块目录，并根据这些文件：
',
  'LBL_CLOSE' => '关闭',
  'LBL_CONFIRM_BE_CREATED' => '被创建',
  'LBL_CONFIRM_DB_TYPE' => '数据库类型',
  'LBL_CONFIRM_DIRECTIONS' => '请确认以下设置。如果你想改变任何值，点击“返回”编辑。否则，按“下一步”开始安装。
',
  'LBL_CONFIRM_LICENSE_TITLE' => '许可协议信息',
  'LBL_CONFIRM_NOT' => '不',
  'LBL_CONFIRM_TITLE' => '确认设置',
  'LBL_CONFIRM_WILL' => '将',
  'LBL_DBCONF_CREATE_DB' => '新建数据库',
  'LBL_DBCONF_CREATE_USER' => '新增用户',
  'LBL_DBCONF_DB_DROP_CREATE_WARN' => '注意：所有数据将被清除Sugar
如果此框被选中。',
  'LBL_DBCONF_DB_DROP_CREATE' => '删除并重新创建现有的Sugar数据库表？
',
  'LBL_DBCONF_DB_DROP' => '删除表',
  'LBL_DBCONF_DB_NAME' => '数据库名',
  'LBL_DBCONF_DB_PASSWORD' => 'Sugar数据库用户密码',
  'LBL_DBCONF_DB_PASSWORD2' => '重新输入Sugar数据库用户密码
',
  'LBL_DBCONF_DB_USER' => 'Sugar数据库用户名',
  'LBL_DBCONF_SUGAR_DB_USER' => 'Sugar数据库用户名',
  'LBL_DBCONF_DB_ADMIN_USER' => '数据库管理员用户名',
  'LBL_DBCONF_DB_ADMIN_PASSWORD' => '数据库管理员密码',
  'LBL_DBCONF_DEMO_DATA' => '安装带示例数据的数据库',
  'LBL_DBCONF_DEMO_DATA_TITLE' => '选择示例数据',
  'LBL_DBCONF_HOST_NAME' => '主机名',
  'LBL_DBCONF_HOST_NAME_MSSQL' => '主机名\\实例',
  'LBL_DBCONF_INSTRUCTIONS' => '请输入您的数据库配置信息如下。如果你是如何填写，在不能确定时我们建议您使用默认值。',
  'LBL_DBCONF_MB_DEMO_DATA' => '使用多字节的示例数据',
  'LBL_DBCONFIG_MSG2' => '数据库所在的网络服务器或计算机名称（主机)（如localhost或www.mydomain.com）：
',
  'LBL_DBCONFIG_MSG3' => '数据库的名称将包含用于Sugar实例数据，你将要安装：
',
  'LBL_DBCONFIG_B_MSG1' => '用户名和数据库管理员谁可以创建数据库表和用户，谁可以写入数据库密码是必要的，以便建立Sugar数据库。
',
  'LBL_DBCONFIG_SECURITY' => '为了安全起见，您可以指定一个独家数据库用户连接到数据库的Sugar。此用户必须是能写，更新和检索数据库的Sugar将用于该实例创建的数据。该用户可以是上面指定的数据库管理员，也可以提供新的或现有的数据库用户的信息。
',
  'LBL_DBCONFIG_AUTO_DD' => '请帮我执行',
  'LBL_DBCONFIG_PROVIDE_DD' => '提供存在的用户',
  'LBL_DBCONFIG_CREATE_DD' => '定义或创建用户',
  'LBL_DBCONFIG_SAME_DD' => '与管理员用户一致',
  'LBL_MSSQL_FTS' => '全文本检索',
  'LBL_MSSQL_FTS_INSTALLED' => '已安装',
  'LBL_MSSQL_FTS_INSTALLED_ERR1' => '全文检索功能没有安装。
',
  'LBL_MSSQL_FTS_INSTALLED_ERR2' => '您仍然可以安装，但将无法使用全文检索功能，除非您重新安装SQL Server的全文检索功能。请参阅SQL Server安装在如何做到这一点，或者联系您的管理员指南。',
  'LBL_DBCONF_PRIV_PASS' => '特权数据库用户密码',
  'LBL_DBCONF_PRIV_USER_2' => '数据库帐户上面是一个特权用户？',
  'LBL_DBCONF_PRIV_USER_DIRECTIONS' => '这种特权的数据库用户必须具有适当的权限来创建一个数据库，删除/创建表，并创建一个用户。这种特权的数据库用户将只用于执行期间安装过程中需要完成这些任务。你也可以使用上述如果该用户具有足够的权限相同的数据库用户。',
  'LBL_DBCONF_PRIV_USER' => '享有特权的数据库用户名',
  'LBL_DBCONF_TITLE' => '数据库配置',
  'LBL_DBCONF_TITLE_NAME' => '提供数据库名',
  'LBL_DBCONF_TITLE_USER_INFO' => '提供数据库用户信息',
  'LBL_DISABLED_DESCRIPTION_2' => '在此之后改变了一些进展，您可以点击“开始”下面的按钮，开始安装。安装完成后，你会想改变\'installer_locked\'的值\'true\'。',
  'LBL_DISABLED_DESCRIPTION' => '安装程序已运行一次。作为一项安全措施，它已被禁用运行第二次。如果你绝对确定要再次运行它，请到你的config.php文件，然后找到（或添加）一个变量叫\'installer_locked\'，并将其设置为\'false\'。该行应该是这样的：',
  'LBL_DISABLED_HELP_1' => '请访问SugarCRM得到安装帮助',
  'LBL_DISABLED_HELP_2' => '支持论坛',
  'LBL_DISABLED_TITLE_2' => 'SugarCRM安装程序已失效',
  'LBL_DISABLED_TITLE' => 'SugarCRM安装程序已失效',
  'LBL_EMAIL_CHARSET_DESC' => '字符集最常用的语言环境',
  'LBL_EMAIL_CHARSET_TITLE' => '发件箱设置',
  'LBL_EMAIL_CHARSET_CONF' => '外发电子邮件字符集',
  'LBL_HELP' => '帮助',
  'LBL_INSTALL' => '安装',
  'LBL_INSTALL_TYPE_TITLE' => '安装选项',
  'LBL_INSTALL_TYPE_SUBTITLE' => '选择安装类型',
  'LBL_INSTALL_TYPE_TYPICAL' => '典型安装',
  'LBL_INSTALL_TYPE_CUSTOM' => '自定义安装',
  'LBL_INSTALL_TYPE_MSG1' => '密钥是必须的以用一般应用程序的功能，但它不是安装所必需的。你并不需要输入此时的密钥，但你需要提供的密钥在您安装该应用程序。',
  'LBL_INSTALL_TYPE_MSG2' => '最低要求的信息进行安装。推荐新用户。',
  'LBL_INSTALL_TYPE_MSG3' => '提供额外的选项来设置在安装过程中。这些选项后，大多也可以在管理屏幕的安装。建议高级用户使用。
',
  'LBL_LANG_1' => '要在Sugar中使用的默认语言（美国英语）之外语言，你可以上传并安装在这个时候语言包。您可以上载并安装在Sugar应用以及语言包。如果你想跳过这一步，单击下一步。',
  'LBL_LANG_BUTTON_COMMIT' => '安装',
  'LBL_LANG_BUTTON_REMOVE' => '移除',
  'LBL_LANG_BUTTON_UNINSTALL' => '卸载',
  'LBL_LANG_BUTTON_UPLOAD' => '上传',
  'LBL_LANG_NO_PACKS' => '无',
  'LBL_LANG_PACK_INSTALLED' => '下面的语言包已经安装：',
  'LBL_LANG_PACK_READY' => '下面的语言包可以安装：',
  'LBL_LANG_SUCCESS' => '语言补丁包成功上传',
  'LBL_LANG_TITLE' => '语言包',
  'LBL_LAUNCHING_SILENT_INSTALL' => '现在开始安装Sugar。这可能需要几分钟。',
  'LBL_LANG_UPLOAD' => '上传一个语言补丁包',
  'LBL_LICENSE_ACCEPTANCE' => '接受许可协议',
  'LBL_LICENSE_CHECKING' => '检查系统兼容性',
  'LBL_LICENSE_CHKENV_HEADER' => '检查环境',
  'LBL_LICENSE_CHKDB_HEADER' => '数据库身份验证',
  'LBL_LICENSE_CHECK_PASSED' => '通过系统兼容性检查',
  'LBL_LICENSE_REDIRECT' => '重定向到',
  'LBL_LICENSE_DIRECTIONS' => '如果你有你的许可证信息，请在下面输入。',
  'LBL_LICENSE_DOWNLOAD_KEY' => '输入一个下载密钥',
  'LBL_LICENSE_EXPIRY' => '终止日期',
  'LBL_LICENSE_I_ACCEPT' => '我接受',
  'LBL_LICENSE_NUM_USERS' => '用户数',
  'LBL_LICENSE_OC_DIRECTIONS' => '请输入购买的脱机客户端数量。',
  'LBL_LICENSE_OC_NUM' => '离线客户端许可证数',
  'LBL_LICENSE_OC' => 'Offline Client许可证',
  'LBL_LICENSE_PRINTABLE' => '可打印视图',
  'LBL_PRINT_SUMM' => '打印摘要',
  'LBL_LICENSE_TITLE_2' => 'SugarCRM许可证',
  'LBL_LICENSE_TITLE' => '许可协议信息',
  'LBL_LICENSE_USERS' => '许可用户',
  'LBL_LOCALE_CURRENCY' => '货币设置',
  'LBL_LOCALE_CURR_DEFAULT' => '默认货币',
  'LBL_LOCALE_CURR_SYMBOL' => '货币符号',
  'LBL_LOCALE_CURR_ISO' => '货币代码(ISO 4217)',
  'LBL_LOCALE_CURR_1000S' => '千分符',
  'LBL_LOCALE_CURR_DECIMAL' => '小数分隔符(十进制)',
  'LBL_LOCALE_CURR_EXAMPLE' => '示例',
  'LBL_LOCALE_CURR_SIG_DIGITS' => '有效数字-`',
  'LBL_LOCALE_DATEF' => '默认数据格式',
  'LBL_LOCALE_DESC' => '-`指定的区域设置将反映在全局范围内Sugar的实例。
',
  'LBL_LOCALE_EXPORT' => '字符导入/导出设置
(Email, .csv, vCard, PDF, 数据导入)
',
  'LBL_LOCALE_EXPORT_DELIMITER' => '导出（.csv）的分隔符',
  'LBL_LOCALE_EXPORT_TITLE' => '导入/导出设置',
  'LBL_LOCALE_LANG' => '默认语言',
  'LBL_LOCALE_NAMEF' => '默认的名称格式',
  'LBL_LOCALE_NAMEF_DESC' => 's =称呼
f =名字
l=姓氏',
  'LBL_LOCALE_NAME_FIRST' => '大卫',
  'LBL_LOCALE_NAME_LAST' => '李文斯顿',
  'LBL_LOCALE_NAME_SALUTATION' => '博士',
  'LBL_LOCALE_TIMEF' => '默认的时间格式',
  'LBL_LOCALE_TITLE' => '系统本地设置',
  'LBL_CUSTOMIZE_LOCALE' => '自定义本地设置',
  'LBL_LOCALE_UI' => '用户界面',
  'LBL_ML_ACTION' => '操作',
  'LBL_ML_DESCRIPTION' => '说明',
  'LBL_ML_INSTALLED' => '安装日期',
  'LBL_ML_NAME' => '名称',
  'LBL_ML_PUBLISHED' => '发布日期',
  'LBL_ML_TYPE' => '类型',
  'LBL_ML_UNINSTALLABLE' => '可卸载',
  'LBL_ML_VERSION' => '版本',
  'LBL_MSSQL2' => 'SQL Server(FreeTDS)',
  'LBL_NEXT' => '下一步',
  'LBL_NO' => '否',
  'LBL_PERFORM_ADMIN_PASSWORD' => '设置站点管理员密码',
  'LBL_PERFORM_AUDIT_TABLE' => 'audit table /',
  'LBL_PERFORM_CONFIG_PHP' => '创建Sugar配置文件
',
  'LBL_PERFORM_CREATE_DB_1' => '创建数据库进行中',
  'LBL_PERFORM_CREATE_DB_2' => '开启',
  'LBL_PERFORM_CREATE_DB_USER' => '创建数据库用户名和密码进行中',
  'LBL_PERFORM_CREATE_DEFAULT' => '创建默认Sugar数据进行中',
  'LBL_PERFORM_CREATE_LOCALHOST' => '创建数据库的用户名和密码的localhost ...',
  'LBL_PERFORM_CREATE_RELATIONSHIPS' => '创建Sugar关系的表
',
  'LBL_PERFORM_CREATING' => '创建中/',
  'LBL_PERFORM_DEFAULT_REPORTS' => '创建默认报表进行中',
  'LBL_PERFORM_DEFAULT_SCHEDULER' => '创建默认调度程序任务进行中',
  'LBL_PERFORM_DEFAULT_SETTINGS' => '插入默认设置进行中',
  'LBL_PERFORM_DEFAULT_USERS' => '创建默认用户进行中',
  'LBL_PERFORM_DEMO_DATA' => '创建数据库表和示例数据进行中(需要一些时间)',
  'LBL_PERFORM_DONE' => '完成',
  'LBL_PERFORM_DROPPING' => '删除中 /',
  'LBL_PERFORM_FINISH' => '完成',
  'LBL_PERFORM_LICENSE_SETTINGS' => '更行许可协议信息进行中',
  'LBL_PERFORM_OUTRO_1' => 'Sugar的设置
',
  'LBL_PERFORM_OUTRO_2' => '已完成!',
  'LBL_PERFORM_OUTRO_3' => '总时间:',
  'LBL_PERFORM_OUTRO_4' => '秒.',
  'LBL_PERFORM_OUTRO_5' => '大约内存使用:',
  'LBL_PERFORM_OUTRO_6' => '字节.',
  'LBL_PERFORM_OUTRO_7' => '您的系统已经安装和配置好了。',
  'LBL_PERFORM_REL_META' => '关系无数据...',
  'LBL_PERFORM_SUCCESS' => '成功!',
  'LBL_PERFORM_TABLES' => 'Sugar创建应用程序表，审计表和元数据的关系',
  'LBL_PERFORM_TITLE' => '执行安装程序',
  'LBL_PRINT' => '打印',
  'LBL_REG_CONF_1' => '请填写下面的表单以收取SugarCRM的产品发布，培训新闻，特别优惠和特别活动的邀请。我们不会出售，出租，共享或以其他方式分发所收集的信息在这里给第三方。',
  'LBL_REG_CONF_2' => '你的名字和电子邮件地址只需要在注册过程中的字段。所有其他字段都是可选的，但非常有帮助。我们不会出售，出租，共享，分发或以其他方式所收集的信息在这里给第三方。',
  'LBL_REG_CONF_3' => '感谢您的注册。点击完成按钮登录到SugarCRM的。您需要登录首次使用用户名“admin”和密码您在步骤2中输入。',
  'LBL_REG_TITLE' => '注册',
  'LBL_REG_NO_THANKS' => ' 不谢谢',
  'LBL_REG_SKIP_THIS_STEP' => '跳过这一步',
  'LBL_REQUIRED' => '* 必填字段',
  'LBL_SITECFG_ADMIN_Name' => 'Sugar的应用管理员名称',
  'LBL_SITECFG_ADMIN_PASS_2' => '再次输入Sugar的应用管理员名称',
  'LBL_SITECFG_ADMIN_PASS_WARN' => '注意：这将覆盖任何先前安装的管理员密码。',
  'LBL_SITECFG_ADMIN_PASS' => 'Sugar管理员用户密码',
  'LBL_SITECFG_APP_ID' => '应用程序ID',
  'LBL_SITECFG_CUSTOM_ID_DIRECTIONS' => '如果选择，你必须提供一个应用程序ID来覆盖自动生成的ID。该ID确保会议的一个Sugar实例不被其他一些情况。如果你有一个Sugar安装群集，它们都必须共享相同的应用程序ID。',
  'LBL_SITECFG_CUSTOM_ID' => '提供您自己的应用程序ID
',
  'LBL_SITECFG_CUSTOM_LOG_DIRECTIONS' => '如果选中，你必须指定一个日志目录覆盖用于Sugar日志的默认目录。无论在何处的日志文件的位置，可以通过一个Web浏览器将被限制通过的.htaccess重定向。',
  'LBL_SITECFG_CUSTOM_LOG' => '使用自定义的日志目录',
  'LBL_SITECFG_CUSTOM_SESSION_DIRECTIONS' => '如果选择，你必须提供一个用于存储信息的安全文件夹中Sugar会话。这可以做，以防止在共享服务器脆弱的会话数据。',
  'LBL_SITECFG_CUSTOM_SESSION' => '为Sugar使用一个自定义会话目录
',
  'LBL_SITECFG_DIRECTIONS' => '请输入您的登录以下网站配置信息。如果您不确定这个字段，我们建议您使用默认值。',
  'LBL_SITECFG_FIX_ERRORS' => '继续之前请修正下列错误：',
  'LBL_SITECFG_LOG_DIR' => '日志目录',
  'LBL_SITECFG_SESSION_PATH' => '会话目录的路径
（必须是可写）',
  'LBL_SITECFG_SITE_SECURITY' => '选择安全选项',
  'LBL_SITECFG_SUGAR_UP_DIRECTIONS' => '如果选择，系统将定期检查应用程序的更新版本。',
  'LBL_SITECFG_SUGAR_UP' => '自动检查更新？',
  'LBL_SITECFG_SUGAR_UPDATES' => 'Sugar 更新配置',
  'LBL_SITECFG_TITLE' => '站点配置',
  'LBL_SITECFG_TITLE2' => '识别管理用户',
  'LBL_SITECFG_SECURITY_TITLE' => '站点安全',
  'LBL_SITECFG_URL' => 'Sugar实例的URL',
  'LBL_SITECFG_USE_DEFAULTS' => '使用默认吗？',
  'LBL_SITECFG_ANONSTATS' => '发送匿名使用统计信息？',
  'LBL_SITECFG_ANONSTATS_DIRECTIONS' => '如果选择，Sugar会发送有关您安装SugarCRM公司每一次新版本的系统检查，匿名的统计数字。这些信息将有助于我们更好地了解应用程序如何使用和指导改进产品。',
  'LBL_SITECFG_URL_MSG' => '输入将被用来访问安装后Sugar实例的URL。该网址也将被用来作为网址中的Sugar应用程序页的基础。该网址应包括网络服务器或计算机名称或IP地址。',
  'LBL_SITECFG_SYS_NAME_MSG' => '输入您的系统名称。此名称将显示在浏览器标题栏，当用户访问该Sugar的应用。',
  'LBL_SITECFG_PASSWORD_MSG' => '安装后，您将需要使用Sugar管理员用户（默认用户名=管理员）登录到Sugar的实例。输入此管理员用户的密码。此密码可以更改后的最初登录。您也可以输入另一个管理员使用的用户名，除了提供默认值。',
  'LBL_SYSTEM_CREDS' => '系统证书',
  'LBL_SYSTEM_ENV' => '系统环境',
  'LBL_START' => '开始',
  'LBL_SHOW_PASS' => '显示密码',
  'LBL_HIDE_PASS' => '隐藏密码',
  'LBL_HIDDEN' => '（隐藏）',
  'LBL_CHOOSE_LANG' => '选择你的语言',
  'LBL_STEP' => '步骤',
  'LBL_TITLE_WELCOME' => '欢迎来到SugarCRM',
  'LBL_WELCOME_1' => '此安装SugarCRM的数据库表创建和设置配置变量，你需要开始。整个过程大约需要十分钟。',
  'LBL_WELCOME_2' => '有关安装文档，请访问Sugar维基。

要帮助联系安装SugarCRM的支持工程师，请登录到SugarCRM的支持门户网站，并提交支持案例。',
  'LBL_TITLE_ARE_YOU_READY' => '你准备好安装吗？',
  'REQUIRED_SYS_COMP' => '需要系统组件
',
  'REQUIRED_SYS_COMP_MSG' => '在开始之前，请确保您有以下系统组件所支持的版本：
数据库/数据库管理系统（如：MySQL中，SQL服务器，Oracle）
网页服务器（Apache，IIS）的
在咨询用于Sugar版本，您正在安装兼容的系统部件的发行说明兼容性矩阵。',
  'REQUIRED_SYS_CHK' => '初始系统检查
',
  'REQUIRED_SYS_CHK_MSG' => '当您开始安装过程中，将进行系统检查在Web服务器上的文件位于Sugar，以确保系统的正确配置，具有所有必要的组件安装成功完成。

该系统将检查以下所有：
PHP版本 - 必须与应用程序兼容
会话变量 - 必须正常工作
MB的字符串 - 必须安装并在php.ini中启用
数据库支持 - 必须存在于MySQL，SQL Server或Oracle
config.php文件 - 必须存在，必须具有相应的权限，使其可写
下面的Sugarf文件必须可写：
/自定义
/高速缓存
/模块
如果检查失败，您将无法继续进行安装。错误信息会被显示，解释为什么你的系统没有通过检查。作出任何必要的修改后，你可以进行系统检查再次以继续安装。',
  'REQUIRED_INSTALLTYPE' => '精简或自定义安装',
  'LBL_WELCOME_PLEASE_READ_BELOW' => '在继续安装前请阅读安装程序的以下重要信息。这些信息将帮助您确定您是否已准备好安装在这个时候申请。',
  'LBL_WELCOME_CHOOSE_LANGUAGE' => '选择你的语言',
  'LBL_WELCOME_SETUP_WIZARD' => '安装向导',
  'LBL_WELCOME_TITLE_WELCOME' => '欢迎来到SugarCRm',
  'LBL_WELCOME_TITLE' => 'SugarCRM的安装向导',
  'LBL_WIZARD_TITLE' => 'Sugar安装向导',
  'LBL_YES' => '是',
  'LBL_YES_MULTI' => '确定 - 多字节',
  'LBL_OOTB_WORKFLOW' => '执行工作流任务',
  'LBL_OOTB_IE' => '检查收件箱',
  'LBL_OOTB_BOUNCE' => '每晚处理退回的电子邮件',
  'LBL_OOTB_CAMPAIGN' => '每晚批量运行电子邮件市场活动',
  'LBL_UPDATE_TRACKER_SESSIONS' => '更新tracker_sessions表',
  'LBL_PATCHES_TITLE' => '安装最新的补丁',
  'LBL_MODULE_TITLE' => '安装语言包',
  'LBL_PATCH_1' => '如果你想跳过这一步，单击下一步。',
  'LBL_PATCH_TITLE' => '系统补丁',
  'LBL_PATCH_READY' => '下面的补丁（或多个）的已准备好进行安装：
',
  'LBL_SESSION_ERR_DESCRIPTION' => 'SugarCRM公司依靠PHP会话来存储重要信息，同时连接到该Web服务器。你的PHP安装没有正确配置的会话信息。

一个常见的错误配置是，\'session.save_path的\'没有指向一个有效的目录。

请更正你的PHP在php.ini配置文件位于此处下方。',
  'LBL_SESSION_ERR_TITLE' => 'PHP会话配置错误',
  'LBL_SYSTEM_NAME' => '系统名称',
  'LBL_REQUIRED_SYSTEM_NAME' => '请提供一个Sugar实例的系统名称。',
  'LBL_PATCH_UPLOAD' => '从本地计算机上选择一个补丁文件',
  'LBL_INCOMPATIBLE_PHP_VERSION' => '需要Php5或以上版本.',
  'LBL_MINIMUM_PHP_VERSION' => '所需的最低PHP版本5.1.0。推荐的PHP版本5.2.x.',
  'LBL_YOUR_PHP_VERSION' => '（你当前的php版本是',
  'LBL_RECOMMENDED_PHP_VERSION' => '推荐的版本是 5.2.x 及以上版本）',
  'LBL_BACKWARD_COMPATIBILITY_ON' => 'Php向后兼容模式已打开. 如果想关闭请将zend.ze1_compatibility_mode设置成off.',
);

