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

 * Description:  Defines the English language pack for the base application.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/
 
 require_once('include/SugarObjects/templates/basic/Basic.php');
 class Sale extends Basic{

 	function Sale(){
 		parent::Basic();

 	}
 	
 	function create_new_list_query($order_by, $where,$filter=array(),$params=array(), $show_deleted = 0,$join_type='', $return_array = false,$parentbean=null, $singleSelect = false)
 	{
 		//Ensure that amount is always on list view queries if amount_usdollar is as well.
 		if (!empty($filter) && isset($filter['amount_usdollar']) && !isset($filter['amount']))
 		{
 			$filter['amount'] = true;
 		}
 		return parent::create_new_list_query($order_by, $where, $filter, $params, $show_deleted, $join_type, $return_array, $parentbean, $singleSelect);
 	}
 	
 	function fill_in_additional_list_fields()
	{
    	parent::fill_in_additional_list_fields();
    		
		//Ensure that the amount_usdollar field is not null.
		if (empty($this->amount_usdollar) && !empty($this->amount))
		{
			$this->amount_usdollar = $this->amount;
		}
	}
 	
 	function fill_in_additional_detail_fields()
	{		
		parent::fill_in_additional_detail_fields();
		//Ensure that the amount_usdollar field is not null.
		if (empty($this->amount_usdollar) && !empty($this->amount))
		{
			$this->amount_usdollar = $this->amount;
		}
	}

 	
 	function save($check_notify = FALSE) {
 		//"amount_usdollar" is really amount_basecurrency. We need to save a copy of the amount in the base currency.
		if(isset($this->amount) && !number_empty($this->amount)){
            if (!number_empty($this->currency_id))
			{
                $currency = new Currency();
                $currency->retrieve($this->currency_id);
                $this->amount_usdollar = $currency->convertToDollar($this->amount);
			}
			else 
			{
			$this->amount_usdollar = $this->amount;
			}
		}
		
		return parent::save($check_notify);
 	}
 }
?>
