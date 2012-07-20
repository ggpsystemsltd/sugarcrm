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




class DashletsDialog {
	var $dashlets = array();
	
    function getDashlets($category='') {
        global $app_strings, $current_language, $mod_strings;
        
        require_once($GLOBALS['sugar_config']['cache_dir'].'dashlets/dashlets.php');
        
        $categories = array( 'module' 	=> 'Module Views',
        					 'portal' 	=> 'Portal',
        					 'charts'	=> 'Charts',
        					 'tools'	=> 'Tools',
        					 'misc'		=> 'Miscellaneous',
        					 'web'      => 'Web');
        
        $dashletStrings = array();
        $dashletsList = array();
        
        if (!empty($category)){
			$dashletsList[$categories[$category]] = array();        	
        }
        else{
	        $dashletsList['Module Views'] = array();
	        $dashletsList['Charts'] = array();
	        $dashletsList['Tools'] = array();
	        $dashletsList['Web'] = array();
        }
              
        asort($dashletsFiles);
        
        foreach($dashletsFiles as $className => $files) {
            if(!empty($files['meta']) && is_file($files['meta'])) {
                require_once($files['meta']); // get meta file
                
                $directory = substr($files['meta'], 0, strrpos($files['meta'], '/') + 1);
                if(is_file($directory . $files['class'] . '.' . $current_language . '.lang.php')) 
                    require_once($directory . $files['class'] . '.' . $current_language . '.lang.php');
                elseif(is_file($directory . $files['class'] . '.en_us.lang.php')) 
                    require_once($directory . $files['class'] . '.en_us.lang.php');

                // try to translate the string
                if(empty($dashletStrings[$files['class']][$dashletMeta[$files['class']]['title']]))
                    $title = $dashletMeta[$files['class']]['title'];
                else 
                    $title = $dashletStrings[$files['class']][$dashletMeta[$files['class']]['title']];
                
                // try to translate the string
                if(empty($dashletStrings[$files['class']][$dashletMeta[$files['class']]['description']]))
                    $description = $dashletMeta[$files['class']]['description']; 
                else 
                    $description = $dashletStrings[$files['class']][$dashletMeta[$files['class']]['description']];
				
				// generate icon
                if (!empty($dashletMeta[$files['class']]['icon'])) {
                    // here we'll support image inheritance if the supplied image has a path in it
                    // i.e. $dashletMeta[$files['class']]['icon'] = 'themes/default/images/dog.gif'
                    // in this case, we'll strip off the path information to check for the image existing
                    // in the current theme.
                   
                    $imageName = SugarThemeRegistry::current()->getImageURL(basename($dashletMeta[$files['class']]['icon']), false);
                    if ( !empty($imageName) ) {
                        if (sugar_is_file($imageName))
                            $icon = '<img src="' . $imageName .'" alt="" border="0" align="absmiddle" />';  //leaving alt tag blank on purpose for 508
                        else
                            $icon = '';
                    }
                }
                else{
	                if (empty($dashletMeta[$files['class']]['module'])){
                		$icon = get_dashlets_dialog_icon('default');
                	}
					else{
						if((!in_array($dashletMeta[$files['class']]['module'], $GLOBALS['moduleList']) && !in_array($dashletMeta[$files['class']]['module'], $GLOBALS['modInvisList'])) && (!in_array('Activities', $GLOBALS['moduleList']))){
							unset($dashletMeta[$files['class']]);
							continue;
						}else{
	                    	$icon = get_dashlets_dialog_icon($dashletMeta[$files['class']]['module']);
						}
                	}
                }
                
                // determine whether to display
                if (!empty($dashletMeta[$files['class']]['hidden']) && $dashletMeta[$files['class']]['hidden'] === true){
                	$displayDashlet = false;
                }
				//co: fixes 20398 to respect ACL permissions
				elseif(!empty($dashletMeta[$files['class']]['module']) && (!in_array($dashletMeta[$files['class']]['module'], $GLOBALS['moduleList']) && !in_array($dashletMeta[$files['class']]['module'], $GLOBALS['modInvisList'])) && (!in_array('Activities', $GLOBALS['moduleList']))){
                	$displayDashlet = false;
                }
				else{
                	$displayDashlet = true;
                	//check ACL ACCESS
                	if(!empty($dashletMeta[$files['class']]['module']) && ACLController::moduleSupportsACL($dashletMeta[$files['class']]['module'])){
                		$type = 'module';
                		if($dashletMeta[$files['class']]['module'] == 'Trackers')
                			$type = 'Tracker';
                		if(!ACLController::checkAccess($dashletMeta[$files['class']]['module'], 'view', true, $type)){
                			$displayDashlet = false;
                		}
                		if(!ACLController::checkAccess($dashletMeta[$files['class']]['module'], 'list', true, $type)){
                			$displayDashlet = false;
                		}
                	}
                }
                                                
                if ($dashletMeta[$files['class']]['category'] == 'Charts'){
                	$type = 'predefined_chart';
                }
                else{
                	$type = 'module';
                }
                
                if ($displayDashlet && isset($dashletMeta[$files['class']]['dynamic_hide']) && $dashletMeta[$files['class']]['dynamic_hide']){
                    if ( file_exists($files['file']) ) {
                        require_once($files['file']);
                        if ( class_exists($files['class']) ) {
                            $dashletClassName = $files['class'];
                            $displayDashlet = call_user_func(array($files['class'],'shouldDisplay'));
                        }
                    }
                }
                	
                if ($displayDashlet){    
					$cell = array( 'title' => $title,
								   'description' => $description,
								   'onclick' => 'return SUGAR.mySugar.addDashlet(\'' . $className . '\', \'' . $type . '\', \''.(!empty($dashletMeta[$files['class']]['module']) ? $dashletMeta[$files['class']]['module'] : '' ) .'\');',
                                   'icon' => $icon,
                                   'id' => $files['class'] . '_select',
                               );

	                if (!empty($category) && $dashletMeta[$files['class']]['category'] == $categories[$category]){
	                	array_push($dashletsList[$categories[$category]], $cell);
	                }
	                else if (empty($category)){
						array_push($dashletsList[$dashletMeta[$files['class']]['category']], $cell);
	                }
                }
            }
        }
        if (!empty($category)){
        	asort($dashletsList[$categories[$category]]);
        }
        else{
        	foreach($dashletsList as $key=>$value){
        		asort($dashletsList[$key]);
        	}
        }
        $this->dashlets = $dashletsList;        
    }
        
    function getReportCharts($category){
    	global $current_user;
    	
    	
    	//require_once('modules/Reports/Report.php');
    	
    	$chartsList = array();
    	$focus = new SavedReport();
    	$focus->disable_row_level_security = false;
    	switch($category){
    		case 'global':
		    	// build global where string
		    	$where = "AND saved_reports.team_set_id='1'";
    	    	break;
    	    	
    		case 'myTeams':
		    	// build myTeams where string
		    	$myTeams = $current_user->get_my_teams();
		    	$where = '';
		    	foreach($myTeams as $team_id=>$team_name){
		    		if ($team_id != '1' && $team_id != $current_user->getPrivateTeamID()){
			    		if ($where == ''){
			    			$where .= 'AND ';
			    		}
			    		else{
			    			$where .= 'OR ';
			    		}
		    			$where .= "saved_reports.team_set_id='".$team_id. "' ";
		    		}
		    	}
		    	break;
		    	
    		case 'mySaved':
		    	// build mySaved where string
		    	$where = "AND saved_reports.team_set_id='".$current_user->getPrivateTeamID()."'";
		    	break;
		    	
		    case 'myFavorites':
                global $current_user;
                $sugaFav = new SugarFavorites();
                $current_favorites_beans = $sugaFav->getUserFavoritesByModule('Reports', $current_user);
                $current_favorites = array();
                foreach ($current_favorites_beans as $key=>$val) {
                    array_push($current_favorites,$val->record_id);
                }
                if(is_array($current_favorites) && !empty($current_favorites))
                    $where = ' AND saved_reports.id IN (\'' . implode("','", array_values($current_favorites)) . '\')';
                else
                    $where = ' AND saved_reports.id IN (\'-1\')';
                break;
		    	
		    	
    		default:
    			break;
    	}
		
    	$savedReports = $focus->get_full_list(""," chart_type != 'none' " . $where);
		
		$chartsList = array();
		if (!empty($savedReports)){
			foreach($savedReports as $savedReport){
				// clint - fixes bug #20398
				// only display dashlets that are from visibile modules and that the user has permission to list
				require_once('include/MySugar/MySugar.php');
				$myDashlet = new MySugar($savedReport->module);
				$displayDashlet = $myDashlet->checkDashletDisplay();

				if ($displayDashlet) {
				$report_def = array( 'title' => $savedReport->name,
										 'onclick' => 'return SUGAR.mySugar.addDashlet(\'' . $savedReport->id . '\', \'chart\', \''.$savedReport->module.'\');',
									);
									 
				array_push($chartsList, $report_def);
			}
		}
		}
		asort($chartsList);
		$this->dashlets[$category] = $chartsList;
    }
}

?>
