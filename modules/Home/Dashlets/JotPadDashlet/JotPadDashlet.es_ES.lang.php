<?php

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

















if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');



$defaultText = 
<<<EOQ
<b>¡Bienvenido a Sugar 5.1!</b><br /><br />

Haga clic en <b>Mi Cuenta</b> para establecer sus preferencias.<br />
Haga clic en el icono con un <b>Interrogante</b> para acceder a la página de Ayuda de cada módulo.<br /><br />

Para obtener asistencia sobre cómo comenzar, haga clic en el enlace de <b>Formación</b> para más información sobre la oferta en formación de <b>Sugar University</b>.<br />
EOQ
;

$dashletStrings['JotPadDashlet'] = array('LBL_TITLE'            => 'JotPad',
                                         'LBL_DESCRIPTION'      => 'Un dashlet para guardar sus notas',
                                         'LBL_SAVING'           => 'Guardando JotPad ...',
                                         'LBL_SAVED'            => 'Guardado',
                                         'LBL_CONFIGURE_TITLE'  => 'Título',
                                         'LBL_CONFIGURE_HEIGHT' => 'Altura (1 - 300)',
                                         'LBL_DBLCLICK_HELP'    => 'Haga doble clic abajo para Editar.',
                                         'LBL_DEFAULT_TEXT'     => $defaultText, 
);
?>