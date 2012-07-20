{*
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

*}
{if !$js_loaded}
{literal}
<script language="javascript">
var object_refs = new Object();

function left_to_right(left_name,right_name,id) 
{
	var display_columns_ref = object_refs[left_name];
	var hidden_columns_ref = object_refs[right_name];

	var left_td = document.getElementById(left_name+'_td');
	var right_td = document.getElementById(right_name+'_td');

	var selected_left = new Array();
	var notselected_left = new Array();
	var notselected_right = new Array();

	var left_array = new Array();

        // determine which options are selected in left 
	for (i=0; i < display_columns_ref.options.length; i++)
	{
		if ( display_columns_ref.options[i].selected == true) 
		{
			selected_left[selected_left.length] = {text: display_columns_ref.options[i].text, value: display_columns_ref.options[i].value};
		}
		else
		{
			notselected_left[notselected_left.length] = {text: display_columns_ref.options[i].text, value: display_columns_ref.options[i].value};
      if ( typeof(display_columns_ref.options[i].saved_text) != 'undefined')
      {
        notselected_left[notselected_left.length - 1].saved_text =  display_columns_ref.options[i].saved_text;     
      }

		}
		
	}

	for (i=0; i < hidden_columns_ref.options.length; i++)
	{
		notselected_right[notselected_right.length] = {text:hidden_columns_ref.options[i].text, value:hidden_columns_ref.options[i].value};
		
	}

	var left_select_html_info = new Object();
	var left_options = new Array();
	var left_select = new Object();

	left_select['name'] = left_name+'[]';
	left_select['id'] = left_name;
	left_select['size'] = '10';
	left_select['multiple'] = 'true';

	var right_select_html_info = new Object();
	var right_options = new Array();
	var right_select = new Object();

	right_select['name'] = right_name+'[]';
	right_select['id'] = right_name;
	right_select['size'] = '10';
	right_select['multiple'] = 'true';

	for (i=0;i < notselected_right.length;i++)
	{
		right_options[right_options.length] = notselected_right[i];	
	}

	for (i=0;i < selected_left.length;i++)
	{
		right_options[right_options.length] = selected_left[i];	
	}
	for (i=0;i < notselected_left.length;i++)
	{
		left_options[left_options.length] = notselected_left[i];	
	}
	left_select_html_info['options'] = left_options;
	left_select_html_info['select'] = left_select;
	right_select_html_info['options'] = right_options;
	right_select_html_info['select'] = right_select;

	var left_html = buildSelectHTML(left_select_html_info);
	var right_html = buildSelectHTML(right_select_html_info);


	left_td.innerHTML = left_html;
	right_td.innerHTML = right_html;

	addSelectOptionAttrs(left_select_html_info,left_td.getElementsByTagName('select')[0]);
	addSelectOptionAttrs(right_select_html_info,right_td.getElementsByTagName('select')[0]);

	object_refs[left_name] = left_td.getElementsByTagName('select')[0];
	object_refs[right_name] = right_td.getElementsByTagName('select')[0];
	if(left_name == 'display_columns' && getReportType() == 'summary'){
		//deleteAllGroups(0);
		//remakeGroups();
	}

	try
	{
		eval("onmoveright_"+id+"();");
	} catch(e) {
	}

}


function right_to_left(left_name,right_name,id) 
{
	var display_columns_ref = object_refs[left_name];
	var hidden_columns_ref = object_refs[right_name];

	var left_td = document.getElementById(left_name+'_td');
	var right_td = document.getElementById(right_name+'_td');

	var selected_right = new Array();
	var notselected_right = new Array();
	var notselected_left = new Array();

	for (i=0; i < hidden_columns_ref.options.length; i++)
	{
		if (hidden_columns_ref.options[i].selected == true) 
		{
			selected_right[selected_right.length] = {text:hidden_columns_ref.options[i].text, value:hidden_columns_ref.options[i].value};
		}
		else
		{
			notselected_right[notselected_right.length] = {text:hidden_columns_ref.options[i].text, value:hidden_columns_ref.options[i].value};
		}
		
	}

	for (i=0; i < display_columns_ref.options.length; i++)
	{
		notselected_left[notselected_left.length] = {text:display_columns_ref.options[i].text, value:display_columns_ref.options[i].value};

    if ( typeof(display_columns_ref.options[i].saved_text) != 'undefined')
    {
		  notselected_left[notselected_left.length - 1].saved_text =  display_columns_ref.options[i].saved_text;
    }
		
	}

	var left_select_html_info = new Object();
	var left_options = new Array();
	var left_select = new Object();

	left_select['name'] = left_name+'[]';
	left_select['id'] = left_name;
	left_select['multiple'] = 'true';
	left_select['size'] = '10';

	var right_select_html_info = new Object();
	var right_options = new Array();
	var right_select = new Object();

	right_select['name'] = right_name+ '[]';
	right_select['id'] = right_name;
	right_select['multiple'] = 'true';
	right_select['size'] = '10';

	for (i=0;i < notselected_left.length;i++)
	{
		left_options[left_options.length] = notselected_left[i];	
	}

	for (i=0;i < selected_right.length;i++)
	{
		left_options[left_options.length] = selected_right[i];	
	}
	for (i=0;i < notselected_right.length;i++)
	{
		right_options[right_options.length] = notselected_right[i];	
	}
	left_select_html_info['options'] = left_options;
	left_select_html_info['select'] = left_select;
	right_select_html_info['options'] = right_options;
	right_select_html_info['select'] = right_select;

	var left_html = buildSelectHTML(left_select_html_info);
	var right_html = buildSelectHTML(right_select_html_info);

	left_td.innerHTML = left_html;
	right_td.innerHTML = right_html;

	addSelectOptionAttrs(left_select_html_info,left_td.getElementsByTagName('select')[0]);
	addSelectOptionAttrs(right_select_html_info,right_td.getElementsByTagName('select')[0]);

	object_refs[left_name] = left_td.getElementsByTagName('select')[0];
	object_refs[right_name] = right_td.getElementsByTagName('select')[0];
	if(left_name == 'display_columns' && getReportType() == 'summary'){
	//deleteAllGroups(0);
	//remakeGroups();
	}
	try
	{
		eval("onmoveleft_"+id+"();");
	} catch(e) {
	}
	

}


function up(name,id) 
{
	var td = document.getElementById(name+'_td');
	var obj = td.getElementsByTagName('select')[0];
	obj = (typeof obj == "string") ? document.getElementById(obj) : obj;
	if (obj.tagName.toLowerCase() != "select" && obj.length < 2)
		return false;
	var sel = new Array();

	for (i=0; i<obj.length; i++) {
		if (obj[i].selected == true) {
			sel[sel.length] = i;
		}
	}
	for (i in sel) {
		if (sel[i] != 0 && !obj[sel[i]-1].selected) {
			var tmp = new Array(obj[sel[i]-1].text, obj[sel[i]-1].value, obj[sel[i]-1].saved_text);
			obj[sel[i]-1].text = obj[sel[i]].text;
			obj[sel[i]-1].saved_text = obj[sel[i]].saved_text;
			obj[sel[i]-1].value = obj[sel[i]].value;
			obj[sel[i]].text = tmp[0];
			obj[sel[i]].value = tmp[1];
			obj[sel[i]].saved_text = tmp[2];
			obj[sel[i]-1].selected = true;
			obj[sel[i]].selected = false;
		}
	}
}


function down(name,id) 
{
	var td = document.getElementById(name+'_td');
	var obj = td.getElementsByTagName('select')[0];
	if (obj.tagName.toLowerCase() != "select" && obj.length < 2)
		return false;
	var sel = new Array();
	for (i=obj.length-1; i>-1; i--) {
		if (obj[i].selected == true) {
			sel[sel.length] = i;
		}
	}
	for (i in sel) {
		if (sel[i] != obj.length-1 && !obj[sel[i]+1].selected) {
			var tmp = new Array(obj[sel[i]+1].text, obj[sel[i]+1].value, obj[sel[i]+1].saved_text);
			obj[sel[i]+1].text = obj[sel[i]].text;
			obj[sel[i]+1].saved_text = obj[sel[i]].saved_text;
			obj[sel[i]+1].value = obj[sel[i]].value;
			obj[sel[i]].text = tmp[0];
			obj[sel[i]].value = tmp[1];
			obj[sel[i]].saved_text = tmp[2];
			obj[sel[i]+1].selected = true;
			obj[sel[i]].selected = false;
		}
	}
}

</script>
{/literal}
{ /if}

<script language="javascript">
{if $args.onmoveleft ne ''}
var onmoveleft_{$args.id} {literal} = function () {
{/literal}
{$args.onmoveleft};
}
{/if}
{if $args.onmoveleft ne ''}
var onmoveright_{$args.id} {literal} = function () {
{/literal}
{$args.onmoveright};
}
{/if}
</script>
<div id="{$args.id}" style="{$table_style}">
<table cellpadding="0" cellspacing="0" border='0'>
<tr>
<td scope="row">
<h5>{$args.title}</h5>
</td>
</tr>
<tr>
<td>
<table border="0" cellspacing=0 cellpadding="0">
<tr>
	<td>&nbsp;</td>
	<td  scope="row" id="chooser_{$args.left_name}_text"r><nobr><b>{$args.left_label}</b></nobr></td>
	<td>&nbsp;</td>
	<td  scope="row" id="chooser_{$args.right_name}"><nobr><b>{$args.right_label}</b></nobr></td>
</tr>
<tr>
	<td valign="top" style="padding-right: 2px; padding-left: 2px;">
<a onclick="javascript:up('{$args.left_name}','{$args.id}');">{$uparraow_big}</a><br>
<a onclick="javascript:down('{$args.left_name}','{$args.id}');">{$downarrow_big}</a>
			</td>
	<td>
		<table border="0" cellspacing=0 cellpadding="0">
		<tr>
			<td id="{$args.left_name}_td">
			<select id="{$args.left_name}" name="{$args.left_name}[]"  size="10" width="300" multiple="multiple"></select></td>

		</tr>
		</table>
	</td>
	<td valign="top" style="padding-right: 2px; padding-left: 2px;"><a onclick="javascript:right_to_left('{$args.left_name}','{$args.right_name}','{$args.id}');">{$leftarrow_big}</a><a onclick="javascript:left_to_right('{$args.left_name}','{$args.right_name}','{$args.id}');">{$rightarrow_big}</a></td>
	<td id="{$args.right_name}_td">
<select id="{$args.right_name}" name="{$args.right_name}[]" size="10" multiple="multiple"/>
	<td valign="top" style="padding-right: 2px; padding-left: 2px;">

			</td>
</tr>
</table>
			</td>
</tr>
</table>
</div>

<script language="javascript">
object_refs['{$args.left_name}'] = document.EditView['{$args.left_name}']; 
object_refs['{$args.right_name}'] = document.EditView['{$args.right_name}'];
</script>
