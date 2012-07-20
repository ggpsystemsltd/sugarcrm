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


require_once('modules/Quotes/sugarpdf/sugarpdf.quotes.php');

class QuotesSugarpdfStandard extends QuotesSugarpdfQuotes{
    /**
     * Options array for the header table.
     * @var Array
     */
    protected $headerOptions;
     /**
     * Options array for the addresses table.
     * @var Array
     */
    private $addressOptions;
     /**
     * Options array for the table containing all the items.
     * @var Array
     */
    private $itemOptions;
     /**
     * Options array for the total table.
     * @var Array
     */
    private $totalOptions;
     /**
     * Options array for the grand total table.
     * @var Array
     */
    private $grandTotalOptions;

    private function _initOptions(){
        global $mod_strings;
        $this->headerOptions = array(
                      "isheader"=>false,
                      "TD"=>array("bgcolor"=>"#DCDCDC"),
                      "table"=>array("cellspacing"=>"2", "border"=>"0"),
        );
        $this->addressOptions = array(
                      "isheader"=>true,
                      "header"=>array("tr"=>array("bgcolor"=>"#4B4B4B"), "td"=>array("style"=>"color:#FFFFFF; font-weight:bold")),
                      "table"=>array("cellspacing"=>"2", "border"=>"0", "width"=>"50%"),
        );
        $this->itemOptions = array(
                        //"evencolor"=>"#FF0000",
                        //"oddcolor"=>"#FF00FF",
                        "header"=>array("fill"=>"#4B4B4B", "fontStyle"=>"B", "textColor"=>"#FFFFFF"),
                        "width"=>array(
                            $mod_strings["LBL_PDF_ITEM_QUANTITY"] => "10%",
                            // for the next two vars, if you change the value, change the value below in the else block in the display() function
                            $mod_strings["LBL_PDF_PART_NUMBER"] => "25%",
                            $mod_strings["LBL_PDF_ITEM_PRODUCT"] => "25%",
                            $mod_strings["LBL_PDF_ITEM_LIST_PRICE"] => "10%",
                            $mod_strings["LBL_PDF_ITEM_UNIT_PRICE"] => "10%",
                            $mod_strings["LBL_PDF_ITEM_EXT_PRICE"] => "10%",
                            $mod_strings["LBL_PDF_ITEM_DISCOUNT"] =>"10%"
         //                   $mod_strings["LBL_PDF_ITEM_SELECT_DISCOUNT"]=>"8%"
                        ),
                        'stretch' => array(
                            $mod_strings["LBL_PDF_ITEM_LIST_PRICE"] => Sugarpdf::STRETCH_SCALE,
                            $mod_strings["LBL_PDF_ITEM_UNIT_PRICE"] => Sugarpdf::STRETCH_SCALE,
                            $mod_strings["LBL_PDF_ITEM_EXT_PRICE"] => Sugarpdf::STRETCH_SCALE,
                            $mod_strings["LBL_PDF_ITEM_DISCOUNT"] => Sugarpdf::STRETCH_SCALE
                        )
        );
        $this->totalOptions = array(
                            "isheader"=>false,
                            "width"=>array(
                                "BLANK"=>"70%",
                                "TITLE"=>"15%",
                                "VALUE"=>"15%",
                            ),
        );
        $this->grandTotalOptions = array(
                "isheader"=>false,
                "width"=>array(
                    "BLANK"=>"40%",
                    "TITLE0"=>"15%",
                    "VALUE0"=>"15%",
                    "TITLE"=>"15%",
                    "VALUE"=>"15%",
                ),
        );
    }
    function preDisplay(){
        global $mod_strings, $timedate, $user;
        parent::preDisplay();
        $this->_initOptions();
        //retrieve the sales person's first name
        global $beanFiles;
        require_once($beanFiles['User']);
        $rep = new User;
        $rep->retrieve($this->bean->assigned_user_id);

        $quote[0]['TITLE'] = $mod_strings['LBL_PDF_QUOTE_NUMBER'];
        $quote[1]['TITLE'] = $mod_strings['LBL_PDF_QUOTE_DATE'];
        $quote[2]['TITLE'] = $mod_strings['LBL_PDF_SALES_PERSON'];
        $quote[3]['TITLE'] = $mod_strings['LBL_PDF_QUOTE_CLOSE'];

        $quote[0]['VALUE']['value'] = format_number_display($this->bean->quote_num,$this->bean->system_id);
        $quote[1]['VALUE']['value'] = $timedate->nowDate();
	    $quote[2]['VALUE']['value'] = $rep->first_name.' '.$rep->last_name;
        $quote[3]['VALUE']['value'] = $this->bean->date_quote_expected_closed;

        // these options override the params of the $options array.
        $quote[0]['VALUE']['options'] = array();
        $quote[1]['VALUE']['options'] = array();
        $quote[2]['VALUE']['options'] = array();
        $quote[3]['VALUE']['options'] = array();

        $html = $this->writeHTMLTable($quote, true, $this->headerOptions);
        $this->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $mod_strings['LBL_PDF_QUOTE_TITLE'], $html);
    }
    function display(){
        global $mod_strings, $app_strings, $app_list_strings;
        global $locale;

        require_once('modules/Quotes/Quote.php');
        require('modules/Quotes/config.php');

        parent::display();

        // cn: bug 8587 handle strings for export
        /*$mod_strings        = $locale->translateStringPack($mod_strings, $locale->getExportCharset());
        $app_strings        = $locale->translateStringPack($app_strings, $locale->getExportCharset());
        $app_list_strings   = $locale->translateStringPack($app_list_strings, $locale->getExportCharset());
        */
        $GLOBALS['log']->info("Quote layout view: Invoice");

        $addressBS[0][$mod_strings['LBL_PDF_BILLING_ADDRESS']]  = $this->bean->billing_contact_name;
        $addressBS[1][$mod_strings['LBL_PDF_BILLING_ADDRESS']]  = $this->bean->billing_account_name;
        $addressBS[2][$mod_strings['LBL_PDF_BILLING_ADDRESS']]  = $this->bean->billing_address_street;
        if(!empty($this->bean->billing_address_city) || !empty($this->bean->billing_address_state) || !empty($this->bean->billing_address_postalcode)) {
            $addressBS[3][$mod_strings['LBL_PDF_BILLING_ADDRESS']]  = $this->bean->billing_address_city.", ".$this->bean->billing_address_state."  ".$this->bean->billing_address_postalcode;
        }else{
            $addressBS[3][$mod_strings['LBL_PDF_BILLING_ADDRESS']]  = '';
        }
        $addressBS[4][$mod_strings['LBL_PDF_BILLING_ADDRESS']]  = $this->bean->billing_address_country;

        $addressBS[0][$mod_strings['LBL_PDF_SHIPPING_ADDRESS']]  = $this->bean->shipping_contact_name;
        $addressBS[1][$mod_strings['LBL_PDF_SHIPPING_ADDRESS']]  = $this->bean->shipping_account_name;
        $addressBS[2][$mod_strings['LBL_PDF_SHIPPING_ADDRESS']]  = $this->bean->shipping_address_street;
        if(!empty($this->bean->shipping_address_city) || !empty($this->bean->shipping_address_state) || !empty($this->bean->shipping_address_postalcode)) {
            $addressBS[3][$mod_strings['LBL_PDF_SHIPPING_ADDRESS']]  = $this->bean->shipping_address_city.", ".$this->bean->shipping_address_state."  ".$this->bean->shipping_address_postalcode;
        }else{
            $addressBS[3][$mod_strings['LBL_PDF_SHIPPING_ADDRESS']]  = '';
        }
        $addressBS[4][$mod_strings['LBL_PDF_SHIPPING_ADDRESS']]  = $this->bean->shipping_address_country;


        // Write the Billing/Shipping array
        $this->writeHTMLTable($addressBS, false, $this->addressOptions);

        require_once('modules/Currencies/Currency.php');
        $currency = new Currency();
        ////    settings
        $format_number_array = array(
            'currency_symbol' => true,
            'type' => 'sugarpdf',
            'currency_id' => $this->bean->currency_id,
            'charset_convert' => true, /* UTF-8 uses different bytes for Euro and Pounds */
        );
        $currency->retrieve($this->bean->currency_id);
        //kbrill Bug#11569 - When Quotes are printed as Proposals or Invoices, multiple product groups are out of order from the original quote
        //$product_bundle_list = $this->bean->get_product_bundles();
        $product_bundle_list = $this->bean->get_linked_beans('product_bundles','ProductBundle');

        if(is_array($product_bundle_list)){
            $ordered_bundle_list = array();
            foreach ($product_bundle_list as $id => $bean)
            {
                $index = $bean->get_index($this->bean->id);
				$ordered_bundle_list[(int)$index[0]['bundle_index']] = $bean;
			} //for
			ksort($ordered_bundle_list);

            foreach ($ordered_bundle_list as $product_bundle) {

                if(isset($this->bean->show_line_nums) && $this->bean->show_line_nums == 1){
                    //$options['showRowCount']=1;
                }
                if(key_exists($product_bundle->bundle_stage, $in_total_group_stages)){
                    $count = 0;
                    $item = array();
                    $product_list = $product_bundle->get_products();
                    if (is_array($product_list)) {

                        $bundle_list = $product_bundle->get_product_bundle_line_items();
                        if (is_array($bundle_list)) {
                            while (list($key, $line_item) = each ($bundle_list)) {

                                if ($line_item->object_name == "Product") {
                                    $item[$count][$mod_strings['LBL_PDF_ITEM_QUANTITY']] = format_number_sugarpdf($line_item->quantity, 0, 0);
                                    $item[$count][$mod_strings['LBL_PDF_PART_NUMBER']] = $line_item->mft_part_num;
                                    $item[$count][$mod_strings['LBL_PDF_ITEM_PRODUCT']] = stripslashes($line_item->name);
                                    if(!empty($line_item->description)){
                                        $item[$count][$mod_strings['LBL_PDF_ITEM_PRODUCT']] .= "\n" . stripslashes($line_item->description);
                                    }

                                    $item[$count][$mod_strings['LBL_PDF_ITEM_LIST_PRICE']]['value'] = format_number_sugarpdf($line_item->list_usdollar, $locale->getPrecision(), $locale->getPrecision(), array_merge($format_number_array, array('convert' => true)));
                                    $item[$count][$mod_strings['LBL_PDF_ITEM_UNIT_PRICE']]['value'] = format_number_sugarpdf($line_item->discount_usdollar, $locale->getPrecision(), $locale->getPrecision(), array_merge($format_number_array, array('convert' => true)));
                                    $item[$count][$mod_strings['LBL_PDF_ITEM_EXT_PRICE']]['value'] = format_number_sugarpdf($line_item->discount_usdollar * $line_item->quantity, $locale->getPrecision(), $locale->getPrecision(), array_merge($format_number_array, array('convert' => true)));
								    if(format_number($product_bundle->deal_tot, $locale->getPrecision(), $locale->getPrecision())!= 0.00){
		                                if($line_item->discount_select){
		                                $item[$count][$mod_strings['LBL_PDF_ITEM_DISCOUNT']]['value'] = format_number($line_item->discount_amount, $locale->getPrecision(), $locale->getPrecision())."%";
		                                }
		                                else{
		                                $item[$count][$mod_strings['LBL_PDF_ITEM_DISCOUNT']]['value'] = format_number_sugarpdf($line_item->discount_amount, $locale->getPrecision(), $locale->getPrecision(), array_merge($format_number_array, array('convert' => false)));
		                                }
	                                    $item[$count][$mod_strings['LBL_PDF_ITEM_DISCOUNT']]['options'] = array("align"=>"R");
		                            }

                                    $item[$count][$mod_strings['LBL_PDF_ITEM_LIST_PRICE']]['options'] = array("align"=>"R");
                                    $item[$count][$mod_strings['LBL_PDF_ITEM_UNIT_PRICE']]['options'] = array("align"=>"R");
                                    $item[$count][$mod_strings['LBL_PDF_ITEM_EXT_PRICE']]['options'] = array("align"=>"R");
                                    $count++;
                                }
                                else if ($line_item->object_name == "ProductBundleNote") {
                                    $item[$count][$mod_strings['LBL_PDF_ITEM_QUANTITY']] = "";
                                    $item[$count][$mod_strings['LBL_PDF_PART_NUMBER']] = "";
                                    $item[$count][$mod_strings['LBL_PDF_ITEM_PRODUCT']] = stripslashes($line_item->description);
                                    $item[$count][$mod_strings['LBL_PDF_ITEM_LIST_PRICE']] = "";
                                    $item[$count][$mod_strings['LBL_PDF_ITEM_UNIT_PRICE']] = "";
                                    $item[$count][$mod_strings['LBL_PDF_ITEM_EXT_PRICE']] = "";
        							$item[$count][$mod_strings['LBL_PDF_ITEM_DISCOUNT']] = "";
        		                    //$item[$count][$mod_strings['LBL_PDF_ITEM_SELECT_DISCOUNT']] = "";
                                    $count++;
                                }
                            }
                        }
                    }
                    $this->MultiCell(0,0, "<b>".$product_bundle->name."</b>" ,0,'L',0,1,"","",true,0,true);

				    if(format_number($product_bundle->deal_tot, $locale->getPrecision(), $locale->getPrecision())== 0.00){
						$this->itemOptions["width"][$mod_strings["LBL_PDF_PART_NUMBER"]] = "30%";
						$this->itemOptions["width"][$mod_strings["LBL_PDF_ITEM_PRODUCT"]] = "30%";
				    }
				    else{
				        // If you change these two values, change the values above in the _initOptions() function to match these
						$this->itemOptions["width"][$mod_strings["LBL_PDF_PART_NUMBER"]] = "25%";
						$this->itemOptions["width"][$mod_strings["LBL_PDF_ITEM_PRODUCT"]] = "25%";
				    }
				    
					if (count($item) > 0)
                    	$this->writeCellTable($item, $this->itemOptions);
                    if($pdf_group_subtotal){
                        $total = array();

                        $total[0]['BLANK'] = ' ';
                        $total[0]['TITLE'] =  $mod_strings['LBL_PDF_SUBTOTAL'];
                        $total[0]['VALUE']['value'] = format_number_sugarpdf($product_bundle->subtotal, $locale->getPrecision(), $locale->getPrecision(), $format_number_array);
                        $total[0]['VALUE']['options'] = array("align"=>"R");
						$i = 1;
						if(format_number_sugarpdf($product_bundle->deal_tot, $locale->getPrecision(), $locale->getPrecision())!= 0.00){
	                        $total[1]['BLANK'] = ' ';
	                		$total[1]['TITLE'] =  $mod_strings['LBL_PDF_DISCOUNT'];
	                		$total[1]['VALUE']['value'] = format_number_sugarpdf($product_bundle->deal_tot, $locale->getPrecision(), $locale->getPrecision(), $format_number_array);
	                        $total[1]['VALUE']['options'] = array("align"=>"R");

	                        $total[2]['BLANK'] = ' ';
	                		$total[2]['TITLE'] =  $mod_strings['LBL_PDF_NEW_SUB'];
	                		$total[2]['VALUE']['value'] = format_number_sugarpdf($product_bundle->new_sub, $locale->getPrecision(), $locale->getPrecision(), $format_number_array);
	                        $total[2]['VALUE']['options'] = array("align"=>"R");
	                        $i = 3;
						}
                        $total[$i]['BLANK'] = ' ';
                        $total[$i]['TITLE'] = $mod_strings['LBL_PDF_TAX'];
                        $total[$i]['VALUE']['value'] =  format_number_sugarpdf($product_bundle->tax, $locale->getPrecision(), $locale->getPrecision(), $format_number_array);
                        $total[$i]['VALUE']['options'] = array("align"=>"R");
                        $i++;
                        $total[$i]['BLANK'] = ' ';
                        $total[$i]['TITLE'] = $mod_strings['LBL_PDF_SHIPPING'];
                        $total[$i]['VALUE']['value'] =  format_number_sugarpdf($product_bundle->shipping, $locale->getPrecision(), $locale->getPrecision(), $format_number_array);
                        $total[$i]['VALUE']['options'] = array("align"=>"R");
                        $i++;
                        $total[$i]['BLANK'] = ' ';
                        $total[$i]['TITLE'] = $mod_strings['LBL_PDF_TOTAL'];
                        $total[$i]['VALUE']['value'] =  format_number_sugarpdf($product_bundle->total, $locale->getPrecision(), $locale->getPrecision(), $format_number_array);
                        $total[$i]['VALUE']['options'] = array("align"=>"R");


                        $this->drawLine();

                        $this->writeCellTable($total, $this->totalOptions);
                    }
                }
            }
        }

        if(isset($this->bean->calc_grand_total) && $this->bean->calc_grand_total == 1) {
            $total = array();

            $total[0]['BLANK'] = ' ';
            $total[0]['TITLE0'] = $mod_strings['LBL_PDF_CURRENCY'];
            $total[0]['VALUE0'] = $currency->iso4217;
            $total[0]['TITLE'] = $mod_strings['LBL_PDF_SUBTOTAL'];
            $total[0]['VALUE']['value'] = format_number_sugarpdf($this->bean->subtotal, $locale->getPrecision(), $locale->getPrecision(), $format_number_array);
            $total[0]['VALUE']['options'] = array("align"=>"R");

			$i = 1;
			if(format_number_sugarpdf($this->bean->deal_tot, $locale->getPrecision(), $locale->getPrecision())!= 0.00){

	            $total[1]['BLANK'] = ' ';
			    $total[1]['TITLE0'] = '';
			    $total[1]['VALUE0'] ='';
			    $total[1]['TITLE'] = $mod_strings['LBL_PDF_DISCOUNT'];
			    $total[1]['VALUE']['value'] = format_number_sugarpdf($this->bean->deal_tot, $locale->getPrecision(), $locale->getPrecision(), $format_number_array);
	            $total[1]['VALUE']['options'] = array("align"=>"R");

	            $total[2]['BLANK'] = ' ';
			    $total[2]['TITLE0'] = '';
			    $total[2]['VALUE0'] ='';
			    $total[2]['TITLE'] = $mod_strings['LBL_PDF_NEW_SUB'];
			    $total[2]['VALUE']['value'] = format_number_sugarpdf($this->bean->new_sub, $locale->getPrecision(), $locale->getPrecision(), $format_number_array);
	            $total[2]['VALUE']['options'] = array("align"=>"R");
	            $i = 3;
			}
            $total[$i]['BLANK'] = ' ';
            $total[$i]['TITLE0'] = $mod_strings['LBL_PDF_TAX_RATE'];
            $total[$i]['VALUE0'] = format_number_sugarpdf($this->bean->taxrate_value, $locale->getPrecision(), $locale->getPrecision(), array('percentage' => true));
            $total[$i]['TITLE'] = $mod_strings['LBL_PDF_TAX'];
            $total[$i]['VALUE']['value'] =  format_number_sugarpdf($this->bean->tax, $locale->getPrecision(), $locale->getPrecision(), $format_number_array);
            $total[$i]['VALUE']['options'] = array("align"=>"R");
            $i++;
            $total[$i]['BLANK'] = ' ';
            $total[$i]['TITLE0'] = $mod_strings['LBL_PDF_SHIPPING_COMPANY'];
            $total[$i]['VALUE0'] = $this->bean->shipper_name;
            $total[$i]['TITLE'] = $mod_strings['LBL_PDF_SHIPPING'];
            $total[$i]['VALUE']['value'] =  format_number_sugarpdf($this->bean->shipping, $locale->getPrecision(), $locale->getPrecision(), $format_number_array);
            $total[$i]['VALUE']['options'] = array("align"=>"R");
            $i++;
            $total[$i]['BLANK'] = ' ';
            $total[$i]['TITLE0'] = '';
            $total[$i]['VALUE0'] ='';
            $total[$i]['TITLE'] = $mod_strings['LBL_PDF_TOTAL'];
            $total[$i]['VALUE']['value'] =  format_number_sugarpdf($this->bean->total, $locale->getPrecision(), $locale->getPrecision(), $format_number_array);
            $total[$i]['VALUE']['options'] = array("align"=>"R");


            $this->Ln1();
            $this->drawLine();

            $this->MultiCell(0,0, "<b>".$mod_strings['LBL_PDF_GRAND_TOTAL']."</b>" ,0,'C',0,1,"","",true,0,true);

            $this->writeCellTable($total, $this->grandTotalOptions);

            $this->drawLine();
        }
    }

    /**
     * This method build the name of the PDF file to output.
     */
    function buildFileName(){
        global $mod_strings;
        $fileName = str_replace(array('/', '\\'), '_', html_entity_decode($this->bean->shipping_account_name, ENT_QUOTES, 'UTF-8'));//bug #8584

        if (!empty($this->bean->quote_num)) {
            $fileName .= "_{$this->bean->quote_num}";
        }
        $fileName = $mod_strings['LBL_PROPOSAL'].'_' . $fileName . '.pdf';
        if(isset($_SERVER['HTTP_USER_AGENT']) && preg_match("/MSIE/", $_SERVER['HTTP_USER_AGENT'])) {
            //$fileName = $locale->translateCharset($fileName, $locale->getExportCharset());
            $fileName = urlencode($fileName);
        }
        $this->fileName = $fileName;
    }
}
