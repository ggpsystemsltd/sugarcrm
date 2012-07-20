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
var CAL={};CAL.dropped=0;CAL.records_openable=true;CAL.moved_from_cell="";CAL.deleted_id="";CAL.deleted_module="";CAL.old_caption="";CAL.disable_creating=false;CAL.record_editable=false;CAL.tp=false;CAL.tp1=false;CAL.shared_users={};CAL.shared_users_count=0;CAL.script_evaled=false;CAL.editDialog=false;CAL.settingsDialog=false;CAL.scroll_slot=0;CAL.update_dd=new YAHOO.util.CustomEvent("update_dd");CAL.dom=YAHOO.util.Dom;CAL.get=YAHOO.util.Dom.get;CAL.query=YAHOO.util.Selector.query;CAL.arrange_slot=function(cell_id){if(!cell_id)
return;cellElm=document.getElementById(cell_id);if(cellElm){var total_height=0;var prev_i=0;var first=1;var top=0;var height=0;var cnt=0;var child_cnt=cellElm.childNodes.length;for(var i=0;i<child_cnt;i++){var width_p=(92 / child_cnt);width=width_p.toString()+"%";if(cellElm.childNodes[i].tagName=="DIV"){cellElm.childNodes[i].style.top="-1px";cellElm.childNodes[i].style.left="-"+(cnt+1)+"px";cellElm.childNodes[i].style.width=width
cnt++;prev_i=i;}}}}
CAL.arrange_column=function(column){for(var i=0;i<column.childNodes.length;i++){for(var j=0;j<column.childNodes[i].childNodes.length;j++){var el=column.childNodes[i].childNodes[j];if(YAHOO.util.Dom.hasClass(el,"empty")){el.parentNode.removeChild(el);j--;}}}
var slots=column.childNodes;var start=0;var end=slots.length;var slot_count=end;var level=0;var affected_slots=new Array();var affected_items=Array();var ol=new Array();find_overlapping(null,start,end,level,null);for(var i=0;i<ol.length;i++){var ol_group=ol[i];var depth=ol_group.depth;for(var j=0;j<ol_group.items.length;j++){var el_id=ol_group.items[j]['id'];var level=ol_group.items[j]['level'];var el=CAL.get(el_id);var node=el;var pos=0;while(node.previousSibling){pos++;node=node.previousSibling;}
insert_empty_items(el,level-1-pos,false);}}
for(var i=0;i<ol.length;i++){var ol_group=ol[i];var depth=ol_group.depth;for(var j=0;j<ol_group.items.length;j++){var el_id=ol_group.items[j]['id'];var el=CAL.get(el_id);var cnt=el.parentNode.childNodes.length;insert_empty_items(el,depth-cnt,true);}}
CAL.each(affected_slots,function(i,v){CAL.arrange_slot(affected_slots[i]);});function find_overlapping(el,start,end,level,ol_group){if(level>20)
return;var depth=level;if(el!=null){if(level==1){ol_group={};ol_group.items=new Array();}
ol_group.items.push({id:el.id,level:level});affected_items.push(el.id);}
for(var i=start;i<end;i++){if(i>=slot_count)
break;if(typeof slots[i].childNodes!='undefined'&&typeof slots[i].childNodes[0]!='undefined'){var pos=0;if(i==start){var node=slots[i].childNodes[0];while(node.nextSibling&&contains(affected_items,node.id)){node=node.nextSibling;pos++;}}
var current=slots[i].childNodes[pos];var slots_takes=parseInt(current.getAttribute('duration_coef'));if(contains(affected_items,current.id))
continue;if(pos==0){var slot_id=current.parentNode.id;if(!contains(affected_slots,slot_id))
affected_slots.push(slot_id);}
if(slots_takes>0){var k=find_overlapping(current,i,i+slots_takes,level+1,ol_group);if(k>depth)
depth=k;}}}
if(level==1){ol_group.depth=depth;ol.push(ol_group);}
return depth;}
function insert_empty_items(el,count,to_end){var slot=el.parentNode;for(var i=0;i<count;i++){var empty=document.createElement("div");empty.className="act_item empty";empty.style.zIndex="-1";empty.style.width="1px";if(to_end==true){slot.appendChild(empty);}else{slot.insertBefore(empty,slot.firstChild);}}}
function contains(a,obj){var i=a.length;while(i--)
if(a[i]===obj)
return true;return false;}}
CAL.arrange_advanced=function(){var nodes=CAL.query("#cal-grid .day_col");for(var i=0;i<nodes.length;i++){CAL.arrange_column(nodes[i]);}
CAL.update_dd.fire();}
CAL.add_item_to_grid=function(item){var suffix="";var id_suffix="";if(item.user_id!=""&&CAL.view=='shared'){suffix="_"+CAL.shared_users[item.user_id];id_suffix='____'+CAL.shared_users[item.user_id];}
var e=CAL.get(item.record+id_suffix);if(e){e.parentNode.removeChild(e);}
var duration_text=item.duration_hours+CAL.lbl_hours_abbrev;if(item.duration_minutes>0)
duration_text+=item.duration_minutes+CAL.lbl_mins_abbrev;var start_text=CAL.get_header_text(item.type,item.time_start,item.status,item.record);var time_cell=item.timestamp-item.timestamp%(CAL.t_step*60);var duration_coef;if(item.module_name=='Tasks'){duration_coef=1;duration_text=" ";}else{if((item.duration_minutes<CAL.t_step)&&(item.duration_hours==0))
duration_coef=1;else
duration_coef=(parseInt(item.duration_hours)*60+parseInt(item.duration_minutes))/ CAL.t_step;}
var item_text="";if(CAL.item_text&&(typeof item[CAL.item_text]!="undefined"))
item_text=item[CAL.item_text];var contain_style="";if(duration_coef<1.75)
contain_style="style='display: none;'";var elm_id=item.record+id_suffix;var el=document.createElement("div");el.innerHTML="<div class='head'><div class='adicon' onmouseover='return CAL.show_additional_details("+'"'+item.record+id_suffix+'"'+");' onmouseout='return nd(400);' >&nbsp;&nbsp;</div><div>"+start_text+"</div>"+""+"</div><div class='contain' "+contain_style+">"+item_text+"</div>";el.className="act_item"+" "+item.type+"_item";el.setAttribute("id",elm_id);el.setAttribute("module_name",item.module_name);el.setAttribute("record",item.record);el.setAttribute("dur",duration_text);el.setAttribute("subj",item.record_name);el.setAttribute("date_start",item.date_start);el.setAttribute("desc",item.description);el.setAttribute("parent_name",item.parent_name);el.setAttribute("parent_type",item.parent_type);el.setAttribute("parent_id",item.parent_id);el.setAttribute("status",item.status);el.setAttribute("detail",item.detail);el.setAttribute("edit",item.edit);el.setAttribute("duration_coef",duration_coef);el.style.backgroundColor=CAL.activity_colors[item.module_name]['body'];el.style.borderColor=CAL.activity_colors[item.module_name]['border'];el.style.height=parseInt(15*duration_coef-1)+"px";if(item.module_name=="Tasks")
el.setAttribute("date_due",item.date_due);YAHOO.util.Event.on(el,"click",function(){if(this.getAttribute('detail')=="1")
CAL.load_form(this.getAttribute('module_name'),this.getAttribute('record'),false);});YAHOO.util.Event.on(el,"mouseover",function(){if(!CAL.records_openable)
return;CAL.disable_creating=true;CAL.tp=setTimeout(function(){var e;if(e=CAL.get(elm_id))
e.style.zIndex=2;},150);});YAHOO.util.Event.on(el,"mouseout",function(){if(!CAL.records_openable)
return;clearTimeout(CAL.tp);CAL.get(elm_id).style.zIndex='';CAL.disable_creating=false;});var slot;if(slot=CAL.get("t_"+time_cell+suffix)){slot.appendChild(el);CAL.cut_record(item.record+id_suffix);if(duration_coef<1.75&&CAL.mouseover_expand){YAHOO.util.Event.on(elm_id,"mouseover",function(){if(CAL.records_openable)
CAL.expand_record(this.getAttribute("id"));});YAHOO.util.Event.on(elm_id,"mouseout",function(){CAL.unexpand_record(this.getAttribute("id"));});YAHOO.util.Event.on(elm_id,"click",function(){CAL.unexpand_record(this.getAttribute("id"));});}
if(CAL.items_draggable&&item.edit==1){var border='cal-grid';if(CAL.view!="shared"&&CAL.view!="month")
border='cal-scrollable';var dd=new YAHOO.util.DDCAL(elm_id,"cal",{isTarget:false,cont:border});dd.onInvalidDrop=function(e){CAL.arrange_slot(this.el.parentNode.getAttribute("id"));if(CAL.dropped==0){this.el.childNodes[0].innerHTML=CAL.old_caption;}
CAL.records_openable=true;CAL.disable_creating=false;}
dd.onMouseDown=function(e){YAHOO.util.DDM.mode=YAHOO.util.DDM.POINT;YAHOO.util.DDM.clickPixelThresh=20;}
dd.onMouseUp=function(e){YAHOO.util.DDM.mode=YAHOO.util.DDM.INTERSECT;YAHOO.util.DDM.clickPixelThresh=3;}
dd.startDrag=function(x,y){this.el=document.getElementById(this.id);this.el.style.zIndex=5;CAL.dropped=0;CAL.records_openable=false;CAL.disable_creating=true;CAL.old_caption=this.el.childNodes[0].innerHTML;CAL.moved_from_cell=this.el.parentNode.id;this.setDelta(2,2);}
dd.endDrag=function(x,y){this.el=document.getElementById(this.id);this.el.style.zIndex="";var nodes=CAL.query("#cal-grid .slot");CAL.each(nodes,function(i,v){YAHOO.util.Dom.removeClass(nodes[i],"slot_active");});}
dd.onDragDrop=function(e,id){var slot=document.getElementById(id);YAHOO.util.Dom.removeClass(slot,"slot_active");if(CAL.dropped)
return;CAL.dropped=1;this.el.style.position="relative";this.el.style.cssFloat="none";if(CAL.view!='shared'){var box_id=this.id;var slot_id=id;var ex_slot_id=CAL.moved_from_cell;CAL.move_activity(box_id,slot_id,ex_slot_id);}else{var record=this.el.getAttribute("record");var tid=id;var tar=tid.split("_");var timestamp=tar[1];var tid=CAL.moved_from_cell;var tar=tid.split("_");var ex_timestamp=tar[1];for(i=0;i<CAL.shared_users_count;i++){var box_id=""+record+"____"+i;var slot_id="t_"+timestamp+"_"+i;var ex_slot_id="t_"+ex_timestamp+"_"+i;CAL.move_activity(box_id,slot_id,ex_slot_id);}}
var callback={success:function(o){try{res=eval("("+o.responseText+")");}catch(err){alert(CAL.lbl_error_saving);ajaxStatus.hideStatus();return;}
CAL.records_openable=true;CAL.disable_creating=false;CAL.update_vcal();ajaxStatus.hideStatus();}};ajaxStatus.showStatus(SUGAR.language.get('app_strings','LBL_SAVING'));var url="index.php?module=Calendar&action=Reschedule&sugar_body_only=true";var data={"current_module":this.el.getAttribute("module_name"),"record":this.el.getAttribute("record"),"datetime":slot.getAttribute("datetime")};YAHOO.util.Connect.asyncRequest('POST',url,callback,CAL.toURI(data));YAHOO.util.Dom.removeClass(slot,"slot_active");}
dd.onDragOver=function(e,id){var slot=document.getElementById(id);if(!YAHOO.util.Dom.hasClass(slot,"slot_active"))
YAHOO.util.Dom.addClass(slot,"slot_active");this.el.childNodes[0].childNodes[1].childNodes[0].innerHTML=slot.getAttribute('time');}
dd.onDragOut=function(e,id){var slot=document.getElementById(id);YAHOO.util.Dom.removeClass(slot,"slot_active");}}
CAL.arrange_slot("t_"+time_cell+suffix);}}
CAL.expand_record=function(id){CAL.tp1=setTimeout(function(){var el=CAL.get(id);if(el){el.style.height=parseInt(15*2-1)+"px";el.childNodes[1].style.display="block";}},350);}
CAL.unexpand_record=function(id){clearTimeout(CAL.tp1);var el=CAL.get(id);el.style.height=parseInt(15*CAL.get(id).getAttribute("duration_coef")-2)+"px";el.childNodes[1].style.display="none";CAL.cut_record(id);}
CAL.get_header_text=function(type,time_start,status,record){var start_text="<span class='start_time'>"+time_start+"</span> "+SUGAR.language.languages.app_list_strings[type+'_status_dom'][status];return start_text;}
CAL.cut_record=function(id){var el=CAL.get(id);if(!el)
return;var duration_coef=el.getAttribute("duration_coef");var real_celcount=CAL.celcount;if(CAL.view=='day'||CAL.view=='week')
real_celcount=CAL.cells_per_day;var celpos=0;var s=el.parentNode;while(s.previousSibling){celpos++;s=s.previousSibling;}
if(CAL.view=='week')
celpos=celpos+1;if(real_celcount-celpos-duration_coef<0)
duration_coef=real_celcount-celpos+1;el.style.height=parseInt(15*duration_coef-1)+"px";}
CAL.init_edit_dialog=function(params){CAL.editDialog=false;var rd=CAL.get("cal-edit");var content=CAL.get("edit-dialog-content");if(CAL.dashlet&&rd){document.getElementById("content").appendChild(rd);}
rd.style.width=params.width+"px";content.style.height=params.height+"px";content.style.overflow="auto";content.style.padding="0";CAL.editDialog=new YAHOO.widget.Dialog("cal-edit",{draggable:true,visible:false,modal:true,close:true,zIndex:10});var listeners=new YAHOO.util.KeyListener(document,{keys:27},{fn:function(){CAL.editDialog.cancel();}});CAL.editDialog.cfg.queueProperty("keylisteners",listeners);CAL.editDialog.cancelEvent.subscribe(function(e,a,o){CAL.close_edit_dialog();});rd.style.display="block";CAL.editDialog.render();rd.style.overflow="auto";rd.style.overflowX="hidden";rd.style.outline="0 none";rd.style.height="auto";}
CAL.open_edit_dialog=function(params){CAL.get("btn-delete").style.display="";CAL.editDialog.center();CAL.editDialog.show();var nodes=CAL.query("#cal-tabs li a");CAL.each(nodes,function(i,v){YAHOO.util.Event.on(nodes[i],'click',function(){CAL.select_tab(this.getAttribute("tabname"));});});var nodes_li=CAL.query("#cal-tabs li");CAL.each(nodes_li,function(j,v){CAL.dom.removeClass(nodes_li[j],"selected");if(j==0)
CAL.dom.addClass(nodes_li[j],"selected");});var nodes=CAL.query(".yui-nav");CAL.each(nodes,function(i,v){nodes[i].style.overflowX="visible";});}
CAL.close_edit_dialog=function(){CAL.reset_edit_dialog();}
CAL.remove_edit_dialog=function(){var rd_c=CAL.get("cal-edit_c");if(rd_c){rd_c.parentNode.removeChild(rd_c);}}
CAL.reset_edit_dialog=function(){var e;document.getElementById("form_content").innerHTML="";document.forms["CalendarEditView"].elements["current_module"].value="Meetings";CAL.get("radio_call").removeAttribute("disabled");CAL.get("radio_meeting").removeAttribute("disabled");CAL.get("radio_call").checked=false;CAL.get("radio_meeting").checked=true;CAL.get("send_invites").value="";if(e=CAL.get("record"))
e.value="";if(e=CAL.get("list_div_win"))
e.style.display="none";CAL.GR_update_focus("Meetings","");CAL.select_tab("cal-tab-1");QSFieldsArray=new Array();QSProcessedFieldsArray=new Array();}
CAL.select_tab=function(tid){var nodes_li=CAL.query("#cal-tabs li");CAL.each(nodes_li,function(j,v){CAL.dom.removeClass(nodes_li[j],"selected");});CAL.dom.addClass(CAL.get(tid+"-link").parentNode,"selected");var nodes=CAL.query("#cal-tabs .yui-content");CAL.each(nodes,function(i,v){nodes[i].style.display="none";});var nodes=CAL.query("#cal-tabs #"+tid);CAL.each(nodes,function(i,v){nodes[i].style.display="block";});}
CAL.GR_update_user=function(user_id){var callback={success:function(o){res=eval(o.responseText);GLOBAL_REGISTRY.focus.users_arr_hash=undefined;}};var data={"users":user_id};var url="index.php?module=Calendar&action=GetGRUsers&sugar_body_only=true";YAHOO.util.Connect.asyncRequest('POST',url,callback,CAL.toURI(data));}
CAL.GR_update_focus=function(module,record){if(record==""){GLOBAL_REGISTRY["focus"]={"module":module,users_arr:[],fields:{"id":"-1"}};SugarWidgetScheduler.update_time();}else{var callback={success:function(o){res=eval(o.responseText);SugarWidgetScheduler.update_time();if(CAL.record_editable){CAL.get("btn-save").removeAttribute("disabled");CAL.get("btn-delete").removeAttribute("disabled");CAL.get("btn-apply").removeAttribute("disabled");CAL.get("btn-send-invites").removeAttribute("disabled");}}};var url='index.php?module=Calendar&action=GetGR&sugar_body_only=true&type='+module+'&record='+record;YAHOO.util.Connect.asyncRequest('POST',url,callback,false);}}
CAL.toggle_settings=function(){var sd=CAL.get("settings_dialog");if(!CAL.settingsDialog){CAL.settingsDialog=new YAHOO.widget.Dialog("settings_dialog",{fixedcenter:true,draggable:false,visible:false,modal:true,close:true});var listeners=new YAHOO.util.KeyListener(document,{keys:27},{fn:function(){CAL.settingsDialog.cancel();}});CAL.settingsDialog.cfg.queueProperty("keylisteners",listeners);}
CAL.settingsDialog.cancelEvent.subscribe(function(e,a,o){CAL.get("form_settings").reset();});sd.style.display="block";CAL.settingsDialog.render();CAL.settingsDialog.show();}
CAL.toggle_whole_day=function(){var wd=CAL.get("whole_day");if(!wd.value)
wd.value="1";else
wd.value="";setTimeout(function(){if(wd.value){var nodes=CAL.query("#cal-grid .owt");CAL.each(nodes,function(i,v){nodes[i].style.display="block";});}else{var nodes=CAL.query("#cal-grid .owt");CAL.each(nodes,function(i,v){nodes[i].style.display="none";});}},25);}
CAL.fill_invitees=function(){CAL.get("user_invitees").value="";CAL.get("contact_invitees").value="";CAL.get("lead_invitees").value="";CAL.each(GLOBAL_REGISTRY['focus'].users_arr,function(i,v){var field_name="";if(v.module=="User")
field_name="user_invitees";if(v.module=="Contact")
field_name="contact_invitees";if(v.module=="Lead")
field_name="lead_invitees";var str=CAL.get(field_name).value;CAL.get(field_name).value=str+v.fields.id+",";});}
CAL.load_form=function(module_name,record,run_one_time){var e;var to_open=true;if(module_name=="Tasks")
to_open=false;if(to_open&&CAL.records_openable){CAL.get("form_content").style.display="none";CAL.get("btn-delete").setAttribute("disabled","disabled");CAL.get("btn-apply").setAttribute("disabled","disabled");CAL.get("btn-save").setAttribute("disabled","disabled");CAL.get("btn-send-invites").setAttribute("disabled","disabled");CAL.get("title-cal-edit").innerHTML=CAL.lbl_loading;ajaxStatus.showStatus(SUGAR.language.get('app_strings','LBL_LOADING'));CAL.open_edit_dialog();CAL.get("record").value="";var callback={success:function(o){try{res=eval("("+o.responseText+")");}catch(err){alert(CAL.lbl_error_loading);CAL.editDialog.cancel();ajaxStatus.hideStatus();return;}
if(res.success=='yes'){var fc=document.getElementById("form_content");CAL.script_evaled=false;fc.innerHTML='<script type="text/javascript">CAL.script_evaled = true;</script>'+res.html;if(!CAL.script_evaled){SUGAR.util.evalScript(res.html);}
CAL.get("record").value=res.record;CAL.get("current_module").value=res.module_name;var mod_name=res.module_name;if(mod_name=="Meetings")
CAL.get("radio_meeting").checked=true;if(mod_name=="Calls")
CAL.get("radio_call").checked=true;if(res.edit==1){CAL.record_editable=true;}else{CAL.record_editable=false;}
CAL.get("radio_call").setAttribute("disabled","disabled");CAL.get("radio_meeting").setAttribute("disabled","disabled");eval(res.gr);SugarWidgetScheduler.update_time();if(CAL.record_editable){CAL.get("btn-save").removeAttribute("disabled");CAL.get("btn-delete").removeAttribute("disabled");CAL.get("btn-apply").removeAttribute("disabled");CAL.get("btn-send-invites").removeAttribute("disabled");}
CAL.get("form_content").style.display="";CAL.get("title-cal-edit").innerHTML=CAL.lbl_edit;ajaxStatus.hideStatus();setTimeout(function(){enableQS(false);disableOnUnloadEditView();},500);}else
alert(CAL.lbl_error_loading);},failure:function(){alert(CAL.lbl_error_loading);}};var url="index.php?module=Calendar&action=QuickEdit&sugar_body_only=true";var data={"current_module":module_name,"record":record};YAHOO.util.Connect.asyncRequest('POST',url,callback,CAL.toURI(data));}
CAL.records_openable=true;}
CAL.remove_shared=function(record_id){var e;var cell_id;if(e=CAL.get(record_id+'____'+"0"))
cell_id=e.parentNode.id;if(typeof cell_id!="undefined"){var cell_id_arr=cell_id.split("_");cell_id="t_"+cell_id_arr[1];}
CAL.each(CAL.shared_users,function(i,v){if(e=CAL.get(record_id+'____'+v))
e.parentNode.removeChild(e);CAL.arrange_slot(cell_id+'_'+v);});}
CAL.add_item=function(item){if(CAL.view!='shared'){CAL.add_item_to_grid(item);}else{CAL.remove_shared(item.record);record_id=item.record;var timestamp=item.timestamp;CAL.each(item.users,function(i,v){var rec=item;rec.timestamp=timestamp;rec.user_id=v;rec.record=record_id;CAL.add_item_to_grid(rec);CAL.each(rec.arr_rec,function(j,r){rec.record=r.record;rec.timestamp=r.timestamp;CAL.add_item_to_grid(rec);});});}
CAL.arrange_advanced();}
CAL.move_activity=function(box_id,slot_id,ex_slot_id){var u,s;if(u=CAL.get(box_id)){if(s=CAL.get(slot_id)){s.appendChild(u);CAL.arrange_column(document.getElementById(slot_id).parentNode);CAL.arrange_column(document.getElementById(ex_slot_id).parentNode);CAL.update_dd.fire();CAL.cut_record(box_id);var start_text=CAL.get_header_text(CAL.act_types[u.getAttribute('module_name')],s.getAttribute('time'),u.getAttribute('status'),u.getAttribute('record'));var date_field="date_start";if(u.getAttribute('module_name')=="Tasks")
date_field="date_due";u.setAttribute(date_field,s.getAttribute("datetime"));u.childNodes[0].childNodes[1].innerHTML=start_text;}}}
CAL.change_activity_type=function(mod_name){if(typeof CAL.current_params.module_name!="undefined")
if(CAL.current_params.module_name==mod_name)
return;var e,user_name,user_id,date_start;CAL.get("title-cal-edit").innerHTML=CAL.lbl_loading;document.forms["CalendarEditView"].elements["current_module"].value=mod_name;CAL.current_params.module_name=mod_name;QSFieldsArray=new Array();QSProcessedFieldsArray=new Array();CAL.load_create_form(CAL.current_params);}
CAL.load_create_form=function(params){ajaxStatus.showStatus(SUGAR.language.get('app_strings','LBL_LOADING'));var callback={success:function(o){try{res=eval("("+o.responseText+")");}catch(err){alert(CAL.lbl_error_loading);CAL.editDialog.cancel();ajaxStatus.hideStatus();return;}
if(res.success=='yes'){var fc=document.getElementById("form_content");CAL.script_evaled=false;fc.innerHTML='<script type="text/javascript">CAL.script_evaled = true;</script>'+res.html;if(!CAL.script_evaled){SUGAR.util.evalScript(res.html);}
CAL.get("record").value="";CAL.get("current_module").value=res.module_name;var mod_name=res.module_name;if(res.edit==1){CAL.record_editable=true;}else{CAL.record_editable=false;}
CAL.get("title-cal-edit").innerHTML=CAL.lbl_create_new;setTimeout(function(){SugarWidgetScheduler.update_time();enableQS(false);disableOnUnloadEditView();},500);ajaxStatus.hideStatus();}else{alert(CAL.lbl_error_loading);ajaxStatus.hideStatus();}},failure:function(){alert(CAL.lbl_error_loading);ajaxStatus.hideStatus();}};var url="index.php?module=Calendar&action=QuickEdit&sugar_body_only=true";var data={"current_module":params.module_name,"assigned_user_id":params.user_id,"assigned_user_name":params.user_name,"date_start":params.date_start};YAHOO.util.Connect.asyncRequest('POST',url,callback,CAL.toURI(data));}
CAL.dialog_create=function(cell){var e,user_id,user_name;CAL.get("title-cal-edit").innerHTML=CAL.lbl_loading;CAL.open_edit_dialog();CAL.get("btn-delete").setAttribute("disabled","disabled");CAL.get("btn-delete").style.display="none";var module_name=CAL.get("current_module").value;if(CAL.view=='shared'){user_name=cell.parentNode.parentNode.parentNode.getAttribute("user_name");user_id=cell.parentNode.parentNode.parentNode.getAttribute("user_id");CAL.GR_update_user(user_id);}else{user_id=CAL.current_user_id;user_name=CAL.current_user_name;CAL.GR_update_user(CAL.current_user_id);}
var params={'module_name':module_name,'user_id':user_id,'user_name':user_name,'date_start':cell.getAttribute("datetime")};CAL.current_params=params;CAL.load_create_form(CAL.current_params);}
CAL.dialog_save=function(){ajaxStatus.showStatus(SUGAR.language.get('app_strings','LBL_SAVING'));CAL.get("title-cal-edit").innerHTML=CAL.lbl_saving;CAL.fill_invitees();var callback={success:function(o){try{res=eval("("+o.responseText+")");}catch(err){alert(CAL.lbl_error_saving);CAL.editDialog.cancel();ajaxStatus.hideStatus();return;}
if(res.success=='yes'){CAL.add_item(res);CAL.editDialog.cancel();CAL.update_vcal();ajaxStatus.hideStatus();}else{alert(CAL.lbl_error_saving);ajaxStatus.hideStatus();}},failure:function(){alert(CAL.lbl_error_saving);ajaxStatus.hideStatus();}};var url="index.php?module=Calendar&action=SaveActivity&sugar_body_only=true";YAHOO.util.Connect.setForm(CAL.get("CalendarEditView"));YAHOO.util.Connect.asyncRequest('POST',url,callback,false);}
CAL.dialog_apply=function(){ajaxStatus.showStatus(SUGAR.language.get('app_strings','LBL_SAVING'));CAL.get("title-cal-edit").innerHTML=CAL.lbl_saving;CAL.fill_invitees();var e;if(e=CAL.get("radio_call"))
e.setAttribute("disabled","disabled");if(e=CAL.get("radio_meeting"))
e.setAttribute("disabled","disabled");var callback={success:function(o){try{res=eval("("+o.responseText+")");}catch(err){alert(CAL.lbl_error_saving);CAL.editDialog.cancel();ajaxStatus.hideStatus();return;}
if(res.success=='yes'){var e;CAL.get("record").value=res.record;CAL.add_item(res);CAL.update_vcal();CAL.get("title-cal-edit").innerHTML=CAL.lbl_edit;if(e=CAL.get("send_invites"))
e.removeAttribute("checked");ajaxStatus.hideStatus();CAL.get("btn-delete").removeAttribute("disabled");CAL.get("btn-delete").style.display="";}else{alert(CAL.lbl_error_saving);ajaxStatus.hideStatus();}},failure:function(){alert(CAL.lbl_error_saving);ajaxStatus.hideStatus();}};var url="index.php?module=Calendar&action=SaveActivity&sugar_body_only=true";YAHOO.util.Connect.setForm(CAL.get("CalendarEditView"));YAHOO.util.Connect.asyncRequest('POST',url,callback,false);}
CAL.dialog_remove=function(){CAL.deleted_id=CAL.get("record").value;CAL.deleted_module=CAL.get("current_module").value;var delete_recurring=false;var callback={success:function(o){try{res=eval("("+o.responseText+")");}catch(err){alert(CAL.lbl_error_saving);CAL.editDialog.cancel();ajaxStatus.hideStatus();return;}
var e,cell_id;if(e=CAL.get(CAL.deleted_id))
cell_id=e.parentNode.id;if(CAL.view=='shared')
CAL.remove_shared(CAL.deleted_id);if(e=CAL.get(CAL.deleted_id))
e.parentNode.removeChild(e);CAL.arrange_advanced();},failure:function(){alert(CAL.lbl_error_saving);}};var data={"current_module":CAL.deleted_module,"record":CAL.deleted_id,"delete_recurring":delete_recurring};var url="index.php?module=Calendar&action=Remove&sugar_body_only=true";YAHOO.util.Connect.asyncRequest('POST',url,callback,CAL.toURI(data));CAL.editDialog.cancel();}
CAL.show_additional_details=function(id){var obj=CAL.get(id);var record=obj.getAttribute("record");mod=obj.getAttribute("module_name");var atype=CAL.act_types[mod];var subj=obj.getAttribute("subj");var date_start=obj.getAttribute("date_start");var duration=obj.getAttribute("dur");var desc=obj.getAttribute("desc");var detail=parseInt(obj.getAttribute("detail"));var edit=parseInt(obj.getAttribute("edit"));var date_str="";if(date_start!="")
date_str+='<b>'+CAL.lbl_start+':</b> '+date_start;if(mod=="Tasks"){var date_due=obj.getAttribute("date_due");if(date_due!=""){if(date_str!="")
date_str+="<br>";date_str+='<b>'+CAL.lbl_due+':</b> '+date_due;}}
var related="";if(obj.getAttribute("parent_id")!=''&&obj.getAttribute("parent_name")!='')
related="<b>"+CAL.lbl_related+":</b> <a href='index.php?module="+obj.getAttribute("parent_type")+"&action=DetailView&record="+obj.getAttribute("parent_id")+"'>"+obj.getAttribute("parent_name")+"</a>"+"<br>";if(desc!='')
desc='<b>'+CAL.lbl_desc+':</b><br> '+desc+'<br>';if(subj=='')
return"";var date_lbl=CAL.lbl_start;if(duration!=""){var duration_text='<b>'+CAL.lbl_duration+':</b> '+duration+'<br>';if(mod=="Tasks"){date_lbl=CAL.lbl_due;duration_text="";}}else
duration_text="";var caption="<div style='float: left;'>"+CAL.lbl_title+"</div><div style='float: right;'>";if(edit){caption+="<a title=\'"+SUGAR.language.get('app_strings','LBL_EDIT_BUTTON')+"\' href=\'index.php?module="+mod+"&action=EditView&record="+record+"\'><img border=0  src=\'"+CAL.img_edit_inline+"\'></a>";}
if(detail){caption+="<a title=\'"+SUGAR.language.get('app_strings','LBL_VIEW_BUTTON')+"\' href=\'index.php?module="+mod+"&action=DetailView&record="+record+"\'><img border=0  style=\'margin-left:2px;\' src=\'"+CAL.img_view_inline+"\'></a>";}
caption+="<a title=\'"+SUGAR.language.get('app_strings','LBL_ADDITIONAL_DETAILS_CLOSE_TITLE')+"\' href=\'javascript:return cClick();\' onclick=\'javascript:return cClick();\'><img border=0  style=\'margin-left:2px;margin-right:2px;\' src=\'"+CAL.img_close+"\'></a></div>";var body='<b>'+CAL.lbl_name+':</b> '+subj+'<br>'+date_str+'<br>'+duration_text+related+desc;return overlib(body,CAPTION,caption,DELAY,200,STICKY,MOUSEOFF,200,WIDTH,300,CLOSETEXT,'',CLOSETITLE,SUGAR.language.get('app_strings','LBL_ADDITIONAL_DETAILS_CLOSE_TITLE'),CLOSECLICK,FGCLASS,'olFgClass',CGCLASS,'olCgClass',BGCLASS,'olBgClass',TEXTFONTCLASS,'olFontClass',CAPTIONFONTCLASS,'olCapFontClass ecCapFontClass',CLOSEFONTCLASS,'olCloseFontClass');}
CAL.toggle_shared_edit=function(id){if(document.getElementById(id).style.display=='none'){document.getElementById(id).style.display='inline'
if(document.getElementById(id+"link")!=undefined){document.getElementById(id+"link").style.display='none';}}else{document.getElementById(id).style.display='none'
if(document.getElementById(id+"link")!=undefined){document.getElementById(id+"link").style.display='inline';}}}
CAL.goto_date_call=function(){var date_string=CAL.get("goto_date").value;var date_arr=[];date_arr=date_string.split("/");window.location.href="index.php?module=Calendar&view="+CAL.view+"&day="+date_arr[1]+"&month="+date_arr[0]+"&year="+date_arr[2];}
CAL.toURI=function(a){t=[];for(x in a){if(!(a[x].constructor.toString().indexOf('Array')==-1)){for(i in a[x])
t.push(x+"[]="+encodeURIComponent(a[x][i]));}else
t.push(x+"="+encodeURIComponent(a[x]));}
return t.join("&");}
CAL.each=function(object,callback){if(typeof object=="undefined")
return;var name,i=0,length=object.length,isObj=(length===undefined)||(typeof(object)==="function");if(isObj){for(name in object){if(callback.call(object[name],name,object[name])===false){break;}}}else{for(;i<length;){if(callback.call(object[i],i,object[i++])===false){break;}}}
return object;}
CAL.update_vcal=function(){var v=CAL.current_user_id;var callback={success:function(result){if(typeof GLOBAL_REGISTRY.freebusy=='undefined'){GLOBAL_REGISTRY.freebusy=new Object();}
if(typeof GLOBAL_REGISTRY.freebusy_adjusted=='undefined'){GLOBAL_REGISTRY.freebusy_adjusted=new Object();}
GLOBAL_REGISTRY.freebusy[v]=SugarVCalClient.parseResults(result.responseText,false);GLOBAL_REGISTRY.freebusy_adjusted[v]=SugarVCalClient.parseResults(result.responseText,true);SugarWidgetScheduler.update_time();}};var url="vcal_server.php?type=vfb&source=outlook&user_id="+v;YAHOO.util.Connect.asyncRequest('GET',url,callback,false);}
CAL.fit_grid=function(){var day_width;var cal_width=document.getElementById("cal-grid").parentNode.parentNode.offsetWidth;var left_width=80;if(CAL.view=="day")
day_width=parseInt((cal_width-left_width));else
day_width=parseInt((cal_width-left_width)/ 7);var nodes=CAL.query("#cal-grid div.day_col");CAL.each(nodes,function(i,v){nodes[i].style.width=day_width+"px";});document.getElementById("cal-grid").style.visibility="";}
YAHOO.util.DDCAL=function(id,sGroup,config){this.cont=config.cont;YAHOO.util.DDCAL.superclass.constructor.apply(this,arguments);}
YAHOO.extend(YAHOO.util.DDCAL,YAHOO.util.DD,{cont:null,init:function(){YAHOO.util.DDCAL.superclass.init.apply(this,arguments);this.initConstraints();CAL.update_dd.subscribe(function(type,args,dd){dd.resetConstraints();dd.initConstraints();},this);},initConstraints:function(){var region=YAHOO.util.Dom.getRegion(this.cont);var el=this.getEl();var xy=YAHOO.util.Dom.getXY(el);var width=parseInt(YAHOO.util.Dom.getStyle(el,'width'),10);var height=parseInt(YAHOO.util.Dom.getStyle(el,'height'),10);var left=xy[0]-region.left;var right=region.right-xy[0]-width;var top=xy[1]-region.top;var bottom=region.bottom-xy[1]-height;this.setXConstraint(left,right);this.setYConstraint(top,bottom);}});CAL.remove_edit_dialog();var cal_loaded=true;
