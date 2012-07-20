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
  'LBL_TABGROUP_LANGUAGE' => 'Språk:',
  'LBL_DISPLAY_OTHER_TAB_HELP' => 'Välj att visa "Annat" fliken i navigationsfältet. Per default visar "Annat" fliken alla moduler som inte redan är inkluderade i andra grupper.',
  'LBL_TAB_GROUP_LANGUAGE_HELP' => 'Välj ett tillgängligt språk, ändra grupp labels och klicka på "Spara & distribuera" för att lägga till labels i valt språk.',
  'LBL_DISPLAY_OTHER_TAB' => 'Visa "Annat" fliken',
  'LBL_MODULE_TITLE' => 'Studio',
  'LBL_MODULE_NAME' => 'Administration',
  'LBL_EDIT_LAYOUT' => 'Redigera layout',
  'LBL_EDIT_ROWS' => 'Redigera rader',
  'LBL_EDIT_COLUMNS' => 'Redigera kolumner',
  'LBL_EDIT_LABELS' => 'Redigera etiketter',
  'LBL_EDIT_FIELDS' => 'Redigera specialfält',
  'LBL_ADD_FIELDS' => 'Lägg till specialfält',
  'LBL_DISPLAY_HTML' => 'Visa HTML kod',
  'LBL_SELECT_FILE' => 'Välj fil',
  'LBL_SAVE_LAYOUT' => 'Spara layout',
  'LBL_SELECT_A_SUBPANEL' => 'Välj en subpanel',
  'LBL_SELECT_SUBPANEL' => 'Välj subpanel',
  'LBL_TOOLBOX' => 'Verktygslåda',
  'LBL_STAGING_AREA' => 'Uppsättningsyta (drag och släpp här)',
  'LBL_SUGAR_FIELDS_STAGE' => 'Sugar fält (klicka på fälten för att lägga till i uppsättningsytan)',
  'LBL_SUGAR_BIN_STAGE' => 'Sugar papperskorg (klicka på fält för att lägga till i uppsättningsytan)',
  'LBL_VIEW_SUGAR_FIELDS' => 'Visa Sugar fält',
  'LBL_VIEW_SUGAR_BIN' => 'Visa Sugar papperskorg',
  'LBL_FAILED_TO_SAVE' => 'Misslyckades att spara',
  'LBL_CONFIRM_UNSAVE' => 'Alla ändringar kommer förloras. Är du säker på att du vill fortsätta?',
  'LBL_PUBLISHING' => 'Publicerar ...',
  'LBL_PUBLISHED' => 'Publicerat',
  'LBL_FAILED_PUBLISHED' => 'Misslyckades att publicera',
  'LBL_DROP_HERE' => '[Släpp här]',
  'LBL_NAME' => 'Namn',
  'LBL_LABEL' => 'Etikett',
  'LBL_MASS_UPDATE' => 'Massuppdatera',
  'LBL_AUDITED' => 'Logga',
  'LBL_CUSTOM_MODULE' => 'Modul',
  'LBL_DEFAULT_VALUE' => 'Standardvärde',
  'LBL_REQUIRED' => 'Obligatoriskt',
  'LBL_DATA_TYPE' => 'Typ',
  'LBL_HISTORY' => 'Historik',
  'LBL_SW_WELCOME' => '<h2>Välkommen till Studio!</h2><br> Vad önskar du göra idag?<br><b> Var god välj från alternativen nedan.</b>',
  'LBL_SW_EDIT_MODULE' => 'Redigera en modul',
  'LBL_SW_EDIT_DROPDOWNS' => 'Redigera dropdowns',
  'LBL_SW_EDIT_TABS' => 'Konfigurera flikar',
  'LBL_SW_RENAME_TABS' => 'Döp om flikar',
  'LBL_SW_EDIT_GROUPTABS' => 'Konfigurera gruppflikar',
  'LBL_SW_EDIT_PORTAL' => 'Redigera portal',
  'LBL_SW_EDIT_WORKFLOW' => 'Redigera workflow',
  'LBL_SW_REPAIR_CUSTOMFIELDS' => 'Reparera specialfälten',
  'LBL_SW_MIGRATE_CUSTOMFIELDS' => 'Migrera specialfälten',
  'LBL_SMW_WELCOME' => '<h2>Välkommen till Studio!</h2><br><b>Var god välj en modul nedan.',
  'LBL_SMA_WELCOME' => '<h2>Redigera en modul</h2>Vad önskar du göra med modulen?<br><b>Var god välj vad du vill göra.',
  'LBL_SMA_EDIT_CUSTOMFIELDS' => 'Redigera specialfält.',
  'LBL_SMA_EDIT_LAYOUT' => 'Redigera layout',
  'LBL_SMA_EDIT_LABELS' => 'Redigera etiketter',
  'LBL_MB_PREVIEW' => 'Förhandsgranska',
  'LBL_MB_RESTORE' => 'Återställ',
  'LBL_MB_DELETE' => 'Radera',
  'LBL_MB_COMPARE' => 'Jämför',
  'LBL_MB_WELCOME' => '<h2>Historik</h2><br> Historiken gör det möjligt att se tidigare utvecklade versioner av filen du arbetar med. Du kan jämföra och återställa tidigare versioner. Om du återställen en fil kommer den bli filen du ska arbeta med. Du måste publicera den innan den är synlig för alla andra.<br> Vad önskar du göra idag?<br><b> Var god välj från alternativen nedan.</b>',
  'LBL_ED_CREATE_DROPDOWN' => 'Skapa en dropdown',
  'LBL_ED_WELCOME' => '<h2>Dropdown editor</h2><br><b>Du kan antingen redigera en existerande dropdown eller skapa en ny dropdown.',
  'LBL_DROPDOWN_NAME' => 'Dropdown namn:',
  'LBL_DROPDOWN_LANGUAGE' => 'Dropdown språk:',
  'LBL_EC_WELCOME' => '<h2>Specialfälts editor</h2><br><b>Du kan antingen visa och editera existerande specialfält, skapa ett nytt specialfält eller rensa cspecialfälts cachen.',
  'LBL_EC_VIEW_CUSTOMFIELDS' => 'Visa specialfälten',
  'LBL_EC_CREATE_CUSTOMFIELD' => 'Skapa specialfält',
  'LBL_EC_CLEAR_CACHE' => 'Rensa cache',
  'LBL_SM_WELCOME' => '<h2>Historik</h2><br><b>Var god välj en fil att visa.</b>',
  'LBL_DD_DISPALYVALUE' => 'Visa värde',
  'LBL_DD_DATABASEVALUE' => 'Databas värde',
  'LBL_DD_ALL' => 'Alla',
  'LBL_BTN_SAVE' => 'Spara',
  'LBL_BTN_SAVEPUBLISH' => 'Spara & publicera',
  'LBL_BTN_HISTORY' => 'Historik',
  'LBL_BTN_NEXT' => 'Nästa',
  'LBL_BTN_BACK' => 'Tillbaka',
  'LBL_BTN_ADDCOLS' => 'Lägg till kolumner',
  'LBL_BTN_ADDROWS' => 'Lägg till rader',
  'LBL_BTN_UNDO' => 'Ångra',
  'LBL_BTN_REDO' => 'Gör om',
  'LBL_BTN_ADDCUSTOMFIELD' => 'Lägg till specialfält',
  'LBL_BTN_TABINDEX' => 'Redigera tabbordning',
  'LBL_TAB_SUBTABS' => 'Subflikar',
  'LBL_MODULES' => 'Moduler',
  'LBL_CONFIGURE_GROUP_TABS' => 'Konfigurera gruppflikar',
  'LBL_GROUP_TAB_WELCOME' => 'Grupptab layouten kommer att användas när en användare väljer att använda grupperade flikarna i stället för den brukliga Modul flikarna under Mitt konto>Layout alternativ.',
  'LBL_RENAME_TAB_WELCOME' => 'Klicka på Visa värde på någon av flikarna i tabellen nedan, för att ändra namnet på fliken.',
  'LBL_DELETE_MODULE' => 'Radera modul',
  'LBL_ADD_GROUP' => 'Lägg till grupp',
  'LBL_NEW_GROUP' => 'Ny grupp',
  'LBL_RENAME_TABS' => 'Döp om flikar',
  'LBL_DEFAULT' => 'Standard',
  'LBL_ADDITIONAL' => 'Tillägg',
  'LBL_AVAILABLE' => 'Tillgänglig',
  'LBL_LISTVIEW_DESCRIPTION' => 'Tre kolumner visas nedan. <b>Standardkolumnen</b> innehåller fälten som visas som standard i listvyn. <b>Tilläggskolumnen</b> innehåller fält som användaren kan välja från när de skapar egna vyer.  <b>Tillgängliga</b> visar de fält som finns tillgängliga för administratören  som kan flytta fält härifrån till Standard och Tilläggskolumnen så att användarna kan använda de fälten.',
  'LBL_LISTVIEW_EDIT' => 'Listvy editor',
  'ERROR_ALREADY_EXISTS' => 'Fel: Fältet finns redan',
  'ERROR_INVALID_KEY_VALUE' => 'Fel: Ogiltigt nyckelvärde: [\']',
  'LBL_SW_SUGARPORTAL' => 'Sugar portal',
  'LBL_SMP_WELCOME' => 'Var god välj en modul att redigera från listan nedan',
  'LBL_SP_WELCOME' => 'Välkommen till Studio för Sugar portal. Du kan antingen välja att redigera moduler här eller synka till en portal instans. <br> Var god välj från listan nedan.',
  'LBL_SP_SYNC' => 'Portal synk',
  'LBL_SYNCP_WELCOME' => 'Vänligen fyll i den url till portalinstansen som du önskar uppdatera och klicka sedan på Gå knappen.<br> Du kommer få fylla i ditt användarnamn och lösenord.<br> Vänligen fyll i ditt användarnamn och lösenord och välj knappen börja synka.',
  'LBL_LISTVIEWP_DESCRIPTION' => 'Det finns två kolumner nedan: Standard är de fält som kommer visas och Tillgänliga är de fält som inte visas, men som är möjliga att välja att visa. Drag fälten mellan de två kolumnerna. Du kan även ändra ordningen på fälten i kolumnen genom att dra och släppa dem.',
  'LBL_SP_STYLESHEET' => 'Ladda upp ett style sheet',
  'LBL_SP_UPLOADSTYLE' => 'Klicka på bläddaknappen och välj ett style sheet från din dator att ladda upp.<br> Nästa gång du synkar ner till portalen kommer den ta med ditt style sheet.',
  'LBL_SP_UPLOADED' => 'Uppladdad',
  'ERROR_SP_UPLOADED' => 'Var god kontrollera att du laddar upp ett css style sheet.',
  'LBL_SP_PREVIEW' => 'Här är en förhandsgranskning av hur ditt style sheet kommer se ut',
);

