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

 * Description:  Contains field arrays that are used for caching
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/
$fields_array['EmailMan'] = array ('column_fields' => Array(
		"id"
		, "date_entered"
		, "date_modified"
		, 'user_id'
		, 'module'
		, 'module_id'
		, 'marketing_id'
		, 'campaign_id'
		, 'list_id'
		, 'template_id'
		, 'from_email'
		, 'from_name'
		, 'invalid_email'
		, 'send_date_time'
		, 'in_queue'
		, 'in_queue_date'
		,'send_attempts'
		),
        'list_fields' =>  Array(
		"id"
		, 'user_id'
		, 'module'
		, 'module_id'
		, 'campaign_id'
		, 'marketing_id'
		, 'list_id'
		, 'invalid_email'
		, 'from_name'
		, 'from_email'
		, 'template_id'
		, 'send_date_time'
		, 'in_queue'
		, 'in_queue_date'
		,'send_attempts'
		,'user_name'
		,'to_email'
		,'from_email'
		,'campaign_name'
		,'to_contact'
		,'to_lead'
		,'to_prospect'
		,'contact_email'
		, 'lead_email'
		, 'prospect_email'
        ),
);
?>