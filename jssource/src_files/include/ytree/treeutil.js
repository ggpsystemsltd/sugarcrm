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


function treeinit(tree,treedata,treediv,params) {
	tree = new YAHOO.widget.TreeView(treediv);
   	
   	//create a name space for the tree.
   	//and store the module name;
   	YAHOO.namespace(treediv).param=params;
   	
   	var root= tree.getRoot();
   	var tmpNode;

  	var data=treedata; 	
   	//loop thru all root level nodes.	
   	for (nodedata in data) {
		for (node in data[nodedata]) {
   			addNode(root, data[nodedata][node]);
		}
   	}
   	tree.subscribe("clickEvent", function(o){
   		set_selected_node(this.id, null, o.node);
   	});
   	
   	tree.draw();
}

//set clicked node's id in tree's name space.
function set_selected_node(treeid, nodeid, node) {
	if (typeof(node) == 'undefined')
		node=YAHOO.widget.TreeView.getNode(treeid,nodeid);
	
	if (typeof(node) != 'undefined') {
		YAHOO.namespace(treeid).selectednode=node;
	} else {
		//clear selection.
		YAHOO.namespace(treeid).selectednode=null;
	}
}

//add a node to the tree, function adds nodes recursively.
//change this function
function addNode(parentnode,nodedef) {
	var dynamicload=false;
	var dynamicloadfunction;
	var childnodes;
	var expanded=false;
	
	if (nodedef['data'] != 'undefined') {
		//get custom property values;
		if (typeof(nodedef['custom']) != 'undefined') {
			dynamicload=nodedef['custom']['dynamicload'];
			dynamicloadfunction=nodedef['custom']['dynamicloadfunction'];
			expanded=nodedef['custom']['expanded'];
		}
		
		var tmpNode=new YAHOO.widget.TextNode(nodedef['data'], parentnode, expanded);	
		
		if (dynamicload) {
			tmpNode.setDynamicLoad(eval(dynamicloadfunction));
		}
		//add child nodes.		
		if (typeof(nodedef['nodes']) != 'undefined') {
		   	for (childnodes in nodedef['nodes']) {
		   			addNode(tmpNode, nodedef['nodes'][childnodes]);
	   		}
		}
	}
}

//use this function to respond to node click.
//the clicked node is set by set_selected_node, in the tree's name space.
//function will make an ajax call and populate the results in the target.
//target type should be of type div, the function does not support other
//target types.
function node_click(treeid,target,targettype,functioname) {
	node=YAHOO.namespace(treeid).selectednode;

	//request url.
	var url=site_url.site_url + "/index.php?entryPoint=TreeData&function="+functioname+ construct_url_from_tree_param(node);

	var callback =	{
		  success: function(o) {    
			    	var targetdiv=document.getElementById(o.argument[0]);
			    	targetdiv.innerHTML=o.responseText;
			    	SUGAR.util.evalScript(o.responseText);
		  },
		  failure: function(o) {/*failure handler code*/},
		  argument: [target, targettype]
	}
	
	var trobj = YAHOO.util.Connect.asyncRequest('GET',url, callback, null);
	
}

//construs url parameters from node and tree parameters.
function construct_url_from_tree_param(node) {
	var treespace=YAHOO.namespace(node.tree.id);

	url="&PARAMT_depth="+node.depth;

	//add request parameters from the trees name space.
	if (treespace != 'undefined') {
		for (tparam in treespace.param) {
			url=url+"&PARAMT_"+tparam+'='+treespace.param[tparam];
		}
	}	

	//add parent nodes id to the url.
	for (i=node.depth;i>=0;i--) {
		var currentnode;
		if (i==node.depth) {	
			currentnode=node;
		} else {
			currentnode=node.getAncestor(i);
		}
		//add id to url.
		url=url+"&PARAMN_id"+'_'+currentnode.depth+'='+currentnode.data.id;			

		//add other requested parameters.
		if (currentnode.data.param != 'undefined') {
			for (nparam in currentnode.data.param) {
				url=url+"&PARAMN_"+nparam+'_'+currentnode.depth+'='+currentnode.data.param[nparam];			
			}
		}
	}
	return url;
}

//following function uses an AJAX call to load the children nodes dynamically.
//this methods assumes that you have TreeData.php in the root of you application.
//the file must have get_node_data function.
//return value must be an array of nodes.
function loadDataForNode(node, onCompleteCallback) {
    var id= node.data.id;

	var params="entryPoint=TreeData&function=get_node_data" + construct_url_from_tree_param(node);

	var callback =	{
		  success: function(o) {    
	   			node=o.argument[0];
    			var nodes=YAHOO.lang.JSON.parse(o.responseText);
				var tmpNode;
			   	for (nodedata in nodes) {
					for (node1 in nodes[nodedata]) {
   						addNode(node, nodes[nodedata][node1]);
					}
   				}	
		     	o.argument[1]();
		  },
		  failure: function(o) {/*failure handler code*/},
		  argument: [node, onCompleteCallback]
	}
	var trobj = YAHOO.util.Connect.asyncRequest('POST','index.php', callback, params);
}