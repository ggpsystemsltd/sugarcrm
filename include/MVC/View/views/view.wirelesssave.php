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
 * ViewWirelesslist extends SugarWirelessView and is the view for wireless list views.
 * 
 */
class ViewWirelesssave extends SugarWirelessView{
	/**
	 * The name of the current module.
	 */
	public $module = 'Home';
	/**
	 * The name of the current action.
	 */
	public $action = 'index';
	/**
	 * The id of the current record.
	 */
	public $record = '';
	/**
	 * The name of the return module.
	 */
	public $return_module = null;
	/**
	 * The name of the return action.
	 */
	public $return_action = null;
	/**
	 * The id of the return record.
	 */
	public $return_id = null;
	/**
	 * Constructor for the view, it runs the constructor of SugarWirelessView
	 */
	
 	public function __construct(){
 		parent::__construct();
 	}

    public function setup($module = ''){
		if(empty($module) && !empty($_REQUEST['module']))
			$module = $_REQUEST['module'];
		//set properties on the controller from the $_REQUEST
		$this->loadPropertiesFromRequest();
	}
 	
	/**
	 * Set properties on the Controller from the $_REQUEST
	 *
	 */
	protected function loadPropertiesFromRequest(){
		if(!empty($_REQUEST['action']))
			$this->action = $_REQUEST['action'];
		if(!empty($_REQUEST['record']))
			$this->record = $_REQUEST['record'];
		if(!empty($_REQUEST['view']))
			$this->view = $_REQUEST['view'];
		if(!empty($_REQUEST['return_module']))
			$this->return_module = $_REQUEST['return_module'];
		if(!empty($_REQUEST['return_action']))
			$this->return_action = $_REQUEST['return_action'];
		if(!empty($_REQUEST['return_id']))
			$this->return_id = $_REQUEST['return_id'];
	}
 	
	/**
	 * Do some processing before saving the bean to the database.
	 */
	protected function pre_save(){
	    // handle date save
		if (isset($_POST['wl_date'])){
            $date = $_POST['wl_date_Year'] . '-' . $_POST['wl_date_Month'] . '-' . $_POST['wl_date_Day'];
            $dateFormat = 'Y-m-d';
			$_POST[$_POST['wl_date']] = $GLOBALS['timedate']->swap_formats(
                $date,
                $dateFormat,
                $GLOBALS['timedate']->get_date_format());
		}
		
		// handle datetime save
		if (isset($_POST['wl_datetime'])){
            $date = $_POST['wl_date_Year'] . '-' . $_POST['wl_date_Month'] . '-' . $_POST['wl_date_Day'];
            $datetimeFormat = 'Y-m-d H:i';
            $time_Meridian = '';
            if (isset($_POST['wl_time_Meridian'])){
                $time_Meridian = $_POST['wl_time_Meridian'];
                $datetimeFormat = 'Y-m-d H:ia';
			}
			$time = $_POST['wl_time_Hour'] . ':' . $_POST['wl_time_Minute'] . $time_Meridian;	
			
			$_POST[$_POST['field_name']] = $GLOBALS['timedate']->swap_formats(
                $date . ' ' . $time,
                $datetimeFormat,
                $GLOBALS['timedate']->get_date_time_format());
		}		
		
		if(!empty($_POST['assigned_user_id']) && $_POST['assigned_user_id'] != $this->bean->assigned_user_id && $_POST['assigned_user_id'] != $GLOBALS['current_user']->id && empty($GLOBALS['sugar_config']['exclude_notifications'][$this->bean->module_dir])){
			$this->bean->notify_on_save = true;
		}
		$GLOBALS['log']->debug("SugarController:: performing pre_save.");
		require_once('include/SugarFields/SugarFieldHandler.php');
        $sfh = new SugarFieldHandler();
		foreach($this->bean->field_defs as $field => $properties) {
			$type = !empty($properties['custom_type']) ? $properties['custom_type'] : $properties['type'];
		    $sf = $sfh->getSugarField(ucfirst($type), true);
            if($sf != null){
                $sf->save($this->bean, $_POST, $field, $properties);
            }
            if(isset($_POST[$field])) {
				if(is_array($_POST[$field]) && !empty($properties['isMultiSelect'])) {
					if(empty($_POST[$field][0])) {
						unset($_POST[$field][0]);
					}
					$_POST[$field] = encodeMultienumValue($_POST[$field]);
				}
				$this->bean->$field = $_POST[$field];
			}else if(!empty($properties['type']) && $properties['type'] == 'link'){
				//remove this relationship since we did not find it in the $_POST
			}
		}
		foreach($this->bean->relationship_fields as $field=>$link){
			if(!empty($_POST[$field])){
				$this->bean->$field = $_POST[$field];	
			}
		}
		
        if (empty($this->bean->assigned_user_id) && empty($_POST['assigned_user_id'])){
			$this->bean->assigned_user_id = $GLOBALS['current_user']->id;
		}
		
        $errors = array();
        foreach ( $this->wl_required_edit_fields() as $field => $displayname ) {
            if ( strlen($_POST[$field]) <= 0 ) {
                $errors[] = "{$GLOBALS['app_strings']['ERR_MISSING_REQUIRED_FIELDS']} '$displayname'";
            }
        }
        if ( in_array($this->module,array('Calls','Meetings')) 
                && empty($_POST['duration_minutes']) && empty($_POST['duration_hours']) ) {
            $errors[] = translate('NOTICE_DURATION_TIME',$this->module);
        }
        if ( count($errors) > 0 ) {
            $this->wl_header();
            if ( ($this->return_module == $this->module) && strlen($_REQUEST['record']) <= 0 ) 
                $_REQUEST['return_action'] = 'wirelessmodule';
            $this->ss->assign('MESSAGE', implode("<br />",$errors));
            $this->ss->assign('REQUEST_VALS', $_REQUEST);
            $this->ss->display('include/SugarWireless/tpls/wirelessfailsave.tpl');
            sugar_cleanup(true);
        }
        
		if(!$this->bean->ACLAccess('save')){
			ACLController::displayNoAccess(true);
			sugar_cleanup(true);
		}
		$this->bean->unformat_all_fields();
	}
	
	/**
	 * Perform the actual save
	 */
	protected function action_save(){
		if ($this->checkEditPermissions()){
			$this->bean->save(!empty($this->bean->notify_on_save));
		}
	}
	
	/**
	 * Specify what happens after the save has occurred.
	 */
	protected function post_save(){
		$module = (!empty($this->return_module) ? $this->return_module : $this->module);
		$action = (!empty($this->return_action) ? $this->return_action : 'wirelessdetail');
		$id = (!empty($this->return_id) ? $this->return_id : $this->bean->id);
		
		$url = "index.php?module=".$module."&action=".$action."&record=".$id;
		$this->redirect($url);
	}
 	
    protected function redirect($url){
		SugarApplication::redirect($url);
	}
 	
 	/**
 	 * Public function that handles the display of the wireless list view. 
 	 */
 	public function display(){
 	    $this->setup();
 	    
        $this->pre_save();
        $this->action_save();
        $this->post_save();
  	}
}
?>
