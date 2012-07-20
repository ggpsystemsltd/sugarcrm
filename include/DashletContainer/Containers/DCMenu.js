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
var DCMenu=YUI({combine:true,timeout:10000,base:"include/javascript/yui3/build/",comboBase:"index.php?entryPoint=getYUIComboFile&"}).use('event','dd-plugin','anim','cookie','json','node-menunav','io-base','io-form','io-upload-iframe',"overlay",function(Y){var requests={};var overlays=[];var overlayDepth=0;var menuFunctions={};var lastIconChange=null;var isRTL=(typeof(rtl)!="undefined")?true:false;function getOverlay(depth,modal){if(!depth)depth=0;if(typeof overlays[depth]=='undefined'){overlays[depth]=new Y.Overlay({bodyContent:"",zIndex:21+depth,shim:false,visibility:false});overlays[depth].after('render',function(e){this.get('boundingBox').plug(Y.Plugin.Drag,{handles:['.hd']});});overlays[depth].show=function(){this.visible=true;this.get('boundingBox').setStyle('position','absolute');this.get('boundingBox').setStyle('visibility','visible');if(Y.one('#dcboxbody')){Y.one('#dcboxbody').setStyle('display','');}}
overlays[depth].hide=function(){this.visible=false;this.get('boundingBox').setStyle('visibility','hidden');if(this.get("modal"))
this.toggleModal();}
overlays[depth].toggleModal=function(){var mask=Y.one("#dcmask")
if(this.get("modal"))
{if(mask){mask.setStyle("display","none");}
this.set("modal",false);}
else{if(mask){mask.setStyle("display","block");}
else{mask=document.createElement("div");mask.className="mask";mask.id="dcmask";mask.style.width=mask.style.height="100%";mask.style.position="fixed";mask.style.display="block";mask.style.zIndex=19;document.body.appendChild(mask);}
this.set("modal",true);}}}
var dcmenuContainer=Y.one('#dcmenuContainer');var dcmenuContainerHeight=dcmenuContainer.get('offsetHeight');overlays[depth].set('xy',[20,dcmenuContainerHeight]);overlays[depth].render();if(modal)
overlays[depth].toggleModal();return overlays[depth]}
DCMenu.menu=function(module,title,modal){if(typeof(lastLoadedMenu)!='undefined'&&lastLoadedMenu==module){return;}
lastLoadedMenu=module;if(typeof menuFunctions[module]=='undefined'){loadView(module,'index.php?source_module='+this.module+'&record='+this.record+'&action=Quickcreate&module='+module,null,null,title,{modal:modal?true:false});}}
DCMenu.displayModuleMenu=function(obj,module){loadView(module,'index.php?module='+module+'&action=ajaxmenu',0,'moduleTabLI_'+module);}
DCMenu.closeTopOverlay=function(){overlays[overlays.length-1].hide();}
DCMenu.closeOverlay=function(depth){DCMenu.closeQView();var i=0;while(i<overlays.length){if(!depth||i>=depth){if(i==depth&&!overlays[i].visible){overlays[i].show();}else{if(typeof(overlays[i].bodyNode)!='undefined'&&typeof(overlays[i].bodyNode._node)!='undefined'&&typeof(overlays[i].bodyNode._node.getElementsByTagName('form')[0])!='undefined'){var warnMsg=onUnloadEditView(overlays[i].bodyNode._node.getElementsByTagName('form')[0]);if(warnMsg!=null){if(confirm(warnMsg)){disableOnUnloadEditView(overlays[i].bodyNode._node.getElementsByTagName('form')[0]);}else{i++;continue;}}}
overlays[i].hide();overlays[i].set('bodyContent',"");}}
i++;}
DCMenu.hideQEPanel();}
DCMenu.minimizeOverlay=function(){Y.one('#dcboxbody').setStyle('display','none');Y.one('#dcboxbody').setStyle('width','750px;');}
function setBody(data,depth,parentid,type,title,extraButton){var params={};if(typeof(extraButton)=="object"&&extraButton!=null)
{params=extraButton;extraButton=params.extraButton?params.extraButton:false;}
if(typeof(data.html)=='undefined')data={html:data};if(SUGAR.util.isLoginPage(data.html))
return false;DCMenu.closeOverlay(depth);var overlay=getOverlay(depth,params.modal);ua=navigator.userAgent.toLowerCase();isIE7=ua.indexOf('msie 7')!=-1;if((typeof(title)=='undefined'||title=='')&&(typeof(data.title)!='undefined')){title=data.title;}
var style='position:fixed';if(parentid){overlay.set("align",{node:"#"+parentid,points:[Y.WidgetPositionAlign.TL,Y.WidgetPositionAlign.BL]});overlay.set('y',42);}
var content='';if(false&&depth==0){content+='<div id="dcboxtitle">'
if(typeof data.title!='undefined'){content+='<div style="float:left"><a href="'+data.url+'">'+data.title+'</a></div>';}
content+='<div class="close"><a id="dcmenu_close_link" href="#" onclick="DCMenu.closeOverlay(); return false;">[x]</a><a href="#" onclick="DCMenu.minimizeOverlay(); return false;">[-]</a></div></div>';}
content+='<div style="'+style+'"><div id="dcboxbody"  class="'+parentid+'"><div class="dashletPanel dc"><div class="hd" id="dchead">';if(title!==undefined)
content+='<div id="dctitle">'+title+'</div>';else
if(typeof type!='undefined')
content+='<div id="dctitle">'+type+'</div>';content+='<div class="close">';if(typeof(extraButton)=="string"){content+=extraButton}
content+='<a id="dcmenu_close_link" href="#" onclick="lastLoadedMenu=undefined;DCMenu.closeOverlay(); return false;"><img src="index.php?entryPoint=getImage&themeName='+SUGAR.themes.theme_name+'&imageName=close_button_24.png"></a></div></div><div class="bd"><div class="dccontent">'+data.html+'</div></div></div>';if(typeof(resetEvalBool)!='undefined'&&resetEvalBool==true){resetEvalBool=false;evalHappened=false;}
content='<script> var evalHappened = true; var resetEvalBool=true; </script>'+content;overlay.set('bodyContent',content);if(typeof(data.eval)!='undefined'&&data.eval&&(typeof(evalHappened)=='undefined'||evalHappened==false)){SUGAR.util.evalScript(content);}
evalHappened=false;overlay.show();return overlay;}
DCMenu.showView=function(data,parent_id){setBody(data,0,parent_id);}
DCMenu.iFrame=function(url,width,height){setBody("<iframe style='border:0px;height:"+height+";width:"+width+"'src='"+url+"'></iframe>");}
DCMenu.addToFavorites=function(item,module,record){Y.one(item).replaceClass('off','on');Y.one(item).setAttribute("title",SUGAR.language.get('app_strings','LBL_REMOVE_FROM_FAVORITES'));item.onclick=function(){DCMenu.removeFromFavorites(this,module,record);}
quickRequest('favorites','index.php?to_pdf=1&module=SugarFavorites&action=save&fav_id='+record+'&fav_module='+module);}
DCMenu.removeFromFavorites=function(item,module,record){Y.one(item).replaceClass('on','off');Y.one(item).setAttribute("title",SUGAR.language.get('app_strings','LBL_ADD_TO_FAVORITES'));item.onclick=function(){DCMenu.addToFavorites(this,module,record);}
quickRequest('favorites','index.php?to_pdf=1&module=SugarFavorites&action=delete&fav_id='+record+'&fav_module='+module);}
DCMenu.tagFavorites=function(item,module,record,tag){quickRequest('favorites','index.php?to_pdf=1&module=SugarFavorites&action=tag&fav_id='+record+'&fav_module='+module+'&tag='+tag);}
function quickRequest(type,url,success)
{if(typeof success=='undefined'||typeof success!='function')
{success=function(id,data){}}
var id=Y.io(url,{method:'POST',on:{success:success,failure:function(id,data){}}});}
DCMenu.pluginList=function(){quickRequest('plugins','index.php?to_pdf=1&module=Home&action=pluginList',pluginResults);}
pluginResults=function(id,data){var overlay=setBody(data.responseText,0,'globalLinks');overlay.set('y',90);}
DCMenu.history=function(q){quickRequest('spot','index.php?to_pdf=1&module='+this.module+'&action=modulelistmenu',spotResults);}
Y.spot=function(q){DCMenu.closeQView();ajaxStatus.showStatus(SUGAR.language.get('app_strings','LBL_LOADING'));quickRequest('spot','index.php?to_pdf=1&module='+this.module+'&action=spot&record='+this.record+'&q='+encodeURIComponent(q),spotResults);}
DCMenu.spotZoom=function(q,module,offset){quickRequest('spot','index.php?to_pdf=1&module='+this.module+'&action=spot&record='+this.record+'&q='+encodeURIComponent(q)+'&zoom='+module+'&offset='+offset,spotResults);}
spotResults=function(id,data){var overlay=setBody(data.responseText,0,'sugar_spot_search');overlay.set('x',overlay.get('x')-60);ajaxStatus.hideStatus();var focuselement=document.getElementById('sugaraction1');if(typeof(focuselement)!='undefined'&&focuselement!=null){focuselement.focus();}}
DCMenu.showQELoadingPanel=function(){if(!DCMenu.qePanel)
{DCMenu.qePanel=new YAHOO.widget.Panel('quickEditWindow',{width:"1050px",draggable:true,close:true,constraintoviewport:true,fixedcenter:false,script:true,modal:true});}
var p=DCMenu.qePanel;p.setHeader(SUGAR.language.get('app_strings','LBL_EMAIL_PERFORMING_TASK'));p.setBody(SUGAR.language.get('app_strings','LBL_EMAIL_ONE_MOMENT'));p.render(document.body);p.show();p.center();}
DCMenu.miniDetailView=function(module,id){DCMenu.showQELoadingPanel();YAHOO.util.Connect.asyncRequest('GET','index.php?to_pdf=1&module='+module+'&action=quick&record='+id,{success:DCMenu.miniDetailViewResults});}
DCMenu.miniEditView=function(module,id,refreshListID,refreshDashletID){DCMenu.showQELoadingPanel();YAHOO.util.Connect.asyncRequest('GET','index.php?to_pdf=1&module='+module+'&action=Quickedit&record='+id,{success:DCMenu.miniDetailViewResults});if(typeof(refreshListID)!='undefined'&&refreshListID!=''){DCMenu.qe_refresh='SUGAR.ajaxUI.loadContent("index.php?module='+module+'&action=index&ignore='+new Date().getTime()+'");';}
if(typeof(refreshDashletID)!='undefined'&&refreshDashletID!=''){DCMenu.qe_refresh='SUGAR.mySugar.retrieveDashlet("'+refreshDashletID+'");';}}
DCMenu.miniDetailViewResults=function(o){var p=DCMenu.qePanel;var r=Y.JSON.parse(o.responseText);if(typeof(r.scriptOnly)!='undefined'&&typeof(r.scriptOnly)=='string'&&r.scriptOnly.length>0){SUGAR.util.evalScript(r.scriptOnly);}else{DCMenu.jsEvalled=false;p.setHeader(r.title);p.setBody("<script type='text/javascript'>DCMenu.jsEvalled = true</script>"+r.html);if(!DCMenu.jsEvalled)
SUGAR.util.evalScript(r.html);DCMenu.qePanel.center();}}
DCMenu.hideQEPanel=function(){if(DCMenu.qePanel)
{DCMenu.qePanel.setBody("");DCMenu.qePanel.hide();}}
DCMenu.save=function(id){ajaxStatus.showStatus(SUGAR.language.get('app_strings','LBL_SAVING'));Y.io('index.php',{method:'POST',form:{id:id,upload:true},on:{complete:function(id,data){try{var returnData=Y.JSON.parse(data.responseText);switch(returnData.status){case'dupe':location.href='index.php?'+returnData.get;break;case'success':ajaxStatus.flashStatus(SUGAR.language.get('app_strings','LBL_SAVED'),2000);break;}}
catch(e){ajaxStatus.flashStatus(SUGAR.language.get('app_strings','LBL_SAVED'),2000);}
if(typeof(DCMenu.qe_refresh)=='string'){eval(DCMenu.qe_refresh);}}}});lastLoadedMenu=undefined;DCMenu.closeOverlay();return false;}
DCMenu.submitForm=function(id,status,title){ajaxStatus.showStatus(status);Y.io('index.php',{method:'POST',form:{id:id,upload:true},on:{complete:function(id,data){}}});lastLoadedMenu=undefined;return false;}
DCMenu.hostMeeting=function(){window.open(DCMenu.hostMeetingUrl,'hostmeeting');}
DCMenu.loadView=function(type,url,depth,parentid,title,extraButton){if(extraButton==undefined){extraButton=null;}
var id=Y.io(url,{method:'POST',on:{success:function(id,data){try{jData=Y.JSON.parse(data.responseText);setBody(jData,requests[id].depth,requests[id].parentid,title,extraButton);var head=Y.Node.get('head')
for(i in jData['scripts']){var script=document.createElement('script');script.src=jData['scripts'][i];head.appendChild(script);}
SUGAR.util.evalScript(jData.html);setTimeout("enableQS();",1000);}catch(err){DCMenu.jsEvalled=false;overlay=setBody({html:"<script type='text/javascript'>DCMenu.jsEvalled = true</script>"+data.responseText},requests[id].depth,requests[id].parentid,requests[id].type,title,extraButton);var dcmenuSugarCube=Y.one('#dcmenuSugarCube');var dcboxbody=Y.one('#dcboxbody');var dcmenuSugarCubeX=dcmenuSugarCube.get('offsetLeft');var dcboxbodyWidth=dcboxbody.get('offsetWidth');Y.one('#dcboxbody').setStyle('margin','0 5% 0 0');if(isSafari){dcboxbody.setStyle("width",dcboxbodyWidth+"px");}
if(SUGAR.isIE){var dchead=Y.one('#dchead');var dcheadwidth=dchead.get('offsetWidth');Y.one('#dctitle').setStyle("width",dcheadwidth+"px");}
if(isRTL){overlay.set('x',dcmenuSugarCubeX-dcboxbodyWidth);}
if(!DCMenu.jsEvalled)
SUGAR.util.evalScript(data.responseText);setTimeout("enableQS();",1000);}},failure:function(id,data){}}});requests[id.id]={type:type,url:url,parentid:parentid,depth:depth,extraButton:extraButton};}
var loadView=Y.loadView;DCMenu.notificationsList=function(q){quickRequest('notifications','index.php?to_pdf=1&module=Notifications&action=quicklist',notificationsListDisplay);}
notificationsListDisplay=function(id,data){var overlay=setBody(data.responseText,0,'dcmenuSugarCube');var dcmenuSugarCube=Y.one('#dcmenuSugarCube');var dcboxbody=Y.one('#dcboxbody');var dcmenuSugarCubeX=dcmenuSugarCube.get('offsetLeft');var dcmenuSugarCubeWidth=dcmenuSugarCube.get('offsetWidth');var dcboxbodyWidth=dcboxbody.get('offsetWidth');if(isRTL){overlay.set('x',(dcmenuSugarCubeX+dcmenuSugarCubeWidth)-dcboxbodyWidth);}}
DCMenu.viewMiniNotification=function(id){quickRequest('notifications','index.php?to_pdf=1&module=Notifications&action=quickView&record='+id,notificationDisplay);}
notificationDisplay=function(id,data){var jData=Y.JSON.parse(data.responseText);setBody(jData.contents,0);decrementUnreadNotificationCount();}
decrementUnreadNotificationCount=function(){var oldValue=parseInt(document.getElementById('notifCount').innerHTML);document.getElementById('notifCount').innerHTML=oldValue-1;}
updateNotificationNumber=function(id,data){var jData=Y.JSON.parse(data.responseText);var oldValue=parseInt(document.getElementById('notifCount').innerHTML);document.getElementById('notifCount').innerHTML=parseInt(jData.unreadCount)+oldValue;}
DCMenu.checkForNewNotifications=function(){quickRequest('notifications','index.php?to_pdf=1&module=Notifications&action=checkNewNotifications',updateNotificationNumber);}
DCMenu.showQuickViewIcon=function(id){var gs_div=document.getElementById('gs_div_'+id);gs_div.style.visibility='visible';}
DCMenu.hideQuickViewIcon=function(id){var gs_div=document.getElementById('gs_div_'+id);gs_div.style.visibility='hidden';}
DCMenu.closeQView=function()
{if(!overlays['sqv']||!Y.one('#dcboxbody'))
{return;}
var o=overlays['sqv'];var animX=Y.one('#dcboxbody').getX();var animY=o.get("y");var animDCcont=new Y.Anim({node:o.get("boundingBox"),to:{xy:[animX,animY]}});animDCcont.on('end',function(){o.visible=false;o.get('boundingBox').setStyle('visibility','hidden');});animDCcont.set('duration',.5);animDCcont.set('easing',Y.Easing.easeOut);animDCcont.run();}
DCMenu.showQuickView2=function(module,recordID)
{var q=document.getElementById('sugar_spot_search').value;quickRequest('showGAView','index.php?module='+module+'&action=gs&record='+recordID+'&q='+encodeURIComponent(q),function(id,data){var dcgscontent=Y.one('#dcgscontent');dcgscontent.set('innerHTML',data.responseText);var animDCcont=new Y.Anim({node:dcgscontent,to:{height:500}});animDCcont.run();});var animDCcont=new Y.Anim({node:'#dccontent',to:{height:500}});animDCcont.set('duration',0.5);animDCcont.set('easing',Y.Easing.easeOut);animDCcont.run();var qvDepth='sqv';if(typeof(overlays[qvDepth])=='undefined')
{overlays[qvDepth]=new Y.Overlay({bodyContent:'',zIndex:5,height:500,width:320,shim:false,visibility:true});}
else
{var dcgscontent=Y.one('#dcgscontent');dcgscontent.set('innerHTML','<div style="height:400px;width:300px;"><img src="themes/default/images/img_loading.gif"/></div>');if(!overlays[qvDepth].visible)
{overlays[qvDepth].show();}
return;}
content='<div id="dcboxbodyqv" class="sugar_spot_search" style="position: fixed;"><div class="dashletPanel dc"><div class="hd"><div class="tl"></div><div><a id="dcmenu_close_link" href="javascript:DCMenu.closeQView()"><img src="index.php?entryPoint=getImage&themeName='+SUGAR.themes.theme_name+'&imageName=close_button_24.png"></a></div></div><div class="tr"></div><div class="bd"><div class="ml"></div><div class="bd-center"><div class="dccontent" id="dcgscontent"><br><div style="height:400px;width:300px;"><img src="themes/default/images/img_loading.gif"/><br></div></div></div></div><div class="ft"><div class="bl"></div><div class="ft-center"></div><div class="br"></div></div></div></div></div></div></div></div></div>';overlays[qvDepth].set("bodyContent",content);overlays[qvDepth].set("align",{node:"#dcboxbody",points:[Y.WidgetPositionExt.TR,Y.WidgetPositionExt.TR]});overlays[qvDepth].visible=true;overlays[qvDepth].show=function()
{this.visible=true;this.get('boundingBox').setStyle('visibility','visible');var shim=10;var animX=this.get("x")-this.get("width")-shim;var animY=this.get("y");var animDCcont=new Y.Anim({node:this.get("boundingBox"),to:{xy:[animX,animY],height:500}});animDCcont.set('duration',.5);animDCcont.set('easing',Y.Easing.easeOut);animDCcont.run();}
overlays[qvDepth].after('render',function(e){this.show();});overlays[qvDepth].render();}
DCMenu.showQuickView=function(module,recordID)
{var qvDepth='sqv';var boxBody=Y.one('#dcboxbody');if(typeof(overlays[qvDepth])=='undefined')
{overlays[qvDepth]=new Y.Overlay({bodyContent:'',zIndex:5,height:boxBody._node.clientHeight,width:320,shim:false,visibility:true});}
var q=document.getElementById('sugar_spot_search').value;url='index.php?module='+module+'&action=gs&record='+recordID+'&q='+encodeURIComponent(q);quickRequest('showGAView','index.php?module='+module+'&action=gs&record='+recordID+'&q='+encodeURIComponent(q),function(id,data)
{var content='<div id="dcboxbodyqv" class="sugar_spot_search" style="position: fixed;">';content+='<div class="dashletPanel dc"><div class="hd">';if(SUGAR.themes.theme_name=='RTL')
{content+='<div><div style="float:right"><a id="dcmenu_close_link" href="javascript:DCMenu.closeQView()">';content+='<img src="index.php?entryPoint=getImage&themeName='+SUGAR.themes.theme_name+'&imageName=close_button_24.png">';content+='</a></div></div></div><div class="tr"></div><div class="bd">';}else{content+='<div><a id="dcmenu_close_link" href="javascript:DCMenu.closeQView()">';content+='<img src="index.php?entryPoint=getImage&themeName='+SUGAR.themes.theme_name+'&imageName=close_button_24.png">';content+='</a></div></div><div class="tr"></div><div class="bd">';}
content+='<div><div class="dccontent" id="dcgscontent">'+data.responseText;content+='</div></div></div>';content+='</div></div></div></div></div></div></div></div>';overlays[qvDepth].set("bodyContent",content);overlays[qvDepth].set("align",{node:"#dcboxbody",points:[Y.WidgetPositionAlign.TR,Y.WidgetPositionAlign.TR]});overlays[qvDepth].visible=true;overlays[qvDepth].show=function()
{this.visible=true;this.get('boundingBox').setStyle('visibility','visible');var shim=15;var animX=(SUGAR.themes.theme_name=='RTL')?this.get("x")+this.get("width")-shim:this.get("x")-this.get("width")-shim;var animY=42;var animDCcont=new Y.Anim({node:this.get("boundingBox"),to:{xy:[animX,animY]}});animDCcont.set('duration',.25);animDCcont.set('easing',Y.Easing.easeOut);animDCcont.run();}
overlays[qvDepth].after('render',function(e){this.show();});overlays[qvDepth].render();});}});
