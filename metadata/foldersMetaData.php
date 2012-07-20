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

/*********************************************************************************

 * Description:
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc. All Rights
 * Reserved. Contributor(s): ______________________________________..
 *********************************************************************************/

$dictionary['folders'] = array(
	'table' => 'folders',
	'fields' => array(
		array(
			'name'			=> 'id',
			'type'			=> 'id',
			'required'		=> true,
		),
		array(
			'name'			=> 'name',
			'type'			=> 'varchar',
			'len'			=> 25,
			'required'		=> true,
		),
		array(
			'name'			=> 'folder_type',
			'type'			=> 'varchar',
			'len'			=> 25,
			'default'		=> NULL,
		),
		array(
			'name'			=> 'parent_folder',
			'type'			=> 'id',
			'required'		=> false,
		),
		array(
			'name'			=> 'has_child',
			'type'			=> 'bool',
			'default'		=> '0',
		),
		array(
			'name'			=> 'is_group',
			'type'			=> 'bool',
			'default'		=> '0',
		),
		array(
			'name'			=> 'is_dynamic',
			'type'			=> 'bool',
			'default'		=> '0',
		),
		array(
			'name'			=> 'dynamic_query',
			'type'			=> 'text',
		),
		array(
			'name'			=> 'assign_to_id',
			'type'			=> 'id',
			'required'		=> false,
		),
		array(
			'name'			=> 'team_id',
			'type'			=> 'id',
			'required'		=> false,
		),
		array(
			'name'			=> 'team_set_id',
			'type'			=> 'id',
			'required'		=> false,
		),

		array(
			'name'			=> 'created_by',
			'type'			=> 'id',
			'required'		=> true,
		),
		array(
			'name'			=> 'modified_by',
			'type'			=> 'id',
			'required'		=> true,
		),
		array(
			'name'			=> 'deleted',
			'type'			=> 'bool',
			'default'		=> '0',
		),
	),
	'indices' => array(
		array(
			'name'			=> 'folderspk',
			'type'			=> 'primary',
			'fields'		=> array('id')
		),
		array(
			'name'			=> 'idx_parent_folder',
			'type'			=> 'index',
			'fields'		=> array('parent_folder')
		),
	),
);

$dictionary['folders_subscriptions'] = array(
	'table' => 'folders_subscriptions',
	'fields' => array(
		array(
			'name'			=> 'id',
			'type'			=> 'id',
			'required'		=> true,
		),
		array(
			'name'			=> 'folder_id',
			'type'			=> 'id',
			'required'		=> true,
		),
		array(
			'name'			=> 'assigned_user_id',
			'type'			=> 'id',
			'required'		=> true,
		),
	),
	'indices' => array(
		array(
			'name'			=> 'folders_subscriptionspk',
			'type'			=> 'primary',
			'fields'		=> array('id')
		),
		array(
			'name'			=> 'idx_folder_id_assigned_user_id',
			'type'			=> 'index',
			'fields'		=> array('folder_id', 'assigned_user_id')
		),
	),
);

$dictionary['folders_rel'] = array(
	'table' => 'folders_rel',
	'fields' => array(
		array(
			'name'			=> 'id',
			'type'			=> 'id',
			'required'		=> true,
		),
		array(
			'name'			=> 'folder_id',
			'type'			=> 'id',
			'required'		=> true,
		),
		array(
			'name'			=> 'polymorphic_module',
			'type'			=> 'varchar',
			'len'			=> 25,
			'required'		=> true,
		),
		array(
			'name'			=> 'polymorphic_id',
			'type'			=> 'id',
			'required'		=> true,
		),
		array(
			'name'			=> 'deleted',
			'type'			=> 'bool',
			'default'		=> '0',
		),
	),
	'indices' => array(
		array(
			'name'			=> 'folders_relpk',
			'type'			=> 'primary',
			'fields'		=> array('id'),
		),
		array(
			'name'			=> 'idx_poly_module_poly_id',
			'type'			=> 'index',
			'fields'		=> array('polymorphic_module', 'polymorphic_id'),
		),
		array(
		    'name'			=> 'idx_fr_id_deleted_poly',
		    'type'			=> 'index',
		    'fields'		=> array('folder_id','deleted','polymorphic_id'),
		),
	),
);
