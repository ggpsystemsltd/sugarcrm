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
 * DeleteTestCampaigns.php
 *
 * This is a class to encapsulate deleting test campaigns
 * @author Collin Lee
 */
class DeleteTestCampaigns {

/**
 * deleteTestRecords
 *
 * This method deletes the test records for a given Campaign instance
 * @param Campaign $focus The Campaign instance
 */
function deleteTestRecords($focus)
{
    if(empty($focus) || empty($focus->id))
    {
        return;
    }

    $res = $focus->db->query("SELECT DISTINCT campaign_log.related_id emailid, prospect_lists.id as listid FROM campaign_log
            JOIN prospect_lists on campaign_log.list_id = prospect_lists.id
            WHERE campaign_log.campaign_id = '{$focus->id}' AND prospect_lists.list_type='test'");
    $test_ids = array();
    $test_list_ids = array();
    while($row = $focus->db->fetchByAssoc($res)) {
       $test_ids[] = $row['emailid'];
       $test_list_ids[$row['listid']] = true;
    }
    $test_list_ids = array_keys($test_list_ids);
    unset($res);
    if(!empty($test_ids)) {
        $focus->db->query("UPDATE emails SET deleted=1 WHERE id IN ('".join("','", $test_ids)."')");
    }

    if(!empty($test_list_ids)) {
        $query = "DELETE FROM emailman WHERE campaign_id = '{$focus->id}' AND list_id IN ('".join("','", $test_list_ids)."')";
        $focus->db->query($query);

        $query = "UPDATE campaign_log SET deleted=1 WHERE campaign_id = '{$focus->id}' AND list_id IN ('".join("','", $test_list_ids)."')";

        $focus->db->query($query);
    }
}

}