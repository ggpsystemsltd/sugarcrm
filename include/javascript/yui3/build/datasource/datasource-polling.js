/*
 Copyright (c) 2010, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.com/yui/license.html
 version: 3.3.0
 build: 3167
 */
YUI.add('datasource-polling',function(Y){function Pollable(){this._intervals={};}
Pollable.prototype={_intervals:null,setInterval:function(msec,callback){var x=Y.later(msec,this,this.sendRequest,[callback],true);this._intervals[x.id]=x;return x.id;},clearInterval:function(id,key){id=key||id;if(this._intervals[id]){this._intervals[id].cancel();delete this._intervals[id];}},clearAllIntervals:function(){Y.each(this._intervals,this.clearInterval,this);}};Y.augment(Y.DataSource.Local,Pollable);},'3.3.0',{requires:['datasource-local']});
