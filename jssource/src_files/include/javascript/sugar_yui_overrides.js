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


// Any YUI overrides can go in here

//Override for bugfixes 45438 & 45557
YAHOO.widget.Panel.prototype.configClose = function (type, args, obj) {
    var val = args[0],
        oClose = this.close,
        strings = this.cfg.getProperty("strings"),
        fc;

    if (val) {
        if (!oClose) {

            if (!this.m_oCloseIconTemplate) {
                this.m_oCloseIconTemplate = document.createElement("a");
                this.m_oCloseIconTemplate.className = "container-close";
                this.m_oCloseIconTemplate.href = "#";
            }

            oClose = this.m_oCloseIconTemplate.cloneNode(true);

            fc = this.innerElement.firstChild;

            if (fc) {
                if (fc.className == this.m_oCloseIconTemplate.className) {
                    this.innerElement.replaceChild(oClose, fc);
                } else {
                    this.innerElement.insertBefore(oClose, fc);
                }
            } else {
                this.innerElement.appendChild(oClose);
            }

            oClose.innerHTML = (strings && strings.close) ? strings.close : "&#160;";

            YAHOO.util.Event.on(oClose, "click", this._doClose, this, true);

            this.close = oClose;

        } else {
            oClose.style.display = "block";
        }

    } else {
        if (oClose) {
            oClose.style.display = "none";
        }
    }
}

// Override for bug45669
// The fix is moving the code into this file 'as is'
YAHOO.widget.Overlay.prototype.center = function() {
	var scrollX = document.documentElement.scrollLeft || document.body.scrollLeft;
	var scrollY = document.documentElement.scrollTop || document.body.scrollTop;

	var viewPortWidth = YAHOO.util.Dom.getClientWidth();
	var viewPortHeight = YAHOO.util.Dom.getClientHeight();

	var elementWidth = this.element.offsetWidth;
	var elementHeight = this.element.offsetHeight;

	var x = (viewPortWidth / 2) - (elementWidth / 2) + scrollX;
	var y = (viewPortHeight / 2) - (elementHeight / 2) + scrollY;

	this.element.style.left = parseInt(x, 10) + "px";
	this.element.style.top = parseInt(y, 10) + "px";
	this.syncPosition();

	this.cfg.refireEvent("iframe");
}

// Override for bug45837
YAHOO.SUGAR.DragDropTable.prototype._deleteTrEl = function(row) {
    var rowIndex;

    // Get page row index for the element
    if(!YAHOO.lang.isNumber(row)) {
        rowIndex = Dom.get(row).sectionRowIndex;
    }
    else {
        rowIndex = row;
    }
    if(YAHOO.lang.isNumber(rowIndex) && (rowIndex > -1) && (rowIndex < this._elTbody.rows.length)) {
        // Cannot use tbody.deleteRow due to IE6 instability
        //return this._elTbody.deleteRow(rowIndex);
        return this._elTbody.removeChild(this._elTbody.rows[row]);
    }
    else {
        return null;
    }
}