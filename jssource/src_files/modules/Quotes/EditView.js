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




function set_billing_return(popup_reply_data)
{
	var form_name = popup_reply_data.form_name;
	var name_to_value_array = popup_reply_data.name_to_value_array;
	var override_values = true;
	var override_shipping = YAHOO.util.Dom.get('shipping_checkbox') && YAHOO.util.Dom.get('shipping_checkbox').checked ? true : false;
	
	if(!confirm_address_update(popup_reply_data))
	{
	   override_values = false;
	} 	
	
	for (var the_key in name_to_value_array)
	{
		if(the_key == 'toJSON' || (!override_shipping && the_key.match(/shipping/)))
		{
			continue;
		} else {
			var val = name_to_value_array[the_key].replace(/&amp;/gi,'&').replace(/&lt;/gi,'<').replace(/&gt;/gi,'>').replace(/&#039;/gi,'\'').replace(/&quot;/gi,'"');
			if(the_key == 'billing_account_id')
			{
				window.document.forms[form_name].elements[the_key].value = val;
				window.document.forms[form_name].elements['shipping_account_id'].value = val;
			} else if(the_key == 'billing_account_name') {
				window.document.forms[form_name].elements[the_key].value = val;
				window.document.forms[form_name].elements['shipping_account_name'].value = val;
			} else if(override_values) {
				window.document.forms[form_name].elements[the_key].value = val;
			}
		}
	}
}

function copy_values_from_billing()
{
	var shipping_checkbox = YAHOO.util.Dom.get('shipping_checkbox');
	return shipping_checkbox.checked;	
}

function set_shipping_return(popup_reply_data)
{
	var form_name = popup_reply_data.form_name;
	var name_to_value_array = popup_reply_data.name_to_value_array;
	var override_values = true;
	
	//Do not override values if address fields are being copied from billing address or
	//if the user chooses cancel when prompted to override values
	if(copy_values_from_billing() || !confirm_address_update(popup_reply_data)) {
	   override_values = false;
	} 	

	for (var the_key in name_to_value_array)
	{
		if(the_key == 'toJSON')
		{
			continue;
		} else {	
			var val = name_to_value_array[the_key].replace(/&amp;/gi,'&').replace(/&lt;/gi,'<').replace(/&gt;/gi,'>').replace(/&#039;/gi,'\'').replace(/&quot;/gi,'"');
			if(the_key == 'shipping_account_id')
			{
				window.document.forms[form_name].elements[the_key].value = val;
			} else if(the_key == 'shipping_account_name') {
				window.document.forms[form_name].elements[the_key].value = val;
			} else if(override_values) {
				window.document.forms[form_name].elements[the_key].value = val;
			}
		}
	}
}

function confirm_address_update(popup_reply_data)
{
	var form_name = popup_reply_data.form_name;
	var name_to_value_array = popup_reply_data.name_to_value_array;
	var label_data_str = '';
	var label_str = '';
	var current_label_data_str = '';
	var label_data_hash = new Array();
	
	for (var the_key in name_to_value_array)
	{
		if(the_key == 'toJSON')
		{
			continue;
		}

		if(window.document.forms[form_name] && document.getElementById(the_key+'_label') && !the_key.match(/account_(id|name)/)) {
			
			var displayValue = name_to_value_array[the_key].replace(/&amp;/gi,'&').replace(/&lt;/gi,'<').replace(/&gt;/gi,'>').replace(/&#039;/gi,'\'').replace(/&quot;/gi,'"');
			var data_label = document.getElementById(the_key+'_label').innerHTML.replace(/\n/gi,'').replace(/<\/?[^>]+(>|$)/g, "");
	
			if(window.document.forms[form_name].elements[the_key]) {
				
				label_and_data = data_label + ' ' + window.document.forms[form_name].elements[the_key].value;				
				
				//Append to current_label_data_str only if the label and data are unique
				if(!label_data_hash[data_label])
				{
					label_str += data_label + ' \n';
					label_data_str += data_label  + ' ' + displayValue + '\n';
					current_label_data_str += label_and_data + '\n';
					label_data_hash[data_label] = true;
				}
			}
		}			
	}
	
	if(label_str != current_label_data_str && current_label_data_str != label_data_str)
	{
		return confirm(SUGAR.language.translate('Quotes', 'NTC_OVERWRITE_ADDRESS_PHONE_CONFIRM') + '\n\n' + label_data_str);
	} 		

	return true;
}

function insert_thousands_separator(num, sep_char)
{
	while(num.match(/^\d\d{3}/))
	{
		num = num.replace(/(\d)(\d{3}(\.|,|$))/, '$1' + sep_char + '$2');
	}
	
	return num;
}

function set_product_return(popup_reply_data)
{
//	var form_name = popup_reply_data.form_name;
	var name_to_value_array = popup_reply_data.name_to_value_array;
	
	var row_id = popup_reply_data.passthru_data.row_id;
	var index = window.document.getElementById('currency_id').options.selectedIndex;
	var rate_id = window.document.getElementById('currency_id').options[index].value;

	var converted_cost_price = ConvertFromDollar(name_to_value_array['cost_usdollar'], get_rate(rate_id));
	var converted_list_price = ConvertFromDollar(name_to_value_array['list_usdollar'], get_rate(rate_id));
	var converted_discount_price = ConvertFromDollar(name_to_value_array['discount_usdollar'], get_rate(rate_id));

	quotesManager.lookup_item('product_template_id_' + row_id, window.document).value = name_to_value_array['id'];
	
	//C.L. fix for 10523
	name = name_to_value_array['name'].replace(/&amp;/gi,'&').replace(/&lt;/gi,'<').replace(/&gt;/gi,'>').replace(/&#039;/gi,'\'').replace(/&quot;/gi,'"');
	quotesManager.lookup_item('name_' + row_id, window.document).value = name;
	quotesManager.lookup_item('cost_price_' + row_id, window.document).value = formatNumber(toDecimal(converted_cost_price, precision), num_grp_sep, dec_sep);
	quotesManager.lookup_item('list_price_' + row_id, window.document).value = formatNumber(toDecimal(converted_list_price, precision), num_grp_sep, dec_sep);
	quotesManager.lookup_item('discount_price_' + row_id, window.document).value = formatNumber(toDecimal(converted_discount_price, precision), num_grp_sep, dec_sep);
	quotesManager.lookup_item('mft_part_num_' + row_id, window.document).value = name_to_value_array['mft_part_num'];
	quotesManager.lookup_item('pricing_factor_' + row_id, window.document).value = name_to_value_array['pricing_factor'];
	quotesManager.lookup_item('type_id_' + row_id, window.document).value = name_to_value_array['type_id'];
	quotesManager.lookup_item('tax_class_' + row_id, window.document).value = name_to_value_array['tax_class'];
	quotesManager.lookup_item('tax_class_name_' + row_id, window.document).value = name_to_value_array['tax_class_name'];
	
	//C.L. fix for 10508
	desc = name_to_value_array['description'].replace(/&amp;/gi,'&').replace(/&lt;/gi,'<').replace(/&gt;/gi,'>').replace(/&#039;/gi,'\'').replace(/&quot;/gi,'"').replace(/<br>/g, '\n');
	quotesManager.lookup_item('description_' + row_id, window.document).value = desc;
	
	quotesManager.toReadOnly(window.document, row_id);
	quotesManager.calculate(window.document);
}

function set_after_sqs(sqs_object, sqs_object_id) {
	var matches = sqs_object_id.match(new RegExp("\([0-9]+)\]$"));
	row_id = matches[1];
	quotesManager.toReadOnly(window.document, row_id);

	var index = window.document.getElementById('currency_id').options.selectedIndex;
	var rate_id = window.document.getElementById('currency_id').options[index].value;
	var converted_cost_price = ConvertFromDollar(unformatNumber(sqs_object['cost_usdollar']), get_rate(rate_id), num_grp_sep, dec_sep);
	var converted_list_price = ConvertFromDollar(unformatNumber(sqs_object['list_usdollar']), get_rate(rate_id), num_grp_sep, dec_sep);
	var converted_discount_price = ConvertFromDollar(unformatNumber(sqs_object['discount_usdollar']), get_rate(rate_id), num_grp_sep, dec_sep);

	document.getElementById('type_id_' + row_id).value = sqs_object['type_id'];
	document.getElementById('mft_part_num_' + row_id).value = sqs_object['mft_part_num'];

	document.getElementById('cost_price_' + row_id).value = formatNumber(toDecimal(unformatNumber(converted_cost_price), precision), num_grp_sep, dec_sep, precision, precision);
	document.getElementById('list_price_' + row_id).value = formatNumber(toDecimal(unformatNumber(converted_list_price), precision), num_grp_sep, dec_sep, precision, precision);
	document.getElementById('discount_price_' + row_id).value = formatNumber(toDecimal(unformatNumber(converted_discount_price), precision), num_grp_sep, dec_sep, precision, precision);

	document.getElementById('tax_class_' + row_id).value = sqs_object['tax_class'];
	document.getElementById('tax_class_name_' + row_id).value = sqs_object['tax_class'];
	document.getElementById('pricing_factor_' + row_id).value = sqs_object['pricing_factor'];
	document.getElementById('description_' + row_id).value = sqs_object['description'];
	

	quotesManager.calculate(window.document);

}

function set_shipping_account_name(sqs_object_id) {
	if(document.getElementById('shipping_account_id').value == '' || (YAHOO.util.Dom.get('shipping_checkbox') && YAHOO.util.Dom.get('shipping_checkbox').checked))
	{
		document.getElementById('shipping_account_id').value = document.getElementById('billing_account_id').value;
		document.getElementById('shipping_account_name').value = document.getElementById('billing_account_name').value;
	}
}


