<?PHP
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


class EAPMController extends SugarController
{
    /**
     * API implementation
     * @var ExternalAPIPlugin
     */
    protected $api;

    var $action_remap = array('detailview'=>'editview', 'DetailView'=>'EditView');

    var $admin_actions = array('listview', 'index');

	public function process() {
		if(!is_admin($GLOBALS['current_user']) && in_array(strtolower($this->action), $this->admin_actions)) {
			$this->hasAccess = false;
		}
		parent::process();
	}

    protected function failed($error)
    {
        SugarApplication::appendErrorMessage($error);
        $GLOBALS['log']->error("Login error: $error");
        $url = 'index.php?module=EAPM&action=EditView&record='.$this->bean->id;

        if($this->return_module == 'Import'){
            $url .= "&application={$this->bean->application}&return_module={$this->return_module}&return_action={$this->return_action}";
        }
        return $this->set_redirect($url);
    }

    public function pre_save()
    {
        parent::pre_save();
        $this->api = ExternalAPIFactory::loadAPI($this->bean->application,true);
        if(empty($this->api)) {
            return $this->failed(translate('LBL_AUTH_UNSUPPORTED', $this->bean->module_dir));
        }
        if(empty($this->bean->id)){
            $eapmBean = EAPM::getLoginInfo($this->bean->application,true);
            if($eapmBean){
                SugarApplication::appendErrorMessage(translate('LBL_APPLICATION_FOUND_NOTICE', $this->bean->module_dir));
                $this->bean->id = $eapmBean->id;
            }
        }
        $this->bean->validated = false;
        $this->bean->save_cleanup();
        $this->api->loadEAPM($this->bean);
    }

    protected function post_save()
    {
        if(!$this->bean->deleted) {
            // do not load bean here since password is already encoded
            if ( $this->api->authMethod != 'oauth' ) {
                // OAuth beans have to be handled specially.
                
                $reply = $this->api->checkLogin();
                if ( !$reply['success'] ) {
                    return $this->failed(translate('LBL_AUTH_ERROR', $this->bean->module_dir));
                } else {
                    $this->bean->validated();
                }
            }
        }
        if($this->return_module == 'Users'){
            $this->return_action = 'EditView';
        }
        parent::post_save();

        if($this->return_module == 'Import'){
            $this->set_redirect("index.php?module=Import&action=Step1&import_module=". $this->return_action . "&application=" . $this->bean->application);
        }
        // Override the redirect location to add the hash
        $this->redirect_url = $this->redirect_url.'#tab5';
        if ( $this->api->authMethod == 'oauth' && !$this->bean->deleted ) {
            // It's OAuth, we have to handle this specially.
            // We need to create a new window to handle the OAuth, and redirect this window back to the edit view
            // So we will handle that in javascript.
            $popup_warning_msg = string_format($GLOBALS['mod_strings']['LBL_ERR_POPUPS_DISABLED'], array($_SERVER['HTTP_HOST']) );
            echo('<script src="modules/EAPM/EAPMEdit.js" type="text/javascript"></script><script type="text/javascript">EAPMPopupAndRedirect("index.php?module=EAPM&action=oauth&record='.$this->bean->id.'", "'.$this->redirect_url.'", \''.$popup_warning_msg.'\'); </script>');

            // To prevent the normal handler from issuing a header call and destroying our neat little javascript we'll
            // end right here.
            sugar_die('');
        } else {
            return;
        }
    }

    protected function action_oauth()
    {
        if(empty($this->bean->id)) {
            return $this->set_redirect('index.php');
        }
		if(!$this->bean->ACLAccess('save')){
			ACLController::displayNoAccess(true);
			sugar_cleanup(true);
			return true;
		}
        if(empty($_REQUEST['oauth_error'])) {
            $this->api = ExternalAPIFactory::loadAPI($this->bean->application,true);
            $reply = $this->api->checkLogin($this->bean);
            if ( !$reply['success'] ) {
                return $this->failed(translate('LBL_AUTH_ERROR', $this->bean->module_dir));
            } else {
                $this->bean->validated();
            }
        }
        
        // This is a tweak so that we can automatically close windows if requested by the external account system
        if ( isset($_REQUEST['closeWhenDone']) && $_REQUEST['closeWhenDone'] == 1 ) {
            if(!empty($_REQUEST['callbackFunction']) && !empty($_REQUEST['application'])){
                $js = '<script type="text/javascript">window.opener.' . $_REQUEST['callbackFunction'] . '("' . $_REQUEST['application'] . '"); window.close();</script>';
            }else if(!empty($_REQUEST['refreshParentWindow'])){
                $js = '<script type="text/javascript">window.opener.location.reload();window.close();</script>';
            }else{
                $js = '<script type="text/javascript">window.close();</script>';
            }
            echo($js);
            return;
        }            
        
        // redirect to detail view, as in save
        return parent::post_save();
    }

    protected function pre_QuickSave(){
        if(!empty($_REQUEST['application'])){
            $eapmBean = EAPM::getLoginInfo($_REQUEST['application'],true);
            if (!$eapmBean) {
                $this->bean->application = $_REQUEST['application'];
                $this->bean->assigned_user_id = $GLOBALS['current_user']->id;
            }else{
                $this->bean = $eapmBean;
            }
            $this->pre_save();
                    
        }else{
            sugar_die("Please pass an application name.");
        }
    }
    
	public function action_QuickSave(){
        $this->api = ExternalAPIFactory::loadAPI($this->bean->application,true);
        $this->action_save();

        if ( $this->api->authMethod == 'oauth' ) {
            $this->action_oauth();
        }
	}

    protected function post_QuickSave(){
        $this->post_save();
    }

    protected function pre_Reauthenticate(){
        $this->pre_save();
    }

    protected function action_Reauthenticate(){
        if ( $this->api->authMethod == 'oauth' ) {
            // OAuth beans have to be handled specially.
            
            $reply = $this->api->checkLogin();
            if ( !$reply['success'] ) {
                return $this->failed(translate('LBL_AUTH_ERROR', $this->bean->module_dir));
            } else {
                $this->bean->validated();
            }
        } else {
            // Normal auth methods go through this.
            $this->action_save();
        }
    }

    protected function post_Reauthenticate(){
        $this->post_save();
    }

    protected function action_FlushFileCache()
    {
        $api = ExternalAPIFactory::loadAPI($_REQUEST['api']);
        if ( $api == false ) {
            echo 'FAILED';
            return;
        }

        if ( method_exists($api,'loadDocCache') ) {
            $api->loadDocCache(true);
        }

        echo 'SUCCESS';
    }

    protected function remapAction() {
        if ( $this->do_action == 'DetailView' ) {
            $this->do_action = 'EditView';
            $this->action = 'EditView';
        }
        
        parent::remapAction();
    }

}