<?php
//FILE SUGARCRM flav=pro || flav=sales
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

require_once('include/MVC/View/views/view.quickcreate.php');
require_once('modules/Emails/EmailUI.php');

class EmailsViewQuickcreate extends ViewQuickcreate 
{
    /**
     * @see ViewQuickcreate::display()
     */
    public function display()
    {
        $userPref = $GLOBALS['current_user']->getPreference('email_link_type');
		$defaultPref = $GLOBALS['sugar_config']['email_default_client'];
		if($userPref != '')
			$client = $userPref;
		else
			$client = $defaultPref;
		
        if ( $client == 'sugar' ) {
            $eUi = new EmailUI();
            if(!empty($this->bean->id) && !in_array($this->bean->object_name,array('EmailMan')) ) {
                $fullComposeUrl = "index.php?module=Emails&action=Compose&parent_id={$this->bean->id}&parent_type={$this->bean->module_dir}";
                $composeData = array('parent_id'=>$this->bean->id, 'parent_type' => $this->bean->module_dir);
            } else {
                $fullComposeUrl = "index.php?module=Emails&action=Compose";
                $composeData = array('parent_id'=>'', 'parent_type' => '');
            }
            
            $j_quickComposeOptions = $eUi->generateComposePackageForQuickCreate($composeData, $fullComposeUrl); 
            $json_obj = getJSONobj();
            $opts = $json_obj->decode($j_quickComposeOptions);
            $opts['menu_id'] = 'dccontent';
             
            $ss = new Sugar_Smarty();
            $ss->assign('json_output', $json_obj->encode($opts));
            $ss->display('modules/Emails/templates/dceMenuQuickCreate.tpl');
        }
        else {
            $emailAddress = '';
            if(!empty($this->bean->id) && !in_array($this->bean->object_name,array('EmailMan')) ) {
                $emailAddress = $this->bean->emailAddress->getPrimaryAddress($this->bean);
            }
            echo "<script>document.location.href='mailto:$emailAddress';lastLoadedMenu=undefined;DCMenu.closeOverlay();</script>";
            die();
        }
    } 
}