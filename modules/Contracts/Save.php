<?php
if(!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');
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





require_once ('include/formbase.php');



global $timedate;
if(!empty($_POST['expiration_notice_time_meridiem']) && !empty($_POST['expiration_notice_time'])) {
	$_POST['expiration_notice_time'] = $timedate->merge_time_meridiem($_POST['expiration_notice_time'],$timedate->get_time_format(), $_POST['expiration_notice_time_meridiem']);
}


$sugarbean = new Contract();
$sugarbean = populateFromPost('', $sugarbean);

if (!$sugarbean->ACLAccess('Save')) {
	ACLController :: displayNoAccess(true);
	sugar_cleanup(true);
}
if(empty($sugarbean->id)) {
    $sugarbean->id = create_guid();
    $sugarbean->new_with_id = true;
}

$check_notify = isset($GLOBALS['check_notify']) ? $GLOBALS['check_notify'] : false;
$sugarbean->save($check_notify);
$return_id = $sugarbean->id;

if (!empty($_POST['type']) && $_POST['type'] !== $_POST['old_type']) {
	//attach all documents from contract type into contract.
	$ctype = new ContractType();
	$ctype->retrieve($_POST['type']);
	if (!empty($ctype->id)) {
		$ctype->load_relationship('documents');
		$doc = new Document();
		$documents=$ctype->documents->getBeans($doc);
		if (count($documents) > 0) {
			$sugarbean->load_relationship('contracts_documents');
			foreach($documents as $document) {
				$sugarbean->contracts_documents->add($document->id,array('document_revision_id'=>$document->document_revision_id));
			}			
		}	
	}
}
handleRedirect($return_id, 'Contracts');
?>