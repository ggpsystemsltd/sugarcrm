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
  'LBL_FROM_ADDRESS_HELP' => 'Quan s&#39;activa, el nom de l&#39;usuari assignar, i l&#39;adreça de correu electrònic s&#39;inclourà en el camp del correu electrònic. Aquesta característica podria no funcionar amb servidors SMTP que no permeten l&#39;enviament d&#39;un compte de correu electrònic diferent al compte del servidor.',
  'LBL_GMAIL_LOGO' => 'Gmail',
  'LBL_YAHOO_MAIL_LOGO' => 'Yahoo Mail',
  'LBL_EXCHANGE_LOGO' => 'Exchange',
  'LBL_HELP' => 'Ajuda',
  'LBL_ID' => 'Id',
  'LBL_MODULE_ID' => 'EmailMan',
  'LBL_NO' => 'No',
  'LBL_SEND_DATE_TIME' => 'Data de Tramesa',
  'LBL_IN_QUEUE' => 'En Cua?',
  'LBL_IN_QUEUE_DATE' => 'Data de posada en Cua',
  'ERR_INT_ONLY_EMAIL_PER_RUN' => 'Només es permeten valors sencers per el nombre de missatges enviats per lot',
  'LBL_ATTACHMENT_AUDIT' => 'ha estat enviat. No s´ha duplicat en local per minimitzar la utilització d´espai al disc dur.',
  'LBL_CONFIGURE_SETTINGS' => 'Configurar',
  'LBL_CUSTOM_LOCATION' => 'Definit per l´Usuari',
  'LBL_DEFAULT_LOCATION' => 'Per Defecte',
  'LBL_DISCLOSURE_TITLE' => 'Afegir Missatge sobre Confidencialitat de Contingut a Cada Correu',
  'LBL_DISCLOSURE_TEXT_TITLE' => 'Confidencialitat de Contingut',
  'LBL_DISCLOSURE_TEXT_SAMPLE' => 'AVÍS: Aquest missatge de correu és per a ús únic del destinatari(s) i pot contenir informació privada i confidencial. Queda prohibit qualsevol tipus de revisió, ús, revelació o distribució no autoritzada. Si vostè no és el destinatari previst, si us plau, destrueixi totes les còpies del missatge original i notifiqui el remitent de manera que puguem corregir la direcció de correu en el nostre registre. Gràcies.',
  'LBL_EMAIL_DEFAULT_CHARSET' => 'Redactar missatges de correu en aquest joc de caràcters',
  'LBL_EMAIL_DEFAULT_EDITOR' => 'Redactar correu fent servir aquest client',
  'LBL_EMAIL_DEFAULT_DELETE_ATTACHMENTS' => 'Esborrar arxius adjunts i Notes relacionades al costat dels Missatges esborrats',
  'LBL_EMAIL_GMAIL_DEFAULTS' => 'Omplir prèviament valors per defecte per a Gmail',
  'LBL_EMAIL_PER_RUN_REQ' => 'Nombre de Missatges enviats per lot',
  'LBL_EMAIL_SMTP_SSL' => 'Habilitar SMTP sobre SSL',
  'LBL_EMAIL_USER_TITLE' => 'Configuració per Defecte de Email per l&#39;Usuari',
  'LBL_EMAIL_OUTBOUND_CONFIGURATION' => 'Configuració de Correu Sortint',
  'LBL_EMAILS_PER_RUN' => 'Nombre de Missatges enviats per lot',
  'LBL_LIST_CAMPAIGN' => 'Campanya',
  'LBL_LIST_FORM_PROCESSED_TITLE' => 'Processats',
  'LBL_LIST_FORM_TITLE' => 'Cua',
  'LBL_LIST_FROM_EMAIL' => 'Correu del Remitent',
  'LBL_LIST_FROM_NAME' => 'Nom del Remitent',
  'LBL_LIST_IN_QUEUE' => 'En Procés',
  'LBL_LIST_MESSAGE_NAME' => 'Missatge de Màrqueting',
  'LBL_LIST_RECIPIENT_EMAIL' => 'Correu del Destinatari',
  'LBL_LIST_RECIPIENT_NAME' => 'Nom del Destinatari',
  'LBL_LIST_SEND_ATTEMPTS' => 'Intents de Tramesa',
  'LBL_LIST_SEND_DATE_TIME' => 'Enviar el',
  'LBL_LIST_USER_NAME' => 'Nom d´Usuari',
  'LBL_LOCATION_ONLY' => 'Ubicació',
  'LBL_LOCATION_TRACK' => 'Ubicació dels arxius de següiment de campanya (com campaign_tracker.php)',
  'LBL_CAMP_MESSAGE_COPY' => 'Guardar copies dels missatges de la campanya:',
  'LBL_CAMP_MESSAGE_COPY_DESC' => 'Desitja guardar còpies completes de <bold>CADA</bold> missatge de correu enviat durant totes les campanyes? <bold>Es recomana el valor per defecte de no fer-ho</bold>. Si elegeix no, només es guardarà la plantilla enviada i les variables per recrear el missatge individual.',
  'LBL_MAIL_SENDTYPE' => 'Agent de Transferència de Correu (MTA):',
  'LBL_MAIL_SMTPAUTH_REQ' => 'Usar Autentificació SMTP?',
  'LBL_MAIL_SMTPPASS' => 'Clau de pas SMTP:',
  'LBL_MAIL_SMTPPORT' => 'Port SMTP:',
  'LBL_MAIL_SMTPSERVER' => 'Servidor SMTP:',
  'LBL_MAIL_SMTPUSER' => 'Usuari SMTP:',
  'LBL_CHOOSE_EMAIL_PROVIDER' => 'Trii el seu proveïdor de Email:',
  'LBL_YAHOOMAIL_SMTPPASS' => 'Contrasenya de Yahoo! Mail:',
  'LBL_YAHOOMAIL_SMTPUSER' => 'ID de Yahoo! Mail:',
  'LBL_GMAIL_SMTPPASS' => 'Contrasenya de Gmail:',
  'LBL_GMAIL_SMTPUSER' => 'Direcció de Email de Gmail:',
  'LBL_EXCHANGE_SMTPPASS' => 'Contrasenya d	\\&#39; Exchange:',
  'LBL_EXCHANGE_SMTPUSER' => 'Nom d\\&#39;usuari d\\&#39; Exchange:',
  'LBL_EXCHANGE_SMTPPORT' => 'Port de servidor d\\&#39; Exchange:',
  'LBL_EXCHANGE_SMTPSERVER' => 'Servidor Exchange:',
  'LBL_EMAIL_LINK_TYPE' => 'Client de Correu',
  'LBL_EMAIL_LINK_TYPE_HELP' => '<b> Client de Correu Sugar:</b> Enviar correu utilitzant el client de correu de l&#39;aplicació Sugar. <br><b> Client de Correu Extern: </b> Enviar correu utilitzant un client de correu fora de l&#39;aplicació Sugar, com Microsoft Outlook.',
  'LBL_MARKETING_ID' => 'Id de Màrqueting',
  'LBL_MODULE_NAME' => 'Configuració de Correu',
  'LBL_CONFIGURE_CAMPAIGN_EMAIL_SETTINGS' => 'Configurar Opcions de Correu de la Campanya',
  'LBL_MODULE_TITLE' => 'Administració de Cua d´Email Sortint',
  'LBL_NOTIFICATION_ON_DESC' => 'Envia correus de notificació quan s´assignen registres.',
  'LBL_NOTIFY_FROMADDRESS' => 'Direcció remitent:',
  'LBL_NOTIFY_FROMNAME' => 'Nom remitent:',
  'LBL_NOTIFY_ON' => 'Activar notificacions?',
  'LBL_NOTIFY_SEND_BY_DEFAULT' => 'Enviar notificacions per defecte en usuaris nous?',
  'LBL_NOTIFY_TITLE' => 'Opcions de Notificació de Correu',
  'LBL_OLD_ID' => 'Id Antic',
  'LBL_OUTBOUND_EMAIL_TITLE' => 'Opcions de Correu Sortint',
  'LBL_RELATED_ID' => 'Id Relacionat',
  'LBL_RELATED_TYPE' => 'Tipus Relacionat',
  'LBL_SAVE_OUTBOUND_RAW' => 'Guardar els Missatges Sortints en format original',
  'LBL_SEARCH_FORM_PROCESSED_TITLE' => 'Recerca de Processats',
  'LBL_SEARCH_FORM_TITLE' => 'Recerca de Cues',
  'LBL_VIEW_PROCESSED_EMAILS' => 'Veure Correus Processats',
  'LBL_VIEW_QUEUED_EMAILS' => 'Veure Correus En Cua',
  'TRACKING_ENTRIES_LOCATION_DEFAULT_VALUE' => 'Valor en Config.php per site_url',
  'TXT_REMOVE_ME_ALT' => 'Per borrar la subscripció a aquesta llista de correu vagi a',
  'TXT_REMOVE_ME_CLICK' => 'faci clic aquí',
  'TXT_REMOVE_ME' => 'Per borrar la subscripció a aquesta llista de correu',
  'LBL_NOTIFY_SEND_FROM_ASSIGNING_USER' => 'Enviar notificació usant com a remitent la direcció d´email de l´usuari assignador?',
  'LBL_SECURITY_TITLE' => 'Configuració de Seguretat de Correu',
  'LBL_SECURITY_DESC' => 'Marqui allò que NO hauria de ser permès a Email entrant o mostrades en el mòdul d´Emails.',
  'LBL_SECURITY_APPLET' => 'Etiqueta Applet',
  'LBL_SECURITY_BASE' => 'Etiqueta Base',
  'LBL_SECURITY_EMBED' => 'Etiqueta Embed',
  'LBL_SECURITY_FORM' => 'Etiqueta Form',
  'LBL_SECURITY_FRAME' => 'Etiqueta Frame',
  'LBL_SECURITY_FRAMESET' => 'Etiqueta Frameset',
  'LBL_SECURITY_IFRAME' => 'Etiqueta iFrame',
  'LBL_SECURITY_IMPORT' => 'Etiqueta Import',
  'LBL_SECURITY_LAYER' => 'Etiqueta Layer',
  'LBL_SECURITY_LINK' => 'Etiqueta Link',
  'LBL_SECURITY_OBJECT' => 'Etiqueta Object',
  'LBL_SECURITY_OUTLOOK_DEFAULTS' => 'Seleccionar les precaucions mínimes de seguretat per defecte a Outlook (pot provocar errors en la visualització del contingut).',
  'LBL_SECURITY_SCRIPT' => 'Etiqueta Script',
  'LBL_SECURITY_STYLE' => 'Etiqueta Style',
  'LBL_SECURITY_TOGGLE_ALL' => 'Canviar Totes les Opcions',
  'LBL_SECURITY_XMP' => 'Etiqueta Xmp',
  'LBL_YES' => 'Sí',
  'LBL_PREPEND_TEST' => '[Prova]:',
  'LBL_SEND_ATTEMPTS' => 'Intents d´Enviament',
  'LBL_OUTGOING_SECTION_HELP' => 'Configurar el servidor de correu sortint per defecte per enviar notificacions de correu, incloent alertes de workflow.',
  'LBL_ALLOW_DEFAULT_SELECTION' => 'Permet als usuaris utilitzar aquest compte per a correu sortint:',
  'LBL_ALLOW_DEFAULT_SELECTION_HELP' => 'Quan aquesta opció està seleccionada, tots els usuaris podran enviar correus utilitzant el mateix compte de correu sortint per enviar notificacions del sistema i alertes. Si l&#39;opció no està seleccionada, els usuaris podran utilitzar el servidor de correu sortint un cop proporcionin la informació sobre el seu propi compte.',
);

