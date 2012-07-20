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

require_once('include/Expressions/Expression/Generic/GenericExpression.php');


class SugarFieldExpression extends GenericExpression
{

    function __construct($varName){
        $this->varName = $varName;
    }
    /**
	 * Returns the entire enumeration bare.
	 */
	function evaluate() {
		if (empty($this->varName))
            return "";
        $fieldName = $this->varName;

        if (!isset($this->context))
        {
            //If we don't have a context provided, we have to guess. This can be a large performance hit.
            $this->setContext();
        }

        if (empty($this->context->field_defs[$fieldName]))
            throw new Exception("Unable to find field {$fieldName}");

        $def = $this->context->field_defs[$fieldName];
        $timedate = TimeDate::getInstance();
        switch($def['type']) {
            case 'link':
                return $this->getLinkField($fieldName);
            case 'datetime':
            case 'datetimecombo':
                if(empty($this->context->$fieldName)) {
                    throw new Exception("attempt to get date from empty field: {$fieldName}");
                }
                $date = $timedate->fromDb($this->context->$fieldName);
                if(empty($date)) {
                     throw new Exception("attempt to convert invalid value to date: {$this->context->$fieldName}");
                }
                $timedate->tzUser($date);
                $date->def = $def;
                return $date;
            case 'date':
                if(empty($this->context->$fieldName)) {
                     throw new Exception("attempt to get date from empty field: {$fieldName}");
                }
                $date = $timedate->fromDbDate($this->context->$fieldName);
                if(empty($date)) {
                    throw new Exception("attempt to convert invalid value to date: {$this->context->$fieldName}");
                }
                $date->def = $def;
                return $date;
            case 'time':
                if(empty($this->context->$fieldName)) {
                     throw new Exception("attempt to get date from empty field: {$fieldName}");
                }
                return $timedate->fromUserTime($timedate->to_display_time($this->context->$fieldName));
            case 'bool':
                if (!empty($this->context->$fieldName))
                    return AbstractExpression::$TRUE;
                return AbstractExpression::$FALSE;
        }
        return $this->context->$fieldName;
	}

    protected function setContext()
    {
        if (empty($this->context) && !empty($_REQUEST['module']) && !empty($_REQUEST['record']))
        {
            $module = $_REQUEST['module'];
            $id = $_REQUEST['record'];
            $this->context = BeanFactory::getBean($module, $id);
        }
    }

    protected function getLinkField($fieldName)
    {
        if (empty($this->context->$fieldName) && !$this->context->load_relationship($fieldName))
            throw new Exception("Unable to load relationship $fieldName");

        if(empty($this->context->$fieldName))
            throw new Exception("Relationship $fieldName was not set");

        if (isset($this->context->$fieldName->beans))
            return $this->context->$fieldName->beans;

        $beans = $this->context->$fieldName->getBeans();

        return $beans;
    }



	/**
	 * Returns the JS Equivalent of the evaluate function.
	 */
	static function getJSEvaluate() {
		return <<<EOQ
		    var varName = this.getParameters().evaluate();
			return SUGAR.forms.AssignmentHandler.getValue(varName);
EOQ;
	}

	/**
	 * Returns the opreation name that this Expression should be
	 * called by.
	 */
	static function getOperationName() {
		return array("sugarField");
	}

	/**
	 * The first parameter is a number and the second is the list.
	 */
    static function getParameterTypes() {
		return array(AbstractExpression::$STRING_TYPE);
	}

	/**
	 * Returns the maximum number of parameters needed.
	 */
	static function getParamCount() {
		return 1;
	}

	/**
	 * Returns the String representation of this Expression.
	 */
	function toString() {
	}
}

?>