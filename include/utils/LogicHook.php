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


/**
 * Predefined logic hooks
 * after_ui_frame
 * after_ui_footer
 * after_save
 * before_save
 * before_retrieve
 * after_retrieve
 * process_record
 * before_delete
 * after_delete
 * before_restore
 * after_restore
 * server_roundtrip
 * before_logout
 * after_logout
 * before_login
 * after_login
 * login_failed
 * after_session_start
 * after_entry_point
 *
 * @api
 */
class LogicHook{

	var $bean = null;

	function LogicHook(){
	}

	/**
	 * Static Function which returns and instance of LogicHook
	 *
	 * @return unknown
	 */
	function initialize(){
		if(empty($GLOBALS['logic_hook']))
			$GLOBALS['logic_hook'] = new LogicHook();
		return $GLOBALS['logic_hook'];
	}

	function setBean($bean){
		$this->bean = $bean;
		return $this;
	}

	protected $hook_map = array();
	protected $hookscan = array();

	public function getHooksMap()
	{
	    return $this->hook_map;
	}

	public function getHooksList()
	{
	    return $this->hookscan;
	}

    public function scanHooksDir($extpath)
    {
		if(is_dir($extpath)){
		    $dir = dir($extpath);
			while($entry = $dir->read()){
				if($entry != '.' && $entry != '..' && strtolower(substr($entry, -4)) == ".php" && is_file($extpath.'/'.$entry)) {
				    unset($hook_array);
                    include($extpath.'/'.$entry);
                    if(!empty($hook_array)) {
                        foreach($hook_array as $type => $hookg) {
                            foreach($hookg as $index => $hook) {
                                $this->hookscan[$type][] = $hook;
                                $idx = count($this->hookscan[$type])-1;
                                $this->hook_map[$type][$idx] = array("file" => $extpath.'/'.$entry, "index" => $index);
                            }
                        }
                    }
				}
			}
		}
    }

	protected static $hooks = array();

        static public function refreshHooks() {
            self::$hooks = array();
        }

	public function loadHooks($module_dir)
	{
		$hook_array = null;
	    if(!empty($module_dir)) {
	        $custom = "custom/modules/$module_dir";
	    } else {
	        $custom = "custom/modules";
	    }
		if(file_exists("$custom/logic_hooks.php")){
            if(isset($GLOBALS['log'])){
	    	    $GLOBALS['log']->debug('Including module specific hook file for '.$custom);
            }
		    include("$custom/logic_hooks.php");
		}
		if(empty($module_dir)) {
		    $custom = "custom/application";
		}
		if(file_exists("$custom/Ext/LogicHooks/logichooks.ext.php")) {
            if(isset($GLOBALS['log'])){
			    $GLOBALS['log']->debug('Including Ext hook file for '.$custom);
            }
			include("$custom/Ext/LogicHooks/logichooks.ext.php");
		}
		return $hook_array;
	}

	public function getHooks($module_dir, $refresh = false)
	{
	    if($refresh || !isset(self::$hooks[$module_dir])) {
	        self::$hooks[$module_dir] = $this->loadHooks($module_dir);
	    }
	    return self::$hooks[$module_dir];
	}

	/**
	 * Provide a means for developers to create upgrade safe business logic hooks.
	 * If the bean is null, then we assume this call was not made from a SugarBean Object and
	 * therefore we do not pass it to the method call.
	 *
	 * @param string $module_dir
	 * @param string $event
	 * @param array $arguments
	 * @param SugarBean $bean
	 */
	function call_custom_logic($module_dir, $event, $arguments = null){
		// declare the hook array variable, it will be defined in the included file.
		$hook_array = null;
        if(isset($GLOBALS['log'])){
            $GLOBALS['log']->debug("Hook called: $module_dir::$event");
        }
		if(!empty($module_dir)){
			// This will load an array of the hooks to process
			$hooks = $this->getHooks($module_dir);
			if(!empty($hooks)) {
			    $this->process_hooks($hooks, $event, $arguments);
			}
		}
		$hooks = $this->getHooks('');
		if(!empty($hooks)) {
		    $this->process_hooks($hooks, $event, $arguments);
		}
	}

	/**
	 * This is called from call_custom_logic and actually performs the action as defined in the
	 * logic hook. If the bean is null, then we assume this call was not made from a SugarBean Object and
	 * therefore we do not pass it to the method call.
	 *
	 * @param array $hook_array
	 * @param string $event
	 * @param array $arguments
	 * @param SugarBean $bean
	 */
	function process_hooks($hook_array, $event, $arguments){
		// Now iterate through the array for the appropriate hook
		if(!empty($hook_array[$event])){

			// Apply sorting to the hooks using the sort index.
			// Hooks with matching sort indexes will be processed in no particular order.
			$sorted_indexes = array();
			foreach($hook_array[$event] as $idx => $hook_details)
			{
				$order_idx = $hook_details[0];
				$sorted_indexes[$idx] = $order_idx;
			}
			asort($sorted_indexes);

			$process_order = array_keys($sorted_indexes);

			foreach($process_order as $hook_index){
				$hook_details = $hook_array[$event][$hook_index];
				if(!file_exists($hook_details[2])){
                    if(isset($GLOBALS['log'])){
					    $GLOBALS['log']->error('Unable to load custom logic file: '.$hook_details[2]);
                    }
					continue;
				}
				include_once($hook_details[2]);
				$hook_class = $hook_details[3];
				$hook_function = $hook_details[4];

				// Make a static call to the function of the specified class
				//TODO Make a factory for these classes.  Cache instances accross uses
				if($hook_class == $hook_function){
                    if(isset($GLOBALS['log'])){
					    $GLOBALS['log']->debug('Creating new instance of hook class '.$hook_class.' with parameters');
                    }
					if(!is_null($this->bean))
						$class = new $hook_class($this->bean, $event, $arguments);
					else
						$class = new $hook_class($event, $arguments);
				}else{
                    if(isset($GLOBALS['log'])){
					    $GLOBALS['log']->debug('Creating new instance of hook class '.$hook_class.' without parameters');
                    }
					$class = new $hook_class();
					if(!is_null($this->bean))
						$class->$hook_function($this->bean, $event, $arguments);
					else
						$class->$hook_function($event, $arguments);
				}
			}
		}
	}
}
?>
