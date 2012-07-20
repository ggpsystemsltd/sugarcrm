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

require_once ('modules/ModuleBuilder/MB/ModuleBuilder.php') ;
require_once ('modules/ModuleBuilder/parsers/ParserFactory.php') ;

class ExpressionEngineController extends SugarController
{
	var $action_remap = array ( ) ;
    var $non_admin_actions = array("functionDetail", "execFunction", "getRelatedField", "getRelatedValue");
	
	function process(){
    	$GLOBALS [ 'log' ]->info ( get_class($this).":" ) ;
        global $current_user;
        $access = get_admin_modules_for_user($current_user);
		//Non admins can still execute functions
        if((!empty($_REQUEST['action']) && in_array($_REQUEST['action'], $this->non_admin_actions))
           || $this->isModuleAdmin($access))
        {
            $this->hasAccess = true;
        }
        else
        {
            $this->hasAccess = false;
        }
        parent::process();
    }

    function isModuleAdmin($access)
    {
        global $current_user;
        //Global admins have full access
        if (is_admin($current_user))
            return true;

        $module = "";
        if (!empty($_REQUEST['targetModule']))
            $module = $_REQUEST['targetModule'];
        if (!empty($_REQUEST['tmodule']))
            $module = $_REQUEST['tmodule'];

        //If the user is an admin of some module, and no module was set, assume they have access.
        if (is_admin_for_any_module($current_user) && empty($module) && (isset($_REQUEST['action']) && $_REQUEST['action'] != 'package')){
            return true;
        }

        //If the module was set, check that the user has access
        if (!empty($module) && in_array($module, $access)) {
            return true;
        }
    }

    function ExpressionEngineController() {
		$this->view = 'editFormula';
	}
	
	function action_editFormula ()
    {
     	$this->view = 'editFormula';  
    }

    function action_editDepDropdown ()
    {
     	$this->view = 'editDepDropdown';
    }
    
	function action_index ()
    {
     	$this->view = 'index';  
    }
    
	function action_cfTest ()
    {
     	$this->view = 'cfTest';  
    }
    
	function action_list ()
    {
     	$this->view = 'index';  
    }

    function action_relFields ()
    {
     	$this->view = 'relFields';  
    }

    function action_execFunction ()
    {
     	$this->view = 'execFunction';  
    }

    function action_functionDetail() {
    	$this->view = 'functionDetail'; 
    }

    function action_validateRelatedField(){
        $this->view = 'validateRelatedField';
    }

    function action_getRelatedValue() {
        $this->view ='getRelatedField';
    }
}
?>