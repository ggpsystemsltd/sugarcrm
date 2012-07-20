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





require_once('modules/DataSets/DataSet_Attribute.php');
require_once('modules/DataSets/DataSet_Layout.php');



//Create new Custom Queries
$query_object1 = new CustomQuery();
$query_object1->name = $mod_strings['LBL_Q']."1";
$query_object1->description = $mod_strings['LBL_Q1_DESC'];
$query_object1->query_locked = "off";
$query_object1->team_id = 1;

$m_closed = $query_object1->db->convert('opportunities.date_closed', 'month');
$today = $query_object1->db->convert('', 'today');
$m_date[0] = $query_object1->db->convert($today, 'month');
for($i=1;$i<6;$i++)
{
    $m_date[$i] = $query_object1->db->convert($query_object1->db->convert($today, 'add_date', array($i, 'month')), 'month');
}
$m_date5 = $query_object1->db->convert($today, 'add_date', array(5, "month"));

	$query_object1->custom_query = "(
SELECT
 'New Business' \"Opportunity Type\",
sum( case when $m_closed = $m_date[0] then opportunities.amount_usdollar else 0 end ) \"{sc}0{sc}0\",
sum( case when $m_closed = $m_date[1] then opportunities.amount_usdollar else 0 end ) \"{sc}0{sc}1\",
sum( case when $m_closed = $m_date[2] then opportunities.amount_usdollar else 0 end ) \"{sc}0{sc}2\",
sum( case when $m_closed = $m_date[3] then opportunities.amount_usdollar else 0 end ) \"{sc}0{sc}3\",
sum( case when $m_closed = $m_date[4] then opportunities.amount_usdollar else 0 end ) \"{sc}0{sc}4\",
sum( case when $m_closed = $m_date[5] then opportunities.amount_usdollar else 0 end ) \"{sc}0{sc}5\",
SUM(opportunities.amount_usdollar) AS \"Total Revenue\"
FROM opportunities
 LEFT JOIN accounts_opportunities
ON opportunities.id=accounts_opportunities.opportunity_id
LEFT JOIN accounts
ON accounts_opportunities.account_id=accounts.id
WHERE opportunities.date_closed <= $m_date5 AND  opportunities.date_closed >= $today AND opportunities.opportunity_type = 'New Business'
) UNION (
SELECT
 'Existing Business' \"Opportunity Type\",
sum( case when $m_closed = $m_date[0] then opportunities.amount_usdollar else 0 end ) \"{sc}0{sc}0\",
sum( case when $m_closed = $m_date[1] then opportunities.amount_usdollar else 0 end ) \"{sc}0{sc}1\",
sum( case when $m_closed = $m_date[2] then opportunities.amount_usdollar else 0 end ) \"{sc}0{sc}2\",
sum( case when $m_closed = $m_date[3] then opportunities.amount_usdollar else 0 end ) \"{sc}0{sc}3\",
sum( case when $m_closed = $m_date[4] then opportunities.amount_usdollar else 0 end ) \"{sc}0{sc}4\",
sum( case when $m_closed = $m_date[5] then opportunities.amount_usdollar else 0 end ) \"{sc}0{sc}5\",
SUM(opportunities.amount_usdollar) AS \"Total Revenue\"
FROM opportunities
 LEFT JOIN accounts_opportunities
ON opportunities.id=accounts_opportunities.opportunity_id
LEFT JOIN accounts
ON accounts_opportunities.account_id=accounts.id
WHERE opportunities.date_closed <= $m_date5 AND  opportunities.date_closed >= $today AND opportunities.opportunity_type = 'Existing Business'
) UNION (
SELECT
 'Total Revenue' \"Opportunity Type\",
sum( case when $m_closed = $m_date[0] then opportunities.amount_usdollar else 0 end ) \"{sc}0{sc}0\",
sum( case when $m_closed = $m_date[1] then opportunities.amount_usdollar else 0 end ) \"{sc}0{sc}1\",
sum( case when $m_closed = $m_date[2] then opportunities.amount_usdollar else 0 end ) \"{sc}0{sc}2\",
sum( case when $m_closed = $m_date[3] then opportunities.amount_usdollar else 0 end ) \"{sc}0{sc}3\",
sum( case when $m_closed = $m_date[4] then opportunities.amount_usdollar else 0 end ) \"{sc}0{sc}4\",
sum( case when $m_closed = $m_date[5] then opportunities.amount_usdollar else 0 end ) \"{sc}0{sc}5\",
SUM(opportunities.amount_usdollar) AS \"Total Revenue\"
FROM opportunities
 LEFT JOIN accounts_opportunities
ON opportunities.id=accounts_opportunities.opportunity_id
LEFT JOIN accounts
ON accounts_opportunities.account_id=accounts.id
WHERE opportunities.date_closed <= $m_date5 AND  opportunities.date_closed >= $today
)";
$query_object1->save();


$query_object2 = new CustomQuery();
$query_object2->name = $mod_strings['LBL_Q']."2";
$query_object2->description = $mod_strings['LBL_Q2_DESC'];
$query_object2->query_locked = "off";
$query_object2->team_id = 1;

$query_object2->custom_query = "SELECT
	accounts.name \"Account Name\",
	sum( case when $m_closed = $m_date[0] then opportunities.amount_usdollar else 0 end ) \"{sc}0{sc}0\",
	sum( case when $m_closed = $m_date[1] then opportunities.amount_usdollar else 0 end ) \"{sc}0{sc}1\",
	sum( case when $m_closed = $m_date[2] then opportunities.amount_usdollar else 0 end ) \"{sc}0{sc}2\",
	sum( case when $m_closed = $m_date[3] then opportunities.amount_usdollar else 0 end ) \"{sc}0{sc}3\",
	sum( case when $m_closed = $m_date[4] then opportunities.amount_usdollar else 0 end ) \"{sc}0{sc}4\",
	sum( case when $m_closed = $m_date[5] then opportunities.amount_usdollar else 0 end ) \"{sc}0{sc}5\",
	SUM(opportunities.amount_usdollar) AS \"Total Revenue\"
	FROM opportunities
	 LEFT JOIN accounts_opportunities
	ON opportunities.id=accounts_opportunities.opportunity_id
	LEFT JOIN accounts
	ON accounts_opportunities.account_id=accounts.id
	WHERE opportunities.date_closed <= $m_date5
	AND opportunities.date_closed >= $today
	GROUP BY accounts.id, accounts.name ORDER BY accounts.name
	";
$query_object2->save();


$query_id1 = $query_object1->id;
$query_id2 = $query_object2->id;

//Create new Report
$report_object = new ReportMaker();
$report_object->name = $mod_strings['LBL_R1'];
$report_object->title = $mod_strings['LBL_R1'];
$report_object->description = $mod_strings['LBL_R1_DESC'];
$report_object->report_align = "center";
$report_object->team_id = 1;
$report_object->save();

$report_id = $report_object->id;



//Create the data sets for the two custom queries

$format_object = new DataSet();

$format_object->name = $mod_strings['LBL_OPP']."1";
$format_object->description = $mod_strings['LBL_OPP1_DESC'];
$format_object->report_id = $report_id;
$format_object->query_id = $query_id1;
$format_object->list_order_y = 0;
$format_object->exportable = "on";
$format_object->header = "on";
$format_object->table_width = 100;
$format_object->font_size = "Default";
$format_object->output_default = "table";
$format_object->prespace_y = "off";
$format_object->use_prev_header = "off";
$format_object->table_width_type = "%";
$format_object->custom_layout = "Enabled";
$format_object->team_id = 1;
$format_object->header_back_color = "blue";
$format_object->body_back_color = "white";
$format_object->header_text_color = "white";
$format_object->body_text_color = "blue";




/////////////Second Data Set

$format_object2 = new DataSet();

$format_object2->name = $mod_strings['LBL_OPP']."2";
$format_object2->description = $mod_strings['LBL_OPP2_DESC'];
$format_object2->report_id = $report_id;
$format_object2->query_id = $query_id2;
$format_object2->list_order_y = 1;
$format_object2->exportable = "on";
$format_object2->header = "on";
$format_object2->table_width = 100;
$format_object2->font_size = "Default";
$format_object2->output_default = "table";
$format_object2->prespace_y = "on";
$format_object2->use_prev_header = "on";
$format_object2->table_width_type = "%";
$format_object2->custom_layout = "Enabled";
$format_object2->team_id = 1;

$format_object->save();
$format_object->enable_custom_layout();



$format_object2->save();
$format_object2->enable_custom_layout();



///////////////Get the attribute metadata ready///////
$start_body_array = array(
'display_type' =>'Normal',
'attribute_type' =>'Body',
'font_size' =>'Default',
'cell_size' =>'250',
'size_type' =>'px',
'wrap' =>'off',
'style' =>'normal',
'format_type' =>'Text',
);

$scalar_head_array = array(
'display_type' =>'Scalar',
'attribute_type' =>'Head',
'font_size' =>'Default',
'wrap' =>'off',
'style' =>'normal',
'format_type' =>'Month',
);


$scalar_body_array = array(
'display_type' =>'Normal',
'attribute_type' =>'Body',
'font_size' =>'Default',
'size_type' =>'px',
'wrap' =>'off',
'style' =>'normal',
'format_type' =>'Accounting',
);


//Populate thet dataset_attribute


	$layout_id = $format_object->get_layout_id_from_parent_value("Opportunity Type");
	$body_object = new DataSet_Attribute();
	$body_object->parent_id = $layout_id;
	foreach($start_body_array as $key => $value){
		$body_object->$key = $value;
	}
	$body_object->save();

////Fill in attributes for all the scalar columns
	for ($i = 0; $i <= 5; $i++) {

		$layout_id = $format_object->get_layout_id_from_parent_value("{sc}0{sc}".$i."");
		$body_object = new DataSet_Attribute();
		$body_object->parent_id = $layout_id;
		foreach($scalar_body_array as $key => $value){
			$body_object->$key = $value;
		}
		$body_object->save();
		$head_object = new DataSet_Attribute();
		$head_object->parent_id = $layout_id;
		foreach($scalar_head_array as $key => $value){
			$head_object->$key = $value;
		}
		$head_object->save();
	//end the for loop on scalar
	}

////Fill in attributes for all the scalar columns
	for ($i = 0; $i <= 5; $i++) {

		$layout_id = $format_object2->get_layout_id_from_parent_value("{sc}0{sc}".$i."");
		$body_object = new DataSet_Attribute();
		$body_object->parent_id = $layout_id;
		foreach($scalar_body_array as $key => $value){
			$body_object->$key = $value;
		}
		$body_object->save();
		$head_object = new DataSet_Attribute();
		$head_object->parent_id = $layout_id;
		foreach($scalar_head_array as $key => $value){
			$head_object->$key = $value;
		}
		$head_object->save();
	//end the for loop on scalar
	}


//////////////////Fill the Total Revenue Columns

		$layout_id = $format_object->get_layout_id_from_parent_value("Total Revenue");
		$body_object = new DataSet_Attribute();
		$body_object->parent_id = $layout_id;
		foreach($scalar_body_array as $key => $value){
			$body_object->$key = $value;
		}
		$body_object->save();

		$layout_id = $format_object2->get_layout_id_from_parent_value("Total Revenue");
		$body_object = new DataSet_Attribute();
		$body_object->parent_id = $layout_id;
		foreach($scalar_body_array as $key => $value){
			$body_object->$key = $value;
		}
		$body_object->save();


?>
