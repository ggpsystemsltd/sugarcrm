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


SUGAR.kb = function() {

    var tree;
    var configureDlg;
    var firstClick = true;
    var modalMoveDocsDialog;
    var tagsTreeModalMoveDocs;
    var modalMoveDocsDialog = '';
    var applyTagsToDocs = '';
    var previousSearchFoundTags = new Array();
    var previousNodesCount = 0;
    var myDialog;
    var clickedNode = '';
    var clickedNodeMove = '';
    var checkedNodeApply = '';

    var FAQ_TAG_NOT_RENAME_MESSAGE = SUGAR.language.get('KBDocuments', 'LBL_FAQ_TAG_NOT_RENAME_MESSAGE');
    var ROOT_TAG = SUGAR.language.get('KBTags', 'LBL_TAGS_ROOT_LABEL');

    return{
        displayNodeMessage:function() {
            //
        },
        getLocalizedLabels:function(moduleOrAppList, msg) {
            return SUGAR.language.get(moduleOrAppList, msg);
        },
        displayNodeMessage:function() {
            document.getElementById('CreateNodeMessage').style.display = '';
            document.getElementById('CreateNodeMessage').innerHTML = 'Please select a node';

            //document.getElementById('tags_search').type='hidden';
            // document.getElementById('search').type='hidden';
            //document.getElementById('search_area').style.display='none';
        },

        hideMove:function () {
            document.getElementById('CreateNodeMove').style.display = '';
            document.getElementById('CreateNodeMove').innerHTML = '<b><font COLOR=red>' + SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_SELECT_A_TAG_FROM_TREE') + '</b>';

            var tagsTree = YAHOO.widget.TreeView.trees['tagstreeMoveDocsModal'];
            document.getElementById('Move').style.visibility = "hidden";
            document.getElementById('Cancel_Move').style.visibility = "hidden";
            if (clickedNodeMove.data == undefined) {
                //do nothing
            }
            else {
                //take the color away from previously selected node
                //var prevNode=YAHOO.widget.TreeView.getNode('tagstree',prevNodeId);
                clickedNodeMove.getLabelEl().style.backgroundColor = "white";
            }
        },

        hideApply:function () {
            document.getElementById('CreateNodeApply').style.display = '';
            document.getElementById('CreateNodeApply').innerHTML = '<b><font COLOR=red>' + SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_SELECT_TAGS_FROM_TREE') + '</b>';

            //document.getElementById('Ok').disabled=false;
            //myDialog.setHeader(MOVING_ARTICLES_TO_ANOTHER_TAG);
            var selectedApplyTags = document.getElementsByName('selected_apply_tags[]');
            //var checked = false;
            for (i = 0; i < selectedApplyTags.length; i++) {
                if (selectedApplyTags[i].checked) {
                    selectedApplyTags[i].checked = false;
                }
            }
            document.getElementById('Apply').style.visibility = "hidden";
            document.getElementById('Cancel_Apply').style.visibility = "hidden";
            /*
             var tagsTree = YAHOO.widget.TreeView.trees['tagstreeApplyTags'];
             var root = tagsTree.getRoot();
             if(root != null && root.children.length >0){
             //myDialog.setHeader(SUGAR.kb.getLocalizedLabels('KBDocuments','LBL_APPLYING_TAGS_TO_ARTICLES'));
             }
             */
        },


        displayNewNodeBody:function() {
            document.getElementById('searchAndCreate').style.display = 'none';
            //document.getElementById('CreateNode').style.display='';
            //document.getElementById('tag_base').checked = true;
            //document.getElementById('tagsCreate').style.display='';
            document.getElementById('tag_new').disabled = false;
            document.getElementById('Ok').disabled = false;

            var tagsTree = YAHOO.widget.TreeView.trees['tagstree'];
            var root = tagsTree.getRoot();
            if (root != null && root.children.length > 0) {
                document.getElementById('CreateNodeMessage').style.display = '';
                //document.getElementById('CreateNodeMessage').innerHTML = 'Please select a node';
                //document.getElementById('CreateNode').style.display='';
                //remove root check box
                // document.getElementById('tag_base').checked = true;
                //document.getElementById('tagsCreate').style.display='';
                /*
                 document.getElementById('tag_new').style.visibility = "hidden";
                 document.getElementById('Ok').style.visibility = "hidden";
                 document.getElementById('Cancel').style.visibility = "hidden";
                 */
                //remove root tag details
                //document.getElementById('tag_base').checked =false;
                //document.getElementById('tag_base').disabled = false;

                myDialog.setHeader(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_CREATING_NEW_TAG'));

            }
            else {
                document.getElementById('tag_base').checked = true;
                document.getElementById('tag_base').disabled = true;
            }
            document.getElementById('CancelDup').style.visibility = "visible";
        },

        displayNewNodeBodyAdmin:function() {
            document.getElementById('CreateNode').style.display = '';
            document.getElementById('tag_base').checked = true;
            document.getElementById('tagsCreate').style.display = '';
            document.getElementById('tag_new').disabled = false;
            document.getElementById('Ok').disabled = false;

            var tagsTree = YAHOO.widget.TreeView.trees['tagstree'];
            var root = tagsTree.getRoot();
            if (root != null && root.children.length > 0) {
                document.getElementById('CreateNodeMessage').style.display = '';
                document.getElementById('CreateNodeMessage').innerHTML = 'Please select a node';
                document.getElementById('CreateNode').style.display = '';
                document.getElementById('tag_base').checked = true;
                document.getElementById('tagsCreate').style.display = '';
                //document.getElementById('tag_new').disabled=false;
                //document.getElementById('Ok').disabled=false;
                document.getElementById('tag_new').style.visibility = "hidden";
                document.getElementById('Ok').style.visibility = "hidden";
                document.getElementById('tag_base').checked = false;
                document.getElementById('tag_base').disabled = false;

            }
            else {
                document.getElementById('tag_base').checked = true;
                document.getElementById('tag_base').disabled = true;
            }
            //document.getElementById('Ok').type='';

            document.getElementById('Cancel').style.visibility = "visible";

            //document.getElementById('CreateNodeMessage').innerHTML = 'Please select a node';
            //document.getElementById('tags_search').type='hidden';
            //document.getElementById('search').type='hidden';
            //document.getElementById('search_area').style.display='none';
        },

        hideMessageAndNodeAdmin:function() {
            document.getElementById('tag_selected_id').value = '';
            document.getElementById('tag_selected').value = '';
            document.getElementById('tag_new').value = '';
            document.getElementById('tags_search').value = '';
            document.getElementById('CreateNodeMessage').style.display = 'none';
            //document.getElementById('NewNodeMessage').style.display='none';
            document.getElementById('CreateNode').style.display = 'none';
            if (previousSearchFoundTags != null && previousSearchFoundTags.length > 0) {
                for (i = 0; i < previousSearchFoundTags.length; i++) {
                    if (previousSearchFoundTags[i].getLabelEl().style.backgroundColor != "white") {
                        previousSearchFoundTags[i].getLabelEl().style.backgroundColor = "white";
                    }
                }
            }
            if (clickedNode.data == undefined) {
                //do nothing
            }
            else {
                //take the color away from previously selected node
                //var prevNode=YAHOO.widget.TreeView.getNode('tagstree',prevNodeId);
                clickedNode.getLabelEl().style.backgroundColor = "white";
            }
        },


        rootChecked:function() {
            if (document.getElementById('tag_base').checked == false) {
                document.getElementById('CreateNodeMessage').style.display = '';
                document.getElementById('CreateNodeMessage').innerHTML = 'Please select a node';
                //document.getElementById('newSave').style.display='none';
                //alert(document.getElementById('newSave').style.display);
                //document.getElementById('tag_new').type='hidden';
                document.getElementById('tag_new').disabled = true;
                document.getElementById('tag_selected_id').value = '';
                //document.getElementById('Ok').type='hidden';
                document.getElementById('Ok').disabled = true;
                document.getElementById('tag_new').style.visibility = "hidden";
                document.getElementById('Ok').style.visibility = "hidden";
            }
            else {
                document.getElementById('CreateNodeMessage').style.display = 'none';
                //document.getElementById('tag_new').type='';
                //document.getElementById('Ok').type='';
                //document.getElementById('newSave').style.display='';
                //document.getElementById('Cancel').type='';
                //document.getElementById('tag_new').disabled = false;
                //document.getElementById('Ok').disabled = false;

                document.getElementById('tag_new').style.visibility = "visible";
                document.getElementById('Ok').style.visibility = "visible";
            }
        },

        hideMessageAndNode:function() {
            document.getElementById('tag_selected_id').value = '';
            //document.getElementById('tag_selected').value='';
            document.getElementById('tag_new').value = '';
            document.getElementById('tags_search').value = '';
            document.getElementById('CreateNodeMessage').style.display = 'none';
            document.getElementById('tagsCreate').style.display = 'none';
            if (myDialog != null) {
                myDialog.setHeader('Tags');
            }
            //document.getElementById('NewNodeMessage').style.display='none';
            //document.getElementById('CreateNode').style.display='none';
            document.getElementById('searchAndCreate').style.display = '';
            if (previousSearchFoundTags != null && previousSearchFoundTags.length > 0) {
                for (i = 0; i < previousSearchFoundTags.length; i++) {
                    if (previousSearchFoundTags[i].getLabelEl().style.backgroundColor != "white") {
                        previousSearchFoundTags[i].getLabelEl().style.backgroundColor = "white";
                    }
                }
            }
            if (clickedNode.data == undefined) {
                //do nothing
            }
            else {
                //take the color away from previously selected node
                //var prevNode=YAHOO.widget.TreeView.getNode('tagstree',prevNodeId);
                clickedNode.getLabelEl().style.backgroundColor = "white";
            }
        },

        moveTags:function() {

            var els = document.getElementsByName('selected_tags[]');
            var selected = false;
            for (i = 0; i < els.length; i++) {
                if (els[i].checked == true) {

                    els[i].value;
                    selected = true;
                }
            }
            if (!selected) {
                alert('Select tags to be moved');
            }
            else {
                var fRet;
                fRet = confirm('Would you select target tag after clicking ok or cancel');
                alert(fRet);
            }
        },
        applyTags:function() {
            var els = document.getElementsByName('selected_tags[]');
            var selected = false;
            for (i = 0; i < els.length; i++) {
                if (els[i].checked == true) {

                    els[i].value;
                    selected = true;
                }
            }
            if (!selected) {
                alert('Select tags to be moved');
            }
            else {
                var fRet;
                fRet = confirm('Would you select target tag after clicking ok or cancel');
                alert(fRet);
            }
        },

        dummyClick:function() {
            //alert(node.data.label);
        },

        cascadeTags:function() {
            var els = document.getElementsByName('selected_tags[]');
            var selected = false;
            var selectedTagId = '';
            alert(firstClick);
            if (firstClick) {
                for (i = 0; i < els.length; i++) {
                    if (els[i].checked == true) {
                        selectedTagId = els[i].value;
                        selected = true;
                        break;
                    }
                }
                var tagsTree = YAHOO.widget.TreeView.trees['tagstree'];
                for (i = 0; i < tagsTree._nodes.length; i++) {

                    if (tagsTree.getNodeByIndex(i) != null) {
                        if (tagsTree.getNodeByIndex(i).data.id == selectedTagId) {
                            alert('node found ' + tagsTree.getNodeByIndex(i).data.label);
                        }
                    }
                }
            }
            else {
                alert(node.data.label);
            }

            var elm = document.getElementsByName('selected_tags[]');
            if (selectedTagId != 'undefined' && selectedTagId != null && selectedTagId.length > 0) {
                for (i = 0; i < elm.length; i++) {

                    elm[i].checked = true;
                }
            }
        },

        moveToTag:function() {
            var node = YAHOO.namespace('tagstree').selectednode;
            document.getElementById('tag_selected_move_from_id').value = node.data.id;

        },
        checkTags:function() {

            //document.getElementById('selected_directory_children').innerHTML='';
            //alert(document.getElementById('selected_directory_children'));

            //document.getElementById('searchAndCreateArticles').style.display='';
            //document.getElementById('searchAndCreate').style.display='';
            /*alert(document.getElementById('selected_tags').value);

             var nodeState = document.getElementById(node.data.id).checked;
             if(node != null && node.children.length >0){
             if(nodeState){
             node.expand();
             }
             else{
             node.collapse();
             }
             for(j=0;j<node.children.length;j++){
             var childNodeBox = document.getElementById(node.children[j].data.id);
             childNodeBox.checked = nodeState;
             var childNode = node.children[j];
             if(childNode != null && childNode.children.length >0){
             checkChildTags(node.children[j],nodeState);
             }
             }
             }
             */


        },

        checkChildTags:function(Node, nodeState) {
            if (nodeState) {
                Node.expand();
            }
            else {
                Node.collapse();
            }
            if (Node != null && Node.children.length > 0) {
                for (i = 0; i < Node.children.length; i++) {
                    var childNodeBox = document.getElementById(Node.children[i].data.id);
                    //alert(childNodeBox+' '+Node.children[i].children.length);
                    var childNode = Node.children[i];
                    childNodeBox.checked = nodeState;
                    if (childNode != null && childNode.children.length > 0) {
                        checkChildTags(childNode, nodeState);
                    }
                }
            }
        },

        deleteTags:function() {
            var els = document.getElementsByName('selected_tags[]');
            var selected = false;
            var selectedTagIds = new Array();
            var j = 0;
            for (i = 0; i < els.length; i++) {
                if (els[i].checked == true) {
                    selectedTagIds[j] = els[i].value;
                    selected = true;
                    j++;
                    //break;
                }
            }
            if (!selected) {
                alert(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_SELECT_TAGS_TO_DELETE'));
                return false;
            }
            else {
                //window.setTimeout('ajaxStatus.hideStatus()', 500);
                var callback = {
                    success:function(r) {
                        //rebuild the tree to display the latest node
                        //treeDiv.innerHTML=r.responseText;
                        SUGAR.util.evalScript(r.responseText);
                    }
                }
                if (!confirm(SUGAR.language.get('app_strings', 'NTC_DELETE_CONFIRMATION'))) {
                    return false;
                }
                postData = 'selectedTagIds=' + YAHOO.lang.JSON.stringify(selectedTagIds) + '&module=KBTags&action=DeleteSelectedTags&to_pdf=1';
                YAHOO.util.Connect.asyncRequest('POST', 'index.php', callback, postData);

            }
        },

        selectArticles:function(action) {
            save_kb_checks(0);
            if (document.KBAdminView.uid.value != '') {
                selectedArticleIds = document.KBAdminView.uid.value.split(',');
                selected = true;
            } else {
                selected = false;
            }

            if (!selected) {
                if (action == 'Move') {
                    alert(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_SELECT_ARTICLES_TO_BE_MOVED_TO_OTHER_TAG'));
                }
                if (action == 'Apply') {
                    alert(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_SELECT_ARTICLES_TO_APPLY_TAGS'));
                }
                if (action == 'Delete') {
                    alert(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_SELECT_ARTICLES_TO_DELETE'));
                }
                return false;
            }

            return true;
        },

        deleteArticles:function() {
            save_kb_checks(0);

            if (document.KBAdminView.uid.value != '') {
                selectedArticleIds = document.KBAdminView.uid.value.split(',');
                selected = true;
            } else {
                selected = false;
            }

            if (!selected) {
                alert(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_SELECT_ARTICLES_TO_DELETE'));
                return false;
            }
            else {
                //Ajax to delete the articles and refresh the page
                ajaxStatus.showStatus('DELETING_ARTICLES');
                window.setTimeout('ajaxStatus.hideStatus()', 500);
                var callback = {
                    success:function(r) {
                        if (!confirm(SUGAR.language.get('app_strings', 'NTC_DELETE_CONFIRMATION'))) {
                            return false;
                        }
                        //rebuild the tree to display the latest node
                        //treeDiv.innerHTML=r.responseText;
                        if (r.responseText == 1) {
                            alert(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_TAG_ALREADY_EXISTS'));
                        }
                        else {
                            SUGAR.util.evalScript(r.responseText);
                        }
                    }
                }
                postData = 'selectedArticles=' + YAHOO.lang.JSON.stringify(selectedArticleIds) + '&module=KBDocuments&action=DeleteSelectedArticles&to_pdf=1';
                YAHOO.util.Connect.asyncRequest('POST', 'index.php', callback, postData);
            }
        },

        modalMoveDocs:function() {
            // Instantiate the Dialog
            document.getElementById('moveDlg').style.display = '';
            var handleCancel = function() {
                this.cancel();
            }

            var handleSubmit = function() {
                tree = new YAHOO.widget.TreeView('tagstreeMoveDocsModal');
                document.getElementById('moveDlg').style.display = '';
                var attId = document.createElement('input');
                attId.setAttribute('id', 't1');
                attId.setAttribute('name', 't1');
                attId.setAttribute('tabindex', '120');
                attId.setAttribute('type', 'text');
                attId.setAttribute('disabled', true);
                attId.setAttribute('value', tree.getNodeByIndex(1));
                linked_tags.appendChild(attId);
                this.submit();
            }

            var myButtons = [ //{ text:"Ok", handler:handleSubmit },
                //{ text:'', handler:handleCancel,visible:false}
            ];
            ajaxStatus.showStatus(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_LAUNCHING_TAG_BROWSING'));
            tagsTreeModalMoveDocs = new YAHOO.widget.SimpleDialog('moveDlg',
            { width: "500",

                fixedcenter: true,
                visible: true,
                draggable: false,
                //effect:[{effect:YAHOO.widget.ContainerEffect.SLIDETOP, duration:1.0},{effect:YAHOO.widget.ContainerEffect.FADE,duration:0.5}],
                close: true,
                modal : true
                //text: "Select an existing or create a new Tag?"
                //icon: YAHOO.widget.SimpleDialog.ICON_HELP
                //constraintoviewport: true
            });
            clickedNodeMove = '';
            var moveTags = 'Move Tags';
            fillInTags = function(data) {
                try {
                    eval(data.responseText);
                }
                catch(e) {
                    result = new Array();
                    result['body'] = SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_THERE_WAS_AN_ERROR_HANDLING_TAGS');
                }
                //applyTagsToDocs.setHeader(result['header']);
                tagsTreeModalMoveDocs.setBody(result['body']);
                tagsTreeModalMoveDocs.setHeader(' Tags');
                var listeners = new YAHOO.util.KeyListener(document, { keys : 27 }, {fn: function() {
                    this.hide();
                }, scope: tree, correctScope:true});
                tagsTreeModalMoveDocs.cfg.queueProperty("keylisteners", listeners);

                tagsTreeModalMoveDocs.render(document.body);
                //applyTagsToDocs.registerForm();
                tagsTreeModalMoveDocs.show();
                //applyTagsToDocs.center();
                tagsTreeModalMoveDocs.configFixedCenter(null, false);
                SUGAR.util.evalScript(result['body']);
                window.setTimeout('ajaxStatus.hideStatus()', 1000);
            }
            postData = 'tagsMode=' + YAHOO.lang.JSON.stringify(moveTags) + '&module=KBTags&action=SelectCreateApplyAndMoveTags&to_pdf=1';
            YAHOO.util.Connect.asyncRequest('POST', 'index.php', {success: fillInTags, failure: fillInTags}, postData);
        },

        applyTagsModal:function() {
            //check if nodemessage already opened in modal. close it
            //hideMessageAndNode();

            // Instantiate the Dialog
            //document.getElementById('dialog1').style.display='';


            document.getElementById('applyDlg').style.display = '';
            var handleCancel = function() {
                this.cancel();
            }
            var handleSubmit = function() {
                //this.submit();
                //alert(tree.getNodeByIndex(2));
                tree = new YAHOO.widget.TreeView('tagstreeApplyTags');
                document.getElementById('applyDlg').style.display = '';
                //document.getElementById('Linked_Tags').style.display='';
                //var linked_tags = document.getElementById('Linked_Tags');
                var attId = document.createElement('input');
                attId.setAttribute('id', 't1');
                attId.setAttribute('name', 't1');
                attId.setAttribute('tabindex', '120');
                attId.setAttribute('type', 'text');
                attId.setAttribute('disabled', true);
                attId.setAttribute('value', tree.getNodeByIndex(1));
                linked_tags.appendChild(attId);
                this.submit();
            }
            var myButtons = [ //{ text:"Ok", handler:handleSubmit },
                //{ text:'', handler:handleCancel,visible:false}
            ];
            ajaxStatus.showStatus(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_LAUNCHING_TAG_BROWSING'));
            applyTagsToDocs = new YAHOO.widget.SimpleDialog('applyDlg',
            { width: "500",
                fixedcenter: true,
                visible: true,
                draggable: false,
                //effect:[{effect:YAHOO.widget.ContainerEffect.SLIDETOP, duration:1.0},{effect:YAHOO.widget.ContainerEffect.FADE,duration:0.5}],
                close: true,
                modal : true
                //text: "Select an existing or create a new Tag?"
                //icon: YAHOO.widget.SimpleDialog.ICON_HELP
                //constraintoviewport: true
            });
            var applyTags = 'Apply Tags';
            fillInTags = function(data) {
                try {
                    eval(data.responseText);
                }
                catch(e) {
                    result = new Array();
                    result['body'] = 'There was an error handling this request.';
                }
                //applyTagsToDocs.setHeader(result['header']);
                applyTagsToDocs.setBody(result['body']);
                applyTagsToDocs.setHeader(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_HEAD_TAGS'));
                var listeners = new YAHOO.util.KeyListener(document, { keys : 27 }, {fn: function() {
                    this.hide();
                }, scope: tree, correctScope:true});
                applyTagsToDocs.cfg.queueProperty("keylisteners", listeners);

                applyTagsToDocs.render(document.body);
                //applyTagsToDocs.registerForm();
                applyTagsToDocs.show();
                //applyTagsToDocs.center();
                applyTagsToDocs.configFixedCenter(null, false);
                SUGAR.util.evalScript(result['body']);
                window.setTimeout('ajaxStatus.hideStatus()', 1000);
            }
            postData = 'tagsMode=' + YAHOO.lang.JSON.stringify(applyTags) + '&module=KBTags&action=SelectCreateApplyAndMoveTags&to_pdf=1';
            YAHOO.util.Connect.asyncRequest('POST', 'index.php', {success: fillInTags, failure: fillInTags}, postData);

            //myDialog.cfg.queueProperty("buttons", myButtons);
        },
        serachTagAjax:function() {
            var searchTag = document.getElementById('tags_search').value;
            searchTag = searchTag.toLowerCase();
            if (searchTag != null && searchTag.length > 0) {
                var callback = {
                    success:function(r) {
                        SUGAR.util.evalScript(r.responseText);
                        document.getElementById('tags_search').value = newTag;
                        searchTree(false);
                        document.getElementById('tags_search').value = '';
                    }
                }
                postData = 'searchTagName=' + YAHOO.lang.JSON.stringify(searchTag) + '&module=KBTags&action=SearchTags&to_pdf=1';
                YAHOO.util.Connect.asyncRequest('POST', 'index.php', callback, postData);
            } else {
                alert('Please type in the search field');
            }
        },

        moveDocsAndModalClose:function() {

            tree = new YAHOO.widget.TreeView('tagstreeMoveDocsModal');
            var node = YAHOO.namespace('tagstreeMoveDocsModal').selectednode;
            var tagId = node.data.id;

            if (tagId == document.getElementById('tag_selected_move_from_id').value) {
                alert(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_SOURCE_AND_TARGET_TAGS_ARE_SAME'));
            }

            var selected = false;
            var selectedArticleIds = new Array();

            selectedArticleIds[0] = document.getElementById('tag_selected_move_from_id').value;
            selectedArticleIds[1] = tagId;
            var j = 2;

            if (document.KBAdminView.uid.value != '') {
                els = document.KBAdminView.uid.value.split(',');
                for (x in els) {
                    selectedArticleIds[j] = els[x];
                    j++;
                }
                selected = true;
            }

            var callback = {
                success:function(r) {
                    //rebuild the tree to display the latest node
                    SUGAR.util.evalScript(r.responseText);
                }
            }

            postData = 'tagAndArticleIds=' + YAHOO.lang.JSON.stringify(selectedArticleIds) + '&module=KBTags&action=MoveArticlesToTagsModal&to_pdf=1';
            YAHOO.util.Connect.asyncRequest('POST', 'index.php', callback, postData);
            document.getElementById('Move').style.visibility = "hidden";
            document.getElementById('Cancel_Move').style.visibility = "hidden";
            document.getElementById('CreateNodeMove').innerHTML = '<b><font COLOR=red>' + SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_SELECT_A_TAG_FROM_TREE') + '</b>';
            document.getElementById('selected_directory_children').innerHTML = '';
            tagsTreeModalMoveDocs.submit();
        },

        applyTagsAndmodalClose:function() {
            tree = new YAHOO.widget.TreeView('tagstreeApplyTags');

            var selected = false;
            var selectedTagsArticlesIds = new Array();
            var tagsEls = document.getElementsByName('selected_apply_tags[]');
            var j = 2;
            var countTags = 0;
            for (i = 0; i < tagsEls.length; i++) {
                if (tagsEls[i].checked == true) {
                    selectedTagsArticlesIds[j] = tagsEls[i].value;
                    j++;
                    countTags++;
                    //break;
                }
            }

            selectedTagsArticlesIds[0] = countTags;
            countArticles = 0;

            if (document.KBAdminView.uid.value != '') {
                var els = document.KBAdminView.uid.value.split(',');
                for (x in els) {
                    selectedTagsArticlesIds[j] = els[x];
                    j++;
                    countArticles++;
                }
                selected = true;
            }


            selectedTagsArticlesIds[1] = countArticles;

            var callback = {
                success:function(r) {
                    //rebuild the tree to display the latest node
                    //alert(r.responseText);
                    SUGAR.util.evalScript(r.responseText);
                }
            }
            postData = 'tagAndArticleIds=' + YAHOO.lang.JSON.stringify(selectedTagsArticlesIds) + '&module=KBTags&action=ApplyTagsToArticlesModal&to_pdf=1';
            YAHOO.util.Connect.asyncRequest('POST', 'index.php', callback, postData);
            document.getElementById('Apply').style.visibility = "hidden";
            document.getElementById('Cancel_Apply').style.visibility = "hidden";
            document.getElementById('CreateNodeApply').innerHTML = '<b><font COLOR=red>' + SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_SELECT_TAGS_FROM_TREE') + '</b>';
            applyTagsToDocs.submit();
        },

        addDocTags:function(form_name) {
            var theForm = document.getElementById(form_name);
            var tagDiv = document.getElementById("Linked_Tags");
            var elems = theForm.getElementsByTagName("input");
            var elems1 = tagDiv.getElementsByTagName("input");
            for (var i = 0; i < elems1.length; i++) {
                //if (elems[i].type == "file") {
                var el = elems1[i];
                if (el.id == 'docTagIds[]') {
                    theForm.appendChild(el);
                }
            }
            for (var i = 0; i < elems.length; i++) {
                //if (elems[i].type == "file") {
                var el = elems[i];

                if (el.id == 'docTagIds[]') {
                    theForm.appendChild(el);
                }
                if (el.id.indexOf('docTagIds') >= 0 || el.id == 'docTagIds[]') {
                    theForm.appendChild(el);
                }
            }
        },
        addNewNode:function(admin) {
            var tagsTree = YAHOO.widget.TreeView.trees['tagstree'];
            var root = tagsTree.getRoot();
            var parent_tag_id = '';
            if (!(document.getElementById('tag_selected_id').value == '') &&
                    (document.getElementById('tag_selected_id').value.length > 0)) {
                parent_tag_id = document.getElementById('tag_selected_id').value;
            }
            var newTag = document.getElementById('tag_new').value;
            if (newTag != null && newTag.length > 0) {
                //check if the node already exists
                var nodeChildExists = false;

                if (!nodeChildExists) {
                    //Ajax call for adding the new tag
                    ajaxStatus.showStatus(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_SAVING_THE_TAG'));
                    if (admin == null || admin == 'undefined') {
                        admin = false;
                    }
                    var idName = new Array(3);
                    idName[0] = newTag;
                    idName[1] = parent_tag_id;

                    if (admin) {
                        idName[2] = 1;
                    }
                    else {
                        idName[2] = 0;
                    }
                    var treeDiv = document.getElementById('tagstree');
                    window.setTimeout('ajaxStatus.hideStatus()', 500);
                    var callback = {
                        success:function(r) {
                            //rebuild the tree to display the latest node
                            //treeDiv.innerHTML=r.responseText;
                            if (r.responseText == 1) {
                                alert(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_TAG_ALREADY_EXISTS'));
                            }
                            else {
                                SUGAR.util.evalScript(r.responseText);
                            }
                        }
                    }

                    postData = SUGAR.util.paramsToUrl({
                        newTagName:  YAHOO.lang.JSON.stringify(idName),
                        module: "KBTags",
                        action: "SaveTagsModal"
                    });
                    postData += "to_pdf=1";
                    YAHOO.util.Connect.asyncRequest('GET', 'index.php?' + postData, callback);
                    if (admin) {
                        //hideMessageAndNodeAdmin();
                        document.getElementById('tag_new').value = '';
                    }
                    else {
                        document.getElementById('tags_search').value = newTag;
                        SUGAR.kb.searchTree(false);
                        document.getElementById('tags_search').value = '';
                        SUGAR.kb.hideMessageAndNode();
                    }

                    previousNodesCount = YAHOO.widget.TreeView.trees['tagstree']._nodes.length;
                    previousSearchFoundTags = new Array();
                    clickedNode = '';
                }
                else {
                    alert(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_TAG_ALREADY_EXISTS'));
                }
            }
            else {
                alert(SUGAR.language.get('KBDocuments', 'LBL_TYPE_NEW_NODE_NAME'));
            }
        },



        searchTree:function(admin) {
            //get the tag to be searched
            var searchTag = document.getElementById('tags_search').value;
            searchTag = searchTag.toLowerCase();
            if (searchTag != null && searchTag.length > 0) {
                var tagsTree = YAHOO.widget.TreeView.trees['tagstree'];
                var nodesCount = tagsTree._nodes.length;
                var startTagCount = 0;

                if (previousNodesCount != null && previousNodesCount > 0) {
                    startTagCount = previousNodesCount + 2;
                }
                else {
                    startTagCount = 1;
                }
                var tagsCount = 0;
                var currSearchFoundTags = new Array();

                //if previous search results exist then change the color
                if (previousSearchFoundTags != null && previousSearchFoundTags.length > 0) {
                    for (i = 0; i < previousSearchFoundTags.length; i++) {
                        if (previousSearchFoundTags[i].getLabelEl() != null) {
                            if (previousSearchFoundTags[i].getLabelEl().style.backgroundColor != "white") {
                                previousSearchFoundTags[i].getLabelEl().style.backgroundColor = "white";
                            }
                        }
                    }
                }
                var treeCollapsed = false;

                for (i = startTagCount; i < nodesCount; i++) {
                    if (tagsTree.getNodeByIndex(i) != null) {
                        var nodeLabel = tagsTree.getNodeByIndex(i).label;

                        nodeLabel = nodeLabel.toLowerCase();
                        if (admin) {
                            nodeLabel = nodeLabel.substring(nodeLabel.lastIndexOf('>') + 1, nodeLabel.lastIndexOf('('));
                        }
                        else {
                            nodeLabel = nodeLabel.substring(0, nodeLabel.indexOf('('));
                        }
                        if (searchTag == nodeLabel && !treeCollapsed) {
                            tagsTree.collapseAll();
                            treeCollapsed = true;
                        }
                        if (searchTag == nodeLabel) {
                            //set focus on the node
                            currSearchFoundTags[tagsCount] = tagsTree.getNodeByIndex(i);
                            tagsCount++;
                            //get to the rootnode for this node

                            if (tagsTree.getNodeByIndex(i).parent != 'RootNode') {
                                var parentNode = tagsTree.getNodeByIndex(i).parent;
                                var parentNodeBeforeRoot = '';
                                while (parentNode != null && parentNode != 'RootNode') {

                                    if (parentNode.parent != null && parentNode.parent.expanded) {
                                        parentNodeBeforeRoot = parentNode;
                                        break;
                                    }
                                    parentNode.expand();
                                    parentNode = parentNode.parent;
                                }
                                parentNodeBeforeRoot.expand();

                                //parentNodeBeforeRoot.getLabelEl().style.backgroundColor = "green";
                                //tagsTree.getNodeByIndex(i).expand();
                            }
                        }

                    }
                }
                //alert('curr '+currSearchFoundTags);
                if (currSearchFoundTags != null && currSearchFoundTags.length > 0) {
                    for (i = 0; i < currSearchFoundTags.length; i++) {
                        if (currSearchFoundTags[i].getLabelEl() != null) {
                            currSearchFoundTags[i].getLabelEl().style.backgroundColor = "DB7093";//6B8E23"; //CC3299";// 99CC32"; // CCFFCC";
                        }
                    }
                }
                //treeCollapsed = true;
                //set the currsearch result for next round
                previousSearchFoundTags = currSearchFoundTags;
                //previousNodesCount = nodesCount;
            }
            else {
                alert('Please type in the search field');
            }
        },
        //adding a search function
        //searching tags dynamically
        searchTagsAll:function() {
            var searchThisTag = document.getElementById('tags_search').value;
            //searchTag = searchTag.toLowerCase();
            if (searchThisTag != null && searchThisTag.length > 0) {
                //Ajax call for adding the new tag
                var tagName = new Array(1);
                tagName[0] = searchThisTag;
                window.setTimeout('ajaxStatus.hideStatus()', 500);
                var callback = {
                    success:function(r) {

                        SUGAR.util.evalScript(r.responseText);
                    }
                }
                postData = 'searchTagName=' + YAHOO.lang.JSON.stringify(tagName) + '&module=KBTags&action=SelectCreateApplyAndMoveTags&to_pdf=1';
                YAHOO.util.Connect.asyncRequest('POST', 'index.php', callback, postData);
            }
            else {
                alert(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_TYPE_TAG_NAME_TO_SEARCH'));
            }
        },

        treeInit:function(divId, tagId) {
            document.getElementById('tags_tree').style.display = '';
            tree = new YAHOO.widget.TreeView('tagstree');
            tree.setDynamicLoad(loadDataForNode, 1);
            tags = document.getElementById(tagId);
            var tagVal = tags.value;
            var tags_comma = tagVal.split(",");

            tags_commaN = "";
            for (var i = 0; i < tags_comma.length; i++) {
                if (tags_comma[i].length > 0) {
                    currT = tags_comma[i];
                    for (var t = 0; t < currT.length; t++) {
                        if (currT.indexOf('/') == 0) {
                            currT = currT.substring(1);
                        }
                    }
                    tags_commaN = tags_commaN + currT + ",";
                }
            }
            tags_commaN = tags_commaN.substring(0, tags_commaN.lastIndexOf(','));
            //slash
            var tags_slash = tags_commaN.split("/");
            tags_slashN = "";
            for (var k = 0; k < tags_slash.length; k++) {
                if (tags_slash[k].length > 0) {
                    currT = tags_slash[k];
                    for (var t = 0; t < currT.length; t++) {
                        if (currT.indexOf('&') == 0) {
                            currT = currT.substring(1);
                        }
                    }
                    tags_slashN = tags_slashN + currT + "/";
                }
            }
            tags_comma = tags_slashN.substring(0, tags_slashN.lastIndexOf('/'));

            /*ampersand for creating two tags at the same level outside root level
             var tags_amp = tags_comma.split("&");
             tags_ampN="";
             for(var k=0;k<tags_amp.length;k++){
             if(tags_amp[k].length >0){
             currT =tags_amp[k];
             tags_ampN=tags_ampN+currT+"/";
             }
             }
             tags_comma = tags_ampN.substring(0,tags_ampN.lastIndexOf('&'));
             */
            //check for duplicate tags at first node level to root

            if (checkDups(tags_comma, ",") != null) {
                alert(checkDups(tags_comma, ","));
                return false;
            }

            if (tags_comma != null && tags_comma.length > 0) {
                var root = tree.getRoot();
                var myobj = { label: "Root", id:"Root" };
                var rootNode = new YAHOO.widget.TextNode(myobj, root, false);
                rootNode.expanded = true;
                //rootNode.hasIcon = true;

                //again split by comma. all duplicate commas gone. backslashes gone
                tags_comma = tags_comma.split(",");
                var tmpNode = new Array();
                for (var i = 0; i < tags_comma.length; i++) {
                    var tags_slash = tags_comma[i].split("/");
                    for (var j = 0; j < tags_slash.length; j++) {
                        var currTag = tags_slash[j];
                        //alert(currTag+currTag.length);
                        if (currTag != null && currTag.length > 0) {
                            myobj = { label: currTag, id:currTag };
                            if (j == 0) {
                                tmpNode[j] = new YAHOO.widget.TextNode(myobj, rootNode, false);
                                tmpNode[j].expanded = true;
                                tmpNode[j].iconMode = 0;
                            }
                            else {
                                tmpNode[j] = new YAHOO.widget.TextNode(myobj, tmpNode[j - 1], false);
                                tmpNode[j].expanded = true;
                                tmpNode[j].iconMode = 0;
                            }
                        }
                    }
                }

                //myobj = { label: "Tag2", id:"Tag2" } ;
                //var tmpNode2 = new YAHOO.widget.TextNode(myobj, tmpNode, false);


                // Expand and collapse happen prior to the actual expand/collapse,
                // and can be used to cancel the operation
                tree.subscribe("expand", function(node) {
                    //alert(node.data.id + " was expanded");
                    //return false; // return false to cancel the expand
                });

                tree.subscribe("collapse", function(node) {
                    //alert(node.data.id + " was collapsed");
                });

                // Trees with TextNodes will fire an event for when the label is clicked:
                tree.subscribe("labelClick", function(node) {
                    //alert(node.data.id + " label was clicked");
                });
                //
            }
            tree.draw();
        },

        modalInit:function() {
            //check if nodemessage already opened in modal. close it
            //if (!YAHOO.util.Dom.hasClass(document.body, "yui-skin-sam"))
            //	YAHOO.util.Dom.addClass(document.body, "yui-skin-sam")
            SUGAR.kb.hideMessageAndNode();
            document.getElementById('dialog1').style.display = '';
            // Instantiate the Dialog

            var handleCancel = function() {
                this.cancel();
            }
            var handleSubmit = function() {
                //this.submit();
                //alert(tree.getNodeByIndex(2));
                tree = new YAHOO.widget.TreeView('tagstree');
                document.getElementById('Linked_Tags').style.display = '';
                var linked_tags = document.getElementById('Linked_Tags');
                var attId = document.createElement('input');
                attId.setAttribute('id', 't1');
                attId.setAttribute('name', 't1');
                attId.setAttribute('tabindex', '120');
                attId.setAttribute('type', 'text');
                attId.setAttribute('disabled', true);
                attId.setAttribute('value', tree.getNodeByIndex(1));
                linked_tags.appendChild(attId);
                this.submit();
            }
            var myButtons = [ //{ text:"Ok", handler:handleSubmit },
                //{ text:'', handler:handleCancel,visible:false}
            ];
            ajaxStatus.showStatus(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_LAUNCHING_TAG_BROWSING'));

            // Check if myDialog exists
            if (typeof myDialog === "undefined") {
                myDialog = new YAHOO.widget.SimpleDialog('dialog1', {
                    visible:false,
                    // Removing this effect, allows the dialog to center properly in YUI2.9.0 -Peter D.
//                    effect:[
//                        {effect:YAHOO.widget.ContainerEffect.SLIDE, duration:0.5}
//                    ],
                    fixedcenter: true,
                    centered: true,
                    modal:true,
                    draggable:false
                });

                myDialog.render(document.body);
            }
            previousNodesCount = 0;
            var selectCreateTags = 'Select Create Tags';
            fillInTags = function(data) {
                try {
                    eval(data.responseText);
                }
                catch(e) {
                    result = new Array();
                    result['body'] = 'There was an error handling this request.';
                }
                //applyTagsToDocs.setHeader(result['header']);
                myDialog.setHeader('Tags');
                document.getElementById('jsonresults').innerHTML = result['body'];
                var listeners = new YAHOO.util.KeyListener(document, { keys : 27 }, {fn: function() {
                    this.hide();
                }, scope: myDialog, correctScope:true});
                myDialog.cfg.queueProperty("keylisteners", listeners);
                myDialog.show();
                myDialog.center();
                SUGAR.util.evalScript(result['body']);
                window.setTimeout('ajaxStatus.hideStatus()', 1000);
            }
            var postData = 'tagsMode=' + YAHOO.lang.JSON.stringify(selectCreateTags) + '&module=KBTags&action=SelectCreateApplyAndMoveTags&to_pdf=1';
            var callback = {success: fillInTags, failure: fillInTags};
            YAHOO.util.Connect.asyncRequest('POST', 'index.php', callback, postData);
        },

        modalClose:function(treeid) {
            var isThisSearchScreen = false;
            searchID = document.getElementById('modal_close_search');
            if (searchID != null && typeof(searchID) != 'undefined') {
                isThisSearchScreen = true;
            }
            var createNodeMessage = document.getElementById('CreateNodeMessage');
            var tagsCreate = document.getElementById('tagsCreate');
            tree = new YAHOO.widget.TreeView('treeid');
            var node = YAHOO.namespace(treeid).selectednode;
            var currT = document.getElementsByName('docTagIds[]');
            //also get the tags already linked to the saved article
            var savedTags = document.getElementsByName('savedTagIds[]');
            var tagId = node.data.id;
            var tagExists = false;
            var nodeMessageExists = false;
            if (currT != null) {
                for (i = 0; i < currT.length; i++) {
                    if (node.data.id == currT[i].value) {
                        tagExists = true;
                        break;
                    }
                }
            }

            if (isThisSearchScreen) {
                //process if we are in search screen
                //set the form inputs and exit
                if (node.data.id == 'All_Tags') {
                    clickedNode = '';
                    alert(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_ROOT_TAG_MESSAGE'));
                    return;
                }
                document.getElementById('tag_id').value = node.data.id;
                document.getElementById('tag_name').value = SUGAR.kb.getTagName(node, false);
                myDialog.submit();
            } else {
                //check if the tag is already linked/saved tot he article
                if (savedTags != null) {
                    for (i = 0; i < savedTags.length; i++) {
                        if (node.data.id == savedTags[i].value) {
                            tagExists = true;
                            break;
                        }
                    }
                }

                if ((createNodeMessage != null && createNodeMessage.style.display == 'none') && (tagsCreate != null && tagsCreate.style.display == 'none')) {
                    if (node.data.id == 'All_Tags') {
                        clickedNode = '';
                        alert(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_ROOT_TAG_MESSAGE'));
                        return;
                    }
                    if (!tagExists) {
                        clickedNode = '';
                        link_tags = document.getElementById("Linked_Tags");
                        link_tags.style.display = '';
                        //create a new div element
                        var new_tag_row = document.createElement('div');
                        new_tag_row.size = '500px';

                        //save tag name

                        var docTagName = document.createElement('input');
                        docTagName.setAttribute('id', 'docTagNames[]');
                        docTagName.setAttribute('name', 'docTagNames[]');
                        //docTagName.setAttribute('size', '60');
                        docTagName.setAttribute('type', 'hidden');
                        docTagName.setAttribute('disabled', true);
                        docTagName.setAttribute('value', SUGAR.kb.getTagName(node, false));


                        var new_row_button_remove_tag = document.createElement("img");
                        new_row_button_remove_tag.setAttribute("src", "index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=delete_inline.gif");
                        new_row_button_remove_tag.setAttribute("align", "absmiddle");
                        //new_row_button_remove_tag.setAttribute("alt","Remove");
                        new_row_button_remove_tag.setAttribute("border", "0");
                        //new_row_button_remove_tag.setAttribute("height","20");
                        //new_row_button_remove_tag.setAttribute("width","20");

                        //also save tag id
                        var docTagId = document.createElement('input');
                        docTagId.setAttribute('id', 'docTagIds[]');
                        docTagId.setAttribute('name', 'docTagIds[]');
                        docTagId.setAttribute('size', '10');
                        docTagId.setAttribute('type', 'hidden');
                        docTagId.setAttribute('value', tagId);

                        //also need a  remove button
                        var removeTag = document.createElement('input');
                        removeTag.type = 'button';
                        removeTag.value = 'Remove';
                        removeTag.onclick = function() {
                            //Remove element from form
                            //this.parentNode.element.parentNode.removeChild(this.parentNode.element);
                            //remove this row from list
                            this.parentNode.parentNode.removeChild(this.parentNode);
                        }

                        new_row_button_remove_tag.onclick = function() {
                            //Remove element from form
                            //this.parentNode.element.parentNode.removeChild(this.parentNode.element);
                            //remove this row from list
                            this.parentNode.parentNode.removeChild(this.parentNode);
                        }

                        //new_tag_row.appendChild(docTagName);

                        // new_tag_row.innerHTML = new_tag_row.innerHTML+getTagName(node,false);
                        new_tag_row.appendChild(docTagName);
                        new_tag_row.appendChild(new_row_button_remove_tag);
                        new_tag_row.appendChild(document.createTextNode(' '));
                        new_tag_row.appendChild(document.createTextNode(SUGAR.kb.getTagName(node, false)));
                        //new_tag_row.replaceChild(document.createTextNode(getTagName(node,false)),new_tag_row.childNodes[1]);
                        //new_tag_row.appendChild(docTagName);
                        new_tag_row.appendChild(docTagId);
                        link_tags.appendChild(new_tag_row);
                    }
                    myDialog.submit();
                }
                else {

                    //document.getElementById('CreateNodeMessage').innerHTML = 'Currently selected a node     Please type the new node';
                    //document.getElementById('NewNodeMessage').style.display='';
                    //document.getElementById('NewNodeMessage').innerHTML = 'Please type the new node';
                    document.getElementById('CreateNodeMessage').style.display = 'none';
                    var prevNodeId = document.getElementById('tag_selected_id').value;
                    //alert(clickedNode.data)
                    if (clickedNode.data == undefined) {
                        //do nothing
                    }
                    else {
                        //take the color away from previously selected node
                        //var prevNode=YAHOO.widget.TreeView.getNode('tagstree',prevNodeId);
                        clickedNode.getLabelEl().style.backgroundColor = "white";
                    }


                    //document.getElementById('tag_selected').style.display='';
                    //new code

                    //document.getElementById('SelectedTag').innerHTML = getTagName(node,true);

                    //document.getElementById('newSave').type='';
                    //document.getElementById('tag_new').type='';
                    //document.getElementById('Ok').type='';
                    //document.getElementById('Cancel').type='';


                    //alert('THIS ONE '+createNodeMessage.style.display);
                    //new code end
                    //alert(tagId);
                    document.getElementById('tag_new').disabled = false;
                    document.getElementById('Ok').disabled = false;

                    document.getElementById('tag_new').style.visibility = "visible";
                    document.getElementById('Ok').style.visibility = "visible";

                    document.getElementById('tag_selected_id').value = tagId;

                    document.getElementById('tagsCreate').style.display = '';
                    //document.getElementById('tag_selected').value=getTagName(node,true);
                    //document.getElementById('CreateNode').style.display='';
                    //node.getLabelEl().style.font = "500";
                    node.getLabelEl().style.backgroundColor = "CCFFFF";  //light blue gray(CCCCCC)

                    clickedNode = node;
                }
            }
        },


        selectTagNode:function(treeid) {

            if (document.getElementById('CreateNodeMessage').style.display == 'none') {
                //do nothing
            }
            else {
                var createNodeMessage = document.getElementById('CreateNodeMessage');
                tree = new YAHOO.widget.TreeView('treeid');
                var node = YAHOO.namespace(treeid).selectednode;
                var currT = document.getElementsByName('docTagIds[]');
                var tagId = node.data.id;
                var tagExists = false;
                var nodeMessageExists = false;

                document.getElementById('CreateNodeMessage').style.display = '';
                var prevNodeId = document.getElementById('tag_selected_id').value;
                //alert(clickedNode.data)
                if (clickedNode.data == undefined) {
                    //do nothing
                }
                else {
                    //take the color away from previously selected node
                    //var prevNode=YAHOO.widget.TreeView.getNode('tagstree',prevNodeId);
                    clickedNode.getLabelEl().style.backgroundColor = "white";
                }

                document.getElementById('CreateNodeMessage').innerHTML = SUGAR.kb.getTagNameAdmin(node, true);

                document.getElementById('tag_new').disabled = false;
                document.getElementById('Ok').disabled = false;

                document.getElementById('tag_new').style.visibility = "visible";
                document.getElementById('Ok').style.visibility = "visible";

                document.getElementById('tag_selected_id').value = tagId;
                //document.getElementById('tag_selected').value=getTagName(node,true);
                document.getElementById('CreateNode').style.display = '';
                //node.getLabelEl().style.font = "500";
                node.getLabelEl().style.backgroundColor = "CCFFFF";  //light blue gray(CCCCCC)

                clickedNodeMove = node;
            }
        },

        selectTagToMoveArticles:function() {
            var createNodeM = document.getElementById('CreateNodeMove');
            //tree = new YAHOO.widget.TreeView('tagstreeMoveDocsModal');
            var node = YAHOO.namespace('tagstreeMoveDocsModal').selectednode;

            var tagId = node.data.id;
            var prevNodeId = document.getElementById('tag_selected_id').value;
            //alert(clickedNodeMove.data);
            if (clickedNodeMove.data == undefined) {
                //do nothing
            }
            else {
                //take the color away from previously selected node
                //var prevNode=YAHOO.widget.TreeView.getNode('tagstree',prevNodeId);
                clickedNodeMove.getLabelEl().style.backgroundColor = "white";
            }
            document.getElementById('CreateNodeMove').innerHTML = SUGAR.kb.getTagName(node, true);
            document.getElementById('Move').style.visibility = "visible";
            document.getElementById('Cancel_Move').style.visibility = "visible";
            document.getElementById('tag_selected_id').value = tagId;
            tagsTreeModalMoveDocs.setHeader(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_MOVING_ARTICLES_TO_TAG'));
            node.getLabelEl().style.backgroundColor = "CCFFFF";  //light blue gray(CCCCCC)
            clickedNodeMove = node;
        },

        selectTagToApplyArticles:function() {
            var selectedApplyTags = document.getElementsByName('selected_apply_tags[]');
            var checked = false;
            for (i = 0; i < selectedApplyTags.length; i++) {
                if (selectedApplyTags[i].checked) {
                    checked = true;
                }
            }

            /*tree = new YAHOO.widget.TreeView('tagstreeMoveDocsModal');
             var node=YAHOO.namespace('tagstreeApplyTags').selectednode;

             var tagId = node.data.id;
             var prevNodeId = document.getElementById('tag_selected_id').value;
             if(clickedNodeApply.data == undefined){
             //do nothing
             }
             else{
             //take the color away from previously selected node
             //var prevNode=YAHOO.widget.TreeView.getNode('tagstree',prevNodeId);
             clickedNodeApply.getLabelEl().style.backgroundColor = "white";
             }
             */
            if (checked) {
                document.getElementById('CreateNodeApply').innerHTML = SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_CLICK_APPLY_TAG');
                document.getElementById('Apply').style.visibility = "visible";
                document.getElementById('Cancel_Apply').style.visibility = "visible";
            }
            else {
                document.getElementById('CreateNodeApply').innerHTML = '<b><font COLOR=red>' + SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_SELECT_TAGS_FROM_TREE') + '</b>';
                document.getElementById('Apply').style.visibility = "hidden";
                document.getElementById('Cancel_Apply').style.visibility = "hidden";
            }
            //document.getElementById('tag_selected_id').value=tagId;
            //tagsTreeModalMoveDocs.setHeader(SUGAR.kb.getLocalizedLabels('KBDocuments','LBL_MOVING_ARTICLES_TO_TAG'));
            //node.getLabelEl().style.backgroundColor = "CCFFFF";  //light blue gray(CCCCCC)
            //clickedNodeApply=node;
        },

        selectTagToApplyArticles:function() {
            var selectedApplyTags = document.getElementsByName('selected_apply_tags[]');
            var checked = false;
            for (i = 0; i < selectedApplyTags.length; i++) {
                if (selectedApplyTags[i].checked) {
                    checked = true;
                }
            }

            /*tree = new YAHOO.widget.TreeView('tagstreeMoveDocsModal');
             var node=YAHOO.namespace('tagstreeApplyTags').selectednode;

             var tagId = node.data.id;
             var prevNodeId = document.getElementById('tag_selected_id').value;
             if(clickedNodeApply.data == undefined){
             //do nothing
             }
             else{
             //take the color away from previously selected node
             //var prevNode=YAHOO.widget.TreeView.getNode('tagstree',prevNodeId);
             clickedNodeApply.getLabelEl().style.backgroundColor = "white";
             }
             */
            if (checked) {
                document.getElementById('CreateNodeApply').innerHTML = SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_CLICK_APPLY_TAG');
                document.getElementById('Apply').style.visibility = "visible";
                document.getElementById('Cancel_Apply').style.visibility = "visible";
            }
            else {
                document.getElementById('CreateNodeApply').innerHTML = '<b><font COLOR=red>' + SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_SELECT_TAGS_FROM_TREE') + '</b>';
                document.getElementById('Apply').style.visibility = "hidden";
                document.getElementById('Cancel_Apply').style.visibility = "hidden";
            }
            //document.getElementById('tag_selected_id').value=tagId;
            //tagsTreeModalMoveDocs.setHeader(SUGAR.kb.getLocalizedLabels('KBDocuments','LBL_MOVING_ARTICLES_TO_TAG'));
            //node.getLabelEl().style.backgroundColor = "CCFFFF";  //light blue gray(CCCCCC)
            //clickedNodeApply=node;
        },

        getTagNameAdmin:function(node, newNode) {
            if (node.depth > 0) {
                tagName = '';
                currNode = '';
                for (i = 0; i <= node.depth; i++) {
                    if (i == 0) {
                        tagName = node.data.label.substring(node.data.label.lastIndexOf('>') + 1);
                        tagName = tagName.substring(0, tagName.indexOf('('));
                    }
                    if (i == 1) {
                        currNode = node.parent;
                        tagDelimName = currNode.data.label.substring(currNode.data.label.lastIndexOf('>') + 1);
                        tagName = tagDelimName.substring(0, tagDelimName.indexOf('(')) + '/' + tagName;

                    }
                    if (i > 1) {
                        currNode = currNode.parent;
                        tagDelimName = currNode.data.label.substring(currNode.data.label.lastIndexOf('>') + 1);
                        //tagName = tagName.substring(0,tagName.indexOf('('));

                        tagName = tagDelimName.substring(0, tagDelimName.indexOf('(')) + '/' + tagName;
                    }
                }
            } else {
                if (node.data.label.lastIndexOf('>') != -1 && tagName.indexOf('(') != -1) {
                    tagName = node.data.label.substring(node.data.label.lastIndexOf('>') + 1);
                    tagName = tagName.substring(0, tagName.indexOf('('));
                }
                else {
                    tagName = node.data.label;
                }
            }
            if (newNode) {
                if (tagName.length > 50) {
                    tagName = '...' + tagName.substring(tagName.length - 48) + '/';
                }
                else {
                    tagName = tagName + '/';
                }
            }

            if (tagName.indexOf('/') == 0) {
                tagName = tagName.substring(1);
            }
            return tagName;
        },

        getTagName:function(node, newNode) {
            if (node.depth > 0) {
                tagName = '';
                currNode = '';

                for (i = 0; i <= node.depth; i++) {
                    if (i == 0) {
                        tagName = node.data.label.substring(0, node.data.label.indexOf('('));
                    }
                    if (i == 1) {
                        currNode = node.parent;
                        tagName = currNode.data.label.substring(0, currNode.data.label.indexOf('(')) + '/' + tagName;
                    }
                    if (i > 1) {
                        currNode = currNode.parent;
                        tagName = currNode.data.label.substring(0, currNode.data.label.indexOf('(')) + '/' + tagName;
                    }
                }
            } else {
                if (node.data.label.indexOf('(') != -1) {
                    tagName = node.data.label.substring(0, node.data.label.indexOf('('));
                }
                else {
                    tagName = node.data.label;
                }
            }

            if (tagName.indexOf('/') == 0) {
                tagName = tagName.substring(1);
            }
            if (newNode) {
                if (tagName.length > 50) {
                    tagName = '...' + tagName.substring(tagName.length - 50) + '/';
                }
                else {
                    tagName = tagName + '/';
                }
            }
            //tagName= tagName.replace(/"/g,'\"');
            return tagName;
        } ,

        addTags:function() {
            link_tags = document.getElementById("Linked_Tags");
            link_tags.style.display = '';
            var addTagEl = document.getElementById('addTag');
            if (addTagEl != null) {
                var newVal = addTagEl.value + ' ' + tags.value;
                addTagEl.setAttribute('value', newVal);
            }
            else {
                var attId = document.createElement('input');
                attId.setAttribute('id', 'addTag');
                attId.setAttribute('name', 'addTag');
                attId.setAttribute('tabindex', '220');
                attId.setAttribute('type', 'text');
                attId.setAttribute('disabled', true);
                attId.setAttribute('value', tags.value);
                link_tags.appendChild(attId);
            }
        },

        loadDataForNode:function(node, onCompleteCallback) {
            var id = node.data.id;

            // -- code to get your data, possibly using Connect --
            if (id != 'Root Tag') {
                //var myobj = { label: id+"1", id:id+"1"} ;
                //var tmpNode = new YAHOO.widget.TextNode(myobj, node, false);
                //tmpNode = new YAHOO.widget.TextNode(id + "label2", node, false);
            }
            // Be sure to notify the TreeView component when the data load is complete
            onCompleteCallback();
        },

        checkDups:function(tagsVal, separator) {
            var tags = tagsVal.split(separator);
            var dups = null;
            for (var i = 0; i < tags.length; i++) {
                if (tags[i].length > 0) {
                    for (var j = 0; j < tags.length; j++) {
                        var tagI = "";
                        var tagJ = "";
                        if (tags[i].indexOf('/') != -1) {
                            tagI = tags[i].substring(0, tags[i].indexOf('/'));
                        }
                        else {
                            tagI = tags[i];
                        }
                        if (tags[j].indexOf('/') != -1) {
                            tagJ = tags[j].substring(0, tags[j].indexOf('/'));
                        }
                        else {
                            tagJ = tags[j];
                        }
                        //alert(tagI+" "+tagJ);
                        if (tagI != null && tagJ != null) {
                            if (i != j && tagI.toLowerCase() == tagJ.toLowerCase()) {
                                dups = "Duplicate tags " + tagI + " and " + tagJ + " at the same level";
                            }
                        }
                    }
                }
            }
            //return dups;
        },

        //Uploading multiple files (attachments) which get saved as documents with KBDcoument
        //This process will allows to upload N number of files

        multiAttachments:function(list_target, elmentsName, site_url, theme_name, isAtt) {
            // Where to write the list
            this.list_target = list_target;
            //this.list_target = document.getElementById(list_target);
            // How many elements?
            this.count = 0;
            // How many elements?
            this.id = 0;
            // Is there a maximum?

            /**
             * Add a new file input element
             */

            this.addElement = function(element) {
                // Make sure it's a file input element
                if (element.tagName == 'INPUT' && element.type == 'file') {
                    var currCount = this.id++;
                    // Element name -- what number am I?
                    //element.name = 'file_' + this.id++;
                    element.name = elmentsName + currCount;
                    element.id = elmentsName + currCount;


                    // Add reference to this object
                    element.multi_selector = this;
                    // What to do when a file is selected

                    element.onchange = function() {

                        //AJAX call begins
                        var callback = {
                            upload:function(r) {
                                var rets = YAHOO.lang.JSON.parse(r.responseText);
                                var thediv = document.getElementById(rets['div_name']);
                                //remove the div if not a file
                                if (rets['status'] == 'failed') {
                                    thediv.parentNode.removeChild(thediv);
                                    alert(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_NOT_A_VALID_FILE'));
                                }
                                else {
                                    //save the div
                                    if (!isAtt && rets['is_file_image'] == 0) {
                                        thediv.parentNode.removeChild(thediv);
                                        alert(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_NOT_A_VALID_FILE'));
                                    }
                                    else {
                                        thediv.setAttribute('id', rets['new_file_name']);
                                    }
                                }
                            }
                        }
                        //var currDivName = new Date();
                        var divAndEl = new Array(2);

                        var div_name = 'div_number' + currCount;
                        divAndEl[0] = div_name;
                        divAndEl[1] = element.name;

                        var url = 'index.php?module=KBDocuments&action=KbdocAttachments&to_pdf=1&div_name_and_El=' + divAndEl;
                        YAHOO.util.Connect.setForm(document.getElementById("upload_form"), true, true);
                        YAHOO.util.Connect.asyncRequest('POST', url, callback, null);
                        //AJAX call ends

                        //var theForm = document.getElementById('upload_form');
                        var theForm = document.getElementById('EditView');

                        // New file input
                        var new_element = document.createElement('input');
                        new_element.type = 'file';
                        // new_element.name = 'email_attachment' +up++;

                        // Add new element
                        this.parentNode.insertBefore(new_element, this);
                        // Apply 'update' to element
                        this.multi_selector.addElement(new_element);
                        // Update list
                        this.multi_selector.addListRow(this, div_name);

                        // Hide this: we can't use display:none because Safari doesn't like it
                        //this.style.display='none';
                        //display none works fine for FF and IE
                        this.style.display = 'none';
                        //later for Safari add following
                        //this.style.position = 'absolute';
                        //this.style.left = '-5000px';
                    };
                    // File element counter
                    this.count++;
                    // Most recent element
                    this.current_element = element;

                } else {
                    // This can only be applied to file input elements!
                    alert(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_ERROR_NOT_A_FILE_INPUT_ELEMENT'));
                }
                ;
            };

            /**
             * Add a new row to the list of files
             */
            this.addListRow = function(element, div_id) {
                // Row div
                var new_row = document.createElement('div');
                new_row.setAttribute('id', div_id);

                // Delete button
                var new_row_button_remove = document.createElement('img');
                new_row_button_remove.setAttribute("alt", "Remove");
                //new_row_button_remove.type = 'button';
                //new_row_button_remove.value = 'Remove';
                new_row_button_remove.setAttribute("src", "index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=delete_inline.gif");


                var new_row_file_name = document.createElement('pre');
                //		new_row_file_name.type = 'text';
                //new_row_file_name.size = '50';

                var new_row_chk_box = document.createElement('input');
                new_row_chk_box.setAttribute('id', 'checkBoxFile[]');
                new_row_chk_box.setAttribute('name', 'checkBoxFile[]');
                new_row_chk_box.type = 'checkbox';
                new_row_chk_box.checked = false;
                new_row_chk_box.disabled = true;

                var new_row_attach_file = document.createElement('input');
                new_row_attach_file.type = 'image';
                new_row_attach_file.value = '/index.php?entryPoint=getImage&themeName=' + SUGAR.themes.theme_name + '&imageName=company_logo.png';
                new_row_attach_file.disabled = 'true';

                var imgElement = document.createElement("img");
                imgElement.setAttribute("src", "index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=Accounts.gif");
                imgElement.setAttribute("align", "absmiddle");
                imgElement.setAttribute("alt", "File");
                imgElement.setAttribute("border", "0");
                imgElement.setAttribute("height", "18");
                imgElement.setAttribute("width", "16");

                var new_row_button_embed = document.createElement("img");
                new_row_button_embed.setAttribute("src", "index.php?entryPoint=getImage&themeName=" + SUGAR.themes.theme_name + "&imageName=plus_inline.gif");
                new_row_button_embed.setAttribute("align", "absmiddle");
                new_row_button_embed.setAttribute("alt", "Embed");
                new_row_button_embed.setAttribute("border", "0");
                //new_row_button_embed.setAttribute("height","20");
                //new_row_button_embed.setAttribute("width","20");


                /*
                 var new_row_button_embed = document.createElement( 'input' );
                 new_row_button_embed.type = 'button';
                 new_row_button_embed.value = 'Embed';
                 */
                // References
                new_row.element = element;
                element.size = '50';
                // Delete function
                new_row_button_remove.onclick = function() {
                    // Remove element from form
                    if (isAtt) {
                        var filename = element.value.replace(/\\/g, '/')
                        var text = filename.split("/");
                        nbr_elements = text.length;
                        var currVal = document.getElementById('removed_files').value;
                        if (currVal != '') {
                            currVal = currVal + ',' + text[nbr_elements - 1];
                        }
                        else {
                            currVal = text[nbr_elements - 1];
                        }
                        document.getElementById('removed_files').value = currVal;
                    }
                    filename = this.parentNode.parentNode.id;
                    if (!isAtt) {
                        var tiny = tinyMCE.getInstanceById('body_html');
                        var currValTiny = tiny.getContent();
                        while (currValTiny.indexOf(unescape(filename)) != -1) {
                            //check where the space is and keep replacing with $#32
                            currValTiny = currValTiny.replace(unescape(filename), 'QW%%^%%WQ');
                            currValTiny = currValTiny.replace(/<img[^<]*QW%%\^%%WQ[^>]*>?/, '');
                        }
                        tiny.setContent(currValTiny);
                    }

                    // Remove this row from the list

                    //this.parentNode.parentNode.removeChild( this.parentNode );
                    if (isAtt) {
                        currDiv = document.getElementById(this.parentNode.id);
                        currDiv.parentNode.removeChild(currDiv);
                    }
                    else {
                        currDiv = document.getElementById(this.parentNode.parentNode.id);
                        currDiv.parentNode.removeChild(currDiv);
                    }

                    return false;
                };

                new_row_button_embed.onclick = function() {
                    var filename = this.parentNode.parentNode.id;
                    embedImage = "<img src=\"index.php?entryPoint=download&type=SugarFieldImage&isTempFile=1&id=" + unescape(filename) + "\">";
                    var tiny = tinyMCE.getInstanceById('body_html');
                    tiny.getWin().focus();
                    tiny.execCommand('mceInsertRawHTML', false, embedImage);
                };

                new_row_file_name_tab = element.value.split("\\");
                nbr_elements = new_row_file_name_tab.length;
                new_row_file_name.innerHTML = new_row_file_name_tab[nbr_elements - 1];

                if (isAtt) {
                    new_row.appendChild(new_row_button_remove);
                    var spn = document.createElement("span");
                    spn.appendChild(document.createTextNode(' '));
                    var new_row_file_name = document.createElement('pre');
                    spn.appendChild(new_row_file_name.appendChild(document.createTextNode(new_row_file_name_tab[nbr_elements - 1])));
                    new_row.appendChild(spn);
                }
                else {
                    //new_row.appendChild(new_row_button_remove);
                    var spn = document.createElement("span");
                    spn.appendChild(new_row_button_remove);
                    spn.appendChild(document.createTextNode(' '));
                    //new_row.appendChild(new_row_button_embed);
                    spn.appendChild(new_row_button_embed);
                    spn.appendChild(document.createTextNode(' '));
                    var new_row_file_name = document.createElement('pre');
                    spn.appendChild(new_row_file_name.appendChild(document.createTextNode(new_row_file_name_tab[nbr_elements - 1])));
                    new_row.appendChild(spn);
                    //spn.appendChild( document.createTextNode(new_row_file_name_tab[nbr_elements-1]));
                }
                // Add it to the list
                list_target.appendChild(new_row);
                //document.getElementById(list_target).appendChild(new_row);
            };
        },
        copyTinyVal:function() {
             var tiny = tinyMCE.getInstanceById('body_html');
             if ( (null != tiny) || ("undefined" != typeof(tiny)) ) {
             var currValTiny = tiny.getContent();
             document.getElementById('tiny_vals').value = currValTiny;
             } else {
                document.getElementById('tiny_vals').value = document.getElementById('body_html').value;
             }
        },
        addUploadFileAttachments:function(form_name) {
            var chForm = document.getElementById('upload_div');
            var theForm = document.getElementById(form_name);
            var elems = chForm.getElementsByTagName("input");

            //get the count of all the email_attachment file elements
            var count = 0;
            for (var i = 0; i < elems.length; i++) {
                if (elems[i].type == "file") {
                    count++;
                }
            }
            //Use the count to add the documents

            for (var i = 0; i < count - 1; i++) {
                //  	find out all the email_attachments and append to the EditView form
                var el = document.getElementsByName('kbdoc_attachment' + i);
                //alert(el[0]);
                if (el[0] != null) {
                    theForm.appendChild(el[0]);
                }
            }
            var chForm = document.getElementById("upload_form");
            var elems = chForm.getElementsByTagName("input");
            for (var i = 0; i < elems.length; i++) {
                //  	find out all the email_attachments and append to the EditView form
                var el = elems[i];
                //var el = document.getElementsByName('checkBoxFile[]');

                if (el.id == 'checkBoxFile[]') {
                    //alert(el.name);
                    theForm.appendChild(el);
                }
            }
        },
        addDocTags:function(form_name) {
            var theForm = document.getElementById(form_name);
            var tagDiv = document.getElementById("Linked_Tags");
            var elems = theForm.getElementsByTagName("input");
            var elems1 = tagDiv.getElementsByTagName("input");
            for (var i = 0; i < elems1.length; i++) {
                //if (elems[i].type == "file") {
                var el = elems1[i];
                if (el.id == 'docTagIds[]') {
                    theForm.appendChild(el);
                }
            }
            for (var i = 0; i < elems.length; i++) {
                //if (elems[i].type == "file") {
                var el = elems[i];

                if (el.id == 'docTagIds[]') {
                    theForm.appendChild(el);
                }
                if (el.id.indexOf('docTagIds') >= 0 || el.id == 'docTagIds[]') {
                    theForm.appendChild(el);
                }
            }
        },
        externalChecked:function(defalut_team_name, default_team_id) {
            if (document.getElementById('is_external').checked) {
                var temp_array = [];
                temp_array['name'] = 'Global';
                temp_array['id'] = '1';
                collection['EditView_team_name'].replace_first(temp_array);
            }
            else {
                var temp_array = [];
                temp_array['name'] = defalut_team_name;
                temp_array['id'] = default_team_id;
                collection['EditView_team_name'].replace_first(temp_array);
                //document.getElementById('team_name').value=defalut_team_name;
                // document.getElementById('team_id').value=default_team_id;
                // document.getElementById('team_name').disabled=false;
                // document.getElementById('btn_team').style.visibility='visible';
            }
        },

        externalCheckedOnLoad:function() {
            if (document.getElementById('is_external').checked) {
                var temp_array = [];
                temp_array['name'] = 'Global';
                temp_array['id'] = '1';
                collection['EditView_team_name'].replace_first(temp_array);
                //document.getElementById('team_name').value='Global';
                //document.getElementById('team_id').value='1';
                //document.getElementById('team_name').disabled=true;
                //document.getElementById('btn_team').style.visibility='hidden';
            }
        },

        statusChecked:function() {
            if (document.getElementById('status_id') != null &&
                    document.getElementById('status_id').value == 'In Review' &&
                    document.getElementById('kbdoc_approver_name').value == '') {
                document.getElementById('kbdoc_approver_name').value = 'admin';
                document.getElementById('kbdoc_approver_id').value = '1';
            }
        },

        strikeOutFromImage:function(currTagId, currBox, tagOrDoc) {
            var currTag = document.getElementById(currTagId);
            var boxState = document.getElementById(currBox).checked;
            if (!boxState) {
                boxState = true;
            }
            else {
                boxState = false;
            }

            if (boxState) {
                currTag.innerHTML = "<strike><strong><font COLOR=red>" + currTag.innerHTML + "</font></>";
            }
            else {
                //currTag.innerHTML = currTag.innerHTML.substring(currTag.innerHTML.indexOf("<strike><strong><blink><font COLOR='#FF0000'>")+1,currTag.innerHTML.indexOf('</font>'));

                currTag.innerHTML = currTag.innerHTML.replace("<STRIKE>", '&#32');
                currTag.innerHTML = currTag.innerHTML.replace("</STRIKE>", '&#32');
                currTag.innerHTML = currTag.innerHTML.replace("<strike>", '&#32');
                currTag.innerHTML = currTag.innerHTML.replace("</strike>", '&#32');
                //currTag.innerHTML= currTag.innerHTML.replace("<strong>",'&#32');
                //currTag.innerHTML= currTag.innerHTML.replace("<blink>",'&#32');
                //currTag.innerHTML= currTag.innerHTML.replace("</font>",'&#32');
                //currTag.innerHTML= currTag.innerHTML.replace("<font",'&#32');
                currTag.innerHTML = currTag.innerHTML.replace("red", '');
                //currTag.innerHTML= currTag.innerHTML.replace('\"#ff0000\">','&#32');

            }
            document.getElementById(currBox).checked = boxState;

            if (tagOrDoc == 0) {
                var currVal = document.getElementById('removed_tags').value;
                if (currVal != '') {
                    var tags = currVal.split(",");
                    var exists = false;
                    tags_elements = tags.length;
                    for (i = 0; i < tags_elements; i++) {
                        if (tags[i] == currBox) {
                            exists = true;
                            break;
                        }
                    }
                    if (exists) {
                        if (tags_elements > 1) {
                            currBox = currBox + ',';
                            currVal = currVal.replace(currBox, '');
                        }
                        else {
                            currVal = currVal.replace(currBox, '');
                        }
                    }
                    else {
                        currVal = currVal + ',' + currBox;
                    }
                }
                else {
                    currVal = currBox;
                }
                document.getElementById('removed_tags').value = currVal;
            }
            //keep the removed attachments
            if (tagOrDoc == 1) {
                var currVal = document.getElementById('removed_attachments').value;
                if (currVal != '') {
                    var tags = currVal.split(",");
                    var exists = false;
                    tags_elements = tags.length;
                    for (i = 0; i < tags_elements; i++) {
                        if (tags[i] == currBox) {
                            exists = true;
                            break;
                        }
                    }
                    if (exists) {
                        if (tags_elements > 1) {
                            currBox = currBox + ','
                            currVal = currVal.replace(currBox, '');
                        }
                        else {
                            currVal = currVal.replace(currBox, '');
                        }
                    }
                    else {
                        currVal = currVal + ',' + currBox;
                    }
                }
                else {
                    currVal = currBox;
                }
                document.getElementById('removed_attachments').value = currVal;
            }
            //document.getElementById(currTag).innerHTML = "<strike "+  document.getElementById(currTag).innerHTML+ " /strike>";
        },
        strikeOutFromBox:function(currTagId, currBox) {
            var currTag = document.getElementById(currTagId);
            var boxState = document.getElementById(currBox).checked;
            if (boxState) {
                currTag.innerHTML = "<strike><strong><font COLOR=red>" + currTag.innerHTML + "</font></>";
            }
            else {
                //currTag.innerHTML = currTag.innerHTML.substring(currTag.innerHTML.indexOf("<strike><strong><blink><font COLOR='#FF0000'>")+1,currTag.innerHTML.indexOf('</font>'));

                currTag.innerHTML = currTag.innerHTML.replace("<STRIKE>", '&#32');
                currTag.innerHTML = currTag.innerHTML.replace("</STRIKE>", '&#32');
                currTag.innerHTML = currTag.innerHTML.replace("<strike>", '&#32');
                currTag.innerHTML = currTag.innerHTML.replace("</strike>", '&#32');
                //currTag.innerHTML= currTag.innerHTML.replace("<strong>",'&#32');
                //currTag.innerHTML= currTag.innerHTML.replace("<blink>",'&#32');
                //currTag.innerHTML= currTag.innerHTML.replace("</font>",'&#32');
                //currTag.innerHTML= currTag.innerHTML.replace("<font",'&#32');
                currTag.innerHTML = currTag.innerHTML.replace("red", '');
                //currTag.innerHTML= currTag.innerHTML.replace('\"#ff0000\">','&#32');

            }
            document.getElementById(currBox).checked = boxState;
            //alert(currTag.innerHTML);
            //document.getElementById(currTag).innerHTML = "<strike "+  document.getElementById(currTag).innerHTML+ " /strike>";
        },
        setCheckBox:function(currBox) {
            //document.createElementById('remove_atts[]')
            var chkBox = document.getElementsByName('remove_atts[]');
            var found = false;
            for (i = 0; i < chkBox.length; i++) {
                if (chkBox[i].value == currBox) {
                    if (chkBox[i].checked) {
                        chkBox[i].checked = false;
                        chkBox[i].value = '';
                    }
                    else {
                        chkBox[i].checked = true;
                    }
                    found = true;
                    break;
                }
            }
            if (!found) {
                chkBox[chkBox.length - 1].checked = true;
                chkBox[chkBox.length - 1].value = currBox;
            }
        },

        hideShowMoreTags:function(span) {
            if (span == 'more_options_img') {
                document.getElementById('more_tags_div').style.display = '';
                document.getElementById('more_tags_img').style.display = 'none';
                document.getElementById('less_tags_img').style.display = '';

            } else {
                document.getElementById('more_tags_div').style.display = 'none';
                document.getElementById('more_tags_img').style.display = '';
                document.getElementById('less_tags_img').style.display = 'none';
            }
        },
        cancelAdminActions:function() {
            document.getElementById('action_id').value = '';
            document.getElementById('adminTag').style.display = '';
            document.getElementById('createTag').style.display = 'none';
            document.getElementById('deleteTag').style.display = 'none';
            document.getElementById('renameTag').style.display = 'none';
            document.getElementById('moveArticles').style.display = 'none';
            document.getElementById('applyTags').style.display = 'none';
            document.getElementById('deleteArticles').style.display = 'none';
            //also look and set the messages to null
            document.getElementById('tag_message').innerHTML = '<b><font COLOR=red>' + SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_SELECT_PARENT_TAG_MESSAGE') + '</b>';
            document.getElementById('tag_message_rename').innerHTML = '<b><font COLOR=red>' + SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_SELECT_TAG_TO_BE_RENAMED_FROM_TREE') + '</b>';
            document.getElementById('tag_new').style.visibility = "hidden";
            document.getElementById('tag_save').style.visibility = "hidden";
        },

        adminActions:function() {
            var currAction = document.getElementById('action_id');

            if (currAction.value == '') {
                SUGAR.kb.actionsDropdown('adminTag');
            }
            if (currAction.value == 'Create New Tag') {
                SUGAR.kb.actionsDropdown('createTag');
            }
            if (currAction.value == 'Rename Tag') {
                SUGAR.kb.actionsDropdown('renameTag');
            }
            if (currAction.value == 'Delete Tag') {
                SUGAR.kb.actionsDropdown('deleteTag');
            }
            if (currAction.value == 'Move Selected Articles') {
                SUGAR.kb.actionsDropdown('moveArticles');
            }
            if (currAction.value == 'Apply Tags On Articles') {
                SUGAR.kb.actionsDropdown('applyTags');
            }
            if (currAction.value == 'Delete Selected Articles') {
                SUGAR.kb.actionsDropdown('deleteArticles');
            }
        },

        actionsDropdown:function(actionDiv) {
            document.getElementById('adminTag').style.display = 'none';
            document.getElementById('createTag').style.display = 'none';
            document.getElementById('deleteTag').style.display = 'none';
            document.getElementById('renameTag').style.display = 'none';
            document.getElementById('moveArticles').style.display = 'none';
            document.getElementById('applyTags').style.display = 'none';
            document.getElementById('deleteArticles').style.display = 'none';

            document.getElementById(actionDiv).style.display = '';
        },

        adminClick:function() {
            node = YAHOO.namespace("tagstree").selectednode;
            var currAction = document.getElementById('action_id');

            if (currAction.value == '' || currAction.value == 'Delete Tag') {
                return;
            }
            if (currAction.value == 'Create New Tag') {
                document.getElementById('tag_message').innerHTML = SUGAR.kb.getTagNameAdmin(node, true);
                document.getElementById('tag_selected_id').value = node.data.id;
                document.getElementById('tag_new').style.visibility = "visible";
                document.getElementById('tag_save').style.visibility = "visible";
            }
            if (currAction.value == 'Rename Tag') {
                if (node.parent == "RootNode" || node.data.id == 'All_Tags') {
                    alert(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_ROOT_TAG_CAN_NOT_BE_RENAMED'));
                    //document.getElementById('tag_selected_rename_parent_id').value= node.parent;
                }
                else {
                    var rename_tag = SUGAR.kb.getTagNameAdmin(node, true);
                    rename_tag = rename_tag.substring(0, rename_tag.lastIndexOf('/'));
                    document.getElementById('tag_message_rename').innerHTML = rename_tag;
                    document.getElementById('tag_selected_rename_id').value = node.data.id;

                    document.getElementById('tag_selected_rename_parent_id').value = node.parent.data.id;
                    document.getElementById('tag_name_rename').style.visibility = "visible";
                    document.getElementById('tag_save_rename').style.visibility = "visible";
                }

            }
        },

        //Function for renaming a tag. Will check if the tag already exists

        renameTag:function(admin) {
            var tagsTree = YAHOO.widget.TreeView.trees['tagstree'];
            var root = tagsTree.getRoot();
            var tag_id = '';
            var parent_tag_id = '';

            if (!(document.getElementById('tag_selected_rename_id').value == '') &&
                    (document.getElementById('tag_selected_rename_id').value.length > 0)) {
                tag_id = document.getElementById('tag_selected_rename_id').value;
            }

            if (!(document.getElementById('tag_selected_rename_parent_id').value == '') &&
                    (document.getElementById('tag_selected_rename_parent_id').value.length > 0)) {
                parent_tag_id = document.getElementById('tag_selected_rename_parent_id').value;
            }

            var newTag = document.getElementById('tag_name_rename').value;
            if (newTag != null && newTag.length > 0) {
                //check if the node already exists
                var nodeChildExists = false;
                if (parent_tag_id != null && parent_tag_id == 'RootNode') {
                    var root = tagsTree.getRoot();
                    if (root.children.length > 0) {
                        for (i = 0; i < root.children.length; i++) {
                            var currChild = root.children[i].label;
                            if (admin) currChild = currChild.substring(currChild.lastIndexOf('>') + 1);
                            currChild = currChild.substring(0, currChild.indexOf('('));
                            if (newTag.toLowerCase() == currChild.toLowerCase()) {
                                nodeChildExists = true;
                            }
                        }
                    }
                }
                if (!nodeChildExists) {
                    //Ajax call for adding the new tag
                    ajaxStatus.showStatus(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_SAVING_THE_TAG'));
                    if (admin == null || admin == 'undefined') {
                        admin = false;
                    }
                    var idName = new Array(3);
                    idName[0] = newTag;
                    idName[1] = tag_id;
                    idName[2] = parent_tag_id;

                    var treeDiv = document.getElementById('tagstree');
                    window.setTimeout('ajaxStatus.hideStatus()', 500);
                    var callback = {
                        success:function(r) {
                            if (r.responseText == 1) {
                                alert(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_TAG_ALREADY_EXISTS'));
                            }
                            else {
                                SUGAR.util.evalScript(r.responseText);
                                var currTagName = '';
                                var storedTag = document.getElementById('tag_message_rename').innerHTML;
                                if (storedTag.indexOf('/') != -1) {
                                    currTagName = storedTag.substring(storedTag.lastIndexOf('/') + 1);
                                }
                                else {
                                    currTagName = storedTag;
                                }
                                storedTag = storedTag.replace(currTagName, newTag);
                                document.getElementById('tag_message_rename').innerHTML = storedTag;
                            }
                        }
                    }
                    postData = 'newTagName=' + YAHOO.lang.JSON.stringify(idName) + '&module=KBTags&action=RenameTagsAdmin&to_pdf=1';
                    YAHOO.util.Connect.asyncRequest('POST', 'index.php', callback, postData);
                    if (admin) {
                        //hideMessageAndNodeAdmin();
                        document.getElementById('tag_name_rename').value = '';
                    }
                    else {
                        document.getElementById('tags_search').value = newTag;
                        searchTree(false);
                        document.getElementById('tags_search').value = '';
                        SUGAR.kb.hideMessageAndNode();
                    }

                    previousNodesCount = YAHOO.widget.TreeView.trees['tagstree']._nodes.length;
                    previousSearchFoundTags = new Array();
                    clickedNode = '';
                }
                else {
                    alert(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_TAG_ALREADY_EXISTS'));
                }
            }
            else {
                alert(SUGAR.kb.getLocalizedLabels('KBDocuments', 'LBL_TYPE_THE_NEW_TAG_NAME'));
            }
        },

        paginateList:function(url, mode) {
            if (mode == 'browse') {
                var callback = {
                    success: function(o) {
                        var targetdiv = document.getElementById('selected_directory_children');
                        targetdiv.innerHTML = o.responseText;
                        SUGAR.util.evalScript(o.responseText);
                    },
                    failure: function(o) {/*failure handler code*/
                    }
                    //argument: [target, targettype]
                }
                var trobj = YAHOO.util.Connect.asyncRequest('POST', url, callback);

            } else {
                document.location.href = url;
            }
        }
    }
}();


