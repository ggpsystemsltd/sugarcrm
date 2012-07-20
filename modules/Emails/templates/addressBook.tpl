{*
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

*}
<div style='padding:5px;'>
    <button class="button" onclick="SUGAR.email2.addressBook.selectContactsDialogue();" id="selectContacts">{sugar_translate label="LBL_ADD_ENTRIES"}</button>
</div>
<div id="contactsFilterDiv" class="addressbookSearch">
<span> {$app_strings.LBL_EMAIL_ADDRESS_BOOK_FILTER}:&nbsp;<input size="10" type="text" class='input' id="contactsFilter" onkeyup="SUGAR.email2.addressBook.filter(this);">
	       <button class="button" onclick="SUGAR.email2.addressBook.clear();"> 
	       {$app_strings.LBL_CLEAR_BUTTON_LABEL} </button>
</span>
</div>
<div id="contacts"></div>
<div class="addressbookSearch">
<span >
    {$app_strings.LBL_EMAIL_ADDRESS_BOOK_ADD_LIST}:&nbsp;<input size="10" class="input" type="text" id="addListField" name="addListField" align="absmiddle">
</span>
 <button class="button" align="absmiddle" onclick="SUGAR.email2.addressBook.addMailingList();" style="padding-bottom: 2px">
        {$app_strings.LBL_EMAIL_ADDRESS_BOOK_ADD} </button>
</div>
<div id="lists"></div>
<div id="contactsMenu"></div>
<div id="listsMenu"></div>

