/*
 Copyright (c) 2010, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.com/yui/license.html
 version: 3.3.0
 build: 3167
 */
YUI.add('dataschema-base',function(Y){var LANG=Y.Lang,SchemaBase={apply:function(schema,data){return data;},parse:function(value,field){if(field.parser){var parser=(LANG.isFunction(field.parser))?field.parser:Y.Parsers[field.parser+''];if(parser){value=parser.call(this,value);}
else{}}
return value;}};Y.namespace("DataSchema").Base=SchemaBase;Y.namespace("Parsers");},'3.3.0',{requires:['base']});YUI.add('dataschema-json',function(Y){var LANG=Y.Lang,SchemaJSON={getPath:function(locator){var path=null,keys=[],i=0;if(locator){locator=locator.replace(/\[(['"])(.*?)\1\]/g,function(x,$1,$2){keys[i]=$2;return'.@'+(i++);}).replace(/\[(\d+)\]/g,function(x,$1){keys[i]=parseInt($1,10)|0;return'.@'+(i++);}).replace(/^\./,'');if(!/[^\w\.\$@]/.test(locator)){path=locator.split('.');for(i=path.length-1;i>=0;--i){if(path[i].charAt(0)==='@'){path[i]=keys[parseInt(path[i].substr(1),10)];}}}
else{}}
return path;},getLocationValue:function(path,data){var i=0,len=path.length;for(;i<len;i++){if(LANG.isObject(data)&&(path[i]in data)){data=data[path[i]];}
else{data=undefined;break;}}
return data;},apply:function(schema,data){var data_in=data,data_out={results:[],meta:{}};if(!LANG.isObject(data)){try{data_in=Y.JSON.parse(data);}
catch(e){data_out.error=e;return data_out;}}
if(LANG.isObject(data_in)&&schema){if(!LANG.isUndefined(schema.resultListLocator)){data_out=SchemaJSON._parseResults.call(this,schema,data_in,data_out);}
if(!LANG.isUndefined(schema.metaFields)){data_out=SchemaJSON._parseMeta(schema.metaFields,data_in,data_out);}}
else{data_out.error=new Error("JSON schema parse failure");}
return data_out;},_parseResults:function(schema,json_in,data_out){var results=[],path,error;if(schema.resultListLocator){path=SchemaJSON.getPath(schema.resultListLocator);if(path){results=SchemaJSON.getLocationValue(path,json_in);if(results===undefined){data_out.results=[];error=new Error("JSON results retrieval failure");}
else{if(LANG.isArray(results)){if(LANG.isArray(schema.resultFields)){data_out=SchemaJSON._getFieldValues.call(this,schema.resultFields,results,data_out);}
else{data_out.results=results;}}
else{data_out.results=[];error=new Error("JSON Schema fields retrieval failure");}}}
else{error=new Error("JSON Schema results locator failure");}
if(error){data_out.error=error;}}
return data_out;},_getFieldValues:function(fields,array_in,data_out){var results=[],len=fields.length,i,j,field,key,locator,path,parser,simplePaths=[],complexPaths=[],fieldParsers=[],result,record;for(i=0;i<len;i++){field=fields[i];key=field.key||field;locator=field.locator||key;path=SchemaJSON.getPath(locator);if(path){if(path.length===1){simplePaths[simplePaths.length]={key:key,path:path[0]};}else{complexPaths[complexPaths.length]={key:key,path:path};}}else{}
parser=(LANG.isFunction(field.parser))?field.parser:Y.Parsers[field.parser+''];if(parser){fieldParsers[fieldParsers.length]={key:key,parser:parser};}}
for(i=array_in.length-1;i>=0;--i){record={};result=array_in[i];if(result){for(j=simplePaths.length-1;j>=0;--j){record[simplePaths[j].key]=Y.DataSchema.Base.parse.call(this,(LANG.isUndefined(result[simplePaths[j].path])?result[j]:result[simplePaths[j].path]),simplePaths[j]);}
for(j=complexPaths.length-1;j>=0;--j){record[complexPaths[j].key]=Y.DataSchema.Base.parse.call(this,(SchemaJSON.getLocationValue(complexPaths[j].path,result)),complexPaths[j]);}
for(j=fieldParsers.length-1;j>=0;--j){key=fieldParsers[j].key;record[key]=fieldParsers[j].parser.call(this,record[key]);if(LANG.isUndefined(record[key])){record[key]=null;}}
results[i]=record;}}
data_out.results=results;return data_out;},_parseMeta:function(metaFields,json_in,data_out){if(LANG.isObject(metaFields)){var key,path;for(key in metaFields){if(metaFields.hasOwnProperty(key)){path=SchemaJSON.getPath(metaFields[key]);if(path&&json_in){data_out.meta[key]=SchemaJSON.getLocationValue(path,json_in);}}}}
else{data_out.error=new Error("JSON meta data retrieval failure");}
return data_out;}};Y.DataSchema.JSON=Y.mix(SchemaJSON,Y.DataSchema.Base);},'3.3.0',{requires:['dataschema-base','json']});YUI.add('dataschema-xml',function(Y){var LANG=Y.Lang,SchemaXML={apply:function(schema,data){var xmldoc=data,data_out={results:[],meta:{}};if(xmldoc&&xmldoc.nodeType&&(9===xmldoc.nodeType||1===xmldoc.nodeType||11===xmldoc.nodeType)&&schema){data_out=SchemaXML._parseResults.call(this,schema,xmldoc,data_out);data_out=SchemaXML._parseMeta.call(this,schema.metaFields,xmldoc,data_out);}
else{data_out.error=new Error("XML schema parse failure");}
return data_out;},_getLocationValue:function(field,context){var locator=field.locator||field.key||field,xmldoc=context.ownerDocument||context,result,res,value=null;try{result=SchemaXML._getXPathResult(locator,context,xmldoc);while(res=result.iterateNext()){value=res.textContent||res.value||res.text||res.innerHTML||null;}
return Y.DataSchema.Base.parse.call(this,value,field);}
catch(e){}
return null;},_getXPathResult:function(locator,context,xmldoc){if(!LANG.isUndefined(xmldoc.evaluate)){return xmldoc.evaluate(locator,context,xmldoc.createNSResolver(context.ownerDocument?context.ownerDocument.documentElement:context.documentElement),0,null);}
else{var values=[],locatorArray=locator.split(/\b\/\b/),i=0,l=locatorArray.length,location,subloc,m,isNth;try{xmldoc.setProperty("SelectionLanguage","XPath");values=context.selectNodes(locator);}
catch(e){for(;i<l&&context;i++){location=locatorArray[i];if((location.indexOf("[")>-1)&&(location.indexOf("]")>-1)){subloc=location.slice(location.indexOf("[")+1,location.indexOf("]"));subloc--;context=context.children[subloc];isNth=true;}
else if(location.indexOf("@")>-1){subloc=location.substr(location.indexOf("@"));context=subloc?context.getAttribute(subloc.replace('@','')):context;}
else if(-1<location.indexOf("//")){subloc=context.getElementsByTagName(location.substr(2));context=subloc.length?subloc[subloc.length-1]:null;}
else if(l!=i+1){for(m=context.childNodes.length-1;0<=m;m-=1){if(location===context.childNodes[m].tagName){context=context.childNodes[m];m=-1;}}}}
if(context){if(LANG.isString(context)){values[0]={value:context};}
else if(isNth){values[0]={value:context.innerHTML};}
else{values=Y.Array(context.childNodes,0,true);}}}
return{index:0,iterateNext:function(){if(this.index>=this.values.length){return undefined;}
var result=this.values[this.index];this.index+=1;return result;},values:values};}},_parseField:function(field,result,context){if(field.schema){result[field.key]=SchemaXML._parseResults.call(this,field.schema,context,{results:[],meta:{}}).results;}
else{result[field.key||field]=SchemaXML._getLocationValue.call(this,field,context);}},_parseMeta:function(metaFields,xmldoc_in,data_out){if(LANG.isObject(metaFields)){var key,xmldoc=xmldoc_in.ownerDocument||xmldoc_in;for(key in metaFields){if(metaFields.hasOwnProperty(key)){data_out.meta[key]=SchemaXML._getLocationValue.call(this,metaFields[key],xmldoc);}}}
return data_out;},_parseResult:function(fields,context){var result={},j;for(j=fields.length-1;0<=j;j--){SchemaXML._parseField.call(this,fields[j],result,context);}
return result;},_parseResults:function(schema,context,data_out){if(schema.resultListLocator&&LANG.isArray(schema.resultFields)){var xmldoc=context.ownerDocument||context,fields=schema.resultFields,results=[],node,result,nodeList,i=0;if(schema.resultListLocator.match(/^[:\-\w]+$/)){nodeList=context.getElementsByTagName(schema.resultListLocator);for(i=nodeList.length-1;0<=i;i--){results[i]=SchemaXML._parseResult.call(this,fields,nodeList[i]);}}
else{nodeList=SchemaXML._getXPathResult(schema.resultListLocator,context,xmldoc);while(node=nodeList.iterateNext()){results[i]=SchemaXML._parseResult.call(this,fields,node);i+=1;}}
if(results.length){data_out.results=results;}
else{data_out.error=new Error("XML schema result nodes retrieval failure");}}
return data_out;}};Y.DataSchema.XML=Y.mix(SchemaXML,Y.DataSchema.Base);},'3.3.0',{requires:['dataschema-base']});YUI.add('dataschema-array',function(Y){var LANG=Y.Lang,SchemaArray={apply:function(schema,data){var data_in=data,data_out={results:[],meta:{}};if(LANG.isArray(data_in)){if(LANG.isArray(schema.resultFields)){data_out=SchemaArray._parseResults.call(this,schema.resultFields,data_in,data_out);}
else{data_out.results=data_in;}}
else{data_out.error=new Error("Array schema parse failure");}
return data_out;},_parseResults:function(fields,array_in,data_out){var results=[],result,item,type,field,key,value,i,j;for(i=array_in.length-1;i>-1;i--){result={};item=array_in[i];type=(LANG.isObject(item)&&!LANG.isFunction(item))?2:(LANG.isArray(item))?1:(LANG.isString(item))?0:-1;if(type>0){for(j=fields.length-1;j>-1;j--){field=fields[j];key=(!LANG.isUndefined(field.key))?field.key:field;value=(!LANG.isUndefined(item[key]))?item[key]:item[j];result[key]=Y.DataSchema.Base.parse.call(this,value,field);}}
else if(type===0){result=item;}
else{result=null;}
results[i]=result;}
data_out.results=results;return data_out;}};Y.DataSchema.Array=Y.mix(SchemaArray,Y.DataSchema.Base);},'3.3.0',{requires:['dataschema-base']});YUI.add('dataschema-text',function(Y){var LANG=Y.Lang,SchemaText={apply:function(schema,data){var data_in=data,data_out={results:[],meta:{}};if(LANG.isString(data_in)&&LANG.isString(schema.resultDelimiter)){data_out=SchemaText._parseResults.call(this,schema,data_in,data_out);}
else{data_out.error=new Error("Text schema parse failure");}
return data_out;},_parseResults:function(schema,text_in,data_out){var resultDelim=schema.resultDelimiter,results=[],results_in,fields_in,result,item,fields,field,key,value,i,j,tmpLength=text_in.length-resultDelim.length;if(text_in.substr(tmpLength)==resultDelim){text_in=text_in.substr(0,tmpLength);}
results_in=text_in.split(schema.resultDelimiter);for(i=results_in.length-1;i>-1;i--){result={};item=results_in[i];if(LANG.isString(schema.fieldDelimiter)){fields_in=item.split(schema.fieldDelimiter);if(LANG.isArray(schema.resultFields)){fields=schema.resultFields;for(j=fields.length-1;j>-1;j--){field=fields[j];key=(!LANG.isUndefined(field.key))?field.key:field;value=(!LANG.isUndefined(fields_in[key]))?fields_in[key]:fields_in[j];result[key]=Y.DataSchema.Base.parse.call(this,value,field);}}}
else{result=item;}
results[i]=result;}
data_out.results=results;return data_out;}};Y.DataSchema.Text=Y.mix(SchemaText,Y.DataSchema.Base);},'3.3.0',{requires:['dataschema-base']});YUI.add('dataschema',function(Y){},'3.3.0',{use:['dataschema-base','dataschema-json','dataschema-xml','dataschema-array','dataschema-text']});
