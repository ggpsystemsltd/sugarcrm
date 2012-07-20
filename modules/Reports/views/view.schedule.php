<?php
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



class ViewSchedule extends SugarView
{
    function display ()
    {
        global $mod_strings,$timedate,$app_strings;

        include_once('modules/Reports/schedule/save_schedule.php');
        $smarty = new Sugar_Smarty();
        $smarty->assign('MOD',$mod_strings);
        $smarty->assign('APP',$app_strings);
        $smarty->assign('PAGE_TITLE',getClassicModuleTitle($mod_strings['LBL_MODULE_NAME'], array($mod_strings['LBL_SCHEDULE_EMAIL']),false));
        $smarty->assign('STYLESHEET',SugarThemeRegistry::current()->getCSS());
        $smarty->assign("CALENDAR_LANG", substr($GLOBALS['current_language'], 0, 2) ) ;
        $smarty->assign("CALENDAR_DATEFORMAT", $timedate->get_cal_date_format());
        $smarty->assign("PRINT_URL", "index.php?".$GLOBALS['request_string']);
        $smarty->assign("RECORD", $_REQUEST['id']);

        $cache_dir = !empty($GLOBALS['sugar_config']['cache_dir']) ? rtrim($GLOBALS['sugar_config']['cache_dir'], '/\\') : 'cache';
        $smarty->assign('CACHE_DIR', $cache_dir);

        $refreshPage = (isset($_REQUEST['refreshPage']) ? $_REQUEST['refreshPage'] : "true");
        $smarty->assign("REFRESH_PAGE", $refreshPage);
        $time_interval_select = translate('DROPDOWN_SCHEDULE_INTERVALS', 'Reports');
        $time_format = $timedate->get_user_time_format();
        $smarty->assign("TIME_FORMAT", $time_format);
        $smarty->assign("TIMEDATE_JS", self::getJavascriptValidation());
        require_once('modules/Reports/schedule/ReportSchedule.php');
        $rs = new ReportSchedule();
        $schedule = $rs->get_report_schedule_for_user($_REQUEST['id']);
        if($schedule)
        {
        	$smarty->assign('SCHEDULE_ID', $schedule['id']);
        	$smarty->assign('DATE_START',$timedate->to_display_date_time($schedule['date_start'],true));

        	if($schedule['active'])
        		$smarty->assign('SCHEDULE_ACTIVE_CHECKED', 'checked');

        	$smarty->assign('NEXT_RUN', $timedate->to_display_date_time($schedule['next_run']));
        	$smarty->assign('TIME_INTERVAL_SELECT', get_select_options_with_id($time_interval_select,$schedule['time_interval'] ));
        	$smarty->assign('SCHEDULE_TYPE',$schedule['schedule_type']);
        }
        else
        {
        	$smarty->assign('NEXT_RUN',$mod_strings['LBL_NONE']);
        	$smarty->assign('TIME_INTERVAL_SELECT', get_select_options_with_id($time_interval_select, ''));
        	if(isset($_REQUEST['schedule_type']) && $_REQUEST['schedule_type']!="")
            	$smarty->assign('SCHEDULE_TYPE',$_REQUEST['schedule_type']);
        }


        $smarty->assign('CURRENT_LANGUAGE', $GLOBALS['current_language']);
        $smarty->assign('JS_VERSION',  $GLOBALS['js_version_key']);
        $smarty->assign('JS_CUSTOM_VERSION', $GLOBALS['sugar_config']['js_custom_version']);
        $smarty->assign('JS_LANGUAGE_VERSION',  $GLOBALS['sugar_config']['js_lang_version']);

        //$this->_displayJavascript();
        $html = $smarty->fetch('modules/Reports/tpls/AddSchedule.tpl');
        echo $html ;
    }
}