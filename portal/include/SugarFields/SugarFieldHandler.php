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

class SugarFieldHandler {
    var $sugarFieldObjects = array();

    function SugarFieldHandler() {
    }

    /**
     * return the singleton of the SugarField
     *
     * @param field string field type
     */
    /*
    function getSugarField($field) {
        if(!isset($this->sugarFieldObjects[$field])) {
            require_once('include/SugarFields/Fields/SugarField' . $field . '/SugarField' . $field . '.php');
            $class = 'SugarField' . $field; // ex. SugarFieldVarchar, SugarFieldInt, etc.
            $this->sugarFieldObjects[$field] = new $class();
        }
        return $this->sugarFieldObjects[$field];
    }
    */

    function getSugarField($field) {
        if(!isset($this->sugarFieldObjects[$field])) {
        	if(file_exists('include/SugarFields/Fields/SugarField'.$field.'/SugarField'.$field.'.php')){
           		$type = $field;
        	}else{
        		$type = 'Base';
        	}

        	require_once('include/SugarFields/Fields/SugarField'.$type.'/SugarField'.$type.'.php');
            $class = 'SugarField' . $type; // ex. SugarFieldVarchar, SugarFieldInt, etc.
            $this->sugarFieldObjects[$field] = new $class($field);
        }
        return $this->sugarFieldObjects[$field];
    }

    /**
     * Returns the smarty code to be used in a template built by TemplateHandler
     * The SugarField class is choosen dependant on the vardef's type field.
     *
     * @param parentFieldArray string name of the variable in the parent template for the bean's data
     * @param vardef vardef field defintion
     * @param displayType string the display type for the field (eg DetailView, EditView, etc)
     * @param displayParam parameters for displayin
     *      available paramters are:
     *      * labelSpan - column span for the label
     *      * fieldSpan - column span for the field
     */
    function displaySmarty($parentFieldArray, $vardef, $displayType, $displayParams = array()) {
        $string = '';
        $displayType = 'get' . $displayType . 'Smarty'; // getDetailViewSmarty, getEditViewSmarty, etc...

        if(!empty($vardef['type'])) {
            switch($vardef['type']) {
                case 'varchar':
                case 'char':
                    $field = $this->getSugarField('Varchar');
                    break;
                case 'bool':
                    $field = $this->getSugarField('Bool');
                    break;
                case 'name':
                    $field = $this->getSugarField('Name');
                    break;
                case 'phone':
                    $field = $this->getSugarField('Phone');
                    break;
                case 'email':
                    $field = $this->getSugarField('Email');
                    break;
                case 'int':
                    $field = $this->getSugarField('Int');
                    break;
                case 'float':
                   $field = $this->getSugarField('Int');
                    break;
                case 'date':
                	$field = $this->getSugarField('Date');
                	break;
                case 'enum':
                    $field = $this->getSugarField('Enum');
                    break;
                case 'datetime':
                    $field = $this->getSugarField('Datetime');
                    break;
                case 'text':
                    $field = $this->getSugarField('Text');
                    break;
                case 'password':
                    $field = $this->getSugarField('Password');
                    break;
                case 'assigned_user_name':
                    $field = $this->getSugarField('Username');
                    break;
                case 'radioenum':
                    $field = $this->getSugarField('Radioenum');
                    break;
                case 'multienum':
                    $field = $this->getSugarField('Multienum');
                    break;
                case 'html':
                	$field = $this->getSugarField('Html');
                	break;
                case 'url':
                	$field = $this->getSugarField('Link');
                	break;
                default:
                    $field = $this->getSugarField('Base');
                    break;
            }

            $string = $field->$displayType($parentFieldArray, $vardef, $displayParams);
        }

        return $string;
    }

    function displayJSValidation($vardef, $formname, $displayParams = array()) {
        $string = '';
        if(!empty($vardef['type'])) {
                switch($vardef['type']) {
                    case 'varchar':
                    case 'char':
                        $field = $this->getSugarField('Varchar');
                        break;
                    case 'bool':
                        $field = $this->getSugarField('Bool');
                        break;
                    case 'name':
                        $field = $this->getSugarField('Name');
                        break;
                    case 'phone':
                        $field = $this->getSugarField('Phone');
                        break;
                    case 'email':
                        $field = $this->getSugarField('Email');
                        break;
                    case 'float':
                    case 'int':
                        $field = $this->getSugarField('Int');
                        break;
                    case 'enum':
                        $field = $this->getSugarField('Enum');
                        break;
                    case 'datetime':
                        $field = $this->getSugarField('Datetime');
                        break;
                    case 'text':
                        $field = $this->getSugarField('Text');
                        break;
                    case 'password':
                        $field = $this->getSugarField('Password');
                        break;
                    default:
                        $field = $this->getSugarField('Base');
                        break;
                }
            }
            $string = $field->getJSValidation($vardef, $formname, $displayParams);
            return $string;
    }

}

?>