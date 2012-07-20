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
 * FormBase.php
 *
 * @author Collin Lee
 *
 * This is an abstract class to provide common functionality across the form base code used in the application.
 *
 * @see LeadFormBase.php, ContactFormBase.php, MeetingFormBase, CallFormBase.php
 */

abstract class FormBase {


/**
 * isSaveFromDCMenu
 *
 * This is a function to help assist in determining if a save operation has been performed from the DCMenu (the shortcut bar
 * up top available for most themes).
 *
 * @return bool Boolean value indicating whether or not the save operation was triggered from DCMenu
 */
protected function isSaveFromDCMenu()
{
    return (isset($_POST['from_dcmenu']) && $_POST['from_dcmenu']);
}


/**
 * isEmptyReturnModuleAndAction
 *
 * This is a function to help assist in determining if a save operation has been performed without a return module and action specified.
 * This will likely be the case where we use AJAX to change the state of a record, but wish to keep the user remaining on the same view.
 * For example, this is true when closing Calls and Meetings from dashlets or from from subpanels.
 *
 * @return bool Boolean value indicating whether or not a return module and return action are specified in request
 */
protected function isEmptyReturnModuleAndAction()
{
    return empty($_POST['return_module']) && empty($_POST['return_action']);
}


}
 
