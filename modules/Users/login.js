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
function set_focus(){if(document.DetailView.user_name.value!=''){document.DetailView.user_password.focus();document.DetailView.user_password.select();}
else document.DetailView.user_name.focus();}
function switchLanguage(lang){var loc=window.location+"";loc=loc.replace(/\&login_language=[^&]*/i,"");loc+="&login_language="+lang;window.location=loc;}
function toggleDisplay(id){if(this.document.getElementById(id).style.display=='none'){this.document.getElementById(id).style.display='inline'
if(this.document.getElementById(id+"link")!=undefined){this.document.getElementById(id+"link").style.display='none';}
document.getElementById(id+"_options").src='index.php?entryPoint=getImage&themeName='+SUGAR.themes.theme_name+'&imageName=basic_search.gif';document.getElementById(id+"_options").alt=LBL_HIDEOPTIONS;}else{this.document.getElementById(id).style.display='none'
if(this.document.getElementById(id+"link")!=undefined){this.document.getElementById(id+"link").style.display='inline';}
document.getElementById(id+"_options").src='index.php?entryPoint=getImage&themeName='+SUGAR.themes.theme_name+'&imageName=advanced_search.gif';document.getElementById(id+"_options").alt=LBL_SHOWOPTIONS;}}
function generatepwd(){document.getElementById('generate_pwd_button').value='Please Wait';document.getElementById('generate_pwd_button').disabled=1;document.getElementById('wait_pwd_generation').innerHTML='<img src="themes/default/images/img_loading.gif" >';var callback;callback={success:function(o){document.getElementById('generate_pwd_button').value=LBL_LOGIN_SUBMIT;document.getElementById('generate_pwd_button').disabled=0;document.getElementById('wait_pwd_generation').innerHTML='';checkok=o.responseText;if(checkok.charAt(0)!='1')
document.getElementById('generate_success').innerHTML=checkok;if(checkok.charAt((checkok.length)-1)=='1')
document.getElementById('generate_success').innerHTML=LBL_REQUEST_SUBMIT;},failure:function(o){document.getElementById('generate_pwd_button').value=LBL_LOGIN_SUBMIT;document.getElementById('generate_pwd_button').disabled=0;document.getElementById('wait_pwd_generation').innerHTML='';alert(SUGAR.language.get('app_strings','LBL_AJAX_FAILURE'));}}
postData='&to_pdf=1&module=Home&action=index&entryPoint=GeneratePassword&username='+document.getElementById("fp_user_name").value+'&user_email='+document.getElementById("fp_user_mail").value+'&link=1';YAHOO.util.Connect.asyncRequest('POST','index.php',callback,postData);}
