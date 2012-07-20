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

$viewdefs['ProjectTask']['DetailView'] = array(
    'templateMeta' => array('maxColumns' => '2',
                            'widths' => array(
                                            array('label' => '10', 'field' => '30'),
                                            array('label' => '10', 'field' => '30')
                                            ),
                            'includes'=> array(
                                         array('file'=>'modules/ProjectTask/ProjectTask.js'),
                                         	),
                            'form' => array(
										'buttons' => array( 'EDIT',
				                            				array( 'customCode' => '{if $bean->aclAccess("edit")}<input type="submit" name="EditTaskInGrid" value=" {$MOD.LBL_EDIT_TASK_IN_GRID_TITLE} " '.
																					'title="{$MOD.LBL_EDIT_TASK_IN_GRID_TITLE}"  '.
																					'class="button" onclick="this.form.record.value=\'{$fields.project_id.value}\';prep_edit_task_in_grid(this.form);" />{/if}',
															),
														),
										'hideAudit' => true,
											),

    ),
 'panels' =>array (
  'default' =>
  array (

    array (
      'name',

      array (
        'name' => 'project_task_id',
        'label' => 'LBL_TASK_ID',
      ),
    ),    

    array (
      'date_start',
      'date_finish',
    ),
	array (
		array (
		        'name' => 'assigned_user_name',
		        'label' => 'LBL_ASSIGNED_USER_ID',
		      ),
		array (
			'name' => 'team_name',
		),
	),    

    array (
      array (
        'name' => 'duration',
        'customCode' => '{$fields.duration.value}&nbsp;{$fields.duration_unit.value}',
        'label' => 'LBL_DURATION',
      ),
    ),

    array (
		'status',
		'priority',
    ),    
    
    array (
      'percent_complete',
      array (
        'name' => 'milestone_flag',
        'label' => 'LBL_MILESTONE_FLAG',
      ),
    ),    

    array (
      array(
      	'name' => 'resource_id',
      	'customCode' => '{$resource}',
      	'label' => 'LBL_RESOURCE',
      ),
    ),

    array (

      array (
        'name' => 'project_name',
        'customCode' => '<a href="index.php?module=Project&action=DetailView&record={$fields.project_id.value}">{$fields.project_name.value}&nbsp;</a>',
        'label' => 'LBL_PARENT_ID',
      ),
      array(
      	'name' => 'actual_duration',
      	'customCode' => '{$fields.actual_duration.value}&nbsp;{$fields.duration_unit.value}',
      	'label' => 'LBL_ACTUAL_DURATION',
      ),
    ),
    
    array (

      'task_number',
      'order_number',
    ),

    array (
      'estimated_effort',
	  'utilization',      
    ),            

    array (

      array (
        'name' => 'description',
      ),
    ),

  ),
)


);
?>