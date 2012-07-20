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
require_once ('modules/ModuleBuilder/Module/StudioModule.php') ;
require_once ('modules/ModuleBuilder/Module/StudioBrowser.php') ;
require_once ('modules/DynamicFields/DynamicField.php') ;
require_once 'modules/ModuleBuilder/Module/StudioModuleFactory.php' ;
require_once 'modules/ModuleBuilder/parsers/views/DeployedMetaDataImplementation.php';

class ViewResetmodule extends SugarView
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
        $moduleName = $this->module = $_REQUEST['view_module'];
        if (isset($_REQUEST['handle']) && $_REQUEST['handle'] == "execute") {
            return $this->handleSave();
        }
        
        $ajax = new AjaxCompose ( ) ;
        $ajax->addCrumb ( translate('LBL_STUDIO'), 'ModuleBuilder.main("studio")' ) ;
        $ajax->addCrumb ( translate($moduleName), 'ModuleBuilder.getContent("module=ModuleBuilder&action=wizard&view_module=' . $moduleName . '")' ) ;
        $ajax->addCrumb ( translate('LBL_RESET') . " " . translate($moduleName) , '') ;
        
        $smarty = new Sugar_Smarty ( ) ;
        $smarty->assign("module", $moduleName);
        $smarty->assign("actions", array(
            array("name" => "relationships", "label" => translate("LBL_CLEAR_RELATIONSHIPS")),
            array("name" => "fields", "label" => translate("LBL_REMOVE_FIELDS")),
            array("name" => "layouts", "label" => translate("LBL_RESET_LAYOUTS")),
            array("name" => "labels", "label" => translate("LBL_RESET_LABELS")),
			array("name" => "extensions", "label" => translate("LBL_CLEAR_EXTENSIONS")),
        ));
        
        $ajax->addSection ( 
            'center', 
            "Reset ". translate($moduleName) , 
            $smarty->fetch('modules/ModuleBuilder/tpls/resetModule.tpl') //"This works now" 
        ) ;
        
        echo $ajax->getJavascript () ;
    }
    
    function handleSave() 
    {
        $out = "<script>ajaxStatus.flashStatus(SUGAR.language.get('app_strings', 'LBL_REQUEST_PROCESSED'), 2000);</script>";
        
        if (!empty($_REQUEST['relationships']))
            $out .= $this->removeCustomRelationships();
            
        if (!empty($_REQUEST['fields']))
            $out .= $this->removeCustomFields();
            
        if (!empty($_REQUEST['layouts']))
            $out .= $this->removeCustomLayouts();
			
		if (!empty($_REQUEST['labels']))
            $out .= $this->removeCustomLabels();
			
		if (!empty($_REQUEST['extensions']))
            $out .= $this->removeCustomExtensions();	
			
        
        $out .= "Complete!";
        
        $ajax = new AjaxCompose ( ) ;
        
        $ajax->addCrumb ( translate('LBL_STUDIO'), 'ModuleBuilder.main("studio")' ) ;
        $ajax->addCrumb ( translate($this->module), 'ModuleBuilder.getContent("module=ModuleBuilder&action=wizard&view_module=' . $this->module . '")' ) ;
        $ajax->addCrumb ( "Reset ". translate($this->module) , '') ;
        
        
        $ajax->addSection ( 
            'center', 
            "Reset ". translate($this->module) , 
            $out
        ) ;
        
        echo $ajax->getJavascript () ;
    }
    
    /**
     * Removes all custom fields created in studio
     * 
     * @return html output record of the field deleted
     */
    function removeCustomFields() 
    {    
        $moduleName = $this->module;
        $class_name = $GLOBALS [ 'beanList' ] [ $moduleName ] ;
        require_once ($GLOBALS [ 'beanFiles' ] [ $class_name ]) ;
        $seed = new $class_name ( ) ;
        $df = new DynamicField ( $moduleName ) ;
        $df->setup ( $seed ) ;
        
        
        $module = StudioModuleFactory::getStudioModule( $moduleName ) ;
        $customFields = array();
        foreach($seed->field_defs as $def) {
            if(isset($def['source']) && $def['source'] == 'custom_fields') {
               $field = $df->getFieldWidget($moduleName, $def['name']);
               $field->delete ( $df ) ;
               
               $module->removeFieldFromLayouts( $def['name'] );
               $customFields[] = $def['name'];
            }
        }
        $out = "";
        foreach ($customFields as $field) {
            $out .= "Removed field $field<br/>";
        }
        return ($out);
    }
    
    /**
     * Removes the metadata files for all known studio layouts.
     * 
     * @return html output record of the files deleted
     */
    function removeCustomLayouts() 
    {
        $module = StudioModuleFactory::getStudioModule( $this->module ) ;
        $sources = $module->getViewMetadataSources();
        
        $out = "";
        foreach($sources as $view)
        {
            $file = DeployedMetaDataImplementation::getFileName($view['type'], $this->module);
            if (file_exists($file)) {
                unlink($file);
                $out .= "Removed layout {$view['type']}.php<br/>";
            }
        }
        
        // now clear the cache
        include_once ('include/TemplateHandler/TemplateHandler.php') ;
        TemplateHandler::clearCache ( $this->module ) ;
        
        return $out;
    }
    
    /**
     * Removes all custom relationships containing this module
     * 
     * @return html output record of the files deleted
     */
    function removeCustomRelationships() 
    {
    	require_once 'modules/ModuleBuilder/parsers/relationships/DeployedRelationships.php' ;
        $out = "";
        $madeChanges = false;
        $relationships = new DeployedRelationships ( $this->module ) ;
        
        foreach ( $relationships->getRelationshipList () as $relationshipName )
        {
            $rel = $relationships->get ( $relationshipName )->getDefinition () ;
            if ($rel [ 'is_custom' ] || (isset($rel [ 'from_studio' ]) && $rel [ 'from_studio' ])) {
                $relationships->delete ($relationshipName);
                $out .= "Removed relationship $relationshipName<br/>";
            }
        }
        if ($madeChanges)
           $relationships->save () ;
        
        return $out;
    }
    
    function removeCustomLabels() 
    {
        $out = "";
		$languageDir = "custom/modules/{$this->module}/language";
        if (is_dir($languageDir)) {
            $files = scandir($languageDir);
            foreach ($files as $langFile) {
                if (substr($langFile, 0 ,1) == '.') continue;
				$language = substr($langFile, 0, strlen($langFile) - 9);
				unlink($languageDir . "/" . $langFile);
				
				LanguageManager::clearLanguageCache ( $this->module, $language ) ;
				$out .= "Removed language file $langFile<br/>";
            }
        }
		
		return $out;
    }
	
	function removeCustomExtensions() 
	{
        $out = "";
        $extDir = "custom/Extension/modules/{$this->module}";
        if (is_dir($extDir)) {
        	rmdir_recursive($extDir);
        	require_once ('modules/Administration/QuickRepairAndRebuild.php') ;
            $rac = new RepairAndClear ( ) ;
            $rac->repairAndClearAll ( array ( 'clearAll' ), array ( $this->module ), true, false ) ;
			$rac->rebuildExtensions();
        	$out .= "Cleared extensions for {$this->module}<br/>";
        }
		
        return $out;
    }
}