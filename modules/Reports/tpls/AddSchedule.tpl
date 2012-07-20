{*
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

 *}
 
{$PAGE_TITLE}
<head>
<title>{$MOD.LBL_SCHEDULE_EMAIL}</title>

{$STYLESHEET}

<script type="text/javascript" src='{sugar_getjspath file="include/javascript/sugar_3.js"}'></script>
<script type="text/javascript" src='{sugar_getjspath file="$CACHE_DIR/include/javascript/sugar_grp1_yui.js"}'></script>
<script type="text/javascript" src='{sugar_getjspath file="include/javascript/calendar.js"}'></script>
<script type="text/javascript" src='{sugar_getjspath file="$CACHE_DIR/include/javascript/sugar_grp1.js"}'></script>
<script type="text/javascript" src='{sugar_getjspath file="include/SugarFields/Fields/Datetimecombo/Datetimecombo.js"}'></script>
<script type="text/javascript" src="{$CACHE_DIR}/jsLanguage/{$CURRENT_LANGUAGE}.js?s={$JS_VERSION}&c={$JS_CUSTON_VERSION}&j={$JS_LANGUAGE_VERSION}"></script>
</head>
<body class='tabForm'>
<form action='index.php' name='add_schedule' method='POST'>
<table  width='100%'  id='schedule_table' border='0'>
<tr>
    <td scope="row" id="date_start_label" ><slot>{$MOD.LBL_START_DATE}: </slot></td>
    <td ><slot>
        <table  cellpadding="0" cellspacing="0">
            <tr>
                <td nowrap><input name='schedule_date_start' id='date_start_date' onchange="parseDate(this, '{$CALENDAR_DATEFORMAT}');combo_date_start.update();" tabindex='1' size='11' maxlength='10' type="text" disabled="">
                            <img src="index.php?entryPoint=getImage&themeName={$THEME}&imageName=jscalendar.gif" alt="{$CALENDAR_DATEFORMAT}"  id="jscal_trigger" align="absmiddle" >&nbsp;
                            <input type="hidden" id="date_start" name="date_start" value="{$DATE_START}">
                            <span id="schedule_time_section"></span>
                </td>
           </tr>
           <tr>
                <td nowrap><span class="dateFormat">{$USER_DATEFORMAT}</span>
                </td>
          </tr>
        </table></slot>
    </td>
    <td scope="row" ><slot>{$MOD.LBL_SCHEDULE_ACTIVE}: </td>
    <td ><slot><input type='checkbox' class="checkbox" name='schedule_active' id='schedule_active' {$SCHEDULE_ACTIVE_CHECKED}></slot></td>
</tr>
<tr>
    <td scope="row"><slot>{$MOD.LBL_TIME_INTERVAL}: </slot></td>
    <td ><slot><select name='schedule_time_interval' id='schedule_time_interval'>{$TIME_INTERVAL_SELECT}</select></slot></td>
    <td scope="row"><slot>{$MOD.LBL_NEXT_RUN}:</slot></td>
    <td ><slot>{$NEXT_RUN}</slot></td>
</tr>
<tr>
<td scope="row">&nbsp; </td>
<td >&nbsp;</td>
<td scope="row">&nbsp;</td>
<td ><input class="button" type='submit' name='update_schedule' value='{$MOD.LBL_UPDATE_SCHEDULE}' onclick="return check_form('add_schedule');"></td>
</tr>
<tr><td height='100%'></td></tr>
</table>
<input type='hidden' name='schedule_id' value='{$SCHEDULE_ID}'>
<input type='hidden' name='save_schedule_msi' value='true'>
<input type='hidden' name='schedule_type' value='{$SCHEDULE_TYPE}'>
<input type='hidden' name='refreshPage' value='{$REFRESH_PAGE}'>
<input type='hidden' name='module' value='Reports'>
<input type='hidden' name='action' value='add_schedule'>
<input type='hidden' name='to_pdf' value='true'>
<input type='hidden' name='id' value='{$RECORD}'>


</form>

<script type="text/javascript">

var combo_date_start = new Datetimecombo("{$DATE_START}", "date_start", "{$TIME_FORMAT}", "", '', '', true);
text = combo_date_start.html(false);
document.getElementById('schedule_time_section').innerHTML = text;
eval(combo_date_start.jsscript(''));

function update_date_start_available() {ldelim}
      YAHOO.util.Event.onAvailable("date_start_date", this.handleOnAvailable, this); 
{rdelim}

update_date_start_available.prototype.handleOnAvailable = function(me) 
{ldelim}
	Calendar.setup ({ldelim}
	onClose : update_date_start,
	inputField : "date_start_date",
	ifFormat : "{$CALENDAR_DATEFORMAT}",
	daFormat : "{$CALENDAR_DATEFORMAT}",
	button : "jscal_trigger",
	singleClick : true,
	step : 1,
	weekNumbers:false
	{rdelim});
	
	//Call update for first time to round hours and minute values
	combo_date_start.update();
{rdelim}

var obj_date_start = new update_date_start_available();

addToValidate('add_schedule',"date_start_date",'date',false,"Start Date");
addToValidateBinaryDependency('add_schedule',"date_start_hours", 'alpha', false, "{$APP.ERR_MISSING_REQUIRED_FIELDS} {$APP.LBL_HOURS}" ,"date_start_date");
addToValidateBinaryDependency('add_schedule', "date_start_minutes", 'alpha', false, "{$APP.ERR_MISSING_REQUIRED_FIELDS} {$APP.LBL_MINUTES}" ,"date_start_date");
addToValidateBinaryDependency('add_schedule', "date_start_meridiem", 'alpha', false, "{$APP.ERR_MISSING_REQUIRED_FIELDS} {$APP.LBL_MERIDIEM}","date_start_date");
</script>
{$TIMEDATE_JS}
</body>