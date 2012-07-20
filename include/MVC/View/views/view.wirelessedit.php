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
 * edit views.
 */
class ViewWirelessedit extends SugarWirelessView{

    /**
     * Constructor for the view, it runs the constructor of SugarWirelessView
     */
 	public function __construct(){
 		parent::__construct();
 	}
 	
 	/**
 	 * Public function to set up the relate POST parameters in form 
 	 */
 	protected function relate_module(){
		$this->ss->assign('RELATE_MODULE', true);
		$this->ss->assign('RELATE_TO', $_POST['related_module']);
		$this->ss->assign('RELATE_ID', $_POST['relate_id']);
		$this->ss->assign('RELATED_MODULE', $_POST['related_module']);
		$this->ss->assign('RETURN_MODULE', $_POST['related_module']);
		$this->ss->assign('RETURN_ID', $_POST['relate_id']);
        
        require("include/modules.php");
        $this->ss->assign('RELATE_FIELD',strtolower($beanList[$_POST['related_module']]).'_id');
        
        if ( isset($_POST['from_subpanel']) && $_POST['from_subpanel'] == '1' ) {
            if (file_exists('custom/modules/'.$_POST['related_module'].'/metadata/wireless.subpaneldefs.php')){
                require_once('custom/modules/'.$_POST['related_module'].'/metadata/wireless.subpaneldefs.php');
            }
            else if (file_exists('modules/'.$_POST['related_module'].'/metadata/wireless.subpaneldefs.php')){
                require_once('modules/'.$_POST['related_module'].'/metadata/wireless.subpaneldefs.php');
            }
            if ( isset($layout_defs[$_POST['related_module']]['subpanel_setup']) ) {
                foreach ( $layout_defs[$_POST['related_module']]['subpanel_setup'] as $data ) {
                    if ( $data['module'] == $this->module ) {
                        $this->ss->assign('RELATE_NAME', $data['get_subpanel_data']);
                    }
                }
            }
        }
 	}
 	
 	/**
 	 * Public function that handles the display of the wireless edit view.
 	 */
 	public function display(){
		// print the header
 	    $this->wl_header();
 	    // print the select list
		$this->wl_select_list();
		
		// retrieve the fields
		$this->ss->assign('fields', $this->get_field_defs());
        
        // Set return module and action
        $this->ss->assign('RETURN_MODULE', $this->module);
        $this->ss->assign('RETURN_ACTION', $_POST['return_action']);
        
		// check to see if the edit is coming from Add Related form
		if (!empty($_POST['relate_to']) || !empty($_POST['relate_id'])){
			$this->relate_module();
		}
		
		// set up Smarty variables 	     	    
		$this->ss->assign('BEAN_ID', $this->bean->id);
		$this->ss->assign('BEAN_NAME', $this->bean->name);		
	   	$this->ss->assign('MODULE', $this->module);
	   	$this->ss->assign('MODULE_NAME', translate('LBL_MODULE_NAME',$this->module));
	   	$this->ss->assign('DETAILS', $this->bean_details('WirelessEditView'));	   	
	   	
	   	// display the edit view
		$this->ss->display('include/SugarWireless/tpls/wirelessedit.tpl');
		
		// print the footer
		$this->wl_footer();
		
		// allow Tracker to pick up this edit view hit
		$this->action = 'EditView';
 	}

}
?>
