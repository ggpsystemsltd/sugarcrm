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
  'LBL_LICENSING_INFO' => '<table border="0" cellspacing="1"><tr><td valign="top" width="35%" class="dataLabel">Nabavite API ključ i App tajnu sa Facebook&#169; kreiranjem aplikacije za Vašu Sugar instancu.<br/><br>Koraci da kreirate aplikaciju za Vašu Sugar instancu:<br/><br/><ol><li>Idite na sledeći Facebook&#169; da bi ste kreirali aplikaciju: <a href=&#39;http://www.facebook.com/developers/createapp.php&#39;; target=&#39;_blank&#39;>http://www.facebook.com/developers/createapp.php</a>.</li><li>Prijavite se na Facebook&#169; koristeći nalog pod kojim želite da kreirate aplikaciju.</li><li>U okviru "Create Application" strane, unesite naziv aplikacije. Ovaj je naziv koji će korisnici videti kada se autentikuju sa svojim Facebook&#169; nalozima u okviru Sugar-a.</li><li>Odaberite "Agree" da bi ste se složili sa Facebook&#169; Uslovima.</li><li>Kliknite na "Create App"</li><li>Unesite i potvrdite tajne reči da bi ste prošli Sigurnosne Provere.</li><li>U okviru strane za Vašu aplikaciju, idite na "Web Site" oblast (link na levoj strani menija) i unesite URL Vaše Sugar instance kao "Site URL."</li><li>Kliknite na "Save Changes"</li><li>idite na "Facebook Integration" stranu (link na levoj strani menija) i nađite API ključ i App tajnu. Unesite ID aplikacije i tajnu aplikacije ispod.</li></ol></td></tr></table>',
  'oauth_consumer_key' => 'API ključ',
  'oauth_consumer_secret' => 'App Tajna',
);

