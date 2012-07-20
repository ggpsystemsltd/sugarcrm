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

        
if ( typeof(SUGAR.field) == 'undefined' ) {
    SUGAR.field = new Object();
}

if ( typeof(SUGAR.field.file) == 'undefined' ) {
    SUGAR.field.file = {
        deleteAttachment: function(elemBaseName,docTypeName,elem) {
            ajaxStatus.showStatus(SUGAR.language.get("app_strings", "LBL_REMOVING_ATTACHMENT"));
            elem.form.deleteAttachment.value=1;
            elem.form.action.value="deleteattachment";

            var callback =  SUGAR.field.file.deleteAttachmentCallbackGen(elemBaseName,docTypeName);
            var success = function(data) {
                if(data) {
                    callback(data.responseText);
                }
            }
            YAHOO.util.Connect.setForm(elem.form); 
            var cObj = YAHOO.util.Connect.asyncRequest('POST', 'index.php', {success: success, failure: success});
            
            elem.form.deleteAttachment.value=0;
            elem.form.action.value="";
        },
        deleteAttachmentCallbackGen: function(elemBaseName,docTypeName) {
            return function(text) {
	            if(text == 'true') {
		            document.getElementById(elemBaseName+'_new').style.display = '';
		            ajaxStatus.hideStatus();
		            document.getElementById(elemBaseName+'_old').innerHTML = '';
                    if(docTypeName){
                        document.getElementById(docTypeName).disabled = false;
                    }
                    document.getElementById(elemBaseName).value = '';
	            } else {
		            document.getElementById(elemBaseName+'_new').style.display = 'none';
		            ajaxStatus.flashStatus(SUGAR.language.get('app_strings', 'ERR_REMOVING_ATTACHMENT'), 2000);
	            }
            }
        },
        checkEapiLogin: function(res) {
            var failedLogins = YAHOO.lang.JSON.parse(res.responseText);
            if ( failedLogins.length == 0 ) { return; }

            for ( var idx in failedLogins ) {
                if(confirm(failedLogins[idx].label)) {
                    window.open(failedLogins[idx].checkURL,'EAPM_CHECK_'+idx);
                } else {
                    document.getElementById(res.argument.docTypeName).value = 'Sugar';
                    document.getElementById(res.argument.docTypeName).onchange();
                }
            }
        },
        setupEapiShowHide: function(elemBaseName,docTypeName,formName) {
            var externalSearchToggle = function() {
                var moreElem = document.getElementById(elemBaseName + "_more");
                var hideMore = (moreElem.style.display == 'none');
                if ( hideMore ) {
                    // We're hiding the "more" element, so we clicked on the "less" element and want to hide stuff
                    moreElem.style.display = '';
                    document.getElementById(elemBaseName + '_less').style.display = 'none';
                    document.getElementById(elemBaseName + '_remoteNameSpan').style.display = 'none';
                    document.getElementById(elemBaseName + '_file').disabled = false;
                } else {
                    // We're not hiding the "more" element, so we clicked on the "more" element and want to show stuff
                    moreElem.style.display = 'none';
                    document.getElementById(elemBaseName + '_less').style.display = '';
                    document.getElementById(elemBaseName + '_remoteNameSpan').style.display = '';
                    document.getElementById(elemBaseName + '_file').disabled = true;
                }
            }

            var showHideFunc = function() {
                var docShowHideElem = document.getElementById(elemBaseName + "_externalApiSelector");
                
                var dropdownValue = document.getElementById(docTypeName).value;
                if ( typeof(SUGAR.eapm) != 'undefined' 
                     && typeof(SUGAR.eapm[dropdownValue]) != 'undefined' 
                     && typeof(SUGAR.eapm[dropdownValue].docSearch) != 'undefined'
                     && SUGAR.eapm[dropdownValue].docSearch ) {
                    docShowHideElem.style.display = '';
                    

                    // Double check to make sure their login is valid
                    YAHOO.util.Connect.asyncRequest('GET', 'index.php?module=EAPM&action=CheckLogins&to_pdf=1&api='+dropdownValue,{success:SUGAR.field.file.checkEapiLogin,argument:{'elemBaseName':elemBaseName,'docTypeName':docTypeName}});

                    // Start a refresh of the document cache in the background. Thanks AJAX!
                    YAHOO.util.Connect.asyncRequest('GET', 'index.php?module=EAPM&action=flushFileCache&to_pdf=1&api='+dropdownValue,{});
                } else {
                    docShowHideElem.style.display = 'none';
                    document.getElementById(elemBaseName + '_file').disabled = false;
                }
                // Update the quick search
                sqs_objects[formName+"_"+elemBaseName+"_remoteName"].api = dropdownValue;

                
                // Now time to see if we can select security options
                var secLevelBoxElem = document.getElementById(elemBaseName + '_securityLevelBox');
                var secLevelElem = document.getElementById(elemBaseName + '_securityLevel');
                
                secLevelElem.options.length = 0;
                
                if ( SUGAR.eapm[dropdownValue] && SUGAR.eapm[dropdownValue].sharingOptions ) {
                    var opts = SUGAR.eapm[dropdownValue].sharingOptions;
                    var i = 0;

                    for ( idx in opts ) {
                        secLevelElem.options[i] = new Option(SUGAR.language.get('app_strings',opts[idx]),idx,false,false);
                        i++;
                    }
                    
                    secLevelBoxElem.style.display='';
                } else {
                    secLevelBoxElem.style.display='none';
                }
                
            }
            document.getElementById(docTypeName).onchange = showHideFunc;

            document.getElementById(elemBaseName + '_externalApiLabel').onclick = externalSearchToggle;
            showHideFunc();
        },
        
// Select button / popup related functions
        openPopup: function(elemBaseName) {
            window.open('index.php?module=Documents&action=extdoc&isPopup=1&elemBaseName='+elemBaseName+'&apiName='+document.getElementById('doc_type').value,'sugarPopup','width=600,height=400,menubar=no,toolbar=no,status=no,resizeable=yes,scrollbars=yes'); 
        },
        
        clearRemote: function(elemBaseName) {
            document.getElementById('doc_id').value = '';
            document.getElementById(elemBaseName).value = '';
            document.getElementById(elemBaseName + '_remoteName').value = '';
            document.getElementById('doc_url').value = '';
        },

        populateFromPopup: function(elemBaseName, docId, docName, docUrl, docDirectUrl) {
            document.getElementById('doc_id').value = docId;
            document.getElementById(elemBaseName).value = docId;
            document.getElementById(elemBaseName + '_remoteName').value = docName;
            document.getElementById('doc_url').value = docUrl;
        },
        
        getFileExtension:function(fileName) {
            var lastindex = fileName.lastIndexOf(".");   
            if(lastindex == -1)
                return '';
            else
                return fileName.substr(++lastindex);
        },
        isFileExtensionValid: function(fileName) {
            var docType = document.getElementById('doc_type').value;
            var fileExtension = this.getFileExtension(fileName);
            
            if( typeof(SUGAR.eapm[docType]) == 'undefined' || ! SUGAR.eapm[docType].restrictUploadsByExtension ){
                return true;
            }   
            var whiteSuffixlist = SUGAR.eapm[docType]['restrictUploadsByExtension']; 
            if(whiteSuffixlist.constructor == Array){
                var results = false;
                for(var i=0;i<whiteSuffixlist.length;i++){
                    if( fileExtension.toLowerCase() == whiteSuffixlist[i].toLowerCase() ){
                        return true;
                    }
                }
            }
            return results;
        },
        
        checkFileExtension: function(e,obj) {
            var sff = SUGAR.field.file; //Scope is set to element.
            var fileEl = document.getElementById(obj.fileEl);
            var fileName = fileEl.value;
            
            var isValid = sff.isFileExtensionValid(fileName);
            if( !isValid && fileName != '' ){
                var errorPannel = new YAHOO.widget.SimpleDialog('sugarMsgWindow', {
        			width: '240px',visible: true, fixedcenter: true,constraintoviewport: true,
        	        draggable: true,type:'alert',modal:true,id:'sugarMsgWindow',close:true
        		});
        		errorPannel.setBody(SUGAR.language.get("app_strings", "LBL_INVALID_FILE_EXTENSION"));
        		errorPannel.render(document.body);
        		errorPannel.show();
        		fileEl.value = '';
        		document.getElementById(obj.targEl).value = '';
            }
        }
    }
}