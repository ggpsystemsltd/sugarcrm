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
{{if isset($vardef.allowEapm) && $vardef.allowEapm}}
<script type="text/javascript" src='{{sugar_getjspath file="cache/include/externalAPI.cache.js"}}'></script>
{{/if}}
<script type="text/javascript" src='{{sugar_getjspath file="include/SugarFields/Fields/File/SugarFieldFile.js"}}'></script>
{{capture name=idName assign=idName}}{{sugarvar key='name'}}{{/capture}}
{{if !empty($displayParams.idName)}}
    {{assign var=idName value=$displayParams.idName}}
{{/if}}

{{if !isset($vardef.noRemove) || !$vardef.noRemove}}
{if !empty({{sugarvar key='value' stringFormat=true}}) }
    {assign var=showRemove value=true}
{else}
    {assign var=showRemove value=false}
{/if}
{{else}}
    {assign var=showRemove value=false}
{{/if}}

{{if isset($vardef.noChange) && $vardef.noChange }}
{if !empty({{sugarvar key='value' stringFormat=true}}) }
    {assign var=showRemove value=true}
    {assign var=noChange value=true}
{else}
    {assign var=noChange value=false}
{/if}
{{else}}
    {assign var=noChange value=false}
{{/if}}

<input type="hidden" name="deleteAttachment" value="0">
<input type="hidden" name="{{$idName}}" id="{{$idName}}" value="{{sugarvar key='value'}}">
{{if isset($vardef.allowEapm) && $vardef.allowEapm}}
<input type="hidden" name="{{$vardef.docId}}" id="{{$vardef.docId}}" value="{$fields.{{$vardef.docId}}.value}">
<input type="hidden" name="{{$vardef.docUrl}}" id="{{$vardef.docUrl}}" value="{$fields.{{$vardef.docUrl}}.value}">
<input type="hidden" name="{{$idName}}_old_doctype" id="{{$idName}}_old_doctype" value="{$fields.{{$vardef.docType}}.value}">
{{/if}}
<span id="{{$idName}}_old" style="display:{if !$showRemove}none;{/if}">
  <a href="index.php?entryPoint=download&id={$fields.{{$vardef.fileId}}.value}&type={{$vardef.linkModule}}" class="tabDetailViewDFLink">{{sugarvar key='value'}}</a>

{{if isset($vardef.allowEapm) && $vardef.allowEapm}}
{if isset($fields.{{$vardef.docType}}) && !empty($fields.{{$vardef.docType}}.value) && $fields.{{$vardef.docType}}.value != 'Sugar' && !empty($fields.{{$vardef.docUrl}}.value) }
{capture name=imageNameCapture assign=imageName}
{$fields.{{$vardef.docType}}.value}_image_inline.png
{/capture}
<a href="{$fields.{{$vardef.docUrl}}.value}" class="tabDetailViewDFLink" target="_blank">{sugar_getimage name=$imageName alt=$imageName other_attributes='border="0" '}</a>
{/if}
{{/if}}
{if !$noChange}
<input type='button' class='button' value='{$APP.LBL_REMOVE}' onclick='SUGAR.field.file.deleteAttachment("{{$idName}}","{{$vardef.docType}}",this);'>
{/if}
</span>
{if !$noChange}
<span id="{{$idName}}_new" style="display:{if $showRemove}none;{/if}">
<input type="hidden" name="{{$idName}}_escaped">
<input id="{{$idName}}_file" name="{{$idName}}_file" 
type="file" title='{{$vardef.help}}' size="{{$displayParams.size|default:30}}"
{{if !empty($displayParams.accesskey)}} accesskey='{{$displayParams.accesskey}}' {{/if}} 
{{if !empty($vardef.len)}}
    maxlength='{{$vardef.len}}'
{{elseif !empty($displayParams.maxlength)}}
    maxlength="{{$displayParams.maxlength}}"
{{else}}
    maxlength="255"
{{/if}}
{{$displayParams.field}}>

{{if isset($vardef.allowEapm) && $vardef.allowEapm}}
<span id="{{$idName}}_externalApiSelector" style="display:none;">
<br><h4 id="{{$idName}}_externalApiLabel">
<span id="{{$idName}}_more">{sugar_image name="advanced_search" width="8px" height="8px"}</span>
<span id="{{$idName}}_less" style="display: none;">{sugar_image name="basic_search" width="8px" height="8px"}</span>
{$APP.LBL_SEARCH_EXTERNAL_API}</h4>
<span id="{{$idName}}_remoteNameSpan" style="display: none;">
<input type="text" class="sqsEnabled" name="{{$idName}}_remoteName" id="{{$idName}}_remoteName" size="{{$displayParams.size|default:30}}" 
{{if !empty($displayParams.accesskey)}} accesskey='{{$displayParams.accesskey}}' {{/if}} 
{{if !empty($vardef.len)}}
    maxlength='{{$vardef.len}}'
{{elseif !empty($displayParams.maxlength)}}
    maxlength="{{$displayParams.maxlength}}"
{{else}}
    maxlength="255"
{{/if}} autocomplete="off" value="{if !empty($fields[{{$vardef.docId}}].value)}{{sugarvar key='name'}}{/if}">

{{if empty($displayParams.hideButtons) }}
<span class="id-ff multiple">
<button type="button" name="{{$idName}}_remoteSelectBtn" id="{{$idName}}_remoteSelectBtn" tabindex="{{$tabindex}}" title="{sugar_translate label="{{$displayParams.accessKeySelectTitle}}"}" class="button firstChild" value="{sugar_translate label="{{$displayParams.accessKeySelectLabel}}"}"
onclick="SUGAR.field.file.openPopup('{{$idName}}'); return false;">
{sugar_getimage alt=$app_strings.LBL_ID_FF_SELECT name="id-ff-select" ext=".png" other_attributes=''}</button>
<button type="button" name="{{$idName}}_remoteClearBtn" id="{{$idName}}_remoteClearBtn" tabindex="{{$tabindex}}" title="{$APP.LBL_CLEAR_BUTTON_TITLE}" class="button lastChild" value="{$APP.LBL_CLEAR_BUTTON_LABEL}" onclick="SUGAR.field.file.clearRemote('{{$idName}}'); return false;">
{sugar_getimage name="id-ff-clear" alt=$app_strings.LBL_ID_FF_CLEAR ext=".png" other_attributes=''}
</button>
</span>
{{/if}}
</span>

<div style="display: none;" id="{{$idName}}_securityLevelBox">
  <b>{$APP.LBL_EXTERNAL_SECURITY_LEVEL}: </b>
  <select name="{{$idName}}_securityLevel" id="{{$idName}}_securityLevel">
  </select>
</div>
<script type="text/javascript">
YAHOO.util.Event.onDOMReady(function() {ldelim}
SUGAR.field.file.setupEapiShowHide("{{$idName}}","{{$vardef.docType}}","{$form_name}");
{rdelim});

if ( typeof(sqs_objects) == 'undefined' ) {ldelim}
    sqs_objects = new Array;
{rdelim}

sqs_objects["{$form_name}_{{$idName}}_remoteName"] = {ldelim}
"form":"{$form_name}",
"method":"externalApi",
"api":"",
"modules":["EAPM"],
"field_list":["name", "id", "url", "id"],
"populate_list":["{{$idName}}_remoteName", "{{$vardef.docId}}", "{{$vardef.docUrl}}", "{{$idName}}"],
"required_list":["name"],
"conditions":[],
"no_match_text":"No Match"
{rdelim};

if(typeof QSProcessedFieldsArray != 'undefined') {ldelim}
	QSProcessedFieldsArray["{$form_name}_{{$idName}}_remoteName"] = false;
{rdelim}
{if $showRemove && strlen("{{$vardef.docType}}") > 0 }
document.getElementById("{{$vardef.docType}}").disabled = true;
{/if}
enableQS(false);
</script>
{{/if}}
{else}
{* No change possible *}

{{if isset($vardef.allowEapm) && $vardef.allowEapm}}
<script type="text/javascript">
YAHOO.util.Event.onDOMReady(function() 
{ldelim}
document.getElementById("{{$vardef.docType}}").disabled = true;
{rdelim});
</script>
{{/if}}

{/if}

{{if !empty($displayParams.onchangeSetFileNameTo) }}
<script type="text/javascript">

var {{$idName}}_setFileName = function()
{literal}
{
    var dom = YAHOO.util.Dom;
{/literal}    
    sourceElement = "{{$idName}}_file";
    targetElement = "{{$displayParams.onchangeSetFileNameTo}}";
	src = new String(dom.get(sourceElement).value);
	target = new String(dom.get(targetElement).value);
{literal}
	if (target.length == 0) 
	{
		lastindex=src.lastIndexOf("/");
		if (lastindex == -1) {
			lastindex=src.lastIndexOf("\\");
		} 
		if (lastindex == -1) {
			dom.get(targetElement).value=src;
		} else {
			dom.get(targetElement).value=src.substr(++lastindex, src.length);
		}	
	}	
}
{/literal}

YAHOO.util.Event.onDOMReady(function() 
{ldelim}
if(document.getElementById("{{$displayParams.onchangeSetFileNameTo}}"))
{ldelim}
YAHOO.util.Event.addListener('{{$idName}}_file', 'change', {{$idName}}_setFileName);
YAHOO.util.Event.addListener(['{{$idName}}_file', '{{$vardef.docType}}'], 'change', SUGAR.field.file.checkFileExtension,{ldelim} fileEl: '{{$idName}}_file', targEl: '{{$displayParams.onchangeSetFileNameTo}}'{rdelim});
{rdelim}
{rdelim});
</script>
{{/if}}

</span>