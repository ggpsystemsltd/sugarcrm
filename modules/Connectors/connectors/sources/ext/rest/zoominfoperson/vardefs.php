<?php
//FILE SUGARCRM flav=pro
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

$dictionary['ext_rest_zoominfoperson'] = array(
  'comment' => 'vardefs for ZoomInfo Person connector',
  'fields' => array (
    'id' => array (
	    'name' => 'id',
	    'vname' => 'LBL_ID',
	    'hidden' => true,
	),  
	'firstname' => array (
	    'name' => 'firstname',
	    'vname' => 'LBL_FIRST_NAME',
	    'input' => 'firstName',
	    'search' => true,
    ),  
    'lastname'=> array(
	    'name' => 'lastname',
	    'vname' => 'LBL_LAST_NAME',	    
	    'input' => 'lastName',
	    'search' => true,
    ),
    'email' => array(
	    'name' => 'email',
	    'vname' => 'LBL_EMAIL',	    
	    'input' => 'EmailAddress',
	    'search' => true,    
    ),
    'imageurl' => array(
	    'name' => 'imageurl',
	    'vname' => 'LBL_IMAGE_URL',
    ),
    'companyname' => array(
	    'name' => 'companyname',
	    'vname' => 'LBL_COMPANY_NAME',
	    'input' => 'companyName',
        'search' => true, 
    ),
    'zoompersonurl' => array(
		'name' => 'zoompersonurl',
    	'vname' => 'LBL_ZOOMPERSON_URL',    
    ),
    'directphone' => array(
		'name' => 'directphone',
    	'vname' => 'LBL_DIRECT_PHONE',    
    ),
    'companyphone' => array(
		'name' => 'companyphone',
    	'vname' => 'LBL_COMPANY_PHONE',    
    ),            
    'fax' => array(
		'name' => 'fax',
    	'vname' => 'LBL_FAX',    
    ), 
    'jobtitle' => array(
    	'name'=>'jobtitle',
    	'vname' => 'LBL_CURRENT_JOB_TITLE',
    ),
    'current_job_start_date' => array(
    	'name'=>'current_job_start_date',
    	'vname' => 'LBL_CURRENT_JOB_START_DATE',
    ),
    'companyname' => array(
    	'name'=>'companyname',
    	'vname' => 'LBL_CURRENT_JOB_COMPANY_NAME',
        'search'=>true,
    ),
    'street' => array(
    	'name'=>'street',
    	'vname' => 'LBL_CURRENT_JOB_COMPANY_STREET',
    ),  
    'city' => array(
    	'name'=>'city',
    	'vname' => 'LBL_CURRENT_JOB_COMPANY_CITY',
    ),  
    'state' => array(
    	'name'=>'state',
    	'vname' => 'LBL_CURRENT_JOB_COMPANY_STATE',
    ),  
    'zip' => array(
    	'name'=>'current_job_company_zip',
    	'vname' => 'LBL_CURRENT_JOB_COMPANY_ZIP',
    ),  
    'countrycode' => array(
    	'name'=>'countrycode',
    	'vname' => 'LBL_CURRENT_JOB_COMPANY_COUNTRY_CODE',
    ),  
    'industry' => array(
    	'name'=>'industry',
    	'vname' => 'LBL_CURRENT_INDUSTRY',
    ), 
	'biography' => array(
		'name'=>'biography',
    	'vname' => 'LBL_BIOGRAPHY',    
    ),    
    'school' => array(
    	'name' => 'school',
    	'vname' => 'LBL_EDUCATION_SCHOOL',
        'search' => true,
    ),
    'affiliation_title' => array(
        'name' => 'affiliation_title',
        'vname' => 'LBL_AFFILIATION_TITLE',
        'input' => 'JobTitle',
    ),
    'affiliation_company_name' => array(
        'name' => 'affiliation_company_name',
        'vname' => 'LBL_AFFILIATION_COMPANY_NAME',        
    ),
    'affiliation_company_phone' => array(
        'name' => 'affiliation_company_phone',
        'vname' => 'LBL_AFFILIATION_COMPANY_PHONE',        
    ),    
    'affiliation_company_website' => array(
        'name' => 'affiliation_company_website',
        'vname' => 'LBL_AFFILIATION_COMPANY_WEBSITE',      
    )                      
   )
);
?>
