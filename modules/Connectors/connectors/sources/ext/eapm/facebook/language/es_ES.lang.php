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

	

$connector_strings = array (
  'LBL_LICENSING_INFO' => '<table border="0" cellspacing="1"><tr><td valign="top" width="35%" class="dataLabel">Obtener una clave de API y el código secreto de Facebook&#169; para crear una aplicación en la instancia de Sugar.<br/><br>Pasos para crear una aplicación para la instancia:<br/><br/><ol><li>Ir a la siguiente URL de Facebook&#169; para crear la aplicación: <a href=&#39;http://www.facebook.com/developers/createapp.php&#39; target=&#39;_blank&#39;>http://www.facebook.com/developers/createapp.php</a>.</li><li>Iniciar sesión en Facebook&#169; utilizando la cuenta con la que desea crear la aplicación.</li><li>Dentro de la "creación de aplicaciones" de la página, escriba un nombre para la aplicación. Este es el nombre que verán los usuarios cuando se autentican las cuentas de Facebook&#169; dentro de Sugar.</li><li>Seleccione "Aceptar" para aceptar los términos Facebook&#169;.</li><li>Haz clic en "Crear aplicación"</li><li>Introducir y enviar las palabras de seguridad para pasar los controles de seguridad.</li><li>Dentro de la página de su solicitud, vaya a la zona "Web"(enlace en el menú de la izquierda) e introduzca la URL local de la instancia de Sugar para "URL del sitio."</li><li>Haz clic en "Guardar cambios"</li><li>Ir a la pagina de  "Intragración de Facebook" (enlace en el menú de la izquierda) y encontra la clave del API y el código secreto de la aplicación. Introduzca el identificador de la aplicación y el código secreto de la aplicación a continuación.</li></ol></td></tr></table>',
  'oauth_consumer_key' => 'Clave API',
  'oauth_consumer_secret' => 'Código secreto',
);

