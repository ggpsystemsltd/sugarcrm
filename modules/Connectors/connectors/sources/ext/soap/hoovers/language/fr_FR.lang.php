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
    
    'LBL_LICENSING_INFO' => '<table border="0" cellspacing="1"><tr><td valign="top" width="35%" class="dataLabel"><image src="' . getWebPath('modules/Connectors/connectors/sources/ext/soap/hoovers/images/hooversLogo.gif') . '" border="0"></td><td width="65%" valign="top" class="dataLabel">' .
                            'Hoovers&#169; fournit des données à jour gratuitement sur les sociétés pour les utilisateurs des produits SugarCRM. Pour avoir plus d\'information et de rapports sur les sociétés, et autres établissements aller sur <a href="http://www.hoovers.com" target="_blank">http://www.hoovers.com</a>.</td></tr></table>',    
    
        'LBL_SEARCH_FIELDS_INFO' => 'Les champs supportés par l&#39;API Hoovers sont : Nom de la société, Ville, Etat, Pays et Code postal.',
    
    	'LBL_ID' => 'ID',
	'LBL_NAME' => 'Nom de la société',
	'LBL_DUNS' => 'DUNS',
	'LBL_PARENT_DUNS' => 'DUNS Parent',	
	'LBL_STREET' => 'Adresse',
	'LBL_ADDRESS_STREET1' => 'Adresse Rue 1',
	'LBL_ADDRESS_STREET2' => 'Adresse Rue 2',	
	'LBL_CITY' => 'Ville',
	'LBL_STATE' => 'Etat',
	'LBL_COUNTRY' => 'Pays',
	'LBL_ZIP' => 'Code Postal',
	'LBL_FINSALES' => 'CA Annuel',
	'LBL_SALES' => 'CA Annuel',
	'LBL_HQPHONE' => 'Téléphone',
    	'LBL_TOTAL_EMPLOYEES' => 'Nombre Employés',
	'LBL_PRIMARY_URL' => 'Site Web',
	'LBL_DESCRIPTION' => 'Description',
	'LBL_SYNOPSIS' => 'Synopsis',	
	'LBL_LOCATION_TYPE' => 'Type de localisation',
	'LBL_COMPANY_TYPE' => 'Type de société',
	
	    	'ERROR_NULL_CLIENT' => 'Impossible de créer le client SOAP pour se connecter à Hoovers. Le service doit être indisponible ou votre licence à expiré ou bien vous avez atteint la limite du nombre de requête par jour autorisée.',
    	'ERROR_MISSING_SOAP_LIBRARIES' => 'Erreur : Impossible de charger la librairie SOAP (SoapClient, SoapHeader).',

		'hoovers_endpoint' => 'URL du Web Service',
	'hoovers_wsdl' => 'URL de la WSDL',
	'hoovers_api_key' => 'Clé API',
);

?>

