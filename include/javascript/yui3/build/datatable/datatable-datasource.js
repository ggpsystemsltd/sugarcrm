/*
 Copyright (c) 2010, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.com/yui/license.html
 version: 3.3.0
 build: 3167
 */
YUI.add('datatable-datasource',function(Y){function DataTableDataSource(){DataTableDataSource.superclass.constructor.apply(this,arguments);}
Y.mix(DataTableDataSource,{NS:"datasource",NAME:"dataTableDataSource",ATTRS:{datasource:{setter:"_setDataSource"},initialRequest:{setter:"_setInitialRequest"}}});Y.extend(DataTableDataSource,Y.Plugin.Base,{_setDataSource:function(ds){return ds||new Y.DataSource.Local(ds);},_setInitialRequest:function(request){},initializer:function(config){if(!Y.Lang.isUndefined(config.initialRequest)){this.load({request:config.initialRequest});}},load:function(config){config=config||{};config.request=config.request||this.get("initialRequest");config.callback=config.callback||{success:Y.bind(this.onDataReturnInitializeTable,this),failure:Y.bind(this.onDataReturnInitializeTable,this),argument:this.get("host").get("state")};var ds=(config.datasource||this.get("datasource"));if(ds){ds.sendRequest(config);}},onDataReturnInitializeTable:function(e){this.get("host").set("recordset",new Y.Recordset({records:e.response.results}));}});Y.namespace("Plugin").DataTableDataSource=DataTableDataSource;},'3.3.0',{requires:['datatable-base','plugin','datasource-local']});
