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
function enableQS(noReload){YAHOO.util.Event.onDOMReady(function(){if(typeof sqs_objects=='undefined'){return;}
var Dom=YAHOO.util.Dom;var qsFields=Dom.getElementsByClassName('sqsEnabled');for(var qsField in qsFields){if(typeof qsFields[qsField]=='function'||typeof qsFields[qsField].id=='undefined'){continue;}
var form_id=qsFields[qsField].form.getAttribute('id');if(typeof form_id=='object'&&qsFields[qsField].form.getAttribute('real_id')){form_id=qsFields[qsField].form.getAttribute('real_id');}
var qs_index_id=form_id+'_'+qsFields[qsField].name;if(typeof sqs_objects[qs_index_id]=='undefined'){qs_index_id=qsFields[qsField].name;if(typeof sqs_objects[qs_index_id]=='undefined'){continue;}}
if(QSProcessedFieldsArray[qs_index_id]){skipSTR='collection_0';if(qs_index_id.lastIndexOf(skipSTR)!=(qs_index_id.length-skipSTR.length)){continue;}}
var qs_obj=sqs_objects[qs_index_id];var loaded=false;if(!document.forms[qs_obj.form]){continue;}
if(!document.forms[qs_obj.form].elements[qsFields[qsField].id].readOnly&&qs_obj['disable']!=true){var combo_id=qs_obj.form+'_'+qsFields[qsField].id;if(Dom.get(combo_id+"_results")){loaded=true}
if(!loaded){QSProcessedFieldsArray[qs_index_id]=true;qsFields[qsField].form_id=form_id;var sqs=sqs_objects[qs_index_id];var resultDiv=document.createElement('div');resultDiv.id=combo_id+"_results";Dom.insertAfter(resultDiv,qsFields[qsField]);var fields=qs_obj.field_list.slice();fields[fields.length]="module";var ds=new YAHOO.util.DataSource("index.php?",{responseType:YAHOO.util.XHRDataSource.TYPE_JSON,responseSchema:{resultsList:'fields',total:'totalCount',fields:fields,metaNode:"fields",metaFields:{total:'totalCount',fields:"fields"}},connMethodPost:true});var forceSelect=!((qsFields[qsField].form&&typeof(qsFields[qsField].form)=='object'&&qsFields[qsField].form.name=='search_form')||qsFields[qsField].className.match('sqsNoAutofill')!=null);var search=new YAHOO.widget.AutoComplete(qsFields[qsField],resultDiv,ds,{typeAhead:forceSelect,forceSelection:forceSelect,fields:fields,sqs:sqs,animSpeed:0.25,qs_obj:qs_obj,inputElement:qsFields[qsField],generateRequest:function(sQuery){var item_id=this.inputElement.form_id+'_'+this.inputElement.name;if(QSCallbacksArray[item_id]){QSCallbacksArray[item_id](this.sqs);}
var out=SUGAR.util.paramsToUrl({to_pdf:'true',module:'Home',action:'quicksearchQuery',data:encodeURIComponent(YAHOO.lang.JSON.stringify(this.sqs)),query:sQuery});return out;},setFields:function(data,filter){this.updateFields(data,filter);},updateFields:function(data,filter){for(var i in this.fields){for(var key in this.qs_obj.field_list){if(this.fields[i]==this.qs_obj.field_list[key]&&document.forms[this.qs_obj.form].elements[this.qs_obj.populate_list[key]]&&this.qs_obj.populate_list[key].match(filter)){var displayValue=data[i].replace(/&amp;/gi,'&').replace(/&lt;/gi,'<').replace(/&gt;/gi,'>').replace(/&#039;/gi,'\'').replace(/&quot;/gi,'"');document.forms[this.qs_obj.form].elements[this.qs_obj.populate_list[key]].value=displayValue;SUGAR.util.callOnChangeListers(document.forms[this.qs_obj.form].elements[this.qs_obj.populate_list[key]]);}}}
SUGAR.util.callOnChangeListers(this._elTextbox);},clearFields:function(){for(var key in this.qs_obj.field_list){if(document.forms[this.qs_obj.form].elements[this.qs_obj.populate_list[key]]){document.forms[this.qs_obj.form].elements[this.qs_obj.populate_list[key]].value="";SUGAR.util.callOnChangeListers(document.forms[this.qs_obj.form].elements[this.qs_obj.populate_list[key]]);}}
this.oldValue="";}});if(/^(billing_|shipping_)?account_name$/.exec(qsFields[qsField].name))
{search.clearFields=function(){for(var i in{name:0,id:1}){for(var key in this.qs_obj.field_list){if(i==this.qs_obj.field_list[key]&&document.forms[this.qs_obj.form].elements[this.qs_obj.populate_list[key]])
{document.forms[this.qs_obj.form].elements[this.qs_obj.populate_list[key]].value="";}}}};search.setFields=function(data,filter)
{var label_str='';var label_data_str='';var current_label_data_str='';var label_data_hash=new Array();for(var i in this.fields){for(var key in this.qs_obj.field_list){if(this.fields[i]==this.qs_obj.field_list[key]&&document.forms[this.qs_obj.form].elements[this.qs_obj.populate_list[key]]&&document.getElementById(this.qs_obj.populate_list[key]+'_label')&&this.qs_obj.populate_list[key].match(filter)){var displayValue=data[i].replace(/&amp;/gi,'&').replace(/&lt;/gi,'<').replace(/&gt;/gi,'>').replace(/&#039;/gi,'\'').replace(/&quot;/gi,'"');var data_label=document.getElementById(this.qs_obj.populate_list[key]+'_label').innerHTML.replace(/\n/gi,'').replace(/<\/?[^>]+(>|$)/g,"");label_and_data=data_label+' '+displayValue;if(document.forms[this.qs_obj.form].elements[this.qs_obj.populate_list[key]]&&!label_data_hash[data_label])
{label_str+=data_label+' \n';label_data_str+=label_and_data+'\n';label_data_hash[data_label]=true;current_label_data_str+=data_label+' '+document.forms[this.qs_obj.form].elements[this.qs_obj.populate_list[key]].value+'\n';}}}}
if(label_str!=current_label_data_str&&current_label_data_str!=label_data_str){module_key=(typeof document.forms[form_id].elements['module']!='undefined')?document.forms[form_id].elements['module'].value:'app_strings';warning_label=SUGAR.language.translate(module_key,'NTC_OVERWRITE_ADDRESS_PHONE_CONFIRM')+'\n\n'+label_data_str;if(!confirm(warning_label))
{this.updateFields(data,/account_id/);}else{if(Dom.get('shipping_checkbox'))
{if(this.inputElement.id=='shipping_account_name')
{filter=Dom.get('shipping_checkbox').checked?/(account_id|office_phone)/:filter;}else if(this.inputElement.id=='billing_account_name'){filter=Dom.get('shipping_checkbox').checked?filter:/(account_id|office_phone|billing)/;}}else if(Dom.get('alt_checkbox')){filter=Dom.get('alt_checkbox').checked?filter:/^(?!alt)/;}
this.updateFields(data,filter);}}else{this.updateFields(data,filter);}};}
if(typeof(SUGAR.config.quicksearch_querydelay)!='undefined'){search.queryDelay=SUGAR.config.quicksearch_querydelay;}
search.itemSelectEvent.subscribe(function(e,args){var data=args[2];var fields=this.fields;this.setFields(data,/\S/);if(typeof(this.qs_obj['post_onblur_function'])!='undefined'){collection_extended=new Array();for(var i in fields){for(var key in this.qs_obj.field_list){if(fields[i]==this.qs_obj.field_list[key]){collection_extended[this.qs_obj.field_list[key]]=data[i];}}}
eval(this.qs_obj['post_onblur_function']+'(collection_extended, this.qs_obj.id)');}});search.textboxFocusEvent.subscribe(function(){this.oldValue=this.getInputEl().value;});search.selectionEnforceEvent.subscribe(function(e,args){if(this.oldValue!=args[1]){this.clearFields();}else{this.getInputEl().value=this.oldValue;}});search.dataReturnEvent.subscribe(function(e,args){if(this.getInputEl().value.length==0&&args[2].length>0){var data=[];for(var key in this.qs_obj.field_list){data[data.length]=args[2][0][this.qs_obj.field_list[key]];}
this.getInputEl().value=data[this.key];this.itemSelectEvent.fire(this,"",data);}});search.typeAheadEvent.subscribe(function(e,args){this.getInputEl().value=this.getInputEl().value.replace(/&amp;/gi,'&').replace(/&lt;/gi,'<').replace(/&gt;/gi,'>').replace(/&#039;/gi,'\'').replace(/&quot;/gi,'"');});if(SUGAR.isIE&&navigator.appVersion.match(/MSIE (.\..)/)[1]<8&&/team_name/.test(search.getInputEl().id)){search.containerExpandEvent.subscribe(function(e,args){var zVal=9999;div_els=YAHOO.util.Selector.query('div[name=teamset_div]');for(x in div_els){Dom.setStyle(div_els[x],'z-index',zVal--);Dom.setStyle(div_els[x],'position','relative');}});}
if(typeof QSFieldsArray[combo_id]=='undefined'&&qsFields[qsField].id){QSFieldsArray[combo_id]=search;}}}}});}
function registerSingleSmartInputListener(input){if((c=input.className)&&(c.indexOf("sqsEnabled")!=-1)){enableQS(true);}}
if(typeof QSFieldsArray=='undefined'){QSFieldsArray=new Array();QSProcessedFieldsArray=new Array();QSCallbacksArray=new Array();}
