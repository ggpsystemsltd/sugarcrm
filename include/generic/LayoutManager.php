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







/**
 * Form layout manager
 * @api
 */
class LayoutManager
{
	var $defs = array();
	var $widget_prefix = 'SugarWidget';
	var $default_widget_name = 'Field';
	var $DBHelper;

	function LayoutManager()
	{
		// set a sane default for context
		$this->defs['context'] = 'Detail';
		$this->DBHelper = $GLOBALS['db'];
	}

	function setAttribute($key,$value)
	{
		$this->defs[$key] = $value;
	}

	function setAttributePtr($key,&$value)
	{
		$this->defs[$key] = $value;
	}

	function getAttribute($key)
	{
		if ( isset($this->defs[$key]))
		{
			return $this->defs[$key];
		} else {
			return null;
		}
	}

	// Take the class name from the widget definition and use the class to look it up
	// $use_default will default classes to SugarWidgetFieldxxxxx
	function getClassFromWidgetDef($widget_def, $use_default = false)
	{
		static $class_map = array(
			'SugarWidgetSubPanelTopCreateButton' => array(
				'widget_class'=>'SugarWidgetSubPanelTopButton',
				'title'=>'LBL_NEW_BUTTON_TITLE',
				'access_key'=>'LBL_NEW_BUTTON_KEY',
				'form_value'=>'LBL_NEW_BUTTON_LABEL',
				'ACL'=>'edit',
			),
            'SugarWidgetSubPanelTopButtonQuickCreate' => array(
                'widget_class'=>'SugarWidgetSubPanelTopButtonQuickCreate',
                'title'=>'LBL_NEW_BUTTON_TITLE',
                'access_key'=>'LBL_NEW_BUTTON_KEY',
                'form_value'=>'LBL_NEW_BUTTON_LABEL',
                'ACL'=>'edit',
            ),
			'SugarWidgetSubPanelTopScheduleMeetingButton' => array(
				'widget_class'=>'SugarWidgetSubPanelTopScheduleMeetingButton',
				'module'=>'Meetings',
				'title'=>'LBL_NEW_BUTTON_TITLE',
				'access_key'=>'LBL_NEW_BUTTON_KEY',
				'form_value'=>'LNK_NEW_MEETING',
				'ACL'=>'edit',
			),
			'SugarWidgetSubPanelTopScheduleCallButton' => array(
				'widget_class'=>'SugarWidgetSubPanelTopScheduleCallButton',
				'module'=>'Calls',
				'title'=>'LBL_NEW_BUTTON_TITLE',
				'access_key'=>'LBL_NEW_BUTTON_KEY',
				'form_value'=>'LNK_NEW_CALL',
				'ACL'=>'edit',
			),
			'SugarWidgetSubPanelTopCreateTaskButton' => array(
				'widget_class'=>'SugarWidgetSubPanelTopCreateTaskButton',
				'module'=>'Tasks',
				'title'=>'LBL_NEW_BUTTON_TITLE',
				'access_key'=>'LBL_NEW_BUTTON_KEY',
				'form_value'=>'LNK_NEW_TASK',
				'ACL'=>'edit',
			),
			'SugarWidgetSubPanelTopCreateNoteButton' => array(
				'widget_class'=>'SugarWidgetSubPanelTopCreateNoteButton',
				'module'=>'Notes',
				'title'=>'LBL_NEW_BUTTON_TITLE',
				'access_key'=>'LBL_NEW_BUTTON_KEY',
				'form_value'=>'LNK_NEW_NOTE',
				'ACL'=>'edit',
			),
			'SugarWidgetSubPanelTopCreateContactAccountButton' => array(
				'widget_class'=>'SugarWidgetSubPanelTopButton',
				'module'=>'Contacts',
				'title'=>'LBL_NEW_BUTTON_TITLE',
				'access_key'=>'LBL_NEW_BUTTON_KEY',
				'form_value'=>'LBL_NEW_BUTTON_LABEL',
        		'additional_form_fields' => array(
        			'primary_address_street' => 'shipping_address_street',
					'primary_address_city' => 'shipping_address_city',
					'primary_address_state' => 'shipping_address_state',
					'primary_address_country' => 'shipping_address_country',
					'primary_address_postalcode' => 'shipping_address_postalcode',
					'to_email_addrs' => 'email1'
					),
				'ACL'=>'edit',
			),
			'SugarWidgetSubPanelTopCreateContact' => array(
				'widget_class'=>'SugarWidgetSubPanelTopButton',
				'module'=>'Contacts',
				'title'=>'LBL_NEW_BUTTON_TITLE',
				'access_key'=>'LBL_NEW_BUTTON_KEY',
				'form_value'=>'LBL_NEW_BUTTON_LABEL',
        		'additional_form_fields' => array(
        			'account_id' => 'account_id',
					'account_name' => 'account_name',
				),
				'ACL'=>'edit',
			),
			'SugarWidgetSubPanelTopCreateRevisionButton'=> array(
				'widget_class'=>'SugarWidgetSubPanelTopButton',
				'module'=>'DocumentRevisions',
				'title'=>'LBL_NEW_BUTTON_TITLE',
				'access_key'=>'LBL_NEW_BUTTON_KEY',
				'form_value'=>'LBL_NEW_BUTTON_LABEL',
        		'additional_form_fields' => array(
        			'parent_name'=>'document_name',
					'document_name' => 'document_name',
					'document_revision' => 'latest_revision',
					'document_filename' => 'filename',
        			'document_revision_id' => 'document_revision_id',
				),
				'ACL'=>'edit',
			),

			'SugarWidgetSubPanelTopCreateDirectReport' => array(
				'widget_class'=>'SugarWidgetSubPanelTopButton',
				'module'=>'Contacts',
				'title'=>'LBL_NEW_BUTTON_TITLE',
				'access_key'=>'LBL_NEW_BUTTON_KEY',
				'form_value'=>'LBL_NEW_BUTTON_LABEL',
        		'additional_form_fields' => array(
        			'reports_to_name' => 'name',
					'reports_to_id' => 'id',
				),
				'ACL'=>'edit',
			),
			'SugarWidgetSubPanelTopSelectFromReportButton' => array(
				'widget_class'=>'SugarWidgetSubPanelTopSelectButton',
				'module'=>'Reports',
				'title'=>'LBL_SELECT_REPORTS_BUTTON_LABEL',
				'access_key'=>'LBL_SELECT_BUTTON_KEY',
				'form_value'=>'LBL_SELECT_REPORTS_BUTTON_LABEL',
				'ACL'=>'edit',
				'add_to_passthru_data'=>array (
					'return_type'=>'report',
				)
			),
			'SugarWidgetSubPanelAddToProspectListButton' => array(
				'widget_class'=>'SugarWidgetSubPanelTopSelectButton',
				'module'=>'ProspectLists',
				'title'=>'LBL_ADD_TO_PROSPECT_LIST_BUTTON_LABEL',
				'access_key'=>'LBL_ADD_TO_PROSPECT_LIST_BUTTON_KEY',
				'form_value'=>'LBL_ADD_TO_PROSPECT_LIST_BUTTON_LABEL',
				'ACL'=>'edit',
				'add_to_passthru_data'=>array (
					'return_type'=>'addtoprospectlist',
					'parent_module'=>'ProspectLists',
					'parent_type'=>'ProspectList',
					'child_id'=>'target_id',
					'link_attribute'=>'target_type',
					'link_type'=>'polymorphic',	 //polymorphic or default
				)
			),
		);

		$fieldDef = $this->getFieldDef($widget_def);
		if(!empty($fieldDef) &&  !empty($fieldDef['type']) && strtolower(trim($fieldDef['type'])) == 'multienum'){
				$widget_def['widget_class'] = 'Fieldmultienum';
		}
		if(!empty($fieldDef) &&  !empty($fieldDef['type']) && strtolower(trim($fieldDef['type'])) == 'bool'){
				$widget_def['widget_class'] = 'Fieldbool';
		}

        if($use_default) {
            switch($widget_def['name']) {
                case 'assigned_user_id':
                //bug 39170 - begin
                case 'created_by':
                case 'modified_user_id':
                //bug 39170 - end
                    $widget_def['widget_class'] = 'Fielduser_name';
                break;
                case 'team_id':
                    $widget_def['widget_class'] = 'Fieldteam_name';
                break;
                default:
                    if ( isset($widget_def['type']) ) {
                        $widget_def['widget_class'] = 'Field' . $widget_def['type'];
                    } else {
                        $widget_def['widget_class'] = 'Field' . $this->DBHelper->getFieldType($widget_def);
                    }
            }
        }

		if(!empty($widget_def['name']) && $widget_def['name'] == 'team_set_id'){
			$widget_def['widget_class'] = 'Fieldteam_set_id';
		}

		if(empty($widget_def['widget_class']))
		{
			// Default the class to SugarWidgetField
			$class_name = $this->widget_prefix.$this->default_widget_name;
		}
		else
		{
			$class_name = $this->widget_prefix.$widget_def['widget_class'];
		}

		// Check to see if this is one of the known class mappings.
		if(!empty($class_map[$class_name]))
		{
			if (empty($class_map[$class_name]['widget_class'])) {
				$widget = new SugarWidgetSubPanelTopButton($class_map[$class_name]);
			}  else {

				if (!class_exists($class_map[$class_name]['widget_class'])) {
					require_once('include/generic/SugarWidgets/'.$class_map[$class_name]['widget_class'].'.php');
				}

				$widget = new $class_map[$class_name]['widget_class']($class_map[$class_name]);
			}


			return $widget;
		}

		// At this point, we have a class name and we do not have a valid class defined.
		if(!class_exists($class_name))
		{

			// The class does not exist.  Try including it.
			if (file_exists('custom/include/generic/SugarWidgets/'.$class_name.'.php'))
				require_once('custom/include/generic/SugarWidgets/'.$class_name.'.php');
			else if (file_exists('include/generic/SugarWidgets/'.$class_name.'.php'))
				require_once('include/generic/SugarWidgets/'.$class_name.'.php');

			if(!class_exists($class_name))
			{
				// If we still do not have a class, oops....
				die("LayoutManager: Class not found:".$class_name);
			}
		}

		$widget = new $class_name($this); // cache disabled $this->getClassFromCache($class_name);
		return $widget;
	}

	// 27426
	function getFieldDef($widget_def){
        static $beanCache;
		if(!empty($widget_def['module']) &&!empty($GLOBALS['beanList'][$widget_def['module']]) && !empty($GLOBALS['beanFiles'][$GLOBALS['beanList'][$widget_def['module']]])){
            if (!isset($beanCache[$widget_def['module']])){
                $beanCache[$widget_def['module']] = new $GLOBALS['beanList'][$widget_def['module']]();
            }
            $bean = $beanCache[$widget_def['module']];
			if(!empty($widget_def['name']) && !empty($bean->field_name_map) &&!empty($bean->field_name_map[$widget_def['name']]) ){
				return $bean->field_name_map[$widget_def['name']];
			}
		}

		return null;
	}

	function widgetDisplay($widget_def, $use_default = false)
	{
		$theclass = $this->getClassFromWidgetDef($widget_def, $use_default);
 		$label = isset($widget_def['module']) ? $widget_def['module'] : '';
	    if (is_subclass_of($theclass, 'SugarWidgetSubPanelTopButton')) {
            $label = $theclass->get_subpanel_relationship_name($widget_def);
	    }
		$theclass->setWidgetId($label);

		//#27426
		$fieldDef = $this->getFieldDef($widget_def);
		if(!empty($fieldDef) &&  !empty($fieldDef['type']) && strtolower(trim($fieldDef['type'])) == 'multienum'){
				$widget_def['fields']  = sugarArrayMerge($widget_def['fields'] , $fieldDef);
				$widget_def['fields']['module']  = $label;
		}
		//end

		return $theclass->display($widget_def);
	}

	function widgetQuery($widget_def, $use_default = false)
	{
		$theclass = $this->getClassFromWidgetDef($widget_def, $use_default);
//				_pp($theclass);
		return $theclass->query($widget_def);
	}

	// display an input field
	// module is the parent module of the def
	function widgetDisplayInput($widget_def, $use_default = false)
	{
		$theclass = $this->getClassFromWidgetDef($widget_def, $use_default);
		return $theclass->displayInput($widget_def);
	}

}
?>
