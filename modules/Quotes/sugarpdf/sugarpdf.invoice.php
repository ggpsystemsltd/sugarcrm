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


require_once('modules/Quotes/sugarpdf/sugarpdf.standard.php');

class QuotesSugarpdfInvoice extends QuotesSugarpdfStandard{
    
    function preDisplay(){
        global $mod_strings, $timedate;
        parent::preDisplay();
        
        $quote[0]['TITLE'] = $mod_strings['LBL_PDF_INVOICE_NUMBER'];
        $quote[1]['TITLE'] = $mod_strings['LBL_PDF_QUOTE_DATE'];
        $quote[2]['TITLE'] = $mod_strings['LBL_PURCHASE_ORDER_NUM'];
        $quote[3]['TITLE'] = $mod_strings['LBL_PAYMENT_TERMS'];
        $quote[0]['VALUE']['value'] = format_number_display($this->bean->quote_num,$this->bean->system_id);
        $quote[1]['VALUE']['value'] = $timedate->nowDate();
 	$quote[2]['VALUE']['value'] = $this->bean->purchase_order_num;
        $quote[3]['VALUE']['value'] = $this->bean->payment_terms;
        // these options override the params of the $options array.
        $quote[0]['VALUE']['options'] = array();
        $quote[1]['VALUE']['options'] = array();
        $quote[2]['VALUE']['options'] = array();
        $quote[3]['VALUE']['options'] = array();

        $html = $this->writeHTMLTable($quote, true, $this->headerOptions);
        $this->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $mod_strings['LBL_PDF_INVOICE_TITLE'], $html);
    }
    
    /**
     * This method build the name of the PDF file to output.
     */
    function buildFileName(){
        global $mod_strings;
        
        $fileName = preg_replace("#[^A-Z0-9\-_\.]#i", "_", $this->bean->shipping_account_name);
        
        if (!empty($this->bean->quote_num)) {
            $fileName .= "_{$this->bean->quote_num}";
        }
        
        $fileName = $mod_strings['LBL_INVOICE']."_{$fileName}.pdf";
        
        if(isset($_SERVER['HTTP_USER_AGENT']) && preg_match("/MSIE/", $_SERVER['HTTP_USER_AGENT'])) {
            //$fileName = $locale->translateCharset($fileName, $locale->getExportCharset());
            $fileName = urlencode($fileName);
        }
        
        $this->fileName = $fileName;
    }
}
