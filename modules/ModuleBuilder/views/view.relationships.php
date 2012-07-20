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

require_once ('modules/ModuleBuilder/MB/AjaxCompose.php') ;
require_once ('modules/ModuleBuilder/MB/ModuleBuilder.php') ;
require_once ('modules/ModuleBuilder/views/view.relationship.php') ;
require_once ('modules/ModuleBuilder/Module/StudioModule.php') ;
require_once ('modules/ModuleBuilder/Module/StudioBrowser.php') ;

class ViewRelationships extends SugarView
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

    function display()
    {
        $moduleName = ! empty ( $_REQUEST [ 'view_module' ] ) ? $_REQUEST [ 'view_module' ] : $_REQUEST [ 'edit_module' ] ;
        $smarty = new Sugar_Smarty ( ) ;
        // set the mod_strings as we can be called after doing a Repair and the mod_strings are set to Administration
        $GLOBALS['mod_strings'] = return_module_language($GLOBALS['current_language'], 'ModuleBuilder');
        $smarty->assign ( 'mod_strings', $GLOBALS [ 'mod_strings' ] ) ;
        $smarty->assign ( 'view_module', $moduleName ) ;

        $ajax = new AjaxCompose ( ) ;
        $json = getJSONobj () ;
		$this->fromModuleBuilder = !empty ( $_REQUEST [ 'MB' ] ) || (!empty($_REQUEST['view_package']) && $_REQUEST['view_package'] != 'studio') ;
        $smarty->assign('fromModuleBuilder', $this->fromModuleBuilder);
        if (!$this->fromModuleBuilder)
        {
            $smarty->assign ( 'view_package', '' ) ;

            $relationships = new DeployedRelationships ( $moduleName ) ;
            $ajaxRelationships = $this->getAjaxRelationships( $relationships ) ;
            $smarty->assign ( 'relationships', $json->encode ( $ajaxRelationships ) ) ;
            $smarty->assign ( 'empty', (sizeof ( $ajaxRelationships ) == 0) ) ;
            $smarty->assign ( 'studio', true ) ;

            //crumb
            global $app_list_strings ;
            $moduleNames = array_change_key_case ( $app_list_strings [ 'moduleList' ] ) ;
            $translatedModule = $moduleNames [ strtolower ( $moduleName ) ] ;
            $ajax->addCrumb ( translate('LBL_STUDIO'), 'ModuleBuilder.main("studio")' ) ;
            $ajax->addCrumb ( $translatedModule, 'ModuleBuilder.getContent("module=ModuleBuilder&action=wizard&view_module=' . $moduleName . '")' ) ;
            $ajax->addCrumb ( translate('LBL_RELATIONSHIPS'), '' ) ;
            $ajax->addSection ( 'center', $moduleName . ' ' . translate('LBL_RELATIONSHIPS'), $this->fetchTemplate($smarty, 'modules/ModuleBuilder/tpls/studioRelationships.tpl'));

        } else
        {
            $smarty->assign ( 'view_package', $_REQUEST [ 'view_package' ] ) ;

            $mb = new ModuleBuilder ( ) ;
            $module = & $mb->getPackageModule ( $_REQUEST [ 'view_package' ], $_REQUEST [ 'view_module' ] ) ;
            $package = $mb->packages [ $_REQUEST [ 'view_package' ] ] ;
			$package->loadModuleTitles();
            $relationships = new UndeployedRelationships ( $module->getModuleDir () ) ;
            $ajaxRelationships = $this->getAjaxRelationships( $relationships ) ;
            $smarty->assign ( 'relationships', $json->encode ( $ajaxRelationships ) ) ;
            $smarty->assign ( 'empty', (sizeof ( $ajaxRelationships ) == 0) ) ;

            $module->help [ 'default' ] = (empty ( $_REQUEST [ 'view_module' ] )) ? 'create' : 'modify' ;
            $module->help [ 'group' ] = 'module' ;

            $ajax->addCrumb ( translate('LBL_MODULEBUILDER'), 'ModuleBuilder.main("mb")' ) ;
            $ajax->addCrumb ( $package->name, 'ModuleBuilder.getContent("module=ModuleBuilder&action=package&package=' . $package->name . '")' ) ;
            $ajax->addCrumb ( $moduleName, 'ModuleBuilder.getContent("module=ModuleBuilder&action=module&view_package=' . $package->name . '&view_module=' . $moduleName . '")' ) ;
            $ajax->addCrumb ( translate('LBL_RELATIONSHIPS'), '' ) ;
            $ajax->addSection ( 'center', $moduleName . ' ' . translate('LBL_RELATIONSHIPS'), $this->fetchTemplate($smarty, 'modules/ModuleBuilder/tpls/studioRelationships.tpl'));
        }
        echo $ajax->getJavascript () ;
    }

    /*
     * Encode the relationships for this module for display in the Ext grid layout
     */
    function getAjaxRelationships ( $relationships )
    {
        $ajaxrels = array ( ) ;
        foreach ( $relationships->getRelationshipList () as $relationshipName )
        {
            $rel = $relationships->get ( $relationshipName )->getDefinition () ;
            $rel [ 'lhs_module' ] = translate( $rel [ 'lhs_module' ] ) ;
            $rel [ 'rhs_module' ] = translate( $rel [ 'rhs_module' ] ) ;
            
            //#28668  , translate the relationship type before render it .
            switch($rel['relationship_type']){
            	case 'one-to-one':
            	$rel['relationship_type']  = translate ( 'LBL_ONETOONE' );
            	break;
            	case 'one-to-many':
            	$rel['relationship_type']  = translate ( 'LBL_ONETOMANY' );
            	break;
            	case 'many-to-one':
            	$rel['relationship_type']  = translate ( 'LBL_MANYTOONE' );
            	break;
            	case 'many-to-many':
            	$rel['relationship_type']  = translate ( 'LBL_MANYTOMANY' );
            	break;
            	default: $rel['relationship_type']  = '';
            }
            $rel [ 'name' ] = $relationshipName ;
            if ($rel [ 'is_custom' ] && isset($rel [ 'from_studio' ]) && $rel [ 'from_studio' ]) {
            	$rel [ 'name' ] = $relationshipName . "*";
            }
            $ajaxrels [] = $rel ;
        }
        return $ajaxrels ;
    }

    /**
     * fetchTemplate
     * This function overrides fetchTemplate from SugarView.
     *
     * @param FieldViewer $mixed the Sugar_Smarty instance
     * @param string $template the file to fetch
     * @return string contents from calling the fetch method on the Sugar_Smarty instance
     */
    protected function fetchTemplate($smarty, $template)
    {
        return $smarty->fetch($this->getCustomFilePathIfExists($template));
    }
}