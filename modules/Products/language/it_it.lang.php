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
  'LBL_EDITLAYOUT' => 'Modifica Layout',
  'LBL_TAX_CLASS' => 'Tax Class:',
  'LBL_SUPPORT_DESCRIPTION' => 'Support Desc:',
  'LBL_MODULE_NAME' => 'Prodotti',
  'LBL_MODULE_TITLE' => 'Prodotti: Home',
  'LBL_SEARCH_FORM_TITLE' => 'Ricerca Prodotti',
  'LBL_LIST_FORM_TITLE' => 'Elenco Prodotti',
  'LBL_NEW_FORM_TITLE' => 'Crea Prodotto',
  'LBL_PRODUCT' => 'Prodotto:',
  'LBL_RELATED_PRODUCTS' => 'Prodotti Correlati',
  'LBL_LIST_NAME' => 'Prodotto',
  'LBL_LIST_MANUFACTURER' => 'Produttore',
  'LBL_LIST_LBL_MFT_PART_NUM' => 'Part Numb Prod.',
  'LBL_LIST_QUANTITY' => 'Quantità',
  'LBL_LIST_COST_PRICE' => 'Costo',
  'LBL_LIST_DISCOUNT_PRICE' => 'Prezzo Scontato',
  'LBL_LIST_LIST_PRICE' => 'Prezzo Listino',
  'LBL_LIST_STATUS' => 'Stato',
  'LBL_LIST_ACCOUNT_NAME' => 'Azienda',
  'LBL_LIST_CONTACT_NAME' => 'Nome contatto',
  'LBL_LIST_QUOTE_NAME' => 'Nome Offerta',
  'LBL_LIST_DATE_PURCHASED' => 'Acquistato',
  'LBL_LIST_SUPPORT_EXPIRES' => 'Scad. assist.',
  'LBL_NAME' => 'Prodotto:',
  'LBL_URL' => 'URL del prodotto:',
  'LBL_QUOTE_NAME' => 'Nome Offerta:',
  'LBL_CONTACT_NAME' => 'Nome Contatto:',
  'LBL_DATE_PURCHASED' => 'Data acquisto:',
  'LBL_DATE_SUPPORT_EXPIRES' => 'Scadenza assistenza:',
  'LBL_DATE_SUPPORT_STARTS' => 'Inizio assistenza:',
  'LBL_COST_PRICE' => 'Costo:',
  'LBL_DISCOUNT_PRICE' => 'Prezzo unitario:',
  'LBL_DEAL_TOT' => 'Sconto:',
  'LBL_DISCOUNT_RATE' => 'Tariffa scontata',
  'LBL_DISCOUNT_RATE_USDOLLAR' => 'Tariffa scontata (Dollari US)',
  'LBL_DISCOUNT_TOTAL' => 'Sconto',
  'LBL_DISCOUNT_TOTAL_USDOLLAR' => 'Sconto (Dollari US)',
  'LBL_SELECT_DISCOUNT' => 'Sconto in %',
  'LBL_LIST_PRICE' => 'Prezzo di listino:',
  'LBL_VENDOR_PART_NUM' => 'Part Number Fornitore:',
  'LBL_MFT_PART_NUM' => 'Part Number Produttore:',
  'LBL_DISCOUNT_PRICE_DATE' => 'Data del prezzo scontato:',
  'LBL_WEIGHT' => 'Peso:',
  'LBL_DESCRIPTION' => 'Descrizione:',
  'LBL_TYPE' => 'Tipo:',
  'LBL_CATEGORY' => 'Categoria:',
  'LBL_QUANTITY' => 'Quantità:',
  'LBL_STATUS' => 'Stato:',
  'LBL_MANUFACTURER' => 'Produttore:',
  'LBL_SUPPORT_TERM' => 'Condizioni assistenza:',
  'LBL_SUPPORT_NAME' => 'Titolo Assistenza:',
  'LBL_SUPPORT_CONTACT' => 'Contatto per Assistenza:',
  'LBL_PRICING_FORMULA' => 'Formula di Pricing:',
  'LBL_ACCOUNT_NAME' => 'Nome Azienda:',
  'LNK_PRODUCT_LIST' => 'Prodotti',
  'LNK_NEW_PRODUCT' => 'Crea Prodotto',
  'NTC_DELETE_CONFIRMATION' => 'Sei sicuro di voler eliminare questo record ?',
  'NTC_REMOVE_CONFIRMATION' => 'Sei sicuro di voler rimuovere la relazione di questo prodotto?',
  'ERR_DELETE_RECORD' => 'Per eliminare il prodotto deve essere specificato il numero del record.',
  'LBL_CURRENCY' => 'Valuta:',
  'LBL_ASSET_NUMBER' => 'Numero di cespite:',
  'LBL_SERIAL_NUMBER' => 'Numero di serie:',
  'LBL_BOOK_VALUE' => 'Valore contabile:',
  'LBL_BOOK_VALUE_USDOLLAR' => 'Valore contabile (US Dollar):',
  'LBL_BOOK_VALUE_DATE' => 'Data del valore contabile:',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Prodotti',
  'LBL_RELATED_PRODUCTS_TITLE' => 'Prodotti Correlati',
  'LBL_WEBSITE' => 'Sito web',
  'LBL_COST_USDOLLAR' => 'Costo (US Dollar)',
  'LBL_DISCOUNT_USDOLLAR' => 'Sconto (US Dollar)',
  'LBL_LIST_USDOLLAR' => 'Prezzo di Listino (US Dollar)',
  'LBL_PRICING_FACTOR' => 'Quoziente di Prezzo',
  'LBL_ACCOUNT_ID' => 'ID Azienda',
  'LBL_CONTACT_ID' => 'ID Contatto',
  'LBL_CATEGORY_NAME' => 'Nome Categoria:',
  'LBL_NOTES_SUBPANEL_TITLE' => 'Note',
  'LBL_MEMBER_OF' => 'Membro di:',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Progetti',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Documenti',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Contratti',
  'LBL_CONTRACTS' => 'Contratti',
  'LBL_PRODUCT_CATEGORIES' => 'Categorie Prodotto',
  'LBL_PRODUCT_TYPES' => 'Tipi Prodotto',
  'LBL_ASSIGNED_TO_NAME' => 'Assegnato a:',
  'LBL_PRODUCT_TEMPLATE_ID' => 'ID Template Prodotto:',
  'LBL_QUOTE_ID' => 'ID Offerta',
  'LBL_CREATED_USER' => 'Utente Creato',
  'LBL_MODIFIED_USER' => 'Utente Modificato',
  'LBL_QUOTE' => 'Offerta',
  'LBL_CONTACT' => 'Contatto',
  'LBL_DISCOUNT_AMOUNT' => 'Importo Sconto',
  'LBL_CURRENCY_SYMBOL_NAME' => 'Nome Simbolo Valuta',
  'LBL_PRODUCTS_SUBPANEL_TITLE' => 'Prodotti',
  'LNK_IMPORT_PRODUCTS' => 'Importa Prodotti',
  'LBL_EXPORT_CURRENCY_ID' => 'ID Valuta',
);

