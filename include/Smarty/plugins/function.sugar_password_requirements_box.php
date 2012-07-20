<?php

/*

Modification information for LGPL compliance

r56990 - 2010-06-16 13:05:36 -0700 (Wed, 16 Jun 2010) - kjing - snapshot "Mango" svn branch to a new one for GitHub sync

r56989 - 2010-06-16 13:01:33 -0700 (Wed, 16 Jun 2010) - kjing - defunt "Mango" svn dev branch before github cutover

r55980 - 2010-04-19 13:31:28 -0700 (Mon, 19 Apr 2010) - kjing - create Mango (6.1) based on windex

r55866 - 2010-04-07 12:53:06 -0700 (Wed, 07 Apr 2010) - jmertic - Merge from Windex_beta1 r55799 through r55853

r53119 - 2009-12-09 19:23:33 -0800 (Wed, 09 Dec 2009) - mitani - fixes tags for xtemplate

r53116 - 2009-12-09 17:24:37 -0800 (Wed, 09 Dec 2009) - mitani - Merge Kobe into Windex Revision 51633 to 53087

r53057 - 2009-12-07 17:36:37 -0800 (Mon, 07 Dec 2009) - mitani - Cleans up tag spacing to reduce the number of conflicts with Windex

r52695 - 2009-11-23 12:43:45 -0800 (Mon, 23 Nov 2009) - jmertic - Bug 34084 - Correct tag the password strength indicators on the Users EditView for sales and pro instead of just pro.

r51719 - 2009-10-22 10:18:00 -0700 (Thu, 22 Oct 2009) - mitani - Converted to Build 3  tags and updated the build system 

r51634 - 2009-10-19 13:32:22 -0700 (Mon, 19 Oct 2009) - mitani - Windex is the branch for Sugar Sales 1.0 development

r50752 - 2009-09-10 15:18:28 -0700 (Thu, 10 Sep 2009) - dwong - Merged branches/tokyo from revision 50372 to 50729 to branches/kobe2
Discard lzhang r50568 changes in Email.php and corresponding en_us.lang.php

r50375 - 2009-08-24 18:07:43 -0700 (Mon, 24 Aug 2009) - dwong - branch kobe2 from tokyo r50372

r50250 - 2009-08-19 11:34:16 -0700 (Wed, 19 Aug 2009) - dwong - merged Advanced Password Management removal from CE from jenny/tokyo, from r50164 to r50232

r45859 - 2009-04-03 12:26:29 -0700 (Fri, 03 Apr 2009) - faissah - Now using Smarty functions to display password requirements box


*/


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


/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty {smarty_function_sugar_password_box} function plugin
 *
 * Type:     function<br>
 * Name:     smarty_function_sugar_password_box<br>
 * Purpose:  display the password requirement box in the User Module
 *
 * @author Aissah Fabrice {faissah at sugarcrm.com
 * @param array
 * @param Smarty
 */
function smarty_function_sugar_password_requirements_box($params, &$smarty)
{
global $current_language;
$administration_module_strings = return_module_language($current_language, 'Administration');
$pwd_settings=$GLOBALS['sugar_config']['passwordsetting'];
if ($pwd_settings['oneupper'] == '1')    $DIVFLAGS['1upcase']=$administration_module_strings['LBL_PASSWORD_ONE_UPPER_CASE']; 
if ($pwd_settings['onelower'] == '1')    $DIVFLAGS['1lowcase']=$administration_module_strings['LBL_PASSWORD_ONE_LOWER_CASE']; 
if ($pwd_settings['onenumber'] == '1')   $DIVFLAGS['1number']=$administration_module_strings['LBL_PASSWORD_ONE_NUMBER']; 
if ($pwd_settings['onespecial'] == '1')  $DIVFLAGS['1special']=$administration_module_strings['LBL_PASSWORD_ONE_SPECIAL_CHAR'];  
if ($pwd_settings['customregex'] != '')  $DIVFLAGS['regex']=$pwd_settings['regexcomment'];
if ($pwd_settings['minpwdlength'] >0 && $pwd_settings['maxpwdlength'] >0)
    $DIVFLAGS['lengths']=$administration_module_strings['LBL_PASSWORD_MINIMUM_LENGTH'].' ='.$pwd_settings['minpwdlength'].' '.$administration_module_strings['LBL_PASSWORD_AND_MAXIMUM_LENGTH'].' ='.$pwd_settings['maxpwdlength'];   
else if ($pwd_settings['minpwdlength'] >0)
        $DIVFLAGS['lengths']=$administration_module_strings['LBL_PASSWORD_MINIMUM_LENGTH'].' ='.$pwd_settings['minpwdlength'];    
    else if ($pwd_settings['maxpwdlength'] >0)
        $DIVFLAGS['lengths']=$administration_module_strings['LBL_PASSWORD_MAXIMUM_LENGTH'].' ='.$pwd_settings['maxpwdlength'];
           
if ($DIVFLAGS=='')
	return;
$table_style='';

foreach($params as $prop => $value){$table_style.= $prop."='".$value."' ";}
$box="	<table ".$table_style.">
<tr><td width='18px'></td><td></td></tr>";
foreach($DIVFLAGS as $key => $value) {
	if ($key != '')
		$box.="<tr><td> <div class='bad' id='$key'></div> </td><td>  <div align='left'>$value</div></td></tr>";    	
}
$box.="</table>";
return $box;
}            
?>