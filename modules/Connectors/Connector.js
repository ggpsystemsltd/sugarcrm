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
function run_test(source_id){var callback={success:function(data){var resultDiv=document.getElementById(source_id+'_result');resultDiv.innerHTML='<b>'+data.responseText+'</b>';},failure:function(data){var resultDiv=document.getElementById(source_id+'_result');resultDiv.innerHTML='<b>'+SUGAR.language.get('app_strings','ERROR_UNABLE_TO_RETRIEVE_DATA')+'</b>';},timeout:300000}
var resultDiv=document.getElementById(source_id+'_result');resultDiv.innerHTML='<img src=themes/default/images/sqsWait.gif>';document.ModifyProperties.source_id.value=source_id;document.ModifyProperties.action.value='RunTest';YAHOO.util.Connect.setForm(document.ModifyProperties);var cObj=YAHOO.util.Connect.asyncRequest('POST','index.php?module=Connectors',callback);document.ModifyProperties.action.value='SaveModifyProperties';}
var widgetTimout;function dswidget_open(elt){var wdiget_div=document.getElementById('dswidget_div');var objX=findPosX(elt);var objY=findPosY(elt);wdiget_div.style.top=(objY+15)+'px';wdiget_div.style.left=(objX)+'px';wdiget_div.style.display='block';}
function dswidget_close(){widgetTimout=setTimeout("hide_widget()",500);}
function hide_widget(){var wdiget_div=document.getElementById('dswidget_div');wdiget_div.style.display='none';}
function clearButtonTimeout(){if(widgetTimout){clearTimeout(widgetTimout);}}
function findPosX(obj)
{var curleft=0;if(obj.offsetParent)
{while(obj.offsetParent)
{curleft+=obj.offsetLeft;obj=obj.offsetParent;}
if(obj!=null)
curleft+=obj.offsetLeft;}
else if(obj.x)
curleft+=obj.x;return curleft;}
function findPosY(obj)
{var curtop=0;if(obj.offsetParent)
{while(obj.offsetParent)
{curtop+=obj.offsetTop;obj=obj.offsetParent;}
if(obj!=null)
curtop+=obj.offsetTop;}
else if(obj.y)
curtop+=obj.y;return curtop;}
