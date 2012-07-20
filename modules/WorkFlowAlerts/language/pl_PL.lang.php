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
  'LBL_LIST_RELATE_TYPE' => 'Powiąż typ',
  'LBL_LIST_REL_MODULE2' => 'Powiązany moduł',
  'LBL_REL_MODULE2' => 'Powiązany moduł',
  'LBL_ALERT_REL2' => 'Powiązany moduł',
  'LBL_FILTER_CUSTOM' => '(Dodatkowy filtr) moduł powiązany z filtrem według określony',
  'LBL_FILTER_BY' => '(Dodatkowy filtr) moduł powiązany z filtrem według',
  'LBL_LIST_WHERE_FILTER' => 'Status',
  'LBL_WHERE_FILTER' => 'Status:',
  'LBL_BLANK' => '',
  'LBL_MODULE_NAME' => 'Lista odbiorców alertów',
  'LBL_MODULE_TITLE' => 'Odbiorcy: Strona główna',
  'LBL_SEARCH_FORM_TITLE' => 'Wyszukiwanie odbiorców Workflow',
  'LBL_LIST_FORM_TITLE' => 'Lista odbiorców',
  'LBL_NEW_FORM_TITLE' => 'Utwórz odbiorcę Workflow',
  'LBL_LIST_USER_TYPE' => 'Typ użytkownika',
  'LBL_LIST_ARRAY_TYPE' => 'Typ akcji',
  'LBL_LIST_ADDRESS_TYPE' => 'Typ adresu',
  'LBL_LIST_FIELD_VALUE' => 'Użytkownik',
  'LBL_LIST_REL_MODULE1' => 'Powiązany moduł:',
  'LBL_USER_TYPE' => 'Typ użytkownika:',
  'LBL_ARRAY_TYPE' => 'Typ akcji:',
  'LBL_RELATE_TYPE' => 'Typ związku:',
  'LBL_FIELD_VALUE' => 'Wybrany użytkownik:',
  'LBL_REL_MODULE1' => 'Powiązany moduł:',
  'LBL_CUSTOM_USER' => 'Niestandardowy użytkownik:',
  'LNK_NEW_WORKFLOW' => 'Utwórz Workflow',
  'LNK_WORKFLOW' => 'Obiekty Workflow',
  'LBL_LIST_STATEMENT' => 'Odbiorcy alertów:',
  'LBL_LIST_STATEMENT_CONTENT' => 'Wyślij ostrzeżenie do następujących odbiorców:',
  'LBL_ALERT_CURRENT_USER' => 'Użytkownik związany z docelowym',
  'LBL_ALERT_CURRENT_USER_TITLE' => 'Użytkownik związany z docelowym modułem',
  'LBL_ALERT_REL_USER' => 'Użytkownik związany z powiązanym',
  'LBL_ALERT_REL_USER_TITLE' => 'Użytkownik związany z powiązanym modułem',
  'LBL_ALERT_REL_USER_CUSTOM' => 'Odbiorca związany z powiązanym',
  'LBL_ALERT_REL_USER_CUSTOM_TITLE' => 'Odbiorca związany z powiązanym modułem',
  'LBL_ALERT_TRIG_USER_CUSTOM' => 'Odbiorca związany z docelowym modułem',
  'LBL_ALERT_TRIG_USER_CUSTOM_TITLE' => 'Odbiorca związany z docelowym modułem',
  'LBL_ALERT_SPECIFIC_USER' => 'Określony',
  'LBL_ALERT_SPECIFIC_USER_TITLE' => 'Określony użytkownik',
  'LBL_ALERT_SPECIFIC_TEAM' => 'Wszyscy użytkownicy w określonym',
  'LBL_ALERT_SPECIFIC_TEAM_TITLE' => 'Wszyscy użytkownicy w określonym zespole',
  'LBL_ALERT_SPECIFIC_ROLE' => 'Wszyscy użytkownicy w określonej',
  'LBL_ALERT_SPECIFIC_ROLE_TITLE' => 'Wszyscy użytkownicy w określonej roli',
  'LBL_ALERT_SPECIFIC_TEAM_TARGET_TITLE' => 'Członkowie zespołu związani z docelowym modułem',
  'LBL_ALERT_SPECIFIC_TEAM_TARGET' => 'Wszyscy użytkownicy, którzy należą do zespołu (ów) związanych z docelowym modułem',
  'LBL_ALERT_LOGIN_USER_TITLE' => 'Zalogowany użytkownik w czasie realizacji',
  'LBL_RECORD' => 'Moduł',
  'LBL_TEAM' => 'Zespół',
  'LBL_USER' => 'Użytkownik',
  'LBL_USER_MANAGER' => 'Menedżer użytkownika',
  'LBL_ROLE' => 'rola',
  'LBL_SEND_EMAIL' => 'Wyślij e-mail do:',
  'LBL_USER1' => 'który utworzył rekord',
  'LBL_USER2' => 'który ostatnio modyfikował rekord',
  'LBL_USER3' => 'Obecny',
  'LBL_USER3b' => 'systemu.',
  'LBL_USER4' => 'który jest przydzielony rekord',
  'LBL_USER5' => 'który był przydzielony rekord',
  'LBL_ADDRESS_TO' => 'do:',
  'LBL_ADDRESS_CC' => 'dw:',
  'LBL_ADDRESS_BCC' => 'udw:',
  'LBL_ADDRESS_TYPE' => 'używając adresu',
  'LBL_ADDRESS_TYPE_TARGET' => 'typ',
  'LBL_ALERT_REL1' => 'Powiązany moduł:',
  'LBL_NEXT_BUTTON' => 'Następny',
  'LBL_PREVIOUS_BUTTON' => 'Poprzedni',
  'NTC_REMOVE_ALERT_USER' => 'Czy na pewno chcesz usunąć tego odbiorcę ostrzeżenia?',
  'LBL_REL_CUSTOM_STRING' => 'Wybierz niestandardowy e-mail i nazwij pola',
  'LBL_REL_CUSTOM' => 'Wybierz niestandardowe pole e-mail:',
  'LBL_REL_CUSTOM2' => 'Pole',
  'LBL_AND' => 'i nazwij pole:',
  'LBL_REL_CUSTOM3' => 'Pole',
  'LBL_FIELD' => 'Pole',
  'LBL_SPECIFIC_FIELD' => 'pole',
  'LBL_MODULE_NAME_INVITE' => 'Lista zaproszonych',
  'LBL_LIST_STATEMENT_INVITE' => 'Zaproszeni na spotkanie/do rozmowy tel.',
  'LBL_SELECT_VALUE' => 'Musisz wybrać poprawną wartość.',
  'LBL_SELECT_NAME' => 'Musisz wybrać niestandardową nazwę pola',
  'LBL_SELECT_EMAIL' => 'Musisz wybrać pole niestandardowego e-maila',
  'LBL_SELECT_FILTER' => 'Musisz wybrać pole, wobec którego należy filtrować',
  'LBL_SELECT_NAME_EMAIL' => 'Musisz wybrać nazwę i pola e-maila',
  'LBL_PLEASE_SELECT' => 'Proszę wybierz',
);

