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
  'LBL_LIST_WHERE_FILTER' => 'Status',
  'LBL_WHERE_FILTER' => 'Status:',
  'LBL_BLANK' => '',
  'LBL_MODULE_NAME' => 'Lista primalaca upozorenja',
  'LBL_MODULE_TITLE' => 'Primaici upozorenja',
  'LBL_SEARCH_FORM_TITLE' => 'Pretraga primalaca radnog toka',
  'LBL_LIST_FORM_TITLE' => 'Lista primalaca',
  'LBL_NEW_FORM_TITLE' => 'Kreiraj primaoca radnog toka',
  'LBL_LIST_USER_TYPE' => 'Tip Korisnika',
  'LBL_LIST_ARRAY_TYPE' => 'Tip akcije',
  'LBL_LIST_RELATE_TYPE' => 'Tip veze',
  'LBL_LIST_ADDRESS_TYPE' => 'Tip adrese',
  'LBL_LIST_FIELD_VALUE' => 'Korisnik',
  'LBL_LIST_REL_MODULE1' => 'Povezani modul',
  'LBL_LIST_REL_MODULE2' => 'Povezani povezani modul',
  'LBL_USER_TYPE' => 'Tip Korisnika:',
  'LBL_ARRAY_TYPE' => 'Tip akcije:',
  'LBL_RELATE_TYPE' => 'Tip veze:',
  'LBL_FIELD_VALUE' => 'Izabrani korisnik:',
  'LBL_REL_MODULE1' => 'Povezani modul:',
  'LBL_REL_MODULE2' => 'Povezani povezani modul:',
  'LBL_CUSTOM_USER' => 'Prilagođeni korisnik:',
  'LNK_NEW_WORKFLOW' => 'Kreiraj radni tok',
  'LNK_WORKFLOW' => 'Objekti radnog toka',
  'LBL_LIST_STATEMENT' => 'Primaoci upozorenja:',
  'LBL_LIST_STATEMENT_CONTENT' => 'Pošalji upozorenje sledećem primaocu:',
  'LBL_ALERT_CURRENT_USER' => 'Korisnik u vezi sa ciljem',
  'LBL_ALERT_CURRENT_USER_TITLE' => 'Korisnik u vezi sa ciljnim modulom',
  'LBL_ALERT_REL_USER' => 'Korisnik u vezi sa sa povezanim',
  'LBL_ALERT_REL_USER_TITLE' => 'Korisnik u vezi sa povezanim modulom',
  'LBL_ALERT_REL_USER_CUSTOM' => 'Primalac u vezi sa povezanim',
  'LBL_ALERT_REL_USER_CUSTOM_TITLE' => 'Primalac u vezi sa povezanim modulom',
  'LBL_ALERT_TRIG_USER_CUSTOM' => 'Primalac u vezi sa ciljnim modulom',
  'LBL_ALERT_TRIG_USER_CUSTOM_TITLE' => 'Primalac u vezi sa ciljnim modulom',
  'LBL_ALERT_SPECIFIC_USER' => 'Naveden',
  'LBL_ALERT_SPECIFIC_USER_TITLE' => 'Naveden korisnik',
  'LBL_ALERT_SPECIFIC_TEAM' => 'Svi korisnici su navedeni',
  'LBL_ALERT_SPECIFIC_TEAM_TITLE' => 'Svi korisnici u navedenom timu',
  'LBL_ALERT_SPECIFIC_ROLE' => 'Svi korisnici u navedenom',
  'LBL_ALERT_SPECIFIC_ROLE_TITLE' => 'Svi korisnici u navedenoj ulozi',
  'LBL_ALERT_SPECIFIC_TEAM_TARGET_TITLE' => 'Članovi tima u vezi sa ciljnim modulom',
  'LBL_ALERT_SPECIFIC_TEAM_TARGET' => 'Svi korisnici koji pripadaju timu(ovima) u vezi sa ciljnim modulom',
  'LBL_ALERT_LOGIN_USER_TITLE' => 'Prijavljeni korisnik u vreme izvršenja',
  'LBL_RECORD' => 'Modul',
  'LBL_TEAM' => 'Tim',
  'LBL_USER' => 'Korisnik',
  'LBL_USER_MANAGER' => 'korisnikov menadžer',
  'LBL_ROLE' => 'uloga',
  'LBL_SEND_EMAIL' => 'Pošalji Email:',
  'LBL_USER1' => 'koji je kreirao zapis',
  'LBL_USER2' => 'koji je poslednji izmenio zapis',
  'LBL_USER3' => 'Trenutni',
  'LBL_USER3b' => 'sistema.',
  'LBL_USER4' => 'koji je dodelio zapis',
  'LBL_USER5' => 'koji je dodelio zapis',
  'LBL_ADDRESS_TO' => 'za:',
  'LBL_ADDRESS_CC' => 'kopija za:',
  'LBL_ADDRESS_BCC' => 'tajna kopija:',
  'LBL_ADDRESS_TYPE' => 'koristeći adresu',
  'LBL_ADDRESS_TYPE_TARGET' => 'tip',
  'LBL_ALERT_REL1' => 'Povezani modul:',
  'LBL_ALERT_REL2' => 'Povezani povezani modul:',
  'LBL_NEXT_BUTTON' => 'Sledeći',
  'LBL_PREVIOUS_BUTTON' => 'Prethodni',
  'NTC_REMOVE_ALERT_USER' => 'Da li ste sigurni da želite da uklonite ovog primaoca upozorenja?',
  'LBL_REL_CUSTOM_STRING' => 'Odaberite polja prilagođenog email-a i imena',
  'LBL_REL_CUSTOM' => 'Idaberite polje Prilagođeni Email:',
  'LBL_REL_CUSTOM2' => 'Polje',
  'LBL_AND' => 'i polje Naziv:',
  'LBL_REL_CUSTOM3' => 'Polje',
  'LBL_FILTER_CUSTOM' => '(Dodatni filter) Filter povezanog modula po specifičnom',
  'LBL_FIELD' => 'Polje',
  'LBL_SPECIFIC_FIELD' => 'polje',
  'LBL_FILTER_BY' => '(Dodatni filter) Filter povezanog modula po',
  'LBL_MODULE_NAME_INVITE' => 'Lista pozvanih',
  'LBL_LIST_STATEMENT_INVITE' => 'Sastanak/Poziv pozvani:',
  'LBL_SELECT_VALUE' => 'Morate odabrati validnu vrednost.',
  'LBL_SELECT_NAME' => 'Morate odabrati prilagođeno polje naziva',
  'LBL_SELECT_EMAIL' => 'Morate odabrati prilagođeno polje email-a',
  'LBL_SELECT_FILTER' => 'Morate odabrati polje za filtriranje',
  'LBL_SELECT_NAME_EMAIL' => 'Morate odabrati naziv i email polja',
  'LBL_PLEASE_SELECT' => 'Molim, izaberite',
);

