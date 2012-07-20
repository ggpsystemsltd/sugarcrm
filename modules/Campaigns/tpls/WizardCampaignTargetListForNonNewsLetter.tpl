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

	<input type="hidden" id="existing_target_count" name="existing_target_count" value={$TARGET_COUNT}>			
	<input type="hidden" id="added_target_count" name="added_target_count" value=''>				
	<input type="hidden" id="wiz_list_of_existing_targets" name="wiz_list_of_existing_targets" value="">				
	<input type="hidden" id="wiz_list_of_targets" name="wiz_list_of_targets" value="">				
	<input type="hidden" id="wiz_remove_target_list" name="wiz_remove_target_list" value="">				



	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<th colspan="5" align="left" ><h4>{$MOD.LBL_TARGET_LISTS}</h4></th>
	</tr>
	<tr>
	<td colspan="5">{$MOD.LBL_WIZARD_TARGET_MESSAGE1}<br></td>
	</tr>
	<tr><td colspan=5>&nbsp;</td></tr>
	<tr>
	<td scope="row" colspan="4">{$MOD.LBL_SELECT_TARGET}&nbsp;
	<input id="popup_target_list_type" name="popup_target_list_type" type='hidden'>
	<input id="popup_target_list_name" name="popup_target_list_name" type="hidden" value="">
	<input id='popup_target_list_id' name='popup_target_list_id' title='List ID' type="hidden" value=''>
	<input title="{$APP.LBL_SELECT_BUTTON_TITLE}" type="button"  class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name=btn3 id='target_list_button'
 	onclick='open_popup("ProspectLists", 600, 400, "", true, false,  {$encoded_target_list_popup_request_data}, "single", true);'>	
	</span sugar='slot'>	
	</td>
	<td>&nbsp;</td>
	</tr>
	<tr><td colspan=5>&nbsp;</td></tr>
	<tr>
	<td scope="row" colspan="5">{$MOD.LBL_WIZARD_TARGET_MESSAGE2}<br></td>
	</tr>
	<tr>
	<td width='10%' scope="col">{$MOD.LBL_TARGET_NAME}</td>
	<td width='20%'>
		<input id="target_list_name" name="target_list_name" type='text' size='40'>
	</td>
	<td width='10%' scope="col">
		<span sugar='slot28'>{$MOD.LBL_TARGET_TYPE}</span sugar='slot'>
	</td>
	<td  width='20%' >
		<span sugar='slot28b'>
		<select id="target_list_type" name="target_list_type">{$TARGET_OPTIONS}</select>
		<input id='target_list_id' name='target_list_id' title='List ID' type="hidden" value=''>
		</span sugar='slot'>
	</td>
	<td width='30%'><input type='button' value ='{$MOD.LBL_CREATE_TARGET}' class= 'button' onclick="add_target('false');"></td>
	</tr>
	<tr><td colspan=5>&nbsp;</td></tr>
	</table>
	<table width = '100%' class='detail view'>
		<tr><td>{$MOD.LBL_TRACKERS_ADDED}</td></tr>
		<tr><td>
		
			<table border=1 width='100%'><tr class='detail view'>
				<th scope='col' width='25%'><b>{$MOD.LBL_TARGET_NAME}</b></th>
			    <th scope='col' width='25%'><b>{$MOD.LBL_TARGET_TYPE}</b></th><td>&nbsp;</td>
			    <td width='25%'><b>&nbsp;</b></td>			    
		    </tr>
			</table>
			<div id='added_targets'>
				{$EXISTING_TARGETS}
			</div>
	
	
		</td></tr>
	</table>
	
	<p>


		<script>
		var image_path = '{$IMAGE_PATH}';
		{literal}
		
			//create variables that will be used to monitor the number of target url
			var targets_added = 0;
			//variable that will be passed back to server to specify list of targets
			var wiz_list_of_targets_array = new Array();
			
			//this function adds selected target to list
			function add_target(from_popup){

				//perform validation
				if(validate_step4(from_popup)){
					TRGTNAME = 'target_list_name';
					TRGTID = 'target_list_id';
					TRGTYPE = 'target_list_type';

				if(from_popup == 'true'){
					TRGTNAME = 'popup_target_list_name'
					TRGTID = 'popup_target_list_id'
					TRGTYPE = 'popup_target_list_type'										
				}
				
				//increment target count value
					targets_added++;
					document.getElementById('added_target_count').value = targets_added ;
					//get the appropriate values from target form
					var trgt_name = document.getElementById(TRGTNAME);
					var trgt_id = document.getElementById(TRGTID);
					var trgt_type = document.getElementById(TRGTYPE);
//					var selInd = trgt_type.selectedIndex;
//                    trgt_type_text_value = trgt_type.options[selInd].text		
					var trgt_type_text = trgt_type.value ;
					{/literal}
					//display the selected display text, not the value
					{$PL_DOM_STMT}			
					{literal}
					//construct html to display chosen tracker
					var trgt_name_html = "<input id='target_name"+targets_added +"' type='hidden' size='20' maxlength='255' name='added_target_name"+targets_added+"' value='"+trgt_name.value+"' >"+trgt_name.value;
					var trgt_id_html = "<input type='hidden' name='added_target_id"+trackers_added+"' id='added_target_id"+trackers_added+"' value='"+trgt_id.value+"' >";
					var trgt_type_html = "<input name='added_target_type"+trackers_added+"' id='added_target_type"+trackers_added+"' type='hidden' value='"+trgt_type.value+"'/>"+trgt_type_text;

					{/literal}
					//display the html
					{capture assign='alt_remove' }{sugar_translate label='LBL_DELETE' module='CAMPAIGNS'}{/capture}
                    var trgt_html = "<div id='trgt_added_"+targets_added+"'> <table width='100%' class='tabDetailViewDL2'><tr class='tabDetailViewDL2' ><td width='25%'>"+trgt_name_html+"</td><td width='25%'>"+trgt_type_html+"</td><td>"+trgt_id_html+"<a href='#' onclick=\"remove_target('trgt_added_"+targets_added+"','"+targets_added+"'); \" >  "+'{sugar_getimage name="delete_inline" ext=".gif" width="12" height="12" alt=$alt_remove other_attributes='align="absmiddle" border="0" '}'+"{$MOD.LBL_REMOVE}</a></td></tr></table></div>";
					document.getElementById('added_targets').innerHTML = document.getElementById('added_targets').innerHTML + trgt_html;

					//add values to array in string, seperated by "@@" characters
					wiz_list_of_targets_array[targets_added] = trgt_id.value+"@@"+trgt_name.value+"@@"+trgt_type.value;					
					//assign array to hidden input, which will be used by server to process array of targets
					document.getElementById('wiz_list_of_targets').value = wiz_list_of_targets_array.toString();					
					
					//now lets clear the form to allow input of new target	
					trgt_name.value = '';
					trgt_id.value = '';
					trgt_type.value = 'default';				

					{literal}
					if(targets_added ==1){
						document.getElementById('no_targets').style.display='none';
					}
				}
			}
			
			//this function will remove the selected target from the ui, and from the target array
			function remove_target(div,num){
					//clear UI
					var trgt_div = document.getElementById(div);
					trgt_div.style.display = 'none';
					parentNE=trgt_div.parentNode;
					parentNE.removeChild(trgt_div);
					//clear target array from this entry and assign to form input
					wiz_list_of_targets_array[num] = '';										
					document.getElementById('wiz_list_of_targets').value = wiz_list_of_targets_array.toString();					
			}

			//this function will remove the existing target from the ui, and add it's value to an array for removal upon save
			function remove_existing_target(div,id){
					//clear UI
					var trgt_div = document.getElementById(div);
					trgt_div.style.display = 'none';
					parentNE=trgt_div.parentNode;
					parentNE.removeChild(trgt_div);
					//assign this id to form input for removal
					document.getElementById('wiz_remove_target_list').value += ','+id;					
			}

					
		
	   /*
	     * this is the custom validation script that will validate the fields on step3 of wizard
	     * this is called directly from the add target button
	     */
	    
	    function validate_step4(from_popup){
			if(from_popup=='true'){
				return true;
			}
	        requiredTxt = SUGAR.language.get('app_strings', 'ERR_MISSING_REQUIRED_FIELDS');
	        var stepname = 'wiz_step3_';
	        var has_error = 0;
	        var fields = new Array();
	        fields[0] = 'target_list_name'; 
	        fields[1] = 'target_list_type';
	        //loop through and check for empty strings ('  ')
	        var field_value = ''; 
	        if( (trim(document.getElementById(fields[0]).value) !='') ||  (trim(document.getElementById(fields[1]).value) !='')){
	            for (i=0; i < fields.length; i++){
	                field_value = trim(document.getElementById(fields[i]).value);
	                if(field_value.length<1){
	                  add_error_style('wizform', fields[i], requiredTxt +' ' +document.getElementById(fields[i]).title );
	                  has_error = 1;
	                }
	            }
	        }else{
	            //no values have been entered, return false without error
	            return false;
	        }
	        //error has been thrown, return false
	        if(has_error == 1){
	            return false;
	        }
	        return true;
	
	    } 


			/**
			*This function will iterate through list of targets and gather all the values.  It will
			*populate these values, seperated by delimiters into hidden inputs for processing
			*/
			function gathertargets(){
				//start with the newly added targets, get count of total added
				count = parseInt(targets_added);
				final_list_of_targets_array = new Array();
				//iterate through list of added targets
				for(i=1;i<=count;i++){
					//make sure all values exist
					if( document.getElementById('target_name'+i)  &&  document.getElementById('is_optout'+i)  &&  document.getElementById('target_url'+i) ){
						//make sure the check box value is int (0/1)
						var opt_val = '0';
						if(document.getElementById('is_optout'+i).checked){opt_val =1;}
						//add values for this target entry into array of target entries
						final_list_of_targets_array[i] = document.getElementById('target_name'+i).value+"@@"+opt_val+"@@"+document.getElementById('target_url'+i).value;
					}
				}
				//assign array of target entries to hidden input, which will be used by server to process array of targets				
				document.getElementById('wiz_list_of_targets').value = final_list_of_targets_array.toString();					

				//Now lets process existing targets, get count of existing targets
				count = parseInt(document.getElementById('existing_target_count').value);
				final_list_of_existing_targets_array = new Array();
				//iterate through list of existing targets
				for(i=0;i<count;i++){
					//make sure all values exist
					if( document.getElementById('existing_target_name'+i)  &&  document.getElementById('existing_is_optout'+i)  &&  document.getElementById('existing_target_url'+i) ){
						//make sure the check box value is int (0/1)
						var opt_val = '0';
						if(document.getElementById('existing_is_optout'+i).checked){opt_val =1;}
						//add values for this target entry into array of target entries
						final_list_of_existing_targets_array[i] = document.getElementById('existing_target_id'+i).value+"@@"+document.getElementById('existing_target_name'+i).value+"@@"+opt_val+"@@"+document.getElementById('existing_target_url'+i).value;
					}
				}
				//assign array of target entries to hidden input, which will be used by server to process array of targets				
				document.getElementById('wiz_list_of_existing_targets').value = final_list_of_existing_targets_array.toString();					


			}

			/*
			*This function will populate values based on popup selection, and then call the
			*function to add the entry to the list of targets
			*/
			function set_return_prospect_list(popup_reply_data)
			{
				var form_name = popup_reply_data.form_name;
				var name_to_value_array = popup_reply_data.name_to_value_array;
				
				
				for (var the_key in name_to_value_array)
				{
					if(the_key == 'toJSON')
					{
						/* just ignore */
					}
					else
					{
						window.document.forms[form_name].elements[the_key].value = name_to_value_array[the_key];
					}
				}
				add_target('true');
			}


			</script>
			{/literal}
