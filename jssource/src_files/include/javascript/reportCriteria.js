
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


var groups_arr=new Array();
var chartTypesHolder = []; // storage for removed chart items
var groups_count=-1;
var totalSqsEnabledFields = 0;
var filters_arr=new Array();
var filters_count_map=new Object();
var filters_count = -1;
var current_filter_id = -1;
var groups_count_map=new Object();
var current_group_id = -1;
var join_refs = new Array();
var group_field = null;
var has_group = null;
var global_report_def = null;
var goto_anchor = '';
// holds all the fields from current and joined tables
var all_fields = new Object();

var full_table_list = new Object();
full_table_list.self = new Object();
full_table_list.self.parent = '';
//full_table_list.self.value = document.EditView.self.options[document.EditView.self.options.selectedIndex].value;
//full_table_list.self.module = document.EditView.self.options[document.EditView.self.options.selectedIndex].value;
//full_table_list.self.label = document.EditView.self.options[document.EditView.self.options.selectedIndex].text;
full_table_list.self.value = '';
full_table_list.self.module = '';
full_table_list.self.label = '';
full_table_list.self.children = new Object();

function reload_joins() {
	for ( var index in report_def.full_table_list ) {
		var curr_table = report_def.full_table_list[index];
		//var curr_select = document.getElementById(index);
		//curr_select.value = curr_table.value;
		full_table_list[index] = curr_table;
	}
}

function getAllFieldsMapped(module) {
	var all_fields = new Array();
	var summary_fields_str = '';

	for(var k in module_defs[module].field_defs) {
		all_fields["self:"+module_defs[module].field_defs[k].name] = {"field_def": module_defs[module].field_defs[k],"linked_field_name":"self","label_prefix":module_defs[module].label};
	}
	
	for(var k in module_defs[module].summary_field_defs) {
		all_fields["self:"+module_defs[module].summary_field_defs[k].name] = {"field_def": module_defs[module].summary_field_defs[k],"linked_field_name":"self","label_prefix":module_defs[module].label};
			summary_fields_str+='|'+"self:"+module_defs[module].summary_field_defs[k].name;
	}

    // Bug #44880 Grouped fields have to be in module_defs too
    for(var k in module_defs[module].group_by_field_defs)
    {
        if (typeof module_defs[module].group_by_field_defs[k].field_def_name == 'undefined')
        {
            continue;
        }
        var parentName = module_defs[module].group_by_field_defs[k].field_def_name;
        all_fields["self:"+module_defs[module].group_by_field_defs[k].name] = {
            "field_def": module_defs[module].group_by_field_defs[k],
            "linked_field_name":"self",
            "label_prefix":module_defs[module].label
        };
    }

	all_fields["count"] = all_fields["self:count"];

	var link_defs = getSelectedLinkDefs(module);


	for(var i in link_defs) {
		var join_module = getRelatedModule(link_defs[i]);
		if ( typeof(module_defs[join_module]) == 'undefined') {
			continue;
		}
		
		for( var j in module_defs[join_module].field_defs) {
			all_fields[i+":"+module_defs[join_module].field_defs[j].name] = {"field_def": module_defs[join_module].field_defs[j],"linked_field_name":i,"label_prefix":link_defs[i].label};
		}

		for(var j in module_defs[join_module].summary_field_defs) {
			var sum_field_def = module_defs[join_module].summary_field_defs[j];

			// dont include custom fields on the second level.. yet
			if ( typeof( sum_field_def.field_def_name) != 'undefined') {
				var field_def = module_defs[join_module].field_defs[sum_field_def.field_def_name];
				if ( typeof( field_def.custom_type) != 'undefined') {
					continue;
				}
			}
			all_fields[i+":"+module_defs[join_module].summary_field_defs[j].name] ={"field_def": module_defs[join_module].summary_field_defs[j],"linked_field_name":i,"label_prefix":link_defs[i].label};
		}
	}	

	return all_fields;
}

function getSelectedLinkDefs(module) {
	if ( typeof(module) == 'undefined') {
		module = current_module;	
	}
	var new_links = new Object();
	var links = getSelectedLinks()
	
	var type = 'one';
	for (i = 0 ; i < links.length ; i++) {
	//for(var i in  links) {
		if((full_table_list[links[i]] == null) || typeof full_table_list[links[i]].link_def == 'undefined') {
			return new_links;
		}
		var linked_field = full_table_list[links[i]].link_def;
		
		var selected = false;
		var relationship = rel_defs[linked_field['relationship_name']];
		var rel_type = get_rel_type(linked_field,relationship);

		new_links[links[i]] = linked_field;
	}
	return new_links;
}

function get_rel_type(linked_field,relationship) {
	if ( typeof(linked_field['link_type']) != 'undefined') {
		return linked_field['link_type'];
	}

	// code should never get this far.. link_type is already defined 
	
	if ( relationship.relationship_type == 'one-to-many') {
		if (linked_field.bean_is_lhs == true) {
			if ( relationship['lhs_module'] == linked_field['module']) {
				return 'one';
			} 
			else {
				return 'many';
			}
		}
		else {
			if ( relationship['rhs_module'] == linked_field['module']) {
				return 'one';
			}
			else {
				return 'many';
			}
		}
	} 
	
	return 'many';
}

function getRelatedModule(link_def) {
	if(typeof link_def == 'undefined') {
		return;
	}
	var rel_name = link_def.relationship_name;
	var rel_def = rel_defs[rel_name];
	if(typeof(rel_def) == 'undefined') {
		return '';
	}
	if ( link_def.bean_is_lhs ) {
		return rel_def['rhs_module'];
	} 
	else {
		return rel_def['lhs_module'];
	}
}

function getSelectedLinks() {
	var joins_array = new Array();

	for (var index in full_table_list) {
		if ( index == 'self' ) {
			// This is the primary module, we don't want to include it
			continue;
		}
		
		if ( full_table_list[index] != null && full_table_list[index].value != '' ) {
			joins_array.push(index);
		}
	}

	return joins_array;
}


function reload_actual_filters() {
	reload_filters(report_def.filters_def.Filter_1);
} // fn

function reload_filters(filters) {
	var operator = filters.operator;	
	var i = 0;
	while (filters[i]) {
		current_filter = filters[i];
		if (current_filter.operator) {
			reload_filters(current_filter);	
		}
		else {
			current_filter.column_name = getFieldKey(current_filter);
			addFilter(current_filter);
		}
		i++;
	}
			

	/*		
	for(index in report_def.filters_def) {
		report_def.filters_def[index].column_name = getFieldKey(report_def.filters_def[index]);
		addFilter(report_def.filters_def[index]);
	}*/	
}

function getFieldKey(field_def) {
	var func_name = '';
	if (typeof(field_def.group_function) != 'undefined') {
		func_name = field_def.group_function;
	} 
	else if (typeof(field_def.column_function) != 'undefined') {
		func_name = field_def.column_function;
	}

	if ( field_def.group_function == 'count') {
               return 'count';
	}
	else if (! (func_name == 'weighted_amount' || func_name == 'weighted_sum') && func_name != '' ) {
		return field_def.table_key+":"+field_def.name+":"+func_name;
	}
	
	return field_def.table_key+":"+field_def.name;
}

var default_filter = {column_name:'',qualifier_name:'',input_name0:'',input_name1:''};

function addFilter(filter) {
	filters_arr[filters_arr.length] = new Object();
	filters_count++;
	filters_count_map[filters_count] = filters_arr.length - 1;
	current_filter_id = filters_count;
	if ( typeof(filter) == 'undefined') {
		filter = default_filter;
	}

	var the_table = document.getElementById('filters');
	var row = document.createElement('tr');
	filters_arr[filters_count_map[filters_count]].row = row;
	row.valign="top";
	row.id = "rowid" + filters_count;
	filter.id = row.id;

	var module_cell = document.createElement('td');
	module_cell.valign="top";
	row.appendChild(module_cell);
	filters_arr[filters_count_map[filters_count]].module_cell = module_cell;
	addModuleSelectFilter(module_cell,filter, row);

	var column_cell = document.createElement('td');
	column_cell.valign="top";
	row.appendChild(column_cell);
	filters_arr[filters_count_map[filters_count]].column_cell = column_cell;
	addColumnSelectFilter(column_cell,filter, row);

	var qualify_cell = document.createElement('td');
	qualify_cell.valign="top";
	row.appendChild(qualify_cell);
	filters_arr[filters_count_map[filters_count]].qualify_cell = qualify_cell;
	addFilterQualify(qualify_cell,filter, row);

	var input_cell = document.createElement('td');
	input_cell.valign="top";
	row.appendChild(input_cell);
	filters_arr[filters_count_map[filters_count]].input_cell = input_cell;
	addFilterInput(input_cell,filter);

	var cell = document.createElement('td');
	cell.valign="top";
	row.appendChild(cell);

	if (isRuntimeFilter(filter)) {
		//var cell = document.createElement('td');
		//cell.innerHTML = "<h3>Please enter a value as its a runtime data<h3>";
		//row.appendChild(cell);
	} else {
		row.style.display = "none";
	}
	/*
	var cell = document.createElement('td');
	cell.innerHTML = "<input type=button onclick=\"deleteFilter("+filters_count+");\" class=button value="+lbl_remove+">";
	row.appendChild(cell);
	*/

	the_table.appendChild(row);
}

function isRuntimeFilter(filter) {
	if (filter.runtime != null && filter.runtime == '1') {
		return true;
	} else {
		return false;
	} // else
}

function getModuleNaeFromParts(parts) {
	if (parts.length == 0) {
		return parts[0];
	}
	var moduleName = '';
	for (i = 0 ; i < (parts.length - 1) ; i++) {
		if (moduleName != '') {
			moduleName = moduleName + ":";
		} // if
		moduleName = moduleName + parts[i];
	} // for
	return moduleName;
} // fn

function addModuleSelectFilter(cell,filter, row) {
	var select_html_info = new Object();
	var options = new Array();
	var select_info = new Object();
	select_info['name'] = 'filter';
	select_info['onchange'] = 'moduleSelectChanged('+current_filter_id+');';
	select_html_info['select'] = select_info;

	var link_defs = getSelectedLinkDefs();

	var option_info = new Object();
	option_info['value'] = 'self';
	option_info['text'] = module_defs[current_module].label;
	option_info['selected'] = selected;
	options[options.length] = option_info;

	var parts = filter.column_name.split(':');
	var selected_link_name = getModuleNaeFromParts(parts);

	var j=0;
	var selectedValue = 0;
	for(var i in link_defs) {
		var linked_field = link_defs[i];
		var selected = false;
		if ( i == selected_link_name) {
				selected=true;
		} 
		else {
				selected=false;
		}

		// re-selected the remembered select (if there was one)

		var option_info = new Object();
		option_info['value'] = i;
		var label = linked_field['label'];
		if ( i != 'self' ) {
			label = full_table_list[full_table_list[i].parent].label + ' &gt; '+ label;
		}
		option_info['text'] = label;
		option_info['selected'] = selected;
		options[options.length] = option_info;
		j = j + 1;
		if (selected) {
			selectedValue = j;
		} // if
	}

	select_html_info['options'] = options;
	cell.innerHTML=buildSelectHTML(select_html_info, true);
	filters_arr[filters_count_map[current_filter_id]].module_select = cell.getElementsByTagName('select')[0];
	
	var module_text_cell = document.createElement('td');
	module_text_cell.innerHTML = "&nbsp;&nbsp;&nbsp;" + cell.innerHTML + options[selectedValue].text;
	row.appendChild(module_text_cell);
}

function addColumnSelectFilter(cell,filter, row) {
	var select_html_info = new Object();
	var options = new Array();
	var select_info = new Object();
	var field_defs = new Object();
	var selectedLabel = '';

	select_info['name'] = 'filter';
	select_info['onchange'] = 'columnSelectChanged('+current_filter_id+');';
	select_html_info['select'] = select_info;

	var module_select = filters_arr[filters_count_map[current_filter_id]].module_select;
	var table_key = module_select.options[module_select.selectedIndex].value;
	if (table_key == 'self') {
		selected_module = current_module;
		field_defs = module_defs[selected_module].field_defs;
	} 
	else {
		selected_module = table_key;
		var field_defs = module_defs[full_table_list[table_key].module].field_defs;
	}

	var field_defs_arr = getOrderedFieldDefArray(field_defs,true);

	var	selected = false;
	for(var index in field_defs_arr) {
		var field = field_defs_arr[index];
		var key = table_key+":"+field.name;
		if ( typeof(all_fields[key]) == 'undefined') {
			continue;
		}

		if ( field.type  == 'time') {
			continue;
		}

		if ( filter.column_name == key) {
			selected = true;
		} 
		else {
			selected = false;
		}
		var option_info = new Object();
		option_info['value'] = key;
		option_info['text'] = field.vname;
		option_info['selected'] = selected;
		options[options.length] = option_info;
		if (selected) {
			selectedLabel = option_info['text'];
		}
	}

	select_html_info['options'] = options;
	cell.innerHTML=buildSelectHTML(select_html_info, true);
	filters_arr[filters_count_map[current_filter_id]].column_select = cell.getElementsByTagName('select')[0];
	
	var column_text_cell = document.createElement('td');
	column_text_cell.innerHTML = "&nbsp;>&nbsp;" + column_text_cell.innerHTML + selectedLabel;
	row.appendChild(column_text_cell);
	
}

function getOrderedFieldDefArray(field_defs,show_id_field) {
	var field_defs_arr = new Array();
	var id_field = null;

	for(field_name in field_defs) {
		var field = field_defs[field_name];
		field_defs_arr.push(field);
	}
	
	field_defs_arr.sort( _sort_by_field_name);

	if ( id_field  != null && show_id_field ) {
		field_defs_arr.unshift(id_field);
	}
	return field_defs_arr;
}

function addFilterQualify(cell, filter, row) {
	var filter_row = filters_arr[filters_count_map[current_filter_id]];
	var field_key = filter_row.column_select.options[filter_row.column_select.selectedIndex].value;
	var selectedLabel = '';
	var field = new Object();
	if (typeof(field_key) != 'undefined' && field_key != '') {
		field = all_fields[field_key].field_def;	
	}

	var select_html_info = new Object();
	var options = new Array();
	var select_info = new Object();
	select_info['name'] = 'qualify';
	select_info['onchange'] = "filterTypeChanged("+current_filter_id+");";
	select_html_info['select'] = select_info;

	field_type = field.type;

	if ( typeof(field.custom_type) != 'undefined') {
		field_type = field.custom_type;
	}

	var qualifiers = filter_defs[field_type];
	var selected = false;

	for(i=0;i < qualifiers.length; i++) {
		if (qualifiers[i].name == filter.qualifier_name) {
			selected = true;
		}
		else {
			selected = false;
		}
		var option_info = new Object();
		option_info['value'] =  qualifiers[i].name;
		option_info['text'] =  qualifiers[i].value;
		option_info['selected'] = selected;
		options[options.length] = option_info;
		if (selected) {
			selectedLabel = option_info['text'];
		}
	}

	select_html_info['options'] = options;
	cell.innerHTML = "&nbsp;>&nbsp;" + buildSelectHTML(select_html_info, false);

	filter_row['qualify_select'] = cell.getElementsByTagName('select')[0];

	//var filter_text_cell = document.createElement('td');
	//filter_text_cell.innerHTML = "&nbsp;[&nbsp;" + filter_text_cell.innerHTML + selectedLabel + "&nbsp;]&nbsp;&nbsp;";
	//row.appendChild(filter_text_cell);
	
	//cell.innerHTML = "&nbsp;[&nbsp;" + cell.innerHTML + selectedLabel + "&nbsp;]&nbsp;&nbsp;";
}

function filterTypeChanged(index) {
	var filter = {input_name0:''};
	refreshFilterInput(filter,index);
}


function refreshFilterInput(filter,index) {
	current_filter_id = index;
	var filter_row = filters_arr[filters_count_map[index]];

	if (typeof (filter_row.input_field0) != 'undefined' && typeof (filter_row.input_field0.value) != 'undefined') {
		type = "input";
	}

	filter_row.input_cell.removeChild(filter_row.input_cell.firstChild);
	addFilterInput(filter_row.input_cell,filter);
}
function addFilterInput(cell,filter) {
	var filter_row = filters_arr[filters_count_map[current_filter_id]];
	var qualifier_name = filter_row.qualify_select.options[filter_row.qualify_select.selectedIndex].value;
	var module_select = filter_row.module_select;
	var table_key = module_select.options[module_select.selectedIndex].value;
	//filter.table_key = table_key;
	var module_select = filters_arr[filters_count_map[current_filter_id]].module_select;
	var table_key = module_select.options[module_select.selectedIndex].value;
	if (table_key == 'self') {
	    selected_module = current_module;
		var field_defs = module_defs[selected_module].field_defs;
	}
	else {
		selected_module = table_key;
		var field_defs = module_defs[full_table_list[table_key].module].field_defs;
 	}

	if ( typeof ( qualifier_name) == 'undefined' ||  qualifier_name == '') {
		qualifier_name='equals';
	}

	var column_name = filter_row.column_select.options[filter_row.column_select.selectedIndex].value;

	if ( typeof ( column_name) == 'undefined' || column_name == '') {
		column_name='';
	}
	var field = all_fields[column_name].field_def;	

	var field_type = field.type;
	if ( typeof(field.custom_type) != 'undefined') {
		field_type = field.custom_type;
	}
	cell.innerHTML = "<table><tr></tr></table>";

	var row = cell.getElementsByTagName("tr")[0];

	if (qualifier_name == 'between') {
		addFilterInputTextBetween(row,filter);
	} 
	else if (qualifier_name == 'between_dates') {
		addFilterInputDateBetween(row,filter);
	} 
	else if (qualifier_name == 'between_datetimes') {
		addFilterInputDatetimesBetween(row,filter);
	} 
	else if (qualifier_name == 'empty' || qualifier_name == 'not_empty') {
	    addFilterNoInput(row,filter);
 	}
	else if (field_type == 'date' || field_type == 'datetime') {
		if (qualifier_name.indexOf('tp_') == 0) {
			addFilterInputEmpty(row,filter);
		}
		
		else {
			addFilterInputDate(row,filter);
		}
	} 
	else if (field_type == 'datetimecombo') {
		if (qualifier_name.indexOf('tp_') == 0) {
			addFilterInputEmpty(row,filter);
		}
		
		else {
			addFilterInputDatetimecombo(row,filter);
		}
	} 
	else if (field_type == 'id' || field_type == 'name'  || field_type == 'fullname' ) {
		if ( qualifier_name == 'is' || qualifier_name =='is_not') {
			addFilterInputRelate(row,field,filter,false);
		} 
		else {
			addFilterInputText(row,filter);
		}
	} 
	else if (field_type == 'relate'){
		if ( qualifier_name == 'is' || qualifier_name =='is_not') {
			addFilterInputRelate(row,field,filter,true);
		} 
		else {
			addFilterInputText(row,filter);
		}
	}
	else if ((field_type == 'user_name')||(field_type == 'assigned_user_name')) {
		if(users_array=="") {
			loadXML();
		}
		if (qualifier_name == 'one_of' || qualifier_name == 'not_one_of') {
			addFilterInputSelectMultiple(row,users_array,filter);
		}
		else {
			addFilterInputSelectSingle(row,users_array,filter);
		}
	} 
	else if (field_type == 'enum' || field_type == 'multienum' || field_type == 'parent_type') {
		if (qualifier_name == 'one_of' || qualifier_name == 'not_one_of') {
			addFilterInputSelectMultiple(row,field.options,filter);
		}
		else {
			addFilterInputSelectSingle(row,field.options,filter);
		}
	}
	else if (field_type=='bool') {
            var options = ['yes','no'];
            addFilterInputSelectSingle(row,options,filter);
    }
	else {
		addFilterInputText(row,filter);
	}

	return row;
}

function addFilterInputText(row,filter) {
	var cell = document.createElement("td");
	var new_input = document.createElement("input");
	new_input.type="text";
	if ( typeof (filter.input_name0) == 'undefined') {
		filter.input_name0 = '';
	}
	new_input.value=filter.input_name0;
	new_input.name="text_input";
	new_input.size="30";
	new_input.maxsize="255";
	new_input.visible="true";
	cell.appendChild(new_input);
	row.appendChild(cell);
	var filter_row = filters_arr[filters_count_map[current_filter_id]];
	filter_row.input_field0 = new_input;
	filter_row.input_field1 = null;
}


function to_display_date(date_str) {
	var date_arr = date_str.match(/([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})/);
	if ( date_arr != null) {
		var new_date = new String(cal_date_format);
    	new_date = new_date.replace("%Y",date_arr[1]);
    	new_date = new_date.replace("%m",date_arr[2]);
    	new_date = new_date.replace("%d",date_arr[3]);
    	return new_date;
 	} 
 	else {
    	return date_str;
 	}
}

function addFilterInputDate(row,filter) {
	var cell = document.createElement("td");
	cell.setAttribute('valign','middle'); 
	var new_input = document.createElement("input");
	new_input.type="text";

	if ( typeof (filter.input_name0) != 'undefined' && filter.input_name0.length > 0) {
		if (isRuntimeFilter(filter)) {
			filter.input_name0 = to_display_date(filter.input_name0);
		} 
 	}

	new_input.value=filter.input_name0;
	new_input.name="text_input";
	new_input.size="30";
	new_input.maxsize="255";
	new_input.visible="true";
	new_input.setAttribute('id','jscal_field'); 
	cell.appendChild(new_input);
	row.appendChild(cell);

	var cell = document.createElement("td");
	cell.setAttribute('valign','middle'); 
	var img_element = document.createElement("img");
	img_element.setAttribute('src','index.php?entryPoint=getImage&themeName='+SUGAR.themes.theme_name+'&imageName=jscalendar.gif'); 
	img_element.setAttribute('id','jscal_trigger'); 
	cell.appendChild(img_element);
	row.appendChild(cell);
	Calendar.setup ({
		inputFieldObj : new_input , 
		buttonObj : img_element, 
		ifFormat : cal_date_format, 
		showsTime : false, 
		singleClick : true, step : 1,
		weekNumbers:false
	});

	var filter_row = filters_arr[filters_count_map[current_filter_id]];
	filter_row.input_field0 = new_input;
	filter_row.input_field1 = null;
}


function timeValueUpdate(fname){
	var fieldname = 'defaultTime';
	if(fname){
		fieldname =fname;
	}
	
	var timeseparator = ':';
	var newtime = '';
	
	id = fieldname + '_hours';
	h = window.document.getElementById(id).value;
	id = fieldname + '_minutes';
	m = window.document.getElementById(id).value;
	id = fieldname + '_meridiem';
	ampm = document.getElementById(id).value;
	newtime = h + timeseparator + m + ampm;
   
	document.getElementById(fieldname).value = newtime;
}


function newSelectSpanElement(name, inputTime){
			var dname = 'defaultTime';
			if(name){
				dname = name;
			}
			var selectSpan = document.createElement("span");
			var timevalue = "01:00am";
			if( inputTime &&inputTime.match(time_reg_format) != null){
				timevalue = inputTime;
			}
			hrs = parseInt(timevalue.substring(0,2));
			mins = parseInt(timevalue.substring(3,5));
			meridiem = timevalue.substring(5,7);
			
			var text =  '<select tabindex="0" size="1" id="'+dname+'_hours" onchange="timeValueUpdate(\''+dname+'\');">';
			for(i=1; i <= 12; i++) {
			    val = i < 10 ? "0" + i : i;
			    text += '<option value="' + val + '" ' + (i == hrs ? "SELECTED" : "") +  '>' + val + '</option>';
			}
			text += '</select>';
			text += ' : ';
			text += '<select tabindex="0" size="1" id="'+dname+'_minutes" onchange="timeValueUpdate(\''+dname+'\');">';
			text += '\n<option value="00" ' + (mins == 0 ? "SELECTED" : "") + '>00</option>';
			text += '\n<option value="15" ' + (mins == 15 ? "SELECTED" : "") + '>15</option>';
			text += '\n<option value="30" ' + (mins == 30 ? "SELECTED" : "") + '>30</option>';
			text += '\n<option value="45" ' + (mins == 45 ? "SELECTED" : "") + '>45</option>';
			text += '\n</select>';
			text += ' <select tabindex="0" size="1" id="'+dname+'_meridiem" onchange="timeValueUpdate(\''+dname+'\');"> ';
			
			text += '\n<option value="' + "am" + '" ' + (/am/i.test(meridiem) ? "SELECTED" : "") + '>' +  "am"  + '</option>';
			text += '\n<option value="' +"pm"  + '" ' + (/pm/i.test(meridiem) ? "SELECTED" : "") + '>' +  "pm" + '</option>';
			text += '\n</select>';
			text += '<input type="hidden" name="'+dname+'_inputtime" id="'+dname+'" value="'+timevalue+'">';
			selectSpan.innerHTML = text;
			return selectSpan;
}

function addFilterInputDatetimecombo(row, filter) {
		var cellInput = document.createElement("td");
		var new_input = document.createElement("input");
		new_input.type="text";
	
		if ( typeof (filter.input_name0) != 'undefined' && filter.input_name0.length > 0) {
			filter.input_name0 = to_display_date(filter.input_name0);
	 	}
	
		new_input.value=filter.input_name0;
		new_input.name="text_input1";
		new_input.size="13";
		new_input.maxsize="255";
		new_input.visible="true";
		new_input.setAttribute('id','jscal_field'); 
		cellInput.appendChild(new_input);
		
		var img_element = document.createElement("img");
		img_element.setAttribute('src',"index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=jscalendar.gif"); 
		img_element.setAttribute('id','jscal_trigger'); 
		img_element.setAttribute('style', 'vertical-align:bottom;padding-left:3px;padding-right:3px;');
		cellInput.appendChild(img_element);
		Calendar.setup ({
			inputFieldObj : new_input , 
			buttonObj : img_element, 
			ifFormat : cal_date_format, 
			showsTime : false, 
			singleClick : true, step : 1,
			weekNumbers:false
		});
	
		var filter_row = filters_arr[filters_count_map[current_filter_id]];
		filter_row.input_field0 = new_input;
		filter_row.input_field1 = null;
		
		//Append time select area 
		var cellSelect = document.createElement("span");
		cellSelect.appendChild(newSelectSpanElement('ontime', filter.input_name1));
		cellInput.appendChild(cellSelect);
		row.appendChild(cellInput);
}
	
function addFilterNoInput(row,filter) {
	var cell = document.createElement("td");
	cell.setAttribute('valign','middle');
	var new_input = document.createElement("input");
 	new_input.type="hidden";
	new_input.value=filter.qualifier_name;
	new_input.name="text_input";
	cell.appendChild(new_input);
	row.appendChild(cell);
}

function addFilterInputEmpty(row,filter) {
	var cell = document.createElement("td");
	cell.setAttribute('valign','middle'); 
	var new_input = document.createElement("input");
	new_input.type="hidden";
	new_input.value=filter.qualifier_name;
	new_input.name="text_input";
	cell.appendChild(new_input);
	row.appendChild(cell);

	var cell = document.createElement("td");
	row.appendChild(cell);

	var filter_row = filters_arr[filters_count_map[current_filter_id]];
	filter_row.input_field0 = new_input;
	filter_row.input_field1 = null;
}

function addFilterInputSelectMultiple(row,options,filter) {
	var cell = document.createElement('td');
	row.appendChild(cell);

	var select_html_info = new Object();
	var options_arr = new Array();
	var select_info = new Object();
	select_info['size'] = '5';
	select_info['multiple'] = true;
	select_html_info['select'] = select_info;

	var selected_map = new Object();
	for (i=0;i < filter.input_name0.length;i++) {
		selected_map[filter.input_name0[i] ] = 1;
	}

	for(i=0;i < options.length;i++) {
		var option_name;
		var option_value;
		if (typeof(options[i].text) == 'undefined') {
			option_text = options[i];
			option_value = options[i];
		}
		else if (options[i].value == '') {
			continue;
		}
		else {
			option_text = options[i].text;
			option_value = options[i].value;
		}
		if ( typeof( selected_map[option_value]) != 'undefined' ) {
			selected = true;
		}
		else {
			selected = false;
		}
		var option_info = new Object();
		option_info['value'] = option_value;
		option_info['text'] = option_text;
		option_info['selected'] = selected;
		options_arr[options_arr.length] = option_info;
	}

	select_html_info['options'] = options_arr;
	cell.innerHTML=buildSelectHTML(select_html_info)
	var filter_row = filters_arr[filters_count_map[current_filter_id]];
	filter_row.input_field0 = cell.getElementsByTagName('select')[0];
	filter_row.input_field1 = null;
}

function addFilterInputSelectSingle(row,options,filter) {
	var cell = document.createElement('td');
	row.appendChild(cell);

	var select_html_info = new Object();
	var options_arr = new Array();
	var select_info = new Object();
	select_info['name'] = 'input';
	select_html_info['select'] = select_info;

	for(i=0;i < options.length;i++) {
		if (typeof(options[i].text) == 'undefined') {
			option_text = options[i];
			option_value = options[i];
		}
		else if (options[i].value == '') {
			continue;
		}
		else {
			option_text = options[i].text;
			option_value = options[i].value;
		}

		if ((option_value == filter.input_name0)
			|| (filter.name == 'user_name')
				&& (filter.input_name0 == 'Current User')
				&& (option_value == current_user_id)
			) {
			selected = true;
		}
		else {
			selected = false;
		}
		var option_info = new Object();
		option_info['value'] = option_value;
		option_info['text'] = option_text;
		option_info['selected'] = selected;
		options_arr[options_arr.length] = option_info;
	}
	select_html_info['options'] = options_arr;
	cell.innerHTML=buildSelectHTML(select_html_info);
	var filter_row = filters_arr[filters_count_map[current_filter_id]];
	filter_row.input_field0 = cell.getElementsByTagName('select')[0];
	filter_row.input_field1 = null;
}


function addFilterInputTextBetween(row,filter) {
	var filter_row = filters_arr[filters_count_map[current_filter_id]];

	var cell = document.createElement('td');
	var new_input = document.createElement("input");
	new_input.type="text";
	if (typeof(filter.input_name0) == 'undefined') {
		filter.input_name0 = '';
	}

	new_input.value=filter.input_name0;
	cell.appendChild(new_input);
	row.appendChild(cell);
	filter_row.input_field0 = new_input;
	
	var cell = document.createElement('td');
	var new_text = document.createTextNode(lbl_and);
	cell.appendChild(new_text);
	row.appendChild(cell);

	var cell = document.createElement('td');
	var new_input = document.createElement("input");
	new_input.type="text";
	if (typeof(filter.input_name1) == 'undefined') {
		filter.input_name1 = '';
	}

	new_input.value=filter.input_name1;
	cell.appendChild(new_input);
	row.appendChild(cell);
	filter_row.input_field1 = new_input;
}

function addFilterInputDateBetween(row,filter) {
	var filter_row = filters_arr[filters_count_map[current_filter_id]];

	var cell = document.createElement("td");
	cell.setAttribute('valign','middle'); 
	var new_input = document.createElement("input");
	new_input.type="text";
	if (typeof(filter.input_name0) == 'undefined') {
		filter.input_name0 = '';
	}
	
	if (isRuntimeFilter(filter)) {
		filter.input_name0 = to_display_date(filter.input_name0);
	}
	new_input.value=filter.input_name0;
	new_input.name="text_input";
	new_input.size="12";
	new_input.maxsize="255";
	new_input.visible="true";
	new_input.setAttribute('id','jscal_field'); 
	cell.appendChild(new_input);
	row.appendChild(cell);
	filter_row.input_field1 = new_input;

	var cell = document.createElement("td");
	cell.setAttribute('valign','middle'); 
	var img_element = document.createElement("img");
	img_element.setAttribute('src','index.php?entryPoint=getImage&themeName='+SUGAR.themes.theme_name+'&imageName=jscalendar.gif'); 
	img_element.setAttribute('id','jscal_trigger'); 
	cell.appendChild(img_element);
	row.appendChild(cell);

	Calendar.setup ({ 
		inputFieldObj : new_input , 
		buttonObj : img_element, 	
		ifFormat : cal_date_format, 
		showsTime : false, 
		singleClick : true,
		weekNumbers:false,
		step : 1 });

    var cell = document.createElement('td');
	cell.setAttribute('valign','middle'); 
    var new_text = document.createTextNode(lbl_and);
    cell.appendChild(new_text);
    row.appendChild(cell);

	var cell = document.createElement("td");
	cell.setAttribute('valign','middle'); 
	var new_input = document.createElement("input");
	new_input.type="text";
	if (typeof(filter.input_name1) == 'undefined') {
		filter.input_name1 = '';
	}
	if (isRuntimeFilter(filter)) {
		filter.input_name1 = to_display_date(filter.input_name1);
	}
	new_input.value=filter.input_name1;
	new_input.name="text_input";
	new_input.size="12";
	new_input.maxsize="255";
	new_input.visible="true";
	new_input.setAttribute('id','jscal_field2'); 
	cell.appendChild(new_input);
	row.appendChild(cell);
	filter_row.input_field1 = new_input;

	var cell = document.createElement("td");
	var img_element = document.createElement("img");
	img_element.setAttribute('src','index.php?entryPoint=getImage&themeName='+SUGAR.themes.theme_name+'&imageName=jscalendar.gif'); 
	img_element.setAttribute('id','jscal_trigger2'); 
	cell.appendChild(img_element);
	row.appendChild(cell);
	Calendar.setup ({ 
		inputFieldObj : new_input , 
		buttonObj : img_element, 	
		ifFormat : cal_date_format, 
		showsTime : false, 
		singleClick : true,
		weekNumbers:false,
		step : 1 });
}

function addFilterInputDatetimesBetween(row,filter) {
		var filter_row = filters_arr[filters_count_map[current_filter_id]];
		
		var cell = document.createElement("td");
		cell.setAttribute('valign','middle'); 
		var div1 = document.createElement('div');
		var new_input = document.createElement("input");
		new_input.type="text";
		if (typeof(filter.input_name0) == 'undefined') {
			filter.input_name0 = '';
		}
		
		filter.input_name0 = to_display_date(filter.input_name0);
		new_input.value=filter.input_name0;
		new_input.name="text_input";
		new_input.size="12";
		new_input.maxsize="255";
		new_input.visible="true";
		new_input.setAttribute('id','jscal_field'); 
		div1.appendChild(new_input);
		filter_row.input_field1 = new_input;
	
		var img_element = document.createElement("img");
		img_element.setAttribute('src',"index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=jscalendar.gif"); 
		img_element.setAttribute('id','jscal_trigger'); 
		img_element.setAttribute('style', 'vertical-align:bottom;padding-left:3px;padding-right:3px;');
		div1.appendChild(img_element);
		div1.appendChild(this.newSelectSpanElement('namestart', filter.input_name1));
		cell.appendChild(div1);
		
		Calendar.setup ({ 
			inputFieldObj : new_input , 
			buttonObj : img_element, 	
			ifFormat : cal_date_format, 
			showsTime : false, 
			singleClick : true,
			weekNumbers:false,
			step : 1 });
	
	    var div2 = document.createElement('div');
	    var new_text = document.createTextNode(lbl_and);
	    div2.appendChild(new_text);
	    cell.appendChild(div2);
	
		var div3 = document.createElement('div');
		var new_input = document.createElement("input");
		new_input.type="text";
		if (typeof(filter.input_name2) == 'undefined') {
			filter.input_name2 = '';
		}
		filter.input_name2 = to_display_date(filter.input_name2);
		new_input.value=filter.input_name2;
		new_input.name="text_input";
		new_input.size="12";
		new_input.maxsize="255";
		new_input.visible="true";
		new_input.setAttribute('id','jscal_field2'); 
		div3.appendChild(new_input);
		filter_row.input_field1 = new_input;
	
		var img_element = document.createElement("img");
		img_element.setAttribute('src',"index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=jscalendar.gif"); 
		img_element.setAttribute('id','jscal_trigger2'); 
		img_element.setAttribute('style', 'vertical-align:bottom;padding-left:3px;padding-right:3px;');
		div3.appendChild(img_element);
		Calendar.setup ({ 
			inputFieldObj : new_input , 
			buttonObj : img_element, 	
			ifFormat : cal_date_format, 
			showsTime : false, 
			singleClick : true,
			weekNumbers:false,
			step : 1 });
		div3.appendChild(this.newSelectSpanElement('nameend', filter.input_name3));
		cell.appendChild(div3);
		row.appendChild(cell);
		
	}
		
function addFilterInputRelate(row,field,filter,isCustom) {
	totalSqsEnabledFields++;
	var filter_row = filters_arr[filters_count_map[current_filter_id]];
	if (!isCustom) {
		var module_name=getModuleInFilter(filter_row);
		var field_name= module_name+":"+field.name;
	}
	else {
		var module_name = field.ext2;
		var field_name = field.name;
	}
	var field_id_name= module_name+":"+field.name+":id:"+ totalSqsEnabledFields;
	var field_name_name= module_name+":"+field.name+":name:"+totalSqsEnabledFields;	

	var cell = document.createElement('td');
	var id_input = document.createElement("input");
	id_input.setAttribute('type','hidden');
	id_input.setAttribute("name", field_id_name);
	id_input.setAttribute("id", field_id_name);
	if ( typeof (filter.input_name0) == 'undefined') {
		filter.input_name0 = '';
	}
	id_input.setAttribute("value",filter.input_name0); 
	cell.appendChild(id_input);
	filter_row.input_field0 = id_input;

	var name_input = document.createElement("input");
	name_input.setAttribute("type","text"); 
	//name_input.setAttribute("readonly","true"); 
	name_input.setAttribute("name", field_name_name);
	name_input.setAttribute("id", field_name_name);
	name_input.setAttribute("class", "sqsEnabled");
	name_input.setAttribute("autocomplete", "off");	
	
	if ( typeof (filter.input_name1) == 'undefined') {
		filter.input_name1= '';
	}
	name_input.setAttribute("value",filter.input_name1); 
	cell.appendChild(name_input);
	filter_row.input_field1 = name_input;

	row.appendChild(cell);

	var cell = document.createElement('td');
	var new_input = document.createElement("input");
	new_input.title= lbl_select;
//	new_input.accessKey="G";
	new_input.type="button";
	new_input.value=lbl_select; 
	new_input.name=field.module;
	new_input.setAttribute("class","button"); 
	new_input.onclick= function () { 	        
		current_parent = name_input; 	 
		current_parent_id = id_input; 	 
		return	open_popup(module_name, 600, 400, "", true, false, { "call_back_function":"set_form_return_reports", "form_name":"EditView", "field_to_name_array":{ "id":"id", "name":"name" } });
	}

	cell.appendChild(new_input);

	row.appendChild(cell);
	
	var sqs_field_name = 'EditView_' + field_name_name;

	var callback = {
		success:function(o){
			if(typeof sqs_objects == 'undefined')
				sqs_objects = new Array();
			eval(o.responseText);
			var populate_list = new Array();
			populate_list.push(field_name_name);
			populate_list.push(field_id_name);
			sqs_objects[sqs_field_name]['populate_list']=populate_list;
			enableQS(false);
		},
		failure: function(o){}
	}
	var postData = '&module=Reports&action=get_quicksearch_defaults&to_pdf=true&sugar_body_only=true&parent_form=EditView&parent_module='+ module_name+'&parent_field='+sqs_field_name;
	YAHOO.util.Connect.asyncRequest("POST", "index.php", callback, postData);	
}
/*
function addFilterInputRelateType(row,field,filter) {
	var filter_row = filters_arr[filters_count_map[current_filter_id]];
	var module_name = field.ext2;
	var field_name = field.name;
	var field_id_name= module_name+":"+field.name+":id";

	var cell = document.createElement('td');
	var id_input = document.createElement("input");
	id_input.setAttribute('type','hidden');
	id_input.setAttribute("name", field_id_name);
	id_input.setAttribute("id", field_id_name);
	if ( typeof (filter.input_name0) == 'undefined') {
		filter.input_name0 = '';
	}
	id_input.setAttribute("value",filter.input_name0); 
	cell.appendChild(id_input);
	filter_row.input_field0 = id_input;

	var name_input = document.createElement("input");
	name_input.setAttribute("type","text"); 
	name_input.setAttribute("readonly","true"); 
	name_input.setAttribute("name", field_name);
	name_input.setAttribute("id", field_name);
	if ( typeof (filter.input_name1) == 'undefined') {
		filter.input_name1= '';
	}
	name_input.setAttribute("value",filter.input_name1); 
	cell.appendChild(name_input);
	filter_row.input_field1 = name_input;

	row.appendChild(cell);

	var cell = document.createElement('td');
	var new_input = document.createElement("input");
	new_input.title= lbl_select;
	new_input.accessKey="G";
	new_input.type="button";
	new_input.value=lbl_select; 
	new_input.name=field.module;
	new_input.setAttribute("class","button"); 
	new_input.onclick= function () { 	        
		current_parent = name_input; 	 
		current_parent_id = id_input; 	 
		return	open_popup(module_name, 600, 400, "", true, false, { "call_back_function":"set_form_return_reports", "form_name":"EditView", "field_to_name_array":{ "id":"id", "name":"name" } });
	}

	cell.appendChild(new_input);

	row.appendChild(cell);
}		
*/
function set_form_return_reports(popup_reply_data) {
	var form_name = popup_reply_data.form_name;
	var name_to_value_array = popup_reply_data.name_to_value_array;
	var passthru_data = popup_reply_data.passthru_data;
 	current_parent_id.value = name_to_value_array['id'];
 	if (name_to_value_array['name'] == 'undefined')
	 	current_parent.value = name_to_value_array['id'];
	else
	 	current_parent.value = name_to_value_array['name'];
}

function getModuleInFilter(filter) {
	// select the first one if first time load
	var selected_module = current_module;
	//current_prefix = module_defs[selected_module].label;
	current_prefix = 'self';
	var view_join = filter.module_cell.getElementsByTagName('select')[0];
	var selected_option = view_join.options[view_join.selectedIndex].value;
	if ( selected_option != 'self') {
		selected_module = full_table_list[selected_option].module;
	} 

	return selected_module;
}
//builds the html for a select 
function buildSelectHTML(info, showHidden, id,onBlur) {
	var text;
	text = "<select";
	if (onBlur)
		text +=	" onBlur="+onBlur;
	if (id)
		text += " id="+id;
	if (showHidden != null && showHidden) {
		text = text + " style='display:none'";
		//text = text + " disabled";
	}
       
	for(var key in info['select']) {
		if ( typeof (info['select'][key]) != 'undefined') {
			text +=" "+ key +"=\""+ info['select'][key] +"\"";
		}
	}
	text +=">";
	
	var saved_attrs = new Array();

	for(i=0; i < info['options'].length; i++) {
		option = info['options'][i];
		var attr = new Object();
		for( var j in option ) {
            if ( j != 'text' &&  j != 'value' && j != 'selected' && j != 'name' && j != 'id') {
				attr[j] = option[j];
            }
		}
		saved_attrs.push(attr);
		text += "<option value=\""+encodeURI(option['value'])+"\" ";

		if ( typeof (option['selected']) != 'undefined' && option['selected']== true) {
			text += "SELECTED";
		}
		text += ">"+option['text']+"</option>";
	}
	text += "</select>";
	return text;
}

function _sort_by_field_name(a,b) {
	if ( typeof(a['vname']) == 'undefined') {
		a['vname'] = a['name'];
	} 
	else if ( typeof(b['vname']) == 'undefined') {
		b['vname'] = b['name'];
	}
	
	if ( a['type'] == 'name' ||  a['type'] == 'user_name' ) {
		return -1;
	} 
	else if ( b['type'] == 'name' ||  b['type'] == 'user_name' ) {
		return 1;
	} 
	else { 
		return a['vname'].localeCompare( b['vname']);
	}
}

function save_filters(filters, returnObject) {
	var operator = filters.operator;	
	var i = 0;
	while (filters[i]) {
		current_filter = filters[i];
		if (current_filter.operator) {
			save_filters(current_filter, returnObject);	
		}
		else {
			validateFilterRow(current_filter, returnObject);
		}
		i++;
	}
			

	/*		
	for(index in report_def.filters_def) {
		report_def.filters_def[index].column_name = getFieldKey(report_def.filters_def[index]);
		addFilter(report_def.filters_def[index]);
	}*/	
}

function validateFilterRow(filter, returnObject) {
	if (filter != null && filter.runtime != null && filter.runtime == 1) {
		var row = document.getElementById(filter.id);
		var cell0 = row.cells[2];
		var cell1 = row.cells[4];
		var cell2 = row.cells[5];		

		var column_name = cell0.getElementsByTagName('select')[0].value;
		//var filter_def = new Object();
		var field = all_fields[column_name].field_def;
		filter.name = field.name;
		filter.table_key = all_fields[column_name].linked_field_name;

		column_vname = all_fields[column_name].label_prefix+": "+ field['vname'];
		filter.qualifier_name=cell1.getElementsByTagName('select')[0].value;
		var input_arr = cell2.getElementsByTagName('input');
	
		if ( typeof(input_arr[0]) !=  'undefined') {
			filter.input_name0=input_arr[0].value;
			if (input_arr[0].value == '') {
				returnObject.got_error = 1;
				returnObject.error_msgs += "\""+column_vname+"\""+lbl_missing_input_value+"\n";
			}
	
			if ( typeof(input_arr[1]) != 'undefined') {
				filter.input_name1=input_arr[1].value;
				if (input_arr[1].value == '') {
					returnObject.got_error = 1;
					returnObject.error_msgs += "\"" + column_vname + "\""+lbl_missing_second_input_value+"\n";
				}
			}
			
			if(field.type=='datetimecombo'){
				if( typeof(input_arr[2]) != 'undefined'){
					filter.input_name2=input_arr[2].value;
					if (input_arr[2].value == '' && input_arr[2].type != 'checkbox') {
						got_error = 1;
						error_msgs += "\"" + column_vname + "\" "+lbl_missing_input_value+"\n";
					}
				}
				if( typeof(input_arr[3]) != 'undefined'){
					filter.input_name3=input_arr[3].value;
					if (input_arr[3].value == '' && input_arr[3].type != 'checkbox') {
						got_error = 1;
						error_msgs += "\"" + column_vname + "\" "+lbl_missing_input_value+"\n";
					}
				}
				if( typeof(input_arr[4]) != 'undefined'){
					filter.input_name4=input_arr[4].value;
					if (input_arr[4].value == '' && input_arr[4].type != 'checkbox') {
						got_error = 1;
						error_msgs += "\"" + column_vname + "\" "+lbl_missing_input_value+"\n";
					}
				}
			}
		} 
		else {
			var got_selected = 0;
			var select_input = cell2.getElementsByTagName('select')[0];
			filter.input_name0= new Array();
			for (j=0;j<select_input.options.length;j++) {
				if (select_input.options[j].selected == true) {
					filter.input_name0.push(decodeURI(select_input.options[j].value));
					got_selected = 1;
				}
			}
			if (got_selected==0) {
				returnObject.error_msgs += "\"" +column_vname +"\": "+lbl_missing_second_input_value+"\n";
				returnObject.got_error = 1;
			}
		}
 		if ( field.type == 'datetime' || field.type == 'date') {
			if ( typeof(filter.input_name0) != 'undefined' && typeof(filter.input_name0) != 'array') {
				var date_match = filter.input_name0.match(date_reg_format);
				if ( date_match != null) {
					filter.input_name0 = date_match[date_reg_positions['Y']] + "-"+date_match[date_reg_positions['m']] + "-"+date_match[date_reg_positions['d']];
				}
			}			
			if ( typeof(filter.input_name1) != 'undefined' && typeof(filter.input_name1) != 'array') {
				var date_match = filter.input_name1.match(date_reg_format);
				if ( date_match != null) {
					filter.input_name1 = date_match[date_reg_positions['Y']] + "-"+date_match[date_reg_positions['m']] + "-"+date_match[date_reg_positions['d']];
				} // if
			} // if			
		} // if	
		else if ( field.type == 'datetimecombo') {
			if ( (typeof(filter.input_name0) != 'undefined' && typeof(filter.input_name0) != 'array') && (typeof(filter.input_name1) != 'undefined' && typeof(filter.input_name1) != 'array')) {
				var date_match = filter.input_name0.match(date_reg_format);
				var time_match = filter.input_name1.match(time_reg_format);
				if ( date_match != null && time_match != null) {
					filter.input_name0 = date_match[date_reg_positions['Y']] + "-"+date_match[date_reg_positions['m']] + "-"+date_match[date_reg_positions['d']] + ' '+ filter.input_name1;
				}
			}			
			if ( typeof(filter.input_name2) != 'undefined' && typeof(filter.input_name2) != 'array' && typeof(filter.input_name3) != 'undefined' && typeof(filter.input_name3) != 'array') {
				var date_match = filter.input_name2.match(date_reg_format);
				var time_match = filter.input_name3.match(time_reg_format);
				if ( date_match != null && time_match != null) {
					filter.input_name2 = date_match[date_reg_positions['Y']] + "-"+date_match[date_reg_positions['m']] + "-"+date_match[date_reg_positions['d']] + ' '+ filter.input_name3;
				}
			}			
		}			
	} // if
} // fn

// called on save:
function fill_form(type) {
	var report_def_1 = new Object();
	var form_obj = document.EditView;
	
  // we want an export of csv:
	if ( typeof (type) != 'undefined' && type == 'export') {
		form_obj.to_pdf.value = '';
		form_obj.to_csv.value = 'on';
	}
	var got_sort = 1;
	if (form_obj.sort_by.value == "") {
		got_sort = 0;
	} // if
	var got_summary_sort = 1;
	if (form_obj.summary_sort_by.value == "") {
		got_summary_sort = 0;
	} // if
	var got_summary_column = 0;
	var got_error = 0;
	var error_msgs =  lbl_missing_fields+': \n';
	// set sorting
	var sort_by = new Array();
	var summary_sort_by = new Array();
	var sort_dir = new Array();
	var summary_sort_dir = new Array();

	if (got_sort == 0 ) {
		form_obj.sort_by.value = '';
		form_obj.sort_dir.value = '';
	}
	else {
		var sort_by_elem = new Object();
		var sort_by_elem = getListFieldDef(form_obj.sort_by.value);

		sort_by_elem.sort_dir = form_obj.sort_dir.value;
		sort_by.push(sort_by_elem);

		report_def_1.order_by = sort_by;
	}
	
	if (got_summary_sort == 0) {
		form_obj.summary_sort_by.value = '';
		form_obj.summary_sort_dir.value = '';
	} 
	else {
		var summary_sort_by_elem = new Object();
		var key_arr = form_obj.summary_sort_by.value.split(':');

		if ( typeof(all_fields[ form_obj.summary_sort_by.value ].field_def.group_function) != 'undefined') {
			summary_sort_by_elem.name = all_fields[ form_obj.summary_sort_by.value ].field_def.field_def_name;
			summary_sort_by_elem.group_function = all_fields[ form_obj.summary_sort_by.value ].field_def.group_function;
			summary_sort_by_elem.column_function = key_arr[2];
			summary_sort_by_elem.table_key = all_fields[ form_obj.summary_sort_by.value ].linked_field_name;
		} 
		else if ( typeof(all_fields[ form_obj.summary_sort_by.value ].field_def.column_function) != 'undefined') {
			summary_sort_by_elem.name = all_fields[ form_obj.summary_sort_by.value ].field_def.field_def_name;
			summary_sort_by_elem.group_function = all_fields[ form_obj.summary_sort_by.value ].field_def.column_function;
			summary_sort_by_elem.column_function = key_arr[2];
			summary_sort_by_elem.table_key = all_fields[ form_obj.summary_sort_by.value ].linked_field_name;
		}
		else {
			summary_sort_by_elem = getListFieldDef(form_obj.summary_sort_by.value);
		}
		summary_sort_by_elem.sort_dir = form_obj.summary_sort_dir.value;
		summary_sort_by.push(summary_sort_by_elem);
		report_def_1.summary_order_by = summary_sort_by;
	}

	// create a copy of the report filter object;
	var filter_def = YAHOO.lang.JSON.stringify(report_def.filters_def);
	filter_def = YAHOO.lang.JSON.parse(filter_def);
	var returnObject = new Object();
	returnObject['got_error'] = got_error;
	returnObject['error_msgs'] = error_msgs;
	save_filters(filter_def.Filter_1, returnObject);
	if (returnObject.got_error == 1) {
		alert(returnObject.error_msgs);
		return false;
	} // if
	report_def_1.filters_def = filter_def;
	report_def_str = YAHOO.lang.JSON.stringify(report_def_1);
	form_obj.report_def.value = report_def_str;

	return true;
	/*
	var filter_table = document.getElementById('filters');
	var filters_def = new Array();

	for(i=0; i < filter_table.rows.length;i++) {
		// the module select is the first cell.. we dont need that
		var cell0 = filter_table.rows[i].cells[2];
		var cell1 = filter_table.rows[i].cells[4];
		var cell2 = filter_table.rows[i].cells[6];
	
		var column_name = cell0.getElementsByTagName('select')[0].value;
		var filter_def = new Object();
		var field = all_fields[column_name].field_def;	
		filter_def.name = field.name;
		filter_def.table_key = all_fields[column_name].linked_field_name;

		column_vname = all_fields[column_name].label_prefix+": "+ field['vname'];
		filter_def.qualifier_name=cell1.getElementsByTagName('select')[0].value;
		var input_arr = cell2.getElementsByTagName('input');

		if ( typeof(input_arr[0]) !=  'undefined') {
			filter_def.input_name0=input_arr[0].value;
			if (input_arr[0].value == '') {
				got_error = 1;
				error_msgs += "\""+column_vname+"\""+lbl_missing_input_value+"\n";
			}
	
			if ( typeof(input_arr[1]) != 'undefined') {
				filter_def.input_name1=input_arr[1].value;
				if (input_arr[1].value == '') {
					got_error = 1;
					error_msgs += "\"" + column_vname + "\""+lbl_missing_second_input_value+"\n";
				}
			}
		} 
		else {
			var got_selected = 0;
			var select_input = cell2.getElementsByTagName('select')[0];
			filter_def.input_name0= new Array();
			for (j=0;j<select_input.options.length;j++) {
				if (select_input.options[j].selected == true) {
					filter_def.input_name0.push(decodeURI(select_input.options[j].value));
					got_selected = 1;
				}
			}
			if (got_selected==0) {
				error_msgs += "\"" +column_vname +"\": "+lbl_missing_second_input_value+"\n";
				got_error = 1;
			}
		}

 		if ( field.type == 'datetime' || field.type == 'date') {
			if ( typeof(filter_def.input_name0) != 'undefined' && typeof(filter_def.input_name0) != 'array') {
				var date_match = filter_def.input_name0.match(date_reg_format);
				if ( date_match != null) {
					filter_def.input_name0 = date_match[date_reg_positions['Y']] + "-"+date_match[date_reg_positions['m']] + "-"+date_match[date_reg_positions['d']];
				}
			}			
			if ( typeof(filter_def.input_name1) != 'undefined' && typeof(filter_def.input_name1) != 'array') {
				var date_match = filter_def.input_name1.match(date_reg_format);
				if ( date_match != null) {
					filter_def.input_name1 = date_match[date_reg_positions['Y']] + "-"+date_match[date_reg_positions['m']] + "-"+date_match[date_reg_positions['d']];
				}
			}			
		}
		if (filter_table.rows[i].style.display != 'none') {
			filter_def.runtime = 1;
		}		
		filters_def.push(filter_def);
	}

	if (got_error == 1) {
		alert(error_msgs);
		return false;
	}
	
	report_def.filters_def = filters_def;
	
	//return false;

	report_def_str = YAHOO.lang.JSON.stringify(report_def);
	form_obj.report_def.value = report_def_str;

	return true;
	*/
}

function do_export() {
	if ( fill_form('export') == true) {
		document.EditView.submit();
	}
}

function set_sort(column_name,source) {
	if ( source == 'undefined') {
		source = 'columns';
	}

	var sort_by = 'sort_by';	
	var sort_dir = 'sort_dir';	
	if ( source == 'summary') {
		sort_by = 'summary_sort_by';	
		sort_dir = 'summary_sort_dir';	
	}

	if (column_name == document.EditView[sort_by].value) {
		if (  document.EditView[sort_dir].value=="d") {
			document.EditView[sort_dir].value = "a";
		}
		else {
			document.EditView[sort_dir].value = "d";
		}
	}
	else {
		document.EditView[sort_by].value = column_name;
		document.EditView[sort_dir].value = "a";
	}
	document.EditView.to_pdf.value='';
	document.EditView.to_csv.value='';
	document.EditView['report_offset'].value=0;
	if ( fill_form() == true) {
		document.EditView.submit();
	}
}

function set_offset(offset) {
	document.EditView['report_offset'].value=offset;
	document.EditView.to_pdf.value='';
	document.EditView.to_csv.value='';
	if ( fill_form() == true) {
		document.EditView.submit();
	}
	
}

function getReportType() {
	for (i=0;i < document.EditView.report_type.length;i++) {
		if ( document.EditView.report_type[i].checked == true) {
			return document.EditView.report_type[i].value;
		}
	}
}

function getListFieldDef(field_key) {
	var field_def = new Object();

	var vardef =  all_fields[field_key].field_def;
	if ( typeof(vardef.field_def_name) != 'undefined') {
		field_def.name = vardef['field_def_name'];
	}
	else {
		field_def.name = vardef['name'];
	}
	
	field_def.label = vardef['vname'];
	
	if ( typeof(vardef.group_function) != 'undefined' && vardef.group_function != null) {
		field_def.group_function = vardef.group_function;
	}
	if ( typeof(vardef.column_function) != 'undefined' && vardef.column_function != null) {
		field_def.column_function = vardef.column_function;
	}
	field_def.table_key = all_fields[field_key].linked_field_name;
	return field_def;
}

function showDuplicateOverlib(reportType, canCovertToMatrix) {
	if (reportType == 'tabular') {
		var menu = '<a style=\'width: 150px\' class=\'menuItem\' onmouseover=\'hiliteItem(this,"yes");\' ' +
				   'onmouseout=\'unhiliteItem(this);\' ' +
				   'onclick=\'document.EditView.to_pdf.value=\"\";document.EditView.to_csv.value=\"\";document.EditView.action.value=\"ReportsWizard\";document.EditView.save_as.value=\"true\";' +
						'document.EditView.submit();\' href=\'#\'>' + SUGAR.language.get('Reports', 'LBL_DUPLICATE_AS_ORIGINAL') + '</a>' +
				   '<a style=\'width: 150px\' class=\'menuItem\' onmouseover=\'hiliteItem(this,"yes");\' ' +
				   'onmouseout=\'unhiliteItem(this);\' ' +
				   'onclick=\'document.EditView.to_pdf.value=\"\";document.EditView.to_csv.value=\"\";document.EditView.action.value=\"ReportsWizard\";document.EditView.save_as.value=\"true\";' +
						'document.EditView.save_as_report_type.value=\"summation\";document.EditView.submit();\' href=\'#\'>' + SUGAR.language.get('Reports', 'LBL_DUPLICATE_AS_SUMMATON') + '</a>' +
				   '<a style=\'width: 150px\' class=\'menuItem\' onmouseover=\'hiliteItem(this,"yes");\' ' +
				   'onmouseout=\'unhiliteItem(this);\' ' +
				   'onclick=\'document.EditView.to_pdf.value=\"\";document.EditView.to_csv.value=\"\";document.EditView.action.value=\"ReportsWizard\";document.EditView.save_as.value=\"true\";' +
						'document.EditView.save_as_report_type.value=\"summation_with_details\";document.EditView.submit();\' href=\'#\'>' + SUGAR.language.get('Reports', 'LBL_DUPLICATE_AS_SUMMATION_DETAILS') + '</a>' +
				   '<a style=\'width: 150px\' class=\'menuItem\' onmouseover=\'hiliteItem(this,"yes");\' ' +
				   'onmouseout=\'unhiliteItem(this);\' ' +
				   'onclick=\'document.EditView.to_pdf.value=\"\";document.EditView.to_csv.value=\"\";document.EditView.action.value=\"ReportsWizard\";document.EditView.save_as.value=\"true\";' +
						'document.EditView.save_as_report_type.value=\"matrix\";document.EditView.submit();\' href=\'#\'>' + SUGAR.language.get('Reports', 'LBL_DUPLICATE_AS_MATRIX') + '</a>';
	}
	else if (reportType == 'summation_with_details') {
		var menu = '<a style=\'width: 150px\' class=\'menuItem\' onmouseover=\'hiliteItem(this,"yes");\' ' +
				   'onmouseout=\'unhiliteItem(this);\' ' +
				   'onclick=\'document.EditView.to_pdf.value=\"\";document.EditView.to_csv.value=\"\";document.EditView.action.value=\"ReportsWizard\";document.EditView.save_as.value=\"true\";' +
						'document.EditView.submit();\' href=\'#\'>' + SUGAR.language.get('Reports', 'LBL_DUPLICATE_AS_ORIGINAL') + '</a>' +
				   '<a style=\'width: 150px\' class=\'menuItem\' onmouseover=\'hiliteItem(this,"yes");\' ' +
				   'onmouseout=\'unhiliteItem(this);\' ' +
				   'onclick=\'document.EditView.to_pdf.value=\"\";document.EditView.to_csv.value=\"\";document.EditView.action.value=\"ReportsWizard\";document.EditView.save_as.value=\"true\";' +
						'document.EditView.save_as_report_type.value=\"summation\";document.EditView.submit();\' href=\'#\'>' + SUGAR.language.get('Reports', 'LBL_DUPLICATE_AS_SUMMATON') + '</a>' +
				   '<a style=\'width: 150px\' class=\'menuItem\' onmouseover=\'hiliteItem(this,"yes");\' ' +
				   'onmouseout=\'unhiliteItem(this);\' ' +
				   'onclick=\'document.EditView.to_pdf.value=\"\";document.EditView.to_csv.value=\"\";document.EditView.action.value=\"ReportsWizard\";document.EditView.save_as.value=\"true\";' +
						'document.EditView.save_as_report_type.value=\"tabular\";document.EditView.submit();\' href=\'#\'>' + SUGAR.language.get('Reports', 'LBL_DUPLICATE_AS_ROWS_AND_COLS') + '</a>';
		if (canCovertToMatrix) {
				   menu += '<a style=\'width: 150px\' class=\'menuItem\' onmouseover=\'hiliteItem(this,"yes");\' ' +
				   'onmouseout=\'unhiliteItem(this);\' ' +
				   'onclick=\'document.EditView.to_pdf.value=\"\";document.EditView.to_csv.value=\"\";document.EditView.action.value=\"ReportsWizard\";document.EditView.save_as.value=\"true\";' +
						'document.EditView.save_as_report_type.value=\"matrix\";document.EditView.submit();\' href=\'#\'>' + SUGAR.language.get('Reports', 'LBL_DUPLICATE_AS_MATRIX') + '</a>';
		}

	}	
	else if (reportType == 'matrix') {
		var menu = '<a style=\'width: 150px\' class=\'menuItem\' onmouseover=\'hiliteItem(this,"yes");\' ' +
				   'onmouseout=\'unhiliteItem(this);\' ' +
				   'onclick=\'document.EditView.to_pdf.value=\"\";document.EditView.to_csv.value=\"\";document.EditView.action.value=\"ReportsWizard\";document.EditView.save_as.value=\"true\";' +
						'document.EditView.submit();\' href=\'#\'>' + SUGAR.language.get('Reports', 'LBL_DUPLICATE_AS_ORIGINAL') + '</a>' +
				   '<a style=\'width: 150px\' class=\'menuItem\' onmouseover=\'hiliteItem(this,"yes");\' ' +
				   'onmouseout=\'unhiliteItem(this);\' ' +
				   'onclick=\'document.EditView.to_pdf.value=\"\";document.EditView.to_csv.value=\"\";document.EditView.action.value=\"ReportsWizard\";document.EditView.save_as.value=\"true\";' +
						'document.EditView.save_as_report_type.value=\"summation\";document.EditView.submit();\' href=\'#\'>' + SUGAR.language.get('Reports', 'LBL_DUPLICATE_AS_SUMMATON') + '</a>' +
				   '<a style=\'width: 150px\' class=\'menuItem\' onmouseover=\'hiliteItem(this,"yes");\' ' +
				   'onmouseout=\'unhiliteItem(this);\' ' +
				   'onclick=\'document.EditView.to_pdf.value=\"\";document.EditView.to_csv.value=\"\";document.EditView.action.value=\"ReportsWizard\";document.EditView.save_as.value=\"true\";' +
						'document.EditView.save_as_report_type.value=\"summation_with_details\";document.EditView.submit();\' href=\'#\'>' + SUGAR.language.get('Reports', 'LBL_DUPLICATE_AS_SUMMATION_DETAILS') + '</a>' +
				   '<a style=\'width: 150px\' class=\'menuItem\' onmouseover=\'hiliteItem(this,"yes");\' ' +
				   'onmouseout=\'unhiliteItem(this);\' ' +
				   'onclick=\'document.EditView.to_pdf.value=\"\";document.EditView.to_csv.value=\"\";document.EditView.action.value=\"ReportsWizard\";document.EditView.save_as.value=\"true\";' +
						'document.EditView.save_as_report_type.value=\"tabular\";document.EditView.submit();\' href=\'#\'>' + SUGAR.language.get('Reports', 'LBL_DUPLICATE_AS_ROWS_AND_COLS') + '</a>';
		
	}
	else if (reportType == 'summation') {
		var menu = '<a style=\'width: 150px\' class=\'menuItem\' onmouseover=\'hiliteItem(this,"yes");\' ' +
				   'onmouseout=\'unhiliteItem(this);\' ' +
				   'onclick=\'document.EditView.to_pdf.value=\"\";document.EditView.to_csv.value=\"\";document.EditView.action.value=\"ReportsWizard\";document.EditView.save_as.value=\"true\";' +
						'document.EditView.submit();\' href=\'#\'>' + SUGAR.language.get('Reports', 'LBL_DUPLICATE_AS_ORIGINAL') + '</a>' +
				   '<a style=\'width: 150px\' class=\'menuItem\' onmouseover=\'hiliteItem(this,"yes");\' ' +
				   'onmouseout=\'unhiliteItem(this);\' ' +
				   'onclick=\'document.EditView.to_pdf.value=\"\";document.EditView.to_csv.value=\"\";document.EditView.action.value=\"ReportsWizard\";document.EditView.save_as.value=\"true\";' +
						'document.EditView.save_as_report_type.value=\"summation_with_details\";document.EditView.submit();\' href=\'#\'>' + SUGAR.language.get('Reports', 'LBL_DUPLICATE_AS_SUMMATION_DETAILS') + '</a>' +
				   '<a style=\'width: 150px\' class=\'menuItem\' onmouseover=\'hiliteItem(this,"yes");\' ' +
				   'onmouseout=\'unhiliteItem(this);\' ' +
				   'onclick=\'document.EditView.to_pdf.value=\"\";document.EditView.to_csv.value=\"\";document.EditView.action.value=\"ReportsWizard\";document.EditView.save_as.value=\"true\";' +
						'document.EditView.save_as_report_type.value=\"tabular\";document.EditView.submit();\' href=\'#\'>' + SUGAR.language.get('Reports', 'LBL_DUPLICATE_AS_ROWS_AND_COLS') + '</a>';
		if (canCovertToMatrix) {
				   menu += '<a style=\'width: 150px\' class=\'menuItem\' onmouseover=\'hiliteItem(this,"yes");\' ' +
				   'onmouseout=\'unhiliteItem(this);\' ' +
				   'onclick=\'document.EditView.to_pdf.value=\"\";document.EditView.to_csv.value=\"\";document.EditView.action.value=\"ReportsWizard\";document.EditView.save_as.value=\"true\";' +
						'document.EditView.save_as_report_type.value=\"matrix\";document.EditView.submit();\' href=\'#\'>' + SUGAR.language.get('Reports', 'LBL_DUPLICATE_AS_MATRIX') + '</a>';
		}
						
		
	}
	return overlib(menu, 
				   CENTER, STICKY, MOUSEOFF, 3000, WIDTH, 150, FGCLASS, 'olOptionsFgClass', CGCLASS, 'olOptionsCgClass', 
				   BGCLASS, 'olBgClass', TEXTFONTCLASS, 'olFontClass', CAPTIONFONTCLASS, 'olOptionsCapFontClass', 
				   CLOSEFONTCLASS, 'olOptionsCloseFontClass');
}
