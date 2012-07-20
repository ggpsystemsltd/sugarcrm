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
  'company_url' => 'URL',
  'LBL_LICENSING_INFO' => '<table border="0" cellspacing="1"><tr><td valign="top" width="35%" class="dataLabel">Nabavite potrošački ljuč i tajnu sa Twitter&#169; registrovanjem vaše Sugar instance kao nove aplikacije.<br/><br>Koraci za registraciju Vaše instance:<br/><br/><ol><li>Idite na Twitter&#169; razvojni sajt: <a href=&#39;http://dev.twitter.com/apps/new&#39; target=&#39;_blank&#39;>http://dev.twitter.com/apps/new</a>.</li><li>Prijavite se koristeći Twitter nalog sa kojim želite da registrujete aplikaciju.</li><li>U formi za registraciju, unesite naziv za aplikaciju. Ovo je naziv koji će korisnici videti kada potvrde svoje Twitter naloge u Sugar-u.</li><li>Unesite opis</li><li>Unesite web sajt URL aplikacije (može biti bilo šta).</li><li>Odaberite "Browser" za tip aplikacije.</li><li>Nakon selektovanja "Browser" za tip aplikacije, unesite Callback URL (može biti bilo šta jer Sugar zaobilazi ovo pri autentifikaciji. Na primer: Unesite svoju URL adresu Sugar-a).</li><li>Unesite sigurnosne reči.</li><li>Klinite na "Register application".</li><li>Prihvatite Twitter API Terms of Service.</li><li>u okviru strane aplikacije pronađite potrošački ključ i tajnu. Unesite ključ i tajnu ispod.</li></ol></td></tr></table>',
  'LBL_NAME' => 'Twitter korisničko ime',
  'LBL_ID' => 'Twitter korisničko ime',
  'oauth_consumer_key' => 'Potrošački ključ',
  'oauth_consumer_secret' => 'Potrošačka tajna',
);

