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

if(empty($_SESSION['oc_install'])){
	die('Not A Valid Entry Point');
}
require_once('include/utils/disc_client_utils.php');
global $beanList, $beanFiles, $sugar_config;
$first_time = 'false';
if(isset($_REQUEST['first_time']) && !empty($_REQUEST['first_time'])){
    $first_time = $_REQUEST['first_time'];
}

if(!empty($_REQUEST['oc_server_url']) && $_REQUEST['oc_server_url'] != 'http://'){
	 $_SESSION['oc_server_url'] = $_REQUEST['oc_server_url'];
}else{
	$_SESSION['oc_server_url'] = (isset($sugar_config['sync_site_url']) ? $sugar_config['sync_site_url'] : "http://");
}
if(!empty($_REQUEST['oc_username'])){
	$_SESSION['oc_username'] = $_REQUEST['oc_username'];
}else{
	$_SESSION['oc_username'] = (isset($sugar_config['oc_username']) ? $sugar_config['oc_username'] : "");
}
if(!empty($_REQUEST['oc_password'])){
    if($first_time != 'false'){
       $_SESSION['oc_password'] = $_REQUEST['oc_password'];  
    }else{
	   $_SESSION['oc_password'] = md5($_REQUEST['oc_password']);
    }
    $_SESSION['oc_password_non_md5'] = $_REQUEST['oc_password'];
}else{
		$_SESSION['oc_password'] = (isset($sugar_config['oc_password']) ? $sugar_config['oc_password'] : "");
        if($first_time != false){
            $_SESSION['oc_password_non_md5'] = $_SESSION['oc_password'];
        }
}
$_SESSION['oc_install'] = true;
$_SESSION['is_oc_conversion'] = true;
$convert = true;
if(!isset($_SESSION['oc_server_url']) || $_SESSION['oc_server_url'] == 'http://' ||
         !isset($_SESSION['oc_username']) || empty($_SESSION['oc_username']) ||
         !isset($_SESSION['oc_password']) || empty($_SESSION['oc_password'])
  ){
}
$errors = "";

$langHeader = get_language_header();
///////////////////////////////////////////////////////////////////////////////
////    START OUTPUT
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo $langHeader?>>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta http-equiv="Content-Script-Type" content="text/javascript">
   <meta http-equiv="Content-Style-Type" content="text/css">
    <title>Offline Client Installation</title>
   <link rel="stylesheet" href="install/install.css" type="text/css" />
   <script type="text/javascript" src="install/installCommon.js"></script>
   <script type="text/javascript" src="install/oc_convert.js"></script>
</head>
<body>
<form action="index.php?entryPoint=oc_convert" method="post" name="oc_convert" id="form">
<input type="hidden" name="goto" value="oc_convert">
<table cellspacing="0" cellpadding="0" border="0" align="center" class="shell">
<tr>
   <th width="400">Offline Client Installation</th>
   <th width="200" height="30" style="text-align: right;"><a href="http://www.sugarcrm.com" target="_blank">
        <IMG src="include/images/sugarcrm_login.png" width="120" height="19" alt="SugarCRM" border="0"></a></th>
   </tr>
<?php
    $errors = convert_disc_client(); 
    $converted = true;
    if(!empty($errors)){
?>
<tr>
    <td colspan="2" width="600">
    <p>Please enter the details below in order to properly install and sync your offline client.</p>
   <table width="100%" cellpadding="0" cellpadding="0" border="0" class="StyleDottedHr">
   <tr><th colspan="3" align="left">Offline Client Installation</td></tr>
   <tr><td colspan="3"><div class="required"><?php echo $errors; ?></div></td></tr>
   <tr><td colspan="3"><div class="required">Please contact your Administrator in order to resolve this problem.</div></td></tr>
<tr><td><span class="required">*</span></td>
       <td><b>URL of Sugar Server</td>
       <td align="left"><input type="text" name="oc_server_url" id="oc_server_url" value="<?php echo $_SESSION['oc_server_url']; ?>" size="40" /></td></tr>
   <tr><td><span class="required">*</span></td>
       <td><b>Username</b><br>
            <i>This is the username you will connect to your Sugar server with.</i></td>
       <td align="left"><input type="text" name="oc_username" value="<?php echo $_SESSION['oc_username']; ?>" size="20" /></td></tr>
       <tr><td><span class="required">*</span></td>
       <td><b>Password for server user</b></td>
       <td align="left"><input type="password" name="oc_password" value="<?php echo $_SESSION['oc_password_non_md5']; ?>" size="20" onChange="toggleIsFirstTime();"/></td></tr>
   
</table>
</td>
</tr>  

<tr>
   <td align="right" colspan="2">
   <hr>
   <table cellspacing="0" cellpadding="0" border="0" class="stdTable">
   <tr>
   <td><input class="button" type="button" onclick="window.open('http://www.sugarcrm.com/forums/');" value="Help" /></td>
   <td>
   <input class="button" type="button" name="goto" value="Try Again" onclick="document.getElementById('form').submit();" />
        <input type="hidden" name="goto" value="oc_convert" />
        <input type="hidden" name="first_time" value="<?php echo $first_time; ?>" />
        </td>
   </tr>
   </table>
</form>
<br>
</body>
</html>
<?php
    }else{
?>
<tr>
    <td colspan="2" width="600">
   <table width="100%" cellpadding="0" cellpadding="0" border="0" class="StyleDottedHr">
   <tr><th colspan="3" align="left">Offline Client Installation</td></tr>
   <tr><td colspan="3">Offline Client Installation has completed. Please click the button below in order to be taken to your installation.</td></tr>
 </table>
</td>
</tr>  
<tr>
   <td align="right" colspan="2">
   <hr>
   <table cellspacing="0" cellpadding="0" border="0" class="stdTable">
   <tr>
   <td><input class="button" type="button" onclick="window.open('http://www.sugarcrm.com/forums/');" value="Help" /></td>
   <td><input class="button" type="button" onclick="location.href='index.php?action=index&module=Home';" value="Finish" /></td>
   </tr>
   </table>
</td>
</tr>
</table>
</form>
<br>
</body>
</html>
<?php
}
?>