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


<div style='width:100%'>
<form name='configure_{$id}' action="index.php" method="post">
<input type='hidden' name='id' value='{$id}'>
<input type='hidden' name='module' value='Home'>
<input type='hidden' name='action' value='ConfigureDashlet'>
<input type='hidden' name='to_pdf' value='true'>
<input type='hidden' name='configure' value='true'>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="edit view" align="center">
<tr>
    <td scope='row'>{$titleLBL}</td>
    <td>
    	<input class="text" name="title" size='20' maxlength='80' value='{$title}'>
    </td>
</tr>
{if $isRefreshable}
<tr>
    <td scope='row'>
        {$autoRefresh}
    </td>
    <td>
        <select name='autoRefresh'>
            {html_options options=$autoRefreshOptions selected=$autoRefreshSelect}
        </select>
    </td>
</tr>
{/if}
<tr>
    <td scope='row'>{$rowsLBL}</td>
    <td>
    	<input class="text" name="rows" size='3' value='{$rows}'>
    </td>
</tr>
<tr>
    <td scope='row'>{$categoriesLBL}</td>
    <td>
        <select name='categories[]' multiple=true size=6 onchange='getMultiple(this);' id='categories_{$id}'>
    	{html_options options=$categories selected=$selectedCategories}
    	</select>
    </td>
</tr>
<tr>
    <td scope='row'>{$myFavoritesOnlyLBL}</td>
    <td>
        <input type='checkbox' {if $myFavoritesOnly == 'true'}checked{/if} name='myFavoritesOnly' value='true'>
    </td>
</tr>
<tr>
  <td align="right" colspan="2">
    <div id='externalApiDiv'>
    </div>
  </td>
</tr>
<tr>
    <td align="right" colspan="2">
        <input type='button' class='button' value='{$saveLBL}' id='save_{$id}' onclick='promptAuthentication(); if(SUGAR.dashlets.postForm("configure_{$id}", SUGAR.mySugar.uncoverPage)) this.form.submit();'>
        <input type='submit' class='button' value='{$clearLBL}' onclick='SUGAR.searchForm.clear_form(this.form,["title","autoRefresh","rows"]);return false;'>
   	</td>
</tr>
</table>
<script language='javascript'>
var externalApiList = {$externalApiList};
var authenticatedExternalApiList = new Array();
{literal}


function getMultiple(ob){
    var showAll = false;
    var selected = new Array();
    for (var i = 0; i < ob.options.length; i++){
        if (ob.options[ i ].selected){
            selected.push(ob.options[ i ].value);
            if(ob.options[ i ].value == 'ALL'){
                showAll = true;
            }
        }
    }
    var buttonHtml = '';
    if(showAll){
        for (var j = 0; j < externalApiList.length; j++) 
        {
            if(!authenticatedExternalApiList[externalApiList[j]])
            {
	            buttonHtml += '<div id="' + externalApiList[j] + '_div" style="visibility:;"><a href="#" onclick="window.open(\'index.php?module=EAPM&callbackFunction=hideExternalDiv&closeWhenDone=1&action=QuickSave&application='+externalApiList[j]+'\',\'EAPM\');">{/literal}{$authenticateLBL}{literal} '+externalApiList[j]+'</a></div>';
            }
        }
    }else{
        for (var i = 0; i < selected.length; i++){
            for (var j = 0; j < externalApiList.length; j++)
            {
                if(selected[i] == externalApiList[j] && !authenticatedExternalApiList[externalApiList[j]]) 
                {
                    buttonHtml += '<div id="' + externalApiList[j] + '_div" style="visibility:";><a href="#" onclick="window.open(\'index.php?module=EAPM&callbackFunction=hideExternalDiv&closeWhenDone=1&action=QuickSave&application='+externalApiList[j]+'\',\'EAPM\');">{/literal}{$authenticateLBL}{literal} '+externalApiList[j]+'</a></div>';
                }
            }
        }
    }
    document.getElementById('externalApiDiv').innerHTML = buttonHtml;
}

function initExternalOptions(){
    var ob = document.getElementById('{/literal}categories_{$id}{literal}');
    getMultiple(ob);
}

function hideExternalDiv(id)
{
    //Hide the div for the external API link, set the authenticated Array list to true
    if(YAHOO.util.Dom.get(id + '_div'))
    {
		YAHOO.util.Dom.get(id + '_div').style.visibility = 'hidden';
		authenticatedExternalApiList[id] = true;
	}
}

function promptAuthentication()
{
    //This is how we know that not all external API links were authenticated
{/literal}
     categoryElement = YAHOO.util.Dom.get('categories_{$id}');  
{literal} 
    //Only check for prompt warning if the 'ALL' option was selected
    if(categoryElement.selectedIndex != -1 && categoryElement.options[categoryElement.selectedIndex].value != 'ALL')
    {
       return;
    }
    
	if(authenticatedExternalApiList.length < externalApiList.length)
	{
{/literal}
		if(!confirm("{$autenticationPendingLBL}")) 
{literal}		
		{
		    //Cancel form submission here
		    e = event ? event : window.event;
		    if (e.preventDefault) e.preventDefault();
		    e.returnValue = false;
		    e.cancelBubble = true;
		    if (e.stopPropagation) e.stopPropagation();
		}
	}
}

YAHOO.util.Event.onDOMReady(initExternalOptions);
</script>
{/literal}
</form>
</div>