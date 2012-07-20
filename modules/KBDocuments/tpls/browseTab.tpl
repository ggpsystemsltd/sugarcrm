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

/*********************************************************************************
 ********************************************************************************/
*}


			<table width="100%" cellpadding="0" cellspacing="0" border="{$BORDER}" class="edit view search kb">
				<tr>
					<td width="{$TREE_WIDTH}" valign="top" >
						<div id="kb_browse_tags">
						
							{$TREEINSTANCE}
						</div>
					</td>
					<td valign="top"  id='selected_directory_children'>&nbsp;</td>
				</tr>
			</table>
			
{literal}			
	<script>



	//when called, this function will make ajax call to refresh list view sort order
	function sortBrowseList(params,name) {
	
		// if paginating before running a sort, then name will be empty.  Handle this use case
		if(typeof(name) =='undefined' ){
			//we will pass in keyword PAGINATE.  This will identify this call as a pagination call
			name = 'PAGINATE';
		}


		//create data to send across
		postData = 'sortCol='+name+ '&params=' + YAHOO.lang.JSON.stringify(params) + '&query=true&module=KBDocuments&action=BrowseListView&to_pdf=1';
		//create callback function
		var callback =	{
			//on success, refresh list
			  success: function(o) {    
			    	var targetdiv=document.getElementById('selected_directory_children');
	    			targetdiv.innerHTML=o.responseText;
	    			SUGAR.util.evalScript(o.responseText);
			  },
			  //do nothing on failure
			  failure: function(o) {/*failure handler code*/}
		};
		//make ajax call
		var trobj = YAHOO.util.Connect.asyncRequest('POST','index.php', callback, postData);

	}

	</script>
{/literal}			