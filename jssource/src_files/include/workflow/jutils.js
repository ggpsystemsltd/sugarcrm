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



//Workflow Javascript utilities
function get_value(id){
	
	if(this.document.getElementById(id) != undefined){
		if(this.document.getElementById(id).type == 'select-one'){
			if(this.document.getElementById(id).options[0]!=undefined){
				return this.document.getElementById(id).options[document.getElementById(id).selectedIndex].value;
			}
	    }else if(this.document.getElementById(id).type == "select-multiple"){
            return parse_multi_array(this.document.getElementById(id));
		} else {	
			return this.document.getElementById(id).value;
		}
	} else {
		return null;	
	}		
	
		return null;
	
//end function get_value
}	


function get_inner_text(id){
	if(this.document.getElementById(id)!=undefined){
		if(this.document.getElementById(id).type == "select-one"){
			var selected_text = this.document.getElementById(id).options[this.document.getElementById(id).selectedIndex].text;
		}
        else if(this.document.getElementById(id).type == "select-multiple"){
            var selected_text = parse_multi_array_text(this.document.getElementById(id));
		}else{
			var selected_text = this.document.getElementById(id).value;
		}
	} else {
		selected_text = '';
	}		
		return selected_text;
		
//end function get_inner_text
}		


function togglefields(rel_iframe, fields_iframe, base_module){
	var iframe_object = window.frames[rel_iframe].document;
	
	if(iframe_object.getElementById('target_dropdown') != undefined && 
		iframe_object.getElementById('target_dropdown').value !=''
	
	){
		//alert('use_related_module');
		var rel_value = iframe_object.getElementById('target_dropdown').value;
		updatedroplist('fields_iframe', rel_value, 'rel_mod_fields', true);
	} else {
		//alert('use base_module' + get_value(base_module));
		updatedroplist('fields_iframe', get_value(base_module), 'base_fields', true);
	}


	
//end function togglefields
}

function updatedroplist(target_iframe, target_module, iframe_type, grab_field){
	if(grab_field != true ){
		var target_module_value = get_value(target_module);
	} else {
		var target_module_value = target_module;
	}	
		var base_module = get_value('base_module');
	
	
		document.getElementById(target_iframe).src = 'index.php?module=WorkFlow&action=IframeDropdown&to_pdf=true&target_module='+ target_module_value +'&iframe_type=' + iframe_type + '&base_module=' + base_module;
}


function copy_text(target_iframe, target_field){
	var iframe_object = window.frames[target_iframe].document;	
	var inner_text = iframe_object.getElementById('target_dropdown').value;
	var front_text = iframe_object.getElementById('ext1').value;
	var evaluated = false;
	
	if(inner_text=="href_link"){
		var value_type = "href_link";
		var evaluated = true;
	}
	if(inner_text=="invite_link"){
		var value_type = "invite_link";
		var evaluated = true;
	}
	if(evaluated == false){
	
		if(iframe_object.getElementById('ext2').value=='base_fields'){
			var value_type = get_value('value_type');
		} else {
			var value_type = "future";
		}
	//end if else href_link
	}			
	
	var total_text = '{::'+ value_type + '::' + front_text + '::' + inner_text + '::}';
	//alert(total_text);
	this.document.getElementById(target_field).value = total_text;
	
//end function copy_text
}



function get_filter_selector(exp_meta_type, exp_id, lhs_module_id, lhs_field_id, rhs_value_id, operator_id, return_prefix, ext1, parent_type){

	var exp_id = this.document.getElementById(exp_id).value;
	var lhs_module = this.document.getElementById(lhs_module_id).value;
	var lhs_field = this.document.getElementById(lhs_field_id).value;
	var rhs_value = this.document.getElementById(rhs_value_id).value;
	var operator = this.document.getElementById(operator_id).value;
	

	var link_location = "index.php?module=Expressions&action=Filter_Selector&to_pdf=true";
	link_location += '&record=' +exp_id + '&lhs_module=' + lhs_module + '&lhs_field=' + lhs_field;
	link_location += '&rhs_value=' + rhs_value + '&return_prefix=' + return_prefix;
	link_location += '&operator=' + operator + '&exp_meta_type=' + exp_meta_type;
	
	if(ext1!=undefined && ext1!=""){
		var ext1 = this.document.getElementById(ext1).value;
		link_location += '&ext1=' + ext1;
	}
	
	if(parent_type!=undefined && parent_type!=""){
		link_location += '&parent_type=' + parent_type;
	}	
	
	
	
	window.open(link_location, "Test","width=500,height=150,resizable=1,scrollbars=1");	
//end function get_filter_selector
}




///////////////Functions for safety


function confirm_selected_radio(radioObj) {
	var msg = SUGAR.language.get('WorkFlow', 'LBL_SELECT_OPTION');
	
	//var radioObj = document.EditView.user_type;
	if(!radioObj)
		return false;
	var radioLength = radioObj.length;
	if(radioLength == undefined)
		if(radioObj.checked)
			return true;
		else
			return false;
	for(var i = 0; i < radioLength; i++) {
		if(radioObj[i].checked) {
			return true;
		}
	}
	alert(msg);
	return false;
}


function confirm_value_present(target_field, message){
	var select_msg = SUGAR.language.get('WorkFlow', 'LBL_SELECT_VALUE');
	
	if(get_value(target_field)!="" && get_value(target_field)!=undefined){
		return true;	
	} else {
		if(message!=''){
			alert(message);
		} else {	
			alert(select_msg);
		}
		return false;
	}		
}	
	
	
function check_specific_type(type){
	if(type=='rel_user' || type=='rel_user_custom'){
		var msg = SUGAR.language.get('WorkFlow', 'LBL_SELECT_MODULE');
		return confirm_value_present('rel_module1', msg)	
	//end if type is rel_user or rel_user_custom
	}	

	return true;
	
//end function check_specific_type
}	


function clear_field(target_field){
	
	this.document.getElementById(target_field).value = "";	
	
}	



function parse_multi_array(temp_array){
	//var new_field = new_field;
	var temp_array = temp_array;
    var new_value = '';
	for (var i=0, l=temp_array.length;i<l;i++) {
        if (temp_array.options[i].selected){
            if(new_value==''){
            	new_value = temp_array.options[i].value;
            } else {	
            	new_value +='^,^' + temp_array.options[i].value;
            }
        }
    }
    return new_value;
//end function parse_multi_array	
}


function parse_multi_array_text(temp_array){
	//var new_field = new_field;
	var temp_array = temp_array;
    var new_value = '';
	for (var i=0, l=temp_array.length;i<l;i++) {
        if (temp_array.options[i].selected){
            if(new_value==''){
            	new_value = temp_array.options[i].text;
            } else {	
            	new_value +=', ' + temp_array.options[i].text;
            }
        }
    }

    return new_value;
//end function parse_multi_array	
}


function reset_text(form_name){
	
    var formvar = document.getElementById(form_name);

	for(i=0;i < formvar.length;i++){

		if ( formvar.elements[i].name.indexOf("default_href",0) == 0){
			split_array= formvar.elements[i].name.split("default_");
			this.document.getElementById(split_array[1]).innerHTML = get_value(formvar.elements[i].name);
			
		//end if this is an href element
		}

	//looping through form elements	
	}	

//end function reset_text
}	




function setup_radio_selection(radio_object){
	if(!radio_object) return "";
	
	var radioLength = radio_object.length;
	
	if(radioLength == undefined){
		if(radio_object.checked){
			this.document.getElementById('lang_' + radio_object.value).style.display= '';
			var target_value = radio_object.value;
		} else{
			return "";
		}
	}
	
	for(var i = 0; i < radioLength; i++) {

		if(radio_object[i].checked) {
			//alert(radio_object[i].value);
			this.document.getElementById('lang_' + radio_object[i].value).style.display= '';
			var target_value = radio_object[i].value; 
		} else {
			this.document.getElementById('lang_' + radio_object[i].value).style.display= 'none';	
		}	
	}
	
	return target_value;
	
//end function setup_radio_selection
}	


function changehref_text(href_object, selected_text){
	
	this.document.getElementById(href_object).innerHTML = selected_text;
	
//end function changehref_text
}




function getCheckedValue(radioObj) {
	if(!radioObj)
		return "";
	var radioLength = radioObj.length;
	if(radioLength == undefined)
		if(radioObj.checked)
			return radioObj.value;
		else
			return "";
	for(var i = 0; i < radioLength; i++) {
		if(radioObj[i].checked) {
			return radioObj[i].value;
		}
	}
	return "";
}	


function filter_changehref_text(href_object, selected_text){
	this.document.getElementById(href_object).innerHTML = selected_text;
	
//end function changehref_text
}

function hide_target(target){
	if(this.document.getElementById(target)!=undefined){
		this.document.getElementById(target).style.display= 'none';
	}
}

function show_target(target){
	if(this.document.getElementById(target)!=undefined){
		this.document.getElementById(target).style.display= '';
	}
}	
function set_value(target_id, target_value){
	if(this.document.getElementById(target_id)!=undefined){
		this.document.getElementById(target_id).value = target_value;
	}	
}	




///USED FOR ADVANCED / BASIC REL_FILTER BUTTON FUNCTIONALITY		////////

function toggle_set_type(field_num, focus_set_type){
		if(focus_set_type == 'Basic'){
			hide_target('href_set_type_adv');
			show_target('href_set_type_basic');
			set_value(field_num + '__set_type','Basic');
			toggleoptions(field_num, focus_set_type);
		} else {
			hide_target('href_set_type_basic');
			show_target('href_set_type_adv');
			set_value(field_num + '__set_type','Advanced');
			toggleoptions(field_num, focus_set_type);			
		}	
}	

function toggleoptions(field_num, focus_set_type){
	if(get_value(field_num + '__set_type')=='Basic'){
		show_target('basic_options');
		hide_target('adv_options');
	} else{
		hide_target('basic_options');
		show_target('adv_options');
	}	
}	
function toggle_hrefs(set_disabled){

	if(set_disabled=="Yes"){
		hide_target('set_type_hrefs');
	}	
	
}
function reset_rel_filters(){

	this.document.getElementById('rel1_type').value = "all";	
	this.document.getElementById('rel2_type').value = "all";
	toggle_filter('rel1');
	toggle_filter('rel2');
	
}	
function toggle_filter(target){
	if(get_value(target + '_type')=='filter'){
		show_target('lang_' + target);
	} else {
		hide_target('lang_' + target);				
	}
	
//end function toggle_filter	
}

/*
@Used to toggle div in SubPanel from Show to Hide
*/
function toggle_div(id)
{
	var lbl_show = SUGAR.language.get('WorkFlow', 'LBL_SHOW');
	var lbl_hide = SUGAR.language.get('WorkFlow', 'LBL_HIDE');
	var show_img = "<img src='index.php?entryPoint=getImage&themeName="+SUGAR.themes.theme_name+"&imageName=advanced_search.gif' width='8' height='8' alt='" + lbl_show + "' border='0'>";
	var hide_img = "<img src='index.php?entryPoint=getImage&themeName="+SUGAR.themes.theme_name+"&imageName=basic_search.gif' width='8' height='8' alt='" + lbl_hide + "' border='0'>";
	
	var dv = document.getElementById("tbl_"+id);
	var spn = document.getElementById("span_"+id);
	dv.style.display =(dv.style.display == 'none') ? 'block' : 'none';
	
	spn.innerHTML =(dv.style.display == 'none') ? show_img+"&nbsp;" + lbl_show : hide_img+"&nbsp;" + lbl_hide;
}


function safety_rel_filters(){
	var msg = SUGAR.language.get('WorkFlow', 'LBL_SELECT_FILTER');
	if(this.document.getElementById('rel1_type')!=undefined && get_value('rel1_type')=="filter"){
		var rel1_check = confirm_value_present('rel1_operator', msg);	
		if(rel1_check ==false){
			return false;
		}
	//check safety on rel1	
	}
	if(this.document.getElementById('rel2_type')!=undefined && get_value('rel2_type')=="filter"){
		var rel2_check = confirm_value_present('rel2_operator', msg);	
		if(rel2_check ==false){
			return false;
		}	
	//check safety on rel2	
	}		
		
		return true;
	
}

//END USED FOR ADVANCED / BASIC REL_FILTER BUTTON FUNCTIONALITY ///////////
