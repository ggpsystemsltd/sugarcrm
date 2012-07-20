


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

 
SUGAR.FiltersWidget = function() {
	var imgPath;

	//var operators = new Array('AND','OR');
	var operators = [['AND','ANY'],['OR','ALL']];
	var default_operator = operators[0];
	var toolbar = '';
	//var children = new Array();
	
	var panels = new Array();
	var childHighestIndex = new Array();

	return {
		init: function(img_path) {
			imgPath = img_path;
		//	id = name;
		},
		getPanels: function() {
			return panels;
		},
		
		getAllChildrenPanels:function(panelId, childrenPanelsArray) {
			for (var i = 0; i < panels.length; i++) {
				if (panels[i].parentId == panelId) {
					childrenPanelsArray.push(panels[i].id);
					SUGAR.FiltersWidget.getAllChildrenPanels(panels[i].id, childrenPanelsArray);
				}
			}			
		},
		
		removeGroupForEvent: function(obj) {
			SUGAR.FiltersWidget.removeGroup(obj.id, obj.renderToId);
		},
		
		removeGroup: function(panelId, parentId){
			//parentId = parentId.replace(/_body_div/, "");
			//Perform cleanup.
			var index = -1;
			var children;
			for (var i = 0; i < panels.length; i++) {
				if (panels[i].id == panelId) {
					index = i;
					break;
				}
			}
			if (index != -1) {
				panels.splice(index, 1);
			}
			//The top-level panel has been removed
			if (parentId == SUGAR.language.get('Reports','LBL_FILTER'))
				childHighestIndex[parentId] = 0;
			
			//Delete all children
			//todo: VERY expensive operation.
			/*
			var childrenPanelsArray = new Array();
			SUGAR.FiltersWidget.getAllChildrenPanels(panelId, childrenPanelsArray);

			var indexes = new Array();
			for (var i = 0; i < childrenPanelsArray.length; i++) {
				for (var j = 0; j < panels.length; j++) {
					if (panels[j].id == childrenPanelsArray[i]) {
						panels[j] = new Object();
					}
				} 
			}
			*/
			//Remove the Panel from the UI
			var panelElem = new YAHOO.widget.Module(panelId);
			panelElem.destroy();
		},
		
		addPanel: function(id, parentId, panelId, comboValue) {
		    var panelElem = new Object();
		    panelElem.id = id;
		    panelElem.parentId = parentId;
		    if (typeof(comboValue) != "undefined") {
				if (comboValue == 'AND')
					panelElem.operator = 'AND'
				else
					panelElem.operator = 'OR'
			}
		    else
			    panelElem.operator = "AND";
		    
		    panelElem.children = new Array();
		    panels.push(panelElem);
		    
		    for (var i = 0; i < panels; i++) {
		    	if (panel[i].id = parentId) {
		    		panel[i].children.push(panelId);
		    	}
		    }

		    SUGAR.FiltersWidget.display(panelId, id, comboValue);	    	
		},
		addGroupPanelForEvent : function(obj) {
			SUGAR.FiltersWidget.addGroupToPanel(obj.id, obj.renderToId);
		},
		addGroupToPanel: function(panelId, parentId, comboValue){
		    var id = "";
		    if (!childHighestIndex[parentId]) {
			   //children[parentId] = new Array();
				childHighestIndex[parentId] = 1;
				id = parentId + ".1";  
		    }
		    else {
				childHighestIndex[parentId]++;
				id = parentId + "." + childHighestIndex[parentId];  
		    }
		    if (parentId == SUGAR.language.get('Reports','LBL_FILTER') + ".1"){
				var table = document.getElementById(parentId + "_table");
				
				if (document.getElementById('inlineFiltersHelpTable')) 
					document.getElementById(SUGAR.language.get('Reports','LBL_FILTER') + ".1_body_div").innerHTML = "";
				
				if (table.rows.length > 0) {
					SUGAR.FiltersWidget.addPanel(id, parentId, panelId, comboValue);
					var newTable = 	document.getElementById(id + "_table");							
					// Increment ID.				
				    if (!childHighestIndex[parentId]) {
					   //children[parentId] = new Array();
						childHighestIndex[parentId] = 1;
						id = parentId + ".1";  
				    }
				    else {
						childHighestIndex[parentId]++;
						id = parentId + "." + childHighestIndex[parentId];  
				    }				
				}
				
				while(table.rows.length > 0){
					var filterDef = SUGAR.reports.saveFilter(table.rows[0]);
					SUGAR.reports.copyFilter(table.rows[0].getAttribute('id'), table.rows[0], newTable.getAttribute('id'), filterDef);
					var deleteFuncStr = table.rows[0].lastChild.innerHTML.split('src')[0].split('=')[1].substring(1);
					var deleteFuncStrLen = deleteFuncStr.length;
					var deleteFuncStr = deleteFuncStr.substring(0,deleteFuncStrLen - 1);
					var deleteParamsArr = table.rows[0].lastChild.innerHTML.split('src')[0].split('=')[1].substring(1,78).split('(')[1].split(",")
					SUGAR.reports.deleteFilter(deleteParamsArr[0],table.rows[0].getAttribute('id'),parentId + "_table");
				}			
		    }
			SUGAR.FiltersWidget.addPanel(id, parentId, panelId, comboValue);				
		},
		
		changeSelectElemetValue : function(id) {
			var panelId = id.replace(/_combo/,"");
			for (var i = 0; i < panels.length; i++) {
				if (panels[i].id == panelId) {
					var operator = document.getElementById(id);
					panels[i].operator = operator.options[operator.selectedIndex].value;
					break;
				} // if
			} // for
		},
		
		display: function(renderToId, id, comboValue) {
		    // add a combobox to the toolbar
		    var selectedANDString = "";
		    var selectedORString = "";
		    
			if (typeof(comboValue) != "undefined") {
				if (comboValue == 'AND') {
					selectedANDString = "selected";
				} else {
				    selectedORString = "selected";
				} // else
			} else {
				selectedANDString = "selected";
			}			
		    var selectHTML = "<select onchange=\"SUGAR.FiltersWidget.changeSelectElemetValue('" + id + "_combo" + "');\" id=\"" + id + "_combo" + "\"><option value='AND' " + selectedANDString + ">" + SUGAR.language.get('Reports','LBL_FILTER_AND') + "</option><option value='OR' " + selectedORString + ">" + SUGAR.language.get('Reports','LBL_FILTER_OR') + "</option></select>";
		    
		    var panelStartRow = "<div class='sugar-subpanel-header-row'><table cellspacing=\"0\"><tr>";
		    panelStartRow = panelStartRow + "<td nowrap>&nbsp;&nbsp;<label for='"+id + "_combo'>" + SUGAR.language.get('Reports','LBL_FILTER_CONDITIONS') + "</label>&nbsp;&nbsp;</td>";
		    panelStartRow = panelStartRow + "<td>" + selectHTML + "</td>";
		    panelStartRow = panelStartRow + "<td style=\"width: 100%\"></td>";
		    panelStartRow = panelStartRow + "<td>&nbsp;" + "</td>";
		    if (panels.length > 1) {
		    	var removeButtonHTML = "<input class=\"button\" type=\"button\" id=\"" + 'remove_btn_'+ id + "\" name=\"" + SUGAR.language.get('Reports','LBL_REMOVE_GROUP') + "\" value=\"" + SUGAR.language.get('Reports','LBL_REMOVE_GROUP') + "\"" + " onclick=\"SUGAR.FiltersWidget.removeGroupForEvent({'id' : '" + id + "', 'renderToId' : '" + renderToId + "'})\";" + " />";
		    	
		    	panelStartRow = panelStartRow + "<td nowrap>" + removeButtonHTML + "</td>";
		    	panelStartRow = panelStartRow + "<td>&nbsp;" + "</td>";
		    } // if
		    var addButtonHTML = "<input class=\"button\" type=\"button\" id=\"" + 'add_btn_'+id + "\" name=\"" + SUGAR.language.get('Reports','LBL_ADD_GROUP') + "\"value=\"" + SUGAR.language.get('Reports','LBL_ADD_GROUP') + "\"" + " onclick=\"SUGAR.FiltersWidget.addGroupPanelForEvent({'id' : '" + id + "_body_div', 'renderToId' : '" + id + "'})\";" + " />";
		    
		    panelStartRow = panelStartRow + "<td nowrap>" + addButtonHTML  + "</td>";
		    panelStartRow = panelStartRow + "</tr></table></div>";
			var panelHTML = panelStartRow + "<table width='100%'><tr><td>&nbsp;&nbsp;&nbsp;</td><td>" +
					"<table width='100%' id='" + id + "_table'></table>" +
					"</td></tr><tr><td>&nbsp;&nbsp;&nbsp;</td><td><div id='"+ id + "_body_div'></div></td></tr></table>";

			if (id == SUGAR.language.get('Reports','LBL_FILTER') + ".1") {
				panelHTML = panelStartRow + "<table width='100%'><tr><td>&nbsp;&nbsp;&nbsp;</td><td>" +
						"<table width='100%' id='" + id + "_table'></table>" +
						"</td></tr><tr><td>&nbsp;&nbsp;&nbsp;</td><td><div id='"+ id + "_body_div'><table width='70%' valign='center' class='button' id='inlineFiltersHelpTable'><tr><td>"+SUGAR.language.get('Reports','LBL_FILTERS_HELP_DESC')+"</td></tr></table></div></td></tr></table>";
				
			} // if
			var title = "";
			if (id == SUGAR.language.get('Reports','LBL_FILTER') + ".1") {
				title =  "<h3 class='spantitle'>" + SUGAR.language.get('Reports','LBL_DEFINE_FILTERS') + "<span id='"+id+"_help'><img src='index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=helpInline.gif' alt='"+SUGAR.language.get("Reports", "LBL_ALT_INFORMATION")+"'></span></h3>";
			} else {
				title =  "<h3 class='spantitle'>" + id + "</h3>";
			} // else
			
			var designerModule = new YAHOO.widget.Module(id, { visible: false });
			designerModule.setHeader(title);
			designerModule.setBody(panelHTML);
			designerModule.render(renderToId);
			designerModule.show();
			
			if (id == SUGAR.language.get('Reports','LBL_FILTER') + ".1") {
				var toolTip = new YAHOO.widget.Tooltip("tt1", {context:id+"_help",  
		                          						   	   text:SUGAR.language.get('Reports','LBL_FILTERS_HELP_DESC'),
															   constraintoviewport : true,
															   height : "430px",
															   width : "400px"
				});
				//toolTip.show();						
			}
			
		}
	};
}();

