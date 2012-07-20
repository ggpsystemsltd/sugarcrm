/*
 Copyright (c) 2010, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.com/yui/license.html
 version: 3.3.0
 build: 3167
 */
YUI.add('intl',function(Y){var _mods={},ROOT_LANG="yuiRootLang",ACTIVE_LANG="yuiActiveLang",NONE=[];Y.mix(Y.namespace("Intl"),{_mod:function(module){if(!_mods[module]){_mods[module]={};}
return _mods[module];},setLang:function(module,lang){var langs=this._mod(module),currLang=langs[ACTIVE_LANG],exists=!!langs[lang];if(exists&&lang!==currLang){langs[ACTIVE_LANG]=lang;this.fire("intl:langChange",{module:module,prevVal:currLang,newVal:(lang===ROOT_LANG)?"":lang});}
return exists;},getLang:function(module){var lang=this._mod(module)[ACTIVE_LANG];return(lang===ROOT_LANG)?"":lang;},add:function(module,lang,strings){lang=lang||ROOT_LANG;this._mod(module)[lang]=strings;this.setLang(module,lang);},get:function(module,key,lang){var mod=this._mod(module),strs;lang=lang||mod[ACTIVE_LANG];strs=mod[lang]||{};return(key)?strs[key]:Y.merge(strs);},getAvailableLangs:function(module){var loader=Y.Env._loader,mod=loader&&loader.moduleInfo[module],langs=mod&&mod.lang;return(langs)?langs.concat():NONE;}});Y.augment(Y.Intl,Y.EventTarget);Y.Intl.publish("intl:langChange",{emitFacade:true});},'3.3.0',{requires:['event-custom']});
