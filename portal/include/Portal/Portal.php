<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
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


require_once("include/nusoap/nusoap.php");

class Portal {
    var $soapClientProxy;
    var $soapClient;
    var $soapSession;
    var $soapError;

    function Portal() {

    }

    /**
     * logins into the app
     *
     * @param name string user name of the portal user in the parent crm install
     * @param password string password for the user the portal user in the parent crm install
     * @param contactName string portal username of the contact logging in
     * @param contactPassword string portal password of the contact logging in
     *
     * @return string soad session id
     */
    function login($name, $password, $contactName, $contactPassword) {
        global $sugar_config;

        $this->loadSoapClient();
        $this->checkPortalStatus('portal_login_contact');
        $result = $this->soapClientProxy->portal_login_contact(array('user_name' => $name, 'password' => md5($password), 'version' => '.01'), array('user_name' => $contactName, 'password' => md5($contactPassword)), 'SoapTest');

        $this->soapSession = $result['id'];

        $this->handleResult($result);

        return $result;
    }

    /**
     * login for lead portal entry point
     *
     */
    function leadLogin($name, $password) {
        global $sugar_config;

        $this->soapClient = new nusoapclient($sugar_config['parent_site_url'] . '/soap.php?wsdl', true);
        $this->soapClientProxy = $this->soapClient->getProxy();

        $result = $this->soapClientProxy->portal_login(array('user_name' => $name, 'password' => md5($password), 'version' => '.01'), 'lead', 'SoapTest');
        $this->soapSession = $result['id'];

        return $result;
    }

    /**
     * loadSoapClient
     * connects and loads the WSDL file to instantiate a nusoapclient instance
     *
     */
    function loadSoapClient() {
        global $sugar_config;

        $this->soapClient = new nusoapclient($sugar_config['parent_site_url'] . '/soap.php?wsdl', true, false, false, false, false, 50, 50);
        $err = $this->soapClient->getError();
        if($err) {
        	if(empty($GLOBALS['log'])) {
        	   require_once ('log4php/LoggerManager.php');
        	   $GLOBALS['log'] = LoggerManager :: getLogger('SugarCRM');
        	} //if
            $GLOBALS['log']->fatal('There was a problem connecting to the SugarCRM Server. The SugarCRM server is not responding.');
            $GLOBALS['log']->fatal($err);

            header('Location: error.php?from=portal.php');
        } else {
            $this->soapClientProxy = $this->soapClient->getProxy();
        }
    }


     /**
     * get the current_user_id of the logged in user
     *
     */
    function getCurrentUserID() {
        global $sugar_config;

        $this->soapClient = new nusoapclient($sugar_config['parent_site_url'] . '/soap.php?wsdl', true);

        $err = $this->soapClient->getError();

        if($err) {
            $GLOBALS['log']->fatal('There was a problem connecting to the SugarCRM Server. The SugarCRM server is not responding.');
            header('Location: error.php?from=portal.php');
        }
        else {
            $this->soapClientProxy = $this->soapClient->getProxy();
        }

        $this->checkPortalStatus('portal_get_sugar_contact_id');
        $result = $this->soapClientProxy->portal_get_sugar_contact_id($this->soapSession);

        $this->handleResult($result);

        return $result;
    }

    /**
     * logs out
     *
     */
    function logout() {
        $result = $this->soapClientProxy->portal_logout($this->soapSession);

        return $result;
    }

    /**
     * gets a single entry
     *
     * @param module string the module to retrieve
     * @param id guid id of the record
     * @param fields array fields to return
     *
     * @return array result
     */
    function getEntry($module, $id, $fields) {
        $this->checkPortalStatus('portal_get_entry');
        $result = $this->soapClientProxy->portal_get_entry($this->soapSession, $module, $id, $fields);
        $modStrings = array();

        $returnFields = $this->getFields($module, true);
        $data = array();

        foreach($result['entry_list'] as $num => $case) {
            foreach($case['name_value_list'] as $fieldNum => $field) {
                $data[$field['name']] = $field['value'];
            }
        }

        $this->handleResult($result);

        return array('fields' => $returnFields, 'data' => $data);
    }

    /**
     * Retrieves a list of entries
     *
     * @param module string the module to retrieve
     * @param where string where clause to use
     * @param orderBy string order by clause
     * @param offset int offset
     * @param limit int number of records to retrieve
     *
     * @return array result
     */
    function getEntries($module, $where, $orderBy, $offset = 0, $limit = 20) {
        $this->checkPortalStatus('portal_get_entry_list_filter');

        $result = $this->soapClientProxy->portal_get_entry_list_filter($this->soapSession, $module, $orderBy, 'name', $offset, $limit, $where);
        $this->handleResult($result);
        if($this->soapError['number'] != 0) {
            $result['entry_list'] = array();
            $result['field_list'] = array();
        }
        $this->handleResult($result);
        return $result;
    }

    /*
     * getChildTags
     * This function returns an Array of tag entries that have parent id set to $tag
     * @param $tag The tag's parent id to search with
     * @return $result Array of tag entries that have parent id set to $tag
     */

    function getChildTags($tag) {
        $this->checkPortalStatus('portal_get_child_tags');
        $result = $this->soapClientProxy->portal_get_child_tags($this->soapSession, $tag);
        return $result;
    }

    /*
     * getTagDocs
     * This function returns an Array of document ids and names that are linked to the given $tag
     * @param $tag The tag id to search with
     * @return $result Array of documents that have a relationship to $tag parameter
     */

    function getTagDocs($tag) {
    	$this->checkPortalStatus('portal_get_tag_docs');
    	$result = $this->soapClientProxy->portal_get_tag_docs($this->soapSession, $tag);
    	return $result;
    }

    /**
     * getKBDocumentBody
     * This function returns the String portion of the KBDocument's content
     * @param $id The document id to search with
     * @return $result The document body value
     */

    function getKBDocumentBody($doc_id) {
    	$this->checkPortalStatus('portal_get_kbdocument_body');
    	$result = $this->soapClientProxy->portal_get_kbdocument_body($this->soapSession, $doc_id);
    	return $result;
    }


    /**
     * sets the related note
     *
     * @param noteId guid guid of the note
     * @param relatedToModuleName parent module of the ntoe
     * @param recordId guid the guid of the record of the parent module
     *
     * @return array result
     */
    function relateNote($noteId, $relateToModuleName, $recordId) {
        $this->checkPortalStatus('portal_relate_note_to_module');
        $result = $this->soapClientProxy->portal_relate_note_to_module($this->soapSession, $noteId, $relateToModuleName, $recordId);

        $this->handleResult($result);
        return $result;
    }

    /**
     * gets the related notes of a record
     *
     * @param module string the module to retrieve
     * @param recordId guid the guid of the record of the parent module
     * @param fields array fields to return
     *
     * @return array result
     */
    function getRelated($module, $rel_module, $recordId, $fields, $orderBy = '', $offset = 0, $limit = -1) {
        $this->checkPortalStatus('portal_get_related_list');
        $result = $this->soapClientProxy->portal_get_related_list($this->soapSession, $module, $rel_module, $recordId, $fields, $orderBy, $offset, $limit);
        $this->handleResult($result);
        return $result;
    }

    /**
     * saves a record
     *
     * @param module string the module to save
     * @param nameValues array name values of the fields to save
     *
     * @return array result
     */
    function save($module, $nameValues) {
        $this->checkPortalStatus('portal_set_entry');
        $result = $this->soapClientProxy->portal_set_entry($this->soapSession, $module, $nameValues);

        $this->handleResult($result);
        return $result;
    }

    /**
     * returns the fields for a module and caches, or returns the cached version
     *
     * @param module string the module to save
     * @param reformatted bool return as soap would or return as name => values
     *
     * @return array fields
     */
    function getFields($module, $reformatted = false) {


        require_once('include/utils/file_utils.php');
        global $sugar_config;

        $cached = false;
        if(is_file($sugar_config['cache_dir'] . 'moduleFields/' . $module . '/moduleFields.php')) {
            include($sugar_config['cache_dir'] . 'moduleFields/' . $module . '/moduleFields.php');
            $result = $moduleFields[$module];
            if(empty($result['error'])) $cached = true; // if for some reason the saved fields is actually a soap error!
        }

        if(!$cached) {
            $this->checkPortalStatus('portal_get_module_fields');
            $result = $this->soapClientProxy->portal_get_module_fields($this->soapSession, $module);
            $cacheDir = create_cache_directory('moduleFields/' . $module . '/');
            if($module == 'Cases') {
               foreach($result['module_fields'] as $key=>$field) {
               	       if($field['name'] == 'name') {
               	          $result['module_fields'][$key]['required'] = true;
               	          break;
               	       } //if
               } //foreach
            }

            foreach($result['module_fields'] as $key=>$field) {
                       if($field['type'] == 'assigned_user_name') {
                       	  $result['module_fields'][$key]['type'] = 'text';
                       } else if($field['name'] == 'id' && isset($field['required']) && $field['required']) {
                       	  $result['module_fields'][$key]['required'] = 0;
                       }
            }

            write_array_to_file("moduleFields['$module']", $result, $cacheDir . 'moduleFields.php');
        }

        if($reformatted) {
            $moduleFields = array();
            $moduleFields[$module] = array();
            foreach($result['module_fields'] as $num => $def) {
                if($def['type'] == 'radioenum' || $def['type'] == 'enum' || $def['type'] == 'multienum' || $def['type'] == 'bool') {
                    $options = array();
                    foreach($def['options'] as $n => $nv) {
                        $options[$nv['name']] = $nv['value'];
                    }
                    $def['options'] = $options;
                }
                else {
                    unset($def['options']);
                }

                $moduleFields[$module][$def['name']] = $def;
            }
            return $moduleFields[$module];
        }

        $this->handleResult($result);

        return $result;
    }

    function setAttachmentToNote($noteId, $fileLocation, $filename) {
        $contents = file_get_contents($fileLocation);

        $this->checkPortalStatus('portal_set_note_attachment');
        $result = $this->soapClientProxy->portal_set_note_attachment($this->soapSession, array('id' => $noteId, 'filename' => $filename, 'file' => base64_encode($contents)));

        $this->handleResult($result);

        return $result;
    }

    function removeAttachmentFromNote($noteId) {
        $this->checkPortalStatus('portal_remove_note_attachment');
        $result = $this->soapClientProxy->portal_remove_note_attachment($this->soapSession, $noteId);

        $this->handleResult($result);

        return $result;
    }

    function getAttachment($noteId) {
        $this->checkPortalStatus('portal_get_note_attachment');
        $result = $this->soapClientProxy->portal_get_note_attachment($this->soapSession, $noteId);

        $this->handleResult($result);
        return $result;
    }

    function getKBDocumentAttachment($documentId) {
        $this->checkPortalStatus('portal_get_kbdocument_attachment');
        $result = $this->soapClientProxy->portal_get_kbdocument_attachment($this->soapSession, $documentId);
        $this->handleResult($result);
        return $result;
    }

    function getSubscriptionLists() {
        $this->checkPortalStatus('portal_get_subscription_lists');
        $result = $this->soapClientProxy->portal_get_subscription_lists($this->soapSession);
        $this->handleResult($result);

        return $result;
    }

    function setNewsletters($subscribeIds, $unsubscribeIds) {
        $this->checkPortalStatus('portal_set_newsletters');
        $result = $this->soapClientProxy->portal_set_newsletters($this->soapSession, $subscribeIds, $unsubscribeIds);
        $this->handleResult($result);

        return $result;
    }

    /**
     * Handles the result of any soap requests, checks for errors etc
     */
    function handleResult($result) {
        global $current_language;

        $this->soapError = null;
        if(!empty($result['error']['number'])) {
        	$GLOBALS['log']->fatal($result['error']['number']);
            switch($result['error']['number']) { // handle no session errors here
                case '10': // invalid login
                case '11': // no valid session
                    if(!empty($_SESSION)) {
                    session_destroy();
                    }
                    session_start();
                    $GLOBALS['log']->fatal($result['error']);
                    $app_strings = return_application_language($current_language);
                    $_SESSION['login_error'] = $app_strings['NTC_LOGIN_MESSAGE'];
                    header('Location: index.php?module=Users&action=Login');
                    die();
                    break;
                case '12': // no user configured
                    if(!empty($_SESSION)) {
                    session_destroy();
                    }
                    session_start();
                    $GLOBALS['log']->fatal($result['error']);
                    // redirect to login page here
                    $app_strings = return_application_language($current_language);
                    $_SESSION["login_error"] = $app_strings['ERR_PORTAL_LOGIN_FAILED'];
                    header('Location: index.php?module=Users&action=Login&sessiontimeout=1');
                    die();
                    break;
                case '90': // resource management error
                    $GLOBALS['log']->fatal($result['error']);
                    header('Location: resourceError.php?module=' . $_REQUEST['module'] . '&msg='.urlencode($result['error']['description']));
                    die();
                    break;
                default:
                    $this->soapError = $result['error'];
                break;
            }
        }
    }

    /**
     * Do some checking to see if the parent instance is still alive
     */
    function checkPortalStatus($function) {
        global $sugar_config;
        if(empty($this->soapClientProxy->operations[$function])) {
            $GLOBALS['log']->fatal('Parent SugarCRM install doesn\'t have function : ' . $function . '. Please ensure that portal is enabled on the SugarCRM Server');
            header('Location: error.php?from=portal.php');
            die();
        }
    }

    /**
     * getImages
     * This method retrieves and caches a copy of each image URL link
     * specified in the $images Array parameter
     * @param $images Array of image URL links to retrieve and cache
     */
	function getImages($images){
		foreach($images as $image){
			if(substr_count($image, '://') > 0)continue;
			if(substr($image, 0, 4) == 'cid:'){
				$image = $GLOBALS['sugar_config']['cache_dir'].'images/' . substr($image, 4);
			}
			$basename = '/'. basename($GLOBALS['sugar_config']['parent_site_url']) . '/';
			if(substr($image, 0, strlen($basename)) == $basename){
				$image = substr($image, strlen($basename));
			}
			$image = $image[0] == '/' ? substr($image, 1) : $image;

            if(!file_exists($image)){
               $get_url= $GLOBALS['sugar_config']['parent_site_url'] . '/'. $image;
               $base_image_name=basename($get_url);
               $get_url=str_replace($base_image_name,rawurlencode($base_image_name),$get_url);
               $content = file_get_contents($get_url);
               $fp = fopen($image, 'wb');
               fwrite($fp, $content);
               fclose($fp);
            } //if
		} //foreach
	}

	function addModulesIfFunctionExists($function, $modules, $checkPortal=false){
		static $addModules = array();
		if(!empty($function)){
			$addModules[] = array('function'=>$function, 'modules'=>$modules);
		}
		if($checkPortal){
			foreach($addModules as $am){
				if(!empty($GLOBALS['portal']->soapClientProxy->operations[$am['function']])){
					foreach($am['modules'] as $module){
						$GLOBALS['moduleList'][] = $module;
					}
				}
			}
			$addModules = array();
		}
	}

}






?>