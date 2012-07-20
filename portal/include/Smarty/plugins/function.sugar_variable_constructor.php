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
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty {sugar_variable_constructor} function plugin
 *
 * Type:     function<br>
 * Name:     sugar_variable_constructor<br>
 * Purpose:  creates a smarty variable from the parameters
 * 
 * @author Wayne Pan {wayne at sugarcrm.com}
 * @param array
 * @param Smarty
 */

function smarty_function_sugar_variable_constructor($params, &$smarty)
{
    if (!isset($params['objectName']) || !isset($params['memberName']) || !isset($params['key'])) {
        if(!isset($params['objectName']))  
            $smarty->trigger_error("sugar_variable_constructor: missing 'objectName' parameter");
        if(!isset($params['memberName']))  
            $smarty->trigger_error("sugar_variable_constructor: missing 'memberName' parameter");
        if(!isset($params['key']))  
            $smarty->trigger_error("sugar_variable_constructor: missing 'key' parameter");
        return;
    }

    $displayParams = $smarty->get_template_vars('displayParams');
    
    if(isset($params['stringFormat'])) {
        $_contents =  '$'. $params['objectName'] . '.' . $params['memberName'] . '.' . $params['key'];
    } else {
        $_contents = '{$' . $params['objectName'] . '.' . $params['memberName'] . '.' . $params['key'] . (!empty($displayParams['url2html']) ? '|url2html' : '') . (!empty($displayParams['nl2br']) ? '|nl2br' : '') . '}';
    }
    return $_contents;
}
?>
