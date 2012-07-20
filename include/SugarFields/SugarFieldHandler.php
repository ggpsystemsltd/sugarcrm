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

/**
 * Handle Sugar fields
 * @api
 */
class SugarFieldHandler
{

    function SugarFieldHandler() {
    }

    static function fixupFieldType($field) {
            switch($field) {
               case 'double':
               case 'decimal':
                    $field = 'float';
                    break;
               case 'uint':
               case 'ulong':
               case 'long':
               case 'short':
               case 'tinyint':
                    $field = 'int';
                    break;
               case 'date':
                    $field = 'datetime';
                    break;
               case 'url':
               		$field = 'link';
               		break;
               case 'varchar':
                    $field = 'base';
                    break;
            }

        return ucfirst($field);
    }

    /**
     * return the singleton of the SugarField
     *
     * @param field string field type
     */
    static function getSugarField($field, $returnNullIfBase=false) {
        static $sugarFieldObjects = array();

        $field = self::fixupFieldType($field);
        $field = ucfirst($field);

        if(!isset($sugarFieldObjects[$field])) {
        	//check custom directory
        	if(file_exists('custom/include/SugarFields/Fields/' . $field . '/SugarField' . $field. '.php')){
        		$file = 'custom/include/SugarFields/Fields/' . $field . '/SugarField' . $field. '.php';
                $type = $field;
			//else check the fields directory
			}else if(file_exists('include/SugarFields/Fields/' . $field . '/SugarField' . $field. '.php')){
           		$file = 'include/SugarFields/Fields/' . $field . '/SugarField' . $field. '.php';
                $type = $field;
        	}else{
                // No direct class, check the directories to see if they are defined
        		if( $returnNullIfBase &&
                    !is_dir('custom/include/SugarFields/Fields/'.$field) &&
                    !is_dir('include/SugarFields/Fields/'.$field) ) {
                    return null;
                }
        		$file = 'include/SugarFields/Fields/Base/SugarFieldBase.php';
                $type = 'Base';
        	}
			require_once($file);

			$class = 'SugarField' . $type;
			//could be a custom class check it
			$customClass = 'Custom' . $class;
        	if(class_exists($customClass)){
        		$sugarFieldObjects[$field] = new $customClass($field);
        	}else{
        		$sugarFieldObjects[$field] = new $class($field);
        	}
        }
        return $sugarFieldObjects[$field];
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
    static function displaySmarty($parentFieldArray, $vardef, $displayType, $displayParams = array(), $tabindex = 1) {
        $string = '';
        $displayTypeFunc = 'get' . $displayType . 'Smarty'; // getDetailViewSmarty, getEditViewSmarty, etc...

		// This will handle custom type fields.
		// The incoming $vardef Array may have custom_type set.
		// If so, set $vardef['type'] to the $vardef['custom_type'] value
		if(isset($vardef['custom_type'])) {
		   $vardef['type'] = $vardef['custom_type'];
		}
		if(empty($vardef['type'])) {
			$vardef['type'] = 'varchar';
		}

		$field = self::getSugarField($vardef['type']);
		if ( !empty($vardef['function']) ) {
			$string = $field->displayFromFunc($displayType, $parentFieldArray, $vardef, $displayParams, $tabindex);
		} else {
			$string = $field->$displayTypeFunc($parentFieldArray, $vardef, $displayParams, $tabindex);
		}

        return $string;
    }
}


?>