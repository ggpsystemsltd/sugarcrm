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


max_default_columns = 6;

 Studio2.ListDD = function(el, sGroup, fromOnly) {
 	if (typeof el == 'number') {
 		el = el + "";
	}
 	if (typeof el == 'string')
 		el = document.getElementById(el);
	if (el != null) {
		var Dom = YAHOO.util.Dom;
		Studio2.ListDD.superclass.constructor.call(this, el, sGroup);
		this.addInvalidHandleType("input");
		this.addInvalidHandleType("a");
		var dEl = this.getDragEl()
		Dom.setStyle(dEl, "borderColor", "#FF0000");
		Dom.setStyle(dEl, "backgroundColor", "#e5e5e5");
		Dom.setStyle(dEl, "opacity", 0.76);
		Dom.setStyle(dEl, "filter", "alpha(opacity=76)");
		this.fromOnly = fromOnly;
	}
};

YAHOO.extend(Studio2.ListDD, YAHOO.util.DDProxy, {
	copyStyles : {'opacity':"", 'border':"", 'height':"", 'filter':"", 'zoom':""},
    startDrag: function(x, y){
		//We need to make sure no inline editors are in use, as drag.drop can break them
		if (typeof (SimpleList) != "undefined") {
			SimpleList.endCurrentDropDownEdit();
		}
		
		var Dom = YAHOO.util.Dom;
		var dragEl = this.getDragEl();
		var clickEl = this.getEl();
		
		this.parentID = clickEl.parentNode.id;
		this.clickContent = clickEl.innerHTML;
		dragEl.innerHTML = clickEl.innerHTML;
		
		Dom.addClass(dragEl, clickEl.className);
		Dom.setStyle(dragEl, "color", Dom.getStyle(clickEl, "color"));
		Dom.setStyle(dragEl, "height", Dom.getStyle(clickEl, "height"));
		Dom.setStyle(dragEl, "border", "1px solid #aaa");
		
		// save the style of the object 
		if (this.clickStyle == null) {
			this.clickStyle = {};
			for (var s in this.copyStyles) {
				this.clickStyle[s] = clickEl.style[s];
			}
			if (typeof(this.clickStyle['border']) == 'undefined' || this.clickStyle['border'] == "") 
				this.clickStyle['border'] = "1px solid";
		}
		
		Dom.setStyle(clickEl, "opacity", 0.5);
		Dom.setStyle(clickEl, "filter", "alpha(opacity=10)");
		Dom.setStyle(clickEl, "border", '2px dashed #cccccc');
        Studio2.setScrollObj(this);
	},
	
	updateTabs: function(){
		studiotabs.moduleTabs = [];
		for (j = 0; j < studiotabs.slotCount; j++) {
		
			var ul = document.getElementById('ul' + j);
			studiotabs.moduleTabs[j] = [];
			items = ul.getElementsByTagName("li");
			for (i = 0; i < items.length; i++) {
				if (items.length == 1) {
					items[i].innerHTML = SUGAR.language.get('ModuleBuilder', 'LBL_DROP_HERE');
				}
				else if (items[i].innerHTML == SUGAR.language.get('ModuleBuilder', 'LBL_DROP_HERE')) {
					items[i].innerHTML = '';
				}
				studiotabs.moduleTabs[ul.id.substr(2, ul.id.length)][studiotabs.subtabModules[items[i].id]] = true;
			}	
		}	
	},
	
	endDrag: function(e){
        Studio2.clearScrollObj();
		ModuleBuilder.state.isDirty=true;
		var clickEl = this.getEl();
		var clickExEl = new YAHOO.util.Element(clickEl);
		dragEl = this.getDragEl();
		dragEl.innerHTML = "";
		clickEl.innerHTML = this.clickContent;
		
		var p = clickEl.parentNode;
		if (p.id == 'trash') {
			p.removeChild(clickEl);
			this.lastNode = false;
			this.updateTabs();
			return;
		}
		
		for(var style in this.clickStyle) {
			if (typeof(this.clickStyle[style]) != 'undefined')
				clickExEl.setStyle(style, this.clickStyle[style]);
			else
				clickExEl.setStyle(style, '');
		}
		
		this.clickStyle = null;
		
		if (this.lastNode) {
			this.lastNode.id = 'addLS' + addListStudioCount;
			studiotabs.subtabModules[this.lastNode.id] = this.lastNode.module;
			yahooSlots[this.lastNode.id] = new Studio2.ListDD(this.lastNode.id, 'subTabs', false);
			addListStudioCount++;
			this.lastNode.style.opacity = 1;
			this.lastNode.style.filter = "alpha(opacity=100)";
		}
		this.lastNode = false;
		this.updateTabs();
		
		dragEl.innerHTML = "";
	},

    onDrag: Studio2.onDrag,
    
	onDragOver: function(e, id){
		var el = document.getElementById(id);
		/**
		 * Start:	Bug_#44445 
		 * Limit number of columns in dashlets on 6!
		 */
		var parent = el.parentNode.parentNode
		if(studiotabs.view == 'dashlet'){
			if(parent.id == 'Default'){
				var cols = el.parentNode.getElementsByTagName("li");
				if(cols.length > max_default_columns){
					/**
					 * Alert could be added but it will apear everytime when moving item over Defaults.
					 * Even when trying to change schedule of components inside of tab.
					 * alert('Maximum ' + max_default_columns + ' columns are allowed in Defaults tab!');
					 */
					return;
				}	
			}	
		}
		/**
		 * End:	Bug_#44445
		 */
		if (this.lastNode) {
			this.lastNode.parentNode.removeChild(this.lastNode);
			this.lastNode = false;
		}
		if (id.substr(0, 7) == 'modSlot') {
			return;
		}
		el = document.getElementById(id);
		dragEl = this.getDragEl();
		
		var mid = YAHOO.util.Dom.getY(el) + (el.clientHeight / 2);
		var el2 = this.getEl();
		var p = el.parentNode;
		if ((this.fromOnly || (el.id != 'trashcan' && el2.parentNode.id != p.id && el2.parentNode.id == this.parentID))) {
			if (typeof(studiotabs.moduleTabs[p.id.substr(2, p.id.length)][studiotabs.subtabModules[el2.id]]) != 'undefined') 
				return;
		}
		
		if (this.fromOnly && el.id != 'trashcan') {
			el2 = el2.cloneNode(true);
			el2.module = studiotabs.subtabModules[el2.id];
			el2.id = 'addListStudio' + addListStudioCount;
			this.lastNode = el2;
			this.lastNode.clickContent = el2.clickContent;
			this.lastNode.clickBorder = el2.clickBorder;
			this.lastNode.clickHeight = el2.clickHeight
		}
		
		if (YAHOO.util.Dom.getY(dragEl) < mid) { // insert on top triggering item
			p.insertBefore(el2, el);
		}
		else { // insert below triggered item
			p.insertBefore(el2, el.nextSibling);
		}
	}
});