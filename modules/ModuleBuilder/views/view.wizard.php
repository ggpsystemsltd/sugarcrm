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
require_once ('modules/ModuleBuilder/Module/StudioModuleFactory.php') ;
require_once ('include/MVC/View/SugarView.php') ;

class ModuleBuilderViewWizard extends SugarView
{
	private $view = null ; // the wizard view to display
	private $actions ;
	private $buttons ;
	private $question ;
	private $title ;
	private $help ;

	private $editModule ;

	function __construct()
	{
		if ( isset ( $_REQUEST [ 'view' ] ) )
			$this->view = $_REQUEST [ 'view' ] ;

		$this->editModule = (! empty ( $_REQUEST [ 'view_module' ] ) ) ? $_REQUEST [ 'view_module' ] : null ;
		$this->buttons = array(); // initialize so that modules without subpanels for example don't result in this being unset and causing problems in the smarty->assign
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

	function display()
	{
		$this->ajax = new AjaxCompose ( ) ;
		$smarty = new Sugar_Smarty ( ) ;

		if (isset ( $_REQUEST [ 'MB' ] ))
		{
			$this->processMB ( $this->ajax ) ;
		} else
		{

				$this->processStudio ( $this->ajax ) ;

		}

		$smarty->assign ( 'buttons', $this->buttons ) ;
		$smarty->assign ( 'image_path', $GLOBALS [ 'image_path' ] ) ;
		$smarty->assign ( "title", $this->title ) ;
		$smarty->assign ( "question", $this->question ) ;
		$smarty->assign ( "defaultHelp", $this->help ) ;
		$smarty->assign ( "actions", $this->actions ) ;

		$this->ajax->addSection ( 'center', $this->title, $smarty->fetch ( 'modules/ModuleBuilder/tpls/wizard.tpl' ) ) ;
		echo $this->ajax->getJavascript () ;
	}

	function processStudio( 
	    $ajax
	    )
	{

		$this->ajax->addCrumb ( translate( 'LBL_STUDIO' ), 'ModuleBuilder.main("studio")' ) ;

		if (! isset ( $this->editModule ))
		{
			//Studio Select Module Page
			$this->generateStudioModuleButtons () ;
			$this->question = translate('LBL_QUESTION_EDIT') ;
			$this->title = translate( 'LBL_STUDIO' );
			global $current_user;
			if (is_admin($current_user))
				$this->actions = "<input class=\"button\" type=\"button\" id=\"exportBtn\" name=\"exportBtn\" onclick=\"ModuleBuilder.getContent('module=ModuleBuilder&action=exportcustomizations');\" value=\"" . translate ( 'LBL_BTN_EXPORT' ) . '">' ;

			$this->help = 'studioHelp' ;
		} else
		{
			$module = StudioModuleFactory::getStudioModule( $this->editModule ) ;
			$this->ajax->addCrumb ( $module->name, !empty($this->view) ? 'ModuleBuilder.getContent("module=ModuleBuilder&action=wizard&view_module=' . $this->editModule . '")' : '' ) ;
			switch ( $this->view )
			{
				case 'layouts':
					//Studio Select Layout page
					$this->buttons = $module->getLayouts() ;
					$this->title = $module->name . " " . translate('LBL_LAYOUTS') ;
					$this->question = translate( 'LBL_QUESTION_LAYOUT' ) ;
					$this->help = 'layoutsHelp' ;
					$this->ajax->addCrumb ( translate( 'LBL_LAYOUTS' ), '' ) ;
					break;

				case 'wirelesslayouts':
					//Studio Select WirelessLayout page
					$this->buttons = $module->getWirelessLayouts() ;
					$this->title = $module->name . " " . translate('LBL_WIRELESSLAYOUTS') ;
					$this->question = translate( 'LBL_QUESTION_LAYOUT' ) ;
					$this->help = 'layoutsHelp' ;
					$this->ajax->addCrumb ( translate( 'LBL_WIRELESSLAYOUTS' ), '' ) ;
					break;

				case 'subpanels':
					//Studio Select Subpanel page.
					$this->buttons = $module->getSubpanels() ;
					$this->title = $module->name . " " . translate( 'LBL_SUBPANELS' ) ;
					$this->question = translate( 'LBL_QUESTION_SUBPANEL' ) ;
					$this->ajax->addCrumb ( translate( 'LBL_SUBPANELS' ), '' ) ;
					$this->help = 'subpanelHelp' ;
					break;

				case 'search':
					//Studio Select Search Layout page.
					$this->buttons = $module->getSearch() ;
					$this->title = $module->name . " " . translate('LBL_SEARCH');
					$this->question = translate( 'LBL_QUESTION_SEARCH' ) ;
					$this->ajax->addCrumb ( translate( 'LBL_LAYOUTS' ), 'ModuleBuilder.getContent("module=ModuleBuilder&action=wizard&view=layouts&view_module=' . $this->editModule . '")' ) ;
					$this->ajax->addCrumb ( translate( 'LBL_SEARCH' ), '' ) ;
					$this->help = 'searchHelp' ;
					break;

				case 'dashlet':
					$this->generateStudioDashletButtons();
					$this->title = $this->editModule ." " .translate('LBL_DASHLET');
					$this->question = translate( 'LBL_QUESTION_DASHLET' ) ;
					$this->ajax->addCrumb ( translate( 'LBL_LAYOUTS' ), 'ModuleBuilder.getContent("module=ModuleBuilder&action=wizard&view=layouts&view_module=' . $this->editModule . '")' ) ;
					$this->ajax->addCrumb ( translate( 'LBL_DASHLET' ), '' ) ;
					$this->help = 'dashletHelp' ;
					break;
				
				case 'popup':
					$this->generateStudioPopupButtons();
					$this->title = $this->editModule ." " .translate('LBL_POPUP');
					$this->question = translate( 'LBL_QUESTION_POPUP' ) ;
					$this->ajax->addCrumb ( translate( 'LBL_LAYOUTS' ), 'ModuleBuilder.getContent("module=ModuleBuilder&action=wizard&view=layouts&view_module=' . $this->editModule . '")' ) ;
					$this->ajax->addCrumb ( translate( 'LBL_POPUP' ), '' ) ;
					$this->help = 'popupHelp' ;
					break;
				default:
					//Studio Edit Module Page
					$this->buttons = $module->getModule () ;
					$this->question = translate( 'LBL_QUESTION_MODULE' ) ;
					$this->title = translate( 'LBL_EDIT' ) . " " . $module->name ;
					$this->help = 'moduleHelp' ;
					global $current_user;
					if (is_admin($current_user))
                        $this->actions = "<input class=\"button\" type=\"button\" id=\"exportBtn\" name=\"exportBtn\" " 
                        . "onclick=\"ModuleBuilder.getContent('module=ModuleBuilder&action=resetmodule&view_module=$this->editModule');\" value=\"" 
                        . translate( 'LBL_RESET_MODULE' ) . '">' ;
			}
		}
	}

	function processMB ( 
	    $ajax 
	    )
	{
		if (! isset ( $_REQUEST [ 'view_package' ] ))
		{
			sugar_die ( "no ModuleBuilder package set" ) ;
		}

		$this->editModule = $_REQUEST [ 'view_module' ] ;
		$this->package = $_REQUEST [ 'view_package' ] ;

		$ajax->addCrumb ( translate ( 'LBL_MODULEBUILDER', 'ModuleBuilder' ), 'ModuleBuilder.main("mb")' ) ;
		$ajax->addCrumb ( $this->package, 'ModuleBuilder.getContent("module=ModuleBuilder&action=package&view_package=' . $this->package . '")' ) ;
		$ajax->addCrumb ( $this->editModule, 'ModuleBuilder.getContent("module=ModuleBuilder&action=module&view_module=' . $this->editModule . '&view_package=' . $this->package . '")') ;

		switch ( $this->view )
		{
			case 'search':
				//MB Select Search Layout page.
				$this->generateMBSearchButtons () ;
				$this->title = $this->editModule . " " . translate( 'LBL_SEARCH' ) ;
				$this->question = translate( 'LBL_QUESTION_SEARCH' ) ;
				$ajax->addCrumb ( translate( 'LBL_LAYOUTS' ), 'ModuleBuilder.getContent("module=ModuleBuilder&MB=true&action=wizard&view_module=' . $this->editModule . '&view_package=' . $this->package . '")' ) ;
				$ajax->addCrumb ( translate( 'LBL_SEARCH_FORMS' ), '' ) ;
				$this->help = "searchHelp" ;
				break;

			case 'subpanel':
				//ModuleBuilder Select Subpanel
				$ajax->addCrumb ( $this->editModule, 'ModuleBuilder.getContent("module=ModuleBuilder&action=module&view_module=' . $this->editModule . '&view_package=' . $this->package . '")' ) ;
				$ajax->addCrumb ( translate( 'LBL_SUBPANELS' ), '' ) ;
				$this->question = translate( 'LBL_QUESTION_SUBPANEL' ) ;
				$this->help = 'subpanelHelp' ;
				break;

			case 'dashlet':
				$this->generateMBDashletButtons ();
				$this->title = $this->editModule ." " .translate('LBL_DASHLET');
				$this->question = translate( 'LBL_QUESTION_DASHLET' ) ;
				$this->ajax->addCrumb ( translate( 'LBL_LAYOUTS' ), 'ModuleBuilder.getContent("module=ModuleBuilder&action=wizard&view=layouts&MB=1&view_package='.$this->package.'&view_module=' . $this->editModule . '")' ) ;
				$this->ajax->addCrumb ( translate( 'LBL_DASHLET' ), '' ) ;
				$this->help = 'dashletHelp' ;
				break;

			case 'wirelesslayouts':
				$ajax->addCrumb ( translate( 'LBL_WIRELESSLAYOUTS' ), 'ModuleBuilder.getContent("module=ModuleBuilder&MB=true&action=wizard&view=wirelesslayouts&view_module=' . $this->editModule . '&view_package=' . $this->package . '")' ) ;
				$mb = new ModuleBuilder ( ) ;
				$module = $mb->getPackageModule( $this->package , $this->editModule ) ;
				$this->buttons = $module->getWirelessLayouts () ;
				$this->title = $this->editModule . " " . translate( 'LBL_WIRELESSLAYOUTS' ) ;
				$this->question = translate( 'LBL_QUESTION_LAYOUT' ) ;
				$this->help = "layoutsHelp" ;
				break ;

			case 'wirelesssearch':
				$mb = new ModuleBuilder ( ) ;
				$module = $mb->getPackageModule( $this->package , $this->editModule ) ;
				$this->buttons = $module->getWirelessSearch () ;
				$this->title = $this->editModule . " " . translate( 'LBL_WIRELESSSEARCH' ) ;
				$this->question = translate( 'LBL_QUESTION_SEARCH' ) ;
				$ajax->addCrumb ( translate( 'LBL_WIRELESSLAYOUTS' ), 'ModuleBuilder.getContent("module=ModuleBuilder&MB=true&action=wizard&view_module=' . $this->editModule . '&view_package=' . $this->package . '")' ) ;
				$ajax->addCrumb ( translate( 'LBL_WIRELESSSEARCH' ), '' ) ;
				$this->help = "searchHelp" ;
				break;

			case 'popup':
				$this->generateMBPopupButtons();
				$this->title = $this->editModule ." " .translate('LBL_POPUP');
				$this->question = translate( 'LBL_QUESTION_POPUP' ) ;
				$this->ajax->addCrumb ( translate( 'LBL_LAYOUTS' ), 'ModuleBuilder.getContent("module=ModuleBuilder&MB=true&action=wizard&view=layouts&MB=1&view_package='.$this->package.'&view_module=' . $this->editModule . '")' ) ;
				$this->ajax->addCrumb ( translate( 'LBL_POPUP' ), '' ) ;
				$this->help = 'popupHelp' ;
				break;
			default:
				$ajax->addCrumb ( translate( 'LBL_LAYOUTS' ), '' ) ;
				$this->generateMBViewButtons () ;
				$this->title = $this->editModule . " " . translate( 'LBL_LAYOUTS' ) ;
				$this->question = translate( 'LBL_QUESTION_LAYOUT' ) ;
				$this->help = "layoutsHelp" ;
		}
	}


	function generateStudioModuleButtons()
	{
		require_once ('modules/ModuleBuilder/Module/StudioBrowser.php') ;
		$sb = new StudioBrowser ( ) ;
		$sb->loadModules () ;
		$nodes = $sb->getNodes () ;
		$this->buttons = array ( ) ;
		//$GLOBALS['log']->debug(print_r($nodes,true));
		foreach ( $nodes as $module )
		{
			$this->buttons [ $module [ 'name' ] ] = array ( 'action' => $module [ 'action' ] , 'imageTitle' => ucfirst ( $module [ 'module' ] . "_32" ) , 'size' => '32', 'linkId' => 'studiolink_'.$module [ 'module' ] ) ;
		}
	}



	function generateMBViewButtons()
	{
		$this->buttons [ $GLOBALS [ 'mod_strings' ] [ 'LBL_EDITVIEW' ] ] = 
		  array ( 
		      'action' => "module=ModuleBuilder&MB=true&action=editLayout&view=".MB_EDITVIEW."&view_module={$this->editModule}&view_package={$this->package}" , 
		      'imageTitle' => 'EditView', 
		      'help'=>'viewBtnEditView'
		  ) ;
		$this->buttons [ $GLOBALS [ 'mod_strings' ] [ 'LBL_DETAILVIEW' ] ] = 
		  array ( 
		      'action' => "module=ModuleBuilder&MB=true&action=editLayout&view=".MB_DETAILVIEW."&view_module={$this->editModule}&view_package={$this->package}" , 
		      'imageTitle' => 'DetailView', 
		      'help'=>'viewBtnListView'  
		  ) ;
		$this->buttons [ $GLOBALS [ 'mod_strings' ] [ 'LBL_LISTVIEW' ] ] = 
		  array ( 
		      'action' => "module=ModuleBuilder&MB=true&action=editLayout&view=".MB_LISTVIEW."&view_module={$this->editModule}&view_package={$this->package}" , 
		      'imageTitle' => 'ListView', 
		      'help'=>'viewBtnListView' 
		  ) ;
		  $this->buttons [ $GLOBALS [ 'mod_strings' ] [ 'LBL_QUICKCREATE' ] ] = 
		  array ( 
		      'action' => "module=ModuleBuilder&MB=true&action=editLayout&view=".MB_QUICKCREATE."&view_module={$this->editModule}&view_package={$this->package}" , 
		      'imageTitle' => 'QuickCreate', 
		      'help'=>'viewBtnQuickCreate' 
		  ) ;
		$this->buttons [ $GLOBALS [ 'mod_strings' ] [ 'LBL_SEARCH' ] ] = 
		  array (
		      'action' => "module=ModuleBuilder&MB=true&action=wizard&view=search&view_module={$this->editModule}&view_package={$this->package}" , 
		      'imageTitle' => 'SearchForm' , 
		      'help'=> 'searchBtn' 
		  ) ;
		$this->buttons [ $GLOBALS [ 'mod_strings' ] [ 'LBL_DASHLET' ] ] = 
		  array ( 
		      'action' => "module=ModuleBuilder&MB=true&action=wizard&view=dashlet&view_module={$this->editModule}&view_package={$this->package}" , 
		      'imageTitle' => 'Dashlet', 
		      'help'=>'viewBtnDashlet' 
		  ) ;
		$this->buttons [ $GLOBALS [ 'mod_strings' ] ['LBL_POPUP'] ] = 
		array ( 
			'imageTitle' => 'Popup',  
			'action' => "module=ModuleBuilder&MB=true&action=wizard&view=popup&view_module={$this->editModule}&view_package={$this->package}", 
			'help'=>'PopupListViewBtn'
		);  
	}

	function generateMBDashletButtons() 
	{
		$this->buttons [ $GLOBALS [ 'mod_strings' ][ 'LBL_DASHLETLISTVIEW' ] ] = array('action'=> "module=ModuleBuilder&MB=true&action=editLayout&view=dashlet&view_module={$this->editModule}&view_package={$this->package}", 'imageTitle'=> $GLOBALS ['mod_strings']['LBL_DASHLETLISTVIEW'], 'imageName'=>'ListView', 'help'=>'DashletListViewBtn');
		$this->buttons [ $GLOBALS [ 'mod_strings' ][ 'LBL_DASHLETSEARCHVIEW' ] ] = array('action'=> "module=ModuleBuilder&MB=true&action=editLayout&view=dashletsearch&view_module={$this->editModule}&view_package={$this->package}", 'imageTitle'=> $GLOBALS ['mod_strings']['LBL_DASHLETSEARCHVIEW'], 'imageName'=>'BasicSearch','help'=> 'DashletSearchViewBtn');
	}
	
	function generateMBPopupButtons() 
	{
		$this->buttons [ $GLOBALS [ 'mod_strings' ][ 'LBL_POPUPLISTVIEW' ] ] = array('action'=> "module=ModuleBuilder&action=editLayout&view=popuplist&view_module={$this->editModule}&view_package={$this->package}", 'imageTitle'=> $GLOBALS ['mod_strings']['LBL_POPUPLISTVIEW'], 'imageName'=>'ListView', 'help'=>'PopupListViewBtn');
		$this->buttons [ $GLOBALS [ 'mod_strings' ][ 'LBL_POPUPSEARCH' ] ] = array('action'=> "module=ModuleBuilder&action=editLayout&view=popupsearch&view_module={$this->editModule}&view_package={$this->package}", 'imageTitle'=> $GLOBALS ['mod_strings']['LBL_POPUPSEARCH'], 'imageName'=>'BasicSearch','help'=> 'PopupSearchViewBtn');
	}
	
	function generateStudioDashletButtons() 
	{
		$this->buttons [ $GLOBALS [ 'mod_strings' ][ 'LBL_DASHLETLISTVIEW' ] ] = array('action'=> "module=ModuleBuilder&action=editLayout&view=dashlet&view_module={$this->editModule}", 'imageTitle'=> $GLOBALS ['mod_strings']['LBL_DASHLETLISTVIEW'], 'imageName'=>'ListView', 'help'=>'DashletListViewBtn');
		$this->buttons [ $GLOBALS [ 'mod_strings' ][ 'LBL_DASHLETSEARCHVIEW' ] ] = array('action'=> "module=ModuleBuilder&action=editLayout&view=dashletsearch&view_module={$this->editModule}", 'imageTitle'=> $GLOBALS ['mod_strings']['LBL_DASHLETSEARCHVIEW'], 'imageName'=>'BasicSearch','help'=> 'DashletSearchViewBtn');
	}
	
	function generateStudioPopupButtons()
	{
		$this->buttons [ $GLOBALS [ 'mod_strings' ][ 'LBL_POPUPLISTVIEW' ] ] = array('action'=> "module=ModuleBuilder&action=editLayout&view=popuplist&view_module={$this->editModule}", 'imageTitle'=> $GLOBALS ['mod_strings']['LBL_POPUPLISTVIEW'], 'imageName'=>'ListView', 'help'=>'PopupListViewBtn');
		$this->buttons [ $GLOBALS [ 'mod_strings' ][ 'LBL_POPUPSEARCH' ] ] = array('action'=> "module=ModuleBuilder&action=editLayout&view=popupsearch&view_module={$this->editModule}", 'imageTitle'=> $GLOBALS ['mod_strings']['LBL_POPUPSEARCH'], 'imageName'=>'BasicSearch','help'=> 'PopupSearchViewBtn');
	}
	
	function generateMBSearchButtons()
	{
		$this->buttons [ $GLOBALS [ 'mod_strings' ] [ 'LBL_BASIC' ] ] = array ( 'action' => "module=ModuleBuilder&MB=true&action=editLayout&view_module={$this->editModule}&view_package={$this->package}&view=SearchView&searchlayout=basic_search" , 'imageTitle' => $GLOBALS [ 'mod_strings' ] [ 'LBL_BASIC_SEARCH' ] , 'imageName' => 'BasicSearch','help' => "BasicSearchBtn" ) ;
		$this->buttons [ $GLOBALS [ 'mod_strings' ] [ 'LBL_ADVANCED' ] ] = array ( 'action' => "module=ModuleBuilder&MB=true&action=editLayout&view_module={$this->editModule}&view_package={$this->package}&view=SearchView&searchlayout=advanced_search" , 'imageTitle' => $GLOBALS [ 'mod_strings' ] [ 'LBL_ADVANCED_SEARCH' ] , 'imageName' => 'AdvancedSearch','help' => "AdvancedSearchBtn" ) ;
	}
}
