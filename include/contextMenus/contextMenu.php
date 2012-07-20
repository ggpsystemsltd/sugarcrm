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


class contextMenu {
    var $menuItems;
    var $objectName;
    
    function contextMenu() {
        $this->menuItems = array();
    } 

    function getScript() {
        $json = getJSONobj();
        return "SUGAR.contextMenu.registerObjectType('{$this->objectName}', " . $json->encode($this->menuItems) . ");\n";
    }
    
    /**
     * adds a menu item to the current contextMenu
     * 
     * @param string $text text of the item
     * @param string $action function or pointer to the javascript function to call
     * @param array $params other parameters includes:
     *      url - The URL for the MenuItem's anchor's "href" attribute.
     *      target - The value to be used for the MenuItem's anchor's "target" attribute.
     *      helptext - Additional instructional text to accompany the text for a MenuItem. Example: If the text is 
     *                 "Copy" you might want to add the help text "Ctrl + C" to inform the user there is a keyboard
     *                 shortcut for the item.
     *      emphasis - If set to true the text for the MenuItem will be rendered with emphasis (using <em>).
     *      strongemphasis - If set to true the text for the MenuItem will be rendered with strong emphasis (using <strong>).
     *      disabled - If set to true the MenuItem will be dimmed and will not respond to user input or fire events.
     *      selected - If set to true the MenuItem will be highlighted.
     *      submenu - Appends / removes a menu (and it's associated DOM elements) to / from the MenuItem.
     *      checked - If set to true the MenuItem will be rendered with a checkmark.
     */
    function addMenuItem($text, $action, $module = null, $aclAction = null, $params = null) {
        // check ACLs if module and aclAction set otherwise no ACL check
        if(((!empty($module) && !empty($aclAction)) && ACLController::checkAccess($module, $aclAction)) || (empty($module) || empty($aclAction))) {
            $item = array('text' => translate($text),
                          'action' => $action);
            foreach(array('url', 'target', 'helptext', 'emphasis', 'strongemphasis', 'disabled', 'selected', 'submenu', 'checked') as $param) {
                if(!empty($params[$param])) $item[$param] = $params[$param];
            }
            array_push($this->menuItems, $item);
        }
    }
    
    /**
     * Loads up menu items from files located in include/contextMenus/menuDefs
     * @param string $name name of the object
     */
    function loadFromFile($name) {
        global $menuDef;
    	clean_string($name, 'FILE');
        require_once('include/contextMenus/menuDefs/' . $name . '.php');
        $this->loadFromDef($name, $menuDef[$name]);
    }
    
    /**
     * Loads up menu items from def
     * @param string $name name of the object type
     * @param array $defs menu item definitions
     */
    function loadFromDef($name, $defs) {
        $this->objectName = $name;
        foreach($defs as $def) {
            $this->addMenuItem($def['text'], $def['action'], 
                               (empty($def['module']) ? null : $def['module']), 
                               (empty($def['aclAction']) ? null : $def['aclAction']), 
                               (empty($def['params']) ? null : $def['params']));
        }
    }
}
?>
