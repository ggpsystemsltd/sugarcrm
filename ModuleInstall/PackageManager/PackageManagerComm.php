<?php
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

require_once('include/nusoap/nusoap.php');
require_once('ModuleInstall/PackageManager/PackageManagerDownloader.php');

define("HTTPS_URL", "https://depot.sugarcrm.com/depot/SugarDepotSoap.php");
define("ACTIVE_STATUS", "ACTIVE");

class PackageManagerComm{
     /**
      * Initialize the soap client and store in the $GLOBALS object for use
      *
      * @param login    designates whether we want to try to login after we initialize or not
      */
     function initialize($login = true){
        if(empty($GLOBALS['SugarDepot'])){
            $GLOBALS['log']->debug('USING HTTPS TO CONNECT TO HEARTBEAT');
            $soap_client = new nusoapclient(HTTPS_URL, false);
            $ping = $soap_client->call('sugarPing', array());
            $GLOBALS['SugarDepot'] = $soap_client;
        }
        //if we do not have a session, then try to login
        if($login && empty($_SESSION['SugarDepotSessionID'])){
            PackageManagerComm::login();
        }
     }

     /**
      * Check for errors in the response or error_str
      */
     function errorCheck(){
     	if(!empty($GLOBALS['SugarDepot']->error_str)){
     		$GLOBALS['log']->fatal($GLOBALS['SugarDepot']->error_str);
     		$GLOBALS['log']->fatal($GLOBALS['SugarDepot']->response);
     	}
     }

     /**
      * Set the credentials for use during login
      *
      * @param username    Mambo username
      * @param password     Mambo password
      * @param download_key User's download key
      */
     function setCredentials($username, $password, $download_key){
        $_SESSION['SugarDepotUsername'] = $username;
        $_SESSION['SugarDepotPassword'] = $password;
        $_SESSION['SugarDepotDownloadKey'] = $download_key;
     }

     /**
      * Clears out the session so we can reauthenticate.
      */
     function clearSession(){
     	$_SESSION['SugarDepotSessionID'] = null;
     	unset($_SESSION['SugarDepotSessionID']);
     }
     /////////////////////////////////////////////////////////
     ////////// BEGIN: Base Functions for Communicating with the depot
     /**
      * Login to the depot
      *
      * @return true if successful, false otherwise
      */
     function login($terms_checked = true){
      if(empty($_SESSION['SugarDepotSessionID'])){
	      global $license;
	        $GLOBALS['log']->debug("Begin SugarDepot Login");
	        PackageManagerComm::initialize(false);
	        require('sugar_version.php');
	        require('config.php');
	        $credentials = PackageManager::getCredentials();
	        if(empty($license))loadLicense();
	        $info = sugarEncode('2813', serialize(getSystemInfo(true)));
	        $pm = new PackageManager();
	        $installed = $pm->buildInstalledReleases();
	        $installed = base64_encode(serialize($installed));
	        $params = array('installed_modules' => $installed, 'terms_checked' => $terms_checked, 'system_name' => $credentials['system_name']);
	        $terms_version = (!empty($_SESSION['SugarDepot_TermsVersion']) ? $_SESSION['SugarDepot_TermsVersion'] : '');
	        if(!empty($terms_version))
	        	$params['terms_version'] = $terms_version;

	        $result = $GLOBALS['SugarDepot']->call('depotLogin', array(array('user_name' => $credentials['username'], 'password' => $credentials['password']),'info'=>$info, 'params' => $params));
	        PackageManagerComm::errorCheck();
	        if(!is_array($result))
	        	$_SESSION['SugarDepotSessionID'] = $result;
	        $GLOBALS['log']->debug("End SugarDepot Login");
	        return $result;
      }
      else
      	return $_SESSION['SugarDepotSessionID'];
     }

     /**
      * Logout from the depot
      */
     function logout(){
        PackageManagerComm::initialize();
        $result = $GLOBALS['SugarDepot']->call('depotLogout', array('session_id' => $_SESSION['SugarDepotSessionID']));
     }

     /**
      * Get all promotions from the depot
      */
     function getPromotion(){
        PackageManagerComm::initialize();
        //check for fault first and then return
        $name_value_list = $GLOBALS['SugarDepot']->call('depotGetPromotion', array('session_id' => $_SESSION['SugarDepotSessionID']));
        return $name_value_list;
     }

    /**
     * A generic function which given a category_id some filter will
     * return an object which contains categories and packages
     *
     * @param category_id  the category_id to fetch
     * @param filter       a filter which will limit theh number of results returned
     * @return categories_and_packages
     * @see categories_and_packages
    */
    function getCategoryPackages($category_id, $filter = array()){
        PackageManagerComm::initialize();
        //check for fault
         return $GLOBALS['SugarDepot']->call('depotGetCategoriesPackages', array('session_id' => $_SESSION['SugarDepotSessionID'], 'category_id' => $category_id, 'filter' => $filter));
    }

    /**
     * Return a list of child categories to the parent specified in category_id
     *
     * @param category_id  the parent category_id
     * @param filter       a filter which will limit theh number of results returned
     * @return categories_and_packages
     * @see categories_and_packages
     */
    function getCategories($category_id, $filter = array()){
        PackageManagerComm::initialize();
        //check for fault
        return $GLOBALS['SugarDepot']->call('depotGetCategories', array('session_id' => $_SESSION['SugarDepotSessionID'], 'category_id' => $category_id, 'filter' => $filter));
    }

    /**
     * Return a list of packages which belong to the parent category_id
     *
     * @param category_id  the category_id to fetch
     * @param filter       a filter which will limit theh number of results returned
     * @return packages
     * @see packages
    */
    function getPackages($category_id, $filter = array()){
        PackageManagerComm::initialize();
        //check for fault
         return $GLOBALS['SugarDepot']->call('depotGetPackages', array('session_id' => $_SESSION['SugarDepotSessionID'], 'category_id' => $category_id, 'filter' => $filter));
    }

    /**
     * Return a list of releases belong to a package
     *
     * @param category_id  the category_id to fetch
     * @param package_id  the package id which the release belongs to
     * @return packages
     * @see packages
    */
    function getReleases($category_id, $package_id, $filter = array()){
        PackageManagerComm::initialize();
         //check for fault
         return $GLOBALS['SugarDepot']->call('depotGetReleases', array('session_id' => $_SESSION['SugarDepotSessionID'], 'category_id' => $category_id, 'package_id' => $package_id, 'filter' => $filter));
    }

    /**
     * Download a given release
     *
     * @param category_id  the category_id to fetch
     * @param package_id  the package id which the release belongs to
     * @param release_id  the release we want to download
     * @return download
     * @see download
    */
    function download($category_id, $package_id, $release_id){
        PackageManagerComm::initialize();
         //check for fault
         return $GLOBALS['SugarDepot']->call('depotDownloadRelease', array('session_id' => $_SESSION['SugarDepotSessionID'], 'category_id' => $category_id, 'package_id' => $package_id, 'release_id' => $release_id));
    }

    /**
     * Add a requested download to the queue
     *
     * @param category_id  the category_id to fetch
     * @param package_id  the package id which the release belongs to
     * @param release_id  the release we want to download
     * @return the filename to download
     */
    function addDownload($category_id, $package_id, $release_id){
        PackageManagerComm::initialize();
         //check for fault
         return $GLOBALS['SugarDepot']->call('depotAddDownload', array('session_id' => $_SESSION['SugarDepotSessionID'], 'category_id' => $category_id, 'package_id' => $package_id, 'release_id' => $release_id, 'download_key' => '123'));
    }

    /**
     * Call the PackageManagerDownloader function which uses curl in order to download the specified file
     *
     * @param filename	the file to download
     * @return path to downloaded file
     */
    static public function performDownload($filename){
        PackageManagerComm::initialize();
         //check for fault
         $GLOBALS['log']->debug("Performing download from depot: Session ID: ".$_SESSION['SugarDepotSessionID']." Filename: ".$filename);
         return PackageManagerDownloader::download($_SESSION['SugarDepotSessionID'], $filename);
    }

    /**
     * Retrieve documentation for the given release or package
     *
     * @param package_id	the specified package to retrieve documentation
     * @param release_id	the specified release to retrieve documentation
     *
     * @return documents
     */
    function getDocumentation($package_id, $release_id){
    	 PackageManagerComm::initialize();
         //check for fault
         return $GLOBALS['SugarDepot']->call('depotGetDocumentation', array('session_id' => $_SESSION['SugarDepotSessionID'], 'package_id' => $package_id, 'release_id' => $release_id));
    }

    function getTermsAndConditions(){
    	 PackageManagerComm::initialize(false);
    	  return $GLOBALS['SugarDepot']->call('depotTermsAndConditions',array());
    }

    /**
     * Log that the user has clicked on a document
     *
     * @param document_id	the document the user has clicked on
     */
    function downloadedDocumentation($document_id){
    	 PackageManagerComm::initialize();
         //check for fault
         $GLOBALS['log']->debug("Logging Document: ".$document_id);
         $GLOBALS['SugarDepot']->call('depotDownloadedDocumentation', array('session_id' => $_SESSION['SugarDepotSessionID'], 'document_id' => $document_id));
    }

	/**
	 * Send the list of installed objects, could be patches, or modules, .. to the depot and allow the depot to send back
	 * a list of corresponding updates
	 *
	 * @param objects_to_check	an array of name_value_lists which contain the appropriate values
	 * 							which will allow the depot to check for updates
	 *
	 * @return array of name_value_lists of corresponding updates
	 */
	function checkForUpdates($objects_to_check){
		PackageManagerComm::initialize();
         //check for fault
         return $GLOBALS['SugarDepot']->call('depotCheckForUpdates', array('session_id' => $_SESSION['SugarDepotSessionID'], 'objects' => $objects_to_check));
	}
     /**
     * Ping the server to determine if we have established proper communication
     *
     * @return true if we can communicate with the server and false otherwise
    */
     function isAlive(){
        PackageManagerComm::initialize(false);

        $status = $GLOBALS['SugarDepot']->call('sugarPing', array());
        if(empty($status) || $GLOBALS['SugarDepot']->getError() || $status != ACTIVE_STATUS){
            return false;
        }else{
            return true;
        }
     }
     ////////// END: Base Functions for Communicating with the depot
     ////////////////////////////////////////////////////////
}

?>
