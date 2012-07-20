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

if(typeof(SimpleList) == 'undefined'){
	var Dom = YAHOO.util.Dom;
    SimpleList = function(){
        var editImage;
        var deleteImage;
        var ul_list;
        var jstransaction;
        var lastEdit;
        var isIE = isSupportedIE();
        return {
    init: function(editImage, deleteImage) {
        var ul = document.getElementById('ul1', 'drpdwn');
        SimpleList.lastEdit = null; // Bug 14662
        SimpleList.editImage = editImage;
        SimpleList.deleteImage = deleteImage;
        new YAHOO.util.DDTarget("ul1");

        Studio2.scrollZones = {}
        for (var i = 0; Dom.get("ul" + i); i++){
            Studio2.scrollZones["ul" + i] = Studio2.getScrollZones("ul" + i);
        }
           
        for (i=0;i<SimpleList.ul_list.length;i++){
            if ( typeof SimpleList.ul_list[i] != "number" && SimpleList.ul_list[i] == "" ) {
                SimpleList.ul_list[i] = SUGAR.language.get('ModuleBuilder', 'LBL_BLANK');
            }
            new Studio2.ListDD(SimpleList.ul_list[i], 'drpdwn', false);
        }
        YAHOO.util.Event.on("dropdownaddbtn", "click", this.addToList, 'dropdown_form');
        SimpleList.jstransaction = new JSTransaction();
        SimpleList.jstransaction.register('deleteDropDown', SimpleList.undoDeleteDropDown, SimpleList.undoDeleteDropDown);
        SimpleList.jstransaction.register('changeDropDownValue', SimpleList.undoDropDownChange, SimpleList.redoDropDownChange);

    },
    isValidDropDownKey : function(value){
    	if(value.match(/^[\w\d \.]+$/i) || value == "")
    		return true;
    	
    	return false;
    },
    isBlank : function(value){
    	return value == SUGAR.language.get('ModuleBuilder', 'LBL_BLANK') 
    			|| (typeof value != "number" && value == "");
    },
    addToList : function(event, form){
    	var drop_name = document.getElementById('drop_name');
    	var drop_value = document.getElementById('drop_value');
    	//Validate the dropdown key manually
    	removeFromValidate('dropdown_form', 'drop_name');
    	if(!SimpleList.isValidDropDownKey(escape(drop_name.value))) {
			addToValidate('dropdown_form', 'drop_name', 'error', false, SUGAR.language.get("ModuleBuilder", "LBL_JS_VALIDATE_KEY"));
    	}
    	
    	if (!check_form("dropdown_form")) return;

        var ul1=YAHOO.util.Dom.get("ul1");

        var items = ul1.getElementsByTagName("li");
        for (i=0;i<items.length;i=i+1) {
            if((SimpleList.isBlank(items[i].id) && SimpleList.isBlank(escape(drop_name.value))) || items[i].id == escape(drop_name.value)){
                alert("Key already exists in list");
                return;
            }
            if((!SimpleList.isBlank(escape(drop_name.value)) && SimpleList.isBlank(escape(drop_value.value))) || (SimpleList.isBlank(escape(drop_name.value)) && !SimpleList.isBlank(escape(drop_value.value)))){
                alert(SUGAR.language.get('ModuleBuilder', 'LBL_DROPDOWN_BLANK_WARNING'));
                return;
            }
        }

        liObj = document.createElement('li');
        liObj.className = "draggable";
        if(escape(drop_name.value) == '' || !escape(drop_name.value)){
            liObj.id = SUGAR.language.get('ModuleBuilder', 'LBL_BLANK');
        }else{
            liObj.id = escape(drop_name.value);
        }

        var text1 = document.createElement('input');
        text1.type = 'hidden';
        text1.id = 'value_' + liObj.id;
        text1.name = 'value_' + liObj.id;
        text1.value = escape(drop_value.value);

        var html = "<table width='100%'><tr><td><b>"+liObj.id+"</b><input id='value_"+liObj.id+"' value=\""+escape(drop_value.value)+"\" type = 'hidden'><span class='fieldValue' id='span_"+liObj.id+"'>";
        if(drop_value.value == ""){
            html += "[" + SUGAR.language.get('ModuleBuilder', 'LBL_BLANK') + "]";
        }else{
            html += "["+YAHOO.lang.escapeHTML(drop_value.value)+"]";
        }
        html += "</span>";
        html += "<span class='fieldValue' id='span_edit_"+liObj.id+"' style='display:none'>";
        html += "<input type='text' id='input_"+liObj.id+"' value=\""+drop_value.value+"\" onchange='SimpleList.setDropDownValue(\""+liObj.id+"\", unescape(this.value), true)' >";
        html += "</span>";
        html += "</td><td align='right'><a href='javascript:void(0)' onclick='SimpleList.editDropDownValue(\""+liObj.id+"\", true)'>"+SimpleList.editImage+"</a>";
        html += "&nbsp;<a href='javascript:void(0)' onclick='SimpleList.deleteDropDownValue(\""+liObj.id+"\", true)'>"+SimpleList.deleteImage+"</a>";
        html += "</td></tr></table>";

        liObj.innerHTML = html;
        ul1.appendChild(liObj);
        new Studio2.ListDD(liObj, 'drpdwn', false);
        drop_value.value = "";
        drop_name.value = "";
        drop_name.focus();

        SimpleList.jstransaction.record('deleteDropDown',{'id': liObj.id });

    },
 
    sortAscending: function ()
    {
        // now sort using a Shellsort - do this rather than by using the inbuilt sort function as we need to sort a complex DOM inplace
        var parent = YAHOO.util.Dom.get("ul1");
        var items = parent.getElementsByTagName("li") ;
        var increment = Math.floor ( items.length / 2 ) ;
        
        function swapItems(itemA, itemB) {
        	var placeholder = document.createElement ( "li" ) ;
            Dom.insertAfter(placeholder, itemA);
            Dom.insertBefore(itemA, itemB);
            Dom.insertBefore(itemB, placeholder);
            
            //Cleanup the placeholder element
            parent.removeChild(placeholder);
        }
        
        while ( increment > 0 )
        {
        	for (var i = increment; i < items.length; i++)
        	{
            	var j = i;
            	var id = items[i].id;
            	var iValue = document.getElementById( 'input_' + id ).value.toLowerCase() ;
              
            	while ( ( j >= increment ) && ( document.getElementById( 'input_' + items [j-increment].id ).value.toLowerCase() > iValue ) )
            	{
            		// logically, this is what we need to do: items [j] = items [j - increment];
            		// but we're working with the DOM through a NodeList (items) which is readonly, so things aren't that simple
            		// A placeholder will be used to keep track of where in the DOM the swap needs to take place
            		// especially with IE which enforces the prohibition on duplicate Ids, so copying nodes is problematic
            		swapItems(items [j], items [j - increment]);
                	j = j - increment;
            	}
            }
             
            if (increment == 2)
            	increment = 1;
            else 
            	increment = Math.floor (increment / 2.2);
        }
    },
    sortDescending: function ()
    {
        this.sortAscending();
        var reverse = function ( children )
        {
            var parent = children [ 0 ] . parentNode ;
            var start = 0;
            if ( children [ 0 ].id == '-blank-' ) // don't include -blank- element in the sort
                start = 1 ;
            for ( var i = children.length - 1 ; i >= start ; i-- )
            {
                parent.appendChild ( children [ i ] ) ;
            }
        };
        reverse ( YAHOO.util.Dom.get("ul1").getElementsByTagName("li") ) ;
    },
    handleSave:function(){
         var parseList = function(ul, title) {
            var items = ul.getElementsByTagName("li");
            var out = [];
            for (i=0;i<items.length;i=i+1) {
                var name = items[i].id;
                var value = document.getElementById('input_'+name).value;
                out[i] = [ name , unescape(value) ];
            }
            return YAHOO.lang.JSON.stringify(out);
        };
        var ul1=YAHOO.util.Dom.get("ul1");
        var hasDeletedItem = false;
        for(j = 0; j < SimpleList.jstransaction.JSTransactions.length; j++){            
            var liEl = new YAHOO.util.Element(SimpleList.jstransaction.JSTransactions[j]['data']['id']);
            if(liEl && liEl.hasClass('deleted'))
            	hasDeletedItem = true;
            	break;
        }
        if(hasDeletedItem) {
        	if(!confirm(SUGAR.language.get('ModuleBuilder', 'LBL_CONFIRM_SAVE_DROPDOWN')))
        		return false;        	
    	}
        
        for(j = 0; j < SimpleList.jstransaction.JSTransactions.length; j++){
            if(SimpleList.jstransaction.JSTransactions[j]['transaction'] == 'deleteDropDown'){
                var liEl = new YAHOO.util.Element(SimpleList.jstransaction.JSTransactions[j]['data']['id']);
                if(liEl && liEl.hasClass('deleted'))
                	ul1.removeChild(liEl.get("element"));
            }
        }
        var list = document.getElementById('list_value');

        var out = parseList(ul1, "List 1");
        list.value = out;
        ModuleBuilder.refreshDD_name = document.getElementById('dropdown_name').value;
        if (document.forms.popup_form)
        {
            ModuleBuilder.handleSave("dropdown_form", ModuleBuilder.refreshDropDown);
        }
        else
        {
            ModuleBuilder.handleSave("dropdown_form", ModuleBuilder.refreshGlobalDropDown);
        }
    },
    deleteDropDownValue : function(id, record){
        var field = new YAHOO.util.Element(id);
        if(record){
            SimpleList.jstransaction.record('deleteDropDown',{'id': id });
        }
        if (field.hasClass('deleted'))
            field.removeClass('deleted');
        else
            field.addClass('deleted');
    },
    editDropDownValue : function(id, record){
        //Close any other dropdown edits
        if (SimpleList)
            SimpleList.endCurrentDropDownEdit();
        var dispSpan = document.getElementById('span_'+id);
        var editSpan = document.getElementById('span_edit_'+id);
        dispSpan.style.display = 'none';

        if(SimpleList.isIE){
            editSpan.style.display = 'inline-block';
        }else{
            editSpan.style.display = 'inline';
        }
        var textbox = document.getElementById('input_'+id);
        textbox.focus();
        SimpleList.lastEdit = id;
    },
    endCurrentDropDownEdit : function() {
        if (SimpleList.lastEdit != null)
        {
            var valueLastEdit = unescape(document.getElementById('input_'+SimpleList.lastEdit).value);
            SimpleList.setDropDownValue(SimpleList.lastEdit,valueLastEdit,true);
        }
    },
    setDropDownValue : function(id, val, record){

        if(record){
            SimpleList.jstransaction.record('changeDropDownValue', {'id':id, 'new':val, 'old':document.getElementById('value_'+ id).value});
        }
        var dispSpan = document.getElementById('span_'+id);
        var editSpan = document.getElementById('span_edit_'+id);
        var textbox = document.getElementById('input_'+id);

        dispSpan.style.display = 'inline';
        editSpan.style.display = 'none';
        dispSpan.innerHTML = "["+val+"]";
        document.getElementById('value_'+ id).value = val;
        SimpleList.lastEdit = null; // Bug 14662 - clear the last edit point behind us
    },
    undoDeleteDropDown : function(transaction){

        SimpleList.deleteDropDownValue(transaction['id'], false);
    },
    undoDropDownChange : function(transaction){
        SimpleList.setDropDownValue(transaction['id'], transaction['old'], false);
    },
    redoDropDownChange : function(transaction){
        SimpleList.setDropDownValue(transaction['id'], transaction['new'], false);
    },
    undo : function(){
        SimpleList.jstransaction.undo();
    },
    redo : function(){
        SimpleList.jstransaction.redo();
    }
}//return
}();
}