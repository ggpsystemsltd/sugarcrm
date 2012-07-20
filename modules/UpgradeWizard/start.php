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

 * Description:
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc. All Rights
 * Reserved. Contributor(s): ______________________________________..
 * *******************************************************************************/
logThis('-----------------------------------------------------------------------------');
logThis('Upgrade started. At start.php');

//set the upgrade progress status.
set_upgrade_progress('start','in_progress');

unlinkUWTempFiles();
resetUwSession();

if(isset($_REQUEST['showUpdateWizardMessage']) && $_REQUEST['showUpdateWizardMessage'] == true) {
	// set a flag to skip the upload screen
	$_SESSION['skip_zip_upload'] = true;

	$newUWMsg =<<<eoq
	<table cellspacing="0" cellpadding="3" border="0">
		<tr>
			<th>
				{$mod_strings['LBL_UW_START_UPGRADED_UW_TITLE']}
			</th>
		</tr>
		<tr>
			<td>
				{$mod_strings['LBL_UW_START_UPGRADED_UW_DESC']}
			</td>
		</tr>
	</table>
eoq;
	echo $newUWMsg;
}


$uwMain =<<<eoq
<table cellpadding="3" cellspacing="0" border="0">
	<tr>
		<th align="left">
			{$mod_strings['LBL_UW_TITLE_START']}
		</th>
	</tr>
	<tr>
		<td align="left">
			<p>
		    {$mod_strings['LBL_UW_START_DESC']}
			</p>
			<BR>
			<p>
			<span class="error">
			{$mod_strings['LBL_UW_START_DESC2']}
			</span>
			</p>
			<BR>
			<p>
			{$mod_strings['LBL_UW_START_DESC3']}
			</p>
			</td>
	</tr>
</table>
<div id="upgradeDiv" style="display:none">
    <table cellspacing="0" cellpadding="0" border="0">
        <tr><td>
           <p><!--not_in_theme!--><img src='modules/UpgradeWizard/processing.gif' alt='Processing'> <br></p>
        </td></tr>
     </table>
 </div>
eoq;

$showBack		= false;
$showCancel		= true;
$showRecheck	= false;
$showNext		= true;

$stepBack		= 0;
$stepNext		= 1;
$stepCancel	= 0;
$stepRecheck	= 0;

?>
