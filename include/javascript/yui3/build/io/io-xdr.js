/*
 Copyright (c) 2010, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.com/yui/license.html
 version: 3.3.0
 build: 3167
 */
YUI.add('io-xdr',function(Y){var E_XDR_READY=Y.publish('io:xdrReady',{fireOnce:true}),_cB={},_rS={},d=Y.config.doc,w=Y.config.win,ie=w&&w.XDomainRequest;function _swf(uri,yid){var o='<object id="yuiIoSwf" type="application/x-shockwave-flash" data="'+
uri+'" width="0" height="0">'+'<param name="movie" value="'+uri+'">'+'<param name="FlashVars" value="yid='+yid+'">'+'<param name="allowScriptAccess" value="always">'+'</object>',c=d.createElement('div');d.body.appendChild(c);c.innerHTML=o;}
function _evt(o,c){o.c.onprogress=function(){_rS[o.id]=3;};o.c.onload=function(){_rS[o.id]=4;Y.io.xdrResponse(o,c,'success');};o.c.onerror=function(){_rS[o.id]=4;Y.io.xdrResponse(o,c,'failure');};if(c.timeout){o.c.ontimeout=function(){_rS[o.id]=4;Y.io.xdrResponse(o,c,'timeout');};o.c.timeout=c.timeout;}}
function _data(o,f,t){var s,x;if(!o.e){s=f?decodeURI(o.c.responseText):o.c.responseText;x=t==='xml'?Y.DataType.XML.parse(s):null;return{id:o.id,c:{responseText:s,responseXML:x}};}
else{return{id:o.id,e:o.e};}}
function _abort(o,c){return o.c.abort(o.id,c);}
function _isInProgress(o){return ie?_rS[o.id]!==4:o.c.isInProgress(o.id);}
Y.mix(Y.io,{_transport:{},xdr:function(uri,o,c){if(c.xdr.use==='flash'){_cB[o.id]={on:c.on,context:c.context,arguments:c.arguments};c.context=null;c.form=null;w.setTimeout(function(){if(o.c&&o.c.send){o.c.send(uri,c,o.id);}
else{Y.io.xdrResponse(o,c,'transport error');}},Y.io.xdr.delay);}
else if(ie){_evt(o,c);o.c.open(c.method||'GET',uri);o.c.send(c.data);}
else{o.c.send(uri,o,c);}
return{id:o.id,abort:function(){return o.c?_abort(o,c):false;},isInProgress:function(){return o.c?_isInProgress(o.id):false;}};},xdrResponse:function(o,c,e){var cb,m=ie?_rS:_cB,f=c.xdr.use==='flash'?true:false,t=c.xdr.dataType;c.on=c.on||{};if(f){cb=_cB[o.id]?_cB[o.id]:null;if(cb){c.on=cb.on;c.context=cb.context;c.arguments=cb.arguments;}}
switch(e){case'start':Y.io.start(o.id,c);break;case'complete':Y.io.complete(o,c);break;case'success':Y.io.success(t||f?_data(o,f,t):o,c);delete m[o.id];break;case'timeout':case'abort':case'transport error':o.e=e;case'failure':Y.io.failure(t||f?_data(o,f,t):o,c);delete m[o.id];break;}},xdrReady:function(id){Y.io.xdr.delay=0;Y.fire(E_XDR_READY,id);},transport:function(o){var yid=o.yid||Y.id,oid=o.id||'flash',src=Y.UA.ie?o.src+'?d='+new Date().valueOf().toString():o.src;if(oid==='native'||oid==='flash'){_swf(src,yid);this._transport.flash=d.getElementById('yuiIoSwf');}
else if(oid){this._transport[o.id]=o.src;}}});Y.io.xdr.delay=50;},'3.3.0',{requires:['io-base','datatype-xml']});
