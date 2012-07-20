/*
 Copyright (c) 2010, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.com/yui/license.html
 version: 3.3.0
 build: 3167
 */
YUI.add('arraylist-add',function(Y){Y.mix(Y.ArrayList.prototype,{add:function(item,index){var items=this._items;if(Y.Lang.isNumber(index)){items.splice(index,0,item);}
else{items.push(item);}
return this;},remove:function(needle,all,comparator){comparator=comparator||this.itemsAreEqual;for(var i=this._items.length-1;i>=0;--i){if(comparator.call(this,needle,this.item(i))){this._items.splice(i,1);if(!all){break;}}}
return this;},itemsAreEqual:function(a,b){return a===b;}});},'3.3.0',{requires:['arraylist']});
