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
  'LBL_MODULE_NAME' => 'Darbo sekų apibrėžimai',
  'LBL_MODULE_ID' => 'Darbo sekos',
  'LBL_MODULE_TITLE' => 'Darbo sekos: Pradžia',
  'LBL_SEARCH_FORM_TITLE' => 'Darbo sekos paieška',
  'LBL_LIST_FORM_TITLE' => 'Darbo sekų sąrašas',
  'LBL_NEW_FORM_TITLE' => 'Sukurti darbo sekos apibrėžimą',
  'LBL_LIST_NAME' => 'Pavadinimas',
  'LBL_LIST_TYPE' => 'Vykdoma kai:',
  'LBL_LIST_BASE_MODULE' => 'Tikslinis modulis:',
  'LBL_LIST_STATUS' => 'Statusas',
  'LBL_NAME' => 'Pavadinimas',
  'LBL_DESCRIPTION' => 'Aprašymas',
  'LBL_TYPE' => 'Vykdoma kai:',
  'LBL_STATUS' => 'Statusas:',
  'LBL_BASE_MODULE' => 'Tikslinis modulis:',
  'LBL_LIST_ORDER' => 'Vykdymo seka:',
  'LBL_FROM_NAME' => 'Siuntėjo vardas:',
  'LBL_FROM_ADDRESS' => 'Siuntėjo adresas',
  'LNK_NEW_WORKFLOW' => 'Sukurti darbo sekos apibrėžimą',
  'LNK_WORKFLOW' => 'Darbo sekos apibrėžimai',
  'LBL_ALERT_TEMPLATES' => 'Įspėjimų šablonai',
  'LBL_CREATE_ALERT_TEMPLATE' => 'Sukurti įspėjimų šabloną',
  'LBL_SUBJECT' => 'Tema:',
  'LBL_RECORD_TYPE' => 'Taikoma:',
  'LBL_RELATED_MODULE' => 'Susijęs modulis:',
  'LBL_PROCESS_LIST' => 'Darbo sekos',
  'LNK_ALERT_TEMPLATES' => 'Įspėjimų šablonai',
  'LNK_PROCESS_VIEW' => 'Darbo sekos',
  'LBL_PROCESS_SELECT' => 'Prašome pasirinkti modulį:',
  'LBL_LACK_OF_TRIGGER_ALERT' => 'Perspėjimas: Jūs turite sukurti trigerį, kad ši darbo seka galėtų veikti',
  'LBL_LACK_OF_NOTIFICATIONS_ON' => 'Perspėjimas: Kad siųsti įspėjimus, nurodykite SMTP serverio duomenis Administratorius > Pašto nustatymai',
  'LBL_FIRE_ORDER' => 'Vykdymo seka:',
  'LBL_RECIPIENTS' => 'Gavėjai',
  'LBL_INVITEES' => 'Dalyviai',
  'LBL_INVITEE_NOTICE' => 'Dėmesio, Jūs turite pasirinkti bent vieną dalyvį, kad tai galėtumėte sukurti.',
  'NTC_REMOVE_ALERT' => 'Ar Jūs tikrai norite išimti šią darbo seką?',
  'LBL_EDIT_ALT_TEXT' => 'Alt tekstas',
  'LBL_INSERT' => 'Įdėti',
  'LBL_SELECT_OPTION' => 'Prašome pasirinkti.',
  'LBL_SELECT_VALUE' => 'Prašome pasirinkti reikšmę.',
  'LBL_SELECT_MODULE' => 'Pasirinkti susijusį modulį.',
  'LBL_SELECT_FILTER' => 'Nurodykite lauką, pagal kurį filtruoti susijusį modulį.',
  'LBL_LIST_UP' => 'aukštyn',
  'LBL_LIST_DN' => 'žemyn',
  'LBL_SET' => 'Grupė',
  'LBL_AS' => 'kaip',
  'LBL_SHOW' => 'Rodyti',
  'LBL_HIDE' => 'Paslėpti',
  'LBL_SPECIFIC_FIELD' => 'specifinis laukas',
  'LBL_ANY_FIELD' => 'bet koks laukas',
  'LBL_LINK_RECORD' => 'Susieti su įrašu',
  'LBL_INVITE_LINK' => 'Susitikimo/Skambučio pakvietimo nuoroda',
  'LBL_PLEASE_SELECT' => 'Prašome pasirinkti',
  'LBL_BODY' => 'Turinys:',
  'LBL__S' => '\'',
  'LBL_ALERT_SUBJECT' => 'DARBO SEKOS ĮSPĖJIMAS',
  'LBL_ACTION_ERROR' => 'Šis veiksmas negali būti įvykdomas. Pakoreguokite veiksmą, kad jo visi laukai ir laukų reikšmės būtų teisingos.',
  'LBL_ACTION_ERRORS' => 'Įspėjimas: Žemiau vienas ar daugiau veiksmų turi klaidų.',
  'LBL_ALERT_ERROR' => 'Šis įspėjimas negali būti įvykdomas. Pakoreguokite įspėjimą, kad visi nustatymai būtų teisingi.',
  'LBL_ALERT_ERRORS' => 'Dėmesio: Žemiau vienas ar daugiau įspėjimų turi klaidų.',
  'LBL_TRIGGER_ERROR' => 'Įspėjimas: Šis trigeris turi neteisingų reikšmių ir nesuveiks.',
  'LBL_TRIGGER_ERRORS' => 'Įspėjimas: Žemiau vienas ar daugiau trigerių turi klaidų.',
);

