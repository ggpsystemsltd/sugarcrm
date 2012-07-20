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

    'LBL_ADD_MODULE' => 'Add',
    'LBL_ADDRCITY' => 'Town/City',
    'LBL_ADDRCOUNTRY' => 'Country',
    'LBL_ADDRCOUNTRY_ID' => 'Country Id',
    'LBL_ADDRSTATEPROV' => 'County',
    'LBL_ADMINISTRATION' => 'Connector Administration',
    'LBL_ADMINISTRATION_MAIN' => 'Connector Settings',
    'LBL_AVAILABLE' => 'Available',
    'LBL_BACK' => '< Back',
    'LBL_COMPANY_ID' => 'Company Id',
	'LBL_CONFIRM_CONTINUE_SAVE' => 'Some required fields have been left blank.  Proceed to save changes?',
    'LBL_CONNECTOR' => 'Connector',
    'LBL_CONNECTOR_FIELDS' => 'Connector Fields',
    'LBL_DATA' => 'Data',
    'LBL_DEFAULT' => 'Default',
    'LBL_DELETE_MAPPING_ENTRY' => 'Are you sure you want to delete this entry?',
    'LBL_DISABLED' => 'Disabled',
    'LBL_DUNS' => 'DUNS',
    'LBL_EMPTY_BEANS' => 'No matches were found for your search criteria.',
    'LBL_ENABLED' => 'Enabled',
    'LBL_FINSALES' => 'Finsales',
    'LBL_MARKET_CAP' => 'Market Cap',
    'LBL_MERGE' => 'Merge',
    'LBL_MODIFY_DISPLAY_TITLE' => 'Enable Connectors',
    'LBL_MODIFY_DISPLAY_DESC' => 'Select which modules are enabled for each connector.',
    'LBL_MODIFY_DISPLAY_PAGE_TITLE' => 'Connector Settings: Enable Connectors',
    'LBL_MODULE_FIELDS' => 'Module Fields',
    'LBL_MODIFY_MAPPING_TITLE' => 'Map Connector Fields',
    'LBL_MODIFY_MAPPING_DESC' => 'Map connector fields to module fields in order to determine what connector data can be viewed and merged into the module records.',
    'LBL_MODIFY_MAPPING_PAGE_TITLE' => 'Connector Settings: Map Connector Fields',
    'LBL_MODIFY_PROPERTIES_TITLE' => 'Set Connector Properties',
    'LBL_MODIFY_PROPERTIES_DESC' => 'Configure the properties for each connector, including URLs and API keys.',
    'LBL_MODIFY_PROPERTIES_PAGE_TITLE' => 'Connector Settings: Set Connector Properties',
    'LBL_MODIFY_SEARCH_TITLE' => 'Manage Connector Search',
	'LBL_MODIFY_SEARCH' => 'Search',
    'LBL_MODIFY_SEARCH_DESC' => 'Select the connector fields to use to search for data for each module.',
    'LBL_MODIFY_SEARCH_PAGE_TITLE' => 'Connector Settings: Manage Connector Search',
	'LBL_MODULE_NAME' => 'Connectors',
    'LBL_NO_PROPERTIES' => 'There are no configurable properties for this connector.',
    'LBL_PARENT_DUNS' => 'Parent DUNS',
    'LBL_PREVIOUS' => '< Back',
    'LBL_QUOTE' => 'Quote',
    'LBL_RECNAME' => 'Company Name',
    'LBL_RESET_TO_DEFAULT' => 'Reset to Default',
    'LBL_RESET_TO_DEFAULT_CONFIRM' => 'Are you sure you want to reset to the default configuration?',
    'LBL_RESET_BUTTON_TITLE' => 'Reset [Alt+R]',
	'LBL_RESULT_LIST' => 'Data List',
    'LBL_RUN_WIZARD' => 'Run Wizard',
    'LBL_SAVE' => 'Save',
	'LBL_SEARCHING_BUTTON_LABEL' => 'Searching...',
    'LBL_SHOW_IN_LISTVIEW' => 'Show In Merge Listview',
    'LBL_SMART_COPY' => 'Smart Copy',
    'LBL_SUMMARY' => 'Summary',
    'LBL_STEP1' => 'Search and View Data',
    'LBL_STEP2' => 'Merge Records with',
    'LBL_TEST_SOURCE' => 'Test Connector',
    'LBL_TEST_SOURCE_FAILED' => 'Test Failed',
    'LBL_TEST_SOURCE_RUNNING' => 'Performing Test...',
    'LBL_TEST_SOURCE_SUCCESS' => 'Test Successful',
    'LBL_TITLE' => 'Data Merge',
    'LBL_ULTIMATE_PARENT_DUNS' => 'Ultimate Parent DUNS',

    'ERROR_RECORD_NOT_SELECTED' => 'Error: Please select a record from the list before proceeding.',
    'ERROR_EMPTY_WRAPPER' => 'Error: Unable to retrieve wrapper instance for the source [{$source_id}]',
    'ERROR_EMPTY_SOURCE_ID' => 'Error: Source Id not specified or empty.',
    'ERROR_EMPTY_RECORD_ID' => 'Error: Record Id not specified or empty.',
    'ERROR_NO_ADDITIONAL_DETAIL' => 'Error: No additional details were found for the record.',
    'ERROR_NO_SEARCHDEFS_DEFINED' => 'No modules have been enabled for this connector.  Select a module for this connector in the Enable Connectors page.',
    'ERROR_NO_SEARCHDEFS_MAPPED' => 'Error: There are no connectors enabled that have search fields defined.',
    'ERROR_NO_SOURCEDEFS_FILE' => 'Error: No sourcedefs.php file could be found.',
    'ERROR_NO_SOURCEDEFS_SPECIFIED' => 'Error: No sources were specified from which to retrieve data.',
    'ERROR_NO_CONNECTOR_DISPLAY_CONFIG_FILE' => 'Error: There are no connectors mapped to this module.',
    'ERROR_NO_SEARCHDEFS_MAPPING' => 'Error: There are no search fields defined for the module and connector.  Please contact the system administrator.',
    'ERROR_NO_FIELDS_MAPPED' => 'Error: You must map at least one Connector field to a module field for each module entry.',
    'ERROR_NO_DISPLAYABLE_MAPPED_FIELDS' => 'Error: There are no module fields that have been mapped for display in the results.  Please contact the system administrator.',
);

?>