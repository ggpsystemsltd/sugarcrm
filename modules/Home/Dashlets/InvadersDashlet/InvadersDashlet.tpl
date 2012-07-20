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
<style>
div.playArea {ldelim}
    text-align:left; 
    overflow: hidden; 
    background-color: black; 
    background-image: url('modules/Home/Dashlets/InvadersDashlet/sprites/bg.png'); 
    width: 400px; 
    height:300px;
    position: relative;
    overflow: hidden;
{rdelim}
</style>
<div align="center">
<div class="playArea">
    <img id="player" style="position: absolute; top:270px; left:134px"
        src="modules/Home/Dashlets/InvadersDashlet/sprites/player.png" width="32px" height="32px"/>
    <img id="shot"   style="position: absolute; top:245px; display: none"
        src="modules/Home/Dashlets/InvadersDashlet/sprites/cube.png" width="16px" height="16px"/>
    
    <div id="aliens" style="position: absolute; left:0px; width:172px;">
		<table cellpadding="0" cellspacing="2"><tbody>
		<tr>
			<td id="a00" width="32" height="14">&nbsp;</td>
			<td id="a10" width="32" height="14">&nbsp;</td>
			<td id="a20" width="32" height="14">&nbsp;</td>
			<td id="a30" width="32" height="14">&nbsp;</td>
			<td id="a40" width="32" height="14">&nbsp;</td>
		</tr>
		<tr>
			<td id="a01" width="32" height="14">&nbsp;</td>
			<td id="a11" width="32" height="14">&nbsp;</td>
			<td id="a21" width="32" height="14">&nbsp;</td>
			<td id="a31" width="32" height="14">&nbsp;</td>
			<td id="a41" width="32" height="14">&nbsp;</td>
		</tr>
		<tr>
			<td id="a02" width="32" height="14">&nbsp;</td>
			<td id="a12" width="32" height="14">&nbsp;</td>
			<td id="a22" width="32" height="14">&nbsp;</td>
			<td id="a32" width="32" height="14">&nbsp;</td>
			<td id="a42" width="32" height="14">&nbsp;</td>
		</tr>
		<tr>
			<td id="a03" width="32" height="14">&nbsp;</td>
			<td id="a13" width="32" height="14">&nbsp;</td>
			<td id="a23" width="32" height="14">&nbsp;</td>
			<td id="a33" width="32" height="14">&nbsp;</td>
			<td id="a43" width="32" height="14">&nbsp;</td>
		</tr>
		</tbody></table>
	</div>
	<div align="center" id="startScreen" style="position: relative; top: 150px;" onclick="InvadersGame.reset()">
		<a href="javascript:void(0);" class="otherTabLink" style="text-decoration:none;">
		    <h1 style="color: #FFF;" id="messageText">{$dashletStrings.LBL_START}</h1>
		</a>
	</div>
</div>
</div>
