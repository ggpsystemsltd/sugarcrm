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

require_once('modules/Reports/config.php');

//////////////////////////////////////////////
// TEMPLATE:
// THIS TEMPLATE IS NOW USED TO CREATE A JAVASCRIPT CACHED FILE
// THE FILE IS LOCATED IN cache/modules/modules_def_<lang>_<md5>.js
//////////////////////////////////////////////
function template_module_defs_js(&$args) {
global $report_modules,$current_language;
$mod_strings = return_module_language($current_language,'Reports');
$currentModule = 'Reports';

$global_json = getJSONobj();
global $ACLAllowedModules; 
$ACLAllowedModules = getACLAllowedModules();
echo 'ACLAllowedModules = ' . $global_json->encode(array_keys($ACLAllowedModules)) .";\n"; 

?>
var module_defs = new Object();
default_summary_columns = ['count'];
<?php

// build table datastructure in javascript objs
global $mod_strings;
global $current_language;
global $app_list_strings;
global $currentModule;

$relationships = array();
foreach($report_modules as $module_name=>$bean_name)
{	
	if($module_name=='Reports')
	{
		continue;
	}
	global $beanFiles;
	if(empty($beanFiles)) {
		include('include/modules.php');
	}

	//we need singular name here;
	$bean_name = get_singular_bean_name($bean_name);
	require_once($beanFiles[$bean_name]);
	$module = new $bean_name;
  	$mod_strings = return_module_language($current_language,$module_name);
	$currentModule = $module_name;

?>

var rel_defs = new Object();
var link_defs_<?php echo $module_name; ?> = new Object();
<?php
    $linked_fields = $module->get_linked_fields();

    foreach($linked_fields as $linked_field)
    {
		$module->load_relationship($linked_field['name']);
		$field = $linked_field['name'];
		if(empty($module->$field) || (isset($linked_field['reportable']) &&
	           $linked_field['reportable'] == false))
	    {
	       continue;
	    }	
		if(empty($relationships[$linked_field['relationship']]))
		{
			$relationships[$linked_field['relationship']] = $module->$field->relationship;
		}
	
		if(! empty($linked_field['vname']))
		{
			$linked_field['label'] =translate($linked_field['vname']);
		} else {
			$linked_field['label'] =$linked_field['name'];
		}
	  	$linked_field['label'] = preg_replace('/:$/','',$linked_field['label']);
		$linked_field['label'] = addslashes($linked_field['label']);

        echo "link_defs_{$module_name}[ '{$linked_field['name']}' ] = " . json_encode(array(
            'name' => $linked_field['name'],
            'relationship_name' => $linked_field['relationship'],
            'bean_is_lhs' => $module->$field->getSide() == REL_LHS,
            'link_type' => $module->$field->getType(),
            'label' => $linked_field['label'],
            'module' => $module->$field->getRelatedModuleName()
        )) . ";\n";
    }
?>
var field_defs_<?php echo $module_name; ?> = new Object();
<?php

		if(is_array($module->field_defs)) {
			ACLField::listFilter($module->field_defs, $module->module_dir, $GLOBALS['current_user']->id, true);
		    
			if($module->object_name == 'Team' && ACLField::hasAccess('team_set_id', $module->module_dir, $GLOBALS['current_user']->id, true)) {
		       $module->field_defs['team_set_id'] = array('name'=>'team_set_id', 'type'=>'team_set_id', 'vname' => 'LBL_TEAMS', 'rname'=>'id', 'dbType'=>'id', 'id_name'=>'team_set_id');	
			}
			ksort($module->field_defs);
		    
		    if(isset($module->field_defs['team_set_id'])) {
		       $module->field_defs['team_set_id']['type'] = 'team_set_id';	
		    }
		    
			foreach($module->field_defs as $field_def)
			{
				//if (ACLField::hasAccess($field_def, $module, $GLOBALS['current_user']->id,))
				//$field, $category,$user_id, $is_owner
		
			    if(isset($field_def['reportable']) &&
			           $field_def['reportable'] == false)
			    {
			       continue;
			    }
			
			    if(isset($field_def['source']) &&
			           ($field_def['source'] == 'non-db' && empty($field_def['ext2'])) && $field_def['name'] != 'full_name')
			    {
			       continue;
			    }
			
			    if($field_def['type'] == 'relate' && ! empty($field_def['custom_type']))
					{
						$field_def['type'] = $field_def['custom_type'];
					}
			
			    if(($field_def['type'] == 'relate' && empty($field_def['ext2'])) || $field_def['type'] == 'assigned_user_name' || $field_def['type'] == 'foreign_key')
			    {
			       continue;
			    }
			    
			    if ($field_def['type'] == 'encrypt')
			    {
			    	continue;
			    }
    
?>
field_defs_<?php echo $module_name; ?>[ "<?php echo $field_def['name']; ?>"] = <?php

				$js_defs_array = array();
		
				foreach($field_def as $field_name=>$field_value)
				{
					if(empty($field_name) || empty($field_value) || $field_name  == 'comment'
						|| $field_name == "formula" || $field_name == "dependency" || $field_name == "visibility_grid")
					{
						continue;
					}
					if($field_name != "options" || $field_name != "name")
					{
						if($field_name == "vname")
						{
							$field_value = translate($field_value);
							if(preg_match('/:$/',$field_value))
			                                {
								$field_value = substr($field_value,0,-1);
							}
							$field_value = addslashes($field_value);
						}
						else if ($field_name == 'comments' || $field_name == 'help') {
							$field_value = addslashes($field_value);
						}
						
						if ($field_name != 'default' && $field_name != 'default_value') {
						    array_push($js_defs_array,
								"\"$field_name\":\"$field_value\"");
						}
					}
				}

		
			    if($field_def['name'] == 'team_set_id' && $module_name != 'Teams')
		    	{
		      	    array_push($js_defs_array, "invisible:true");
		   	 	}		
				
				echo "{".implode(",",$js_defs_array)."};";
		
				if(isset($field_def['options']))
				{
?>
var option_arr_<?php echo $module_name; ?> = new Array();

<?php
					$options_array = array();
			      	$trans_options = translate($field_def['options']);
			
					if(! is_array($trans_options))
				    {
				        $trans_options = array();
				    }
			
					foreach($trans_options as $option_value=>$option_text)
					{
						$option_text = translate($option_text);

// BEGIN HALF-FIX
				        if(is_array($option_text))
				        {
				          $option_text = 'Array';
				        }
				        $option_text = html_entity_decode($option_text,ENT_QUOTES);
				        $option_text = addslashes($option_text);
				        $option_value = html_entity_decode($option_value,ENT_QUOTES);
				        $option_value = addslashes($option_value);

?>
option_arr_<?php echo $module_name; ?>[option_arr_<?php echo $module_name; ?>.length] = { "value":"<?php echo $option_value; ?>", "text":"<?php echo $option_text; ?>"};
<?php
// END HALF-FIX			            
					}
?>

field_defs_<?php echo $module_name; ?>[ "<?php echo $field_def['name']; ?>"].options=option_arr_<?php echo $module_name; ?>;

<?php
				} else if(isset($field_def['type']) && $field_def['type'] == 'enum' && isset($field_def['function']))
				{
?>
					var option_arr_<?php echo $module_name; ?> = new Array();
	
<?php
			        $options_array = array();
			        $options_array = $field_def['function']();	    
	
			        foreach($options_array as $option_value=>$option_text)          
			        {
			            $option_text = html_entity_decode($option_text,ENT_QUOTES);
			            $option_text = addslashes($option_text);
			            $option_value = html_entity_decode($option_value,ENT_QUOTES);
			            $option_value = addslashes($option_value);
?>
option_arr_<?php echo $module_name; ?>[option_arr_<?php echo $module_name; ?>.length] = { "value":"<?php echo $option_value; ?>", "text":"<?php echo $option_text; ?>"};
<?php
            }
?>
field_defs_<?php echo $module_name; ?>[ "<?php echo $field_def['name']; ?>"].options=option_arr_<?php echo $module_name; ?>;
<?php
			    } else if( isset($field_def['type']) && $field_def['type'] == 'parent_type' && isset($field_def['group']) && isset($module->field_defs[$field_def['group']]) && isset($module->field_defs[$field_def['group']]['options']))
			    {
	    	?>
	    	var option_arr_<?php echo $module_name; ?> = new Array();
	    	<?php
	    	    	$options_array = array();
				  	$trans_options = translate($module->field_defs[$field_def['group']]['options']);
			
			        if(! is_array($trans_options))
			      	{
			        	$trans_options = array();
			      	}
			
		            foreach($trans_options as $option_value=>$option_text)
		            {
		                $option_text = translate($option_text);
					
				        if(is_array($option_text))
				        {
				          $option_text = 'Array';
				        }
				        $option_text = html_entity_decode($option_text,ENT_QUOTES);
				        $option_text = addslashes($option_text);
				        $option_value = html_entity_decode($option_value,ENT_QUOTES);
				        $option_value = addslashes($option_value);
			
				?>
option_arr_<?php echo $module_name; ?>[option_arr_<?php echo $module_name; ?>.length] = { "value":"<?php echo $option_value; ?>", "text":"<?php echo $option_text; ?>"};
				<?php
		            }
				?>
				
field_defs_<?php echo $module_name; ?>[ "<?php echo $field_def['name']; ?>"].options=option_arr_<?php echo $module_name; ?>;
           <?php
				}
			} //End foreach field
		}
//var default_table_columns_<php echo $module_name; > = ["<php echo implode("\",\"",$module->default_table_columns); >"];
?>
var default_table_columns_<?php echo $module_name; ?> = ["<?php echo implode("\",\"",array());?>"];




module_defs['<?php echo $module_name; ?>'] = new Object();
module_defs['<?php echo $module_name; ?>'].link_defs = link_defs_<?php echo $module_name; ?>;
module_defs['<?php echo $module_name; ?>'].field_defs = field_defs_<?php echo $module_name; ?>;
module_defs['<?php echo $module_name; ?>'].default_table_columns = default_table_columns_<?php echo $module_name; ?>;
module_defs['<?php echo $module_name; ?>'].summary_field_defs = new Object();
module_defs['<?php echo $module_name; ?>'].group_by_field_defs = new Object();
module_defs['<?php echo $module_name; ?>'].default_summary_columns = default_summary_columns;
module_defs['<?php echo $module_name; ?>'].label = "<?php echo addslashes(
    isset($app_list_strings['moduleList'][$module_name]) ? $app_list_strings['moduleList'][$module_name] : $module_name);?>";
<?php
	}

	global $beanList;
	foreach($relationships as $relationship_name=>$relationship)
	{
		$rel_defs_array = array();
	
		if(empty($beanList[$relationship->lhs_module]) || empty($beanList[$relationship->rhs_module]))
		{
			continue;
		}
		$lhs_bean_name = $beanList[$relationship->lhs_module];
		$rhs_bean_name = $beanList[$relationship->rhs_module];
		array_push($rel_defs_array, "\"lhs_bean_name\":\"".$lhs_bean_name."\"");
		array_push($rel_defs_array, "\"rhs_bean_name\":\"".$rhs_bean_name."\"");
        
		foreach($relationship->def as $rel_field => $value)
		{
		    if (!is_array($value) && !is_object($value))
                array_push($rel_defs_array, '"' . $rel_field . '":"' . $value . '"');
		}
		$rel_defs = "{".implode(',',$rel_defs_array)."}";
	
		print "rel_defs['". $relationship_name."'] = $rel_defs;\n";
	}

	$mod_strings = return_module_language($current_language,'Reports');
	$currentModule = 'Reports';
	$sum = translate('LBL_SUM');
	$avg = translate('LBL_AVG');
	$max = translate('LBL_MAX');
	$min = translate('LBL_MIN');
	$day = translate('LBL_DAY');
	$month = translate('LBL_MONTH');
	$year = translate('LBL_YEAR');
	$quarter = translate('LBL_QUARTER');
?>
var summary_types = {sum:'<?php echo $sum; ?>',avg:'<?php echo $avg; ?>',max:'<?php echo $max; ?>',min:'<?php echo $min; ?>'};
var date_summary_types = {day:'<?php echo $day; ?>',month:'<?php echo $month; ?>',year:'<?php echo $year; ?>',quarter:'<?php echo $quarter; ?>'};

// create summary_defs_field and group_by_field_defs for every module

for(module_name in module_defs)
{
	module_defs[module_name].summary_field_defs = new Object();
	// default summary column

	//alert(module_defs[module_name].field_defs.length);
	var got_probability = 0;
	var got_first_name = 0;
	var got_last_name = 0;
	var got_amount = 0;

	module_defs[module_name].summary_field_defs['count'] = { name:'count', vname: '<?php echo $GLOBALS['app_strings']['LBL_REPORT_NEWREPORT_COLUMNS_TAB_COUNT']?>',"group_function":"count",summary_type:'group' };

	for(field_name in module_defs[module_name].field_defs)
	{
		var field_def =  module_defs[module_name].field_defs[field_name];
		// allow those of type 'int' for summary info
		var field_type = field_def.type;
        var field_source = (typeof field_def.source == 'undefined') ? '' : field_def.source;

		if(typeof(field_def.custom_type) != 'undefined')
		{
			field_type = field_def.custom_type;
		}

        // do not allow group bys of text fields or fields not from the db
        if(field_type != 'text' && (field_source != 'non-db' || typeof(field_def.ext2) != 'undefined') && field_def.name != 'full_name') {
		      module_defs[module_name].group_by_field_defs[ field_def.name] = field_def;
        }
        
		if(field_type == 'int' || field_type == 'float' || field_type=='currency' || field_type=='decimal')
		{
			// create a new "column" for each summary type
			for(stype in summary_types)
			{

				module_defs[module_name].summary_field_defs[ field_def.name+':'+stype] = { name: field_def.name+':'+stype, field_def_name: field_def.name, vname: summary_types[stype]+': '+ field_def.vname,group_function:stype,summary_type:'group', field_type:field_type};
			}

		}
		else if(field_type == 'date' || field_type == 'datetime' || field_type == 'datetimecombo')
		{

			// create a new "column" for each datetimecombo summary type
			for(stype in date_summary_types)
			{

				module_defs[module_name].group_by_field_defs[field_def.name+':'+stype] = { name: field_def.name+':'+stype, field_def_name: field_def.name, vname: date_summary_types[stype]+': '+ field_def.vname,column_function:stype,summary_type:'column',field_type:field_type };
			}


//			module_defs[module_name].group_by_field_defs[ field_def.name ] = field_def;
		}

		if(field_def.name == 'amount')
		{
			got_amount = 1;
		}

		if(field_def.name == 'probability')
		{
			got_probability = 1;
		}

	}


	if(got_probability == 1 && got_amount == 1)
	{
		module_defs[module_name].summary_field_defs['weighted_amount'] = { name: 'weighted_amount', vname: '<?php echo translate('LBL_WEIGHTED_AVG_AMOUNT'); ?>', group_function: 'weighted_amount' };
		module_defs[module_name].summary_field_defs['weighted_sum'] = { name: 'weighted_sum', vname: '<?php echo translate('LBL_WEIGHTED_SUM_AMOUNT'); ?>', group_function: 'weighted_sum' };
	}
}

var filter_defs = new Object();
var qualifiers =  new Array();
qualifiers[qualifiers.length] = {name:'equals',value:'<?php echo $mod_strings['LBL_EQUALS']; ?>'};
qualifiers[qualifiers.length] = {name:'not_equals_str',value:'<?php echo $mod_strings['LBL_DOES_NOT_EQUAL']; ?>'};
qualifiers[qualifiers.length] = {name:'contains',value:'<?php echo $mod_strings['LBL_CONTAINS']; ?>'};
qualifiers[qualifiers.length] = {name:'does_not_contain',value:'<?php echo $mod_strings['LBL_DOES_NOT_CONTAIN']; ?>'};
qualifiers[qualifiers.length] = {name:'starts_with',value:'<?php echo $mod_strings['LBL_STARTS_WITH']; ?>'};
qualifiers[qualifiers.length] = {name:'ends_with',value:'<?php echo $mod_strings['LBL_ENDS_WITH']; ?>'};
qualifiers[qualifiers.length] = {name:'empty',value:'<?php echo $mod_strings['LBL_IS_EMPTY']; ?>'};
qualifiers[qualifiers.length] = {name:'not_empty',value:'<?php echo $mod_strings['LBL_IS_NOT_EMPTY']; ?>'};
filter_defs['varchar'] = qualifiers;
filter_defs['char'] = qualifiers;
filter_defs['text'] = qualifiers;
filter_defs['email'] = qualifiers;
filter_defs['yim'] = qualifiers;
filter_defs['time'] = qualifiers;
filter_defs['phone'] = qualifiers;
filter_defs['url'] = qualifiers;

var qualifiers_name = new Array();
var is_def = {name:'is',value:'<?php echo $mod_strings['LBL_IS']; ?>'};
var is_not_def = {name:'is_not',value:"<?php echo $mod_strings['LBL_IS_NOT']; ?>"};
var one_of_def = {name:'one_of',value:'<?php echo $mod_strings['LBL_ONE_OF']; ?>'};
var not_one_of_def = {name:'not_one_of',value:'<?php echo $mod_strings['LBL_IS_NOT_ONE_OF']; ?>'};
qualifiers_name = qualifiers_name.concat(qualifiers);
qualifiers_name.unshift(is_not_def);
qualifiers_name.unshift(is_def);
filter_defs['name'] = qualifiers_name;
filter_defs['fullname'] = qualifiers_name;


var qualifiers_name = new Array();
//qualifiers_name = qualifiers_name.concat(qualifiers);
var is_not_empty_def = {name:'not_empty',value:'<?php echo $mod_strings['LBL_IS_NOT_EMPTY']; ?>'};
var is_empty_def = {name:'empty',value:'<?php echo $mod_strings['LBL_IS_EMPTY']; ?>'};
qualifiers_name.unshift(is_not_empty_def);
qualifiers_name.unshift(is_empty_def);
qualifiers_name.unshift(not_one_of_def);
qualifiers_name.unshift(one_of_def);
qualifiers_name.unshift(is_not_def);
qualifiers_name.unshift(is_def);
filter_defs['user_name'] = qualifiers_name;

var qualifiers =  new Array();
qualifiers[qualifiers.length] = {name:'on',value:'<?php echo $mod_strings['LBL_ON']; ?>'};
qualifiers[qualifiers.length] = {name:'before',value:'<?php echo $mod_strings['LBL_BEFORE']; ?>'};
qualifiers[qualifiers.length] = {name:'after',value:'<?php echo $mod_strings['LBL_AFTER']; ?>'};
qualifiers[qualifiers.length] = {name:'between_dates',value:'<?php echo $mod_strings['LBL_IS_BETWEEN']; ?>'};
qualifiers[qualifiers.length] = {name:'not_equals_str',value:'<?php echo $mod_strings['LBL_NOT_ON']; ?>'};
qualifiers[qualifiers.length] = {name:'empty',value:'<?php echo $mod_strings['LBL_IS_EMPTY']; ?>'};
qualifiers[qualifiers.length] = {name:'not_empty',value:'<?php echo $mod_strings['LBL_IS_NOT_EMPTY']; ?>'};



qualifiers[qualifiers.length] = {name:'tp_yesterday',value:'<?php echo $mod_strings['LBL_YESTERDAY']; ?>'};
qualifiers[qualifiers.length] = {name:'tp_today',value:'<?php echo $mod_strings['LBL_TODAY']; ?>'};
qualifiers[qualifiers.length] = {name:'tp_tomorrow',value:'<?php echo $mod_strings['LBL_TOMORROW']; ?>'};
/*
qualifiers[qualifiers.length] = {name:'tp_last_week',value:'<?php echo $mod_strings['LBL_LAST_WEEK']; ?>'};
qualifiers[qualifiers.length] = {name:'tp_next_week',value:'<?php echo $mod_strings['LBL_NEXT_WEEK']; ?>'};
*/
qualifiers[qualifiers.length] = {name:'tp_last_7_days',value:'<?php echo $mod_strings['LBL_LAST_7_DAYS']; ?>'};
qualifiers[qualifiers.length] = {name:'tp_next_7_days',value:'<?php echo $mod_strings['LBL_NEXT_7_DAYS']; ?>'};
qualifiers[qualifiers.length] = {name:'tp_last_month',value:'<?php echo $mod_strings['LBL_LAST_MONTH']; ?>'};
qualifiers[qualifiers.length] = {name:'tp_this_month',value:'<?php echo $mod_strings['LBL_THIS_MONTH']; ?>'};
qualifiers[qualifiers.length] = {name:'tp_next_month',value:'<?php echo $mod_strings['LBL_NEXT_MONTH']; ?>'};
qualifiers[qualifiers.length] = {name:'tp_last_30_days',value:'<?php echo $mod_strings['LBL_LAST_30_DAYS']; ?>'};
qualifiers[qualifiers.length] = {name:'tp_next_30_days',value:'<?php echo $mod_strings['LBL_NEXT_30_DAYS']; ?>'};
/*
qualifiers[qualifiers.length] = {name:'tp_last_quarter',value:'<?php echo $mod_strings['LBL_LAST_QUARTER']; ?>'};
qualifiers[qualifiers.length] = {name:'tp_this_quarter',value:'<?php echo $mod_strings['LBL_THIS_QUARTER']; ?>'};
*/
qualifiers[qualifiers.length] = {name:'tp_last_year',value:'<?php echo $mod_strings['LBL_LAST_YEAR']; ?>'};
qualifiers[qualifiers.length] = {name:'tp_this_year',value:'<?php echo $mod_strings['LBL_THIS_YEAR']; ?>'};
qualifiers[qualifiers.length] = {name:'tp_next_year',value:'<?php echo $mod_strings['LBL_NEXT_YEAR']; ?>'};
filter_defs['date'] = qualifiers;
filter_defs['datetime'] = qualifiers;

var qualifiers =  new Array();
qualifiers[qualifiers.length] = {name:'on',value:'<?php echo $mod_strings['LBL_ON']; ?>'};
qualifiers[qualifiers.length] = {name:'before',value:'<?php echo $mod_strings['LBL_BEFORE']; ?>'};
qualifiers[qualifiers.length] = {name:'after',value:'<?php echo $mod_strings['LBL_AFTER']; ?>'};
qualifiers[qualifiers.length] = {name:'between_datetimes',value:'<?php echo $mod_strings['LBL_IS_BETWEEN']; ?>'};
qualifiers[qualifiers.length] = {name:'not_equals_str',value:'<?php echo $mod_strings['LBL_NOT_ON']; ?>'};
qualifiers[qualifiers.length] = {name:'empty',value:'<?php echo $mod_strings['LBL_IS_EMPTY']; ?>'};
qualifiers[qualifiers.length] = {name:'not_empty',value:'<?php echo $mod_strings['LBL_IS_NOT_EMPTY']; ?>'};
qualifiers[qualifiers.length] = {name:'tp_yesterday',value:'<?php echo $mod_strings['LBL_YESTERDAY']; ?>'};
qualifiers[qualifiers.length] = {name:'tp_today',value:'<?php echo $mod_strings['LBL_TODAY']; ?>'};
qualifiers[qualifiers.length] = {name:'tp_tomorrow',value:'<?php echo $mod_strings['LBL_TOMORROW']; ?>'};
qualifiers[qualifiers.length] = {name:'tp_last_7_days',value:'<?php echo $mod_strings['LBL_LAST_7_DAYS']; ?>'};
qualifiers[qualifiers.length] = {name:'tp_next_7_days',value:'<?php echo $mod_strings['LBL_NEXT_7_DAYS']; ?>'};
qualifiers[qualifiers.length] = {name:'tp_last_month',value:'<?php echo $mod_strings['LBL_LAST_MONTH']; ?>'};
qualifiers[qualifiers.length] = {name:'tp_this_month',value:'<?php echo $mod_strings['LBL_THIS_MONTH']; ?>'};
qualifiers[qualifiers.length] = {name:'tp_next_month',value:'<?php echo $mod_strings['LBL_NEXT_MONTH']; ?>'};
qualifiers[qualifiers.length] = {name:'tp_last_30_days',value:'<?php echo $mod_strings['LBL_LAST_30_DAYS']; ?>'};
qualifiers[qualifiers.length] = {name:'tp_next_30_days',value:'<?php echo $mod_strings['LBL_NEXT_30_DAYS']; ?>'};

qualifiers[qualifiers.length] = {name:'tp_last_year',value:'<?php echo $mod_strings['LBL_LAST_YEAR']; ?>'};
qualifiers[qualifiers.length] = {name:'tp_this_year',value:'<?php echo $mod_strings['LBL_THIS_YEAR']; ?>'};
qualifiers[qualifiers.length] = {name:'tp_next_year',value:'<?php echo $mod_strings['LBL_NEXT_YEAR']; ?>'};
filter_defs['datetimecombo'] = qualifiers;

var qualifiers =  new Array();
qualifiers[qualifiers.length] = {name:'equals',value:'<?php echo $mod_strings['LBL_EQUALS']; ?>'};
qualifiers[qualifiers.length] = {name:'not_equals',value:'<?php echo $mod_strings['LBL_DOES_NOT_EQUAL']; ?>'};
qualifiers[qualifiers.length] = {name:'less',value:'<?php echo $mod_strings['LBL_LESS_THAN']; ?>'};
qualifiers[qualifiers.length] = {name:'greater',value:'<?php echo $mod_strings['LBL_GREATER_THAN']; ?>'};
qualifiers[qualifiers.length] = {name:'between',value:'<?php echo $mod_strings['LBL_IS_BETWEEN']; ?>'};
qualifiers[qualifiers.length] = {name:'empty',value:'<?php echo $mod_strings['LBL_IS_EMPTY']; ?>'};
qualifiers[qualifiers.length] = {name:'not_empty',value:'<?php echo $mod_strings['LBL_IS_NOT_EMPTY']; ?>'};
filter_defs['int'] = qualifiers;
filter_defs['float'] = qualifiers;
filter_defs['decimal'] = qualifiers;
filter_defs['currency'] = qualifiers;
filter_defs['num'] = qualifiers;

var qualifiers =  new Array();
qualifiers[qualifiers.length] = {name:'is',value:'<?php echo $mod_strings['LBL_IS']; ?>'};
qualifiers[qualifiers.length] = {name:'is_not',value:"<?php echo $mod_strings['LBL_IS_NOT']; ?>"};
qualifiers[qualifiers.length] = {name:'one_of',value:'<?php echo $mod_strings['LBL_ONE_OF']; ?>'};
qualifiers[qualifiers.length] = {name:'not_one_of',value:"<?php echo $mod_strings['LBL_IS_NOT_ONE_OF']; ?>"};
qualifiers[qualifiers.length] = {name:'empty',value:'<?php echo $mod_strings['LBL_IS_EMPTY']; ?>'};
qualifiers[qualifiers.length] = {name:'not_empty',value:'<?php echo $mod_strings['LBL_IS_NOT_EMPTY']; ?>'};
filter_defs['enum'] = qualifiers;
filter_defs['radioenum'] = qualifiers;
filter_defs['parent_type'] = qualifiers;


var qualifiers =  new Array();
qualifiers[qualifiers.length] = {name:'is',value:'<?php echo $mod_strings['LBL_IS']; ?>'};
qualifiers[qualifiers.length] = {name:'is_not',value:"<?php echo $mod_strings['LBL_IS_NOT']; ?>"};
qualifiers[qualifiers.length] = {name:'one_of',value:'<?php echo $mod_strings['LBL_ONE_OF']; ?>'};
qualifiers[qualifiers.length] = {name:'not_one_of',value:'<?php echo $mod_strings['LBL_IS_NOT_ONE_OF']; ?>'};
qualifiers[qualifiers.length] = {name:'empty',value:'<?php echo $mod_strings['LBL_IS_EMPTY']; ?>'};
qualifiers[qualifiers.length] = {name:'not_empty',value:'<?php echo $mod_strings['LBL_IS_NOT_EMPTY']; ?>'};
filter_defs['multienum'] = qualifiers;

var qualifiers =  new Array();
qualifiers[qualifiers.length] = {name:'is',value:'<?php echo $mod_strings['LBL_IS']; ?>'};
qualifiers[qualifiers.length] = {name:'is_not',value:"<?php echo $mod_strings['LBL_IS_NOT']; ?>"};
qualifiers[qualifiers.length] = {name:'one_of',value:'<?php echo $mod_strings['LBL_ONE_OF']; ?>'};
qualifiers[qualifiers.length] = {name:'empty',value:'<?php echo $mod_strings['LBL_IS_EMPTY']; ?>'};
qualifiers[qualifiers.length] = {name:'not_empty',value:'<?php echo $mod_strings['LBL_IS_NOT_EMPTY']; ?>'};
filter_defs['assigned_user_name'] = qualifiers;

var qualifiers =  new Array();
qualifiers[qualifiers.length] = {name:'is',value:'<?php echo $mod_strings['LBL_IS']; ?>'};
qualifiers[qualifiers.length] = {name:'is_not',value:"<?php echo $mod_strings['LBL_IS_NOT']; ?>"};
qualifiers[qualifiers.length] = {name:'empty',value:'<?php echo $mod_strings['LBL_IS_EMPTY']; ?>'};
qualifiers[qualifiers.length] = {name:'not_empty',value:'<?php echo $mod_strings['LBL_IS_NOT_EMPTY']; ?>'};
filter_defs['relate'] = qualifiers;
filter_defs['id'] = qualifiers;

var qualifiers =  new Array();
qualifiers[qualifiers.length] = {name:'equals',value:'<?php echo $mod_strings['LBL_EQUALS']; ?>'};
qualifiers[qualifiers.length] = {name:'empty',value:'<?php echo $mod_strings['LBL_IS_EMPTY']; ?>'};
qualifiers[qualifiers.length] = {name:'not_empty',value:'<?php echo $mod_strings['LBL_IS_NOT_EMPTY']; ?>'};
filter_defs['bool'] = qualifiers;

var date_group_defs =  new Array();
date_group_defs[date_group_defs.length] = {name:'day', value:'<?php echo $mod_strings['LBL_BY_DAY']; ?>'};
date_group_defs[date_group_defs.length] = {name:'month', value:'<?php echo $mod_strings['LBL_BY_MONTH']; ?>'};
date_group_defs[date_group_defs.length] = {name:'year', value:'<?php echo $mod_strings['LBL_BY_YEAR']; ?>'};
date_group_defs[date_group_defs.length] = {name:'quarter', value:'<?php echo $mod_strings['LBL_BY_QUARTER']; ?>'};

var qualifiers = new Array();
qualifiers[qualifiers.length] = {name:'any',value:'<?php echo $mod_strings['LBL_ANY']; ?>'};
qualifiers[qualifiers.length] = {name:'all',value:'<?php echo $mod_strings['LBL_ALL']; ?>'};
qualifiers[qualifiers.length] = {name:'exact',value:'<?php echo $mod_strings['LBL_EXACT']; ?>'};
filter_defs['team_set_id'] = qualifiers;

function in_array(n, h){
    var i = 0;
    while (i < h.length) {
        if (n == h[i]) return true;
        i++;
    }
    return false;
}

for(i in module_defs) {
    if(!in_array(i, ACLAllowedModules)) {
        delete module_defs[i];
    }
}
<?php
} //End of the PHP function template_module_defs_js
?>
