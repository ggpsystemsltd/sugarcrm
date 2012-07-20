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
 //UI test for kb
 ********************************************************************************/


/*
 * To See this file in action, copy this file and the corresponding html file onto a module directory of your choice, say campaigns
 * now modify the url to have the right module, and testdragdrop as the action.  So for example (using campaign directory):
 * http://localhost/sugarcrm/index.php?module=Campaigns&action=testdragdrop
 */

require_once('modules/KBDocuments/SearchUtils.php');

global $mod_strings, $app_strings;


$focus = new KBDocument();

echo getClassicModuleTitle("KBDocuments", array($app_strings['LBL_SEARCH']), true);

$path = getJSPath('cache/include/javascript/sugar_grp_overlib.js');
echo "
<script type='text/javascript' src='$path'></script>
<div id='overDiv' style='position:absolute; visibility:hidden; z-index:1000; max-width: 400px;'></div> ";

$ss = new Sugar_Smarty();
$ss->assign("MOD", $mod_strings);
$ss->assign("APP", $app_strings);

//check to see if this is a sort refresh
if(isset($_REQUEST['lvso'])  && !empty($_REQUEST['lvso'])){
 //handle the list sorting
 handleSort();
}

//check to see if this is from a savedsearch
if(isset($_POST['saved_search_action']) && !empty($_POST['saved_search_action'])){
    //populate parameters and call getSavedSearch method
    $s_action = $_POST['saved_search_action'];
    $s_id = $_POST['saved_search_select'];
    $s_name = $_POST['saved_search_name'];
    getSavedSearch($s_action,$s_id,$s_name,$focus);
 }
elseif(!empty($_REQUEST['saved_search_select']) && $_REQUEST['saved_search_select']!='_none'){
    unset($_POST['saved_search_select']);
}


//if the mode is set to clear, then query should be cleared, set clear_loaded param
$mode = 'basic';
if(isset($_POST['mode'])  && $_POST['mode'] == 'clear'){
    $_POST['clear_loaded'] = true;
    if(isset($_POST['post_clear_mode']) && !empty($_POST['post_clear_mode'])){
        $mode = $_POST['post_clear_mode'];
    }
}
//assign back values from last search, if it exists.
//do not set any values if value has been set
if(isset($_POST['clear_loaded'])){
    foreach($_POST as $_key => $_val){
        $_POST[$_key] = '';
        $ss->assign($_key, '');
    }
    $_POST['mode'] = $mode;
    $_POST['searchText'] = '';
    $_POST['action'] = 'SearchHome';
    $_POST['module'] = 'KBDocuments';

}else{
    foreach($_POST as $_key => $_val){
        $ss->assign($_key, $_val);
    }
}

    //assign styles to title menu dropdowns, so z-index is always on top
    $ss->assign("STYLES", getKBStyles());
//    $bgColor=$even_bg;
    $results = " ";
    //if mode is not set in post object, then retrieve from preferences
    if(!isset($_POST['mode']) || empty($_POST['mode'])){
        $prefMode = $current_user->getPreference('KBSearchFormMode','KnowledgeBase');
        if(!empty($prefMode)){
            $_POST['mode'] = $prefMode;
        }
    }

    //Set parameters to be used in rendering initial tabs on form
    if(isset($_POST['mode']) && $_POST['mode'] == 'advanced'){
        //set form display properties to show advanced forms
        $ss->assign('SHOW_INITIAL_BASIC', 'display:none');
        $ss->assign('CURRENT_OTHER_BASIC', '');
        $ss->assign('SHOW_INITIAL_ADV', '');
        $ss->assign('CURRENT_OTHER_ADV', 'current');
        $ss->assign('SHOW_INITIAL_BROWSE', 'display:none');
        $ss->assign('CURRENT_OTHER_BROWSE', '');
        $ss->assign('SHOW_INITIAL_LIST', '');
        $ss->assign('MODE', 'advanced');
        $current_user->setPreference('KBSearchFormMode', $_POST['mode'],0,'KnowledgeBase');
     }elseif(isset($_POST['mode']) && $_POST['mode'] == 'browse'){
        //set form display properties to show browse forms
        $ss->assign('SHOW_INITIAL_BASIC', 'display:none');
        $ss->assign('CURRENT_OTHER_BASIC', '');
        $ss->assign('SHOW_INITIAL_ADV', 'display:none');
        $ss->assign('CURRENT_OTHER_ADV', '');
        $ss->assign('SHOW_INITIAL_BROWSE', '');
        $ss->assign('CURRENT_OTHER_BROWSE', 'current');
        $ss->assign('SHOW_INITIAL_LIST', 'display:none');
        $ss->assign('MODE', 'browse');
        $current_user->setPreference('KBSearchFormMode', $_POST['mode'],0,'KnowledgeBase');
     }else{
        //set form display properties to show basic forms
        $ss->assign('SHOW_INITIAL_BASIC', '');
        $ss->assign('CURRENT_OTHER_BASIC', 'current');
        $ss->assign('SHOW_INITIAL_ADV', 'display:none');
        $ss->assign('CURRENT_OTHER_ADV', '');
        $ss->assign('SHOW_INITIAL_BROWSE', 'display:none');
        $ss->assign('CURRENT_OTHER_BROWSE', '');
        $ss->assign('SHOW_INITIAL_LIST', '');
        $ss->assign('MODE', 'basic');
        $current_user->setPreference('KBSearchFormMode', 'basic',0,'KnowledgeBase');
    }


////////////////////////////////// FTS Section ///////////////////////////////////////

    //set default so all records are returned
    $search_str = ' kbdocuments.deleted=0 ';

    //if search is blank, replace with '*'
    if (isset($_POST['searchText_include']))
        {
            if(empty($_POST['searchText_include'])){ $_POST['searchText_include'] = '*';}
            //set searchtext param to search text include.  This will allow processing to continue
            //regardless of this being a basic or advanced search
            $_POST['searchText'] =$_POST['searchText_include'];

        }


    //begin search processing
    if(isset($_POST['searchText']) && !empty($_POST['searchText']) && isset($_POST['mode']) && !empty($_POST['mode'])){

            //do search
            $quote_token = array();
            $and_token = array();
            $not_token = array();
            $or_token = array();

            //handle the basic search case
            if(isset($_POST['mode']) && $_POST['mode'] =='basic'){
                $search_str = perform_basic_search($_POST['searchText'],$focus);
            }elseif(isset($_POST['mode']) && $_POST['mode'] =='advanced'){
                //handle the advanced search case
                $search_str = perform_advanced_search($focus);
            }

            if(empty($search_str)){
                $results = $mod_strings['LBL_MISMATCH_QUOTES_ERR'];
            }else{
                //display the result set
                $results = get_fts_list($search_str);
            }
        }else{
            //No search params have been specified
            if(isset($_POST['searchText']) && empty($_POST['searchText'])){
            //if no search params were specified, but searchText is in post object, then this
            //is coming from an empty basic search form, do a blank basic search and return list
                $search_str = perform_basic_search('*',$focus);

                //display the result set
                $results = get_fts_list($search_str);
            }else{
                //If no params have been specified and searchText is not in Post object,
                //then this is first time entering the screen, perform a top ten article search
                //as long as we are not showing the browse screen initially
                if(isset($_POST['mode'])  && $_POST['mode'] != 'browse'){
                    $_REQUEST['orderBy']='views_number';
                    $_REQUEST['sortOrder']='desc';
                    $search_str = perform_advanced_search($focus,true);

                    $results = "<table class='h3Row'  width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td nowrap ><h3>".$mod_strings['LBL_TOP_TEN_LIST_TITLE']."</h3></td></tr></table>";
                    $results .= get_fts_list($search_str);
                }
            }
        }

    $ss->assign('LIST', $results );



        //set canned search dropdown from post
        if (isset($_POST['canned_search'])){
            $ss->assign("CANNED_SEARCH_OPTIONS", get_select_options_with_id($app_list_strings['kbdocument_canned_search'], $_POST['canned_search']));
        }else{
            $ss->assign("CANNED_SEARCH_OPTIONS", get_select_options_with_id($app_list_strings['kbdocument_canned_search'], ''));
        }

////////////////////////////////// Browse Section ///////////////////////////////////////

    //print out the needed script tags for tree
    echo'<script> var site_url= {"site_url":"'.$sugar_config['site_url'].'"};</script>';

    echo"        <link rel='stylesheet' href='include/ytree/TreeView/css/folders/tree.css'>
    <script language='JavaScript' src='include/ytree/TreeView/TreeView.js'></script>
    <script language='JavaScript' src='include/ytree/TreeView/TaskNode.js'></script>
    <script language='JavaScript' src='include/ytree/treeutil.js'></script>";

    $ss->assign('BROWSETAB', return_browse_tab());

////////////////////////////////// Advanced Search Section ///////////////////////////////////////


        require_once('include/QuickSearchDefaults.php');
        require_once('include/json_config.php');
        $json_config = new json_config();
		$json = getJSONobj();
        $qsd = QuickSearchDefaults::getQuickSearchDefaults();
        $qsd->setFormName('FTSFormAdvanced');
        $sqs_objects = array('FTSFormAdvanced_tag_name' => getQSTags('FTSFormAdvanced'),
                             'FTSFormAdvanced_team_name' => $qsd->getQSTeam(),
                             'FTSFormAdvanced_kbdoc_approver_name' => getQSApprover('FTSFormAdvanced'),
                             'FTSFormAdvanced_kbarticle_author_name' => getQSAuthor('FTSFormAdvanced'),
                             'filename' =>    getQSFileName(),
                             'file_mime_type' => getQSMimeType());
        $quicksearch_js = '<script type="text/javascript" language="javascript">sqs_objects = ' . $json->encode($sqs_objects) . '; enableQS();</script>';
        $javascript = get_set_focus_js().$quicksearch_js;

        $ss->assign("JAVASCRIPT", $javascript);


    $ss->assign('ADVANCEDTAB', return_advanced_tab($focus,$json, $json_config));




///////////////////////////////////////////////////////////////////////////////////////////////
    //display results
    $ss->display("modules/KBDocuments/SearchHome.html");




    /**perform_advanced_search
     *
     * This method populates parameters for creating the full text search query from the post
     * returns full text search query
     * @param $focus sugarbean instance
     */
function perform_advanced_search($focus,$default=false){


                //create array of available search parameters.
                $searchVars = array();
                $spec_Search_Vars = array();

                //if this is a default search, then just return top ten articles
                if($default){
                    $spec_SearchVars['searchText_include'] = '*';
                    $spec_SearchVars['canned_search'] = 'all';
                    $spec_SearchVars['frequency'] = 'Top_10';
                    return create_fts_search_list_query($focus->db,$spec_SearchVars,$searchVars);
                }

                //this is not a default search, so process post to extract search params
                // pass in the following field values as is, so like statement is generated
                if(isset($_POST['kbdocument_name']) and !empty($_POST['kbdocument_name'])){$searchVars['kbdocument_name'] = $_POST['kbdocument_name'];}
                if(isset($_POST['viewed']) and !empty($_POST['viewed'])){$searchVars['viewed'] = $_POST['viewed'];}
                if(isset($_POST['description']) and !empty($_POST['description'])){$searchVars['description'] = $_POST['description'];}


                // pass in the following field values in array, so ''=' statement is generated
                if(isset($_POST['status_id']) and !empty($_POST['status_id'])){
                    $q_arr['operator'] = '=';
                    $q_arr['filter'] = $_POST['status_id'];
                    $searchVars['status_id'] = $q_arr;
                }

                if(isset($_POST['template_type']) and !empty($_POST['template_type'])){
                    $q_arr['operator'] = '=';
                    $q_arr['filter'] = $_POST['template_type'];
                    $searchVars['template_type'] = $q_arr;
                }

                if(isset($_POST['kbdoc_approver_id']) and !empty($_POST['kbdoc_approver_id'])){
                    $q_arr['operator'] = '=';
                    $q_arr['filter'] = $_POST['kbdoc_approver_id'];
                    $searchVars['kbdoc_approver_id'] = $q_arr;
                }

                if(isset($_POST['kbarticle_author_name']) and !empty($_POST['kbarticle_author_name']) and isset($_POST['kbarticle_author_id']) and !empty($_POST['kbarticle_author_id'])){
                    $q_arr['operator'] = '=';
                    $q_arr['filter'] = $_POST['kbarticle_author_id'];
                    $searchVars['assigned_user_id'] = $q_arr;
                }

                if(isset($_POST['team_name']) and !empty($_POST['team_name']) and isset($_POST['team_id']) and !empty($_POST['team_id'])){
                    $q_arr['operator'] = '=';
                    $q_arr['filter'] = $_POST['team_id'];
                    $searchVars['team_id'] = $q_arr;
                }

                //pass in values that require special processing
                if(isset($_POST['active_date']) and !empty($_POST['active_date'])){$spec_SearchVars['active_date'] = $_POST['active_date'];}else{$spec_SearchVars['active_date']='';}
                if(isset($_POST['active_date2']) and !empty($_POST['active_date2'])){$spec_SearchVars['active_date2'] = $_POST['active_date2'];}else{$spec_SearchVars['active_date2']='';}
                if(isset($_POST['active_date_filter']) and !empty($_POST['active_date_filter'])){$spec_SearchVars['active_date_filter'] = $_POST['active_date_filter'];}
                if(isset($_POST['exp_date']) and !empty($_POST['exp_date'])){$spec_SearchVars['exp_date'] = $_POST['exp_date'];}else{$spec_SearchVars['exp_date']='';}
                if(isset($_POST['exp_date2']) and !empty($_POST['exp_date2'])){$spec_SearchVars['exp_date2'] = $_POST['exp_date2'];}else{$spec_SearchVars['exp_date2']='';}
                if(isset($_POST['exp_date_filter']) and !empty($_POST['exp_date_filter'])){$spec_SearchVars['exp_date_filter'] = $_POST['exp_date_filter'];}
                if(isset($_POST['searchText_include']) and !empty($_POST['searchText_include'])){$spec_SearchVars['searchText_include'] = from_html($_POST['searchText_include']);
                    //since this is from include field, all words are to be excluded
                    //so strip any - signs
                    $spec_SearchVars['searchText_include']= str_replace('-', ' ',$spec_SearchVars['searchText_include']);
                }

                if(isset($_POST['searchText_exclude']) and !empty($_POST['searchText_exclude'])){$spec_SearchVars['searchText_exclude'] = from_html($_POST['searchText_exclude']);
                    //since this is from exclude field, all words are to be excluded
                    //so strip any +/- signs
                    $spec_SearchVars['searchText_exclude']= str_replace('-', ' ',$spec_SearchVars['searchText_exclude']);
                    $spec_SearchVars['searchText_exclude']= str_replace('+', ' ',$spec_SearchVars['searchText_exclude']);
                }

                if(isset($_POST['tag_name']) and !empty($_POST['tag_name'])){$spec_SearchVars['tag_name'] = $_POST['tag_name'];}
                if(isset($_POST['tag_id']) and !empty($_POST['tag_id'])){$spec_SearchVars['tag_id'] = $_POST['tag_id'];}
                if(isset($_POST['frequency']) and !empty($_POST['frequency'])){
                    $spec_SearchVars['frequency'] = $_POST['frequency'];
                    //set the sort order for frequency
                    $_REQUEST['orderBy']='views_number';
                    $_REQUEST['sortOrder']='desc';
                    if($_POST['frequency']{0} =='B')$_REQUEST['sortOrder']='asc';
                }
                if(isset($_POST['canned_search']) and !empty($_POST['canned_search'])){$spec_SearchVars['canned_search'] = $_POST['canned_search'];}
                if(isset($_POST['attachments']) and !empty($_POST['attachments'])){$spec_SearchVars['attachments'] = $_POST['attachments'];}
                if(isset($_POST['filename']) and !empty($_POST['filename'])){$spec_SearchVars['filename'] = $_POST['filename'];}
                if(isset($_POST['file_mime_type']) and !empty($_POST['file_mime_type'])){$spec_SearchVars['file_mime_type'] = $_POST['file_mime_type'];}


                $list_query = create_fts_search_list_query($focus->db,$spec_SearchVars,$searchVars);
                if(empty($list_query)){
                    return '';
                }
                return $list_query ;

}






    /**return_browse_tab
     *
     * This method processes and creates the browse tab
     * Returns html of browse tab
     */
    function return_browse_tab(){
        global $theme, $image_path, $app_list_strings, $mod_strings, $app_strings;


        $ss_brws = new Sugar_Smarty();
        $ss_brws->assign("MOD", $mod_strings);
        $ss_brws->assign("APP", $app_strings);


        require_once('include/ytree/Tree.php');
        require_once('include/ytree/Node.php');
        require_once('modules/KBTags/TreeData.php');


        $tagstree=new Tree('kb_browse_tags');
        $tagstree->set_param('module','KBTags');
        $tagstree->set_param('moduleview', 'browse');
        $nodes=get_tag_nodes_for_browsing();

        foreach ($nodes as $node) {
            $tagstree->add_node($node);
        }



       if(empty($tagstree->_nodes)){
            $notag_node = new Node('foo','There are no tags to browse');
            $tagstree->add_node($notag_node);

       }


        $ss_brws->assign("TREEHEADER",$tagstree->generate_header());
        $ss_brws->assign("TREEINSTANCE",$tagstree->generate_nodes_array());
        $ss_brws->assign("TREE_WIDTH","15%");
        $ss_brws->assign("BORDER",1);

        //set the site_url variable.
        global $sugar_config;
        $sugar_config['site_url'] = preg_replace('/^http(s)?\:\/\/[^\/]+/',"http$1://".$_SERVER['HTTP_HOST'],$sugar_config['site_url']);
        if(!empty($_SERVER['SERVER_PORT']) &&$_SERVER['SERVER_PORT'] == '443') {
            $sugar_config['site_url'] = preg_replace('/^http\:/','https:',$sugar_config['site_url']);
        }
        $site_data = "<script> var site_url= {\"site_url\":\"".$sugar_config['site_url']."\"};</script>\n";

        $ss_brws->assign("SITEURL",$site_data);


        return $ss_brws->fetch("modules/KBDocuments/tpls/browseTab.tpl");
}



    /**return_advanced_tab
     *
     * This method processes and creates the advanced tab
     * Returns html of advanced search tab
     */

    function return_advanced_tab($focus,$json, $json_config){
        global $theme, $image_path, $app_list_strings, $mod_strings, $app_strings;


        $ss_adv = new Sugar_Smarty();
        $ss_adv->assign("MOD", $mod_strings);
        $ss_adv->assign("APP", $app_strings);

        //assign back values from last search, if it exists.
        //do not set any values if value has been set
        if(isset($_POST['clear_loaded'])){
            $_POST['searchText'] = '';
            foreach($_POST as $_key => $_val){
                $ss_adv->assign($_key, '');
            }
        }else{
            foreach($_POST as $_key => $_val){
                $ss_adv->assign($_key, $_val);
            }
        }

         $popup_request_data = array(
            'call_back_function' => 'set_return',
            'form_name' => 'FTSFormAdvanced',
            'field_to_name_array' => array(
                'id' => 'kbdoc_approver_id',
                'name' => 'kbdoc_approver_name',
                ),
            );
        $ss_adv->assign('encoded_approver_popup_request_data', $json->encode($popup_request_data));

         $popup_request_data = array(
            'call_back_function' => 'set_return',
            'form_name' => 'FTSFormAdvanced',
            'field_to_name_array' => array(
                'id' => 'kbarticle_author_id',
                'name' => 'kbarticle_author_name',
                ),
            );
        $ss_adv->assign('encoded_author_popup_request_data', $json->encode($popup_request_data));




         $popup_request_data = array(
            'call_back_function' => 'set_return',
            'form_name' => 'FTSFormAdvanced',
            'field_to_name_array' => array(

                'id' => 'tag_id',
                'tag_name' => 'tag_name',
                ),
            );
        $ss_adv->assign('encoded_tags_popup_request_data', $json->encode($popup_request_data));



        $popup_request_data = array(
            'call_back_function' => 'set_return',
            'form_name' => 'FTSFormAdvanced',
            'field_to_name_array' => array(
                'id' => 'team_id',
                'name' => 'team_name',
                ),
            );
        $json = getJSONobj();
        $ss_adv->assign('encoded_team_popup_request_data', $json->encode($popup_request_data));


        $ss_adv->assign("PRINT_URL", "index.php?".$GLOBALS['request_string']);
        $ss_adv->assign("ID", $focus->id);
        $ss_adv->assign("DOCUMENT_NAME",$focus->kbdocument_name);
        $ss_adv->assign("DESCRIPTION",$focus->description);
        $ss_adv->assign("ACTIVE_DATE",$focus->active_date);
        $ss_adv->assign("EXP_DATE",$focus->exp_date);


        $status_option ="<option value='' selected>". $app_strings['LBL_NONE'] ."</option> ";
        if (isset($_POST['status_id'])){
            $status_option .=get_select_options_with_id($app_list_strings['kbdocument_status_dom'], $_POST['status_id']);
            $ss_adv->assign("STATUS_OPTIONS", $status_option );
        }else{
            $status_option .=get_select_options_with_id($app_list_strings['kbdocument_status_dom'], '');
            $ss_adv->assign("STATUS_OPTIONS", $status_option );
        }


        if (isset($_POST['saved_search_select'])  && !empty($_POST['saved_search_select'])){
            $ss_adv->assign("SAVED_SEARCH_OPTIONS", getSavedSearchOptions( $focus, $_POST['saved_search_select']));
            $savedSearchSelects = $json->encode(array($GLOBALS['app_strings']['LBL_SAVED_SEARCH_SHORTCUT'] . '<br>'.getSavedSearchOptions($focus,$_POST['saved_search_select'],true)));
        }else{
            $ss_adv->assign("SAVED_SEARCH_OPTIONS", getSavedSearchOptions($focus));
            $savedSearchSelects = $json->encode(array($GLOBALS['app_strings']['LBL_SAVED_SEARCH_SHORTCUT'] . '<br>'.getSavedSearchOptions($focus,'',true)));
        }

    $str = "<script>
    YAHOO.util.Event.addListener(window, 'load', SUGAR.util.fillShortcuts, $savedSearchSelects);
    </script>";
    echo $str;

        if (isset($_POST['canned_search'])){
            $ss_adv->assign("CANNED_SEARCH_OPTIONS", get_select_options_with_id($app_list_strings['kbdocument_canned_search'], $_POST['canned_search']));
        }else{
            $ss_adv->assign("CANNED_SEARCH_OPTIONS", get_select_options_with_id($app_list_strings['kbdocument_canned_search'], ''));
        }

        $a1_style = '';
        $x1_style = '';
        $a2_style = 'none';
        $x2_style = 'none';
        //set the expiration date filter if it exists.  Also set the style properties
        //that will determine whether to show or hide the supporting text boxes
        if (isset($_POST['active_date_filter'])){
            $ss_adv->assign("ACTIVE_DATE_FILTER_OPTIONS", get_select_options_with_id($app_list_strings['kbdocument_date_filter_options'], $_POST['active_date_filter']));
            if($_POST['active_date_filter'] == 'on' ||$_POST['active_date_filter'] == 'before' ||$_POST['active_date_filter'] == 'after'){
                $a1_style = '';
            }else{
                $a1_style = 'none';
            }
            if($_POST['active_date_filter'] == 'between_dates'){$a2_style = '';}
        }else{
            $ss_adv->assign("ACTIVE_DATE_FILTER_OPTIONS", get_select_options_with_id($app_list_strings['kbdocument_date_filter_options'], ''));
        }

        //set the expiration date filter if it exists.  Also set the style properties
        //that will determine whether to show or hide the supporting text boxes
        if (isset($_POST['exp_date_filter'])){
            $ss_adv->assign("EXP_DATE_FILTER_OPTIONS", get_select_options_with_id($app_list_strings['kbdocument_date_filter_options'], $_POST['exp_date_filter']));
            if($_POST['exp_date_filter'] == 'on' ||$_POST['exp_date_filter'] == 'before' ||$_POST['exp_date_filter'] == 'after'){
                $x1_style = '';
            }else{
                $x1_style = 'none';
            }
            if($_POST['exp_date_filter'] == 'between_dates'){$x2_style = '';}
        }else{
            $ss_adv->assign("EXP_DATE_FILTER_OPTIONS", get_select_options_with_id($app_list_strings['kbdocument_date_filter_options'], ''));
        }
        //set the style sheet properties for date filters
        $ss_adv->assign("A_DATE1_STYLE", $a1_style);
        $ss_adv->assign("X_DATE1_STYLE", $x1_style);
        $ss_adv->assign("A_DATE2_STYLE", $a2_style);
        $ss_adv->assign("X_DATE2_STYLE", $x2_style);

        $attach_name_style = 'none';
        $attach_mime_style = 'none';
        if (isset($_POST['attachments'])){
            $ss_adv->assign("ATTACHMENT_SELECT_OPTIONS", get_select_options_with_id($app_list_strings['kbdocument_attachment_option_dom'], $_POST['attachments']));
            if($_POST['attachments']=='mime'){
                $attach_mime_style = ' ';
            }else if($_POST['attachments']=='name'){
                $attach_name_style = ' ';
            }

        }else{
            $ss_adv->assign("ATTACHMENT_SELECT_OPTIONS", get_select_options_with_id($app_list_strings['kbdocument_attachment_option_dom'], ''));
        }

        $ss_adv->assign("ATTACHMENT_NAME_STYLE", $attach_name_style);
        $ss_adv->assign("ATTACHMENT_MIME_STYLE", $attach_mime_style);


        if (!empty($focus->kbdoc_approver_id)) {

            $user = new User();
            $user->retrieve($focus->kbdoc_approver_id,true);
            $ss_adv->assign("KBDOC_APPROVER_NAME", $user->name);
            $ss_adv->assign("KBDOC_APPROVER_ID", $focus->kbdoc_approver_id);
        }

        global $timedate;
        $ss_adv->assign("CALENDAR_DATEFORMAT", $timedate->get_cal_date_format());
        $ss_adv->assign("USER_DATE_FORMAT", $timedate->get_user_date_format());

        $ss_adv->assign('JSON_CONFIG_JAVASCRIPT', $json_config->get_static_json_server());


            if (isset($_POST['frequency'])){
                $ss_adv->assign("FRQ_VIEW_OPTIONS", get_select_options_with_id($app_list_strings['kbdocument_viewing_frequency_dom'], $_POST['frequency']));
            }else{
                $ss_adv->assign("FRQ_VIEW_OPTIONS", get_select_options_with_id($app_list_strings['kbdocument_viewing_frequency_dom'], ''));
            }


            //create tree for tag selection modal

            $tag = new KBTag();
            $ss_adv->assign("TAG_NAME", $tag->tag_name);

            //tree header.
            $tagstree=new Tree('tagstree');
            $tagstree->set_param('module','KBTags');
            $tagstree->set_param('moduleview','modal');
            $nodes=get_tags_nodes(false,false,null);
            $root_node = new Node('All_Tags', $mod_strings['LBL_TAGS_ROOT_LABEL']);
            foreach ($nodes as $node) {
              $root_node->add_node($node);
            }
            $href_string = "javascript:handler:modalClose('tagstree')";
             if ($root_node) {
                $root_node->set_property("href",$href_string);
             }
             $root_node->expanded = true;
             $tagstree->add_node($root_node);
             $ss_adv->assign("TREEINSTANCE",$tagstree->generate_nodes_array());

            return $ss_adv->fetch("modules/KBDocuments/tpls/advancedTab.tpl");
}

    /**perform_basic_search
     *
     * This method populates parameters for creating the full text search query from the post
     * returns full text search query
     * @param $focus sugarbean instance
     */
    function perform_basic_search($srch_str_raw,$focus){
            $searchVars = array();
            $spec_SearchVars = array();


                //make sure string does not have html encoding
                $srch_str_raw = from_html($srch_str_raw);
                $srch_str_raw_orig = $srch_str_raw;

               //lets remove defined tags from the search string
                $tagNamesArr = seperateTagNames($srch_str_raw);
                if(!empty($tagNamesArr)){
                    $_POST['searchText'] = $tagNamesArr['search_string_raw'];
                    $spec_SearchVars['tag_name'] = $tagNamesArr['tag_token_string'];
                }
                if(isset($_POST['canned_search']) and !empty($_POST['canned_search'])){$spec_SearchVars['canned_search'] = $_POST['canned_search'];}


            //create array of available search parameters.
                if(isset($_POST['searchText']) and !empty($_POST['searchText'])){$spec_SearchVars['searchText_include'] = from_html($_POST['searchText']);}
                $list_query = create_fts_search_list_query($focus->db,$spec_SearchVars,$searchVars);
                if(empty($list_query)){
                    return '';
                }
                return $list_query ;

}


    /**getSavedSearchOptions
     *
     * This method retrieves a list of saved searches and creates html for a select list
     * returns html options for select list
     * @param $focus sugarbean instance
     * @param $saved_search_id id of saved search id to set as selected
     * @param $completeHTML boolean value.  Returns html for full select widget if set to true, not just options
     */
    function getSavedSearchOptions($focus,$saved_search_id='',$completeHTML=false){
         global $current_user, $mod_strings, $app_strings;
            //create query for retrieving selected options
            $ss_query = "select name, id from saved_search where deleted = '0' and assigned_user_id ='$current_user->id' and search_module='KBDocuments'";
            $result = $focus->db->query($ss_query);

            //now create select option html without the newsletter/email, or blank ('') options
            $type_option_html =" ";
            $selected = false;

            $sav_srch_arr = array();
            while($row = $focus->db->fetchByAssoc($result)) {
                $sav_srch_arr[] = $row;
            }

            //create list of options
            if(empty($saved_search_id)){
               $type_option_html ="<option value='' selected>". $app_strings['LBL_NONE'] ."</option> ";
                   $selected = true;
            }else{
               $type_option_html ="<option value='' >". $app_strings['LBL_NONE'] ."</option> ";
            }

            foreach($sav_srch_arr as $saved_search_row){
                //if the selected flag is set to true, then just populate
                if($selected){
                    $type_option_html .="<option value='" . $saved_search_row['id'] . "' >" . $saved_search_row['name'] . "</option>";
                }else{//if not selected yet, check to see if this option should be selected
                        if($saved_search_row['id']  == $saved_search_id){
                            //mark as selected
                            $type_option_html .="<option value='" . $saved_search_row['id'] . "' selected>" . $saved_search_row['name'] . "</option>";
                            //mark as selected for next time
                            $selected=true;
                        }else{
                            //key does not match, just populate
                            $type_option_html .="<option value='" . $saved_search_row['id'] . "' >" . $saved_search_row['name'] . "</option>";
                        }
                }
            }

            //return complete html for entire select widget if flag is set.  This is used from side select dropdown under shortcuts menu
            if($completeHTML){
            $option_html = "<select style='width: 110px' name='side_saved_search_select' onChange=\"document.getElementById('saved_search_select').value=this.value;setSelectSearchInputs('loadSearch');document.forms['FTSFormAdvanced'].submit();\">";
            $option_html .= " $type_option_html ";
            $option_html .= "</select>";
            return $option_html;

            }else{
                return $type_option_html;
            }


    }



    /**getSavedSearch
     *
     * This method calls the proper method for the selected action.
     *
     * @param $s_action action to take, method to call.
     * @param $s_id id of saved search that was selected
     * @param $focus SugarBean instance
     */
    function getSavedSearch($s_action, $s_id='', $s_name='',$focus){
     global $current_user, $mod_strings, $app_strings;
        if($s_action == 'updateSearch'){saveSearch($s_id,$s_name,true);}
        if($s_action == 'deleteSearch'){delSavedSearch($s_id, $s_name);}
        if($s_action == 'saveSearch'){saveSearch($s_id,$s_name,false);}
        if($s_action == 'loadSearch'){loadSavedSearch($s_id);}

    }


    /**savedSearch
     *
     * This method saves the current post parameters into a saved search.  If the update action is passed in
     * then updates the search instead of saving a new one
     *
     * @param $s_id id of saved search that was selected for updating
     * @param $s_name name to use when saving this search
     */

    function saveSearch($s_id, $s_name, $update=false){
        global $current_user;


        //create new bean instance, and retrieve search if id is provided
        $search_bean = new SavedSearch();
        if($update && isset($s_id)  && !empty($s_id)){
            $search_bean->retrieve($s_id);
            if($search_bean ==null){
                $search_bean->id = create_guid();
                $search_bean->new_with_id = true;
            }
        }else{
            //id was not provided, so create new one
            $search_bean->id = create_guid();
            $search_bean->new_with_id = true;
        }

        //set data for saving
        $search_bean->name = $s_name;
        $search_bean->search_module= 'KBDocuments';
        $search_bean->assigned_user_id =$current_user->id;
        $contents = array();

        //set id of saved search in contents
        $contents['ID'] = "$search_bean->id";
        //populate contents from post
        foreach($_POST as $key => $val){
            if(!empty($val)){
                $contents[$key] = $val;
            }
        }

        //serialize and encode contents before saving
        $search_bean->contents = base64_encode(serialize($contents));
        $search_bean->save();

            //set the dropdown value to that of current search
            $_POST['saved_search_select'] = $search_bean->id;
    }



    /**loadSavedSearch
     *
     * This method retrieves a saved search and sets the filter params from contents
     *
     * @param $s_id id of saved search that was selected for loading
     * @param $s_name name of saved search being loaded
     */
    function loadSavedSearch($s_id){

        $search_bean = new SavedSearch();

        if(isset($s_id)  && !empty($s_id)){
            //retrieve saved search and unserialize/decode it's contents
            $search_bean->retrieve($s_id);
            $contents = unserialize(base64_decode($search_bean->contents));

            //first clear the current post
            foreach($_POST as $_key=>$_val){
                $_POST[$_key] = '';
            }

            //now populate post values from saved search
            foreach($contents as $key=>$val){
                $_POST[$key] = $val;
            }

            //set the dropdown value to that of current search
            $_POST['saved_search_select'] = $contents['ID'];

        }else{
            //no id specified, set flag not to load values
            $_POST['clear_loaded'] = true;
        }
    }

    /**delSavedSearch
     *
     * This method deletes a saved search
     *
     * @param $s_id id of saved search that was selected for deleting
     */
    function delSavedSearch($s_id){
     global $current_user, $mod_strings, $app_strings;


        $search_bean = new SavedSearch();
        if(isset($s_id)  && !empty($s_id)){
            //mark bean as deleted, and set clear_loaded param to true
            $search_bean->mark_deleted($s_id);
            $_POST['clear_loaded'] = true;

        }

    }

    /**seperateTagNames()
     *
     * This method extracts formatted tags from string and returns an array containing
     * string without tags and string of tag names
     *
     * @param $srch_str_raw string to be processed
     */
    function seperateTagNames($srch_str_raw){
       //lets look for defined tags and extract them from search string.
        $tag_token = array();
        $first_bracket = 0;
        $last_bracket = 1;
        $i=0;
        $open = "[";
        $close = "]";
        $srch_str_raw = from_html($srch_str_raw);

        //remove Tagnames from search string
        while($last_bracket!==false  || $i<5){
            $first_bracket = strpos($srch_str_raw,$open);
            $last_bracket = strpos($srch_str_raw,$close, $first_bracket+1);
            if($last_bracket!==false){
                $tag_token['#TAG_'.$i.'#'] = substr($srch_str_raw, $first_bracket, ($last_bracket-$first_bracket+1));
                $srch_str_raw = str_replace($tag_token['#TAG_'.$i.'#'], " ", $srch_str_raw);
            }else{
                break;
            }
            $i = $i+1;
        }



    $return_arr['search_string_raw'] = $srch_str_raw;
    $return_arr['tag_token_string'] = implode(' ', $tag_token);

    return $return_arr;


}
    /**handleSort()
     *
     * This method recreates the request sort parameters onto Post object, so that sort can
     * be handled by get_fts_list method
     *
     */
    function handleSort(){
        foreach ($_REQUEST as $key=>$val){
         $_POST[$key] = $val;
        }
    }

?>
