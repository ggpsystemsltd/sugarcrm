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
function hide(divname){var elem1=document.getElementById(divname);elem1.style.display='none';}
function show(div){var elem1=document.getElementById(div);elem1.style.display='';}
function showdiv(div){hideall();show(div);}
function hideall(){var last_val=document.getElementById('wiz_total_steps');var last=parseInt(last_val.value);for(i=1;i<=last;i++){hide('step'+i);}}
function showfirst(wiz_mode){showdiv('step1');var current_step=document.getElementById('wiz_current_step');current_step.value="1";var save_button=document.getElementById('wiz_submit_button');var next_button=document.getElementById('wiz_next_button');var save_button_div=document.getElementById('save_button_div');var next_button_div=document.getElementById('next_button_div');var back_button_div=document.getElementById('back_button_div');save_button.disabled=true;back_button_div.style.display='none';save_button_div.style.display='none';next_button.focus();if(wiz_mode=='marketing'){back_button_div.style.display='';}
hilite(current_step.value);}
function navigate(direction){var current_step=document.getElementById('wiz_current_step');var currentValue=parseInt(current_step.value);if(validate_wiz(current_step.value,direction)){if(direction=='back'){current_step.value=currentValue-1;}
if(direction=='next'){current_step.value=currentValue+1;}
if(direction=='direct'){}
showdiv("step"+current_step.value);hilite(current_step.value);var total=document.getElementById('wiz_total_steps').value;var save_button=document.getElementById('wiz_submit_button');var back_button_div=document.getElementById('back_button_div');var save_button_div=document.getElementById('save_button_div');var next_button_div=document.getElementById('next_button_div');if(current_step.value==total){save_button.disabled=false;back_button_div.style.display='';save_button_div.style.display='';next_button_div.style.display='none';}else{if(current_step.value<2){back_button_div.style.display='none';}else{back_button_div.style.display='';}
var next_button=document.getElementById('wiz_next_button');next_button_div.style.display='';save_button_div.style.display='none';next_button.focus();}}else{}}
var already_linked='';function hilite(hilite){var last=parseInt(document.getElementById('wiz_total_steps').value);for(i=1;i<=last;i++){var nav_step=document.getElementById('nav_step'+i);nav_step.className='';}
var nav_step=document.getElementById('nav_step'+hilite);nav_step.className='';if(already_linked.indexOf(hilite)<0){nav_step.innerHTML="<a href='#'  onclick=\"javascript:direct('"+hilite+"');\">"+nav_step.innerHTML+"</a>";already_linked+=',hilite';}}
function link_navs(beg,end){if(beg==''){beg=1;}
if(end==''){var last=document.getElementById('wiz_total_steps').value;end=last;}
beg=parseInt(beg);end=parseInt(end);for(i=beg;i<=end;i++){var nav_step=document.getElementById('nav_step'+i);nav_step.innerHTML="<a href='#'  onclick=\"javascript:direct('"+i+"');\">"+nav_step.innerHTML+"</a>";}}
function direct(stepnumber){var current_step=document.getElementById('wiz_current_step');var currentValue=parseInt(current_step.value);if(validate_wiz(current_step.value,'direct')){current_step.value=stepnumber;navigate('direct');}else{}}
function validate_wiz(step,direction){var total=document.getElementById('wiz_total_steps').value;var wiz_message=document.getElementById('wiz_message');if(direction=='back'){if(step=='1'){var msg=SUGAR.language.get('mod_strings','LBL_WIZARD_FIRST_STEP_MESSAGE');wiz_message.innerHTML="<font color=\'red\' size=\'2\'><b>"+msg+"</b></font>";return false;}else{wiz_message.innerHTML='';}}
if(direction=='next'){if(step==total){var msg=SUGAR.language.get('mod_strings','LBL_WIZARD_LAST_STEP_MESSAGE');wiz_message.innerHTML="<font color=\'red\' size=\'2\'><b>"+msg+"</b></font>";return false;}else{wiz_message.innerHTML='';}}
if(direction=='direct'){}
if((direction!='direct')&&(window.validate_wiz_form)&&(!validate_wiz_form('step'+step))){return false;}
return true;}
