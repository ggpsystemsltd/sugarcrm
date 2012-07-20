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
  'LBL_MINSS_ABBREV' => 'm',
  'LBL_COLON' => ':',
  'LBL_OUTLOOK_ID' => 'Outlook ID',
  'LBL_BLANK' => '_TÜHI',
  'LBL_MODULE_NAME' => 'Telefonikõned',
  'LBL_MODULE_TITLE' => 'Telefonikõned: Avaleht',
  'LBL_SEARCH_FORM_TITLE' => 'Telefonikõne otsing',
  'LBL_LIST_FORM_TITLE' => 'Telefonikõne loend',
  'LBL_NEW_FORM_TITLE' => 'Loo kohtumine',
  'LBL_LIST_CLOSE' => 'Sulge',
  'LBL_LIST_SUBJECT' => 'Teema',
  'LBL_LIST_CONTACT' => 'Kontakt',
  'LBL_LIST_RELATED_TO' => 'Seotud',
  'LBL_LIST_RELATED_TO_ID' => 'Seotud ID',
  'LBL_LIST_DATE' => 'Alguskuupäev',
  'LBL_LIST_TIME' => 'Algusaeg',
  'LBL_LIST_DURATION' => 'Kestvus',
  'LBL_LIST_DIRECTION' => 'Suund',
  'LBL_SUBJECT' => 'Teema:',
  'LBL_REMINDER' => 'Meelespea:',
  'LBL_CONTACT_NAME' => 'Kontakt:',
  'LBL_DESCRIPTION_INFORMATION' => 'Kirjelduse info',
  'LBL_DESCRIPTION' => 'Kirjeldus:',
  'LBL_STATUS' => 'Olek:',
  'LBL_DIRECTION' => 'Suund:',
  'LBL_DATE' => 'Alguskuupäev:',
  'LBL_DURATION' => 'Kestvus:',
  'LBL_DURATION_HOURS' => 'Kestvus tundides:',
  'LBL_DURATION_MINUTES' => 'Kestvus minutites:',
  'LBL_HOURS_MINUTES' => '(tunnid/minutid)',
  'LBL_CALL' => 'Telefonikõne:',
  'LBL_DATE_TIME' => 'Alguskuupäev ja aeg:',
  'LBL_TIME' => 'Algusaeg:',
  'LBL_HOURS_ABBREV' => 't',
  'LBL_DEFAULT_STATUS' => 'Kavandatud',
  'LNK_NEW_CALL' => 'Kõne logi',
  'LNK_NEW_MEETING' => 'Planeeri kohtumine',
  'LNK_CALL_LIST' => 'Vaata telefonikõnesid',
  'LNK_IMPORT_CALLS' => 'Impordi telefonikõned',
  'ERR_DELETE_RECORD' => 'Ettevõtte kustutamiseks täpsusta kirje numbrit.',
  'NTC_REMOVE_INVITEE' => 'Oled kindel, et soovid selle kutsutu telefonikõnest eemaldada?',
  'LBL_INVITEE' => 'Kutsutud',
  'LBL_RELATED_TO' => 'Seotud:',
  'LNK_NEW_APPOINTMENT' => 'Loo kohtumine',
  'LBL_SCHEDULING_FORM_TITLE' => 'Planeerimine',
  'LBL_ADD_INVITEE' => 'Lisa kutsutuid',
  'LBL_NAME' => 'Nimi',
  'LBL_FIRST_NAME' => 'Eesnimi',
  'LBL_LAST_NAME' => 'Perekonnanimi',
  'LBL_EMAIL' => 'E-post',
  'LBL_PHONE' => 'Tlf number',
  'LBL_SEND_BUTTON_TITLE' => 'Saada kutsed [Alt+I]',
  'LBL_SEND_BUTTON_KEY' => 'l',
  'LBL_SEND_BUTTON_LABEL' => 'Saada kutsed',
  'LBL_DATE_END' => 'Lõpukuupäev',
  'LBL_TIME_END' => 'Lõppaeg',
  'LBL_REMINDER_TIME' => 'Meeldetuletuse aeg',
  'LBL_SEARCH_BUTTON' => 'Otsi',
  'LBL_ACTIVITIES_REPORTS' => 'Tegevuste raport',
  'LBL_ADD_BUTTON' => 'Lisa',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Telefonikõned',
  'LBL_LOG_CALL' => 'Telefonikõnede logi',
  'LNK_SELECT_ACCOUNT' => 'Vali ettevõte',
  'LNK_NEW_ACCOUNT' => 'Uus ettevõte',
  'LNK_NEW_OPPORTUNITY' => 'Uus võimalus',
  'LBL_DEL' => 'Kustuta',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Müügivihjed',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontaktid',
  'LBL_USERS_SUBPANEL_TITLE' => 'Kasutajad',
  'LBL_MEMBER_OF' => 'Liige',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Märkused',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Vastutaja',
  'LBL_LIST_MY_CALLS' => 'Minu kõned',
  'LBL_SELECT_FROM_DROPDOWN' => 'Palun tee esmalt valik rippmenüü loendist Seotud.',
  'LBL_ASSIGNED_TO_NAME' => 'Vastutaja',
  'LBL_ASSIGNED_TO_ID' => 'Määratud kasutaja',
  'NOTICE_DURATION_TIME' => 'Kestusaeg peab olema suurem kui 0',
  'LBL_CALL_INFORMATION' => 'Telefonikõne ülevaade',
  'LBL_REMOVE' => 'eemalda',
);

