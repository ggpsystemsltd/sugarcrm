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

 * Description:  TODO: To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/
global $beanFiles;





$db = DBManagerFactory::getInstance();
global $app_strings;
if(!ACLController::checkAccess('Opportunities', 'edit', true)){
	ACLController::displayNoAccess(true);
	sugar_cleanup(true);
}
function send_to_url($redirect_Url)
{
	echo "<script language=javascript>\n";
	echo "<!-- //\n";
	echo "	window.location.href=\"{$redirect_Url}\";\n";
	echo "// -->\n";
	echo "</script>\n";
}

// returns value of number of rows where the name already exists
function query_opportunity_subject_exists($subj)
{
	global $db;

	$subject = $db->quoted($subj);
	$query = "select count(id) as num from opportunities where name = $subject and deleted = 0";
	$check = $db->query($query);

	$row = $db->fetchByAssoc($check);

	return $row["num"];
}

function generate_name_form(&$var)
{
	global $app_strings;
	$retval =  "<br><br>
	<form method=POST action=index.php name=QuoteToOpportunity>
<table class=\"tabForm\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"50%\">
<tbody><tr><td>
	<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
	<tbody><tr>
		<td class=\"dataLabel\" nowrap=\"nowrap\">{$app_strings['LBL_OPPORTUNITY_NAME']}:&nbsp;&nbsp;<input size=\"20\" name=\"opportunity_subject\" class=\"dataField\" value=\"{$var["opportunity_subject"]}\" type=\"text\"></td>
		<td align=\"right\"><input name=\"action\" value=\"index\" type=\"hidden\" nowrap=\"nowrap\">
				<input type=\"hidden\" name=\"module\" value=\"Quotes\">
				<input type=\"hidden\" name=\"record\" value=\"{$var['record']}\">
				<input type=\"hidden\" name=\"team_id\" value=\"{$var['team_id']}\">
				<input type=\"hidden\" name=\"user_id\" value=\"{$var['user_id']}\">
				<input type=\"hidden\" name=\"user_name\" value=\"{$var['user_name']}\">
				<input type=\"hidden\" name=\"action\" value=\"QuoteToOpportunity\">
				<input type=\"hidden\" name=\"opportunity_name\" value=\"{$var['opportunity_name']}\">
				<input type=\"hidden\" name=\"opportunity_id\" value=\"{$var['opportunity_id']}\">
				<input type=\"hidden\" name=\"currency_id\" value=\"{$var['currency_id']}\">
				<input type=\"hidden\" name=\"amount\" value=\"{$var['amount']}\">
				<input type=\"hidden\" name=\"valid_until\" value=\"{$var['valid_until']}\">
		<input title=\"{$app_strings['LBL_SAVE_BUTTON_TITLE']}\" accesskey=\"{$app_strings['LBL_SAVE_BUTTON_KEY']}\" class=\"button\" name=\"button\" value=\"{$app_strings['LBL_SAVE_BUTTON_LABEL']}\" type=\"submit\"></form>
		</td>
		<td align=\"right\">
				<form method=POST action=index.php name=BackToQuote>
				<input type=\"hidden\" name=\"module\" value=\"Quotes\">
				<input type=\"hidden\" name=\"record\" value=\"{$var['record']}\">
				<input type=\"hidden\" name=\"action\" value=\"DetailView\">
				<input title=\"{$app_strings['LBL_CANCEL_BUTTON_TITLE']}\" accesskey=\"{$app_strings['LBL_CANCEL_BUTTON_KEY']}\" class=\"button\" name=\"button\" value=\"{$app_strings['LBL_CANCEL_BUTTON_LABEL']}\" type=\"submit\">
				</form>
      	</td>
	</tr>
	</tbody></table>
</td></tr></tbody></table>";

	echo $retval;
}

if(empty($_REQUEST["opportunity_subject"]))
{
	$LBLITUP = $app_strings['ERR_OPPORTUNITY_NAME_MISSING'];

	printf("<span class=\"error\">$LBLITUP</span>");
	generate_name_form($_REQUEST);
}
elseif(query_opportunity_subject_exists($_REQUEST["opportunity_subject"]) > 0)
{
	$LBLITUP = $app_strings['ERR_OPPORTUNITY_NAME_DUPE'];

	printf("<span class=\"error\">$LBLITUP</span>", $_REQUEST["opportunity_subject"]);
	generate_name_form($_REQUEST);
}
else
{
	$opp = new Opportunity();
	printf("%s<br><br>", $opp->id);
	$opp->assigned_user_id = $_REQUEST["user_id"];
	$opp->date_closed = $_REQUEST["valid_until"];
	$opp->name = $_REQUEST["opportunity_subject"];
	$opp->assigned_user_name = $_REQUEST["user_name"];
	$opp->lead_source = isset($app_list_strings['lead_source_dom']['Self Generated']) ? 'Self Generated': null;//'Self Generated';
	$opp->sales_stage = isset($app_list_strings['sales_stage_dom']['Proposal/Price Quote']) ? 'Proposal/Price Quote': null;//'Proposal/Price Quote';
	$opp->probability = isset($app_list_strings['sales_probability_dom']['Proposal/Price Quote']) ? $app_list_strings['sales_probability_dom']['Proposal/Price Quote']: null;//'Proposal/Price Quote';
	$opp->opportunity_type = isset($app_list_strings['opportunity_type_dom']['New Business']) ? $app_list_strings['opportunity_type_dom']['New Business']: null;//'New Business';
	$opp->team_id = $_REQUEST["team_id"];
	if(empty($_REQUEST["amount"])) {
		$amount = (float)0;
	} else {
        // We need to unformat the amount before we try and stick it in a bean
        $amount=(float)$_REQUEST["amount"];
	}
	$account_id = $_REQUEST["opportunity_id"];
	$opp->amount = $amount;
	$opp->quote_id = $_REQUEST['record'];
	$opp->currency_id = $_REQUEST['currency_id'];
	$opp->account_id = $account_id;
	$opp->save();


	//link quote contracts with the opportunity.
	$quote = new Quote();
	$quote->retrieve($_REQUEST['record']);
	$quote->load_relationship('contracts');
	$contracts=$quote->contracts->get();

	if (is_array($contracts)) {
		$opp->load_relationship('contracts');
		foreach ($contracts as $id) {
			$opp->contracts->add($id);
		}
	}

	$redirect_Url = "index.php?action=DetailView&module=Opportunities&record=" . $opp->id;
	send_to_url($redirect_Url);
}

?>
