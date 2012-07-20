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

/*********************************************************************************

 * Description:
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc. All Rights
 * Reserved. Contributor(s): ______________________________________..
 * *******************************************************************************/


session_start();
$GLOBALS['installing'] = true;


require_once('include/JSON.php');

require_once('include/utils/db_utils.php');

require_once('include/utils/zip_utils.php');

require_once('modules/UpgradeWizard/uw_utils.php');



$json = getJSONobj();
/*
$upgradeStepTime = $json->decode(html_entity_decode($_REQUEST['upgradeStepTime']));
if(isset($tagdata['jsonObject']) && $tagdata['jsonObject'] != null){
	$upgradeStepTime = $upgradeStepTime['jsonObject'];
 }

 if(!isset($_SESSION['totalUpgradeTime'])){
   $_SESSION['totalUpgradeTime'] = 0;
 }
*/

 $_SESSION['totalUpgradeTime'] = $_SESSION['totalUpgradeTime']+$_REQUEST['upgradeStepTime'];
 $response = $_SESSION['totalUpgradeTime'];

$GLOBALS['log']->fatal('TOTAL TIME .....'.$_SESSION['totalUpgradeTime']);
 //$uptime = $uptime+$_REQUEST['upgradeStepTime'];
 $GLOBALS['log']->fatal($response);


 if (!empty($response)) {
    $json = getJSONobj();
	print $json->encode($response);
 }

sugar_cleanup();
exit();

?>
