/*
 Copyright (c) 2010, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.com/yui/license.html
 version: 3.3.0
 build: 3167
 */
YUI.add('event-delegate',function(Y){var toArray=Y.Array,YLang=Y.Lang,isString=YLang.isString,isObject=YLang.isObject,isArray=YLang.isArray,selectorTest=Y.Selector.test,detachCategories=Y.Env.evt.handles;function delegate(type,fn,el,filter){var args=toArray(arguments,0,true),query=isString(el)?el:null,typeBits,synth,container,categories,cat,i,len,handles,handle;if(isObject(type)){handles=[];if(isArray(type)){for(i=0,len=type.length;i<len;++i){args[0]=type[i];handles.push(Y.delegate.apply(Y,args));}}else{args.unshift(null);for(i in type){if(type.hasOwnProperty(i)){args[0]=i;args[1]=type[i];handles.push(Y.delegate.apply(Y,args));}}}
return new Y.EventHandle(handles);}
typeBits=type.split(/\|/);if(typeBits.length>1){cat=typeBits.shift();type=typeBits.shift();}
synth=Y.Node.DOM_EVENTS[type];if(isObject(synth)&&synth.delegate){handle=synth.delegate.apply(synth,arguments);}
if(!handle){if(!type||!fn||!el||!filter){return;}
container=(query)?Y.Selector.query(query,null,true):el;if(!container&&isString(el)){handle=Y.on('available',function(){Y.mix(handle,Y.delegate.apply(Y,args),true);},el);}
if(!handle&&container){args.splice(2,2,container);handle=Y.Event._attach(args,{facade:false});handle.sub.filter=filter;handle.sub._notify=delegate.notifySub;}}
if(handle&&cat){categories=detachCategories[cat]||(detachCategories[cat]={});categories=categories[type]||(categories[type]=[]);categories.push(handle);}
return handle;}
delegate.notifySub=function(thisObj,args,ce){args=args.slice();if(this.args){args.push.apply(args,this.args);}
var currentTarget=delegate._applyFilter(this.filter,args,ce),e,i,len,ret;if(currentTarget){currentTarget=toArray(currentTarget);e=args[0]=new Y.DOMEventFacade(args[0],ce.el,ce);e.container=Y.one(ce.el);for(i=0,len=currentTarget.length;i<len&&!e.stopped;++i){e.currentTarget=Y.one(currentTarget[i]);ret=this.fn.apply(this.context||e.currentTarget,args);if(ret===false){break;}}
return ret;}};delegate.compileFilter=Y.cached(function(selector){return function(target,e){return selectorTest(target._node,selector,e.currentTarget._node);};});delegate._applyFilter=function(filter,args,ce){var e=args[0],container=ce.el,target=e.target||e.srcElement,match=[],isContainer=false;if(target.nodeType===3){target=target.parentNode;}
args.unshift(target);if(isString(filter)){while(target){isContainer=(target===container);if(selectorTest(target,filter,(isContainer?null:container))){match.push(target);}
if(isContainer){break;}
target=target.parentNode;}}else{args[0]=Y.one(target);args[1]=new Y.DOMEventFacade(e,container,ce);while(target){if(filter.apply(args[0],args)){match.push(target);}
if(target===container){break;}
target=target.parentNode;args[0]=Y.one(target);}
args[1]=e;}
if(match.length<=1){match=match[0];}
args.shift();return match;};Y.delegate=Y.Event.delegate=delegate;},'3.3.0',{requires:['node-base']});
