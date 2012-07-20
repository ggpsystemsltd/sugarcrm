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

 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

$viewdefs = array (
  'Prospects' => 
  array (
    'QuickCreate' => 
    array (
      'templateMeta' => 
      array (
        'maxColumns' => '2',
        'widths' => 
        array (
          0 => 
          array (
            'label' => '10',
            'field' => '30',
          ),
          1 => 
          array (
            'label' => '10',
            'field' => '30',
          ),
        ),
      ),
      'panels' => 
      array (
        'LBL_PROSPECT_INFORMATION' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'name' => 'first_name',
            ),
            1 => 
            array (
              'name' => 'phone_work',
            ),
          ),
          1 => 
          array (
            0 => 
            array (
              'name' => 'last_name',
              'displayParams'=>array('required'=>true)
            ),
            1 => 
            array (
              'name' => 'phone_mobile',
            ),
          ),
          2 => 
          array (
            0 => 
            array (
              'name' => 'account_name',
            ),
            1 => 
            array (
              'name' => 'phone_fax',
            ),
          ),
          3 => 
          array (
            0 => 
            array (
              'name' => 'title',
            ),
            1 => 
            array (
              'name' => 'department',
            ),
          ),
          4 => 
          array (
            0 => 
            array (
              'name' => 'team_name',
            ),
            1 => 
            array (
              'name' => 'do_not_call',
            ),
          ),
          5 => 
          array (
            0 => 
            array (
              'name' => 'assigned_user_name',
            ),
          ),
        ),
        'lbl_email_addresses' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'name' => 'email1',
            ),
          ),
        ),
        'LBL_ADDRESS_INFORMATION' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'name' => 'primary_address_street',
            ),
            1 => 
            array (
              'name' => 'alt_address_street',
            ),
          ),
        ),
      ),
    ),
  ),
);
?>
