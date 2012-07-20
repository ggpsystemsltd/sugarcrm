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



$connector_strings = array (
        'LBL_LICENSING_INFO' => '<table border="0" cellspacing="1"><tr><td valign="top" width="35%" class="dataLabel"><image src="' . getWebPath('modules/Connectors/connectors/sources/ext/rest/zoominfocompany/images/zoominfo.gif') . '" border="0"></td><td width="65%" valign="top" class="dataLabel">' .
                            'ZoomInfo&#169; provee extensa información sobre 45 millones de gente de negocio en unas 5 millones de compañías.  Sepa más.  <a target="_blank" href="http://www.zoominfo.com/about">http://www.zoominfo.com/about</a></td></tr></table>',    
    
    'LBL_SEARCH_FIELDS_INFO' => 'Los siguientes campos están soportados por el API de Zoominfo&#169; para Compañías: Nombre de Compañía, Ciudad, Estado/Provincia y País.',
        
    
    	'LBL_COMPANY_ID' => 'ID',
	'LBL_COMPANY_NAME' => 'Nombre de Compañía',
    'LBL_STREET' => 'Calle',
	'LBL_CITY' => 'Ciudad',
	'LBL_ZIP' => 'Código Postal',
	'LBL_STATE' => 'Estado/Provincia',
	'LBL_COUNTRY' => 'País',
	'LBL_INDUSTRY' => 'Industria',
	'LBL_WEBSITE' => 'Sitio Web',
	'LBL_DESCRIPTION' => 'Descripción',
    'LBL_PHONE' => 'Teléfono',
	'LBL_COMPANY_TICKER' => 'Ticker de la Compañía',
	'LBL_ZOOMINFO_COMPANY_URL' => 'URL con el Perfil de la Compañía',
	'LBL_REVENUE' => 'Volumen de Negocio Anual',
	'LBL_EMPLOYEES' => 'Empleados',

		'company_search_url' => 'URL de Búsqueda de Compañía',
	'company_detail_url' => 'URL de Detalle de Compañía',
    'partner_code' => 'Código del API del Partner',
	'api_key' => 'CLAVE API',
	
		'ERROR_LBL_CONNECTION_PROBLEM' => 'Error: No ha sido posible realizar la conexión al servidor de Zoominfo - Conector para compañías.',
);

?>
