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



var req;
var uw_check_msg = "";
//var uw_check_type = '';
var find_done = false;

function loadXMLDoc(url) {
	req = false;
    // branch for native XMLHttpRequest object
    if(window.XMLHttpRequest) {
    	try {
			req = new XMLHttpRequest();
        } catch(e) {
			req = false;
        }
    // branch for IE/Windows ActiveX version
    } else if(window.ActiveXObject) {
       	try {
        	req = new ActiveXObject("Msxml2.XMLHTTP");
      	} catch(e) {
        	try {
          		req = new ActiveXObject("Microsoft.XMLHTTP");
        	} catch(e) {
          		req = false;
        	}
		}
    }
    
	if(req) {
		req.onreadystatechange = processReqChange;
		req.open("GET", url, true);
		req.send("");
	}
}




///// preflight scripts
function preflightToggleAll(cb) {
	var checkAll = false;
	var form = document.getElementById('diffs');
	
	if(cb.checked == true) {
		checkAll = true;
	}
	
	for(i=0; i<form.elements.length; i++) {
		if(form.elements[i].type == 'checkbox') {
			form.elements[i].checked = checkAll;
		}
	}
	return;
}


function checkSqlStatus(done) {
	var schemaSelect = document.getElementById('select_schema_change');
	var hideShow = document.getElementById('show_sql_run');
	var hideShowCB = document.getElementById('sql_run');
	var nextButton = document.getElementById('next_button');
	var schemaMethod = document.getElementById('schema');
	document.getElementById('sql_run').checked = false;
	
	if(schemaSelect.options[schemaSelect.selectedIndex].value == 'manual' && done == false) {
		hideShow.style.display = 'block';
		nextButton.style.display = 'none';
		hideShowCB.disabled = false;
		schemaMethod.value = 'manual';
	} else {
		if(done == true) {
			hideShowCB.checked = true;
			hideShowCB.disabled = true;
		} else {
			hideShow.style.display = 'none';
		}
		nextButton.style.display = 'inline';
		schemaMethod.value = 'sugar';
	}
}


function toggleDisplay(targ) {
	target = document.getElementById("targ");
	if(target.style.display == 'none') {
		target.style.display = '';
	} else {
		target.style.display = 'none';
	}
}

function verifyMerge(cb) {
	if(cb.value == 'sugar') {
		var challenge = "{$mod_strings['LBL_UW_OVERWRITE_DESC']}";
		var answer = confirm(challenge);
		
		if(!answer) {
			cb.options[0].selected = true;
		}
	}
}
