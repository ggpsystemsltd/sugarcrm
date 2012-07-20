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
  'LBL_MODULE_TITLE' => 'Studio',
  'LBL_TOOLBOX' => 'Toolbox',
  'LBL_LABEL' => 'Label',
  'LBL_AUDITED' => 'Audit',
  'LBL_CUSTOM_MODULE' => 'Module',
  'LBL_DATA_TYPE' => 'Type',
  'LBL_TAB_SUBTABS' => 'Sub Tabs',
  'LBL_MODULES' => 'Modules',
  'LBL_DISPLAY_OTHER_TAB_HELP' => 'Select to display the "Other" tab in the navigation bar.  By default, the "Other" tab displays any modules not already included in other groups.',
  'LBL_ADD_GROUP' => 'Add Group',
  'LBL_NEW_GROUP' => 'New Group',
  'LBL_RENAME_TABS' => 'Rename Tabs',
  'LBL_DISPLAY_OTHER_TAB' => 'Display \'Other\' Tab',
  'LBL_DEFAULT' => 'Default',
  'LBL_ADDITIONAL' => 'Additional',
  'LBL_AVAILABLE' => 'Available',
  'LBL_LISTVIEW_DESCRIPTION' => 'There are three columns displayed below. The default column contains the fields that are displayed in a list view by default, the additional column contains fields that a user may choose to use for creating a custom view, and the available columns are columns availabe for you as an admin to either add to the default or additional columns for use by users but are currently not used.',
  'LBL_LISTVIEW_EDIT' => 'List View Editor',
  'ERROR_ALREADY_EXISTS' => 'Error: Field Already Exists',
  'ERROR_INVALID_KEY_VALUE' => 'Error: Invalid Key Value: [\']',
  'LBL_SW_SUGARPORTAL' => 'Sugar Portal',
  'LBL_SP_WELCOME' => 'Welcome to Studio for Sugar Portal. You can either choose to edit modules here or sync to a portal instance.<br> Please choose from the list below.',
  'LBL_SP_SYNC' => 'Portal Sync',
  'LBL_SYNCP_WELCOME' => 'Please enter the url to the portal instance you wish to update then press the Go button.<br> This will bring up a prompt for your user name and password.<br> Please enter your Sugar user name and password and press the Begin Sync button.',
  'LBL_LISTVIEWP_DESCRIPTION' => 'There are two columns below: Default which are the fields that will be displayed and Available which are the fields that are not displayed, but are available for displaying. Just drag the fields between the two columns. You can also reorder the items in a column by dragging and dropping them.',
  'LBL_SP_STYLESHEET' => 'Upload a Style Sheet',
  'LBL_SP_UPLOADSTYLE' => 'Click on the browse button and select a style sheet from your computer to upload.<br> The next time you sync down to portal it will bring down the style sheet along with it.',
  'LBL_SP_UPLOADED' => 'Uploaded',
  'ERROR_SP_UPLOADED' => 'Please ensure that you are uploading a css style sheet.',
  'LBL_SP_PREVIEW' => 'Here is a preview of what your style sheet will look like',
  'LBL_EDIT_LAYOUT' => 'Bewerk Layout',
  'LBL_EDIT_ROWS' => 'Bewerk Rijen',
  'LBL_EDIT_COLUMNS' => 'Bewerk Kolommen',
  'LBL_EDIT_LABELS' => 'Bewerk Labels',
  'LBL_EDIT_FIELDS' => 'Bewerk Aangepaste Velden',
  'LBL_ADD_FIELDS' => 'Toevoegen Aangepaste Velden',
  'LBL_DISPLAY_HTML' => 'Toon HTML Code',
  'LBL_SELECT_FILE' => 'Kies Bestand',
  'LBL_SAVE_LAYOUT' => 'Layout opslaan',
  'LBL_SELECT_A_SUBPANEL' => 'Kies een Subpaneel',
  'LBL_SELECT_SUBPANEL' => 'Kies Subpaneel',
  'LBL_STAGING_AREA' => 'Werkgebied (sleep items hier naar toe)',
  'LBL_SUGAR_FIELDS_STAGE' => 'Sugar Velden (klik op het item om het toe te voegen aan het werkgebied)',
  'LBL_SUGAR_BIN_STAGE' => 'Sugar Bin (klik op het item om het toe te voegen aan het werkgebied)',
  'LBL_VIEW_SUGAR_FIELDS' => 'Bekijk Sugar Velden',
  'LBL_VIEW_SUGAR_BIN' => 'Bekijk Sugar Bin',
  'LBL_FAILED_TO_SAVE' => 'Opslaan mislukt',
  'LBL_CONFIRM_UNSAVE' => 'Wijzigingen zullen niet worden opgeslagen. Weet u zeker dat u wil doorgaan?',
  'LBL_PUBLISHING' => 'Publiceren ...',
  'LBL_PUBLISHED' => 'Gepubliceerd',
  'LBL_FAILED_PUBLISHED' => 'Publiceren mislukt',
  'LBL_DROP_HERE' => '[Hier naar toe verplaatsen]',
  'LBL_NAME' => 'Naam',
  'LBL_MASS_UPDATE' => 'Massa Update',
  'LBL_DEFAULT_VALUE' => 'Default Waarde',
  'LBL_REQUIRED' => 'Verplicht',
  'LBL_HISTORY' => 'Historie',
  'LBL_SW_WELCOME' => '<h2>Welkom bij de Studio!</h2><br> Wat wilt u vandaag gaan doen?<br><b> Kies uit onderstaande opties.</b>',
  'LBL_SW_EDIT_MODULE' => 'Wijzig een Module',
  'LBL_SW_EDIT_DROPDOWNS' => 'Wijzig DropDowns',
  'LBL_SW_EDIT_TABS' => 'Configureren Tabs',
  'LBL_SW_RENAME_TABS' => 'Hernoemen Tabs',
  'LBL_SW_EDIT_GROUPTABS' => 'Configureren Groep Tabs',
  'LBL_SW_EDIT_PORTAL' => 'Wijzig Portaal',
  'LBL_SW_EDIT_WORKFLOW' => 'Wijzig Workflow',
  'LBL_SW_REPAIR_CUSTOMFIELDS' => 'Repareren Aangepaste Velden',
  'LBL_SW_MIGRATE_CUSTOMFIELDS' => 'Migreren Aangepaste velden',
  'LBL_SMW_WELCOME' => '<h2>Welkom bij de Studio!</h2><br><b>Kies een module.',
  'LBL_SMA_WELCOME' => '<h2>Wijzig een Module</h2>Wat wilt u gaan doen met die module?<br><b>Kies wat u wil gaan doen.',
  'LBL_SMA_EDIT_CUSTOMFIELDS' => 'Wijzig Aangepaste Velden',
  'LBL_SMA_EDIT_LAYOUT' => 'Wijzig Layout',
  'LBL_SMA_EDIT_LABELS' => 'Wijzig Labels',
  'LBL_MB_PREVIEW' => 'Voorbeeld',
  'LBL_MB_RESTORE' => 'Herstellen',
  'LBL_MB_DELETE' => 'Verwijderen',
  'LBL_MB_COMPARE' => 'Vergelijken',
  'LBL_MB_WELCOME' => '<h2>Historie</h2><br> De historie maakt het mogelijk om oudere versies in te zien van het bestand waaraan u nu werkt. U kunt versies vergelijken en een vorige herstellen. Als u een eerdere versie herstelt dan wordt dat de werkversie.Om het ook zichtbaar te maken voor anderen moet u het eerst implementeren.<br> Wat wilt u vandaag gaan doen?<br><b> Kies uit één van onderstaande opties.</b>',
  'LBL_ED_CREATE_DROPDOWN' => 'Nieuwe DropDown',
  'LBL_ED_WELCOME' => '<h2>Drop Down Editor</h2><br><b>U kunt een bestaande dropdown wijzigen of een nieuwe aanmaken.',
  'LBL_DROPDOWN_NAME' => 'Dropdown Naam:',
  'LBL_DROPDOWN_LANGUAGE' => 'Dropdown Taal:',
  'LBL_TABGROUP_LANGUAGE' => 'Tab Group Language:',
  'LBL_EC_WELCOME' => '<h2>Aangepaste Veld Editor</h2><br><b>U kunt bestaande aangepaste velden bekijken en wijzigen, of een nieuwe aanmaken of de cache van aangepaste velden opschonen.',
  'LBL_EC_VIEW_CUSTOMFIELDS' => 'Bekijk Aangepaste Velden',
  'LBL_EC_CREATE_CUSTOMFIELD' => 'Nieuw Aangepast Veld',
  'LBL_EC_CLEAR_CACHE' => 'Opschonen Cache',
  'LBL_SM_WELCOME' => '<h2>Historie</h2><br><b>Selecteer het bestand dat u wil inzien.</b>',
  'LBL_DD_DISPALYVALUE' => 'Bekijk Waarde',
  'LBL_DD_DATABASEVALUE' => 'Database Waarde',
  'LBL_DD_ALL' => 'Alle',
  'LBL_BTN_SAVE' => 'Opslaan',
  'LBL_BTN_SAVEPUBLISH' => 'Opslaan & Implementeren (Deploy)',
  'LBL_BTN_HISTORY' => 'Historie',
  'LBL_BTN_NEXT' => 'Volgende',
  'LBL_BTN_BACK' => 'Terug',
  'LBL_BTN_ADDCOLS' => 'Toevoegen Kolommen',
  'LBL_BTN_ADDROWS' => 'Toevoegen Rijen',
  'LBL_BTN_UNDO' => 'Ongedaan maken',
  'LBL_BTN_REDO' => 'Opnieuw toepassen',
  'LBL_BTN_ADDCUSTOMFIELD' => 'Toevoegen Aangepast Veld',
  'LBL_BTN_TABINDEX' => 'Wijzig Tabvolgorde',
  'LBL_MODULE_NAME' => 'Beheer',
  'LBL_CONFIGURE_GROUP_TABS' => 'Configure Group Tabs',
  'LBL_GROUP_TAB_WELCOME' => 'The Group Tab layout below will be used whenever a user chooses to use Grouped Tabs instead of the usual Module Tabs in My Account>Layout Options.',
  'LBL_RENAME_TAB_WELCOME' => 'Klik op de weergegeven waarde van een willekeurige tab in onderstaande tabel om de tab te hernoemen.',
  'LBL_DELETE_MODULE' => ' Delete Module',
  'LBL_TAB_GROUP_LANGUAGE_HELP' => 'To set the tab group labels for other available languages, select a language, edit the labels and click Save & Deploy to make the changes for that language.',
  'LBL_SMP_WELCOME' => 'Please select a module you would like to edit from the list below',
);

