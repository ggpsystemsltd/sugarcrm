/*
 Copyright (c) 2010, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.com/yui/license.html
 version: 3.3.0
 build: 3167
 */
YUI.add('rls',function(Y){Y._rls=function(what){var config=Y.config,rls=config.rls||{m:1,v:Y.version,gv:config.gallery,env:1,lang:config.lang,'2in3v':config['2in3'],'2v':config.yui2,filt:config.filter,filts:config.filters,tests:1},rls_base=config.rls_base||'load?',rls_tmpl=config.rls_tmpl||function(){var s='',param;for(param in rls){if(param in rls&&rls[param]){s+=param+'={'+param+'}&';}}
return s;}(),url;rls.m=what;rls.env=Y.Object.keys(YUI.Env.mods);rls.tests=Y.Features.all('load',[Y]);url=Y.Lang.sub(rls_base+rls_tmpl,rls);config.rls=rls;config.rls_tmpl=rls_tmpl;return url;};},'3.3.0',{requires:['get','features']});
