/*
 Copyright (c) 2010, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.com/yui/license.html
 version: 3.3.0
 build: 3167
 */
YUI.add('cache-offline',function(Y){function CacheOffline(){CacheOffline.superclass.constructor.apply(this,arguments);}
var localStorage=null,JSON=Y.JSON;try{localStorage=Y.config.win.localStorage;}
catch(e){}
Y.mix(CacheOffline,{NAME:"cacheOffline",ATTRS:{sandbox:{value:"default",writeOnce:"initOnly"},expires:{value:86400000},max:{value:null,readOnly:true},uniqueKeys:{value:true,readOnly:true,setter:function(){return true;}}},flushAll:function(){var store=localStorage,key;if(store){if(store.clear){store.clear();}
else{for(key in store){if(store.hasOwnProperty(key)){store.removeItem(key);delete store[key];}}}}
else{}}});Y.extend(CacheOffline,Y.Cache,localStorage?{_setMax:function(value){return null;},_getSize:function(){var count=0,i=0,l=localStorage.length;for(;i<l;++i){if(localStorage.key(i).indexOf(this.get("sandbox"))===0){count++;}}
return count;},_getEntries:function(){var entries=[],i=0,l=localStorage.length,sandbox=this.get("sandbox");for(;i<l;++i){if(localStorage.key(i).indexOf(sandbox)===0){entries[i]=JSON.parse(localStorage.key(i).substring(sandbox.length));}}
return entries;},_defAddFn:function(e){var entry=e.entry,request=entry.request,cached=entry.cached,expires=entry.expires;entry.cached=cached.getTime();entry.expires=expires?expires.getTime():expires;try{localStorage.setItem(this.get("sandbox")+JSON.stringify({"request":request}),JSON.stringify(entry));}
catch(error){this.fire("error",{error:error});}},_defFlushFn:function(e){var key,i=localStorage.length-1;for(;i>-1;--i){key=localStorage.key(i);if(key.indexOf(this.get("sandbox"))===0){localStorage.removeItem(key);}}},retrieve:function(request){this.fire("request",{request:request});var entry,expires,sandboxedrequest;try{sandboxedrequest=this.get("sandbox")+JSON.stringify({"request":request});try{entry=JSON.parse(localStorage.getItem(sandboxedrequest));}
catch(e){}}
catch(e2){}
if(entry){entry.cached=new Date(entry.cached);expires=entry.expires;expires=!expires?null:new Date(expires);entry.expires=expires;if(this._isMatch(request,entry)){this.fire("retrieve",{entry:entry});return entry;}}
return null;}}:{_setMax:function(value){return null;}});Y.CacheOffline=CacheOffline;},'3.3.0',{requires:['cache-base','json']});
