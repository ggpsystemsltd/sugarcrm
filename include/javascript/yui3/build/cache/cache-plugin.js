/*
 Copyright (c) 2010, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.com/yui/license.html
 version: 3.3.0
 build: 3167
 */
YUI.add('cache-plugin',function(Y){function CachePlugin(config){var cache=config&&config.cache?config.cache:Y.Cache,tmpclass=Y.Base.create("dataSourceCache",cache,[Y.Plugin.Base]),tmpinstance=new tmpclass(config);tmpclass.NS="tmpClass";return tmpinstance;}
Y.mix(CachePlugin,{NS:"cache",NAME:"cachePlugin"});Y.namespace("Plugin").Cache=CachePlugin;},'3.3.0',{requires:['plugin','cache-base']});
