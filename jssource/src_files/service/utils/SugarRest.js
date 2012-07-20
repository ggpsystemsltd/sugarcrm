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


if(typeof(SugarRest) == 'undefined'){

/**
 * Constructor for SugarRest Service
 * @param {Object} proxy_url - Relative URL to a proxy file or to the Rest Service
 * @param {Object} server_url - Full URL to the Web Server 
 */	
SugarRest = function(proxy_url, server_url, application_name){
	this.proxy_url = proxy_url;
	this.server_url = server_url;
	this.session_id = false;
	this.user_id = false;
	this.application_name = application_name;
	
}

/**
 * executes an AJAX request to the Server
 * @param {Object} method - name of the REST method you wish to call on
 * @param {Object} args - arguments for the method 
 * @param {Object} callback - a function to call on once the request has returned
 * @param {Object} params - arguments that are passed along with the callback
 */
SugarRest.prototype.call = function(method, args, callback, params, response_type){
	if(!callback)callback = this.log;
	console.log(callback);
	query = this.getQuery(method, args, response_type);
	YAHOO.util.Connect.asyncRequest('POST', this.proxy_url  , {success:callback, failure:callback,scope:this, argument:params}, query);
}

/**
 * generates the query string for the AJAX request
 * @param {Object} method - name of the REST method you wish to call on
 * @param {Object} args - arguments for the method 
 */
SugarRest.prototype.getQuery = function(method, args, response_type){
	if(!response_type)response_type = 'JSON';
	query = 'method=' + method + '&input_type=JSON&response_type=' + response_type;
	if(args != null){
		m = YAHOO.lang.JSON.stringify(args);
		query += '&rest_data=' + m;
	}
	return query;
}	

/**
 * returns the sugar servers information including version , GMT time, and server time
 * @param {Object} callback - a function your would like to have called on when the AJAX call completes
 */
SugarRest.prototype.get_server_info =  function(callback){
	this.call('get_server_info', '', callback);
}

/**
 * logs in a user to the SugarCRM instance with a the given user_name and password
 * @param {Object} user_name
 * @param {Object} password
 */
SugarRest.prototype.login = function(user_name, password){
	encryption = 'PLAIN';
	if (typeof(hex_md5) != 'undefined') {
		password = hex_md5(password);
		encryption = 'MD5';
	}
	
	var loginData = [{
		user_name: user_name,
		password:password,
		encryption: encryption,
	},this.application_name];
	console.log('Encryption:' + encryption);
	this.call('login', loginData, this._login);
	
}

/**
 * takes the result of a login attempt and stores the session id and user id for the logged in user
 * @param {Object} o
 */
SugarRest.prototype._login = function(o){
		
	data = YAHOO.lang.JSON.parse(o.responseText);
	console.log(data);
	this.session_id = data['id'];
	this.user_id = data['name_value_list']['user_id'];
}

/**
 * logs a user out of a session
 * @param {Object} callback
 */
SugarRest.prototype.logout = function(callback){
	this.call('logout', this.session_id, callback);
}

/**
 * 
 * @param {Object} module_name - name of the module the record belongs to
 * @param {Object} id - the id of the record
 * @param {Object} select_fields - a list of fields your would like to retrieve from the record
 * @param {Object} link_name_to_fields_array - 
 */
SugarRest.prototype.get_entry = function( module_name, id, select_fields,link_names_to_related_fields, callback){
	this.call('get_entry', [this.session_id,module_name, id, select_fields,link_names_to_related_fields],  callback);
}

/**
 * 
 * @param {Object} module_name - name of the module the record belongs to
 * @param {Object} id - the id of the record
 * @param {Object} select_fields - a list of fields your would like to retrieve from the record
 * @param {Object} link_name_to_fields_array - 
 */
SugarRest.prototype.get_entries = function( module_name, ids, select_fields,link_names_to_related_fields, callback){
	this.call('get_entries', [this.session_id,module_name, ids, select_fields,link_names_to_related_fields],  callback);
}

SugarRest.prototype.seamless_login = function(){
	this.call('seamless_login', this.session_id, this._seamless_login);
}

SugarRest.prototype._seamless_login = function(o){
	window.open('GET', this.server_url);
}







/**
 * 
 * @param {Object} module_name
 * @param {Object} query
 * @param {Object} order_by
 * @param {Object} select_fields
 * @param {Object} offset
 * @param {Object} max_results
 * @param {Object} link_name_to_fields
 * @param {Object} callback
 */
SugarRest.prototype.get_entry_list = function(module_name, query, order_by, select_fields,offset,max_results, link_names_to_related_fields, callback){
	var data = [this.session_id, module_name, query, order_by,offset,select_fields, link_names_to_related_fields, max_results , 0];
	this.call('get_entry_list', data, callback);
}

SugarRest.prototype.rss_get_entry_list = function(module_name, query, order_by, select_fields, offset, max_results, link_names_to_related_fields, callback){
	var data = [this.session_id, module_name, query, order_by,offset,select_fields, link_names_to_related_fields, max_results , 0];
	this.call('get_entry_list', data, callback, null, 'RSS');
}
SugarRest.prototype.rss_popup_get_entry_list = function(module_name, query, order_by, select_fields, offset, max_results, link_names_to_related_fields, callback){
	var data = [this.session_id, module_name, query, order_by,offset,select_fields, link_names_to_related_fields, max_results , 0];
	query = this.getQuery('get_entry_list', data, 'RSS');	
	window.open(this.proxy_url+ '?' + query);
	
}



SugarRest.prototype.set_relationship = function(module_name, module_id, link_name, related_ids){
	var data = [this.session_id, module_name, module_id, link_name, related_ids];
	this.call('set_relationship', data, callback);
}

SugarRest.prototype.set_relationships = function (module_name, module_ids, link_names, related_ids){
	var data = [this.session_id, module_name, module_ids, link_names, related_ids];
	this.call('set_relationship', data, callback);
}

SugarRest.prototype.get_relationships = function(module_name, module_id, link_name, link_query, link_fields, link_related_fields){
	var data = [this.session_id, module_name, module_id, link_name, link_query, link_fields, link_related_fields];
	this.call('get_relationships', data, callback);
}

SugarRest.prototype.set_note_attachment = function(note_id, filename, base64file, related_module, related_module_id, callback){
	var data = [this.session_id, [note_id, filename, base64file, related_module, related_module_id]];
	this.call('set_note_attachment',data, callback );
}

SugarRest.prototype.get_note_attachment = function(note_id){
	this.call('get_note_attachment', [this.session_id, note_id]);
}

SugarRest.prototype.set_document_revision = function(document_id,revision, filename, base64file, callback){
	var data = [this.session_id, [document_id, revision, filename, base64file]];
	this.call('set_document_revision',data, callback );
}

SugarRest.prototype.set_document_revision = function(revision_id){
	this.call('get_document_revision', [this.session_id, revision_id]);
}


/**
 * logs an object to the console if it is available
 * @param {Object} o
 */
SugarRest.prototype.log = function(o){
	data = YAHOO.lang.JSON.parse(o.responseText);
	if(typeof(console) != 'undefined')console.log(data);
	return data;
}


	
	
}
