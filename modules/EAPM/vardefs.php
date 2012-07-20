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

$dictionary['EAPM'] = array(
	'table'=>'eapm',
	'audited'=>false,
	'fields'=>array (
  'password' =>
  array (
    'required' => true,
    'name' => 'password',
    'vname' => 'LBL_PASSWORD',
    'type' => 'encrypt',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => false,
    'len' => '255',
    'size' => '20',
  ),
  'url' =>
  array (
    'required' => true,
    'name' => 'url',
    'vname' => 'LBL_URL',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => '255',
    'size' => '20',
  ),
  'application' =>
  array (
    'required' => true,
    'name' => 'application',
    'vname' => 'LBL_APPLICATION',
    'type' => 'enum',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => 100,
    'size' => '20',
    'function' => 'getEAPMExternalApiDropDown',
    'studio' => 'visible',
    'default' => 'webex',
  ),
  'name' =>
  array (
    'name' => 'name',
    'vname' => 'LBL_NAME',
    'type' => 'name',
    'dbType' => 'varchar',
    'len' => '255',
    'unified_search' => true,
    'importable' => 'required',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'size' => '20',
  ),
	  'api_data' =>
	  array (
	    'name' => 'api_data',
	    'vname' => 'LBL_API_DATA',
	    'type' => 'text',
	    'comment' => 'Any API data that the external API may wish to store on a per-user basis',
	    'rows' => 6,
	    'cols' => 80,
	  ),
	  'consumer_key' => array(
	  	'name' => 'consumer_key',
	    'type' => 'varchar',
	    'vname' => 'LBL_API_CONSKEY',
//        'required' => true,
        'importable' => 'required',
        'massupdate' => 0,
        'audited' => false,
        'reportable' => false,
        'studio' => 'hidden',
	  ),
	  'consumer_secret' => array(
	  	'name' => 'consumer_secret',
	    'type' => 'varchar',
	    'vname' => 'LBL_API_CONSSECRET',
//        'required' => true,
        'importable' => 'required',
        'massupdate' => 0,
        'audited' => false,
        'reportable' => false,
        'studio' => 'hidden',
	  ),
	  'oauth_token' => array(
	  	'name' => 'oauth_token',
	    'type' => 'varchar',
	    'vname' => 'LBL_API_OAUTHTOKEN',
        'importable' => false,
        'massupdate' => 0,
        'audited' => false,
        'reportable' => false,
    	'required' => false,
        'studio' => 'hidden',
	  ),
	  'oauth_secret' => array(
	  	'name' => 'oauth_secret',
	    'type' => 'varchar',
	    'vname' => 'LBL_API_OAUTHSECRET',
        'importable' => false,
        'massupdate' => 0,
        'audited' => false,
        'reportable' => false,
    	'required' => false,
        'studio' => 'hidden',
	  ),
	  'validated' => array(
        'required' => false,
        'name' => 'validated',
        'vname' => 'LBL_VALIDATED',
        'type' => 'bool',
	    'default' => false,
	  ),
      'note' => array(
          'name' => 'note',
          'vname' => 'LBL_NOTE',
          'required' => false,
          'reportable' => false,
          'importable' => false,
          'massupdate' => false,
          'studio' => 'hidden',
          'type' => 'varchar',
          'source' => 'non-db',
      ),

),
	'relationships'=>array (
    ),
    'indices' => array(
        array(
                'name' => 'idx_app_active',
                'type' => 'index',
                'fields'=> array('assigned_user_id', 'application', 'validated'),
        ),
),
	'optimistic_locking'=>true,
);
if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('EAPM','EAPM', array('basic','assignable'));
