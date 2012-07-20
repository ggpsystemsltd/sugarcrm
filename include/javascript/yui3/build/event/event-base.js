/*
 Copyright (c) 2010, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.com/yui/license.html
 version: 3.3.0
 build: 3167
 */
var GLOBAL_ENV=YUI.Env;if(!GLOBAL_ENV._ready){GLOBAL_ENV._ready=function(){GLOBAL_ENV.DOMReady=true;GLOBAL_ENV.remove(YUI.config.doc,'DOMContentLoaded',GLOBAL_ENV._ready);};GLOBAL_ENV.add(YUI.config.doc,'DOMContentLoaded',GLOBAL_ENV._ready);}
YUI.add('event-base',function(Y){Y.publish('domready',{fireOnce:true,async:true});if(GLOBAL_ENV.DOMReady){Y.fire('domready');}else{Y.Do.before(function(){Y.fire('domready');},YUI.Env,'_ready');}
var ua=Y.UA,EMPTY={},webkitKeymap={63232:38,63233:40,63234:37,63235:39,63276:33,63277:34,25:9,63272:46,63273:36,63275:35},resolve=function(n){if(!n){return n;}
try{if(n&&3==n.nodeType){n=n.parentNode;}}catch(e){return null;}
return Y.one(n);},DOMEventFacade=function(ev,currentTarget,wrapper){this._event=ev;this._currentTarget=currentTarget;this._wrapper=wrapper||EMPTY;this.init();};Y.extend(DOMEventFacade,Object,{init:function(){var e=this._event,overrides=this._wrapper.overrides,x=e.pageX,y=e.pageY,c,currentTarget=this._currentTarget;this.altKey=e.altKey;this.ctrlKey=e.ctrlKey;this.metaKey=e.metaKey;this.shiftKey=e.shiftKey;this.type=(overrides&&overrides.type)||e.type;this.clientX=e.clientX;this.clientY=e.clientY;this.pageX=x;this.pageY=y;c=e.keyCode||e.charCode;if(ua.webkit&&(c in webkitKeymap)){c=webkitKeymap[c];}
this.keyCode=c;this.charCode=c;this.which=e.which||e.charCode||c;this.button=this.which;this.target=resolve(e.target);this.currentTarget=resolve(currentTarget);this.relatedTarget=resolve(e.relatedTarget);if(e.type=="mousewheel"||e.type=="DOMMouseScroll"){this.wheelDelta=(e.detail)?(e.detail*-1):Math.round(e.wheelDelta / 80)||((e.wheelDelta<0)?-1:1);}
if(this._touch){this._touch(e,currentTarget,this._wrapper);}},stopPropagation:function(){this._event.stopPropagation();this._wrapper.stopped=1;this.stopped=1;},stopImmediatePropagation:function(){var e=this._event;if(e.stopImmediatePropagation){e.stopImmediatePropagation();}else{this.stopPropagation();}
this._wrapper.stopped=2;this.stopped=2;},preventDefault:function(returnValue){var e=this._event;e.preventDefault();e.returnValue=returnValue||false;this._wrapper.prevented=1;this.prevented=1;},halt:function(immediate){if(immediate){this.stopImmediatePropagation();}else{this.stopPropagation();}
this.preventDefault();}});DOMEventFacade.resolve=resolve;Y.DOM2EventFacade=DOMEventFacade;Y.DOMEventFacade=DOMEventFacade;(function(){Y.Env.evt.dom_wrappers={};Y.Env.evt.dom_map={};var _eventenv=Y.Env.evt,config=Y.config,win=config.win,add=YUI.Env.add,remove=YUI.Env.remove,onLoad=function(){YUI.Env.windowLoaded=true;Y.Event._load();remove(win,"load",onLoad);},onUnload=function(){Y.Event._unload();},EVENT_READY='domready',COMPAT_ARG='~yui|2|compat~',shouldIterate=function(o){try{return(o&&typeof o!=="string"&&Y.Lang.isNumber(o.length)&&!o.tagName&&!o.alert);}catch(ex){return false;}},Event=function(){var _loadComplete=false,_retryCount=0,_avail=[],_wrappers=_eventenv.dom_wrappers,_windowLoadKey=null,_el_events=_eventenv.dom_map;return{POLL_RETRYS:1000,POLL_INTERVAL:40,lastError:null,_interval:null,_dri:null,DOMReady:false,startInterval:function(){if(!Event._interval){Event._interval=setInterval(Event._poll,Event.POLL_INTERVAL);}},onAvailable:function(id,fn,p_obj,p_override,checkContent,compat){var a=Y.Array(id),i,availHandle;for(i=0;i<a.length;i=i+1){_avail.push({id:a[i],fn:fn,obj:p_obj,override:p_override,checkReady:checkContent,compat:compat});}
_retryCount=this.POLL_RETRYS;setTimeout(Event._poll,0);availHandle=new Y.EventHandle({_delete:function(){if(availHandle.handle){availHandle.handle.detach();return;}
var i,j;for(i=0;i<a.length;i++){for(j=0;j<_avail.length;j++){if(a[i]===_avail[j].id){_avail.splice(j,1);}}}}});return availHandle;},onContentReady:function(id,fn,obj,override,compat){return Event.onAvailable(id,fn,obj,override,true,compat);},attach:function(type,fn,el,context){return Event._attach(Y.Array(arguments,0,true));},_createWrapper:function(el,type,capture,compat,facade){var cewrapper,ek=Y.stamp(el),key='event:'+ek+type;if(false===facade){key+='native';}
if(capture){key+='capture';}
cewrapper=_wrappers[key];if(!cewrapper){cewrapper=Y.publish(key,{silent:true,bubbles:false,contextFn:function(){if(compat){return cewrapper.el;}else{cewrapper.nodeRef=cewrapper.nodeRef||Y.one(cewrapper.el);return cewrapper.nodeRef;}}});cewrapper.overrides={};cewrapper.el=el;cewrapper.key=key;cewrapper.domkey=ek;cewrapper.type=type;cewrapper.fn=function(e){cewrapper.fire(Event.getEvent(e,el,(compat||(false===facade))));};cewrapper.capture=capture;if(el==win&&type=="load"){cewrapper.fireOnce=true;_windowLoadKey=key;}
_wrappers[key]=cewrapper;_el_events[ek]=_el_events[ek]||{};_el_events[ek][key]=cewrapper;add(el,type,cewrapper.fn,capture);}
return cewrapper;},_attach:function(args,conf){var compat,handles,oEl,cewrapper,context,fireNow=false,ret,type=args[0],fn=args[1],el=args[2]||win,facade=conf&&conf.facade,capture=conf&&conf.capture,overrides=conf&&conf.overrides;if(args[args.length-1]===COMPAT_ARG){compat=true;}
if(!fn||!fn.call){return false;}
if(shouldIterate(el)){handles=[];Y.each(el,function(v,k){args[2]=v;handles.push(Event._attach(args,conf));});return new Y.EventHandle(handles);}else if(Y.Lang.isString(el)){if(compat){oEl=Y.DOM.byId(el);}else{oEl=Y.Selector.query(el);switch(oEl.length){case 0:oEl=null;break;case 1:oEl=oEl[0];break;default:args[2]=oEl;return Event._attach(args,conf);}}
if(oEl){el=oEl;}else{ret=Event.onAvailable(el,function(){ret.handle=Event._attach(args,conf);},Event,true,false,compat);return ret;}}
if(!el){return false;}
if(Y.Node&&Y.instanceOf(el,Y.Node)){el=Y.Node.getDOMNode(el);}
cewrapper=Event._createWrapper(el,type,capture,compat,facade);if(overrides){Y.mix(cewrapper.overrides,overrides);}
if(el==win&&type=="load"){if(YUI.Env.windowLoaded){fireNow=true;}}
if(compat){args.pop();}
context=args[3];ret=cewrapper._on(fn,context,(args.length>4)?args.slice(4):null);if(fireNow){cewrapper.fire();}
return ret;},detach:function(type,fn,el,obj){var args=Y.Array(arguments,0,true),compat,l,ok,i,id,ce;if(args[args.length-1]===COMPAT_ARG){compat=true;}
if(type&&type.detach){return type.detach();}
if(typeof el=="string"){if(compat){el=Y.DOM.byId(el);}else{el=Y.Selector.query(el);l=el.length;if(l<1){el=null;}else if(l==1){el=el[0];}}}
if(!el){return false;}
if(el.detach){args.splice(2,1);return el.detach.apply(el,args);}else if(shouldIterate(el)){ok=true;for(i=0,l=el.length;i<l;++i){args[2]=el[i];ok=(Y.Event.detach.apply(Y.Event,args)&&ok);}
return ok;}
if(!type||!fn||!fn.call){return Event.purgeElement(el,false,type);}
id='event:'+Y.stamp(el)+type;ce=_wrappers[id];if(ce){return ce.detach(fn);}else{return false;}},getEvent:function(e,el,noFacade){var ev=e||win.event;return(noFacade)?ev:new Y.DOMEventFacade(ev,el,_wrappers['event:'+Y.stamp(el)+e.type]);},generateId:function(el){return Y.DOM.generateID(el);},_isValidCollection:shouldIterate,_load:function(e){if(!_loadComplete){_loadComplete=true;if(Y.fire){Y.fire(EVENT_READY);}
Event._poll();}},_poll:function(){if(Event.locked){return;}
if(Y.UA.ie&&!YUI.Env.DOMReady){Event.startInterval();return;}
Event.locked=true;var i,len,item,el,notAvail,executeItem,tryAgain=!_loadComplete;if(!tryAgain){tryAgain=(_retryCount>0);}
notAvail=[];executeItem=function(el,item){var context,ov=item.override;if(item.compat){if(item.override){if(ov===true){context=item.obj;}else{context=ov;}}else{context=el;}
item.fn.call(context,item.obj);}else{context=item.obj||Y.one(el);item.fn.apply(context,(Y.Lang.isArray(ov))?ov:[]);}};for(i=0,len=_avail.length;i<len;++i){item=_avail[i];if(item&&!item.checkReady){el=(item.compat)?Y.DOM.byId(item.id):Y.Selector.query(item.id,null,true);if(el){executeItem(el,item);_avail[i]=null;}else{notAvail.push(item);}}}
for(i=0,len=_avail.length;i<len;++i){item=_avail[i];if(item&&item.checkReady){el=(item.compat)?Y.DOM.byId(item.id):Y.Selector.query(item.id,null,true);if(el){if(_loadComplete||(el.get&&el.get('nextSibling'))||el.nextSibling){executeItem(el,item);_avail[i]=null;}}else{notAvail.push(item);}}}
_retryCount=(notAvail.length===0)?0:_retryCount-1;if(tryAgain){Event.startInterval();}else{clearInterval(Event._interval);Event._interval=null;}
Event.locked=false;return;},purgeElement:function(el,recurse,type){var oEl=(Y.Lang.isString(el))?Y.Selector.query(el,null,true):el,lis=Event.getListeners(oEl,type),i,len,props,children,child;if(recurse&&oEl){lis=lis||[];children=Y.Selector.query('*',oEl);i=0;len=children.length;for(;i<len;++i){child=Event.getListeners(children[i],type);if(child){lis=lis.concat(child);}}}
if(lis){i=0;len=lis.length;for(;i<len;++i){props=lis[i];props.detachAll();remove(props.el,props.type,props.fn,props.capture);delete _wrappers[props.key];delete _el_events[props.domkey][props.key];}}},getListeners:function(el,type){var ek=Y.stamp(el,true),evts=_el_events[ek],results=[],key=(type)?'event:'+ek+type:null,adapters=_eventenv.plugins;if(!evts){return null;}
if(key){if(adapters[type]&&adapters[type].eventDef){key+='_synth';}
if(evts[key]){results.push(evts[key]);}
key+='native';if(evts[key]){results.push(evts[key]);}}else{Y.each(evts,function(v,k){results.push(v);});}
return(results.length)?results:null;},_unload:function(e){Y.each(_wrappers,function(v,k){v.detachAll();remove(v.el,v.type,v.fn,v.capture);delete _wrappers[k];delete _el_events[v.domkey][k];});remove(win,"unload",onUnload);},nativeAdd:add,nativeRemove:remove};}();Y.Event=Event;if(config.injected||YUI.Env.windowLoaded){onLoad();}else{add(win,"load",onLoad);}
if(Y.UA.ie){Y.on(EVENT_READY,Event._poll);}
add(win,"unload",onUnload);Event.Custom=Y.CustomEvent;Event.Subscriber=Y.Subscriber;Event.Target=Y.EventTarget;Event.Handle=Y.EventHandle;Event.Facade=Y.EventFacade;Event._poll();})();Y.Env.evt.plugins.available={on:function(type,fn,id,o){var a=arguments.length>4?Y.Array(arguments,4,true):null;return Y.Event.onAvailable.call(Y.Event,id,fn,o,a);}};Y.Env.evt.plugins.contentready={on:function(type,fn,id,o){var a=arguments.length>4?Y.Array(arguments,4,true):null;return Y.Event.onContentReady.call(Y.Event,id,fn,o,a);}};},'3.3.0',{requires:['event-custom-base']});
