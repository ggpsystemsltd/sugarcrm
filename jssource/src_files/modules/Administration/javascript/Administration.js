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

// defense
if(typeof(SUGAR) == 'undefined') {
	var SUGAR = {};
}

SUGAR.Administration = {
	/**
	 * calls modules/Administration/Async.php with JSON objects
	 */
	Async : {
	},

	/**
	 * Utility functions for RepairXSS screen
	 * @param HTMLSelectObject select dropdown
	 */
	RepairXSS : {
		toRepair : new Object, // assoc array of items to be cleaned
		currentRepairObject : "", // bean currently worked on
		currentRepairIds : new Array(), // array of ids for above bean
		repairedCount : 0,
		numberToFix: 25, // how many IDs to send at once from client

		/**
		 * Calculates how many rows to iterate through
		 */
		refreshEstimate : function(select) {
			this.toRepair = new Object();
			this.repairedCount = 0;

			var button = document.getElementById('repairXssButton');
			var selected = select.value;
			var totalDisplay = document.getElementById('repairXssDisplay');
			var counter = document.getElementById('repairXssCount');
			var repaired = document.getElementById('repairXssResults');
			var repairedCounter = document.getElementById('repairXssResultCount');

			if(selected != "0") {
				button.style.display = 'inline';
				repairedCounter.value = 0;
				AjaxObject.startRequest(callbackRepairXssRefreshEstimate, "&adminAction=refreshEstimate&bean=" + selected);
			} else {
				button.style.display = 'none';
				totalDisplay.style.display = 'none';
				repaired.style.display = 'none';
				counter.value = 0;
				repaired.value= 0;
			}
		},

		/**
		 * Takes selection and executes repair function
		 */
		executeRepair : function() {
			if(this.toRepair) {
				// if queue is empty load next
				if(this.currentRepairIds.length < 1) {
					if(!this.loadRepairQueue()) {
						alert(done);
						return; // we're done
					}
				}

				var beanIds = new Array();

				for(var i=0; i<this.numberToFix; i++) {
					if(this.currentRepairIds.length > 0) {
						beanIds.push(this.currentRepairIds.pop());
					}
				}

				var beanId = YAHOO.lang.JSON.stringify(beanIds);
				AjaxObject.startRequest(callbackRepairXssExecute, "&adminAction=repairXssExecute&bean=" + this.currentRepairObject + "&id=" + beanId);
			}
		},

		/**
		 * Loads the bean name and array of bean ids for repair
		 * @return bool False if load did not occur
		 */
		loadRepairQueue : function() {
			var loaded = false;

			this.currentRepairObject = '';
			this.currentRepairIds = new Array();

			for(var bean in this.toRepair) {
				if(this.toRepair[bean].length > 0) {
					this.currentRepairObject = bean;
					this.currentRepairIds = this.toRepair[bean];
					loaded = true;
				}
			}

			// 'unset' the IDs array so we don't iterate over it again
			this.toRepair[this.currentRepairObject] = new Array();

			return loaded;
		}
	}
}