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

function setSymbolValue(id) {
    document.getElementById('symbol').value = currencies[id];
}

function user_status_display(field){
        if (typeof field.form.is_admin == 'undefined')
        {
            var input = document.createElement("input");
            input.setAttribute("id", "is_admin");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", "is_admin");
            input.setAttribute("value", "");
            field.form.appendChild(input);
        }
        if (typeof field.form.is_group == 'undefined')
        {
            var input = document.createElement("input");
            input.setAttribute("id", "is_group");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", "is_group");
            input.setAttribute("value", "");
            field.form.appendChild(input);
        }
        if (typeof field.form.portal_only == 'undefined')
        {
            var input = document.createElement("input");
            input.setAttribute("id", "portal_only");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", "portal_only");
            input.setAttribute("value", "");
            field.form.appendChild(input);
        }
		switch (field.value){
		case 'Administrator':
		    document.getElementById('UserTypeDesc').innerHTML=SUGAR.language.get('Users',"LBL_ADMIN_DESC");
		    document.getElementById('is_admin').value='1';
		break;
		case 'RegularUser':
			document.getElementById('is_admin').value='0';
			document.getElementById('UserTypeDesc').innerHTML=SUGAR.language.get('Users',"LBL_REGULAR_DESC");
		break;
		case 'UserAdministrator':
			document.getElementById('is_admin').value='0';
			document.getElementById('UserTypeDesc').innerHTML=SUGAR.language.get('Users',"LBL_USER_ADMIN_DESC");
		break;
        case 'GROUP':
            document.getElementById('is_admin').value='0';
            document.getElementById('is_group').value='1';
			document.getElementById('UserTypeDesc').innerHTML=SUGAR.language.get('Users',"LBL_GROUP_DESC");
        break;
        case 'PORTAL_ONLY':
            document.getElementById('is_admin').value='0';
            document.getElementById('is_group').value='0';
            document.getElementById('portal_only').value='1';
            document.getElementById('UserTypeDesc').innerHTML=SUGAR.language.get('Users','LBL_PORTAL_ONLY_DESC');
        break;
	}
}


function startOutBoundEmailSettingsTest()
{
    var loader = new YAHOO.util.YUILoader({
    require : ["element","sugarwidgets"],
    loadOptional: true,
    skin: { base: 'blank', defaultSkin: '' },
    onSuccess: testOutboundSettings,
    allowRollup: true,
    base: "include/javascript/yui/build/"
    });
    loader.addModule({
        name :"sugarwidgets",
        type : "js",
        fullpath: "include/javascript/sugarwidgets/SugarYUIWidgets.js",
        varName: "YAHOO.SUGAR",
        requires: ["datatable", "dragdrop", "treeview", "tabview"]
    });
    loader.insert();

}

function testOutboundSettings()
{
	var errorMessage = '';
	var isError = false;
	var fromAddress = document.getElementById("outboundtest_from_address").value;
    var errorMessage = '';
    var isError = false;
    var smtpServer = document.getElementById('mail_smtpserver').value;

    var mailsmtpauthreq = document.getElementById('mail_smtpauth_req');
    if(trim(smtpServer) == '' || trim(mail_smtpport) == '')
    {
        isError = true;
        errorMessage += SUGAR.language.get('Users',"LBL_MISSING_DEFAULT_OUTBOUND_SMTP_SETTINGS") + "<br/>";
        overlay(SUGAR.language.get('app_strings',"ERR_MISSING_REQUIRED_FIELDS"), errorMessage, 'alert');
        return false;
    }


    if(document.getElementById('mail_smtpuser') && trim(document.getElementById('mail_smtpuser').value) == '')
    {
        isError = true;
        errorMessage += SUGAR.language.get('app_strings',"LBL_EMAIL_ACCOUNTS_SMTPUSER") + "<br/>";
    }


    if(isError) {
        overlay(SUGAR.language.get('app_strings',"ERR_MISSING_REQUIRED_FIELDS"), errorMessage, 'alert');
        return false;
    }

    testOutboundSettingsDialog();
}

function sendTestEmail()
{
    var toAddress = document.getElementById("outboundtest_from_address").value;
    var fromAddress = document.getElementById("outboundtest_from_address").value;

    if (trim(fromAddress) == "")
    {
        overlay(SUGAR.language.get('app_strings',"ERR_MISSING_REQUIRED_FIELDS"), SUGAR.language.get('app_strings',"LBL_EMAIL_SETTINGS_FROM_TO_EMAIL_ADDR"), 'alert');
        return;
    }
    else if (!isValidEmail(fromAddress)) {
        overlay(SUGAR.language.get('app_strings',"ERR_INVALID_REQUIRED_FIELDS"), SUGAR.language.get('app_strings',"LBL_EMAIL_SETTINGS_FROM_TO_EMAIL_ADDR"), 'alert');
        return;
    }

    //Hide the email address window and show a message notifying the user that the test email is being sent.
    EmailMan.testOutboundDialog.hide();
    overlay(SUGAR.language.get('app_strings',"LBL_EMAIL_PERFORMING_TASK"), SUGAR.language.get('app_strings',"LBL_EMAIL_ONE_MOMENT"), 'alert');

    var callbackOutboundTest = {
    	success	: function(o) {
    		hideOverlay();
    		overlay(SUGAR.language.get('app_strings',"LBL_EMAIL_TEST_OUTBOUND_SETTINGS"), SUGAR.language.get('app_strings',"LBL_EMAIL_TEST_NOTIFICATION_SENT"), 'alert');
    	}
    };
    var smtpServer = document.getElementById('mail_smtpserver').value;

    if(document.getElementById('mail_smtpuser') && document.getElementById('mail_smtppass')){
    var postDataString = 'mail_sendtype=SMTP&mail_smtpserver=' + smtpServer + "&mail_smtpport=" + mail_smtpport + "&mail_smtpssl=" + mail_smtpssl + "&mail_smtpauth_req=true&mail_smtpuser=" + trim(document.getElementById('mail_smtpuser').value) + "&mail_smtppass=" + trim(document.getElementById('mail_smtppass').value) + "&outboundtest_from_address=" + fromAddress + "&outboundtest_to_address=" + toAddress;
    }
    else{
	var postDataString = 'mail_sendtype=SMTP&mail_smtpserver=' + smtpServer + "&mail_smtpport=" + mail_smtpport + "&mail_smtpssl=" + mail_smtpssl + "&outboundtest_from_address=" + fromAddress + "&outboundtest_to_address=" + toAddress;
    }
	YAHOO.util.Connect.asyncRequest("POST", "index.php?action=testOutboundEmail&mail_name=system&module=EmailMan&to_pdf=true&sugar_body_only=true", callbackOutboundTest, postDataString);
}
function testOutboundSettingsDialog() {
        // lazy load dialogue
        if(!EmailMan.testOutboundDialog) {
        	EmailMan.testOutboundDialog = new YAHOO.widget.Dialog("testOutboundDialog", {
                modal:true,
				visible:true,
            	fixedcenter:true,
            	constraintoviewport: true,
                width	: 600,
                shadow	: false
            });
            EmailMan.testOutboundDialog.setHeader(SUGAR.language.get('app_strings',"LBL_EMAIL_TEST_OUTBOUND_SETTINGS"));
            YAHOO.util.Dom.removeClass("testOutboundDialog", "yui-hidden");
        } // end lazy load

        EmailMan.testOutboundDialog.render();
        EmailMan.testOutboundDialog.show();
} // fn

function overlay(reqtitle, body, type) {
    var config = { };
    config.type = type;
    config.title = reqtitle;
    config.msg = body;
    YAHOO.SUGAR.MessageBox.show(config);
}

function hideOverlay() {
	YAHOO.SUGAR.MessageBox.hide();
}


function confirmReassignRecords() {
    var status = document.getElementsByName('status');
    if(verify_data(document.EditView)) {
        if(status[0] && status[0].value == 'Inactive'){
            var handleYes = function() {
                document.EditView.return_action.value = 'reassignUserRecords';
                document.EditView.return_module.value = 'Users';
                document.EditView.submit();
            };
            
            var handleNo = function() {
                document.EditView.submit();
            };
            YAHOO.namespace('example.container');
            YAHOO.example.container.simpledialog1 =
                new YAHOO.widget.SimpleDialog('simpledialog1',
                                              { width: '300px',
                                                fixedcenter: true,
                                                visible: true,
                                                draggable: false,
                                                close: true,
                                                text: SUGAR.language.get('Users','LBL_REASS_CONFIRM_REASSIGN'),
                                                constraintoviewport: true,
                                                buttons: [ { text:SUGAR.language.get('Users','LBL_REASS_CONFIRM_REASSIGN_YES'), handler:handleYes, isDefault:true },
                                                           { text:SUGAR.language.get('Users','LBL_REASS_CONFIRM_REASSIGN_NO'),  handler:handleNo } ]
                                              } );
            YAHOO.example.container.simpledialog1.setHeader(SUGAR.language.get('Users','LBL_REASS_CONFIRM_REASSIGN_TITLE'));
            YAHOO.example.container.simpledialog1.render('popup_window');
            YAHOO.util.Event.addListener('Save', 'click', YAHOO.example.container.simpledialog1.show, YAHOO.example.container.simpledialog1, true);
        }
        else{
            document.EditView.submit();
        }
    }
    else{
        return false;
    }
}

function verify_data(form)
{
    // handles any errors in the email widget
    var isError = !check_form("EditView");
	
    if (trim(form.last_name.value) == "") {
		add_error_style('EditView',form.last_name.name,
                        SUGAR.language.get('app_strings','ERR_MISSING_REQUIRED_FIELDS') + SUGAR.language.get('Users','LBL_LIST_NAME') );
        isError = true;
	}
	if (trim(form.user_name.value) == "") {
		add_error_style('EditView',form.user_name.name,
                        SUGAR.language.get('app_strings','ERR_MISSING_REQUIRED_FIELDS') + SUGAR.language.get('Users','LBL_USER_NAME') );
        isError = true;
	}
	
    if (document.getElementById("required_password").value=='1' 
	    && document.getElementById("new_password").value == "") {
		add_error_style('EditView',form.new_password.name,
                        SUGAR.language.get('app_strings','ERR_MISSING_REQUIRED_FIELDS') + SUGAR.language.get('Users','LBL_NEW_PASSWORD') );
        isError = true;
	}
	
 	if (isError == true) {
        return false;
    }
	
	if (document.EditView.return_id.value != '' && (typeof(form.reports_to_id)!="undefined") && (document.EditView.return_id.value == form.reports_to_id.value)) {
		alert(SUGAR.language.get('app_strings','ERR_SELF_REPORTING'));
		return false;
	}
	
	if (document.EditView.dec_sep.value != '' && (document.EditView.dec_sep.value == "'")) {
		alert(SUGAR.language.get('app_strings','ERR_NO_SINGLE_QUOTE') + SUGAR.language.get('Users','LBL_DECIMAL_SEP'));
		return false;
	}
    
	if (document.EditView.num_grp_sep.value != '' && (document.EditView.num_grp_sep.value == "'")) {
		alert(SUGAR.language.get('app_strings','ERR_NO_SINGLE_QUOTE') + SUGAR.language.get('Users','LBL_NUMBER_GROUPING_SEP'));
		return false;
	}
    
	if (document.EditView.num_grp_sep.value == document.EditView.dec_sep.value) {
		alert(SUGAR.language.get('app_strings','ERR_DECIMAL_SEP_EQ_THOUSANDS_SEP'));
		return false;
	}
	if( document.getElementById("portal_only") && document.getElementById("portal_only")=='1' &&
		typeof(document.getElementById("new_password")) != "undefined" && typeof(document.getElementById("new_password").value) != "undefined") {
		if(document.getElementById("new_password").value != '' || document.getElementById("confirm_pwd").value != '') {
			if(document.getElementById("new_password").value != document.getElementById("confirm_pwd").value) {
				alert(SUGAR.language.get('Users','ERR_PASSWORD_MISMATCH'));
				return false;
			}
		}
	}
	
	return true;
}
    
    
function set_chooser()
{
    var display_tabs_def = '';
    var hide_tabs_def = '';
    var remove_tabs_def = '';
    
    var display_td = document.getElementById('display_tabs_td');
    var hide_td    = document.getElementById('hide_tabs_td');
    var remove_td  = document.getElementById('remove_tabs_td');
    
    var display_ref = display_td.getElementsByTagName('select')[0];
    
    for(i=0; i < display_ref.options.length ;i++)
    {
        display_tabs_def += "display_tabs[]="+display_ref.options[i].value+"&";
    }
    
    if(hide_td != null)
    {
	    var hide_ref = hide_td.getElementsByTagName('select')[0];
        
        for(i=0; i < hide_ref.options.length ;i++)
	    {
            hide_tabs_def += "hide_tabs[]="+hide_ref.options[i].value+"&";
	    }
    }
    
    if(remove_td != null)
    {
        var remove_ref = remove_td.getElementsByTagName('select')[0];
        
        for(i=0; i < remove_ref.options.length ;i++)
	    {
            remove_tabs_def += "remove_tabs[]="+remove_ref.options[i].value+"&";
	    }
	    
    }
    
    document.EditView.display_tabs_def.value = display_tabs_def;
    document.EditView.hide_tabs_def.value = hide_tabs_def;
    document.EditView.remove_tabs_def.value = remove_tabs_def;
}

// Brought this over from Forms.php, pretty sure it's not needed.
function add_checks(f) {
    return true;
}


// Autoruns
function onUserEditView() {
    YAHOO.util.Event.onContentReady('user_theme_picker',function() {
        document.getElementById('user_theme_picker').onchange = function() {
            document.getElementById('themePreview').src =
                "index.php?entryPoint=getImage&themeName=" + document.getElementById('user_theme_picker').value + "&imageName=themePreview.png";
            if (typeof themeGroupList[document.getElementById('user_theme_picker').value] != 'undefined' &&
                themeGroupList[document.getElementById('user_theme_picker').value] ) {
                document.getElementById('use_group_tabs_row').style.display = '';
            } else {
                document.getElementById('use_group_tabs_row').style.display = 'none';
            }
        }
    });

    setSymbolValue(document.getElementById('currency_select').options[document.getElementById('currency_select').selectedIndex].value);
    setSigDigits();
    user_status_display(document.getElementById('UserType'));
}
