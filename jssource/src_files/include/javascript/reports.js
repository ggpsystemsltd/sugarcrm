

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



function set_offset(offset) {
	document.ReportsWizardForm['report_offset'].value=offset;
	SUGAR.reports.previewReport();
}
 
function set_sort(column_name,source) {
	if (source == 'undefined') {
		source = 'columns';
	} // if
	var sort_by = 'sort_by';	
	var sort_dir = 'sort_dir';	
	if (source == 'summary') {
		sort_by = 'summary_sort_by';	
		sort_dir = 'summary_sort_dir';	
	} // if

	if (column_name == document.ReportsWizardForm[sort_by].value) {
		if (  document.ReportsWizardForm[sort_dir].value=="d") {
			document.ReportsWizardForm[sort_dir].value = "a";
		} else {
			document.ReportsWizardForm[sort_dir].value = "d";
		} // else
	} else {
		document.ReportsWizardForm[sort_by].value = column_name;
		document.ReportsWizardForm[sort_dir].value = "a";
	} // else
	document.ReportsWizardForm['report_offset'].value=0;
	SUGAR.reports.previewReport();
}

SUGAR.reports = function() {
	var report_type = 'tabular';
	var isMatrix = false;
	var layout_options = 0;
	var current_module = '';
	var current_filters_table = 'filters_table';
	var users_array = new Array();
	var filters_defs = new Array();
	var display_cols = new Array();
	var group_defs = new Array();
	var summary_columns = new Array();
	var summary_order_by = new Array();
	var order_by = new Array();
	var grid;
	
	var chart_type;
	var chart_description;
	var numerical_chart_column;
	var current_parent = '';
	var current_parent_id = '';
	var do_round = 1;
	

	var full_table_list = new Object();
	full_table_list.self = new Object();
	full_table_list.self.parent = '';
	full_table_list.self.value = '';
	full_table_list.self.module = '';
	full_table_list.self.label = '';
	full_table_list.self.children = new Object();	
	
	
	var imgPath;
	var themeImgPath;
	var currEditorDiv='report_type';
	var currWizardStep = 0;
	var filters_arr=new Array();
	var filters_count = -1;
	var filters_count_map=new Object();
	var current_filter_id = -1;
	var all_fields;
	var default_filter = {column_name:'',qualifier_name:'',input_name0:'',input_name1:'',input_name2:''};

	var totalFilterRows = 0;
	var totalDisplayColRows = 0;
	var totalGroupByRows = 0;
	var totalSqsEnabledFields = 0;
	var fieldGridCell;
	var chartTypesHolder = new Array();	
	
	var lbl_and = SUGAR.language.get("Reports", 'LBL_AND');
	var lbl_select = SUGAR.language.get("Reports", 'LBL_SELECT');
	var lbl_remove = SUGAR.language.get("Reports", 'LBL_REMOVE');
	var lbl_missing_fields = SUGAR.language.get("Reports", 'LBL_MISSING_FIELDS');
	var lbl_at_least_one_display_column = SUGAR.language.get("Reports", 'LBL_AT_LEAST_ONE_DISPLAY_COLUMN');
	var lbl_at_least_one_summary_column = SUGAR.language.get("Reports", 'LBL_AT_LEAST_ONE_SUMMARY_COLUMN');
	var lbl_missing_input_value  = SUGAR.language.get("Reports", 'LBL_MISSING_INPUT_VALUE');
	var lbl_missing_second_input_value = SUGAR.language.get("Reports", 'LBL_MISSING_SECOND_INPUT_VALUE');
	var lbl_nothing_was_selected = SUGAR.language.get("Reports", 'LBL_NOTHING_WAS_SELECTED');
	var lbl_none = SUGAR.language.get("Reports", 'LBL_NONE');
	var lbl_outer_join_checkbox = SUGAR.language.get("Reports", 'LBL_OUTER_JOIN_CHECKBOX');
	var lbl_add_related = SUGAR.language.get("Reports", 'LBL_ADD_RELATE');
	var lbl_del_this = SUGAR.language.get("Reports", 'LBL_DEL_THIS');
	var lbl_alert_cant_add = SUGAR.language.get("Reports", 'LBL_ALERT_CANT_ADD');
	var lbl_related_table_blank = SUGAR.language.get("Reports", 'LBL_RELATED_TABLE_BLANK');
	var lbl_optional_help = SUGAR.language.get("Reports", 'LBL_OPTIONAL_HELP');
	
	var displayColOrderBySelectedRow = -1;
	var displaySummaryOrderBySelectedRow = -1;


	var initInProgress = 0; //workaround for saveFilters

	return {
        overrideRecord: true,
		checkEnterKey: function() {
			if (grid && grid.store.data.items.length == 1) {
				grid.selModel.last = 0;
				grid.fireEvent('rowclick', this);
			}
			return false;
		},
		init: function(img, report_def_str, user_array, origImgPath) {
			imgPath = img;
			themeImgPath = origImgPath; 
			users_array = user_array;
			if (report_def_str == "") {
				numerical_chart_column = document.ReportsWizardForm.numerical_chart_column;
				SUGAR.reports.showWizardNamedStep('report_type');
			}
			else {
				current_module = report_def_str.module;
				full_table_list = report_def_str.full_table_list;
			    //SUGAR.reports.addTree(current_module);
			    SUGAR.reports.buildTree(current_module);
			    SUGAR.reports.populateFieldGrid(current_module,"","");
				report_type = report_def_str.report_type;
				SUGAR.FiltersWidget.init(imgPath);
				if (report_type == 'summary') {
					report_type = 'summation';
					if (report_def_str.display_columns && report_def_str.display_columns.length > 0) 
						report_type = 'summation_with_details';
				}
				if (report_def_str.filters_def.Filter_1){
					SUGAR.reports.loadFilters(report_def_str.filters_def.Filter_1);
					initInProgress = 1;
					SUGAR.reports.saveFilters();
					initInProgress = 0;
				}
				else
				    SUGAR.FiltersWidget.addGroupToPanel('filter_designer_div', SUGAR.language.get('Reports','LBL_FILTER'));
				SUGAR.reports.showWizardNamedStep('report_type');
				SUGAR.reports.showWizardNamedStep('module_select');
				SUGAR.reports.showWizardNamedStep('filters');
				numerical_chart_column = document.ReportsWizardForm.numerical_chart_column;

				if  (typeof(report_def_str.layout_options) != 'undefined') {
					isMatrix = true;
					layout_options = report_def_str.layout_options;
				}
				if (report_type == 'summation' || report_type == 'summation_with_details') {
					SUGAR.reports.showWizardNamedStep('group_by');
					SUGAR.reports.showWizardNamedStep('display_summaries');
				}
				if (report_def_str.group_defs) {
					group_defs = report_def_str.group_defs;
					for (i = 0; i < report_def_str.group_defs.length; i++)
                    {
                        // Bug #39763 Summary label should be displayed instead of group label.
                        if (typeof report_def_str.summary_columns != 'undefined')
                        {
                            for (var j =0; j < report_def_str.summary_columns.length; j++)
                            {
                                var isValid = true;
                                if (typeof report_def_str.group_defs[i].qualifier != 'undefined')
                                {
                                    if (typeof report_def_str.summary_columns[j].qualifier == 'undefined')
                                    {
                                        isValid = false;
                                    }
                                    else if (report_def_str.group_defs[i].qualifier != report_def_str.summary_columns[j].qualifier)
                                    {
                                        isValid = false;
                                    }
                                }
                                if (report_def_str.summary_columns[j].table_key == report_def_str.group_defs[i].table_key && report_def_str.summary_columns[j].name == report_def_str.group_defs[i].name && isValid == true)
                                {
                                    report_def_str.group_defs[i].force_label = report_def_str.summary_columns[j].label;
                                }
                            }
                        }
						SUGAR.reports.addFieldToGroupByOnLoad(report_def_str.group_defs[i], report_def_str.summary_order_by);
                    }
				}
				//Only add summary columns that weren't auto added by group by.
				if (report_def_str.summary_columns) {
					summary_columns = report_def_str.summary_columns;
					for (i = 0; i < report_def_str.summary_columns.length; i++) {
						var alreadyAdded = false;
						for (var j = 0; j < report_def_str.group_defs.length; j++) {
							if (report_def_str.group_defs[j].name == report_def_str.summary_columns[i].name && 
								report_def_str.group_defs[j].table_key == report_def_str.summary_columns[i].table_key &&
								typeof(report_def_str.summary_columns[i].group_function) == 'undefined') {
								alreadyAdded = true;
								break;
							}
						}
						if (!alreadyAdded)
							SUGAR.reports.addFieldToDisplaySummariesOnLoad(report_def_str.summary_columns[i], null, report_def_str.summary_order_by);

					}
					if (document.ReportsWizardForm.numerical_chart_column.options.length == 0) {
						document.ReportsWizardForm.chart_type.disabled = true;
						document.ReportsWizardForm.numerical_chart_column.disabled = true;
					}					
				}
				if (report_def_str.display_columns) {
					display_cols = report_def_str.display_columns;
					SUGAR.reports.showWizardNamedStep('display');
					for (i = 0; i < report_def_str.display_columns.length; i++) 
						SUGAR.reports.addFieldToDisplayColumnsOnLoad(report_def_str.display_columns[i],report_def_str.order_by);
					
				}
				if (report_def_str.chart_type) {
					do_round = report_def_str.do_round;
					selected_chart_index = 0;
					for(var i=0;i < document.ReportsWizardForm.chart_type.options.length; i++) {
						if (document.ReportsWizardForm.chart_type.options[i].value == report_def_str.chart_type) {
							selected_chart_index = i;
							break;
						}
					}
					document.ReportsWizardForm.chart_type.selectedIndex = selected_chart_index;

					selected_chart_index = 0;
					for(var i=0;i < document.ReportsWizardForm.numerical_chart_column.options.length; i++) {
						if (document.ReportsWizardForm.numerical_chart_column.options[i].value == report_def_str.numerical_chart_column) {
							selected_chart_index = i;
							break;
						}
					}
					document.ReportsWizardForm.numerical_chart_column.selectedIndex = selected_chart_index;

								
					SUGAR.reports.showWizardNamedStep('chart_options');
					chart_type = report_def_str.chart_type;
					chart_description = report_def_str.chart_description;
					
				}	
				SUGAR.reports.showWizardNamedStep('report_details');
 				if (!document.getElementById('resultsDiv')) {
					if (document.ReportsWizardForm.current_step.value =="")
						SUGAR.reports.showWizardNamedStep('filters');
					else
						SUGAR.reports.showWizardNamedStep(document.ReportsWizardForm.current_step.value);
 				}
			}
		},

		loadFilters:function(filters, parentId) {
			var operator = filters.operator;
			panels = SUGAR.FiltersWidget.getPanels(); 
			if (panels.length > 0) {
				SUGAR.FiltersWidget.addGroupToPanel(parentId + "_body_div", parentId, operator);
			}
			else {
				SUGAR.FiltersWidget.addGroupToPanel('filter_designer_div', SUGAR.language.get('Reports','LBL_FILTER'), operator);
			}
			if (document.getElementById('inlineFiltersHelpTable')) 
				document.getElementById(SUGAR.language.get('Reports','LBL_FILTER') + ".1_body_div").innerHTML = "";
		
			panelId = String(panels[panels.length - 1].id);
			var id = String(panelId);
			var i = 0;
			while (filters[i]) {
				current_filter = filters[i];
				if (current_filter.operator) {
					SUGAR.reports.loadFilters(current_filter, id);	
				}
				else {
					SUGAR.reports.addFilterOnLoad(current_filter, id + "_table");
				}
				i++;
			}
		},

		getFieldDef : function(moduleListWithField) {
			var moduleListWithFieldArray = moduleListWithField.split(":");
			if (moduleListWithFieldArray.length <= 1) {
				moduleListWithField = "self:" + moduleListWithField;
				moduleListWithFieldArray = moduleListWithField.split(":");
			} // if
			var fieldDefs = new Array();
			var i = 0;
			var previousModule = null;
			var previousModuleLink = null;
			for (i = 0 ; i < (moduleListWithFieldArray.length - 1) ; i++) {
				previousModule = moduleListWithFieldArray[i];
				if (previousModule == 'self') {
					previousModule = full_table_list[previousModule]['module'];
				} else {
					if (i == (moduleListWithFieldArray.length - 2)) {
						previousModule = previousModuleLink;
						break;
					} // if
					if (previousModuleLink == null) {
						previousModuleLink = previousModule;
					} // if
					var link_defs = module_defs[previousModuleLink].link_defs;
					var moduleIndex = i + 1;
					for ( j in link_defs) {
						if (moduleListWithFieldArray[moduleIndex] == link_defs[j].name) {
							var relationship = link_defs[j].relationship_name;
							if (link_defs[j].bean_is_lhs && rel_defs[relationship].rhs_module) {
								previousModuleLink = rel_defs[relationship].rhs_module;
								previousModule = previousModuleLink;
							} else {
								previousModuleLink = rel_defs[relationship].lhs_module;
								previousModule = previousModuleLink;
							} // else
							break;						
						} // if
					} // for

				} // else
			} // for
			
			
			var fieldDef;
			fieldDefs = module_defs[previousModule].field_defs;
			for (i in fieldDefs) {
				if (fieldDefs[i].name == moduleListWithFieldArray[moduleListWithFieldArray.length-1]) {
					fieldDef = fieldDefs[i];
					break;
				} // if
			} // for
			if (fieldDef != null) {
				return fieldDef;
			} // if
			
			if (module_defs[previousModule].summary_field_defs != null) {
				fieldDefs = module_defs[previousModule].summary_field_defs;
				for (i in fieldDefs) {
					if (fieldDefs[i].name == moduleListWithFieldArray[moduleListWithFieldArray.length-1]) {
						fieldDef = fieldDefs[i];
						break;
					} // if
				} // for
			} // if
			if (fieldDef != null) {
				return fieldDef;
			} // if
			
			if (module_defs[previousModule].group_field_defs != null) {
				fieldDefs = module_defs[previousModule].group_field_defs;
				for (i in fieldDefs) {
					if (fieldDefs[i].name == moduleListWithFieldArray[moduleListWithFieldArray.length-1]) {
						fieldDef = fieldDefs[i];
						break;
					} // if
				} // for
			} // if
			return fieldDef;
		},
		
		getListFieldDef:function(field, link, module) {
			if(field == 'team_set_id') {
			   link = SUGAR.reports.getTeamSetIdTableValue(link, current_module, false);
			   module = link.indexOf(">") == -1 ? link : module;
			} 			
			var link = link.replace(/ > /g, ":");
			var field_def = new Object();
			//var field_val_arr = field.split(" > ");
			//field_val = field_val_arr[field_val_arr.length-1];
			var field_defs = module_defs[module].field_defs;
			for (i in field_defs){
				if (field_defs[i].name == field) {
					field_def.name = field_defs[i].name;
					if (typeof (field_defs[i].vname) != "undefined")
						field_def.label = field_defs[i].vname;
					else
						field_def.label = field_defs[i].name;
					return field_def;
				}
			}
			var field_defs = module_defs[module].summary_field_defs;
			for (i in field_defs){
				if (field_defs[i].name == field) {
					if ( typeof(field_defs[i].field_def_name) != 'undefined') 
						field_def.name = field_defs[i].field_def_name;
					else
						field_def.name = field_defs[i].name;
					if (typeof(field_defs[i].vname) != "undefined")
						field_def.label = field_defs[i].vname;
					else
						field_def.label = field_def.name;
					if (typeof(field_defs[i].field_type)!= "undefined")
						field_def.field_type = field_defs[i].field_type;
					else
						field_def.field_type = '';
					
					if ( typeof(field_defs[i].group_function) != 'undefined' && field_defs[i].group_function != null) {
						field_def.group_function = field_defs[i].group_function;
					}
					if ( typeof(field_defs[i].column_function) != 'undefined' && field_defs[i].column_function != null) {
						field_def.column_function = field_defs[i].column_function;
						field_def.qualifier = field_defs[i].column_function;
					}
					return field_def;
				}
			}
			var field_defs = module_defs[module].group_by_field_defs;
			for (i in field_defs){
				if (field_defs[i].name == field) {
					if ( typeof(field_defs[i].field_def_name) != 'undefined') 
						field_def.name = field_defs[i].field_def_name;
					else
						field_def.name = field_defs[i].name;
					if (typeof(field_defs[i].vname) != "undefined") 
						field_def.label = field_defs[i].vname;
					else
						field_def.label = field_def.name;

					if ( typeof(field_defs[i].group_function) != 'undefined' && field_defs[i].group_function != null) {
						field_def.group_function = field_defs[i].group_function;
					}
					if ( typeof(field_defs[i].column_function) != 'undefined' && field_defs[i].column_function != null) {
						field_def.column_function = field_defs[i].column_function;
						field_def.qualifier = field_defs[i].column_function;
					}
					return field_def;
				}
			}			
		},
		saveDisplayColumns: function() {
			display_cols = new Array();
			var table = document.getElementById('displayColsTable');
			if (document.getElementById('display_cols_help_row')) {
				var tBody = table.childNodes[0];
				tBody.removeChild(document.getElementById('display_cols_help_row'));
			}
			var sortedOn = false;
			for (var i = 1; i < table.rows.length; i++) {
				var field_def = new Object();
				var row = table.rows[i];
				var cells = table.rows[i].cells;
				var link = cells[0].getElementsByTagName('input')[1].value;
				var module = cells[0].getElementsByTagName('input')[0].value;
				var field = cells[0].getElementsByTagName('input')[2].value;				
	
				var field_def = SUGAR.reports.getListFieldDef(field, link, module);
				if (cells[2].getElementsByTagName('input')[0].value != "") {
					field_def['label'] = cells[2].getElementsByTagName('input')[0].value;
				}
				
				field_def.table_key = cells[0].getElementsByTagName('input')[1].value;
				if(field == 'team_set_id') {
				   field_def.table_key = SUGAR.reports.getTeamSetIdTableValue(field_def.table_key, current_module, true);					
				}
				
				field_def.table_key = field_def.table_key.replace(/>/g,':');
				
				if (field_def.table_key == current_module)
					field_def.table_key = 'self';
				if(cells[3].getElementsByTagName('input')[0].checked) {
					sortedOn = true;
					var orderBy = new Object();
					orderBy.name = field_def['name'];
					orderBy.label = field_def['label'];
					orderBy.table_key = field_def.table_key;
					orderBy.sort_dir = cells[3].getElementsByTagName('select')[0].value;
					order_by[0] = orderBy;
					document.ReportsWizardForm.sort_by.value = field_def.table_key+ ":" +field_def.name;			
					document.ReportsWizardForm.sort_dir.value = cells[3].getElementsByTagName('select')[0].value;			
				}
				
				display_cols.push(field_def);
			}		
			if (!sortedOn) {
				document.ReportsWizardForm.sort_by.value = '';			
				document.ReportsWizardForm.sort_dir.value = '';			
				order_by = new Array();
			}
			if (display_cols.length == 0) {
				alert(lbl_at_least_one_display_column);
				return false;
			}
			return true;
				
		},
		saveDisplaySummaries: function() {
			summary_columns = new Array();
			var table = document.getElementById('displaySummariesTable');
			if (document.getElementById('display_summary_help_row')) {
				var tBody = table.childNodes[0];
				tBody.removeChild(document.getElementById('display_summary_help_row'));
			}
			var selectedVal = document.ReportsWizardForm.numerical_chart_column.value; 

			var selected_chart_index = 0;
			document.ReportsWizardForm.numerical_chart_column.options.length = 0;
			var sortedOn = false;
			
			for (var i = 1; i < table.rows.length; i++) {
				var field_def = new Object();
				var row = table.rows[i];
				var cells = table.rows[i].cells;
				var link = cells[0].getElementsByTagName('input')[1].value;
				var module = cells[0].getElementsByTagName('input')[0].value;
				var field = cells[0].getElementsByTagName('input')[2].value;
				
				var field_def = SUGAR.reports.getListFieldDef(field, link, module);

				if (cells[2].getElementsByTagName('input')[0].value != "")
					field_def['label'] = cells[2].getElementsByTagName('input')[0].value;
				field_def.table_key = cells[0].getElementsByTagName('input')[1].value;
				field_def.table_key = field_def.table_key.replace(/>/g,':');	
				if(field == 'team_set_id') {
				   field_def.table_key = SUGAR.reports.getTeamSetIdTableValue(field_def.table_key, current_module, true);				
				}	
				
				if (field_def.table_key  == current_module)
					field_def.table_key = 'self';		
				
				field_def['label'] = cells[2].getElementsByTagName('input')[0].value;
				summary_columns.push(field_def);
				if ( typeof (field_def.group_function) != 'undefined') {
					var key = field_def.table_key + ":" + field_def.name;
					if (field_def.group_function != 'count')
						key+= ":" + field_def.group_function;
					document.ReportsWizardForm.numerical_chart_column.options[document.ReportsWizardForm.numerical_chart_column.options.length] =
						new Option(field_def['label'],key);
				}
				else if ( typeof (field_def.column_function) != 'undefined') {
					var key = field_def.table_key + ":" + field_def.name;
					key+= ":" + field_def.column_function;
				}				
				else {                                        
					var key = field_def.table_key + ":" + field_def.name;
				}

				
				if (report_type == 'summation' && cells[3].getElementsByTagName('input')[0].checked) {
                    sortedOn = true;
                    summary_order_by[0] = field_def;
                    summary_order_by[0].sort_dir = cells[3].getElementsByTagName('select')[0].value;
                    document.ReportsWizardForm.summary_sort_by.value = key;
                    document.ReportsWizardForm.summary_sort_dir.value = cells[3].getElementsByTagName('select')[0].value;
				}				
			}
			for(var i=0;i < document.ReportsWizardForm.numerical_chart_column.options.length; i++) {
				if (document.ReportsWizardForm.numerical_chart_column.options[i].value == selectedVal) {
					selected_chart_index = i;
					break;
				}
			}
			document.ReportsWizardForm.numerical_chart_column.selectedIndex = selected_chart_index;
			if (!sortedOn) {
				document.ReportsWizardForm.summary_sort_by.value = '';
				document.ReportsWizardForm.summary_sort_dir.value = '';
				summary_order_by = new Array();
			}
			
			if (summary_columns.length == 0) {
				alert(lbl_at_least_one_summary_column);
				return false;
			}
			if (document.ReportsWizardForm.numerical_chart_column.options.length == 0) {
				document.ReportsWizardForm.chart_type.disabled = true;
				document.ReportsWizardForm.numerical_chart_column.disabled = true;
			}
			else {
				document.ReportsWizardForm.chart_type.disabled = false;
				document.ReportsWizardForm.numerical_chart_column.disabled = false;
			}
			return true;
		},
		saveGroupBy: function() {
			group_defs = new Array();
			var table = document.getElementById('groupByTable');
			if (document.getElementById('group_by_help_row')) {
				var tBody = table.childNodes[0];
				tBody.removeChild(document.getElementById('group_by_help_row'));
			}
			
			if (table.rows.length == 2 && isMatrix) {
				alert(SUGAR.language.get('Reports', 'LBL_MINIMUM_2_GROUP_BY'));
				return false;
			}
			
			for (var i = 1; i < table.rows.length; i++) {
				var group_by_def = new Object();
				var row = table.rows[i];
				var cells = table.rows[i].cells;
				var link = cells[0].getElementsByTagName('input')[1].value;
				var module = cells[0].getElementsByTagName('input')[0].value;
				var field = cells[0].getElementsByTagName('input')[2].value;
				
				var group_by_def = SUGAR.reports.getListFieldDef(field, link, module);

				group_by_def.table_key = cells[0].getElementsByTagName('input')[1].value;
				if(field == 'team_set_id') {
				   group_by_def.table_key = SUGAR.reports.getTeamSetIdTableValue(group_by_def.table_key, current_module, true);
				}
				group_by_def.table_key = group_by_def.table_key.replace(/>/g,':');
				if (group_by_def.table_key  == current_module)
					group_by_def.table_key = 'self';

				var groupByModule = full_table_list[group_by_def.table_key].module;
				group_by_def.type = module_defs[groupByModule].field_defs[group_by_def.name].type;

				group_defs.push(group_by_def);
			}			
			return true;
		},
		saveFilter: function(filterRow) {
			var filter_def = new Object();
			var cells = filterRow.cells;
			filter_def.name = cells[0].getElementsByTagName('input')[0].value;
			
			var module = cells[0].getElementsByTagName('input')[2].value;
			if(filter_def.name == 'team_set_id') {
				filter_def.table_key = cells[0].getElementsByTagName('input')[1].value;
				filter_def.table_key = SUGAR.reports.getTeamSetIdTableValue(filter_def.table_key, current_module, false);
				if(filter_def.table_key.indexOf('>') == -1) {
				   filter_def.table_key = 'self';
				}
				filter_def.table_key = filter_def.table_key.replace(/>/g,':');	
				var field = new Array();
				field['name'] = 'team_set_id';
				field['vname'] = SUGAR.language.get('app_strings', 'LBL_TEAMS');
				field['type'] = 'team_set_id';					
			} else {
				filter_def.table_key = cells[0].getElementsByTagName('input')[1].value;
				filter_def.table_key = filter_def.table_key.replace(/>/g,':');
				var field = module_defs[module].field_defs[filter_def.name];
			}
			
			if (filter_def.table_key  == current_module)
				filter_def.table_key = 'self';
		    
			filter_def.qualifier_name=cells[2].getElementsByTagName('select')[0].value;

			// IE
			if(document.all)
				var column_vname = cells[1].innerText;
			else // Firefox
				var column_vname = cells[1].textContent;
			
			var input_arr = cells[3].getElementsByTagName('input');
			var runtime_filter = cells[3].getElementsByTagName('input')[cells[3].getElementsByTagName('input').length-1];
			if (runtime_filter && runtime_filter.checked)
				filter_def.runtime = 1;
			if ( typeof(input_arr[0]) !=  'undefined' && input_arr[0].id.search(/runtime_filter/) == -1) {
				filter_def.input_name0=input_arr[0].value;
				if ( typeof(input_arr[1]) != 'undefined') {
					filter_def.input_name1=input_arr[1].value;
				}
			} 
			else {
				//todo: check to see if selects are saved try with Accounts->Type
				var got_selected = 0;
				var select_input = cells[3].getElementsByTagName('select')[0];
				filter_def.input_name0= new Array();
				for (k=0;k<select_input.options.length;k++) {
					if (select_input.options[k].selected == true) {
						filter_def.input_name0.push(decodeURI(select_input.options[k].value));
						got_selected = 1;
					}
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
			}else if ( field.type == 'datetimecombo') {
				if ( (typeof(filter_def.input_name0) != 'undefined' && typeof(filter_def.input_name0) != 'array') && (typeof(filter_def.input_name1) != 'undefined' && typeof(filter_def.input_name1) != 'array')) {
					var date_match = filter_def.input_name0.match(date_reg_format);
					var time_match = filter_def.input_name1.match(time_reg_format);
					if ( date_match != null && time_match != null) {
						filter_def.input_name0 = date_match[date_reg_positions['Y']] + "-"+date_match[date_reg_positions['m']] + "-"+date_match[date_reg_positions['d']] + ' '+ filter_def.input_name1;
					}
				}			
				if ( typeof(filter_def.input_name2) != 'undefined' && typeof(filter_def.input_name2) != 'array' && typeof(filter_def.input_name3) != 'undefined' && typeof(filter_def.input_name3) != 'array') {
					var date_match = filter_def.input_name2.match(date_reg_format);
					var time_match = filter_def.input_name3.match(time_reg_format);
					if ( date_match != null && time_match != null) {
						filter_def.input_name2 = date_match[date_reg_positions['Y']] + "-"+date_match[date_reg_positions['m']] + "-"+date_match[date_reg_positions['d']] + ' '+ filter_def.input_name3;
					}
				}			
			}
			return filter_def;
			
		},
		
		saveFilters: function() {
			var got_error = 0;
			var error_msgs =  lbl_missing_fields+': \n';
			filters_defs = new Array();
			var filters_def = new Array();
			var panels = SUGAR.FiltersWidget.getPanels();
			if (document.getElementById('inlineFiltersHelpTable')) 
				document.getElementById(SUGAR.language.get('Reports','LBL_FILTER') + ".1_body_div").innerHTML = "";
			
			for (var i = 0; i < panels.length; i++) {
				var table = document.getElementById(panels[i].id + "_table");
				if (!table) // if this panel was deleted.
					continue;
				/*if(table.rows.length == 0 && panels.length != 1) {
					alert(panels[i].id + SUGAR.language.get('Reports','LBL_NO_FILTERS'));
					return false;
				}*/
				for (var j = 0; j < table.rows.length; j++) {
					var filter_def = new Object();
					var row = table.rows[j];
					var cells = table.rows[j].cells;
					filter_def.panelId = panels[i].id;
					filter_def.name = cells[0].getElementsByTagName('input')[0].value;
					var module = cells[0].getElementsByTagName('input')[2].value;
					if(filter_def.name == 'team_set_id') {
						filter_def.table_key = cells[0].getElementsByTagName('input')[1].value;
						filter_def.table_key = SUGAR.reports.getTeamSetIdTableValue(filter_def.table_key, current_module, false);
						if(filter_def.table_key.indexOf('>') == -1) {
						   filter_def.table_key = 'self';
						}
						filter_def.table_key = filter_def.table_key.replace(/>/g,':');
						var field = new Array();
						field['name'] = 'team_set_id';
						field['vname'] = SUGAR.language.get('app_strings', 'LBL_TEAMS');
						field['type'] = 'team_set_id';						
					} else {
						filter_def.table_key = cells[0].getElementsByTagName('input')[1].value;
						filter_def.table_key = filter_def.table_key.replace(/>/g,':');
						var field = module_defs[module].field_defs[filter_def.name];
					}
					
					if (filter_def.table_key  == current_module)
						filter_def.table_key = 'self';
					filter_def.qualifier_name=cells[2].getElementsByTagName('select')[0].value;
					
					
					// IE
					if(document.all)
						var column_vname = cells[1].innerText;
					else // Firefox
						var column_vname = cells[1].textContent;
					
					var input_arr = cells[3].getElementsByTagName('input');
					var runtime_filter = cells[3].getElementsByTagName('input')[cells[3].getElementsByTagName('input').length-1];
					
					if (runtime_filter && runtime_filter.checked)
						filter_def.runtime = 1;
					if(field.name == 'team_set_id'){
						//push the list of team ids
						filter_def.input_name0 = new Array();
						filter_def.input_name1 = new Array();
						filter_def.input_name2 = '';

						var got_selected = 0;
						for(l = 0; l < input_arr.length; l++) {
							if(input_arr[l].type == 'hidden' && /^id_/.test(input_arr[l].id) && trim(input_arr[l].value) != '') {
								filter_def.input_name0.push(input_arr[l].value);
								got_selected = 1;
							} else if(input_arr[l].type == 'text' && /id_collection_/.test(input_arr[l].id) && trim(input_arr[l].value) != '') {
								filter_def.input_name1.push(input_arr[l].value);
							} else if(input_arr[l].type == 'radio' && input_arr[l].checked) {
								//We use input_name2 to indicate that a primary team has been selected.  
								//See SugarWidgetFieldteam_set_id.php file to see how this creates the primary team query portion.
								filter_def.input_name2 = input_arr[l].value;
							}
						}
						if (!initInProgress && !got_selected) {
							got_error = 1;
							error_msgs += "\"" + column_vname + "\" " + lbl_missing_input_value + "\n";
						}
					}
					else if ( typeof(input_arr[0]) !=  'undefined' && input_arr[0].id.search(/runtime_filter/) == -1) {
						filter_def.input_name0=input_arr[0].value;
						if (input_arr[0].value == '') {
							got_error = 1;
							error_msgs += "\""+column_vname+"\" "+lbl_missing_input_value+"\n";
						}
				
						if ( typeof(input_arr[1]) != 'undefined') {
							filter_def.input_name1=input_arr[1].value;
							if (input_arr[1].value == '' && input_arr[1].type != 'checkbox') {
								got_error = 1;
								error_msgs += "\"" + column_vname + "\" "+lbl_missing_second_input_value+"\n";
							}
						}
						
						if(field.type=='datetimecombo'){
							if( typeof(input_arr[2]) != 'undefined'){
								filter_def.input_name2=input_arr[2].value;
								if (input_arr[2].value == '' && input_arr[2].type != 'checkbox') {
									got_error = 1;
									error_msgs += "\"" + column_vname + "\" "+lbl_missing_input_value+"\n";
								}
							}
							if( typeof(input_arr[3]) != 'undefined'){
								filter_def.input_name3=input_arr[3].value;
								if (input_arr[3].value == '' && input_arr[3].type != 'checkbox') {
									got_error = 1;
									error_msgs += "\"" + column_vname + "\" "+lbl_missing_input_value+"\n";
								}
							}
							if( typeof(input_arr[4]) != 'undefined'){
								filter_def.input_name4=input_arr[4].value;
								if (input_arr[4].value == '' && input_arr[4].type != 'checkbox') {
									got_error = 1;
									error_msgs += "\"" + column_vname + "\" "+lbl_missing_input_value+"\n";
								}
							}
						}
						
					} else {
						//todo: check to see if selects are saved try with Accounts->Type
						var got_selected = 0;
						var select_input = cells[3].getElementsByTagName('select')[0];
						filter_def.input_name0= new Array();
						for (k=0;k<select_input.options.length;k++) {
							if (select_input.options[k].selected == true) {
								filter_def.input_name0.push(decodeURI(select_input.options[k].value));
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
					}else if ( field.type == 'datetimecombo') {
						if ( (typeof(filter_def.input_name0) != 'undefined' && typeof(filter_def.input_name0) != 'array') && (typeof(filter_def.input_name1) != 'undefined' && typeof(filter_def.input_name1) != 'array')) {
							var date_match = filter_def.input_name0.match(date_reg_format);
							var time_match = filter_def.input_name1.match(time_reg_format);
							if ( date_match != null && time_match != null) {
								filter_def.input_name0 = date_match[date_reg_positions['Y']] + "-"+date_match[date_reg_positions['m']] + "-"+date_match[date_reg_positions['d']] + ' '+ filter_def.input_name1;
							}
						}			
						if ( typeof(filter_def.input_name2) != 'undefined' && typeof(filter_def.input_name2) != 'array' && typeof(filter_def.input_name3) != 'undefined' && typeof(filter_def.input_name3) != 'array') {
							var date_match = filter_def.input_name2.match(date_reg_format);
							var time_match = filter_def.input_name3.match(time_reg_format);
							if ( date_match != null && time_match != null) {
								filter_def.input_name2 = date_match[date_reg_positions['Y']] + "-"+date_match[date_reg_positions['m']] + "-"+date_match[date_reg_positions['d']] + ' '+ filter_def.input_name3;
							}
						}			
					}	 		
			 		
					filters_def.push(filter_def);
				}
			
				if (got_error == 1) {
					alert(error_msgs);
					return false;
				}
				filters_defs = filters_def;
			}
			return true;
		},		
		
		showWizardStepReportType: function() {
			document.getElementById("report_type_div").style.display="";
			document.getElementById("module_select_div").style.display="none";
			document.getElementById("filters_div").style.display="none";
			document.getElementById("filter_designer_div").style.display="none";
			document.getElementById("group_by_div").style.display="none";
			document.getElementById("display_summaries_div").style.display="none";
			document.getElementById("display_cols_div").style.display="none";
			document.getElementById("chart_options_div").style.display="none";
			document.getElementById("report_details_div").style.display="none";
			if (document.getElementById("resultsDiv"))
				document.getElementById("resultsDiv").style.display="none";
			
			currEditorDiv="report_type";
			currWizardStep++;
		/*
			if (currWizardStep <= 1) {
				if (report_type == 'tabular') {
					document.getElementById('wizard_outline_div').innerHTML = 
						SUGAR.language.get('Reports','LBL_SELECT_MODULE')+' > '+
						SUGAR.language.get('Reports','LBL_DEFINE_FILTERS') + ' > ' +
						SUGAR.language.get('Reports','LBL_CHOOSE_DISPLAY_COLS') + ' > ' +
						SUGAR.language.get('Reports','LBL_REPORT_DETAILS') + '<br/><br/>';
				}
				else if (report_type == 'summation') {
					document.getElementById('wizard_outline_div').innerHTML = 
						SUGAR.language.get('Reports','LBL_SELECT_MODULE')+' > '+
						SUGAR.language.get('Reports','LBL_DEFINE_FILTERS') + ' > ' +
						SUGAR.language.get('Reports','LBL_SELECT_GROUP_BY') + ' > ' +
						SUGAR.language.get('Reports','LBL_DISPLAY_SUMMARIES') + ' > ' +
						SUGAR.language.get('Reports','LBL_CHART_OPTIONS') + ' > ' +
						SUGAR.language.get('Reports','LBL_REPORT_DETAILS') + '<br/><br/>';
				}	
				else if (report_type == 'summation_with_details') {
					document.getElementById('wizard_outline_div').innerHTML = 
						SUGAR.language.get('Reports','LBL_SELECT_MODULE')+' > '+
						SUGAR.language.get('Reports','LBL_DEFINE_FILTERS') + ' > ' +
						SUGAR.language.get('Reports','LBL_SELECT_GROUP_BY') + ' > ' +
						SUGAR.language.get('Reports','LBL_DISPLAY_SUMMARIES') + ' > ' +
						SUGAR.language.get('Reports','LBL_CHOOSE_DISPLAY_COLS') + ' > ' +
						SUGAR.language.get('Reports','LBL_CHART_OPTIONS') + ' > ' +
						SUGAR.language.get('Reports','LBL_REPORT_DETAILS') + '<br/><br/>';
				}		
			}			
			*/ 	
		},
		showWizardStepModuleSelect: function() {
			document.getElementById("report_type_div").style.display="none";
			document.getElementById("module_select_div").style.display="";
			document.getElementById("filters_div").style.display="none";
			document.getElementById("filter_designer_div").style.display="none";
			document.getElementById("group_by_div").style.display="none";
			document.getElementById("display_summaries_div").style.display="none";
			document.getElementById("display_cols_div").style.display="none";
			document.getElementById("chart_options_div").style.display="none";
			document.getElementById("report_details_div").style.display="none";
			if (document.getElementById("resultsDiv"))
				document.getElementById("resultsDiv").style.display="none";
			
			currEditorDiv="module_select";

            if (currWizardStep < 2)
            {
                currWizardStep++;
				if (report_type == 'tabular') {
					document.getElementById('wizard_outline_div').innerHTML = 
						SUGAR.language.get('Reports','LBL_ROWS_AND_COLUMNS_REPORT') + ' : ' +
						'<a href="javascript:SUGAR.reports.showWizardStep(0,\'module_select\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_MODULE')+'</a> > ' +
						SUGAR.language.get('Reports','LBL_DEFINE_FILTERS') + ' > ' +
						SUGAR.language.get('Reports','LBL_CHOOSE_DISPLAY_COLS') + ' > ' +
						SUGAR.language.get('Reports','LBL_REPORT_DETAILS') + '<br/><br/>';
				}
				else if (report_type == 'summation') {
					var reportTypeLabel = SUGAR.language.get('Reports','LBL_SUMMATION_REPORT');
					if (isMatrix)
						reportTypeLabel = SUGAR.language.get('Reports','LBL_MATRIX_REPORT');
					document.getElementById('wizard_outline_div').innerHTML = 
						reportTypeLabel + ' : ' +
						'<a href="javascript:SUGAR.reports.showWizardStep(0,\'module_select\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_MODULE')+'</a> > ' +
						SUGAR.language.get('Reports','LBL_DEFINE_FILTERS') + ' > ' +
						SUGAR.language.get('Reports','LBL_SELECT_GROUP_BY') + ' > ' +
						SUGAR.language.get('Reports','LBL_DISPLAY_SUMMARIES') + ' > ' +
						SUGAR.language.get('Reports','LBL_CHART_OPTIONS') + ' > ' +
						SUGAR.language.get('Reports','LBL_REPORT_DETAILS') + '<br/><br/>';
				}
				else if (report_type == 'summation_with_details') {
					document.getElementById('wizard_outline_div').innerHTML = 
						SUGAR.language.get('Reports','LBL_SUMMATION_REPORT_WITH_DETAILS') + ' : ' +
							'<a href="javascript:SUGAR.reports.showWizardStep(0,\'module_select\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_MODULE')+'</a> > ' +
						SUGAR.language.get('Reports','LBL_DEFINE_FILTERS') + ' > ' +
						SUGAR.language.get('Reports','LBL_SELECT_GROUP_BY') + ' > ' +
						SUGAR.language.get('Reports','LBL_DISPLAY_SUMMARIES') + ' > ' +
						SUGAR.language.get('Reports','LBL_CHOOSE_DISPLAY_COLS') + ' > ' +
						SUGAR.language.get('Reports','LBL_CHART_OPTIONS') + ' > ' +
						SUGAR.language.get('Reports','LBL_REPORT_DETAILS') + '<br/><br/>';
				}				
			}		
			//else {
				document.getElementById('wizard_outline_div').innerHTML = document.getElementById('wizard_outline_div').innerHTML.replace(/<b>/gi,'');
				document.getElementById('wizard_outline_div').innerHTML = document.getElementById('wizard_outline_div').innerHTML.replace(/<\/b>/gi,'');
				var currentOutline = document.getElementById('wizard_outline_div').innerHTML;
				var oldCurrLink ='<a href="javascript:SUGAR.reports.showWizardStep(0,\'module_select\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_MODULE')+'</a>';
				var currLink = oldCurrLink.replace(/<a href/i, '<b><a href');	
				currLink = currLink.replace(/<\/a>/i, '</b></a>');	
				document.getElementById('wizard_outline_div').innerHTML = currentOutline.replace(oldCurrLink,currLink);				
			//}
		},
		showWizardStepFilters: function() {
			document.getElementById("report_type_div").style.display="none";
			document.getElementById("module_select_div").style.display="none";
			document.getElementById("filters_div").style.display="";
			document.getElementById("filter_designer_div").style.display="";
			document.getElementById("group_by_div").style.display="none";
			document.getElementById("display_summaries_div").style.display="none";
			document.getElementById("display_cols_div").style.display="none";
			document.getElementById("chart_options_div").style.display="none";
			document.getElementById("report_details_div").style.display="none";			
			if (document.getElementById("resultsDiv"))
				document.getElementById("resultsDiv").style.display="none";
			
			currEditorDiv="filters";	
			
            if (currWizardStep < 3)
            {
                currWizardStep++;
				if (report_type == 'tabular') {
					document.getElementById('wizard_outline_div').innerHTML = 
						SUGAR.language.get('Reports','LBL_ROWS_AND_COLUMNS_REPORT') + ' : ' +
						'<a href="javascript:SUGAR.reports.showWizardStep(0,\'module_select\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_MODULE')+'</a> > ' +
						'<a href="javascript:SUGAR.reports.showWizardStep(0,\'filters\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_DEFINE_FILTERS')+'</a> > ' +
						SUGAR.language.get('Reports','LBL_CHOOSE_DISPLAY_COLS') + ' > ' +
						SUGAR.language.get('Reports','LBL_REPORT_DETAILS') + '<br/><br/>';
				}
				else if (report_type == 'summation') {
					var reportTypeLabel = SUGAR.language.get('Reports','LBL_SUMMATION_REPORT');
					if (isMatrix)
						reportTypeLabel = SUGAR.language.get('Reports','LBL_MATRIX_REPORT');
					document.getElementById('wizard_outline_div').innerHTML = 
						reportTypeLabel + ' : ' +
						'<a href="javascript:SUGAR.reports.showWizardStep(0,\'module_select\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_MODULE')+'</a> > ' +
						'<a href="javascript:SUGAR.reports.showWizardStep(0,\'filters\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_DEFINE_FILTERS')+'</a> > ' +
						SUGAR.language.get('Reports','LBL_SELECT_GROUP_BY') + ' > ' +
						SUGAR.language.get('Reports','LBL_DISPLAY_SUMMARIES') + ' > ' +
						SUGAR.language.get('Reports','LBL_CHART_OPTIONS') + ' > ' +
						SUGAR.language.get('Reports','LBL_REPORT_DETAILS') + '<br/><br/>';
				}
				else if (report_type == 'summation_with_details') {
					document.getElementById('wizard_outline_div').innerHTML = 
						SUGAR.language.get('Reports','LBL_SUMMATION_REPORT_WITH_DETAILS') + ' : ' +
							'<a href="javascript:SUGAR.reports.showWizardStep(0,\'module_select\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_MODULE')+'</a> > ' +
						'<a href="javascript:SUGAR.reports.showWizardStep(0,\'filters\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_DEFINE_FILTERS')+'</a> > ' +
						SUGAR.language.get('Reports','LBL_SELECT_GROUP_BY') + ' > ' +
						SUGAR.language.get('Reports','LBL_DISPLAY_SUMMARIES') + ' > ' +
						SUGAR.language.get('Reports','LBL_CHOOSE_DISPLAY_COLS') + ' > ' +
						SUGAR.language.get('Reports','LBL_CHART_OPTIONS') + ' > ' +
						SUGAR.language.get('Reports','LBL_REPORT_DETAILS') + '<br/><br/>';
				}					
			}
			//else {
				document.getElementById('wizard_outline_div').innerHTML = document.getElementById('wizard_outline_div').innerHTML.replace(/<b>/gi,'');
				document.getElementById('wizard_outline_div').innerHTML = document.getElementById('wizard_outline_div').innerHTML.replace(/<\/b>/gi,'');
				var currentOutline = document.getElementById('wizard_outline_div').innerHTML;
				var oldCurrLink = '<a href="javascript:SUGAR.reports.showWizardStep(0,\'filters\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_DEFINE_FILTERS')+'</a>';
				var currLink = oldCurrLink.replace(/<a href/i, '<b><a href');	
				currLink = currLink.replace(/<\/a>/i, '</b></a>');	
				document.getElementById('wizard_outline_div').innerHTML = currentOutline.replace(oldCurrLink,currLink);				
				
			//}
			//this.module_tree.currentFocus = null;
			//this.module_tree.selModel.clearSelections();
			SUGAR.reports.populateFieldGrid(current_module,"","");
		},
		showWizardStepDisplayColumns: function() {
			document.getElementById("report_type_div").style.display="none";
			document.getElementById("module_select_div").style.display="none";
			document.getElementById("filters_div").style.display="";
			document.getElementById("filter_designer_div").style.display="none";
			document.getElementById("group_by_div").style.display="none";
			document.getElementById("display_summaries_div").style.display="none";
			document.getElementById("display_cols_div").style.display="";
			document.getElementById("chart_options_div").style.display="none";
			document.getElementById("report_details_div").style.display="none";
			if (document.getElementById("resultsDiv"))
				document.getElementById("resultsDiv").style.display="none";
			
			currEditorDiv="display";	

			if (report_type == 'tabular' && currWizardStep < 4) {
				document.getElementById('wizard_outline_div').innerHTML = 
					SUGAR.language.get('Reports','LBL_ROWS_AND_COLUMNS_REPORT') + ' : ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'module_select\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_MODULE')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'filters\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_DEFINE_FILTERS')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'display\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_CHOOSE_DISPLAY_COLS')+'</a> > ' +
					SUGAR.language.get('Reports','LBL_REPORT_DETAILS') + '<br/><br/>';
				currWizardStep++;
				SUGAR.reports.showDisplayColumnsPanel();
			}
			else if (report_type == 'summation_with_details'&& currWizardStep < 6) {
				document.getElementById('wizard_outline_div').innerHTML = 
						SUGAR.language.get('Reports','LBL_SUMMATION_REPORT_WITH_DETAILS') + ' : ' +
						'<a href="javascript:SUGAR.reports.showWizardStep(0,\'module_select\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_MODULE')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'filters\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_DEFINE_FILTERS')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'group_by\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_GROUP_BY')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'display_summaries\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_DISPLAY_SUMMARIES')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'display\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_CHOOSE_DISPLAY_COLS')+'</a> > ' +
					SUGAR.language.get('Reports','LBL_CHART_OPTIONS') + ' > ' +
					SUGAR.language.get('Reports','LBL_REPORT_DETAILS') + '<br/><br/>';
					currWizardStep++;
					SUGAR.reports.showDisplayColumnsPanel();
			}
			//else {
				document.getElementById('wizard_outline_div').innerHTML = document.getElementById('wizard_outline_div').innerHTML.replace(/<b>/gi,'');
				document.getElementById('wizard_outline_div').innerHTML = document.getElementById('wizard_outline_div').innerHTML.replace(/<\/b>/gi,'');
				var currentOutline = document.getElementById('wizard_outline_div').innerHTML;
				var oldCurrLink ='<a href="javascript:SUGAR.reports.showWizardStep(0,\'display\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_CHOOSE_DISPLAY_COLS')+'</a>';
				var currLink = oldCurrLink.replace(/<a href/i, '<b><a href');	
				currLink = currLink.replace(/<\/a>/i, '</b></a>');	
				document.getElementById('wizard_outline_div').innerHTML = currentOutline.replace(oldCurrLink,currLink);				
			//}					
			//this.module_tree.selModel.clearSelections();
			SUGAR.reports.populateFieldGrid(current_module,"","");
		},
		showWizardStepReportDetails: function() {
			document.getElementById("report_type_div").style.display="none";
			document.getElementById("module_select_div").style.display="none";
			document.getElementById("filters_div").style.display="none";
			document.getElementById("filter_designer_div").style.display="none";
			document.getElementById("group_by_div").style.display="none";
			document.getElementById("display_summaries_div").style.display="none";
			document.getElementById("display_cols_div").style.display="none";
			document.getElementById("chart_options_div").style.display="none";
			document.getElementById("report_details_div").style.display="";
			if (document.getElementById("resultsDiv"))
				document.getElementById("resultsDiv").style.display="";
			
			currEditorDiv="report_details";
			currWizardStep++;
			if (report_type == 'tabular') {
				document.getElementById('wizard_outline_div').innerHTML = 
					SUGAR.language.get('Reports','LBL_ROWS_AND_COLUMNS_REPORT') + ' : ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'module_select\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_MODULE')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'filters\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_DEFINE_FILTERS')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'display\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_CHOOSE_DISPLAY_COLS')+'</a> > ' +
					'<b><a href="javascript:SUGAR.reports.showWizardStep(0,\'report_details\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_REPORT_DETAILS')+'</a></b><br/><br/>';
			}
			else if (report_type == 'summation') {
				var reportTypeLabel = SUGAR.language.get('Reports','LBL_SUMMATION_REPORT');
				if (isMatrix)
					reportTypeLabel = SUGAR.language.get('Reports','LBL_MATRIX_REPORT');
				document.getElementById('wizard_outline_div').innerHTML = 
					reportTypeLabel + ' : ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'module_select\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_MODULE')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'filters\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_DEFINE_FILTERS')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'group_by\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_GROUP_BY')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'display_summaries\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_DISPLAY_SUMMARIES')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'chart_options\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_CHART_OPTIONS')+'</a> > ' +
					'<b><a href="javascript:SUGAR.reports.showWizardStep(0,\'report_details\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_REPORT_DETAILS')+'</a></b><br/><br/>';
				if (isMatrix && group_defs && group_defs.length == 3) {
					document.getElementById('matrixLayoutRow').style.display="";
					for (var i = 0; i < document.getElementById('layout_options').options.length; i++) {
						if (document.getElementById('layout_options').options[i].value == layout_options)
							document.getElementById('layout_options').options[i].selected = true;
					}
				}
				else if (isMatrix && group_defs && group_defs.length < 3) {
					document.getElementById('matrixLayoutRow').style.display="none";
				}
				
			}
			else if (report_type == 'summation_with_details') {
				document.getElementById('wizard_outline_div').innerHTML = 
					SUGAR.language.get('Reports','LBL_SUMMATION_REPORT_WITH_DETAILS') + ' : ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'module_select\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_MODULE')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'filters\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_DEFINE_FILTERS')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'group_by\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_GROUP_BY')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'display_summaries\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_DISPLAY_SUMMARIES')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'display\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_CHOOSE_DISPLAY_COLS')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'chart_options\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_CHART_OPTIONS')+'</a> > ' +
					'<b><a href="javascript:SUGAR.reports.showWizardStep(0,\'report_details\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_REPORT_DETAILS')+'</a></b><br/><br/>';
			}	
			SUGAR.reports.addOptionalSelect();	
		},
		showWizardStepGroupBy: function() {
			document.getElementById("report_type_div").style.display="none";
			document.getElementById("module_select_div").style.display="none";
			document.getElementById("filters_div").style.display="";
			document.getElementById("filter_designer_div").style.display="none";
			document.getElementById("group_by_div").style.display="";
			document.getElementById("display_summaries_div").style.display="none";
			document.getElementById("display_cols_div").style.display="none";
			document.getElementById("chart_options_div").style.display="none";
			document.getElementById("report_details_div").style.display="none";			
			if (document.getElementById("resultsDiv"))
				document.getElementById("resultsDiv").style.display="none";

			
			currEditorDiv="group_by";	
			if (report_type == 'summation' && currWizardStep < 4) {
				var reportTypeLabel = SUGAR.language.get('Reports','LBL_SUMMATION_REPORT');
				if (isMatrix)
					reportTypeLabel = SUGAR.language.get('Reports','LBL_MATRIX_REPORT');
				document.getElementById('wizard_outline_div').innerHTML = 
					reportTypeLabel + ' : ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'module_select\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_MODULE')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'filters\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_DEFINE_FILTERS')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'group_by\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_GROUP_BY')+'</a> > ' +
					SUGAR.language.get('Reports','LBL_DISPLAY_SUMMARIES') + ' > ' +
					SUGAR.language.get('Reports','LBL_CHART_OPTIONS') + ' > ' +
					SUGAR.language.get('Reports','LBL_REPORT_DETAILS') + '<br/><br/>';
				currWizardStep++;
				SUGAR.reports.showGroupByColumns();
				SUGAR.reports.showDisplaySummaries();
				document.getElementById("display_summaries_div").style.display="none";
				
			}
			else if (report_type == 'summation_with_details' && currWizardStep < 4) {
				document.getElementById('wizard_outline_div').innerHTML = 
					SUGAR.language.get('Reports','LBL_SUMMATION_REPORT_WITH_DETAILS') + ' : ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'module_select\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_MODULE')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'filters\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_DEFINE_FILTERS')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'group_by\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_GROUP_BY')+'</a> > ' +
					SUGAR.language.get('Reports','LBL_DISPLAY_SUMMARIES') + ' > ' +
					SUGAR.language.get('Reports','LBL_CHOOSE_DISPLAY_COLS') + ' > ' +
					SUGAR.language.get('Reports','LBL_CHART_OPTIONS') + ' > ' +
					SUGAR.language.get('Reports','LBL_REPORT_DETAILS') + '<br/><br/>';
				currWizardStep++;
				SUGAR.reports.showGroupByColumns();			
				SUGAR.reports.showDisplaySummaries();
				document.getElementById("display_summaries_div").style.display="none";
			}
			//else {
				document.getElementById('wizard_outline_div').innerHTML = document.getElementById('wizard_outline_div').innerHTML.replace(/<b>/gi,'');
				document.getElementById('wizard_outline_div').innerHTML = document.getElementById('wizard_outline_div').innerHTML.replace(/<\/b>/gi,'');
				var currentOutline = document.getElementById('wizard_outline_div').innerHTML;
				var oldCurrLink ='<a href="javascript:SUGAR.reports.showWizardStep(0,\'group_by\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_GROUP_BY')+'</a>';
				var currLink = oldCurrLink.replace(/<a href/i, '<b><a href');	
				currLink = currLink.replace(/<\/a>/i, '</b></a>');	
				document.getElementById('wizard_outline_div').innerHTML = currentOutline.replace(oldCurrLink,currLink);				
			//}			
			//this.module_tree.selModel.clearSelections();
			SUGAR.reports.populateFieldGrid(current_module,"","");
		},
		showWizardStepDisplaySummaries: function() {
			document.getElementById("report_type_div").style.display="none";
			document.getElementById("module_select_div").style.display="none";
			document.getElementById("filters_div").style.display="";
			document.getElementById("filter_designer_div").style.display="none";
			document.getElementById("group_by_div").style.display="none";
			document.getElementById("display_summaries_div").style.display="";
			document.getElementById("display_cols_div").style.display="none";
			document.getElementById("chart_options_div").style.display="none";
			document.getElementById("report_details_div").style.display="none";
			if (document.getElementById("resultsDiv"))
				document.getElementById("resultsDiv").style.display="none";

						
			currEditorDiv="display_summaries";	
			if (report_type == 'summation' && currWizardStep < 5) {
				var reportTypeLabel = SUGAR.language.get('Reports','LBL_SUMMATION_REPORT');
				if (isMatrix)
					reportTypeLabel = SUGAR.language.get('Reports','LBL_MATRIX_REPORT');
				document.getElementById('wizard_outline_div').innerHTML = 
					reportTypeLabel + ' : ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'module_select\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_MODULE')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'filters\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_DEFINE_FILTERS')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'group_by\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_GROUP_BY')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'display_summaries\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_DISPLAY_SUMMARIES')+'</a> > ' +
					SUGAR.language.get('Reports','LBL_CHART_OPTIONS') + ' > ' +
					SUGAR.language.get('Reports','LBL_REPORT_DETAILS') + '<br/><br/>';
				currWizardStep++;
			}			
			else if (report_type == 'summation_with_details' && currWizardStep < 5) {
				document.getElementById('wizard_outline_div').innerHTML = 
					SUGAR.language.get('Reports','LBL_SUMMATION_REPORT_WITH_DETAILS') + ' : ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'module_select\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_MODULE')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'filters\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_DEFINE_FILTERS')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'group_by\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_GROUP_BY')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'display_summaries\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_DISPLAY_SUMMARIES')+'</a> > ' +
					SUGAR.language.get('Reports','LBL_CHOOSE_DISPLAY_COLS') + ' > ' +
					SUGAR.language.get('Reports','LBL_CHART_OPTIONS') + ' > ' +
					SUGAR.language.get('Reports','LBL_REPORT_DETAILS') + '<br/><br/>';
				currWizardStep++;
			}		
			//else {
				document.getElementById('wizard_outline_div').innerHTML = document.getElementById('wizard_outline_div').innerHTML.replace(/<b>/gi,'');
				document.getElementById('wizard_outline_div').innerHTML = document.getElementById('wizard_outline_div').innerHTML.replace(/<\/b>/gi,'');
				var currentOutline = document.getElementById('wizard_outline_div').innerHTML;
				var oldCurrLink ='<a href="javascript:SUGAR.reports.showWizardStep(0,\'display_summaries\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_DISPLAY_SUMMARIES')+'</a>';
				var currLink = oldCurrLink.replace(/<a href/i, '<b><a href');	
				currLink = currLink.replace(/<\/a>/i, '</b></a>');	
				document.getElementById('wizard_outline_div').innerHTML = currentOutline.replace(oldCurrLink,currLink);				
			//}			
				
			//this.module_tree.selModel.clearSelections();
			SUGAR.reports.populateFieldGrid(current_module,"","");
		},
		showWizardStepChartOptions: function() {
			document.getElementById("report_type_div").style.display="none";
			document.getElementById("module_select_div").style.display="none";
			document.getElementById("filters_div").style.display="none";
			document.getElementById("filter_designer_div").style.display="none";
			document.getElementById("group_by_div").style.display="none";
			document.getElementById("display_summaries_div").style.display="none";
			document.getElementById("display_cols_div").style.display="none";
			document.getElementById("chart_options_div").style.display="";
			document.getElementById("report_details_div").style.display="none";
			if (document.getElementById("resultsDiv"))
				document.getElementById("resultsDiv").style.display="none";

			currEditorDiv="chart_options";


			if(group_defs.length == 1 && document.getElementById('chart_type').options.length > 5) {
				chartTypesHolder.push(document.getElementById('chart_type').options[5]);
				document.getElementById('chart_type').options.length = 5;
			}
			else if (group_defs.length > 1 && document.getElementById('chart_type').options.length < 6) {
				document.getElementById('chart_type').options[5] = chartTypesHolder.pop();		
			}
			if (report_type == 'summation' && currWizardStep < 6) {
				var reportTypeLabel = SUGAR.language.get('Reports','LBL_SUMMATION_REPORT');
				if (isMatrix)
					reportTypeLabel = SUGAR.language.get('Reports','LBL_MATRIX_REPORT');
				document.getElementById('wizard_outline_div').innerHTML = 
					reportTypeLabel + ' : ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'module_select\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_MODULE')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'filters\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_DEFINE_FILTERS')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'group_by\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_GROUP_BY')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'display_summaries\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_DISPLAY_SUMMARIES')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'chart_options\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_CHART_OPTIONS')+'</a> > ' +
					SUGAR.language.get('Reports','LBL_REPORT_DETAILS') + '<br/><br/>';
				currWizardStep++;
			}
			else if (report_type == 'summation_with_details' && currWizardStep < 7) {
				document.getElementById('wizard_outline_div').innerHTML = 
					SUGAR.language.get('Reports','LBL_SUMMATION_REPORT_WITH_DETAILS') + ' : ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'module_select\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_MODULE')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'filters\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_DEFINE_FILTERS')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'group_by\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_SELECT_GROUP_BY')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'display_summaries\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_DISPLAY_SUMMARIES')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'display\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_CHOOSE_DISPLAY_COLS')+'</a> > ' +
					'<a href="javascript:SUGAR.reports.showWizardStep(0,\'chart_options\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_CHART_OPTIONS')+'</a> > ' +
					SUGAR.language.get('Reports','LBL_REPORT_DETAILS') + '<br/><br/>';
				currWizardStep++;
			}			
			//else {
				document.getElementById('wizard_outline_div').innerHTML = document.getElementById('wizard_outline_div').innerHTML.replace(/<b>/gi,'');
				document.getElementById('wizard_outline_div').innerHTML = document.getElementById('wizard_outline_div').innerHTML.replace(/<\/b>/gi,'');
				var currentOutline = document.getElementById('wizard_outline_div').innerHTML;
				var oldCurrLink ='<a href="javascript:SUGAR.reports.showWizardStep(0,\'chart_options\');" id="report_type_outline">'+ SUGAR.language.get('Reports','LBL_CHART_OPTIONS')+'</a>';
				var currLink = oldCurrLink.replace(/<a href/i, '<b><a href');	
				currLink = currLink.replace(/<\/a>/i, '</b></a>');	
				document.getElementById('wizard_outline_div').innerHTML = currentOutline.replace(oldCurrLink,currLink);				
			//}			
			
		},
		setNumericalChartColumnType: function() {
			for (var i = 0; i < summary_columns.length; i++) {
				if (summary_columns[i].group_function && (summary_columns[i].table_key+":"+ summary_columns[i].name+ ":" +summary_columns[i].group_function == document.ReportsWizardForm.numerical_chart_column.value)) {
					document.ReportsWizardForm.numerical_chart_column_type.value = summary_columns[i].field_type;
					return;
				}
			}
		},
		saveChartOptions: function() {
			chart_type = document.ReportsWizardForm.chart_type.value;
			chart_description = document.ReportsWizardForm.chart_description.value;
			numerical_chart_column = document.ReportsWizardForm.numerical_chart_column.value;
			do_round = document.ReportsWizardForm.do_round.checked ? 1 : 0;
			SUGAR.reports.setNumericalChartColumnType();
		},
		saveCurrentStep: function() {
			switch(currEditorDiv){
					case "filters":
						if (!SUGAR.reports.saveFilters())
							return false;
						break;
					case "group_by":
						if (!SUGAR.reports.saveGroupBy())
							return false;
						// For the case when you come back to a report and delete all the group-bys.	
						if (group_defs.length == 0 && summary_columns.length > 0 && !SUGAR.reports.saveDisplaySummaries()) 
							return false;							
						if (group_defs.length > 0 && !SUGAR.reports.saveDisplaySummaries())
							return false;
						break;						
					case "display_summaries":
						if (!SUGAR.reports.saveDisplaySummaries())
							return false;
						break;
					case "display":
						if (!SUGAR.reports.saveDisplayColumns())
							return false;
						break;
					case "chart_options":
						SUGAR.reports.saveChartOptions();
						break;
					case "report_details":
						//SUGAR.reports.showWizardStepChartOptions()
						break;
			}
			return true;
		},
		showWizardNamedStep: function (stepName) {
			switch(stepName) {
				case "report_type":
					SUGAR.reports.showWizardStepReportType();
					break;
				case "module_select":
					SUGAR.reports.showWizardStepModuleSelect();
					break;
				case "filters":
					SUGAR.reports.showWizardStepFilters();
					break;
				case "display":
					SUGAR.reports.showWizardStepDisplayColumns();
					break;
				case "report_details":
					SUGAR.reports.showWizardStepReportDetails()
					break;
				case "group_by":
					SUGAR.reports.showWizardStepGroupBy();
					break;
				case "display_summaries":
					SUGAR.reports.showWizardStepDisplaySummaries();
					break;
				case "chart_options":
					SUGAR.reports.showWizardStepChartOptions();
			}			
		},
		showWizardStepTabular: function(isPrev, stepName) {
			if (stepName) {
				return SUGAR.reports.showWizardNamedStep(stepName);
			}
			if (isPrev) {
				switch(currEditorDiv){
					case "":
						SUGAR.reports.showWizardStepReportType();
						break;
					case "report_type":
						SUGAR.reports.showWizardStepReportType();
						break;
					case "module_select":
						SUGAR.reports.showWizardStepReportType();
						break;
					case "filters":
						SUGAR.reports.showWizardStepModuleSelect();
						break;
					case "display":
						SUGAR.reports.showWizardStepFilters();
						break;
					case "report_details":
						SUGAR.reports.showWizardStepDisplayColumns()
						break;
				}
			}
			else { //Next
				switch(currEditorDiv){
					case "":
						SUGAR.reports.showWizardStepModuleSelect();
						break;
					case "report_type":
						SUGAR.reports.showWizardStepModuleSelect();
						break;
					case "module_select":
						SUGAR.reports.showWizardStepFilters();
						break;
					case "filters":
						SUGAR.reports.showWizardStepDisplayColumns();
						break;
					case "display":
						SUGAR.reports.showWizardStepReportDetails();
						break;
				}				
			}	
		},
		showWizardStepSummationWithDetails: function(isPrev, stepName) {
			if (stepName) 
				return SUGAR.reports.showWizardNamedStep(stepName);			
			if (isPrev) {
				switch(currEditorDiv){
					case "":
						SUGAR.reports.showWizardStepReportType();
						break;
					case "report_type":
						SUGAR.reports.showWizardStepReportType();
						break;
					case "module_select":
						SUGAR.reports.showWizardStepReportType();
						break;
					case "filters":
						SUGAR.reports.showWizardStepModuleSelect();
						break;
					case "group_by":
						SUGAR.reports.showWizardStepFilters();
						break;						
					case "display_summaries":
						SUGAR.reports.showWizardStepGroupBy();
						break;
					case "display":
						SUGAR.reports.showWizardStepDisplaySummaries();
						break;
					case "chart_options":
						SUGAR.reports.showWizardStepDisplayColumns();
						break;
					case "report_details":
						SUGAR.reports.showWizardStepChartOptions()
						break;
				}
			}
			else { //Next
				switch(currEditorDiv){
					case "":
						SUGAR.reports.showWizardStepModuleSelect();
						break;
					case "report_type":
						SUGAR.reports.showWizardStepModuleSelect();
						break;
					case "module_select":
						SUGAR.reports.showWizardStepFilters();
						break;
					case "filters":
						SUGAR.reports.showWizardStepGroupBy();
						break;
					case "group_by":
						SUGAR.reports.showWizardStepDisplaySummaries();
						break;
					case "display_summaries":
						SUGAR.reports.showWizardStepDisplayColumns();
						break;
					case "display":
						SUGAR.reports.showWizardStepChartOptions();
						break;
					case "chart_options":
						SUGAR.reports.showWizardStepReportDetails();
						break;

				}				
			}	
		},		
		
		showWizardStepSummation: function(isPrev, stepName) {
			if (stepName) 
				return SUGAR.reports.showWizardNamedStep(stepName);			
			if (isPrev) {
				switch(currEditorDiv){
					case "":
						SUGAR.reports.showWizardStepReportType();
						break;
					case "report_type":
						SUGAR.reports.showWizardStepReportType();
						break;
					case "module_select":
						SUGAR.reports.showWizardStepReportType();
						break;
					case "filters":
						SUGAR.reports.showWizardStepModuleSelect();
						break;
					case "group_by":
						SUGAR.reports.showWizardStepFilters();
						break;						
					case "display_summaries":
						SUGAR.reports.showWizardStepGroupBy();
						break;
					case "chart_options":
						SUGAR.reports.showWizardStepDisplaySummaries();
						break;
					case "report_details":
						SUGAR.reports.showWizardStepChartOptions()
						break;
				}
			}
			else { //Next
				switch(currEditorDiv){
					case "":
						SUGAR.reports.showWizardStepModuleSelect();
						break;
					case "report_type":
						SUGAR.reports.showWizardStepModuleSelect();
						break;
					case "module_select":
						SUGAR.reports.showWizardStepFilters();
						break;
					case "filters":
						SUGAR.reports.showWizardStepGroupBy();
						break;
					case "group_by":
						SUGAR.reports.showWizardStepDisplaySummaries();
						break;
					case "display_summaries":
						SUGAR.reports.showWizardStepChartOptions();
						break;
					case "chart_options":
						SUGAR.reports.showWizardStepReportDetails();
						break;

				}				
			}	
		},		

		showWizardStep: function(isPrev, stepName) {
            var isValid = SUGAR.reports.saveCurrentStep();
			if (!isValid && !stepName)
				return false;
			if (isValid && report_type == 'tabular')
				SUGAR.reports.showWizardStepTabular(isPrev, stepName);
			else if (isValid && report_type == 'summation')
				SUGAR.reports.showWizardStepSummation(isPrev, stepName);			
			else if (isValid && report_type == 'summation_with_details')
				SUGAR.reports.showWizardStepSummationWithDetails(isPrev, stepName);			
		},
		prepareReportForProcessing: function() {
			var report_def = new Object;
			var panels = SUGAR.FiltersWidget.getPanels();
			for (i in full_table_list) {
				if (i != 'self') {
					var checkbox = document.getElementById("outer_join_checkbox_" + i); 
					if (checkbox && checkbox.checked)
						full_table_list[i].optional = true;
				}

			}
			/*
			var outer_join_select = document.getElementById('outer_join_select');
			for (var i=0; i < outer_join_select.options.length; i++) {
				if (outer_join_select.options[i].selected)
					full_table_list[outer_join_select.options[i].value].optional = true;
			}
			*/
			if (display_cols.length == 0 && report_type!='summation') {
				alert(SUGAR.language.get('Reports','LBL_AT_LEAST_ONE_DISPLAY_COLUMN'));
				return false;
			}
			if (summary_columns.length == 0 && report_type != 'tabular') {
				alert(SUGAR.language.get('Reports','LBL_AT_LEAST_ONE_SUMMARY_COLUMN'));
				return false;
			}
			if (group_defs.length < 2 && isMatrix) {
				alert(SUGAR.language.get('Reports', 'LBL_MINIMUM_2_GROUP_BY'));
				return false;
			}
			if (group_defs.length > 3 && isMatrix) {
				alert(SUGAR.language.get('Reports', 'LBL_MAXIMUM_3_GROUP_BY'));
				return false;
			}
			
			//if (display_cols.length > 0)
				report_def.display_columns = display_cols;
			report_def.module = current_module;
			//if (group_defs.length > 0)
				report_def.group_defs = group_defs;
			//if (summary_columns.length > 0)
				report_def.summary_columns = summary_columns;
			if (order_by.length > 0)
				report_def.order_by = order_by;
			if (summary_order_by.length > 0 && report_type == 'summation')
				report_def.summary_order_by = summary_order_by;

			report_def.report_name = document.ReportsWizardForm.save_report_as.value;
			report_def.chart_type = chart_type;
			report_def.do_round = do_round;
			report_def.chart_description = chart_description;			
			report_def.numerical_chart_column = document.ReportsWizardForm.numerical_chart_column.value;
			report_def.numerical_chart_column_type = document.ReportsWizardForm.numerical_chart_column_type.value;
		  	report_def.assigned_user_id = document.ReportsWizardForm.assigned_user_id.value;

			if (report_type != 'tabular')
				report_def.report_type = 'summary';
			else
				report_def.report_type = report_type;
			if (isMatrix && group_defs.length == 3) {
				report_def.layout_options = document.ReportsWizardForm.layout_options.value;
			}
			else if (isMatrix && group_defs.length == 2) {
				report_def.layout_options = '2x2';
			}


			var got_sort = 1;
			if (document.ReportsWizardForm.sort_by.value == "") {
				got_sort = 0;
			} // if
			var got_summary_sort = 1;
			if (document.ReportsWizardForm.summary_sort_by.value == "") {
				got_summary_sort = 0;
			} // if
			// set sorting
			var sort_by = new Array();
			var summary_sort_by = new Array();
			var sort_dir = new Array();
			var summary_sort_dir = new Array();
			if (got_sort == 0 ) {
				document.ReportsWizardForm.sort_by.value = '';
				document.ReportsWizardForm.sort_dir.value = '';
			} else {
				
				var sort_by_elem = new Object();
				var sort_by_elem = SUGAR.reports.getFieldDef(document.ReportsWizardForm.sort_by.value);
				sort_by_elem.table_key = SUGAR.reports.getLinkedFieldName(document.ReportsWizardForm.sort_by.value);
				sort_by_elem.sort_dir = document.ReportsWizardForm.sort_dir.value;
				sort_by.push(sort_by_elem);
				report_def.order_by = sort_by;
			} 

			if (got_summary_sort == 0) {
				document.ReportsWizardForm.summary_sort_by.value = '';
				document.ReportsWizardForm.summary_sort_dir.value = '';
			} else {
				//todo; handle summary sort when row is deleted
				var summary_sort_by_elem = new Object();
				var key_arr = document.ReportsWizardForm.summary_sort_by.value.split(':');
				var summaryFieldObj = SUGAR.reports.getLinkedFieldSummaryName(document.ReportsWizardForm.summary_sort_by.value);
				var summaryFieldModule = full_table_list[summaryFieldObj.table_key].module;
				var summaryFieldLink = summaryFieldObj.table_key;
				var summaryFieldName = summaryFieldObj.field_name;
				if ( typeof(SUGAR.reports.getListFieldDef(summaryFieldName,summaryFieldLink,summaryFieldModule).group_function) != 'undefined' && summaryFieldName != 'count') {
					summary_sort_by_elem.name = key_arr[key_arr.length-2];
					summary_sort_by_elem.group_function = SUGAR.reports.getListFieldDef(summaryFieldName,summaryFieldLink,summaryFieldModule).group_function;
					summary_sort_by_elem.column_function = key_arr[2];
				} else if (typeof(SUGAR.reports.getListFieldDef(summaryFieldName,summaryFieldLink,summaryFieldModule).column_function) != 'undefined') {
					summary_sort_by_elem.name = key_arr[key_arr.length-2];
					summary_sort_by_elem.group_function = SUGAR.reports.getListFieldDef(summaryFieldName,summaryFieldLink,summaryFieldModule).column_function;
					summary_sort_by_elem.column_function = key_arr[2];
				} // else if
				else {
					summary_sort_by_elem = SUGAR.reports.getFieldDef(document.ReportsWizardForm.summary_sort_by.value);
				}
				summary_sort_by_elem.table_key = summaryFieldLink;
				summary_sort_by_elem.sort_dir = document.ReportsWizardForm.summary_sort_dir.value;
				summary_sort_by.push(summary_sort_by_elem);
				report_def.summary_order_by = summary_sort_by;
			} // else
			
			report_def.full_table_list = full_table_list;
			report_def_str = YAHOO.lang.JSON.stringify(report_def);
			document.ReportsWizardForm.report_def.value = report_def_str;
			filters_defs_str = YAHOO.lang.JSON.stringify(filters_defs);
			document.ReportsWizardForm.filters_defs.value = filters_defs_str;
			panels_def_str = YAHOO.lang.JSON.stringify(panels);
			document.ReportsWizardForm.panels_def.value = panels_def_str;
			return true;
		},
		
		getLinkedFieldName : function(sortByValue) {
			var moduleArray = sortByValue.split(":");
			if (moduleArray.length <= 1) {
				sortByValue = "self:" + sortByValue;
				moduleArray = sortByValue.split(":");
			} // if
			var linkedFieldName = "";
			for (i = 0 ; i < (moduleArray.length - 1) ; i++) {
				if (moduleArray[i] == 'self') {
					return moduleArray[i];
				} else {
					if (linkedFieldName.length > 0) {
						linkedFieldName = linkedFieldName + ":";
					} // if
					linkedFieldName = linkedFieldName + moduleArray[i];
				} // else
			} // for
			return linkedFieldName;
		},
		
		getLinkedFieldSummaryName : function(sortByValue) {
			var moduleArray = sortByValue.split(":");
			if (moduleArray.length <= 1) {
				sortByValue = "self:" + sortByValue;
				moduleArray = sortByValue.split(":");
			} // if
			var linkFieldObj = new Object();
			var linkedFieldName = "";
			for (i = 0 ; i < (moduleArray.length - 1) ; i++) {
				/*
				if (moduleArray[i] == 'self') {
					linkedFieldName = moduleArray[i];
					break;
				} else {
					*/
					if (linkedFieldName.length > 0) {
						linkedFieldName = linkedFieldName + ":";
					} // if
					linkedFieldName = linkedFieldName + moduleArray[i];
			//	} // else
			} // for
			if (full_table_list[linkedFieldName]) {
				linkFieldObj.table_key = linkedFieldName;
				linkFieldObj.field_name = moduleArray[moduleArray.length - 1];
				return linkFieldObj;
			}
			else {
				linkFieldObj.field_name = moduleArray[moduleArray.length - 2] + ":" + moduleArray[moduleArray.length - 1];
				moduleArray.splice(moduleArray.length - 2,2);
				linkFieldObj.table_key = moduleArray.join(':');
				return linkFieldObj;
			}
		},		
		
		checkReportDetails: function() {
			if (trim(document.ReportsWizardForm.save_report_as.value) == "") {
				alert(SUGAR.language.get('Reports', 'LBL_REPORT_NAME') + SUGAR.language.get('Reports', 'LBL_CANNOT_BE_EMPTY'));
				return false;
			}
			if (trim(document.ReportsWizardForm.assigned_user_name.value) == "") {
				alert(SUGAR.language.get('Reports', 'LBL_OWNER') + SUGAR.language.get('Reports', 'LBL_CANNOT_BE_EMPTY'));
				return false;
			}
			if(!is_primary_team_selected('ReportsWizardForm', 'team_name')) {
			   alert(SUGAR.language.get('app_strings', 'ERR_NO_PRIMARY_TEAM_SPECIFIED'));
			   return false;
			}
			
			return true;
		},
		saveReport: function() {
			if (!SUGAR.reports.saveCurrentStep())			
				return false;
			if (SUGAR.reports.checkReportDetails()) {
				document.ReportsWizardForm.save_report.value = 'on';
				document.ReportsWizardForm.current_step.value = currEditorDiv;
				if (SUGAR.reports.prepareReportForProcessing()) 
					document.ReportsWizardForm.submit();
			}
		},		
		deleteReport: function() {
			if (confirm(SUGAR.language.get('app_strings','NTC_DELETE_CONFIRMATION'))) {
				document.ReportsWizardForm.is_delete.value="1";
				document.ReportsWizardForm.submit();
			}
		},
		runReport: function() {
			if (!SUGAR.reports.saveCurrentStep())			
				return false;
			if (SUGAR.reports.checkReportDetails()) {
				document.ReportsWizardForm.save_report.value = 'on';
				document.ReportsWizardForm.save_and_run_query.value = 'on';
				if (SUGAR.reports.prepareReportForProcessing())
					document.ReportsWizardForm.submit();
			}
		},
		previewReport: function() {
			if (!SUGAR.reports.saveCurrentStep())			
				return false;
			document.ReportsWizardForm.run_query.value = 1;
			SUGAR.reports.saveFilters();
			if (SUGAR.reports.prepareReportForProcessing()) {
				document.ReportsWizardForm.submit();
			}
		},
		orderBySelected: function(rowNum, sortDir) {
			if (displayColOrderBySelectedRow != -1 && (document.getElementById("orderByDirectionDiv_" + displayColOrderBySelectedRow))) {
				document.getElementById("orderByDirectionDiv_" + displayColOrderBySelectedRow).style.display = 'none';
			}
			var directionSpan = document.getElementById("orderByDirectionDiv_" + rowNum);
			directionSpan.innerHTML = '<select id="orderByDirection"><option value="a">'+ SUGAR.language.get('Reports','LBL_ASCENDING') + '</option>' +
					'<option value="d">'+ SUGAR.language.get('Reports','LBL_DESCENDING') + '</option></select>';
			if (typeof(sortDir) != 'undefined') {
				if (sortDir == 'a')	
					document.getElementById("orderByDirection").selectedIndex = 0;
				else
					document.getElementById("orderByDirection").selectedIndex = 1;

			}
			else {
				document.getElementById("orderByDirection").selectedIndex = 0;
			}
			directionSpan.style.display = "";
			displayColOrderBySelectedRow = rowNum;
		
		},
		summaryOrderBySelected : function(rowNum, sortDir) {
			if (displaySummaryOrderBySelectedRow != -1 && (document.getElementById("summaryOrderByDirectionDiv_" + displaySummaryOrderBySelectedRow))) {
				document.getElementById("summaryOrderByDirectionDiv_" + displaySummaryOrderBySelectedRow).style.display = 'none';
			}
			var directionSpan = document.getElementById("summaryOrderByDirectionDiv_" + rowNum);
			directionSpan.innerHTML = '<select id="summaryOrderByDirection"><option value="a">'
					+ SUGAR.language.get('Reports', 'LBL_ASCENDING')
					+ '</option>'
					+ '<option value="d">'
					+ SUGAR.language.get('Reports', 'LBL_DESCENDING')
					+ '</option></select>';
			if (typeof (sortDir) != 'undefined') {
				if (sortDir == 'a')
					document.getElementById("summaryOrderByDirection").selectedIndex = 0;
				else
					document.getElementById("summaryOrderByDirection").selectedIndex = 1;

			} else {
				document.getElementById("summaryOrderByDirection").selectedIndex = 0;
			}
			directionSpan.style.display = "";
			displaySummaryOrderBySelectedRow = rowNum;
		},
		
		addFieldToGroupBy: function(e) {
			totalGroupByRows++;
			var table = document.getElementById('groupByTable');
			if (document.getElementById('group_by_help_row')) {
				var tBody = table.childNodes[0];
				tBody.removeChild(document.getElementById('group_by_help_row'));
			}
			
			if (table.rows.length == 4 && isMatrix) {
				alert(SUGAR.language.get('Reports', 'LBL_MAXIMUM_3_GROUP_BY'));
				return false;
			}
			var id = 'group_by_row_' + totalGroupByRows;
			var row = table.insertRow(table.rows.length);
			row.setAttribute('id', id);
			var cell = row.insertCell(0);
			cell.setAttribute('scope', 'row');
			var record = e.getRecord(e.getSelectedRows()[0]);

			cell.innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;<input type='hidden' id='group_by_row_"+ totalGroupByRows+"_module' value='"+
				record.getData('module_name') +"'>" +
				"<input type='hidden' id='group_by_row_" + totalGroupByRows+"_link' value='"+
				record.getData('parents_link') + "'>" +
				"<input type='hidden' id='group_by_row_" +totalGroupByRows +"_field' value='"+
				record.getData('field_name') +"'>";

			var cell = row.insertCell(1);
			cell.setAttribute('scope', 'row');
			var colLabel = record.getData('parents') + " > " +
				record.getData('field_label');
			cell.innerHTML = colLabel;
			cell.setAttribute("onmouseover", "this.style.cursor = 'move'");
			
			cell = row.insertCell(2);
			cell.setAttribute('scope', 'row');
			cell.innerHTML = "&nbsp;&nbsp;<img onclick='SUGAR.reports.deleteGroupBy(\"group_by_row_" +totalGroupByRows + "\")' src='index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=delete_inline.gif' alt='"+SUGAR.language.get("Reports", "LBL_REMOVE")+"'>";
			SUGAR.reports.addToFullTableList('group_by_row_' + totalGroupByRows,fieldGridCell.getRecord(fieldGridCell.getSelectedRows()[0]).getData('parents'));	
			var dd11 = YAHOO.util.Dom.get(id);
	        dd11.dd = new SUGAR.reports.reportDDProxy(id, 'groupBy');
					
			SUGAR.reports.addFieldToDisplaySummaries(e, 'group_by_row_' + totalGroupByRows);
		},	
			
		addFieldToDisplaySummaries: function(e, linkedGroupById) {
			totalDisplayColRows++;
			var table = document.getElementById('displaySummariesTable');
			if (document.getElementById('display_summary_help_row')) {
				var tBody = table.childNodes[0];
				tBody.removeChild(document.getElementById('display_summary_help_row'));
			}

			var row = table.insertRow(table.rows.length);
			if (typeof(linkedGroupById) != 'undefined')
				id = 'display_summaries_row_' + linkedGroupById;
			else 
				id = 'display_summaries_row_' + totalDisplayColRows;

			row.setAttribute('id', id);

			var cell = row.insertCell(0);
			cell.setAttribute('scope', 'row');
			var record = e.getRecord(e.getSelectedRows()[0]);
			cell.innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;<input type='hidden' id='"+ id+"_module' value='"+
				record.getData('module_name') +"'>" +
				"<input type='hidden' id='" + id+"_link' value='"+
				record.getData('parents_link') + "'>" +
				"<input type='hidden' id='" + id+"_field' value='"+
				record.getData('field_name') + "'>";
							
			var cell = row.insertCell(1);
			cell.setAttribute('scope', 'row');
			var colLabel = record.getData('parents') + " > " +
				record.getData('field_label');
			cell.innerHTML = colLabel;
			colLabel = record.getData('field_label');
			/*
			var colLabel = e.store.data.items[e.selModel.last].data.parents + " > " +
				e.store.data.items[e.selModel.last].data.field_label;
			cell.innerHTML = colLabel;
			colLabel = e.store.data.items[e.selModel.last].data.field_label;
			*/
			if (typeof(linkedGroupById) == 'undefined') {
				cell.setAttribute("onmouseover", "this.style.cursor = 'move'");
			}				
			cell = row.insertCell(2);
			cell.setAttribute('scope', 'row');
			cell.innerHTML = "<input type='text' size='50' id= '"+id+"_input' value='"+colLabel+"' onclick='this.focus();'>";
			cell = row.insertCell(3);
			cell.setAttribute('scope', 'row');
			if (report_type == 'summation') {
				cell.innerHTML = "<input type='radio' name='summary_order_by_radio' id='summary_order_by_radio_"+ id + "' onClick='SUGAR.reports.summaryOrderBySelected(\"" + id + "\")'></input>";
				cell.innerHTML += "&nbsp;&nbsp;<span id='summaryOrderByDirectionDiv_" + id + "'></span>";
				cell = row.insertCell(4);			
				cell.setAttribute('scope', 'row');
			}
			if (typeof(linkedGroupById) == 'undefined')
				cell.innerHTML = "&nbsp;&nbsp;<img onclick='SUGAR.reports.deleteDisplaySummary(this)' src='index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=delete_inline.gif' alt='"+SUGAR.language.get("Reports", "LBL_REMOVE")+"'>";
			SUGAR.reports.addToFullTableList(id, fieldGridCell.getRecord(fieldGridCell.getSelectedRows()[0]).getData('parents'));
			if (typeof(linkedGroupById) == 'undefined') {
				var dd11 = YAHOO.util.Dom.get(id);
		        dd11.dd = new SUGAR.reports.reportDDProxy(id, 'group_summaries');
			}
					
		},			
		addFieldToDisplayColumns: function(e) {
			totalDisplayColRows++;
			var table = document.getElementById('displayColsTable');
			if (document.getElementById('display_cols_help_row')) {
				var tBody = table.childNodes[0];
				tBody.removeChild(document.getElementById('display_cols_help_row'));
			}
				
			var row = table.insertRow(table.rows.length);
			row.setAttribute('id', 'display_cols_row_' + totalDisplayColRows);
			var cell = row.insertCell(0);
			var record = e.getRecord(e.getSelectedRows()[0]);
			cell.innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;<input type='hidden' id='display_cols_row_"+ totalDisplayColRows+"_module' value='"+
				record.getData('module_name') +"'>" +
				"<input type='hidden' id='display_cols_row_" + totalDisplayColRows+"_link' value='"+
				record.getData('parents_link') + "'>" +
				"<input type='hidden' id='display_cols_row_" + totalDisplayColRows+"_field' value='"+
				record.getData('field_name') + "'>";			
							
            var cell = row.insertCell(1);
            cell.setAttribute('scope', 'row');
            var colLabel = record.getData('parents') + " > " +
                record.getData('field_label');
            cell.innerHTML = colLabel;
            colLabel = record.getData('field_label');
            cell.setAttribute("onmouseover", "this.style.cursor = 'move'");
            cell = row.insertCell(2);
            cell.innerHTML = "<input type='text' size='50' id= 'display_cols_label_'"+totalDisplayColRows+"' value='"+colLabel+"' title='"+ colLabel + SUGAR.language.get('Reports', 'LBL_LABEL') + "' onclick='this.focus();'>";
            cell = row.insertCell(3);
            cell.innerHTML = "<input type='radio' title='" + SUGAR.language.get('Reports', 'LBL_ORDER_BY') + "' name='order_by_radio' id='order_by_radio_"+ totalDisplayColRows + "' onClick='SUGAR.reports.orderBySelected(" +totalDisplayColRows+ ")'></input>";
            cell.innerHTML +="&nbsp;&nbsp;<span id='orderByDirectionDiv_" +totalDisplayColRows + "'></span>";
            cell = row.insertCell(4);
            cell.innerHTML = "&nbsp;&nbsp;<img onclick='SUGAR.reports.deleteDisplayCol(\"display_cols_row_" +totalDisplayColRows + "\")' src='index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=delete_inline.gif' alt='"+SUGAR.language.get("Reports", "LBL_REMOVE")+"'>";
            SUGAR.reports.addToFullTableList('display_cols_row_' + totalDisplayColRows,fieldGridCell.getRecord(fieldGridCell.getSelectedRows()[0]).getData('parents'));

			var dd11 = YAHOO.util.Dom.get('display_cols_row_' + totalDisplayColRows);
			dd11.dd = new SUGAR.reports.reportDDProxy('display_cols_row_' + totalDisplayColRows, 'group');
			
		},
		checkOptional: function(e) {
			var full_table_index = e.id.substr(20, e.id.length);
			full_table_list[full_table_index].optional = e.checked;
		},
		addOptionalSelect: function() {
			var htmlStr = '';
			SUGAR.reports.cleanFullTableList();
		
			for (i in full_table_list) {
				if (i != "self") {
					htmlStr += "<br/><input onclick='SUGAR.reports.checkOptional(this);' type='checkbox' id='outer_join_checkbox_"+ i +"'";
					if (full_table_list[i].optional == true)
						htmlStr += " checked ";
					htmlStr += ">" +full_table_list[i].name + "</input>";
				}
			}
			if (htmlStr != '') {
				document.getElementById('outerjoin_row').style.display = "";
				document.getElementById('outerjoin_div').innerHTML = htmlStr;
			}
			else {
				document.getElementById('outerjoin_row').style.display = "none";
				document.getElementById('outerjoin_div').innerHTML = htmlStr;
			}
		},
		showGroupByColumns: function(){
			document.getElementById('group_by_div').innerHTML='';
			module = current_module;
			var panelHtml="<table id='groupByTable' width='100%'><tr><td width='4%' class='dataLabel'>&nbsp;&nbsp;&nbsp;&nbsp;</td><td width='30%' class='dataLabel'><b>"+SUGAR.language.get('Reports','LBL_COLUMN_NAME')+
				"</td><td class='dataLabel'>&nbsp;</td></tr>" +
				"<tr id='group_by_help_row'><td>&nbsp;&nbsp;&nbsp;</td><td colspan=2><table width='70%' valign='center' class='button'><tr><td>"+SUGAR.language.get('Reports','LBL_GROUP_BY_HELP_DESC')+"</td></tr></table></td></tr></table>";

			var title = "<h3 class='spantitle'>" + SUGAR.language.get('Reports','LBL_SELECT_GROUP_BY') + "<span id='group_by_help'><img src='index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=helpInline.gif'  alt='"+SUGAR.language.get("Reports", "LBL_ALT_INFORMATION")+"'></span></h3>";

			var groupByModule = new YAHOO.widget.Module("group_by_div", { visible: false });
			groupByModule.setHeader(title);
			groupByModule.setBody(panelHtml);
			groupByModule.render("group_by_panel");
			groupByModule.show();
			
			var toolTip = new YAHOO.widget.Tooltip("tt1", {context:"group_by_help",  
	                          						   	   text:SUGAR.language.get('Reports','LBL_GROUP_BY_HELP_DESC'),
														   constraintoviewport : true,
														   height : "370px",
														   width : "400px"
			});
			//toolTip.show();
			
		},		
		showDisplaySummaries: function() {
			document.getElementById('display_summaries_div').innerHTML='';
			module = current_module;
			var panelHtml="<table id='displaySummariesTable' width='100%'><tr><td width='4%' class='dataLabel'>&nbsp;&nbsp;&nbsp;&nbsp;</td><td width='30%' class='dataLabel'><b>"+SUGAR.language.get('Reports','LBL_COLUMN_NAME')+
				"</td><td class='dataLabel'>&nbsp;</td><td width='30%'><b>";
			if (report_type == 'summation') 
				panelHtml += SUGAR.language.get('Reports','LBL_ORDER_BY')+"</b></td></tr>";
			panelHtml +=	
				"<tr id='display_summary_help_row'><td>&nbsp;&nbsp;&nbsp;</td><td colspan=2><table width='70%' valign='center' class='button'><tr><td>"+SUGAR.language.get('Reports','LBL_DISPLAY_SUMMARY_HELP_DESC')+"</td></tr></table></td></tr></table>";

			var title = "<h3 class='spantitle'>" + SUGAR.language.get('Reports','LBL_DISPLAY_SUMMARIES')  + "<span id='display_summary_help'><img src='index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=helpInline.gif'  alt='"+SUGAR.language.get("Reports", "LBL_ALT_INFORMATION")+"'></span></h3>";

			var displaySummariesModule = new YAHOO.widget.Module("display_summaries_div", { visible: false });
			displaySummariesModule.setHeader(title);
			displaySummariesModule.setBody(panelHtml);
			displaySummariesModule.render("display_summaries_panel");
		    var ddTarget = new YAHOO.util.DDTarget('displaySummariesTable', 'group_summaries');
			displaySummariesModule.show();
			
			var toolTip = new YAHOO.widget.Tooltip("tt2", {context:"display_summary_help",  
	                          						   	   text:SUGAR.language.get('Reports','LBL_DISPLAY_SUMMARY_HELP_DESC'),
														   constraintoviewport : true,
														   height : "350px",
														   width : "350px"
			});
			//toolTip.show();
			
		},
		
		showDisplayColumnsPanel: function(){
			document.getElementById('display_cols_div').innerHTML='';
			module = current_module;
			var panelHtml="<table id='displayColsTable' width='100%'><tr><th width='4%'>&nbsp;&nbsp;&nbsp;&nbsp;</th><th width='30%' scope='col'><b>"+SUGAR.language.get('Reports','LBL_COLUMN_NAME')+
				"</th><th width='30%' scope='col'><b>"+SUGAR.language.get('Reports','LBL_LABEL')+"</th>" +
				"<th width='30%' scope='col'><b>"+SUGAR.language.get('Reports','LBL_ORDER_BY')+"</th><th></th></tr>" +
				"<tr id='display_cols_help_row'><td>&nbsp;&nbsp;&nbsp;</td><td colspan=3><table width='70%' valign='center' class='button'><tr><td>"+SUGAR.language.get('Reports','LBL_DISPLAY_COLS_HELP_DESC')+"</td></tr></table></td></tr></table>";

			var title = "<h3 class='spantitle'>" + SUGAR.language.get('Reports','LBL_CHOOSE_DISPLAY_COLS')  + "<span id='display_cols_help'><img id=\"toolipImageId\" src='index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=helpInline.gif'  alt='"+SUGAR.language.get("Reports", "LBL_ALT_INFORMATION")+"'></span></h3>";

			var displayColsModule = new YAHOO.widget.Module("display_cols_div", { visible: false });
			displayColsModule.setHeader(title);
			displayColsModule.setBody(panelHtml);
			displayColsModule.render("display_cols_panel");
		    var ddTarget = new YAHOO.util.DDTarget('displayColsTable', 'group');
			displayColsModule.show();
			
			var toolTip = new YAHOO.widget.Tooltip("tt3", {context:"display_cols_help",  
	                          						   	   text:SUGAR.language.get('Reports','LBL_DISPLAY_COLS_HELP_DESC'),
														   constraintoviewport : true,
														   height : "400px",
														   width : "400px"
			});
			//toolTip.show();		    	
		},

		deleteDisplayCol: function(row) {
			var deleteRow = document.getElementById(row);
			SUGAR.reports.deleteFromFullTableList(row);
			var displayColsTbl = document.getElementById('displayColsTable');
			var tBody = displayColsTbl.childNodes[0];
			tBody.removeChild(deleteRow);
		},
				
		deleteGroupBy: function(row) {
			var deleteRow = document.getElementById(row);
			SUGAR.reports.deleteFromFullTableList(row);
			var groupByTbl = document.getElementById('groupByTable');
			var tBody = groupByTbl.childNodes[0];
			tBody.removeChild(deleteRow);

			//Delete any related Summary rows
			if (document.getElementById('display_summaries_row_' + row)) {
				var deleteRow = document.getElementById('display_summaries_row_' + row);
				SUGAR.reports.deleteFromFullTableList('display_summaries_row_' + row);
				var displaySummaryTbl = document.getElementById('displaySummariesTable');
				var tBody = displaySummaryTbl.childNodes[0];
				tBody.removeChild(deleteRow);			
			}
			
		},
        deleteDisplaySummary: function(oTrigger) {
            var oRow = oTrigger;
            do
            {
                oRow = oRow.parentNode;
                if (!oRow)
                {
                    return;
                }
            }
            while ('TR' != oRow.tagName);
            SUGAR.reports.deleteFromFullTableList(oRow.id);
			var displaySummaryTbl = document.getElementById('displaySummariesTable');
			var tBody = displaySummaryTbl.childNodes[0];
            tBody.removeChild(oRow);
            SUGAR.reports.rebuildSummaryIndexes(); // Bug #27623 We need to rebuild indexes
		},
        // Bug #27623 This function rebuild id of html nodes and full_table_list array of javascript
        rebuildSummaryIndexes: function()
        {
            var oNode = document.getElementById('displaySummariesTable').childNodes[0];
            var iIndex = 0;
            var oAliases = {};
            for (var i = 0; i < oNode.childNodes.length; i++)
            {
                var oItem = oNode.childNodes[i];
                if (oItem.id == '')
                {
                    continue;
                }

                iIndex++;
                if (oItem.id.match(/^display_summaries_row_\d+$/) == null)
                {
                    continue;
                }
                if (oItem.id == ('display_summaries_row_' + iIndex))
                {
                    continue;
                }

                oAliases[oItem.id] = 'display_summaries_row_' + iIndex;
                var oldIndex = oItem.id.replace(/^[^\d]*/,'');
                SUGAR.reports.rebuildSummaryNode(oItem, oldIndex, iIndex);
            }
            totalSummaryColRows = iIndex;

            for (var i in full_table_list)
            {
                if (typeof full_table_list[i].dependents != 'object')
                {
                    continue;
                }
                for (var j =0; j < full_table_list[i].dependents.length; j++)
                {
                    if (typeof oAliases[full_table_list[i].dependents[j]] != 'undefined')
                    {
                        full_table_list[i].dependents[j] = oAliases[full_table_list[i].dependents[j]];
                    }
                }
            }
        },
        // Bug #27623 This method change id of nodes recursive
        rebuildSummaryNode: function(oNode, oldIndex, iIndex)
        {
            if (typeof oNode.id == 'undefined')
            {
                return;
            }
            oNode.id = oNode.id.replace(oldIndex, iIndex);
            for (var i = 0; i < oNode.childNodes.length; i++)
            {
                SUGAR.reports.rebuildSummaryNode(oNode.childNodes[i], oldIndex, iIndex);
            }
		},		
		deleteFilter: function(index, row, table) {
			var deleteRow = document.getElementById(row);
			SUGAR.reports.deleteFromFullTableList(row);
			var filterTable = document.getElementById(table);
			var tBody = filterTable.childNodes[0];
			tBody.removeChild(deleteRow);
			filters_arr.splice(filters_count_map[index],1);
			for ( id in filters_count_map) {
				if (filters_count_map[id] > filters_count_map[index]) {
					filters_count_map[id]--;
				}
			}
			
		},
		
		//builds the html for a select 
		buildSelectHTML: function(info) {
			var text;
			text = "<select";
		       
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
		},		
		
		addFilterQualify: function(htmlTableCell, filter) {
			var filter_row = filters_arr[filters_count_map[current_filter_id]];
			var module = filter_row.module;
			var field = filter_row.field;
			
			var select_html_info = new Object();
			var options = new Array();
			var select_info = new Object();
			select_info['name'] = 'qualify';
            select_info['title'] = 'select filter qualifier';
			select_info['onchange'] = "SUGAR.reports.filterTypeChanged("+current_filter_id+");";
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
			}
		
			select_html_info['options'] = options;
			htmlTableCell.innerHTML = SUGAR.reports.buildSelectHTML(select_html_info);
		
			filter_row['qualify_select'] = htmlTableCell.getElementsByTagName('select')[0];			
		},
		to_display_date: function(date_str) {
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
		},
		filterTypeChanged: function(index) {
			var filter = {input_name0:''};
			SUGAR.reports.refreshFilterInput(filter,index);
		},
		refreshFilterInput: function(filter,index) {
			current_filter_id = index;
			var filter_row = filters_arr[filters_count_map[index]];
			if (typeof (filter_row.input_field0) != 'undefined' && typeof (filter_row.input_field0.value) != 'undefined') {
				type = "input";
			}
			filter_row.input_cell.removeChild(filter_row.input_cell.firstChild);
			SUGAR.reports.addFilterInput(filter_row.input_cell,filter,filter_row.id);
		},
		
		addFilterInputSelectSingle: function(row,options,filter,rowId) {
			var cell = document.createElement('td');
			row.appendChild(cell);
		
			var select_html_info = new Object();
			var options_arr = new Array();
			var select_info = new Object();
            select_info['id'] = 'select_' + rowId;
			select_info['name'] = 'input';
            select_info['title'] = 'select filter input';
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
		
				if (option_value == filter.input_name0 ) {
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
			cell.innerHTML = SUGAR.reports.buildSelectHTML(select_html_info);
			var filter_row = filters_arr[filters_count_map[current_filter_id]];
			filter_row.input_field0 = cell.getElementsByTagName('select')[0];
			filter_row.input_field1 = null;
		},		
		addFilterInputSelectMultiple: function(row,options,filter,rowId) {
			var cell = document.createElement('td');
			row.appendChild(cell);
			var select_html_info = new Object();
			var options_arr = new Array();
			var select_info = new Object();
            select_info['id'] = 'select_' + rowId;
			select_info['size'] = '5';
			select_info['multiple'] = true;
            select_info['title'] = 'filter multi-select input';
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
			cell.innerHTML = SUGAR.reports.buildSelectHTML(select_html_info)
			var filter_row = filters_arr[filters_count_map[current_filter_id]];
			filter_row.input_field0 = cell.getElementsByTagName('select')[0];
			filter_row.input_field1 = null;
		},
		
		
		set_form_return_reports:function(popup_reply_data) {
			var form_name = popup_reply_data.form_name;
			var name_to_value_array = popup_reply_data.name_to_value_array;
			var passthru_data = popup_reply_data.passthru_data;
		 	current_parent_id.value = name_to_value_array['id'];
		 	if (name_to_value_array['name'] == 'undefined')
			 	current_parent.value = name_to_value_array['id'];
			else
			 	current_parent.value = name_to_value_array['name'];
		},		
		addFilterInputRelate: function(row,field,filter,isCustom) {
			totalSqsEnabledFields++;

			var filter_row = filters_arr[filters_count_map[current_filter_id]];
			if (!isCustom)
				var module_name = filter_row.module;
			else
				var module_name = field.ext2;
			var field = filter_row.field;
			var field_name = filter_row.field.name;
			var field_id_name= module_name+":"+field.name+":id:"+totalSqsEnabledFields;
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
			//name_input.setAttribute("readOnly","true"); 
			name_input.setAttribute("name", field_name_name);
			name_input.setAttribute("id", field_name_name);
			name_input.setAttribute("class", "sqsEnabled");
			name_input.setAttribute("autocomplete", "off");
            name_input.setAttribute("title", field_name_name);
			
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
			//new_input.accessKey="G";
			new_input.type="button";
			new_input.value=lbl_select; 
			new_input.name=field.module;
			new_input.setAttribute("class","button"); 
			new_input.onclick= function () { 	        
				current_parent = name_input; 	 
				current_parent_id = id_input; 	 
				return	open_popup(module_name, 600, 400, "", true, false, { "call_back_function":"SUGAR.reports.set_form_return_reports", "form_name":"ReportsWizardForm", "field_to_name_array":{ "id":"id", "name":"name" } });
			}
		
			cell.appendChild(new_input);
		
			row.appendChild(cell);
			
			
			var sqs_field_name = 'ReportsWizardForm_' + field_name_name;

			var callback = {
				success:function(o){
					eval(o.responseText);
					var populate_list = new Array();
					populate_list.push(field_name_name);
					populate_list.push(field_id_name);
					sqs_objects[sqs_field_name]['populate_list']=populate_list;
				    enableQS(false);
				},
				failure: function(o){}
			}
			var postData = '&module=Reports&action=get_quicksearch_defaults&to_pdf=true&sugar_body_only=true&parent_form=ReportsWizardForm&parent_module='+ module_name+'&parent_field='+sqs_field_name;
			YAHOO.util.Connect.asyncRequest("POST", "index.php", callback, postData);
		},
		/*
		addFilterInputRelateType: function(row,field,filter) {
			var filter_row = filters_arr[filters_count_map[current_filter_id]];
			var field = filter_row.field;
			var module_name = field.ext2;
			var field_name = filter_row.field.name;
			var field_id_name= module_name+":"+field.name+":id";
			var field_name_name= module_name+":"+field.name+":name";
		
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
			name_input.setAttribute("readOnly","true"); 
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
				return	open_popup(module_name, 600, 400, "", true, false, { "call_back_function":"SUGAR.reports.set_form_return_reports", "form_name":"ReportsWizardForm", "field_to_name_array":{ "id":"id", "name":"name" } });
			}
		
			cell.appendChild(new_input);
		
			row.appendChild(cell);
		},		
		*/
		addFilterNoInput: function(row,filter) {
			var cell = document.createElement("td");
			cell.setAttribute('valign','middle');
			var new_input = document.createElement("input");
		 	new_input.type="hidden";
			new_input.value=filter.qualifier_name;
			new_input.name="text_input";
            new_input.setAttribute('title','filter text input');
			cell.appendChild(new_input);
			row.appendChild(cell);
		},		
		
		addFilterInputEmpty:function(row,filter) {
			var cell = document.createElement("td");
			cell.setAttribute('valign','middle'); 
			var new_input = document.createElement("input");
			new_input.type="hidden";
			new_input.value=filter.qualifier_name;
			new_input.name="text_input";
            new_input.setAttribute('title','filter text input');
			cell.appendChild(new_input);
			row.appendChild(cell);
		
			var cell = document.createElement("td");
			row.appendChild(cell);
		
			var filter_row = filters_arr[filters_count_map[current_filter_id]];
			filter_row.input_field0 = new_input;
			filter_row.input_field1 = null;
		},	

		addFilterInputTextBetween:function(row,filter) {
			var filter_row = filters_arr[filters_count_map[current_filter_id]];
		
			var cell = document.createElement('td');
			var new_input = document.createElement("input");
			new_input.type="text";
			if (typeof(filter.input_name0) == 'undefined') {
				filter.input_name0 = '';
			}
		
			new_input.value=filter.input_name0;
            new_input.setAttribute('title','filter start');
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
			new_input.setAttribute('title','filter end');
            if (typeof(filter.input_name1) == 'undefined') {
				filter.input_name1 = '';
			}
		
			new_input.value=filter.input_name1;
			cell.appendChild(new_input);
			row.appendChild(cell);
			filter_row.input_field1 = new_input;
		},			
		addFilterInputText: function(row, filter) {
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
            new_input.setAttribute('title','filter text input');
			cell.appendChild(new_input);
			row.appendChild(cell);
			var filter_row = filters_arr[filters_count_map[current_filter_id]];
			filter_row.input_field0 = new_input;
			filter_row.input_field1 = null;
		},		
		addFilterInputDate: function(row, filter) {
			var cell = document.createElement("td");
			cell.setAttribute('valign','middle'); 
			var new_input = document.createElement("input");
			new_input.type="text";
            new_input.setAttribute('title','filter date');

		
			if ( typeof (filter.input_name0) != 'undefined' && filter.input_name0.length > 0) {
				filter.input_name0 = SUGAR.reports.to_display_date(filter.input_name0);
		 	}
		
			new_input.value=filter.input_name0;
			new_input.name="text_input";
			new_input.size="30";
			new_input.maxsize="255";
			new_input.visible="true";
			new_input.setAttribute('id','jscal_field_' + current_filter_id);
			cell.appendChild(new_input);
			row.appendChild(cell);
		
			var cell = document.createElement("td");
			cell.setAttribute('valign','middle'); 
			var img_element = document.createElement("img");
			img_element.setAttribute('src',"index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=jscalendar.gif"); 
			img_element.setAttribute('id','jscal_trigger_' + current_filter_id);
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
		},	
		timeValueUpdate: function(fname){
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
		},
		addFilterInputDatetimecombo: function(row, filter) {
			var cellInput = document.createElement("td");
			var new_input = document.createElement("input");
			new_input.type="text";
		
			if ( typeof (filter.input_name0) != 'undefined' && filter.input_name0.length > 0) {
				filter.input_name0 = SUGAR.reports.to_display_date(filter.input_name0);
		 	}
		
			new_input.value=filter.input_name0;
			new_input.name="text_input1";
			new_input.size="13";
			new_input.maxsize="255";
			new_input.visible="true";
			new_input.setAttribute('id','jscal_field_' + current_filter_id);
			cellInput.appendChild(new_input);
			
			var img_element = document.createElement("img");
			img_element.setAttribute('src',"index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=jscalendar.gif"); 
			img_element.setAttribute('id','jscal_trigger_' + current_filter_id);
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
			cellSelect.appendChild(this.newSelectSpanElement('ontime', filter.input_name1));
			cellInput.appendChild(cellSelect);
			row.appendChild(cellInput);
		},	
		addFilterInputDateBetween: function(row,filter) {
			var filter_row = filters_arr[filters_count_map[current_filter_id]];
		
			var cell = document.createElement("td");
			cell.setAttribute('valign','middle'); 
			var new_input = document.createElement("input");
            new_input.setAttribute('title','filter date');
			new_input.type="text";
			if (typeof(filter.input_name0) == 'undefined') {
				filter.input_name0 = '';
			}
			
			filter.input_name0 = SUGAR.reports.to_display_date(filter.input_name0);
			new_input.value=filter.input_name0;
			new_input.name="text_input2";
			new_input.size="12";
			new_input.maxsize="255";
			new_input.visible="true";
			new_input.setAttribute('id','jscal_field_' + current_filter_id);
			cell.appendChild(new_input);
			row.appendChild(cell);
			filter_row.input_field1 = new_input;
		
			var cell = document.createElement("td");
			cell.setAttribute('valign','middle'); 
			var img_element1 = document.createElement("img");
			img_element1.setAttribute('src',"index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=jscalendar.gif"); 
			img_element1.setAttribute('id','jscal_trigger_' + current_filter_id);
			cell.appendChild(img_element1);
			row.appendChild(cell);
		
			Calendar.setup ({ 
				inputFieldObj : new_input , 
				buttonObj : img_element1,
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
			filter.input_name1 = SUGAR.reports.to_display_date(filter.input_name1);
			new_input.value=filter.input_name1;
			new_input.name="text_input";
			new_input.size="12";
			new_input.maxsize="255";
			new_input.visible="true";
			new_input.setAttribute('id','jscal_field2_' + current_filter_id);
			cell.appendChild(new_input);
			row.appendChild(cell);
			filter_row.input_field1 = new_input;
		
			var cell = document.createElement("td");
			var img_element2 = document.createElement("img");
			img_element2.setAttribute('src',"index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=jscalendar.gif"); 
			img_element2.setAttribute('id','jscal_trigger2_' + current_filter_id);
			cell.appendChild(img_element2);
			row.appendChild(cell);
			Calendar.setup ({ 
				inputFieldObj : new_input , 
				buttonObj : img_element2,
				ifFormat : cal_date_format, 
				showsTime : false, 
				singleClick : true,
				weekNumbers:false,
				step : 1 });
		},			
		
		newSelectSpanElement: function(name, inputTime){
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
			
			var text =  '<select tabindex="0" size="1" id="'+dname+'_hours" onchange="SUGAR.reports.timeValueUpdate(\''+dname+'\');">';
			for(i=1; i <= 12; i++) {
			    val = i < 10 ? "0" + i : i;
			    text += '<option value="' + val + '" ' + (i == hrs ? "SELECTED" : "") +  '>' + val + '</option>';
			}
			text += '</select>';
			text += ' : ';
			text += '<select tabindex="0" size="1" id="'+dname+'_minutes" onchange="SUGAR.reports.timeValueUpdate(\''+dname+'\');">';
			text += '\n<option value="00" ' + (mins == 0 ? "SELECTED" : "") + '>00</option>';
			text += '\n<option value="15" ' + (mins == 15 ? "SELECTED" : "") + '>15</option>';
			text += '\n<option value="30" ' + (mins == 30 ? "SELECTED" : "") + '>30</option>';
			text += '\n<option value="45" ' + (mins == 45 ? "SELECTED" : "") + '>45</option>';
			text += '\n</select>';
			text += ' <select tabindex="0" size="1" id="'+dname+'_meridiem" onchange="SUGAR.reports.timeValueUpdate(\''+dname+'\');"> ';
			
			text += '\n<option value="' + "am" + '" ' + (/am/i.test(meridiem) ? "SELECTED" : "") + '>' +  "am"  + '</option>';
			text += '\n<option value="' +"pm"  + '" ' + (/pm/i.test(meridiem) ? "SELECTED" : "") + '>' +  "pm" + '</option>';
			text += '\n</select>';
			text += '<input type="hidden" name="'+dname+'_inputtime" id="'+dname+'" value="'+timevalue+'">';
			selectSpan.innerHTML = text;
			return selectSpan;
		},
		
		addFilterInputDatetimesBetween: function(row,filter) {
			var filter_row = filters_arr[filters_count_map[current_filter_id]];
			
			var cell = document.createElement("td");
			cell.setAttribute('valign','middle'); 
			var div1 = document.createElement('div');
			var new_input = document.createElement("input");
			new_input.type="text";
            new_input.setAttribute('title','filter date start');
			if (typeof(filter.input_name0) == 'undefined') {
				filter.input_name0 = '';
			}
			
			filter.input_name0 = SUGAR.reports.to_display_date(filter.input_name0);
			new_input.value=filter.input_name0;
			new_input.name="text_input";
			new_input.size="12";
			new_input.maxsize="255";
			new_input.visible="true";
			new_input.setAttribute('id','jscal_field_' + current_filter_id);
			div1.appendChild(new_input);
			filter_row.input_field1 = new_input;
		
			var img_element = document.createElement("img");
			img_element.setAttribute('src',"index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=jscalendar.gif"); 
			img_element.setAttribute('id','jscal_trigger_' + current_filter_id);
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
            new_input.setAttribute('title','filter date end');
			new_input.type="text";
			if (typeof(filter.input_name2) == 'undefined') {
				filter.input_name2 = '';
			}
			filter.input_name2 = SUGAR.reports.to_display_date(filter.input_name2);
			new_input.value=filter.input_name2;
			new_input.name="text_input";
			new_input.size="12";
			new_input.maxsize="255";
			new_input.visible="true";
			new_input.setAttribute('id','jscal_field2_' + current_filter_id);
			div3.appendChild(new_input);
			filter_row.input_field1 = new_input;
		
			var img_element = document.createElement("img");
			img_element.setAttribute('src',"index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=jscalendar.gif"); 
			img_element.setAttribute('id','jscal_trigger2_' + current_filter_id);
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
			
		},
		
		addFilterInput: function(htmlTableCell, filter, rowId) {
			var filter_row = filters_arr[filters_count_map[current_filter_id]];
			var module = filter_row.module;	
			var field = filter_row.field
			var qualifier_name = filter_row.qualify_select.options[filter_row.qualify_select.selectedIndex].value;

			if ( typeof ( qualifier_name) == 'undefined' ||  qualifier_name == '') {
				qualifier_name='equals';
			}
		
			var field_type = field.type;

			if ( typeof(field.custom_type) != 'undefined') {
				field_type = field.custom_type;
			}
			htmlTableCell.innerHTML = "<table><tr></tr></table>";
		
			var row = htmlTableCell.getElementsByTagName("tr")[0];
			if(field.name == 'team_set_id'){
				SUGAR.reports.addFilterTeamSet(row,field, filter);
				//SUGAR.reports.addRunTimeCheckBox(row,filter, rowId);
			}
			else if (qualifier_name == 'between') {
				SUGAR.reports.addFilterInputTextBetween(row,filter);
				SUGAR.reports.addRunTimeCheckBox(row,filter, rowId);		
			} 
			else if (qualifier_name == 'between_dates') {
				SUGAR.reports.addFilterInputDateBetween(row,filter);
				SUGAR.reports.addRunTimeCheckBox(row,filter,rowId);		
			}else if (qualifier_name == 'between_datetimes') {
				SUGAR.reports.addFilterInputDatetimesBetween(row,filter);
				SUGAR.reports.addRunTimeCheckBox(row,filter,rowId);		
			} 
			else if (qualifier_name == 'empty' || qualifier_name == 'not_empty') {
			    SUGAR.reports.addFilterNoInput(row,filter);
				SUGAR.reports.addRunTimeCheckBox(row,filter,rowId);	
				if (((field_type == 'user_name')||(field_type == 'assigned_user_name')) && qualifier_name == 'empty' && typeof(filter.name) =='undefined') {
					alert(SUGAR.language.get("Reports", 'LBL_USER_EMPTY_HELP'));							
				}
		 	}
			else if (field_type == 'date' || field_type == 'datetime') {
				if (qualifier_name.indexOf('tp_') == 0) {
					SUGAR.reports.addFilterInputEmpty(row,filter);
					SUGAR.reports.addRunTimeCheckBox(row,filter,rowId);		
				}
				
				else {
					SUGAR.reports.addFilterInputDate(row,filter);
					SUGAR.reports.addRunTimeCheckBox(row,filter,rowId);		
				}
			} 
			else if ( field.type == 'datetimecombo') {
				if (qualifier_name.indexOf('tp_') == 0) {
					SUGAR.reports.addFilterInputEmpty(row,filter);
					SUGAR.reports.addRunTimeCheckBox(row,filter,rowId);		
				}
				
				else {
					SUGAR.reports.addFilterInputDatetimecombo(row,filter);
					SUGAR.reports.addRunTimeCheckBox(row,filter,rowId);		
				}
			} 
			else if (field_type == 'id' || field_type == 'name' || field_type == 'fullname') {
				if ( qualifier_name == 'is' || qualifier_name =='is_not') {
					SUGAR.reports.addFilterInputRelate(row,field,filter,false);
					SUGAR.reports.addRunTimeCheckBox(row,filter,rowId);		
				} 
				else {
					SUGAR.reports.addFilterInputText(row,filter);
					SUGAR.reports.addRunTimeCheckBox(row,filter,rowId);		
				}
			} 
			else if (field_type == 'relate') {
				if ( qualifier_name == 'is' || qualifier_name == 'is_not') {
					SUGAR.reports.addFilterInputRelate(row,field,filter,true);
					SUGAR.reports.addRunTimeCheckBox(row,filter,rowId);		
				} 
				else {
					SUGAR.reports.addFilterInputText(row,filter);
					SUGAR.reports.addRunTimeCheckBox(row,filter,rowId);		
				}
				
			}
			else if ((field_type == 'user_name')||(field_type == 'assigned_user_name')) {
				if(users_array=="") {
					SUGAR.reports.loadXML();
				}
				if (qualifier_name == 'one_of' || qualifier_name == 'not_one_of') {
					SUGAR.reports.addFilterInputSelectMultiple(row,users_array,filter,rowId);
					SUGAR.reports.addRunTimeCheckBox(row,filter,rowId);		
				}
				else {
					SUGAR.reports.addFilterInputSelectSingle(row,users_array,filter,rowId);
					SUGAR.reports.addRunTimeCheckBox(row,filter,rowId);		
				}
			} 
			else if (field_type == 'enum' || field_type == 'multienum'  || field_type == 'radioenum' || field_type == 'parent_type') {
				if (qualifier_name == 'one_of' || qualifier_name == 'not_one_of') {
					SUGAR.reports.addFilterInputSelectMultiple(row,field.options,filter,rowId);
					SUGAR.reports.addRunTimeCheckBox(row,filter,rowId);		
				}
				else {
					SUGAR.reports.addFilterInputSelectSingle(row,field.options,filter,rowId);
					SUGAR.reports.addRunTimeCheckBox(row,filter,rowId);		
				}
			}
			else if (field_type=='bool') {
		            var options = ['yes','no'];
		            SUGAR.reports.addFilterInputSelectSingle(row,options,filter,rowId);
					SUGAR.reports.addRunTimeCheckBox(row,filter,rowId);		
		    }
			else if (field_type == 'teamset') {
		            SUGAR.reports.addTeamset(row,field.options,filter);	
			}
			else {
				SUGAR.reports.addFilterInputText(row,filter);
				SUGAR.reports.addRunTimeCheckBox(row,filter,rowId);		
			}
		
			return row;			
		},
		
		addRunTimeCheckBox: function(row, filter, rowId) {
			var cell = document.createElement("td");
			cell.setAttribute('valign','middle'); 
			cell.innerHTML = "&nbsp;&nbsp;";
			var new_input = document.createElement("input");
			new_input.type="checkbox";
			new_input.name="runtime_filter_"+ rowId;
			new_input.id="runtime_filter_" + rowId;
			cell.appendChild(new_input);
			cell.innerHTML += " <b><label for='runtime_filter_" + rowId+"' />"+ SUGAR.language.get('Reports', 'LBL_RUN_TIME_LABEL') + "</input></b>";
			cell.innerHTML += '<span valign="bottom" onmouseout="return nd();" onmouseover="return overlib(\'' + SUGAR.language.get('Reports','LBL_RUNTIME_HELP') + '\', FGCLASS, \'olFgClass\', CGCLASS, \'olCgClass\', BGCLASS, \'olBgClass\', TEXTFONTCLASS, \'olFontClass\', CAPTIONFONTCLASS, \'olCapFontClass\', CLOSEFONTCLASS, \'olCloseFontClass\' );">&nbsp;<img src="index.php?entryPoint=getImage&themeName=' + SUGAR.themes.theme_name + '&imageName=helpInline.gif"  alt="'+SUGAR.language.get("Reports", 'LBL_ALT_INFORMATION')+'"></span>';
			
			row.appendChild(cell);
			if (filter.runtime && filter.runtime == 1) {
				document.getElementById("runtime_filter_" + rowId).checked = true;
			}

		},
		addFilterTeamSet: function(row, field, filter) {
			var filter_row = filters_arr[filters_count_map[current_filter_id]];
			var field = filter_row.field;		
			var field_id_name = current_filter_id + ":" + field.name+ ":id";
			var teamset_div =  field_id_name + '_div';
			var teamset_loading_img = field_id_name + '_loading_img';
			
			var cell = document.createElement("td");
			cell.setAttribute('valign','middle'); 
			cell.innerHTML = "&nbsp;&nbsp;";
			
			var div_el = document.createElement("div");
			div_el.setAttribute('id', field_id_name + '_div');
			div_el.setAttribute('name', field_id_name + '_div');
			
			var new_input = document.createElement("input");
		 	new_input.setAttribute('type', 'hidden');
			new_input.setAttribute('value', 'team_set_id');
			new_input.setAttribute('name', field_id_name);
			new_input.setAttribute('id', field_id_name);
			
			var loading_img = document.createElement("img");
			loading_img.setAttribute('src', 'include/javascript/yui/build/assets/skins/sam/wait.gif');
			loading_img.setAttribute('alt', 'loading...');
			loading_img.setAttribute('id', teamset_loading_img);	
			
			div_el.appendChild(loading_img);
			div_el.appendChild(new_input);		
			cell.appendChild(div_el);
			row.appendChild(cell);			

			
			if(SUGAR.isIE && current_filter_id == 0) {
				var filler_input = document.createElement("input");
			 	filler_input.setAttribute('type', 'hidden');
				filler_input.setAttribute('value', '');
				filler_input.setAttribute('name', 'filler');
				filler_input.setAttribute('id', 'filler');
				document.getElementById('ReportsWizardForm').insertBefore(filler_input, document.getElementById('ReportsWizardForm').childNodes[0]);
			}
			
			text = '\n <script type="text/javascript">\n';
			text += '\n var callback = { \n';
			text += '\n success:function(o){ \n';
			text += '\n document.getElementById("' + teamset_loading_img + '").style.display="none"; \n';
			text += '\n document.getElementById("' + teamset_div + '").innerHTML = o.responseText; \n';
			text += '\n QSProcessedFieldsArray = new Array(); \n';
			text += '\n SUGAR.util.evalScript(o.responseText); \n';
			text += '\n },\n failure:function(o){ } } \n';
			text += '\n document.getElementById("' + teamset_loading_img + '").style.display="inline" \n;';
			
			if(typeof filter.input_name0 != undefined && filter.input_name0.length > 0) {
			   var count = 0;
			   value_text = '';
			   for(i in filter.input_name0) {
                   // Bug 46256. Function is a bad type for value_text generation
                   if (typeof filter.input_name0[i] == 'function')
                   {
                       continue;
                   }
				   value_text += '&id_' + field_id_name + '_collection_' + count + '=' + filter.input_name0[i];
				   value_text += '&' + field_id_name + '_collection_' + count + '=' + escape(filter.input_name1[i]);
				   count++;
			   }
			   
			   if(filter.input_name2 != '') {
			      value_text += '&primary_' + field_id_name + '_collection=' + filter.input_name2; 
			   }
			   text += '\n postData = \'&module=Reports&action=get_teamset_field&to_pdf=true&displayParams={"display":true,"labelSpan":null,"fieldSpan":null,"formName":"ReportsWizardForm","hideNameLabel":true}&vardef={"name":"' + field_id_name + '","db_concat_fields":["name","name_2"],"rname":"name","id_name":"team_id","vname":"LBL_TEAMS","type":"teamset","required":"true","table":"teams","isnull":"true","module":"Teams","link":"team_link","massupdate":false,"dbType":"varchar","source":"non-db","len":36,"custom_type":"teamset","value":"Administrator","acl":4}&module_dir=Reports&bean_id=&action_type=reports' + value_text + '\'; \n';
			} else {
			   text += '\n postData = \'&module=Reports&action=get_teamset_field&to_pdf=true&displayParams={"display":true,"labelSpan":null,"fieldSpan":null,"formName":"ReportsWizardForm","hideNameLabel":true}&vardef={"name":"' + field_id_name + '","db_concat_fields":["name","name_2"],"rname":"name","id_name":"team_id","vname":"LBL_TEAMS","type":"teamset","required":"true","table":"teams","isnull":"true","module":"Teams","link":"team_link","massupdate":false,"dbType":"varchar","source":"non-db","len":36,"custom_type":"teamset","value":"Administrator","acl":4}&module_dir=Reports&bean_id=&action_type=reports\'; \n';				
			}

			text += '\n YAHOO.util.Connect.asyncRequest("POST", "index.php", callback, postData); \n';
			text += '\n </script>\n';			

			//Run Javascript
			SUGAR.util.evalScript(text);
			
    		
		},			
		deleteFromFullTableList: function(rowId) {
			var row = document.getElementById(rowId);
			var key = row.cells[0].getElementsByTagName('input')[1].value;
			if (key.split('>').length == 1)
				return;
			key = key.replace(/>/g,':');
			//Upgraded content strings don't have dependents.
			if (full_table_list[key].dependents) {
				if (full_table_list[key].dependents.length == 1){
					delete full_table_list[key];
				}
				else {
					var dependents = full_table_list[key].dependents;
					for (var i = 0; i < dependents.length; i++) {
						if (dependents[i] == rowId) {
							delete dependents[i];
						}
					}
					var allUndefined = true;
					for (var i = 0; i < dependents.length; i++) {
						if (typeof(dependents[i]) != 'undefined') {
							allUndefined = false;
							break;
						}
					}
					if ((typeof(full_table_list[key].dependents) == 'undefined' || allUndefined) && key !='self') {
						delete full_table_list[key];
					}
					
					/*
					for (var i = 0; i < dependents.length; i++) {
						if (dependents[i] == rowId) {
							dependents.splice(i,1);
							break;
						}
					}*/
				}
			}
		},
		cleanFullTableList: function() {
			for (i in full_table_list) {
				if (typeof(full_table_list[i].dependents) == 'undefined' && i !='self') {
					delete full_table_list[i];
				}
			}
		},
		addToFullTableList: function(rowId,parentsUIStr,parentsStr) {
			if (!parentsStr)
			
			var parentsStr = fieldGridCell.getRecord(fieldGridCell.getSelectedRows()[0]).getData('parents_link');
			//var parentsStr = fieldGridCell.store.data.items[fieldGridCell.selModel.last].data.parents_link;
			var parentsArr = parentsStr.split('>');
			var parentsStrSoFar = parentsArr[0];
			var previousModule = parentsArr[0];
			var parentsUIArr = parentsUIStr.split('>');
			var parentsUIStrSoFar = parentsUIArr[0];
			for (var i = 1; i < parentsArr.length; i++) {
				prevParentsStr = parentsStrSoFar;
				parentsStrSoFar = parentsStrSoFar + ":" + parentsArr[i];
				parentsUIStrSoFar = parentsUIStrSoFar + " > " + parentsUIArr[i];
				if(!full_table_list[parentsStrSoFar]) {
					full_table_list[parentsStrSoFar] = new Object();
					full_table_list[parentsStrSoFar].name = parentsUIStrSoFar;

					if (i != 1)
						full_table_list[parentsStrSoFar].parent = prevParentsStr;
					else
						full_table_list[parentsStrSoFar].parent = 'self';
					var link_defs = module_defs[previousModule].link_defs;
					for ( j in link_defs) {
						if (parentsArr[i] == link_defs[j].name) {
							full_table_list[parentsStrSoFar].link_def = link_defs[j];
							full_table_list[parentsStrSoFar].link_def.table_key = parentsStrSoFar;
							//full_table_list[parentsStrSoFar].module = fieldGridCell.store.data.items[fieldGridCell.selModel.last].data.module_name;
							full_table_list[parentsStrSoFar].dependents =[rowId];
							var relationship = link_defs[j].relationship_name;
							if (link_defs[j].module)
							{
								full_table_list[parentsStrSoFar].module = link_defs[j].module;
							}
							else if (link_defs[j].bean_is_lhs && rel_defs[relationship].rhs_module) {
								full_table_list[parentsStrSoFar].module = rel_defs[relationship].rhs_module;
							}
							else {
								full_table_list[parentsStrSoFar].module = rel_defs[relationship].lhs_module;
							}
							full_table_list[parentsStrSoFar].label = link_defs[j].label;
							previousModule = full_table_list[parentsStrSoFar].module;
							break;						
						}
					}
					
				}
				else {
					//Upgraded content strings don't have dependents.
					if (full_table_list[parentsStrSoFar].dependents)
						full_table_list[parentsStrSoFar].dependents.push(rowId);
					else {
						full_table_list[parentsStrSoFar].dependents = [rowId];
						// Upgrade the older name to the new format which is based on the link name rather
						// than the relationship name
						full_table_list[parentsStrSoFar].name = parentsUIStrSoFar;
					}
					previousModule = full_table_list[parentsStrSoFar].module;

				}
			}
		},
		getParentsUIString: function(filter) {
			var parentsArr = filter.table_key.split(":");
			var parentsStrSoFar = parentsArr[0];
			var parentsUIStrSoFar = parentsArr[0];
            if(typeof SUGAR.language.languages['app_list_strings']['moduleList'][parentsUIStrSoFar] != 'undefined'){
                parentsUIStrSoFar = SUGAR.language.languages['app_list_strings']['moduleList'][parentsUIStrSoFar];
            }
			var previousModule = parentsArr[0];
			for (var i = 1; i < parentsArr.length; i++) {
				prevParentsStr = parentsStrSoFar;
				parentsStrSoFar = parentsStrSoFar + ":" + parentsArr[i];
				var link_defs = module_defs[previousModule].link_defs;
				for ( j in link_defs) {
					if (parentsArr[i] == link_defs[j].name || parentsArr[i] == link_defs[j].relationship_name ) {
						var relationship = link_defs[j].relationship_name;
						parentsUIStrSoFar = parentsUIStrSoFar + " > " + link_defs[j].label;

						/*
						if (link_defs[j].bean_is_lhs && rel_defs[relationship].rhs_module) 
							parentsUIStrSoFar = parentsUIStrSoFar + " > " + rel_defs[relationship].rhs_module;
						else 
							parentsUIStrSoFar = parentsUIStrSoFar + " > " + rel_defs[relationship].lhs_module;
							*/
						
						if(typeof full_table_list[parentsStrSoFar] != 'undefined') {
						   previousModule = full_table_list[parentsStrSoFar].module;
						}
						break;						
					}
				}
			}
			return parentsUIStrSoFar;		
		},
		addFilterOnLoad: function(filter, current_filters_table) {
			var module = full_table_list[filter.table_key].module;
			var fieldName = filter.name;
			if(fieldName == 'team_set_id') {
			   var field = new Array();
			   field['vname'] = SUGAR.language.get('app_strings', 'LBL_TEAMS');
			   field['name'] = 'team_set_id';
			   field['type'] = 'team_set_id';
			   var link = filter.table_key.replace(/:/g,'>');
			   link = (link == 'self') ? module : link;
			   filter.table_key = (filter.table_key == 'self') ? module : link;
			   //C.L. 36987 - Add the "> Teams" indicator once more
			   filter.table_key += '> ' +  SUGAR.language.get('app_strings', 'LBL_TEAMS');
			} 
			else if (module_defs[module].field_defs[fieldName]){
			   var field = module_defs[module].field_defs[fieldName];
			   var link = filter.table_key.replace(/:/g,'>');
			}
            else
	            return;

			totalFilterRows++;
			var numFilterRows = document.getElementById(current_filters_table).rows.length;
			
			var filterRow = document.getElementById(current_filters_table).insertRow(numFilterRows);
			filterRow.setAttribute('id', current_filters_table +'_filter_row_' + totalFilterRows);
			var filterCell = filterRow.insertCell(0);
			if (link == "self") {
				link = module;
				var module_str = module;
                if(typeof SUGAR.language.languages['app_list_strings']['moduleList'][module] != 'undefined'){
                    module_str = SUGAR.language.languages['app_list_strings']['moduleList'][module];
                }
				parentsUIStrSoFar = module_str;
			}
			else {
				var parentsUIStrSoFar = SUGAR.reports.getParentsUIString(filter);
			}
			
			filterCell.innerHTML = 
				"<input type='hidden' id='"+current_filters_table +"_filter_row_" + totalFilterRows+"_field' value='"+
				filter.name +"'>"+
				"<input type='hidden' id='"+current_filters_table +"_filter_row_" + totalFilterRows+"_link' value='"+
				link + "'>"+
				"<input type='hidden' id='"+current_filters_table +"_filter_row_" + totalFilterRows+"_module' value='"+
				module +"'>" ;

			var filterCell = filterRow.insertCell(1);

			if (typeof(field.vname) != "undefined")
				filterCell.innerHTML = "<b>" + parentsUIStrSoFar + " > " + field.vname + "</b>";
			else
				filterCell.innerHTML = "<b>" + parentsUIStrSoFar + " > " + field.name + "</b>";
            
			SUGAR.reports.addToFullTableList(current_filters_table +'_filter_row_' + totalFilterRows, 
				parentsUIStrSoFar, link);
			
			filters_arr[filters_arr.length] = new Object();
			filters_count++;
			filters_count_map[filters_count] = filters_arr.length - 1;
			current_filter_id = filters_count;

			
			filters_arr[filters_count_map[filters_count]].module = module;
			filters_arr[filters_count_map[filters_count]].field = field;
			filters_arr[filters_count_map[filters_count]].id = filterRow.id;

			var qualify_cell = document.createElement('td');
			filterRow.appendChild(qualify_cell);
			filters_arr[filters_count_map[filters_count]].qualify_cell = qualify_cell;
		
			var input_cell = document.createElement('td');
			filterRow.appendChild(input_cell);
			filters_arr[filters_count_map[filters_count]].input_cell = input_cell;

			if ( typeof(filter) == 'undefined') {
				filter = default_filter;
			}
			SUGAR.reports.addFilterQualify(qualify_cell, filter);		
			SUGAR.reports.addFilterInput(input_cell, filter, filterRow.id);		

			var delete_cell = document.createElement('td');
			filterRow.appendChild(delete_cell);
			delete_cell.innerHTML = "&nbsp;&nbsp;<img onclick='SUGAR.reports.deleteFilter("+current_filter_id+",\""+ current_filters_table +"_filter_row_" + totalFilterRows + "\", \""+current_filters_table+"\")' src='index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=delete_inline.gif' alt='"+SUGAR.language.get("Reports", "LBL_REMOVE")+"'>";
			
		},
		addFieldToDisplayColumnsOnLoad: function(displayCol, orderBy) {
			var module = full_table_list[displayCol.table_key].module;
			var fieldName = displayCol.name;	
			if (module_defs[module].field_defs[fieldName])
				var field = module_defs[module].field_defs[fieldName];
			else
				return;

			totalDisplayColRows++;
			var link = displayCol.table_key.replace(/:/g,'>');
			if (link == "self") {
				link = module;
				var module_str = module;
                if(typeof SUGAR.language.languages['app_list_strings']['moduleList'][module] != 'undefined'){
                    module_str = SUGAR.language.languages['app_list_strings']['moduleList'][module];
                }
				parentsUIStrSoFar = module_str;
			}
			else {
				var parentsUIStrSoFar = SUGAR.reports.getParentsUIString(displayCol);
			}
			
			var table = document.getElementById('displayColsTable');
			if (document.getElementById('display_cols_help_row')) {
				var tBody = table.childNodes[0];
				tBody.removeChild(document.getElementById('display_cols_help_row'));
			}

			var row = table.insertRow(table.rows.length);
			row.setAttribute('id', 'display_cols_row_' + totalDisplayColRows);
			var cell = row.insertCell(0);
			cell.setAttribute('scope', 'row');
			cell.innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;<input type='hidden' id='display_cols_row_"+ totalDisplayColRows+"_module' value='"+
				module +"'>" +
				"<input type='hidden' id='display_cols_row_" + totalDisplayColRows+"_link' value='"+
				link + "'>" +
				"<input type='hidden' id='display_cols_row_" + totalDisplayColRows+"_field' value='"+
				fieldName + "'>";
				
							
			var cell = row.insertCell(1);
			cell.setAttribute('scope', 'row');
			if (typeof(field.vname) != "undefined")
				var colLabel = parentsUIStrSoFar + " > " + field.vname;
			else
				var colLabel = parentsUIStrSoFar + " > " + field.name;

			cell.innerHTML = colLabel;
			cell.setAttribute("onmouseover", "this.style.cursor = 'move'");

			cell = row.insertCell(2);
			cell.setAttribute('scope', 'row');
			
			cell.innerHTML = "<input type='text' size='50' id= 'display_cols_label_'"+totalDisplayColRows+" value=\""+displayCol.label+"\" onclick='this.focus();'>";

			cell = row.insertCell(3);
			cell.setAttribute('scope', 'row');
			cell.innerHTML = "<input type='radio' name='order_by_radio' id='order_by_radio_"+totalDisplayColRows +"' onClick='SUGAR.reports.orderBySelected(" +totalDisplayColRows+")' >";
			cell.innerHTML +="&nbsp;&nbsp;<span id='orderByDirectionDiv_" +totalDisplayColRows + "'></span>";
			if (typeof (orderBy) != "undefined" && orderBy.length > 0) {
				if (orderBy[0].name == displayCol.name && orderBy[0].table_key == displayCol.table_key) {
					document.getElementById("order_by_radio_"+totalDisplayColRows).setAttribute('checked', true);
					SUGAR.reports.orderBySelected(totalDisplayColRows, orderBy[0].sort_dir);
				}
			}

			cell = row.insertCell(4);
			cell.setAttribute('scope', 'row');
			cell.innerHTML = "&nbsp;&nbsp;<img onclick='SUGAR.reports.deleteDisplayCol(\"display_cols_row_" +totalDisplayColRows + "\")' src='index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=delete_inline.gif' alt='"+SUGAR.language.get("Reports", "LBL_REMOVE")+"'>";

			SUGAR.reports.addToFullTableList('display_cols_row_' + totalDisplayColRows,
				parentsUIStrSoFar, link);		
			
			var dd11 = YAHOO.util.Dom.get('display_cols_row_' + totalDisplayColRows);
            dd11.dd = new SUGAR.reports.reportDDProxy('display_cols_row_' + totalDisplayColRows, 'group');
		},
		addFieldToGroupByOnLoad: function(groupByColumn, summaryOrderBy) {
			var module = full_table_list[groupByColumn.table_key].module;
			if (groupByColumn.qualifier)
				var fieldName = groupByColumn.name+":"+groupByColumn.qualifier;		
			else 
				var fieldName = groupByColumn.name;		

			var field = module_defs[module].field_defs[fieldName];
			if (typeof(field) == 'undefined')
				var field = module_defs[module].group_by_field_defs[fieldName];
			if (typeof(field) == 'undefined')
				return;

			totalGroupByRows++;
			var link = groupByColumn.table_key.replace(/:/g,'>');
			if (link == "self") {
				link = module;
				var module_str = module;
                if(typeof SUGAR.language.languages['app_list_strings']['moduleList'][module] != 'undefined'){
                    module_str = SUGAR.language.languages['app_list_strings']['moduleList'][module];
                }
				parentsUIStrSoFar = module_str;
			}
			else {
				var parentsUIStrSoFar = SUGAR.reports.getParentsUIString(groupByColumn);
			}
			
			var table = document.getElementById('groupByTable');
			if (document.getElementById('group_by_help_row')) {
				var tBody = table.childNodes[0];
				tBody.removeChild(document.getElementById('group_by_help_row'));
			}

			var row = table.insertRow(table.rows.length);
			var id = 'group_by_row_' + totalGroupByRows;
			row.setAttribute('id', id);
			var cell = row.insertCell(0);
			cell.setAttribute('scope', 'row');
			cell.innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;<input type='hidden' id='group_by_row_"+ totalGroupByRows+"_module' value='"+
				module +"'>" +
				"<input type='hidden' id='group_by_row_" + totalGroupByRows+"_link' value='"+
				link + "'>"+
				"<input type='hidden' id='group_by_row_" + totalGroupByRows+"_field' value='"+
				field.name + "'>";
							
			var cell = row.insertCell(1);
			cell.setAttribute('scope', 'row');
			//todo: if field doesn't have a vname, use name
			if (typeof (field.vname) != "undefined")
				var colLabel = parentsUIStrSoFar + " > " + field.vname;
			else
				var colLabel = parentsUIStrSoFar + " > " + field.name;
			cell.innerHTML = colLabel;
			cell.setAttribute("onmouseover", "this.style.cursor = 'move'");

			SUGAR.reports.addToFullTableList('group_by_row_' + totalGroupByRows,
				parentsUIStrSoFar, link);		
			
			cell = row.insertCell(2);
			cell.setAttribute('scope', 'row');
			cell.innerHTML = "&nbsp;&nbsp;<img onclick='SUGAR.reports.deleteGroupBy(\"group_by_row_" +totalGroupByRows + "\")' src='index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=delete_inline.gif' alt='"+SUGAR.language.get("Reports", "LBL_REMOVE")+"'>";
			var dd11 = YAHOO.util.Dom.get(id);
            dd11.dd = new SUGAR.reports.reportDDProxy(id, 'groupBy');
			SUGAR.reports.addFieldToDisplaySummariesOnLoad(groupByColumn, 'group_by_row_' + totalGroupByRows, summaryOrderBy);
		},	
		addFieldToDisplaySummariesOnLoad: function(summaryColumn, linkedGroupById, summaryOrderBy) {
            // Bug #39763 override label if force_label exists.
            if (typeof summaryColumn.force_label != 'undefined')
            {
                summaryColumn.label = summaryColumn.force_label;
            }
			var module = full_table_list[summaryColumn.table_key].module;
			if (summaryColumn.qualifier)
				var fieldName = summaryColumn.name+":"+summaryColumn.qualifier;		
			else if (summaryColumn.group_function && 
				(summaryColumn.group_function == "weighted_amount" || summaryColumn.group_function == "weighted_sum" ))
				var fieldName = summaryColumn.group_function;		
			else if (summaryColumn.group_function && summaryColumn.group_function != 'count')
				var fieldName = summaryColumn.name+":"+summaryColumn.group_function;		
			else 
				var fieldName = summaryColumn.name;		
			
			var field = module_defs[module].field_defs[fieldName];
			if (typeof(field) == 'undefined')
				var field = module_defs[module].summary_field_defs[fieldName];
			if (typeof(field) == 'undefined')
				var field = module_defs[module].group_by_field_defs[fieldName];
			if (typeof(field) == 'undefined')
				return;

			totalDisplayColRows++;
			var link = summaryColumn.table_key.replace(/:/g,'>');
			if (link == "self") {
				link = module;
				var module_str = module;
                if(typeof SUGAR.language.languages['app_list_strings']['moduleList'][module] != 'undefined'){
                    module_str = SUGAR.language.languages['app_list_strings']['moduleList'][module];
                }
				parentsUIStrSoFar = module_str;
			}
			else {
				var parentsUIStrSoFar = SUGAR.reports.getParentsUIString(summaryColumn);
			}
			
			
			var table = document.getElementById('displaySummariesTable');
			if (document.getElementById('display_summary_help_row')) {
				var tBody = table.childNodes[0];
				tBody.removeChild(document.getElementById('display_summary_help_row'));
			}
			
			if ( typeof (summaryColumn.group_function) != 'undefined') {
				var key = summaryColumn.table_key + ":" + summaryColumn.name;
				if (summaryColumn.group_function != 'count')
					key+= ":" + summaryColumn.group_function;

				document.ReportsWizardForm.numerical_chart_column.options[document.ReportsWizardForm.numerical_chart_column.options.length] =
					new Option(summaryColumn.label,key);
			}

			var row = table.insertRow(table.rows.length);
			if (linkedGroupById != null)
				id = 'display_summaries_row_' + linkedGroupById;
			else 
				id = 'display_summaries_row_' + totalDisplayColRows;
			
			row.setAttribute('id', id);
			var cell = row.insertCell(0);
			cell.setAttribute('scope', 'row');
			cell.innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;<input type='hidden' id='"+ id+"_module' value='"+
				module +"'>" +
				"<input type='hidden' id='" + id+"_link' value='"+
				link + "'>" +
				"<input type='hidden' id='" + id+"_field' value='"+
				field.name + "'>";
				
							
			var cell = row.insertCell(1);
			cell.setAttribute('scope', 'row');
			if (typeof(field.vname) != "undefined")
				var colLabel = parentsUIStrSoFar + " > " + field.vname;
			else
				var colLabel = parentsUIStrSoFar + " > " + field.name;
			
			cell.innerHTML = colLabel;
			if (linkedGroupById == null) {
				cell.setAttribute("onmouseover", "this.style.cursor = 'move'");
			}				
			cell = row.insertCell(2);
			cell.setAttribute('scope', 'row');
			cell.innerHTML = "<input type='text' size='50' id= '"+id+"_input' value='"+summaryColumn.label+"' onclick='this.focus();'>";
			cell = row.insertCell(3);
			cell.setAttribute('scope', 'row');
			if (report_type == 'summation') {
				cell.innerHTML = "<input type='radio' name='summary_order_by_radio' id='summary_order_by_radio_"+ id + "' onClick='SUGAR.reports.summaryOrderBySelected(\""	+ id + "\")' >";
				cell.innerHTML += "&nbsp;&nbsp;<span id='summaryOrderByDirectionDiv_" + id	+ "'></span>";
				if (typeof (summaryOrderBy) != "undefined" && summaryOrderBy.length > 0) {
					if (report_type=='summation' && summaryOrderBy[0].name == summaryColumn.name && summaryOrderBy[0].table_key == summaryColumn.table_key) {
						document.getElementById("summary_order_by_radio_" + id).setAttribute('checked', true);
						SUGAR.reports.summaryOrderBySelected(id, summaryOrderBy[0].sort_dir);
					}
				}
				cell = row.insertCell(4);
				cell.setAttribute('scope', 'row');
			}
			if (linkedGroupById == null)
				cell.innerHTML = "&nbsp;&nbsp;<img onclick='SUGAR.reports.deleteDisplaySummary(this)' src='index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=delete_inline.gif' '"+SUGAR.language.get("Reports", "LBL_REMOVE")+"'>";
			SUGAR.reports.addToFullTableList(id,
				parentsUIStrSoFar, link);		

			var dd11 = YAHOO.util.Dom.get(id);
            dd11.dd = new SUGAR.reports.reportDDProxy(id, 'group_summaries');
		},	
		copyFilter: function(origFilterRowId, origFilterRow, current_filters_table, filterDef) {
			totalFilterRows++;
			var numFilterRows = document.getElementById(current_filters_table).rows.length;
			var filterRow = document.getElementById(current_filters_table).insertRow(numFilterRows);
			filterRow.setAttribute('id', current_filters_table +'_filter_row_' + totalFilterRows);
			var filterCell = filterRow.insertCell(0);
			filterCell.innerHTML = 
				"<input type='hidden' id='"+current_filters_table +"_filter_row_" + totalFilterRows+"_field' value='"+
				document.getElementById(origFilterRowId + "_field").value+"'>"+
				"<input type='hidden' id='"+current_filters_table +"_filter_row_" + totalFilterRows+"_link' value='"+
				document.getElementById(origFilterRowId + "_link").value+"'>"+
				"<input type='hidden' id='"+current_filters_table +"_filter_row_" + totalFilterRows+"_module' value='"+
				document.getElementById(origFilterRowId + "_module").value +"'>" ;

			var filterCell = filterRow.insertCell(1);
			filterCell.innerHTML = origFilterRow.cells[1].innerHTML;
			if(document.all)
				var parents = origFilterRow.cells[1].innerText;
			else // Firefox
				var parents = origFilterRow.cells[1].textContent;
			var parentsArr = parents.split('>');
			parentsArr.splice(parentsArr.length - 1, 1);
			var parents = parentsArr.join('>');
			SUGAR.reports.addToFullTableList(current_filters_table +'_filter_row_' + totalFilterRows, 
				parents,document.getElementById(origFilterRowId + "_link").value);

			filters_arr[filters_arr.length] = new Object();
			filters_count++;
			filters_count_map[filters_count] = filters_arr.length - 1;
			current_filter_id = filters_count;

			var module = document.getElementById(origFilterRowId + "_module").value;
			var fieldName = document.getElementById(origFilterRowId + "_field").value;		
			var field = module_defs[module].field_defs[fieldName];
			filters_arr[filters_count_map[filters_count]].module = module;
			filters_arr[filters_count_map[filters_count]].field = field;
			filters_arr[filters_count_map[filters_count]].id = filterRow.id;

			var qualify_cell = document.createElement('td');
			filterRow.appendChild(qualify_cell);
			filters_arr[filters_count_map[filters_count]].qualify_cell = qualify_cell;
		
			var input_cell = document.createElement('td');
			filterRow.appendChild(input_cell);
			filters_arr[filters_count_map[filters_count]].input_cell = input_cell;

			if ( typeof(filter) == 'undefined') {
				filter = default_filter;
			}
			SUGAR.reports.addFilterQualify(qualify_cell, filterDef);		
			SUGAR.reports.addFilterInput(input_cell, filterDef, filterRow.id);		

			var delete_cell = document.createElement('td');
			filterRow.appendChild(delete_cell);
			delete_cell.innerHTML = "&nbsp;&nbsp;<img onclick='SUGAR.reports.deleteFilter("+current_filter_id+",\""+ current_filters_table +"_filter_row_" + totalFilterRows + "\", \""+current_filters_table+"\")' src='index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=delete_inline.gif' alt='"+SUGAR.language.get("Reports", "LBL_REMOVE")+"'>";
		},
								
		addFieldToFilter: function(item, e) {
			var record = e.getRecord(e.getSelectedRows()[0]);
			
			current_filters_table = item.text.replace(/&nbsp;&nbsp;&nbsp;&nbsp;/,"") + "_table";
			totalFilterRows++;
			var numFilterRows = document.getElementById(current_filters_table).rows.length;

			if (document.getElementById('inlineFiltersHelpTable')) 
				document.getElementById(SUGAR.language.get('Reports','LBL_FILTER') + ".1_body_div").innerHTML = "";

			var filterRow = document.getElementById(current_filters_table).insertRow(numFilterRows);
			filterRow.setAttribute('id', current_filters_table +'_filter_row_' + totalFilterRows);
			var filterCell = filterRow.insertCell(0);
			filterCell.innerHTML = 
				"<input type='hidden' id='"+current_filters_table +"_filter_row_" + totalFilterRows+"_field' value='"+
				fieldGridCell.getRecord(fieldGridCell.getSelectedRows()[0]).getData('field_name') +"'>"+
				"<input type='hidden' id='"+current_filters_table +"_filter_row_" + totalFilterRows+"_link' value='"+
				fieldGridCell.getRecord(fieldGridCell.getSelectedRows()[0]).getData('parents_link') + "'>"+
				"<input type='hidden' id='"+current_filters_table +"_filter_row_" + totalFilterRows+"_module' value='"+
				fieldGridCell.getRecord(fieldGridCell.getSelectedRows()[0]).getData('module_name') +"'>" ;

			var filterCell = filterRow.insertCell(1);
			filterCell.innerHTML = "<b>" + fieldGridCell.getRecord(fieldGridCell.getSelectedRows()[0]).getData('parents') + " > " +
				fieldGridCell.getRecord(fieldGridCell.getSelectedRows()[0]).getData('field_label') + "</b>";

			SUGAR.reports.addToFullTableList(current_filters_table +'_filter_row_' + totalFilterRows, 
				fieldGridCell.getRecord(fieldGridCell.getSelectedRows()[0]).getData('parents'));

			filters_arr[filters_arr.length] = new Object();
			filters_count++;
			filters_count_map[filters_count] = filters_arr.length - 1;
			current_filter_id = filters_count;

			var module = fieldGridCell.getRecord(fieldGridCell.getSelectedRows()[0]).getData('module_name');
			var fieldName = fieldGridCell.getRecord(fieldGridCell.getSelectedRows()[0]).getData('field_name');		
			var field = module_defs[module].field_defs[fieldName];
			filters_arr[filters_count_map[filters_count]].module = module;
			filters_arr[filters_count_map[filters_count]].field = field;
			filters_arr[filters_count_map[filters_count]].id = filterRow.id;

			var qualify_cell = document.createElement('td');
			filterRow.appendChild(qualify_cell);
			filters_arr[filters_count_map[filters_count]].qualify_cell = qualify_cell;
		
			var input_cell = document.createElement('td');
			filterRow.appendChild(input_cell);
			filters_arr[filters_count_map[filters_count]].input_cell = input_cell;

			if ( typeof(filter) == 'undefined') {
				filter = default_filter;
			}
			SUGAR.reports.addFilterQualify(qualify_cell, filter);		
			SUGAR.reports.addFilterInput(input_cell, filter, filterRow.id);		

			var delete_cell = document.createElement('td');
			filterRow.appendChild(delete_cell);
			delete_cell.innerHTML = "&nbsp;&nbsp;<img onclick='SUGAR.reports.deleteFilter("+current_filter_id+",\""+ current_filters_table +"_filter_row_" + totalFilterRows + "\", \""+current_filters_table+"\")' src='index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=delete_inline.gif' alt='"+SUGAR.language.get("Reports", "LBL_REMOVE")+"'>";
		},
		
		loadXML: function() {
			var gURL = 'index.php?module=Reports&action=fillUserCombo';
			if (window.XMLHttpRequest) { // code for Mozilla, Safari, etc 
				xmlhttp=new XMLHttpRequest();
				if (xmlhttp.overrideMimeType) {
					xmlhttp.overrideMimeType('text/xml');
				}	
				xmlhttp.open("GET", gURL, false);
				xmlhttp.onreadystatechange=SUGAR.reports.loadUsers;
				xmlhttp.send(null);
				SUGAR.reports.loadUsers();
			} 
			else if (window.ActiveXObject) { //IE 
				xmlhttp=new ActiveXObject('Microsoft.XMLHTTP'); 
				if (xmlhttp) {
					xmlhttp.onreadystatechange=SUGAR.reports.loadUsers;
					xmlhttp.open('GET', gURL, false);
					xmlhttp.send();
				}
			}
		},

		loadUsers: function() {
		if (xmlhttp.readyState==4) { 
			if(xmlhttp.status==200 || xmlhttp.status==0){ 
				if (window.ActiveXObject)
					xmlhttp.responseXML.loadXML(xmlhttp.responseText);
	
				var acc = xmlhttp.responseXML.getElementsByTagName('data');
				var opts = '';
				for (var i=0;i<acc.length;i++)
				{	
					val = getNodeValue(acc[i],'datavalue');
					users_array[users_array.length] = eval("("+val+")");
				}
			}
		}
		},		
		getParentsStringOfCurrentNode: function() {
			var selectedNode = this.module_tree.currentFocus;
			if (selectedNode) {
				var selectedNodedepth = selectedNode.depth;
				var parentsStr = "";
				var currentNode = selectedNode;
				for (var i = selectedNodedepth ; i >= 0 ; --i) {
					parentsStr = currentNode.label + parentsStr;
					if (i > 0) {
						parentsStr = " > " + parentsStr;
					} // if
					currentNode = currentNode.parent;
				} // for
				return parentsStr;
			} else {
                var current_module_str = current_module;
                if(typeof SUGAR.language.languages['app_list_strings']['moduleList'][current_module] != 'undefined'){
                    current_module_str = SUGAR.language.languages['app_list_strings']['moduleList'][current_module];
                }
                return current_module_str;  
			} // else
		},
		getParentsLinksOfCurrentNode: function() {
			if (this.module_tree.currentFocus) {
				var selectedNode = this.module_tree.currentFocus;
				var selectedNodedepth = selectedNode.depth;
				var parentsStr = "";
				var currentNode = selectedNode;
				for (var i = selectedNodedepth ; i >= 0 ; --i) {
					if (currentNode.data.link_name) {
						parentsStr = currentNode.data.link_name + parentsStr;
					} else {
						parentsStr = currentNode.data.category + parentsStr;
					} // else
					if (i > 0) {
						parentsStr = ">" + parentsStr;
					} // if
					currentNode = currentNode.parent;
				} // for
				return parentsStr;				
			}
			return current_module;
		},		
		
		populateFieldGrid: function(module, link_name, parent_module, comboLabel) {
			if (link_name == null)
				link_name = 'self';
			if (typeof(comboLabel) == 'undefined')
				comboLabel = module_defs[module].label;
			if (SUGAR.reports.myDataTable != null) {
				SUGAR.reports.myDataTable.destroy();
			} // if
			document.getElementById('module_fields').innerHTML='';
			if (currEditorDiv == 'group_by') 
				var fields = module_defs[module].group_by_field_defs;
			else if (currEditorDiv == 'display_summaries' && report_type != 'tabular') {
				var fields = module_defs[module].summary_field_defs;
				/*
				for (i in module_defs[module].field_defs) {
					fields[i] = module_defs[module].field_defs[i];
				}*/
			}
			else 
				var fields = module_defs[module].field_defs;
			var parentsStr = SUGAR.reports.getParentsStringOfCurrentNode();			
			var parentsLink = SUGAR.reports.getParentsLinksOfCurrentNode();
			var fieldGridData = new Array();
			var fieldGridJSON = new Array();
			for (i in fields) {
				//Do not display fields set to invisible
				if(typeof fields[i]['invisible'] != "undefined" && fields[i]['invisible']) {
				   continue;
				}
				
				//Image fields are only usable as display fields
				if (typeof fields[i]['type'] != "undefined" && fields[i]['type'] == 'image' && currEditorDiv != 'display')
					continue;
				
				var obj = new Object();
				if (typeof(fields[i]['vname']) != "undefined") {
					fieldGridData.push([fields[i]['vname'],module,parentsStr, fields[i]['name'],link_name,parent_module,parentsLink]);
					obj['field_label'] = fields[i]['vname'];
				} else {
					fieldGridData.push([fields[i]['name'],module,parentsStr, fields[i]['name'],link_name,parent_module,parentsLink]);
					obj['field_label'] = fields[i]['name'];
				} // else
				obj['module_name'] = module;
				obj['parents'] = parentsStr;
				obj['field_name'] = fields[i]['name'];
				obj['link_name'] = link_name;
				obj['parent_module'] = parent_module;
				obj['parents_link'] = parentsLink;
				fieldGridJSON.push(obj);
			}
			var myColumnDefs = [ 
	            {key:"field_label", minWidth: 150, sortable:true, resizeable:false, label:SUGAR.language.get('Reports','LBL_FIELD_NAME'),abbr:'" scope="col'} //injecting 'scope' into YUI parameter for 508 compliance
	        ];
	        var myDataSource = new YAHOO.util.LocalDataSource(fieldGridData);
	        myDataSource.responseType = YAHOO.util.DataSource.TYPE_JSARRAY;
	        myDataSource.responseSchema = { 
	            fields: ["field_label", "module_name","parents", "field_name", "link_name", "parent_module", "parents_link"]
	        };

			var title = "<h3 class='spantitle'>" + SUGAR.language.get('Reports','LBL_AVAILABLE_FIELDS') + " : " + comboLabel  +  "<span id='fields_panel_help'><img src='index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=helpInline.gif'  alt='"+SUGAR.language.get("Reports", "LBL_ALT_INFORMATION")+"'></span></h3>";
			
			var toolTip = new YAHOO.widget.Tooltip("tt6", {context:"fields_panel_help",  
						   	   text:SUGAR.language.get('Reports','LBL_FIELDS_PANEL_HELP_DESC'),
						   constraintoviewport : true,
						   height : "40px",
						   width : "350px"
			});
			//toolTip.show();
			var oldOffsetHeight = document.getElementById("autocomplete").offsetHeight;
			//SUGAR.reports.modulefieldspanel.
			SUGAR.reports.autocompletemodule.header.innerHTML = title;
			var newOffsetHeight = document.getElementById("autocomplete").offsetHeight;
			var diffOffsetHeight = newOffsetHeight - oldOffsetHeight;
	        var myDataTable = new YAHOO.widget.ScrollingDataTable("module_fields", 
	        					myColumnDefs, myDataSource, 
	        					{height : "270px", width: "200px"}
	        );
	        /*
	        myDataTable.subscribe("rowClickEvent", myDataTable.onEventSelectRow);
	        myDataTable.subscribe("rowSelectEvent", SUGAR.reports.gridRowClickHandler);
	        */
	        myDataTable.subscribe("rowClickEvent", SUGAR.reports.gridRowClickHandler);
	        
	        // Bug 44636
	        // Must remove old listeners, because every time we select a new node, AutoComplete widget adds new listeners. 
	        YAHOO.util.Event.removeListener("dt_input");
	        
			var oACDS = myDataSource;
	        oACDS.queryMatchContains = true; 
	        var oAutoComp = new YAHOO.widget.AutoComplete("dt_input","dt_ac_container", oACDS);
	        oAutoComp.doBeforeLoadData = function( sQuery , oResponse , oPayload ) {
	        	SUGAR.reports.myDataTable.initializeTable();
	        	SUGAR.reports.myDataTable.addRows(oResponse.results);
	        	SUGAR.reports.myDataTable.render();
	        }
	        myDataTable.render();
	        dtBodyOffsetHeight = 0;
	        if (SUGAR.reports.dtBodyOffsetHeight != null) {
	        	dtBodyOffsetHeight = SUGAR.reports.dtBodyOffsetHeight;
	        } else {
	        	SUGAR.reports.dtBodyOffsetHeight = YAHOO.util.Dom.getElementsByClassName("yui-dt-bd", "", document.getElementById("module_fields"))[0].offsetHeight;
	        	dtBodyOffsetHeight = SUGAR.reports.dtBodyOffsetHeight
	        }
			var dtBody = YAHOO.util.Dom.getElementsByClassName("yui-dt-bd", "", document.getElementById("module_fields"))[0];
			if (diffOffsetHeight > 0) {
				dtBody.style.height = (dtBody.offsetHeight + dtBodyOffsetHeight - diffOffsetHeight) + "px";
			} // if
			var dtInput = document.getElementById("dt_input");
			dtInput.value = SUGAR.language.get('Reports','LBL_COMBO_TYPE_AHEAD');
			dtInput.onkeyup = function() {
				if (this.value == '') {
		        	myDataTable.initializeTable();
		        	myDataTable.addRows(fieldGridJSON);
		        	myDataTable.render();
				} // if
			} // fn
			dtInput.onfocus = function() {
				if(this.value == SUGAR.language.get('Reports','LBL_COMBO_TYPE_AHEAD')) {
					this.value = "";
				} // if
			} // fn
			dtInput.onblur = function() {
				if (this.value == '') {
					this.value = SUGAR.language.get('Reports','LBL_COMBO_TYPE_AHEAD');
				}
			} // fn
			var clearButton = document.getElementById("clearButton");
			clearButton.onclick = function() {
				var dtInput = document.getElementById("dt_input");
				if (dtInput.value != SUGAR.language.get('Reports','LBL_COMBO_TYPE_AHEAD')) {
					dtInput.value = SUGAR.language.get('Reports','LBL_COMBO_TYPE_AHEAD');
		        	myDataTable.initializeTable();
		        	myDataTable.addRows(fieldGridJSON);
		        	myDataTable.render();
				}
			} // fn
			SUGAR.reports.myDataTable = myDataTable;
	        			
		},

		gridRowClickHandler: function(e, object) {
			this.unselectAllRows();
			this.selectRow(e.target);
			fieldGridCell = this;
			if (currEditorDiv == 'filters') {
				var panels = SUGAR.FiltersWidget.getPanels();
				if (panels.length > 1) {
					SUGAR.reports.addFieldContextMenu(e, fieldGridCell);
				} else {
					var item = new Object();
					item.text = panels[0].id;
					SUGAR.reports.addFieldToFilter(item, fieldGridCell);
				}
			} else if (currEditorDiv == 'group_by') {
				SUGAR.reports.addFieldToGroupBy(fieldGridCell);
			} else if (currEditorDiv == 'display') {
				SUGAR.reports.addFieldToDisplayColumns(fieldGridCell);
			} else if (currEditorDiv == 'display_summaries') {
				SUGAR.reports.addFieldToDisplaySummaries(fieldGridCell);
			} // else if

		},
		addFieldToFilterEvent : function(e, eventobj, obj) {
			SUGAR.reports.addFieldToFilter(obj.item, obj.e);
		},
		addFieldContextMenu: function(e, object) {
			var panels = SUGAR.FiltersWidget.getPanels();
			var myContextMenu = null;
			if (SUGAR.reports.filterFieldsMenu != null) {
				myContextMenu = SUGAR.reports.filterFieldsMenu;
				myContextMenu.destroy();
			}
			myContextMenu = new YAHOO.widget.Menu("mycontextmenu", {'xy' : YAHOO.util.Event.getXY(e.event), visible : true});
	        myContextMenu.addItem(SUGAR.language.get('Reports', 'LBL_ADD_FILTER_TO'));
			for (var i = 0; i < panels.length; i++) {
				if (document.getElementById(panels[i].id + "_body_div") && panels[i].id != SUGAR.language.get('Reports','LBL_FILTER') + ".1") {
					var item = new Object();
					item.text = panels[i].id;
					var menuItem = new YAHOO.widget.MenuItem(panels[i].id, {text : panels[i].id, onclick : {fn : SUGAR.reports.addFieldToFilterEvent, obj : {'item' : item, 'e' : object}}});
					myContextMenu.addItem(menuItem);
				} // if
			} // for
			SUGAR.reports.filterFieldsMenu = myContextMenu;
			myContextMenu.render(document.body);
			myContextMenu.show();
		},

		buildTree : function(module) {
			var module_str = module;
            if(typeof SUGAR.language.languages['app_list_strings']['moduleList'][module] != 'undefined'){
                module_str = SUGAR.language.languages['app_list_strings']['moduleList'][module];
            } // if
            
            var moduleTree = SUGAR.reports.module_tree;
            if (!moduleTree) {
				var title = "<h3 class='spantitle'>" + SUGAR.language.get('Reports','LBL_RELATED_MODULES') + "<span id='related_modules_panel_help'><img src='index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=helpInline.gif'  alt='"+SUGAR.language.get("Reports", "LBL_ALT_INFORMATION")+"'></span></h3>";
				var moduleTree = new YAHOO.widget.Module("module_tree_panel", { visible: false });
				var moduletreePanelHTML = "<div id=\"module_tree\" style=\"height:230px; width:200px; overflow:auto;\"></div>";
				moduleTree.setHeader(title);
				moduleTree.setBody(moduletreePanelHTML);
				moduleTree.render();
				moduleTree.show();

				var autocompletemodule = new YAHOO.widget.Module("autocomplete", { visible: false });
				autocompletemodule.setHeader(title);
				//autocompletemodule.setBody(panelHTML);
				autocompletemodule.render();
				autocompletemodule.show();
				
				var modulefields = new YAHOO.widget.Module("module_fields_panel", { visible: false });
				//autocompletemodule.setHeader(title);
				var modulefieldsPanelHTML = "<div id=\"module_fields\" style=\"width:200px; overflow:auto;\"></div>";
				modulefields.setBody(modulefieldsPanelHTML);
				modulefields.render();
				modulefields.show();

				var toolTip = new YAHOO.widget.Tooltip("tt5", {context:"related_modules_panel_help",  
  						   	   text:SUGAR.language.get('Reports','LBL_RELATED_MODULES_PANEL_HELP_DESC'),
							   constraintoviewport : true,
							   height : "40px",
							   width : "300px"
				});
				//toolTip.show();
				SUGAR.reports.autocompletemodule = autocompletemodule;
				
				// generate YUI tree
            	var module_tree = new YAHOO.widget.TreeView("module_tree");
            	module_tree.singleNodeHighlight = true;
            	//turn dynamic loading on for entire tree: 
				module_tree.setDynamicLoad(SUGAR.reports.loadModuleTreeData, 1);
				var root = module_tree.getRoot();
				var tempNode = new YAHOO.widget.TextNode({
									href : "javascript:SUGAR.reports.populateFieldGrid('"+ module+"','','');", 
									label : module_str,
									category : module},
								root, false);
				tempNode.isLeaf = false;
				module_tree.currentFocus = tempNode;
				module_tree.subscribe("focusChanged", function(oldNode, newNode) {
													  	this.currentFocus = newNode;
													  }
				);
            	SUGAR.reports.module_tree = module_tree;
				module_tree.render();
				tempNode.expand();
            } // if  
		},
		
		loadModuleTreeData : function(node, fnLoadComplete) {
			var nodeCategory = node.data.category;
			var dtInput = document.getElementById("dt_input");
			dtInput.value = SUGAR.language.get('Reports','LBL_COMBO_TYPE_AHEAD');
			var uri = "index.php?action=BuildReportModuleTree&module=Reports&page=report&sugar_body_only=true&to_pdf=true" + "&report_module=" + nodeCategory;
			YAHOO.util.Connect.asyncRequest('POST', uri, {
				success: SUGAR.reports.renderModuleTreeData,
				argument: {
					node: node,
					fnLoadComplete : fnLoadComplete
				},
				scope: this
			}, "");
		},
		
		renderModuleTreeData : function(o) {
			var node = o.argument.node;
			var resp = YAHOO.lang.JSON.parse(o.responseText);
			if (resp.length > 0) {
				for (var i = 0; i < resp.length; i++) {
					resp[i].label = resp[i].text;
					var newChild = new YAHOO.widget.TextNode(resp[i], node);
				} // for
			} // if
			o.argument.fnLoadComplete();
		},
		
		getProperModuleName: function(moduleName) {
			var properModuleName = moduleName.toLowerCase();
			properModuleName = properModuleName.charAt(0).toUpperCase() + properModuleName.substring(1, moduleName.length);
			return properModuleName;
		},

		moduleButtonClick: function(currModule, buttonObj) {
			if (currWizardStep > 2 && !confirm(SUGAR.language.get('Reports','LBL_MODULE_CHANGE_PROMPT')))
				return false;
			var table = document.getElementById('buttons_table');
			for (var i = 0; i < table.rows.length; i++) {
				var cells = table.rows[i].cells;
				for (var j = 0; j < cells.length; j++) {
					if (document.all)
						cells[j].childNodes[0].className = "wizardButton";
					else
						cells[j].childNodes[1].className = "wizardButton";
				}
			}
			buttonObj.setAttribute("class", "wizardButtonDown");
			document.ReportsWizardForm.current_module.value = currModule;
			full_table_list = new Object();
			full_table_list.self = new Object();
			full_table_list.self.value = currModule;
			full_table_list.self.module = currModule;
			full_table_list.self.label = currModule;
			current_module = currModule;
			if(SUGAR.reports.module_tree != null) {
				SUGAR.reports.module_tree.destroy();
				delete SUGAR.reports.module_tree;
			} // if
			SUGAR.reports.changeSelectedModule(currModule);
			SUGAR.reports.showWizardStep(0);
		},

		selectReportType: function (reportType, matrixReport) {
			report_type = reportType;
			totalFilterRows = 0;
			totalDisplayColRows = 0;
			totalGroupByRows = 0;			
			currWizardStep = 1;
			if (matrixReport && matrixReport == true)
				isMatrix = true;
			SUGAR.reports.showWizardStep(0);

		},
		changeSelectedModule: function(current_module) {
			var panels = SUGAR.FiltersWidget.getPanels();
			for (var i = 0; i < panels.length; i++) {
				SUGAR.FiltersWidget.removeGroup(panels[i].id, panels[i].parentId);
			}
			SUGAR.reports.buildTree(current_module);
		    //SUGAR.reports.populateFieldGrid(current_module,"",""); // This was already commented out in code base.
		    SUGAR.FiltersWidget.init(imgPath);
		    SUGAR.FiltersWidget.addGroupToPanel('filter_designer_div', SUGAR.language.get('Reports','LBL_FILTER'));
		    SUGAR.reports.showDisplayColumnsPanel();
		    if (report_type != 'tabular') {
				SUGAR.reports.showGroupByColumns();
			    SUGAR.reports.showDisplaySummaries();
		    }
		    
		},
		getTeamSetIdTableValue: function(team_set_id, current_module, check_current_module) {
			team_set_id = team_set_id.replace(/>team_link/g,'');
			if(check_current_module) {
			   return team_set_id.indexOf('>') == -1 ? current_module : team_set_id;
			}
			return team_set_id;
		}
	};
}();

SUGAR.reports.reportDDProxy = function( id , sGroup , config) {
	if (document.getElementById(id)) {
		var Dom = YAHOO.util.Dom;
		SUGAR.reports.reportDDProxy.superclass.constructor.call(this, id, sGroup, config);
		var dEl = this.getDragEl()
		Dom.setStyle(dEl, "borderColor", "#FF0000");
		Dom.setStyle(dEl, "backgroundColor", "#e5e5e5");
		Dom.setStyle(dEl, "opacity", 0.5);
		Dom.setStyle(dEl, "filter", "alpha(opacity=76)");
	}	
};

YAHOO.extend(SUGAR.reports.reportDDProxy, YAHOO.util.DDProxy, {
    startDrag: function(x, y) {
		var Dom = YAHOO.util.Dom;
		var dragEl = this.getDragEl();
		var clickEl = this.getEl();
		
		dragEl.innerHTML = clickEl.innerHTML;
		
		Dom.addClass(dragEl, clickEl.className);
		Dom.setStyle(dragEl, "color", Dom.getStyle(clickEl, "color"));
		Dom.setStyle(dragEl, "height", Dom.getStyle(clickEl, "height"));
		Dom.setStyle(dragEl, "border", "");
		Dom.setStyle(dragEl, "opacity", 0.5);
		Dom.setStyle(dragEl, "z-index", 2000);
    },
    
	onDragOver: function(e, targetId) {
		var Dom = YAHOO.util.Dom;
        var target = Dom.get(targetId);
        this.lastTarget = target;
        //target.addClass('dd-over');
	    var dragEl = this.getDragEl();
	    var el = this.getEl();
	    if(this.lastTarget && this.lastTarget.id!= 'displayColsTable' && this.lastTarget.id!= 'displaySummariesTable'
	    	&& this.lastTarget.id!= 'groupByTable') {	        
	        var destElem = document.getElementById(this.lastTarget.id);
			var midEl = YAHOO.util.Dom.getY(el) + (el.clientHeight / 2);	    
			var dragPosition = YAHOO.util.Dom.getY(dragEl);
			var insertafter = false;
			if (dragPosition > midEl) {
	        	YAHOO.util.Dom.insertAfter(el, destElem);
	        	insertafter = true;
			} else {
	        	YAHOO.util.Dom.insertBefore(el, destElem);
			}
	        //Dom.setStyle(el, "position", "");
	        //Dom.setStyle(el, "width", '');
	        //If we move a groupBy row, we need to move the corresponding display summary row as well.
	        if (el.id.substring(0,12) == 'group_by_row') {
		        var destElem = document.getElementById('display_summaries_row_' + this.lastTarget.id);
		        if (insertafter) {
		        	YAHOO.util.Dom.insertAfter(document.getElementById('display_summaries_row_' +el.id), destElem);
		        } else {
		        	YAHOO.util.Dom.insertBefore(document.getElementById('display_summaries_row_' +el.id), destElem);
		        }
	        }
	    }
	},
	onDragOut: function(e, targetId) {
        //var target = Ext.get(targetId);
        this.lastTarget = null;
        //target.removeClass('dd-over');
	},    
	endDrag: function() {
		var Dom = YAHOO.util.Dom;											
	    var dragEl = this.getDragEl();
	    var el = this.getEl();
	    /*
	    if(this.lastTarget && this.lastTarget.id!= 'displayColsTable' && this.lastTarget.id!= 'displaySummariesTable'
	    	&& this.lastTarget.id!= 'groupByTable') {	        
	        var destElem = document.getElementById(this.lastTarget.id);
			var dragPosition = YAHOO.util.Dom.getY(dragEl);
			var midEl = YAHOO.util.Dom.getY(el) + (el.clientHeight / 2);	    
			if (dragPosition > midEl) {
	        	destElem.parentNode.insertBefore(el.nextSibling, destElem);
			} else {
	        	destElem.parentNode.insertBefore(el, destElem);
			}
	        //destElem.parentNode.insertBefore(document.getElementById(el.id), destElem);
	        //Dom.setStyle(el, "position", "");
	        //Dom.setStyle(el, "width", '');
	        //If we move a groupBy row, we need to move the corresponding display summary row as well.
	        if (el.id.substring(0,12) == 'group_by_row') {
		        var destElem = document.getElementById('display_summaries_row_' + this.lastTarget.id);
		        destElem.parentNode.insertBefore(document.getElementById('display_summaries_row_' +el.id), destElem);
	        } // if

	    } // if
	    */
	} // fn
	
    
	
});
