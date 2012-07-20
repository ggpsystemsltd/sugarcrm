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

 if(!defined('ACL_ALLOW_NONE')){   
 	define('ACL_ALLOW_ADMIN_DEV', 100);
 	define('ACL_ALLOW_ADMIN', 99);
 	define('ACL_ALLOW_ALL', 90);                        
 	define('ACL_ALLOW_ENABLED', 89);
 	define('ACL_ALLOW_OWNER', 75);
 	define('ACL_ALLOW_NORMAL', 1);
 	define('ACL_ALLOW_DEFAULT', 0);
 	define('ACL_ALLOW_DISABLED', -98);
 	define('ACL_ALLOW_NONE', -99);
 	define('ACL_ALLOW_DEV', 95);
 }
 /**
  * $GLOBALS['ACLActionAccessLevels
  * these are rendering descriptions for Access Levels giving information such as the label, color, and text color to use when rendering the access level
  */
 $GLOBALS['ACLActionAccessLevels'] = array(
 	ACL_ALLOW_ALL=>array('color'=>'#008000', 'label'=>'LBL_ACCESS_ALL', 'text_color'=>'white'),
 	ACL_ALLOW_OWNER=>array('color'=>'#6F6800', 'label'=>'LBL_ACCESS_OWNER', 'text_color'=>'white'),
 	ACL_ALLOW_NONE=>array('color'=>'#FF0000', 'label'=>'LBL_ACCESS_NONE', 'text_color'=>'white'),
 	ACL_ALLOW_ENABLED=>array('color'=>'#008000', 'label'=>'LBL_ACCESS_ENABLED', 'text_color'=>'white'),
 	ACL_ALLOW_DISABLED=>array('color'=>'#FF0000', 'label'=>'LBL_ACCESS_DISABLED', 'text_color'=>'white'),
 	ACL_ALLOW_ADMIN=>array('color'=>'#0000FF', 'label'=>'LBL_ACCESS_ADMIN', 'text_color'=>'white'),
 	ACL_ALLOW_NORMAL=>array('color'=>'#008000', 'label'=>'LBL_ACCESS_NORMAL', 'text_color'=>'white'),
 	ACL_ALLOW_DEFAULT=>array('color'=>'#008000', 'label'=>'LBL_ACCESS_DEFAULT', 'text_color'=>'white'),
 	ACL_ALLOW_DEV=>array('color'=>'#0000FF', 'label'=>'LBL_ACCESS_DEV', 'text_color'=>'white'),
 	ACL_ALLOW_ADMIN_DEV=>array('color'=>'#0000FF', 'label'=>'LBL_ACCESS_ADMIN_DEV', 'text_color'=>'white'),
 	);
/**
 * $GLOBALS['ACLActions
 * These are the actions for a given type. It includes the ACCESS Levels for that action and the label for that action. Every an object of the category (e.g. module) is added all associated actions are added for that object
 */
$GLOBALS['ACLActions'] = array(
	'module'=>array('actions'=>
						array(
						'admin'=>
								array(
									'aclaccess'=>array( ACL_ALLOW_NORMAL,ACL_ALLOW_DEFAULT, ACL_ALLOW_ADMIN, ACL_ALLOW_DEV, ACL_ALLOW_ADMIN_DEV),
									'label'=>'LBL_ACTION_ADMIN',
									'default'=>ACL_ALLOW_NORMAL,
								),
						'access'=>
								array(
									'aclaccess'=>array(ACL_ALLOW_ENABLED,ACL_ALLOW_DEFAULT, ACL_ALLOW_DISABLED),
									'label'=>'LBL_ACTION_ACCESS',
									'default'=>ACL_ALLOW_ENABLED,
								),
							
						'view'=>
								array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_VIEW',
									'default'=>ACL_ALLOW_ALL,
								),
					
						'list'=>
								array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_LIST',
									'default'=>ACL_ALLOW_ALL,
								),
						'edit'=>
								array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_EDIT',
									'default'=>ACL_ALLOW_ALL,
									
								),
						'delete'=>
							array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_DELETE',
									'default'=>ACL_ALLOW_ALL,
									
								),
						'import'=>
							array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_IMPORT',
									'default'=>ACL_ALLOW_ALL,
								),
						'export'=>
							array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_EXPORT',
									'default'=>ACL_ALLOW_ALL,
								),
                        'massupdate'=>
							array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_MASSUPDATE',
									'default'=>ACL_ALLOW_ALL,
								),
						
					
				),),
'Tracker'=>array('actions'=>
						array(
						'admin'=>
								array(
									'aclaccess'=>array( ACL_ALLOW_NORMAL,ACL_ALLOW_DEFAULT, ACL_ALLOW_ADMIN),
									'label'=>'LBL_ACTION_ADMIN',
									'default'=>ACL_ALLOW_NONE,
								),
						'access'=>
								array(
									'aclaccess'=>array(ACL_ALLOW_ENABLED,ACL_ALLOW_DEFAULT, ACL_ALLOW_DISABLED),
									'label'=>'LBL_ACTION_ACCESS',
									'default'=>ACL_ALLOW_NONE,
								),
							
						'view'=>
								array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_VIEW',
									'default'=>ACL_ALLOW_NONE,
								),
					
						'list'=>
								array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_LIST',
									'default'=>ACL_ALLOW_NONE,
								),
						'edit'=>
								array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_EDIT',
									'default'=>ACL_ALLOW_NONE,
									
								),
						'delete'=>
							array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_DELETE',
									'default'=>ACL_ALLOW_NONE,
									
								),
						'import'=>
							array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_IMPORT',
									'default'=>ACL_ALLOW_NONE,
								),
						'export'=>
							array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_EXPORT',
									'default'=>ACL_ALLOW_NONE,
								),
						'massupdate'=>
							array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_MASSUPDATE',
									'default'=>ACL_ALLOW_ALL,
								),
							
						),
				),				
'TrackerQuery'=>array('actions'=>
						array(
						'admin'=>
								array(
									'aclaccess'=>array( ACL_ALLOW_NORMAL,ACL_ALLOW_DEFAULT, ACL_ALLOW_ADMIN),
									'label'=>'LBL_ACTION_ADMIN',
									'default'=>ACL_ALLOW_NONE,
								),
						'access'=>
								array(
									'aclaccess'=>array(ACL_ALLOW_ENABLED,ACL_ALLOW_DEFAULT, ACL_ALLOW_DISABLED),
									'label'=>'LBL_ACTION_ACCESS',
									'default'=>ACL_ALLOW_NONE,
								),
							
						'view'=>
								array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_VIEW',
									'default'=>ACL_ALLOW_NONE,
								),
					
						'list'=>
								array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_LIST',
									'default'=>ACL_ALLOW_NONE,
								),
						'edit'=>
								array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_EDIT',
									'default'=>ACL_ALLOW_NONE,
									
								),
						'delete'=>
							array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_DELETE',
									'default'=>ACL_ALLOW_NONE,
									
								),
						'import'=>
							array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_IMPORT',
									'default'=>ACL_ALLOW_NONE,
								),
						'export'=>
							array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_EXPORT',
									'default'=>ACL_ALLOW_NONE,
								),
						'massupdate'=>
							array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_MASSUPDATE',
									'default'=>ACL_ALLOW_ALL,
								),
						),
				),
'TrackerPerf'=>array('actions'=>
						array(
						'admin'=>
								array(
									'aclaccess'=>array( ACL_ALLOW_NORMAL,ACL_ALLOW_DEFAULT, ACL_ALLOW_ADMIN),
									'label'=>'LBL_ACTION_ADMIN',
									'default'=>ACL_ALLOW_NONE,
								),
						'access'=>
								array(
									'aclaccess'=>array(ACL_ALLOW_ENABLED,ACL_ALLOW_DEFAULT, ACL_ALLOW_DISABLED),
									'label'=>'LBL_ACTION_ACCESS',
									'default'=>ACL_ALLOW_NONE,
								),
							
						'view'=>
								array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_VIEW',
									'default'=>ACL_ALLOW_NONE,
								),
					
						'list'=>
								array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_LIST',
									'default'=>ACL_ALLOW_NONE,
								),
						'edit'=>
								array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_EDIT',
									'default'=>ACL_ALLOW_NONE,
									
								),
						'delete'=>
							array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_DELETE',
									'default'=>ACL_ALLOW_NONE,
									
								),
						'import'=>
							array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_IMPORT',
									'default'=>ACL_ALLOW_NONE,
								),
						'export'=>
							array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_EXPORT',
									'default'=>ACL_ALLOW_NONE,
								),
						'massupdate'=>
							array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_MASSUPDATE',
									'default'=>ACL_ALLOW_ALL,
								),
						),
				),				
'TrackerSession'=>array('actions'=>
						array(
						'admin'=>
								array(
									'aclaccess'=>array( ACL_ALLOW_NORMAL,ACL_ALLOW_DEFAULT, ACL_ALLOW_ADMIN),
									'label'=>'LBL_ACTION_ADMIN',
									'default'=>ACL_ALLOW_NONE,
								),
						'access'=>
								array(
									'aclaccess'=>array(ACL_ALLOW_ENABLED,ACL_ALLOW_DEFAULT, ACL_ALLOW_DISABLED),
									'label'=>'LBL_ACTION_ACCESS',
									'default'=>ACL_ALLOW_NONE,
								),
							
						'view'=>
								array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_VIEW',
									'default'=>ACL_ALLOW_NONE,
								),
					
						'list'=>
								array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_LIST',
									'default'=>ACL_ALLOW_NONE,
								),
						'edit'=>
								array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_EDIT',
									'default'=>ACL_ALLOW_NONE,
									
								),
						'delete'=>
							array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_DELETE',
									'default'=>ACL_ALLOW_NONE,
									
								),
						'import'=>
							array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_IMPORT',
									'default'=>ACL_ALLOW_NONE,
								),
						'export'=>
							array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_OWNER,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_EXPORT',
									'default'=>ACL_ALLOW_NONE,
								),
						'massupdate'=>
							array(
									'aclaccess'=>array(ACL_ALLOW_ALL,ACL_ALLOW_DEFAULT, ACL_ALLOW_NONE),
									'label'=>'LBL_ACTION_MASSUPDATE',
									'default'=>ACL_ALLOW_ALL,
								),
						),
				),
);


?>