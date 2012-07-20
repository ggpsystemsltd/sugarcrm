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
var lbl_remove=SUGAR.language.get('app_strings','LBL_REMOVE');function remove_filter(spanfieldid){var selspan=document.getElementById(spanfieldid);selspan.setAttribute("style","visibility:hidden");selspan.innerHTML='';var ops=object_refs['field_avail_list'].options;var newoption=new Option(selspan.getAttribute("Value"),selspan.getAttribute("ValueId"),false,true);ops.add(newoption);}
function ajax_fetch_sync(url,post_data)
{global_xmlhttp=getXMLHTTPinstance();var method='GET';if(typeof(post_data)!='undefined')
{method='POST';}
try
{global_xmlhttp.open(method,url,false);}
catch(error)
{alert('message:'+error.message+":url:"+url);}
if(method=='POST')
{global_xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');}
global_xmlhttp.send(post_data);var ajax_response={"responseText":global_xmlhttp.responseText,"responseXML":global_xmlhttp.responseXML};return ajax_response;}
function get_fields_to_dedup(parent_mod)
{var rel_map_div_obj=document.getElementById('rel_map');if(parent_mod!='')
{var request_id=1;var url=site_url+'/index.php?to_pdf=1&sugar_body_only=1&inline=1&parent_module='+parent_mod+'&module=MigrationMappings&action=GetRelationshipsToMap';var ajax_return_obj=ajax_fetch_sync(url);try{eval("var responseObj ="+ajax_return_obj['responseText']);}
catch(e){alert(ajax_return_obj['responseText']);}
build_avail_rels_array(responseObj);rel_map_div_obj.innerHTML=responseObj['html_content'];}
else
{rel_map_div_obj.innerHTML='';}
return true;}
function get_dedup_fields()
{var parent_div=document.getElementById('filter_def');var node;var spannode;var value;var valueid;var style;document.DedupSetup.dedup_fields.value='';for(node in parent_div.childNodes){spannode=parent_div.childNodes[node];if(spannode.tagName=='SPAN'){value=spannode.getAttribute('value');valueid=spannode.getAttribute('valueid');style=spannode.getAttribute('style');if(typeof(style)=='undefined'||style==null||style==''||style.lastIndexOf('hidden')==-1){if(document.DedupSetup.dedup_fields.value!=''){document.DedupSetup.dedup_fields.value=document.DedupSetup.dedup_fields.value+'#';}
document.DedupSetup.dedup_fields.value=document.DedupSetup.dedup_fields.value+valueid;}}}}
var object_refs=new Object();object_refs['field_include_list']=document.DedupSetup['field_include_list'];object_refs['field_avail_list']=document.DedupSetup['field_avail_list'];function setselected(included_name,avail_name)
{var included_columns_ref=object_refs[included_name];var avail_columns_ref=object_refs[avail_name];var included_td=document.getElementById(included_name+'_td');var avail_td=document.getElementById(avail_name+'_td');var selected_avail=new Array();var notselected_avail=new Array();var notselected_include=new Array();for(i=0;i<avail_columns_ref.options.length;i++)
{if(avail_columns_ref.options[i].selected==true)
{selected_avail[selected_avail.length]={text:avail_columns_ref.options[i].text,value:avail_columns_ref.options[i].value};}
else
{notselected_avail[notselected_avail.length]={text:avail_columns_ref.options[i].text,value:avail_columns_ref.options[i].value};}}
var right_select_html_info=new Object();var right_options=new Array();var right_select=new Object();right_select['name']=avail_name+'[]';right_select['id']=avail_name;right_select['multiple']='true';right_select['size']='10';for(i=0;i<notselected_avail.length;i++)
{right_options[right_options.length]=notselected_avail[i];}
right_select_html_info['options']=right_options;right_select_html_info['select']=right_select;var right_html=buildSelectHTML(right_select_html_info);avail_td.innerHTML=right_html;object_refs[avail_name]=avail_td.getElementsByTagName('select')[0];for(p=0;p<selected_avail.length;p++)
{addFieldRow(selected_avail[p].value,selected_avail[p].text)}}
function up(name){var td=document.getElementById(name+'_td');var obj=td.getElementsByTagName('select')[0];obj=(typeof obj=="string")?document.getElementById(obj):obj;if(obj.tagName.toLowerCase()!="select"&&obj.length<2)
return false;var sel=new Array();for(i=0;i<obj.length;i++){if(obj[i].selected==true){sel[sel.length]=i;}}
for(i in sel){if(sel[i]!=0&&!obj[sel[i]-1].selected){var tmp=new Array(obj[sel[i]-1].text,obj[sel[i]-1].value);obj[sel[i]-1].text=obj[sel[i]].text;obj[sel[i]-1].value=obj[sel[i]].value;obj[sel[i]].text=tmp[0];obj[sel[i]].value=tmp[1];obj[sel[i]-1].selected=true;obj[sel[i]].selected=false;}}}
function down(name){var td=document.getElementById(name+'_td');var obj=td.getElementsByTagName('select')[0];if(obj.tagName.toLowerCase()!="select"&&obj.length<2)
return false;var sel=new Array();for(i=obj.length-1;i>-1;i--){if(obj[i].selected==true){sel[sel.length]=i;}}
for(i in sel){if(sel[i]!=obj.length-1&&!obj[sel[i]+1].selected){var tmp=new Array(obj[sel[i]+1].text,obj[sel[i]+1].value);obj[sel[i]+1].text=obj[sel[i]].text;obj[sel[i]+1].value=obj[sel[i]].value;obj[sel[i]].text=tmp[0];obj[sel[i]].value=tmp[1];obj[sel[i]+1].selected=true;obj[sel[i]].selected=false;}}}
function buildSelectHTML(info)
{var text;text="<div align='left'><select";if(typeof(info['select']['size'])!='undefined')
{text+=" size=\""+info['select']['size']+"\"";}
if(typeof(info['select']['name'])!='undefined')
{text+=" name=\""+info['select']['name']+"\"";}
if(typeof(info['select']['style'])!='undefined')
{text+=" style=\""+info['select']['style']+"\"";}
if(typeof(info['select']['onchange'])!='undefined')
{text+=" onChange=\""+info['select']['onchange']+"\"";}
if(typeof(info['select']['multiple'])!='undefined')
{text+=" multiple";}
text+=">";for(i=0;i<info['options'].length;i++)
{option=info['options'][i];text+="<option value=\""+option['value']+"\" ";if(typeof(option['selected'])!='undefined'&&option['selected']==true)
{text+="SELECTED";}
text+=">"+option['text']+"</option>";}
text+="</select></div>";return text;}
var fieldCount=0;function addFieldRow(colName,colLabel){var tableId='search_type';var rowIdName='field';var fieldArrayCount;var optionVal;var optionDispVal;var optionsIndex=0;fieldCount=fieldCount+1;document.DedupSetup.num_fields.value=fieldCount;var selElement=document.createElement("select");var selectName=colName+"SearchType";selElement.setAttribute("name",selectName);var i=0;for(theoption in operator_options){selElement.options[i]=new Option(operator_options[theoption],theoption,false,false);i++;}
var aElement=document.createElement("a");aElement.setAttribute("href","javascript:remove_filter('filter_"+colName+"')");aElement.setAttribute("class","listViewTdToolsS1");var imgElement=document.createElement("img");imgElement.setAttribute("src",delete_inline_image);imgElement.setAttribute("align","absmiddle");imgElement.setAttribute("alt",lbl_remove);imgElement.setAttribute("border","0");imgElement.setAttribute("height","12");imgElement.setAttribute("width","12");aElement.appendChild(imgElement);aElement.appendChild(document.createTextNode(" "));var div=document.getElementById('filter_def');var span1=document.getElementById('filter_'+colName);if(span1==null||span1==''||typeof(span1)=='undefined'){span1=document.createElement("span");}else{span1.setAttribute("style","visibility:visible");}
span1.setAttribute("id",'filter_'+colName);span1.setAttribute("Value",colLabel);span1.setAttribute("ValueId",colName);var table=document.createElement("table");var row=table.insertRow(table.rows.length);table.setAttribute("width","100%");table.setAttribute("border","0");table.setAttribute("cellpadding","0");var td1=document.createElement("td");td1.setAttribute("width","2%");td1.appendChild(aElement);row.appendChild(td1)
var td2=document.createElement("td");td2.setAttribute("width","20%");td2.appendChild(document.createTextNode(colLabel+':  '));row.appendChild(td2)
var td3=document.createElement("td");td3.setAttribute("width","10%");td3.appendChild(selElement);row.appendChild(td3);var coldata;eval("coldata=bean_data."+colName+";");var edit=document.createElement("input");edit.setAttribute("type","text");edit.setAttribute("name",colName+'SearchField');edit.setAttribute("id",colName+'SearchField');edit.setAttribute("value",coldata);var td5=document.createElement("td");td5.setAttribute("width","68%");td5.appendChild(edit);row.appendChild(td5);span1.appendChild(table);div.appendChild(span1);}
