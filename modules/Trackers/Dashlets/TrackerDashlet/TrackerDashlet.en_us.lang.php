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


$dashletStrings['TrackerDashlet'] = array('LBL_TITLE'            => 'Tracker Reports',
                                          'LBL_DESCRIPTION'      => 'A dashlet to run queries against Tracker data',
                                          'LBL_SAVING'           => 'Running Query ...',
                                          'LBL_SAVED'            => 'Query Complete',
                                          'LBL_CLEAR'            => 'Clear',
                                          'LBL_CLEAR_TOOLTIP'    => 'Clears the date field value',
                                          'LBL_CONFIGURE_TITLE'  => 'Title',
                                          'LBL_CONFIGURE_HEIGHT' => 'Height (1 - 300)',
										  'LBL_SELECT_QUERY'     => 'Select Query...',
										  'LBL_FILTER'              => 'Filter',
										  'LBL_FILTER_TOOLTIP'      => 'Filters by the value in the date field',
										  'LBL_SINCE'            => 'Since: ',
										  'LBL_CHOOSE_DATE_TOOLTIP' => 'For select reports, you can provide a date filter.' .
										                               '  The date value entered will replace the default date value for the report.' .
										                               '  For example, in the "My Activity (This Week)" report, the' .
										                               ' value will be used to display all records after the filter date' .
										                               ' instead of the default time period of one week.',
);