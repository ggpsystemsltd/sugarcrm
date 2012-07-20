/*
 Copyright (c) 2010, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.com/yui/license.html
 version: 3.3.0
 build: 3167
 */
YUI.add('escape',function(Y){var HTML_CHARS={'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#x27;','/':'&#x2F;','`':'&#x60;'},Escape={html:function(string){return string.replace(/[&<>"'\/`]/g,Escape._htmlReplacer);},regex:function(string){return string.replace(/[\-#$\^*()+\[\]{}|\\,.?\s]/g,'\\$&');},_htmlReplacer:function(match){return HTML_CHARS[match];}};Escape.regexp=Escape.regex;Y.Escape=Escape;},'3.3.0');
