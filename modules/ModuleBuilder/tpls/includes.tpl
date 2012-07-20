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
<script type="text/javascript" src="{sugar_getjspath file='modules/ModuleBuilder/javascript/JSTransaction.js'}" ></script>
<script>
	var jstransaction = new JSTransaction();
	{literal}
	if (SUGAR.themes.tempHideLeftCol){
    	SUGAR.themes.tempHideLeftCol();
    }
    {/literal}
</script>

<link rel="stylesheet" type="text/css" href="{sugar_getjspath file="modules/ModuleBuilder/tpls/LayoutEditor.css"}" />
<link rel="stylesheet" type="text/css" href="{sugar_getjspath file="include/ytree/TreeView/css/folders/tree.css"}" />

<script type="text/javascript" src='{sugar_getjspath file ='modules/ModuleBuilder/javascript/studio2.js'}' ></script>
<script type="text/javascript" src='{sugar_getjspath file ='modules/ModuleBuilder/javascript/studio2PanelDD.js'}' ></script>
<script type="text/javascript" src='{sugar_getjspath file ='modules/ModuleBuilder/javascript/studio2RowDD.js'}' ></script>
<script type="text/javascript" src='{sugar_getjspath file ='modules/ModuleBuilder/javascript/studio2FieldDD.js'}' ></script>
<script type="text/javascript" src='{sugar_getjspath file ='modules/ModuleBuilder/javascript/studiotabgroups.js'}'></script>
<script type="text/javascript" src='{sugar_getjspath file ='modules/ModuleBuilder/javascript/studio2ListDD.js'}' ></script>

<!--end ModuleBuilder Assistant!-->
<script type="text/javascript" language="Javascript" src='{sugar_getjspath file ='modules/ModuleBuilder/javascript/ModuleBuilder.js'}'></script>
<script type="text/javascript" language="Javascript" src='{sugar_getjspath file ='modules/ModuleBuilder/javascript/SimpleList.js'}'></script>
<script type="text/javascript" src='{sugar_getjspath file ='modules/ModuleBuilder/javascript/JSTransaction.js'}' ></script>
<script type="text/javascript" src='{sugar_getjspath file ='include/javascript/tiny_mce/tiny_mce.js'}' ></script>

<script src='{sugar_getjspath file='cache/include/javascript/sugar_grp_overlib.js'}' type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="{sugar_getjspath file="modules/ModuleBuilder/tpls/MB.css"}" />