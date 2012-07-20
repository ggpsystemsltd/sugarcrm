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

require_once('include/Expressions/Expression/AbstractExpression.php');
require_once('include/TimeDate.php');
abstract class DateExpression extends AbstractExpression
{
	/**
	 * All parameters have to be a string.
	 */
    static function getParameterTypes() {
		return AbstractExpression::$DATE_TYPE;
	}

    /**
     * @static
     * @param  String $date
     * @return DateTime, returns the DateTime object representing the string passed in
     * or false if the string could not be converted to a valid date.
     */
    public static function parse($date)
    {
        if ($date instanceof DateTime)
            return $date;

        //String dates must be in User format.
        if (is_string($date)) {
            $timedate = TimeDate::getInstance();
            $split = $timedate->split_date_time($date);
            if(!empty($split[1])) {
                // have time
                $resdate = $timedate->fromUser($date);
            } else {
                // just date, no time
                $resdate = $timedate->fromUserDate($date);
            }
            if(!$resdate) {
                throw new Exception("attempt to convert invalid value to date: $date");
            }
            return $resdate;
        }
        throw new Exception("attempt to convert invalid value to date: $date");
        return false;
    }

    /**
     * @static  
     * @param DateTime $date
     * @return DateTime $date rounded to the nearest 15 minute interval.
     */
    public static function roundTime($date)
    {
        if (!($date instanceof DateTime))
            return false;

        $min = $date->format("i");
        $offset = 0;
        if ($min < 16){
            $offset = 15 - $min;
        } else if ($min < 31)
        {
            $offset = 30 - $min;
        }
        else if ($min < 46)
        {
            $offset = 45 - $min;
        }
        else if ($min < 46)
        {
            $offset = 60 - $min;
        }
        if($offset != 0) {
            $date->modify("+$offset minutes");
        }

        return $date;
    }
}
?>