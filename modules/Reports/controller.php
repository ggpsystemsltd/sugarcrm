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

 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

class ReportsController extends SugarController
{	
	/** 
	 * @see SugarController::setup($module = '')
	 */
	
	public function setup($module = '')
	{
		$result = parent::setup($module);
		
		// bug 41860 fix
		if(!empty($_REQUEST['id']))
			$this->record = $_REQUEST['id'];
		// end bugfix
		
		return $result;
	}
	
    /**
     * @see SugarController::loadBean()
     */
	public function loadBean()
	{			
		if(!empty($_REQUEST['record']) && $_REQUEST['action'] == 'ReportsWizard'){
			$_REQUEST['id'] = $this->record;
			$_REQUEST['page'] = 'report';
			$this->view_object_map['action'] =  'ReportsWizard';
		}
		else if(empty($this->record) && !empty($_REQUEST['id'])){
			$this->record = $_REQUEST['id'];
			$GLOBALS['action'] = 'detailview';
			$this->view_object_map['action'] =  'ReportCriteriaResults';
		}
		elseif(!empty($this->record)){
			if ($_REQUEST['action'] == 'DetailView') {
				$_REQUEST['id'] = $this->record;
				unset($_REQUEST['record']);
			}else{
				$GLOBALS['action'] = 'detailview'; //bug 41860 
			}
			$_REQUEST['page'] = 'report';
			$this->view_object_map['action'] =  'ReportCriteriaResults';
		}
		
		parent::loadBean();
	}
	
	public function action_buildreportmoduletree() 
	{
	    $this->view = 'buildreportmoduletree';
	}
	
	public function action_add_schedule() 
	{
	    $this->view = 'schedule';
	}
	
	public function action_detailview()
	{
		$this->view = 'classic';
	}
	public function action_get_teamset_field() 
	{
		require_once('include/SugarFields/Fields/Teamset/ReportsSugarFieldTeamsetCollection.php');
		$view = new ReportsSugarFieldTeamsetCollection(true);
		$view->setup();
		$view->process();
		$view->init_tpl();
		echo $view->display();
	}
	public function action_get_quicksearch_defaults() 
	{
		global $global_json;
		$global_json = getJSONobj();
		require_once('include/QuickSearchDefaults.php');
		$qsd = QuickSearchDefaults::getQuickSearchDefaults();
		if (!empty($_REQUEST['parent_form']))
			$qsd->form_name = $_REQUEST['parent_form'];
		$quicksearch_js = '';
		if (isset($_REQUEST['parent_module']) && isset($_REQUEST['parent_field'])) {
			$sqs_objects = array($_REQUEST['parent_field'] => $qsd->getQSParent($_REQUEST['parent_module'])); 
    		foreach($sqs_objects as $sqsfield=>$sqsfieldArray){
        	    $quicksearch_js .= "sqs_objects['$sqsfield']={$global_json->encode($sqsfieldArray)};";
    		}
		}
		echo $quicksearch_js;
	}

    protected function action_massupdate(){
        //bug: 44857 - Reports calls MasUpdate passing back the 'module' parameter, but that is also a parameter in the database
        //so when we call MassUpdate with $addAllBeanFields then it will use this in the query.
        if(!empty($_REQUEST['current_query_by_page']))
        {
            $query = unserialize(base64_decode($_REQUEST['current_query_by_page']));
            if(!empty($query['module']))
            {
                unset($query['module']);
                $_REQUEST['current_query_by_page'] = base64_encode(serialize($query));
            }
        }
        parent::action_massupdate();
    }
}
