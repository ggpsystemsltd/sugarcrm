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


require_once('include/MVC/View/views/view.list.php');

class EmailManViewList extends ViewList
{
 	/**
	 * @see SugarView::preDisplay()
	 */
	public function preDisplay()
 	{
 	    global $current_user;
        
        if ( !is_admin($current_user) && !is_admin_for_module($current_user,'Campaigns') )
            sugar_die($GLOBALS['app_strings']['ERR_NOT_ADMIN']); 
 	    
 		$this->lv = new ListViewSmarty();
 		$this->lv->export = false;
 		$this->lv->quickViewLinks = false;
 	}
 	
 	/**
	 * @see SugarView::_getModuleTitleParams()
	 */
	protected function _getModuleTitleParams($browserTitle = false)
	{
	    global $mod_strings;
	    
    	return array(
    	   "<a href='index.php?module=Administration&action=index'>".translate('LBL_MODULE_NAME','Administration')."</a>",
    	   translate('LBL_MASS_EMAIL_MANAGER_TITLE','Administration'),
    	   );
    }
    
    
    function listViewPrepare(){
    	$this->options['show_title'] = false;
    	parent::listViewPrepare();
    	echo $this->getModuleTitle(false);
    }
	/**
	 * @see ViewList::listViewProcess()
	 */
	function listViewProcess()
 	{
		parent::listViewProcess();
		
		global $app_strings;
		
		echo "<form action=\"index.php\" method=\"post\" name=\"EmailManDelivery\" id=\"form\">
			<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" class='actionsContainer'>
				<tr><td style=\"padding-bottom: 2px;\">
                        <input type=\"hidden\" name=\"module\" value=\"EmailMan\">
                        <input type=\"hidden\" name=\"action\">
                        <input type=\"hidden\" name=\"return_module\">
                        <input type=\"hidden\" name=\"return_action\">
                        <input type=\"hidden\" name=\"manual\" value=\"true\">
                        <input	title=\"".$app_strings['LBL_CAMPAIGNS_SEND_QUEUED']."\" 
                                accessKey=\"".$app_strings['LBL_SAVE_BUTTON_KEY']."\" class=\"button\" 
                                onclick=\"this.form.return_module.value='EmailMan'; this.form.return_action.value='index'; this.form.action.value='EmailManDelivery'\" 
                                type=\"submit\" name=\"Send\" value=\"".$app_strings['LBL_CAMPAIGNS_SEND_QUEUED']."\">
            </td></tr></table></form>";
 	}
}
