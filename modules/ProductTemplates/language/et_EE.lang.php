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
  'LBL_VENDOR_PART_NUM' => 'Müüja osa number:',
  'LBL_LIST_LBL_MFT_PART_NUM' => 'Mft Num',
  'LBL_LIST_USDOLLAR' => 'List USD:',
  'LBL_MFT_PART_NUM' => 'Mft Part Number:',
  'ERR_DELETE_RECORD' => 'Artikli kustutamiseks täpsusta kirje numbrit.',
  'LBL_ACCOUNT_NAME' => 'Ettevõtte nimi:',
  'LBL_ASSIGNED_TO' => 'Vastutaja:',
  'LBL_ASSIGNED_TO_ID' => 'Vastutaja ID:',
  'LBL_CATEGORY_NAME' => 'Kategooria nimi:',
  'LBL_CATEGORY' => 'Kategooria:',
  'LBL_CONTACT_NAME' => 'Kontaktisiku nimi:',
  'LBL_COST_PRICE' => 'Kulu:',
  'LBL_COST_USDOLLAR' => 'Kulu USD:',
  'LBL_CURRENCY' => 'Valuuta:',
  'LBL_CURRENCY_SYMBOL_NAME' => 'Valuuta sümbol:',
  'LBL_DATE_AVAILABLE' => 'Saadaolev kuupäev:',
  'LBL_DATE_COST_PRICE' => 'Kuupäev-kulu-hind:',
  'LBL_DESCRIPTION' => 'Kirjeldus',
  'LBL_DISCOUNT_PRICE_DATE' => 'Allahindlushinna kuupäev:',
  'LBL_DISCOUNT_PRICE' => 'Ühiku hind:',
  'LBL_DISCOUNT_USDOLLAR' => 'Allahindlus hind USD:',
  'LBL_LIST_CATEGORY' => 'Kategooria:',
  'LBL_LIST_CATEGORY_ID' => 'Kategooria ID:',
  'LBL_LIST_COST_PRICE' => 'Kulu:',
  'LBL_LIST_DISCOUNT_PRICE' => 'Hind:',
  'LBL_LIST_FORM_TITLE' => 'Artiklikataloogi loend',
  'LBL_LIST_LIST_PRICE' => 'Loend',
  'LBL_LIST_MANUFACTURER' => 'Tootja',
  'LBL_LIST_MANUFACTURER_ID' => 'Tootja ID:',
  'LBL_LIST_NAME' => 'Nimi',
  'LBL_LIST_PRICE' => 'Loendi hind:',
  'LBL_LIST_QTY_IN_STOCK' => 'Tk',
  'LBL_LIST_STATUS' => 'Saadaval',
  'LBL_LIST_TYPE' => 'Tüüp:',
  'LBL_LIST_TYPE_ID' => 'Tüüp:',
  'LBL_MANUFACTURER_NAME' => 'Tootja nimi:',
  'LBL_MANUFACTURER' => 'Tootja:',
  'LBL_MODULE_NAME' => 'Artikli kataloog',
  'LBL_MODULE_ID' => 'Artikli mallid',
  'LBL_MODULE_TITLE' => 'Artikli kataloog: Avaleht',
  'LBL_NAME' => 'Artkli nimi:',
  'LBL_NEW_FORM_TITLE' => 'Loo ühik',
  'LBL_PERCENTAGE' => 'Protsent (%)',
  'LBL_POINTS' => 'Punktid',
  'LBL_PRICING_FORMULA' => 'Vaike hinnastamisvalem:',
  'LBL_PRICING_FACTOR' => 'Hinnastamisfaktor:',
  'LBL_PRODUCT' => 'Artikkel:',
  'LBL_PRODUCT_ID' => 'Artikli ID:',
  'LBL_QUANTITY' => 'Kogus laos:',
  'LBL_RELATED_PRODUCTS' => 'Seotud toode:',
  'LBL_SEARCH_FORM_TITLE' => 'Artikli kataloogi otsing',
  'LBL_STATUS' => 'Saadaval:',
  'LBL_SUPPORT_CONTACT' => 'Toe kontakt:',
  'LBL_SUPPORT_DESCRIPTION' => 'Toe kirjeldus:',
  'LBL_SUPPORT_NAME' => 'Toe nimi:',
  'LBL_SUPPORT_TERM' => 'Toe tingimused:',
  'LBL_TAX_CLASS' => 'Maksuklass:',
  'LBL_TYPE_NAME' => 'Tüübi nimi',
  'LBL_TYPE' => 'Tüüp',
  'LBL_URL' => 'Artikli URL',
  'LBL_WEIGHT' => 'Kaal:',
  'LNK_IMPORT_PRODUCTS' => 'Impordi artiklid',
  'LNK_NEW_MANUFACTURER' => 'Tootjad',
  'LNK_NEW_PRODUCT_CATEGORY' => 'Artikli kategooriad',
  'LNK_NEW_PRODUCT_TYPE' => 'Artikli tüübid',
  'LNK_NEW_PRODUCT' => 'Loo artikkel kataloogi jaoks',
  'LNK_NEW_SHIPPER' => 'Tarnepakkujad',
  'LNK_PRODUCT_LIST' => 'Vaata artikli kataloogi',
  'NTC_DELETE_CONFIRMATION' => 'Oled kindel, et soovid seda kirjet kustutada?',
);

