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
  'LBL_CONNECT_BUTTON_TITLE' => 'Koble til',
  'LBL_NOTE' => 'Notat',
  'LBL_CONNECTED' => 'Koblet til',
  'LBL_DISCONNECTED' => 'Ikke koblet til',
  'LBL_ERR_POPUPS_DISABLED' => 'Vennligst aktiver nettleser popup vinduer eller legge til et unntak for nettsted "{0}" til unntakslisten for å koble til.',
  'LBL_ID' => 'ID',
  'LBL_URL' => 'URL',
  'LBL_API_DATA' => 'API Data',
  'LBL_API_TYPE' => 'Login Type',
  'LBL_API_CONSKEY' => 'Consumer Key',
  'LBL_API_CONSSECRET' => 'Consumer Secret',
  'LBL_API_OAUTHTOKEN' => 'OAuth Token',
  'LBL_OAUTH_NAME' => '%s',
  'LBL_REAUTHENTICATE_KEY' => 'a',
  'LBL_ASSIGNED_TO_ID' => 'Tildelt bruker ID',
  'LBL_ASSIGNED_TO_NAME' => 'Sugar Bruker',
  'LBL_DATE_ENTERED' => 'Opprettet dato',
  'LBL_DATE_MODIFIED' => 'Endret dato',
  'LBL_MODIFIED' => 'Endret av',
  'LBL_MODIFIED_ID' => 'Endret av ID',
  'LBL_MODIFIED_NAME' => 'Endret av navn',
  'LBL_CREATED' => 'Opprettet av',
  'LBL_CREATED_ID' => 'Opprettet av ID',
  'LBL_DESCRIPTION' => 'Beskrivelse',
  'LBL_DELETED' => 'Slettet',
  'LBL_NAME' => 'App Brukernavn',
  'LBL_CREATED_USER' => 'Opprettet bruker',
  'LBL_MODIFIED_USER' => 'Endret bruker',
  'LBL_LIST_NAME' => 'Navn',
  'LBL_TEAM' => 'Team',
  'LBL_TEAMS' => 'Team',
  'LBL_TEAM_ID' => 'Team ID',
  'LBL_LIST_FORM_TITLE' => 'Ekstern konto liste',
  'LBL_MODULE_NAME' => 'Ekstern konto',
  'LBL_MODULE_TITLE' => 'Eksterne konto',
  'LBL_HOMEPAGE_TITLE' => 'Mine eksterne konto',
  'LNK_NEW_RECORD' => 'Opprett ekstern konto',
  'LNK_LIST' => 'Se eksterne konto',
  'LNK_IMPORT_SUGAR_EAPM' => 'Importer eksterne konto',
  'LBL_SEARCH_FORM_TITLE' => 'Søk ekstern kilde',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Se historikk',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Aktiviteter',
  'LBL_SUGAR_EAPM_SUBPANEL_TITLE' => 'Eksterne konto',
  'LBL_NEW_FORM_TITLE' => 'Ny ekstern konto',
  'LBL_PASSWORD' => 'App passord',
  'LBL_USER_NAME' => 'App brukernavn',
  'LBL_APPLICATION' => 'Applikasjon',
  'LBL_AUTH_UNSUPPORTED' => 'Denne fullmakts-metoden er ikke støttet av programmet',
  'LBL_AUTH_ERROR' => 'Forsøk på å godkjenne den eksterne kontoen mislyktes.',
  'LBL_VALIDATED' => 'Access validert',
  'LBL_ACTIVE' => 'Aktiv',
  'LBL_SUGAR_USER_NAME' => 'Sugar bruker',
  'LBL_DISPLAY_PROPERTIES' => 'Vis egenskaper',
  'LBL_ERR_NO_AUTHINFO' => 'Det er ingen authentication informasjon for denne kontoen.',
  'LBL_ERR_NO_TOKEN' => 'Det er ingen gyldig brukernavn tegn for denne kontoen.',
  'LBL_ERR_FAILED_QUICKCHECK' => 'Du er ikke logget inn på din {0}-konto. Klikk OK for å re-logge på kontoen din og aktivere den eksterne konto-posten.',
  'LBL_MEET_NOW_BUTTON' => 'Møt nå',
  'LBL_VIEW_LOTUS_LIVE_MEETINGS' => 'Vis kommende LotusLive ™ Møter',
  'LBL_TITLE_LOTUS_LIVE_MEETINGS' => 'Kommende LotusLive ™ Møter',
  'LBL_VIEW_LOTUS_LIVE_DOCUMENTS' => 'Vis LotusLive ™ dokumenter',
  'LBL_TITLE_LOTUS_LIVE_DOCUMENTS' => 'LotusLive ™ dokumenter',
  'LBL_REAUTHENTICATE_LABEL' => 'Regodkjenne',
  'LBL_APPLICATION_FOUND_NOTICE' => 'En konto for denne applikasjonen finnes allerede. Vi har gjenopprettet den eksisterende kontoen.',
  'LBL_OMIT_URL' => '(Utelat http:// eller https://)',
  'LBL_OAUTH_SAVE_NOTICE' => 'Klikk Lagre for å opprette den eksterne kontoen. Du vil få en ny side for å oppgi kontoinformasjon og autorisere tilgang fra Sugar. Når du har registrert kontoinformasjonen vil du bli sendt tilbake til SugarCRM.',
  'LBL_BASIC_SAVE_NOTICE' => 'Klikk Lagre for å opprette den eksterne kontoen. Sugar vil da bekrefte legitimasjonen din.',
  'LBL_ERR_FACEBOOK' => 'Facebook returnerte en feil, og "feed" kan ikke vises.',
  'LBL_ERR_NO_RESPONSE' => 'En feil oppstod ved forsøk på å lagre til den eksterne kontoen.',
  'LBL_ERR_TWITTER' => 'Twitter returnerte en feil, og "feed" kan ikke vises.',
);

