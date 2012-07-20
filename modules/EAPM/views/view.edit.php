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


class EAPMViewEdit extends ViewEdit {

    private $_returnId;

    public function __construct()
    {
        $this->setReturnId();
        parent::__construct();
    }

    protected function setReturnId()
    {
        $returnId = $GLOBALS['current_user']->id;
        if(!empty($_REQUEST['user_id']) && !empty($_REQUEST['return_module']) && 'Users' == $_REQUEST['return_module']){
            $returnId = $_REQUEST['user_id'];
        }
        $this->_returnId = $returnId;
    }

    protected function _getModuleTab()
    {
        return 'Users';
    }

    /**
	 * @see SugarView::_getModuleTitleParams()
	 */
	protected function _getModuleTitleParams($browserTitle = false)
	{
	    global $mod_strings;

        $returnAction = 'DetailView';
        $returnModule = 'Users';
        $returnId = $GLOBALS['current_user']->id;
        $returnName = $GLOBALS['current_user']->full_name;
        if(!empty($_REQUEST['return_action']) && !empty($_REQUEST['return_module'])){
            if('Users' == $_REQUEST['return_module']){
                if('EditView' == $_REQUEST['return_action']){
                    $returnAction = 'EditView';
                }
                if(!empty($_REQUEST['return_name'])){
                    $returnName = $_REQUEST['return_name'];
                }
                if(!empty($_REQUEST['user_id'])){
                    $returnId = $_REQUEST['user_id'];
                }
            }
        }
        $this->_returnId = $returnId;

        $iconPath = $this->getModuleTitleIconPath($this->module);
        $params = array();
        if (!empty($iconPath) && !$browserTitle) {
            $params[] = "<a href='index.php?module=Users&action=index'><!--not_in_theme!--><img src='{$iconPath}' alt='".translate('LBL_MODULE_NAME','Users')."' title='".translate('LBL_MODULE_NAME','Users')."' align='absmiddle'></a>";

        }
        else {
            $params[] = translate('LBL_MODULE_NAME','Users');
        }
        $params[] = "<a href='index.php?module={$returnModule}&action=EditView&record={$returnId}'>".$returnName."</a>";
        $params[] = $GLOBALS['app_strings']['LBL_EDIT_BUTTON_LABEL'];

        return $params;
    }

    /**
	 * @see SugarView::getModuleTitleIconPath()
	 */
	protected function getModuleTitleIconPath($module) 
    {
        return parent::getModuleTitleIconPath('Users');
    }

 	function display() {
        $this->ss->assign('return_id', $this->_returnId);

        $cancelUrl = "index.php?action=EditView&module=Users&record={$this->_returnId}#tab5";

        if(isset($_REQUEST['return_module']) && $_REQUEST['return_module'] == 'Import') {
            $cancelUrl = "index.php?module=Import&action=Step1&import_module=". $_REQUEST['return_action'] . "&application=" . $_REQUEST['application'];
        }
         $this->ss->assign('cancelUrl', $cancelUrl);

        if($GLOBALS['current_user']->is_admin || empty($this->bean) || empty($this->bean->id) || $this->bean->isOwner($GLOBALS['current_user']->id)){
            if(!empty($this->bean) && empty($this->bean->id) && $this->_returnId != $GLOBALS['current_user']->id){
                $this->bean->assigned_user_id = $this->_returnId;
            }
            
            parent::display();
        } else {
        	ACLController::displayNoAccess();
        }
 	}
}

?>