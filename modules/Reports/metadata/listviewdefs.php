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




$listViewDefs['Reports'] = array(
    'NAME' => array(
        'width' => '40', 
        'label' => 'LBL_REPORT_NAME', 
        'customCode' => '<span id="obj_{$ID}"><a  href="index.php?action=ReportCriteriaResults&module=Reports&page=report&id={$ID}">{$NAME}</a></span>',
        'default' => true), 
    'MODULE' => array(
        'width' => '15',
        'label' => 'LBL_MODULE',
        'default' => true),
    'REPORT_TYPE_TRANS' => array(
        'width' => '15', 
        'label' => 'LBL_REPORT_TYPE',
        'default' => true,
        'orderBy' => 'report_type',
        'related_fields' => array('report_type'),
    ),
    'TEAM_NAME' => array(
        'width' => '2', 
        'label' => 'LBL_LIST_TEAM',
        'default' => false,
        'related_fields' => array('team_id'),
        'orderBy' => 'team_id'
        ),
    'ASSIGNED_USER_NAME' => array(
        'width' => '2', 
        'label' => 'LBL_LIST_ASSIGNED_USER',
        'module' => 'Employees',
        'id' => 'ASSIGNED_USER_ID',
        'default' => true,
        ),
        
     'IS_SCHEDULED' => array(
        'width' => '10',
        'label' => 'LBL_SCHEDULE_REPORT',
        'default' => true,
        'related_fields' => array('active', 'schedule_id'),
        'sortable' => false
      ),
    'LAST_RUN_DATE' => array(
        'width' => '15', 
        'label' => 'LBL_REPORT_LAST_RUN_DATE',
        'default' => true,
        'sortable' => true,
        'related_fields' => array('active', 'report_cache.date_modified'),
    ),
    'DATE_ENTERED' => array(
        'width' => '14',
        'orderBy' => 'saved_reports.date_entered',
        'sortOrder' => 'desc',
        'label' => 'LBL_DATE_ENTERED',
        'default' => true),

/*    'IS_PUBLISHED' => array(
        'width' => '2',
        'label' => 'LBL_LIST_PUBLISHED',
        'align'   => 'right',
        'default' => true),*/
);
?>
