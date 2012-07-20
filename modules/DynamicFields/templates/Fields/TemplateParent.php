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

require_once('modules/DynamicFields/templates/Fields/TemplateEnum.php');

require_once('modules/DynamicFields/templates/Fields/TemplateId.php');
require_once('modules/DynamicFields/templates/Fields/TemplateParentType.php');
class TemplateParent extends TemplateEnum{
    var $max_size = 25;
    var $type='parent';
    
    function get_field_def(){
        $def = parent::get_field_def();
        $def['type_name'] = 'parent_type';
        $def['id_name'] = 'parent_id';
        $def['parent_type'] = 'record_type_display';
        $def['source'] = 'non-db';
        $def['studio'] = 'visible';
        return $def;    
    }
    
    function delete($df){
        parent::delete($df);
        //currency id
        $parent_type = new TemplateText();
        $parent_type->name = 'parent_type';
        $parent_type->delete($df);  
        
        $parent_id = new TemplateId();
        $parent_id->name = 'parent_id';
        $parent_id->delete($df);
    }
    
    function save($df){
        $this->ext1 = 'parent_type_display';
        $this->name = 'parent_name';
        $this->default_value = '';
        parent::save($df); // always save because we may have updates
        
        //save parent_type
        $parent_type = new TemplateParentType();
        $parent_type->name = 'parent_type';
        $parent_type->vname = 'LBL_PARENT_TYPE';
        $parent_type->label = $parent_type->vname;
        $parent_type->len = 255;
        $parent_type->importable = $this->importable;
        $parent_type->save($df);
            
        //save parent_name
        $parent_id = new TemplateId();
        $parent_id->name = 'parent_id';
        $parent_id->vname = 'LBL_PARENT_ID';
        $parent_id->label = $parent_id->vname;
        $parent_id->len = 36;
        $parent_id->importable = $this->importable;
        $parent_id->save($df);
    }
    
    function get_db_add_alter_table($table){
        return '';
    }
    /**
     * mysql requires the datatype caluse in the alter statment.it will be no-op anyway.
     */ 
    function get_db_modify_alter_table($table){
        return '';
    }
    
    
}


?>
