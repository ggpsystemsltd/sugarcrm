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

require_once('include/utils/disc_client_utils.php');

global $beanList, $beanFiles;

////    errors
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

$convert = true;
if(!isset($_SESSION['oc_server_url']) || $_SESSION['oc_server_url'] == 'http://' ||
         !isset($_SESSION['oc_username']) || empty($_SESSION['oc_username']) ||
         !isset($_SESSION['oc_password']) || empty($_SESSION['oc_password'])
  ){
  $convert = false; 
}
///////////////////////////////////////////////////////////////////////////////
////    START OUTPUT
$langHeader = get_language_header();
$out =<<<EOQ
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html {$langHeader}>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta http-equiv="Content-Script-Type" content="text/javascript">
   <meta http-equiv="Content-Style-Type" content="text/css">
    <title>{$mod_strings['LBL_OC_INSTALL_TITLE']}</title>
   <link rel="stylesheet" href="install/install.css" type="text/css" />
   <script type="text/javascript" src="install/installCommon.js"></script>
</head>
<body>
<form action="install.php" method="post" name="oc_convert" id="form">
<input type="hidden" name="goto" value="oc_convert">
<input type="hidden" name="current_step" value="{$next_step}">
<table cellspacing="0" cellpadding="0" border="0" align="center" class="shell">
      <tr><td colspan="2" id="help">&nbsp;</td></tr>
    <tr>
      <th width="500">
		<p>
		<img src="{$sugar_md}" alt="SugarCRM" border="0">
		</p>{$mod_strings['LBL_OC_INSTALL_TITLE']}</th>
		
   <th width="200" style="text-align: right;"><a href="http://www.sugarcrm.com" target="_blank">
        <IMG src="include/images/sugarcrm_login.png" width="145" height="30" alt="SugarCRM" border="0"></a></th>
   </tr>
EOQ;
if($convert){
    $errors = convert_disc_client(); 
    $converted = true;
    if(!empty($errors)){
$out2 =<<<EOQ2
<tr>
    <td colspan="2">
    <p>{$mod_strings['LBL_OC_INSTALL_DIRECTIONS']}</p>
   <table width="100%" cellpadding="0" cellpadding="0" border="0" class="StyleDottedHr">
   <tr><th colspan="3" align="left">{$mod_strings['LBL_OC_INSTALL_TITLE']}</td></tr>
   <tr><td colspan="3"><div class="required">{$errors}</div></td></tr>
   <tr><td colspan="3"><div class="required">{$mod_strings['LBL_OC_ADMIN']}</div></td></tr>
 </table>
</td>
</tr>  
EOQ2;
$out3 = "</table>
</form>
<br>
</body>
</html>";
    }else{
$out2 =<<<EOQ5
<tr>
    <td colspan="2">
    <p>{$mod_strings['LBL_OC_INSTALL_DIRECTIONS']}</p>
   <table width="100%" cellpadding="0" cellpadding="0" border="0" class="StyleDottedHr">
   <tr><th colspan="3" align="left">{$mod_strings['LBL_OC_INSTALL_TITLE']}</td></tr>
   <tr><td colspan="3">{$mod_strings['LBL_OC_SUCCESS']}</td></tr>
 </table>
</td>
</tr>  
EOQ5;
$out3 =<<<EOQ3
<tr>
   <td align="right" colspan="2">
   <hr>
   <table cellspacing="0" cellpadding="0" border="0" class="stdTable">
   <tr>
   <td><input class="button" type="button" onclick="window.open('http://www.sugarcrm.com/forums/');" value="{$mod_strings['LBL_HELP']}" /></td>
   <td><input class="button" type="button" onclick="location.href='index.php';" value="{$mod_strings['LBL_NEXT']}" /></td>
   </tr>
   </table>
</td>
</tr>
</table>
</form>
<br>
</body>
</html>
EOQ3;
    }
}else{
$out2 =<<<EOQ2
<tr>
    <td colspan="2">
    <p>{$mod_strings['LBL_OC_INSTAL_DIRECTIONS']}</p>
    {$errors}
   <div class="required">{$mod_strings['LBL_REQUIRED']}</div>
   <table width="100%" cellpadding="0" cellpadding="0" border="0" class="StyleDottedHr">
   <tr><th colspan="3" align="left">{$mod_strings['LBL_OC_INSTALL_TITLE']}</td></tr>
<tr><td><span class="required">*</span></td>
       <td><b>{$mod_strings['LBL_OC_INSTALL_SERVER_URL']}</td>
       <td align="left"><input type="text" name="oc_server_url" id="oc_server_url" value="{$_SESSION['oc_server_url']}" size="40" /></td></tr>
   <tr><td><span class="required">*</span></td>
       <td><b>{$mod_strings['LBL_OC_INSTALL_USERNAME']}</b><br>
            <i>{$mod_strings['LBL_OC_INSTALL_USERNAME_DETAILS']}</i></td>
       <td align="left"><input type="text" name="oc_username" value="{$_SESSION['oc_username']}" size="20" /></td></tr>
       <tr><td><span class="required">*</span></td>
       <td><b>{$mod_strings['LBL_OC_INSTALL_PASS']}</b></td>
       <td align="left"><input type="password" name="oc_password" value="{$_SESSION['oc_password']}" size="20" /></td></tr>
   
</table>
</td>
</tr>  

EOQ2;
$out3 =<<<EOQ3
<tr>
   <td align="right" colspan="2">
   <hr>
   <table cellspacing="0" cellpadding="0" border="0" class="stdTable">
   <tr>
   <td><input class="button" type="button" onclick="window.open('http://www.sugarcrm.com/forums/');" value="{$mod_strings['LBL_HELP']}" /></td>
   <td>
   <input class="button" type="button" name="goto" value="{$mod_strings['LBL_NEXT']}" onclick="document.getElementById('form').submit();" />
        <input type="hidden" name="goto" value="oc_convert" />
        </td>
   </tr>
   </table>
</td>
</tr>
</table>
</form>
<br>
</body>
</html>
EOQ3;
}

echo $out.$out2.$out3;
?>
