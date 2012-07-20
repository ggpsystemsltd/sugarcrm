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






class SugarWidgetSubPanelIcon extends SugarWidgetField
{
	function displayHeaderCell(&$layout_def)
	{
		return '&nbsp;';
	}

	function displayList(&$layout_def)
	{
		global $app_strings;
		global $app_list_strings;
		global $current_user;
		
		if(isset($layout_def['varname']))
		{
			$key = strtoupper($layout_def['varname']);
		}
		else
		{
			$key = $this->_get_column_alias($layout_def);
			$key = strtoupper($key);
		}
//add module image
		//add module image
		if(!empty($layout_def['target_module_key'])) { 
			if (!empty($layout_def['fields'][strtoupper($layout_def['target_module_key'])])) {
				$module=$layout_def['fields'][strtoupper($layout_def['target_module_key'])];
			}	
		}		
        
        if (empty($module)) {
			if(empty($layout_def['target_module']))
			{
				$module = $layout_def['module'];
			}
		else
			{
				$module = $layout_def['target_module'];
			}
		}
		$action = 'DetailView';
		if(empty($layout_def['target_record_key']))
		{
			$record = $layout_def['fields']['ID'];
		}
		else
		{
			$record_key = strtoupper($layout_def['target_record_key']);
			$record = $layout_def['fields'][$record_key];
		}
		$action_access = false;
		if(!empty($record) &&
			($layout_def[$action] && !$layout_def['owner_module'] 
			||  $layout_def[$action] && !ACLController::moduleSupportsACL($layout_def['owner_module']) 
			|| ACLController::checkAccess($layout_def['owner_module'], 'view', $layout_def['owner_id'] == $current_user->id))) {
			$action_access = true;
		}
		$icon_img_html = SugarThemeRegistry::current()->getImage( $module . '', 'border="0"',null,null,'.gif',$app_list_strings['moduleList'][$module]);
		if (!empty($layout_def['attachment_image_only']) && $layout_def['attachment_image_only'] == true) {
			$ret="";
		} else {
			if ($action_access) {
				$ret = '<a href="index.php?module=' . $module . '&action=' . $action . '&record=' . $record	. '" >' . $icon_img_html . "</a>";
			} else {
				$ret = $icon_img_html;
			}
		}

		if(!empty($layout_def['image2']) &&  !empty($layout_def['image2_ext_url_field'])){
 
			if (!empty($layout_def['fields'][strtoupper($layout_def['image2_ext_url_field'])])) {
				$link_url  = $layout_def['fields'][strtoupper($layout_def['image2_ext_url_field'])];						
			}

            $imagePath = '';
            if ( $layout_def['image2'] == '__VARIABLE' ) {
                if ( !empty($layout_def['fields'][$key.'_ICON']) ) {
                    $imagePath = $layout_def['fields'][$key.'_ICON'];
                }
            } else {
                $imagePath = $layout_def['image2'];
            }
 
            if ( !empty($imagePath) ) {
                $icon_img_html = SugarThemeRegistry::current()->getImage( $imagePath . '', 'border="0"',null,null,'.gif',$imagePath);
                $ret.= (empty($link_url)) ? '' : '&nbsp;<a href="' . $link_url. '" TARGET = "_blank">' . "$icon_img_html</a>";
            }
        }
//if requested, add attachement icon.
		if(!empty($layout_def['image2']) && !empty($layout_def['image2_url_field'])){

			if (is_array($layout_def['image2_url_field'])) {
				//Generate file url.
				if (!empty($layout_def['fields'][strtoupper($layout_def['image2_url_field']['id_field'])])
				and !empty($layout_def['fields'][strtoupper($layout_def['image2_url_field']['filename_field'])]) ) {
					
					$key=$layout_def['fields'][strtoupper($layout_def['image2_url_field']['id_field'])];
                    $file=$layout_def['fields'][strtoupper($layout_def['image2_url_field']['filename_field'])];
                    $filepath="index.php?entryPoint=download&id=".$key."&type=".$layout_def['module'];
				}
			} else {
				if (!empty($layout_def['fields'][strtoupper($layout_def['image2_url_field'])])) {
					$filepath="index.php?entryPoint=download&id=".$layout_def['fields']['ID']."&type=".$layout_def['module'];						
				}
			}
			$icon_img_html = SugarThemeRegistry::current()->getImage( $layout_def['image2'] . '', 'border="0"',null,null,'.gif',$layout_def['image2']);
			if ($action_access && !empty($filepath)) {
				$ret .= '<a href="' . $filepath. '" >' . "$icon_img_html</a>";
			} elseif (!empty($filepath)) {
				$ret .= $icon_img_html;
			}
		}
		// now handle attachments for Emails
		else if(!empty($layout_def['module']) && $layout_def['module'] == 'Emails' && !empty($layout_def['fields']['ATTACHMENT_IMAGE'])) {			
			$ret.= $layout_def['fields']['ATTACHMENT_IMAGE'];	
		}
		return $ret;
	}
}
?>