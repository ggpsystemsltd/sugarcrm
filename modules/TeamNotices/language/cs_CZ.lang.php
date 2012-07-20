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
  'LBL_URL' => 'URL',
  'LBL_MODULE_NAME' => 'Týmové zprávy',
  'LBL_MODULE_TITLE' => 'Týmo zprávy: Domů',
  'LBL_SEARCH_FORM_TITLE' => 'Vyhledání týmových zpráv',
  'LBL_LIST_FORM_TITLE' => 'List týmových zpráv',
  'LBL_PRODUCTTYPE' => 'Týmové zprávy',
  'LBL_NOTICES' => 'Týmové zprávy',
  'LBL_LIST_NAME' => 'Název',
  'LBL_URL_TITLE' => 'URL název',
  'LBL_LIST_DESCRIPTION' => 'Popis',
  'LBL_NAME' => 'Název',
  'LBL_DESCRIPTION' => 'Popis',
  'LBL_LIST_LIST_ORDER' => 'Příkaz',
  'LBL_LIST_ORDER' => 'Seznam příkazů',
  'LBL_DATE_START' => 'Začátek',
  'LBL_DATE_END' => 'Konec',
  'LBL_STATUS' => 'Stav',
  'LNK_NEW_TEAM' => 'Vytvoř Tým',
  'LNK_NEW_TEAM_NOTICE' => 'Vytvoř týmovou poznámku',
  'LNK_LIST_TEAM' => 'Týmy',
  'LNK_LIST_TEAMNOTICE' => 'Týmové poznámky',
  'LNK_PRODUCT_LIST' => 'Ceník produktů',
  'LNK_NEW_PRODUCT' => 'Vytvořit produkt',
  'LNK_NEW_MANUFACTURER' => 'Zboží',
  'LNK_NEW_SHIPPER' => 'Doručovatelé',
  'LNK_NEW_PRODUCT_CATEGORY' => 'Kategorie produktů',
  'LNK_NEW_PRODUCT_TYPE' => 'List typů produktů',
  'NTC_DELETE_CONFIRMATION' => 'Jste si jist(a), že chcete smazat tento záznam??',
  'ERR_DELETE_RECORD' => 'Musíte zadat číslo záznamu pro smazání.',
  'NTC_LIST_ORDER' => 'Nastavte jaké typy se budou zobrazovat v dorpdownu v typech produktů.',
  'LBL_TEAM_NOTICE_FEATURES' => 'Vlastnosti:<br />* Vylepšené uživatelské rozhraní a nový Průvodce umožňuje jednoduchý, intuitivní design s průvodcem procesních kroků může uživatel vytvářet reporty.<br />* Komplexní Report sety umožňují uživatelům vytvářet reporty napříč různými moduly pomocí jednoduché logiky.<br />* Maticové reporty nabídnout možnost podle více atributů v pružném rozvržení vytvářet reporty. Uživatelé mohou vytvářet složité tabulky s možností zobrazení operací, jako je Součet, Průměr, Počet a procento<br />* Run-time filtry umožňují uživatelům měnit atributy reportu v realném čase.',
  'LBL_TEAM_NOTICE_WIRELESS' => 'Nové mobilní zobrazení SugarCRM mění standardy v použitelností a mobilitě<br />Vlastnosti:<br />* Improved User Interface provides users with view into edit, detail, list views, and related records, as well as the ability access employee directory, store preferences, and view recent items.<br />* Nezávislost na zařízení umožňuje uživatelům zobrazit SugarCRM data z libovolného PDA nebo smart-phonu, včetně Blackberry a iPhone.<br />* Bohatý HTML klient přináší čistou prezentaci SugarCRM přes standardní webový prohlížeč.<br />* Nové možnosti vyhledávání umožňují uživatelům najít informace rychleji.',
  'LBL_TEAM_NOTICE_DATA_IMPORT' => 'Data Import Rozšíření! Aby to bylo ještě jednodušší lze imporotvat data z aplikací, jako jsou Excel, Act!, Microsoft Outlook, a Salesforce.com do SugarCRM.<br />Vylepšení:<br />* Vylepšené uživatelské rozhraní pro mapování poskytuje více možností, jak zajistit přenos dat. Ty se převádí plynule a přesně do SugarCRM.<br />* Kontrola Data kvality umožňuje správcům určit, zda se data importovaly správne a měly vytvořit nové záznamy nebo aktualizovat existující záznamy, snižování se tím duplicitní informace.<br />* Import do všech modulů poskytuje možnost, aby informace z jiných CRM aplikac dala přenést na jakýkoliv modul, snižuje se data Re-entry..',
  'LBL_TEAM_NOTICE_MODULE_BUILDER' => 'Modul Builder vám umožní rozšířit v SugarCRM nové a inovativní způsoby.<br />Vylepšení:<br />* Nové vztahy umožňují pro nové a existující moduly být v lepším propojení.<br />* Možnost auditů systému poskytuje kompletní historii modulu, jeho vytváření a sledovaní úpravy.<br />* Úprava hlavní strany umožňuje vlastní objekt a modul funkce zobrazit v kontejnerech AJAX na homepage.<br />* Nové šablony poskytují způsob, jak snadno sledovat a trackovat obchody.',
  'LBL_TEAM_NOTICE_TRACKER' => 'Tracker nyní poskytuje rozšířený pohled do SugarCRM jeho větší využití a lepší výkon..<br />Vlastnosti:<br />* Tracker report poskytují náhled do celého systému a to využitím informací ze strany uživatelů napříc celým CRM. Uživatelé mohou zobrazit zprávy o týdenních aktivitách, jednotlivé záznamy nebo prohlížet moduly, komplexní čas přihlášení a online status ostatních členů týmu..<br />* Systém Sledování poskytuje správcům informace o tom, jak je používán systém a potenciální místa pro zlepšení',
  'dom_status' => 
  array (
    'Visible' => 'Viditelné',
    'Hidden' => 'Skryté',
  ),
);

