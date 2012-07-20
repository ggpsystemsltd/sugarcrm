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

<form id='StudioWizard' name='StudioWizard'>
<input type='hidden' name='module' value='ModuleBuilder'>
<input type='hidden' name='action' value='portalsyncsync'>
<table class='tabform' width='100%' cellpadding=4>
<tr>
<td colspan='2'>{$welcome}</td>
</tr>
<tr>
<td colspan='2' nowrap>
{$mod.LBL_PORTALSITE}
<input name='portalURL' id='portalURL' value='{$options}' size=60>
<input type='button' class='button' id='gobutton' value='{$mod.LBL_PORTAL_GO}'>
</td>
</tr>
<tr>
<td colspan='2'>
    {if strcmp($options, 'https://') != 0 || strcmp($options, 'http://') != 0 && $options != 'https://'}
		<iframe title='{$options}' style='border:0' id='portal_iframe' height='250' scrolling='auto'></iframe>
	{/if}
</td>
</tr>

</table>
</form>

{literal}
<script>
ModuleBuilder.helpSetup('portalSync','default');
</script>

<script language='javascript'>
function handleKeyDown(event) {
	e = getEvent(event);
	eL = getEventElement(e);
	if ((kc = e["keyCode"])) { 
        if(kc == 13) {
           retrieve_portal_page();
		   freezeEvent(e);
		}
	}
}//handleKeyDown()

function getEvent(event) {
	return (event ? event : window.event);
}//getEvent

function getEventElement(e) {
	return (e.srcElement ? e.srcElement: (e.target ? e.target : e.currentTarget));
}//getEventElement

function freezeEvent(e) {
	if (e.preventDefault) e.preventDefault();
	e.returnValue = false;
	e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation();
	return false;
}//freezeEvent

function retrieve_portal_page() {
	ModuleBuilder.getContent("module=ModuleBuilder&action=portalsyncsync&portalURL=" + document.StudioWizard.portalURL.value)
}

function load_portal_url() {
    var url = document.getElementById('portalURL').value + '/portal_sync.php';
    if(/http(s)?:\/\/\/portal_sync.php/.test(url)) {
       return;
    }
    
	var iframe = document.getElementById('portal_iframe');
	try {
	  iframe.src=url;
	} catch(e) {

	}
}

document.getElementById('portalURL').onkeydown = handleKeyDown;
document.getElementById('gobutton').onclick = retrieve_portal_page;
load_portal_url();
</script>
{/literal}