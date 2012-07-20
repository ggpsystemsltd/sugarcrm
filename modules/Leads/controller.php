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

class LeadsController extends SugarController{
	function LeadsController(){
		parent::SugarController();
	}
	function pre_editview(){
		//IF we have a prospect id leads convert it to a lead
		if (empty($this->bean->id) && !empty($_REQUEST['return_module']) &&$_REQUEST['return_module'] == 'Prospects' ) {
			
			$prospect=new Prospect();
			$prospect->retrieve($_REQUEST['return_id']);
			foreach($prospect->field_defs as $key=>$value)
			{
				if ($key == 'id' or $key=='deleted' )continue;
				if (isset($this->bean->field_defs[$key])) {
					$this->bean->$key = $prospect->$key;
				} 
			}
			$_POST['is_converted']=true;
		}
		return true;	
	}
	function action_editview(){
		$this->view = 'edit';
		return true;
	}
	
	protected function callLegacyCode(){
    	if(strtolower($this->do_action) == 'convertlead'){
        	if(file_exists('modules/Leads/ConvertLead.php') && !file_exists('custom/modules/Leads/metadata/convertdefs.php')){
	        	if(!empty($_REQUEST['emailAddressWidget'])) {
				   foreach($_REQUEST as $key=>$value) {
				   	  if(preg_match('/^Leads.*?emailAddress[\d]+$/', $key)) {
				   	  	 $_REQUEST['Leads_email_widget_id'] = 0;
				   	  	 break;
				   	  }
				   }
				}
        		$this->action_default();
                $this->_processed = true;
            }else{
            	$this->view = 'convertlead';
                $this->_processed = true;
            }
  		}else{
                parent::callLegacyCode();
        }
	}
}
?>