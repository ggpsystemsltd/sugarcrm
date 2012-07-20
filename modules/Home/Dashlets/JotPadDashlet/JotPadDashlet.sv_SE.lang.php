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

















if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');




















$defaultText = 
<<<EOQ
Welcome to Sugar 5.0<br /><br />

New features include:<br />
* Multiple homepages with customizable dashlets<br />
* Improved Dashboards and Charts<br />
* New Email Client for smoother communication<br />
* Module Builder to extend your SugarCRM deployment<br />
* Improved Sugar Studio and Access Control Features<br /><br />

For more information on getting started, please visit Sugar University.
EOQ
;


$dashletStrings['JotPadDashlet'] = array('LBL_TITLE'            => 'JotPad',
                                         'LBL_DESCRIPTION'      => 'En dashlet för dina anteckningar',
                                         'LBL_SAVING'           => 'Sparar JotPad ...',
                                         'LBL_SAVED'            => 'Sparat',
                                         'LBL_CONFIGURE_TITLE'  => 'Titel',
                                         'LBL_CONFIGURE_HEIGHT' => 'Höjd (1 - 300)',
                                         'LBL_DBLCLICK_HELP'    => 'Dubbelklicka nedan för att editera.',
                                         'LBL_DEFAULT_TEXT'     => $defaultText,
);
?>