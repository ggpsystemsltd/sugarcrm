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




SUGAR.dashlets = function() {
	return {
		/**
		 * Generic javascript method to use post a form 
		 * 
		 * @param object theForm pointer to the form object
		 * @param function callback function to call after for form is sent
		 *
		 * @return bool false
		 */ 
		postForm: function(theForm, callback) {	
			var success = function(data) {
				if(data) {
					callback(data.responseText);
				}
			}
			YAHOO.util.Connect.setForm(theForm); 
			var cObj = YAHOO.util.Connect.asyncRequest('POST', 'index.php', {success: success, failure: success});
			return false;
		},
		/**
		 * Generic javascript method to use Dashlet methods
		 * 
		 * @param string dashletId Id of the dashlet being call
		 * @param string methodName method to be called (function in the dashlet class)
		 * @param string postData data to send (eg foo=bar&foo2=bar2...)
		 * @param bool refreshAfter refreash the dashlet after sending data
		 * @param function callback function to be called after dashlet is refreshed (or not refresed) 
		 */ 
		callMethod: function(dashletId, methodName, postData, refreshAfter, callback) {
        	ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_SAVING'));
        	response = function(data) {
        		ajaxStatus.hideStatus();
				if(refreshAfter) SUGAR.mySugar.retrieveDashlet(dashletId);
				if(callback) {
					callback(data.responseText);
				}
        	}
	    	post = 'to_pdf=1&module=Home&action=CallMethodDashlet&method=' + methodName + '&id=' + dashletId + '&' + postData;
			var cObj = YAHOO.util.Connect.asyncRequest('POST','index.php', 
							  {success: response, failure: response}, post);
		}
	 };
}();

if(SUGAR.util.isTouchScreen() && typeof iScroll == 'undefined') {

	with (document.getElementsByTagName("head")[0].appendChild(document.createElement("script")))
	{
		setAttribute("id", "newScript", 0);
		setAttribute("type", "text/javascript", 0);
		setAttribute("src", "include/javascript/iscroll.js", 0);
	}

}