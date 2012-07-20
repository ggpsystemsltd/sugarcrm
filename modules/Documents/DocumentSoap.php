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

require_once('include/upload_file.php');


require_once('include/upload_file.php');

class DocumentSoap{
var $upload_file;
	function DocumentSoap(){
		$this->upload_file = new UploadFile('filename_file');
	}

	function saveFile($document, $portal = false){
        global $sugar_config;

        $focus = new Document();

                if($portal){
                        $focus->disable_row_level_security = true;
                }


        if(!empty($document['id'])){
                $focus->retrieve($document['id']);
                if(empty($focus->id)) {
                    return '-1';
                }
        }else{
                return '-1';
        }

        if(!empty($document['file'])){
                $decodedFile = base64_decode($document['file']);
                $this->upload_file->set_for_soap($document['filename'], $decodedFile);

                $ext_pos = strrpos($this->upload_file->stored_file_name, ".");
                $this->upload_file->file_ext = substr($this->upload_file->stored_file_name, $ext_pos + 1);
                if (in_array($this->upload_file->file_ext, $sugar_config['upload_badext'])) {
                        $this->upload_file->stored_file_name .= ".txt";
                        $this->upload_file->file_ext = "txt";
                }

                $revision = new DocumentRevision();
				$revision->filename = $this->upload_file->get_stored_file_name();
          		$revision->file_mime_type = $this->upload_file->getMimeSoap($revision->filename);
				$revision->file_ext = $this->upload_file->file_ext;
				//$revision->document_name = ;
				$revision->revision = $document['revision'];
				$revision->document_id = $document['id'];
				$revision->save();

               	$focus->document_revision_id = $revision->id;
               	$focus->save();
                $return_id = $revision->id;
                $this->upload_file->final_move($revision->id);
        }else{
                return '-1';
        }
        return $return_id;
	}
}
?>