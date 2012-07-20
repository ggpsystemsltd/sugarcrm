/*
 Copyright (c) 2010, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.com/yui/license.html
 version: 3.3.0
 build: 3167
 */
YUI.add('autocomplete-list-keys',function(Y){var KEY_DOWN=40,KEY_ENTER=13,KEY_ESC=27,KEY_TAB=9,KEY_UP=38;function ListKeys(){Y.before(this._unbindKeys,this,'destructor');Y.before(this._bindKeys,this,'bindUI');this._initKeys();}
ListKeys.prototype={_initKeys:function(){var keys={},keysVisible={};this._keyEvents=[];keys[KEY_DOWN]=this._keyDown;keysVisible[KEY_ENTER]=this._keyEnter;keysVisible[KEY_ESC]=this._keyEsc;keysVisible[KEY_TAB]=this._keyTab;keysVisible[KEY_UP]=this._keyUp;this._keys=keys;this._keysVisible=keysVisible;},_bindKeys:function(){this._keyEvents.push(this._inputNode.on(Y.UA.gecko?'keypress':'keydown',this._onInputKey,this));},_unbindKeys:function(){while(this._keyEvents.length){this._keyEvents.pop().detach();}},_keyDown:function(){if(this.get('visible')){this._activateNextItem();}else{this.show();}},_keyEnter:function(){var item=this.get('activeItem');if(item){this.selectItem(item);}else{return false;}},_keyEsc:function(){this.hide();},_keyTab:function(){var item;if(this.get('tabSelect')){item=this.get('activeItem');if(item){this.selectItem(item);return true;}}
return false;},_keyUp:function(){this._activatePrevItem();},_onInputKey:function(e){var handler,keyCode=e.keyCode;this._lastInputKey=keyCode;if(this.get('results').length){handler=this._keys[keyCode];if(!handler&&this.get('visible')){handler=this._keysVisible[keyCode];}
if(handler){if(handler.call(this,e)!==false){e.preventDefault();}}}}};Y.Base.mix(Y.AutoCompleteList,[ListKeys]);},'3.3.0',{requires:['autocomplete-list','base-build']});
