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


class MailMerge
{
	var $mm_data_dir;
	var $obj;
	var $datasource_file = 'ds.doc';
	var $header_file = 'header.doc';
	var $fieldcnt;
	var $rowcnt;
	var $template;
	var $visible = false;
	var $list;
	var $fieldList;
	
	function MailMerge($list = NULL, $fieldList = null, $data_dir = 'data') {
		// this is the path to your data dir.
		$this->mm_data_dir = $data_dir;
		$this->list = $list;
		$this->fieldList = $fieldList;
	}
	
	function Execute() {
		$this->Initialize();
		if( count( $this->list ) > 0 ) {
			if(isset($this->template)) {
				$this->CreateHeaderFile();
				$this->CreateDataSource();
				$file = $this->CreateDocument($this->template);
				return $file;
			}
		} else return '';
	}
	
	function Template($template = NULL) {
		if(is_array($template)) $this->template = $template;
	}
	
	function CleanUp() {
		//remove the temp files
		unlink($this->mm_data_dir.'/Temp/'.$this->datasource_file);
		unlink($this->mm_data_dir.'/Temp/'.$this->header_file);
		rmdir($this->mm_data_dir);
		rmdir($this->mm_data_dir.'/Temp/');
		$this->Quit();
	}
	
	function CreateHeaderFile() {
		$this->obj->Documents->Add();
		
		$this->obj->ActiveDocument->Tables->Add($this->obj->Selection->Range,1,$this->fieldcnt);
		foreach($this->fieldList as $key => $value) {
			$this->obj->Selection->TypeText($key);
			$this->obj->Selection->MoveRight();
		}

		$this->obj->ActiveDocument->SaveAs($this->mm_data_dir.'/Temp/'.$this->header_file);
		$this->obj->ActiveDocument->Close();
	}
	
	function CreateDataSource() {
		$this->obj->Documents->Add();
		$this->obj->ActiveDocument->Tables->Add($this->obj->Selection->Range,$this->rowcnt,$this->fieldcnt);

		for($i = 0; $i < $this->rowcnt; $i++) {
			foreach($this->fieldList as $field => $value)
         	{  
				$this->obj->Selection->TypeText($this->list[$i]->$field);
				$this->obj->Selection->MoveRight();
			}
		}
		$this->obj->ActiveDocument->SaveAs($this->mm_data_dir.'/Temp/'.$this->datasource_file);
		$this->obj->ActiveDocument->Close();
	}
	
	function CreateDocument($template) {
		//$this->obj->Documents->Open($this->mm_data_dir.'/Templates/'.$template[0].'.dot');
		$this->obj->Documents->Open($template[0]);

		$this->obj->ActiveDocument->MailMerge->OpenHeaderSource($this->mm_data_dir.'/Temp/'.$this->header_file);
		
		$this->obj->ActiveDocument->MailMerge->OpenDataSource($this->mm_data_dir.'/Temp/'.$this->datasource_file);
		
		$this->obj->ActiveDocument->MailMerge->Execute();
		$this->obj->ActiveDocument->SaveAs($this->mm_data_dir.'/'.$template[1].'.doc');
		//$this->obj->Documents[$template[0]]->Close();
		//$this->obj->Documents[$template[1].'.doc']->Close();
		$this->obj->ActiveDocument->Close();
		return $template[1].'.doc';
	}
	
	function Initialize() {
		$this->rowcnt = count($this->list);
		$this->fieldcnt = count($this->fieldList);
		$this->obj = new COM("word.application") or die("Unable to instanciate Word");
		$this->obj->Visible = $this->visible;
		
		//try to make the temp dir
		sugar_mkdir($this->mm_data_dir);
		sugar_mkdir($this->mm_data_dir.'/Temp/');
	}
	
	function Quit() {
		$this->obj->Quit();
	}
	
	function SetDataList($list = NULL) {
		if(is_array($list)) $this->list = $list;
	}
	
	function SetFieldList($list = NULL) {
		if(is_array($list)) $this->fieldList = $list;
	}

}

?>
