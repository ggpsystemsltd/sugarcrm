<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
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


$module = $_REQUEST['save_module'];
$record = $_REQUEST['save_record'];
$field_value = $_REQUEST['save_value'];
$field = $_REQUEST['save_field_name'];
$type = $_REQUEST['type'];

$bean = new $beanList[$module];
$bean->retrieve($record);
if ($type != 'currency')
    $bean->$field = $field_value;
else {
    $bean->$field = unformat_number($field_value);
} 

$bean->save(false);

$ret_array = array();
$ret_array['id'] = $record;
$ret_array['field'] = $field;
if ($type != 'currency')
    $ret_array['value'] = $bean->$field;
else {
    global $locale;                  
    $params = array();
    $params['currency_id'] = $_REQUEST['currency_id'];
    $params['convert'] = false;
    $params['currency_symbol'] = $_REQUEST['currency_symbol'];
                
    $ret_array['currency_formatted_value']  = currency_format_number($bean->$field, $params);
    $ret_array['formatted_value'] = format_number($bean->$field);
}

$json = getJSONobj();
echo 'result = '. $json->encode($ret_array);
?>
