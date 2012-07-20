/*
 Copyright (c) 2010, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.com/yui/license.html
 version: 3.3.0
 build: 3167
 */
YUI.add('createlink-base',function(Y){var CreateLinkBase={};CreateLinkBase.STRINGS={PROMPT:'Please enter the URL for the link to point to:',DEFAULT:'http://'};Y.namespace('Plugin');Y.Plugin.CreateLinkBase=CreateLinkBase;Y.mix(Y.Plugin.ExecCommand.COMMANDS,{createlink:function(cmd){var inst=this.get('host').getInstance(),out,a,sel,holder,url=prompt(CreateLinkBase.STRINGS.PROMPT,CreateLinkBase.STRINGS.DEFAULT);if(url){holder=inst.config.doc.createElement('div');url=inst.config.doc.createTextNode(url);holder.appendChild(url);url=holder.innerHTML;this.get('host')._execCommand(cmd,url);sel=new inst.Selection();out=sel.getSelected();if(!sel.isCollapsed&&out.size()){a=out.item(0).one('a');if(a){out.item(0).replace(a);}
if(Y.UA.gecko){if(a.get('parentNode').test('span')){if(a.get('parentNode').one('br.yui-cursor')){a.get('parentNode').insert(a,'before');}}}}else{this.get('host').execCommand('inserthtml','<a href="'+url+'">'+url+'</a>');}}
return a;}});},'3.3.0',{requires:['editor-base'],skinnable:false});
