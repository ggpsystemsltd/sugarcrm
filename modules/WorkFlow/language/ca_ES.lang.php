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
  'LBL_MODULE_NAME' => 'Definicions de Workflow:',
  'LBL_MODULE_ID' => 'Workflow',
  'LBL_MODULE_TITLE' => 'Workflow: Inici',
  'LBL_SEARCH_FORM_TITLE' => 'Recerca de Workflows',
  'LBL_LIST_FORM_TITLE' => 'Llista de Workflows',
  'LBL_NEW_FORM_TITLE' => 'Crear Definició de Workflow',
  'LBL_LIST_NAME' => 'Nom',
  'LBL_LIST_TYPE' => 'Execució al:',
  'LBL_LIST_BASE_MODULE' => 'Mòdul Objectiu:',
  'LBL_LIST_STATUS' => 'Estat',
  'LBL_NAME' => 'Nom:',
  'LBL_DESCRIPTION' => 'Descripció:',
  'LBL_TYPE' => 'Execució al:',
  'LBL_STATUS' => 'Estat:',
  'LBL_BASE_MODULE' => 'Mòdul Objectiu:',
  'LBL_LIST_ORDER' => 'Ordre de Procés:',
  'LBL_FROM_NAME' => 'Nom del Remitent:',
  'LBL_FROM_ADDRESS' => 'Direcció del Remitent:',
  'LNK_NEW_WORKFLOW' => 'Crear Definició de Workflow',
  'LNK_WORKFLOW' => 'Llistar Definicions de Workflow',
  'LBL_ALERT_TEMPLATES' => 'Plantilles d´Alertes',
  'LBL_CREATE_ALERT_TEMPLATE' => 'Crear una plantilla d´alerta:',
  'LBL_SUBJECT' => 'Assumpte:',
  'LBL_RECORD_TYPE' => 'Aplica a:',
  'LBL_RELATED_MODULE' => 'Mòdul Relacionat:',
  'LBL_PROCESS_LIST' => 'Sequencia de Workflow',
  'LNK_ALERT_TEMPLATES' => 'Plantilles de Correus d´Alerta',
  'LNK_PROCESS_VIEW' => 'Sequencia de Workflow',
  'LBL_PROCESS_SELECT' => 'Si us plau, seleccioni un mòdul:',
  'LBL_LACK_OF_TRIGGER_ALERT' => 'Advertència: Ha de crear un disparador perquè funcioni aquest objecte de workflow',
  'LBL_LACK_OF_NOTIFICATIONS_ON' => 'Advertència: Per enviar alertes, ha d´habilitar les Notificacions a Admin > Configuració de Correu.',
  'LBL_FIRE_ORDER' => 'Ordre de Procés:',
  'LBL_RECIPIENTS' => 'Destinataris',
  'LBL_INVITEES' => 'Convidats',
  'LBL_INVITEE_NOTICE' => 'Atenció, ha de seleccionar almenys un convidat per crear això.',
  'NTC_REMOVE_ALERT' => 'Està segur que vol treure aquest workflow?',
  'LBL_EDIT_ALT_TEXT' => 'Text Alt',
  'LBL_INSERT' => 'Insertar',
  'LBL_SELECT_OPTION' => 'Si us plau, seleccioni una opció.',
  'LBL_SELECT_VALUE' => 'Te que seleccionar un valor.',
  'LBL_SELECT_MODULE' => 'Si us plau, seleccioni un mòdul relacionat.',
  'LBL_SELECT_FILTER' => 'Te que seleccionar un camp de filtrat per el mòdul relacionat.',
  'LBL_LIST_UP' => 'ar',
  'LBL_LIST_DN' => 'ab',
  'LBL_SET' => 'Establir',
  'LBL_AS' => 'com',
  'LBL_SHOW' => 'Mostrar',
  'LBL_HIDE' => 'Amagar',
  'LBL_SPECIFIC_FIELD' => 'camp especificat',
  'LBL_ANY_FIELD' => 'qualsevol camp',
  'LBL_LINK_RECORD' => 'Vincular amb Registre',
  'LBL_INVITE_LINK' => 'Enllaç de Convidats a Reunió/Trucada',
  'LBL_PLEASE_SELECT' => 'Si us plau, Seleccioni',
  'LBL_BODY' => 'Cos:',
  'LBL__S' => 's',
  'LBL_ALERT_SUBJECT' => 'ALERTA DE WORKFLOW',
  'LBL_ACTION_ERROR' => 'Aquesta acció no pot ser executat. Edita l&#39;acció perquè tots els camps i els valors de camp siguin vàlids.',
  'LBL_ACTION_ERRORS' => 'Avís: acció o accions a continuació contenen errors.',
  'LBL_ALERT_ERROR' => 'Aquesta alerta no es pot executar. Edita l&#39;alerta perquè tots els paràmetres siguin vàlids.',
  'LBL_ALERT_ERRORS' => 'Avís: Una o més alertes a continuació conté errors.',
  'LBL_TRIGGER_ERROR' => 'Avís: Aquest disparador conté valors no vàlids i no es dispara.',
  'LBL_TRIGGER_ERRORS' => 'Avís: Una o més factors desencadenants per sota conté errors.',
  'LBL_UP' => 'Adalt',
  'LBL_DOWN' => 'Abaix',
  'LBL_EDITLAYOUT' => 'Editar disseny',
);

