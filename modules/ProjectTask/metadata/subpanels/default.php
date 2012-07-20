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




global $current_user, $app;
// check if $app present - if in Studio/MB then loading a subpanel definition through the SubpanelDefinitions class 'requires' this file without an $app
if (isset($app) && isset($app->controller)){
	$projectId = $app->controller->record;
	
	$focus = new Project();
	$focus->retrieve($projectId);
	
	if (!$focus->isTemplate()){
		$subpanel_layout = array(
			'top_buttons' => array(
		        array('widget_class' => 'SubPanelTopCreateButton'),
					array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => 'ProjectTask'),
			),
		
			'where' => '',
		
		
			'list_fields' => array(
		        'name'=>array(
				 	'vname' => 'LBL_LIST_NAME',
					'widget_class' => 'SubPanelDetailViewLink',
					'width' => '9999%',
				),
				'percent_complete'=>array(
				 	'vname' => 'LBL_LIST_PERCENT_COMPLETE',
					'width' => '9999%',
				),
				'status'=>array(
				 	'vname' => 'LBL_LIST_STATUS',
					'width' => '9999%',
				),
				'assigned_user_name'=>array(
				 	'vname' => 'LBL_LIST_ASSIGNED_USER_ID',
				 	'module' => 'Users',
					'width' => '9999%',
				),
				'date_finish'=>array(
				 	'vname' => 'LBL_LIST_DATE_DUE',
					'width' => '9999%',
				),
			),
		);
	}
	else{
		$subpanel_layout = array(
	
		'top_buttons' => array(
		),
	
		'where' => '',
	
	
		'list_fields' => array(
	        'name'=>array(
			 	'vname' => 'LBL_LIST_NAME',
				'widget_class' => 'SubPanelDetailViewLink',
				'width' => '70%',
			),
			'date_start'=>array(
			 	'vname' => 'LBL_DATE_START',
				'width' => '15%',
			),
	        'date_finish'=>array(
	            'vname' => 'LBL_DATE_FINISH',
	            'width' => '15%',
	        ),
		),
	);
	}
}
?>