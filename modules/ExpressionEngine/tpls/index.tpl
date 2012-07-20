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
<script src="include/javascript/sugarwidgets/SugarYUILoader.js"></script>
{literal}
<script type="text/javascript">
var loader = new YAHOO.util.YUILoader({
    require : ["sugarwidgets"],
    loadOptional: true,
    skin: { base: 'blank', defaultSkin: '' },
	onSuccess: function(){console.log("loaded")},
    allowRollup: true,
    base: "include/javascript/yui/build/"
});
loader.addModule({
    name :"sugarwidgets",
    type : "js",
    fullpath: "include/javascript/sugarwidgets/SugarYUIWidgets.js",
    varName: "YAHOO.SUGAR",
    requires: ["datatable", "dragdrop", "treeview", "tabview"]
});
loader.insert();
var DDEditorWindow = false;
showEditor = function() {
    if (!DDEditorWindow)
        DDEditorWindow = new YAHOO.SUGAR.AsyncPanel('DDEditorWindow', {
            width: 256,
            draggable: true,
            close: true,
            constraintoviewport: true,
            fixedcenter: false,
            script: true,
            modal: true
        });
    var win = DDEditorWindow;
    win.setHeader("Dropdown Editor");
    win.setBody("loading...");
    win.render(document.body);
    win.params = {
        module:"ExpressionEngine",
        action:"editDepDropdown",
        loadExt:false,
        embed: true,
        view_module:"Accounts",
        field: 'sub_industry_c',
        package:"",
        to_pdf:1
    };
    win.load('index.php?' + SUGAR.util.paramsToUrl(win.params), null, function()
    {
        DDEditorWindow.center();
        SUGAR.util.evalScript(DDEditorWindow.body.innerHTML);
    });
    win.show();
    win.center();
}
</script>
{/literal}
<input class="button" type="button" onclick="showEditor()" value="Show"/>
<div id="editorDiv"></div>