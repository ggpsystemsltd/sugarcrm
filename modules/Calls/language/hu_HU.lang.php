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
  'LBL_HOURS_ABBREV' => 'h',
  'LBL_MINSS_ABBREV' => 'm',
  'LBL_COLON' => ':',
  'LBL_SEND_BUTTON_KEY' => 'I',
  'LBL_BLANK' => '-Üres-',
  'LBL_MODULE_NAME' => 'Hívások',
  'LBL_MODULE_TITLE' => 'Hívások: Főoldal',
  'LBL_SEARCH_FORM_TITLE' => 'Hívás keresése',
  'LBL_LIST_FORM_TITLE' => 'Hívás lista',
  'LBL_NEW_FORM_TITLE' => 'Találkozó létrehozása',
  'LBL_LIST_CLOSE' => 'Bezár',
  'LBL_LIST_SUBJECT' => 'Tárgy',
  'LBL_LIST_CONTACT' => 'Kapcsolat',
  'LBL_LIST_RELATED_TO' => 'Kapcsolódó kliens',
  'LBL_LIST_RELATED_TO_ID' => 'Kapcsolódó azonosító',
  'LBL_LIST_DATE' => 'Kezdés dátuma',
  'LBL_LIST_TIME' => 'Kezdési idő',
  'LBL_LIST_DURATION' => 'Időtartam',
  'LBL_LIST_DIRECTION' => 'Irány',
  'LBL_SUBJECT' => 'Tárgy:',
  'LBL_REMINDER' => 'Emlékeztető:',
  'LBL_CONTACT_NAME' => 'Kapcsolat:',
  'LBL_DESCRIPTION_INFORMATION' => 'Az információ leírása',
  'LBL_DESCRIPTION' => 'Leírás:',
  'LBL_STATUS' => 'Állapot',
  'LBL_DIRECTION' => 'Irány:',
  'LBL_DATE' => 'Kezdés dátuma:',
  'LBL_DURATION' => 'Időtartam:',
  'LBL_DURATION_HOURS' => 'Időtartam (óra):',
  'LBL_DURATION_MINUTES' => 'Időtartam (perc):',
  'LBL_HOURS_MINUTES' => '(Óra / perc)',
  'LBL_CALL' => 'Hívás:',
  'LBL_DATE_TIME' => 'Kezdő dátum és idő:',
  'LBL_TIME' => 'Kezdés időpont:',
  'LNK_NEW_CALL' => 'Hívás naplózása',
  'LNK_NEW_MEETING' => 'Találkozó ütemezése',
  'LNK_CALL_LIST' => 'Hívások megtekintése',
  'LNK_IMPORT_CALLS' => 'Hívások importja',
  'ERR_DELETE_RECORD' => 'Adjon meg egy tételszámot a kliens törléséhez!',
  'NTC_REMOVE_INVITEE' => 'Biztosan el akarja távolítani ezt a meghívottat a hívásból?',
  'LBL_INVITEE' => 'Meghívottak',
  'LBL_RELATED_TO' => 'Kapcsolódó kliens:',
  'LNK_NEW_APPOINTMENT' => 'Találkozó létrehozása',
  'LBL_SCHEDULING_FORM_TITLE' => 'Ütemezés',
  'LBL_ADD_INVITEE' => 'Meghívók hozzáadása',
  'LBL_NAME' => 'Név',
  'LBL_FIRST_NAME' => 'Keresztnév',
  'LBL_LAST_NAME' => 'Vezetéknév',
  'LBL_EMAIL' => 'E-mail',
  'LBL_PHONE' => 'Telefon',
  'LBL_SEND_BUTTON_TITLE' => 'Meghívó küldése [Alt + I]',
  'LBL_SEND_BUTTON_LABEL' => 'Meghívó küldése',
  'LBL_DATE_END' => 'Befejezés dátuma',
  'LBL_TIME_END' => 'Befejezés időpontja',
  'LBL_REMINDER_TIME' => 'Emlékeztető időpontja',
  'LBL_SEARCH_BUTTON' => 'Keres',
  'LBL_ACTIVITIES_REPORTS' => 'Tevékenységek jelentése',
  'LBL_ADD_BUTTON' => 'Hozzáadás',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Hívások',
  'LBL_LOG_CALL' => 'Hívás naplózása',
  'LNK_SELECT_ACCOUNT' => 'Válasszon klienst',
  'LNK_NEW_ACCOUNT' => 'Új kliens létrehozása',
  'LNK_NEW_OPPORTUNITY' => 'Új lehetőség',
  'LBL_DEL' => 'Törlés',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Ajánlások',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kapcsolatok',
  'LBL_USERS_SUBPANEL_TITLE' => 'Felhasználók',
  'LBL_OUTLOOK_ID' => 'Outlook azonosító',
  'LBL_MEMBER_OF' => 'Tagja a(z)',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Feljegyzés',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Felelős',
  'LBL_LIST_MY_CALLS' => 'Hívásaim',
  'LBL_SELECT_FROM_DROPDOWN' => 'Kérjük, válasszon először a kapcsolódó legördülő listából!',
  'LBL_ASSIGNED_TO_NAME' => 'Felelős',
  'LBL_ASSIGNED_TO_ID' => 'Hozzárendelt felhasználó',
  'NOTICE_DURATION_TIME' => 'Az időtartamnak nagyobbnak kell lennie 0-nál',
  'LBL_CALL_INFORMATION' => 'Hívás áttekintő',
  'LBL_REMOVE' => 'Eltávolítás',
);

