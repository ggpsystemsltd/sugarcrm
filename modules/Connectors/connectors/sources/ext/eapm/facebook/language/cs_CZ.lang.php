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
  'LBL_LICENSING_INFO' => 'Získejte klíč a secret z Twitteru registrací vaší Sugar instance jako nové aplikace.<br /><br />Kroky k registraci instance:<br />1. Přejít na Facebook© stránky: http://www.facebook.com/developers/createapp.php.<br />2. Přihlásit se pomocí účtu Facebook, pod který chcete zaregistrovat aplikaci.<br />3. V rámci registračního formuláře Aplikace, zadejte název aplikace. Toto je název se uživatelům zobrazí při ověřování jejich Facebook účtů v Sugar.<br />4. Potvrdte Váš souhlas s podmínkami.<br />5. Klikněte Vytvořit aplikaci<br />6. Zadejte bezpečnostní slovo.<br />7. V rámci aplikace, jdete na oblast "Web Site" (menu nalevo) and vložte URL Vaší Sugar instance pro "Site URL."<br />8. Uložte<br />9. Na stránce "Integrace s Facebook" / "Facebook Integration" (menu nalevo) naleznete API Klíč a Secret. Zadejte klíč a secret níže.',
  'oauth_consumer_key' => 'API klíč',
  'oauth_consumer_secret' => 'App Tajné',
);

