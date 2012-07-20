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

/**
 * table storing reports filter information */
$dictionary['report_cache'] = array(
	'table' => 'report_cache',
	'fields' => array(
		'id' => array(
			'name'		=> 'id',
			'type'		=> 'id',
			'required'	=> true,
		),
		'assigned_user_id' => array(
			'name'		=> 'assigned_user_id',
			'type'		=> 'id',
			'required'	=> true,
		),
		'contents' => array (
			'name'			=> 'contents',
			'type'			=> 'text',
			'comment'		=> 'contents of report object',
			'default'		=> NULL,
		),
		'report_options' => array (
			'name'			=> 'report_options',
			'type'			=> 'text',
			'comment'		=> 'options of report object like hide details, hide shart etc..',
			'default'		=> NULL,
		),
		'deleted' => array(
			'name'		=> 'deleted',
			'type'		=> 'varchar',
			'len'		=> 1,
			'required'	=> true,
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
	),
	'indices' => array(
		array(
			'name'			=> 'report_cache_pk',
			'type'			=> 'primary',
			'fields'		=> array('id', 'assigned_user_id')
		),
	),
);