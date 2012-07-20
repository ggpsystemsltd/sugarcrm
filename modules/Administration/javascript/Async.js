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
var AjaxObject={ret:'',currentRequestObject:null,timeout:30000,forceAbort:false,_reset:function(){this.timeout=30000;this.forceAbort=false;},handleFailure:function(o){alert('asynchronous call failed.');},startRequest:function(callback,args,forceAbort){if(this.currentRequestObject!=null){if(this.forceAbort==true||callback.forceAbort==true){YAHOO.util.Connect.abort(this.currentRequestObject,null,false);}}
this.currentRequestObject=YAHOO.util.Connect.asyncRequest('POST',"./index.php?module=Administration&action=Async&to_pdf=true",callback,args);this._reset();},refreshEstimate:function(o){this.ret=YAHOO.lang.JSON.parse(o.responseText);document.getElementById('repairXssDisplay').style.display='inline';document.getElementById('repairXssCount').value=this.ret.count;SUGAR.Administration.RepairXSS.toRepair=this.ret.toRepair;},showRepairXssResult:function(o){var resultCounter=document.getElementById('repairXssResultCount');this.ret=YAHOO.lang.JSON.parse(o.responseText);document.getElementById('repairXssResults').style.display='inline';if(this.ret.msg=='success'){SUGAR.Administration.RepairXSS.repairedCount+=this.ret.count;resultCounter.value=SUGAR.Administration.RepairXSS.repairedCount;}else{resultCounter.value=this.ret;}
SUGAR.Administration.RepairXSS.executeRepair();}};var callbackRepairXssRefreshEstimate={success:AjaxObject.refreshEstimate,failure:AjaxObject.handleFailure,timeout:AjaxObject.timeout,scope:AjaxObject};var callbackRepairXssExecute={success:AjaxObject.showRepairXssResult,failure:AjaxObject.handleFailure,timeout:AjaxObject.timeout,scope:AjaxObject};
