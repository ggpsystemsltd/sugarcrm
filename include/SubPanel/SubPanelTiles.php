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


require_once('include/SubPanel/SubPanel.php');
require_once('include/SubPanel/SubPanelTilesTabs.php');
require_once('include/SubPanel/SubPanelDefinitions.php');

/**
 * Subpanel tiles
 * @api
 */
class SubPanelTiles
{
	var $id;
	var $module;
	var $focus;
	var $start_on_field;
	var $layout_manager;
	var $layout_def_key;
	var $show_tabs = false;

	var $subpanel_definitions;

	var $hidden_tabs=array(); //consumer of this class can array of tabs that should be hidden. the tab name
							//should be the array.

	function SubPanelTiles(&$focus, $layout_def_key='', $layout_def_override = '')
	{
		$this->focus = $focus;
		$this->id = $focus->id;
		$this->module = $focus->module_dir;
		$this->layout_def_key = $layout_def_key;
		$this->subpanel_definitions=new SubPanelDefinitions($focus, $layout_def_key, $layout_def_override);
	}

	/*
	 * Return the current selected or requested subpanel tab
	 * @return	string	The identifier for the selected subpanel tab (e.g., 'Other')
	 */
    function getSelectedGroup()
    {
        global $current_user;

        if(isset($_REQUEST['subpanelTabs']))
            $_SESSION['subpanelTabs'] = $_REQUEST['subpanelTabs'];

        require_once 'include/tabConfig.php' ; // include/tabConfig.php in turn includes the customized file at custom/include/tabConfig.php...

        $subpanelTabsPref = $current_user->getPreference('subpanel_tabs');
        if(!isset($subpanelTabsPref)) $subpanelTabsPref = $GLOBALS['sugar_config']['default_subpanel_tabs'];
        if(!empty($GLOBALS['tabStructure']) && (!empty($_SESSION['subpanelTabs']) || !empty($sugar_config['subpanelTabs']) || !empty($subpanelTabsPref)))
        {
            // Determine selected group
            if(!empty($_REQUEST['subpanel']))
            {
                $selected_group = $_REQUEST['subpanel'];
            }
            elseif(!empty($_COOKIE[$this->module.'_sp_tab']))
            {
                $selected_group = $_COOKIE[$this->module.'_sp_tab'];
            }
            elseif(!empty($_SESSION['parentTab']) && !empty($GLOBALS['tabStructure'][$_SESSION['parentTab']]) && in_array($this->module, $GLOBALS['tabStructure'][$_SESSION['parentTab']]['modules']))
            {
                $selected_group = $_SESSION['parentTab'];
            }
            else
            {
                $selected_group = '';
                foreach($GLOBALS['tabStructure'] as $mainTab => $group)
                {
                    if(in_array($this->module, $group['modules']))
                    {
                        $selected_group = $mainTab;
                        break;
                    }
                }
                if(!$selected_group)
                {
                    $selected_group = 'All';
                }
            }
        }
        else
        {
        	$selected_group = '';
        }
        return $selected_group;
    }

    /*
     * Determine which subpanels should be shown within the selected tab group (e.g., 'Other');
     * @param boolean $showTabs		True if we should call the code to render each visible tab
     * @param string $selectedGroup	The requested tab group
     * @return array Visible tabs
     */
    function getTabs($showTabs = true, $selectedGroup='')
    {
        global $current_user;

        //get all the "tabs" - this actually means all the subpanels available for display within a tab
        $tabs = $this->subpanel_definitions->get_available_tabs();

        if(!empty($selectedGroup))
        {
            // Bug #44344 : Custom relationships under same module only show once in subpanel tabs
            // use object property instead new object to have ability run unit test (can override subpanel_definitions)
            $objSubPanelTilesTabs = new SubPanelTilesTabs($this->focus);
            $tabs = $objSubPanelTilesTabs->getTabs($tabs, $showTabs, $selectedGroup);
            unset($objSubPanelTilesTabs);
            return $tabs;
	    }
        else
        {
            // see if user current user has custom subpanel layout
            $tabs = SubPanelTilesTabs::applyUserCustomLayoutToTabs($tabs);

            /* Check if the preference is set now,
             * because there's no point in executing this code if
             * we aren't going to render anything.
             */
            $subpanelLinksPref = $current_user->getPreference('subpanel_links');
            if(!isset($subpanelLinksPref)) $subpanelLinksPref = $GLOBALS['sugar_config']['default_subpanel_links'];

            if($showTabs && $subpanelLinksPref){
               require_once('include/SubPanel/SugarTab.php');
               $sugarTab = new SugarTab();

               $displayTabs = array();

               foreach($tabs as $tab){
    	           $displayTabs []= array('key'=>$tab, 'label'=>translate($this->subpanel_definitions->layout_defs['subpanel_setup'][$tab]['title_key']));
    	           //echo '<td nowrap="nowrap"><a class="subTabLink" href="#' . $tab . '">' .  translate($this->subpanel_definitions->layout_defs['subpanel_setup'][$tab]['title_key']) .  '</a></td><td> | </td>';
    	       }
               $sugarTab->setup(array(),array(),$displayTabs);
               $sugarTab->display();
            }
            //echo '<td width="100%">&nbsp;</td></tr></table>';
        }
	    return $tabs;

	}
	function display($showContainer = true, $forceTabless = false)
	{
		global $layout_edit_mode, $sugar_version, $sugar_config, $current_user, $app_strings;
		if(isset($layout_edit_mode) && $layout_edit_mode){
			return;
		}

		global $modListHeader;

		ob_start();
    echo '<script type="text/javascript" src="'. getJSPath('include/SubPanel/SubPanelTiles.js') . '"></script>';
?>
<script>
if(document.DetailView != null &&
   document.DetailView.elements != null &&
   document.DetailView.elements.layout_def_key != null &&
   typeof document.DetailView.elements['layout_def_key'] != 'undefined'){
    document.DetailView.elements['layout_def_key'].value = '<?php echo $this->layout_def_key; ?>';
}
</script>
<?php

		$tabs = array();
		$default_div_display = 'inline';
		if(!empty($sugar_config['hide_subpanels_on_login'])){
			if(!isset($_SESSION['visited_details'][$this->focus->module_dir])){
				setcookie($this->focus->module_dir . '_divs', '');
				unset($_COOKIE[$this->focus->module_dir . '_divs']);
				$_SESSION['visited_details'][$this->focus->module_dir] = true;

			}
			$default_div_display = 'none';
		}
		$div_cookies = get_sub_cookies($this->focus->module_dir . '_divs');


		//Display the group header. this section is executed only if the tabbed interface is being used.
		$current_key = '';
		if (! empty($this->show_tabs))
		{
			require_once('include/tabs.php');
    		$tab_panel = new SugarWidgetTabs($tabs, $current_key, 'showSubPanel');
			echo get_form_header('Related', '', false);
			echo "<br />" . $tab_panel->display();
		}

        if(empty($_REQUEST['subpanels']))
        {
            $selected_group = $forceTabless?'':$this->getSelectedGroup();
            $usersLayout = $current_user->getPreference('subpanelLayout', $this->focus->module_dir);

            // we need to use some intelligence here when restoring the user's layout, as new modules with new subpanels might have been installed since the user's layout was recorded
            // this means that we can't just restore the old layout verbatim as the new subpanels would then go walkabout
            // so we need to do a merge while attempting as best we can to preserve the sense of the specified order
            // this is complicated by the different ordering schemes used in the two sources for the panels: the user's layout uses an ordinal layout, the panels from getTabs have an explicit ordering driven by the 'order' parameter
            // it's not clear how to best reconcile these two schemes; so we punt on it, and add all new panels to the end of the user's layout. At least this will give them a clue that something has changed...
            // we also now check for tabs that have been removed since the user saved his or her preferences.

            $tabs = $this->getTabs($showContainer, $selected_group) ;

            if(!empty($usersLayout))
            {
                $availableTabs = $tabs ;
                $tabs = array_intersect ( $usersLayout , $availableTabs ) ; // remove any tabs that have been removed since the user's layout was saved
                foreach (array_diff ( $availableTabs , $usersLayout ) as $tab)
                    $tabs [] = $tab ;
            }
        }
        else
        {
        	$tabs = explode(',', $_REQUEST['subpanels']);
        }

        $tab_names = array();

        if($showContainer)
        {
            echo '<ul class="noBullet" id="subpanel_list">';
        }
        //echo "<li id='hidden_0' style='height: 5px' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>";
        if (empty($GLOBALS['relationships'])) {
        	if (!class_exists('Relationship')) {
        		require('modules/Relationships/Relationship.php');
        	}
        	$rel= new Relationship();
	        $rel->load_relationship_meta();
        }

        foreach ($tabs as $tab)
		{
			//load meta definition of the sub-panel.
			$thisPanel=$this->subpanel_definitions->load_subpanel($tab);
            if ($thisPanel === false)
                continue;
			//this if-block will try to skip over ophaned subpanels. Studio/MB are being delete unloaded modules completely.
			//this check will ignore subpanels that are collections (activities, history, etc)
			if (!isset($thisPanel->_instance_properties['collection_list']) and isset($thisPanel->_instance_properties['get_subpanel_data']) ) {
				//ignore when data source is a function

				if (!isset($this->focus->field_defs[$thisPanel->_instance_properties['get_subpanel_data']])) {
					if (stripos($thisPanel->_instance_properties['get_subpanel_data'],'function:') === false) {
						$GLOBALS['log']->fatal("Bad subpanel definition, it has incorrect value for get_subpanel_data property " .$tab);
						continue;
					}
				} else {
					$rel_name='';
					if (isset($this->focus->field_defs[$thisPanel->_instance_properties['get_subpanel_data']]['relationship'])) {
						$rel_name=$this->focus->field_defs[$thisPanel->_instance_properties['get_subpanel_data']]['relationship'];
					}

					if (empty($rel_name) or !isset($GLOBALS['relationships'][$rel_name])) {
						$GLOBALS['log']->fatal("Missing relationship definition " .$rel_name. ". skipping " .$tab ." subpanel");
						continue;
					}
				}
			}

			echo '<li class="noBullet" id="whole_subpanel_' . $tab . '">';

			$display= 'none';
			$div_display = $default_div_display;
			$cookie_name =   $tab . '_v';

			if(isset($div_cookies[$cookie_name])){
				$div_display = 	$div_cookies[$cookie_name];
			}
			if(!empty($sugar_config['hide_subpanels'])){
				$div_display = 'none';
			}
            if($thisPanel->isDefaultHidden()) {
                $div_display = 'none';
            }
			if($div_display == 'none'){
				$opp_display  = 'inline';
			}else{
				$opp_display  = 'none';
			}

            if (!empty($this->layout_def_key) ) {
                $layout_def_key = $this->layout_def_key;
            } else {
                $layout_def_key = '';
            }

			if (empty($this->show_tabs))
			{
				$show_icon_html = SugarThemeRegistry::current()->getImage( 'advanced_search', 'border="0 align="absmiddle""',null,null,'.gif',translate('LBL_SHOW'));
				$hide_icon_html = SugarThemeRegistry::current()->getImage( 'basic_search', 'border="0" align="absmiddle"',null,null,'.gif',translate('LBL_HIDE'));

 		 		$max_min = "<a name=\"$tab\"> </a><span id=\"show_link_".$tab."\" style=\"display: $opp_display\"><a href='#' class='utilsLink' onclick=\"current_child_field = '".$tab."';showSubPanel('".$tab."',null,null,'".$layout_def_key."');document.getElementById('show_link_".$tab."').style.display='none';document.getElementById('hide_link_".$tab."').style.display='';return false;\">"
 		 			. "" . $show_icon_html . "</a></span>";
				$max_min .= "<span id=\"hide_link_".$tab."\" style=\"display: $div_display\"><a href='#' class='utilsLink' onclick=\"hideSubPanel('".$tab."');document.getElementById('hide_link_".$tab."').style.display='none';document.getElementById('show_link_".$tab."').style.display='';return false;\">"
				 . "" . $hide_icon_html . "</a></span>";
				echo '<div id="subpanel_title_' . $tab . '"';
                if(empty($sugar_config['lock_subpanels']) || $sugar_config['lock_subpanels'] == false) echo ' onmouseover="this.style.cursor = \'move\';"';
                echo '>' . get_form_header( $thisPanel->get_title(), $max_min, false) . '</div>';
			}

            echo <<<EOQ
<div cookie_name="$cookie_name" id="subpanel_$tab" style="display:$div_display">
    <script>document.getElementById("subpanel_$tab" ).cookie_name="$cookie_name";</script>
EOQ;
            $display_spd = '';
            if($div_display != 'none'){
            	echo "<script>SUGAR.util.doWhen(\"typeof(markSubPanelLoaded) != 'undefined'\", function() {markSubPanelLoaded('$tab');});</script>";
            	$old_contents = ob_get_contents();
            	@ob_end_clean();

            	ob_start();
            	include_once('include/SubPanel/SubPanel.php');
            	$subpanel_object = new SubPanel($this->module, $_REQUEST['record'], $tab,$thisPanel,$layout_def_key);
            	$subpanel_object->setTemplateFile('include/SubPanel/SubPanelDynamic.html');
            	$subpanel_object->display();
            	$subpanel_data = ob_get_contents();
            	@ob_end_clean();

            	ob_start();
            	echo $this->get_buttons($thisPanel,$subpanel_object->subpanel_query);
            	$buttons = ob_get_contents();
            	@ob_end_clean();

            	ob_start();
            	echo $old_contents;
            	//echo $buttons;
                $display_spd = $subpanel_data;
            }
            echo <<<EOQ
    <div id="list_subpanel_$tab">$display_spd</div>
</div>
EOQ;
        	array_push($tab_names, $tab);
        	echo '</li>';
        } // end $tabs foreach
        if($showContainer)
        {
        	echo '</ul>';


            if(!empty($selected_group))
            {
                // closing table from tpls/singletabmenu.tpl
                echo '</td></tr></table>';
            }
        }
        // drag/drop code
        $tab_names = '["' . join($tab_names, '","') . '"]';
        global $sugar_config;

        if(empty($sugar_config['lock_subpanels']) || $sugar_config['lock_subpanels'] == false) {
            echo <<<EOQ
    <script>
    	var SubpanelInit = function() {
    		SubpanelInitTabNames({$tab_names});
    	}
        var SubpanelInitTabNames = function(tabNames) {
    		subpanel_dd = new Array();
    		j = 0;
    		for(i in tabNames) {
    			subpanel_dd[j] = new ygDDList('whole_subpanel_' + tabNames[i]);
    			subpanel_dd[j].setHandleElId('subpanel_title_' + tabNames[i]);
    			subpanel_dd[j].onMouseDown = SUGAR.subpanelUtils.onDrag;
    			subpanel_dd[j].afterEndDrag = SUGAR.subpanelUtils.onDrop;
    			j++;
    		}

    		YAHOO.util.DDM.mode = 1;
    	}
    	currentModule = '{$this->module}';
    	SUGAR.util.doWhen(
    	    "typeof(SUGAR.subpanelUtils) == 'object' && typeof(SUGAR.subpanelUtils.onDrag) == 'function'" +
    	        " && document.getElementById('subpanel_list')",
    	    SubpanelInit
    	);
    </script>
EOQ;
        }

		$ob_contents = ob_get_contents();
		ob_end_clean();
		return $ob_contents;
	}


	function getLayoutManager()
	{
		require_once('include/generic/LayoutManager.php');
	  	if ( $this->layout_manager == null) {
	    	$this->layout_manager = new LayoutManager();
	  	}
	  	return $this->layout_manager;
	}

	function get_buttons($thisPanel,$panel_query=null)
	{
		$subpanel_def = $thisPanel->get_buttons();
		$layout_manager = $this->getLayoutManager();
		$widget_contents = '<span><table cellpadding="0" cellspacing="0"><tr>';
		foreach($subpanel_def as $widget_data)
		{
			$widget_data['query']=urlencode($panel_query);
			$widget_data['action'] = $_REQUEST['action'];
			$widget_data['module'] =  $thisPanel->get_inst_prop_value('module');
			$widget_data['focus'] = $this->focus;
			$widget_data['subpanel_definition'] = $thisPanel;
			$widget_contents .= '<td class="buttons">' . "\n";

			if(empty($widget_data['widget_class']))
			{
				$widget_contents .= "widget_class not defined for top subpanel buttons";
			}
			else
			{
				$widget_contents .= $layout_manager->widgetDisplay($widget_data);
			}

			$widget_contents .= '</td>';
		}

		$widget_contents .= '</tr></table></span>';
		return $widget_contents;
	}
}
?>
