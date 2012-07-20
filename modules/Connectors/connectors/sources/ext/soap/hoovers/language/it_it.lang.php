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
  'LBL_ID' => 'ID',
  'LBL_DUNS' => 'DUNS',
  'LBL_PARENT_DUNS' => 'Parent DUNS',
  'LBL_SYNOPSIS' => 'Synopsis',
  'hoovers_endpoint' => 'Endpoint URL',
  'hoovers_wsdl' => 'WSDL URL',
  'LBL_LICENSING_INFO' => '<table border="0" cellspacing="1"><tr><td valign="top" width="35%" class="dataLabel"><image src="modules/Connectors/connectors/sources/ext/soap/hoovers/images/hooversLogo.gif" border="0"></td><td width="65%" valign="top" class="dataLabel">Hoovers&#169; fornisce gratuitamente, agli utenti di SugarCRM, aggiornamenti su tutte le informazioni relative ad aziende. Per ottenere informazioni più dettagliate vai al sito <a href="http://www.hoovers.com" target="_blank">http://www.hoovers.com</a>.</td></tr></table>',
  'LBL_NAME' => 'Nome Azienda',
  'LBL_STREET' => 'Indirizzo',
  'LBL_ADDRESS_STREET1' => 'Indirizzo 1',
  'LBL_ADDRESS_STREET2' => 'Indirizzo 2',
  'LBL_CITY' => 'Comune',
  'LBL_STATE' => 'Provincia',
  'LBL_COUNTRY' => 'Nazione',
  'LBL_ZIP' => 'CAP',
  'LBL_FINSALES' => 'Vendite Annuali',
  'LBL_HQPHONE' => 'Telefono Ufficio',
  'LBL_TOTAL_EMPLOYEES' => 'Totale Dipendenti',
  'LBL_PRIMARY_URL' => 'URL Primario',
  'LBL_DESCRIPTION' => 'Descrizione',
  'LBL_LOCATION_TYPE' => 'Tipo Posizione',
  'LBL_COMPANY_TYPE' => 'Tipo Azienda',
  'ERROR_NULL_CLIENT' => 'Impossibile creare SoapClient per connettersi a Hoovers. Il servizio potrebbe essere non disponibile o la licenza potrebbe essere scaduta oppure hai raggiunto il limite di utilizzo giornaliero.',
  'ERROR_MISSING_SOAP_LIBRARIES' => 'Errore: Impossibile caricare le librerie SOAP (SoapClient, SoapHeader).',
  'hoovers_api_key' => 'Chiave API',
);

