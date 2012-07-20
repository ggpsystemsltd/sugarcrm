/*
 Copyright (c) 2010, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.com/yui/license.html
 version: 3.3.0
 build: 3167
 */
YUI.add('datasource-jsonschema',function(Y){var DataSourceJSONSchema=function(){DataSourceJSONSchema.superclass.constructor.apply(this,arguments);};Y.mix(DataSourceJSONSchema,{NS:"schema",NAME:"dataSourceJSONSchema",ATTRS:{schema:{}}});Y.extend(DataSourceJSONSchema,Y.Plugin.Base,{initializer:function(config){this.doBefore("_defDataFn",this._beforeDefDataFn);},_beforeDefDataFn:function(e){var data=e.data?(e.data.responseText?e.data.responseText:e.data):e.data,response=Y.DataSchema.JSON.apply.call(this,this.get("schema"),data);if(!response){response={meta:{},results:data};}
this.get("host").fire("response",Y.mix({response:response},e));return new Y.Do.Halt("DataSourceJSONSchema plugin halted _defDataFn");}});Y.namespace('Plugin').DataSourceJSONSchema=DataSourceJSONSchema;},'3.3.0',{requires:['datasource-local','plugin','dataschema-json']});
