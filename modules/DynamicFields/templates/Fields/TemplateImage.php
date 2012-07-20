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

require_once('modules/DynamicFields/templates/Fields/TemplateText.php');
class TemplateImage extends TemplateText{
	var $type = 'image';	
		
	function get_field_def(){
		$def = parent::get_field_def();
		$def['studio'] = 'visible';		
		$def['type'] = 'image';
		$def['dbType'] = 'varchar';
		$def['len']= 255;
		
		if(	isset($this->ext1)	)	$def[ 'border' ] 	= $this->ext1 ;            
		if(	isset($this->ext2)	)	$def[ 'width' ] 	= $this->ext2 ;
		if(	isset($this->ext3)	)	$def[ 'height' ] 	= $this->ext3 ;
		if(	isset($this->border))	$def[ 'border' ] 	= $this->border ;          
	    if(	isset($this->width)	)	$def[ 'width' ] 	= $this->width ;
        if(	isset($this->height))	$def[ 'height' ] 	= $this->height ;
        
		return $def;	
	}
	
	function __construct()
	{
		$this->vardef_map['border'] = 'ext1';
		$this->vardef_map['width'] = 'ext2';
		$this->vardef_map['height'] = 'ext3';		
	}
	
	function set($values){
	   parent::set($values);
	   if(!empty($this->ext1)){
	       $this->border = $this->ext1;
	   }
	   if(!empty($this->ext2)){
	       $this->width = $this->ext2;
	   }
	   if(!empty($this->ext3)){
	       $this->height = $this->ext3;
	   }
	   
	}
	
		
}


?>
