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



global $sugar_config,$db;

if( !isset( $install_script ) || !$install_script ){
    die($mod_strings['ERR_NO_DIRECT_SCRIPT']);
}

$db = getDbConnection();

if(isset($_SESSION['licenseKey_submitted']) && ($_SESSION['licenseKey_submitted']) && isset($_SESSION['setup_db_type'])){

                if (isset($GLOBALS['license']) && isset($GLOBALS['license']->settings)){

                    if(isset($GLOBALS['license']->settings['license_users'])){
                        $_SESSION['setup_license_key_users'] = $GLOBALS['license']->settings['license_users'] ;
                    }
                    if(isset($GLOBALS['license']->settings['license_expire_date'])){
                        $_SESSION['setup_license_key_expire_date'] = $GLOBALS['license']->settings['license_expire_date'] ;
                    }
                    if(isset($GLOBALS['license']->settings['license_num_lic_oc'])){
                        $_SESSION['setup_num_lic_oc'] = $GLOBALS['license']->settings['license_num_lic_oc'] ;
                    }

                }
}

$dbCreate = "({$mod_strings['LBL_CONFIRM_WILL']} ";
if(!$_SESSION['setup_db_create_database']){
	$dbCreate .= $mod_strings['LBL_CONFIRM_NOT'];
}
$dbCreate .= " {$mod_strings['LBL_CONFIRM_BE_CREATED']})";

$dbUser = "{$_SESSION['setup_db_sugarsales_user']} ({$mod_strings['LBL_CONFIRM_WILL']} ";
if( $_SESSION['setup_db_create_sugarsales_user'] != 1 ){
	$dbUser .= $mod_strings['LBL_CONFIRM_NOT'];
}
$dbUser .= " {$mod_strings['LBL_CONFIRM_BE_CREATED']})";
$yesNoDropCreate = $mod_strings['LBL_NO'];
if ($_SESSION['setup_db_drop_tables']===true ||$_SESSION['setup_db_drop_tables'] == 'true'){
    $yesNoDropCreate = $mod_strings['LBL_YES'];
}
$yesNoSugarUpdates = ($_SESSION['setup_site_sugarbeet']) ? $mod_strings['LBL_YES'] : $mod_strings['LBL_NO'];
$yesNoCustomSession = ($_SESSION['setup_site_custom_session_path']) ? $mod_strings['LBL_YES'] : $mod_strings['LBL_NO'];
$yesNoCustomLog = ($_SESSION['setup_site_custom_log_dir']) ? $mod_strings['LBL_YES'] : $mod_strings['LBL_NO'];
$yesNoCustomId = ($_SESSION['setup_site_specify_guid']) ? $mod_strings['LBL_YES'] : $mod_strings['LBL_NO'];
$demoData = ($_SESSION['demoData'] == 'en_us') ? ($mod_strings['LBL_YES']) : ($_SESSION['demoData']);
// Populate the default date format, time format, and language for the system
$defaultDateFormat = "";
$defaultTimeFormat = "";
$defaultLanguages = "";

	$sugar_config_defaults = get_sugar_config_defaults();
	if(isset($_REQUEST['default_language'])){
		$defaultLanguages = $sugar_config_defaults['languages'][$_REQUEST['default_language']];
	}

///////////////////////////////////////////////////////////////////////////////
////	START OUTPUT
$langHeader = get_language_header();

$out =<<<EOQ
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html {$langHeader}>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta http-equiv="Content-Script-Type" content="text/javascript">
   <meta http-equiv="Content-Style-Type" content="text/css">
   <title>{$mod_strings['LBL_WIZARD_TITLE']} {$mod_strings['LBL_CONFIRM_TITLE']}</title>
   <link REL="SHORTCUT ICON" HREF="$icon">
   <link rel="stylesheet" href="$css" type="text/css" />
</head>
<body onload="javascript:document.getElementById('button_next2').focus();">
<form action="install.php" method="post" name="setConfig" id="form">
<input type="hidden" name="current_step" value="{$next_step}">
<table cellspacing="0" cellpadding="0" border="0" align="center" class="shell">
      <tr><td colspan="2" id="help"><a href="{$help_url}" target='_blank'>{$mod_strings['LBL_HELP']} </a></td></tr>
    <tr>
      <th width="500">
		<p>
		<img src="{$sugar_md}" alt="SugarCRM" border="0">
		</p>
		{$mod_strings['LBL_CONFIRM_TITLE']}</th>
        <th width="200" style="text-align: right;"><a href="http://www.sugarcrm.com" target="_blank"><IMG src="$loginImage" width="145" height="30" alt="SugarCRM" border="0"></a>
        </th>
    </tr>
    <tr>
        <td colspan="2">

        <table width="100%" cellpadding="0" cellpadding="0" border="0" class="StyleDottedHr">
            <tr><th colspan="3" align="left">{$mod_strings['LBL_DBCONF_TITLE']}</th></tr>
            <tr><td></td><td><b>{$mod_strings['LBL_CONFIRM_DB_TYPE']}</b></td><td>{$_SESSION['setup_db_type']}</td></tr>
            <tr><td></td><td><b>{$mod_strings['LBL_DBCONF_HOST_NAME']}</b></td><td>{$_SESSION['setup_db_host_name']}</td></tr>
            <tr>
                <td></td>
                <td><b>{$mod_strings['LBL_DBCONF_DB_NAME']}</b></td>
                <td>
					{$_SESSION['setup_db_database_name']} {$dbCreate}
                </td>
            </tr>
EOQ;

$out .=<<<EOQ
            <tr>
                <td></td>
                <td><b>{$mod_strings['LBL_DBCONF_DB_ADMIN_USER']}</b></td>
                <td>{$_SESSION['setup_db_admin_user_name']}</td>
            </tr>
            <tr>
                <td></td>
                <td><b>{$mod_strings['LBL_DBCONF_DEMO_DATA']}</b></td>
                <td>{$demoData}</td>
            </tr>
EOQ;
if($yesNoDropCreate){

$out .=<<<EOQ
            <tr>
                <td></td>
                <td><b>{$mod_strings['LBL_DBCONF_DB_DROP']}</b></td>
                <td>{$yesNoDropCreate}</td>
            </tr>
EOQ;

}

if ($db->supports('fulltext')) {
    if($db->full_text_indexing_installed()){
        $FTSData = $mod_strings['LBL_FTS_INSTALLED'];
    }else{
        $FTSData = "<span class='stop'><b>{$mod_strings['LBL_FTS_INSTALLED_ERR1']}</b>  <br>{$mod_strings['LBL_FTS_INSTALLED_ERR2']}</span>";
    }
$out .=<<<EOQ
            <tr>
                <td></td>
                <td><b>{$mod_strings['LBL_FTS']} </b></td>
                <td>{$FTSData}</td>
            </tr>
EOQ;
}

if(isset($_SESSION['install_type'])  && !empty($_SESSION['install_type'])  && $_SESSION['install_type']=='custom'){
$out .=<<<EOQ

	   <tr><td colspan="3" align="left"></td></tr>
            <tr>
            	<th colspan="3" align="left">{$mod_strings['LBL_SITECFG_TITLE']}</th>
            </tr>
            <tr>
                <td></td>
                <td><b>{$mod_strings['LBL_SITECFG_URL']}</b></td>
                <td>{$_SESSION['setup_site_url']}</td>
            </tr>
            <tr>
	   <tr><td colspan="3" align="left"></td></tr>
            	<th colspan="3" align="left">{$mod_strings['LBL_SITECFG_SUGAR_UPDATES']}</th>
            </tr>
            <tr>
                <td></td>
                <td><b>{$mod_strings['LBL_SITECFG_SUGAR_UP']}</b></td>
                <td>{$yesNoSugarUpdates}</td>
            </tr>
            <tr>
	   <tr><td colspan="3" align="left"></td></tr>
            	<th colspan="3" align="left">{$mod_strings['LBL_SITECFG_SITE_SECURITY']}</th>
            </tr>
            <tr>
                <td></td>
                <td><b>{$mod_strings['LBL_SITECFG_CUSTOM_SESSION']}?</b></td>
                <td>{$yesNoCustomSession}</td>
            </tr>
            <tr>
                <td></td>
                <td><b>{$mod_strings['LBL_SITECFG_CUSTOM_LOG']}?</b></td>
                <td>{$yesNoCustomLog}</td>
            </tr>
            <tr>
                <td></td>
                <td><b>{$mod_strings['LBL_SITECFG_CUSTOM_ID']}?</b></td>
                <td>{$yesNoCustomId}</td>
            </tr>
EOQ;
}

$out .=<<<EOQ

	   <tr><td colspan="3" align="left"></td></tr>
          <tr><th colspan="3" align="left">{$mod_strings['LBL_SYSTEM_CREDS']}</th></tr>
            <tr>
                <td></td>
                <td><b>{$mod_strings['LBL_DBCONF_DB_USER']}</b></td>
                <td>
                    {$_SESSION['setup_db_sugarsales_user']}
                </td>
            </tr>
            <tr>
                <td></td>
                <td><b>{$mod_strings['LBL_DBCONF_DB_PASSWORD']}</b></td>
                <td>
                    <span id='hide_db_admin_pass'>{$mod_strings['LBL_HIDDEN']}</span>
                    <span style='display:none' id='show_db_admin_pass'>{$_SESSION['setup_db_sugarsales_password']}</span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><b>{$mod_strings['LBL_SITECFG_ADMIN_Name']}</b></td>
                <td>
                    Admin
                </td>
            </tr>
            <tr>
                <td></td>
                <td><b>{$mod_strings['LBL_SITECFG_ADMIN_PASS']}</b></td>
                <td>
                    <span id='hide_site_admin_pass'>{$mod_strings['LBL_HIDDEN']}</span>
                    <span style='display:none' id='show_site_admin_pass'>{$_SESSION['setup_site_admin_password']}</span>
                </td>
            </tr>

EOQ;






$envString = '
	   <tr><td colspan="3" align="left"></td></tr><tr><th colspan="3" align="left">'.$mod_strings['LBL_SYSTEM_ENV'].'</th></tr>';

    // PHP VERSION
        $envString .='
          <tr>
             <td></td>
            <td><b>'.$mod_strings['LBL_CHECKSYS_PHPVER'].'</b></td>
            <td >'.constant('PHP_VERSION').'</td>
          </tr>';


//Begin List of already known good variables.  These were checked during the initial sys check
// XML Parsing
        $envString .='
      <tr>
        <td></td>
        <td><strong>'.$mod_strings['LBL_CHECKSYS_XML'].'</strong></td>
        <td  >'.$mod_strings['LBL_CHECKSYS_OK'].'</td>
      </tr>';



// mbstrings

        $envString .='
      <tr>
        <td></td>
        <td><strong>'.$mod_strings['LBL_CHECKSYS_MBSTRING'].'</strong></td>
        <td  >'.$mod_strings['LBL_CHECKSYS_OK'].'</td>
      </tr>';

// config.php
        $envString .='
      <tr>
        <td></td>
        <td><strong>'.$mod_strings['LBL_CHECKSYS_CONFIG'].'</strong></td>
        <td  >'.$mod_strings['LBL_CHECKSYS_OK'].'</td>
      </tr>';

// custom dir


        $envString .='
      <tr>
        <td></td>
        <td><strong>'.$mod_strings['LBL_CHECKSYS_CUSTOM'].'</strong></td>
        <td  >'.$mod_strings['LBL_CHECKSYS_OK'].'</td>
      </tr>';


// modules dir
        $envString .='
      <tr>
        <td></td>
        <td><strong>'.$mod_strings['LBL_CHECKSYS_MODULE'].'</strong></td>
        <td  >'.$mod_strings['LBL_CHECKSYS_OK'].'</td>
      </tr>';

// upload dir
        $envString .='
      <tr>
        <td></td>
        <td><strong>'.$mod_strings['LBL_CHECKSYS_UPLOAD'].'</strong></td>
        <td>'.$mod_strings['LBL_CHECKSYS_OK'].'</td>
      </tr>';

// data dir

        $envString .='
      <tr>
        <td></td>
        <td><strong>'.$mod_strings['LBL_CHECKSYS_DATA'].'</strong></td>
        <td  >'.$mod_strings['LBL_CHECKSYS_OK'].'</td>
      </tr>';

// cache dir
    $error_found = true;
        $envString .='
      <tr>
        <td></td>
        <td><strong>'.$mod_strings['LBL_CHECKSYS_CACHE'].'</strong></td>
        <td  >'.$mod_strings['LBL_CHECKSYS_OK'].'</td>
      </tr>';
// End already known to be good

// memory limit
$memory_msg     = "";
// CL - fix for 9183 (if memory_limit is enabled we will honor it and check it; otherwise use unlimited)
$memory_limit = ini_get('memory_limit');
if(empty($memory_limit)){
    $memory_limit = "-1";
}
if(!defined('SUGARCRM_MIN_MEM')) {
    define('SUGARCRM_MIN_MEM', 40);
}
$sugarMinMem = constant('SUGARCRM_MIN_MEM');
// logic based on: http://us2.php.net/manual/en/ini.core.php#ini.memory-limit
if( $memory_limit == "" ){          // memory_limit disabled at compile time, no memory limit
    $memory_msg = "<b>{$mod_strings['LBL_CHECKSYS_MEM_OK']}</b>";
} elseif( $memory_limit == "-1" ){   // memory_limit enabled, but set to unlimited
    $memory_msg = "{$mod_strings['LBL_CHECKSYS_MEM_UNLIMITED']}";
} else {
    $mem_display = $memory_limit;
    rtrim($memory_limit, 'M');
    $memory_limit_int = (int) $memory_limit;
    $SUGARCRM_MIN_MEM = (int) constant('SUGARCRM_MIN_MEM');
    if( $memory_limit_int < constant('SUGARCRM_MIN_MEM') ){
        $memory_msg = "<span class='stop'><b>$memory_limit{$mod_strings['ERR_CHECKSYS_MEM_LIMIT_1']}" . constant('SUGARCRM_MIN_MEM') . "{$mod_strings['ERR_CHECKSYS_MEM_LIMIT_2']}</b></span>";
        $memory_msg = str_replace('$memory_limit', $mem_display, $memory_msg);
    } else {
        $memory_msg = "{$mod_strings['LBL_CHECKSYS_OK']} ({$memory_limit})";
    }
}

          $envString .='
      <tr>
        <td></td>
        <td><strong>'.$mod_strings['LBL_CHECKSYS_MEM'].'</strong></td>
        <td  >'.$memory_msg.'</td>
      </tr>';

    // zlib
    if(function_exists('gzclose')) {
        $zlibStatus = "{$mod_strings['LBL_CHECKSYS_OK']}";
    } else {
        $zlibStatus = "<span class='stop'><b>{$mod_strings['ERR_CHECKSYS_ZLIB']}</b></span>";
    }
            $envString .='
          <tr>
            <td></td>
            <td><strong>'.$mod_strings['LBL_CHECKSYS_ZLIB'].'</strong></td>
            <td  >'.$zlibStatus.'</td>
          </tr>';

    // zip
    if(class_exists("ZipArchive")) {
        $zipStatus = "{$mod_strings['LBL_CHECKSYS_OK']}";
    } else {
        $zipStatus = "<span class='stop'><b>{$mod_strings['ERR_CHECKSYS_ZIP']}</b></span>";
    }
            $envString .='
          <tr>
            <td></td>
            <td><strong>'.$mod_strings['LBL_CHECKSYS_ZIP'].'</strong></td>
            <td  >'.$zipStatus.'</td>
          </tr>';



    // imap
    if(function_exists('imap_open')) {
        $imapStatus = "{$mod_strings['LBL_CHECKSYS_OK']}";
    } else {
        $imapStatus = "<span class='stop'><b>{$mod_strings['ERR_CHECKSYS_IMAP']}</b></span>";
    }

            $envString .='
          <tr>
            <td></td>
            <td><strong>'.$mod_strings['LBL_CHECKSYS_IMAP'].'</strong></td>
            <td  >'.$imapStatus.'</td>
          </tr>';


    // cURL
    if(function_exists('curl_init')) {
        $curlStatus = "{$mod_strings['LBL_CHECKSYS_OK']}";
    } else {
        $curlStatus = "<span class='stop'><b>{$mod_strings['ERR_CHECKSYS_CURL']}</b></span>";
    }

            $envString .='
          <tr>
            <td></td>
            <td><strong>'.$mod_strings['LBL_CHECKSYS_CURL'].'</strong></td>
            <td  >'.$curlStatus.'</td>
          </tr>';


      //CHECK UPLOAD FILE SIZE
        $upload_max_filesize = ini_get('upload_max_filesize');
        $upload_max_filesize_bytes = return_bytes($upload_max_filesize);
        if(!defined('SUGARCRM_MIN_UPLOAD_MAX_FILESIZE_BYTES')){
            define('SUGARCRM_MIN_UPLOAD_MAX_FILESIZE_BYTES', 6 * 1024 * 1024);
        }

        if($upload_max_filesize_bytes > constant('SUGARCRM_MIN_UPLOAD_MAX_FILESIZE_BYTES')) {
            $fileMaxStatus = "{$mod_strings['LBL_CHECKSYS_OK']}</font>";
        } else {
            $fileMaxStatus = "<span class='stop'><b>{$mod_strings['ERR_UPLOAD_MAX_FILESIZE']}</font></b></span>";
        }

            $envString .='
          <tr>
            <td></td>
            <td><strong>'.$mod_strings['LBL_UPLOAD_MAX_FILESIZE_TITLE'].'</strong></td>
            <td  >'.$fileMaxStatus.'</td>
          </tr>';

      //CHECK Sprite support
        if(function_exists('imagecreatetruecolor'))
        {
            $spriteSupportStatus = "{$mod_strings['LBL_CHECKSYS_OK']}</font>";
        }else{
            $spriteSupportStatus = "<span class='stop'><b>{$mod_strings['ERROR_SPRITE_SUPPORT']}</b></span>";
        }
            $envString .='
          <tr>
            <td></td>
            <td><strong>'.$mod_strings['LBL_SPRITE_SUPPORT'].'</strong></td>
            <td  >'.$spriteSupportStatus.'</td>
          </tr>';



// PHP.ini
$phpIniLocation = get_cfg_var("cfg_file_path");
          $envString .='
      <tr>
        <td></td>
        <td><strong>'.$mod_strings['LBL_CHECKSYS_PHP_INI'].'</strong></td>
        <td  >'.$phpIniLocation.'</td>
      </tr>';

$out .= $envString;

$out .=<<<EOQ

        </table>
        </td>
    </tr>
    <tr>
        <td align="right" colspan="2">
        <table cellspacing="0" cellpadding="0" border="0" class="stdTable">
        <tr><th align="left" colspan="2">&nbsp;</th></tr>
EOQ;

// CRON Settings
if ( !isset($sugar_config['default_language']) )
    $sugar_config['default_language'] = $_SESSION['default_language'];
if ( !isset($sugar_config['cache_dir']) )
    $sugar_config['cache_dir'] = $sugar_config_defaults['cache_dir'];
if ( !isset($sugar_config['site_url']) )
    $sugar_config['site_url'] = $_SESSION['setup_site_url'];
if ( !isset($sugar_config['translation_string_prefix']) )
    $sugar_config['translation_string_prefix'] = $sugar_config_defaults['translation_string_prefix'];
$mod_strings_scheduler = return_module_language($GLOBALS['current_language'], 'Schedulers');
$error = '';

if (!isset($_SERVER['Path'])) {
    $_SERVER['Path'] = getenv('Path');
}
if(is_windows()) {
if(isset($_SERVER['Path']) && !empty($_SERVER['Path'])) { // IIS IUSR_xxx may not have access to Path or it is not set
    if(!strpos($_SERVER['Path'], 'php')) {
//        $error = '<em>'.$mod_strings_scheduler['LBL_NO_PHP_CLI'].'</em>';
    }
}
$cronString = '
			<tr>
			    <td align="left" colspan="2">
			    <font color="red">
						'.$mod_strings_scheduler['LBL_CRON_WINDOWS_DESC'].'<br>
				</font>
						cd '.realpath('./').'<br>
						php.exe -f cron.php
						<br>'.$error.'
				</td>
			</tr>
';
} else {
if(isset($_SERVER['Path']) && !empty($_SERVER['Path'])) { // some Linux servers do not make this available
    if(!strpos($_SERVER['PATH'], 'php')) {
//        $error = '<em>'.$mod_strings_scheduler['LBL_NO_PHP_CLI'].'</em>';
    }
}
$cronString = '
			<tr>
			    <td align="left" colspan="2">
			    <font color="red">
						'.$mod_strings_scheduler['LBL_CRON_INSTRUCTIONS_LINUX'].'
				</font>
						'.$mod_strings_scheduler['LBL_CRON_LINUX_DESC'].'<br>
						*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;
						cd '.realpath('./').'; php -f cron.php > /dev/null 2>&1
						<br>'.$error.'
				</td>
			</tr>
';
}

$out .= $cronString;

$out .=<<<EOQ
        </table>
        </td>
    </tr>
    <tr>
        <td colspan='3' align='right'>
                <input type="button" class="button" name="print_summary" id="button_print_summary_settings" value="{$mod_strings['LBL_PRINT_SUMM']}"
                onClick='window.print()' onCluck='window.open("install.php?current_step="+(document.setConfig.current_step.value -1)+"&goto={$mod_strings["LBL_NEXT"]}&print=true");' />&nbsp;
      	</td>
    </tr>
    <tr>
        <td align="right" colspan="2">
        <hr>
        <table cellspacing="0" cellpadding="0" border="0" class="stdTable">
            <tr>
              <td align=right>
                    <input type="button" class="button" id="show_pass_button" value="{$mod_strings['LBL_SHOW_PASS']}"
                    onClick='togglePass();' />
              </td>
                <td>
                	<input type="hidden" name="goto" id="goto">
                    <input class="button" type="button" value="{$mod_strings['LBL_BACK']}" id="button_back_settings" onclick="document.getElementById('goto').value='{$mod_strings['LBL_BACK']}';document.getElementById('form').submit();" />
                </td>
                <td>
                	<input class="button" type="button" value="{$mod_strings['LBL_LANG_BUTTON_COMMIT']}" onclick="document.getElementById('goto').value='{$mod_strings['LBL_NEXT']}';document.getElementById('form').submit();" id="button_next2"/>
                </td>
            </tr>
        </table>
        </td>
    </tr>
</table>
</form>
<br>
<script>
function togglePass(){
    if(document.getElementById('show_site_admin_pass').style.display == ''){
        document.getElementById('show_pass_button').value = "{$mod_strings['LBL_SHOW_PASS']}";
        document.getElementById('hide_site_admin_pass').style.display = '';
        document.getElementById('hide_db_admin_pass').style.display = '';
        document.getElementById('show_site_admin_pass').style.display = 'none';
        document.getElementById('show_db_admin_pass').style.display = 'none';

    }else{
        document.getElementById('show_pass_button').value = "{$mod_strings['LBL_HIDE_PASS']}";
        document.getElementById('show_site_admin_pass').style.display = '';
        document.getElementById('show_db_admin_pass').style.display = '';
        document.getElementById('hide_site_admin_pass').style.display = 'none';
        document.getElementById('hide_db_admin_pass').style.display = 'none';

    }
}
</script>
</body>
</html>


EOQ;
echo $out;

?>
