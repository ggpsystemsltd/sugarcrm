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

 * Description:  This file is used for all popups on this module
 * The popup_picker.html file is used for generating a list from which to find and
 * choose one instance.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

global $theme;






global $app_strings;
global $app_list_strings;
global $mod_strings;

global $urlPrefix;
global $currentModule;

//include tree view classes.
require_once('include/ytree/Tree.php');
require_once('include/ytree/Node.php');

require_once('modules/ProductCategories/TreeData.php');



class Popup_Picker
{


    /*
     *
     */
    function Popup_Picker()
    {
        ;
    }

    function process_page()
    {
        global $mod_strings, $app_strings, $currentModule,
               $seed_object, $sugar_version, $sugar_config;
        $focus = new ProductCategory();

        if (!isset($_REQUEST['html'])) {
            $xtpl =new XTemplate ('modules/ProductCategories/Popup_picker.html');
            $GLOBALS['log']->debug("using file modules/ProductCategories/Popup_picker1.html");
        }
        else {
            $_REQUEST['html'] = preg_replace("/[^a-zA-Z0-9_]/", "", $_REQUEST['html']);
            $GLOBALS['log']->debug("_REQUEST['html'] is ".$_REQUEST['html']);
            $xtpl =new XTemplate ('modules/ProductCategories/'.$_REQUEST['html'].'.html');
            $GLOBALS['log']->debug("using file modules/ProductCategories/".$_REQUEST['html'].'.html');
        }
        insert_popup_header();

        //tree header.
        $prodcattree=new Tree('productcategories');
        $prodcattree->set_param('module','ProductCategories');

        $parents=array();
        if (!empty($_REQUEST['parent_category_id'])) {
            $parents=$this->find_parents($_REQUEST['parent_category_id']);
        }

       $nodes=get_product_categories(null,$parents);
       foreach ($nodes as $node) {
          $prodcattree->add_node($node);
       }
        $xtpl->assign("TREEHEADER",$prodcattree->generate_header());
        $xtpl->assign("TREEINSTANCE",$prodcattree->generate_nodes_array());

        $xtpl->assign("MODULE_NAME", $currentModule);

        global $sugar_config;

        $site_data = "<script> var site_url= {\"site_url\":\"".getJavascriptSiteURL()."\"};</script>\n";
        $xtpl->assign("SITEURL",$site_data);

        if (!empty($_REQUEST['form']) && $_REQUEST['form'] == 'EditView')
        {
            $the_javascript  = "<script type='text/javascript' language='JavaScript'>\n";
            $the_javascript .= "function set_return(treeid) { \n";
            $the_javascript .= "    node=YAHOO.namespace(treeid).selectednode;";
            $the_javascript .= "    window.opener.document.EditView.parent_id.value = node.data.id;\n";
            $the_javascript .= "    window.opener.document.EditView.parent_name.value = node.label;\n";
            $the_javascript .="     window.close();\n";
            $the_javascript .= "}\n";
            $the_javascript .= "</script>\n";
            $clear_button = "<input title='".$app_strings['LBL_CLEAR_BUTTON_TITLE']."' class='button' LANGUAGE=javascript onclick=\"window.opener.document.EditView.parent_id.value = '';window.opener.document.EditView.parent_name.value = ''; window.close()\" type='submit' name='button' value='  ".$app_strings['LBL_CLEAR_BUTTON_LABEL']."  '>\n";
            $cancel_button = "<input title='".$app_strings['LBL_CANCEL_BUTTON_TITLE']."' accessKey='".$app_strings['LBL_CANCEL_BUTTON_KEY']."' class='button' LANGUAGE=javascript onclick=\"window.close()\" type='submit' name='button' value='  ".$app_strings['LBL_CANCEL_BUTTON_LABEL']."  '>\n";
        }

        if (empty($_REQUEST['form']) || $_REQUEST['form'] == 'EditView' && $_REQUEST['tree'] == 'ProdCat')
        {
            $seed_object->show_products = FALSE;
            $the_javascript  = "<script type='text/javascript' language='JavaScript'>\n";
            $the_javascript .= "function set_return(treeid) { \n";
            $the_javascript .= "    node=YAHOO.namespace(treeid).selectednode;
                                    if (typeof window.opener.document.forms.search_form != 'undefined') //Search
                                    {
                                        var form = window.opener.document.forms.search_form;
                                        var searchType = (form.searchFormTab.value == 'basic_search') ? 'basic' : 'advanced';
                                        form['category_id_'   + searchType].value = node.data.id;
                                        form['category_name_' + searchType].value = node.label;
                                    }
                                    else if(typeof window.opener.document.ReportsWizardForm != 'undefined') { // reports
                                        window.opener.document.ReportsWizardForm['ProductCategories:name:id:1'].value = node.data.id;
                                        window.opener.document.ReportsWizardForm['ProductCategories:name:name:1'].value = node.label;
                                    }
                                    else if(typeof window.opener.document.EditView != 'undefined'){
                                        window.opener.document.EditView.category_id.value = node.data.id;\n";
            $the_javascript .= "        window.opener.document.EditView.category_name.value = node.label;\n
                                    }";
            $the_javascript .="     window.close();\n";
            $the_javascript .= "}\n";
            $the_javascript .= "</script>\n";
            $clear_button = "<input title='".$app_strings['LBL_CLEAR_BUTTON_TITLE']."' class='button' LANGUAGE=javascript onclick=\"window.opener.document.EditView.category_id.value = '';window.opener.document.EditView.category_name.value = ''; window.close()\" type='submit' name='button' value='  ".$app_strings['LBL_CLEAR_BUTTON_LABEL']."  '>\n";
            $cancel_button = "<input title='".$app_strings['LBL_CANCEL_BUTTON_TITLE']."' class='button' LANGUAGE=javascript onclick=\"window.close()\" type='submit' name='button' value='  ".$app_strings['LBL_CANCEL_BUTTON_LABEL']."  '>\n";
        }

        $xtpl->assign("SET_RETURN_JS", $the_javascript);
        $xtpl->assign("CLEAR_BUTTON", $clear_button);
        $xtpl->assign("CANCEL_BUTTON", $cancel_button);

        $xtpl->parse('main');
        $xtpl->out('main');
    }

    function find_parents($current_id) {
        $ctr=0;
        $parents=array();
        $parents[$ctr]=$current_id;
        $notdone=true;
        do {
            $query="select id,name, parent_id from product_categories where id='$current_id' and deleted=0";
            $result=$GLOBALS['db']->query($query);
            $row=$GLOBALS['db']->fetchByAssoc($result);
            if ($row != null and !empty($row['parent_id']) and $row['parent_id']!= '') {
            	$ctr++;
                $parents[$ctr]=$row['parent_id'];
                $current_id=$row['parent_id'];
            } else {
            	$notdone=false;
            }
        } while ($notdone);

        //toplevel item is the only parent, return nothing.
        if (count($parents) < 2) {
        	$parents=array();
        } else {
            krsort($parents);reset($parents);
        }
        return $parents;
    }


}
?>
