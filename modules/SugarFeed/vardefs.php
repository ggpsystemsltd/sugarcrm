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

$dictionary['SugarFeed'] = array(
	'table'=>'sugarfeed',
	'audited'=>false,
	'fields'=>array (
	 'name' => 
  array (
    'name' => 'name',
    'type' => 'name',
    'dbType' => 'varchar',
    'vname' => 'LBL_NAME',
    'len' => 255,
    'comment' => 'Name of the feed',
    'unified_search' => true,
    'audited' => true,
    'merge_filter' => 'selected',  //field will be enabled for merge and will be a part of the default search criteria..other valid values for this property are enabled and disabled, default value is disabled.
                            //property value is case insensitive.
  ),
   'description' => 
  array (
    'name' => 'description',
    'type' => 'name',
    'dbType' => 'varchar',
    'vname' => 'LBL_NAME',
    'len' => 255,
    'comment' => 'Name of the feed',
    'unified_search' => true,
    'audited' => true,
    'merge_filter' => 'selected',  //field will be enabled for merge and will be a part of the default search criteria..other valid values for this property are enabled and disabled, default value is disabled.
                            //property value is case insensitive.
  ),
  
    'related_module' => 
  array (
    'name' => 'related_module',
    'type' => 'varchar',
    'vname' => 'LBL_NAME',
    'len' => 100,
    'comment' => 'related module',
    'unified_search' => true,
    'audited' => false,
    'merge_filter' => 'selected',  //field will be enabled for merge and will be a part of the default search criteria..other valid values for this property are enabled and disabled, default value is disabled.
                            //property value is case insensitive.
  ),
   'related_id' => 
  array (
    'name' => 'related_id',
    'type' => 'id',
    'vname' => 'LBL_NAME',
    'len' => 36,
    'comment' => 'related module',
    'unified_search' => true,
    'audited' => false,
    'merge_filter' => 'selected',  //field will be enabled for merge and will be a part of the default search criteria..other valid values for this property are enabled and disabled, default value is disabled.
                            //property value is case insensitive.
  ),
  	 'link_url' => 
  array (
    'name' => 'link_url',
    'type' => 'varchar',
    'vname' => 'LBL_NAME',
    'len' => 255,
    'comment' => 'Name of the feed',
    'unified_search' => true,
    'audited' => false,
    'merge_filter' => 'selected',  //field will be enabled for merge and will be a part of the default search criteria..other valid values for this property are enabled and disabled, default value is disabled.
                            //property value is case insensitive.
  ),
   	 'link_type' => 
  array (
    'name' => 'link_type',
    'type' => 'varchar',
    'vname' => 'LBL_NAME',
    'len' => 30,
    'comment' => 'Name of the feed',
    'unified_search' => true,
    'audited' => false,
    'merge_filter' => 'selected',  //field will be enabled for merge and will be a part of the default search criteria..other valid values for this property are enabled and disabled, default value is disabled.
                            //property value is case insensitive.
  ),
	 
),
	'relationships'=>array (
    ),

    'indices' => array (
        array('name' => 'sgrfeed_date', 
              'type'=>'index',
              'fields'=>array('date_entered',
                              'deleted',
                  )),
    ),

	'optimistic_lock'=>true,
);

VardefManager::createVardef('SugarFeed','SugarFeed', array('basic',
'team_security',
'assignable'));