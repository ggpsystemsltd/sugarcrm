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
{if !empty($FIELDS)}
<link rel="stylesheet" type="text/css" href="modules/ModuleBuilder/tpls/ListEditor.css" />
<h3>{sugar_translate label='LBL_FIELDS' module='ACLFields'}</h3>
<input type='hidden' name='flc_module' value='{$FLC_MODULE}'> 
<table  class='detail view' border='0' cellpadding=0 cellspacing = 1  width='100%'>
		{counter start=0 name='colCount' assign='colCount'}
		{foreach from=$FIELDS key="NAME" item="DEF"}
		
		{if ($colCount % 4 == 0 || $colCount == 0) }
			{if $colCount != 0}
				</tr>
			{/if}
			<tr>
		{/if}
			<td scope='row'>{sugar_translate label=$DEF.label module=$LBL_MODULE}{if $DEF.required}*{/if}
			{if count($DEF.fields) > 0}
			<a id="d_{$NAME}_anchor" class='link' onclick='toggleDisplay("d_{$NAME}")' href='javascript:void(0)'>[+]</a><div id='d_{$NAME}' style='display:none'>
				{foreach from=$DEF.fields key='subField' item='subLabel'}
				{sugar_translate label=$subLabel module=$FLC_MODULE}<br><span class='fieldValue'>[{$subField}]</span><br>
				{/foreach}
				</div>
			{/if}
			</td>
			
			<td>
					<div  style="display: none" id="{$DEF.key}">
						<select  name='flc_guid{$DEF.key}' id = 'flc_guid{$DEF.key}'onblur="document.getElementById('{$DEF.key}link').innerHTML=this.options[this.selectedIndex].text; aclviewer.toggleDisplay('{$DEF.key}');" >
							{if !empty($DEF.required)}
							{html_options options=$OPTIONS_REQUIRED selected=$DEF.aclaccess }
							{else}
							{html_options options=$OPTIONS selected=$DEF.aclaccess }
							{/if}
							
						</select>
					</div>
					<div  id="{$DEF.key}link" onclick="aclviewer.toggleDisplay('{$DEF.key}')">
						{if !empty($OPTIONS[$DEF.aclaccess])}
							{$OPTIONS[$DEF.aclaccess]}
						{else}
							Not Defined
						{/if}
					</div>
		</td>
		{counter name='colCount'}
		{/foreach}
		</tr>	
</table>
{/if}
	