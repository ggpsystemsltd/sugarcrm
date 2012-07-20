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
<form id="searchForm" method="get" action="#">
    <table id="searchTable" border="0" cellpadding="0" cellspacing="0" width="670">
		<tr id="peopleTableSearchRow">
			<td scope="row" nowrap="NOWRAP">
			     <div id="rollover">
			     {$mod_strings.LBL_SEARCH_FOR}:
			         <a href="#" class="rollover"><img border="0" alt=$mod_strings.LBL_HELP src="themes/default/images/helpInline.gif">
	                        <div><span class="rollover">{$mod_strings.LBL_ADDRESS_BOOK_SEARCH_HELP}</span></div>
	                 </a>
	                          
		      	<input id="input_searchField" name="input_searchField" type="text" value="">
		      	</div>
			    &nbsp;&nbsp; {$mod_strings.LBL_LIST_RELATED_TO}: &nbsp;
			    <select name="person" id="input_searchPerson">
			         {$listOfPersons}
			    </select>
			    &nbsp;
			    <a href="javascript:void(0);">
		           	{sugar_getimage name="select" ext=".gif" alt=$mod_strings.LBL_EMAIL_SELECTOR other_attributes='align="absmiddle" border="0" onclick="SUGAR.email2.addressBook.searchContacts();" '}
                </a>
                <a href="javascript:void(0);">
		           	{sugar_getimage name="clear" ext=".gif" alt=$mod_strings.LBL_EMAIL_SELECTOR other_attributes='align="absmiddle" border="0" onclick="SUGAR.email2.addressBook.clearAddressBookSearch();" '}
                </a>  
			</td>
        </tr>
        <tr id="peopleTableSearchRow">
            <td scope="row" nowrap="NOWRAP" colspan="2" id="relatedBeanColumn">
		      {$mod_strings.LBL_FILTER_BY_RELATED_BEAN}<span id="relatedBeanInfo"></span>
		   	  <input name="hasRelatedBean" id="hasRelatedBean" type="checkbox"/>
            </td>
            
        </tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr id="peopleTableSearchRow">
            <td id="searchSubmit" scope="row" nowrap="NOWRAP">
                <button onclick="SUGAR.email2.addressBook.insertContactToResultTable(null,'{sugar_translate label='LBL_EMAIL_ADDRESS_BOOK_ADD_TO'}')">
                    {sugar_translate label="LBL_ADD_TO_ADDR" module="Emails"} <b>{sugar_translate label="LBL_EMAIL_ADDRESS_BOOK_ADD_TO"}</b>
                </button>
                <button onclick="SUGAR.email2.addressBook.insertContactToResultTable(null,'{sugar_translate label='LBL_EMAIL_ADDRESS_BOOK_ADD_CC'}')">
                    {sugar_translate label="LBL_ADD_TO_ADDR" module="Emails"} <b>{sugar_translate label="LBL_EMAIL_ADDRESS_BOOK_ADD_CC"}</b>
                </button>
                <button onclick="SUGAR.email2.addressBook.insertContactToResultTable(null,'{sugar_translate label='LBL_EMAIL_ADDRESS_BOOK_ADD_BCC'}')">
                    {sugar_translate label="LBL_ADD_TO_ADDR" module="Emails"} <b>{sugar_translate label="LBL_EMAIL_ADDRESS_BOOK_ADD_BCC"}</b>
                </button>
            </td>
        </tr>
        
    </table>
</form>