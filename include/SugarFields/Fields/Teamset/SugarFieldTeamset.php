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
 * SugarFieldTeamset.php
 * 
 * This class handles the processing of the new Team selection widget.
 * The main thing to note is that the getDetailViewSmarty, getEditViewSmarty and
 * getSearchViewSmarty methods are called from the cached .tpl files that are generated 
 * via the MVC/Metadata framework.  The cached .tpl files include Smarty code rendered from
 * the include/SugarFields/Fields/SugarFieldTeamset/Teamset.tpl file which in turn
 * calls this file.  When the plugin function is run (see include/Smarty/plugins/function.sugarvar_teamset.php), 
 * it will call SugarFieldTeamset's render method.  From there, the corresponding method is invoked.
 * 
 * For the MassUpdate section, there is no cached .tpl file created so the contents are rendered without
 * using the Teamset.tpl approach.
 * 
 * For classic views (where PHP files use the XTemplate processing) we provide the
 * getClassicView method.  Also note, the getClassicViewQS method.  For some classic views,
 * we use this method in situations where the quick search sections need to be generated 
 * separately from the widget code.
 *
 */

require_once('include/SugarFields/Fields/Base/SugarFieldBase.php');

class SugarFieldTeamset extends SugarFieldBase {

	//the name of the field, defaults to team_name
	var $field_name = 'team_name';
	
	//reference to the smarty class
	var $smarty = null;
	
	//reference to the ViewSugarFieldTeamsetCollection instance
	var $view = null;
	
	var $params = null;
	
	var $fields;
	
	var $add_user_private_team = true;
	
	/*
	 * render
	 * 
	 * This method is called from function.sugarvar_teamset.php and determines which view to output
	 * and the appropriate html to output.  This is called at runtime.
	 * 
	 * @param $params Array of runtime parameters
	 * @param $smarty Smarty object instance used to render the widget 
	 */
	function render($params, &$smarty){
		$this->params = $params;	
		$this->smarty = $smarty;	
		$method = $this->params['displayType'];
		return $this->$method();
	}
	
    
    function initialize() {
    	$this->fields = $this->smarty->get_template_vars('fields');
    	$team_name_vardef = $this->fields["{$this->field_name}"];
		require_once('include/SugarFields/Fields/Teamset/ViewSugarFieldTeamsetCollection.php');
		$this->view = new ViewSugarFieldTeamsetCollection();
		$this->view->displayParams = $this->params;
		$this->view->vardef = $team_name_vardef;		
		$formName = $this->params['formName'];

		if((isset($_REQUEST['action']) && $_REQUEST['action'] == 'SubpanelCreates') || preg_match('/quickcreate/i', $formName)) {
		   $this->view->action_type = 'quickcreate';
		} else {
		   $this->view->action_type = strtolower($formName);
		}
		
    	$this->view->module_dir = $_REQUEST['module'];
	    
		if($this->view->module_dir == 'Import'){
		   $this->view->module_dir = $_REQUEST['import_module'];
		} else if($this->view->action_type == 'quickcreate') {
	       $this->view->module_dir = isset($_REQUEST['target_module']) ? $_REQUEST['target_module'] : $this->view->module_dir;				
		}	

		$this->view->form_name = $formName;	
		
		//rather than retrieve the bean try to pull the values from the form
		if(!empty($this->fields['team_set_id'])){
			if(!empty($this->fields['team_set_id']['value'])){
				$this->view->team_set_id = $this->fields['team_set_id']['value'];
			}else{
				$this->view->team_set_id = $GLOBALS['current_user']->team_set_id;
			}
		}
    	if(!empty($this->fields['team_id']) && !empty($this->fields['team_id']['value'])){
			$this->view->team_id = $this->fields['team_id']['value'];
			$this->view->add_user_private_team = false;
		}
		
        $this->view->populate();
		$this->view->setup();
    }    
    
    /**
     * process
     * 
     * This method is used to call the view object's process method and init_tpl methods
     * We separated it from the display method so that the renderEditView, renderDetailView
     * and renderSearchView method may provide some additional functionality before the process
     * method is made to the view object.
     * 
     */
    function process() {
		$this->view->process();
		$this->view->init_tpl();     	
    }
    
    function display() {
		echo $this->view->display();       	
    }
    
    
    /**
     * renderEditView
     * This method is called to display the edit view of the teams widget
     * 
     */
	function renderEditView(){
		$this->initialize();
		
		//Get the team_arrow_value user preference and set it
		//This user preference is used to remember whether or not the display of the
		//teams widget should be collapsed or expanded
		/*
		 Removing this functionality for now so as to avoid user confusion as per PM.
		global $current_user;
		$arrow_value = $current_user->getPreference('team_arrow_value');
		$this->view->displayParams['arrow'] = isset($arrow_value) ? $arrow_value : 'hide';	
		*/
        $keys = $this->getAccessKey($vardef,'TEAMSET',$vardef['module']);
        $this->view->displayParams['accessKeySelect'] = $keys['accessKeySelect'];
        $this->view->displayParams['accessKeySelectLabel'] = $keys['accessKeySelectLabel'];
        $this->view->displayParams['accessKeySelectTitle'] = $keys['accessKeySelectTitle'];
        $this->view->displayParams['accessKeyClear'] = $keys['accessKeyClear'];
        $this->view->displayParams['accessKeyClearLabel'] = $keys['accessKeyClearLabel'];
        $this->view->displayParams['accessKeyClearTitle'] = $keys['accessKeyClearTitle'];        

		$this->view->displayParams['arrow'] = 'hide';
		
		$this->process();
		return $this->display();
	}
	
	/**
	 * renderDetailView
	 * This method is called to display the detail view of the teams widget
	 */
	function renderDetailView(){
		$this->initialize();	
		$this->process();	
    	require_once('modules/Teams/TeamSetManager.php');
    	return TeamSetManager::getCommaDelimitedTeams($this->fields['team_set_id']['value'], $this->fields['team_id']['value'], true);
	}
	
	/**
	 * renderSearchView
	 * 
	 */
	function renderSearchView() {
		//override the field_name since this widget is shown on the advanced tab section
		$this->field_name = 'team_name_advanced';
		if(empty($this->params['formName'])){
			$this->params['formName'] = 'search_form';
		}
		$this->initialize();
		$this->view->displayParams['formName'] = $this->params['formName'];	
		if($this->view->displayParams['formName'] == 'popup_query_form'){
			$this->view->displayParams['clearOnly'] = true;
		}
		$this->process();
		return $this->display();
	}
	
	/**
	 * renderImportView
     *
	 */
	function renderImportView() {
    	$this->fields = $this->smarty->get_template_vars('fields');
    	$team_name_vardef = $this->fields["{$this->field_name}"];
		require_once('include/SugarFields/Fields/Teamset/ViewSugarFieldTeamsetCollection.php');
		$this->view = new ViewSugarFieldTeamsetCollection();
		$this->view->displayParams = $this->params;
		$this->view->vardef = $team_name_vardef;
		$this->view->module_dir = $_REQUEST['module'];
	    
		if($this->view->module_dir == 'Import'){
			$this->view->module_dir = $_REQUEST['import_module'];
		}
		
		$formName = $this->params['formName'];
		$this->view->action_type = strtolower($formName);
		$this->view->form_name = $formName;		
        $this->view->populate();
        $this->view->related_module = 'Teams';
        $this->view->value_name = 'team_set_id_values';
        $this->view->vardef['name'] = 'team_name';
        
	    if(!empty($this->view->vardef['value'])) {
	    	$secondaries = array();
			$primary = false;
        	$json = getJSONobj();
	  		$vals = $json->decode($this->view->vardef['value']);
	  		$this->view->displayParams['primaryChecked'] = true; 
        	foreach($vals as $id=>$name){
        		if(!$primary){
        			$this->view->bean->{$this->view->value_name}= array('primary'=>array('id'=>$id, 'name'=>$name));
        			$primary = true; 
        		}else{
        			$secondaries['secondaries'][]=array('id'=>$id, 'name'=>$name);
        		}
        	} //foreach	
        	$this->view->bean->{$this->view->value_name}=array_merge((array)$this->view->bean->{$this->view->value_name}, $secondaries);	  				  		
	    }

        $this->view->skipModuleQuickSearch = true;
		$this->view->showSelectButton = false;
		$this->process();
		return $this->display();		
	}
	
	function initClassicView($fields, $formName='EditView'){
		require_once('include/SugarFields/Fields/Teamset/ViewSugarFieldTeamsetCollection.php');
		$this->view = new ViewSugarFieldTeamsetCollection();
        if(!$this->add_user_private_team)
        {
            $this->view->add_user_private_team = false;
        }
        else
        {
            if(empty($_REQUEST['record']))
            {
                // fixing bug #40003: Teams revert to self when Previewing a report
                // check if there are teams in POST
                $teams = $this->getTeamsFromRequest($this->field_name, $_POST);
                if (empty($teams))
                {
                    $this->view->team_set_id = !empty($GLOBALS['current_user']->team_set_id) ? $GLOBALS['current_user']->team_set_id : '';
                    $this->view->team_id =  !empty($GLOBALS['current_user']->team_id) ? $GLOBALS['current_user']->team_id : '';
                }
            }
        }
		$this->view->form_name = $formName;
		$displayParams['formName'] = $formName;
		$displayParams['primaryChecked'] = true;
		$this->view->displayParams = $displayParams;
		$this->view->vardef = $fields['team_name'];
		$this->view->module_dir = $_REQUEST['module'];
        $this->view->action_type = strtolower($formName);
        $this->view->populate();
		$this->view->setup();
		$this->view->process();
		$this->view->init_tpl();
	}
	
	/**
	 * getClassicView
	 * 
	 * @param $field Array of the SugarBean's field definitions
	 * @param $formName String value of the form name to insert team set field to, default is EditView
	 */
	function getClassicView($fields = array(), $formName='EditView') {
		if(is_null($this->view)){
			$this->initClassicView($fields, $formName);
		}
		return $this->view->display();
	}
	
	function getClassicViewQS() {
		return $this->view->createQuickSearchCode(false);
	}
	
	/**
	 * getEditViewSmarty
	 * Returns the Smarty code portion to render the edit view of the field
	 * @param $parentFieldArray String value of the Smarty variable name that contains the fields Array
	 * @param $vardef Array of the field definition entry
	 * @param $diaplayParams Array of optional display parameters passed in from metadata
	 * @param $tabindex Integer value of the tabindex that should be assigned to the HTML output for this field
	 * @param $searchView boolean value indicating whether or not to use the search form rendering
	 *
	 */
    function getEditViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex, $searchView = false) {
    	$this->setup($parentFieldArray, $vardef, $displayParams, $tabindex);
		$this->ss->assign('renderView', 'renderEditView');
		return $this->fetch($this->findTemplate('Teamset'));
    }	

	/**
	 * getDetailViewSmarty
	 * Override for the SugarFieldCollection class to set the vardef name from team_name to team_set_id
	 */
	function getDetailViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex, $searchView = false) {
		$this->setup($parentFieldArray, $vardef, $displayParams, $tabindex);
		$this->ss->assign('renderView', 'renderDetailView');
		return $this->fetch($this->findTemplate('Teamset'));
	}

	
	/**
	 * getMassUpdateViewSmarty
	 * 
	 */
	function getMassUpdateViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex, $searchView = false) {
    	$_REQUEST['bean_id'] = isset($_REQUEST['record']) ? $_REQUEST['record'] : '';
		require_once('include/SugarFields/Fields/Teamset/MassUpdateSugarFieldTeamsetCollection.php');
		$this->view = new MassUpdateSugarFieldTeamsetCollection();
		$displayParams['formName'] = 'MassUpdate';
		$this->view->displayParams = $displayParams;
		$this->view->vardef = $vardef;
		$this->view->module_dir = $_REQUEST['module'];
		
		$this->view->team_set_id = !empty($GLOBALS['current_user']->team_set_id) ? $GLOBALS['current_user']->team_set_id : '';
		$this->view->team_id =  !empty($GLOBALS['current_user']->team_id) ? $GLOBALS['current_user']->team_id : '';
		
        $this->view->populate();
		$this->view->setup();
		$this->view->process();
		$this->view->init_tpl();
		return $this->view->display();	
	}
	
	function getPopupViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex){
    	$displayParams['formName'] = 'popup_query_form';
    	return $this->getSearchViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex);
    }
	
	function getSearchViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex) {
		if(empty($displayParams['formName'])){
			$displayParams['formName'] = 'search_form';
		}
    	$this->view->displayParams = $displayParams;
    	$this->setup($parentFieldArray, $vardef, $displayParams, $tabindex);
    	$this->ss->assign('renderView', 'renderSearchView');
		return $this->fetch($this->findTemplate('Teamset'));		
	}

    public function getListViewSmarty($parentFieldArray, $vardef, $displayParams, $col)
    {	
        $tabindex = 1;
        $parentFieldArray = $this->setupFieldArray($parentFieldArray, $vardef);
        $this->setup($parentFieldArray, $vardef, $displayParams, $tabindex);
        $this->ss->assign('rowData',$parentFieldArray);
        $this->ss->assign('col',$vardef['name']);
		return $this->fetch($this->findTemplate('TeamsetListView'));
	}
	
	function getImportViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex) {
    	$this->setup($parentFieldArray, $vardef, $displayParams, $tabindex);
		$this->ss->assign('renderView', 'renderImportView');
		return $this->fetch($this->findTemplate('Teamset'));
    }	
	
	/**
	 * getTeamIdSearchField
	 * 
	 */
	public function getTeamIdSearchField($field) {
		
		if(isset($_REQUEST[$field])) {
			$primary_team_index = $_REQUEST[$field];
			if(preg_match('/(team_name_.*?_collection)$/', $field, $matches)) {
			   $field = "id_" . $matches[1];
			}
		    $primary_team_id = $_REQUEST["{$field}_{$primary_team_index}"];
			return array('query_type' => 'format',
		                 'value' => $primary_team_id,
						 'operator' => '=',
					     'db_field' => array('team_id'));
		}	
	}
	
	/**
	 * getTeamSetIdSearchField
	 * 
	 * @param $field
	 * @return unknown_type
	 */
	public function getTeamSetIdSearchField($field, $type = 'any', $teams = array(), $params = array()){
		
		if(empty($teams)){
			$teams = $this->getTeamsFromRequest($field, $params);
		}
		$teams = array_keys($teams);
		$team_count = count($teams);

		if(!empty($_REQUEST["{$field}_type"])){
			$type = $_REQUEST["{$field}_type"];
		}

		if($type == 'exact') {
			//Calculate the team_md5 value
			sort($teams, SORT_STRING);
			
            $team_md5 = '';
            $uniqueTeams = array();
			foreach($teams as $team_id){
				if(!in_array($team_id, $uniqueTeams)){
					$team_md5 .= $team_id;
					$uniqueTeams[] = $team_id;
				}
			}
			
			$team_md5 = md5($team_md5);

			return array('query_type' => 'format',
	                     'value' => $team_md5,
						 'operator' => 'subquery',
			             'subquery' => "SELECT id FROM team_sets WHERE team_md5 = '{0}'",
						 'db_field' => array('team_set_id'));			
			
	    } else if($type == 'all' && $team_count > 1) {
			return array('query_type' => 'format',
			             'value' => $teams,
	                     'subquery' => "SELECT team_set_id FROM team_sets_teams WHERE team_id IN ({0}) GROUP BY team_set_id HAVING COUNT(team_set_id) = {$team_count}",
						 'operator' => 'subquery',
						 'db_field' => array('team_set_id'));			
		} else {
			return array('query_type' => 'format',
	                     'value' => $teams,
						 'operator' => 'subquery',
						 'subquery' => "SELECT team_set_id FROM team_sets_teams WHERE team_id IN ({0})",
						 'db_field' => array('team_set_id'));
		}
	}
	
	/**
	 * Obtain the set of teams selected from the REQUEST
	 *
	 * @param string $field	the name of the field on the UI
	 * @return array		array of team ids
	 */
	 public function getTeamsFromRequest($field, $vars = array()){
		if(empty($vars)){
			$vars = $_REQUEST;
		}
		$team_ids = array();
		if ( is_array($vars) ) {
            foreach($vars as $name=>$value){
                if(!empty($value)){
                    if(strpos($name, $field . "_collection_") !== false){
                        $num = substr($name, strrpos($name, '_')+1); //Get everything after the last "_" character
                        if(is_numeric($num)){
                            settype($num, 'int');
                            if ($name == "id_" . $field . "_collection_" . $num) {
                                $team_ids[$value] = $vars[$field . "_collection_" . $num];
                            }
                        }
                    }
                }
            }
        }

	    return $team_ids;
	}
	
	/**
	 * Given the REQUEST, return the selected primary team id, if none found, then return ''
	 *
	 * @param string $field		the name of the field on the UI
	 * @param array $vars		array of REQUEST params to look at
	 * @return string			the primary team id or empty
	 */
	public function getPrimaryTeamIdFromRequest($field, $vars){
		if(isset($vars["primary_" . $field . "_collection"])){
        	$primary = $vars["primary_" . $field . "_collection"];
        	$key = "id_" . $field . "_collection_" . $primary;   	
            return $vars[$key];
        }
        return '';
	}
	
	/**
	 * Given the bean and the REQUEST attempt to save the selected team ids to the bean
	 *
	 * @param SugarBean $bean
	 * @param unknown_type $params
	 * @param string $field
	 * @param unknown_type $properties
	 */
   public function save(&$bean, $params, $field, $properties, $prefix = ''){
    	$save = false;
        $value_name = $field . "_values";
        
        $team_ids = array();
        $teams = $this->getTeamsFromRequest($field, $params);
		$team_ids = array_keys($teams);

	    $primaryTeamId = $this->getPrimaryTeamIdFromRequest($field, $params);
	    //if the team id here is blank then let's not set it as the team_id on the bean
	    if(!empty($primaryTeamId)){
        	$bean->team_id = $primaryTeamId;
	    }
        
		if(!empty($team_ids)){
	        $bean->load_relationship('teams');
	        $method = 'replace';
	        if(!empty($params[$field.'_type'])){
	        	$method = $params[$field.'_type'];
	        }
	        
	        $bean->teams->$method($team_ids, array(), false);
		}
	}
    
    /**
     * @see SugarFieldBase::importSanitize()
     */
    public function importSanitize(
        $value,
        $vardef,
        $focus,
        ImportFieldSanitize $settings
        )
    {
        static $teamBean;
        if ( !isset($teamBean) ) {
            $teamBean = loadBean('Teams');
        }
        
    	if(!is_array($value)){
	        // We will need to break it apart to put test it.
       		$value = explode(",",$value);
       		if(!is_array($value))
       			$value = array($value);
		}
		$team_ids = array();
		foreach($value as $val){
			//1) check if this is a team id
			$val = trim($val);
            if ( empty($val) ) {
                continue;
            }
			if(!$this->_isTeamId($val, 'Teams')){
				//2) check if it is a team name
				$fieldname = $vardef['rname'];
                $teamid = $teamBean->retrieve_team_id($val);
                if($teamid !== false){
                    $team_ids[] = $teamid;
                    continue;
                } else {
                    continue;
                }
                //3) ok we did not find the id, so we need to create a team.
                $newbean = loadBean('Teams');
                 if ( $newbean->ACLAccess('save') ) {
                 	$newbean->$vardef['rname'] = $val;
                 	
                    if ( !isset($focus->assigned_user_id) || $focus->assigned_user_id == '' ){
                    	$newbean->assigned_user_id = $GLOBALS['current_user']->id;
                    }else{
                    	$newbean->assigned_user_id = $focus->assigned_user_id;
                    }
                    
                    if ( !isset($focus->modified_user_id) || $focus->modified_user_id == '' ){
                    	$newbean->modified_user_id = $GLOBALS['current_user']->id;
                    }else{
                    	$newbean->modified_user_id = $focus->modified_user_id;
                    }
                    
                    $newbean->save(false);
                    $team_ids[] = $newbean->id;
                 }
			}else{
				$team_ids[] = $val;
			}
		}

		if(!empty($team_ids)){
			$focus->load_relationship('teams');
			$focus->teams->replace($team_ids, array(), true);
			$focus->team_id = $team_ids[0];
		} else {
            $focus->setDefaultTeam();
        }
    }
    
    private function _isTeamId($value, $module){
    	$checkfocus = loadBean($module);
        if ( $checkfocus && is_null($checkfocus->retrieve($value)) ){
        	return false;
        }
        return true;
    }
}
?>