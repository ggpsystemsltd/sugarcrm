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

require_once('modules/DynamicFields/FieldCases.php');
require_once('modules/DynamicFields/DynamicField.php');
 global $db;
 if(!isset($db)){
 	$db = DBManagerFactory::getInstance();
 }
 $result = $db->query( 'SELECT * FROM fields_meta_data WHERE deleted = 0 ORDER BY custom_module');
 $modules = array();
 /*
  * get the real field_meta_data
  */
 while($row = $db->fetchByAssoc($result)){
 	$the_modules = $row['custom_module'];
 	if(!isset($modules[$the_modules])){
 		$modules[$the_modules] = array();	
 	}
 	$modules[$the_modules][$row['name']] = $row['name'];
 }
 	
 $simulate = false;
 if(!isset($_REQUEST['run'])){
 	$simulate = true;
 	echo "SIMULATION MODE - NO CHANGES WILL BE MADE EXCEPT CLEARING CACHE";
 }	

 foreach($modules as $the_module=>$fields){
 	$class_name = $beanList[$the_module];
 	echo "<br><br>Scanning $the_module <br>";
		
		require_once($beanFiles[$class_name]);
		$mod = new $class_name();
		if(!$db->tableExists($mod->table_name . "_cstm")){
			$mod->custom_fields = new DynamicField();
			$mod->custom_fields->setup($mod);
		$mod->custom_fields->createCustomTable();
		}

		$result = $db->query("DESCRIBE $mod->table_name" . "_cstm");
		
		while($row = $db->fetchByAssoc($result)){
			
			
			$col = $row['Field'];
			$type = $row['Type'];
			$fieldDef = $mod->getFieldDefinition($col);
			$the_field = get_widget($fieldDef['type']);
			$the_field->set($fieldDef);
				
				if(!isset($fields[$col]) && $col != 'id_c'){
					if(!$simulate)$db->query("ALTER TABLE $mod->table_name" . "_cstm DROP COLUMN $col");
					unset($fields[$col]);
					echo "Dropping Column $col from $mod->table_name" . "_cstm for module $the_module<br>";
				}	else{
					if($col != 'id_c'){
					if(trim($the_field->get_db_type()) != trim($type)){
						
					echo "Fixing Column Type for $col changing $type to ". $the_field->get_db_type() . "<br>";
					if(!$simulate)$db->query($the_field->get_db_modify_alter_table($mod->table_name . '_cstm'));		
					}
					}
					
					unset($fields[$col]);
				}
			
		}
			
			echo sizeof($fields) . " field(s) missing from $mod->table_name" . "_cstm<br>";
			foreach($fields as $field){
				echo "Adding Column $field to $mod->table_name" . "_cstm<br>";
				if(!$simulate){
					$the_field = $mod->getFieldDefinition($field);
					$field = get_widget($the_field['type']);
					$field->set($the_field);
					$query = $field->get_db_add_alter_table($mod->table_name . '_cstm');
					echo $query;
            		if(!empty($query)){
                		$mod->db->query($query);
            		}
				}
			}
	}
	
	
	DynamicField::deleteCache();	
	echo '<br>Done<br>';
	if($simulate){
		echo '<a href="index.php?module=Administration&action=UpgradeFields&run=true">Execute non-simulation mode</a>';	
	}
		
		
 
 
 	
 
 
 
 ?>