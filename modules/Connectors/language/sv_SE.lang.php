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
  'LBL_ADD_MODULE' => 'Lägg till',
  'LBL_ADDRCITY' => 'Stad',
  'LBL_ADDRCOUNTRY' => 'Land',
  'LBL_ADDRCOUNTRY_ID' => 'Landsid',
  'LBL_ADDRSTATEPROV' => 'Region',
  'LBL_ADMINISTRATION' => '"Connctor" Administration',
  'LBL_ADMINISTRATION_MAIN' => '"Connector" inställningar',
  'LBL_AVAILABLE' => 'Tillgänglig',
  'LBL_BACK' => '< Tillbaka',
  'LBL_COMPANY_ID' => 'Företagsid',
  'LBL_CONFIRM_CONTINUE_SAVE' => 'Några obligatoriska fält har lämnats tomma, fullfölj och spara ändringar?',
  'LBL_CONNECTOR' => '"Connector"',
  'LBL_CONNECTOR_FIELDS' => '"Connector" fält',
  'LBL_DATA' => 'Data',
  'LBL_DEFAULT' => 'Default',
  'LBL_DELETE_MAPPING_ENTRY' => 'Är du säker på att du vill ta bort denna post?',
  'LBL_DISABLED' => 'Inaktiverad',
  'LBL_DUNS' => 'DUNS',
  'LBL_EMPTY_BEANS' => 'Inga matchande poster hittades baserat på din sökning.',
  'LBL_ENABLED' => 'Aktiverad',
  'LBL_FINSALES' => 'Årlig försäljning',
  'LBL_MARKET_CAP' => 'Marknadstak',
  'LBL_MERGE' => 'Sammanfoga',
  'LBL_MODIFY_DISPLAY_TITLE' => 'Aktivera "Connectors"',
  'LBL_MODIFY_DISPLAY_DESC' => 'Välj vilken modul som ska aktiveras för varje "connector".',
  'LBL_MODIFY_DISPLAY_PAGE_TITLE' => '"Connector" iställningar: Aktivera "connectors"',
  'LBL_MODULE_FIELDS' => 'Modulfält',
  'LBL_MODIFY_MAPPING_TITLE' => 'Koppla "connector" fält',
  'LBL_MODIFY_MAPPING_DESC' => 'Koppla "connector" fält till modulfält för att bestämma vilket "connector" data som kan visas och sammanfogas med modulens poster.',
  'LBL_MODIFY_MAPPING_PAGE_TITLE' => '"Connector" inställningar: Koppla "connector" fält',
  'LBL_MODIFY_PROPERTIES_TITLE' => 'Ange "connector" egenskaper',
  'LBL_MODIFY_PROPERTIES_DESC' => 'Konfigurera egenskaperna för varje "connector" inkluderat URL\'s och API nycklar.',
  'LBL_MODIFY_PROPERTIES_PAGE_TITLE' => '"Connector" inställningar: Ange "connector" egenskaper',
  'LBL_MODIFY_SEARCH_TITLE' => 'Administrera "connector" sökning',
  'LBL_MODIFY_SEARCH' => 'Sök',
  'LBL_MODIFY_SEARCH_DESC' => 'Välj "connector" fält som ska användas för sökning av data för varje modul.',
  'LBL_MODIFY_SEARCH_PAGE_TITLE' => '"Connector" inställningar: Administrera "connector" sökning',
  'LBL_MODULE_NAME' => '"Connectors"',
  'LBL_NO_PROPERTIES' => 'Det finns inga egenskaper att konfigurera för denna "connector".',
  'LBL_PARENT_DUNS' => 'Huvud DUNS',
  'LBL_PREVIOUS' => '< Tillbaka',
  'LBL_QUOTE' => 'Offert',
  'LBL_RECNAME' => 'Företagsnamn',
  'LBL_RESET_TO_DEFAULT' => 'Återställ till default',
  'LBL_RESET_TO_DEFAULT_CONFIRM' => 'Är du säker på att du vill återställa till default konfiguration?',
  'LBL_RESET_BUTTON_TITLE' => 'Återställ [Alt+R]',
  'LBL_RESULT_LIST' => 'Datalista',
  'LBL_RUN_WIZARD' => 'Kör guide',
  'LBL_SAVE' => 'Spara',
  'LBL_SEARCHING_BUTTON_LABEL' => 'Söker...',
  'LBL_SHOW_IN_LISTVIEW' => 'Visa i sammanfogning listvyn',
  'LBL_SMART_COPY' => 'Smart kopiering',
  'LBL_SUMMARY' => 'Sammanfattning',
  'LBL_STEP1' => 'Sök och visa data',
  'LBL_STEP2' => 'Sammanfoga poster med',
  'LBL_TEST_SOURCE' => 'Testa "connector"',
  'LBL_TEST_SOURCE_FAILED' => 'Testet misslyckades',
  'LBL_TEST_SOURCE_RUNNING' => 'Utför test ...',
  'LBL_TEST_SOURCE_SUCCESS' => 'Testet lyckades',
  'LBL_TITLE' => 'Sammanfoga data',
  'LBL_ULTIMATE_PARENT_DUNS' => 'Främsta huvud DUNS',
  'ERROR_RECORD_NOT_SELECTED' => 'Fel: Var god väj en post från listan innan du fortsätter.',
  'ERROR_EMPTY_WRAPPER' => 'Fel: Kunde ej mottaga "wrapper" instansen för källan [{$source_id}]',
  'ERROR_EMPTY_SOURCE_ID' => 'Fel: Källid är inte specificerat eller är tomt.',
  'ERROR_EMPTY_RECORD_ID' => 'Fel: Postid är inte specificerat eller är tomt',
  'ERROR_NO_ADDITIONAL_DETAIL' => 'Fel: Inga andra detaljer hittades på posten.',
  'ERROR_NO_SEARCHDEFS_DEFINED' => 'Inga moduler har aktiverats för denna "connector". Välj en modul för denna "connector" i Aktivera "connectors" sidan.',
  'ERROR_NO_SEARCHDEFS_MAPPED' => 'Fel: Det finns inga aktiverade "connectors" med definierade sökfält.',
  'ERROR_NO_SOURCEDEFS_FILE' => 'Fel: Inga sourcedefs.php filer kunde hittas.',
  'ERROR_NO_SOURCEDEFS_SPECIFIED' => 'Fel: Inga källor att hämta data ifrån är specificerade.',
  'ERROR_NO_CONNECTOR_DISPLAY_CONFIG_FILE' => 'Fel: Det finns inga "connectors" kopplade till denna modul.',
  'ERROR_NO_SEARCHDEFS_MAPPING' => 'Fel: Det finns inga sökfält definierade för modulen och "connector". Var snäll och kontakta din system administratör.',
  'ERROR_NO_FIELDS_MAPPED' => 'Fel: Du måste koppla åtminstone ett "connector" fält till ett modul fält för varje modul inlägg.',
  'ERROR_NO_DISPLAYABLE_MAPPED_FIELDS' => 'Fel: Det finns inga modulfält som har kopplats för visning på resultatet. Var snäll och kontakta din system administratör.',
);

