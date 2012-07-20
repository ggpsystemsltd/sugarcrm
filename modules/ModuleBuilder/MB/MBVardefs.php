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

class MBVardefs{
	var $templates = array();
	var $iTemplates = array();
	var $vardefs = array();
	var $vardef = array();
	var $path = '';
	var $name = '';
	var $errors = array();

	function MBVardefs($name, $path, $key_name){
		$this->path = $path;
		$this->name = $name;
		$this->key_name = $key_name;
		$this->load();
	}

	function loadTemplate($by_group, $template, $file){
		$module = $this->name;
		$table_name = $this->name;
		$object_name = $this->key_name;
		$_object_name = strtolower($this->key_name);

		// required by the vardef template for team security in SugarObjects
		$table_name = strtolower($module);

		if(file_exists($file)){
			include($file);
            if (isset($vardefs))
            {
                if($by_group){
                    $this->vardefs['fields'] [$template]= $vardefs['fields'];
                }else{
                    $this->vardefs['fields']= array_merge($this->vardefs['fields'], $vardefs['fields']);
                    if(!empty($vardefs['relationships'])){
                        $this->vardefs['relationships']= array_merge($this->vardefs['relationships'], $vardefs['relationships']);
                    }
                }
            }
		}
        //Bug40450 - Extra 'Name' field in a File type module in module builder
        if(array_key_exists('file', $this->templates))
        {
            unset($this->vardefs['fields']['name']);
            unset($this->vardefs['fields']['file']['name']);
        }

	}

	function mergeVardefs($by_group=false){
		$this->vardefs = array(
					'fields'=>array(),
					'relationships'=>array(),
		);
//		$object_name = $this->key_name;
//		$_object_name = strtolower($this->name);
		$module_name = $this->name;
		$this->loadTemplate($by_group,'basic',  MB_TEMPLATES . '/basic/vardefs.php');
		foreach($this->iTemplates as $template=>$val){
			$file = MB_IMPLEMENTS . '/' . $template . '/vardefs.php';
			$this->loadTemplate($by_group,$template, $file);
		}
		foreach($this->templates as $template=>$val){
			if($template == 'basic')continue;
			$file = MB_TEMPLATES . '/' . $template . '/vardefs.php';
			$this->loadTemplate($by_group,$template, $file);
		}

		if($by_group){
			$this->vardefs['fields'][$this->name] = $this->vardef['fields'];
		}else{
			$this->vardefs['fields'] = array_merge($this->vardefs['fields'], $this->vardef['fields']);
		}
	}

	function updateVardefs($by_group=false){
		$this->mergeVardefs($by_group);
	}


	function getVardefs(){
		return $this->vardefs;
	}

	function getVardef(){
		return $this->vardef;
	}
		

    function addFieldVardef($vardef)
    {
        if(!isset($vardef['default']) || strlen($vardef['default']) == 0)
        {
            unset($vardef['default']);
        }
        $this->vardef['fields'][$vardef['name']] = $vardef;
    }

	function deleteField($field){
		unset($this->vardef['fields'][$field->name]);
	}

	function save(){
		$header = file_get_contents('modules/ModuleBuilder/MB/header.php');
		write_array_to_file('vardefs', $this->vardef, $this->path . '/vardefs.php','w', $header);
	}

	function build($path){
		$header = file_get_contents('modules/ModuleBuilder/MB/header.php');
		write_array_to_file('dictionary["' . $this->name . '"]', $this->getVardefs(), $path . '/vardefs.php', 'w', $header);
	}
	function load(){
		$this->vardef = array('fields'=>array(), 'relationships'=>array());
		if(file_exists($this->path . '/vardefs.php')){
			include($this->path. '/vardefs.php');
			$this->vardef = $vardefs;
		}
	}





}
?>