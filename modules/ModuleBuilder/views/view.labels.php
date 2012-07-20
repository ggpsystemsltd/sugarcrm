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
 * Created on Jul 24, 2007
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once('modules/ModuleBuilder/MB/AjaxCompose.php');
require_once('modules/ModuleBuilder/views/view.modulefields.php');
class ViewLabels extends ViewModulefields
{
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

 	//STUDIO LABELS ONLY//
 	//TODO Bundle Studio and ModuleBuilder label handling to increase maintainability.
 	function display()
 	{
		$editModule = $_REQUEST['view_module'];
		$allLabels = (!empty($_REQUEST['labels']) && $_REQUEST['labels']== 'all');

 		if (!isset($_REQUEST['MB']))
		{
		    global $app_list_strings;
		    $moduleNames = array_change_key_case($app_list_strings['moduleList']);
		    $translatedEditModule = $moduleNames[strtolower($editModule)];
		}
		$selected_lang = (!empty($_REQUEST['selected_lang'])? $_REQUEST['selected_lang']:$_SESSION['authenticated_user_language']);
		if(empty($selected_lang)){
		    $selected_lang = $GLOBALS['sugar_config']['default_language'];
		}

		$smarty = new Sugar_Smarty();
		global $mod_strings;
        $smarty->assign('mod_strings', $mod_strings);
		$smarty->assign('available_languages',get_languages());


        $objectName = BeanFactory::getObjectName($editModule);
        VardefManager::loadVardef($editModule, $objectName);
        global $dictionary;
        $vnames = array();
		//jchi 24557 . We should list all the lables in viewdefs(list,detail,edit,quickcreate) that the user can edit them.
		require_once 'modules/ModuleBuilder/parsers/views/ListLayoutMetaDataParser.php' ;
        $parser = new ListLayoutMetaDataParser ( MB_LISTVIEW, $editModule ) ;
        foreach ( $parser->getLayout() as $key => $def )
        {
        	if(isset($def['label']) ) {
               $vnames[$def['label']] = $def['label'];
        	}
        }

       require_once 'modules/ModuleBuilder/parsers/views/GridLayoutMetaDataParser.php' ;
        $variableMap = $this->getVariableMap($editModule);
        foreach($variableMap as $key => $value){
        	$gridLayoutMetaDataParserTemp = new GridLayoutMetaDataParser ( $value, $editModule) ;
        	foreach ( $gridLayoutMetaDataParserTemp->getLayout() as $panel)
	        {
	                foreach ( $panel as $row )
	                {
	                    foreach ( $row as $fieldArray )
	                    { // fieldArray is an array('name'=>name,'label'=>label)
	                        if (isset ( $fieldArray [ 'label' ] ))
	                        {
	                            $vnames[$fieldArray [ 'label' ] ] = $fieldArray [ 'label' ] ;
	                        }
	                    }
	                }
	        }
        }
        //end

        //Get Subpanel Labels:
        require_once ('include/SubPanel/SubPanel.php') ;
        $subList =  SubPanel::getModuleSubpanels ( $editModule );
        foreach($subList as $subpanel => $titleLabel) {
        	$vnames[$titleLabel] = $titleLabel;
        }

        foreach($dictionary[$objectName]['fields'] as $name=>$def) {
        	if(isset($def['vname'])) {
               $vnames[$def['vname']] = $def['vname'];
        	}
		}
 	    $formatted_mod_strings = array();

 	    //we shouldn't set the $refresh=true here, or will lost template language mod_strings.
 	    //return_module_language($selected_lang, $editModule,false) : the mod_strings will be included from cache files here.
        foreach(return_module_language($selected_lang, $editModule,false) as $name=>$label) {
        		//#25294
        	 	if($allLabels || isset($vnames[$name]) || preg_match( '/lbl_city|lbl_country|lbl_billing_address|lbl_alt_address|lbl_shipping_address|lbl_postal_code|lbl_state$/si' , $name)) {
                    $formatted_mod_strings[$name] = htmlentities($label, ENT_QUOTES, 'UTF-8');
        	 	}
        }
        //Grab everything from the custom files
        $mod_bak = $mod_strings;
        $files = array(
            "custom/modules/$editModule/language/$selected_lang.lang.php",
            "custom/modules/$editModule/Ext/Language/$selected_lang.lang.ext.php"
        );
        foreach($files as $langfile){
        	$mod_strings = array();
        	if (is_file($langfile))
        	{
        	   include($langfile);
        	   foreach($mod_strings as $key => $label)
        	   {
                    $formatted_mod_strings[$key] = htmlentities($label, ENT_QUOTES, 'UTF-8');
        	   }
        	}
        }
        $mod_strings = $mod_bak;
        ksort($formatted_mod_strings);
		$smarty->assign('MOD', $formatted_mod_strings);
		$smarty->assign('view_module', $editModule);
		$smarty->assign('APP', $GLOBALS['app_strings']);
		$smarty->assign('selected_lang', $selected_lang);
		$smarty->assign('defaultHelp', 'labelsBtn');
		$smarty->assign('assistant', array('key'=>'labels', 'group'=>'module'));
		$smarty->assign('labels_choice', $mod_strings['labelTypes']);
		$smarty->assign('labels_current', $allLabels?"all":"");

		$ajax = new AjaxCompose();
		$ajax->addCrumb($mod_strings['LBL_STUDIO'], 'ModuleBuilder.getContent("module=ModuleBuilder&action=wizard")');
		$ajax->addCrumb($translatedEditModule, 'ModuleBuilder.getContent("module=ModuleBuilder&action=wizard&view_module='.$editModule.'")');
		$ajax->addCrumb($mod_strings['LBL_LABELS'], '');

 		$html = $smarty->fetch('modules/ModuleBuilder/tpls/labels.tpl');
 		$ajax->addSection('center', $GLOBALS['mod_strings']['LBL_SECTION_EDLABELS'], $html);
 		echo $ajax->getJavascript();
 	}
    
    // fixing bug #39749: Quick Create in Studio
    function getVariableMap($module)
    {
        $variableMap = array(MB_EDITVIEW => 'EditView', 
                             MB_DETAILVIEW => 'DetailView', 
                             MB_QUICKCREATE => 'QuickCreate');
        
        $hideQuickCreateForModules = array('KBDocuments',
                                           'ProjectTask',
                                           'Campaigns',
                                           'Quotes',
                                           'ProductTemplates');
        
        if(in_array($module, $hideQuickCreateForModules))
        {
            if(isset($variableMap['quickcreate']))
            {
                unset($variableMap['quickcreate']);
            }
        }
        
        if($module == 'KBDocuments')
        {
            $variableMap  = array();
        }
        
        return $variableMap;
    }
}
