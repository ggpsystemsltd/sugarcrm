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



class UpgradeMetaHelper{

	var $upgrade_dir;
	var $debug_mode;
	var $upgrade_modules;
	var $customized_modules;
	var $source_dir;
	var $dest_dir ;
	var $evparser;
	var $dvparser;
	var $path_to_master_copy;
	/**
	 * UpgradeMetaHelper
	 * This is the constructor for the UpgradeMetaHelper class
	 * @param $dir The root upgrade directory (where to copy working files)
	 * @param $masterCopyDirectory The root master directory (where SugarCRM 5.x files reside)
	 * @param $debugMode Debug mode, default is false
	 *
	 */
	function UpgradeMetaHelper($dir='upgrade', $masterCopyDirecotry='modules_50', $debugMode = false) {
		$this->upgrade_dir = $dir;
		$this->debug_mode = $debugMode;
		$this->upgrade_modules = $this->getModifiedModules();

		if(count($this->upgrade_modules) > 0) {
			$_SESSION['Upgraded_Modules'] = $this->upgrade_modules;
			$this->create_upgrade_directory();
			$this->path_to_master_copy = $masterCopyDirecotry;
		    $this->runParser();
		}

		$this->customized_modules = $this->getAllCustomizedModulesBeyondStudio();
		if(count($this->customized_modules) > 0) {
			$_SESSION['Customized_Modules'] = $this->customized_modules;
		}
	}


	/**
	 * getModifiedModules
	 * This method returns a two-dimensional Array of Studio enabled
	 * modules that have been modified.  The second Array index is an
	 * Array of files that do not match the md5 checksum for the module
	 * @return $return_array Two-dimensional Array of [module][modified file(s) Array]
	 */
		function getModifiedModules() {

		$md5_string = array();
		if(file_exists(clean_path(getcwd().'/files.md5'))){
			require(clean_path(getcwd().'/files.md5'));
		}

	    $return_array = array();
	    $modules = $this->loadStudioModules();
	    foreach($modules as $mod) {

	    	   $editView = "modules/$mod/EditView.html";
	    	   $detailView = "modules/$mod/DetailView.html";
	    	   $searchForm = "modules/$mod/SearchForm.html";
               if(file_exists($editView) && isset($md5_string['./' . $editView])) {
               	  $fileContents = file_get_contents($editView);
               	  if(md5($fileContents) != $md5_string['./' . $editView]) {
               	  	 $return_array[$mod][] = $editView;
               	  }
               }

               if(file_exists($detailView) && isset($md5_string['./' . $detailView])) {
               	  $fileContents = file_get_contents($detailView);
               	  if(md5($fileContents) != $md5_string['./' . $detailView]) {
               	  	 $return_array[$mod][] = $detailView;
               	  }
               }

               if(file_exists($searchForm) && isset($md5_string['./' . $searchForm])) {
               	  $fileContents = file_get_contents($searchForm);
               	  if(md5($fileContents) != $md5_string['./' . $searchForm]) {
               	  	 $return_array[$mod][] = $searchForm;
               	  }
               }

	    } //foreach

		return $return_array;
	}

function saveMatchingFilesQueries($currStep,$value){
	$upgrade_progress_dir = sugar_cached('upgrades/temp');
	if(!is_dir($upgrade_progress_dir)){
		mkdir($upgrade_progress_dir);
	}
	$file_queries_file = $upgrade_progress_dir.'/files_queries.php';
	if(file_exists($file_queries_file)){
		include($file_queries_file);
	}
	else{
		if(function_exists('sugar_fopen')){
			sugar_fopen($file_queries_file, 'w+');
		}
		else{
			fopen($file_queries_file, 'w+');
		}
	}
	if(!isset($files_queries) || $files_queries == NULL){
		$files_queries = array();
	}
	$files_queries[$currStep]=$value;
	if(is_writable($file_queries_file) && write_array_to_file( "file_queries", $file_queries,
		$file_queries_file)) {
	       //writing to the file
	}
}

function getAllCustomizedModulesBeyondStudio() {

	require_once('modules/UpgradeWizard/uw_utils.php');
	$md5_string = array();
	if(file_exists(clean_path(getcwd().'/files.md5'))){
		require(clean_path(getcwd().'/files.md5'));
	}
    $return_array = array();
    $modules = $this->loadStudioModules();
    $modulesAll = getAllModules(); //keep all modules as well
    $allOtherModules = array_diff($modulesAll,$modules);
    foreach($modules as $mod) {
	  if(!is_dir('modules/'.$mod)) continue;
	  $editView = "modules/$mod/EditView.html";
	  $detailView ="modules/$mod/DetailView.html";
	  $exclude_files[]=$editView;
	  $exclude_files[]=$detailView;
	  $allModFiles = array();
	  $allModFiles = findAllFiles('modules/'.$mod,$allModFiles);
	   foreach($allModFiles as $file){
	       //$file_md5_ref = str_replace(clean_path(getcwd()),'',$file);
		  if(file_exists($file) && !in_array($file,$exclude_files)){
			if(isset($md5_string['./'.$file])) {
		       	  $fileContents = file_get_contents($file);
		       	  if(md5($fileContents) != $md5_string['./'.$file]) {
		       	  	$return_array[$mod][] = $file;
		       	  }
		       	  else{
		       	  	//keep in the array to be deleted later
		       	  	$_SESSION['removeMd5MatchingFiles'][] = $file;
		               	  }
		           }
		      }
		  }
    } //foreach
    //also check out other non-studio modules by taking the difference between
    //allMOdules and
  foreach($allOtherModules as $mod) {
	  if(!is_dir('modules/'.$mod)) continue;
	  $allModFiles = array();
      $allModFiles = findAllFiles('modules/'.$mod,$allModFiles);
      foreach($allModFiles as $file){
           	//$file_md5_ref = str_replace(clean_path(getcwd()),'',$file);
           	if(file_exists($file)){
           		if(isset($md5_string['./'.$file])) {
	               	  $fileContents = file_get_contents($file);
	               	  if(md5($fileContents) == $md5_string['./'.$file]) {
	               	  	$_SESSION['removeMd5MatchingFiles'][] = $file;
	               	  }
               }
          }
      }
  }
   //Also store in a file
   //saveMatchingFilesQueries('removeMd5MatchingFiles',$_SESSION['removeMd5MatchingFiles']);
	return $return_array;
}



/**
 * Get all the customized modules. Compare the file md5s with the base md5s
 * If a file has been modified then put the module in the list of customized
 * modules. Show the list in the preflight check UI.
 */
function getAllCustomizedModules() {

		require_once('files.md5');

	    $return_array = array();
	    $modules = getAllModules();
	    foreach($modules as $mod) {
	    	   //find all files in each module if the files have been modified
	    	   //as compared to the base version then add the module to the
	    	   //customized modules array
	    	   $modFiles = findAllFiles(clean_path(getcwd())."/modules/$mod", array());
               foreach($modFiles as $file){
             	  $fileContents = file_get_contents($file);
             	   $file = str_replace(clean_path(getcwd()),'',$file);
               	  if($md5_string['./' . $file]){
	               	  if(md5($fileContents) != $md5_string['./' . $file]) {
	               	     //A file has been customized in the module. Put the module into the
	               	     // customized modules array.
	               	     echo 'Changed File'.$file;
	               	  	  $return_array[$mod];
	               	  	  break;
	               	  }
               	  }
               	  else{
               	  	// This is a new file in user's version and indicates that module has been
               	  	//customized. Put the module in the customized array.
                       echo 'New File'.$file;
                       $return_array[$mod];
                       break;
               	  }
               }
	    } //foreach

		return $return_array;
	}

    /**
     * loadStudioModules
     * This method returns an Array of all modules where a studio.php file is
     * present in the metadata directory of the module
     * @return $modules Array of modules that are studio enabled
     */
	function loadStudioModules() {
		$modules = array();
		$d = dir('modules');
		while($e = $d->read()){
			if(substr($e, 0, 1) == '.' || !is_dir('modules/' . $e))continue;
			if(file_exists('modules/' . $e . '/metadata/studio.php')){
			   $modules[] = $e;
			}
		}
		return $modules;
	}


	/**
	 * runParser
	 * This method creates the EditView and DetailView parser intances
	 * and runs the parsing for the modules to upgrade
	 *
	 */
	function runParser() {
		require_once('include/SugarFields/Parsers/EditViewMetaParser.php');
		require_once('include/SugarFields/Parsers/DetailViewMetaParser.php');
		require_once('include/SugarFields/Parsers/SearchFormMetaParser.php');

		$this->evparser = new EditViewMetaParser();
		$this->dvparser = new DetailViewMetaParser();
		$this->svparser = new SearchFormMetaParser();

		foreach($this->upgrade_modules as $module_name=>$files) {
			$this->parseFile($module_name, $files);
		} //foreach
	}


	/**
	 * parseFile
	 * Hanldes parsing the files for given module where Studio or manual
	 * changes have been detected.
	 * @param $module_name The module to parse
	 * @param $files Array of files found to parse
	 *
	 */
	function parseFile($module_name, $files) {
		global $beanList, $dictionary;
		foreach($files as $file) {
                if(preg_match('/(EditView|DetailView|SearchForm|QuickCreate)(\.html|\.tpl)$/s', $file, $matches)) {
                    $view = $matches[1];

                    switch($view) {
                       case 'EditView' : $parser = $this->evparser; break;
                       case 'DetailView' : $parser = $this->dvparser; break;
                       case 'SearchForm' : $parser = $this->svparser; break;
                    }

                    $lowerCaseView = $view == 'SearchForm' ? 'search' : strtolower($view);

					include('modules/'.$module_name.'/vardefs.php');
					$bean_name = $beanList[$module_name];
					$newFile = $this->upgrade_dir.'/modules/'.$module_name.'/metadata/'.$lowerCaseView.'defs.php';
					$evfp = fopen($newFile,'w');

					$bean_name = $bean_name == 'aCase' ? 'Case' : $bean_name;
					fwrite($evfp, $parser->parse($file,
											$dictionary[$bean_name]['fields'],
											$module_name,
											true,
											$this->path_to_master_copy.'/modules/'.$module_name.'/metadata/'.$lowerCaseView.'defs.php'));
					fclose($evfp);
                } //if
		} //foreach
	}


	/**
	 * create_upgrade_directory
	 * Creates a directory called upgrade to house all the modules that are studio enabled.
	 * Also creates subdirectories for all studio enabled modules.
	 *
	 */
	function create_upgrade_directory() {

		$dir = $this->upgrade_dir.'/modules';
		if(!file_exists($this->upgrade_dir)) {
			mkdir($this->upgrade_dir, 0755);
		}
		if(!file_exists($dir)) {
			mkdir($dir, 0755);
		}

		foreach($this->upgrade_modules as $module=>$files){
			if(!file_exists($dir.'/'.$module)) {
				mkdir($dir.'/'.$module, 0755);
			}
			if(!file_exists($dir.'/'.$module.'/metadata')) {
				mkdir($dir.'/'.$module.'/metadata', 0755);
			}

			foreach($files as $file) {
				if(file_exists($file) && is_file($file)) {
				   copy($file, $this->upgrade_dir.'/'.$file);
				} //if
			} //foreach
		}
	}


	/**
	 * verifyMetaData
	 * This function does some quick checks to make sure the metadataFile at
	 * least has an Array panel
	 *
	 * @param $metadataFile The path to the metadata file to verify
	 * @param $module The module to verify
	 * @param $view The view (EditView or DetailView)
	 * @return boolean true if verification check is okay; false otherwise
	 */
	function verifyMetaData($metadataFile, $module, $view) {
	    if(!file_exists($metadataFile) || !is_file($metadataFile)) {
	       return false;
	    }

	    include($metadataFile);

	    if(isset($viewdefs) && isset($viewdefs[$module][$view]['panels']) && is_array($viewdefs[$module][$view]['panels'])) {
	       return true;
	    }

        if(isset($searchdefs) && isset($searchdefs[$module]) &&  is_array($searchdefs[$module])) {
           return true;
        }

	    return false;
	}
}

?>