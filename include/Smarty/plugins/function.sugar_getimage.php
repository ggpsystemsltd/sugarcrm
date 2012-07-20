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


/**
 * Smarty {sugar_getimage} function plugin
 *
 * Type:     function
 * Name:     sugar_getimage
 * Purpose:  Returns HTML image or sprite
 * 
 * @author Aamir Mansoor (amansoor@sugarcrm.com) 
 * @author Cam McKinnon (cmckinnon@sugarcrm.com)
 * @param array
 * @param Smarty
 */

function smarty_function_sugar_getimage($params, &$smarty) {

	// error checking for required parameters
	if(!isset($params['name'])) 
		$smarty->trigger_error($GLOBALS['app_strings']['ERR_MISSING_REQUIRED_FIELDS'] . 'name');

	// temp hack to deprecate the use of other_attributes
	if(isset($params['other_attributes']))
		$params['attr'] = $params['other_attributes'];

	// set defaults
	if(!isset($params['attr']))
		$params['attr'] = '';
	if(!isset($params['width']))
		$params['width'] = null;
	if(!isset($params['height']))
		$params['height'] = null;
	if(!isset($params['alt'])) 
		$params['alt'] = '';

	// deprecated ?
	if(!isset($params['ext']))
		$params['ext'] = null;

	return SugarThemeRegistry::current()->getImage($params['name'], $params['attr'], $params['width'], $params['height'], $params['ext'], $params['alt']);	
}
?>
