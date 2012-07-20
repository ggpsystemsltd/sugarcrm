<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

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

////////////////////////////////////////////// 
// TEMPLATE:
////////////////////////////////////////////// 
function template_reports_index(&$args)
{
$reporter = $args['reporter'];
?>
<table width="100%">
<tr>
<form action="index.php" name="EditView">
<input type="hidden" name="action" value="index">
<input type="hidden" name="module" value="Reports">
<input type="hidden" name="current_parent" value="index">
<input type="hidden" name="current_parent_id" value="Reports">
<!--
<input type="hidden" name="account_id" value="Reports">
<input type="hidden" name="account_name" value="Reports">
-->
<input type="hidden" name="report_module" value="<?php echo $reporter->module; ?>">
<td valign="top">
<?php template_reports_tables($args); ?>
</td>
<td>
<?php template_reports_display($args); ?>
</td>
</tr>
<td colspan=2>
<?php template_reports_filters($args); ?>
</td>
</tr>
<td align=right colspan=2>
<input type=submit>
</td>
</tr>
</form>
</table>
<br>
<?php if (! empty($_REQUEST['display_columns'])) { ?>
<?php template_list_view($args); ?>
<?php } ?>
<?php
}

////////////////////////////////////////////// 
// TEMPLATE:
// filters_top: string is filled up with the filter query string
// filters_top: table that holds the filter rows
////////////////////////////////////////////// 
function template_reports_filters(&$args)
{
?>
<input type=hidden name='filters_def' value ="">
<table id='filters_top'>
<tbody id='filters'>

</table>
<table width="100%">
<tr>
<td align=center>
<input class=button type=button onClick='addFilter()' name='Add Filter' value='Add Filter'>
</td>
</tr>
</table>

<?php
}

////////////////////////////////////////////// 
// TEMPLATE:
////////////////////////////////////////////// 
function template_reports_tables(&$args)
{
$reporter = $args['reporter'];

$modules = array (
'ReportContact'=>'Contacts',
'ReportAccount'=>'Accounts',
'ReportOpportunity'=>'Opportunities'
);
$classname = "";
?>
<table width="100%" cellspacing="2">
<tr class="<?php echo $classname; ?>">
<td class="<?php echo $classname; ?>">
<b>Module:</b>
<br>
<script language="javascript">
//var module_map_to_parent = {ReportAccount:"Accounts",ReportOpportunity:"Opportunities",ReportContact:"Contacts"};
var current_module = "<?php echo $reporter->module; ?>";
var module_defs = new Object();
var previous_filters = new Object();

<?php
$filters_def = urldecode($_REQUEST['filters_def']);

$FILTERS_ARR = array();
parse_str($filters_def,$FILTERS_ARR);

// build previous filters array
for ($i=0; isset($FILTERS_ARR['column_name'.$i]);$i++)
{

	if (isset($FILTERS_ARR['input_name'.$i.'_1']))
	{
		$field1 = $FILTERS_ARR['input_name'.$i.'_1'];
	}
	else
	{
		$field1 = '';
	}
?>
previous_filters['<?php echo $FILTERS_ARR['column_name'.$i]; ?>'] = {qualifier_name:'<?php echo $FILTERS_ARR['qualifier_name'.$i]; ?>',input_name0:'<?php echo $FILTERS_ARR['input_name'.$i.'_0']; ?>',input_name1:'<?php echo $field1 ?>'};
<?php if ( is_array($FILTERS_ARR['input_name'.$i.'_0'])) { ?>
var input_selected_fields = ["<?php echo implode("\",\"",$FILTERS_ARR['input_name'.$i.'_0']); ?>"];
previous_filters['<?php echo $FILTERS_ARR['column_name'.$i]; ?>'].input_name<?php echo $i; ?>_0 = input_selected_fields;
<?php } ?>

<?php	
}

// build table datastructure in javascript objs

foreach ($modules as $module_name=>$notused)
{
	
	$module = new $module_name;

?>
var joins_<?php echo $module_name; ?> = ["<?php 
			echo implode("\",\"",array_keys($module->joins) ); 
			?>"];
var field_defs_<?php echo $module_name; ?> = new Object();
<?php
	foreach ($module->field_defs as $field_def)
	{	
?>

field_defs_<?php echo $module_name; ?>[ "<?php echo $field_def['name']; ?>"] = <?php 

		$js_defs_array = array();

		foreach($field_def as $field_name=>$field_value)
		{	
			if ( $field_name != "options" || $field_name != "name")
			{
				array_push($js_defs_array, 
					"$field_name:\"$field_value\"");
			}
		}

		echo "{".implode(",",$js_defs_array)."};";

		if ( isset($field_def['options']))
		{
			$options_array = array();
			foreach ($field_def['options'] as $option_name)
			{
				array_push($options_array,"\"$option_name\"");
			}
		?>

field_defs_<?php echo $module_name; ?>[ "<?php echo $field_def['name']; ?>"].options=[<?php echo implode(",",$options_array); ?>];

		<?php
		}

	}
?>

var default_table_columns_<?php echo $module_name; ?> = ["<?php echo implode("\",\"",$module->default_table_columns); ?>"];

module_defs['<?php echo $module_name; ?>'] = new Object();
module_defs['<?php echo $module_name; ?>'].field_defs = field_defs_<?php echo $module_name; ?>;
module_defs['<?php echo $module_name; ?>'].joins = joins_<?php echo $module_name; ?>;
module_defs['<?php echo $module_name; ?>'].default_table_columns = default_table_columns_<?php echo $module_name; ?>;

<?php
	}
	?>
	

function table_changed(obj)
{
	current_module = obj.options[obj.selectedIndex].value;
	visible_fields = null;
	hidden_fields.length = 0;
	visible_fields = module_defs[current_module].default_table_columns;
	seen_visible = new Object();

	for(i=0;i < module_defs[current_module].default_table_columns.length;i++)
	{
		seen_visible[ module_defs[current_module].default_table_columns[i]] = 1;
	}

	for( field in module_defs[current_module].field_defs)
	{
		if (seen_visible[module_defs[current_module].field_defs[field].name] != 1)
		{
			hidden_fields[hidden_fields.length] = module_defs[current_module].field_defs[field].name;
		}
	}

	reload_columns();
	//reload_joins();
	deleteAllFilters();
}

</script>
<select name="report_module" onChange="table_changed(this);">
<?php 
// initial hardcoded SELECTED setting from php
// loop thru supported module tables
foreach ($modules as $module=>$module_name)
{
	// if module has been requested
	if ($module == $reporter->module)
	{
		$module_selected = ' SELECTED';
	} 
	else
	{
		$module_selected = '';
	}
?>
<option value="<?php echo $module; ?>" <?php echo $module_selected; ?>><?php echo $module_name; ?></option>
<?php } ?>
</select>
</td>
</tr>
</table>
<table id='joins_table'>
</table>
<?php
}

////////////////////////////////////////////// 
// TEMPLATE:
////////////////////////////////////////////// 
function template_reports_display(&$args)
{

$reporter = $args['reporter'];

$field_defs = $reporter->focus->field_defs;
$fields_seen = array();
$table_columns = array();
$hidden_columns = array();

if ( ! isset($_REQUEST['display_columns']))
{
$table_columns = $reporter->focus->default_table_columns;
}
else
{
//print_r( $reporter->focus->default_table_columns);
$table_columns = $_REQUEST['display_columns'];
}

foreach ($field_defs as $field)
{
	if (! in_array($field['name'],$table_columns))
	{
		array_push($hidden_columns,$field['name']);
	}
}

template_columns_javascript($args);
?>
<table border="0" cellspacing=0>
<tr>
	<td><b>Display Columns:</b></td>
	<td><b>Hide Columns:</b></td>
</tr>
<tr>
	<td>
		<table>
		<tr>
			<td>
			<select id="display_columns" name="display_columns[]" size="10" multiple="multiple">
			</td>
			<td valign="top">
			<?php 
			$control_type="side";
			if ($control_type == '4corner') { ?>
				<table>
				<tr><td rowspan=2 valign=middle>
				<a onclick="javascript:right_to_left();"><?php echo SugarThemeRegistry::current()->getImage('leftarrow', 'border="0" ', null, null, ".gif", $mod_strings['LBL_LEFT']); ?></a>
				</td>
				<td rowspan=2 valign=middle>
				<a onclick="javascript:left_to_right();"><?php echo SugarThemeRegistry::current()->getImage("rightarrow", "", null, null, ".gif", $mod_strings['LBL_RIGHT']); ?></a>
				</tr>
				<tr>
				<td>
				<a onclick="javascript:down('display_columns');"><?php echo SugarThemeRegistry::current()->getImage("downarrow", "", null, null, ".gif", $mod_strings['LBL_DOWN']); ?></a></td>
				</tr>
				</table> 
			<?php } else if ($control_type == 'side') { ?>
				<table>

				<tr><td align=left colspan=2> 
				<a onclick="javascript:up('display_columns');"><?php echo SugarThemeRegistry::current()->getImage("uparrow", "border='0'", null, null, ".gif", $mod_strings['LBL_UP']); ?></a>
				</td></tr> 
				<tr> <td align=left colspan=2>
				<a onclick="javascript:down('display_columns');"><?php echo SugarThemeRegistry::current()->getImage("downarrow", "", null, null, ".gif", $mod_strings['LBL_DOWN']); ?></a>
				</td> </tr> 

				<tr><td colspan=2>&nbsp;</td></tr>

				<tr> 
				<td>
				<a onclick="javascript:right_to_left();"><?php echo SugarThemeRegistry::current()->getImage('leftarrow', 'border="0" ', null, null, ".gif", $mod_strings['LBL_LEFT']); ?></a>
				</td>
				<td>
				<a onclick="javascript:left_to_right();"><?php echo SugarThemeRegistry::current()->getImage("rightarrow", 'border="0"', null, null, ".gif", $mod_strings['LBL_RIGHT']); ?></a>
				</td>
				</tr>
				</table> 
			<?php } ?>
			</td>
		</tr>
		</table>
	</td>
	<td>
		<table>
		<tr>
			<td>
<select id="hidden_columns" name="hidden_columns[]" size="10" multiple="multiple"/>
			</td>
		</tr>
		</table>
	</td>
</tr>
</table>
<script>
var count = 0;


function deleteFilter()
{
	var this_row = this.parentNode.parentNode;
	this_row.parentNode.removeChild(this_row);
}

function columnSelectChanged()
{
	refreshFilterQualify(this);
	refreshFilterInput(this);
}
function refreshFilterQualify(obj)
{
	var old_filter = getFilterQualify(obj.parentNode.parentNode);
	var qualify_cell = old_filter.parentNode;
	qualify_cell.removeChild(old_filter);
	var new_filter = addFilterQualify(qualify_cell);
}

function filterTypeChanged()
{
	refreshFilterInput(this);
}
function refreshFilterInput(obj)
{
	var old_input = getFilterInput(obj.parentNode.parentNode)
	// save data from the first input type=text node
	var type = "input";
	var input_elem = old_input.getElementsByTagName("input")[0];

	if (input_elem == undefined)
	{
		input_elem = old_input.getElementsByTagName("select")[0];
		type = "select";
	}

	var input_cell = old_input.parentNode;
	input_cell.removeChild(old_input);
	var new_input = addFilterInput(input_cell,input_elem.value,"");

	// if old input and new input are both input type=text
	// copy the values
	if (type == "input" && new_input.selectedIndex == undefined)
	{
		new_input.value = input_elem.value;
	}
}

function addColumnSelectFilter(cell)
{
	var new_select = document.createElement("select");
	new_select.name="filter"+ count;
	new_select.onchange= columnSelectChanged;

	for(field in module_defs[current_module].field_defs)
	{
			new_select.options[new_select.options.length] = 
				new Option(
				module_defs[current_module].field_defs[field].vname,
				module_defs[current_module].field_defs[field].name);
	}

        cell.appendChild(new_select);

	return new_select;

}


var filter_defs = new Object();
var qualifiers =  new Array();
qualifiers[qualifiers.length] = {name:'equals',value:'Equals'};
qualifiers[qualifiers.length] = {name:'contains',value:'Contains'};
qualifiers[qualifiers.length] = {name:'starts_with',value:'Starts With'};
qualifiers[qualifiers.length] = {name:'ends_with',value:'Ends With'};
qualifiers[qualifiers.length] = {name:'not_equals_str',value:'Does Not Equal'};
filter_defs['varchar'] = qualifiers;

var qualifiers =  new Array();
qualifiers[qualifiers.length] = {name:'on',value:'On'};
qualifiers[qualifiers.length] = {name:'before',value:'Before'};
qualifiers[qualifiers.length] = {name:'after',value:'After'};
qualifiers[qualifiers.length] = {name:'between_dates',value:'Is Between'};
qualifiers[qualifiers.length] = {name:'not_equals_str',value:'Not On'};
filter_defs['date'] = qualifiers;

var qualifiers =  new Array();
qualifiers[qualifiers.length] = {name:'equals',value:'Equals'};
qualifiers[qualifiers.length] = {name:'less',value:'Less Than'};
qualifiers[qualifiers.length] = {name:'greater',value:'Greater Than'};
qualifiers[qualifiers.length] = {name:'between',value:'Is Between'};
qualifiers[qualifiers.length] = {name:'not_equals',value:'Does Not Equal'};
filter_defs['int'] = qualifiers;

var qualifiers =  new Array();
qualifiers[qualifiers.length] = {name:'is',value:'Is'};
qualifiers[qualifiers.length] = {name:'one_of',value:'One Of'};
filter_defs['enum'] = qualifiers;

var qualifiers =  new Array();
qualifiers[qualifiers.length] = {name:'is',value:'Is'};
qualifiers[qualifiers.length] = {name:'one_of',value:'One Of'};
filter_defs['assigned_user_name'] = qualifiers;

var qualifiers =  new Array();
qualifiers[qualifiers.length] = {name:'is',value:'Is'};
filter_defs['relate'] = qualifiers;

function addFilterInput(cell,default0,default1)
{
	var qualify_select = getFilterQualify(cell.parentNode)

	var qualifier_name = qualify_select.options[qualify_select.selectedIndex].value;
	var column_select = getColumnSelect(cell.parentNode);
	var column_name = column_select.options[column_select.selectedIndex].value;
	var field = module_defs[current_module].field_defs[column_name];	

	var count = 0;

	//cell.innerHTML = "<td><table><tr></tr></table></td>";
	cell.innerHTML = "<table><tr></tr></table>";
	var row = cell.getElementsByTagName("tr")[0];

	if (qualifier_name == 'between' || qualifier_name == 'between_dates')
	{
		addFilterInputTextBetween(row,default0,default1);
	} 
	else if (field.type == 'relate')
	{
		addFilterInputRelate(row,field.module,default0);
	} 
	else if (field.type == 'enum')
	{
		if (qualifier_name == 'one_of')
		{
			addFilterInputSelectMultiple(row,field.options,'');
		}
		else
		{
			addFilterInputSelectSingle(row,field.options,'');
		}
	}
	else
	{
		addFilterInputText(row,default0);
	}

	return row;


}

function addFilterInputText(row,default0)
{
	
	var cell = document.createElement("td");
	var new_input = document.createElement("input");
	new_input.type="text";
	new_input.value=default0;
	new_input.name="text_input";
	new_input.size="30";
	new_input.maxsize="255";
	new_input.visible="true";
        cell.appendChild(new_input);
        row.appendChild(cell);
}

function addFilterInputSelectMultiple(row,options,default0)
{

        var cell = document.createElement('td');
        row.appendChild(cell);

	var new_select = document.createElement("select");
	new_select.multiple = true;
	new_select.size = 3;

	for(i=0;i < options.length;i++)
	{
			new_select.options[new_select.options.length] = 
				new Option( options[i],options[i]);
	}

        cell.appendChild(new_select);

}

function addFilterInputSelectSingle(row,options,default0)
{

        var cell = document.createElement('td');
        row.appendChild(cell);

	var new_select = document.createElement("select");

	for(i=0;i < options.length;i++)
	{
			new_select.options[new_select.options.length] = 
				new Option( options[i],options[i]);
	}

        cell.appendChild(new_select);
}


function addFilterInputTextBetween(row,default0,default1)
{
	

        var cell = document.createElement('td');
	var new_input = document.createElement("input");
	new_input.type="text";
	new_input.value=default0;
        cell.appendChild(new_input);
        row.appendChild(cell);
	
        var cell = document.createElement('td');
	var new_text = document.createTextNode("and");
        cell.appendChild(new_text);
        row.appendChild(cell);

        var cell = document.createElement('td');
	var new_input = document.createElement("input");
	new_input.type="text";
	new_input.value=default1;
        cell.appendChild(new_input);
        row.appendChild(cell);
}


var current_parent = '';
var current_parent_id = '';

function set_current_parent(name,value)
{
	current_parent.value = name;
	current_parent_id.value = value;
}

function button_change_onclick()
{

	current_parent = this.parentNode.parentNode.firstChild.childNodes[0];
	current_parent_id = this.parentNode.parentNode.firstChild.childNodes[1];
	return window.open("index.php?module="+this.name+"&action=Popup&form=Reports&form_submit=false","test","width=600,height=400,resizable=1,scrollbars=1");
}

function addFilterInputRelate(row,module_name,default0)
{
        var cell = document.createElement('td');
	//cell.innerHTML = "<input type=\"text\" readonly name=\"account_name1\" value=\"\"/> <input type=\"hidden\" name=\"account_id2\" value=\"\"/>";
	var new_input = document.createElement("input");
	new_input.setAttribute("type","text"); 
	new_input.setAttribute("readonly","true"); 
	new_input.setAttribute("name","account_name"); 
	new_input.setAttribute("value",""); 
        cell.appendChild(new_input);

	var new_input = document.createElement("input");
	new_input.setAttribute('type','hidden');
	new_input.setAttribute("name","account_id"); 
	new_input.setAttribute("value",""); 
        cell.appendChild(new_input);

        row.appendChild(cell);


        var cell = document.createElement('td');
	var new_input = document.createElement("input");
	new_input.title="Change";
	new_input.type="button";
	new_input.value='Change'; 
	new_input.name=module_name;
	new_input.onclick=button_change_onclick;
        cell.appendChild(new_input);
        row.appendChild(cell);

}

function getColumnSelect(row)
{
	return row.childNodes[0].firstChild;
	
}

function getFilterQualify(row)
{

	return row.childNodes[1].firstChild;
}

function getFilterInput(row)
{
	// actually returns the table within the cell, not the input 
	return row.childNodes[2].firstChild;
}

function addFilterQualify(cell)
{

	column_select = getColumnSelect(cell.parentNode);
	column_name = column_select.options[column_select.selectedIndex].value;

	field = module_defs[current_module].field_defs[column_name];	

	var new_select = document.createElement("select");
	new_select.onchange= filterTypeChanged;

	var qualifiers = filter_defs[field.type];
	for(i=0;i < qualifiers.length; i++)
	{
		new_select.options[new_select.options.length] = 
			new Option(qualifiers[i].value,qualifiers[i].name);
	}

        cell.appendChild(new_select);

	return new_select;

}



function addFilter()
{


        var the_table = document.getElementById('filters');
        var row = document.createElement('tr');
	row.valign="top";

        var cell = document.createElement('td');
	cell.valign="top";
	row.appendChild(cell);
	var new_select = addColumnSelectFilter(cell);

        var cell = document.createElement('td');
	cell.valign="top";
	row.appendChild(cell);
	var new_filter = addFilterQualify(cell);

        var cell = document.createElement('td');
	cell.valign="top";
	row.appendChild(cell);
	var new_input = addFilterInput(cell,"","");

        var cell = document.createElement('td');
	cell.valign="top";
	row.appendChild(cell);
	var new_button = document.createElement("input");
	new_button.onclick= deleteFilter;
	new_button.type= "button";
//	new_button.style.class= "button";
	new_button.value= "Remove";

        cell.appendChild(new_button);

	the_table.appendChild(row);

        count++;
}

function deleteAllFilters()
{
	count = 0;
        var the_table = document.getElementById('filters');
	var rows = the_table.rows;
	for (i=rows.length - 1; i >= 0;i--)
	{
		the_table.removeChild(rows[i]);
	}
	return;
}

</script>

<script language="javascript">

var visible_fields = ["<?php echo implode("\",\"",$table_columns);?>"];
var hidden_fields = ["<?php echo implode("\",\"",$hidden_columns);?>"];


document.EditView.onsubmit = fill_form;
function fill_form()
{
	for(i=0; i < document.EditView.display_columns.options.length ;i++) 
	{
		document.EditView.display_columns.options[i].selected=true;
	}

        var filter_table = document.getElementById('filters');

	var filters_def = '';
        for(i=0; i < filter_table.rows.length;i++)
	{
        	var cell0 = filter_table.rows[i].cells[0];
        	var cell1 = filter_table.rows[i].cells[1];
        	var cell2 = filter_table.rows[i].cells[2];
	
        	filters_def += 'column_name'+i+"="+cell0.getElementsByTagName('select')[0].value+"&";
        	filters_def += 'qualifier_name'+i+"="+cell1.getElementsByTagName('select')[0].value+"&";
        	var input_arr = cell2.getElementsByTagName('input');
		if ( input_arr[0] !=  undefined)
		{
       	 		filters_def += 'input_name'+i+"_0="+input_arr[0].value+"&";
	
			if ( input_arr[1] != undefined)
			{
        			filters_def += 'input_name'+i+"_1="+input_arr[1].value+"&";
			}
		} 
		else
		{
        		var select_input = cell2.getElementsByTagName('select')[0];
			for (j=0;j<select_input.options.length;j++)
			{
       	 			if (select_input.options[j].selected == true)
				{
       	 				filters_def += 'input_name'+i+"_0[]="+select_input.options[j].value+"&";
				}
			}
	
		}
	}
	alert(filters_def);
	document.EditView.filters_def.value = filters_def;
	
}


function load_page()
{
	reload_columns();
	reload_filters();
}

function reload_filters()
{
	for(field_name in previous_filters)
	{
		addFilter(previous_filters[field_name]);
	}	

}

function reload_joins()
{
	var joins_table = document.getElementById('joins_table'); 

	// remove rows
	var rows = joins_table.rows;
alert(rows.length);
	for (i=rows.length - 1; i >= 0;i--)
	{
	alert("ERMOVE");
		joins_table.removeChild(rows[i]);
	}

	// add new rows
	for (i=0;i < module_defs[current_module].joins.length;i++)
	{
		var tr = document.createElement('tr');
		joins_table.appendChild(tr);
		var td = document.createElement('td');
		tr.appendChild(td);
		var name = document.createTextNode( module_defs[current_module].joins[i]);
		td.appendChild(name);
	}
}

function reload_columns()
{
	document.EditView.display_columns.options.length = 0;
	document.EditView.hidden_columns.options.length = 0;
	for(i=0; i < visible_fields.length ;i++) 
	{

		var field = module_defs[current_module].field_defs[visible_fields[i]];
		document.EditView.display_columns.options[document.EditView.display_columns.options.length] = new Option(field['vname'],field['name']);
	}

	for(i=0; i < hidden_fields.length ;i++) 
	{
		var field = module_defs[current_module].field_defs[hidden_fields[i]];
		
		document.EditView.hidden_columns.options[document.EditView.hidden_columns.options.length] = new Option(field['vname'],field['name']);
	}


}

document.EditView.onload = load_page();

</script>


<?php
}


////////////////////////////////////////////// 
// TEMPLATE:
////////////////////////////////////////////// 
function template_reports_controls(&$args)
{
$reporter = $args['reporter'];
?>
<script type="text/javascript" language="JavaScript">
<!-- Begin
function clear_form(form) 
{
	for (j = 0; j < form.elements.length; j++) {
		if (form.elements[j].type == 'text' || form.elements[j].type == 'select-one') 
		{
			form.elements[j].value = '';
		} 
		else if (form.elements[j].type == 'hidden' && form.elements[j].name != 'action' && form.elements[j].name != 'module') 
		{
			form.elements[j].value = '';
		} 
		else if ( form.elements[j].type == 'select-multiple')
		{
			for (k = 0; k < form.elements[j].options.length; k++) 
			{
				form.elements[j].options[k].selected = false;
			}
			
		}
	}
}
//  End -->
</script>
<form action="index.php" name="EditView">
<input type="hidden" name="action" value="index">
<input type="hidden" name="module" value="Reports">
<input type="hidden" name="report_module" value="<?php echo $reporter->module; ?>">

<table>
<tr>
<td valign="top">
<b>Columns:</b>
<br>
<?php 
//template_columns($args); 
?>
</td>
<td valign="top">
<b>Filter By:</b>
<br>
<?php template_search_params($args); ?>
</td>
</tr>
</table>
<input title="Filter" class="button" type="submit" name="button" value="   Filter   "/>
<input title="Clear" onclick="clear_form(this.form);" class="button" type="button" name="clear" value=" Clear All "/>
		
</form>

<?php
}

////////////////////////////////////////////// 
// TEMPLATE:
////////////////////////////////////////////// 
function template_columns_javascript(&$args)
{
?>
<script language="javascript">
function left_to_right() 
{

	var new_display_array = new Array();

	for (i=0; i < document.EditView.display_columns.options.length; i++)
	{
		if (document.EditView.display_columns.options[i].selected == true) 
		{
			document.EditView.hidden_columns.options[document.EditView.hidden_columns.options.length] = new Option( document.EditView.display_columns.options[i].text, document.EditView.display_columns.options[i].value);
		}
		else
		{
			new_display_array[new_display_array.length] = new Option( document.EditView.display_columns.options[i].text, document.EditView.display_columns.options[i].value);
		}
		
	}

	document.EditView.display_columns.options.length  = 0;

	for (i=0; i < new_display_array.length; i++)
	{
		document.EditView.display_columns.options[document.EditView.display_columns.options.length] = new_display_array[i];
	}
}

function right_to_left() 
{
	var new_hidden_array = new Array();

	for (i=0; i < document.EditView.hidden_columns.options.length; i++)
	{
		if (document.EditView.hidden_columns.options[i].selected == true) 
		{
			document.EditView.display_columns.options[document.EditView.display_columns.options.length] = new Option( document.EditView.hidden_columns.options[i].text, document.EditView.hidden_columns.options[i].value);
		}
		else
		{
			new_hidden_array[new_hidden_array.length] = new Option( document.EditView.hidden_columns.options[i].text, document.EditView.hidden_columns.options[i].value);
		}
		
	}

	document.EditView.hidden_columns.options.length  = 0;

	for (i=0; i < new_hidden_array.length; i++)
	{
		document.EditView.hidden_columns.options[document.EditView.hidden_columns.options.length] = new_hidden_array[i];
	}
}


function up(obj) {
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
			var tmp = new Array(obj[sel[i]-1].text, obj[sel[i]-1].value);
			obj[sel[i]-1].text = obj[sel[i]].text;
			obj[sel[i]-1].value = obj[sel[i]].value;
			obj[sel[i]].text = tmp[0];
			obj[sel[i]].value = tmp[1];
			obj[sel[i]-1].selected = true;
			obj[sel[i]].selected = false;
		}
	}
}


function down(obj) {
	obj = (typeof obj == "string") ? document.getElementById(obj) : obj;
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
			var tmp = new Array(obj[sel[i]+1].text, obj[sel[i]+1].value);
			obj[sel[i]+1].text = obj[sel[i]].text;
			obj[sel[i]+1].value = obj[sel[i]].value;
			obj[sel[i]].text = tmp[0];
			obj[sel[i]].value = tmp[1];
			obj[sel[i]+1].selected = true;
			obj[sel[i]].selected = false;
		}
	}
}

</script>
<?php
}


////////////////////////////////////////////// 
// TEMPLATE:
////////////////////////////////////////////// 
function template_field_name(&$field)
{

echo $field['vname'];

}

////////////////////////////////////////////// 
// TEMPLATE:
////////////////////////////////////////////// 
function template_form(&$field)
{
	if ($field['type'] == 'varchar')
	{
		template_form_varchar($field);
	}
	else if ($field['type'] == 'id')
	{
		template_form_id($field);
	}
	else if ($field['type'] == 'date')
	{
		template_form_date($field);
	}
	else if ($field['type'] == 'datetimecombo')
	{
		template_form_datetimecombo($field);
	}
	else if ($field['type'] == 'enum')
	{
		template_form_enum($field);
	}
	else if ($field['type'] == 'assigned_user_name')
	{
		template_form_assigned_user_name($field);
	}
	else if ($field['type'] == 'foreign_id')
	{
		template_form_foreign_id($field);
	}
	else if ($field['type'] == 'phone')
	{
		template_form_phone($field);
	}
	else if ($field['type'] == 'relate')
	{
		template_form_relate($field);
	}
	else if ($field['type'] == 'bool')
	{
		template_form_bool($field);
	}
	else if ($field['type'] == 'email')
	{
		template_form_email($field);
	}
	else if ($field['type'] == 'yim')
	{
		template_form_yim($field);
	}
}

////////////////////////////////////////////// 
// TEMPLATE:
////////////////////////////////////////////// 
function template_form_varchar(&$field)
{
	$val = '';

	if ( isset($_REQUEST[$field['name']]) && $_REQUEST[$field['name']] != '')
	{
		$val = $_REQUEST[$field['name']];
	}
?>
<input name="<?php echo $field['name'];?>" type="text" length="<?php echo $field['len']; ?>" value="<?php echo $val; ?>">
<?php
}


////////////////////////////////////////////// 
// TEMPLATE:
////////////////////////////////////////////// 
function template_form_id(&$field)
{
	$val = '';

	if ( isset($_REQUEST[$field['name']]) && $_REQUEST[$field['name']] != '')
	{
		$val = $_REQUEST[$field['name']];
	}
?>
<input name="<?php echo $field['name'];?>" type="text" length="<?php echo $field['len']; ?>" value="<?php echo $val; ?>">
<?php
}


////////////////////////////////////////////// 
// TEMPLATE:
////////////////////////////////////////////// 
function template_form_date(&$field)
{
	$val = '';

	if ( isset($_REQUEST[$field['name']]) && $_REQUEST[$field['name']] != '')
	{
		$val = $_REQUEST[$field['name']];
	}
?>
<input name="<?php echo $field['name'];?>" type="text" length="<?php echo $field['len']; ?>" value="<?php echo $val; ?>">
<?php
}

////////////////////////////////////////////// 
// TEMPLATE:
////////////////////////////////////////////// 
function template_form_datetimecombo(&$field)
{
	$val = '';

	if ( isset($_REQUEST[$field['name']]) && $_REQUEST[$field['name']] != '')
	{
		$val = $_REQUEST[$field['name']];
	}
?>
<input name="<?php echo $field['name'];?>" type="text" length="<?php echo $field['len']; ?>" value="<?php echo $val; ?>">
<?php
}

////////////////////////////////////////////// 
// TEMPLATE:
////////////////////////////////////////////// 
function template_form_enum(&$field)
{
	$selected = array();
	$val = '';

	if ( isset($_REQUEST[$field['name']]) && $_REQUEST[$field['name']] != '')
	{
		foreach ($_REQUEST[$field['name']] as $optionname)
		{
			$selected[$optionname] = " SELECTED";
		}
	}
?>
<select name="<?php echo $field['name'];?>[]" size="3" multiple="multiple">
<option value="-- none --">-- none --</option>
<?php foreach ($field['options'] as $option) 
{
?>
<option value="<?php echo $option; ?>" <?php if ( isset($selected[$option])) echo $selected[$option]; ?>><?php echo $option; ?></option>
<?php
} 
?>
</select>
<?php
}

////////////////////////////////////////////// 
// TEMPLATE:
////////////////////////////////////////////// 
function template_form_foreign_id(&$field)
{

}

////////////////////////////////////////////// 
// TEMPLATE:
////////////////////////////////////////////// 
function template_form_assigned_user_name(&$field)
{
	$user_array = get_user_array(FALSE);

	$selected = array();
	$val = '';

	if ( isset($_REQUEST[$field['id_name']]) && $_REQUEST[$field['id_name']] != '')
	{
		foreach ($_REQUEST[$field['id_name']] as $optionname)
		{
			$selected[$optionname] = " SELECTED";
		}
	}
?>
<select name="<?php echo $field['id_name'];?>[]" size="3" multiple="multiple">
<?php foreach ($user_array as $user_id=>$user_name) 
{
?>
<option value="<?php echo $user_id; ?>" <?php if ( isset($selected[$user_id])) echo $selected[$user_id]; ?>><?php echo $user_name; ?></option>
<?php
} 
?>
</select>

<?php
}


////////////////////////////////////////////// 
// TEMPLATE:
////////////////////////////////////////////// 
function template_form_phone(&$field)
{
	$val = '';

	if ( isset($_REQUEST[$field['name']]) && $_REQUEST[$field['name']] != '')
	{
		$val = $_REQUEST[$field['name']];
	}
?>
<input name="<?php echo $field['name'];?>" type="text" length="<?php echo $field['len']; ?>" value="<?php echo $val; ?>">
<?php
}


////////////////////////////////////////////// 
// TEMPLATE:
////////////////////////////////////////////// 
function template_form_relate(&$field)
{

$name = '';
$id_name = '';

if ( isset( $_REQUEST[$field['name']]))
{
	$name = $_REQUEST[$field['name']];
}

if ( isset( $_REQUEST[$field['id_name']]))
{
	$id_name = $_REQUEST[$field['id_name']];
}

?>
<script type="text/javascript" language="JavaScript">
<!-- Begin
function clear_form_names(form,name0,name1) 
{
	for (j = 0; j < form.elements.length; j++) 
	{
		if (form.elements[j].name == name0 || form.elements[j].name == name1) 
		{
			form.elements[j].value = '';
		} 
	}
}
//  End -->
</script>
<input readonly name='<?php echo $field['name']; ?>' type="text" value="<?php echo $name; ?>"><input name='<?php echo $field['id_name']; ?>' type="hidden" value='<?php echo $id_name; ?>'>&nbsp;<input title="Change"  type="button" tabindex='1' class="button" value='Change' name=btn1 LANGUAGE=javascript onclick='return window.open("index.php?module=<?php echo $field['module']; ?>&action=Popup&form=EditView&form_submit=false","test","width=600,height=400,resizable=1,scrollbars=1");'>
<input title="Clear" onclick="clear_form_names(this.form,'<?php echo $field['id_name']; ?>','<?php echo $field['name']; ?>');" class="button" type="button" name="clear" value=" Clear "/>

<?php
}


////////////////////////////////////////////// 
// TEMPLATE:
////////////////////////////////////////////// 
function template_form_bool(&$field)
{
	$checked = '';

	if ( isset($_REQUEST[$field['name']]) && $_REQUEST[$field['name']] == 'on')
	{
		$checked = ' CHECKED';
	}
?>
<input name="<?php echo $field['name'];?>" type="checkbox" <?php echo $checked; ?>>
<?php
}


////////////////////////////////////////////// 
// TEMPLATE:
////////////////////////////////////////////// 
function template_form_email(&$field)
{
	$val = '';

	if ( isset($_REQUEST[$field['name']]) && $_REQUEST[$field['name']] != '')
	{
		$val = $_REQUEST[$field['name']];
	}
?>
<input name="<?php echo $field['name'];?>" type="text" length="<?php echo $field['len']; ?>" value="<?php echo $val; ?>">
<?php
}


////////////////////////////////////////////// 
// TEMPLATE:
////////////////////////////////////////////// 
function template_form_yim(&$field)
{
	$val = '';

	if ( isset($_REQUEST[$field['name']]) && $_REQUEST[$field['name']] != '')
	{
		$val = $_REQUEST[$field['name']];
	}
?>
<input name="<?php echo $field['name'];?>" type="text" length="<?php echo $field['len']; ?>" value="<?php echo $val; ?>">
<?php
}


////////////////////////////////////////////// 
// TEMPLATE:
////////////////////////////////////////////// 
function template_search_params(&$args)
{
$reporter = $args['reporter'];
$field_defs = $reporter->focus->field_defs;
?>
<table cellpadding="0" cellspacing="0" border="1">
<?php 
foreach ($field_defs as $field)
{
?>
<tr>
<td>
<?php template_field_name($field); ?>
</td>
<td>
<?php template_form($field); ?>
</td>
</tr>
<?php
}
?>
</table>

<?php
}


////////////////////////////////////////////// 
// TEMPLATE:
////////////////////////////////////////////// 
function template_list_view(&$args)
{

 $reporter = $args['reporter'];
 $reporter->run_query();

 $header_row = $reporter->get_header_row(); 
 $colspan = (count($header_row) * 2) + 1;
?>
<table cellpadding="0" cellspacing="0" width="100%" border="1">

	<tr height="20">
        <td COLSPAN="<?php echo $colspan; ?>" class="listViewThLinkS1">
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td><?php echo $args['upper_left']; ?></td>
			<td align="right"><?php echo $args['list_nav']; ?></td>
		</tr>
		</table>
	</td>
        </tr>
        <tr>
		<td COLSPAN="<?php echo $colspan; ?>" class="blackLine"><IMG SRC="<?php echo $args['IMAGE_PATH']; ?>blank.gif"></td>
	</tr>
	<tr height="20" >
<?php 


foreach ($header_row as $header_cell) 
{ 
?>
       		<td WIDTH="1" class="blackLine"><IMG SRC="<?php echo $args['IMAGE_PATH']; ?>blank.gif"></td>
                <td align='center' ><?php echo $header_cell; ?></td>
<?php 
} 
?>
		<td WIDTH="1" class="blackLine"><IMG SRC="<?php echo $args['IMAGE_PATH']; ?>blank.gif">
	</tr>
	<tr>
		<td COLSPAN="<?php echo $colspan; ?>" class="blackLine"><IMG SRC="<?php echo $args['IMAGE_PATH']; ?>blank.gif"></td>
	</tr>
<?php 
$oddRow = true;
while (( $row = $reporter->get_next_row() ) != 0 ) 
{ 
	if($oddRow)
	{
		$row_color = 'oddListRow';
	} else
	{
		$row_color = 'evenListRow';
	}
	$oddRow = !$oddRow;
?>
	<tr height=20 class="<?php echo $row_color; ?>">
	<?php foreach ($row as $cell) { ?>
		<td WIDTH="1" class="blackLine"><IMG SRC="<?php echo $args['IMAGE_PATH']; ?>blank.gif"></td>
		<td valign=TOP class="{ROW_COLOR}S1" bgcolor="{BG_COLOR}" ><?php echo  $cell; ?></td>
	<?php } ?>
        	<td WIDTH="1" class="blackLine"><IMG SRC="<?php echo $args['IMAGE_PATH']; ?>blank.gif"></td>
	</tr>
<?php } ?>
	<tr><td COLSPAN="<?php echo $colspan; ?>" class="blackLine"><IMG SRC="<?php echo $args['IMAGE_PATH']; ?>blank.gif"></td></tr>
</table>
<?php

} 


?>
