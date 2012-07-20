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


<script>
{literal}
if(typeof InvadersGame == 'undefined') { 
	InvadersGame = function() {
		var playerX, move, timer, rate, shotX, shotY, started, shotFired, alienX, alienY, aMove;
		var rightRowsCleared, leftRowsCleared, bottomRow;
	    return {
	    	init: function() {
	    		//alert("initilized");
	    		InvadersGame.rate = 30;
	    		document.onkeydown = InvadersGame.keyDown;
 				document.onkeyup = InvadersGame.keyUp;
 				clearTimeout(InvadersGame.timer);
 				InvadersGame.timer = setTimeout("InvadersGame.update()",InvadersGame.rate);
 				InvadersGame.started = false;
 				InvadersGame.shotFired = false;
 				InvadersGame.level = 1;
	    	},
	    	moveLeft: function(frameTime) {
		    	InvadersGame.playerX = InvadersGame.playerX + (5 * frameTime);
	    	},
	    	moveRight: function(frameTime) {
	    		InvadersGame.playerX = InvadersGame.playerX - (5 * frameTime);
	    	},
	    	checkLoss: function() {
	    	    if (InvadersGame.alienY + (InvadersGame.bottomRow * 16) > 250) {
	    	        InvadersGame.init();
	    	        var startScreen = document.getElementById("startScreen");
                    startScreen.style.display = "block";
                    var messageText = document.getElementById("messageText");
                    messageText.innerHTML = {/literal}"{$dashletStrings.LBL_GAME_OVER}"{literal};
	    	    }
	    	},
	    	keyDown: function(keyEvents) {
	    		var key = (window.event) ? event.keyCode : keyEvents.keyCode;
	    		if (InvadersGame.started) {
	    			if (key == 65){ //'a' key
	    				InvadersGame.move = -1;
	    			}
	    			if (key == 68){ //'d' key
	    				InvadersGame.move = 1;
	    			}
	    			if (key == 83){ //'s' key
	    				InvadersGame.shoot();
	    			}
	    			if (key == 82){ //'s' key
	    				InvadersGame.reset();
	    			}
	    		}
	    	},
	    	keyUp: function(keyEvents) {
	    		var key = (window.event) ? event.keyCode : keyEvents.keyCode;
	    		if (key == 65 || key == 68){
	    			InvadersGame.move = 0;
	    		}
	    	},
	    	reset: function() {
	    		InvadersGame.started = true;
	    		InvadersGame.lastFrame = new Date().getTime();
	    		var startScreen = document.getElementById("startScreen");
	    		startScreen.style.display = "none";
    			var aliensTable = document.getElementById("aliens");
 				var aliens = aliensTable.getElementsByTagName("td");
 				var shot = document.getElementById("shot");
 				shot.style.display = "none";
 				var i=0;
 				for(i=0; i < aliens.length; i++) {
 					aliens[i].style.backgroundImage = "url('modules/Home/Dashlets/InvadersDashlet/sprites/alien.png')"
 				}
 				InvadersGame.playerX = 134;
	    		InvadersGame.move = 0;
	    		InvadersGame.aMove = (3 + InvadersGame.level) / 4;
	    		InvadersGame.alienX = 0;
	    		InvadersGame.alienY = 0;
	    		InvadersGame.shoty = 250;
	    		InvadersGame.shotFired = false;
	    		InvadersGame.rightRowsCleared = 0;
	    		InvadersGame.leftRowsCleared = 0;
	    		InvadersGame.bottomRow = 3;
	    		aliensTable.style.left = InvadersGame.alienX;
	    		aliensTable.style.top  = InvadersGame.alienY;
	    		clearTimeout(InvadersGame.timer);
	    		InvadersGame.timer = setTimeout("InvadersGame.update()",InvadersGame.rate);
	    	},
	    	shoot: function() {
	    		if (!InvadersGame.shotFired) {
	    		 	InvadersGame.shotX = InvadersGame.playerX;
	    		 	InvadersGame.shotY = 250;
	    		 	InvadersGame.shotFired = true;
	    		 	var shot = document.getElementById("shot");
	    		 	shot.style.left = InvadersGame.playerX + 8 + "px";
	    		 	shot.style.top = 250 + "px";
	    		 	shot.style.display = "inline";
    		 	}
	    	},
	    	update: function() {
	    	  var time = new Date().getTime();
              var frameTime = (time - InvadersGame.lastFrame) / InvadersGame.rate;
              if (frameTime == 0) frameTime = 1;
              InvadersGame.lastFrame = time;
	    		if (InvadersGame.started) {
		    		if (InvadersGame.move < 0 && InvadersGame.playerX > 0) {
		    			InvadersGame.moveRight(frameTime);
		    		}
		    		if (InvadersGame.move > 0 && InvadersGame.playerX < 368) {
		    			InvadersGame.moveLeft(frameTime);
		    		}
		    		InvadersGame.alienX += InvadersGame.aMove * frameTime;
		    		if (InvadersGame.aMove > 0 && InvadersGame.alienX > (225 + InvadersGame.rightRowsCleared)) {
	    				InvadersGame.aMove = -(3 + InvadersGame.level) / (4);
	    				InvadersGame.alienY += 16;
	    				InvadersGame.checkLoss();
		    		}
		    		else if (InvadersGame.alienX < (0 - InvadersGame.leftRowsCleared) && InvadersGame.aMove < 0) {
	    		        InvadersGame.aMove = (3 + InvadersGame.level) / (4);
	    				InvadersGame.alienY += 16;
	    				InvadersGame.checkLoss();
		    		}

		    		var player = document.getElementById("player");
		    		var shot = document.getElementById("shot");
		    		var aliens = document.getElementById("aliens");
		    		
		    		if (InvadersGame.shotY < 8){
		    			InvadersGame.shotY = 235;
		    			InvadersGame.shotFired = false;
		    			shot.style.display = "none";
		    		}
		    		if (InvadersGame.shotFired) {
		    			InvadersGame.shotY -= 5;
		    			shot.style.top = InvadersGame.shotY + "px";
		    		}
		    		player.style.left = InvadersGame.playerX + "px";
		    		aliens.style.left = InvadersGame.alienX + "px";
		    		aliens.style.top = InvadersGame.alienY + "px";
		    		if(InvadersGame.shotFired) {
		    			InvadersGame.checkCollide(shot, aliens);
		    		}
	    		}
	    		InvadersGame.timer = setTimeout("InvadersGame.update()", InvadersGame.rate);
	    	},
	    	nextLevel: function() {
	    	  InvadersGame.started = false;
	    	  var startScreen = document.getElementById("startScreen");
              startScreen.style.display = "block";
              InvadersGame.level++;
              var messageText = document.getElementById("messageText");
              messageText.innerHTML = "Level " + InvadersGame.level;
              clearTimeout(InvadersGame.timer);
              InvadersGame.timer = setTimeout("InvadersGame.reset()",5000);
	    	},
	    	checkCollide: function(shot, aliens) {
	    		var sx = InvadersGame.shotX + 8;
	    		var sy = InvadersGame.shotY;
	    		var ax = InvadersGame.alienX;
	    		var ay = InvadersGame.alienY;
	    		var cx = Math.floor((sx - ax) / 34);
	    		var cy = Math.floor((sy - ay) / 16);
	    		if (cx > -1 && cx < 5 && cy > -1 && cy < 4) {
	    			var dAlien = document.getElementById("a" + cx + cy);
	    			if (!(dAlien.style.backgroundImage == "none")) {
	    			    //Collision occured
	    				dAlien.style.backgroundImage = "none";
	    				InvadersGame.shotFired = false;
	    				shot.style.display = "none";
	    				var aliens = document.getElementById("aliens").getElementsByTagName("td");
	    				var i = 0;
	    				var col = 0;
	    				var row = 0;
	    				var count = new Array(5);
	    				var rows = new Array(5);
	    				for (i = 0; i < count.length; i++) {
	    					count[i] = 0;
	    					rows[i] = 0;
	    				}
	    				for (i = 0; i < aliens.length; i++) {
	    					col = i % 5;
	    					row = Math.floor(i / 5);
	    					if (aliens[i].style.backgroundImage != "none") {
	    						count[col]++;
	    					    rows[row]++;
	    					}
	    				}
	    				if (count[0] == 0) {
    					  if (count[1] == 0) {
	    				    if (count[2] == 0) {
	    				      if (count[3] == 0) {
	    				        if (count[4] == 0) { InvadersGame.nextLevel();} 
	    				            else {InvadersGame.leftRowsCleared = 32 * 4;}	
	    					  } else {InvadersGame.leftRowsCleared = 32 * 3;}
	    				    } else {InvadersGame.leftRowsCleared = 32 * 2;}
	    				  } else {InvadersGame.leftRowsCleared = 32;}
	    				} else {InvadersGame.leftRowsCleared = 0;}
	    				
	    				if (count[4] == 0) {
    					  if (count[3] == 0) {
	    				    if (count[2] == 0) {
	    				      if (count[1] == 0) {
	    				        if (count[0] == 0) {InvadersGame.rightRowsCleared = 32 * 5;
	    				        } else {InvadersGame.rightRowsCleared = 32 * 4;}	
	    					  } else {InvadersGame.rightRowsCleared = 32 * 3; }
	    				    } else {InvadersGame.rightRowsCleared = 32 * 2;}
	    				  } else { InvadersGame.rightRowsCleared = 32;}
	    				} else {InvadersGame.rightRowsCleared = 0;}
	    			
	    				for (i = 0; i < 4 ; i++) {
	    				   if (rows[i] > 0) {
	    				       InvadersGame.bottomRow = i;
	    				   }
	    				}
	    				
	    			}
	    		}
	    	}	
		};
	}();
}
InvadersGame.init();

</script>{/literal}