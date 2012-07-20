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
  'Bugs' => 
  array (
    'QuickCreate' => 
    array (
      'templateMeta' => 
      array (
        'form' => 
        array (
          'hidden' => 
          array (
            0 => '<input type="hidden" name="account_id" value="{$smarty.request.account_id}">',
            1 => '<input type="hidden" name="contact_id" value="{$smarty.request.contact_id}">',
          ),
        ),
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
        'DEFAULT' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'name' => 'priority',
            ),
            1 => 
            array (
              'name' => 'assigned_user_name',
            ),
          ),
          1 => 
          array (
            0 => 
            array (
              'name' => 'source',
            ),
            1 => 
            array (
              'name' => 'team_name',
            ),
          ),
          2 => 
          array (
            0 => 
            array (
              'name' => 'type',
            ),
            1 => 
            array (
              'name' => 'status',
            ),
          ),
          3 => 
          array (
            0 => 
            array (
              'name' => 'product_category',
            ),
            1 => 
            array (
              'name' => 'found_in_release',
            ),
          ),
          4 => 
          array (
            0 => 
            array (
              'name' => 'name',
              'displayParams'=>array('required'=>true),
            ),
          ),
          5 => 
          array (
            0 => 
            array (
              'name' => 'description',
            ),
          ),
        ),
      ),
    ),
  ),
);
?>
