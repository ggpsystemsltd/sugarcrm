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

require_once("include/Expressions/Dependency.php");
require_once("include/Expressions/Trigger.php");
require_once("include/Expressions/Expression/Parser/Parser.php");
require_once("include/Expressions/Actions/ActionFactory.php");

/**
 * Dependent field manager
 * @api
 */
 class DependencyManager {
    static $default_trigger = "true";

	/**
	 * Returns a new Dependency that will power the provided calculated field.
	 *
	 * @param Array<String=>Array> $fields, list of fields to get dependencies for.
	 * @param Boolean $includeReadOnly
	 * @return array<Dependency>
	 */
	public static function getCalculatedFieldDependencies($fields, $includeReadOnly = true, $orderMatters = false) {

		$deps = array();
        $ro_deps = array();
		require_once("include/Expressions/Actions/SetValueAction.php");
        //In order to make sure the deps are returned in order such that fields that ared by other fields are calculated first,
        //we keep track of how many times a field is used and what fields that field references.
        $formulaFields = array();
		foreach($fields as $field => $def) {
			if (isset($def['calculated']) && $def['calculated'] && !empty($def['formula'])) {
		    	$triggerFields = Parser::getFieldsFromExpression($def['formula'], $fields);
                $formulaFields[$field] = $triggerFields;
		    	$dep = new Dependency($field);
		    	$dep->setTrigger(new Trigger('true', $triggerFields));

		    	$dep->addAction(ActionFactory::getNewAction('SetValue', array('target' => $field, 'value' => $def['formula'])));

		    	if (isset($def['enforced']) && $def['enforced'] &&
                    //Check for the string "false"
                    (!is_string($def['enforced']) || strtolower($def['enforced']) !== "false"))
                {
			    	$dep->setFireOnLoad(true);
		    		if ($includeReadOnly)
		    		{
		    			$readOnlyDep = new Dependency("readOnly$field");
		    			$readOnlyDep->setFireOnLoad(true);
		    			$readOnlyDep->setTrigger(new Trigger('true', array()));
		    			$readOnlyDep->addAction(ActionFactory::getNewAction('ReadOnly',
		    					array('target' => $field,
		    						  'value' => 'true')));

				    	$ro_deps[] = $readOnlyDep;
		    		}
		    	}
		    	$deps[$field] = $dep;
		    }
	    }
        if ($orderMatters)
            $deps = self::orderCalculatedFields($deps, $formulaFields);
        else
            $deps = array_values($deps);

	    return array_merge($deps, $ro_deps);
	}

    protected static function orderCalculatedFields($deps, $formulaFields)
    {
        $weights = array_fill_keys(array_keys($formulaFields), 0);
        foreach($formulaFields as $field => $triggers)
        {
            $updated = array();
            //Add to the weights of fields this field relies on, don't loop or double add.
            self::updateWeights($weights, $updated, $formulaFields, $field);
        }
        //Calculate fields that are relied upon by other fields will now all be heavier than the
        //fields that rely upon them. Do a reverse sort to bring the heaviest to the top.
        arsort($weights);

        //Now build the result array from the weights
        $ret = array();
        foreach($weights as $field => $weight)
        {
            $ret[] = $deps[$field];
        }
        return $ret;
    }

    /*
     * Recusivly add weight to calculated fields that are used by the field in question
     */
    protected static function updateWeights(&$weights, &$updated, $formulaFields, $field)
    {
        foreach($formulaFields[$field] as $tField)
        {
            if (isset($formulaFields[$tField]) && !isset($updated[$tField]))
            {
                if(isset($weights[$tField])) $weights[$tField]++;
                else $weights[$tField] = 1;

                $updated[$tField] = true;
                self::updateWeights($weights, $updated, $formulaFields, $tField);
            }
        }
    }

	static function getDependentFieldDependencies($fields) {
		$deps = array();

		foreach($fields as $field => $def) {
			if ( !empty ( $def [ 'dependency' ] ) )
    		{
    			// normalize the dependency definition
    			if ( ! is_array ( $def [ 'dependency' ] ) )
    			{
    				$triggerFields = Parser::getFieldsFromExpression ( $def [ 'dependency' ], $fields) ;
    				$def [ 'dependency' ] = array ( array ( 'trigger' => $triggerFields , 'action' => $def [ 'dependency' ] ) ) ;
    			}
				foreach ( $def [ 'dependency' ]  as $depdef)
				{
    				$dep = new Dependency ( "{$field}_vis" ) ;
    				if (is_array($depdef [ 'trigger' ])) {
    					$triggerFields = $depdef [ 'trigger' ];
    				} else {
    					$triggerFields = Parser::getFieldsFromExpression ( $depdef [ 'trigger' ], $fields ) ;
    				}
    				$dep->setTrigger ( new Trigger ( 'true' , $triggerFields ) ) ;
    				$dep->addAction ( ActionFactory::getNewAction('SetVisibility',
    					array( 'target' => $field , 'value' => $depdef [ 'action' ]))) ;
    				$dep->setFireOnLoad(true);
					$deps[] = $dep;
				}
    		}
		}
		return $deps;
	}

    static function getDependentFieldTriggerFields($fields, $fieldDefs = array())
    {
        $ret = array();
        foreach($fields as $field => $def) {
            if (!empty($fieldDefs[$field]))
                $def = $fieldDefs[$field];
			if ( !empty ( $def [ 'dependency' ] ) )
    		{
    			$triggerFields = array();
    			// normalize the dependency definition
    			if (is_array ( $def [ 'dependency' ] ) )
    			{
    				$triggerFields = Parser::getFieldsFromExpression ( $def [ 'dependency' ]['action'], $fieldDefs ) ;
				}
                else
                {
                    $triggerFields = Parser::getFieldsFromExpression ( $def [ 'dependency' ] , $fieldDefs) ;
                }
                foreach($triggerFields as $name)
                {
                    $ret[$name] = true;
                }
    		}
		}
        return array_keys($ret);
    }

	static function getDropDownDependencies($fields) {
		$deps = array();
		global $app_list_strings;

		foreach($fields as $field => $def) {
			if ( $def['type'] == "enum" && isset ( $def [ 'visibility_grid' ] ) )
    		{
    			$grid = $def [ 'visibility_grid' ];
    			if (!isset($grid['values']) || empty($grid['trigger']))
    				continue;

    			$trigger_list_id = $fields[$grid [ 'trigger' ]]['options'];
    			$trigger_values = $app_list_strings[$trigger_list_id];

    			$options = $app_list_strings[$def['options']];
    			$result_keys = array();
    			foreach($trigger_values as $label_key => $label) {
    				if (!empty($grid['values'][$label_key])) {
    					$key_list = array();
    					foreach($grid['values'][$label_key] as $label_key) {
    						if (isset($options[$label_key]))
    						{
    							$key_list[$label_key] = $label_key;
    						}
    					}
    					$result_keys[] = 'enum("' . implode('","', $key_list) . '")';
    				} else {
    					$result_keys[] = 'enum("")';
    				}
    			}

    			$keys = 'enum(' . implode(',', $result_keys) . ')';
    			//If the trigger key doesn't appear in the child list, hide the child field.
    			$keys_expression = 'cond(equal(indexOf($' . $grid [ 'trigger' ]
    					    . ', getDD("' . $trigger_list_id . '")), -1), enum(""), '
    						. 'valueAt(indexOf($' . $grid [ 'trigger' ]
    						. ',getDD("' . $trigger_list_id . '")),' . $keys . '))';
    			//Have SetOptionsAction pull from the javascript language files.
                $labels_expression = '"' . $def['options'] . '"';
                $dep = new Dependency ( $field . "DDD");
    			$dep -> setTrigger( new Trigger ('true', $grid['trigger']));
    			$dep -> addAction (
    				ActionFactory::getNewAction('SetOptions', array(
    					'target' => $field,
    					'keys' => $keys_expression,
    					'labels' => $labels_expression)));
    			$dep->setFireOnLoad(true);
    			$deps[] = $dep;
    		}
		}
		return $deps;
	}

	static function getPanelDependency($panel_id, $dep_expression)
    {
        $dep = new Dependency ( $panel_id . "_visibility");
        $dep -> setTrigger( new Trigger('true', Parser::getFieldsFromExpression ( $dep_expression ) ) );
        $dep -> addAction (
            ActionFactory::getNewAction('SetPanelVisibility', array(
                'target' => $panel_id,
                'value' => $dep_expression,
            ))
        );
        $dep->setFireOnLoad(true);

        return $dep;
    }

	public static function getDependenciesForView($viewdef, $view = "", $module = "")
    {
        global $currentModule;

        if (empty($module) )
            $module = $currentModule;

        $deps = array();
        if (isset($viewdef['templateMeta']) && !empty($viewdef['templateMeta']['panelDependencies'])){
            foreach (($viewdef['templateMeta']['panelDependencies']) as $id => $expr)
            {
                $deps[] = self::getPanelDependency(strtoupper($id), $expr);
            }
        }
        if ($view == "EditView" || strpos($view, "QuickCreate") !== false)
        {
            $deps = array_merge($deps, self::getModuleDependenciesForAction($module, 'edit', $view));
        }
        else
        {
            $deps = array_merge($deps, self::getModuleDependenciesForAction($module, 'view', $view));
        }
        return $deps;
    }

    public static function getModuleDependenciesForAction($module, $action, $form = "EditView")
    {
        $meta = self::getModuleDependencyMetadata($module);
        $deps = array();
        foreach ($meta as $key => $def)
        {
            $hooks = empty($def['hooks']) ? array("all") : $def['hooks'];
            if (!is_array($hooks))
                $hooks = array($hooks);
            if(in_array('all', $hooks) || in_array($action, $hooks))
            {
                $triggerExp = empty($def['trigger']) ? self::$default_trigger : $def['trigger'];
                $triggerFields = empty($def['triggerFields']) ?
                        Parser::getFieldsFromExpression ($triggerExp) :
                        $def['triggerFields'];
                $actions = empty($def['actions']) || !is_array($def['actions']) ? array() : $def['actions'];
                $notActions = empty($def['notActions']) || !is_array($def['notActions']) ? array() : $def['notActions'];
                $dep = new Dependency("{$module}{$form}_{$key}");
                $dep->setTrigger(new Trigger($triggerExp, $triggerFields));
                foreach($actions as $aDef)
                {
                    $dep->addAction(
                        ActionFactory::getNewAction($aDef['name'], $aDef['params']));
                }
                foreach($notActions as $aDef)
                {
                    $dep->addFalseAction(
                        ActionFactory::getNewAction($aDef['name'], $aDef['params']));
                }
                $dep->setFireOnLoad(!isset($def['onload']) || $def['onload'] !== false);
                $deps[] = $dep;
            }
        }
        return $deps;
    }

    private static function getModuleDependencyMetadata($module)
    {
        /* //Disable caching for now
        $cacheLoc = create_cache_directory("modules/$module/dependencies.php");
        //If the cache file exists, use it.
        if(inDeveloperMode() && empty($_SESSION['developerMode']) && is_file($cacheLoc)) {
            include($cacheLoc);
        }
        //Otherwise load all the def locations and create the cache file.
        else {
        */
        $dependencies = array($module => array());
        $location = "modules/$module/metadata/dependencydefs.php";
        foreach(array(
            $location,
            "custom/{$location}",
            "custom/modules/{$module}/Ext/Dependencies/deps.ext.php") as $loc)
        {
            if(is_file($loc)) {
                include $loc;
            }
        }
        /*  //More disabled cache code
            $out = "<?php\n // created: " . date('Y-m-d H:i:s') . "\n"
                 . override_value_to_string('dependencies', $module, $dependencies[$module]);
            file_put_contents($cacheLoc, $out);
        }*/

        return $dependencies[$module];
    }

	static function getDependenciesForFields($fields, $view = "") {
		if ($view == "DetailView")
        {
            return self::getDependentFieldDependencies($fields);
        } else
        {
            return array_merge(
                self::getCalculatedFieldDependencies($fields),
				self::getDependentFieldDependencies($fields),
				self::getDropDownDependencies($fields));
        }
	}

    /**
     * @static
     * @param  $user User, user to return SugarLogic variables for
     * @return string
     */
    public static function getJSUserVariables($user)
    {
        require_once("include/TimeDate.php");
        $ts = TimeDate::getInstance();
        return "SUGAR.expressions.userPrefs = " . json_encode(array(
            "num_grp_sep" => $user->getPreference("num_grp_sep"),
            "dec_sep" => $user->getPreference("dec_sep"),
            "datef" => $user->getPreference("datef"),
            "timef" => $user->getPreference("timef"),
            "gmt_offset" => $ts->getUserUTCOffset(),
            "default_locale_name_format" => $user->getPreference("default_locale_name_format"),
        )) . ";\n";
    }

    /**
     * @static returns the javascript for the link variables of this view.
     * @param  $fields array, field_defs for this view
     * @param  $view string, name of view (form name)
     * @return string
     */
     public static function getLinkFields($fields, $view)
    {
        $links = array();
        foreach($fields as $name => $def)
        {
            if ($def['type'] == 'link' && self::validLinkField($def))
            {
                $links[$name] = array('relationship'=>$def['relationship']);
                if(!empty($def['module']))
                    $links[$name]['module'] = $def['module'];
            }
        }
        //Now attempt to map the relate field to the link
        foreach($fields as $name => $def)
        {
            if ($def['type'] == 'relate' && !empty($def['link']) && isset($links[$def['link']]) && !empty($def['id_name']))
            {
                $links[$def['link']]['id_name'] = $def['id_name'];
                if (empty($links[$def['link']]['module']) && !empty($def['module']))
                    $links[$def['link']]['module'] = $def['module'];
            }
        }
        return "SUGAR.forms.AssignmentHandler.LINKS['$view'] = " . json_encode($links) . "\n";
    }

    /**
     * @static
     * @param  $def array, Link field definition.
     * @return bool true if field is valid.
     */
    protected static function validLinkField($def)
    {
        global $dictionary;
        $invalidModules = array("Emails" => true, "Teams" => true);

        if (empty($def['relationship'])) {
            return false; //Not a good link field
        }

        $rel = SugarRelationshipFactory::getInstance()->getRelationship($def['relationship']);
        if ($rel === false) {
            return false; //Unable to find a relationship definition
        }

        if(!empty($invalidModules[$rel->lhs_module]) || !empty($invalidModules[$rel->rhs_module])) {
            return false; //Invalid module
        }

        //Otherwise this link looks ok
        return true;
    }
}
?>