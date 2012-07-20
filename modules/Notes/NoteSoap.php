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

class NoteSoap
{
    var $upload_file;

    function NoteSoap()
    {
    	$this->upload_file = new UploadFile('uploadfile');
    }

    function saveFile($note, $portal = false)
    {
        global $sugar_config;

        $focus = new Note();

                if($portal){
                        $focus->disable_row_level_security = true;
                }


        if(!empty($note['id'])){
                $focus->retrieve($note['id']);
                if(empty($focus->id)) {
                    return '-1';
                }
        }else{
                return '-1';
        }

        if(!empty($note['file'])){
                $decodedFile = base64_decode($note['file']);
                $this->upload_file->set_for_soap($note['filename'], $decodedFile);

                $ext_pos = strrpos($this->upload_file->stored_file_name, ".");
                $this->upload_file->file_ext = substr($this->upload_file->stored_file_name, $ext_pos + 1);
                if (in_array($this->upload_file->file_ext, $sugar_config['upload_badext'])) {
                        $this->upload_file->stored_file_name .= ".txt";
                        $this->upload_file->file_ext = "txt";
                }

                $focus->filename = $this->upload_file->get_stored_file_name();
                $focus->file_mime_type = $this->upload_file->getMimeSoap($focus->filename);
               	$focus->id = $note['id'];
                $return_id = $focus->save();
                $this->upload_file->final_move($focus->id);
        }else{
                return '-1';
        }

        return $return_id;
    }

    function newSaveFile($note, $portal = false){
        global $sugar_config;

        $focus = new Note();

        if($portal){
        	$focus->disable_row_level_security = true;
        }

        if(!empty($note['id'])){
        	$focus->retrieve($note['id']);
            if(empty($focus->id)) {
                return '-1';
            }
        } else {
           	return '-1';
        }

        if(!empty($note['file'])){
            $decodedFile = base64_decode($note['file']);
            $this->upload_file->set_for_soap($note['filename'], $decodedFile);

            $ext_pos = strrpos($this->upload_file->stored_file_name, ".");
            $this->upload_file->file_ext = substr($this->upload_file->stored_file_name, $ext_pos + 1);
            if (in_array($this->upload_file->file_ext, $sugar_config['upload_badext'])) {
                    $this->upload_file->stored_file_name .= ".txt";
                    $this->upload_file->file_ext = "txt";
            }

            $focus->filename = $this->upload_file->get_stored_file_name();
            $focus->file_mime_type = $this->upload_file->getMimeSoap($focus->filename);
            $focus->save();
        }

        $return_id = $focus->id;

        if(!empty($note['file'])){
        	$this->upload_file->final_move($focus->id);
        }

		if (!empty($note['related_module_id']) && !empty($note['related_module_name'])) {
        	$focus->process_save_dates=false;
        	$module_name = $note['related_module_name'];
        	$module_id = $note['related_module_id'];
			if($module_name != 'Contacts'){
				$focus->parent_type=$module_name;
				$focus->parent_id = $module_id;
			}else{
				$focus->contact_id=$module_id;
			}
			$focus->save();

        } // if
        return $return_id;
    }

    function retrieveFile($id, $filename)
    {
    	if(empty($filename)){
    		return '';
    	}

    	$this->upload_file->stored_file_name = $filename;
    	$filepath = $this->upload_file->get_upload_path($id);
    	if(file_exists($filepath)){
    		$file = file_get_contents($filepath);
    		return base64_encode($file);
    	}
    	return -1;
    }

}
