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




if(typeof('console') == 'undefined'){
console = {
	log: function(message) {
	
	}
}
}

StudioTabGroup = function(){
	this.fields = {};
	this.lastEditTabGroupLabel = -1;
	this.widths = new Object;
};


StudioTabGroup.prototype.editTabGroupLabel = function (id, done){
	if(!done){
		if(this.lastEditTabGroupLabel != -1)editTabGroupLabel(this.lastEditTabGroupLabel, true);
		document.getElementById('tabname_'+id).style.display = 'none';
		document.getElementById('tablabel_'+id).style.display = '';
		document.getElementById('tabother_'+id).style.display = 'none';
		document.getElementById('tablabel_'+id).focus();
		this.lastEditTabGroupLabel = id;
		//Ext.dd.DragDropMgr.lock();
	}else{
		this.lastEditTabGroupLabel = -1;
		document.getElementById('tabname_'+id).innerHTML = escape(document.getElementById('tablabel_'+id).value);
		document.getElementById('tabname_'+id).style.display = '';
		document.getElementById('tablabel_'+id).style.display = 'none';
		document.getElementById('tabother_'+id).style.display = '';
		//Ext.dd.DragDropMgr.unlock();
	}
}

 StudioTabGroup.prototype.generateForm = function(formname){
		  	var form = document.getElementById(formname);
		  	for(j = 0; j < studiotabs.slotCount; j++){
				var ul = document.getElementById('ul' + j);
				items = ul.getElementsByTagName('li');
				for(i = 0; i < items.length; i++) {
				
				if(typeof(studiotabs.subtabModules[items[i].id]) != 'undefined'){
				
					var input = document.createElement('input');
					input.type='hidden'
					input.name= j + '_'+ i;
					input.value = studiotabs.tabLabelToValue[studiotabs.subtabModules[items[i].id]];
					form.appendChild(input);
				}
				}
		  }
		  };

 StudioTabGroup.prototype.generateGroupForm = function(formname){
		  	this.clearGroupForm(formname);
		  	var form = document.getElementById(formname);
		  	for(j = 0; j < studiotabs.slotCount; j++){
				var ul = document.getElementById('ul' + j);
				items = ul.getElementsByTagName('li');
				for(i = 0; i < items.length; i++) {
				if(typeof(studiotabs.subtabModules[items[i].id]) != 'undefined'){
					var input = document.createElement('input');
					input.type='hidden';
					input.name= 'group_'+ j + '[]';
					input.value = studiotabs.tabLabelToValue[studiotabs.subtabModules[items[i].id]];
					form.appendChild(input);
//					if(this.widths[items[i].id] != null) {
					var winput = document.createElement('input');
					winput.type='hidden';
					winput.name= input.value + 'width';
					winput.value = "width=" + document.getElementById(items[i].id+'width').innerHTML;
					form.appendChild(winput);
//					}
				}
				}
		  	}
		  };
		  
StudioTabGroup.prototype.clearGroupForm = function(formname){
		var form = document.getElementById(formname);
		for(j = 0; j < form.elements.length; j++){
			if (typeof(form.elements[j].name) != 'undefined' && String(form.elements[j].name).indexOf("group") > -1) {
				form.removeChild(form.elements[j]);
				j--;
			}
		}
};

StudioTabGroup.prototype.deleteTabGroup = function(id){
		if(document.getElementById('delete_' + id).value == 0){
			document.getElementById('ul' + id).style.display = 'none';
			document.getElementById('tabname_'+id).style.textDecoration = 'line-through'
			document.getElementById('delete_' + id).value = 1;
		}else{
			document.getElementById('ul' + id).style.display = '';
			document.getElementById('tabname_'+id).style.textDecoration = 'none'
			document.getElementById('delete_' + id).value = 0;
		}
	}	

StudioTabGroup.prototype.editField = function(elem, link) {
	if (this.widths[elem.id] != null) {
		ModuleBuilder.getContent(link + '&width=' + this.widths[elem.id]);
	}else{
		ModuleBuilder.getContent(link);
	}
}

StudioTabGroup.prototype.saveField = function(elemID, formname) {
	var elem = document.getElementById(elemID);
	var form = document.getElementById(formname);
	var inputs = form.getElementsByTagName("input");
	for (i = 0; i < inputs.length; i++) {
		if (inputs[i].name == "width") {
			this.widths[elemID] = inputs[i].value;
			var dispWidth = elem.getElementsByTagName("td")[3];
			dispWidth.innerHTML = "width:" + inputs[i].value;
		}
		if (inputs[i].name == "label") {
			var title = elem.getElementsByTagName("span")[0];
			title.innerHTML = inputs[i].value;
		}
	}
	ModuleBuilder.submitForm(formname);
	ajaxStatus.flashStatus('Field Saved', 1000);
}

StudioTabGroup.prototype.reset = function() {
	this.subtabCount = {};
	this.subtabModules = {};
	this.tabLabelToValue = {};
	this.widths = new Object;
}

var lastField = '';
			var lastRowCount = -1;
			var undoDeleteDropDown = function(transaction){
			    deleteDropDownValue(transaction['row'], document.getElementById(transaction['id']), false);
			}
			jstransaction.register('deleteDropDown', undoDeleteDropDown, undoDeleteDropDown);
			function deleteDropDownValue(rowCount, field, record){
			    if(record){
			        jstransaction.record('deleteDropDown',{'row':rowCount, 'id': field.id });
			    }
			    //We are deleting if the value is 0
			    if(field.value == '0'){
			        field.value = '1';
			        document.getElementById('slot' + rowCount + '_value').style.textDecoration = 'line-through';
			    }else{
			        field.value = '0';
			        document.getElementById('slot' + rowCount + '_value').style.textDecoration = 'none';
			    }
			    
			   
			}
var studiotabs = new StudioTabGroup();
studiotabs.subtabCount = {};
studiotabs.subtabModules = {};
studiotabs.tabLabelToValue = {};