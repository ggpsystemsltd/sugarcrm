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


// This file checks if the external accounts for the logged in user are still valid or not.
// We only check oAuth logins right now, because usernames/passwords shouldn't really expire.

require_once('include/externalAPI/ExternalAPIFactory.php');

global $app_strings;

$checkList = ExternalAPIFactory::listAPI('',true);

if ( !empty($_REQUEST['api']) ) {
    // Check just one login type
    $newCheckList = array();
    if ( isset($checkList[$_REQUEST['api']]) ) {
        $newCheckList[$_REQUEST['api']] = $checkList[$_REQUEST['api']];
    }
    
    $checkList = $newCheckList;
}

$failList = array();

if ( is_array($checkList) ) {
    foreach ( $checkList as $apiName => $apiOpts ) {
        if ( $apiOpts['authMethod'] == 'oauth' ) {
            $api = ExternalAPIFactory::loadAPI($apiName);
            if ( is_object($api) ) {
                $loginCheck = $api->quickCheckLogin();
            } else {
                $loginCheck['success'] = false;
            }
            if ( ! $loginCheck['success'] ) {
                $thisFail = array();
                
                $thisFail['checkURL'] = 'index.php?module=EAPM&closeWhenDone=1&action=QuickSave&application='.$apiName;

                $translateKey = 'LBL_EXTAPI_'.strtoupper($apiName);
                if ( ! empty($app_strings[$translateKey]) ) {
                    $apiLabel = $app_strings[$translateKey];
                } else {
                    $apiLabel = $apiName;
                }

                $thisFail['label'] = str_replace('{0}',$apiLabel,translate('LBL_ERR_FAILED_QUICKCHECK','EAPM'));
                
                $failList[$apiName] = $thisFail;
            }
        }
    }
}

$json = new JSON();
echo($json->encode($failList));
