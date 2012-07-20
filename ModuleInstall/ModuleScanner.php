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

class ModuleScanner{
	private $manifestMap = array(
			'pre_execute'=>'pre_execute',
			'install_mkdirs'=>'mkdir',
			'install_copy'=>'copy',
			'install_images'=>'image_dir',
			'install_menus'=>'menu',
			'install_userpage'=>'user_page',
			'install_dashlets'=>'dashlets',
			'install_administration'=>'administration',
			'install_connectors'=>'connectors',
			'install_vardefs'=>'vardefs',
			'install_layoutdefs'=>'layoutdefs',
			'install_layoutfields'=>'layoutfields',
			'install_relationships'=>'relationships',
			'install_languages'=>'language',
            'install_logichooks'=>'logic_hooks',
			'post_execute'=>'post_execute',

	);

	private $blackListExempt = array();

	private $validExt = array('png', 'gif', 'jpg', 'css', 'js', 'php', 'txt', 'html', 'htm', 'tpl', 'pdf', 'md5', 'xml');
	private $blackList = array(
    'popen',
    'proc_open',
    'escapeshellarg',
    'escapeshellcmd',
    'proc_close',
    'proc_get_status',
    'proc_nice',
    'basename',
	'passthru',
    'clearstatcache',
    'delete',
    'dirname',
    'disk_free_space',
    'disk_total_space',
    'diskfreespace',
    'fclose',
    'feof',
    'fflush',
    'fgetc',
    'fgetcsv',
    'fgets',
    'fgetss',
    'file_exists',
    'file_get_contents',
    'filesize',
    'filetype',
    'flock',
    'fnmatch',
    'fpassthru',
    'fputcsv',
    'fputs',
    'fread',
    'fscanf',
    'fseek',
    'fstat',
    'ftell',
    'ftruncate',
    'fwrite',
    'glob',
    'is_dir',
    'is_file',
    'is_link',
    'is_readable',
    'is_uploaded_file',
    'parse_ini_string',
    'pathinfo',
    'pclose',
    'readfile',
    'readlink',
    'realpath_cache_get',
    'realpath_cache_size',
    'realpath',
    'rewind',
    'set_file_buffer',
    'tmpfile',
    'umask',
	'eval',
	'exec',
	'system',
	'shell_exec',
	'passthru',
	'chgrp',
	'chmod',
	'chwown',
	'file_put_contents',
	'file',
	'fileatime',
	'filectime',
	'filegroup',
	'fileinode',
	'filemtime',
	'fileowner',
	'fileperms',
	'fopen',
	'is_executable',
	'is_writable',
	'is_writeable',
	'lchgrp',
	'lchown',
	'linkinfo',
	'lstat',
	'mkdir',
	'parse_ini_file',
	'rmdir',
	'stat',
	'tempnam',
	'touch',
	'unlink',
	'getimagesize',
	'call_user_func',
	'call_user_func_array',
	'create_function',


	//mutliple files per function call
	'copy',
	'link',
	'rename',
	'symlink',
	'move_uploaded_file',
	'chdir',
	'chroot',
	'create_cache_directory',
	'mk_temp_dir',
	'write_array_to_file',
	'write_encoded_file',
	'create_custom_directory',
	'sugar_rename',
	'sugar_chown',
	'sugar_fopen',
	'sugar_mkdir',
	'sugar_file_put_contents',
	'sugar_chgrp',
	'sugar_chmod',
	'sugar_touch',

);

	public function printToWiki(){
		echo "'''Default Extensions'''<br>";
		foreach($this->validExt as $b){
			echo '#' . $b . '<br>';

		}
		echo "'''Default Black Listed Functions'''<br>";
		foreach($this->blackList as $b){
			echo '#' . $b . '<br>';

		}

	}

	public function __construct(){
		if(!empty($GLOBALS['sugar_config']['moduleInstaller']['blackListExempt'])){
			$this->blackListExempt = array_merge($this->blackListExempt, $GLOBALS['sugar_config']['moduleInstaller']['blackListExempt']);
		}
		if(!empty($GLOBALS['sugar_config']['moduleInstaller']['blackList'])){
			$this->blackList = array_merge($this->blackList, $GLOBALS['sugar_config']['moduleInstaller']['blackList']);
		}
	  if(!empty($GLOBALS['sugar_config']['moduleInstaller']['validExt'])){
			$this->validExt = array_merge($this->validExt, $GLOBALS['sugar_config']['moduleInstaller']['validExt']);
		}

	}

	private $issues = array();
	private $pathToModule = '';

	/**
	 *returns a list of issues
	 */
	public function getIssues(){
		return $this->issues;
	}

	/**
	 *returns true or false if any issues were found
	 */
	public function hasIssues(){
		return !empty($this->issues);
	}

	/**
	 *Ensures that a file has a valid extension
	 */
	private function isValidExtension($file){
		$file = strtolower($file);

		$extPos = strrpos($file, '.');
		//make sure they don't override the files.md5
		if($extPos === false || $file == 'files.md5')return false;
		$ext = substr($file, $extPos + 1);
		return in_array($ext, $this->validExt);

	}

	/**
	 *Scans a directory and calls on scan file for each file
	 **/
	public function scanDir($path){
		static $startPath = '';
		if(empty($startPath))$startPath = $path;
		if(!is_dir($path))return false;
		$d = dir($path);
		while($e = $d->read()){
		$next = $path . '/' . $e;
		if(is_dir($next)){
			if(substr($e, 0, 1) == '.')continue;
			$this->scanDir($next);
		}else{
			$issues = $this->scanFile($next);


		}
		}
    	return true;
	}

	/**
	 * Check if the file contents looks like PHP
	 * @param string $contents File contents
	 * @return boolean
	 */
	public function isPHPFile($contents)
	{
	    if(stripos($contents, '<?php') !== false) return true;
	    for($tag=0;($tag = stripos($contents, '<?', $tag)) !== false;$tag++) {
            if(strncasecmp(substr($contents, $tag, 13), '<?xml version', 13) == 0) {
                // <?xml version is OK, skip it
                $tag++;
                continue;
            }
            // found <?, it's PHP
            return true;
	    }
	    return false;
	}

	/**
	 * Given a file it will open it's contents and check if it is a PHP file (not safe to just rely on extensions) if it finds <?php tags it will use the tokenizer to scan the file
	 * $var()  and ` are always prevented then whatever is in the blacklist.
	 * It will also ensure that all files are of valid extension types
	 *
	 */
	public function scanFile($file){
		$issues = array();
		if(!$this->isValidExtension($file)){
			$issues[] = translate('ML_INVALID_EXT');
			$this->issues['file'][$file] = $issues;
			return $issues;
		}
		$contents = file_get_contents($file);
		if(!$this->isPHPFile($contents)) return $issues;
		$tokens = @token_get_all($contents);
		$checkFunction = false;
		$possibleIssue = '';
		$lastToken = false;
		foreach($tokens as $index=>$token){
			if(is_string($token[0])){
				switch($token[0]){
					case '`':
						$issues['backtick'] = translate('ML_INVALID_FUNCTION') . " '`'";
					case '(':
						if($checkFunction)$issues[] = $possibleIssue;
						break;
				}
				$checkFunction = false;
				$possibleIssue = '';
			}else{
				$token['_msi'] = token_name($token[0]);
				switch($token[0]){
					case T_WHITESPACE: continue;
					case T_EVAL:
						if(in_array('eval', $this->blackList) && !in_array('eval', $this->blackListExempt))
						$issues[]= translate('ML_INVALID_FUNCTION') . ' eval()';
						break;
					case T_STRING:
						$token[1] = strtolower($token[1]);
						if(!in_array($token[1], $this->blackList))break;
						if(in_array($token[1], $this->blackListExempt))break;
						if ($lastToken !== false &&
						($lastToken[0] == T_NEW || $lastToken[0] == T_OBJECT_OPERATOR ||  $lastToken[0] == T_DOUBLE_COLON))
						{
							break;
						}
					case T_VARIABLE:
						$checkFunction = true;
						$possibleIssue = translate('ML_INVALID_FUNCTION') . ' ' .  $token[1] . '()';
						break;

					default:
						$checkFunction = false;
						$possibleIssue = '';

				}
				if ($token[0] != T_WHITESPACE)
				{
					$lastToken = $token;
				}
			}

		}
		if(!empty($issues)){
			$this->issues['file'][$file] = $issues;
		}

		return $issues;
	}


	/*
	 * checks files.md5 file to see if the file is from sugar
	 * ONLY WORKS ON FILES
	 */
	public function sugarFileExists($path){
		static $md5 = array();
		if(empty($md5) && file_exists('files.md5'))
		{
			include('files.md5');
			$md5 = $md5_string;
		}
		if(isset($md5['./' . $path]))return true;


	}


	/**
	 *This function will scan the Manifest for disabled actions specified in $GLOBALS['sugar_config']['moduleInstaller']['disableActions']
	 *if $GLOBALS['sugar_config']['moduleInstaller']['disableRestrictedCopy'] is set to false or not set it will call on scanCopy to ensure that it is not overriding files
	 */
	public function scanManifest($manifestPath){
		$issues = array();
		if(!file_exists($manifestPath)){
			$this->issues['manifest'][$manifestPath] = translate('ML_NO_MANIFEST');
			return $issues;
		}
		$fileIssues = $this->scanFile($manifestPath);
		//if the manifest contains malicious code do not open it
		if(!empty($fileIssues)){
			return $fileIssues;
		}
		include($manifestPath);


		//scan for disabled actions
		if(isset($GLOBALS['sugar_config']['moduleInstaller']['disableActions'])){
			foreach($GLOBALS['sugar_config']['moduleInstaller']['disableActions'] as $action){
				if(isset($installdefs[$this->manifestMap[$action]])){
					$issues[] = translate('ML_INVALID_ACTION_IN_MANIFEST') . $this->manifestMap[$action];
				}
			}
		}

		//now lets scan for files that will override our files
		if(empty($GLOBALS['sugar_config']['moduleInstaller']['disableRestrictedCopy']) && isset($installdefs['copy'])){
			foreach($installdefs['copy'] as $copy){
				$from = str_replace('<basepath>', $this->pathToModule, $copy['from']);
				$to = $copy['to'];
				if(substr_count($from, '..')){
					$this->issues['copy'][$from] = translate('ML_PATH_MAY_NOT_CONTAIN').' ".." -' . $from;
				}
				if(substr_count($to, '..')){
					$this->issues['copy'][$to] = translate('ML_PATH_MAY_NOT_CONTAIN'). ' ".." -' . $to;
				}
				while(substr_count($from, '//')){
					$from = str_replace('//', '/', $from);
				}
				while(substr_count($to, '//')){
					$to = str_replace('//', '/', $to);
				}
				$this->scanCopy($from, $to);
			}
		}
		if(!empty($issues)){
			$this->issues['manifest'][$manifestPath] = $issues;
		}



	}



	/**
	 * Takes in where the file will is specified to be copied from and to
	 * and ensures that there is no official sugar file there. If the file exists it will check
	 * against the MD5 file list to see if Sugar Created the file
	 *
	 */
	function scanCopy($from, $to){
				//if the file doesn't exist for the $to then it is not overriding anything
				if(!file_exists($to))return;
				//if $to is a dir and $from is a file then make $to a full file path as well
				if(is_dir($to) && is_file($from)){
					if(substr($to,-1) === '/'){
						$to = substr($to, 0 , strlen($to) - 1);
					}
					$to .= '/'. basename($from);
				}
				//if the $to is a file and it is found in sugarFileExists then don't allow overriding it
				if(is_file($to) && $this->sugarFileExists($to)){
					$this->issues['copy'][$from] = translate('ML_OVERRIDE_CORE_FILES') . '(' . $to . ')';
				}

				if(is_dir($from)){
					$d = dir($from);
					while($e = $d->read()){
						if($e == '.' || $e == '..')continue;
						$this->scanCopy($from .'/'. $e, $to .'/' . $e);
					}
				}





			}


	/**
	 *Main external function that takes in a path to a package and then scans
	 *that package's manifest for disabled actions and then it scans the PHP files
	 *for restricted function calls
	 *
	 */
	public function scanPackage($path){
		$this->pathToModule = $path;
		$this->scanManifest($path . '/manifest.php');
		if(empty($GLOBALS['sugar_config']['moduleInstaller']['disableFileScan'])){
			$this->scanDir($path);
		}
	}

	/**
	 *This function will take all issues of the current instance and print them to the screen
	 **/
	public function displayIssues($package='Package'){
		echo '<h2>'.str_replace('{PACKAGE}' , $package ,translate('ML_PACKAGE_SCANNING')). '</h2><BR><h2 class="error">' . translate('ML_INSTALLATION_FAILED') . '</h2><br><p>' .str_replace('{PACKAGE}' , $package ,translate('ML_PACKAGE_NOT_CONFIRM')). '</p><ul><li>'. translate('ML_OBTAIN_NEW_PACKAGE') . '<li>' . translate('ML_RELAX_LOCAL').
'</ul></p><br>' . translate('ML_SUGAR_LOADING_POLICY') .  ' <a href=" http://kb.sugarcrm.com/custom/module-loader-restrictions-for-sugar-open-cloud/">' . translate('ML_SUGAR_KB') . '</a>.'.
'<br>' . translate('ML_AVAIL_RESTRICTION'). ' <a href=" http://developers.sugarcrm.com/wordpress/2009/08/14/module-loader-restrictions/">' . translate('ML_SUGAR_DZ') .  '</a>.<br><br>';


		foreach($this->issues as $type=>$issues){
			echo '<div class="error"><h2>'. ucfirst($type) .' ' .  translate('ML_ISSUES') . '</h2> </div>';
			echo '<div id="details' . $type . '" >';
			foreach($issues as $file=>$issue){
				$file = str_replace($this->pathToModule . '/', '', $file);
				echo '<div style="position:relative;left:10px"><b>' . $file . '</b></div><div style="position:relative;left:20px">';
				if(is_array($issue)){
					foreach($issue as $i){
						echo "$i<br>";
					}
				}else{
					echo "$issue<br>";
				}
				echo "</div>";
			}
			echo '</div>';

		}
		echo "<br><input class='button' onclick='document.location.href=\"index.php?module=Administration&action=UpgradeWizard&view=module\"' type='button' value=\"" . translate('LBL_UW_BTN_BACK_TO_MOD_LOADER') . "\" />";

	}


}


?>