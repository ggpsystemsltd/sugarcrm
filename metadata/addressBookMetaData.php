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

$dictionary['AddressBook'] = array ('table' => 'address_book',
	'fields' => array (
		'assigned_user_id' => array (
			'name' => 'assigned_user_id',
			'vname' => 'LBL_USER_ID',
			'type' => 'id',
			'required' => true,
			'reportable' => false,
		),
		'bean' => array (
			'name' => 'bean',
			'vname' => 'LBL_BEAN',
			'type' => 'varchar',
			'len' => '50',
			'required' => true,
			'reportable' => false,
		),
		'bean_id' => array (
			'name' => 'bean_id',
			'vname' => 'LBL_BEAN_ID',
			'type' => 'id',
			'required' => true,
			'reportable' => false,
		),
	),
	'indices' => array (
		array(
			'name' => 'ab_user_bean_idx',
			'type' =>'index',
			'fields' => array(
				'assigned_user_id',
				'bean',
			)
		),
	), /* end indices */
);

$dictionary['AddressBookMailingList'] = array ('table' => 'address_book_lists',
	'fields' => array (
		'id' => array(
			'name'	=> 'id',
			'type'	=> 'id',
			'required'	=> true,
			'reportable' => false,
		),
		'assigned_user_id' => array (
			'name' => 'assigned_user_id',
			'vname' => 'LBL_USER_ID',
			'type' => 'id',
			'required' => true,
			'reportable' => false,
		),
		'list_name' => array(
			'name'	=> 'list_name',
			'vname'	=> 'LBL_MAILING_LIST',
			'type'	=> 'varchar',
			'len'	=> 100,
			'required'	=> true,
			'reportable'	=> false,
		),
	),
	'indices' => array (
		array(
			'name'	=> 'abl_pk',
			'type'	=> 'primary',
			'fields'	=> array(
				'id',
			),
		),
		array(
			'name' => 'abml_user_bean_idx',
			'type' =>'index',
			'fields' => array(
				'assigned_user_id',
			)
		),
	), /* end indices */
);

$dictionary['AddressBookMailingListItems'] = array ('table' => 'address_book_list_items',
	'fields' => array (
		'list_id' => array(
			'name'	=> 'list_id',
			'type'	=> 'id',
			'required'	=> true,
			'reportable' => false,
		),
		'bean_id' => array(
			'name'	=> 'bean_id',
			'type'	=> 'id',
			'required'	=> true,
			'reportable' => false,
		),
	),
	'indices' => array (
		array(
			'name' => 'abli_list_id_idx',
			'type' =>'index',
			'fields' => array(
				'list_id',
			)
		),
		array(
			'name' => 'abli_list_id_bean_idx',
			'type' =>'index',
			'fields' => array(
				'list_id',
				'bean_id',
			)
		),
	), /* end indices */
);
