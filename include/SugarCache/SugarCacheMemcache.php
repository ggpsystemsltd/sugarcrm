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


require_once('include/SugarCache/SugarCacheAbstract.php');

class SugarCacheMemcache extends SugarCacheAbstract
{
    /**
     * @var Memcache server name string
     */
    protected $_host = '127.0.0.1';

    /**
     * @var Memcache server port int
     */
    protected $_port = 11211;

    /**
     * @var Memcache object
     */
    protected $_memcache = '';

    /**
     * @see SugarCacheAbstract::$_priority
     */
    protected $_priority = 900;

    /**
     * Minimal data size to be compressed
     * @var int
     */
    protected $min_compress = 512;
    /**
     * @see SugarCacheAbstract::useBackend()
     */
    public function useBackend()
    {
        if ( extension_loaded('memcache')
                && empty($GLOBALS['sugar_config']['external_cache_disabled_memcache'])
                && $this->_getMemcacheObject() )
            return true;

        return false;
    }

    /**
     * @see SugarCacheAbstract::__construct()
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get the memcache object; initialize if needed
     */
    protected function _getMemcacheObject()
    {
        if ( !($this->_memcache instanceOf Memcache) ) {
            $this->_memcache = new Memcache();
            $config = SugarConfig::getInstance();
            $this->_host = $config->get('external_cache.memcache.host', $this->_host);
            $this->_port = $config->get('external_cache.memcache.port', $this->_port);
            if ( !@$this->_memcache->connect($this->_host,$this->_port) ) {
                return false;
            }
            if($config->get('external_cache.memcache.disable_compression', false)) {
                $this->_memcache->setCompressThreshold($config->get('external_cache.memcache.min_compression', $this->min_compress));
            } else {
                $this->_memcache->setCompressThreshold(0);
            }
        }

        return $this->_memcache;
    }

    /**
     * @see SugarCacheAbstract::_setExternal()
     */
    protected function _setExternal(
        $key,
        $value
        )
    {
        $this->_getMemcacheObject()->set($key, $value, 0, $this->_expireTimeout);
    }

    /**
     * @see SugarCacheAbstract::_getExternal()
     */
    protected function _getExternal(
        $key
        )
    {
        $returnValue = $this->_getMemcacheObject()->get($key);
        if ( $returnValue === false ) {
            return null;
        }

        return $returnValue;
    }

    /**
     * @see SugarCacheAbstract::_clearExternal()
     */
    protected function _clearExternal(
        $key
        )
    {
        $this->_getMemcacheObject()->delete($key);
    }

    /**
     * @see SugarCacheAbstract::_resetExternal()
     */
    protected function _resetExternal()
    {
        $this->_getMemcacheObject()->flush();
    }
}
