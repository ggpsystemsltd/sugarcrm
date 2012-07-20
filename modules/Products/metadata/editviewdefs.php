<?php
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

$viewdefs['Products']['EditView'] = array(
    'templateMeta' => array('maxColumns' => '2',
                            'widths' => array(
                                            array('label' => '10', 'field' => '30'),
                                            array('label' => '10', 'field' => '30')
                                            ),
    'javascript' => '{sugar_getscript file="cache/include/javascript/sugar_grp_jsolait.js"}
{sugar_getscript file="modules/Products/EditView.js"}'
),

'panels' =>array (
  'default' =>
  array (

    array (
      array('name'=>'name',
            'displayParams'=>array('required'=>true),
            'customCode'=>'<input name="name" id="name" type="text" value="{$fields.name.value}">'.
                          '<input name="product_template_id" id="product_template_id" type="hidden" value="{$fields.product_template_id.value}">'.
                          '&nbsp;<input title="{$APP.LBL_SELECT_BUTTON_TITLE}" type="button" class="button" value="{$APP.LBL_SELECT_BUTTON_LABEL}" onclick=\'return get_popup_product("{$form_name}");\'>' .
            		      '&nbsp;<input tabindex="1" title="{$LBL_CLEAR_BUTTON_TITLE}" class="button" onclick="this.form.product_template_id.value = \'\'; this.form.name.value = \'\';" type="button" value="{$APP.LBL_CLEAR_BUTTON_LABEL}">',
      ),
      'status'
    ),

    array (
      'account_name',
      'contact_name',
    ),

    array (
      array('name'=>'quantity','displayParams'=>array('size'=>5)),
      'date_purchased',
    ),

    array (
      'serial_number',
      'date_support_starts',
    ),

    array (
      'asset_number',
      'date_support_expires',
    ),
  ),

  array (

    array (
      'currency_id',
      '',
    ),

    array (
      'cost_price',
      '',
    ),

    array (
      'list_price',
      'book_value',
    ),

    array (
      'discount_price',
      'book_value_date',
    ),
    array (
      'discount_amount',
      'discount_select',
    ),
  ),

  array (

    array (
      array('name'=>'website', 'type'=>'Link'),
      'tax_class',
    ),

    array (
      'manufacturer_id',
      'weight',
    ),

    array (
      'mft_part_num',
      'category_id',
    ),

    array (
      'vendor_part_num',
      'type_id',
    ),

    array (
      'description',
    ),

    array (
      'support_name',
      'support_contact',
    ),

    array (
      'support_description',
      'support_term',
    ),
  ),
)


);
?>