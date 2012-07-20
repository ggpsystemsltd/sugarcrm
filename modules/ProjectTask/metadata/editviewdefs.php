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

$viewdefs['ProjectTask']['EditView'] = array(
    'templateMeta' => array('maxColumns' => '2', 
 
                            'widths' => array(
                                            array('label' => '10', 'field' => '30'), 
                                            array('label' => '10', 'field' => '30')
                                            ),
                            'includes'=> array(
                                            array('file'=>'modules/ProjectTask/ProjectTask.js'),
                                         ),                                        
                            'form' => array(
										'buttons' => array(		
				                            				array( 'customCode' => '{if $FROM_GRID}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button" '.
																					'onclick="this.form.action.value=\'Save\'; this.form.return_module.value=\'Project\'; this.form.return_action.value=\'EditGridView\'; '.
																					'this.form.return_id.value=\'{$project_id}\'; return check_form(\'EditView\');"	type="submit" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}"/>' .
				                            										'{else}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button" '.
				                            										'onclick="this.form.action.value=\'Save\'; return check_form(\'EditView\');" type="submit" name="button" '.
				                            										'value="{$APP.LBL_SAVE_BUTTON_LABEL}">{/if}&nbsp;',
															),
				                            				array( 'customCode' => '{if $FROM_GRID}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" '.
				                            										'onclick="SUGAR.grid.closeTaskDetails()"; '.
				                            										'type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}">'.
				                            										'{else}{if !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($fields.id.value))}'.
				                            										'<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" '.
				                            										'onclick="this.form.action.value=\'DetailView\'; this.form.module.value=\'{$smarty.request.return_module}\'; this.form.record.value=\'{$smarty.request.return_id}\';" '. 
				                            										'type="submit" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}">'.
				                            										'{elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($smarty.request.return_id))}'.
				                            										'<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" '.
				                            										'onclick="this.form.action.value=\'DetailView\'; this.form.module.value=\'{$smarty.request.return_module}\'; this.form.record.value=\'{$smarty.request.return_id}\';" '.
				                            										'type="submit" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}">'.
				                            										'{else}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" '.
				                            										'onclick="this.form.action.value=\'index\'; this.form.module.value=\'{$smarty.request.return_module}\'; this.form.record.value=\'{$smarty.request.return_id}\';" '.
				                            										'type="submit" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}">{/if}{/if}&nbsp;',
															),
														),
							),
    ),
 'panels' =>array (
  'default' => 
  array (
    
    array (
      array (
        'name' => 'name',
        'label' => 'LBL_NAME',
      ),
      
      array (
        'name' => 'project_task_id',
        'type' => 'readonly',
        'label' => 'LBL_TASK_ID',
      ),
    ),

    array (
      array (
      	'name' => 'duration',
      	'type' => 'readonly',
      	'customCode' => '{$fields.duration.value}&nbsp;{$fields.duration_unit.value}',
      ),
    ),
  	    
    array (  
      array (
        'name' => 'date_start',
        'type' => 'readonly',
      ),
      
      array (
        'name' => 'date_finish',
        'type' => 'readonly',
      ),
    ),
	
    array (
    	array(
			'name' => 'status',
			'customCode' => '<select name="{$fields.status.name}" id="{$fields.status.name}" title="" tabindex="s" onchange="update_percent_complete(this.value);">{if isset($fields.status.value) && $fields.status.value != ""}{html_options options=$fields.status.options selected=$fields.status.value}{else}{html_options options=$fields.status.options selected=$fields.status.default}{/if}</select>',
		),
		'priority',
    ),   
    
     
    array(
      
      array (
        'name' => 'percent_complete',
        /*
        'customCode' => '<input type="text" name="{$fields.percent_complete.name}" id="{$fields.percent_complete.name}" size="30" value="{$fields.percent_complete.value}" title="" tabindex="0" onChange="update_status(this.value);" /></tr>',
        */
		'customCode' => '<span id="percent_complete_text">{$fields.percent_complete.value}</span><input type="hidden" name="{$fields.percent_complete.name}" id="{$fields.percent_complete.name}" value="{$fields.percent_complete.value}" /></tr>',        
      ),
    ),

    
    array (
      array(
      	'name' => 'resource_id',
      	'customCode' => '{$resource}',
      	'label' => 'LBL_RESOURCE',
      ),
		array (

			'name' => 'team_name',
			'type' => 'readonly',
	        'label' => 'LBL_TEAM',
		),
    ),
    
    array (
      	'milestone_flag',
    ),
    
    array (
      
      array (
        'name' => 'project_name',
        'type' => 'readonly',
        'customCode' => '<a href="index.php?module=Project&action=DetailView&record={$fields.project_id.value}">{$fields.project_name.value}&nbsp;</a>',
        'label' => 'LBL_PROJECT_NAME',
      ),
      array(
      	'name' => 'actual_duration',
      	'customCode' => '<input id="actual_duration" type="text" tabindex="2" value="{$fields.actual_duration.value}" size="3" name="actual_duration"/>&nbsp;{$fields.duration_unit.value}',
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
    /*
     */    
  ),
)


);
?>