{*

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




*}


{literal}<SCRIPT>
if(typeof Forecast == 'undefined') { // since the dashlet can be included multiple times a page, don't redefine these functions
	Forecast = function() {
	    return {
	    
	    	/**
	    	 * Called when the forecast is committed
	    	 */	   	    
	        commit: function(theform, id, forecast_type, oppCount, weightValue, timeperiod_id, user_id) {
	        	ajaxStatus.showStatus('{/literal}{$saving}{literal}'); // show that AJAX call is happening
	        	// what data to post to the dashlet
				
	        	if (forecast_type == 'Direct')
	        	{
	        		best_case= (theform.direct_best_case.value!=""?theform.direct_best_case.value:0);
	        		likely_case = (theform.direct_likely_case.value!=""?theform.direct_likely_case.value:0);
	        		worst_case = (theform.direct_worst_case.value!=""?theform.direct_worst_case.value:0);
	        		
	        	}
	        	else if (forecast_type == 'Rollup')
	        	{
	        		best_case= (theform.rollup_best_case.value!=""?theform.rollup_best_case.value:0);
	        		likely_case = (theform.rollup_likely_case.value!=""?theform.rollup_likely_case.value:0);
	        		worst_case = (theform.rollup_worst_case.value!=""?theform.rollup_worst_case.value:0);
	        	}
				if (isNaN(parseInt(best_case)) || isNaN(best_case)) {
					window.alert("{/literal}{$MOD.ERR_FORECAST_AMOUNT}{literal}");
					return false;
				}
				if (isNaN(parseInt(likely_case)) || isNaN(likely_case)) {
					window.alert("{/literal}{$MOD.ERR_FORECAST_AMOUNT}{literal}");
					return false;
				}
				if (isNaN(parseInt(worst_case)) || isNaN(worst_case)) {
					window.alert("{/literal}{$MOD.ERR_FORECAST_AMOUNT}{literal}");
					return false;
				}
				
				
				//adjust the commit value if it has a fractional amount.
				if (parseFloat(best_case) != Math.floor(parseFloat(best_case))) {
					best_case = Math.round(parseFloat(best_case));
				}
				if (parseFloat(likely_case) != Math.floor(parseFloat(likely_case))) {
					likely_case = Math.round(parseFloat(likely_case));
				}
				if (parseFloat(worst_case) != Math.floor(parseFloat(worst_case))) {
					worst_case = Math.round(parseFloat(worst_case));
				}
				
				cnf_message="{/literal}{$MOD.LBL_COMMIT_MESSAGE}{literal}" + ' ' + best_case + ', '+ likely_case + ',' + worst_case + " ?";
			
				if (!confirm(cnf_message)) {
					return false;
				}
				
	        	
    	    	postData = 'to_pdf=1&module=Home&action=CallMethodDashlet&method=saveText&id=' + id + '&commit_forecast' + '=1' + 
    	    		'&forecast_type=' + forecast_type + '&best_case=' + best_case + '&likely_case=' +
    	    		likely_case + '&worst_case=' + worst_case + '&opp_count=' + oppCount + '&weight_value=' + weightValue +
    	    		'&timeperiod_id=' + timeperiod_id + '&user_id=' + user_id;
				var cObj = YAHOO.util.Connect.asyncRequest('POST','index.php', 
								  {success: Forecast.saved, failure: Forecast.saved}, postData);	        
	        },

	        updateTimeperiod: function(id, timeperiod_id) {
    	    	postData = 'to_pdf=1&module=Home&action=CallMethodDashlet&method=saveText&id=' + id + '&update_timeperiod' + '=1' + 
    	    		'&timeperiod_id=' + timeperiod_id;
				var cObj = YAHOO.util.Connect.asyncRequest('POST','index.php', 
								  {success: Forecast.saved, failure: Forecast.saved}, postData);	        
	        },
	        	    
	        showWorksheet: function(theform, forecast_type) {
				theform.action.value = 'index';	        
				theform.forecast_type.value = forecast_type;	
				theform.submit(theform);
	        },
	        
		    /**
	    	 * handle the response of the saveText method
	    	 */
	        saved: function(data) {
	        	eval(data.responseText);
	           	ajaxStatus.showStatus('{/literal}{$saved}{literal}');
	           	SUGAR.mySugar.retrieveDashlet(result['id']);
	           	window.setTimeout('ajaxStatus.hideStatus()', 2000);
	        }
	    };
	}();
}
</SCRIPT>{/literal}