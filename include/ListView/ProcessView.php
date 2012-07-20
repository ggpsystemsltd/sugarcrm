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






class ProcessView {

    var $xtpl;
    var $workflow_object;
    var $target_bean;

    var $hide_array;
    var $add_filter = false;

    var $step;

    var $local_strings = null;

    /*

    $no_count is if the individual elements all have unique names and we
    dont need to add a number to the end of each item like user_5 or user_6

    This is specific to the bottom build right now
    */

    var $no_count = false;

    var $top_block;
    var $bottom_block;

    function ProcessView($workflow_object, $target_bean){
        $this->xtpl = new XTemplate ('include/ListView/ProcessView.html');
        $this->workflow_object = $workflow_object;
        $this->target_bean = $target_bean;
    }


    function write($step){

        $this->step = $step;


        global $process_dictionary;
        $target_meta_array = $process_dictionary[$step]['elements'];
        $element_count = 0;
        $this->hide_array = $process_dictionary[$step]['hide_others'];

        $exclusion_list = $this->build_mutual_exclusion_list($target_meta_array);

        foreach($target_meta_array as $element => $specific_array){
            $selected_element = $this->is_selected_element($specific_array);
            if($this->build_this_type($specific_array) && (empty($exclusion_list) || !in_array($element, $exclusion_list))){
                $this->build_top_block($element_count, $specific_array['top'], $selected_element);
                $this->build_bottom_block($element_count, $specific_array['bottom'], $selected_element);
            } else {
                //do not display this option
            }

            ++$element_count;
            //end foreach
        }
        $this->top_block = $this->xtpl->text("top");
        $this->bottom_block = $this->xtpl->text("bottom");
        /*
         //to protect when you come back here
         if($focus->type == "compare_change"){
         //limit select options
         $form->assign("DISABLE_OPTIONS", "disabled");
         }
         */
        //end function write
    }

    function get_prev_text($step, $target_element){

        global $process_dictionary;
        global $local_string;

        $target_meta_array = $process_dictionary[$step]['elements'][$target_element];

        $prev_display_text = "";

        foreach($target_meta_array['bottom']['options'] as $key => $option_array){

            if($option_array['text_type']=="static"){
                $vname = '';
                if($this->workflow_object->type=="Time" && isset($option_array['vname_time'])){
                    $vname = $option_array['vname_time'];
                }
                else{
                    $vname = $option_array['vname'];
                }
                if($this->local_strings!=null){
                    $prev_display_text .= get_label($vname, $this->local_strings)."&nbsp;";
                } else {
                    $prev_display_text .= translate_label($vname)."&nbsp;";
                }
            }
            if($option_array['text_type']=="dynamic"){
            	$trans_ele = $this->translate_element($option_array);
            	if ($trans_ele === false)
            	   return false;
                $prev_display_text .= $trans_ele."&nbsp;";
            }
            //end for each option
        }

        return $prev_display_text;

        //end function get_prev_text
    }

    function get_adv_related($step, $target_element, $rel_name_part){

        global $process_dictionary;
        global $local_string;


        $target_meta_array = $process_dictionary[$step]['elements'][$target_element];

        if(!empty($target_meta_array['bottom']['related']['count']) &&
        $target_meta_array['bottom']['related']['count'] > 0 ){
            //Then there is a need for an advanced related block

            $adv_related_array = array();

            //Build Relationships
            $rel_handler = $this->workflow_object->call_relationship_handler("base_module", true);

            //Get the stuff you will need for rel1 regardless
            $target_rel1_field = $target_meta_array['bottom']['related']['rel1_field'];
            $target_rel1_type = $target_rel1_field."_type";

            if($target_meta_array['bottom']['related']['count'] == 1){
                //do not use rel2
                $rel_handler->set_rel_vardef_fields($this->target_bean->$target_rel1_field);
                $rel_handler->build_info();
            } else {
                //use rel2
                $target_rel2_field = $target_meta_array['bottom']['related']['rel2_field'];
                $target_rel2_type = $target_rel2_field."_type";

                if($this->target_bean->$target_rel2_field!=""){
                    $rel_handler->set_rel_vardef_fields($this->target_bean->$target_rel1_field, $this->target_bean->$target_rel2_field);
                    $rel_handler->build_info(true);
                } else {
                    $rel_handler->set_rel_vardef_fields($this->target_bean->$target_rel1_field);
                    $rel_handler->build_info(false);
                }
            }
            $this->xtpl->assign("REL_TITLE",$local_string['LBL_TITLE_ADVANCED']);
            ///REL 1///
            $rel1_option_array = $this->glue_adv_rel_options("rel1", $rel_handler->rel1_array);
            $rel1_select = get_select_options_with_id($rel1_option_array, $this->target_bean->$target_rel1_type);
            $this->xtpl->assign("REL1_TYPE", $rel1_select);
            $this->xtpl->assign("REL1_BASE_MODULE", $rel_handler->rel1_module);
            $this->xtpl->assign("REL1_DISPLAY_TEXT", $local_string['LBL_FILTER_RELATED']." ". $rel_handler->rel1_array['plabel']." ".$local_string['LBL_BY']." ");
            $start_script = "toggle_filter('rel1'); \n";
            //See if the object is present
            $this->build_filter_output("REL1", "rel1_".$rel_name_part."_fil");

            ///REL 2//
            if($target_meta_array['bottom']['related']['count'] == 2 && $this->target_bean->$target_rel2_field!=""){
                $rel2_option_array = $this->glue_adv_rel_options("rel2", $rel_handler->rel1_array, $rel_handler->rel2_array);
                $rel2_select = get_select_options_with_id($rel2_option_array, $this->target_bean->$target_rel2_type);
                $this->xtpl->assign("REL2_TYPE", $rel2_select);
                $this->xtpl->assign("REL2_BASE_MODULE", $rel_handler->rel2_module);
                $this->xtpl->assign("REL2_DISPLAY_TEXT", $local_string['LBL_FILTER_RELATED']." ". $rel_handler->rel1_array['slabel'].$local_string['LBL__S']." ".$rel_handler->rel2_array['plabel']." ".$local_string['LBL_BY']." ");
                $start_script .= "toggle_filter('rel2'); \n";
                $this->build_filter_output("REL2", "rel2_".$rel_name_part."_fil");
                //end if this also has a rel2
            } else {
                $start_script .= "hide_target('top_rel2'); \n";
                $start_script .= "hide_target('lang_rel2'); \n";
            }

            $this->xtpl->assign("START_SCRIPT", $start_script);
            $this->xtpl->parse("adv_related");
            $adv_related_array['block'] = $this->xtpl->text("adv_related");

            return $adv_related_array;

            //end if there is a need for an advanced block
        }
        //end function get_adv_related
    }



    function build_top_block($element_count, & $top_array, $selected_element){

        if($this->hide_this_type($top_array['value'])){
            //mod_id
            //input_element
            //display_text

            $specific_type = $top_array['name']."".$element_count;
            $type = $top_array['name'];
            $value = $top_array['value'];
            $mod_id = "mod_".$specific_type;

            //SELECTED_ELEMENT////
            if($selected_element){
                $selected = "checked";
            } else {
                $selected = "";
            }
            //////INPUT_ELEMENT/////////////////////
            if($top_array['type']=="radio"){
                $input_element = "<input id='".$specific_type."' name='".$type."' type='radio' tabindex='2' value ='".$value."' onclick='togglelanguage(\"clear_field\");' ".$selected.">";
            }


            ///////////DISPLAY_TEXT/////////////////
            $display_text = "";

            foreach($top_array['options'] as $key => $option_array){

                $display_text .= translate_label($option_array['vname'])."&nbsp;";
            }

            $this->xtpl->assign("MOD_ID", $mod_id);
            $this->xtpl->assign("INPUT_ELEMENT", $input_element);
            $this->xtpl->assign("DISPLAY_TEXT", $display_text);


            $this->xtpl->parse("top");
            //end if we are not hiding this
        }

        //end function build_top_block
    }


    function build_bottom_block($element_count, & $bottom_array, $selected_element=false){

        //lang_id
        //default_text_values
        //display_text

        $value = $bottom_array['value'];
        $lang_id = "lang_".$value;

        ///////////DISPLAY_TEXT/////////////////
        $display_text = "";
        $default_text = "";

        $option_count = 0;

        foreach($bottom_array['options'] as $key => $option_array){

            if($option_array['text_type']=="static"){
                $display_text .= translate_label($option_array['vname'])."&nbsp;";
            }
            if($option_array['text_type']=="dynamic"){

                //You can use this if you have more than one href tag in a line
                if(!empty($option_array['type_special'])){
                    $target_value = $option_array['type_special'];
                } else {
                    $target_value = $value;
                }

                if($option_array['type']=="dropdown"){
                    $display_text .= $this->get_input_element($option_count, $option_array)."&nbsp;";
                } else {
                    $display_text .= $this->get_href_element($target_value, $option_count, $option_array, $selected_element)."&nbsp;";
                    $default_text .= $this->get_default_element($target_value, $option_count, $option_array)."&nbsp;";
                }
                //end if text_type is dynamic
            }

            ++$option_count;

            //end foreach display_text loop
        }

        $this->xtpl->assign("LANG_ID", $lang_id);
        $this->xtpl->assign("DISPLAY_TEXT", $display_text);
        $this->xtpl->assign("DEFAULT_TEXT_VALUES", $default_text);

        //Add address information - For Recipient/Invitee Processing
        if(!empty($this->step) && $this->step=="AlertsCreateStep1"){

            //Should we show the address_type?
            if(!empty($bottom_array['show_address_type']) && $bottom_array['show_address_type']==true){

                global $app_list_strings;
                global $mod_strings;
                $this->xtpl->assign("ADDRESS_TYPE", $this->target_bean->address_type);
                $address_type_dom = $this->target_bean->get_address_type_dom();
                $this->xtpl->assign("ADDRESS_TYPE_DOM", $address_type_dom);

                $this->xtpl->assign("ADDRESS_TYPE_TARGET",$app_list_strings[$address_type_dom][$this->target_bean->address_type]);
                $this->xtpl->assign("LBL_ADDRESS_TYPE", $mod_strings['LBL_ADDRESS_TYPE']);
                $this->xtpl->parse("bottom.address_type");

                //end if show_address_type is true;
            }

        }
        //End address information - For Recipient/Invitee Processing

        $this->xtpl->parse("bottom");
        //end function build_bottom_block
    }

    function is_selected_element($specific_array){

        $specific_field = $specific_array['top']['name'];

        if(isset($this->target_bean->$specific_field)){
            $actual_value = $this->target_bean->$specific_field;
        } else {
            $actual_value = "";
        }
        if($specific_array['top']['value'] == $actual_value){
            return true;
        }
        return false;
        //end function is_selected_element
    }

    /* Build a list of fields that should not be shown based on existing fields
     * that have already been selected.
     * params $target_meta_array - The meta array that are we going to use in order to read
     *        mutual exclusion fields.
     * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc..
     * All Rights Reserved..
     * Contributor(s): ______________________________________..
     */
    function build_mutual_exclusion_list($target_meta_array){
        $meta_exclusion_array = array();
        foreach($target_meta_array as $element => $specific_array){
            foreach($specific_array['top']['options']as $key => $option_array){
                if(isset($option_array['mutual_exclusion'])){
                    foreach($option_array['mutual_exclusion'] as $exclusion){
                        $meta_exclusion_array[$element][] = $exclusion;
                    }
                }
            }
        }

        //now check if the element is on the workflow
        $exclusion_array = array();
        if(isset($meta_exclusion_array) && !empty($meta_exclusion_array)){
            $trigger_list = $this->workflow_object->get_linked_beans('triggers','WorkFlowTriggerShell');
            foreach($trigger_list as $trigger){
                if(array_key_exists($trigger->type, $meta_exclusion_array))
                {
                    foreach($meta_exclusion_array[$trigger->type] as $type => $exclude){
                        $exclusion_array[] = $exclude;
                    }
                }
            }
        }
        return $exclusion_array;
    }

    function build_this_type($specific_array){

        $trigger_type = $specific_array['trigger_type'];

        //checks for if this is a non-first trigger element. Some types are only allowed to
        //be the main trigger and not an additional filter trigger element.
        if($this->add_filter){
            if(!empty($specific_array['filter_type'][$this->workflow_object->type])){
                return true;
            } else {
                return false;
            }
        }
        ///////////////////

        if($trigger_type=="all"){
            return  true;
        }
        if($trigger_type=="non_time"){

            if($this->workflow_object->type=="Normal"){
                return true;
            }
            if($this->workflow_object->type=="Time"){
                return false;
            }

            //if trigger_type is non_time
        }

        if($trigger_type=="time_only"){

            if($this->workflow_object->type=="Normal"){
                return false;
            }
            if($this->workflow_object->type=="Time"){
                return true;
            }

            //if trigger_type is time_only
        }

        if($trigger_type=="none"){
            return false;
        }

        //end function build_this_type
    }

    function hide_this_type($target_value){

        //if we are returning to this window after we have already selected
        $target_field = $this->hide_array['target_field'];
        if(!empty($this->target_bean->$target_field)){
            $target_element = $this->target_bean->$target_field;
        } else {
            //new or empty so true
            return true;
        }

        if(!empty($this->hide_array['target_element'][$target_element])) {
            foreach($this->hide_array['target_element'][$target_element] as $keep_element){
                if($target_value == $keep_element){
                    return true;
                }
            }
        }
        return false;

        //end hide_this_type function
    }


    function get_href_element($target_value, $option_count, $option_array, $selected_element){

        if($this->no_count==false){
            $href_id = $option_array['type']."_".$target_value."_".$option_count;
        } else {
            $href_id = $option_array['type']."_".$target_value;
        }

        $javascript_content = "";
        ///Javascript content value
        if(isset($option_array['jscript_content'])){
            foreach($option_array['jscript_content'] as $variable_to_pass ){

                if($javascript_content!=""){
                    $javascript_content .= ",";
                }


                if($variable_to_pass == "self"){
                    if($this->no_count==false){
                        $href_jscript_value = $target_value."_".$option_count;
                    } else {
                        $href_jscript_value = $target_value;
                    }
                    $javascript_content .= "'".$href_jscript_value."'";
                } else {
                    $javascript_content .= "'".$variable_to_pass."'";
                }
                //end foreach javascript content value
            }
            //end if the jscript content array is set
        }

        if($selected_element){
            //this is selected so translate the value
            $href_inner_text = $this->translate_element($option_array);
        } else {

            $href_inner_text = translate_label($option_array['vname'])."&nbsp;";
        }

        $href_element = "<a id='".$href_id."' href=\"javascript:void(0)\" onclick=\"".$option_array['jscript_function']."(".$javascript_content.");\"><i>".$href_inner_text."</i></a> \n";
        return $href_element;

        //end function get_href_element
    }


    function get_input_element($option_count, $option_array){

        if($option_array['type']=="dropdown"){

            $expression_object = new Expression();

            $select_options = $expression_object->get_selector_array("dom_array", $this->target_bean->$option_array['value'], $option_array['dom_name'], false);
            return "<select id='".$option_array['value']."' name='".$option_array['value']."' tabindex='1'>".$select_options."</select>";
        }
        //end function get_input_element
    }


    function get_default_element($target_value, $option_count, $option_array){

        if($this->no_count==false){
            $input_id = "default_".$option_array['type']."_".$target_value."_".$option_count;
        } else {
            $input_id = "default_".$option_array['type']."_".$target_value;
        }

        $default_value = translate_label($option_array['vname']);
        return "<input type='hidden' id='".$input_id."' name='".$input_id."' value='".$default_value."'> \n";

        //end function get_default_element
    }

    function translate_element(& $option_array){
        global $current_language;
        global $app_strings;
        global $app_list_strings;
        global $local_string;

        $target_element = $this->target_bean->$option_array['value'];
        if(!empty($option_array['possess_next']) && $option_array['possess_next']=="Yes"
        ){
            $possess_next = true;
        } else {
            $possess_next = false;
        }

        if(!empty($option_array['value2'])){
            $target_element2 = $this->target_bean->$option_array['value2'];
        } else {
            $target_element2 = "";
        }


        $type = $option_array['value_type'];
        if(!empty($option_array['value_exp_type'])){
            $exp_type = $option_array['value_exp_type'];
        } else {
            $exp_type = "";
        }
        if(!empty($option_array['dom_name'])){
            $dom_name = $option_array['dom_name'];
        } else {
            $dom_name = "";
        }

        /*
         TYPES:
         normal_field     ---     uses the base module as the language file.  Just
         translate the field using the vardef.

         relrel_module     ---        uses the related module, either 1 or 2 deep.


         special_exp        ---        uses the expression object get_selector_array function
         this is for special translations that are getting in db arrays
         not language labels
         examples: user name, team name, role etc.

         module            ---        name of module, so translate

         */

        if($type=="normal_field"){
            return translate_label_from_module($this->workflow_object->base_module, $target_element);
        }

        if($type=="relrel_module"){

            $rel_handler = $this->workflow_object->call_relationship_handler("base_module", true);

            if($target_element2!=""){
                //rel2 is present
                $rel_handler->set_rel_vardef_fields($target_element, $target_element2);
                $rel_handler->build_info(true);


                //translate the target elements!!
                $relrel_text = $rel_handler->rel2_array['slabel'].$local_string['LBL__S']." ".$rel_handler->rel1_array['slabel'];
            } else {
                //rel2 is not present so just use rel1
                $rel_handler->set_rel_vardef_fields($target_element);
                $rel_handler->build_info(false);
                //translate the target elements!!

                $relrel_text = $rel_handler->rel1_array['slabel'];

                //checks to see if this possess the next word
                if($possess_next==true){
                    $relrel_text = $relrel_text.$local_string['LBL__S'];
                }


            }
            return "".$relrel_text;
        }

        if($type=="special_exp"){
            $expression_object = new Expression();

            $text_array = $expression_object->get_selector_array($exp_type, "", $dom_name, true);

            if (empty($text_array[$target_element])) {
                return false;
            }
            $target_value = $text_array[$target_element];
            unset($expression_object);
            return $target_value;
        }

        if($type=="module"){

            if(!empty($app_list_strings['moduleListSingular'][$target_element])){
                return $app_list_strings['moduleListSingular'][$target_element];
            }
            elseif(!empty($app_list_strings['moduleList'][ucfirst($target_element)])) {//bug 27267: This is not a good fix, here the $target_element is the field name of vardefs.  Sometimes it may not in the moduleList
                return $app_list_strings['moduleList'][ucfirst($target_element)];
            }
            else {

                //module not present so just use target_element value
                return $target_element;
            }

        }

        //end function translate_element
    }

    function glue_adv_rel_options($type, $rel1_array , $rel2_array=""){
        global $app_list_strings;
        global $local_string;

        $target_array = $app_list_strings['wflow_rel_type_dom'];


        if($type=="rel1"){
            $target_array['all'] = $target_array['all']." ".$rel1_array['plabel'];
            //removed because it is Ambiguous
            //$target_array['first'] = $target_array['first']." ".$rel1_array['slabel'];
            $target_array['filter'] = $target_array['filter']." ".$rel1_array['plabel'];

            //end if type is rel1
        }

        if($type=="rel2"){
            $target_array['all'] = $target_array['all']." ".$rel1_array['slabel'].$local_string['LBL__S']." ".$rel2_array['plabel'];
            ////removed because it is Ambiguous
            //$target_array['first'] = $target_array['first']." ".$rel1_array['slabel'].$GLOBALS['mod_strings']['LBL__S']." ".$rel2_array['slabel'];
            $target_array['filter'] = $target_array['filter']." ".$rel1_array['slabel'].$local_string['LBL__S']." ".$rel2_array['plabel'];

            //end if type is rel1
        }

        return $target_array;

        //end function glue_adv_rel_options
    }



    function build_filter_output($prefix, $vardef_name){

        $filter_object = new Expression();
        //only try to retrieve if there is a base object set
        if(isset($this->target_bean->id) && $this->target_bean->id!="") {
            $filter_list = $this->target_bean->get_linked_beans($vardef_name,'Expression');
            if(isset($filter_list[0]) && $filter_list[0]!='') {
                $filter_id = $filter_list[0]->id;
            }

            if(isset($filter_id) && $filter_id!="") {
                $filter_object->retrieve($filter_id);
                $this->xtpl->assign($prefix."_CHECKED", "checked");
                $display_array = $filter_object->get_display_array_using_name();
                $filter_expression_text = $display_array['lhs_field']." ".$display_array['operator']." ".$display_array['rhs_value'];
            } else {
                $filter_expression_text = "field";
            }
            //end if base_id is there
        } else {
            $filter_expression_text = "field";
        }

        $this->xtpl->assign($prefix."_EXP_ID", $filter_object->id);
        $this->xtpl->assign($prefix."_RHS_VALUE", $filter_object->rhs_value);
        $this->xtpl->assign($prefix."_TEXT", $filter_expression_text);
        $this->xtpl->assign($prefix."_OPERATOR", $filter_object->operator);
        $this->xtpl->assign($prefix."_EXP_TYPE", $filter_object->exp_type);
        $this->xtpl->assign($prefix."_LHS_FIELD", $filter_object->lhs_field);


        //end build_filter_output
    }

    /**
     * returns text that describes the action
     * @param WorkFlowActionShell $action_shell - the WorkFlowActionShell to use to process
     * @return an array containing the relevant data for use in UI
     * @access public
     */
    function get_action_shell_display_text($action_shell, $get_all_fields = true)
    {

        $action_processed = false;

        $workflow_object = $action_shell->get_workflow_object();
        if($action_shell->action_type=="update"){
            $temp_module = get_module_info($workflow_object->base_module);
            $meta_filter = "action_filter";
            $action_processed = true;
        }
        if($action_shell->action_type=="update_rel"){
            $rel_module = $workflow_object->get_rel_module($action_shell->rel_module);
            $temp_module = get_module_info($rel_module);
            $meta_filter = "action_filter";
            $action_processed = true;
        }

        if($action_shell->action_type=="new"){
            $rel_module = $workflow_object->get_rel_module($action_shell->action_module);
            $temp_module = get_module_info($rel_module);
            $meta_filter = "action_filter";
            $action_processed = true;
        }

        if($action_shell->action_type=="new_rel"){
            $rel_handler = $workflow_object->call_relationship_handler("base_module", true);
            $rel_handler->set_rel_vardef_fields($action_shell->rel_module,$action_shell->action_module);
            $rel_handler->build_info(true);
            $temp_module = $rel_handler->rel2_bean;
            $meta_filter = "action_filter";
            $action_processed = true;
        }


        //BEGIN WFLOW PLUGINS
        if($action_processed==false){
            $opt['object'] = $this;
            $opt['workflow_object'] = $workflow_object;
            $opt['action_shell'] = $action_shell;
            $list_data_array = get_plugin("workflow", "action_createstep2", $opt);
            if(!empty($list_data_array['action_processed']) && $list_data_array['action_processed']==true){
                return $list_data_array['results'];
            }
        }
        //END WFLOW PLUGINS



        //Using VarDef Handler Object to obtain filtered array

        $temp_module->call_vardef_handler($meta_filter);
        $field_array = $temp_module->vardef_handler->get_vardef_array();

        $field_count = 0;
        $result_array = array();

        $actions = $action_shell->get_actions($action_shell->id);
        $action_fields = array();
        foreach($actions as $action)
        {
            if (!empty($action->field))
            {
                //Check if the actions field is still valid (was not deleted or changed)
                if (empty($field_array[$action->field]))
                {
                    //invalid field
                    $result_array[]  = array(
                        "ACTION_VALUE" => "", "ACTION_ACTION_ID" => "", "ACTION_SET_TYPE" => "",
                        "ACTION_ADV_TYPE" => "", "START_DISPLAY" => "",  "FIELD_NUM" => $field_count,
                        "FIELD_VALUE" => $action->field, "FIELD_VALUE" => $action->field,
                        "ACTION_DISPLAY_TEXT" => false, "ACTION_ADV_VALUE" => "",
                        "ACTION_EXT1" => "", "ACTION_EXT2" => "", "ACTION_EXT3" => "",
                    );
                    if (!$get_all_fields)
                        ++ $field_count;
                    continue;
                }
                $action_fields[$action->field] = $action->field;
            }
        }
        /* We should NOT be itterating over every field in the module per actionshell,
         * calling multiple queries per field just to throw out the results.
         * We should start with the list of actions and the fields they provide
         * if we are not attempting to add a new action. (when $get_all_fields is false)
         */
        if (!$get_all_fields)
        {
            $field_array = $action_fields;
        }

        foreach($field_array as $key => $value){
            //check to see if this record exists already
            if(!empty($action_shell->id) && $action_shell->id!=""){

                $action_id = $action_shell->get_action_id($key);
                if($action_id!==false){
                    $action_object = new WorkFlowAction();
                    $action_object->retrieve($action_id);
                    $act_action_value = $action_object->value;
                    $start_display = "none";
                    $act_id = $action_object->id;
                    $act_set_type =  $action_object->set_type;
                    $act_adv_type = $action_object->adv_type;

                    $start_display = "";
                } else {
                    $start_display = $this->target_bean->check_required_field("start_display", $temp_module, $key);
                    $act_action_value = "";
                    $act_id = "";
                    $act_set_type =  "";
                    $act_adv_type = "";
                }

            } else {
                $action_id = false;
                $start_display = $this->target_bean->check_required_field("start_display", $temp_module, $key);
                $act_action_value = "";
                $act_id = "";
                $act_set_type =  "";
                $act_adv_type = "";
            }


            if($action_id!==false){
                $act_adv_value = $action_object->value;
                $act_ext1 = $action_object->ext1;
                $act_ext2 = $action_object->ext2;
                $act_ext3 = $action_object->ext3;
            } else {
                $act_adv_value = "";
                $act_ext1 = "";
                $act_ext2 = "";
                $act_ext3 = "";
            }
            $sub_array = array();
            $sub_array["ACTION_VALUE"] = $act_action_value;
            $sub_array["ACTION_ACTION_ID"] = $act_id;
            $sub_array["ACTION_SET_TYPE"] = $act_set_type;
            $sub_array["ACTION_ADV_TYPE"] = $act_adv_type;
            $sub_array["START_DISPLAY"] = $start_display;
            $sub_array["FIELD_NUM"] = $field_count;
            $sub_array["FIELD_VALUE"] = $key;
            $sub_array["FIELD_NAME"] = $value;
            $sub_array["ACTION_DISPLAY_TEXT"] = get_display_text($temp_module, $key, $act_action_value, $act_adv_type, $act_ext1, array('for_action_display' => true));
            $sub_array["ACTION_ADV_VALUE"] = $act_adv_value;
            $sub_array["ACTION_EXT1"] = $act_ext1;
            $sub_array["ACTION_EXT2"] = $act_ext2;
            $sub_array["ACTION_EXT3"] = $act_ext3;

            $result_array[] = $sub_array;

            ++ $field_count;

            //end foreach
        }
        $combined_results = array();
        $combined_results["RESULT_ARRAY"] = $result_array;
        $combined_results["TEMP_MODULE_DIR"] = $temp_module->module_dir;
        return $combined_results;
    }

    function get_list_display_text_compare_specific($trigger_shell)
    {
        global $app_list_strings;
        $temp_module = get_module_info($this->workflow_object->base_module);
        $future_object = new Expression();
        $future_list = $trigger_shell->get_linked_beans('future_triggers','Expression');
        if(!empty($future_list[0])) {
            $future_id = $future_list[0]->id;
        }
        $filter_expression_text = '';
        if(!empty($future_id))
        {
            $future_object->retrieve($future_id);
            $display_array = $future_object->get_display_array($temp_module);

            if($this->workflow_object->type=="Time")
            {

                if($future_object->exp_type=="datetime" || $future_object->exp_type=="date" || $future_object->exp_type=="datetimecombo")
                {
                    if($future_object->operator=="More Than")
                    {
                        $special_text = "was more than";
                        $special_text2 = "ago";
                    }
                    else
                    {
                        $special_text = "is less than";
                        $special_text2 = "from now";
                    }
                    $filter_expression_text = $special_text." '<i>".$app_list_strings['tselect_type_dom'][$future_object->ext1]."</i>' ".$special_text2;
                }
                else
                {
                    $filter_expression_text = $display_array['operator']." '<i>".$display_array['rhs_value']."</i>' for at least  ".$app_list_strings['tselect_type_dom'][$future_object->ext1];
                }
            }
            else
            {
                $filter_expression_text = $display_array['operator']." ".$display_array['rhs_value'];
            }
        }
        return $filter_expression_text;
    }

    function get_trigger_list_display_text_generic(&$trigger_shell)
    {
        //WDong Bug: 12280 The condition value for the created workflow definition is not localized.
        //$current_language needs to be a param of function return_module_language().
        global $current_language;
        $tmp_mod_strings=return_module_language($current_language,'workflow');
        if(isset($trigger_shell->id) && $trigger_shell->id!="")
        {
            $filter1_object = new Expression();
            $filter_list = $trigger_shell->get_linked_beans('expressions','Expression');
            if(isset($filter_list[0]) && $filter_list[0]!= null)
            {
                $filter1_id = $filter_list[0]->id;
            }

            if(isset($filter1_id) && $filter1_id!="")
            {
                $filter1_object->retrieve($filter1_id);
                //Check if a relate object id is
                if ($filter1_object->exp_type == 'relate')
                {
                	$wfseed = get_module_info($filter1_object->lhs_module);
                	$field_def = $wfseed->field_defs[$filter1_object->lhs_field];
                	$rel_seed = get_module_info($field_def['module']);
                	$rel_seed->retrieve($filter1_object->rhs_value);
                	if (empty($rel_seed->id))
                	{
                		return '<span class="error">'. translate("LBL_TRIGGER_ERROR") . '</span>';
                	}
                }

                //$target_module = $focus->target_module;
                if($trigger_shell->type != "compare_count")
                {
                    $display_array = $filter1_object->get_display_array_using_name();
                    $filter_expression_text = $display_array['lhs_field']." ".$display_array['operator']." ".$display_array['rhs_value'];
                }
                else
                {
                    $filter_expression_text = $filter1_object->operator." ".$filter1_object->rhs_value;
                }
            }
            else
            {

                if($trigger_shell->type == "trigger_record_change")
                {
                    $filter_expression_text = $tmp_mod_strings['LBL_ANY_FIELD'];
                }
                else
                {
                    $filter_expression_text = $tmp_mod_strings['LBL_SPECIFIC_FIELD'];
                }
            }
            //end if base_id is there
        }
        else
        {
            if($trigger_shell->type == "trigger_record_change")
            {
                $filter_expression_text = $tmp_mod_strings['LBL_ANY_FIELD'];
            }
            else
            {
                $filter_expression_text = $tmp_mod_strings['LBL_SPECIFIC_FIELD'];
            }
        }
        return $filter_expression_text;
    }

    function get_trigger_display_text($step, $trigger_shell)
    {
        global $process_dictionary;
        global $local_string;
        $target_meta_array = $process_dictionary[$step]['elements'][$trigger_shell->type];

        if(isset($target_meta_array['bottom']['options']['1']['display_function']))
        {
            $func = $target_meta_array['bottom']['options']['1']['display_function'];
            return $this->$func($trigger_shell);
        }
        else
        {
            return $this->get_trigger_list_display_text_generic($trigger_shell);
        }
    }

    function get_js_exception_fields()
    {
        return array("char", "varchar", "name", "phone", "email", "enum", "assigned_user_name");
    }
    //end class ProcessView
}

