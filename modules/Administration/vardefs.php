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

$dictionary['Administration'] = array('table' => 'config', 'comment' => 'System table containing system-wide definitions'
                               ,'fields' => array (
  'category' =>
  array (
    'name' => 'category',
    'vname' => 'LBL_LIST_SYMBOL',
    'type' => 'varchar',
    'len' => '32',
    'comment' => 'Settings are grouped under this category; arbitraily defined based on requirements'
  ),
  'name' =>
  array (
    'name' => 'name',
    'vname' => 'LBL_LIST_NAME',
    'type' => 'varchar',
    'len' => '32',
    'comment' => 'The name given to the setting'
  ),
  'value' =>
  array (
    'name' => 'value',
    'vname' => 'LBL_LIST_RATE',
    'type' => 'text',
    'comment' => 'The value given to the setting'
  ),

), 'indices'=>array( array('name'=>'idx_config_cat', 'type'=>'index',  'fields'=>array('category')),)
                            );

$dictionary['UpgradeHistory'] = array(
    'table'  => 'upgrade_history', 'comment' => 'Tracks Sugar upgrades made over time; used by Upgrade Wizard and Module Loader',
    'fields' => array (
        'id' => array (
                'name'       => 'id',
                'type'       => 'id',
                'required'   => true,
                'reportable' => false,
    		    'comment' => 'Unique identifier'
        ),
        'filename' => array (
                'name' => 'filename',
                'type' => 'varchar',
                'len' => '255',
    		    'comment' => 'Cached filename containing the upgrade scripts and content'
        ),
        'md5sum' => array (
                'name' => 'md5sum',
                'type' => 'varchar',
                'len' => '32',
    		    'comment' => 'The MD5 checksum of the upgrade file'
        ),
        'type' => array (
                'name' => 'type',
                'type' => 'varchar',
                'len' => '30',
    		    'comment' => 'The upgrade type (module, patch, theme, etc)'
        ),
        'status' => array (
                'name' => 'status',
                'type' => 'varchar',
                'len' => '50',
    		    'comment' => 'The status of the upgrade (ex:  "installed")',
        ),
        'version' => array (
                'name' => 'version',
                'type' => 'varchar',
                'len' => '64',
    		    'comment' => 'Version as contained in manifest file'
        ),
		'name' => array (
                'name'  => 'name',
                'type'  => 'varchar',
                'len'   => '255',
        ),
		'description' => array (
                'name'  => 'description',
                'type'  => 'text',
        ),
        'id_name' => array (
                'name' => 'id_name',
                'type' => 'varchar',
                'len' => '255',
    		    'comment' => 'The unique id of the module'
        ),
        'manifest' => array (
                'name' => 'manifest',
                'type' => 'longtext',
    		    'comment' => 'A serialized copy of the manifest file.'
        ),
        'date_entered' => array (
                'name' => 'date_entered',
                'type' => 'datetime',
                'required'=>true,
    		    'comment' => 'Date of upgrade or module load'
        ),
        'enabled' => array(
                                      'name' => 'enabled',
                                      'type' => 'bool',
                                      'len'  => '1',
                                      'default'   => '1',
        ),
    ),

    'indices' => array(
        array('name'=>'upgrade_history_pk',     'type'=>'primary', 'fields'=>array('id')),
        array('name'=>'upgrade_history_md5_uk', 'type'=>'unique',  'fields'=>array('md5sum')),

    ),
);

$dictionary['System'] = array ( 'table' => 'systems',
                         'fields' => array (
                                'id' => array(
                                      'name' =>'id',
                                      'type' =>'id'
                                     ),

                               'system_id' => array(
                                      'name' =>'system_id',
                                      'type' =>'int',
                                      'auto_increment'=>true,
                                      'required'=>true
                                     ),

                                'system_key' => array(
                                      'name' =>'system_key',
                                      'type' =>'varchar',
                                      'len'=>'36'
                                     ),

                                'user_id' => array(
                                      'name' =>'user_id',
                                      'type' =>'id'
                                     ),

                                'last_connect_date' => array(
                                      'name' =>'last_connect_date',
                                      'type' => 'datetime',
                                      'massupdate'=>false,
                                     ),

                                'status' => array(
                                      'name' =>'status',
                                      'vname' => 'LBL_OC_STATUS',
                                      'type' =>'enum',
                                      'len'=>'255',
                                      'options'=> 'oc_status_dom',
                                      'default'=>'Active',
                                      'massupdate'=>true,
                                     ),
                                 'num_syncs' => array(
                                      'name' =>'num_syncs',
                                      'type' =>'int',
                                      'default'=>'0'
                                     ),
                                 'system_name' => array(
                                      'name' =>'system_name',
                                      'type' =>'varchar',
                                      'len' => '100',
                                     ),
                                  'install_method' => array(
                                      'name' =>'install_method',
                                      'type' =>'varchar',
                                      'len' => '100',
                                     ),

                                'date_entered' => array (
                                      'name' => 'date_entered',
                                       'type' => 'datetime'
                                      ),

                                'date_modified' => array (
                                       'name' => 'date_modified',
                                       'type' => 'datetime'
                                      ),

                                'deleted' => array(
                                      'name' => 'deleted',
                                      'type' => 'bool',
                                      'len'  => '1',
                                      'default'   => '0',
                                      'required'  => true
                                ),
                             ),
                             'indices' => array (
                                array('name' =>'systems_pk',
                                      'type' =>'primary',
                                      'fields'=>array('id')
                                      ),
                                array('name' =>'system_id',
                                      'type' =>'index',
                                      'fields'=>array('system_id')
                                      ),
                             )
                    );

                    $dictionary['SessionManager'] = array ( 'table' => 'session_active',
                         'fields' => array (
                                'id' => array(
                                      'name' =>'id',
                                      'type' =>'id'
                                     ),

                               'session_id' => array(
                                      'name' =>'session_id',
                                      'type' =>'varchar',
                                      'len' => '100',
                                     ),
                                 'last_request_time' => array (
                                      'name' => 'last_request_time',
                                       'type' => 'datetime',
                                      ),
                                 'session_type' => array (
                                      'name' => 'session_type',
                                       'type' => 'varchar',
                                        'len' => '100',
                                      ),
                                'is_violation' => array(
                                      'name' => 'is_violation',
                                      'type' => 'bool',
                                      'len'  => '1',
                                      'default'   => '0',
                                ),
                                'num_active_sessions' => array (
                                      'name' => 'num_active_sessions',
                                       'type' => 'int',
                                       'default'=>'0',
                                      ),
                                'date_entered' => array (
                                      'name' => 'date_entered',
                                       'type' => 'datetime'
                                      ),
                                'date_modified' => array (
                                       'name' => 'date_modified',
                                       'type' => 'datetime'
                                      ),
                                 'deleted' => array(
                                      'name' => 'deleted',
                                      'type' => 'bool',
                                      'len'  => '1',
                                      'default'   => '0',
                                      'required'  => false
                                ),
                             ),
                             'indices' => array (
                                array('name' =>'session_active_pk',
                                      'type' =>'primary',
                                      'fields'=>array('id')
                                      ),
                               array('name' =>'idx_session_id' ,
                                     'type'=>'unique' ,
                                     'fields'=>array('session_id')),
                             )
                    );

?>
