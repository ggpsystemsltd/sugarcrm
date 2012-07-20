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

$dictionary['ImportMap'] = array (
    'table' => 'import_maps', 
    'comment' => 'Import mapping control table',
    'fields' => array (
        'id' => array (
            'name' => 'id',
            'vname' => 'LBL_ID',
            'type' => 'id',
            'required'=>true,
            'reportable'=>false,
            'comment' => 'Unique identifier',
            ),
        'name' => array (
            'name' => 'name',
            'vname' => 'LBL_NAME',
            'type' => 'varchar',
            'len' => '254',
            'required'=>true,
            'comment' => 'Name of import map',
            ),
        'source' => array (
            'name' => 'source',
            'vname' => 'LBL_SOURCE',
            'type' => 'varchar',
            'len' => '36',
            'required'=>true,
            'comment' => '',
            ),
        'enclosure' => array (
            'name' => 'enclosure',
            'vname' => 'LBL_CUSTOM_ENCLOSURE',
            'type' => 'varchar',
            'len' => '1',
            'required'=>true,
            'comment' => '',
            'default' => ' ',
            ),
        'delimiter' => array (
            'name' => 'delimiter',
            'vname' => 'LBL_CUSTOM_DELIMITER',
            'type' => 'varchar',
            'len' => '1',
            'required'=>true,
            'comment' => '',
            'default' => ',',
            ),
        'module' => array (
            'name' => 'module',
            'vname' => 'LBL_MODULE',
            'type' => 'varchar',
            'len' => '36',
            'required'=>true,
            'comment' => 'Module used for import',
            ),
        'content' => array (
            'name' => 'content',
            'vname' => 'LBL_CONTENT',
            'type' => 'text',
            'comment' => 'Mappings for all columns',
            ),
        'default_values' => array (
            'name' => 'default_values',
            'vname' => 'LBL_CONTENT',
            'type' => 'text',
            'comment' => 'Default Values for all columns',
            ),
        'has_header' => array (
            'name' => 'has_header',
            'vname' => 'LBL_HAS_HEADER',
            'type' => 'bool',
            'default' => '1',
            'required'=>true,
            'comment' => 'Indicator if source file contains a header row',
            ),
        'deleted' => array (
            'name' => 'deleted',
            'vname' => 'LBL_DELETED',
            'type' => 'bool',
            'required'=>false,
            'reportable'=>false,
            'comment' => 'Record deletion indicator',
            ),
        'date_entered' => array (
            'name' => 'date_entered',
            'vname' => 'LBL_DATE_ENTERED',
            'type' => 'datetime',
            'required'=>true,
            'comment' => 'Date record created',
            ),
        'date_modified' => array (
            'name' => 'date_modified',
            'vname' => 'LBL_DATE_MODIFIED',
            'type' => 'datetime',
            'required'=>true,
            'comment' => 'Date record last modified',
            ),
        'assigned_user_id' => array (
            'name' => 'assigned_user_id',
            'rname' => 'user_name',
            'id_name' => 'assigned_user_id',
            'vname' => 'LBL_ASSIGNED_TO',
            'type' => 'assigned_user_name',
            'table' => 'users',
            'isnull' => 'false',
            'dbType' => 'id',
            'reportable'=>false,
            'comment' => 'Assigned-to user',
            ),
        'is_published' => array (
            'name' => 'is_published',
            'vname' => 'LBL_IS_PUBLISHED',
            'type' => 'varchar',
            'len' => '3',
            'required'=>true,
            'default'=>'no',
            'comment' => 'Indicator if mapping is published',
            ),
        ),                                
    'indices' => array (
        array(
            'name' =>'import_mapspk', 
            'type' =>'primary', 
            'fields'=>array('id')
            ),
        array(
            'name' =>'idx_owner_module_name', 
            'type' =>'index', 
            'fields'=>array('assigned_user_id','module','name','deleted')
            ),
        )
    );
                                  
$dictionary['UsersLastImport'] = array ( 
    'table' => 'users_last_import', 
    'comment' => 'Maintains rows last imported by user', 
    'fields' => array (
        'id' => array (
            'name' => 'id',
            'vname' => 'LBL_ID',
            'type' => 'id',
            'required'=>true,
            'reportable'=>false,
            'comment' => 'Unique identifier'
            ),
        'assigned_user_id' => array (
            'name' => 'assigned_user_id',
            'rname' => 'user_name',
            'id_name' => 'assigned_user_id',
            'vname' => 'LBL_ASSIGNED_TO',
            'type' => 'assigned_user_name',
            'table' => 'users',
            'isnull' => 'false',
            'dbType' => 'id',
            'reportable'=>false,
            'comment' => 'User assigned to this record'
            ),
        'import_module' => array (
            'name' => 'import_module',
            'vname' => 'LBL_BEAN_TYPE',
            'type' => 'varchar',
            'len' => '36',
            'comment' => 'Module for which import occurs'
            ),
        'bean_type' => array (
            'name' => 'bean_type',
            'vname' => 'LBL_BEAN_TYPE',
            'type' => 'varchar',
            'len' => '36',
            'comment' => 'Bean type for which import occurs'
            ),
        'bean_id' => array (
            'name' => 'bean_id',
            'vname' => 'LBL_BEAN_ID',
            'type' => 'id',
            'reportable'=>false,
            'comment' => 'ID of item identified by bean_type'
            ),
        'deleted' => array (
            'name' => 'deleted',
            'vname' => 'LBL_DELETED',
            'type' => 'bool',
            'reportable'=>false,
            'required'=>false,
            'comment' => 'Record deletion indicator'
            ),
        ),
    'indices' => array (
        array(
            'name' =>'users_last_importpk', 
            'type' =>'primary', 
            'fields'=>array('id')
            ),
        array(
            'name' =>'idx_user_id', 
            'type' =>'index', 
            'fields'=>array('assigned_user_id')
            )
        )
    );
?>
