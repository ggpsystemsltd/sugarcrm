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
var aclviewer=function(){var lastDisplay='';return{view:function(role_id,role_module){YAHOO.util.Connect.asyncRequest('POST','index.php',{'success':aclviewer.display,'failure':aclviewer.failed},'module=ACLRoles&action=EditRole&record='+role_id+'&category_name='+role_module);ajaxStatus.showStatus(SUGAR.language.get('app_strings','LBL_REQUEST_PROCESSED'));},save:function(form_name){var formObject=document.getElementById(form_name);YAHOO.util.Connect.setForm(formObject);YAHOO.util.Connect.asyncRequest('POST','index.php',{'success':aclviewer.postSave,'failure':aclviewer.failed});ajaxStatus.showStatus(SUGAR.language.get('app_strings','LBL_SAVING'));},postSave:function(o){eval(o.responseText);aclviewer.view(result['role_id'],result['module']);},display:function(o){aclviewer.lastDisplay='';ajaxStatus.flashStatus('Done');document.getElementById('category_data').innerHTML=o.responseText;},failed:function(){ajax.flashStatus('Could Not Connect');},toggleDisplay:function(id){if(aclviewer.lastDisplay!=''&&typeof(aclviewer.lastDisplay)!='undefined'){aclviewer.hideDisplay(aclviewer.lastDisplay);}
if(aclviewer.lastDisplay!=id){aclviewer.showDisplay(id);aclviewer.lastDisplay=id;}else{aclviewer.lastDisplay='';}},hideDisplay:function(id){document.getElementById(id).style.display='none';document.getElementById(id+'link').style.display='';},showDisplay:function(id){document.getElementById(id).style.display='';document.getElementById(id+'link').style.display='none';}};}();
