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


/**
 * MaassUpdateSugarFieldTeamsetCollection.php
 * This class handles rendering the team widget for the MassUpdate form.
 * 
 */

require_once('include/SugarFields/Fields/Collection/SugarFieldCollection.php');
require_once('include/SugarFields/Fields/Teamset/ViewSugarFieldTeamsetCollection.php');

class MassUpdateSugarFieldTeamsetCollection extends ViewSugarFieldTeamsetCollection {

	function MassUpdateSugarFieldTeamsetCollection($fill_data=false) {
    	parent::ViewSugarFieldTeamsetCollection($fill_data);
		$this->form_name = 'MassUpdate'; 
        $this->action_type = 'massupdate';		 	
    }

    function init_tpl() {   
        $this->tpl_path = 'include/SugarFields/Fields/Teamset/TeamsetCollectionMassupdateView.tpl';
        $this->ss->assign('quickSearchCode',$this->createQuickSearchCode());
        $this->createPopupCode();// this code populate $this->displayParams with popupdata.
        $this->ss->assign('displayParams',$this->displayParams);
        $this->ss->assign('vardef',$this->vardef);
        $this->ss->assign('module',$this->related_module);
        $default = array('primary'=>array('id'=>1, 'name'=>'admin'));
        if(!empty($this->bean)){
      	   $this->ss->assign('values',$this->bean->{$this->value_name});
        }
        $this->ss->assign('showSelectButton',$this->showSelectButton);
        $this->ss->assign('APP',$GLOBALS['app_strings']);
    }        
    
    function process() {
        $this->process_editview();	
    }    
    
}
?>