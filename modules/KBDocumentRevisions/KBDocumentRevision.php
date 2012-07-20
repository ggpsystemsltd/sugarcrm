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

/*********************************************************************************

 * Description: TODO:  To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/




require_once('include/upload_file.php');

// User is used to store Forecast information.
class KBDocumentRevision extends SugarBean {

	var $id;
	var $kbdocument_id;
	var $date_entered;
	var $created_by;
	var $filename;
	var $file_mime_type;
	var $revision;
	var $change_log;
	var $document_name;
	var $latest_revision;
	var $file_url;
	var $file_ext;
	var $created_by_name;
    var $attachments;
	var $img_name;
	var $img_name_bare;
	var $document_revision_id;
	
	var $table_name = "kbdocument_revisions";	
	var $object_name = "KBDocumentRevision";
	var $module_dir = 'KBDocumentRevisions';
	var $new_schema = true;
	var $latest_revision_id;
	
	/*var $column_fields = Array("id"
		,"document_id"
		,"date_entered"
		,"created_by"
		,"filename"	
		,"file_mime_type"
		,"revision"
		,"change_log"
		,"file_ext"
		);
*/
	var $encodeFields = Array();

	// This is used to retrieve related fields from form posts.
	var $additional_column_fields = Array('');

	// This is the list of fields that are in the lists.
	var $list_fields = Array("id"
		,"kbdocument_id"
		,"date_entered"
		,"created_by"
		,"filename"	
		,"file_mime_type"
		,"revision"
		,"file_url"
		,"change_log"
		,"file_ext"
		,"created_by_name"
		);
		
	var $required_fields = Array("revision");
	
	

	function KBDocumentRevision() {
		parent::SugarBean();
		$this->setupCustomFields('KBDocumentRevisions');  //parameter is module name
		$this->disable_row_level_security =true; //no direct access to this module. 
	}

	function save($check_notify = false){	
		parent::save($check_notify);
				
		//update documents table.
		//$query = "UPDATE documents set document_version_id='$this->id' where id = '$this->document_id'";	
		//$this->db->query($query);
	}
	function get_summary_text()
	{
		return "$this->filename";
	}

	function is_authenticated()
	{
		return $this->authenticated;
	}

	function fill_in_additional_list_fields() {
	}

	function fill_in_additional_detail_fields()
	{/*
		global $theme;
		global $current_language;
		$mod_strings=return_module_language($current_language, 'KBDocuments');
		
		//find the document name and current version.
		$query = "SELECT kbdocument_name, revision, kbdocument_revision_id FROM kbdocuments, document_revisions where kbdocuments.id = '$this->document_id' AND document_revisions.id = documents.document_revision_id";
		$result = $this->db->query($query,true,"Error fetching document details...:");
		$row = $this->db->fetchByAssoc($result);
		if ($row != null) {
			$this->document_name = $row['document_name'];
			$this->latest_revision = $row['revision'];	
			$this->latest_revision_id = $row['document_revision_id'];
		}
		//populate the file url. 
		//image is selected based on the extension name <ext>_image_inline, extension is stored in document_revisions.
		//if file is not found then default image file will be used.
		global $img_name;
		global $img_name_bare;
		if (!empty($this->file_ext)) {
			$img_name = SugarThemeRegistry::current()->getImageURL("{$this->file_ext}_image_inline.gif");	
			$img_name_bare = "{$this->file_ext}_image_inline";		
		}
		
		//set default file name.
		if (!empty($img_name) && file_exists($img_name)) {
			$img_name = $img_name_bare;			
		}
		else {
			$img_name = "def_image_inline";  //todo change the default image.						
		}
			*/
		//$this->file_url = "<a href='".UploadFile::get_url($this->filename,$this->id)."' target='_blank'>".SugarThemeRegistry::current()->getImage($img_name,'border="0"',null,null,'.gif',$mod_strings['LBL_LIST_VIEW_DOCUMENT'])."</a>";

	}
	
	/**
	 * Returns a filename based off of the logical (Sugar-side) Document name and combined with the revision. Tailor
	 * this to needs created by email RFCs, filesystem name conventions, charset conventions etc.
	 * @param string revId Revision ID if not latest
	 * @return string formatted name
	 */
	function getDocumentRevisionNameForDisplay($revId='') {
		global $sugar_config;
		global $current_language;
		
		$localLabels = return_module_language($current_language, 'KBDocumentRevisions');
		
		// prep - get source Document
		if(!class_exists('Documents')) {
			
		}
		$document = new Document();
		
		// use passed revision ID
		if(!empty($revId)) {
			$tempDoc = new DocumentRevision();
			$tempDoc->retrieve($revId);
		} else {
			$tempDoc = $this;
		}
		
		// get logical name
		$document->retrieve($tempDoc->document_id);
		$logicalName = $document->document_name;
		
		// get revision string
		$revString = '';
		if(!empty($tempDoc->revision)) {
			$revString = "-{$localLabels['LBL_REVISION']}_{$tempDoc->revision}";
		}
		
		// get extension
		$realFilename = $tempDoc->filename;
		$fileExtension_beg = strrpos($realFilename, ".");
		$fileExtension = "";
		
		if($fileExtension_beg > 0) {
			$fileExtension = substr($realFilename, $fileExtension_beg + 1);
		}
		//check to see if this is a file with extension located in "badext"
		foreach($sugar_config['upload_badext'] as $badExt) {
	       	if(strtolower($fileExtension) == strtolower($badExt)) {
		       	//if found, then append with .txt to filename and break out of lookup
		       	//this will make sure that the file goes out with right extension, but is stored
		       	//as a text in db.
		        $fileExtension .= ".txt";
		        break; // no need to look for more
	       	}
        }
		$fileExtension = ".".$fileExtension;
		
		$return = $logicalName.$revString.$fileExtension;
		
		// apply RFC limitations here
		if(mb_strlen($return) > 1024) {
			// do something if we find a real RFC issue
		}
		
		return $return;
	}

	function fill_document_name_revision($doc_id) {

		//find the document name and current version.
		$query = "SELECT documents.document_name, revision FROM documents, document_revisions where documents.id = '$doc_id'";
		$query .= " AND document_revisions.id = documents.document_revision_id";
		$result = $this->db->query($query,true,"Error fetching document details...:");
		$row = $this->db->fetchByAssoc($result);
		if ($row != null) {
			$this->name = $row['document_name'];
			$this->latest_revision = $row['revision'];	
		}	
	}
	
	function list_view_parse_additional_sections(&$list_form, $xTemplateSection){
		return $list_form;
	}
	
	function get_list_view_data(){
		$revision_fields = $this->get_list_view_array();

		$forecast_fields['FILE_URL'] = $this->file_url;						
		return $revision_fields;
	}

	//static function..
	function get_document_revision_name($doc_revision_id){
		if (empty($doc_revision_id)) return null;
		
		$db = DBManagerFactory::getInstance();				
		$query="select revision from document_revisions where id='$doc_revision_id'";
		$result=$db->query($query);
		if (!empty($result)) {
			$row=$db->fetchByAssoc($result);
			if (!empty($row)) {
				return $row['revision'];
			}
		}
		return null;
	}
	
	//static function.
	function get_document_revisions($doc_id){
		$return_array= Array();
		if (empty($doc_id)) return $return_array;
		
		$db = DBManagerFactory::getInstance();				
		$query="select id, revision from document_revisions where document_id='$doc_id' and deleted=0";
		$result=$db->query($query);
		if (!empty($result)) {
			while (($row=$db->fetchByAssoc($result)) != null) {
				$return_array[$row['id']]=$row['revision'];
			}
		}
		return $return_array;
	}
	//get related documents
	function get_documents($kbdocrev_id){
		$return_array= Array();
		if (empty($kbdocrev_id)) return $return_array;
		
		$db = DBManagerFactory::getInstance();				
		$query="select id from documents where kbdocument_revision_id='$kbdocrev_id' and deleted=0";
		$result=$db->query($query);
		if (!empty($result)) {
			while (($row=$db->fetchByAssoc($result)) != null) {
				$return_array[$row['id']]=$row['id'];
			}
		}
		return $return_array;
	}
	//get related documents
	function get_docrevs($kbdocrev_id){
		$return_array= Array();
		if (empty($kbdocrev_id)) return $return_array;
		
		$db = DBManagerFactory::getInstance();				
		$query="select id from document_revisions where kbdocument_revision_id='$kbdocrev_id' and deleted=0";
		$result=$db->query($query);
		if (!empty($result)) {
			while (($row=$db->fetchByAssoc($result)) != null) {
				$return_array[$row['id']]=$row['id'];
			}
		}
		return $return_array;
	}	
}
?>