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
<iframe id="yui-history-iframe" src="index.php?entryPoint=getImage&imageName=sugar-yui-sprites-grey.png" title="index.php?entryPoint=getImage&imageName=sugar-yui-sprites-grey.png"></iframe>
<input id="yui-history-field" type="hidden"> 
<div class='ytheme-gray' id='mblayout' style="position:relative; height:0px; overflow:visible;">
</div>
<div id='mbcenter'>
<div id='mbtabs'></div>
{$CENTER}
</div>

<div id='mbeast' class="x-layout-inactive-content">
{$PROPERTIES}
</div>
<div id='mbeast2' class="x-layout-inactive-content">
</div>
<div id='mbhelp' class="x-hidden"></div>
<div id='mbwest' class="x-hidden">
<div id='package_tree' class="x-hidden"></div>
{$TREE}
</div>
<div id='mbsouth' class="x-hidden">
</div>
{$tiny}
<script>
ModuleBuilder.setMode('{$TYPE}');
closeMenus();
{literal}
//document.getElementById('HideHandle').parentNode.style.display = 'none';
var MBLoader = new YAHOO.util.YUILoader({
    require : ["layout", "element", "tabview", "treeview", "history", "cookie", "sugarwidgets"],
    loadOptional: true,
    skin: { base: 'blank', defaultSkin: '' },
	onSuccess: ModuleBuilder.init,
    allowRollup: true,
    base: "include/javascript/yui/build/"
});
MBLoader.addModule({
    name :"sugarwidgets",
    type : "js",
    fullpath: "include/javascript/sugarwidgets/SugarYUIWidgets.js",
    varName: "YAHOO.SUGAR",
    requires: ["datatable", "dragdrop", "treeview", "tabview"]
});
MBLoader.insert();
{/literal}
</script>
<div id="footerHTML" class="y-hidden">
    <table width="100%" cellpadding="0" cellspacing="0"><tr><td nowrap="nowrap">
    <input type="button" class="button" value="{$mod.LBL_HOME}" onclick="ModuleBuilder.main('home');">
    {if $TEST_STUDIO == true}
    <input type="button" class="button" value="{$mod.LBL_STUDIO}" onclick="ModuleBuilder.main('studio');">
    {/if}
    {if $ADMIN == true}
    <input type="button" class="button" value="{$mod.LBL_MODULEBUILDER}" onclick="ModuleBuilder.main('mb');">
    {/if}
    <input type="button" class="button" value="{$mod.LBL_DROPDOWNEDITOR}" onclick="ModuleBuilder.main('dropdowns');">
    </td><td align="left">
    <a href="http://www.sugarcrm.com" target="_blank">
        <img height="18" width="83" class="img" src="include/images/poweredby_sugarcrm.png" border="0" align="absmiddle"/>
    </a>
     </td></tr></table>
</div>
{include file='modules/ModuleBuilder/tpls/assistantJavascript.tpl'}