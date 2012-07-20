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


{if isset($smarty.request.isDuplicate) && $smarty.request.isDuplicate eq "true"}
<input type="hidden" id="picture_duplicate" name="picture_duplicate" value="{$picture_value}"/>
{/if}

<input 
	type="file" id="picture" name="picture" 
	title="" size="30" maxlength="255" value="" tabindex="0" 
	onchange="confirm_imagefile('picture');" 
	{if !empty($picture_value)}
	style="display:none"
	{/if}
/>

{if empty($picture_value)}
{else}
<img
	id="img_picture" 
	name="img_picture" 	
	src='index.php?entryPoint=download&id={$picture_value}&type=SugarFieldImage&isTempFile=1'
	style='
		{if "$vardef.border" eq ""}
			border: 0; 
		{else}
			border: 1px solid black; 
		{/if}
		{if "$vardef.width" eq ""}
			width: auto;
		{else}
			width: {$vardef.width}px;
		{/if}
		{if "$vardef.height" eq ""}
			height: auto;
		{else}
			height: {$vardef.height} px;
		{/if}
		'	

>
<img
	id="bt_remove_picture" 
	name="bt_remvoe_picture" 
	alt=$APP.LBL_REMOVE
	title="{$APP.LBL_REMOVE}"
	src="{sugar_getimagepath file='delete_inline.gif'}"
	onclick="remove_upload_imagefile('picture');" 	
	/>

<input id="remove_imagefile_picture" name="remove_imagefile_picture" type="hidden"  value="" />
{/if}


<script type='text/javascript'>	
     function remove_upload_imagefile(field_name) {ldelim}
            var field=document.getElementById('remove_imagefile_' + field_name);
            field.value=1;            
            
            //enable the file upload button.
            var field=document.getElementById( field_name);
            field.style.display="";
            
            //hide the image and remove button.
            var field=document.getElementById('img_' + field_name);
            field.style.display="none";
            var field=document.getElementById('bt_remove_' + field_name);
            field.style.display="none";
            
            if(document.getElementById(field_name + '_duplicate')) {ldelim}
               var field = document.getElementById(field_name + '_duplicate');
               field.value = "";
            {rdelim}            
    {rdelim}
    
    function confirm_imagefile(field_name) {ldelim}
    		var field=document.getElementById(field_name); 
    		var filename=field.value;   
        	var fileExtension = filename.substring(filename.lastIndexOf(".")+1);
        	fileExtension = fileExtension.toLowerCase();
			if (fileExtension == "jpg" || fileExtension == "jpeg" 
				|| fileExtension == "gif" || fileExtension == "png" || fileExtension == "bmp"){ldelim}
					//image file
				{rdelim}
			else{ldelim}
				field.value=null;
				alert("{$APP.LBL_UPLOAD_IMAGE_FILE_INVALID}");
			{rdelim}
	{rdelim}
</script>