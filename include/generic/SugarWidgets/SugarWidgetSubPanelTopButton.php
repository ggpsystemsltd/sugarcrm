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






class SugarWidgetSubPanelTopButton extends SugarWidget
{
    var $module;
	var $title;
	var $access_key;
	var $form_value;
	var $additional_form_fields;
	var $acl;

//TODO rename defines to layout defs and make it a member variable instead of passing it multiple layers with extra copying.

	/** Take the keys for the strings and look them up.  Module is literal, the rest are label keys
	*/
	function SugarWidgetSubPanelTopButton($module='', $title='', $access_key='', $form_value='')
	{
		global $app_strings;

		if(is_array($module))
		{
			// it is really the class details from the mapping
			$class_details = $module;

			// If keys were passed into the constructor, translate them from keys to values.
			if(!empty($class_details['module']))
				$this->module = $class_details['module'];
			if(!empty($class_details['title']))
				$this->title = $app_strings[$class_details['title']];
			if(!empty($class_details['access_key']))
				$this->access_key = $app_strings[$class_details['access_key']];
			if(!empty($class_details['form_value']))
				$this->form_value = translate($class_details['form_value'], $this->module);
			if(!empty($class_details['additional_form_fields']))
				$this->additional_form_fields = $class_details['additional_form_fields'];
			if(!empty($class_details['ACL'])){
				$this->acl = $class_details['ACL'];
			}
		}
		else
		{
			$this->module = $module;

			// If keys were passed into the constructor, translate them from keys to values.
			if(!empty($title))
				$this->title = $app_strings[$title];
			if(!empty($access_key))
				$this->access_key = $app_strings[$access_key];
			if(!empty($form_value))
				$this->form_value = translate($form_value, $module);
		}
	}

    function &_get_form($defines, $additionalFormFields = null, $asUrl = false)
    {
        global $app_strings;
        global $currentModule;

        // Create the additional form fields with real values if they were not passed in
        if(empty($additionalFormFields) && $this->additional_form_fields)
        {
            foreach($this->additional_form_fields as $key=>$value)
            {
                if(!empty($defines['focus']->$value))
                {
                    $additionalFormFields[$key] = $defines['focus']->$value;
                }
                else
                {
                    $additionalFormFields[$key] = '';
                }
            }
        }


		if(!empty($this->module))
        {
            $defines['child_module_name'] = $this->module;
        }
        else
        {
            $defines['child_module_name'] = $defines['module'];
        }

        $defines['parent_bean_name'] = get_class( $defines['focus']);
		$relationship_name = $this->get_subpanel_relationship_name($defines);


        $formValues = array();

        //module_button is used to override the value of module name
        $formValues['module'] = $defines['child_module_name'];
        $formValues[strtolower($defines['parent_bean_name'])."_id"] = $defines['focus']->id;

        if(isset($defines['focus']->name))
        {
            $formValues[strtolower($defines['parent_bean_name'])."_name"] = $defines['focus']->name;
            // #26451,add these fields for custom one-to-many relate field.
            if(!empty($defines['child_module_name'])){
                $formValues[$relationship_name."_name"] = $defines['focus']->name;
            	$childFocusName = !empty($GLOBALS['beanList'][$defines['child_module_name']]) ? $GLOBALS['beanList'][$defines['child_module_name']] : "";
            	if(!empty($GLOBALS['dictionary'][ $childFocusName ]["fields"][$relationship_name .'_name']['id_name'])){
            		$formValues[$GLOBALS['dictionary'][ $childFocusName ]["fields"][$relationship_name .'_name']['id_name']] = $defines['focus']->id;
            	}
            }
        }

        $formValues['return_module'] = $currentModule;

        if($currentModule == 'Campaigns'){
            $formValues['return_action'] = "DetailView";
        }else{
            $formValues['return_action'] = $defines['action'];
            if ( $formValues['return_action'] == 'SubPanelViewer' ) {
                $formValues['return_action'] = 'DetailView';
            }
        }

        $formValues['return_id'] = $defines['focus']->id;
        $formValues['return_relationship'] = $relationship_name;
        switch ( strtolower( $currentModule ) )
        {
            case 'prospects' :
                $name = $defines['focus']->account_name ;
                break ;
            case 'documents' :
                $name = $defines['focus']->document_name ;
                break ;
            case 'kbdocuments' :
                $name = $defines['focus']->kbdocument_name ;
                break ;
            case 'leads' :
            case 'contacts' :
                $name = $defines['focus']->first_name . " " .$defines['focus']->last_name ;
                break ;
            default :
               $name = (isset($defines['focus']->name)) ? $defines['focus']->name : "";
        }
        $formValues['return_name'] = $name;

        // TODO: move this out and get $additionalFormFields working properly
        if(empty($additionalFormFields['parent_type']))
        {
            if($defines['focus']->object_name=='Contact') {
                $additionalFormFields['parent_type'] = 'Accounts';
            }
            else {
                $additionalFormFields['parent_type'] = $defines['focus']->module_dir;
            }
        }
        if(empty($additionalFormFields['parent_name']))
        {
            if($defines['focus']->object_name=='Contact') {
                $additionalFormFields['parent_name'] = $defines['focus']->account_name;
                $additionalFormFields['account_name'] = $defines['focus']->account_name;
            }
            else {
                $additionalFormFields['parent_name'] = $defines['focus']->name;
            }
        }
        if(empty($additionalFormFields['parent_id']))
        {
            if($defines['focus']->object_name=='Contact') {
                $additionalFormFields['parent_id'] = $defines['focus']->account_id;
                $additionalFormFields['account_id'] = $defines['focus']->account_id;
            } else if($defines['focus']->object_name=='Contract') {
            	$additionalFormFields['contract_id'] = $defines['focus']->id;
            } else {
                $additionalFormFields['parent_id'] = $defines['focus']->id;
            }
        }

        if ($defines['focus']->object_name=='Opportunity') {
            $additionalFormFields['account_id'] = $defines['focus']->account_id;
            $additionalFormFields['account_name'] = $defines['focus']->account_name;
        }

        if (!empty($defines['child_module_name']) and $defines['child_module_name']=='Contacts' and !empty($defines['parent_bean_name']) and $defines['parent_bean_name']=='contact' ) {
            if (!empty($defines['focus']->id ) and !empty($defines['focus']->name)) {
                $formValues['reports_to_id'] = $defines['focus']->id;
                $formValues['reports_to_name'] = $defines['focus']->name;
            }
        }
        $formValues['action'] = "EditView";

        if ( $asUrl ) {
            $returnLink = '';
            foreach($formValues as $key => $value ) {
                $returnLink .= $key.'='.$value.'&';
            }
            foreach($additionalFormFields as $key => $value ) {
                $returnLink .= $key.'='.$value.'&';
            }
            $returnLink = rtrim($returnLink,'&');

            return $returnLink;
        } else {

            $form = 'form' . $relationship_name;
            $button = '<form action="index.php" method="post" name="form" id="' . $form . "\">\n";
            foreach($formValues as $key => $value) {
                $button .= "<input type='hidden' name='" . $key . "' value='" . $value . "' />\n";
            }

            // fill in additional form fields for all but action
            foreach($additionalFormFields as $key => $value) {
                if($key != 'action') {
                    $button .= "<input type='hidden' name='" . $key . "' value='" . $value . "' />\n";
                }
            }


        return $button;
        }
    }

	/** This default function is used to create the HTML for a simple button */
	function display($defines, $additionalFormFields = null)
	{
		$temp='';
		$inputID = $this->getWidgetId() . '_'.preg_replace('[ ]', '', strtolower($this->form_value)).'_button';

		if(!empty($this->acl) && ACLController::moduleSupportsACL($defines['module'])  &&  !ACLController::checkAccess($defines['module'], $this->acl, true)){
			$inputID = $this->getWidgetId() . '_'.preg_replace('[ ]', '', strtolower($this->form_value)).'_button';
			$button = "<input title='$this->title'  class='button' type='button' name='$inputID' id='$inputID' value='  $this->form_value  ' disabled/>\n</form>";
			return $temp;
		}

		global $app_strings;

        if ( isset($_REQUEST['layout_def_key']) && $_REQUEST['layout_def_key'] == 'UserEAPM' ) {
            // Subpanels generally don't go on the editview, so we have to handle this special
            $megaLink = $this->_get_form($defines, $additionalFormFields,true);
            $button = "<input title='$this->title'  class='button' type='submit' name='$inputID' id='$inputID' value='  $this->form_value  ' onclick='javascript:document.location=\"index.php?".$megaLink."\"; return false;'/>";
        } else {
            $button = $this->_get_form($defines, $additionalFormFields);
            $button .= "<input title='$this->title' class='button' type='submit' name='$inputID' id='$inputID' value='  $this->form_value  ' />\n</form>";
        }
        return $button;
	}

	/**
	 * Returns a string that is the JSON encoded version of the popup request.
	 * Perhaps this function should be moved to a more globally accessible location?
	 */
	function _create_json_encoded_popup_request($popup_request_data)
	{
		$popup_request_array = array();

		if(!empty($popup_request_data['call_back_function']))
		{
			$popup_request_array[] = '"call_back_function":"' . $popup_request_data['call_back_function'] . '"';
		}

		if(!empty($popup_request_data['form_name']))
		{
			$popup_request_array[] = '"form_name":"' . $popup_request_data['form_name'] . '"';
		}

		if(!empty($popup_request_data['field_to_name_array']))
		{
			$field_to_name_array = array();
			foreach($popup_request_data['field_to_name_array'] as $field => $name)
			{
				$field_to_name_array[] = '"' . $field . '":"' . $name . '"';
			}

			$popup_request_array[] = '"field_to_name_array":{' . implode(',', $field_to_name_array) . '}';
		}

		if(!empty($popup_request_data['passthru_data']))
		{
			$passthru_array = array();
			foreach($popup_request_data['passthru_data'] as $field => $name)
			{
				$passthru_array[] = '"' . $field . '":"' . $name . '"';
			}

			$popup_request_array[] = '"passthru_data":{' . implode(',', $passthru_array) . '}';
		}

		$encoded_popup_request = '{' . implode(',', $popup_request_array) . '}';

		return $encoded_popup_request;
	}

	/**
	 * get_subpanel_relationship_name
	 * Get the relationship name based on the subapnel definition
	 * @param mixed $defines The subpanel definition
	 */
	function get_subpanel_relationship_name($defines) {
		 $relationship_name = '';
		 if(!empty($defines)) {
		 	$relationship_name = isset($defines['module']) ? $defines['module'] : '';
	     	$dataSource = $defines['subpanel_definition']->get_data_source_name(true);
         	if (!empty($dataSource)) {
				$relationship_name = $dataSource;
				//Try to set the relationship name to the real relationship, not the link.
				if (!empty($defines['subpanel_definition']->parent_bean->field_defs[$dataSource])
				 && !empty($defines['subpanel_definition']->parent_bean->field_defs[$dataSource]['relationship']))
				{
					$relationship_name = $defines['subpanel_definition']->parent_bean->field_defs[$dataSource]['relationship'];
				}
			}
		 }
		 return $relationship_name;
	}

}
?>
