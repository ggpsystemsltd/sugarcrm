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




var rhandle=new RevisionListHandler();
var from_popup_return  = false;
function document_set_return(popup_reply_data)
{
	from_popup_return = true;
	var form_name = popup_reply_data.form_name;
	var name_to_value_array = popup_reply_data.name_to_value_array;
	related_doc_id='EMPTY';
	for (var the_key in name_to_value_array)
	{
		if(the_key != 'toJSON')
		{
			var displayValue=name_to_value_array[the_key];
			displayValue=displayValue.replace('&#039;',"'");  //restore escaped single quote.
			displayValue=displayValue.replace( '&amp;',"&");  //restore escaped &.
			displayValue=displayValue.replace( '&gt;',">");  //restore escaped >.
			displayValue=displayValue.replace( '&lt;',"<");  //restore escaped <.
			displayValue=displayValue.replace( '&quot; ',"\"");  //restore escaped ".
			if (the_key == 'related_doc_id') {
				related_doc_id =displayValue;
			}
			window.document.forms[form_name].elements[the_key].value = displayValue;
		}
	}
	related_doc_id=YAHOO.lang.JSON.stringify(related_doc_id);
	//make request for document revisions data.
	var conditions  = new Array();
    conditions[conditions.length] = {"name":"document_id","op":"starts_with","value":related_doc_id};
 	var query = {"module":"DocumentRevisions","field_list":['id','revision','date_entered'],"conditions":conditions,"order":{'by':'date_entered', 'desc': true}};

 	//make the call call synchronous for now...
    //todo: convert to async, test on mozilla..
    result = global_rpcClient.call_method('query',query,true);
    rhandle.display(result);
}


function RevisionListHandler() { }

RevisionListHandler.prototype.display = function(result) {
 	var names = result['list'];
 	var rev_tag=document.getElementById('related_doc_rev_id');
 	rev_tag.options.length=0;

	for(i=0; i < names.length; i++) {
		rev_tag.options[i] = new Option(names[i].fields['revision'],names[i].fields['id'],false,false);
	}
 	rev_tag.disabled=false;
}


function setvalue(source) {

	src = new String(source.value);
	target=new String(source.form.document_name.value);

	if (target.length == 0)
	{
		lastindex=src.lastIndexOf("/");
		if (lastindex == -1) {
			lastindex=src.lastIndexOf("\\");
		}
		if (lastindex == -1) {
			source.form.document_name.value=src;
		} else {
			source.form.document_name.value=src.substr(++lastindex, src.length);
		}
	}
}

function toggle_template_type(istemplate) {
	template_type = document.getElementById('template_type');
	if (istemplate.checked) {
		//template_type.enabled=true;
		template_type.disabled=false;
	} else {
		//template_type.enabled=false;
		template_type.disabled=true;
	}
}
