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

class AjaxCompose{
	var $sections = array();
	var $crumbs = array('Home'=>'ModuleBuilder.main("Home")',/* 'Assistant'=>'Assistant.mbAssistant.xy=Array("650, 40"); Assistant.mbAssistant.show();'*/);
	function addSection($name, $title, $content, $action='activate'){
		$crumb = '';
		if($name == 'center'){
			$crumb = $this->getBreadCrumb();
		}
		$this->sections[$name] = array('title'=>$title,'crumb'=>$crumb, 'content'=>$content, 'action'=>$action);
	}
	
	function getJavascript(){
		if(!empty($this->sections['center'])){
			 if(empty($this->sections['east']))$this->addSection('east', '', '', 'deactivate');
			 if(empty($this->sections['east2']))$this->addSection('east2', '', '', 'deactivate');
		}
		
		$json = getJSONobj();
		return $json->encode($this->sections);
	}
	
	function addCrumb($name, $action){
		$this->crumbs[$name] = $action;
	}
	
	function getBreadCrumb(){
		$crumbs = '';
		$actions = array();
		$count = 0;
		foreach($this->crumbs as $name=>$action){
			if($name == 'Home'){
				$crumbs .= "<a onclick='$action' href='javascript:void(0)'>". getStudioIcon('home', 'home', 16, 16) . '</a>';
			}else if($name=='Assistant'){
				$crumbs .= "<a id='showassist' onclick='$action' href='javascript:void(0)'>". getStudioIcon('assistant', 'assistant', 16, 16) . '</a>';
			}else{
				if($count > 0){
					$crumbs .= '&nbsp;>&nbsp;';
				}else{
					$crumbs .= '&nbsp;|&nbsp;';
				}
				if(empty($action)){
					$crumbs .="<span class='crumbLink'>$name</span>";
					$actions[] = "";
				}else {
					$crumbs .="<a href='javascript:void(0);' onclick='$action' class='crumbLink'>$name</a>";
				    $actions[] = $action;
				}
				$count++;
			}
			
		}
		if($count > 1 && $actions[$count-2] != ""){
			$crumbs = "<a onclick='{$actions[$count-2]}' href='javascript:void(0)'>". getStudioIcon('back', 'back', 16, 16) . '</a>&nbsp;'. $crumbs;	
		}
		return $crumbs . '<br><br>';
		
		
	}
	
	function echoErrorStatus($labelName=''){
		$sections = array('failure'=>true,'failMsg'=>$labelName);
		$json = getJSONobj();
		echo $json->encode($sections);
	}
	
}
?>