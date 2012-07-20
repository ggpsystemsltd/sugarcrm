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

SUGAR.grid = function() {

	// totalRowsInGrid: keeps track of how many rows have been added to the grid.
	// It is used for purposes of indexing new rows in the grid.
	var totalRowsInGrid = 0;

	var selectedRows = new Array();
	var indentedRows = new Array();
	var copyRows = new Array();
	var cutRows = new Array();

	var predecessors = new Array();
	var dependents = new Array();

	var isMouseDown = false;
	var calendar_dateformat;
	var bg_color;
	var gridName;
	var imagePathProjectMinus;
	var imagePathProjectPlus;
	var headerCols = new Array();
	var resourceOptionsString = "";
	var durationUnitsOptionsString = "";
	var optionalHidden = false;
	var isProjectTemplate = true;
	var currentUser;
	var owner;

	var dependencyCheckRow = 0;
	var dependencyCheckFail = 0;

	var weekendDays = new Array(0,6);
	var workDayStartTime = 9;
	var workDayFinishTime = 17;
	var workDayHours = 8;
	var resourceHolidays = new Array();
	var resourceType = new Array();

    var startingWidth = 0;
    var startingX = 0;
    var currentX = 0;
    var colObj = null;

    var isLoaded = false;

    var columnModel = [{}, {maxLength: 10}, {maxLength: 50}, {}, {}, {}, {}, {}, {}, {}];

	return {
		clickedRow: function(taskId, event) {
			if (!event)
				event = window.event;
			if (event.shiftKey && selectedRows.length > 0) {
				if (SUGAR.grid.getActualRow(taskId) > SUGAR.grid.getActualRow(selectedRows[selectedRows.length - 1])) {
					for (var i = SUGAR.grid.getActualRow(selectedRows[selectedRows.length - 1]) + 1; i <= SUGAR.grid.getActualRow(taskId); i++)
						SUGAR.grid.toggleSelectRow(SUGAR.grid.getMappedRow(i));
				}
				else {
					for (var i = SUGAR.grid.getActualRow(selectedRows[selectedRows.length - 1]) - 1; i >=SUGAR.grid.getActualRow(taskId) ; i--)
						SUGAR.grid.toggleSelectRow(SUGAR.grid.getMappedRow(i));
				}
			}
			else if (event.ctrlKey) {
				SUGAR.grid.toggleSelectRow(taskId);
			}
			else {
				while(selectedRows.length > 0){
					SUGAR.grid.toggleSelectRow(selectedRows[0]);
				}
				SUGAR.grid.toggleSelectRow(taskId);
			}
		},

		checkMouseDown: function(taskId)
		{
			if (isMouseDown) {
				SUGAR.grid.toggleSelectRow(taskId);
			}
		},

		/**
		 * setMouseDown: this function is called by the onMouseDown event on the ID column of the grid.
		 */
		setMouseDown: function()
		{
			isMouseDown = true;
		},


		/**
		 * setMouseUp: this function is called by the onMouseUp event on the ID column of the grid.
		 */
		setMouseUp: function()
		{
			isMouseDown = false;
		},

		/**
		 * toggle: this function is used to toggle the task name field
		 * to be an input field (on double-click) for entering data or just a cell.
		 */
		toggle: function(div, input, divlink)
		{
			// Don't do anything if we're already showing an input field
			if (document.getElementById(divlink).style.display == 'none')
				return;
			toggleDisplay(div);
			if (document.getElementById(div).style.display != 'none')
				document.getElementById(input).focus();
			if (document.getElementById(divlink).style.display != 'none')
				document.getElementById(divlink).innerHTML = document.getElementById(input).value;
		},

		/**
		 * blurEvent: this function is used to toggle the task name field
		 * after a value has been entered in the input field.
		 */
		blurEvent: function(row, div, input, divlink)
		{
			toggleDisplay(div);

			if (document.getElementById(divlink).style.display != 'none') {
				//if (document.getElementById(input).value == "") {
					divlinkVal = document.getElementById(divlink).innerHTML;
					if (divlinkVal.search("Minus.gif") != -1) {
						document.getElementById(divlink).innerHTML =
						"<img src='" + imagePathProjectMinus + "' onClick='javascript:SUGAR.grid.expandCollapseRow("+ row +")'>&nbsp;" +
						"<b>" + document.getElementById(input).value + "</b>";
					}
					else if (divlinkVal.search("Plus.gif") != -1) {
						document.getElementById(divlink).innerHTML =
						"<img src='" + imagePathProjectPlus + "' onClick='javascript:SUGAR.grid.expandCollapseRow("+ row +")'>&nbsp;" +
						"<b>" + document.getElementById(input).value + "</b>";
					}
					else {
						document.getElementById(divlink).innerHTML = document.getElementById(input).value;
						document.getElementById("description_divlink_input_" + row).value = document.getElementById(input).value;
					}
				//}
				//else
					//document.getElementById(divlink).innerHTML = '&nbsp;';

				SUGAR.grid.indentRow(row, true);
			}

		},

		/**
		 * copyRow: this function is called when the "Copy" button or "Copy" right-mouse
		 * link is clicked.  It copies all the selected rows by adding them to the copyRows array.
		 */
		copyRow: function()
		{
			if (selectedRows.length == 0)
				return;

			// Clear out copyRows
			copyRows = new Array();

			// Clear out cutRows
			cutRows = new Array();
			selectedRows.sort(SUGAR.grid.sortNumber);
			while (selectedRows.length != 0) {
				var row = selectedRows[0];
				copyRows.push(row);
				SUGAR.grid.unSelectRow(row);
			}
		},

		/**
		 * pasteRow: this function is called when the "Paste" button or "Paste" right-mouse
		 * link is clicked.  It pastes values from the copied rows into the destination rows.
		 */
		pasteRow: function()
		{
			var insertAtRow;
			var table = document.getElementById(gridName);

			if (selectedRows.length == 0)
				insertAtRow = table.rows.length;
			else
				insertAtRow = SUGAR.grid.getActualRow(selectedRows[0]);
			while (copyRows.length > 0) {
				// Insert blank rows before we can copy the data over.
				SUGAR.grid.insertRow(insertAtRow);
				var mappedRow = SUGAR.grid.getMappedRow(insertAtRow);

				document.getElementById("percent_complete_" + mappedRow).value =
					document.getElementById("percent_complete_" + copyRows[copyRows.length - 1]).value;
				document.getElementById("duration_" + mappedRow).value =
					document.getElementById("duration_" + copyRows[copyRows.length - 1]).value;
				document.getElementById("duration_unit_" + mappedRow).value =
					document.getElementById("duration_unit_" + copyRows[copyRows.length - 1]).value;


				document.getElementById("description_" + mappedRow).value =
					document.getElementById("description_" + copyRows[copyRows.length - 1]).value;

				document.getElementById("description_" + mappedRow + "_divlink").innerHTML =
					document.getElementById("description_" + copyRows[copyRows.length - 1]).value;

				document.getElementById("description_divlink_input_" + mappedRow).value =
					document.getElementById("description_" + copyRows[copyRows.length - 1]).value;

				document.getElementById("date_start_" + mappedRow).value =
					document.getElementById("date_start_" + copyRows[copyRows.length - 1]).value;
				document.getElementById("date_finish_" + mappedRow).value =
					document.getElementById("date_finish_" + copyRows[copyRows.length - 1]).value;
				document.getElementById("resource_" + mappedRow).value =
					document.getElementById("resource_" + copyRows[copyRows.length - 1]).value;

				SUGAR.grid.indentRow(mappedRow, true);
				copyRows.splice(copyRows.length - 1, 1);
				SUGAR.gantt.changeTask(mappedRow);
			}

			while (cutRows.length > 0) {
				// Insert blank rows before we can copy the data over.
				SUGAR.grid.insertRow(insertAtRow);
				var mappedRow = SUGAR.grid.getMappedRow(insertAtRow);
				document.getElementById("percent_complete_" + mappedRow).value =
					cutRows[0].percent_complete;
				document.getElementById("duration_" + mappedRow).value =
					cutRows[0].duration;
				document.getElementById("duration_unit_" + mappedRow).value =
					cutRows[0].duration_unit;

				document.getElementById("description_" + mappedRow).value =
					cutRows[0].description;

				document.getElementById("description_" + mappedRow + "_divlink").innerHTML =
					cutRows[0].description;

				document.getElementById("description_divlink_input_" + mappedRow).value =
					cutRows[0].description;

				document.getElementById("date_start_" + mappedRow).value =
					cutRows[0].date_start;
				document.getElementById("date_finish_" + mappedRow).value =
					cutRows[0].date_finish;
				document.getElementById("resource_" + mappedRow).value =
					cutRows[0].resource;

				SUGAR.grid.indentRow(mappedRow, true);
				cutRows.splice(0, 1);
				SUGAR.gantt.changeTask(mappedRow);
			}
		},


		/**
		 * deleteRows: this function is called by the "Delete" action in the UI.
		 * If a selected task has sub-tasks, the user is prompted with a confirmation
		 * dialog alerting them to the fact that all the sub-tasks of that task will be deleted as well.
		 */
		deleteRows: function()
		{
			if (selectedRows.length == 0)
				return;
			selectedRows.sort(SUGAR.grid.sortNumber);
			while (selectedRows.length != 0) {
				var row = selectedRows[0];
				var allChildren = new Array();
				SUGAR.grid.getChildren(row, allChildren);
				if (allChildren.length > 0) {
					if (confirm(SUGAR.language.get('Project', 'NTC_DELETE_TASK_AND_SUBTASKS'))) {
						//for (var i = 0; i < allChildren.length; i++)
						for (var i = (allChildren.length - 1); i >= 0; i--)
							SUGAR.grid.deleteRow(allChildren[i]);
						SUGAR.grid.deleteRow(row);
					}
					else
						return;
				}
				else
					SUGAR.grid.deleteRow(row);
			}
		},

		/**
		 * cutRow: this function is called by the "Cut" action in the UI. Copies of the cut objects
		 * are made and stored in the cutRows array.
		 */
		cutRow: function()
		{
			if (selectedRows.length == 0)
				return;
			selectedRows.sort(SUGAR.grid.sortNumber);

			// Clear out copyRows
			copyRows = new Array();

			while (selectedRows.length != 0) {
				var row = selectedRows[0];
				var allChildren = new Array();
				SUGAR.grid.getChildren(row, allChildren);
				if (allChildren.length > 0) {
					if (confirm(SUGAR.language.get('Project', 'NTC_DELETE_TASK_AND_SUBTASKS'))) {
						for (var i = (allChildren.length - 1); i >= 0; i--) {
							var cutObj = new Object();
							cutObj.percent_complete = document.getElementById("percent_complete_" + allChildren[i]).value;
							cutObj.duration = document.getElementById("duration_" + allChildren[i]).value;
							cutObj.duration_unit = document.getElementById("duration_unit_" + allChildren[i]).value;
							cutObj.description = document.getElementById("description_" + allChildren[i]).value;
							cutObj.date_start = document.getElementById("date_start_" + allChildren[i]).value;
							cutObj.date_finish = document.getElementById("date_finish_" + allChildren[i]).value;
							cutObj.resource = document.getElementById("resource_" + allChildren[i]).value;
							cutRows.push(cutObj);
							SUGAR.grid.deleteRow(allChildren[i]);
						}
						var cutObj = new Object();
						cutObj.percent_complete = document.getElementById("percent_complete_" + row).value;
						cutObj.duration = document.getElementById("duration_" + row).value;
						cutObj.duration_unit = document.getElementById("duration_unit_" + row).value;
						cutObj.description = document.getElementById("description_" + row).value;
						cutObj.date_start = document.getElementById("date_start_" + row).value;
						cutObj.date_finish = document.getElementById("date_finish_" + row).value;
						cutObj.resource = document.getElementById("resource_" + row).value;
						cutRows.push(cutObj);
						SUGAR.grid.deleteRow(row);
					}
					else
						return;
				}
				else {
					var cutObj = new Object();
					cutObj.percent_complete = document.getElementById("percent_complete_" + row).value;
					cutObj.duration = document.getElementById("duration_" + row).value;
					cutObj.duration_unit = document.getElementById("duration_unit_" + row).value;
					cutObj.description = document.getElementById("description_" + row).value;
					cutObj.date_start = document.getElementById("date_start_" + row).value;
					cutObj.date_finish = document.getElementById("date_finish_" + row).value;
					cutObj.resource = document.getElementById("resource_" + row).value;
					cutRows.push(cutObj);
					SUGAR.grid.deleteRow(row);
				}
			}
		},


		/**
		 * deleteRow: this helper function is called by "deleteRows()" to actually delete the
		 * specified row and update predecessor relationships affected by the deletion.
		 */
		deleteRow: function(row)
		{
			var table = document.getElementById(gridName);
			var rowNum = SUGAR.grid.getActualRow(row);
			var atRow = row;
			// Get the ancestors for this row right now so we can update them after we delete this row.
			var allAncestors = new Array();
			var ancestorLevels = 0;
			var ancestorObj = SUGAR.grid.getAncestors(row, allAncestors, ancestorLevels);
			ancestorLevels = ancestorObj.ancestorLevels;
			allAncestors = ancestorObj.allAncestors;

			for (var i = 1; i < predecessors.length; i++) {
				if (predecessors[i] && predecessors[i].length > 0) {
					for (var j = 0; j < predecessors[i].length; j++) {
						if (SUGAR.grid.getActualRow(predecessors[i][j]) >= rowNum) {
							SUGAR.grid.updateRowWithPredecessorAtIndex(i, j, 'delete', rowNum);
						}
					}
					SUGAR.grid.cleanupPredecessorRow(i); //removes extra commas as a result of the predecessor row being deleted.
					//SUGAR.grid.updatePredecessorsAndDependents(i);
				}
			}

			predecessors[row] = new Array();
			dependents[row] = new Array();

			//Update all the row mappings
			for (var i = 1; i <= totalRowsInGrid; i++) {
				if (SUGAR.grid.getActualRow(i)!=-1 && SUGAR.grid.getActualRow(i) >= rowNum) {
					var newVal = parseInt(document.getElementById("mapped_row_" + i).value) - 1;
					document.getElementById("mapped_row_" + i).value = newVal;
					document.getElementById("id_" + i + "_divlink").innerHTML = newVal;
					SUGAR.gantt.updateGanttRowMappings(i, newVal);
				}
			}

			for (var i = 1; i < predecessors.length; i++) {
				if (predecessors[i] && predecessors[i].length > 0) {
					SUGAR.grid.updatePredecessorsAndDependents(i);
				}
			}
			// Add the id of this element to the list of deleted rows.
			if (document.getElementById('obj_id_' + atRow).value != "") {
				document.getElementById('deletedRows').value += document.getElementById('obj_id_' + atRow).value + ",";
			}

			if (indentedRows[atRow])
				indentedRows[atRow] = null;
			SUGAR.grid.unSelectRow(atRow);
			table.deleteRow(rowNum);
			SUGAR.gantt.deleteGanttRow(rowNum);

			SUGAR.grid.updateAncestorsTimeData(null, allAncestors);
			SUGAR.grid.updateAncestorsPercentComplete(null, allAncestors);
		},

		/**
		 * insertRow: this helper function is called to insert a blank row into the grid at the
		 * specified position.
		 */
		insertRow: function(atRow)
		{
			totalRowsInGrid++;
			var table = document.getElementById(gridName);
			var numRows = totalRowsInGrid;
			var rowNum;

			isAtEndOfGrid = true;
			if (selectedRows.length == 0 && !atRow) { // If no rows have been selected, add it to the end
				rowNum = table.rows.length;
			}
			else if (atRow >= 0) {
				rowNum = atRow;
				atRow = SUGAR.grid.getMappedRow(atRow);
				isAtEndOfGrid = false;
			}
			else {
				atRow = selectedRows.sort(SUGAR.grid.sortNumber)[0];
				rowNum = SUGAR.grid.getActualRow(atRow);
				if (rowNum == 0)
					rowNum = 1;
				isAtEndOfGrid = false;
			}

			var row;
			row = table.insertRow(rowNum);

			row.setAttribute('id', 'project_task_row_' + numRows );
			row.setAttribute('height', 23);

			var cell = row.insertCell(0);
			cell.style.backgroundColor = bg_color;
			cell.style.cursor = "default";
			cell.setAttribute('align', 'center');
			//cell.onclick = function() {SUGAR.grid.toggleSelectRow(numRows);};
			cell.onclick = function(event) {SUGAR.grid.clickedRow(numRows, event);};

			cell.innerHTML =
				"<div id='id_" + numRows + "_divlink' style='display:inline;'>" + rowNum + "</div>" +
				"<input type='hidden' name='mapped_row_" + numRows + "' id='mapped_row_" + numRows + "' value='"+ rowNum + "'>" +
				"<input type='hidden' name='parent_" + numRows + "' id='parent_" + numRows + "'>" +
				"<input type='hidden' name='obj_id_" + numRows + "'  id='obj_id_" + numRows + "'>" +
				"<input type='hidden' name='is_milestone_" + numRows + "' id='is_milestone_" + numRows + "'>" +
				"<input type='hidden' name='time_start_" + numRows + "' id='time_start_" + numRows + "'>" +
				"<input type='hidden' name='time_finish_" + numRows + "' id='time_finish_" + numRows + "'>" ;


			cell = row.insertCell(1);
			cell.innerHTML = "<input type=text size=3 style='border:0' name='percent_complete_" + numRows + "' id='percent_complete_" + numRows + "'" +
					" value=0 onBlur='if (SUGAR.grid.validatePercentComplete(this)){ " +
						"SUGAR.grid.updateAncestorsPercentComplete(" + numRows + ");" +
						" SUGAR.gantt.changeTask(" + numRows + ");}'>";

			cell = row.insertCell(2);
			cell.ondblclick = function(){SUGAR.grid.toggle("description_" + numRows + "_div", "description_" + numRows, "description_" + numRows + "_divlink");};

			cell.innerHTML =
				"<div id='description_" + numRows + "_div' style='display:none;'> " +
				"<input type=text style='border:0'  size=40 name=description_" + numRows + "  id=description_" + numRows +
				" onblur='SUGAR.grid.blurEvent(" + numRows + ", \"description_" + numRows + "_div\",\"description_" + numRows + "\", \"description_" + numRows + "_divlink\");'> " +
				"<input type='hidden' name='description_divlink_input_" + numRows + "' id='description_divlink_input_" + numRows + "'>" +
				"</div> " +
				"<div id='description_" + numRows + "_divlink' style='display:inline;'>&nbsp;</div>";

			cell = row.insertCell(3);
			cell.innerHTML =
				"<input type=text  style='border:0' size=3 name=duration_" + numRows + " id=duration_" + numRows +
					" value=0 onBlur='if (SUGAR.grid.validateDuration(this)){ " +
					"SUGAR.grid.calculateEndDate(document.getElementById(\"date_start_" + numRows + "\").value, this.value, " + numRows + ");" +
					" SUGAR.grid.updateAllDependentsAfterDateChanges(" + numRows + ");" +
					" SUGAR.gantt.changeTask(" + numRows + ");}'>";

			cell = row.insertCell(4);
			cell.innerHTML =
				"<input type='hidden' name='duration_unit_hidden_" + numRows + "' id='duration_unit_hidden_" + numRows + "'>" +
				"<select  style='border:0' name=duration_unit_" + numRows + " id=duration_unit_" + numRows + " onChange='SUGAR.grid.changeDurationUnits("+ numRows + ")'>" +
				durationUnitsOptionsString + "</select>";

			cell = row.insertCell(5);
			cell.innerHTML =
				"<input name='date_start_" + numRows + "' id='date_start_" + numRows + "' style='border:0' onchange='parseDate(this, \"" + calendar_dateformat + "\"); SUGAR.grid.processStartDate(this, \"" + numRows + "\");' " +
					" type='text' tabindex='2' size='11' maxlength='10' value=''>";

			cell = row.insertCell(6);
			cell.innerHTML =
				"<input name='date_finish_" + numRows + "' id='date_finish_" + numRows + "' style='border:0' onchange='parseDate(this, \"" + calendar_dateformat + "\"); SUGAR.grid.processFinishDate(this, \"" + numRows + "\");' " +
					" type='text' tabindex='2' size='11' maxlength='10' value=''>";

			var startDateObj = SUGAR.grid.getNextValidDate(new Date());
			var startDate = SUGAR.grid.getDisplayDate(startDateObj.date);
			document.getElementById('date_start_' + numRows).value = startDate;
			document.getElementById('date_finish_' + numRows).value = startDate;
			document.getElementById('time_start_' + numRows).value = workDayStartTime;
			document.getElementById('time_finish_' + numRows).value = workDayFinishTime;
			document.getElementById('duration_' + numRows).value = "1";

			document.getElementById('duration_unit_hidden_' + numRows).value =
				document.getElementById('duration_unit_' + numRows)[document.getElementById('duration_unit_' + numRows).selectedIndex].value;

			cell = row.insertCell(7);
			cell.innerHTML =
				"<input type=text  style='border:0' size=10 name=predecessors_" + numRows + " id=predecessors_" + numRows +
					" onBlur='if (SUGAR.grid.validatePredecessors(this)){" +
						"SUGAR.grid.setDependencyCheckRow(" + numRows + ");" +
						"SUGAR.grid.validateDependencyCycles(" + numRows + ");" +
						"SUGAR.grid.validatePredecessorIsNotAncestorOrChild(" + numRows + ");"+
						"if (SUGAR.grid.dependencyCheckFail != 1){" +
						"SUGAR.grid.updatePredecessorsAndDependents(" + numRows + ");" +
						"SUGAR.grid.calculateDatesAfterAddingPredecessors(" + numRows + ");" +
						"SUGAR.grid.updateAllDependentsAfterDateChanges(" + numRows + ");" +
						"SUGAR.gantt.changeTask(" + numRows + ");}}" +
						"SUGAR.grid.dependencyCheckFail = 0;'>";



			if (!isProjectTemplate) {
				cell = row.insertCell(8);
				cell.innerHTML =
					"<input type='hidden' name='resource_full_name_" + numRows + "' id='resource_full_name_" + numRows + "'>" +
					"<input type='hidden' name='resource_type_" + numRows + "' id='resource_type_" + numRows + "'>" +
					"<select  style='border:0' name=resource_" + numRows + " id=resource_" + numRows +
					" onChange='SUGAR.grid.updateResourceFullNameAndType("+ numRows +");SUGAR.grid.calculateEndDate(document.getElementById(\"date_start_"+ numRows + "\").value, document.getElementById(\"duration_" + numRows + "\").value, "+ numRows + "); " +
								"SUGAR.grid.calculateDatesAfterAddingPredecessors(" + numRows + ");" +
								"SUGAR.grid.updateAllDependentsAfterDateChanges(" + numRows + ");" +
								"SUGAR.gantt.changeTask(" + numRows +");'>" +
					resourceOptionsString + "</select>";

				cell = row.insertCell(9);
				cell.setAttribute('id', 'optional_' + numRows);
				if (optionalHidden)
					cell.style.display = 'none';
				cell.innerHTML =
					"<input type=text size=10 style='border:0' onBlur='SUGAR.grid.validateDuration(this);' name=actual_duration_"+ numRows + " id=actual_duration_" + numRows + ">";
			}



			SUGAR.grid.setupCalendar(numRows, calendar_dateformat, bg_color, gridName, imagePathProjectMinus, imagePathProjectPlus);

			for (var i = 1; i < predecessors.length; i++) {
				if (predecessors[i] && predecessors[i].length > 0) {
					for (var j = 0; j < predecessors[i].length; j++) {
						if (SUGAR.grid.getActualRow(predecessors[i][j]) >= rowNum) {
							SUGAR.grid.updateRowWithPredecessorAtIndex(i, j, 'insert');
						}
					}
				}
			}

			//Update all the row mappings
			if (!isAtEndOfGrid) {
				for (var i = 1; i < totalRowsInGrid; i++) {
					if (SUGAR.grid.getActualRow(i) >= rowNum) {
						var newVal = parseInt(document.getElementById("mapped_row_" + i).value) + 1;
						document.getElementById("mapped_row_" + i).value = newVal;
						document.getElementById("id_" + i + "_divlink").innerHTML = newVal;
						if (document.getElementById("is_milestone_" + i).value == "1" )
							document.getElementById("id_" + i + "_divlink").innerHTML += "*";
						SUGAR.gantt.updateGanttRowMappings(i, newVal);
					}
				}
			}

			SUGAR.gantt.addGanttRow(rowNum);
			SUGAR.grid.indentInsertedRow(numRows);

            SUGAR.grid.onAfterInsertRow();
		},

		/**
		 * buildPredecessorArray: this helper function updates the array that's passed in with
		 * predecessor values for all the grid rows.  The array is indexed by the row.
		 */
		buildPredecessorArray: function(predecessorsArray) {
			var table = document.getElementById(gridName);
			for (var i = 1; i <= totalRowsInGrid; i++) {
				if (document.getElementById("predecessors_" + i)) {
					var predecessorsVal = document.getElementById("predecessors_" + i).value;
					if (predecessorsVal != "") {
						predecessorsArray[i] = predecessorsVal.split(",");
					}
				}
			}
		},

		buildPredecessorsAndDependents: function() {
			var table = document.getElementById(gridName);
			for (var i = 1; i <= totalRowsInGrid; i++) {
				if (document.getElementById("predecessors_" + i)) {
					var predecessorsVal = document.getElementById("predecessors_" + i).value;
					if (predecessorsVal != "") {
						predecessors[i] = predecessorsVal.split(",");
						for (var j in predecessors[i]) {
							predecessors[i][j] = parseInt(predecessors[i][j]);
							if (! dependents[predecessors[i][j]]) {
								dependents[predecessors[i][j]] = new Array();
							}
							dependents[predecessors[i][j]].push(i);
						}
					}
				}
			}
		},

	/*
		buildPredecessorsAndDependents: function() {
			var table = document.getElementById(gridName);
			for (var i = 1; i <= totalRowsInGrid; i++) {
				if (document.getElementById("predecessors_" + i)) {
					var predecessorsVal = document.getElementById("predecessors_" + i).value;
					if (predecessorsVal != "") {
						predecessors[i] = predecessorsVal.split(",");
						for (var j in predecessors[i]) {
							predecessors[i][j] = SUGAR.grid.getMappedRow(parseInt(predecessors[i][j]));
							if (! dependents[predecessors[i][j]]) {
								dependents[predecessors[i][j]] = new Array();
							}
							dependents[predecessors[i][j]].push(i);
						}
					}
				}
			}
		},
		*/
		updatePredecessorsAndDependents: function(row) {
			var predecessorsVal = document.getElementById("predecessors_" + row).value;

			for (i in predecessors[row]) {
				//var mappedRow = SUGAR.grid.getMappedRow(predecessors[row][i]);
				var mappedRow = predecessors[row][i];
				if (dependents[mappedRow] && dependents[mappedRow].length > 0) {
					for (j in dependents[mappedRow] ) {
						if (dependents[mappedRow][j] == row) {
							dependents[mappedRow].splice(j,1);
						}
					}
				}
			}
			if (predecessorsVal == "") {
				predecessors[row] = new Array();
			}
			else {
				predecessors[row] = predecessorsVal.split(",");
				for (j in predecessors[row]) {
					predecessors[row][j] = SUGAR.grid.getMappedRow(parseInt(predecessors[row][j]));
					//var mappedRow = SUGAR.grid.getMappedRow(predecessors[row][j]);
					var mappedRow = predecessors[row][j];
					if (! dependents[mappedRow]) {
						dependents[mappedRow] = new Array();
					}
					dependents[mappedRow].push(row);
				}
			}
		},

		/**
		 * cleanupPredecessorRow: this helper function cleans up the predecessor cell of the specified grid row
		 * by removing leading and trailing blank values after the predecessor rows might have been deleted.
		 */
		cleanupPredecessorRow: function(row) {
			var predecessorsVal = document.getElementById("predecessors_" + row).value;
			var predecessorsArray = predecessorsVal.split(",");

			var currentIndex = 0;

			while (currentIndex < predecessorsArray.length) {
				if (predecessorsArray[currentIndex] == "")
					predecessorsArray.splice(currentIndex,1);
				else
					currentIndex++;
			}
			document.getElementById("predecessors_" + row).value = predecessorsArray.join(",");
			//SUGAR.grid.updatePredecessorsAndDependents(row);
		},

		/**
		 * updateRowWithPredecessorAtIndex: this helper function is used to update predecessor row values
		 * after and insert or delete operation to the grid.
		 */
		updateRowWithPredecessorAtIndex: function(row, index, operation, value)
		{
//			var predecessorsVal = document.getElementById("predecessors_" + row).value;
	//		var predecessorsArray = predecessorsVal.split(",");
			var newVal = parseInt(SUGAR.grid.getActualRow(predecessors[row][index]));
			var predsArr = predecessors[row].concat();
			if (operation == 'insert')
				newVal++;
			else if (operation == 'delete') {
				if (newVal != value)
					newVal--;
				else {
					newVal = "";
				}
			}
			predsArr[index] = newVal;
			document.getElementById("predecessors_" + row).value = predsArr.join(",");
			//predecessors[row][index] = SUGAR.grid.getMappedRow(newVal);
			//SUGAR.grid.updatePredecessorsAndDependents(row);
		},

		/**
		 * getDisplayDate: given a JS date object, this function returns a string representation
		 * of the date in the user's current date format.
		 */
		getDisplayDate: function(JSDate) {
			var dateStr, month, date;

			if ((JSDate.getMonth() + 1) < 10)
				month = "0" + (JSDate.getMonth() + 1);
			else
				month = (JSDate.getMonth() + 1);

			if (JSDate.getDate() < 10)
				date = "0" + JSDate.getDate()
			else
				date = JSDate.getDate();

			switch(calendar_dateformat) {
				case "%Y-%m-%d":
					dateStr = JSDate.getFullYear() + "-" + month + "-" + date;
					break;
				case "%m-%d-%Y":
					dateStr = month + "-" + date + "-" + JSDate.getFullYear();
					break;
				case "%d-%m-%Y":
					dateStr = date + "-" + month + "-" + JSDate.getFullYear();
					break;
				case "%Y/%m/%d":
					dateStr = JSDate.getFullYear() + "/" + month + "/" + date;
					break;
				case "%m/%d/%Y":
					dateStr = month + "/" + date + "/" + JSDate.getFullYear();
					break;
				case "%d/%m/%Y":
					dateStr = date + "/" + month + "/" + JSDate.getFullYear();
					break;
				case "%Y.%m.%d":
					dateStr = JSDate.getFullYear() + "." + month + "." + date;
					break;
				case "%m.%d.%Y":
					dateStr = month + "." + date + "." + JSDate.getFullYear();
					break;
				case "%d.%m.%Y":
					dateStr = date + "." + month + "." + JSDate.getFullYear();
					break;
			}

			return dateStr;
		},

		/**
		 * getJSDate: given a date string in the user's current date format, this function
		 * returns a JS date object representation of that date.
		 */
		getJSDate: function(dateString) {
			// Check to make sure that we're not being passed a date object.
			if (typeof(dateString) == 'object')
				return dateString;

			var year, month, date;
			if (calendar_dateformat == "%Y-%m-%d" || calendar_dateformat == "%Y/%m/%d" || calendar_dateformat == "%Y.%m.%d") {
				// Need this as parseInt("09") returns 0 and not 9.
				if (dateString.substr(5,1) == "0")
					month = dateString.substr(6,1)
				else
					month = dateString.substr(5,2);

				if (dateString.substr(8,1) == "0")
					date = dateString.substr(9,1)
				else
					date = dateString.substr(8,2)

				year = dateString.substr(0,4);
				//dateObj = new Date(parseInt(dateString.substr(0,4)),parseInt(month) - 1,parseInt(date));
			}
			else if (calendar_dateformat == "%m-%d-%Y" || calendar_dateformat == "%m/%d/%Y" || calendar_dateformat == "%m.%d.%Y") {
				// Need this as parseInt("09") returns 0 and not 9.
				if (dateString.substr(0,1) == "0")
					month = dateString.substr(1,1)
				else
					month = dateString.substr(0,2);

				if (dateString.substr(3,1) == "0")
					date = dateString.substr(4,1)
				else
					date = dateString.substr(3,2)

				year = dateString.substr(6,4);
				//dateObj = new Date(parseInt(dateString.substr(6,4)),parseInt(dateString.substr(0,2)) - 1,parseInt(dateString.substr(3,2)));
			}
			else if (calendar_dateformat == "%d-%m-%Y" || calendar_dateformat == "%d/%m/%Y" || calendar_dateformat == "%d.%m.%Y") {
				// Need this as parseInt("09") returns 0 and not 9.
				if (dateString.substr(3,1) == "0")
					month = dateString.substr(4,1)
				else
					month = dateString.substr(3,2);

				if (dateString.substr(0,1) == "0")
					date = dateString.substr(1,1)
				else
					date = dateString.substr(0,2)

				year = dateString.substr(6,4);
				//dateObj = new Date(parseInt(dateString.substr(6,4)),parseInt(dateString.substr(3,2)) - 1,parseInt(dateString.substr(0,2)));
			}

			return new Date(parseInt(year), parseInt(month) - 1, parseInt(date));
		},

		clearStartTime: function(row) {
			document.getElementById("time_start_" + row).value = workDayStartTime;
		},

		clearFinishTime: function(row) {
			document.getElementById("time_finish_" + row).value = workDayFinishTime;
		},

		isHoliday: function(startDate, resource) {
			// Check if the date is a weekend date
			for (var i = 0; i < weekendDays.length; i++) {
				if (startDate.getDay() == weekendDays[i])
					return true;
			}
			if (resource != null && resource != "") {
				if (resourceHolidays[resource] && resourceHolidays[resource][SUGAR.grid.getDisplayDate(startDate)] != null) {
					return true;
				}
			}
		},

		changeDurationUnits: function(row) {
			if (document.getElementById("duration_unit_" + row).value == "Hours") {
				document.getElementById("duration_unit_hidden_" + row).value = "Hours"
				var prevVal = document.getElementById("duration_" + row).value;
				document.getElementById("duration_" + row).value = parseInt(prevVal) * workDayHours;
			}
			if (document.getElementById("duration_unit_" + row).value == "Days") {
				document.getElementById("duration_unit_hidden_" + row).value = "Days"
				var prevVal = document.getElementById("duration_" + row).value;
				document.getElementById("duration_" + row).value = Math.ceil(parseInt(prevVal) / workDayHours);
				SUGAR.grid.clearFinishTime(row);
			}
		},

		isDuringWorkingHours: function(startTime) {
			if (startTime >= workDayStartTime && startTime < workDayFinishTime)
				return true;
			return false;
		},

		/**
		 * calculateEndDate: given a start date, duration and a row, this function calculates
		 * the end date for the task and updates the date_finish field of that row.
		 */
		calculateEndDate: function(dateStart, duration, row)
		{
			if (document.getElementById("duration_unit_" + row).value == "Hours")
				return SUGAR.grid.calculateEndDateHours(dateStart, duration, row);
			else if (document.getElementById("duration_unit_" + row).value == "Days")
				return SUGAR.grid.calculateEndDateHours(dateStart, duration * workDayHours, row);

			/*
			var startDate = SUGAR.grid.getJSDate(dateStart);
			var currDuration = 0;
			var currDate = new Date(startDate);
			while (currDuration < parseInt(duration)) {
				// Check that the day is not a Saturday or Sunday
				if (startDate.getDay() != 0 && startDate.getDay() != 6 ) {
					currDuration++;
					currDate = new Date(startDate);
				}
				startDate.setDate(startDate.getDate() + 1);
			}
			currDate = SUGAR.grid.getDisplayDate(currDate);
			document.getElementById("date_finish_" + row).value = currDate;
			*/
		},

		calculateEndDateHours: function(dateStart, duration, row)
		{
			var startDate = SUGAR.grid.getJSDate(dateStart);
			var startTime = document.getElementById("time_start_" + row).value;
			var currDuration = 0;

			if (isNaN(parseInt(startTime))) {
				startTime = workDayStartTime;
			}

			var currDate = new Date(startDate);
			var resource = document.getElementById("resource_" + row).value;
			while (currDuration < parseInt(duration)) {
				while (!SUGAR.grid.isDuringWorkingHours(startTime) || SUGAR.grid.isHoliday(startDate, resource)) {
					startDate.setDate(startDate.getDate() + 1);
					startTime = workDayStartTime;
				}
				currDuration++;
/*
				// Increment the day if we're the next business day.
				if (currDuration % workDayHours == 1 && currDuration != 1) {
					startDate.setDate(startDate.getDate() + 1);
					startTime = workDayStartTime + 1;
					while (!SUGAR.grid.isDuringWorkingHours(startTime) || SUGAR.grid.isHoliday(startDate, resource)) {
						startDate.setDate(startDate.getDate() + 1);
						startTime = workDayStartTime + 1;
					}
				}
				else */
					startTime++;
			}
			currDate = new Date(startDate);
			currDate = SUGAR.grid.getDisplayDate(currDate);
			document.getElementById("date_finish_" + row).value = currDate;
			document.getElementById("time_finish_" + row).value = startTime;
		},

		/**
		 * calculateDuration: given a start date, an end date and a row, this function calculates
		 * the duration for the task and updates the duration field of that row.
		 */
		calculateDuration: function(dateStart, dateFinish, row)
		{
			if (document.getElementById("duration_unit_" + row).value == "Hours")
				return SUGAR.grid.calculateDurationHours(dateStart, dateFinish, row);

			var startDate = SUGAR.grid.getJSDate(dateStart);
			var endDate = SUGAR.grid.getJSDate(dateFinish);
			var resource = document.getElementById("resource_" + row).value;
			var duration = 0;
			while (startDate.getTime() <= endDate.getTime()) {
				if (!SUGAR.grid.isHoliday(startDate, resource))
					duration++;
				startDate.setDate(startDate.getDate() + 1);
			}
			document.getElementById("duration_" + row).value = duration;
		},

		calculateDurationHours: function(dateStart, dateFinish, row) {
			var startDate = SUGAR.grid.getJSDate(dateStart);
			var startTime = document.getElementById("time_start_" + row).value
			var endDate = SUGAR.grid.getJSDate(dateFinish);
			var endTime = document.getElementById("time_finish_" + row).value
			var duration = 0;
			if (isNaN(parseInt(startTime))) {
				startTime = workDayStartTime;
			}
			if (isNaN(parseInt(endTime))) {
				endTime = workDayFinishTime;
			}

			var currDate = new Date(startDate);
			var resource = document.getElementById("resource_" + row).value;

			while (startDate.getTime() < endDate.getTime()) {
				while (!SUGAR.grid.isDuringWorkingHours(startTime) || SUGAR.grid.isHoliday(startDate, resource)) {
					startDate.setDate(startDate.getDate() + 1);
					startTime = workDayStartTime;
				}
				if (startDate.getTime() < endDate.getTime()) {
					duration++;
					startTime++;
				}
			}
			if (!SUGAR.grid.isHoliday(endDate, resource)) {
				if (duration != 0)
					duration += (endTime - workDayStartTime);
				else
					duration += (endTime - startTime);
			}
			document.getElementById("duration_" + row).value = duration;

		},

		/**
		 * toggleSelectRow: given a row, this function toggles the row selection
		 * (select it if it hasn't been selected and unselect it if it has been).
		 */
		toggleSelectRow: function(mappedRow)
		{
			var index = SUGAR.grid.getRowIndexInSelectedRows(mappedRow);

			// This row hasn't been selected and we need to select it
			if (index == -1) {
				SUGAR.grid.selectRow(mappedRow);
			}
			else { //unselect the row
				SUGAR.grid.unSelectRow(mappedRow);
			}

			// Mozilla Support
			if (!document.selection) {
				var selObj = window.getSelection();
	  			selObj.removeAllRanges();
			}
			else { // IE Support
				//var selRange = document.selection.createRange();
				document.selection.empty();
			}

		},

		/**
		 * getMappedRow: given an actual row value, this function returns the mapping for that row.
		 */
		getMappedRow: function(actualRow)
		{
			var table = document.getElementById(gridName);
			for (var i = 1; i <= totalRowsInGrid; i++) {
				if (document.getElementById("mapped_row_" + i) &&
					document.getElementById("mapped_row_" + i).value == actualRow)
					return i;
			}
			return -1;
		},

		/**
		 * getActualRow: given a row mapping, this function returns the actual row number of that row.
		 */
		getActualRow: function(mappedRow)
		{
			if (document.getElementById("mapped_row_" + mappedRow))
				return parseInt(document.getElementById("mapped_row_" + mappedRow).value);
			return -1;
		},

		/**
		 * selectRow: this function changes the color of the specified row to actually select the row.
		 */
		selectRow: function(mappedRow)
		{
			selectedRows.push(mappedRow);
			var rowObj = document.getElementById("project_task_row_" + mappedRow);
			rowObj.className = "sqsSelectedSmartInputItem";
			document.getElementById("percent_complete_" + mappedRow).className = "sqsSelectedSmartInputItem";
			document.getElementById("duration_" + mappedRow).className = "sqsSelectedSmartInputItem";
			document.getElementById("date_start_" + mappedRow).className = "sqsSelectedSmartInputItem";
			document.getElementById("date_finish_" + mappedRow).className = "sqsSelectedSmartInputItem";
			document.getElementById("resource_" + mappedRow).className = "sqsSelectedSmartInputItem";
			document.getElementById("predecessors_" + mappedRow).className = "sqsSelectedSmartInputItem";
			document.getElementById("actual_duration_" + mappedRow).className = "sqsSelectedSmartInputItem";
		},

		/**
		 * getRowIndexInSelectedRows: this helper function returns the index of a specified row in the selectedRows array.
		 */
		getRowIndexInSelectedRows: function(row) {
			for (var i = 0; i < selectedRows.length; i++) {
				if (selectedRows[i] == row)
					return i;
			}
			return -1;
		},

		/**
		 * unSelectRow: this function changes the color of the specified row to unselect the row.
		 */
		unSelectRow: function(mappedRow)
		{
			var index = SUGAR.grid.getRowIndexInSelectedRows(mappedRow);
			if (index >= 0) {
				selectedRows.splice(index, 1);

				document.getElementById("percent_complete_" + mappedRow).className = "";
				document.getElementById("duration_" + mappedRow).className = "";
				document.getElementById("resource_" + mappedRow).className = "";
				document.getElementById("date_start_" + mappedRow).className = "";
				document.getElementById("date_finish_" + mappedRow).className = "";
				document.getElementById("predecessors_" + mappedRow).className = "";
				document.getElementById("actual_duration_" + mappedRow).className = "";
				var rowObj = document.getElementById('project_task_row_' + mappedRow);
				rowObj.className = "";
			}
		},

		/**
		 * getAncestors: given a row, this function recursively builds a list of all the ancestor tasks of this
		 * task and adds them to the allAncestors array.
		 */
		getAncestors: function(row, allAncestors, ancestorLevels)
		{
			if (indentedRows[row]) {
				allAncestors.push(parseInt(indentedRows[row].parentRow));
				ancestorLevels++;
			}
			else {
				var ancestorObj = new Object();
				ancestorObj.ancestorLevels = ancestorLevels;
				ancestorObj.allAncestors = allAncestors;
				return ancestorObj;
			}
			return SUGAR.grid.getAncestors(allAncestors[allAncestors.length - 1], allAncestors, ancestorLevels);
		},

		/**
		 * getChildren: given a row, this function recursively builds a list of all the children tasks of this
		 * task and adds them to the allChildren array.
		 */
		getChildren: function(row, allChildren)
		{
			var children = new Array();
			for (var i = 0; i < indentedRows.length; i++) {
				if (indentedRows[i] && indentedRows[i].parentRow == row) {
					children.push(i);
					allChildren.push(i);
				}
			}
			if (children.length == 0)
				return;

			for (var i = 0; i < children.length; i++) {
				SUGAR.grid.getChildren(children[i], allChildren);
			}
		},

		/**
		 * addToOutdent: given a row, this function outdents the row and unselects it.
		 */
		addToOutdent: function(row)
		{
			selectedRows.sort(SUGAR.grid.sortNumber);
			while (selectedRows.length != 0) {
				SUGAR.grid.outdentRow(selectedRows[selectedRows.length-1]);
				SUGAR.grid.unSelectRow(selectedRows[selectedRows.length-1]);
			}
		},

		/**
		 * outdentRow: this is a helper function of the addToOutdent function. It performs the actual
		 * outdent logic.
		 */
		outdentRow: function(row)
		{
			// all subsequent children at the same level as you become your children
			if (selectedRows.length == 0 || !indentedRows[row])
				return;

			// outdent all current children
			var allChildren = new Array();
			SUGAR.grid.getChildren(row, allChildren);
			for (var i = 0; i < allChildren.length; i++) {
				var childRow = allChildren[i];
				indentedRows[childRow].levelsIndented--;
				if (indentedRows[childRow].levelsIndented == 0) {
					indentedRows[childRow] = null;
				}
				var elementId = "description_" + childRow + "_divlink";
				var inputId = "description_" + childRow;
				document.getElementById(elementId).innerHTML =
					document.getElementById(elementId).innerHTML.replace(/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/,"");
				document.getElementById("description_divlink_input_" + childRow).value =
					document.getElementById("description_divlink_input_" + childRow).value.replace(/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/,"");
			}

			allChildren = new Array();
			var parentRow = indentedRows[row].parentRow;

			var parentHasOtherChildren = false;
			// This row inherits all the children of the parent that come after this row.
			SUGAR.grid.getChildren(parentRow, allChildren);

			for (var i = 0; i < allChildren.length; i++) {
				if (SUGAR.grid.getActualRow(row) < SUGAR.grid.getActualRow(allChildren[i])) {
					if (indentedRows[allChildren[i]].parentRow == parentRow) {
						indentedRows[allChildren[i]].parentRow = row;
						document.getElementById("parent_" + allChildren[i]).value = row;
						SUGAR.grid.validatePredecessorIsNotAncestorOrChild(allChildren[i], false);
					}
				}
				else {
					if (allChildren[i] != row && indentedRows[allChildren[i]].parentRow == parentRow)
						parentHasOtherChildren = true;
				}
			}

			// Update parent node's UI
			elementId = "description_" + parentRow + "_divlink";
			inputId = "description_" + parentRow;

			// If the parent doesn't have any other children, we should get rid of any expand/collapse images
			//if (allChildrenRowIndex == 0) {
			if (!parentHasOtherChildren) {
				document.getElementById(elementId).innerHTML = document.getElementById(inputId).value;
				document.getElementById("description_divlink_input_" + parentRow).value = document.getElementById(inputId).value;

				document.getElementById("date_start_" + parentRow).removeAttribute("readOnly");
				document.getElementById("date_finish_" + parentRow).removeAttribute("readOnly");
				document.getElementById("percent_complete_" + parentRow).removeAttribute("readOnly");
				document.getElementById("duration_" + parentRow).removeAttribute("readOnly");
				document.getElementById("predecessors_" + parentRow).value = "";
				document.getElementById("predecessors_" + parentRow).removeAttribute("readOnly");
				SUGAR.grid.indentRow(parentRow, true);
				SUGAR.gantt.removeParentTask(parentRow);
			}
			allChildren = new Array();

			indentedRows[row].levelsIndented--;

			// Grandparent (if any) becomes the parent
			if (indentedRows[parentRow]) {
				indentedRows[row].parentRow = indentedRows[parentRow].parentRow;
				document.getElementById("parent_" + row).value = indentedRows[parentRow].parentRow;
			}

			var elementId = "description_" + row + "_divlink";
			var inputId = "description_" + row;
			var elementVal = document.getElementById(elementId).innerHTML;
			var newElementVal = "";

			var allChildren = new Array();
			SUGAR.grid.getChildren(row, allChildren);

			// add the expand/collapse image if there are children.
			if (allChildren.length > 0) {
				newElementVal += "<img src='" + imagePathProjectMinus + "' onClick='javascript:SUGAR.grid.expandCollapseRow("+ row +")'>&nbsp;";
				newElementVal += "<b>" + document.getElementById(inputId).value + "</b>";
				document.getElementById(elementId).innerHTML = newElementVal;
				//document.getElementById('description_divlink_input_' + row).value = newElementVal;

				document.getElementById("date_start_" + row).setAttribute("readOnly", "true");
				document.getElementById("date_finish_" + row).setAttribute("readOnly", "true");
				document.getElementById("percent_complete_" + row).setAttribute("readOnly", "true");
				document.getElementById("duration_" + row).setAttribute("readOnly", "true");
				document.getElementById("predecessors_" + row).value = "";
				document.getElementById("predecessors_" + row).setAttribute("readOnly", "true");
				SUGAR.grid.indentRow(row, true);
				SUGAR.grid.calculateCumulativePercentComplete(row);
				SUGAR.grid.removeDependentChildrenAfterOutdent(row, allChildren);
				SUGAR.grid.calculateParentDateDataAfterIndent(row);
				SUGAR.gantt.parentTask(row);
			}
			else { //Replace the expand collapse image if no more children
				document.getElementById(elementId).innerHTML = document.getElementById(inputId).value;
				document.getElementById("date_start_" + row).removeAttribute("readOnly");
				document.getElementById("date_finish_" + row).removeAttribute("readOnly");
				document.getElementById("percent_complete_" + row).removeAttribute("readOnly");
				document.getElementById("duration_" + row).removeAttribute("readOnly");
				document.getElementById("predecessors_" + row).value = "";
				document.getElementById("predecessors_" + row).removeAttribute("readOnly");
				SUGAR.grid.indentRow(row, true);
				//SUGAR.grid.calculateCumulativePercentComplete(row);
			}

			if (indentedRows[row].levelsIndented == 0) {
				indentedRows[row] = null;
				document.getElementById("parent_" + row).value = "";
			}

			allChildren = new Array();
			SUGAR.grid.calculateParentDateDataAfterIndent(parentRow);
			SUGAR.grid.calculateCumulativePercentComplete(parentRow);
			SUGAR.grid.updateAncestorsTimeData(row);
			SUGAR.grid.updateAncestorsPercentComplete(row);

		},

		/**
		 * removeDependentChildrenAfterOutdent: this is a helper function for outdentRow. It
		 * removes any new children that might have previously dependent on the newly outdented row.
		 */
		removeDependentChildrenAfterOutdent: function(row, allChildren) {
			for (var i = 0; i < allChildren.length; i++) {
				var predecessorsVal = document.getElementById("predecessors_" + allChildren[i]).value;
				var predecessorsArray = new Array();

				if (predecessorsVal != "") {
					predecessorsArray = predecessorsVal.split(",");
				}

				for (var j = 0; j < predecessorsArray.length; j++) {
					if (predecessorsArray[j] == SUGAR.grid.getActualRow(row)) {
						predecessorsArray[j] = "";
					}
				}
				var predecessorVal = predecessorsArray.join(",");
				document.getElementById("predecessors_" + allChildren[i]).value = predecessorVal;
				SUGAR.grid.cleanupPredecessorRow(allChildren[i]);
				SUGAR.grid.updatePredecessorsAndDependents(allChildren[i]);
			}
		},

		/**
		 * indentSelectedRows: this function iterates through all the selected rows and invokes the helper
		 * indent functions on each row so that the rows are actually indented.
		 */
		indentSelectedRows: function ()
		{
			var tempArray = new Array();
			while(tempArray.length != selectedRows.length)
				tempArray.push(SUGAR.grid.getActualRow(selectedRows[tempArray.length]));
			tempArray.sort(SUGAR.grid.sortNumber);
			while (selectedRows.length != 0) {
				SUGAR.grid.addToIndent(SUGAR.grid.getMappedRow(tempArray[0]));
				SUGAR.grid.unSelectRow(SUGAR.grid.getMappedRow(tempArray[0]));
				tempArray.splice(0,1);
			}

			/*
			selectedRows.sort(SUGAR.grid.sortNumber);
			while (selectedRows.length != 0) {
				SUGAR.grid.addToIndent(selectedRows[0]);
				SUGAR.grid.unSelectRow(selectedRows[0]);
			}
			*/
		},

		/**
		 * addToIndent: given a row, this helper function to indentSelectedRows() adds the row and
		 * associated parent information to the indentedRows array for further indentation processing to occur.
		 */
		addToIndent: function(row)
		{
			if (selectedRows.length == 0)
				return;

			canIndent = false;
			// Find the closest previous row that has the same parent as you currently do.
			// This is the parent
			if (indentedRows[row]) {
				for (var i = SUGAR.grid.getActualRow(row) - 1; i >= 0 ; i--) {
					if (indentedRows[SUGAR.grid.getMappedRow(i)] && indentedRows[SUGAR.grid.getMappedRow(i)].parentRow == indentedRows[row].parentRow) {
						indentedRows[row].levelsIndented++;
						indentedRows[row].parentRow = SUGAR.grid.getMappedRow(i);
						document.getElementById("parent_" + row).value = SUGAR.grid.getMappedRow(i);
						canIndent = true;
						break;
					}
				}
			}
			else {
				// Can't indent the first row, so don't look at row 0
				for (var i = SUGAR.grid.getActualRow(row) - 1; i >= 1 ; i--) {
					if (!indentedRows[SUGAR.grid.getMappedRow(i)] || (indentedRows[SUGAR.grid.getMappedRow(i)].parentRow == -1)) {
						rowObj = new Object();
						rowObj.levelsIndented = 1;
						rowObj.parentRow = SUGAR.grid.getMappedRow(i);
						document.getElementById("parent_" + row).value = SUGAR.grid.getMappedRow(i);
						rowObj.childrenRows = new Array();
						indentedRows[row] = rowObj;
						canIndent = true;
						break;
					}
				}
			}

			if (canIndent) {
				var allChildren = new Array();
				// Need to indent all the direct and indirect children
				SUGAR.grid.getChildren(row, allChildren);
				indentedRows[row].childrenRows = allChildren;
				SUGAR.grid.indentRow(row);
				allChildren = new Array();
			}
		},

		/**
		 * indentParentRow: given a row, this helper function indents that row's parent row based on
		 * indentation rules.
		 */
		indentParentRow: function(row) {
			var parentElementId = "description_" + indentedRows[row].parentRow + "_divlink";
			var parentElementVal = document.getElementById(parentElementId).innerHTML;
			var parentInputVal = document.getElementById("description_" + indentedRows[row].parentRow).value;

			// Only add the expand/collapse icon if it's not already there.
			if (parentElementVal.search(".gif") == -1)
			{
				parentDataStart = parentElementVal.indexOf(parentInputVal);
				if (parentDataStart > 0) {
					newParentElementVal = parentElementVal.substring(0, parentDataStart);
				}
				else
					newParentElementVal = "";
				newParentElementVal += "<img src='" + imagePathProjectMinus + "' onClick='javascript:SUGAR.grid.expandCollapseRow("+ indentedRows[row].parentRow +")'>&nbsp;";
				newParentElementVal += "<b>" + parentInputVal + "</b>";
				document.getElementById(parentElementId).innerHTML = newParentElementVal;
				//document.getElementById("description_divlink_input_" + indentedRows[row].parentRow).value = newParentElementVal;

				document.getElementById("date_start_" + indentedRows[row].parentRow).setAttribute("readOnly", "true");
				document.getElementById("date_finish_" + indentedRows[row].parentRow).setAttribute("readOnly", "true");
				document.getElementById("percent_complete_" + indentedRows[row].parentRow).setAttribute("readOnly", "true");
				document.getElementById("duration_" + indentedRows[row].parentRow).setAttribute("readOnly", "true");
				document.getElementById("predecessors_" + indentedRows[row].parentRow).value = "";
				document.getElementById("predecessors_" + indentedRows[row].parentRow).setAttribute("readOnly", "true");

			}

			SUGAR.grid.updateAncestorsTimeData(row);
			SUGAR.grid.updateAncestorsPercentComplete(row);

			SUGAR.gantt.parentTask(indentedRows[row].parentRow);
		},

		/**
		 * indentChildrenRows: given a row, this helper function indents that row's children rows based on
		 * indentation rules.
		 */
		indentChildrenRows: function(row) {
			if (!indentedRows[row])
				return;

			for (var i = 0; i < indentedRows[row].childrenRows.length; i++) {
				var childRow = indentedRows[row].childrenRows[i];
				indentedRows[childRow].levelsIndented++;
				var elementId = "description_" + childRow + "_divlink";
				var elementVal = document.getElementById(elementId).innerHTML;
				elementVal = elementVal.replace(/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/g, "");

				var divlinkInputVal = document.getElementById('description_divlink_input_' + childRow).value;
				divlinkInputVal = divlinkInputVal.replace(/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/g, "");

				var newElementVal = "";

				for (var j = 0; j < indentedRows[childRow].levelsIndented; j++) {
					newElementVal += "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
				}
				divlinkInputVal = newElementVal + divlinkInputVal;
				newElementVal += elementVal;
				document.getElementById(elementId).innerHTML = newElementVal;
				document.getElementById('description_divlink_input_' + childRow).value = divlinkInputVal;
				//document.getElementById('description_divlink_input_' + childRow).innerHTML = newElementVal;

			}
		},


		/**
		 * indentRow: given a row, this helper function indents that particular row, its parent row and
		 * all it's children rows.
		 * formatOnly is used to indent rows that were previously indented, but their input has been changed
		 * so we need to re-fromat the text of the row (and not actually indent parents or children).
		 */
		indentRow: function(row, formatOnly)
		{
			if (formatOnly == null)
				formatOnly = false;

			if (indentedRows[row]) {
				// Update the row ///////////////////////////////////////////////
				var elementId = "description_" + row + "_divlink";
				var elementVal = document.getElementById(elementId).innerHTML;
				elementVal = elementVal.replace(/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/g, "");

				var divlinkInputVal = document.getElementById('description_divlink_input_' + row).value;
				divlinkInputVal = divlinkInputVal.replace(/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/g, "");

				var newElementVal = "";
				for (var i = 0; i < indentedRows[row].levelsIndented; i++) {
					newElementVal += "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
				}

				divlinkInputVal = newElementVal + divlinkInputVal;
				newElementVal += elementVal;
				document.getElementById(elementId).innerHTML = newElementVal;
				document.getElementById('description_divlink_input_' + row).value = divlinkInputVal;
				// Update the row ///////////////////////////////////////////////
			}

			if (!formatOnly) {
				SUGAR.grid.validatePredecessorIsNotAncestorOrChild(row, false);
				for (var i = 0; i < indentedRows[row].childrenRows.length; i++) {
					SUGAR.grid.validatePredecessorIsNotAncestorOrChild(indentedRows[row].childrenRows[i], false);
				}

				SUGAR.grid.indentParentRow(row);
				SUGAR.grid.indentChildrenRows(row);
			}
		},

		/**
		 * indentInsertedRow: todo
		 * After we insert a row in the middle of the grid, we have to indent that row based on
		 * the indentation of the next row that follows it in the grid.
		 */
		indentInsertedRow: function (row) {
			var actualRow = SUGAR.grid.getActualRow(row);
			var table = document.getElementById(gridName);

			// Don't need to indent the row if it's the first one or the last one in the grid.
			if (actualRow == 1 || actualRow == (table.rows.length - 1))
				return;

			var nextRow = SUGAR.grid.getMappedRow(parseInt(actualRow) + 1);

			if (indentedRows[nextRow]) {
				var rowObj = new Object();
				rowObj.levelsIndented = indentedRows[nextRow].levelsIndented;
				rowObj.parentRow = indentedRows[nextRow].parentRow;
				document.getElementById("parent_" + row).value = indentedRows[nextRow].parentRow;
				rowObj.childrenRows = new Array();
				indentedRows[row] = rowObj;
			}
		},

		/**
		 * getNextValidDate: todo
		 */
		getNextValidDate: function(date, startTime, resource) {
			if (isNaN(parseInt(startTime)))
				startTime = workDayStartTime;

			while (!SUGAR.grid.isDuringWorkingHours(startTime) || SUGAR.grid.isHoliday(date, resource)) {
				date.setDate(date.getDate() + 1);
				startTime = workDayStartTime;
			}
			var validDate = new Object();
			validDate.date = date;
			validDate.time = startTime;
			return validDate;
		},

		/**
		 * calculateDatesAfterAddingPredecessors: given a row, this function calculates start and finish
		 * dates for the row based on the predecessor's end dates.
		 */
		calculateDatesAfterAddingPredecessors: function(row) {
			if (SUGAR.grid.isLoaded){
				var resource = document.getElementById("resource_" + row).value;
				//var resource = document.getElementById("resource_" + row).value;

				if (predecessors[row] != null && predecessors[row].length > 0) {
					for (var i = 0; i < predecessors[row].length; i++) {
						if (i == 0) {
							lastEndDate = SUGAR.grid.getJSDate(document.getElementById('date_finish_' + predecessors[row][i]).value);
							lastEndTime = document.getElementById('time_finish_' + predecessors[row][i]).value;
							lastEndIndex = predecessors[row][i];
						}
						endDate = SUGAR.grid.getJSDate(document.getElementById('date_finish_' + predecessors[row][i]).value);
						endTime = document.getElementById('time_finish_' + predecessors[row][i]).value;

						if (endDate.getTime() > lastEndDate.getTime()) {
							lastEndDate = endDate;
							lastEndIndex = predecessors[row][i];
						}
						else if (endDate.getTime() == lastEndDate.getTime()) {
							if (endTime > lastEndTime) {
								lastEndDate = endDate;
								lastEndIndex = predecessors[row][i];
							}
						}
					}

					var startDate = SUGAR.grid.getJSDate(document.getElementById('date_finish_' + lastEndIndex).value);
					var startTime = document.getElementById('time_finish_' + lastEndIndex).value;
					startDateObj = SUGAR.grid.getNextValidDate(startDate, startTime, resource);
					startDate = SUGAR.grid.getDisplayDate(startDateObj.date);
					document.getElementById('date_start_' + row).value = startDate;
					document.getElementById('time_start_' + row).value = startDateObj.time;
					SUGAR.grid.calculateEndDate(document.getElementById('date_start_' + row).value, document.getElementById('duration_' + row).value, row);
//					SUGAR.grid.updateAllDependentsAfterDateChanges(row);
//					SUGAR.grid.updateAncestorsTimeData(row);
					SUGAR.gantt.changeTask(row);
				}

				/*
				var predecessorsVal = document.getElementById("predecessors_" + row).value;
				var predecessorsArray = new Array();
				var lastEndDate, endDate;
				var lastEndIndex = row;
				var resource = document.getElementById("resource_" + row).value;

				if (predecessorsVal != "") {
					predecessorsArray = predecessorsVal.split(",");
				}
				for (var i = 0; i < predecessorsArray.length; i++) {
					var mappedRow = SUGAR.grid.getMappedRow(predecessorsArray[i]);
					if (i == 0) {
						lastEndDate = SUGAR.grid.getJSDate(document.getElementById('date_finish_' + mappedRow).value);
						lastEndTime = document.getElementById('time_finish_' + mappedRow).value;
						lastEndIndex = mappedRow;
					}
					endDate = SUGAR.grid.getJSDate(document.getElementById('date_finish_' + mappedRow).value);
					endTime = document.getElementById('time_finish_' + mappedRow).value;

					if (endDate.getTime() > lastEndDate.getTime()) {
						lastEndDate = endDate;
						lastEndIndex = mappedRow;
					}
					else if (endDate.getTime() == lastEndDate.getTime()) {
						if (endTime > lastEndTime) {
							lastEndDate = endDate;
							lastEndIndex = mappedRow;
						}
					}
				}
				// Do the following only if we have predecessors.
				if (predecessorsArray.length > 0) {
					var startDate = SUGAR.grid.getJSDate(document.getElementById('date_finish_' + lastEndIndex).value);
					var startTime = document.getElementById('time_finish_' + lastEndIndex).value;
					startDateObj = SUGAR.grid.getNextValidDate(startDate, startTime, resource);
					startDate = SUGAR.grid.getDisplayDate(startDateObj.date);
					document.getElementById('date_start_' + row).value = startDate;
					document.getElementById('time_start_' + row).value = startDateObj.time;
					SUGAR.grid.calculateEndDate(document.getElementById('date_start_' + row).value, document.getElementById('duration_' + row).value, row);
//					SUGAR.grid.updateAllDependentsAfterDateChanges(row);
//					SUGAR.grid.updateAncestorsTimeData(row);
					SUGAR.gantt.changeTask(row);

				}
				*/
			}
		},
		updateAncestorDates: function(ancestorRow, childRow) {
			var startDateIndex = ancestorRow;
			var endDateIndex = ancestorRow;
			var changed = false;

			startDate = SUGAR.grid.getJSDate(document.getElementById('date_start_' + ancestorRow).value);
			startTime = document.getElementById('time_start_' + ancestorRow).value;
			endDate = SUGAR.grid.getJSDate(document.getElementById('date_finish_' + ancestorRow).value);
			endTime = document.getElementById('time_finish_' + ancestorRow).value;

			childStartDate = SUGAR.grid.getJSDate(document.getElementById('date_start_' + childRow).value);
			childStartTime = document.getElementById('time_start_' + childRow).value;
			childEndDate = SUGAR.grid.getJSDate(document.getElementById('date_finish_' + childRow).value);
			childEndTime = document.getElementById('time_finish_' + childRow).value;

			if (childStartDate.getTime() < startDate.getTime()) {
				startDate = childStartDate;
				startTime = childStartTime;
				startDateIndex = childRow;
				changed = true;
			}
			else if (childStartDate.getTime() == startDate.getTime()) {
				if (childStartTime < startTime) {
					startDate = childStartDate;
					startTime = childStartTime;
					startDateIndex = childRow;
					changed = true;
				}
			}
			if (childEndDate.getTime() > endDate.getTime()) {
				endDate = childEndDate;
				endTime = childEndTime;
				endDateIndex = childRow;
				changed = true;
			}
			else if (childEndDate.getTime() == endDate.getTime()) {
				if (childEndTime > endTime) {
					endDate = childEndDate;
					endTime = childEndTime;
					endDateIndex = childRow;
					changed = true;
				}
			}
			document.getElementById('date_start_' + ancestorRow).value =
				document.getElementById('date_start_' + startDateIndex).value;
			document.getElementById('date_finish_' + ancestorRow).value =
				document.getElementById('date_finish_' + endDateIndex).value;
			document.getElementById('time_start_' + ancestorRow).value =
				document.getElementById('time_start_' + startDateIndex).value;
			document.getElementById('time_finish_' + ancestorRow).value =
				document.getElementById('time_finish_' + endDateIndex).value;
			//SUGAR.grid.calculateDuration(firstStartDate, lastEndDate, ancestorRow);
			SUGAR.grid.calculateDuration(document.getElementById('date_start_' + ancestorRow).value, document.getElementById('date_finish_' + ancestorRow).value, ancestorRow);
			SUGAR.gantt.changeTask(ancestorRow);
			return changed;
		},

		updateAllDependentsAfterDateChanges: function(row) {
			var extendedDependents = new Array();
			var extendedAncestors = new Array();
			if (indentedRows[row]) {
				var parentRow = indentedRows[row].parentRow;
				extendedAncestors[parseInt(parentRow)] = parseInt(parentRow);
			}

			if (dependents[row] && dependents[row].length > 0)
				extendedDependents = dependents[row].concat();

			while (extendedDependents && extendedDependents.length > 0) {
				var firstDependent = extendedDependents.shift();

				if (indentedRows[firstDependent]) {
					var parentRow = indentedRows[firstDependent].parentRow;
					extendedAncestors[parseInt(parentRow)] = parseInt(parentRow);
				}

				SUGAR.grid.calculateDatesAfterAddingPredecessors(firstDependent);
				if (dependents[firstDependent] && dependents[firstDependent].length > 0) {
					for (var j in dependents[firstDependent]) {
						extendedDependents.push(dependents[firstDependent][j]);
					}
				}
			}
//			extendedAncestors.sort(SUGAR.grid.sortNumber);
			for (var i in extendedAncestors) {
				SUGAR.grid.calculateParentDateDataAfterIndent(extendedAncestors[i]);
			}
		},
		/**
		 * updateAllDependentsAfterDateChanges: given a row, this function calculates and updates all
		 * start and finish dates for rows that have this row as its predecessor.
		 */
		 /*
		updateAllDependentsAfterDateChanges: function(row) {
			var extendedDependents = new Array();
			var extendendAncestors = new Array();

			var allAncestors = new Array();
			var ancestorLevels = 0;
			SUGAR.grid.getAncestors(row, allAncestors, ancestorLevels);
			if (allAncestors.length > 0) {
				for (var j in allAncestors) {
					if (SUGAR.grid.updateAncestorDates(allAncestors[j], row)){
						//extendedDependents.push(allAncestors[j]);
					}
				}
			}


			for (var i in dependents[row]) {
				SUGAR.grid.calculateDatesAfterAddingPredecessors(dependents[row][i]);
				var allAncestors = new Array();
				var ancestorLevels = 0;

				SUGAR.grid.getAncestors(dependents[row][i], allAncestors, ancestorLevels);
				if (allAncestors.length > 0) {
					for (var j in allAncestors) {
						if (SUGAR.grid.updateAncestorDates(allAncestors[j],dependents[row][i])){
							//extendedDependents.push(allAncestors[j]);
						}
					}
				}
				if (dependents[dependents[row][i]] != null) {
					for (var j in dependents[dependents[row][i]]) {
						extendedDependents.push(dependents[dependents[row][i]][j]);
					}
				}
			}

			while (extendedDependents.length > 0) {
				var firstDependent = extendedDependents.shift();
				SUGAR.grid.calculateDatesAfterAddingPredecessors(firstDependent);

				var allAncestors = new Array();
				var ancestorLevels = 0;
				SUGAR.grid.getAncestors(firstDependent, allAncestors, ancestorLevels);
				if (allAncestors.length > 0) {
					for (var j in allAncestors) {
						if (SUGAR.grid.updateAncestorDates(allAncestors[j],firstDependent))	{
						//	extendedDependents.push(allAncestors[j]);
						}
					}
				}

				if (dependents[firstDependent] != null) {
					for (var j in dependents[firstDependent]) {
						extendedDependents.push(dependents[firstDependent][j]);
					}
				}
			}
		},
		*/

		/**
		 * calculateParentDateDataAfterIndent: given a parent row, this function calculates the start and end
		 * dates for that row based on all its children's dates.
		 */
		calculateParentDateDataAfterIndent: function(parentRow) {
			if (SUGAR.grid.isLoaded){
				var allChildren = new Array();
				SUGAR.grid.getChildren(parentRow, allChildren);

				// We need to find a start date with the earliest start and the latest finish date
				var firstStartDate, lastEndDate, startDate, endDate;
				var startDateIndex, endDateIndex;
				for (var i = 0; i < allChildren.length; i++) {
					if (i == 0) {
						firstStartDate = SUGAR.grid.getJSDate(document.getElementById('date_start_' + allChildren[i]).value);
						firstStartTime = document.getElementById('time_start_' + allChildren[i]).value;
						lastEndDate = SUGAR.grid.getJSDate(document.getElementById('date_finish_' + allChildren[i]).value);
						lastEndTime = document.getElementById('time_finish_' + allChildren[i]).value;
						startDateIndex = allChildren[i];
						endDateIndex = allChildren[i];
					}
					startDate = SUGAR.grid.getJSDate(document.getElementById('date_start_' + allChildren[i]).value);
					startTime = document.getElementById('time_start_' + allChildren[i]).value;
					endDate = SUGAR.grid.getJSDate(document.getElementById('date_finish_' + allChildren[i]).value);
					endTime = document.getElementById('time_finish_' + allChildren[i]).value;

					if (startDate.getTime() < firstStartDate.getTime()) {
						firstStartDate = startDate;
						firstStartTime = startTime;
						startDateIndex = allChildren[i];
					}
					else if (startDate.getTime() == firstStartDate.getTime()) {
						if (startTime < firstStartTime) {
							firstStartDate = startDate;
							firstStartTime = startTime;
							startDateIndex = allChildren[i];
						}
					}
					if (endDate.getTime() > lastEndDate.getTime()) {
						lastEndDate = endDate;
						lastEndTime = endTime;
						endDateIndex = allChildren[i];
					}
					else if (endDate.getTime() == lastEndDate.getTime()) {
						if (endTime > lastEndTime) {
							lastEndDate = endDate;
							lastEndTime = endTime;
							endDateIndex = allChildren[i];
						}
					}
				}
				if (allChildren.length > 0) {
					document.getElementById('date_start_' + parentRow).value =
						document.getElementById('date_start_' + startDateIndex).value;
					document.getElementById('date_finish_' + parentRow).value =
						document.getElementById('date_finish_' + endDateIndex).value;
					document.getElementById('time_start_' + parentRow).value =
						document.getElementById('time_start_' + startDateIndex).value;
					document.getElementById('time_finish_' + parentRow).value =
						document.getElementById('time_finish_' + endDateIndex).value;
					SUGAR.grid.calculateDuration(firstStartDate, lastEndDate, parentRow);
					// Calling the functions that the onchange would call directly as the clearStartTime() in the onChange messes up the calcs.
					SUGAR.grid.calculateDuration(document.getElementById('date_start_' + parentRow).value, document.getElementById('date_finish_' + parentRow).value, parentRow);
					SUGAR.grid.updateAllDependentsAfterDateChanges(parentRow);
					SUGAR.gantt.changeTask(parentRow);
				}
			}
		},

		/**
		 * updateAncestorsTimeData: given a row, this function invokes helper function on all ancestors
		 * of that row to update their dates based on updates to this row.
		 */
		updateAncestorsTimeData: function(row, ancestors) {
			if (ancestors == null) {
				var allAncestors = new Array();
				var ancestorLevels = 0;
				var ancestorObj = SUGAR.grid.getAncestors(row, allAncestors, ancestorLevels);
				ancestorLevels = ancestorObj.ancestorLevels;
				allAncestors = ancestorObj.allAncestors;
				for (var i = 0; i < allAncestors.length; i++)
					SUGAR.grid.calculateParentDateDataAfterIndent(allAncestors[i]);
			}
			else {
				for (var i = 0; i < ancestors.length; i++)
					SUGAR.grid.calculateParentDateDataAfterIndent(ancestors[i]);
			}
		},

		/**
		 * updateAncestorsPercentComplete: given a row, this function invokes helper function on all ancestors
		 * of that row to compute the percent complete amount based on updates to the row's percent complete
		 * amount.
		 */
		updateAncestorsPercentComplete: function(row, ancestors) {
			if (ancestors == null) {
				var allAncestors = new Array();
				var ancestorLevels = 0;
				var ancestorObj = SUGAR.grid.getAncestors(row, allAncestors, ancestorLevels);
				ancestorLevels = ancestorObj.ancestorLevels;
				allAncestors = ancestorObj.allAncestors;
				for (var i = 0; i < allAncestors.length; i++) {
					SUGAR.grid.calculateCumulativePercentComplete(allAncestors[i]);
				}
			}
			else {
				for (var i = 0; i < ancestors.length; i++) {
					SUGAR.grid.calculateCumulativePercentComplete(ancestors[i]);
				}
			}
		},

		/**
		 * calculateCumulativePercentComplete: given a row, this function calculates its cumulative percent
		 * complete amount based on all it's children's amounts.
		 */
		calculateCumulativePercentComplete: function(row) {
			if (SUGAR.grid.isLoaded){
				var allChildren = new Array();
				SUGAR.grid.getChildren(row, allChildren);
				var totalHours = 0;
				var duration = 0;
				var cumulativeDone = 0;
				for (var i = 0; i < allChildren.length; i++) {
					// Quick and dirty way of figuring out if the current child node has any sub-children.
					// Just check to see if we have an expand/collapse icon there.
					var childNode = document.getElementById("description_" + allChildren[i] + "_divlink").innerHTML;
					if (childNode.search(".gif") == -1) {
						duration = parseInt(document.getElementById("duration_" + allChildren[i]).value);
						durationUnit = document.getElementById("duration_unit_" + allChildren[i]).value;
						if (duration == "")
							duration = 0;
						if (durationUnit == "Hours")
							totalHours += duration;
						else
							totalHours += (duration * workDayHours);

						var percentComplete = document.getElementById("percent_complete_" + allChildren[i]).value;
						if (percentComplete == "")
							percentComplete = 0;
						if (durationUnit == "Hours")
							cumulativeDone += duration * (percentComplete / 100);
						else
							cumulativeDone += (duration * workDayHours) * (percentComplete / 100);

					}
				}
				var cumulativePercentage = 0;
				if (totalHours != 0)
					cumulativePercentage = (cumulativeDone/totalHours)* 100;

				// Need to update the cumulative percentage only if we actually have children.
				if (allChildren.length > 0)
					// Round to 1 decimal place.
					document.getElementById("percent_complete_" + row).value = Math.round((cumulativePercentage * 10)/10);
			}
		},

		reCalculateDates: function() {
			for (var i = 1; i <= totalRowsInGrid; i++) {
				// Only do this for rows that haven't been deleted
				if (document.getElementById('date_start_' + i)) {
				 	SUGAR.grid.calculateEndDate(document.getElementById('date_start_' + i).value, document.getElementById('duration_' + i).value, i);
				 	SUGAR.grid.calculateDatesAfterAddingPredecessors(i);
					SUGAR.grid.updateAllDependentsAfterDateChanges(i);
					SUGAR.grid.updateAncestorsTimeData(i);
					SUGAR.gantt.changeTask(i);
				}
			}
		},


		/**
		 * expandAll: this function expands all the collapsed rows in the grid.
		 */
		expandAll: function() {
			for (var i = 1; i <= totalRowsInGrid; i++) {
				var elementId = "description_" + i + "_divlink";
				if (document.getElementById(elementId).innerHTML.search("Plus.gif") != -1) {
					document.getElementById(elementId).innerHTML =
						document.getElementById(elementId).innerHTML.replace(/Plus.gif/, "Minus.gif");
					var allChildren = new Array();
					SUGAR.grid.getChildren(i, allChildren);
					var lastChildRow = -1;
					for (var j = 0; j < allChildren.length; j++) {
						var actualRow = SUGAR.grid.getActualRow(allChildren[j]);
						if (actualRow > lastChildRow)
							lastChildRow = actualRow;
					}
					for (var j = parseInt(SUGAR.grid.getActualRow(i)) + 1; j <= lastChildRow; j++) {
						document.getElementById("project_task_row_" + SUGAR.grid.getMappedRow(j) ).style.display = "";
						SUGAR.gantt.showGanttRow(SUGAR.grid.getMappedRow(j));
					}
				}
			}
		},

		/**
		 * markAsMilestone: this function marks all the selected rows as milestone tasks.
		 */
		markAsMilestone: function() {
			if (selectedRows.length == 0)
				return;
			while (selectedRows.length != 0) {
				document.getElementById('is_milestone_' + selectedRows[0]).value = 1;
				if (document.getElementById('id_' + selectedRows[0] + '_divlink').innerHTML.search(/\*/) == -1){
					document.getElementById('id_' + selectedRows[0] + '_divlink').innerHTML += "*";
					SUGAR.gantt.markAsMilestone(selectedRows[0]);
				}
				SUGAR.grid.unSelectRow(selectedRows[0]);
			}
		},

		/**
		 * unMarkAsMilestone: this function un-marks all the selected rows as milestone tasks.
		 */
		unMarkAsMilestone: function() {
			if (selectedRows.length == 0)
				return;

			while (selectedRows.length != 0) {
				document.getElementById('is_milestone_' + selectedRows[0]).value = 0;
				if (document.getElementById('id_' + selectedRows[0] + '_divlink').innerHTML.search(/\*/) != -1){
					document.getElementById('id_' + selectedRows[0] + '_divlink').innerHTML = SUGAR.grid.getActualRow(selectedRows[0]);
					SUGAR.gantt.unMarkAsMilestone(selectedRows[0]);
				}
				SUGAR.grid.unSelectRow(selectedRows[0]);
			}
		},

		/**
		 * hideOptionalColumns: this function hides the optional grid columns.
		 */
		hideOptionalColumns: function() {
			optionalHidden = true;
			for (var i = 0; i <= totalRowsInGrid; i++) {
				if (document.getElementById('optional_' + i))
					document.getElementById('optional_' + i).style.display = 'none';
			}
		},

		/**
		 * showOptionalColumns: this function un-hides the optional grid columns.
		 */
		showOptionalColumns: function() {
			optionalHidden = false;
			for (var i = 0; i <= totalRowsInGrid; i++) {
				if (document.getElementById('optional_' + i))
					document.getElementById('optional_' + i).style.display = '';
			}
		},


		/**
		 * collapseAll: this function collapses all the expanded rows in the grid.
		 */
		collapseAll: function() {
			for (var i = 1; i <= totalRowsInGrid; i++) {
				var elementId = "description_" + i + "_divlink";
				if (document.getElementById(elementId).innerHTML.search("Minus.gif") != -1) {
					document.getElementById(elementId).innerHTML =
						document.getElementById(elementId).innerHTML.replace(/Minus.gif/, "Plus.gif");
					var allChildren = new Array();
					SUGAR.grid.getChildren(i, allChildren);
					var lastChildRow = -1;
					for (var j = 0; j < allChildren.length; j++) {
						var actualRow = SUGAR.grid.getActualRow(allChildren[j]);
						if (actualRow > lastChildRow)
							lastChildRow = actualRow;
					}
					for (var j = parseInt(SUGAR.grid.getActualRow(i)) + 1; j <= lastChildRow; j++) {
						document.getElementById("project_task_row_" + SUGAR.grid.getMappedRow(j) ).style.display = "none";
						SUGAR.gantt.hideGanttRow(SUGAR.grid.getMappedRow(j));
					}
				}
			}
		},

		/**
		 * expandCollapseRow: if the given row is expanded, this function collapses it and vice-versa.
		 */
		expandCollapseRow: function(row)
		{
			var allChildren = new Array();
			SUGAR.grid.getChildren(row, allChildren);

			var lastChildRow = -1;

			for (var i = 0; i < allChildren.length; i++) {
				var actualRow = SUGAR.grid.getActualRow(allChildren[i]);
				if (actualRow > lastChildRow)
					lastChildRow = actualRow;
			}

			var elementId = "description_" + row + "_divlink";

			if (document.getElementById(elementId).innerHTML.search("Minus.gif") != -1) {
				document.getElementById(elementId).innerHTML =
					document.getElementById(elementId).innerHTML.replace(/Minus.gif/, "Plus.gif");

				for (var i = parseInt(SUGAR.grid.getActualRow(row)) + 1; i <= lastChildRow; i++) {
					document.getElementById("project_task_row_" + SUGAR.grid.getMappedRow(i) ).style.display = "none";
					SUGAR.gantt.hideGanttRow(SUGAR.grid.getMappedRow(i));
				}
			}
			else {
				document.getElementById(elementId).innerHTML =
					document.getElementById(elementId).innerHTML.replace(/Plus.gif/, "Minus.gif");

				for (var i = parseInt(SUGAR.grid.getActualRow(row)) + 1; i <= lastChildRow; i++) {
					document.getElementById("project_task_row_" + SUGAR.grid.getMappedRow(i) ).style.display = "";
					SUGAR.gantt.showGanttRow(SUGAR.grid.getMappedRow(i));
				}
			}

			allChildren = new Array();
		},

		processStartDate: function(obj, row){
			if (SUGAR.grid.validateDate(obj) && SUGAR.grid.validateEndDateAfterStartDate(row)){
		  		SUGAR.grid.clearStartTime(row);
				SUGAR.grid.calculateDuration(obj.value, document.getElementById("date_finish_" + row).value, row);
				SUGAR.grid.updateAllDependentsAfterDateChanges(row);
				//SUGAR.grid.updateAncestorsTimeData(row);
				SUGAR.gantt.changeTask(row);
			}
		},
		processFinishDate: function(obj, row){
			if (SUGAR.grid.validateDate(obj) && SUGAR.grid.validateEndDateAfterStartDate(row)){
			  	SUGAR.grid.clearFinishTime(row);
				SUGAR.grid.calculateDuration(document.getElementById("date_start_" + row).value, obj.value, row);
				SUGAR.grid.updateAllDependentsAfterDateChanges(row);
				//SUGAR.grid.updateAncestorsTimeData(row);
				SUGAR.gantt.changeTask(row);
			}
		},

		/***********************************************************************************************/
		/* BEGIN - VALIDATION CODE																	   */
		/***********************************************************************************************/

		/**
		 * validatePercentComplete: given a percent complete widget, this function alerts the user if
		 * the entered values are less than 0 or greater than 100.
		 */
		validatePercentComplete: function(widget) {
			var widgetId = widget.id;
			if (widget.value < 0 || widget.value > 100 || !isNumeric(widget.value)) {
				alert(SUGAR.language.get('Project', 'ERR_PERCENT_COMPLETE'));
				widget.value = "";
				setTimeout("document.getElementById('" + widgetId + "').focus();",1);
				setTimeout("document.getElementById('" + widgetId + "').select();",1);
				return false;
			}
			return true;
		},

		validateDuration: function(widget) {
			var widgetId = widget.id;
			if (!isInteger(widget.value)) {
				alert(SUGAR.language.get('Project', 'ERR_DURATION'));
				widget.value = "";
				setTimeout("document.getElementById('" + widgetId + "').focus();",1);
				setTimeout("document.getElementById('" + widgetId + "').select();",1);
				return false;
			}
			return true;
		},

		validateEndDateAfterStartDate: function(row) {
			var startDate = document.getElementById('date_start_' + row).value;
			var endDate = document.getElementById('date_finish_' + row).value;
			var startDateObj = SUGAR.grid.getJSDate(startDate);
			var endDateObj = SUGAR.grid.getJSDate(endDate);
			if (endDateObj.getTime() < startDateObj.getTime()) {
				alert(SUGAR.language.get('Project', 'ERR_FINISH_DATE'));
				document.getElementById('date_finish_' + row).value = startDate;
				var widgetId = 'date_finish_' + row;
				setTimeout("document.getElementById('" + widgetId + "').focus();",1);
				setTimeout("document.getElementById('" + widgetId + "').select();",1);
				return false;
			}
			return true;
		},

		/**
		 * validateDate: given a date widget, this function alerts the user if
		 * the entered values fall on a weekend, and instead picks the first valid wokring day
		 */
		validateDate: function(widget) {
			var dateObj = SUGAR.grid.getJSDate(widget.value);
			var widgetId = widget.id;
			if (dateObj.getDay() == 0 || dateObj.getDay() == 6) {
				alert(SUGAR.language.get('Project', 'ERR_DATE'));
				// Bug 25082
				// When the selected date is a non-working day, pick the next valid working day
				dateObj = SUGAR.grid.getNextValidDate(dateObj).date;
			}

			// Bug 11790: If a user enters, Feb 30th as the date, JS automatically makes that March 2nd,
			// we need to update the UI with that value.
			var dateStr = SUGAR.grid.getDisplayDate(dateObj);
			widget.value = dateStr;
			// End of Bug 11790///////////////////////////////
			return true;
		},

		/**
		 * validatePredecessors: given a predecessor widget, this function alerts the user if
		 * the entered values are within range of the grid and if the value is actually a number.
		 */
		validatePredecessors: function(widget) {
			var predVals = widget.value.split(",");
			var widgetId = widget.id;

			for (var i = 0; i < predVals.length; i++) {
				predVals[i] = trim(predVals[i]);
				if (isNaN(predVals[i])) {
					alert(SUGAR.language.get('Project', 'ERR_PREDECESSORS_INPUT'));
					widget.value = "";
					setTimeout("document.getElementById('" + widgetId + "').focus();",1);
					setTimeout("document.getElementById('" + widgetId + "').select();",1);
					return false;
				}
				else if (parseInt(predVals[i]) > parseInt(totalRowsInGrid) || parseInt(predVals[i]) < 1) {
					alert(SUGAR.language.get('Project', 'ERR_PREDECESSORS_OUT_OF_RANGE'));
					widget.value = "";
					setTimeout("document.getElementById('" + widgetId + "').focus();",1);
					setTimeout("document.getElementById('" + widgetId + "').select();",1);
					return false;
				}
			}
			// Trim spaces if there are no other errors.
			widget.value = predVals.join(",");
			return true;
		},

		/**
		 * setDependencyCheckRow: this row marks the given row as the row that we're checking for
		 * dependency cycles.
		 */
		setDependencyCheckRow: function (row) {
			dependencyCheckRow = row;
		},

		validatePredecessorIsNotAncestorOrChild: function(row, setFocus) {
			var predecessorsVal = document.getElementById('predecessors_' + row).value;
			var predecessorsArray = predecessorsVal.split(",");
			if (setFocus == null)
				setFocus = true;
			var allAncestors = new Array();
			var ancestorLevels = 0;
			SUGAR.grid.getAncestors(row, allAncestors, ancestorLevels);
			for (var i = 0; i < predecessorsArray.length; i++) {
				for (var j = 0; j < allAncestors.length; j++) {
					if (predecessorsArray[i] == SUGAR.grid.getActualRow(allAncestors[j])) {
						document.getElementById('predecessors_' + row).value = "";
						if (setFocus) {
							alert(SUGAR.language.get('Project', 'ERR_PREDECESSOR_IS_PARENT_OR_CHILD_FAIL'));
							setTimeout("document.getElementById('predecessors_" + row + "').focus();",1);
							setTimeout("document.getElementById('predecessors_" + row + "').select();",1);
						}
						else {
							SUGAR.grid.updatePredecessorsAndDependents(row);
						}
						return false;
					}
				}
			}
			allAncestors = new Array();

			var allChildren = new Array();
			SUGAR.grid.getChildren(row, allChildren);

			for (var i = 0; i < predecessorsArray.length; i++) {
				for (var j = 0; j < allChildren.length; j++) {
					if (predecessorsArray[i] == SUGAR.grid.getActualRow(allChildren[j])) {
						document.getElementById('predecessors_' + row).value = "";
						if (setFocus) {
							alert(SUGAR.language.get('Project', 'ERR_PREDECESSOR_IS_PARENT_OR_CHILD_FAIL'));
							setTimeout("document.getElementById('predecessors_" + row + "').focus();",1);
							setTimeout("document.getElementById('predecessors_" + row + "').select();",1);
						}
						else {
							SUGAR.grid.updatePredecessorsAndDependents(row);
						}

						return false;
					}
				}
			}
			allChildren = new Array();

		},

		isAncestor: function(row, allAncestors) {
			for (var i = 0; i < allAncestors.length; i++) {
				if (SUGAR.grid.getActualRow(allAncestors[i]) == row)
					return true;
			}
			return false;
		},

		isChildsPredecessor: function (row, allChildren, allAncestors) {
			// Ugly nested for loop, but there's no other way around it.
			for (var i = 0; i < allChildren.length; i++) {
				var predecessorsVal = document.getElementById('predecessors_' + SUGAR.grid.getMappedRow(allChildren[i])).value;
				var predecessorsArray = predecessorsVal.split(",");
				for (var j = 0; j < predecessorsArray.length; j++) {
					if (predecessorsArray[j] == SUGAR.grid.getActualRow(row))
						return true;
					for (var k = 0; k < allAncestors.length; k++) {
						if (predecessorsArray[j] == SUGAR.grid.getActualRow(allAncestors[k]))
							return true;
					}
				}
			}
			for (var i = 0; i < allAncestors.length; i++) {
				var predecessorsVal = document.getElementById('predecessors_' + row).value;
				var predecessorsArray = predecessorsVal.split(",");
				for (var j = 0; j < predecessorsArray.length; j++) {
					if (SUGAR.grid.getActualRow(predecessorsArray[j]) == allAncestors[i])
						return true;
				}
			}
			return false;
		},

		/**
		 * validateDependencyCycles: given a row, this function recursively checks for dependency cyles in
		 * the predecessor values.
		 */
		validateDependencyCycles: function(row, allAncestors) {
			// Get the ancestors for the dependencyCheckRow.  This only happens the very first time.
			// We need to make sure that the predecessor is not an ancestor or this would cause a cycle.
			if (allAncestors == null) {
				var allAncestors = new Array();
				var ancestorLevels = 0;
				SUGAR.grid.getAncestors(row, allAncestors, ancestorLevels);
			}
//			debugger
			var predecessorsVal = document.getElementById('predecessors_' + row).value;
			if (predecessorsVal == "")
				return true;
			var predecessorsArray = predecessorsVal.split(",");
			for (var i = 0; i < predecessorsArray.length; i++) {

				// Make sure none of the predecessor's children have this row as a predecessor.
				var allChildren = new Array();
				SUGAR.grid.getChildren(predecessorsArray[i], allChildren);

				if (predecessorsArray[i] == SUGAR.grid.getActualRow(dependencyCheckRow) || SUGAR.grid.isAncestor(SUGAR.grid.getMappedRow(predecessorsArray[i]), allAncestors) ||
					SUGAR.grid.isChildsPredecessor(row, allChildren, allAncestors)) {
					alert(SUGAR.language.get('Project', 'ERR_PREDECESSOR_CYCLE_FAIL'));
					document.getElementById('predecessors_' + row).value = "";
					setTimeout("document.getElementById('predecessors_" + row + "').focus();",1);
					setTimeout("document.getElementById('predecessors_" + row + "').select();",1);
					SUGAR.grid.dependencyCheckFail = 1;
					return false;
				}
				SUGAR.grid.validateDependencyCycles(SUGAR.grid.getMappedRow(predecessorsArray[i]), allAncestors);
			}
			return true;
		},

		/***********************************************************************************************/
		/* END - VALIDATION CODE																	   */
		/***********************************************************************************************/

		/***********************************************************************************************/
		/* BEGIN - CODE FOR THE RIGHT MOUSE MENU													   */
		/***********************************************************************************************/
		setUpContextMenu: function() {
			if (document.getElementById('selected_view') && document.getElementById('selected_view').value <= 1) {
		        // Create the context menu
		        var oContextMenu = new YAHOO.widget.ContextMenu(
		                                "contextmenu",
		                                {trigger: gridName}
		                            );

		        var aMainMenuItems = new Array
		                (SUGAR.language.get('Project', 'LBL_INSERT_BUTTON'),
		                 SUGAR.language.get('Project', 'LBL_INDENT_BUTTON'),
		                 SUGAR.language.get('Project', 'LBL_OUTDENT_BUTTON'),
		                 SUGAR.language.get('Project', 'LBL_COPY_BUTTON'),
		                 SUGAR.language.get('Project', 'LBL_CUT_BUTTON'),
		                 SUGAR.language.get('Project', 'LBL_PASTE_BUTTON'),
		                 SUGAR.language.get('Project', 'LBL_DELETE_BUTTON'),
		                 SUGAR.language.get('Project', 'LBL_SAVE_BUTTON'),
		                 SUGAR.language.get('Project', 'LBL_EXPAND_ALL_BUTTON'),
		                 SUGAR.language.get('Project', 'LBL_COLLAPSE_ALL_BUTTON'),
		                 SUGAR.language.get('Project', 'LBL_MARK_AS_MILESTONE_BUTTON'),
		                 SUGAR.language.get('Project', 'LBL_UNMARK_AS_MILESTONE_BUTTON'),
		                 SUGAR.language.get('Project', 'LBL_HIDE_OPTIONAL_COLUMNS_BUTTON'),
		                 SUGAR.language.get('Project', 'LBL_SHOW_OPTIONAL_COLUMNS_BUTTON'),
		                 SUGAR.language.get('Project', 'LBL_VIEW_TASK_DETAILS_BUTTON'));
		                 //SUGAR.language.get('Project', 'LBL_RECALCULATE_DATES_BUTTON'));


		        var nMainMenuItems = aMainMenuItems.length;
		        var oMenuItem;

		        // Add items to the main menu
		        for(var i = 0; i < nMainMenuItems; i++) {
		        	if (aMainMenuItems[i]) {
						oMenuItem =
							new YAHOO.widget.ContextMenuItem(
						    	aMainMenuItems[i]
						);

						oMenuItem.clickEvent.subscribe(
			            	SUGAR.grid.onContextMenuItemClick,
		                    oMenuItem,
		                    true
		                );
			            oContextMenu.addItem(oMenuItem);
		            }
	            }

				oContextMenu.keyDownEvent.subscribe(
					SUGAR.grid.onContextMenuKeyDown,
					oContextMenu,
					true
				);
		        // Render the context menu
		         oContextMenu.render(document.body);
	       }
		},

		onContextMenuKeyDown: function(p_sType, p_sArguments, p_oMenu) {
		},

        onContextMenuItemClick: function(p_sType, p_aArguments, p_oItem) {
            var oLI =
                SUGAR.grid.GetListItemFromEventTarget(this.parent.contextEventTarget);
            switch(this.index) {
                case 0:     // Insert Row
                    SUGAR.grid.insertRow();
                	break;
                case 1:     // Indent
                    SUGAR.grid.indentSelectedRows();
                	break;
                case 2:     // Outdent
                    SUGAR.grid.addToOutdent();
                	break;
                case 3:     // Copy
                    SUGAR.grid.copyRow();
                	break;
                case 4:     // Cut
                    SUGAR.grid.cutRow();
                	break;
                case 5:     // Paste
                    SUGAR.grid.pasteRow();
                	break;
                case 6:     // Delete
                    SUGAR.grid.deleteRows();
                	break;
                case 7:     // Save
                    SUGAR.grid.save();
                	break;
                case 8:     // Expand All
                    SUGAR.grid.expandAll();
                	break;
                case 9:     // Collapse All
                    SUGAR.grid.collapseAll();
                	break;
				case 10: 	// Mark as Milestone
					SUGAR.grid.markAsMilestone();
					break;
				case 11: 	// Un-Mark as Milestone
					SUGAR.grid.unMarkAsMilestone();
					break;
				case 12: 	// Hide Optional Columns
					SUGAR.grid.hideOptionalColumns();
					break;
				case 13: 	// Show Optional Columns
					SUGAR.grid.showOptionalColumns();
					break;
				case 14: 	// View Task Details
					SUGAR.grid.viewTaskDetails();
					break;
					/*
				case 15: 	// Re-calculate dates
					SUGAR.grid.reCalculateDates();
					break;
					*/
            }
        },

        GetListItemFromEventTarget: function(p_oNode) {
            var oLI;
            if(p_oNode.tagName == "LI") {
                oLI = p_oNode;
            }
            else {
                /*
                     If the target of the event was a child of an LI,
                     get the parent LI element
                */
                do {
                    if(p_oNode.tagName == "LI") {
                        oLI = p_oNode;
                        break;
                    }
                }
                while((p_oNode = p_oNode.parentNode));
            }
            return oLI;
        },

		/***********************************************************************************************/
		/* END - CODE FOR THE RIGHT MOUSE MENU														   */
		/***********************************************************************************************/

		updateResourceFullNameAndType: function(row) {
			document.getElementById("resource_full_name_" + row).value =
			document.getElementById("resource_" + row).options[document.getElementById("resource_" + row).selectedIndex].innerHTML;
			document.getElementById("resource_type_" + row).value = resourceType[document.getElementById("resource_" + row).options[document.getElementById("resource_" + row).selectedIndex].value];
		},

		/**
		 * viewTaskDetails: this function loads the hidden iframe with the task details.
		 */
		viewTaskDetails: function () {
			if (selectedRows.length == 0)
				return;
			var row = selectedRows[0];
			var record = document.getElementById("obj_id_" + row).value;
			document.getElementById("task_detail_area_div").style.display = "";
			frames["task_detail_area_iframe"].location.href = "index.php?module=ProjectTask&fromGrid=1&show_js=1&action=EditView&record=" + record;
			window.setTimeout('SUGAR.grid.loadTaskDetailsDiv()', 2000);
		},

		/**
		 * loadTaskDetailsDiv: after the task detail hidden iframe is loaded, this function is called to
		 * load the visible div.
		 */
		loadTaskDetailsDiv: function() {
			document.getElementById("task_detail_area_div").innerHTML = frames["task_detail_area_iframe"].document.body.innerHTML;
			SUGAR.grid.unSelectRow(selectedRows[0]);
		},

		closeTaskDetails: function(){
			document.getElementById("task_detail_area_div").style.display = "none";
			document.getElementById("task_detail_area_div").innerHTML = '<img src="index.php?entryPoint=getImage&themeName='+SUGAR.themes.theme_name+'&imageName=img_loading.gif" border="0" />';
		},

		sortNumber: function(a, b) {
			return a - b
		},

		/**
		 * setUpCurrentUser: this function is called to set up current logged in user and the owner
		 * of the project.
		 */
		setUpCurrentUser: function (currUser, ownerId) {
			currentUser = currUser;
			owner = ownerId;
		},

		/**
		 * setupResourceOptions: this function is called to set up the resources dropdown that will be used
		 * in the grid.
		 */
		setupResourceOptions: function (resources) {
			isProjectTemplate = false;
			resourceOptionsString = "";
			resourceOptionsString += "<option value=''>----</option>";
			for (var i = 0; i < resources.length; i++) {
				resourceOptionsString += "<option value="+ resources[i].id +">" + resources[i].full_name + "</option>";
				resourceType[resources[i].id] = resources[i].type;
			}
		},

		setupDurationUnitsOptions: function (durationOptions) {
			durationUnitsOptionsString = "";
			//durationUnitsOptionsString += "<option value=''>----</option>";
			for (var i = 0; i < durationOptions.length; i++) {
				durationUnitsOptionsString += "<option value="+ durationOptions[i].key ;
				if (i == 0)
					durationUnitsOptionsString += " selected ";
				durationUnitsOptionsString += ">" + durationOptions[i].value + "</option>";

			}
		},

		setupHolidays: function (holidays) {
			for (var i = 0; i < holidays.length; i++) {
				if (resourceHolidays[holidays[i].resource] == null) {
					resourceHolidays[holidays[i].resource] = new Array();
				}
				resourceHolidays[holidays[i].resource][holidays[i].date] = 1;
			}
		},

		/**
		 * setupCalendar: this function is called to set up the JS calendar that is used for the start and end dates.
		 */
		setupCalendar: function(forRow, dateformat, bgcolor, name, minusImage, plusImage) {
			calendar_dateformat = dateformat;
			bg_color = bgcolor;
			gridName = name;
			imagePathProjectMinus = minusImage;
			imagePathProjectPlus = plusImage;

			if (!forRow) {
				for (var i = 1; i < document.getElementById(gridName).rows.length; i++) {
					Calendar.setup ({
						inputField : "date_start_" + i, ifFormat : calendar_dateformat, showsTime : false, button : "date_start_" + i, singleClick : true, step : 1, weekNumbers:false
					});
					Calendar.setup ({
						inputField : "date_finish_" + i, ifFormat : calendar_dateformat, showsTime : false, button : "date_finish" + i, singleClick : true, step : 1, weekNumbers:false
					});

					//totalRowsInGrid++;
				}
			}
			else {
				Calendar.setup ({
					inputField : "date_start_" + forRow, ifFormat : calendar_dateformat, showsTime : false, button : "date_start_" + forRow, singleClick : true, step : 1, weekNumbers:false
				});
				Calendar.setup ({
					inputField : "date_finish_" + forRow, ifFormat : calendar_dateformat, showsTime : false, button : "date_finish" + forRow, singleClick : true, step : 1, weekNumbers:false
				});
			}
		},


		setUpGrid: function(name, dateformat, bgcolor, headers) {
			bg_color = bgcolor;
			calendar_dateformat = dateformat;
			gridName = name;
			headerCols = headers;


	        gridTable = document.createElement('table');
	        gridTable.setAttribute('id', name);
	        gridTable.setAttribute('width', "100%");
	        gridTable.setAttribute('border', "1");
	        gridTable.setAttribute('cellpadding', '0');
	        gridTable.setAttribute('cellspacing', '0');

	        headerRow = document.createElement('tr');
	        headerRow.setAttribute('bgcolor', bgcolor);
	        headerRow.setAttribute('height', '50');

	        for (var i = 0; i < headers.length; i++) {
		        th = document.createElement('th');
				th.innerHTML = headers[i].name;
				headerRow.appendChild(th);
	        }
	        gridTable.appendChild(headerRow);

			document.getElementById("grid_space").appendChild(gridTable);
		},


		/***********************************************************************************************/
		/* START - INITAL INDENTATION SET UP 														   */
		/***********************************************************************************************/

		setUpIndentedRow: function(row, parentRow) {
			totalRowsInGrid = row;
			if (parentRow) {
				var rowObj = new Array();
				rowObj.parentRow = parentRow;
				rowObj.levelsIndented = 1;
				rowObj.childrenRows = new Array();
				indentedRows[row] = rowObj;
			}
		},

		adjustInitialIndentedRows: function() {
			for (var i = 1; i <= totalRowsInGrid; i++) {
				if (indentedRows[i]) {
					var allAncestors = new Array();
					var ancestorLevels = 0;
					var ancestorObj = SUGAR.grid.getAncestors(i, allAncestors, ancestorLevels);
					ancestorLevels = ancestorObj.ancestorLevels;
					allAncestors = ancestorObj.allAncestors;
					indentedRows[i].levelsIndented = ancestorLevels;
					SUGAR.grid.indentRow(i, false);
				}
			}
		},

		/***********************************************************************************************/
		/* END - INITAL INDENTATION SET UP  														   */
		/***********************************************************************************************/


		/***********************************************************************************************/
		/* START - SAVE FUNCTIONS		     														   */
		/***********************************************************************************************/

		success: function(o) {
			ajaxStatus.hideStatus();
			eval(o.responseText);
//			debugger
			for (var i = 1; i <= totalRowsInGrid; i++) {
				if (result[i]) {
					document.getElementById("obj_id_" + i).value = result[i];
				}
			}
			document.getElementById('deletedRows').value = "";
			document.getElementById("saveGridLink").style.visibility="";
		},

		failure: function(o) {
			ajaxStatus.hideStatus();
			//debugger
		},

		validateGridForSave: function() {
			for (var i = 1; i <= totalRowsInGrid; i++) {
				if (document.getElementById("description_" + i) &&
					document.getElementById("description_" + i).value == "") {
					alert(SUGAR.language.get('Project', 'ERR_TASK_NAME_FOR_ROW') + SUGAR.grid.getActualRow(i) + SUGAR.language.get('Project', 'ERR_IS_EMPTY'));
					return false;
				}
			}
			return true;
		},

		save: function() {
			if (SUGAR.grid.validateGridForSave()) {
				document.getElementById("numRowsToSave").value = totalRowsInGrid;
				document.getElementById('EditView').action.value='SaveGrid';
				document.getElementById("saveGridLink").style.visibility="hidden";
				ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_SAVING'));
				YAHOO.util.Connect.setForm(document.getElementById("EditView"));
				openConnection = YAHOO.util.Connect.asyncRequest('POST', 'index.php', {success: SUGAR.grid.success, failure: SUGAR.grid.failure});
			}
		},
		/***********************************************************************************************/
		/* END - SAVE FUNCTIONS		     														   	   */
		/***********************************************************************************************/

		exportToPDF: function() {
			document.getElementById("numRowsToSave").value = totalRowsInGrid;
			if(document.getElementById("pdfclass").value == "EZPDF"){
			    document.getElementById('EditView').action.value='Layouts';
			}else{
				document.getElementById('EditView').action.value='sugarpdf';
			}
			document.getElementById('EditView').submit();

		},

		showProjectButtons: function (view) {
			if (view == "grid_only") {
				document.getElementById('grid_buttons_span').style.display = "";
				document.getElementById('gantt_buttons_span').style.display = "none";;
				document.getElementById('exportToPDFSpan').style.display = "";;
			}

			else if (view == "gantt_only") {
				document.getElementById('gantt_buttons_span').style.display = "";;
				document.getElementById('grid_buttons_span').style.display = "none";
				document.getElementById('exportToPDFSpan').style.display = "none";;
			}
			else {
				document.getElementById('grid_buttons_span').style.display = "";
				document.getElementById('gantt_buttons_span').style.display = "";
				document.getElementById('exportToPDFSpan').style.display = "";;
			}
		},

		/**
		 * changeView: this function is called when the view filter is changed.
		 */
		changeView: function() {
			document.getElementById("selected_view").value = document.getElementById("gridViewSelect").value;
			document.forms['EditView'].action.value	= "EditGridView";
			document.forms['EditView'].to_pdf.value	= "0";

			if (parseInt(document.getElementById("gridViewSelect").value) == 5) {
				document.getElementById("view_filter_resource").style.display = "";
				document.getElementById("view_filter_date_start").style.display = "none";
				document.getElementById("view_filter_date_finish").style.display = "none";
				document.getElementById("view_filter_6_start_span").style.display = "none";
				document.getElementById("view_filter_6_finish_span").style.display = "none";
				var filterDiv = document.getElementById("view_filter_button_span");
				if (document.getElementById('view_filter_button') == null) {
					var button = document.createElement('input');
					button.setAttribute('type', 'button');
					button.setAttribute('id', 'view_filter_button');
					//button.setAttribute('class', 'button');
					button.setAttribute('value', SUGAR.language.get('Project', 'LBL_FILTER_VIEW'));
					button.onclick = function() {document.getElementById("EditView").submit();};
					filterDiv.appendChild(button);
				}
				document.getElementById('view_filter_button').className = "button";
			}
			else if (parseInt(document.getElementById("gridViewSelect").value) == 6) {
				document.getElementById("view_filter_date_start").style.display = "";
				document.getElementById("view_filter_date_finish").style.display = "";
				document.getElementById("view_filter_resource").style.display = "none";
				var filterDiv = document.getElementById("view_filter_button_span");
				document.getElementById("view_filter_6_start_span").style.display = "";
				document.getElementById("view_filter_6_finish_span").style.display = "";
				if (document.getElementById('view_filter_button') == null) {
					var button = document.createElement('input');
					button.setAttribute('type', 'button');
					//button.setAttribute('class', 'button');
					button.setAttribute('id', 'view_filter_button');
					button.setAttribute('value', SUGAR.language.get('Project', 'LBL_FILTER_VIEW'));
					button.onclick = function() {document.getElementById("EditView").submit();};
					filterDiv.appendChild(button);
				}
				document.getElementById('view_filter_button').className = "button";
				Calendar.setup ({inputField : "view_filter_date_start", ifFormat : calendar_dateformat, showsTime : false, button : "view_filter_date_start", singleClick : true, step : 1, weekNumbers:false});
				Calendar.setup ({inputField : "view_filter_date_finish", ifFormat : calendar_dateformat, showsTime : false, button : "view_filter_date_finish", singleClick : true, step : 1, weekNumbers:false});
			}
			else
				document.getElementById("EditView").submit();

		},

		gridNotLoaded: function(){
			SUGAR.grid.isLoaded = false;
		},
		gridLoaded: function() {
			SUGAR.grid.isLoaded = true;
		},
        onAfterInsertRow: function() {}


};
}();

if(typeof YAHOO != 'undefined') YAHOO.util.Event.addListener(window, 'load', SUGAR.grid.setUpContextMenu);