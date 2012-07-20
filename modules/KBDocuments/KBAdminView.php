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

 * Description: TODO:  To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/



require_once('include/ytree/Tree.php');
require_once('include/ytree/Node.php');
require_once('modules/KBTags/TreeData.php');
require_once('modules/KBDocuments/Forms.php');
require_once('modules/KBDocuments/SearchUtils.php');

global $app_strings;
global $app_list_strings;
global $mod_strings;
global $current_user;
global $sugar_version;
global $sugar_config;

if(!$current_user->isAdminForModule('KBDocuments') ){
	die($mod_strings['LBL_NOT_AN_ADMIN_USER']);
}

$params = array();
$params[] = $mod_strings['LBL_KNOWLEDGE_BASE_ADMIN'];

echo getClassicModuleTitle("KBDocuments", $params, true);

$xtpl=new XTemplate ('modules/KBDocuments/KBAdminView.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);

$tag = new KBTag();
$xtpl->assign("TAG_NAME", $tag->tag_name);
 //tree header.
        $tagstree=new Tree('tagstree');
        $tagstree->set_param('module','KBTags');
        $tagstree->set_param('moduleview','admin');

        $nodes=get_tags_nodes(false,true,null);
        $root_node = new Node('All_Tags', $mod_strings['LBL_TAGS_ROOT_LABEL']);  
        $root_node->expanded = true;
        $href_string = "javascript:handler:SUGAR.kb.adminClick()";
        $root_node->set_property("href",$href_string);                
        
        foreach ($nodes as $node) {                                         
          $root_node->add_node($node);                        
        }
        $tagstree->add_node($root_node); 
                       
        $xtpl->assign("TAGSTREEINSTANCE",$tagstree->generate_nodes_array());
//set the site_url variable.
        global $sugar_config;
        $sugar_config['site_url'] = preg_replace('/^http(s)?\:\/\/[^\/]+/',"http$1://".$_SERVER['HTTP_HOST'],$sugar_config['site_url']);
        if(!empty($_SERVER['SERVER_PORT']) &&$_SERVER['SERVER_PORT'] == '443') {
            $sugar_config['site_url'] = preg_replace('/^http\:/','https:',$sugar_config['site_url']);
        }
        $site_data = "<script> var site_url= {\"site_url\":\"".$sugar_config['site_url']."\"};</script>\n";

        $xtpl->assign("SITEURL",$site_data);

    echo'<script> var site_url= {"site_url":"'.$sugar_config['site_url'].'"};</script>';

        $tagstreeModal=new Tree('tagstreeMoveDocsModal');
        $tagstreeModal->set_param('module','KBTags');
        $tagstreeModal->set_param('moduleview','modalMoveDocs');

        $nodes=get_tags_modal_nodes(null,false);
        //$nodes = get_tag_nodes_for_browsing();
        //_pp($nodes);
        foreach ($nodes as $node) {
            $tagstreeModal->add_node($node);
        }

        $xtpl->assign("TAGSTREEMOVEDOCSMODAL",$tagstreeModal->generate_nodes_array());

        $tagstreeApply=new Tree('tagstreeApplyTags');
        $tagstreeApply->set_param('module','KBTags');
        $tagstreeApply->set_param('moduleview','applyTags');

        $nodes=get_tags_modal_nodes(null,true);
        //$nodes = get_tag_nodes_for_browsing();

        foreach ($nodes as $node) {
            $tagstreeApply->add_node($node);
        }


   //$xtpl->assign("TAGSTREEAPPLYOCSMODAL",$tagstreeApply->generate_nodes_array());


   $xtpl->assign("ADMIN_ACTIONS", get_select_options_with_id($app_list_strings['kbadmin_actions_dom'], ''));
 
$xtpl->parse("main.pro");


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