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
  'LBL_BUTTON_EXIT' => '退出',
  'LBL_BUTTON_RESTART' => '重新开始',
  'LBL_UW_END_LOGOUT_PRE' => '升级完毕。',
  'LBL_UW_END_LOGOUT_PRE2' => '点击完成且退出升级向导。',
  'DESC_MODULES_INSTALLED' => '以下模块已安装:',
  'DESC_MODULES_QUEUED' => '未安装的更新补丁:',
  'ERR_UW_CANNOT_DETERMINE_GROUP' => '不能确定组',
  'ERR_UW_CANNOT_DETERMINE_USER' => '不能确定所有者',
  'ERR_UW_CONFIG_WRITE' => '错误在config，php文件中更新新版本信息。',
  'ERR_UW_CONFIG' => '请确认config.php文件可写，并写刷新当前页。',
  'ERR_UW_DIR_NOT_WRITABLE' => '目录不可写',
  'ERR_UW_FILE_NOT_COPIED' => '文件未复制',
  'ERR_UW_FILE_NOT_DELETED' => '问题移除程序包',
  'ERR_UW_FILE_NOT_READABLE' => '文件不可读。',
  'ERR_UW_FILE_NOT_WRITABLE' => '文件不可移动或者写到',
  'ERR_UW_FLAVOR_2' => '升级版本:',
  'ERR_UW_FLAVOR' => 'SugarCRM系统版本:',
  'ERR_UW_LOG_FILE_UNWRITABLE' => './upradeWizard.log文件不可创建/写入。请修复SugarCRM路径的权限。',
  'ERR_UW_MBSTRING_FUNC_OVERLOAD' => 'mbstring.func_overload设置了大于1的值。请在php.ini文件中更改这个变量的值，并且重新启动网络服务器。',
  'ERR_UW_MYSQL_VERSION' => 'SugarCRM需要MySQL版本为4.2.1或者更高。发现:',
  'ERR_UW_NO_FILE_UPLOADED' => '请指定一个文件，并重试！',
  'ERR_UW_NO_FILES' => '发现了一个错误，没有要检查的文件。',
  'ERR_UW_NO_MANIFEST' => '压缩文件缺少manifest.php文件。不能继续。',
  'ERR_UW_NO_VIEW' => '指定的视图无效。',
  'ERR_UW_NO_VIEW2' => '视图没有定义。请到管理员首页浏览该页。',
  'ERR_UW_NOT_VALID_UPLOAD' => '无效上传。',
  'ERR_UW_NO_CREATE_TMP_DIR' => '不能创建临时目录。检查文件权限。',
  'ERR_UW_ONLY_PATCHES' => '在该页，您只可以上传补丁。',
  'ERR_UW_PREFLIGHT_ERRORS' => '在准备前检查中发现错误',
  'ERR_UW_UPLOAD_ERR' => '上传文件出错。请重试！<br>\\n',
  'ERR_UW_VERSION' => 'SugarCRM系统版本:',
  'ERR_UW_WRONG_TYPE' => '这个页面不能运行',
  'LBL_BUTTON_BACK' => '上一步',
  'LBL_BUTTON_CANCEL' => '取消',
  'LBL_BUTTON_DELETE' => '删除程序包',
  'LBL_BUTTON_DONE' => '完成',
  'LBL_BUTTON_INSTALL' => '升级前准备',
  'LBL_BUTTON_NEXT' => '下一步',
  'LBL_BUTTON_RECHECK' => '重新检查',
  'LBL_UPLOAD_UPGRADE' => '上传更新:',
  'LBL_UPLOAD_FILE_NOT_FOUND' => '未找到上传文件',
  'LBL_UW_BACKUP_FILES_EXIST_TITLE' => '文件备份',
  'LBL_UW_BACKUP_FILES_EXIST' => '备份这次升级文件到',
  'LBL_UW_BACKUP' => '文件备份',
  'LBL_UW_CANCEL_DESC' => '取消升级向导。所有临时文件和上传的zip文件被删除。<br><br>点击“下一步”重新开始升级向导。',
  'LBL_UW_CHARSET_SCHEMA_CHANGE' => '字符集结构改变',
  'LBL_UW_CHECK_ALL' => '全选',
  'LBL_UW_CHECKLIST' => '升级步骤',
  'LBL_UW_COMMIT_ADD_TASK_DESC_1' => '覆盖的文件的备份在以下目录中： 
',
  'LBL_UW_COMMIT_ADD_TASK_DESC_2' => '手动合并以下文件：
',
  'LBL_UW_COMMIT_ADD_TASK_NAME' => '升级进程:手工合并文件',
  'LBL_UW_COMMIT_ADD_TASK_OVERVIEW' => '请使用您最熟悉的方法来合并这些文件。在这些完成后，SugarCRM安装才处于确定的状态，更新完成。',
  'LBL_UW_COMPLETE' => '完成',
  'LBL_UW_CONTINUE_CONFIRMATION' => '这个Sugar的新版本包含了新许可协议.  您愿意继续吗?',
  'LBL_UW_COMPLIANCE_ALL_OK' => '所有系统设置都满足需要',
  'LBL_UW_COMPLIANCE_CALLTIME' => 'PHP设置:Call Time Pass By Reference',
  'LBL_UW_COMPLIANCE_CURL' => 'CURL模式',
  'LBL_UW_COMPLIANCE_IMAP' => 'IMAP模式',
  'LBL_UW_COMPLIANCE_MBSTRING' => 'MBStrings模块',
  'LBL_UW_COMPLIANCE_MBSTRING_FUNC_OVERLOAD' => 'MBStrings mbstring.func_overload参数',
  'LBL_UW_COMPLIANCE_MEMORY' => 'PHP设置:安全模式',
  'LBL_UW_COMPLIANCE_MSSQL_MAGIC_QUOTES' => 'MS SQL Server和PHP Magic Quotes GPC',
  'LBL_UW_COMPLIANCE_MYSQL' => '最低MySQL版本',
  'LBL_UW_COMPLIANCE_PHP_INI' => 'php.ini位置',
  'LBL_UW_COMPLIANCE_PHP_VERSION' => '最低PHP版本',
  'LBL_UW_COMPLIANCE_SAFEMODE' => 'PHP设置:安全模式',
  'LBL_UW_COMPLIANCE_TITLE' => '服务器设置检查',
  'LBL_UW_COMPLIANCE_TITLE2' => '检查到的设置',
  'LBL_UW_COMPLIANCE_XML' => 'XML解析',
  'LBL_UW_COPIED_FILES_TITLE' => '成功复制文件',
  'LBL_UW_CUSTOM_TABLE_SCHEMA_CHANGE' => '自定义表结构改变',
  'LBL_UW_DB_CHOICE1' => '用升级向导运行SQL',
  'LBL_UW_DB_CHOICE2' => '手动运行SQL语句',
  'LBL_UW_DB_INSERT_FAILED' => '插入失败 - 比较结果的不同',
  'LBL_UW_DB_ISSUES_PERMS' => '数据库权限',
  'LBL_UW_DB_ISSUES' => '数据库问题',
  'LBL_UW_DB_METHOD' => '数据库更新方法',
  'LBL_UW_DB_NO_ADD_COLUMN' => '修改表 [table] 添加列 [column]',
  'LBL_UW_DB_NO_CHANGE_COLUMN' => '修改表 [table] 改变列 [column]',
  'LBL_UW_DB_NO_CREATE' => '创建表 [table]',
  'LBL_UW_DB_NO_DELETE' => '删除窗口 [table]',
  'LBL_UW_DB_NO_DROP_COLUMN' => '删除表 [table] 删除列 [column]',
  'LBL_UW_DB_NO_DROP_TABLE' => '删除表 [table]',
  'LBL_UW_DB_NO_ERRORS' => '所有权限有效',
  'LBL_UW_DB_NO_INSERT' => '插入表 [table]',
  'LBL_UW_DB_NO_SELECT' => '选择 [x] 从 [table]',
  'LBL_UW_DB_NO_UPDATE' => '更新 [table]',
  'LBL_UW_DB_PERMS' => '必要权限',
  'LBL_UW_DESC_MODULES_INSTALLED' => '已安装的更新补丁:',
  'LBL_UW_END_DESC' => '恭喜，您的系统现在已经完成升级。',
  'LBL_UW_END_DESC2' => '如果你选择了手动运行任何步骤，如手动合并文件，手动运行SQL语句，请执行以下步骤。这些步骤完成之前，系统处于不稳定状态。',
  'LBL_UW_END_LOGOUT' => '如果您计划以后升级，请注销当前账户。',
  'LBL_UW_END_LOGOUT2' => '注销',
  'LBL_UW_REPAIR_INDEX' => '要提高数据库性能，请运行<a href="index.php?module=Administration&action=RepairIndex" target="_blank">修复索引</a>',
  'LBL_UW_FILE_DELETED' => ' 已经被删除.<br>',
  'LBL_UW_FILE_GROUP' => '组',
  'LBL_UW_FILE_ISSUES_PERMS' => '文件权限',
  'LBL_UW_FILE_ISSUES' => '文件问题',
  'LBL_UW_FILE_NEEDS_DIFF' => '文件需要手工区分',
  'LBL_UW_FILE_NO_ERRORS' => '<b>所有文件可写</b>',
  'LBL_UW_FILE_OWNER' => '负责人',
  'LBL_UW_FILE_PERMS' => '权限',
  'LBL_UW_FILE_UPLOADED' => '已被上传',
  'LBL_UW_FILE' => '文件名',
  'LBL_UW_FILES_QUEUED' => '下列更新已安装:',
  'LBL_UW_FILES_REMOVED' => '下列文件将被从系统中删除:<br>
',
  'LBL_UW_NEXT_TO_UPLOAD' => '点击下一步上传升级包。',
  'LBL_UW_FROZEN' => '在继续之前，必须完成必要步骤。',
  'LBL_UW_HIDE_DETAILS' => '隐藏细节',
  'LBL_UW_IN_PROGRESS' => '处理中',
  'LBL_UW_INCLUDING' => '包括',
  'LBL_UW_INCOMPLETE' => '未完成',
  'LBL_UW_INSTALL' => '文件安装',
  'LBL_UW_MANUAL_MERGE' => '文件合并',
  'LBL_UW_MODULE_READY_UNINSTALL' => '模块将准备被卸载.  点击 "Commit" 来开始安装.<br>
',
  'LBL_UW_MODULE_READY' => '模块准备被安装.  点击 "Commit" 来开始安装.',
  'LBL_UW_NO_INSTALLED_UPGRADES' => '没有检测到升级记录。',
  'LBL_UW_NONE' => '无',
  'LBL_UW_NOT_AVAILABLE' => '无效',
  'LBL_UW_OVERWRITE_DESC' => '所有改变的文件将被重写, 包括任何客户化编码和您对模板做的改变. 您确定您要开始吗?',
  'LBL_UW_OVERWRITE_FILES_CHOICE1' => '覆盖所有文件',
  'LBL_UW_OVERWRITE_FILES_CHOICE2' => '手动合并 - 保存所有文件',
  'LBL_UW_OVERWRITE_FILES' => '合并方法',
  'LBL_UW_PATCH_READY' => '执行路径已经准备好。点击下面的“提交”按钮完成升级过程。',
  'LBL_UW_PATCH_READY2' => '<h2>注意: 发现自定义布局</h2><br />在下列文件中发现对于Sugar默认布局的修改. 与即将安装的补丁包中的文件冲突.对于 <u>此类文件</u> 您可以:<br><ul><li>[<b>Default</b>] 留空选择框,忽略补丁包中的文件保留您的修改.</li>or<li>勾选选择框, 重新在工作室中应用您的布局.</li></ul>',
  'LBL_UW_PREFLIGHT_ADD_TASK' => '为手工合并新增任务记录?',
  'LBL_UW_PREFLIGHT_COMPLETE' => '准备前检查',
  'LBL_UW_PREFLIGHT_DIFF' => '区别',
  'LBL_UW_PREFLIGHT_EMAIL_REMINDER' => '为手工合并发送电子邮件提醒?',
  'LBL_UW_PREFLIGHT_FILES_DESC' => '下列文件已被修改。没有选中的文件需要手工合并。<i>任何检测到的布局更改都会自动取消选中；选中任何会被覆盖的文件。',
  'LBL_UW_PREFLIGHT_NO_DIFFS' => '不需要手工合并文件。',
  'LBL_UW_PREFLIGHT_NOT_NEEDED' => '不需要。',
  'LBL_UW_PREFLIGHT_PRESERVE_FILES' => '自动保护文件:',
  'LBL_UW_PREFLIGHT_TESTS_PASSED' => '通过所有准备前测试。点击“下一步”来提交这些更改。',
  'LBL_UW_PREFLIGHT_TESTS_PASSED2' => '点击下一步将升级文件复制到系统中。',
  'LBL_UW_PREFLIGHT_TESTS_PASSED3' => '请注意，在升级过程的其余部分是强制性的，点击下一步将要求您完成此过程。如果你不希望继续，单击取消按钮。',
  'LBL_UW_PREFLIGHT_TOGGLE_ALL' => '绑定所有文件',
  'LBL_UW_REBUILD_TITLE' => '重建结果',
  'LBL_UW_SCHEMA_CHANGE' => '结构更改',
  'LBL_UW_SHOW_COMPLIANCE' => '显示检测到的设置',
  'LBL_UW_SHOW_DB_PERMS' => '现实缺少的数据库权限',
  'LBL_UW_SHOW_DETAILS' => '显示细节',
  'LBL_UW_SHOW_DIFFS' => '显示需要手工合并的文件',
  'LBL_UW_SHOW_NW_FILES' => '显示错误权限的文件',
  'LBL_UW_SHOW_SCHEMA' => '显示结构更改脚本',
  'LBL_UW_SHOW_SQL_ERRORS' => '显示错误的查询',
  'LBL_UW_SHOW' => '显示',
  'LBL_UW_SKIPPED_FILES_TITLE' => '忽略的文件',
  'LBL_UW_SKIPPING_FILE_OVERWRITE' => '忽略文件覆盖 – 手工合并选择的。',
  'LBL_UW_SQL_RUN' => '当手工运行SQL时检查',
  'LBL_UW_START_DESC' => '欢迎来到SugarCRM更新向导。这个向导是为管理员更新SugarCRM实例而设计的。请仔细查看说明。',
  'LBL_UW_START_DESC2' => '我们强烈推荐您先在生产环境的副本环境中测试升级步骤。请在升级前备份数据库和所有的系统文件（SugarCRM根目录下的所有文件）。',
  'LBL_UW_START_DESC3' => '单击下一步以执行对你的系统检查，以确保该系统的升级做好准备。该检查包括文件权限，数据库和服务器的权限设置。',
  'LBL_UW_START_UPGRADED_UW_DESC' => '新升级向导会继续更新过程。请继续您的更新。',
  'LBL_UW_START_UPGRADED_UW_TITLE' => '欢迎来到新升级向导',
  'LBL_UW_SYSTEM_CHECK_CHECKING' => '检查中，请稍候。大约耗时30秒。',
  'LBL_UW_SYSTEM_CHECK_FILE_CHECK_START' => '发现所有要检查的相关文件。',
  'LBL_UW_SYSTEM_CHECK_FILES' => '文件',
  'LBL_UW_SYSTEM_CHECK_FOUND' => '发现',
  'LBL_UW_TITLE_CANCEL' => '取消',
  'LBL_UW_TITLE_COMMIT' => '提交升级',
  'LBL_UW_TITLE_END' => '汇报',
  'LBL_UW_TITLE_PREFLIGHT' => '准备前检查',
  'LBL_UW_TITLE_START' => '开始',
  'LBL_UW_TITLE_SYSTEM_CHECK' => '系统检查',
  'LBL_UW_TITLE_UPLOAD' => '上传升级',
  'LBL_UW_TITLE' => '更新向导',
  'LBL_UW_UNINSTALL' => '删除',
  'LBL_UW_ACCEPT_THE_LICENSE' => '接收许可',
  'LBL_UW_CONVERT_THE_LICENSE' => '转换许可',
  'LBL_UW_CUSTOMIZED_OR_UPGRADED_MODULES' => '升级/客户化订制模块',
  'LBL_UW_FOLLOWING_MODULES_CUSTOMIZED' => '下列模块被定义为客户化和防护',
  'LBL_UW_FOLLOWING_MODULES_UPGRADED' => '下列模块被定义为工作室-客户化并已经被升级',
  'LBL_START_UPGRADE_IN_PROGRESS' => '开始在过程中',
  'LBL_SYSTEM_CHECKS_IN_PROGRESS' => '系统检查在过程中',
  'LBL_LICENSE_CHECK_IN_PROGRESS' => '许可检查在过程中',
  'LBL_PREFLIGHT_CHECK_IN_PROGRESS' => '准备前检查在过程中',
  'LBL_PREFLIGHT_FILE_COPYING_PROGRESS' => '正在复制文件',
  'LBL_COMMIT_UPGRADE_IN_PROGRESS' => '升级在过程中',
  'LBL_UW_COMMIT_DESC' => '单击下一步以运行其他升级脚本。',
  'LBL_UPGRADE_SCRIPTS_IN_PROGRESS' => '正在执行升级脚本',
  'LBL_UPGRADE_SUMMARY_IN_PROGRESS' => '升级总和在过程中',
  'LBL_UPGRADE_IN_PROGRESS' => '在过程中     ',
  'LBL_UPGRADE_TIME_ELAPSED' => '过去的时间',
  'LBL_UPGRADE_CANCEL_IN_PROGRESS' => '升级取消和清除在过程中',
  'LBL_UPGRADE_TAKES_TIME_HAVE_PATIENCE' => '升级可能花费一些时间',
  'LBL_UPLOADE_UPGRADE_IN_PROGRESS' => '上载查找在过程中',
  'LBL_UPLOADING_UPGRADE_PACKAGE' => '上载升级文件包... ',
  'LBL_UW_DORP_THE_OLD_SCHMEA' => '您希望SugarCRM删除4.5.1不推荐的表结构吗？',
  'LBL_UW_DROP_SCHEMA_UPGRADE_WIZARD' => '升级向导删除了4.5.1不推荐的表结构。',
  'LBL_UW_DROP_SCHEMA_MANUAL' => '人工删除模块发布升级',
  'LBL_UW_DROP_SCHEMA_METHOD' => '旧模式删除方法',
  'LBL_UW_SHOW_OLD_SCHEMA_TO_DROP' => '显示旧模式以便可以删除',
  'LBL_UW_SKIPPED_QUERIES_ALREADY_EXIST' => '跳过查询语句',
  'LBL_INCOMPATIBLE_PHP_VERSION' => '需要Php5或以上版本.',
  'ERR_CHECKSYS_PHP_INVALID_VER' => '安装了无效的PHP版本:(版本',
  'LBL_BACKWARD_COMPATIBILITY_ON' => 'Php向后兼容模式已打开. 如果想关闭请将zend.ze1_compatibility_mode设置成off.',
  'LBL_ML_ACTION' => '动作',
  'LBL_ML_CANCEL' => '取消',
  'LBL_ML_COMMIT' => '执行',
  'LBL_ML_DESCRIPTION' => '描述',
  'LBL_ML_INSTALLED' => '安装日期',
  'LBL_ML_NAME' => '名称',
  'LBL_ML_PUBLISHED' => '发布日期',
  'LBL_ML_TYPE' => '类型',
  'LBL_ML_UNINSTALLABLE' => '可删除',
  'LBL_ML_VERSION' => '版本',
  'LBL_ML_INSTALL' => '安装',
  'LBL_HOME_PAGE_4_NAME' => '记录',
  'LBL_CURRENT_PHP_VERSION' => '(您当前的PHP版本是 ',
  'LBL_RECOMMENDED_PHP_VERSION' => '. 推荐的版本是 5.2.1 及以上版本)',
  'LBL_MODULE_NAME' => '升级向导',
  'LBL_UPLOAD_SUCCESS' => '升级包成功上传。点击下一步进行最后检查。',
  'LBL_UW_TITLE_LAYOUTS' => '确认布局',
  'LBL_LAYOUT_MODULE_TITLE' => '版面布局',
  'LBL_LAYOUT_MERGE_DESC' => '本次升级包含一些可用的新字段，他们可以自动追加到您已经存在的布局中。更多信息，请参阅相应版本的版本发行说明。

如果您不想追加这些新字段，请您取消选中下面的模块，您相应的自定义布局将不会被改变。升级后，这些字段仍然可以在工作室中使用。',
  'LBL_LAYOUT_MERGE_TITLE' => '点击下一步确认的变化，以完成升级。',
  'LBL_LAYOUT_MERGE_TITLE2' => '单击下一步以完成升级。
',
  'LBL_UW_CONFIRM_LAYOUTS' => '确认布局',
  'LBL_UW_CONFIRM_LAYOUT_RESULTS' => '布局结果确认',
  'LBL_UW_CONFIRM_LAYOUT_RESULTS_DESC' => '以下布局合并成功：',
  'LBL_SELECT_FILE' => '选择文件',
  'ERR_UW_PHP_FILE_ERRORS' => 
  array (
    1 => '上传文件大小超出了php.ini文件中变量upload_max_filesize指定的值。',
    2 => '上传文件大小超出了HTML表单中变量MAX_FILE_SIZE指定的值。',
    3 => '只上传了部分文件。',
    4 => '没有上传文件。',
    5 => '未知错误。',
    6 => '缺少临时文件夹。',
    7 => '写入磁盘文件错误。',
    8 => '由于扩展，文件未能上传。',
  ),
);

