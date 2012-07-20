<?php
//if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
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



global $sugar_version, $js_custom_version;
if( !isset( $install_script ) || !$install_script ){
    die('Unable to process script directly.');
}

// setup session variables (and their defaults) if this page has not yet been submitted
if(!isset($_SESSION['license_submitted']) || !$_SESSION['license_submitted']){
    $_SESSION['setup_license_accept'] = false;
}

$checked = (isset($_SESSION['setup_license_accept']) && !empty($_SESSION['setup_license_accept'])) ? 'checked="on"' : '';

require_once("install/install_utils.php");
$license_file = getLicenseContents("LICENSE.txt");
$langHeader = get_language_header();
$out =<<<EOQ
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html {$langHeader}>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta http-equiv="Content-Style-Type" content="text/css">
   <title>{$mod_strings['LBL_WIZARD_TITLE']} {$mod_strings['LBL_LICENSE_ACCEPTANCE']}</title>
   <link REL="SHORTCUT ICON" HREF="include/images/sugar_icon.ico">
   <link rel="stylesheet" href="install/install.css" type="text/css">
   <script src="cache/include/javascript/sugar_grp1_yui.js?s={$sugar_version}&c={$js_custom_version}"></script>
   <script type="text/javascript">
    <!--
    if ( YAHOO.env.ua )
        UA = YAHOO.env.ua;
    -->
    </script>
    <link rel='stylesheet' type='text/css' href='include/javascript/yui/build/container/assets/container.css' />
   <script type="text/javascript" src="install/license.js"></script>
</head>

<body onload="javascript:toggleNextButton();document.getElementById('button_next2').focus();">
<div id='licenseDiv'>
<form action="install.php" method="post" name="setConfig" id="form">
<form action="welcome.php" method="post" name="setLang" id="langForm">
  <table cellspacing="0" cellpadding="0" border="0" align="center" class="shell">
    <tr><td colspan="2" id="help"><a href="{$help_url}" target='_blank'>{$mod_strings['LBL_HELP']} </a></td></tr>
    <tr>
      <th width="500">
		<p>
		<img src="{$sugar_md}" alt="SugarCRM" border="0">
		</p>
      {$mod_strings['LBL_LICENSE_ACCEPTANCE']}</th>
      <th width="200" height="30" style="text-align: right;"><a href="http://www.sugarcrm.com" target="_blank">
      	<IMG src="include/images/sugarcrm_login.png" width="145" height="30" alt="SugarCRM" border="0"></a>
      </th>
    </tr>
    <tr>
      <td colspan="2">
        <textarea cols="80" rows="20" readonly>{$license_file}</textarea>
      </td>
    </tr>

    <tr>
      <td align=left>
        <input type="checkbox" class="checkbox" name="setup_license_accept" id="button_next2" onClick='toggleNextButton();' {$checked} />
        <a href='javascript:void(0)' onClick='toggleLicenseAccept();toggleNextButton();'>{$mod_strings['LBL_LICENSE_I_ACCEPT']}</a>
      </td>
      <td align=right>
        <input type="button" class="button" name="print_license" id="button_print_license" value="{$mod_strings['LBL_LICENSE_PRINTABLE']}"
        	onClick='window.open("install.php?page=licensePrint&language={$current_language}");' />
      </td>
    </tr>
    <tr>
      <td align="right" colspan="2">
        <hr>
        <input type="hidden" name="current_step" value="{$next_step}">
        <table cellspacing="0" cellpadding="0" border="0" class="stdTable">
          <tr>
            <td>
                <input class="acceptButton" type="button" name="goto" value="{$mod_strings['LBL_BACK']}"  id="button_back_license" onclick="document.getElementById('form').submit();" />
                <input class="acceptButton" type="button" name="goto" value="{$mod_strings['LBL_NEXT']}" id="button_next" disabled="disabled" onclick="callSysCheck();"/>
                <input type="hidden" name="goto" id='hidden_goto' value="{$mod_strings['LBL_BACK']}" />
            </td>
          </tr>
        </table>
      </td>
    </tr>

  </table>
</form>
</div>

<script>
var msgPanel;
function callSysCheck(){

            //begin main function that will be called
            ajaxCall = function(msg_panel){
                //create success function for callback

                getPanel = function() {
                var args = {    width:"300px",
                                modal:true,
                                fixedcenter: true,
                                constraintoviewport: false,
                                underlay:"shadow",
                                close:false,
                                draggable:true,

                                effect:{effect:YAHOO.widget.ContainerEffect.FADE, duration:.5}
                               } ;
                        msg_panel = new YAHOO.widget.Panel('p_msg', args);
                        //If we haven't built our panel using existing markup,
                        //we can set its content via script:
                        msg_panel.setHeader("{$mod_strings['LBL_LICENSE_CHKENV_HEADER']}");
                        msg_panel.setBody(document.getElementById("checkingDiv").innerHTML);
                        msg_panel.render(document.body);
                        msgPanel = msg_panel;
                }


                passed = function(url){
                    document.setConfig.goto.value="{$mod_strings['LBL_NEXT']}";
                    document.getElementById('hidden_goto').value="{$mod_strings['LBL_NEXT']}";
                    document.setConfig.current_step.value="{$next_step}";
                    document.setConfig.submit();
                    window.focus();
                }
                success = function(o) {
                    if (o.responseText.indexOf('passed')>=0){
                        if ( YAHOO.util.Selector.query('button', 'p_msg', true) != null )
                            YAHOO.util.Selector.query('button', 'p_msg', true).style.display = 'none'; 
                        scsbody =  "<table cellspacing='0' cellpadding='0' border='0' align='center'><tr><td>";
                        scsbody += "<p>{$mod_strings['LBL_LICENSE_CHECK_PASSED']}</p>";
                        scsbody += "<div id='cntDown'>{$mod_strings['LBL_THREE']}</div>";
                        scsbody += "</td></tr></table>";
                        scsbody += "<script>countdown(3);<\/script>";
                        msgPanel.setBody(scsbody);
                        msgPanel.render();
                        countdown(3);
                        window.setTimeout('passed("install.php?goto=next")', 2500);

                    }else{
                        //turn off loading message
                        msgPanel.hide();
                        document.getElementById('sysCheckMsg').style.display = '';
                        document.getElementById('licenseDiv').style.display = 'none';
                        document.getElementById('sysCheckMsg').innerHTML=o.responseText;
                    }


                }//end success

                //set loading message and create url
                postData = "checkInstallSystem=true&to_pdf=1&sugar_body_only=1";

                //if this is a call already in progress, then just return
                    if(typeof ajxProgress != 'undefined'){
                        return;
                    }

                getPanel();
                msgPanel.show;
                var ajxProgress = YAHOO.util.Connect.asyncRequest('POST','install.php', {success: success, failure: success}, postData);


            };//end ajaxCall method
              ajaxCall();
            return;
}

    function countdown(num){
        scsbody =  "<table cellspacing='0' cellpadding='0' border='0' align='center'><tr><td>";
        scsbody += "<p>{$mod_strings['LBL_LICENSE_CHECK_PASSED']}</p>";
        scsbody += "<div id='cntDown'>{$mod_strings['LBL_LICENSE_REDIRECT']}"+num+"</div>";
        scsbody += "</td></tr></table>";
        msgPanel.setBody(scsbody);
        msgPanel.render();
        if(num >0){
             num = num-1;
             setTimeout("countdown("+num+")",1000);
        }
    }

</script>

           <div id="checkingDiv" style="display:none">
           <table cellspacing="0" cellpadding="0" border="0">
               <tr><td>
                    <p><img src='install/processing.gif' alt="{$mod_strings['LBL_LICENSE_CHECKING']}"> <br>{$mod_strings['LBL_LICENSE_CHECKING']}</p>
                </td></tr>
            </table>
            </div>

          <div id='sysCheckMsg'><div>


</body>
</html>
EOQ;

echo $out;
?>