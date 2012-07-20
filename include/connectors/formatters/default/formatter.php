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

/**
 * Generic formatter
 * @api
 */
class default_formatter {

   protected $_ss;
   protected $_component;
   protected $_tplFileName;
   protected $_module;
   protected $_hoverField;

   public function __construct() {}

   public function getDetailViewFormat() {
   	  $source = $this->_component->getSource();
   	  $class = get_class($source);
   	  $dir = str_replace('_', '/', $class);
   	  $config = $source->getConfig();
   	  $this->_ss->assign('config', $config);
   	  $this->_ss->assign('source', $class);
   	  $this->_ss->assign('module', $this->_module);
   	  $mapping = $source->getMapping();
   	  $mapping = !empty($mapping['beans'][$this->_module]) ? implode(',', array_values($mapping['beans'][$this->_module])) : '';
   	  $this->_ss->assign('mapping', $mapping);

   	  if(file_exists("custom/modules/Connectors/connectors/formatters/{$dir}/tpls/{$this->_module}.tpl")) {
   	  	 return $this->_ss->fetch("custom/modules/Connectors/connectors/formatters/{$dir}/tpls/{$this->_module}.tpl");
      } else if(file_exists("modules/Connectors/connectors/formatters/{$dir}/tpls/{$this->_module}.tpl")) {
      	 return $this->_ss->fetch("modules/Connectors/connectors/formatters/{$dir}/tpls/{$this->_module}.tpl");
      } else if(file_exists("custom/modules/Connectors/connectors/formatters/{$dir}/tpls/default.tpl")) {
      	 return $this->_ss->fetch("custom/modules/Connectors/connectors/formatters/{$dir}/tpls/default.tpl");
      } else if(file_exists("modules/Connectors/connectors/formatters/{$dir}/tpls/default.tpl")) {
      	 return $this->_ss->fetch("modules/Connectors/connectors/formatters/{$dir}/tpls/default.tpl");
      } else if(preg_match('/_soap_/', $class)) {
      	 return $this->_ss->fetch("include/connectors/formatters/ext/soap/tpls/default.tpl");
      } else {
      	 return $this->_ss->fetch("include/connectors/formatters/ext/rest/tpls/default.tpl");
      }
   }

   public function getEditViewFormat() {
   	  return '';
   }

   public function getListViewFormat() {
   	  return '';
   }

   public function getSearchFormFormat() {
   	  return '';
   }

   protected function fetchSmarty(){
   	  $source = $this->_component->getSource();
   	  $class = get_class($source);
   	  $dir = str_replace('_', '/', $class);
   	  $config = $source->getConfig();
   	  $this->_ss->assign('config', $config);
	  $this->_ss->assign('source', $class);
	  $this->_ss->assign('module', $this->_module);
   	  if(file_exists("custom/modules/Connectors/connectors/formatters/{$dir}/tpls/{$this->_module}.tpl")) {
	  	return $this->_ss->fetch("custom/modules/Connectors/connectors/formatters/{$dir}/tpls/{$this->_module}.tpl");
	  } else if(file_exists("modules/Connectors/connectors/formatters/{$dir}/tpls/{$this->_module}.tpl")) {
	   	return $this->_ss->fetch("modules/Connectors/connectors/formatters/{$dir}/tpls/{$this->_module}.tpl");
	  } else if(file_exists("custom/modules/Connectors/connectors/formatters/{$dir}/tpls/default.tpl")) {
	   	return $this->_ss->fetch("custom/modules/Connectors/connectors/formatters/{$dir}/tpls/default.tpl");
	  } else {
	   	return $this->_ss->fetch("modules/Connectors/connectors/formatters/{$dir}/tpls/default.tpl");
	  }
   }

   public function getSourceMapping(){
   	  $source = $this->_component->getSource();
      $mapping = $source->getMapping();
      return $mapping;
   }

   public function setSmarty($smarty) {
   	   $this->_ss = $smarty;
   }

   public function getSmarty() {
   	   return $this->_ss;
   }

   public function setComponent($component) {
   	   $this->_component = $component;
   }

   public function getComponent() {
   	   return $this->_component;
   }

   public function getTplFileName(){
   		return $this->tplFileName;
   }

   public function setTplFileName($tplFileName){
   		$this->tplFileName = $tplFileName;
   }

   public function setModule($module) {
   	    $this->_module = $module;
   }

   public function getModule() {
   	    return $this->_module;
   }

   public function getIconFilePath() {
   	    return '';
   }
}
?>