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
<table class='edit view small' width="100%" border="0" cellspacing="1" cellpadding="0" >		
	<tr valign="top">
		<td width="35%">
			<table  border="0" cellspacing="2" cellpadding="0" >	
				<tr valign='top'>
					<td><img src="{$IMG}icon_ConnectorConfig.gif" name="connectorConfig" onclick="document.location.href='index.php?module=Connectors&action=ModifyProperties';"
						onMouseOver="document.connectorConfig.src='{$IMG}icon_ConnectorConfigOver.gif'"
						onMouseOut="document.connectorConfig.src='{$IMG}icon_ConnectorConfig.gif'"></td>
					<td>&nbsp;&nbsp;</td>
					<td><b>{$mod.LBL_MODIFY_PROPERTIES_TITLE}</b><br/>
						{$mod.LBL_MODIFY_PROPERTIES_DESC}
					</td>
				</tr>
				<tr>
					<td colspan=2>&nbsp;</td>
				</tr>
				<tr valign='top'>
					<td><img src="{$IMG}icon_ConnectorEnable.gif" name="enableImage" onclick="document.location.href='index.php?module=Connectors&action=ModifyDisplay';"
						onMouseOver="document.enableImage.src='{$IMG}icon_ConnectorEnableOver.gif'"
						onMouseOut="document.enableImage.src='{$IMG}icon_ConnectorEnable.gif'"></td>
					<td>&nbsp;&nbsp;</td>
					<td><b>{$mod.LBL_MODIFY_DISPLAY_TITLE}</b><br/>
						{$mod.LBL_MODIFY_DISPLAY_DESC}
					</td>
				</tr>			
			</table>
		</td>
		<td width="10%">&nbsp;</td>
		<td width="35%">
			<table  border="0" cellspacing="2" cellpadding="0">	   
				<tr valign='top'>
					<td><img src="{$IMG}icon_ConnectorMap.gif" name="connectorMapImg" onclick="document.location.href='index.php?module=Connectors&action=ModifyMapping';"
						onMouseOver="document.connectorMapImg.src='{$IMG}icon_ConnectorMapOver.gif'"
						onMouseOut="document.connectorMapImg.src='{$IMG}icon_ConnectorMap.gif'"></td>
					<td>&nbsp;&nbsp;</td>
					<td><b>{$mod.LBL_MODIFY_MAPPING_TITLE}</b><br/>
						{$mod.LBL_MODIFY_MAPPING_DESC}
					</td>
				</tr>

				<tr>
					<td colspan=2>&nbsp;</td>
				</tr>


				<tr valign='top'>
					<td>
					    <img src="{$IMG}icon_ConnectorSearchFields.gif" name="connectorSearchImg" onclick="document.location.href='index.php?module=Connectors&action=ModifySearch';"
						onMouseOver="document.connectorSearchImg.src='{$IMG}icon_ConnectorSearchFieldsOver.gif'"
						onMouseOut="document.connectorSearchImg.src='{$IMG}icon_ConnectorSearchFields.gif'">
				    </td>
					<td>&nbsp;&nbsp;</td>
					<td>
					    {* BEGIN SUGARCRM flav=pro || flav=sales ONLY *}
					    <b>{$mod.LBL_MODIFY_SEARCH_TITLE}</b><br/>
						{$mod.LBL_MODIFY_SEARCH_DESC}
						{* END SUGARCRM flav=pro || flav=sales ONLY *}
					</td>	
				</tr>

			</table>
		</td>				
		<td width="20%">&nbsp;</td>
	</tr>
</table>