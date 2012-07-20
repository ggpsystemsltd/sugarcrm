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




require_once('include/upload_file.php');

require_once('include/DetailView/DetailView.php');
require_once('modules/KBDocuments/SearchUtils.php');

global $app_strings;
global $mod_strings;
global $app_list_strings;
global $gridline;


$mod_strings = return_module_language($current_language, 'KBDocuments');

$focus = new KBDocument();
$detailView = new DetailView();
$offset=0;

if (isset($_REQUEST['offset']) or isset($_REQUEST['record'])) {
	$result = $detailView->processSugarBean("KBDOCUMENT", $focus, $offset);
	if($result == null) {
	    sugar_die($app_strings['ERROR_NO_RECORD']);
	}
	$focus=$result;
} else {
	header("Location: index.php?module=Accounts&action=index");
}

$old_id="";
if(isset($_REQUEST['isDuplicate']) && $_REQUEST['isDuplicate'] == 'true') {

	$focus->id = "";
}

$params = array();
$params[] = $focus->kbdocument_name;

echo getClassicModuleTitle("KBDocuments", $params, true);


$GLOBALS['log']->info("KBDocument detail view");

$xtpl=new XTemplate ('modules/KBDocuments/DetailView.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);

if (isset($_REQUEST['return_module'])) $xtpl->assign("RETURN_MODULE", $_REQUEST['return_module']);
if (isset($_REQUEST['return_action'])) $xtpl->assign("RETURN_ACTION", $_REQUEST['return_action']);
if (isset($_REQUEST['return_id'])) $xtpl->assign("RETURN_ID", $_REQUEST['return_id']);
$xtpl->assign("ADVANCED_SEARCH_IMAGE", SugarThemeRegistry::current()->getImageURL('advanced_search.gif'));
$xtpl->assign("BASIC_SEARCH_IMAGE", SugarThemeRegistry::current()->getImageURL('basic_search.gif'));
$xtpl->assign("GRIDLINE", $gridline);
$xtpl->assign("PRINT_URL", "index.php?".$GLOBALS['request_string']);
$xtpl->assign("ID", $focus->id);

$xtpl->assign("DOCUMENT_NAME", $focus->kbdocument_name);
//$xtpl->assign("REVISION", $focus->latest_revision);
$xtpl->assign("REVISION",$focus->kbdocument_revision_number);


global $locale;

$xtpl->assign("KBDOC_TAGS",KBDocument::get_kbdoc_tags_heirarchy($focus->id,"Detail"));
//get the document body
$article_body = KBDocument::get_kbdoc_body_without_incrementing_count($focus->id);
$xtpl->assign("KBDOC_BODY",from_html($article_body));
$xtpl->assign("KBDOC_ATTS",KBDocument::get_kbdoc_attachments($focus->id,"Detail"));

if(isset($focus->status_id) && isset($app_list_strings['kbdocument_status_dom']) && isset($app_list_strings['kbdocument_status_dom'][$focus->status_id])){
	$xtpl->assign("STATUS", $app_list_strings['kbdocument_status_dom'][$focus->status_id]);
 }
$xtpl->assign("FILE_URL", $focus->file_url);
$xtpl->assign("ACTIVE_DATE", $focus->active_date);
$xtpl->assign("EXP_DATE", $focus->exp_date);
$xtpl->assign("FILE_NAME", $focus->filename);
$xtpl->assign("FILE_URL_NOIMAGE", $focus->file_url_noimage);
$xtpl->assign("LAST_REV_CREATOR", $focus->last_rev_created_name);


if (isset($focus->last_rev_create_date)) {
	$xtpl->assign("LAST_REV_DATE", $focus->last_rev_create_date);
} else {
	$xtpl->assign("LAST_REV_DATE",  "");
}
if (isset($focus->date_entered) && !empty($focus->date_entered)) {
    $xtpl->assign("DATE_ENTERED",$focus->date_entered);
}



if (!empty($focus->team_id)) {

	$team = new Team();
	$team->retrieve($focus->team_id,true);
	require_once('modules/Teams/TeamSetManager.php');
	$xtpl->assign("TEAM", TeamSetManager::getCommaDelimitedTeams($focus->team_set_id, $focus->team_id, true));
}
if (!empty($focus->kbdoc_approver_id)) {

	$user = new User();
	$user->retrieve($focus->kbdoc_approver_id,true);
	$xtpl->assign("KBDOC_APPROVED_BY", $user->name);
}
if (!empty($focus->assigned_user_id)) {

	$user = new User();
	$user->retrieve($focus->assigned_user_id,true);
	$xtpl->assign("KBARTICLE_AUTHOR_NAME", $user->name);
}

$xtpl->parse("main.pro");


if (!empty($focus->template_type)) {
	$xtpl->assign("TEMPLATE_TYPE", $app_list_strings['kbdocument_template_type_dom'][$focus->template_type]);
}

// adding custom fields:
require_once('modules/DynamicFields/templates/Files/DetailView.php');

$xtpl->parse("main");
$xtpl->out("main");


$savedSearch = new SavedSearch();
$json = getJSONobj();
$savedSearchSelects = $json->encode(array($GLOBALS['app_strings']['LBL_SAVED_SEARCH_SHORTCUT'] . '<br>' . $savedSearch->getSelect('KBDocuments')));
$str = "<script>
YAHOO.util.Event.addListener(window, 'load', SUGAR.util.fillShortcuts, $savedSearchSelects);
</script>";
echo $str;
?>