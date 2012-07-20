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
  'LBL_ID' => 'ID broj',
  'LBL_LINK_TYPE_Link' => 'Link',
  'LBL_LINK_TYPE_YouTube' => 'YouTube&#153;',
  'LBL_TEAM' => 'Tim',
  'LBL_TEAM_ID' => 'ID broj tima',
  'LBL_ASSIGNED_TO_ID' => 'ID broj dodeljenog korisnika',
  'LBL_ASSIGNED_TO_NAME' => 'Dodeljeno',
  'LBL_DATE_ENTERED' => 'Datum kreiranja',
  'LBL_DATE_MODIFIED' => 'Datum izmene',
  'LBL_MODIFIED' => 'Promenio',
  'LBL_MODIFIED_ID' => 'ID broj korisnika koji je promenio',
  'LBL_MODIFIED_NAME' => 'Ime korisnika koji je promenio',
  'LBL_CREATED' => 'Autor',
  'LBL_CREATED_ID' => 'ID broj korisnika koji je kreirao',
  'LBL_DESCRIPTION' => 'Opis',
  'LBL_DELETED' => 'Obrisan',
  'LBL_NAME' => 'Naziv',
  'LBL_SAVING' => 'Čuvanje ...',
  'LBL_SAVED' => 'Sačuvano',
  'LBL_CREATED_USER' => 'Kreirao korisnik',
  'LBL_MODIFIED_USER' => 'Promenio korisnik',
  'LBL_LIST_FORM_TITLE' => 'Lista Sugar Feed-ova',
  'LBL_MODULE_NAME' => 'Tok aktivnosti',
  'LBL_MODULE_TITLE' => 'Tok aktivnosti',
  'LBL_DASHLET_DISABLED' => 'Upozorenje: Sugar-ov Feed sistem je onemogućen, novi feed unosi neće biti istaknuti dok se ne aktivira u sistemu.',
  'LBL_ADMIN_SETTINGS' => 'Podešavanja Sugar Feed-a',
  'LBL_RECORDS_DELETED' => 'Svi prethodni Sugar Feed unosi su uklonjeni, ako je Sugar Feed sistem is omogućen, novi unosi će biti generisani automatski.',
  'LBL_CONFIRM_DELETE_RECORDS' => 'Da li ste sigurni da želite da obrišete sve Sugar Feed unose?',
  'LBL_FLUSH_RECORDS' => 'Obrišite Feed unose',
  'LBL_ENABLE_FEED' => 'Omogući dašlet Moj tok aktivnosti',
  'LBL_ENABLE_MODULE_LIST' => 'Aktiviraj Feed-ove za',
  'LBL_HOMEPAGE_TITLE' => 'Moj tok aktivnosti',
  'LNK_NEW_RECORD' => 'Kreiraj Sugar Feed',
  'LNK_LIST' => 'Sugar Feed',
  'LBL_SEARCH_FORM_TITLE' => 'Pretraži Sugar Feed',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Istorija',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Aktivnosti',
  'LBL_SUGAR_FEED_SUBPANEL_TITLE' => 'Sugar Feed',
  'LBL_NEW_FORM_TITLE' => 'Novi Sugar Feed',
  'LBL_ALL' => 'Svi',
  'LBL_USER_FEED' => 'Korisnički Feed',
  'LBL_ENABLE_USER_FEED' => 'Aktiviraj Korisnički Feed',
  'LBL_TO' => 'Vidljivo timu',
  'LBL_IS' => 'je',
  'LBL_DONE' => 'Završeno',
  'LBL_TITLE' => 'Naslov',
  'LBL_ROWS' => 'Redovi',
  'LBL_MY_FAVORITES_ONLY' => 'Samo moji omiljeni',
  'LBL_ENABLE_EXTERNAL_CONNECTORS' => '<i>Napomena: Da bi ste omogućili korisnicima da vide Facebook i Twitter feed-ove, idite u podešavanja Konektora da bi ste podesili Facebook i Twitter konektore.</i>',
  'LBL_CATEGORIES' => 'Moduli',
  'LBL_TIME_LAST_WEEK' => 'Prošle nedelje',
  'LBL_TIME_WEEKS' => 'Nedelje',
  'LBL_TIME_DAYS' => 'Dana',
  'LBL_TIME_YESTERDAY' => 'Juče',
  'LBL_TIME_HOURS' => 'Sati',
  'LBL_TIME_HOUR' => 'Sati',
  'LBL_TIME_MINUTES' => 'Minuta',
  'LBL_TIME_MINUTE' => 'Minut',
  'LBL_TIME_SECONDS' => 'Sekundi',
  'LBL_TIME_SECOND' => 'Sekunda',
  'LBL_TIME_AGO' => 'pre',
  'CREATED_CONTACT' => 'kreirao <b>NOVI</b> kontakt',
  'CREATED_OPPORTUNITY' => 'je kreirao <b>NOVU</b> prodajnu priliku',
  'CREATED_CASE' => 'je kreirao <b>NOVI</b> slučaj',
  'CREATED_LEAD' => 'je kreirao <b>NOVOG</b> potencijalnog klijenta',
  'FOR' => 'za',
  'CLOSED_CASE' => 'je <b>ZATVORIO</b> slučaj',
  'CONVERTED_LEAD' => 'je <b>KONVERTOVAO</b> potencijalnog klijenta',
  'WON_OPPORTUNITY' => 'je <b>DOBIO</b> prodajnu priliku',
  'WITH' => 'sa',
  'LBL_LINK_TYPE_Image' => 'Slika',
  'LBL_SELECT' => 'Izaberi',
  'LBL_POST' => 'Pošalji',
  'LBL_EXTERNAL_PREFIX' => 'Spoljni:',
  'LBL_EXTERNAL_WARNING' => 'Artikli sa oznakom "spoljni" zahtevaju <a href="?module=EAPM">spoljni nalog</a>.',
  'LBL_AUTHENTICATE' => 'Poveži sa',
  'LBL_AUTHENTICATION_PENDING' => 'Nisu autorizovani svi spoljni računi koje ste izabrali. Kliknite na &#39;Otkaži&#39; za povratak na prozor Opcije za autentifikaciju spoljnih računa, ili kliknite &#39;OK&#39; da nastavite bez provere.',
);

