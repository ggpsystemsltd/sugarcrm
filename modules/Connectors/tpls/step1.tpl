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
<script type="text/javascript" src="{sugar_getjspath file='cache/include/javascript/sugar_grp_yui_widgets.js'}"></script>
<script type="text/javascript" src="{sugar_getjspath file='modules/Connectors/Connector.js'}"></script>
<script type='text/javascript' src="{sugar_getjspath file='cache/include/javascript/sugar_grp_overlib.js'}">
<script type="text/javascript" src="{sugar_getjspath file='modules/Connectors/tpls/modify_mapping.js'}"></script>
<link rel="stylesheet" type="text/css" href="{sugar_getjspath file='modules/Connectors/tpls/tabs.css'}"/>

{literal}

<script language="javascript">
function checkKeyDown(event) {
	e = getEvent(event);
	eL = getEventElement(e);
	if ((kc = e["keyCode"])) {
	    enterPressed = (kc == 13) ? true : false;
        if(enterPressed) {
		   SourceTabs.search();
		   freezeEvent(e);
		}
	}
}

function getEvent(event) {
	return (event ? event : window.event);
}

function getEventElement(e) {
	return (e.srcElement ? e.srcElement: (e.target ? e.target : e.currentTarget));
}

function freezeEvent(e) {
	if (e.preventDefault) e.preventDefault();
	e.returnValue = false;
	e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation();
	return false;
}

function get_source_details(source, id, spanId){
		go = function() {
			oReturn = function(body, caption, width, theme) {
						return overlib(body, CAPTION, caption, STICKY, MOUSEOFF, 1000, WIDTH, width, CLOSETEXT, ('<img border=0 style="margin-left:2px; margin-right: 2px;" align="right"alt=$mod_strings.LBL_CLOSE src=themes/default/images/close.gif>'), CLOSETITLE, 'Click to Close', CLOSECLICK, FGCLASS, 'olFgClass', CGCLASS, 'olCgClass', BGCLASS, 'olBgClass', TEXTFONTCLASS, 'olFontClass', CAPTIONFONTCLASS, 'olCapFontClass', CLOSEFONTCLASS, 'olCloseFontClass', REF, spanId, REFC, 'LL', REFX, 13);
					}
			success = function(data) {
						eval(data.responseText);
	
						SUGAR.util.additionalDetailsCache[spanId] = new Array();
						SUGAR.util.additionalDetailsCache[spanId]['body'] = result['body'];
						SUGAR.util.additionalDetailsCache[spanId]['caption'] = result['caption'];
						SUGAR.util.additionalDetailsCache[spanId]['width'] = result['width'];
						SUGAR.util.additionalDetailsCache[spanId]['theme'] = result['theme'];
						ajaxStatus.hideStatus();
						return oReturn(SUGAR.util.additionalDetailsCache[spanId]['body'], SUGAR.util.additionalDetailsCache[spanId]['caption'], SUGAR.util.additionalDetailsCache[spanId]['width'], SUGAR.util.additionalDetailsCache[spanId]['theme']);
					}
	
					if(typeof SUGAR.util.additionalDetailsCache[spanId] != 'undefined')
						return oReturn(SUGAR.util.additionalDetailsCache[spanId]['body'], SUGAR.util.additionalDetailsCache[spanId]['caption'], SUGAR.util.additionalDetailsCache[spanId]['width'], SUGAR.util.additionalDetailsCache[spanId]['theme']);
	
					if(typeof SUGAR.util.additionalDetailsCalls[spanId] != 'undefined') // call already in progress
						return;
					ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_LOADING'));
					url = 'index.php?module=Connectors&action=RetrieveSourceDetails&source_id='+source+'&record_id='+id;
					SUGAR.util.additionalDetailsCalls[spanId] = YAHOO.util.Connect.asyncRequest('GET', url, {success: success, failure: success});
	
					return false;
		}
		SUGAR.util.additionalDetailsRpcCall = window.setTimeout('go()', 250);
	}
function clear_source_details(){
	if(typeof SUGAR.util.additionalDetailsRpcCall == 'number') window.clearTimeout(SUGAR.util.additionalDetailsRpcCall);
}
</script>

<script language="javascript">
 	var _tabView;
 	var _sourceArray = new Array();
 	var firstSource = '';
 	var isDirty = false;
 	var isHidden = false;

 
SourceTab.prototype.sourceId = '';
SourceTab.prototype.isEnabled = false;
SourceTab.prototype.isDataLoaded = false;
SourceTab.prototype.searchFormCache = '';

function SourceTab(sourceId){
	this.sourceId = sourceId;
}
SourceTab.prototype.hide = function(){
		var div = document.getElementById('div_'+this.sourceId);
        div.style.display = 'none';
        this.isHidden = true;
	}
SourceTab.prototype.show = function(){
		var div = document.getElementById('div_'+this.sourceId);
        div.style.display = 'block';
        this.isHidden = false;
	}
SourceTab.prototype.refreshData = function(first_load){
		if(first_load){
			SourceTabs.setSearching(true);
		}
		
		var source = this;  	
		var callback =	{
			success: function(data) {
				source.setData(data.responseText);
			},
			failure: function(data) {
				
			}		  
		}
		
		postData = 'index.php?module=Connectors&action=RetrieveSource&record={/literal}{$RECORD}{literal}&to_pdf=true&source_id='+this.sourceId;
		var cObj = YAHOO.util.Connect.asyncRequest('GET', postData, callback, null);
	}
SourceTab.prototype.setData = function(data){
		var div = document.getElementById('div_'+this.sourceId);
		div.innerHTML = data;
		setTimeout("SourceTabs.setSearching(false)", 2000);
		this.isDataLoaded = true;
	}
SourceTab.prototype.isEmpty = function(){
	var div = document.getElementById('div_'+this.sourceId);
	if(div.innerHTML == ''){
		return true;
	}else{
		return false;
	}
}
 
var SourceTabs = {

    init : function() {    
  		//SourceTabs.setSearching(true); 
    },
    
    setSearching : function(searching){
    	var btn_search = document.getElementById('btn_search');
    	if(searching){
    		btn_search.value = {/literal}"{$MOD.LBL_SEARCHING_BUTTON_LABEL}"{literal};;
    	}else{
    		btn_search.value = {/literal}"      {$APP.LBL_SEARCH_BUTTON_LABEL}      "{literal};
    	}
    },
    
    search : function() {        
    	SourceTabs.setSearching(true);
		var formObject = document.getElementById('SearchForm'); 
		if(typeof formObject != 'undefined') {
	    	url = YAHOO.util.Connect.setForm('SearchForm', false);    	
	    	var cObj = YAHOO.util.Connect.asyncRequest('POST','index.php?module=Connectors&action=SetSearch&' + url,
	         {
	          success: function() {SourceTabs.refreshActiveConnector();}, 
	          failure: function() { }
	         }
	        );
        }
    },
    
    clearForm : function(){
    	var formObject = document.forms['SearchForm']; 
    	for(i=0; i<formObject.elements.length; i++){
			if(formObject.elements[i].type == 'text'){
				formObject.elements[i].value='';
			}
		}
    }, 
    
    refreshActiveConnector : function(){
    	 try{
	    	for(var i = 0; i <= _sourceArray.length; i++){
	    		var sTab = _sourceArray[i];
		    	if(!sTab.isHidden){
		    		sTab.refreshData();
		    		return;
		    	}
		     }
	     }catch(err){
	     
	     }
    },
    getSourceTab : function(source_id){
    	try{
	    	for(var i = 0; i <= _sourceArray.length; i++){
	    		var sTab = _sourceArray[i];
		    	if(sTab.sourceId == source_id){
		    		return sTab;
		    	}
		     }
	     }catch(err){
	     
	     }
    },
    refreshConnectors : function(){
    	 try{
	    	for(var i = 0; i <= _sourceArray.length; i++){
	    		var sTab = _sourceArray[i];
		    	if(sTab.isDataLoaded){
		    		sTab.refreshData();
		    	}
		     }
	     }catch(err){
	     
	     }
    },
    
    loadTab : function(tab, previousKey) {
        SourceTabs.getSearchForm(tab);
        for (var i = 0; i < _sourceArray.length; i++){
			var sTab = _sourceArray[i];
             if(sTab.sourceId && sTab.sourceId != tab) {
                sTab.hide();
             } else{
				if(isDirty || sTab.isEmpty()){
					SourceTabs.setSearching(true);
	        		sTab.refreshData();
	        	}
	        	sTab.show();
	        }
        }
	     
     },
     
     getSearchForm : function(source_id){
    	var sTab = SourceTabs.getSourceTab(source_id);
    	var searchDiv = document.getElementById('div_search_form');
    	if(sTab.searchFormCache == ''){
	    	var callback =	{
				success: function(data) {
					searchDiv.innerHTML = data.responseText;
					sTab.searchFormCache = data.responseText;
				},
				failure: function(data) {
					
				}		  
			}
			postData = 'index.php?module=Connectors&action=GetSearchForm&merge_module={/literal}{$module}{literal}&record={/literal}{$RECORD}{literal}&source_id='+source_id;
			var cObj = YAHOO.util.Connect.asyncRequest('GET', postData, callback, null);
		} else{
			searchDiv.innerHTML = sTab.searchFormCache;
		}
     }
}
YAHOO.util.Event.onDOMReady(SourceTabs.init);
</script>
{/literal}
<div id='div_search_form'>
{include file="modules/Connectors/tpls/search_form.tpl"}
</div>
<form name="ConnectorStep1" method="POST">
<input type="hidden" name="action" value="Step2">
<input type="hidden" name="module" value="Connectors">
<input type="hidden" name="record" value="{$RECORD}">

<table width="100%" cellpadding="0" cellspacing="0" border="0" class="h3Row">
<tr>
<td nowrap><h3>{$mod.LBL_RESULT_LIST}</h3></td>
<td width='100%'><IMG height='1' width='1' src='include/images/blank.gif' alt=''></td>
</tr>
</table>


<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
	<td>
		<table border='0' cellpadding='0' cellspacing='0' width='100%'>
				<tr>
					<td nowrap>
						
<input id="connectors_next_top" title="{$mod.LBL_MERGE}" class="button" type="submit" value="{$mod.LBL_MERGE}">
<input id="connectors_cancel_top" title="{$APP.LBL_CANCEL_BUTTON_LABEL}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="document.ConnectorStep1.action.value='DetailView'; document.ConnectorStep1.module.value='{$module}';" type="submit" value="{$APP.LBL_CANCEL_BUTTON_LABEL}">
					
					</td>
				</tr>
		</table>	
	</td>
</tr>
<tr>
</table>
<br/>

{$TABS}


<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tr><td>
 {counter assign=source_count start=0 print=0} 
 {foreach name=connectors from=$SOURCES key=name item=source}   
 {counter assign=source_count}
 	{if $source_count == 1}
	<div id='div_{$source}' style='display: block'></div>
	{else}
	<div id='div_{$source}' style='display: none'></div>
	{/if}
	<script>
		var sourceTab = new SourceTab('{$source}');
		_sourceArray[{$source_count}-1] = sourceTab;
		{if $source_count == 1}
			sourceTab.refreshData(true);
		{/if}
	</script>
{/foreach}
</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
	<td>
		<table border='0' cellpadding='0' cellspacing='0' width='100%'>
				<tr>
					<td nowrap>
						
<input id="connectors_next_bottom" title="{$mod.LBL_MERGE}" class="button" type="submit" value="{$mod.LBL_MERGE}">
<input id="connectors_cancel_bottom" title="{$APP.LBL_CANCEL_BUTTON_LABEL}" class="button" onclick="document.ConnectorStep1.action.value='DetailView'; document.ConnectorStep1.module.value='{$module}';" type="submit" value="{$APP.LBL_CANCEL_BUTTON_LABEL}">
					
					</td>
				</tr>
		</table>	
	</td>
</tr>
</table>

</form>