<?php
if (! defined ( 'sugarEntry' ) || ! sugarEntry)
die ( 'Not A Valid Entry Point' ) ;
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





require_once ('modules/ModuleBuilder/views/view.listview.php') ;
require_once 'modules/ModuleBuilder/parsers/constants.php' ;

class ViewSearchView extends ViewListView
{
 	function __construct()
 	{
 		parent::__construct();
 		if (!empty($_REQUEST['searchlayout'])) {
 			$this->editLayout = $_REQUEST['searchlayout'];
 		}
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

 	// DO NOT REMOVE - overrides parent ViewEdit preDisplay() which attempts to load a bean for a non-existent module
 	function preDisplay()
 	{
 	}

 	function display(
 	    $preview = false
 	    )
 	{
 		$packageName = (isset ( $_REQUEST [ 'view_package' ] )) ? $_REQUEST [ 'view_package' ] : '' ;
 		require_once 'modules/ModuleBuilder/parsers/ParserFactory.php' ;
 		$parser = ParserFactory::getParser ( $this->editLayout , $this->editModule, $packageName ) ;

 		$smarty = parent::constructSmarty ( $parser ) ;
 		$smarty->assign ( 'action', 'searchViewSave' ) ;
 		$smarty->assign ( 'view', $this->editLayout ) ;
 		$smarty->assign ( 'helpName', 'searchViewEditor' ) ;
 		$smarty->assign ( 'helpDefault', 'modify' ) ;

 		if ($preview)
 		{
 			echo $smarty->fetch ( "modules/ModuleBuilder/tpls/Preview/listView.tpl" ) ;
 		} else
 		{
 			$ajax = $this->constructAjax () ;
 			$ajax->addSection ( 'center', translate ($this->title), $smarty->fetch ( "modules/ModuleBuilder/tpls/listView.tpl" ) ) ;
 			echo $ajax->getJavascript () ;
 		}
 	}

 	function constructAjax()
 	{
 		require_once ('modules/ModuleBuilder/MB/AjaxCompose.php') ;
 		$ajax = new AjaxCompose ( ) ;
 		switch ( $this->editLayout )
 		{
 			case MB_WIRELESSBASICSEARCH:
 			case MB_WIRELESSADVANCEDSEARCH:
 				$searchLabel = 'LBL_WIRELESSSEARCH' ;
 				break;
 			default:
 				$searchLabel = 'LBL_' . strtoupper ( $this->editLayout) ;
 		}

        $layoutLabel = 'LBL_LAYOUTS' ;
        $layoutView = 'layouts' ;

        if ( in_array ( $this->editLayout , array ( MB_WIRELESSBASICSEARCH , MB_WIRELESSADVANCEDSEARCH ) ) )
        {
        	$layoutLabel = 'LBL_WIRELESSLAYOUTS' ;
        	$layoutView = 'wirelesslayouts' ;
        }

 		if ($this->fromModuleBuilder)
 		{
 			$ajax->addCrumb ( translate ( 'LBL_MODULEBUILDER', 'ModuleBuilder' ), 'ModuleBuilder.main("mb")' ) ;
 			$ajax->addCrumb ( $_REQUEST [ 'view_package' ], 'ModuleBuilder.getContent("module=ModuleBuilder&action=package&package=' . $_REQUEST [ 'view_package' ] . '")' ) ;
 			$ajax->addCrumb ( $this->editModule, 'ModuleBuilder.getContent("module=ModuleBuilder&action=module&view_package=' . $_REQUEST [ 'view_package' ] . "&view_module={$this->editModule}" . '")'  ) ;
 			$ajax->addCrumb ( translate ( $layoutLabel, 'ModuleBuilder' ), 'ModuleBuilder.getContent("module=ModuleBuilder&MB=true&action=wizard&view_module=' . $this->editModule. '&view_package=' . $_REQUEST['view_package'] . '")'  ) ;
 			if ( $layoutLabel == 'LBL_LAYOUTS' ) $ajax->addCrumb ( translate ( 'LBL_SEARCH_FORMS', 'ModuleBuilder' ), 'ModuleBuilder.getContent("module=ModuleBuilder&MB=true&action=wizard&view=search&view_module=' .$this->editModule . '&view_package=' . $_REQUEST [ 'view_package' ] . '")'  ) ;
 			$ajax->addCrumb ( translate ( $searchLabel, 'ModuleBuilder' ), '' ) ;
 		} else
 		{
 			$ajax->addCrumb ( translate ( 'LBL_STUDIO', 'ModuleBuilder' ), 'ModuleBuilder.main("studio")' ) ;
 			$ajax->addCrumb ( $this->translatedEditModule, 'ModuleBuilder.getContent("module=ModuleBuilder&action=wizard&view_module=' . $this->editModule . '")'  ) ;
 			$ajax->addCrumb ( translate ( $layoutLabel, 'ModuleBuilder' ), 'ModuleBuilder.getContent("module=ModuleBuilder&action=wizard&view='.$layoutView.'&view_module=' . $this->editModule . '")'  ) ;
 			if ( $layoutLabel == 'LBL_LAYOUTS' ) $ajax->addCrumb ( translate ( 'LBL_SEARCH_FORMS', 'ModuleBuilder' ), 'ModuleBuilder.getContent("module=ModuleBuilder&action=wizard&view=search&view_module=' .$this->editModule . '")' ) ;
 			$ajax->addCrumb ( translate ( $searchLabel, 'ModuleBuilder' ), ''  ) ;
 		}
 		$this->title = $searchLabel;
 		return $ajax ;
 	}
}
