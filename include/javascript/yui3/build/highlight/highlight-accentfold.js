/*
 Copyright (c) 2010, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.com/yui/license.html
 version: 3.3.0
 build: 3167
 */
YUI.add('highlight-accentfold',function(Y){var AccentFold=Y.Text.AccentFold,Escape=Y.Escape,EMPTY_OBJECT={},Highlight=Y.mix(Y.Highlight,{allFold:function(haystack,needles,options){var template=Highlight._TEMPLATE,result=[],startPos=0;options=Y.merge({replacer:function(match,p1,foldedNeedle,pos){var len;if(p1&&!(/\s/).test(foldedNeedle)){return match;}
len=foldedNeedle.length;result.push(haystack.substring(startPos,pos)+
template.replace(/\{s\}/g,haystack.substr(pos,len)));startPos=pos+len;}},options||EMPTY_OBJECT);Highlight.all(AccentFold.fold(haystack),AccentFold.fold(needles),options);if(startPos<haystack.length-1){result.push(haystack.substr(startPos));}
return result.join('');},startFold:function(haystack,needles){return Highlight.allFold(haystack,needles,{startsWith:true});},wordsFold:function(haystack,needles){var template=Highlight._TEMPLATE;return Highlight.words(haystack,AccentFold.fold(needles),{mapper:function(word,needles){if(needles.hasOwnProperty(AccentFold.fold(word))){return template.replace(/\{s\}/g,Escape.html(word));}
return Escape.html(word);}});}});},'3.3.0',{requires:['highlight-base','text-accentfold']});
