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


require_once('include/nusoap/nusoap.php');

/**
 * Plugin management
 * @api
 */
class SugarPlugins
{
    /**
     * @const URL of the Sugar plugin server
     */
    const SUGAR_PLUGIN_SERVER = 'http://www.sugarcrm.com/crm/plugin_service.php?wsdl';

    /**
     * Constructor
     *
     * Initializes the SOAP session
     */
	public function __construct()
	{
		$this->server = new nusoapclient(self::SUGAR_PLUGIN_SERVER, TRUE);
		if ($this->server->getError())
			$this->server=false;
		else
			$this->proxy = $this->server->getProxy();
	}

	/**
     * Returns an array of available plugins to download for this instance
     *
     * @return array
     */
	public function getPluginList()
	{
		$plugins = array();
		if(!$this->server)return $plugins;
		$result = $this->proxy->get_plugin_list($GLOBALS['license']->settings['license_key'], $GLOBALS['sugar_version']);
		if(!empty($result[0]['item'])){
			$plugins = $result[0]['item'];
		}
		return $plugins;
	}

	/**
     * Returns the download token for the given plugin
     *
     * @param  string $plugin_id
     * @return string token
     */
    protected function _getPluginDownloadToken(
	    $plugin_id
	    )
	{
		$plugins = array();
		if(!$this->server)return $plugins;
		$result = $this->proxy->get_plugin_token($GLOBALS['license']->settings['license_key'], $GLOBALS['current_user']->id, $plugin_id);
		return $result['token'];
	}

	/**
     * Downloads the plugin from Sugar using an HTTP redirect
     *
     * @param  string $plugin_id
     */
    public function downloadPlugin(
	    $plugin_id
	    )
	{
		$token = $this->_getPluginDownloadToken($plugin_id);
		ob_clean();
		SugarApplication::redirect('http://www.sugarcrm.com/crm/plugin_service.php?token=' . $token );
	}
}
