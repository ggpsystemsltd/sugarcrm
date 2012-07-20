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

var focus_obj = false;
var label = SUGAR.language.get('app_strings', 'LBL_DEFAULT_LINK_TEXT');

function remember_place(obj) {
  focus_obj = obj;
}

function showVariable() {
	document.EditView.variable_text.value = 
		document.EditView.variable_name.options[document.EditView.variable_name.selectedIndex].value; 
}

function addVariables(the_select,the_module) {
	the_select.options.length = 0;
	for(var i=0;i<field_defs[the_module].length;i++) {
		var new_option = document.createElement("option");
		new_option.value = "$"+field_defs[the_module][i].name;
		new_option.text= field_defs[the_module][i].value;
		the_select.options.add(new_option,i);
	}
	showVariable();
}
function toggle_text_only(firstRun) {
	if (typeof(firstRun) == 'undefined')
		firstRun = false;
	var text_only = document.getElementById('text_only');
    //Initialization of TinyMCE
    if(firstRun){
        setTimeout("tinyMCE.execCommand('mceAddControl', false, 'body_text');", 500);
        var tiny = tinyMCE.getInstanceById('body_text');
    }
	//check to see if the toggle textonly flag is checked
    if(document.getElementById('toggle_textonly').checked == true) {
        //hide the html div (containing TinyMCE)
        document.getElementById('body_text_div').style.display = 'none';
        document.getElementById('toggle_textarea_option').style.display = 'none';
        document.getElementById('text_div').style.display = 'block';
        text_only.value = 1; 
    } else {
        //display the html div (containing TinyMCE)
        document.getElementById('body_text_div').style.display = 'inline';
        document.getElementById('toggle_textarea_option').style.display = 'inline';
        document.getElementById('text_div').style.display = 'none';
        
        text_only.value = 0;                     
    }
    update_textarea_button();
}

function update_textarea_button()
{
	if(document.getElementById('text_div').style.display == 'none') {
		document.getElementById('toggle_textarea_elem').value = toggle_textarea_elem_values[0];
	} else {
		document.getElementById('toggle_textarea_elem').value = toggle_textarea_elem_values[1];
	}
}

function toggle_textarea_edit(obj)
{
	if(document.getElementById('text_div').style.display == 'none')
	{
        document.getElementById('text_div').style.display = 'block';
	} else {
        document.getElementById('text_div').style.display = 'none';
	}
	update_textarea_button();
}



//This function checks that tinyMCE is initilized before setting the text (IE bug)
function setTinyHTML(text) {
    var tiny = tinyMCE.getInstanceById('body_text');
                
    if (tiny.getContent() != null) {
        tiny.setContent(text)
    } else {
        setTimeout(setTinyHTML(text), 1000);
    }
}

function stripTags(str) {
	var theText = new String(str);

	if(theText != 'undefined') {
		return theText.replace(/<\/?[^>]+>/gi, '');
	}
}
/*
 * this function will insert variables into text area 
*/
function insert_variable_text(myField, myValue) {
	//IE support
	if (document.selection) {
		myField.focus();
		sel = document.selection.createRange();
		sel.text = myValue;
	}
	//MOZILLA/NETSCAPE support
	else if (myField.selectionStart || myField.selectionStart == '0') {
		var startPos = myField.selectionStart;
		var endPos = myField.selectionEnd;
		myField.value = myField.value.substring(0, startPos)
		+ myValue
		+ myField.value.substring(endPos, myField.value.length);
	} else {
		myField.value += myValue;
	}
}

/*
 * This function inserts variables into a TinyMCE instance
 */
function insert_variable_html(text) {
	var inst = tinyMCE.getInstanceById("body_text");
	if (inst)
                    inst.getWin().focus();
	//var html = inst.getContent(true);
	//inst.setContent(html + text);
	inst.execCommand('mceInsertRawHTML', false, text);
}

function insert_variable_html_link(text) {

	the_label = document.getElementById('url_text').value;
	if(typeof(the_label) =='undefined'){
		the_label = label;	
	}

	//remove surounding parenthesis around the label
	if(the_label[0] == '{' && the_label[the_label.length-1] == '}'){
		the_label = the_label.substring(1,the_label.length-1);
	}
	
	var thelink = "<a href='" + text + "' > "+the_label+" </a>";
	insert_variable_html(thelink);
}	
/*
 * this function will check to see if text only flag has been checked.
 * If so, the it will call the text insert function, if not, then it
 * will call the html (tinyMCE eidtor) insert function
*/
function insert_variable(text) {
	//if text only flag is checked, then insert into text field
	if(document.getElementById('toggle_textonly').checked == true){
		//use text version insert 
		insert_variable_text(document.getElementById('body_text_plain'), text) ;
	}else{
		//use html version insert 
		insert_variable_html(text) ;
	}
}			

