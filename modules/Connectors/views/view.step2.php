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


require_once('include/MVC/View/SugarView.php');
require_once ('modules/Connectors/ConnectorRecord.php');

class ViewStep2 extends SugarView 
{
    private $_leadQual;
    private $_colors = array("CCCCCC", "FFCCCC", "FFFFCC", "CCFFCC", "CCFFFF", "CCCCFF", "F6F6F6", "666666");
   
    public function __construct()
    {
 		parent::SugarView();
 		$this->_leadQual = new ConnectorRecord();
 	}
 	
    /**
	 * @see SugarView::displayHeader()
	 */ 	
 	public function displayHeader() {
 	    if(!empty($_REQUEST['record'])){
           $module = $_SESSION['merge_module'];
	       $this->_leadQual->load_merge_bean($module, false, $_REQUEST['record']);
        } 		
 		parent::displayHeader();
 	}
 	
    /**
	 * @see SugarView::_getModuleTitleParams()
	 */
	protected function _getModuleTitleParams($browserTitle = false)
	{
	    global $mod_strings;
	    
    	return array(
    	   "<a href='index.php?module={$_SESSION['merge_module']}&action=index'>".translate('LBL_MODULE_NAME',$_SESSION['merge_module'])."</a>",
    	   $mod_strings['LBL_TITLE'],
    	   $mod_strings['LBL_STEP2']." {$this->_leadQual->merge_bean->name}",
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
	 * @see SugarView::display()
	 */
	public function display() 
 	{
 	    if(!empty($_REQUEST['record'])){
        	$module = $_SESSION['merge_module'];
	        $temp_field_array = $this->_leadQual->merge_bean->field_defs;
			$field_count = 1;
			//$json = new JSON(JSON_LOOSE_TYPE);
			$diff_field_count=0;
			ACLField::listFilter($temp_field_array, $this->_leadQual->merge_bean->module_dir, $GLOBALS['current_user']->id, false, true, 2, false, true);

		    require_once('include/connectors/utils/ConnectorUtils.php');
		    $sources = ConnectorUtils::getModuleConnectors($module);		   
		    $source_names = array();
		    $source_names['module']['name'] = $this->_leadQual->merge_bean->name;
		    $result_beans = array();
		    require_once('include/connectors/ConnectorFactory.php');
		    $index = 1;
		    $viewdef_sources = array();
		    foreach($sources as $source_id => $source_info){
		    	if(!empty($_REQUEST[$source_id.'_id'])){
		    		$viewdef_sources[$source_id] = true;
		    		$source_instance = ConnectorFactory::getInstance($source_id);
		    		
		    		try {
		    		  $bean = $source_instance->fillBean(array('id' => $_REQUEST[$source_id.'_id']), $module);
		    		} catch(Exception $ex) {
			          echo $ex->getMessage();
			          continue;
			        }
			        
		    		$result_beans[$index] = $bean;
		    		$source_names[$index]['name'] = $source_info['name'];
		    		$source_names[$index]['color'] = $this->_getRandomColor($index);
		    		$source_names[$index]['id'] = $index;
		    		$index++;
		    		if(!empty($bean->parent_duns) && (!empty($bean->duns) && $bean->parent_duns != $bean->duns)){
		    			//go get the parent as well.

		    			$parent_bean = $source_instance->fillBean(array('id' => $bean->parent_duns), $module);
		    			$result_beans[$index] = $parent_bean;
		    			$source_names[$index]['name'] = $source_info['name'];
			    		$source_names[$index]['color'] = $this->_getRandomColor($index);
			    		$source_names[$index]['id'] = $index;
			    		$index++;
		    		}
		    	}
		    	
		    } 

		    
		    $viewdefs = ConnectorUtils::getViewDefs($viewdef_sources);
		    if(empty($viewdefs['Connector']['MergeView'][$module])) {
		       return;
		    }
		    
		    $merge_fields = array();
            $focusBean = loadBean($module);
		    foreach($viewdefs['Connector']['MergeView'][$module] as $field){
		    	    if($focusBean->field_defs[$field]['type'] == 'relate') {
		    	       continue;
		    	    }
		    	
		            $merge_fields[$field] = isset($focusBean->field_defs[$field]['vname']) ?  $focusBean->field_defs[$field]['vname'] : $field;
		    }		    

		    //do not show the id on the merge screen
		    if(!empty($merge_fields['id'])){
		    	unset($merge_fields['id']);
		    }		    
		    
		    $this->ss->assign('merge_fields', $merge_fields);		    
			$this->ss->assign('record_name', $this->_leadQual->merge_bean->name);
			$this->ss->assign('source_names', $source_names);
			$this->ss->assign('result_beans', $result_beans);
			$this->ss->assign('record', $this->_leadQual->merge_bean);
			$this->ss->assign('merge_module', $module);
			$this->ss->assign('mod', $GLOBALS['mod_strings']);
			
			echo $this->getModuleTitle(false);
	        $this->ss->display($this->getCustomFilePathIfExists('modules/Connectors/tpls/step2.tpl'));
        } 
    }
    
    private function _getRandomColor(
        $index
        )
    {
	    $color = $this->_colors[$index % 7];
	    return $color;
	} 
}