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
{literal}
<style>
.menu{
	z-index:100;
}

.subDmenu{
	z-index:100;
}

div.moduleTitle {
height: 10px;
	}
</style>
{/literal}

<!-- begin includes for overlib -->
{sugar_getscript file="cache/include/javascript/sugar_grp_overlib.js"}
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000"></div>
<!-- end includes for overlib -->


{sugar_getscript file="cache/include/javascript/sugar_grp_yui_widgets.js"}
{sugar_getscript file='include/javascript/dashlets.js'}
<link rel='stylesheet' href='{sugar_getjspath file='include/ytree/TreeView/css/folders/tree.css'}'>
{$chartResources}
{$mySugarChartResources}

<script type="text/javascript">
var numPages = {$numPages};
var loadedPages = new Array();
loadedPages[0] = '{$loadedPage}';
var numCols = {$numCols};
var activePage = {$activePage};
var theme = '{$theme}';
current_user_id = '{$current_user}';
jsChartsArray = new Array();
var moduleName = '{$module}';
document.body.setAttribute("class", "yui-skin-sam");
{literal}
var mySugarLoader = new YAHOO.util.YUILoader({
	require : ["my_sugar", "sugar_charts"],
    // Bug #48940 Skin always must be blank
    skin: {
        base: 'blank',
        defaultSkin: ''
    },
	onSuccess: function(){
		initMySugar();
		initmySugarCharts();
		{/literal}
		{counter assign=hiddenCounter start=0 print=false}
		{foreach from=$columns key=colNum item=data}
			{foreach from=$data.dashlets key=id item=dashlet}
				SUGAR.mySugar.attachToggleToolsetEvent('{$id}');
			{/foreach}
		{counter}
		{/foreach}
		{literal}
		SUGAR.mySugar.maxCount = 	{/literal}{$maxCount}{literal};
		SUGAR.mySugar.homepage_dd = new Array();
		var j = 0;

		{/literal}
		var dashletIds = {$dashletIds};

		{if !$lock_homepage}
			SUGAR.mySugar.attachDashletCtrlEvent();
			for(i in dashletIds) {ldelim}
				SUGAR.mySugar.homepage_dd[j] = new ygDDList('dashlet_' + dashletIds[i]);
				SUGAR.mySugar.homepage_dd[j].setHandleElId('dashlet_header_' + dashletIds[i]);
                // Bug #47097 : Dashlets not displayed after moving them
                // add new property to save real id of dashlet, it needs to have ability reload dashlet by id
                SUGAR.mySugar.homepage_dd[j].dashletID = dashletIds[i];
				SUGAR.mySugar.homepage_dd[j].onMouseDown = SUGAR.mySugar.onDrag;
				SUGAR.mySugar.homepage_dd[j].afterEndDrag = SUGAR.mySugar.onDrop;
				j++;
			{rdelim}
			{if $hiddenCounter > 0}
			for(var wp = 0; wp <= {$hiddenCounter}; wp++) {ldelim}
				SUGAR.mySugar.homepage_dd[j++] = new ygDDListBoundary('page_'+activePage+'_hidden' + wp);
			{rdelim}
			{/if}
			YAHOO.util.DDM.mode = 1;
		{/if}
		{literal}
		SUGAR.mySugar.renderDashletsDialog();
		SUGAR.mySugar.renderAddPageDialog();
		SUGAR.mySugar.renderChangeLayoutDialog();
		SUGAR.mySugar.renderLoadingDialog();
		SUGAR.mySugar.sugarCharts.loadSugarCharts(activePage);
		{/literal}
		{$activeTabJavascript}
		{literal}
	}
});
mySugarLoader.addModule({
	name :"my_sugar",
	type : "js",
	fullpath: {/literal}"{sugar_getjspath file='include/MySugar/javascript/MySugar.js'}"{literal},
	varName: "initMySugar",
	requires: []
});
mySugarLoader.addModule({
	name :"sugar_charts",
	type : "js",
	fullpath: {/literal}"{sugar_getjspath file="include/SugarCharts/Jit/js/mySugarCharts.js"}"{literal},
	varName: "initmySugarCharts",
	requires: []
});
mySugarLoader.insert();
{/literal}
</script>




{$form_header}
<table cellpadding="0" cellspacing="0" border="0" width="100%" id="tabListContainerTable">
<tr>
<td nowrap id="tabListContainerTD">
<div id="tabListContainer" class="yui-module yui-scroll">
	<div class="yui-hd">
		<span class="yui-scroll-controls">
			<a title="scroll left" class="yui-scrollup"><em>scroll left</em></a>
			<a title="scroll right" class="yui-scrolldown"><em>scroll right</em></a>
		</span>
	</div>

	<div class="yui-bd">
		<ul class="subpanelTablist" id="tabList">
		{foreach from=$pages key=pageNum item=pageData}
		<li id="pageNum_{$pageNum}" {if ($pageNum == $activePage)}class="active"{/if}>
		<a id="pageNum_{$pageNum}_anchor" class="{$pageData.tabClass}" href="javascript:SUGAR.mySugar.togglePages('{$pageNum}');" title="{$pageData.pageTitle}">
			<span id="pageNum_{$pageNum}_input_span" style="display:none;">
			<input type="hidden" id="pageNum_{$pageNum}_name_hidden_input" value="{$pageData.pageTitle}"/>
			<input type="text" id="pageNum_{$pageNum}_name_input" value="{$pageData.pageTitle}" size="10" onblur="SUGAR.mySugar.savePageTitle('{$pageNum}',this.value);"/>
			</span>
			<span id="pageNum_{$pageNum}_link_span" class="tabText">
			<span id="pageNum_{$pageNum}_title_text" {if !$lock_homepage}ondblclick="SUGAR.mySugar.renamePage('{$pageNum}');"{/if}>{$pageData.pageTitle}</span></span>
			{capture assign=attr}align="absmiddle" border="0" class="deletePageImg" id="pageNum_{$pageNum}_delete_page_img" style="display: none;" onclick="return SUGAR.mySugar.deletePage()"  alt="{$app.LBL_DELETE_PAGE}"{/capture}
			{sugar_getimage name="info-del.png" attr=$attr}
		   </a>
	   </li>
	   {/foreach}
		</ul>
	</div>

</div>
	<div id="addPage">
		{capture assign=attr}id="add_page" onclick="return SUGAR.mySugar.showAddPageDialog();"{/capture}
		{capture assign=img_attr}align="absmiddle" border="0" alt="{$app.LBL_ADD_PAGE}"{/capture}
		{sugar_getlink url="javascript:void(0)" title="Add page" attr=$attr img_name="info-add-page.png" img_attr=$img_attr}
	</div>
</td>

{if !$lock_homepage}
<td nowrap id="dashletCtrlsTD">
	<div id="dashletCtrls">
			{capture assign=attr}id="add_dashlets" onclick="return SUGAR.mySugar.showDashletsDialog();" class="utilsLink"{/capture}
			{capture assign=img_attr}align="absmiddle" border="0"  alt=""{/capture}
			{sugar_getlink url="javascript:void(0)" title=$mod.LBL_ADD_DASHLETS attr=$attr 
					img_name="info-add.png" img_attr=$img_attr img_placement="left"}
			{capture assign=attr}id="change_layout" onclick="return SUGAR.mySugar.showChangeLayoutDialog();" class="utilsLink"{/capture}
			{capture assign=img_attr}align="absmiddle" border="0" alt=""{/capture}
			{sugar_getlink url="javascript:void(0)" title=$app.LBL_CHANGE_LAYOUT attr=$attr 
					img_name="info-layout.png" img_attr=$img_attr img_placement="left"}
	</div>
</td>
{/if}
</tr>
</table>
<div class="clear"></div>
<div id="pageContainer" class="yui-skin-sam">
<div id="pageNum_{$activePage}_div">
<table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top: 5px;">
	{if $numCols > 1}
 	<tr>
 		{if $numCols > 2}
	 	<td>

		</td>

		<td rowspan="3">
				{sugar_getimage name="blank.gif"  width='40' height='1' border='0'}
		</td>
		{/if}
		{if $numCols > 1}
		<td>

		</td>
		<td rowspan="3">
				{sugar_getimage name="blank.gif"  width='40' height='1' border='0'}
		</td>
		{/if}
	</tr>
	{/if}
	<tr>
		{counter assign=hiddenCounter start=0 print=false}
		{foreach from=$columns key=colNum item=data}
		<td valign='top' width='{$data.width}'>
			<ul class='noBullet' id='col_{$activePage}_{$colNum}'>
				<li id='page_{$activePage}_hidden{$hiddenCounter}b' style='height: 5px; margin-top:12px;' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
		        {foreach from=$data.dashlets key=id item=dashlet}
				<li class='noBullet' id='dashlet_{$id}'>
					<div id='dashlet_entire_{$id}' class='dashletPanel'>
						{$dashlet.script}
					{$dashlet.displayHeader}
						{$dashlet.display}
                        {$dashlet.displayFooter}
                  </div>
				</li>
				{/foreach}
				<li id='page_{$activePage}_hidden{$hiddenCounter}' style='height: 5px' class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</td>
		{counter}
		{/foreach}
	</tr>
</table>
	</div>

	{foreach from=$divPages key=divPageIndex item=divPageNum}
	<div id="pageNum_{$divPageNum}_div" style="display:none;">
	</div>
	{/foreach}

	<div id="addPageDialog" style="display:none;">
		<div class="hd">{$lblAddPage}</div>
		<div class="bd">
			<form method="POST" action="index.php?module=Home&action=DynamicAction&DynamicAction=addTab&to_pdf=1">
				<label>{$lblPageName}: </label><input type="textbox" name="pageName" /><br /><br />
				<label>{$lblNumberOfColumns}:</label>
				<table align="center" cellpadding="8">
					<tr>
						<td align="center">{sugar_getimage alt=$app.LBL_ICON_COLUMN_1 name="icon_Column_1.gif" attr='border="0"'}<br />
							<input type="radio" name="numColumns" value="1" /></td>
						<td align="center">{sugar_getimage alt=$app.LBL_ICON_COLUMN_2 name="icon_Column_2.gif" attr='border="0"'}<br />
							<input type="radio" name="numColumns" value="2" checked="yes" /></td>
						<td align="center">{sugar_getimage alt=$app.LBL_ICON_COLUMN_3 name="icon_Column_3.gif" attr='border="0"'}<br />
							<input type="radio" name="numColumns" value="3" /></td>
                    </tr>
				</table>
			</form>
		</div>
	</div>

	<div id="changeLayoutDialog" style="display:none;">
		<div class="hd">{$lblChangeLayout}</div>
		<div class="bd">
			<label>{$lblNumberOfColumns}:</label>
			<br /><br />
			<table align="center" cellpadding="15">
				<tr>
					<td align="center">
						{capture assign=img_attr}border="0"{/capture}
						{sugar_getlink url="javascript:SUGAR.mySugar.changePageLayout(1);" attr='id="change_layout_1_column"'
							title=$app.LBL_ICON_COLUMN_1 img_name="icon_Column_1.gif" img_attr=$img_attr}
					</td>
					<td align="center">
					    {capture assign=img_attr}border="0"{/capture}
						{sugar_getlink url="javascript:SUGAR.mySugar.changePageLayout(2);" attr='id="change_layout_2_column"'
							title=$app.LBL_ICON_COLUMN_2 img_name="icon_Column_2.gif" img_attr=$img_attr}
					</td>
					<td align="center">
					    {capture assign=img_attr}border="0"{/capture}
						{sugar_getlink url="javascript:SUGAR.mySugar.changePageLayout(3);" attr='id="change_layout_3_column"'
							title=$app.LBL_ICON_COLUMN_3 img_name="icon_Column_3.gif" img_attr=$img_attr}
					</td>
				</tr>
			</table>
		</div>
	</div>

	<div id="dashletsDialog" style="display:none;">
		<div class="hd" id="dashletsDialogHeader"><a href="javascript:void(0)" onClick="javascript:SUGAR.mySugar.closeDashletsDialog();">
			<div class="container-close">&nbsp;</div></a>{$lblAdd}
		</div>
		<div class="bd" id="dashletsList">
			<form></form>
		</div>

	</div>
				
	
</div>
