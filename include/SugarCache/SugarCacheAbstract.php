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


/**
 * Abstract cache class
 * @api
 */
abstract class SugarCacheAbstract
{
    /**
     * @var set to false if you don't want to use the local store, true by default.
     */
    public $useLocalStore = true;

    /**
     * @var timeout in seconds used for cache item expiration
     */
    protected $_expireTimeout = 300;

    /**
     * @var prefix to use for all cache key entries
     */
    protected $_keyPrefix = 'sugarcrm_';

    /**
     * @var stores locally any cached items so we don't have to hit the external cache as much
     */
    protected $_localStore = array();

    /**
     * @var records the number of get requests made against the cache
     */
    protected $_cacheRequests = 0;

    /**
     * @var records the number of hits made against the cache that have been resolved without hitting the
     * external cache
     */
    protected $_cacheLocalHits = 0;

    /**
     * @var records the number of hits made against the cache that are resolved using the external cache
     */
    protected $_cacheExternalHits = 0;

    /**
     * @var records the number of get requests that aren't in the cache
     */
    protected $_cacheMisses = 0;

    /**
     * @var indicates the priority level for using this cache; the lower number indicates the highest
     * priority ( 1 would be the highest priority, but we should never ship a backend with this number
     * so we don't bump out custom backends. ) Shipping backends use priorities in the range of 900-999.
     */
    protected $_priority = 899;

    /**
     * Constructor
     */
    public function __construct()
    {
        if ( isset($GLOBALS['sugar_config']['cache_expire_timeout']) )
            $this->_expireTimeout = $GLOBALS['sugar_config']['cache_expire_timeout'];
        if ( isset($GLOBALS['sugar_config']['unique_key']) )
            $this->_keyPrefix = $GLOBALS['sugar_config']['unique_key'];
    }

    /**
     * Destructor
     */
    public function __destruct()
    {
    }

    /**
     * PHP's magic __get() method, used here for getting the current value from the cache.
     *
     * @param  string $key
     * @return mixed
     */
    public function __get(
        $key
        )
    {
        if ( SugarCache::$isCacheReset )
            return null;

        $this->_cacheRequests++;
        if ( !$this->useLocalStore || !isset($this->_localStore[$key]) ) {
            $this->_localStore[$key] = $this->_getExternal($this->_keyPrefix.$key);
            if ( isset($this->_localStore[$key]) ) {
                $this->_cacheExternalHits++;
            }
            else {
                $this->_cacheMisses++;
            }
        }
        elseif ( isset($this->_localStore[$key]) ) {
            $this->_cacheLocalHits++;
        }

        if ( isset($this->_localStore[$key]) ) {
            return $this->_localStore[$key];
        }

        return null;
    }

    /**
     * PHP's magic __set() method, used here for setting a value for a key in the cache.
     *
     * @param  string $key
     * @return mixed
     */
    public function __set(
        $key,
        $value
        )
    {
        if ( is_null($value) ) {
            $value = SugarCache::EXTERNAL_CACHE_NULL_VALUE;
        }

        if ( $this->useLocalStore ) {
            $this->_localStore[$key] = $value;
        }
        $this->_setExternal($this->_keyPrefix.$key,$value);
    }

    /**
     * PHP's magic __isset() method, used here for checking for a key in the cache.
     *
     * @param  string $key
     * @return mixed
     */
    public function __isset(
        $key
        )
    {
        return !is_null($this->__get($key));
    }

    /**
     * PHP's magic __unset() method, used here for clearing a key in the cache.
     *
     * @param  string $key
     * @return mixed
     */
    public function __unset(
        $key
        )
    {
        unset($this->_localStore[$key]);
        $this->_clearExternal($this->_keyPrefix.$key);
    }

    /**
     * Reset the cache for this request
     */
    public function reset()
    {
        $this->_localStore = array();
        SugarCache::$isCacheReset = true;
    }

    /**
     * Reset the cache fully
     */
    public function resetFull()
    {
        $this->reset();
        $this->_resetExternal();
    }

    /**
     * Flush the contents of the cache
     */
    public function flush()
    {
        $this->_localStore = array();
        $this->_resetExternal();
    }

    /**
     * Returns the number of cache hits made
     *
     * @return array assocative array with each key have the value
     */
    public function getCacheStats()
    {
        return array(
            'requests'     => $this->_cacheRequests,
            'externalHits' => $this->_cacheExternalHits,
            'localHits'    => $this->_cacheLocalHits,
            'misses'       => $this->_cacheMisses,
            );
    }

    /**
     * Returns what backend is used for caching, uses normalized class name for lookup
     *
     * @return string
     */
    public function __toString()
    {
        return strtolower(str_replace('SugarCache','',get_class($this)));
    }

    /**
     * Hook for the child implementations of the individual backends to provide thier own logic for
     * setting a value from cache
     *
     * @param string $key
     * @param mixed  $value
     */
    abstract protected function _setExternal(
        $key,
        $value
        );

    /**
     * Hook for the child implementations of the individual backends to provide thier own logic for
     * getting a value from cache
     *
     * @param  string $key
     * @return mixed  $value, returns null if the key is not in the cache
     */
    abstract protected function _getExternal(
        $key
        );

    /**
     * Hook for the child implementations of the individual backends to provide thier own logic for
     * clearing a value out of thier cache
     *
     * @param string $key
     */
    abstract protected function _clearExternal(
        $key
        );

    /**
     * Hook for the child implementations of the individual backends to provide thier own logic for
     * clearing thier cache out fully
     */
    abstract protected function _resetExternal();

    /**
     * Hook for testing if the backend should be used or not. Typically we'll extend this for backend specific
     * checks as well.
     *
     * @return boolean true if we can use the backend, false if not
     */
    public function useBackend()
    {
        if ( !empty($GLOBALS['sugar_config']['external_cache_disabled'])
                && $GLOBALS['sugar_config']['external_cache_disabled'] == true ) {
            return false;
        }

        if (defined('SUGARCRM_IS_INSTALLING')) {
            return false;
        }

        if ( isset($GLOBALS['sugar_config']['external_cache_force_backend'])
                && ( $GLOBALS['sugar_config']['external_cache_force_backend'] != (string) $this ) ) {
            return false;
        }

        return true;
    }

    /**
     * Returns the priority level for this backend
     *
     * @see self::$_priority
     *
     * @return int
     */
    public function getPriority()
    {
        return $this->_priority;
    }
}
