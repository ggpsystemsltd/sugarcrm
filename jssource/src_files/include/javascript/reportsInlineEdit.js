
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

SUGAR.reportsInlineEdit = function() {
	return {
		
		inlineSelect: function(options, div, current_value, module, record, field_name, field_type) {
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
				selected = false;
                if (option_value == current_value)
                    selected = true;

				var option_info = new Object();
				option_info['value'] = option_value;
				option_info['text'] = option_text;
				option_info['selected'] = selected;
				options_arr[options_arr.length] = option_info;
			}
			select_html_info['options'] = options_arr;
			onBlur="SUGAR.reportsInlineEdit.inlineSave(\""+div+"\",\""+module+"\",\""+record+"\",\""+field_name+"\",\""+field_type+"\",\""+escape(current_value)+"\")";
			id = 'input_' + div;
			return buildSelectHTML(select_html_info,null,id,onBlur);	
		},
		
		inlineEdit: function(div, current_value, module, record, field_name, field_type, currency_id, currency_symbol) {
			if (field_name == 'name') {
				document.getElementById(div).innerHTML = "<input type ='text' id='input_"+ div +"' value='"+ current_value +"' onBlur='SUGAR.reportsInlineEdit.inlineSave(\""+div+"\",\""+module+"\",\""+record+"\",\""+field_name+"\",\""+field_type+"\",\""+current_value+"\")'>";
				document.getElementById('input_'+ div).focus();
			}
			else if (field_type == 'enum') {
				options = eval("field_defs_" + module)[field_name].options;
				document.getElementById(div).innerHTML = SUGAR.reportsInlineEdit.inlineSelect(options, div, current_value,module, record, field_name, field_type);
			}
			else if (field_type == 'currency') {
				document.getElementById(div).innerHTML = "<input type ='text' id='input_"+ div +"' value='"+ current_value +"' onBlur='SUGAR.reportsInlineEdit.inlineSave(\""+div+"\",\""+module+"\",\""+record+"\",\""+field_name+"\",\""+field_type+"\",\""+current_value+"\",\""+currency_id+"\",\""+currency_symbol+"\")'>";
				document.getElementById('input_'+ div).focus();

			}
		},
		
		inlineRestore: function(div,module,record,field_name,field_type,currency_id,currency_symbol,current_value,changed,currency_value) {
			if (field_name == 'name') {
				document.getElementById(div).innerHTML = "<a target='_blank' href=\"index.php?action=DetailView&module="+module+"&record="+record+"\">"+unescape(current_value)+"</a>";
				document.getElementById(div).innerHTML += "<img src='index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=edit_inline.png' onClick='SUGAR.reportsInlineEdit.inlineEdit(\""+div+"\",\""+current_value+"\",\""+module+"\",\""+record+"\",\""+field_name+"\",\""+field_type+"\")'></img>";
			}
			else if (field_type == 'enum') {
				document.getElementById(div).innerHTML = unescape(current_value);
				document.getElementById(div).innerHTML += "<img src='index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=edit_inline.png' onClick='SUGAR.reportsInlineEdit.inlineEdit(\""+div+"\",\""+current_value+"\",\""+module+"\",\""+record+"\",\""+field_name+"\",\""+field_type+"\")'></img>";
			}
			else if (field_type == 'currency') {
				if (changed)
					document.getElementById(div).innerHTML = unescape(current_value);
				else
					document.getElementById(div).innerHTML = currency_symbol + unescape(current_value);
				document.getElementById(div).innerHTML += "<img src='index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=edit_inline.png' onClick='SUGAR.reportsInlineEdit.inlineEdit(\""+div+"\",\""+currency_value+"\",\""+module+"\",\""+record+"\",\""+field_name+"\",\""+field_type+"\",\""+currency_id+"\",\""+currency_symbol+"\")'></img>";
			}						

		},
		
		inlineSave: function(div,module,record,field_name,field_type,old_value,currency_id,currency_symbol) {
			var current_value = document.getElementById('input_'+div).value;
			if (field_type == 'enum') {
				selectedIndex = document.getElementById('input_'+div).selectedIndex;
                if ( eval("field_defs_" + module)[field_name].options[0]['value'] == "")
                    selectedIndex++;
				var current_value = eval("field_defs_" + module)[field_name].options[selectedIndex]['text'];
				old_value = unescape(old_value);
			}
			var callback = {
					success:function(o){
						eval(o.responseText);
						if (field_name == 'name')
							var saved_value = document.getElementById('input_'+div).value;
						else if (field_type == 'enum') {
							var saved_value = eval("field_defs_" + module)[field_name].options[selectedIndex]['text'];
						}
						else if (field_type == 'currency') {
							var saved_value = result['currency_formatted_value']; //Getting this from the response as this contains the properly formatted currency value.
							var current_value = result['formatted_value'];
						}
						SUGAR.reportsInlineEdit.inlineRestore(div,module,record,field_name,field_type,currency_id,currency_symbol,saved_value,true,current_value);
				},
					failure: function(o){}
				}
			if (current_value != old_value) {
				if (field_name == 'name')
					value = escape(document.getElementById('input_'+div).value);
				else
					value = document.getElementById('input_'+div).value;
				var postData = '&module=Reports&action=saveInline&to_pdf=true&sugar_body_only=true&save_module='+module+'&save_record='+record+
					'&save_field_name='+field_name+'&save_value='+value+'&type='+field_type+'&currency_id='+currency_id+'&currency_symbol='+currency_symbol;
				YAHOO.util.Connect.asyncRequest("POST", "index.php", callback, postData);	
			}
			else {
				SUGAR.reportsInlineEdit.inlineRestore(div,module,record,field_name,field_type,currency_id,currency_symbol,current_value,false,current_value);
			}
		}
	};
}();

