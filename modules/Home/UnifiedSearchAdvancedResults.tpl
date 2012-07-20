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

    	var SubpanelInit = function() {
    		SubpanelInitTabNames(["quotes","activities","opportunities","history","leads","campaigns","cases","contacts"]);
    	}
        var SubpanelInitTabNames = function(tabNames) {
    		subpanel_dd = new Array();
    		j = 0;
    		for(i in tabNames) {
    			subpanel_dd[j] = new ygDDList('whole_subpanel_' + tabNames[i]);
    			subpanel_dd[j].setHandleElId('subpanel_title_' + tabNames[i]);
    			subpanel_dd[j].onMouseDown = SUGAR.subpanelUtils.onDrag;
    			subpanel_dd[j].afterEndDrag = SUGAR.subpanelUtils.onDrop;
    			j++;
    		}

    		YAHOO.util.DDM.mode = 1;
    	}
    	currentModule = 'Contacts';
    	YAHOO.util.Event.addListener(window, 'load', SubpanelInit);

<script type='text/javascript'>
{literal}
var GlobalSearchOnDrag = function()
{
//console.log('dragging');
}

var GlobalSearchOnDrop = function()
{
//console.log('dropping');
}

{/literal}

var GlobalSearchInit = function()
{ldelim}
//console.log('loading...');
subpanel_dd = new Array();

{foreach from=$MODULE_RESULTS name=m key=module item=info}
subpanel_dd[{$module}] = new ygDDList('whole_subpanel_' + {$module});
subpanel_dd[{$module}].setHandleElId('div_' + {$module});
subpanel_dd[{$module}].onMouseDown = GlobalSearchOnDrag;
subpanel_dd[{$module}].afterEndDrag = GlobalSearchOnDrop;
{/foreach}	

YAHOO.util.DDM.mode = 1;
{rdelim}

YAHOO.util.Event.addListener(window, 'load', GlobalSearchInit);

</script>