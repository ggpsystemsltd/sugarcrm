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

 require_once('ModuleInstall/PackageManager/PackageManagerDisplay.php');
 require_once('ModuleInstall/PackageManager/PackageManager.php');
 class PackageController{
        var $_pm;

        /**
         * Constructor: this class is called from the the ajax call and handles invoking the correct
         * functionality on the server.
         */
        function PackageController(){
           $this->_pm = new PackageManager();
        }

        function performBasicSearch(){
            $json = getJSONobj();
            $search_term = '';
            $node_id = '';
             if(isset($_REQUEST['search_term'])) {
                $search_term = nl2br($_REQUEST['search_term']);
            }
             if(isset($_REQUEST['node_id'])) {
                $node_id = nl2br($_REQUEST['node_id']);
            }
            $xml = PackageManager::getPackages($node_id);
            echo 'result = ' . $json->encode(array('packages' => $xml));
        }

        /**
         * Retrieve a list of packages which belong to the corresponding category
         *
         * @param category_id   this is passed via POST and is the category id of packages
         *                      we wish to retrieve
         * @return packages     xml string consisting of the packages and releases which belong to
         *                      the category
         */
        function getPackages(){
            $json = getJSONobj();
            $category_id = '';

             if(isset($_REQUEST['category_id'])) {
                $category_id = nl2br($_REQUEST['category_id']);
            }
            $xml = PackageManager::getPackages($category_id);
            echo 'result = ' . $json->encode(array('package_output' => $xml));
        }

        /**
         * Obtain a list of releases from the server.  This function is currently used for generating the patches/langpacks for upgrade wizard
         * as well as during installation
         */
        function getReleases(){
            $json = getJSONobj();
            $category_id = '';
       		$package_id = '';
       		$types = '';
            if(isset($_REQUEST['category_id'])) {
                $category_id = nl2br($_REQUEST['category_id']);
            }
            if(isset($_REQUEST['package_id'])) {
                $package_id = nl2br($_REQUEST['package_id']);
            }
            if(isset($_REQUEST['types'])) {
                $types = nl2br($_REQUEST['types']);
            }
            $types = explode(',', $types);

            $filter = array();
          	$count = count($types);
          	$index = 1;
          	$type_str = '';
          	foreach($types as $type){
          		$type_str .= "'".$type."'";
          		if($index < $count)
          			$type_str .= ",";
          		$index++;
          	}

          	$filter = array('type' => $type_str);
          	$filter = PackageManager::toNameValueList($filter);
            $releases = PackageManager::getReleases($category_id, $package_id, $filter);
            $nodes = array();
            $release_map = array();
            foreach($releases['packages'] as $release){
            	$release = PackageManager::fromNameValueList($release);
				$nodes[] = array('description' => $release['description'], 'version' => $release['version'], 'build_number' => $release['build_number'], 'id' => $release['id']);
        		$release_map[$release['id']] = array('package_id' => $release['package_id'], 'category_id' => $release['category_id']);
        	}
        	$_SESSION['ML_PATCHES'] = $release_map;
            echo 'result = ' . $json->encode(array('releases' => $nodes));
        }

        /**
         * Obtain a promotion from the depot
         */
        function getPromotion(){
            $json = getJSONobj();

            $header = PackageManager::getPromotion();

            echo 'result = ' . $json->encode(array('promotion' => $header));
        }

        /**
         * Download the given release
         *
         * @param category_id   this is passed via POST and is the category id of the release we wish to download
         * @param package_id   this is passed via POST and is the package id of the release we wish to download
         * @param release_id   this is passed via POST and is the release id of the release we wish to download
         * @return bool         true is successful in downloading, false otherwise
         */
        function download(){
            global $sugar_config;
            $json = getJSONobj();
            $package_id = '';
            $category_id  = '';
            $release_id = '';
            if(isset($_REQUEST['package_id'])) {
                $package_id = nl2br($_REQUEST['package_id']);
            }
            if(isset($_REQUEST['category_id'])) {
                $category_id = nl2br($_REQUEST['category_id']);
            }
            if(isset($_REQUEST['release_id'])) {
                $release_id = nl2br($_REQUEST['release_id']);
            }
            $GLOBALS['log']->debug("PACKAGE ID: ".$package_id);
            $GLOBALS['log']->debug("CATEGORY ID: ".$category_id);
            $GLOBALS['log']->debug("RELEASE ID: ".$release_id);
            $result = $this->_pm->download($category_id, $package_id, $release_id);
            $GLOBALS['log']->debug("RESULT: ".print_r($result,true));
            $success = 'false';
            if($result != null){
                $GLOBALS['log']->debug("Performing Setup");
                $this->_pm->performSetup($result, 'module', false);
                $GLOBALS['log']->debug("Complete Setup");
                $success = 'true';
            }
            echo 'result = ' . $json->encode(array('success' => $success));
        }

         /**
         * Retrieve a list of categories that are subcategories to the selected category
         *
         * @param id - the id of the parent_category, -1 if this is the root
         * @return array - a list of categories/nodes which are underneath this node
         */
        function getCategories(){
            $json = getJSONobj();
            $node_id = '';
             if(isset($_REQUEST['category_id'])) {
                $node_id = nl2br($_REQUEST['category_id']);
            }
            $GLOBALS['log']->debug("NODE ID: ".$node_id);
            $nodes = PackageManager::getCategories($node_id);
            echo 'result = ' . $json->encode(array('nodes' => $nodes));
        }

         function getNodes(){
            $json = getJSONobj();
            $category_id = '';
             if(isset($_REQUEST['category_id'])) {
                $category_id = nl2br($_REQUEST['category_id']);
            }
            $GLOBALS['log']->debug("CATEGORY ID: ".$category_id);
            $nodes = PackageManager::getModuleLoaderCategoryPackages($category_id);
            $GLOBALS['log']->debug(var_export($nodes, true));
            echo 'result = ' . $json->encode(array('nodes' => $nodes));
        }

        /**
         * Check the SugarDepot for updates for the given type as passed in via POST
         * @param type      the type to check for
         * @return array    return an array of releases for each given installed object if an update is found
         */
        function checkForUpdates(){
            $json = getJSONobj();
            $type = '';
             if(isset($_REQUEST['type'])) {
                $type = nl2br($_REQUEST['type']);
            }
            $pm = new PackageManager();
            $updates = $pm->checkForUpdates();
            $nodes = array();
			$release_map = array();
            if(!empty($updates)){
	            foreach($updates as $update){
	            	$update = PackageManager::fromNameValueList($update);
	            	$nodes[] = array('label' => $update['name'], 'description' => $update['description'], 'version' => $update['version'], 'build_number' => $update['build_number'], 'id' => $update['id'], 'type' => $update['type']);
					$release_map[$update['id']] = array('package_id' => $update['package_id'], 'category_id' => $update['category_id'], 'type' => $update['type']);
	            }
            }
           //patches
           $filter = array(array('name' => 'type', 'value' => "'patch'"));
            $releases = $pm->getReleases('', '', $filter);
            if(!empty($releases['packages'])){
            	foreach($releases['packages'] as $update){
	            	$update = PackageManager::fromNameValueList($update);
					$nodes[] = array('label' => $update['name'], 'description' => $update['description'], 'version' => $update['version'], 'build_number' => $update['build_number'], 'id' => $update['id'], 'type' => $update['type']);
					$release_map[$update['id']] = array('package_id' => $update['package_id'], 'category_id' => $update['category_id'], 'type' => $update['type']);
	            }
            }
			$_SESSION['ML_PATCHES'] = $release_map;
            echo 'result = ' . $json->encode(array('updates' => $nodes));
        }

        function getLicenseText(){
            $json = getJSONobj();
            $file = '';
            if(isset($_REQUEST['file'])) {
                $file = hashToFile($_REQUEST['file']);
            }
            $GLOBALS['log']->debug("FILE : ".$file);
            echo 'result = ' . $json->encode(array('license_display' => PackageManagerDisplay::buildLicenseOutput($file)));
        }

        /**
         *  build the list of modules that are currently in the staging area waiting to be installed
         */
        function getPackagesInStaging(){
            $packages = $this->_pm->getPackagesInStaging('module');
            $json = getJSONobj();

            echo 'result = ' . $json->encode(array('packages' => $packages));
        }

        /**
         *  build the list of modules that are currently in the staging area waiting to be installed
         */
        function performInstall(){
            $file = '';
             if(isset($_REQUEST['file'])) {
                $file = hashToFile($_REQUEST['file']);
            }
          	if(!empty($file)){
	            $this->_pm->performInstall($file);
			}
            $json = getJSONobj();

            echo 'result = ' . $json->encode(array('result' => 'success'));
        }

        function authenticate(){
            $json = getJSONobj();
            $username = '';
            $password = '';
            $servername = '';
            $terms_checked = '';
            if(isset($_REQUEST['username'])) {
                $username = nl2br($_REQUEST['username']);
            }
            if(isset($_REQUEST['password'])) {
                $password = nl2br($_REQUEST['password']);
            }
       		 if(isset($_REQUEST['servername'])) {
                $servername = $_REQUEST['servername'];
            }
            if(isset($_REQUEST['terms_checked'])) {
                $terms_checked = $_REQUEST['terms_checked'];
                if($terms_checked == 'on')
                	$terms_checked = true;
            }

            if(!empty($username) && !empty($password)){
                $password = md5($password);
                $result = PackageManager::authenticate($username, $password, $servername, $terms_checked);
                if(!is_array($result) && $result == true)
                    $status  = 'success';
                else
                    $status  = $result['faultstring'];
            }else{
                $status  = 'failed';
            }

            echo 'result = ' . $json->encode(array('status' => $status));
        }

        function getDocumentation(){
        	$json = getJSONobj();
            $package_id = '';
            $release_id = '';

            if(isset($_REQUEST['package_id'])) {
                $package_id = nl2br($_REQUEST['package_id']);
            }
            if(isset($_REQUEST['release_id'])) {
                $release_id = nl2br($_REQUEST['release_id']);
            }

            $documents = PackageManager::getDocumentation($package_id, $release_id);
            $GLOBALS['log']->debug("DOCUMENTS: ".var_export($documents, true));
            echo 'result = ' . $json->encode(array('documents' => $documents));
        }

        function downloadedDocumentation(){
        	$json = getJSONobj();
            $document_id = '';

            if(isset($_REQUEST['document_id'])) {
                $document_id = nl2br($_REQUEST['document_id']);
            }
             $GLOBALS['log']->debug("Downloading Document: ".$document_id);
            PackageManagerComm::downloadedDocumentation($document_id);
            echo 'result = ' . $json->encode(array('result' => 'true'));
        }

        /**
         * Remove metadata files such as foo-manifest
         * Enter description here ...
         * @param unknown_type $file
         * @param unknown_type $meta
         */
        protected function rmMetaFile($file, $meta)
        {
            $metafile = pathinfo($file, PATHINFO_DIRNAME)."/". pathinfo($file, PATHINFO_FILENAME)."-$meta.php";
            if(file_exists($metafile)) {
                unlink($metafile);
            }
        }

 		function remove(){
        	$json = getJSONobj();
            $file = '';

            if(isset($_REQUEST['file'])) {
                 $file = urldecode(hashToFile($_REQUEST['file']));
            }
            $GLOBALS['log']->debug("FILE TO REMOVE: ".$file);
            if(!empty($file)){
            	unlink($file);
            	foreach(array("manifest", "icon") as $meta) {
            	    $this->rmMetaFile($file, $meta);
            	}
            }
            echo 'result = ' . $json->encode(array('result' => 'true'));
        }
 }
?>
