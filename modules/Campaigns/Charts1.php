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

/*********************************************************************************

* Description:  Includes the functions for Customer module specific charts.
********************************************************************************/
//todo: experimental class for chart data handling..not used in the application at this time.



require_once('include/charts/Charts.php');




class charts {

    /* @function:
     *
     * @param array targets: translated list of all activity types, targeted, bounced etc..
     * @param string campaign_id: chart for this campaign.
     */
    function campaign_response_chart($targets,$campaign_id) {

        $focus = new Campaign();
        $leadSourceArr = array();

        $query = "SELECT activity_type,target_type, count(*) hits ";
        $query.= " FROM campaign_log ";
        $query.= " WHERE campaign_id = '$campaign_id' AND archived=0 AND deleted=0";
        $query.= " GROUP BY  activity_type, target_type";
        $query.= " ORDER BY  activity_type, target_type";

        $result = $focus->db->query($query);
        while($row = $focus->db->fetchByAssoc($result, false)) {

            if (isset($leadSourceArr[$row['activity_type']]['value'])) {
                $leadSourceArr[$row['activity_type']]['value']=0;
            }

            $leadSourceArr[$row['activity_type']]['value']=  $leadSourceArr[$row['activity_type']]['value'] + $row['hits'];

            if (!empty($row['target_type'])) {
                $leadSourceArr[$row['activity_type']]['bars'][$row['target_type']]['value']=$row['hits'];
            }
        }

        foreach ($targets as $key=>$value) {
            if (!isset($leadSourceArr[$key])) {
                $leadSourceArr[$key]['value']=0;
            }
        }

        //use the new template.
        $xtpl=new XTemplate ('modules/Campaigns/chart.tpl');
        $xtpl->assign("GRAPHTITLE",'Campaign Response by Recipient Activity');
        $xtpl->assign("Y_DEFAULT_ALT_TEXT",'Rollover a bar to view details.');

        //process rows
        foreach ($leadSourceArr as $key=>$values) {
            if (isset($values['bars'])) {
                foreach ($values['bars'] as $bar_id=>$bar_value) {
                    $xtpl->assign("Y_BAR_ID",$bar_id);
                }
            }

        }
    }
    }// end charts class
?>
