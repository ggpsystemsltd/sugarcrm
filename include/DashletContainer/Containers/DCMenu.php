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


class DCMenu extends DashletContainer
{
	protected function getMenuItem($module)
	{
	    $imageURL = SugarThemeRegistry::current()->getImageURL("icon_{$module}_bar_32.png");
		$imageName = "icon_{$module}_bar_32.png";
	    if (empty($imageURL))
	    	$imageName = "icon_generic_bar_32.png";
	    $module_mod_strings = return_module_language($GLOBALS['current_language'], $module);
	    if ( isset($module_mod_strings['LNK_NEW_RECORD']) )
	        $createRecordTitle = $module_mod_strings['LNK_NEW_RECORD'];
	    elseif ( isset($module_mod_strings['LNK_NEW_'.strtoupper($GLOBALS['beanList'][$module])]) )
	        $createRecordTitle = $module_mod_strings['LNK_NEW_'.strtoupper($GLOBALS['beanList'][$module])];
	    elseif ( strtoupper($GLOBALS['beanList'][$module]) == 'ACASE' && isset($module_mod_strings['LNK_NEW_CASE']) )
	        $createRecordTitle = $module_mod_strings['LNK_NEW_CASE'];
        else
	        $createRecordTitle = $GLOBALS['app_strings']['LBL_CREATE_BUTTON_LABEL'].' '.$module_mod_strings['LBL_MODULE_NAME'];

	    $image = SugarThemeRegistry::current()->getImage($imageName, "class='icon' alt='{$createRecordTitle}' title='{$createRecordTitle}' id='dcMenu_{$module}_quick_create_icon'");
	    return <<<EOQ
		<li><a href="#" onclick="if ( DCMenu.menu ) DCMenu.menu('$module','$createRecordTitle', true); return false;">{$image}</a></li>
EOQ;
	}

	protected function getDynamicMenuItem($def)
	{
  	if (!empty($def['icon']))
        {
		$imageName = basename($def['icon']);
        } else {
	    	$imageName = "icon_generic_bar_32.png";
        }
        
	    $module = !empty($def['module']) ? $def['module'] : "";
	    $label = isset($def['label']) ? translate($def['label'], $module) : "";
        $modal = isset($def['modal']) ? $def['modal'] : true;
	    $action = isset($def['action']) ? $def['action'] : "DCMenu.menu('$module','$label', $modal); return false;";
	    $script = isset($def['script_url']) ? '<script type="text/javascript" src="' . $def['script_url'] . '"></script>' : "";
        $url = "#";
        $otherAttributes = "onclick=\"{$action}\"";
        $image = SugarThemeRegistry::current()->getLink($url, $label, $otherAttributes, $imageName, 'class="icon" border="0"', null, null, $label);
	    return "<li>$script $image</li>";
	}

	public function getLayout()
	{
		$record = !empty($_REQUEST['record'])?$_REQUEST['record']:'';
		$module = !empty($_REQUEST['module'])?$_REQUEST['module']:'';

		global $current_user;
				$notificationsHTML = '';
		if(is_admin($current_user)){
		    $shouldSkip = sugar_cache_retrieve('dcmenu_check_notifications');
		    $unreadNotifications = 0;
		    if ( $shouldSkip != '1' ) {
                require_once('modules/Notifications/Notifications.php');
                $n = new Notifications();
                $unreadNotifications = $n->getSystemNotificationsCount();
                if ( $unreadNotifications == 0 )
                    sugar_cache_put('dcmenu_check_notifications','1');
            }

        $url = "#";
        $otherAttributes = "onclick=\"DCMenu.notificationsList(); return false;\" class=\"notice\"";
		if($unreadNotifications > 0) {
			$iconImage = "dcMenuSugarCube_alert.png";
			$code = '<div id="notifCount" class="notifCount">'.$unreadNotifications.'</div>';
			$class = "";
		} else {
			$iconImage = "dcMenuSugarCube.png";
			$code = '';
			$class = ' class="none"';
		}

		$image = SugarThemeRegistry::current()->getLink($url, '', $otherAttributes, $iconImage, 'class="dc_notif_icon" border="0" alt="'.$unreadNotifications.' '.$GLOBALS['app_strings']['LBL_PENDING_NOTIFICATIONS'].'"');

		$notificationsHTML = <<<EOQ

			<div id="dcmenuSugarCube" $class>
			  $image
			  $code
			</div>

EOQ;
		} else {
			$iconImage = SugarThemeRegistry::current()->getImage("dcMenuSugarCube.png", 'class="dc_notif_icon" border="0"');
				$code = '';
				$class = ' class="none"';
				$notificationsHTML = <<<EOQ

			<div id="dcmenuSugarCube" $class>
			  $iconImage
			  $code
			</div>
EOQ;
		}
		$action = $GLOBALS['app']->controller->action;
		$html = getVersionedScript('include/DashletContainer/Containers/DCMenu.js');

        if (!is_file(sugar_cached("include/javascript/sugar_field_grp.js"))) {
            $_REQUEST['root_directory'] = ".";
            require_once("jssource/minify_utils.php");
            ConcatenateFiles(".");
        }
        $html .= getVersionedScript('cache/include/javascript/sugar_field_grp.js');
        $html .= <<<EOQ
		<script>
		YUI({combine: true, timeout: 10000, base:"include/javascript/yui3/build/", comboBase:"index.php?entryPoint=getYUIComboFile&"}).use('node-base', 'event-key', function(Y){
			function init(){
				DCMenu.module = '$module';
				DCMenu.record = '$record';
				DCMenu.action = '$action';

				// store the return value from Y.on to remove the listener later
    			var handle = Y.on('key', function(e) {
        			DCMenu.spot(document.getElementById('sugar_spot_search').value);
        			e.halt();
				 }, '#sugar_spot_search', 'down:13', Y);


			}
	    	YAHOO.util.Event.onDOMReady(init);

		});
		</script>
EOQ;
		$html .= <<<EOQ
		<div id='dcmenutop'></div>
		<div id='dcmenu' class='dcmenu dcmenuFloat'>
		{$notificationsHTML}
		<div class="dcmenuDivider" id="notificationsDivider"></div>

		<div id="dcmenuContainer">
		<ul id="dcmenuitems">

EOQ;
        $DCActions = array();
        $dynamicDCActions = array();
		$actions_path = "include/DashletContainer/Containers/DCActions.php";
		if (is_file('custom/' . $actions_path))
		    include('custom/' . $actions_path);
		else
		    include($actions_path);
		if (is_file('custom/application/Ext/DashletContainer/Containers/dcactions.ext.php'))
			include 'custom/application/Ext/DashletContainer/Containers/dcactions.ext.php';

		foreach($DCActions as $action){
			if(ACLController::checkAccess($action, 'edit', true)) {
			   $html .= $this->getMenuItem($action);
			}
		}

		$dyn_actions_path = "include/DashletContainer/Containers/DynamicDCActions.php";
		if (is_file('custom/' . $dyn_actions_path)) {
		    include('custom/' . $dyn_actions_path);
		} else if ( is_file($dyn_actions_path) ) {
		    include($dyn_actions_path);
        }
		if (is_file('custom/application/Ext/DashletContainer/Containers/dynamicdcactions.ext.php')) {
			include 'custom/application/Ext/DashletContainer/Containers/dynamicdcactions.ext.php';
        }

		foreach($dynamicDCActions as $def){
			$html .= $this->getDynamicMenuItem($def);
		}

        $url = "#";
        $otherAttributes = "onclick=\"DCMenu.spot(document.getElementById('sugar_spot_search').value); return false;\"";
		$iconSearch = SugarThemeRegistry::current()->getLink($url, '', $otherAttributes, "dcMenuSearchBtn.png", 'class="icon" align="top"',null,null,$GLOBALS['app_strings']['LBL_ALT_SPOT_SEARCH']);
		$html .= <<<EOQ
		</ul>
		</div>
EOQ;
$globalSearchAccKey = $GLOBALS['app_strings']['LBL_GLOBAL_SEARCH_LNK_KEY'];
$html .= <<<EOQ
		<div id="dcmenuSearchDiv"><div id="sugar_spot_search_div"><input size=20 id='sugar_spot_search'  title='enter global search term' accesskey='$globalSearchAccKey'></div>
		<div id="glblSearchBtn">$iconSearch</div>
EOQ;
$html .= <<<EOQ
		</div>
		</div>

EOQ;
		return array('html'=>$html, 'jsfiles'=>array());
	}
}
