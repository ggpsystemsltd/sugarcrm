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

require_once ('modules/ModuleBuilder/MB/AjaxCompose.php');
require_once ('include/MVC/View/SugarView.php');
require_once ('modules/ModuleBuilder/parsers/ParserFactory.php');

class ViewProperty extends SugarView
{   
    function ViewProperty()
    {
        $this->init();
    }
    
    /**
	 * @see SugarView::_getModuleTitleParams()
	 */
	protected function _getModuleTitleParams($browserTitle = false)
	{
	    global $mod_strings;
	    
    	return array(
    	   translate('LBL_MODULE_NAME','Administration'),
    	   ModuleBuilderController::getModuleTitle(),
    	   );
    }

	
    function init () // pseduo-constuctor - given a well-known name to allow subclasses to call this classes constructor
    {
        $this->editModule = (! empty($_REQUEST['view_module'])) ? $_REQUEST['view_module'] : null;
        $this->editPackage = (! empty($_REQUEST['view_package'])) ? $_REQUEST['view_package'] : null;
        $this->id = (! empty($_REQUEST['id'])) ? $_REQUEST['id'] : null;
        $this->subpanel = (! empty($_REQUEST['subpanel'])) ? $_REQUEST['subpanel'] : "";
        $this->properties = array();
        foreach($_REQUEST as $key=>$value)
        {
            if (substr($key,0,4) == 'name')
            {
                $this->properties[substr($key,5)]['name'] = $value;
            }
            if (substr($key,0,2) == 'id')
            {
                $this->properties[substr($key,3)]['id'] = $value;
            }
            if (substr($key,0,5) == 'value')
            {
                $this->properties[substr($key,6)]['value'] = $value;
                // tyoung - now a nasty hack to disable editing of labels which contain Smarty functions - this is envisaged to be a temporary fix to prevent admins modifying these functions then being unable to restore the original complicated value if they regret it
                if (substr($key,6) == 'label')
                {
                    //#29796  , we disable the edit function for sub panel label
                    if (preg_match('/\{.*\}/',$value) || !empty($this->subpanel))
                    {
                        $this->properties[substr($key,6)]['hidden'] = 1;
                    }
                }
            }
            if (substr($key,0,5) == 'title')
            {
                $this->properties[substr($key,6)]['title'] = $value;
            }
        }
     }

    function display()
    {
        global $mod_strings;
    	$ajax = new AjaxCompose();
        $smarty = new Sugar_Smarty();
        if (isset($_REQUEST['MB']) && $_REQUEST['MB'] == "1")
        {
            $smarty->assign("MB", $_REQUEST['MB']);
            $smarty->assign("view_package", $_REQUEST['view_package']);
        }

        $selected_lang = (!empty($_REQUEST['selected_lang'])?$_REQUEST['selected_lang']:$_SESSION['authenticated_user_language']);
		if(empty($selected_lang)){
		    $selected_lang = $GLOBALS['sugar_config']['default_language'];
		}
		$smarty->assign('available_languages', get_languages());
		$smarty->assign('selected_lang', $selected_lang);
		
        ksort($this->properties);

        $smarty->assign("properties",$this->properties);
//        $smarty->assign("id",$this->id);
        
        $smarty->assign("mod_strings",$mod_strings);
        $smarty->assign('APP', $GLOBALS['app_strings']);
        $smarty->assign("view_module", $this->editModule);
        $smarty->assign("subpanel", $this->subpanel);
        if (isset($this->editPackage))
            $smarty->assign("view_package", $this->editPackage);       

        $ajax->addSection('east', translate('LBL_SECTION_PROPERTIES', 'ModuleBuilder'), $smarty->fetch('modules/ModuleBuilder/tpls/editProperty.tpl'));
        echo $ajax->getJavascript();
    }
}