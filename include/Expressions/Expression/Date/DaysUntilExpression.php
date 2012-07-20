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

require_once('include/Expressions/Expression/Numeric/NumericExpression.php');

/**
 * <b>daysUntil(Date d)</b><br>
 * Returns number of days from now until the specified date.
 */
class DaysUntilExpression extends NumericExpression
{
	/**
	 * Returns the entire enumeration bare.
	 */
	function evaluate() {
		$params = DateExpression::parse($this->getParameters()->evaluate());
        if(!$params) {
            return false;
        }
        $now = TimeDate::getInstance()->getNow();
        //set the time to 0, as we are returning an integer based on the date.
        $now->setTime(0, 0, 0);
        $params->setTime(1, 0, 0);
        $tsdiff = $params->ts - $now->ts;
        $diff = (int)floor($tsdiff/86400);
        $extrasec = $tsdiff%86400;
        if($extrasec != 0) {
            $extra = $params->get(sprintf("%+d seconds", $extrasec));
            if($extra->day_of_year != $params->day_of_year) {
                $diff++;
            }
        }
        return $diff;
	}


	/**
	 * Returns the JS Equivalent of the evaluate function.
	 */
	static function getJSEvaluate() {
		return <<<EOQ
			var then = SUGAR.util.DateUtils.parse(this.getParameters().evaluate());
			var now = new Date();
			now.setHours(0);
			now.setMinutes(0);
			now.setSeconds(0);
			then.setHours(1);
			then.setMinutes(0);
			then.setSeconds(0);
			var diff = then - now;
			var days = Math.floor(diff / 86400000);
			var extrasec = diff % 86400000;
			var extra = new Date();
			extra.setTime(then.getTime() + extrasec);
			if (extra.getDate() != then.getDate())
			    days++;

			return days;
EOQ;
	}


	/**
	 * Returns the opreation name that this Expression should be
	 * called by.
	 */
	static function getOperationName() {
		return "daysUntil";
	}

	/**
	 * All parameters have to be a date.
	 */
    static function getParameterTypes() {
		return array(AbstractExpression::$DATE_TYPE);
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
