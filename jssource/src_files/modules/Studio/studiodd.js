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



/*Portions Copyright (c) 2006 Yahoo! Inc. All rights reserved. */

/**
 * @class a ygDDFramed implementation like ygDDMy, but the content channels are
 * not restricted to one column, and we drag a miniature representation of the
 * content channel rather than a frame of the channel.
 *
 * @extends YAHOO.util.DDProxy
 * @constructor
 * @param {String} id the id of the linked element
 * @param {String} sGroup the group of related DragDrop objects
 */


function ygDDSlot(id, sGroup) {
	
	if (id) {
		this.init(id, sGroup);
		this.initFrame();
	}

	// Change the style of the frame to be a miniature representation of a
	// content channel
		var s = this.getDragEl().style;
	s.borderColor = "transparent";
	s.backgroundColor = "#f6f5e5";
	s.opacity = 0.76;
	s.filter = "alpha(opacity=76)";

	// Specify that we do not want to resize the drag frame... we want to keep
	// the drag frame the size of our miniature content channel image
	this.resizeFrame = true;
        if(id == 's_field_delete'){
            this.isValidHandle = false;
        }
	// Specify that we want the drag frame centered around the cursor rather 
	// than relative to the click location so that the miniature content
	// channel appears in the location that was clicked
	//this.centerFrame = true;
}

ygDDSlot.prototype = new YAHOO.util.DDProxy();
ygDDSlot.prototype.handleDelete = function(cur, curb){
     var parentID = (typeof(cur.parentID) == 'undefined')?cur.id.substr(4,cur.id.length):cur.parentID ;
     if(parentID.indexOf('field') == 0){
         return false;
     }
     var myfieldcount = field_count_MSI;
     addNewField('dyn_field_' + field_count_MSI, 'delete', '&nbsp;', '&nbsp;', 'deleted', 0, 'studio_fields')
     yahooSlots["dyn_field_" + myfieldcount] = new ygDDSlot("dyn_field_" + myfieldcount, "studio");
     ygDDSlot.prototype.handleSwap(cur, curb, document.getElementById("dyn_field_" + myfieldcount), document.getElementById("dyn_field_" + myfieldcount+ 'b'), true);
}

ygDDSlot.prototype.undo = function(transaction){
        ygDDSlot.prototype.handleSwap(document.getElementById(transaction['el']),document.getElementById(transaction['elb']), document.getElementById(transaction['cur']), document.getElementById(transaction['curb']), false);
}
ygDDSlot.prototype.redo = function(transaction){
        ygDDSlot.prototype.handleSwap(document.getElementById(transaction['el']),document.getElementById(transaction['elb']), document.getElementById(transaction['cur']), document.getElementById(transaction['curb']), false);
}

ygDDSlot.prototype.handleSwap = function(cur, curb,el, elb, record ){
    if(record){
    		if(curb){
        	jstransaction.record('studioSwap', {'cur': cur.id, 'curb': curb.id, 'el':el.id, 'elb':elb.id});
        }else{
        	jstransaction.record('studioSwap', {'cur': cur.id, 'curb': null, 'el':el.id, 'elb':null});
        }
    }
    var parentID1 = (typeof(el.parentID) == 'undefined')?el.id.substr(4,el.id.length):el.parentID ;
    var parentID2 = (typeof(cur.parentID) == 'undefined')?cur.id.substr(4,cur.id.length):cur.parentID ;
    var slot1 = YAHOO.util.DDM.getElement("slot_" + parentID1);
    var slot2 = YAHOO.util.DDM.getElement("slot_" + parentID2);

    var temp = slot1.value;
	slot1.value = slot2.value;
  	slot2.value = temp;
  	
	YAHOO.util.DDM.swapNode(cur, el);
	if(curb){
		YAHOO.util.DDM.swapNode(curb, elb);
	}
	//swap ids also or else form swaps don't work properly since the actual div is swapped
	cur.parentID = parentID1;
	el.parentID = parentID2;
	if(parentID1.indexOf('field') == 0){
		if(curb)curb.style.display = 'none';
		setMouseOverForField(cur, true);
	}else{
		if(curb)curb.style.display = 'inline';
		setMouseOverForField(cur, false);
	}
	if(parentID2.indexOf('field') == 0){
		if(elb)elb.style.display = 'none';
		setMouseOverForField(el, true);
	}else{
		if(elb)elb.style.display = 'inline';
		setMouseOverForField(el, false);
	}
}
ygDDSlot.prototype.onDragDrop = function(e, id) {
   
	var cur = this.getEl();	
	
	var curb;
    if ("string" == typeof id) {
        curb = YAHOO.util.DDM.getElement(cur.id + "b");
    } else {
        curb = YAHOO.util.DDM.getBestMatch(cur.id + "b").getEl();
    } 
	 if(id == 's_field_delete'){
	     id = ygDDSlot.prototype.handleDelete(cur, curb);
	     if(!id)return false;
	 }
    
    
    var el;
    if ("string" == typeof id) {
        el = YAHOO.util.DDM.getElement(id);
    } else {
        el = YAHOO.util.DDM.getBestMatch(id).getEl();
    }
    
  	 
  	 
  
    id2 = el.id + "b";
    if ("string" == typeof id) {
        elb =YAHOO.util.DDM.getElement(id2);
    } else {
        elb =YAHOO.util.DDM.getBestMatch(id2).getEl();
    } 
    
	ygDDSlot.prototype.handleSwap(cur, curb, el, elb, true)
	var dragEl = this.getDragEl();
	dragEl.innerHTML = '';
};

ygDDSlot.prototype.startDrag = function(x, y) {

	var dragEl = this.getDragEl();
	var clickEl = this.getEl();
	dragEl.innerHTML = clickEl.innerHTML;
	dragEl.className = clickEl.className;
	dragEl.style.color = clickEl.style.color;
	dragEl.style.border = "2px solid #aaa";
	
	// save the style of the object 
	this.clickContent = clickEl.innerHTML;
	this.clickBorder = clickEl.style.border;
	this.clickHeight = clickEl.style.height;
	clickElRegion = YAHOO.util.Dom.getRegion(clickEl);
	dragEl.style.height = 	clickEl.style.height;

	dragEl.style.width = 	(clickElRegion.right - clickElRegion.left) + 'px';
	clickEl.style.height = (clickElRegion.bottom - clickElRegion.top) + 'px';
	
	//clickEl.innerHTML = '&nbsp;';
	clickEl.style.border = '2px dashed #cccccc';
	clickEl.style.opacity = .5;
	clickEl.style.filter = "alpha(opacity=10)";

};

ygDDSlot.prototype.endDrag = function(e) {
	// disable moving the linked element
	var clickEl = this.getEl();
	//clickEl.innerHTML = this.clickContent

	if(this.clickHeight) 
	    clickEl.style.height = this.clickHeight;
	else 
		clickEl.style.height = '';
	
	if(this.clickBorder) 
	    clickEl.style.border = this.clickBorder;
	else 
		clickEl.style.border = '';
	clickEl.style.opacity = 1;
	clickEl.style.filter = "alpha(opacity=100)";
		
};
jstransaction.register('studioSwap',ygDDSlot.prototype.undo, ygDDSlot.prototype.redo);