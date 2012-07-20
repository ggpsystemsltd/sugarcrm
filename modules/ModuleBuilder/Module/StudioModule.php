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


require_once 'data/BeanFactory.php';
require_once 'modules/ModuleBuilder/parsers/relationships/DeployedRelationships.php' ;
require_once 'modules/ModuleBuilder/parsers/constants.php' ;

class StudioModule
{
    public $name ;
    private $popups = array ( ) ;
    public $module ;
    public $fields ;
    public $seed;

    function __construct ($module)
    {
	   	//Sources can be used to override the file name mapping for a specific view or the parser for a view.
        //The
        $this->sources = array (	'editviewdefs.php' => array ( 'name' => translate ('LBL_EDITVIEW') , 'type' => MB_EDITVIEW , 'image' => 'EditView' ) ,
        							'detailviewdefs.php' => array ( 'name' => translate('LBL_DETAILVIEW') , 'type' => MB_DETAILVIEW , 'image' => 'DetailView' ) ,
        							'listviewdefs.php' => array ( 'name' => translate('LBL_LISTVIEW') , 'type' => MB_LISTVIEW , 'image' => 'ListView' ) ) ;

        $moduleNames = array_change_key_case ( $GLOBALS [ 'app_list_strings' ] [ 'moduleList' ] ) ;
        $this->name = isset ( $moduleNames [ strtolower ( $module ) ] ) ? $moduleNames [ strtolower ( $module ) ] : strtolower ( $module ) ;
        $this->module = $module ;
        $this->seed = BeanFactory::getBean($this->module);
        $this->fields = $this->seed->field_defs ;
        //$GLOBALS['log']->debug ( get_class($this)."->__construct($module): ".print_r($this->fields,true) ) ;
    }

     /*
     * Gets the name of this module. Some modules have naming inconsistencies such as Bug Tracker and Bugs which causes warnings in Relationships
     * Added to resolve bug #20257
     */
    function getModuleName()
    {
    	$modules_with_odd_names = array(
    	'Bug Tracker'=>'Bugs'
    	);
    	if ( isset ( $modules_with_odd_names [ $this->name ] ) )
    		return ( $modules_with_odd_names [ $this->name ] ) ;

    	return $this->name;
    }

    /*
     * Attempt to determine the type of a module, for example 'basic' or 'company'
     * These types are defined by the SugarObject Templates in /include/SugarObjects/templates
     * Custom modules extend one of these standard SugarObject types, so the type can be determined from their parent
     * Standard module types can be determined simply from the module name - 'bugs' for example is of type 'issue'
	 * If all else fails, fall back on type 'basic'...
	 * @return string Module's type
     */
    function getType ()
    {
    	// first, get a list of a possible parent types
    	$templates = array () ;
    	$d = dir ( 'include/SugarObjects/templates' ) ;
		while ( $filename = $d->read() )
		{
			if ( substr($filename,0,1) != '.' )
				$templates [ strtolower ( $filename) ] = strtolower ( $filename ) ;
		}

		// If a custom module, then its type is determined by the parent SugarObject that it extends
		$type = $GLOBALS [ 'beanList' ] [ $this->module ] ;
        require_once $GLOBALS [ 'beanFiles' ] [ $type ] ;

        do
        {
        	$seed = new $type () ;
        	$type = get_parent_class ($seed) ;
        } while ( ! in_array ( strtolower ( $type ) , $templates ) && $type != 'SugarBean' ) ;

        if ( $type != 'SugarBean' )
        {
        	return strtolower ( $type ) ;
        }

    	// If a standard module then just look up its type - type is implicit for standard modules. Perhaps one day we will make it explicit, just as we have done for custom modules...
		$types = array (
		'Accounts' => 'company' , 
		'Bugs' => 'issue' , 
		'Cases' => 'issue' , 
		'Contacts' => 'person' , 
		'Documents' => 'file' , 
		'Leads' => 'person' , 
		'Opportunities' => 'sale'
		) ;
		if ( isset ( $types [ $this->module ] ) )
			return $types [ $this->module ] ;

    	return "basic" ;
    }

    /*
     * Return the fields for this module as sourced from the SugarBean
     * @return	Array of fields
     */

    function getFields ()
    {
    	return $this->fields ;
    }

    function getNodes ()
    {
        return array ( 'name' => $this->name , 'module' => $this->module , 'type' => 'StudioModule' , 'action' => "module=ModuleBuilder&action=wizard&view_module={$this->module}" , 'children' => $this->getModule() ) ;
    }

    function getModule ()
    {
    	$sources = array (	translate('LBL_LABELS') => array ( 'action' => "module=ModuleBuilder&action=editLabels&view_module={$this->module}" , 'imageTitle' => 'Labels' , 'help' => 'labelsBtn' ) ,
        					translate('LBL_FIELDS') => array ( 'action' => "module=ModuleBuilder&action=modulefields&view_package=studio&view_module={$this->module}" , 'imageTitle' => 'Fields' , 'help' => 'fieldsBtn'  ) ,
        					translate('LBL_RELATIONSHIPS') => array ( 'action' => "get_tpl=true&module=ModuleBuilder&action=relationships&view_module={$this->module}" , 'imageTitle' => 'Relationships' , 'help' => 'relationshipsBtn' ) ,
        					translate('LBL_LAYOUTS') => array ( 'children' => 'getLayouts' , 'action' => "module=ModuleBuilder&action=wizard&view=layouts&view_module={$this->module}" , 'imageTitle' => 'Layouts' , 'help' => 'layoutsBtn' ) ,
        					translate('LBL_SUBPANELS') => array ( 'children' => 'getSubpanels' , 'action' => "module=ModuleBuilder&action=wizard&view=subpanels&view_module={$this->module}" , 'imageTitle' => 'Subpanels' , 'help' => 'subpanelsBtn' ) ) ;
        $sources [ translate('LBL_WIRELESSLAYOUTS') ] = array ( 'children' => 'getWirelessLayouts' , 'action' => "module=ModuleBuilder&action=wizard&view=wirelesslayouts&view_module={$this->module}" , 'imageTitle' => 'MobileLayouts' , 'help' => 'wirelesslayoutsBtn' ) ;

        $nodes = array () ;
        foreach ( $sources as $source => $def )
        {
        	$nodes [ $source ] = $def ;
        	$nodes [ $source ] [ 'name' ] = translate ( $source ) ;
        	if ( isset ( $def [ 'children' ] ) )
        	{
        		$childNodes = $this->$def [ 'children' ] () ;
        		if ( !empty ( $childNodes ) )
        		{
        			$nodes [ $source ] [ 'type' ] = 'Folder' ;
        			$nodes [ $source ] [ 'children' ] = $childNodes ;
        		}
        		else
        			unset ( $nodes [ $source ] ) ;
        	}
        }

        return $nodes ;
    }
    
    function getViews() {
        $views = array () ;
        foreach ( $this->sources as $file => $def )
        {
            if (file_exists ( "modules/{$this->module}/metadata/$file" )
                || file_exists ( "custom/modules/{$this->module}/metadata/$file" ))
            {
                $views [ str_replace ( '.php', '' , $file) ] = $def ;
            }
        }
        return $views;
    }

    function getLayouts()
    {
    	$views = $this->getViews();

        // Now add in the QuickCreates - quickcreatedefs can be created by Studio from editviewdefs if they are absent, so just add them in regardless of whether the quickcreatedefs file exists

        $hideQuickCreateForModules = array ( 'kbdocuments' , 'projecttask' , 
            'campaigns'
            ) ;

        array_push ( $hideQuickCreateForModules, 'quotes' ) ;
        array_push ( $hideQuickCreateForModules, 'producttemplates' ) ;
        // Some modules should not have a QuickCreate form at all, so do not add them to the list
        if (! in_array ( strtolower ( $this->module ), $hideQuickCreateForModules ))
            $views [ 'quickcreatedefs' ] = array ( 'name' => translate('LBL_QUICKCREATE') , 'type' => MB_QUICKCREATE , 'image' => 'QuickCreate' ) ;

        $layouts = array ( ) ;
        foreach ( $views as $def )
        {
            $view = !empty($def['view']) ? $def['view'] : $def['type'];
            $layouts [ $def['name'] ] = array ( 'name' => $def['name'] , 'action' => "module=ModuleBuilder&action=editLayout&view={$view}&view_module={$this->module}" , 'imageTitle' => $def['image'] , 'help' => "viewBtn{$def['type']}" , 'size' => '48' ) ;
        }

        if($this->isValidDashletModule($this->module)){
			$dashlets = array( );
	        $dashlets [] = array('name' => translate('LBL_DASHLETLISTVIEW') , 'type' => 'dashlet' , 'action' => 'module=ModuleBuilder&action=editLayout&view=dashlet&view_module=' . $this->module );
			$dashlets [] = array('name' => translate('LBL_DASHLETSEARCHVIEW') , 'type' => 'dashletsearch' , 'action' => 'module=ModuleBuilder&action=editLayout&view=dashletsearch&view_module=' . $this->module );
			$layouts [ translate('LBL_DASHLET') ] = array ( 'name' => translate('LBL_DASHLET') , 'type' => 'Folder', 'children' => $dashlets,  'imageTitle' => 'Dashlet',  'action' => 'module=ModuleBuilder&action=wizard&view=dashlet&view_module=' . $this->module);        	
        }
		
        //For popup tree node
        $popups = array( );
        $popups [] = array('name' => translate('LBL_POPUPLISTVIEW') , 'type' => 'popuplistview' , 'action' => 'module=ModuleBuilder&action=editLayout&view=popuplist&view_module=' . $this->module );
		$popups [] = array('name' => translate('LBL_POPUPSEARCH') , 'type' => 'popupsearch' , 'action' => 'module=ModuleBuilder&action=editLayout&view=popupsearch&view_module=' . $this->module );
		$layouts [ translate('LBL_POPUP') ] = array ( 'name' => translate('LBL_POPUP') , 'type' => 'Folder', 'children' => $popups, 'imageTitle' => 'Popup', 'action' => 'module=ModuleBuilder&action=wizard&view=popup&view_module=' . $this->module);  
			
        $nodes = $this->getSearch () ;
        if ( !empty ( $nodes ) )
        {
        	$layouts [ translate('LBL_SEARCH') ] = array ( 'name' => translate('LBL_SEARCH') , 'type' => 'Folder' , 'children' => $nodes , 'action' => "module=ModuleBuilder&action=wizard&view=search&view_module={$this->module}" , 'imageTitle' => 'BasicSearch' , 'help' => 'searchBtn' , 'size' => '48') ;
        }

    	return $layouts ;

    }

	function isValidDashletModule($moduleName){
		$fileName = "My{$moduleName}Dashlet";
		$customFileName = "{$moduleName}Dashlet";
		if (file_exists ( "modules/{$moduleName}/Dashlets/{$fileName}/{$fileName}.php" )
			|| file_exists ( "custom/modules/{$moduleName}/Dashlets/{$fileName}/{$fileName}.php" ) 
			|| file_exists ( "modules/{$moduleName}/Dashlets/{$customFileName}/{$customFileName}.php" )
			|| file_exists ( "custom/modules/{$moduleName}/Dashlets/{$customFileName}/{$customFileName}.php" ))
        {
        	return true;
        }
        return false;
	}
	
    function getWirelessLayouts ()
    {
        $layouts [ translate ('LBL_WIRELESSEDITVIEW') ] = array ( 
            'name' => translate('LBL_WIRELESSEDITVIEW') , 
            'type' => MB_WIRELESSEDITVIEW ,
            'action' => "module=ModuleBuilder&action=editLayout&view=".MB_WIRELESSEDITVIEW."&view_module={$this->module}" , 
            'imageTitle' => 'EditView' , 
            'help' => "viewBtn".MB_WIRELESSEDITVIEW , 
            'size' => '48' 
        ) ;
        $layouts [ translate('LBL_WIRELESSDETAILVIEW') ] = array ( 
            'name' => translate('LBL_WIRELESSDETAILVIEW') , 
            'type' => MB_WIRELESSDETAILVIEW ,
            'action' => "module=ModuleBuilder&action=editLayout&view=".MB_WIRELESSDETAILVIEW."&view_module={$this->module}" , 
            'imageTitle' => 'DetailView' , 
            'help' => "viewBtn".MB_WIRELESSDETAILVIEW , 
            'size' => '48' 
        ) ;
        $layouts [ translate('LBL_WIRELESSLISTVIEW') ] = array ( 
            'name' => translate('LBL_WIRELESSLISTVIEW') ,
            'type' => MB_WIRELESSLISTVIEW , 
            'action' => "module=ModuleBuilder&action=editLayout&view=".MB_WIRELESSLISTVIEW."&view_module={$this->module}" , 
            'imageTitle' => 'ListView' , 
            'help' => "viewBtn".MB_WIRELESSLISTVIEW , 
            'size' => '48' ) ;
        $layouts [ translate('LBL_WIRELESSSEARCH') ] = array ( 
	        'name' => translate('LBL_WIRELESSSEARCH') ,
            'type' => MB_WIRELESSBASICSEARCH , 
	        'action' => "module=ModuleBuilder&action=editLayout&view=".MB_WIRELESSBASICSEARCH."&view_module={$this->module}" , 
	        'imageTitle' => 'BasicSearch' , 
	        'help' => "searchBtn" , 
	        'size' => '48' 
        ) ;
    	return $layouts ;
    }

    function getSearch ()
    {
		require_once ('modules/ModuleBuilder/parsers/views/SearchViewMetaDataParser.php') ;

		$nodes = array () ;
        foreach ( array ( MB_BASICSEARCH => 'LBL_BASIC_SEARCH' , MB_ADVANCEDSEARCH => 'LBL_ADVANCED_SEARCH' ) as $view => $label )
        {
        	try
        	{
        		$parser = new SearchViewMetaDataParser ( $view , $this->module ) ;
        		$title = translate ( $label ) ;
        		if($label == 'LBL_BASIC_SEARCH'){
					$name = 'BasicSearch';
				}elseif($label == 'LBL_ADVANCED_SEARCH'){
					$name = 'AdvancedSearch';
				}else{
					$name = str_replace ( ' ', '', $title ) ;
				}
            	$nodes [ $title ] = array ( 'name' => $title , 'action' => "module=ModuleBuilder&action=editLayout&view={$view}&view_module={$this->module}" , 'imageTitle' => $title , 'imageName' => $name , 'help' => "{$name}Btn" , 'size' => '48' ) ;
        	}
        	catch ( Exception $e )
        	{
        		$GLOBALS [ 'log' ]->info( 'No search layout : '. $e->getMessage() ) ;
        	}
        }

        return $nodes ;
    }

    /*
     * Return an object containing all the relationships participated in by this module
     * @return AbstractRelationships Set of relationships
     */
    function getRelationships ()
    {
        return new DeployedRelationships ( $this->module ) ;
    }

    function getPortal ()
    {
    	$nodes = array ( ) ;
        foreach ( $this->sources as $file => $def )
        {
            if (file_exists ( "portal/modules/{$this->module}/metadata/$file" ))
            {
            	$file = str_replace ( $file, '.php', '' ) ;
            	$nodes [] = array ( 
            	   'name' => $def [ 'name' ] , 
            	   'action' => 'module=ModuleBuilder&action=editPortal&view=' . ucfirst ( $def [ 'type' ] ) . '&view_module=' . $this->module 
            	) ;
            }
        }
        return $nodes ;
    }


    /**
     * Gets a list of subpanels used by the current module
     */
    function getSubpanels ()
    {
        if(!empty($GLOBALS['current_user']) && empty($GLOBALS['modListHeader']))
            $GLOBALS['modListHeader'] = query_module_access_list($GLOBALS['current_user']);

        require_once ('include/SubPanel/SubPanel.php') ;

        $nodes = array ( ) ;

            $GLOBALS [ 'log' ]->debug ( "StudioModule->getSubpanels(): getting subpanels for " . $this->module ) ;

            // counter to add a unique key to assoc array below
            $ct=0;
            foreach ( SubPanel::getModuleSubpanels ( $this->module ) as $name => $label )
            {
                if ($name == 'users')
                    continue ;
                $subname = sugar_ucfirst ( (! empty ( $label )) ? translate ( $label, $this->module ) : $name ) ;
                $action = "module=ModuleBuilder&action=editLayout&view=ListView&view_module={$this->module}&subpanel={$name}&subpanelLabel=" . urlencode($subname);

                //  bug47452 - adding a unique number to the $nodes[ key ] so if you have 2+ panels
                //  with the same subname they will not cancel each other out
                $nodes [ $subname . $ct++ ] = array (
                	'name' => $name , 
                	'label' => $subname , 
                	'action' =>  $action,
                	'imageTitle' => $subname , 
                	'imageName' => 'icon_' . ucfirst($name) . '_32', 
                	'altImageName' => 'Subpanels', 
                	'size' => '48' 
                ) ;
            }

        return $nodes ;

    }

    /**
     * gets a list of subpanels provided to other modules
     *
     *
     */
    function getProvidedSubpanels ()
    {
        require_once 'modules/ModuleBuilder/parsers/relationships/AbstractRelationships.php' ;
    	$this->providedSubpanels = array () ;
        $subpanelDir = 'modules/' . $this->module . '/metadata/subpanels/' ;
        foreach(array($subpanelDir, "custom/$subpanelDir") as $dir)
        {
	        if (is_dir ( $dir ))
	        {
	            foreach(scandir($dir) as $fileName)
	            {
	            	// sanity check to confirm that this is a usable subpanel...
	                if (substr ( $fileName, 0, 1 ) != '.' && substr ( strtolower($fileName), -4 ) == ".php" 
	                	&& AbstractRelationships::validSubpanel ( "$dir/$fileName" ))
	                {
	                    $subname = str_replace ( '.php', '', $fileName ) ;
	                    $this->providedSubpanels [ $subname ] = $subname ;
	                }
	            }
	        }
        }

		return $this->providedSubpanels;
    }

    
    function getParentModulesOfSubpanel($subpanel){
        global $moduleList, $beanFiles, $beanList, $module;
    
        //use tab controller function to get module list with named keys
        require_once("modules/MySettings/TabController.php");
        require_once("include/SubPanel/SubPanelDefinitions.php");
        $modules_to_check = TabController::get_key_array($moduleList);

        //change case to match subpanel processing later on
        $modules_to_check = array_change_key_case($modules_to_check);
    
        $spd = '';
        $spd_arr = array();
        //iterate through modules and build subpanel array  
        foreach($modules_to_check as $mod_name){
            
            //skip if module name is not in bean list, otherwise get the bean class name
            if(!isset($beanList[$mod_name])) continue;
            $class = $beanList[$mod_name];

            //skip if class name is not in file list, otherwise require the bean file and create new class
            if(!isset($beanFiles[$class]) || !file_exists($beanFiles[$class])) continue;
            
            //retrieve subpanels for this bean
            require_once($beanFiles[$class]);
            $bean_class = new $class();

            //create new subpanel definition instance and get list of tabs
            $spd = new SubPanelDefinitions($bean_class);
            if (isset($spd->layout_defs['subpanel_setup'])) 
            {
                foreach ($spd->layout_defs['subpanel_setup'] as $panelname) 
                {
                    if ($panelname['module'] == $subpanel) 
                    {
                        $spd_arr[] = array('mod_name'   => $mod_name,
                                           'panel_name' => $panelname['get_subpanel_data']);
                    }
                }
            }
        }
        return  $spd_arr;
    }

    function removeFieldFromLayouts ( $fieldName )
    {
    	require_once("modules/ModuleBuilder/parsers/ParserFactory.php");
    	$GLOBALS [ 'log' ]->info ( get_class ( $this ) . "->removeFieldFromLayouts($fieldName)" ) ;
        $sources = $this->getViewMetadataSources();
        $sources[] = array('type'  => MB_BASICSEARCH);
        $sources[] = array('type'  => MB_ADVANCEDSEARCH);
        $sources[] = array('type'  => MB_POPUPSEARCH);        
        $sources = array_merge($sources, $this->getWirelessLayouts());
        
        $GLOBALS [ 'log' ]->debug ( print_r( $sources,true) ) ;
        foreach ( $sources as $name => $defs )
        {
            //If this module type doesn't support a given metadata type, we will get an exception from getParser()
            try {
                $parser = ParserFactory::getParser( $defs [ 'type' ] , $this->module ) ;
                if ($parser->removeField ( $fieldName ) )
                    $parser->handleSave(false) ; // don't populate from $_REQUEST, just save as is...
            } catch(Exception $e){}
        }
        
        //Remove the fields in subpanel
        $data = $this->getParentModulesOfSubpanel($this->module);
        foreach($data as $parentModule){
            //If this module type doesn't support a given metadata type, we will get an exception from getParser()
            try {
                $parser = ParserFactory::getParser(MB_LISTVIEW, $parentModule['mod_name'], null, $parentModule['panel_name']);
                if ($parser->removeField($fieldName)) 
                {
                    $parser->handleSave(false);
                }
            } catch(Exception $e){}
        }
    }

	
	
	public function getViewMetadataSources() {
		$sources = $this->getViews();
        $sources[] = array('type'  => MB_BASICSEARCH);
        $sources[] = array('type'  => MB_ADVANCEDSEARCH);
        $sources[] = array('type'  => MB_DASHLET);
        $sources[] = array('type'  => MB_DASHLETSEARCH);
        $sources[] = array('type'  => MB_POPUPLIST);
        $sources[] = array('type'  => MB_QUICKCREATE);
        $sources = array_merge($sources, $this->getWirelessLayouts());
		
		return $sources;
	}

    public function getViewType($view)
    {
        foreach($this->sources as $file => $def)
        {
            if (!empty($def['view']) && $def['view'] == $view && !empty($def['type']))
            {
                return $def['type'];
            }
        }
        return $view;
    }
	
	
}
?>