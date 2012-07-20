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




class SugarWidgetFieldDatePicker extends SugarWidgetFieldDateTime
{
	function displayInput($layout_def)
    {
        global $timedate;

        $cal_dateformat = $timedate->get_cal_date_format();
        $LBL_ENTER_DATE = translate('LBL_ENTER_DATE', 'Charts');
        $jscalendarImage = SugarThemeRegistry::current()->getImageURL('jscalendar.gif');
        $value = $timedate->swap_formats($layout_def['input_name0'], $timedate->dbDayFormat, $timedate->get_date_format());
        $str = <<<EOHTML
<input onblur="parseDate(this, '{$cal_dateformat}');" class="text" name="{$layout_def['name']}" size='12' maxlength='10' id='{$layout_def['name']}' value='{$value}'>
<!--not_in_theme!--><img src="$jscalendarImage" alt="{$LBL_ENTER_DATE}" id="{$layout_def['name']}_trigger" align="absmiddle">
<script type="text/javascript">
Calendar.setup ({
    inputField : "{$layout_def['name']}", ifFormat : "{$cal_dateformat}", showsTime : false, button : "{$layout_def['name']}_trigger", singleClick : true, step : 1, weekNumbers:false
});
</script>
EOHTML;

        return $str;
    }
}

