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
  'LBL_LIST_STATUS' => 'Status',
  'LBL_STATUS' => 'Status:',
  'LBL_MODULE_NAME' => 'Definicije radnog toka',
  'LBL_MODULE_ID' => 'Radni tok',
  'LBL_MODULE_TITLE' => 'Radni tok: Početna strana',
  'LBL_SEARCH_FORM_TITLE' => 'Pratraga radnog toka',
  'LBL_LIST_FORM_TITLE' => 'Lista radnih tokova',
  'LBL_NEW_FORM_TITLE' => 'Kreiraj definiciju radnog toka',
  'LBL_LIST_NAME' => 'Naziv',
  'LBL_LIST_TYPE' => 'Izvršenje se javlja:',
  'LBL_LIST_BASE_MODULE' => 'Ciljani modul:',
  'LBL_NAME' => 'Naziv:',
  'LBL_DESCRIPTION' => 'Opis:',
  'LBL_TYPE' => 'Izvršenje se javlja:',
  'LBL_BASE_MODULE' => 'Ciljani modul:',
  'LBL_LIST_ORDER' => 'Redosled procesiranja:',
  'LBL_FROM_NAME' => 'Ime pošiljaoca:',
  'LBL_FROM_ADDRESS' => 'Adresa pošiljaoca:',
  'LNK_NEW_WORKFLOW' => 'Kreiraj definiciju radnog toka',
  'LNK_WORKFLOW' => 'Lista definicija radnog toka',
  'LBL_ALERT_TEMPLATES' => 'Šabloni upozorenja',
  'LBL_CREATE_ALERT_TEMPLATE' => 'Kreiraj šablon upozorenja:',
  'LBL_SUBJECT' => 'Naslov:',
  'LBL_RECORD_TYPE' => 'Odnosi se na:',
  'LBL_RELATED_MODULE' => 'Povezani modul:',
  'LBL_PROCESS_LIST' => 'Redosled radnog toka',
  'LNK_ALERT_TEMPLATES' => 'Šabloni Email upozorenja',
  'LNK_PROCESS_VIEW' => 'Redosled radnog toka',
  'LBL_PROCESS_SELECT' => 'Molim, odaberite modul:',
  'LBL_LACK_OF_TRIGGER_ALERT' => 'Beleška: Morate da kreirate okidač za ovog objekta radnog toka da bi funkcionisao',
  'LBL_LACK_OF_NOTIFICATIONS_ON' => 'Beleška: Da bi slali upozorenja, unesite informacije o SMTP serveru u Administraicji > Email podešavnaja.',
  'LBL_FIRE_ORDER' => 'Redosled procesiranja:',
  'LBL_RECIPIENTS' => 'Priomaoci',
  'LBL_INVITEES' => 'Pozvani',
  'LBL_INVITEE_NOTICE' => 'Upozorenje, morate odabrati bar jednog pozvanog da bi ovo kreirali.',
  'NTC_REMOVE_ALERT' => 'Da li ste sigurni da želite da uklonite ovaj radni tok?',
  'LBL_EDIT_ALT_TEXT' => 'Alternativni tekst',
  'LBL_INSERT' => 'Unesi',
  'LBL_SELECT_OPTION' => 'Molim, izaberite opciju.',
  'LBL_SELECT_VALUE' => 'Morate odabrati vrednost.',
  'LBL_SELECT_MODULE' => 'Molim, izaberite povezani modul.',
  'LBL_SELECT_FILTER' => 'Morate odabrati polje sa kojim ćete filtrirati povezani modul.',
  'LBL_LIST_UP' => 'gore',
  'LBL_LIST_DN' => 'dole',
  'LBL_SET' => 'Podesi',
  'LBL_AS' => 'kao',
  'LBL_SHOW' => 'Prikaži',
  'LBL_HIDE' => 'Sakrij',
  'LBL_SPECIFIC_FIELD' => 'specifično polje',
  'LBL_ANY_FIELD' => 'bilo koje polje',
  'LBL_LINK_RECORD' => 'Link za zapis',
  'LBL_INVITE_LINK' => 'Link za Sastanak/Poziv pozivanje',
  'LBL_PLEASE_SELECT' => 'Molim, izaberite',
  'LBL_BODY' => 'Tekst:',
  'LBL__S' => '&#39;s',
  'LBL_ALERT_SUBJECT' => 'UPOZORENJE RADNOG TOKA',
  'LBL_ACTION_ERROR' => 'Ova akcija ne može da se izvrši. Izmenite akciju tako da sva polja i vrednosti polja budu validna.',
  'LBL_ACTION_ERRORS' => 'Beleška: Jedna ili više akcija ispod sadrže greške.',
  'LBL_ALERT_ERROR' => 'Ovo upozorenje ne može da se izvrši.  Izmenite upozorenje tako da sva podešavanja budu validna.',
  'LBL_ALERT_ERRORS' => 'Beleška: Jedno ili više upozorenja ispod sadrži greške.',
  'LBL_TRIGGER_ERROR' => 'Beleška: Ovaj okidač sadrži vrednosti koje nisu validne i neće se okinuti.',
  'LBL_TRIGGER_ERRORS' => 'Beleška: Jedan ili više okidača ispod sadrži greške.',
);

