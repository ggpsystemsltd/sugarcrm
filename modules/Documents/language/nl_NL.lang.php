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
  'LBL_STATUS' => 'Status',
  'LBL_DOC_STATUS' => 'Status:',
  'LBL_TEAM' => 'Team:',
  'LBL_LIST_DOCUMENT' => 'Document',
  'LBL_LIST_DOWNLOAD' => 'Download',
  'LBL_LIST_STATUS' => 'Status',
  'LBL_OPPORTUNITIES_SUBPANEL_TITLE' => 'Opportunities',
  'LBL_CASES_SUBPANEL_TITLE' => 'Cases',
  'LBL_MODULE_NAME' => 'Documenten',
  'LBL_MODULE_TITLE' => 'Documenten: Start',
  'LNK_NEW_DOCUMENT' => 'Nieuw Document',
  'LNK_DOCUMENT_LIST' => 'Toon Documenten',
  'LBL_DOC_REV_HEADER' => 'Document Revisie',
  'LBL_SEARCH_FORM_TITLE' => 'Documenten Zoeken',
  'LBL_DOCUMENT_ID' => 'Document Id',
  'LBL_NAME' => 'Document Naam',
  'LBL_DESCRIPTION' => 'Beschrijving',
  'LBL_CATEGORY' => 'Categorie',
  'LBL_SUBCATEGORY' => 'Sub-categorie',
  'LBL_CREATED_BY' => 'Gemaakt door',
  'LBL_DATE_ENTERED' => 'Datum ingevoerd',
  'LBL_DATE_MODIFIED' => 'Laatste wijziging',
  'LBL_DELETED' => 'Verwijderd',
  'LBL_MODIFIED' => 'Gewijzigd door',
  'LBL_MODIFIED_USER' => 'Gewijzigd Door:',
  'LBL_CREATED' => 'Gemaakt door',
  'LBL_REVISIONS' => 'Versies',
  'LBL_RELATED_DOCUMENT_ID' => 'Gerelateerd Document ID',
  'LBL_RELATED_DOCUMENT_REVISION_ID' => 'Gerelateerd Document Versie ID',
  'LBL_IS_TEMPLATE' => 'Is een Sjabloon',
  'LBL_TEMPLATE_TYPE' => 'Documenttype',
  'LBL_ASSIGNED_TO_NAME' => 'Toegewezen aan:',
  'LBL_REVISION_NAME' => 'Versienummer',
  'LBL_MIME' => 'Mime type',
  'LBL_REVISION' => 'Versie',
  'LBL_DOCUMENT' => 'Gerelateerd Document',
  'LBL_LATEST_REVISION' => 'Laatste Versie',
  'LBL_CHANGE_LOG' => 'Wijzigingslog',
  'LBL_ACTIVE_DATE' => 'Publicatiedatum',
  'LBL_EXPIRATION_DATE' => 'Expiratiedatum',
  'LBL_FILE_EXTENSION' => 'Bestandsextensie',
  'LBL_LAST_REV_MIME_TYPE' => 'Laatste Revisie - Mime type',
  'LBL_CAT_OR_SUBCAT_UNSPEC' => 'Ongespecificeerd',
  'LBL_HOMEPAGE_TITLE' => 'Mijn Documenten',
  'LBL_NEW_FORM_TITLE' => 'Nieuw Document',
  'LBL_DOC_NAME' => 'Documentnaam:',
  'LBL_FILENAME' => 'Bestandsnaam:',
  'LBL_LIST_FILENAME' => 'Bestandsnaam',
  'LBL_DOC_VERSION' => 'Revisie:',
  'LBL_FILE_UPLOAD' => 'Bestand:',
  'LBL_CATEGORY_VALUE' => 'Productcategorie',
  'LBL_LIST_CATEGORY' => 'Categorie',
  'LBL_SUBCATEGORY_VALUE' => 'Sub-categorie:',
  'LBL_LAST_REV_CREATOR' => 'Revisie gemaakte door:',
  'LBL_LASTEST_REVISION_NAME' => 'Laatste Revisie Naam:',
  'LBL_SELECTED_REVISION_NAME' => 'Gekozen Revisie Naam',
  'LBL_CONTRACT_STATUS' => 'Contract status',
  'LBL_CONTRACT_NAME' => 'Contractnaam:',
  'LBL_LAST_REV_DATE' => 'Revisie datum:',
  'LBL_DOWNNLOAD_FILE' => 'Download Bestand:',
  'LBL_DET_RELATED_DOCUMENT' => 'Gerelateerd Document:',
  'LBL_DET_RELATED_DOCUMENT_VERSION' => 'Gerelateerde Documentversie:',
  'LBL_DET_IS_TEMPLATE' => 'Sjabloon? :',
  'LBL_DET_TEMPLATE_TYPE' => 'Documenttype:',
  'LBL_DOC_DESCRIPTION' => 'Beschrijving:',
  'LBL_DOC_ACTIVE_DATE' => 'Publicatiedatum:',
  'LBL_DOC_EXP_DATE' => 'Expiratiedatum:',
  'LBL_LIST_FORM_TITLE' => 'Documentenlijst',
  'LBL_LIST_SUBCATEGORY' => 'Sub-categorie',
  'LBL_LIST_REVISION' => 'Versie',
  'LBL_LIST_LAST_REV_CREATOR' => 'Gepubliceerd door',
  'LBL_LIST_LAST_REV_DATE' => 'Versiedatum',
  'LBL_LIST_VIEW_DOCUMENT' => 'Bekijk',
  'LBL_LIST_ACTIVE_DATE' => 'Publicatiedatum',
  'LBL_LIST_EXP_DATE' => 'Expiratiedatum',
  'LBL_LINKED_ID' => 'Gerelateerde ID',
  'LBL_SELECTED_REVISION_ID' => 'Gekozen Revisie ID',
  'LBL_LATEST_REVISION_ID' => 'Laatste Revisie ID',
  'LBL_SELECTED_REVISION_FILENAME' => 'Geskozen Revisie Bestandsnaam',
  'LBL_FILE_URL' => 'Bestands URL',
  'LBL_REVISIONS_PANEL' => 'Revisie Details',
  'LBL_REVISIONS_SUBPANEL' => 'Revisies',
  'LBL_SF_DOCUMENT' => 'Documentnaam:',
  'LBL_SF_CATEGORY' => 'Productcategorie',
  'LBL_SF_SUBCATEGORY' => 'Sub-categorie:',
  'LBL_SF_ACTIVE_DATE' => 'Publicatiedatum:',
  'LBL_SF_EXP_DATE' => 'Expiratiedatum:',
  'DEF_CREATE_LOG' => 'Document Aangemaakt',
  'ERR_DOC_NAME' => 'Documentnaam',
  'ERR_DOC_ACTIVE_DATE' => 'Publicatiedatum',
  'ERR_DOC_EXP_DATE' => 'Expiratiedatum',
  'ERR_FILENAME' => 'Bestandsnaam',
  'ERR_DOC_VERSION' => 'Documentversie',
  'ERR_DELETE_CONFIRM' => 'Wilt u deze versie van het document verwijderen?',
  'ERR_DELETE_LATEST_VERSION' => 'Het is niet toegestaan de laatste versie van een document te verwijderen.',
  'LNK_NEW_MAIL_MERGE' => 'Email Samenvoegen',
  'LBL_MAIL_MERGE_DOCUMENT' => 'Documentsjabloon:',
  'LBL_TREE_TITLE' => 'Documenten',
  'LBL_LIST_DOCUMENT_NAME' => 'Documentnaam',
  'LBL_LIST_IS_TEMPLATE' => 'Sjabloon?',
  'LBL_LIST_TEMPLATE_TYPE' => 'Documenttype',
  'LBL_LIST_SELECTED_REVISION' => 'Geselecteerde Versie',
  'LBL_LIST_LATEST_REVISION' => 'Laatste Versie',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Gerelateerde Contracten',
  'LBL_LAST_REV_CREATE_DATE' => 'Laatste Versie Datum ingevoerd',
  'LBL_CONTRACTS' => 'Contracten',
  'LBL_CREATED_USER' => 'Aangemaakte Gebruiker',
  'LBL_THEREVISIONS_SUBPANEL_TITLE' => 'Versies',
  'LBL_DOCUMENT_INFORMATION' => 'Document Overzicht',
  'LBL_DOC_ID' => 'Document Bron ID',
  'LBL_DOC_TYPE' => 'Bron',
  'LBL_LIST_DOC_TYPE' => 'Bron',
  'LBL_DOC_TYPE_POPUP' => 'Selecteer een bron waarnaar dit document wordt geüpload en vanwaar het beschikbaar zal zijn.',
  'LBL_DOC_URL' => 'Document Bron URL',
  'LBL_SEARCH_EXTERNAL_DOCUMENT' => 'Document Naam:',
  'LBL_EXTERNAL_DOCUMENT_NOTE' => 'De eerste 20 meest recent gewijzigde bestanden worden in aflopende volgorde weergegeven in de lijst hieronder. Gebruik de zoekfunctie om andere bestanden te vinden.',
  'LBL_LIST_EXT_DOCUMENT_NAME' => 'Bestandsnaam',
  'LBL_ACCOUNTS_SUBPANEL_TITLE' => 'Organisaties',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Personen',
  'LBL_BUGS_SUBPANEL_TITLE' => 'Defecten',
  'LBL_QUOTES_SUBPANEL_TITLE' => 'Offertes',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Producten',
);

