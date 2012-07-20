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
  'LBL_EDIT_LAYOUT' => 'Redaguoti išdėstymą',
  'LBL_EDIT_ROWS' => 'Redaguoti eilutes',
  'LBL_EDIT_COLUMNS' => 'Redaguoti stulpelius',
  'LBL_EDIT_LABELS' => 'Redaguoti etiketes',
  'LBL_EDIT_FIELDS' => 'Redaguoti nestandartinius laukus',
  'LBL_ADD_FIELDS' => 'Pridėti nestandartinį lauką',
  'LBL_DISPLAY_HTML' => 'Rodyti HTML kodą',
  'LBL_SELECT_FILE' => 'Pasirinkti failą',
  'LBL_SAVE_LAYOUT' => 'Išsaugoti išplanavimą',
  'LBL_SELECT_A_SUBPANEL' => 'Pasirinkite subpanelį',
  'LBL_SELECT_SUBPANEL' => 'Pasirinkite subpanelį',
  'LBL_MODULE_TITLE' => 'Studija',
  'LBL_TOOLBOX' => 'Įrankių dėžė',
  'LBL_STAGING_AREA' => 'Staging Area (tempkite ir įmeskite elementus čia)',
  'LBL_SUGAR_FIELDS_STAGE' => 'Sugar laukai (paspauskite elementus pridėti į staging area)',
  'LBL_SUGAR_BIN_STAGE' => 'Sugar Bin (paspauskite elementus pridėti į staging area)',
  'LBL_VIEW_SUGAR_FIELDS' => 'Rodyti Sugar laukus',
  'LBL_VIEW_SUGAR_BIN' => 'Rodyti Sugar Bin',
  'LBL_FAILED_TO_SAVE' => 'Nepavyko išsaugoti',
  'LBL_CONFIRM_UNSAVE' => 'Bet koks pakeitimai bus neišsaugoti. Ar tikrai norite tęsti?',
  'LBL_PUBLISHING' => 'Skelbiama ...',
  'LBL_PUBLISHED' => 'Paskelbta',
  'LBL_FAILED_PUBLISHED' => 'Nepavyko paskelbti',
  'LBL_DROP_HERE' => '[Mesti čia]',
  'LBL_NAME' => 'Pavadinimas',
  'LBL_LABEL' => 'Etiketė',
  'LBL_MASS_UPDATE' => 'Masinis atnaujinimas',
  'LBL_AUDITED' => 'Auditas',
  'LBL_CUSTOM_MODULE' => 'Modulis',
  'LBL_DEFAULT_VALUE' => 'Numatyta reikšmė',
  'LBL_REQUIRED' => 'Privalomas',
  'LBL_DATA_TYPE' => 'Tipas',
  'LBL_HISTORY' => 'Istorija',
  'LBL_SW_WELCOME' => '<h2>Sveiki!</h2><br> Ką norėtumėte daryti šiandien?<br><b> Prašome pasirinkti.</b>',
  'LBL_SW_EDIT_MODULE' => 'Redaguoti modulį',
  'LBL_SW_EDIT_DROPDOWNS' => 'Redaguoti iššokančius sąrašus',
  'LBL_SW_EDIT_TABS' => 'Konfigūruoti korteles',
  'LBL_SW_RENAME_TABS' => 'Pervadinti korteles',
  'LBL_SW_EDIT_GROUPTABS' => 'Nustatyti grupės korteles',
  'LBL_SW_EDIT_PORTAL' => 'Redaguoti portalą',
  'LBL_SW_EDIT_WORKFLOW' => 'Redaguoti darbo sekas',
  'LBL_SW_REPAIR_CUSTOMFIELDS' => 'Taisyti nestandartinius laukus',
  'LBL_SW_MIGRATE_CUSTOMFIELDS' => 'Perkelti nestandartinius laukus',
  'LBL_SMW_WELCOME' => '<h2>Sveiki!</h2><br><b>prašome pasirinkti modulį.',
  'LBL_SMA_WELCOME' => '<h2>Redaguoti modulį</h2>Ką norėtumėte daryti su šiuo moduliu?<br><b>Prašome pasirinkti kokį veiksmą norėtumėte atlikti.',
  'LBL_SMA_EDIT_CUSTOMFIELDS' => 'Redaguoti nestandartinius laukus',
  'LBL_SMA_EDIT_LAYOUT' => 'Redaguoti išdėstymą',
  'LBL_SMA_EDIT_LABELS' => 'Redaguoti etiketes',
  'LBL_MB_PREVIEW' => 'Peržiūra',
  'LBL_MB_RESTORE' => 'Atstatyti',
  'LBL_MB_DELETE' => 'Ištrinti',
  'LBL_MB_COMPARE' => 'Palyginti',
  'LBL_MB_WELCOME' => '<h2>Istorija</h2><br> Istorija leidžia peržiūrėti anksčiau darytus pakeitimus. Galite palyginti, atstatyti ankstesnes versijas. Jeigu atstatysite failą jis taps esamu darbiniu failu. Turite išdėstyti viską, kad kiti galėtų matyti.<br>ką norėtumėte daryti šiandien?<br><b> Prašome pasirinkti.</b>',
  'LBL_ED_CREATE_DROPDOWN' => 'Sukurti iššokantį sąrašą',
  'LBL_ED_WELCOME' => '<h2>Iššokančio sąrašo redaguotojas</h2><br><b> Galite redaguoti esamą arba sukurti naują iššokantį sąrašą.',
  'LBL_DROPDOWN_NAME' => 'Iššokančio sąrašo pavadinimas:',
  'LBL_DROPDOWN_LANGUAGE' => 'Iššokančio sąrašo kalba:',
  'LBL_TABGROUP_LANGUAGE' => 'Kalba:',
  'LBL_EC_WELCOME' => '<h2>Nestandartinio lauko redagavimas</h2><br><b>Galite redaguoti esamą arba sukurti naują lauką.',
  'LBL_EC_VIEW_CUSTOMFIELDS' => 'Rodyti nestandartinius laukus',
  'LBL_EC_CREATE_CUSTOMFIELD' => 'Sukurti nestandartinį lauką',
  'LBL_EC_CLEAR_CACHE' => 'Išvalyti kešą',
  'LBL_SM_WELCOME' => '<h2>Istorija</h2><br><b>Prašome pasirinkti failą peržiūrėjimui.</b>',
  'LBL_DD_DISPALYVALUE' => 'Rodyti reikšmę',
  'LBL_DD_DATABASEVALUE' => 'Duomenų bazės reikšmė',
  'LBL_DD_ALL' => 'Visi',
  'LBL_BTN_SAVE' => 'Saugoti',
  'LBL_BTN_SAVEPUBLISH' => 'Saugoti ir išdėstyti',
  'LBL_BTN_HISTORY' => 'Istorija',
  'LBL_BTN_NEXT' => 'Toliau',
  'LBL_BTN_BACK' => 'Atgal',
  'LBL_BTN_ADDCOLS' => 'Pridėti stulpelius',
  'LBL_BTN_ADDROWS' => 'Pridėti eilutes',
  'LBL_BTN_UNDO' => 'Atstatyti',
  'LBL_BTN_REDO' => 'Sutaisyti',
  'LBL_BTN_ADDCUSTOMFIELD' => 'Pridėti nestandartinį lauką',
  'LBL_BTN_TABINDEX' => 'Redaguoti tabuliatorius seką',
  'LBL_TAB_SUBTABS' => 'Subkortelės',
  'LBL_MODULES' => 'Moduliai',
  'LBL_MODULE_NAME' => 'Administratorius',
  'LBL_CONFIGURE_GROUP_TABS' => 'Konfigūruoti grupių korteles',
  'LBL_GROUP_TAB_WELCOME' => 'Grupės kortelės išdėstymas bus naudojamas, kai vartotojas pasirinks grupės kortelę vietoj nuolatinio modulio kortelės esantį Mano klientai.',
  'LBL_RENAME_TAB_WELCOME' => 'Kad pervadinti, paspauskite ant kortelės rodomos reikšmės.',
  'LBL_DELETE_MODULE' => 'Ištrinti modulį<br />iš&nbsp;grupės',
  'LBL_DISPLAY_OTHER_TAB_HELP' => 'Pasirinkite ar rodyti "Kitą" kortelę. Pagal nutylėjimą, "Kita" kortelė rodo visus modulius neįtrauktus į kitas korteles.',
  'LBL_TAB_GROUP_LANGUAGE_HELP' => 'Paspauskite Saugoti ir išdėstyti norėdami priskirti Grupių pavadinimus pasirinktai kalbai.',
  'LBL_ADD_GROUP' => 'Pridėti grupę',
  'LBL_NEW_GROUP' => 'Nauja grupė',
  'LBL_RENAME_TABS' => 'Pervadinti korteles',
  'LBL_DISPLAY_OTHER_TAB' => 'Rodyti \'Kita\' kortelę',
  'LBL_DEFAULT' => 'Numatytas',
  'LBL_ADDITIONAL' => 'Papildomas',
  'LBL_AVAILABLE' => 'Prieinamas',
  'LBL_LISTVIEW_DESCRIPTION' => 'Rodomi trys stulpeliai. Numatytas stulpelis  turi laukus, kurie parodyti numatytame sąraše, papildomi stulpeliai talpina laukus kuriuos vartotojas gali pasirinkti numatytam rodymui sukurti ir prieinami stulpeliai skirti administratoriui pridėti į numatytus arba papildomus  stulpelius, naudojamus vartotojų, kurie dabar nėra naudojami.',
  'LBL_LISTVIEW_EDIT' => 'Sąrašo formos redaguotas',
  'ERROR_ALREADY_EXISTS' => 'Klaida: Laukas jau egzistuoja',
  'ERROR_INVALID_KEY_VALUE' => 'Klaida: Neteisinga rakto reikšmė: [\']',
  'LBL_SW_SUGARPORTAL' => 'Sugar portalas',
  'LBL_SMP_WELCOME' => 'Prašome pasirinkite modulį kurį norite redaguoti',
  'LBL_SP_WELCOME' => 'Galite pasirinkti redaguoti modulį arba sinchronizuoti į portalą.<br> Pasirinkite iš sąrašo.',
  'LBL_SP_SYNC' => 'Portalo sinchronizavimas',
  'LBL_SYNCP_WELCOME' => 'Prašome įvesti portalo adresą, kurį norite siųsti ir spauskite mygtuką Eiti.<br> Jūsų paprašys įvesti prisijungimo vardą ir slaptažodį.<br> Įveskite Sugar prisijungimo vardą ir slaptažodį ir paspauskite Pradėti sinchronizaciją.',
  'LBL_LISTVIEWP_DESCRIPTION' => 'Yra du stulpeliai: Numatytieji, kurie bus rodomi ir prieinami, kiti - kurie nebus rodomi, bet gali būti pasirinkti rodymui. Tiesiog tempkite laukus tarp 2 stulpelių.',
  'LBL_SP_STYLESHEET' => 'Išsiųsti stiliaus lapą',
  'LBL_SP_UPLOADSTYLE' => 'Paspauskite mygtuką Naršyti ir pasirinkite stiliaus lapą išsiuntimui iš jūsų kompiuterio.<br> Kitą kartą sinchronizuojant portalas naudos stiliaus lapą.',
  'LBL_SP_UPLOADED' => 'Užkrauta',
  'ERROR_SP_UPLOADED' => 'Prašome pasitikrinti, kad Jūs keliate CSS failą.',
  'LBL_SP_PREVIEW' => 'CSS peržiūra',
);

