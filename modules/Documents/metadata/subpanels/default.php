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



$subpanel_layout = array(
	'top_buttons' => array(
       array('widget_class' => 'SubPanelTopCreateButton'),
	   array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => 'Documents','field_to_name_array'=>array('document_revision_id'=>'REL_ATTRIBUTE_document_revision_id')),
	),

	'where' => '',
	
	

    'list_fields'=> array(
 	   'object_image'=>array(
            'vname' => 'LBL_OBJECT_IMAGE',
            'widget_class' => 'SubPanelIcon',
            'width' => '2%',
            'image2'=>'attachment',
            'image2_url_field'=> array(
                'id_field' => 'id',
                'filename_field' => 'filename',
            ),
            'attachment_image_only'=>true,
	   ),
       'document_name'=> array(
	    	'name' => 'document_name',
	 		'vname' => 'LBL_LIST_DOCUMENT_NAME',
			'widget_class' => 'SubPanelDetailViewLink',
			'width' => '20%',
	   ),
       'filename'=>array(
 	    	'name' => 'filename',
	 	    'vname' => 'LBL_LIST_FILENAME',
		    'width' => '20%',
            'module' => 'Documents',
            'sortable'=>false,
            'displayParams' => array(
                'module' => 'Documents',
            ),
		),
		'document_revision_id' => array(
	       'name' => 'document_revision_id',
	       'usage' => 'query_only',
	   ),
       'category_id'=>array(
 	    	'name' => 'category_id',
	 	    'vname' => 'LBL_LIST_CATEGORY',
		    'width' => '20%',
		),		
       'doc_type'=>array(
 	    	'name' => 'doc_type',
	 	    'vname' => 'LBL_LIST_DOC_TYPE',
		    'width' => '10%',
		),
       'status_id'=>array(
 	    	'name' => 'status_id',
	 	    'vname' => 'LBL_LIST_STATUS',
		    'width' => '10%',
		),
       'active_date'=>array(
 	    	'name' => 'active_date',
	 	    'vname' => 'LBL_LIST_ACTIVE_DATE',
		    'width' => '10%',
		),
        'get_latest'=>array(
			'widget_class' => 'SubPanelGetLatestButton',
		 	'module' => 'Documents',
			'width' => '5%',
		),
        'load_signed'=>array(
            'widget_class' => 'SubPanelLoadSignedButton',
            'module' => 'Documents',
            'width' => '5%',
        ),
		'edit_button'=>array(
			'vname' => 'LBL_EDIT_BUTTON',
			'widget_class' => 'SubPanelEditButton',
		 	'module' => 'Documents',
			'width' => '5%',
		),
		'remove_button'=>array(
			'vname' => 'LBL_REMOVE',
			'widget_class' => 'SubPanelRemoveButton',
		 	'module' => 'Documents',
			'width' => '5%',
		),
	),
);
?>