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
 ********************************************************************************/

require_once('include/MVC/View/views/view.list.php');

class ViewNewsLetterList extends ViewList 
{    
    function processSearchForm()
    {
        // we have a query
        if(!empty($_SERVER['HTTP_REFERER']) && preg_match('/action=EditView/', $_SERVER['HTTP_REFERER'])) { // from EditView cancel
            $this->searchForm->populateFromArray($this->storeQuery->query);
        }
        else {
            $this->searchForm->populateFromRequest();
        }   
        $where_clauses = $this->searchForm->generateSearchWhere(true, $this->seed->module_dir);
        $where_clauses[] = "campaigns.campaign_type in ('NewsLetter')";
        if (count($where_clauses) > 0 )$this->where = '('. implode(' ) AND ( ', $where_clauses) . ')';
        $GLOBALS['log']->info("List View Where Clause: $this->where");


        echo $this->searchForm->display($this->headers);
    }
    
    /**
	 * @see SugarView::preDisplay()
	 */
	public function preDisplay() 
	{
        global $mod_strings;
        $mod_strings['LBL_MODULE_TITLE'] = $mod_strings['LBL_NEWSLETTER_TITLE'];
        $mod_strings['LBL_LIST_FORM_TITLE'] = $mod_strings['LBL_NEWSLETTER_LIST_FORM_TITLE'];
        parent::preDisplay();

    }        
}