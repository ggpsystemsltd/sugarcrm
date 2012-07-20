<?PHP
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





class SugarSecure{
	var $results = array();
	function display(){
		echo '<table>';
		foreach($this->results as $result){
			echo '<tr><td>' . nl2br($result) . '</td></tr>';
		}
		echo '</table>';
	}
	
	function save($file=''){
		$fp = fopen($file, 'a');
		foreach($this->results as $result){
			fwrite($fp , $result);
		}
		fclose($fp);
	}
	
	function scan($path= '.', $ext = '.php'){
		$dir = dir($path);
		while($entry = $dir->read()){
			if(is_dir($path . '/' . $entry) && $entry != '.' && $entry != '..'){
				$this->scan($path .'/' . $entry);	
			}
			if(is_file($path . '/'. $entry) && substr($entry, strlen($entry) - strlen($ext), strlen($ext)) == $ext){
				$contents = file_get_contents($path .'/'. $entry);	
				$this->scanContents($contents, $path .'/'. $entry);
			}
		}
	}
	
	function scanContents($contents){
		return;	
	}
	
	
}

class ScanFileIncludes extends SugarSecure{
	function scanContents($contents, $file){
		$results = array();
		$found = '';
		/*preg_match_all("'(require_once\([^\)]*\\$[^\)]*\))'si", $contents, $results, PREG_SET_ORDER);
		foreach($results as $result){
			
			$found .= "\n" . $result[0];	
		}
		$results = array();
		preg_match_all("'include_once\([^\)]*\\$[^\)]*\)'si", $contents, $results, PREG_SET_ORDER);
		foreach($results as $result){
			$found .= "\n" . $result[0];	
		}
		*/
		$results = array();
		preg_match_all("'require\([^\)]*\\$[^\)]*\)'si", $contents, $results, PREG_SET_ORDER);
		foreach($results as $result){
			$found .= "\n" . $result[0];	
		}
		$results = array();
		preg_match_all("'include\([^\)]*\\$[^\)]*\)'si", $contents, $results, PREG_SET_ORDER);
		foreach($results as $result){
			$found .= "\n" . $result[0];	
		}
		$results = array();
		preg_match_all("'require_once\([^\)]*\\$[^\)]*\)'si", $contents, $results, PREG_SET_ORDER);
		foreach($results as $result){
			$found .= "\n" . $result[0];	
		}
		$results = array();
		preg_match_all("'fopen\([^\)]*\\$[^\)]*\)'si", $contents, $results, PREG_SET_ORDER);
		foreach($results as $result){
			$found .= "\n" . $result[0];	
		}
		$results = array();
		preg_match_all("'file_get_contents\([^\)]*\\$[^\)]*\)'si", $contents, $results, PREG_SET_ORDER);
		foreach($results as $result){
			$found .= "\n" . $result[0];	
		}
		if(!empty($found)){
			$this->results[] = $file . $found."\n\n";	
		}
		
	}
	
	
}
	


class SugarSecureManager{
	var $scanners = array();
	function registerScan($class){
		$this->scanners[] = new $class();
	}
	
	function scan(){
		
		while($scanner = current($this->scanners)){
			$scanner->scan();
			$scanner = next($this->scanners);
		}
		reset($this->scanners);	
	}
	
	function display(){
		
		while($scanner = current($this->scanners)){
			echo 'Scan Results: ';
			$scanner->display();
			$scanner = next($this->scanners);
		}
		reset($this->scanners);	
	}
	
	function save(){
		//reset($this->scanners);	
		$name = 'SugarSecure'. time() . '.txt';
		while($this->scanners  = next($this->scanners)){
			$scanner->save($name);
		}
	}
	
}
$secure = new SugarSecureManager();
$secure->registerScan('ScanFileIncludes');
$secure->scan();
$secure->display();