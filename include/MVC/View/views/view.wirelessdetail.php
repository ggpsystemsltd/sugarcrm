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

 * Description:  Defines the English language pack for the base application.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

require_once('include/SugarWireless/SugarWirelessView.php');

/**
 * ViewWirelessdetail extends SugarWirelessView and is the view for wireless
 * detail views.
 */
class ViewWirelessdetail extends SugarWirelessView{

    /**
     * Constructor for the view, it runs the constructor of SugarWirelessView
     */
 	public function __construct(){
 		parent::__construct();
 	}
	
 	/** 
 	 * Public function to attain the subpanel data for a record
 	 */
 	public function bean_subpanels(){
 	    $layout_defs = $this->getSubpanelDefs();
        $bean_subpanel_data = array();
 	    // make sure the layout_defs array has been initialized
 	    if (isset($layout_defs) && !empty($layout_defs['subpanel_setup'])){
 	    	$available_subpanel_data = false;
	 	    foreach($layout_defs['subpanel_setup'] as $subpanel=>$subpaneldefs){
	 	    	//Dont display subpanels for modules that are not wireless enabled
                if (!isset($this->view_object_map['wireless_module_registry'][$subpaneldefs['module']]))
                     continue;
                $data = $this->getDataForSubpanel($this->bean, $subpanel, $subpaneldefs);
                $bean_subpanel_data[$subpanel] = $data;
                if (!empty($data)) {
                    $available_subpanel_data = true;
                }
	 	    }
	 	    // sets appropriate smarty flags
	 	    $this->ss->assign('AVAILABLE_SUBPANELS', true);
			$this->ss->assign('AVAILABLE_SUBPANEL_DATA', $available_subpanel_data);
 	    }
 	    else{
 	    	$this->ss->assign('AVAILABLE_SUBPANELS', false);
 	    }
 	    // return the subpanel data array
	 	return $bean_subpanel_data; 	    
 	}
 	
 	/**
 	 * Public function that handles the display of the wireless detail view.
 	 */
 	public function display(){
 		// no record, we should also provide a way out
 	    if (empty($this->bean->id)){
 	        sugar_die($GLOBALS['app_strings']['ERROR_NO_RECORD']);
 	    }	    

		// print the header
 	    $this->wl_header();
 	    // print the select list
		$this->wl_select_list();
		
		$this->ss->assign('fields', $this->get_field_defs());
 	    
 	    // set up Smarty variables 	    
		$this->ss->assign('BEAN_ID', $this->bean->id);
		$this->ss->assign('BEAN_NAME', $this->bean->name);		
	   	$this->ss->assign('MODULE', $this->module);
	   	$this->ss->assign('MODULE_NAME', translate('LBL_MODULE_NAME',$this->module));
	   	$this->ss->assign('DETAILS', $this->bean_details('WirelessDetailView'));
	   	$this->ss->assign('SUBPANEL_DATA', $this->bean_subpanels());
	   	$this->ss->assign('ENABLE_FORM', $this->checkEditPermissions());
	   	$this->ss->assign('MODULELIST', $GLOBALS['app_list_strings']['moduleList']);
	   	// set the maximum entries to display on a subpanel
	   	if (isset($GLOBALS['sugar_config']['wl_list_max_entries_per_subpanel'])){  		
	   		$this->ss->assign('MAX_SUBPANEL_DATA', $GLOBALS['sugar_config']['wl_list_max_entries_per_subpanel']);
	   	}
	   	else{
	   		$this->ss->assign('MAX_SUBPANEL_DATA', 3);
	   	}
	   	
	   	// display the detail view
		$this->ss->display('include/SugarWireless/tpls/wirelessdetail.tpl');
		
		// print the footer
		$this->wl_footer();
		
		// allow Tracker to pick up this detail view hit
		$this->action = 'DetailView';
 	}

}
?>
