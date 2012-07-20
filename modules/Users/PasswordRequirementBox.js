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
function password_confirmation(){var new_pwd=document.getElementById('new_password').value;var old_pwd=document.getElementById('old_password').value;var confirm_pwd=document.getElementById('confirm_pwd');if(confirm_pwd.value!=new_pwd)
confirm_pwd.style.borderColor='red';else
confirm_pwd.style.borderColor='';if(confirm_pwd.value!=(new_pwd.substring(0,confirm_pwd.value.length)))
document.getElementById('comfirm_pwd_match').style.display='inline';else
document.getElementById('comfirm_pwd_match').style.display='none';if(new_pwd!=""||confirm_pwd.value!=""||old_pwd!=""||(document.getElementById('page')&&document.getElementById('page').value=="Change"))
document.getElementById('password_change').value='true';else
document.getElementById('password_change').value='false';}
function set_password(form,rules){if(form.password_change.value=='true'){if(rules=='1'){alert(ERR_RULES_NOT_MET);return false;}
if(form.is_admin.value!=1&&(form.is_current_admin&&form.is_current_admin.value!='1')&&form.old_password.value==""){alert(ERR_ENTER_OLD_PASSWORD);return false;}
if(form.new_password.value==""){alert(ERR_ENTER_NEW_PASSWORD);return false;}
if(form.confirm_pwd.value==""){alert(ERR_ENTER_CONFIRMATION_PASSWORD);return false;}
if(form.new_password.value==form.confirm_pwd.value)
return true;else{alert(ERR_REENTER_PASSWORDS);return false;}}
else
return true;}
function newrules(minpwdlength,maxpwdlength,customregex){var good_rules=0;var passwd=document.getElementById('new_password').value;if(document.getElementById('lengths')){var length=document.getElementById('new_password').value.length;if((length<parseInt(minpwdlength)&&parseInt(minpwdlength)>0)||(length>parseInt(maxpwdlength)&&parseInt(maxpwdlength)>0)){document.getElementById('lengths').className='bad';good_rules=1;}
else{document.getElementById('lengths').className='good';}}
if(document.getElementById('1lowcase')){if(!passwd.match('[abcdefghijklmnopqrstuvwxyz]')){document.getElementById('1lowcase').className='bad';good_rules=1;}
else{document.getElementById('1lowcase').className='good';}}
if(document.getElementById('1upcase')){if(!passwd.match('[ABCDEFGHIJKLMNOPQRSTUVWXYZ]')){document.getElementById('1upcase').className='bad';good_rules=1;}
else{document.getElementById('1upcase').className='good';}}
if(document.getElementById('1number')){if(!passwd.match('[0123456789]')){document.getElementById('1number').className='bad';good_rules=1;}
else{document.getElementById('1number').className='good';}}
if(document.getElementById('1special')){var custom_regex=new RegExp('[|}{~!@#$%^&*()_+=-]');if(!custom_regex.test(passwd)){document.getElementById('1special').className='bad';good_rules=1;}
else{document.getElementById('1special').className='good';}}
if(document.getElementById('regex')){var regex=new RegExp(customregex);if(regex.test(passwd)){document.getElementById('regex').className='bad';good_rules=1;}
else{document.getElementById('regex').className='good';}}
return good_rules;}
function set_focus(){if(document.getElementById('error_pwd')){if(document.forms.length>0){for(i=0;i<document.forms.length;i++){for(j=0;j<document.forms[i].elements.length;j++){var field=document.forms[i].elements[j];if((field.type=="password")&&(field.name=="old_password")){field.focus();if(field.type=="text"){field.select();}
break;}}}}}
else{if(document.forms.length>0){for(i=0;i<document.forms.length;i++){for(j=0;j<document.forms[i].elements.length;j++){var field=document.forms[i].elements[j];if((field.type=="text"||field.type=="textarea"||field.type=="password")&&!field.disabled&&(field.name=="first_name"||field.name=="name"||field.name=="user_name"||field.name=="document_name")){field.focus();if(field.type=="text"){field.select();}
break;}}}}}}
