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




$listViewDefs['ForecastOpportunities'] = array(
	'NAME' => array(
		'width' => '25%', 		
		'label' => $mod_strings['LBL_OW_OPPORTUNITIES'], 
        'tablename'=>'opportunities',        
	), 
	'REVENUE' => array(
		'width' => '10%', 
		'label' => $mod_strings['LBL_OW_REVENUE'], 
    ),
	'PROBABILITY' => array(
		'width' => '5%', 
		'label' => $mod_strings['LBL_OW_PROBABILITY'], 
        'tablename'=>'opportunities',        
    ),
	'WEIGHTED_VALUE' => array(
		'width' => '15%', 
		'label' => $mod_strings['LBL_OW_WEIGHTED'], 
    ),
	'WK_BEST_CASE' => array(
		'width' => '15%', 
		'label' => $mod_strings['LBL_FDR_WK_BEST_CASE'],		
		'edit' => true, 
        'sortable'  => false,
    ),
	'WK_LIKELY_CASE' => array(
		'width' => '15%', 
		'label' => $mod_strings['LBL_FDR_WK_LIKELY_CASE'],		
		'edit' => true, 
        'sortable'  => false,
    ),
	'WK_WORST_CASE' => array(
		'width' => '15%', 
		'label' => $mod_strings['LBL_FDR_WK_WORST_CASE'],		
		'edit' => true, 
        'sortable'  => false,
    ),		
    //not visible in the list view.
    'ACCOUNT_NAME' => array(
        'label' => $mod_strings['LBL_OW_ACCOUNTNAME'],
        'hidden'=>true,
        'width'=> '0'
    ), 
    'NEXT_STEP' =>array(
        'label' => $mod_strings['LBL_OW_NEXT_STEP'],
        'hidden'=>true,
        'width'=> '0'
    ), 
    'OPPORTUNITY_TYPE' =>array(
        'label' => $mod_strings['LBL_OW_TYPE'],
        'hidden'=>true,
        'width'=> '0'       
    ), 
    'DESCRIPTION'=>array(
        'label' => $mod_strings['LBL_OW_DESCRIPTION'],
        'hidden'=>true,
        'width'=> '0'
    
    )
);
?>
