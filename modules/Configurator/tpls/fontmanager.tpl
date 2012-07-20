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
<script type="text/javascript" src='{sugar_getjspath file ='cache/include/javascript/sugar_grp_yui_widgets.js'}'></script>
<script type="text/javascript" src='{sugar_getjspath file ='include/javascript/yui/build/paginator/paginator-min.js'}'></script>
{literal}
<style type="text/css">
    .yui-pg-container {
        background: none;
    }
</style>
{/literal}
<p>
{$MODULE_TITLE}
</p>
<form enctype="multipart/form-data" name="fontmanager" method="POST" action="index.php" id="fontmanager">
<input type="hidden" name="module" value="Configurator">
<input type="hidden" name="action" value="FontManager">
<input type="hidden" name="action_type" value="">
<input type="hidden" name="filename" value="">
<input type="hidden" name='return_action' value="{$RETURN_ACTION}">
<span class='error'>{$error}</span>
<br>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td align="left">
            <input title="{$MOD.LBL_BACK}"  class="button" type="button" name="gobackbutton" value="  {$MOD.LBL_BACK}  " id="gobackbutton">&nbsp;
            <input title="{$MOD.LBL_ADD_FONT}" class="button" type="button" name="addFontbutton" value="  {$MOD.LBL_ADD_FONT}  " id="addFontbutton">
        </td>
    </tr>
</table>

<br>
<div id="YuiListMarkup"></div>
<br>

</form>
{literal}
<script type="text/javascript">
var removeFormatter = function (el, oRecord, oColumn, oData) {
    if(oRecord._oData.type != "{/literal}{$MOD.LBL_FONT_TYPE_CORE}{literal}" && oRecord._oData.fontpath != "{/literal}{$K_PATH_FONTS}{literal}"){
        el.innerHTML = '<a href="#" name="deleteButton" onclick="return false;">{sugar_getimage name="delete_inline" ext=".gif" alt=$mod_strings.LBL_DELETE other_attributes='align="absmiddle" border="0" '}{/literal} {$MOD.LBL_REMOVE}{literal}<\/a>';
    }
};
YAHOO.util.Event.onDOMReady(function() {
{/literal}
	var fontColumnDefs = {$COLUMNDEFS};
    var fontData = {$DATASOURCE};
{literal}
	var fontDataSource = new YAHOO.util.DataSource(fontData);
	fontDataSource.responseType = YAHOO.util.DataSource.TYPE_JSARRAY;
    fontDataSource.responseSchema = {/literal}{$RESPONSESCHEMA}{literal};
    var oConfigs = {
        paginator: new YAHOO.widget.Paginator({
            rowsPerPage:15
        })
    };
    var fontDataTable = new YAHOO.widget.DataTable("YuiListMarkup", fontColumnDefs, fontDataSource, oConfigs);

    fontDataTable.subscribe("linkClickEvent", function(oArgs){
        if(oArgs.target.name == "deleteButton"){
            if(confirm('{/literal}{$MOD.LBL_JS_CONFIRM_DELETE_FONT}{literal}')){
            	   document.getElementById("fontmanager").action.value = "deleteFont";
            	   document.getElementById("fontmanager").filename.value = this.getRecord(oArgs.target)._oData.filename;
            	   document.getElementById("fontmanager").submit();
            }
        }
    });
    
    document.getElementById('gobackbutton').onclick=function(){
        if(document.getElementById("fontmanager").return_action.value != ""){
        	document.location.href='index.php?module=Configurator&action=' + document.getElementById("fontmanager").return_action.value;
        }else{
        	document.location.href='index.php?module=Configurator&action=SugarpdfSettings';
        }
    };
    document.getElementById('addFontbutton').onclick=function(){
    	document.location.href='index.php?module=Configurator&action=addFontView';
    };
    
});
{/literal}
</script>
