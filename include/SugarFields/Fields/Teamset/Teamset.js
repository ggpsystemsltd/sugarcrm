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
function set_return_teams_for_editview(popup_reply_data){var form_name=popup_reply_data.form_name;var field_name=popup_reply_data.field_name;teams=popup_reply_data.teams;var team_values=Array();var isFirstFieldEmpty=collection[form_name+'_'+field_name].clean_up();var index=0;for(team_id in teams){if(teams[team_id]['team_id']){var temp_array=[];temp_array['name']=teams[team_id]['team_name'];temp_array['name']=replaceHTMLChars(temp_array['name']);temp_array['id']=teams[team_id]['team_id'];if(isFirstFieldEmpty&&index==0){collection[form_name+'_'+field_name].replace_first(temp_array);}else{collection[form_name+'_'+field_name].add(temp_array);}
index++;}}
if(collection[form_name+'_'+field_name].more_status){collection[form_name+'_'+field_name].js_more();collection[form_name+'_'+field_name].show_arrow_label(true);}}
function set_primary_team(form_name,element_name,primary_team){radioElement=window.document.forms[form_name][element_name];if(radioElement.type){radioElement.checked=true;}else if(primary_team==''){found_checked=false;for(i=0;i<radioElement.length;i++){if(radioElement[i].checked){found_checked=true;break;}}
if(!found_checked){radioElement[0].checked=true;}}else{for(i=0;i<radioElement.length;i++){if(radioElement[i].value==primary_team){radioElement[i].checked=true;break;}}}}
function is_primary_team_selected(form_name,element_name){table_element_id=form_name+'_'+document.forms[form_name][element_name].name+'_table';if(document.getElementById(table_element_id)){input_elements=YAHOO.util.Selector.query('input[type=radio]',document.getElementById(table_element_id));has_primary=false;for(t in input_elements){primary_field_id=document.forms[form_name][element_name].name+'_collection_'+input_elements[t].value;if(input_elements[t].type&&input_elements[t].type=='radio'&&input_elements[t].checked==true){if(document.forms[form_name].elements[primary_field_id].value!=''){has_primary=true;}
break;}}
return has_primary;}
return true;}
function get_selected_teams(form_name,element_name){var selected_teams=new Array();selected_teams['primary']=new Array();selected_teams['secondaries']=new Array();table_element_id=form_name+'_'+document.forms[form_name][element_name].name+'_table';if(document.getElementById(table_element_id)){input_elements=YAHOO.util.Selector.query('input[type=radio]',document.getElementById(table_element_id));var secondary_count=0;for(t in input_elements){primary_field_id='id_'+document.forms[form_name][element_name].name+'_collection_'+input_elements[t].value;if(input_elements[t].type&&input_elements[t].type=='radio'&&input_elements[t].checked==true){if(document.forms[form_name].elements[primary_field_id].value!=''){selected_teams['primary']=document.forms[form_name].elements[primary_field_id].value;}}else if(document.forms[form_name].elements[primary_field_id].value!=''){selected_teams['secondaries'][secondary_count++]=document.forms[form_name].elements[primary_field_id].value;}}}
return selected_teams;}
