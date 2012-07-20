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


require_once('include/Sugarpdf/Sugarpdf.php');

class SugarpdfFactory{
    /**
     * load the correct Tcpdf
     * @param string $type Tcpdf Type
     * @return valid Tcpdf
     */
    function loadSugarpdf($type = 'default', $module, $bean = null, $sugarpdf_object_map = array()){
        $type = strtolower(basename($type));
        //SugarpdfFactory::_loadConfig($sugarpdf, $type);
        //first let's check if the module handles this Tcpdf
        $sugarpdf = null;
        $path = '/sugarpdf/sugarpdf.'.$type.'.php';
        if(file_exists('custom/modules/'.$module.$path)){
            $sugarpdf = SugarpdfFactory::_buildFromFile('custom/modules/'.$module.$path, $bean, $sugarpdf_object_map, $type, $module);
        }else if(file_exists('modules/'.$module.$path)){
            $sugarpdf = SugarpdfFactory::_buildFromFile('modules/'.$module.$path, $bean, $sugarpdf_object_map, $type, $module);
        }else if(file_exists('custom/include/Sugarpdf'.$path)){
            $sugarpdf = SugarpdfFactory::_buildFromFile('custom/include/Sugarpdf'.$path, $bean, $sugarpdf_object_map, $type, $module);
        }else{
            //if the module does not handle this Sugarpdf, then check if Sugar handles it OOTB
            $file = 'include/Sugarpdf'.$path;
            if(file_exists($file)){
                //it appears Sugar does have the proper logic for this file.
                $sugarpdf = SugarpdfFactory::_buildFromFile($file, $bean, $sugarpdf_object_map, $type, $module);
            }
        }    
        // Default to Sugarpdf if still nothing found/built
        if (!isset($sugarpdf)) 
            $sugarpdf = new Sugarpdf($bean, $sugarpdf_object_map);
        return $sugarpdf;
    }
    
    /**
     * Load the Sugarpdf_<Sugarpdf>_config.php file which holds options used by the tcpdf.
     */
//    function _loadConfig(&$sugarpdf, $type){
////        $sugarpdf_config_custom = array();
////        $sugarpdf_config_module = array();
////        $sugarpdf_config_root_cstm = array();
////        $sugarpdf_config_root = array();
////        $sugarpdf_config_app = array();
//        $config_file_name = 'sugarpdf.'.$type.'.config.php';
//        //echo ' <br /> '.$config_file_name.' <br />';
//        //$sugarpdf_config = sugar_cache_retrieve("SUGARPDF_CONFIG_FILE_".$sugarpdf->module."_TYPE_".$type);
//        if(!$sugarpdf_config){
//            if(file_exists('custom/modules/'.$sugarpdf->module.'/sugarpdf/'.$config_file_name)){
//                require_once('custom/modules/'.$sugarpdf->module.'/sugarpdf/'.$config_file_name);
//            } 
//            if(file_exists('modules/'.$sugarpdf->module.'/sugarpdf/'.$config_file_name)){
//                require_once('modules/'.$sugarpdf->module.'/sugarpdf/'.$config_file_name);
//            }
//            if(file_exists('custom/include/Sugarpdf/sugarpdf/'.$config_file_name)){
//                require_once('custom/include/Sugarpdf/sugarpdf/'.$config_file_name);
//            }
//            if(file_exists('include/Sugarpdf/sugarpdf/'.$config_file_name)){
//                require_once('include/Sugarpdf/sugarpdf/'.$config_file_name);
//            }    
//            if(file_exists('include/Sugarpdf/sugarpdf/sugarpdf.config.php')){
//                require_once('include/Sugarpdf/sugarpdf/sugarpdf.config.php');
//            }
//        }
//
//    }    
    
    /**
     * This is a private function which just helps the getSugarpdf function generate the
     * proper Tcpdf object
     * 
     * @return a valid Sugarpdf
     */
    function _buildFromFile($file, &$bean, $sugarpdf_object_map, $type, $module){
        require_once($file);
        //try ModuleSugarpdfType first then try SugarpdfType if that fails then use Sugarpdf
        $class = ucfirst($module).'Sugarpdf'.ucfirst($type);
        if(!class_exists($class)){
            $class = 'Sugarpdf'.ucfirst($type);
            if(!class_exists($class)){
                return new Sugarpdf($bean, $sugarpdf_object_map);
            }
        }
        return SugarpdfFactory::_buildClass($class, $bean, $sugarpdf_object_map);    
    }
    
    /**
     * instantiate the correct Tcpdf and call init to pass on any obejcts we need to
     * from the controller.
     * 
     * @param string class - the name of the class to instantiate
     * @param object bean = the bean to pass to the Sugarpdf
     * @param array Sugarpdf_object_map - the array which holds obejcts to pass between the
     *                                controller and the tcpdf.
     * 
     * @return Sugarpdf
     */
    function _buildClass($class, &$bean, $sugarpdf_object_map){
        

        $sugarpdf = new $class($bean, $sugarpdf_object_map);
        //$sugarpdf->init($bean, $sugarpdf_object_map);
        if($sugarpdf instanceof Sugarpdf){
            return $sugarpdf;
        }else
            return new Sugarpdf($bean, $sugarpdf_object_map);
    }
}
?>
