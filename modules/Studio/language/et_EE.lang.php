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
  'LBL_SW_MIGRATE_CUSTOMFIELDS' => 'Migrate Custom Fields',
  'LBL_MB_WELCOME' => 'History<br /><br />History allows you to view previously deployed editions of the file you are currently working on. You can compare and restore previous versions. If you do restore a file it will become your working file. You must deploy it before it is visible by everyone else.<br />What would you like to do today?<br />Please select from the options below.',
  'LBL_ED_WELCOME' => 'Drop Down Editor<br /><br />You can either edit an existing drop down or create a new drop down.',
  'LBL_EC_WELCOME' => 'Custom Field Editor<br /><br />You can either view and edit an existing custom field, create a new custom field or clean the custom field cache.',
  'LBL_BTN_TABINDEX' => 'Edit Tabbing Order',
  'LBL_GROUP_TAB_WELCOME' => 'The groups below will be displayed in the navigation bar for users who choose to view Grouped Modules. Drag and drop modules to and from the Groups to configure which modules appear under the groups. Note: Empty groups will not be displayed in the navigation bar.',
  'LBL_RENAME_TAB_WELCOME' => 'Click on any tab\'s Display Value in the table below to rename the tab.',
  'LBL_DISPLAY_OTHER_TAB_HELP' => 'Select to display the "Other" tab in the navigation bar. By default, the "Other" tab displays any modules not already included in other groups.',
  'LBL_TAB_GROUP_LANGUAGE_HELP' => 'Select an available language, edit the Group labels and click Save & Deploy to apply the labels in the selected language.',
  'LBL_LISTVIEW_DESCRIPTION' => 'There are three columns displayed below. The default column contains the fields that are displayed in a list view by default, the additional column contains fields that a user may choose to use for creating a custom view, and the available columns are columns availabe for you as an admin to either add to the default or additional columns for use by users but are currently not used.',
  'LBL_SP_WELCOME' => 'Welcome to Studio for Sugar Portal. You can either choose to edit modules here or sync to a portal instance.<br />Please choose from the list below.',
  'LBL_SYNCP_WELCOME' => 'Please enter the url to the portal instance you wish to update then press the Go button.<br />This will bring up a prompt for your user name and password.<br />Please enter your Sugar user name and password and press the Begin Sync button.',
  'LBL_LISTVIEWP_DESCRIPTION' => 'There are two columns below: Default which are the fields that will be displayed and Available which are the fields that are not displayed, but are available for displaying. Just drag the fields between the two columns. You can also reorder the items in a column by dragging and dropping them.',
  'LBL_SP_UPLOADSTYLE' => 'Click on the browse button and select a style sheet from your computer to upload.<br />The next time you sync down to portal it will bring down the style sheet along with it.',
  'LBL_AUDITED' => 'Audit',
  'LBL_SW_SUGARPORTAL' => 'Sugar Portal',
  'LBL_EDIT_LAYOUT' => 'Redigeeri paigutust',
  'LBL_EDIT_ROWS' => 'Redigeeri ridu',
  'LBL_EDIT_COLUMNS' => 'Redigeeri veerge',
  'LBL_EDIT_LABELS' => 'Redigeeri silte',
  'LBL_EDIT_FIELDS' => 'Redigeeri kohaldatud välju',
  'LBL_ADD_FIELDS' => 'Lisa kohandatud väljad',
  'LBL_DISPLAY_HTML' => 'Kuva HTML kood',
  'LBL_SELECT_FILE' => 'Vali fail',
  'LBL_SAVE_LAYOUT' => 'Salvesta paigutus',
  'LBL_SELECT_A_SUBPANEL' => 'Vali alampaneel',
  'LBL_SELECT_SUBPANEL' => 'Vali alampaneel',
  'LBL_MODULE_TITLE' => 'Stuudio',
  'LBL_TOOLBOX' => 'Tööriistakast',
  'LBL_STAGING_AREA' => 'Peatuskoht (lohista ja aseta ühikud siia)',
  'LBL_SUGAR_FIELDS_STAGE' => 'Sugari väljad (klikka ühikutel nende lisamiseks valitud väljale)',
  'LBL_SUGAR_BIN_STAGE' => 'Sugari kast (klikka ühikutel nende lisamiseks valitud väljale)',
  'LBL_VIEW_SUGAR_FIELDS' => 'Vaata Sugari välju',
  'LBL_VIEW_SUGAR_BIN' => 'Vaata Sugari kasti',
  'LBL_FAILED_TO_SAVE' => 'Salvestamine ebaõnnestus',
  'LBL_CONFIRM_UNSAVE' => 'Muudatusi ei salvestata. Kas oled kindel, et soovid jätkata?',
  'LBL_PUBLISHING' => 'Avaldamine...',
  'LBL_PUBLISHED' => 'Avaldatud',
  'LBL_FAILED_PUBLISHED' => 'Avaldamine ebaõnnestus',
  'LBL_DROP_HERE' => '[Aseta siia]',
  'LBL_NAME' => 'Nimi',
  'LBL_LABEL' => 'Silt',
  'LBL_MASS_UPDATE' => 'Üldine ajakohastamine',
  'LBL_CUSTOM_MODULE' => 'Moodul',
  'LBL_DEFAULT_VALUE' => 'Vaikeväärtus',
  'LBL_REQUIRED' => 'Kohustuslik',
  'LBL_DATA_TYPE' => 'Tüüp:',
  'LBL_HISTORY' => 'Ajalugu',
  'LBL_SW_WELCOME' => 'Teretulemast Studiosse!<br /><br />Mida sa tahaksid täna teha?<br />Palun tee valik allolevast.',
  'LBL_SW_EDIT_MODULE' => 'Redigeeri moodulit',
  'LBL_SW_EDIT_DROPDOWNS' => 'Redigeeri rippmenüüsid',
  'LBL_SW_EDIT_TABS' => 'Konfigureeri sakid',
  'LBL_SW_RENAME_TABS' => 'Ümbernimeta sakid',
  'LBL_SW_EDIT_GROUPTABS' => 'Konfigureeri grupi sakid',
  'LBL_SW_EDIT_PORTAL' => 'Muuda portaali',
  'LBL_SW_EDIT_WORKFLOW' => 'Muuda töövoog',
  'LBL_SW_REPAIR_CUSTOMFIELDS' => 'Paranda kohandatud väljad',
  'LBL_SMW_WELCOME' => 'Teretulemast Studiosse!<br /><br />Palun vali moodul allpoolt.',
  'LBL_SMA_WELCOME' => 'Redigeeri moodul<br /><br />Mida sa tahaksid selle mooduliga teha?<br />Palun vali tegevus, mida sa sooviksid teha.',
  'LBL_SMA_EDIT_CUSTOMFIELDS' => 'Muuda kohandatud väljad',
  'LBL_SMA_EDIT_LAYOUT' => 'Muuda paigutust',
  'LBL_SMA_EDIT_LABELS' => 'Muuda silte',
  'LBL_MB_PREVIEW' => 'Eelvaade',
  'LBL_MB_RESTORE' => 'Taasta',
  'LBL_MB_DELETE' => 'Kustuta',
  'LBL_MB_COMPARE' => 'Võrdle',
  'LBL_ED_CREATE_DROPDOWN' => 'Loo rippmenuu',
  'LBL_DROPDOWN_NAME' => 'Rippmenüü nimi:',
  'LBL_DROPDOWN_LANGUAGE' => 'Rippmenüü keel:',
  'LBL_TABGROUP_LANGUAGE' => 'Keel:',
  'LBL_EC_VIEW_CUSTOMFIELDS' => 'Vaata kohandatud välju',
  'LBL_EC_CREATE_CUSTOMFIELD' => 'Loo kohandatud väli',
  'LBL_EC_CLEAR_CACHE' => 'Tühjenda Cache',
  'LBL_SM_WELCOME' => 'Ajalugu<br /><br />Palun vali fail, mida soovid vaadata.',
  'LBL_DD_DISPALYVALUE' => 'Kuva väärtus',
  'LBL_DD_DATABASEVALUE' => 'Andmebaasi väärtus',
  'LBL_DD_ALL' => 'Kõik',
  'LBL_BTN_SAVE' => 'Salvesta',
  'LBL_BTN_SAVEPUBLISH' => 'Salvesta ja paigalda',
  'LBL_BTN_HISTORY' => 'Ajalugu',
  'LBL_BTN_NEXT' => 'Edasi',
  'LBL_BTN_BACK' => 'Tagasi',
  'LBL_BTN_ADDCOLS' => 'Lisa veerge',
  'LBL_BTN_ADDROWS' => 'Lisa ridu',
  'LBL_BTN_UNDO' => 'Tagasi',
  'LBL_BTN_REDO' => 'Tee ümber',
  'LBL_BTN_ADDCUSTOMFIELD' => 'Lisa kohandatud väli',
  'LBL_TAB_SUBTABS' => 'Alamsakid',
  'LBL_MODULES' => 'Moodulid',
  'LBL_MODULE_NAME' => 'Administratsioon',
  'LBL_CONFIGURE_GROUP_TABS' => 'Konfigureeri grupeeritud moodulid',
  'LBL_DELETE_MODULE' => 'Eemalda moodul<br />Grupist',
  'LBL_ADD_GROUP' => 'Lisa grupp',
  'LBL_NEW_GROUP' => 'Uus grupp',
  'LBL_RENAME_TABS' => 'Nimeta sakid ümber',
  'LBL_DISPLAY_OTHER_TAB' => 'Kuva \'Muu\' sakk',
  'LBL_DEFAULT' => 'Vaikimisi',
  'LBL_ADDITIONAL' => 'Lisa',
  'LBL_AVAILABLE' => 'Saadaval',
  'LBL_LISTVIEW_EDIT' => 'Vaateloendi redigeerija',
  'ERROR_ALREADY_EXISTS' => 'Viga: Väli on juba olemas',
  'ERROR_INVALID_KEY_VALUE' => 'Viga: Kehtetu võtmeväärtus: [\']',
  'LBL_SMP_WELCOME' => 'Palun vali allolevast loendist moodul, mida soovid redigeerida',
  'LBL_SP_SYNC' => 'Portaali sünk',
  'LBL_SP_STYLESHEET' => 'Lae Stiilileht',
  'LBL_SP_UPLOADED' => 'Üleslaetud',
  'ERROR_SP_UPLOADED' => 'Veendu, et sa laed üles css stiililehe.',
  'LBL_SP_PREVIEW' => 'Siin on eelvaade, milline näeb välja sinu stiilileht',
);

