/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Master Subscription
 * Agreement ("License") which can be viewed at
 * http://www.sugarcrm.com/crm/master-subscription-agreement
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * among other things: 1) sublicense, resell, rent, lease, redistribute, assign
 * or otherwise transfer Your rights to the Software, and 2) use the Software
 * for timesharing or service bureau purposes such as hosting the Software for
 * commercial gain and/or for the benefit of a third party.  Use of the Software
 * may be subject to applicable fees and any use of the Software without first
 * paying applicable fees is strictly prohibited.  You do not have the right to
 * remove SugarCRM copyrights from the source code or user interface.
 *
 * All copies of the Covered Code must include on each user interface screen:
 *  (i) the "Powered by SugarCRM" logo and
 *  (ii) the SugarCRM copyright notice
 * in the same form as they appear in the distribution.  See full license for
 * requirements.
 *
 * Your Warranty, Limitations of liability and Indemnity are expressly stated
 * in the License.  Please refer to the License for the specific language
 * governing these rights and limitations under the License.  Portions created
 * by SugarCRM are Copyright (C) 2004-2012 SugarCRM, Inc.; All Rights Reserved.
 ********************************************************************************/
if(typeof(SUGAR.forms)=='undefined')SUGAR.forms={};SUGAR.forms.FormValidator=function(){}
SUGAR.forms.FormValidator.FORMS={};SUGAR.forms.FormValidator.LAST_SUBMIT_TIME={};SUGAR.forms.FormValidator.add=function(formname,name,condition,msg)
{var myself=SUGAR.forms.FormValidator;if(typeof(myself.FORMS[formname])=='undefined')
myself._addForm(formname);if(typeof(myself.FORMS[formname][name])=='undefined')
myself._addField(formname,name);if(typeof(myself.FORMS[formname][name].element)=='undefined')return;myself._registerElement(formname,name);if(typeof(SUGAR.forms.AssignmentHandler)!='undefined')
SUGAR.forms.AssignmentHandler.registerField(formname,name);if(typeof(condition)=='undefined')condition='true';var list=myself.FORMS[formname][name].conditions;list[list.length]={condition:condition,message:msg};}
SUGAR.forms.FormValidator.validateForm=function(formname){if(typeof(this)=='undefined')return false;if(typeof formname!='string'){formname=this.getAttribute('name');}
var myself=SUGAR.forms.FormValidator;if(typeof(myself.FORMS[formname])=='undefined')return true;var _date=new Date();if(typeof(myself.LAST_SUBMIT_TIME[formname])=='undefined')
myself.LAST_SUBMIT_TIME[formname]=_date.getTime();else if(_date.getTime()<(myself.LAST_SUBMIT_TIME[formname]+2000))
return false;else
myself.LAST_SUBMIT_TIME[formname]=_date.getTime();var form=myself.FORMS[formname];SUGAR.forms.FormValidator.clearErrors(formname);var errors={};var count=0;for(var name in form)
{if(name=='required')continue;var field=form[name];if(typeof(field)=='undefined')continue;if(typeof(field.element)=='undefined')continue;if(typeof(field.element.value)=='undefined')continue;var value=field.element.value.replace(/^\s+|\s+$/g,"");;field.element.value=value;if(value==''&&(field.required==true||myself.FORMS[formname].required[name]==true)){if(typeof(errors[name])=='undefined'){errors[name]={element:field.element,messages:[]};}
errors[name].messages[errors[name].messages.length]='Empty required field';count++;continue;}
else if(value==''){continue;}
for(var i=0;i<field.conditions.length;i++)
{var condition=field.conditions[i].condition;if(!myself._test(condition,formname)){if(typeof(errors[name])=='undefined'){errors[name]={element:field.element,messages:[]};}
errors[name].messages[errors[name].messages.length]=field.conditions[i].message;count++;}}}
if(count<=0){return true;}
for(var name in errors)
{var el=errors[name].element;var msgs=errors[name].messages;for(var i=0;i<msgs.length;i++){SUGAR.forms.FormValidator.renderError(el,msgs[i]);}}
return false;}
SUGAR.forms.FormValidator.contains=function(formname,name){var myself=SUGAR.forms.FormValidator;return(typeof(myself.FORMS[formname])!='undefined'&&typeof(myself.FORMS[formname][name])!='undefined');}
SUGAR.forms.FormValidator.remove=function(formname,name){var myself=SUGAR.forms.FormValidator;if(myself.contains(formname,name)){myself.FORMS[formname][name]=null;myself.FORMS[formname].required[name]=null;}}
SUGAR.forms.FormValidator.setRequired=function(formname,name,required)
{var myself=SUGAR.forms.FormValidator;if(typeof(myself.FORMS[formname])=='undefined'){myself._addForm(formname);}
var r=(typeof(required)!='undefined'&&required!=true?false:true);if(name instanceof Array){for(var i=0;i<name.length;i++){if(typeof(myself.FORMS[formname][name[i]])=='undefined')myself._addField(formname,name[i]);myself.FORMS[formname][name[i]].required=r;myself.FORMS[formname].required[name[i]]=(r==true?r:null);}}else{if(typeof(myself.FORMS[formname][name[i]])=='undefined')myself._addField(formname,name);myself.FORMS[formname][name].required=r;myself.FORMS[formname].required[name]=(r==true?r:null);}}
SUGAR.forms.FormValidator.containsForm=function(formname){return(typeof(SUGAR.forms.FormValidator.FORMS[formname])!='undefined');}
SUGAR.forms.FormValidator.removeForm=function(formname){SUGAR.forms.FormValidator.FORMS[formname]=null;SUGAR.forms.FormValidator._removeListener(formname);}
SUGAR.forms.FormValidator.clearErrors=function(formname){if(typeof formname!='undefined')formname=document.forms[formname];var elements=YAHOO.util.Dom.getElementsByClassName('error','div',formname);for(var i=0;i<elements.length;i++){elements[i].parentNode.removeChild(elements[i]);}}
SUGAR.forms.FormValidator.renderError=function(element,msg){if(typeof(element)=='undefined'||typeof(msg)=='undefined')return;if(typeof(SUGAR.forms.FlashField)!='undefined')
SUGAR.forms.FlashField(element);if(element.parentNode.innerHTML.indexOf(msg)<0)
{var err_node=document.createElement('div');err_node.className='error';err_node.style.cssFloat="left";err_node.style.styleFloat="left";err_node.innerHTML=msg;element.parentNode.appendChild(err_node);}}
SUGAR.forms.FormValidator.alpha=function(formname,name,options){var m='Can only contain alphabets';if(typeof(options)=='object'){m=(typeof(options.message)=='string'?options.message:m);}
SUGAR.forms.FormValidator.add(formname,name,"isAlpha($"+name+")",m);}
SUGAR.forms.FormValidator.numeric=function(formname,name,options){var m='Can only contain numbers';if(typeof(options)=='object'){m=(typeof(options.message)=='string'?options.message:m);}
SUGAR.forms.FormValidator.add(formname,name,"isNumeric($"+name+")",m);}
SUGAR.forms.FormValidator.alphanumeric=function(formname,name,options){var m='Can only contain alphabets and numbers';if(typeof(options)=='object'){m=(typeof(options.message)=='string'?options.message:m);}
SUGAR.forms.FormValidator.add(formname,name,"isAlphaNumeric($"+name+")",m);}
SUGAR.forms.FormValidator.email=function(formname,name,options){var m='Invalid E-Mail format';if(typeof(options)=='object'){m=(typeof(options.message)=='string'?options.message:m);}
SUGAR.forms.FormValidator.add(formname,name,"isValidEmail($"+name+")",m);}
SUGAR.forms.FormValidator.phone=function(formname,name,options){var m='Invalid Phone format';if(typeof(options)=='object'){m=(typeof(options.message)=='string'?options.message:m);}
SUGAR.forms.FormValidator.add(formname,name,"isValidPhone($"+name+")",m);}
SUGAR.forms.FormValidator.date=function(formname,name,options){var m='Invalid Date format';if(typeof(options)=='object'){m=(typeof(options.message)=='string'?options.message:m);}
SUGAR.forms.FormValidator.add(formname,name,"isValidDate($"+name+")",m);}
SUGAR.forms.FormValidator.time=function(formname,name,options){var m='Invalid Time format';if(typeof(options)=='object'){m=(typeof(options.message)=='string'?options.message:m);}
SUGAR.forms.FormValidator.add(formname,name,"isValidTime($"+name+")",m);}
SUGAR.forms.FormValidator.range=function(formname,name,options){var m='Out of range ['+options.min+','+options.max+']';if(typeof(options)=='object'&&typeof(options.min)=='number'&&typeof(options.max)=='number'){m=(typeof(options.message)=='string'?options.message:m);SUGAR.forms.FormValidator.add(formname,name,"isWithinRange($"+name+","+options.min+","+options.max+")",m);}}
SUGAR.forms.FormValidator.binary=function(formname,name,options){var m='Both '+name+' and '+options.sibling+' are required';var s='';if(typeof(options)=='object'&&typeof(options.sibling)=='string'){m=(typeof(options.message)=='string'?options.message:'');SUGAR.forms.FormValidator.add(formname,name,"doBothExist($"+name+", $"+options.sibling+")",m);}}
SUGAR.forms.FormValidator.isbefore=function(formname,name,options){}
SUGAR.forms.FormValidator._addForm=function(formname)
{var myself=SUGAR.forms.FormValidator;myself.FORMS[formname]={};myself.FORMS[formname].required={};myself._attachListener(formname);}
SUGAR.forms.FormValidator._addField=function(formname,name){var myself=SUGAR.forms.FormValidator;var el=myself._retrieveElement(formname,name);myself.FORMS[formname][name]={conditions:[],required:false,element:el};}
SUGAR.forms.FormValidator._test=function(condition,formname){var parser=SUGAR.forms.DefaultExpressionParser;if(typeof(parser)=='undefined')return false;var myself=SUGAR.forms.FormValidator;var form=myself.FORMS[formname];try{var ev=SUGAR.forms.evalVariableExpression(condition);return(ev.evaluate()=='true');}catch(error){if(console&&console.log){console.log('ERROR: '+e);}
return false;}
return false;}
SUGAR.forms.FormValidator._attachListener=function(formname){}
SUGAR.forms.FormValidator._removeListener=function(formname){document.forms[formname].onsubmit="";}
SUGAR.forms.FormValidator._retrieveElement=function(form,name){return(typeof(document.forms[form])!='undefined'?document.forms[form][name]:null);}
SUGAR.forms.FormValidator._registerElement=function(formname,name)
{var element=SUGAR.forms.FormValidator._retrieveElement(formname,name);if(element==null)return;if(element.id==''){element.id=formname+"_"+name;}
return element.id;}
SUGAR.forms.UnformatValue=function(value,type)
{if(typeof(type)=='undefined')
{if(value===""){return value;}else{return'"'+value+'"';}}}
SUGAR.forms.FlashField=function(field,to_color){if(typeof(field)=='undefined')return;var original=field.style.backgroundColor;if(typeof(original)=='undefined'||original==''){original='#FFFFFF';}
if(typeof(to_color)=='undefined')
var to_color='#FF8F8F';var oButtonAnim=new YAHOO.util.ColorAnim(field,{backgroundColor:{to:to_color}},0.2);oButtonAnim.onComplete.subscribe(function(){if(this.attributes.backgroundColor.to==to_color){this.attributes.backgroundColor.to=original;this.animate();return;}
field.style.backgroundColor=original;});oButtonAnim.animate();}
