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
  'LBL_LICENSING_INFO' => 'Egy Facebook alkalmazás létrehozásához kérjük adja meg az API Key és App Secret karaktersorozatokat. <br /><br />Az alkalmazás létrehozásának lépései:<br /><br />1.  Menjen a következő Facebook oldalra: http://www.facebook.com/developers/createapp.php<br />2.  Jelentkezzen be saját felhasználó nevével és jelszavával.<br />3.  Az "Alkalmazás létrehozása" oldalon belül adjon meg egy nevet az alkalmazáshoz. Ezzel a névvel lesz azonosítva Facebook alkalmazása a Sugar alkalmazáson belül.<br />4.  Fogadja el a Facebook Felhasználási feltételeket az "Egyetért" gombbal.<br />5.  Kattintson az "Alkalmazás létrehozása" gombra.<br />6.  Adja meg a biztonsági szavakat a továbblépéshez.<br />7.  Az alkalmazás oldalon belül menjen a "Weboldal" területre (bal oldali menü) és adja meg azt az URL címet, amelyet szeretne megjeleníteni az alkalmazásban (Site URL).<br />8.  Mentse el az alkalmazást.<br />9.  Menjen a "Facebook integráció" oldalra (bal oldali menü), ahol megtalálja az API Key és App Secret karaktersorozatokat. Alább adja meg ezeket az adatokat.',
  'oauth_consumer_key' => 'API Key',
  'oauth_consumer_secret' => 'App Secret',
);

