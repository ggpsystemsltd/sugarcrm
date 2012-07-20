<?php
if (!defined('sugarEntry') || !sugarEntry)
{
    die('Not A Valid Entry Point');
}
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

$dictionary['quotes_accounts'] = array(
    'table' => 'quotes_accounts',
    'true_relationship_type' => 'one-to-many',
    'fields' => array(
        array('name' => 'id', 'type' => 'varchar', 'len' => '36'),
        array('name' => 'quote_id', 'type' => 'varchar', 'len' => '36',),
        array('name' => 'account_id', 'type' => 'varchar', 'len' => '36',),
        array('name' => 'account_role', 'type' => 'varchar', 'len' => '20',),
        array('name' => 'date_modified', 'type' => 'datetime'),
        array('name' => 'deleted', 'type' => 'bool', 'len' => '1', 'default' => '0', 'required' => false)
    ),
    'indices' => array(
        array('name' => 'quotes_accountspk', 'type' => 'primary', 'fields' => array('id')),
        array('name' => 'idx_acc_qte_acc', 'type' => 'index', 'fields' => array('account_id')),
        array('name' => 'idx_acc_qte_opp', 'type' => 'index', 'fields' => array('quote_id')),
        array(
            'name' => 'idx_quote_account_role', 'type' => 'alternate_key',
            'fields' => array('quote_id', 'account_role')
        )
    ),
    'relationships' => array(
        'quotes_billto_accounts' => array(
            'rhs_module' => 'Quotes', 'rhs_table' => 'quotes', 'rhs_key' => 'id',
            'lhs_module' => 'Accounts', 'lhs_table' => 'accounts', 'lhs_key' => 'id',
            'relationship_type' => 'many-to-many','true_relationship_type' => 'one-to-many',
            'join_table' => 'quotes_accounts', 'join_key_rhs' => 'quote_id', 'join_key_lhs' => 'account_id',
            'relationship_role_column' => 'account_role', 'relationship_role_column_value' => 'Bill To'
        ),

        'quotes_shipto_accounts' => array(
            'rhs_module' => 'Quotes', 'rhs_table' => 'quotes', 'rhs_key' => 'id',
            'lhs_module' => 'Accounts', 'lhs_table' => 'accounts', 'lhs_key' => 'id',
            'relationship_type' => 'many-to-many','true_relationship_type' => 'one-to-many',
            'join_table' => 'quotes_accounts', 'join_key_rhs' => 'quote_id', 'join_key_lhs' => 'account_id',
            'relationship_role_column' => 'account_role', 'relationship_role_column_value' => 'Ship To'
        ),
    )

);
?>
