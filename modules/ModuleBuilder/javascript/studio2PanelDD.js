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



Studio2.PanelDD = function(id, sGroup) {
	Studio2.PanelDD.superclass.constructor.call(this, id, sGroup);

    var el = this.getDragEl();
	YAHOO.util.Dom.setStyle(el, "opacity", 0.67) // The proxy is slightly transparent
    this.goingUp = false;
    this.lastY = 0;
};

	
YAHOO.extend(Studio2.PanelDD, YAHOO.util.DDProxy, {

    startDrag: function(x, y) { 	
		var Dom = YAHOO.util.Dom;
		// make the proxy look like the source element
		var dragEl = this.getDragEl();
		var clickEl = this.getEl();
		dragEl.className = clickEl.className;
		dragEl.innerHTML = "";
		Studio2.copyChildren(clickEl, dragEl);
		this.deletePanel = false;
		Studio2.copyId = null;
		dragEl.style.width = clickEl.offsetWidth + "px";
		dragEl.style.height = clickEl.offsetHeight + "px";

		if (Studio2.establishLocation(clickEl) == 'toolbox') {
			var copy = Studio2.newPanel();
			Studio2.setCopy(copy);
			clickEl.parentNode.insertBefore(copy,clickEl.nextSibling);
            // must make it visible - the css sets rows outside of panel to invisible
            Dom.setStyle(copy, 'display','block');
            Dom.setStyle(clickEl, "display","none");
        }

		Dom.setStyle(clickEl, "visibility", "hidden");
        Studio2.setScrollObj(this);
    },

    endDrag: function(e) {
		ModuleBuilder.state.isDirty=true;
        Studio2.clearScrollObj();
//  	alert("endDrag");
     
        var srcEl = this.getEl();
        var proxy = this.getDragEl();      
        var proxyid = proxy.id;
        var thisid = this.id;
        
        if (this.deletePanel) {
            Studio2.removeElement(srcEl);
			// If we've just removed the last panel then we need to put an empty panel back in
			proxy.innerHTML = '';
        	Studio2.tidyPanels();
            //Check if this is the toolbox panel which must be re-activitated
            if (Studio2.isSpecial(srcEl))
            {
                Studio2.setSpecial(Studio2.copy());
				Studio2.activateCopy();
				YAHOO.util.Dom.setStyle(Studio2.copy(), "display", "block");
            }
        } else {
        
	        // Show the proxy element and animate it to the src element's location
        	YAHOO.util.Dom.setStyle(proxy, "visibility", "");
        	YAHOO.util.Dom.setStyle(srcEl, "display",""); // display!=none for getXY to work
	        
			//Ext.get(proxy).alignTo(srcEl, 'tl', null, {callback:function(){
        	YAHOO.util.Dom.setStyle(proxyid, "visibility", "hidden");
        	YAHOO.util.Dom.setStyle(thisid, "visibility", "");
		
        //});
	
			if (Studio2.isSpecial(srcEl)) {
				if (Studio2.establishLocation(srcEl) == 'panels') {
					// dropping on the panels means that the panel is no longer special
					Studio2.unsetSpecial(srcEl);
					// add in the template row to the new panel
					var newRow = Studio2.newRow(false);
					srcEl.appendChild(newRow);
					// bug 16470: change the panel title to make it unique
					var view = document.getElementById('prepareForSave').view.value;
					var view_module = document.getElementById('prepareForSave').view_module.value
					var panelLabel = document.getElementById("le_panelid_"+srcEl.id).childNodes[0].nodeValue.toUpperCase() ;
					var panelLabelNoID = 'lbl_' + view +  '_panel';
                    var panelNumber = panelLabel.substring(panelLabelNoID.length) ;
					var panelDisplay = SUGAR.language.get('ModuleBuilder', 'LBL_NEW_PANEL') + ' ' + panelNumber ;
					document.getElementById("le_panelname_"+srcEl.id).childNodes[0].nodeValue =  panelDisplay ;
					var params = { module: 'ModuleBuilder' , action: 'saveProperty', view_module: view_module }
					if (document.getElementById('prepareForSave').view_package)
					{
					   params ['view_package'] = document.getElementById('prepareForSave').view_package.value ;
					}
					params [ 'label_'+panelLabel ] = panelDisplay ;
					YAHOO.util.Connect.asyncRequest(
						"POST",
						'index.php',
						false,
						SUGAR.util.paramsToUrl(params)
                    );
					Studio2.activateElement(newRow);
					Studio2.setSpecial(Studio2.copy());
					Studio2.activateCopy();
					YAHOO.util.Dom.setStyle(Studio2.copy(), "display", "block");
				}
				else
				{
					// we have a special panel that hasn't been moved to the panels area - invalid drop, so remove the copy if there is one
					var copy = document.getElementById(Studio2.copyId);
					copy.parentNode.removeChild(copy);
					Studio2.copyID = null;
				}
			}
		}
    },

	onInvalidDrop: function(e) {
//		alert("invalid");
		var srcEl = this.getEl();
		var dragEl = this.getDragEl();
		dragEl.innerHTML = '';
        Studio2.clearScrollObj();

	},
	
    onDragDrop: function(e, id) {
//		alert("ondragdrop");
		
		var srcEl = this.getEl();
		var destEl = document.getElementById(id); // where this element is being dropped
		
		// if source was in a panel (not toolbox) and destination is the delete area then remove this element
		if ((Studio2.establishLocation(srcEl) == 'panels') && (Studio2.establishLocation(destEl) == 'delete')) {
			this.deletePanel = true;
			//Studio2.removeElement(srcEl);
		}
    },

    onDrag: Studio2.onDrag,

    onDragOver: function(e, id) {
        var srcEl = this.getEl();
		var destEl = YAHOO.util.Dom.get(id);
		var dragEl = this.getDragEl();
        var loc = Studio2.establishLocation(destEl);
        if ((loc == 'panels') && (destEl.className.indexOf('le_panel') != -1)) {
        	YAHOO.util.Dom.setStyle(srcEl, 'visibility','hidden');
        	YAHOO.util.Dom.setStyle(srcEl, 'display','block');
        	var orig_p = srcEl.parentNode;
            var p = destEl.parentNode;
            
            var mid = YAHOO.util.Dom.getY(destEl) + (destEl.offsetHeight / 2);

            if (YAHOO.util.Dom.getY(dragEl) < mid) {
				p.insertBefore(srcEl, destEl); // insert above
            } else {
                p.insertBefore(srcEl, destEl.nextSibling); // insert below
            }
        }

    }
});


