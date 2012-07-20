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



/**
 * SugarFieldAddress.php
 * SugarFieldAddress translates and displays fields from a vardef definition into different formats
 * for EditViews and DetailViews.  A sample invocation from a Meta-Data file is as follows:
 * 
 *  array (
 * 	   'name' => 'primary_address_street',
 *	   'type' => 'address',
 *	   'displayParams'=>array('key'=>'primary'),
 *  ),
 * 
 * Where name is set to the field for ACL verification, type is set to 'address'
 * to override the default field type and the displayParams array includes the key
 * for the address field.  Assumptions are made that the vardefs.php contains address
 * elements with the corresponding names. There is the optional displayParam index
 * 'copy' that accepts as value the key of the other address fields.  In our
 * example we may enable copying from the primary address fields with:
 * 
 *  array (
 * 	   'name' => 'altaddress_street',
 *	   'type' => 'address',
 *	   'displayParams'=>array('key'=>'alt', 'copy'=>'primary'),
 *  ),
 * 
 */
require_once('include/SugarFields/Fields/Base/SugarFieldBase.php');
class SugarFieldAddress extends SugarFieldBase {

    function getDetailViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex) {
        $this->setup($parentFieldArray, $vardef, $displayParams, $tabindex);
        global $app_strings;
        if(!isset($displayParams['key'])) {
           $GLOBALS['log']->debug($app_strings['ERR_ADDRESS_KEY_NOT_SPECIFIED']);	
           $this->ss->trigger_error($app_strings['ERR_ADDRESS_KEY_NOT_SPECIFIED']);
           return;
        }
        
        //Allow for overrides.  You can specify a Smarty template file location in the language file.
        if(isset($app_strings['SMARTY_ADDRESS_DETAILVIEW'])) {
           $tplCode = $app_strings['SMARTY_ADDRESS_DETAILVIEW'];
           return $this->fetch($tplCode);	
        }
        
        return $this->fetch($this->findTemplate('DetailView'));
    }
    
    function getEditViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex) {
        $this->setup($parentFieldArray, $vardef, $displayParams, $tabindex);        
        global $app_strings;
        if(!isset($displayParams['key'])) {
           $GLOBALS['log']->debug($app_strings['ERR_ADDRESS_KEY_NOT_SPECIFIED']);	
           $this->ss->trigger_error($app_strings['ERR_ADDRESS_KEY_NOT_SPECIFIED']);
           return;
        }
        
        //Allow for overrides.  You can specify a Smarty template file location in the language file.
        if(isset($app_strings['SMARTY_ADDRESS_EDITVIEW'])) {
           $tplCode = $app_strings['SMARTY_ADDRESS_EDITVIEW'];
           return $this->fetch($tplCode);	
        }       

        return $this->fetch($this->findTemplate('EditView'));      
    }
    
}
?>
