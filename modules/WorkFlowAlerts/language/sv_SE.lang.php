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
  'LBL_ALERT_SPECIFIC_TEAM_TARGET_TITLE' => 'Teammedlemmar associerade med målmodulen',
  'LBL_ALERT_SPECIFIC_TEAM_TARGET' => 'Alla användare som tillhör teamet associerat med målmodulen',
  'LBL_SELECT_NAME' => 'Du måste välja ett special namnfält',
  'LBL_SELECT_EMAIL' => 'Du måste välja ett special epost fält',
  'LBL_SELECT_FILTER' => 'Du måste välja ett fält att filtrera via',
  'LBL_SELECT_NAME_EMAIL' => 'Du måst välja namn och epost fälten',
  'LBL_PLEASE_SELECT' => 'Var god välj',
  'LBL_LIST_WHERE_FILTER' => 'Status',
  'LBL_WHERE_FILTER' => 'Status:',
  'LBL_TEAM' => 'Team',
  'LBL_ADDRESS_CC' => 'cc:',
  'LBL_ADDRESS_BCC' => 'bcc:',
  'LBL_BLANK' => '',
  'LBL_MODULE_NAME' => 'Meddela mottagarlistan',
  'LBL_MODULE_TITLE' => 'Mottagare: Hem',
  'LBL_SEARCH_FORM_TITLE' => 'Sök Arbetsflödesmottagare',
  'LBL_LIST_FORM_TITLE' => 'Lista mottagare',
  'LBL_NEW_FORM_TITLE' => 'Skapa Arbetsflödesmottagare',
  'LBL_LIST_USER_TYPE' => 'Användartyp',
  'LBL_LIST_ARRAY_TYPE' => 'Typ av åtgärd',
  'LBL_LIST_RELATE_TYPE' => 'Typ av relaterad',
  'LBL_LIST_ADDRESS_TYPE' => 'Adresstyp',
  'LBL_LIST_FIELD_VALUE' => 'Användare',
  'LBL_LIST_REL_MODULE1' => 'Relaterad modul',
  'LBL_LIST_REL_MODULE2' => 'Relaterad relaterad modul',
  'LBL_USER_TYPE' => 'Användartyp:',
  'LBL_ARRAY_TYPE' => 'Typ av åtgärd:',
  'LBL_RELATE_TYPE' => 'Typ av relation:',
  'LBL_FIELD_VALUE' => 'Vald användare:',
  'LBL_REL_MODULE1' => 'Relaterad modul:',
  'LBL_REL_MODULE2' => 'Relaterad relaterad modul:',
  'LBL_CUSTOM_USER' => 'Anpassad användare:',
  'LNK_NEW_WORKFLOW' => 'Skapa Arbetsflöde',
  'LNK_WORKFLOW' => 'Arbetsflöde objekt',
  'LBL_LIST_STATEMENT' => 'Meddela mottagarna:',
  'LBL_LIST_STATEMENT_CONTENT' => 'Skicka meddelande till följande mottagare:',
  'LBL_ALERT_CURRENT_USER' => 'En användare associerad med målet:',
  'LBL_ALERT_CURRENT_USER_TITLE' => 'En användare associerad till målmodulen',
  'LBL_ALERT_REL_USER' => 'En användare associerad till en relaterad',
  'LBL_ALERT_REL_USER_TITLE' => 'En användare associerade till relaterad modul',
  'LBL_ALERT_REL_USER_CUSTOM' => 'Mottagare associerad till en relaterad',
  'LBL_ALERT_REL_USER_CUSTOM_TITLE' => 'Mottagare associerad till relaterad modul',
  'LBL_ALERT_TRIG_USER_CUSTOM' => 'Mottagare associerad till målmodulen',
  'LBL_ALERT_TRIG_USER_CUSTOM_TITLE' => 'Mottagare associerad till målmodulen',
  'LBL_ALERT_SPECIFIC_USER' => 'En specifik',
  'LBL_ALERT_SPECIFIC_USER_TITLE' => 'En specifik användare',
  'LBL_ALERT_SPECIFIC_TEAM' => 'Alla användare i en specifik',
  'LBL_ALERT_SPECIFIC_TEAM_TITLE' => 'Alla användare i ett specifikt team',
  'LBL_ALERT_SPECIFIC_ROLE' => 'Alla användare i en specifik',
  'LBL_ALERT_SPECIFIC_ROLE_TITLE' => 'Alla användare med en speciell roll',
  'LBL_ALERT_LOGIN_USER_TITLE' => 'Inloggad användare vid exekveringstiden',
  'LBL_RECORD' => 'Modul',
  'LBL_USER' => 'Användare',
  'LBL_USER_MANAGER' => 'användarens chef',
  'LBL_ROLE' => 'roll',
  'LBL_SEND_EMAIL' => 'Skicka epost till:',
  'LBL_USER1' => 'som skapade posten',
  'LBL_USER2' => 'som senast redigerade posten',
  'LBL_USER3' => 'Aktuell',
  'LBL_USER3b' => 'av systemet.',
  'LBL_USER4' => 'som är tilldelad till posten',
  'LBL_USER5' => 'som var tilldelad till posten',
  'LBL_ADDRESS_TO' => 'till:',
  'LBL_ADDRESS_TYPE' => 'använder adress',
  'LBL_ADDRESS_TYPE_TARGET' => 'typ',
  'LBL_ALERT_REL1' => 'Relaterad modul',
  'LBL_ALERT_REL2' => 'Relaterad relaterad modul:',
  'LBL_NEXT_BUTTON' => 'Nästa',
  'LBL_PREVIOUS_BUTTON' => 'Föregående',
  'NTC_REMOVE_ALERT_USER' => 'Är du säker på att du vill radera mottagaren?',
  'LBL_REL_CUSTOM_STRING' => 'Välj anpassade epost och namnfält',
  'LBL_REL_CUSTOM' => 'välj anpassat epostfält:',
  'LBL_REL_CUSTOM2' => 'Fält',
  'LBL_AND' => 'och namnfält:',
  'LBL_REL_CUSTOM3' => 'Fält',
  'LBL_FILTER_CUSTOM' => '(Ytterligare filter) Filtrera relaterad modul efter specifik',
  'LBL_FIELD' => 'Fält',
  'LBL_SPECIFIC_FIELD' => 'fält',
  'LBL_FILTER_BY' => '(Ytterligare filter) Filtrera relaterad modul efter',
  'LBL_MODULE_NAME_INVITE' => 'Lista över inbjudna',
  'LBL_LIST_STATEMENT_INVITE' => 'Mötes/telefonsamtals inbjudna',
  'LBL_SELECT_VALUE' => 'Välj ett giltigt värde.',
);

