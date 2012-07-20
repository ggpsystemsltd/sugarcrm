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
function get_popup_product(formName)
{open_popup('ProductTemplates','600','400','&form=EditView&tree=ProductsProd','true','false',{"call_back_function":"set_product_type_return","form_name":formName,"field_to_name_array":{"id":"product_template_id","name":"name"}});}
function set_product_type_return(popup_reply_data)
{var form_name=popup_reply_data.form_name;var name_to_value_array=popup_reply_data.name_to_value_array;if(typeof(name_to_value_array['product_template_id'])!='undefined'){var post_data={"module":"ProductTemplates","record":name_to_value_array['product_template_id'],"method":"retrieve","id":name_to_value_array['product_template_id']};var global_rpcClient=new SugarRPCClient();result=global_rpcClient.call_method('retrieve',post_data,true);if(result.status=='success'){for(var the_key in result.record.fields)
{if(typeof(window.document.forms[form_name].elements[the_key])!='undefined'){eval('var the_value=result.record.fields.'+the_key);if(the_key=='cost_price'||the_key=='list_price'||the_key=='discount_price')
{the_value=formatNumber(the_value,num_grp_sep,dec_sep,'2','2');}
window.document.forms[form_name].elements[the_key].value=the_value;}}}}}
