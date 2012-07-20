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

/*********************************************************************************

 * Description: This file is used to override the default Meta-data EditView behavior
 * to provide customization specific to the Calls module.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

require_once('include/MVC/View/views/view.wirelessedit.php');

class OpportunitiesViewWirelessedit extends ViewWirelessedit 
{
 	public function display() 
 	{
		parent::display();
        
        global $app_list_strings;
		$json = getJSONobj();
		$prob_array = $json->encode($app_list_strings['sales_probability_dom']);
		$prePopProb = '';
		
		if(empty($this->bean->id)) 
		    $prePopProb = 'document.getElementsByName(\'sales_stage\')[0].onchange();';
        
		echo <<<EOQ
<script>
prob_array = $prob_array;
if(document.getElementsByName('sales_stage') != null) {
    document.getElementsByName('sales_stage')[0].onchange = function() {
        if(document.getElementsByName('probability') != null
                && typeof(document.getElementsByName('sales_stage')[0].value) != "undefined" 
                && prob_array[document.getElementsByName('sales_stage')[0].value]) {
            document.getElementsByName('probability')[0].value = prob_array[document.getElementsByName('sales_stage')[0].value];
        } 
    };
    $prePopProb
}
</script>
EOQ;
 	}
}
?>
