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


require_once("include/Expressions/Expression/String/StringExpression.php");
/**
 * <b>subStr(String s, Number from, Number length)</b><br>
 * Returns <i>length</i> characters starting at 0-based index <i>from</i>.<br />
 * ex: <em>subStr("Hello", 1, 3)</em> = "ell"
 */
class SubStrExpression extends StringExpression 
{
    /**
    * Returns itself when evaluating.
    */
    function evaluate() 
    {
        $params = $this->getParameters();
        $str = $params[0]->evaluate();
        $fromIdx = $params[1]->evaluate();
        $strLength = $params[2]->evaluate();

        if (!is_numeric($fromIdx))
          throw new Exception($this->getOperationName() . ": Parameter FROM must be a number.");

        if (!is_numeric($strLength))
          throw new Exception($this->getOperationName() . ": Parameter LENGTH must be a number.");

        return substr($str, $fromIdx, $strLength);
    }

    /**
    * Returns the JS Equivalent of the evaluate function.
    */
    static function getJSEvaluate() 
    {
        return <<<EOQ
            var params = this.getParameters();
            var str = params[0].evaluate() + "";
            var fromIdx = params[1].evaluate();
            var strLength = params[2].evaluate();
            return str.substr(fromIdx, strLength);
EOQ;
    }

    /**
    * Returns the opreation name that this Expression should be
    * called by.
    */
    static function getOperationName() 
    {
        return "subStr";
    }

    /**
    * Any generic type will suffice.
    */
    static function getParameterTypes()
    {
        return array("string", "number", "number");
    }

    /**
    * Returns the exact number of parameters needed.
    */
    static function getParamCount() 
    {
        return 3;
    }

    /**
    * Returns the String representation of this Expression.
    */
    function toString() 
    {
    }
}
