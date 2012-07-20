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
   'LBL_MODULE_NAME' => 'Úkoly',
   'LBL_TASK' => 'Úkoly: ',
   'LBL_MODULE_TITLE' => ' Úkoly',
   'LBL_SEARCH_FORM_TITLE' => ' Vyhledat úkol',
   'LBL_LIST_FORM_TITLE' => ' Seznam úkolů',
   'LBL_NEW_FORM_TITLE' => 'Přidat úkol',
   'LBL_NEW_FORM_SUBJECT' => 'Předmět:',
   'LBL_NEW_FORM_DUE_DATE' => 'Udělat do dne:',
   'LBL_NEW_FORM_DUE_TIME' => 'Udělat do (čas):',
   'LBL_NEW_TIME_FORMAT' => '(24:00)',
   'LBL_LIST_CLOSE' => 'Zavřít',
   'LBL_LIST_SUBJECT' => 'Předmět',
   'LBL_LIST_CONTACT' => 'Kontakt',
   'LBL_LIST_PRIORITY' => 'Priorita',
   'LBL_LIST_RELATED_TO' => 'Týka se',
   'LBL_LIST_DUE_DATE' => 'Do data',
   'LBL_LIST_DUE_TIME' => 'Termín (čas)',
   'LBL_SUBJECT' => 'Předmět:',
   'LBL_STATUS' => 'Stav:',
   'LBL_DUE_DATE' => 'Udělat do dne:',
   'LBL_DUE_TIME' => 'Udělat do (čas):',
   'LBL_PRIORITY' => 'Priorita:',
   'LBL_COLON' => ':',
   'LBL_DUE_DATE_AND_TIME' => 'Dokončit do datum a čas:',
   'LBL_START_DATE_AND_TIME' => 'Počáteční datum & čas:',
   'LBL_START_DATE' => 'Počáteční datum:',
   'LBL_LIST_START_DATE' => 'Počáteční datum',
   'LBL_START_TIME' => 'Počátenčí čas:',
   'LBL_LIST_START_TIME' => 'Počáteční čas',
   'DATE_FORMAT' => '(rrrr-mm-dd)',
   'LBL_NONE' => 'Žádný',
   'LBL_CONTACT' => 'Kontakt:',
   'LBL_EMAIL_ADDRESS' => 'Emailová adresa:',
   'LBL_PHONE' => 'Telefon',
   'LBL_EMAIL' => 'Email:',
   'LBL_DESCRIPTION_INFORMATION' => 'Popis',
   'LBL_DESCRIPTION' => 'Popis:',
   'LBL_NAME' => 'Název:',
   'LBL_CONTACT_NAME' => 'Kontaktní jméno: ',
   'LBL_LIST_COMPLETE' => 'Dokončeno:',
   'LBL_LIST_STATUS' => 'Stav',
   'LBL_DATE_DUE_FLAG' => 'Nepřesné datum',
   'LBL_DATE_START_FLAG' => 'Nezahájené datum',
   'ERR_DELETE_RECORD' => 'Pro smazání kontaktu musí být zadáno číslo záznamu.',
   'ERR_INVALID_HOUR' => 'Prosím zadejte hodinu mezi 0 a 24',
   'LBL_DEFAULT_STATUS' => 'Nezahájeno',
   'LBL_DEFAULT_PRIORITY' => 'Střední',
   'LBL_LIST_MY_TASKS' => 'Moje otevřené úkoly',
   'LNK_NEW_CALL' => 'Naplánovat hovor',
   'LNK_NEW_MEETING' => 'Naplánovat schůzku',
   'LNK_NEW_TASK' => 'Přidat úkol',
   'LNK_NEW_NOTE' => 'Přidat poznámku nebo přílohu',
   'LNK_NEW_EMAIL' => 'Archivovat zprávu',
   'LNK_CALL_LIST' => 'Hovory',
   'LNK_MEETING_LIST' => 'Schůzky',
   'LNK_TASK_LIST' => 'Úkoly',
   'LNK_NOTE_LIST' => 'Poznámky',
   'LNK_EMAIL_LIST' => 'Pošta',
   'LNK_VIEW_CALENDAR' => 'Dnes',
   'LBL_CONTACT_FIRST_NAME' => 'Křestní jméno',
   'LBL_CONTACT_LAST_NAME' => 'Příjmení',
   'LBL_LIST_ASSIGNED_TO_NAME' => 'Zodpovědný uživatel',
   'LBL_ASSIGNED_TO_NAME' => 'Přiřazeno (komu):',
   'LNK_IMPORT_TASKS' => 'Importuj úkoly',
   'LBL_LIST_DATE_MODIFIED' => 'Datum úprav',
   'LBL_CONTACT_ID' => 'ID kontaktu:',
   'LBL_PARENT_ID' => 'ID zdrojové:',
   'LBL_CONTACT_PHONE' => 'kontaktní telefon:',
   'LBL_PARENT_NAME' => 'Typ zdroje:',
   'LBL_ACTIVITIES_REPORTS' => 'Report aktivit',
   'LBL_TASK_INFORMATION' => 'Přehled úkolu',
);
?>