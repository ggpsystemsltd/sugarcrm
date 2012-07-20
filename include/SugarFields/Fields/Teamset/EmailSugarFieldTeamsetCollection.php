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
 * EmailSugarFieldTeamset.php
 * This class handles special rendering
 * 
 */

require_once('include/SugarFields/Fields/Teamset/ViewSugarFieldTeamsetCollection.php');

class EmailSugarFieldTeamsetCollection extends ViewSugarFieldTeamsetCollection {
 	
	var $user_id;
	
    function EmailSugarFieldTeamsetCollection($bean, $field_defs, $customMethod="", $form_name='EditView') {
        parent::ViewSugarFieldTeamsetCollection(false);
          
    	if(file_exists('custom/include/SugarFields/Fields/Teamset/TeamsetCollectionEmailView.tpl')) {
    	   $this->tpl_path = 'custom/include/SugarFields/Fields/Teamset/TeamsetCollectionEmailView.tpl'; 	
    	} else {
    	   $this->tpl_path = 'include/SugarFields/Fields/Teamset/TeamsetCollectionEmailView.tpl';     		
    	}
    	//$this->module_dir = $module;
        $this->bean_id = $bean->id;
        $this->form_name = $form_name;
        $this->customMethod = $customMethod;
        
    	//$this->bean = loadBean($this->module_dir);
    	$this->bean = $bean;
    	
    	if(empty($this->bean)) {
    	   echo "Unable to load module {$module}";
    	   return;
    	}
    	
    	//Initialize displayParams
		$this->displayParams['formName'] = $this->form_name;
		$this->displayParams['primaryChecked'] = true; 	
    	
    	//Attempt to retrieve the bean if _bean_id is set
    	if(!empty($this->bean_id)) {
    	   //$this->bean->retrieve($this->bean_id); 
    	}
    	
    	//$this->vardef = $this->bean->field_defs['team_name'];
    	$this->vardef = $field_defs['team_name'];
    	$this->name = $this->vardef['name'];
		$this->related_module = 'Teams';
        $this->value_name = 'team_set_id_values'; 
        $this->numFields = 1;
        $this->ss = new Sugar_Smarty();
        $this->extra_var = array();
        $this->field_to_name_array = array();     
    }
    
    /*
     * setup
     * 
     * Retrieve the related module and load the bean and the relationship
     * call retrieve values()
     */
    function setup() {
		$this->related_module = 'Teams';
		$this->value_name = 'team_set_id_values';
		$this->vardef['name'] = $this->name;
		$secondaries = array();
		$primary = false;
		$this->bean->{$this->value_name} = array('role_field'=>'team_name');
	    if(!empty($this->bean->team_set_id)) {
	    	require_once('modules/Teams/TeamSetManager.php');
	    	$teams = TeamSetManager::getTeamsFromSet($this->bean->team_set_id);
	    	foreach($teams as $row){
	    		if(empty($primary) && $this->bean->team_id == $row['id']){
	    			$this->bean->{$this->value_name}=array_merge($this->bean->{$this->value_name}, array('primary'=>array('id'=>$row['id'], 'name'=>$row['display_name'])));
	    			$primary = true; 
	    		}else{
	    			$secondaries['secondaries'][]=array('id'=>$row['id'], 'name'=>$row['display_name']);
	    		}
	    	} //foreach		  			        	
	    }
		$this->bean->{$this->value_name}=array_merge($this->bean->{$this->value_name}, $secondaries);          
		$this->skipModuleQuickSearch = true;
		$this->showSelectButton = false;
    }    

    
    /**
     * display
     * Display the widget
     */
    function get_code($includeMassUpdateField = FALSE) {    	
		$this->setup();    	
        $this->ss->assign('displayParams', $this->displayParams);
        $this->ss->assign('vardef',$this->vardef);
        $this->ss->assign('module',$this->related_module);

        if(!empty($this->bean)){
      	   $this->ss->assign('values', $this->bean->{$this->value_name});
        }
        $this->ss->assign('includeMassUpdateField',$includeMassUpdateField);
        $this->ss->assign('hideShowHideButton',$this->hideShowHideButton);
        $this->ss->assign('showSelectButton', $this->showSelectButton);
        $this->ss->assign('APP', $GLOBALS['app_strings']);
        $this->ss->assign('CUSTOM_METHOD', $this->customMethod);
        $this->ss->assign("USER_ID", (!empty($this->user_id) ? $this->user_id : ''));     
        if(isset($_REQUEST['module']))
			$this->_view->module_dir = $_REQUEST['module'];
		$this->process();
		//$this->init_tpl();
		return $this->display();	       
    }     
    
	function getClassicViewQS() {
		return $this->createQuickSearchCode();
	}    
    
	
    /*
     * Create the quickSearch code for the collection field. 
     * return the javascript code which define sqs_objects.
     */  
    function createQuickSearchCode($returnAsJavascript=true){
        $sqs_objects = array();
        require_once('include/QuickSearchDefaults.php');
        $qsd = QuickSearchDefaults::getQuickSearchDefaults();
        $qsd->setFormName($this->form_name);
        for($i=0; $i<$this->numFields; $i++) {
            $name1 = "{$this->form_name}_{$this->name}_collection_{$i}";
            $sqs_objects[$name1] = $qsd->getQSParent($this->related_module);
            $sqs_objects[$name1]['populate_list'] = array("{$this->vardef['name']}_collection_{$i}", "id_{$this->vardef['name']}_collection_{$i}");
            $sqs_objects[$name1]['field_list'] = array('name', 'id');
            
            if(!empty($this->user_id)) {
 				$sqs_objects[$name1]['conditions'][] = array('name'=>'user_id', 'value'=>$this->user_id);
            }

            if(!empty($this->customMethod)) {
                $sqs_objects[$name1]['method'] = $this->customMethod;	
        	}         
        }
        
        $id = "{$this->form_name}_{$this->name}_collection_0";

        if(!empty($sqs_objects) && count($sqs_objects) > 0) {
            foreach($sqs_objects[$id]['field_list'] as $k=>$v){
                $this->field_to_name_array[$v] = $sqs_objects[$id]['populate_list'][$k];
            }
            if($returnAsJavascript){
	            $quicksearch_js = '<script language="javascript">';
	            $quicksearch_js.= "if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}";
	            
	            foreach($sqs_objects as $sqsfield=>$sqsfieldArray){
	               $quicksearch_js .= "sqs_objects['$sqsfield']={$this->json->encode($sqsfieldArray)};";
	            }

	            return $quicksearch_js .= '</script>';
            }else{
            	return $sqs_objects;
            }
       }
       return '';
    }   	
	

    function process() {
        $this->process_editview();	
    }    
    
}
?>
