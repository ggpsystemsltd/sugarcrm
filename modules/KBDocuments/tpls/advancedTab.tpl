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
<script type="text/javascript" language="Javascript" src="modules/KBDocuments/kbdocuments.js"></script>
			<form enctype="multipart/form-data" id="FTSFormAdvanced" name="FTSFormAdvanced" method="POST" action="index.php">
			<input type="hidden" name="module" id="module" value="KBDocuments">
			<input type="hidden" name="action" id="action" value="SearchHome">
			<input type="hidden" name="mode" id="mode_a" value="advanced">			
			<input type="hidden" name="post_clear_mode" id="post_clear_mode" value="advanced">
            <input type="hidden" value="true" name="query" id="query">
							
		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="edit view search kb">
		<tr><td>
			<div>				
				<table width="100%" border="0" cellspacing="0" cellpadding="0" >
					<tr>
				        <td width="15%" scope="row" >{$MOD.LBL_CONTAINING_THESE_WORDS}</td>
				        <td width="35%"  ><input type='text' id='searchText_include' class='text' name='searchText_include' size='50'"  value='{$searchText_include}' maxlength='150'></td>
				        <td width="15%" scope="row" >{$MOD.LBL_SEARCH_WITHIN}</td>
				        <td width="35%"  ><select name='canned_search' id='canned_search'>{$CANNED_SEARCH_OPTIONS}</select></td>
					</tr>
					<tr>
				        <td width="15%" scope="row" >{$MOD.LBL_EXCLUDING_THESE_WORDS}</td>
				        <td width="35%"  ><input type='text' id='searchText_exclude' class='text' name='searchText_exclude' size='50'"  value='{$searchText_exclude}' maxlength='150'><br></td>	  
				        <td scope="row" >{$MOD.LBL_UNDER_THIS_TAG}</td>
				        <td  >
				        	<input type='hidden' name='modal_close_search'  id='modal_close_search'>
							<input class="sqsEnabled"  autocomplete="off" id="tag_name" name='tag_name' type="text" value="{$tag_name}">
							<input id='tag_id' name='tag_id' type="hidden" value="{$tag_id}" />
					        <input  title="{$MOD.LBL_SELECT_TAG_BUTTON_TITLE}"  type="button" tabindex='1' class="button" value='{$MOD.LBL_SELECT_TAG_BUTTON_TITLE}' name='btn_tagss' onclick="javascript:SUGAR.kb.modalInit(); return false;" />

					</td>	  
					</tr>
				
			</div>
					<tr>
						<td width="15%" scope="row"><span sugar='slot2'>{$MOD.LBL_ARTICLE_TITLE}&nbsp;<span class="required"></span></span sugar='slot'></td>
						<td width = "35%" ><span sugar='slot2b'><input name='kbdocument_name'  type='text' size='50' value="{$kbdocument_name}"></span sugar='slot'></td>		        
				        <td width="15%" scope="row"><span sugar='slot3'>{$MOD.LBL_TIMES_VIEWED}</td>
						<td width="35%" ><span sugar='slot3b'><select  name='frequency'>{$FRQ_VIEW_OPTIONS}</select></span sugar='slot'></td>		                

					</tr>
					<tr>
						<td valign="top" scope="row"><span sugar='slot4'>{$MOD.LBL_DOC_STATUS}</span sugar='slot'></td>
						<td ><span sugar='slot4b'><select  name='status_id'>{$STATUS_OPTIONS}</select></span sugar='slot'></td>
						<td valign="top" scope="row"><span sugar='slot5'>{$APP.LBL_TEAM} </span sugar='slot'></td>
						<td ><span sugar='slot5b'><input class="sqsEnabled"  autocomplete="off" id="team_name" name='team_name' type="text" value="{$team_name}"><input id='team_id' name='team_id' type="hidden" value="{$team_id}" />
							<input type="button"  class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name='btn_team'
								onclick='open_popup("Teams", 600, 400, "", true, false, {$encoded_team_popup_request_data});' /></span sugar='slot'>
						</td>
					</tr>
					<tr>
						<td scope="row"><span sugar='slot6'>{$MOD.LBL_KBDOC_APPROVED_BY}</span sugar='slot'></td>
						<td  ><span sugar='slot6b'>
							<input class="sqsEnabled"  autocomplete="off" id="kbdoc_approver_name" name='kbdoc_approver_name' type="text" value="{$kbdoc_approver_name}">
							<input id='kbdoc_approver_id' name='kbdoc_approver_id' type="hidden" value="{$kbdoc_approver_id}" />
							<input type="button" class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name='btn_user'
									onclick='open_popup("Users", 600, 400, "", true, false, {$encoded_approver_popup_request_data});' />
							</span sugar='slot'>
						</td>
						<td scope="row"><span sugar='slot7'>{$MOD.LBL_ARTICLE_AUTHOR}</span sugar='slot'></td>
						<td  ><span sugar='slot7b'>
							<input class="sqsEnabled"  autocomplete="off" id="kbarticle_author_name" name='kbarticle_author_name' type="text" value="{$kbarticle_author_name}">
							<input id='kbarticle_author_id' name='kbarticle_author_id' type="hidden" value="{$kbarticle_author_id}" />
							<input type="button"  class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name='btn_author'
									onclick='open_popup("Users", 600, 400, "", true, false, {$encoded_author_popup_request_data});' />
							</span sugar='slot'>
						</td>
					</tr>
				   	<tr>
						<td scope="row"><span sugar='slot8'>{$MOD.LBL_PUBLISHED}&nbsp;</span sugar='slot'></td>
						<td colspan = '3'  nowrap><span sugar='slot8b'>
							<select name='active_date_filter' id='active_date_filter' onChange="hideShowDateFields('active_date')">
								{$ACTIVE_DATE_FILTER_OPTIONS}
							</select>
							<span id='active_date_field_span' style="display:{$A_DATE1_STYLE}">
								<input onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');" name='active_date' id='active_date_field' type="text" size='11' maxlength='10' value="{$active_date}"/> 
                                {capture assign="other_attributes"}align="absmiddle" id="active_date_trigger"{/capture}
                                {sugar_getimage name="jscalendar" ext=".gif" alt=$APP.LBL_ENTER_DATE other_attributes=$other_attributes}
								<span class="dateFormat">{$USER_DATE_FORMAT}</span>
	
								<span id='active_date_field2_span' style="display:{$A_DATE2_STYLE}">&nbsp;{$MOD.LBL_AND}&nbsp;
									<input onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');" name='active_date2' id='active_date_field2' type="text" size='11' value="{$active_date2}"/> 
									{capture assign="other_attributes"}align="absmiddle" id="active_date_trigger2"{/capture}
                                    {sugar_getimage name="jscalendar" ext=".gif" alt=$APP.LBL_ENTER_DATE other_attributes=$other_attributes}
									<span class="dateFormat">{$USER_DATE_FORMAT}</span>
								</span>
							</span>
						</span sugar='slot'></td>
					</tr>
					<tr>
						<td scope="row"><span sugar='slot9'>{$MOD.LBL_EXPIRES}</span sugar='slot'></td>
						<td  colspan = '3'   nowrap><span sugar='slot9b'>
							<select name='exp_date_filter' id='exp_date_filter' onChange="hideShowDateFields('exp_date')">
								{$EXP_DATE_FILTER_OPTIONS}
							</select>
							<span id='exp_date_field_span' style="display:{$X_DATE1_STYLE}">
								<input  onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');" name='exp_date' id='exp_date_field' type="text" size='11' maxlength='10' value="{$exp_date}"> 
								{capture assign="other_attributes"}align="absmiddle" id="exp_date_trigger"{/capture}
                                {sugar_getimage name="jscalendar" ext=".gif" alt=$APP.LBL_ENTER_DATE other_attributes=$other_attributes}
								<span class="dateFormat">{$USER_DATE_FORMAT}</span>
	
								<span id='exp_date_field2_span' style="display:{$X_DATE2_STYLE}">&nbsp;{$MOD.LBL_AND}&nbsp;
									<input onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');" name='exp_date2' id='exp_date_field2' type="text" size='11' value="{$exp_date2}"/> 
									{capture assign="other_attributes"}align="absmiddle" id="exp_date_trigger2"{/capture}
                                    {sugar_getimage name="jscalendar" ext=".gif" alt=$APP.LBL_ENTER_DATE other_attributes=$other_attributes}
									<span class="dateFormat">{$USER_DATE_FORMAT}</span>
								</span>
							</span>
						</span sugar='slot'></td>
					</tr>
					<tr>
						<td scope="row"><span sugar='slot9'>{$MOD.LBL_ATTACHMENTS}</span sugar='slot'></td>
						<td   ><span sugar='slot9b' nowrap>
							<select name='attachments' id='attachments' onChange="hideShowAttachmentsFields(this)">
								{$ATTACHMENT_SELECT_OPTIONS}
							</select>
							<span id='attachments_name_span' style="display:{$ATTACHMENT_NAME_STYLE}" >
								<input class="sqsEnabled"  autocomplete="off"  name='filename' id='filename' type="text" size='11' maxlength='10' value="{$filename}"> 
								<input id='filename_revision_id' name='filename_revision_id' type="hidden" value="{$filename_revision_id}" />								
							</span>
							<span id='attachments_mime_span'  style="display:{$ATTACHMENT_MIME_STYLE}">
								<input class="sqsEnabled"  autocomplete="off"  name='file_mime_type' id='file_mime_type' type="text" size='11' maxlength='10' value="{$file_mime_type}"> 
								<input id='mimetype_revision_id' name='mimetype_revision_id' type="hidden" value="{$mimetype_revision_id}" />																
							</span>
						</span sugar='slot'></td>
						<td scope="row">
						&nbsp;</td>
						<td  width="35%">
							<span sugar="slot10b">
							&nbsp;</span>
						
						</td>	
					</tr>
				   	<tr>
				        <td colspan='4'>&nbsp;</td>
					</tr>
					<tr>
						<td class='dataLabel' nowrap width='1%'>
							{$MOD.LBL_SAVE_SEARCH_AS} <img alt="Help" border='0' src='{sugar_getimagepath file='helpInline.gif'}' onmouseover="return overlib('{$MOD.LBL_SAVE_SEARCH_AS_HELP}', FGCLASS, 'olFgClass', CGCLASS, 'olCgClass', BGCLASS, 'olBgClass', TEXTFONTCLASS, 'olFontClass', CAPTIONFONTCLASS, 'olCapFontClass', CLOSEFONTCLASS, 'olCloseFontClass' );" onmouseout="return nd();">
						</td>
						<td class='dataField'>
							<input type='text' id='saved_search_name' value='' name='saved_search_name'>
							<input type='hidden' name='saved_search_action' id='saved_search_action' value=''>
							<input value='{$APP.LBL_SAVE_BUTTON_LABEL}' class='button' type='button' name='saved_search_submit' onclick="document.getElementById('saved_search_action').value='saveSearch'; this.form.submit();">
						</td>
						<td nowrap class='dataLabel'>
							{$MOD.LBL_PREVIOUS_SAVED_SEARCH} <img alt="Help" border='0' src='{sugar_getimagepath file='helpInline.gif'}' onmouseover="return overlib('{$MOD.LBL_PREVIOUS_SAVED_SEARCH_HELP}', FGCLASS, 'olFgClass', CGCLASS, 'olCgClass', BGCLASS, 'olBgClass', TEXTFONTCLASS, 'olFontClass', CAPTIONFONTCLASS, 'olCapFontClass', CLOSEFONTCLASS, 'olCloseFontClass' );" onmouseout="return nd();">
						</td>
						<td class='dataField'>
							<select name='saved_search_select' id='saved_search_select' onChange="setSelectSearchInputs('loadSearch');this.form.submit();">
								{$SAVED_SEARCH_OPTIONS}
							</select>
							&nbsp;<input class='button'  onclick="setSelectSearchInputs('updateSearch'); this.form.submit();" value='{$MOD.LBL_UPDATE}' title='{$MOD.LBL_UPDATE}' name='ss_update' id='ss_update' type='button'>&nbsp;
							<input class='button' onclick="setSelectSearchInputs('deleteSearch');this.form.submit();" value='{$MOD.LBL_DELETE}' title='{$MOD.LBL_DELETE}' name='ss_delete' id='ss_delete' type='button'>
					
						</td>
					</tr>					
				</table>
			
			</td></tr></table>
	        	<div style='padding: 2'>
		        	<input type='submit' class='button' name='fts_search_ADV' id='fts_search_ADV' value='{$MOD.LBL_SEARCH}'">
	 				<input type='submit' class='button' name='clearFormAdv' id='clearFormAdv' value='{$MOD.LBL_CLEAR}' onClick="document.getElementById('mode_a').value='clear';">
 				</div>
				</form>
			


<script type="text/javascript" language="JavaScript">
	format = "{$CALENDAR_DATEFORMAT}";
{literal}				
	Calendar.setup ({
		inputField : "active_date_field", ifFormat : format, showsTime : false, button : "active_date_trigger", singleClick : true, step : 1, weekNumbers:false
	});
	
	Calendar.setup ({
		inputField : "exp_date_field", ifFormat : format, showsTime : false, button : "exp_date_trigger", singleClick : true, step : 1, weekNumbers:false
	});

	Calendar.setup ({
		inputField : "active_date_field2", ifFormat : format, showsTime : false, button : "active_date_trigger2", singleClick : true, step : 1, weekNumbers:false
	});
	
	Calendar.setup ({
		inputField : "exp_date_field2", ifFormat : format, showsTime : false, button : "exp_date_trigger2", singleClick : true, step : 1, weekNumbers:false
	});


	//prepare the hidden input files for savedSearch processing	
	//acceptable actions are loadSearch,updateSearch,deleteSearch,saveSearch
	function setSelectSearchInputs(action){
		//grab the dropdown values and populate inputs
		var elem = document.getElementById('saved_search_select');
		var selInd = elem.selectedIndex;
        if(selInd<0){selInd =0;}
		document.getElementById('saved_search_action').value=action;         
		document.getElementById('saved_search_name').value=keyVal = elem.options[selInd].text; 
	}
	
	//hide or show update and delete saved search buttons
	function hideShowSearchButtons() {
		var keyVal = document.getElementById('saved_search_select').value;
			if(keyVal == ''){
				document.getElementById('ss_update').style.display = 'none';
				document.getElementById('ss_delete').style.display = 'none';							
			}else{
				document.getElementById('ss_update').style.display = '';
				document.getElementById('ss_delete').style.display = '';				
			}
		}
		//run initial check	and hide/show buttons as needed
		hideShowSearchButtons();


	//hide or show the 'more options' portion of advanced search screen
    function hideShowMoreOptions(){
        if (document.getElementById('more_options_div').style.display == 'none'){    
            document.getElementById('more_options_div').style.display = '';
            document.getElementById('up_down_img2').src='{/literal}{sugar_getimagepath file="basic_search.gif"}{literal}';
        }else{    
            document.getElementById('up_down_img2').src='{/literal}{sugar_getimagepath file="advanced_search.gif"}{literal}';
            document.getElementById('more_options_div').style.display = 'none';        
        }
     }

	//hide or show attachment fields based on dropdown values
	function hideShowAttachmentsFields(ddElem) {

		var selInd = ddElem.selectedIndex;
        if(selInd<0){selInd =0;}

		var filterVal = ddElem.options[selInd].value; 		

			if(filterVal == 'some' || filterVal == 'none' ){
				document.getElementById('attachments_name_span').style.display = 'none';				
				document.getElementById('attachments_mime_span').style.display = 'none';				
			}
			else if(filterVal == 'name'){
				document.getElementById('attachments_name_span').style.display = '';				
				document.getElementById('attachments_mime_span').style.display = 'none';				
			}else if(filterVal == 'mime'){
				document.getElementById('attachments_name_span').style.display = 'none';				
				document.getElementById('attachments_mime_span').style.display = '';				
			}else{
				document.getElementById('attachments_name_span').style.display = 'none';				
				document.getElementById('attachments_mime_span').style.display = 'none';				
			}
	}



	//hide or show date fields based on date dropdown values
	function hideShowDateFields(name) {
		var filterElem = document.getElementById(name+'_filter');
		var selInd = filterElem.selectedIndex;
        if(selInd<0){selInd =0;}

		var filterVal = filterElem.options[selInd].text; 		

		
			if(filterVal == 'On' || filterVal == 'Before' || filterVal == 'After' || filterVal == 'Is Between'){
				document.getElementById(name+'_field_span').style.display = '';				
				if(filterVal == 'Is Between'){
					document.getElementById(name+'_field2_span').style.display = '';				
				}else{
					document.getElementById(name+'_field2_span').style.display = 'none';				
				}
				
			}else{
				document.getElementById(name+'_field_span').style.display = 'none';				
				document.getElementById(name+'_field2_span').style.display = 'none';				
			}
		}
		
	function externalChecked(){
	}

	</script>
{/literal}				
				

	    <div id='dialog1' style="display: none">
	    	<div class="bd">   
	    		<div id="jsonresults"></div>                
				 <div id="tagsCreate" style="display:none" >	                                     					       
					          <table>  					             						            			                     
					                <tr>					                  					                     								         
			                             <td scope="row"><span sugar='slot19' id='new_tag_name'>Tag Name:</span sugar='slot'></td>
									     <td ><input id='tag_new' name='tag_new' type='hidden' size='20'></td>  						  
									     <td><input id='Ok' class='button' type='hidden' size='10' onclick="addNewNode(false);"  value='Save'></td>  								    							    
									     <td><input id='Cancel' class='button' type='hidden'  size='10' onclick="hideMessageAndNode();" value='Cancel'></td>  				  
							        </tr>
							  </table>  
				  </div> 				             			                              		   		       
	           <div id='tagstree' class="edit view" >
	             {$TREEINSTANCE}
	           </div>	
	    	</div>         
	    </div>
	 	        <div id="searchAndCreate" style="display: none">
		 	        <table><tr> 	          
				 	          <td><input align="center" id='tags_search' name='tags_search' type='hidden'><input id='search' name='search' type='hidden' class='button' onclick="searchTree(false);" value='Search'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				 	          <td><input id='tcr' name='tcr' type='hidden' class='button' onclick="displayNewNodeBody();" value='Create New Tag'></td>				                            			              			               
			              </tr>
			         </table>     
  		         </div>
				 <div id='CreateNodeMessage' style="display:none">
				      <table>
					      <tr><td scope="row" colspan='2'><span sugar='slot25' id ='CreateNodeM' ><b><font COLOR=red>{$MOD.LBL_SELECT_PARENT_TREE_NOTICE}</b></span sugar='slot'></td>
	  					      <td><input id='CancelDup' align="right" class='button' type='hidden' onclick="hideMessageAndNode();" value='Cancel'></td>  				  
	  					      <td><input id='tag_selected_id' name='tag_selected_id' type='hidden' value=''></td>  		        		        			       			        
	  					  </tr>
  					  </table>
				 </div>	  	
	    <div id="Linked_Tags" style="display: none"></div>
	    <div id="Set_Selected_Node" style="display: none"></div>