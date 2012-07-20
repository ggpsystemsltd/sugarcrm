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
  'LBL_NAME' => 'Nom d´usuari d&#39;aplicació',
  'LBL_OAUTH_SAVE_NOTICE' => 'Feu clic a <b>Connectar</b> per ser dirigit a una pàgina per proporcionar informació del seu compte i per autoritzar l&#39;accés al compte pel Sugar. Després de connectar, se li redirigeix ​​de tornada al Sugar.',
  'LBL_BASIC_SAVE_NOTICE' => 'Feu clic a <b>Connectar</b> per connectar-se a aquest compte de Sugar.',
  'LBL_ERR_FACEBOOK' => 'Facebook ha retornat un error, i l&#39;aliment no es pot mostrar.',
  'LBL_ERR_NO_RESPONSE' => 'S&#39;ha produït un error en intentar connectar-se a aquest compte.',
  'LBL_ERR_TWITTER' => 'Twitter ha donat un error, i no es pot mostrar.',
  'LBL_ERR_POPUPS_DISABLED' => 'Si us plau, activa les finestres del navegador emergent o afegir una excepció per al lloc web "{0}" a la llista d&#39;excepcions per poder connectar-se.',
  'LBL_ID' => 'ID',
  'LBL_PASSWORD' => 'App Password',
  'LBL_URL' => 'URL',
  'LBL_API_OAUTHTOKEN' => 'OAuth Token',
  'LBL_OAUTH_NAME' => '%s',
  'LBL_REAUTHENTICATE_LABEL' => 'Reauthenticate',
  'LBL_REAUTHENTICATE_KEY' => 'a',
  'LBL_ASSIGNED_TO_ID' => 'ID usuari assignat',
  'LBL_ASSIGNED_TO_NAME' => 'Usuari Sugar',
  'LBL_DATE_ENTERED' => 'Data de creació',
  'LBL_DATE_MODIFIED' => 'Data de modificació',
  'LBL_MODIFIED' => 'Modificat per',
  'LBL_MODIFIED_ID' => 'Modificat per Id',
  'LBL_MODIFIED_NAME' => 'Modificat per nom',
  'LBL_CREATED' => 'Creat per',
  'LBL_CREATED_ID' => 'Creat per Id',
  'LBL_DESCRIPTION' => 'Descripció',
  'LBL_DELETED' => 'Eliminat',
  'LBL_CREATED_USER' => 'Creat per usuari',
  'LBL_MODIFIED_USER' => 'Modificat per usuari',
  'LBL_LIST_NAME' => 'Nom',
  'LBL_TEAM' => 'Equips',
  'LBL_TEAMS' => 'Equips',
  'LBL_TEAM_ID' => 'Id d&#39;Equip',
  'LBL_LIST_FORM_TITLE' => 'Llista de comptes externes',
  'LBL_MODULE_NAME' => 'Comptes externes',
  'LBL_MODULE_TITLE' => 'Comptes externes',
  'LBL_HOMEPAGE_TITLE' => 'Les mevas Comptes externes',
  'LNK_NEW_RECORD' => 'Crea una compte externa',
  'LNK_LIST' => 'Veure comptes externes',
  'LNK_IMPORT_SUGAR_EAPM' => 'Importar comptes externes',
  'LBL_SEARCH_FORM_TITLE' => 'Recerca de comptes externes',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Veure històrial',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Activitats',
  'LBL_SUGAR_EAPM_SUBPANEL_TITLE' => 'Comptes externes',
  'LBL_NEW_FORM_TITLE' => 'Nova compte externa',
  'LBL_USER_NAME' => 'Nom d´Usuari App',
  'LBL_APPLICATION' => 'Aplicació',
  'LBL_API_DATA' => 'API de dades',
  'LBL_API_TYPE' => 'Tipus d&#39;inici de sessió',
  'LBL_API_CONSKEY' => 'Clau dels consumidors',
  'LBL_API_CONSSECRET' => 'Secret dels consumidors',
  'LBL_AUTH_UNSUPPORTED' => 'Aquest mètode d&#39;autorització no és compatible amb l&#39;aplicació',
  'LBL_AUTH_ERROR' => 'L&#39;intent de connectar amb el compte ha fallat.',
  'LBL_VALIDATED' => 'Connectat',
  'LBL_ACTIVE' => 'Actiu',
  'LBL_SUGAR_USER_NAME' => 'Usuari Sugar',
  'LBL_DISPLAY_PROPERTIES' => 'Propietats de pantalla',
  'LBL_CONNECT_BUTTON_TITLE' => 'Connectar',
  'LBL_NOTE' => 'Tingueu en compte que',
  'LBL_CONNECTED' => 'Connectat',
  'LBL_DISCONNECTED' => 'No connectat',
  'LBL_ERR_NO_AUTHINFO' => 'No hi ha informació d&#39;accés per aquest compte.',
  'LBL_ERR_NO_TOKEN' => 'No hi ha fitxes d&#39;inici de sessió vàlids per aquest compte.',
  'LBL_ERR_FAILED_QUICKCHECK' => 'No està connectat al seu compte {0}. Premeu D&#39;acord per accedir al seu compte i tornar a activar la connexió.',
  'LBL_MEET_NOW_BUTTON' => 'Reunir ara',
  'LBL_VIEW_LOTUS_LIVE_MEETINGS' => 'Veure propers LotusLive&trade; Meetings',
  'LBL_TITLE_LOTUS_LIVE_MEETINGS' => 'Propers LotusLive&trade; Meetings',
  'LBL_VIEW_LOTUS_LIVE_DOCUMENTS' => 'Veure LotusLive&trade; arxius',
  'LBL_TITLE_LOTUS_LIVE_DOCUMENTS' => 'LotusLive&trade; arxius',
  'LBL_APPLICATION_FOUND_NOTICE' => 'Un compte per a aquesta aplicació ja existeix. S&#39;ha restituït el compte existent.',
  'LBL_OMIT_URL' => '(Omet http:// o https://)',
);

