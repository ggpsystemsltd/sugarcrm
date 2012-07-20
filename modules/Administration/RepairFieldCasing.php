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

//Check if current user has admin access
if(is_admin($current_user)) {
    global $mod_strings;

    //echo out processing message
    echo '<br>'.$mod_strings['LBL_REPAIR_FIELD_CASING_PROCESSING'];

    //store the affected entries
    $database_entries = array();
    $module_entries = array();

    $query = "SELECT * FROM fields_meta_data";
    $result = $GLOBALS['db']->query($query);
    while($row = $GLOBALS['db']->fetchByAssoc($result)) {
    	  $name = $row['name'];
    	  $id = $row['id'];
    	  $module_entries[$row['custom_module']] = true;

    	  //Only run database SQL where the name or id casing does is not lowercased
    	  if($name != strtolower($row['name'])) {
    	  	 $database_entries[$row['custom_module']][$name] = $row;
    	  }
    }

    //If we have database entries to process
    if(!empty($database_entries)) {

       foreach($database_entries as $module=>$entries) {
       	   $table_name = strtolower($module) . '_cstm';

           foreach($entries as $original_col_name=>$entry) {
               echo '<br>'. string_format($mod_strings['LBL_REPAIR_FIELD_CASING_SQL_FIELD_META_DATA'], array($entry['name']));
           	   $update_sql = "UPDATE fields_meta_data SET id = '" . $entry['custom_module'] . strtolower($entry['name']) . "', name = '" . strtolower($entry['name']) . "' WHERE id = '" . $entry['id'] . "'";
           	   $GLOBALS['db']->query($update_sql);

           	   echo '<br>'. string_format($mod_strings['LBL_REPAIR_FIELD_CASING_SQL_CUSTOM_TABLE'], array($entry['name'], $table_name));

      		   $GLOBALS['db']->query($GLOBALS['db']->renameColumnSQL($table_name, $entry['name'], strtolower($entry['name'])));
           }
       }
    }

    //If we have metadata files to alter
    if(!empty($module_entries)) {
	    $modules = array_keys($module_entries);
	    $views = array('basic_search', 'advanced_search', 'detailview', 'editview', 'quickcreate');
	    $class_names = array();

        require_once ('include/TemplateHandler/TemplateHandler.php') ;
	    require_once('modules/ModuleBuilder/parsers/ParserFactory.php');

	    foreach($modules as $module) {
	       if(isset($GLOBALS['beanList'][$module])) {
	       	  $class_names[] = $GLOBALS['beanList'][$module];
	       }

	       $repairClass->module_list[] = $module;
	       foreach($views as $view) {
                try{
                    $parser = ParserFactory::getParser($view, $module);
                }
                catch(Exception $e){
                    $GLOBALS['log']->fatal("Caught exception in RepairFieldCasing script: ".$e->getMessage());
                    continue;
                }
	       		if(isset($parser->_viewdefs['panels'])) {
	       		   foreach($parser->_viewdefs['panels'] as $panel_id=>$panel) {
	       		   	  foreach($panel as $row_id=>$row) {
	       		   	  	 foreach($row as $entry_id=>$entry) {
	       		   	  	 	if(is_array($entry) && isset($entry['name'])) {
	       		   	  	 	   $parser->_viewdefs['panels'][$panel_id][$row_id][$entry_id]['name'] = strtolower($entry['name']);
	       		   	  	 	}
	       		   	  	 }
	       		   	  }
	       		   }
	       		} else {
	       		  //For basic_search and advanced_search views, just process the fields
       		   	  foreach($parser->_viewdefs as $entry_id=>$entry) {
       		   	  	 if(is_array($entry) && isset($entry['name'])) {
       		   	  	 	$parser->_viewdefs[$entry_id]['name'] = strtolower($entry['name']);
       		   	  	 }
       		   	  }
	       		}

	       		//Save the changes
	       		$parser->handleSave(false);
	       } //foreach

	       //Now clear the cache of the .tpl files
	       TemplateHandler::clearCache($module);


	    } //foreach

	    echo '<br>'.$mod_strings['LBL_CLEAR_VARDEFS_DATA_CACHE_TITLE'];
	    require_once('modules/Administration/QuickRepairAndRebuild.php');
        $repair = new RepairAndClear();
        $repair->show_output = false;
        $repair->module_list = array($class_names);
        $repair->clearVardefs();
    }

    echo '<br>'.$mod_strings['LBL_DIAGNOSTIC_DONE'];

}
?>
