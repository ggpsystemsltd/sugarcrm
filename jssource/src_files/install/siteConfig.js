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



function toggleSiteDefaults(){
   var theForm = document.forms[0];
   var elem = document.getElementById('setup_site_session');

   if( theForm.setup_site_defaults.checked ){
      document.getElementById('setup_site_session_section_pre').style.display = 'none';
      document.getElementById('setup_site_session_section').style.display = 'none';
      document.getElementById('setup_site_log_dir_pre').style.display = 'none';
      document.getElementById('setup_site_log_dir').style.display = 'none';
      document.getElementById('setup_site_guid_section_pre').style.display = 'none';
      document.getElementById('setup_site_guid_section').style.display = 'none';
   }
   else {
      document.getElementById('setup_site_session_section_pre').style.display = '';
      document.getElementById('setup_site_log_dir_pre').style.display = '';
      document.getElementById('setup_site_guid_section_pre').style.display = '';
      toggleSession();
      toggleGUID();
   }
}

function toggleSession(){
   var theForm = document.forms[0];
   var elem = document.getElementById('setup_site_session_section');

   if( theForm.setup_site_custom_session_path.checked ){
      elem.style.display = '';
   }
   else {
      elem.style.display = 'none';
   }
}

function toggleLogDir(){
   var theForm = document.forms[0];
   var elem = document.getElementById('setup_site_log_dir');

   if( theForm.setup_site_custom_log_dir.checked ){
      elem.style.display = '';
   }
   else {
      elem.style.display = 'none';
   }
}

function toggleGUID(){
   var theForm = document.forms[0];
   var elem = document.getElementById('setup_site_guid_section');

   if( theForm.setup_site_specify_guid.checked ){
      elem.style.display = '';
   }
   else {
      elem.style.display = 'none';
   }
}
