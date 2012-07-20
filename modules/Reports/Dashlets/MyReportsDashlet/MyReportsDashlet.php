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





require_once('include/Dashlets/DashletGeneric.php');


class MyReportsDashlet extends DashletGeneric { 
    
    function MyReportsDashlet($id, $def = null) {
        global $current_user, $app_strings, $dashletData;
		require('modules/Reports/Dashlets/MyReportsDashlet/MyReportsDashlet.data.php');
        
        parent::DashletGeneric($id, $def);

        if(empty($def['title'])) $this->title = translate('LBL_FAVORITE_REPORTS_TITLE', 'Reports');
        $this->isConfigurable = false;
        $this->searchFields = $dashletData['MyReportsDashlet']['searchFields'];
        $this->columns = $dashletData['MyReportsDashlet']['columns'];
        $this->seedBean = new SavedReport();        
    }
    
    function process() {
        $this->lvs->quickViewLinks = false;
        parent::process();
    }
    
    function buildWhere() {
        global $current_user;
        $where_clauses = array();
        
        $sugaFav = new SugarFavorites();
        $current_favorites_beans = $sugaFav->getUserFavoritesByModule('Reports', $current_user);
        $current_favorites = array();
        foreach ($current_favorites_beans as $key=>$val) {
        	array_push($current_favorites,$val->record_id);
        }
        if(is_array($current_favorites) && !empty($current_favorites))
            array_push($where_clauses, 'saved_reports.id IN (\'' . implode("','", array_values($current_favorites)) . '\')');
        else {
            array_push($where_clauses, 'saved_reports.id IN (\'-1\')');
        }
        return $where_clauses; 
    }
    
}

?>
