/*
 Copyright (c) 2010, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.com/yui/license.html
 version: 3.3.0
 build: 3167
 */
YUI.add('io-upload-iframe',function(Y){var w=Y.config.win,d=Y.config.doc,_std=(d.documentMode&&d.documentMode>=8),_d=decodeURIComponent;function _addData(f,s){var o=[],m=s.split('='),i,l;for(i=0,l=m.length-1;i<l;i++){o[i]=d.createElement('input');o[i].type='hidden';o[i].name=_d(m[i].substring(m[i].lastIndexOf('&')+1));o[i].value=(i+1===l)?_d(m[i+1]):_d(m[i+1].substring(0,(m[i+1].lastIndexOf('&'))));f.appendChild(o[i]);}
return o;}
function _removeData(f,o){var i,l;for(i=0,l=o.length;i<l;i++){f.removeChild(o[i]);}}
function _setAttrs(f,id,uri){f.setAttribute('action',uri);f.setAttribute('method','POST');f.setAttribute('target','ioupload'+id);f.setAttribute(Y.UA.ie&&!_std?'encoding':'enctype','multipart/form-data');}
function _resetAttrs(f,a){var p;for(p in a){if(a.hasOwnProperty(p)){if(a[p]){f.setAttribute(p,f[p]);}
else{f.removeAttribute(p);}}}}
function _startTimeout(o,c){Y.io._timeout[o.id]=w.setTimeout(function(){var r={id:o.id,status:'timeout'};Y.io.complete(r,c);Y.io.end(r,c);},c.timeout);}
function _clearTimeout(id){w.clearTimeout(Y.io._timeout[id]);delete Y.io._timeout[id];}
function _destroy(id){Y.Event.purgeElement('#ioupload'+id,false);Y.one('body').removeChild(Y.one('#ioupload'+id));}
function _handle(o,c){var d=Y.one('#ioupload'+o.id).get('contentWindow.document'),b=d.one('body'),p;if(c.timeout){_clearTimeout(o.id);}
if(b){p=b.one('pre:first-child');o.c.responseText=p?p.get('text'):b.get('text');}
else{o.c.responseXML=d._node;}
Y.io.complete(o,c);Y.io.end(o,c);w.setTimeout(function(){_destroy(o.id);},0);}
function _create(o,c){var i=Y.Node.create('<iframe id="ioupload'+o.id+'" name="ioupload'+o.id+'" />');i._node.style.position='absolute';i._node.style.top='-1000px';i._node.style.left='-1000px';Y.one('body').appendChild(i);Y.on("load",function(){_handle(o,c);},'#ioupload'+o.id);}
function _send(o,uri,c){var f=(typeof c.form.id==='string')?d.getElementById(c.form.id):c.form.id,fields,attr={action:f.getAttribute('action'),target:f.getAttribute('target')};_setAttrs(f,o.id,uri);if(c.data){fields=_addData(f,c.data);}
if(c.timeout){_startTimeout(o,c);}
f.submit();Y.io.start(o.id,c);if(c.data){_removeData(f,fields);}
_resetAttrs(f,attr);return{id:o.id,abort:function(){var r={id:o.id,status:'abort'};if(Y.one('#ioupload'+o.id)){_destroy(o.id);Y.io.complete(r,c);Y.io.end(r,c);}
else{return false;}},isInProgress:function(){return Y.one('#ioupload'+o.id)?true:false;}};}
Y.mix(Y.io,{upload:function(o,uri,c){_create(o,c);return _send(o,uri,c);}});},'3.3.0',{requires:['io-base','node-base']});
