<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
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

$dictionary['contacts_bugs'] = array('table' => 'contacts_bugs'
, 'fields' => array(
        array('name' => 'id', 'type' => 'varchar', 'len' => '36')
    , array('name' => 'contact_id', 'type' => 'varchar', 'len' => '36',)
    , array('name' => 'bug_id', 'type' => 'varchar', 'len' => '36',)
    , array('name' => 'contact_role', 'type' => 'varchar', 'len' => '50',)
    , array('name' => 'date_modified', 'type' => 'datetime')
    , array('name' => 'deleted', 'type' => 'bool', 'len' => '1', 'default' => '0', 'required' => false)
    ), 'indices' => array(
        array('name' => 'contacts_bugspk', 'type' => 'primary', 'fields' => array('id'))
    , array('name' => 'idx_con_bug_con', 'type' => 'index', 'fields' => array('contact_id'))
    , array('name' => 'idx_con_bug_bug', 'type' => 'index', 'fields' => array('bug_id'))
    , array('name' => 'idx_contact_bug', 'type' => 'alternate_key', 'fields' => array('contact_id', 'bug_id'))

    )
, 'relationships' => array(
        'contacts_bugs' => array(
            'lhs_module' => 'Contacts',
            'lhs_table' => 'contacts',
            'lhs_key' => 'id',
            'rhs_module' => 'Bugs',
            'rhs_table' => 'bugs',
            'rhs_key' => 'id',
            'relationship_type' => 'many-to-many',
            'join_table' => 'contacts_bugs',
            'join_key_lhs' => 'contact_id', 'join_key_rhs' => 'bug_id'))


)
?>
