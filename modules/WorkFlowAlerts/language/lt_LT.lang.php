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
  'LBL_ADDRESS_CC' => 'cc:',
  'LBL_ADDRESS_BCC' => 'bcc:',
  'LBL_BLANK' => '',
  'LBL_MODULE_NAME' => 'Įspėjimą gausiančių gavėjų sąrašas',
  'LBL_MODULE_TITLE' => 'Gavėjai: Pradžia',
  'LBL_SEARCH_FORM_TITLE' => 'Darbo sekos gavėjų paieška',
  'LBL_LIST_FORM_TITLE' => 'Gavėjų sąrašas',
  'LBL_NEW_FORM_TITLE' => 'Sukurti darbo sekos gavėją',
  'LBL_LIST_USER_TYPE' => 'Vartotojo tipas',
  'LBL_LIST_ARRAY_TYPE' => 'Veiksmo tipas',
  'LBL_LIST_RELATE_TYPE' => 'Susijęs tipas',
  'LBL_LIST_ADDRESS_TYPE' => 'Adreso tipas',
  'LBL_LIST_FIELD_VALUE' => 'Atsakingas',
  'LBL_LIST_REL_MODULE1' => 'Susijęs modulis',
  'LBL_LIST_REL_MODULE2' => 'Susijęs susijęs modulis',
  'LBL_LIST_WHERE_FILTER' => 'Statusas:',
  'LBL_USER_TYPE' => 'Vartotojo tipas',
  'LBL_ARRAY_TYPE' => 'Veiksmo tipas:',
  'LBL_RELATE_TYPE' => 'Susiejimo tipas:',
  'LBL_WHERE_FILTER' => 'Statusas:',
  'LBL_FIELD_VALUE' => 'Pasirinktas vartotojas:',
  'LBL_REL_MODULE1' => 'Susijęs modulis:',
  'LBL_REL_MODULE2' => 'Susijęs susijęs modulis',
  'LBL_CUSTOM_USER' => 'Nestandartinis vartotojas:',
  'LNK_NEW_WORKFLOW' => 'Sukurti darbo seką',
  'LNK_WORKFLOW' => 'Darbo sekos objektai',
  'LBL_LIST_STATEMENT' => 'Įspėti gavėjus:',
  'LBL_LIST_STATEMENT_CONTENT' => 'Siųsti įspėjimą šiems gavėjams:',
  'LBL_ALERT_CURRENT_USER' => 'Vartotojas susietas su adresatu',
  'LBL_ALERT_CURRENT_USER_TITLE' => 'Vartotojas susietas su moduliu',
  'LBL_ALERT_REL_USER' => 'Vartotojas susietas su susijusiu',
  'LBL_ALERT_REL_USER_TITLE' => 'Vartotojas susietas su susijusiu moduliu',
  'LBL_ALERT_REL_USER_CUSTOM' => 'Gavėjas susietas su susijusiu',
  'LBL_ALERT_REL_USER_CUSTOM_TITLE' => 'Gavėjas susietas su susijusiu moduliu',
  'LBL_ALERT_TRIG_USER_CUSTOM' => 'Gavėjas susietas su moduliu',
  'LBL_ALERT_TRIG_USER_CUSTOM_TITLE' => 'Gavėjas susietas su moduliu',
  'LBL_ALERT_SPECIFIC_USER' => 'Nurodytas',
  'LBL_ALERT_SPECIFIC_USER_TITLE' => 'Nurodytas vartotojas',
  'LBL_ALERT_SPECIFIC_TEAM' => 'Visi vartotojai nurodytoje',
  'LBL_ALERT_SPECIFIC_TEAM_TITLE' => 'Visi vartotojai nurodytoje komandoje',
  'LBL_ALERT_SPECIFIC_ROLE' => 'Visi vartotojai nurodytoje',
  'LBL_ALERT_SPECIFIC_ROLE_TITLE' => 'Visi vartotojai nurodytoje rolėje',
  'LBL_ALERT_SPECIFIC_TEAM_TARGET_TITLE' => 'Komandos nariai susieti su moduliu',
  'LBL_ALERT_SPECIFIC_TEAM_TARGET' => 'Visi komandos nariai susieti su moduliu',
  'LBL_ALERT_LOGIN_USER_TITLE' => 'Vykdymo metu prisijungę vartotojai',
  'LBL_RECORD' => 'Modulis',
  'LBL_TEAM' => 'Komanda',
  'LBL_USER' => 'Atsakingas',
  'LBL_USER_MANAGER' => 'vartotojo vadovas',
  'LBL_ROLE' => 'rolė',
  'LBL_SEND_EMAIL' => 'Siųsti laišką',
  'LBL_USER1' => 'kuris sukūrė įrašą',
  'LBL_USER2' => 'kuris paskutinis pakeitė įrašą',
  'LBL_USER3' => 'Esamas',
  'LBL_USER3b' => 'sistemos',
  'LBL_USER4' => 'kuris paskyrė įrašą',
  'LBL_USER5' => 'kuriam buvo paskirtas įrašas',
  'LBL_ADDRESS_TO' => 'kam:',
  'LBL_ADDRESS_TYPE' => 'naudojant adresą',
  'LBL_ADDRESS_TYPE_TARGET' => 'tipas',
  'LBL_ALERT_REL1' => 'Susijęs modulis:',
  'LBL_ALERT_REL2' => 'Susijęs susijęs modulis:',
  'LBL_NEXT_BUTTON' => 'Toliau',
  'LBL_PREVIOUS_BUTTON' => 'Atgal',
  'NTC_REMOVE_ALERT_USER' => 'Ar tikrai norite išimti šį įspėjimo gavėją',
  'LBL_REL_CUSTOM_STRING' => 'Pasirinkite nestandartinius pašto ir vardo laukus',
  'LBL_REL_CUSTOM' => 'pasirinkite nestandartinį pašto lauką:',
  'LBL_REL_CUSTOM2' => 'Laukas',
  'LBL_AND' => 'ir vardo laukas:',
  'LBL_REL_CUSTOM3' => 'Laukas',
  'LBL_FILTER_CUSTOM' => '(Papildomas filtras) Filtruoti susijusį modulį pagal',
  'LBL_FIELD' => 'Laukas',
  'LBL_SPECIFIC_FIELD' => 'laukas',
  'LBL_FILTER_BY' => '(Papildomas filtras) Filtruoti susijusį modulį pagal',
  'LBL_MODULE_NAME_INVITE' => 'Dalyvių sąrašas',
  'LBL_LIST_STATEMENT_INVITE' => 'Susitikimo/skambučio dalyviai:',
  'LBL_SELECT_VALUE' => 'Prašome nurodyti teisingą reikšmę.',
  'LBL_SELECT_NAME' => 'Prašome pasirinkti nestandartinį vardo lauką',
  'LBL_SELECT_EMAIL' => 'Prašome pasirinkti nestandartinį pašto lauką',
  'LBL_SELECT_FILTER' => 'Nurodykite lauką, pagal kurį filtruosite',
  'LBL_SELECT_NAME_EMAIL' => 'Jūs turite pasirinkti vardą ir pašto laukus',
  'LBL_PLEASE_SELECT' => 'Prašome pasirinkti',
);

