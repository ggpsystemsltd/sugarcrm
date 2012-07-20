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

<table width="100%" cellspacing="0" cellpadding="0" border="0" style="border-top: 0px none; margin-bottom: 4px;">
<tr>
<td>
<!-- BEGIN PAGE RENDERING -->
	<table cellspacing='5' cellpadding='0' border='0' valign='top' width='100%'>
	{if $numCols > 1}
 	<tr>
 		{if $numCols > 2}
	 	<td>

		</td>
	
		<td rowspan="3">
				{sugar_getimage alt=$app_strings.LBL_BLANK name="blank" ext=".gif" width="15" height="1" other_attributes='border="0" '}
		</td>
		{/if}
		{if $numCols > 1}
		<td>

		</td>
		<td rowspan="3">
				{sugar_getimage alt=$app_strings.LBL_BLANK name="blank" ext=".gif" width="15" height="1" other_attributes='border="0" '}
		</td>
		{/if}	
	</tr>
	{/if}
	<tr>
	{counter assign=hiddenCounter start=0 print=false}
	{foreach from=$columns key=colNum item=data}
	<td valign='top' width={$data.width}>
		<ul class='noBullet' id='col_{$selectedPage}_{$colNum}'>
			<li id='page_{$selectedPage}_hidden{$hiddenCounter}b' style='height: 5px' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
	        {foreach from=$data.dashlets key=id item=dashlet}		
			<li class='noBullet' id='dashlet_{$id}'>
				<div id='dashlet_entire_{$id}' class='dashletPanel'>
					{$dashlet.script}
					{$dashlet.displayHeader}
					{$dashlet.display}
					{$dashlet.displayFooter}
			    </div>
			</li>
			<script>
				SUGAR.mySugar.attachToggleToolsetEvent('{$id}');
			</script>
			{/foreach}
			<li id='page_{$selectedPage}_hidden{$hiddenCounter}' style='height: 5px' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
		</ul>
	</td>
	{counter}
	{/foreach}
	</tr>
	</table>
<!-- END PAGE RENDERING -->
</td>
</tr>
</table>
<script>
	{if !$lock_homepage}
	SUGAR.mySugar.attachDashletCtrlEvent();
	{/if}
</script>
