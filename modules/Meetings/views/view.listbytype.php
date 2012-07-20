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
require_once('modules/EAPM/EAPM.php');
class MeetingsViewListbytype extends ViewList {
    var $options = array('show_header' => false, 'show_title' => false, 'show_subpanels' => false, 'show_search' => true, 'show_footer' => false, 'show_javascript' => false, 'view_print' => false,);
    
    function MeetingsViewListbytype() {
        parent::ViewList();
    }
    
 	function listViewProcess(){
        if (!$eapmBean = EAPM::getLoginInfo('LotusLive', true) ) {
            $smarty = new Sugar_Smarty();
            echo $smarty->fetch('include/externalAPI/LotusLive/LotusLiveSignup.'.$GLOBALS['current_language'].'.tpl');
            return;
        }

        $apiName = 'LotusLive';
        $api = ExternalAPIFactory::loadAPI($apiName,true);
        $api->loadEAPM($eapmBean);

        $quickCheck = $api->quickCheckLogin();
        if ( ! $quickCheck['success'] ) {
            $errorMessage = string_format(translate('LBL_ERR_FAILED_QUICKCHECK','EAPM'), array('LotusLive'));
            $errorMessage .= '<form method="POST" target="_EAPM_CHECK" action="index.php">';
            $errorMessage .= '<input type="hidden" name="module" value="EAPM">';
            $errorMessage .= '<input type="hidden" name="action" value="Save">';
            $errorMessage .= '<input type="hidden" name="record" value="'.$eapmBean->id.'">';
            $errorMessage .= '<input type="hidden" name="active" value="1">';
            $errorMessage .= '<input type="hidden" name="closeWhenDone" value="1">';
            $errorMessage .= '<input type="hidden" name="refreshParentWindow" value="1">';

            $errorMessage .= '<br><input type="submit" value="'.$GLOBALS['app_strings']['LBL_EMAIL_OK'].'">&nbsp;';
            $errorMessage .= '<input type="button" onclick="lastLoadedMenu=undefined;DCMenu.closeOverlay();return false;" value="'.$GLOBALS['app_strings']['LBL_CANCEL_BUTTON_LABEL'].'">';
            $errorMessage .= '</form>';
            echo $errorMessage;
            return;
        }

		$this->processSearchForm();
        $this->params['orderBy'] = 'meetings.date_start';
        $this->params['overrideOrder'] = true;
		$this->lv->searchColumns = $this->searchForm->searchColumns;
		$this->lv->show_action_dropdown = false;
   		$this->lv->multiSelect = false;   		
   		
   		unset($this->searchForm->searchdefs['layout']['advanced_search']);
   		
		if(!$this->headers) {
			return;
        }

		if(empty($_REQUEST['search_form_only']) || $_REQUEST['search_form_only'] == false){
			$this->lv->ss->assign("SEARCH",false);
            if ( !isset($_REQUEST['name_basic']) ) {
                $_REQUEST['name_basic'] = '';
            }
            $this->lv->ss->assign('DCSEARCH',$_REQUEST['name_basic']);
			$this->lv->setup($this->seed, 'include/ListView/ListViewDCMenu.tpl', $this->where, $this->params);
			$savedSearchName = empty($_REQUEST['saved_search_select_name']) ? '' : (' - ' . $_REQUEST['saved_search_select_name']);
			echo $this->lv->display();
		}
 	}
 	
    function listViewPrepare() {
        $oldRequest = $_REQUEST;
        parent::listViewPrepare();
        $_REQUEST = $oldRequest;
    }

    function processSearchForm(){
   		// $type = 'LotusLiveDirect';
   		$type = 'LotusLive';
          global $timedate;

         $two_hours_ago = $GLOBALS['db']->convert($GLOBALS['db']->quoted($timedate->asDb($timedate->getNow()->get("-2 hours"))), 'datetime');

   		$where =  " meetings.type = '$type' AND meetings.status != 'Held' AND meetings.status != 'Not Held' AND meetings.date_start > {$two_hours_ago} AND ( meetings.assigned_user_id = '".$GLOBALS['db']->quote($GLOBALS['current_user']->id)."' OR exists ( SELECT id FROM meetings_users WHERE meeting_id = meetings.id AND user_id = '".$GLOBALS['db']->quote($GLOBALS['current_user']->id)."' AND deleted = 0 ) ) ";

          if ( isset($_REQUEST['name_basic']) ) {
              $name_search = trim($_REQUEST['name_basic']);
              if ( ! empty($name_search) ) {
                  $where .= " AND meetings.name LIKE '".$GLOBALS['db']->quote($name_search)."%' ";
              }
          }

          $this->where = $where;
   	}

}
