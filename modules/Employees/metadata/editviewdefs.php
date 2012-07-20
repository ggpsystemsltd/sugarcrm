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

$viewdefs['Employees']['EditView'] = array(
    'templateMeta' => array('maxColumns' => '2', 
                            'widths' => array(
                                            array('label' => '10', 'field' => '30'), 
                                            array('label' => '10', 'field' => '30')
                                            ),
                            ),
 'panels' =>array (

  'default'=>array (
	    array (
	      'employee_status',
            array (
              'name'=>'picture',
              'label'=>'LBL_PICTURE_FILE',
            ),
	    ),
	    array (
	      'first_name',
	      array('name'=>'last_name', 'displayParams'=>array('required'=>true)),
	    ),
	    array (
	      array(
              'name'=>'title',
              'customCode' => '{if $EDIT_REPORTS_TO}<input type="text" name="{$fields.title.name}" id="{$fields.title.name}" size="30" maxlength="50" value="{$fields.title.value}" title="" tabindex="t" >'.
                              '{else}{$fields.title.value}<input type="hidden" name="{$fields.title.name}" id="{$fields.title.name}" value="{$fields.title.value}">{/if}'),
	      array('name'=>'phone_work','label'=>'LBL_OFFICE_PHONE'),
	    ),
	    array (
	      array(
              'name'=>'department', 
              'customCode' => '{if $EDIT_REPORTS_TO}<input type="text" name="{$fields.department.name}" id="{$fields.department.name}" size="30" maxlength="50" value="{$fields.department.value}" title="" tabindex="t" >'.
                              '{else}{$fields.department.value}<input type="hidden" name="{$fields.department.name}" id="{$fields.department.name}" value="{$fields.department.value}">{/if}'),
	      'phone_mobile',
	    ),
	    array (
	    	array(
	      		'name' => 'reports_to_name',
	      		'label' => 'LBL_REPORTS_TO_NAME',
	      		'customCode' => '{if $EDIT_REPORTS_TO}<input type="text" name="{$fields.reports_to_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.reports_to_name.name}" size="" value="{$fields.reports_to_name.value}" title="" autocomplete="off" >{$REPORTS_TO_JS}'.
								'<input type="hidden" name="{$fields.reports_to_id.name}" id="{$fields.reports_to_id.name}" value="{$fields.reports_to_id.value}">'.
                ' <span class="id-ff multiple"><button type="button" name="btn_{$fields.reports_to_name.name}" tabindex="0" title="{$APP.LBL_SELECT_BUTTON_TITLE}" class="button firstChild" value="{$APP.LBL_SELECT_BUTTON_LABEL}" onclick=\'open_popup("{$fields.reports_to_name.module}", 600, 400, "", true, false, {literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"reports_to_id","name":"reports_to_name"}}{/literal}, "single", true);\'>'.SugarThemeRegistry::current()->getImage('id-ff-select', '', null, null, ".png", translate('LBL_SELECT','Employees')).'</button>'.


                '<button type="button" name="btn_clr_{$fields.reports_to_name.name}" tabindex="0" title="{$APP.LBL_CLEAR_BUTTON_TITLE}" class="button lastChild" onclick="this.form.{$fields.reports_to_name.name}.value = \'\'; this.form.{$fields.reports_to_id.name}.value = \'\';" value="{$APP.LBL_CLEAR_BUTTON_LABEL}">'.SugarThemeRegistry::current()->getImage('id-ff-clear', '', null, null, ".png", translate('LBL_FF_CLEAR','Employees')).'</button></span>'.


								'{else}{$fields.reports_to_name.value}<input type="hidden" name="{$fields.reports_to_id.name}" id="{$fields.reports_to_id.name}" value="{$fields.reports_to_id.value}">{/if}',
	      	),
	      'phone_other',
	    ),
	    array (
	      '',
	      array('name'=>'phone_fax', 'label'=>'LBL_FAX'),
	    ),
	    array (
	      '',
	      'phone_home',
	    ),
	    array (
	      'messenger_type',
	    ),
	    array (
	      'messenger_id',
	    ),
	    array (
	      array('name'=>'description', 'label'=>'LBL_NOTES'),
	    ),
	    array (
	      array('name'=>'address_street', 'type'=>'text', 'label'=>'LBL_PRIMARY_ADDRESS', 'displayParams'=>array('rows'=>2, 'cols'=>30)),
	      array('name'=>'address_city', 'label'=>'LBL_CITY'),
	    ),
	    array (
	      array('name'=>'address_state', 'label'=>'LBL_STATE'),
	      array('name'=>'address_postalcode', 'label'=>'LBL_POSTAL_CODE'),
	    ),
	    array (
	      array('name'=>'address_country', 'label'=>'LBL_COUNTRY'),
	    ),
        array(
          array (
              'name' => 'email1',
              'label' => 'LBL_EMAIL',
            ),
  		),
   ),
),

);
?>