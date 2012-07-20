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



function togglePasswordRetypeRequired() {
   var theForm = document.forms[0];
   var elem = document.getElementById('password_retype_required');

   if( theForm.setup_db_create_sugarsales_user.checked ){
      elem.style.display = '';
      // theForm.setup_db_sugarsales_user.focus();
      theForm.setup_db_username_is_privileged.checked = "";
      theForm.setup_db_username_is_privileged.disabled = "disabled";
      toggleUsernameIsPrivileged();
   }
   else {
      elem.style.display = 'none';
      theForm.setup_db_username_is_privileged.disabled = "";
   }
}

function toggleDropTables(){
   var theForm = document.forms[0];

   if( theForm.setup_db_create_database.checked ){
      theForm.setup_db_drop_tables.checked = '';
      theForm.setup_db_drop_tables.disabled = "disabled";
   }
   else {
      theForm.setup_db_drop_tables.disabled = '';
   }
}

function toggleUsernameIsPrivileged(){
   var theForm = document.forms[0];
   var elem = document.getElementById('privileged_user_info');

   if( theForm.setup_db_username_is_privileged.checked ){
      elem.style.display = 'none';
   }
   else {
      elem.style.display = '';
   }
}
