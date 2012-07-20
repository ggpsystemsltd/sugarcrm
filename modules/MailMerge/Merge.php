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

/*
 * Created on Oct 7, 2005
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once('soap/SoapHelperFunctions.php');
require_once('modules/MailMerge/MailMerge.php'); 
 
 
 
require_once('include/upload_file.php');



global  $beanList, $beanFiles;
global $app_strings;
global $app_list_strings;
global $mod_strings;

$xtpl = new XTemplate('modules/MailMerge/Merge.html');

$module = $_SESSION['MAILMERGE_MODULE'];
$document_id = $_SESSION['MAILMERGE_DOCUMENT_ID'];
$selObjs = urldecode($_SESSION['SELECTED_OBJECTS_DEF']);
$relObjs = (isset($_SESSION['MAILMERGE_RELATED_CONTACTS']) ? $_SESSION['MAILMERGE_RELATED_CONTACTS'] : '');

$relModule = '';
if(!empty($_SESSION['MAILMERGE_CONTAINS_CONTACT_INFO'])){
	$relModule = $_SESSION['MAILMERGE_CONTAINS_CONTACT_INFO'];
}

if($_SESSION['MAILMERGE_MODULE'] == null)
{
	sugar_die("Error during Mail Merge process.  Please try again.");
}

$_SESSION['MAILMERGE_MODULE'] = null;
$_SESSION['MAILMERGE_DOCUMENT_ID'] = null;
$_SESSION['SELECTED_OBJECTS_DEF'] = null;
$_SESSION['MAILMERGE_SKIP_REL'] = null;
$_SESSION['MAILMERGE_CONTAINS_CONTACT_INFO'] = null;
$item_ids = array();
parse_str(stripslashes(html_entity_decode($selObjs, ENT_QUOTES)),$item_ids);

if($module == 'CampaignProspects'){
    $module = 'Prospects';   
    if(!empty($_SESSION['MAILMERGE_CAMPAIGN_ID'])){
    	$targets = array_keys($item_ids);
    	require_once('modules/Campaigns/utils.php');
    	campaign_log_mail_merge($_SESSION['MAILMERGE_CAMPAIGN_ID'],$targets);
    }
}
$class_name = $beanList[$module];
$includedir = $beanFiles[$class_name];
require_once($includedir);
$seed = new $class_name(); 

$fields =  get_field_list($seed);

$document = new DocumentRevision();//new Document();
$document->retrieve($document_id);

if(!empty($relModule)){
$rel_class_name = $beanList[$relModule ];
require_once($beanFiles[$rel_class_name]);
$rel_seed = new $rel_class_name();
}

global $sugar_config;

$filter = array();
if(array_key_exists('mailmerge_filter', $sugar_config)){
 //   $filter = $sugar_config['mailmerge_filter']; 
}
array_push($filter, 'link');

$merge_array = array();
$merge_array['master_module'] = $module;
$merge_array['related_module'] = $relModule;
//rrs log merge
$ids = array();

foreach($item_ids as $key=>$value)
{
	if(!empty($relObjs[$key])){
	   $ids[$key] = $relObjs[$key];
	}else{
	   $ids[$key] = '';
	}
}//rof
$merge_array['ids'] = $ids;

$dataDir = getcwd(). '/' . sugar_cached('MergedDocuments/');
if(!file_exists($dataDir))
{
	sugar_mkdir($dataDir);
}
srand((double)microtime()*1000000); 
$mTime = microtime();
$dataFileName = 'sugardata'.$mTime.'.php';
write_array_to_file('merge_array', $merge_array, $dataDir.$dataFileName);
//Save the temp file so we can remove when we are done
$_SESSION['MAILMERGE_TEMP_FILE_'.$mTime] = $dataDir.$dataFileName;
$site_url = $sugar_config['site_url'];
//$templateFile = $site_url . '/' . UploadFile::get_upload_url($document);
$templateFile = $site_url.'/'.UploadFile::get_url(from_html($document->filename),$document->id);
$dataFile =$dataFileName;
$redirectUrl = 'index.php?action=index&step=5&module=MailMerge&mtime='.$mTime;
$startUrl = 'index.php?action=index&module=MailMerge&reset=true';

$relModule = trim($relModule);
$contents = "SUGARCRM_MAIL_MERGE_TOKEN#$templateFile#$dataFile#$module#$relModule";

$rtfFileName = 'sugartokendoc'.$mTime.'.doc';
$fp = sugar_fopen($dataDir.$rtfFileName, 'w');
fwrite($fp, $contents);
fclose($fp);

$_SESSION['mail_merge_file_location'] = sugar_cached('MergedDocuments/').$rtfFileName;
$_SESSION['mail_merge_file_name'] = $rtfFileName;

$xtpl->assign("MAILMERGE_FIREFOX_URL", $site_url .'/'.$GLOBALS['sugar_config']['cache_dir'].'MergedDocuments/'.$rtfFileName);
$xtpl->assign("MAILMERGE_START_URL", $startUrl);
$xtpl->assign("MAILMERGE_TEMPLATE_FILE", $templateFile);
$xtpl->assign("MAILMERGE_DATA_FILE", $dataFile);
$xtpl->assign("MAILMERGE_MODULE", $module);

$xtpl->assign("MAILMERGE_REL_MODULE", $relModule);
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);
$xtpl->assign("MAILMERGE_REDIRECT_URL", $redirectUrl);
$xtpl->parse("main");
$xtpl->out("main");
?>
