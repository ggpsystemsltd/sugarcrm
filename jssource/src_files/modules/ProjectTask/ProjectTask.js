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




function prep_edit_task_in_grid(the_form)
{
	the_form.return_module.value='ProjectTask';
	the_form.return_action.value='DetailView';
	the_form.return_id.value='{id}';
	the_form.module.value='Project';
	the_form.action.value='EditGridView';
}

function update_status(percent_complete){
	if (percent_complete == '0'){
		document.getElementById('status').value = 'Not Started';
	}
	else if (percent_complete == '100'){
		document.getElementById('status').value = 'Completed';		
	}
	else if (isNaN(percent_complete) || (percent_complete < 0 || percent_complete > 100)){
		document.getElementById('percent_complete').value = '';
	}
	else{
		document.getElementById('status').value = 'In Progress';
	}
}

function update_percent_complete(status){
	if (status == 'In Progress'){
		percent_value = '50';
	}
	else if (status == 'Completed'){
		percent_value = '100';
	}
	else{
		percent_value = '0';
	}
	document.getElementById('percent_complete').value = percent_value;		
	document.getElementById('percent_complete_text').innerHTML = percent_value;
}