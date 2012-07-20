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


    function wrapTD($html, $options){
        return wrapTag("td",$html, $options);
    }
    
    function wrapTR($html, $options){
        return wrapTag("tr",$html, $options);
    }
    
    function wrapTable($html, $options){
        return wrapTag("table",$html, $options);
    }
    
    function wrapB($html){
        return "<b>".$html."</b>";
    }
    
    function wrapI($html){
        return "<i>".$html."</i>";
    }
    function wrapTag($tag, $html, $options){
        // Wrap the tags defined in the options array (like b, i, font... tags)
        if(!empty($options)){
            foreach($options as $k=>$v){
                if(is_array($v)){
                    $html = wrapTag($k, "$html", $v);
                }
            }
        }
        // wrap the HTML content with the passed tag
        $return = "<$tag ";
        if(!empty($options)){
            foreach($options as $k=>$v){
                if(!is_array($v)){
                    $return .= " $k=".'"'.$v.'"';
                }
            }
        }
        return $return.">".$html."</$tag>";
    }
    
    /**
     * This function prepare a string to be ready for the PDF printing.
     * @param $string
     * @return string
     */
    function prepare_string($string){
        global $locale;
        $string = html_entity_decode($string, ENT_QUOTES);
        // return $locale->translateCharset($string, 'UTF-8', $locale->getExportCharset());
        return $string;
    }
     /**
     * Copy of format_number() from currency with fix for sugarpdf.
     * @return String formatted currency value
     * @see modules/Currencies/Currency.php
     */
    function format_number_sugarpdf($amount, $round = null, $decimals = null, $params = array()) {   
        global $app_strings, $current_user, $sugar_config, $locale;
        static $current_users_currency = null;
        static $last_override_currency = null;
        static $override_currency_id = null;
        static $currency;
            
        $seps = get_number_seperators();
        $num_grp_sep = $seps[0];
        $dec_sep = $seps[1];
        
        // cn: bug 8522 - sig digits not honored in pdfs
        if(is_null($decimals)) {
            $decimals = $locale->getPrecision();
        }
        if(is_null($round)) {
            $round = $locale->getPrecision();
        }
                    
        // only create a currency object if we need it
        if((!empty($params['currency_symbol']) && $params['currency_symbol']) ||
          (!empty($params['convert']) && $params['convert']) ||
          (!empty($params['currency_id']))) { 
                // if we have an override currency_id
                if(!empty($params['currency_id'])) {
                    if($override_currency_id != $params['currency_id']) {
                        $override_currency_id = $params['currency_id'];
                        $currency = new Currency();
                        $currency->retrieve($override_currency_id);
                        $last_override_currency = $currency;
                    } else {
                        $currency = $last_override_currency;
                    }
                    
                } elseif(!isset($current_users_currency)) { // else use current user's
                    $current_users_currency = new Currency();
                    if($current_user->getPreference('currency')) $current_users_currency->retrieve($current_user->getPreference('currency'));
                    else $current_users_currency->retrieve('-99'); // use default if none set
                    $currency = $current_users_currency;
                }
        }
        if(!empty($params['convert']) && $params['convert']) {
            $amount = $currency->convertFromDollar($amount, 6);
        }
    
        if(!empty($params['currency_symbol']) && $params['currency_symbol']) {
            if(!empty($params['symbol_override'])) {
                $symbol = $params['symbol_override'];
            }
            
            // BEGIN SUGARPDF
            /*elseif(!empty($params['type']) && $params['type'] == 'pdf') {
                $symbol = $currency->getPdfCurrencySymbol();
                $symbol_space = false;
            }*/ 
            elseif(!empty($params['type']) && $params['type'] == 'sugarpdf') {
                $symbol = $currency->symbol;
                $symbol_space = false;
            } 
            // END SUGARPDF
            
            else {
                if(empty($currency->symbol))
                    $symbol = $currency->getDefaultCurrencySymbol();
                else 
                    $symbol = $currency->symbol;
                $symbol_space = true;
            }
        } else {
            $symbol = '';
        }
        
        if(isset($params['charset_convert'])) {
            $symbol = $locale->translateCharset($symbol, 'UTF-8', $locale->getExportCharset());
        }
    
        if(empty($params['human'])) {
           $amount = number_format(round($amount, $round), $decimals, $dec_sep, $num_grp_sep);
           $amount = format_place_symbol($amount, $symbol,(empty($params['symbol_space']) ? false : true));     
        } else {
            // If amount is more greater than a thousand(postiive or negative)
            if(strpos($amount, '.') > 0) {
               $checkAmount = strlen(substr($amount, 0, strpos($amount, '.'))); 
            }
            
            if($checkAmount >= 1000 || $checkAmount <= -1000) {
                $amount = round(($amount / 1000), 0);
                $amount = $amount . 'k';
                $amount = format_place_symbol($amount, $symbol,(empty($params['symbol_space']) ? false : true));                
            } else {
                $amount = format_place_symbol($amount, $symbol,(empty($params['symbol_space']) ? false : true));        
            }       
        }
        
        if(!empty($params['percentage']) && $params['percentage']) $amount .= $app_strings['LBL_PERCENTAGE_SYMBOL'];
        return $amount; 
    
    } //end function format_number
?>