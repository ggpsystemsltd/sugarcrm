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

require_once('include/SugarFields/Fields/Collection/SugarFieldCollection.php');
require_once('include/SugarFields/Fields/Collection/ViewSugarFieldCollection.php');


class ViewSugarFieldTeamsetCollection extends ViewSugarFieldCollection {

	var $add_user_private_team = true;
	var $team_set_id = null;
	var $team_id = null;

	function ViewSugarFieldTeamsetCollection($fill_data=false){
    	parent::ViewSugarFieldCollection($fill_data);
    }

    function populate(){
    	$this->name = $this->vardef['name'];
        $this->value_name = $this->name . '_values';
        $this->numFields = 1;
        $this->ss = new Sugar_Smarty();
        $this->edit_tpl_path = $this->findTemplate('CollectionEditView');
        $this->detail_tpl_path = $this->findTemplate('CollectionDetailView');
        $this->extra_var = array();
        $this->field_to_name_array = array();
    }

    function init_tpl(){
        foreach($this->extra_var as $k=>$v){
            $this->ss->assign($k,$v);
        }

        if($this->action_type == 'detailview') {
           $this->tpl_path = $this->detail_tpl_path;
        } else {
			if($this->action_type == 'search_form' || $this->action_type == 'popup_query_form') {
               $this->tpl_path = $this->findTemplate('TeamsetCollectionSearchView');
            } else if($this->action_type == 'quickcreate') {
               $this->displayParams['primaryChecked'] = true;
               $this->displayParams['formName'] = $this->form_name;
               $this->tpl_path = $this->findTemplate('TeamsetCollectionEditView');
            } else {
               $this->displayParams['formName'] = isset($this->displayParams['formName']) ? $this->displayParams['formName'] : "EditView";
               $this->tpl_path = $this->findTemplate('TeamsetCollectionEditView');
            }
            $this->ss->assign('quickSearchCode',$this->createQuickSearchCode());
            $this->createPopupCode();
        }

        $this->ss->assign('displayParams',$this->displayParams);
        $this->ss->assign('vardef',$this->vardef);
        $this->ss->assign('module',$this->related_module);
        if(!empty($this->bean)){
        	$this->ss->assign('values',$this->bean->{$this->value_name});
        }
        $this->ss->assign('showSelectButton',$this->showSelectButton);
        $this->ss->assign('APP',$GLOBALS['app_strings']);
    }


    /**
     * display
     *
     * Overrides the display method from ViewSugarFieldCollection to simply invoke Smarty instance
     * to fetch the appropriate template.
     */
	function display() {
        return $this->ss->fetch($this->tpl_path);
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
        	if(!empty($GLOBALS['beanList'][$this->module_dir])){
	        	$class = $GLOBALS['beanList'][$this->module_dir];
	            if(file_exists($GLOBALS['beanFiles'][$class])){
		        	$this->bean = loadBean($this->module_dir);
					$secondaries = array();
					$primary = false;

			        $this->bean->{$this->value_name} = array('role_field'=>'team_name');

			        if(!empty($this->team_id)){
			        	$this->bean->team_id = $this->team_id;
			        	if(!empty($this->team_set_id)){
			        		$this->bean->team_set_id = $this->team_set_id;
			        	}
			        }else if(!empty($_REQUEST['record'])){
		            	$this->bean->retrieve($_REQUEST['record']);
			        }

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
			        }elseif(!empty($this->bean->team_id)){
			        	//since the team_set_id is not set, but the team_id is.
			        	$focus = new Team();
			        	$focus->retrieve($this->bean->team_id);
			        	$display_name = Team::getDisplayName($focus->name, $focus->name_2);
			        	$this->bean->{$this->value_name}=array_merge($this->bean->{$this->value_name}, array('primary'=>array('id'=>$focus->id, 'name'=>$display_name)));
			        }
                    // fixing bug #40003: Teams revert to self when Previewing a report
                    // when report isn't saved yet and team set isn't created and stored in db
                    // we should get teams from POST while preview report
                    elseif(empty($this->bean->team_id) && empty($this->bean->team_set_id))
                    {
                        require_once('include/SugarFields/Fields/Teamset/SugarFieldTeamset.php');
                        $teams = SugarFieldTeamset::getTeamsFromRequest($this->bean->{$this->value_name}['role_field'], $_POST);
                        $primary_id = SugarFieldTeamset::getPrimaryTeamidFromRequest($this->bean->{$this->value_name}['role_field'], $_POST);
                        foreach($teams as $id => $name)
                        {
                            // getting strings of values is needed because some problems appears when compare '1' and md5 value which begins from '1'
                            if (strval($primary_id) === strval($id))
                            {
                                $this->bean->{$this->value_name}=array_merge($this->bean->{$this->value_name}, array('primary'=>array('id'=>$id, 'name'=>$name)));
                            }
                            else
                            {
                                $secondaries['secondaries'][]=array('id'=>$id, 'name'=>$name);
                            }
                        }
                    }
					$this->bean->{$this->value_name}=array_merge($this->bean->{$this->value_name}, $secondaries);
	            }
        	}

        	$this->skipModuleQuickSearch = true;
			$this->showSelectButton = false;
    }


    /**
     * process
     *
     * This method handles calling the appropriate sequence of methods depending on the action type
     */
    function process() {
        if($this->action_type == 'editview') {
        	$this->pre_process_editview();
        	$this->process_editview();
        } else if($this->action_type == 'detailview') {
            $this->process_detailview();
        } else if($this->action_type == 'search_form' || $this->action_type == 'popup_query_form') {
        	$this->process_searchform();
        	$this->process_editview();
        }else{
        	$this->pre_process_editview();
        	$this->process_editview();
        }
    }


    /**
     * process_searchform
     *
     * This method handles rendering the widget for the advanced search form tab.  Most of the logic
     * involves retrieving the teams set from the $_REQUEST as well as the search type (any, all, exact)
     *
     */
    private function process_searchform() {
        require_once('include/SugarFields/SugarFieldHandler.php');
        $sfh = new SugarFieldHandler();
        $sf = $sfh->getSugarField('Teamset', true);
        $teams = $sf->getTeamsFromRequest($this->name);
		$full_form_values = array();
        if(!empty($teams)) {
            //If a primary team is selected, adjust the appropriate settings; otherwise use the first
        	//team from the $_REQUEST
	    	if(isset($_REQUEST["primary_{$this->name}_collection"])){
	    		$this->ss->assign('hasPrimaryTeam', true);
	    		$primary = $_REQUEST["primary_{$this->name}_collection"];
	    		$key = "id_{$this->name}_collection_{$primary}"; //Get the $_REQUEST index key
	    		$primary = $_REQUEST[$key];
	    		$primaryTeam = array('id' => $primary, 'name'=>$teams[$primary]);
	    		$full_form_values['primary'] = $primaryTeam;
	    		unset($teams[$primary]); //Unset the primary team
	    	} else {
	    	    foreach($teams as $team_id=>$team_name) {
	    		   $full_form_values['primary'] = array('id'=>$team_id, 'name'=>$team_name);
	    		   unset($teams[$team_id]);
	    		   break;
	    	    }
	    	}

        	foreach($teams as $team_id=>$team_name) {
	    			$full_form_values['secondaries'][] = array('id'=>$team_id, 'name'=>$team_name);
	    	}

	    	$this->bean->{$this->value_name}=array_merge($this->bean->{$this->value_name}, $full_form_values);

	    	//Save the search type (any, all, exact)
	        if(isset($_REQUEST["{$this->name}_type"])) {
	        	$this->displayParams['searchType'] = $_REQUEST["{$this->name}_type"];
	        }
        } else {
            //Don't pre-populate the search form
			$this->bean->{$this->value_name} = array();
		}

    }


    /**
     * pre_process_editview
     *
     * This method handles three editview scenarios:
     * 1) rendering the widget when creating a duplicate
     * 2) rendering the widget when going from a subpanel quick create form to a full form
     * 3) rendering the widget on a regular edit view of an existing record
     *
     */
    private function pre_process_editview() {

    	$this->displayParams['primaryChecked'] = true;
    	if(empty($_REQUEST['record'])) {
           $isDuplicate = isset($_REQUEST['isDuplicate']) && $_REQUEST['isDuplicate'] == 'true' && $this->bean->aclAccess('edit');
           if($isDuplicate) {
		        $dupBean = loadBean($_REQUEST['module']);
		        $dupBean->retrieve($_REQUEST['record']);
		        $full_form_values = array();
		        $full_form_values['primary'] = array('id'=>$dupBean->team_id, 'name'=>$dupBean->team_name);
		        $teams = array();
				require_once('modules/Teams/TeamSetManager.php');
				$team_ids = TeamSetManager::getTeamsFromSet($dupBean->team_set_id);
		        foreach($team_ids as $row){
		        		if($dupBean->team_id != $row['id']) {
		        		   $full_form_values['secondaries'][] = array('id'=>$row['id'], 'name'=>$row['display_name']);
		        		}
		        } //foreach

	            $this->bean->{$this->value_name}=array_merge($this->bean->{$this->value_name}, $full_form_values);
	            //If this request is coming from a subpanel quick create, we have to store the selected values
	       } else if(isset($_REQUEST['full_form'])) {
		        require_once('include/SugarFields/SugarFieldHandler.php');
		        $sfh = new SugarFieldHandler();
		        $sf = $sfh->getSugarField('Teamset', true);
	            $teams = $sf->getTeamsFromRequest('team_name');
	            $full_form_values = array();
	            if(!empty($teams)){
		    	    $primary = $_REQUEST["primary_team_name_collection"];
		    	    $key = 'id_team_name_collection_' . $primary; //Get the $_REQUEST index key
		    	    $primary = $_REQUEST[$key];
		    		$primaryTeam = array('id' => $primary, 'name'=>$teams[$primary]);
		    		unset($teams[$primary]); //Unset the primary team
		    		$full_form_values['primary'] = $primaryTeam;
		    		foreach($teams as $team_id=>$team_name) {
		    			$full_form_values['secondaries'][] = array('id'=>$team_id, 'name'=>$team_name);
		    		}
	            }
				$this->bean->{$this->value_name}=array_merge($this->bean->{$this->value_name}, $full_form_values);
            } else if (!empty($this->bean) && $this->add_user_private_team)
            {
                // fixing bug #40003: Teams revert to self when Previewing a report
                // check if array consists of subarray 'secondaries' that means we don't need to remerge it again
                if (!array_key_exists('secondaries', $this->bean->{$this->value_name}))
                {
                    require_once('modules/Teams/TeamSetManager.php');
                    $teams = TeamSetManager::getTeamsFromSet($GLOBALS['current_user']->team_set_id);
                    $primary = false;
                    $secondaries = array();
                    foreach ($teams as $row)
                    {
                        if (empty($primary) && $row['id'] == $GLOBALS['current_user']->team_id)
                        {
                            $this->bean->{$this->value_name} = array_merge($this->bean->{$this->value_name}, array('primary' => array('id' => $row['id'], 'name' => $row['display_name'])));
                            $primary = true;
                        } else
                        {
                            $secondaries['secondaries'][] = array('id' => $row['id'], 'name' => $row['display_name']);
                        }
                    } //foreach
                    $this->bean->{$this->value_name} = array_merge($this->bean->{$this->value_name}, $secondaries);
                }
            } //if-else
        }
    }


    /*
     * Create the quickSearch code for the collection field.
     * return the javascript code which define sqs_objects.
     */
    function createQuickSearchCode($returnAsJavascript = true){
        $fieldName = empty($this->displayParams['idName']) ? $this->name : $this->displayParams['idName'];
		$sqs_objects = array();
        require_once('include/QuickSearchDefaults.php');
        $qsd = QuickSearchDefaults::getQuickSearchDefaults();
        $qsd->setFormName($this->form_name);
        for($i=0; $i<$this->numFields; $i++){
            	$name1 = "{$this->form_name}_{$fieldName}_collection_{$i}";
                $sqs_objects[$name1] = $qsd->getQSParent($this->related_module);
                $sqs_objects[$name1]['populate_list'] = array("{$fieldName}_collection_{$i}", "id_{$fieldName}_collection_{$i}");
                $sqs_objects[$name1]['field_list'] = array('name', 'id');
                if(isset($this->displayParams['collection_field_list'])){
                    foreach($this->displayParams['collection_field_list'] as $v){
                        $sqs_objects[$name1]['populate_list'][] = $v['vardefName']."_".$fieldName."_collection_extra_".$i;
                        $sqs_objects[$name1]['field_list'][] = $v['vardefName'];
                    }
                }
                if(isset($this->displayParams['field_to_name_array'])){
                    foreach($this->displayParams['field_to_name_array'] as $k=>$v){
                        /*
                         * "primary_populate_list" and "primary_field_list" are used when the field is selected as a primary.
                         * At this time the JS function changePrimary() will copy "primary_populate_list" and "primary_field_list"
                         * into "populate_list" and "field_list" and remove the values from all the others which are secondaries.
                         * "primary_populate_list" and "primary_field_list" contain the fields which has to be populated outside of
                         * the collection field. For example the "Address Information" are populated with the "billing address" of the
                         * selected account in a contact editview.
                         */
                        $sqs_objects[$name1]['primary_populate_list'][] = $v;
                        $sqs_objects[$name1]['primary_field_list'][] = $k;
                    }
                }else if(isset($field['field_list']) && isset($field['populate_list'])){
                    $sqs_objects[$name1]['primary_populate_list'] = array_merge($sqs_objects[$name1]['populate_list'], $field['field_list']);
                    $sqs_objects[$name1]['primary_field_list'] = array_merge($sqs_objects[$name1]['field_list'], $field['populate_list']);
                }else{
                    $sqs_objects[$name1]['primary_populate_list'] = array();
                    $sqs_objects[$name1]['primary_field_list'] = array();
                }
        }

        $id = "{$this->form_name}_{$fieldName}_collection_0";

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

function findTemplate($view){
        static $tplCache = array();

        if ( isset($tplCache['TeamsetCollection'][$view]) ) {
            return $tplCache['TeamsetCollection'][$view];
        }

        $lastClass = get_class($this);
        $classList = array('Teamset');

        $tplName = '';
        foreach ( $classList as $className ) {
            global $current_language;
            if(isset($current_language)) {
                $tplName = 'include/SugarFields/Fields/'. $className .'/'. $current_language . '.' . $view .'.tpl';
                if ( file_exists('custom/'.$tplName) ) {
                    $tplName = 'custom/'.$tplName;
                    break;
                }
                if ( file_exists($tplName) ) {
                    break;
                }
            }
            $tplName = 'include/SugarFields/Fields/'. $className .'/'. $view .'.tpl';
            if ( file_exists('custom/'.$tplName) ) {
                $tplName = 'custom/'.$tplName;
                break;
            }
            if ( file_exists($tplName) ) {
                break;
            }
        }

        $tplCache['TeamsetCollection'][$view] = $tplName;

        return $tplName;
    }
}
?>
