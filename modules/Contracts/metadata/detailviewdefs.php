<?php
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

$viewdefs['Contracts']['DetailView'] = array(
'templateMeta' => array(
	'maxColumns' => '2',
	'widths' => array(
		array('label' => '10', 'field' => '30'),
		array('label' => '10', 'field' => '30')
	),
),
'panels' =>array (
  'lbl_contract_information'=>array(
	  array (
		array (
		  'name' => 'name',
		  'label' => 'LBL_CONTRACT_NAME',
		),
		'status',
	  ),

	  array (
		'reference_code',
	  	'start_date',
	  ),

	  array (
	  	'account_name',
		'end_date',
	  ),

	  array (
		array (
		  'name' => 'opportunity_name',
		  'label' => 'LBL_OPPORTUNITY',
		),
	  ),

	  array (
		array (
		  'name' => 'type',
		  'label' => 'LBL_CONTRACT_TYPE',
		),
		array (
		  'name' => 'contract_term',
		  'customCode' => '{$fields.contract_term.value}&nbsp;{if !empty($fields.contract_term.value) }{$MOD.LBL_DAYS}{/if}',
		  'label' => 'LBL_CONTRACT_TERM',
		),
	  ),

	  array (
		array (
		  'name' => 'total_contract_value',
		  'label' => '{$MOD.LBL_TOTAL_CONTRACT_VALUE} ({$fields.currency_name.value})',
		),
		'company_signed_date',
	  ),

	  array (
		
		'expiration_notice',
		'customer_signed_date',
	  ),

	  array (
		'description',
	  ),
  ),
  'LBL_PANEL_ASSIGNMENT' => array (
  		array (
			array (
			  'name' => 'assigned_user_name',
			  'label' => 'LBL_ASSIGNED_TO',
			),
			array (
			  'name' => 'date_modified',
			  'customCode' => '{$fields.date_modified.value}&nbsp;{$APP.LBL_BY}&nbsp;{$fields.modified_by_name.value}',
			  'label' => 'LBL_DATE_MODIFIED',
			),
		),
		array (
			'team_name',
			array (
			  'name' => 'date_entered',
			  'customCode' => '{$fields.date_entered.value}&nbsp;{$APP.LBL_BY}&nbsp;{$fields.created_by_name.value}',
			  'label' => 'LBL_DATE_ENTERED',
			),
  		),
  )
)

);
?>