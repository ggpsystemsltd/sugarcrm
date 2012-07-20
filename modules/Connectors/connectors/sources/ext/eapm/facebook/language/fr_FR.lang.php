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
  'LBL_LICENSING_INFO' => '<table border="0" cellspacing="1"><tr><td valign="top" width="35%" class="dataLabel">Les "Clé API" et "Code secret API" sont les paramètres que vous obtenez depuis Facebook&#169; lorsque vous créez une nouvelle application. Pour commencer, allez sur : <a href=\'http://www.facebook.com/developers/createapp.php\'>http://www.facebook.com/developers/createapp.php</a>.<br><ol><li>Saisir le nom de votre appplication, il s&#39;agit du nom que l&#39;utilisateur verra apparaitre lorsqu&#39;il s&#39;authentifira depuis SugarCRM</li><li>Cliquer sur Site Web et saisir l&#39;URL de votre instance SugarCRM dans "Site URL"</li><li>Sauvegarder les modificatioins</li><li>Copier les "Clé API" et "Code secret API" dans les champs correspondants dans les paramètrers de connexions</li></ol></td></tr></table>',
  'oauth_consumer_key' => 'Clé API',
  'oauth_consumer_secret' => 'Code secret API',
);

