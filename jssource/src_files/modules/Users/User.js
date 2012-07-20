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



function clearInboundSettings() {
	var url = document.getElementById('server_url');
	var user = document.getElementById('email_user');
	var prot = document.getElementById('protocol');
	var pass = document.getElementById('email_password');
	var port = document.getElementById('port');
	var inbox = document.getElementById('mailbox');
	
	url.value = '';
	user.value ='';
	pass.value = '';
	port.value = '';
	inbox.value = '';
	
	for(i=0; i<prot.options.length; i++) {
		if(prot.options[i].value == '') {
			prot.options[i].selected = true;
		}
	}
}

function checkInboundEmailSettings() {
	var url = document.getElementById('server_url');
	var user = document.getElementById('email_user');
	var prot = document.getElementById('protocol');
	var pass = document.getElementById('email_password');
	var port = document.getElementById('port');
	var inbox = document.getElementById('mailbox');
	var doCheck = false;
	var IEAlert = SUGAR.language.get('Users', 'ERR_IE_MISSING_REQUIRED');
	
	if(url.value != '') {
		doCheck = true;
	} else if(user.value != '') {
		doCheck = true;
	} else if(prot.value != '') {
		doCheck = true;
	} else if(pass.value != '') {
		doCheck = true;
	} else if(port.value != '') {
		doCheck = true;
	}
	/* else if(inbox.value != '') {
		doCheck = true;
	}*/

	if(doCheck == true) {
		if(url.value == '' || url.value == 'undefined') {
			alert(IEAlert);
			return false;
		} else if(user.value == '' || user.value == 'undefined') {
			alert(IEAlert);
			return false;
		} else if(prot.value == '' || prot.value == 'undefined') {
			alert(IEAlert);
			return false;
		} else if(pass.value == '' || pass.value == 'undefined') {
			alert(IEAlert);
			return false;
		} else if(port.value == '' || port.value == 'undefined') {
			alert(IEAlert);
			return false;
		} else if(inbox.value == '' || inbox.value == 'undefined') {
			alert(IEAlert);
			return false;
		}
	}
	
	return true;
}


function show_main() {
	var basic = document.getElementById('basic'); basic.style.display = "";
	var settings = document.getElementById('settings'); settings.style.display = "";
	var info = document.getElementById('information'); info.style.display = "";
	var address = document.getElementById('address'); address.style.display = "";
	var calendar_options = document.getElementById('calendar_options'); calendar_options.style.display = "";
	var edit_tabs = document.getElementById('edit_tabs'); edit_tabs.style.display = "";
	
	var email_options = document.getElementById('email_options'); email_options.style.display = 'none';
	var email_inbound = document.getElementById('email_inbound'); email_inbound.style.display = 'none';
}

function show_email() {
	var basic = document.getElementById('basic'); basic.style.display = "none";
	var settings = document.getElementById('settings'); settings.style.display = "none";
	var info = document.getElementById('information'); info.style.display = "none";
	var address = document.getElementById('address'); address.style.display = "none";
	var calendar_options = document.getElementById('calendar_options'); calendar_options.style.display = "none";
	var edit_tabs = document.getElementById('edit_tabs'); edit_tabs.style.display = "none";
	
	var email_options = document.getElementById('email_options'); email_options.style.display = "";
	var email_inbound = document.getElementById('email_inbound'); email_inbound.style.display = "";
}


function enable_change_password_button() {
	var butt = document.getElementById('change_password_button');
	if(document.EditView.record.value != "" && document.EditView.record.value != 'undefined') {
		butt.style.display = '';
	}
}

function refresh_signature_list(signature_id, signature_name) {
	var field=document.getElementById('signature_id');
	var bfound=0;
	for (var i=0; i < field.options.length; i++) {
			if (field.options[i].value == signature_id) {
				if (field.options[i].selected==false) {
					field.options[i].selected=true;
				}
				bfound=1;
			}
	}
	//add item to selection list.
	if (bfound == 0) {
		var newElement=document.createElement('option');
		newElement.text=signature_name;
		newElement.value=signature_id;
		field.options.add(newElement);
		newElement.selected=true;
	}	

	//enable the edit button.
	var field1=document.getElementById('edit_sig');
	field1.style.visibility="visible";
}

function setSigEditButtonVisibility() {
	var field = document.getElementById('signature_id');
	var editButt = document.getElementById('edit_sig');
	if(field.value != '') {
		editButt.style.visibility = "visible";
	} else {
		editButt.style.visibility = "hidden";
	} 
}

function open_email_signature_form(record, the_user_id) {
	URL="index.php?module=Users&action=Popup";
	if(record != "") {
		URL += "&record="+record;
	}
	if(the_user_id != "") {
		URL += "&the_user_id="+the_user_id;
	}
	windowName = 'email_signature';
	windowFeatures = 'width=800' + ',height=600' + ',resizable=1,scrollbars=1';

	win = window.open(URL, windowName, windowFeatures);
	if(window.focus) {
		// put the focus on the popup if the browser supports the focus() method
		win.focus();
	}
}

function setDefaultSigId(id) {
	var checkbox = document.getElementById("signature_default");
	var default_sig = document.getElementById("signatureDefault");
	
	if(checkbox.checked) {
		default_sig.value = id;
	} else {
		default_sig.value = "";
	}
}
