<?php
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

//require_once('include/Utils.php');

class ViewEditDepDropdown extends SugarView
{
    function ViewEditDepDropdown(){
        $this->options['show_footer'] = false;
        if (isset ($_REQUEST['embed']) && $_REQUEST['embed'])
        {
            $this->options['show_header'] = false;
        }
        parent::SugarView();
    }

    function display(){
        global $app_strings, $current_user, $mod_strings, $app_list_strings;
        $smarty = new Sugar_Smarty();
        require_once('include/JSON.php');
        //Load the field list from the target module
        $selected_lang = $_SESSION['authenticated_user_language'];
        $vardef = array();
        //Copy app strings
        $my_list_strings = array_merge($app_list_strings);
        $child = $_REQUEST['field'];

        //if we are using ModuleBuilder then process the following
        if(!empty($_REQUEST['package']) && $_REQUEST['package'] != 'studio'){
            require_once('modules/ModuleBuilder/MB/ModuleBuilder.php');
            $mb = new ModuleBuilder();
            $this->module = $mb->getPackageModule($_REQUEST['package'], $_REQUEST['view_module']);
            $vardef = $this->module->getVardefs();
            $this->module->mblanguage->generateAppStrings(false) ;
            $my_list_strings = array_merge( $my_list_strings, $this->module->mblanguage->appListStrings[$selected_lang.'.lang.php'] );
        } else {
            $vardef = BeanFactory::getBean($_REQUEST['view_module'])->field_defs;
        }

        foreach($my_list_strings as $key=>$value){
            if(!is_array($value)){
                unset($my_list_strings[$key]);
            }
        }

        $parents = $this->getParentDDs($vardef, $child, $my_list_strings);
        $visibility_grid = !empty($vardef[$child]['visibility_grid']) ? $vardef[$child]['visibility_grid'] : array();

        $smarty->assign('app_strings', $app_strings);
        $smarty->assign('mod', $mod_strings);
        $smarty->assign('parents', JSON::encode($parents));
        $smarty->assign('visibility_grid', JSON::encode($visibility_grid));
        $smarty->display('modules/ExpressionEngine/tpls/ddEditor.tpl');
    }

    /**
     * Takes an array of field defs and returns a formated list of fields that are valid for use in expressions.
     *
     * @param array $fieldDef
     * @return array
     */
    protected function getParentDDs($fields, $childField, $list_strings){
        $ret = array();
        foreach($fields as $name => $def)
        {
            //Return all the enum fields
            if(!empty($def['type']) && $def['type'] == "enum" && !empty($list_strings[$def['options']]) && $name != $childField)
            {
                $ret[$name] = array(
                    "label" => translate($def['vname']),
                    "options" => $list_strings[$def['options']],
                );
            }
        }
        return $ret;
    }
}