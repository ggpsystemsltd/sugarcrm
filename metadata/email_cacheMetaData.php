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
 * Relationship table linking emails with 1 or more SugarBeans
 */
$dictionary['email_cache'] = array(
	'table' => 'email_cache',
	'fields' => array(
		'ie_id' => array(
			'name'		=> 'ie_id',
			'type'		=> 'id',
		),
		'mbox' => array(
			'name'		=> 'mbox',
			'type'		=> 'varchar',
			'len'		=> 60,
			'required'	=> true,
		),
		'subject' => array(
			'name'		=> 'subject',
			'type'		=> 'varchar',
			'len'		=> 255,
			'required'	=> false,
		),
		'fromaddr' => array(
			'name'		=> 'fromaddr',
			'type'		=> 'varchar',
			'len'		=> 100,
			'required'	=> false,
		),
		'toaddr' => array(
			'name'		=> 'toaddr',
			'type'		=> 'varchar',
			'len'		=> 255,
			'required'	=> false,
		),
		'senddate' => array(
			'name'		=> 'senddate',
			'type'		=> 'datetime',
			'required'	=> false,
		),
		'message_id' => array(
			'name'		=> 'message_id',
			'type'		=> 'varchar',
			'len'		=> 255,
			'required'	=> false,
		),
		'mailsize' => array(
			'name'		=> 'mailsize',
			'type'		=> 'uint',
			'len'		=> 16,
			'required'	=> true,
		),
		'imap_uid' => array(
			'name'		=> 'imap_uid',
			'type'		=> 'uint',
			'len'		=> 32,
			'required'	=> true,
		),
		'msgno' => array(
			'name'		=> 'msgno',
			'type'		=> 'uint',
			'len'		=> 32,
			'required'	=> false,
		),
		'recent' => array(
			'name'		=> 'recent',
			'type'		=> 'tinyint',
			'len'		=> 1,
			'required'	=> true,
		),
		'flagged' => array(
			'name'		=> 'flagged',
			'type'		=> 'tinyint',
			'len'		=> 1,
			'required'	=> true,
		),
		'answered' => array(
			'name'		=> 'answered',
			'type'		=> 'tinyint',
			'len'		=> 1,
			'required'	=> true,
		),
		'deleted' => array(
			'name'		=> 'deleted',
			'type'		=> 'tinyint',
			'len'		=> 1,
			'required'	=> false,
		),
		'seen' => array(
			'name'		=> 'seen',
			'type'		=> 'tinyint',
			'len'		=> 1,
			'required'	=> true,
		),
		'draft' => array(
			'name'		=> 'draft',
			'type'		=> 'tinyint',
			'len'		=> 1,
			'required'	=> true,
		),
	),
	'indices' => array(
		array(
			'name'			=> 'idx_ie_id',
			'type'			=> 'index',
			'fields'		=> array(
				'ie_id',
			),
		),
		array(
			'name'			=> 'idx_mail_date',
			'type'			=> 'index',
			'fields'		=> array(
				'ie_id',
				'mbox',
				'senddate',
			)
		),
		array(
			'name'			=> 'idx_mail_from',
			'type'			=> 'index',
			'fields'		=> array(
				'ie_id',
				'mbox',
				'fromaddr',
			)
		),
		array(
			'name'			=> 'idx_mail_subj',
			'type'			=> 'index',
			'fields'		=> array(
				'subject',
			)
		),
		array(
			'name'			=> 'idx_mail_to',
			'type'			=> 'index',
			'fields'		=> array(
				'toaddr',
			)
		),

	),
);