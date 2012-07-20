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

	

$connector_strings = array (
  'oauth_consumer_secret' => 'App Secret',
  'LBL_LICENSING_INFO' => '<table border="0" cellspacing="1"><tr><td valign="top" width="35%" class="dataLabel">Anskaf en API nøgle and App Secret fra Facebook&#169; ved at oprette en applikation til din Sugar løsning.<br/><br>Punkter for at oprette en applikation <br />for din løsning:<br/><br/><ol><li>Gå til følgende Facebook&#169; side for at oprette en applikation: <a href=\'http://www.facebook.com/developers/createapp.php\' target=\'_blank\'>http://www.facebook.com/developers/createapp.php</a>.</li><li><br />Log på Facebook&#169; ved at bruge den konto, under hvilken du ønsker at oprette<br />            applikationen.</li><li>På "Create Application" siden, skriv navet på applikationen. Dette er navnet brugere vil se når de authorisere deres Facebook&#169; konto inden fra Sugar.</li><li>Vælg "Agree" for at acceptere betingelserne for <br />Facebook©.</li><li>Klik "Create App"</li><li>Indtast og Send sikkerheds ordet for at passere sikkerheds tjekket.</li><li>På siden for din applikation, gå til "Web Site" området (link i venstre menu) og skriv den lokale URL for din Sugar løsning i "Site URL."</li><li>Klik "Save Changes"</li><li>Gå til "Facebook Integration" siden (link i venstre menu) og find API Key and App Secret. Indtast Application ID og Application Secret nedenfor.</li></ol></td></tr></table>',
  'oauth_consumer_key' => 'API nøgle',
);

