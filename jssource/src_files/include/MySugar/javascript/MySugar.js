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



initMySugar = function(){
SUGAR.mySugar = function() {
	var originalLayout = null;
	var configureDashletId = null;
	var currentDashlet = null;
	var leftColumnInnerHTML = null;
	var leftColObj = null;
	var maxCount;
	var warningLang;

    var closeDashletsDialogTimer = null;
	
	var num_pages = numPages;
	var activeTab = activePage;
	var current_user = current_user_id;
	
	var module = moduleName;
	var cookiePageIndex;
	
	var charts = new Object();
	
	if (module == 'Dashboard'){
		cookiePageIndex = current_user + "_activeDashboardPage";
	}
	else{
		cookiePageIndex = current_user + "_activePage";
	}
	
	var homepage_dd;
	
	var populatedReportCharts = false;

	return {
		togglePages: function(activePage){
		    var pageId = 'pageNum_' + activePage;
		    activeDashboardPage = activePage;
		    activeTab = activePage;
		
		    Set_Cookie(cookiePageIndex,activePage,3000,false,false,false);
		    
		    //hide all pages first for display purposes
		    for(var i=0; i < num_pages; i++){
		        var pageDivId = 'pageNum_'+i+'_div';
		        var pageDivElem = document.getElementById(pageDivId);
		        pageDivElem.style.display = 'none';
		    }
		
		    for(var i=0; i < num_pages; i++){
		        var tabId = 'pageNum_'+i;
		        var anchorId = 'pageNum_'+i+'_anchor';
		        var pageDivId = 'pageNum_'+i+'_div';
		
		        var tabElem = document.getElementById(tabId);
		        var anchorElem = document.getElementById(anchorId);
		        var pageDivElem = document.getElementById(pageDivId);

		        if(tabId == pageId){
		            if(!SUGAR.mySugar.pageIsLoaded(pageDivId))
		                SUGAR.mySugar.retrievePage(i);
		
		            tabElem.className = 'active';
		            anchorElem.className = 'current';
		            pageDivElem.style.display = 'inline';
		        }
		        else{
		            tabElem.className = '';
		            anchorElem.className = '';
		        }
		    }
		},
		
        deletePage: function(){
            var pageNum = activeTab;
            var tabListElem = document.getElementById('tabList');
            var removeResult = '';

            if(confirm(SUGAR.language.get('app_strings', 'LBL_DELETE_PAGE_CONFIRM')))
                window.location = "index.php?module="+module+"&action=DynamicAction&DynamicAction=deletePage&pageNumToDelete="+pageNum;
        },		

		renamePage: function(pageNum){
		    SUGAR.mySugar.toggleSpansForRename(pageNum);
		    document.getElementById('pageNum_'+pageNum+'_name_input').focus();
		},
		
		toggleSpansForRename: function(pageNum){
		    var tabInputSpan = document.getElementById('pageNum_'+pageNum+'_input_span');
		    var tabLinkSpan = document.getElementById('pageNum_'+pageNum+'_link_span');
		
		    if(tabLinkSpan.style.display == 'none'){
		        tabLinkSpan.style.display = 'inline';
		        tabInputSpan.style.display = 'none';
		    }
		    else{
		        tabLinkSpan.style.display = 'none';
		        tabInputSpan.style.display = 'inline';
		    }
		},	
		
        savePageTitle: function(pageNum,newTitleValue)
        {
            var currentTitleValue = document.getElementById('pageNum_'+pageNum+'_name_hidden_input').value;

			if(newTitleValue == ''){
				newTitleValue = currentTitleValue;
				alert(SUGAR.language.get('app_strings', 'ERR_BLANK_PAGE_NAME'));
			}
            else if(newTitleValue != currentTitleValue)
            {
                ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_SAVING_PAGE_TITLE'));

                url = 'index.php?DynamicAction=savePageTitle&action=DynamicAction&module='+module+'&to_pdf=1&newPageTitle='+YAHOO.lang.JSON.stringify(newTitleValue)+'&pageId='+pageNum;

                var setPageTitle = function(data)
                {
                    var pageTextSpan = document.getElementById('pageNum_'+pageNum+'_title_text');
                    
                    pageTextSpan.innerHTML = data.responseText;
                    document.getElementById('pageNum_'+pageNum+'_name_input').value = data.responseText;
                    document.getElementById('pageNum_'+pageNum+'_name_hidden_input').value = data.responseText;
                    loadedPages.splice(pageNum,1);
                    ajaxStatus.hideStatus();
                }
                var cObj = YAHOO.util.Connect.asyncRequest('GET', url, {success: setPageTitle, failure: setPageTitle}, null);
            }

			var pageTextSpan = document.getElementById('pageNum_'+pageNum+'_title_text');
			pageTextSpan.innerHTML = newTitleValue;

            SUGAR.mySugar.toggleSpansForRename(pageNum);
        },

		pageIsLoaded: function(pageDivId){
		    for(var count=0; count < loadedPages.length; count++)
		    {
		        if(loadedPages[count] == pageDivId)
		            return true;
		    }
		    return false;
		},
		
		retrieveChartDashlet: function(name, xmlFile, width, height){
			var chartDiv = document.getElementById(name + '_div');
			
			chartDiv.style.width = width;
			chartDiv.style.height = height;
		},
		

        retrievePage: function(pageNum){
			if (document.getElementById('loading_c'))
                document.getElementById('loading_c').style.display = '';
			SUGAR.mySugar.loading.show();

            var pageCount = num_pages;
            var addPageElem = document.getElementById('add_page');
            var tabListElem = document.getElementById('tabList');

            url = 'index.php?action=DynamicAction&DynamicAction=retrievePage&module='+module+'&to_pdf=1&pageId='+pageNum;

            var populatePage = function(data) {
                var response = {html:"", script:""};
                try {
                    response = YAHOO.lang.JSON.parse(data.responseText);
                }
                catch(e){
                    if (typeof(console) != "undefined" && typeof(console.log) == "function")
                        console.log(e);
                }
                var htmlRepsonse = response['html'];
                eval(response['script']);
                
                var pageDivElem = document.getElementById('pageNum_'+pageNum+'_div');

                pageDivElem.innerHTML = htmlRepsonse;
                loadedPages[loadedPages.length] = 'pageNum_'+pageNum+'_div';
                
                //-------------------------------------------------------------------------
                //-------------------start new registration for drag drop--------------------
                var counter = SUGAR.mySugar.homepage_dd.length;

                if(YAHOO.util.DDM.mode == 1 && typeof(scriptResponse) != 'undefined') {
                    for(i in scriptResponse['newDashletsToReg']) {
                        SUGAR.mySugar.homepage_dd[counter] = new ygDDList('dashlet_' + scriptResponse['newDashletsToReg'][i]);
                        SUGAR.mySugar.homepage_dd[counter].setHandleElId('dashlet_header_' + scriptResponse['newDashletsToReg'][i]);
                        SUGAR.mySugar.homepage_dd[counter].onMouseDown = SUGAR.mySugar.onDrag;
                        SUGAR.mySugar.homepage_dd[counter].afterEndDrag = SUGAR.mySugar.onDrop;
                        counter++;
                    } 
                }


                			
                //custom chart code
				SUGAR.mySugar.sugarCharts.addToChartsArrayJson(scriptResponse['chartsArray'],pageNum);
				
				
                if(YAHOO.util.DDM.mode == 1) {
                    for(var wp = 0; wp < scriptResponse['numCols']; wp++) {
                        SUGAR.mySugar.homepage_dd[counter++] = new ygDDListBoundary('page_'+pageNum+'_hidden' + wp);
                    }
                }
                //-------------------end new registration for drag drop--------------------
                //-------------------------------------------------------------------------

                ajaxStatus.hideStatus();
			   	if(scriptResponse['trackerScript']){
					SUGAR.util.evalScript(scriptResponse['trackerScript']);
					if(typeof(trackerGridArray) != 'undefined' && trackerGridArray.length > 0) {
					   for(x in trackerGridArray) {
				          if(typeof(trackerGridArray[x]) != 'function') {
					          trackerDashlet = new TrackerDashlet();
					          trackerDashlet.init(trackerGridArray[x]);
				          }
					   }
					}
				}
				if(scriptResponse['dashletScript']){
					SUGAR.util.evalScript(scriptResponse['dashletScript']);	
				}
				if(scriptResponse['toggleHeaderToolsetScript']){
					SUGAR.util.evalScript(scriptResponse['toggleHeaderToolsetScript']);	
				}
				if(scriptResponse['dashletCtrl']){
					SUGAR.util.evalScript(scriptResponse['dashletCtrl']);			
				}
				//custom chart code
                SUGAR.mySugar.sugarCharts.loadSugarCharts(pageNum);
                
                SUGAR.util.evalScript(htmlRepsonse);
                
                //refresh page when user resizes window


				SUGAR.mySugar.loading.hide();                                                  
				if (document.getElementById('loading_c'))
                    document.getElementById('loading_c').style.display = 'none';
            }

            var cObj = YAHOO.util.Connect.asyncRequest('GET', url,
                                                  {success: populatePage, failure: populatePage}, null);                                                 


        },
        
        showAddPageDialog: function(){
            if ( document.getElementById('addPageDialog_c') == null ) { setTimeout(SUGAR.mySugar.showAddPageDialog,100); return false; }
			document.getElementById('addPageDialog_c').style.display = '';
        	SUGAR.mySugar.addPageDialog.show();        	
			SUGAR.mySugar.addPageDialog.configFixedCenter(null, false) ;
        },
        
		addTab: function(newPageName,numCols){
			var pageCount = num_pages;
			var tabListElem = document.getElementById('tabList');
			var addPageElem = document.getElementById('add_page');
			var dashletCtrlsElem = document.getElementById('dashletCtrls');
			var contentElem = document.getElementById('content');
			var tabListContainerElem = document.getElementById('tabListContainer');
			var contentElemWidth = contentElem.offsetWidth - 3;
			var addPageElemWidth = addPageElem.offsetWidth + 2;
			var dashletCtrlsElemWidth = dashletCtrlsElem.offsetWidth;
			var tabListElemWidth = tabListElem.offsetWidth;
			var maxWidth = contentElemWidth-(dashletCtrlsElemWidth+addPageElemWidth+2);

			url = 'index.php?DynamicAction=addPage&action=DynamicAction&module='+module+'&to_pdf=1&numCols='+numCols+'&pageName='+YAHOO.lang.JSON.stringify(newPageName);

			var addBlankPage = function(data) {
				//check to see if a user preference error occurred
				
			    var pageContainerDivElem = document.getElementById('pageContainer');
			    var newPageId = 'pageNum_' + pageCount + '_div';
			    var newPageDivElem = document.createElement('div');
			
			    newPageDivElem.id = newPageId;
			    newPageDivElem.innerHTML = data.responseText;
			    newPageDivElem.style.display = 'none';
			
			    pageContainerDivElem.insertBefore(newPageDivElem,document.getElementById('addPageDialog_c'));
			    loadedPages[num_pages] = newPageDivElem.id;
			
			    ajaxStatus.hideStatus();		    
			    
                ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_NEW_PAGE_FEEDBACK'));
                window.setTimeout('ajaxStatus.hideStatus()', 7500);
				
				var new_tab = document.createElement("li");
				new_tab.id = 'pageNum_' + num_pages;
				
				var new_anchor = document.createElement("a");
				new_anchor.id = 'pageNum_' + num_pages + '_anchor';
				new_anchor.className = 'active';
				new_anchor.href = "javascript:SUGAR.mySugar.togglePages('" + num_pages + "');"
				
				newPageName = newPageName.replace(/\\'/g,"'"); // Takes out the escaped quotes like \"

				new_anchor.appendChild(SUGAR.mySugar.insertInputSpanElement(num_pages, newPageName));
				new_anchor.appendChild(SUGAR.mySugar.insertTabNameDisplay(num_pages, newPageName));

				var new_delete_img = document.createElement("img");
				new_delete_img.id = 'pageNum_' + num_pages + '_delete_page_img';
				new_delete_img.className = 'deletePageImg';
				new_delete_img.style.display = 'none';
				new_delete_img.onclick = function() {return SUGAR.mySugar.deletePage();};
				new_delete_img.src = 'index.php?entryPoint=getImage&imageName=info-del.png';
				new_delete_img.border = 0;
				new_delete_img.align = 'absmiddle';

				new_anchor.appendChild(new_delete_img);

				new_tab.appendChild(new_anchor);
				tabListElem.appendChild(new_tab);
				if(tabListElemWidth + new_tab.offsetWidth > maxWidth) {
						tabListContainerElem.style.width = maxWidth+"px";
						tabListElem.style.width = tabListElemWidth + new_tab.offsetWidth+"px";
						tabListContainerElem.setAttribute("className","active yui-module yui-scroll");
						tabListContainerElem.setAttribute("class","active yui-module yui-scroll");
					}

	//			SUGAR.mySugar.togglePages(num_pages);
				num_pages = num_pages + 1;			
				
                SUGAR.mySugar.togglePages(pageCount);
			}

            ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_CREATING_NEW_PAGE'));
			var cObj = YAHOO.util.Connect.asyncRequest('GET', url,
                                                   {success: addBlankPage, failure: addBlankPage} , null);
		
		},
		
		insertInputSpanElement: function(page_num, pageName){
			var inputSpanElement = document.createElement("span");
			inputSpanElement.id = 'pageNum_'+page_num+'_input_span';
			inputSpanElement.style.display = 'none';
			var subInputSpanElement1 = document.createElement("input");
			subInputSpanElement1.id = 'pageNum_'+page_num+'_name_hidden_input';
			subInputSpanElement1.type = 'hidden';
			subInputSpanElement1.value = pageName;
			
			inputSpanElement.appendChild(subInputSpanElement1);
			
			var subInputSpanElement2 = document.createElement("input");
			subInputSpanElement2.id = 'pageNum_'+page_num+'_name_input';
			subInputSpanElement2.type = 'text';
			subInputSpanElement2.size = '10';
			subInputSpanElement2.value = pageName;
			subInputSpanElement2.onblur = function(){
				return SUGAR.mySugar.savePageTitle(page_num, this.value);
			}
			
			inputSpanElement.appendChild(subInputSpanElement2);
			
			return inputSpanElement;
		},
		
		
		insertTabNameDisplay: function(page_num, pageName){
			var spanElement = document.createElement("span");
			spanElement.id = 'pageNum_'+page_num+'_link_span';
			var subSpanElement = document.createElement("span");
			subSpanElement.id = 'pageNum_'+page_num+'_title_text';
			subSpanElement.ondblclick = function(){
				return SUGAR.mySugar.renamePage(page_num);
			}
			
			var textNode = document.createTextNode(pageName);
			subSpanElement.appendChild(textNode);
			spanElement.appendChild(subSpanElement);
			
			return spanElement;
		},
				
		showChangeLayoutDialog: function(tabNum){
			document.getElementById('changeLayoutDialog_c').style.display = '';
			SUGAR.mySugar.changeLayoutDialog.show();
			SUGAR.mySugar.changeLayoutDialog.configFixedCenter(null, false) ;			
		},
		
		// get the current dashlet layout
		getLayout: function(asString) {
			columns = new Array();
			for(je = 0; je < 3; je++) {
			    dashlets = document.getElementById('col_'+activeTab+'_'+ je);
			    		    
				if (dashlets != null){
				    dashletIds = new Array();
				    for(wp = 0; wp < dashlets.childNodes.length; wp++) {
				      if(typeof dashlets.childNodes[wp].id != 'undefined' && dashlets.childNodes[wp].id.match(/dashlet_[\w-]*/)) {
						dashletIds.push(dashlets.childNodes[wp].id.replace(/dashlet_/,''));
				      }
				    }
					if(asString) 
						columns[je] = dashletIds.join(',');
					else 
						columns[je] = dashletIds;
				}
			}

			if(asString) return columns.join('|');
			else return columns;
		},

		// called when dashlet is picked up
		onDrag: function(e, id) {
			originalLayout = SUGAR.mySugar.getLayout(true);   	
		},
		
		// called when dashlet is dropped
		onDrop: function(e, id) {	
			newLayout = SUGAR.mySugar.getLayout(true);
		  	if(originalLayout != newLayout) { // only save if the layout has changed
				SUGAR.mySugar.saveLayout(newLayout);
				SUGAR.mySugar.sugarCharts.loadSugarCharts(); // called safely because there is a check to be sure the array exists
		  	}
		},
		
		// save the layout of the dashlet  
		saveLayout: function(order) {
			ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_SAVING_LAYOUT'));
			var success = function(data) {
				ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_SAVED_LAYOUT'));
				window.setTimeout('ajaxStatus.hideStatus()', 2000);
			}
			
			url = 'index.php?to_pdf=1&module='+module+'&action=DynamicAction&DynamicAction=saveLayout&layout=' + order + '&selectedPage=' + activeTab;
			var cObj = YAHOO.util.Connect.asyncRequest('GET', url, {success: success, failure: success});					  
		},

		changeLayout: function(numCols) {
			ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_SAVING_LAYOUT'));

			var success = function(data) {
				ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_SAVED_LAYOUT'));
				window.setTimeout('ajaxStatus.hideStatus()', 2000);
				
				var pageNum = data.responseText;
				SUGAR.mySugar.retrievePage(pageNum);
			}
			
			url = 'index.php?to_pdf=1&module='+module+'&action=DynamicAction&DynamicAction=changeLayout&selectedPage=' + activeTab + '&numColumns=' + numCols;
			var cObj = YAHOO.util.Connect.asyncRequest('GET', url, {success: success, failure: success});					  
		},

		uncoverPage: function(id) {
			if (!SUGAR.isIE){	
				document.getElementById('dlg_c').style.display = 'none';	
			}		
			configureDlg.hide();
            if ( document.getElementById('dashletType') == null ) {
                dashletType = '';
            } else {
                dashletType = document.getElementById('dashletType').value;
            }
			SUGAR.mySugar.retrieveDashlet(SUGAR.mySugar.configureDashletId, dashletType);
		},
		
		// call to configure a Dashlet
		configureDashlet: function(id) {
			ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_LOADING'));
			configureDlg = new YAHOO.widget.SimpleDialog("dlg", 
				{ visible:false, 
				  width:"510", 
				  effect:[{effect:YAHOO.widget.ContainerEffect.FADE,duration:0.5}],
				  fixedcenter:true, 
				  modal:true, 
				  draggable:false }
			);
			
			fillInConfigureDiv = function(data){
				ajaxStatus.hideStatus();
				// uncomment the line below to debug w/ FireBug
				// console.log(data.responseText); 
				try {
					eval(data.responseText);
				}
				catch(e) {
					result = new Array();
					result['header'] = 'error';
					result['body'] = 'There was an error handling this request.';
				}
				configureDlg.setHeader(result['header']);
				configureDlg.setBody(result['body']);
				var listeners = new YAHOO.util.KeyListener(document, { keys : 27 }, {fn: function() {this.hide();}, scope: configureDlg, correctScope:true} );
				configureDlg.cfg.queueProperty("keylisteners", listeners);

				configureDlg.render(document.body);
				configureDlg.show();
				configureDlg.configFixedCenter(null, false) ;
				SUGAR.util.evalScript(result['body']);
			}

			SUGAR.mySugar.configureDashletId = id; // save the id of the dashlet being configured
			var cObj = YAHOO.util.Connect.asyncRequest('GET','index.php?to_pdf=1&module='+module+'&action=DynamicAction&DynamicAction=configureDashlet&id=' + id, 
													  {success: fillInConfigureDiv, failure: fillInConfigureDiv}, null);
		},
		
		configureChartDashlet: function(id, report_id){
			window.location = "index.php?module=Reports&id=" + report_id + "&action=index&page=report";
		},
				
		/** returns dashlets contents
		 * if url is defined, dashlet will be retrieve with it, otherwise use default url
		 *
		 * @param string id id of the dashlet to refresh
		 * @param string url url to be used
		 * @param function callback callback function after refresh
		 * @param bool dynamic does the script load dynamic javascript, set to true if you user needs to refresh the dashlet after load
		 */
		retrieveDashlet: function(id, url, callback, dynamic) {
			ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_LOADING'));
					
			if(!url) {
				url = 'index.php?action=DynamicAction&DynamicAction=displayDashlet&session_commit=1&module='+module+'&to_pdf=1&id=' + id;
				is_chart_dashlet = false;
			}
			else if (url == 'predefined_chart'){
				url = 'index.php?action=DynamicAction&DynamicAction=displayDashlet&session_commit=1&module='+module+'&to_pdf=1&id=' + id;
				scriptUrl = 'index.php?action=DynamicAction&DynamicAction=getPredefinedChartScript&session_commit=1&module='+module+'&to_pdf=1&id=' + id;
				is_chart_dashlet = true;
			}
			
			else if (url == 'chart'){
				url = 'index.php?action=DynamicAction&DynamicAction=displayChartDashlet&session_commit=1&module='+module+'&to_pdf=1&id=' + id;
				scriptUrl = 'index.php?action=DynamicAction&DynamicAction=getChartScript&session_commit=1&module='+module+'&to_pdf=1&id=' + id;
				is_chart_dashlet = true;
			}
			
			if(dynamic) {
				url += '&dynamic=true';
			}

		 	var fillInDashlet = function(data) {

		 		ajaxStatus.hideStatus();
				if(data) {		
					SUGAR.mySugar.currentDashlet.innerHTML = data.responseText;			
				}

				SUGAR.util.evalScript(data.responseText);
				if(callback) callback();
				
				var processChartScript = function(scriptData){
					SUGAR.util.evalScript(scriptData.responseText);
					//custom chart code
					SUGAR.mySugar.sugarCharts.loadSugarCharts(activePage);

				}
				if(typeof(is_chart_dashlet)=='undefined'){
					is_chart_dashlet = false;
				}
				if (is_chart_dashlet){				
					var chartScriptObj = YAHOO.util.Connect.asyncRequest('GET', scriptUrl,
													  {success: processChartScript, failure: processChartScript}, null);
				}
				SUGAR.mySugar.attachToggleToolsetEvent(id);

                //we need to reinit the quickEdit Listeners whenever a dashlet is refreshed
                if(typeof(qe_init) =='function'){
                    //reinitialize the Quick Edit events
                    qe_init();
                }
			}
			
			SUGAR.mySugar.currentDashlet = document.getElementById('dashlet_entire_' + id);
			var cObj = YAHOO.util.Connect.asyncRequest('GET', url,
			                    {success: fillInDashlet, failure: fillInDashlet}, null); 
			return false;
		},
		
		// for the display columns widget
		setChooser: function() {		
			var displayColumnsDef = new Array();
			var hideTabsDef = new Array();

		    var left_td = document.getElementById('display_tabs_td');	
		    var right_td = document.getElementById('hide_tabs_td');			
	
		    var displayTabs = left_td.getElementsByTagName('select')[0];
		    var hideTabs = right_td.getElementsByTagName('select')[0];
			
			for(i = 0; i < displayTabs.options.length; i++) {
				displayColumnsDef.push(displayTabs.options[i].value);
			}
			
			if(typeof hideTabs != 'undefined') {
				for(i = 0; i < hideTabs.options.length; i++) {
			         hideTabsDef.push(hideTabs.options[i].value);
				}
			}
			
			document.getElementById('displayColumnsDef').value = displayColumnsDef.join('|');
			document.getElementById('hideTabsDef').value = hideTabsDef.join('|');
		},
		
		deleteDashlet: function(id) {
			if(confirm(SUGAR.language.get('app_strings', 'LBL_REMOVE_DASHLET_CONFIRM'))) {
				ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_REMOVING_DASHLET'));
				
				del = function() {
					var success = function(data) {
						dashlet = document.getElementById('dashlet_' + id);
						dashlet.parentNode.removeChild(dashlet);
						ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_REMOVED_DASHLET'));
						window.setTimeout('ajaxStatus.hideStatus()', 2000);
					}
				
					
					var cObj = YAHOO.util.Connect.asyncRequest('GET','index.php?to_pdf=1&module='+module+'&action=DynamicAction&DynamicAction=deleteDashlet&activePage=' + activeTab + '&id=' + id, 
															  {success: success, failure: success}, null);
				}
				
				var anim = new YAHOO.util.Anim('dashlet_entire_' + id, { height: {to: 1} }, .5 );					
				anim.onComplete.subscribe(del);					
				document.getElementById('dashlet_entire_' + id).style.overflow = 'hidden';
				anim.animate();
				
				return false;
			}
			return false;
		},
		
		
		addDashlet: function(id, type, type_module) {
			ajaxStatus.hideStatus();
			columns = SUGAR.mySugar.getLayout();
						
			var num_dashlets = columns[0].length;
			if (typeof columns[1] == undefined){
				num_dashlets = num_dashlets + columns[1].length;
			}
			
			if((num_dashlets) >= SUGAR.mySugar.maxCount) {
				alert(SUGAR.language.get('app_strings', 'LBL_MAX_DASHLETS_REACHED'));
				return;
			}			
/*			if((columns[0].length + columns[1].length) >= SUGAR.mySugar.maxCount) {
				alert(SUGAR.language.get('Home', 'LBL_MAX_DASHLETS_REACHED'));
				return;
			}*/
			ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_ADDING_DASHLET'));
			var success = function(data) {

				colZero = document.getElementById('col_'+activeTab+'_0');
				newDashlet = document.createElement('li'); // build the list item
				newDashlet.id = 'dashlet_' + data.responseText;
				newDashlet.className = 'noBullet active';
				// hide it first, but append to getRegion
				newDashlet.innerHTML = '<div style="position: absolute; top: -1000px; overflow: hidden;" id="dashlet_entire_' + data.responseText + '"></div>';

				colZero.insertBefore(newDashlet, colZero.firstChild); // insert it into the first column
				
				var finishRetrieve = function() {
					dashletEntire = document.getElementById('dashlet_entire_' + data.responseText);
					dd = new ygDDList('dashlet_' + data.responseText); // make it draggable
					dd.setHandleElId('dashlet_header_' + data.responseText);
                    // Bug #47097 : Dashlets not displayed after moving them
                    // add new property to save real id of dashlet, it needs to have ability reload dashlet by id
                    dd.dashletID = data.responseText;
					dd.onMouseDown = SUGAR.mySugar.onDrag;  
					dd.onDragDrop = SUGAR.mySugar.onDrop;

					ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_ADDED_DASHLET'));
					dashletRegion = YAHOO.util.Dom.getRegion(dashletEntire);
					dashletEntire.style.position = 'relative';
					dashletEntire.style.height = '1px';
					dashletEntire.style.top = '0px';
					dashletEntire.className = 'dashletPanel';
					
					SUGAR.mySugar.attachToggleToolsetEvent(data.responseText);
					
					var anim = new YAHOO.util.Anim('dashlet_entire_' + data.responseText, { height: {to: dashletRegion.bottom - dashletRegion.top} }, .5 );
					anim.onComplete.subscribe(function() { document.getElementById('dashlet_entire_' + data.responseText).style.height = '100%'; });	
					anim.animate();
					
					newLayout =	SUGAR.mySugar.getLayout(true);
					SUGAR.mySugar.saveLayout(newLayout);	
//					window.setTimeout('ajaxStatus.hideStatus()', 2000);
				}
				
				if (type == 'module' || type == 'web'){
					url = null;
					type = 'module';
				}
				else if (type == 'predefined_chart'){
					url = 'predefined_chart';
					type = 'predefined_chart';
				}
				else if (type == 'chart'){
					url = 'chart';
					type = 'chart';
				}
				
				SUGAR.mySugar.retrieveDashlet(data.responseText, url, finishRetrieve, true); // retrieve it from the server
			}

			var cObj = YAHOO.util.Connect.asyncRequest('GET','index.php?to_pdf=1&module='+module+'&action=DynamicAction&DynamicAction=addDashlet&activeTab=' + activeTab + '&id=' + id+'&type=' + type + '&type_module=' + encodeURIComponent(type_module), 
													  {success: success, failure: success}, null);						  

			return false;
		},
		
		showDashletsDialog: function() {                                             
			columns = SUGAR.mySugar.getLayout();

            if (this.closeDashletsDialogTimer != null) {
                window.clearTimeout(this.closeDashletsDialogTimer);
            }

			var num_dashlets = 0;
            var i = 0;
            for ( i = 0 ; i < 3; i++ ) {
                if (typeof columns[i] != "undefined") {
                    num_dashlets = num_dashlets + columns[i].length;
                }
            }
			
			if((num_dashlets) >= SUGAR.mySugar.maxCount) {
				alert(SUGAR.language.get('app_strings', 'LBL_MAX_DASHLETS_REACHED'));
				return;
			}
			ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_LOADING'));
			
			var success = function(data) {		
				eval(data.responseText);
				dashletsListDiv = document.getElementById('dashletsList');
				dashletsListDiv.innerHTML = response['html'];
				
				document.getElementById('dashletsDialog_c').style.display = '';
                SUGAR.mySugar.dashletsDialog.show();

				eval(response['script']);
				ajaxStatus.hideStatus();
			}
			
			var cObj = YAHOO.util.Connect.asyncRequest('GET', 'index.php?to_pdf=true&module='+module+'&action=DynamicAction&DynamicAction=dashletsDialog', {success: success, failure: success});			
			return false;
		},
		
		closeDashletsDialog: function(){
			SUGAR.mySugar.dashletsDialog.hide();
			if (this.closeDashletsDialogTimer != null) {
                window.clearTimeout(this.closeDashletsDialogTimer);
            }
            this.closeDashletsDialogTimer = window.setTimeout("document.getElementById('dashletsDialog_c').style.display = 'none';", 2000);
			populatedReportCharts = false;
		},

		toggleDashletCategories: function(category){
			document.getElementById('search_string').value = '';
			document.getElementById('searchResults').innerHTML = '';
			
			var moduleTab = document.getElementById('moduleCategory');
			var moduleTabAnchor = document.getElementById('moduleCategoryAnchor');
			var moduleListDiv = document.getElementById('moduleDashlets');

			var chartTab = document.getElementById('chartCategory');
			var chartTabAnchor = document.getElementById('chartCategoryAnchor');			
			var chartListDiv = document.getElementById('chartDashlets');			
			
			var toolsTab = document.getElementById('toolsCategory');
			var toolsTabAnchor = document.getElementById('toolsCategoryAnchor');			
			var toolsListDiv = document.getElementById('toolsDashlets');	
			
			var webTab = document.getElementById('webCategory');
			var webTabAnchor = document.getElementById('webCategoryAnchor');			
			var webListDiv = document.getElementById('webDashlets');	
			
			switch(category){
				case 'module':
					moduleTab.className = 'active';
					moduleTabAnchor.className = 'current';
					moduleListDiv.style.display = '';
					
					chartTab.className = '';
					chartTabAnchor.className = '';
					chartListDiv.style.display = 'none';

					toolsTab.className = '';
					toolsTabAnchor.className = '';
					toolsListDiv.style.display = 'none';

					webTab.className = '';
					webTabAnchor.className = '';
					webListDiv.style.display = 'none';
									
					break;
				case 'chart':
					moduleTab.className = '';
					moduleTabAnchor.className = '';
					moduleListDiv.style.display = 'none';
					
					chartTab.className = 'active';
					chartTabAnchor.className = 'current';
					chartListDiv.style.display = '';					

					toolsTab.className = '';
					toolsTabAnchor.className = '';
					toolsListDiv.style.display = 'none';

					webTab.className = '';
					webTabAnchor.className = '';
					webListDiv.style.display = 'none';
					
					if (!populatedReportCharts){
						SUGAR.mySugar.populateReportCharts();
					}
					break;
				case 'tools':
					moduleTab.className = '';
					moduleTabAnchor.className = '';
					moduleListDiv.style.display = 'none';
					
					chartTab.className = '';
					chartTabAnchor.className = '';
					chartListDiv.style.display = 'none';					

					toolsTab.className = 'active';
					toolsTabAnchor.className = 'current';
					toolsListDiv.style.display = '';

					webTab.className = '';
					webTabAnchor.className = '';
					webListDiv.style.display = 'none';
					
					break;
                case 'web':
					moduleTab.className = '';
					moduleTabAnchor.className = '';
					moduleListDiv.style.display = 'none';
					
					chartTab.className = '';
					chartTabAnchor.className = '';
					chartListDiv.style.display = 'none';					

					toolsTab.className = '';
					toolsTabAnchor.className = '';
					toolsListDiv.style.display = 'none';

					webTab.className = 'active';
					webTabAnchor.className = 'current';
					webListDiv.style.display = '';					
					
					break;
				default:
					break;					
			}			
			
			document.getElementById('search_category').value = category;
		},
		
		populateReportCharts: function(){
			var globalList = document.getElementById('globalReportsChartDashletsList');
			var myTeamsList = document.getElementById('myTeamReportsChartDashletsList');
			var mySavedList = document.getElementById('mySavedReportsChartDashletsList');
			var myFavoritesList = document.getElementById('myFavoriteReportsChartDashletsList');

			var getMyFavorites = function(data){
				eval(data.responseText);
				myFavoritesList.innerHTML = response['html'];
			}
			var mySavedObj = YAHOO.util.Connect.asyncRequest('GET', 'index.php?to_pdf=true&module='+module+'&action=DynamicAction&DynamicAction=getReportCharts&category=myFavorites', {success: getMyFavorites, failure: getMyFavorites});
			
			var getMySaved = function(data) {
				eval(data.responseText);
				mySavedList.innerHTML = response['html'];
			}
			var mySavedObj = YAHOO.util.Connect.asyncRequest('GET', 'index.php?to_pdf=true&module='+module+'&action=DynamicAction&DynamicAction=getReportCharts&category=mySaved', {success: getMySaved, failure: getMySaved});

			var getMyTeams = function(data) {
				eval(data.responseText);
				myTeamsList.innerHTML = response['html'];
			}
			var myTeamsObj = YAHOO.util.Connect.asyncRequest('GET', 'index.php?to_pdf=true&module='+module+'&action=DynamicAction&DynamicAction=getReportCharts&category=myTeams', {success: getMyTeams, failure: getMyTeams});
			
			var getGlobal = function(data) {
				eval(data.responseText);
				globalList.innerHTML = response['html'];
			}
			var globalObj = YAHOO.util.Connect.asyncRequest('GET', 'index.php?to_pdf=true&module='+module+'&action=DynamicAction&DynamicAction=getReportCharts&category=global', {success: getGlobal, failure: getGlobal});		
			
			populatedReportCharts = true;
		},

		searchDashlets: function(searchStr, searchCategory){
			var moduleTab = document.getElementById('moduleCategory');
			var moduleTabAnchor = document.getElementById('moduleCategoryAnchor');
			var moduleListDiv = document.getElementById('moduleDashlets');

			var chartTab = document.getElementById('chartCategory');
			var chartTabAnchor = document.getElementById('chartCategoryAnchor');			
			var chartListDiv = document.getElementById('chartDashlets');			
			
			var toolsTab = document.getElementById('toolsCategory');
			var toolsTabAnchor = document.getElementById('toolsCategoryAnchor');			
			var toolsListDiv = document.getElementById('toolsDashlets');			

			if (moduleTab != null && chartTab != null && toolsTab != null){	
				moduleListDiv.style.display = 'none';
				chartListDiv.style.display = 'none';	
				toolsListDiv.style.display = 'none';
			
			}
			// dashboards case, where there are no tabs
			else{
				chartListDiv.style.display = 'none';
			}
			
			var searchResultsDiv = document.getElementById('searchResults');
			searchResultsDiv.style.display = '';
	
			var success = function(data) {
				eval(data.responseText);

				searchResultsDiv.innerHTML = response['html'];
			}
			
			var cObj = YAHOO.util.Connect.asyncRequest('GET', 'index.php?to_pdf=true&module='+module+'&action=DynamicAction&DynamicAction=searchDashlets&search='+searchStr+'&category='+searchCategory, {success: success, failure: success});
			return false;
		},
		
		collapseList: function(chartList){
			document.getElementById(chartList+'List').style.display='none';
			document.getElementById(chartList+'ExpCol').innerHTML = '<a href="javascript:void(0)" onClick="javascript:SUGAR.mySugar.expandList(\''+chartList+'\');"><img border="0" src="' + SUGAR.themes.image_server + 'index.php?entryPoint=getImage&themeName='+SUGAR.themes.theme_name+'&imageName=advanced_search.gif" align="absmiddle" />';
		},
		
		expandList: function(chartList){
			document.getElementById(chartList+'List').style.display='';		
			document.getElementById(chartList+'ExpCol').innerHTML = '<a href="javascript:void(0)" onClick="javascript:SUGAR.mySugar.collapseList(\''+chartList+'\');"><img border="0" src="' + SUGAR.themes.image_server + 'index.php?entryPoint=getImage&themeName='+SUGAR.themes.theme_name+'&imageName=basic_search.gif" align="absmiddle" />';
		},
		
		collapseReportList: function(reportChartList){
			document.getElementById(reportChartList+'ReportsChartDashletsList').style.display='none';
			document.getElementById(reportChartList+'ExpCol').innerHTML = '<a href="javascript:void(0)" onClick="javascript:SUGAR.mySugar.expandReportList(\''+reportChartList+'\');"><img border="0" src="' + SUGAR.themes.image_server + 'index.php?entryPoint=getImage&themeName='+SUGAR.themes.theme_name+'&imageName=ProjectPlus.gif" align="absmiddle" />';
		},
		
		expandReportList: function(reportChartList){
			document.getElementById(reportChartList+'ReportsChartDashletsList').style.display='';
			document.getElementById(reportChartList+'ExpCol').innerHTML = '<a href="javascript:void(0)" onClick="javascript:SUGAR.mySugar.collapseReportList(\''+reportChartList+'\');"><img border="0" src="' + SUGAR.themes.image_server + 'index.php?entryPoint=getImage&themeName='+SUGAR.themes.theme_name+'&imageName=ProjectMinus.gif" align="absmiddle" />';
		},
		
		clearSearch: function(){
			document.getElementById('search_string').value = '';

			var moduleTab = document.getElementById('moduleCategory');
			var moduleTabAnchor = document.getElementById('moduleCategoryAnchor');
			var moduleListDiv = document.getElementById('moduleDashlets');
			
			document.getElementById('searchResults').innerHTML = '';
			if (moduleTab != null){
				SUGAR.mySugar.toggleDashletCategories('module');
			}
			else{
				document.getElementById('searchResults').style.display = 'none';
				document.getElementById('chartDashlets').style.display = '';
			}
		},
		
		doneAddDashlets: function() {
			SUGAR.mySugar.dashletsDialog.hide();
			return false;
		},

		renderFirstLoadDialog: function() {
			SUGAR.mySugar.firstLoad = new YAHOO.widget.Panel("firstLoad",
			{ width:"240px",
			  fixedcenter:true,
			  close:false,
			  draggable:false,
                             constraintoviewport:false, 															  
			  modal:true,
			  visible:false,
			  effect:[{effect:YAHOO.widget.ContainerEffect.SLIDE, duration:0.5},
			  		  {effect:YAHOO.widget.ContainerEffect.FADE, duration:.5}]
			});
			SUGAR.mySugar.firstLoad.setBody('<div id="firstLoad" align="center" style="vertical-align:middle;"><img src="' + SUGAR.themes.image_server + 'index.php?entryPoint=getImage&themeName='+SUGAR.themes.theme_name+'&imageName=img_loading.gif" align="absmiddle" /> <b>' + SUGAR.language.get('app_strings', 'LBL_FIRST_LOAD') +'</b></div>');
			SUGAR.mySugar.firstLoad.render(document.body);		
			document.getElementById('firstLoad_c').style.display = '';
			SUGAR.mySugar.firstLoad.show();
			window.setTimeout('SUGAR.mySugar.hideFirstLoadDialog()', 4000);
		},
		
		hideFirstLoadDialog: function(){
			SUGAR.mySugar.firstLoad.hide();
			document.getElementById('firstLoad_c').style.display = 'none';																
		},
		
		renderLoadingDialog: function() {
			SUGAR.mySugar.loading = new YAHOO.widget.Panel("loading",
			{ width:"240px",
			  fixedcenter:true,
			  close:false,
			  draggable:false,
                             constraintoviewport:false, 															  
			  modal:true,
			  visible:false,
			  effect:[{effect:YAHOO.widget.ContainerEffect.SLIDE, duration:0.5},
			  		  {effect:YAHOO.widget.ContainerEffect.FADE, duration:.5}]
			});
			SUGAR.mySugar.loading.setBody('<div id="loadingPage" align="center" style="vertical-align:middle;"><img src="' + SUGAR.themes.image_server + 'index.php?entryPoint=getImage&themeName='+SUGAR.themes.theme_name+'&imageName=img_loading.gif" align="absmiddle" /> <b>' + SUGAR.language.get('app_strings', 'LBL_LOADING_PAGE') +'</b></div>');
			SUGAR.mySugar.loading.render(document.body);		
			if (document.getElementById('loading_c'))
                document.getElementById('loading_c').style.display = 'none';
		},
		
		renderAddPageDialog: function() {
			var handleSuccess = function(o){
				var response = o.responseText;
                eval(o.responseText);
   
			    var pageName = result['pageName'];
			    var numCols = result['numCols'];
			    
				SUGAR.mySugar.addTab(pageName,numCols);	
				if (!SUGAR.isIE){	
					setTimeout("document.getElementById('addPageDialog_c').style.display = 'none';", 2000);					
				}
				SUGAR.mySugar.addPageDialog.hide();
			};
			
			var handleFailure = function(o){
				if (!SUGAR.isIE){	
					setTimeout("document.getElementById('addPageDialog_c').style.display = 'none';", 2000);					
				}
				SUGAR.mySugar.addPageDialog.hide();
			};
					
			var handleSubmit = function(){
				this.submit();
			};
			
			var handleCancel = function(){
				SUGAR.mySugar.addPageDialog.hide();
			};
					     
			// Instantiate the Dialog
			SUGAR.mySugar.addPageDialog = new YAHOO.widget.Dialog("addPageDialog", 
			{ width : "300px",
			  fixedcenter : true,
			  visible : false, 
			  draggable: false,
			  effect:[{effect:YAHOO.widget.ContainerEffect.SLIDE, duration:0.5},
			  		  {effect:YAHOO.widget.ContainerEffect.FADE,duration:0.5}],																  
			  buttons : [ { text:SUGAR.language.get('app_strings', 'LBL_SUBMIT_BUTTON_LABEL'), handler:handleSubmit, isDefault:true },
						  { text:SUGAR.language.get('app_strings', 'LBL_CANCEL_BUTTON_LABEL'), handler:handleCancel } ],
			  modal : true
			 } );
																		 
			SUGAR.mySugar.addPageDialog.callback = { success: handleSuccess, failure: handleFailure };

			SUGAR.mySugar.addPageDialog.validate = function(){
				var postData = this.getData();
				
				if (postData.pageName == ""){
					alert(SUGAR.language.get('app_strings', 'ERR_BLANK_PAGE_NAME'));
					return false;
				}

				/*var success = function(data) {
					eval(data.responseText);
					
					if (duplicateName){
						alert("Please enter another page name - there is already a page with that name.");
						return false;
					}
					else{
						return true;
					}
				}
			
				var cObj = YAHOO.util.Connect.asyncRequest('GET', 'index.php?to_pdf=true&module='+module+'&action=DynamicAction&DynamicAction=pageNameCheck&pageName='+postData.pageName, {success: success, failure: success});
				*/
				return true;
			}

			document.getElementById('addPageDialog').style.display = '';                                            
			SUGAR.mySugar.addPageDialog.render();
			document.getElementById('addPageDialog_c').style.display = 'none';			
		
		},
		
		renderDashletsDialog: function(){	
            var minHeight = 120;
            var maxHeight = 520;
            var minMargin = 16;

            // adjust dialog height according to current page height
            var pageHeight = document.documentElement.clientHeight;
            var height = Math.min(maxHeight, pageHeight - minMargin * 2);
            height = Math.max(height, minHeight);

			SUGAR.mySugar.dashletsDialog = new YAHOO.widget.Dialog("dashletsDialog", 
			{ width : "480px",
			  height: height + "px",
			  fixedcenter : true,
			  draggable:false,
			  visible : false, 
			 // effect:[{effect:YAHOO.widget.ContainerEffect.SLIDETOP, duration:0.5},{effect:YAHOO.widget.ContainerEffect.FADE,duration:0.5}],
			  modal : true,
			  close:false
			 } );

			var listeners = new YAHOO.util.KeyListener(document, { keys : 27 }, {fn: function() {SUGAR.mySugar.closeDashletsDialog();} } );
			SUGAR.mySugar.dashletsDialog.cfg.queueProperty("keylisteners", listeners);

			document.getElementById('dashletsDialog').style.display = '';																				 
			SUGAR.mySugar.dashletsDialog.render();
			document.getElementById('dashletsDialog_c').style.display = 'none';			
		}	
		,

		changePageLayout: function(numCols){
			SUGAR.mySugar.changeLayout(numCols);
			if (!SUGAR.isIE){	
				setTimeout("document.getElementById('changeLayoutDialog_c').style.display = 'none';", 2000);					
			}
			SUGAR.mySugar.changeLayoutDialog.hide();		
		},
		
		renderChangeLayoutDialog: function(){
			SUGAR.mySugar.changeLayoutDialog = new YAHOO.widget.Dialog("changeLayoutDialog", 
			{ width : "300px",
			  fixedcenter : true,
			  visible : false, 
			  draggable: false,
			  effect:[{effect:YAHOO.widget.ContainerEffect.SLIDE, duration:0.5},
			  		  {effect:YAHOO.widget.ContainerEffect.FADE,duration:0.5}],
			  modal : true
			 } );

			document.getElementById('changeLayoutDialog').style.display = '';
			SUGAR.mySugar.changeLayoutDialog.render();			
			document.getElementById('changeLayoutDialog_c').style.display = 'none';
		},
		
		attachDashletCtrlEvent: function(){
			var tablist = document.getElementById("tabList");
			if	(YAHOO.env.ua.ie) {
					YAHOO.util.Event.on(tablist, 'mouseenter', function() { 
						tablist.className = "subpanelTablist selected";
					}); 
					
					YAHOO.util.Event.on(tablist, 'mouseleave', function() { 
						tablist.className = "subpanelTablist";
					}); 
				} else {
					YAHOO.util.Event.on(tablist, 'mouseover', function() { 
						tablist.className = "subpanelTablist selected";
					}); 
					
					YAHOO.util.Event.on(tablist, 'mouseout', function() { 
						tablist.className = "subpanelTablist";
					}); 
				}
		}
		,
		attachToggleToolsetEvent: function(dashletId){
			var header = document.getElementById("dashlet_header_"+dashletId);
			if	(YAHOO.env.ua.ie) {
					YAHOO.util.Event.on(header, 'mouseenter', function() { 
						document.getElementById("dashlet_header_"+dashletId).className = "hd selected";
					}); 
					
					YAHOO.util.Event.on(header, 'mouseleave', function() { 
						document.getElementById("dashlet_header_"+dashletId).className = "hd";
					}); 
				} else {
					YAHOO.util.Event.on(header, 'mouseover', function() { 
						document.getElementById("dashlet_header_"+dashletId).className = "hd selected";
					}); 
					
					YAHOO.util.Event.on(header, 'mouseout', function() { 
						document.getElementById("dashlet_header_"+dashletId).className = "hd";
					}); 
				}
		}
	 }; 
}();
};
