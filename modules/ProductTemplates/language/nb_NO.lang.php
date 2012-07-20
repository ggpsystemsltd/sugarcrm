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
'ERR_DELETE_RECORD'                                => 'Et registernummer må oppgis for å slette dette produktet.',
'LBL_ACCOUNT_NAME'                                 => 'Kontonavn:',
'LBL_ASSIGNED_TO'                                  => 'Tildelt:',
'LBL_ASSIGNED_TO_ID'                               => 'Tildelt ID:',
'LBL_CATEGORY_NAME'                                => 'Kategorinavn:',
'LBL_CATEGORY'                                     => 'Kategori:',
'LBL_CONTACT_NAME'                                 => 'Kontaktnavn:',
'LBL_COST_PRICE'                                   => 'Kostnad:',
'LBL_COST_USDOLLAR'                                => 'Kostnad USD:',
'LBL_CURRENCY'                                     => 'Valuta:',
'LBL_CURRENCY_SYMBOL_NAME'                         => 'Valutasymbol:',
'LBL_DATE_AVAILABLE'                               => 'Tilgjengelighetsdato:',
'LBL_DATE_COST_PRICE'                              => 'Dato-Kostnad-Pris:',
'LBL_DESCRIPTION'                                  => 'Beskrivelse:',
'LBL_DISCOUNT_PRICE_DATE'                          => 'Dato for prisrabatt:',
'LBL_DISCOUNT_PRICE'                               => 'Rabattert pris:',
'LBL_DISCOUNT_USDOLLAR'                            => 'Rabattert pris USD:',
'LBL_LIST_CATEGORY'                                => 'Kategori:',
'LBL_LIST_CATEGORY_ID'                             => 'Kategori-ID:',
'LBL_LIST_COST_PRICE'                              => 'Kostnad:',
'LBL_LIST_DISCOUNT_PRICE'                          => 'Pris:',
'LBL_LIST_FORM_TITLE'                              => 'Produktkatalogliste',
'LBL_LIST_LBL_MFT_PART_NUM'                        => 'Prod. num.',
'LBL_LIST_LIST_PRICE'                              => 'Liste',
'LBL_LIST_MANUFACTURER'                            => 'Produsent',
'LBL_LIST_MANUFACTURER_ID'                         => 'Produsent-ID:',
'LBL_LIST_NAME'                                    => 'Navn',
'LBL_LIST_PRICE'                                   => 'Listepris:',
'LBL_LIST_QTY_IN_STOCK'                            => 'Kvantitet',
'LBL_LIST_STATUS'                                  => 'Tilgjenglighet',
'LBL_LIST_TYPE'                                    => 'Type:',
'LBL_LIST_TYPE_ID'                                 => 'Type-ID:',
'LBL_LIST_USDOLLAR'                                => 'Liste USD:',
'LBL_MANUFACTURER_NAME'                            => 'Produsentens navn:',
'LBL_MANUFACTURER'                                 => 'Produsent:',
'LBL_MFT_PART_NUM'                                 => 'Prod. del av nummer:',
'LBL_MODULE_NAME'                                  => 'Produktkatalog',
'LBL_MODULE_ID'                                    => 'Produktmaler',
'LBL_MODULE_TITLE'                                 => 'Produktkatalog: Hjem',
'LBL_NAME'                                         => 'Produktnavn:',
'LBL_NEW_FORM_TITLE'                               => 'Opprett postering',
'LBL_PERCENTAGE'                                   => 'Prosent(%)',
'LBL_POINTS'                                       => 'Poeng',
'LBL_PRICING_FORMULA'                              => 'Forhåndsinntilt prisformel:',
'LBL_PRICING_FACTOR'                               => 'Prisfaktor:',
'LBL_PRODUCT'                                      => 'Produkt:',
'LBL_PRODUCT_ID'                                   => 'Produkt-ID:',
'LBL_QUANTITY'                                     => 'Mengde på lager:',
'LBL_RELATED_PRODUCTS'                             => 'Relatert produkt',
'LBL_SEARCH_FORM_TITLE'                            => 'Søk i produktkatalog',
'LBL_STATUS'                                       => 'Tilgjengelighet:',
'LBL_SUPPORT_CONTACT'                              => 'Supportkontakt:',
'LBL_SUPPORT_DESCRIPTION'                          => 'Supportdesc:',
'LBL_SUPPORT_NAME'                                 => 'Supportnavn:',
'LBL_SUPPORT_TERM'                                 => 'Supporttid:',
'LBL_TAX_CLASS'                                    => 'Skatteklasse:',
'LBL_TYPE_NAME'                                    => 'Typenavn',
'LBL_TYPE'                                         => 'Type',
'LBL_URL'                                          => 'Produkt-URL:',
'LBL_VENDOR_PART_NUM'                              => 'Delenummer på automat:',
'LBL_WEIGHT'                                       => 'Vekt:',
'LNK_IMPORT_PRODUCTS'                              => 'Importér produkter',
'LNK_NEW_MANUFACTURER'                             => 'Produsenter',
'LNK_NEW_PRODUCT_CATEGORY'                         => 'Produktkategorier',
'LNK_NEW_PRODUCT_TYPE'                             => 'Produkttyper',
'LNK_NEW_PRODUCT'                                  => 'Opprett postering for katalog',
'LNK_NEW_SHIPPER'                                  => 'Avsenderleverandør',
'LNK_PRODUCT_LIST'                                 => 'Produktkatalog',
'NTC_DELETE_CONFIRMATION'                          => 'Er du sikker på at du vil slette denne oppføringen?',
);?>
