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
  'LBL_LIST_WHERE_FILTER' => 'Status',
  'LBL_WHERE_FILTER' => 'Status:',
  'LBL_RECORD' => 'Module',
  'LBL_TEAM' => 'Team',
  'LBL_ADDRESS_CC' => 'cc:',
  'LBL_ADDRESS_BCC' => 'bcc:',
  'LBL_ADDRESS_TYPE_TARGET' => 'type',
  'LBL_BLANK' => '',
  'LBL_MODULE_NAME' => 'Notificatie ontvanger lijst',
  'LBL_MODULE_TITLE' => 'Ontvangers: Start',
  'LBL_SEARCH_FORM_TITLE' => 'Workflow Ontvanger Zoeken',
  'LBL_LIST_FORM_TITLE' => 'Ontvanger Lijst',
  'LBL_NEW_FORM_TITLE' => 'Nieuwe Workflow Ontvanger',
  'LBL_LIST_USER_TYPE' => 'Type Gebruiker',
  'LBL_LIST_ARRAY_TYPE' => 'Type Actie',
  'LBL_LIST_RELATE_TYPE' => 'Type Relatie',
  'LBL_LIST_ADDRESS_TYPE' => 'Type adres',
  'LBL_LIST_FIELD_VALUE' => 'Gebruiker',
  'LBL_LIST_REL_MODULE1' => 'Gerelateerde Module',
  'LBL_LIST_REL_MODULE2' => 'Gerelateerde Gerelateerde Module',
  'LBL_USER_TYPE' => 'Type Gebruiker:',
  'LBL_ARRAY_TYPE' => 'Type Action:',
  'LBL_RELATE_TYPE' => 'Type Relatie:',
  'LBL_FIELD_VALUE' => 'Geselecteerde Gebruiker:',
  'LBL_REL_MODULE1' => 'Gerelateerde Module:',
  'LBL_REL_MODULE2' => 'Gerelateerde Gerelateerde Module',
  'LBL_CUSTOM_USER' => 'Aangepaste Gebruiker:',
  'LNK_NEW_WORKFLOW' => 'Nieuwe Workflow',
  'LNK_WORKFLOW' => 'Workflow Objecten',
  'LBL_LIST_STATEMENT' => 'Notificatie ontvanger :',
  'LBL_LIST_STATEMENT_CONTENT' => 'Stuur een notificatie naar de volgende ontvanger:',
  'LBL_ALERT_CURRENT_USER' => 'Een gebruiker geassocieerd met het doel',
  'LBL_ALERT_CURRENT_USER_TITLE' => 'Een gebruiker geassocieerd met de doelmodule',
  'LBL_ALERT_REL_USER' => 'Een gebruiker geassocieerd met een gerelateerde',
  'LBL_ALERT_REL_USER_TITLE' => 'Een gebruiker geassocieerd met een gerelateerde module',
  'LBL_ALERT_REL_USER_CUSTOM' => 'Ontvanger geassocieerd met een gerelateerde',
  'LBL_ALERT_REL_USER_CUSTOM_TITLE' => 'Ontvanger geassocieerd met een gerelateerde module',
  'LBL_ALERT_TRIG_USER_CUSTOM' => 'Ontvanger geassocieerd met de doelmodule',
  'LBL_ALERT_TRIG_USER_CUSTOM_TITLE' => 'Ontvanger geassocieerd met de doelmodule',
  'LBL_ALERT_SPECIFIC_USER' => 'Een Gespecificeerde',
  'LBL_ALERT_SPECIFIC_USER_TITLE' => 'Een Gespecificeerde gebruiker',
  'LBL_ALERT_SPECIFIC_TEAM' => 'Alle gebruikers binnen een gespecificeerde',
  'LBL_ALERT_SPECIFIC_TEAM_TITLE' => 'Alle gebruikers in een specifiiek team',
  'LBL_ALERT_SPECIFIC_ROLE' => 'Alle gebruikers in een specifiek',
  'LBL_ALERT_SPECIFIC_ROLE_TITLE' => 'Alle gebruikers in een specifieke rol',
  'LBL_ALERT_SPECIFIC_TEAM_TARGET_TITLE' => 'Leden van het team geassocieerd met de doelmodule',
  'LBL_ALERT_SPECIFIC_TEAM_TARGET' => 'Alle gebruikers behorende bij team(s) geassocieerd met de doelmodule.',
  'LBL_ALERT_LOGIN_USER_TITLE' => 'Ingelogde gebruiker op het moment van uitvoering',
  'LBL_USER' => 'Gebruiker',
  'LBL_USER_MANAGER' => 'gebruikers manager',
  'LBL_ROLE' => 'rol',
  'LBL_SEND_EMAIL' => 'Stuur een email naar:',
  'LBL_USER1' => 'die het record aangemaakt heeft',
  'LBL_USER2' => 'die het record het laatst gewijzigd heeft',
  'LBL_USER3' => 'Huidige',
  'LBL_USER3b' => 'van het systeem.',
  'LBL_USER4' => 'die het record is toegewezen',
  'LBL_USER5' => 'die het record was toegewezen.',
  'LBL_ADDRESS_TO' => 'Aan:',
  'LBL_ADDRESS_TYPE' => 'gebruik adres',
  'LBL_ALERT_REL1' => 'Gerelateerde Module:',
  'LBL_ALERT_REL2' => 'Gerelateerde Gerelateerde Module:',
  'LBL_NEXT_BUTTON' => 'Volgende',
  'LBL_PREVIOUS_BUTTON' => 'Vorige',
  'NTC_REMOVE_ALERT_USER' => 'Weet u zeker dat u deze notificatie-ontvanger wil verwijderen?',
  'LBL_REL_CUSTOM_STRING' => 'Selecteer aangepaste email en naam velden',
  'LBL_REL_CUSTOM' => 'Selecteer Aangepast E-mail veld:',
  'LBL_REL_CUSTOM2' => 'Veld',
  'LBL_AND' => 'en Naam veld:',
  'LBL_REL_CUSTOM3' => 'Veld',
  'LBL_FILTER_CUSTOM' => '(Aanvullende Filter) Filter gerelateerde module door specifieke',
  'LBL_FIELD' => 'Veld',
  'LBL_SPECIFIC_FIELD' => 'veld',
  'LBL_FILTER_BY' => '(Aanvullende Filter) Filter gerelateerde module door',
  'LBL_MODULE_NAME_INVITE' => 'Genodigde Lijst',
  'LBL_LIST_STATEMENT_INVITE' => 'Vergadering / Telefoongesprek Genodigden',
  'LBL_SELECT_VALUE' => 'U dient een geldige waarde te selecteren.',
  'LBL_SELECT_NAME' => 'U dient een aangepaste naam veld te kiezen',
  'LBL_SELECT_EMAIL' => 'U dient een aangepast emailveld te kiezen',
  'LBL_SELECT_FILTER' => 'U dient een veld te kiezen waarop gefilterd gaat worden',
  'LBL_SELECT_NAME_EMAIL' => 'U dient de naam en emailvelden te kiezen',
  'LBL_PLEASE_SELECT' => 'Selecteer a.u.b.',
);

