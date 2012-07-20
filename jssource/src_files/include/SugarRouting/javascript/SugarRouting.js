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

/*
if(!SUGAR) {
	SUGAR = new Object();
}

// lazy-load YUI XHR lib
if(!YAHOO.util.Connect) {
	var script = document.createElement('script');
	script.type = 'text/javascript';
	script.src = 'include/javascript/yui/connection.js';
	document.getElementsByTagName('head')[0].appendChild(script);
}
*/



/**
 * Core SugarRouting UI and XHR class
 */

SUGAR.routing = {
	actions : new Object(),
	rules : new Object(),
	strings : new Object(),
	
	/**
	 * Retrieves a saved rule and displays it
	 */
	editRule : function(id) {
		this.xhr.startRequest(callback.editRule, this.xhr.urlStandard + "&routingAction=getRule&rule_id=" + id + "&bean=InboundEmail");
	},
	
	/**
	 * Deletes a rule from a user's saved prefs
	 */
	removeRule : function(id) {
		alert('implement SUGAR.routing.removeRule() pls.');
	},
	
	/**
	 * retrieves relevant strings for this lib
	 */
	getStrings : function() {
		this.xhr.startRequest(callback.strings, this.xhr.urlStandard + "&routingAction=getStrings");
	},
	
	/**
	 * Retrieves dependent dropdowns relevant to the module in view
	 */
	getDependentDropdowns : function() {
		this.xhr.startRequest(callback.dd, this.xhr.urlStandard + "&routingAction=getActions");
	}
}

SUGAR.routing.handleDependentDropdown = function(el, focusDD) {
	if(SUGAR.dependentDropdown.debugMode) SUGAR.dependentDropdown.utils.debugStack('handleDependentDropdown');
	
	/*
	 * el.id example:
	 * "criteriaGroup::0:::0:-:crit0id"
	 * [grouping from metadata]::[index]:::[elementIndex]:-:[assignedID from metadata]
	 * index is row-number
	 * elementIndex is the index of the current element in this row
	 */
	var index = el.id.slice(el.id.indexOf("::") + 2, el.id.indexOf(":::"));
	var actionIndex = index / 100;
//	var elementRow = el.boxObject.parentBox;
	var elementRow = el.parentNode;
	var elementIndex = el.id.slice(el.id.indexOf(":::") + 3, el.id.indexOf(":-:"));

	// set currentAction to keep track of which criteria/action we're dealing with BEFORE incrementing elementIndex.
	SUGAR.dependentDropdown.currentAction = SUGAR.routing.rules.InboundEmail[SUGAR.routing.currentRuleId][focusDD][actionIndex];

	elementIndex++;
	var elementKey = "element" + elementIndex;
	var focusElement = SUGAR.dependentDropdown.dropdowns[focusDD].elements[elementKey];

	
	if(focusElement) {
		if(focusElement.handlers) {
			try {
				focusElement = focusElement.handlers[el.value];
			} catch(e) {
				if(SUGAR.dependentDropdown.dropdowns.debugMode) {
					debugger;
				}
			}
		}
		SUGAR.dependentDropdown.generateElement(focusElement, elementRow, index, elementIndex);
	} else {
	}
}

SUGAR.routing.utils = {
	/**
	 * Removes all child nodes from the passed DOM element
	 */
	removeChildren : function(el) {
		for(i=el.childNodes.length - 1; i >= 0; i--) {
			if(el.childNodes[i]) {
				el.removeChild(el.childNodes[i]);
			}
		}
	}
}
/**
 * XMLHTTPRequest Object Implementation for SugarRouting
 */
SUGAR.routing.xhr = {
	currentRequestObject : null,
	timeout : 30000, // 30 second timeout default
	forceAbort : false,
	trail : new Array(),
	urlStandard : 'sugar_body_only=true&to_pdf=true&module=Emails&action=SugarRoutingAsync',
	/**
	 */
	_reset : function() {
		this.timeout = 30000;
		this.forceAbort = false;
	},

	// makes the XHRequest
	startRequest : function(callback, args, forceAbort) {
		if(this.currentRequestObject != null) {
			if(this.forceAbort == true) {
				YAHOO.util.Connect.abort(this.currentRequestObject, null, false);
			}
		}
		this.currentRequestObject = YAHOO.util.Connect.asyncRequest('POST', "./index.php", callback, args);
		this._reset();
	},

	/**
	 */
    handleFailure : function(o) {
		// Failure handler
		SUGAR.showMessageBox('Exception occurred...', o.statusText);
		debugger;
		//document.getElementById(this.target).innerHTML = o.statusText;
	},

	/**
	 * Sets this lib's strings
	 */
	fillStrings : function(o) {
		var ret = YAHOO.lang.JSON.parse(o.responseText);
		SUGAR.routing.strings = ret.strings;
		SUGAR.routing.matchDom = ret.matchDom;
		SUGAR.routing.matchTypeDom = ret.matchTypeDom;
		SUGAR.routing.actions = ret.actions;
	},

	/**
	 * Displays a fetched rule, applying user's saved values overlayed on a series of dependent dropdowns
	 */
	displayFetchedRule : function(o) {
		var ret = YAHOO.lang.JSON.parse(o.responseText);
		
		SUGAR.routing.ui.displayRule(ret);
	},
	
	/**
	 * Lazy-loader for dependent dropdown key/value pairs
	 */
	fillDependentDropdowns : function(o) {
		var ret = YAHOO.lang.JSON.parse(o.responseText);
		SUGAR.dependentDropdown.dropdowns = ret;
	},

	/**
	 * Makes an async call to save rule values
	 */
	saveRule : function(formId) {
		if(SUGAR.routing.ui.checkRule(formId)) {
			SUGAR.showMessageBox(SUGAR.routing.strings.LBL_ROUTING_SAVING_RULE, SUGAR.routing.strings.LBL_ROUTING_ONE_MOMENT);
			var values = YAHOO.util.Connect.setForm(document.getElementById(formId));
			this.startRequest(callback.saveRule, SUGAR.routing.urlStandard);
		}
	},
	
	/**
	 * Makes the call to delete a rule
	 */
	deleteRule : function(rule_id) {
		this.startRequest(callback.saveRule, this.urlStandard + "&routingAction=deleteRule&rule_id=" + rule_id);
	},
	
	/**
	 * Async call to get specifically available email_templates
	 */
	getComposeCache : function() {
		this.startRequest(callback.fillComposeCache, 'sugar_body_only=true&to_pdf=true&module=Emails&action=EmailUIAjax&emailUIAction=fillComposeCache');
	},
	
	/**
	 * takes response and fills in local variables for email templates
	 */
	fillComposeCache : function(o) {
		var ret = YAHOO.lang.JSON.parse(o.responseText);
		
		SUGAR.email2.composeLayout.emailTemplates = ret.emailTemplates;
		SUGAR.email2.composeLayout.signatures = ret.signatures;
		
		return SUGAR.email2.composeLayout.emailTemplates;
	},
	
	setRuleStatusCleanup : function(o) {
		// stub for future functionality
	}
}


SUGAR.routing.ui = {
	/**
	 * Makes async call to delete a rule
	 */
	deleteRule : function(rule_id) {
		if(confirm(SUGAR.routing.strings.LBL_ROUTING_CONFIRM_DELETE)) {
			SUGAR.routing.xhr.deleteRule(rule_id);
		}
	},
	
	/**
	 * Constructs the Rules form for 1 rule
	 */
	displayRule : function(ret) {
		if(!SUGAR.routing.rules[ret.bean]) {
			SUGAR.routing.rules[ret.bean] = new Object();
		}
		
		if(!SUGAR.routing.rules[ret.bean][ret.rule.id]) {
			SUGAR.routing.rules[ret.bean][ret.rule.id] = new Object();
		}
		
		// rule now cached
		SUGAR.routing.rules[ret.bean][ret.rule.id] = ret.rule;
		
		SUGAR.routing.currentRuleId = ret.rule.id;
	
		var d = document.getElementById("rulesDetailsCell");
		
		SUGAR.routing.utils.removeChildren(d);
		
		d.style.padding = '5px';
		
		// overall form
		YAHOO.ext.DomHelper.append(d, {
			tag:'form',
			name:'routingForm' + ret.rule.id,
			id:'routingRule' + ret.rule.id,
			method: 'post'
		});
		var form = document.getElementById('routingRule' + ret.rule.id);
		// bean field
		YAHOO.ext.DomHelper.append(form, {
			tag : 'input',
			type : 'hidden',
			name : 'bean',
			value : ret.bean
		});
		// sugar_body_only field
		YAHOO.ext.DomHelper.append(form, {
			tag : 'input',
			type : 'hidden',
			name : 'sugar_body_only',
			value : 'true'
		});
		// to_pdf field
		YAHOO.ext.DomHelper.append(form, {
			tag : 'input',
			type : 'hidden',
			name : 'to_pdf',
			value : 'true'
		});
		// module field
		YAHOO.ext.DomHelper.append(form, {
			tag : 'input',
			type : 'hidden',
			name : 'module',
			value : 'Emails'
		});
		// action field
		YAHOO.ext.DomHelper.append(form, {
			tag : 'input',
			type : 'hidden',
			name : 'action',
			value : 'SugarRoutingAsync'
		});
		// routingAction field
		YAHOO.ext.DomHelper.append(form, {
			tag : 'input',
			type : 'hidden',
			name : 'routingAction',
			value : 'saveRule'
		});
		// hidden ID field
		YAHOO.ext.DomHelper.append(form, {
			tag : 'input',
			type : 'hidden',
			name : 'id',
			value : ret.rule.id
		});
		
		// buttons
		var save = "SUGAR.routing.xhr.saveRule('" + "routingRule" + ret.rule.id + "');";
		YAHOO.ext.DomHelper.append(form, {
			tag : 'input',
			type : 'button',
			cls : 'button',
			onclick : save,
			value : "   " + SUGAR.routing.strings.LBL_ROUTING_BUTTON_SAVE + "   "
		});
		form.innerHTML += "&nbsp;";
		YAHOO.ext.DomHelper.append(form, {
			tag : 'input',
			type : 'button',
			cls : 'button',
			onclick : 'SUGAR.routing.ui.cancelRule();',
			value : "   " + SUGAR.routing.strings.LBL_ROUTING_BUTTON_CANCEL + "   "
		});
		form.innerHTML += "<br />&nbsp;<br />";
		
		// name div
		var tmp = YAHOO.ext.DomHelper.append(form, {
			tag : 'div',
			cls : 'routingInputField',
			html : SUGAR.routing.strings.LBL_ROUTING_NAME + ": &nbsp;"
		}, true);
		var nameDiv = tmp.dom;
		
		// name field
		YAHOO.ext.DomHelper.append(nameDiv, {
			tag:'input',
			type:'text',
			name:'name',
			id : 'ruleName',
			value:ret.rule.name,
			size:'32',
			cls: 'input'
		});
		// br
		YAHOO.ext.DomHelper.append(form, {
			tag:"br"
		});
		// match type div
		var tmp = YAHOO.ext.DomHelper.append(form, {
			tag:'div',
			cls:'routingInputField'
		},true);
		var matchDiv = tmp.dom;
		// match text
		matchDiv.innerHTML += SUGAR.routing.strings.LBL_ROUTING_MATCH + "&nbsp;";
		// match dd
		var tmp = YAHOO.ext.DomHelper.append(matchDiv, {
			tag:'select',
			name:'all',
			cls: 'select'
		}, true);
		var matchDropDown = tmp.dom;
		// match options
		matchDropDown.options[0] = new Option(SUGAR.routing.strings.LBL_ROUTING_ANY, 0);
		matchDropDown.options[1] = new Option(SUGAR.routing.strings.LBL_ROUTING_ALL, 1, ret.rule.all);
		// match text
		matchDiv.innerHTML += "&nbsp;" + SUGAR.routing.strings.LBL_ROUTING_MATCH_2 + "&nbsp;";
		// br
		YAHOO.ext.DomHelper.append(form, {
			tag:"br"
		});
		
		
		// rule criteria
		var tmp = YAHOO.ext.DomHelper.append(form, {
			tag:'div',
			id:'routingCriteria'
		}, true);
		
		for(var i=0; i<ret.rule.criteria.length; i++) {
			var index = i * 100;
			SUGAR.routing.ui.generateRuleCondition(tmp.dom, ret.rule.criteria[i], index);
		}
		
		// actions
		form.innerHTML += "<br />";
		var tmp = YAHOO.ext.DomHelper.append(form, {
			tag : 'div',
			style : 'padding-top:10px;'
		}, true);
		var actionDiv = tmp.dom;
		
		actionDiv.innerHTML += SUGAR.routing.strings.LBL_ROUTING_ACTIONS_PEFORM + ":<br />&nbsp;<br />";
		
		for(var i=0; i<ret.rule.actions.length; i++) {
			var index = i * 100;
			SUGAR.routing.ui.generateRuleAction(actionDiv, ret.rule.actions[i], index);
		}
	},

	/**
	 * Lazy-loads values in an associative array for SugarDependentDropdowns
	 * @param string type
	 */
	getElementValues : function(type) {
		switch(type) {
			case "move_mail":
				// not lazy-loading to prevent having to refresh to apply changes to Remote server connctions & folders
				return SUGAR.email2.folders.getAvailableFoldersObject();
			break;
			
			case "email_templates":
				if(!SUGAR.email2.composeLayout.emailTemplates) {
					SUGAR.routing.xhr.getComposeCache();
					
					setTimeout("SUGAR.routing.ui.getElementValues('email_templates');", 2000);
				} else {
					return SUGAR.email2.composeLayout.emailTemplates;
				}
			break;
		}
	},

	/**
	 * appends a series of dependent drop-downs and related fields for a rule's action
	 * @param HTMLElementObject
	 * @param Object criteria in associative array
	 * @param int
	 */
	generateRuleAction : function(container, criteria, index) {
		this.generateRuleRow(container, criteria, index, 'Action');
	},


	/**
	 * appends a series of dependent drop-downs to the passed form element reference
	 * @param HTMLElementObject
	 * @param Object criteria in associative array
	 * @param int
	 */
	generateRuleCondition : function(container, criteria, index) {
		this.generateRuleRow(container, criteria, index, 'Rule');
	},
	
	/**
	 * Generates a rule row (action or criteria)
	 */
	generateRuleRow : function(container, criteria, index, type) {
		var elementIndex = 0;
		var theme = 'Sugar';
		
		/* decide whether to append to the row container or before the next */
		if(container.id.match(/Row/i)) {
			/* inserting criteria b/t rows */
			var tmp = YAHOO.ext.DomHelper.insertAfter(container, {
				tag : 'div',
				cls : 'routing' + type,
				style : 'padding:2px;',
				id : 'routing' + type + 'Row' + index
			}, true);
		} else {
			/* standard code-path */
			var tmp = YAHOO.ext.DomHelper.append(container, {
				tag : 'div',
				cls : 'routing' + type,
				style : 'padding:2px;',
				id : 'routing' + type + 'Row' + index
			}, true);
		}
		var ruleRow = tmp.dom;

		// remove & add icons
		var remove = "javascript:SUGAR.routing.ui.removeCriteria('routing" + type + "Row" + index + "');";
		var minus = YAHOO.ext.DomHelper.append(ruleRow, {
			tag : 'a',
			href : remove
		}, true);
		YAHOO.ext.DomHelper.append(minus.dom, {
			tag : 'img',
			src : 'index.php?entryPoint=getImage&themeName='+SUGAR.themes.theme_name+'&imageName=minus.gif',
			border : 0,
			cls : 'img'
		}, false);
		
		ruleRow.innerHTML += "&nbsp;";
		var insert = "javascript:SUGAR.routing.ui.insertCriteria('routing" + type + "Row" + index + "');";
		var plus = YAHOO.ext.DomHelper.append(ruleRow, {
			tag : 'a',
			href : insert
		}, true);
		YAHOO.ext.DomHelper.append(plus.dom, {
			tag : 'img',
			src : 'index.php?entryPoint=getImage&themeName='+SUGAR.themes.theme_name+'&imageName=plus.gif',
			border : 0,
			cls : 'img'
		}, false);
		ruleRow.innerHTML += "&nbsp;";
		
		// generate rule row from metadata
		SUGAR.dependentDropdown.currentAction = criteria;

		var ddType = (type == 'Rule') ? 'criteria' : 'actions' ;
		
		for(var elementKey in SUGAR.dependentDropdown.dropdowns[ddType].elements) {
			var focusElement = SUGAR.dependentDropdown.dropdowns[ddType].elements[elementKey];
			
			// generate actions for actionRow		
			SUGAR.dependentDropdown.generateElement(focusElement, ruleRow, index, elementIndex);
			
			if(!focusElement.force_render || focusElement.force_render == '') {
				// continue rendering next elemetn
				return;
			} else {
				elementIndex++;
			}
		}
	},
	
	/**
	 * Inserts a row in either the criteria or actions groups
	 * @param string clickElement ID of clicked "+" sign
	 */
	insertCriteria : function(clickElement) {
		var row = document.getElementById(clickElement);
		var focusRowIndex = parseFloat(clickElement.substr(clickElement.search(/\d/)));
			
		if(row.nextSibling) {
			var nextRow = row.nextSibling;
	
			var nextRowIndex = parseFloat(nextRow.id.substr(nextRow.id.search(/\d/)));
			//var insertIndex = Math.floor(((nextRowIndex - focusRowIndex) / 2) + focusRowIndex);
			var insertIndex = ((nextRowIndex - focusRowIndex) / 2) + focusRowIndex;
		} else {
			var insertIndex = focusRowIndex + 100;
		}
		
		if(row.id.match(/Action/)) {
			this.generateRuleAction(row, {}, insertIndex);
		} else {
			this.generateRuleCondition(row, {}, insertIndex);
		}
	},
	
	/**
	 * cancels editing a rule (new or saved)
	 */
	cancelRule : function() {
		SUGAR.routing.utils.removeChildren(document.getElementById("rulesDetailsCell"));
	},
	
	/**
	 * generates a blank rule when adding a new one
	 */
	addRule : function() {
		ret = {
			bean : 'InboundEmail',
			rule : {
				id : '',
				name : '',
				criteria : [
					{
						action : {
							'crit0' : 'name',
							'crit1' : 'match',
							'crit2' : ''
						}
					}
				],
				actions : [
					{
						action : {
							'action0' : 'move_mail',
							'action1' : ''
						}
					}
				]
			}
		};
		SUGAR.routing.ui.displayRule(ret);
	},

	/**
	 * Visually removes a criteria row from the Rules Wizard
	 */
	removeCriteria : function(id) {
		var bucket = document.getElementById(id);
		SUGAR.routing.utils.removeChildren(bucket);
		
		bucket.parentNode.removeChild(bucket);
	},

	/**
	 * Starts async call to en/disable a rule.
	 * @param HTMLInputElement Checkbox that was just clicked
	 */
	setRuleStatus : function(cb) {
		var status = (cb.checked) ? 'enable' : 'disable';
		var id = cb.value;
		
		SUGAR.routing.xhr.startRequest(callback.setRuleStatus, SUGAR.routing.xhr.urlStandard + "&routingAction=setRuleStatus&rule_id=" + id + "&status=" + status);
	}
}


/**
 * Verifies that valid information is provided when saving a routing rule
 */
SUGAR.routing.ui.checkRule = function(formId) {
	// empty errors cache
	SUGAR.routing.ui.errors = new Array();
	
	var ret = true;
	var form = document.getElementById(formId);
	var el = null;
	var v = null;
	
	for(var i=0; i<form.elements.length; i++) {
		el = form.elements[i];
		
		if(el.type != 'hidden' && el.type != 'button') {
			// input fields
			if(el.type == 'text') {
				if(el.value == "") {
					SUGAR.routing.ui.errors.push(el.id);
					ret = false;
				}
			} else if(el.type == 'select' || el.type == 'select-one') {
				var v = el.options[el.selectedIndex].value;
				if(v == '-1' || v == '-2' || v == '_break' || v.match(/spacer/ig)) {
					SUGAR.routing.ui.errors.push(el.id);
					ret = false;
				}
			}

			if(el.style.border && (el.style.border == '1px solid rgb(255, 0, 0)' || el.style.border == '#f00 1px solid')) {
				el.style.border = '1px solid #090';
				el.className = 'input';
			}
		}
	}
	
	if(!ret) {
		SUGAR.showMessageBox(SUGAR.routing.strings.LBL_ROUTING_CHECK_RULE, SUGAR.routing.strings.LBL_ROUTING_CHECK_RULE_DESC);

		for(var j=0; j<SUGAR.routing.ui.errors.length; j++) {
			var focusEl = document.getElementById(SUGAR.routing.ui.errors[j]);
			if(focusEl)
				focusEl.style.border = "1px solid #f00";
		}
	}
	
	return ret;
}


//////////////////////////////////////////////////////////////////////////////
////	CALLBACK OBJECTS
callback = {
	failure : SUGAR.routing.xhr.handleFailure,
	timeout : SUGAR.routing.xhr.timeout,
	scope	: SUGAR.routing.xhr,
	
	// define callbacks below
	editRule : {
		success : SUGAR.routing.xhr.displayFetchedRule,
		failure : this.failure,
		timeout : this.timeout,
		scope : this.scope
	},
	strings : {
		success : SUGAR.routing.xhr.fillStrings,
		failure : this.failure,
		timeout : this.timeout,
		scope : this.scope
	},
	example : {
		success : SUGAR.routing.xhr.handleSuccess,
		failure : this.failure,
		timeout : this.timeout,
		scope : this.scope
	},
	dd : {
		success : SUGAR.routing.xhr.fillDependentDropdowns,
		failure : this.failure,
		timeout : this.timeout,
		scope : this.scope
	},
	saveRule : {
		success : function() {
			SUGAR.hideMessageBox();
			SUGAR.routing.ui.cancelRule(); // hide rule form
			AjaxObject.startRequest(callbackLoadRules, urlStandard + "&emailUIAction=loadRulesForSettings");
		},
		failure : this.failure,
		timeout : this.timeout,
		scope : this.scope
	},
	fillComposeCache : {
		success : SUGAR.routing.xhr.fillComposeCache,
		failure : this.failure,
		timeout : this.timeout,
		scope : this.scope
	},
	setRuleStatus : {
		success : SUGAR.routing.xhr.setRuleStatusCleanup,
		failure : this.failure,
		timeout : this.timeout,
		scope : this.scope
	}
}
