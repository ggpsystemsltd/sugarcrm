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

/*********************************************************************************

 * Description:  TODO To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

require_once('include/ListView/ListViewSmarty.php');

class ListViewReports extends ListViewSmarty {
    var $displayEndTpl;
    
    function display() {
        global $current_user, $app_strings, $mod_strings;
		$admin = is_admin($current_user) || is_admin_for_module($current_user,'Reports');
        foreach($this->data['data'] as $i => $rowData) {
            if(isset($this->data['data'][$i]['IS_PUBLISHED'])) {
                $this->data['data'][$i]['IS_PUBLISHED'] = "<input type='checkbox' ";
                if($rowData['IS_PUBLISHED'] == 'yes') {
                     $this->data['data'][$i]['IS_PUBLISHED'] .= ' checked '; 
                }
                if($admin) {
                    $this->data['data'][$i]['IS_PUBLISHED'] .= " onclick='location.href=\"index.php?module=Reports&action=index&publish=no&publish_report_id={$rowData['ID']}\";'>";
                }
                else {
                    $this->data['data'][$i]['IS_PUBLISHED'] .= ' disabled=true>';
                }
            }
            if(isset($this->data['data'][$i]['IS_SCHEDULED'])) {
                $this->data['data'][$i]['IS_SCHEDULED'] = "<a href='#' onclick=\"schedulePOPUP('{$rowData['ID']}'); return false\" class='listViewTdToolsS1'>{$rowData['IS_SCHEDULED_IMG']} {$rowData['IS_SCHEDULED']}</a>";
            }

            if(!isset($this->data['data'][$i]['IS_EDIT'])) {
            	if ($this->data['data'][$i]['ASSIGNED_USER_ID'] != $current_user->id || !ACLController::checkAccess('Reports', 'edit', $this->data['data'][$i]['ASSIGNED_USER_ID'])) {
            		$this->data['data'][$i]['IS_EDIT'] = "&nbsp;";
            	} else {
                	$this->data['data'][$i]['IS_EDIT'] = "<a title=\"{$app_strings['LBL_EDIT_BUTTON']}\" href=\"index.php?action=ReportsWizard&module=Reports&page=report&record={$rowData['ID']}\">".SugarThemeRegistry::current()->getImage("edit_inline", '', null, null, ".gif", $mod_strings['LBL_EDIT'])."</a>";
            	}
            }
        }

        
        $this->ss->assign('act', 'ReportsWizard');

        return parent::display();
    }
    
    function displayEnd() {
        $smarty = new Sugar_Smarty();
        return $smarty->fetch($this->displayEndTpl);
    }
}

?>
