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

require_once('include/MVC/View/SugarView.php');
require_once('include/MVC/Controller/SugarController.php');

class CampaignsViewClassic extends SugarView
{	
 	function CampaignsViewClassic()
 	{
 		parent::SugarView();
 		$this->type = $this->action;
 	}	
 	
 	/**
	 * @see SugarView::display()
	 */
	public function display()
	{
 		// Call SugarController::getActionFilename to handle case sensitive file names
 		$file = SugarController::getActionFilename($this->action);
 		if(file_exists('custom/modules/' . $this->module . '/'. $file . '.php')){
			$this->includeClassicFile('custom/modules/'. $this->module . '/'. $file . '.php');
			return true;
		}elseif(file_exists('modules/' . $this->module . '/'. $file . '.php')){
			$this->includeClassicFile('modules/'. $this->module . '/'. $file . '.php');
			return true;
		}
		return false;
 	} 	
	
    /**
	 * @see SugarView::_getModuleTitleParams()
	 */
	protected function _getModuleTitleParams($browserTitle = false)
	{
    	$params = array();
    	$params[] = $this->_getModuleTitleListParam($browserTitle);
    	if (isset($this->action)){
    		switch($_REQUEST['action']){
    				case 'WizardHome':
				    	if(!empty($this->bean->id))
				    	{
				    		$params[] = "<a href='index.php?module={$this->module}&action=DetailView&record={$this->bean->id}'>".$this->bean->name."</a>";
				    	}
				    	$params[] = $GLOBALS['mod_strings']['LBL_CAMPAIGN_WIZARD'];
				    	break;
				    case 'WebToLeadCreation':
    					$params[] = $GLOBALS['mod_strings']['LBL_LEAD_FORM_WIZARD'];
    					break;
    				case 'WizardNewsletter':
				    	if(!empty($this->bean->id))
				    	{
				    		$params[] = "<a href='index.php?module={$this->module}&action=DetailView&record={$this->bean->id}'>".$GLOBALS['mod_strings']['LBL_NEWSLETTER_TITLE']."</a>";
				    	}
				    	$params[] = $GLOBALS['mod_strings']['LBL_CREATE_NEWSLETTER'];
				    	break;
    				case 'CampaignDiagnostic':
    					$params[] = $GLOBALS['mod_strings']['LBL_CAMPAIGN_DIAGNOSTICS'];
    					break;  
    				case 'WizardEmailSetup':
    					$params[] = $GLOBALS['mod_strings']['LBL_EMAIL_SETUP_WIZARD_TITLE'];
    					break;    
    				case 'TrackDetailView':
    					if(!empty($this->bean->id))
    					{
	    					$params[] = "<a href='index.php?module={$this->module}&action=DetailView&record={$this->bean->id}'>".$this->bean->name."</a>";
    					}
	    				$params[] = $GLOBALS['mod_strings']['LBL_LIST_TO_ACTIVITY'];
    					break;			  					    					
    		}//switch
    	}//fi
 		
    	return $params;
    }
}