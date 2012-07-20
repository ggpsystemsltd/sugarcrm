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

/*
 * Created on May 14, 2007
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 //format '<action_name>' => '<view_name>',
 $action_view_map = array(
 						'index' => 'main',
 						'module'=>'module',
 						'modulefields'=>'modulefields',
 						'modulelabels'=>'modulelabels',
 						'relationships'=>'relationships',
 						'relationship'=>'relationship',
                        'resetmodule'=>'resetmodule',
 						'modulefield'=>'modulefield',
 						'displaydeploy'=>'displaydeploy',
 						'package'=>'package',
 						'dropdown'=>'dropdown',
 						'dropdowns'=>'dropdowns',
 						'detailview' => 'detail',
 						'editview' => 'edit',
 						'popup' => 'popup',
 						'home'=>'home',
                        'visibilityeditor' => 'visibilityeditor',
 						'exportcustomizations'=>'exportcustomizations',

 					);
    // add those we need from the global action_view_map
    $action_view_map['dc'] = 'dc';
    $action_view_map['dcajax'] = 'dcajax';
    $action_view_map['quick'] = 'quick';
    $action_view_map['quickcreate'] = 'quickcreate';
    $action_view_map['spot'] = 'spot';
    $action_view_map['inlinefield'] = 'inlinefield';
    $action_view_map['inlinefieldsave'] = 'inlinefieldsave';
    $action_view_map['pluginlist'] = 'plugins';
    $action_view_map['downloadplugin'] = 'downloadplugin';
?>
