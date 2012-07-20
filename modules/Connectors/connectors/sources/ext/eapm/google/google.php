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


require_once('include/connectors/sources/default/source.php');

class ext_eapm_google extends source {
	protected $_enable_in_wizard = false;
	protected $_enable_in_hover = false;
	protected $_has_testing_enabled = false;
    protected $_gdClient = null;

    private function loadGdClient()
    {
        if($this->_gdClient == null)
        {
            $this->_eapm->getClient("contacts");
            $this->_gdClient = $this->_eapm->gdClient;
            $maxResults = $GLOBALS['sugar_config']['list_max_entries_per_page'];
            $this->_gdClient->setMaxResults($maxResults);
        }
    }

	public function getItem($args=array(), $module=null)
    {
        if( !isset($args['id']) )
            throw new Exception("Unable to return google contact entry with missing id.");
        
        $this->loadGdClient();

        $entry = FALSE;
        try
        {
            $entry = $this->_gdClient->getContactEntry( $args['id'] );
        }
        catch(Zend_Gdata_App_HttpException $e)
        {
            $GLOBALS['log']->fatal("Received exception while trying to retrieve google contact item:" .  $e->getResponse());
        }
        catch(Exception $e)
        {
            $GLOBALS['log']->fatal("Unable to retrieve single item " . var_export($e, TRUE));
        }

        return $entry;

    }
	public function getList($args=array(), $module=null)
    {
        $feed = FALSE;
        $this->loadGdClient();

        if( !empty($args['maxResults']) )
        {
            $this->_gdClient->setMaxResults($args['maxResults']);
        }

        if( !empty($args['startIndex']) )
        {
            $this->_gdClient->setStartIndex($args['startIndex']);
        }

        $results = array('totalResults' => 0, 'records' => array());
        try
        {
            $feed = $this->_gdClient->getContactListFeed($args);
            $results['totalResults'] = $feed->totalResults->getText();

            $rows = array();
            foreach ($feed->entries as $entry)
            {
                $rows[] = $entry->toArray();
            }
            $results['records'] = $rows;
        }
        catch(Zend_Gdata_App_HttpException $e)
        {
            $GLOBALS['log']->fatal("Received exception while trying to retrieve google contact list:" .  $e->getResponse());
        }
        catch(Exception $e)
        {
            $GLOBALS['log']->fatal("Unable to retrieve item list for google contact connector.");
        }

        return $results;
    }
}
