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
 * Description:  TODO: To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/


$focus = new MergeRecord();
$focus->load_merge_bean($_REQUEST['merge_module'], true, $_REQUEST['record']);

foreach($focus->merge_bean->column_fields as $field)
{
	if(isset($_POST[$field]))
	{
		$value = $_POST[$field];
		if(is_array($value) && !empty($focus->merge_bean->field_defs[$field]['isMultiSelect'])) {
            if(empty($value[0])) {
                unset($value[0]);
            }
            $value = encodeMultienumValue($value);
        }
        $focus->merge_bean->$field = $value;
	}elseif (isset($focus->merge_bean->field_name_map[$field]['type']) && $focus->merge_bean->field_name_map[$field]['type'] == 'bool'  ) {
		$focus->merge_bean->$field = 0;
	}
}

foreach($focus->merge_bean->additional_column_fields as $field)
{
	if(isset($_POST[$field]))
	{
		$value = $_POST[$field];
		if(is_array($value) && !empty($focus->merge_bean->field_defs[$field]->properties['isMultiSelect'])) {
            if(empty($value[0])) {
                unset($value[0]);
            }
            $value = encodeMultienumValue($value);
        }
		$focus->merge_bean->$field = $value;
	}
}

global $check_notify;

$_REQUEST['useEmailWidget'] = true;
if (isset($_POST['date_entered'])) {
	// set this to true so we won't unset date_entered when saving
    $focus->merge_bean->update_date_entered = true;
}
$focus->merge_bean->save($check_notify);
unset($_REQUEST['useEmailWidget']);

$return_id = $focus->merge_bean->id;
$return_module = $focus->merge_module;
$return_action = 'DetailView';

//handle realated data.

$linked_fields=$focus->merge_bean->get_linked_fields();

$exclude = explode(',', $_REQUEST['merged_links']);

if (is_array($_POST['merged_ids'])) {
    foreach ($_POST['merged_ids'] as $id) {
        require_once ($focus->merge_bean_file_path);
        $mergesource = new $focus->merge_bean_class();
        $mergesource->retrieve($id);        
        //kbrill Bug #13826
        foreach ($linked_fields as $name => $properties) {
        	if ($properties['name']=='modified_user_link' || in_array($properties['name'], $exclude))
        	{
        		continue;
        	}
            if (isset($properties['duplicate_merge'])) {
                if ($properties['duplicate_merge']=='disabled' or 
                    $properties['duplicate_merge']=='false' or
                    $properties['name']=='assigned_user_link') {
                    continue;
                }
            }
            if ($name == 'accounts' && $focus->merge_bean->module_dir == 'Opportunities')
            	continue;
            	
            if ($name == 'teams') {
				require_once('include/SugarFields/Fields/Teamset/SugarFieldTeamset.php');
				$teamSetField = new SugarFieldTeamset('Teamset');	
			    if($teamSetField != null){
			       $teamSetField->save($focus->merge_bean, $_REQUEST, 'team_name', '');
                   $focus->merge_bean->teams->setSaved(FALSE);
			       $focus->merge_bean->teams->save();
			       $focus->merge_bean->save();
			    }
            	continue;
            }	
            	
            if ($mergesource->load_relationship($name)) {
                //check to see if loaded relationship is with email address
                $relName=$mergesource->$name->getRelatedModuleName();
                if (!empty($relName) and strtolower($relName)=='emailaddresses'){
                    //handle email address merge
                    handleEmailMerge($focus,$name,$mergesource->$name->get());   
                }else{
                    $data=$mergesource->$name->get();
                    if (is_array($data)) {
                        if ($focus->merge_bean->load_relationship($name) ) {
                            foreach ($data as $related_id) {
                                //add to primary bean
                                $focus->merge_bean->$name->add($related_id);
                            }   
                        }
                    }
                }
            }
        }
        //END Bug #13826
        //delete the child bean, this action will cascade into related data too.
        $mergesource->mark_deleted($mergesource->id);
    }
}
$GLOBALS['log']->debug("Merged record with id of ".$return_id);

header("Location: index.php?action=$return_action&module=$return_module&record=$return_id");


//This function will compare the email addresses to be merged and only add the email id's
//of the email addresses that are not duplicates.
//$focus - Merge Bean
//$name - name of relationship (email_addresses)
//$data - array of email id's that will be merged into existing bean.
function handleEmailMerge($focus,$name,$data){
    $mrgArray = array();
    //get the email id's to merge
    $existingData=$data;

    //make sure id's to merge exist and are in array format

    //get the existing email id's 
    $focus->merge_bean->load_relationship($name);
    $exData=$focus->merge_bean->$name->get();

    if (!is_array($existingData) || empty($existingData)) {
        return ;
    }
        //query email and retrieve existing email address 
        $exEmailQuery = 'Select id, email_address from email_addresses where id in (';
            $first = true;
            foreach($exData as $id){
                if($first){
                    $exEmailQuery .= " '$id' ";
                    $first = false;
                }else{
                    $exEmailQuery .= ", '$id' ";
                    $first = false;
                }
            }
        $exEmailQuery .= ')';

        $exResult = $focus->merge_bean->db->query($exEmailQuery);
        while(($row=$focus->merge_bean->db->fetchByAssoc($exResult))!= null) {
            $existingEmails[$row['id']]=$row['email_address'];
        }


        //query email and retrieve email address to be linked.
        $newEmailQuery = 'Select id, email_address from email_addresses where id in (';
            $first = true;
            foreach($existingData as $id){
                if($first){
                    $newEmailQuery .= " '$id' ";
                    $first = false;
                }else{
                    $newEmailQuery .= ", '$id' ";
                    $first = false;
                }        
            }
        $newEmailQuery .= ')';
        
        $newResult = $focus->merge_bean->db->query($newEmailQuery);
        while(($row=$focus->merge_bean->db->fetchByAssoc($newResult))!= null) {
            $newEmails[$row['id']]=$row['email_address'];
        }

        //compare the two arrays and remove duplicates
        foreach($newEmails as $k=>$n){
            if(!in_array($n,$existingEmails)){
                $mrgArray[$k] = $n;
            }   
        }

        //add email id's.
        foreach ($mrgArray as $related_id=>$related_val) {
            //add to primary bean
            $focus->merge_bean->$name->add($related_id);
        }   
}
?>
