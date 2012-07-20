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

 function commitverify(theform,notanumber,commitmessage) {
 	
 		best_case=new String(theform.best_case.value);
		if (isNaN(parseInt(best_case)) || isNaN(best_case)) {
			window.alert(notanumber + ' ' + best_case );
			return false;
		}

 		likely_case=new String(theform.likely_case.value);
		if (isNaN(parseInt(likely_case)) || isNaN(likely_case)) {
			window.alert(notanumber + ' ' + likely_case );
			return false;
		}

 		worst_case=new String(theform.worst_case.value);
		if (isNaN(parseInt(worst_case)) || isNaN(worst_case)) {
			window.alert(notanumber + ' ' + worst_case );
			return false;
		}
 		
 		//adjust the commit value if it has a fractional amount.
		if (parseFloat(best_case) != Math.floor(parseFloat(best_case))) {
			best_case = Math.round(parseFloat(best_case));
		}		
 		//adjust the commit value if it has a fractional amount.
		if (parseFloat(likely_case) != Math.floor(parseFloat(likely_case))) {
			likely_case = Math.round(parseFloat(likely_case));
		}		
 		//adjust the commit value if it has a fractional amount.
		if (parseFloat(worst_case) != Math.floor(parseFloat(worst_case))) {
			worst_case = Math.round(parseFloat(worst_case));
		}		

		cnf_message=commitmessage + ' ' + best_case + ', ' + likely_case + ', '+ worst_case + ' ?';				
		if (!confirm(cnf_message)) {
			return false;
		}
		
		theform.likely_case.value=likely_case;
		theform.worst_case.value=worst_case;
		theform.best_case.value=best_case;
		
		theform.commit_forecast.value='1';
	
		//reset value due to undo changes resulting from prior actions.
		document.CommitEditView.call_back_function.value='commit_forecast';
		
		return true;
}

function formsubmit(theform) {
		ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_PROCESSING_REQUEST'));

		var url=site_url.site_url + "/index.php?entryPoint=TreeData";
		var post_data=get_post_url(theform);
		var callback =	{
			  success: function(o) {    
					ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_REQUEST_PROCESSED'));			  	
					window.setTimeout('ajaxStatus.hideStatus()', 2000);
			    	var targetdiv=document.getElementById('activetimeperiodsworksheet');
	    			targetdiv.innerHTML=o.responseText;
			  },
			  failure: function(o) {/*failure handler code*/}
		};
	
		var trobj = YAHOO.util.Connect.asyncRequest('POST',url, callback, post_data);
}

function get_chart(theform) {
		var url=site_url.site_url + "/index.php?entryPoint=TreeData"; 
		var post_data=get_post_url(theform);
		var callback =	{
			  success: function(o) {    
					subwindow=window.open("","forecast_chart","height=640,width=800,left=100,top=100,resizable=yes");
					subwindow.document.write(o.responseText);
					subwindow.document.close();
					subwindow.focus();
                    if (YAHOO.env.ua.ie) {
                        subwindow.location.reload();
                    }
			  },
			  failure: function(o) {/*failure handler code*/}
		};
	
		var trobj = YAHOO.util.Connect.asyncRequest('POST',url, callback, post_data);
}

function get_post_url(theform) {
	var url='';
	for (var i=0; i < theform.elements.length; i++) {
		if ((theform.elements[i].type=="text" || theform.elements[i].type=="hidden") && theform.elements[i].name != 'undefined' & theform.elements[i].name!='') {
			if (i>0) {
				url=url+"&";
			}
			url=url+theform.elements[i].name+"="+escape(theform.elements[i].value);
		}
	}
	return url;

}
//this function manages the adjusted amount array
//and is called every time adjustment amount is changed in the UI.
//works with the global objects adj_object and adj_total, they are set during forecast page load.
function update_adj_amount(field,tfield_name) {
	//calculate new total.
	var hidden_tfield=document.getElementById(tfield_name);
	var newtotal = parseFloat(hidden_tfield.value) - parseFloat(field.getAttribute('old_value'));
	newtotal = newtotal + parseFloat(field.value)
	
	//reset field's old value
	field.setAttribute('old_value',field.value);
	//set new total
	hidden_tfield.value=newtotal;
	
	var display_tfield=document.getElementById(tfield_name+"_DISPLAY");
	display_tfield.innerHTML=newtotal;
}

function list_nav(params,formname) {
	var theform=document.forms[formname];
	var url=site_url.site_url + "/index.php?entryPoint=TreeData";
	var post_data=get_post_url(theform);

	for (node in params) {
		post_data=post_data+'&'+node+'='+params[node]
	}
	post_data=post_data+'&call_back_function=list_nav';

	var callback =	{
		  success: function(o) {    
		    	var targetdiv=document.getElementById('activetimeperiodsworksheet');
    			targetdiv.innerHTML=o.responseText;
    			SUGAR.util.evalScript(o.responseText);
		  },
		  failure: function(o) {/*failure handler code*/}
	};
	
	var trobj = YAHOO.util.Connect.asyncRequest('POST',url, callback, post_data);
}

function copy_amount(forecast_type,copy_type) {
	
	var field_name;
	var best_case=0;
	var worst_case=0;
	var likely_case=0;
	if (forecast_type=='direct') {
		if (copy_type=='worksheet') {
			field=document.getElementById('WK_BEST_CASE_TOTAL');
			best_case=field.value;
			
			field=document.getElementById('WK_LIKELY_CASE_TOTAL');
			likely_case=field.value;

			field=document.getElementById('WK_WORST_CASE_TOTAL');
			worst_case=field.value;

		}else if (copy_type=='weigh') {
			field=document.getElementById('WEIGHTED_VALUE_TOTAL');
			best_case=worst_case=likely_case=field.value;
		} else {
			field=document.getElementById('REVENUE_TOTAL');
			best_case=worst_case=likely_case=field.value;
		}
	} else {
		if (copy_type=='worksheet') {
			field=document.getElementById('WK_BEST_CASE_TOTAL');
			best_case=field.value;
			
			field=document.getElementById('WK_LIKELY_CASE_TOTAL');
			likely_case=field.value;

			field=document.getElementById('WK_WORST_CASE_TOTAL');
			worst_case=field.value;
		} else {
			field=document.getElementById('BEST_CASE_TOTAL');
			best_case=field.value;
			
			field=document.getElementById('LIKELY_CASE_TOTAL');
			likely_case=field.value;

			field=document.getElementById('WORST_CASE_TOTAL');
			worst_case=field.value;
		}
	}
	
	wk_field=document.getElementById('commit_best_case');
	wk_field.value=unformat_currency(best_case);

	wk_field=document.getElementById('commit_worst_case');
	wk_field.value=unformat_currency(worst_case);

	wk_field=document.getElementById('commit_likely_case');
	wk_field.value=unformat_currency(likely_case);
} 

function copyvalue_overlib(forecast_type) {

	var script;

	if (forecast_type=='direct') {
		script= "overlib('<a style=\\\'width: 150px\\\' class=\\\'menuItem\\\' onmouseover=\\\'hiliteItem(this,\\\"yes\\\");\\\' onmouseout=\\\'unhiliteItem(this);\\\' onclick=\\\'copy_amount(\"direct\",\"amount\")\\\' href=\\\'#\\\'>" + SUGAR.language.get('Forecasts', 'LBL_COPY_AMOUNT')+"</a>" ;
		script=script + "<a style=\\\'width: 150px\\\' class=\\\'menuItem\\\' onmouseover=\\\'hiliteItem(this,\\\"yes\\\");\\\' onmouseout=\\\'unhiliteItem(this);\\\' onclick=\\\'copy_amount(\"direct\",\"weigh\")\\\' href=\\\'#\\\'>" + SUGAR.language.get('Forecasts', 'LBL_COPY_WEIGH_AMOUNT')+"</a>";  
        script=script + "<a style=\\\'width: 150px\\\' class=\\\'menuItem\\\' onmouseover=\\\'hiliteItem(this,\\\"yes\\\");\\\' onmouseout=\\\'unhiliteItem(this);\\\' onclick=\\\'copy_amount(\"direct\",\"worksheet\")\\\' href=\\\'#\\\'>" + SUGAR.language.get('Forecasts', 'LBL_WORKSHEET_AMOUNT')+"</a>"  
	} else {
		script= "overlib('<a style=\\\'width: 150px\\\' class=\\\'menuItem\\\' onmouseover=\\\'hiliteItem(this,\\\"yes\\\");\\\' onmouseout=\\\'unhiliteItem(this);\\\' onclick=\\\'copy_amount(\"rollup\",\"amount\")\\\' href=\\\'#\\\'>" + SUGAR.language.get('Forecasts', 'LBL_COMMIT_AMOUNT')+"</a>" ;
        script=script + "<a style=\\\'width: 150px\\\' class=\\\'menuItem\\\' onmouseover=\\\'hiliteItem(this,\\\"yes\\\");\\\' onmouseout=\\\'unhiliteItem(this);\\\' onclick=\\\'copy_amount(\"rollup\",\"worksheet\")\\\' href=\\\'#\\\'>" + SUGAR.language.get('Forecasts', 'LBL_WORKSHEET_AMOUNT')+"</a>"  	
	}
    script=script + "', CAPTION, '" + SUGAR.language.get('Forecasts', 'LBL_COPY_FROM');
    script=script + "', STICKY, MOUSEOFF, 3000, CLOSETEXT, '<img border=0 style=\"margin-left:50px;\" src=index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name;
    script=script + "&imageName=close.gif>', WIDTH, 150, CLOSETITLE, '" + SUGAR.language.get('Forecasts', 'LBL_COPY') + "', CLOSECLICK, FGCLASS, 'olOptionsFgClass', ";
    script=script + "CGCLASS, 'olOptionsCgClass', BGCLASS, 'olBgClass', TEXTFONTCLASS, 'olFontClass', CAPTIONFONTCLASS, 'olOptionsCapFontClass', CLOSEFONTCLASS, 'olOptionsCloseFontClass')";		

	return eval(script);
}