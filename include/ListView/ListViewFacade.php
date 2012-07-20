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


/*
 * Created on Sep 10, 2007
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 require_once('include/ListView/ListViewSmarty.php');
 

 /**
  * A Facade to ListView and ListViewSmarty
  */
 class ListViewFacade{

 	var $focus = null;
 	var $module = '';
 	var $type = 0;

 	var $lv;

 	//ListView fields
 	var $template;
 	var $title;
 	var $where = '';
 	var $params = array();
 	var $offset = 0;
 	var $limit = -1;
 	var $filter_fields = array();
 	var $id_field = 'id';
 	var $prefix = '';
 	var $mod_strings = array();

 	/**
 	 * Constructor
 	 * @param $focus - the bean
 	 * @param $module - the module name
 	 * @param - 0 = decide for me, 1 = ListView.html, 2 = ListViewSmarty
 	 */
 	function ListViewFacade($focus, $module, $type = 0){
 		$this->focus = $focus;
 		$this->module = $module;
 		$this->type = $type;
 		$this->build();
 	}

 	function build(){
 		//we will assume that if the ListView.html file exists we will want to use that one
 		if(file_exists('modules/'.$this->module.'/ListView.html')){
 			$this->type = 1;
 			$this->lv = new ListView();
 			$this->template = 'modules/'.$this->module.'/ListView.html';
 		}else{
			$metadataFile = null;
        	$foundViewDefs = false;
        	if(file_exists('custom/modules/' . $this->module. '/metadata/listviewdefs.php')){
            	$metadataFile = 'custom/modules/' .  $this->module . '/metadata/listviewdefs.php';
            	$foundViewDefs = true;
        	}else{
            	if(file_exists('custom/modules/'. $this->module.'/metadata/metafiles.php')){
                	require_once('custom/modules/'. $this->module.'/metadata/metafiles.php');
                	if(!empty($metafiles[ $this->module]['listviewdefs'])){
                    	$metadataFile = $metafiles[ $this->module]['listviewdefs'];
                    	$foundViewDefs = true;
                	}
            	}elseif(file_exists('modules/'. $this->module.'/metadata/metafiles.php')){
                	require_once('modules/'. $this->module.'/metadata/metafiles.php');
                	if(!empty($metafiles[ $this->module]['listviewdefs'])){
                    	$metadataFile = $metafiles[ $this->module]['listviewdefs'];
                    	$foundViewDefs = true;
                	}
            	}
        	}
	        if(!$foundViewDefs && file_exists('modules/'. $this->module.'/metadata/listviewdefs.php')){
	                $metadataFile = 'modules/'. $this->module.'/metadata/listviewdefs.php';
	        }
	        require_once($metadataFile);

			if($this->focus->bean_implements('ACL'))
			ACLField::listFilter($listViewDefs[ $this->module], $this->module, $GLOBALS['current_user']->id ,true);

			$this->lv = new ListViewSmarty();
			$displayColumns = array();
			if(!empty($_REQUEST['displayColumns'])) {
			    foreach(explode('|', $_REQUEST['displayColumns']) as $num => $col) {
			        if(!empty($listViewDefs[$this->module][$col]))
			            $displayColumns[$col] = $listViewDefs[$this->module][$col];
			    }
			}
			else {
			    foreach($listViewDefs[$this->module] as $col => $params) {
			        if(!empty($params['default']) && $params['default'])
			            $displayColumns[$col] = $params;
			    }
			}
			$this->lv->displayColumns = $displayColumns;
			$this->type = 2;
			$this->template = 'include/ListView/ListViewGeneric.tpl';
 		}
 	}

 	function setup($template = '', $where = '', $params = array(), $mod_strings = array(), $offset = 0, $limit = -1, $orderBy = '', $prefix = '', $filter_fields = array(), $id_field = 'id'){
 		if(!empty($template))
 			$this->template = $template;

 		$this->mod_strings = $mod_strings;

 		if($this->type == 1){
 			$this->lv->initNewXTemplate($this->template,$this->mod_strings);
 			$this->prefix = $prefix;
 			$this->lv->setQuery($where, $limit, $orderBy, $prefix);
 			$this->lv->show_select_menu = false;
			$this->lv->show_export_button = false;
			$this->lv->show_delete_button = false;
			$this->lv->show_mass_update = false;
			$this->lv->show_mass_update_form = false;
 		}else{
 			$this->lv->export = false;
			$this->lv->delete = false;
			$this->lv->select = false;
			$this->lv->mailMerge = false;
			$this->lv->multiSelect = false;
 			$this->lv->setup($this->focus, $this->template, $where, $params, $offset, $limit,  $filter_fields, $id_field);
 			
 		}
 	}

 	function display($title = '', $section = 'main', $return = FALSE){
 		if($this->type == 1){
            ob_start();
 			$this->lv->setHeaderTitle($title);
 			$this->lv->processListView($this->focus, $section, $this->prefix);
            $output = ob_get_contents();
            ob_end_clean();
 		}else{
             $output = get_form_header($title, '', false) . $this->lv->display();
 		}
        if($return)
            return $output;
        else
            echo $output;
 	}

	function setTitle($title = ''){
		$this->title = $title;
	}
 }
?>
