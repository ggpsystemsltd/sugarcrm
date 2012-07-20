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
<img
	id="img_{$vardef.name}" 
	name="img_{$vardef.name}" 
	{if empty($vardef.value)}
	   src='' 	
	{else}
	   src='index.php?entryPoint=download&id={$vardef.value}&type=SugarFieldImage&isTempFile=1'
	{/if}	
	style='
		{if empty($vardef.value)}
			display:	none;
		{/if}
		{if $vardef.border eq ""}
			border: 0; 
		{else}
			border: 1px solid black; 
		{/if}
		{if $vardef.width eq ""}
			width: auto;
		{else}
			width: {$vardef.width}px;
		{/if}
		{if $vardef.height eq ""}
			height: auto;
		{else}
			height: {$vardef.height}px;
		{/if}
		'		
/>