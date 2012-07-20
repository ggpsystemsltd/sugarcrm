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


class SugarWidgetFieldteam_set_id extends SugarWidgetReportField{
	
/**
 * Format the display to be similiar to what we do in a listview
 * Difference is since we already have the team_set_id we will grab all of the teams and not do an ajax request like
 * we do in a list view.
 * @param string $cell
 */
function & displayListPlain($layout_def){
		$value = $this->_get_list_value($layout_def);
		if(!empty($value)){
			$teams = TeamSetManager::getTeamsFromSet($value);
			if(!empty($teams)){
				if(!empty($teams[0]['display_name'])){
					$result = $teams[0]['display_name'];

	            	if((! empty($_REQUEST['to_csv']))|| (! empty($_REQUEST['to_pdf']) )) {
                            // if for csv export, we don't generate html
                            $result = '';
                            foreach($teams as $row) {
                                $result .= $row['display_name'].", ";
                            }
                            //get rid of the trailing comma

                            $result = substr($result, 0, -2);
                    } else {
                            $body = '';
                            foreach($teams as $row){
                                $body .= $row['display_name'].'<br/>';
                            }

                            $result .= "&nbsp;<a href=\"#\" style='text-decoration:none;' id='more_feather' onmouseout=\"return nd();\" onmouseover=\"return overlib('".$body."', CAPTION, '', STICKY, MOUSEOFF, 1000, WIDTH, 100, CLOSETEXT, ('<img border=0 style=\'margin-left:2px; margin-right: 2px;\' src=index.php?entryPoint=getImage&themeName='+SUGAR.themes.theme_name+'&imageName=close.gif>'), CLOSETITLE, SUGAR.language.get('app_strings','LBL_ADDITIONAL_DETAILS_CLOSE_TITLE'), CLOSECLICK, FGCLASS, 'olFgClass', CGCLASS, 'olCgClass', BGCLASS, 'olBgClass', TEXTFONTCLASS, 'olFontClass', CAPTIONFONTCLASS, 'olCapFontClass', CLOSEFONTCLASS, 'olCloseFontClass');\">+</a>";
                    }

					return $result;
				}else{
					return '';
				}
			}else{
				return '';
			}
		}else{
			return '';
		}
}

/**
 * Perform the Any type query
 *
 * @param array $layout_def
 * @return string the subquery to be run
 */
 function queryFilterany(&$layout_def){
		require_once('include/SugarFields/SugarFieldHandler.php');
		$sfh = new SugarFieldHandler();
        $sf = $sfh->getSugarField('teamset');
        $teams = array();
        $field_value = '';
        if(!empty($layout_def['input_name0'])) {
           foreach($layout_def['input_name0'] as $team) {
           	   $teams[$team] = $team;
           	   if (!empty($field_value)) {
	           	$field_value .= ',';
	           }
	           $field_value .= "'" . $GLOBALS['db']->quote($team) . "'";
           }
        }
        
        $searchParams = $sf->getTeamSetIdSearchField('team_set_id', 'any', $teams);
        $query = string_format($searchParams['subquery'], array($field_value));
		return $this->_get_column_select($layout_def)." IN ({$query}) " . $this->queryPrimaryTeam($layout_def) . "\n";
 }
 
 /**
  * Perform the All type query
  *
  * @param array $layout_def
  * @return string the subquery to be run
  */
 function queryFilterall(&$layout_def){
		require_once('include/SugarFields/SugarFieldHandler.php');
		$sfh = new SugarFieldHandler();
        $sf = $sfh->getSugarField('teamset');
        $teams = array();
        $field_value = '';
        if(!empty($layout_def['input_name0'])) {
           foreach($layout_def['input_name0'] as $team) {
           	   $teams[$team] = $team;
           	   if (!empty($field_value)) {
	           	$field_value .= ',';
	           }
	           $field_value .= "'" . $GLOBALS['db']->quote($team) . "'";
           }
        }
        
        $searchParams = $sf->getTeamSetIdSearchField('team_set_id', 'all', $teams);
        $query = string_format($searchParams['subquery'], array($field_value));
        return $this->_get_column_select($layout_def)." IN ({$query}) " . $this->queryPrimaryTeam($layout_def) . "\n";
 }

 /**
  * Perform the Exact type query
  *
  * @param array $layout_def
  * @return string the subquery to be run
  */
 function queryFilterexact(&$layout_def){
 	require_once('include/SugarFields/SugarFieldHandler.php');
	$sfh = new SugarFieldHandler();
    $sf = $sfh->getSugarField('teamset');
    $teams = array();
    if(!empty($layout_def['input_name0'])) {
    	foreach($layout_def['input_name0'] as $team) {
        	$teams[$team] = $team;
        }
    }

    $searchParams = $sf->getTeamSetIdSearchField('team_set_id', 'exact', $teams);
    $query = string_format($searchParams['subquery'], array($searchParams['value']));
	return $this->_get_column_select($layout_def)."= ({$query}) " . $this->queryPrimaryTeam($layout_def) . "\n";
 }
 
 
 /**
  * This method creates the additional SQL to query for the primary team value
  * 
  * @param array $layout_def
  * @return String SQL to be appended blank String if no primary team specified
  */
 private function queryPrimaryTeam(&$layout_def) {
 	if(isset($layout_def['input_name2']) && isset($layout_def['input_name0'][$layout_def['input_name2']])) {
 	   return "AND {$layout_def['table_alias']}.team_id = '{$layout_def['input_name0'][$layout_def['input_name2']]}'";
 	}
 	return '';
 }
 
}

?>
