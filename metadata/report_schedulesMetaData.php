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


$dictionary['report_schedules'] = array ( 'table' => 'report_schedules'
                                  , 'fields' => array (
       array('name' =>'id', 'type' =>'varchar', 'dbType' => 'id', 'len'=>'36', )
      , array('name' =>'user_id', 'type' =>'varchar',  'dbType' => 'id', 'len'=>'36', 'required'=>true)
      , array('name' =>'report_id', 'type' =>'varchar',  'dbType' => 'id', 'len'=>'36', 'required'=>true)
      , array ('name' => 'date_start','type' => 'datetime')
      , array('name' =>'next_run', 'type' =>'datetime', 'len'=>'', 'required'=>true)
      , array('name' =>'active', 'type' =>'bool', 'len'=>'1', 'default'=>'0', 'required'=>true)
      , array('name' =>'time_interval', 'type' =>'int', 'len'=>'11')
      , array ('name' => 'date_modified','type' => 'datetime')
      , array('name' =>'schedule_type', 'type' =>'varchar', 'len'=>'3')
      , array('name' =>'deleted', 'type' =>'bool', 'len'=>'1', 'default'=>'0', 'required'=>false)
                                                      )                                  , 'indices' => array (
       array('name' =>'report_schedulespk', 'type' =>'primary', 'fields'=>array('id'))
                                                      ),
       array('name' => 'idx_report_schedule_user_id', 'type' => 'index', 'fields' => array ('user_id')),
      )
?>
