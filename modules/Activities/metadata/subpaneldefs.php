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




$layout_defs['Activities'] = array( // the key to the layout_defs must be the name of the module dir
	'default_subpanel_define' => array(
		'subpanel_title' => 'LBL_DEFAULT_SUBPANEL_TITLE',
		'top_buttons' => array(
			array('widget_class' => 'SubPanelTopCreateTaskButton'),
			array('widget_class' => 'SubPanelTopScheduleMeetingButton'),
			array('widget_class' => 'SubPanelTopScheduleCallButton'),
			array('widget_class' => 'SubPanelTopComposeEmailButton'),
		),
		'list_fields' => array(
			'Meetings' => array(
				'columns' => array(
					array(
//TODO remove name=nothing and make it safe
//TODO update layout editor to match new file structure
					
			 		 	'name' => 'nothing',
						'widget_class' => 'SubPanelIcon',
			 		 	'module' => 'Meetings',
			 		 	'width' => '2%',
					),
					array(
			 		 	'name' => 'nothing',
						'widget_class' => 'SubPanelCloseButton',
			 		 	'module' => 'Meetings',
			 		 	'vname' => 'LBL_LIST_CLOSE',
			 		 	'width' => '6%',
					),
					array(
			 		 	'name' => 'name',
			 		 	'vname' => 'LBL_LIST_SUBJECT',
						'widget_class' => 'SubPanelDetailViewLink',
			 		 	'width' => '30%',
					),
					array(
			 		 	'name' => 'status',
						'widget_class' => 'SubPanelActivitiesStatusField',
			 		 	'vname' => 'LBL_LIST_STATUS',
			 		 	'width' => '15%',
					),
					array(
			 		 	'name' => 'contact_name',
			 		 	'module' => 'Contacts',
						'widget_class' => 'SubPanelDetailViewLink',
			 		 	'target_record_key' => 'contact_id',
			 		 	'target_module' => 'Contacts',
			 		 	'vname' => 'LBL_LIST_CONTACT',
			 		 	'width' => '11%',
					),
					array(
			 		 	'name' => 'parent_name',
			 		 	'module' => 'Meetings',
			 		 	'vname' => 'LBL_LIST_RELATED_TO',
			 		 	'width' => '22%',
					),
					array(
			 		 	'name' => 'date_start',
			 		 	//'db_alias_to' => 'the_date',
			 		 	'vname' => 'LBL_LIST_DUE_DATE',
			 		 	'width' => '10%',
					),
					array(
			 		 	'name' => 'nothing',
						'widget_class' => 'SubPanelEditButton',
			 		 	'module' => 'Meetings',
			 		 	'width' => '2%',
					),
					array(
			 		 	'name' => 'nothing',
						'widget_class' => 'SubPanelRemoveButton',
						'linked_field' => 'meetings',
			 		 	'module' => 'Meetings',
			 		 	'width' => '2%',
					),
				),
				'where' => "(meetings.status='Planned')",
				'order_by' => 'meetings.date_start',
			),
			'Tasks' => array(
				'columns' => array(
					array(
			 		 	'name' => 'nothing',
						'widget_class' => 'SubPanelIcon',
			 		 	'module' => 'Tasks',
			 		 	'width' => '2%',
					),
					array(
			 		 	'name' => 'nothing',
						'widget_class' => 'SubPanelCloseButton',
			 		 	'module' => 'Tasks',
			 		 	'vname' => 'LBL_LIST_CLOSE',
			 		 	'width' => '6%',
					),
					array(
			 		 	'name' => 'name',
			 		 	'vname' => 'LBL_LIST_SUBJECT',
						'widget_class' => 'SubPanelDetailViewLink',
			 		 	'width' => '30%',
					),
					array(
			 		 	'name' => 'status',
						'widget_class' => 'SubPanelActivitiesStatusField',
			 		 	'vname' => 'LBL_LIST_STATUS',
			 		 	'width' => '15%',
					),
					array(
			 		 	'name' => 'contact_name',
			 		 	'module' => 'Contacts',
						'widget_class' => 'SubPanelDetailViewLink',
			 		 	'target_record_key' => 'contact_id',
			 		 	'target_module' => 'Contacts',
			 		 	'vname' => 'LBL_LIST_CONTACT',
			 		 	'width' => '11%',
					),
					array(
			 		 	'name' => 'parent_name',
			 		 	'module' => 'Tasks',
			 		 	'vname' => 'LBL_LIST_RELATED_TO',
			 		 	'width' => '22%',
					),
					array(
			 		 	'name' => 'date_start',
			 		 	//'db_alias_to' => 'the_date',
			 		 	'vname' => 'LBL_LIST_DUE_DATE',
			 		 	'width' => '10%',
					),
					array(
			 		 	'name' => 'nothing',
						'widget_class' => 'SubPanelEditButton',
			 		 	'module' => 'Tasks',
			 		 	'width' => '2%',
					),
					array(
			 		 	'name' => 'nothing',
						'widget_class' => 'SubPanelRemoveButton',
						'linked_field' => 'tasks',
			 		 	'module' => 'Tasks',
			 		 	'width' => '2%',
					),
				),
				'where' => "(tasks.status='Not Started' OR tasks.status='In Progress' OR tasks.status='Pending Input')",
				'order_by' => 'tasks.date_start',
			),
			'Calls' => array(
				'columns' => array(
					array(
			 		 	'name' => 'nothing',
						'widget_class' => 'SubPanelIcon',
			 		 	'module' => 'Calls',
			 		 	'width' => '2%',
					),
					array(
			 		 	'name' => 'nothing',
						'widget_class' => 'SubPanelCloseButton',
			 		 	'module' => 'Calls',
			 		 	'vname' => 'LBL_LIST_CLOSE',
			 		 	'width' => '6%',
					),
					array(
			 		 	'name' => 'name',
			 		 	'vname' => 'LBL_LIST_SUBJECT',
						'widget_class' => 'SubPanelDetailViewLink',
			 		 	'width' => '30%',
					),
					array(
			 		 	'name' => 'status',
						'widget_class' => 'SubPanelActivitiesStatusField',
			 		 	'vname' => 'LBL_LIST_STATUS',
			 		 	'width' => '15%',
					),
					array(
			 		 	'name' => 'contact_name',
			 		 	'module' => 'Contacts',
						'widget_class' => 'SubPanelDetailViewLink',
			 		 	'target_record_key' => 'contact_id',
			 		 	'target_module' => 'Contacts',
			 		 	'vname' => 'LBL_LIST_CONTACT',
			 		 	'width' => '11%',
					),
					array(
			 		 	'name' => 'parent_name',
			 		 	'module' => 'Calls',
			 		 	'vname' => 'LBL_LIST_RELATED_TO',
			 		 	'width' => '20%',
					),
					array(
			 		 	'name' => 'date_start',
			 		 	//'db_alias_to' => 'the_date',
			 		 	'vname'=>'LBL_LIST_DUE_DATE',
			 		 	'width' => '22%',
					),
					array(
			 		 	'name' => 'nothing',
						'widget_class' => 'SubPanelEditButton',
			 		 	'module' => 'Calls',
			 		 	'width' => '2%',
					),
					array(
			 		 	'name' => 'nothing',
						'widget_class' => 'SubPanelRemoveButton',
						'linked_field' => 'calls',
			 		 	'module' => 'Calls',
			 		 	'width' => '2%',
					),
				),
				'where' => "(calls.status='Planned')",
				'order_by' => 'calls.date_start',
			),
		),
	),
);
?>