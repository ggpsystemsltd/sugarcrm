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


require_once('include/MVC/View/views/view.list.php');
require_once('include/SearchForm/SearchForm2.php');
require_once('modules/Connectors/ConnectorRecord.php');
require_once('include/connectors/sources/SourceFactory.php');
require_once('modules/Connectors/tabs.php');

class ViewStep1 extends ViewList 
{   
	private $_searchDefs;
	private $_searchDefsMap;
	private $_searchFields;
	private $_trueFields;
	private $_merge_module;
	private $_tabs;
	private $_modules_sources;
	
	/**
	 * @see SugarView::_getModuleTitleParams()
	 */
	protected function _getModuleTitleParams($browserTitle = false)
	{
	    global $mod_strings;
	    
    	return array(
    	   "<a href='index.php?module={$_REQUEST['merge_module']}&action=index'>".translate('LBL_MODULE_NAME',$_REQUEST['merge_module'])."</a>",
    	   $mod_strings['LBL_TITLE'],
    	   $mod_strings['LBL_STEP1'],
    	   );
    }
    
	/**
	 * @see SugarView::_getModuleTab()
	 */
	protected function _getModuleTab()
    {
        if ( !empty($_REQUEST['merge_module']) )
            return $_REQUEST['merge_module'];
        
        return parent::_getModuleTab();
    }
 	
 	/**
	 * @see SugarView::process()
	 */
	public function process() 
 	{
        //Load Sources Here...
 	    if(!empty($_REQUEST['merge_module'])){
           $this->_merge_module = $_REQUEST['merge_module'];
        } else {
           //Error
        }
        
        $moduleError = false;
        require_once('include/connectors/utils/ConnectorUtils.php');
        require_once('include/connectors/sources/SourceFactory.php');
        $modules_sources = ConnectorUtils::getDisplayConfig();
        if(empty($modules_sources)) {
          $moduleError = true;  	
        } else {
          $this->_modules_sources = $modules_sources;
          if(empty($this->_modules_sources[$this->_merge_module]) || empty($this->_modules_sources[$this->_merge_module])) {
          	 $moduleError = true;
          }
        }
        
        if($moduleError) {
          $GLOBALS['log']->error($GLOBALS['mod_strings']['ERROR_NO_CONNECTOR_DISPLAY_CONFIG_FILE']);
          echo $GLOBALS['mod_strings']['ERROR_NO_CONNECTOR_DISPLAY_CONFIG_FILE'];
          return;         	
        }
        
        $_SESSION['merge_module'] = $this->_merge_module;
        
        $this->seed = loadBean($this->_merge_module);	
        $this->seed->retrieve($_REQUEST['record']);        
        
        //search form
        $searchdefs = ConnectorUtils::getSearchDefs();
		$this->_searchDefs = isset($searchdefs) ? $searchdefs : array();

 	    $mapped_fields = array();
 	    
 	    unset($_SESSION['searchDefs'][$this->_merge_module][$this->seed->id]);
 	    $sources = $modules_sources[$this->_merge_module];
 	    $source = array_shift($sources);
		
 	    
 	    
 		foreach($sources as $lsource){
			if(!empty($this->_searchDefs[$lsource][$this->_merge_module])) {
				$s = ConnectorFactory::getInstance($lsource);				
				if($s->getSource()->isEnabledInWizard()){
					$source_map = $s->getModuleMapping($this->_merge_module);
					foreach($this->_searchDefs[$lsource][$this->_merge_module] as $key) {
						$beanKey = $key;
						if(!empty($source_map[$key])){
							$beanKey = $source_map[$key];
						}
						if(!empty($this->seed->$beanKey)){
							$val = $this->seed->$beanKey;
							if(is_object($val) && get_class($val) == 'SugarEmailAddress') {
							   $emailaddress = '';
							   if(!empty($val->addresses)) {
							   	  foreach($val->addresses as $email) {
							   	  	  if(!empty($email['primary_address'])) {
							   	  	  	 $emailaddress = $email['email_address'];
							   	  	  	 break;
							   	  	  }
							   	  }
							   }
							   $val = $emailaddress;
							}
						}else{
							$val = '';
						}
				
						$_SESSION['searchDefs'][$this->_merge_module][$this->seed->id][$lsource][$key] = $val;
				     }//foreach
				}
			}//if
 	    }
        //end search form
		parent::process();	
	}
 	
    /**
	 * @see SugarView::display()
	 */
	public function display() 
    {
 		$this->ss->assign('RECORD', $_REQUEST['record']);
        $this->ss->assign('module', $this->_merge_module);
        $this->ss->assign('mod', $GLOBALS['mod_strings']);
        
        $this->ss->assign('search_fields', $this->_trueFields);
		$this->ss->assign('fields', $this->seed->field_defs);
		$this->_tabs = array();
		$first_source = '';
		$source_instance = null;
		$source_list = array();
		foreach($this->_modules_sources[$_SESSION['merge_module']] as $source) {
			$s = SourceFactory::getSource($source);
			if($s->isEnabledInWizard()) {
				$config = $s->getConfig();
				$this->_tabs[] = array('title' => $config['name'], 'link' => $source, 'key' => $source);
				if(empty($first_source)){
					$first_source = $source;
					$source_instance = ConnectorFactory::getInstance($source);
				}
				$source_list[] = $source;
			}
		}
		$this->ss->assign('SOURCES', $source_list);
		
		$this->ss->assign('source_id', $first_source);
		$this->_trueFields = array();
 	    $field_defs = $source_instance->getFieldDefs();
 	    $sMap = $source_instance->getModuleMapping($this->_merge_module);
		$searchLabels = ConnectorUtils::getConnectorStrings($first_source);
     	if(!empty($this->_searchDefs[$first_source][$this->_merge_module])) {
				foreach($this->_searchDefs[$first_source][$this->_merge_module] as $key) {
					$beanKey = $key;
					if(!empty($sMap[$key])){
						$beanKey = $sMap[$key];
					}
					if(!empty($this->seed->$beanKey)){
						$this->_trueFields[$key]['value'] = $this->seed->$beanKey;
					}else{
						$this->_trueFields[$key]['value'] = '';
					}
					if(!empty($field_defs[$key]) && isset($searchLabels[$field_defs[$key]['vname']])){
						$this->_trueFields[$key]['label'] = $searchLabels[$field_defs[$key]['vname']];
					}else{
						$this->_trueFields[$key]['label'] = $key;
					}
					//$_trueFields[$key]['label'] = isset($searchLabels[$field_defs[$key]['vname']]) ? $searchLabels[$field_defs[$key]['vname']] : $key;
					$_SESSION['searchDefs'][$this->_merge_module][$this->seed->id][$first_source][$key] = $this->_trueFields[$key]['value'];
				  }//foreach
			}//fi
		$this->ss->assign('search_fields', $this->_trueFields);
		
    	$tab_panel = new ConnectorWidgetTabs($this->_tabs, $first_source, 'SourceTabs.loadTab', 'subpanelTablist');
		
	  	$this->ss->assign('TABS', $tab_panel->display());
       
        echo $this->getModuleTitle(false);
        echo $this->ss->fetch($this->getCustomFilePathIfExists('modules/Connectors/tpls/step1.tpl'));
        
        //display bean detail view
        $GLOBALS['module'] = $this->_merge_module;
       
        //end display bean detail view  
    }
}