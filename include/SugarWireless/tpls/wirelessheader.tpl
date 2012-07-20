
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
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>{sugar_translate label='LBL_BROWSER_TITLE' module=''}</title>
<link rel="apple-touch-icon" href="{sugar_getimagepath file='sugar_icon.png'}" />
<link href="include/SugarWireless/css/wireless.css" type="text/css" rel="stylesheet">
<link media="only screen and (max-device-width: 480px)" href="include/SugarWireless/css/iphone.css" type= "text/css" rel="stylesheet">
<meta name="viewport" content="user-scalable=no, width=device-width">
<meta name="apple-touch-fullscreen" content="yes" />
</head>
<body>
{sugar_getimage name="company_logo" ext=".png" width="212" height="40" alt=$app_strings.LBL_COMPANY_LOGO other_attributes='border="0" id="companylogo" '}
<hr />
{if $WELCOME}
<div class="sec welcome" align="right">
<small>{sugar_translate label='NTC_WELCOME' module=''}, {$user_name} [<a href="index.php?module=Users&action=Logout">{sugar_translate label='LBL_LOGOUT' module=''}</a>]</small><br />
</div>
{/if}
