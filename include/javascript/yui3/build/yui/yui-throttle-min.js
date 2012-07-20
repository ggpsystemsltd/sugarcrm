/*
 Copyright (c) 2010, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.com/yui/license.html
 version: 3.3.0
 build: 3167
 */
YUI.add("yui-throttle",function(a){a.throttle=function(c,b){b=(b)?b:(a.config.throttleTime||150);if(b===-1){return(function(){c.apply(null,arguments);});}var d=a.Lang.now();return(function(){var e=a.Lang.now();if(e-d>b){d=e;c.apply(null,arguments);}});};},"3.3.0",{requires:["yui-base"]});
