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





//this widget is used only by the document subpanel under contracts.
class SugarWidgetSubPanelLoadSignedButton extends SugarWidgetField
{
	function displayHeaderCell(&$layout_def)
	{
		return '&nbsp;';
	}

	function displayList(&$layout_def)
	{
		global $app_strings;
		

		$href = 'index.php?module=' . 'Documents'
			. '&action=' . 'EditView'
			. '&record=' . $layout_def['fields']['ID']
			. '&return_module=' . $_REQUEST['module']
			. '&return_action=' . 'DetailView'
			. '&return_id=' . $_REQUEST['record']
			. '&load_signed_id=' . $layout_def['fields']['LINKED_ID']
			. '&parent_id=' . $_REQUEST['record']			
			. '&parent_name=' . $layout_def['fields']['CONTRACT_NAME']			
			. '&parent_type=' . $_REQUEST['module']			
			. '&selected_revision_id=' . $layout_def['fields']['SELECTED_REVISION_ID']	
			;

		$edit_icon_html = SugarThemeRegistry::current()->getImage( 'loadSignedDocument','align="absmiddle" border="0"',null,null,'.gif',$app_strings['LNK_LOAD_SIGNED']);
		//if the contract state is executed or document is not a template hide this action.
		if ((!empty($layout_def['fields']['CONTRACT_STATUS']) && $layout_def['fields']['CONTRACT_STATUS']=='executed') or
			empty($layout_def['fields']['IS_TEMPLATE']) or $layout_def['fields']['IS_TEMPLATE']==0) {
			return "";
		}
		return '<a href="' . $href . '"' . "title ='". $app_strings['LNK_LOAD_SIGNED_TOOLTIP']."'"
			. 'class="listViewTdToolsS1">' . $edit_icon_html . '&nbsp;' . $app_strings['LNK_LOAD_SIGNED'] .'</a>&nbsp;';
	}
		
}
?>