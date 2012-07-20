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
 * MetaParser.php
 *
 * This is a utility base file to parse HTML
 * @author Collin Lee
 * @api
 */
class MetaParser {

var $mPHPFile;
var $mView;
var $mModule;
var $mCustomPanels;

function MetaParser() {

}

function parse() {
   return "NOT AVAILABLE";
}

/**
 * getFormContents
 * Parses for contents enclosed within <form>...</form> tags
 */
function getFormContents($contents, $all = true) {
   if($all) {
      preg_match_all("'(<form[^>]*?>)(.*?)(</form[^>]*?>)'si", $contents, $matches);
      return $matches;
   }

   preg_match("'(<form[^>]*?>)(.*?)(</form[^>]*?>)'si", $contents, $matches);
   return $this->convertToTagElement($matches);
   //return $matches;
}


/**
 * getFormElements
 * Parses for input, select, textarea types from string content
 * @param $contents The String contents to parse
 * @return $matches Array of matches of PREG_SET_ORDER
 */
function getFormElements($contents) {
   preg_match_all("'(<[ ]*?)(textarea|input|select)([^>]*?)(>)'si", $contents, $matches, PREG_PATTERN_ORDER);
   $elems = array();
   foreach($matches[3] as $match) {
   	  $elems[] = $match;
   }
   return $elems;
}


/**
 * getFormElementsNames
 * Parses for the name values of input, select, textarea types from string content
 * @param $contents The String contents to parse
 * @return $matches Array of name/value pairs
 */
function getFormElementsNames($contents) {
   preg_match_all("'(<[ ]*?)(textarea|input|select)[^>]*?name=[\'\"]([^\'\"]*?)(\[\])?(_basic)?[\'\"]([^>]*?>)'si", $contents, $matches, PREG_PATTERN_ORDER);
   return !empty($matches[3]) ? $matches[3] : null;
}


/**
 * getTagAttribute
 * Returns the name/value of a tag attribute where name is set to $name
 * @param $name The name of the attribute
 * @param $contents The contents to parse
 * @param $filter Option regular expression to filter value
 * @return Array of name/value for matching attribute
 */
function getTagAttribute($name, $contents, $filter = '') {
   //$exp = "'".$name."[ ]*?=[ ]*?[\'\"]([a-zA-Z0-9\_\[\]]*)[\'\"]'si";

   $exp = "'".$name."[\s]*?=[\s]*?[\'\"]([^\'^\"]*?)[\'\"]'si";
   preg_match_all($exp, $contents, $matches, PREG_SET_ORDER);
   if(empty($filter)) {
   	  return !empty($matches[0][1]) ? $matches[0][1] : '';
   }

   $filtered = array();
   foreach($matches as $tag) {
   	  if(preg_match($filter, $tag[1])) {
   	  	 $filtered[] = $tag;
   	  }
   }
   return $filtered;
}

/**
 * getTables
 * Returns an Array of the tables found in the file.  If $tableClass parameter
 * is supplied, it'll return only those tables that have a matching class attribute
 * equal to $tableClass
 * @param $tableClass Optional table class parameter value
 * @return Array of table elements found
 */
function getTables($tableClass = null, $contents) {
   preg_match_all("'(<table[^>]*?>)(.*?)(</table[^>]*?>)'si", $contents, $matches, PREG_SET_ORDER);
   if($tableClass == null) {
   	  return $matches;
   }

   $tables = array();
   foreach($matches as $key => $table) {
   	  if(strpos($table[1], $tableClass) > 0) {
   	  	 $tables[] = $table;
   	  }
   }
   return $this->convertToTagElement($tables);
}

/**
 * getElementsByType
 *
 * Returns an Array of all elements matching type.  It will match
 * for the outermost tags.  For example given contents:
 * "<tr><td>Text <table><tr><td>a</td></tr></table></td></tr>"
 * and method call getElementsByType("<td>", $contents) returns
 * "<td>Text <table><tr><td>a</td></tr></table></td>"
 *
 * @param $type The type of element to parse out and return
 * @return a tag element format Array
 */
function getElementsByType($type, $contents) {
   $x = strlen($contents);
   $mark = 0;
   $count = 0;
   $stag1 = "<" . trim($type, " <>") . '>';
   $stag2 = "<" . trim($type, " <>") . ' ';
   $etag = "</".$type.">";
   $sincrement = strlen($stag1);
   $eincrement = strlen($etag);
   $sarr = array();
   $values = array();

   while($count < $x) {
   	     $stok = substr($contents, $count, $sincrement);
   	     $etok = substr($contents, $count, $eincrement);
   	     if($stok == $stag1 || $stok == $stag2) {
   	     	//Reset mark;
   	        if(count($sarr) == 0) {
   	           $mark = $count;
   	        }
            $sarr[] = $count;

   	     } else if($etok == $etag) {
   	        array_shift($sarr);
   	        if(count($sarr) == 0) {
   	           $val = substr($contents, $mark, ($count - $mark) + $eincrement);
   	           $values[] = $val;
   	           $mark = $count;
   	        }
   	     }
   	     $count++;
   }

   $count = 0;
   return $values;
}



/**
 * getElementValue
 *
 */
function getElementValue($type, $contents, $filter = "(.*?)") {
   $exp = "'<".$type."[^>]*?>".$filter."</".$type."[^>]*?>'si";
   preg_match($exp, $contents, $matches);
   return isset($matches[1]) ? $matches[1] : '';
}


function stripComments($contents) {
   return preg_replace("'(<!--.*?-->)'si", "", $contents);
}

/**
 * stripFlavorTags
 * This method accepts the file contents and uses the $GLOBALS['sugar_flavor'] value
 * to remove the flavor tags in the file contents if present.  If $GLOBALS['sugar_flavor']
 * is not set, it defaults to PRO flavor
 * @param $contents The file contents as a String value
 * @param $result The file contents with non-matching flavor tags and their nested comments removed
 */
function stripFlavorTags($contents) {
   $flavor = isset($GLOBALS['sugar_flavor']) ? $GLOBALS['sugar_flavor'] : 'PRO';
   $isPro = ($flavor == 'ENT' || $flavor == 'PRO') ? true : false;
   if($isPro) {
   	 $contents = preg_replace('/<!-- BEGIN: open_source -->.*?<!-- END: open_source -->/', '', $contents);
   } else {
   	 $contents = preg_replace('/<!-- BEGIN: pro -->.*?<!-- END: pro -->/', '', $contents);
   }
   return $contents;
}

/**
 * getMaxColumns
 * Returns the highest number of <td>...</td> blocks within a <tr>...</tr> block.
 * @param $contents The table contents to parse
 * @param $filter Optional filter to parse for an attribute within the td block.
 * @return The maximum column count
 */
function getMaxColumns($contents, $filter) {
   preg_match_all("'(<tr[^>]*?>)(.*?)(</tr[^>]*?>)'si", $contents, $matches, PREG_SET_ORDER);
   $max = 0;
   foreach($matches as $tableRows) {
           $count = substr_count($tableRows[2], $filter);
           if($count > $max) {
           	  $max = $count;
           }
   }

   return $max;
}

function convertToTagElement($matches) {

   $elements = array();

   foreach($matches as $data) {
   	   // We need 4 because the 1,2,3 indexes make up start,body,end
	   if(count($data) == 4) {
	   	  $element = array();
	   	  $element['start'] = $data[1];
	   	  $element['body'] = $data[2];
	   	  $element['end'] = $data[3];
	   	  $elements[] = $element;
	   }
   }

   return empty($elements) ? $matches : $elements;
}

/*
 * trimHTML
 * This function removes the \r (return), \n (newline) and \t (tab) markup from string
 */
function trimHTML($contents) {
   $contents = str_replace(array("\r"), array(""), $contents);
   $contents = str_replace(array("\n"), array(""), $contents);
   $contents = str_replace(array("\t"), array(""), $contents);
   return $contents;
}


/**
 * getJavascript
 *
 * This method parses the given $contents String and grabs all <script...>...</script> blocks.
 * The method also converts values enclosed within "{...}" blocks that may need to be converted
 * to Smarty syntax.
 *
 * @param $contents The HTML String contents to parse
 *
 * @return $javascript The formatted script blocks or null if none found
 */
function getJavascript($contents, $addLiterals = true) {

$javascript = null;

//Check if there are Javascript blocks of code to process
preg_match_all("'(<script[^>]*?>)(.*?)(</script[^>]*?>)'si", $contents, $matches, PREG_PATTERN_ORDER);
if(empty($matches)) {
   return $javascript;
}

foreach($matches[0] as $scriptBlock) {
	    $javascript .= "\n" . $scriptBlock;
} //foreach

$javascript = substr($javascript, 1);

//Remove stuff first
//1) Calendar.setup {..} blocks
$javascript = preg_replace('/Calendar.setup[\s]*[\(][^\)]*?[\)][\s]*;/si', '', $javascript);

//Find all blocks that may need to be replaced with Smarty syntax
preg_match_all("'([\{])([a-zA-Z0-9_]*?)([\}])'si", $javascript, $matches, PREG_PATTERN_ORDER);
if(!empty($matches)) {
	$replace = array();

	foreach($matches[0] as $xTemplateCode) {
		    if(!isset($replace[$xTemplateCode])) {
		       $replace[$xTemplateCode] = str_replace("{", "{\$", $xTemplateCode);
		    } //if
	} //foreach

	$javascript = str_replace(array_keys($replace), array_values($replace), $javascript);
} //if

if(!$addLiterals) {
   return $javascript;
}

return $this->parseDelimiters($javascript);

}

function parseDelimiters($javascript) {
	$newJavascript = '';
	$scriptLength = strlen($javascript);
	$count = 0;
	$inSmartyVariable = false;

	while($count < $scriptLength) {

	      if($inSmartyVariable) {
	      	 $start = $count;
	      	 $numOfChars = 1;
	      	 while(isset($javascript[$count]) && $javascript[$count] != '}') {
	      	 	   $count++;
	      	 	   $numOfChars++;
	      	 }

	      	 $newJavascript .= substr($javascript, $start, $numOfChars);
	      	 $inSmartyVariable = false;

	      } else {

			  $char = $javascript[$count];
			  $nextChar = ($count + 1 >= $scriptLength) ? '' : $javascript[$count + 1];

			  if($char == "{" && $nextChar == "$") {
			  	 $inSmartyVariable = true;
			  	 $newJavascript .= $javascript[$count];
			  } else if($char == "{") {
			  	 $newJavascript .=  " {ldelim} ";
			  } else if($char == "}") {
			  	 $newJavascript .= " {rdelim} ";
			  } else {
			     $newJavascript .= $javascript[$count];
			  }
	      }
		  $count++;
	} //while

	return $newJavascript;
}

/**
 * findAssignedVariableName
 * This method provides additional support in attempting to parse the  module's corresponding
 * PHP file for either the EditView or DetailView.  In the event that the subclasses cannot
 * find a matching vardefs.php entry in the HTML file, this method can be called to parse the
 * PHP file to see if the assignment was made using the bean's variable.  If so, we return
 * this variable name.
 *
 * @param $name The tag name found in the HTML file for which we want to search
 * @param $filePath The full file path for the HTML file
 * @return The variable name found in PHP file, original $name variable if not found
 */
function findAssignedVariableName($name, $filePath) {

	if($this->mPHPFile == "INVALID") {
	   return $name;
	}

	if(!isset($this->mPHPFile)) {
	   if(preg_match('/(.*?)(DetailView).html$/', $filePath, $matches)) {
	   	 $dir = $matches[1];
	   } else if(preg_match('/(.*?)(EditView).html$/', $filePath, $matches)) {
	   	 $dir = $matches[1];
	   }

	   if(!isset($dir) || !is_dir($dir)) {
	      $this->mPHPFile = "INVALID";
	      return $name;
	   }

       $filesInDir = $this->dirList($dir);
       $phpFile = $matches[2].'.*?[\.]php';
       foreach($filesInDir as $file) {
       	  if(preg_match("/$phpFile/", $file)) {
       	  	 $this->mPHPFile = $matches[1] . $file;
       	  	 break;
       	  }
       }

       if(!isset($this->mPHPFile) || !file_exists($this->mPHPFile)) {
       	  $this->mPHPFile = "INVALID";
       	  return $name;
       }
	}

	$phpContents = file_get_contents($this->mPHPFile);
	$uname = strtoupper($name);
	if(preg_match("/xtpl->assign[\(][\"\']".$uname."[\"\'][\s]*?,[\s]*?[\$]focus->(.*?)[\)]/si", $phpContents, $matches)) {
	   return $matches[1];
	}
	return $name;
}


/**
 * dirList
 * Utility method to list all the files in a given directory.
 *
 * @param $directory The directory to scan
 * @return $results The files in the directory that were found
 */
function dirList ($directory) {

    // create an array to hold directory list
    $results = array();

    // create a handler for the directory
    $handler = opendir($directory);

    // keep going until all files in directory have been read
    while ($file = readdir($handler)) {
        // if $file isn't this directory or its parent,
        // add it to the results array
        if ($file != '.' && $file != '..')
            $results[] = $file;
    }

    // tidy up: close the handler
    closedir($handler);
    return $results;
}


/**
 * isCustomField
 * This method checks the mixed variable $elementNames to see if it is a custom field.  A custom
 * field is simply defined as a field that ends with "_c".  If $elementNames is an Array
 * any matching custom field value will result in a true evaluation
 * @param $elementNames Array or String value of form element name(s).
 * @return String name of custom field; null if none found
 */
function getCustomField($elementNames) {

   if(!isset($elementNames) || (!is_string($elementNames) && !is_array($elementNames))) {
   	  return null;
   }

   if(is_string($elementNames)) {
   	  if(preg_match('/(.+_c)(_basic)?(\[\])?$/', $elementNames, $matches)) {
   	  	 return count($matches) == 1 ? $matches[0] : $matches[1];
   	  }
   	  return null;
   }

   foreach($elementNames as $name) {
   	  if(preg_match('/(.+_c)(_basic)?(\[\])?$/', $name, $matches)) {
   	  	 return count($matches) == 1 ? $matches[0] : $matches[1];
   	  }
   }

   return null;
}

function applyPreRules($moduleDir, $panels) {
   if(file_exists("include/SugarFields/Parsers/Rules/".$moduleDir."ParseRule.php")) {
	  require_once("include/SugarFields/Parsers/Rules/".$moduleDir."ParseRule.php");
	  $class = $moduleDir."ParseRule";
	  $parseRule = new $class();
	  $panels = $parseRule->preParse($panels, $this->mView);
   }
   return $panels;
}

function applyRules($moduleDir, $panels) {
   return $this->applyPostRules($moduleDir, $panels);
}

function applyPostRules($moduleDir, $panels) {
   //Run module specific rules
   if(file_exists("include/SugarFields/Parsers/Rules/".$moduleDir."ParseRule.php")) {
	  require_once("include/SugarFields/Parsers/Rules/".$moduleDir."ParseRule.php");
	  $class = $moduleDir."ParseRule";
	  $parseRule = new $class();
	  $panels = $parseRule->parsePanels($panels, $this->mView);
   }

   //Now run defined rules
   require_once("include/SugarFields/Parsers/Rules/ParseRules.php");
   $rules = ParseRules::getRules();

   foreach($rules as $rule) {
   	  if(!file_exists($rule['file'])) {
   	  	 $GLOBALS['log']->error("Cannot run rule for " . $rule['file']);
   	  	 continue;
   	  } //if
   	  require_once($rule['file']);
   	  $runRule = new $rule['class'];
   	  $panels = $runRule->parsePanels($panels, $this->mView);

   } //foreach

   return $panels;
}

function createFileContents($moduleDir, $panels, $templateMeta=array(), $htmlFilePath) {

$header = "<?php\n\n";

if(empty($templateMeta)) {
$header .= "\$viewdefs['$moduleDir']['$this->mView'] = array(
    'templateMeta' => array('maxColumns' => '2',
                            'widths' => array(
                                            array('label' => '10', 'field' => '30'),
                                            array('label' => '10', 'field' => '30')
                                            ),
    ),";
} else {
$header .= "\$viewdefs['$moduleDir']['$this->mView'] = array(
    'templateMeta' =>" . var_export($templateMeta, true) . ",";
}

//Replace all the @sq (single quote tags that may have been inserted)
$header = preg_replace('/\@sq/', "'", $header);

/*
$contents = file_get_contents($htmlFilePath);

$javascript = $this->getJavascript($contents, true);

if(!empty($javascript)) {
	$javascript = str_replace("'", "\\'", $javascript);
	$header .= "\n 'javascript' => '" . $javascript . "',\n";
} //if
*/
$header .= "\n 'panels' =>";

$footer = "
\n
);
?>";

   $metadata = '';
   $body = var_export($panels, true);
   $metadata = $header . $body . $footer;
   $metadata = preg_replace('/(\d+)[\s]=>[\s]?/',"",$metadata);
   return $metadata;

}


/**
 * mergePanels
 * This function merges the $panels Array against the $masterCopy's meta data definition
 * @param $panels meta data Array to merge
 * @param $moduleDir Directory name of the module
 * @param $masterCopy file path to the meta data master copy
 * @return Array of merged $panel definition
 */
function mergePanels($panels, $vardefs, $moduleDir, $masterCopy) {
   require($masterCopy);
   $masterpanels = $viewdefs[$moduleDir][$this->mView]['panels'];
   $hasMultiplePanels = $this->hasMultiplePanels($masterpanels);

   if(!$hasMultiplePanels) {
   	    $keys = array_keys($viewdefs[$moduleDir][$this->mView]['panels']);
        if(!empty($keys) && count($keys) == 1) {
        	if(strtolower($keys[0]) == 'default') {
        	   $masterpanels = array('default'=>$viewdefs[$moduleDir][$this->mView]['panels'][$keys[0]]);
        	} else {
        	   $firstPanel = array_values($viewdefs[$moduleDir][$this->mView]['panels']);
	           $masterpanels = array('default'=> $firstPanel[0]);
        	}
        } else {
        	$masterpanels = array('default'=>$viewdefs[$moduleDir][$this->mView]['panels']);
        }
   }
   foreach($masterpanels as $name=>$masterpanel) {
   	       if(isset($panels[$name])) {
	   	       	  // Get all the names in the panel
	   	       	  $existingElements = array();
	   	       	  $existingLocation = array();

	   	       	  foreach($panels[$name] as $rowKey=>$row) {
	   	       	  	 foreach($row as $colKey=>$column) {
	   	       	  	 	if(is_array($column) && !empty($column['name'])) {
	   	       	  	 	   $existingElements[$column['name']] = $column['name'];
	   	       	  	 	   $existingLocation[$column['name']] = array("panel"=>$name, "row"=>$rowKey, "col"=>$colKey);
	   	       	  	 	} else if(!is_array($column) && !empty($column)) {
	   	       	  	 	   $existingElements[$column] = $column;
	   	       	  	 	   $existingLocation[$column] = array("panel"=>$name, "row"=>$rowKey, "col"=>$colKey);
	   	       	  	 	}
	   	       	  	 } //foreach
	   	       	  } //foreach

	   	       	  // Now check against the $masterCopy
	   	       	  foreach($masterpanel as $rowKey=>$row) {

	   	       	  	 $addRow = array();

	   	       	  	 foreach($row as $colKey=>$column) {
	   	       	  	 	if(is_array($column) && isset($column['name'])) {
	   	       	  	 	   $id = $column['name'];
	   	       	  	 	} else if(!is_array($column) && !empty($column)) {
	   	       	  	 	   $id = $column;
	   	       	  	 	} else {
	   	       	  	 	   continue;
	   	       	  	 	}
	   	       	  	 	if(empty($existingElements[$id])) {
	   	       	  	 	   //Only add if
	   	       	  	 	   // 1) if it is a required field (as defined in metadata)
	   	       	  	 	   // 2) or if it has a customLabel and customCode (a very deep customization)
	   	       	  	 	   if((is_array($column) && !empty($column['displayParams']['required'])) ||
	   	       	  	 	      (is_array($column) && !empty($column['customCode']) && !empty($column['customLabel']))) {
	   	       	  	 	   	  $addRow[] = $column;
	   	       	  	 	   }
	   	       	  	 	} else {
	   	       	  	 	   //Use definition from master copy instead
	   	       	  	 	   $panels[$existingLocation[$id]['panel']][$existingLocation[$id]['row']][$existingLocation[$id]['col']] = $column;
	   	       	  	 	}
	   	       	  	 } //foreach

	   	       	  	 // Add it to the $panels
	   	       	  	 if(!empty($addRow)) {
	   	       	  	 	$panels[$name][] = $addRow;
	   	       	  	 }
	   	       	  } //foreach

   	       } else {
	   	       	  $panels[$name] = $masterpanel;
   	       }
   } //foreach

   // We're not done yet... go through the $panels Array now and try to remove duplicate
   // or empty panels
   foreach($panels as $name=>$panel) {
   	   if(count($panel) == 0 || !isset($masterpanels[$name])) {
   	   	  unset($panels[$name]);
   	   }
   } //foreach

   return $panels;
}

/**
 * mergeTemplateMeta
 * This function merges the $templateMeta Array against the $masterCopy's meta data definition
 * @param $templateMeta meta data Array to merge
 * @param $moduleDir Directory name of the module
 * @param $masterCopy file path to the meta data master copy
 * @return Array of merged $templateMeta definition
 */
function mergeTemplateMeta($templateMeta, $moduleDir, $masterCopy) {
   require($masterCopy);
   $masterTemplateMeta = $viewdefs[$moduleDir][$this->mView]['templateMeta'];

   if(isset($masterTemplateMeta['javascript'])) {
   	  //Insert the getJSPath code back into src value
   	  $masterTemplateMeta['javascript'] = preg_replace('/src\s*=\s*[\'\"].*?(modules\/|include\/)([^\.]*?\.js)([^\'\"]*?)[\'\"]/i', 'src="@sq . getJSPath(@sq${1}${2}@sq) . @sq"', $masterTemplateMeta['javascript']);
   }

   return $masterTemplateMeta;
}

function hasRequiredSpanLabel($html) {
   if(empty($html)) {
   	  return false;
   }

   return preg_match('/\<(div|span) class=(\")?required(\")?\s?>\*<\/(div|span)>/si', $html);
}

function hasMultiplePanels($panels) {

   if(!isset($panels) || empty($panels) || !is_array($panels)) {
   	  return false;
   }

   if(is_array($panels) && (count($panels) == 0 || count($panels) == 1)) {
   	  return false;
   }

   foreach($panels as $panel) {
   	  if(!empty($panel) && !is_array($panel)) {
   	  	 return false;
   	  } else {
   	  	 foreach($panel as $row) {
   	  	    if(!empty($row) && !is_array($row)) {
   	  	       return false;
   	  	    } //if
   	  	 } //foreach
   	  } //if-else
   } //foreach

   return true;
}

function getRelateFieldName($mixed='') {
   if(!is_array($mixed)) {
   	  return '';
   } else if(count($mixed) == 2){
      $id = '';
   	  $name = '';
   	  foreach($mixed as $el) {
   	  	 if(preg_match('/_id$/', $el)) {
   	  	    $id = $el;
   	  	 } else if(preg_match('/_name$/', $el)) {
   	  	    $name = $el;
   	  	 }
   	  }
   	  return (!empty($id) && !empty($name)) ? $name : '';
   }
   return '';
}

function getCustomPanels() {
   return $this->mCustomPanels;
}

/**
 * fixTablesWithMissingTr
 * This is a very crude function to fix instances where files declared a table as
 * <table...><td> instead of <table...><tr><td>.  Without this helper function, the
 * parsing could messed up.
 *
 */
function fixTablesWithMissingTr($tableContents) {
   if(preg_match('/(<table[^>]*?[\/]?>\s*?<td)/i', $tableContents, $matches)) {
   	  return preg_replace('/(<table[^>]*?[\/]?>\s*?<td)/i', '<table><tr><td', $tableContents);
   }
   return $tableContents;
}

/**
 * fixRowsWithMissingTr
 * This is a very crude function to fix instances where files have an </tr> tag immediately followed by a <td> tag
 */
function fixRowsWithMissingTr($tableContents) {
   if(preg_match('/(<\/tr[^>]*?[\/]?>\s*?<td)/i', $tableContents, $matches)) {
   	  return preg_replace('/(<\/tr[^>]*?[\/]?>\s*?<td)/i', '</tr><tr><td', $tableContents);
   }
   return $tableContents;
}

/**
 * fixDuplicateTrTags
 * This is a very crude function to fix instances where files have two consecutive <tr> tags
 */
function fixDuplicateTrTags($tableContents) {
   if(preg_match('/(<tr[^>]*?[\/]?>\s*?<tr)/i', $tableContents, $matches)) {
   	  return preg_replace('/(<tr[^>]*?[\/]?>\s*?<tr)/i', '<tr', $tableContents);
   }
   return $tableContents;
}

/**
 * findSingleVardefElement
 * Scans array of form elements to see if just one is a vardef element and, if so,
 * return that vardef name
 */
function findSingleVardefElement($formElements=array(), $vardefs=array()) {
   if(empty($formElements) || !is_array($formElements)) {
   	  return '';
   }

   $found = array();
   foreach($formElements as $el) {
   	   if(isset($vardefs[$el])) {
   	   	  $found[] = $el;
   	   }
   }

   return count($found) == 1 ? $found[0] : '';
}


}
?>
