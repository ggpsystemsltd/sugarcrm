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
// $mod_strings come from calling page.

$langDropDown = get_select_options_with_id($supportedLanguages, $current_language);



if( !isset($_SESSION['licenseKey_submitted']) || !$_SESSION['licenseKey_submitted'] ) {
    $_SESSION['setup_license_key_users']        = 0;
    $_SESSION['setup_license_key_expire_date']  = "";
    $_SESSION['setup_license_key']              = "";
    $_SESSION['setup_num_lic_oc']              = 0;

} else {

}

//php 521 suggestion
$php_521 = '';
if(version_compare(phpversion(),'5.2.0') < 0){
	$php_521=$mod_strings['LBL_YOUR_PHP_VERSION'].phpversion().$mod_strings['LBL_RECOMMENDED_PHP_VERSION'];
}

///////////////////////////////////////////////////////////////////////////////
////    START OUTPUT

$langHeader = get_language_header();
$out = <<<EOQ
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html {$langHeader}>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta http-equiv="Content-Style-Type" content="text/css">
   <title>{$mod_strings['LBL_WIZARD_TITLE']} {$mod_strings['LBL_INSTALL_TYPE_TITLE']}</title>
   <link REL="SHORTCUT ICON" HREF="$icon">
   <link rel="stylesheet" href="$css" type="text/css">
</head>

<body onload="javascript:document.getElementById('button_next').focus();">
    <form action="install.php" method="post" name="form" id="form">
  <table cellspacing="0" cellpadding="0" border="0" align="center" class="shell">
      <tr><td colspan="2" id="help"><a href="{$help_url}" target='_blank'>{$mod_strings['LBL_HELP']} </a></td></tr>
    <tr>
      <th width="500">
		<p>
		<img src="{$sugar_md}" alt="SugarCRM" border="0">
		</p>
		{$mod_strings['LBL_INSTALL_TYPE_TITLE']}</th>

    <th width="200" height="30" style="text-align: right;"><a href="http://www.sugarcrm.com" target=
  "_blank"><IMG src="$loginImage" width="145" height="30" alt="SugarCRM" border="0"></a>
        </th>
    </tr>

    <tr><td colspan="2">
        <table width="100%" class="StyleDottedHr">
EOQ;



$out .= <<<EOQ1
<tr><th colspan='2' align="left">{$mod_strings['LBL_LICENSE_DOWNLOAD_KEY']}</th></tr>
        <tr><td colspan='2' align="left"><p>{$mod_strings['LBL_INSTALL_TYPE_MSG1']}</p>
	 <p><input type="text" name="setup_license_key"
            value="{$_SESSION['setup_license_key']}" size="30" /></p></td></tr>

EOQ1;



$typical_checked ='checked';
$custom_checked ='';
if(isset($_SESSION['install_type']) && $_SESSION['install_type']=='custom'){
    $typical_checked ='';
    $custom_checked ='checked';

}else{
//do nothing because defaults handle this condition
}


$out .= <<<EOQ2
<tr><th colspan='2' align="left">{$mod_strings['LBL_INSTALL_TYPE_SUBTITLE']}</th></tr>
        <tr><td width='200'>
          <input name="install_type" type="radio" value="Typical" {$typical_checked}>{$mod_strings['LBL_INSTALL_TYPE_TYPICAL']}
        </td><td width='500'>
            {$mod_strings['LBL_INSTALL_TYPE_MSG2']}
        <td></tr>
        <tr><td width='200'>
          <input type="radio" name="install_type" value="custom" {$custom_checked}>{$mod_strings['LBL_INSTALL_TYPE_CUSTOM']}
        </td><td width='500'>
            {$mod_strings['LBL_INSTALL_TYPE_MSG3']}
        <td></tr>
        </table>


      </td>
    </tr>
	<tr><td width='1000'><b><i>{$php_521}</i></b></td></tr>
    <tr>
      <td align="right" colspan="2" height="20">
        <hr>
                <input type="hidden" name="current_step" value="{$next_step}">

        <table cellspacing="0" cellpadding="0" border="0" class="stdTable">
          <tr>

            <td><input class="button" type="button" value="{$mod_strings['LBL_BACK']}" id="button_back_installType" onclick="document.getElementById('form').submit();" />
                <input type="hidden" name="goto" value="{$mod_strings['LBL_BACK']}" /></td>
                <td><input class="button" type="submit" name="goto" value="{$mod_strings['LBL_NEXT']}" id="button_next" /></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
    </form>
</body>
</html>
EOQ2;
echo $out;
?>
