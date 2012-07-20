/*
 Copyright (c) 2010, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.com/yui/license.html
 version: 3.3.0
 build: 3167
 */
YUI.add('sortable-scroll',function(Y){var SortScroll=function(){SortScroll.superclass.constructor.apply(this,arguments);};Y.extend(SortScroll,Y.Base,{initializer:function(){var host=this.get('host');host.plug(Y.Plugin.DDNodeScroll,{node:host.get('container')});host.delegate.on('drop:over',function(e){if(this.dd.nodescroll&&e.drag.nodescroll){e.drag.nodescroll.set('parentScroll',Y.one(this.get('container')));}});}},{ATTRS:{host:{value:''}},NAME:'SortScroll',NS:'scroll'});Y.namespace('Y.Plugin');Y.Plugin.SortableScroll=SortScroll;},'3.3.0',{requires:['sortable','dd-scroll']});
