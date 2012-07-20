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


	
$mod_strings = array (
  'LBL_ALERT_SPECIFIC_TEAM_TARGET' => 'All users that belong to the team(s) asscoiated with the target module',
  'LBL_FILTER_BY' => '(Additional Filter) Filter related module by',
  'LBL_BLANK' => '',
  'LBL_FILTER_CUSTOM' => '(Additional Filter) Filter related module by specific',
  'LBL_MODULE_NAME' => 'Teavituse saajate loend',
  'LBL_MODULE_TITLE' => 'Saajad: Avaleht',
  'LBL_SEARCH_FORM_TITLE' => 'Töövoo saajate otsing',
  'LBL_LIST_FORM_TITLE' => 'Saajate loend',
  'LBL_NEW_FORM_TITLE' => 'Loo töövoo saaja',
  'LBL_LIST_USER_TYPE' => 'Kasutaja tüüp',
  'LBL_LIST_ARRAY_TYPE' => 'Tegevuse tüüp',
  'LBL_LIST_RELATE_TYPE' => 'Seo tüüp',
  'LBL_LIST_ADDRESS_TYPE' => 'Aadressi tüüp',
  'LBL_LIST_FIELD_VALUE' => 'Kasutaja',
  'LBL_LIST_REL_MODULE1' => 'Seotud moodul',
  'LBL_LIST_REL_MODULE2' => 'Seotud moodul',
  'LBL_LIST_WHERE_FILTER' => 'Olek',
  'LBL_USER_TYPE' => 'Kasutaja tüüp:',
  'LBL_ARRAY_TYPE' => 'Tegevuse tüüp:',
  'LBL_RELATE_TYPE' => 'Seose tüüp:',
  'LBL_WHERE_FILTER' => 'Olek:',
  'LBL_FIELD_VALUE' => 'Valtud kasutaja:',
  'LBL_REL_MODULE1' => 'Seotud moodul:',
  'LBL_REL_MODULE2' => 'Seotud moodul:',
  'LBL_CUSTOM_USER' => 'Tavakasutaja:',
  'LNK_NEW_WORKFLOW' => 'Loo töövoog',
  'LNK_WORKFLOW' => 'Töövoo objektid',
  'LBL_LIST_STATEMENT' => 'Teavita saajaid:',
  'LBL_LIST_STATEMENT_CONTENT' => 'Saada teavitus järgnevatele saajatele:',
  'LBL_ALERT_CURRENT_USER' => 'Eesmärgiga seotud kasutaja',
  'LBL_ALERT_CURRENT_USER_TITLE' => 'Eesmärgi mooduliga seotud kasutaja',
  'LBL_ALERT_REL_USER' => 'Seostatud kasutaja seotud',
  'LBL_ALERT_REL_USER_TITLE' => 'Seotud mooduliga seostatud kasutaja',
  'LBL_ALERT_REL_USER_CUSTOM' => 'Saaja seostatud seotud',
  'LBL_ALERT_REL_USER_CUSTOM_TITLE' => 'Saaja seostatud seotud mooduliga',
  'LBL_ALERT_TRIG_USER_CUSTOM' => 'Saaja seostatud sihtmooduliga',
  'LBL_ALERT_TRIG_USER_CUSTOM_TITLE' => 'Saaja seostatud sihtmooduliga',
  'LBL_ALERT_SPECIFIC_USER' => 'Määratletud',
  'LBL_ALERT_SPECIFIC_USER_TITLE' => 'Määratletud kasutaja',
  'LBL_ALERT_SPECIFIC_TEAM' => 'Kõik kasutajad määratletud',
  'LBL_ALERT_SPECIFIC_TEAM_TITLE' => 'Kõik kasutajad määratletud meeskonnas',
  'LBL_ALERT_SPECIFIC_ROLE' => 'Kõik kasutajad määratletud',
  'LBL_ALERT_SPECIFIC_ROLE_TITLE' => 'Kõik kasutajad määratletud sollis',
  'LBL_ALERT_SPECIFIC_TEAM_TARGET_TITLE' => 'Meeskonna liikmed seostatud sihtmooduliga',
  'LBL_ALERT_LOGIN_USER_TITLE' => 'Sisseloginud kasutaja täitmise järgi',
  'LBL_RECORD' => 'Moodul',
  'LBL_TEAM' => 'Meeskond',
  'LBL_USER' => 'Kasutaja',
  'LBL_USER_MANAGER' => 'kasutajate haldaja',
  'LBL_ROLE' => 'roll',
  'LBL_SEND_EMAIL' => 'Saada e-kiri:',
  'LBL_USER1' => 'kes oli kirje looja',
  'LBL_USER2' => 'kes viimati muutis kirjet',
  'LBL_USER3' => 'Praegune',
  'LBL_USER3b' => 'of system.',
  'LBL_USER4' => 'who is assigned the record',
  'LBL_USER5' => 'who was assigned the record',
  'LBL_ADDRESS_TO' => 'saaja:',
  'LBL_ADDRESS_CC' => 'koopia:',
  'LBL_ADDRESS_BCC' => 'pimekoopia:',
  'LBL_ADDRESS_TYPE' => 'kasutades aadressi',
  'LBL_ADDRESS_TYPE_TARGET' => 'tüüp',
  'LBL_ALERT_REL1' => 'Seotud moodul:',
  'LBL_ALERT_REL2' => 'Seotud moodul:',
  'LBL_NEXT_BUTTON' => 'Järgmine',
  'LBL_PREVIOUS_BUTTON' => 'Eelmine',
  'NTC_REMOVE_ALERT_USER' => 'Oled kindel, et soovid seda teavitusesaajat eemaldada?',
  'LBL_REL_CUSTOM_STRING' => 'Vali kohandatud e-kirja ja nime väljad',
  'LBL_REL_CUSTOM' => 'Vali kohandatud E-kirja väli:',
  'LBL_REL_CUSTOM2' => 'Väli',
  'LBL_AND' => 'ja nime väli:',
  'LBL_REL_CUSTOM3' => 'Väli',
  'LBL_FIELD' => 'Väli',
  'LBL_SPECIFIC_FIELD' => 'väli',
  'LBL_MODULE_NAME_INVITE' => 'Kutsuta kutsutu',
  'LBL_LIST_STATEMENT_INVITE' => 'Kohtumise/telefonikõne kutsutud:',
  'LBL_SELECT_VALUE' => 'Vali kehtiv väärtus.',
  'LBL_SELECT_NAME' => 'Vali kohandatud nime väli',
  'LBL_SELECT_EMAIL' => 'Vali kohandatud e-kirja väli',
  'LBL_SELECT_FILTER' => 'Vali väli filtreerimiseks',
  'LBL_SELECT_NAME_EMAIL' => 'Vali nimi ja e-kirja väljad',
  'LBL_PLEASE_SELECT' => 'Palun vali',
);

