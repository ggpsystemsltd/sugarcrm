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




if( !isset( $install_script ) || !$install_script ){
    die($mod_strings['ERR_NO_DIRECT_SCRIPT']);
}

if( is_file("config.php") ){
	
    

	if(!empty($sugar_config['default_theme']))
      $_SESSION['site_default_theme'] = $sugar_config['default_theme'];

	if(!empty($sugar_config['disable_persistent_connections']))
		$_SESSION['disable_persistent_connections'] =
		$sugar_config['disable_persistent_connections'];
	if(!empty($sugar_config['default_language']))
		$_SESSION['default_language'] = $sugar_config['default_language'];
	if(!empty($sugar_config['translation_string_prefix']))
		$_SESSION['translation_string_prefix'] = $sugar_config['translation_string_prefix'];
	if(!empty($sugar_config['default_charset']))
		$_SESSION['default_charset'] = $sugar_config['default_charset'];

	if(!empty($sugar_config['default_currency_name']))
		$_SESSION['default_currency_name'] = $sugar_config['default_currency_name'];
	if(!empty($sugar_config['default_currency_symbol']))
		$_SESSION['default_currency_symbol'] = $sugar_config['default_currency_symbol'];
	if(!empty($sugar_config['default_currency_iso4217']))
		$_SESSION['default_currency_iso4217'] = $sugar_config['default_currency_iso4217'];

	if(!empty($sugar_config['rss_cache_time']))
		$_SESSION['rss_cache_time'] = $sugar_config['rss_cache_time'];
	if(!empty($sugar_config['languages']))
	{
		// We need to encode the languages in a way that can be retrieved later.
		$language_keys = Array();
		$language_values = Array();

		foreach($sugar_config['languages'] as $key=>$value)
		{
			$language_keys[] = $key;
			$language_values[] = $value;
		}

		$_SESSION['language_keys'] = urlencode(implode(",",$language_keys));
		$_SESSION['language_values'] = urlencode(implode(",",$language_values));
	}
}

////	errors
$errors = '';
if( isset($validation_errors) ){
    if( count($validation_errors) > 0 ){
        $errors  = '<div id="errorMsgs">';
        $errors .= '<p>'.$mod_strings['LBL_SITECFG_FIX_ERRORS'].'</p><ul>';
        foreach( $validation_errors as $error ){
			$errors .= '<li>' . $error . '</li>';
        }
		$errors .= '</ul></div>';
    }
}


////	ternaries
$sugarUpdates = (isset($_SESSION['setup_site_sugarbeet']) && !empty($_SESSION['setup_site_sugarbeet'])) ? 'checked="checked"' : '';
$siteSecurity = (isset($_SESSION['setup_site_defaults']) && !empty($_SESSION['setup_site_defaults'])) ? 'checked="checked"' : '';
$customSession = (isset($_SESSION['setup_site_custom_session_path']) && !empty($_SESSION['setup_site_custom_session_path'])) ? 'checked="checked"' : '';
$customLog = (isset($_SESSION['setup_site_custom_log_dir']) && !empty($_SESSION['setup_site_custom_log_dir'])) ? 'checked="checked"' : '';
$customId = (isset($_SESSION['setup_site_specify_guid']) && !empty($_SESSION['setup_site_specify_guid'])) ? 'checked="checked"' : '';

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
   <title>{$mod_strings['LBL_WIZARD_TITLE']} {$mod_strings['LBL_SITECFG_SECURITY_TITLE']}</title>
   <link REL="SHORTCUT ICON" HREF="include/images/sugar_icon.ico">
   <link rel="stylesheet" href="install/install.css" type="text/css" />
   <script type="text/javascript" src="install/installCommon.js"></script>
   <script type="text/javascript" src="install/siteConfig.js"></script>
</head>
<body onload="javascript:toggleGUID();toggleSession();toggleLogDir();document.getElementById('button_next2').focus();">
<form action="install.php" method="post" name="setConfig" id="form">
<input type="hidden" name="current_step" value="{$next_step}">
<table cellspacing="0" cellpadding="0" border="0" align="center" class="shell">
      <tr><td colspan="2" id="help"><a href="{$help_url}" target='_blank'>{$mod_strings['LBL_HELP']} </a></td></tr>
    <tr>
      <th width="500">
		<p>
		<img src="{$sugar_md}" alt="SugarCRM" border="0">
		</p>
   {$mod_strings['LBL_SITECFG_SECURITY_TITLE']}</th>
   <th width="200" style="text-align: right;"><a href="http://www.sugarcrm.com" target="_blank"><IMG src="include/images/sugarcrm_login.png" width="145" height="30" alt="SugarCRM" border="0"></a></th>
   </tr>
<tr>
    <td colspan="2">
    {$errors}
   <div class="required">{$mod_strings['LBL_REQUIRED']}</div>
   <table width="100%" cellpadding="0" cellpadding="0" border="0" class="StyleDottedHr">
   <tr><th colspan="3" align="left">{$mod_strings['LBL_SITECFG_SITE_SECURITY']}</td></tr>

EOQ;
$out .= '<!--';
$checked = '';
if(!empty($_SESSION['setup_site_sugarbeet_anonymous_stats'])) $checked = 'checked="checked"'; 
$out .= "
   <tr><td></td>       
       <td><input type='checkbox' class='checkbox' name='setup_site_sugarbeet_anonymous_stats' value='yes' $checked /></td>
       <td><b>{$mod_strings['LBL_SITECFG_ANONSTATS']}</b><br><i>{$mod_strings['LBL_SITECFG_ANONSTATS_DIRECTIONS']}</i></td></tr>
       
";
$out .= '-->';
$out .= "<tr><td><input type='checkbox' style='display:none' name='setup_site_sugarbeet_anonymous_stats' value='yes' checked='checked' /></td></tr>";
$checked = '';
if(!empty($_SESSION['setup_site_sugarbeet_automatic_checks'])) $checked = 'checked="checked"'; 
$out .= <<<EOQ
   <tr><td></td>       
       <td><input type="checkbox" class="checkbox" name="setup_site_sugarbeet_automatic_checks" value="yes" checked="checked" /></td>
       <td><b>{$mod_strings['LBL_SITECFG_SUGAR_UP']}</b><br><i>{$mod_strings['LBL_SITECFG_SUGAR_UP_DIRECTIONS']}</i><br>&nbsp;</td></tr>
   <tbody id="setup_site_session_section_pre">
   <tr><td></td>       
       <td><input type="checkbox" class="checkbox" name="setup_site_custom_session_path" value="yes" onclick="javascript:toggleSession();" {$customSession} /></td>
       <td><b>{$mod_strings['LBL_SITECFG_CUSTOM_SESSION']}</b><br>
            <em>{$mod_strings['LBL_SITECFG_CUSTOM_SESSION_DIRECTIONS']}</em><br>&nbsp;</td>
   </tr>
   </tbody>
   <tbody id="setup_site_session_section">
   <tr><td></td>
       <td style="text-align : right;"><span class="required">*</span></td>
       <td align="left">
	       <div><div style="width:200px;float:left"><b>{$mod_strings['LBL_SITECFG_SESSION_PATH']}</b></div>
	               <input type="text" name="setup_site_session_path" size='40' value="{$_SESSION['setup_site_session_path']}" /></td>
	       </div>       
       </td>
   </tr>
   </tbody>
   <tbody id="setup_site_log_dir_pre">
   <tr><td></td>       
       <td><input type="checkbox" class="checkbox" name="setup_site_custom_log_dir" value="yes" onclick="javascript:toggleLogDir();" {$customLog} /></td>
       <td><b>{$mod_strings['LBL_SITECFG_CUSTOM_LOG']}</b><br>
            <em>{$mod_strings['LBL_SITECFG_CUSTOM_LOG_DIRECTIONS']}</em><br>&nbsp;</td>
   </tr>
   </tbody>
   <tbody id="setup_site_log_dir">
   <tr><td></td>       
       <td style="text-align : right;" ><span class="required">*</span></td>
       <td align="left">
       <div><div style="width:200px;float:left"><b>{$mod_strings['LBL_SITECFG_LOG_DIR']}</b></div>
            <input type="text" name="setup_site_log_dir" size='30' value="{$_SESSION['setup_site_log_dir']}" />
       </div>
   </tr>
   </tbody>
   <tbody id="setup_site_guid_section_pre">
   <tr><td></td>       
       <td><input type="checkbox" class="checkbox" name="setup_site_specify_guid" value="yes" onclick="javascript:toggleGUID();" {$customId} /></td>
       <td><b>{$mod_strings['LBL_SITECFG_CUSTOM_ID']}</b><br>
            <em>{$mod_strings['LBL_SITECFG_CUSTOM_ID_DIRECTIONS']}</em><br>&nbsp;</td>  
   </tr>
   </tbody>
   <tbody id="setup_site_guid_section">
   <tr><td></td>
       <td style="text-align : right;"><span class="required">*</span></td>
       <td align="left">
	       <div><div style="width:200px;float:left"><b>{$mod_strings['LBL_SITECFG_APP_ID']}</b></div>
	               <input type="text" name="setup_site_guid" size='30' value="{$_SESSION['setup_site_guid']}" />
	       </div>      
       </td>       
   </tr>
   </tbody>
</table>
</td>
</tr>
<tr>
   <td align="right" colspan="2">
   <hr>
   <table cellspacing="0" cellpadding="0" border="0" class="stdTable">
   <tr>
    <td>
        <input class="button" type="button" name="goto" value="{$mod_strings['LBL_BACK']}" id="button_back_siteConfig_b" onclick="document.getElementById('form').submit();" />
        <input type="hidden" name="goto" value="{$mod_strings['LBL_BACK']}" />
    </td>
   <td><input class="button" type="submit" id="button_next2" name="goto" value="{$mod_strings['LBL_NEXT']}" /></td>
   </tr>
   </table>
</td>
</tr>
</table>
</form>
<br>
</body>
</html>

EOQ;

echo $out;
?>
