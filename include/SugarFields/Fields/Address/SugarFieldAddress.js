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
(function(){var Dom=YAHOO.util.Dom,Event=YAHOO.util.Event;SUGAR.AddressField=function(checkId,fromKey,toKey){this.fromKey=fromKey;this.toKey=toKey;Event.onAvailable(checkId,this.testCheckboxReady,this);}
SUGAR.AddressField.prototype={elems:["address_street","address_city","address_state","address_postalcode","address_country"],tHasText:false,syncAddressCheckbox:true,originalBgColor:'#FFFFFF',testCheckboxReady:function(obj){for(var x in obj.elems){var f=obj.fromKey+"_"+obj.elems[x];var t=obj.toKey+"_"+obj.elems[x];var e1=Dom.get(t);var e2=Dom.get(f);if(e1!=null&&typeof e1!="undefined"&&e2!=null&&typeof e2!="undefined"){if(!obj.tHasText&&YAHOO.lang.trim(e1.value)!=""){obj.tHasText=true;}
if(e1.value!=e2.value)
{obj.syncAddressCheckbox=false;break;}
obj.originalBgColor=e1.style.backgroundColor;}}
if(obj.tHasText&&obj.syncAddressCheckbox)
{Dom.get(this.id).checked=true;obj.syncFields();}},writeToSyncField:function(e){var fromEl=Event.getTarget(e,true);if(typeof fromEl!="undefined"){var toEl=Dom.get(fromEl.id.replace(this.fromKey,this.toKey));var update=toEl.value!=fromEl.value;toEl.value=fromEl.value;if(update)SUGAR.util.callOnChangeListers(toEl);}},syncFields:function(fromKey,toKey){var fk=this.fromKey,tk=this.toKey;for(var x in this.elems){var f=fk+"_"+this.elems[x];var e2=Dom.get(f);var t=tk+"_"+this.elems[x];var e1=Dom.get(t);if(e1!=null&&typeof e1!="undefined"&&e2!=null&&typeof e2!="undefined"){if(!Dom.get(tk+'_checkbox').checked){Dom.setStyle(e1,'backgroundColor',this.originalBgColor);e1.removeAttribute('readOnly');Event.removeListener(e2,'change',this.writeToSyncField);}else{var update=e1.value!=e2.value;e1.value=e2.value;if(update)SUGAR.util.callOnChangeListers(e1);Dom.setStyle(e1,'backgroundColor','#DCDCDC');e1.setAttribute('readOnly',true);Event.addListener(e2,'change',this.writeToSyncField,this,true);}}}}};})();
