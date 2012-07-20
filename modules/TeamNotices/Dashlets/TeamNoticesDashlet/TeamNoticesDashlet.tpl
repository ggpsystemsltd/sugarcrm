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
{literal}
<script type="text/javascript">
<!--
	var user_notices = new Array();
	var delay = 25000
	var index = 0;
	var lastIndex = 0;
	var noticeTeamID = 1;
	var noticeTitleIndex = 1;
	var noticeBodyIndex = 2;
	var noticeURLTitleIndex = 3;
	var noticeURLIndex = 4;
	var scrollerHeight=58
	var bodyHeight = ''
	var scrollSpeed = 1;
	var curTeam = 'all';
	var scrolling = true;
    var scrollTimeOut;
    var noticeTimeOut;
	
    {/literal}{foreach name=rowIteration from=$data key=id item=rowData}{literal}
	user_notices.push(["{/literal}{$rowData.id}{literal}","{/literal}{$rowData.name}{literal}", "{/literal}{$rowData.description|regex_replace:"/\r*\n/":'<br>'}{literal}", "{/literal}{$rowData.url_title}{literal}", "{/literal}{$rowData.url}{literal}"]);
    {/literal}{/foreach}{literal}
	
	function stopNotice(){
			scrolling = false;
	}
	function startNotice(){
			scrolling = true;
	}
	function scrollNotice(){
		if(scrolling && typeof document.getElementById('NOTICEBODY') != 'undefined'){
    		var notice_body = document.getElementById('NOTICEBODY')
    		var daddy = document.getElementById('daddydiv')
            
            try{
			if(typeof notice_body != 'undefined') {
        		if(parseInt(notice_body.style.top) > bodyHeight *-1 ){
            		notice_body.style.top = (parseInt(notice_body.style.top) - scrollSpeed) + 'px';
            	}else{
            		notice_body.style.top =scrollerHeight + "px"	
            	}
            }
            } catch (e)
            {
				scrolling = false;
			}
		}
    	    noticeTimeOut = setTimeout("scrollNotice()", 100);
	}
	function nextNotice(){
        
		if(scrolling){
			if(user_notices.length > 0){
				if(index >= user_notices.length	){
					index = 0;	
				}
				var notice_body = document.getElementById('NOTICEBODY');
				if(curTeam != 'all'){
					notice_body.innerHTML = '<p><b>' +  user_notices[index][noticeTitleIndex] + '</b><br>' + user_notices[index][noticeBodyIndex] +'<br><a href="' + user_notices[index][noticeURLIndex]+ '" target="_blank">'+user_notices[index][noticeURLTitleIndex]+'</a></p>';
				}else{
					
					for(var i = 0; i < user_notices.length; i++){
					notice_body.innerHTML += '<p><b>' +  user_notices[i][noticeTitleIndex] + '</b><br>' + user_notices[i][noticeBodyIndex] +'<br><a href="' + user_notices[i][noticeURLIndex]+ '" target="_blank">'+user_notices[i][noticeURLTitleIndex]+'</a></p>';
					}
					
					}
				notice_body.style.top = scrollerHeight/2 +'px'
				bodyHeight= parseInt(notice_body.offsetHeight);
				
				
				index++;
				}
				if(curTeam != 'all'){
					
					
				scrollTimeOut = setTimeout("nextNotice()", delay);
				}
				
		}
	}
-->
</script>
{/literal}
<table  border="0" cellpadding="0" cellspacing="0" width='100%' >
<tr>
<td colspan='1' valign='top' height='50px' class="teamNoticeBox">

<div id='daddydiv' style="position:relative;width=100%;height:50px;overflow:hidden" onmouseover="stopNotice();" onmouseout="startNotice();">
<table width="100%" cellspacing="0" cellpadding="0" border="0" height="30">
<tr>
    <td height="30" class="teamNoticeText"><div id='NOTICEBODY' style="position:absolute;left:0px;top:0px;width:100%;z-index: 1;"></div></td>
</tr>
</table>
</div></td>
</tr>

</table>
{literal}
<script type="text/javascript">

    YAHOO.util.Event.onDOMReady(function(){

        clearTimeout(scrollTimeOut);    // clear any previous timeouts
        clearTimeout(noticeTimeOut);

        nextNotice(); scrollNotice();   // these will set new timeouts 

   });
    
</script>
{/literal}

