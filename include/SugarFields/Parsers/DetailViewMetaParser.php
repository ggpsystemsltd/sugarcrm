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


/**
 * DetailViewMetaParser.php
 * This is a utility file that attempts to provide support for parsing pre 5.0 SugarCRM 
 * DetailView.html files and produce a best guess detailviewdefs.php file equivalent.
 * 
 * @author Collin Lee
 */
require_once('include/SugarFields/Parsers/MetaParser.php');

/**
 * DetailViewMetaParser.php
 * This class is responsible for handling the parsing of DetailView.html files from
 * SugarCRM versions prior to 5.x.  It will make a best guess of translating the
 * HTML file to a metadata format.
 * 
 * @author Collin Lee
 */
class DetailViewMetaParser extends MetaParser {

function DetailViewMetaParser() {
   $this->mView = 'DetailView';
}


/**
 * parse
 * 
 * @param $filePath The file path of the HTML file to parse
 * @param $vardefs The module's vardefs
 * @param $moduleDir The module's directory
 * @param $merge boolean value indicating whether or not to merge the parsed contents
 * @param $masterCopy The file path of the mater copy of the metadata file to merge against
 * @return String format of metadata contents
 **/
function parse($filePath, $vardefs = array(), $moduleDir = '', $merge=false, $masterCopy=null) {
   
// Grab file contents
$contents = file_get_contents($filePath);
   
// Remove \n,\r characters to allow for better text parsing
$contents = $this->trimHTML($contents);
$contents = $this->stripFlavorTags($contents);


// Notes DetailView.html file is messed up
if($moduleDir == 'Notes') {
   $contents = str_replace('{PAGINATION}<tr><td>', '{PAGINATION}', $contents); 
   $contents = str_replace('</td></tr></table><script>', '</table><script>', $contents);
   $contents = str_replace("<tr><div id='portal_flag_row' name='portal_flag_row' style='display:none'>", "<div id='portal_flag_row' name='portal_flag_row' style='display:none'>", $contents); 
}

$contents = $this->fixDuplicateTrTags($contents);
$contents = $this->fixRowsWithMissingTr($contents);

// Get all the tables
$tables = $this->getElementsByType("table", $contents);
   
// Skip the first one
$tables = array_slice($tables, 1);

$panels = array();
$tableCount = 0;
$metarow = array();
foreach($tables as $table) {   
   
   $table = $this->fixTablesWithMissingTr($table);
   $tablerows = $this->getElementsByType("tr", $table);

   foreach($tablerows as $trow) {

       $metacolumns = array();  
   	   $columns = $this->getElementsByType("td", $trow);
       $columns = array_reverse($columns, true);
	   foreach($columns as $tcols) {

	   	  $sugarAttrValue = $this->getTagAttribute("sugar", $tcols, "'slot[0-9]+b$'");
	   	  if(empty($sugarAttrValue)) {
	   	  	 continue;
	   	  }	   	
	   	
          $def = '';
	   	  $field = $this->getElementValue("span", $tcols);
	   	  //If it's a space, simply add a blank string	   	  
	   	  if($field == '&nbsp;') {
	   	  	 $metacolumns[] = "";
	   	  } else if(!empty($field)) {
	   	  	
          	 preg_match_all('/[\{]([^\}].*?)[\}]/s', $field, $matches, PREG_SET_ORDER);
          	 if(!empty($matches)) { 	
          	 	if(count($matches) > 1) {
          	 		  
	          	 	  $def = array();

	          	 	  $def['name'] = preg_match('/_c$/i', $matches[0][1]) ? $matches[0][1] : strtolower($matches[0][1]);
                      foreach($matches as $m) {
                      	 if(isset($vardefs[strtolower($m[1])])) {
                      	 	$def['name'] = strtolower($m[1]);
                      	 }
                      }

	          	 	  $field = preg_replace('/<\{tag\.[a-z_]*?\}/i', '<a', $field);
	          	 	  $field = preg_replace('/<\/\{tag\.[a-z_]*?\}>/i', '</a>', $field);

	          	 	  foreach($matches as $tag[1]) {
		   	  	 	    if(preg_match("/^(mod[\.]|app[\.]).*?/i", $tag[1][1])) {
		   	  	 	       $field = str_replace($tag[1][1], '$'.$tag[1][1], $field);      
		   	  	 	    } else {
		   	  	 	       $theField = preg_match('/_c$/i', $tag[1][1]) ? $tag[1][1] : strtolower($tag[1][1]);
		   	  	 	       if(!empty($vardefs[$theField])) {
		   	  	 	          $field = str_replace($tag[1][1], '$fields.'. $theField.'.value', $field);
		   	  	 	       } else {
		   	  	 	       	  $phpName = $this->findAssignedVariableName($tag[1][1], $filePath);
		   	  	 	       	  $field = str_replace($tag[1][1], '$fields.'. $theField.'.value', $field);
		   	  	 	       } //if-else
		   	  	 	    }
		   	  	 	  }

		   	  	 	  $def['customCode'] = $field;
		   	  	 	  $def['description'] = 'This field was auto generated';
          	 	} else {
	          	 	  $def = strtolower($matches[0][1]);
          	 	}
          	 } //if
             $metacolumns[] = $def;
          } //if
	   } //foreach($tablecolumns as $tcols)

   	   $metarow[] = array_reverse($metacolumns);
   } //foreach($tablerows as $trow) 
   
   
   $id = $tableCount == 0 ? 'default' : $tableCount;
   $tableCount++;
   $panels[$id] = $metarow;
   
} //foreach($tables as $table)

$this->mCustomPanels = $panels;
$panels = $this->applyPreRules($moduleDir, $panels);

$templateMeta = array();
if($merge && !empty($masterCopy) && file_exists($masterCopy)) {
   $panels = $this->mergePanels($panels, $vardefs, $moduleDir, $masterCopy);
   $templateMeta = $this->mergeTemplateMeta($templateMeta, $moduleDir, $masterCopy);
}

$panels = $this->applyRules($moduleDir, $panels);
return $this->createFileContents($moduleDir, $panels, $templateMeta, $filePath);

}

}
?>

