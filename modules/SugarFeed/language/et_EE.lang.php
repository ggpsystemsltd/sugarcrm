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

	

$mod_strings = array (
  'LBL_MY_FAVORITES_ONLY' => 'Ainult Minu lemmikud',
  'LBL_ENABLE_EXTERNAL_CONNECTORS' => 'Note: To enable users to view Facebook and Twitter feeds, go to the Connectors settings to configure the Facebook and Twitter connectors.',
  'LBL_EXTERNAL_PREFIX' => 'External:',
  'LBL_EXTERNAL_WARNING' => 'Items labeled "external" require an external account.',
  'LBL_AUTHENTICATE' => 'Authenticate',
  'LBL_AUTHENTICATION_PENDING' => 'Not all of the external accounts you have selected have been authenticated. Click \'Cancel\' to return to the Options window to authenticate the external accounts, or click \'Ok\' to proceed without authenticating.',
  'LBL_ID' => 'ID',
  'FOR' => 'for',
  'WITH' => 'with',
  'LBL_LINK_TYPE_Link' => 'Link',
  'LBL_LINK_TYPE_Image' => 'Image',
  'LBL_TEAM' => 'Meeskond',
  'LBL_TEAM_ID' => 'Meeskonna ID:',
  'LBL_ASSIGNED_TO_ID' => 'Määratud kasutaja Id',
  'LBL_ASSIGNED_TO_NAME' => 'Vastutaja',
  'LBL_DATE_ENTERED' => 'Loomiskuupäev:',
  'LBL_DATE_MODIFIED' => 'Muutmiskuupäev',
  'LBL_MODIFIED' => 'Muutja',
  'LBL_MODIFIED_ID' => 'Muutja Id',
  'LBL_MODIFIED_NAME' => 'Muutja nime järgi',
  'LBL_CREATED' => 'Loodud',
  'LBL_CREATED_ID' => 'Looja Id',
  'LBL_DESCRIPTION' => 'Kirjeldus',
  'LBL_DELETED' => 'Kustutatud',
  'LBL_NAME' => 'Nimi',
  'LBL_SAVING' => 'Salvestamine...',
  'LBL_SAVED' => 'Salvestatud',
  'LBL_CREATED_USER' => 'Loodud kasutaja poolt',
  'LBL_MODIFIED_USER' => 'Muudetud kasutaja poolt',
  'LBL_LIST_FORM_TITLE' => 'Sugari voo loend',
  'LBL_MODULE_NAME' => 'Sugari voog',
  'LBL_MODULE_TITLE' => 'Sugari voog',
  'LBL_DASHLET_DISABLED' => 'Hoiatus: Sugari voo süsteem on keelatud, uusi voo sissekandeid ei postitata kuni see on aktiveeritud.',
  'LBL_ADMIN_SETTINGS' => 'Sugari voo sätted',
  'LBL_RECORDS_DELETED' => 'Kõik varasemad Sugari voo sissekanded on eemaldatud, kui Sugari voo süsteem on lubatud, siis uued sissekanded luuakse automaatselt.',
  'LBL_CONFIRM_DELETE_RECORDS' => 'Kas oled kindel, et soovid kõik Sugari voo sissekanded kustutada?',
  'LBL_FLUSH_RECORDS' => 'Kustuta voo sissekanded',
  'LBL_ENABLE_FEED' => 'Luba Sugari voog',
  'LBL_ENABLE_MODULE_LIST' => 'Aktiveeri vood',
  'LBL_HOMEPAGE_TITLE' => 'Minu Sugari voog',
  'LNK_NEW_RECORD' => 'Loo Sugari voog',
  'LNK_LIST' => 'Sugari voog',
  'LBL_SEARCH_FORM_TITLE' => 'Otsi Sugari voog',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Vaata ajalugu',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Tegevused',
  'LBL_SUGAR_FEED_SUBPANEL_TITLE' => 'Sugari voog',
  'LBL_NEW_FORM_TITLE' => 'Uus Sugari voog',
  'LBL_ALL' => 'Kõik',
  'LBL_USER_FEED' => 'Kasutaja voog',
  'LBL_ENABLE_USER_FEED' => 'Aktiveeri kasutaja voog',
  'LBL_TO' => 'Saada meeskonnale',
  'LBL_IS' => 'Is',
  'LBL_DONE' => 'Tehtud',
  'LBL_TITLE' => 'Tiitel',
  'LBL_ROWS' => 'Read',
  'LBL_CATEGORIES' => 'Moodulid',
  'LBL_TIME_LAST_WEEK' => 'Viimane nädal',
  'LBL_TIME_WEEKS' => 'Nädalaid',
  'LBL_TIME_DAYS' => 'Päevi',
  'LBL_TIME_YESTERDAY' => 'Eile',
  'LBL_TIME_HOURS' => 'Tundi',
  'LBL_TIME_HOUR' => 'Tundi',
  'LBL_TIME_MINUTES' => 'Minutit',
  'LBL_TIME_MINUTE' => 'Minut',
  'LBL_TIME_SECONDS' => 'Sekundid',
  'LBL_TIME_SECOND' => 'Sekund',
  'LBL_TIME_AGO' => 'tagasi',
  'CREATED_CONTACT' => 'loodud UUS kontakt',
  'CREATED_OPPORTUNITY' => 'loodud UUS müügivõimalus',
  'CREATED_CASE' => 'loodud UUS juhtum',
  'CREATED_LEAD' => 'loodud UUS müügivihje',
  'CLOSED_CASE' => 'SULETUD juhtum',
  'CONVERTED_LEAD' => 'KONVERTEERITUD müügivihje',
  'WON_OPPORTUNITY' => 'on VÕITNUD võitnud müügivõimaluse',
  'LBL_LINK_TYPE_YouTube' => 'YouTube™',
  'LBL_SELECT' => 'Vali',
  'LBL_POST' => 'Postita',
);

