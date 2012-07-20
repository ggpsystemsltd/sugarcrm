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

 
 class ListCurrency{
	var $focus = null;
	var $list = null;
	var $javascript = '<script>';
	function lookupCurrencies(){
		
		
		$this->focus = new Currency();
		$this->list = $this->focus->get_full_list('name');
		$this->focus->retrieve('-99');
	  	if(is_array($this->list)){
		$this->list = array_merge(Array($this->focus), $this->list);
	  	}else{
	  		$this->list = Array($this->focus);	
	  	} 
		
	}
	function handleAdd(){
			global $current_user;
			if($current_user->is_admin){
			if(isset($_POST['edit']) && $_POST['edit'] == 'true' && isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['conversion_rate']) && !empty($_POST['conversion_rate']) && isset($_POST['symbol']) && !empty($_POST['symbol'])){
				
				$currency = new Currency();
				if(isset($_POST['record']) && !empty($_POST['record'])){
	
					$currency->retrieve($_POST['record']);
				}
				$currency->name = $_POST['name'];
				$currency->status = $_POST['status'];
				$currency->symbol = $_POST['symbol'];
				$currency->iso4217 = $_POST['iso4217'];
				$currency->conversion_rate = unformat_number($_POST['conversion_rate']);
				$currency->save();
				$this->focus = $currency;
			}
			}
		
	}
		
	function handleUpdate(){
		global $current_user;
			if($current_user->is_admin){
				if(isset($_POST['id']) && !empty($_POST['id'])&&isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['rate']) && !empty($_POST['rate']) && isset($_POST['symbol']) && !empty($_POST['symbol'])){
			$ids = $_POST['id'];
			$names= $_POST['name'];
			$symbols= $_POST['symbol'];
			$rates  = $_POST['rate'];
			$isos  = $_POST['iso'];
			$size = sizeof($ids);
			if($size != sizeof($names)|| $size != sizeof($isos) || $size != sizeof($symbols) || $size != sizeof($rates)){
				return;	
			}
			
				$temp = new Currency();
			for($i = 0; $i < $size; $i++){
				$temp->id = $ids[$i];
				$temp->name = $names[$i];
				$temp->symbol = $symbols[$i];
				$temp->iso4217 = $isos[$i];
				$temp->conversion_rate = $rates[$i];
				$temp->save();
			}
	}}
	}
	
	function getJavascript(){ 
		// wp: DO NOT add formatting and unformatting numbers in here, add them prior to calling these to avoid double calling 
		// of unformat number
		return $this->javascript . <<<EOQ
					function get_rate(id){
						return ConversionRates[id];
					}
					function ConvertToDollar(amount, rate){
						return amount / rate;
					}
					function ConvertFromDollar(amount, rate){
						return amount * rate;
					}
					function ConvertRate(id,fields){
							for(var i = 0; i < fields.length; i++){
								fields[i].value = toDecimal(ConvertFromDollar(toDecimal(ConvertToDollar(toDecimal(fields[i].value), lastRate)), ConversionRates[id]));
							}
							lastRate = ConversionRates[id];
						}
					function ConvertRateSingle(id,field){
						var temp = field.innerHTML.substring(1, field.innerHTML.length);
						unformattedNumber = unformatNumber(temp, num_grp_sep, dec_sep);
						
						field.innerHTML = CurrencySymbols[id] + formatNumber(toDecimal(ConvertFromDollar(ConvertToDollar(unformattedNumber, lastRate), ConversionRates[id])), num_grp_sep, dec_sep, 2, 2);
						lastRate = ConversionRates[id];
					}
					function CurrencyConvertAll(form){
                        try {
                        var id = form.currency_id.options[form.currency_id.selectedIndex].value;
						var fields = new Array();
						
						for(i in currencyFields){
							var field = currencyFields[i];
							if(typeof(form[field]) != 'undefined'){
								form[field].value = unformatNumber(form[field].value, num_grp_sep, dec_sep);
								fields.push(form[field]);
							}
							
						}
							
							ConvertRate(id, fields);
						for(i in fields){
							fields[i].value = formatNumber(fields[i].value, num_grp_sep, dec_sep);

						}
							
						} catch (err) {
                            // Do nothing, if we can't find the currency_id field we will just not attempt to convert currencies
                            // This typically only happens in lead conversion and quick creates, where the currency_id field may be named somethnig else or hidden deep inside a sub-form.
                        }
						
					}
				</script>
EOQ;
	}
	
	
	function getSelectOptions($id = ''){
		global $current_user;
		$this->javascript .="var ConversionRates = new Array(); \n";		
		$this->javascript .="var CurrencySymbols = new Array(); \n";
		$options = '';
		$this->lookupCurrencies();
		$setLastRate = false;
		if(isset($this->list ) && !empty($this->list )){
		foreach ($this->list as $data){
			if($data->status == 'Active'){
			if($id == $data->id){
			$options .= '<option value="'. $data->id . '" selected>';
			$setLastRate = true;
			$this->javascript .= 'var lastRate = "' . $data->conversion_rate . '";';
			
			}else{
				$options .= '<option value="'. $data->id . '">'	;
			}
			$options .= $data->name . ' : ' . $data->symbol; 
			$this->javascript .=" ConversionRates['".$data->id."'] = '".$data->conversion_rate."';\n";
			$this->javascript .=" CurrencySymbols['".$data->id."'] = '".$data->symbol."';\n";
		}}
		if(!$setLastRate){
			$this->javascript .= 'var lastRate = "1";';
		}
		
	}
	return $options;
	}
	function getTable(){
		$this->lookupCurrencies();
		$usdollar = translate('LBL_US_DOLLAR');
		$currency = translate('LBL_CURRENCY');
		$currency_sym = $sugar_config['default_currency_symbol'];
		$conv_rate = translate('LBL_CONVERSION_RATE');
		$add = translate('LBL_ADD');
		$delete = translate('LBL_DELETE');
		$update = translate('LBL_UPDATE');
		
		$form = $html = "<br><table cellpadding='0' cellspacing='0' border='0'  class='tabForm'><tr><td><tableborder='0' cellspacing='0' cellpadding='0'>";
		$form .= <<<EOQ
					<form name='DeleteCurrency' action='index.php' method='post'><input type='hidden' name='action' value='{$_REQUEST['action']}'>
					<input type='hidden' name='module' value='{$_REQUEST['module']}'><input type='hidden' name='deleteCur' value=''></form>

					<tr><td><B>$currency</B></td><td><B>ISO 4217</B>&nbsp;</td><td><B>$currency_sym</B></td><td colspan='2'><B>$conv_rate</B></td></tr>
					<tr><td>$usdollar</td><td>USD</td><td>$</td><td colspan='2'>1</td></tr>
					<form name="UpdateCurrency" action="index.php" method="post"><input type='hidden' name='action' value='{$_REQUEST['action']}'>
					<input type='hidden' name='module' value='{$_REQUEST['module']}'>
EOQ;
		if(isset($this->list ) && !empty($this->list )){
		foreach ($this->list as $data){
			
			$form .= '<tr><td>'.$data->iso4217. '<input type="hidden" name="iso[]" value="'.$data->iso4217.'"></td><td><input type="hidden" name="id[]" value="'.$data->id.'">'.$data->name. '<input type="hidden" name="name[]" value="'.$data->name.'"></td><td>'.$data->symbol. '<input type="hidden" name="symbol[]" value="'.$data->symbol.'"></td><td>'.$data->conversion_rate.'&nbsp;</td><td><input type="text" name="rate[]" value="'.$data->conversion_rate.'"><td>&nbsp;<input type="button" name="delete" class="button" value="'.$delete.'" onclick="document.forms[\'DeleteCurrency\'].deleteCur.value=\''.$data->id.'\';document.forms[\'DeleteCurrency\'].submit();"> </td></tr>';
		}
		}
		$form .= <<<EOQ
					<tr><td></td><td></td><td></td><td></td><td></td><td>&nbsp;<input type='submit' name='Update' value='$update' class='button'></TD></form> </td></tr>
					<tr><td colspan='3'><br></td></tr>
					<form name="AddCurrency" action="index.php" method="post">
					<input type='hidden' name='action' value='{$_REQUEST['action']}'>
					<input type='hidden' name='module' value='{$_REQUEST['module']}'>
					<tr><td><input type = 'text' name='addname' value=''>&nbsp;</td><td><input type = 'text' name='addiso' size='3' maxlength='3' value=''>&nbsp;</td><td><input type = 'text' name='addsymbol' value=''></td><td colspan='2'>&nbsp;<input type ='text' name='addrate'></td><td>&nbsp;<input type='submit' name='Add' value='$add' class='button'></td></tr>
					</form></table></td></tr></table>
EOQ;
	return $form;
		
	}
	
	function setCurrencyFields($fields){
		$json = getJSONobj();
		$this->javascript .= 'var currencyFields = ' . $json->encode($fields) . ";\n";
	}
				
		
}

//$lc = new ListCurrency();
//$lc->handleDelete();
//$lc->handleAdd();
//$lc->handleUpdate();
//echo '<select>'. $lc->getSelectOptions() . '</select>';
//echo $lc->getTable();

?>