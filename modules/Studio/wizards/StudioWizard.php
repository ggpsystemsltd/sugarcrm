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





class StudioWizard{
    var $tplfile = 'modules/Studio/wizards/tpls/wizard.tpl';
    var $wizard = 'StudioWizard';
    var $status = '';
    var $assign = array();
    
    function welcome(){
        return $GLOBALS['mod_strings']['LBL_SW_WELCOME'];
    }

    function options(){
    	$options = array('SelectModuleWizard'=>$GLOBALS['mod_strings']['LBL_SW_EDIT_MODULE'], 
    	                 'EditDropDownWizard'=>$GLOBALS['mod_strings']['LBL_SW_EDIT_DROPDOWNS'],
    	                 'RenameTabs'=>$GLOBALS['mod_strings']['LBL_SW_RENAME_TABS'],
    	                 'ConfigureTabs'=>$GLOBALS['mod_strings']['LBL_SW_EDIT_TABS'],
    	                 'ConfigureGroupTabs'=>$GLOBALS['mod_strings']['LBL_SW_EDIT_GROUPTABS'],
    	                 'Portal'=>$GLOBALS['mod_strings']['LBL_SW_EDIT_PORTAL'],
				         'Workflow'=>$GLOBALS['mod_strings']['LBL_SW_EDIT_WORKFLOW'],
				         'RepairCustomFields'=>$GLOBALS['mod_strings']['LBL_SW_REPAIR_CUSTOMFIELDS'],
				         'MigrateCustomFields'=>$GLOBALS['mod_strings']['LBL_SW_MIGRATE_CUSTOMFIELDS'],

        
        );
    	if(!empty($GLOBALS['license']->settings['license_num_portal_users'])){
        	$options['SugarPortal']=$GLOBALS['mod_strings']['LBL_SW_SUGARPORTAL'];
        }
        return $options;
        
        
    }
    function back(){}
    function process($option){
        switch($option)
        {
            case 'SelectModuleWizard':
                require_once('modules/Studio/wizards/'. $option . '.php');
                $newWiz = new $option();
                $newWiz->display();
                break;
            case 'EditDropDownWizard':
                require_once('modules/Studio/wizards/'. $option . '.php');
                $newWiz = new $option();
                $newWiz->display();
                break;
            case 'RenameTabs':
                require_once('modules/Studio/wizards/RenameModules.php');
                $newWiz = new RenameModules();
                $newWiz->process();
                break; 
            case 'ConfigureTabs':
                header('Location: index.php?module=Administration&action=ConfigureTabs');
                sugar_cleanup(true); 
            case 'ConfigureGroupTabs':
                require_once('modules/Studio/TabGroups/EditViewTabs.php');
                break;
            case 'Workflow':
                header('Location: index.php?module=WorkFlow&action=ListView');
                sugar_cleanup(true);
            case 'Portal':
                header('Location: index.php?module=iFrames&action=index');
                sugar_cleanup(true);
            case 'RepairCustomFields':
            	header('Location: index.php?module=Administration&action=UpgradeFields');
            	sugar_cleanup(true);
            case 'MigrateCustomFields':
            	header('LOCATION: index.php?module=Administration&action=Development');
            	sugar_cleanup(true);
            case 'SugarPortal':
            	header('LOCATION: index.php?module=Studio&action=Portal');
            	sugar_cleanup(true);
            case 'Classic':
                header('Location: index.php?module=DynamicLayout&action=index');
                sugar_cleanup(true);
            default:
                $this->display();
        }
    }
    function display($error = ''){
       echo $this->fetch($error );
    }
    
    function fetch($error = ''){
    	 global $mod_strings;
        echo getClassicModuleTitle('StudioWizard', array($mod_strings['LBL_MODULE_TITLE']), false);
        $sugar_smarty = new Sugar_Smarty();
        $sugar_smarty->assign('welcome', $this->welcome());
        $sugar_smarty->assign('options', $this->options());
        $sugar_smarty->assign('MOD', $GLOBALS['mod_strings']);
        $sugar_smarty->assign('option', (!empty($_REQUEST['option'])?$_REQUEST['option']:''));
        $sugar_smarty->assign('wizard',$this->wizard);
         $sugar_smarty->assign('error',$error);
        $sugar_smarty->assign('status', $this->status);
        $sugar_smarty->assign('mod', $mod_strings);
        foreach($this->assign as $name=>$value){
            $sugar_smarty->assign($name, $value);
        }
       return  $sugar_smarty->fetch($this->tplfile);
    }

}
?>
