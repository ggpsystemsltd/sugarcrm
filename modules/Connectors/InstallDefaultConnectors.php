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


$default_modules_sources = array (
  'Accounts' =>
  array (
    'ext_rest_linkedin' => 'ext_rest_linkedin',
    'ext_soap_hoovers' => 'ext_soap_hoovers',
     'ext_rest_twitter' => 'ext_rest_twitter',
     'ext_rest_insideview' => 'ext_rest_insideview',
  ),
  'Contacts' =>
  array (
    'ext_rest_linkedin' => 'ext_rest_linkedin',
     'ext_rest_twitter' => 'ext_rest_twitter',
     'ext_rest_insideview' => 'ext_rest_insideview',
  ),

  'Leads' =>
  array (
    'ext_rest_linkedin' => 'ext_rest_linkedin',
     'ext_rest_twitter' => 'ext_rest_twitter',
     'ext_rest_insideview' => 'ext_rest_insideview',
  ),
  'Prospects' =>
  array (
    'ext_rest_linkedin' => 'ext_rest_linkedin',

     'ext_rest_twitter' => 'ext_rest_twitter',
  ),
  'Opportunities' =>
  array (
    'ext_rest_insideview' => 'ext_rest_insideview',
  ),
);

$previous_connectors = array();
if(file_exists('custom/modules/Connectors/metadata/connectors.php')){
    require('custom/modules/Connectors/metadata/connectors.php');

    foreach($connectors as $connector_array){
        $connector_id = $connector_array['id'];
        $previous_connectors[$connector_id] = $connector_id;
    }
}

// Merge in old modules the customer added instead of overriding it completely with defaults
// If they have customized their connectors modules
if(file_exists('custom/modules/Connectors/metadata/display_config.php')){
    require('custom/modules/Connectors/metadata/display_config.php');

    // Remove the default settings from being copied over since they already existed
    foreach($default_modules_sources as $module => $sources){
        foreach($sources as $source_key => $source){
            foreach($previous_connectors as $previous_connector){
                if(in_array($previous_connector, $default_modules_sources[$module])){
                    unset($default_modules_sources[$module][$previous_connector]);
                }
            }
        }
    }

    // Merge in the new connector default settings with the current settings
    if ( isset($modules_sources) && is_array($modules_sources) ) {
        foreach($modules_sources as $module => $sources){
            if(!empty($default_modules_sources[$module])){
                $merged = array_merge($modules_sources[$module], $default_modules_sources[$module]);
                $default_modules_sources[$module] = $merged;
            }
            else{
                $default_modules_sources[$module] = $modules_sources[$module];
            }
        }
    }
}

if(!file_exists('custom/modules/Connectors/metadata')) {
   mkdir_recursive('custom/modules/Connectors/metadata');
}

if(!write_array_to_file('modules_sources', $default_modules_sources, 'custom/modules/Connectors/metadata/display_config.php')) {
   $GLOBALS['log']->fatal('Cannot write file custom/modules/Connectors/metadata/display_config.php');
}

?>
