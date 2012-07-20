<!--
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
 * Header: /cvsroot/sugarcrm/sugarcrm/modules/Products/ListView.html,v 1.4 2004/07/02 07:02:27 sugarclint Exp {APP.LBL_LIST_CURRENCY_SYM}
 ********************************************************************************/
-->

<body style="margin: 0px;">
<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
global $theme;

insert_popup_header($theme);

$sugarteam = array( 'Julian Ostrow', 'Lam Huynh', 'Majed Itani', 'Joey Parsons', 'Ajay Gupta', 'Jason Nassi', 'Andy Dreisch', 'Roger Smith', 'Liliya Bederov', 'Sadek Baroudi', 'Franklin Liu', 'Jennifer Yim', 'Sujata Pamidi', 'Eddy Ramirez', 'Jenny Gonsalves', 'Collin Lee', 'David Wheeler', 'John Mertic', 'Ran Zhou', 'Shine Ye','Emily Gan','Randy Lee','Eric Yang','Oliver Yang','Andreas Sandberg');
switch($_REQUEST['style']){
	case 'rev':
			$sugarteam = array_map('strrev', $sugarteam);
			break;
	case 'rand':
			shuffle($sugarteam);
			break;
	case 'dec':
			$sugarteam = array_reverse($sugarteam);
			break;
	case 'sort':
			 sort($sugarteam);
			 break;
	case 'rsort':
			 rsort($sugarteam);
			 break;
			 
}

$founders = array("<b>Founders:</b>", 'John Roberts', 'Clint Oram', 'Jacob Taylor');

$body =  implode('<br>', $founders) . "<br><br><b>Developers:</b><br>" . implode('<br>', $sugarteam);
?>
<script>
	var user_notices = new Array();
	var delay = 25000
	var index = 0;
	var lastIndex = 0;
	var scrollerHeight=200
	var bodyHeight = ''
	var scrollSpeed = 1;
	var curTeam = 'all';
	var scrolling = true;


	


	function stopNotice(){
			scrolling = false;
	}
	function startNotice(){
			scrolling = true;
	}
	function scrollNotice(){

		if(scrolling){
		
		var body = document.getElementById('NOTICEBODY')
		var daddy = document.getElementById('daddydiv')

		if(parseInt(body.style.top) > bodyHeight *-1 ){

			body.style.top = (parseInt(body.style.top) - scrollSpeed) + 'px';

		}else{
			
			body.style.top =scrollerHeight + "px"
		}
		}

		setTimeout("scrollNotice()", 50);

	}
	function nextNotice(){



		body = document.getElementById('NOTICEBODY');
		if(scrolling){
				body.style.top = scrollerHeight/2 +'px'
				bodyHeight= parseInt(body.offsetHeight);
		}
				

		}
	


</script>
<div style="width: 300px; height: 400px; text-align: center; border:0; padding: 5px;">
<div id='daddydiv' style="position:relative;width=100%;height:350px;overflow:hidden">
<div id='NOTICEBODY' style="position:absolute;left:0px;top:0px;width:100%;z-index: 1; text-align: left;">
<?php echo $body; ?>
</div>
</div>
<script>
if(window.addEventListener){
	window.addEventListener("load", nextNotice, false);
	window.addEventListener("load", scrollNotice, false);
}else{
	window.attachEvent("onload", nextNotice);
	window.attachEvent("onload", scrollNotice);
}
</script>


