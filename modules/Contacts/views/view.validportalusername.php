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
 * ContactsViewValidPortalUsername.php
 * 
 * This class overrides SugarView and provides an implementation for the ValidPortalUsername
 * method used for checking whether or not an existing portal user_name has already been assigned.
 * We take advantage of the MVC framework to provide this action which is invoked from
 * a javascript AJAX request.
 * 
 * @author Collin Lee
 * */
 
require_once('include/MVC/View/SugarView.php');

class ContactsViewValidPortalUsername extends SugarView 
{
 	/**
     * @see SugarView::process()
     */
    public function process() 
 	{
		$this->display();
 	}

 	/**
     * @see SugarView::display()
     */
    public function display()
    {
        if (!empty($_REQUEST['portal_name'])) {
            $portalUsername = $this->bean->db->quote($_REQUEST['portal_name']);
            $result = $this->bean->db->query("Select count(id) as total from contacts where portal_name = '$portalUsername' and deleted='0'");
            $total = 0;
            while($row = $this->bean->db->fetchByAssoc($result))
                $total = $row['total'];
            echo $total;
        }
        else
           echo '0';
 	}	
}