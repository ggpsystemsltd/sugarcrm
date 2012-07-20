/*
 Copyright (c) 2010, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.com/yui/license.html
 version: 3.3.0
 build: 3167
 */
YUI.add('base-build',function(Y){var Base=Y.Base,L=Y.Lang,build;Base._build=function(name,main,extensions,px,sx,cfg){var build=Base._build,builtClass=build._ctor(main,cfg),buildCfg=build._cfg(main,cfg),_mixCust=build._mixCust,aggregates=buildCfg.aggregates,custom=buildCfg.custom,dynamic=builtClass._yuibuild.dynamic,i,l,val,extClass;if(dynamic&&aggregates){for(i=0,l=aggregates.length;i<l;++i){val=aggregates[i];if(main.hasOwnProperty(val)){builtClass[val]=L.isArray(main[val])?[]:{};}}}
for(i=0,l=extensions.length;i<l;i++){extClass=extensions[i];Y.mix(builtClass,extClass,true,null,1);_mixCust(builtClass,extClass,aggregates,custom);builtClass._yuibuild.exts.push(extClass);}
if(px){Y.mix(builtClass.prototype,px,true);}
if(sx){Y.mix(builtClass,build._clean(sx,aggregates,custom),true);_mixCust(builtClass,sx,aggregates,custom);}
builtClass.prototype.hasImpl=build._impl;if(dynamic){builtClass.NAME=name;builtClass.prototype.constructor=builtClass;}
return builtClass;};build=Base._build;Y.mix(build,{_mixCust:function(r,s,aggregates,custom){if(aggregates){Y.aggregate(r,s,true,aggregates);}
if(custom){for(var j in custom){if(custom.hasOwnProperty(j)){custom[j](j,r,s);}}}},_tmpl:function(main){function BuiltClass(){BuiltClass.superclass.constructor.apply(this,arguments);}
Y.extend(BuiltClass,main);return BuiltClass;},_impl:function(extClass){var classes=this._getClasses(),i,l,cls,exts,ll,j;for(i=0,l=classes.length;i<l;i++){cls=classes[i];if(cls._yuibuild){exts=cls._yuibuild.exts;ll=exts.length;for(j=0;j<ll;j++){if(exts[j]===extClass){return true;}}}}
return false;},_ctor:function(main,cfg){var dynamic=(cfg&&false===cfg.dynamic)?false:true,builtClass=(dynamic)?build._tmpl(main):main,buildCfg=builtClass._yuibuild;if(!buildCfg){buildCfg=builtClass._yuibuild={};}
buildCfg.id=buildCfg.id||null;buildCfg.exts=buildCfg.exts||[];buildCfg.dynamic=dynamic;return builtClass;},_cfg:function(main,cfg){var aggr=[],cust={},buildCfg,cfgAggr=(cfg&&cfg.aggregates),cfgCustBuild=(cfg&&cfg.custom),c=main;while(c&&c.prototype){buildCfg=c._buildCfg;if(buildCfg){if(buildCfg.aggregates){aggr=aggr.concat(buildCfg.aggregates);}
if(buildCfg.custom){Y.mix(cust,buildCfg.custom,true);}}
c=c.superclass?c.superclass.constructor:null;}
if(cfgAggr){aggr=aggr.concat(cfgAggr);}
if(cfgCustBuild){Y.mix(cust,cfg.cfgBuild,true);}
return{aggregates:aggr,custom:cust};},_clean:function(sx,aggregates,custom){var prop,i,l,sxclone=Y.merge(sx);for(prop in custom){if(sxclone.hasOwnProperty(prop)){delete sxclone[prop];}}
for(i=0,l=aggregates.length;i<l;i++){prop=aggregates[i];if(sxclone.hasOwnProperty(prop)){delete sxclone[prop];}}
return sxclone;}});Base.build=function(name,main,extensions,cfg){return build(name,main,extensions,null,null,cfg);};Base.create=function(name,base,extensions,px,sx){return build(name,base,extensions,px,sx);};Base.mix=function(main,extensions){return build(null,main,extensions,null,null,{dynamic:false});};Base._buildCfg={custom:{ATTRS:function(prop,r,s){r.ATTRS=r.ATTRS||{};if(s.ATTRS){var sAttrs=s.ATTRS,rAttrs=r.ATTRS,a;for(a in sAttrs){if(sAttrs.hasOwnProperty(a)){rAttrs[a]=rAttrs[a]||{};Y.mix(rAttrs[a],sAttrs[a],true);}}}}},aggregates:["_PLUG","_UNPLUG"]};},'3.3.0',{requires:['base-base']});
