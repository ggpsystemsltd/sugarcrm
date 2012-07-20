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


class OAuthTokensController extends SugarController
{
	protected function action_delete()
	{
	    global $current_user;
		//do any pre delete processing
		//if there is some custom logic for deletion.
		if(!empty($_REQUEST['record'])){
			if(!is_admin($current_user) && $this->bean->assigned_user_id != $current_user->id) {
                ACLController::displayNoAccess(true);
                sugar_cleanup(true);
			}
			$this->bean->mark_deleted($_REQUEST['record']);
        }else{
			sugar_die("A record number must be specified to delete");
		}
	}

	protected function post_delete()
	{
        if(!empty($_REQUEST['return_url'])){
            $_REQUEST['return_url'] =urldecode($_REQUEST['return_url']);
            $this->redirect_url = $_REQUEST['return_url'];
        } else {
            parent::post_delete();
        }
	}
}