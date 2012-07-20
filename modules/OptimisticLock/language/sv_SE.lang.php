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


																					
$mod_strings= array (
'LBL_SETTINGS'                                     => 'Inställningar',
'LBL_SETTTINGS_SHOW_HIDE'                          => 'Visa / Dölj inställningar',
'LBL_PREFIX'                                       => 'Prefix:',
'LBL_PREFIX_COMMENT'                               => 'Prefix för språkfil, ex. en_us, se, no',
'LBL_FILE_SUFFIX'                                  => '.lang.php',
'LBL_NO_LANG_SELECTED'                             => 'Var god fyll i vilket språk ni vill översätta SugarCRM till ',
'LBL_MODULE'                                       => 'Modul:',
'LBL_LABEL'                                        => 'Etikett',
'LBL_LABEL_HEADER'                                 => 'Etikett:',
'LBL_DROPDOWN'                                     => 'Dropdown:',
'LBL_STD_VALUE'                                    => 'Standardvärde',
'LBL_TRANSLATED'                                   => 'Översatt värde',
'LBL_SEPARATOR'                                    => ':',
'LBL_NONE_FOUND'                                   => 'Inga förslag hittades',
'LBL_LOADING'                                      => 'Laddar...',
'LBL_BUTTON_SAVE'                                  => 'Spara',
'BG_HEADER'                                        => '#c7d4d2',
'BG_SUB_HEADER'                                    => '#dee7ed',
'ERR_DELETE_RECORD'				   => 'Ett objektnummer måste specificeras för att kunna radera organisationen.',
'LBL_ACCOUNT_ID'				   => 'Organisations ID',
'LBL_ACCOUNT_NAME'				   => 'Organisationsnamn:',
'LBL_ACTIVITIES_SUBPANEL_TITLE'			   => 'Aktiviteter',
'LBL_BUGS_SUBPANEL_TITLE'			   => 'Buggar',
'LBL_CASE_NUMBER'				   => 'Ärendenummer:',
'LBL_CASE_SUBJECT'				   => 'Ärendeämne:',
'LBL_CASE'					   => 'Ärende:',
'LBL_CONTACT_CASE_TITLE'			   => 'Kontakt-ärende:',
'LBL_CONTACT_NAME'				   => 'Kontaktnamn:',
'LBL_CONTACT_ROLE'				   => 'Roll:',
'LBL_CONTACTS_SUBPANEL_TITLE'			   => 'Kontakter',
'LBL_DEFAULT_SUBPANEL_TITLE'			   => 'Ärenden',
'LBL_DESCRIPTION'				   => 'Beskrivning:',
'LBL_HISTORY_SUBPANEL_TITLE' 			   => 'Historik',
'LBL_INVITEE'					   => 'Kontakter',
'LBL_MEMBER_OF'					   => 'Organisation',
'LBL_MODULE_NAME'				   => 'Ärenden',
'LBL_MODULE_TITLE'				   => 'Ärenden: Hem',
'LBL_NEW_FORM_TITLE'				   => 'Nytt ärende',
'LBL_NUMBER' 					   => 'Nummer:',
'LBL_PRIORITY'					   => 'Prioritet:',
'LBL_PROJECTS_SUBPANEL_TITLE' 			   => 'Projekt',
'LBL_RESOLUTION' 				   => 'Lösning:',
'LBL_SEARCH_FORM_TITLE' 			   => 'Sök ärende',
'LBL_STATUS' 					   => 'Status:',
'LBL_SUBJECT' 					   => 'Ämne',
'LBL_SYSTEM_ID' 				   => 'System ID',
'LBL_LIST_ASSIGNED_TO_NAME' 			   => 'Tilldelad användare',
'LBL_LIST_ACCOUNT_NAME' 			   => 'Organisationsnamn',
'LBL_LIST_ASSIGNED' 				   => 'Tilldelad till',
'LBL_LIST_CLOSE' 				   => 'Stäng',
'LBL_LIST_FORM_TITLE' 				   => 'Lista ärende',
'LBL_LIST_LAST_MODIFIED' 			   => 'Senast ändrad',
'LBL_LIST_MY_CASES' 				   => 'Mina öppna ärenden',
'LBL_LIST_NUMBER'				   => 'Nr.',
'LBL_LIST_PRIORITY'				   => 'Prioritet',
'LBL_LIST_STATUS'				   => 'Status',
'LBL_LIST_SUBJECT' 				   => 'Ämne',
'LNK_CASE_LIST' 				   => 'Ärenden',
'LNK_NEW_CASE' 					   => 'Skapa Ärende',
'NTC_REMOVE_FROM_BUG_CONFIRMATION'		   => 'är du säker på att du vill ta bort ärendet från buggen?',
'NTC_REMOVE_INVITEE'				   => 'Är du säker på att du vill ta bort kontakten från ärendet?',
'LBL_LIST_DATE_CREATED'				   => 'Skapande datum',
'LBL_ASSIGNED_TO_NAME' 				   => 'Tilldelad till',
'LBL_TYPE' 					   => 'Typ',
'LBL_WORK_LOG' 					   => 'Arbetslogg',
'LNK_CASE_REPORTS' 				   => 'Ärenderapporter',
'LBL_SHOW_IN_PORTAL' 				   => 'Visa i portal',
'LBL_CREATE_KB_DOCUMENT' 			   => 'Skapa artikel',
'LBL_YOURS'					   => 'Din',
'LBL_IN_DATABASE'				   => 'I databasen',
'LBL_CONFLICT_EXISTS'				   => 'En konflikt existerar för - ',
'LBL_ACCEPT_DATABASE'				   => 'Godkänn databas',
'LBL_ACCEPT_YOURS'				   => 'Godkänn Din',
'LBL_RECORDS_MATCH'				   => 'Poster överensstämmer',
'LBL_NO_LOCKED_OBJECTS'				   => 'Inga låsta objekt',
);?>
