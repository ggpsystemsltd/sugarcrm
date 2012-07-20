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

require_once('modules/DynamicFields/templates/Fields/TemplateField.php');
class TemplateBoolean extends TemplateField{
    var $default_value = '0';
    var $default = '0';
	var $type = 'bool';

	//BEGIN BACKWARDS COMPATABILITY
function get_xtpl_edit(){
        $name = $this->name;
        $returnXTPL = array();
        if(!empty($this->help)){
            $returnXTPL[$this->name . '_help'] = translate($this->help, $this->bean->module_dir);
        }
        if(isset($this->bean->$name)){


            if(strcmp($this->bean->$name ,'1') ==0  || strcmp($this->bean->$name,'on')==0 || strcmp($this->bean->$name,'yes')==0 || strcmp($this->bean->$name, 'true')==0){
                $returnXTPL[$this->name . '_checked'] = 'checked';
                $returnXTPL[$this->name] = 'checked';
            }
        }else{

                if(empty($this->bean->id)){

                    if(!empty($this->default_value)){

                        if(!(strcmp($this->default_value,'false')==0 || strcmp($this->default_value,'no')==0 || strcmp($this->default_value,'off')==0 )){
                            $returnXTPL[$this->name . '_checked'] = 'checked';
                            $returnXTPL[$this->name] = 'checked';
                        }

                    }
                    $returnXTPL[strtoupper($this->name)] =  $this->default_value;
                }
        }



        return $returnXTPL;
    }




    function get_xtpl_search(){

        if(!empty($_REQUEST[$this->name])){
            $returnXTPL = array();

            if($_REQUEST[$this->name] == '1' || $_REQUEST[$this->name] == 'on' || $_REQUEST[$this->name] == 'yes'){
                $returnXTPL[$this->name . '_checked'] = 'checked';
                $returnXTPL[$this->name] = 'checked';
            }
            return $returnXTPL;

        }
        return '';
    }

   function get_xtpl_detail(){
        $name = $this->name;
        $returnXTPL = array();
        if(!empty($this->help)){
            $returnXTPL[$this->name . '_help'] = translate($this->help, $this->bean->module_dir);
        }
        $returnXTPL[$this->name . '_checked'] = '';
        $returnXTPL[$this->name] = '';

        if(isset($this->bean->$name)){
            if(strcmp($this->bean->$name ,'1') ==0  || strcmp($this->bean->$name,'on')==0 || strcmp($this->bean->$name,'yes')==0 || strcmp($this->bean->$name, 'true')==0){
                $returnXTPL[$this->name . '_checked'] = 'checked';
                $returnXTPL[$this->name] = 'checked';
            }
        }
        return $returnXTPL;
    }
    function get_xtpl_list(){
        return $this->get_xtpl_edit();
    }







}


?>
