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
 * Created on Oct 4, 2005
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */








global $app_strings;
global $app_list_strings;
global $mod_strings;
global $current_user;
global $locale;

$xtpl = new XTemplate('modules/MailMerge/Step4.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);

if(!empty($_POST['document_id']))
{
	$_SESSION['MAILMERGE_DOCUMENT_ID'] = $_POST['document_id'];
}
$document_id = $_SESSION['MAILMERGE_DOCUMENT_ID'];
$revision = new DocumentRevision();
$revision->retrieve($document_id);
//$document = new Document();
//$document->retrieve($document_id);

if(!empty($_POST['selected_objects']))
{
	$selObjs = urldecode($_POST['selected_objects']);
	$_SESSION['SELECTED_OBJECTS_DEF'] = $selObjs;
}
$selObjs = $_SESSION['SELECTED_OBJECTS_DEF'];
$sel_obj = array();

parse_str(stripslashes(html_entity_decode($selObjs, ENT_QUOTES)),$sel_obj);
foreach($sel_obj as $key=>$value)
{
	$sel_obj[$key] = stripslashes($value);
}
$relArray = array();
//build relationship array
foreach($sel_obj as $key=>$value)
{
	$id = 'rel_id_'.str_replace('-', '', $key);	
	if(isset($_POST[$id]) && !empty($_POST[$id]))
	{
		$relArray[$key] = $_POST[$id];	
	}
}


$builtArray = array();
if(count($relArray) > 0)
{
$_SESSION['MAILMERGE_RELATED_CONTACTS'] = $relArray;

$relModule = $_SESSION['MAILMERGE_CONTAINS_CONTACT_INFO'];
global $beanList, $beanFiles;
$class_name = $beanList[$relModule ];
require_once($beanFiles[$class_name]);

	$seed = new $class_name();
	foreach($sel_obj as $key=>$value)
	{	
		$builtArray[$key] = $value;
		if(isset($relArray[$key]))
		{
			$seed->retrieve($relArray[$key]);
			$name = "";
			if($relModule  == "Contacts"){
				$name = $locale->getLocaleFormattedName($seed->first_name,$seed->last_name);
			}
			else{
				$name = $seed->name;
			}
				$builtArray[$key] = str_replace('##', '&', $value)." (".$name.")";
		}
	}

}
else
{
	$builtArray = $sel_obj;	
}

$xtpl->assign("MAILMERGE_MODULE", $_SESSION['MAILMERGE_MODULE']);
$xtpl->assign("MAILMERGE_DOCUMENT_ID", $document_id);
$xtpl->assign("MAILMERGE_TEMPLATE", $revision->filename." (rev. ".$revision->revision.")");
$xtpl->assign("MAILMERGE_SELECTED_OBJECTS", get_select_options_with_id($builtArray,'0'));
$xtpl->assign("MAILMERGE_SELECTED_OBJECTS_DEF", urlencode($selObjs));
$step_num = 4;

if(isset($_SESSION['MAILMERGE_SKIP_REL']) && $_SESSION['MAILMERGE_SKIP_REL'] || !isset($_SESSION['MAILMERGE_RELATED_CONTACTS']) || empty($_SESSION['MAILMERGE_RELATED_CONTACTS']))
{
	$xtpl->assign("PREV_STEP", "2");
	$step_num = 3;
}
else
{
	$xtpl->assign("PREV_STEP", "3");
}
	
$xtpl->assign("STEP_NUM", "Step ".$step_num.":");

$xtpl->parse("main");
$xtpl->out("main");

?>
